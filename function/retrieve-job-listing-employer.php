<?php
     session_start();

     include "../database/conn.php";

     // this query have the condition to hide the jobs applied by the job seeker
     $query = "SELECT *,
                    DATE_FORMAT(JL.date_added, '%Y-%m-%d') AS joblisting_date_added,
                    DATE_FORMAT(JL.date_added, '%M %d, %Y') AS joblisting_date_added_word,
                    DATE_FORMAT(JL.application_deadline, '%M %d, %Y') AS application_deadline_word
               FROM JOB_LISTING AS JL
               LEFT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID
               WHERE JL.employer_ID = '$company_ID'
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
                         echo '<div class="col-10 col-lg-9">
                                   <div class="listing-item job-listing row" institution-name="' . $row['joblisting_date_added'] . '">
                                        <div class="col-12 col-lg-8 mb-lg-0 mb-3 p-0">
                                             <h5 class="mb-0">' . $row['job_title'] . '</h5>
                                             <div class="d-block d-lg-flex">
                                                  <p class="mb-0" style="font-size: 12px;"><span class="fw-bold">Date posted</span>: '. $row['joblisting_date_added_word'] .'</p>
                                                  <p class="mb-0 ms-0 ms-lg-2" style="font-size: 12px;"><span class="fw-bold">Application deadline</span>: '. (!empty($row['application_deadline_word']) ? $row['application_deadline_word'] : 'no deadline set') .'</p>
                                                  <p class="d-none">'. $row['job_description'] .' - '. $row['qualifications'] .' - '. $row['job_location'] .' - '. $row['employment_type'] .' - '. $row['benefits'] .'</p>
                                             </div>
                                        </div>
                                        <div class="col-12 col-lg-4 d-flex justify-content-end align-items-center p-0">
                                             <a href="view-job-listing-details.php?j=' . $row['job_id'] . '" target="_blank" class="btn-job-listing view">Manage<svg class="ms-2" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" style="fill:#ffffff"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z"/></svg></a>
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