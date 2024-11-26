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
          <div class="row">
            <div class="col-12">
              
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <h5 class="card-title">SUBSCRIBERS LIST</h5>
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
                          <th class="text-white">Email</th>
                          <th class="text-white">Date</th>
                          <th class="text-white">Status</th>
                          <th class="text-white">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sqli="SELECT * FROM `subscriber` ORDER BY sub_status ASC, sub_date DESC";
                           $result=mysqli_query($conn,$sqli);
                           $count=mysqli_num_rows($result);
                           $i=1;
                           while ($i<=$count){
                           while ($row=mysqli_fetch_assoc($result)){
                              ?>
                              <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['sub_email']; ?></td>
                          <td><?php echo $row['sub_date']; ?></td> 
                            <?php if ($row['sub_status'] == 'active') {
                            ?>

                          <td class="text-success"><?php echo $row['sub_status']; ?></td> 
                        <?php }else{
                          ?>
                           <td class="text-danger"><?php echo $row['sub_status']; ?></td> 
                          <?php
                        } ?>

                          <form method="POST" action="" class="form-inline">
                          <?php if ($row['sub_status'] == 'active') {
                            ?>
                            <td>
                            <input type="text" name="sid" value="<?php echo $row['sub_id']; ?>" hidden>
                            <button onclick="return confirm('Are you sure you want to deactivate <?php echo $row['sub_email']; ?> ?')" type="submit" name="submit" class="btn btn-md btn-success text-white"><span class="fas fa-bell-slash text-center"></span></button></td>
                            <?php
                          }else{
                             ?>
                             <td> <button  type="submit" name="disable" class="btn btn-md btn-danger text-white" disabled><span class="fas fa-bell-slash text-center"></span></button></td>

                            <?php

                          } ?>
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
                          <th>Email</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Action</th>
                         </tr>
                       </tfoot> 
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

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

      if (isset($_POST['submit'])){
        $sid = mysqli_real_escape_string($conn, $_POST['sid']);
        // enable disabled event
          $sqlsub="UPDATE subscriber SET sub_status='inactive' WHERE sub_id='$sid'";
             $resultsub=mysqli_query($conn,$sqlsub);
              if ($resultsub == TRUE){
                              ?>
                                  <script type="text/javascript">  
                                    window.location='subscribers-list.php';
                                    alert('Subscriber deactivated successfully.');
                                  </script>
                              <?php
                      }
              }
       ?>
