<?php
session_start();
include('..\conn.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['user_id'];

$query = "SELECT 
                u18.18_name, 
                u18.18_email, 
                u18.18_bio, 
                u18.18_role, 
                u18.18_profile_photo_url, 
                s12.m12_username, 
                s12.m12_email AS signup_email
          FROM m18_userprofiles u18
          JOIN m12_signup s12 ON u18.m12_id = s12.m12_id
          WHERE u18.m12_id = ?";

$stmt = $conn->prepare($query);

if ($stmt === false) {
    die('MySQL prepare() failed: ' . $conn->error);
}

$stmt->bind_param("i", $user_id);

$stmt->execute();

$stmt->bind_result($user_name, $user_email, $bio, $role, $photo_url, $username, $signup_email);

$stmt->fetch();

$stmt->close();


$update_query = "UPDATE INTO m18_userprofiles (m12_id, 18_name, 18_email, 18_bio, 18_role, 18_profile_photo_url)
                 VALUES (?, ?, ?, ?, ?, ?)";

$insert_stmt = $conn->prepare($update_query);

if ($insert_stmt === false) {
    die('MySQL prepare() failed: ' . $conn->error);
}


$insert_stmt->bind_param("isssss", $user_id, $username, $signup_email, $bio, $role, $photo_url);

$insert_stmt->execute();

if ($insert_stmt->affected_rows > 0) {
    echo "Data inserted successfully into m18_userprofiles.";
} else {
    echo "Failed to insert data into m18_userprofiles.";
}

$insert_stmt->close();
?>
<script src="..\scripts/overlay.js"></script>