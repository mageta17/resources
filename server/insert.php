<?php
    if(isset($_POST['insert'])) {
        require "db.php";

        // variable for validation 
        $userpattern = '/[^a-zA-Z\s]/';
        $phonepattern = '/^07\d{8}|061\d{7}|062\d{7}$/';
        $paswordpattern = '/^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{8,}$/';
        $message = "";
        $message_type = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $FNAME = mysqli_real_escape_string($connection, $_POST["fname"]);
            $LNAME = mysqli_real_escape_string($connection, $_POST["lname"]);
            $EMAIL = mysqli_real_escape_string($connection, $_POST["email"]);
            $PASSWORD = mysqli_real_escape_string($connection, $_POST["password"]);
            $CPASSWORD = mysqli_real_escape_string($connection, $_POST["cpassword"]);
            $CITY = mysqli_real_escape_string($connection, $_POST["city"]);
            $GENDER = mysqli_real_escape_string($connection, $_POST["gender"]);
            $PHONE = mysqli_real_escape_string($connection, $_POST["phone"]);

            // validation 
            if( preg_match($userpattern,$FNAME) || strlen($FNAME) < 2  || strlen($FNAME) > 20){
                $message = "invalidFname";

                header('Location: ../index.php?registration='.$message.'');
            } elseif( preg_match($userpattern,$LNAME) || strlen($LNAME) < 2  || strlen($LNAME) > 20){
                $message = "invalidLname";

                header('Location: ../index.php?registration='.$message.'');
            } elseif (!filter_var($EMAIL, FILTER_VALIDATE_EMAIL)) {
                $message = "invalidemail";

                header('Location: ../index.php?registration='.$message.'');
            } elseif(strlen($PASSWORD) < 8 ){
                $message = "invalidLPassword";

                header('Location: ../index.php?registration='.$message.'');
            } elseif(!preg_match($paswordpattern, $PASSWORD)){
                $message = "invalidPassword";

                header('Location: ../index.php?registration='.$message.'');
            } elseif ($CPASSWORD  != $PASSWORD){
                $messagge = "invalidcPassword";

                header('Location: ../index.php?registration='.$message.'');
            } elseif(preg_match($userpattern,$CITY)){
                $messagge = "invalidcity";

                header('Location: ../index.php?registration='.$message.'');
            } elseif(strlen($PHONE) < 10 || strlen($PHONE) > 10){
                $messagge = "invalidphone";

                header('Location: ../index.php?registration='.$message.''); 
            } elseif(!preg_match($phonepattern,$PHONE )){
                $messagge = "invalidPphone";

                header('Location: ../index.php?registration='.$message.'');  
            } else{
                // after all validation to be passed 
                $enc_password = password_hash($PASSWORD, PASSWORD_BCRYPT);
                $query = "INSERT INTO userdata(F_name, L_name, Email, Password, City, Gender, Phone) VALUES ('$FNAME', 
                '$LNAME',  '$EMAIL', '$enc_password', '$CITY', '$GENDER', '$PHONE' )";
                $result = mysqli_query($connection, $query);

                if($result){
                    $message = "Success";

                    header('Location: ../index.php?registration='.$message.'');
                } else{
                    $message = "Failed";

                    header('Location: ../index.php?registration='.$message.'');
                }
            }
        }
    } else {
        echo "Permision not denided";
    }    
?>