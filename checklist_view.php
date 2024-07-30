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
            width: 100%;
            height: 300px; 
            object-fit: cover;
        }
        @media (max-width: 768px) {
            .card-img-top {
                height: 300px; 
            }
        }
    </style>
</head>
<body> 
    <div id="section" class="container-fluid mx-0 px-0">        
        <?php
            menu5();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $query = "SELECT * FROM mv_check_list_360 WHERE id = $id";
                $result = mysqli_query($connection, $query);
            } else {
                echo "ID not found";
            } 
            
            if (mysqli_num_rows($result) > 0) {
        ?>
        <div class="row justify-content-center mx-0">
            <div class="col-lg-10 mt-5" style="background-color: #f8f9fa;">
                <form action="">
                    <div class="container mt-5">
                        <div class="row row-cols-1 row-cols-md-3 g-3">
                        <?php 
                        while ($row = mysqli_fetch_assoc($result)) { 
                            $id = $row['id'];
                            // Query to get images related to the current checklist entry
                            $query_images = "SELECT * FROM mv_checklist_360_images_rep WHERE checklistId = $id";
                            $result_images = mysqli_query($connection, $query_images);

                            // Array to store images
                            $images = [];
                            while ($image_row = mysqli_fetch_assoc($result_images)) {
                                $images[$image_row['category']] = $image_row['img_name'];
                            }

                            // Define categories
                            $categories = ['front_view','rear_view', 'left_side_view', 
                            'right_side_view', 'loadbin_cover', 'windscreen', 'license_disk', 
                             'towbar', 'lf_tyre_age', 'lf_tyre_treat', 'rf_tyre_age', 'rf_tyre_treat',
                             'lr_tyre_age', 'lr_tyre_treat', 'rr_tyre_age', 'rr_tyre_treat', 'rear_3pt_seatbelts',
                             'driver_3pt_seatbelts', 'co_driver', 'bluetooth', 'odometer', 'service_book', 
                             'emergence_triangle', 'first_aid_kit'
                            
                            ];

                            foreach ($categories as $category) {
                                $categoryDisplay = ucfirst(str_replace('_', ' ', $category));
                                $imagePath = isset($images[$category]) 
                                    ? "resources/images/mv_checklist_360_images/{$images[$category]}"
                                    : "resources/images/placeholder-image.jpg"; 

                                $answer = $row[$category] ?? 'No data'; 
                                ?>
                                <div class="col mb-4">
                                    <div class="card">
                                        <img src="<?php echo $imagePath ?>" class="card-img-top" alt="Image not available">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $categoryDisplay; ?></h5>
                                            <p class="card-text"><?php echo $answer; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
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
