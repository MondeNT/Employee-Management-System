<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Volt Free Bootstrap Dashboard - Bootstrap Tables</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt Free Bootstrap Dashboard - Bootstrap Tables">
    <meta name="author" content="Themesberg">
    <meta name="description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="og:title" content="Volt Free Bootstrap Dashboard - Bootstrap Tables">
    <meta property="og:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="og:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
    <meta property="twitter:title" content="Volt Free Bootstrap Dashboard - Bootstrap Tables">
    <meta property="twitter:description" content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta property="twitter:image" content="https://themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="../../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../assets/img/favicon/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="../../vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="../../vendor/notyf/notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="../css/volt.css" rel="stylesheet">

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    <style>
        .navbar-brand,
        .text-primary {
            color: #cecdd2 !important;
        }

        .nav-link {
            font-weight: 500;
            color: #cecdd2;
        }

        body {
            font-family: "Roboto", sans-serif;
        }

        .navbar,
        .bg-gray-800 {
            background: linear-gradient(180deg, #141318, #252526) !important;
        }

        .navbar-brand,
        .text-primary {
            color: #cecdd2 !important;
        }

        header {
            background: linear-gradient(180deg, #141318, #252526);
        }

        .nav-link {
            font-weight: 500;
            color: #cecdd2;
        }

        .btn-primary {
            background-color: goldenrod !important;
            border: none;
        }

        .nav-link:hover {
            color: goldenrod;
        }

        p {
            font-size: 18px;
        }

        .btn-primary:hover {
            background-color: gold !important;
        }

        .font-goldenrod {
            color: goldenrod;
        }

        .bg-goldenrod {
            background-color: goldenrod;
            color: white;
        }

        .display-4 {
            color: #cecdd2;
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .lead {
            color: #cecdd2;
        }

        .text-primary {
            color: goldenrod !important;
        }

        .icons {
            height: 32px;
            width: 32px;
            margin-bottom: 16px;
            color: goldenrod;
            background-color: white;
            padding: 6px;
        }

        .popup {
            position: absolute;
            top: -150%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            width: 550px;
            padding: 20px 30px;
            background: #fff;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            transition: top 0ms ease-in-out 200ms,
                opacity 200ms ease-in-out 0ms,
                transform 200ms ease-in-out 0ms;
            z-index: 1000;
        }

        .popup.active {
            top: 70%;
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
            transition: top 0ms ease-in-out 0ms,
                opacity 200ms ease-in-out 0ms,
                transform 200ms ease-in-out 0ms;
        }

        .popup .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 15px;
            height: 15px;
            background: #888;
            color: #eee;
            text-align: center;
            line-height: 15px;
            border-radius: 15px;
            cursor: pointer;
        }

        .popup .form {
            text-align: left;
        }

        .popup .form h2 {
            font-size: 2rem;
            color: #222;
            text-align: center;
            margin-bottom: 20px;
        }

        .popup .form .form-element {
            margin: 15px 0px;
        }

        .popup .form .form-element label {
            font-size: 17px;
            color: #222;
            display: inline-block;
            width: 100px;
        }

        .popup .form .form-element input[type="text"],
        .popup .form .form-element input[type="password"] {
            margin-top: 5px;
            display: block;
            width: 100%;
            padding: 10px;
            outline: none;
            border: 1px solid #aaa;
            border-radius: 5px;
        }

        .popup .form .form-element button {
            width: 100%;
            height: 40px;
            border: none;
            outline: none;
            font-size: 16px;
            background: #222;
            color: #f5f5f5;
            border-radius: 10px;
            cursor: pointer;
        }

        .popup .form .form-element a {
            display: block;
            text-align: right;
            font-size: 15px;
            color: goldenrod;
            text-decoration: none;
            font-weight: 600;
        }

        .py-3 {
            background: linear-gradient(180deg, #141318, #252526);
        }

        .services-section {
            background-color: #f9f9f9;
            padding: 40px 0;
        }

        .service-box {
            background-color: #252526;
            padding: 20px;
            border-radius: 8px;
            color: #fff;
            text-align: center;
        }

        .service-box h3 {
            margin-top: 10px;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .service-box p {
            font-size: 1rem;
            margin: 10px 0;
        }

        .service-box .btn {
            background-color: goldenrod;
            border: none;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            border-radius: 5px;
        }

        .service-box .btn:hover {
            background-color: gold;
        }

        .icons {
            height: 32px;
            width: 32px;
            margin-bottom: 16px;
            color: goldenrod;
            background-color: #252526;
            padding: 6px;
        }

        .font-black {
            color: #252526;
        }

        .nav-link.active,
        .nav-link:hover {
            color: goldenrod !important;
        }

        .nav-item .nav-link.active {
            background-color: transparent !important;
        }

        .nav-item.active .nav-link {
            background-color: #1b1c1f !important;
            color: goldenrod !important;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
    }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            text-align: center;
            border-radius: 10px;
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close-btn:hover,
        .close-btn:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                <div class="d-flex align-items-center">
                </div>
                <div class="collapse-close d-md-none">
                    <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a href="../../index.html" class="nav-link d-flex align-items-center">
                        <span class="mt-1 ms-1 sidebar-text">Diamond Essence Eatery</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../html&css/pages/dashboard/dashboard.html" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Add Employee</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../html&css/pages/edit-employees.html" target="_blank" class="nav-link d-flex justify-content-between">
                        <span>
                            <span class="sidebar-icon">
                                <span class="sidebar-icon">
                                    <svg class="icon icon-xs me-2" fill="currentColor" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"></path>
                                    </svg>
                                </span>
                            </span>
                            <span class="sidebar-text">Edit Employee</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="../../html&css/pages/ActivityLogs.html" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Recent Activity Logs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../html&css/pages/Stats.html" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Statistics</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../html&css/pages/Employees.html" class="nav-link">
                        <span class="sidebar-icon">
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"></path>
                                </svg>
                            </span>
                        </span>
                        <span class="sidebar-text">Current Employees</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../html&css/pages/Reports.html" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Reports</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <main class="content">

        <header>
            <section>
                <div class="container pt-5">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-12 col-lg-6">
                            <h1 class="display-4 fw-bold"><span class="font-goldenrod">Diamond Essence Eatery </span>Employee Reports</h1>
                            <p class="lead pd-4 pt-2">
                                Access and print detailed reports of employee clock-ins and clock-outs to track attendance and monitor working hours effectively.
                            </p>
                        </div>

                        <div class="col-20 col-lg-5 mb-4">
                            <img src="../../src/assets/img/papers.jpg" alt="Reports" class="img-fluid">
                        </div>
                    </div>
                </div>
            </section>
        </header>

        <div class="container my-4">
            <h2 class="mb-3">Employee Management</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
        <!-- Custom Confirmation Dialog -->
        <div id="confirmDialog" class="modal">
        <div class="modal-content">
            <p>Are you sure you want to delete this employee?</p>
            <button id="confirmYes" class="btn btn-danger btn-sm">Yes</button>
            <button id="confirmNo" class="btn btn-secondary btn-sm">No</button>
        </div>
        </div>
                <tbody id="employeeTableBody">
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
                
                    // SQL query to retrieve User ID, name, surname, and Gmail email addresses
                    $sql = "SELECT user_id, name, surname, email FROM employees";
                    $result = $conn->query($sql);
                
                    // Check if query was successful
                    if ($result === false) {
                        die("Error: " . $conn->error);
                    }
                
                    if ($result->num_rows > 0) {
                        echo "Number of rows: " . $result->num_rows . "<br>";
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["user_id"] . '</td>';
                            echo '<td>' . $row["name"] . '</td>';
                            echo '<td>' . $row["surname"] . '</td>';
                            echo '<td>' . $row["email"] . '</td>';
                            echo '<td><a href="update_employee.php?id=' . $row["user_id"] . '" class="btn btn-primary btn-sm">Edit</a></td>';
                            echo '<td><a href="#" class="btn btn-danger btn-sm" onclick="return confirmDelete(\'delete_employee.php?id=' . $row["user_id"] . '\');">Delete</a></td>';
                            echo '</tr>';
                        }
                    } else {
                        echo "<tr><td colspan='5'>No records found.</td></tr>";
                    }
                    $conn->close(); 
                    ?>
                </tbody>
                <script type="text/javascript">
        function confirmDelete() {
            return confirm("Are you sure you want to delete this employee?");
        }
        </script>
                
            </table>
        </div>

        <!-- Modify Popup Modal -->
    <div id="modifyPopup" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <form id="modifyForm">
            <input type="hidden" id="modifyUserId" name="user_id">
            <label for="modifyName">Name:</label>
            <input type="text" id="modifyName" name="name" required>

            <label for="modifySurname">Surname:</label>
            <input type="text" id="modifySurname" name="surname" required>

            <label for="modifyEmail">Email:</label>
            <input type="email" id="modifyEmail" name="email" required>

            <label for="modifyRole">Role:</label>
            <input type="text" id="modifyRole" name="role" required>

            <label for="modifyGender">Gender:</label>
            <input type="text" id="modifyGender" name="gender" required>

            <label for="modifyAge">Age:</label>
            <input type="number" id="modifyAge" name="age" required>

            <label for="modifyPhone">Phone:</label>
            <input type="text" id="modifyPhone" name="phone" required>

            <label for="modifyUsername">Username:</label>
            <input type="text" id="modifyUsername" name="username" required>

            <label for="modifyPassword">Password:</label>
            <input type="password" id="modifyPassword" name="password">

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <button type="button" class="close-btn">Cancel</button>
        </form>
    </div>
</div>


        <footer class="py-3 mt-auto">
            <div class="container">
                <p class="text-center text-primary">© 2024 Diamond Essence Eatery</p>
            </div>
        </footer>

    </main>

    <!-- Core -->
    <script src="../../vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../../vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Vendor JS -->
    <script src="../../vendor/onscreen/dist/on-screen.umd.min.js"></script>

    <!-- Slider -->
    <script src="../../vendor/nouislider/distribute/nouislider.min.js"></script>

    <!-- Smooth scroll -->
    <script src="../../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Charts -->
    <script src="../../vendor/chartist/dist/chartist.min.js"></script>
    <script src="../../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

    <!-- Datepicker -->
    <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Sweet Alerts 2 -->
    <script src="../../vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Notyf -->
    <script src="../../vendor/notyf/notyf.min.js"></script>

    <!-- Simplebar -->
    <script src="../../vendor/simplebar/dist/simplebar.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Volt JS -->
    <script src="../../assets/js/volt.js"></script>

    <script>
        // Function to add active class based on current page
        function setActiveNavItem() {
            const navLinks = document.querySelectorAll('.nav-link');
            const currentPage = window.location.pathname.split('/').pop();

            navLinks.forEach(link => {
                const linkPage = link.getAttribute('href').split('/').pop();
                if (linkPage === currentPage) {
                    link.classList.add('active');
                    link.closest('.nav-item').classList.add('active');
                } else {
                    link.classList.remove('active');
                    link.closest('.nav-item').classList.remove('active');
                }
            });
        }

        setActiveNavItem();
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const tableBody = document.getElementById('employeeTableBody');
    const modifyPopup = document.getElementById('modifyPopup');
    const closeBtn = document.querySelector('.close-btn');

    // Function to update the table with employee data
    function updateTable(employees) {
        tableBody.innerHTML = ''; // Clear the table first
        employees.forEach(employee => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${employee.id}</td>
                <td>${employee.name}</td>
                <td>${employee.surname}</td>
                <td>${employee.email}</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="showModifyPopup(${employee.id})">Modify</button>
                    <button class="btn btn-danger btn-sm" onclick="deleteEmployee(${employee.id})">Delete</button>
                </td>
            `;
            tableBody.appendChild(row);
        });
    }

    // Function to fetch all employees and update the table
    function fetchAllEmployees() {
        fetch(`get_employee.php`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    updateTable(data);
                } else {
                    tableBody.innerHTML = '<tr><td colspan="5">No employees found</td></tr>';
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Function to show the modify popup and populate the form with employee data
    window.showModifyPopup = function (id) {
        fetch(`get_employee_by_id.php?id=${id}`)
            .then(response => response.json())
            .then(employee => {
                if (employee) {
                    // Populate the form with employee data
                    document.getElementById('modifyUserId').value = employee.user_id;
                    document.getElementById('modifyName').value = employee.name;
                    document.getElementById('modifySurname').value = employee.surname;
                    document.getElementById('modifyGender').value = employee.gender;
                    document.getElementById('modifyAge').value = employee.age;
                    document.getElementById('modifyPhone').value = employee.phone;
                    document.getElementById('modifyEmail').value = employee.email;
                    document.getElementById('modifyUsername').value = employee.username;
                    document.getElementById('modifyPassword').value = employee.password;

                    // Show the popup
                    modifyPopup.style.display = 'block';
                } else {
                    console.error('Employee not found.');
                }
            })
            .catch(error => console.error('Error fetching employee data:', error));
    };

    // Function to close the modify popup
    closeBtn.addEventListener('click', function() {
        modifyPopup.style.display = 'none';
    });

    // Handle form submission to update employee data
    document.getElementById('modifyForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        fetch('update_employee.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Employee updated successfully!');
                modifyPopup.style.display = 'none';
                fetchAllEmployees(); // Refresh the employee table
            } else {
                alert('Error updating employee.');
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Fetch all employees on page load
    fetchAllEmployees();
});



        // JavaScript to handle the custom confirmation dialog
        function confirmDelete(url) {
        // Display the modal
        var modal = document.getElementById('confirmDialog');
        modal.style.display = "block";

        // Get the buttons
        var yesBtn = document.getElementById('confirmYes');
        var noBtn = document.getElementById('confirmNo');

        // If the user clicks "Yes", redirect to the delete URL
        yesBtn.onclick = function() {
            window.location.href = url;
        }

        // If the user clicks "No", close the modal
        noBtn.onclick = function() {
            modal.style.display = "none";
        }

        // If the user clicks outside the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
            modal.style.display = "none";
            }
        }

        return false; // Prevent default action
        }
    </script>
</body>

</html>
