<?php 
    session_start();
    if(($_SESSION['loggedin'] == false) || ($_SESSION['adminLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['adminLogin'])) {
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/add_student_mentor.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="script/sweetAlertStudent.js" defer></script> -->
    <script defer>
        function studentAdded() {
            swal({
                title: "Success!",
                text: "Added a new student!",
                icon: "success",
                button: "Close",
            });
        }

        function studentNotAdded() {
            swal({
                title: "Failed!",
                text: "Failed to add student!",
                icon: "error",
                button: "Close",
            });
        }

        function rollnoDuplication() {
            swal({
                title: "Failed!",
                text: "Roll no is already exist!",
                icon: "error",
                button: "Close",
            });
        }

        function emailDuplication() {
            swal({
                title: "Failed!",
                text: "Email Id is already exist!",
                icon: "error",
                button: "Close",
            });
        }

        function phoneDuplication() {
            swal({
                title: "Failed!",
                text: "Phone number is already exist!",
                icon: "error",
                button: "Close",
            });
        }
    </script>
    <title>Document</title>
</head>
<body>

<?php
    include "../../partials/_dbconnect.php";
    include "php_script/add_student.php";
?>
<div class="main_cont">
        <div class="main_section">
            <span class="back_to_home"><a href="../admin_profile.php">Home</a> >> <span>add new student</span></span>
            <div class="header_part">
                <h2 class="text-center text-primary">Add new student</h2>
            </div>
            <div class="text_part">
                <div class="form_container">
                    <form action="add_student.php" method="post">
                        <div class="row">
                            <div class="col-25">
                                <label for="name">Full name: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="name" name="name" placeholder="myname title"  required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="email">Email id: </label>
                            </div>
                            <div class="col-75">
                                <input type="email" id="email" name="email" placeholder="myemail@gmail.com" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="phone">Phone: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="phone" name="phone" placeholder="0123456789" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="rollno">Roll No: </label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="rollno" name="rollno" placeholder="csm21033" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="academic_year">Academic year: </label>
                            </div>
                            <div class="col-75">
                                <!-- <input type="date" id="academic_year" name="academic_year" placeholder="2022" required> -->
                                <input type="number" min="2021" max="2099" step="1" id="academic_year" name="academic_year" placeholder="2022" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="submit_btnn">
                                <button type="submit" name="submit" class="submit_btn">Add new student </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="../script/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>