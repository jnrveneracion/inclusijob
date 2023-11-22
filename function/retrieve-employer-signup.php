<?php
session_start();

function getCompanyID()
{
     if (isset($_GET['c'])) {
          return $_GET['c'];
     } elseif (isset($_SESSION['company_ID'])) {
          return $_SESSION['company_ID'];
     } else {
          return null; // or handle the case when 'c' and 'company_ID' are not available
     }
}

$company_ID = getCompanyID();

if ($company_ID !== null) {
     include "../database/conn.php";

     // Create a prepared statement to select data
     $query = "SELECT * FROM EMPLOYER_SIGNUP_INFO WHERE company_ID = ?";
     $stmt = mysqli_prepare($conn, $query);

     if ($stmt === false) {
          echo "Error: " . mysqli_error($conn);
     } else {
          mysqli_stmt_bind_param($stmt, "s", $company_ID);

          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               $result = mysqli_stmt_get_result($stmt);

               // Fetch and store each column's value in PHP variables
               while ($row = mysqli_fetch_assoc($result)) {
                    $company_ID = $row['company_ID'];
                    $company_name = $row['company_name'];
                    $industry_sector = $row['industry_sector'];
                    $company_size = $row['company_size'];
                    $founded_year = $row['founded_year'];
                    $company_address = $row['company_address'];
                    $company_description = $row['company_description'];
                    $company_culture = $row['company_culture'];
                    $contact_persons_name = $row['contact_persons_name'];
                    $contact_persons_position = $row['contact_persons_position'];
                    $contact_persons_contact_no = $row['contact_persons_contact_no'];
                    $company_website = $row['company_website'];
                    $company_facebook = $row['company_facebook'];
                    $company_linkedin = $row['company_linkedin'];
                    $company_twitter = $row['company_twitter'];
                    $company_email = $row['email'];
                    $password = $row['employer_password'];
               }
          } else {
               echo "Error: " . mysqli_error($conn);
          }

          // Close the prepared statement
          mysqli_stmt_close($stmt);
     }

     mysqli_close($conn);
} else {
     // Handle the case when 'c' and 'company_ID' are not available
     echo "Company ID is missing.";
}

?>