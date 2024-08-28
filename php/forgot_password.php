<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if email exists in the employees table
    $sql = "SELECT * FROM employees WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate a secure token
        $token = bin2hex(random_bytes(32));
        $expires_at = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Insert token into password_resets table
        $sql = "INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $email, $token, $expires_at);
        $stmt->execute();

        // Send reset email
        $reset_link = "http://localhost/Employee%20Management%20System/html&css/pages/reset_password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Hi, click the following link to reset your password: $reset_link";
        $headers = "From: noreply@yourdomain.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "An email has been sent to your address with instructions to reset your password.";
        } else {
            echo "Failed to send the email. Please try again.";
        }
    } else {
        echo "No account found with that email.";
    }
}
?>
