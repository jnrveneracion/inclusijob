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
     $mail->Host = 'smtp.gmail.com';
     $mail->SMTPAuth = true;
     $mail->Username = 'inclusijob2023@gmail.com';
     $mail->Password = 'csanypphfapnfxjx';
     $mail->SMTPSecure = 'tls';
     $mail->Port = 587;

     $mail->setFrom('inclusijob2023@gmail.com', 'inclusijob');
     $mail->addAddress($js_email, 'Job Seeker');

     $mail->isHTML(true);
     $mail->Subject = 'InclusiJob | Congratulations';
     $mail->Body = '<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
            }

            .container {
                max-width: 600px;
                margin: 20px auto;
            }

            .header {
                background-color: white;
                color: #0d84f5;
                text-align: center;
                padding: 15px;
            }

            .logo img {
                max-width: 200px;
                height: auto;
            }

            .content {
                padding: 20px;
            }

            .footer {
                background-color: #f4f4f4;
                padding: 10px;
                text-align: center;
                border-radius: 5px;
                margin: 5px;
            }

            .note {
                color: #999;
                font-size: 12px;
                margin-top: 10px;
            }

            .link {
                color: #0d84f5;
                text-decoration: underline;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="header" style="background-color: white; color: #0d84f5; text-align: center; padding: 15px;">
                <div class="logo">
                    <img src="https://scontent.fmnl30-3.fna.fbcdn.net/v/t39.30808-6/408691554_3642240022699858_7657880954236639016_n.jpg?stp=cp6_dst-jpg&_nc_cat=104&ccb=1-7&_nc_sid=3635dc&_nc_eui2=AeGXmjLBoeuti1HbFZdnefUqBaHhFkuczbQFoeEWS5zNtF0IIy88lZGa77MR4IMdv-k8I6Xx0JP4YmQJ85cboxCN&_nc_ohc=mVFODFL57RMAX9s0vcz&_nc_ht=scontent.fmnl30-3.fna&oh=00_AfBg01IC21-OnQTs2MOD49_1uMr9XxMaXjxzox1xdef2Rw&oe=6575C561" alt="Company Logo" style="max-width: 200px; height: auto; border-radius: 12px;">
                </div>
                <h1>Congratulations, ' . $jobSeekerName . '!</h1>
            </div>
            <div class="content" style="padding: 20px;">
                <p style="color: black;">We are pleased to inform you that ' . $company_name . ' has selected you for the position of ' . $job_title . '.</p>
                <p style="color: black;">Your journey with ' . $company_name . ' begins today, ' . date('F j, Y') . '.</p>
                <p style="color: black;">Welcome to the team!</p>
                <p style="color: black;">For more details and to get started, please <a class="link" href="https://inclusijob.com" style="color: #0d84f5; text-decoration: underline; font-weight: bold;">visit your account</a> on our website.</p>
                <div class="note" style="color: #999; font-size: 12px; margin-top: 10px;">Note: This is an automated email. Please do not reply to this message.</div>
            </div>
            <div class="footer" style="background-color: #f4f4f4; padding: 10px; text-align: center; border-radius: 5px; margin: 5px;">
                <p style="color: black;">Thank you for choosing <a class="link" href="https://inclusijob.com" style="color: #0d84f5; text-decoration: underline; font-weight: bold;">InclusiJob</a> for your career journey.</p>
            </div>
        </div>
    </body>
</html>';



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
               'body' => 'Congratulations, ' . $jobSeekerName . '! You\'ve been hired as a ' . $job_title . ' at ' . $company_name . '. Your journey with us begins today, ' . date('F j, Y') . '.Visit your account on inclusijob.com for more details.',
          ]
     );

     echo '<script>console.log("SMS has been sent successfully.")</script>';
} catch (Exception $e) {
     echo '<script>console.log("Email could not be sent. Mailer Error: ' . $mail->ErrorInfo . '")</script>';
     echo '<script>console.log("SMS could not be sent. Twilio Error: ' . $e->getMessage() . '")</script>';

}
?>