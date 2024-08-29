<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
            <span class="align-center">
                <img class="img-fluid" width="120px" height="50px" src="../assets/images/<?php echo $allSettings['image'] ?>" />
            </span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-item <?php echo $page == "index.php" ? "active" : "" ?>">
                <a class="sidebar-link" href="index.php">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo $page == "pages-profile.php" ? "active" : "" ?>">
                <a class="sidebar-link" href="pages-profile.php">
                    <i class="align-middle" data-feather="user"></i>
                    <span class="align-middle">Profile</span>
                </a>
            </li>

            <li class="sidebar-item <?php echo $page == "template.php" ? "active" : "" ?>">
                <a class="sidebar-link" href="template.php">
                    <i class="align-middle" data-feather="log-in"></i>
                    <span class="align-middle">Template</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link collapsed" data-bs-toggle="collapse" href="#category-ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="align-middle" data-feather="settings"></i>
                    <span class="menu-title">Settings</span>
                </a>
                <div class="collapse <?php echo ($page == "settings.php" || $page == "campuses.php") ? 'show' : ''; ?>" id="category-ui-basic">
                    <ul class="sidebar-nav  flex-column sub-menu">
                        <li class="sidebar-item <?php echo ($page == "settings.php" ? "active" : "")  ?>"> <a class="sidebar-link" href="settings.php">- General Settings</a></li>
                        <li class="sidebar-item <?php echo ($page == "campuses.php" ? "active" : "")  ?>"> <a class="sidebar-link" href="campuses.php">- Campuses</a></li>
                    </ul>
                </div>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link collapsed" data-bs-toggle="collapse" href="#category-ui-basic-1" aria-expanded="false" aria-controls="ui-basic">
                    <i class="align-middle" data-feather="codepen"></i>
                    <span class="menu-title">Departments</span>
                </a>
                <div class="collapse <?php echo ($page == "departments.php" || $page == "blocks.php" || $page == "rooms.php") ? 'show' : ''; ?>" id="category-ui-basic-1">
                    <ul class="sidebar-nav flex-column sub-menu">
                        <li class="sidebar-item <?php echo ($page == "departments.php" ? "active" : "") ?>"> <a class="sidebar-link" href="departments.php">- Departments</a></li>
                        <li class="sidebar-item <?php echo ($page == "blocks.php" ? "active" : "") ?>"> <a class="sidebar-link" href="blocks.php">- Blocks</a></li>
                        <li class="sidebar-item <?php echo ($page == "rooms.php" ? "active" : "") ?>"> <a class="sidebar-link" href="rooms.php">- Rooms</a></li>
                    </ul>
                </div>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link collapsed" data-bs-toggle="collapse" href="#category-ui-basic-2" aria-expanded="false" aria-controls="ui-basic">
                    <i class="align-middle" data-feather="layout"></i>
                    <span class="menu-title">Academic</span>
                </a>
                <div class="collapse <?php echo ($page == "majors.php" || $page == "courses.php" || $page == "prerequisites.php") ? 'show' : ''; ?>" id="category-ui-basic-2">
                    <ul class="sidebar-nav flex-column sub-menu">
                        <li class="sidebar-item <?php echo ($page == "majors.php" ? "active" : "") ?>"> <a class="sidebar-link" href="majors.php">- Majors</a></li>
                        <li class="sidebar-item <?php echo ($page == "courses.php" ? "active" : "") ?>"> <a class="sidebar-link" href="courses.php">- Courses</a></li>
                        <li class="sidebar-item <?php echo ($page == "prerequisites.php" ? "active" : "") ?>"> <a class="sidebar-link" href="prerequisites.php">- Prerequisites</a></li>
                    </ul>
                </div>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link collapsed" data-bs-toggle="collapse" href="#category-ui-basic-3" aria-expanded="false" aria-controls="ui-basic">
                    <i class="align-middle" data-feather="briefcase"></i>
                    <span class="menu-title">Admissions</span>
                </a>
                <div class="collapse <?php echo ($page == "students_applications.php" || $page == "doctors_applications.php") ? 'show' : ''; ?>" id="category-ui-basic-3">
                    <ul class="sidebar-nav flex-column sub-menu">
                        <li class="sidebar-item <?php echo ($page == "students_applications.php" ? "active" : "") ?>"> <a class="sidebar-link" href="students_applications.php">- Student Applications</a></li>
                        <li class="sidebar-item <?php echo ($page == "doctors_applications.php" ? "active" : "") ?>"> <a class="sidebar-link" href="doctors_applications.php">- Doctor Applications</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>