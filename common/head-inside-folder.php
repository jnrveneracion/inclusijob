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
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
  function googleTranslateElementInit() {
     new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,tl,ceb,ilo,hil,war', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
  }
</script>
<div id="google_translate_element" class="d-none"></div>

<div class="top-menu row" translate="no">
     <div class="logo-section col-12 col-lg-6 d-flex justify-content-center justify-content-lg-start">
          <a href="../index.php" class="d-flex justify-content-center"><img src="../images/inclusijob-head-logo.png" width="90%" alt="" srcset="" id="head-logo"></a>
     </div>
     <div class="menu-section col-12 col-lg-6 d-flex justify-content-center align-items-center justify-content-lg-end">
          <div class="w-75">
               <div class="changeable-font-size text-primary fs-5 d-flex align-items-center mb-0" style="margin-bottom: -5px !important;" translate="yes">Good day<?php
                    if (isset($_SESSION['jobseeker_ID'])) {
                         echo ", $firstname!";
                         echo "<form method='POST' action='../function/logout-jobseeker.php'><button class='logout-btn' type='submit' name='logout' id='log-out-btn' value='Logout'>Logout</button></form>";
                    } elseif (isset($_SESSION['company_ID'])) {
                         echo ", $company_name!";
                         echo "<form method='POST' action='../function/logout-employer.php'><button class='logout-btn' type='submit' name='logout-company' id='log-out-btn' value='Logout-Company'>Logout</button></form>";
                    } elseif (isset($_SESSION['admin_ID'])) {
                         echo ", Admin!";
                         echo "<form method='POST' action='../function/logout-admin.php'><button class='logout-btn' type='submit' name='logout-admin' id='log-out-btn' value='Logout-Admin'>Logout</button></form>";
                    } else {
                         echo "!";
                    }
                    ?>
               </div>
               <div style="margin: 0px 10px;">Philippine Standard Time:</div>
               <div id="ph-time" class="gray-text changeable-font-size"></div>
          </div>
          <div class="w-25">
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
                              <button id="translate" title="" onclick="toggleTranslate()">Translate</button>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<script>
    function toggleTranslate() {
        var translateDiv = document.getElementById("google_translate_element");
        translateDiv.classList.toggle("d-none");
    }
</script>