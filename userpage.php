<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">

    <title>User page</title>
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
            < class="nav-item">
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
        <!-- here is the sidebar -->
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
          <h3 class="mt-3" style="color: white;">Registered Users</h3>
          <div class="table-responsive">
            <table class="table table-lg table-dark text-center">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">First name</th>
                  <th scope="col">Last name</th>
                  <th scope="col">Email</th>
                  <th scope="col">City</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Phone number</th>
                  <th scope="col">Time Registered</th>
                  <th scope="col">Edit changes</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'server/db.php';
                $query = "SELECT id, time, F_name, L_name, Email, City, Gender, Phone FROM userdata";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                  die("Query failed: " . mysqli_error($connection));
                }
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>{$row['id']}</th>";
                    echo "<td>{$row['F_name']}</td>";
                    echo "<td>{$row['L_name']}</td>";
                    echo "<td>{$row['Email']}</td>";
                    echo "<td>{$row['City']}</td>";
                    echo "<td>{$row['Gender']}</td>";
                    echo "<td>{$row['Phone']}</td>";
                    echo "<td>{$row['time']}</td>";
                    echo "<td><button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" data-bs-whatever=\"@mdo\">Edit</button></td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='8'>No records found</td></tr>";
                }
                ?>
              </tbody>
            </table>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <?php     
                      // isset($_GET['fname']) ? htmlspecialchars($_GET['fname']) : '';
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
                              <p>You have Successfully edit the user with id number  </p>
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
              <div class="modal-content "> 
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit changes</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="server/update.php" method="POST">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="id-number" class="form-label">Id number:</label>
                        <input type="number" class="form-control" id="id-number" name="id-number" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="first-name" class="form-label">First name:</label>
                        <input type="text" class="form-control" id="first-name" name="first-name" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="second-name" class="form-label">Second name:</label>
                        <input type="text" class="form-control" id="second-name" name="second-name" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="city" class="form-label">City:</label>
                        <input type="text" class="form-control" id="city" name="city" required>
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
                      <div class="col-md-6 mb-3">
                        <label for="phone-number" class="form-label">Phone number:</label>
                        <input type="text" class="form-control" id="phone-number" name="phone-number" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="update" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
        <script>
      document.addEventListener('DOMContentLoaded', function () {
        const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
        
        // Check if there's an error message and show modal
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('registration')) {
          modal.show();
        }
      });
    </script>
  </body>
</html>
