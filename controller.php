<?php 
require "connection.php";
// variable for validation 
$userpattern = '/[^a-zA-Z\s]/';
$phonepattern = "/^(07[15678]\d{7}|061\d{7}|062\d{7})$/";
$message = "";
$message_type = "";



if($_SERVER["REQUEST_METHOD"] == "POST"){
   $FNAME = mysqli_real_escape_string($conn, $_POST["fname"]);
   $LNAME = mysqli_real_escape_string($conn, $_POST["lname"]);
   $EMAIL = mysqli_real_escape_string($conn, $_POST["email"]);
   $PASSWORD = mysqli_real_escape_string($conn, $_POST["password"]);
   $CPASSWORD = mysqli_real_escape_string($conn, $_POST["cpassword"]);
   $CITY = mysqli_real_escape_string($conn, $_POST["city"]);
   $GENDER = mysqli_real_escape_string($conn, $_POST["gender"]);
   $PHONE = mysqli_real_escape_string($conn, $_POST["phone"]);
   $CHECK = mysqli_real_escape_string($conn, $_POST["check"]);

   
   // validation 
   if( preg_match($userpattern,$FNAME) || strlen($FNAME) < 2  || strlen($FNAME) > 20){
    $message = "invalid name input, first name should not be less than 3 character or greater than 20 character, only letters required ";
    $message_type = "error";
   }
   elseif( preg_match($userpattern,$LNAME) || strlen($LNAME) < 2  || strlen($LNAME) > 20){
    $message = "invalid name input, first name should not be less than 3 character or greater than 20 character, only letters required ";
    $message_type = "error";
   }
   elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $message = "Invalid email address!";
    $message_type = "error";
}
   
  
  
   

}