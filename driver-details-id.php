<?php
include 'server/db.php';
include 'server/modules/staff-pages.php';
session_start();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    
    <title>
      <?php include 'server/title.php'; ?>
    </title>
    <style>
        .form-control {
                background-color:#E8ECEF; /* Make input size medium */
            }
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
            $_SESSION['user_id'] = $row['employeeId'];
    ?>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-md-6 col-sm-12" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
            <form action="server/driver-details-update.php" method="post" enctype="multipart/form-data" >
            <?php
                if (isset($_SESSION['succes'])) {
                    echo '<div class="alert alert-success" style="text-align:center;><i class="fa-regular fa-circle-check"></i>'." Succes: " . $_SESSION['succes'] . '</div>';
                    unset($_SESSION['succes']); 
                }
                if (isset($_SESSION['error'])) {
                    echo '<div class="alert alert-danger" style="text-align:center;"><i class="fas fa-exclamation-circle"></i>'." Error: " . $_SESSION['error'] . '</div>';
                    unset($_SESSION['error']); 
                }
             ?>
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
                        <label for="driverlicenseno">Driver License number</label>
                        <input type="text" class="form-control" id="driverlicenseno" name="driverlicenseno" value="<?php  echo $row['drivingLicenseNo']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="driverlicensenoExp">Driver License numberExpier</label>
                        <input type="date" class="form-control" id="driverlicensenoExp" name="driverlicensenoExp" value="<?php  echo date('Y-m-d', strtotime($row['drivingLicenseNoExpire']));?>" required>
                    </div>
                </div>
                 <!-- Row 6 -->
                 <div class="form-row d-flex flex-wrap">
                    <label for="driverlicensenoExp">Driver License Image</label>
                    <div class="input-group">
                        <span class="input-group-addon pd-0" style="padding: 10px;">Preview</span>
                        <input id="fileName" type="text" class="form-control" name="fileName" placeholder="Additional Info" readonly>
                        <div class="input-group-append">
                            <button id="changeButton" name="changeButton" class="btn btn-primary" type="button">Change</button>
                            <button id="previewButton" name="previewButton" class="btn btn-secondary" type="button">Preview</button>
                        </div>
                    </div>

                    <!-- Preview Area -->
                    <div id="previewArea" style="display: none; margin-top: 10px; margin-bottom: 10px; ">
                    <img id="imagePreview" src="" alt="Preview" style="width: 100%; display: block; margin: 0 auto;">
                        <embed id="pdfPreview" src="" type="application/pdf" style="width: 100%; height: auto; display: none;">
                        
                        <!-- File input -->
                        <input type="file" id="fileInput" name="file" style="display: none;">
                        
                        <!-- File input and Action Buttons -->
                        <div id="actionButtons" class="mt-3">
                            <button id="quitPreview" class="btn btn-danger" type="button">Quit</button>
                        </div>
                    </div>
                    <?php
                        $imageURL = 'resources/images/drivers/' . basename($row['drivingLicenseImage']);
                        $fileName = basename($row['drivingLicenseImage']);
                
                        if ($imageURL) {
                            echo "<script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var fileNameInput = document.getElementById('fileName');
                                        var imagePreview = document.getElementById('imagePreview');
                                        var previewArea = document.getElementById('previewArea');
                                        var previewButton = document.getElementById('previewButton');
                                        var quitButton = document.getElementById('quitPreview');
                                        var actionButtons = document.getElementById('actionButtons');
                
                                        if (fileNameInput && imagePreview && previewArea && previewButton && quitButton && actionButtons) {
                                            fileNameInput.value = '$fileName';

                                            previewButton.addEventListener('click', function() {
                                                var imageUrl = '$imageURL';
                                                console.log('Preview button clicked, image URL:', imageUrl);
                                                
                                                // Ensure the image URL is correct
                                                if (imageUrl) {
                                                    imagePreview.src = imageUrl;
                                                    imagePreview.style.display = 'block';
                                                    previewArea.style.display = 'block';
                                                    actionButtons.style.display = 'block';
                                                } else {
                                                    console.error('Image URL is not defined or incorrect.');
                                                }
                                            });

                                            quitButton.addEventListener('click', function() {
                                                // Hide preview area and reset image source
                                                imagePreview.src = '';
                                                imagePreview.style.display = 'none';
                                                previewArea.style.display = 'none';
                                                actionButtons.style.display = 'none';
                                                console.log('quit  button clicked.');
                                            });
                                        } else {
                                            console.error('Elements not found: fileNameInput, imagePreview, previewArea, previewButton, or quitButton');
                                        }
                                    });
                                </script>";
                        }
                    ?>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="<?php echo htmlspecialchars($row['location']); ?>" required>
                    </div>
                </div>
                <!-- Row 7 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group col-md-6">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" id="location" name="location" value="<?php echo htmlspecialchars($row['location']); ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fieldsupervisor">Field Supervisor</label>
                        <input type="text" class="form-control" id="fieldsupervisor" name="fieldsupervisor" value="<?php echo $row['fieldSupervisor']; ?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mobileno1">Mobile No1</label>
                        <input type="text" class="form-control" id="mobileno1" name="mobileno1" value="<?php echo $row['mobileNo1']; ?>" required>
                    </div>
                </div>


                  <!-- Row 8 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="mobileno2">Mobile no2</label>
                        <input type="text" class="form-control" id="mobileno2" name="mobileno2" value="<?php  echo $row['mobileNo2']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="project">Project</label>
                        <input type="text" class="form-control" id="project" name="project" value="<?php  echo $row['project']?>" required>
                    </div>
                </div>

                  <!-- Row 9 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="vehicleno">Vehicle number</label>
                        <input type="text" class="form-control" id="vehicleno" name="vehicleno" value="<?php  echo $row['vehicleNo']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="userid">User id</label>
                        <input type="text" class="form-control" id="userid" name="userid" value="<?php  echo $row['user_ID']?>" required>
                    </div>
                </div>

                  <!-- Row 10 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="issuedfuel">Issued fuel</label>
                        <input type="text" class="form-control" id="issuedfuel" name="issuedfuel" value="<?php  echo $row['issued_fuel']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" class="form-control" id="company" name="company" value="<?php  echo $row['company']?>" required>
                    </div>
                </div>

                  <!-- Row 11 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="dob">Date of birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo date('Y-m-d', strtotime($row['dob'])); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pob">Place of birth</label>
                        <input type="text" class="form-control" id="pob" name="pob" value="<?php  echo $row['pob']?>" required>
                    </div>
                </div>

                  <!-- Row 12 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                      <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled>Select gender</option>
                            <option value="male" <?php echo $row['gender'] == 'male' ? 'selected' : ''; ?>>Male</option>
                            <option value="female" <?php echo $row['gender'] == 'female' ? 'selected' : ''; ?>>Female</option>
                            <option value="other" <?php echo $row['gender'] == 'other' ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control" id="nationality" name="nationality" value="<?php  echo $row['nationality']?>" required>
                    </div>
                </div>

                 <!-- Row 13 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                    <label for="martial-status">Martial status</label>
                        <select class="form-control" id="marital-status" name="martial-status" required>
                            <option value="" disabled>Select marital status</option>
                            <option value="Single" <?php echo $row['marital_status'] == 'Single' ? 'selected' : ''; ?>>Single</option>
                            <option value="Married" <?php echo $row['marital_status'] == 'Married' ? 'selected' : ''; ?>>Married</option>
                            <option value="Divorced" <?php echo $row['marital_status'] == 'Divorced' ? 'selected' : ''; ?>>Divorced</option>
                            <option value="Widowed" <?php echo $row['marital_status'] == 'Widowed' ? 'selected' : ''; ?>>Widowed</option>
                            <option value="Separated" <?php echo $row['marital_status'] == 'Separated' ? 'selected' : ''; ?>>Separated</option>
                            <option value="Other" <?php echo $row['marital_status'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="poa">Post Address</label>
                        <input type="text" class="form-control" id="poa" name="poa" value="<?php  echo $row['box']?>" required>
                    </div>
                </div>

                 <!-- Row 14 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="code">post code</label>
                        <input type="text" class="form-control" id="code" name="code" value="<?php  echo $row['code']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="town">City</label>
                        <input type="text" class="form-control" id="town" name="town" value="<?php  echo $row['town']?>" required>
                    </div>
                </div>

                 <!-- Row 15 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="dateofemployment">date of employment</label>
                        <input type="date" class="form-control" id="dateofemployment" name="dateofemployment" value="<?php  echo  date('Y-m-d', strtotime($row['date_of_employment']))?>" required>
                    </div>
                    <div class="form-group">
                        <label for="employementno">Employement number</label>
                        <input type="text" class="form-control" id="employementno" name="employementno" value="<?php  echo $row['employment_no']?>" required>
                    </div>
                </div>

                <!-- Row 16 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="nssf-no">Nssf number</label>
                        <input type="text" class="form-control" id="nssf-no" name="nssf-no" value="<?php  echo $row['nssf_no']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tin-no">Tin number</label>
                        <input type="text" class="form-control" id="tin-no" name="tin-no" value="<?php  echo $row['tin_no']?>" required>
                    </div>
                </div>
                 <!-- Row 18 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="nida-no">Nida number</label>
                        <input type="text" class="form-control" id="nida-no" name="nida-no" value="<?php  echo $row['nida_no']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="banckacc_no">Bank Account number</label>
                        <input type="text" class="form-control" id="banckacc_no" name="banckacc_no" value="<?php  echo $row['banckacc_no']?>" required>
                    </div>
                </div>

                <!-- Row 19 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="bankname">Bank name</label>
                        <input type="text" class="form-control" id="bankname" name="bankname" value="<?php  echo $row['bankname']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dependantName">Dependant name</label>
                        <input type="text" class="form-control" id="dependantName" name="dependantName" value="<?php  echo $row['dependant_name']?>" required>
                    </div>
                </div>

                <!-- Row 20 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="dependant_dob1">Dependant date of birth</label>
                        <input type="date" class="form-control" id="dependant_dob" name="dependant_dob" value="<?php  echo  date('Y-m-d', strtotime($row['dependant_dob']))?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="dependantrelationship1">Dependant relationship</label>
                        <input type="text" class="form-control" id="dependantrelationship" name="dependantrelationship" value="<?php  echo $row['depandant_relationship']?>" required>
                    </div>
                </div>

                 <!-- Row 21 -->
                 <label for="Separate" class="separator">Second dependant details</label><br><br>
                <div class="form-row d-flex flex-wrap">
                <div class="form-group">
                        <label for="dependantName1">Dependant name</label>
                        <input type="text" class="form-control" id="dependantName1" name="dependantName1" value="<?php  echo $row['dependant_name_1']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dependant_dob1">Dependant date of birth</label>
                        <input type="date" class="form-control" id="dependant_dob1" name="dependant_dob1" value="<?php  echo  date('Y-m-d', strtotime($row['dependant_dob_1']))?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="dependantrelationship1">Dependant relationship</label>
                        <input type="text" class="form-control" id="dependantrelationship1" name="dependantrelationship1" value="<?php  echo $row['depandant_relationship_1']?>" required>
                    </div>
                </div>

                 <!-- Row 22 -->
                 <label for="Separate" class="separator">Third dependant details</label><br><br>
                <div class="form-row d-flex flex-wrap">
                <div class="form-group">
                        <label for="dependantName2">Dependant name</label>
                        <input type="text" class="form-control" id="dependantName2" name="dependantName2" value="<?php  echo $row['dependant_name_2']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dependant_dob2">Dependant date of birth</label>
                        <input type="date" class="form-control" id="dependant_dob2" name="dependant_dob2" value="<?php  echo date('Y-m-d', strtotime($row['dependant_dob_2']))?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="dependantrelationship2">Dependant relationship</label>
                        <input type="text" class="form-control" id="dependantrelationship2" name="dependantrelationship2" value="<?php  echo $row['depandant_relationship_2']?>" required>
                    </div>
                </div>

                 <!-- Row 23 -->
                 <label for="Separate" class="separator">Fourth dependant details</label><br><br>
                <div class="form-row d-flex flex-wrap">
                <div class="form-group">
                        <label for="dependantName3">Dependant name</label>
                        <input type="text" class="form-control" id="dependantName3" name="dependantName3" value="<?php  echo $row['dependant_name_3']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dependant_dob3">Dependant date of birth</label>
                        <input type="date" class="form-control" id="dependant_dob3" name="dependant_dob3" value="<?php  echo date('Y-m-d', strtotime($row['dependant_dob_3']))?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="dependantrelationship3">Dependant relationship</label>
                        <input type="text" class="form-control" id="dependantrelationship3" name="dependantrelationship3" value="<?php  echo $row['depandant_relationship_3']?>" required>
                    </div>
                </div>

                <!-- Row 23 -->
                <label for="Separate" class="separator">Fifth dependant details</label><br><br>
                <div class="form-row d-flex flex-wrap">
                <div class="form-group">
                        <label for="dependantName4">Dependant name</label>
                        <input type="text" class="form-control" id="dependantName4" name="dependantName4" value="<?php  echo $row['dependant_name_4']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="dependant_dob4">Dependant date of birth</label>
                        <input type="date" class="form-control" id="dependant_dob4" name="dependant_dob4" value="<?php  echo date('Y-m-d', strtotime($row['dependant_dob_4']))?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="dependantrelationship4">Dependant relationship</label>
                        <input type="text" class="form-control" id="dependantrelationship4" name="dependantrelationship4" value="<?php  echo $row['depandant_relationship_4']?>" required>
                    </div>
                </div>


                <!-- Row 24 -->
                <br><label for="Separate" class="separator">Next of kin details</label><br><br>
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="kin-name">Next of kin name</label>
                        <input type="text" class="form-control" id="kin-name" name="kin-name" value="<?php  echo $row['kin_name']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kindob">Kin date of birth</label>
                        <input type="date" class="form-control" id="kindob" name="kindob" value="<?php  echo date('Y-m-d', strtotime($row['kin_dob'])) ?>" required>
                    </div>
                </div>

                <!-- Row 25 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="kin-contact">Next of kin contact</label>
                        <input type="text" class="form-control" id="kin-contact" name="kin-contact" value="<?php  echo $row['kin_contact']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kin-relationship">Next of kin relationship</label>
                        <input type="text" class="form-control" id="kin-relationship" name="kin-relationship" value="<?php  echo $row['kin_relationship']?>" required>
                    </div>
                </div>

                <!-- Row 26 -->
                <br><label for="Separate" class="separator">Second Next of kin details</label><br><br>
                <div class="form-row d-flex flex-wrap">
                <div class="form-group">
                        <label for="kin-name1">Next of kin name</label>
                        <input type="text" class="form-control" id="kin-name1" name="kin-name1" value="<?php  echo $row['kin_name_1']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kindob1">Kin date of birth</label>
                        <input type="date" class="form-control" id="kindob1" name="kindob1" value="<?php  echo date('Y-m-d', strtotime($row['kin_dob_1'])) ?>" required>
                    </div>
                </div>
                  <!-- Row 27 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="kin-contact">Next of kin contact</label>
                        <input type="text" class="form-control" id="kin-contact" name="kin-contact" value="<?php  echo $row['kin_contact_1']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kin-relationship1">Next of kin relationship</label>
                        <input type="text" class="form-control" id="kin-relationship1" name="kin-relationship1" value="<?php  echo $row['kin_relationship_1']; ?>" required>
                    </div>
                </div>

                <!-- Row 28 -->
                <div class="form-row d-flex flex-wrap">
                    <label for="Nida attachment">Nida attachment</label>
                    <div class="input-group">
                        <span class="input-group-addon pd-0" style="padding: 10px;">Preview</span>
                        <input id="fileName1" type="text" class="form-control" name="fileName1" placeholder="Additional Info" readonly>
                        <div class="input-group-append">
                            <button id="changeButton1" name="changeButton1" class="btn btn-primary" type="button">Change</button>
                            <button id="previewButton1" name="previewButton1" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-secondary" type="button">Preview</button>
                        </div>
                    </div>

                    <!-- Preview Area -->
                    <div id="previewArea1" style="display: none; margin-top: 10px; margin-bottom: 10px; ">
                    <img id="imagePreview1" src="" alt="Preview" style="width: 100%; display: block; margin: 0 auto;">
                        <embed id="pdfPreview1" src="" type="application/pdf" style="width: 100%; height: auto; display: none;">
                        
                        <!-- File input -->
                        <input type="file" id="fileInput1" name="file1" style="display: none;">
                        
                        <!-- File input and Action Buttons -->
                        <div id="actionButtons1" class="mt-3">
                            <button id="quitPreview1" class="btn btn-danger" type="button">Quit</button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Nida attachment image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?php
                        $imageURL = 'resources/images/nida-attachment/' . basename($row['national_id_attachment']);
                       // $imageURL = 'resources/images/newl.jpg';// temporary test
                        $fileName = basename($row['national_id_attachment']);
                
                        if ($imageURL) {
                            echo "<script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var fileNameInput = document.getElementById('fileName1');
                                        var imagePreview = document.getElementById('imagePreview1');
                                        var previewArea = document.getElementById('previewArea1');
                                        var previewButton = document.getElementById('previewButton1');
                                        var quitButton = document.getElementById('quitPreview1');
                                        var actionButtons = document.getElementById('actionButtons1');
                
                                        if (fileNameInput && imagePreview && previewArea && previewButton && quitButton && actionButtons) {
                                            fileNameInput.value = '$fileName';

                                            previewButton.addEventListener('click', function() {
                                                var imageUrl = '$imageURL';
                                                console.log('Preview button clicked, image URL:', imageUrl);// for console debbuging  message 

                                                if (imageUrl) {
                                                    imagePreview.src = imageUrl;
                                                    imagePreview.style.display = 'block';
                                                    previewArea.style.display = 'block';
                                                    actionButtons.style.display = 'block';
                                                } else {
                                                    console.error('Image URL is not defined or incorrect.');
                                                }
                                            });

                                            quitButton.addEventListener('click', function() {
                                                // Hide preview area and reset image source
                                                imagePreview.src = '';
                                                imagePreview.style.display = 'none';
                                                previewArea.style.display = 'none';
                                                actionButtons.style.display = 'none';
                                            });
                                        } else {
                                            console.error('Elements not found: fileNameInput, imagePreview, previewArea, previewButton, or quitButton');
                                        }
                                    });
                                </script>";
                        }
                    ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- php code was here  -->
                    <div class="input-group">
                    <label for="marriage-attachment">Marriage attachment</label>
                    <div class="input-group">
                        <span class="input-group-addon pd-0" style="padding: 10px;">Preview</span>
                        <input id="fileName2" type="text" class="form-control" name="fileName2" placeholder="Additional Info" readonly>
                        <div class="input-group-append">
                            <button id="changeButton2" name="changeButton2" class="btn btn-primary" type="button">Change</button>
                            <button id="previewButton2" name="previewButton2" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-secondary" type="button">Preview</button>
                        </div>
                    </div>
                    <!-- Preview Area -->
                    <div id="previewArea2" style="display: none; margin-top: 10px; margin-bottom: 10px; ">
                    <img id="imagePreview2" src="" alt="Preview" style="width: 100%; display: block; margin: 0 auto;">
                        <embed id="pdfPreview2" src="" type="application/pdf" style="width: 100%; height: auto; display: none;">
                        
                        <!-- File input -->
                        <input type="file" id="fileInput2" name="file2" style="display: none;">
                        
                        <!-- File input and Action Buttons -->
                        <div id="actionButtons2" class="mt-3">
                            <button id="quitPreview2" class="btn btn-danger" type="button">Quit</button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Nida attachment image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <?php
                        // $imageURL = 'resources/images/nida-attachment/' . basename($row['national_id_attachment']);
                       $imageURL = 'resources/images/newl.jpg';// temporary test
                        // $fileName = basename($row['national_id_attachment']);
                        $fileName = basename($imageURL);
                
                        if ($imageURL) {
                            echo "<script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var fileNameInput = document.getElementById('fileName2');
                                        var imagePreview = document.getElementById('imagePreview2');
                                        var previewArea = document.getElementById('previewArea2');
                                        var previewButton = document.getElementById('previewButton2');
                                        var quitButton = document.getElementById('quitPreview2);
                                        var actionButtons = document.getElementById('actionButtons2');
                
                                        if (fileNameInput && imagePreview && previewArea && previewButton && quitButton && actionButtons) {
                                            fileNameInput.value = '$fileName';

                                            previewButton.addEventListener('click', function() {
                                                var imageUrl = '$imageURL';
                                                console.log('Preview button clicked, image URL:', imageUrl);// for console debbuging  message 

                                                if (imageUrl) {
                                                    imagePreview.src = imageUrl;
                                                    imagePreview.style.display = 'block';
                                                    previewArea.style.display = 'block';
                                                    actionButtons.style.display = 'block';
                                                } else {
                                                    console.error('Image URL is not defined or incorrect.');
                                                }
                                            });

                                            quitButton.addEventListener('click', function() {
                                                // Hide preview area and reset image source
                                                imagePreview.src = '';
                                                imagePreview.style.display = 'none';
                                                previewArea.style.display = 'none';
                                                actionButtons.style.display = 'none';
                                            });
                                        } else {
                                            console.error('Elements not found: fileNameInput, imagePreview, previewArea, previewButton, or quitButton');
                                        }
                                    });
                                </script>";
                        }
                       ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                       </div>
                      </div>                            
                    </div>
                </div>

                 <!-- Row 29 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="image-name">image name</label>
                        <input type="text" class="form-control" id="image-name" name="image-name" value="<?php  echo $row['img_name']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="total-leave">Total leave </label>
                        <input type="text" class="form-control" id="total-leave" name="total-leave" value="<?php  echo $row['total_leave']; ?>" required>
                    </div>
                </div>

                 <!-- Row 30 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role" value="<?php  echo $row['role']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="delete-status">Delete status</label>
                        <input type="text" class="form-control" id="delete-status" name="delete-status" value="<?php  echo $row['delete_status']; ?>" required>
                    </div>
                </div>

                 <!-- Row 31 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="employment-terms">Employment terms</label>
                        <input type="text" class="form-control" id="employment-terms" name="employment-terms" value="<?php  echo $row['employment_terms']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control" id="salary" name="salary" value="<?php  echo $row['salary']; ?>" required>
                    </div>
                </div>

                 <!-- Row 32 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="terminantion-status">Terminiation status</label>
                        <input type="text" class="form-control" id="terminantion-status" name="terminantion-status" value="<?php  echo $row['termination_status']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="terminantion-reason">Terminiation reason</label>
                        <input type="text" class="form-control" id="terminantion-reason" name="terminantion-reason" value="<?php  echo $row['termination_reason']; ?>" required>
                    </div>
                </div>

                 <!-- Row 32 -->
                 <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="terminantion-date">Terminiation date</label>
                        <input type="date" class="form-control" id="terminantion-date" name="terminantion-date" value="<?php  echo date('Y-m-d', strtotime($row['termination_date'])); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="contract_exp">contact Expire date</label>
                        <input type="date" class="form-control" id="contract_exp" name="contract_exp" value="<?php  echo date('Y-m-d', strtotime($row['contract_exp'])); ?>" required>
                    </div>
                </div>
                <!-- Final Row (Submit Button) -->
                <!-- <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="edit" style="background-color: #488aec; border-color: #488aec;">
                            Save Changes
                            </button>
                 </div> -->
                        <!-- Button trigger modal -->
                    <button type="button" style="background-color: #488aec; border-color: #488aec;" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                    Save Changes 
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Confirm changes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span>Please preview your data before submitting.</span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="edit">Confirm</button>
                        </div>
                        </div>
                    </div>
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
<script> 
        document.getElementById('changeButton').addEventListener('click', function() {
        // Show the file input
        document.getElementById('fileInput').click();
    });
    document.getElementById('fileInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Show the preview
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
                document.getElementById('previewArea').style.display = 'block';
                document.getElementById('fileName').value = file.name;
                document.getElementById('actionButtons').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
       
    });
    document.getElementById('changeButton1').addEventListener('click', function() {
        // Show the file input
        document.getElementById('fileInput1').click();
    });
    document.getElementById('fileInput1').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Show the preview
                document.getElementById('imagePreview1').src = e.target.result;
                document.getElementById('imagePreview1').style.display = 'block';
                document.getElementById('previewArea1').style.display = 'block';
                document.getElementById('fileName1').value = file.name;
                document.getElementById('actionButtons1').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
       
    });

    document.getElementById('changeButton2').addEventListener('click', function() {
        // Show the file input
        document.getElementById('fileInput2').click();
    });

    document.getElementById('fileInput2').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Show the preview
                document.getElementById('imagePreview2').src = e.target.result;
                document.getElementById('imagePreview2').style.display = 'block';
                document.getElementById('previewArea2').style.display = 'block';
                document.getElementById('fileName2').value = file.name;
                document.getElementById('actionButtons2').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
       
    });
    document.getElementById('quitPreview').addEventListener('click', function() {
        // Hide the preview area and action buttons
        document.getElementById('previewArea').style.display = 'none';
        document.getElementById('actionButtons').style.display = 'none';
    });

    // document.getElementById('quitPreview2').addEventListener('click', function() {
    //     // Hide the preview area and action buttons
    //     document.getElementById('previewArea2').style.display = 'none';
    //     document.getElementById('actionButtons2').style.display = 'none';
    // });

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
