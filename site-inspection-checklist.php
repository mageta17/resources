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
    <!-- codes for temporarly table -->
    <div id="section" class="container-fluid mx-0 px-0">        
            <?php
                menu5();
                $query = "SELECT * FROM site_inspection_tempo";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) > 0) {
            ?>  
        <div class="row justify-content-center mt-5">   
            <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
                <div class="table-responsive">
                     <div class="text-center mb-4">
                        <h1 class="display-6">Forms in Progress</h1>
                     </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Site Id</th>
                                <th scope="col">Site Name:</th>
                                <th scope="col">Region</th>
                                <th scope="col">Inspection Date</th> <!-- Hidden on small screens -->
                                <th scope="col">Inspector Name</th>
                                <th scope="col">complete form</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($result)){ 
                                $id = $row['id'];
                            ?>
                            <tr>
                                <th scope="row"><?php echo $row['site_id'];  ?></th>
                                <td><?php echo $row['site_name'];  ?></td>
                                <td><?php echo $row['region'];  ?></td>
                                <td><?php echo $row['inspection_date'];  ?></td>
                                <td><?php echo $row['inspector_name'];  ?></td>
                                <td><a href="site-inspection.php?section=1&id=<?php echo $id; ?>">complete</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php 
                }
                                          
        ?>
    </div> 
    <!-- ends for temporarly table data            -->


     <!-- begin of data for permanent table -->
    <div id="section" class="container-fluid mx-0 px-0">        
        <?php
            // menu5();
            $query = "SELECT * FROM site_inspection_permanent";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
        ?>  
    <div class="row justify-content-center mt-5">   
        <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
            <div class="table-responsive">
                 <div class="text-center mb-4">
                    <h1 class="display-6">Forms Completed </h1>
                 </di>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Site Id</th>
                            <th scope="col">Site Name:</th>
                            <th scope="col">Region</th>
                            <th scope="col">Inspection Date</th> <!-- Hidden on small screens -->
                            <th scope="col">Inspector Name</th>
                            <th scope="col">View more</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)){ 
                            $id = $row['id'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['site_id'];  ?></th>
                            <td><?php echo $row['site_name'];  ?></td>
                            <td><?php echo $row['region'];  ?></td>
                            <td><?php echo $row['inspection_date'];  ?></td>
                            <td><?php echo $row['inspector_name'];  ?></td>
                            <td><a href="site-inspection-view.php?id=<?php echo $id; ?>">View</a></td>
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
    <!-- end of permanent table data  -->
</body>
</html>
