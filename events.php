<?php

  include_once "pwdi_db.php";
  $page='events.php';
  include "header.php";
?>


<style type="text/css">
  body{
    background:#eee;
    margin-top:20px;
}
.verti-timeline {
    border-left: 3px dashed #e9ecef;
    margin: 0 10px;
}
.verti-timeline .event-list {
    position: relative;
    padding: 40px 15px 40px;
    border-top: 3px solid #e9ecef;
}
.verti-timeline .event-list .event-date {
    position: absolute;
    right: 0;
    top: -2px;
    padding: 12px;
    color: #fff;
    border-radius: 0 0 7px 7px;
    text-align: center;
}
.verti-timeline .event-list .event-content {
    position: relative;
    border: 2px solid #e9ecef;
    border-radius: 7px;
    text-align: center;
}
.verti-timeline .event-list .event-content::before {
    content: "";
    position: absolute;
    height: 40px;
    width: 75%;
    top: -42px;
    left: 0;
    right: 0;
    margin: 0 auto;
    border-left: 12px double #e9ecef;
    border-right: 12px double #e9ecef;
}
.verti-timeline .event-list .timeline-icon {
    position: absolute;
    left: -14px;
    top: -10px;
}
.verti-timeline .event-list .timeline-icon i {
    display: inline-block;
    width: 23px;
    height: 23px;
    line-height: 23px;
    font-size: 20px;
    border-radius: 50%;
    text-align: center;
    color: #fff;
}
.verti-timeline .event-list:last-child {
    padding-bottom: 0;
}
@media (min-width: 769px) {
    .verti-timeline {
        margin: 0 60px;
    }
    .verti-timeline .event-list {
        padding: 40px 90px 60px 40px;
    }
}
@media (max-width: 576px) {
    .verti-timeline .event-list .event-date {
        right: -20px;
    }
}
.card {
    border: none;
    margin-bottom: 24px;
    -webkit-box-shadow: 0 0 13px 0 rgba(236,236,241,.44);
    box-shadow: 0 0 13px 0 rgba(236,236,241,.44);
}
</style>

<body>
  <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Events</h2>
        </div>
      </div>
    </section>
    <br>
    <!-- End Breadcrumbs -->
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css" integrity="sha256-nwNjrH7J9zS/Ti4twtWX7OsC5QdQHCIKTv5cLMsGo68=" crossorigin="anonymous" />

<div class="container"  data-aos="fade-up">
<div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-5">Organization Events</h4>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <ul class="verti-timeline list-unstyled" dir="ltr">
                         <?php

                          $sqli="SELECT *, YEAR(events_date) AS year, MONTH(events_date) AS month, DAY(events_date) AS day FROM `events` ORDER BY events_date DESC";
                           $result=mysqli_query($conn,$sqli);
                                $count=mysqli_num_rows($result);
                           $i=1;
                           while ($i<=$count){
                           while ($row=mysqli_fetch_assoc($result)){
                            $mon=$row['month'];
                            switch ($mon){
                                case '1':
                                  $month='January';
                                    break;

                                   case '2':
                                  $month='February';
                                    break;

                                  case '3':
                                  $month='March';
                                    break;

                                  case '4':
                                  $month='April';
                                    break;

                                  case '5':
                                  $month='May';
                                    break; 

                                  case '6':
                                  $month='June';
                                    break; 

                                 case '7':
                                  $month='July';
                                    break; 

                                  case '8':
                                  $month='August';
                                    break; 

                                  case '9':
                                  $month='September';
                                    break;

                                  case '10':
                                  $month='October';
                                    break;

                                    case '11':
                                  $month='November';
                                    break;

                                    case '12':
                                  $month='December';
                                    break;
                                   default:
                                    // code...
                                    break;
                            }
                              ?>

                        <li class="event-list">
                            <div class="timeline-icon">
                                <?php 
                                //call time for making picture uploaded unique.
                                date_default_timezone_set('Africa/Nairobi');
                                $pdh=date('Y-m-d');

                                if($row['events_date'] > $pdh ){
                                    ?>
                                  <i class="mdi mdi-adjust bg-danger"></i>
                                    <?php

                                }else if($row['events_date'] == $pdh ){
                                      ?>
                                  <i class="mdi mdi-adjust bg-success"></i>
                                    <?php
                                }
                                else{
                                   ?>
                                  <i class="mdi mdi-adjust bg-info"></i>
                                    <?php
                                }
                                ?>
                            </div>

                            <div class="event-content p-4">
                                <h5 class="mt-0 mb-3 font-18"><?php echo $row['events_title']; ?></h5>
                                <div class="text-muted">
                                    <p class="mb-0"><?php echo $row['events_description']; ?></p>
                                </div>
                            </div>
                            <div class="event-date bg-primary
                            <?php
                              if($row['events_date'] > $pdh ){
                                  echo 'bg-danger';
                                }else if($row['events_date'] == $pdh){
                                   echo 'bg-success';
                                }
                                else{
                                  echo 'bg-info';
                                }
                                ?>
                            ">
                                <p class="mb-0 text-white-90"><?php echo $row['day']; ?></p>
                                <p class="mb-0 text-white-80"><?php echo $month; ?></p>
                                 <p class="mb-0 text-white-60"><?php echo $row['year']; ?></p>
                            </div>
                        </li>
                            <?php
                            $i++;
                                    }
                                }
                        ?>
                    </ul>

                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end card -->
</div>
</div>
</div>
</body>
 <?php
    include "footer.php"
    ?> 
</html>


