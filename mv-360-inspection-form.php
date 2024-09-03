<?php
    include 'server/db.php';
    include 'server/modules/staff-pages.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      <?php include 'server/title.php' ?>
    </title>   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #ffffff; 
        }
        .form-container {
            background-color: #ffffff;
             /* #f8f9fa */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-item {
            flex: 1 1 30%; 
            margin-bottom: 20px;
            margin-right: 10px;
            background-color: #f8f9fa;
        }
        .form-item:nth-child(3n) {
            margin-right: 0;
        }
        .form-control {
            background-color:#E8ECEF; /* Make input size medium */
        }
        .view-label {
            font-size: 1.0rem; 
            font-weight: bold;
            margin-bottom: 5px; 
        }
        .card-background-color{
            background-color: #f8f9fa;
        }
        .compliant-label {
            font-size: 0.875rem; 
            color: #666; 
            margin-bottom: 10px; 
        }
        .upload {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #488aec;
            color: #ffffff;
            border-radius: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            font-size: 0.95rem;
            text-align: center;
        }
        .logo{
            width: 100px;
            height: auto;
            margin: 0 auto;
        }

        .upload-icon {
            margin-right: 5px;
            vertical-align: middle;
        }
        .inputs-style{
            border-radius: 5px;
        }
        .alert  {
            opacity: 0;
            transform: translateY(-20px);
        
        }
        .alert-success{
            animation: fadeIn 1s forwards;
        }
        .slide{
            animation: fadeIn 1s forwards;
            opacity: 0;
            transform: translateY(-20px);

        }

        @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
           }
        }
        @keyframes horizontal-shaking {
            to {
              opacity: 1;
              transform: translateY(0);
            }
            0% { transform: translateX(0) }
            25% { transform: translateX(5px) }
            50% { transform: translateX(-5px) }
            75% { transform: translateX(5px) }
            100% { transform: translateX(0) }
        }
        .alert-danger{
            animation: horizontal-shaking 0.2s ease-in-out forwards; 
            animation-iteration-count: 4;
        } 

        #upload {
            display: none;
        }
        @media (max-width: 768px) {
            .form-item {
                flex: 1 1 100%;
                margin-right: 0;
            }

            .upload {
                text-align: left;
                padding: 0.55rem 1.0rem;
                margin-right: 0;
            }
        
            #upload {
                display: block; 
                margin-top: 10px; 
                width: 100%; 
                font-size: 0.8rem; 
                padding: 0.5rem;
                border: 1px solid #ccc; 
            }
        }
    </style>
</head>
<body>
 <div id="section" class="container-fluid mx-0 px-0">
     <?php
      menu5();
     ?>
    <div class="container mt-5">
        <div class="col-lg-8 mx-auto">
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
         <div class="form-container">
            <form id="checklistForm" method="POST" action="server/ppe-inspection.inc.php"   enctype="multipart/form-data">
                        <!-- header  Section -->
                    <div class="d-flex flex-wrap justify-content-center mb-4 card-background-color align-items-center inputs-style">
                        <div class="text-center w-100">
                            <div class="logo mb-3 mt-2">
                                <img src="resources/images/newl.webp" class="img-fluid" alt="Northern Engineering Works Logo">
                            </div>
                            <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                            <h6>Motorvehicle 360 Inspection</h6>
                        </div>
                    <!-- </div>
                    <div class="d-flex flex-wrap justify-content-start mb-4 card-background-color align-items-stretch  inputs-style"> -->
                        <div class="col-md-6 mb-3 mt-4">
                            <div class="form-group">
                                <label for="vehicle">Vehicle</label>
                                <select class="form-control" id="vehicle" name="vehicle" required>
                                    <option value="" disabled>Select Vehicle</option>
                                    <option value="T123ABC">T123ABC</option>
                                    <option value="T222CAB">T222CAB</option>
                                    <option value="T345CDA">T345CDA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 mt-4">
                            <div class="form-group">
                                <label for="lastServiceDate">Last Service date</label>
                                <input type="date" class="form-control" id="lastServiceDate" name="lastServiceDate" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="inspectorName">Inspector Name</label>
                                <input type="text" class="form-control" id="inspectorName" name="inspectorName" value="" required>
                            </div>
                        </div>
                    </div>
                      <!-- card   Section -->
                    <div class="d-flex flex-wrap justify-content-start">
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">1. Front View</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="front-view" id="front-view"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="front-view-upload" id="front-view-upload" hidden/>
                                        <label for="front-view-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">2. Rear view</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" id="rear-view" name="rear-view" required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="rear-view-upload" id="rear-view-upload" hidden/>
                                        <label for="rear-view-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">3. Left side view</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="left-side-view" id="left-side-view"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="left-side-view-upload" id="left-side-view-upload" hidden/>
                                        <label for="left-side-view-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">4. Right side view</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="right-side-view" id="right-side-view"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="right-side-view-upload" id="right-side-view-upload" hidden/>
                                        <label for="right-side-view-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">5. Loadbin Cover</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="loadbin-cover" id="loadbin-cover"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="loadbin-cover-upload" id="loadbin-cover-upload" hidden/>
                                        <label for="loadbin-cover-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">6. Windscreen</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="windscreen" id="windscreen"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="windscreen-upload" id="windscreen-upload" hidden/>
                                        <label for="windscreen-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">7. License Disk</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="license-disk" id="license-disk"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="license-disk-upload" id="license-disk-upload" hidden/>
                                        <label for="license-disk-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">8. Towbar </label><br>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="towbar" id="towbar"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="towbar-upload" id="towbar-upload" hidden/>
                                        <label for="towbar-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">9.LF Tyre Age</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="lf-tyre-age" id="lf-tyre-age"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="lf-tyre-age-upload" id="lf-tyre-age-upload" hidden/>
                                        <label for="lf-tyre-age-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">10. Left-Front Tyre Treat</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="lf-tyre-treat" id="lf-tyre-treat"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="lf-tyre-treat-upload" id="lf-tyre-treat-upload" hidden/>
                                        <label for="lf-tyre-treat-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">11. Right-Front Tyre Age</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="rf-tyre-age" id="rf-tyre-age"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="rf-tyre-age-upload" id="rf-tyre-age-upload" hidden/>
                                        <label for="rf-tyre-age-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">12. Right-Front Tyre Treat</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="rf-tyre-treat" id="rf-tyre-treat"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="rf-tyre-treat-upload" id="rf-tyre-treat-upload" hidden/>
                                        <label for="rf-tyre-treat-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">13. Left-Rear Tyre Age</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="lr-tyre-age" id="lr-tyre-age"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="lr-tyre-age-upload" id="lr-tyre-age-upload" hidden/>
                                        <label for="lr-tyre-age-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">14. Left-R Tyre Treat</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="lr-tyre-treat" id="lr-tyre-treat"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="lr-tyre-treat-upload" id="lr-tyre-treat-upload" hidden/>
                                        <label for="lr-tyre-treat-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">15. Right-R Tyre Age</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="rr-tyre-age" id="rr-tyre-age"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="rr-tyre-age-upload" id="rr-tyre-age-upload" hidden/>
                                        <label for="rr-tyre-age-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">16. Right-R Tyre Treat</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="rr-tyre-treat" id="rr-tyre-treat"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file"  accept="image/x-png,image/jpeg,image/jpg" name="rr-tyre-treat-upload" id="rr-tyre-treat-upload" hidden/>
                                        <label for="rr-tyre-treat-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">17. Rear 3pt Seatbelts </label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="rear-3pt-seatbelts" id="rear-3pt-seatbelts"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="rear-3pt-seatbelts-upload" id="rear-3pt-seatbelts-upload" hidden/>
                                        <label for="rear-3pt-seatbelts-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">18. Driver Seatbelts </label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="driver-3pt-seatbelts" id="driver-3pt-seatbelts"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="driver-3pt-seatbelts-upload" id="driver-3pt-seatbelts-upload" hidden/>
                                        <label for="driver-3pt-seatbelts-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">19. Co Driver belt</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="co-driver" id="co-driver"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="co-driver-upload" id="co-driver-upload" hidden/>
                                        <label for="co-driver-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">20. Bluetooth   </label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="bluetooth" id="bluetooth"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="bluetooth-upload" id="bluetooth-upload" hidden/>
                                        <label for="bluetooth-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">21. Odometer </label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="odometer" id="odometer"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="odometer-upload" id="odometer-upload" hidden/>
                                        <label for="odometer-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">22. Service Book</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="service-book" id="service-book"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="service-book-upload" id="service-book-upload" hidden/>
                                        <label for="service-book-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">23. Em Triangle</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="emergence-triangle" id="emergence-triangle"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="emergence-triangle-upload" id="emergence-triangle-upload" hidden/>
                                        <label for="emergence-triangle-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">24. First Aid Kit</label>
                                        <label class="compliant-label" for="select1">Compliants:</label>
                                        <select class="form-control" name="first-aid-kit" id="first-aid-kit"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" accept="image/x-png,image/jpeg,image/jpg" name="first-aid-kit-upload" id="first-aid-kit-upload" hidden/>
                                        <label for="first-aid-kit-upload" class="upload">
                                            <i class="fas fa-upload upload-icon"></i> Choose file
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" style="background-color: #488aec; border-color: #488aec;">
                                    Submit
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>  
<script>
        // JavaScript to handle file input changes for all file inputs
        document.querySelectorAll('input[type="file"]').forEach(function(inputElement) {
            inputElement.addEventListener('change', function() {
                var label = document.querySelector('label[for="' + this.id + '"]');
                var fileName = this.files[0] ? this.files[0].name : "No file chosen";
                label.innerHTML = '<i class="fas fa-check upload-icon"></i> File Selected';
            });
        });
    </script> 
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="resources/js/ppe-inspection.js"></script>
</body>
</html>
