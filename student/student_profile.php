<?php 
    session_start();
    if(($_SESSION['loggedin'] == false) || ($_SESSION['studentLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['studentLogin'])) {
        session_unset();
        session_destroy();
        header('location: student_login.php');
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

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Ubuntu:wght@300;500&display=swap"
        rel="stylesheet">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../style/profile_sidebar.css">
    <link rel="stylesheet" href="../style/bg_color.css">
    <link rel="stylesheet" href="style/show_mentor.css">
    <link rel="stylesheet" href="../style/popup_style.css">
    <link rel="stylesheet" href="../admin/style/button.css">

    <title>Student profile</title>
</head>

<body id="body-pd">
    <?php
        include "partials/_navbar.php";
        include "changes/change_password.php";

        // logout and redirect to index page
        if(isset($_POST['logout'])) {
            header("location: student_logout.php");
            exit;
        }

        // updating password
$oldpassmatch = false;
// if($_SERVER['REQUEST_METHOD'] == "POST") { 
// }
if(isset($_POST['changePassword'])) {
    $op = $_POST['curp'];
    $np = $_POST['newp'];
    $ncp = $_POST['newcp'];
    $rollno = $_SESSION['rollno'];

    $sql = "SELECT `student_password` FROM `student_login` WHERE `rollno` = '$rollno'";
    $result = mysqli_query($conn, $sql);
    $no_row = mysqli_num_rows($result);
    if($no_row == 1) {            
        while($row = mysqli_fetch_assoc($result)) {
            $p = $row['password'];
            if(password_verify($op, $p)) {
                $oldpassmatch = true;
            }
        }
        if(($np == $ncp) && $oldpassmatch == true) {
            $new_hash = password_hash($np, PASSWORD_DEFAULT);
            $sql = "UPDATE `student_login` SET `password`='$new_hash' WHERE `rollno` = '$rollno'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Your password has updated successfully.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
            else {           
                echo '<div class="alert alert-secondary alert-dismissible fade show" role="alert"><strong>Failed!</strong> Failed to update your password.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            }
        }
        else {
            echo '<div class="alert alert-secondary alert-dismissible fade show" role="alert"><strong>Failed!</strong> Password is not match. Try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
    else {
        echo '<div class="alert alert-secondary alert-dismissible fade show" role="alert"><strong>Failed!</strong> Failed to update your password. Please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        
    }
}

    ?>

    <!-- change password -->
    <div class="cp">
        <div class="popup-content">
            <div class="container">
                <h2>Change password</h2>
                
                <form action="student_profile.php" method="post" autocomplete="off">
                            <input type="hidden" name="snoEdit" id="snoEdit">

                            <div class="mb-3">
                                <label for="curp" class="form-label">Current password</label>
                                <input type="password" class="form-control" id="curp" aria-describedby="emailHelp"
                                    name="curp" required>
                            </div>
                            <div class="mb-3">
                                <label for="newp" class="form-label">New password</label>
                                <input type="password" class="form-control" id="newp" aria-describedby="emailHelp"
                                    name="newp" required>
                            </div>
                            <div class="mb-3">
                                <label for="newcp" class="form-label">Confirm password</label>
                                <input type="password" class="form-control" id="newcp" aria-describedby="emailHelp"
                                    name="newcp" required>
                            </div>
                            <input id="demo" type="submit" class="btn btn-primary" style="width: 100%;"
                                name="changePassword" value="confirmn"></input>
                        </form>
            </div>
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
                <h4 class="text-dark text-sm-left pt-4">Hello,
                    <?php echo $_SESSION['username']; ?>
                </h4>
                <p class="lead mb-1">Email:
                    <?php echo $_SESSION['email']; ?>
                </p>
                <p class="lead mb-1">Mobile:
                    <?php echo $_SESSION['phone']; ?>
                </p>
                <p class="lead mb-1">Depertment: CSE</p>
                <p class="lead mb-1">Program: MCA</p>
                <div class="chng_btn">
                    <button type="button" class="btn btn-outline-success my-2 openBtn" id="change_pass_admin">Change
                        password</button>
                </div>
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
    <!-- <script src="../script/change_password.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            // toggle mentor's details
            $("#mentor_details").click(function () {
                $("#mentor_detail_show").slideToggle(1100);
            })

            // script for logout
            $("#logoutbtn").click(function () {
                window.location.replace("student_logout.php");
            })


            // Open Popup
            $('.openBtn').on('click', function () {
                $('.cp').fadeIn(300);
            });

            // Close Popup
            $('.closeBtn').on('click', function () {
                $('.cp').fadeOut(300);
            });

            // Close Popup when Click outside
            $('.cp').on('click', function () {
                $('.cp').fadeOut(300);
            }).children().click(function () {
                return false;
            });

            $("#demo").click(function() {
                alert("done");
            })
        })
    </script>
</body>

</html>