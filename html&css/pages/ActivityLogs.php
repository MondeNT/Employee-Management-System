<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Admin Activity Logs</title>

    <!-- Sweet Alert -->
    <link type="text/css" href="../../vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="../../vendor/notyf/notyf.min.css" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="../css/volt.css" rel="stylesheet">

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

        header {
            background: linear-gradient(180deg, #141318, #252526);
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
    </style>
</head>

<body>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a href="../../html&css/pages/index.html" class="nav-link d-flex align-items-center">
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
                                </span>
                            </span>
                            <span class="sidebar-text">Edit Employee</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
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
                            <h1 class="display-4 fw-bold"><span class="font-goldenrod">Diamond Essence Eatery </span>Activity Dashboard</h1>
                            <p class="lead pd-4 pt-2">
                                Track user logins, clock-ins, and administrative updates in real-time for streamlined oversight and control.
                            </p>
                        </div>
                        <div class="col-20 col-lg-5 mb-4">
                            <img src="../../src/assets/img/pages/clicking.jpg" alt="Plate of food" class="img-fluid">
                        </div>
                    </div>
            </section>
        </header>

        <div class="container my-4">
            <h2 class="mb-3">Activity Logs</h2>

            <!-- PHP Database Connection and Queries -->
            <?php
            // Database connection
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

            // Fetch last 5 logins and logouts
            $loginsLogoutsSql = "SELECT user, action, time FROM logins_logouts ORDER BY time DESC LIMIT 5";
            $loginsLogoutsResult = $conn->query($loginsLogoutsSql);

            // Fetch last 5 clock ins and outs with employee names
            $clockInOutsSql = "SELECT e.name, e.surname, cr.action, cr.timestamp 
                               FROM clock_records cr 
                               JOIN employees e ON cr.user_id = e.id 
                               ORDER BY cr.timestamp DESC LIMIT 5";
            $clockInOutsResult = $conn->query($clockInOutsSql);

            // Fetch last 5 administrative changes
            $adminChangesSql = "SELECT admin, change_made, time FROM admin_changes ORDER BY time DESC LIMIT 5";
            $adminChangesResult = $conn->query($adminChangesSql);
            ?>

            <!-- Logins and Logouts Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Logins and Logouts</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="loginsLogoutsTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($loginsLogoutsResult->num_rows > 0) {
                                    while ($row = $loginsLogoutsResult->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["user"] . "</td>";
                                        echo "<td>" . $row["action"] . "</td>";
                                        echo "<td>" . $row["time"] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No recent logins or logouts found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Clock Ins and Outs Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Clock Ins and Outs</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="clockInOutsTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($clockInOutsResult->num_rows > 0) {
                                    while ($row = $clockInOutsResult->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["name"] . " " . $row["surname"] . "</td>";
                                        echo "<td>" . $row["action"] . "</td>";
                                        echo "<td>" . $row["timestamp"] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No recent clock ins or outs found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Administrative Changes Table -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Administrative Changes</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="adminChangesTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Admin</th>
                                    <th>Change Made</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($adminChangesResult->num_rows > 0) {
                                    while ($row = $adminChangesResult->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["admin"] . "</td>";
                                        echo "<td>" . $row["change_made"] . "</td>";
                                        echo "<td>" . $row["time"] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No recent administrative changes found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php
            // Close connection
            $conn->close();
            ?>
        </div>

        <footer>
            <footer class="py-3 mt-auto">
                <div class="container">
                    <p class="text-center text-primary">© 2024 Diamond Essence Eatery</p>
                </div>
            </footer>
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
</body>

</html>
