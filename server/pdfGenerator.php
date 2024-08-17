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
        $fpdf->Ln(5);// from checklist header to checklist image

        // Query to get images related to the checklist
        $query_images = "SELECT * FROM mv_checklist_360_images_rep WHERE checklistId = $id";
        $result_images = mysqli_query($connection, $query_images);
        
        if (mysqli_num_rows($result_images) > 0) {
            $fpdf->Ln(10);
            $fpdf->SetFont('Arial', 'B', 14);
            $fpdf->Cell(40, 10, 'Checklist Images:');
            $fpdf->Ln(10);

            $image_count = 0; 

            while ($image_row = mysqli_fetch_assoc($result_images)) {
                $category = ucfirst(str_replace('_', ' ', $image_row['category']));
                $imagePath = '../resources/images/mv_checklist_360_images/' . $image_row['img_name'];

        
                if (file_exists($imagePath) && is_readable($imagePath)) {
                    try {
                        // $fpdf->Ln(10);// added 
                        $result_value = $row[$image_row['category']] ?? 'No data'; 
                        $fpdf->SetFont('Arial', 'B', 12);
                        $fpdf->Cell(40, 10, $category . ': ' . $result_value);
                        
                 
                        $fpdf->Image($imagePath, $fpdf->GetX() + -35, $fpdf->GetY() + 10, 60, 40);// here was the problem  in position image in x and y axis 

                        $image_count++;
                        
                        if ($image_count % 2 == 0) {
                            $fpdf->Ln(70); // 50
                        } else {
                            $fpdf->SetX($fpdf->GetX() + 70); 
                        }
                    } catch (Exception $e) {
                        $fpdf->Ln(10);
                        $fpdf->Cell(40, 10, $category . ': Image could not be loaded');
                    }
                } else {
                    error_log("Error: Image not found or inaccessible: $imagePath\n", 3, "image_loading.log");
                    $fpdf->Ln(10);
                    $fpdf->Cell(40, 10, $category . ': Image not available');
                }
            }
            if ($image_count % 2 != 0) {
                $fpdf->Ln(50);
            }
        }
        $fpdf->Output('D', 'Checklist_Report_' . $id . '.pdf');
        exit;
    } else {
        echo "No data found.";
    }
} else {
    echo "ID not provided.";
}
