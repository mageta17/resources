<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
require "db.php";
session_start();
$userpatterns = '/^[A-Za-z]+(?:\s[A-Za-z]+)*$/';


if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            echo  $user_id;
        } else {
            echo "User ID not found in session.<br>";
            exit();
        }
    if(isset($_POST['edit'])){
        $employeeid = mysqli_real_escape_string($connection, $_POST['employeeId']);
        $firstname = mysqli_real_escape_string($connection, $_POST['firstName']);
        $middlename = mysqli_real_escape_string($connection, $_POST['middleName']);
        $lastname = mysqli_real_escape_string($connection, $_POST['lastName']);
        $employeename = mysqli_real_escape_string($connection, $_POST['employeeName']);
        $employeeposition = mysqli_real_escape_string($connection, $_POST['employeePosition']);
        $department  = mysqli_real_escape_string($connection, $_POST['department']);
        $email  = mysqli_real_escape_string($connection, $_POST['email']);
        $drivingLicense_No = mysqli_real_escape_string($connection, $_POST['driverlicenseno']);
        $drivingLicenseNoExpire  = mysqli_real_escape_string($connection, $_POST['driverlicensenoExp']);
        $location = mysqli_real_escape_string($connection, $_POST['location']);
        $fieldSupervisor = mysqli_real_escape_string($connection, $_POST['fieldsupervisor']);
        $mobileNo1 = mysqli_real_escape_string($connection, $_POST['mobileno1']);
        $mobileNo2 = mysqli_real_escape_string($connection, $_POST['mobileno2']);
        $project = mysqli_real_escape_string($connection, $_POST['project']);
        $vehicleNo = mysqli_real_escape_string($connection, $_POST['vehicleno']);
        $user_ID = mysqli_real_escape_string($connection, $_POST['userid']);
        $issued_fuel = mysqli_real_escape_string($connection, $_POST['issuedfuel']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);

        $dob = mysqli_real_escape_string($connection, $_POST['dob']);
        $pob  = mysqli_real_escape_string($connection, $_POST['pob']);
        $gender = mysqli_real_escape_string($connection, $_POST['gender']);
        $nationality = mysqli_real_escape_string($connection, $_POST['nationality']);
        $marital_status = mysqli_real_escape_string($connection, $_POST['martial-status']);
        $box = mysqli_real_escape_string($connection, $_POST['poa']);
        $code  = mysqli_real_escape_string($connection, $_POST['code']);
        $town = mysqli_real_escape_string($connection, $_POST['town']);
        $date_of_employment = mysqli_real_escape_string($connection, $_POST['dateofemployment']);
        $employment_no = mysqli_real_escape_string($connection, $_POST['employementno']);
        $nssf_no = mysqli_real_escape_string($connection, $_POST['nssf-no']);
        $tin_no = mysqli_real_escape_string($connection, $_POST['tin-no']);
        $nida_no = mysqli_real_escape_string($connection, $_POST['nida-no']);
        $banckacc_no = mysqli_real_escape_string($connection, $_POST['banckacc_no']);
        $bankname = mysqli_real_escape_string($connection, $_POST['bankname']);
        $dependant_name = mysqli_real_escape_string($connection, $_POST['dependantName']);
        
        $dependant_dob = mysqli_real_escape_string($connection, $_POST['dependant_dob']);
        $depandant_relationship = mysqli_real_escape_string($connection, $_POST['dependantrelationship']);
        $dependant_name_1 = mysqli_real_escape_string($connection, $_POST['dependantName1']);
        $dependant_dob_1 = mysqli_real_escape_string($connection, $_POST['dependant_dob1']);
        $depandant_relationship_1 = mysqli_real_escape_string($connection, $_POST['dependantrelationship1']);
        $dependant_name_2 = mysqli_real_escape_string($connection, $_POST['dependantName2']);
        $dependant_dob_2 = mysqli_real_escape_string($connection, $_POST['dependant_dob2']);
        $depandant_relationship_2 = mysqli_real_escape_string($connection, $_POST['dependantrelationship2']);
        $dependant_name_3 = mysqli_real_escape_string($connection, $_POST['dependantName3']);
        $dependant_dob_3 = mysqli_real_escape_string($connection, $_POST['dependant_dob3']);
        $depandant_relationship_3 = mysqli_real_escape_string($connection, $_POST['dependantrelationship3']);
        $dependant_name_4 = mysqli_real_escape_string($connection, $_POST['dependantName4']);
        $dependant_dob_4 = mysqli_real_escape_string($connection, $_POST['dependant_dob4']);
        $depandant_relationship_4 = mysqli_real_escape_string($connection, $_POST['dependantrelationship4']);
        $kin_name = mysqli_real_escape_string($connection, $_POST['kin-name']);

        $kin_dob = mysqli_real_escape_string($connection, $_POST['kindob']);
        $kin_contact = mysqli_real_escape_string($connection, $_POST['kin-contact']);
        $kin_relationship = mysqli_real_escape_string($connection, $_POST['kin-relationship']);
        $kin_name_1 = mysqli_real_escape_string($connection, $_POST['kin-name1']);
        $kin_dob_1 = mysqli_real_escape_string($connection, $_POST['kindob1']);
        $kin_contact_1 = mysqli_real_escape_string($connection, $_POST['kin-contact']);
        $kin_relationship_1 = mysqli_real_escape_string($connection, $_POST['kin-relationship1']);
        $national_id_attachment = mysqli_real_escape_string($connection, $_POST['nida-attachment']);
        $marriage_certificate_attachment= mysqli_real_escape_string($connection, $_POST['marriage-certificate-attachment']);
        $img_name = mysqli_real_escape_string($connection, $_POST['image-name']);
        $total_leave = mysqli_real_escape_string($connection, $_POST['total-leave']);
        $role = mysqli_real_escape_string($connection, $_POST['role']);
        $delete_status = mysqli_real_escape_string($connection, $_POST['delete-status']);
        $employment_terms = mysqli_real_escape_string($connection, $_POST['employment-terms']);
        $salary = mysqli_real_escape_string($connection, $_POST['salary']);
        $termination_status = mysqli_real_escape_string($connection, $_POST['terminantion-status']);
        $termination_reason = mysqli_real_escape_string($connection, $_POST['terminantion-reason']); 
        $termination_date = mysqli_real_escape_string($connection, $_POST['terminantion-date']);
        $contract_exp  = mysqli_real_escape_string($connection, $_POST['contract_exp']);

        //validation 
        if(!preg_match($userpatterns, trim($firstname))){
            $_SESSION['error'] = "first name should contain only letters.";
            header("Location: ../driver-details-id.php?id=". $user_id);
            exit();
        } else if(!preg_match($userpatterns, trim($middlename))){
            $_SESSION['error'] = "middle name  should contain only letters.";
            header("Location: ../driver-details-id.php?id=".  $user_id);
            exit();
        } else if(!preg_match($userpatterns, trim($lastname))){
            $_SESSION['error'] = "last  name  should contain only letters.";
            header("Location: ../driver-details-id.php?id=".  $user_id);
            exit();
        } else if(!preg_match($userpatterns, trim($employeename))){
            $_SESSION['error'] = "Employee name  should contain only letters.";
            header("Location: ../driver-details-id.php?id=".  $user_id);
            exit();


        }else{
            $query = "UPDATE  drivers SET 
           first_name = '$firstname', middle_name = '$middlename', last_name = '$lastname',
           employeeName = '$employeename', employeePosition ='$employeeposition', 
           department = '$department',
           email = '$email', drivingLicenseNo = '$drivingLicense_No',
           drivingLicenseNoExpire ='$drivingLicenseNoExpire',location ='$location',
           fieldSupervisor = '$fieldSupervisor', mobileNo1 = '$mobileNo1', 
           mobileNo2 = '$mobileNo2',   project = '$vehicleNo', vehicleNo = '$vehicleNo',
           user_ID = '$user_ID',  issued_fuel =  '$issued_fuel', company = '$company',
           dob = '$dob', pob = '$pob', gender =  '$gender', nationality = '$nationality',
           marital_status = '$marital_status', box = '$box', code = '$code', town = '$town',
           date_of_employment = '$date_of_employment', employment_no = '$employment_no',
           nssf_no = '$nssf_no', tin_no = '$tin_no', nida_no = '$nida_no', 
           banckacc_no = '$banckacc_no', bankname = '$bankname', dependant_name = '$dependant_name',
           dependant_dob = '$dependant_dob', depandant_relationship = '$depandant_relationship',
           depandant_relationship = '$depandant_relationship', dependant_dob_1 = '$dependant_dob_1',
           depandant_relationship_1 = '$depandant_relationship_1', 
           dependant_name_2 = '$dependant_name_2', dependant_dob_2 = '$dependant_dob_2',
           depandant_relationship_2 = '$depandant_relationship_2',
           dependant_name_3 = '$dependant_name_3', dependant_dob_3 = '$dependant_dob_3',
           depandant_relationship_3 = '$depandant_relationship_3', 
           dependant_name_4 = '$dependant_name_4', dependant_dob_4 = '$dependant_dob_4',
           depandant_relationship_4 = '$depandant_relationship_4', kin_name = '$kin_name',
           kin_dob = '$kin_dob', kin_contact = '$kin_contact', kin_relationship = '$kin_relationship',
           kin_name_1 = '$kin_name_1', kin_dob_1 = '$kin_dob_1', kin_contact_1 = '$kin_contact_1',
           kin_relationship_1 = '$kin_relationship_1', 
           national_id_attachment = '$national_id_attachment',
           marriage_certificate_attachment = '$marriage_certificate_attachment', img_name = '$img_name',
           total_leave = '$total_leave', role = '$role', delete_status = '$delete_status',employment_terms = '$employment_terms', salary = '$salary', 
           termination_status ='$termination_status', termination_reason = '$termination_reason',
           termination_date = '$termination_date', contract_exp = '$contract_exp'
         WHERE employeeId = $user_id";
            $result = mysqli_query($connection, $query);
            echo "result";
            if ($result) {
                echo "Data updated successfully.";

                // Check if a file was uploaded
                if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
                    echo "Image was isset<br>";
                
                    $file = $_FILES['file'];
                    $name = $file['name'];
                    $tmp_name = $file['tmp_name'];
                    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                
                    // Create a unique filename
                    $imageFullName = $user_id . "-" . $firstname . "-license-" . uniqid("", true) . "." . $ext;
                    $drivingLicenseImageDir = '../resources/images/drivers/';
                    $filePath = $drivingLicenseImageDir . $imageFullName;
                
                    // Attempt to move the uploaded file to the target directory
                    if (move_uploaded_file($tmp_name, $filePath)) {
                        // Resize image
                        $src = imagecreatefromstring(file_get_contents($filePath));
                        if ($src === false) {
                            echo "Error creating image from string.<br>";
                            exit();
                        }
                
                        list($width, $height) = getimagesize($filePath);
                        $newWidth = 400;
                        $newHeight = ($height / $width) * $newWidth;
                        $newHeight = (int)$newHeight;
                
                        $tmp = imagecreatetruecolor($newWidth, $newHeight);
                        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                
                        // Save the resized image
                        if (imagejpeg($tmp, $filePath, 100)) {
                            imagedestroy($tmp);
                            imagedestroy($src);
                
                            // Update the database with the new image path
                            $imageupdate = "UPDATE drivers SET drivingLicenseImage = '$filePath' WHERE employeeId = '$user_id'";
                            $imageresult = mysqli_query($connection, $imageupdate);
                
                            if ($imageresult) {
                                // Redirect after successful image upload and update
                                $_SESSION['succes'] = "Update succssesfully ";
                                header("Location: ../driver-details-id.php?id=".$user_id);
                                exit();
                            } else {
                            echo "Error in updating image: " . mysqli_error($connection);
                        }
                    } else {
                        echo "Error in uploading image.";
                    }
                } else {
                    echo "No image uploaded, retaining the existing image.";
                }
            } 
        }

        }



        
    }
}
  