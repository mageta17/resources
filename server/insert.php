
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
            $fname = mysqli_real_escape_string($connection, $_POST["fname"]);
            $lname = mysqli_real_escape_string($connection, $_POST["lname"]);
            $email = mysqli_real_escape_string($connection, $_POST["email"]);
            $password = mysqli_real_escape_string($connection, $_POST["password"]);
            $cpassword = mysqli_real_escape_string($connection, $_POST["cpassword"]);
            $city = mysqli_real_escape_string($connection, $_POST["city"]);
            $gender = mysqli_real_escape_string($connection, $_POST["gender"]);
            $phone = mysqli_real_escape_string($connection, $_POST["phone"]);

            // validation 
            if( preg_match($userpattern,$fname) || strlen($fname) < 2  || strlen($fname) > 20){
                $message = "invalidFname";

                header('Location: ../index.php?registration='.$message.'');
            } elseif( preg_match($userpattern,$lname) || strlen($lname) < 2  || strlen($lname) > 20){
                $message = "invalidLname";

                header('Location: ../index.php?registration='.$message.'');
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "invalidemail";

                header('Location: ../index.php?registration='.$message.'');
            } elseif(strlen($password) < 8 ){
                $message = "invalidLPassword";

                header('Location: ../index.php?registration='.$message.'');
            } elseif(!preg_match($paswordpattern,$password)){
                $message = "invalidPassword";

                header('Location: ../index.php?registration='.$message.'');
            } elseif ($cpassword  != $password){
                $message = "invalidcPassword";

                header('Location: ../index.php?registration='.$message.'');
            } elseif(preg_match($userpattern, $city)){
                $message = "invalidcity";

                header('Location: ../index.php?registration='.$message.'');
            } elseif(strlen($phone) < 10 || strlen($phone) > 10){
                $message = "invalidphone";

                header('Location: ../index.php?registration='.$message.''); 
            } elseif(!preg_match($phonepattern, $phone)){
                $message = "invalidPphone";

                header('Location: ../index.php?registration='.$message.'');  
            } else{
                // after all validation to be passed 
                $enc_password = password_hash($password, PASSWORD_BCRYPT);
                $query = "INSERT INTO userdata(F_name, L_name, Email, Password, City, Gender, Phone) VALUES ('$fname', 
                '$lname',  '$email', '$enc_password', ' $city', '$gender', ' $phone' )";
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
        $message = "Permission";

        header('Location: ../index.php?registration='.$message.'');
    }    
?>
