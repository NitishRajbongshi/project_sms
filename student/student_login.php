<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/login_style.css">
    <!-- sweet alert CDN -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- script for sweet alert -->
    <script defer>
        function passwordFailure() {
            swal({
                title: "Failed!",
                text: "Password is not match!",
                icon: "error",
                button: "Close",
            });
        }

        function emailFailure() {
            swal({
                title: "Failed!",
                text: "Email Id is not found!",
                icon: "error",
                button: "Close",
            });
        }
    </script>
    <title>Login</title>
</head>

<body>
    <?php
        include '../partials/_dbconnect.php';
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM `student` WHERE `student_email`= '$email'";
            $result = mysqli_query($conn, $sql);
            $no_row = mysqli_num_rows($result);
            if($no_row == 1) {
                while($row = mysqli_fetch_assoc($result)) {
                    if(password_verify($password, $row['student_password'])) {
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['studentLogin'] = true;
                        $_SESSION['rollno'] = $row['rollno'];
                        $_SESSION['email'] = $email;
                        $_SESSION['username'] = $row['student_firstname'].' '.$row['student_lastname'];
                        $_SESSION['phone'] = $row['student_phone'];
                        $_SESSION['depertment'] = $row['student_depertment'];
                        $_SESSION['program'] = $row['student_program'];
                        $_SESSION['mentor_id'] = $row['assign_mentor'];
                        header('location: student_profile.php');
                    }
                    else {
                        echo'
                            <script>
                                passwordFailure();
                            </script>
                        ';
                    }
                }
            }
            else {
                echo'
                    <script>
                        emailFailure();
                    </script>
                ';
            }
        }
    ?>

    <div class="cont">
        <div class="imag">
            <img src="../photo/login_image.png" alt="login image" width="350px" height="250px">
        </div>
        <div class="txtt">
            <h3 class="login_txt">Student Login</h3>
            <div class="frm">
                <form action="student_login.php" method="post">
                    <input type="email" placeholder="Your Email Id" name="email" required>
                    <input type="password" placeholder="Your Password" name="password" required>
                    <button class="my_btn">Submit</button>
                </form>
                <p class="response">Not received any email?<a href="#"> Contact now</a></p>
            </div>
        </div>
    </div>
    <script src="../script/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $("form").click(function () {
                $("input").css({ 'outline': 'none' });
            })
        })
    </script>
</body>

</html>