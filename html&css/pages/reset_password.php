<?php
// Enable error reporting and display errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_management";

try {
    // Create a new PDO instance and set error mode to exception
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Check if a token is provided in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Prepare SQL statement to check if the token is valid and not expired in the employees table
    $stmt = $pdo->prepare("
        SELECT u.id AS user_id, e.id AS employee_id
        FROM users u
        JOIN employees e ON u.id = e.user_id
        WHERE e.reset_token = ? AND e.token_expiry > NOW()
    ");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        // If the form is submitted, process the password reset
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Hash the new password
            $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

            // Update the user's password in the users table
            $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt->execute([$new_password, $user['user_id']]);

            if ($stmt->rowCount() > 0) {
                // Clear the reset token and expiry in the employees table
                $stmt = $pdo->prepare("UPDATE employees SET reset_token = NULL, token_expiry = NULL WHERE id = ?");
                $stmt->execute([$user['employee_id']]);

                // Redirect to the index page with a success message
                echo "<script>alert('Your password has been reset successfully!'); window.location.href='../../html&css/pages/index.html';</script>";
                exit;
            } else {
                echo "<script>alert('Password reset failed. Please try again.');</script>";
            }
        }
    } else {
        // If the token is invalid or expired, inform the user
        echo "<script>alert('Invalid or expired token.');</script>";
    }
} else {
    // If no token is provided, inform the user
    echo "<script>alert('No token provided.');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>

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
                <h1 class="card-title text-center text-black">Reset Password</h1>
                <p class="card-text text-center text-black">Please enter your new password below.</p>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Core JS Files -->
    <script src="../../vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Vendor JS Files -->
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
