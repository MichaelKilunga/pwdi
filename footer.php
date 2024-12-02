<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <?php
          $sqli = "SELECT * FROM `contact-info`";
          $result = mysqli_query($conn, $sqli);
          $row_contact = mysqli_fetch_assoc($result);

          ?>
          <h3>PWDI Company</h3>
          <p>
            <?php echo $row_contact['info_location']; ?> <br>
            <?php echo $row_contact['info_address']; ?><br>
            United Republic of Tanzania <br><br>
            <span class="mt-1"><strong>Mobile Phone:</strong> <?php echo $row_contact['info_phone']; ?><br><?php echo $row_contact['info_altenativephone']; ?><br><br>
              <strong>Email:</strong> <?php echo $row_contact['info_email']; ?><br><?php echo $row_contact['info_altenativeemail']; ?><br>
          </p>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="about.php">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="gallary.php">Gallery</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Events and Programs</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="program.php">Program</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="events.php">Events</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#terms-and-condition.php">Terms of service</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#privacy-and-policy.php">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>Subscribe</h4>
          <p>Add Email for subscription </p>
          <form action="" method="post">
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="submit" value="Submit" name="subscriber">
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="container d-md-flex py-4">

    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; Copyright <strong><span>Company</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://skylinksolutions.co.tz/">Skylink Solutions</a>
      </div>
    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
      <a href="#x" class="twitter"><i class="bx bxl-twitter"></i></a>
      <a href="#facebook" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a href="https://www.instagram.com/pwdi2018?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="instagram"><i class="bx bxl-instagram"></i></a>
      <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<!-- restrict multiple resubmition on page reload -->
<script type="text/javascript">
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>

<?php
if (isset($_POST['subscriber'])) {
  //connect db
  include_once 'pwdi_db.php';

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  //check if an email exists
  $selectemail = "SELECT * FROM subscriber WHERE sub_email='$email'";
  $resultselect = mysqli_query($conn, $selectemail);
  $countselect = mysqli_num_rows($resultselect);
  if ($count >= 1) {
    $sqlis = "UPDATE `subscriber` SET sub_status='active', sub_date=now() WHERE sub_email='$email'";
  }else{
    $sqlis = "INSERT INTO `subscriber`(`sub_email`,`sub_status`, `sub_date`) VALUES ('$email','active',now())";
  }

  $results = mysqli_query($conn, $sqlis);
  if ($results == TRUE) {
    include_once('email.php');
    sendEmail("Thank you for subscribing, we appreciate your action!", "SUBSCRIBED SUCCESSFULLY!", $email);
?>
    <script type="text/javascript">
      window.location = '<?php echo $page; ?>';
      alert('You have subscribe successfully. Thank you');
    </script>
<?php
  }
}
?>