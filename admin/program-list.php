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
                          $sqlipl="SELECT * FROM `program` AS p JOIN `category` AS c ON p.category_id=c.category_id WHERE p.prog_id='$_GET[id]'";
                           $resultpl=mysqli_query($conn,$sqlipl);
                          $program=mysqli_fetch_assoc($resultpl);
                              ?>
                  <div class="card">
                <div class="card-body">
                  <!-- form -->
                <form method="POST" action="" enctype="multipart/form-data">
                  
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" name="titles" value="<?php echo $program['prog_name']; ?>" required />
                      </div>

                      <div class="form-group">
                    <label>Description</label>
                        <textarea class="form-control" name="description" placeholder="Enter description..." rows="3" required><?php echo $program['prog_description']; ?></textarea>
                      </div>

                    
                        <div class="form-group">
                        <label>Select category</label>
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="category">
                             <option selected value="<?php echo $program['category_id']; ?>"><?php echo $program['category_name']; ?></option>
                            <?php
                          $sqlicat="SELECT * FROM `category` WHERE category_status='Available' AND category_id != '$program[category_id]' ORDER BY category_name ASC";
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
                             <?php if ($program['prog_status'] == 'enable') {
                              // code...
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

                      <div class="card-action">
                  <button class="btn btn-md btn-success text-white"  type="submit" name="edit">Submit</button>&nbsp;<a href="program-list.php" class="btn btn-md btn-danger text-white">Back</a>
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
                    <h5 class="card-title">PROGRAM LIST</h5>
                    <span class="text-end">
                      <!-- Button to Open the Modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add Program</button>
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
                          <th class="text-white">Description</th>
                          <th class="text-white">Category</th>
                          <th class="text-white">Status</th>
                          <th class="text-white">Edit</th>
                          <th class="text-white">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sqli="SELECT * FROM `program` AS p JOIN `category` AS c ON c.category_id=p.category_id ORDER BY p.prog_status ASC, p.prog_name ASC";
                           $result=mysqli_query($conn,$sqli);
                           $count=mysqli_num_rows($result);
                           $i=1;
                           while ($i<=$count){
                           while ($row=mysqli_fetch_assoc($result)){
                              ?>
                              <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['prog_name']; ?></td>
                          <td><?php echo $row['prog_description']; ?></td>
                          <td><?php echo $row['category_name']; ?></td> 
                          <td><?php echo $row['prog_status']; ?></td> 
                          <!-- <td> -->
                          <form method="POST" action="" class="form-inline">
                              <td>
                                  <input type="text" name="sid" value="<?php echo $row['prog_id']; ?>" hidden>
                                <a href="program-list.php?id=<?php echo $row['prog_id']; ?>" class="btn btn-sm btn-success text-white"><span class="fas fa-edit"></span></a></td>

                            <td><button onclick="return confirm('Are you sure you want to delete <?php echo $row['prog_name'];  ?>')" type="submit" name="delete" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span></button></td>
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
                          <th>Description</th>
                          <th>Category</th>
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
        <h4 class="modal-title">Add Program form</h4>
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
                        <label>Select category</label
                        >
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
                            style="width: 100%; height: 36px" name="status" required>
                            <option selected value="" selected>Select</option>
                              <option value="enable">Enable</option>
                              <option value="disable">Disabled</option>
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
  
    $title = mysqli_real_escape_string($conn, $_POST['titles']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

      $sqli="INSERT INTO `program`(`category_id`, `prog_name`, `prog_description`, `prog_status`) VALUES ('$category','$title','$description','$status')";

      $result=mysqli_query($conn,$sqli);
              if ($result== TRUE) {
                              ?>
                                  <script type="text/javascript">  
                                    window.location='program-list.php';
                                    alert('Program added successfully.');
                                  </script>
                              <?php
               }
      }

             if (isset($_POST['delete'])){
                     $sid = mysqli_real_escape_string($conn, $_POST['sid']);
                        // delete events
                          $sqld="DELETE FROM program  WHERE prog_id='$sid'";

                      $resultd=mysqli_query($conn,$sqld);
                              if ($resultd == TRUE){
                                              ?>
                                                  <script type="text/javascript">  
                                                    window.location='program-list.php';
                                                    alert('Program deleted successfully.');
                                                  </script>
                                              <?php
                               }

                      }
       ?>

       <?php
 //program edit

if (isset($_POST['edit'])){
  
    $title = mysqli_real_escape_string($conn, $_POST['titles']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    $sqliep="UPDATE `program` SET `category_id`='$category', `prog_name`='$title', `prog_description`='$description', `prog_status`='$status' WHERE prog_id='$_GET[id]'";

      $resultep=mysqli_query($conn,$sqliep);
              if ($resultep== TRUE) {
                              ?>
                                  <script type="text/javascript">  
                                    window.location='program-list.php';
                                    alert('Program updated successfully.');
                                  </script>
                              <?php
               }
      }

?>
