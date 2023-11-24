<?php
     session_start();
     include "../session-check/job-seeker-not-set.php";
     include "../function/retrieve-job-seeker-signup.php"; 
     include "../function/retrieve-job-seeker-image.php";    
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Job Seeker Home</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/index-style.css">
     <?php include "../function/accessibility-translate.php" ?>
     <style>
          .circle-section {
               text-align: center; /* Center the circular image */
          }

          .circle-image {
               position: relative;
               border-radius: 50%; /* Create a circular frame */
               border: 5px solid white;
               overflow: hidden; /* Crop the image */
               display: flex;
               justify-content: center;
               align-items: center;
               width: 250px; /* Set the width and height to your desired circle size */
               height: 250px;
               
          }

          .circle-image img {
               width: auto; /* Make sure the image covers the circular frame */
               height: 100%;
               display: block;
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

          .hover-img:hover, .add-on-nav:hover {
               filter: brightness(.9);
          }

          .add-on-nav {
               background-color: #2184f7;
               padding: 7px 20px;
               border-radius: 7px;
          }
     </style>
</head>
<body class="container-xxl">
     <?php include "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs" style="display: flex; justify-content: space-between; align-items:start;">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start align-items-center">
               <a href="../index.php" class="no-decor-link"><h6 class="page-indicator-txt active">Job Seeker</h6></a> 
          </div>
          <div class="d-none page-indicator add-on-nav position-relative">
               <a href="notifications.php" class="d-flex justify-content-center justify-content-lg-start align-items-center" style="z-index: 1;">
                    <svg style="fill:white" xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 448 512">
                         <path d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z"/>
                    </svg>
                    <h6 class="ms-1 mb-0 text-white">Notifications</h6>
               </a>
               <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
               </span>
          </div>
     </div>
     <div class="body d-flex justify-content-center align-items-center m-2 p-4" id="login-body">
          <div>
               <div class="upper-section d-lg-flex d-grid justify-content-center align-items-center mt-2 mb-1 mb-lg-4">
                         <div class="circle-section d-flex justify-content-center align-items-center">
                              <label for="image-upload" class="circle-image">
                                   <img <?= isset($ProfileImageData) ? '' : "class=\" hover-img \" onclick=\"window.location.href='preview-profile.php'\"" ?> id="profile-img" src="<?= isset($ProfileImageData) ? 'data:image/png;base64,' . $ProfileImageData : '../images/no-img-selected.png' ?>" alt="Job Seeker Image">
                              </label>
                         </div>
                    <div class="name-section ms-0 ms-lg-2 mt-2 text-lg-start text-center"><?= "$firstname $lastname" ?></div>
               </div>
               <div class="lower-section row">
                    <div class="col-lg-6 col-12 d-flex justify-content-center">
                         <div style="width: 500px;" class="home-btn">
                              <a href="preview-profile.php"><div class="home-btn-style d-flex align-items-center justify-content-center position-relative"><svg  class="me-2" style="fill: color(srgb 0.0618 0.4255 0.9648); position: absolute; left: 20;"  xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/></svg>Profile Preview</div></a>
                              <a href="saved-jobs.php"><div class="home-btn-style d-flex align-items-center justify-content-center position-relative"><svg class="me-2" style="fill: color(srgb 0.0618 0.4255 0.9648); position: absolute; left: 20;" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"/></svg>Saved Jobs</div></a>
                         </div>
                    </div>
                    <div class="col-lg-6 col-12 d-flex justify-content-center">
                         <div style="width: 500px;" class="home-btn">
                              <a href="job-search.php"><div class="home-btn-style d-flex align-items-center justify-content-center position-relative"><svg class="me-2" style="fill: color(srgb 0.0618 0.4255 0.9648); position: absolute; left: 20;" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>Job Search</div></a>
                              <a href="job-application-status.php"><div class="home-btn-style d-flex align-items-center justify-content-center position-relative"><svg class="me-2" style="fill: color(srgb 0.0618 0.4255 0.9648); position: absolute; left: 20;" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 1 224 0a128 128 0 1 1 0 256zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 36-146.9c2-8.1 9.8-13.4 17.9-11.3c70.1 17.6 121.9 81 121.9 156.4c0 17-13.8 30.7-30.7 30.7H285.5c-2.1 0-4-.4-5.8-1.1l.3 1.1H168l.3-1.1c-1.8 .7-3.8 1.1-5.8 1.1H30.7C13.8 512 0 498.2 0 481.3c0-75.5 51.9-138.9 121.9-156.4c8.1-2 15.9 3.3 17.9 11.3l36 146.9 33.4-123.9z"/></svg>Job Application Status</div></a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <?php include "../common/footer-inside-folder.php"; ?>
     <?php include "../common/message-session.php"; ?>
</body>
</html>