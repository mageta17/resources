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
                        $query = "SELECT * FROM mv_check_list_360";
                        $result = mysqli_query($connection, $query);
                        if (mysqli_num_rows($result) > 0) {
                    ?>  
                <div class="row justify-content-center mt-5">   
                    <div class="col-lg-10">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                <th scope="row">id</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Modal</th>
                                <th scope="col">Checked</th>
                                <th scope="col">Date of inspection</th>
                                <th scope="col">Show more</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row = mysqli_fetch_assoc($result)){ 
                                    $id = $row['id'];
                                    ?>
                                <tr>
                                <th scope="row"><?php echo $row['id'];  ?></th>
                                <td>Newl</td>
                                <td>Toyota landcruser</td>
                                <td>Yes</td>
                                <td><a  class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="checklist_view_bc.php?id=<?php echo $id; ?>"><?php  echo $row['time']; ?></a></td>
                                <td><a class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="checklist_view_bc.php?id=<?php echo $id; ?>">Show</a></td>
                                </tr>
                                <?php }  ?>
                            </tbody>
                            </table>
                        </div>

                </div> <?php } ?>
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