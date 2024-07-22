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

       function fileupload($input_file_name){
            $target_dir = "../resources/images/uploads";

            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            if (!isset($_FILES[$input_file_name])) {
                echo "No file uploaded for '$input_file_name'.<br>";
                return null;
            }

            if ($_FILES[$input_file_name]['error'] != UPLOAD_ERR_OK) {
                echo "Error uploading file: " . $_FILES[$input_file_name]['error'] . "<br>";
                return null;
            }
            $target_file = $target_dir .basename($_FILES[$input_file_name]["name"]);

            if(move_uploaded_file($_FILES[$input_file_name]["tmp_name"], $target_file)){

                echo "The file " . htmlspecialchars(basename($_FILES[$input_file_name]["name"])) . " has been uploaded.<br>";
                return $target_file;
            } else{
                echo "Sorry, there was an error uploading your file.<br>";
                return null; // Return null if upload fails
            }

       }

       $front_view_image = fileupload('front-view-upload');

      
       
    

       

       

 
    }
}


