<?php 
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpassword = "root";
 $dbname = "form";

$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

if (mysqli_connect_errno() == 0) {
    echo "connection successfully "; 
}
