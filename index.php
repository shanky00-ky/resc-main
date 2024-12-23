<?php
include("./conn.php");
// include("content/process_profile.php");
// // include("content/process_editprofile.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volleyball Tournament 2024</title>
    <meta name="description" content="Join the 2024 Volleyball Tournament and experience the excitement. Register now for an action-packed event.">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="content/css/styles.css">
    <meta property="og:title" content="Volleyball Tournament 2024">
    <meta property="og:description" content="Join the 2024 Volleyball Tournament and experience the excitement. Register now for an action-packed event.">
    <meta property="og:image" content="path_to_your_image/image.jpg">
    <meta property="og:url" content="https://your-website-url.com">
    <meta property="og:type" content="website">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>   
<body>
<div id="loading-overlay">
  <?php
  $sql = 'SELECT * FROM  02_media WHERE 02_status =1;';
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
  if ($row['02_imgname'] == 'loading..'){
  ?>
    <img src="content/images/<?=$row['02_imgpath']?>" alt="<?=$row['02_imgname']?>" />
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
              <img src="content/images/<?= $row['02_imgpath']; ?>" alt="Volleyball League Logo" class="navbar-logo">
              </div>
              </a>
        <?php } ?>
        <span class="logo-text">Volleyball.com</span>
    </div>
    <nav class="nav-links">
        <?php
        $menu_sql = "SELECT * FROM `01_menu` WHERE 01_status = 1;";
        $menu_result = mysqli_query($conn, $menu_sql);
        while ($row = mysqli_fetch_assoc($menu_result)) {
            if (in_array($row["01_name"] , ['Dashboard','blog'])) {
                ?>
               <a href="content/common/<?= $row['01_url']?>" class="active"><?= $row['01_name']?></a>
                <?php
            }
            if ($row['01_name'] == "Register") {
                ?>
                <button onclick="window.location.href='content/common/<?=$row['01_url']; ?>'" class="cta-btn">
                    <?= isset($row['01_name']) ? $row['01_name'] : 'Register now'; ?>
                </button>
                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
                <div class="dropdown">
                    <div class="hamburger" onclick="toggleDropdown()">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="dropdown-content">
                        <?php
                        $sql = 'SELECT * FROM `01_menu`;';
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            if (in_array($row['01_name'] , ['Sign up','Log In','Admin'])) {
                                ?>
                                 <a href="content/common/<?= $row['01_url']?>" class="active"><?= $row['01_name']?></a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
        }
        ?>
       
    </nav>
</header>
<section id="carouselSection" class="carousel-container">
    <div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-pause="hover">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1" aria-label="volleyball 2"></button>
        <button type="button" data-bs-target="#carousel3" data-bs-slide-to="2" aria-label="volleyball 3"></button>
        <button type="button" data-bs-target="#carousel4" data-bs-slide-to="3" aria-label="volleyball 4"></button>
      </div>
      <div class="carousel-inner">
        <?php
          $sql = "SELECT * FROM `02_media` WHERE `02_status` = 1 AND `02_imgname` LIKE 'img%'";
          $result = mysqli_query($conn, $sql);
          $firstimage = true; 
          while($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="carousel-item <?= ($firstimage ? 'active' : '') ?>">
                <img src="content/images/<?= $row['02_imgpath'] ?>" class="d-block w-100" alt="<?= $row['02_imgname']; ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?= $row['02_h5']; ?></h5>
                    <p><?= $row['02_para']; ?></p>
                </div>
            </div>
        <?php
            $firstimage = false;
          }
        ?>
      </div>
      <button class="carousel-control-prev custom-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next custom-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</section>
<section id="about-us" class="about-us-section">
    <div class="responsive-container-block bigContainer">
      <div class="responsive-container-block Container bottomContainer">
        <?php
        $sql = 'SELECT * FROM m02_aboutus where m02_status = 1 ;';
        $result = mysqli_query($conn,$sql);
        while ($row = $result->fetch_assoc()) {
            if ($row['m02_name'] == 'About') {
                ?>
                <div class="ultimateImg">
                    <img class="mainImg" src="content/images/<?= $row['m02_img']; ?>" alt="About Us">
                    <div class="purpleBox">
                        <p class="purpleText">
                         
                        </p>
                    </div>
                </div>
                <?php
           }
            if ($row['m02_name'] == 'About us') {
                ?>
                <div class="allText bottomText">
                    <p class="text-blk headingText">
                        <?= $row['m02_name']; ?>
                    </p>
                    <p class="text-blk subHeadingText">
                        <?= $row['m02_t']; ?>
                    </p>
                    <p class="text-blk description">
                        <?= $row['m02_para']; ?>
                    </p>
                    <a href="content/common/<?= $row['m02_url']; ?>" class="explore">
                        View Services
                    </a>
                </div>
                <?php
            }
        }
        ?>
      </div>
    </div>
</section>
<section class="counter-section">
    <h2>Volleyball Stats</h2>
    <div class="counter-container">
        <?php
        $sql = 'SELECT * FROM m03_counter WHERE m03_status = 1;';
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $firstimage = true;
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="counter-box <?= ($firstimage ? 'active' : '') ?>">
                    <div class="counter" data-count="320"><?= $row['m03_count']; ?></div>
                    <h3><?= $row['m03_name']; ?></h3>
                    <p><?= $row['m03_para']; ?></p>
                </div>
                <?php
                $firstimage = false;
            }
        } 
        ?>
    </div>
</section>
<section>
  <div class="owl-carousel">
    <?php
    $sql = 'SELECT * FROM m04_owlcarousel WHERE m04_status = 1 ;';
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <div class="item">
      <img src="content/images/<?= $row['m04_img']?>" alt="<?php echo $row['m04_name']; ?>">
    </div>
    
    <?php
    }
    ?>
</div>
</section>
<div class="contact-container">
    <div class="left-col">
      <img class="logo" src="content/images/volleyball-logo-on-the-background-of-multi-vector-9105476-removebg-preview.png" alt="Logo"/>
    </div>
    <div class="right-col">
      <h1>Contact Us</h1>
      <form id="contact-form" method="post" action="resc-main\content\process_contactus.php">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Your Full Name" required />
  
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Your Email Address" required />
  
        <label for="message">Message</label>
        <textarea rows="6" placeholder="Your Message" id="message" name="message" required></textarea>
  
        <button type="submit" id="submit" name="submit">Send</button>
      </form>
  
      <div id="error"></div>
      <div id="success-msg"></div>
    </div>
  </div>
  <div class="video-container">
    <?php 
    $sql = 'SELECT * FROM m07_video WHERE m07_status = 1 ;';
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
    <div class="video-wrapper">
  
  <div class="video-container">
    <?php 
    $sql = 'SELECT * FROM m07_video WHERE m07_status = 1 ;';
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
    <div class="video-wrapper">
      <iframe 
        width="100%" 
        height="450" 
        src="<?=($row['m07_videourl']);?>?autoplay=1" 
        title="YouTube video player" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen>
      </iframe>
    </div>
    <?php }
    }
    ?>
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
          <img src="content/images/<?= $row['m08_url']?>" alt="<?= $row['m08_name']?>" class="logo">
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

<script src="content/scripts/script.js"></script>
<script src="content/scripts/carousel.js"></script>
<script src="content/scripts/dropdown.js"></script>
<script src="content/scripts/overlay.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </body>
    </html>