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

    <link href="resources/style/ppe-inspection-form.css?v=2" rel="stylesheet">
    <link href="resources/style/staff.css?v=2" rel="stylesheet">
    
    <title>
      <?php include 'server/title.php' ?>
    </title>
    
    <style>
        .preview-image {
            max-width: 100px;
            max-height: 100px;
            border: 1px solid #ccc;
            display: none;
        }
        .image-view {
            max-width: 100px;
            max-height: 100px;
        }

        input[type="radio"] {
            width: 17px;
            height: 17px;
        }

        .radio-text {
            font-size: 13px;
        }
    </style>
    
</head>

<body> 
    <div id="section" class="container-fluid mx-0 px-0">        
        <?php
            menu5();
        ?>

        <div class="row justify-content-center mx-0">
            <div class="col-lg-6">
                <form id="checklistForm" method="POST" action="server/ppe-inspection.inc.php" enctype="multipart/form-data">
                    
                </form>
            </div>            
        </div>
    </div>

    <script src="resources/js/ppe-inspection.js"></script>
</body>

</html>