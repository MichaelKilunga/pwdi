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
            if (!empty($_GET['id'])) {
              // edit program form
              ?>
                  <?php
                          $sqlipl="SELECT * FROM `category` WHERE category_id='$_GET[id]'";
                           $resultpl=mysqli_query($conn,$sqlipl);
                          $category=mysqli_fetch_assoc($resultpl);
                              ?>
                  <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-center">Edit category</h3>
                  <!-- form -->
                <form method="POST" action="" enctype="multipart/form-data">
                  
                      <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" placeholder="Enter your category" name="category" value="<?php echo $category['category_name']; ?>" required />
                        <input type="text" class="form-control" placeholder="Enter your category" name="oldcategory" value="<?php echo $category['category_name']; ?>" hidden required />
                      </div>

                    
                      
                        <div class="form-group">
                        <label>Select status</label
                        >
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="status">
                            <option selected value="" selected>Select</option>
                             <?php if ($category['category_status'] == 'Available') {
                              // code...
                              ?>
                              <option selected>Available</option>
                              <option >Not Available</option>
                            <?php }else{
                              ?>
                              <option >Available</option>
                              <option selected>Not Available</option>
                              <?php
                            }
                            ?>
                          </select>
                      </div>

                      <div class="card-action">
                  <button class="btn btn-md btn-success text-white"  type="submit" name="edit">Submit</button>&nbsp;<a href="category-list.php" class="btn btn-md btn-danger text-white">Back</a>
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
                    <h5 class="card-title">CATEGORY LIST</h5>
                    <span class="text-end">
                      <!-- Button to Open the Modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add Category</button>
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
                          <th class="text-white">Name</th>
                          <th class="text-white">Modified Date</th>
                          <th class="text-white">Status</th>
                          <th class="text-white">Edit</th>
                          <th class="text-white">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sqli="SELECT * FROM `category` ORDER BY category_status ASC,category_posteddate DESC, category_name ASC";
                           $result=mysqli_query($conn,$sqli);
                           $count=mysqli_num_rows($result);
                           $i=1;
                           while ($i<=$count){
                           while ($row=mysqli_fetch_assoc($result)){
                              ?>
                              <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['category_name']; ?></td>
                          <td><?php echo $row['category_posteddate']; ?></td> 
                          <td><?php echo $row['category_status']; ?></td> 
                          <!-- <td> -->
                          <form method="POST" action="" class="form-inline">
                              <td>
                                  <input type="text" name="cid" value="<?php echo $row['category_id']; ?>" hidden>
                                <a href="category-list.php?id=<?php echo $row['category_id']; ?>" class="btn btn-sm btn-success text-white"><span class="fas fa-edit"></span></a></td>

                            <td><button onclick="return confirm('Are you sure you want to delete <?php echo $row['category_name'];  ?>')" type="submit" name="delete" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span></button></td>
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
                          <th>Name</th>
                          <th>Modified Date</th>
                          <th>Status</th>
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
        <h4 class="modal-title">Add category form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="card">
                <div class="card-body">
                  <!-- form -->
                <form method="POST" action="" enctype="multipart/form-data">
                  
                      <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" placeholder="Enter your category" name="category" required />
                      </div>

                        <div class="form-group">
                        <label>Select status</label
                        >
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="status" required>
                            <option selected value="" selected>Select current status</option>
                              <option value="Available">Available</option>
                              <option value="Not Available">Not Aavailable</option>
                          </select>
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

      </div>

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

    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

     //check if category name altready exist
      $check="SELECT * FROM category WHERE category_name='$category'";
        $result_check=mysqli_query($conn,$check);
        $count_check=mysqli_num_rows($result_check);
              if ($count_check == 1){
                     ?>
                                  <script type="text/javascript">  
                                    window.location='category-list.php';
                                    alert('<?php echo $category;  ?> category  already exist, please check it and try again. Thank you');
                                  </script>
                              <?php 
              }else{
   
      $sqli="INSERT INTO `category`(`category_name`, `category_posteddate`, `category_status`) VALUES ('$category',now(),'$status')";

      $result=mysqli_query($conn,$sqli);
              if ($result== TRUE) {
                              ?>
                                  <script type="text/javascript">  
                                    window.location='category-list.php';
                                    alert('Category added successfully.');
                                  </script>
                              <?php
               }
             }
      }

             if (isset($_POST['delete'])){
                     $cid = mysqli_real_escape_string($conn, $_POST['cid']);
                        // delete events
                          $sqld="DELETE FROM category  WHERE category_id='$cid'";

                      $resultd=mysqli_query($conn,$sqld);
                              if ($resultd == TRUE){
                                              ?>
                                                  <script type="text/javascript">  
                                                    window.location='category-list.php';
                                                    alert('Category deleted successfully.');
                                                  </script>
                                              <?php
                               }

                      }
       ?>

       <?php
 //program edit

if (isset($_POST['edit'])){
  
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $oldcategory = mysqli_real_escape_string($conn, $_POST['oldcategory']);
    
    if ($category == $oldcategory){
      // no category changes
        $sqliep="UPDATE `category` SET `category_posteddate`=now(), `category_status`='$status' WHERE category_id='$_GET[id]'";
    }else{
      //there is category changes
      $check="SELECT * FROM category WHERE category_name='$category'";
        $result_check=mysqli_query($conn,$check);
        $count_check=mysqli_num_rows($result_check);
              if ($count_check == 1){
                     ?>
                                  <script type="text/javascript">  
                                    window.location='category-list.php';
                                    alert('<?php echo $category;  ?> category  already exist, please check it and try again. Thank you');
                                  </script>
                              <?php 
              }else{
    $sqliep="UPDATE `category` SET `category_name`='$category',`category_posteddate`=now(), `category_status`='$status' WHERE category_id='$_GET[id]'";
        }
   }

      $resultep=mysqli_query($conn,$sqliep);
              if ($resultep== TRUE) {
                              ?>
                                  <script type="text/javascript">  
                                    window.location='category-list.php';
                                    alert('Category updated successfully.');
                                  </script>
                              <?php
               }
      }

?>
