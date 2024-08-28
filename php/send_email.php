<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../vendor/autoload.php'; // Ensure this path is correct based on your project structure

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     // Enable verbose debug output
    $mail->isSMTP();                                           // Send using SMTP
    $mail->Host       = 'smtp.office365.com';                  // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
    $mail->Username   = '202207566@spu.ac.za';               // SMTP username (your Outlook email)
    $mail->Password   = 'mn05032002';                   // SMTP password (use App Password if 2FA is enabled)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption, PHPMailer::ENCRYPTION_SMTPS also accepted
    $mail->Port       = 587;                                   // TCP port to connect to

    // Recipients
    $mail->setFrom('202207566@spu.ac.za', 'Monde');          // Sender's email and name
    $mail->addAddress('202207566@spu.ac.za', 'Monde');       // Add a recipient (you can change this to the recipient's email)

    // Content
    $mail->isHTML(true);                                       // Set email format to HTML
    $mail->Subject = 'SPU';                    // Email subject
    $mail->Body    = ' Hello<b>World!</b>'; // HTML message body
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // Plain text body for non-HTML clients

    $mail->send();                                             // Send the email
    echo 'Message has been sent';                              // Success message
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; // Error message
}
