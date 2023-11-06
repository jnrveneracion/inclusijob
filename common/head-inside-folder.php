<?php 
     // Logout logic
     if (isset($_POST['logout'])) {
          // Unset and destroy session variables
          session_unset();
          session_destroy();

          // Redirect to login.php
          header("Location: job-seeker-login.php");
          exit();
     }
     if (isset($_POST['logout-company'])) {
          // Unset and destroy session variables
          session_unset();
          session_destroy();

          // Redirect to login.php
          header("Location: employer-login.php");
          exit();
     }
?>
<style>
     .logout-btn {
          border: 2px solid color(srgb 0.1254 0.5138 0.965 / 0.44);
          background-color: transparent;
          font-size: 15px;
          color: rgb(134, 134, 134);
          margin: 0px;
          margin-left: 5px;
          border-radius: 3px;
          font-weight: 500;
          letter-spacing: 1.5px;
     }

     .logout-btn:hover {
          border: 2px solid color(srgb 0.1254 0.5138 0.965);
          color: black;
     }
</style>
<div class="top-menu row">
     <div class="logo-section col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start">
          <a href="../index.php"><img src="../images/inclusijob-head-logo.png" width="500" alt="" srcset="" id="head-logo"></a>
     </div>
     <div class="menu-section col-12 col-lg-6 d-flex justify-content-center align-items-center justify-content-lg-end">
          <div>
               <div class="changeable-font-size text-primary fs-5 d-flex align-items-center mb-0" style="margin-bottom: -5px !important;">Good day<?php
                    if (isset($_SESSION['jobseeker_ID'])) {
                         echo ", $firstname!";
                         echo "<form method='POST' action=''><button class='logout-btn' type='submit' name='logout' id='log-out-btn' value='Logout'>Logout</button></form>";
                    } elseif (isset($_SESSION['company_ID'])) {
                         echo ", $company_name!";
                         echo "<form method='POST' action=''><button class='logout-btn' type='submit' name='logout-company' id='log-out-btn' value='Logout-Company'>Logout</button></form>";
                    } else {
                         echo "!";
                    }
                    ?>
               </div>
               <div style="margin: 0px 10px;">Philippine Standard Time:</div>
               <div id="ph-time" class="gray-text changeable-font-size"></div>
          </div>
          <div class="">
               <a class="btn" data-bs-toggle="collapse" href="#accessibility-menu" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <img src="../images/accessibility-svgrepo-com.png" width="50" alt="">
               </a>
               <div class="collapse" id="accessibility-menu" style="z-index: 100;">
                    <div class="card card-body">
                         <div id="accessibility-options">
                              <button id="smaller-font" title="smaller font">A -</button>
                              <button id="larger-font" title="smaller font">A +</button>
                              <button id="speak-texts" title="speak texts">Read Screen</button>
                              <button id="high contrast" title="high contrast">High contrast</button>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>