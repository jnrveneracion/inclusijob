<?php
// Include your database connection or configuration
include "../database/conn.php";

// Check if this is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data from the Ajax request
    $jobListingId = $_POST['jobListingId'];

    // Insert the data into your database (replace with your database structure)
    $sql = "DELETE FROM JOB_LISTING WHERE job_id = ?";

    $stmt = $conn->prepare($sql);

    // Bind the parameters and execute the query
    $stmt->bind_param("i", $jobListingId);

    if ($stmt->execute()) {
        // Data inserted successfully
        echo "Job listing deleted successfully!";
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
