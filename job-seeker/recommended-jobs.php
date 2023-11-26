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
     <title>InclusiJob | Job Seeker Job Search</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
     <link rel="stylesheet" href="../css/index-style.css">
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

          .job-listing-item {
               color: black;
               border: 2px solid color(srgb 0.885 0.885 0.885);
               padding: 13px 15px;
               border-radius: 5px;
               box-shadow: 0 1px 3px rgba(75, 75, 75, 0.16);
               margin: 5px;
               min-height: 250px;
               max-height: 300px;
          }

          .qualifications-div {
               max-height: 86px; 
               min-height: 86px; 
               overflow-y: hidden;
          }

          .job-listing-item.active {
               border: 2px solid color(srgb 0.645 0.645 0.645) !important;
          }

          .job-listing-item:hover {
               color: black;
               border: 2px solid color(srgb 0.82 0.82 0.82) !important;
          }

          .sticky {
               position: -webkit-sticky !important; /* Safari */
               position: sticky !important;
               top: 0px !important;
               padding-top: 10px;
               margin: 0px 5px;
          }

          .listing-details {
               border: 2px solid color(srgb 0.645 0.645 0.645) !important;
               margin: 6px 0px;
               padding: 10px 18px;
               border-radius: 6px;
               min-height: 769px;
               max-height: 819px;
               overflow-y: scroll;
          }

          .btn-no-style, .select-no-style {
               background-color: transparent;
               border: none;
               font-size: 14px;
               color: gray;
          }

          .select-no-style-head {
               color: rgb(77, 75, 75);
               font-size: 14px;
               font-weight: 600;
          } 

          .btn-no-style:hover, .select-no-style:hover {
               color: black;
          }

          .select-no-style {
               -webkit-appearance: none;
               -moz-appearance: none;
               appearance: none;
          }

          .fadeInUp {
               animation: fadeInUp; /* referring directly to the animation's @keyframe declaration */
               animation-duration: 1s; /* don't forget to set a duration! */
          }

          .second-svg {
               fill: #2184f7;
          }

          .preview-profile-link {
               color: #6b6b6b;
          }

          .preview-profile-link:hover {
               color: color(srgb 0.1277 0.5183 0.9668);
               text-decoration: underline;
          }

          .bordered-reviews svg path {
               stroke: color(srgb 0.4 0.3744 0.014);
               stroke-width: 15;
          }

          .sort-by:hover {
               color: color(srgb 0.5097 0.5098 0.5098);
          }

          .sort-by {
               float: right; 
               font-size: 13px; 
               color: white !important;
               background-color: color(srgb 0.1277 0.5183 0.9668) !important;
          }
          
     </style>
     <script>
          function applyStarColor(selector) {
               const fillStarDivs = document.querySelectorAll(selector);

               fillStarDivs.forEach(fillStarDiv => {
               const stars = fillStarDiv.querySelectorAll('svg');

               stars.forEach((star, index) => {
                    // Get the rating from the count-star attribute
                    const rating = parseFloat(star.parentElement.getAttribute('count-star'));

                    if (index < Math.floor(rating)) {
                    star.style.fill = "#fff567"; // Whole star color
                    } else if (index === Math.floor(rating) && rating % 1 !== 0) {
                    const decimalPart = rating % 1;
                    const gradientColor = `rgba(255, 245, 103, ${decimalPart})`; // Gradient color based on decimal part
                    star.style.fill = gradientColor;
                    } else {
                    star.style.fill = "rgba(214, 214, 214, 0.53)"; // Inactive star color
                    }
               });
               });
          }
     </script>
</head>
<body class="container-xxl">
     <?php require "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Job Seeker</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Job Search</h6></a> 
          </div>
     </div>
     <div class="body m-2 p-4 mt-0 pt-2" id="login-body">
          <div>
               <div class="upper-section mt-1">
                    <div class="d-flex justify-content-center align-items-center row">
                         <div class="col-9 p-0 d-flex justify-content-end">
                              <div class="ms-5 input-group search-input search-grp d-flex justify-content-center justify-content-lg-end w-auto " style="min-width: 80%;">
                                   <span class="input-group-text search-input fw-bold" style="border-right: none;">Search</span>
                                   <input placeholder="Job title, keywords, location, or company" type="text" class="form-control search-input" id="search-input" aria-label="" style="border-right: none; border-left: none;">
                                   <span class="input-group-text search-input" style="border-left: none;"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#929292}</style><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></span>
                              </div>
                         </div>
                         <div class="col-3 search-btn">
                              <div class="m-1 m-lg-0 d-flex justify-content-start align-items-center">
                                   <button type="button" class="fw-bold" id="search-btn">Seek</button>
                              </div>
                         </div>
                         <div class="col-12 row d-flex justify-content-start align-items-center mt-2">
                              <div class="col-12 col-lg-1 me-5 d-flex align-items-center">
                                   <label class="select-no-style" for="filter-job-type"><span id="number-of-jobs-results"></label>
                              </div>
                              <div class="col-12 col-lg-8 ms-3 d-flex align-items-center">
                                   <div class="" style="width: 94%;">
                                        <label class="select-no-style-head " for="filter-job-type">Job type:</label>
                                        <select class="select-no-style" id="filter-job-type"> 
                                             <option value="">Select job type</option>
                                             <option value="Full-Time">Full-Time</option>
                                             <option value="Part-Time">Part-Time</option>
                                             <option value="Contract">Contract</option>
                                             <option value="Temporary">Temporary</option>
                                             <option value="Internship">Internship</option>
                                             <option value="Freelance">Freelance</option>
                                             <option value="Volunteer">Volunteer</option>
                                        </select>
                                        <label class="ms-2 select-no-style-head " for="filter-listed-date">Date posted:</label>
                                        <select class="select-no-style" id="filter-listed-date"> 
                                             <option value="Anytime">Anytime</option>
                                             <option value="0">Today</option>
                                             <option value="3">Last 3 days</option>
                                             <option value="7">Last 7 days</option>
                                             <option value="14">Last 14 days</option>
                                             <option value="30">Last 30 days</option>
                                        </select>
                                        <span onclick="window.location = 'job-search.php'" type="button" class="sort-by badge border border-secondary fw-normal"> 
                                        Sorted by Recommendation
                                        </span>
                                   </div>
                              </div>
                              <div class="col-10 col-lg-8 ms-3 d-flex align-items-center">
                         </div>
                       
                    </div>
               </div>
               <div class="lower-section" style="min-height: 500px;">
                    <div class="row d-flex flex-column-reverse flex-lg-row" id="job-list-bar">
                         <!-- First Column (List) -->
                         <div class="col-lg-4 ps-1 pe-1" style="padding-top: 10px;" id="first-column">
                              <div class="list-group fadeInUp" id="item-list" role="tablist">
                                   <?php include "../function/retrieve-job-listing-recommended.php" ?>
                              <!-- </div> -->
                         <!-- </div> -->

                         <!-- Second Column (Info) -->
                         <!-- <div class="col-lg-8 ps-1 pe-1" id="second-column"> -->
                              <!-- <div class="tab-content sticky" id="item-content"> -->
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <?php include "../function/retrieve-employer-check-total-reviews-for-job-search.php" ?>
     <?php require "../common/footer-inside-folder.php"; ?>
     <?php require "../common/message-session.php"; ?>
     <script src="../js/remove-url-session.js"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <script>
          $(document).ready(function() {
               $('#search-input').on('input', function() {
                    if ($(this).val().trim() !== '') {
                         $(this).addClass('gray-background');
                    } else {
                         $(this).removeClass('gray-background');
                    }
               });
          });
     </script>

     <script>
          $(document).ready(function() {
          // Add a click event handler to the SVG with the id "save-job"
          $('.apply-now').on('click', function() {
               // Retrieve attribute values
               var jobListingId = $(this).attr('job-listing-id');
               var jobSeekerId = $(this).attr('job-seeker-id');
               var employerId = $(this).attr('employer-id');
               
               // Prepare data to send to the server
               var data = {
                    jobListingId: jobListingId,
                    jobSeekerId: jobSeekerId,
                    employerId: employerId
               };
               
               // Send an Ajax request to save the data
               $.ajax({
                    type: 'POST',
                    url: '../function/apply-job-listing.php', // Replace with the URL to your server-side script
                    data: data,
                    success: function(response) {
                         window.location.href = 'job-application-status.php?message=You%20have%20successfully%20applied';
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

     <!-- save job -->
     <script>
          $(document).ready(function() {
          // Add a click event handler to the SVG with the id "save-job"
          $('.save-job').on('click', function() {
               // Retrieve attribute values
               var jobListingId = $(this).attr('job-listing-id');
               var jobSeekerId = $(this).attr('job-seeker-id');
               var employerId = $(this).attr('employer-id');
               
               // Prepare data to send to the server
               var data = {
                    jobListingId: jobListingId,
                    jobSeekerId: jobSeekerId,
                    employerId: employerId
               };
               
               // Send an Ajax request to save the data
               $.ajax({
                    type: 'POST',
                    url: '../function/save-job-listing.php', // Replace with the URL to your server-side script
                    data: data,
                    success: function(response) {
                         // Handle the server's response (e.g., show a success message)
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

     <!-- unsave job -->
     <script>
          $(document).ready(function() {
          // Add a click event handler to the SVG with the id "save-job"
          $('.unsave-job').on('click', function() {
               // Retrieve attribute values
               var jobListingId = $(this).attr('job-listing-id');
               var jobSeekerId = $(this).attr('job-seeker-id');
               var employerId = $(this).attr('employer-id');
               
               // Prepare data to send to the server
               var data = {
                    jobListingId: jobListingId,
                    jobSeekerId: jobSeekerId,
                    employerId: employerId
               };
               
               // Send an Ajax request to save the data
               $.ajax({
                    type: 'POST',
                    url: '../function/unsave-job-listing.php', // Replace with the URL to your server-side script
                    data: data,
                    success: function(response) {
                         // Handle the server's response (e.g., show a success message)
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

     <!-- save indicator -->
     <script>
          function toggleSave(svgNo) {
               var svgSaveNo = svgNo;
               var saveSvgs = document.querySelectorAll('#save-job-' + svgSaveNo);
               var unsaveSvgs = document.querySelectorAll('#unsave-job-' + svgSaveNo);

               saveSvgs.forEach(function (svg) {
                    svg.classList.add('d-none');
                    svg.classList.remove('d-block');
               });

               unsaveSvgs.forEach(function (svg) {
                    svg.classList.remove('d-none');
                    svg.classList.add('d-block');
               });
          }

          function toggleUnSave(svgNo) {
               var svgSaveNo = svgNo;
               var saveSvgs = document.querySelectorAll('#save-job-' + svgSaveNo);
               var unsaveSvgs = document.querySelectorAll('#unsave-job-' + svgSaveNo);

               saveSvgs.forEach(function (svg) {
                    svg.classList.remove('d-none');
                    svg.classList.add('d-block');
               });

               unsaveSvgs.forEach(function (svg) {
                    svg.classList.add('d-none');
                    svg.classList.remove('d-block');
               });
          }
     </script>

     <script>
          const selectElement = document.getElementById('filter-job-type');
          const jobListingItems = document.querySelectorAll('.job-listing-item');
          const searchInput = document.getElementById('search-input');
          const searchbtn = document.getElementById('search-btn');
          const selectElementDate = document.getElementById('filter-listed-date');
          countItemsPerColumn();
          
          selectElement.addEventListener('change', function() {
          const selectedValue = selectElement.value;
               jobListingItems.forEach(item => {
                    if (selectedValue === "" || item.textContent.toLowerCase().includes(selectedValue.toLowerCase())) {
                         item.style.display = "block";
                         item.classList.add('fadeInUp');
                    } else {
                         item.style.display = "none";
                    }
               });

               addActiveClassToFirstVisibleItem();
               countItemsPerColumn();
          });

          searchbtn.addEventListener('click', function() {
               const inputValue = searchInput.value.toLowerCase();

               jobListingItems.forEach(item => {
                    const itemText = item.textContent.toLowerCase();
                    if (inputValue === "" || itemText.includes(inputValue)) {
                         item.style.display = "block";
                         item.classList.add('fadeInUp');
                    } else {
                         item.style.display = "none";
                    }
               });
               addActiveClassToFirstVisibleItem();
               countItemsPerColumn();
          });

          // Add an event listener for the "Enter" key
          searchInput.addEventListener('keypress', function(event) {
               if (event.key === 'Enter') {
                    const inputValue = searchInput.value.toLowerCase();

                    jobListingItems.forEach(item => {
                         const itemText = item.textContent.toLowerCase();
                         if (inputValue === "" || itemText.includes(inputValue)) {
                              item.style.display = "block";
                              item.classList.add('fadeInUp');
                         } else {
                              item.style.display = "none";
                         }
                    });
                    addActiveClassToFirstVisibleItem();
                    countItemsPerColumn();
               }
          });
  
          selectElementDate.addEventListener('change', function() {
               const selectedValue = selectElementDate.value; // Remove parseInt, as values are strings
               const currentDate = new Date();

               jobListingItems.forEach(item => {
                    const itemDate = new Date(item.getAttribute('date-posted'));
                    const daysDifference = Math.ceil((currentDate - itemDate) / (1000 * 60 * 60 * 24));

                    if (selectedValue === "Anytime" || (selectedValue === "0" && daysDifference === 0) || (selectedValue === "3" && daysDifference <= 3) || (selectedValue === "7" && daysDifference <= 7) || (selectedValue === "14" && daysDifference <= 14) || (selectedValue === "30" && daysDifference <= 30)) {
                         item.style.display = "block";
                         item.classList.add('fadeInUp');
                    } else {
                         item.style.display = "none";
                    }
               });
               addActiveClassToFirstVisibleItem();
               countItemsPerColumn();
          });


          function addActiveClassToFirstVisibleItem() {
               const jobListingItems = document.querySelectorAll('.job-listing-item');
               let firstVisibleItem = null;

               for (const item of jobListingItems) {
                    if (item.style.display !== 'none') {
                         firstVisibleItem = item;
                         break;
                    }
               }

               // Remove "active" class from all items
               jobListingItems.forEach(item => {
                    item.classList.remove('active');
               });

               // Add "active" class to the first visible item
               if (firstVisibleItem) {
                    firstVisibleItem.classList.add('active');
                    const firstItemHref = firstVisibleItem.getAttribute('href');
                    const firstItemHrefWithoutHash = firstItemHref.replace('#', ''); // Remove the # sign
                    console.log('Href attribute value of the first visible item:', firstItemHrefWithoutHash);
                    addActiveClassToCorrespondingHref(firstItemHrefWithoutHash);
               }
               
          }

          function addActiveClassToCorrespondingHref(firstItemHrefWithoutHash) {
               const jobListingItems = document.querySelectorAll('.job-listing-item');
               const itemContent = document.querySelectorAll('.listing-details');

               for (let i = 0; i < jobListingItems.length; i++) {
                    if (jobListingItems[i].style.display !== 'none') {
                         itemContent[i].classList.add('active');
                         // itemContent[i].classList.remove('active');

                         // Check if the href matches the firstItemHref
                         if (itemContent[i].id === firstItemHrefWithoutHash) {
                              itemContent[i].classList.add('active');
                              itemContent[i].classList.add('show');
                         } else {
                              itemContent[i].classList.remove('active');
                              itemContent[i].classList.remove('show');
                         }
                    } else {
                         itemContent[i].classList.remove('active');
                         itemContent[i].classList.remove('show');
                    }

               }
          }
          
          function countItemsPerColumn(){
               const jobListingItems = document.querySelectorAll('.job-listing-item');
               const itemContent = document.querySelectorAll('.listing-details');
               
               let displayedJobListingItems = 0;
               let displayedItemContent = 0;
               
               for (let i = 0; i < jobListingItems.length; i++) {
                    if (jobListingItems[i].style.display !== 'none') {
                         displayedJobListingItems++;
                    }
               }
               
               for (let i = 0; i < itemContent.length; i++) {
                    if (itemContent[i].classList.contains('active')) {
                         displayedItemContent++;
                    }
               }
               
               console.log('Number of Displayed Job Listing Items:', displayedJobListingItems);
               console.log('Number of Displayed Item Content:', displayedItemContent);

               if (displayedJobListingItems === 0 || displayedJobListingItems === 1){
                    document.getElementById('number-of-jobs-results').innerText = displayedJobListingItems + " job";
               } else {
                    document.getElementById('number-of-jobs-results').innerText = displayedJobListingItems + " jobs";
               }


               const firstColumnDiv = document.getElementById('first-column');
               const secondColumnDiv = document.getElementById('second-column');

               if (displayedJobListingItems === 0){
                    firstColumnDiv.style.display = "none";
                    secondColumnDiv.style.display = "none";
               }else {
                    firstColumnDiv.style.display = "flex";
                    secondColumnDiv.style.display = "block";
               }
          }
     </script>
</body>
</html>