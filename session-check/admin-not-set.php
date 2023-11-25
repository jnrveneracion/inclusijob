<?php 
     if (!isset($_SESSION['admin_ID'])) {
          header("Location: ../admin-login.php");
          exit();
     }
?>