<?php 
require "connection.php";

$connection = new Connection();

if($_SERVER["REQUEST_METHOD"] == "POST"){
   $FNAME = mysqli_real_escape_string($connection->getConnection(), $_POST["fname"]);
   $LNAME = mysqli_real_escape_string($connection->getConnection(), $_POST["lname"]);
   $EMAIL = mysqli_real_escape_string($connection->getConnection(), $_POST["email"]);
   $PASSWORD = mysqli_real_escape_string($connection->getConnection(), $_POST["password"]);
   $CPASSWORD = mysqli_real_escape_string($connection->getConnection(), $_POST["cpassword"]);
   $CITY = mysqli_real_escape_string($connection->getConnection(), $_POST["city"]);
   $GENDER = mysqli_real_escape_string($connection->getConnection(), $_POST["gender"]);
   $PHONE = mysqli_real_escape_string($connection->getConnection(), $_POST["phone"]);
   $CHECK = mysqli_real_escape_string($connection->getConnection(), $_POST["check"]);

   
   
  
  
   

}