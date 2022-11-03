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
  
    <!-- font-awesome icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

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
    
    <title>Search</title>
    <style>
        div.my_card {
        background-color: #8EC5FC;
        background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);

        }
    </style>
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

    <div class="container">
        <h3 class="text-center text-primary p-2" style="font-family: 'Ubuntu', sans-serif;">Search Records</h3>
    </div>

    <div class="container d-flex flex-row justify-content-center flex-wrap">
    <div
      class="my_card m-3 py-2 px-5 bg-light d-flex flex-column justify-content-center shadow-sm border border-4 border-primary border-end-0 border-start-0 border-bottom-0">
      <i class="fa-solid fa-magnifying-glass fa-2x fa-beat-fade my-2 p-2 ms-5"></i>
      <h6 class="py-2">Search by department</h6>
      <button id="srch_dept" class="btn btn-sm btn-outline-primary my-2">Click</button>
    </div>
    <div
      class="my_card m-3 py-2 px-5 bg-light d-flex flex-column justify-content-center shadow-sm border border-4 border-danger border-end-0 border-start-0 border-bottom-0">
      <i class="fa-solid fa-magnifying-glass fa-2x fa-beat-fade my-2 p-2 ms-5"></i>
      <h6 class="py-2">Search by Mentor's ID</h6>
      <button id="srch_id" class="btn btn-sm btn-outline-danger my-2">Click</button>
    </div>
    </div>

    <div id="show_file"></div>
    

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
            $("#srch_dept").click(function() {
                $("#show_file").load("mentor_mentee_database.php");
            })
        })
    </script>
</body>

</html>