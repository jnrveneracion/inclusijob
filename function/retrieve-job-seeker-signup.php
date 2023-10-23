<?php
     session_start();

     include "../database/conn.php";

     // Retrieve user data based on jobseeker_ID
     $jobseeker_ID = $_SESSION['jobseeker_ID'];

     // Create a prepared statement to select data
     $query = "SELECT * FROM JOB_SEEKER_SIGNUP_INFO WHERE jobseeker_ID = ?";
     $stmt = mysqli_prepare($conn, $query);

     if ($stmt === false) {
          echo "Error: " . mysqli_error($conn);
     } else {
          // Bind the jobseeker_ID parameter
          mysqli_stmt_bind_param($stmt, "i", $jobseeker_ID);

          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               $result = mysqli_stmt_get_result($stmt);

               // Fetch and store each column's value in PHP variables
               while ($row = mysqli_fetch_assoc($result)) {
                    $jobseeker_ID = $row['jobseeker_ID'];
                    $firstname = $row['firstname'];
                    $middlename = $row['middlename'];
                    $lastname = $row['lastname'];
                    $sex = $row['sex'];
                    $civil_status = $row['civil_status'];
                    $age = $row['age'];
                    $birthday = $row['birthday'];
                    $contact_no = $row['contact_no'];
                    $jobseeker_address = $row['jobseeker_address'];
                    $email = $row['email'];
                    $jobseeker_password = $row['jobseeker_password'];
                    $jobseeker_objectives = $row['jobseeker_objectives'];
                    
               }
          } else {
               echo "Error: " . mysqli_error($conn);
          }

          // Close the prepared statement
          mysqli_stmt_close($stmt);
     }

     mysqli_close($conn);
?>