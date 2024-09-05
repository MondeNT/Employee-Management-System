<?php
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

$employee = null; // Initialize the employee variable

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    // Fetch the employee data
    $sql = "SELECT * FROM employees WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
    } else {
        echo "Employee not found.";
        exit;
    }

    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "UPDATE employees SET name=?, surname=?, gender=?, age=?, phone=?, email=? WHERE user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $name, $surname, $gender, $age, $phone, $email, $user_id);

    if ($stmt->execute()) {
        // Redirect to edit-employees.php after successful update with a success message
        header("Location: edit-employees.php?message=Changes have been saved successfully.");
        exit();
    } else {
        echo "<script>alert('Error updating employee: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" href="../../vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link type="text/css" href="../../vendor/notyf/notyf.min.css" rel="stylesheet">
    <link type="text/css" href="../../css/volt.css" rel="stylesheet">

    <style>
        /* Modal background to dim the page */
        .modal-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Center the modal form */
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            z-index: 1000;
        }

        .modal-content .form h2 {
            font-size: 1.75rem;
            color: #222;
            text-align: center;
            margin-bottom: 20px;
        }

        .modal-content .form .form-element {
            margin: 15px 0px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-content .form .form-element label {
            font-size: 17px;
            color: #222;
            width: 100px;
            text-align: right;
            margin-right: 10px;
        }

        .modal-content .form .form-element input[type="text"],
        .modal-content .form .form-element input[type="email"],
        .modal-content .form .form-element input[type="tel"],
        .modal-content .form .form-element input[type="number"],
        .modal-content .form .form-element select {
            flex-grow: 1;
            padding: 10px;
            outline: none;
            border: 1px solid #aaa;
            border-radius: 5px;
        }

        .modal-content .form .form-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        /* Button styles */
        .btn-save {
            background-color: goldenrod;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            flex: 1;
            margin-right: 10px;
        }

        .btn-save:hover {
            background-color: gold;
        }

        .btn-cancel {
            background-color: #ccc;
            color: #333;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            flex: 1;
        }

        .btn-cancel:hover {
            background-color: #bbb;
        }
    </style>

    <script>
        function confirmSubmit(event) {
            event.preventDefault(); // Prevent form submission
            if (confirm("Are you sure you want to save these changes?")) {
                event.target.submit(); // Submit the form if confirmed
            }
        }
    </script>
</head>

<body>
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="form">
            <h2>Edit Employee</h2>
            <?php if ($employee): ?>
            <form method="POST" action="update_employee.php?id=<?php echo $employee['user_id']; ?>" onsubmit="confirmSubmit(event)">
                <input type="hidden" name="user_id" value="<?php echo $employee['user_id']; ?>">
                <div class="form-element">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $employee['name'] ?? ''; ?>" required>
                </div>
                <div class="form-element">
                    <label for="surname">Surname</label>
                    <input type="text" id="surname" name="surname" value="<?php echo $employee['surname'] ?? ''; ?>" required>
                </div>
                <div class="form-element">
                    <label for="role">Role</label>
                    <select id="role" name="role">
                        <option value="admin" <?php echo isset($employee['role']) && $employee['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                        <option value="manager" <?php echo isset($employee['role']) && $employee['role'] == 'manager' ? 'selected' : ''; ?>>Manager</option>
                        <option value="employee" <?php echo isset($employee['role']) && $employee['role'] == 'employee' ? 'selected' : ''; ?>>Employee</option>
                    </select>
                </div>
                <div class="form-element">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender">
                        <option value="Male" <?php echo isset($employee['gender']) && $employee['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo isset($employee['gender']) && $employee['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                    </select>
                </div>
                <div class="form-element">
                    <label for="age">Age</label>
                    <input type="number" id="age" name="age" value="<?php echo $employee['age'] ?? ''; ?>">
                </div>
                <div class="form-element">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo $employee['phone'] ?? ''; ?>">
                </div>
                <div class="form-element">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $employee['email'] ?? ''; ?>">
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn-save">Save Changes</button>
                    <button type="button" class="btn-cancel" onclick="window.location.href='edit-employees.php';">Cancel</button>
                </div>
            </form>
            <?php else: ?>
            <p>Employee not found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
