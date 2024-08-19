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
    <style>
        /* .form-container{
            background-color: #f8f9fa;
            /* padding: 20px; */
            /* border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
        /* } */ 
    </style>
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
        <div class="col-lg-6"  style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
            <table class="table table-hover table-responsive">
                <thead>
                    <tr>
                    <th scope="col">Emplyoer id</th>
                    <th scope="col">First name</th>
                    <th scope="col">Second name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">EmployeeName </th>
                    <th scope="col">Position </th>
                    <th scope="col">Department </th>
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
                    <td><?php echo $row['last_name'];  ?></td>
                    <td><?php echo $row['employeeName'];  ?></td>
                    <td><?php echo $row['employeePosition'];  ?></td>
                    <td><?php echo $row['department'];  ?></td>
                    <td><a href="checklist_view.php?id=<?php echo $id; ?>">Edit</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            </div>

    </div>
            <?php 
                     }
                    // include 'server/pagination.php';                           
                ?>
            </div>            
        </div>
       
    </div>
</body>
</html>
