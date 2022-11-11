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

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

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
    <link rel="stylesheet" href="../style/popup_style.css">
    <link rel="stylesheet" href="../admin/style/button.css">

    <title>mentor profile</title>
</head>

<body id="body-pd">
    <?php
        include "partials/_navbar.php";
        
        // logout and redirect to index page
        if(isset($_POST['logout'])) {
            header("location: mentor_logout.php");
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

    <div class="container d-flex flex-row justify-content-start mt-5 py-5 flex-wrap">
        <div class="profile_icon px-4 py-3 me-3 admin_icon">
            <i class="fa-solid fa-user-tie fa-2x"></i>
        </div>
        <div class="profile_details">
            <h5 class="py-1">
                <?php 
                echo $_SESSION["username"];
                ?>
            </h5>
            <h6 class="text-secondary">
                <i class="bi bi-envelope-fill me-2"></i>
                <?php 
                echo $_SESSION["email"];
                ?>
            </h6>
        </div>
    </div>

    <div class="container py-3">
        <div class="row g-3 my-3">
            <div class="col-md-6 shadow-sm rounded p-3">
                <h6 class="secondary"><i class="bi bi-shield-lock-fill me-2"></i>Mentor Id</h6>
                <h6 class="text-primary">
                <?php 
                echo $_SESSION["mentorId"]
                ?>
                </h6>
            </div>
            <div class="col-md-6 shadow-sm rounded p-3">
                <h6 class="secondary"><i class="bi bi-telephone-fill me-2"></i>Phone</h6>
                <h6 class="text-primary">
                <?php 
                echo $_SESSION["phone"]
                ?>
                </h6>
            </div>
        </div>
        <div class="row g-3 my-3">
            <div class="col-md-6 shadow-sm rounded p-3">
                <h6 class="secondary"><i class="bi bi-envelope-fill me-2"></i>Email Id</h6>
                <h6 class="text-primary">
                <?php 
                echo $_SESSION["email"]
                ?>
                </h6>
            </div>
            <div class="col-md-6 shadow-sm rounded p-3">
                <h6 class="secondary"><i class="bi bi-geo-alt-fill me-2"></i>Department</h6>
                <h6 class="text-primary">
                <?php 
                echo $_SESSION["department"]
                ?>
                </h6>
                </h6>
            </div>
        </div>

        <div class="container change_Btn">
            <span class="text-secondary openBtn" id="change_pass_admin">
                <i class="bi bi-key-fill me-1"></i> Change password
            </span>
        </div>
        <div class="container change_Btn">
            <span class="text-secondary update_profile" id="update_prof_admin">
                <i class="bi bi-pen-fill me-1"></i> Update profile
            </span>
        </div>
    </div>

    <!--===== MAIN JS =====-->
    <script src="../script/jquery.js"></script>
    <script src="../script/profile_sidebar.js"></script>
    <script src="../script/change_password.js"></script>
    <script src="../script/update_profile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            // script for logout
            $("#logoutbtn").click(function () {
                window.location.replace("mentor_logout.php");
            })
        })
    </script>
</body>

</html>