<?php
session_start();

if (isset($_SESSION['admin_ID'])) {
     header("Location: admin/admin-dashboard.php");
     exit();
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Get form inputs
     $email = $_POST['email'];
     $password = $_POST['password'];

     // Database connection
     $conn = mysqli_connect("localhost", "root", "", "inclusijob_db");

     if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
     }

     // Prepare and execute the SQL statement
     $stmt = $conn->prepare("SELECT admin_ID, admin_password FROM ADMIN_INFO WHERE admin_email = ?");
     $stmt->bind_param("s", $email);
     $stmt->execute();

     // Get the result and fetch the row data
     $result = $stmt->get_result();

     if ($result->num_rows == 1) {
          $row = $result->fetch_assoc();
          $hashed_password = $row['admin_password'];

          // Check if the password is correct
          if (password_verify($password, $hashed_password)) {
               // Generate a random alphanumeric session ID
               $session_ID = bin2hex(random_bytes(20)); // Adjust the length as needed

               // Insert a new row into LOGIN_LOGS table
               $user_ID = $row['admin_ID'];
               $user = $email;
               $date_logged_in = date('Y-m-d H:i:s'); // Current date and time

               $insertStmt = $conn->prepare("INSERT INTO LOGIN_LOGS (user_ID, session_ID, user, date_logged_in) VALUES (?, ?, ?, CURRENT_TIMESTAMP)");
               $insertStmt->bind_param("sss", $user_ID, $session_ID, $user);
               $insertStmt->execute();
               $insertStmt->close();

               $_SESSION['admin_ID'] = $row['admin_ID'];
               $_SESSION['session_ID'] = $session_ID;

               // Redirect to home.php
               header("Location: admin/admin-dashboard.php?s=" . $session_ID . "");
               exit();
          } else {
               $error = "<span class='error-indicator'>Invalid email or password</span>";
          }
     } else {
          $error = "<span class='error-indicator'>Invalid email or password</span>";
     }

     $stmt->close();
     $conn->close();
}
?>





<!DOCTYPE html>
<html lang="en">

     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>InclusiJob | Job Seeker Login</title>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
               integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
               crossorigin="anonymous">
          <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
          <link rel="stylesheet" href="css/index-style.css">
          <style>
               #login-message {
                    color: red;
                    font-size: 12px;
                    text-align: center;
                    letter-spacing: 1px;
                    margin: 0;
               }
          </style>
     </head>

     <body class="container-xxl">
          <?php include "common/head.php"; ?>
          <div class="breadcrumbs">
               <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
                    <a href="index.php" class="no-decor-link">
                         <h6 class="page-indicator-txt">Home</h6>
                    </a>
                    <a href="" class="no-decor-link">
                         <h6 class="page-indicator-txt divider">></h6>
                    </a>
                    <a href="#" class="no-decor-link">
                         <h6 class="page-indicator-txt active">Admin Login</h6>
                    </a>
               </div>
          </div>
          <div class="body d-flex justify-content-center align-items-center m-5 p-5" id="login-body" style="min-height: 500px;">
               <div>
                    <div class="login-section">
                         <div>
                              <h5 class="login-head-txt">Admin Login</h5>
                         </div>
                         <div class="d-grid justify-content-center align-items-center mb-3">
                              <form action="" method="post" class="d-grid justify-content-center align-items-center">
                                   <p id="login-message">
                                        <?php if (isset($error)) {
                                             echo $error;
                                        } ?>
                                   </p>
                                   <input placeholder="user" class="login-input" type="text" name="email"
                                        id="username" required>
                                   <input placeholder="password" class="login-input" type="password" name="password"
                                        id="password" required>
                                   <button type="submit" class="login-btn">LOGIN</button>

                              </form>
                         </div>
                    </div>
               </div>
          </div>
          <?php include "common/footer.php"; ?>
          <?php include "common/message-session.php"; ?>
          <script src="js/remove-url-session.js"></script>
     </body>

</html>