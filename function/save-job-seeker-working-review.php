<?php
session_start();

// Check if the form has been submitted
if (isset($_POST['jobSeekerId'])) {
    // Get the form data
    $jobSeekerId = $_POST['jobSeekerId'];
    $jobListingId = $_POST['jobListingId'];
    $employerId = $_POST['employerId'];
    $star_review_1 = $_POST['star_review_1'];
    $star_review_2 = $_POST['star_review_2'];
    $star_review_3 = $_POST['star_review_3'];
    $star_review_4 = $_POST['star_review_4'];
    $star_review_5 = $_POST['star_review_5'];
    $star_review_6 = $_POST['star_review_6'];
    $star_review_7 = $_POST['star_review_7'];
    $recommend = $_POST['recommend'];
    $salary = $_POST['salary'];
    $good_things = $_POST['good_things'];
    $challenges = $_POST['challenges'];
    $experience = $_POST['experience'];

    include "../database/conn.php";

    // Check for a successful connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create a prepared statement with placeholders
    $query = "INSERT INTO JOB_SEEKER_WORK_REVIEW 
              (job_ID, jobseeker_ID, company_ID, star_review_1, star_review_2, star_review_3, star_review_4, star_review_5, star_review_6, star_review_7, recommend, salary, good_things, challenges, experience)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "issssssssssssss", $jobListingId, $jobSeekerId, $employerId, $star_review_1, $star_review_2, $star_review_3, $star_review_4, $star_review_5, $star_review_6, $star_review_7, $recommend, $salary, $good_things, $challenges, $experience);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../job-seeker/job-application-status.php?message=Review%20successfully%20added");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the prepared statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
