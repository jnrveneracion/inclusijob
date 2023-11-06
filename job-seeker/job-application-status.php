<?php
     session_start();
     include "../session-check/job-seeker-not-set.php";
     include "../function/retrieve-job-seeker-signup.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Job Application Status</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/index-style.css">
     <style>
          .notification-section {
               margin: 5px 5px;
               border: 3px solid color(srgb 0.8626 0.8628 0.8627);
               border-radius: 10px;
               padding: 13px 20px;
               display: flex;
               align-items: center;
          }

          .main-body {
               min-height: 500px;
          }

          .notification-section:hover {
               border: 3px solid color(srgb 0.0618 0.4255 0.9648);
          }

          .status-indicator {
               color: white;
               padding: 7px 15px;
               border-radius: 5px;
               font-weight: 440;
          }

          .status-indicator.applied {
               background-color: #0687ff;
               border: 2px solid #006bcf;
          }

          .status-indicator.under-review {
               background-color: #ffc107;
               border: 2px solid #cf9f32;
          }

          .status-indicator.shortlisted {
               background-color: #6f42c1;
               border: 2px solid #3e148a;
          }

          .status-indicator.interview-scheduled {
               background-color: #d63384;
               border: 2px solid #930045;
          }

          .status-indicator.rejected {
               background-color: #595959;
               border: 2px solid #343434;
          }

          .status-indicator.hired {
               background-color: #198754;
               border: 2px solid #07461c;
          }

          .status-indicator.job-trashed {
               background-color: rgb(231, 50, 50);
               border: 2px solid #cd1717;
          }

          .status-info {
               font-size: 13px;
          }

          .notification-section.job-trashed {
               border: 3px solid color(srgb 0.995 0.8308 0.8308);
               background-color: rgb(255, 242, 242);
          }


          .notification-section.job-trashed:hover {
               border: 3px solid color(srgb 0.79 0.0553 0.0553);
          }


     </style>
</head>
<body class="container-xxl">
     <?php require "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Job Seeker</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Job Application Status</h6></a> 
          </div>
     </div>
     <div class="body d-flex justify-content-start align-items-start mt-1 mt-lg-1 pt-2 m-2 m-lg-5 p-4 main-body">
          <div class="row w-100">
               <?php include "../function/retrieve-job-application-status.php"; ?>
          </div>
     </div>

     <?php require "../common/footer-inside-folder.php"; ?>
     <?php require "../common/message-session.php"; ?>
     <script src="../js/remove-url-session.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <script>
          const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
          const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
     </script>
</body>
</html>

  