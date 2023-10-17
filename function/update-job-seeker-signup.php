<?php
     include "../database/conn.php";

     // Check if the form has been submitted
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
         // Get the form data
         $jobseeker_ID = $_POST['jobseeker_id'];
         $firstname = $_POST['firstname'];
         $middlename = $_POST['middlename'];
         $lastname = $_POST['lastname'];
         $sex = $_POST['sex'];
         $civil_status = $_POST['civil_status'];
         $age = $_POST['age'];
         $birthday = $_POST['birthday'];
         $contact_no = $_POST['contact_no'];
         $jobseeker_address = $_POST['address'];
     
         // Create a prepared statement with placeholders
         $query = "UPDATE JOB_SEEKER_SIGNUP_INFO SET
                   firstname = ?,
                   middlename = ?,
                   lastname = ?,
                   sex = ?,
                   civil_status = ?,
                   age = ?,
                   birthday = ?,
                   contact_no = ?,
                   jobseeker_address = ?
                   WHERE jobseeker_ID = ?";
     
         // Prepare the statement
         $stmt = mysqli_prepare($conn, $query);
     
         if ($stmt === false) {
             echo "Error: " . mysqli_error($conn);
         } else {
             // Bind parameters to the prepared statement
             mysqli_stmt_bind_param($stmt, "sssssissss", $firstname, $middlename, $lastname, $sex, $civil_status, $age, $birthday, $contact_no, $jobseeker_address, $jobseeker_ID);
     
             // Execute the prepared statement
             if (mysqli_stmt_execute($stmt)) {
                 // Redirect to a success page or perform any additional actions
                 header("Location: ../job-seeker/preview-profile.php");
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