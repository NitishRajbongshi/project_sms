<?php
    session_start();
    if(($_SESSION['loggedin'] == false) || ($_SESSION['mentorLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['mentorLogin'])) {
        session_unset();
        session_destroy();
        header('location: mentor_login.php');
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

    <title>mentor profile</title>
</head>

<body id="body-pd">
    <?php
        include "partials/_navbar.php";
    ?>

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
    <!-- <hr class="featurette-divider">
    <div class="container my-2 mentor_details" style="font-family: 'PT Serif', serif;
    font-family: 'Ubuntu', sans-serif;">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-dark text-left py-4">
                <h4 class="font-weight-light">MENTOR DETAILS</h4>
                <h5 class="font-weight-light">Mentor: PROF. XYZ XYZXYZ</h5>
                <h5 class="font-weight-light">Email: myprof@gmail.com</h5>
                <h5 class="font-weight-light">Phone: 6001020913</h5>
            </div>
        </div>
        <div class="row">
            <div class="col text-center m-3">
                <a href="#" class="btn btn-green bg-danger text-white">Asked query</a>
            </div>
        </div>
    </div> -->

    <!--===== MAIN JS =====-->
    <script src="../script/profile_sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>