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
    <link rel="stylesheet" href="../style/popup_style.css">
    <link rel="stylesheet" href="../admin/style/button.css">

    <title>mentor profile</title>
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

        if(isset($_POST['add_meeting'])) {
            $meeting_title = $_POST['title'];
            $meeting_description = $_POST['description'];
            $mentor_id = $_SESSION['mentorId'];

            $sql = "
                    SELECT * FROM `student` WHERE `assign_mentor` = '$mentor_id'
            ";

            $result = mysqli_query($conn, $sql);
            $no_of_rows = mysqli_num_rows($result);
            if($no_of_rows > 0) {
                $a = 0;
                $b = 0;
                while($rows = mysqli_fetch_assoc($result)) {
                    $rollNo = $rows['rollno'];
                    $sqll = "
                    INSERT INTO `group_meeting`(`mentor_id`, `rollno`, `title`, `description`, `student_remarks`, `mentor_remarks`) VALUES ('$mentor_id','$rollNo','$meeting_title','$meeting_description','$a','$b')
                    ";
                    $results = mysqli_query($conn, $sqll);
                    if($results) {
                        echo 'done';
                    }
                    else {
                        echo "failed";
                    }
                }
            }
            else {
                echo "No student to sent meeting invitation";
            }
        }
    ?>

    <div class="container py-2">
        <h3 class="text-center text-primary mt-2">Group Meeting</h3>
        <p class="text-center text-secondary">Create a new group meeting to all the student associated with you.</p>
    </div>

    <div class="container shadow-sm py-3 my-2">
        <div class="input-group mb-3">
            <span class="input-group-text text-danger">From: </span>
            <div class="form-floating">
                <input type="text" class="form-control py-0 mb-1" id="" name="sender" value="<?php echo $_SESSION['username']; ?>" readonly>
                <input type="text" class="form-control py-0" id="" name="department" value="<?php echo $_SESSION['department']; ?>" readonly>
            </div>
        </div>
        <div>
            <h6 class="p-1 text-danger">To: </h6>
            <div class="receiver_details py-3 border border-bottom-1 border-secondary rounded my-2 bg-light">
                <?php
                    $mentor_id = $_SESSION['mentorId'];
                    $sql = "
                    SELECT * FROM `student` WHERE `assign_mentor` = '$mentor_id'
                    ";

                    $result = mysqli_query($conn, $sql);
                    $no_of_rows = mysqli_num_rows($result);
                    if($no_of_rows > 0) {
                        while($rows = mysqli_fetch_assoc($result)) {
                            echo '
                            <span class="p-1 m-1">'.$rows['rollno'].'</span>
                            ';
                        }
                    }
                    else {
                        echo "No student to sent meeting invitation";
                    }
                ?>
            </div>
        </div>
        <form action="#" method="POST" class="form-floating">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="title" id="meeting_title" placeholder="Meeting Title" required>
                <label for="meeting_title">Add a title</label>
            </div>

            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="meeting_description"
                    style="height: 100px" name="description" required></textarea>
                <label for="meeting_description">Add a meeting description</label>
            </div>
            <button class="btn btn-outline-primary btn-sm px-5 py-1 my-3" name="add_meeting"><span><i class="bi bi-cursor-fill"></i></span> SEND</button>
        </form>
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