<?php
echo'<nav class="navbar .bg-transparent fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><span id="title">S.M.S.</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <i class="bi bi-list-ul"></i>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="menu_items nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house"></i>Home</a>
                    </li>
                    <li class="menu_items nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-file-earmark"></i>About</a>
                    </li>
                    <li class="menu_items nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-download"></i>Download</a>
                    </li>
                    <li class="menu_items nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"><i class="bi bi-box-arrow-in-right"></i>
                            Login
                        </a>
                        <ul class="dropdown-menu">
                            <li class="menu_items"><a class="dropdown-item" href="admin/admin_login.php"><i
                                        class="bi bi-person-fill"></i>Admin</a></li>
                            <li class="menu_items"><a class="dropdown-item" href="#"><i
                                        class="bi bi-person-fill"></i>Mentor</a></li>
                            <li class="menu_items"><a class="dropdown-item" href="#"><i
                                        class="bi bi-person-fill"></i>Student</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>';
?>