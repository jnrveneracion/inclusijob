<?php
session_start();
include "database/conn.php";

$job_listing_ID = $_GET['j'];

// Define an array of queries with placeholders
$queries = [
     'SELECT COUNT(JAS.application_status_ID) AS applied_status_count 
          FROM JOB_APPLICATION_STATUS AS JAS
     WHERE JAS.applied = 1;',
     'SELECT COUNT(JAS.application_status_ID) AS shortlisted_status_count 
          FROM JOB_APPLICATION_STATUS AS JAS
     WHERE JAS.shortlisted = 1;',
     'SELECT COUNT(JAS.application_status_ID) AS interview_status_count 
          FROM JOB_APPLICATION_STATUS AS JAS
     WHERE JAS.interview = 1;',
     'SELECT COUNT(JAS.application_status_ID) AS hired_status_count 
          FROM JOB_APPLICATION_STATUS AS JAS
     WHERE JAS.hired = 1;',
     'SELECT DISTINCT 
          COUNT(job_title) AS job_title_count 
          FROM JOB_LISTING;'
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

          if (mysqli_stmt_execute($stmt)) {
               $result = mysqli_stmt_get_result($stmt);

               if ($result) {
                    $row = mysqli_fetch_assoc($result);
                    $job_title_count = $row['job_title_count'];

                    // Assign the counts to the respective variables
                    switch ($key) {
                         case 0:
                              $applied_status_count = $row['applied_status_count'];
                              break;
                         case 1:
                              $shortlisted_status_count = $row['shortlisted_status_count'];
                              break;
                         case 2:
                              $interview_status_count = $row['interview_status_count'];
                              break;
                         case 3:
                              $hired_status_count = $row['hired_status_count'];
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