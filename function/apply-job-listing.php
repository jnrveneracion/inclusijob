<?php
// Include your database connection or configuration
include "../database/conn.php";

// Check if this is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data from the Ajax request
    $jobListingId = $_POST['jobListingId'];
    $jobSeekerId = $_POST['jobSeekerId'];
    $employerId = $_POST['employerId'];
    $appliedTrue = 1;

    // Insert the data into your database (replace with your database structure)
    $sql = "INSERT INTO JOB_APPLICATION_STATUS (jobseeker_ID, company_ID, job_ID, applied, applied_date) VALUES (?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($sql);

    // Bind the parameters and execute the query
    $stmt->bind_param("ssis", $jobSeekerId, $employerId, $jobListingId, $appliedTrue);

    if ($stmt->execute()) {
        // Data inserted successfully
        echo "Data saved successfully!";
    } else {
        // Handle the database insertion error
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
