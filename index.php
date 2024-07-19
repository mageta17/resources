<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">

    <title>Registration</title>
   
  </head>

  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container-fluid bg-dark text-light py-3">
      <header class="text-center">
        <h4 class="display-6">Registration</h4>
      </header>
    </div>

    <section class="container my-2 bg-dark text-light w-50 p-3 rounded-3 mt-5 shadow-lg">
      <?php          
        if(!empty($_GET['registration'])) {
          $message = $_GET['registration'];

          if($message == "invalidFname") {
        ?>
          <div class="alert alert-danger text-center" role="alert">
            <p>Please enter valid first name</p>
          </div>            
        <?php
          } elseif($message == "invalidLname") {
        ?>
          <div class="alert alert-danger text-center" role="alert">
            <p>Please enter valid last name</p>
          </div>            
        <?php
           } elseif($message == "invalidemail"){
            ?>
             <div class="alert alert-danger text-center" role="alert">
               <p>Please enter valid last name</p>
            </div> 
        <?php
           } elseif($message == "invalidLPassword"){
          ?>
             <div class="alert alert-danger text-center" role="alert">
               <p>invalid password length, password should have at least minimum of  8 character</p>
            </div> 
        <?php    
           } elseif($message == "invalidPassword"){
            ?>
               <div class="alert alert-danger text-center" role="alert">
                 <p>Please enter strong  password, the strong password should have at least one uppercase, lowercase , number and special character</p>
              </div> 
          <?php   
           } elseif($message == "invalidcPassword"){
            ?>
               <div class="alert alert-danger text-center" role="alert">
                 <p>Error confirm password mismatch</p>
              </div> 
          <?php 
           } elseif($message == "invalidcity"){
            ?>
               <div class="alert alert-danger text-center" role="alert">
                 <p>Number are not required in city field</p>
              </div> 
          <?php 
           } elseif($message == "invalidcity"){
            ?>
               <div class="alert alert-danger text-center" role="alert">
                 <p>Number are not required in city field</p>
              </div> 
          <?php 
           }  elseif($message == "invalidphone"){
            ?>
               <div class="alert alert-danger text-center" role="alert">
                 <p>invalid phone number</p>
              </div> 
          <?php 
           } elseif($message == "invalidPphone"){
            ?>
               <div class="alert alert-danger text-center" role="alert">
                 <p>invalid phone number</p>
               </div> 
          <?php 
           }  elseif($message == "Success"){
            ?>
               <div class="alert alert-success text-center " role="alert">
                   <p>You have Successfully submited your form </p>
               </div> 
          <?php 
           }  elseif($message == "Failed"){
            ?>
               <div class="alert alert-danger text-center" role="alert">
                 <p>There is an error in submitting data to the database</p>
               </div>  
          <?php 
           }   elseif($message == "Permission"){
            ?>
               <div class="alert alert-danger text-center" role="alert">
                 <p>Permission denied, please submit the form</p>
               </div>  
          <?php 
           } 
           
        }
      ?>
      <form class="row g-3 r-5 form-container" action="server/insert.php" method="POST">        
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
          <button type="submit" name="insert" class="btn btn-primary">Sign in</button>
          <!-- <a href="userpage.php">See registers</a> -->
        </div>
      </form>
    </section>
  </body>
</html>