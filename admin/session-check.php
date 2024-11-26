<?php
// 30 min (1800 sec) in seconds
$inactive = 1800; 
ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 30 min
session_start();
if (isset($_SESSION['admin_id']) == NULL){
     header('location:index.php');
}
    // code...

if (isset($_SESSION['activetime']) && (time() - $_SESSION['activetime'] > $inactive)){
    // remove user from sign in
      ?>
      <script type="text/javascript">
          // alert('The sign in session expired after 30 minutes when the system is idle. Thank you');
           window.location='logout.php';
      </script>
      <?php
    }else{
      /*update expire time when still navigatin and active in the system*/
              $_SESSION['activetime'] = time(); // Update session
      }
?>