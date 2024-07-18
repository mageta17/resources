
<?php 
include 'server/db.php';
$query = "SELECT id, time, F_name, L_name, Email, City, Gender, Phone FROM userdata";
$result = mysqli_query($connection, $query);
if (!$result) {
  die("Query failed: " . mysqli_error($connection));
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

    <title>User page</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <!-- navbar  -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">User data</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Register</a>
              </li>
<!-- 
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>

              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li> -->

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
            <div class="col-md-2 bg-dark d-none d-md-block sidebar">
                <div class="left-sidebar">

                </div>
            </div>
        </div>
        <main class="col-md-7  ml-sm-auto col-lg-10 px-4" role="main">
            <h3>Registerd users</h3>
            <div class="table-responsive">
                <table class=" table table-sm table-dark">
                    <thead>

                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name </th>
                        <th scope="col">Email </th>
                        <th scope="col">City</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Phone number  </th>
                        <th scope="col">Time Registerd</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php
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
                            echo "</tr>";
                          }
                        } else {
                          echo "<tr><td colspan='7'>No records found</td></tr>";
                        }
                      ?>
                  </table>
            </div>
        </main>
      </div>  
  </body>
</html>
