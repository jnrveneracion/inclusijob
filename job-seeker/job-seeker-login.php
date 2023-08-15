<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <style>
          a, .menu-section a {
               text-decoration: none;
               color: #2184F7;
               font-family: "Avenir Next";
               font-size: 20px;
               font-weight: 500;
          }

          .menu-section a:hover, a:hover {
               color: #004493;
          }

          .menu-section * {
               margin: 10px;
          }

          #accessibility-menu{
               position: absolute;
          }

          #accessibility-options {
               display: grid;
          }


          #home-body {
               height: 405px;
          }

          #home-button-top-span {
               margin-top: -160px;
               position: absolute;
          }

          .home-span {
               color: rgb(175, 176, 177);
               font-size: 20px;
          }

          #home-button-bottom-span {
               margin-top: 160px;
               position: absolute;
               display: flex;
               align-items: center;
               font-size: 15px;
          }

          #home-button-bottom-span:hover {
               color: #333333;
          }

          .home-button {
               font-size: 40px;
               border-radius: 5px;
               padding: 10px 30px;
               margin: 10px 30px;
          }

           .home-button:hover {
               filter: brightness(.9);
           }

           #employee {
               background-color: color(srgb 0.1277 0.5183 0.9668);
               color: white;
               border: none;
           }

           #employer {
               background-color: white;
               color: color(srgb 0.1277 0.5183 0.9668);
               border: 1px solid color(srgb 0.1277 0.5183 0.9668);
           }

           .link-underline {
               text-decoration: underline !important;
           }

           .disable-link {
               pointer-events: none;
               cursor: default;
           }

           #q-mark-svg {
               filter: grayscale(1) opacity(.5);
           }

           .gray-text {
               color: #333333 !important;
           }

           #ph-time {
               margin: 0px 10px;
               font-size: 15px;
           }

           .speakable-text {
    transition: background-color 0.3s;
  }
     </style>
</head>
<body>
     <div class=container-xxl>
          <div class="top-menu row">
               <div class="logo-section col-12 col-lg-6 text-center text-lg-start">
                    <a href="../index.php"><img src="../images/inclusijob-head-logo.png" width="500" alt="" srcset="" id="head-logo"></a>
               </div>
               <div class="menu-section col-12 col-lg-6 d-flex justify-content-center align-items-center justify-content-lg-end">
                    <div>
                         <a href="" class="disable-link changeable-font-size">Good day!</a>
                         <div id="ph-time" class="gray-text changeable-font-size"></div>
                    </div>
                    <div class="">
                         <a class="btn" data-bs-toggle="collapse" href="#accessibility-menu" role="button" aria-expanded="false" aria-controls="collapseExample">
                              <img src="../images/accessibility-svgrepo-com.png" width="50" alt="">
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
          <div class="body d-flex justify-content-center align-items-center" id="home-body">
               <!-- <span id="home-button-top-span" class="home-span">Are you</span> -->
               <button class="home-button speakable-text" id="employee" title="Naghahanap ng trabaho">Job seeker</button>
               <span class="home-span">or</span>
               <button class="home-button speakable-text" id="employer" title="Empleyador">Employer</button>
               <span id="home-button-bottom-span" class="home-span changeable-font-size">How to use&nbsp;<img src="../images/question-mark-circle-svgrepo-com.png" width="20" alt="" srcset="" id="q-mark-svg"></a></span>
          </div>
          <div class="footer-top-section row">
               <div class="col-12 col-lg-3">
                    <div class="footer-links m-3 text-center">
                         <img src="../images/square-logo.png" width="200" alt="">
                    </div>
               </div>
               <div class="col-12 col-lg-6">
                    <div class="footer-text m-3 d-grid gray-text">
                         <h5>About us</h5>
                         <p class="changeable-font-size speakable-text"><b>InclusiJob</b> is a platform designed specifically for Filipino  seniors and persons with disabilities (PWDs) who often encounter significant difficulties in their job search. These individuals face unique challenges, mainly arising from their limited knowledge of new technologies.</p>
                    </div>
               </div>
               <div class="col-12 col-lg-3">
                    <div class="footer-links m-3 d-grid">
                         <h5>Useful links</h5>
                         <a href="">Home</a>
                         <a href="">Jobs</a>
                         <a href="">Companies</a>
                    </div>     
               </div>
               <div class="footer-bottom-section text-center bg-primary text-white rounded-2 p-1">BSIT 3-2 Curioso | Lat | Mozol | Veneracion 2023</div>
          </div>
     </div>

     <!-- Font size adjuster script -->
     <script src="../js/font-adjust.js"></script>

     <!-- PH time script -->
     <script src="../js/ph-time.js"></script>

     <!-- speak script -->
     <script src="../js/speak-screen.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>