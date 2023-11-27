<?php
  session_start();

  // Check if the AJAX request is submitted
  if (isset($_POST['requestDeletion'])) {
       function generateRandom($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $randomString;
       }

       // Get the form data
       $company_id = $_POST['company_ID'];
       $company_email = $_POST['company_email'];
       $request_ID = generateRandom();
       $user_type = "Employer";

       include "../database/conn.php";

       // Check for a successful connection
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
       }

       // Create a prepared statement with placeholders
       $query = "INSERT INTO REQUEST_ACCOUNT_DELETION (request_ID, user_ID, user_email, user_type) VALUES (?, ?, ?, ?)";

       // Prepare the statement
       $stmt = mysqli_prepare($conn, $query);

       // Bind parameters to the prepared statement
       mysqli_stmt_bind_param($stmt, "ssss", $request_ID, $company_id, $company_email, $user_type);

       // Execute the prepared statement
       if (mysqli_stmt_execute($stmt)) {
            echo "Account deletion request successfully submitted!";
       } else {
            echo "Error: " . mysqli_error($conn);
       }

       // Close the prepared statement and database connection
       mysqli_stmt_close($stmt);
       mysqli_close($conn);

       exit(); // Stop further execution after processing the request
   }
?>
