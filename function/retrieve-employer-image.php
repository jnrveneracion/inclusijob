<?php
     session_start();

     include "../database/conn.php";

     // Retrieve user data based on jobseeker_ID
     $company_ID = $_SESSION['company_ID'];

     // Create a prepared statement to select data
     $query = "SELECT * FROM COMPANY_IMAGES WHERE company_ID = ?";
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