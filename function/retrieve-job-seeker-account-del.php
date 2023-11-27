<?php
     include "../database/conn.php";

     // Fetch records from the REQUEST_RESET_PASSWORD table
     $query = "SELECT 
               REQUEST_ACCOUNT_DELETION.*, 
               DATE_FORMAT(REQUEST_ACCOUNT_DELETION.date_added, '%M %d, %Y %h:%i %p') AS formatted_date_added,
               DATE_FORMAT(REQUEST_ACCOUNT_DELETION.date_updated, '%M %d, %Y %h:%i %p') AS formatted_date_updated
               FROM REQUEST_ACCOUNT_DELETION
               WHERE REQUEST_ACCOUNT_DELETION.user_type = 'Job Seeker';";

     $result = mysqli_query($conn, $query);

     // Check for errors
     if (!$result) {
          die("Error: " . mysqli_error($conn));
     }

     // Check if there are any records
if (mysqli_num_rows($result) > 0) {

     // Loop through the records and display them in the table
     while ($row = mysqli_fetch_assoc($result)) {
          $action = !empty($row['deletion_status']) ? '
               <button class="btn btn-success btn-outline-success border-1 text-white mb-1" style="font-size: 10px;">User Data Deleted</button><br><span style="font-size: 10px;">' . $row['formatted_date_updated'] . '</span>'
               : 
               '<button class="btn btn-light btn-outline-secondary border-1 btn-delete-job-seeker-data" style="font-size: 10px;" data-request-deletion-id="' . $row['request_password_id'] . '" data-job-seeker-id="' . $row['user_ID'] . '">Delete User Data</button>'
               ;

          echo '<tr>';
               echo '<td>' . $row['request_ID'] . '</td>';
               echo '<td>' . $row['user_email'] . '</td>';
               echo '<td>' . $row['formatted_date_added'] . '</td>';
               echo '<td>'. $action .'</td>';
          echo '</tr>';
     }

} else {
     // No records available
     echo '<tr><td colspan="6">No records available.</td></tr>';
 }

     // Free the result set
     mysqli_free_result($result);

     // Close the database connection
     mysqli_close($conn);
?>