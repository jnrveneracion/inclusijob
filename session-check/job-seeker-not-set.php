<?php 
     if (!isset($_SESSION['jobseeker_ID'])) {
          header("Location: job-seeker-login.php");
          exit();
     }
?>