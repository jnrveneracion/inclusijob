<?php
     session_start();

     // Check if the form has been submitted
     if (isset($_POST['jobseeker_id'])) {
          // Get the form data
          $jobseeker_id = $_POST['jobseeker_id'];
          $skill_name = $_POST['skill_name'];
          
          include "../database/conn.php";
          
          // Check for a successful connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
      
          // Create a prepared statement with placeholders
          $query = "INSERT INTO JOB_SEEKER_SKILL (jobseeker_ID, skill_name) VALUES (?, ?)";
      
          // Prepare the statement
          $stmt = mysqli_prepare($conn, $query);
      
          // Bind parameters to the prepared statement
          mysqli_stmt_bind_param($stmt, "ss", $jobseeker_id, $skill_name);
      
          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               
               header("Location: ../job-seeker/preview-profile.php?message=Skill%20successfully%20added#skills-section");
               exit();
          } else {
              echo "Error: " . mysqli_error($conn);
          }
      
          // Close the prepared statement and database connection
          mysqli_stmt_close($stmt);
          mysqli_close($conn);
      }
?>