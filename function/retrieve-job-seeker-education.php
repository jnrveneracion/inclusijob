<?php
     session_start();

     include "../database/conn.php";

     // Retrieve user data based on jobseeker_ID
     $jobseeker_ID = $_SESSION['jobseeker_ID'];

     // Create a prepared statement to select data
     $query = "SELECT * FROM JOB_SEEKER_EDUCATION_INFO WHERE jobseeker_ID = ? ORDER BY start_year ASC;";
     $stmt = mysqli_prepare($conn, $query);

     if ($stmt === false) {
          echo "Error: " . mysqli_error($conn);
     } else {
          // Bind the jobseeker_ID parameter
          mysqli_stmt_bind_param($stmt, "i", $jobseeker_ID);

          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               $result = mysqli_stmt_get_result($stmt);

               // Fetch and store each column's value in PHP variables
               while ($row = mysqli_fetch_assoc($result)) {        
                    $start_year = $row['start_year'];
                    $grad_year = $row['graduation_year'];   
                    echo '<div class="col-12 col-xl-6 p-0">
                    <div class="info-body me-lg-2 me-0 ms-lg-2 me-2 ms-2 mt-lg-0 mt-3 mb-lg-3 mb-0" style="min-height: 190px;"> 
                         <p class="info-section p-0 m-0"><span class="info-data fs-4">' . $row['institution_name'] . '</span></p>
                         <p class="info-section p-0 m-0"><span class="info-label">School degree: </span><span class="info-data">' . $row['school_degree'] . '</span></p>
                         <p class="info-section p-0 m-0"><span class="info-label">Field of study: </span><span class="info-data">' . $row['field_of_study'] . '</span></p>
                         <p class="info-section p-0 m-0 ' . (empty(trim($start_year)) ? 'd-none' : 'd-block') . '"><span class="info-label">Start Year: </span><span class="info-data">' . $row['start_year'] . '</span></p>
                         <p class="info-section p-0 m-0 ' . (empty(trim($grad_year)) ? 'd-none' : 'd-block') . '"><span class="info-label">Graduation Year: </span><span class="info-data">' . $row['graduation_year'] . '</span></p>
                         <div class="d-flex justify-content-end" style="' . ((empty(trim($start_year)) or empty(trim($grad_year))) ? 'margin-top: -5px;' : 'margin-top: -30px;') . '">
                              <button id="del-button" type="button" class="text-danger" onclick="if (confirm(\'Are you certain that you wish to remove this educational record associated with ' . $row['institution_name'] . '?\')) { window.location = \'../function/delete-job-seeker-education.php?jobseeker_ID=' . $jobseeker_ID . '&education_ID=' . $row['education_info_ID'] . '\'; }"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill: black; opacity: .3;} svg:hover { opacity: 1;}</style><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                              <button id="btn-outline-b" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#edit-education" education-id="' . $row['education_info_ID'] . '" institution-name="' . $row['institution_name'] . '" school-degree="' . $row['school_degree'] . '" field-of-study="' . $row['field_of_study'] . '" start-year="' . $row['start_year'] . '" grad-year="' . $row['graduation_year'] . '" highlights="' . $row['course_highlights'] . '" aria-controls="offcanvasExample" onclick="openSpecificModal(this)">Edit</button>
                         </div>
                    </div>
                    </div>';

                    
               }
          } else {
               echo "Error: " . mysqli_error($conn);
          }

          ?>
               
          <?php

          // Close the prepared statement
          mysqli_stmt_close($stmt);
     }

     mysqli_close($conn);
?>


