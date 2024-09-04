<?php
include 'server/db.php';
include 'server/modules/staff-pages.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'server/styleLink.php'; ?>

    <link href="resources/style/user-checklist-view.css?v=2" rel="stylesheet">
    <link href="resources/style/staff.css?v=2" rel="stylesheet">
    
    <title>
      <?php include 'server/title.php'; ?>
    </title>
</head>
<body> 
    <div id="section" class="container-fluid mx-0 px-0">        
        <?php
            menu5();
            $query = "SELECT * FROM drivers";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
        ?>  
    <div class="row justify-content-center mt-5">   
        <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Employer ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Middle Name</th>
                            <th scope="col" class="d-none d-md-table-cell">Last Name</th> <!-- Hidden on small screens -->
                            <th scope="col">Employee Name</th>
                            <th scope="col" class="d-none d-lg-table-cell">Position</th> <!-- Hidden on medium and small screens -->
                            <th scope="col" class="d-none d-xl-table-cell">Department</th> <!-- Hidden on large and smaller screens -->
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)){ 
                            $id = $row['employeeId'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['employeeId'];  ?></th>
                            <td><?php echo $row['first_name'];  ?></td>
                            <td><?php echo $row['middle_name'];  ?></td>
                            <td class="d-none d-md-table-cell"><?php echo $row['last_name'];  ?></td>
                            <td><?php echo $row['employeeName'];  ?></td>
                            <td class="d-none d-lg-table-cell"><?php echo $row['employeePosition'];  ?></td>
                            <td class="d-none d-xl-table-cell"><?php echo $row['department'];  ?></td>
                            <td><a href="driver-details-id.php?id=<?php echo $id; ?>">Edit</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php 
            }
            // include 'server/pagination.php';                           
    ?>
</div>            
</body>
</html>
