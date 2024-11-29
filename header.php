<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PWDI</title>
  <!-- <meta content="" name="description">
  <meta content="" name="keywords"> -->
  <meta name="description" content="PWDI is a Civil Society Organization, Non-Profit and Non-Governmental initiated in 2018 to help spearhead community driven development initiatives and enable needy community groups especially women, youth participate in integrated activities to achieve quality livelihood and be self-sustainable. PWDI delivers its activities through the power and spirit of volunteerism approach to build sustainable communities / intercultural exchange and thriving villages in our country.">
  <meta name="keywords" content="PWDI, Pastoralists Women Development Impetus (PWDI),PWDI Morogoro, PWDI Tanzania" />
  <meta name="author" content="Pastoralists Women Development Impetus (PWDI)">

  <!-- Favicons -->
  <link href="assets/img/pwdi.jpg" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top  ">
    <div class="container d-flex align-items-center">
      <div>
        <a href="#" class="logo me-auto me-lg-0"><img src="assets/img/logo/logor.png" alt="" class="img" style="width: 200%; height: 150%"></a>
      </div>
      <h4 class="logo me-auto" style="margin-left:4%"><a href="index.php"><span>PW</span>DI</a></h4>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index.php" class="<?php
                                          if ($page == "Home") {
                                            echo "active";
                                          }
                                          ?>">Home</a></li>

          <li class="dropdown"><a href="about.php" class=" <?php
                                                  if ($page == "About") {
                                                    echo "active";
                                                  }
                                                  ?>"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.php" class="<?php
                                              if ($page2 == "Mission") {
                                                echo "text-warning";
                                              }
                                              ?>">Mission & Vision</a></li>
              <li><a href="values.php" class="<?php
                                              if ($page2 == "Values") {
                                                echo "text-warning";
                                              }
                                              ?>">Our values</a></li>
              <li><a href="team.php" class="<?php
                                              if ($page2 == "Structure") {
                                                echo "text-warning";
                                              }
                                              ?>">Organization Structure</a></li>
          </li>
        </ul>
        </li>

        <li class="dropdown"><a href="program.php" class="<?php
                                                if ($page == "Programmes") {
                                                  echo "active";
                                                }
                                                ?>"><span>Programmes</span><i class="bi# bi-chevron-down#"></i></a>
          <ul>
            <!-- <li><a href="legal.php">Legal, Advocacy & Capacity Buidling</a></li> -->
            <!-- <li><a href="program.php" class="">Our programs</a></li> -->
            <!-- <li><a href="finance.php">Finance & Admistration</a></li> -->
          </ul>
        </li>

        <li class="dropdown"><a href="gallary.php" class="<?php
                                                if ($page == "Gallery" || $page == "Events") {
                                                  echo "active";
                                                }
                                                ?>"><span>Gallery</span><i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="gallary.php" class="<?php
                                              if ($page2 == "Photo gallery") {
                                                echo "text-warning";
                                              }
                                              ?>">Photo gallery</a></li>
            <li><a href="events.php" class="<?php
                                            if ($page2 == "Events") {
                                              echo "text-warning";
                                            }
                                            ?>">Events</a></li>
          </ul>
        </li>
        <!-- <li><a href="#">News</a></li> -->
        <li><a href="contact.php" class="<?php
                                          if ($page == "Contact") {
                                            echo "active";
                                          }
                                          ?>">Contact Us</a></li>
        <!--  <li><a href="./admin/view/login-form.php">Online Service</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <a href="#x" class="twitter"><i class="bu bi-twitter"></i></a>
        <a href="#facebook" class="facebook"><i class="bu bi-facebook"></i></a>
        <a href="https://www.instagram.com/pwdi2018?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="instagram"><i class="bu bi-instagram"></i></a>
        <!-- <a href="#" class="linkedin"><i class="bu bi-linkedin"></i></i></a> -->
      </div>
    </div>
  </header><!-- End Header -->

</body>

</html>