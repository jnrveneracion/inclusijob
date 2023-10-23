<?php
     session_start();

     // Check if the form has been submitted
     if (isset($_POST['jobseeker_id'])) {
          // Get the form data
          $jobseeker_id = $_POST['jobseeker_id'];
          $institution_name = $_POST['institution_name'];
          $school_degree = $_POST['school_degree'];
          $field_of_study = $_POST['field_of_study'];
          $start_year = $_POST['start_year'];
          $graduation_year = $_POST['graduation_year'];
          $course_highlights = $_POST['course_highlights'];
          
          
          include "../database/conn.php";
          
          // Check for a successful connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
      
          // Create a prepared statement with placeholders
          $query = "INSERT INTO JOB_SEEKER_EDUCATION_INFO (jobseeker_ID, institution_name, school_degree, field_of_study, start_year, graduation_year, course_highlights) VALUES (?, ?, ?, ?, ?, ?, ?)";
      
          // Prepare the statement
          $stmt = mysqli_prepare($conn, $query);
      
          // Bind parameters to the prepared statement
          mysqli_stmt_bind_param($stmt, "sssssss", $jobseeker_id, $institution_name, $school_degree, $field_of_study, $start_year, $graduation_year, $course_highlights);
      
          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               
               header("Location: ../job-seeker/preview-profile.php?message=Education%20successfully%20updated#education-section");
               exit();
          } else {
              echo "Error: " . mysqli_error($conn);
          }
      
          // Close the prepared statement and database connection
          mysqli_stmt_close($stmt);
          mysqli_close($conn);
      }
?>