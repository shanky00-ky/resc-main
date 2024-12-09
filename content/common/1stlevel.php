<?php 
include (".\conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Volleyball basics Learning</title>
    <link rel="stylesheet" href="..\css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: white;
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

img.section-img, video {
    width: 100%;
    height: auto;
    border-radius: 8px;
    margin-top: 20px;
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
                <h2>Learn the basics</h2>
                <p class="date"></p>
            </div>
            <img src="volleyball-action.jpg" alt="Volleyball Action">
        </div>
        <div class="container">
    <section>
        <h2>1. Objective of the Game</h2>
        <p>The main objective of volleyball is to score points by sending the ball over the net and into the opponent's court in such a way that they are unable to return it. A match typically consists of a best-of-five sets format, with each set played to 25 points (with a minimum 2-point lead). If a fifth set is necessary, it’s played to 15 points.</p>
    </section>

    <section>
        <h2>2. The Court</h2>
        <ul>
            <li><strong>Size:</strong> A standard volleyball court is 18 meters long and 9 meters wide, divided by a net.</li>
            <li><strong>Net Height:</strong>
                <ul>
                    <li>For men’s teams, the net is 2.43 meters high.</li>
                    <li>For women’s teams, the net is 2.24 meters high.</li>
                    <li>Beach volleyball nets are slightly lower.</li>
                </ul>
            </li>
            <li>The court is divided into two sides, each of which has three positions for players: front row (near the net) and back row (further from the net).</li>
        </ul>
        <img src="images/volleyball-court.jpg" alt="Volleyball Court" class="section-img">
    </section>

    <section>
    <h2>3. Basic Positions</h2>
    <ul>
        <li><strong>Outside hitter (left-side hitter):</strong> Typically the primary attacker.</li>
        <li><strong>Setter:</strong> The player who touches the ball most often...</li>
        <li><strong>Libero:</strong> A defensive specialist...</li>
    </ul>
    <video width="100%" height="auto" controls>
        <source src="videos/volleyball-positions.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</section>


    <section>
        <h2>4. How to Play: Basic Rules</h2>
        <ul>
            <li><strong>Team Composition:</strong> A volleyball match consists of two teams, each made up of six players. Teams rotate every time they win the serve, changing positions on the court.</li>
            <li><strong>Serving:</strong> The game starts with a serve. The ball is served from behind the baseline, and the server must hit it over the net to the opponent’s side. The serve must not touch the net or go out of bounds.</li>
            <li><strong>Scoring:</strong> Rally Scoring is used in modern volleyball, meaning a point is scored on every serve, whether the serving team wins or loses the rally. A set is won by the first team to reach 25 points, with a 2-point advantage. If the match reaches a fifth set, it is played to 15 points.</li>
            <li><strong>Rotations:</strong> Teams rotate clockwise every time they win the serve. Players must move into specific positions (front-row and back-row positions).</li>
            <li><strong>Hits per Side:</strong> Each team is allowed three touches to return the ball to the opponent’s side. Common plays are:
                <ul>
                    <li>Pass (also called a bump or reception): Using the forearms to pass the ball.</li>
                    <li>Set: Using the fingers to direct the ball to a hitter.</li>
                    <li>Spike (Attack): Jumping and hitting the ball downward to score a point.</li>
                </ul>
            </li>
            <li><strong>The Block:</strong> When a player jumps at the net to prevent the opponent’s spike from coming over, it is called a block. The block does not count as one of the team’s three allowed touches.</li>
        </ul>
        <img src="images/volleyball-serve.jpg" alt="Serving the Ball" class="section-img">
    </section>

<section>
        <h2>5. Illegal Actions</h2>
        <ul>
            <li><strong>Double Hit:</strong> A player hits the ball twice in succession.</li>
            <li><strong>Carry:</strong> A player allows the ball to rest or "carry" on their hands (this is typically called a “lift”).</li>
            <li><strong>Foot Fault:</strong> The server steps on or over the baseline while serving.</li>
            <li><strong>Net Violation:</strong> A player touches the net or crosses under it during a play.</li>
        </ul>
        <video width="100%" height="auto" controls>
        <source src="videos/volleyball-illegal-actions.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</section>
<section>
        <h2>6. Important Skills to Learn</h2>
        <ul>
            <li><strong>Passing:</strong> Forearm Pass (Bump): Keep your arms straight, forming a platform with your forearms, and direct the ball to your setter.</li>
            <li><strong>Setting:</strong> Overhead Pass: Use your fingertips to push the ball to your teammate, usually in a way that sets them up for a spike.</li>
            <li><strong>Spiking:</strong> Approach: Start with small steps, building speed as you get closer to the net. Jump explosively and hit the ball with your dominant hand.</li>
            <li><strong>Blocking:</strong> Hands Positioning: Jump with your hands above your head, arms straight, and fingers spread wide to create a solid barrier.</li>
            <li><strong>Serving:</strong> Underhand Serve: Easier for beginners, where you hit the ball with your palm while it is in your hand. Overhand Serve: A more advanced serve, where you hit the ball with your fingers while it’s tossed into the air.</li>
            <li><strong>Diving and Digging:</strong> Digging: When you receive a hard spike, and you need to get low and use your forearms to pass the ball accurately. Diving: A defensive move to receive the ball when too far to pass normally.</li>
        </ul>
        <img src="images/volleyball-passing.jpg" alt="Passing the Ball" class="section-img">
</section>
    <section>
        <h2>7. Strategy Tips</h2>
        <ul>
            <li><strong>Communication:</strong> Constantly talk to your teammates. Call for the ball, warn them about opponents’ spikes, and support each other on the court.</li>
            <li><strong>Positioning:</strong> Always be in the ready position to react to the ball.</li>
            <li><strong>Defense:</strong> Focus on the opponent's attack, watching their body language to predict where they will hit the ball.</li>
            <li><strong>Serve Placement:</strong> Aim for corners, areas between players, or weak spots in the opponent’s defense.</li>
        </ul>
        <video width="100%" height="auto" controls>
        <source src="videos/volleyball-strategy.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    </section>

    <section>
        <h2>8. Common Terms</h2>
        <ul>
            <li><strong>Ace:</strong> A serve that the opponent fails to touch or return.</li>
            <li><strong>Kill:</strong> A successful attack that the opponent cannot return.</li>
            <li><strong>Assist:</strong> A pass or set that directly leads to a point for the team.</li>
            <li><strong>Rally:</strong> The sequence of exchanges between teams before a point is scored.</li>
            <li><strong>Timeout:</strong> A break in play called by a team to discuss strategy.</li>
        </ul>
        <video width="100%" height="auto" controls>
        <source src="videos/volleyball-terms.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    </section>

    <section>
        <h2>9. Volleyball Etiquette and Sportsmanship</h2>
        <ul>
            <li><strong>Respect:</strong> Always respect your teammates, opponents, referees, and the game itself.</li>
            <li><strong>Fair Play:</strong> Follow the rules, and avoid trying to cheat or manipulate the system.</li>
            <li><strong>Positive Attitude:</strong> Stay positive, encourage your teammates, and maintain a good sportsmanship mentality.</li>
        </ul>
        <img src="images/volleyball-equipment.jpg" alt="Volleyball Equipment" class="section-img">
    </section>

    <section>
        <h2>10. Equipment You Need</h2>
        <ul>
            <li><strong>Volleyball:</strong> Make sure the ball is properly inflated and suitable for your playing environment (indoor or beach).</li>
            <li><strong>Proper Attire:</strong> Wear comfortable athletic clothing. Knee pads are recommended for protection when diving or hitting the floor.</li>
            <li><strong>Footwear:</strong> Indoor volleyball requires shoes with good grip, while beach volleyball may be played barefoot.</li>
        </ul>
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
