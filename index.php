<?php
$page = "Home";
include "header.php";
include_once "pwdi_db.php";
$page = 'index.php';
?>
<style>
  /*--------------------------------------------------------------
  # Featured Services
  --------------------------------------------------------------*/
  .featured-services {
    padding: 20px 0;
  }

  .featured-services .icon-box {
    padding: 20px;
  }

  .featured-services .icon-box-bg {
    background-image: linear-gradient(0deg, #222222 0%, #2f2f2f 50%, #222222 100%);
  }

  .featured-services .icon {
    margin-bottom: 15px;
  }

  .featured-services .icon i {
    color: #5cb874;
    font-size: 42px;
  }

  .featured-services .title {
    font-weight: 700;
    margin-bottom: 15px;
    font-size: 18px;
  }

  .featured-services .title a {
    color: #222222;
    transition: 0.3s;
  }

  .featured-services .icon-box:hover .title a {
    color: #5cb874;
  }

  .featured-services .description {
    line-height: 24px;
    font-size: 14px;
  }

  /*--------------------------------------------------------------
  # Cta
  --------------------------------------------------------------*/
  .cta {
    background: #5cb874;
    padding: 80px 0;
  }

  .cta h3 {
    color: #fff;
    font-size: 28px;
    font-weight: 700;
  }

  .cta p {
    color: #fff;
  }

  .cta .cta-btn {
    font-family: "Raleway", sans-serif;
    font-weight: 600;
    font-size: 14px;
    letter-spacing: 1px;
    display: inline-block;
    padding: 10px 30px;
    border-radius: 2px;
    transition: 0.5s;
    margin: 10px;
    border: 2px solid #fff;
    color: #fff;
    border-radius: 4px;
  }

  .cta .cta-btn:hover {
    background: #fff;
    color: #5cb874;
  }

  @media (max-width: 1024px) {
    .cta {
      background-attachment: scroll;
    }
  }

  @media (min-width: 769px) {
    .cta .cta-btn-container {
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }

    .carousel-item {
      margin-top: 4em;
    }
  }

  /*--------------------------------------------------------------
  # About
  --------------------------------------------------------------*/
  .about .icon-boxes h4 {
    font-size: 18px;
    color: #4b7dab;
    margin-bottom: 15px;
  }

  .about .icon-boxes h3 {
    font-size: 28px;
    font-weight: 700;
    color: #2c4964;
    margin-bottom: 15px;
  }

  .about .icon-box {
    margin-top: 40px;
  }

  .about .icon-box .icon {
    float: left;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 64px;
    height: 64px;
    border: 2px solid #8dc2f1;
    border-radius: 50px;
    transition: 0.5s;
  }

  .about .icon-box .icon i {
    color: #1977cc;
    font-size: 32px;
  }

  .about .icon-box:hover .icon {
    background: #1977cc;
    border-color: #1977cc;
  }

  .about .icon-box:hover .icon i {
    color: #fff;
  }

  .about .icon-box .title {
    margin-left: 85px;
    font-weight: 700;
    margin-bottom: 10px;
    font-size: 18px;
  }

  .about .icon-box .title a {
    color: #343a40;
    transition: 0.3s;
  }

  .about .icon-box .title a:hover {
    color: #1977cc;
  }

  .about .icon-box .description {
    margin-left: 85px;
    line-height: 24px;
    font-size: 14px;
  }

  .about .video-box {
    background: url("../img/about.jpg") center center no-repeat;
    background-size: cover;
    min-height: 500px;
  }

  .about .play-btn {
    width: 94px;
    height: 94px;
    background: radial-gradient(#1977cc 50%, rgba(25, 119, 204, 0.4) 52%);
    border-radius: 50%;
    display: block;
    position: absolute;
    left: calc(50% - 47px);
    top: calc(50% - 47px);
    overflow: hidden;
  }

  .about .play-btn::after {
    content: "";
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translateX(-40%) translateY(-50%);
    width: 0;
    height: 0;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 15px solid #fff;
    z-index: 100;
    transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
  }

  .about .play-btn::before {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    -webkit-animation-delay: 0s;
    animation-delay: 0s;
    -webkit-animation: pulsate-btn 2s;
    animation: pulsate-btn 2s;
    -webkit-animation-direction: forwards;
    animation-direction: forwards;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    -webkit-animation-timing-function: steps;
    animation-timing-function: steps;
    opacity: 1;
    border-radius: 50%;
    border: 5px solid rgba(25, 119, 204, 0.7);
    top: -15%;
    left: -15%;
    background: rgba(198, 16, 0, 0);
  }

  .about .play-btn:hover::after {
    border-left: 15px solid #1977cc;
    transform: scale(20);
  }

  .about .play-btn:hover::before {
    content: "";
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translateX(-40%) translateY(-50%);
    width: 0;
    height: 0;
    border: none;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 15px solid #fff;
    z-index: 200;
    -webkit-animation: none;
    animation: none;
    border-radius: 0;
  }

  @-webkit-keyframes pulsate-btn {
    0% {
      transform: scale(0.6, 0.6);
      opacity: 1;
    }

    100% {
      transform: scale(1, 1);
      opacity: 0;
    }
  }

  @keyframes pulsate-btn {
    0% {
      transform: scale(0.6, 0.6);
      opacity: 1;
    }

    100% {
      transform: scale(1, 1);
      opacity: 0;
    }
  }

  /*--------------------------------------------------------------
  # Counts
  --------------------------------------------------------------*/
  .counts {
    background: #f1f7fd;
    padding: 70px 0 60px;
  }

  .counts .count-box {
    padding: 30px 30px 25px 30px;
    width: 100%;
    position: relative;
    text-align: center;
    background: #fff;
  }

  .counts .count-box i {
    position: absolute;
    top: -25px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 20px;
    background: #1977cc;
    color: #fff;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
  }

  .counts .count-box span {
    font-size: 36px;
    display: block;
    font-weight: 600;
    color: #082744;
  }

  .counts .count-box p {
    padding: 0;
    margin: 0;
    font-family: "Raleway", sans-serif;
    font-size: 14px;
  }

  .bg-03 {
    position: relative;
    padding: 3.125rem 0;
    background: #fafafa;
    overflow: hidden;
  }

  .bg-03 .wrapper {
    position: relative;
    display: block;
    margin: 1.25rem 0;
    padding: 1.25rem;
  }

  .bg-03 .wrapper .content {
    text-align: center;
  }

  .bg-03 .wrapper .content ol li {
    display: block;
  }

  .bg-03 .wrapper .content ol li i {
    font-size: 1.875rem;
    color: #fd580b;
    margin: .625rem 0;
    display: block;
  }

  .bg-03 .wrapper .content ol li h3 {
    font-size: 1.25rem;
    color: #222222;
    font-weight: 600;
  }

  .bg-03 .wrapper .content ol li p {
    display: block;
    margin: .625rem 0;
    color: #373738;
    font-size: 1rem;
  }


  #activities-sec {
    display: block;
    width: 100%;
    background: url(assets/img/act-bg.jpg);
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    margin: 60px 0;
    padding: 60px 0;
  }

  #activities-sec h1,
  #activities-sec h4,
  #activities-sec h5 {
    color: #fff;
  }

  #activities-sec h4 {
    text-transform: uppercase;
    font-size: 18px;
    line-height: 18px;
  }

  #activities-sec hr {
    width: 150px;
    border: 2px solid #fff;
  }

  #activities-sec p {
    margin: 10px 0 0 0;
    color: #fff;
  }

  #activities-sec a {
    margin: 15px 0 0 0;
    color: #fff;
    font-weight: 700;
    border: 2px solid #fff;
    display: inline-block;
    border-radius: 3px;
    padding: 5px 10px;
  }

  #activities-sec a:hover {
    color: #ec1d25;
    background: #fff;
  }

  #activities-sec .top-off {
    margin-top: 40px;
  }

  #activities-sec .grid-content-left {
    float: left;
    margin-right: 20px;
  }

  #activities-sec .grid-content-left i {
    height: 80px;
    line-height: 80px;
    width: 80px;
    background: #fff;
    text-align: center;
    font-size: 36px;
    color: #ec1d25;
    transition: all 0.3s ease-in-out;
  }

  #activities-sec .grid-content-wrapper {
    float: right;
    width: 72%;
  }

  #activities-sec .top-off:hover .grid-content-left i {
    border-radius: 50%;
  }


  .bg-01 {
    position: relative;
    margin-top: -5rem;
    width: 100%;
  }

  .bg-01 .wrapper {
    background: #fff;
    position: relative;
    padding: 2.5rem 1.875rem;
    display: block;
    width: 100%;
    box-shadow: 0 16px 28px 0 rgba(0, 0, 0, 0.15);
    z-index: 9;
  }

  .bg-01 .wrapper .content {
    display: block;
    position: relative;
    transition: all ease-in-out 0.5s;
    margin: .625rem 0;
  }

  .bg-01 .wrapper .content ol .dashed {
    border-right: 1px dashed #ddd;
  }

  .bg-01 .wrapper .content ol li {
    display: inline-block;
    position: relative;
    padding: .625rem 0;
  }

  .bg-01 .wrapper .content ol li i {
    display: block;
    font-size: 2.5rem;
    color: #fd580b;
  }

  .bg-01 .wrapper .content ol li h3 {
    font-size: 1.25rem;
    color: #222222;
    text-transform: capitalize;
    font-weight: 600;
    display: inline-block;
    margin: .625rem 0;
  }

  .bg-01 .wrapper .content ol li p {
    display: block;
    font-size: 1rem;
    color: #373738;
    line-height: 1.5rem;
  }

  .about-001 {
    padding: 3.125rem 0;
    position: relative;
    overflow: hidden;
    background: #fafafa;
  }

  .about-001 .text-part,
  .about-001 .image-part {
    position: relative;
    margin: 1.25rem 0;
  }

  .about-001 .text-part h2,
  .about-001 .image-part h2 {
    font-weight: 600;
    font-size: 1.8rem;
    margin-bottom: 20px;
    color: #222222;
  }

  .about-001 .text-part p,
  .about-001 .image-part p {
    text-indent: 20px;
    margin-bottom: 15px;
    line-height: 27px;
    font-weight: 500;
    text-align: justify;
    font-size: .9rem;
  }

  .about-001 .text-part .about-qcard,
  .about-001 .image-part .about-qcard {
    padding: 50px 30px;
    background-color: #FFF;
    box-shadow: 0 2px 3px 0 rgba(218, 218, 253, 0.35), 0 0px 3px 0 rgba(206, 206, 238, 0.35);
    text-align: center;
    margin-bottom: 30px;
  }

  .about-001 .text-part .about-qcard i,
  .about-001 .image-part .about-qcard i {
    font-size: 3rem;
    margin-bottom: 30px;
    color: #fd580b;
  }

  .about-001 .text-part .about-qcard p,
  .about-001 .image-part .about-qcard p {
    font-weight: 600;
    font-size: 1.2rem;
  }

  .carousel-item {
    /* height: 60vh; */
    min-height: 350px;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    cursor: pointer;
  }

  .second-color {
    background-color: #D95E0F;
  }
</style>

<body data-spy="scroll" data-target=".bonyeza" data-offset="50">
  <!-- ======= Hero Section ======= -->
  <!-- Navigation -->
  <header>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

      <div class="carousel-indicators">
        <?php
        $sqli2 = "SELECT * FROM `slide` WHERE slide_status='enable' ORDER BY slide_title ASC";
        $result2 = mysqli_query($conn, $sqli2);
        $count2 = mysqli_num_rows($result2);
        $i = 0;
        while ($i < $count2) {
          while ($row2 = mysqli_fetch_assoc($result2)) {
        ?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" <?php if ($i == 0) {
                                                                                                                    echo ' class="active"';
                                                                                                                  } else {
                                                                                                                  }
                                                                                                                  ?> aria-current="true" aria-label="Slide 1"></button>
        <?php
            $i++;
          }
        }
        ?>
      </div>

      <div class="carousel-inner">
        <?php
        $sqli = "SELECT * FROM `slide` WHERE slide_status='enable' ORDER BY slide_title ASC";
        $result = mysqli_query($conn, $sqli);
        $count = mysqli_num_rows($result);
        $i = 0;
        while ($i < $count) {
          while ($row = mysqli_fetch_assoc($result)) {
            $slide_photo = 'slides/' . $row['slide_photo'];
        ?>
            <div <?php if ($i == 0) {
                    echo 'class="carousel-item active"';
                  } else {
                    echo 'class="carousel-item"';
                  } ?> style="background-image: url(<?php echo $slide_photo; ?>);">
              <!-- <div class="col-lg-10# card# bg-white# py-4# px-4# shadow# p-3# mb-5# bg-body# rounded#"> -->
              <div class="carousel-caption card second-color p-2 margin opacity-75">
                <h5><?php echo $row['slide_title']; ?></h5>
                <p><?php echo $row['slide_description']; ?></p>
              </div>
              <!-- </div> -->
            </div>
        <?php
            //end slide
            $i++;
          }
        }
        ?>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </header>

  <br>
  <section id="cta" class="cta">
    <div class="container">

      <div class="row">
        <div class="col-lg-9 text-center text-lg-start">
          <h3>Collaborative and partnership is our priority</h3>
          <p>The organization partners with village government in implementing activities on voluntary basis.</p>
        </div>
        <div class="col-lg-3 cta-btn-container text-center bonyeza">
          <a class="cta-btn align-middle" href="#voluntary.form">Become voluntary</a>
        </div>
      </div>
    </div>
  </section><!-- End Cta Section -->

  <!-- ======================Bg-01 started====================== -->
  <section class="bg-01">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="wrapper">
            <div class="row">
              <h3 style="color: green;">Basic Strategies </h3>
              <hr>
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="content">
                  <ol>
                    <li class="dashed">
                      <i class="fal fa-hands-usd"></i>
                      <h3>women and men</h3>
                      <p>Use of volunteers’ services from local communities and use of influential traditional leaders (women and men).</p>
                    </li>
                  </ol>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="content">
                  <ol>
                    <li class="dashed">
                      <i class="fal fa-funnel-dollar"></i>
                      <h3>Fundrising</h3>
                      <p>Use of women groups (VICOBA) .</p>
                    </li>
                  </ol>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="content">
                  <ol>
                    <li>
                      <i class="fal fa-person-sign"></i>
                      <h3>Cooperations</h3>
                      <p>Linkages and collaboration with like minded organization .</p>
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- area of operation................................................ -->

  <!-- Page Content -->
  <section class="py-0">
    <div class="container">
      <h3 class="fw-light">ACTIVITIES</h3>
      <hr>
      <p class="lead">Our activities based on social works which are children, women and mens</p>
      <!-- </div><hr style="margin-right: 9em; margin-left: 9em;"> -->
  </section>
  <main id="main">
    <div class="service-section big-padding">
      <div class="container">
        <div class="service-row row">
          <div class="col-md-4 mb-3">
            <div class="row">
              <div class="col-2 align-self-center pe-0">
                <i class="bi text-success fs-1 bi-bank" style=" color: green;"></i>
              </div>
              <div class="col-10">
                <h4 class="fs-6 fw-bold mt-3">Microfinance</h4>
                <p>Mobilizing community groups in a service network of savings and loans for community based microfinance.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="row">
              <div class="col-2 align-self-center pe-0">
                <i class="bi fs-1 text-success bi bi-capsule" style=" color: green;"></i>
              </div>
              <div class="col-10">
                <h4 class="fs-6 fw-bold mt-3">Human Diseases</h4>
                <p>HIV & AIDS, Malaria and TB awareness, counseling, support innovative programmes in orphans and vulnerable children and home based health care (HBC) for the HIV affected.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="row">
              <div class="col-2 align-self-center pe-0">
                <i class="bi fs-1 text-success bi-book-half"></i>
              </div>
              <div class="col-10">
                <h4 class="fs-6 fw-bold mt-3">Education</h4>
                <p>Mobilize community success school enrollment,Eco-tourism and environmental management.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="row">
              <div class="col-2 align-self-center pe-0">
                <i class="bi fs-1 text-success bi bi-calculator"></i>
              </div>
              <div class="col-10">
                <h4 class="fs-6 fw-bold mt-3">School Clubs</h4>
                <p>Establishment of environment and land rights school clubs,Programmes for cultural exchange, Community library for reading, borrowing and exchange of ideas.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="row">
              <div class="col-2 align-self-center pe-0">
                <i class="bi fs-1 text-success"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M96 224l0 32 0 160c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-88.2c9.9 6.6 20.6 12 32 16.1l0 24.2c0 8.8 7.2 16 16 16s16-7.2 16-16l0-16.9c5.3 .6 10.6 .9 16 .9s10.7-.3 16-.9l0 16.9c0 8.8 7.2 16 16 16s16-7.2 16-16l0-24.2c11.4-4 22.1-9.4 32-16.1l0 88.2c0 17.7 14.3 32 32 32l32 0c17.7 0 32-14.3 32-32l0-160 32 32 0 49.5c0 9.5 2.8 18.7 8.1 26.6L530 427c8.8 13.1 23.5 21 39.3 21c22.5 0 41.9-15.9 46.3-38l20.3-101.6c2.6-13-.3-26.5-8-37.3l-3.9-5.5 0-81.6c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 14.4-52.9-74.1C496 86.5 452.4 64 405.9 64L272 64l-16 0-64 0-48 0C77.7 64 24 117.7 24 184l0 54C9.4 249.8 0 267.8 0 288l0 17.6c0 8 6.4 14.4 14.4 14.4C46.2 320 72 294.2 72 262.4l0-6.4 0-32 0-40c0-24.3 12.1-45.8 30.5-58.9C98.3 135.9 96 147.7 96 160l0 64zM560 336a16 16 0 1 1 32 0 16 16 0 1 1 -32 0zM166.6 166.6c-4.2-4.2-6.6-10-6.6-16c0-12.5 10.1-22.6 22.6-22.6l178.7 0c12.5 0 22.6 10.1 22.6 22.6c0 6-2.4 11.8-6.6 16l-23.4 23.4C332.2 211.8 302.7 224 272 224s-60.2-12.2-81.9-33.9l-23.4-23.4z" fill="#14A44D" />
                  </svg></i>
              </div>
              <div class="col-10">
                <h4 class="fs-6 fw-bold mt-3">Tenure security</h4>
                <p>PWDI believes that land rights and tenure security is a cornerstone for a sustainable pastoralists and farming communities living in harmony. To achieve that PWDI will undertake land rights and tenure security programs through capacity building interventions to community especially women, and youth. Formation of leadership forums and provision of Certificates of Customary Rights of Occupancy (CCROs) to individuals and groups of pastoralists.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="row">
              <div class="col-2 align-self-center pe-0">
                <i class="bi  fs-1 text-success bi-shield-shaded"></i>
              </div>
              <div class="col-10">
                <h4 class="fs-6 fw-bold mt-3">Volunteers</h4>
                <p>A volunteer program deploying of volunteers and places villagers in groups charged with specific community tasks in relation to their skills, strengths, and interests.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="row">
              <div class="col-2 align-self-center pe-0">
                <i class="bi text-success fs-1  bi-bar-chart-steps"></i>
              </div>
              <div class="col-10">
                <h4 class="fs-6 fw-bold mt-3">Idea Exchange</h4>
                <p> Community library for reading, borrowing and exchange of ideas.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="row">
              <div class="col-2 align-self-center pe-0">
                <i class="bi text-success fs-1 bi bi-clipboard-data"></i>
              </div>
              <div class="col-10">
                <h4 class="fs-6 fw-bold mt-3">AVP Programs</h4>
                <p>Alternative to violence peace trainings (AVP) for the community members.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="row">
              <div class="col-2 align-self-center pe-0">
                <i class="bi text-success fs-1 bi bi-person-fill"></i>
              </div>
              <div class="col-10">
                <h4 class="fs-6 fw-bold mt-3">Empowerment</h4>
                <p>Youth empowerment activities such as sports, theatre, career development and drug abuse training, as well as building overall awareness and engagement through youth group projects..</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="py-10" id="voluntary.form">
      <div class="container">
        <div class="row">
          <div class="">
            <h4 class="fw-light">AREA OF OPERATION</h4>
            <hr>
            <p class="lead">Our Organization operates across all over the country. Request for voluntary, Fill the application form below</p>
          </div>
          <div class="col-lg-6">
            <div class="contact-from mt-20">
              <div class="main-form pt-10">
                <div class="">
                  <center><img src="assets/img/map/nchi1.png" class="mt-4"></center>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="contact row mt-0 justify-content-center p-2" data-aos="fade-up">
              <div class="col-lg-10 card bg-white py-4 px-4 shadow p-3 mb-5 bg-body rounded">
                <form action="" method="post" role="form" enctype="multipart/form-data">
                  <div class="row">
                    <p class="text-center text-dark h3">Voluntary Form</p>
                    <div class="col-md-12 form-group mt-3">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6 form-group mt-3">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                    <div class="col-md-6 form-group mt-3">
                      <input type="text" name="phonenumber" class="form-control" id="name" placeholder="Your phone number" required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="3" placeholder="Message" required></textarea>
                  </div>
                  <div class="form-group mt-3">
                    <label for="label">Upload your attachment</label>
                    <input type="file" class="form-control custom-file-input" name="file" accept=".pdf" required />
                  </div>
                  <div class="text-center mt-3"><button type="submit" name="submit" class="btn btn-md btn-success text-white">Send Message</button></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="about-001">
      <div class="container">
        <div class="row">
          <div class="text-part col-md-6">
            <h2>Needed Support</h2>
            <p style="text-align: justify;">The organization still depend on volunteers to implement activities without funding, hence financial and technical support is highly welcomed from likeminded organizations and individuals.</p>

            <p>PWDI is a Civil Society Organization, Non-Profit and Non-Governmental initiated to help spearhead community driven development initiatives and enable needy community groups especially women, youth participate in integrated activities to achieve quality livelihood and be self-sustainable.</p>

            <p> PWDI delivers its activities through the power and spirit of volunteerism approach to build sustainable communities / intercultural exchange and thriving villages in our country.</p>
          </div>
          <div class="image-part col-md-6">
            <div class="about-quick-box row">
              <div class="col-md-6">
                <div class="about-qcard">
                  <!-- <i class="fas fa-user"></i> -->
                  <i class="bi bi-shield-shaded" style=" color: green;"></i>
                  <p>Becom a Volunteer</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-qcard ">
                  <i class="bi bi-cash-coin" style=" color: green;"></i>
                  <p>Quick Fundrais</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-qcard ">
                  <i class="bi bi-briefcase" style=" color: green;"></i>
                  <p>Give Donation</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-qcard ">
                  <div class="icon"><i class="bi bi-bar-chart-line" style=" color: green;"></i></div>
                  <p>Help Someone</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php
  include "footer.php"
  ?>
  <script>
    $(document).ready(function() {
      $('body').scrollspy({
        target: ".bonyeza",
        offset: 50
      });
    });
  </script>
</body>

</html>


<?php
// include_once 'include/pwdi_db.php';

if (isset($_POST['submit'])) {
  //call time for making picture uploaded unique.
  date_default_timezone_set('Africa/Nairobi');
  $pdh = date('Ymd') . '_' . date('His');

  $file = $_FILES['file']['name'];

  // define photo extension ie .png, .jpg
  $extension = explode("/", $_FILES["file"]["type"]);
  // renaming of image by combining category, id, date and time
  $rename_file = 'attachments' . '-' . $pdh . "." . $extension[1];
  $actualpath = 'attachments/' . $rename_file;
  $path = '../attachments/' . $rename_file;

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);
  $subject = mysqli_real_escape_string($conn, $_POST['subject']);

  $sqliv = "INSERT INTO `voluntary`(`voluntary_fullname`, `voluntary_email`, `voluntary_phone`, `voluntary_subject`, `voluntary_message`, `voluntary_attachment`, `voluntary_date`, `voluntary_status`) VALUES ('$name','$email','$phonenumber','$subject','$message','$path',now(),'new')";
  $resultv = mysqli_query($conn, $sqliv);

  move_uploaded_file($_FILES['file']['tmp_name'], $actualpath);
  if ($resultv == TRUE) {

?>
    <script type="text/javascript">
      window.location = 'index.php';
      alert('Voluntary request received successfully.');
    </script>
<?php
  }
}
?>