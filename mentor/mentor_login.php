<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/login_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Mentor Login</title>
</head>

<body>
    <?php
        include '../partials/_dbconnect.php';
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM `mentor_login` WHERE `mentor_email`= '$email'";
            $result = mysqli_query($conn, $sql);
            $no_row = mysqli_num_rows($result);
            if($no_row == 1) {
                while($row = mysqli_fetch_assoc($result)) {
                    if(password_verify($password, $row['mentor_password'])) {
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['mentorLogin'] = true;
                        $_SESSION['mentorId'] = $row['mentor_id'];
                        $_SESSION['email'] = $email;
                        $_SESSION['username'] = $row['mentor_name'];
                        $_SESSION['phone'] = $row['mentor_phone'];
                        header('location: mentor_profile.php');
                    }
                    else {
                        echo'
                            <div class="container mt-2">
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>Failed!</strong> Password is not match.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            </div>
                        ';
                    }
                }
            }
            else {
                echo'
                    <div class="container mt-2">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Failed!</strong> Email Id is not found. 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
                ';
            }
        }
    ?>
    <div class="cont">
        <div class="imag">
            <img src="../photo/login_image.png" alt="login image" width="350px" height="250px">
        </div>
        <div class="txtt">
            <h3 class="login_txt">Mentor Login</h3>
            <div class="frm">
                <form action="mentor_login.php" method="post">
                    <input type="email" placeholder="Email Id" name="email" required>
                    <input type="password" placeholder="Password." name="password" required>
                    <button class="my_btn">Submit</button>
                </form>
                <p class="response">Not received any email?<a href="#"> Contact now</a></p>
            </div>
        </div>
    </div>
    <script src="../script/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $("form").click(function () {
                $("input").css({ 'outline': 'none' });
            })
        })
    </script>
</body>

</html>