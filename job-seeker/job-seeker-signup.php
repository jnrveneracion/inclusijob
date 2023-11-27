<?php
     session_start();
     include "../session-check/job-seeker-set.php";
?>
     
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Job Seeker Signup</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="../css/index-style.css">
     <link rel="stylesheet" href="../css/signup-style.css">
     <style>
    </style>
</head>
<body class="container-xxl">
     <?php require "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="../index.php" class="no-decor-link"><h6 class="page-indicator-txt">Home</h6></a> 
               <a href="" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Job Seeker Signup</h6></a>
          </div>
     </div>
     <div class="body d-flex justify-content-center align-items-center m-3 p-4">
          <div>
               <div class="login-section">
                    <div>
                         <h5 class="login-head-txt">Job Seeker Signup</h5>
                    </div>
                    <div class="d-grid justify-content-center align-items-center ms-2 me-2">
                    <form action="../function/save-job-seeker-signup.php" method="post" class="needs-validation" novalidate style="max-width: 800px !important;">
                         <div id="job-seeker-signup-a" class="form-section row">
                              <div class="col-lg-6 col-12">
                                   <div>
                                        <input type="hidden" name="jobseeker_id" value="" id="jobseeker-id">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>First name:</span>
                                             <input type="text" class="form-control" name="firstname" aria-label="firstname" aria-describedby="basic-addon1" required>
                                             <div class="invalid-feedback">Please enter your first name.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">Middle name:</span>
                                             <input type="text" class="form-control" aria-label="middlename" name="middlename">
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Surname:</span>
                                             <input type="text" class="form-control" aria-label="lastname" name="lastname" aria-describedby="basic-addon1" required>
                                             <div class="invalid-feedback">Please enter your last name.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text w-25" id="basic-addon1"><span class="req-indicator">*</span>Sex:</span>
                                             <div class="input-group-text w-75" style="background-color: transparent;">
                                             <label class="me-2 d-flex align-items-center">
                                                  <input class="form-check-input mt-0" type="radio" name="sex" value="Male" aria-label="Male" required>
                                                  &nbsp;Male
                                             </label>
                                             <label class="ms-3 me-2 d-flex align-items-center">
                                                  <input class="form-check-input mt-0" type="radio" name="sex" value="Female" aria-label="Female" required>
                                                  &nbsp;Female
                                             </label>
                                             </div>
                                        </div>
                                        <div class="mb-3">
                                             <span class="input-group-text" id="basic-addon1">Civil Status:</span>
                                             <div class="input-group-text" style="background-color: transparent; border: none;">
                                             <label class="me-1 ms-0 d-flex align-items-center">
                                                  <input class="form-check-input mt-0" type="radio" name="civil_status" value="Single" aria-label="Single">
                                                  &nbsp;Single
                                             </label>
                                             <label class="ms-1 me-1 d-flex align-items-center">
                                                  <input class="form-check-input mt-0" type="radio" name="civil_status" value="Married" aria-label="Married">
                                                  &nbsp;Married
                                             </label>
                                             <label class="ms-1 me-1 d-flex align-items-center">
                                                  <input class="form-check-input mt-0" type="radio" name="civil_status" value="Widowed" aria-label="Widowed">
                                                  &nbsp;Widowed
                                             </label>
                                             <label class="ms-1 me-1 d-flex align-items-center">
                                                  <input class="form-check-input mt-0" type="radio" name="civil_status" value="Divorced" aria-label="Divorced">
                                                  &nbsp;Divorced
                                             </label>
                                             </div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Birthday:</span>
                                                 
                                             <input type="date" name="birthday" id="birthday" value="" aria-label="birthday" aria-describedby="basic-addon1" required onkeydown="return false">
                                             <div class="invalid-feedback">Please enter your birthday.</div>
                                        </div>
                                        <div class="input-group mb-3 d-none">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Age:</span>
                                             <input type="number" class="form-control" name="age" aria-label="age" aria-describedby="basic-addon1" required>
                                             <div class="invalid-feedback">Please enter your age.</div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-lg-6 col-12">
                                   <div class="">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Contact no.:</span>
                                             <span class="input-group-text">+63</span>
                                             <input type="text" class="form-control" aria-label="contact_no" id="contact_no" name="contact_no" aria-describedby="basic-addon1" required oninput="if(this.value.length === 1 && this.value[0] === '0') this.value = ''; this.value = this.value.replace(/\D/g, '').substring(0, 10)" minlength="10">
                                             <div class="invalid-feedback">Please enter your contact number.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text d-flex align-items-start"><span class="req-indicator">*</span>Address:</span>
                                             <textarea class="form-control" aria-label="address" name="address" style="height: 150px;" required></textarea>
                                             <div class="invalid-feedback">Please enter your address.</div>
                                        </div>
                                   </div>
                                   <p class="form-head-txt">Login details</p>
                                   <div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Email:</span>
                                             <input type="email" class="form-control" aria-label="email" name="email" aria-describedby="basic-addon1" required>
                                             <div class="invalid-feedback">Please enter a valid email address.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Password:</span>
                                             <input type="password" class="form-control" aria-label="password" name="password" aria-describedby="basic-addon1" required>
                                             <div class="invalid-feedback">Please enter a password.</div>
                                        </div>
                                   </div>
                                   <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
                                        <label class="form-check-label" for="invalidCheck3">
                                        I hereby confirm that I read and agree with the <a href="../privacy-policy-and-terms.php" class="text-underline">Privacy Policy and Terms</a>.
                                        </label>
                                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                                        You must agree before submitting.
                                        </div>
                                   </div>

                              </div>
                         </div>
                         <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                              <button id="prev-button" type="button" class="button m-1" onclick="window.location = 'job-seeker-login.php'">Cancel</button>
                              <button id="submit-button" class="button m-1" type="submit">Sign up</button>
                         </div>
                    </form>

                    </div>
               </div>
          </div>
     </div>
     <?php require "../common/footer-inside-folder.php"; ?>
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

     <!-- random jobseeker ID -->
     <script>
          function generateJobSeekerID() {
               // Define possible characters for the passcode
               const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

               let JobSeekerID = '';
               for (let i = 0; i < 10; i++) {
                    // Get a random character from the possible characters
                    const randomIndex = Math.floor(Math.random() * characters.length);
                    const randomChar = characters.charAt(randomIndex);

                    // Append the random character to the passcode
                    JobSeekerID += randomChar;
               }

               return JobSeekerID;
          }

          // Get the passcode input element
          const JobSeekerIDInput = document.getElementById('jobseeker-id');

          // Generate a random passcode and set it as the input value and attribute
          const generatedJobSeekerID = generateJobSeekerID();
          JobSeekerIDInput.value = generatedJobSeekerID;
          const currentYear = new Date().getFullYear();
          JobSeekerIDInput.setAttribute('value', generatedJobSeekerID);
     </script>

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

</body>
</html>

