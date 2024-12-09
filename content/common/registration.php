<?php
include(".\conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Volleyball Event</title>
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

.navbar .cta-btn {
  width: 250px;
  padding: 15px;
  background-color: #00bcd4;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 18px;
  cursor: pointer;
  text-align: center;
}

.navbar .cta-btn:hover {
  background-color:  #00796b;
}

.navbar .logo {
  display: flex;
  align-items: center;
  white-space: nowrap; 
}

.navbar .logo img {
  width: 50px;
  height: 50px;
  margin-right: 10px;
}

.navbar .logo span {
  font-size: 22px; 
  font-weight: 600; 
  color: #fff;
}
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      padding: 20px;
    }
    .registration-section {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: rgb(3, 0, 0);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2, h5 {
            text-align: center;
        }
        .player-info {
            background-color: #000000;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    input, select {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 4px;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #00bcd4;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background-color: #00796b;
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
<section class="registration-section">
  <h2>Team and Players Registration</h2>
  <form id="registration-form" method="post" action=".\process_registration.php">
      <h3 class="mb-3">Team Information</h3>
      <div class="mb-3">
          <label for="teamName" class="form-label">Team Name</label>
          <input type="text" class="form-control" id="teamName" name="teamName" required>
          <div class="invalid-feedback">Please provide a team name.</div>
      </div>
      <div class="mb-3">
          <label for="coachName" class="form-label">Coach Name</label>
          <input type="text" class="form-control" id="coachName" name="coachName" required>
          <div class="invalid-feedback">Please provide the coach's name.</div>
      </div>
      <div class="mb-3">
          <label for="contactEmail" class="form-label">Contact Email</label>
          <input type="email" class="form-control" id="contactEmail" name="contactEmail" required>
          <div class="invalid-feedback">Please provide a valid email address.</div>
      </div>
      <div class="mb-3">
          <label for="contactPhone" class="form-label">Contact Phone Number</label>
          <input type="tel" class="form-control" id="contactPhone" name="contactPhone" required>
          <div class="invalid-feedback">Please provide a valid phone number.</div>
      </div>

      <hr>
      <h3 class="mb-3">Players Information</h3>

      <div class="player-info">
          <h5>Player 1</h5>
          <div class="mb-3">
              <label for="player1Name" class="form-label">Player Name</label>
              <input type="text" class="form-control" id="player1Name" name="player1Name" required>
              <div class="invalid-feedback">Please provide the player's name.</div>
          </div>
          <div class="mb-3">
              <label for="player1Position" class="form-label">Player Position</label>
              <input type="text" class="form-control" id="player1Position" name="player1Position" required>
              <div class="invalid-feedback">Please provide the player's position.</div>
          </div>
          <h5>Player2</h5>
          <div class="mb-3">
              <label for="player2Name" class="form-label">Player Name</label>
              <input type="text" class="form-control" id="player2Name" name="player2Name" required>
              <div class="invalid-feedback">Please provide the player's name.</div>
          </div>
          <div class="mb-3">
              <label for="player2Position" class="form-label">Player Position</label>
              <input type="text" class="form-control" id="player2Position" name="player2Position" required>
              <div class="invalid-feedback">Please provide the player's position.</div>
          </div>
          <h5>Player3</h5>
          <div class="mb-3">
              <label for="player3Name" class="form-label">Player Name</label>
              <input type="text" class="form-control" id="player3Name" name="player3Name" required>
              <div class="invalid-feedback">Please provide the player's name.</div>
          </div>
          <div class="mb-3">
              <label for="player3Position" class="form-label">Player Position</label>
              <input type="text" class="form-control" id="player3Position" name="player3Position" required>
              <div class="invalid-feedback">Please provide the player's position.</div>
          </div>
          <h5>Player4</h5>
          <div class="mb-3">
              <label for="player4Name" class="form-label">Player Name</label>
              <input type="text" class="form-control" id="player4Name" name="player4Name" required>
              <div class="invalid-feedback">Please provide the player's name.</div>
          </div>
          <div class="mb-3">
              <label for="player4Position" class="form-label">Player Position</label>
              <input type="text" class="form-control" id="player4Position" name="player4Position" required>
              <div class="invalid-feedback">Please provide the player's position.</div>
          </div>
          <h5>Player5</h5>
          <div class="mb-3">
              <label for="player5Name" class="form-label">Player Name</label>
              <input type="text" class="form-control" id="player5Name" name="player5Name" required>
              <div class="invalid-feedback">Please provide the player's name.</div>
          </div>
          <div class="mb-3">
              <label for="player5Position" class="form-label">Player Position</label>
              <input type="text" class="form-control" id="player5Position" name="player5Position" required>
              <div class="invalid-feedback">Please provide the player's position.</div>
          </div>
          <h5>Player6</h5>
          <div class="mb-3">
              <label for="player6Name" class="form-label">Player Name</label>
              <input type="text" class="form-control" id="player6Name" name="player6Name" required>
              <div class="invalid-feedback">Please provide the player's name.</div>
          </div>
          <div class="mb-3">
              <label for="player6Position" class="form-label">Player Position</label>
              <input type="text" class="form-control" id="player6Position" name="player6Position" required>
              <div class="invalid-feedback">Please provide the player's position.</div>
          </div>
          <h5>Player7</h5>
          <div class="mb-3">
              <label for="player7Name" class="form-label">Player Name</label>
              <input type="text" class="form-control" id="player7Name" name="player7Name" required>
              <div class="invalid-feedback">Please provide the player's name.</div>
          </div>
          <div class="mb-3">
              <label for="player7Position" class="form-label">Player Position</label>
              <input type="text" class="form-control" id="player7Position" name="player7Position" required>
              <div class="invalid-feedback">Please provide the player's position.</div>
          </div>
      </div>
      <div class="text-center">
      <button type="submit" id="submit" name="submit">Send</button>
      </div>
  </form>
</section>

<script src ="scripts/payment.js"></script>
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
