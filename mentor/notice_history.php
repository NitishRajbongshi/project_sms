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

    <title>Communication History</title>
</head>

<body id="body-pd">
    <div class="container text-primary py-2">
        <h3 class="text-primary mt-2 border-bottom border-2 border-primary py-1">History</h3>
        <p class="text-secondary"></p>
    </div>

    <?php
        include "partials/_navbar.php";
        include "../partials/_dbconnect.php";
        
        $mentor_id = $_SESSION['mentorId'];
        // logout and redirect to index page
        if(isset($_POST['logout'])) {
            header("location: mentor_logout.php");
            exit;
        }
    ?>

    <?php
    $query = "
    SELECT * FROM `individual_meeting` WHERE `mentor_id` = '$mentor_id'
    ";
    $status = mysqli_query($conn, $query);
    $no_rows = mysqli_num_rows($status);
    if($no_rows == 0) {
        echo "
        <div class='container py-4'>
        <p class='bg-info p-2 text-light'>There is no any exiting meeting.</p>
        </div>
        ";
    }
    else {
        while($r = mysqli_fetch_assoc($status)) { ?>
        <div class="container shadow-sm aa  p-2 notice_container bg-light">
            <div class="markasread_part d-flex justify-content-end">
                <a id="<?php echo $rows['individual_meeting_code']; ?>" class="update" href="#" data-role="update" data-id="<?php echo $rows['individual_meeting_code'] ?>"><span class="text-light bg-danger px-1">Delete</span></a>
            </div>
            <div class="notice_title">
                <h3 class="border border-1 border-secondary border-start-0 border-top-0 border-end-0">
                    <?php
                    echo $r['title'];
                    ?>
                </h3>
            </div>
            <div class="notice_time_date">
                <p><span class=""><i class="fa-solid fa-clock me-2"></i><?php echo $r['date_time']; ?></span></p>
            </div>
            <div class="title_desc">
                <p>
                    <?php
                    echo $r['description'];
                    ?>
                </p>
            </div>
            <div class="read_remark border border-2 border-success border-top-0 border-bottom-0 border-end-0 px-2">    
                <p>
                <?php
                if($r['student_remarks'] != '0') {
                    echo $r['rollno']. ' : ';
                    echo $r['student_remarks'];
                }
                ?>
                </p>
            </div>
            <div class="read_remark border border-2 border-success border-top-0 border-bottom-0 border-end-0 px-2">    
                <p>
                <?php
                if($r['mentor_remarks'] != '0') {
                    echo "You : ";
                    echo $r['mentor_remarks'];
                }
                ?>
                </p>
            </div>
            <form action="#" method="POST">
                <div class="notice_remarks">
                    <div class="form-floating ">
                        <textarea name="student_remarks" class="rounded-0 form-control bg-transparent " placeholder="Leave a comment here" id="student_remarks" required></textarea>
                        <label for="student_remarks">Write your remarks here</label>
                    </div>
                </div>
                <div class="remark_btn">
                    <button class="btn btn-sm rounded-0 btn-outline-success my-2 px-4 py-2" name="do_remarks"><span class=""><i class="fa-solid fa-paper-plane me-2"></i>Send</span></button>
                </div>
            </form>
        </div>
        <?php
        }
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