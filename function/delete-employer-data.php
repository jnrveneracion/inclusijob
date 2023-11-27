<?php
// Include your database connection or configuration
include "../database/conn.php";

// Check if this is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the data from the Ajax request
    $requestDeletionId = $_POST['request_deletion_id'];
    $companyID = $_POST['company_ID'];

    // Define SQL queries
    $sqlQueries = [
        'DELETE FROM EMPLOYER_SIGNUP_INFO WHERE company_ID = ?',
        'DELETE FROM COMPANY_IMAGES WHERE company_ID = ?',
        'DELETE FROM HIRED_NOTES WHERE company_ID = ?',
        'DELETE FROM INTERVIEW_NOTES WHERE company_ID = ?',
        'DELETE FROM JOB_APPLICATION_STATUS WHERE company_ID = ?',
        'DELETE FROM JOB_LISTING WHERE employer_id = ?',
        'DELETE FROM JOB_SEEKER_WORK_REVIEW WHERE company_ID = ?',
        'DELETE FROM LOGIN_LOGS WHERE user_ID = ?',
        'UPDATE REQUEST_ACCOUNT_DELETION SET deletion_status = 1 WHERE user_ID = ?'
    ];

    // Prepare and execute each query
    foreach ($sqlQueries as $query) {
        $stmt = $conn->prepare($query);

        // Bind the parameters and execute the query
        $stmt->bind_param("s", $companyID);

        if ($stmt->execute()) {
            // Data deleted successfully

        } else {
            // Handle the database deletion error
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
    echo "User data deleted successfully!";

    // Close the database connection
    $conn->close();
} else {
    // Handle non-POST requests
    echo "Invalid request.";
}
?>
