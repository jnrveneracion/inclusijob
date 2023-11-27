<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Partners and Supporters</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/index-style.css">
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

          .bg-light div p{
               letter-spacing: .7px;
          }
     </style>
</head>
<body class="container-xxl">
     <?php include "common/head.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="index.php" class="no-decor-link"><h6 class="page-indicator-txt">Home</h6></a> 
               <a href="" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Partners and Supporters</h6></a>
          </div>
     </div>
     <div class="row d-flex justify-content-center">
          <div class="col-12 col-lg-9">
               <div class="d-flex align-items-start bg-light row mt-3 mb-3 me-0 me-lg-3 ms-0 ms-lg-3 p-4 pb-4 rounded-3 justify-content-center position-relative" style="border-top: 5px solid #007BFF; border-bottom: 5px solid #007BFF;">
                    <div>
                         <h2 class="text-center text-lg-start">Together Towards Inclusivity</h2>
                         <div class="row">
                              <div class="col-12 col-xl-6 d-flex justify-content-center align-items-center">
                                   <div>
                                        <p class="mb-0">
                                        NAGKAISA (Nagkakaisa at Gabay ng may Kapansanan na Itataguyod ng Samahan) Inc. Brgy. 179, North Caloocan City
                                        </p>
                                        <img src="images/nagkaisa-logo.png" width="400px" alt="" srcset="">
                                        <p class="text-center fw-bold">SEC Reg. No.: 2021070019415-00</p>
                                   </div>
                              </div>
                              <div class="col-12 col-xl-6 d-flex justify-content-center align-items-start">
                                   <p>
                                   NAGKAISA Inc. is a dedicated partner and supporter of our cause. This organization operates under the Local Government Unit, focusing on empowering the workforce of Persons with Disabilities (PWDs). By leveraging the provisions of Republic Act 727, also known as the 'Magna Carta for Disabled Persons,' they are committed to the rehabilitation, self-development, and self-reliance of disabled individuals. Situated in North Caloocan, their mission extends to facilitating the seamless integration of disabled persons into the mainstream of society. We are honored to collaborate with Nagkaisa Inc., sharing a common commitment to inclusivity and the well-being of our community.
                                   </p>
                              </div>
                             
                         </div>  
                    </div>
               </div>
          </div>
     </div>

     <?php include "common/footer.php"; ?>
     <?php include "common/message-session.php"; ?>
     <script src="js/remove-url-session.js"></script>
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

