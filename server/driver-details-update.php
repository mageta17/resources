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
       


    }
}



?>