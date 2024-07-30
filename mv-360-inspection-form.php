<?php
    include 'server/db.php';
    include 'server/modules/staff-pages.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picture Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            font-size: 1.25rem; 
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
        <div class="col-lg-10 mx-auto">
            <div class="form-container">
            <form id="checklistForm" method="POST" action="server/ppe-inspection.inc.php"   enctype="multipart/form-data">
                    <div class="d-flex flex-wrap justify-content-start">
                        <!-- Repeat the block below for each input group -->
                        <!-- Total 20 blocks -->
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
                                        <input type="file" class="form-control-file" id="image1" name="front-view-upload">
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
                                        <input type="file" class="form-control-file" id="image1" name="rear-view-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">3. Left side view</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="left-side-view" id="left-side-view"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="left-side-view-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">4. Right side view</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="right-side-view" id="right-side-view"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="right-side-view-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">5. Loadbin Cover</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="loadbin-cover" id="loadbin-cover"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="loadbin-cover-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">6. Windscreen</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="windscreen" id="windscreen"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="windscreen-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">7. License Disk</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="license-disk" id="license-disk"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="license-disk-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">8. Towbar</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="towbar" id="towbar"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="towbar-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">9. Left-Front Tyre Age</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="lf-tyre-age" id="lf-tyre-age"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="lf-tyre-age-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">10. Left-Front Tyre Treat</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="lf-tyre-treat" id="lf-tyre-treat"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="lf-tyre-treat-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">11. Right-Front Tyre Age</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="rf-tyre-age" id="rf-tyre-age"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="rf-tyre-age-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">12. Right-Front Tyre Treat</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="rf-tyre-treat" id="rf-tyre-treat"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="rf-tyre-treat-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">13. Left-Rear Tyre Age</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="lr-tyre-age" id="lr-tyre-age"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="lr-tyre-age-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">14. Left-Rear Tyre Treat</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="lr-tyre-treat" id="lr-tyre-treat"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="lr-tyre-treat-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">15. Right-Rear Tyre Age</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="rr-tyre-age" id="rr-tyre-age"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="rr-tyre-age-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">16. Right-Rear Tyre Treat</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="rr-tyre-treat" id="rr-tyre-treat"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="rr-tyre-treat-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">17. Rear 3pt Seatbelts </label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="rear-3pt-seatbelts" id="rear-3pt-seatbelts"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="rear-3pt-seatbelts-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">18. Driver 3pt Seatbelts </label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="driver-3pt-seatbelts" id="driver-3pt-seatbelts"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="driver-3pt-seatbelts-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">19. Co Driver 3pt S/belt  </label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="co-driver" id="co-driver"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="co-driver-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">20. Bluetooth   </label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="bluetooth" id="bluetooth"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="bluetooth-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">21. Odometer </label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="odometer" id="odometer"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="odometer-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">22. Service Book</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="service-book" id="service-book"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="service-book-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">23. Emergence Triangle</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="emergence-triangle" id="emergence-triangle"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="emergence-triangle-upload">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-item">
                            <div class="card card-background-color">
                                <div class="card-body d-flex flex-column align-items-stretch">
                                    <div class="form-group">
                                        <label class="view-label" for="select1">24. First Aid Kit</label>
                                        <!-- <label class="compliant-label" for="select1">Compliants:</label> -->
                                        <select class="form-control" name="first-aid-kit" id="first-aid-kit"required>
                                            <option value="" selected disabled >Choose</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Upload Picture</label>
                                        <input type="file" class="form-control-file" id="image1" name="first-aid-kit-upload">
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
