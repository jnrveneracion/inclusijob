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
     $query = "SELECT * FROM JOB_SEEKER_EDUCATION_INFO WHERE jobseeker_ID = ? ORDER BY start_year ASC;";
     $stmt = mysqli_prepare($conn, $query);

     if ($stmt === false) {
          echo "Error: " . mysqli_error($conn);
     } else {
          // Bind the jobseeker_ID parameter
          mysqli_stmt_bind_param($stmt, "s", $jobseeker_ID);

          // Execute the prepared statement
          if (mysqli_stmt_execute($stmt)) {
               $result = mysqli_stmt_get_result($stmt);

               // Fetch and store each column's value in PHP variables
               while ($row = mysqli_fetch_assoc($result)) {        
                    $start_year = $row['start_year'];
                    $grad_year = $row['graduation_year'];  
                    $course_highlights = $row['course_highlights'];   

                    echo '<div class="resume-data">
                              <span class="mb-0 fs-5">' . $row['institution_name'] . '</span>&nbsp;(<span class="mb-0">' . $row['start_year'] . ' </span>-<span class="mb-0"> ' . $row['graduation_year'] . '</span>)
                              <p class="mb-0">' . $row['field_of_study'] . ' - ' . $row['school_degree'] . '</p>
                              <p class="mb-2">' . $row['course_highlights'] . '</p>
                         </div>';

                    
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


