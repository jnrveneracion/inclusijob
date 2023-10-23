<?php
session_start();
     include "../database/conn.php";

     // Check if the form has been submitted
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         // Get the form data
         $jobseeker_ID = $_POST['jobseeker_id'];
         $jobseeker_objectives = $_POST['jobseeker_objectives'];
     
         // Create a prepared statement with placeholders
         $query = "UPDATE JOB_SEEKER_SIGNUP_INFO SET
                   jobseeker_objectives = ?
                   WHERE jobseeker_ID = ?";
     
         // Prepare the statement
         $stmt = mysqli_prepare($conn, $query);
     
         if ($stmt === false) {
             echo "Error: " . mysqli_error($conn);
         } else {
             // Bind parameters to the prepared statement
             mysqli_stmt_bind_param($stmt, "ss", $jobseeker_objectives, $jobseeker_ID);
     
             // Execute the prepared statement
             if (mysqli_stmt_execute($stmt)) {
                 // Redirect to a success page or perform any additional actions
                 header("Location: ../job-seeker/preview-profile.php?message=Objectives%20successfully%20updated#objectives-section");


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