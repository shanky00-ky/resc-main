<?php
include ("./conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Volleyball Blog</title>
    <link rel="stylesheet" href="..\css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: whitesmoke;
    margin: 0;
    padding: 0;
    padding-top: 80px; 
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
  max-width: 700px;   
  max-height: 700px;  
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
       
        .api-content {
            background-color: whitesmoke;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .api-post {
            margin-bottom: 20px;
        }
        .api-post h3 {
            color: #333;
        }
        .api-post p {
            color: #555;
            line-height: 1.6;
        }
       
        .post, .image-section, .video-section, .jersey-section, .article-section {
            background-color: #white;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .new-section {
            margin-top: 40px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .new-section h3 {
            color: #333;
        }
        .subscribe-form input[type="email"] {
            padding: 10px;
            width: 300px;
            margin-right: 10px;
            border-radius: 25px;
            border: 2px solid #ccc;
            font-size: 16px;
        }
        .subscribe-form button {
            padding: 10px 20px;
            background: #26c6da;
            border: none;
            color: white;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
        }
        .subscribe-form button:hover {
            background: #29b6f6;
        }
        .recent-posts ul {
            list-style-type: none;
            padding: 0;
        }
        .recent-posts li {
            margin-bottom: 15px;
        }
        .recent-posts a {
            color: #26c6da;
            text-decoration: none;
            font-weight: bold;
        }
        .recent-posts a:hover {
            text-decoration: underline;
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
                <div class="logo">
                    <img src="..\images/<?= $row['02_imgpath']; ?>" alt="Volleyball Blog Logo" class="navbar-logo">
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
        <div class="featured-post">
            <div class="featured-post-text">
                <h2>The Evolution of Volleyball</h2>
                <p class="date">December 5, 2024</p>
                <p>Volleyball has seen a significant rise in global popularity over the years. From local leagues to international championships, the sport continues to inspire and excite players and fans around the world.</p>
            </div>
            <img src="volleyball-action.jpg" alt="Volleyball Action">
        </div>

        <div class="new-section">
            <h3>Upcoming Tournaments</h3>
            <p>Get ready for the most exciting volleyball tournaments around the world! Check out the upcoming events where top teams will compete for glory.</p>
            <ul>
                <li><strong>Volleyball World Cup</strong> - March 2025</li>
                <li><strong>National League Finals</strong> - April 2025</li>
                <li><strong>Beach Volleyball Championship</strong> - June 2025</li>
            </ul>
        </div>

        <div class="new-section">
            <h3>Player Spotlight</h3>
            <p>Meet some of the brightest talents in the world of volleyball! Each month, we will showcase a top player who has made a significant impact in the sport.</p>
            <div>
                <h4>John Doe</h4>
                <p>John has been a key player in the national volleyball team for over a decade. His powerful serves and strategic gameplay have earned him numerous accolades.</p>
            </div>
        </div>

        <div class="new-section subscribe-form">
            <h3>Stay Updated - Subscribe to Our Newsletter</h3>
            <form action="#" method="post">
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>

        <div id="api-content" class="api-content">
            <h2>Latest News From the API</h2>
            <div id="WatfkGGKwKlkrflt6Bt1RjOZVpfGNINy1Vqzi521"></div>
        </div>

       
        <div class="recent-posts">
            <h3>Recent Blog Posts</h3>
            <ul>
                <li><a href="#">How to Improve Your Volleyball Skills</a></li>
                <li><a href="#">Top Volleyball Training Drills</a></li>
                <li><a href="#">Volleyball Tournaments You Can't Miss</a></li>
            </ul>
        </div>

        <div class="post">
            <h2>The Rise of Competitive Volleyball</h2>
            <p class="date">December 5, 2024</p>
            <p>Competitive volleyball has grown substantially in recent years, with teams from all over the world striving to be the best. Learn about the growing importance of leagues and international competitions.</p>
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
                <?php } ?>
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
                <?php } ?>
                <?php } ?>
            </div>
        </footer>
    </div>

    <script src="..\scripts/api.js"></script>
    <script>
        $(window).on('load', function() {
            $('#loading-overlay').fadeOut('slow');
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
