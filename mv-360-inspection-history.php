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
        ?>

        <div class="row justify-content-center mx-0">
            <div class="col-lg-6">
                <table class="table-bordered checklist mb-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            // define how many results you want per page
                            $results_per_page = 25;

                            // find out the number of results stored in database
                            $sql = "SELECT * FROM tbl_ppe_inspection where user_id='".$id."'";

                            $data = mysqli_query($connection,$sql);
                            $number_of_results = mysqli_num_rows($data);

                            // determine number of total pages available
                            $number_of_pages = ceil($number_of_results/$results_per_page);

                            // determine which page number visitor is currently on
                            if (!isset($_GET['page'])) {
                                $page = 1;
                            } else {
                                $page = $_GET['page'];
                            }

                            // determine the sql LIMIT starting number for the results on the displaying page
                            $this_page_first_result = ($page - 1) * $results_per_page;

                            $sql = "SELECT * FROM tbl_ppe_inspection where user_id='".$id."' ORDER BY submission_date DESC LIMIT ". $this_page_first_result . ',' . $results_per_page;

                            $data = mysqli_query($connection,$sql);
                            $numbers = 1;

                            if ($page) {
                                $numbers = (25*$page) - 24;
                            }
                            if (mysqli_num_rows($data) > 0) {
                            while($row = mysqli_fetch_array($data)) {
                        ?> 
                        <tr>
                            <td>
                                <?php
                                    echo $numbers;
                                    $numbers++;
                                ?>
                            </td>

                            <td>
                                <a href="ppe-inspection-form-view.php?id=<?php echo $row['id']; ?>"><?php echo $row['inspector_name']; ?></a>
                            </td>

                            <td>
                                <?php echo $row['submission_date']; ?>
                            </td>
                        </tr>
                        <?php
                            }
                            } else {
                        ?>
                        <tr>
                            <td colspan="7"><center>No data to display yet!</center></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>

                <?php 
                    include 'server/pagination.php';                           
                ?>
            </div>            
        </div>
    </div>
</body>

</html>