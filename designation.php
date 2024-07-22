<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'server/styleLink.php' ?>

    <link href="resources/style/designation.css" rel="stylesheet">
    
    <title>
      <?php include 'server/title.php' ?>
    </title>
</head>

<body> 
    <div id="section" class="container-fluid pt-5">
        
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid justify-content-end">
                        <a class="navbar-brand" href="server/logout.php">Logout</a>
                    </div>
                </nav>
            </div>
        </div>
        

        <div class="row justify-content-center pt-5">
            <div class="col-lg-6">
                <h1>
                    Welcome!
                </h1>

                <p>
                    Kindly select department to proceed.
                </p>
            </div>
            
        </div>

        <div class="row justify-content-center pt-3">
            <div class="col-lg-6">
                <a href="index.php" type="button" class="btn btn-primary my-2">Senior</a> 
                <a href="sheq-homepage.php" type="button" class="btn btn-primary my-2">SHEQ</a>
            </div>            
        </div>
    </div>
</body>

</html>