<?php

     session_start();
  // Logout logic
  if (isset($_POST['logout'])) {
          // Unset and destroy session variables
          session_unset();
          session_destroy();

          // Redirect to login.php
          header("Location: ../job-seeker/job-seeker-login.php");
          exit();
     }

?>