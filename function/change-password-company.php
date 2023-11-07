<?php
session_start();

if (isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
     // Get the form data
     $old_password = $_POST['old_password'];
     $new_password = $_POST['new_password'];
     $confirm_password = $_POST['confirm_password'];

     // Check if the new password and confirmation match
     if ($new_password !== $confirm_password) {
          // When you want to show the login modal
          $_SESSION['show_login_modal'] = true;
          $_SESSION['pass_message'] = "New password and confirm password do not match.";
          header("Location: ../employer/preview-profile.php?message=New%20password%20and%20confirm%20password%20do%20not%20match#login-details-section");
          exit();
     }

     // Retrieve the user's current password from the database
     include "../database/conn.php"; // Include the database connection code

     $company_id = $_SESSION['company_ID'];

     $query = "SELECT employer_password FROM EMPLOYER_SIGNUP_INFO WHERE company_ID = ?";
     $stmt = mysqli_prepare($conn, $query);
     mysqli_stmt_bind_param($stmt, "s", $company_id);
     mysqli_stmt_execute($stmt);
     $result = mysqli_stmt_get_result($stmt);
     $row = mysqli_fetch_assoc($result);

     if (password_verify($old_password, $row['employer_password'])) {
          // Passwords match, update the password in the database
          $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

          $update_query = "UPDATE EMPLOYER_SIGNUP_INFO SET employer_password = ? WHERE company_ID = ?";
          $update_stmt = mysqli_prepare($conn, $update_query);
          mysqli_stmt_bind_param($update_stmt, "ss", $hashed_new_password, $company_id);
          mysqli_stmt_execute($update_stmt);
          mysqli_close($conn);

          header("Location: ../employer/preview-profile.php?message=Password%20changed%20successfully#login-details-section");
          exit();
     } else {
          mysqli_close($conn);

          // When you want to show the login modal
          $_SESSION['show_login_modal'] = true;
          $_SESSION['pass_message'] = "Old password is incorrect.";
          header("Location: ../employer/preview-profile.php?message=Old%20password%20is%20incorrect#login-details-section");
          exit();
     }

}
?>