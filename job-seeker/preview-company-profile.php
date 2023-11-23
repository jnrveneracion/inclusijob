<?php
     session_start();
     include "../session-check/job-seeker-not-set.php";
     include "../function/retrieve-employer-signup.php"; 
     include "../function/retrieve-job-seeker-signup.php"; 
     include "../function/retrieve-employer-image-preview.php";
     include "../function/retrieve-employer-check-total-reviews.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Company Profile</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://unpkg.com/@stackoverflow/stacks/dist/css/stacks.min.css">
     <link rel="stylesheet" href="../css/index-style.css">
     <link rel="stylesheet" href="../css/signup-style.css">
     <style>
          .upper-section {
               background: linear-gradient(340deg, rgba(247, 33, 33, 0.61), rgba(103, 0, 0, 0.73)), url("../images/bg-1.jpg") center center no-repeat;
               background-size: cover;
               color: white;
               padding: 30px;
               border-radius: 10px;
               margin: 0px 3%;
               margin-bottom: 30px;
               box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
          }

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
               width: 150px; /* Set the width and height to your desired circle size */
               height: 150px;
          }

          .circle-image img {
               width: auto; /* Make sure the image covers the circular frame */
               height: 100%;
               display: block;
          }

          #btn-outline-a {
               background-color: transparent;
               color: white;
               border: 2px solid white;
               border-radius: 10px;
               padding: 5px 10px;
               margin: 5px 0px;
          }

          #btn-outline-b {
               background-color: transparent;
               color: rgb(122, 122, 122);
               border: 2px solid rgb(122, 122, 122);
               border-radius: 10px;
               padding: 5px 40px;
               margin: 5px 0px;
          }

          #btn-solid {
               background-color: rgb(122, 122, 122);
               color: white;
               border: 2px solid rgb(122, 122, 122);
               border-radius: 10px;
               padding: 5px 30px;
               margin: 5px 10px;
          }

          #btn-outline-b:hover {
               color: black;
               border: 2px solid black;
          }

          #btn-outline-a:hover, #btn-solid:hover {
               filter: brightness(.9);
          }

          .head-text {
               font-weight: 500;
               color: rgb(93, 93, 93);
               letter-spacing: 2px;
          }

          .avenir {
               font-family: "Avenir Next" !important;
          }

          .info-body {
               box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
               padding: 20px 20px;
               border-radius: 10px;
          }

          .info-label {
               font-weight: 400;
               color: rgb(96, 96, 96);
          }

          .info-data {
               font-weight: 450;
               color: rgb(0, 0, 0);
               letter-spacing: 1px;
          }

          .recom-indicator {
               color: rgb(193, 193, 193);
               margin: 0px 5px;
          }

          .info-body:hover {
               box-shadow: 0 1px 3px rgba(0, 0, 0, 0.35), -1px 2px 21px rgba(0, 0, 0, 0.05);
          }

          .plain-link-a {
               color: white;
          }

          .plain-link-a:hover {
               color: white;
               filter: brightness(.9);
          }

          .reviews2 svg path, .reviews3 svg path, .bordered-reviews svg path {
               stroke: color(srgb 0.4 0.3744 0.014);
               stroke-width: 15;
          }

          .reviews2 svg {
               padding: 1px 0px;
               height: 1.5em;
               margin: 0px 2px;
          }

          .progress-bar {
               background-color: color(srgb 0.9937 0.8933 0.3018);
               border-right: 1px solid rgb(249, 213, 0);
          }

          .progress.ms-1.me-1 {
               border: 1px solid color(srgb 0.75 0.7429 0.6788);
          }

          .circle-svg {
               background-color: white;
               position: absolute;
               bottom: -8px;
               right: -17px;
               border-radius: 100%;
               border: 3px solid;
               padding: 10px 13px;
          }

          .circle-text {
               position: absolute;
               width: 100%;
               left: 0;
               text-align: center;
               top: 39%;
               font-size: 19px;
          }

          .total-per-star {
               width: 12%;
               font-size: 10px;
               margin-top: 2px;
          }

          .remove-btn-style {
               border: none;
               background-color: transparent;
          }

          .tooltip-container {
               position: relative;
          }

          .custom-tooltip {
               display: none;
               position: absolute;
               background-color: #ffffff;
               border: 1px solid #ddd;
               border-radius: 5px;
               padding: 10px;
               z-index: 1;
               max-width: 365px;
               width: 365px;
               top: 125%;
               left: 50%;
               transform: translateX(-50%);
               box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
               
          }

          .tooltip-container:hover .custom-tooltip {
               display: block;
          }

     </style>
     <script>
              function applyStarColor(selector, fillColor) {
               const stars = document.querySelectorAll(selector);

               stars.forEach((star, index) => {
                    // Get the rating from the count-star attribute
                    const rating = parseFloat(star.parentElement.getAttribute('count-star'));

                    if (index < Math.floor(rating)) {
                         star.style.fill = fillColor.wholeStar; // Whole star color
                    } else if (index === Math.floor(rating) && rating % 1 !== 0) {
                         const decimalPart = rating % 1;
                         const gradientColor = `rgba(${fillColor.gradient.join(', ')}, ${decimalPart})`; // Gradient color based on decimal part
                         star.style.fill = gradientColor;
                    } else {
                         star.style.fill = fillColor.inactiveStar; // Inactive star color
                    }
               });
          }
     </script>
</head>
<body class="container-xxl">
     <?php require "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Job Seeker<?php echo $retrieveReviews; ?></h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="job-search.php" class="no-decor-link"><h6 class="page-indicator-txt">Job Search</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Company Profile</h6></a> 
          </div>
     </div>
     <div class="m-3 p-4 pt-0">
          <div>
               <div class="upper-section row avenir">
                    <div class="col-5 col-lg-3 d-flex justify-content-end">
                         <div class="circle-section d-flex justify-content-center align-items-center">
                              <label for="image-upload" class="circle-image">
                                   <img id="profile-img" src="<?= isset($ProfileImageData) ? 'data:image/png;base64,' . $ProfileImageData : '' ?>" alt="Employer profile image">
                              </label>
                         </div>
                    </div>
                    <div class="col-7 col-lg-9 d-flex align-items-center">
                         <div>
                              <div class="fs-2"><?= "$company_name" ?></div>
                              <div class="">
                                   <svg style="fill: white; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1uznlpf0 _1uvwke522 _1m9vd2q56 _1m9vd2q5e _1n6dj3h0 _1n6dj3h2 _1n6dj3h3 _1n6dj3h4" aria-hidden="true"><path d="M12 1C7.6 1 4 4.6 4 9c0 4.1 6.5 12.6 7.2 13.6.2.2.5.4.8.4s.6-.1.8-.4c.7-1 7.2-9.5 7.2-13.6 0-4.4-3.6-8-8-8zm0 19.3c-2.2-3-6-8.8-6-11.3 0-3.3 2.7-6 6-6s6 2.7 6 6c0 2.5-3.8 8.3-6 11.3z"></path><path d="M12 5c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3zm0 4c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1z"></path></svg>
                                   <?= "$company_address" ?>
                              </div>
                              <div class="">
                                   <svg style="fill: white; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1uznlpf0 _1uvwke522 _1m9vd2q56 _1m9vd2q5e _1n6dj3h0 _1n6dj3h2 _1n6dj3h3 _1n6dj3h4" aria-hidden="true"><path d="M22 6.8C21.9 5.2 20.6 4 19 4H5C3.4 4 2.1 5.2 2 6.8V17c0 1.7 1.3 3 3 3h14c1.7 0 3-1.3 3-3V6.8zM5 6h14c.4 0 .7.2.9.5L12 11.8 4.1 6.5c.2-.3.5-.5.9-.5zm14 12H5c-.6 0-1-.4-1-1V8.9l7.4 5c.2.1.4.2.6.2s.4-.1.6-.2l7.4-5V17c0 .6-.4 1-1 1z"></path></svg>
                                   <a href="mailto:<?= "$company_email" ?>" class="text-white"><?= "$company_email" ?></a>
                              </div>
                              <div class="d-flex align-items-center mt-1">
                                   <div class="reviews d-flex align-items-center mb-1" count-star="<?= $star_review_7_average ?>">
                                        <!-- Add your star icons here with unique IDs -->
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                   </div>
                                   
                                   <div class="reviews d-flex align-items-center ms-1">
                                        <p class="m-0 d-flex">
                                             <span id="review-total"><?= $star_review_7_average ?>&nbsp;</span>
                                             <span class="<?= $showReviews ?>"> total rating from 
                                                  <a href="#company-reviews" class="plain-link-a text-decoration-underline"><?= $total_review ?> reviews</a></span>
                                             <span class="<?= $showNoReviews ?>"> currently no total rating available</span>
                                        </p>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          
          <div style="margin: 0px 4%;" class="avenir" id="profile-section">
               <div id="">
                    <p class="fs-5 head-text">Company Information</p>
                    <div class="info-body row">
                         <div class="col-12 col-md-6">
                              <p class="info-section"><span class="info-label">Company name: </span><span class="info-data"><?= "$company_name" ?></span></p>
                              <p class="info-section"><span class="info-label">Industry/Sector: </span><span class="info-data"><?= "$industry_sector" ?></span></p>
                              <p class="info-section"><span class="info-label">Company size: </span><span class="info-data"><?= "$company_size" ?></span></p>
                              <p class="info-section"><span class="info-label">Founded year: </span><span class="info-data"><?= "$founded_year" ?></span></p>
                              <p class="info-section"><span class="info-label">Address: </span><span class="info-data"><?= "$company_address" ?></span></p>
                         </div>
                         <div class="col-12 col-md-6">
                              <p class="info-section"><span class="info-label">Contact person: </span><span class="info-data"><?= "$contact_persons_name" ?></span></p>
                              <p class="info-section"><span class="info-label">Contact person's position: </span><span class="info-data"><?= "$contact_persons_position" ?></span></p>
                              <p class="info-section"><span class="info-label">Contact no.: </span><span class="info-data">+63 <?= "$contact_persons_contact_no" ?></span></p>
                              <p class="info-section"><span class="info-label">Email: </span><span class="info-data"><?= "$company_email" ?></span></p>
                         </div>
                         <div class="col-12">
                              <p class="info-section"><span class="info-label">Description: </span><br><span class="info-data"><?= "$company_description" ?></span></p>
                         </div>
                         <div class="col-12">
                              <p class="info-section"><span class="info-label">Work environment: </span><br><span class="info-data"><?= "$company_culture" ?></span></p>
                         </div>
                         <div class="col-12">
                              <p class="info-section mb-0"><span class="info-label">Links: </span></p>
                              <div class="row">
                                   <div class="col-lg-3 col-12 d-flex align-items-center">
                                        <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
                                        <p class="ms-2 mb-1 mt-1 info-section"><span class="info-label">Website: </span><?php echo ((!empty($company_website)) ? $company_website : ' -') ?></p>
                                   </div>
                                   <div class="col-lg-3 col-12 d-flex align-items-center">
                                        <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg>
                                        <p class="ms-2 mb-1 mt-1 info-section"><span class="info-label">Facebook: </span><?php echo ((!empty($company_facebook)) ? $company_facebook : ' -') ?></p>
                                   </div>
                                   <div class="col-lg-3 col-12 d-flex align-items-center">
                                        <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
                                        <p class="ms-2 mb-1 mt-1 info-section"><span class="info-label">Linkedin: </span><?php echo ((!empty($company_linkedin)) ? $company_linkedin : ' -') ?></p>
                                   </div>
                                   <div class="col-lg-3 col-12 d-flex align-items-center">
                                        <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                                        <p class="ms-2 mb-1 mt-1 info-section"><span class="info-label">Twitter: </span><?php echo ((!empty($company_twitter)) ? $company_twitter : ' -') ?></p>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>

               <div id="">
                    <div class="d-flex align-items-center justify-content-between mb-2 mt-3" id="company-reviews">
                         <p class="fs-5 head-text mb-0">Reviews</p> 
                    </div>
                    <div class="info-body row mt-3 <?= $showReviews ?>">
                         <h3 class="mb-0">Working at <?= "$company_name" ?></h3>
                         <div style="color: rgb(189, 189, 189); font-size: 13px;">Ratings by <?= $total_review ?> <?= "$company_name" ?> employees</div>
                         <div class="row d-flex justify-content-evenly mt-5 mb-5">
                              <div class="col-12 col-lg-6 row">
                                   <div class="col-6 d-flex justify-content-center align-items-center">
                                        <div>
                                             <div><h1 class="fw-bold text-center mb-0" style="font-size: 60px;"><?= $star_review_7_average ?></h1></div>
                                             <div class="d-flex justify-content-center align-items-center">
                                                  <div class="reviews2 d-flex align-items-center mb-1" count-star="<?= $star_review_7_average ?>">
                                                       <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                                       <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                                       <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                                       <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                                       <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" style="fill: rgba(214, 214, 214, 0.23);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                                                  </div>
                                             </div>
                                             <div><?= $total_review ?> overall ratings total</div>
                                        </div>
                                   </div>
                                   <div class="col-6 d-flex align-items-center">
                                        <div style="width: 100%;">
                                             <div class="w-100 d-flex align-items-center mt-1 mb-1">
                                                  <span style="font-weight: 600; width: 5%;">5</span>
                                                  <div style="width: 85%;" class="progress ms-1 me-1" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                       <div class="progress-bar" style="width: <?= $percentage7_5 ?>%"></div>
                                                  </div>
                                                  <span class="total-per-star"><?= $count_7_star_review_5 ?></span>
                                             </div>
                                             <div class="w-100 d-flex align-items-center mt-1 mb-1">
                                                  <span style="font-weight: 600; width: 5%;">4</span>
                                                  <div style="width: 85%;" class="progress ms-1 me-1" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                       <div class="progress-bar" style="width: <?= $percentage7_4 ?>%"></div>
                                                  </div>
                                                  <span class="total-per-star"><?= $count_7_star_review_4 ?></span>
                                             </div>
                                             <div class="w-100 d-flex align-items-center mt-1 mb-1">
                                                  <span style="font-weight: 600; width: 5%;">3</span>
                                                  <div style="width: 85%;" class="progress ms-1 me-1" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                       <div class="progress-bar" style="width: <?= $percentage7_3 ?>%"></div>
                                                  </div>
                                                  <span class="total-per-star"><?= $count_7_star_review_3 ?></span>
                                             </div>
                                             <div class="w-100 d-flex align-items-center mt-1 mb-1">
                                                  <span style="font-weight: 600; width: 5%;">2</span>
                                                  <div style="width: 85%;" class="progress ms-1 me-1" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                       <div class="progress-bar" style="width: <?= $percentage7_2 ?>%"></div>
                                                  </div>
                                                  <span class="total-per-star"><?= $count_7_star_review_2 ?></span>
                                             </div>
                                             <div class="w-100 d-flex align-items-center mt-1 mb-1">
                                                  <span style="font-weight: 600; width: 5%;">1</span>
                                                  <div style="width: 85%;" class="progress ms-1 me-1" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                                       <div class="progress-bar" style="width: <?= $percentage7_1 ?>%"></div>
                                                  </div>
                                                  <span class="total-per-star"><?= $count_7_star_review_1 ?></span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-12 col-lg-6 row">
                                   <div class="col-6 justify-content-center d-flex">
                                        <div>
                                             <div class="s-progress s-progress__circular fc-blue-400 position-relative" style="--s-progress-value: <?= $percentageSalaryReviewSVGValue ?>; width: 100px; height: 100px; margin: 0 auto;">
                                                  <svg style="width: 100px;" class="s-progress-bar" role="progressbar" viewbox="0 0 32 32" aria-valuemin="0" aria-valuemax="100" aria-valuenow="100">
                                                       <circle cx="16" cy="16" r="14" ></circle>
                                                       <circle cx="16" cy="16" r="14"></circle>
                                                  </svg>
                                                  <span class="circle-svg">
                                                       <svg style="fill: #1b75d0; " xmlns="http://www.w3.org/2000/svg" height="1.3em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z"/></svg>
                                                  </span>
                                                  <span class="circle-text">
                                                       <?= $percentageSalaryReviewSVG ?>%
                                                  </span>
                                             </div>
                                             <div class="mt-3 ms-2 me-2 text-center fs-5">
                                                  <span><strong><?= $percentageSalaryReviewSVG ?>%</strong> rate salary as <?= $averageSalaryReview ?>.</span>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="col-6">
                                        <div>
                                             <div class="s-progress s-progress__circular fc-blue-400 position-relative" style="--s-progress-value: <?= $percentageRecommendReviewValue ?>; width: 100px; height: 100px; margin: 0 auto;">
                                                  <svg style="width: 100px;" class="s-progress-bar" role="progressbar" viewbox="0 0 32 32" aria-valuemin="0" aria-valuemax="100" aria-valuenow="100">
                                                       <circle cx="16" cy="16" r="14" ></circle>
                                                       <circle cx="16" cy="16" r="14"></circle>
                                                  </svg>
                                                  <span class="circle-svg">
                                                       <svg style="fill: #1b75d0; width: 1.2em;" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"/></svg>
                                                  </span>
                                                  <span class="circle-text">
                                                       <?= $percentageRecommendReview ?>%
                                                  </span>
                                             </div>
                                             <div class="mt-3 ms-2 me-2 text-center fs-5">
                                                  <span><strong><?= $percentageRecommendReview ?>%</strong> employees <?= $averageRecommendReview ?> this employer to friends.</span>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-12">
                                   <div class="row mt-3">
                                        <?php include "../function/retrieve-jobseeker-reviews.php" ?>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="info-body row mt-3 <?= $showNoReviews ?>">
                         <h5 class="mb-0 text-center p-2 fw-normal">At the moment, there are no reviews available for this company on our InclusiJob platform.</h5>
                    </div>
               </div>
          </div>

          
     </div>


     <?php include "../common/footer-inside-folder.php"; ?>
     <script>
          // const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
          // const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

          // Initialize Bootstrap tooltip
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

     </script>
     <script>
    // Apply the color to all sets of stars with the class "reviews"
    applyStarColor('.reviews svg', {
        wholeStar: '#fff567',
        gradient: [255, 245, 103],
        inactiveStar: 'rgba(214, 214, 214, 0.53)'
    });

    applyStarColor('.reviews2 svg', {
        wholeStar: 'rgb(255, 227, 41)',
        gradient: [255, 227, 41],
        inactiveStar: 'rgba(214, 214, 214, 0.53)'
    });
</script>

</body>
</html>

