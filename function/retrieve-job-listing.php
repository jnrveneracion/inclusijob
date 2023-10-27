<?php
     session_start();

     include "../database/conn.php";

     // Retrieve user data based on jobseeker_ID
     $jobseeker_ID = $_SESSION['jobseeker_ID'];

     // Create a prepared statement to select data
     $query = "SELECT *, 
               DATE_FORMAT(JL.date_added, '%Y-%m-%d') AS joblisting_date_added, 
               DATE_FORMAT(JL.date_added, '%M %d, %Y') AS joblisting_date_added_word  
               FROM JOB_LISTING AS JL
               LEFT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID 
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

                        // Check if the content is longer than 300 characters
                    if (strlen($qualifications_content) > 270) {
                         $qualifications_content = substr($qualifications_content, 0, 270) . '.... <span style="font-weight: 600;">continue reading</span>';
                    }

                    echo '
                    <a class="job-listing-item" data-toggle="list" href="#item'. $itemCount .'" role="tab" date-posted="' . $row['joblisting_date_added'] . '">
                         <div>
                              <div class="row head-section">
                                   <div class="col-10 d-flex align-items-center">
                                        <div>
                                             <h4 class="m-0">' . $row['job_title'] . '</h4>
                                             <h5 class="m-0">' . $row['company_name'] . '</h5>
                                        </div>
                                   </div>
                                   <div class="col-2 d-flex justify-content-center align-items-start mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"/></svg>
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
          } else {
               echo "Error: " . mysqli_error($conn);
          }

          // Close the prepared statement
          mysqli_stmt_close($stmt);
     }

     mysqli_close($conn);
?>


