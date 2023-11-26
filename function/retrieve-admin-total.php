<?php
session_start();
include "../database/conn.php";

$job_listing_ID = $_GET['j'];

// Define an array of queries with placeholders
$queries = [
     'SELECT COUNT(jobseeker_ID) AS total_jobseeker FROM JOB_SEEKER_SIGNUP_INFO;',
     'SELECT COUNT(company_ID) AS total_employer FROM EMPLOYER_SIGNUP_INFO;',
     'SELECT COUNT(job_id) AS total_joblisting FROM JOB_LISTING;'
];

// Initialize variables to store counts
$total_jobseeker = 0;
$total_employer = 0;
$total_joblisting = 0;

foreach ($queries as $key => $query) {
     $stmt = mysqli_prepare($conn, $query);

     if ($stmt) {

          if (mysqli_stmt_execute($stmt)) {
               $result = mysqli_stmt_get_result($stmt);

               if ($result) {
                    $row = mysqli_fetch_assoc($result);

                    // Assign the counts to the respective variables
                    switch ($key) {
                         case 0:
                              $total_jobseeker = $row['total_jobseeker'];
                              break;
                         case 1:
                              $total_employer = $row['total_employer'];
                              break;
                         case 2:
                              $total_joblisting = $row['total_joblisting'];
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