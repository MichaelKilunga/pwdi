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

          <?php
            if (!empty($_GET['id'])){
              // for editing option
              ?>
               <?php
                          $sqligg="SELECT * FROM `gallery` AS g JOIN `category` AS c ON c.category_id=g.category_id WHERE g.gallery_id='$_GET[id]'";
                           $resultgg=mysqli_query($conn,$sqligg);
                            $gallery=mysqli_fetch_assoc($resultgg);
                              ?>
                          <div class="card">
                <div class="card-body">
                  <!-- form -->
                   <h5 class="card-title text-center">Gallery Edit form</h5>
                <form method="POST" action="" enctype="multipart/form-data">
                  
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" name="titles" value="<?php echo $gallery['gallery_title']; ?>" required />
                      </div>

                      <div class="form-group">
                    <label>Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter description..." rows="3" required><?php echo $gallery['gallery_description']; ?></textarea>
                      </div>

                      <div class="form-group">
                        <label>Gallery category</label>
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="category">
                            <option selected value="" selected>Select category</option>
                              <option selected value="<?php echo $gallery['category_id']; ?>"><?php echo $gallery['category_name']; ?></option>
                            <?php
                          $sqlicat="SELECT * FROM `category` WHERE category_status='Available' AND category_id != '$gallery[category_id]' ORDER BY category_name ASC";
                           $resultcat=mysqli_query($conn,$sqlicat);
                           while ($rowcat=mysqli_fetch_assoc($resultcat)){
                                 ?>
                                 <option value="<?php echo $rowcat['category_id']; ?>"><?php echo $rowcat['category_name']  ?></option>
                                 <?php
                           }
                            ?>
                          </select>
                      </div>

                        <div class="form-group">
                        <label>Select status</label
                        >
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="status">
                            <option selected value="" selected>Select</option>
                            <?php
                               if($gallery['gallery_status'] == 'enable'){
                                ?>
                              <option value="enable" selected>Enable</option>
                              <option value="disable">Disabled</option>
                            <?php }else{
                               ?>
                                <option value="enable">Enable</option>
                              <option value="disable" selected>Disabled</option>
                               <?php
                             }
                              ?>
                          </select>
                      </div>

                        <div class="form-group">
                        <label>Upload gallery photo</label><br>
                        <input type="file" class="custom-file-input" name="file" accept="image/*"/>
                      </div>

                      <div class="card-action">
                  <button class="btn btn-md btn-success text-white"  type="submit" name="edit">Submit</button>&nbsp;<a href="gallary-list.php" class="btn btn-md btn-danger text-white">Back</a>
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
                    <h5 class="card-title">GALLERY PHOTO LIST</h5>
                    <span class="text-end">
                      <!-- Button to Open the Modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add Gallery</button>
                    </span>

                    <hr class="mt-2">
                  </div>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-hover table-sm"
                    >
                      <thead>
                        <tr class="bg-success">
                          <th class="text-white">Sn</th>
                          <th class="text-white">Title</th>
                          <th class="text-white">Description</th>
                          <th class="text-white">Category</th>
                          <th class="text-white">Status</th>
                          <th  class="text-white">Photo</th>
                          <th class="text-white">Action</th>
                          <th class="text-white">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sqli="SELECT * FROM `gallery` AS g JOIN `category` AS c ON g.category_id=c.category_id ORDER BY g.gallery_status ASC";
                           $result=mysqli_query($conn,$sqli);
                           $count=mysqli_num_rows($result);
                           $i=1;
                           while ($i<=$count){
                           while ($row=mysqli_fetch_assoc($result)){
                              ?>
                              <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['gallery_title']; ?></td>
                          <td><?php echo $row['gallery_description']; ?></td>
                          <td><?php echo $row['category_name']; ?></td>
                          <td><?php echo $row['gallery_status']; ?></td> 
                          <td><img src="<?php echo $row['gallery_photo']; ?>" class="shadow p-0 mb-0 bg-body rounded" width="100" height="60"></td>
                          <!-- <td> -->
                          <form method="POST" action="">
                             <td>
                             <input type="text" name="sid" value="<?php echo $row['gallery_id']; ?>" hidden>
                              <a href="gallary-list.php?id=<?php echo $row['gallery_id']; ?>"  class="btn btn-sm btn-success text-white"><span class="fas fa-edit"></span></a></td>

                              <td><button  onclick="return confirm('Are you sure you want to delete <?php echo $row['gallery_title'];  ?>')" type="submit" name="delete" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span></button></td>
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
                          <th>Title</th>
                          <th>Description</th>
                          <th>Category</th>
                          <th>Status</th>
                          <th>Photo</th>
                          <th>Action</th>
                          <th>Action</th>
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
        <h4 class="modal-title">Add gallery form</h4>
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
                        <textarea class="form-control" name="description" placeholder="Enter description..." rows="3" required></textarea>
                      </div>

                     <div class="form-group">
                        <label>Gallery category</label>
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="category" required>
                            <option selected value="" selected>Select category</option>
                            <?php
                          $sqlicat="SELECT * FROM `category` WHERE category_status='Available' ORDER BY category_name ASC";
                           $resultcat=mysqli_query($conn,$sqlicat);
                           while ($rowcat=mysqli_fetch_assoc($resultcat)){
                                 ?>
                                 <option value="<?php echo $rowcat['category_id']; ?>"><?php echo $rowcat['category_name']  ?></option>
                                 <?php
                           }
                            ?>
                          </select>
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
                        <label>Upload gallery photo</label><br>
                        <input type="file" class="custom-file-input" name="file" accept="image/*" required/>
                      </div>

                      <div class="card-action">
                  <button class="btn btn-md btn-success text-white"  type="submit" name="submit">Submit</button>
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
   <!--      <footer class="footer text-center">
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
    $rename_file='gallery'.'-'.$pdh.".".$extension[1];
    $path = '../gallery/'.$rename_file;

    $title = mysqli_real_escape_string($conn, $_POST['titles']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

      $sqli="INSERT INTO `gallery`(`gallery_title`, `category_id`, `gallery_description`, `gallery_photo`, `gallery_status`) VALUES ('$title','$category','$description','$path','$status')";

      $result=mysqli_query($conn,$sqli);
              if ($result== TRUE) {
                       move_uploaded_file($_FILES['file']['tmp_name'], $path);
                              ?>
                                  <script type="text/javascript">  
                                    window.location='gallary-list.php';
                                    alert('Gallery uploaded successfully.');
                                  </script>
                              <?php
               }
      }


   if (isset($_POST['delete'])){
           $sid = mysqli_real_escape_string($conn, $_POST['sid']);
              // activate deactivated gallery
                $sqld="DELETE FROM gallery  WHERE gallery_id='$sid'";

            $resultd=mysqli_query($conn,$sqld);
                    if ($resultd == TRUE){
                                    ?>
                                        <script type="text/javascript">  
                                          window.location='gallary-list.php';
                                          alert('Gallery deleted successfully.');
                                        </script>
                                    <?php
                     }

            }
?>

<?php
//edit gallery

if (isset($_POST['edit'])){

    //call time for making picture uploaded unique.
    date_default_timezone_set('Africa/Nairobi');
    $pdh=date('Ymd').'_'.date('His');

    $file = $_FILES['file']['name'];

     // define photo extension ie .png, .jpg
    $extension = explode("/", $_FILES["file"]["type"]);
              // renaming of image by combining name date and time
    $rename_file='gallery'.'-'.$pdh.".".$extension[1];
    $path = '../gallery/'.$rename_file;

    $title = mysqli_real_escape_string($conn, $_POST['titles']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

     if ($_FILES['file']['size'] != 0){
       // empty file
      $sqligl="UPDATE  `gallery` SET `gallery_title`='$title', `category_id`='$category', `gallery_description`='$description', `gallery_photo`='$path', `gallery_status`='$status' WHERE gallery_id='$_GET[id]'";
     }else{
    $sqligl="UPDATE  `gallery` SET `gallery_title`='$title', `category_id`='$category', `gallery_description`='$description',`gallery_status`='$status' WHERE gallery_id='$_GET[id]'";
     }
      

      $resultgl=mysqli_query($conn,$sqligl);
              if ($resultgl== TRUE) {
                  if ($_FILES['file']['size'] != 0){
                       move_uploaded_file($_FILES['file']['tmp_name'], $path);
                     }
                              ?>
                                  <script type="text/javascript">  
                                    window.location='gallary-list.php';
                                    alert('Gallery updated successfully.');
                                  </script>
                              <?php
               }
      }
      ?>

