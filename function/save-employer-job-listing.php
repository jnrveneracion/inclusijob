<?php
     session_start();

     // Check if the form has been submitted
     if (isset($_POST['employer_id'])) {
          // Get the form data
          $employer_id = $_POST['employer_id'];
          $job_title = $_POST['job_title'];
          $job_description = $_POST['job_description'];
          $qualifications = $_POST['qualifications'];
          $job_location = $_POST['location'];
          $employment_type = $_POST['employment_type'];
          $compensation = $_POST['compensation'];
          $compensation_frequency = $_POST['compensation_frequency'];
          $start_compensation = $_POST['start_compensation']; 
          $end_compensation = $_POST['end_compensation'];
          $application_deadline = $_POST['application_deadline'];
          $benefits = $_POST['benefits'];
          $work_environment = $_POST['work_environment'];
          
          include "../database/conn.php";
          
          // Check for a successful connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
      
          // Create a prepared statement with placeholders
          $query = "INSERT INTO JOB_LISTING (employer_id, job_title, job_description, qualifications, job_location, employment_type, compensation, compensation_frequency,start_compensation, end_compensation, application_deadline, benefits, work_environment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      
          // Prepare the statement
          $stmt = mysqli_prepare($conn, $query);
      
          // Bind parameters to the prepared statement
          mysqli_stmt_bind_param($stmt, "sssssssssssss", $employer_id, $job_title, $job_description, $qualifications, $job_location, $employment_type, $compensation, $compensation_frequency, $start_compensation, $end_compensation, $application_deadline, $benefits, $work_environment);
      
          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               
               header("Location: ../employer/manage-job-listing.php?message=Job%20listing%20successfully%20added");
               exit();
          } else {
              echo "Error: " . mysqli_error($conn);
          }
      
          // Close the prepared statement and database connection
          mysqli_stmt_close($stmt);
          mysqli_close($conn);
      }
?>

