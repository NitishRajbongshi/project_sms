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

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../style/profile_sidebar.css">
    <link rel="stylesheet" href="../style/bg_color.css">
    <link rel="stylesheet" href="style/button.css">
    <link rel="stylesheet" href="../style/popup_style.css">

    <!-- link for data table  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <title>database details</title>
</head>

<body id="body-pd">
    <?php
    include 'partials/_navbar.php';
    include '../partials/_dbconnect.php';
    // logout and redirect to index page
    if (isset($_POST['logout'])) {
        header("location: admin_logout.php");
        exit;
    }
    ?>

    <div class="container my-5">
        <table class="table" id="student_table">
            <thead>
                <tr style="font-family: 'Ubuntu', sans-serif;">
                    <th scope="col">S.No</th>
                    <th scope="col">Roll no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "database_details/student_database.php";
                ?>
            </tbody>
        </table>
    </div>
    <div class="container my-5" >
        <table class="table" id="mentor_table">
            <thead>
                <tr style="font-family: 'Ubuntu', sans-serif;">
                    <th scope="col">S.No</th>
                    <th scope="col">Mentor Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "database_details/mentor_database.php";
                ?>
            </tbody>
        </table>
    </div>

    <!--===== MAIN JS =====-->
    <script src="../script/profile_sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="../script/jquery.js"></script>
    <script src="../script/change_password.js"></script>
    <script src="../script/update_profile.js"></script>

    <!-- script for data table -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#student_table').DataTable();
        });

        $(document).ready(function() {
            $('#mentor_table').DataTable();
        });
    </script>

    <!-- normal script -->
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
        })
    </script>
</body>

</html>