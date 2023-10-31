<?php
// Include your database connection or configuration
include "../database/conn.php";

// Check if the image file was uploaded successfully
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
     // Validate file type and size (adjust the values as needed)
     $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
     $maxFileSize = 5 * 1024 * 1024; // 5MB
     if (in_array($_FILES['image']['type'], $allowedTypes) && $_FILES['image']['size'] <= $maxFileSize) {
          $imageData = file_get_contents($_FILES['image']['tmp_name']);
          $imageData = mysqli_real_escape_string($conn, $imageData);
          $jobseeker_id = $_POST['jobseeker_id'];

          // Build the SQL query string
          $sql = "INSERT INTO JOB_SEEKER_IMAGES (jobseeker_ID, profile_image) VALUES ('$jobseeker_id', '$imageData') 
                ON DUPLICATE KEY UPDATE profile_image = '$imageData'";

          if ($conn->query($sql) === TRUE) {
               header("Location: ../job-seeker/preview-profile.php?message=Image%20successfully%20updated");
               exit();
          } else {
               header("Location: ../job-seeker/preview-profile.php?message=Error%20updating%20image");
               exit();
          }
     } else {
          header("Location: ../job-seeker/preview-profile.php?message=Invalid%20image%20format%20or%20size");
          exit();
     }
} else {
     header("Location: ../job-seeker/preview-profile.php?message=Please%20select%20an%20image%20(5MB%20max).");
     exit();
}

// Close the database connection
$conn->close();
?>