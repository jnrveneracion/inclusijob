<?php
     session_start();
     include "../session-check/employer-not-set.php";
     include "../function/retrieve-employer-signup.php";   
     include "../function/retrieve-employer-image.php";  
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
               background: linear-gradient(340deg, rgba(247, 33, 33, 0.61), rgba(103, 0, 0, 0.73)), url("../images/bg-1.jpg") center center no-repeat;
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
     <?php include "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Employer</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt">></h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Preview Profile</h6></a> 
          </div>
     </div>
     <div class="m-3 p-4 pt-0">
          <div>
               <div class="upper-section row avenir">
                    <div class="col-5 col-lg-3 d-flex justify-content-end">
                         <div class="circle-section d-flex justify-content-center align-items-center">
                              <label for="image-upload" class="circle-image">
                                   <img id="profile-img" src="<?= isset($ProfileImageData) ? 'data:image/png;base64,' . $ProfileImageData : '../images/blank-company-profile.png' ?>" alt="Employer profile image">
                                   <span class="upload-text dark-overlay" id="upload-button">Upload</span>
                              </label>
                         </div>
                    </div>
                    <div class="col-7 col-lg-9 d-flex align-items-center">
                         <div>
                              <div class="fs-2"><?= "$company_name" ?></div>
                              <div class="">
                                   <svg style="fill: white; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1uznlpf0 _1uvwke522 _1m9vd2q56 _1m9vd2q5e _1n6dj3h0 _1n6dj3h2 _1n6dj3h3 _1n6dj3h4" aria-hidden="true"><path d="M12 1C7.6 1 4 4.6 4 9c0 4.1 6.5 12.6 7.2 13.6.2.2.5.4.8.4s.6-.1.8-.4c.7-1 7.2-9.5 7.2-13.6 0-4.4-3.6-8-8-8zm0 19.3c-2.2-3-6-8.8-6-11.3 0-3.3 2.7-6 6-6s6 2.7 6 6c0 2.5-3.8 8.3-6 11.3z"></path><path d="M12 5c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3zm0 4c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1z"></path></svg>
                                   <?= "$company_address" ?>
                              </div>
                              <div class="">
                                   <svg style="fill: white; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1uznlpf0 _1uvwke522 _1m9vd2q56 _1m9vd2q5e _1n6dj3h0 _1n6dj3h2 _1n6dj3h3 _1n6dj3h4" aria-hidden="true"><path d="M22 6.8C21.9 5.2 20.6 4 19 4H5C3.4 4 2.1 5.2 2 6.8V17c0 1.7 1.3 3 3 3h14c1.7 0 3-1.3 3-3V6.8zM5 6h14c.4 0 .7.2.9.5L12 11.8 4.1 6.5c.2-.3.5-.5.9-.5zm14 12H5c-.6 0-1-.4-1-1V8.9l7.4 5c.2.1.4.2.6.2s.4-.1.6-.2l7.4-5V17c0 .6-.4 1-1 1z"></path></svg>
                                   <a href="mailto:<?= "$email" ?>" class="text-white"><?= "$email" ?></a>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          
          <div style="margin: 0px 4%;" class="avenir" id="profile-section">
               <div id="personal-info-section">
                    <p class="fs-5 head-text">Company Information</p>
                    <div class="info-body row">
                         <div class="col-12 col-md-6">
                              <p class="info-section"><span class="info-label">Company name: </span><span class="info-data"><?= "$company_name" ?></span></p>
                              <p class="info-section"><span class="info-label">Industry/Sector: </span><span class="info-data"><?= "$industry_sector" ?></span></p>
                              <p class="info-section"><span class="info-label">Company size: </span><span class="info-data"><?= "$company_size" ?></span></p>
                              <p class="info-section"><span class="info-label">Founded year: </span><span class="info-data"><?= "$founded_year" ?></span></p>
                              <p class="info-section"><span class="info-label">Address: </span><span class="info-data"><?= "$company_address" ?></span></p>
                         </div>
                         <div class="col-12 col-md-6">
                              <p class="info-section"><span class="info-label">Contact person: </span><span class="info-data"><?= "$contact_persons_name" ?></span></p>
                              <p class="info-section"><span class="info-label">Contact person's position: </span><span class="info-data"><?= "$contact_persons_position" ?></span></p>
                              <p class="info-section"><span class="info-label">Contact no.: </span><span class="info-data">+63 <?= "$contact_persons_contact_no" ?></span></p>
                              <p class="info-section"><span class="info-label">Email: </span><span class="info-data"><?= "$email" ?></span></p>
                         </div>
                         <div class="col-12">
                              <p class="info-section"><span class="info-label">Description: </span><br><span class="info-data"><?= "$company_description" ?></span></p>
                         </div>
                         <div class="col-12">
                              <p class="info-section"><span class="info-label">Work environment: </span><br><span class="info-data"><?= "$company_culture" ?></span></p>
                         </div>
                         <div class="col-12">
                              <p class="info-section mb-0"><span class="info-label">Links: </span></p>
                              <div class="row">
                                   <div class="col-lg-3 col-12 d-flex align-items-center">
                                        <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
                                        <p class="ms-2 mb-1 mt-1 info-section"><span class="info-label">Website: </span><?php echo ((!empty($company_website)) ? $company_website : ' -') ?></p>
                                   </div>
                                   <div class="col-lg-3 col-12 d-flex align-items-center">
                                        <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg>
                                        <p class="ms-2 mb-1 mt-1 info-section"><span class="info-label">Facebook: </span><?php echo ((!empty($company_facebook)) ? $company_facebook : ' -') ?></p>
                                   </div>
                                   <div class="col-lg-3 col-12 d-flex align-items-center">
                                        <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
                                        <p class="ms-2 mb-1 mt-1 info-section"><span class="info-label">Linkedin: </span><?php echo ((!empty($company_linkedin)) ? $company_linkedin : ' -') ?></p>
                                   </div>
                                   <div class="col-lg-3 col-12 d-flex align-items-center">
                                        <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                                        <p class="ms-2 mb-1 mt-1 info-section"><span class="info-label">Twitter: </span><?php echo ((!empty($company_twitter)) ? $company_twitter : ' -') ?></p>
                                   </div>
                              </div>
                              <div class="d-flex justify-content-end">
                                   <button id="btn-outline-b" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#edit-company-info" aria-controls="offcanvasExample">Edit</button>
                              </div>
                         </div>
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

     <!-- company Information -->
     <div class="offcanvas offcanvas-end w-auto" data-bs-scroll="true" tabindex="-1" id="edit-company-info" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
               <h5 class="offcanvas-title" id="offcanvasExampleLabel">Edit Company Information</h5>
               <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
               <div>
                    <form action="<?php echo htmlspecialchars('../function/update-company-signup.php'); ?>"  method="post" class="was-validated" novalidate >
                         <div id="job-seeker-signup-a" class="form-section">
                              <div class="">
                                   <div>
                                        <input type="hidden" name="company_id" value="<?= "$company_ID" ?>" id="company-id">
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text changeable-font-size speakable-text" style="border-radius: 5px 5px 0px 0px;" id="basic-addon1"><span class="req-indicator">*</span>Company name:</span>
                                             <input style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" type="text" class="form-control" name="company_name" aria-label="company_name" aria-describedby="basic-addon1" value="<?= "$company_name" ?>" required>
                                             <div class="invalid-feedback">Please enter your company name.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Industry or Sector:</span>
                                             <input type="text" class="form-control" aria-label="industry_sector" name="industry_sector" list="company-sector" value="<?= "$industry_sector" ?>" required>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Company size:</span>
                                             <input type="text" oninput="if(this.value.length === 1 && this.value[0] === '0') this.value = ''; this.value = this.value.replace(/\D/g, '').substring(0, 10)" class="form-control" aria-label="company_size" name="company_size" aria-describedby="basic-addon1" value="<?= "$company_size" ?>" required>
                                             <div class="invalid-feedback">Please enter your company size.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Founded year:</span>
                                             <select class="form-control" aria-label="founded_year" id="founded_year" name="founded_year" aria-describedby="basic-addon1" required>
                                                  <option value="">Select a Year</option>
                                                  <?php
                                                  $currentYear = date("Y");
                                                  echo '<option value="' . $founded_year . '" selected>' . $founded_year . '</option>';
                                                  for ($year = $currentYear; $year >= 1800; $year--) {
                                                       echo '<option value="' . $year . '">' . $year . '</option>';
                                                  }
                                                  ?>
                                             </select>
                                             <div class="invalid-feedback">Please enter your company founded year.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text d-flex align-items-start" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Company address:</span>
                                             <textarea class="form-control" aria-label="company_address" name="company_address" style="height: 70px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" required><?= "$company_address" ?></textarea>
                                             <div class="invalid-feedback">Please enter your company address.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text d-flex align-items-start" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Company description:</span>
                                             <textarea style="height: 150px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" class="form-control" aria-label="company_description" name="company_description" required><?= "$company_description" ?></textarea>
                                             <div class="invalid-feedback">Please enter your company description.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text d-flex align-items-start" style="border-radius: 5px 5px 0px 0px;">Work environment:</span>
                                             <textarea style="height: 100px; width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" class="form-control" aria-label="company_culture" name="company_culture"><?= "$company_culture" ?></textarea>
                                             <div class="invalid-feedback">Please enter your company work environment.</div>
                                        </div>
                                   </div>
                              </div>
                              <div class="">
                                   <div class="">
                                        <p class="form-head-txt">Contact Information</p>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Contact person's name:</span>
                                             <input type="text" class="form-control" name="contact_persons_name" aria-label="contact_persons_name" aria-describedby="basic-addon1" value="<?= "$contact_persons_name" ?>" required>
                                             <div class="invalid-feedback">Please enter contact person's name.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Contact person's position:</span>
                                             <input type="text" class="form-control" name="contact_persons_position" aria-label="contact_persons_position" aria-describedby="basic-addon1" list="contact-position" value="<?= "$contact_persons_position" ?>" required>
                                             <div class="invalid-feedback">Please enter contact person's position.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Contact no.:</span>
                                             <span class="input-group-text">+63</span>
                                             <input type="text" class="form-control" aria-label="contact_persons_contact_no" id="contact_persons_contact_no" name="contact_persons_contact_no" aria-describedby="basic-addon1" value="<?= "$contact_persons_contact_no" ?>" required oninput="if(this.value.length === 1 && this.value[0] === '0') this.value = ''; this.value = this.value.replace(/\D/g, '').substring(0, 10)">
                                             <div class="invalid-feedback">Please enter contact person's number.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><span class="req-indicator">*</span>Email:</span>
                                             <input type="text" class="form-control" aria-label="contact_persons_contact_no" id="contact_persons_contact_no" name="email" aria-describedby="basic-addon1" value="<?= "$email" ?>">
                                             <div class="invalid-feedback">Please enter company email.</div>
                                        </div>
                                        <p class="form-head-txt">Links</p>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">Company website:</span>
                                             <input type="text" class="form-control" name="company_website" aria-label="company_website" aria-describedby="basic-addon1" value="<?= "$company_website" ?>">
                                             <div class="invalid-feedback">Please enter your company website.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">Facebook:</span>
                                             <input type="text" class="form-control" name="company_facebook" aria-label="company_facebook" aria-describedby="basic-addon1" value="<?= "$company_facebook" ?>">
                                             <div class="invalid-feedback">Please enter your company facebook.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">Linkedin:</span>
                                             <input type="text" class="form-control" name="company_linkedin" aria-label="company_linkedin" aria-describedby="basic-addon1" value="<?= "$company_linkedin" ?>">
                                             <div class="invalid-feedback">Please enter your company Linkedin.</div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">Twitter:</span>
                                             <input type="text" class="form-control" name="company_twitter" aria-label="company_twitter" aria-describedby="basic-addon1" value="<?= "$company_twitter" ?>">
                                             <div class="invalid-feedback">Please enter your company Twitter.</div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                              <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                              <button id="submit-button" class="button m-1" type="submit">Submit</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>

     <!-- update login -->
     <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="edit-login" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
               <h5 class="offcanvas-title" id="offcanvasExampleLabel">Update Password</h5>
               <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body pt-0">
               <div>
                    <form action="<?php echo htmlspecialchars('../function/change-password-company.php'); ?>"  method="post" class="needs-validation" novalidate style="max-width: 800px !important;">
                         <div id="job-seeker-signup-a" class="form-section">
                              <div class="">
                                   <div>
                                        <?php if (isset($_SESSION['show_login_modal']) && $_SESSION['show_login_modal'] === true) { ?>
                                             <p class="alert alert-danger" role="alert" style="font-size: 13px;"><?= $_SESSION['pass_message'] ?></p>
                                        <?php } ?>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Old Password:</span>
                                             <input type="password" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="company-name" name="old_password" id="old_password" required> 
                                             <div class="invalid-feedback">Please enter your old password.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>New Password:</span>
                                             <input type="password" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="company-name" name="new_password" id="new_password" required>
                                             <div class="invalid-feedback">Please enter your new password.</div>
                                        </div>
                                        <div class="input-group mb-3 d-grid">
                                             <span class="input-group-text" id="basic-addon1" style="border-radius: 5px 5px 0px 0px;"><span class="req-indicator">*</span>Confirm New Password:</span>
                                             <input type="password" class="form-control" style="width: 100%; border-radius: 0px 0px 5px 5px; margin: 0px;" aria-label="company-name" name="confirm_password" id="confirm_password" required>
                                             <div class="invalid-feedback">Please confirm your new password.</div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                              <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                              <button id="submit-button" class="button m-1" type="submit">Submit</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>

     <!-- image -->
     <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="edit-image" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
               <h5 class="offcanvas-title" id="offcanvasExampleLabel">Upload Image</h5>
               <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
               <div>
                    <form action="<?php echo htmlspecialchars('../function/save-employer-image.php'); ?>" enctype="multipart/form-data"  method="post" style="max-width: 800px !important;">
                         <div id="job-seeker-signup-a" class="form-section">
                              <div class="">
                                   <div>
                                        <input type="hidden" name="company_id" value="<?= "$company_ID" ?>" id="company-id">
                                        <div class="" id="view-uploaded-image">
                                             <input type="file" id="image-upload" name="image" accept=".png, .jpg" style="display: none;" required>
                                             <div class="circle-section d-flex justify-content-center">
                                                  <label for="image-upload" class="circle-image" style="width: 250px !important; height: 250px !important; border: 5px solid color(srgb 0.1277 0.5183 0.9668);">
                                                       <img id="selected-image">
                                                  </label>
                                             </div>
                                        </div>
                                   </div>     
                              </div>
                         </div>
                         <div class="mt-3 m-0 d-flex justify-content-center">
                              <button id="prev-button" type="button" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</button>
                              <button id="upload-another" type="button">Choose</button>
                              <button id="submit-button" class="button m-1 submit-image-btn" type="submit" disabled>Upload</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>

     <?php include "../common/footer-inside-folder.php"; ?>
     <?php include "../common/message-session.php"; ?>
     <?php include "../job-seeker/data-list.php"; ?>
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
</body>
</html>

