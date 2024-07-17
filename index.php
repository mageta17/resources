<?php 
require "connection.php";
// variable for validation 
$userpattern = '/[^a-zA-Z\s]/';
$phonepattern = '/^07\d{8}|061\d{7}|062\d{7}$/';
$paswordpattern = '/^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{8,}$/';
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
   
   // validation 
   if( preg_match($userpattern,$FNAME) || strlen($FNAME) < 2  || strlen($FNAME) > 20){
    $message = "invalid name input, first name should not be less than 3 character or greater than 20 character, only letters required ";
    $message_type = "error";
   }
   elseif( preg_match($userpattern,$LNAME) || strlen($LNAME) < 2  || strlen($LNAME) > 20){
    $message = "invalid name input, last name should not be less than 3 character or greater than 20 character, only letters required ";
    $message_type = "error";
   }
   elseif (!filter_var($EMAIL, FILTER_VALIDATE_EMAIL)) {
    $message = "Invalid email address!";
    $message_type = "error";
}
  elseif(strlen($PASSWORD) < 8 ){
    $message = "Password should have at least 8 character";
    $message_type = "error";
  }
  elseif(!preg_match($paswordpattern, $PASSWORD)){
    $message = "The password should at least contain one uppercase , lowercase and special symbol ";
    $message_type = "error";
  }
  elseif ($CPASSWORD  != $PASSWORD){
    $message = "In confirm password, password mismatch";
    $message_type = "error";
  }
  elseif(preg_match($userpattern,$CITY)){
     $message = "Number are not required in city field";
     $message_type = "error";
  }
  elseif(strlen($PHONE) < 10 || strlen($PHONE) > 10){
    $message = "invalid phone number";
    $message_type = "error";

  }
  elseif(!preg_match($phonepattern,$PHONE )){
     $message = "invalid phone number";
     $message_type = "error";
  }
  
  else{
    // after all validation to be passed 
    $enc_password = password_hash($PASSWORD, PASSWORD_BCRYPT);
    $query = "INSERT INTO form(F_name, L_name, Email, Password, City, Gender, Phone) VALUES ('$FNAME', 
    '$LNAME',  '$EMAIL', '$enc_password', '$CITY', '$GENDER', '$PHONE' )";
    $result = mysqli_query($conn, $query);

    if($result){
      $message = "Your application has been successfully submitted. ";
      $message_type = "success";
    }
    else{
      $message = "There is an error occured during sending data to the database";
      $message_type ="error";
    }
  
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Form</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container-fluid bg-dark text-light py-3">
      <header class="text-center">
        <h4 class="display-6">Registration</h4>
      </header>
    </div>
    <section class="container my-2 bg-dark text-light w-50 p-3 rounded-3 mt-5 shadow-lg">
      <form class="row g-3 r-5 form-container" action="" method="POST">
      <?php if (!empty($message)): ?>
        <div class="message <?php echo $message_type; ?>">
            <?php echo $message; ?>
        </div>
        <?php endif; ?>
        <div class="col-md-6">
          <label for="inputFirstName" class="form-label">First name</label>
          <input type="text" class="form-control" id="inputFirstName" name="fname" required>
          <div class="invalid-feedback">
            Please provide a first name.
          </div>
        </div>
        <div class="col-md-6">
          <label for="inputLastName" class="form-label">Last name</label>
          <input type="text" class="form-control" id="inputLastName" name="lname"required>
          <div class="invalid-feedback">
            Please provide a last name.
          </div>
        </div>
        <div class="col-md-6">
          <label for="inputEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" placeholder="example@example.com" required>
          <div class="invalid-feedback">
            Please provide a valid email address.
          </div>
        </div>
        <div class="col-md-6">
          <label for="inputPassword" class="form-label">Create password</label>
          <input type="password" class="form-control" id="inputPassword" name="password" required>
          <div class="invalid-feedback">
            Please provide a password.
          </div>
        </div>
        <div class="col-md-6">
          <label for="inputConfirmPassword" class="form-label">Confirm password</label>
          <input type="password" class="form-control" id="inputConfirmPassword" name="cpassword" required>
          <div class="invalid-feedback">
            Please confirm your password.
          </div>
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input type="text" class="form-control" id="inputCity" name="city"required>
          <div class="invalid-feedback">
            Please provide a city.
          </div>
        </div>
        <div class="col-md-4">
          <label for="inputGender" class="form-label">Gender</label>
          <select id="inputGender" class="form-select" name="gender">
            <option selected disabled>Choose...</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <div class="invalid-feedback">
              Please select a gender.
            </div>
          </select>
        </div>
        <div class="col-md-4">
          <label for="inputPhone" class="form-label">Phone number</label>
          <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="07xxxxxxxx" required>
          <div class="invalid-feedback">
            Please provide a phone number.
          </div>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="check" required>
            <label class="form-check-label" for="gridCheck">
              Agree to terms and policy
            </label>
            <div class="invalid-feedback">
              You must agree before submitting.
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </form>
    </section>
  </body>
</html>
