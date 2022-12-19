<?php
    echo '
    <header class="header" id="header">
        <div class="header__toggle">
            <i class="bx bx-menu" id="header-toggle"></i>
        </div>
        <div class="header__img icon_section">
            <a href="attachment.php"><i class="bi bi-arrow-bar-down"></i></a>
            <a href="mentor_profile.php"><i class="bi bi-person-circle profile_icon"></i></a>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav__logo">
                    <i class="bx bx-layer nav__logo-icon"></i>
                    <span class="nav__logo-name">MENTOR</span>
                </a>
                <div class="nav__list">
                    <a href="mentor_profile.php" class="nav__link">
                        <i class="bi bi-person-circle"></i>
                        <span class="nav__name">Profile</span>
                    </a>
                    <a href="student_list.php" class="nav__link">
                        <i class="bi bi-person-check-fill"></i>
                        <span class="nav__name">Students</span>
                    </a>
                    <a href="group_meeting.php" class="nav__link">
                        <i class="bi bi-people-fill"></i>
                        <span class="nav__name">Group Meeting</span>
                    </a>
                    <a href="#" class="nav__link">
                        <i class="bi bi-chat-left-text-fill"></i>
                        <span class="nav__name">Communication</span>
                    </a>
                    <a href="attachment.php" class="nav__link">
                        <i class="bx bx-file nav__icon"></i>
                        <span class="nav__name">Attachment</span>
                    </a>
                </div>
            </div>
            <a href="#" class="nav__link">
                <i class="bx bx-log-out nav__icon" id="logoutbtn"></i>
                <span class="nav__name">
                    <form action="mentor_profile.php" method="post">
                        <input class="bg-transparent text-danger border-0" type="submit" name="logout" value="Logout">
                    </form>
                </span>
            </a>
        </nav>
    </div>
    ';
?>