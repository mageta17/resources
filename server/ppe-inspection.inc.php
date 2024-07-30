<?php 

require "db.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to handle errors and session
function handleError($message){
    $_SESSION['error'] = $message;
    header('Location: ../mv-360-inspection-form.php');
    exit();
}

if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}

if (isset($_POST['submit'])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {  

        mysqli_begin_transaction($connection);

        $front_view = mysqli_real_escape_string($connection, $_POST['front-view']);
        $rear_view = mysqli_real_escape_string($connection, $_POST['rear-view']);
        $left_side_view = mysqli_real_escape_string($connection, $_POST['left-side-view']);
        $right_side_view = mysqli_real_escape_string($connection, $_POST['right-side-view']);
        $loadbin_cover = mysqli_real_escape_string($connection, $_POST['loadbin-cover']);
        $windscreen = mysqli_real_escape_string($connection, $_POST['windscreen']);
        $license_disk = mysqli_real_escape_string($connection, $_POST['license-disk']);
        $towbar = mysqli_real_escape_string($connection, $_POST['towbar']);
        $lf_tyre_age = mysqli_real_escape_string($connection, $_POST['lf-tyre-age']);
        $lf_tyre_treat = mysqli_real_escape_string($connection, $_POST['lf-tyre-treat']);
        $rf_tyre_age = mysqli_real_escape_string($connection, $_POST['rf-tyre-age']);
        $rf_tyre_treat = mysqli_real_escape_string($connection, $_POST['rf-tyre-treat']);
        $lr_tyre_age = mysqli_real_escape_string($connection, $_POST['lr-tyre-age']);
        $lr_tyre_treat = mysqli_real_escape_string($connection, $_POST['lr-tyre-treat']);
        $rr_tyre_age = mysqli_real_escape_string($connection, $_POST['rr-tyre-age']);
        $rr_tyre_treat = mysqli_real_escape_string($connection, $_POST['rr-tyre-treat']);
        $rear_3pt_seatbelts = mysqli_real_escape_string($connection, $_POST['rear-3pt-seatbelts']);
        $driver_3pt_seatbelts = mysqli_real_escape_string($connection, $_POST['driver-3pt-seatbelts']);
        $co_driver = mysqli_real_escape_string($connection, $_POST['co-driver']);
        $bluetooth = mysqli_real_escape_string($connection, $_POST['bluetooth']);
        $odometer = mysqli_real_escape_string($connection, $_POST['odometer']);
        $service_book = mysqli_real_escape_string($connection, $_POST['service-book']);
        $emergence_triangle = mysqli_real_escape_string($connection, $_POST['emergence-triangle']);
        $first_aid_kit = mysqli_real_escape_string($connection, $_POST['first-aid-kit']);

        // Insert data into `mv_check_list_360
        $query = "INSERT INTO mv_check_list_360 (
            front_view, rear_view, left_side_view, right_side_view, 
            loadbin_cover, windscreen, license_disk, towbar, 
            lf_tyre_age, lf_tyre_treat, rf_tyre_age, rf_tyre_treat, 
            lr_tyre_age, lr_tyre_treat, rr_tyre_age, rr_tyre_treat, 
            rear_3pt_seatbelts, driver_3pt_seatbelts, co_driver, 
            bluetooth, odometer, service_book, emergence_triangle, 
            first_aid_kit
        ) VALUES (
            '$front_view', '$rear_view', '$left_side_view', '$right_side_view', 
            '$loadbin_cover', '$windscreen', '$license_disk', '$towbar', 
            '$lf_tyre_age', '$lf_tyre_treat', '$rf_tyre_age', '$rf_tyre_treat', 
            '$lr_tyre_age', '$lr_tyre_treat', '$rr_tyre_age', '$rr_tyre_treat', 
            '$rear_3pt_seatbelts', '$driver_3pt_seatbelts', '$co_driver', 
            '$bluetooth', '$odometer', '$service_book', '$emergence_triangle', 
            '$first_aid_kit'
        )";

        $result = mysqli_query($connection, $query);

        if ($result) {
            // Redirect to the history page
           // header("Location: ../mv-360-inspection-history.php");

            $checklist_id = mysqli_insert_id($connection);

            // Directory to save images
            $dir = "../resources/images/mv_checklist_360_images/";

            // Check if parent directory exists
            $parentDir = dirname($dir);
            if (!file_exists($parentDir)) {
                handleError("Parent directory does not exist: $parentDir");
            } else {
                // Create directory if it doesn't exist
                if (!file_exists($dir)) {
                    if (!mkdir($dir, 0777, true)) {
                        handleError("Failed to create directory: $dir");
                    }
                }    

                // Define allowed extensions
                $allowedExtensions = array('jpg', 'jpeg', 'png');
                $totalFileSize = 0; // Initialize total file size

                $files = array(
                    'front-view-upload' => 'front_view',
                    'rear-view-upload' => 'rear_view',
                    'left-side-view-upload' => 'left_side_view',
                    'right-side-view-upload' => 'right_side_view',
                    'loadbin-cover-upload' => 'loadbin_cover',
                    'windscreen-upload' => 'windscreen',
                    'license-disk-upload' => 'license_disk',
                    'towbar-upload' => 'towbar',
                    'lf-tyre-age-upload' => 'lf_tyre_age',
                    'lf-tyre-treat-upload' => 'lf_tyre_treat',
                    'rf-tyre-age-upload' => 'rf_tyre_age',
                    'rf-tyre-treat-upload' => 'rf_tyre_treat',
                    'lr-tyre-age-upload' => 'lr_tyre_age',
                    'lr-tyre-treat-upload' => 'lr_tyre_treat',
                    'rr-tyre-age-upload' => 'rr_tyre_age',
                    'rr-tyre-treat-upload' => 'rr_tyre_treat',
                    'rear-3pt-seatbelts-upload' => 'rear_3pt_seatbelts',
                    'driver-3pt-seatbelts-upload' => 'driver_3pt_seatbelts',
                    'co-driver-upload' => 'co_driver',
                    'bluetooth-upload' => 'bluetooth',
                    'odometer-upload' => 'odometer',
                    'service-book-upload' => 'service_book',
                    'emergence-triangle-upload' => 'emergence_triangle',
                    'first-aid-kit-upload' => 'first_aid_kit'
                );
                
                foreach ($files as $fileKey => $category) {
                    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] == UPLOAD_ERR_OK) {
                        $file = $_FILES[$fileKey];
                        $name = $file['name'];
                        $tmp_name = $file['tmp_name'];
                        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

                        // Check if the file type is allowed
                        if (!in_array($ext, $allowedExtensions)) {
                            handleError("File type not allowed for $name: $ext. Allowed types: " . implode(', ', $allowedExtensions));
                        }

                        // Add file size to total
                        $totalFileSize += $file['size'];

                        // Check if total file size exceeds 100 MB (104857600 bytes)
                        if ($totalFileSize > 104857600) {
                            handleError("Total file size exceeds the limit of 100 MB.");
                        }

                        // Sanitize category name for the file name
                        $categorySanitized = preg_replace("/[^a-zA-Z0-9]/", "_", $category);

                        // Create a unique file name including category
                        $imageFullName = $checklist_id . "." . $categorySanitized . "." . uniqid("", true) . "." . $ext;
                        $filePath = $dir . $imageFullName;

                        if (move_uploaded_file($tmp_name, $filePath)) {
                            // Resize image
                            $src = imagecreatefromstring(file_get_contents($filePath));
                            list($width, $height) = getimagesize($filePath);
                            $newWidth = 400;
                            $newHeight = ($height / $width) * $newWidth;
                            $newHeight = (int)$newHeight;
                            $tmp = imagecreatetruecolor($newWidth, $newHeight);
                            imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                            imagejpeg($tmp, $filePath, 100);

                            // Insert data into `mv_checklist_360_images_rep`
                            $sql = "INSERT INTO mv_checklist_360_images_rep (img_name, checklistId, category) 
                                    VALUES ('$imageFullName', '$checklist_id', '$categorySanitized')";
                            if (!mysqli_query($connection, $sql)) {
                                handleError("Error inserting image data: " . mysqli_error($connection));
                            }
                            imagedestroy($src);
                            imagedestroy($tmp);
                        } else {
                            handleError("Error moving uploaded file: $filePath");
                        }
                    } else {
                        // Handle the case where file is not uploaded or an upload error occurred
                        if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] != UPLOAD_ERR_NO_FILE) {
                            handleError("Error with file upload: " . $_FILES[$fileKey]['error']);
                        }
                    }
                }
                // end of transaction 
                mysqli_commit($connection);

                // Redirect to the history page
                header("Location: ../mv-360-inspection-history.php");
                exit();
            }
        } else {
            handleError("Error inserting data: " . mysqli_error($connection));
        }
    }
}
?>
