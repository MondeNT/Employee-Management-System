<?php
// Check if the user ID is set in the URL
if (isset($_GET['id'])) {
    // Get the user ID from the URL
    $user_id = $_GET['id'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "employee_management";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Begin transaction
    $conn->begin_transaction();

    try {
        // SQL query to delete associated records in other tables
        // Adjusted the column name from 'user_id' to 'id' for the users table
        $sql_delete_attendance = "DELETE FROM employees WHERE user_id = ?";
        $sql_delete_timesheets = "DELETE FROM users WHERE id = ?"; // Changed to 'id'
        // Add similar queries for other related tables if necessary

        // Prepare, bind, and execute the attendance deletion statement
        if ($stmt_attendance = $conn->prepare($sql_delete_attendance)) {
            $stmt_attendance->bind_param("i", $user_id);
            $stmt_attendance->execute();
            $stmt_attendance->close();
        }

        // Prepare, bind, and execute the timesheets deletion statement
        if ($stmt_timesheets = $conn->prepare($sql_delete_timesheets)) {
            $stmt_timesheets->bind_param("i", $user_id); // Still binding $user_id because it's passed as id in users table
            $stmt_timesheets->execute();
            $stmt_timesheets->close();
        }

        // SQL query to delete the employee with the given user ID
        $sql_delete_employee = "DELETE FROM employees WHERE user_id = ?";

        // Prepare, bind, and execute the employee deletion statement
        if ($stmt_employee = $conn->prepare($sql_delete_employee)) {
            $stmt_employee->bind_param("i", $user_id);
            $stmt_employee->execute();
            $stmt_employee->close();
        }

        // Commit the transaction if everything went well
        $conn->commit();

        // Redirect back to the page with the employee table after deletion
        header("Location: edit-employees.php");
        exit();
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
