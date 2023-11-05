<?php
     session_start();

     // Check if the form has been submitted
     if (isset($_POST['jobseeker_id'])) {
          // Get the form data
          $jobseeker_id = $_POST['jobseeker_id'];
          $job_title = $_POST['job_title'];
          $company_name = $_POST['company_name'];
          $start_month = $_POST['start_month'];
          $start_year = $_POST['start_year'];
          $end_month = $_POST['end_month'];
          $end_year = $_POST['end_year'];
          $still_in_role = $_POST['still_in_role'];
          $career_history_description = $_POST['career_history_description'];
          
          include "../database/conn.php";
          
          // Check for a successful connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
      
          // Create a prepared statement with placeholders
          $query = "INSERT INTO JOB_SEEKER_CAREER_HISTORY (jobseeker_ID, job_title, company_name, start_month, start_year, end_month, end_year, still_in_role, career_history_description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
      
          // Prepare the statement
          $stmt = mysqli_prepare($conn, $query);
      
          // Bind parameters to the prepared statement
          mysqli_stmt_bind_param($stmt, "sssssssss", $jobseeker_id, $job_title, $company_name, $start_month, $start_year, $end_month, $end_year, $still_in_role, $career_history_description);
      
          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               
               header("Location: ../job-seeker/preview-profile.php?message=Career%20history%20successfully%20added#career-history-section");
               exit();
          } else {
              echo "Error: " . mysqli_error($conn);
          }
      
          // Close the prepared statement and database connection
          mysqli_stmt_close($stmt);
          mysqli_close($conn);
      }
?>