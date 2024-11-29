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
            if (!empty($_GET['id'])) {
                // edit contact form
            ?>
                <?php
                // echo $_GET['id'];
                $sqlcontact = "SELECT * FROM `contact-info` WHERE info_id='$_GET[id]'";
                $resultcontact = mysqli_query($conn, $sqlcontact);
                // $count=mysqli_num_rows($resultcontact);
                $contact = mysqli_fetch_assoc($resultcontact);
                ?>
                <!-- Modal body -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Contact info edit form</h4>

                        <!-- form -->
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" class="form-control" placeholder="Enter location i.e Soko kuu chief Kingalu B. 115" name="location" value="<?php echo $contact['info_location'];  ?>" required />
                            </div>

                            <div class="form-group">
                                <label>Company Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="email" value="<?php echo $contact['info_email'];  ?>" required />
                            </div>

                            <div class="form-group">
                                <label>Altenative Email</label>
                                <input type="email" class="form-control" placeholder="Enter Email" name="altenative_email" value="<?php echo $contact['info_altenativeemail'];  ?>" />
                            </div>

                            <div class="form-group">
                                <label>Phone number</label>
                                <input type="text" class="form-control" placeholder="Enter phone number" name="phonenumber" value="<?php echo $contact['info_phone'];  ?>" required />
                            </div>

                            <div class="form-group">
                                <label>AltenativePhone number</label>
                                <input type="text" class="form-control" placeholder="Enter phone number" name="altenative_phonenumber" value="<?php echo $contact['info_altenativephone'];  ?>" />
                            </div>

                            <div class="form-group">
                                <label>P.o Box Address</label>
                                <input type="text" class="form-control" placeholder="Enter address i.e P.O.Box 12345 Morogoro" name="address" value="<?php echo $contact['info_address'];  ?>" required />
                            </div>

                            <div class="card-action">
                                <button class="btn btn-md btn-success text-white" type="submit" name="edit">Submit</button>&nbsp;<a href="contact-info.php" class="btn btn-md btn-danger text-white">Back</a>
                            </div>
                        </form>
                        <!-- form -->
                    </div>
                </div>
            <?php
            } else {
            ?>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h5 class="card-title">CONTACT INFO LIST</h5>
                                    <span class="text-end">
                                        <!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add Contact info</button>
                                    </span>

                                    <hr class="mt-2">
                                </div>
                                <div class="table-responsive">
                                    <!-- id="zero_config" -->
                                    <table
                                        id="zero_config"
                                        class="table table-hover table-sm">
                                        <thead>
                                            <tr class="bg-success">
                                                <th class="text-white">Sn</th>
                                                <th class="text-white">Location</th>
                                                <th class="text-white">Phone#</th>
                                                <th class="text-white">Altenative Phone#</th>
                                                <th class="text-white">Email</th>
                                                <th class="text-white">Altenative Email</th>
                                                <th class="text-white">Address</th>
                                                <th class="text-white">Date Modified</th>
                                                <th class="text-white">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sqli = "SELECT * FROM `contact-info`";
                                            $result = mysqli_query($conn, $sqli);
                                            $count = mysqli_num_rows($result);
                                            $i = 1;
                                            while ($i <= $count) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $i; ?></td>
                                                        <td><?php echo $row['info_location']; ?></td>
                                                        <td><?php echo $row['info_phone']; ?></td>
                                                        <td><?php echo $row['info_altenativephone']; ?></td>
                                                        <td><?php echo $row['info_email']; ?></td>
                                                        <td><?php echo $row['info_altenativeemail']; ?></td>
                                                        <td><?php echo $row['info_address']; ?></td>
                                                        <td><?php echo $row['info_date']; ?></td>

                                                        <form method="POST" action="" class="form-inline">
                                                            <td>
                                                                <input type="text" name="sid" value="<?php echo $row['info_id']; ?>" hidden>
                                                                <a href="contact-info.php?id=<?php echo $row['info_id']; ?>" class="btn btn-sm btn-success text-white"><span class="fas fa-edit"></span></a>
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
                                                <th>Location</th>
                                                <th>Phone#</th>
                                                <th>Altenative Phone#</th>
                                                <th>Email</th>
                                                <th>Altenative Email</th>
                                                <th>Address</th>
                                                <th>Date Modified</th>
                                                <th>Edit</th>
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
                            <h4 class="modal-title">Add contact info form</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="card">
                                <div class="card-body">
                                    <!-- form -->
                                    <form method="POST" action="" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Location</label>
                                            <input type="text" class="form-control" placeholder="Enter location i.e Soko kuu chief Kingalu B. 115" name="location" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Company Email</label>
                                            <input type="email" class="form-control" placeholder="Enter Email" name="email" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Altenative Email</label>
                                            <input type="email" class="form-control" placeholder="Enter Email" name="altenative_email" />
                                        </div>

                                        <div class="form-group">
                                            <label>Phone number</label>
                                            <input type="text" class="form-control" placeholder="Enter phone number" name="phonenumber" required />
                                        </div>

                                        <div class="form-group">
                                            <label>AltenativePhone number</label>
                                            <input type="text" class="form-control" placeholder="Enter phone number" name="altenative_phonenumber" />
                                        </div>

                                        <div class="form-group">
                                            <label>P.o Box Address</label>
                                            <input type="text" class="form-control" placeholder="Enter address i.e P.O.Box 12345 Morogoro" name="address" required />
                                        </div>

                                        <div class="card-action">
                                            <button class="btn btn-md btn-success text-white" type="submit" name="submit">Submit</button>
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
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>

<?php
// include_once 'include/pwdi_db.php';

if (isset($_POST['submit'])) {
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $altenative_email = mysqli_real_escape_string($conn, $_POST['altenative_email']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $altenative_phonenumber = mysqli_real_escape_string($conn, $_POST['altenative_phonenumber']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    //check if contact info aready added
    $sqlselect = "SELECT * FROM `contact-info`";
    $resultselect = mysqli_query($conn, $sqlselect);
    $countselect = mysqli_num_rows($resultselect);
    if ($countselect > 0) {
?>
        <script>
            window.location = 'contact-info.php';
            alert('Contact information already added, Only editing is process is required.');
        </script>
        <?php

    } else {

        $sqli = "INSERT INTO `contact-info`(`info_location`, `info_email`, `info_altenativeemail`, `info_phone`, `info_altenativephone`, `info_address`, `info_date`) VALUES ('$location','$email','$altenative_email','$phonenumber','$altenative_phonenumber','$address',now())";

        $result = mysqli_query($conn, $sqli);
        if ($result == TRUE) {
        ?>
            <script type="text/javascript">
                window.location = 'contact-info.php';
                alert('Contact information added successfully.');
            </script>
<?php
        }
    }
}
?>

<?php
// event list

if (isset($_POST['edit'])) {

    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $altenative_email = mysqli_real_escape_string($conn, $_POST['altenative_email']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $altenative_phonenumber = mysqli_real_escape_string($conn, $_POST['altenative_phonenumber']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $sqli = "UPDATE `contact-info` SET `info_location`='$location',`info_phone`='$phonenumber',`info_altenativephone`='$altenative_phonenumber',`info_email`='$email',`info_altenativeemail`='$altenative_email',`info_address`='$address',`info_date`=now() WHERE  info_id='$_GET[id]'";

    $result = mysqli_query($conn, $sqli);
    if ($result == TRUE) {
?>
        <script type="text/javascript">
            window.location = 'contact-info.php';
            alert('Contact information updated successfully.');
        </script>
<?php
    }
}
?>