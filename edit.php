<?php
  
  include 'server/db.php';

  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // echo $id;

    
    $query = "SELECT * FROM userdata WHERE id = $id";
    $result = mysqli_query($connection, $query);

   
    if (mysqli_num_rows($result) > 0) {
      $user = mysqli_fetch_assoc($result);

    } else {
      echo "User not found!";
      exit();
    }
  }
   else {
    echo "ID not provided!";
    exit();
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">

    <title>Edit Page</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">User Data</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <!-- <a class="nav-link active" aria-current="page" href="userdata.php">Users details</a> -->
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-2 d-none d-md-block bg-dark sidebar">
          <div class="position-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link text-white" href="userpage.php">
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="index.php">
                  Register
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <h3 class="mt-3 text-white">Edit Details</h3>
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
            <form action="server/update.php" method="post">
              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
              <form>
                  <div class="mb-5 row">
                    <div class="col-md-2">
                      <label for="firstName" class="col-form-label">First Name</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" id="firstName" value="<?php echo $user['F_name']; ?>" name="first-name" class="form-control" aria-describedby="firstNameHelpInline">
                    </div>
                  </div>

                  <div class="mb-5 row">
                    <div class="col-md-2">
                      <label for="lastName" class="col-form-label">Last Name</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" id="lastName" value="<?php echo $user['L_name']; ?>" name="second-name" class="form-control" aria-describedby="lastNameHelpInline">
                    </div>
                  </div>

                  <div class="mb-5 row">
                    <div class="col-md-2">
                      <label for="email" class="col-form-label">Email</label>
                    </div>
                    <div class="col-md-4">
                      <input type="email" id="email" value="<?php echo $user['Email']; ?>" name="email" class="form-control" aria-describedby="emailHelpInline">
                    </div>
                  </div>

                  <div class="mb-5 row">
                    <div class="col-md-2">
                      <label for="city" class="col-form-label">City</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" id="city" value="<?php echo $user['City']; ?>" name="city" class="form-control" aria-describedby="cityHelpInline">
                    </div>
                  </div>

                  <div class="mb-5 row">
                    <div class="col-md-2">
                      <label for="gender" class="col-form-label">Gender</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" id="gender" value="<?php echo $user['Gender']; ?>" name="gender" class="form-control" aria-describedby="genderHelpInline">
                    </div>
                  </div>

                  <div class="mb-5 row">
                    <div class="col-md-2">
                      <label for="phoneNumber" class="col-form-label">Phone Number</label>
                    </div>
                    <div class="col-md-4">
                      <input type="text" id="phoneNumber" value="<?php echo $user['Phone']; ?>" name="phone-number" class="form-control" aria-describedby="phoneNumberHelpInline">
                    </div>
                  </div>
                  <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                       Submit
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirm </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                             <p>Are you sure you want to confirm changes ?</p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" name="update" class="btn btn-primary">Yes</button>
                          </div>
                        </div>
                      </div>
                    </div>                
            </form>
        </body>
</html>
