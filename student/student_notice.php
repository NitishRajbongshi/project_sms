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
    <!-- <link rel="stylesheet" href="style/notice_bg_color.css"> -->

    <title>Notice</title>
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
    <div>
        <input type="hidden" id="text1">
        <input type="hidden" id="text2" value= <?php echo $_SESSION['rollno'];?>>
    </div>
    
    <div class="container text-primary py-2">
        <h3 class="text-primary mt-2 border-bottom border-2 border-primary py-1">Notice for you</h3>
        <p class="text-secondary">Direct notice to you from you mentor</p>
    </div>
    <?php
    $rollNo = $_SESSION['rollno'];
    $sql = "
    SELECT * FROM `individual_meeting` WHERE `rollno` = '$rollNo' ORDER BY `meeting_id` DESC;;
    ";
    $result = mysqli_query($conn, $sql);
    $no_of_rows = mysqli_num_rows($result);
    if($no_of_rows > 0) {
        while($rows = mysqli_fetch_assoc($result)) {
            include "meeting/notice_template.php";
        }
    }
    else {
        echo "
        <div class='container py-4'>
            <p class='bg-info p-2 text-light'>Currently, you have no new meetings.</p>
        </div>
        ";
    }
    ?>

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
            });

            // mark as read
            $("#mark_read").hover(function() {
                $(this).css({
                    'cursor':'pointer'
                });
            });

            // ajax for mark as read
            $('.update').click(function() {
                let update_id = $(this).data('id');
                // let myid = "#"+update_id;
                $('#text1').val(update_id);
                let val1 = $('#text1').val();
                let val2 = $('#text2').val();
                $.ajax({
                    type: 'POST',
                    url: 'meeting/script/mark_as_read_individual.php',
                    data: { text1: val1, text2: val2 },
                    success:function(response) {
                        if(response === 'success') {
                            alert('success');
                            document.getElementById(update_id).style.display = 'none';
                        }
                        else if(response === 'failed'){
                            alert('failed');
                        }
                        else {
                            alert("error occured!");
                        }
                    }                    
                });
            });
        });
    </script>
</body>

</html>