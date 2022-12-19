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

    <!-- link for data table  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <title>Attachment</title>
</head>

<body id="body-pd">
    <?php
        include "partials/_navbar.php";
        include "../partials/_dbconnect.php";
        
        // logout and redirect to index page
        if(isset($_POST['logout'])) {
            header("location: mentor_logout.php");
            exit;
        }
    ?>

    <div class="container text-primary py-3">
        <h3 class="">Attachment</h3>
        <p>Attachment from student associate with you.</p>
    </div>
    
    <?php
    $mentorid = $_SESSION['mentorId'];
    $sql = "
    SELECT * FROM `records` WHERE `mentor_id` = '$mentorid' AND `flag` = '0'
    ";
    $result = mysqli_query($conn, $sql);
    $no_of_rows = mysqli_num_rows($result);
    if($no_of_rows > 0) {
        while($row = mysqli_fetch_assoc($result)) { ?>
        <div class="container bg-light shadow-sm my-1">
        <div class="first_part_att py-1 d-flex justify-content-between flex-wrap">
            <div class="dateAndTime">
                <span><i class="fa-solid fa-clock me-2"></i><?php echo $row['date_time']; ?></span>
            </div>
            <div class="sender">
                <span><i class="fa-solid fa-share me-2"></i><?php echo $row['rollno']; ?></span>
            </div>
        </div>
        <div class="second_part_att py-2">
            <span><i class="fa-solid fa-paperclip me-2"></i><?php echo $row['title']; ?></span> <span><a href="download.php?file=<?php echo $row['pdf'] ?>">Download</a></span>
        </div>
        </div>
        <?php
        }
    }
    else {
        echo '
        <div class="container">
            <p>You do not have any attachment</p>
        </div>
        ';
    }
    ?>

    

    <!--===== MAIN JS =====-->
    <script src="../script/jquery.js"></script>
    <script src="../script/profile_sidebar.js"></script>
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