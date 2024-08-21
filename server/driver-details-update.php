<?php 
require "db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['edit'])){
        $firstname = mysqli_real_escape_string($connection, $_POST['firstName']);
        $middlename = mysqli_real_escape_string($connection, $_POST['middleName']);
        $lastname = mysqli_real_escape_string($connection, $_POST['lastName']);
        $employeename = mysqli_real_escape_string($connection, $_POST['employeeName']);
        $employeeposition = mysqli_real_escape_string($connection, $_POST['employeePosition']);
        $department  = mysqli_real_escape_string($connection, $_POST['department']);
        $email  = mysqli_real_escape_string($connection, $_POST['email']);
        $drivingLicense_No = mysqli_real_escape_string($connection, $_POST['driverlicenseno']);
        $drivingLicenseNoExpire  = mysqli_real_escape_string($connection, $_POST['driverlicensenoExp']);
        $drivingLicenseImage = mysqli_real_escape_string($connection, $_POST['driverlicenseimage']);
        $location = mysqli_real_escape_string($connection, $_POST['location']);
        $fieldSupervisor = mysqli_real_escape_string($connection, $_POST['fieldsupervisor']);
        $mobileNo1 = mysqli_real_escape_string($connection, $_POST['mobileno1']);
        $mobileNo2 = mysqli_real_escape_string($connection, $_POST['mobileno2']);
        $project = mysqli_real_escape_string($connection, $_POST['project']);
        $vehicleNo = mysqli_real_escape_string($connection, $_POST['vehicleno']);
        $user_ID = mysqli_real_escape_string($connection, $_POST['userid']);
        $issued_fuel = mysqli_real_escape_string($connection, $_POST['issuedfuel']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);

        $dob = mysqli_real_escape_string($connection, $_POST['company']);
        $pob  = mysqli_real_escape_string($connection, $_POST['company']);
        $gender = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        



    }
}



?>