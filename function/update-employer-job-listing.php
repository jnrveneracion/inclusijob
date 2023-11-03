<?php
session_start();

// Check if the form has been submitted
if (isset($_POST['job_id'])) {
    // Get the form data
    $employer_id = $_POST['employer_id'];
    $job_id = $_POST['job_id'];
    $job_title = $_POST['job_title'];
    $job_description = $_POST['job_description'];
    $qualifications = $_POST['qualifications'];
    $job_location = $_POST['location'];
    $employment_type = $_POST['employment_type'];
    $compensation = $_POST['compensation'];
    $compensation_frequency = $_POST['compensation_frequency'];
    $start_compensation = $_POST['start_compensation'];
    $end_compensation = $_POST['end_compensation'];
    $application_deadline = $_POST['application_deadline'];
    $benefits = $_POST['benefits'];
    $work_environment = $_POST['work_environment'];

    include "../database/conn.php";

    // Check for a successful connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create a prepared statement with placeholders
    $query = "UPDATE JOB_LISTING SET employer_id=?, job_title=?, job_description=?, qualifications=?, job_location=?, employment_type=?, compensation=?, compensation_frequency=?, start_compensation=?, end_compensation=?, application_deadline=?, benefits=?, work_environment=? WHERE job_id = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssssssssssssi", $employer_id, $job_title, $job_description, $qualifications, $job_location, $employment_type, $compensation, $compensation_frequency, $start_compensation, $end_compensation, $application_deadline, $benefits, $work_environment, $job_id);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../employer/view-job-listing-details.php?message=Job%20listing%20successfully%20updated&j=". $job_id ."");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the prepared statement and database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
