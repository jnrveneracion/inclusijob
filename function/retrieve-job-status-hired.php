<?php
session_start();
include "../database/conn.php";

$job_listing_ID = $_GET['j'];

$query = "WITH LongestEducation AS (
               SELECT
               JSEI.jobseeker_ID,
               MAX(JSEI.graduation_year - JSEI.start_year) AS longest_education_duration
               FROM JOB_SEEKER_EDUCATION_INFO AS JSEI
               GROUP BY JSEI.jobseeker_ID
          ),
          LongestCareer AS (
               SELECT
               JSCH.jobseeker_ID,
               MAX(JSCH.end_year - JSCH.start_year) AS longest_career_duration
               FROM JOB_SEEKER_CAREER_HISTORY AS JSCH
               GROUP BY JSCH.jobseeker_ID
          )

          SELECT
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
               LC.longest_career_duration, 
               (
                    SELECT GROUP_CONCAT(note SEPARATOR '; ') AS hired_notes
                    FROM HIRED_NOTES
                    WHERE jobseeker_ID = JSSI.jobseeker_ID
               ) AS hired_notes
          FROM JOB_LISTING AS JL
          JOIN JOB_APPLICATION_STATUS AS JAS
               ON JL.job_id = JAS.job_ID
               AND JAS.applied = 1
               AND JAS.under_review = 1
               AND (JAS.shortlisted = 1 OR JAS.shortlisted IS NULL) 
               AND (JAS.interview = 1 OR JAS.interview IS NULL) 
               AND JAS.rejected IS NULL 
               AND JAS.hired = 1 
               AND JAS.withdraw_job IS NULL
          JOIN JOB_SEEKER_SIGNUP_INFO AS JSSI
               ON JAS.jobseeker_ID = JSSI.jobseeker_ID
          JOIN LongestEducation AS LE
               ON JSSI.jobseeker_ID = LE.jobseeker_ID
          LEFT JOIN JOB_SEEKER_EDUCATION_INFO AS JSEI
               ON JSEI.jobseeker_ID = LE.jobseeker_ID
               AND LE.longest_education_duration = JSEI.graduation_year - JSEI.start_year
          JOIN EMPLOYER_SIGNUP_INFO AS ESI
               ON JL.employer_id = ESI.company_ID
          JOIN LongestCareer AS LC
               ON JSSI.jobseeker_ID = LC.jobseeker_ID
          LEFT JOIN JOB_SEEKER_CAREER_HISTORY AS JSCH
               ON JSEI.jobseeker_ID = JSCH.jobseeker_ID
               AND LC.longest_career_duration = JSCH.end_year - JSCH.start_year   
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
                    $showNoData = !empty($row['fName']) ? '' : '<div class="d-flex justify-content-center mt-2"><div>0 interview candidates</div></div>';
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
                                   <button type="button" hired-notes="' . $row['hired_notes'] . '" job-seeker-fullname="' . $row['fName'] . ' ' . $row['mName'] . ' ' . $row['lName'] . '" job-listing-id="' . $job_listing_ID . '" job-seeker-id="' . $row['JSI'] . '" company-id="' . $row['compID'] . '" data-bs-toggle="modal" data-bs-target="#add-hired-note" class="btn-job-listing update d-flex align-items-center"  aria-controls="offcanvasExample" onclick="openAddHiredNote(this)">Hired Note</button>
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