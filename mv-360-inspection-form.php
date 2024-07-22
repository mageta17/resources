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
    <?php include 'server/styleLink.php' ?>

    <link href="resources/style/ppe-inspection-form.css?v=2" rel="stylesheet">
    <link href="resources/style/staff.css?v=2" rel="stylesheet">
    
    <title>
      <?php include 'server/title.php' ?>
    </title>
    
    <style>
        .preview-image {
            max-width: 100px;
            max-height: 100px;
            border: 1px solid #ccc;
            display: none;
        }
        .image-view {
            max-width: 100px;
            max-height: 100px;
        }

        input[type="radio"] {
            width: 17px;
            height: 17px;
        }

        .radio-text {
            font-size: 13px;
        }
    </style>
    
</head>

<body> 
    <div id="section" class="container-fluid mx-0 px-0">        
        <?php
            menu5();
        ?>
      <div class="row justify-content-center mx-0">
          <div class="col-lg-6">
          <form id="checklistForm" method="POST" action="server/ppe-inspection.inc.php" enctype="multipart/form-data">
                    <div class="container-fluid mt-4">
                        <!-- Section 1 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="front-view">1. Front view</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="front-view" id="front-view" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example"  required>
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="front-view-upload" class="form-control-file">
                            </div>
                        </div>
                        <!-- Section 2 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="rear-view">2. Rear view</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="rear-view" id="rear-view" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example" required>
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="rear-view-upload" class="form-control-file">
                            </div>
                        </div>
                        <!-- section-3 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="left-side-view">3. Left side view</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="left-side-view" id="left-side-view" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="left-side-view-upload" class="form-control-file">
                            </div>
                        </div>
 
                        <!-- section-4 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="left-side-view">4. Right side view</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="right-side-view" id="right-side-view" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="right-side-view-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-5 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="loadbin-cover">5. Loadbin Cover</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="loadbin-cover" id="loadbin-cover" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="loadbin-cover-upload" class="form-control-file">
                            </div>
                        </div>
                     
                        <!-- section-6 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="windscreen">6. Windscreen</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="windscreen" id="windscreen" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="windscreen-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-7 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="license-disk">7. License Disk</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="license-disk" id="license-disk" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="license-disk-upload" class="form-control-file">
                            </div>
                        </div>
                        
                        <!-- section-8 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="towbar">8. Towbar</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="towbar" id="towbar" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="towbar-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-9 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="lf-tyre-age">9. Left-Front Tyre Age</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="lf-tyre-ager" id="lf-tyre-age" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="lf-tyre-age-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-10 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="lf-tyre-treat">10. Left-Front Tyre Treat</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="lf-tyre-treat" id="lf-tyre-treat" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="lf-tyre-treat-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-11 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="rf-tyre-age">11. Right-Front Tyre Age</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="rf-tyre-age" id="rf-tyre-age" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="rf-tyre-age-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-12 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="rf-tyre-treat">12. Right-Front Tyre Treat</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="rf-tyre-treat" id="rf-tyre-treat" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="rf-tyre-treat-upload" class="form-control-file">
                            </div>
                        </div>
                        
                        <!-- section-13 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="lf-tyre-age">13. Left-Rear Tyre Age</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="lf-tyre-age" id="lf-tyre-age" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="lf-tyre-age-upload" class="form-control-file">
                            </div>
                        </div>

                         <!-- section-14 -->
                         <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="lf-tyre-treat">14. Left-Rear Tyre Treat</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="lf-tyre-treat" id="lf-tyre-treat" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="lf-tyre-treat-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-15 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="rr-tyre-age">15. Right-Rear Tyre Age</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="rr-tyre-age" id="rr-tyre-age" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="rr-tyre-age-upload" class="form-control-file">
                            </div>
                        </div>

                         <!-- section-16 -->
                         <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="rr-tyre-treat">16. Right-Rear Tyre Treat</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="rr-tyre-treat" id="rr-tyre-treat" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="rr-tyre-treat-upload" class="form-control-file">
                            </div>
                        </div>
                        
                        <!-- section-17 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="rear-3pt-seatbelts">17. Rear 3pt Seatbelts </label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="rear-3pt-seatbelts" id="rear-3pt-seatbelts" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="rear-3pt-seatbelts-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-18 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="driver-3pt-seatbelts">18. Driver 3pt Seatbelts </label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="driver-3pt-seatbelts" id="driver-3pt-seatbelts" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="driver-3pt-seatbelts-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-19 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="co-driver">19. Co Driver 3pt S/belt  </label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="co-driver" id="co-driver" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="co-driver-upload" class="form-control-file">
                            </div>
                        </div>
                        
                        <!-- section-20 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="bluetooth">20. Bluetooth </label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="bluetooth" id="bluetooth" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="bluetooth-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-21 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="odometer">21. Odometer </label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="odometer" id="odometer" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="odometer-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-22 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="service-book">22. Service Book </label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="service-book" id="service-book" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="service-book-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-23 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="emergence-triangle">23. Emergence Triangle</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="emergence-triangle" id="emergence-triangle" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="emergence-triangle-upload" class="form-control-file">
                            </div>
                        </div>

                        <!-- section-24 -->
                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <div class="col-md-3">
                                <label for="first-aid-kit">24. First Aid Kit</label>
                            </div>
                            <div class="col-md-2">
                                <label for="compliants">Compliant:</label>
                            </div>
                            <div class="col-md-3">
                                <select name="first-aid-kit" id="first-aid-kit" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
                                    <option value="" selected disabled>Choose</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="first-aid-kit-upload" class="form-control-file">
                            </div>
                        </div>

                        <div class="row align-items-center mb-3 p-2" style="background-color: #f8f9fa;">
                            <button class="btn btn-primary mt-2" type="submit" name="submit">Submit</button>
                        </div>
                        
                    </div>
                </form>

          </div>
      </div>
    </div>

    <script src="resources/js/ppe-inspection.js"></script>
</body>

</html>