<?php
include(".\conn.php");
?>
<div id="loading-overlay">
<img src="..\images/stock-footage-the-appearance-of-the-green-neon-symbol-volleyball-ball-flicker-in-out-alpha-channel-ezgif.com-video-to-gif-converter.gif" alt="Loading..." /> 
</div>
<?php
session_start();


session_unset();  
session_destroy(); 

header("Location: login.php");
exit();
?>
