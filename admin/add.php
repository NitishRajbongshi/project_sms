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
    <title>Add data</title>
    <style>
        div.box_individual {
            background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
        }
        div.box_group {
            background-color: #8EC5FC;
            background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
        }
    </style>
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

    <div class="container border border-2 border-primary border-start-0 border-top-0 border-end-0 pt-4">
        <h4 class="text-primary text-center">Add data into the database</h4>
    </div>

    <!-- add students -->
    <h5 class="my-4 p-1 text-bold" style="font-family: 'Ubuntu', sans-serif;">Add students</h5>
    <div class="cont d-flex" style="font-family: 'Ubuntu', sans-serif;">
        <div class="box_individual main_box_1 mx-1 py-2 text-center text-light text-primary border border-4 border-danger border-bottom-0 border-top-0 border-end-0 rounded-end">
            <h6 class="text-dark">ADD</h6>
            <p class="text-dark">Add one by one</p>
            <button id="add_student_one" class="border border-0"><i class="bi bi-plus-lg "></i></button>
        </div>
        <div class="box_group main_box_2 mx-1 py-2 text-center text-light text-primary border border-4 border-success border-bottom-0 border-top-0 border-end-0 rounded-end">
            <h6 class="text-dark">ADD</h6>
            <p class="text-dark">Select from a sheet</p>
            <button class="border border-0" id="select_student_all"><i class="bi bi-plus-lg"></i></button>
        </div>
    </div>

    <!-- <hr class="featurette-divider"> -->

    <!-- add mentor -->
    <h5 class="my-4 p-1 text-bold" style="font-family: 'Ubuntu', sans-serif;">Add Mentors</h5>
    <div class="cont d-flex" style="font-family: 'Ubuntu', sans-serif;">
        <div class="box_individual main_box_1 mx-1 py-2 text-center text-light text-primary border border-4 border-danger border-bottom-0 border-top-0 border-end-0 rounded-end">
            <h6 class="text-dark">ADD</h6>
            <p class="text-dark">Add one by one</p>
            <button id="add_mentor_one" class="border border-0"><i class="bi bi-plus-lg"></i></button>
        </div>
        <div class="box_group main_box_2 mx-1 py-2 text-center text-light text-primary border border-4 border-success border-bottom-0 border-top-0 border-end-0 rounded-end">
            <h6 class="text-dark">ADD</h6>
            <p class="text-dark">Select from a sheet</p>
            <button id="select_mentor_all" class="border border-0"><i class="bi bi-plus-lg"></i></button>
        </div>
    </div>

    <div class="mb-5"></div>


    <!--===== MAIN JS =====-->
    <script src="../script/profile_sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="../script/jquery.js"></script>
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