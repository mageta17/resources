<?php
require('../resources/Api/Api/fpdf.php');
require "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query to get checklist data
    $query = "SELECT * FROM mv_check_list_360 WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Error in SQL query: ' . mysqli_error($connection));
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Create PDF
        $fpdf = new FPDF();
        $fpdf->AddPage();
        $fpdf->SetFont('Arial', 'B', 16);
        $fpdf->Cell(40, 10, 'Checklist Report');
        $fpdf->Ln(10);

        // Query to get images related to the checklist
        $query_images = "SELECT * FROM mv_checklist_360_images_rep WHERE checklistId = $id";
        $result_images = mysqli_query($connection, $query_images);
        
        if (mysqli_num_rows($result_images) > 0) {
            $fpdf->Ln(10); // Add some space before displaying images
            $fpdf->SetFont('Arial', 'B', 14);
            $fpdf->Cell(40, 10, 'Checklist Images:');
            $fpdf->Ln(10);

            $image_count = 0; // Counter to track images per row

            while ($image_row = mysqli_fetch_assoc($result_images)) {
                $category = ucfirst(str_replace('_', ' ', $image_row['category']));
                $imagePath = '../resources/images/mv_checklist_360_images/' . $image_row['img_name'];

                // Debugging log
                //error_log("Attempting to load image from path: $imagePath", 3, "image_loading.log");

                if (file_exists($imagePath) && is_readable($imagePath)) {
                    try {
                        // Display the category and result
                        $result_value = $row[$image_row['category']] ?? 'No data'; 
                        $fpdf->SetFont('Arial', 'B', 12);
                        $fpdf->Cell(40, 10, $category . ': ' . $result_value);

                        // Display the image
                        $fpdf->Image($imagePath, $fpdf->GetX() + 5, $fpdf->GetY(), 60, 40);

                        $image_count++;
                        
                        // If two images have been added, move to the next row
                        if ($image_count % 2 == 0) {
                            $fpdf->Ln(50); // Space after the image row
                        } else {
                            $fpdf->SetX($fpdf->GetX() + 70); // Move to the next column for the second image
                        }
                    } catch (Exception $e) {
                        //error_log("Error loading image: $imagePath - Exception: " . $e->getMessage(), 3, "image_loading.log");
                        $fpdf->Ln(10);
                        $fpdf->Cell(40, 10, $category . ': Image could not be loaded');
                    }
                } else {
                    // Log detailed error information to a file
                    error_log("Error: Image not found or inaccessible: $imagePath\n", 3, "image_loading.log");
                    $fpdf->Ln(10);
                    $fpdf->Cell(40, 10, $category . ': Image not available');
                }
            }

            // Ensure that the final image row is properly spaced
            if ($image_count % 2 != 0) {
                $fpdf->Ln(50);
            }
        }

        // Output the PDF directly for download
        $fpdf->Output('D', 'Checklist_Report_' . $id . '.pdf');
        exit;
    } else {
        echo "No data found.";
    }
} else {
    echo "ID not provided.";
}
