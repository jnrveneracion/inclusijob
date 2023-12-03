<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $visitor_email = $_POST['email'];

    try {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'inclusijob2023@gmail.com'; // Your Gmail address
        $mail->Password   = 'csanypphfapnfxjx'; // Your Gmail app password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('inclusijob2023@gmail.com', 'inclusijob');
        $mail->addAddress($visitor_email, 'Visitor');

        $mail->isHTML(true);
        $mail->Subject = 'Subject Here';
        $mail->Body    = 'Email content here';

        $mail->send();
        $message = 'Email has been sent successfully.';
    } catch (Exception $e) {
        $message = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Form</title>
</head>
<body>

<?php if (isset($message)) : ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<form method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Send Email</button>
</form>

</body>
</html>
