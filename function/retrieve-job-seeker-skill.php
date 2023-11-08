<?php
session_start();

include "../database/conn.php";

// Retrieve user data based on jobseeker_ID
$jobseeker_ID = $_SESSION['jobseeker_ID'];

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
                    echo '<div class="p-0" style="width: fit-content;">
                    <div class="info-body me-lg-2 me-0 ms-lg-2 me-2 ms-2 mt-lg-0 mt-3 mb-lg-3 mb-0"> 
                         <div class="d-flex justify-content-end align-items-center">
                              <p class="info-section p-0 m-0"><span class="info-data">' . $row['skill_name'] . '</span></p>
                              <button id="del-button" type="button" class="pe-0 text-danger" onclick="if (confirm(\'Are you certain that you wish to remove this ' . $row['skill_name'] . ' skill?\')) { window.location = \'../function/delete-job-seeker-skill.php?jobseeker_ID=' . $jobseeker_ID . '&skill_ID=' . $row['skill_ID'] . '\'; }"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill: black; opacity: .3;} svg:hover { opacity: 1;}</style><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                         </div>
                    </div>
                    </div>';
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