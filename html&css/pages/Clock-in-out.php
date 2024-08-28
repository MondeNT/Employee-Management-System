<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login if user is not logged in
    header("Location: ../../php/login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diamond Essence Eatery - Clock In/Out</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900&family=DM+Sans:ital,wght@0,400;0,500;0,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: "Roboto", sans-serif;
            background: url('../../src/assets/img/white-back.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        header {
            background: linear-gradient(180deg, #141318, #252526);
        }
        .navbar-brand, .text-primary, .nav-link {
            color: #cecdd2 !important;
        }
        .btn-primary {
            background-color: goldenrod !important;
            border: none;
        }
        .nav-link:hover, .btn-primary:hover {
            color: gold;
        }
        .font-goldenrod {
            color: goldenrod;
        }
        .bg-goldenrod {
            background-color: goldenrod;
            color: white;
        }
        .digital-clock {
            font-family: "DM Sans", sans-serif;
            font-size: 5rem;
            font-weight: bold;
            color: white;
        }
        .clock-box {
            background-color: #141318;
            border-radius: 10px;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
        }
        .lead, .display-4 {
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand fw-bold fs-4" href="#">Diamond Essence Eatery</a>
                <span class="navbar-text ms-auto">Welcome, <?php echo $_SESSION['username']; ?>!</span>
            </div>
        </nav>
    </header>

    <section class="container py-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="clock-box d-flex align-items-center justify-content-between p-5">
                    <div class="digital-clock"></div>
                    <div class="buttons ms-3">
                        <form method="POST" action="../../php/clock_action.php">
                            <input type="hidden" name="action" value="Clock In">
                            <button type="submit" class="btn btn-success w-100 mb-3">Clock In</button>
                        </form>
                        <form method="POST" action="../../php/clock_action.php">
                            <input type="hidden" name="action" value="Clock Out">
                            <button type="submit" class="btn btn-danger w-100">Clock Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container py-3 mt-n5">
        <section class="mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employee Information</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody id="employee-info-table-body">
                            <?php
                            // Assuming the table 'employees' has columns: 'user_id', 'name', 'surname', and 'email'
                            $sql = "SELECT e.user_id, CONCAT(e.name, ' ', e.surname) AS full_name, e.email
                                    FROM employees e
                                    WHERE e.user_id = '$user_id'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['user_id'] . "</td>";
                                    echo "<td>" . $row['full_name'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No records found.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="mt-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Clock In/Out History</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Record ID</th>
                                <th>Action</th>
                                <th>Date/Time</th>
                            </tr>
                        </thead>
                        <tbody id="history-table-body">
                            <?php
                            $sql = "SELECT cr.id, cr.action, cr.timestamp
                                    FROM clock_records cr
                                    WHERE cr.user_id = '$user_id'";

                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['action'] . "</td>";
                                    echo "<td>" . $row['timestamp'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No records found.</td></tr>";
                            }

                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>

    <footer class="py-3 mt-auto">
        <div class="container">
            <p class="text-center text-primary">© 2024 Diamond Essence Eatery</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateClock() {
            const clockElement = document.querySelector('.digital-clock');
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            clockElement.textContent = `${hours}:${minutes}`;
        }

        function confirmAction(action) {
            const userConfirmed = confirm(`Are you sure you want to ${action}?`);
            if (!userConfirmed) {
                event.preventDefault(); // Prevent the form submission if the user cancels
            } else {
                alert(`${action} successful!`);
            }
        }

        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(event) {
                const action = form.querySelector('input[name="action"]').value;
                confirmAction(action);
            });
        });

        setInterval(updateClock, 1000);
        updateClock();
    </script>
</body>
</html>
