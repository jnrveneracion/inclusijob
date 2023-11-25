<?php
session_start();

if (isset($_POST['logout'])) {
    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "inclusijob_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the session ID from the session variables
    $session_ID = $_SESSION['session_ID'];

    // Update the date_logged_out in the LOGIN_LOGS table
    $updateStmt = $conn->prepare("UPDATE LOGIN_LOGS SET date_logged_out = CURRENT_TIMESTAMP WHERE session_ID = ?");
    $updateStmt->bind_param("s", $session_ID);
    $updateStmt->execute();
    $updateStmt->close();

    // Unset and destroy session variables
    session_unset();
    session_destroy();

    // Redirect to login.php
    header("Location: ../job-seeker/job-seeker-login.php");
    exit();
}
?>
