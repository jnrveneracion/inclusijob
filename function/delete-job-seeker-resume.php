<?php
  session_start();

  // Check if the AJAX request is submitted
  if (isset($_POST['requestDeletion'])) {
       // Get the form data
       $jobseeker_ID = $_SESSION['jobseeker_ID'];

       include "../database/conn.php";

       // Check for a successful connection
       if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
       }

       // Create a prepared statement with placeholders
       $query = "DELETE FROM `JOB_SEEKER_UPLOADED_RESUME` WHERE jobseeker_ID = ?";

       // Prepare the statement
       $stmt = mysqli_prepare($conn, $query);

       // Bind parameters to the prepared statement
       mysqli_stmt_bind_param($stmt, "s", $jobseeker_ID);

       // Execute the prepared statement
       if (mysqli_stmt_execute($stmt)) {
            echo "Your uploaded resume successfully deleted!";
       } else {
            echo "Error: " . mysqli_error($conn);
       }

       // Close the prepared statement and database connection
       mysqli_stmt_close($stmt);
       mysqli_close($conn);

       exit(); // Stop further execution after processing the request
   }
?>
