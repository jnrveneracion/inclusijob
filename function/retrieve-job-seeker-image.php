<?php
     session_start();

     include "../database/conn.php";

     // Retrieve user data based on jobseeker_ID
     $jobseeker_ID = $_SESSION['jobseeker_ID'];

     // Create a prepared statement to select data
     $query = "SELECT * FROM JOB_SEEKER_IMAGES WHERE jobseeker_ID = ?";
     $stmt = mysqli_prepare($conn, $query);

     if ($stmt === false) {
          echo "Error: " . mysqli_error($conn);
     } else {
          // Bind the jobseeker_ID parameter
          mysqli_stmt_bind_param($stmt, "s", $jobseeker_ID);

          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               $result = mysqli_stmt_get_result($stmt);

               // Fetch and store each column's value in PHP variables
               while ($row = mysqli_fetch_assoc($result)) {
                    $ProfileImageData = base64_encode($row['profile_image']);
               }
          } else {
               echo "Error: " . mysqli_error($conn);
          }

          // Close the prepared statement
          mysqli_stmt_close($stmt);
     }

     mysqli_close($conn);
?>