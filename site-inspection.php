<?php
include 'server/db.php';
?>
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
        .logo{
            width: 100px;
            height: auto;
            margin: 0 auto;
        }
    </style>
</head>
<body> 
    <div id="section" class="container-fluid mx-0 px-0">        
        <?php
            menu5();
        ?> 
        <div class="row justify-content-center mt-5">   
            <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
                <section id="section-1">
                    <div class="text-center">
                        <div class="logo mb-3">
                            <img  src="resources/images/newl.webp" class="img-fluid  text-center" alt="Northern Engineering Works Logo">
                        </div>
                        <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                        <h6>HEALTH, SAFETY & ENVIRONMENT SITE INSPECTION CHECKLIST </h6>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data ">
                            <div class="form-row d-flex justify-content-center mt-4">
                                <div class="form-group col-md-5 mr-3">
                                    <label for="siteName">Site Name:</label>
                                    <input type="text" class="form-control" id="siteName" name="siteName" value="">
                                </div>
                                <div class="form-group col-md-5 mr-3">
                                    <label for="siteID">Site ID:</label>
                                    <input type="text" class="form-control" id="siteID" name="siteID">
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-center">
                                <div class="form-group col-md-5 mr-3">
                                    <label for="region">Region:</label>
                                    <input type="text" class="form-control" id="region" name="region" value="">
                                </div>
                                <div class="form-group col-md-5 mr-3">
                                    <label for="inspectionDate">Inspection Date:</label>
                                    <input type="date" class="form-control" id="inspectionDate" name="inspectionDate">
                                </div>
                            </div>
                        </form>

                </section>
            </div>
        </div>
    

  




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
