<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password || admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/bg_color.css">
    <link rel="stylesheet" href="../../style/change_password.css">
</head>

<body>
    <?php
        include "../../partials/_dbconnect.php";
        $updatePass = -1;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $adminID = $_POST['conf_adminId'];
            $curPass = $_POST['curp'];
            $newPass = $_POST['newp'];
            $sql = "
            SELECT * FROM `admin_login` WHERE `admin_id` = '$adminID'
            ";
            $result = mysqli_query($conn, $sql);
            $no_of_rows = mysqli_num_rows($result);
            if($no_of_rows == 1) {
                while($row = mysqli_fetch_assoc($result)) {
                    if(password_verify($curPass, $row['admin_password'])) {
                        $hash = password_hash($newPass, PASSWORD_DEFAULT);
                        $sqll = "
                        UPDATE `admin_login` SET `admin_password`='$hash' WHERE `admin_id` = '$adminID'
                        ";
                        if(mysqli_query($conn, $sqll)) {
                            $updatePass = 1;
                        }
                        else {
                            $updatePass = 0;
                        }
                    }
                    else {
                        $updatePass = 2;
                    }
                }
            }
            else {
                $updatePass = 3;
            }
        }
    ?>
    <div class="mainContainer">
        <div class="subSection shadow-sm p-3">
            <div class="container">
                <div class="back my-2" style="font-size: 0.8rem;">
                    <a href="../admin_profile.php">Home</a><span> > Change password</span>
                </div>
                <div class="formSection">
                    <?php
                        if($updatePass == 1) {
                            echo '<p class="text-secondary">Success: Your password has updated.</p>';
                        }
                        else if($updatePass == 0) {
                            echo '<p class="text-secondary">Failed: Your password hasn\'t updated.</p>';
                        }
                        else if($updatePass == 2) {
                            echo '<p class="text-secondary">Failed: Your password isn\'t match.</p>';
                        }
                        else if($updatePass == 3) {
                            echo '<p class="text-secondary">Failed: Your admin ID isn\'t match.</p>';
                        }
                        else {
                            echo '';
                        }
                    ?>
                    <h2>Change password</h2>
                    <form action="change_password.php" method="post" autocomplete="off">
                        <div class="mb-3">
                            <label for="conf_adminId" class="form-label">Confirm Admin Id</label>
                            <input type="text" class="form-control rounded-0" id="conf_adminId" aria-describedby="emailHelp" name="conf_adminId"
                                required maxlength="30">
                        </div>
                        <div class="mb-3">
                            <label for="curp" class="form-label">Current password</label>
                            <input type="password" class="form-control rounded-0" id="curp" aria-describedby="emailHelp" name="curp"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="newp" class="form-label">Confirm new password</label>
                            <input type="password" class="form-control rounded-0" id="newp" aria-describedby="emailHelp" name="newp"
                                required maxlength="30">
                        </div>
                        <button type="submit" class="change_pass btn btn-primary rounded-0" style="width: 100%;"
                            name="conpass">Confirm</button>
                    </form>
                </div>
            </div>
            <div class="BtnSection"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>