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
              <a class="nav-link active" aria-current="page" href="index.php">Register</a>
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
                <a class="nav-link text-white" href="#">
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
            <form action="server/update.php" method="post">
              <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                  <div class="mb-5 row">
                      <div class="col-auto">
                        <label for="firstName" class="col-form-label">First Name</label>
                      </div>
                      <div class="col-auto">
                        <input type="text" id="firstName" name="firstName" value="<?php echo $user['F_name']; ?>" class="form-control" aria-describedby="firstNameHelpInline">
                      </div>
                    </div>

                    <div class="mb-5 row">
                      <div class="col-auto">
                        <label for="lastName" class="col-form-label">Last Name</label>
                      </div>
                      <div class="col-auto">
                        <input type="text" id="lastName" name="lastName" value="<?php echo $user['L_name']; ?>" class="form-control" aria-describedby="lastNameHelpInline">
                      </div>
                    </div>

                    <div class="mb-5 row">
                      <div class="col-auto">
                        <label for="email" class="col-form-label">Email</label>
                      </div>
                      <div class="col-auto">
                        <input type="email" id="email" name="email" value="<?php echo $user['Email']; ?>" class="form-control" aria-describedby="emailHelpInline">
                      </div>
                    </div>

                    <div class="mb-5 row">
                      <div class="col-auto">
                        <label for="city" class="col-form-label">City</label>
                      </div>
                      <div class="col-auto">
                        <input type="text" id="city" name="city" value="<?php echo $user['City']; ?>" class="form-control" aria-describedby="cityHelpInline">
                      </div>
                    </div>

                    <div class="mb-5 row">
                      <div class="col-auto">
                        <label for="gender" class="col-form-label">Gender</label>
                      </div>
                      <div class="col-auto">
                        <input type="text" id="gender" name="gender" value="<?php echo $user['Gender']; ?>" class="form-control" aria-describedby="genderHelpInline">
                      </div>
                    </div>

                    <div class="mb-5 row">
                      <div class="col-auto">
                        <label for="phoneNumber" class="col-form-label">Phone Number</label>
                      </div>
                      <div class="col-auto">
                        <input type="text" id="phoneNumber" name="phoneNumber" value="<?php echo $user['Phone']; ?>" class="form-control" aria-describedby="phoneNumberHelpInline">
                      </div>
                    </div>
                  <button type="submit" name="update" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </main>
  </body>
</html>
