<?php 
            // ***************EMAIL CONFIGURATIONS*******************
              //Import PHPMailer classes into the global namespace
            // These must be at the top of your script, not inside a function
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\Exception;
             
            //required files
            require 'admin/phpmailer/src/Exception.php';
            require 'admin/phpmailer/src/PHPMailer.php';
            require 'admin/phpmailer/src/SMTP.php';
             
            //Create an instance; passing `true` enables exceptions

            // ***************EMAIL CONFIGURATIONS END*******************

                       // ***************************
             // *******SEND AN EMAIL TO DEPT CONTROL SYSTEM FOR FUTHER FOLLOW UP******
                     //normal

session_start();
include_once'includes/dbconnect.php';
?>


<!DOCTYPE html>
<html>
<head>
  <?php include_once'includes/head.php'; ?>
</head>
<body style="background-image: url(images/bg.jpg);">
	<div class="container">

						<div class="row"  style="padding-top: 5%;">
							<div class="col-md-12">
								<center>
                <div class="card w-50" style="box-shadow: -1px 1px 3px 2px firebrick; border-radius:5px; opacity: 8;">
  								<div class="card-header">
  									 <center>
                      <?php 
                        
                        //check for initial configuration for new lodge or hotel
                         $sqls="SELECT * FROM staff";
                         $results=mysqli_query($conn,$sqls);
                         $counts=mysqli_num_rows($results);

                         //select * from hotel 
                         $sqlh="SELECT * FROM hotel";
                         $resulth=mysqli_query($conn,$sqlh);
                         $counth=mysqli_num_rows($resulth);
                         $rowh=mysqli_fetch_assoc($resulth);
                           if ($counth>0){
                              $hotel=$rowh['name'];
                              $hotelprofile=$rowh['hotelprofile'];
                            }

                       if ($counts>0){
                        ?>
                        <img src="images/logo/<?php echo $hotelprofile;?>" alt="user-img" width="100" class="" style="border-radius: 50px;"></center>
                        <?php
                        // code...
                      }else{ 
                         //default logo
                        ?>
                      <img src="images/default/logo.png" alt="user-img" width="100" height="80" class="" style="border-radius: 50px;"></center>
                    <?php } ?>

  								    <div class="card-title text-center"> <?php if ($counts>0){ echo $hotel; }else{echo ' LALA SMART';} ?> FORGOT PASSWORD </div>

  								</div>
									<div class="card-body">

					<form role="form" action="" method="post">
						<fieldset>
							<div class="row">
								<div class="col-md-12">
								<div class="form-group">
									<label class="pull-left"><span class="la la-user"></span> Phone number</label>
								<input class="form-control form-control-sm" placeholder="Enter your phone number" name="phonenumber" type="text"  pattern="([0]{1})[6-7]{1}[0-9]{8}" title="Phone number format: 06 or 07" placeholder="ie. 0679725725" required>
							</div>
							</div>
					    </div>
						<div class="row">
								<div class="col-md-12">
							<div class="form-group">
								<label class="pull-left"><span class="la la-lock"></span> Email</label>
								<input class="form-control form-control-sm" placeholder="Enter your Email" name="email" type="text" required>
							</div>
						</div>
					</div>


           <div class="row">
						<div class="col-md-12">
							<center><div class="form-group">
                                                <?php
                // check if there is internet to allow send email
                if(!$sock = @fsockopen('www.google.com', 80)){
                   ?>
                   <a href="" type="button" class="btn btn-sm btn-primary" onclick= "alert('You cannot proceed to the next step, no internet connection.')";> REQUEST </a>
                <?php
                }else{
                ?>
                  <button  type="submit" name="forgot" class="btn btn-sm btn-primary"> REQUEST </button>
                <?php
                }
                ?>
							</div>
						</center>
						</div>
					</div>  

           <div class="row">
							<div class="col-md-12">
								<span class="text-center"><a href="login.php" style="text-decoration:none;">Back To Login</a></span>
							</div>
							</div>     
				</fieldset>
					</form>
	         </div>
							    </div>
							  </center>
                </div>
						    </div>
					    </div>
			    </div>
    <?php include_once'includes/jslinks.php';?>
</body>
</html>
<?php

if(isset($_POST['forgot'])){
    $phonenumber = trim($_POST['phonenumber']);
    $email = trim($_POST['email']);
    // $notification = trim($_POST['notification']);

    $query = "SELECT * FROM staff WHERE phonenumber = '$phonenumber' AND email = '$email' AND status='Active'";
    $ret = mysqli_query($conn, $query);
    $numRows = mysqli_num_rows($ret);
    if($numRows == 1){
      $getRow = mysqli_fetch_assoc($ret);
      $id=$getRow['staffID'];
      $receiver=$getRow['firstname'];
      $email = $getRow['email'];
      $_SESSION['staffID2'] = $getRow['staffID'];
      $_SESSION['email2'] = $getRow['email'];
      $_SESSION['phonenumber2'] = $getRow['phonenumber'];

           //generate pin of 6 digits
      $pin=mt_rand(100000,999999);

          //generate time gen and exp
        date_default_timezone_set('Africa/Nairobi');
        $gen=date('Y-m-d').' '.date('H:i:s');
        $currentdate=date('Y-m-d');
        //computer exp date after 30 min
        $duration=1800;
        $exp=date("Y-m-d H:i:s",(strtotime(date($gen)) + $duration));

       $sqlr="INSERT INTO `reset`(`pin`, `generated_time`, `expired_time`, `staffID`) VALUES ('$pin','$gen','$exp','$id')";
       $resultr=mysqli_query($conn,$sqlr);

       // if ($notification == 'email'){
         // send to email
              //A MESSAGE TO MESSINA EMAIL
                        $smstodirector="
                        <p><b>Dear : $receiver.</b><br> Your verification code is: $pin. Verification code will expire after 30 minutes.<br>Thank you.</p>";              

                    $mail = new PHPMailer(true);
                    //Server settings
                    $mail->isSMTP();                              //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;             //Enable SMTP authentication
                    $mail->Username   = 'skydevelopers100@gmail.com';   //SMTP write your email
                    $mail->Password   = 'gtmnjjepcckuaqzw';      //SMTP password
                    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
                    $mail->Port       = 465;                                   
                      
                    //RECIPIENT MESSINA EMAIL
                    //Recipients one
                    $mail->setFrom('info@statehoodlodge.co.tz', 'STATE HOOD LODGE'); // Sender Email and name 
                    $mail->addAddress($email); //Add a recipient email  
                 
                    //Content recipient one
                    $mail->isHTML(true);               //Set email format to HTML
                    $mail->Subject = 'PASSWORD RESET VERIFICATION CODE';   // email subject headings
                    $mail->Body    = $smstodirector; //email message
                    //baada ya kufail email.
                    $mail->SMTPOptions = array(
                      'ssl' => array(
                          'verify_peer' => false,
                          'verify_peer_name' => false,
                          'allow_self_signed' => true
                      )
                  );

                    //send to recipirnt one
                    $mail->send();

        //email end
       // }

        ?>
        <script type="text/javascript">
       
            const Toast = Swal.mixin({
              toast: true,
              position: "top-right",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
              }
            });
            Toast.fire({
              icon: "success",
              title: "Your request sent. You will receive verification code to your email. Thank you."
            })
            .then(function(){
                window.location.href = "forgot_verification.php";
            });                                          
         </script>
         <?php
     }else{
           ?>
             <script type="text/javascript">
                const Toast = Swal.mixin({
                  toast: true,
                  position: "top-right",
                  showConfirmButton: false,
                  timer: 2100,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                  }
                });
                Toast.fire({
                  icon: "error",
                  title: "Sorry, incorrect phone number or email. Please chek it and try again!"
                });                                          
             </script>
             <?php
         }
 }
?>
