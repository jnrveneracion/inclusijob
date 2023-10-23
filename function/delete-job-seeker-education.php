<?php
     include "../database/conn.php";

     // Check if the education_ID is provided in the URL
     if (isset($_GET['education_ID'])) {
          // Retrieve education_ID and jobseeker_ID from the URL parameters
          $education_ID = $_GET['education_ID'];
          $jobseeker_ID = $_GET['jobseeker_ID'];

          // Create a prepared statement with placeholders
          $query = "DELETE FROM JOB_SEEKER_EDUCATION_INFO WHERE education_info_ID = ? AND jobseeker_ID = ?";

          // Prepare the statement
          $stmt = mysqli_prepare($conn, $query);

          if ($stmt === false) {
               echo "Error: " . mysqli_error($conn);
          } else {
               // Bind parameters to the prepared statement
               mysqli_stmt_bind_param($stmt, "is", $education_ID, $jobseeker_ID);

               // Execute the prepared statement
               if (mysqli_stmt_execute($stmt)) {
                    // Redirect to a success page or perform any additional actions
                    header("Location: ../job-seeker/preview-profile.php?message=Education%20information%20successfully%20deleted#education-section");
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
