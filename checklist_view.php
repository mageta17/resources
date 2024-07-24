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
        .info-box {
            background-color: blue;
            color: white;
            margin-top: 20px; 
            padding: 10px; 
            border-radius: 5px; 
            width: 99%; 
        }
        .card-img-top {
            width: 314px;
            height: 314px;
            object-fit: cover;
        }
    </style>
</head>
<body> 
    <div id="section" class="container-fluid mx-0 px-0">        
        <?php
            menu5();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            $query = "SELECT * FROM mv_check_list_360 WHERE id  = $id";
            $result = mysqli_query($connection, $query);
            } else{

                echo "id  not found";

            } if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="row justify-content-center mx-0">
            <div class="col-lg-6">
                <form action="">
                    <div class="container mt-5">
                        <div class="row row-cols-1 row-cols-sm-2 g-3">
                        <?php while ($row = mysqli_fetch_assoc($result)) { 
                            $id = $row['id'];
                            // Query to get images related to the current checklist entry
                            $query_images = "SELECT * FROM mv_checklist_360_images_rep WHERE checklistId = $id";
                            $result_images = mysqli_query($connection, $query_images);
                            ?>
                            <div class="card info-box">
                                <div class="card-body">
                                    <p><strong>Inspection ID:</strong> <?php echo $row['id']; ?></p>
                                    <p><strong>Date and Time:</strong> <?php echo $row['time']; ?></p>
                                </div>
                            </div>

                            <?php while ($image_row = mysqli_fetch_assoc($result_images)) {
                                $imagePath = "resources/images/mv_checklist_360_images/{$image_row['img_name']}";
                                
                                $category = ucfirst(str_replace('_', ' ', $image_row['category']));
                            ?>
                            <div class="col">
                                <div class="card">
                                    <img src="<?php echo $imagePath?>" class="card-img-top" alt="No image found">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $category; ?></h5>
                                        <p class="card-text"><?php echo $row[$image_row['category']]; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        <?php } ?>
                        </div>   
                    </div>
                </form>
                <?php 
                    // include 'server/pagination.php';                           
                ?>
            </div>            
        </div>
        <?php } ?>
    </div>
</body>
</html>
