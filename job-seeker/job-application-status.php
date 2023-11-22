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
     <title>InclusiJob | Job Application Status</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/index-style.css">
     <style>
          .notification-section {
               margin: 5px 5px;
               border: 3px solid color(srgb 0.8626 0.8628 0.8627);
               border-radius: 10px;
               padding: 13px 20px;
               display: flex;
               align-items: center;
          }

          .main-body {
               min-height: 500px;
          }

          .notification-section:hover {
               border: 3px solid color(srgb 0.0618 0.4255 0.9648);
          }

          .status-indicator {
               color: white;
               padding: 7px 15px;
               border-radius: 5px;
               font-weight: 440;
          }

          .status-indicator.applied {
               background-color: #0687ff;
               border: 2px solid #006bcf;
          }

          .status-indicator.under-review {
               background-color: #ffc107;
               border: 2px solid #cf9f32;
          }

          .status-indicator.shortlisted {
               background-color: #6f42c1;
               border: 2px solid #3e148a;
          }

          .status-indicator.interview-scheduled {
               background-color: #d63384;
               border: 2px solid #930045;
          }

          .status-indicator.rejected {
               background-color: #595959;
               border: 2px solid #343434;
          }

          .status-indicator.hired {
               background-color: #198754;
               border: 2px solid #07461c;
          }

          .status-indicator.job-trashed {
               background-color: rgb(231, 50, 50);
               border: 2px solid #cd1717;
          }

          .status-indicator.withdrawn {
               background-color: rgb(231, 50, 50);
               border: 2px solid #cd1717;
          }

          .status-info {
               font-size: 13px;
          }

          .notification-section.job-trashed {
               border: 3px solid color(srgb 0.995 0.8308 0.8308);
               background-color: rgb(255, 242, 242);
          }


          .notification-section.job-trashed:hover {
               border: 3px solid color(srgb 0.79 0.0553 0.0553);
          }

          #btn-solid {
               background-color: transparent;
               color: color(srgb 0.2328 0.5323 0.3334);
               border: 2px solid rgb(59, 136, 85);
               border-radius: 4px;
               padding: 5px 30px;
               margin: 5px 10px;
          }

          #btn-solid:hover, #withdraw-btn:hover {
               filter: brightness(.8);
          }

          #withdraw-btn {
               background-color: transparent;
               color: color(srgb 0.895 0.0626 0.0885);
               border: 2px solid color(srgb 0.895 0.0626 0.0885);
               border-radius: 4px;
               padding: 5px 30px;
               margin: 5px 10px;
          }
          .star-rating {
            font-size: 1.5em;
        }

        .star {
            cursor: pointer;
            font-size: 33px;
            color: color(srgb 0.93 0.93 0.93);
        }

        .filled {
            color: #ffc107;
        }

        
        .col-form-label {
               font-size: 15px;
         }

         .req-indicator {
               color: red;
          }
     </style>
</head>
<body class="container-xxl">
     <?php require "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="home.php" class="no-decor-link"><h6 class="page-indicator-txt">Job Seeker</h6></a> 
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Job Application Status</h6></a> 
          </div>
     </div>
     <div class="body d-flex justify-content-start align-items-start mt-1 mt-lg-1 pt-2 m-2 m-lg-5 p-4 main-body">
          <div class="row w-100">
               <?php include "../function/retrieve-job-application-status.php"; ?>
          </div>
     </div>


     <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-xl">
               <div class="modal-content">
                    <form action="<?php echo htmlspecialchars('../function/save-job-seeker-working-review.php'); ?>" method="post" class="needs-validation" novalidate>
                         <div class="modal-body row">
                              <h1 class="modal-title fs-3" id="exampleModalLabel">Rate working at</h1>
                              <div class="col-12 col-lg-6"> 
                                   <input type="hidden" name="jobListingId" id="jobListingId">
                                   <input type="hidden" name="jobSeekerId" id="jobSeekerId">
                                   <input type="hidden" name="employerId" id="employerId">
                                   <div class="mb-0 d-flex align-items-center justify-content-between input-group">
                                        <label for="recipient-name" class="col-form-label"><span class="req-indicator">*</span>Opportunities for career development</label>
                                        <input type="text" class=" d-none" name="star_review_1" id="star-review-1" required>
                                        
                                        <div class="star-rating" id="review-stars-1">
                                             <span class="star" data-value="1">&#9733;</span>
                                             <span class="star" data-value="2">&#9733;</span>
                                             <span class="star" data-value="3">&#9733;</span>
                                             <span class="star" data-value="4">&#9733;</span>
                                             <span class="star" data-value="5">&#9733;</span>
                                        </div>
                                        <div class="invalid-feedback">
                                             <div class="d-flex align-items-center"><svg style="fill: red;" class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="zl0zcx0 _1ic2byb52 _1ic2byb5a ck0l5b1q _1m1w14z7 _1pmtdfh0 _1pmtdfh1 _1pmtdfh2" aria-hidden="true"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path><circle cx="12" cy="17" r="1"></circle><path d="M12 14c.6 0 1-.4 1-1V8c0-.6-.4-1-1-1s-1 .4-1 1v5c0 .6.4 1 1 1z"></path></svg>
                                        Please rate the company on opportunities for career development.</div>
                                        </div>
                                   </div>
                                   <div class="mb-0 d-flex align-items-center justify-content-between input-group">
                                        <label for="recipient-name" class="col-form-label"><span class="req-indicator">*</span>Work/life balance</label>
                                        <input type="text" class="d-none" name="star_review_2" id="star-review-2" required>
                                        <div class="star-rating" id="review-stars-2">
                                             <span class="star" data-value="1">&#9733;</span>
                                             <span class="star" data-value="2">&#9733;</span>
                                             <span class="star" data-value="3">&#9733;</span>
                                             <span class="star" data-value="4">&#9733;</span>
                                             <span class="star" data-value="5">&#9733;</span>
                                        </div>
                                        <div class="invalid-feedback">
                                             <div class="d-flex align-items-center"><svg style="fill: red;" class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="zl0zcx0 _1ic2byb52 _1ic2byb5a ck0l5b1q _1m1w14z7 _1pmtdfh0 _1pmtdfh1 _1pmtdfh2" aria-hidden="true"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path><circle cx="12" cy="17" r="1"></circle><path d="M12 14c.6 0 1-.4 1-1V8c0-.6-.4-1-1-1s-1 .4-1 1v5c0 .6.4 1 1 1z"></path></svg>
                                             Please rate the company on work/life balance.</div>
                                        </div>
                                   </div>
                                   <div class="mb-0 d-flex align-items-center justify-content-between input-group">
                                        <label for="recipient-name" class="col-form-label"><span class="req-indicator">*</span>Working environment</label>
                                        <input type="text" class="d-none" name="star_review_3" id="star-review-3" required>
                                        <div class="star-rating" id="review-stars-3">
                                             <span class="star" data-value="1">&#9733;</span>
                                             <span class="star" data-value="2">&#9733;</span>
                                             <span class="star" data-value="3">&#9733;</span>
                                             <span class="star" data-value="4">&#9733;</span>
                                             <span class="star" data-value="5">&#9733;</span>
                                        </div>
                                        <div class="invalid-feedback">
                                             <div class="d-flex align-items-center"><svg style="fill: red;" class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="zl0zcx0 _1ic2byb52 _1ic2byb5a ck0l5b1q _1m1w14z7 _1pmtdfh0 _1pmtdfh1 _1pmtdfh2" aria-hidden="true"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path><circle cx="12" cy="17" r="1"></circle><path d="M12 14c.6 0 1-.4 1-1V8c0-.6-.4-1-1-1s-1 .4-1 1v5c0 .6.4 1 1 1z"></path></svg>
                                             Please rate the company on working environment.</div>
                                        </div>
                                   </div>
                                   <div class="mb-0 d-flex align-items-center justify-content-between input-group">
                                        <label for="recipient-name" class="col-form-label"><span class="req-indicator">*</span>Management</label>
                                        <input type="text" class="d-none" name="star_review_4" id="star-review-4" required>
                                        <div class="star-rating" id="review-stars-4">
                                             <span class="star" data-value="1">&#9733;</span>
                                             <span class="star" data-value="2">&#9733;</span>
                                             <span class="star" data-value="3">&#9733;</span>
                                             <span class="star" data-value="4">&#9733;</span>
                                             <span class="star" data-value="5">&#9733;</span>
                                        </div>
                                        <div class="invalid-feedback">
                                             <div class="d-flex align-items-center"><svg style="fill: red;" class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="zl0zcx0 _1ic2byb52 _1ic2byb5a ck0l5b1q _1m1w14z7 _1pmtdfh0 _1pmtdfh1 _1pmtdfh2" aria-hidden="true"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path><circle cx="12" cy="17" r="1"></circle><path d="M12 14c.6 0 1-.4 1-1V8c0-.6-.4-1-1-1s-1 .4-1 1v5c0 .6.4 1 1 1z"></path></svg>
                                             Please rate the company’s management.</div>
                                        </div>
                                   </div>
                                   <div class="mb-0 d-flex align-items-center justify-content-between input-group">
                                        <label for="recipient-name" class="col-form-label"><span class="req-indicator">*</span>Benefits and perks</label>
                                        <input type="text" class="d-none" name="star_review_5" id="star-review-5" required>
                                        <div class="star-rating" id="review-stars-5">
                                             <span class="star" data-value="1">&#9733;</span>
                                             <span class="star" data-value="2">&#9733;</span>
                                             <span class="star" data-value="3">&#9733;</span>
                                             <span class="star" data-value="4">&#9733;</span>
                                             <span class="star" data-value="5">&#9733;</span>
                                        </div>
                                        <div class="invalid-feedback">
                                             <div class="d-flex align-items-center"><svg style="fill: red;" class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="zl0zcx0 _1ic2byb52 _1ic2byb5a ck0l5b1q _1m1w14z7 _1pmtdfh0 _1pmtdfh1 _1pmtdfh2" aria-hidden="true"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path><circle cx="12" cy="17" r="1"></circle><path d="M12 14c.6 0 1-.4 1-1V8c0-.6-.4-1-1-1s-1 .4-1 1v5c0 .6.4 1 1 1z"></path></svg>
                                             Please rate the company on benefits and perks.</div>
                                        </div>
                                   </div>
                                   <div class="mb-0 d-flex align-items-center justify-content-between input-group">
                                        <label for="recipient-name" class="col-form-label"><span class="req-indicator">*</span>Diversity and equal opportunity</label>
                                        <input type="text" class="d-none" name="star_review_6" id="star-review-6" required>
                                        <div class="star-rating" id="review-stars-6">
                                             <span class="star" data-value="1">&#9733;</span>
                                             <span class="star" data-value="2">&#9733;</span>
                                             <span class="star" data-value="3">&#9733;</span>
                                             <span class="star" data-value="4">&#9733;</span>
                                             <span class="star" data-value="5">&#9733;</span>
                                        </div>
                                        <div class="invalid-feedback">
                                             <div class="d-flex align-items-center"><svg style="fill: red;" class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="zl0zcx0 _1ic2byb52 _1ic2byb5a ck0l5b1q _1m1w14z7 _1pmtdfh0 _1pmtdfh1 _1pmtdfh2" aria-hidden="true"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path><circle cx="12" cy="17" r="1"></circle><path d="M12 14c.6 0 1-.4 1-1V8c0-.6-.4-1-1-1s-1 .4-1 1v5c0 .6.4 1 1 1z"></path></svg>
                                             Please rate the company on diversity and equal opportunity.</div>
                                        </div>
                                   </div>
                                   <div class="mb-0 d-flex align-items-center justify-content-between input-group">
                                        <label for="recipient-name" class="col-form-label fw-bold"><span class="req-indicator">*</span>Overall rating</label>
                                        <input type="text" class="d-none" name="star_review_7" id="star-review-7" required>
                                        <div class="star-rating" id="review-stars-7">
                                             <span class="star" data-value="1">&#9733;</span>
                                             <span class="star" data-value="2">&#9733;</span>
                                             <span class="star" data-value="3">&#9733;</span>
                                             <span class="star" data-value="4">&#9733;</span>
                                             <span class="star" data-value="5">&#9733;</span>
                                        </div>
                                        <div class="invalid-feedback">
                                             <div class="d-flex align-items-center"><svg style="fill: red;" class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="zl0zcx0 _1ic2byb52 _1ic2byb5a ck0l5b1q _1m1w14z7 _1pmtdfh0 _1pmtdfh1 _1pmtdfh2" aria-hidden="true"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path><circle cx="12" cy="17" r="1"></circle><path d="M12 14c.6 0 1-.4 1-1V8c0-.6-.4-1-1-1s-1 .4-1 1v5c0 .6.4 1 1 1z"></path></svg>
                                             Please give your overall rating for this company.</div>
                                        </div>
                                   </div>
                                   <div class="mb-3 d-block align-items-center justify-content-between input-group">
                                        <label for="recipient-name" class="col-form-label"><span class="req-indicator">*</span>Would you recommend working here to a friend?</label>
                                        <label class="m-2 d-flex align-items-center fs-6">
                                             <input class="form-check-input mt-0 " type="radio" name="recommend" value="yes" aria-label="yes" required>
                                             &nbsp;Yes
                                        </label>
                                        <label class="m-2 d-flex align-items-center fs-6">
                                             <input class="form-check-input mt-0 " type="radio" name="recommend" value="no" aria-label="no" required>
                                             &nbsp;No
                                        </label>
                                        <div class="invalid-feedback">
                                             <div class="d-flex align-items-center"><svg style="fill: red;" class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="zl0zcx0 _1ic2byb52 _1ic2byb5a ck0l5b1q _1m1w14z7 _1pmtdfh0 _1pmtdfh1 _1pmtdfh2" aria-hidden="true"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path><circle cx="12" cy="17" r="1"></circle><path d="M12 14c.6 0 1-.4 1-1V8c0-.6-.4-1-1-1s-1 .4-1 1v5c0 .6.4 1 1 1z"></path></svg>
                                             Please give your recommendation.</div>
                                        </div>
                                   </div>
                                   <div class="mb-3 d-block align-items-center justify-content-between input-group">
                                        <label for="recipient-name" class="col-form-label"><span class="req-indicator">*</span>How would you rate your salary?</label>
                                        <label class="m-2 d-flex align-items-center fs-6">
                                             <input class="form-check-input mt-0 " type="radio" name="salary" value="high" aria-label="high" required>
                                             &nbsp;High
                                        </label>
                                        <label class="m-2 d-flex align-items-center fs-6">
                                             <input class="form-check-input mt-0 " type="radio" name="salary" value="average" aria-label="average" required>
                                             &nbsp;Average
                                        </label>
                                        <label class="m-2 d-flex align-items-center fs-6">
                                             <input class="form-check-input mt-0 " type="radio" name="salary" value="low" aria-label="low" required>
                                             &nbsp;Low
                                        </label>
                                        <div class="invalid-feedback">
                                             <div class="d-flex align-items-center"><svg style="fill: red;" class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="zl0zcx0 _1ic2byb52 _1ic2byb5a ck0l5b1q _1m1w14z7 _1pmtdfh0 _1pmtdfh1 _1pmtdfh2" aria-hidden="true"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path><circle cx="12" cy="17" r="1"></circle><path d="M12 14c.6 0 1-.4 1-1V8c0-.6-.4-1-1-1s-1 .4-1 1v5c0 .6.4 1 1 1z"></path></svg>
                                             Please give your recommendation.</div>
                                        </div>
                                   </div>
                              </div>
                              <div class="col-12 col-lg-6">
                                   <div class="mb-3 d-flex align-items-center justify-content-between input-group d-grid">
                                        <label for="recipient-name" class="col-form-label" style="width: 100%; border-radius: 5px;"><span class="req-indicator">*</span>The good things</label>
                                        <textarea placeholder="Tell us the positive aspects of working at the company.." type="text" class="form-control fs-6" name="good_things" id="good-things" style="height: 150px; width: 100%; border-radius: 5px; margin: 0px;" required></textarea>
                                        <div class="invalid-feedback">
                                             <div class="d-flex align-items-center"><svg style="fill: red;" class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="zl0zcx0 _1ic2byb52 _1ic2byb5a ck0l5b1q _1m1w14z7 _1pmtdfh0 _1pmtdfh1 _1pmtdfh2" aria-hidden="true"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path><circle cx="12" cy="17" r="1"></circle><path d="M12 14c.6 0 1-.4 1-1V8c0-.6-.4-1-1-1s-1 .4-1 1v5c0 .6.4 1 1 1z"></path></svg>
                                             Tell us the positive aspects of working at the company</div>
                                        </div>
                                   </div>
                                   <div class="mb-3 d-flex align-items-center justify-content-between input-group d-grid">
                                        <label for="recipient-name" class="col-form-label" style="width: 100%; border-radius: 5px;"><span class="req-indicator">*</span>The challenges</label>
                                        <textarea placeholder="Tell us the challenges and difficulties of working at the company.." type="text" class="form-control fs-6" name="challenges" id="challenges" style="height: 150px; width: 100%; border-radius: 5px; margin: 0px;" required></textarea>
                                        <div class="invalid-feedback">
                                             <div class="d-flex align-items-center"><svg style="fill: red;" class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="zl0zcx0 _1ic2byb52 _1ic2byb5a ck0l5b1q _1m1w14z7 _1pmtdfh0 _1pmtdfh1 _1pmtdfh2" aria-hidden="true"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path><circle cx="12" cy="17" r="1"></circle><path d="M12 14c.6 0 1-.4 1-1V8c0-.6-.4-1-1-1s-1 .4-1 1v5c0 .6.4 1 1 1z"></path></svg>
                                             Tell us the challenges and difficulties of working at the company</div>
                                        </div>
                                   </div>
                                   <div class="mb-3 d-flex align-items-center justify-content-between input-group d-grid">
                                        <label for="recipient-name" class="col-form-label" style="width: 100%; border-radius: 5px;"><span class="req-indicator">*</span>Summarise your experience in one sentence</label>
                                        <textarea placeholder="Sum up your experience in one sentence.." type="text" class="form-control fs-6" name="experience" id="experience" style="height: 150px; width: 100%; border-radius: 5px; margin: 0px;" required></textarea>
                                        <div class="invalid-feedback">
                                             <div class="d-flex align-items-center"><svg style="fill: red;" class="me-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="zl0zcx0 _1ic2byb52 _1ic2byb5a ck0l5b1q _1m1w14z7 _1pmtdfh0 _1pmtdfh1 _1pmtdfh2" aria-hidden="true"><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path><circle cx="12" cy="17" r="1"></circle><path d="M12 14c.6 0 1-.4 1-1V8c0-.6-.4-1-1-1s-1 .4-1 1v5c0 .6.4 1 1 1z"></path></svg>
                                             Sum up your experience in one sentence</div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="modal-footer">
                              <div class="d-flex justify-content-between align-items-center w-100 row">
                                   <div class="col-12 col-lg-10 alert alert-warning mb-0 p-2" style="font-size: 14px;" role="alert">
                                        <strong>Note:</strong> You can submit only one review, and it cannot be edited once submitted. Make sure to provide accurate and thoughtful feedback.
                                   </div>
                                   <div class="col-12 col-lg-2 mt-3 mt-lg-0 d-flex justify-content-end">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="ms-2 btn btn-primary">Submit</button>
                                   </div>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>

     <?php require "../common/footer-inside-folder.php"; ?>
     <?php require "../common/message-session.php"; ?>
     <script src="../js/remove-url-session.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <script>
          const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
          const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
     </script>


     <!-- withdraw job -->
     <script>
          $(document).ready(function() {
          // Add a click event handler to the SVG with the id "save-job"
          $('.withdraw-now').on('click', function() {
               // Retrieve attribute values
               var jobListingId = $(this).attr('job-listing-id');
               var jobSeekerId = $(this).attr('job-seeker-id');
               var employerId = $(this).attr('employer-id');
               
               // Prepare data to send to the server
               var data = {
                    jobListingId: jobListingId,
                    jobSeekerId: jobSeekerId,
                    employerId: employerId
               };
               
               // Send an Ajax request to save the data
               $.ajax({
                    type: 'POST',
                    url: '../function/withdraw-job-listing.php', // Replace with the URL to your server-side script
                    data: data,
                    success: function(response) {
                         console.log(response);
                    },
                    error: function() {
                         // Handle errors if the request fails
                         console.error('Ajax request failed');
                    }
               });
          });
          });
     </script>

     <!-- validate form -->
     <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (() => {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          const forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.from(forms).forEach(form => {
          form.addEventListener('submit', event => {
               if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
               }

               form.classList.add('was-validated')
          }, false)
          })
          })()
     </script>

     <script>
          function initializeStarRating(ratingId, inputId) {
               const starContainer = document.getElementById(ratingId);
               const stars = starContainer.querySelectorAll('.star');
               let selectedValue = 0;

               stars.forEach((star, index) => {
                    star.addEventListener('mouseover', () => {
                         const hoverValue = star.getAttribute('data-value');

                         // Fill stars up to the hovered one
                         stars.forEach((s, i) => {
                              s.classList.remove('filled');
                              if (i < hoverValue) {
                              s.classList.add('filled');
                              }
                         });
                    });

                    star.addEventListener('mouseout', () => {
                         // Remove 'filled' class from all stars when not hovering
                         stars.forEach((s, i) => {
                              s.classList.remove('filled');
                              if (i < selectedValue) {
                              s.classList.add('filled');
                              }
                         });
                    });

                    star.addEventListener('click', () => {
                         selectedValue = star.getAttribute('data-value');

                         // Remove 'filled' class from all stars
                         stars.forEach((s, i) => {
                              s.classList.remove('filled');
                              if (i < selectedValue) {
                              s.classList.add('filled');
                              }
                         });

                         // Set the value of the input
                         document.getElementById(inputId).value = selectedValue;
                    });
               });
          }

          // Initialize each star rating
          initializeStarRating('review-stars-1', 'star-review-1');
          initializeStarRating('review-stars-2', 'star-review-2');
          initializeStarRating('review-stars-3', 'star-review-3');
          initializeStarRating('review-stars-4', 'star-review-4');
          initializeStarRating('review-stars-5', 'star-review-5');
          initializeStarRating('review-stars-6', 'star-review-6');
          initializeStarRating('review-stars-7', 'star-review-7');
     </script>


     <!-- pass values to review modal -->
     <script>
          const exampleModal = document.getElementById('exampleModalToggle2')
          if (exampleModal) {
               exampleModal.addEventListener('show.bs.modal', event => {
               const button = event.relatedTarget
               const companyName = button.getAttribute('company-name')
               const jobListingId = button.getAttribute('job-listing-id')
               const jobSeekerId = button.getAttribute('job-seeker-id')
               const employerId = button.getAttribute('employer-id')
               

               // Update the modal's content.
               const modalTitle = exampleModal.querySelector('.modal-title')
               const jobListingIdInput = exampleModal.querySelector('.modal-body input[name="jobListingId"]')
               const jobSeekerIdInput = exampleModal.querySelector('.modal-body input[name="jobSeekerId"]')
               const employerIdInput = exampleModal.querySelector('.modal-body input[name="employerId"]')

               modalTitle.textContent = `Rate working at ${companyName}`
               jobListingIdInput.value = jobListingId;
               jobSeekerIdInput.value = jobSeekerId;
               employerIdInput.value = employerId;
               })
          }
     </script>
</body>
</html>

  