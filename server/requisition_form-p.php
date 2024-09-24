<?php
  require 'db.php';
  session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
        // Collect the required data from the form 
        $date = mysqli_real_escape_string($connection, $_POST['date']);
        $project_name = mysqli_real_escape_string($connection, $_POST['project_name']);
        $amountInwords = mysqli_real_escape_string($connection, $_POST['amountInwords']);
        $total_amount = mysqli_real_escape_string($connection, $_POST['totalAmount1']);

        //Arrya preparation for dynamic data 
        $descriptions = [];
        $quantities = [];
        $unitPrices = [];
        $amounts = [];

        // Loop to collect data for 20 items
        for ($i = 1; $i <= 20; $i++) {
            $descriptions[$i] = isset($_POST['description' . $i]) ? mysqli_real_escape_string($connection, $_POST['description' . $i]) : NULL;
            $quantities[$i] = isset($_POST['quantity' . $i]) && $_POST['quantity' . $i] !== '' ? (int)$_POST['quantity' . $i] : NULL;
            $unitPrices[$i] = isset($_POST['unitPrice' . $i]) && $_POST['unitPrice' . $i] !== '' ? (float)$_POST['unitPrice' . $i] : NULL;
            $amounts[$i] = isset($_POST['amount' . $i]) && $_POST['amount' . $i] !== '' ? (float)$_POST['amount' . $i] : NULL;
        }

        // Dynamic data  handling by sql concantination 
        $sql = "INSERT INTO requisition_form (date, project_name, amountInwords, total_amount,";

        for ($i = 1; $i <= 20; $i++) {
            $sql .= "description$i, quantity$i, unitPrice$i, amount$i";
            if ($i < 20) {
                $sql .= ", ";// this add comma between filds 
            }
        }

        $sql .= ") VALUES ('$date', '$project_name', '$amountInwords', '$total_amount', ";

        for ($i = 1; $i <= 20; $i++) {
            $description = $descriptions[$i] !== NULL ? "'$descriptions[$i]'" : 'NULL';
            $quantity = $quantities[$i] !== NULL ? $quantities[$i] : 'NULL';
            $unitPrice = $unitPrices[$i] !== NULL ? $unitPrices[$i] : 'NULL';
            $amount = $amounts[$i] !== NULL ? $amounts[$i] : 'NULL';

            $sql .= "$description, $quantity, $unitPrice, $amount";
            if ($i < 20) {
                $sql .= ", ";
            }
        }

        $sql .= ")";

        // Execute the query
        if (mysqli_query($connection, $sql)) {
            $_SESSION['succes'] = "Thank you! Your form has been submitted successfully.";
            header('Location: ../requisition_form.php');
            exit();
        } else {
            $_SESSION['error'] = "Oops! Something went wrong while processing your form. Error: " . mysqli_error($connection);
            header('Location: ../requisition_form.php');
            exit();
        }
    }
}

