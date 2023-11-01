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
               font-weight: 540;
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
          <div class="row">
               <a href="job-search.php" class="col-12 notification-section row d-flex justify-content-center">
                    <div class="status-text col-12 d-flex justify-content-center">
                         No job applications yet. Click here to view available jobs and apply.
                    </div>
     </a>
               <div class="col-12 notification-section row d-flex justify-content-center">
                    <div class="status-indicator applied mb-md-0 mb-2 col-5 col-md-2 d-flex justify-content-center" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="You submitted your application.">
                         Applied
                    </div>
                    <div class="status-text col-12 col-md-10">
                         Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
               </div>
               <div class="col-12 notification-section row d-flex justify-content-center">
               <div class="status-indicator under-review mb-md-0 mb-2 col-5 col-md-2 d-flex justify-content-center" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Your application is under review by the employer.">
                    Under Review
               </div>
               <div class="status-text col-12 col-md-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
               </div>
               </div>
               <div class="col-12 notification-section row d-flex justify-content-center">
               <div class="status-indicator shortlisted mb-md-0 mb-2 col-5 col-md-2 d-flex justify-content-center" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Your application has been shortlisted for further consideration.">
                    Shortlisted
               </div>
               <div class="status-text col-12 col-md-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
               </div>
               </div>
               <div class="col-12 notification-section row d-flex justify-content-center">
               <div class="status-indicator interview-scheduled mb-md-0 mb-2 col-5 col-md-2 d-flex justify-content-center" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="An interview has been scheduled for your application.">
                    Interview Scheduled
               </div>
               <div class="status-text col-12 col-md-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
               </div>
               </div>
               <div class="col-12 notification-section row d-flex justify-content-center">
               <div class="status-indicator rejected mb-md-0 mb-2 col-5 col-md-2 d-flex justify-content-center" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Unfortunately, your application has been rejected.">
                    Rejected
               </div>
               <div class="status-text col-12 col-md-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
               </div>
               </div>
               <div class="col-12 notification-section row d-flex justify-content-center">
               <div class="status-indicator hired mb-md-0 mb-2 col-5 col-md-2 d-flex justify-content-center" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Congratulations, you have been hired for the position.">
                    Hired
               </div>
               <div class="status-text col-12 col-md-10">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
               </div>
               </div>
          </div>
     </div>
     <?php require "../common/footer-inside-folder.php"; ?>
     <?php require "../common/message-session.php"; ?>
     <script src="../js/remove-url-session.js"></script>
     <script>
          const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
          const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
     </script>
</body>
</html>