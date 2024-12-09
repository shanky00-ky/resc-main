<?php
session_start();
include('.\conn.php'); 

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

$query = "SELECT m12_id, m12_username, m12_email, m12_status FROM m12_signup";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error fetching users: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
       
footer {
  background-color: #333;
  color: #fff;
  padding: 40px 0;
  text-align: center;
}

.footer-container {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.footer-logo {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
}

.footer-logo .logo {
  max-width: 150px;
}

.footer-content {
  flex: 2;
  padding-left: 20px;
}

.footer-social {
  flex: 1;
  display: flex;
  justify-content: center;
  gap: 20px;
}

.footer-social a {
  color: #fff;
  font-size: 24px;
  transition: color 0.3s ease;
}

.footer-social a:hover {
  color: #f39c12;
}

.footer-social i {
  font-size: 24px;
}

.additional-info {
  flex: 1;
  padding-left: 20px;
}

.footer-map {
  margin-top: 20px;
}

.footer-map iframe {
  width: 100%;
  max-width: 350px;
  height: 250px;
  border: none;
  border-radius: 10px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
}

@media (max-width: 768px) {
  .footer-container {
    flex-direction: column;
    text-align: center;
  }

  .footer-logo {
    margin-bottom: 20px;
  }

  .footer-content, .footer-social, .additional-info {
    margin-bottom: 20px;
  }

  .footer-social a {
    font-size: 18px;
  }

  .footer-map iframe {
    max-width: 100%;
  }
}



    </style>
</head>
<body>

<header class="navbar">
    <div class="logo">
      <?php
        $sql = "SELECT * FROM `02_media` WHERE `02_imgname` = 'Logo';";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <a href="content/common/blogs.php">
              <div class="logo " >
              <img src="..\images/<?= $row['02_imgpath']; ?>" alt="Volleyball League Logo" class="navbar-logo">
              </div>
              </a>
        <?php } ?>
        <span class="logo-text">Volleyball.com</span>
    </div>
    <nav class="nav-links">
        <?php
        $sql = "SELECT * FROM `01_menu` WHERE 01_status = 1 ;";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          
          if ($row['01_name'] == "Home") {
            ?>
                 <button onclick="window.location.href='/resc-main/<?=$row['01_url']; ?>'" class="cta-btn">
                    <?= isset($row['01_name']) ? $row['01_name'] : 'Home'; ?>
                  </button>
              <?php
            }
        }
        ?>

    </nav>
</header>
<div class="container">
    <h2>Manage Users</h2>

    <a href="add_user.php" class="add-user-btn">Add New User</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($user = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$user['m12_id']}</td>
                        <td>{$user['m12_username']}</td>
                        <td>{$user['m12_email']}</td>
                        <td>{$user['m12_status']}</td>
                        <td>
                            <a href='edit_user.php?id={$user['m12_id']}' class='action-btn'>Edit</a>
                            <a href='delete_user.php?id={$user['m12_id']}' class='action-btn' style='background-color: #dc3545;'>Delete</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<footer>
  <div class="footer-container">
    <?php 
    $sql = 'SELECT * FROM m08_footer WHERE m08_status = 1;';
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      if ($row['m08_name'] == 'Logo') {
    ?>
        <div class="footer-logo">
          <img src="..\images/<?= $row['m08_url']?>" alt="<?= $row['m08_name']?>" class="logo">
        </div>
    <?php }
    ?>
    <div class="footer-content">
      <?php if ($row['m08_name'] == 'content') { ?>
        <p><?= $row['m08_disc']?></p>
      <?php } ?>
    </div>
    <div class="footer-social">
      <?php
      $socials = ['Facebook', 'Twitter', 'Instagram'];
      if (in_array($row['m08_name'], $socials)) {
      ?>
        <a href="<?= $row['m08_url']; ?>" class="social-icon <?= strtolower($row['m08_name']); ?>">
          <i class="fab fa-<?= strtolower($row['m08_name']); ?>"></i>
        </a>
      <?php } ?>
    </div>
    <div class="additional-info">
      <?php
      if (in_array($row['m08_name'], ['Contactus', 'Phoneno'])) {
      ?>
        <p><?= $row['m08_name']?>: <?= $row['m08_disc']?></p>
      <?php } ?>
    </div>
    <?php if ($row['m08_name'] == 'location') { ?>
      <div class="footer-map">
        <iframe 
          src="<?= $row['m08_url'];?>" 
          width="350" 
          height="250" 
          style="border:0;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    <?php }} ?>
  </div>
</footer>
</body>
</html>
