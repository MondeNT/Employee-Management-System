<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Start the session and store user info
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];

            // Log the login action in the logins_logouts table
            $userId = $user['id'];
            $action = "Logged in";
            $time = date('Y-m-d H:i:s');
            $logSql = "INSERT INTO logins_logouts (user, action, time) VALUES ('$username', '$action', '$time')";
            if ($conn->query($logSql) === TRUE) {
                // Redirect based on role
                if ($user['role'] == 'admin' || $user['role'] == 'manager') {
                    header("Location: http://localhost/Employee%20Management%20System/html&css/pages/dashboard/dashboard.html");
                } else if ($user['role'] == 'employee') {
                    header("Location: http://localhost/Employee%20Management%20System/html&css/pages/Clock-in-out.php");
                }
                exit();
            } else {
                echo "Error logging login action: " . $conn->error;
            }
        } else {
            echo "Invalid password. <a href='login.php'>Try again</a>";
        }
    } else {
        echo "No user found with that username. <a href='login.php'>Try again</a>";
    }
}

$conn->close();
?>
