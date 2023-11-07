<?php
include "../database/conn.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     // Get the form data
     $company_ID = $_POST['company_id'];
     $company_name = $_POST['company_name'];
     $industry_sector = $_POST['industry_sector'];
     $company_size = $_POST['company_size'];
     $founded_year = $_POST['founded_year'];
     $company_address = $_POST['company_address'];
     $company_email = $_POST['email'];
     $company_description = $_POST['company_description'];
     $company_culture = $_POST['company_culture'];
     $contact_persons_name = $_POST['contact_persons_name'];
     $contact_persons_position = $_POST['contact_persons_position'];
     $contact_persons_contact_no = $_POST['contact_persons_contact_no'];
     $company_website = $_POST['company_website'];
     $company_facebook = $_POST['company_facebook'];
     $company_linkedin = $_POST['company_linkedin'];
     $company_twitter = $_POST['company_twitter'];

     // Update the record in the database
     $query = "UPDATE EMPLOYER_SIGNUP_INFO 
                    SET company_name = ?, 
                         industry_sector = ?, 
                         company_size = ?, 
                         founded_year = ?, 
                         company_address = ?, 
                         email = ?,
                         company_description = ?, 
                         company_culture = ?, 
                         contact_persons_name = ?, 
                         contact_persons_position = ?, 
                         contact_persons_contact_no = ?, 
                         company_website = ?, 
                         company_facebook = ?, 
                         company_linkedin = ?, 
                         company_twitter = ?
                    WHERE company_ID = ?";

     // Prepare the statement
     $stmt = mysqli_prepare($conn, $query);

     if ($stmt === false) {
          echo "Error: " . mysqli_error($conn);
     } else {
          // Bind parameters to the prepared statement
          mysqli_stmt_bind_param(
               $stmt,
               "ssssssssssssssss",
               $company_name,
               $industry_sector,
               $company_size,
               $founded_year,
               $company_address,
               $company_email,
               $company_description,
               $company_culture,
               $contact_persons_name,
               $contact_persons_position,
               $contact_persons_contact_no,
               $company_website,
               $company_facebook,
               $company_linkedin,
               $company_twitter,
               $company_ID
          );

          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               // Redirect to a success page or perform any additional actions
               header("Location: ../employer/preview-profile.php?message=Profile%20successfully%20updated#profile-section");
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