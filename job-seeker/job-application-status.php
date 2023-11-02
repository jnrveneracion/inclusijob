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

          .status-info {
               font-size: 13px;
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
     <!-- <script>
          $('#view-application-status').on('show.bs.modal', function (event) {
               var button = $(event.relatedTarget); // The button that triggered the modal
               var modal = $(this);
               
               // Set the modal content based on the attribute data
               modal.find('#job-title').text(button.attr('job-title'));
               modal.find('#job-description').text(button.attr('job-description'));
               modal.find('#qualifications').text(button.attr('qualifications'));
               modal.find('#job-location').text(button.attr('job-location'));
               modal.find('#employment-type').text(button.attr('employment-type'));
               modal.find('#compensation').text(button.attr('compensation'));
               modal.find('#compensation-frequency').text(button.attr('compensation-frequency'));
               modal.find('#start-compensation').text(button.attr('start-compensation'));
               modal.find('#end-compensation').text(button.attr('end-compensation'));
               modal.find('#application-deadline').text(button.attr('application-deadline'));
               modal.find('#benefits').text(button.attr('benefits'));
               modal.find('#company-name').text(button.attr('company-name'));
               modal.find('#industry-sector').text(button.attr('industry-sector'));
               modal.find('#company-size').text(button.attr('company-size'));
               modal.find('#founded-year').text(button.attr('founded-year'));
               modal.find('#company-address').text(button.attr('company-address'));
               modal.find('#company-description').text(button.attr('company-description'));
               modal.find('#company-culture').text(button.attr('company-culture'));
               modal.find('#contact-persons-name').text(button.attr('contact-persons-name'));
               modal.find('#contact-persons-position').text(button.attr('contact-persons-position'));
               modal.find('#contact-persons-contact-no').text(button.attr('contact-persons-contact-no'));
               modal.find('#company-website').text(button.attr('company-website'));
               modal.find('#company-facebook').text(button.attr('company-facebook'));
               modal.find('#company-linkedin').text(button.attr('company-linkedin'));
               modal.find('#company-twitter').text(button.attr('company-twitter'));
               modal.find('#email').text(button.attr('email'));

               // Set the text values for each date field
               modal.find('#applied-date').text(button.attr('applied-date'));
               modal.find('#under-review-date').text(button.attr('under-review-date'));
               modal.find('#shortlisted-date').text(button.attr('shortlisted-date'));
               modal.find('#interview-date').text(button.attr('interview-date'));
               modal.find('#rejected-date').text(button.attr('rejected-date'));
               modal.find('#hired-date').text(button.attr('hired-date'));
               modal.find('#withdraw-job-date').text(button.attr('withdraw-job-date'));
               
          });
     </script> -->

</body>
</html>

  