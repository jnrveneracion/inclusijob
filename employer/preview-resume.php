<?php
     session_start();
     include "../session-check/employer-not-set.php";
     include "../function/retrieve-job-seeker-signup.php";
     include "../function/retrieve-job-seeker-image.php";
     include "../function/retrieve-job-listing-review-application.php";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | <?= "$firstname - Resume" ?></title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Lora&family=Roboto+Condensed&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
     <link rel="stylesheet" href="../css/index-style.css">
     <link rel="stylesheet" href="../css/signup-style.css">
     <style>
          .circle-section {
               text-align: center; /* Center the circular image */
          }

          .circle-image {
               position: relative;
               border-radius: 0; /* Create a circular frame */
               border: 5px solid white;
               overflow: hidden; /* Crop the image */
               display: flex;
               justify-content: center;
               align-items: center;
               cursor: default;
               width: 170px;
               height: 170px;
          }

          .circle-image img {
               width: auto; /* Make sure the image covers the circular frame */
               height: 100%;
               display: block;
          }

          #resume-div {
               box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
               padding: 50px;
               width: 816px;
               height: auto;
               margin: 0 auto;
          }

          #resume-name {
               font-family: 'Lora', serif;
               text-transform: uppercase;
               font-weight: 600;
          }

          .resume-label {
               font-family: 'Roboto Condensed', sans-serif;
               text-transform: uppercase;
               font-weight: 600;
               letter-spacing: 1px;
          }

          .resume-data {
               font-family: 'Roboto Condensed', sans-serif;
               font-weight: lighter;
               letter-spacing: .5px;
          }

          .fas {
               background-color: rgb(102, 102, 102);
               padding: 5px 5px 5px 6px;
               border-radius: 50%;
               text-align: center;
          }

          .fadeInUp {
               animation: fadeInUp; 
               animation-duration: 1s; 
          }

          .export-btn {
               color: white;
               margin: 0px 10px;
               border-radius: 5px;
               padding: 5px 30px;
               box-shadow: 0 13px 7px -7px rgba(159, 159, 159, 0.25), 0 8px 16px 28px rgba(219, 219, 219, 0);
               font-family: "Avenir Next";
               font-size: 18px;
               border: 2px solid color(srgb 0.0931 0.4248 0.81);
               background-color: color(srgb 0.1277 0.5183 0.9668);
          }

          .export-btn:hover {
               filter: brightness(.9);
          }

          /* Define styles for printing */
          @media print {
               *, div {
                    break-inside: avoid;
                    page-break-inside: avoid;
               }
          }
     </style>
</head>
<body class="container-xxl">
     <?php require "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Employer</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="manage-job-listing.php" class="no-decor-link"><h6 class="page-indicator-txt">Manage Job Listing</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" onclick="history.back(); return false;" class="no-decor-link"><h6 class="page-indicator-txt"><?= $job_title ?> Job Application Review</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active"><?= "$lastname" ?> Preview Resume</h6></a> 
          </div>
     </div>

     <div class="mb-2 mt-3 row">
          <div class="col-12 col-lg-10 mt-4 mt-lg-0 d-flex justify-content-end">
               <button id="print" class="export-btn me-3">Print</button>
          </div>
     </div>
     <div class="d-flex justify-content-center align-items-start mt-3 mb-3">
          <div class="w-75 overflow-scroll mt-1 mb-1 pt-2 pb-5">
               <div id="resume-div" class="bg-white">
                    <div class="resume-head d-flex justify-content-start align-items-center">
                         <label for="image-upload" class="circle-image me-3">
                              <img id="profile-img" src="<?= isset($ProfileImageData) ? 'data:image/png;base64,' . $ProfileImageData : '../images/blank-profile.png' ?>" alt="Job Seeker Image">
                         </label>
                         <div>
                              <div class="fs-3" style="letter-spacing: 1px;" id="resume-name"><?= "$firstname $middlename $lastname" ?></div>
                              <hr class="m-0">
                              <div class="resume-data">Contact no.: +63<?= "$contact_no" ?></div>
                              <div class="resume-data">Email: <?= "$email" ?></div>
                              <div class="resume-data">Address: <?= "$jobseeker_address" ?></div>
                         </div>
                    </div>
                    <div class="resume-bdy row mt-4">
                         <div class="col-3">
                              <div>
                                   <div class="resume-label">PERSONAL INFORMATION</div>
                                   <div class="resume-info m-2 mt-1 ms-0 mb-1 d-flex align-items-center">
                                        <div class="resume-data">
                                             Age: <?= "$age" ?>
                                        </div>
                                   </div>
                                   <div class="resume-info m-2 mt-1 ms-0 mb-1 d-flex align-items-center">
                                        <div class="resume-data">
                                             Birthday: <?= "$birthday" ?>
                                        </div>
                                   </div>
                                   <div class="resume-info m-2 mt-1 ms-0 mb-1 d-flex align-items-center">
                                        <div class="resume-data">
                                             Sex: <?= "$sex" ?>
                                        </div>
                                   </div>
                                   <div class="resume-info m-2 mt-0 ms-0 mb-1 d-flex align-items-center">
                                        <div class="resume-data">
                                             Civil status: <?= "$civil_status" ?>
                                        </div>
                                   </div>
                              </div>
                              <div>
                                   <div class="resume-label mt-4">SKILLS</div>
                                   <div class="resume-info m-2 mt-0 ms-0 mb-1 d-flex align-items-center">
                                        <div class="resume-data">
                                             <ul style="margin-left: -13px;">
                                                  <?php include "../function/retrieve-job-seeker-skill-resume.php" ?>
                                             </ul>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-9">
                              <div>
                                   <div class="resume-label">PERSONAL SUMMARY</div>
                                   <div class="resume-info m-2 mt-0 ms-0 mb-1 d-flex align-items-center">
                                        <div class="resume-data">
                                             <?= $jobseeker_objectives ?>
                                        </div>
                                   </div>
                                   <div class="resume-label mt-2">EDUCATIONAL BACKGROUND</div>
                                   <div class="resume-info m-2 mt-0 ms-0 mb-1 d-flex align-items-center">
                                        <div>
                                             <?php include "../function/retrieve-job-seeker-education-resume.php" ?>
                                        </div>
                                   </div>
                                   <div>
                                   <div class="resume-label mt-2">CAREER HISTORY</div>
                                   <div class="resume-info m-2 mt-0 ms-0 mb-1">
                                             <?php include "../function/retrieve-job-seeker-career-history-resume.php" ?>
                                   </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          </div>
     </div>

     <?php require "../common/footer-inside-folder.php"; ?>
     <?php require "../common/message-session.php"; ?>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
        document.getElementById('print').addEventListener('click', function() {
            var resumeDiv = document.getElementById('resume-div');
            printDiv(resumeDiv);
        });

        function printDiv(divName) {
            var printContents = divName.innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

     <script>
          const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
          const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
     </script>
</body>
</html>


