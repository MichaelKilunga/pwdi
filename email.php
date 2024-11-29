<?php
// ***************EMAIL CONFIGURATIONS*******************
//Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require __DIR__.'/admin/phpmailer/src/Exception.php';
require __DIR__.'/admin/phpmailer/src/PHPMailer.php';
require __DIR__.'/admin/phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions

// ***************EMAIL CONFIGURATIONS END*******************

// ***************************
// *******SEND AN EMAIL TO DEPT CONTROL SYSTEM FOR FUTHER FOLLOW UP******
//normal

// if ($notification == 'email'){
// send to email
//A MESSAGE TO MESSINA EMAIL
function sendEmail($body, $subject, $recepient) {
  $email = $recepient;
  $smstodirector = $body;

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
  $mail->setFrom('info@pwdi.co.tz', 'PWDI'); // Sender Email and name 
  $mail->addAddress($email); //Add a recipient email  

  //Content recipient one
  $mail->isHTML(true);               //Set email format to HTML
  $mail->Subject = $subject;   // email subject headings
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
}

//email end
// }
