<?php
     session_start();
     include "../session-check/job-seeker-not-set.php";
     include "../function/retrieve-job-seeker-signup.php";
     include "../function/retrieve-job-seeker-image.php";
     include "../function/update-job-seeker-infos.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Preview Profile</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/index-style.css">
     <link rel="stylesheet" href="../css/signup-style.css">
     <style>
          .upper-section {
               background: linear-gradient(340deg, rgba(33, 132, 247, 0.61), rgba(1, 30, 72, 0.71)), url("../images/bg-1.jpg") center center no-repeat;
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
               cursor: pointer;
               width: 150px; /* Set the width and height to your desired circle size */
               height: 150px;
               
          }

          .circle-image img {
               width: auto; /* Make sure the image covers the circular frame */
               height: 100%;
               display: block;
          }

          .upload-text {
               display: none;
               position: absolute;
               top: 50%;
               left: 50%;
               transform: translate(-50%, -50%);
               font-size: 14px;
               color: #000;
          }

          .dark-overlay {
               position: absolute;
               width: 100%;
               height: 100%;
               background: rgba(0, 0, 0, 0.46);
               border-radius: 50%;
               display: none;
               justify-content: center;
               align-items: center;
               color: white;
               font-size: 23px;
          }

          .circle-image:hover .dark-overlay {
               display: flex;
          }

          .circle-image:hover .upload-text {
               display: flex;
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
               font-weight: 450;
               color: rgb(0, 0, 0);
               
          }

          .info-data {
               font-weight: 400;
               color: rgb(96, 96, 96);
               letter-spacing: 1px;
          }

          .recom-indicator {
               color: rgb(193, 193, 193);
               margin: 0px 5px;
          }

          .info-body:hover {
               box-shadow: 0 1px 3px rgba(0, 0, 0, 0.35), -1px 2px 21px rgba(0, 0, 0, 0.05);
          }
     </style>
</head>
<body class="container-xxl">
     <?php require "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Job Seeker</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Preview Profile</h6></a> 
          </div>
     </div>
     <div class="m-3 p-4 pt-0">
          <div>
               <div class="upper-section row avenir">
                    <div class="col-5 col-lg-3 d-flex justify-content-end">
                    <div class="circle-section d-flex justify-content-center align-items-center">
                         <label for="image-upload" class="circle-image">
                              <img id="profile-img" src="<?= isset($ProfileImageData) ? 'data:image/png;base64,' . $ProfileImageData : '../images/blank-profile.png' ?>" alt="Job Seeker Image">
                              <span class="upload-text dark-overlay" id="upload-button">Upload</span>
                         </label>
                         </div>
                    </div>
                    <div class="col-7 col-lg-9 d-flex align-items-center">
                         <div>
                              <div class="fs-2"><?= "$firstname $middlename $lastname" ?></div>
                              <div class="">
                                   <svg style="fill: white; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1uznlpf0 _1uvwke522 _1m9vd2q56 _1m9vd2q5e _1n6dj3h0 _1n6dj3h2 _1n6dj3h3 _1n6dj3h4" aria-hidden="true"><path d="M12 1C7.6 1 4 4.6 4 9c0 4.1 6.5 12.6 7.2 13.6.2.2.5.4.8.4s.6-.1.8-.4c.7-1 7.2-9.5 7.2-13.6 0-4.4-3.6-8-8-8zm0 19.3c-2.2-3-6-8.8-6-11.3 0-3.3 2.7-6 6-6s6 2.7 6 6c0 2.5-3.8 8.3-6 11.3z"></path><path d="M12 5c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3zm0 4c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1z"></path></svg>
                                   <?= "$jobseeker_address" ?>
                              </div>
                              <div class="">
                                   <svg style="fill: white; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1uznlpf0 _1uvwke522 _1m9vd2q56 _1m9vd2q5e _1n6dj3h0 _1n6dj3h2 _1n6dj3h3 _1n6dj3h4" aria-hidden="true"><path d="M22 6.8C21.9 5.2 20.6 4 19 4H5C3.4 4 2.1 5.2 2 6.8V17c0 1.7 1.3 3 3 3h14c1.7 0 3-1.3 3-3V6.8zM5 6h14c.4 0 .7.2.9.5L12 11.8 4.1 6.5c.2-.3.5-.5.9-.5zm14 12H5c-.6 0-1-.4-1-1V8.9l7.4 5c.2.1.4.2.6.2s.4-.1.6-.2l7.4-5V17c0 .6-.4 1-1 1z"></path></svg>
                                   <a href="mailto:<?= "$email" ?>" class="text-white"><?= "$email" ?></a>
                              </div>
                              <div>
                                   <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="please complete your details to use this feature">
                                        <button id="btn-outline-a" type="button" disabled>View Resume</button>
                                   </span>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          
          <div style="margin: 0px 4%;" class="avenir">
               <div id="personal-info-section">
                    <p class="fs-5 head-text">Personal Information</p>
                    <div class="info-body me-lg-0 me-0 ms-lg-0 ms-0 row">
                         <div class="col-12 col-md-6">
                              <p class="info-section"><span class="info-label">First name: </span><span class="info-data"><?= "$firstname" ?></span></p>
                              <p class="info-section"><span class="info-label">Middle name: </span><span class="info-data"><?= "$middlename" ?></span></p>
                              <p class="info-section"><span class="info-label">Surname: </span><span class="info-data"><?= "$lastname" ?></span></p>
                              <p class="info-section"><span class="info-label">Sex: </span><span class="info-data"><?= "$sex" ?></span></p>
                              <p class="info-section"><span class="info-label">Civil status: </span><span class="info-data"><?= "$civil_status" ?></span></p>
                         </div>
                         <div class="col-12 col-md-6">
                              <p class="info-section"><span class="info-label">Age: </span><span class="info-data"><?= "$age" ?></span></p>
                              <p class="info-section"><span class="info-label">Birthday: </span><span class="info-data"><?= "$birthday" ?></span></p>
                              <p class="info-section"><span class="info-label">Contact no.: </span><span class="info-data">+63 <?= "$contact_no" ?></span></p>
                              <p class="info-section"><span class="info-label">Email: </span><span class="info-data"><?= "$email" ?></span></p>
                              <p class="info-section"><span class="info-label">Address: </span><span class="info-data"><?= "$jobseeker_address" ?></span></p>
                              <div class="d-flex justify-content-end">
                                   <button id="btn-outline-b" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#edit-personal-info" aria-controls="offcanvasExample">Edit</button>
                              </div>
                         </div>
                    </div>
               </div>
               <div id="objectives-section">
                    <p class="fs-5 head-text mt-4">Personal Summary</p>
                    <div class="info-body me-lg-0 me-0 ms-lg-0 ms-0 row">
                         <div class="col-12">
                              <p class="info-section"><span class="info-data"><?= isset($jobseeker_objectives) ? $jobseeker_objectives : 'click edit' ?></span></p>
                              <div class="d-flex justify-content-end">
                                   <button id="btn-outline-b" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#edit-objectives" aria-controls="offcanvasExample">Edit</button>
                              </div>
                         </div>
                    </div>
               </div>
               <div id="education-section">
                    <div class="d-flex justify-content-start align-items-center">
                    <p class="fs-5 head-text mt-4">Education</p>
                         <button id="btn-solid" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#add-education" aria-controls="offcanvasExample">Add</button>
                    </div>
                    <div class="row">
                         <?php include "../function/retrieve-job-seeker-education.php" ?>
                    </div>
               </div>
               <div id="skills-section">
                    <div class="d-flex justify-content-start align-items-center">
                    <p class="fs-5 head-text mt-4">Skills</p>
                         <button id="btn-solid" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#add-skill" aria-controls="offcanvasExample">Add</button>
                    </div>
                    <div class="row">
                         <?php include "../function/retrieve-job-seeker-skill.php" ?>
                    </div>
               </div>
               <div id="career-history-section">
                    <div class="d-flex justify-content-start align-items-center">
                    <p class="fs-5 head-text mt-4">Career History</p>
                         <button id="btn-solid" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#add-career" aria-controls="offcanvasExample">Add</button>
                    </div>
                    <div class="row">
                         <?php include "../function/retrieve-job-seeker-career-history.php" ?>
                    </div>
               </div>
               <div id="login-details-section">
                    <p class="fs-5 head-text mt-4">Login</p>
                    <div class="info-body row">
                         <div class="col-12 d-flex align-items-center justify-content-between">
                              <p class="info-section mb-0"><span class="info-label">Password: </span><input disabled style="border: none; background-color: transparent;" class="info-data" type="password" value="this is just a sample"></input></p>      
                              <div class="d-flex justify-content-end">
                                   <button id="btn-outline-b" class="open-password-modal btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#edit-login" aria-controls="offcanvasExample">Edit</button>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- offcanvas forms -->
     <?php include "edit-modals.php" ?>
     <!--  -->
     
     <?php require "../common/footer-inside-folder.php"; ?>
     <?php require "../common/message-session.php"; ?>
     <?php require "data-list.php"; ?>
     <script src="../js/remove-url-session.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <!-- show update password modal -->
     <script>
          $(document).ready(function() {
               // Check if the session variable 'show_login_modal' is set to true
               <?php if (isset($_SESSION['show_login_modal']) && $_SESSION['show_login_modal'] === true) { ?>
                    setTimeout(function() {
                         $('.open-password-modal').click();
                    }, 900); // 1000 milliseconds = 1 second
               <?php } ?>
          });
          <?php unset($_SESSION['show_login_modal']); ?>
          <?php unset($_SESSION['pass_message']); ?>
     </script>

     <!-- image -->
     <script>
          document.getElementById('image-upload').addEventListener('change', function() {
               var selectedImage = document.getElementById('selected-image');
               var submitImageBtn = document.querySelector('.submit-image-btn');
               var fileInput = this;

               if (fileInput.files && fileInput.files[0]) {
               var reader = new FileReader();

               reader.onload = function(e) {
                    selectedImage.src = e.target.result;
                    selectedImage.style.display = 'block';
                    submitImageBtn.disabled = false;
               };

               reader.readAsDataURL(fileInput.files[0]);
               }
          });

          document.getElementById('upload-button').addEventListener('click', function() {
               var offcanvas = new bootstrap.Offcanvas(document.getElementById('edit-image'));
               offcanvas.show();
          });

          document.getElementById('upload-another').addEventListener('click', function() {
          // Trigger the file input by clicking on it
          document.getElementById('image-upload').click();
          });
     </script>

     <script>
          $(function(){
               var dtToday = new Date();
          
               var month = dtToday.getMonth() + 1;// jan=0; feb=1 .......
               var day = dtToday.getDate();
               var year = dtToday.getFullYear() - 18;
               if(month < 10)
                    month = '0' + month.toString();
               if(day < 10)
                    day = '0' + day.toString();
               var minDate = year + '-' + month + '-' + day;
               var maxDate = year + '-' + month + '-' + day;
               $('#birthday').attr('max', maxDate);
          });
     </script>

     <script>
          const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
          const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
     </script>

     <!-- update education modal -->
     <script>
          function openSpecificModal(button) {
          // Get the specific modal
          var specificModal = document.getElementById('edit-education');

          // Get the data attributes from the button
          var educationId = button.getAttribute('education-id');
          var institutionName = button.getAttribute('institution-name');
          var schoolDegree = button.getAttribute('school-degree');
          var fieldOfStudy = button.getAttribute('field-of-study');
          var startYear = button.getAttribute('start-year');
          var gradYear = button.getAttribute('grad-year');
          var highlights = button.getAttribute('highlights');

          // Set the values of the input fields within the modal
          specificModal.querySelector('input[name="education_id"]').value = educationId;
          specificModal.querySelector('input[name="institution_name"]').value = institutionName;
          specificModal.querySelector('input[name="school_degree"]').value = schoolDegree;
          specificModal.querySelector('input[name="field_of_study"]').value = fieldOfStudy;
          specificModal.querySelector('textarea[name="course_highlights"]').value = highlights;

          // Set the selected options for start and graduation years
          var startYearSelect = specificModal.querySelector('#start_year_select');
          var gradYearSelect = specificModal.querySelector('#graduation_year_select');

          for (var i = 0; i < startYearSelect.options.length; i++) {
               if (startYearSelect.options[i].value === startYear) {
                    startYearSelect.selectedIndex = i;
                    break;
               }
          }

          for (var i = 0; i < gradYearSelect.options.length; i++) {
               if (gradYearSelect.options[i].value === gradYear) {
                    gradYearSelect.selectedIndex = i;
                    break;
               }
          }

          // Open the specific modal
          var offcanvas = bootstrap.Offcanvas(specificModal);
               offcanvas.show();
          }
     </script>

     <!-- update career history modal -->
     <script>
          function openSpecificModalForCareerHistory(button) {
          // Get the specific modal
          var specificModal = document.getElementById('edit-career-history');

          // Get the data attributes from the button (career history)
          var careerHistoryId = button.getAttribute('career-history-id');
          var jobTitle = button.getAttribute('job-title');
          var companyName = button.getAttribute('company-name');
          var startMonth = button.getAttribute('start-month');
          var startYear = button.getAttribute('start-year');
          var endMonth = button.getAttribute('end-month');
          var endYear = button.getAttribute('end-year');
          var stillInRole = button.getAttribute('still-in-role');
          var careerHistoryDescription = button.getAttribute('career-history-description');

          if (stillInRole === "1") { // Check if the value is "1"
               var checkbox = specificModal.querySelector('input[name="still_in_role"]');
               var inputEndYear = specificModal.querySelector('select[name="end_year"]');
               checkbox.checked = true; // Check the checkbox
               inputEndYear.removeAttribute("required");
          } else if (stillInRole === "") { // Check if the value is ""
               var checkboxB = specificModal.querySelector('input[name="still_in_role"]');
               checkboxB.checked = false;
          }

          // Set the values of the input fields within the modal
          specificModal.querySelector('input[name="career_history_id"]').value = careerHistoryId;
          specificModal.querySelector('input[name="job_title"]').value = jobTitle;
          specificModal.querySelector('input[name="company_name"]').value = companyName;
          specificModal.querySelector('textarea[name="career_history_description"]').value = careerHistoryDescription;

          specificModal.querySelector('select[name="start_month"]').value = startMonth;
          specificModal.querySelector('select[name="end_month"]').value = endMonth;


          // Set the selected options for start and graduation years
          var startYearSelect = specificModal.querySelector('#start_year_select_career');
          var gradYearSelect = specificModal.querySelector('#graduation_year_select_career_update');

          for (var i = 0; i < startYearSelect.options.length; i++) {
               if (startYearSelect.options[i].value === startYear) {
                    startYearSelect.selectedIndex = i;
                    break;
               }
          }

          for (var i = 0; i < gradYearSelect.options.length; i++) {
               if (gradYearSelect.options[i].value === endYear) {
                    gradYearSelect.selectedIndex = i;
                    break;
               }
          }

          // Open the specific modal
          var offcanvas = bootstrap.Offcanvas(specificModal);
               offcanvas.show();
          }
     </script>

     <!-- automatic year selection modal-->
     <script>
          // Add an event listener to the "Start Year" select element
          document.getElementById("start_year_select").addEventListener("change", function() {
               // Get the selected start year
               var startYear = parseInt(this.value);

               // Update the "Graduation Year" select element
               var graduationYearSelect = document.getElementById("graduation_year_select");
               graduationYearSelect.innerHTML = ""; // Clear the current options

               // Add the initial "Graduation Year" option
               var option = document.createElement("option");
               option.value = "";
               option.textContent = "Graduation Year";
               graduationYearSelect.appendChild(option);

               // Generate options for the "Graduation Year" select based on the selected start year
               for (var year = startYear; year <= <?php echo date("Y"); ?>; year++) {
                    var option = document.createElement("option");
                    option.value = year;
                    option.textContent = year;
                    graduationYearSelect.appendChild(option);
               }
          });
     </script>

     <script>
          // Add an event listener to the "Start Year" select element
          document.getElementById("start_year_select_update").addEventListener("change", function() {
               // Get the selected start year
               var startYear = parseInt(this.value);

               // Update the "Graduation Year" select element
               var graduationYearSelect = document.getElementById("graduation_year_select_update");
               graduationYearSelect.innerHTML = ""; // Clear the current options

               // Add the initial "Graduation Year" option
               var option = document.createElement("option");
               option.value = "";
               option.textContent = "Graduation Year";
               graduationYearSelect.appendChild(option);

               // Generate options for the "Graduation Year" select based on the selected start year
               for (var year = startYear; year <= <?php echo date("Y"); ?>; year++) {
                    var option = document.createElement("option");
                    option.value = year;
                    option.textContent = year;
                    graduationYearSelect.appendChild(option);
               }
          });
     </script>
     
     <script>
          // Add an event listener to the "Start Year" select element
          document.getElementById("start_year_select_career").addEventListener("change", function() {
               // Get the selected start year
               var startYear = parseInt(this.value);

               // Update the "Graduation Year" select element
               var graduationYearSelect = document.getElementById("graduation_year_select_career");
               graduationYearSelect.innerHTML = ""; // Clear the current options

               // Add the initial "Graduation Year" option
               var option = document.createElement("option");
               option.value = "";
               option.textContent = "End Year";
               graduationYearSelect.appendChild(option);

               // Generate options for the "Graduation Year" select based on the selected start year
               for (var year = startYear; year <= <?php echo date("Y"); ?>; year++) {
                    var option = document.createElement("option");
                    option.value = year;
                    option.textContent = year;
                    graduationYearSelect.appendChild(option);
               }
          });
     </script>
     <!-- automatic year selection modal-->

     <!-- still in role career -->
     <script>
          // Get references to the checkbox, select, and required indicator elements
          var checkbox = document.getElementById("still_in_role_checkbox");
          var selectYear = document.getElementById("graduation_year_select_career");
          var reqIndicator = document.getElementById("ended-year");

          // Add an event listener to the checkbox
          checkbox.addEventListener("click", function () {
          if (checkbox.checked) {
               // If the checkbox is checked, remove the "required" attribute from the select element
               selectYear.removeAttribute("required");
               selectYear.setAttribute("disabled", "");
               // Hide the required indicator
               reqIndicator.style.display = "none";
               selectYear.value = "";
          } else {
               // If the checkbox is unchecked, add the "required" attribute back to the select element
               selectYear.setAttribute("required", "");
               // Show the required indicator
               reqIndicator.style.display = "inline";
               selectYear.removeAttribute("disabled");
               
          }
          });
     </script>

     <script>
          // Get references to the checkbox, select, and required indicator elements
          var checkboxUpdate = document.getElementById("still_in_role_checkbox_update");
          var selectYearUpdate = document.getElementById("graduation_year_select_career_update");
          var reqIndicatorUpdate = document.getElementById("ended-year_update");

          // Add an event listener to the checkbox
          checkboxUpdate.addEventListener("click", function () {
          if (checkboxUpdate.checked) {
               // If the checkbox is checked, remove the "required" attribute from the select element
               selectYearUpdate.removeAttribute("required");
               selectYearUpdate.setAttribute("disabled", "");
               selectYearUpdate.value = "";
               // Hide the required indicator
               reqIndicatorUpdate.style.display = "none";
          } else {
               // If the checkbox is unchecked, add the "required" attribute back to the select element
               selectYearUpdate.setAttribute("required", "");
               // Show the required indicator
               reqIndicatorUpdate.style.display = "inline";
               selectYearUpdate.removeAttribute("disabled");
          }
          });
     </script>
     <!-- still in role career -->

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

     <!-- automatic age computation -->
     <script>
          // Function to calculate age from the selected birthday
          function calculateAge() {
               var birthdayInput = document.querySelector('input[name="birthday"]');
               var ageInput = document.querySelector('input[name="age"]');

               if (birthdayInput.value) {
                    var birthdate = new Date(birthdayInput.value);
                    var today = new Date();
                    var age = today.getFullYear() - birthdate.getFullYear();

                    // Check if the birthday for this year has already occurred
                    if (today < new Date(today.getFullYear(), birthdate.getMonth(), birthdate.getDate())) {
                         age--;
                    }

                    ageInput.value = age;
               }
          }

          // Attach the calculateAge function to the "change" event of the birthday input
          var birthdayInput = document.querySelector('input[name="birthday"]');
          birthdayInput.addEventListener('change', calculateAge);
     </script>
     <!-- automatic age computation -->

</body>
</html>


