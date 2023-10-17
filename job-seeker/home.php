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
     <title>InclusiJob | Job Seeker Home</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/index-style.css">
     <style>
          .circle-section {
               text-align: center; /* Center the circular image */
          }

          .circle-image {
               width: 200px; /* Set the width and height to your desired circle size */
               height: 200px;
               border-radius: 50%; /* Create a circular frame */
               background: url("../images/square-logo.png") center center no-repeat; /* Set the image as background */
               background-size: cover; /* Ensure the image covers the circular frame */
               border: 5px solid color(srgb 0.905 0.905 0.905);
          }

          .name-section {
               font-size: 40px;
               letter-spacing: 1px;
               text-transform: uppercase;
          }

          .home-btn-style {
               border: 3px solid color(srgb 0.1277 0.5183 0.9668);
               border-radius: 5px;
               padding: 10px 10px;
               margin: 10px 25px;
               text-align: center;
               font-weight: 600;
               letter-spacing: 3px;
          }

          .home-btn-style:hover {
               filter: brightness(.9);
          }

          .home-btn a div{
               margin: 20px !important;
          }
     </style>
</head>
<body class="container-xxl">
     <?php require "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="../index.php" class="no-decor-link"><h6 class="page-indicator-txt active">Job Seeker</h6></a> 
          </div>
     </div>
     <div class="body d-flex justify-content-center align-items-center m-2 p-4" id="login-body">
          <div>
               <div class="upper-section d-lg-flex d-grid justify-content-center align-items-center mt-2 mb-4">
                    <div class="circle-section d-flex justify-content-center align-items-center"><div class="circle-image"></div></div>
                    <div class="name-section m-3"><?= "$firstname $lastname" ?></div>
               </div>
               <div class="lower-section row">
                    <div class="col-lg-6 col-12 d-flex justify-content-center">
                         <div style="width: 500px;" class="home-btn">
                              <a href="preview-profile.php"><div class="home-btn-style">Profile Preview</div></a>
                              <a href="notifications.php"><div class="home-btn-style">Notifications</div></a>
                              <a href="job-application-status.php"><div class="home-btn-style">Job Application Status</div></a>
                         </div>
                    </div>
                    <div class="col-lg-6 col-12 d-flex justify-content-center">
                         <div style="width: 500px;" class="home-btn">
                              <a href="job-search.php"><div class="home-btn-style">Job Search</div></a>
                              <a href="company-profiles.php"><div class="home-btn-style">Company Profiles</div></a>
                              <a href="saved-jobs.php"><div class="home-btn-style">Saved Jobs</div></a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <?php require "../common/footer-inside-folder.php"; ?>
     <?php require "../common/message-session.php"; ?>
</body>
</html>