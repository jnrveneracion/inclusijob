<?php
     session_start();

     include "../database/conn.php";

     // this query have the condition to hide the jobs applied by the job seeker
     // $query = "SELECT *,
     //                DATE_FORMAT(JL.date_added, '%Y-%m-%d') AS joblisting_date_added,
     //                DATE_FORMAT(JL.date_added, '%M %d, %Y') AS joblisting_date_added_word,
     //                DATE_FORMAT(JL.application_deadline, '%M %d, %Y') AS application_deadline_word,
     //                JL.trash AS trashed
     //           FROM JOB_LISTING AS JL
     //           LEFT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID
     //           WHERE JL.employer_ID = '$company_ID' AND JL.trash = 0
     //           ORDER BY JL.date_added ASC;";

     $query = "SELECT JL.*, ESI.* , COUNT(JAS.application_status_ID) AS application_count,
                    DATE_FORMAT(JL.date_added, '%Y-%m-%d') AS joblisting_date_added,
                    DATE_FORMAT(JL.date_added, '%M %d, %Y') AS joblisting_date_added_word,
                    DATE_FORMAT(JL.application_deadline, '%M %d, %Y') AS application_deadline_word,
                    JL.trash AS trashed
               FROM JOB_LISTING AS JL
				LEFT JOIN JOB_APPLICATION_STATUS AS JAS ON JL.job_id = JAS.job_ID
               RIGHT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID
               WHERE JL.employer_ID = '$company_ID' AND JL.trash = 0
               GROUP BY JL.job_id, JL.job_title
               ORDER BY JL.date_added ASC;";

     $stmt = mysqli_prepare($conn, $query);

     if ($stmt === false) {
          echo "Error: " . mysqli_error($conn);
     } else {
          if (mysqli_stmt_execute($stmt)) {
               $result = mysqli_stmt_get_result($stmt);
               // Check if there are records
               if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                         $trashStatus = ($row['trashed'] === 1) ? 'trashed' : 'not';

                         echo '<div class="col-10 col-lg-9">
                                   <div class="listing-item job-listing row" institution-name="' . $row['joblisting_date_added'] . '" this-is="'. $trashStatus .'">
                                        <div class="col-2 col-xl-1 mb-lg-0 mb-3 p-0 d-flex align-items-center justify-content-center">
                                             <div class="d-block">
                                                  <h4 class="animate-count mb-0 text-center">'. $row['application_count'] .'</h4>
                                                  <p class="ms-0 mb-0 text-center" style="font-size: 10px;"><span class="fw-bold">Applicant' . ($row['application_count'] === 1 ? "" : "s") . '</span></p>
                                             </div>
                                        </div>
                                        <div class="col-10 col-xl-6 mb-lg-0 mb-3 p-0 ps-2" style="border-left: 2px solid rgb(196, 196, 196);">
                                             <h5 class="mb-0">' . $row['job_title'] . '</h5>
                                             <div class="d-block d-lg-flex">
                                                  <p class="mb-0" style="font-size: 12px;"><span class="fw-bold">Date posted</span>: '. $row['joblisting_date_added_word'] .'</p>
                                                  <p class="mb-0 ms-0 ms-lg-2" style="font-size: 12px;"><span class="fw-bold">Application deadline</span>: '. (!empty($row['application_deadline_word']) ? $row['application_deadline_word'] : 'no deadline set') .'</p>
                                                  <p class="d-none">'. $row['job_description'] .' - '. $row['qualifications'] .' - '. $row['job_location'] .' - '. $row['employment_type'] .' - '. $row['benefits'] .'</p>
                                             </div>
                                        </div>
                                        <div class="col-12 col-xl-5 d-flex justify-content-end align-items-center p-0">
                                             <a href="job-application-review.php?j=' . $row['job_id'] . '" class="btn-job-listing review">Application Review<svg class="ms-2" style="fill: white;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"/></svg></a>
                                             <a href="view-job-listing-details.php?j=' . $row['job_id'] . '" class="btn-job-listing view">Manage<svg class="ms-2" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" style="fill:#ffffff"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z"/></svg></a>
                                        </div>
                                   </div>
                              </div>';
                    }
               } else {
                    echo '   <div>
                               <a href="create-job-listing.php" class=" col-12 d-flex justify-content-center">
                                   <div class="status-text d-flex justify-content-center">
                                        No job listing yet. Click here to add job listing.
                                   </div>
                              </a>
                              </div>';
               }
          } else {
               echo "Error: " . mysqli_error($conn);
          }

          // Close the prepared statement
          mysqli_stmt_close($stmt);
     }

     mysqli_close($conn);
?>