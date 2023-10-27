<?php
     session_start();
     include "../session-check/job-seeker-not-set.php";
     include "../function/retrieve-job-seeker-signup.php";
     
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>InclusiJob | Job Seeker Job Search</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
     <link rel="stylesheet" href="../css/index-style.css">
     <style>
          #search-btn, #apply-btn {
               color: white;
               margin: 0px 10px;
               border-radius: 5px;
               padding: 5px 30px;
               box-shadow: 0 13px 7px -7px rgba(159, 159, 159, 0.25), 0 8px 16px 28px rgba(219, 219, 219, 0);
               font-family: "Avenir Next";
               font-size: 18px;
          }

          #search-btn {     
               border: 2px solid color(srgb 0.5058 0.5059 0.5059);
               background-color: color(srgb 0.6509 0.651 0.651);

          }

          #apply-btn {
               border: 2px solid color(srgb 0.0931 0.4248 0.81);
               background-color: color(srgb 0.1277 0.5183 0.9668);
          }

          #search-btn:hover, #apply-btn:hover {
               filter: brightness(.9);
          }

          .search-input {
               background-color: color(srgb 0.9498 0.9519 0.9384);
               border-radius: 5px;
               font-family: "Avenir Next";
          }

          .search-grp {
               border: 2px solid color(srgb 0.5058 0.5059 0.5059);
               border-radius: 7px;
               box-shadow: 0 13px 7px -7px rgba(159, 159, 159, 0.25), 0 8px 16px 28px rgba(219, 219, 219, 0);
               font-family: "Avenir Next";
          }

          .gray-background, .search-input:focus {
               background-color: color(srgb 0.9498 0.9519 0.9384) !important;
          } 

          .job-listing-item {
               color: black;
               border: 2px solid color(srgb 0.885 0.885 0.885);
               padding: 13px 15px;
               border-radius: 5px;
               box-shadow: 0 1px 3px rgba(75, 75, 75, 0.16);
               margin: 5px;
               min-height: 250px;
               max-height: 300px;
          }

          .qualifications-div {
               max-height: 103px; 
               min-height: 80px; 
               overflow-y: hidden;
          }

          .job-listing-item.active {
               border: 2px solid color(srgb 0.645 0.645 0.645) !important;
          }

          .job-listing-item:hover {
               color: black;
               border: 2px solid color(srgb 0.82 0.82 0.82) !important;
          }

          .sticky {
               position: -webkit-sticky !important; /* Safari */
               position: sticky !important;
               top: 0px !important;
               padding-top: 10px;
               margin: 0px 5px;
          }

          .listing-details {
               border: 2px solid color(srgb 0.645 0.645 0.645) !important;
               margin: 6px 0px;
               padding: 10px 18px;
               border-radius: 6px;
               min-height: 769px;
               max-height: 819px;
               overflow-y: scroll;
          }

          .btn-no-style, .select-no-style {
               background-color: transparent;
               border: none;
               font-size: 14px;
               color: gray;
          }

          .select-no-style-head {
               color: rgb(77, 75, 75);
               font-size: 14px;
               font-weight: 600;
          } 

          .btn-no-style:hover, .select-no-style:hover {
               color: black;
          }

          .select-no-style {
               -webkit-appearance: none;
               -moz-appearance: none;
               appearance: none;
          }

          .fadeInUp {
               animation: fadeInUp; /* referring directly to the animation's @keyframe declaration */
               animation-duration: 1s; /* don't forget to set a duration! */
          }


     </style>
</head>
<body class="container-xxl">
     <?php require "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Job Seeker</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Job Search</h6></a> 
          </div>
     </div>
     <div class="body m-2 p-4 mt-0 pt-2" id="login-body">
          <div>
               <div class="upper-section mt-1">
                    <div class="d-flex justify-content-center align-items-center row">
                         <div class="col-9 p-0 d-flex justify-content-end">
                              <div class="ms-5 input-group search-input search-grp d-flex justify-content-center justify-content-lg-end w-auto " style="min-width: 80%;">
                                   <span class="input-group-text search-input fw-bold" style="border-right: none;">Search</span>
                                   <input placeholder="Job title, keywords, location, or company" type="text" class="form-control search-input" id="search-input" aria-label="" style="border-right: none; border-left: none;">
                                   <span class="input-group-text search-input" style="border-left: none;"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#929292}</style><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></span>
                              </div>
                         </div>
                         <div class="col-3 search-btn">
                              <div class="m-1 m-lg-0 d-flex justify-content-start align-items-center">
                                   <button type="button" class="fw-bold" id="search-btn">Seek</button>
                              </div>
                         </div>
                         <div class="col-12 row d-flex justify-content-start align-items-center mt-2">
                              <div class="col-2 col-lg-1 me-5 d-flex align-items-center">
                                   <label class="select-no-style" for="filter-job-type"><span id="number-of-jobs-results"></label>
                              </div>
                              <div class="col-10 col-lg-8 ms-3 d-flex align-items-center">
                                   <div class="">
                                        <label class="select-no-style-head " for="filter-job-type">Job type:</label>
                                        <select class="select-no-style" id="filter-job-type"> 
                                             <option value="">Select job type</option>
                                             <option value="Full-Time">Full-Time</option>
                                             <option value="Part-Time">Part-Time</option>
                                             <option value="Contract">Contract</option>
                                             <option value="Temporary">Temporary</option>
                                             <option value="Internship">Internship</option>
                                             <option value="Freelance">Freelance</option>
                                             <option value="Volunteer">Volunteer</option>
                                        </select>
                                        <label class="ms-2 select-no-style-head " for="filter-listed-date">Date posted:</label>
                                        <select class="select-no-style" id="filter-listed-date"> 
                                             <option value="Anytime">Anytime</option>
                                             <option value="0">Today</option>
                                             <option value="3">Last 3 days</option>
                                             <option value="7">Last 7 days</option>
                                             <option value="14">Last 14 days</option>
                                             <option value="30">Last 30 days</option>
                                        </select>
                                   </div>
                              </div>
                         </div>
                       
                    </div>
               </div>
               <div class="lower-section">
                    <div class="row d-flex flex-column-reverse flex-lg-row" id="job-list-bar">
                         <!-- First Column (List) -->
                         <div class="col-lg-4 ps-1 pe-1" style="padding-top: 10px;" id="first-column">
                              <div class="list-group fadeInUp" id="item-list" role="tablist">
                                   <?php include "../function/retrieve-job-listing.php" ?>
                              </div>
                         </div>

                         <!-- Second Column (Info) -->
                         <div class="col-lg-8 ps-1 pe-1" id="second-column">
                              <div class="tab-content sticky" id="item-content">
                                   <div class="listing-details tab-pane fade show active" id="item1" role="tabpanel">
                                        <div>
                                             <div class="row head-section">
                                                  <div class="col-7 d-flex align-items-center">
                                                       <div>
                                                            <h1 class="m-0">Farm Assistant</h1>
                                                            <h3 class="m-0">Bulacan Farm</h3>
                                                       </div>
                                                  </div>
                                                  <div class="col-4 d-flex justify-content-end align-items-center">
                                                       <button type="button" class="fw-bold" id="apply-btn">Apply now</button>
                                                  </div>
                                                  <div class="col-1 d-flex justify-content-start align-items-center">
                                                       <svg xmlns="http://www.w3.org/2000/svg" height="2.5em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"/></svg>
                                                  </div>
                                             </div>
                                             <div>
                                                  <div class="align-items-center">
                                                       <div class="d-flex align-items-center mt-1 mb-1">
                                                            <svg style="fill: black; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1uznlpf0 _1uvwke522 _1m9vd2q56 _1m9vd2q5e _1n6dj3h0 _1n6dj3h2 _1n6dj3h3 _1n6dj3h4" aria-hidden="true"><path d="M12 1C7.6 1 4 4.6 4 9c0 4.1 6.5 12.6 7.2 13.6.2.2.5.4.8.4s.6-.1.8-.4c.7-1 7.2-9.5 7.2-13.6 0-4.4-3.6-8-8-8zm0 19.3c-2.2-3-6-8.8-6-11.3 0-3.3 2.7-6 6-6s6 2.7 6 6c0 2.5-3.8 8.3-6 11.3z"></path><path d="M12 5c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3zm0 4c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1z"></path></svg>
                                                            <span class="ms-1 fs-5">Edi sa Bulacan</span>
                                                       </div>
                                                       <div class="d-flex align-items-center mt-1 mb-1">
                                                            <svg style="fill: black; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1wkzzau0 lnocuo22 a1msqi56 a1msqi5e jd63g10 jd63g12 jd63g13 jd63g14" aria-hidden="true"><path d="M9 6h2v2H9zm4 0h2v2h-2zm-4 4h2v2H9zm4 0h2v2h-2zm-4 4h2v2H9zm4 0h2v2h-2z"></path><path d="M17 2.2V2c0-.6-.4-1-1-1H8c-.6 0-1 .4-1 1v.2C5.9 2.6 5 3.7 5 5v16c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V5c0-1.3-.9-2.4-2-2.8zM17 20h-3v-2h-4v2H7V5c0-.6.4-1 1-1h8c.6 0 1 .4 1 1v15z"></path></svg>
                                                            <span class="ms-1 fs-5">Agriculture</span>
                                                       </div>
                                                       <div class="d-flex align-items-center mt-1 mb-1">
                                                            <svg style="fill: black; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1wkzzau0 lnocuo22 a1msqi56 a1msqi5e jd63g10 jd63g12 jd63g13 jd63g14" aria-hidden="true"><path d="M16.4 13.1 13 11.4V6c0-.6-.4-1-1-1s-1 .4-1 1v6c0 .4.2.7.6.9l4 2c.1.1.2.1.4.1.4 0 .7-.2.9-.6.2-.4 0-1-.5-1.3z"></path><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path></svg>
                                                            <span class="ms-1 fs-5">Internship</span>
                                                       </div>
                                                       <div class="d-flex align-items-center mt-1 mb-1">
                                                       <svg style="fill: black; opacity: .7;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z"/></svg>
                                                            <span class="ms-1 fs-5">90,000 - 100,000 anually</span>
                                                       </div>
                                                       <div class="d-flex align-items-center mt-1">
                                                            <p class="mb-1 fw-light">Posted: September 25, 2023</p>
                                                       </div>
                                                       <div class="d-flex align-items-center mb-1">
                                                            <p class="mb-1 fw-light">Application deadline: September 25, 2023</p>
                                                       </div>
                                                  </div>
                                                  <div>
                                                       <div>
                                                            <p style="font-size: 18px;">company details Lorem ipsum dolor sit amet consectetur, adipisicing elit. janrie Quo amet iusto beatae voluptatem minus dolores cupiditate. Repellat mollitia molestiae, quisquam soluta, sapiente totam quos non earum delectus, at cumque magni? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit rerum, dicta qui aliquid voluptates libero numquam ipsa eos autem, quae hic modi impedit veritatis commodi? Atque cupiditate temporibus repellendus suscipit.</p>
                                                       </div>
                                                            <h6 class="mb-0 mt-2 fs-5">Job description:</h6>
                                                       <div>
                                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. janrie Quo amet iusto beatae voluptatem minus dolores cupiditate. Repellat mollitia molestiae, quisquam soluta, sapiente totam quos non earum delectus, at cumque magni? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit rerum, dicta qui aliquid voluptates libero numquam ipsa eos autem, quae hic modi impedit veritatis commodi? Atque cupiditate temporibus repellendus suscipit.</p>
                                                       </div>
                                                       <h6 class="mb-0 mt-2 fs-5">Qualifications:</h6>
                                                       <div>
                                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. janrie Quo amet iusto beatae voluptatem minus dolores cupiditate. Repellat mollitia molestiae, quisquam soluta, sapiente totam quos non earum delectus, at cumque magni? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit rerum, dicta qui aliquid voluptates libero numquam ipsa eos autem, quae hic modi impedit veritatis commodi? Atque cupiditate temporibus repellendus suscipit.</p>
                                                       </div>
                                                       <h6 class="mb-0 mt-2 fs-5">Benefits:</h6>
                                                       <div>
                                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. janrie Quo amet iusto beatae voluptatem minus dolores cupiditate. Repellat mollitia molestiae, quisquam soluta, sapiente totam quos non earum delectus, at cumque magni? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit rerum, dicta qui aliquid voluptates libero numquam ipsa eos autem, quae hic modi impedit veritatis commodi? Atque cupiditate temporibus repellendus suscipit.</p>
                                                       </div>
                                                       <h6 class="mb-0 mt-2 fs-5">Work environment:</h6>
                                                       <div>
                                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. janrie Quo amet iusto beatae voluptatem minus dolores cupiditate. Repellat mollitia molestiae, quisquam soluta, sapiente totam quos non earum delectus, at cumque magni? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit rerum, dicta qui aliquid voluptates libero numquam ipsa eos autem, quae hic modi impedit veritatis commodi? Atque cupiditate temporibus repellendus suscipit.</p>
                                                       </div>
                                                       <h6 class="mb-0 mt-2 fs-5">Additional information:</h6>
                                                       <div class="row">
                                                            <div class="col-12 col-lg-6">
                                                                 <div class="d-flex align-items-center">
                                                                      <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg>
                                                                      <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">No. of employees: </span>100</p>
                                                                 </div>
                                                                 <div class="d-flex align-items-center">
                                                                      <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c15.1 0 28.5-6.9 37.3-17.8C340.4 462.2 320 417.5 320 368c0-54.7 24.9-103.5 64-135.8V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zM640 368a144 144 0 1 0 -288 0 144 144 0 1 0 288 0zm-76.7-43.3c6.2 6.2 6.2 16.4 0 22.6l-72 72c-6.2 6.2-16.4 6.2-22.6 0l-40-40c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0L480 385.4l60.7-60.7c6.2-6.2 16.4-6.2 22.6 0z"/></svg>
                                                                      <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Year founded: </span>September 20, 1990</p>
                                                                 </div>
                                                                 <div class="d-flex align-items-center">
                                                                      <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
                                                                      <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Address: </span>Caloocan City</p>
                                                                 </div>
                                                                 <div class="d-flex align-items-center">
                                                                      <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                                                                      <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Email: </span>company@email.com</p>
                                                                 </div>
                                                            </div>
                                                            <div class="col-12 col-lg-6">
                                                                 <div class="d-flex align-items-center">
                                                                      <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
                                                                      <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Website: </span>www.company.com</p>
                                                                 </div>
                                                                 <div class="d-flex align-items-center">
                                                                      <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg>
                                                                      <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Facebook: </span>@company</p>
                                                                 </div>
                                                                 <div class="d-flex align-items-center">
                                                                      <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
                                                                      <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Linkedin: </span>@company</p>
                                                                 </div>
                                                                 <div class="d-flex align-items-center">
                                                                      <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                                                                      <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Twitter: </span>@company</p>
                                                                 </div>
                                                            </div>
                                                       </div>     
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="listing-details tab-pane fade" id="item2" role="tabpanel">
                                        <!-- Content for Item 2 -->
                                        <h2>Item 2</h2>
                                        <p>Information about Item 2 goes here.</p>
                                   </div>
                                   <div class="listing-details tab-pane fade" id="item3" role="tabpanel">
                                        <!-- Content for Item 3 -->
                                        <h2>Item 3</h2>
                                        <p>Information about Item 3 goes here.</p>
                                   </div>
                                   <!-- Add more tab panes for additional items -->
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>


     <?php require "../common/footer-inside-folder.php"; ?>
     <?php require "../common/message-session.php"; ?>
     <script src="../js/remove-url-session.js"></script>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <script>
          $(document).ready(function() {
               $('#search-input').on('input', function() {
                    if ($(this).val().trim() !== '') {
                         $(this).addClass('gray-background');
                    } else {
                         $(this).removeClass('gray-background');
                    }
               });
          });
     </script>
     <script>
          const selectElement = document.getElementById('filter-job-type');
          const jobListingItems = document.querySelectorAll('.job-listing-item');
          const searchInput = document.getElementById('search-input');
          const searchbtn = document.getElementById('search-btn');
          const selectElementDate = document.getElementById('filter-listed-date');
          countItemsPerColumn();
          
          selectElement.addEventListener('change', function() {
          const selectedValue = selectElement.value;
               jobListingItems.forEach(item => {
                    if (selectedValue === "" || item.textContent.toLowerCase().includes(selectedValue.toLowerCase())) {
                         item.style.display = "block";
                         item.classList.add('fadeInUp');
                    } else {
                         item.style.display = "none";
                    }
               });

               addActiveClassToFirstVisibleItem();
               countItemsPerColumn();
          });

          searchbtn.addEventListener('click', function() {
               const inputValue = searchInput.value.toLowerCase();

               jobListingItems.forEach(item => {
                    const itemText = item.textContent.toLowerCase();
                    if (inputValue === "" || itemText.includes(inputValue)) {
                         item.style.display = "block";
                         item.classList.add('fadeInUp');
                    } else {
                         item.style.display = "none";
                    }
               });
               addActiveClassToFirstVisibleItem();
               countItemsPerColumn();
          });

          // Add an event listener for the "Enter" key
          searchInput.addEventListener('keypress', function(event) {
               if (event.key === 'Enter') {
                    const inputValue = searchInput.value.toLowerCase();

                    jobListingItems.forEach(item => {
                         const itemText = item.textContent.toLowerCase();
                         if (inputValue === "" || itemText.includes(inputValue)) {
                              item.style.display = "block";
                              item.classList.add('fadeInUp');
                         } else {
                              item.style.display = "none";
                         }
                    });
                    addActiveClassToFirstVisibleItem();
                    countItemsPerColumn();
               }
          });
  
          selectElementDate.addEventListener('change', function() {
               const selectedValue = selectElementDate.value; // Remove parseInt, as values are strings
               const currentDate = new Date();

               jobListingItems.forEach(item => {
                    const itemDate = new Date(item.getAttribute('date-posted'));
                    const daysDifference = Math.ceil((currentDate - itemDate) / (1000 * 60 * 60 * 24));

                    if (selectedValue === "Anytime" || (selectedValue === "0" && daysDifference === 0) || (selectedValue === "3" && daysDifference <= 3) || (selectedValue === "7" && daysDifference <= 7) || (selectedValue === "14" && daysDifference <= 14) || (selectedValue === "30" && daysDifference <= 30)) {
                         item.style.display = "block";
                         item.classList.add('fadeInUp');
                    } else {
                         item.style.display = "none";
                    }
               });
               addActiveClassToFirstVisibleItem();
               countItemsPerColumn();
          });


          function addActiveClassToFirstVisibleItem() {
               const jobListingItems = document.querySelectorAll('.job-listing-item');
               let firstVisibleItem = null;

               for (const item of jobListingItems) {
                    if (item.style.display !== 'none') {
                         firstVisibleItem = item;
                         break;
                    }
               }

               // Remove "active" class from all items
               jobListingItems.forEach(item => {
                    item.classList.remove('active');
               });

               // Add "active" class to the first visible item
               if (firstVisibleItem) {
                    firstVisibleItem.classList.add('active');
                    const firstItemHref = firstVisibleItem.getAttribute('href');
                    const firstItemHrefWithoutHash = firstItemHref.replace('#', ''); // Remove the # sign
                    console.log('Href attribute value of the first visible item:', firstItemHrefWithoutHash);
                    addActiveClassToCorrespondingHref(firstItemHrefWithoutHash);
               }
               
          }

          function addActiveClassToCorrespondingHref(firstItemHrefWithoutHash) {
               const jobListingItems = document.querySelectorAll('.job-listing-item');
               const itemContent = document.querySelectorAll('.listing-details');

               for (let i = 0; i < jobListingItems.length; i++) {
                    if (jobListingItems[i].style.display !== 'none') {
                         itemContent[i].classList.add('active');
                         // itemContent[i].classList.remove('active');

                         // Check if the href matches the firstItemHref
                         if (itemContent[i].id === firstItemHrefWithoutHash) {
                              itemContent[i].classList.add('active');
                              itemContent[i].classList.add('show');
                         } else {
                              itemContent[i].classList.remove('active');
                              itemContent[i].classList.remove('show');
                         }
                    } else {
                         itemContent[i].classList.remove('active');
                         itemContent[i].classList.remove('show');
                    }

               }
          }
          
          function countItemsPerColumn(){
               const jobListingItems = document.querySelectorAll('.job-listing-item');
               const itemContent = document.querySelectorAll('.listing-details');
               
               let displayedJobListingItems = 0;
               let displayedItemContent = 0;
               
               for (let i = 0; i < jobListingItems.length; i++) {
                    if (jobListingItems[i].style.display !== 'none') {
                         displayedJobListingItems++;
                    }
               }
               
               for (let i = 0; i < itemContent.length; i++) {
                    if (itemContent[i].classList.contains('active')) {
                         displayedItemContent++;
                    }
               }
               
               console.log('Number of Displayed Job Listing Items:', displayedJobListingItems);
               console.log('Number of Displayed Item Content:', displayedItemContent);

               if (displayedJobListingItems === 0 || displayedJobListingItems === 1){
                    document.getElementById('number-of-jobs-results').innerText = displayedJobListingItems + " job";
               } else {
                    document.getElementById('number-of-jobs-results').innerText = displayedJobListingItems + " jobs";
               }

               

               const firstColumnDiv = document.getElementById('first-column');
               const secondColumnDiv = document.getElementById('second-column');

               if (displayedJobListingItems === 0){
                    firstColumnDiv.style.display = "none";
                    secondColumnDiv.style.display = "none";
               }else {
                    firstColumnDiv.style.display = "flex";
                    secondColumnDiv.style.display = "block";
               }
          }
     </script>
</body>
</html>