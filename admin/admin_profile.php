<?php
session_start();
if (($_SESSION['loggedin'] == false) || ($_SESSION['adminLogin'] == false) || !isset($_SESSION['loggedin']) || !isset($_SESSION['adminLogin'])) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&family=Ubuntu:wght@300;500&display=swap" rel="stylesheet">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="../style/profile_sidebar.css">
    <link rel="stylesheet" href="../style/bg_color.css">
    <link rel="stylesheet" href="style/button.css">
    <!-- <link rel="stylesheet" href="../style/popup_style.css"> -->
    <link rel="stylesheet" href="../style/profile_icon_mentor_admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Admin_profile</title>

</head>

<body id="body-pd">
    <?php
    include 'partials/_navbar.php';

    // logout and redirect to index page
    if (isset($_POST['logout'])) {
        header("location: admin_logout.php");
        exit;
    }

    if(isset($_POST['snoEdit'])) {
        echo "done";
    } 
    ?>

    <!-- change password -->
    <!-- <div class="cp">
        <div class="popup-content">
            <h2>Change password</h2>
            <form action="/php_tutorial/EVS/profile.php" method="post" autocomplete="off">
                <input type="text" name="snoEdit" id="snoEdit">

                <div class="mb-3">
                    <label for="curp" class="form-label">Current password</label>
                    <input type="password" class="form-control" id="curp" aria-describedby="emailHelp" name="curp" required>
                </div>
                <div class="mb-3">
                    <label for="newp" class="form-label">New password</label>
                    <input type="password" class="form-control" id="newp" aria-describedby="emailHelp" name="newp" required maxlength="30">
                </div>
                <div class="mb-3">
                    <label for="newcp" class="form-label">Confirm password</label>
                    <input type="password" class="form-control" id="newcp" aria-describedby="emailHelp" name="newcp" required maxlength="30">
                </div>
                <button type="submit" class="change_pass btn btn-primary" style="width: 100%;" name="conpass">CONFIRM</button>
            </form>
            <a class="closeBtn" href="javascript:void(0)">x</a>
        </div>
    </div> -->

    <!-- change profile -->
    <!-- <div class="cprof">
        <div class="popup-content">
            <h2>Update Profile</h2>
            <form action="/php_tutorial/EVS/admin/admin_profile.php" method="post" autocomplete="off">
                <input type="hidden" name="snoEdit" id="snoEdit">

                <div class="mb-3">
                    <label for="curp" class="form-label">Password</label>
                    <input type="password" class="form-control" id="curp" aria-describedby="emailHelp" name="curp" required>
                </div>
                <div class="mb-3">
                    <label for="newun" class="form-label">New Username</label>
                    <input type="text" class="form-control" id="newun" aria-describedby="emailHelp" name="newun" required value="<?php echo $_SESSION['username']; ?>" maxlength="25">
                </div>
                <div class="mb-3">
                    <label for="newm" class="form-label">New Mobile No.</label>
                    <input type="text" class="form-control" id="newm" aria-describedby="emailHelp" name="newm" required value="<?php echo $_SESSION['mobile']; ?>" maxlength="10" minlength="10" oninvalid="this.setCustomValidity('Invalid mobile number!')" oninput="setCustomValidity('')">
                </div>
                <div class="mb-3">
                    <label for="newe" class="form-label">New email</label>
                    <input type="email" class="form-control" id="newe" aria-describedby="emailHelp" name="newe" required value="<?php echo $_SESSION['email']; ?>" maxlength="50">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%;" name="conun">CONFIRM</button>
            </form>
            <a class="closeBtn" href="javascript:void(0)">x</a>
        </div>
    </div> -->

    
    <div class="container d-flex flex-row justify-content-start mt-5 py-5 flex-wrap">
        <div class="profile_icon px-4 py-3 me-3 admin_icon">
            <i class="fa-solid fa-user-tie fa-4x"></i>
        </div>
        <div class="profile_details ms-3">
            <h1 class="py-1">
                <?php 
                echo $_SESSION["username"];
                ?>
            </h1>
            <h6 class="text-secondary">
                <i class="bi bi-envelope-fill me-2"></i>
                <?php 
                echo $_SESSION["email"];
                ?>
            </h6>
        </div>
    </div>

    <div class="container py-3">
        <div class="row g-3 my-3">
            <div class="col-md-6 shadow-sm rounded p-3">
                <h6 class="secondary"><i class="bi bi-shield-lock-fill me-2"></i>Admin Id</h6>
                <h6 class="text-primary">
                <?php 
                echo $_SESSION["adminId"]
                ?>
                </h6>
            </div>
            <div class="col-md-6 shadow-sm rounded p-3">
                <h6 class="secondary"><i class="bi bi-telephone-fill me-2"></i>Phone</h6>
                <h6 class="text-primary">
                <?php 
                echo $_SESSION["phone"]
                ?>
                </h6>
            </div>
        </div>
        <div class="row g-3 my-3">
            <div class="col-md-6 shadow-sm rounded p-3">
                <h6 class="secondary"><i class="bi bi-envelope-fill me-2"></i>Email Id</h6>
                <h6 class="text-primary">
                <?php 
                echo $_SESSION["email"]
                ?>
                </h6>
            </div>
            <div class="col-md-6 shadow-sm rounded p-3">
                <h6 class="secondary"><i class="bi bi-geo-alt-fill me-2"></i>Location</h6>
                <h6 class="text-primary">Tezpur University</h6>
            </div>
        </div>

        <div class="container change_Btn">
            <span class="text-secondary openBtn" id="change_pass_admin">
                <i class="bi bi-key-fill me-1"></i> Change password
            </span>
        </div>
        <div class="container change_Btn">
            <span class="text-secondary update_profile" id="update_prof_admin">
                <i class="bi bi-pen-fill me-1"></i> Update profile
            </span>
        </div>
    </div>
    <!-- <hr class="featurette-divider"> -->

    <div class="mb-5"></div>


    <!--===== MAIN JS =====-->
    <script src="../script/profile_sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="../script/jquery.js"></script>
    <script src="../script/change_password.js"></script>
    <script src="../script/update_profile.js"></script>
    <script>
        $(document).ready(function() {
            // script for logout
            $("#logoutbtn").click(function() {
                window.location.replace("admin_logout.php");
            })
            $('#change_pass_admin').click(function() {
                window.location.replace("others/change_password.php");
            })
        })
    </script>
</body>

</html>