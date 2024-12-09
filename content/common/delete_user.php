
<?php
include(".\conn.php");
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'admin') {
    die("You do not have permission to delete users.");
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM m19_admin WHERE id = ?");
    $stmt->bind_param("i", $user_id);

    if ($stmt->execute()) {
        echo "User deleted successfully.";
        header("Location: admin_dashboard.php"); 
        exit();
    } else {
        echo "Error deleting the user.";
    }

    $stmt->close();
} else {
    echo "No user ID provided.";
}
?>
<div id="loading-overlay">
  <?php
  $sql = 'SELECT * FROM  02_media WHERE 02_status =1;';
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
  if ($row['02_imgname'] == 'loading..'){
  ?>
    <img src="..\images/<?=$row['02_imgpath']?>" alt="<?=$row['02_imgname']?>" />
    <?php
  }}?>
</div>
        <script src="..\scripts/overlay.js"></script>