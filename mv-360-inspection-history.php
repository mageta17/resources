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
        /* Add this style block if you don't have an external CSS file */
        .info-box {
            background-color: blue;
            color: white;
            margin-top: 20px; /* Margin top of 20 pixels */
            padding: 10px; /* Adjust padding as needed */
            border-radius: 5px; /* Optional: round the corners */
            width: 80%; /* Full width of the container */
        }
    </style>
</head>
<body> 
    <div id="section" class="container-fluid mx-0 px-0">        
        <?php
            menu5();
            
            $query = "SELECT * FROM mv_check_list_360 ORDER BY id DESC";
            $result = mysqli_query($connection, $query);
        ?>
        <div class="row justify-content-center mx-0">
            <div class="col-lg-6">
                <form action="">
                    <div class="container mt-5">
                        <div class="row row-cols-1 row-cols-sm-2 g-3">
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <!-- <div class="col-lg-6">
                                <div class="info-box card">
                                    <p><strong>Inspection ID:</strong> <?php// echo $row['id']; ?></p>
                                    <p><strong>Date and Time:</strong> <?php //echo $row['time']; ?></p>
                                </div>
                            </div> -->
                            <div class="card info-box">
                                <div class="card-body">
                                    <p><strong>Inspection ID:</strong> <?php echo $row['id']; ?></p>
                                    <p><strong>Date and Time:</strong> <?php echo $row['time']; ?></p>
                                </div>
                                </div>
                            <div class="col">
                                <div class="card">
                                    <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="No image">
                                    <div class="card-body">
                                        <h5 class="card-title">Front view</h5>
                                        <p class="card-text"><?php echo $row['front_view']; ?></p>
                                    </div>
                                </div>
                            </div>
                       
                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="No Image">
                                <div class="card-body">
                                    <h5 class="card-title">Rear view</h5>
                                     <p class="card-text"><?php echo $row['rear_view']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Left side view</h5>
                                     <p class="card-text"><?php echo $row['left_side_view']; ?></p>
                                </div>
                            </div>
                        </div>

                         <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Right side view</h5>
                                   <p class="card-text"><?php echo $row['right_side_view']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Loadbin cover</h5>
                                    <p class="card-text"><?php echo $row['loadbin_view']; ?></p>
                                </div>
                            </div>
                        </div>


                         <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Windscreen</h5>
                                    <p class="card-text"><?php echo $row['windscreen_view']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">License Disk</h5>
                                    <p class="card-text"><?php echo $row['license_disk']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Towbar</h5>
                                    <p class="card-text"><?php echo $row['windscreen_view']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Left Front Tyre age</h5>
                                    <p class="card-text"><?php echo $row['lf_tyre_age']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Left Front Tyre Treat</h5>
                                    <p class="card-text"><?php echo $row['lf_tyre_treat']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Right Front Tyre age</h5>
                                    <p class="card-text"><?php echo $row['rf_tyre_age']; ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Right Front Tyre Treat</h5>
                                    <p class="card-text"><?php echo $row['rf_tyre_treat']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Left Rear Tyre age</h5>
                                    <p class="card-text"><?php echo $row['lr_tyre_age']; ?></p>
                                </div>
                            </div>
                        </div>


                         <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Left Rear Tyre  Treat</h5>
                                    <p class="card-text"><?php echo $row['lr_tyre_treat']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Right Rear Tyre Age</h5>
                                    <p class="card-text"><?php echo $row['rr_tyre_age']; ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Right Rear Tyre  Treat</h5>
                                    <p class="card-text"><?php echo $row['rr_tyre_treat']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Rear 3pt Seatbelt</h5>
                                    <p class="card-text"><?php echo $row['rear_3pt_seatbelts']; ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Driver 3pt Seatbelt</h5>
                                    <p class="card-text"><?php echo $row['driver_3pt_seatbelt']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Co Driver 3ptS/belt</h5>
                                    <p class="card-text"><?php echo $row['co_driver_3p_belt']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Bluetooth</h5>
                                    <p class="card-text"><?php echo $row['bluetooth']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Odometer</h5>
                                    <p class="card-text"><?php echo $row['odometer']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Service Book</h5>
                                    <p class="card-text"><?php echo $row['service_book']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Emergence Triangle</h5>
                                    <p class="card-text"><?php echo $row['emergence_triangle']; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="NO Image">
                                <div class="card-body">
                                    <h5 class="card-title">Firts Aid Kit</h5>
                                    <p class="card-text"><?php echo $row['first_aid_kit']; ?></p>
                                </div>
                            </div>
                        </div>
                         <?php } ?>
                        </div>   
                    </div>
                </form>
                <?php 
                    // include 'server/pagination.php';                           
                ?>
            </div>            
        </div>
    </div>
</body>
</html>
