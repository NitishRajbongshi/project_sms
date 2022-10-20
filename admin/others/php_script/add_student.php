<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $rollno = $_POST["rollno"];
    $academic_year = $_POST["academic_year"];
    $password = 1234;

    $rollno_duplicacy = false;
    $email_duplicacy = false;
    $phone_duplicacy = false;

    // searching for duplication
    $sql = "SELECT * FROM `student` WHERE `rollno` = '$rollno'";
    $result = mysqli_query($conn, $sql);
    $no_of_rows = mysqli_num_rows($result);
    if($no_of_rows > 0) {
        $rollno_duplicacy = true;
    }

    $sql = "SELECT * FROM `student` WHERE `student_email` = '$email'";
    $result = mysqli_query($conn, $sql);
    $no_of_rows = mysqli_num_rows($result);
    if($no_of_rows > 0) {
        $email_duplicacy = true;
    }

    $sql = "SELECT * FROM `student` WHERE `student_phone` = '$phone'";
    $result = mysqli_query($conn, $sql);
    $no_of_rows = mysqli_num_rows($result);
    if($no_of_rows > 0) {
        $phone_duplicacy = true;
    }

    // inserting new details
    if(($rollno_duplicacy == false) && ($email_duplicacy == false) && ($phone_duplicacy == false)) {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `student`(`rollno`, `student_email`, `student_phone`, `student_firstname`, `student_lastname`, student_password`, `academic_year`) VALUES ('$rollno','$email','$phone','$fname', '$lname', $hash_password','$academic_year')" ;
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo ' 
            <script>
                studentAdded();
            </script>
            ';
        }
        else {
            echo '
            <script>
                studentNotAdded();
            </script>
            ';
        }
    }
    else {
        if($rollno_duplicacy) {
            echo '
            <script>
                rollnoDuplication();
            </script>
            ';
        }
        if($email_duplicacy) {
            echo '
            <script>
                emailDuplication();
            </script>
            ';
        }
        if($phone_duplicacy) {
            echo '
            <script>
                phoneDuplication();
            </script>
            ';
        }
    }
}
?>