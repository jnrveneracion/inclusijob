<?php
     session_start();
     include "../session-check/employer-not-set.php";
     include "../function/retrieve-employer-signup.php";  
     include "../function/retrieve-job-status-total.php";  
     include "../function/retrieve-job-listing-review-application.php";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | <?= $job_title ?> - Job Application Review</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
     <link rel="stylesheet" href="../css/index-style.css">
     <link rel="stylesheet" href="../css/signup-style.css">
     <style>
          .fadeInUp {
               animation: fadeInUp; /* referring directly to the animation's @keyframe declaration */
               animation-duration: 1s; /* don't forget to set a duration! */
          }

          a:hover {
               text-decoration: none;
          }

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
               text-decoration: none;
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

          .btn-job-listing.view-jobseeker {
               background-color: color(srgb 0.58 0.58 0.58);
               border: 2px solid rgb(89, 89, 89);
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

          .status-text {
               color: gray;
               font-size: 13px;
          }

          .status-div {
               margin: 30px 0px;
          }

          .div-border{
               box-shadow: 0 1px 3px rgba(75, 75, 75, 0.16);
               border: 2px solid color(srgb 0.82 0.82 0.82);
               padding: 10px 25px;
               border-radius: 10px;
               margin: 10px 0px;
               min-height: 500px;
          }

          .candidate-section {
               margin: 10px 0px;
               padding: 10px 21px;
               border: 2px solid color(srgb 0.895 0.895 0.895);
               border-radius: 10px;
          }

          .head-txt {
               font-weight: 500;
               letter-spacing: .5px;
               color: rgb(68, 68, 68);
               font-size: 15px;
          }

          .sub-txt {
               font-weight: 400;
               font-size: 13px;
               color: gray;
          }

          
     </style>
</head>
<body class="container-xxl">
     <?php include "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Employer</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt">></h6></a> 
               <a href="manage-job-listing.php" class="no-decor-link"><h6 class="page-indicator-txt">Manage Job Listing</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt">></h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active"><?= $job_title ?> Job Application Review</h6></a> 
          </div>
     </div>
     <div class="d-flex justify-content-center mt-1">
          <div class="">
               <div class="row d-flex justify-content-center">
                    <div class="div-border col-11 col-lg-12 align-items-center align-items-end"  style="min-height: 600px;">
                         <div class="ms-1 me-1 mt-2 mb-3 head-section row d-flex justify-content-between align-items-end">
                              <div class="col-2 col-xl-1 mb-lg-0 mb-3 p-0 d-flex align-items-center justify-content-center">
                                   <div class="ms-2 d-flex">
                                        <div>
                                             <h1 class="animate-count mb-0 text-center"><?= $row['application_count'] ?></h1>
                                             <p class="ms-0 mb-0 text-center" style="font-size: 16px;"><span class="fw-bold" style="font-size: 15px;">Applicant<?= ($row['application_count'] === 1 ? "" : "s")?></span></p>
                                        </div>
                                   </div>
                              </div>
                              <div class="row col-10 col-xl-11 mb-lg-0 mb-3 p-0 ps-2" style="border-left: 2px solid rgb(196, 196, 196); display: flex; justify-content: space-between;">
                                   <div class="col-12 d-flex align-items-center">
                                        <div>
                                             <h1 class="m-0"><?= $row['job_title'] ?></h1>
                                             <span class="fw-bold">Date posted: </span><span class="fs-6 m-0 fw-light"><?= $row['joblisting_date_added_word'] ?></span>
                                        </div>
                                   </div>
                                   <div class="col-4 d-flex justify-content-end align-items-center">
                                        <a href="view-job-listing-details.php?j=<?= $row['job_id'] ?>" target="_blank" class="d-none me-3 btn-job-listing view">Manage Job<svg class="ms-2" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" style="fill:#ffffff"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z"/></svg></a>
                                   </div>
                              </div>
                              
                         </div>
                         <div class="mt-2">
                              <div class="mt-2 p-0">
                                   <ul class="nav nav-tabs" id="applicantTabs" role="tablist">
                                        <li class="nav-item">
                                             <a class="nav-link active" id="unprocessed-tab" data-toggle="tab" href="#unprocessed" role="tab" aria-controls="unprocessed" aria-selected="false">Unprocessed (<?php echo $applied_status_count ?>)</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="under-review-tab" data-toggle="tab" href="#under-review" role="tab" aria-controls="under-review" aria-selected="false">Under Review (<?php echo $under_review_status_count ?>)</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="shortlisted-tab" data-toggle="tab" href="#shortlisted" role="tab" aria-controls="shortlisted" aria-selected="false">Shortlisted (<?php echo $shortlisted_status_count ?>)</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="interview-tab" data-toggle="tab" href="#interview" role="tab" aria-controls="interview" aria-selected="false">Interview (<?php echo $interview_status_count ?>)</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="hired-tab" data-toggle="tab" href="#hired" role="tab" aria-controls="hired" aria-selected="false">Hired (<?php echo $hired_status_count ?>)</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="not-suitable-tab" data-toggle="tab" href="#not-suitable" role="tab" aria-controls="not-suitable" aria-selected="false">Not Suitable (<?php echo $rejected_status_count ?>)</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="withdrawn-tab" data-toggle="tab" href="#withdrawn" role="tab" aria-controls="withdrawn" aria-selected="false">Withdrawn (<?php echo $withdraw_status_count ?>)</a>
                                        </li>
                                   </ul>
                                   <div class="tab-content" id="applicantTabsContent">
                                        <div class="tab-pane fade active show fadeInUp" id="unprocessed" role="tabpanel" aria-labelledby="unprocessed-tab">
                                             <?php include "../function/retrieve-job-status-unprocessed.php"; ?>
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="under-review" role="tabpanel" aria-labelledby="under-review-tab">
                                             <div class="d-flex justify-content-between align-items-center bg-light candidate-section">
                                                  <div>
                                                       <h4 class="mb-0">Janrie veneracion</h4>
                                                       <div>
                                                            <span class="head-txt">Most recent job</span>
                                                            <span class="sub-txt">4 years</span>
                                                       </div>
                                                       <div>
                                                            <span class="head-txt">Most recent Education</span>
                                                            <span class="sub-txt">Field of study</span>
                                                       </div>
                                                  </div>
                                                  <div class="d-flex justify-content-end align-items-center">
                                                       <div class="btn-group">
                                                            <button type="button" class="btn-job-listing view d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Move to <svg style="fill: white;" class="ms-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                 <li><a class="dropdown-item" href="#">Shortlisted</a></li>
                                                                 <li><a class="dropdown-item" href="#">Interview</a></li>
                                                                 <li><a class="dropdown-item" href="#">Not Suitable</a></li>
                                                            </ul>
                                                       </div>
                                                       <a href="" class="btn-job-listing view-jobseeker d-flex align-items-center">View Profile<svg class="ms-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" style="fill:#ffffff"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z"/></svg></a>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="shortlisted" role="tabpanel" aria-labelledby="shortlisted-tab">
                                             <div class="d-flex justify-content-between align-items-center bg-light candidate-section">
                                                  <div>
                                                       <h4 class="mb-0">Janrie veneracion</h4>
                                                       <div>
                                                            <span class="head-txt">Most recent job</span>
                                                            <span class="sub-txt">4 years</span>
                                                       </div>
                                                       <div>
                                                            <span class="head-txt">Most recent Education</span>
                                                            <span class="sub-txt">Field of study</span>
                                                       </div>
                                                  </div>
                                                  <div class="d-flex justify-content-end align-items-center">
                                                       <div class="btn-group">
                                                            <button type="button" class="btn-job-listing view d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Move to <svg style="fill: white;" class="ms-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                 <li><a class="dropdown-item" href="#">Interview</a></li>
                                                                 <li><a class="dropdown-item" href="#">Hired</a></li>
                                                            </ul>
                                                       </div>
                                                       <a href="" class="btn-job-listing view-jobseeker d-flex align-items-center">View Profile<svg class="ms-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" style="fill:#ffffff"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z"/></svg></a>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="interview" role="tabpanel" aria-labelledby="interview-tab">
                                             <div class="d-flex justify-content-between align-items-center bg-light candidate-section">
                                                  <div>
                                                       <h4 class="mb-0">Janrie veneracion</h4>
                                                       <div>
                                                            <span class="head-txt">Most recent job</span>
                                                            <span class="sub-txt">4 years</span>
                                                       </div>
                                                       <div>
                                                            <span class="head-txt">Most recent Education</span>
                                                            <span class="sub-txt">Field of study</span>
                                                       </div>
                                                  </div>
                                                  <div class="d-flex justify-content-end align-items-center">
                                                       <button type="button" class="btn-job-listing view d-flex align-items-center">
                                                       Move to Hired
                                                       </button>
                                                       <a href="" class="btn-job-listing view-jobseeker d-flex align-items-center">View Profile<svg class="ms-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" style="fill:#ffffff"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z"/></svg></a>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="hired" role="tabpanel" aria-labelledby="hired-tab">
                                             <div class="d-flex justify-content-between align-items-center bg-light candidate-section">
                                                  <div>
                                                       <h4 class="mb-0">Janrie veneracion</h4>
                                                       <div>
                                                            <span class="head-txt">Most recent job</span>
                                                            <span class="sub-txt">4 years</span>
                                                       </div>
                                                       <div>
                                                            <span class="head-txt">Most recent Education</span>
                                                            <span class="sub-txt">Field of study</span>
                                                       </div>
                                                  </div>
                                                  <div class="d-flex justify-content-end align-items-center">
                                                       <a href="" class="btn-job-listing view-jobseeker d-flex align-items-center">View Profile<svg class="ms-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" style="fill:#ffffff"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z"/></svg></a>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="not-suitable" role="tabpanel" aria-labelledby="not-suitable-tab">
                                             <div class="d-flex justify-content-between align-items-center bg-light candidate-section">
                                                  <div>
                                                       <h4 class="mb-0">Janrie veneracion</h4>
                                                       <div>
                                                            <span class="head-txt">Most recent job</span>
                                                            <span class="sub-txt">4 years</span>
                                                       </div>
                                                       <div>
                                                            <span class="head-txt">Most recent Education</span>
                                                            <span class="sub-txt">Field of study</span>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="withdrawn" role="tabpanel" aria-labelledby="withdrawn-tab">
                                             <div class="d-flex justify-content-between align-items-center bg-light candidate-section">
                                                  <div>
                                                       <h4 class="mb-0">Janrie veneracion</h4>
                                                       <div>
                                                            <span class="head-txt">Most recent job</span>
                                                            <span class="sub-txt">4 years</span>
                                                       </div>
                                                       <div>
                                                            <span class="head-txt">Most recent Education</span>
                                                            <span class="sub-txt">Field of study</span>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>   
                         </div>
                    </div>
               </div>
          </div>
     </div>

      <!-- Add Bootstrap JS and jQuery (required for tabs) -->
     <script src="../js/animate-count.js"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <?php include "../common/footer-inside-folder.php"; ?>
     <?php include "../common/message-session.php"; ?>

     <script>
          document.addEventListener("DOMContentLoaded", function () {
          const navTabs = document.querySelectorAll(".nav-link");
          const tabContents = document.querySelectorAll(".tab-pane");

          // Function to activate the correct tab based on the URL parameter
          function activateTabFromUrl() {
               const urlParams = new URLSearchParams(window.location.search);
               const tabParam = urlParams.get("tab");

               if (tabParam) {
               // Remove the "active" class from all tabs and content
               navTabs.forEach((tab) => {
                    tab.classList.remove("active");
               });
               tabContents.forEach((content) => {
                    content.classList.remove("show", "active");
               });

               // Activate the tab specified in the URL
               const activeTab = document.getElementById(tabParam + '-tab');
               const activeContent = document.getElementById(tabParam);
               
               if (activeTab && activeContent) {
                    activeTab.classList.add("active");
                    activeContent.classList.add("show", "active");
               }
               }
          }

          // Initial activation from URL
          activateTabFromUrl();

          // Add click event listeners to the tabs
          navTabs.forEach((tab) => {
               tab.addEventListener("click", function (event) {
               event.preventDefault();

               const tabId = tab.getAttribute("href").substring(1);

               // Activate the clicked tab and deactivate others
               navTabs.forEach((t) => {
                    t.classList.remove("active");
               });
               tabContents.forEach((content) => {
                    content.classList.remove("show", "active");
               });

               tab.classList.add("active");
               const content = document.getElementById(tabId);
               if (content) {
                    content.classList.add("show", "active");
               }
               });
          });

          // Handle browser back/forward navigation
          window.addEventListener("popstate", function (event) {
               activateTabFromUrl();
          });
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
               url: '../function/trash-job-listing.php', // Replace with your server-side script URL
               data: data,
               success: function(response) {
               window.location.href = 'manage-job-listing.php?message=You%20have%20successfully%20trashed%20job%20listing';
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
