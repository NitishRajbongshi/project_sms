<?php
    include '../../../partials/_dbconnect.php';

    $text1 = $_POST['text1'];
    $text2 = $_POST['text2'];
    $sql = "
    UPDATE `group_meeting` SET `mark_read`='1' WHERE `meeting_code` = '$text1' AND `rollno` = '$text2'
    ";
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "success";
    }
    else {
        echo 'failed';
    }
?>