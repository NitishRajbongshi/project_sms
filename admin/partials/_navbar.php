<?php
    echo '
    <header class="header" id="header">
    <div class="header__toggle">
        <i class="bx bx-menu" id="header-toggle"></i>
    </div>
    <div class="header__img icon_section">
        <a href="upload_file.php"><i class="bi bi-arrow-bar-up"></i></a>
        <a href="admin_profile.php"><i class="bi bi-person-circle profile_icon"></i></a>
    </div>
</header>

<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="admin_profile.php" class="nav__logo">
                <i class="bx bx-layer nav__logo-icon"></i>
                <span class="nav__logo-name">ADMIN</span>
            </a>
            <div class="nav__list">
                <a href="admin_profile.php" class="nav__link">
                    <i class="bi bi-person-circle"></i>
                    <span class="nav__name">Profile</span>
                </a>
                <a href="add.php" class="nav__link">
                    <i class="bi bi-person-plus-fill"></i>
                    <span class="nav__name">Add Data</span>
                </a>
                <a href="database.php" class="nav__link">
                    <i class="bi bi-server"></i>
                    <span class="nav__name">Database</span>
                </a>
                <a href="search.php" class="nav__link">
                    <i class="bi bi-search"></i>
                    <span class="nav__name">Search</span>
                </a>
                <a href="task.php" class="nav__link">
                    <i class="bi bi-question-square-fill"></i>
                    <span class="nav__name">Task</span>
                </a>
                <a href="upload_file.php" class="nav__link">
                    <i class="bx bx-file nav__icon"></i>
                    <span class="nav__name">Upload</span>
                </a>
            </div>
        </div>
        <a href="#" class="nav__link">
            <i class="bx bx-log-out nav__icon" id="logoutbtn"></i>
            <span class="nav__name">
                <form action="admin_profile.php" method="post">
                    <input class="bg-transparent text-danger border-0" type="submit" name="logout" value="Logout">
                </form>
            </span>
        </a>
    </nav>
</div>
    '
?>