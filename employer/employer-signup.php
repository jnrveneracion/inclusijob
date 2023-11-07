<?php
     session_start();
     include "../session-check/employer-set.php";
?>
     
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Employer Signup</title>
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
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Employer Signup</h6></a>
          </div>
     </div>
     <div class="body d-flex justify-content-center align-items-center m-3 p-4">
          <div>
               <div class="login-section">
                    <div>
                         <h5 class="login-head-txt">Employer Signup</h5>
                    </div>
                    <div class="d-grid justify-content-center align-items-center ms-2 me-2">
                    <form action="../function/save-employer-signup.php" method="post" class="needs-validation" novalidate style="max-width: 800px !important;">
                         <div id="employer-signup-a" class="form-section row">
                              <div class="col-lg-6 col-12">
                                   <div>
                                        <p class="form-head-txt">Company</p>
                                        <input type="hidden" name="employer_id" value="" id="employer-id">
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text changeable-font-size speakable-text" style="border-radius: 5px 5px 0px 0px;" id="basic-addon1"><span class="req-indicator">*</span>Company name:</span>
                                             <input style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" type="text" class="form-control" name="company_name" aria-label="company_name" aria-describedby="basic-addon1" required>
                                             <div class="invalid-feedback">Please enter your company name.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Industry or Sector:</span>
                                             <input type="text" class="form-control" aria-label="industry_sector" name="industry_sector" list="company-sector" required>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Company size:</span>
                                             <input type="text" oninput="if(this.value.length === 1 && this.value[0] === '0') this.value = ''; this.value = this.value.replace(/\D/g, '').substring(0, 10)" class="form-control" aria-label="company_size" name="company_size" aria-describedby="basic-addon1" required>
                                             <div class="invalid-feedback">Please enter your company size.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Founded year:</span>
                                             <select class="form-control" aria-label="founded_year" id="founded_year" name="founded_year" aria-describedby="basic-addon1" required>
                                                  <option value="">Select a Year</option>
                                                  <?php
                                                  $currentYear = date("Y");
                                                  for ($year = $currentYear; $year >= 1800; $year--) {
                                                       echo '<option value="' . $year . '">' . $year . '</option>';
                                                  }
                                                  ?>
                                             </select>
                                             <div class="invalid-feedback">Please enter your company founded year.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text d-flex align-items-start" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Company address:</span>
                                             <textarea class="form-control" aria-label="company_address" name="company_address" style="height: 100px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" required></textarea>
                                             <div class="invalid-feedback">Please enter your company address.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text d-flex align-items-start" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Company description:</span>
                                             <textarea style="height: 150px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" class="form-control" aria-label="company_description" name="company_description" required></textarea>
                                             <div class="invalid-feedback">Please enter your company description.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text d-flex align-items-start" style="border-radius: 5px 5px 0px 0px;">Work environment:</span>
                                             <textarea style="height: 70px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" class="form-control" aria-label="company_culture" name="company_culture"></textarea>
                                             <div class="invalid-feedback">Please enter your company work environment.</div>
                                        </div> 
                                   </div>
                              </div>
                              <div class="col-lg-6 col-12">
                                   <div class="">
                                        <p class="form-head-txt">Contact Information</p>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Contact person's name:</span>
                                             <input type="text" class="form-control" name="contact_persons_name" aria-label="contact_persons_name" aria-describedby="basic-addon1" required>
                                             <div class="invalid-feedback">Please enter contact person's name.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Contact person's position:</span>
                                             <input type="text" class="form-control" name="contact_persons_position" aria-label="contact_persons_position" aria-describedby="basic-addon1" list="contact-position" required>
                                             <div class="invalid-feedback">Please enter contact person's position.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Contact no.:</span>
                                             <span class="input-group-text">+63</span>
                                             <input type="text" class="form-control" aria-label="contact_persons_contact_no" id="contact_persons_contact_no" name="contact_persons_contact_no" aria-describedby="basic-addon1" required oninput="if(this.value.length === 1 && this.value[0] === '0') this.value = ''; this.value = this.value.replace(/\D/g, '').substring(0, 10)">
                                             <div class="invalid-feedback">Please enter contact person's number.</div>
                                        </div>
                                        <p class="form-head-txt">Links</p>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">Company website:</span>
                                             <input type="text" class="form-control" name="company_website" aria-label="company_website" aria-describedby="basic-addon1">
                                             <div class="invalid-feedback">Please enter your company website.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">Facebook:</span>
                                             <input type="text" class="form-control" name="company_facebook" aria-label="company_facebook" aria-describedby="basic-addon1">
                                             <div class="invalid-feedback">Please enter your company facebook.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">Linkedin:</span>
                                             <input type="text" class="form-control" name="company_linkedin" aria-label="company_linkedin" aria-describedby="basic-addon1">
                                             <div class="invalid-feedback">Please enter your company Linkedin.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">Twitter:</span>
                                             <input type="text" class="form-control" name="company_twitter" aria-label="company_twitter" aria-describedby="basic-addon1">
                                             <div class="invalid-feedback">Please enter your company Twitter.</div>
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
     <?php include "../job-seeker/data-list.php"; ?>
     <?php require "../common/footer-inside-folder.php"; ?>

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

     <!-- random employer ID -->
     <script>
          function generateJobSeekerID() {
               // Define possible characters for the passcode
               const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

               let EmployerID = '';
               for (let i = 0; i < 10; i++) {
                    // Get a random character from the possible characters
                    const randomIndex = Math.floor(Math.random() * characters.length);
                    const randomChar = characters.charAt(randomIndex);

                    // Append the random character to the passcode
                    EmployerID += randomChar;
               }

               return EmployerID;
          }

          // Get the passcode input element
          const EmployerIDInput = document.getElementById('employer-id');

          // Generate a random passcode and set it as the input value and attribute
          const generatedJobSeekerID = generateJobSeekerID();
          const currentYear = new Date().getFullYear();
          EmployerIDInput.value = generatedJobSeekerID;
          EmployerIDInput.setAttribute('value', generatedJobSeekerID);
     </script>

</body>
</html>

