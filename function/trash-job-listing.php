<?php
     // Include your database connection or configuration
     include "../database/conn.php";

     // Check if this is a POST request
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Retrieve the data from the Ajax request
     $jobListingId = $_POST['jobListingId'];
     $trashed = 1;

     // Update the data in your database
     $sql = "UPDATE JOB_LISTING 
               SET 
               trash = ?,
               date_trashed = NOW()
               WHERE job_id = ?";

     $stmt = $conn->prepare($sql);

     // Bind the parameters and execute the query
     $stmt->bind_param("ii", $trashed, $jobListingId);

     if ($stmt->execute()) {
          // Data updated successfully
          echo "Job listing deleted successfully!";
     } else {
          // Handle the database update error
          echo "Error: " . $stmt->error;
     }

     // Close the statement and the database connection
     $stmt->close();
     $conn->close();
     } else {
     // Handle non-POST requests
     echo "Invalid request.";
     }
?>
