<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <style>
          .menu-section a {
               text-decoration: none;
               color: #2184F7;
               font-family: "Avenir Next";
               font-size: 20px;
               font-weight: 500;
          }

          .menu-section a:hover {
               color: #004493;
          }

          .menu-section * {
               margin: 10px;
          }

          #accessibility-menu{
               position: fixed;
          }

          #accessibility-options {
               display: grid;
          }

          .w-0 {
               width: 0%;
          }
     </style>
</head>
<body>
     <div class=container-xxl>
          <div class="top-menu row">
               <div class="logo-section col-12 col-lg-6 text-center text-lg-start">
                    <img src="images/inclusijob-head-logo.png" width="500" alt="" srcset="" id="head-logo">
               </div>
               <div class="menu-section col-12 col-lg-6 d-flex justify-content-center align-items-center justify-content-lg-end">
                    <a href="">Employee</a>
                    <span>|</span>
                    <a href="">Employer</a>
                    <div class="w-0">
                         <a class="btn" data-bs-toggle="collapse" href="#accessibility-menu" role="button" aria-expanded="false" aria-controls="collapseExample">
                              <img src="images/accessibility-svgrepo-com.png" width="50" alt="">
                         </a>
                         <div class="collapse" id="accessibility-menu">
                              <div class="card card-body">
                                   <div id="accessibility-options">
                                        <button id="smaller-font" title="smaller font">A -</button>
                                        <button id="smaller-font" title="smaller font">A +</button>
                                        <button id="high contrast" title="high contrast">Contrast</button>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="body">
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate quidem sint laborum optio ipsa vero, voluptates tempora rem doloremque libero? Suscipit qui est ratione minus rerum ad voluptatibus eligendi quos.
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. A consequuntur nulla debitis, delectus mollitia fuga in quia culpa at, rerum omnis animi accusantium eaque alias illo necessitatibus praesentium. Temporibus, similique!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quidem placeat voluptate blanditiis exercitationem suscipit adipisci. Minus, voluptas inventore! Rerum eum debitis animi eligendi quia nihil distinctio ea ullam. Id!
               </p>
          </div>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>