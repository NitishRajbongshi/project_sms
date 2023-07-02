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

    <title>Communication</title>
</head>

<body id="body-pd">
    <div class="container text-primary py-2">
        <h3 class="text-primary mt-2 border-bottom border-2 border-primary py-1">Communication</h3>
        <p class="text-secondary">Direct communication to a perticular student at a time.</p>
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

        if(isset($_POST['meeting'])) {
            $recipient = $_POST['recipient'];
            $meeting_title = $_POST['title'];
            $meeting_description = $_POST['description'];

            $length = 8;    
            $meeting_code = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'),1,$length);
            $sql = "
                    SELECT * FROM `student` WHERE `rollno` = '$recipient' AND `assign_mentor` = '$mentor_id'
            ";

            $result = mysqli_query($conn, $sql);
            $no_of_rows = mysqli_num_rows($result);
            if($no_of_rows == 1) {
                $a = 0;
                $b = 0;
                $mark = 0;
                while($rows = mysqli_fetch_assoc($result)) {
                    $rollNo = $rows['rollno'];
                    $sqll = "
                    INSERT INTO `individual_meeting`(`individual_meeting_code`,`mentor_id`, `rollno`, `title`, `description`, `student_remarks`, `mentor_remarks`, `mark_read`) VALUES ('$meeting_code','$mentor_id','$rollNo','$meeting_title','$meeting_description','$a','$b', '$mark')
                    ";
                    $results = mysqli_query($conn, $sqll);
                    if($results) {
                        echo '
                        <div class="container">
                        <p class="p-2 bg-success text-light"><strong>Success!</strong> Notice has sent to the recipient</p>
                        </div>';
                        
                    }
                    else {
                        echo '
                        <div class="container">
                        <p class="p-2 bg-info text-light"><strong>Failed!</strong> Internal error!</p>
                        </div>';
                    }
                }
            }
            else {
                echo '
                <div class="container">
                <p class="p-2 bg-info text-light"><strong>Failed!</strong> Recipient rollno is not valid</p>
                </div>';
            }
        }
    ?>
    
    <div class="container py-1 my-2">
        <form action="individual_meeting.php" method="POST" class="form-floating">
            <span class="px-1 py-2 text-secondary">Recipient</span>
            <div class="form-floating mb-3 border border-0">
                <input type="text" class="form-control" name="recipient" id="recipient" placeholder="recipient" required>
                <label for="recipient">eg: CSM21033</label>
            </div>

            <div class="form-floating mb-3 border border-0">
                <input type="text" class="form-control" name="title" id="meeting_title" placeholder="Meeting Title" required>
                <label for="meeting_title">Add a title</label>
            </div>

            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="meeting_description"
                    style="height: 100px" name="description" required></textarea>
                <label for="meeting_description">Add a meeting description</label>
            </div>
            <button class="btn btn-outline-primary btn-sm px-5 py-1 my-3" name="meeting"><span><i class="bi bi-cursor-fill"></i></span> SEND</button>
        </form>
    </div>

    <div class="container d-flex justify-content-end">
        <a href="notice_history.php">See History</a>
    </div>

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