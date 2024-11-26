<!DOCTYPE html>
<html dir="ltr" lang="en">
      <?php
   include 'header.php';
   include_once 'include/pwdi_db.php';
  ?>
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

            <?php
   if(!empty($_GET['id'])){
      ?>
       <?php
                          $sqliu="SELECT * FROM staff WHERE staff_id='$_GET[id]'";
                           $resultu=mysqli_query($conn,$sqliu);;
                           $user=mysqli_fetch_assoc($resultu);
                              ?>
    <!--   <script type="text/javascript">
        alert('Id ipo');
      </script> -->
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-center">Edit user details</h3>
                  <!-- form -->
                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Fullname</label>
                        <input type="text" class="form-control" placeholder="Enter fullname" name="fullname" value="<?php echo $user['staff_name']; ?>" required />
                      </div>
                      <div class="form-group">
                        <label>Title</label>
                         <input type="text" class="form-control" placeholder="Enter title" name="titles" value="<?php echo $user['staff_title']; ?>" required />
                      </div>
                        <div class="form-group">
                        <label> Email</label>

                        <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php echo $user['staff_email']; ?>" required />
                        <input type="email" class="form-control" placeholder="Enter email" name="email2" value="<?php echo $user['staff_email']; ?>" required hidden/>
                      </div>

                      <div class="form-group">
                        <label>Ability to login</label
                        >
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="ability">
                            <option value="" selected>Select ability</option>
                            <?php if($user['staff_ability'] == 'Yes'){
                              ?>
                              <option selected>Yes</option>
                              <option>No</option>
                              <?php
                            }else{
                               ?>
                              <option >Yes</option>
                              <option selected>No</option>
                              <?php
                            } ?>
                          </select>
                      </div>

                        <div class="form-group">
                        <label>Select status</label
                        >
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="status">
                            <option value="" selected>Select</option>
                               <?php if($user['staff_status'] == 'active'){
                              ?>
                              <option value="active" selected>Active</option>
                              <option value="inactive">Inactive</option>
                              <?php
                            }else{
                               ?>
                              <option value="active">Active</option>
                              <option value="inactive" selected>Inactive</option>
                              <?php
                            } ?>
                          </select>
                      </div>

                        <div class="form-group">
                        <label>Upload photo</label><br>
                        <input type="file" class="custom-file-input" name="file" accept="image/*"/>
                      </div>

                      <div class="card-action">
                  <button class="btn btn-md btn-success text-white"  type="submit" name="edit">Submit</button>&nbsp;<a href="enroll-user.php" class="btn btn-md btn-danger text-white">Back</a>
                </div>
                </form>
                <!-- form -->
                </div>
              </div>
      <?php
   }else{
          ?>
      
  
          <div class="row">
            <div class="col-12">
              
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <h5 class="card-title">STAFF LIST ENROLLED</h5>
                    <span class="text-end">
                      <!-- Button to Open the Modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Register user</button>
                    </span>

                    <hr class="mt-2">
                  </div>
                  <div class="table-responsive">
                         <!-- id="zero_config" -->
                    <table
                      id="zero_config"
                      class="table table-hover table-sm"
                    >
                      <thead>
                        <tr class="bg-success">
                          <th class="text-white">Sn</th>
                          <th class="text-white">Fullname</th>
                          <th class="text-white">Email</th>
                          <th class="text-white">Title</th>
                          <th class="text-white">Status</th>
                          <th class="text-white">Login ability</th>
                          <th class="text-white">Photo</th>
                          <th class="text-white">Edit</th>
                          <th class="text-white">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sqli="SELECT * FROM staff ORDER BY staff_status ASC";
                           $result=mysqli_query($conn,$sqli);
                           $count=mysqli_num_rows($result);
                           $i=1;
                           while ($i<=$count){
                           while ($row=mysqli_fetch_assoc($result)){
                              ?>
                              <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['staff_name']; ?></td>
                          <td><?php echo $row['staff_email']; ?></td>
                          <td><?php echo $row['staff_title']; ?></td>
                          <td><?php echo $row['staff_status']; ?></td> 
                          <td><?php echo $row['staff_ability']; ?></td> 
                          <td><img src="<?php echo $row['staff_photo']; ?>" class="shadow p-0 mb-0 bg-body rounded" style="height: 11vh; width: 10vh;"></td>
                          <!-- <td> -->
                          <form method="POST" action="" class="form-inline">
                            <td><a href="enroll-user.php?id=<?php echo $row['staff_id']; ?>"  class="btn btn-sm btn-success text-white"><span class="fas fa-edit"></span></a></td>
                              <td>
                                <?php 
                                  if ($_SESSION['admin_id'] == $row['staff_id']){
                                    // code...
                                    ?>
                                      <button type="submit" name="delete" class="btn btn-sm btn-danger text-white" disabled><span class="fas fa-trash" ></span>
                                      </button>
                                <?php
                                  }else{
                                ?>
                                <input type="text" name="sid" value="<?php echo $row['staff_id']; ?>" hidden>
                                <button  onclick="return confirm('Are you sure you want to delete <?php echo $row['staff_name'];  ?>')" type="submit" name="delete" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span></button>
                              <?php } ?>
                              </td>
                          </form>
                        <!-- </td> -->
                        </tr>
                      <?php
                             $i++;
                              }
                            }
                         ?>
                      </tbody>
                       <tfoot>
                         <tr>
                          <th>Sn</th>
                          <th>Fullname</th>
                          <th>Email</th>
                          <th>Title</th>
                          <th>Status</th>
                          <th>Login ability</th>
                          <th>Photo</th>
                          <th>Edit</th>
                          <th>Delete</th>
                         </tr>
                       </tfoot> 
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

              <?php
   } 
  ?>


          <!-- Modal -->
<!-- The Modal -->
<div class="modal fade" data-bs-backdrop="static" id="myModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Register user</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="card">
                <div class="card-body">
                  <!-- form -->
                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Fullname</label>
                        <input type="text" class="form-control" placeholder="Enter fullname" name="fullname" required />
                      </div>
                      <div class="form-group">
                        <label>Title</label>
                         <input type="text" class="form-control" placeholder="Enter title" name="titles" required />
                      </div>
                        <div class="form-group">
                        <label> Email</label>

                        <input type="email" class="form-control" placeholder="Enter email" name="email" required />
                      </div>

                      <div class="form-group">
                        <label>Ability to login</label
                        >
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="ability">
                            <option value="" selected>Select ability</option>
                              <option>Yes</option>
                              <option>No</option>
                          </select>
                      </div>

                        <div class="form-group">
                        <label>Select status</label
                        >
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="status">
                            <option value="" selected>Select</option>
                              <option value="active">Active</option>
                              <option value="inactive">Inactive</option>
                          </select>
                      </div>

                        <div class="form-group">
                        <label>Upload photo</label><br>
                        <input type="file" class="custom-file-input" name="file" accept="image/*" required/>
                      </div>

                      <div class="card-action">
                  <button class="btn btn-md btn-success text-white"  type="submit" name="submit">Submit</button>
                </div>

                <p class="text-danger mt-2">NB: Default password will be user email.</p>
                </form>
                <!-- form -->
                </div>
              </div>
                  <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>     
      </div>
    </div>

    </div>
  </div>
</div>
<!-- modal end -->


          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
 <!--        <footer class="footer text-center">
          All Rights Reserved by Matrix-admin. Designed and Developed by
          <a href="https://www.wrappixel.com">WrapPixel</a>.
        </footer> -->
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    <!-- </div> -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
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

if (isset($_POST['submit'])){

    //call time for making picture uploaded unique.
    date_default_timezone_set('Africa/Nairobi');
    $pdh=date('Ymd').'_'.date('His');

     $file = $_FILES['file']['name'];

     // define photo extension ie .png, .jpg
    $extension = explode("/", $_FILES["file"]["type"]);
              // renaming of image by combining name date and time
    $rename_file='user'.'-'.$pdh.".".$extension[1];
    $path = '../staff/'.$rename_file;

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $title = mysqli_real_escape_string($conn, $_POST['titles']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $ability = mysqli_real_escape_string($conn, $_POST['ability']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password=md5($email);

     $find="SELECT * FROM staff WHERE staff_email='$email'";
     $resultfind=mysqli_query($conn,$find);
     $countfind=mysqli_num_rows($resultfind);
     if ($countfind > 0){
       // allow to add user if email does not exist
         ?>
            <script type="text/javascript">  
              window.location='enroll-user.php';
              alert('User email already exist, please check it and try again.');
            </script>
        <?php
     }else{
        // email not occupied add user
      $sqli="INSERT INTO `staff`(`staff_name`,`staff_email`, `staff_password`, `staff_ability`, `staff_title`, `staff_photo`, `staff_status`) VALUES ('$fullname','$email','$password','$ability','$title','$path','$status')";
      $result=mysqli_query($conn,$sqli);
              if ($result== TRUE){
                       move_uploaded_file($_FILES['file']['tmp_name'], $path);
                              ?>
                                  <script type="text/javascript">  
                                    window.location='enroll-user.php';
                                    alert('User uploaded successfully.');
                                  </script>
                              <?php
                       }
                }
          }

                if (isset($_POST['delete'])){
     $sid = mysqli_real_escape_string($conn, $_POST['sid']);
        // activate deactivated user
          $sqld="DELETE FROM staff  WHERE staff_id='$sid'";

      $resultd=mysqli_query($conn,$sqld);
              if ($resultd == TRUE){
                              ?>
                                  <script type="text/javascript">  
                                    window.location='enroll-user.php';
                                    alert('User deleted successfully.');
                                  </script>
                              <?php
               }

      }
?>


<?php
// edit user

if (isset($_POST['edit'])){

    //call time for making picture uploaded unique.
    date_default_timezone_set('Africa/Nairobi');
    $pdh=date('Ymd').'_'.date('His');

     $file = $_FILES['file']['name'];

     // define photo extension ie .png, .jpg
    $extension = explode("/", $_FILES["file"]["type"]);
              // renaming of image by combining name date and time
    $rename_file='user'.'-'.$pdh.".".$extension[1];
    $path = '../staff/'.$rename_file;

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $title = mysqli_real_escape_string($conn, $_POST['titles']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $ability = mysqli_real_escape_string($conn, $_POST['ability']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $email2 = mysqli_real_escape_string($conn, $_POST['email2']);

     if ($email2 != $email){
       // new emwil check
      $find="SELECT * FROM staff WHERE staff_email='$email' ";
     $resultfind=mysqli_query($conn,$find);
     $countfind=mysqli_num_rows($resultfind);
     }else{
       $countfind=0;
     }
     
     if ($countfind > 0){
       // allow to add user if email does not exist
         ?>
            <script type="text/javascript">  
              window.location='enroll-user.php';
              alert('User email already exist, please check it and try again.');
            </script>
        <?php
     }else{
      if($_FILES['file']['size'] != 0){
        // email not occupied add user
      $sqli="UPDATE `staff` SET `staff_name`='$fullname',`staff_email`='$email', `staff_ability`='$ability', `staff_title`='$title', `staff_photo`='$path', `staff_status`='$status' WHERE staff_id='$_GET[id]'";

    }else{
          // email not occupied add user
      $sqli="UPDATE `staff` SET `staff_name`='$fullname',`staff_email`='$email', `staff_ability`='$ability', `staff_title`='$title',`staff_status`='$status' WHERE staff_id='$_GET[id]'";
    }

      $result=mysqli_query($conn,$sqli);
              if ($result== TRUE){
                if($_FILES['file']['size'] != 0){
                       move_uploaded_file($_FILES['file']['tmp_name'], $path);
                     }
                              ?>
                                  <script type="text/javascript">  
                                    window.location='enroll-user.php';
                                    alert('User updated successfully.');
                                  </script>
                              <?php
                       }
                }
          }
?>