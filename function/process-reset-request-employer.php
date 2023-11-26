<?php
session_start();

include "../database/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize the email input
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    // Check if the email exists in JOB_SEEKER_SIGNUP_INFO
    $checkEmailQuery = "SELECT company_ID, company_name FROM EMPLOYER_SIGNUP_INFO WHERE email = ?";
    $stmtCheckEmail = mysqli_prepare($conn, $checkEmailQuery);

    if ($stmtCheckEmail) {
        mysqli_stmt_bind_param($stmtCheckEmail, "s", $email);
        mysqli_stmt_execute($stmtCheckEmail);
        mysqli_stmt_bind_result($stmtCheckEmail, $company_ID, $company_name);

        mysqli_stmt_store_result($stmtCheckEmail);  // Store the result set
        if (mysqli_stmt_num_rows($stmtCheckEmail) > 0) {
            mysqli_stmt_fetch($stmtCheckEmail);

            // Email found, generate a request_ID (you can use a more secure method)
            $request_ID = uniqid();

            // Insert into REQUEST_RESET_PASSWORD table
            $insertRequestQuery = "INSERT INTO REQUEST_RESET_PASSWORD (request_ID, user_ID, user_type) VALUES (?, ?, ?)";
            $stmtInsertRequest = mysqli_prepare($conn, $insertRequestQuery);

            if ($stmtInsertRequest) {
                $user_type = "Employer"; // Assuming jobseeker for this example

                mysqli_stmt_bind_param($stmtInsertRequest, "sss", $request_ID, $company_ID, $user_type);
                mysqli_stmt_execute($stmtInsertRequest);

                // Direction message for the user
                $displayedName = $company_name[0] . str_repeat('*', max(0, strlen($company_name) - 2)) . substr($company_name, -2);
                echo "<span style='color: green !important;'>We found your account, $displayedName! Your password reset request has been submitted. Please wait for admin approval. You will receive further instructions via email.</span>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmtInsertRequest);
        } else {
            // Email not found
            echo "Sorry, the provided email does not match any account in our records. Please check the entered email address.";
        }

        mysqli_stmt_close($stmtCheckEmail);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Redirect to the form if accessed directly without submitting
    header("Location: request_reset_password_form.php");
    exit();
}
?>
