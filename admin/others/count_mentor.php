<?php
    $sql = "
    SELECT * FROM `mentor` WHERE 1
    ";
    $result = mysqli_query($conn, $sql);
    $no_of_rows = mysqli_num_rows($result);
    echo $no_of_rows
?>