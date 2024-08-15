<?php
include("../resources/Api/fpdf.php");
require "db.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query =  "SELECT * FROM mv_check_list_360 WHERE  id =   $id";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        // create pdf
        $fpdf = new FPDF();
        $fpdf ->AddPage();
        $fpdf ->SetFont('Aerial', 'B', 16);

        $fpdf  ->Cell(40, 10, 'Checklist report');
    }

}
