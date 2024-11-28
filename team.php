<?php
include "header.php";
$page2 = "Structure";
$page = "About";
?>
<style>
  /* General Reset */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .tree ul {
    padding-top: 20px;
    position: relative;
    transition: all 0.5s;
    display: flex;
    /* Use flexbox for responsiveness */
    justify-content: center;
    /* Center child elements */
    flex-wrap: wrap;
    /* Allow wrapping on smaller screens */
  }

  .tree li {
    list-style-type: none;
    text-align: center;
    position: relative;
    padding: 20px 5px 0 5px;
    display: flex;
    flex-direction: column;
    /* Stack elements vertically */
    align-items: center;
    transition: all 0.5s;
  }

  /* Draw connectors */
  .tree li::before,
  .tree li::after {
    content: '';
    position: absolute;
    top: 0;
    right: 50%;
    border-top: 1px solid #ccc;
    width: 50%;
    height: 20px;
  }

  .tree li::after {
    right: auto;
    left: 50%;
    border-left: 1px solid #ccc;
  }

  /* Remove connectors for single children */
  .tree li:only-child::after,
  .tree li:only-child::before {
    display: none;
  }

  /* Adjust connectors for first and last children */
  .tree li:first-child::before,
  .tree li:last-child::after {
    border: none;
  }

  .tree li:last-child::before {
    border-right: 1px solid #ccc;
  }

  .tree li:first-child::after {
    border-radius: 5px 0 0 0;
  }

  /* Downward connectors */
  .tree ul ul::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    border-left: 1px solid #ccc;
    width: 0;
    height: 20px;
  }

  /* Links styling */
  .tree li a {
    border: 1px solid #ccc;
    padding: 5px 10px;
    text-decoration: none;
    color: #666;
    font-family: Arial, Verdana, Tahoma;
    font-size: 20px;
    display: inline-block;
    border-radius: 5px;
    transition: all 0.5s;
  }

  /* Hover effects */
  .tree li a:hover,
  .tree li a:hover+ul li a {
    background: #c8e4f8;
    color: #000;
    border: 1px solid #94a0b4;
  }

  /* Connector hover effects */
  .tree li a:hover+ul li::after,
  .tree li a:hover+ul li::before,
  .tree li a:hover+ul::before,
  .tree li a:hover+ul ul::before {
    border-color: #94a0b4;
  }

  /* Media Queries for Responsiveness */
  @media (max-width: 768px) {
    .tree ul {
      padding-top: 10px;
      flex-wrap: wrap;
    }

    .tree li {
      padding: 10px 5px;
    }

    .tree li a {
      font-size: 16px;
      /* Adjust font size for smaller screens */
      padding: 5px;
    }

    .tree li::before,
    .tree li::after {
      width: 25%;
      /* Reduce connector width */
    }

    .tree ul ul::before {
      height: 10px;
      /* Reduce downward connector height */
    }
  }

  @media (max-width: 480px) {
    .tree ul {
      flex-direction: column;
      /* Stack everything vertically */
      align-items: center;
    }

    .tree li {
      padding: 10px 0;
    }

    .tree li a {
      font-size: 14px;
      /* Further adjust font size */
      padding: 5px;
    }

    .tree li::before,
    .tree li::after {
      width: 15%;
      /* Narrow connectors for very small screens */
    }

    .tree ul ul::before {
      height: 5px;
      /* Further reduce downward connector height */
    }
  }
</style>
<?php
include_once "pwdi_db.php";
$page = 'team.php';
?>

<body>
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Organization Structure</h2>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <!--organization structure  -->
    <section>
      <!-- <div>
      </div> -->
      <div class="min-vw-80 min-vh-60 d-flex justify-content-center" data-aos="fade-right">
              <img src="assets/img/organization-structure.JPG" style="height: 100%; width: 100%;">
        <ul>
          <!-- <li>
            <a href="#">Annual General Meeting(AGM)</a>
            <ul>
              <li>
                <a href="#">BOARD</a>
                <ul>
                  <li>
                    <a href="#">EXECUTIVE DORECTOR</a>
                    <ul>

                      <li>
                        <a href="#">PROGRAM OFFICE</a>
                        <ul>
                          <li>
                            <a href="#">ASSISTANT PO</a>
                          </li>
                        </ul>
                      </li>

                      <li>
                        <a href="#">FINANCE AND ADMIN OFFICER</a>
                        <ul>
                          <li>
                            <a href="#">SECRETARY</a>
                          </li>
                          <li>
                            <a href="#">ACCOUNTANT</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li> -->
            </ul>
      </div>
      <div class="container" data-aos="fade-left">
        <div class="row">
          <div class="text-part col-md-12">
            <h2>About Our Organization
              <hr>
            </h2>
            <p style="text-align:justify;">PWDI is a Civil Society Organization, Non-Profit and Non-Governmental initiated in 2018 to help spearhead community driven development initiatives and enable needy community groups especially women, youth participate in integrated activities to achieve quality livelihood and be self-sustainable. PWDI delivers its activities through the power and spirit of volunteerism approach to build sustainable communities / intercultural exchange and thriving villages in our country.</p>
            <p style="text-align:justify;"> Our main purpose is to advocate for the attainment of social transformation with equality and social justice in pastoral communities, to empower pastoral women to demand their rights on social services like land, education, health, and water, to promote and support women and girl’s education as a tool for women freedom and success, to facilitate the provision of advice and counseling on HIV/AIDS and reproductive health and advocate for good governance and sustainable collection, allocation and use of resources within the area. </p>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Our Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h3><strong>Our Team</strong></h3>
          <!-- <p>Meet PWDI Team</p> -->
        </div>

        <div class="row">

          <?php
          $sqli = "SELECT * FROM staff WHERE staff_status='active'";
          $result = mysqli_query($conn, $sqli);
          while ($row = mysqli_fetch_assoc($result)) {
            $photo = 'staff/' . $row['staff_photo'];
            // echo $photo;
          ?>

            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member" data-aos="fade-up" data-aos-delay="100">
                <!-- <center> -->
                <div class="member-img">
                  <div style="

              background-image:url('<?php echo $photo; ?>');
              background-position:center center;
              background-repeat:no-repeat;
              background-size: cover;
              background: cover;
              height: 40vh;
               width: 40vh;
                            "></div>
                </div>
                <!-- </center> -->
                <div class="member-info">
                  <h4><?php echo $row['staff_name']; ?></h4>
                  <span><?php echo $row['staff_title']; ?></span>
                </div>
              </div>
            </div>

          <?php
          }
          ?>
        </div>

        <div class="row">
        </div>
      </div>
    </section>
  </main><!-- End #main -->
</body>
<?php
include "footer.php"
?>

</html>