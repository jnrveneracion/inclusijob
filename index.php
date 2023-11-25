<?php 
     session_start();
     if (isset($_SESSION['jobseeker_ID'])) {
          header("Location: job-seeker/home.php");
          exit();
     }

     // if (!isset($_SESSION['jobseeker_ID'])) {
     //      header("Location: job-seeker/job-seeker-login.php");
     //      exit();
     // }
?>
<?php include "function/retrieve-job-status-total-analytics.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="css/index-style.css">
     <?php include "function/accessibility-translate.php" ?>
     <style>
          .analytics-label {
               font-size: 20px !important;
          }
     </style>
</head>
<body class="container-xxl">
     <?php include "common/head.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex">
               <a href="index.php" class="no-decor-link"><h6 class="page-indicator-txt active" translate="no">Home</h6></a> 
          </div>
     </div>
     <div class="ms-5 me-5 mt-0 p-2 p-lg-3">
          <div class="mt-2"> 
               <p class="changeable-font-size speakable-text">Welcome to <b>InclusiJob</b> — Where Opportunities Embrace All Abilities!</p>
               <p class="changeable-font-size speakable-text">At InclusiJob, we're dedicated to empowering Filipino seniors and persons with disabilities (PWDs) on their unique journey towards meaningful employment. We understand the distinct challenges these remarkable individuals face in the job market, often stemming from a lack of familiarity with modern technologies and evolving work dynamics.</p>
          </div>
     </div>
     <div class="d-flex justify-content-center align-items-center" id="home-body" style="padding-bottom: 100px;">
          <!-- <span id="home-button-top-span" class="home-span">Are you</span> -->
          <span class="d-none speakable-text">select user account</span>
          <div class="row w-100 d-flex justify-content-center position-relative">
               <div class="col-12 col-md-auto d-flex justify-content-center justify-content-lg-end">
                    <button class="home-button speakable-text" id="employee" title="Naghahanap ng trabaho" translate="no" onclick="window.location = 'job-seeker/job-seeker-login.php'">Job Seeker</button>
               </div>
               <div class="col-12 col-md-auto d-flex align-items-center justify-content-center">
                    <span class="home-span speakable-text">or</span>
                    <span id="home-button-bottom-span-b" class="home-span changeable-font-size" onclick="window.location = 'admin-login.php'">Login as Admin</span>
                    <span id="home-button-bottom-span" class="home-span changeable-font-size">How to use?</span>
               </div>
               <div class="col-12 col-md-auto d-flex justify-content-center justify-content-lg-start position-relative">
                    <button class="home-button speakable-text" id="employer" title="Empleyador" translate="yes" onclick="window.location = 'employer/employer-login.php'">Employer</button>   
               </div>
          </div>
     </div>
     <div class="d-flex align-items-start row ms-3 me-3 ms-lg-5 me-lg-5 mt-3 mb-3 p-4 pb-4  bg-light rounded-3 justify-content-center" style="border-top: 5px solid #007BFF; border-bottom: 5px solid #007BFF;">
          <div class="col-12 col-lg-7">
               <div class="position-relative">
                    <h5 class="job-listing-graph-head fit-content">Job Listing Graph</h5>
                    <?php include "charts/job-listing-chart.php"; ?>
                    <h5 class="d-none"><?= $cumulativeCount ?> Total Job Listed</h5>
                    <p style="font-size: 11px; color: gray;">This line graph illustrates the cumulative growth of job listings over time. Dates are on the x-axis, showcasing the increasing trend of total job listings on the y-axis. The absence of y-axis labels emphasizes the overall growth pattern.</p>
               </div>
          </div>
          <div class="col-12 col-lg-5">
               <div class="d-flex justify-content-center align-items-center mt-3 mt-lg-0">
                    <div class="d-flex align-items-center">
                         <h1 class="fit-content text-center total-value animate-count mb-0" style="min-width: 150px;"><?= $applied_status_count ?></h1>
                         <div class="ms-2">
                              <h5 class="fit-content analytics-label text-center">Applications Processed</h5>
                              <p style="font-size: 11px; color: gray;" class="mb-0">
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
                              <p style="font-size: 11px; color: gray;" class="mb-0">
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
                              <p style="font-size: 11px; color: gray;" class="mb-0">
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
                              <p style="font-size: 11px; color: gray;" class="mb-0">
                                   Celebrate success! <?= $hired_status_count ?> job seekers have secured their dream jobs through our platform. Begin your journey today.
                              </p>
                         </div> 
                         <h1 class="fit-content text-center total-value animate-count mb-0" style="min-width: 150px;"><?= $hired_status_count ?></h1>
                    </div>
               </div>
          </div>
          <div class="col-12 col-lg-6 row d-flex justify-content-between mt-2">
               <div class="col-12 p-0 row mt-lg-0 mt-3 mt-lg-0 d-flex justify-content-between">
                    <div class="col-6 col-lg-6">
                         <div class="d-flex align-items-center">
                              <div class="">
                                   <h5 class="fit-content analytics-label text-center">In-Demand Positions</h5>
                                   <p style="font-size: 11px; color: gray;" class="mb-1">Top job titles with the highest total listings.</p>
                                   <div>
                                        <?php include "function/retrieve-job-title-analytics.php"; ?>
                                   </div>
                              </div> 
                         </div>
                    </div>
                    <div class="col-6 col-lg-6 mt-lg-0">
                         <div class="d-flex align-items-center">
                              <div class="">
                                   <h5 class="fit-content analytics-label text-center d-flex align-items-center">In-Demand Locations</h5>
                                   <p style="font-size: 11px; color: gray;" class="mb-1">Top job locations with the highest total listings.</p>
                                   <div>
                                        <?php include "function/retrieve-job-location-analytics.php"; ?>
                                   </div>
                              </div> 
                         </div>
                    </div>
               </div>
               <div class="col-12 row p-0 mt-lg-3 mt-3 mt-lg-0 d-flex justify-content-between">
                    <div class="col-6 col-lg-6">
                         <div class="d-flex align-items-center">
                              <div class="">
                                   <h5 class="fit-content analytics-label text-center">Top Hiring Companies</h5>
                                   <p style="font-size: 11px; color: gray;" class="mb-1">Top companies with the highest total hiring.</p>
                                   <div>
                                        <?php include "function/retrieve-companies-analytics.php"; ?>
                                   </div>
                              </div> 
                         </div>
                    </div>
                    <div class="col-6 col-lg-6 mt-lg-0">
                         <div class="d-flex align-items-center">
                              <div class="">
                                   <h5 class="fit-content analytics-label text-center d-flex align-items-center">Top Industries</h5>
                                   <p style="font-size: 11px; color: gray;" class="mb-1">Top industries with the highest total job listings.</p>
                                   <div>
                                        <?php include "function/retrieve-companies-sector-analytics.php"; ?>
                                   </div>
                              </div> 
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-12 col-lg-6 row d-flex justify-content-center align-items-center position-relative mt-3 mt-lg-0 ">
               <h5 class="fit-content analytics-label text-center position-absolute mb-0" style="top: 8px;">Employment Type Distribution</h5>
               <div class="col-12 col-lg-9 d-flex justify-content-start">
                    <?php include "charts/job-type-chart.php"; ?>
               </div>
               <div class="col-12 col-lg-3">
                    <p style="font-size: 11px; color: gray;" class="mb-1">Unveil the spectrum of opportunities with our Job Type Distribution chart. Each color signifies a distinct role within our organization. A quick visual insight into the diverse array of possibilities awaiting you. Explore and envision your next career move!</p>
               </div>
          </div>
     </div>
     <?php include "common/footer.php"; ?>
     <script src="js/animate-count.js"></script>
</body>
</html>