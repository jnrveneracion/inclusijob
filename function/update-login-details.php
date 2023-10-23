<?php
include "../database/conn.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $jobseeker_ID = $_POST['jobseeker_id'];
    $email = $_POST['email'];
    $confirm_current_password = $_POST['confirm_current_password'];
    $new_password = $_POST['new_password'];

    // Create a prepared statement with placeholders
    if (isset($_POST['change_password'])) {
        // Check if the "Change Password" checkbox is checked
        $query = "SELECT jobseeker_password FROM JOB_SEEKER_SIGNUP_INFO WHERE jobseeker_ID = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt === false) {
            echo "Error: " . mysqli_error($conn);
        } else {
            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "s", $jobseeker_ID);

            // Execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Retrieve the hashed password
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);
                $hashed_password = $row['jobseeker_password'];

                // Verify the old password before changing it
                if (password_verify($confirm_current_password, $hashed_password)) {
                    $query = "UPDATE JOB_SEEKER_SIGNUP_INFO SET jobseeker_password = ? WHERE jobseeker_ID = ?";
                    $stmt = mysqli_prepare($conn, $query);

                    if ($stmt === false) {
                        echo "Error: " . mysqli_error($conn);
                    } else {
                        // Hash the new password
                        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ss", $hashed_new_password, $jobseeker_ID);

                        // Execute the prepared statement
                        if (mysqli_stmt_execute($stmt)) {
                            // Password successfully updated
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }

                        // Close the prepared statement
                        mysqli_stmt_close($stmt);
                    }
                } else {
                    echo "Password verification failed. Please enter the correct current password.";
                }
            }
        }
    }

    // Update the email
    $query = "UPDATE JOB_SEEKER_SIGNUP_INFO SET email = ? WHERE jobseeker_ID = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt === false) {
        echo "Error: " . mysqli_error($conn);
    } else {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ss", $email, $jobseeker_ID);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Email successfully updated
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    }

    // Close the database connection
    mysqli_close($conn);

    // Redirect to a success page or perform any additional actions
    header("Location: ../job-seeker/preview-profile.php?message=Login%20details%20successfully%20updated#login-details-section");
    exit();
}
?>
