<?php
session_start();

include "../database/conn.php";

// Check connection
$jobseeker_ID = $_GET['jobseeker'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the files from the database
$sql = "SELECT * FROM `JOB_SEEKER_UPLOADED_RESUME` WHERE jobseeker_ID = '$jobseeker_ID'";
$result = mysqli_query($conn, $sql);
$showResumeTrue = "d-none";

// Generate the HTML code for the files
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fileData = $row['resume_file'];
        $fileType = finfo_buffer(finfo_open(FILEINFO_MIME_TYPE), $fileData);

        echo "<div class='file-container'>";
        if (strpos($fileType, 'image') !== false) {
            // Display image
            $imageData = base64_encode($fileData);
            $uploadedResume = "<div style='min-height: 1200px; height: 1200px; overflow: scroll;'><img width='100%' src='data:image/png;base64," . $imageData . "' alt='Image'></div>";
            $uploadResumeTrue = !empty($fileData) ? 'd-none' : 'd-block';
            $showResumeTrue = !empty($fileData) ? 'd-block' : 'd-none';

        } elseif (strpos($fileType, 'pdf') !== false) {
            // Display PDF link
          //   echo "<a href='data:application/pdf;base64," . base64_encode($fileData) . "' target='_blank'>View PDF</a>";
            $uploadedResume = "<iframe src='data:application/pdf;base64," . base64_encode($fileData) . "' width='100%' height='700px'></iframe>";
            $uploadResumeTrue = !empty($fileData) ? 'd-none' : 'd-block';
            $showResumeTrue = !empty($fileData) ? 'd-block' : 'd-none';
        }
        echo "</div>";
    }
    mysqli_free_result($result); // Free result set
} else {
    echo "Error in query: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
