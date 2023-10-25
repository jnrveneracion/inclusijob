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
     <title>InclusiJob | Create Job Listing</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/index-style.css">
     <link rel="stylesheet" href="../css/signup-style.css">
</head>
<body class="container-xxl">
     <?php include "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Employer</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt">></h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Create Job Listing</h6></a> 
          </div>
     </div>
     <div class="body d-flex justify-content-center align-items-center m-2 p-4" id="login-body">
          <div>
          <div class="form-border-section" style="border: 4px solid color(srgb 0.8822 0.3329 0.3309);">
                    <div>
                         <h5 class="login-head-txt" style="background-color: color(srgb 0.8822 0.3329 0.3309);">Create Job Listing</h5>
                    </div>
                    <div class="d-grid justify-content-center align-items-center ms-2 me-2">
                    <form action="../function/save-employer-job-listing.php" method="post" class="needs-validation" novalidate style="max-width: 800px !important;">
                         <div id="employer-signup-a" class="form-section row">
                              <div class="col-12">
                                   <div>
                                        <input type="hidden" name="employer_id" value="<?= $company_ID ?>" id="employer-id">
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text changeable-font-size speakable-text" style="border-radius: 5px 5px 0px 0px;" id="basic-addon1"><span class="req-indicator">*</span>Job title:</span>
                                             <input style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" type="text" class="form-control" name="job_title" aria-label="job_title" aria-describedby="basic-addon1" list="job-titles" required>
                                             <div class="invalid-feedback">Please enter a job title.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text d-flex align-items-start" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Job description:</span>
                                             <textarea class="form-control" aria-label="job_description" name="job_description" style="height: 100px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" required></textarea>
                                             <div class="invalid-feedback">Please enter a job description.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text" id="basic-addon1"  style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Qualifications:</span>
                                             <textarea class="form-control" aria-label="qualifications" name="qualifications" style="height: 100px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" required></textarea>
                                             <div class="invalid-feedback">Please enter a qualifications.</div>
                                        </div>
                                   </div>
                              </div>     

                              <div class="col-lg-6 col-12">
                                   <div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Location:</span>
                                             <input type="text" class="form-control" aria-label="location" name="location" list="locations" required>
                                             <div class="invalid-feedback">Please enter job location.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Employment type:</span>
                                             <select class="form-control" aria-label="founded_year" id="employment_type" name="employment_type" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-describedby="basic-addon1" required> 
                                                  <option value="">Select an employment type</option>
                                                  <option value="full_time">Full-Time</option>
                                                  <option value="part_time">Part-Time</option>
                                                  <option value="contract">Contract</option>
                                                  <option value="temporary">Temporary</option>
                                                  <option value="internship">Internship</option>
                                                  <option value="freelance">Freelance</option>
                                                  <option value="volunteer">Volunteer</option>
                                             </select>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Compensation:</span>
                                             <span class="input-group-text">Php</span>
                                             <input type="text" class="form-control number-format" name="compensation" oninput="formatCurrency(this)" aria-label="compensation" >
                                             <div class="invalid-feedback">Please enter job compensation.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1" style="width: 100%;border-radius: 5px 5px 0px 0px;">Compensation range:</span>
                                                  <span class="input-group-text">Php</span>
                                                  <input type="text" class="form-control number-format" name="start_compensation" oninput="formatCurrency(this)" aria-label="start_compensation">
                                                  <span class="input-group-text">-</span>
                                                  <span class="input-group-text">Php</span>
                                                  <input type="text" class="form-control number-format" name="end_compensation" oninput="formatCurrency(this)" aria-label="end_compensation" >
                                             <div class="invalid-feedback">Please enter job compensation range.</div>
                                        </div>        
                                   </div>
                              </div>
                              <div class="col-lg-6 col-12">
                                   <div class="">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text d-flex align-items-start">Application deadline:</span>
                                             <input type="date" id="deadline" class="form-control" aria-label="application_deadline" name="application_deadline" onkeydown="return false">
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text" id="basic-addon1"  style="border-radius: 5px 5px 0px 0px;">Benefits:</span>
                                             <textarea class="form-control" aria-label="benefits" name="benefits" style="height: 100px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;"></textarea>
                                        </div>
                                        <div class="form-check form-switch">
                                             <input class="form-check-input" name="work_environment" type="checkbox" value="1" role="switch" id="flexSwitchCheckChecked" checked>
                                             <label class="form-check-label" for="flexSwitchCheckChecked">Display work environment details</label>
                                        </div>
                                        <div class="input-group mb-3 d-grid" id="work-envi-input">
                                             <span class="input-group-text" id="basic-addon1"  style="border-radius: 5px 5px 0px 0px;">Work environment:</span>
                                             <textarea class="form-control" aria-label="work_environment" id="work_environment" style="height: 100px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;"><?= $company_culture ?></textarea>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                              <button id="prev-button" type="button" class="button m-1" onclick="window.location = 'employer-login.php'" style="color: color(srgb 0.8822 0.3329 0.3309);">Cancel</button>
                              <button id="submit-button" class="button m-1" type="submit" style="background-color: color(srgb 0.8822 0.3329 0.3309);">Post</button>
                         </div>
                    </form>

                    </div>
               </div>
          </div>
     </div>
     <?php include "../common/footer-inside-folder.php"; ?>
     <?php include "../common/message-session.php"; ?>
     <?php include "../job-seeker/data-list.php"; ?>
     <script src="../js/money-format-decimal.js"></script>
     <script src="../js/check-input.js"></script>

     <script>
          // Get references to the checkbox and work environment input elements
          const switchElement = document.querySelector('input[name="work_environment"]');
          const workEnvironmentInput = document.getElementById('work-envi-input');

          // Initially hide the work environment input if the checkbox is not checked
          if (!switchElement.checked) {
          workEnvironmentInput.classList.add('d-none');
          }

          // Add an event listener to the switch to toggle visibility
          switchElement.addEventListener('change', function () {
          if (switchElement.checked) {
               workEnvironmentInput.classList.remove('d-none');
          } else {
               workEnvironmentInput.classList.add('d-none');
          }
          });
     </script>
     <script>
          $(function() {
               var dtToday = new Date();
               var year = dtToday.getFullYear();
               var month = (dtToday.getMonth() + 1).toString().padStart(2, '0');
               var day = dtToday.getDate().toString().padStart(2, '0');
               var minDate = year + '-' + month + '-' + day;
               $('#deadline').attr('min', minDate);
          });


     </script>
</body>
</html>