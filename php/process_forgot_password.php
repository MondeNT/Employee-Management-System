<?php
// Start the session
session_start();

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Include Composer's autoload file
require '../vendor/autoload.php';

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_management";

try {
    // Create a new PDO instance and set the error mode to exception
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the employees table
    $stmt = $pdo->prepare("SELECT * FROM employees WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50)); // Generates a random 100-character token
        $expiry_time = date("Y-m-d H:i:s", strtotime('+1 hour')); // Set token expiry time (e.g., 1 hour)

        // Save the token to your database with an expiry time
        $stmt = $pdo->prepare("UPDATE employees SET reset_token = ?, token_expiry = ? WHERE email = ?");
        $stmt->execute([$token, $expiry_time, $email]);

        // Send the email with the reset link
        $resetLink = "http://" . $_SERVER['HTTP_HOST'] . "/Employee%20Management%20System/html&css/pages/reset_password.php?token=" . $token;

        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.office365.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = '202207566@spu.ac.za'; // Your Outlook email
            $mail->Password   = 'mn05032002';     // Your app password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Recipients
            $mail->setFrom('202207566@spu.ac.za', 'Monde');
            $mail->addAddress($email, $user['name']);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = "Hi " . $user['name'] . ",<br><br>You requested a password reset. Click the link below to reset your password:<br><br><a href='$resetLink'>Reset Password</a><br><br>This link will expire in 1 hour.<br><br>If you didn't request this, you can ignore this email.";
            $mail->AltBody = "Hi " . $user['name'] . ",\n\nYou requested a password reset. Visit the following link to reset your password: $resetLink\n\nThis link will expire in 1 hour.\n\nIf you didn't request this, you can ignore this email.";

            $mail->send();
            echo 'Password reset link has been sent to your email.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'No account found with that email address.';
    }
}
?>
