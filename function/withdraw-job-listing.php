<?php
// Include your database connection or configuration
include "../database/conn.php";

// Check if this is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data from the POST request
    $jobListingId = $_POST['jobListingId'];
    $jobSeekerId = $_POST['jobSeekerId'];
    $employerId = $_POST['employerId'];
    $true = 1;

    // Insert the data into your database (replace with your database structure)
    $sql = "UPDATE JOB_APPLICATION_STATUS SET withdraw_job = ?, withdraw_job_date = NOW() WHERE jobseeker_ID = ? AND company_ID = ? AND job_ID = ?";

    $stmt = $conn->prepare($sql);

    // Bind the parameters and execute the query
    $stmt->bind_param("issi", $true, $jobSeekerId, $employerId, $jobListingId);

    if ($stmt->execute()) {
          // Redirect to the desired page after successful update
        header("Location: ../job-seeker/job-application-status.php?message=You%20have%20successfully%20withdrawn");
        exit();
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
