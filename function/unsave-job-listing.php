<?php
// Include your database connection or configuration
include "../database/conn.php";

// Check if this is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Retrieve the data from the Ajax request
     $jobListingId = $_POST['jobListingId'];
     $jobSeekerId = $_POST['jobSeekerId'];
     $employerId = $_POST['employerId'];

     // Perform any necessary data validation and sanitization

     // Delete the data from your database (replace with your database structure)
     $sql = "DELETE FROM SAVED_JOB_LISTING WHERE job_listing_id = ? AND jobseeker_ID = ? AND employer_id = ?";

     $stmt = $conn->prepare($sql);

     // Bind the parameters and execute the query
     $stmt->bind_param("iss", $jobListingId, $jobSeekerId, $employerId);

     if ($stmt->execute()) {
          // Data deleted successfully
          echo "Data deleted successfully!";
     } else {
          // Handle the database deletion error
          echo "Error: " . $conn->error;
     }

     // Close the database connection
     $stmt->close();
     $conn->close();
} else {
     // Handle non-POST requests
     echo "Invalid request.";
}
?>
