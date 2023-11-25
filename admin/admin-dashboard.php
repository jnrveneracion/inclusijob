<?php
     session_start();
     include "../session-check/admin-not-set.php";
     // include "../function/retrieve-employer-signup.php";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Admin Dashboard</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
               min-height: 100px;
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
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Admin Dashboard</h6></a> 
          </div>
     </div>
     <div class="d-flex justify-content-center mt-1 w-100">
          <div class="w-100">
               <div class="d-flex">
                    <div class="div-border align-items-center align-items-end w-100"  style="min-height: 600px;">
                         <div class="mt-2">
                              <div class="mt-2 p-0">
                                   <ul class="nav nav-tabs" id="applicantTabs" role="tablist">
                                        <li class="nav-item">
                                             <a class="nav-link active" id="unprocessed-tab" data-toggle="tab" href="#unprocessed" role="tab" aria-controls="unprocessed" aria-selected="false">Password Reset Request</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="under-review-tab" data-toggle="tab" href="#under-review" role="tab" aria-controls="under-review" aria-selected="false">Account Deletion Request</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="shortlisted-tab" data-toggle="tab" href="#shortlisted" role="tab" aria-controls="shortlisted" aria-selected="false">Manage Job Posting</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="interview-tab" data-toggle="tab" href="#interview" role="tab" aria-controls="interview" aria-selected="false">dfsdf</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="hired-tab" data-toggle="tab" href="#hired" role="tab" aria-controls="hired" aria-selected="false">Hired</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="not-suitable-tab" data-toggle="tab" href="#not-suitable" role="tab" aria-controls="not-suitable" aria-selected="false">Not Suitable</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="withdrawn-tab" data-toggle="tab" href="#withdrawn" role="tab" aria-controls="withdrawn" aria-selected="false">Withdrawn</a>
                                        </li>
                                   </ul>
                                   <div class="tab-content" id="applicantTabsContent">
                                        <div class="tab-pane fade active show fadeInUp" id="unprocessed" role="tabpanel" aria-labelledby="unprocessed-tab">
                                             j
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="under-review" role="tabpanel" aria-labelledby="under-review-tab">
                                             ja
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="shortlisted" role="tabpanel" aria-labelledby="shortlisted-tab">
                                             jdtofrench
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="interview" role="tabpanel" aria-labelledby="interview-tab">
                                             jad
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="hired" role="tabpanel" aria-labelledby="hired-tab">
                                             jddf
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="not-suitable" role="tabpanel" aria-labelledby="not-suitable-tab">
                                             jasa
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="withdrawn" role="tabpanel" aria-labelledby="withdrawn-tab">
                                             jsa
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
     <?php include "../common/footer-inside-folder.php"; ?>
     <?php include "../common/message-session.php"; ?>
     <?php include "../common/remove-url-session.php"; ?>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (() => {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          const forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.from(forms).forEach(form => {
          form.addEventListener('submit', event => {
               if (!form.checkValidity()) {
               event.preventDefault()
               event.stopPropagation()
               }

               form.classList.add('was-validated')
          }, false)
          })
          })()
     </script>

     <script>
          document.addEventListener("DOMContentLoaded", function () {
               const navTabs = document.querySelectorAll(".nav-link");
               const tabContents = document.querySelectorAll(".tab-pane");
               let getmessage = ''; // Declare getmessage variable in a higher scope

               // Function to update the URL with the active tab
               function updateUrl(tabId) {
                    const newUrl = window.location.href.split('?')[0] + `?tab=${tabId}${getmessage}`;
                    history.pushState({ tab: tabId }, "", newUrl);
               }
               
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

               // Handle browser back/forward navigation
               window.addEventListener("popstate", function (event) {
                    activateTabFromUrl();
               });
          });
     </script>
</body>
</html>

