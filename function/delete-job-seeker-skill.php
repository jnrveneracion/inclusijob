<?php
     include "../database/conn.php";

     // Check if the education_ID is provided in the URL
     if (isset($_GET['skill_ID'])) {
          // Retrieve education_ID and jobseeker_ID from the URL parameters
          $skill_ID = $_GET['skill_ID'];
          $jobseeker_ID = $_GET['jobseeker_ID'];

          // Create a prepared statement with placeholders
          $query = "DELETE FROM JOB_SEEKER_SKILL WHERE skill_ID = ? AND jobseeker_ID = ?";

          // Prepare the statement
          $stmt = mysqli_prepare($conn, $query);

          if ($stmt === false) {
               echo "Error: " . mysqli_error($conn);
          } else {
               // Bind parameters to the prepared statement
               mysqli_stmt_bind_param($stmt, "is", $skill_ID, $jobseeker_ID);

               // Execute the prepared statement
               if (mysqli_stmt_execute($stmt)) {
                    // Redirect to a success page or perform any additional actions
                    header("Location: ../job-seeker/preview-profile.php?message=Skill%20successfully%20deleted#skills-section");
                    exit();
               } else {
                    echo "Error: " . mysqli_error($conn);
               }

               // Close the prepared statement
               mysqli_stmt_close($stmt);
          }
     }

     mysqli_close($conn);
?>
