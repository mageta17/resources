<?php 

require  "db.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_POST['submit'])){
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      
       $front_view = mysqli_real_escape_string($connection, $_POST['front-view']);
       $rear_view = mysqli_real_escape_string($connection, $_POST['rear-view']);
       $left_side_view = mysqli_real_escape_string($connection, $_POST['left-side-view']);
       $right_side_view = mysqli_real_escape_string($connection,$_POST['right-side-view']);
       $loadbin_cover = mysqli_real_escape_string($connection, $_POST['loadbin-cover']);
       $windscreen = mysqli_real_escape_string($connection, $_POST['windscreen']);
       $license_disk = mysqli_real_escape_string($connection, $_POST['license-disk']);
       $towbar = mysqli_real_escape_string($connection, $_POST['towbar']);
       $lf_tyre_age = mysqli_real_escape_string($connection, $_POST['lf-tyre-age']);
       $lf_tyre_treat = mysqli_real_escape_string($connection, $_POST['lf-tyre-treat']);
       $rf_tyre_age = mysqli_real_escape_string($connection, $_POST['rf-tyre-age']);
       $rf_tyre_treat = mysqli_real_escape_string($connection, $_POST['rf-tyre-treat']);
       $lr_tyre_age = mysqli_real_escape_string($connection, $_POST['lr-tyre-age']);
       $lr_tyre_treat = mysqli_real_escape_string($connection, $_POST['lr-tyre-treat']);
       $rr_tyre_age = mysqli_real_escape_string($connection, $_POST['rr-tyre-age']);
       $rr_tyre_treat = mysqli_real_escape_string($connection, $_POST['rr-tyre-treat']);
       $rear_3pt_seatbelts = mysqli_real_escape_string($connection, $_POST['rear-3pt-seatbelts']);
       $driver_3pt_seatbelts = mysqli_real_escape_string($connection, $_POST['driver-3pt-seatbelts']);
       $co_driver = mysqli_real_escape_string($connection, $_POST['co-driver']);
       $bluetooth = mysqli_real_escape_string($connection, $_POST['bluetooth']);
       $odometer = mysqli_real_escape_string($connection, $_POST['odometer']);
       $service_book = mysqli_real_escape_string($connection, $_POST['service-book']);
       $emergence_triangle = mysqli_real_escape_string($connection, $_POST['emergence-triangle']);
       $first_aid_kit = mysqli_real_escape_string($connection, $_POST['first-aid-kit']);

       $query = "INSERT INTO mv_check_list_360 (
        front_view, rear_view, left_side_view, right_side_view, 
        loadbin_view, windscreen_view , license_disk, towbar, 
        lf_tyre_age, lf_tyre_treat, rf_tyre_age, rf_tyre_treat, 
        lr_tyre_age, lr_tyre_treat, rr_tyre_age, rr_tyre_treat, 
        rear_3pt_seatbelts, driver_3pt_seatbelt, co_driver_3p_belt, 
        bluetooth, odometer, service_book, emergence_triangle, 
        first_aid_kit
    ) VALUES (
        '$front_view', '$rear_view', '$left_side_view', '$right_side_view', 
        '$loadbin_cover', '$windscreen', '$license_disk', '$towbar', 
        '$lf_tyre_age', '$lf_tyre_treat', '$rf_tyre_age', '$rf_tyre_treat', 
        '$lr_tyre_age', '$lr_tyre_treat', '$rr_tyre_age', '$rr_tyre_treat', 
        '$rear_3pt_seatbelts', '$driver_3pt_seatbelts', '$co_driver', 
        '$bluetooth', '$odometer', '$service_book', '$emergence_triangle', 
        '$first_aid_kit'
    )";

    $result = mysqli_query($connection, $query);
    if($result){
        echo "data submited ";
        $checklist_id = mysqli_insert_id($connection);
        

            $file = $_FILES['front-view-upload'];
            $file1 = $_FILES['rear-view-upload'];
            $file2 = $_FILES['left-side-view-upload'];
            $file3 = $_FILES['right-side-view-upload'];
            $file4 = $_FILES['loadbin-cover-upload'];
            $file5 = $_FILES['windscreen-upload'];
            $file6 = $_FILES['license-disk-upload'];
            $file7 = $_FILES['towbar-upload'];
            $file8 = $_FILES['lf-tyre-age-upload'];
            $file9 = $_FILES['lf-tyre-treat-upload'];
            $file10 = $_FILES['rf-tyre-age-upload'];
            $file11 = $_FILES['rf-tyre-treat-upload'];
            $file12 = $_FILES['lr-tyre-age-upload'];
            $file13 = $_FILES['lr-tyre-treat-upload'];
            $file14 = $_FILES['rr-tyre-age-upload'];
            $file15 = $_FILES['rr-tyre-treat-upload'];
            $file16 = $_FILES['rear-3pt-seatbeltst-upload'];
            $file17 = $_FILES['driver-3pt-seatbelts-upload'];
            $file18 = $_FILES['co-driver-upload'];
            $file19 = $_FILES['bluetooth-upload'];
            $file20 = $_FILES['odometer-upload'];
            $file21 = $_FILES['service-book-upload'];
            $file22 = $_FILES['emergence-triangle-upload'];
            $file23 = $_FILES['first-aid-kit-upload'];

            $image = array($file,$file1,$file2,$file3,$file4,$file5,$file6,$file7,$file8,$file9,$file10,$file11,
                           $file12,$file13,$file14,$file15, $file16, $file17, $file18, $file19, $file20,$file21,
                           $file22,  $file23);

            $allowed = array('jpg', 'jpeg', 'png');

            $fileCount = count($image);

            for($x=0;$x<$fileCount;$x++) {
                $name = $image[$x]['name'];
                $size = $image[$x]['size'];
                $type = $image[$x]['type'];
                $tmp_name = $image[$x]['tmp_name'];

                $error = $image[$x]['error'];

                $ext = pathinfo($name, PATHINFO_EXTENSION);

                $imageFullName = $checklist_id . "." . uniqid("", true) . ".". $ext;

                $dir = "../resources/images/uploads/";

                if(in_array($ext, $allowed)) {
                    if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG' || $ext == 'png') {
                        $src = imagecreatefromjpeg($tmp_name);
                    }

                    list($width_min,$height_min) = getimagesize($tmp_name);

                    $newwidth_min = 400;

                    $newheight_min = ($height_min/$width_min) * $newwidth_min;

                    $newheight_min = (int)$newheight_min;

                    $tmp_min = imagecreatetruecolor($newwidth_min, $newheight_min);

                    imagecopyresampled($tmp_min, $src, 0,0,0,0,$newwidth_min, $newheight_min, $width_min, $height_min);

                    $sql = "INSERT INTO mv_checklist_360_images_rep(img_name,checklistId,user_ID) VALUE('$imageFullName','$checklist_id','$id')";

                    mysqli_query($connection, $sql);

                    imagejpeg($tmp_min,"../../vehicle-maintenance-tool/resources/images/checklist/".$imageFullName,100);

                }        
            }
  
        }

    }   

    

            


       
   
}


