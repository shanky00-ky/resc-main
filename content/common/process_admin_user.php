<?
if (password_verify($password, $stored_password)) {
    $stmt = $conn->prepare("UPDATE m21_admindashboard SET online_status = 'online' WHERE m21_id = ?");
    $stmt->bind_param("i", $user['id']);
    $stmt->execute();
    
    $_SESSION['user_role'] = $user['m19_role'];
    $_SESSION['user_name'] = $user['m19_name'];
    $_SESSION['user_email'] = $user['m19_email'];
    $_SESSION['user_id'] = $user['id'];

    header("Location: admin.php");
    exit();
}
?>
      <body>
     <div id="loading-overlay">
            <img src="..\images/stock-footage-the-appearance-of-the-green-neon-symbol-volleyball-ball-flicker-in-out-alpha-channel-ezgif.com-video-to-gif-converter.gif" alt="Loading..." /> 
        </div>
        <script src="..\scripts/overlay.js"></script>
     </body>