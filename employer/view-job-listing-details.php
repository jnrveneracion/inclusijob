<?php
     session_start();
     include "../session-check/employer-not-set.php";
     include "../function/retrieve-employer-signup.php";  
     include "../function/retrieve-job-listing-preview.php";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | View Job Listing</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
     <link rel="stylesheet" href="../css/index-style.css">
     <link rel="stylesheet" href="../css/signup-style.css">
     <style>
          #search-btn, #apply-btn {
               color: white;
               margin: 0px 10px;
               border-radius: 5px;
               padding: 5px 30px;
               box-shadow: 0 13px 7px -7px rgba(159, 159, 159, 0.25), 0 8px 16px 28px rgba(219, 219, 219, 0);
               font-family: "Avenir Next";
               font-size: 18px;
          }

          #search-btn {     
               border: 2px solid color(srgb 0.5058 0.5059 0.5059);
               background-color: color(srgb 0.6509 0.651 0.651);

          }

          #apply-btn {
               border: 2px solid color(srgb 0.0931 0.4248 0.81);
               background-color: color(srgb 0.1277 0.5183 0.9668);
          }

          #search-btn:hover, #apply-btn:hover {
               filter: brightness(.9);
          }

          .search-input {
               background-color: color(srgb 0.9498 0.9519 0.9384);
               border-radius: 5px;
               font-family: "Avenir Next";
          }

          .search-grp {
               border: 2px solid color(srgb 0.5058 0.5059 0.5059);
               border-radius: 7px;
               box-shadow: 0 13px 7px -7px rgba(159, 159, 159, 0.25), 0 8px 16px 28px rgba(219, 219, 219, 0);
               font-family: "Avenir Next";
          }

          .gray-background, .search-input:focus {
               background-color: color(srgb 0.9498 0.9519 0.9384) !important;
          } 

          .job-listing {
               background-color: rgb(255, 255, 255);
               box-shadow: 0 1px 3px rgba(75, 75, 75, 0.16);
               padding: 10px 15px;
               border-radius: 5px;
               border: 2px solid color(srgb 0.82 0.82 0.82);
          }

          a.no-hover:hover {
               color: black;
          }

          .listing-item {
               margin: 10px 5px;
          }

          .btn-job-listing {
               padding: 5px 25px;
               border-radius: 5px;
               color: white;
               font-weight: 600;
               margin: 0px 3px;
          }

          .btn-job-listing:hover {
               filter: brightness(.9);
               color: white;
          }

          .btn-job-listing.view {
               background-color: color(srgb 0.2574 0.6857 0.9496);
               border: 2px solid rgb(10, 141, 255);
          }

          .btn-job-listing.update {
               background-color: color(srgb 0.9724 0.7522 0.272);
               border: 2px solid rgb(190, 165, 0);
          }

          .btn-job-listing.delete {
               background-color: color(srgb 0.9289 0.2195 0.1988);
               border: 2px solid rgb(170, 67, 6);
          }

          .fadeInUp {
               animation: fadeInUp; /* referring directly to the animation's @keyframe declaration */
               animation-duration: .5s; /* don't forget to set a duration! */
          }

          .listing-details {
               border: 2px solid color(srgb 0.645 0.645 0.645) !important;
               margin: 6px 0px;
               padding: 10px 18px;
               border-radius: 6px;
          }
     </style>
</head>
<body class="container-xxl">
     <?php include "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Employer</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt">></h6></a> 
               <a href="javascript:void(0);" onclick="window.close();" class="no-decor-link"><h6 class="page-indicator-txt">Manage Job Listing</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt">></h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">View Job Listing</h6></a> 
          </div>
     </div>
     <div class="row justify-content-center mt-3">
          <div class="listing-details tab-pane col-11 col-lg-8">
               <?php 
               echo '
                    <div>
                         <div class="row head-section" style="display: flex; justify-content: space-between;">
                              <div class="col-7 d-flex align-items-center">
                                   <div>
                                        <h1 class="m-0">' . $row['job_title'] . '</h1>
                                        <h3 class="m-0">' . $row['company_name'] . '</h3>
                                   </div>
                              </div>
                              <div class="col-4 d-flex justify-content-end align-items-center">
                                   <a href="" class="btn-job-listing update d-flex align-items-center" class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Edit<svg class="ms-2" style="fill: white;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></a>
                                   <a href="" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" class="btn-job-listing delete delete-btn d-flex align-items-center" job-id="'. $job_ID .'">Delete<svg class="ms-2" style="fill: white;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a>
                              </div>
                         </div>
                         <div>
                              <div class="align-items-center">
                                   <div class="d-flex align-items-center mt-1 mb-1">
                                        <svg style="fill: black; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1uznlpf0 _1uvwke522 _1m9vd2q56 _1m9vd2q5e _1n6dj3h0 _1n6dj3h2 _1n6dj3h3 _1n6dj3h4" aria-hidden="true"><path d="M12 1C7.6 1 4 4.6 4 9c0 4.1 6.5 12.6 7.2 13.6.2.2.5.4.8.4s.6-.1.8-.4c.7-1 7.2-9.5 7.2-13.6 0-4.4-3.6-8-8-8zm0 19.3c-2.2-3-6-8.8-6-11.3 0-3.3 2.7-6 6-6s6 2.7 6 6c0 2.5-3.8 8.3-6 11.3z"></path><path d="M12 5c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3zm0 4c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1z"></path></svg>
                                        <span class="ms-1 fs-5">' . $row['job_location'] . '</span>
                                   </div>
                                   <div class="d-flex align-items-center mt-1 mb-1">
                                        <svg style="fill: black; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1wkzzau0 lnocuo22 a1msqi56 a1msqi5e jd63g10 jd63g12 jd63g13 jd63g14" aria-hidden="true"><path d="M9 6h2v2H9zm4 0h2v2h-2zm-4 4h2v2H9zm4 0h2v2h-2zm-4 4h2v2H9zm4 0h2v2h-2z"></path><path d="M17 2.2V2c0-.6-.4-1-1-1H8c-.6 0-1 .4-1 1v.2C5.9 2.6 5 3.7 5 5v16c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V5c0-1.3-.9-2.4-2-2.8zM17 20h-3v-2h-4v2H7V5c0-.6.4-1 1-1h8c.6 0 1 .4 1 1v15z"></path></svg>
                                        <span class="ms-1 fs-5">' . $row['industry_sector'] . '</span>
                                   </div>
                                   <div class="d-flex align-items-center mt-1 mb-1">
                                        <svg style="fill: black; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1wkzzau0 lnocuo22 a1msqi56 a1msqi5e jd63g10 jd63g12 jd63g13 jd63g14" aria-hidden="true"><path d="M16.4 13.1 13 11.4V6c0-.6-.4-1-1-1s-1 .4-1 1v6c0 .4.2.7.6.9l4 2c.1.1.2.1.4.1.4 0 .7-.2.9-.6.2-.4 0-1-.5-1.3z"></path><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path></svg>
                                        <span class="ms-1 fs-5">' . $row['employment_type'] . '</span>
                                   </div>
                                   <div class="d-flex align-items-center mt-1 mb-1">
                                   <svg style="fill: black; opacity: .7;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z"/></svg>
                                        <span class="ms-1 fs-5">'. $salaryStatement .'</span>
                                   </div>
                                   <div class="d-flex align-items-center mt-1">
                                        <p class="mb-1 fw-light">Posted: ' . $row['joblisting_date_added_word'] . '</p>
                                   </div>
                                   <div class="d-flex align-items-center mb-1">
                                        <p class="mb-1 fw-light '. $applicationDeadline .'">Application deadline: ' . $row['application_deadline_word'] . '</p>
                                   </div>
                              </div>
                              <div>
                                   <div>
                                        <p style="font-size: 18px;">' . $row['company_description'] . '</p>
                                   </div>
                                        <h6 class="mb-0 mt-2 fs-5">Job description:</h6>
                                   <div>
                                        <p>' . $row['job_description'] . '</p>
                                   </div>
                                   <h6 class="mb-0 mt-2 fs-5">Qualifications:</h6>
                                   <div>
                                        <p>' . $row['qualifications'] . '</p>
                                   </div>
                                   <h6 class="mb-0 mt-2 fs-5 '. $jobBenefits .'">Benefits:</h6>
                                   <div class="'. $jobBenefits .'">
                                        <p>' . $row['benefits'] . '</p>
                                   </div>
                                   <h6 class="mb-0 mt-2 fs-5 '. $workEnvironment .'">Work environment:</h6>
                                   <div>
                                        <p class="'. $workEnvironment .'">' . $row['company_culture'] . '</p>
                                   </div>
                                   <h6 class="mb-0 mt-2 fs-5">Additional information:</h6>
                                   <div class="row">
                                        <div class="col-12 col-lg-6">
                                             <div class="d-flex align-items-center">
                                                  <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg>
                                                  <p class="ms-2 mb-1 mt-1><span style="font-weight: 500;">No. of employees:</span>&nbsp;'. $row['company_size'] .'</p>
                                             </div>
                                             <div class="d-flex align-items-center">
                                                  <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c15.1 0 28.5-6.9 37.3-17.8C340.4 462.2 320 417.5 320 368c0-54.7 24.9-103.5 64-135.8V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zM640 368a144 144 0 1 0 -288 0 144 144 0 1 0 288 0zm-76.7-43.3c6.2 6.2 6.2 16.4 0 22.6l-72 72c-6.2 6.2-16.4 6.2-22.6 0l-40-40c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0L480 385.4l60.7-60.7c6.2-6.2 16.4-6.2 22.6 0z"/></svg>
                                                  <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Year founded:</span>&nbsp;'. $row['founded_year'] .'</p>
                                             </div>
                                             <div class="d-flex align-items-center">
                                                  <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
                                                  <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Address:</span>&nbsp;'. $row['company_address'] .'</p>
                                             </div>
                                             <div class="d-flex align-items-center">
                                                  <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                                                  <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Email:</span>&nbsp;'. $row['email'] .'</p>
                                             </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                             <div class="d-flex align-items-center '. ((!empty($row['company_website'])) ? 'd-flex' : 'd-none') .'">
                                                  <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
                                                  <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Website:</span>&nbsp;'. $row['company_website'] .'</p>
                                             </div>
                                             <div class="d-flex align-items-center '. ((!empty($row['company_facebook'])) ? 'd-flex' : 'd-none') .'">
                                                  <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg>
                                                  <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Facebook:</span>&nbsp;'. $row['company_facebook'] .'</p>
                                             </div>
                                             <div class="d-flex align-items-center '. ((!empty($row['company_linkedin'])) ? 'd-flex' : 'd-none') .'">
                                                  <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
                                                  <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Linkedin:</span>&nbsp;'. $row['company_linkedin'] .'</p>
                                             </div>
                                             <div class="d-flex align-items-center '. ((!empty($row['company_twitter'])) ? 'd-flex' : 'd-none') .'">
                                                  <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                                                  <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Twitter:</span>&nbsp;'. $row['company_twitter'] .'</p>
                                             </div>
                                        </div>
                                   </div>     
                              </div>
                         </div>
                    </div>';
               ?>     
          </div>
     </div>

     <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
          <div class="modal-dialog modal-xl">
               <div class="modal-content">
               <form action="../function/update-employer-job-listing.php" method="post" class="was-validated" novalidate>
                    <div class="modal-header">
                         <h5 class="modal-title">Edit <?= $job_title ?> Job Listing</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div id="employer-signup-a" class="form-section row">
                              <div class="col-12">
                                   <div>
                                        <input type="hidden" name="job_id" value="<?= $job_ID ?>" id="">
                                        <input type="hidden" name="employer_id" value="<?= $employer_id ?>" id="employer-id">
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text changeable-font-size speakable-text" style="border-radius: 5px 5px 0px 0px;" id="basic-addon1"><span class="req-indicator">*</span>Job title:</span>
                                             <input style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" type="text" class="form-control" name="job_title" aria-label="job_title" aria-describedby="basic-addon1" list="job-titles" value="<?= $job_title ?>" required>
                                             <div class="invalid-feedback">Please enter a job title.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text d-flex align-items-start" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Job description:</span>
                                             <textarea class="form-control" aria-label="job_description" name="job_description" style="height: 100px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" required><?= $job_description ?></textarea>
                                             <div class="invalid-feedback">Please enter a job description.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text" id="basic-addon1"  style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Qualifications:</span>
                                             <textarea class="form-control" aria-label="qualifications" name="qualifications" style="height: 100px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" required><?= $qualifications ?></textarea>
                                             <div class="invalid-feedback">Please enter a qualifications.</div>
                                        </div>
                                   </div>
                              </div>     

                              <div class="col-lg-6 col-12">
                                   <div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Location:</span>
                                             <input type="text" class="form-control" aria-label="location" name="location" list="locations" value="<?= $job_location ?>" required>
                                             <div class="invalid-feedback">Please enter job location.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Employment type:</span>
                                             <select class="form-control" aria-label="founded_year" id="employment_type" name="employment_type" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-describedby="basic-addon1" required> 
                                                  <option value="">Select an employment type</option>
                                                  <option value="<?= $employment_type ?>" selected><?= $employment_type ?></option>
                                                  <option value="Full-Time">Full-Time</option>
                                                  <option value="Part-Time">Part-Time</option>
                                                  <option value="Contract">Contract</option>
                                                  <option value="Temporary">Temporary</option>
                                                  <option value="Internship">Internship</option>
                                                  <option value="Freelance">Freelance</option>
                                                  <option value="Volunteer">Volunteer</option>
                                             </select>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">Compensation:</span>
                                             <span class="input-group-text">Php</span>
                                             <input type="text" class="form-control number-format" name="compensation" oninput="formatCurrency(this)" aria-label="compensation" value="<?= $compensation ?>">
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;">
                                                 Compensation Frequency:
                                             </span>
                                             <select class="form-control" aria-label="compensation_frequency" id="compensation_frequency" name="compensation_frequency" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-describedby="basic-addon1">
                                                  <option value="<?= $compensation_frequency ?>" selected><?= $compensation_frequency ?></option>
                                                  <option value="">Select Compensation Frequency</option>
                                                  <option value="Monthly">Monthly</option>
                                                  <option value="Biweekly (Fortnightly)">Biweekly (Fortnightly)</option>
                                                  <option value="Weekly">Weekly</option>
                                                  <option value="Semimonthly">Semimonthly</option>
                                                  <option value="Bimonthly (Twice a Month)">Bimonthly (Twice a Month)</option>
                                                  <option value="Annually">Annually</option>
                                                  <option value="Piece Rate">Piece Rate</option>
                                                  <option value="Commission">Commission</option>
                                                  <option value="Daily">Daily</option>
                                                  <option value="Project-Based">Project-Based</option>
                                                  <option value="Hourly">Hourly</option>
                                             </select>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1" style="width: 100%;border-radius: 5px 5px 0px 0px;">Compensation range:</span>
                                                  <span class="input-group-text">Php</span>
                                                  <input type="text" class="form-control number-format" name="start_compensation" oninput="formatCurrency(this)" aria-label="start_compensation" value="<?= $start_compensation ?>">
                                                  <span class="input-group-text">-</span>
                                                  <span class="input-group-text">Php</span>
                                                  <input type="text" class="form-control number-format" name="end_compensation" oninput="formatCurrency(this)" aria-label="end_compensation" value="<?= $end_compensation ?>">
                                             <div class="invalid-feedback">Please enter job compensation range.</div>
                                        </div>        
                                   </div>
                              </div>
                              <div class="col-lg-6 col-12">
                                   <div class="">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text d-flex align-items-start">Application deadline:</span>
                                             <input type="date" id="deadline" class="form-control" aria-label="application_deadline" name="application_deadline" onkeydown="return false" value="<?= $application_deadline ?>">
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text" id="basic-addon1"  style="border-radius: 5px 5px 0px 0px;">Benefits:</span>
                                             <textarea class="form-control" aria-label="benefits" name="benefits" style="height: 100px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;"><?= $benefits ?></textarea>
                                        </div>
                                        <div class="form-check form-switch">
                                             <input class="form-check-input" name="work_environment" type="checkbox" value="<?= $workEnvironmentRow ?>" role="switch" id="flexSwitchCheckChecked" <?= ($workEnvironmentRow === '1' ? 'checked' : 'unchecked') ?>>
                                             <label class="form-check-label" for="flexSwitchCheckChecked">Display work environment details</label>
                                        </div>
                                        <div class="input-group mb-3 d-grid <?= $workEnvironment ?>" id="work-envi-input">
                                             <span class="input-group-text" id="basic-addon1"  style="border-radius: 5px 5px 0px 0px;">Work environment:</span>
                                             <textarea class="form-control" aria-label="work_environment" id="work_environment" style="height: 100px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" disabled><?= $company_culture ?></textarea>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
               </form>
          </div>
          </div>
     </div>


     <!-- Bootstrap Modal -->
     <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          Are you sure you want to delete this job? This action cannot be undone, and all job seeker applications associated with this job will be permanently removed.
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger d-flex align-items-center" id="confirmDeleteBtn">Delete<svg class="ms-2" style="fill: white;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
          </div>
     </div>
     </div>
     </div>

     <?php include "../common/footer-inside-folder.php"; ?>
     <?php include "../common/message-session.php"; ?>
     <script>
          const checkbox = document.getElementById('flexSwitchCheckChecked');
          const workEnvi = document.getElementById('work-envi-input');

          checkbox.addEventListener('change', function() {
          if (checkbox.checked) {
               checkbox.value = 1;
               workEnvi.classList.remove('d-none');
               workEnvi.classList.add('d-block');
          } else {
               checkbox.value = 0;
               workEnvi.classList.remove('d-block');
               workEnvi.classList.add('d-none');
          }
          });
     </script>

     <script>
     $(document).ready(function() {
     $('.delete-btn').on('click', function() {
          var jobId = $(this).attr('job-id');

          // Handle confirmation when the "Delete" button in the modal is clicked
          $('#confirmDeleteBtn').on('click', function() {
          // Prepare data to send to the server
          var data = {
               jobListingId: jobId
          };

          // Send an Ajax request to delete the job
          $.ajax({
               type: 'POST',
               url: '../function/delete-job-listing.php', // Replace with your server-side script URL
               data: data,
               success: function(response) {
               window.location.href = 'manage-job-listing.php?message=You%20have%20successfully%20deleted%20job%20listing';
               console.log(response);
               },
               error: function() {
               console.error('Ajax request failed');
               }
          });
          });
     });
     });
     </script>

</body>
</html>

