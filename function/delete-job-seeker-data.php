<?php
// Include your database connection or configuration
include "../database/conn.php";

// Check if this is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data from the Ajax request
    $requestDeletionId = $_POST['request_deletion_id'];
    $jobseekerID = $_POST['jobseeker_ID'];

    // Define SQL queries
    $sqlQueries = [
        'DELETE FROM SAVED_JOB_LISTING WHERE jobseeker_ID = ?',
        'DELETE FROM JOB_APPLICATION_STATUS WHERE jobseeker_ID = ?',
        'DELETE FROM JOB_SEEKER_CAREER_HISTORY WHERE jobseeker_ID = ?',
        'DELETE FROM JOB_SEEKER_EDUCATION_INFO WHERE jobseeker_ID = ?',
        'DELETE FROM JOB_SEEKER_IMAGES WHERE jobseeker_ID = ?',
        'DELETE FROM JOB_SEEKER_SIGNUP_INFO WHERE jobseeker_ID = ?',
        'DELETE FROM JOB_SEEKER_SKILL WHERE jobseeker_ID = ?',
        'DELETE FROM LOGIN_LOGS WHERE user_ID = ?',
        'DELETE FROM REQUEST_RESET_PASSWORD WHERE user_ID = ?',
        'UPDATE REQUEST_ACCOUNT_DELETION SET deletion_status = 1 WHERE user_ID = ?'
    ];

    // Prepare and execute each query
    foreach ($sqlQueries as $query) {
        try {
            $stmt = $conn->prepare($query);

            // Bind the parameters and execute the query
            $stmt->bind_param("s", $jobseekerID);

            if ($stmt->execute()) {
                // Data deleted successfully
            } else {
                // Handle the database deletion error
                throw new Exception("Error executing query: " . $stmt->error);
            }

            // Close the statement
            $stmt->close();
        } catch (Exception $e) {
            // Handle exceptions
            echo "Error: " . $e->getMessage();
        }
    }

    echo "User data deleted successfully!";
    // Close the database connection
    $conn->close();
} else {
    // Handle non-POST requests
    echo "Invalid request.";
}
?>
