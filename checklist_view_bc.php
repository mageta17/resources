<?php
    include 'server/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      <?php include 'server/title.php' ?>
    </title>    
    
    <script src="resources/jquery/jquery-3.5.1.min.js"></script>

    <?php include 'server/styleLink.php' ?>

    <?php include 'server/style.php' ?>
    
    <style>
        #admin-vehicles-table {
            width: 100%;
            margin-top: 10px; 
            border-spacing: 0; 
            border-collapse: separate;
        }
        
        #admin-vehicles-table td, #admin-vehicles-table th {
            border-bottom:1px solid #ddd;
            border-left:1px solid #ddd;
            padding: 8px;
        }

        #admin-vehicles-table tr:first-child th {
            border-top:1px solid #ddd;
        }

        #admin-vehicles-table tr th:first-child {
            width: 53px;
        }

        #admin-vehicles-table tr td:last-child, #admin-vehicles-table tr th:last-child {
            border-right:1px solid #ddd;
        }
        #admin-vehicles-table a {
            font-weight: 400;
            color: #0d6efd; 
        }

        @media (max-width: 768px) {
            #filter_table {
                margin-top: 20px;
                margin-bottom: 20px;
            }
            #filter_from, #filter_to  {
                width: 100px;
            }
        }
        .info-box {
            background-color: blue;
            color: white;
            margin-top: 20px; 
            padding: 10px; 
            border-radius: 5px; 
            width: 99%; 
        }
        .card-img-top {
            width: 476.5px;
            height: 500.325px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php $pg = 'users'; include 'server/navigation.php' ?>

        <div id="content">
            <nav class="navbar navbar-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-success btn-sm">
                        <i class="bi bi-list-ul"></i>
                        <span>Hide / Unhide menu</span>
                    </button>

                    <?php include 'server/title-3.php' ?>
                </div>
            </nav>

            <div id="section" class="container-fluid">
                <div id="section-1" class="row">
                <form action="#" method="GET">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse" id="navbarSupportedContent">                            
                            <ul class="navbar-nav me-auto mb-1 mb-lg-0">
                                <li class="nav-item">
                                    
                                </li>
                            </ul>
                            
                            <div class="d-flex">
                                <input name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" class="form-control me-2 form-control-sm" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
                            </div>                            
                          </div>                          
                        </div>
                    </nav> 
                    </form>                    
                </div>

                <div id="section-2" class="row">
                    <div class="container-fluid" style="width: 100%; overflow-x: auto; font-size: 12px;">

        <?php                  
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
            <div class="col-lg-10">
                <form action="">
                    <div class="container mt-5">
                        <div class="row row-cols-1 row-cols-sm-2 g-3">
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
                                <div class="col">
                                    <div class="card">
                                        <img src="<?php echo $imagePath ?>" class="card-img-top img-fluid" alt="Image not available">
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
                </div>

                <div id="section-3" class="row">
                    
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#sidebarCollapse").on('click',function(){
                $("#sidebar").toggleClass('active');
            });
        });
    </script>

    <script src="resources/bootstrap5.1.3/js/bootstrap.bundle.min.js"></script>

</body>
</html>