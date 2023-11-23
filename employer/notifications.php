<?php
     session_start();
     include "../session-check/employer-not-set.php";
     include "../function/retrieve-employer-signup.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Employer Notifications</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/index-style.css">
     <style>
          .notification-section {
               margin: 5px 5px;
          }

          .main-body {
               min-height: 500px;
          }

          .notif-text {
               border: 3px solid color(srgb 0.45 0.45 0.45);
               border-radius: 10px;
               padding: 10px 20px;
               width: fit-content;
          }

          .notif-text:hover {
               border: 3px solid color(srgb 0.0618 0.4255 0.9648);
          }
     </style>
</head>
<body class="container-xxl">
     <?php require "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Employer</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Notifications</h6></a> 
          </div>
     </div>
     <div class="body d-flex justify-content-start align-items-start mt-1 mt-lg-1 pt-2 m-2 m-lg-5 p-4 main-body">
          <div class="row">
               <div class="col-12 notification-section">
                    <div class="notif-text">
                         Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
               </div>
               <div class="col-12 notification-section">
                    <div class="notif-text">
                         quibusdam quam eveniet dignissimos laborum quis!
                    </div>
               </div>
               <div class="col-12 notification-section">
                    <div class="notif-text">
                         libero tenetur deleniti consectetur soluta tempora optio assumenda ab iure 
                    </div>
               </div>
               <div class="col-12 notification-section">
                    <div class="notif-text">
                         it amet consectetur adipisicing elit. Omnis ea velit odit doloremque mollit
                    </div>
               </div>
          </div>
     </div>
     <?php require "../common/footer-inside-folder.php"; ?>
     <?php require "../common/message-session.php"; ?>
     <script src="../js/remove-url-session.js"></script>
</body>
</html>