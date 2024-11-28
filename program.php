<?php
$page = "Programmes";
  include "header.php";
  include_once "pwdi_db.php";
  $page='program.php';
?>
<style type="text/css">
    body {
    margin-top: 0px;
}
.timeline_area {
    position: relative;
    z-index: 1;
}
.single-timeline-area {
    position: relative;
    z-index: 1;
    padding-left: 180px;
}
@media only screen and (max-width: 575px) {
    .single-timeline-area {
        padding-left: 100px;
    }
}
.single-timeline-area .timeline-date {
    position: absolute;
    width: 180px;
    height: 100%;
    top: 0;
    left: 0;
    z-index: 1;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -ms-grid-row-align: center;
    align-items: center;
    -webkit-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-end;
    padding-right: 60px;
}
@media only screen and (max-width: 575px) {
    .single-timeline-area .timeline-date {
        width: 100px;
    }
}
/*left line .....................................................open*/
.single-timeline-area .timeline-date::after {
    position: absolute;
    width: 3px;
    height: 100%;
    content: "";
    background-color: #ebebeb;
    top: 0;
    right: 30px;
    z-index: 1;
}

/*remainder 2% == 0*/
.single-timeline-area .timeline-date::before {
    position: absolute;
    width: 11px;
    height: 11px;
    border-radius: 50%;
    background-color: lightgray;
    content: "";
    top: 50%;
    right: 26px;
    z-index: 5;
    margin-top: -5.5px;
}

.single-timeline-area .timeline-date p {
    margin-bottom: 0;
    color: green;
    font-size: 13px;
    text-transform: uppercase;
    font-weight: 500;
}
.single-timeline-area .single-timeline-content {
    position: relative;
    z-index: 1;
    padding: 30px 30px 25px;
    border-radius: 6px;
    margin-bottom: 15px;
    margin-top: 15px;
    -webkit-box-shadow: 0 0.25rem 1rem 0 rgba(47, 91, 234, 0.125);
    box-shadow: 0 0.25rem 1rem 0 rgba(47, 91, 234, 0.125);
    border: 1px solid #ebebeb;
}
@media only screen and (max-width: 575px) {
    .single-timeline-area .single-timeline-content {
        padding: 20px;
    }
}
/*circle roundup features.................................................... remainder % 2 == 1*/
.single-timeline-area .single-timeline-content .timeline-icon {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    width: 30px;
    height: 30px;
    background-color: green;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 30px;
    flex: 0 0 30px;
    text-align: center;
    max-width: 30px;
    border-radius: 50%;
    margin-right: 15px;
}

/*circle roundup features.................................................... remainder % 2 == 0 */
.single-timeline-area .single-timeline-content .timeline-icon2 {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
    width: 30px;
    height: 30px;
    background-color: orange;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 30px;
    flex: 0 0 30px;
    text-align: center;
    max-width: 30px;
    border-radius: 50%;
    margin-right: 15px;
}

.single-timeline-area .single-timeline-content .timeline-icon i {
    color: #ffffff;
    line-height: 30px;
}
.single-timeline-area .single-timeline-content .timeline-text h6 {
    -webkit-transition-duration: 500ms;
    transition-duration: 500ms;
}
.single-timeline-area .single-timeline-content .timeline-text p {
    font-size: 13px;
    margin-bottom: 0;
}
.single-timeline-area .single-timeline-content:hover .timeline-icon,
.single-timeline-area .single-timeline-content:focus .timeline-icon {
    background-color: green;
}
.single-timeline-area .single-timeline-content:hover .timeline-text h6,
.single-timeline-area .single-timeline-content:focus .timeline-text h6 {
    color: #3f43fd;
}
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Our Programs</h2>
        </div>

      </div>
    </section>
    <!-- End Breadcrumbs -->


<section class="timeline_area section_padding_130">
    <div class="container"> 
        <div class="row justify-content-center" data-aos="fade-down">
            <div class="col-12 col-sm-8 col-lg-6">
                <!-- Section Heading-->
                <div class="section_heading text-center">
                    <h5>Our programs</h5>
                    <h6>We are a non-profital & Charity raising money for child education</h6>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-12">
                <!-- Timeline Area-->
                <div class="apland-timeline-area">

                    <!-- Single Timeline Content-->
                                        <?php
                          $sqli="SELECT * FROM `program` AS p JOIN `category` AS c ON p.category_id=c.category_id WHERE p.prog_status='enable' GROUP BY c.category_id";
                           $result=mysqli_query($conn,$sqli);
                           $counta=mysqli_num_rows($result);
                           $a=1;
                           while ($a<=$counta) {
                           while ($row=mysqli_fetch_assoc($result)){
                              ?>
                       <div class="single-timeline-area">
                      
                       <?php if ($a%2 == 0) {
                           ?>
                            <div class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                            <p class="text-warning"><?php echo $row['category_name']; ?></p>
                        </div>

                      <div class="row">
                         <?php
                           $sqlib="SELECT * FROM `program` AS p JOIN `category` AS c ON p.category_id=c.category_id WHERE c.category_id='$row[category_id]'";
                           $resultb=mysqli_query($conn,$sqlib);
                           $count=mysqli_num_rows($resultb);
                           $i=1;
                           while ($i<=$count) {
                            
                         
                           while ($rowb=mysqli_fetch_assoc($resultb)){
                              ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="single-timeline-content d-flex wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;" >
                                    <div class="timeline-icon2"></div>
                                    <div class="timeline-text">
                                        <h6><?php echo $rowb['prog_name']; ?></h6>
                                        <p><?php echo $rowb['prog_description']; ?></p>
                                        <?php 
                                          //call time zone unique.
                                        date_default_timezone_set('Africa/Nairobi');
                                        $pdh = date('Y-m-d');
                                        $program_date=$rowb['date_established'];

                                                                            
                                    // Set the timezone
                                    date_default_timezone_set('Africa/Nairobi');

                                    // Get the current date
                                    $pdh = date('Y-m-d');
                                    // Assume $rowb['date_established'] contains a valid date string
                                    $program_date = $rowb['date_established'];

                                    // Convert dates to timestamps
                                    $current_timestamp = strtotime($pdh);
                                    $program_timestamp = strtotime($program_date);

                                    // Calculate the difference in seconds
                                    $diff_seconds = $current_timestamp-$program_timestamp;

                                    // Determine if the difference is positive or negative
                                    $sign = ($diff_seconds >= 0) ? 1 : -1;

                                    // Convert the absolute difference to days, months, and years
                                    $diff_seconds = abs($diff_seconds);
                                    $years = floor($diff_seconds / (365*60*60*24)); 
                                    $months = floor(($diff_seconds - $years * 365*60*60*24) / (30*60*60*24)); 
                                    $days = floor(($diff_seconds - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));

                                    // Apply the sign to days for clarity
                                    $signed_days = $sign * ($years * 365 + $months * 30 + $days);
                                     ?>
                                     <?php if($signed_days>=0 && $signed_days<=30 ){
                                        ?>
                                         <p class="mt-2 btn btn-light bg-danger rounded p-1 text-white">New Program </p>
                                        <?php
                                     }else if($signed_days<0){
                                        ?>
                                        <p class="mt-2 btn btn-light bg-primary rounded p-1 text-white">Coming Program </p>
                                        <?php
                                     }?>
                                </div>
                                </div>
                            </div>
                        <?php 
                        $i++;
                            }
                              }
                    ?>

                        </div>
                           <?php
                       }else{
                        ?>
                           <div class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                            <p><?php echo $row['category_name']; ?></p>
                        </div>

                     <div class="row">
                         <?php
                         
                           $sqlib="SELECT * FROM `program` AS p JOIN `category` AS c ON p.category_id=c.category_id WHERE c.category_id='$row[category_id]' AND p.prog_status='enable'";
                           $resultb=mysqli_query($conn,$sqlib);
                           $count=mysqli_num_rows($resultb);
                           $i=1;
                           while ($i<=$count) {
                            
                           while ($rowb=mysqli_fetch_assoc($resultb)){
                              ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="single-timeline-content d-flex wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;" >
                                    <div class="timeline-icon"></i></div>
                                    <div class="timeline-text">
                                        <h6><?php echo $rowb['prog_name']; ?></h6>
                                        <p><?php echo $rowb['prog_description']; ?></p>
                                        <?php 
                                          //call time zone unique.
                                        date_default_timezone_set('Africa/Nairobi');
                                        $pdh = date('Y-m-d');
                                        $program_date=$rowb['date_established'];

                                                                            
                                    // Set the timezone
                                    date_default_timezone_set('Africa/Nairobi');

                                    // Get the current date
                                    $pdh = date('Y-m-d');
                                    // Assume $rowb['date_established'] contains a valid date string
                                    $program_date = $rowb['date_established'];

                                    // Convert dates to timestamps
                                    $current_timestamp = strtotime($pdh);
                                    $program_timestamp = strtotime($program_date);

                                    // Calculate the difference in seconds
                                    $diff_seconds = $current_timestamp-$program_timestamp;

                                    // Determine if the difference is positive or negative
                                    $sign = ($diff_seconds >= 0) ? 1 : -1;

                                    // Convert the absolute difference to days, months, and years
                                    $diff_seconds = abs($diff_seconds);
                                    $years = floor($diff_seconds / (365*60*60*24)); 
                                    $months = floor(($diff_seconds - $years * 365*60*60*24) / (30*60*60*24)); 
                                    $days = floor(($diff_seconds - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));

                                    // Apply the sign to days for clarity
                                    $signed_days = $sign * ($years * 365 + $months * 30 + $days);
                                     ?>
                                     <?php if($signed_days>=0 && $signed_days<=30 ){
                                        ?>
                                         <p class="mt-2 btn btn-light bg-danger rounded p-1 text-white">New Program </p>
                                        <?php
                                     }else if($signed_days<0){
                                        ?>
                                        <p class="mt-2 btn btn-light bg-primary rounded p-1 text-white">Coming Program </p>
                                        <?php
                                     }?>
                                    </div>
                                </div>
                                
                            </div>
                        <?php 
                        $i++;
                            }
                              }
                    ?>
                    </div>
                      <?php
                       }
                       ?>
                        

       
                    </div>
                       <?php 
                       $a++;
                          }
                      }
                        ?>
                    <!-- time area end -->

                </div>
            </div>
        </div>
    </div>
</section>

 <?php 
include 'footer.php';
?>
</body>
</html>
