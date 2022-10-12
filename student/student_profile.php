<?php 
    session_start();
    if(($_SESSION['loggedin'] == false) || ($_SESSION['studentLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['studentLogin'])) {
        session_unset();
        session_destroy();
        header('location: admin_login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Ubuntu:wght@300;500&display=swap" rel="stylesheet">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../style/profile_sidebar.css">
    <link rel="stylesheet" href="../style/bg_color.css">
    <link rel="stylesheet" href="style/show_mentor.css">

    <title>Student profile</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
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
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">SMS</span>
                </a>
                <div class="nav__list">
                    <a href="#" class="nav__link active">
                        <i class="bi bi-person-circle"></i>
                        <span class="nav__name">Profile</span>
                    </a>
                    <a href="#" class="nav__link">
                        <i class='bx bx-stopwatch nav__icon'></i>
                        <span class="nav__name">Meeting</span>
                    </a>
                    <a href="#" class="nav__link">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">Notification</span>
                    </a>
                    <a href="#" class="nav__link">
                        <i class='bx bx-list-ul nav__icon'></i>
                        <span class="nav__name">Lists</span>
                    </a>
                    <a href="#" class="nav__link">
                        <i class='bx bx-mail-send nav__icon'></i>
                        <span class="nav__name">Query</span>
                    </a>
                </div>
            </div>
            <a href="#" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>

    <div class="container" style="font-family: 'PT Serif', serif;
    font-family: 'Ubuntu', sans-serif;">
        <div class="row featurette pt-3">
            <div class="col-md-5 order-md-1 d-flex">
                <img class="flex-shrink-0 bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="300" height="200" src="../photo/profile_student.png" alt="Student profile">
            </div>
            <div class="col-md-7 order-md-2">
                <h4 class="text-dark text-sm-left pt-4">Hello, Nitish Rajbongshi</h4>
                <p class="lead mb-1">Email: nitishrajbongshi@gmail.com</p>
                <p class="lead mb-1">Mobile: 6001020913</p>
                <p class="lead mb-1">Depertment: CSE</p>
                <p class="lead mb-1">Program: MCA</p>
                <button type="button" class="btn btn-outline-danger my-2">Change password</button>
            </div>
        </div>
    </div>
    <!-- <hr class="featurette-divider"> -->
    <div class="container my-2 mentor_details" style="font-family: 'PT Serif', serif;
    font-family: 'Ubuntu', sans-serif;">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-dark text-center py-4">
                <h5 class="font-weight-light py-2" id="mentor_details">See mentor details</h5>
                <div id="mentor_detail_show">
                    <h5 class="font-weight-light text-secondary">Mentor: prof. nameof professor</h5>
                    <p class="font-weight-light text-secondary">Email: myprof@gmail.com</p>
                    <p class="font-weight-light text-secondary">Phone: 6001020913</p>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col text-center m-3">
                <a href="#" class="btn btn-green bg-danger text-white">Asked query</a>
            </div>
        </div> -->
    </div>

    <!--===== MAIN JS =====-->
    <script src="../script/jquery.js"></script>
    <script src="../script/profile_sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#mentor_details").click(function() {
                $("#mentor_detail_show").slideToggle(1100);
            })
        })
    </script>
</body>

</html>