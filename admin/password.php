<!DOCTYPE html>
<html dir="ltr" lang="en">
      <?php
   include 'header.php';
   include_once 'include/pwdi_db.php';
  ?>
  <script type="text/javascript">
  function checkpass()
  {
  if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
  {
   alert('New password and confirm new password is mismatch.');

  document.changepassword.confirmpassword.focus();
  return false;
  }
  return true;
  } 
</script>
    

  <body>
    <?php
   include 'button.php';
  ?>

      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->


                <!-- Modal body -->
                <div class="modal-body">
                      <div class="card">
                          <div class="card-body">
                            <h3 class="card-title text-center">Change password form</h3>
                            <!-- form -->
                          <form method="POST" name="changepassword" onsubmit="return checkpass();">
                            
                                <div class="form-group">
                                  <label>Current password</label>
                                  <input type="password" class="form-control" placeholder="Enter current Password" name="currentpassword" required />
                                </div>

                               <div class="form-group">
                                  <label>New password</label>
                                  <input type="password" class="form-control" placeholder="Enter new password" name="newpassword" required />
                                </div>

                                  <div class="form-group">
                                  <label>Confirm New password</label>
                                  <input type="password" class="form-control" placeholder="Enter again new password" name="confirmpassword" required />
                                </div>
                                  
                                <div class="card-action">
                            <button class="btn btn-md btn-success text-white"  type="submit" name="password">Submit</button>&nbsp;  <button class="btn btn-md btn-danger text-white"  type="reset" name="password">Reset</button>
                          </div>
                          </form>
                          <!-- form -->
                          </div>
                        </div>
              </div>



          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->

        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
    </script>
    <!-- restrict multiple resubmition on page reload -->
<script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null,null,window.location.href);
    }
</script>
  </body>
</html>

<?php
// include_once 'include/pwdi_db.php';

if (isset($_POST['password'])){

    //call time for making picture uploaded unique.
    $current_password = mysqli_real_escape_string($conn, $_POST['currentpassword']);
    $new_password = mysqli_real_escape_string($conn, $_POST['newpassword']);
    $current_password2=md5($current_password);
    $new_password2 = md5($new_password);

     $check="SELECT * FROM staff WHERE staff_id='$_SESSION[admin_id]' AND staff_password='$current_password2'";
     $resultcheck=mysqli_query($conn,$check);
     $countcheck=mysqli_num_rows($resultcheck);
     if ($countcheck <= 0){
       // allow to add user if email does not exist
         ?>
            <script type="text/javascript">  
              window.location='password.php';
              alert('Password entered is incorrectly.');
            </script>
        <?php
       }else{

     $find="UPDATE `staff` SET `staff_password`='$new_password2' WHERE staff_id='$_SESSION[admin_id]'";
     $resultfind=mysqli_query($conn,$find);
     // $countfind=mysqli_num_rows($resultfind);
     if ($resultfind == TRUE){
       // allow to add user if email does not exist
         ?>
            <script type="text/javascript">  
              window.location='password.php';
              alert('Your password, updated successfully');
            </script>
        <?php
       }
     }
  }
?>