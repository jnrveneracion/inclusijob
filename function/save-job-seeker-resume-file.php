<?php
// handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

     // Include your database connection or configuration
     include "../database/conn.php";

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // check if the file was uploaded successfully
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $jobseeker_id = $_POST['jobseeker_id'];
        $fileData = file_get_contents($_FILES['file']['tmp_name']);
        $fileData = mysqli_real_escape_string($conn, $fileData);

        // insert the file data into the database
        $sql = "INSERT INTO `JOB_SEEKER_UPLOADED_RESUME` (jobseeker_ID ,`resume_file`) VALUES ( '$jobseeker_id' ,'$fileData')";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../job-seeker/preview-profile.php?message=file%20submitted%20successfully#resume-section");
            exit();
        } else {
          //   echo "<p>Error submitting file: " . $conn->error . "</p>";
            header("Location: ../job-seeker/preview-profile.php?message=Error%20submitting%20file#resume-section");
            exit();
        }
    } else {
     $conn->close();
     //    echo "<p>No file selected.</p>";
        header("Location: ../job-seeker/preview-profile.php?message=No%20file%20selected");
        exit();
    }

    // close the database connection
   
    
}
?>
