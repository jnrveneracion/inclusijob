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
               LC.longest_career_duration
          FROM JOB_LISTING AS JL
          LEFT JOIN JOB_APPLICATION_STATUS AS JAS
               ON JL.job_id = JAS.job_ID
               AND JAS.applied = 1
               AND JAS.under_review IS NULL
               AND JAS.shortlisted IS NULL
               AND JAS.interview IS NULL
               AND JAS.rejected IS NULL
               AND JAS.hired IS NULL
               AND JAS.withdraw_job IS NULL
          LEFT JOIN JOB_SEEKER_SIGNUP_INFO AS JSSI
               ON JAS.jobseeker_ID = JSSI.jobseeker_ID
          LEFT JOIN LongestEducation AS LE
               ON JSSI.jobseeker_ID = LE.jobseeker_ID
          LEFT JOIN JOB_SEEKER_EDUCATION_INFO AS JSEI
               ON JSEI.jobseeker_ID = LE.jobseeker_ID
               AND LE.longest_education_duration = JSEI.graduation_year - JSEI.start_year
          LEFT JOIN EMPLOYER_SIGNUP_INFO AS ESI
               ON JL.employer_id = ESI.company_ID
          LEFT JOIN LongestCareer AS LC
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
                    $showNoData = !empty($row['fName']) ? '' : '<div class="d-flex justify-content-center mt-2"><div>0 Under review candidates</div></div>';
                    $showPrevCareer = !empty($row['company']) ? '' . $row['company'] . ' (' . $row['longest_career_duration'] . ' yrs)' : '-';

                    echo $showNoData;
                    echo '<div class="' . $showList . ' justify-content-between align-items-center bg-light candidate-section">
                              <div class="">
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
                                        <form id="move-under-review-form" action="../function/move-to-under-review.php" method="POST">
                                             <input type="hidden" name="jobSeekerName" value="' . $row['fName'] . '">
                                             <input type="hidden" name="employerId" value="' . $row['compID'] . '">
                                             <input type="hidden" name="jobSeekerId" value="' . $row['JSI'] . '">
                                             <input type="hidden" name="jobListingId" value="' . $job_listing_ID . '">
                                             <button type="submit" class="btn-job-listing view d-flex align-items-center">Move to Under Review</button>
                                        </form>
                                   </div>
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