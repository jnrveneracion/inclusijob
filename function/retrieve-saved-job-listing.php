<?php
     session_start();

     include "../database/conn.php";

     // Retrieve user data based on jobseeker_ID
     $jobseeker_ID = $_SESSION['jobseeker_ID'];

     // Create a prepared statement to select data
     $query = "SELECT *, 
               DATE_FORMAT(JL.date_added, '%Y-%m-%d') AS joblisting_date_added, 
               DATE_FORMAT(JL.date_added, '%M %d, %Y') AS joblisting_date_added_word,
               DATE_FORMAT(JL.application_deadline, '%M %d, %Y') AS application_deadline_word  
               FROM JOB_LISTING AS JL
               LEFT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID 
               LEFT JOIN SAVED_JOB_LISTING AS SJL ON JL.job_id = SJL.job_listing_id
               WHERE SJL.jobseeker_ID = '$jobseeker_ID'
               ORDER BY JL.date_added ASC;"; 

     $stmt = mysqli_prepare($conn, $query);

     if ($stmt === false) {
          echo "Error: " . mysqli_error($conn);
     } else {

          if (mysqli_stmt_execute($stmt)) {
               $result = mysqli_stmt_get_result($stmt);

               $itemCount = 1;
               // Fetch and store each column's value in PHP variables
               while ($row = mysqli_fetch_assoc($result)) { 
                    $qualifications_content = $row['qualifications'];   
                    $class = ($itemCount == 1) ? 'active' : ''; 

                        // Check if the content is longer than 300 characters
                    if (strlen($qualifications_content) > 270) {
                         $qualifications_content = substr($qualifications_content, 0, 270) . '.... <span style="font-weight: 600;">continue reading</span>';
                    }

                    echo '
                    <a class="job-listing-item '. $class . '" data-toggle="list" href="#item'. $itemCount .'" role="tab" date-posted="' . $row['joblisting_date_added'] . '">
                         <div>
                              <div class="row head-section">
                                   <div class="col-10 d-flex align-items-center">
                                        <div>
                                             <h4 class="m-0">' . $row['job_title'] . '</h4>
                                             <h5 class="m-0">' . $row['company_name'] . '</h5>
                                        </div>
                                   </div>
                                   <div class="col-2 d-flex justify-content-center align-items-start mt-1">
                                        <div class="svg-container">
                                             <svg class="unsave-job second-svg d-block" onclick="toggleUnSave('. $itemCount .')" id="unsave-job-'. $itemCount .'" job-listing-id="'. $row['job_id'] .'" job-seeker-id="'. $_SESSION['jobseeker_ID'] .'" employer-id="'. $row['employer_id'] .'" xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 384 512"><path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/></svg>
                                        </div>
                                   </div>
                              </div>
                              <div>
                                   <div class="d-flex align-items-center">
                                        <svg style="fill: black; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1uznlpf0 _1uvwke522 _1m9vd2q56 _1m9vd2q5e _1n6dj3h0 _1n6dj3h2 _1n6dj3h3 _1n6dj3h4" aria-hidden="true"><path d="M12 1C7.6 1 4 4.6 4 9c0 4.1 6.5 12.6 7.2 13.6.2.2.5.4.8.4s.6-.1.8-.4c.7-1 7.2-9.5 7.2-13.6 0-4.4-3.6-8-8-8zm0 19.3c-2.2-3-6-8.8-6-11.3 0-3.3 2.7-6 6-6s6 2.7 6 6c0 2.5-3.8 8.3-6 11.3z"></path><path d="M12 5c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3zm0 4c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1z"></path></svg>
                                        <span class="ms-1">' . $row['job_location'] . '</span>
                                   </div>
                                   <div>
                                        <h6 class="mb-0 mt-2">Qualifications:</h6>
                                        <div class="qualifications-div">
                                             <p style="font-size: 14px;">' . $qualifications_content . '</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                             <div class="d-flex align-items-center mt-3">
                                                  <h6 class="mb-0">Posted: </h6><p class="m-0" style="font-size: 14px;">&nbsp;' . $row['joblisting_date_added_word'] . '</p>
                                             </div>
                                             <div class="d-flex align-items-center mt-3 ms-2">
                                                  <h6 class="mb-0">Job type:</h6><p class="m-0" style="font-size: 14px;">&nbsp;' . $row['employment_type'] . '</p>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </a>
                    ';
                 $itemCount++;   
               }

               echo'
                    </div>
               </div>

               <!-- Second Column (Info) -->
               <div class="col-lg-8 ps-1 pe-1" id="second-column">
                    <div class="tab-content sticky" id="item-content">
               ';
               mysqli_data_seek($result, 0); 

               $itemCount2 = 1;
               while ($row = mysqli_fetch_assoc($result)) { 
                    $class = ($itemCount2 == 1) ? 'show active' : '';
                    $compensation = $row['compensation'];
                    $startCompensation = $row['start_compensation'];
                    $endCompensation = $row['end_compensation'];
                    

                    $applicationDeadlineRow = $row['application_deadline'];
                    $jobBenefitsRow = $row['benefits'];
                    $workEnvironmentRow = $row['work_environment'];

                    $salaryStatement = (!empty($startCompensation) && !empty($endCompensation))
                    ? '<span class="ms-1 fs-5">' . $startCompensation . '-' . $endCompensation . ' ' . $row['compensation_frequency'] . '</span>'
                    : '<span class="ms-1 fs-5">' . $compensation . ' ' . $row['compensation_frequency'] . '</span>';

                    $applicationDeadline = (!empty($applicationDeadlineRow)) ? 'd-block' : 'd-none';
                    $jobBenefits = (!empty($jobBenefitsRow)) ? 'd-block' : 'd-none';
                    $workEnvironment = (($workEnvironmentRow === 1)) ? 'd-block' : 'd-none';


                    echo '
                         <div class="listing-details tab-pane fade '. $class .'" id="item'. $itemCount2 .'" role="tabpanel">
                              <div>
                                   <div class="row head-section">
                                        <div class="col-7 d-flex align-items-center">
                                             <div>
                                                  <h1 class="m-0">' . $row['job_title'] . '</h1>
                                                  <h3 class="m-0">' . $row['company_name'] . '</h3>
                                             </div>
                                        </div>
                                        <div class="col-4 d-flex justify-content-end align-items-center">
                                             <button type="button" class="fw-bold" id="apply-btn">Apply now</button>
                                        </div>
                                        <div class="col-1 d-flex justify-content-start align-items-center">
                                             <svg class="unsave-job second-svg d-block" onclick="toggleUnSave('. $itemCount .')" id="unsave-job-'. $itemCount .'" job-listing-id="'. $row['job_id'] .'" job-seeker-id="'. $_SESSION['jobseeker_ID'] .'" employer-id="'. $row['employer_id'] .'" xmlns="http://www.w3.org/2000/svg" height="2.5em" viewBox="0 0 384 512"><path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/></svg>
                                        </div>
                                   </div>
                                   <div>
                                        <div class="align-items-center">
                                             <div class="d-flex align-items-center mt-1 mb-1">
                                                  <svg style="fill: black; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1uznlpf0 _1uvwke522 _1m9vd2q56 _1m9vd2q5e _1n6dj3h0 _1n6dj3h2 _1n6dj3h3 _1n6dj3h4" aria-hidden="true"><path d="M12 1C7.6 1 4 4.6 4 9c0 4.1 6.5 12.6 7.2 13.6.2.2.5.4.8.4s.6-.1.8-.4c.7-1 7.2-9.5 7.2-13.6 0-4.4-3.6-8-8-8zm0 19.3c-2.2-3-6-8.8-6-11.3 0-3.3 2.7-6 6-6s6 2.7 6 6c0 2.5-3.8 8.3-6 11.3z"></path><path d="M12 5c-1.7 0-3 1.3-3 3s1.3 3 3 3 3-1.3 3-3-1.3-3-3-3zm0 4c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1z"></path></svg>
                                                  <span class="ms-1 fs-5">' . $row['job_location'] . '</span>
                                             </div>
                                             <div class="d-flex align-items-center mt-1 mb-1">
                                                  <svg style="fill: black; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1wkzzau0 lnocuo22 a1msqi56 a1msqi5e jd63g10 jd63g12 jd63g13 jd63g14" aria-hidden="true"><path d="M9 6h2v2H9zm4 0h2v2h-2zm-4 4h2v2H9zm4 0h2v2h-2zm-4 4h2v2H9zm4 0h2v2h-2z"></path><path d="M17 2.2V2c0-.6-.4-1-1-1H8c-.6 0-1 .4-1 1v.2C5.9 2.6 5 3.7 5 5v16c0 .6.4 1 1 1h12c.6 0 1-.4 1-1V5c0-1.3-.9-2.4-2-2.8zM17 20h-3v-2h-4v2H7V5c0-.6.4-1 1-1h8c.6 0 1 .4 1 1v15z"></path></svg>
                                                  <span class="ms-1 fs-5">' . $row['industry_sector'] . '</span>
                                             </div>
                                             <div class="d-flex align-items-center mt-1 mb-1">
                                                  <svg style="fill: black; opacity: 1;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" xml:space="preserve" focusable="false" fill="currentColor" width="16" height="16" class="_1wkzzau0 lnocuo22 a1msqi56 a1msqi5e jd63g10 jd63g12 jd63g13 jd63g14" aria-hidden="true"><path d="M16.4 13.1 13 11.4V6c0-.6-.4-1-1-1s-1 .4-1 1v6c0 .4.2.7.6.9l4 2c.1.1.2.1.4.1.4 0 .7-.2.9-.6.2-.4 0-1-.5-1.3z"></path><path d="M12 1C5.9 1 1 5.9 1 12s4.9 11 11 11 11-4.9 11-11S18.1 1 12 1zm0 20c-5 0-9-4-9-9s4-9 9-9 9 4 9 9-4 9-9 9z"></path></svg>
                                                  <span class="ms-1 fs-5">' . $row['employment_type'] . '</span>
                                             </div>
                                             <div class="d-flex align-items-center mt-1 mb-1">
                                             <svg style="fill: black; opacity: .7;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z"/></svg>
                                                  <span class="ms-1 fs-5">'. $salaryStatement .'</span>
                                             </div>
                                             <div class="d-flex align-items-center mt-1">
                                                  <p class="mb-1 fw-light">Posted: ' . $row['joblisting_date_added_word'] . '</p>
                                             </div>
                                             <div class="d-flex align-items-center mb-1">
                                                  <p class="mb-1 fw-light '. $applicationDeadline .'">Application deadline: ' . $row['application_deadline_word'] . '</p>
                                             </div>
                                        </div>
                                        <div>
                                             <div>
                                                  <p style="font-size: 18px;">' . $row['company_description'] . '</p>
                                             </div>
                                                  <h6 class="mb-0 mt-2 fs-5">Job description:</h6>
                                             <div>
                                                  <p>' . $row['job_description'] . '</p>
                                             </div>
                                             <h6 class="mb-0 mt-2 fs-5">Qualifications:</h6>
                                             <div>
                                                  <p>' . $row['qualifications'] . '</p>
                                             </div>
                                             <h6 class="mb-0 mt-2 fs-5 '. $jobBenefits .'">Benefits:</h6>
                                             <div class="'. $jobBenefits .'">
                                                  <p>' . $row['benefits'] . '</p>
                                             </div>
                                             <h6 class="mb-0 mt-2 fs-5 '. $workEnvironment .'">Work environment:</h6>
                                             <div>
                                                  <p>' . $row['company_culture'] . '</p>
                                             </div>
                                             <h6 class="mb-0 mt-2 fs-5">Additional information:</h6>
                                             <div class="row">
                                                  <div class="col-12 col-lg-6">
                                                       <div class="d-flex align-items-center">
                                                            <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg>
                                                            <p class="ms-2 mb-1 mt-1><span style="font-weight: 500;">No. of employees:</span>&nbsp;'. $row['company_size'] .'</p>
                                                       </div>
                                                       <div class="d-flex align-items-center">
                                                            <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c15.1 0 28.5-6.9 37.3-17.8C340.4 462.2 320 417.5 320 368c0-54.7 24.9-103.5 64-135.8V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zM640 368a144 144 0 1 0 -288 0 144 144 0 1 0 288 0zm-76.7-43.3c6.2 6.2 6.2 16.4 0 22.6l-72 72c-6.2 6.2-16.4 6.2-22.6 0l-40-40c-6.2-6.2-6.2-16.4 0-22.6s16.4-6.2 22.6 0L480 385.4l60.7-60.7c6.2-6.2 16.4-6.2 22.6 0z"/></svg>
                                                            <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Year founded:</span>&nbsp;'. $row['founded_year'] .'</p>
                                                       </div>
                                                       <div class="d-flex align-items-center">
                                                            <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/></svg>
                                                            <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Address:</span>&nbsp;'. $row['company_address'] .'</p>
                                                       </div>
                                                       <div class="d-flex align-items-center">
                                                            <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                                                            <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Email:</span>'. $row['email'] .'</p>
                                                       </div>
                                                  </div>
                                                  <div class="col-12 col-lg-6">
                                                       <div class="d-flex align-items-center '. ((!empty($row['company_website'])) ? 'd-flex' : 'd-none') .'">
                                                            <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
                                                            <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Website:</span>'. $row['company_website'] .'</p>
                                                       </div>
                                                       <div class="d-flex align-items-center '. ((!empty($row['company_facebook'])) ? 'd-flex' : 'd-none') .'">
                                                            <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"/></svg>
                                                            <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Facebook:</span>'. $row['company_facebook'] .'</p>
                                                       </div>
                                                       <div class="d-flex align-items-center '. ((!empty($row['company_linkedin'])) ? 'd-flex' : 'd-none') .'">
                                                            <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>
                                                            <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Linkedin:</span>'. $row['company_linkedin'] .'</p>
                                                       </div>
                                                       <div class="d-flex align-items-center '. ((!empty($row['company_twitter'])) ? 'd-flex' : 'd-none') .'">
                                                            <svg style="fill: black; opacity: .6;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg>
                                                            <p class="ms-2 mb-1 mt-1"><span style="font-weight: 500;">Twitter:</span>'. $row['company_twitter'] .'</p>
                                                       </div>
                                                  </div>
                                             </div>     
                                        </div>
                                   </div>
                              </div>
                         </div>
                    ';
                 $itemCount2++;   
               }

          } else {
               echo "Error: " . mysqli_error($conn);
          }

          // Close the prepared statement
          mysqli_stmt_close($stmt);
     }

     mysqli_close($conn);
?>


