<?php 
     // ganito pag nasa labas ng folder yung main session
     // Check if the user is already logged in; if so, redirect to home.php
     if (isset($_SESSION['jobseeker_ID'])) {
          header("Location: job-seeker/home.php");
          exit();
     }

     if (!isset($_SESSION['jobseeker_ID'])) {
          header("Location: job-seeker/job-seeker-login.php");
          exit();
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="css/index-style.css">
</head>
<body class="container-xxl">
     <?php include "common/head.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex">
               <a href="index.php" class="no-decor-link"><h6 class="page-indicator-txt active">Home</h6></a> 
          </div>
     </div>
     <div class="ms-5 me-5 mt-3 p-2 p-lg-3">
          <div> 
               <p class="changeable-font-size speakable-text">Welcome to <b>InclusiJob</b> — Where Opportunities Embrace All Abilities!</p>
               <p class="changeable-font-size speakable-text">At InclusiJob, we're dedicated to empowering Filipino seniors and persons with disabilities (PWDs) on their unique journey towards meaningful employment. We understand the distinct challenges these remarkable individuals face in the job market, often stemming from a lack of familiarity with modern technologies and evolving work dynamics.</p>
          </div>
     </div>
     <div class="body d-flex justify-content-center align-items-center mb-5 pb-5 pt-4" id="home-body">
          <!-- <span id="home-button-top-span" class="home-span">Are you</span> -->
          <button class="home-button speakable-text" id="employee" title="Naghahanap ng trabaho" onclick="window.location = 'job-seeker/job-seeker-login.php'">Job seeker</button>
          <span class="home-span">or</span>
          <button class="home-button speakable-text" id="employer" title="Empleyador" onclick="window.location = 'employer/employer-login.php'">Employer</button>
          <span id="home-button-bottom-span-b" class="home-span changeable-font-size">Login as Admin</span>
          <span id="home-button-bottom-span" class="home-span changeable-font-size">How to use?</span>
     </div>
     

     <?php include "common/footer.php"; ?>
</body>
</html>