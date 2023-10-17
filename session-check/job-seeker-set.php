<?php 
     // Check if the user is already logged in; if so, redirect to home.php
     if (isset($_SESSION['jobseeker_ID'])) {
          header("Location: home.php");
          exit();
     }
?>