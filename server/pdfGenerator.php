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
        $fpdf->Image('../resources/images/newl.jpg',$fpdf->GetX() + 90, $fpdf->GetY() + 0, 40, 22);
        // get the page width 
        $pageWidth = $fpdf->GetPageWidth();
        $cellWidth = $pageWidth - 20; // 10mm margin on each side
        // positioning the heading to the center 
        $fpdf->Ln(5);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->Cell($cellWidth, 10, 'NORTHERN ENGINEERING WORKS LIMITED', 0, 0, 'C');
        $fpdf->Ln(5);// from checklist header to checklist image
        $fpdf->Cell($cellWidth, 10, 'Motorvehicle 360 Inspection Checklist', 0, 0, 'C');

        // Query to get images related to the checklist
        $query_images = "SELECT * FROM mv_checklist_360_images_rep WHERE checklistId = $id";
        $result_images = mysqli_query($connection, $query_images);
        
        if (mysqli_num_rows($result_images) > 0) {
            $fpdf->Ln(10);

            $fpdf->SetFont('Arial', 'B', 14);
            $fpdf->SetTextColor(0, 0, 0); // set color
            $fpdf->Cell(0, 10, 'ID number: ' . $row['id'], 0, 1, 'L'); // Full width of the page
    
            $fpdf->Ln(5);
        
            $fpdf->SetFont('Arial', '', 12);
            $fpdf->SetTextColor(0, 0, 0); 
            $fpdf->Cell(0, 10, ' Inspector name: ' . $row['inspectorName'], 0, 1, 'L');
            
            $fpdf->Ln(5);
            
            $fpdf->Cell(0, 10, ' Location : ' . $row['location'], 0, 1, 'L');
            
            $fpdf->Ln(5);
    
            
            $fpdf->Cell(0, 10, ' Vehicle: ' . $row['vehicle'], 0, 1, 'L');
            
            $fpdf->Ln(5);
            
            $fpdf->Cell(0, 10, ' Last Service date : ' . $row['lastServiceDate'], 0, 1, 'L');
        
            $fpdf->Ln(10);
            
            // Add a header for Checklist Images
            $fpdf->SetFont('Arial', 'B', 14);
            $fpdf->SetTextColor(0, 0, 255); 

            $pageWidth = $fpdf->GetPageWidth();
            $cellWidth = $pageWidth - 20;
            $fpdf->Cell($cellWidth, 10, 'Checklist Images:', 0, 0, 'C');
            $fpdf->SetTextColor(0, 0, 0); 
            $fpdf->Ln(15);
             
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
                        // Cell($width, $height, $text, $border, $ln, $align, $fill, $link)
                        
                 
                        $fpdf->Image($imagePath, $fpdf->GetX() + -40, $fpdf->GetY() + 10, 80, 60);// here was the problem  in position image in x and y axis 

                        $image_count++;
                        
                        if ($image_count % 2 == 0) {
                            $fpdf->Ln(100); // 70 when image size is 60 by 40 
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
