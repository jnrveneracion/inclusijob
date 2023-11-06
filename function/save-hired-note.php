<?php
// Include your database connection or configuration
include "../database/conn.php";

// Check if this is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     // Retrieve the data from the Ajax request
     $jobListingId = $_POST['job_listing_id'];
     $jobSeekerId = $_POST['job_seeker_id'];
     $employerId = $_POST['company_id'];
     $hiredNote = $_POST['hired_note'];
     $name = $_POST['name'];

     // Split the string into words using space as the delimiter
     $words = explode(' ', $name);

     // Get the first word (if it exists)
     if (count($words) > 0) {
          $firstWord = $words[0];
     } else {
          // Handle the case where there are no words in the string
          $firstWord = 'No name provided';
     }

     // Check if the record already exists based on jobseeker_ID, company_ID, and job_listing_ID
     $checkSql = "SELECT * FROM HIRED_NOTES WHERE jobseeker_ID = ? AND company_ID = ? AND job_listing_ID = ?";
     $checkStmt = $conn->prepare($checkSql);
     $checkStmt->bind_param("sss", $jobSeekerId, $employerId, $jobListingId);
     $checkStmt->execute();
     $checkResult = $checkStmt->get_result();

     if ($checkResult->num_rows > 0) {
         // The record already exists, update it or handle the case as needed
         // For example, you can update the existing record with the new note
         $updateSql = "UPDATE HIRED_NOTES SET note = ? WHERE jobseeker_ID = ? AND company_ID = ? AND job_listing_ID = ?";
         $updateStmt = $conn->prepare($updateSql);
         $updateStmt->bind_param("ssss", $hiredNote, $jobSeekerId, $employerId, $jobListingId);

         if ($updateStmt->execute()) {
             header("Location: ../employer/job-application-review.php?tab=hired&j=" . $jobListingId . "&message=You%20have%20successfully%20updated%20hired%20note%20for%20". $firstWord ."");
             exit();
         } else {
             echo "Error updating the interview note: " . $conn->error;
         }
     } else {
         // The record does not exist, insert a new one
         $insertSql = "INSERT INTO HIRED_NOTES (jobseeker_ID, company_ID, job_listing_ID, note) VALUES (?, ?, ?, ?)";
         $insertStmt = $conn->prepare($insertSql);
         $insertStmt->bind_param("ssss", $jobSeekerId, $employerId, $jobListingId, $hiredNote);

         if ($insertStmt->execute()) {
             header("Location: ../employer/job-application-review.php?tab=hired&j=" . $jobListingId . "&message=You%20have%20successfully%20set%20hired%20note%20for%20". $firstWord ."");
             exit();
         } else {
             echo "Error inserting the interview note: " . $conn->error;
         }
     }

     // Close the database connection
     $checkStmt->close();
     $insertStmt->close();
     $updateStmt->close();
     $conn->close();
} else {
     // Handle non-POST requests
     echo "Invalid request.";
}
?>
