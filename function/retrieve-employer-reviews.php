<?php
     session_start();

     include "../database/conn.php";
     $company_ID = $_GET['c'];

     // Create a prepared statement to select data
     $query = "SELECT
               (SELECT COUNT(*) FROM JOB_SEEKER_SIGNUP_INFO) AS total_job_seekers,
               SELECT COUNT(*) AS total_employers FROM EMPLOYER_SIGNUP_INFO;
               SELECT COUNT(*) AS total_job_listings FROM JOB_LISTING;
               SELECT COUNT(DISTINCT jobseeker_ID) AS total_hired_job_seekers FROM JOB_APPLICATION_STATUS WHERE hired = 1;
               SELECT COUNT(DISTINCT company_ID) AS total_companies_with_hired FROM JOB_APPLICATION_STATUS WHERE hired = 1;
               SELECT COUNT(*) AS total_saved_job_listings FROM SAVED_JOB_LISTING;
               SELECT
                    SUM(applied) AS total_applied,
                    SUM(under_review) AS total_under_review,
                    SUM(shortlisted) AS total_shortlisted,
                    SUM(interview) AS total_interview,
                    SUM(rejected) AS total_rejected,
                    SUM(hired) AS total_hired
               FROM JOB_APPLICATION_STATUS;
               SELECT
                    company_ID,
                    COUNT(*) AS total_applications
               FROM JOB_APPLICATION_STATUS
               GROUP BY company_ID;
               SELECT
                    EMPLOYER_SIGNUP_INFO.company_name,
                    COUNT(*) AS total_applications
                    FROM JOB_APPLICATION_STATUS
                    LEFT JOIN
                    EMPLOYER_SIGNUP_INFO ON 
                    EMPLOYER_SIGNUP_INFO.company_ID = JOB_APPLICATION_STATUS.company_ID
               GROUP BY JOB_APPLICATION_STATUS.company_ID
               ORDER BY total_applications DESC;
               
               SELECT
                    JOB_LISTING.job_title,
                    COUNT(*) AS total_applicants,
                    ROUND((SUM(hired) / COUNT(*)) * 100, 2) AS hired_percentage
               FROM JOB_APPLICATION_STATUS
               JOIN JOB_LISTING ON JOB_LISTING.job_id = JOB_APPLICATION_STATUS.job_id
               GROUP BY JOB_LISTING.job_id;
               
               SELECT
                    EMPLOYER_SIGNUP_INFO.company_name,
                    COUNT(CASE WHEN j.trash = 1 THEN j.employer_id END) AS total_companies_with_trashed_listings,
                    COUNT(CASE WHEN j.trash = 0 THEN j.employer_id END) AS total_companies_with_active_listings
               FROM EMPLOYER_SIGNUP_INFO
               LEFT JOIN JOB_LISTING j ON EMPLOYER_SIGNUP_INFO.company_ID = j.employer_id
               GROUP BY j.employer_id;
               ;";
     $stmt = mysqli_prepare($conn, $query);

     if ($stmt === false) {
          echo "Error: " . mysqli_error($conn);
     } else {
          mysqli_stmt_bind_param($stmt, "s", $company_ID);

          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               $result = mysqli_stmt_get_result($stmt);

               // Fetch and store each column's value in PHP variables
               while ($row = mysqli_fetch_assoc($result)) {
                    echo 'sah';
               }
          } else {
               echo "Error: " . mysqli_error($conn);
          }

          // Close the prepared statement
          mysqli_stmt_close($stmt);
     }

     mysqli_close($conn);
?>

