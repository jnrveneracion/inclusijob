<?php

     session_start();
     if (isset($_POST['logout-company'])) {
          // Unset and destroy session variables
          session_unset();
          session_destroy();

          // Redirect to login.php
          header("Location: ../employer/employer-login.php");
          exit();
     }

?>