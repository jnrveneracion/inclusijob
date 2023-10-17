<?php
     session_start();

     // Check if the form has been submitted
     if (isset($_POST['email']) && isset($_POST['password'])) {
          // Get the form data
          $jobseeker_id = $_POST['jobseeker_id'];
          $firstname = $_POST['firstname'];
          $middlename = $_POST['middlename'];
          $lastname = $_POST['lastname'];
          $sex = $_POST['sex'];
          $civil_status = $_POST['civil_status'];
          $age = $_POST['age'];
          $birthday = $_POST['birthday'];
          $contact_no = $_POST['contact_no'];
          $address = $_POST['address'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          
          // Hash the password
          $hashed_password = password_hash($password, PASSWORD_DEFAULT);
          
          include "../database/conn.php";
          
          // Check for a successful connection
          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
      
          // Create a prepared statement with placeholders
          $query = "INSERT INTO JOB_SEEKER_SIGNUP_INFO (jobseeker_ID, firstname, middlename, lastname, sex, civil_status, age, birthday, contact_no, jobseeker_address, email, jobseeker_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      
          // Prepare the statement
          $stmt = mysqli_prepare($conn, $query);
      
          // Bind parameters to the prepared statement
          mysqli_stmt_bind_param($stmt, "ssssssisssss", $jobseeker_id, $firstname, $middlename, $lastname, $sex, $civil_status, $age, $birthday, $contact_no, $address, $email, $hashed_password);
      
          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               
               header("Location: ../job-seeker/job-seeker-login.php?message=Sign up was successful! You can now sign in, $firstname");
               exit();
          } else {
              echo "Error: " . mysqli_error($conn);
          }
      
          // Close the prepared statement and database connection
          mysqli_stmt_close($stmt);
          mysqli_close($conn);
      }
?>