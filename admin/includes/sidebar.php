<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar with Custom Dropdown</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Dropdown menu styles */
        .dropdown-menu {
            background-color: #EEF7FF; /* Light blue background for dropdown */
            border: none; /* Remove default border */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow */
            margin-top: 0; /* Align dropdown directly below the link */
        }

        .dropdown-item {
            color: #4D869C; /* Cool blue text color */
        }

        .dropdown-item:hover, .dropdown-item:focus {
            color: #EEF7FF; /* Light blue text color on hover/focus */
            background-color: #7AB2B2; /* Teal background on hover/focus */
        }

        /* Ensure dropdown menu is right-aligned under the link */
        .dropdown-menu-end {
            left: auto; /* Override default left positioning */
            right: 0; /* Align to the right */
            margin-left: 0; /* Remove any margin that could misalign */
        }

        /* Fix potential margin issues */
        .dropdown-menu {
            position: absolute; /* Ensure dropdown is positioned relative to the parent */
        }
    </style>
</head>
<body>
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="index.php">
                <span class="align-center">
                    <img class="img-fluid" width="120px" height="50px" src="./images/logouni-removebg-preview.png"/>
                </span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-item active">
                    <a class="sidebar-link" href="index.php">
                        <i class="align-middle" data-feather="sliders"></i>
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-profile.php">
                        <i class="align-middle" data-feather="user"></i>
                        <span class="align-middle">Profile</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="template.php">
                        <i class="align-middle" data-feather="log-in"></i>
                        <span class="align-middle">Template</span>
                    </a>
                </li>

                <!-- Dropdown Menu Item: User Management -->
                <li class="sidebar-item dropdown">
                    <a class="sidebar-link dropdown-toggle" href="#" id="userManagementDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="align-middle" data-feather="log-in"></i>
                        <span class="align-middle">User Management</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userManagementDropdown">
                        <li><a class="dropdown-item" href="staff.php">Staff</a></li>
                        <li><a class="dropdown-item" href="faculty.php">Faculty</a></li>
                        <li><a class="dropdown-item" href="students.php">Students</a></li>
                    </ul>
                </li>

                <!-- Dropdown Menu Item: Admissions -->
                <li class="sidebar-item dropdown">
                    <a class="sidebar-link dropdown-toggle" href="#" id="admissionsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="align-middle" data-feather="log-in"></i>
                        <span class="align-middle">Admissions</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="admissionsDropdown">
                        <li><a class="dropdown-item" href="#">Instructors applications</a></li>
                        <li><a class="dropdown-item" href="#">Students applications</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
