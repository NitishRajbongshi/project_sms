<?php
    echo '
    <header class="header" id="header">
        <div class="header__toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
        </div>
        <div class="header__img icon_section">
            <a href="#"><i class="bi bi-arrow-bar-up"></i></a>
            <a href="#"><i class="bi bi-person-circle profile_icon"></i></a>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav__logo">
                    <i class="bx bx-layer nav__logo-icon"></i>
                    <span class="nav__logo-name">SMS</span>
                </a>
                <div class="nav__list">
                    <a href="#" class="nav__link active">
                        <i class="bi bi-person-circle"></i>
                        <span class="nav__name">Profile</span>
                    </a>
                    <a href="#" class="nav__link">
                        <i class="bx bx-stopwatch nav__icon"></i>
                        <span class="nav__name">Meeting</span>
                    </a>
                    <a href="#" class="nav__link">
                        <i class="bx bx-message-square-detail nav__icon"></i>
                        <span class="nav__name">Notification</span>
                    </a>
                    <a href="#" class="nav__link">
                        <i class="bx bx-list-ul nav__icon"></i>
                        <span class="nav__name">Lists</span>
                    </a>
                    <a href="#" class="nav__link">
                        <i class="bx bx-mail-send nav__icon"></i>
                        <span class="nav__name">Query</span>
                    </a>
                </div>
            </div>
            <a href="#" class="nav__link">
                <i class="bx bx-log-out nav__icon" id="logoutbtn"></i>
                <span class="nav__name">
                    <form action="student_profile.php" method="post">
                        <input class="bg-transparent text-danger border-0" type="submit" name="logout" value="Logout">
                    </form>
                </span>
            </a>
        </nav>
    </div>
    ';
?>