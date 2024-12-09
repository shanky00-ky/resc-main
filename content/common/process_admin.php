<?php
include(".\conn.php");
session_start();
if (isset($_POST['adminlogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ( empty($email) || empty($password)) {
        echo "Please enter username, email and password.";
    } else {
        $stmt = $conn->prepare('SELECT * FROM m19_adminpass WHERE m19_email = ? ');
        $stmt->bind_param("s", $email);  
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                $stored_password = $user['m19_password']; 
                
                if ($password == $stored_password) {
                    $_SESSION['user_role'] = $user['m19_role'];
                    $_SESSION['user_name'] = $user['m19_name'];
                    // $_SESSION ['user_email']= $user['m19_email'];
                    // $_SESSION ['user_password'] = $user['m19_password'];
                    header("Location: admin.php");
                    exit();
                } else {
                    echo "<script> 
                    alert('Incorrect password');
                    window.location.href='adminlogin.php'; 
                    </script>";
                }
            } else {
                echo "<script> 
                alert('No user found with that email');
                window.location.href='adminlogin.php'; 
                </script>";
            }
        } else {
            echo "Error executing the query.";
        }

        $stmt->close();
    }
}
?>
<script src="..\scripts/overlay.js"></script>