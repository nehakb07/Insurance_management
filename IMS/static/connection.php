<?php
error_reporting(0);
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "insu";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn)
    {
        echo "connection established";
    }
    else{
        echo "connection failed".mysqli_connect_error();
    }

?>