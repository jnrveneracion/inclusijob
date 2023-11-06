<?php
session_start();
include "../database/conn.php";

$job_listing_ID = $_GET['j'];

$query = "SELECT
          JAS.company_ID AS compID,
          JSSI.jobseeker_ID AS JSI,
          JSSI.firstname AS fName,
          JSSI.middlename AS mName,
          JSSI.lastname AS lName,
          JSEI.institution_name AS institution,
          JSEI.school_degree AS degree,
          JSEI.field_of_study AS field,
          JSCH.job_title AS prevJob,
          JSCH.company_name AS company,
          (
          SELECT MAX(graduation_year - start_year) AS longest_education_duration
          FROM JOB_SEEKER_EDUCATION_INFO
          WHERE jobseeker_ID = JSSI.jobseeker_ID
          ) AS longest_education_duration,
          (
          SELECT MAX(end_year - start_year) AS longest_career_duration
          FROM JOB_SEEKER_CAREER_HISTORY
          WHERE jobseeker_ID = JSSI.jobseeker_ID
          ) AS longest_career_duration
          FROM JOB_LISTING AS JL
          LEFT JOIN JOB_APPLICATION_STATUS AS JAS
          ON JL.job_id = JAS.job_ID
          AND JAS.applied = 1
          AND JAS.under_review = 1
          AND JAS.shortlisted IS NULL
          AND JAS.interview IS NULL
          AND JAS.rejected IS NULL
          AND JAS.hired IS NULL
          AND JAS.withdraw_job IS NULL
          LEFT JOIN JOB_SEEKER_SIGNUP_INFO AS JSSI
          ON JAS.jobseeker_ID = JSSI.jobseeker_ID
          LEFT JOIN JOB_SEEKER_EDUCATION_INFO AS JSEI
          ON JAS.jobseeker_ID = JSEI.jobseeker_ID
          RIGHT JOIN EMPLOYER_SIGNUP_INFO AS ESI
          ON JL.employer_id = ESI.company_ID
          LEFT JOIN JOB_SEEKER_CAREER_HISTORY AS JSCH
          ON JSSI.jobseeker_ID = JSCH.jobseeker_ID
          WHERE JL.job_id = ?
          GROUP BY JSSI.jobseeker_ID;";

$stmt = mysqli_prepare($conn, $query);

if ($stmt === false) {
     echo "Error: " . mysqli_error($conn);
} else {
     // Bind the job_listing_ID to the query
     mysqli_stmt_bind_param($stmt, "i", $job_listing_ID);

     if (mysqli_stmt_execute($stmt)) {
          $result = mysqli_stmt_get_result($stmt);

          // Check if there are records
          if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                    $showList = !empty($row['fName']) ? 'd-flex' : 'd-none';
                    $showNoData = !empty($row['fName']) ? '' : '<div class="d-flex justify-content-center mt-2"><div>0 Under review candidates</div></div>';
                    $showPrevCareer = !empty($row['company']) ? '' . $row['company'] . ' (' . $row['longest_career_duration'] . ' yrs)' : '-';

                    echo $showNoData;
                    echo '<div class="' . $showList . ' justify-content-between align-items-center bg-light candidate-section">
                              <div>
                                   <h4 class="mb-0">' . $row['fName'] . ' ' . $row['lName'] . '</h4>
                                   <div>
                                        <span class="head-txt">' . $row['prevJob'] . '</span>
                                        <span class="sub-txt">' . $showPrevCareer . '</span>
                                   </div>
                                   <div>
                                        <span class="head-txt">' . $row['field'] . '</span>
                                        <span class="sub-txt">' . $row['institution'] . ' - ' . $row['degree'] . '</span>
                                   </div>
                              </div>
                              <div class="d-flex justify-content-end align-items-center">
                                   <div class="btn-group">
                                        <button type="button" class="btn-job-listing view d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
                                        Move to <svg style="fill: white;" class="ms-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                                        </button>
                                        <ul class="dropdown-menu">
                                             <li>
                                                  <form id="move-under-review-form" action="../function/move-to-shortlisted.php" method="POST">
                                                       <input type="hidden" name="jobSeekerName" value="' . $row['fName'] . '">
                                                       <input type="hidden" name="employerId" value="' . $row['compID'] . '">
                                                       <input type="hidden" name="jobSeekerId" value="' . $row['JSI'] . '">
                                                       <input type="hidden" name="jobListingId" value="' . $job_listing_ID . '">
                                                       <button type="submit" class="dropdown-item d-flex align-items-center">Shortlisted</button>
                                                  </form>
                                             </li>
                                             <li>
                                                  <form id="move-under-review-form" action="../function/move-to-interview.php" method="POST">
                                                       <input type="hidden" name="tab" value="under-review">
                                                       <input type="hidden" name="jobSeekerName" value="' . $row['fName'] . '">
                                                       <input type="hidden" name="employerId" value="' . $row['compID'] . '">
                                                       <input type="hidden" name="jobSeekerId" value="' . $row['JSI'] . '">
                                                       <input type="hidden" name="jobListingId" value="' . $job_listing_ID . '">
                                                       <button type="submit" class="dropdown-item d-flex align-items-center">Interview</button>
                                                  </form>
                                             </li>
                                             <li>
                                                  <form id="move-under-review-form" action="../function/move-to-not-suitable.php" method="POST">
                                                       <input type="hidden" name="tab" value="under-review">
                                                       <input type="hidden" name="jobSeekerName" value="' . $row['fName'] . '">
                                                       <input type="hidden" name="employerId" value="' . $row['compID'] . '">
                                                       <input type="hidden" name="jobSeekerId" value="' . $row['JSI'] . '">
                                                       <input type="hidden" name="jobListingId" value="' . $job_listing_ID . '">
                                                       <button type="submit" class="dropdown-item d-flex align-items-center">Not suitable</button>
                                                  </form>
                                             </li>
                                        </ul>
                                   </div>
                                   <a href="" class="btn-job-listing view-jobseeker d-flex align-items-center">View Profile<svg class="ms-1" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" style="fill:#ffffff"><path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z"/></svg></a>
                              </div>
                         </div>';
               }
          } else {
               echo "<div class='d-flex justify-content-center mt-5'><div>0 Unprocessed Candidates</div></div>";
          }
     } else {
          echo "Error: " . mysqli_error($conn);
     }
}

// Close the prepared statement
mysqli_stmt_close($stmt);

mysqli_close($conn);
?>