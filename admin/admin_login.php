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
    <div class="cont">
        <div class="imag">
            <img src="../photo/login_image.png" alt="login image" width="350px" height="250px">
        </div>
        <div class="txtt">
            <h3 class="login_txt">Admin Login</h3>
            <div class="frm">
                <form action="">
                    <input type="email" placeholder="Your Email Id" required>
                    <input type="password" placeholder="Your Password" required>
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