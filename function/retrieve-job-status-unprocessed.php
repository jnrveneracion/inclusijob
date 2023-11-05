<?php
session_start();
include "../database/conn.php";

$job_listing_ID = $_GET['j'];

$query = "SELECT *, 
               COUNT(JAS.application_status_ID) AS application_count,                    
               DATE_FORMAT(JL.date_added, '%Y-%m-%d') AS joblisting_date_added,
               DATE_FORMAT(JL.date_added, '%M %d, %Y') AS joblisting_date_added_word,
               DATE_FORMAT(JL.application_deadline, '%M %d, %Y') AS application_deadline_word
          FROM JOB_LISTING AS JL 
          LEFT JOIN JOB_APPLICATION_STATUS AS JAS ON JL.job_id = JAS.job_ID
          RIGHT JOIN EMPLOYER_SIGNUP_INFO AS ESI ON JL.employer_id = ESI.company_ID
          WHERE JL.job_id = ?;";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
     mysqli_stmt_bind_param($stmt, "i", $job_listing_ID);

     if (mysqli_stmt_execute($stmt)) {
          $result = mysqli_stmt_get_result($stmt);

          if ($result) {
               if ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="d-flex justify-content-between align-items-center bg-light candidate-section">
                              <div>
                                   <h4 class="mb-0">Janrie veneracion</h4>
                                   <div>
                                        <span class="head-txt">Most recent job</span>
                                        <span class="sub-txt">4 years</span>
                                   </div>
                                   <div>
                                        <span class="head-txt">Most recent Education</span>
                                        <span class="sub-txt">Field of study</span>
                                   </div>
                              </div>
                              <div class="d-flex justify-content-end align-items-center">
                                   <div class="btn-group">
                                        <a href="" class="btn-job-listing view d-flex align-items-center">Move to Under Review</a>
                                   </div>
                              </div>
                         </div>';
               } else {
                    echo "No data found for the given job ID.";
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

mysqli_close($conn);
?>