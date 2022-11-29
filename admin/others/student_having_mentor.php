<?php
    $sql = "
    SELECT * FROM `student` WHERE `assign_mentor` <> '0'
    ";
    $result = mysqli_query($conn, $sql);
    $no_of_rows = mysqli_num_rows($result);
    echo $no_of_rows
?>