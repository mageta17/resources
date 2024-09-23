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

    <link href="resources/style/staff.css" rel="stylesheet">
    <link href="resources/style/homepage.css" rel="stylesheet">
    
    <title>
      <?php include 'server/title.php' ?>
    </title>
</head>

<body> 
    <div id="section" class="container-fluid mx-0 px-0">        
        <?php
            menu();
        ?>

        <div class="row mx-0 justify-content-center pb-5">
            <div class="col-lg-6"> 
                <a href="mv-360-inspection-form.php" type="button" class="btn btn-sm btn-primary my-2">Mv 360 Inspection</a>
                <a href="mv-360-inspection-history.php" type="button" class="btn btn-sm btn-primary my-2">Mv 360 History</a> 
            </div>             
        </div>
    </div>
</body>

</html>