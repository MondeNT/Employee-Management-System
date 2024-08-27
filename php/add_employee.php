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
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $role = $_POST['role'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Insert into the users table
    $sql_user = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt_user = $conn->prepare($sql_user);
    $stmt_user->bind_param("sss", $username, $password, $role);

    if ($stmt_user->execute()) {
        // Get the last inserted user ID
        $user_id = $conn->insert_id;

        // Insert into the employees table
        $sql_employee = "INSERT INTO employees (user_id, name, surname, gender, age, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt_employee = $conn->prepare($sql_employee);
        $stmt_employee->bind_param("isssiss", $user_id, $name, $surname, $gender, $age, $phone, $email);

        if ($stmt_employee->execute()) {
            echo "Employee added successfully!";
            // Optionally redirect to a success page
        } else {
            echo "Error: " . $stmt_employee->error;
        }
    } else {
        echo "Error: " . $stmt_user->error;
    }
}
$conn->close();
?>
