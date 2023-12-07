<?php
require 'vendor/autoload.php';
require 'vendor/twilio/sdk/src/Twilio/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Twilio\Rest\Client;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $visitor_email = $_POST['email'];

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
        $mail->addAddress($visitor_email, 'Visitor');

        $mail->isHTML(true);
        $mail->Subject = 'Subject Here';
        $mail->Body    = 'Email content here';

        $mail->send();
        $emailMessage = 'Email has been sent successfully.';

        // Send SMS using Twilio
        $twilioSid = 'ACc4ce56b6345ac73c2f6e9b18ff14dc43';
        $twilioToken = '';
        $twilioNumber = '+15153932108';
        $visitorNumber = '+639451398458'; // Format the number with the country code

        $twilio = new Client($twilioSid, $twilioToken);

        $twilio->messages->create(
            $visitorNumber,
            [
                'from' => $twilioNumber,
                'body' => 'SMS content here',
            ]
        );

        $smsMessage = 'SMS has been sent successfully.';
    } catch (Exception $e) {
        $emailMessage = 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        $smsMessage = 'SMS could not be sent. Twilio Error: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email and SMS Form</title>
</head>
<body>

<?php if (isset($emailMessage)) : ?>
    <p><?php echo $emailMessage; ?></p>
<?php endif; ?>

<?php if (isset($smsMessage)) : ?>
    <p><?php echo $smsMessage; ?></p>
<?php endif; ?>

<form method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Send Email and SMS</button>
</form>

</body>
</html>
