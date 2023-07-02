<?php
session_start();
if (($_SESSION['loggedin'] == false) || ($_SESSION['studentLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['studentLogin'])) {
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
    <link rel="stylesheet" href="style/show_mentor.css">
    <link rel="stylesheet" href="../style/popup_style.css">
    <link rel="stylesheet" href="../admin/style/button.css">

    <title>Student profile</title>
</head>

<body id="body-pd">
    <?php
    include "partials/_navbar.php";
    include "../partials/_dbconnect.php";
    
    // logout and redirect to index page
    if (isset($_POST['logout'])) {
        header("location: student_logout.php");
        exit;
    }

    ?>

    <div class="container shadow-sm" style="font-family: 'PT Serif', serif;
    font-family: 'Ubuntu', sans-serif;">
        <div class="row featurette pt-3">
            <div class="col-md-5 order-md-1 d-flex">
                <img class="flex-shrink-0 bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="300" height="200" src="../photo/profile_student.png" alt="Student profile">
            </div>
            <div class="col-md-7 order-md-2 pt-4">
                <h4 class="text-dark text-sm-left pt-4">
                    <?php echo $_SESSION['username']; ?>
                </h4>
                <p class="lead mb-1">
                    <i class="bi bi-envelope-fill me-2"></i>
                    <?php echo $_SESSION['email']; ?>
                </p>
                <p class="lead mb-1"><i class="bi bi-telephone-fill me-2"></i>
                    <?php echo $_SESSION['phone']; ?>
                </p>
                <p class="lead mb-1"><i class="bi bi-geo-alt-fill me-2"></i>
                    <?php echo $_SESSION['depertment']; ?>
                </p>
                <p class="lead mb-1"><i class="bi bi-book-half me-2"></i> 
                    <?php echo $_SESSION['program']; ?>
                </p>
                <div class="chng_btn">
                    <button type="button" class="btn btn-outline-primary btn-sm rounded-0 mt-2 openBtn" id="change_pass_student">Change
                        password</button>
                    <p class="text-danger" style="font-size: 0.6rem;">Change your password if you login for the first time.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container my-2 shadow-sm pb-1">
        <div class="mentor_mgs ps-2 py-3">
            <h4 class="text-secondary">Mentor details</h4>
        </div>
        <?php
            if($_SESSION['mentor_id'] == 0) {
                echo '
                <div class="no_mentor">
                    <p class="text-danger pb-2 ps-2">There is currently no mentor assigned to you.</p>
                </div>
                ';
            }

            else {
                $mentor_id = $_SESSION['mentor_id'];
                $sql = "
                SELECT * FROM `mentor` WHERE `mentor_id` = '$mentor_id'
                ";
                $result = mysqli_query($conn, $sql);
                if($result) {
                    while($row = mysqli_fetch_assoc($result)) { 
                        echo '
                        <div class="row g-3 ">
                            <div class="col-md-6 rounded p-3">
                                <h6 class="secondary"><i class="bi bi-shield-lock-fill me-2"></i>Mentor name</h6>
                                <h6 class="text-primary">
                                '.$row['mentor_firstname'].' '. $row['mentor_lastname'] .'
                                </h6>
                            </div>
                            <div class="col-md-6 rounded p-3">
                                <h6 class="secondary"><i class="bi bi-telephone-fill me-2"></i>Phone</h6>
                                <h6 class="text-primary">
                                '. $row['mentor_phone'] .'
                                </h6>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6 rounded p-3">
                                <h6 class="secondary"><i class="bi bi-envelope-fill me-2"></i>Email Id</h6>
                                <h6 class="text-primary">
                                '. $row['mentor_email'] .'
                                </h6>
                            </div>
                            <div class="col-md-6 rounded p-3">
                                <h6 class="secondary"><i class="bi bi-geo-alt-fill me-2"></i>Department</h6>
                                <h6 class="text-primary">
                                '. $row['mentor_department'] .'
                                </h6>
                                </h6>
                            </div>
                        </div>
                        ';
                    }
                }
                else {
                    echo "Failed to fetch mentor records";
                }
            }
        ?>

    </div>

    <!--===== MAIN JS =====-->
    <script src="../script/jquery.js"></script>
    <script src="../script/profile_sidebar.js"></script>
    <!-- <script src="../script/change_password.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // script for logout
            $("#logoutbtn").click(function() {
                window.location.replace("student_logout.php");
            })
            $('#change_pass_student').click(function() {
                window.location.replace('changes/change_password.php');
            })
        })
    </script>
</body>

</html>