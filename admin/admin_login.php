<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login_style.css">
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
                        // start the session
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['adminId'] = $row['admin_id'];
                        $_SESSION['email'] = $email;
                        $_SESSION['username'] = $row['admin_name'];
                        $_SESSION['phone'] = $row['admin_phone'];

                        header('location: admin_profile.php');
                    }
                    else {
                        echo "password mismatch";
                    }
                }
            }
            else {
                echo "emailid is not found";
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
    <script>
        $(document).ready(function () {
            $("form").click(function () {
                $("input").css({ 'outline': 'none' });
            })
        })
    </script>
</body>

</html>