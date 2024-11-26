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
          <?PHP 
             if (!empty($_GET['id'])){
               // edit event form
              ?>
                  <?php
                          $sqlieve="SELECT * FROM `events` WHERE events_id='$_GET[id]'";
                           $resulteve=mysqli_query($conn,$sqlieve);
                           $event=mysqli_fetch_assoc($resulteve);
                              ?>
                      <!-- Modal body -->
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title text-center">Event edit form</h4>

                  <!-- form -->
                <form method="POST" action="" enctype="multipart/form-data">
                  
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" name="titles" value="<?php echo $event['events_title']; ?>" required />
                      </div>

                      <div class="form-group">
                    <label>Description</label>
                        <!-- <input type="text" class="form-control" placeholder="Enter description" name="description" required /> -->
                        <textarea class="form-control" name="description" placeholder="Enter description..." rows="3" required><?php echo $event['events_description']; ?></textarea>
                      </div>

                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" placeholder="Enter event date" name="event_date" value="<?php echo $event['events_date']; ?>" required />
                      </div>

                        <div class="form-group">
                        <label>Select status</label
                        >
                           <select
                            class="select2 form-select shadow-none"
                            style="width: 100%; height: 36px" name="status">
                            <option selected value="" selected>Select</option>
                            <?php if($event['events_status']=='enable'){ ?>
                              <option value="enable" selected>Enable</option>
                              <option value="disable">Disabled</option>
                            <?php }else{
                              ?>
                              <option value="enable">Enable</option>
                              <option value="disable" selected>Disabled</option>
                              <?php
                            } ?>
                          </select>
                      </div>

                      <div class="card-action">
                  <button class="btn btn-md btn-success text-white"  type="submit" name="edit">Submit</button>&nbsp;<a href="event-list.php" class="btn btn-md btn-danger text-white">Back</a>
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
                    <h5 class="card-title">EVENT LIST</h5>
                    <span class="text-end">
                      <!-- Button to Open the Modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add Event</button>
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
                          <th class="text-white">Date</th>
                          <th class="text-white">Status</th>
                          <th class="text-white">Edit</th>
                          <th class="text-white">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sqli="SELECT * FROM `events` ORDER BY events_date DESC,events_status ASC, events_title ASC";
                           $result=mysqli_query($conn,$sqli);
                           $count=mysqli_num_rows($result);
                           $i=1;
                           while ($i<=$count){
                           while ($row=mysqli_fetch_assoc($result)){
                              ?>
                              <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['events_title']; ?></td>
                          <td><?php echo $row['events_description']; ?></td>
                          <td><?php echo $row['events_date']; ?></td> 
                          <td><?php echo $row['events_status']; ?></td> 
                          
                          <form method="POST" action="" class="form-inline">
                              <td>
                                <input type="text" name="sid" value="<?php echo $row['events_id']; ?>" hidden>
                                <a href="event-list.php?id=<?php echo $row['events_id']; ?>" class="btn btn-sm btn-success text-white"><span class="fas fa-edit"></span></a></td>

                            <td><button onclick="return confirm('Are you sure you want to delete <?php echo $row['events_title'];  ?>')" type="submit" name="delete" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span></button></td>
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
                          <th>Date</th>
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
        <h4 class="modal-title">Add event form</h4>
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
                        <label>Date</label>
                        <input type="date" class="form-control" placeholder="Enter event date" name="event_date" required />
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
  
    $title = mysqli_real_escape_string($conn, $_POST['titles']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);

      $sqli="INSERT INTO `events`( `events_title`, `events_description`, `events_date`, `events_status`) VALUES ('$title','$description','$event_date','$status')";

      $result=mysqli_query($conn,$sqli);
              if ($result== TRUE) {
                              ?>
                                  <script type="text/javascript">  
                                    window.location='event-list.php';
                                    alert('Event added successfully.');
                                  </script>
                              <?php
               }
      }

             if (isset($_POST['delete'])){
                     $sid = mysqli_real_escape_string($conn, $_POST['sid']);
                        // delete events
                          $sqld="DELETE FROM events  WHERE events_id='$sid'";

                      $resultd=mysqli_query($conn,$sqld);
                              if ($resultd == TRUE){
                                              ?>
                                                  <script type="text/javascript">  
                                                    window.location='event-list.php';
                                                    alert('Event deleted successfully.');
                                                  </script>
                                              <?php
                               }

                      }
       ?>


       <?php
// event list

if (isset($_POST['edit'])){
  
    $title = mysqli_real_escape_string($conn, $_POST['titles']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);

    $sqli="UPDATE `events` SET  `events_title`='$title', `events_description`='$description', `events_date`='$event_date', `events_status`='$status' WHERE events_id='$_GET[id]'";

      $result=mysqli_query($conn,$sqli);
              if ($result== TRUE) {
                              ?>
                                  <script type="text/javascript">  
                                    window.location='event-list.php';
                                    alert('Event updated successfully.');
                                  </script>
                              <?php
               }
      }
      ?>
