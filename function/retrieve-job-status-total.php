<?php
session_start();
include "../database/conn.php";

$job_listing_ID = $_GET['j'];

// Define an array of queries with placeholders
$queries = [
     'SELECT COUNT(JAS.application_status_ID) AS applied_status_count FROM JOB_LISTING AS JL LEFT JOIN JOB_APPLICATION_STATUS AS JAS ON JL.job_id = JAS.job_ID AND JAS.applied = 1 AND JAS.under_review IS NULL AND JAS.shortlisted IS NULL AND JAS.interview IS NULL AND JAS.rejected IS NULL AND JAS.hired IS NULL AND JAS.withdraw_job IS NULL RIGHT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID WHERE JL.job_id = ?;',
     'SELECT COUNT(JAS.application_status_ID) AS under_review_status_count FROM JOB_LISTING AS JL LEFT JOIN JOB_APPLICATION_STATUS AS JAS ON JL.job_id = JAS.job_ID AND JAS.applied = 1 AND JAS.under_review = 1 AND JAS.shortlisted IS NULL AND JAS.interview IS NULL AND JAS.rejected IS NULL AND JAS.hired IS NULL AND JAS.withdraw_job IS NULL RIGHT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID WHERE JL.job_id = ?;',
     'SELECT COUNT(JAS.application_status_ID) AS shortlisted_status_count FROM JOB_LISTING AS JL LEFT JOIN JOB_APPLICATION_STATUS AS JAS ON JL.job_id = JAS.job_ID AND JAS.applied = 1 AND JAS.under_review = 1 AND JAS.shortlisted = 1 AND JAS.interview IS NULL AND JAS.rejected IS NULL AND JAS.hired IS NULL AND JAS.withdraw_job IS NULL RIGHT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID WHERE JL.job_id = ?;',
     'SELECT COUNT(JAS.application_status_ID) AS interview_status_count FROM JOB_LISTING AS JL LEFT JOIN JOB_APPLICATION_STATUS AS JAS ON JL.job_id = JAS.job_ID AND JAS.applied = 1 AND JAS.under_review = 1 AND (JAS.shortlisted = 1 OR JAS.shortlisted IS NULL) AND JAS.interview = 1 AND JAS.rejected IS NULL AND JAS.hired IS NULL AND JAS.withdraw_job IS NULL RIGHT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID WHERE JL.job_id = ?;',
     'SELECT COUNT(JAS.application_status_ID) AS rejected_status_count FROM JOB_LISTING AS JL LEFT JOIN JOB_APPLICATION_STATUS AS JAS ON JL.job_id = JAS.job_ID AND JAS.applied = 1 AND JAS.under_review = 1 AND JAS.shortlisted IS NULL AND JAS.interview IS NULL AND JAS.rejected = 1 AND JAS.hired IS NULL AND JAS.withdraw_job IS NULL RIGHT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID WHERE JL.job_id = ?;',
     'SELECT COUNT(JAS.application_status_ID) AS hired_status_count FROM JOB_LISTING AS JL LEFT JOIN JOB_APPLICATION_STATUS AS JAS ON JL.job_id = JAS.job_ID AND JAS.applied = 1 AND JAS.under_review = 1 AND (JAS.shortlisted = 1 OR JAS.shortlisted IS NULL) AND (JAS.interview = 1 OR JAS.interview IS NULL) AND JAS.rejected IS NULL AND JAS.hired = 1 AND JAS.withdraw_job IS NULL RIGHT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID WHERE JL.job_id = ?;',
     'SELECT COUNT(JAS.application_status_ID) AS withdraw_status_count FROM JOB_LISTING AS JL LEFT JOIN JOB_APPLICATION_STATUS AS JAS ON JL.job_id = JAS.job_ID AND JAS.applied = 1 AND (JAS.under_review = 1 OR JAS.under_review IS NULL) AND (JAS.shortlisted = 1 OR JAS.shortlisted IS NULL) AND (JAS.interview = 1 OR JAS.interview IS NULL) AND JAS.rejected IS NULL AND JAS.hired = 1 AND JAS.withdraw_job = 1 RIGHT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID WHERE JL.job_id = ?;'
];

// Initialize variables to store counts
$applied_status_count = 0;
$under_review_status_count = 0;
$shortlisted_status_count = 0;
$interview_status_count = 0;
$rejected_status_count = 0;
$hired_status_count = 0;
$withdraw_status_count = 0;

foreach ($queries as $key => $query) {
     $stmt = mysqli_prepare($conn, $query);

     if ($stmt) {
          mysqli_stmt_bind_param($stmt, "i", $job_listing_ID);

          if (mysqli_stmt_execute($stmt)) {
               $result = mysqli_stmt_get_result($stmt);

               if ($result) {
                    $row = mysqli_fetch_assoc($result);

                    // Assign the counts to the respective variables
                    switch ($key) {
                         case 0:
                              $applied_status_count = $row['applied_status_count'];
                              break;
                         case 1:
                              $under_review_status_count = $row['under_review_status_count'];
                              break;
                         case 2:
                              $shortlisted_status_count = $row['shortlisted_status_count'];
                              break;
                         case 3:
                              $interview_status_count = $row['interview_status_count'];
                              break;
                         case 4:
                              $rejected_status_count = $row['rejected_status_count'];
                              break;
                         case 5:
                              $hired_status_count = $row['hired_status_count'];
                              break;
                         case 6:
                              $withdraw_status_count = $row['withdraw_status_count'];
                              break;
                    }
               } else {
                    echo "Error: " . mysqli_error($conn);
               }
          } else {
               echo "Error: " . mysqli_error($conn);
          }

          // Close the prepared statement
          mysqli_stmt_close($stmt);
     } else {
          echo "Error in preparing the SQL statement:";
     }
}

mysqli_close($conn);

?>