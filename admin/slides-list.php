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

          <?php if(!empty($_GET['id'])){
            // after click edit
                          $sqlis="SELECT * FROM `slide` WHERE slide_id='$_GET[id]'";
              
                           $results=mysqli_query($conn,$sqlis);
                           $slide=mysqli_fetch_assoc($results);
                            
            ?>
    <!-- Modal body -->
      <div class="modal-body">
            <div class="card">
                <div class="card-body">
                  <h3 class="modal-title text-center">Edit slide form</h3>
                  <!-- form -->
                <form method="POST" action="" enctype="multipart/form-data">
                  
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" name="titles"value="<?php echo $slide['slide_title']; ?>" required />
                      </div>

                      <div class="form-group">
                    <label>Description</label>
                        <!-- <input type="text" class="form-control" placeholder="Enter description" name="description" required /> -->
                        <textarea class="form-control" name="description" placeholder="Enter description..." rows="3" required><?php echo $slide['slide_description']; ?></textarea>
                      </div>

                        <div class="form-group">
                        <label>Select status</label
                        >
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="status">
                            <option selected value="" selected>Select</option>
                            <?php if($slide['slide_status'] == 'enable'){
                              ?>
                              <option value="enable" selected>Enable</option>
                              <option value="disable">Disabled</option>
                              <?php
                            }else{
                              ?>
                              <option value="enable">Enable</option>
                              <option value="disable" selected>Disabled</option>
                              <?php
                            } ?>
                          </select>
                      </div>

                        <div class="form-group">
                        <label>Upload slide photo</label><br>
                        <input type="file" class="custom-file-input" name="file" accept="image/*"/>
                      </div>

                      <div class="card-action">
                  <button class="btn btn-md btn-success text-white"  type="submit" name="edit">Submit</button>&nbsp;<a href="slides-list.php" class="btn btn-md btn-danger text-white">Back</a> 
                </div>
                </form>
                <!-- form -->
                </div>
              </div>
            <?php
                }else{
            ?>
   <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
              
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <h5 class="card-title">SLIDES PHOTO LIST</h5>
                    <span class="text-end">
                      <!-- Button to Open the Modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add slide</button>
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
                          <th class="text-white">Title</th>
                          <th class="text-white">Description</th>
                          <th class="text-white">Status</th>
                          <th class="text-white">Photo</th>
                          <th class="text-white">Edit</th>
                          <th class="text-white">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sqli="SELECT * FROM `slide` ORDER BY slide_status ASC, slide_title ASC";
              
                           $result=mysqli_query($conn,$sqli);
                           $count=mysqli_num_rows($result);
                           $i=1;
                           while ($i<=$count){
                           while ($row=mysqli_fetch_assoc($result)){
                              ?>
                              <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['slide_title']; ?></td>
                          <td><?php echo $row['slide_description']; ?></td>
                          <td><?php echo $row['slide_status']; ?></td> 
                          <td><img src="<?php echo $row['slide_photo']; ?>" class="shadow p-0 mb-0 bg-body rounded" width="100" height="60"></td>
                          <form method="POST" action="" class="form-inline">
                              <td>
                                <input type="text" name="sid" value="<?php echo $row['slide_id']; ?>" hidden>
                                <a href="slides-list.php?id=<?php echo $row['slide_id']; ?>" class="btn btn-sm btn-success text-white"><span class="fas fa-edit"></span></a></td>

                            <td><button onclick="return confirm('Are you sure you want to delete <?php echo $row['slide_title'];  ?>')" type="submit" name="delete" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span></button></td>
                            
                          </form>
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
                          <th>Title</th>
                          <th>Description</th>
                          <th>Status</th>
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
        <h4 class="modal-title">Slide register</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="card">
                <div class="card-body">
                  <!-- form -->
                  <form method="POST" action="" enctype="multipart/form-data">
                  
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" name="titles" required />
                      </div>

                      <div class="form-group">
                    <label>Description</label>
                        <!-- <input type="text" class="form-control" placeholder="Enter description" name="description" required /> -->
                        <textarea class="form-control" name="description" placeholder="Enter description..." rows="3" required></textarea>
                      </div>

                        <div class="form-group">
                        <label>Select status</label
                        >
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="status">
                            <option selected value="" selected>Select</option>
                              <option value="enable">Enable</option>
                              <option value="disable">Disabled</option>
                          </select>
                      </div>

                        <div class="form-group">
                        <label>Upload slide photo</label><br>
                        <input type="file" class="custom-file-input" name="file" accept="image/*" required />
                      </div>

                      <div class="card-action">
                  <button class="btn btn-md btn-success text-white"  type="submit" name="submit">Submit</button>&nbsp;<a href="slides-list.php" class="btn btn-md btn-danger text-white">Back</a> 
                </div>
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
        </div>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>

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
              // renaming of image by combining category, id, date and time
    $rename_file='slide'.'-'.$pdh.".".$extension[1];

    $path = '../slides/'.$rename_file;

    $title = mysqli_real_escape_string($conn, $_POST['titles']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

      $sqli="INSERT INTO `slide`(`slide_title`, `slide_description`, `slide_status`, `slide_photo`) VALUES ('$title','$description','$status','$path')";

      $result=mysqli_query($conn,$sqli);
              if ($result== TRUE) {
                       move_uploaded_file($_FILES['file']['tmp_name'], $path);
                              ?>
                                  <script type="text/javascript">  
                                    window.location='slides-list.php';
                                    alert('Slide uploaded successfully.');
                                  </script>
                              <?php
               }
      }

             if (isset($_POST['delete'])){
                     $sid = mysqli_real_escape_string($conn, $_POST['sid']);
                        // activate deactivated user
                          $sqld="DELETE FROM slide  WHERE slide_id='$sid'";

                      $resultd=mysqli_query($conn,$sqld);
                              if ($resultd == TRUE){
                                              ?>
                                                  <script type="text/javascript">  
                                                    window.location='slides-list.php';
                                                    alert('Slide deleted successfully.');
                                                  </script>
                                              <?php
                               }

                      }
       ?>

       <?php
 //edit slide

if (isset($_POST['edit'])){
    //call time for making picture uploaded unique.
    date_default_timezone_set('Africa/Nairobi');
    $pdh=date('Ymd').'_'.date('His');

    $file = $_FILES['file']['name'];

     // define photo extension ie .png, .jpg
    $extension = explode("/", $_FILES["file"]["type"]);
              // renaming of image by combining category, id, date and time
    $rename_file='slide'.'-'.$pdh.".".$extension[1];
    $path = '../slides/'.$rename_file;

    $title = mysqli_real_escape_string($conn, $_POST['titles']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
      if($_FILES['file']['size'] != 0){
     $sqlius="UPDATE `slide` SET `slide_title`='$title', `slide_description`='$description', `slide_status`='$status', `slide_photo`='$path' WHERE slide_id='$_GET[id]'";
    }else{
      $sqlius="UPDATE `slide` SET `slide_title`='$title', `slide_description`='$description', `slide_status`='$status' WHERE slide_id='$_GET[id]'";
    }

      $resultus=mysqli_query($conn,$sqlius);
              if ($resultus== TRUE) {
                if($_FILES['file']['size'] != 0){
                       move_uploaded_file($_FILES['file']['tmp_name'], $path);
                     }
                              ?>
                                  <script type="text/javascript">  
                                    window.location='slides-list.php';
                                    alert('Slide updated successfully.');
                                  </script>
                              <?php
               }
      }
      ?>
