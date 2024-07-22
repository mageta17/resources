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
                                <select name="front-view" id="front-view" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
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
                                <select name="rear-view" id="rear-view" class="form-select form-select-sm mb-1" aria-label=".form-select-lg example">
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
                                <label for="towbar">9. T</label>
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

                    </div>
                </form>

          </div>
      </div>
    </div>

    <script src="resources/js/ppe-inspection.js"></script>
</body>

</html>