<?php
     session_start();

     include "../database/conn.php";

     // this query have the condition to hide the jobs applied by the job seeker
     $query = "SELECT *,
                    DATE_FORMAT(JL.date_added, '%Y-%m-%d') AS joblisting_date_added,
                    DATE_FORMAT(JL.date_added, '%M %d, %Y') AS joblisting_date_added_word,
                    DATE_FORMAT(JL.application_deadline, '%M %d, %Y') AS application_deadline_word,
                    JL.trash AS trashed
               FROM JOB_LISTING AS JL
               LEFT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID
               WHERE JL.employer_ID = '$company_ID' AND JL.trash = 1
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
                                        <div class="col-12 col-lg-8 mb-lg-0 mb-3 p-0">
                                             <h5 class="mb-0">' . $row['job_title'] . '</h5>
                                             <div class="d-block d-lg-flex">
                                                  <p class="mb-0" style="font-size: 12px;"><span class="fw-bold">Date posted</span>: '. $row['joblisting_date_added_word'] .'</p>
                                                  <p class="mb-0 ms-0 ms-lg-2" style="font-size: 12px;"><span class="fw-bold">Application deadline</span>: '. (!empty($row['application_deadline_word']) ? $row['application_deadline_word'] : 'no deadline set') .'</p>
                                                  <p class="d-none">'. $row['job_description'] .' - '. $row['qualifications'] .' - '. $row['job_location'] .' - '. $row['employment_type'] .' - '. $row['benefits'] .'</p>
                                             </div>
                                        </div>
                                        <div class="col-12 col-lg-4 d-flex justify-content-end align-items-center p-0">
                                             <a href="#" job-listing-id="' . $row['job_id'] . '" class="btn-job-listing restore restore-btn d-flex align-items-center">Restore
                                                  <svg class="ms-1" style="fill: white;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3C140.6 6.8 151.7 0 163.8 0zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm192 64c-6.4 0-12.5 2.5-17 7l-80 80c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V408c0 13.3 10.7 24 24 24s24-10.7 24-24V273.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-4.5-4.5-10.6-7-17-7z"/></svg>
                                                  
                                             </a>
                                             <a href="#" job-listing-id="' . $row['job_id'] . '" class="btn-job-listing delete delete-btn d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" job-id="'. $job_ID .'">Delete
                                                  <svg class="ms-1" style="fill: white;" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                                  
                                             </a>
                                        </div>
                                   </div>
                              </div>';
                    }
               } else {
                    echo '   <div>
                               <a href="#" class=" col-12 d-flex justify-content-center">
                                   <div class="status-text d-flex justify-content-center">
                                        No trashed job yet.
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