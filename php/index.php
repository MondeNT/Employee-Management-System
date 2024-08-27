<?php
session_start();

if ($_SESSION['role'] == 'admin') {
    echo '<a href="admin_dashboard.php">Admin Dashboard</a>';
}

if ($_SESSION['role'] == 'manager') {
    echo '<a href="manager_dashboard.php">Manager Dashboard</a>';
}

if ($_SESSION['role'] == 'employee') {
    echo '<a href="employee_dashboard.php">Employee Dashboard</a>';
}
?>
