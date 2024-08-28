<?php
session_start();

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_management";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for a successful connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ''; // Initialize the message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if email exists in the employees table
    $sql = "SELECT * FROM employees WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generate a secure token
        $token = bin2hex(random_bytes(32));
        $expires_at = date("Y-m-d H:i:s", strtotime("+1 hour"));

        // Insert the token into the password_resets table
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $token, $expires_at);
        $stmt->execute();

        // Send reset email
        $reset_link = "http://localhost/Employee%20Management%20System/html&css/pages/reset_password.php?token=$token";
        $subject = "Password Reset Request";
        $message_body = "Hi, click the following link to reset your password: $reset_link";
        $headers = "From: noreply@yourdomain.com";

        if (mail($email, $subject, $message_body, $headers)) {
            $message = "An email has been sent to your address with instructions to reset your password.";
        } else {
            $message = "Failed to send the email. Please try again.";
        }
    } else {
        $message = "No account found with that email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <!-- External CSS Links -->
    <link rel="stylesheet" href="../../vendor/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../../vendor/notyf/notyf.min.css">
    <link rel="stylesheet" href="../css/volt.css">

    <!-- Internal CSS -->
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .background-blur {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('../../src/assets/img/forgot-background.png');
            background-size: cover;
            background-position: center;
            filter: blur(8px);
            z-index: -1;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            position: relative;
            z-index: 1;
        }

        .back-link-container {
            position: absolute;
            top: 5rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
        }

        .text-center {
            text-align: center;
            margin-bottom: 1rem;
        }

        .text-black {
            color: white;
        }

        .back-link {
            text-decoration: none;
            color: white;
        }

        .back-link:hover {
            text-decoration: underline;
            color: goldenrod;
        }

        .icon-normal {
            width: 1.5rem;
            height: 1.5rem;
        }

        .card {
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            background-color: white;
            z-index: 2;
        }

        .card-title {
            font-size: 2rem;
        }

        .card-text {
            font-size: 1rem;
        }

        .form-control {
            font-size: 0.875rem;
        }

        .btn-primary {
            font-size: 0.875rem;
            padding: 0.75rem 1.5rem;
        }

        .alert {
            margin-top: 1rem;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <div class="background-blur"></div>

    <main>
        <section class="main-container">
            <div class="back-link-container">
                <p class="text-center">
                    <a href="../../html&css/pages/index.html" class="d-flex align-items-center justify-content-center back-link">
                        <svg class="icon-normal me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                        </svg>
                        Back to Home
                    </a>
                </p>
            </div>
            <div class="card">
                <h1 class="card-title text-center text-black">Forgot Password?</h1>
                <p class="card-text text-center text-black">Don't fret! Just type in your email and we will send<br>you a code to reset your password!</p>
                <form action="../../php/process_forgot_password.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="your-email@example.com" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Recover password</button>
                    </div>
                </form>
                <?php if ($message): ?>
                    <div class="alert alert-info mt-3">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <!-- Core -->
    <script src="../../vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Vendor JS -->
    <script src="../../vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="../../vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="../../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="../../vendor/chartist/dist/chartist.min.js"></script>
    <script src="../../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <script src="../../vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <script src="../../vendor/notyf/notyf.min.js"></script>
    <script src="../../vendor/simplebar/dist/simplebar.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../../assets/js/volt.js"></script>
</body>

</html>
