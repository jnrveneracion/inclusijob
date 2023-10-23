<?php
     if (isset($_SESSION['jobseeker_ID'])) {
          session_unset();
          session_destroy();
     }
?>

<div class="top-menu row">
     <div class="logo-section col-12 col-lg-6 text-center text-lg-start">
          <a href="#"><img src="images/inclusijob-head-logo.png" width="500" alt="" srcset="" id="head-logo"></a>
     </div>
     <div class="menu-section col-12 col-lg-6 d-flex justify-content-center align-items-center justify-content-lg-end">
          <div>
               <a href="" class="disable-link changeable-font-size">Good day!</a>
               <div style="margin: 0px 10px;">Philippine Standard Time:</div>
               <div id="ph-time" class="gray-text changeable-font-size"></div>
          </div>
          <div class="">
               <a class="btn" data-bs-toggle="collapse" href="#accessibility-menu" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <img src="images/accessibility-svgrepo-com.png" width="50" alt="">
               </a>
               <div class="collapse" id="accessibility-menu">
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