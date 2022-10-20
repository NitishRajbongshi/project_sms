<?php
session_start();
if (($_SESSION['loggedin'] == false) || ($_SESSION['adminLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['adminLogin'])) {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Ubuntu:wght@300;500&display=swap" rel="stylesheet">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../style/profile_sidebar.css">
    <link rel="stylesheet" href="../style/bg_color.css">
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="../style/popup_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Admin_profile</title>
</head>

<body id="body-pd">
    <?php
    include 'partials/_navbar.php';

    // logout and redirect to index page
    if (isset($_POST['logout'])) {
        header("location: admin_logout.php");
        exit;
    }
    ?>

    <!-- change password -->
    <div class="cp">
        <div class="popup-content">
            <h2>Change password</h2>
            <form action="/php_tutorial/EVS/profile.php" method="post" autocomplete="off">
                <input type="hidden" name="snoEdit" id="snoEdit">

                <div class="mb-3">
                    <label for="curp" class="form-label">Current password</label>
                    <input type="password" class="form-control" id="curp" aria-describedby="emailHelp" name="curp" required>
                </div>
                <div class="mb-3">
                    <label for="newp" class="form-label">New password</label>
                    <input type="password" class="form-control" id="newp" aria-describedby="emailHelp" name="newp" required maxlength="30">
                </div>
                <div class="mb-3">
                    <label for="newcp" class="form-label">Confirm password</label>
                    <input type="password" class="form-control" id="newcp" aria-describedby="emailHelp" name="newcp" required maxlength="30">
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;" name="conpass">CONFIRM</button>
            </form>
            <a class="closeBtn" href="javascript:void(0)">x</a>
        </div>
    </div>

    <!-- change profile -->
    <div class="cprof">
        <div class="popup-content">
            <h2>Update Profile</h2>
            <form action="/php_tutorial/EVS/admin/admin_profile.php" method="post" autocomplete="off">
                <input type="hidden" name="snoEdit" id="snoEdit">

                <div class="mb-3">
                    <label for="curp" class="form-label">Password</label>
                    <input type="password" class="form-control" id="curp" aria-describedby="emailHelp" name="curp" required>
                </div>
                <div class="mb-3">
                    <label for="newun" class="form-label">New Username</label>
                    <input type="text" class="form-control" id="newun" aria-describedby="emailHelp" name="newun" required value="<?php echo $_SESSION['username']; ?>" maxlength="25">
                </div>
                <div class="mb-3">
                    <label for="newm" class="form-label">New Mobile No.</label>
                    <input type="text" class="form-control" id="newm" aria-describedby="emailHelp" name="newm" required value="<?php echo $_SESSION['mobile']; ?>" maxlength="10" minlength="10" oninvalid="this.setCustomValidity('Invalid mobile number!')" oninput="setCustomValidity('')">
                </div>
                <div class="mb-3">
                    <label for="newe" class="form-label">New email</label>
                    <input type="email" class="form-control" id="newe" aria-describedby="emailHelp" name="newe" required value="<?php echo $_SESSION['email']; ?>" maxlength="50">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;" name="conun">CONFIRM</button>
            </form>
            <a class="closeBtn" href="javascript:void(0)">x</a>
        </div>
    </div>

    <div class="container" style="font-family: 'PT Serif', serif;
    font-family: 'Ubuntu', sans-serif;">
        <div class="row featurette pt-3">
            <div class="col-md-5 order-md-1 d-flex">
                <img class="flex-shrink-0 bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="300" height="200" src="../photo/profile_student.png" alt="Student profile">
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
    <!-- <hr class="featurette-divider"> -->



    <!-- add students -->
    <h5 class="my-4 py-1 text-bold" style="font-family: 'Ubuntu', sans-serif;">Add students</h5>
    <div class="cont d-flex" style="font-family: 'Ubuntu', sans-serif;">
        <div class="main_box_1 mx-1 py-2 text-center bg-primary text-light">
            <h6>ADD</h6>
            <p class="text-light">Add one by one</p>
            <button id="add_student_one" class="border border-primary"><i class="bi bi-plus-lg "></i></button>
        </div>
        <div class="main_box_2 mx-1 py-2 text-center bg-primary text-light">
            <h6>ADD</h6>
            <p class="text-light">Select from a sheet</p>
            <button class="border border-primary" id="select_student_all"><i class="bi bi-plus-lg"></i></button>
        </div>
    </div>

    <!-- <hr class="featurette-divider"> -->

    <!-- add mentor -->
    <h5 class="my-4 py-1 text-bold" style="font-family: 'Ubuntu', sans-serif;">Add Mentors</h5>
    <div class="cont d-flex" style="font-family: 'Ubuntu', sans-serif;">
        <div class="main_box_1 mx-1 py-2 text-center bg-primary text-light">
            <h6>ADD</h6>
            <p class="text-light">Add one by one</p>
            <button id="add_mentor_one" class="border border-primary"><i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="main_box_2 mx-1 py-2 text-center bg-primary text-light">
            <h6>ADD</h6>
            <p class="text-light">Select from a sheet</p>
            <button id="select_mentor_all" class="border border-primary"><i class="bi bi-plus-lg"></i></button>
        </div>
    </div>

    <div class="mb-5"></div>


    <!--===== MAIN JS =====-->
    <script src="../script/profile_sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="../script/jquery.js"></script>
    <script src="../script/change_password.js"></script>
    <script src="../script/update_profile.js"></script>
    <script>
        $(document).ready(function() {
            // script for logout
            $("#logoutbtn").click(function() {
                window.location.replace("admin_logout.php");
            })

            $("#add_student_one").click(function() {
                window.location.replace("others/add_student.php");

            })

            $("#add_mentor_one").click(function() {
                window.location.replace("others/add_mentor.php");

            })

            $("#select_student_all").click(function() {
                window.location.replace("files/student.php");
            })

            $("#select_mentor_all").click(function() {
                window.location.replace("files/mentor.php");
            })
        })
    </script>
</body>

</html>