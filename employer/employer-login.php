<?php
session_start();

if (isset($_SESSION['company_ID'])) {
    header("Location: home.php");
    exit();
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    include "../database/conn.php";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT company_ID, employer_password FROM EMPLOYER_SIGNUP_INFO WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Get the result and fetch the row data
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['employer_password'];

        // Check if the password is correct
        if (password_verify($password, $hashed_password)) {
          // Generate a random alphanumeric session ID
          $session_ID = bin2hex(random_bytes(20)); // Adjust the length as needed

          // Insert a new row into LOGIN_LOGS table
          $user_ID = $row['company_ID'];
          $user = "Employer";

          $insertStmt = $conn->prepare("INSERT INTO LOGIN_LOGS (user_ID, session_ID, user, date_logged_in) VALUES (?, ?, ?, CURRENT_TIMESTAMP)");
          $insertStmt->bind_param("sss", $user_ID, $session_ID, $user);
          $insertStmt->execute();
          $insertStmt->close();

          $_SESSION['session_ID'] = $session_ID;
          $_SESSION['company_ID'] = $row['company_ID'];

            // Redirect to home.php
            header("Location: home.php");
            exit();
        } else {
            $error = "<span class='error-indicator'>Invalid email or password</span>";
        }
    } else {
        $error = "<span class='error-indicator'>Invalid email or password</span>";
    }

    $stmt->close();
    $conn->close();
}
?>
<?php include "../function/retrieve-job-status-total-analytics-home.php" ?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Employer Login</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/index-style.css">
     <style>
          .login-section {
               box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
          }

          #job-listing-chart {
               width: 80% !important;
               height: auto !important;
          }

          #line-chart {
               display: flex;
               justify-content: center;
          }
          .animate-fade {
               animation: fadeInOut 2s ease-in-out forwards;
          }

          @keyframes fadeInOut {
               0% {
                    opacity: 0;
               }
               100% {
                    opacity: 1;
               }
          }


          #nextButton, #prevButton {
               background-color: transparent;
               border: none;
               fill: rgb(232, 232, 232);
          }

          #nextButton:hover, #prevButton:hover {
               fill: gray;
          }
     </style>
</head>
<body class="container-xxl">
     <?php include "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="../index.php" class="no-decor-link"><h6 class="page-indicator-txt">Home</h6></a> 
               <a href="" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Employer Login</h6></a>
          </div>
     </div>
     <div class="row d-flex flex-column-reverse flex-lg-row">
          <div class="col-12 col-lg-9">
               <div class="d-flex align-items-center bg-light row mt-3 mb-3 me-0 me-lg-3 ms-0 ms-lg-3 p-4 pb-4 rounded-3 justify-content-center position-relative" style="border-top: 5px solid #007BFF; border-bottom: 5px solid #007BFF; min-height: 550px;">
                    <div class="animate-fade col-10">
                         <div class="position-relative">
                              <h5 class="job-listing-graph-head fit-content">Job Listing Graph</h5>
                                   <?php include "../charts/job-listing-chart.php"; ?>
                              <h5 class="d-none"><?= $cumulativeCount ?> Total Job Listed</h5>
                              <p style="font-size: 15px; color: gray;">This line graph illustrates the cumulative growth of job listings over time. Dates are on the x-axis, showcasing the increasing trend of total job listings on the y-axis. The absence of y-axis labels emphasizes the overall growth pattern.</p>
                         </div>
                    </div>
                    <div class="animate-fade col-10 d-none">
                         <div class="d-flex justify-content-center align-items-center mt-3 mt-lg-0">
                              <div class="d-flex align-items-center">
                                   <h1 class="fit-content text-center total-value animate-count mb-0" style="min-width: 150px;"><?= $applied_status_count ?></h1>
                                   <div class="ms-2">
                                        <h5 class="fit-content analytics-label text-center">Applications Processed</h5>
                                        <p style="font-size: 15px; color: gray;" class="mb-0">
                                             Join the success! <?= $applied_status_count ?> job seekers have successfully applied through our platform, launching their career journeys.
                                        </p>
                                   </div> 
                              </div>
                         </div>
                         <div class="d-flex justify-content-center align-items-center mt-3 mt-lg-0">
                              <div class="d-flex align-items-center justify-content-end">
                                   <div class="text-end me-2">
                                        <div class="d-flex align-items-center justify-content-end">
                                             <h5 class="fit-content analytics-label text-center">Shortlisted Opportunities</h5>
                                        </div>
                                        <p style="font-size: 15px; color: gray;" class="mb-0">
                                             Stand out! Profiles have been shortlisted <?= $shortlisted_status_count ?> times, creating more opportunities for job seekers like you.
                                        </p>
                                   </div> 
                                   <h1 class="fit-content text-center total-value animate-count mb-0" style="min-width: 150px;"><?= $shortlisted_status_count ?></h1>
                              </div>
                         </div>
                         <div class="d-flex justify-content-center align-items-center mt-3 mt-lg-0">
                              <div class="d-flex align-items-center">
                                   <h1 class="fit-content text-center total-value animate-count mb-0" style="min-width: 150px;"><?= $interview_status_count ?></h1>
                                   <div class="ms-2">
                                        <h5 class="fit-content analytics-label text-center">Interviewed and Prepared</h5>
                                        <p style="font-size: 15px; color: gray;" class="mb-0">
                                             Get ready for success! <?= $interview_status_count ?> job seekers have been interviewed, showcasing their skills and talents.
                                        </p>
                                   </div> 
                              </div>
                         </div>
                         <div class="d-flex justify-content-center align-items-center mt-3 mt-lg-0">
                              <div class="d-flex align-items-center justify-content-end">
                                   <div class="ms-2 text-end">
                                        <div class="d-flex align-items-center justify-content-end">
                                             <h5 class="fit-content analytics-label text-center">Success Stories</h5>
                                        </div>
                                        <p style="font-size: 15px; color: gray;" class="mb-0">
                                             Celebrate success! <?= $hired_status_count ?> job seekers have secured their dream jobs through our platform. Begin your journey today.
                                        </p>
                                   </div> 
                                   <h1 class="fit-content text-center total-value animate-count mb-0" style="min-width: 150px;"><?= $hired_status_count ?></h1>
                              </div>
                         </div>
                    </div>
                    <div class="animate-fade col-10 row d-flex justify-content-center mt-2 d-none">
                         <div class="col-12 p-0 row mt-lg-0 mt-3 mt-lg-0 d-flex justify-content-center">
                              <div class="col-6 col-lg-6">
                                   <div class="d-flex align-items-center">
                                        <div class="">
                                             <h5 class="fit-content analytics-label text-center">In-Demand Positions</h5>
                                             <p style="font-size: 15px; color: gray;" class="mb-1">Top job titles with the highest total listings.</p>
                                             <div>
                                                  <?php include "../function/retrieve-job-title-analytics.php"; ?>
                                             </div>
                                        </div> 
                                   </div>
                              </div>
                              <div class="col-6 col-lg-6 mt-lg-0">
                                   <div class="d-flex align-items-center">
                                        <div class="">
                                             <h5 class="fit-content analytics-label text-center d-flex align-items-center">In-Demand Locations</h5>
                                             <p style="font-size: 15px; color: gray;" class="mb-1">Top job locations with the highest total listings.</p>
                                             <div>
                                                  <?php include "../function/retrieve-job-location-analytics.php"; ?>
                                             </div>
                                        </div> 
                                   </div>
                              </div>
                         </div>
                         <div class="col-12 row p-0 mt-lg-3 mt-3 mt-lg-0 d-flex justify-content-center">
                              <div class="col-6 col-lg-6">
                                   <div class="d-flex align-items-center">
                                        <div class="">
                                             <h5 class="fit-content analytics-label text-center">Top Hiring Companies</h5>
                                             <p style="font-size: 15px; color: gray;" class="mb-1">Top companies with the highest total hiring.</p>
                                             <div>
                                                  <?php include "../function/retrieve-companies-analytics.php"; ?>
                                             </div>
                                        </div> 
                                   </div>
                              </div>
                              <div class="col-6 col-lg-6 mt-lg-0">
                                   <div class="d-flex align-items-center">
                                        <div class="">
                                             <h5 class="fit-content analytics-label text-center d-flex align-items-center">Top Industries</h5>
                                             <p style="font-size: 15px; color: gray;" class="mb-1">Top industries with the highest total job listings.</p>
                                             <div>
                                                  <?php include "../function/retrieve-companies-sector-analytics.php"; ?>
                                             </div>
                                        </div> 
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="animate-fade col-10 row d-flex justify-content-center align-items-center position-relative mt-0 mt-lg-0 d-none">
                         <h5 class="fit-content analytics-label text-center position-absolute mb-0" style="top: -10px;">Employment Type Distribution</h5>
                         <div class="col-12 col-lg-8 d-flex justify-content-start">
                              <?php include "../charts/job-type-chart.php"; ?>
                         </div>
                         <div class="col-12 col-lg-4">
                              <p style="font-size: 15px; color: gray;" class="mb-1">Unveil the spectrum of opportunities with our Job Type Distribution chart. Each color signifies a distinct role within our organization. A quick visual insight into the diverse array of possibilities awaiting you. Explore and envision your next career move!</p>
                         </div>
                    </div>
                    <div class="position-absolute" style="width: auto; left: 0; top: 40%;">
                         <button id="nextButton">
                              <svg xmlns="http://www.w3.org/2000/svg" height="4em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                         </button>
                    </div>
                    <div class="position-absolute" style="width: auto; right: 0; top: 40%;">
                         <button id="prevButton">
                              <svg xmlns="http://www.w3.org/2000/svg" height="4em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>
                         </button>
                    </div>
               </div>
          </div>
          <div class="col-12 col-lg-3 body d-flex p-3" id="login-body">
               <div class="w-100 login-section">
                    <div class="h-auto">
                         <h5 class="login-head-txt">Employer Login</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-center mt-4 h-75">
                         <div class="">
                              <div class="d-grid justify-content-center align-items-center">
                                   <form action="" method="post" class="d-grid justify-content-center align-items-center">
                                        <p id="login-message">
                                             <?php if (isset($error)) {
                                             echo $error;
                                        } ?>
                                        </p>
                                        <input placeholder="email" class="login-input" type="email" name="email" id="username" required>
                                        <input placeholder="password" class="login-input" type="password" name="password" id="password" required>
                                        <a href="job-seeker-signup.php" class="text-center login-footer" style="font-size: 13px; text-decoration: none; font-weight: 500; letter-spacing: 1px;"><span class="">Forgot password?</span></a>
                                        <button type="submit" class="login-btn">LOGIN</button>
                                   </form>
                                   <hr>
                                   <p class="mt-1 mb-1" style="letter-spacing: .6px; margin: 0px 7%; font-size: 13px;">New to InclusiJob? <a href="employer-signup.php" style="font-weight: 600; color: color(srgb 0.1303 0.5184 0.9668);"><span class="">Join now</span></a></p>
                              </div>
                         </div>
                        
                    </div>
               </div>
          </div>
     </div>

     <?php include "../common/footer-inside-folder.php"; ?>
     <?php include "../common/message-session.php"; ?>
     <script src="../js/remove-url-session.js"></script>
     <script>
          document.addEventListener("DOMContentLoaded", function () {
               const fadeElements = document.querySelectorAll('.animate-fade');
               let currentIndex = 0;

               function showNextElement() {
                    // Hide all elements
                    fadeElements.forEach(element => {
                         element.classList.add('d-none');
                    });

                    // Show the current element
                    fadeElements[currentIndex].classList.remove('d-none');

                    // Move to the next element
                    currentIndex = (currentIndex + 1) % fadeElements.length;

                    // Set timeout for the next element after the animation duration
                    setTimeout(showNextElement, 10000);
               }

               // Call the function initially
               showNextElement();
          });

          document.addEventListener("DOMContentLoaded", function () {
               const fadeElements = document.querySelectorAll('.animate-fade');
               let currentIndex = 0;
               let animationTimeout;

               function showElement(index) {
                    // Hide all elements
                    fadeElements.forEach(element => {
                         element.classList.add('d-none');
                    });

                    // Show the specified element
                    fadeElements[index].classList.remove('d-none');
               }

               function showNextElement() {
                    // Move to the next element
                    currentIndex = (currentIndex + 1) % fadeElements.length;

                    // Show the next element
                    showElement(currentIndex);
               }

               function showPreviousElement() {
                    // Move to the previous element
                    currentIndex = (currentIndex - 1 + fadeElements.length) % fadeElements.length;

                    // Show the previous element
                    showElement(currentIndex);
               }

               function startAutoPlay() {
                    // Set timeout for the next element after the animation duration
                    animationTimeout = setTimeout(showNextElement, 10000);
               }

               function stopAutoPlay() {
                    // Clear the timeout to pause the animation
                    clearTimeout(animationTimeout);
               }

               // Call the function initially
               showElement(currentIndex);
               startAutoPlay();

               // Set event listeners for next and previous buttons
               document.getElementById('nextButton').addEventListener('click', function () {
                    stopAutoPlay();
                    showNextElement();
                    startAutoPlay();
               });

               document.getElementById('prevButton').addEventListener('click', function () {
                    stopAutoPlay();
                    showPreviousElement();
                    startAutoPlay();
               });
          });
     </script>
</body>
</html>

