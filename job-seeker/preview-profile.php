<?php
     session_start();
     include "../session-check/job-seeker-not-set.php";
     include "../function/retrieve-job-seeker-signup.php";
     include "../function/update-job-seeker-infos.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Job Seeker Home</title>
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
               width: 150px; /* Set the width and height to your desired circle size */
               height: 150px;
               border-radius: 50%; /* Create a circular frame */
               background: url("../images/square-logo.png") center center no-repeat; /* Set the image as background */
               background-size: cover; /* Ensure the image covers the circular frame */
               border: 5px solid white;
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

          #btn-outline-b:hover {
               color: black;
               border: 2px solid black;
          }

          #btn-outline-a:hover {
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
               font-weight: 400;
               color: rgb(96, 96, 96);
          }

          .info-data {
               font-weight: 600;
               color: rgb(0, 0, 0);
               letter-spacing: 1px;
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
                         <div class="circle-section d-flex justify-content-center align-items-center"><div class="circle-image"></div></div>
                    </div>
                    <div class="col-7 col-lg-9 d-flex align-items-center">
                         <div>
                              <div class="fs-2"><?= "$firstname $middlename $lastname" ?></div>
                              <div class="">
                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1uznlpf0 _1uvwke522 _1m9vd2q56 _1m9vd2q5e _1n6dj3h0 _1n6dj3h2 _1n6dj3h3 _1n6dj3h4" aria-hidden="true"><path d="M12 1C7.6 1 4 4.6 4 9c0 4.1 6.5 12.6 7.2 13.6.2.2.5.4.8.4s.6-.1.8-.4c.7-1 7.2-9.5 7.2-13.6 0-4.4-3.6-8-8-8zm0 19.3c-2.2-3-6-8.8-6-11.3 0-3.3 2.7-6 6-6s6 2.7 6 6c0 2.5-3.8 8.3-6 11.3z"></path><path d="M12 5c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3zm0 4c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1z"></path></svg>
                                   <?= "$jobseeker_address" ?>
                              </div>
                              <div class="">
                                   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1uznlpf0 _1uvwke522 _1m9vd2q56 _1m9vd2q5e _1n6dj3h0 _1n6dj3h2 _1n6dj3h3 _1n6dj3h4" aria-hidden="true"><path d="M22 6.8C21.9 5.2 20.6 4 19 4H5C3.4 4 2.1 5.2 2 6.8V17c0 1.7 1.3 3 3 3h14c1.7 0 3-1.3 3-3V6.8zM5 6h14c.4 0 .7.2.9.5L12 11.8 4.1 6.5c.2-.3.5-.5.9-.5zm14 12H5c-.6 0-1-.4-1-1V8.9l7.4 5c.2.1.4.2.6.2s.4-.1.6-.2l7.4-5V17c0 .6-.4 1-1 1z"></path></svg>
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
               <div>
                    <p class="fs-5 head-text">Personal Information</p>
                    <div class="info-body row">
                         <div class="col-12 col-md-6">
                              <p class="info-section"><span class="info-label">First name: </span><span class="info-data"><?= "$firstname" ?></span></p>
                              <p class="info-section"><span class="info-label">Middle name: </span><span class="info-data"><?= "$middlename" ?></span></p>
                              <p class="info-section"><span class="info-label">Last name: </span><span class="info-data"><?= "$lastname" ?></span></p>
                              <p class="info-section"><span class="info-label">Sex: </span><span class="info-data"><?= "$sex" ?></span></p>
                              <p class="info-section"><span class="info-label">Civil status: </span><span class="info-data"><?= "$civil_status" ?></span></p>
                         </div>
                         <div class="col-12 col-md-6">
                              <p class="info-section"><span class="info-label">Birthday: </span><span class="info-data"><?= "$birthday" ?></span></p>
                              <p class="info-section"><span class="info-label">Contact no.: </span><span class="info-data"><?= "$contact_no" ?></span></p>
                              <p class="info-section"><span class="info-label">Address: </span><span class="info-data"><?= "$jobseeker_address" ?></span></p>
                              <div class="d-flex justify-content-end">
                                   <button id="btn-outline-b" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">Edit</button>
                              </div>
                         </div>
                    </div>
               </div>
               
          </div>
     </div>

     <!-- offcanvas forms -->

     <!-- personal Information -->
     <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
               <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit Personal Information</h5>
               <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
               <div>
                    <form action="<?php echo htmlspecialchars('../function/update-job-seeker-signup.php'); ?>"  method="post" class="was-validated" novalidate style="max-width: 800px !important;">
                         <div id="job-seeker-signup-a" class="form-section">
                              <div class="">
                                   <div>
                                        <input type="hidden" name="jobseeker_id" value="<?= "$jobseeker_ID" ?>" id="jobseeker-id">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>First name:</span>
                                             <input type="text" class="form-control" name="firstname" aria-label="firstname" aria-describedby="basic-addon1" value="<?= "$firstname" ?>" required>
                                             <div class="invalid-feedback">Please enter your first name.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">Middle name:</span>
                                             <input type="text" class="form-control" aria-label="middlename" name="middlename" value="<?= "$middlename" ?>">
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Last name:</span>
                                             <input type="text" class="form-control" aria-label="lastname" name="lastname" aria-describedby="basic-addon1" value="<?= "$lastname" ?>" required>
                                             <div class="invalid-feedback">Please enter your last name.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text w-25" id="basic-addon1"><span class="req-indicator">*</span>Sex:</span>
                                             <div class="input-group-text w-75" style="background-color: transparent;">
                                             <label class="me-2 d-flex align-items-center">
                                                  <input class="form-check-input mt-0" type="radio" name="sex" value="Male" aria-label="Male" <?= $sex === "Male" ? 'checked' : '' ?> required>
                                                  &nbsp;Male
                                             </label>
                                             <label class="ms-3 me-2 d-flex align-items-center">
                                                  <input class="form-check-input mt-0" type="radio" name="sex" value="Female" aria-label="Female" <?= $sex === "Female" ? 'checked' : '' ?> required>
                                                  &nbsp;Female
                                             </label>
                                             </div>
                                        </div>
                                        <div class="mb-3">
                                             <span class="input-group-text" id="basic-addon1">Civil Status:</span>
                                             <div class="input-group-text" style="background-color: transparent; border: none;">
                                             <label class="me-1 ms-0 d-flex align-items-center">
                                                  <input class="form-check-input mt-0" type="radio" name="civil_status" value="Single" aria-label="Single" <?= $civil_status === "Single" ? 'checked' : '' ?>>
                                                  &nbsp;Single
                                             </label>
                                             <label class="ms-1 me-1 d-flex align-items-center">
                                                  <input class="form-check-input mt-0" type="radio" name="civil_status" value="Married" aria-label="Married" <?= $civil_status === "Married" ? 'checked' : '' ?>>
                                                  &nbsp;Married
                                             </label>
                                             <label class="ms-1 me-1 d-flex align-items-center">
                                                  <input class="form-check-input mt-0" type="radio" name="civil_status" value="Widowed" aria-label="Widowed" <?= $civil_status === "Widowed" ? 'checked' : '' ?>>
                                                  &nbsp;Widowed
                                             </label>
                                             <label class="ms-1 me-1 d-flex align-items-center">
                                                  <input class="form-check-input mt-0" type="radio" name="civil_status" value="Divorced" aria-label="Divorced" <?= $civil_status === "Divorced" ? 'checked' : '' ?>>
                                                  &nbsp;Divorced
                                             </label>
                                             </div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Birthday:</span>
                                             <input type="date" class="form-control" name="birthday" aria-label="birthday" aria-describedby="basic-addon1" value="<?= "$birthday" ?>" required>
                                             <div class="invalid-feedback">Please enter your birthday.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Age:</span>
                                             <input type="number" class="form-control" name="age" aria-label="age" aria-describedby="basic-addon1" value="<?= "$age" ?>" required>
                                             <div class="invalid-feedback">Please enter your age.</div>
                                        </div>
                                   </div>
                              </div>
                              <div class="">
                                   <div class="">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Contact no.:</span>
                                             <input type="text" class="form-control" aria-label="contact_no" name="contact_no" aria-describedby="basic-addon1" value="<?= "$contact_no" ?>" required>
                                             <div class="invalid-feedback">Please enter your contact number.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text d-flex align-items-start"><span class="req-indicator">*</span>Address:</span>
                                             <textarea class="form-control" aria-label="address" name="address" style="height: 150px;" required><?= "$jobseeker_address" ?></textarea>
                                             <div class="invalid-feedback">Please enter your address.</div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                              <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                              <button id="submit-button" class="button m-1" type="submit">Update</button>
                         </div>
                    </form>

               </div>
          </div>
     </div>

     <!--  -->
     
     <?php require "../common/footer-inside-folder.php"; ?>
     <?php require "../common/message-session.php"; ?>
     <script>
          const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
          const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
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