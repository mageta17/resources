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
    <?php include 'server/styleLink.php' ?>

    <link href="resources/style/user-checklist-view.css?v=2" rel="stylesheet">
    <link href="resources/style/staff.css?v=2" rel="stylesheet">
    
    <title>
      <?php include 'server/title.php' ?>
    </title>
</head>

<body> 
    <div id="section" class="container-fluid mx-0 px-0">        
        <?php
            menu5();
            
            $query = "SELECT * FROM mv_check_list_360 ORDER BY id  DESC ";

            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)){
                 $front_view = $row['front_view'];
            }

        ?>
        <div class="row justify-content-center mx-0">
            <div class="col-lg-6">
                <form action="">
                      <div class="container mt-5">
                      <div class="row row-cols-1 row-cols-sm-2 g-3">
                    <div class="col">
                        <div class="card">
                        <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="card-grid-image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"><?php echo $front_view ?></p>s
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                        <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="card-grid-image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"><?php echo $front_view ?></p>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                        <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="card-grid-image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                        <img src="assets/images/bs-images/img-2x1.png" class="card-img-top" alt="card-grid-image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text"></p>
                        </div>
                        </div>
                    </div>
                    </div>   
                  </div>
                </form>
                <?php 
                    //include 'server/pagination.php';                           
                ?>
            </div>            
        </div>
    </div>
</body>

</html>