<?php
session_start();

include "../database/conn.php";

// Retrieve user data based on jobseeker_ID
if (isset($_SESSION["jobseeker_ID"])) {
     $jobseeker_ID = $_SESSION['jobseeker_ID'];
} elseif (isset($_GET['jobseeker'])) {
     $jobseeker_ID = $_GET['jobseeker'];
}

// Create a prepared statement to select data
$query = "SELECT * FROM JOB_SEEKER_SKILL WHERE jobseeker_ID = ? ORDER BY date_added ASC;";
$stmt = mysqli_prepare($conn, $query);

if ($stmt === false) {
     echo "Error: " . mysqli_error($conn);
} else {
     // Bind the jobseeker_ID parameter
     mysqli_stmt_bind_param($stmt, "s", $jobseeker_ID);

     if (mysqli_stmt_execute($stmt)) {
          $result = mysqli_stmt_get_result($stmt);

          // Check if there are records
          if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li>' . $row['skill_name'] . '</li>';
               }
          } else {
               echo '<div class="me-lg-2 me-0 ms-lg-2 me-2 ms-2 mt-lg-0 mt-3 mb-lg-3 mb-0"></div>';
          }
     } else {
          echo "Error: " . mysqli_error($conn);
     }

     ?>

     <?php

     // Close the prepared statement
     mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>