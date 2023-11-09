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
$query = "SELECT * FROM JOB_SEEKER_CAREER_HISTORY WHERE jobseeker_ID = ? ORDER BY start_year ASC;";
$stmt = mysqli_prepare($conn, $query);

$monthMap = [
     "January" => 1,
     "February" => 2,
     "March" => 3,
     "April" => 4,
     "May" => 5,
     "June" => 6,
     "July" => 7,
     "August" => 8,
     "September" => 9,
     "October" => 10,
     "November" => 11,
     "December" => 12
];




if ($stmt === false) {
     echo "Error: " . mysqli_error($conn);
} else {
     // Bind the jobseeker_ID parameter
     mysqli_stmt_bind_param($stmt, "s", $jobseeker_ID);

     // Execute the prepared statement
     if (mysqli_stmt_execute($stmt)) {
          $result = mysqli_stmt_get_result($stmt);
          // Declare the $job_duration variable outside of the loop.
          $job_duration = "";

          while ($row = mysqli_fetch_assoc($result)) {
               $startMonth = $row["start_month"];
               $endMonth = $row["end_month"];

               $startMonthNumeric = isset($monthMap[$startMonth]) ? $monthMap[$startMonth] : null;
               $endMonthNumeric = isset($monthMap[$endMonth]) ? $monthMap[$endMonth] : null;

               // Calculate the total number of months based on month and year values
               $totalMonth = 0;

               if (!empty($row['end_year'])) {
                    $totalMonth = ($row['end_year'] - $row['start_year']) * 12;
                    $totalMonth += $endMonthNumeric - $startMonthNumeric;
               }

               // Calculate the job duration.
               if (!empty($row['end_year'])) {
                    if ($row['start_year'] === $row['end_year'] && $startMonth === $endMonth) {
                         $job_duration = "for a month";
                    } else {
                         $job_duration = ($totalMonth >= 12)
                              ? (floor($totalMonth / 12) == 1 ? "1 year" : floor($totalMonth / 12) . " years")
                              : ($totalMonth > 1
                                   ? $totalMonth . " months"
                                   : "Less than a year");
                    }
               } else {
                    $job_duration = "Still in role";
               }

               echo '<div class="resume-data">
                         <span class="mb-0 fs-5">' . $row['job_title'] . '</span>&nbsp;(' . $job_duration . ')
                         <p class="mb-0">' . $row['company_name'] . '</p>
                         <p class="mb-0">' . $row['start_month'] . ' ' . $row['start_year'] . ' - ' . $row['end_month'] . ' ' . (empty(trim($row['end_year'])) ? 'Still in role' : $row['end_year']) . '</p>
                         <p class="mb-2">' . $row['career_history_description'] . '</p>
                    </div>';     

               $job_duration = "";
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