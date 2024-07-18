<?php 
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpassword = "root";
    $dbname = "resource";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

    if (mysqli_connect_errno() == 0) {
        echo " "; 
    }
    // i add comment
?>