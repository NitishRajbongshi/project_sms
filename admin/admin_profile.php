<?php 
    session_start();
    if(($_SESSION['loggedin'] == false) || ($_SESSION['adminLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['adminLogin'])) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Ubuntu:wght@300;500&display=swap"
        rel="stylesheet">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../style/profile_sidebar.css">
    <link rel="stylesheet" href="../style/bg_color.css">
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="../style/popup_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style type="text/css">
        
    </style>

    <title>Admin_profile</title>
</head>

<body id="body-pd">
    <?php
        include 'partials/_navbar.php';

        // logout and redirect to index page
        if(isset($_POST['logout'])) {
            header("location: admin_logout.php");
            exit;
        }
    ?>

    <!-- change password -->
    <div class="cp">
        <div class="popup-content">
            <h2>Change password</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                id
                laborum.</p>
            <a class="closeBtn" href="javascript:void(0)">x</a>
        </div>
    </div>

    <!-- change profile -->
    <div class="cprof">
        <div class="popup-content">
            <h2>Update Profile</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                id
                laborum.</p>
            <a class="closeBtn" href="javascript:void(0)">x</a>
        </div>
    </div>

    <div class="container" style="font-family: 'PT Serif', serif;
    font-family: 'Ubuntu', sans-serif;">
        <div class="row featurette pt-3">
            <div class="col-md-5 order-md-1 d-flex">
                <img class="flex-shrink-0 bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                    width="300" height="200" src="../photo/profile_student.png" alt="Student profile">
            </div>
            <div class="col-md-7 order-md-2">
                <h4 class="text-dark text-sm-left pt-5">Hello,
                    <?php echo $_SESSION['username'] ?>
                </h4>
                <p class="lead mb-1">Email:
                    <?php echo $_SESSION['email'] ?>
                </p>
                <p class="lead mb-1">Mobile:
                    <?php echo $_SESSION['phone'] ?>
                </p>
                <p class="lead mb-1">Admin Id:
                    <?php echo $_SESSION['adminId'] ?>
                </p>
                <div class="chng_btn">
                    <button type="button" class="btn btn-outline-success my-2 openBtn" id="change_pass_admin">Change
                        password</button>
                    <button type="button" class="btn btn-outline-success my-2 update_profile" id="update_prof_admin">Update
                        profile</button>
                </div>
            </div>
        </div>
    </div>
    <hr class="featurette-divider">



    <!-- add students -->
    <h5 class="my-4 py-1 text-bold">Add students</h5>
    <div class="cont d-flex">
        <div class="main_box_1 mx-1 py-2 text-center bg-primary text-light">
            <h6>ADD</h6>
            <p class="text-light">Add one by one</p>
            <button class="border border-primary"><i class="bi bi-plus-lg "></i></button>
        </div>
        <div class="main_box_2 mx-1 py-2 text-center bg-primary text-light">
            <h6>ADD</h6>
            <p class="text-light">Select from a sheet</p>
            <button class="border border-primary"><i class="bi bi-plus-lg"></i></button>
        </div>
    </div>

    <hr class="featurette-divider">

    <!-- add mentor -->
    <h5 class="my-4 py-1 text-bold">Add Mentors</h5>
    <div class="cont d-flex">
        <div class="main_box_1 mx-1 py-2 text-center bg-primary text-light">
            <h6>ADD</h6>
            <p class="text-light">Add one by one</p>
            <button class="border border-primary"><i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="main_box_2 mx-1 py-2 text-center bg-primary text-light">
            <h6>ADD</h6>
            <p class="text-light">Select from a sheet</p>
            <button class="border border-primary"><i class="bi bi-plus-lg"></i></button>
        </div>
    </div>

    <div class="mb-5"></div>


    <!--===== MAIN JS =====-->
    <script src="../script/profile_sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <script src="../script/jquery.js"></script>
    <script src="../script/change_password.js"></script>
    <script src="../script/update_profile.js"></script>
    <script>
        $(document).ready(function () {
            // script for logout
            $("#logoutbtn").click(function () {
                window.location.replace("admin_logout.php");
            })
        })
    </script>
</body>

</html>