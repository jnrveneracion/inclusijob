<?php
     include "../database/conn.php";

     // Check if the form has been submitted
     if (isset($_POST['jobseeker_id'])) {
         // Get the form data
         $jobseeker_ID = $_POST['jobseeker_id'];
         $education_id = $_POST['education_id'];
         $institution_name = $_POST['institution_name'];
         $school_degree = $_POST['school_degree'];
         $field_of_study = $_POST['field_of_study'];
         $start_year = $_POST['start_year'];
         $graduation_year = $_POST['graduation_year'];
         $course_highlights = $_POST['course_highlights'];

         // Create a prepared statement with placeholders
         $query = "UPDATE JOB_SEEKER_EDUCATION_INFO SET
                   institution_name = ?,
                   school_degree = ?,
                   field_of_study = ?,
                   start_year = ?,
                   graduation_year = ?,
                   course_highlights = ?
                   WHERE jobseeker_ID = ? AND education_info_ID = ?";
     
         // Prepare the statement
         $stmt = mysqli_prepare($conn, $query);
     
         if ($stmt === false) {
             echo "Error: " . mysqli_error($conn);
         } else {
             // Bind parameters to the prepared statement
             mysqli_stmt_bind_param($stmt, "sssssssi", $institution_name, $school_degree, $field_of_study, $start_year, $graduation_year, $course_highlights, $jobseeker_ID, $education_id);
     
             // Execute the prepared statement
             if (mysqli_stmt_execute($stmt)) {
                 // Redirect to a success page or perform any additional actions
                 header("Location: ../job-seeker/preview-profile.php?message=Education%20information%20successfully%20updated#education-section");
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