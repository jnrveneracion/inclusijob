<?php

// Include your database connection or configuration
include "../database/conn.php";

// Check if this is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Retrieve the data from the POST request
     $js_contact_no = $_POST['js_contact_no'];
     $js_email = $_POST['js_email'];
     $tab = $_POST['tab'];
     $jobSeekerName = $_POST['jobSeekerName'];
     $jobListingId = $_POST['jobListingId'];
     $jobSeekerId = $_POST['jobSeekerId'];
     $employerId = $_POST['employerId'];
     $true = 1;

     //post it to jobseeker career history
     $job_title = $_POST['job_title'];
     $company_name = $_POST['company_name'];
     $start_month = date('F');
     $start_year = date('Y');
     $still_in_role = 1;
     $job_description = $_POST['job_description'];
     // Insert the data into your database (replace with your database structure)
     $sql = "UPDATE JOB_APPLICATION_STATUS SET hired = ?, hired_date = NOW() WHERE jobseeker_ID = ? AND company_ID = ? AND job_ID = ?";
     $query = "INSERT INTO JOB_SEEKER_CAREER_HISTORY (jobseeker_ID, job_title, company_name, start_month, start_year, still_in_role, career_history_description) VALUES (?, ?, ?, ?, ?, ?, ?)";

     $stmt = $conn->prepare($sql);
     $stmt2 = $conn->prepare($query);

     if ($stmt && $stmt2) {
          // Bind the parameters and execute the first query
          $stmt->bind_param("issi", $true, $jobSeekerId, $employerId, $jobListingId);
          if ($stmt->execute()) {
               // Bind the parameters and execute the second query
               $stmt2->bind_param("ssssiss", $jobSeekerId, $job_title, $company_name, $start_month, $start_year, $still_in_role, $job_description);
               if ($stmt2->execute()) {
                    include "email-hired-job-seeker.php";

                    // Redirect to the desired page after successful update
                    header("Location: ../employer/job-application-review.php?tab=" . $tab . "&j=" . $jobListingId . "&message=You%20have%20successfully%20moved%20" . $jobSeekerName . "%20to%20hired");
                    exit();
               } else {
                    // Handle the second database update error
                    echo "Error: " . $stmt2->error;
               }
          } else {
               // Handle the first database update error
               echo "Error: " . $stmt->error;
          }

          // Close the statements
          $stmt->close();
          $stmt2->close();
     } else {
          // Handle statement preparation error
          echo "Error preparing statements: " . $conn->error;
     }

     // Close the database connection
     $conn->close();
} else {
     // Handle non-POST requests
     echo "Invalid request.";
}
?>