<?php
     session_start();
     include "../session-check/admin-not-set.php";
     include "../function/retrieve-admin-total.php";  
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

          #search-btn:hover, #apply-btn:hover, .chart-btns:hover {
               filter: brightness(.9) !important;
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

          .w-100.btn.btn-primary.rounded-1.m-2 {
               letter-spacing: 1px;
               border: 2px solid color(srgb 0.3969 0.6045 0.945);
               background-color: transparent;
               color: color(srgb 0.1461 0.3959 0.8068);
          }

          .totals-div {
               padding: 20px;
               height: 200px;
               display: flex;
               align-items: center;
               border-radius: 7px;
               width: 227px;
               margin: 20px;
               background: linear-gradient(206deg, rgba(33, 132, 247, 0.61), rgba(1, 30, 72, 0.71)), url("../images/bg-1.jpg") center center no-repeat;
               background-size: cover;
               box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
               color: white;
          }

          #password:hover {
               cursor: pointer;
          }
     </style>
</head>
<body class="container-xxl">
     <?php include "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="ms-3 ms-lg-5 page-indicator d-flex justify-content-lg-start">
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Admin Dashboard</h6></a> 
          </div>
     </div>
     <div class="d-flex justify-content-center mt-1 w-100 row ms-0 me-0">
          <div class="col-12 col-lg-10">
               <div class="div-border row pt-3 pb-3" style="min-height: auto;">
                    <div class="col-12 row">
                         <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                              <div class="totals-div">
                                   <div class="text-center">
                                       <h1><?= $total_jobseeker ?></h1>
                                       <h6>Total Number of Job Seeker</h6> 
                                   </div>
                              </div>
                         </div>
                         <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                              <div class="totals-div">
                                   <div class="text-center">
                                        <h1><?= $total_employer ?></h1>
                                       <h6>Total Number of Employer</h6> 
                                   </div>
                              </div>
                         </div>
                         <div class="col-12 col-lg-4 d-flex justify-content-center align-items-center">
                              <div class="totals-div">
                                   <div class="text-center">
                                        <h1><?= $total_joblisting ?></h1>
                                       <h6>Total Number of Job Posting</h6> 
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center row">
                         <div class=" col-12 col-lg-4">
                              <button type="button" class="chart-btns w-100 btn btn-primary rounded-1 m-2" data-toggle="modal" data-target="#totalApplicantsModal">
                                   Total Applicants by Job Title
                              </button>
                         </div>
                         <div class=" col-12 col-lg-4">
                              <button type="button" class="chart-btns w-100 btn btn-primary rounded-1 m-2" data-toggle="modal" data-target="#applicationstatusModal">
                                   Total Job Application by Status
                              </button>
                         </div>
                         <div class=" col-12 col-lg-4">
                              <button type="button" class="chart-btns w-100 btn btn-primary rounded-1 m-2" data-toggle="modal" data-target="#trashedStatusModal">
                                   Company Listing Status
                              </button>
                         </div>
                    </div>
               </div>
               <div class="d-flex align-items-start justify-content-center">
                    <div class="div-border align-items-center justify-content-center w-100"  style="min-height: 600px;">
                         <div class="mt-2">
                              <div class="mt-2 p-0">
                                   <ul class="nav nav-tabs d-flex justify-content-center" id="applicantTabs" role="tablist">
                                        <li class="nav-item">
                                             <a class="nav-link active" id="unprocessed-tab" data-toggle="tab" href="#unprocessed" role="tab" aria-controls="unprocessed" aria-selected="false">Job Seeker Password Reset</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="shortlisted-tab" data-toggle="tab" href="#shortlisted" role="tab" aria-controls="shortlisted" aria-selected="false">Job Seeker Account Deletion</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="under-review-tab" data-toggle="tab" href="#under-review" role="tab" aria-controls="under-review" aria-selected="false">Employer Password Reset</a>
                                        </li>
                                        <li class="nav-item">
                                             <a class="nav-link" id="interview-tab" data-toggle="tab" href="#interview" role="tab" aria-controls="interview" aria-selected="false">Employer Account Deletion</a>
                                        </li>
                                   </ul>
                                   <div class="tab-content" id="applicantTabsContent">
                                        <div class="tab-pane fade active show fadeInUp" id="unprocessed" role="tabpanel" aria-labelledby="unprocessed-tab">
                                             <div class="container mt-4" style="min-width: 300px; max-width: auto; overflow: scroll;">
                                                  <table class="table table-bordered" style="font-size: 13px; text-align: center; vertical-align: middle;">
                                                       <thead>
                                                            <tr>
                                                                 <th>Request ID</th>
                                                                 <th>User Email</th>
                                                                 <th>Date Requested</th>
                                                                 <th>Action</th>
                                                                 <th>Recovery Password</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            <?php include "../function/retrieve-job-seeker-pass-reset.php" ?>
                                                       </tbody>
                                                  </table>
                                             </div>
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="under-review" role="tabpanel" aria-labelledby="under-review-tab">
                                             <div class="container mt-4" style="min-width: 300px; max-width: auto; overflow: scroll;">
                                                  <table class="table table-bordered" style="font-size: 13px; text-align: center; vertical-align: middle;">
                                                       <thead>
                                                            <tr>
                                                                 <th>Request ID</th>
                                                                 <th>User Email</th>
                                                                 <th>Date Requested</th>
                                                                 <th>Action</th>
                                                                 <th>Recovery Password</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            <?php include "../function/retrieve-employer-pass-reset.php" ?>
                                                       </tbody>
                                                  </table>
                                             </div>
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="shortlisted" role="tabpanel" aria-labelledby="shortlisted-tab">
                                             <div class="container mt-4" style="min-width: 300px; max-width: auto; overflow: scroll;">
                                                  <table class="table table-bordered" style="font-size: 13px; text-align: center; vertical-align: middle;">
                                                       <thead>
                                                            <tr>
                                                                 <th>Request ID</th>
                                                                 <th>User Email</th>
                                                                 <th>Date Requested</th>
                                                                 <th>Action</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            <?php include "../function/retrieve-job-seeker-account-del.php" ?>
                                                       </tbody>
                                                  </table>
                                             </div>
                                        </div>
                                        <div class="tab-pane fade fadeInUp" id="interview" role="tabpanel" aria-labelledby="interview-tab">
                                             <div class="container mt-4" style="min-width: 300px; max-width: auto; overflow: scroll;">
                                                  <table class="table table-bordered" style="font-size: 13px; text-align: center; vertical-align: middle;">
                                                       <thead>
                                                            <tr>
                                                                 <th>Request ID</th>
                                                                 <th>User Email</th>
                                                                 <th>Date Requested</th>
                                                                 <th>Action</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            <?php include "../function/retrieve-employer-account-del.php" ?>
                                                       </tbody>
                                                  </table>
                                             </div>
                                        </div>
                                   </div>
                              </div>   
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- Modal -->
     <div class="modal fade" id="trashedStatusModal" tabindex="-1" role="dialog" aria-labelledby="trashedStatusModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="trashedStatusModalLabel">Company Listing Status</h5>
                    </div>
                    <div class="modal-body">
                         <?php include "../charts/trashed-status-chart.php" ?>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
               </div>
          </div>
     </div>
     <!-- Modal -->
     <div class="modal fade" id="totalApplicantsModal" tabindex="-1" role="dialog" aria-labelledby="trashedStatusModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="trashedStatusModalLabel">Total Applicants by Job Title</h5>
                    </div>
                    <div class="modal-body">
                         <?php include "../charts/hiring-percentage-chart.php" ?>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
               </div>
          </div>
     </div>
     <!-- Modal -->
     <div class="modal fade" id="applicationstatusModal" tabindex="-1" role="dialog" aria-labelledby="trashedStatusModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="trashedStatusModalLabel">Total Job Application by Status</h5>
                    </div>
                    <div class="modal-body">
                         <?php include "../charts/job-applicants-chart.php" ?>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
               </div>
          </div>
     </div>


      <!-- Add Bootstrap JS and jQuery (required for tabs) -->
     <script src="../js/animate-count.js"></script>
     <?php include "../common/footer-inside-folder.php"; ?>
     <?php include "../common/message-session.php"; ?>
     <?php include "../common/remove-url-session.php"; ?>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
          $(document).ready(function() {
               // Add event listener to the "Update Password" buttons
               $('.btn-update-password').click(function() {
                    var request_password_id = $(this).data('request-password-id');
                    var jobseeker_ID = $(this).data('job-seeker-id'); // Update the attribute name here
                    var updatePassword = confirm("Are you sure you want to update the password?");

                    if (updatePassword) {
                         // Perform AJAX request to update the password
                         $.post('../function/set-recovery-password.php', { updatePassword: true, request_password_id: request_password_id, jobseeker_ID: jobseeker_ID }, function(response) {
                              alert(response); // Display the response from the server
                              location.reload(); // Reload the page after updating the password
                         });
                    }
               });
          });
     </script>
     <script>
          $(document).ready(function() {
               // Add event listener to the "Update Password" buttons
               $('.btn-update-password-employer').click(function() {
                    var request_password_id = $(this).data('request-password-id');
                    var company_ID = $(this).data('employer-id'); // Update the attribute name here
                    var updatePassword = confirm("Are you sure you want to update the password?");

                    alert(company_ID);
                    if (updatePassword) {
                         // Perform AJAX request to update the password
                         $.post('../function/set-recovery-password-employer.php', { updatePassword: true, request_password_id: request_password_id, company_ID: company_ID }, function(response) {
                              alert(response); // Display the response from the server
                              location.reload(); // Reload the page after updating the password
                         });
                    }
               });
          });
     </script>
     <script>
          $(document).ready(function() {
               // Add event listener to the "Update Password" buttons
               $('.btn-delete-company-data').click(function() {
                    var request_deletion_id = $(this).data('request-deletion-id');
                    var company_ID = $(this).data('employer-id'); // Update the attribute name here
                    var deleteUser = confirm("Are you sure you want to delete the data of this user?");

                    if (deleteUser) {
                         // Perform AJAX request to update the password
                         $.post('../function/delete-employer-data.php', { deleteUser: true, request_deletion_id: request_deletion_id, company_ID: company_ID }, function(response) {
                              alert(response); // Display the response from the server
                              location.reload(); // Reload the page after updating the password
                         });
                    }
               });
          });
     </script>
     <script>
          $(document).ready(function() {
               // Add event listener to the "Update Password" buttons
               $('.btn-delete-job-seeker-data').click(function() {
                    var request_deletion_id = $(this).data('request-deletion-id');
                    var jobseeker_ID = $(this).data('job-seeker-id'); // Update the attribute name here
                    var deleteUser = confirm("Are you sure you want to delete the data of this user?");

                    if (deleteUser) {
                         // Perform AJAX request to update the password
                         $.post('../function/delete-job-seeker-data.php', { deleteUser: true, request_deletion_id: request_deletion_id, jobseeker_ID: jobseeker_ID }, function(response) {
                              alert(response); // Display the response from the server
                              location.reload(); // Reload the page after updating the password
                         });
                    }
               });
          });
     </script>
<script>
     // Add event listeners for hover effect
     var passwordCells = document.querySelectorAll('.password-cell');
     passwordCells.forEach(function(cell) {
          cell.addEventListener('click', togglePassword);
     });

     var copyButtons = document.querySelectorAll('.btn-copy-password');
     copyButtons.forEach(function(button) {
          button.addEventListener('click', copyToClipboard);
     });
     
     var svgCopy = '<svg style="top: 31%; right: 12px;" class="position-absolute btn-copy-password" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 336H192c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16l140.1 0L400 115.9V320c0 8.8-7.2 16-16 16zM192 384H384c35.3 0 64-28.7 64-64V115.9c0-12.7-5.1-24.9-14.1-33.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1H192c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H256c35.3 0 64-28.7 64-64V416H272v32c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192c0-8.8 7.2-16 16-16H96V128H64z"/></svg>';

     function togglePassword(event) {
          var passwordCell = event.target;
          var password = passwordCell.dataset.password;
          passwordCell.textContent = passwordCell.textContent === password ? strRepeat('*', password.length) : password;
     }

     function strRepeat(str, num) {
          return new Array(num + 1).join(str);
     }

     function copyToClipboard(event) {
          var button = event.target;
          var parentElement = button.parentElement;
          console.log("Parent Element:", parentElement);

          var passwordCell = parentElement.querySelector('.password-cell');
          console.log("Password Cell:", passwordCell);

          if (passwordCell) {
               var password = passwordCell.dataset.password;

               // Create a temporary text area to copy the text
               var textArea = document.createElement("textarea");
               textArea.value = password;
               document.body.appendChild(textArea);
               textArea.select();
               document.execCommand("Copy");
               document.body.removeChild(textArea);

               // Provide feedback to the user (you can customize this part)
               alert("Password copied to clipboard!");
          } else {
               alert("Error: Password cell not found");
          }
     }


</script>


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

               // Add click event listeners to the tabs
               navTabs.forEach((tab) => {
                    tab.addEventListener("click", function (event) {
                    event.preventDefault();

                    const tabId = tab.getAttribute("href").substring(1);
                    const jobId = document.getElementById('job-id').value;

                    updateUrl(tabId+"&j="+jobId+getmessage);

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
</body>
</html>

