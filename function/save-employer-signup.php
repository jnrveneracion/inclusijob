<?php
     session_start();

     // Check if the form has been submitted
     if (isset($_POST['email']) && isset($_POST['password'])) {
          // Get the form data
          $employer_ID = $_POST['employer_id'];
          $company_name = $_POST['company_name'];
          $industry_sector = $_POST['industry_sector'];
          $company_size = $_POST['company_size'];
          $founded_year = $_POST['founded_year'];
          $company_address = $_POST['company_address'];
          $company_description = $_POST['company_description'];
          $company_culture = $_POST['company_culture'];
          $contact_persons_name = $_POST['contact_persons_name'];
          $contact_persons_position = $_POST['contact_persons_position'];
          $contact_persons_contact_no = $_POST['contact_persons_contact_no'];
          $company_website = $_POST['company_website'];
          $company_facebook = $_POST['company_facebook'];
          $company_linkedin = $_POST['company_linkedin'];
          $company_twitter = $_POST['company_twitter'];
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
          $query = "INSERT INTO EMPLOYER_SIGNUP_INFO (company_ID, company_name, industry_sector, company_size, founded_year, company_address, company_description, company_culture, contact_persons_name, contact_persons_position, contact_persons_contact_no, company_website, company_facebook, company_linkedin, company_twitter, email, employer_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      
          // Prepare the statement
          $stmt = mysqli_prepare($conn, $query);
      
          // Bind parameters to the prepared statement
          mysqli_stmt_bind_param($stmt, "sssssssssssssssss", $employer_ID, $company_name, $industry_sector, $company_size, $founded_year, $company_address, $company_description, $company_culture, $contact_persons_name, $contact_persons_position, $contact_persons_contact_no, $company_website, $company_facebook, $company_linkedin, $company_twitter, $email, $hashed_password);
      
          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               
               header("Location: ../employer/employer-login.php?message=Sign up was successful! Your company $company_name can now sign in.");
               exit();
          } else {
              echo "Error: " . mysqli_error($conn);
          }
      
          // Close the prepared statement and database connection
          mysqli_stmt_close($stmt);
          mysqli_close($conn);
      }
?>

