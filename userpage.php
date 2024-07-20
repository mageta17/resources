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
                    ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['F_name']; ?></td>
                      <td><?php echo $row['L_name']; ?></td>
                      <td><?php echo $row['Email']; ?></td>
                      <td><?php echo $row['City']; ?></td>
                      <td><?php echo $row['Gender']; ?></td>
                      <td><?php echo $row['Phone']; ?></td>
                      <td><?php echo $row['time']; ?></td>
                      <td><button type="button" class="btn btn-primary" onclick="redirectToEdit(<?php echo $row['id']; ?>)">Edit</button></td>
                    </tr>
                    <?php
                  }
                } else {
                  echo "<tr><td colspan='9'>No records found</td></tr>";
                }
                ?>
              </tbody>
            </table>
        </main>
      </div>
    </div>
    <script>
          function redirectToEdit(id) 
          {
           window.location.href = 'edit.php?id=' + id;
          }
    </script>

  </body>
</html>
