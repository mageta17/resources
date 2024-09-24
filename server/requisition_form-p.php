<?php 
  require 'db.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
        // Sanitize common fields
        $date = isset($_POST['date']) ? mysqli_real_escape_string($connection, $_POST['date']) : null;
        $project_name = isset($_POST['project_name']) ? mysqli_real_escape_string($connection, $_POST['project_name']) : null;
        $amountInwords = isset($_POST['amountInwords']) ? mysqli_real_escape_string($connection, $_POST['amountInwords']) : null;

        // Initialize arrays for descriptions, quantities, unit prices, and amounts
        $descriptions = [];
        $quantities = [];
        $unitPrices = [];
        $amounts = [];
        $count = 20; // Total number of fields 

        // looping the arrays
        for ($i = 1; $i <= $count; $i++) {
            $descriptions[$i] = isset($_POST['description' . $i]) ? mysqli_real_escape_string($connection, $_POST['description' . $i]) : null;
            $quantities[$i] = isset($_POST['quantity' . $i]) ? mysqli_real_escape_string($connection, $_POST['quantity' . $i]) : null;
            $unitPrices[$i] = isset($_POST['unitPrice' . $i]) ? mysqli_real_escape_string($connection, $_POST['unitPrice' . $i]) : null;
            $amounts[$i] = isset($_POST['amount' . $i]) ? mysqli_real_escape_string($connection, $_POST['amount' . $i]) : null;
        }

        // inserting data to the table 
        $query = "INSERT INTO requisition_form (date, project_name, amountInwords, 
                  description1, quantity1, unitPrice1, amount1,
                  description2, quantity2, unitPrice2, amount2,
                  description3, quantity3, unitPrice3, amount3,
                  description4, quantity4, unitPrice4, amount4,
                  description5, quantity5, unitPrice5, amount5,
                  description6, quantity6, unitPrice6, amount6,
                  description7, quantity7, unitPrice7, amount7,
                  description8, quantity8, unitPrice8, amount8,
                  description9, quantity9, unitPrice9, amount9,
                  description10, quantity10, unitPrice10, amount10,
                  description11, quantity11, unitPrice11, amount11,
                  description12, quantity12, unitPrice12, amount12,
                  description13, quantity13, unitPrice13, amount13,
                  description14, quantity14, unitPrice14, amount14,
                  description15, quantity15, unitPrice15, amount15,
                  description16, quantity16, unitPrice16, amount16,
                  description17, quantity17, unitPrice17, amount17,
                  description18, quantity18, unitPrice18, amount18,
                  description19, quantity19, unitPrice19, amount19,
                  description20, quantity20, unitPrice20, amount20) 
                  VALUES ('$date', '$project_name', '$amountInwords', 
                  '{$descriptions[1]}', '{$quantities[1]}', '{$unitPrices[1]}', '{$amounts[1]}',
                  '{$descriptions[2]}', '{$quantities[2]}', '{$unitPrices[2]}', '{$amounts[2]}',
                  '{$descriptions[3]}', '{$quantities[3]}', '{$unitPrices[3]}', '{$amounts[3]}',
                  '{$descriptions[4]}', '{$quantities[4]}', '{$unitPrices[4]}', '{$amounts[4]}',
                  '{$descriptions[5]}', '{$quantities[5]}', '{$unitPrices[5]}', '{$amounts[5]}',
                  '{$descriptions[6]}', '{$quantities[6]}', '{$unitPrices[6]}', '{$amounts[6]}',
                  '{$descriptions[7]}', '{$quantities[7]}', '{$unitPrices[7]}', '{$amounts[7]}',
                  '{$descriptions[8]}', '{$quantities[8]}', '{$unitPrices[8]}', '{$amounts[8]}',
                  '{$descriptions[9]}', '{$quantities[9]}', '{$unitPrices[9]}', '{$amounts[9]}',
                  '{$descriptions[10]}', '{$quantities[10]}', '{$unitPrices[10]}', '{$amounts[10]}',
                  '{$descriptions[11]}', '{$quantities[11]}', '{$unitPrices[11]}', '{$amounts[11]}',
                  '{$descriptions[12]}', '{$quantities[12]}', '{$unitPrices[12]}', '{$amounts[12]}',
                  '{$descriptions[13]}', '{$quantities[13]}', '{$unitPrices[13]}', '{$amounts[13]}',
                  '{$descriptions[14]}', '{$quantities[14]}', '{$unitPrices[14]}', '{$amounts[14]}',
                  '{$descriptions[15]}', '{$quantities[15]}', '{$unitPrices[15]}', '{$amounts[15]}',
                  '{$descriptions[16]}', '{$quantities[16]}', '{$unitPrices[16]}', '{$amounts[16]}',
                  '{$descriptions[17]}', '{$quantities[17]}', '{$unitPrices[17]}', '{$amounts[17]}',
                  '{$descriptions[18]}', '{$quantities[18]}', '{$unitPrices[18]}', '{$amounts[18]}',
                  '{$descriptions[19]}', '{$quantities[19]}', '{$unitPrices[19]}', '{$amounts[19]}',
                  '{$descriptions[20]}', '{$quantities[20]}', '{$unitPrices[20]}', '{$amounts[20]}')";

        // Execute the query
        if (mysqli_query($connection, $query)) {
            echo "Records inserted successfully.";
        } else {
            echo "ERROR: Could not able to execute $query. " . mysqli_error($connection);
        }
    }
}
?>
