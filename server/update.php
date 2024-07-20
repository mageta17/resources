
<?php
    if(isset($_POST['update'])) {
        require "db.php";

        // variable for validation 
        $userpattern = '/[^a-zA-Z\s]/';
        $phonepattern = '/^07\d{8}|061\d{7}|062\d{7}$/';
        $message = "";
        $message_type = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = mysqli_real_escape_string($connection, $_POST["id"]);
            $fname = mysqli_real_escape_string($connection, $_POST["first-name"]);
            $lname = mysqli_real_escape_string($connection, $_POST["second-name"]);
            $email = mysqli_real_escape_string($connection, $_POST["email"]);
            $city = mysqli_real_escape_string($connection, $_POST["city"]);
            $gender = mysqli_real_escape_string($connection, $_POST["gender"]);
            $phone = mysqli_real_escape_string($connection, $_POST["phone-number"]);

            // validation 
            if( preg_match($userpattern,$fname) || strlen($fname) < 2  || strlen($fname) > 20){
                $message = "invalidFname";

                header('Location: ../edit.php?registration='.$message.'');
            } elseif( preg_match($userpattern,$lname) || strlen($lname) < 2  || strlen($lname) > 20){
                $message = "invalidLname";

                header('Location: ../edit.php?registration='.$message.'');
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "invalidemail";

                header('Location: ../edit.php?registration='.$message.'');
             } elseif(preg_match($userpattern, $city)){
                $message = "invalidcity";

                header('Location: ../edit.php?registration='.$message.'');
            } elseif(strlen($phone) < 10 || strlen($phone) > 10){
                $message = "invalidphone";

                header('Location: ../edit.php?registration=' . $message . '&id=' . $id); 
            } elseif(!preg_match($phonepattern, $phone)){
                $message = "invalidPphone";

                header('Location: ../edit.php?registration='.$message.'');  
            } else{
                // after all validation to be passed 
                
                $query = "UPDATE userdata SET F_name = '$fname', L_name = '$lname', Email = '$email', City = '$city', Gender = '$gender', Phone = '$phone' WHERE id = '$id'";
                $result = mysqli_query($connection, $query);

                if($result){
                    $message = "Success";

                    header('Location: ../userpage.php?registration=' . $message . '&id=' . $id);
                    exit();
                } else{
                    $message = "Failed";

                    header('Location: ../edit.php?registration='.$message.'');
                }
            }
        }
    } else {
        $message = "Permission";

        header('Location: ../index.php?registration='.$message.'');
    }    
?>
