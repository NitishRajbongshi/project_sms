<?php

use function PHPSTORM_META\elementType;

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
    <link rel="stylesheet" href="style/mentor_mentee_database_design.css">
    <title>Search details</title>
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

    <div class="container my-3 py-3" style="font-family: 'Ubuntu', sans-serif;">
        <form action="mentor_mentee_database.php" method="POST" class="search_student">
            <label class="text-primary fs-5" for="mentor_id">Enter Mentor Id: </label>
            <input type="text" id="mentor_id" name="mentor_id" placeholder="CSE01" required>
            <button class="btn btn-sm btn-outline-primary" name="search">Search Students</button>
        </form>
    </div>

    <?php
    if (isset($_POST['search'])) {
        $mentor_id = $_POST['mentor_id'];

        $sql = "
        SELECT * FROM `mentor` WHERE `mentor_id` = '$mentor_id';
        ";

        $result = mysqli_query($conn, $sql);
        $no_of_row = mysqli_num_rows($result);
        if ($no_of_row > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
                echo '
                <div class="mentor_box container mt-3 shadow-sm">
                    <h3 class=" border-bottom border-danger text-danger py-2">Mentor</h3>
                    <h5 class="text-secondary">' . $rows['mentor_id'] . ' - ' . $rows['mentor_firstname'] . ' ' . $rows['mentor_lastname'] . '</h5>
                </div>
                ';
            }

            $sql = "
            SELECT * FROM `student` WHERE `assign_mentor` = '$mentor_id';
            ";

            $result = mysqli_query($conn, $sql);
            $no_of_row = mysqli_num_rows($result);

            $serialno = 1;
            if ($no_of_row > 0) {
                echo '
                <div class="student_box container mt-3 shadow-sm">
                <h3 class="border-bottom border-danger text-success py-2">Students</h3>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Rollno</th>
                            <th scope="col">Year</th>
                        </tr>
                    </thead>
                    <tbody>
                ';
                while ($rows = mysqli_fetch_assoc($result)) {
                    echo '
                                <tr>
                                    <th scope="row">'.$serialno.'</th>
                                    <td>' . $rows["student_firstname"] . ' ' . $rows["student_lastname"] . '</td>
                                    <td>' . $rows["rollno"] . '</td>
                                    <td>' . $rows["academic_year"] . '</td>
                                </tr>
                    ';
                    $serialno += 1;
                }
                echo ' 
                            </tbody>
                        </table>
                    </div>';
            } else {
                echo '
                <div class="mentor_not_found container mt-3">
                    <h3 class=" border-bottom border-danger text-danger py-2">Warning</h3>
                    <p class="text-secondary">Student not found</p>
                </div>
                ';
            }
        } else {
            echo '
            <div class="mentor_not_found container mt-3">
                <h3 class=" border-bottom border-danger text-danger py-2">Warning</h3>
                <p class="text-secondary">Mentor not found</p>
            </div>
            ';
        }
    }
    ?>

    <!--===== MAIN JS =====-->
    <script src="../script/profile_sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="../script/jquery.js"></script>

    <!-- normal script -->
    <script>
        $(document).ready(function() {
            // script for logout
            $("#logoutbtn").click(function() {
                window.location.replace("admin_logout.php");
            })

        })
    </script>
</body>

</html>