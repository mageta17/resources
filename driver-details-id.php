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
    </style>
</head>
<body> 
<div id="section" class="container-fluid mx-0 px-0">
    <?php menu5(); ?>
    
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-md-6 col-sm-12" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
            <form action="save_edits.php" method="post">
                <!-- Row 1 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="employeeId">Employer ID</label>
                        <input type="text" class="form-control" id="employeeId" name="employeeId" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" value="" required>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="middleName">Middle Name</label>
                        <input type="text" class="form-control" id="middleName" name="middleName" value="">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" value="" required>
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="employeeName">Employee Name</label>
                        <input type="text" class="form-control" id="employeeName" name="employeeName" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="employeePosition">Position</label>
                        <input type="text" class="form-control" id="employeePosition" name="employeePosition" value="" required>
                    </div>
                </div>

                <!-- Row 4 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" class="form-control" id="department" name="department" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="" required>
                    </div>
                </div>

                <!-- Row 5 -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Driver License number</label>
                        <input type="text" class="form-control" id="department" name="department" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Driver License numberExpier</label>
                        <input type="email" class="form-control" id="email" name="email" value="" required>
                    </div>
                </div>

                  <!-- Row 6 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Driver License image</label>
                        <input type="text" class="form-control" id="department" name="department" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Location</label>
                        <input type="email" class="form-control" id="email" name="email" value="" required>
                    </div>
                </div>

                  <!-- Row 7 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Field supervisor </label>
                        <input type="text" class="form-control" id="department" name="department" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Mobile no1</label>
                        <input type="email" class="form-control" id="email" name="email" value="" required>
                    </div>
                </div>

                  <!-- Row 6 -->
                  <div class="form-row d-flex flex-wrap">
                    <div class="form-group">
                        <label for="department">Mobile no2</label>
                        <input type="text" class="form-control" id="department" name="department" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Project</label>
                        <input type="email" class="form-control" id="email" name="email" value="" required>
                    </div>
                </div>

                
                <!-- Final Row (Submit Button) -->
                <div class="form-row d-flex flex-wrap">
                    <div class="form-group col-12 text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
