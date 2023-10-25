<?php 
     if (!isset($_SESSION['company_ID'])) {
          header("Location: employer-login.php");
          exit();
     }
?>