<?php
session_start();

if (isset($_SESSION['jobseeker_ID'])) {
    header("Location: home.php");
    exit();
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    include "../database/conn.php";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT jobseeker_ID, jobseeker_password FROM JOB_SEEKER_SIGNUP_INFO WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Get the result and fetch the row data
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['jobseeker_password'];

        // Check if the password is correct
        if (password_verify($password, $hashed_password)) {
            $_SESSION['jobseeker_ID'] = $row['jobseeker_ID'];

            // Redirect to home.php
            header("Location: home.php");
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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.responsivevoice.org/responsivevoice.js"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/index-style.css">
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
     <?php include "../common/head-inside-folder.php"; ?>
     <div class="breadcrumbs">
          <div class="page-indicator d-flex justify-content-center justify-content-lg-start">
               <a href="../index.php" class="no-decor-link"><h6 class="page-indicator-txt">Home</h6></a> 
               <a href="" class="no-decor-link"><h6 class="page-indicator-txt divider">></h6></a>
               <a href="#" class="no-decor-link"><h6 class="page-indicator-txt active">Job Seeker Login</h6></a>
          </div>
     </div>
     <div class="body d-flex justify-content-center align-items-center m-5 p-5" id="login-body">
          <div>
               <div class="login-section">
                    <div>
                         <h5 class="login-head-txt">Job Seeker Login</h5>
                    </div>
                    <div class="d-grid justify-content-center align-items-center">
                         <form action="" method="post" class="d-grid justify-content-center align-items-center">
                              <p id="login-message">
                                   <?php if (isset($error)) {
                                   echo $error;
                              } ?>
                              </p>
                              <input placeholder="email" class="login-input" type="email" name="email" id="username" required>
                              <input placeholder="password" class="login-input" type="password" name="password" id="password" required>
                              <!-- <span onclick="log()">log</span> -->
                              <button type="submit" class="login-btn">LOGIN</button>

                         </form>
                         <a href="job-seeker-signup.php" class="text-center login-footer"><span class="">Or sign up</span></a>
                    </div>
               </div>
          </div>
     </div>
     <?php include "../common/footer-inside-folder.php"; ?>
     <?php include "../common/message-session.php"; ?>
     <script src="../js/remove-url-session.js"></script>
</body>
</html>

