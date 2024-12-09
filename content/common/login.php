<?php 
include(".\conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Volleyball</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: black;
      color: white;
    }

     
#loading-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.8);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;  
}
#loading-overlay img,
#loading-overlay video {
  max-width: 250px;   
  max-height: 250px;  
  margin: auto;       
}    
body.loaded #loading-overlay {
            display: none;
        }

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px 20px;
  background: linear-gradient(135deg, #333,#333);
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 10;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
  transition: background 0.3s ease-in-out;
}

.navbar:hover {
  background: linear-gradient(135deg, #333, #333);
}

.navbar .logo {
  display: flex;
  align-items: center;
  font-family: 'Roboto', sans-serif;
  font-size: 24px;
  font-weight: 700;
  color: #ffffff;
}

.navbar .logo img {
  width: 50px;
  height: 50px;
  margin-right: 15px;
}

.navbar .nav-links {
  display: flex;
  align-items: center;
  gap: 30px;
}

.navbar .nav-links a {
  font-size: 18px;
  font-weight: 600;
  text-transform: uppercase;
  color: #e0e0e0;
  padding: 8px 16px;
  border-radius: 8px;
  letter-spacing: 1px;
  transition: all 0.3s ease;
}

.navbar .nav-links a:hover {
  background-color: cyan;
  color: #ffffff;
  transform: translateY(-5px);
}

.navbar .cta-btn {
  padding: 10px 28px;
  background: #26c6da;
  border: none;
  color: #121212;
  border-radius: 30px;
  font-weight: 600;
  transition: background 0.3s ease, transform 0.3s ease;
}

.navbar .cta-btn:hover {
  background: #29b6f6;
  transform: scale(1.05);
}

.nav-toggle {
  display: none;
  flex-direction: column;
  gap: 5px;
  cursor: pointer;
  margin-top: 15px;
}

.nav-toggle .bar {
  width: 30px;
  height: 3px;
  background-color: white;
}
.navbar .nav-links form {
  display: flex;
  align-items: center;
  gap: 10px;  
}

.navbar .nav-links .form-control {
  width: 200px;  
  padding: 8px 12px;
  border-radius: 25px;
  border: 2px solid #ccc;  
  font-size: 16px;
  transition: border-color 0.3s ease;
}

.navbar .nav-links .form-control:focus {
  border-color: #1e88e5; 
  outline: none;
}


.navbar .nav-links .btn-outline-success {
  padding: 8px 16px;
  background-color: #1e88e5;
  color: white;
  border: 2px solid #1e88e5;
  border-radius: 25px;
  font-size: 16px;
  transition: background-color 0.3s ease, transform 0.3s ease;
}


.navbar .nav-links .btn-outline-success:hover {
  background-color: #1565c0;
  border-color: #1565c0;
  transform: translateY(-2px);
}


    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 120vh;
      padding: 20px;
    }

    .login-wrapper {
      background: #1a1a1a;
      padding: 35px;
      border-radius: 6px;
      width: 400px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .login-logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-logo img {
      width: 150px; 
      height: auto;
    }

    .login-form h2 {
      text-align: center;
      color: #00bcd4;
    }

    .login-form label {
      display: block;
      margin-bottom: 8px;
      color: #ccc;
    }

    .login-form input {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 4px;
    }

    .login-form button {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      background-color: #00bcd4;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .login-form button:hover {
      background-color: #00796b;
    }

    .login-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
      font-size: 14px;
    }

    .login-options a {
      color: #00bcd4;
      text-decoration: none;
    }

    .login-options a:hover {
      text-decoration: underline;
    }

    .signup {
      text-align: center;
      margin-top: 20px;
    }

    .signup a {
      color: #00bcd4;
      text-decoration: none;
      font-weight: bold;
    }

    .signup a:hover {
      text-decoration: underline;
    }

    footer {
      background: #101820;
      color: #ccc;
      padding: 20px 0;
      text-align: center;
    }

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
    <div class="login-wrapper">
      <div class="login-logo">
        <?php
        $sql = "SELECT * FROM m11_loginpage WHERE m11_status = 1;";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['m11_name'] == 'Logo') {
                    ?>
                    <img src="..\images/<?= ($row['m11_url']); ?>" alt="<?= ($row['m11_name']); ?>" />     
                    <?php
                }
            }
        } 
        ?>
      </div>

      <div class="login-form">
        <h2>Login</h2>
        <form method="POST" action="process_login.php">
          <label for="email">Email:</label>
          <input type="email" name="email" required>

          <label for="password">Password:</label>
          <input type="password" name="password" required>

          <div class="login-options">
            <label>
              <input type="checkbox" name="remember"> Remember Me
            </label>
            <a href="forgot_password.php">Forgot Password?</a>
          </div>

          <button type="submit" name="login">Login</button>
        </form>
        <div class="signup">
          <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        </div>
      </div>
    </div>
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
<script src="..\scripts/overlay.js"></script>
</body>
</html>