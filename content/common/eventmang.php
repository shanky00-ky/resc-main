<?php
include(".\conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event Planning | Volleyball</title>
  <style>
 
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #101820;
      color: #f2f2f2;
    }

    h1, h2, h3 {
      text-align: center;
      color: #00bcd4;
    }

    p {
      line-height: 1.6;
      font-size: 16px;
      color: #dddddd;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
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
    .event-planning {
      padding: 50px 20px;
      background: #0d1117;
    }

    .event-planning h2 {
      color: #00bcd4;
      font-size: 32px;
      margin-bottom: 30px;
    }

    .event-planning p {
      font-size: 18px;
      color: #cccccc;
      margin-bottom: 20px;
    }
    .event-list {
      padding: 50px 20px;
    }

    .event-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 30px;
      background-color: #1a1a1a;
    }

    .event-table th, .event-table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #333;
    }

    .event-table th {
      background-color: #00bcd4;
      color: white;
    }

    .event-table td {
      color: #cccccc;
    }

    .event-table tr:hover {
      background-color: #333;
    }
    .event-details {
      background: #0d1117;
      padding: 50px 20px;
    }

    .event-details h2 {
      color: #00bcd4;
      margin-bottom: 30px;
      text-align: center;
    }

    .event-form input, .event-form textarea {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      background-color: #333;
      color: #fff;
      border: none;
      border-radius: 4px;
    }

    .event-form button {
      padding: 10px 20px;
      background-color: #00bcd4;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    .event-form button:hover {
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
<section class="event-planning container">
  <h2>The Volleyball Event Page</h2>
  <p>You can see the upcoming volleyball events, tournaments, fundraisers, and community gatherings.</p>
</section>

<section class="event-list container">
  <h2>Upcoming Events</h2>
  <p>Check out the upcoming volleyball events and tournaments. </p>

  <table class="event-table">
    <thead>
      <tr>
        <th>Event Name</th>
        <th>Date</th>
        <th>Location</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $sql = 'SELECT * FROM m15_eventmng WHeRE m15_status = 1;';
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
      <tr>
        <td><?= $row['m15_Eventname']; ?></td>
        <td><?= $row['m15_date']; ?></td>
        <td><?= $row['m15_location']; ?></td>
        <td><?= $row['m15_regstatus']; ?></td>
      </tr>

      <!-- <tr>
        <td>Community Volleyball Fundraiser</td>
        <td>Jan 15, 2025</td>
        <td>Beach Court</td>
        <td>Registration Closed</td>
      </tr>
      <tr>
        <td>Youth Volleyball Camp</td>
        <td>Feb 5, 2025</td>
        <td>Indoor Gym</td>
        <td>Registration Open</td>
      </tr> -->
    </tbody>
    <?php 
      }
      ?>
  </table>
</section>
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
