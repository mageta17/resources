<?php 

require "db.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $front_view = mysqli_real_escape_string($connection, $_POST['front-view']);
        $rear_view = mysqli_real_escape_string($connection, $_POST['rear-view']);
        $left_side_view = mysqli_real_escape_string($connection, $_POST['left-side-view']);
        $right_side_view = mysqli_real_escape_string($connection, $_POST['right-side-view']);
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
        if ($result) {
            echo "data submitted ";
     
     
    }    
  }
}
