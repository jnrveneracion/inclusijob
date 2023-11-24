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
          <div class="w-75">
               <!-- <a href="" class="disable-link changeable-font-size"></a> -->
               <div class="changeable-font-size text-primary fs-5 d-flex align-items-center mb-0" style="margin-bottom: -5px !important;" translate="yes">Good day!</div>
               <div style="margin: 0px 10px;" translate="no">Philippine Standard Time:</div>
               <div id="ph-time" class="gray-text changeable-font-size" translate="no"></div>
          </div>
          <div class="w-25">
               <a class="btn" data-bs-toggle="collapse" href="#accessibility-menu" role="button" aria-expanded="false"
                    aria-controls="collapseExample">
                    <img src="images/accessibility-svgrepo-com.png" width="50" alt="">
               </a>
               <div class="collapse" id="accessibility-menu" style="z-index: 100;">
                    <div class="card card-body">
                         <div id="accessibility-options">
                              <button id="smaller-font" title="smaller font">A -</button>
                              <button id="larger-font" title="smaller font">A +</button>
                              <button id="speak-texts" title="speak texts">Read Screen</button>
                              <button id="translate" title="translate">Translate</button>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>