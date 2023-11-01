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
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/index-style.css">
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
     <div class="breadcrumbs" style="display: flex; justify-content: space-between; align-items:center;">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start align-items-center">
               <a href="../index.php" class="no-decor-link"><h6 class="page-indicator-txt active">Job Seeker</h6></a> 
          </div>
          <div class="page-indicator add-on-nav position-relative">
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
                              <a href="preview-profile.php"><div class="home-btn-style">Profile Preview</div></a>
                              <a href="saved-jobs.php"><div class="home-btn-style">Saved Jobs</div></a>
                         </div>
                    </div>
                    <div class="col-lg-6 col-12 d-flex justify-content-center">
                         <div style="width: 500px;" class="home-btn">
                              <a href="job-search.php"><div class="home-btn-style">Job Search</div></a>
                              <a href="job-application-status.php"><div class="home-btn-style">Job Application Status</div></a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <?php include "../common/footer-inside-folder.php"; ?>
     <?php include "../common/message-session.php"; ?>
</body>
</html>