<?php
include "../database/conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $request_password_id = mysqli_real_escape_string($conn, $_POST["request_password_id"]);
    $jobseeker_ID = mysqli_real_escape_string($conn, $_POST["jobseeker_ID"]);

    // Function to generate a random alphanumeric password
    function generateRandomPassword($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    // Generate a new random password
    $newPassword = generateRandomPassword();

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update JOB_SEEKER_SIGNUP_INFO with the new hashed password
    $updateQuery = "UPDATE JOB_SEEKER_SIGNUP_INFO SET jobseeker_password = ? WHERE jobseeker_ID = ?";
    $stmtUpdate = mysqli_prepare($conn, $updateQuery);

    if ($stmtUpdate) {
        mysqli_stmt_bind_param($stmtUpdate, "ss", $hashedPassword, $jobseeker_ID);
        $success = mysqli_stmt_execute($stmtUpdate);

        if ($success) {
            // Check if any rows were affected
            $rowsAffected = mysqli_stmt_affected_rows($stmtUpdate);
            if ($rowsAffected > 0) {
                // Update the existing password in REQUEST_RESET_PASSWORD
                $updateRequestQuery = "UPDATE REQUEST_RESET_PASSWORD SET recovery_password = ? WHERE request_password_id = ?";
                $stmtUpdateRequest = mysqli_prepare($conn, $updateRequestQuery);

                if ($stmtUpdateRequest) {
                    mysqli_stmt_bind_param($stmtUpdateRequest, "ss", $newPassword, $request_password_id);
                    mysqli_stmt_execute($stmtUpdateRequest);

                    echo "Password updated successfully!";
                } else {
                    echo "Error in updating REQUEST_RESET_PASSWORD: " . mysqli_error($conn);
                }

                // Close the statement
                mysqli_stmt_close($stmtUpdateRequest);
            } else {
                echo "No matching jobseeker found for ID: " . $jobseeker_ID;
            }

            // Close the statement
            mysqli_stmt_close($stmtUpdate);
        } else {
            echo "Error in updating JOB_SEEKER_SIGNUP_INFO: " . mysqli_error($conn);
        }
    } else {
        echo "Error in preparing statement for JOB_SEEKER_SIGNUP_INFO: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    exit(); // Stop further execution after processing the update
}
?>
