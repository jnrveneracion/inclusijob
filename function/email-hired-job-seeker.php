<?php
require 'vendor/autoload.php';
require 'vendor/twilio/sdk/src/Twilio/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Twilio\Rest\Client;

try {
     // Send email
     $mail = new PHPMailer(true);

     $mail->isSMTP();
     $mail->Host       = 'smtp.gmail.com';
     $mail->SMTPAuth   = true;
     $mail->Username   = 'inclusijob2023@gmail.com';
     $mail->Password   = 'csanypphfapnfxjx';
     $mail->SMTPSecure = 'tls';
     $mail->Port       = 587;

     $mail->setFrom('inclusijob2023@gmail.com', 'inclusijob');
     $mail->addAddress($js_email, 'Job Seeker');

     $mail->isHTML(true);
     $mail->Subject = 'InclusiJob | Congratulations';
     $mail->Body    = 'Congrats';

     $mail->send();
     echo '<script>console.log("Email has been sent successfully.")</script>';

     // Send SMS using Twilio
     $twilioSid = 'ACc4ce56b6345ac73c2f6e9b18ff14dc43';
     $twilioToken = 'd98181fe46198a92e166ebe6f8ab1b1c';
     $twilioNumber = '+15153932108';
     $jobseekerNumber = '+63' . $js_contact_no; // Format the number with the country code

     $twilio = new Client($twilioSid, $twilioToken);

     $twilio->messages->create(
          $jobseekerNumber,
          [
               'from' => $twilioNumber,
               'body' => 'This is a message from InclusiJob confirming that you\'ve been hired as' . $job_title,
          ]
     );

     echo '<script>console.log("SMS has been sent successfully.")</script>';
} catch (Exception $e) {
     echo '<script>console.log("Email could not be sent. Mailer Error: ' . $mail->ErrorInfo . '")</script>';
     echo '<script>console.log("SMS could not be sent. Twilio Error: ' . $e->getMessage() . '")</script>';
     
}
?>
