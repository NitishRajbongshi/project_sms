<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_sms";

    $conn = mysqli_connect($server, $username, $password, $dbname);

    if(!$conn) {
        echo "Failed to connect with database";
    }
?>