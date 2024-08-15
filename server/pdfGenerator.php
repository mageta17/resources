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

        // Display data in PDF
        foreach ($row as $key => $value) {
            $fpdf->SetFont('Arial', '', 12);
            $fpdf->Cell(40, 10, ucfirst(str_replace('_', ' ', $key)) . ': ' . $value);
            $fpdf->Ln(8);
        }

        // Query to get images related to the checklist
        $query_images = "SELECT * FROM mv_checklist_360_images_rep WHERE checklistId = $id";
        $result_images = mysqli_query($connection, $query_images);
        
        if (mysqli_num_rows($result_images) > 0) {
            $fpdf->Ln(10); // Add some space before displaying images
            $fpdf->SetFont('Arial', 'B', 14);
            $fpdf->Cell(40, 10, 'Checklist Images:');
            $fpdf->Ln(10);
        
            while ($image_row = mysqli_fetch_assoc($result_images)) {
                $category = ucfirst(str_replace('_', ' ', $image_row['category']));
                $imagePath = '../resources/images/mv_checklist_360_images/' . $image_row['img_name'];
        
                if (file_exists($imagePath)) {
                    try {
                        $fpdf->SetFont('Arial', '', 12);
                        $fpdf->Cell(40, 10, $category);
                        $fpdf->Ln(5);
                        $fpdf->Image($imagePath, $fpdf->GetX(), $fpdf->GetY(), 60, 40);
                        $fpdf->Ln(45); // Space after the image
                    } catch (Exception $e) {
                        // Log or handle the error as needed
                        $fpdf->Cell(40, 10, $category . ': Image could not be loaded');
                        $fpdf->Ln(10);
                    }
                } else {
                    $fpdf->Cell(40, 10, $category . ': Image not available');
                    $fpdf->Ln(10);
                }
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
