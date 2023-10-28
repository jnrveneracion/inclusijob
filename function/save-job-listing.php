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

     // Insert the data into your database (replace with your database structure)
     $sql = "INSERT INTO SAVED_JOB_LISTING (job_listing_id, jobseeker_ID, employer_id) VALUES (?, ?, ?)";

     $stmt = $conn->prepare($sql);

     // Bind the parameters and execute the query
     $stmt->bind_param("iss", $jobListingId, $jobSeekerId, $employerId);

     if ($stmt->execute()) {
          // Data inserted successfully
          echo "Data saved successfully!";
     } else {
          // Handle the database insertion error
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