<?php
     session_start();
     include "../session-check/employer-not-set.php";
     include "../function/retrieve-employer-signup.php";     
     include "../function/retrieve-employer-image.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Employer Home</title>
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

          .hover-img:hover {
               filter: brightness(.9);
          }
     </style>
</head>
<body class="container-xxl">
     <?php include "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Employer</h6></a> 
          </div>
     </div>
     <div class="body d-flex justify-content-center align-items-center m-2 p-4" id="login-body">
          <div>
               <div class="upper-section d-lg-flex d-grid justify-content-center align-items-center mt-2 mb-4">
                         <div class="circle-section justify-content-center align-items-center <?= isset($ProfileImageData) ? 'd-flex' : "d-none" ?>">
                              <label for="image-upload" class="circle-image">
                                   <img <?= isset($ProfileImageData) ? '' : "class=\" hover-img \" onclick=\"window.location.href='preview-profile.php'\"" ?> id="profile-img" src="<?= isset($ProfileImageData) ? 'data:image/png;base64,' . $ProfileImageData : '../images/no-img-selected.png' ?>" alt="Job Seeker Image">
                              </label>
                         </div>
                    <div class="name-section m-3"><?= "$company_name" ?></div>
               </div>
               <div class="lower-section row">
                    <div class="col-lg-6 col-12 d-flex justify-content-center">
                         <div style="width: 500px;" class="home-btn">
                              <a href="preview-profile.php"><div class="home-btn-style">Profile Preview</div></a>
                              <a href="create-job-listing.php"><div class="home-btn-style">Create Job Listing</div></a>
                         </div>
                    </div>
                    <div class="col-lg-6 col-12 d-flex justify-content-center">
                         <div style="width: 500px;" class="home-btn">
                              <a href="application-review.php"><div class="home-btn-style">Application Review</div></a>
                              <a href="manage-job-listing.php"><div class="home-btn-style">Manage Job Listing</div></a>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <?php include "../common/footer-inside-folder.php"; ?>
     <?php include "../common/message-session.php"; ?>
</body>
</html>