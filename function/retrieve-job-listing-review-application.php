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
                    $job_ID = $row["job_id"];
                    $employer_id = $row['employer_id'];
                    $job_title = $row['job_title'];
                    $job_description = $row['job_description'];
                    $qualifications = $row['qualifications'];
                    $job_location = $row['job_location'];
                    $employment_type = $row['employment_type'];
                    $compensation = $row['compensation'];
                    $compensation_frequency = $row['compensation_frequency'];
                    $start_compensation = $row['start_compensation'];
                    $end_compensation = $row['end_compensation'];
                    $application_deadline = $row['application_deadline'];
                    $benefits = $row['benefits'];
                    $work_environment = $row['work_environment'];

                    $compensation = $row['compensation'];
                    $startCompensation = $row['start_compensation'];
                    $endCompensation = $row['end_compensation'];

                    $applicationDeadlineRow = $row['application_deadline'];
                    $jobBenefitsRow = $row['benefits'];
                    $workEnvironmentRow = $row['work_environment'];


                    $salaryStatement = (!empty($startCompensation) && !empty($endCompensation))
                    ? '<span class="ms-1 fs-5">' . $startCompensation . '-' . $endCompensation . ' ' . $row['compensation_frequency'] . '</span>'
                    : '<span class="ms-1 fs-5">' . $compensation . ' ' . $row['compensation_frequency'] . '</span>';

                    $applicationDeadline = (!empty($applicationDeadlineRow)) ? 'd-block' : 'd-none';
                    $jobBenefits = (!empty($jobBenefitsRow)) ? 'd-block' : 'd-none';
                    $workEnvironment = (($workEnvironmentRow === '1')) ? 'd-block' : 'd-none';
                    $workEnvironmentRow = (($workEnvironmentRow === '1')) ? '1' : '0';
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