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
    <?php include 'server/styleLink.php'; ?>

    <link href="resources/style/user-checklist-view.css?v=2" rel="stylesheet">
    <link href="resources/style/staff.css?v=2" rel="stylesheet">
    
    <title>
      <?php include 'server/title.php'; ?>
    </title>
    <style>
        /* For screens above 670px, maintain two inputs per row */
        @media (min-width: 670px) {
            .form-group {
                flex: 0 0 48%; /* Adjust to take up about half the row */
                max-width: 48%;
                margin-bottom: 15px; /* Add space below inputs */
            }
            .form-group:not(:last-child) {
                margin-right: 4%; /* Add space between inputs */
            }
        }
        
        /* For screens below 670px, use one input per row */
        @media (max-width: 669px) {
            .form-group {
                flex: 0 0 100%;
                max-width: 100%;
                margin-bottom: 15px; /* Add space below inputs */
            }
            .form-control {
                font-size: 14px; /* Make input size medium */
            }
        }
        .separator{
            color:green;
            font-size: medium;

        }
    </style>
</head>
<body> 
<div id="section" class="container-fluid mx-0 px-0">
    <?php menu5();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        // fetch data from the database 
        $query = "SELECT * FROM drivers WHERE employeeId = $id ";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_array($result);
   
    
    
    ?>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-md-6 col-sm-12" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
            <form action="save_edits.php" method="post">
                <!-- Row 1 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="employeeId">Employer ID</label>
                        <input type="text" class="form-control" id="employeeId" name="employeeId" value="<?php  echo $row['employeeId']?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?php  echo $row['first_name']?>" required>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="middleName">Middle Name</label>
                        <input type="text" class="form-control" id="middleName" name="middleName" value="<?php  echo $row['middle_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?php  echo $row['last_name']?>" required>
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="employeeName">Employee Name</label>
                        <input type="text" class="form-control" id="employeeName" name="employeeName" value="<?php  echo $row['employeeName']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="employeePosition">Position</label>
                        <input type="text" class="form-control" id="employeePosition" name="employeePosition" value="<?php  echo $row['employeePosition']?>" required>
                    </div>
                </div>

                <!-- Row 4 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" class="form-control" id="department" name="department" value="<?php  echo $row['department']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php  echo $row['email']?>" required>
                    </div>
                </div>

                <!-- Row 5 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Driver License number</label>
                        <input type="text" class="form-control" id="driverlicenseno" name="driverlicenseno" value="<?php  echo $row['drivingLicenseNo']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Driver License numberExpier</label>
                        <input type="email" class="form-control" id="driverlicensenoExp" name="driverlicensenoExp" value="<?php  echo $row['drivingLicenseNoExpire']?>" required>
                    </div>
                </div>

                  <!-- Row 6 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Driver License image</label>
                        <input type="text" class="form-control" id="driverlicenseimage" name="driverlicenseimage" value="<?php  echo $row['drivingLicenseImage']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Location</label>
                        <input type="email" class="form-control" id="location" name="location" value="<?php  echo $row['location']?>" required>
                    </div>
                </div>

                  <!-- Row 7 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Field supervisor </label>
                        <input type="text" class="form-control" id="fieldsupervisor" name="fieldsupervisor" value="<?php  echo $row['fieldSupervisor']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Mobile no1</label>
                        <input type="email" class="form-control" id="mobileno1" name="mobileno" value="<?php  echo $row['mobileNo1']?>" required>
                    </div>
                </div>

                  <!-- Row 8 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Mobile no2</label>
                        <input type="text" class="form-control" id="mobileno2" name="mobileno2" value="<?php  echo $row['mobileNo2']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Project</label>
                        <input type="email" class="form-control" id="project" name="project" value="<?php  echo $row['project']?>" required>
                    </div>
                </div>

                  <!-- Row 9 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="vehicleno">Vehicle number</label>
                        <input type="text" class="form-control" id="vehicleno" name="vehicleno" value="<?php  echo $row['vehicleNo']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">User id</label>
                        <input type="email" class="form-control" id="userid" name="userid" value="<?php  echo $row['user_ID']?>" required>
                    </div>
                </div>

                  <!-- Row 10 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Issued fuel</label>
                        <input type="text" class="form-control" id="issuedfuel" name="issuedfuel" value="<?php  echo $row['issued_fuel']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Company</label>
                        <input type="email" class="form-control" id="company" name="company" value="<?php  echo $row['company']?>" required>
                    </div>
                </div>

                  <!-- Row 11 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Date of birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo date('Y-m-d', strtotime($row['dob'])); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Place of birth</label>
                        <input type="email" class="form-control" id="pob" name="pob" value="<?php  echo $row['pob']?>" required>
                    </div>
                </div>

                  <!-- Row 12 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" value="<?php  echo $row['gender']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Nationality</label>
                        <input type="email" class="form-control" id="nationality" name="nationality" value="" required>
                    </div>
                </div>

                 <!-- Row 13 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Martial status</label>
                        <input type="text" class="form-control" id="martial-status" name="martial-status" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Post Address</label>
                        <input type="email" class="form-control" id="poa" name="poa" value="" required>
                    </div>
                </div>

                 <!-- Row 14 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">post code</label>
                        <input type="text" class="form-control" id="code" name="code" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">City</label>
                        <input type="email" class="form-control" id="town" name="town" value="" required>
                    </div>
                </div>

                 <!-- Row 15 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="email1">Email</label>
                        <input type="email" class="form-control" id="email1" name="email1" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="dateofemployment">date of employment</label>
                        <input type="date" class="form-control" id="dateofemployment" name="dateofemployment" value="" required>
                    </div>
                </div>

                <!-- Row 16 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="employementno">Employement number</label>
                        <input type="text" class="form-control" id="employementno" name="employementno" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="dateofemployment">Nssf number</label>
                        <input type="text" class="form-control" id="dateofemployment" name="dateofemployment" value="" required>
                    </div>
                </div>

                <!-- Row 17 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="tin-no">Tin number</label>
                        <input type="text" class="form-control" id="tin-no" name="tin-no" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="dateofemployment">Nssf number</label>
                        <input type="text" class="form-control" id="dateofemployment" name="dateofemployment" value="" required>
                    </div>
                </div>

                 <!-- Row 18 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="nida-no">Nida number</label>
                        <input type="text" class="form-control" id="nida-no" name="nida-no" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="banckacc_no">Bank Account number</label>
                        <input type="text" class="form-control" id="banckacc_no" name="banckacc_no" value="" required>
                    </div>
                </div>

                <!-- Row 19 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="bankname">Bank name</label>
                        <input type="text" class="form-control" id="bankname" name="bankname" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="dependantName1">Dependant name</label>
                        <input type="text" class="form-control" id="dependantName1" name="dependantName1" value="" required>
                    </div>
                </div>

                <!-- Row 20 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="dependant_dob1">Dependant date of birth</label>
                        <input type="text" class="form-control" id="dependant_dob" name="dependant_dob" value="" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="dependantrelationship1">Dependant relationship</label>
                        <input type="text" class="form-control" id="dependantrelationship" name="dependantrelationship" value="" required>
                    </div>
                </div>

                 <!-- Row 21 -->
                 <label for="Separate" class="separator">Second dependant details</label><br><br>
                <div class="form-row d-flex flex-wrap">
                <div class="form-group">
                        <label for="dependantName1">Dependant name</label>
                        <input type="text" class="form-control" id="dependantName1" name="dependantName1" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="dependant_dob1">Dependant date of birth</label>
                        <input type="text" class="form-control" id="dependant_dob1" name="dependant_dob1" value="" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="dependantrelationship1">Dependant relationship</label>
                        <input type="text" class="form-control" id="dependantrelationship1" name="dependantrelationship1" value="" required>
                    </div>
                </div>

                 <!-- Row 22 -->
                 <label for="Separate" class="separator">Third dependant details</label><br><br>
                <div class="form-row d-flex flex-wrap">
                <div class="form-group">
                        <label for="dependantName2">Dependant name</label>
                        <input type="text" class="form-control" id="dependantName2" name="dependantName2" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="dependant_dob2">Dependant date of birth</label>
                        <input type="text" class="form-control" id="dependant_dob2" name="dependant_dob2" value="" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="dependantrelationship2">Dependant relationship</label>
                        <input type="text" class="form-control" id="dependantrelationship2" name="dependantrelationship2" value="" required>
                    </div>
                </div>

                 <!-- Row 23 -->
                 <label for="Separate" class="separator">Fourth dependant details</label><br><br>
                <div class="form-row d-flex flex-wrap">
                <div class="form-group">
                        <label for="dependantName3">Dependant name</label>
                        <input type="text" class="form-control" id="dependantName3" name="dependantName3" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="dependant_dob3">Dependant date of birth</label>
                        <input type="text" class="form-control" id="dependant_dob3" name="dependant_dob3" value="" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="dependantrelationship3">Dependant relationship</label>
                        <input type="text" class="form-control" id="dependantrelationship3" name="dependantrelationship3" value="" required>
                    </div>
                </div>

                <!-- Row 24 -->
                <br><label for="Separate" class="separator">Next of kin details</label><br><br>
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="kin-name">Next of kin name</label>
                        <input type="text" class="form-control" id="kin-name" name="kin-name" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="kindob">Kin date of birth</label>
                        <input type="date" class="form-control" id="kindob" name="kindob" value="" required>
                    </div>
                </div>

                <!-- Row 25 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="kin-contact">Next of kin contact</label>
                        <input type="text" class="form-control" id="kin-contact" name="kin-contact" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="kin-relationship">Next of kin relationship</label>
                        <input type="text" class="form-control" id="kin-relationship" name="kin-relationship" value="" required>
                    </div>
                </div>

                <!-- Row 26 -->
                <br><label for="Separate" class="separator">Second Next of kin details</label><br><br>
                <div class="form-row d-flex flex-wrap">
                <div class="form-group">
                        <label for="kin-name">Next of kin name</label>
                        <input type="text" class="form-control" id="kin-name" name="kin-name" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="kindob1">Kin date of birth</label>
                        <input type="date" class="form-control" id="kindob1" name="kindob1" value="" required>
                    </div>
                </div>
                  <!-- Row 27 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="kin-contact">Next of kin contact</label>
                        <input type="text" class="form-control" id="kin-contact" name="kin-contact" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="kin-relationship1">Next of kin relationship</label>
                        <input type="text" class="form-control" id="kin-relationship1" name="kin-relationship1" value="" required>
                    </div>
                </div>

                <!-- Row 28 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="nida-attachment">Nida attachment</label>
                        <input type="text" class="form-control" id="nida-attachment" name="nida-attachment" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="marriage-certificate-attachment">Marriage certificate attachment</label>
                        <input type="text" class="form-control" id="marriage-certificate-attachment" name="marriage-certificate-attachment" value="" required>
                    </div>
                </div>

                 <!-- Row 29 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="image-name">image name</label>
                        <input type="text" class="form-control" id="image-name" name="image-name" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="total-leave">Total leave </label>
                        <input type="text" class="form-control" id="total-leave" name="total-leave" value="" required>
                    </div>
                </div>

                 <!-- Row 30 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="delete-status">Delete status</label>
                        <input type="text" class="form-control" id="delete-status" name="delete-status" value="" required>
                    </div>
                </div>

                 <!-- Row 31 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="employment-terms">Employment terms</label>
                        <input type="text" class="form-control" id="employment-terms" name="employment-terms" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control" id="salary" name="salary" value="" required>
                    </div>
                </div>

                 <!-- Row 32 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="terminantion-status">Terminiation status</label>
                        <input type="text" class="form-control" id="terminantion-status" name="terminantion-status" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="terminantion-reason">Terminiation reason</label>
                        <input type="text" class="form-control" id="terminantion-reason" name="terminantion-reason" value="" required>
                    </div>
                </div>

                 <!-- Row 32 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="terminantion-date">Terminiation date</label>
                        <input type="date" class="form-control" id="terminantion-date" name="terminantion-date" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="contract_exp">contact Expire date</label>
                        <input type="date" class="form-control" id="contract_exp" name="contract_exp" value="" required>
                    </div>
                </div>
                <!-- Final Row (Submit Button) -->
                <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="edit" style="background-color: #488aec; border-color: #488aec;">
                            Save Changes
                            </button>

                 </div>

            </form>
            <?php }
                   }else{
                    echo "id not found";
                   }
                   ?>
        </div>
    </div>
</div>
</body>
</html>
