<?php
     session_start();
     include "../session-check/employer-not-set.php";
     include "../function/retrieve-employer-signup.php";     
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Trashed Jobs</title>
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
               padding: 5px 15px;
               border-radius: 5px;
               color: white;
               font-weight: 600;
               margin: 0px 3px;
          }

          .btn-job-listing:hover, .add-on-nav:hover {
               filter: brightness(.9);
               color: white;
          }

          .btn-job-listing.update {
               background-color: color(srgb 0.9724 0.7522 0.272);
               border: 2px solid rgb(190, 165, 0);
          }

          .btn-job-listing.delete {
               background-color: color(srgb 0.9289 0.2195 0.1988);
               border: 2px solid rgb(170, 67, 6);
          }

          .btn-job-listing.view {
               background-color: color(srgb 0.2574 0.6857 0.9496);
               border: 2px solid rgb(10, 141, 255);
          }

          .btn-job-listing.restore {
               background-color: color(srgb 0 0.79 0.3615);
               border: 2px solid rgb(45, 175, 0);
          }

          .fadeInUp {
               animation: fadeInUp; /* referring directly to the animation's @keyframe declaration */
               animation-duration: .5s; /* don't forget to set a duration! */
          }

          .add-on-nav {
               background-color: color(srgb 0.9289 0.2195 0.1988);
               border: 2px solid rgb(170, 67, 6);
               padding: 5px 15px;
               border-radius: 7px;
          }
     </style>
</head>
<body class="container-xxl">
     <?php include "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs" style="display: flex; justify-content: space-between; align-items:start;">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Employer</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt">></h6></a> 
               <a href="manage-job-listing.php" class="no-decor-link"><h6 class="page-indicator-txt">Manage Job Listing</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt">></h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Trash</h6></a> 
          </div>
     </div>
     <div class="lower-section m-0 row d-flex justify-content-center align-items-start mt-3" style="min-height: 580px;">
          <div class="row d-flex justify-content-center">
               <?php include "../function/retrieve-trashed-job-listing-employer.php"; ?>
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
          <button type="button" class="btn btn-danger d-flex align-items-center" id="confirmDeleteBtn">Delete permanently<svg class="ms-2" style="fill: white;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
          </div>
     </div>
     </div>
     </div>

     <?php include "../common/footer-inside-folder.php"; ?>
     <?php include "../common/message-session.php"; ?>
     <script src="../js/remove-url-session.js"></script>

     <!-- restore job -->
     <script>
          $(document).ready(function() {
          // Add a click event handler to the SVG with the id "save-job"
          $('.restore-btn').on('click', function() {
               // Retrieve attribute values
               var jobListingId = $(this).attr('job-listing-id');
               
               // Prepare data to send to the server
               var data = {
                    jobListingId: jobListingId
               };
               
               // Send an Ajax request to save the data
               $.ajax({
                    type: 'POST',
                    url: '../function/restore-job-listing.php', // Replace with the URL to your server-side script
                    data: data,
                    success: function(response) {
                         window.location.href = 'manage-job-listing.php?message=You%20have%20successfully%20restore%20job%20listing';
                         console.log(response);
                    },
                    error: function() {
                         // Handle errors if the request fails
                         console.error('Ajax request failed');
                    }
               });
          });
          });
     </script>

     
     <!-- permanently delete job -->
     <script>
     $(document).ready(function() {
     $('.delete-btn').on('click', function() {
          var jobId = $(this).attr('job-listing-id');

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

