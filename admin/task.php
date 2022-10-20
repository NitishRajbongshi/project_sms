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
    <link rel="stylesheet" href="style/task_style.css">

    <title>Task</title>
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
    <div class="container p-4 text-center text-primary fw-bold">
    <h3>
        ASSIGN MENTOR
    </h3>    
    </div>
    <div class="container p-4 my-2 shadow-sm mb-5 bg-white rounded">
        <form class="row g-3">
            <div class="col-12">
                <label for="inputState" class="form-label">Department</label>
                <select id="inputState" class="form-select"  required>
                    <option selected>Choose Department</option>
                    <option>Computer Science & Engineering</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Accademic Year</label>
                <input type="email" class="form-control" id="inputEmail4" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">No. of students / Mentor</label>
                <input type="password" class="form-control" id="inputPassword4" required>
            </div>
            
            <div class="col-12" >
                <button id="assign_btn" type="submit" class="btn btn-primary">Assign mentor</button>
            </div>
        </form>
    </div>

    <div class="container p-4 my-4 shadow-sm p-3 mb-5 bg-white rounded">
        <div class="card">
            <div class="card-header text-center">
              Status
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0 fs-6">
                <p>Total 25 students have assigned a mentor from CSE, 2021 batch </p>
                <p>Warning: Total 2 students have not assigned any mentor.</p>
                <footer class="blockquote-footer py-3">
                    See more details on database section 
                    <!-- <cite title="Source Title">Source Title</cite> -->
                </footer>
              </blockquote>
            </div>
          </div>
    </div>

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