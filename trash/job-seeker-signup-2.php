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
        .form-section {
            display: none;
        }
        .form-section.active {
            display: block;
        }
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
                         <form action="" class="d-grid justify-content-center align-items-center">
                              <div id="job-seeker-signup-a" class="form-section">
                                   <div>
                                        <p class="form-head-txt">Personal Details</p>
                                        <div>
                                             
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">First name:</span>
                                                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                             </div>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">Middle name:</span>
                                                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                             </div>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">Last name:</span>
                                                  <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" required>
                                             </div>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">Sex:</span>
                                                  <div class="input-group-text">
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
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">Civil Status:</span>
                                                  <div class="input-group-text">
                                                       <label class="me-2 d-flex align-items-center">
                                                            <input class="form-check-input mt-0" type="radio" name="civil_status" value="Single" aria-label="Male">
                                                            &nbsp;Single
                                                       </label>
                                                       <label class="ms-3 me-2 d-flex align-items-center">
                                                            <input class="form-check-input mt-0" type="radio" name="civil_status" value="Married" aria-label="Female">
                                                            &nbsp;Married
                                                       </label>
                                                       <label class="ms-3 me-2 d-flex align-items-center">
                                                            <input class="form-check-input mt-0" type="radio" name="civil_status" value="Widowed" aria-label="Female">
                                                            &nbsp;Widowed
                                                       </label>
                                                       <label class="ms-3 me-2 d-flex align-items-center">
                                                            <input class="form-check-input mt-0" type="radio" name="civil_status" value="Divorced" aria-label="Female">
                                                            &nbsp;Divorced
                                                       </label>
                                                  </div>
                                             </div>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">Age:</span>
                                                  <input type="number" class="form-control" name="age" aria-label="age" aria-describedby="basic-addon1">
                                             </div>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">Birthday:</span>
                                                  <input type="date" class="form-control" name="birthday" aria-label="birthday" aria-describedby="basic-addon1">
                                             </div>
                                        </div>  
                                   </div>
                              </div>
                              <div id="job-seeker-signup-b" class="form-section">
                                   <div>
                                        <p class="form-head-txt">Contact Information</p>
                                        <div>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">Contact no.:</span>
                                                  <input type="text" class="form-control" aria-label="contact_no" name="contact_no" aria-describedby="basic-addon1">
                                             </div>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text">Address:</span>
                                                  <input type="text" aria-label="address" name="address" class="form-control">
                                                  <input type="text" placeholder="City" aria-label="city" name="city" class="form-control">
                                             </div>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">Email:</span>
                                                  <input type="email" class="form-control" aria-label="email" name="email" aria-describedby="basic-addon1">
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div id="job-seeker-signup-d" class="form-section">
                                   <div style="width: 535px;">
                                        <p class="form-head-txt">Login details</p>
                                        <div>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">Username:</span>
                                                  <input type="text" class="form-control" aria-label="username" name="username" aria-describedby="basic-addon1">
                                             </div>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">Password:</span>
                                                  <input type="password" class="form-control" aria-label="password" name="password" aria-describedby="basic-addon1">
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="mt-0 mb-3 ms-1 me-0 d-flex justify-content-end">
                                   <button id="prev-button" type="button" class="button m-1" onclick="prevSection()">Previous</button>
                                   <button id="next-button" type="button" class="button m-1" onclick="nextSection()">Next</button>
                                   <button id="submit-button" class="button m-1" type="submit" id="submit-button" style="display: none;">Submit</button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
     <script>
          var currentSection = 0;
          var sections = document.querySelectorAll('.form-section');
          var prevButton = document.getElementById('prev-button');
          var nextButton = document.getElementById('next-button');
          var submitButton = document.getElementById('submit-button');

          function showSection(index) {
               sections[currentSection].classList.remove('active');
               currentSection = index;
               sections[currentSection].classList.add('active');

               if (currentSection === 0) {
                    prevButton.style.display = "none";
               } else {
                    prevButton.style.display = "flex";
               }

               if (currentSection === sections.length - 1) {
                    nextButton.style.display = "none";
                    submitButton.style.display = "flex";
               } else {
                    nextButton.style.display = "flex";
                    submitButton.style.display = "none";
               }
          }

          function prevSection() {
               if (currentSection > 0) {
                    showSection(currentSection - 1);
               }
          }

          function nextSection() {
               if (currentSection < sections.length - 1) {
                    showSection(currentSection + 1);
               }
          }

          showSection(currentSection);
     </script>

     <!-- image upload -->
     <script>
     document.addEventListener('DOMContentLoaded', function() {
          var previewImage = document.querySelector('.preview-image');
          var imageInput = document.querySelector('.image-input');

          previewImage.addEventListener('click', function() {
               imageInput.click();
          });

          imageInput.addEventListener('change', function(e) {
               var file = e.target.files[0];
               
               if (file && file.type.startsWith('image/')) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                         var img = new Image();
                         img.src = e.target.result;

                         img.onload = function() {
                         previewImage.style.backgroundImage = 'url(' + e.target.result + ')';
                         previewImage.style.backgroundSize = 'contain';
                         previewImage.style.backgroundRepeat = 'no-repeat';
                         previewImage.style.backgroundPosition = 'center';

                         console.log('Image added successfully!');
                         };
                    };

                    reader.readAsDataURL(file);
               } else {
                    // Handle the case when an image file is not selected
                    // Display an error message or perform other actions as needed
                    console.log('Please select a valid image file.');
               }
          });
     });
</script>
     <?php require "../common/footer-inside-folder.php"; ?>
</body>
</html>


<!-- 
     <div class="d-flex justify-content-center m-4">
                                                  <div class="preview-image m-0">
                                                       <div class="load-picture-text" id="load-picture-text">
                                                            <span>Profile Picture</span>
                                                       </div>
                                                       <input class="image-input" type="file" name="profile_image" id="profile_image" accept="image/*"  style="display: none;" required/>
                                                  </div>
                                             </div>
<div id="job-seeker-signup-c" class="form-section">
                                   <div style="width: 535px;">
                                        <p class="form-head-txt">Education Information</p>
                                        <div>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text" id="basic-addon1">Institution:</span>
                                                  <input type="text" class="form-control" aria-label="contact_no" name="contact_no" aria-describedby="basic-addon1">
                                             </div>
                                             <div class="input-group mb-3">
                                                  <span class="input-group-text">Course or qualification:</span>
                                                  <input type="text" aria-label="address" name="address" class="form-control">
                                                  <input type="text" placeholder="City" aria-label="city" name="city" class="form-control">
                                             </div>
                                             <div class="input-group mb-3 w-75">
                                                  <span class="input-group-text" id="start-year-label">Start year:</span>
                                                  <select class="form-select" aria-label="start_year" name="start_year" aria-describedby="start-year-label">
                                                       <option value="">Select Year</option>
                                                       <?php
                                                            $currentYear = date("Y");
                                                            for ($year = 1900; $year <= 2023; $year++) {
                                                                 echo "<option value='$year'>$year</option>";
                                                            }
                                                       ?>
                                                  </select>
                                             </div>
                                             <div class="input-group mb-3 w-75">
                                                  <span class="input-group-text" id="finished-year-label">Finished year:</span>
                                                  <select class="form-select" aria-label="finished_year" name="finished_year" aria-describedby="finished-year-label">
                                                       <option value="">Select Year</option>
                                                       <?php
                                                            $currentYear = date("Y");
                                                            for ($year = $currentYear; $year >= 1900; $year--) {
                                                                 echo "<option value='$year'>$year</option>";
                                                            }
                                                       ?>
                                                  </select>
                                             </div>
                                             <div class="input-group">
                                                  <span class="input-group-text">Course highlights</span>
                                                  <textarea class="form-control" aria-label="With textarea"></textarea>
                                             </div>
                                             <button id="next-button" type="button" class="button m-1" onclick="">Add</button>
                                        </div>
                                   </div>
                              </div>
 -->