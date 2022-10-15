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
    <title>Admin login</title>
</head>

<body>
    <?php
        include '../partials/_dbconnect.php';
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM `admin_login` WHERE `admin_email`= '$email'";
            $result = mysqli_query($conn, $sql);
            $no_row = mysqli_num_rows($result);
            if($no_row == 1) {
                while($row = mysqli_fetch_assoc($result)) {
                    if(password_verify($password, $row['admin_password'])) {
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['adminLogin'] = true;
                        $_SESSION['adminId'] = $row['admin_id'];
                        $_SESSION['email'] = $email;
                        $_SESSION['username'] = $row['admin_name'];
                        $_SESSION['phone'] = $row['admin_phone'];
                        header('location: admin_profile.php');
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
            <h3 class="login_txt">Admin Login</h3>
            <div class="frm">
                <form action="admin_login.php" method="post">
                    <input type="email" placeholder="Your Email Id" name="email" required>
                    <input type="password" placeholder="Your Password" name="password" required>
                    <button class="my_btn">Submit</button>
                </form>
                <p class="response">Register a new admin accout.<a href="#"> Click</a></p>
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