
<?php 
$page = "Contact";
include "header.php";
 include_once "pwdi_db.php";
$page='contact.php';
?>
<body>
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact Us</h2>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <div class="map-section">
      <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13225.698757831542!2d37.6625047!3d-6.8281071!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185a5d50f0e1b28f%3A0xe3f494a8fe95cda1!2sSKYLINK%20SOLUTIONS!5e1!3m2!1sen!2stz!4v1728459070741!5m2!1sen!2stz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- <iframe src="" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Location:</h4>
                  <p>B.115 Soko Kuu la Kingalu<br>Morogoro, P.O. Box 1354</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>info@pwdi.or.tz<br>contact@pwdi.or.tz</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="bi bi-phone"></i>
                  <h4>Call:</h4>
                  <p>+255 (0) 783775452<br></p>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10 card p-4 bg-white shadow p-3 mb-5 bg-body rounded">
            <form action="" method="post" role="form" >
              <div class="row">
                <p class="h4 text-center">For any enquiry and suggestion please fill this form.</p>
                <hr class="p-2 mt-3 text-success">
                 <div class="col-md-4 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                  <div class="col-md-4 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your phone" required>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea> 
              </div>
              <div class="text-center mt-3"><button type="submit" name="submit" class="btn btn-success btn-md text-white">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
  </main><!-- End #main -->
  <?php
  include "footer.php"
  ?>
</body>

</html>

<?php
// include_once 'include/pwdi_db.php';

if (isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);

      $sqliv="INSERT INTO `contact`(`contact_name`, `contact_email`, `contact_phone`, `contact_subject`, `contact_message`, `contact_date`, `contact_status`) VALUES ('$name','$email','$phone','$subject','$message',now(),'new')";
      $resultv=mysqli_query($conn,$sqliv);
              if ($resultv== TRUE) {
                              ?>
                                  <script type="text/javascript">  
                                    window.location='<?php echo $page; ?>';
                                    alert('Message sent successfully. Thank you');
                                  </script>
                              <?php
               }
      }
?>