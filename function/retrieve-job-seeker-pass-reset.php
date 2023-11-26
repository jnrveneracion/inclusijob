<?php
include "../database/conn.php";

// Fetch records from the REQUEST_RESET_PASSWORD table
$query = "SELECT 
               REQUEST_RESET_PASSWORD.*, 
               JOB_SEEKER_SIGNUP_INFO.email,
               DATE_FORMAT(REQUEST_RESET_PASSWORD.date_added, '%M %d, %Y %h:%i %p') AS formatted_date_added,
               DATE_FORMAT(REQUEST_RESET_PASSWORD.date_updated, '%M %d, %Y %h:%i %p') AS formatted_date_updated
          FROM REQUEST_RESET_PASSWORD
          LEFT JOIN JOB_SEEKER_SIGNUP_INFO
          ON JOB_SEEKER_SIGNUP_INFO.jobseeker_ID = REQUEST_RESET_PASSWORD.user_ID
          WHERE REQUEST_RESET_PASSWORD.user_type = 'Job Seeker'";

$result = mysqli_query($conn, $query);

// Check for errors
if (!$result) {
     die("Error: " . mysqli_error($conn));
}

// Loop through the records and display them in the table
while ($row = mysqli_fetch_assoc($result)) {
     $action = !empty($row['recovery_password']) ? '<button class="btn btn-success btn-outline-success border-1 text-white mb-1" style="font-size: 10px;">Password Recovery Set</button><br><span style="font-size: 10px;">' . $row['formatted_date_updated'] . '</span>' : '<button class="btn btn-light btn-outline-secondary border-1 btn-update-password" style="font-size: 10px;" data-request-password-id="' . $row['request_password_id'] . '" data-job-seeker-id="' . $row['user_ID'] . '">Update Password</button>';
     $svgCopy = '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M384 336H192c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16l140.1 0L400 115.9V320c0 8.8-7.2 16-16 16zM192 384H384c35.3 0 64-28.7 64-64V115.9c0-12.7-5.1-24.9-14.1-33.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1H192c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H256c35.3 0 64-28.7 64-64V416H272v32c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192c0-8.8 7.2-16 16-16H96V128H64z"/></svg>';
     $svgCopyShow = !empty($row['recovery_password']) ? 'd-block' : 'd-none';

     echo '<tr>';
          echo '<td>' . $row['request_ID'] . '</td>';
          echo '<td>' . $row['email'] . '</td>';
          echo '<td>' . $row['formatted_date_added'] . '</td>';
          echo '<td>'. $action .'</td>';
          echo '<td class="position-relative">
                    <span class="password-cell" data-password="' . $row['recovery_password'] . '">' . str_repeat('*', strlen($row['recovery_password'])) . '</span>
                    <span class="password-cell d-none" data-password="' . $row['recovery_password'] . '">' . $row['recovery_password']. '</span>
                    <button style="top: 31%; right: 12px;" class="position-absolute btn-copy-password ' . $svgCopyShow . '">' . $svgCopy . '</button>
               </td>';
     echo '</tr>';
}

// Free the result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($conn);
?>