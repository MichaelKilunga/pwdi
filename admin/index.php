<?php
session_start();
include 'include/pwdi_db.php';
if(isset($_POST['submit'])){

    $email = trim($_POST['email']);
    // $email = $_POST['email'];
    $password =md5($_POST['password']);
    // $md5Pass = md5($password);
    $qry = "SELECT * FROM staff WHERE staff_email = '$email' AND staff_password = '$password' AND staff_ability='Yes'";
    $rs = mysqli_query($conn, $qry);
    $numRows = mysqli_num_rows($rs);
    if($numRows == 1){
        while ($row = mysqli_fetch_assoc($rs)){
            $_SESSION['admin_id']=$row['staff_id'];
            $_SESSION['user_email']=$row['staff_email'];
              header("location:dashboard.php");
              exit;
           }
    }
    else
    {
      // $errorMsg = "Wrong email or password";
      ?>
      <script type="text/javascript">
          window.location='index.php';
        alert('Wrong email or password, please check it and try again!');
      
      </script>
      <?php
    }
}
?>
<html>
<head>
<title>PWDI</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/pwdi.png"/>

<script type="text/javascript">
function checkpass()
{
if(document.changepassword.new_password.value!=document.changepassword.confirm_password.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirm_password.focus();
return false;
}
return true;
} 
</script>

</head>
<body>

      <?php
        $find="SELECT * FROM staff";
        $resultfind=mysqli_query($conn,$find);
        $countfind=mysqli_num_rows($resultfind);

     if ($countfind > 0){
       // allow to login
         ?>
        <form action="" method="post" id="frmLogin">
            <div class="demo-table">
                <div class="form-head">Login</div>
                <div class="field-column">
                    <div>
                        <label for="mail">Mail</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                         <input type="email" id="email" class="demo-input-box" name="email" placeholder="Enter Email">
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="password">Password</label><span id="password_info" class="error-info"></span>
                    </div>
                    <div>
                        <input type="password" id="password" class="demo-input-box" name="password" placeholder="Enter Password" onPaste="return false" onCopy="return false" required>
                    </div>
                </div>
                <div class=field-column>
                    <div>
                    <input type="submit" name="submit" value="Login" class="btnLogin">
                    </div>
                </div>
            </div>
        </form>
            <?php
         }else{
            // register first
            ?>
             <form action="" method="post" id="frmLogin" name="changepassword" onsubmit="return checkpass();">
            <div class="demo-table">
                <div class="form-head">Register</div>
                    <div class="field-column">
                    <div>
                        <label for="mail">Fullname</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                         <input type="text" id="email" class="demo-input-box" name="fullname" placeholder="Enter your fullname" required>
                    </div>
                </div>
                  <div class="field-column">
                    <div>
                        <label for="mail">Title</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                         <input type="text" id="email" class="demo-input-box" name="titles" placeholder="Enter your title" required>
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="mail">Email</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                         <input type="email" id="email" class="demo-input-box" name="email" placeholder="Enter Email" required>
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="password">New Password</label><span id="password_info" class="error-info"></span>
                    </div>
                    <div>
                        <input type="password" id="password" class="demo-input-box" name="new_password" placeholder="Enter Password" onPaste="return false" onCopy="return false" required>
                    </div>
                </div>
                    <div class="field-column">
                    <div>
                        <label for="password">Confirm Password</label><span id="password_info" class="error-info"></span>
                    </div>
                    <div>
                        <input type="password" id="password" class="demo-input-box" name="confirm_password" placeholder="Enter Password" onPaste="return false" onCopy="return false" required>
                    </div>
                </div>
                <div class=field-column>
                    <div>
                    <input type="submit" name="register" value="Register" class="btnLogin">
                    </div>
                </div>
            </div>
        </form>
         <?php
           }
     ?>
         
        <!-- restrict multiple resubmition on page reload -->
<script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null,null,window.location.href);
    }
</script>
</body>
</html>
<?php
// register

if (isset($_POST['register'])){
    //from form
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $title = mysqli_real_escape_string($conn, $_POST['titles']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $status = 'inactive';
    $ability = 'Yes';
    $password2=md5($password);
    
      $sqlir="INSERT INTO `staff`(`staff_name`,`staff_email`, `staff_password`, `staff_ability`, `staff_title`, `staff_photo`, `staff_status`) VALUES ('$fullname','$email','$password2','$ability','$title','NILL','$status')";
      $resultr=mysqli_query($conn,$sqlir);
              if ($resultr== TRUE){
                  ?>
                      <script type="text/javascript">  
                        window.location='index.php';
                        alert('User registered successfully.');
                      </script>
                  <?php
             }
          }
      ?>