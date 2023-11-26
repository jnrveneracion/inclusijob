<!DOCTYPE html>
<html lang="en">
     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>InclusiJob | Job Seeker Request Password Reset</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
               integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
               crossorigin="anonymous">
          <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
          <link rel="stylesheet" href="css/index-style.css">
          <style>
               #resultMessage {
                    color: red;
                    font-size: 12px;
                    text-align: center;
                    letter-spacing: 1px;
                    margin: 0;
               }

               #requestMessage {
                    color: green;
                    font-size: 12px;
                    text-align: center;
                    letter-spacing: 1px;
                    margin: 0;
               }
          </style>
     </head>

     <body class="container-xxl">
          <?php include "common/head.php"; ?>
          <div class="breadcrumbs">
               <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
                    <a href="index.php" class="no-decor-link">
                         <h6 class="page-indicator-txt">Home</h6>
                    </a>
                    <a href="" class="no-decor-link">
                         <h6 class="page-indicator-txt divider">></h6>
                    </a>
                    <a href="employer/employer-login.php" class="no-decor-link">
                         <h6 class="page-indicator-txt">Employer Login</h6>
                    </a>
                    <a href="" class="no-decor-link">
                         <h6 class="page-indicator-txt divider">></h6>
                    </a>
                    <a href="#" class="no-decor-link">
                         <h6 class="page-indicator-txt active">Employer Request Password Reset</h6>
                    </a>
               </div>
          </div>
          <div class="body d-flex justify-content-center align-items-center p-5" id="login-body" style="min-height: 500px; width: 300px; margin: 0 auto;">
               <div>
                    <div class="login-section">
                         <div>
                              <h5 class="login-head-txt">Reset Password</h5>
                         </div>
                         <div class="d-grid justify-content-center align-items-center mb-3">
                              <form id="resetRequestForm" class="d-grid justify-content-center align-items-center">
                                   <p id="resultMessage">
                                        <span style="color: gray;">Please enter your email.</span>
                                   </p>
                                   <input placeholder="email" class="login-input" type="email" name="email" id="email" required>
                                   <button type="button" class="login-btn" onclick="submitForm()">SUBMIT</button>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
          <?php include "common/footer.php"; ?>
          <?php include "common/message-session.php"; ?>
          <script src="js/remove-url-session.js"></script>
          <script>
               function submitForm() {
                    var email = document.getElementById('email').value;

                    // Create a new XMLHttpRequest object
                    var xhr = new XMLHttpRequest();

                    // Configure it: POST-request for the URL /function/process-reset-request.php
                    xhr.open('POST', 'function/process-reset-request-employer.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                    // Define the function to run on successful data submission
                    xhr.onload = function () {
                         if (xhr.status === 200) {
                              document.getElementById('resultMessage').innerHTML = xhr.responseText;
                         } 
                    };

                    // Send the request with the form data
                    xhr.send('email=' + encodeURIComponent(email));
               }
          </script>
     </body>

</html>