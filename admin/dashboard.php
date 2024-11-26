<!DOCTYPE html>
<html dir="ltr" lang="en">
  <?php
     include_once 'include/pwdi_db.php';
     include 'header.php';

  ?>
  <body>
     <?php
      include 'button.php';
     ?>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title">Website Dashboard</h4>
                      <!-- <h5 class="card-subtitle">Website dashboard</h5> -->
                    </div>
                  </div>
                  <?php
                     $sqlu="SELECT * FROM `staff`";
                     $resultu=mysqli_query($conn,$sqlu);
                     $countu=mysqli_num_rows($resultu);

                     $sqlv="SELECT * FROM `voluntary`";
                     $resultv=mysqli_query($conn,$sqlv);
                     $countv=mysqli_num_rows($resultv);

                      $sqlvn="SELECT * FROM `voluntary` WHERE voluntary_status='new'";
                     $resultvn=mysqli_query($conn,$sqlvn);
                     $countvn=mysqli_num_rows($resultvn);

                     $sqlsl="SELECT * FROM `slide`";
                     $resultsl=mysqli_query($conn,$sqlsl);
                     $countsl=mysqli_num_rows($resultsl);

                     $sqlgl="SELECT * FROM `gallery`";
                     $resultgl=mysqli_query($conn,$sqlgl);
                     $countgl=mysqli_num_rows($resultgl);

                     $sqlev="SELECT * FROM `events`";
                     $resultev=mysqli_query($conn,$sqlev);
                     $countev=mysqli_num_rows($resultev);

                     $sqlpg="SELECT * FROM `program`";
                     $resultpg=mysqli_query($conn,$sqlpg);
                     $countpg=mysqli_num_rows($resultpg);

                     $sqlcon="SELECT * FROM `contact`";
                     $resultcon=mysqli_query($conn,$sqlcon);
                      $countcon=mysqli_num_rows($resultcon);

                     $sqlsub="SELECT * FROM `subscriber` WHERE sub_status='active'";
                     $resultsub=mysqli_query($conn,$sqlsub);
                      $countsub=mysqli_num_rows($resultsub);
                   ?>
                      <div class="row">
                        <div class="col-4">
                          <a href="enroll-user.php" style="text-decoration: none;">
                          <div class="bg-success p-10 text-white text-center">
                            <i class="mdi mdi-account-plus fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $countu; ?></h5>
                            <small class="font-light">Registered Users</small>
                          </div>
                          </a>
                        </div>
                        <div class="col-4">
                           <a href="voluntary-list.php" style="text-decoration: none;">
                          <div class="bg-danger p-10 text-white text-center">
                            <i class="fas fa-users fs-3 mt-1 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $countv; ?></h5>
                            <small class="font-light">Volunteers</small>
                          </div>
                        </a>
                        </div>
                           <div class="col-4">
                             <a href="voluntary-list.php" style="text-decoration: none;">
                          <div class="bg-success p-10 text-white text-center">
                            <i class="fas fa-users fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $countvn; ?></h5>
                            <small class="font-light">New Volunteers</small>
                          </div>
                        </a>
                        </div>
                        <div class="col-4  mt-3">
                           <a href="slides-list.php" style="text-decoration: none;">
                          <div class="bg-danger p-10 text-white text-center">
                            <i class="mdi mdi-image-multiple fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $countsl; ?></h5>
                            <small class="font-light">Slides</small>
                          </div>
                        </a>
                        </div>
                        <div class="col-4 mt-3">
                           <a href="gallary-list.php" style="text-decoration: none;">
                          <div class="bg-info p-10 text-white text-center">
                            <i class="fas fa-images fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $countgl; ?></h5>
                            <small class="font-light">Gallery</small>
                          </div>
                        </a>
                        </div>

                        <div class="col-4 mt-3">
                           <a href="event-list.php" style="text-decoration: none;">
                          <div class="bg-danger p-10 text-white text-center">
                            <i class="mdi mdi-table fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $countev; ?></h5>
                            <small class="font-light">Events</small>
                          </div>
                        </a>
                        </div>
                        <div class="col-4 mt-3">
                           <a href="program-list.php" style="text-decoration: none;">
                          <div class="bg-success p-10 text-white text-center">
                            <i class="fas fa-list fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $countpg; ?></h5>
                            <small class="font-light">Programs</small>
                          </div>
                        </a>
                        </div>
                        <div class="col-4 mt-3">
                           <a href="contact-list.php" style="text-decoration: none;">
                          <div class="bg-danger p-10 text-white text-center">
                            <i class="fas fa-user fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $countcon; ?></h5>
                            <small class="font-light">Contact us</small>
                          </div>
                        </a>
                        </div>
                        <div class="col-4 mt-3">
                           <a href="subscribers-list.php" style="text-decoration: none;">
                          <div class="bg-success p-10 text-white text-center">
                            <i class="fas fa-bell fs-3 mb-1 font-16"></i>
                            <h5 class="mb-0 mt-1"><?php echo $countsub; ?></h5>
                            <small class="font-light">New Subsribers</small>
                          </div>
                        </a>
                        </div>
                      </div>
                    <!-- column -->
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- ============================================================== -->
        </div>

        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
    <!-- restrict multiple resubmition on page reload -->
<script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null,null,window.location.href);
    }
</script>
  </body>
</html>
