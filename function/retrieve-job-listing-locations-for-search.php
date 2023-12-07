<?php
include "../database/conn.php";

// Create a prepared statement to select data
$query = "SELECT DISTINCT job_location FROM `JOB_LISTING`;";
$stmt = mysqli_prepare($conn, $query);

if ($stmt === false) {
     echo "Error: " . mysqli_error($conn);
} else {
     if (mysqli_stmt_execute($stmt)) {
          $result = mysqli_stmt_get_result($stmt);

          // Check if there are records
          if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['job_location'] . '">' . $row['job_location'] . '</option>';
               }
          } else {
               echo '';
          }
     } else {
          echo "Error: " . mysqli_error($conn);
     }

     // Close the prepared statement
     mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>