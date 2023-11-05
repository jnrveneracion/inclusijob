<?php
session_start();

include "../database/conn.php";

// Retrieve user data based on jobseeker_ID
$jobseeker_ID = $_SESSION['jobseeker_ID'];

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
     mysqli_stmt_bind_param($stmt, "i", $jobseeker_ID);

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

               echo '<div class="col-12 col-xl-4 p-0">
                        <div class="info-body me-lg-2 me-0 ms-lg-2 me-2 ms-2 mt-lg-0 mt-3 mb-lg-3 mb-0" style="min-height: 320px; max-height: 320px;"> 
                            <p class="info-section p-0 m-0"><span class="info-data fs-4">' . $row['job_title'] . '</span><span style="width: fit-content; font-size: 13px; color: rgb(164, 164, 164); font-weight: 400; letter-spacing: 1px;"> ' . $job_duration . ' </span></p>
                            <p class="info-section p-0 m-0"><span class="info-data fs-6">' . $row['company_name'] . '</span></p>
                            <p class="info-section p-0 m-0 mb-0><span class="info-data">' . $row['start_month'] . ' ' . $row['start_year'] . ' - ' . $row['end_month'] . ' ' . (empty(trim($row['end_year'])) ? 'Still in role' : $row['end_year']) . '</span></p>
                            <p class="info-section p-0 m-0"><span class="info-label">Description: </span><div class="info-data" style="min-height: 90px; max-height: 112px; overflow-y: scroll;">' . $row['career_history_description'] . '</div></p>
                            <div class="d-flex justify-content-end">
                                <button id="del-button" type="button" class="text-danger" onclick="if (confirm(\'Are you certain that you wish to remove this career history record associated with ' . $row['job_title'] . ' job title?\')) { window.location = \'../function/delete-job-seeker-career-history.php?jobseeker_ID=' . $jobseeker_ID . '&career_history_ID=' . $row['career_history_ID'] . '\'; }"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill: black; opacity: .3;} svg:hover { opacity: 1;}</style><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                                <button id="btn-outline-b" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#edit-career-history" career-history-id="' . $row['career_history_ID'] . '" job-title="' . $row['job_title'] . '" company-name="' . $row['company_name'] . '" start-year="' . $row['start_year'] . '" start-month="' . $row['start_month'] . '" end-month="' . $row['end_month'] . '" end-year="' . $row['end_year'] . '" still-in-role="' . $row['still_in_role'] . '" career-history-description="' . $row['career_history_description'] . '" aria-controls="offcanvasExample" onclick="openSpecificModalForCareerHistory(this)">Edit</button>
                            </div>
                        </div>
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