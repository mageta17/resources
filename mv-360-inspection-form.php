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

        .upload-icon {
            margin-right: 5px;
            vertical-align: middle;
        }

        #upload {
            display: none;
        }
        @media (max-width: 768px) {
            .form-item {
                flex: 1 1 100%;
                margin-right: 0;
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
                if (isset($_SESSION['error'])) {
                    ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <p><?php echo $_SESSION['error']; ?></p>
                    </div>
                    <?php
                    unset($_SESSION['error']); // Clear the error message after displaying it
                }
            ?>
         <div class="form-container">
            <form id="checklistForm" method="POST" action="server/ppe-inspection.inc.php"   enctype="multipart/form-data">
                    <div class="d-flex flex-wrap justify-content-start">
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">1. Front View</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="front-view" id="front-view"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="front-view-upload" id="front-view-upload" hidden/>
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
                                        <select class="form-control" id="rear-view" name="rear-view" required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="rear-view-upload" id="rear-view-upload" hidden/>
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
                                        <select class="form-control" name="left-side-view" id="left-side-view"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="left-side-view-upload" id="left-side-view-upload" hidden/>
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
                                        <select class="form-control" name="right-side-view" id="right-side-view"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="right-side-view-upload" id="right-side-view-upload" hidden/>
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
                                        <select class="form-control" name="loadbin-cover" id="loadbin-cover"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="loadbin-cover-upload" id="loadbin-cover-upload" hidden/>
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
                                        <select class="form-control" name="windscreen" id="windscreen"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="windscreen-upload" id="windscreen-upload" hidden/>
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
                                        <select class="form-control" name="license-disk" id="license-disk"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="license-disk-upload" id="license-disk-upload" hidden/>
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
                                        <label class="view-label" for="select1">8. Towbar</label>
                                        <select class="form-control" name="towbar" id="towbar"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="towbar-upload" id="towbar-upload" hidden/>
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
                                        <select class="form-control" name="lf-tyre-age" id="lf-tyre-age"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="lf-tyre-age-upload" id="lf-tyre-age-upload" hidden/>
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
                                        <select class="form-control" name="lf-tyre-treat" id="lf-tyre-treat"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="lf-tyre-treat-upload" id="lf-tyre-treat-upload" hidden/>
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
                                        <select class="form-control" name="rf-tyre-age" id="rf-tyre-age"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="rf-tyre-age-upload" id="rf-tyre-age-upload" hidden/>
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
                                        <select class="form-control" name="rf-tyre-treat" id="rf-tyre-treat"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="rf-tyre-treat-upload" id="rf-tyre-treat-upload" hidden/>
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
                                        <select class="form-control" name="lr-tyre-age" id="lr-tyre-age"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="lr-tyre-age-upload" id="lr-tyre-age-upload" hidden/>
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
                                        <select class="form-control" name="lr-tyre-treat" id="lr-tyre-treat"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="lr-tyre-treat-upload" id="lr-tyre-treat-upload" hidden/>
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
                                        <select class="form-control" name="rr-tyre-age" id="rr-tyre-age"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="rr-tyre-age-upload" id="rr-tyre-age-upload" hidden/>
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
                                        <select class="form-control" name="rr-tyre-treat" id="rr-tyre-treat"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="rr-tyre-treat-upload" id="rr-tyre-treat-upload" hidden/>
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
                                        <select class="form-control" name="rear-3pt-seatbelts" id="rear-3pt-seatbelts"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="rear-3pt-seatbelts-upload" id="rear-3pt-seatbelts-upload" hidden/>
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
                                        <select class="form-control" name="driver-3pt-seatbelts" id="driver-3pt-seatbelts"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="driver-3pt-seatbelts-upload" id="driver-3pt-seatbelts-upload" hidden/>
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
                                        <select class="form-control" name="co-driver" id="co-driver"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="co-driver-upload" id="co-driver-upload" hidden/>
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
                                        <select class="form-control" name="bluetooth" id="bluetooth"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="bluetooth-upload" id="bluetooth-upload" hidden/>
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
                                        <select class="form-control" name="odometer" id="odometer"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="odometer-upload" id="odometer-upload" hidden/>
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
                                        <select class="form-control" name="service-book" id="service-book"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="service-book-upload" id="service-book-upload" hidden/>
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
                                        <select class="form-control" name="emergence-triangle" id="emergence-triangle"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="emergence-triangle-upload" id="emergence-triangle-upload" hidden/>
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
                                        <select class="form-control" name="first-aid-kit" id="first-aid-kit"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" name="first-aid-kit-upload" id="first-aid-kit-upload" hidden/>
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
                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>   
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="resources/js/ppe-inspection.js"></script>
</body>
</html>
