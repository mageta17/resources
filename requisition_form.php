<?php
    include 'server/db.php';
    include 'server/modules/staff-pages.php';
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      <?php include 'server/title.php' ?>
    </title>   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
        .form-control {
            background-color:#E8ECEF; /* Make input size medium */
        }
        .view-label {
            font-size: 1.0rem; 
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
        .upload {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #488aec;
            color: #ffffff;
            border-radius: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            font-size: 0.95rem;
            text-align: center;
        }
        .logo{
            width: 100px;
            height: auto;
            margin: 0 auto;
        }

        .upload-icon {
            margin-right: 5px;
            vertical-align: middle;
        }
        .inputs-style{
            border-radius: 5px;
        }
        .alert  {
            opacity: 0;
            transform: translateY(-20px);
        
        }
        .alert-success{
            animation: fadeIn 1s forwards;
        }
        .slide{
            animation: fadeIn 1s forwards;
            opacity: 0;
            transform: translateY(-20px);

        }

        @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
           }
        }
        @keyframes horizontal-shaking {
            to {
              opacity: 1;
              transform: translateY(0);
            }
            0% { transform: translateX(0) }
            25% { transform: translateX(5px) }
            50% { transform: translateX(-5px) }
            75% { transform: translateX(5px) }
            100% { transform: translateX(0) }
        }
        .alert-danger{
            animation: horizontal-shaking 0.2s ease-in-out forwards; 
            animation-iteration-count: 4;
        } 
        .image-preview img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border: 1px solid #ccc;
            padding: 5px;
            background-color: #f7f7f7;
        }


        #upload {
            display: none;
        }
        @media (max-width: 768px) {
            .form-item {
                flex: 1 1 100%;
                margin-right: 0;
            }

            .upload {
                text-align: left;
                padding: 0.55rem 1.0rem;
                margin-right: 0;
            }
        
            #upload {
                display: block; 
                margin-top: 10px; 
                width: 100%; 
                font-size: 0.8rem; 
                padding: 0.5rem;
                border: 1px solid #ccc; 
            }
        }
    </style>
</head>
    <div id="section" class="container-fluid mx-0 px-0">
        <?php
            menu5();
        ?>
        <div class="container mt-5">
            <div class="col-lg-8 mx-auto">
                <?php
                    if (isset($_SESSION['succes'])) {
                        echo '<div class="alert alert-success" style="text-align:center;><i class="fa-regular fa-circle-check"></i>'." Succes: " . $_SESSION['succes'] . '</div>';
                        unset($_SESSION['succes']); 
                    }
                    if (isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger" style="text-align:center;"><i class="fas fa-exclamation-circle"></i>'." Error: " . $_SESSION['error'] . '</div>';
                        unset($_SESSION['error']); 
                    }
                ?> 
                            <!-- form  -->
                <div class="form-container">
                    <form id="expenditureForm" method="POST" action="server/requisition_form-p.php"   enctype="multipart/form-data">
                           <!-- header section  -->
                        <div class="card-background-color row">
                            <div class="d-flex flex-wrap justify-content-center mb-4 card-background-color align-items-center inputs-style">
                                <div class="text-center w-100">
                                    <div class="logo mb-3 mt-2">
                                        <img src="resources/images/newl.webp" class="img-fluid" alt="Northern Engineering Works Logo">
                                    </div>
                                    <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                                    <h6>PURCHASE REQUEST FORM</h6>
                                </div>

                                <div class="col-md-6 mb-3 mt-4">
                                    <div class="form-group">
                                        <label for="Date">Date:-</label>
                                        <input type="date" class="form-control" id="date" name="date" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 mt-4">
                                    <div class="form-group">
                                        <label for="project_name">Project Name:-</label>
                                        <input type="text" class="form-control" id="project_name" name="project_name" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="location">Amount in Words:</label>
                                    <input type="text" class="form-control" id="amountInwords" name="amountInwords" value="" required>
                                </div>
                            </div>
                            <!-- end of header section  -->

                            <!-- start of expendicture cards  -->

                            <div id="expenditures">
                                 <div class="card" id="expenditure1">
                                    <!-- Expenditure 1 -->
                                    <div class="card-header">Expenditure 1: <i>Specify</i></div>
                                    <div class="card-body card-background-color">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="description1">Description</label>
                                                    <input type="text" class="form-control" id="description1" name="description1" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="quantity1">Quantity</label>
                                                    <input type="text" class="form-control" id="quantity1" name="quantity1" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="unitPrice1">Unit Price</label>
                                                    <input type="text" class="form-control" id="unitPrice1" name="unitPrice1" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="amount1">Amount</label>
                                                    <input type="text" class="form-control" id="amount1" name="amount1" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Expenditure 2 -->

                                 <div class="card" id="expenditure2">
                                    <div class="card-header">Expenditure 2: <i>Specify</i></div>
                                    <div class="card-body card-background-color">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="description2">Description</label>
                                                    <input type="text" class="form-control" id="description2" name="description2">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="quantity2">Quantity</label>
                                                    <input type="text" class="form-control" id="quantity2" name="quantity2">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="unitPrice2">Unit Price</label>
                                                    <input type="text" class="form-control" id="unitPrice2" name="unitPrice2">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="amount2">Amount</label>
                                                    <input type="text" class="form-control" id="amount2" name="amount2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Expenditure 3 -->

                                 <div class="card" id="expenditure3">
                                    <div class="card-header">Expenditure 3: <i>Specify</i></div>
                                    <div class="card-body card-background-color">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="description3">Description</label>
                                                    <input type="text" class="form-control" id="description3" name="description3">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="quantity3">Quantity</label>
                                                    <input type="text" class="form-control" id="quantity3" name="quantity3">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="unitPrice3">Unit Price</label>
                                                    <input type="text" class="form-control" id="unitPrice3" name="unitPrice3">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="amount3">Amount</label>
                                                    <input type="text" class="form-control" id="amount3" name="amount3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Expenditure 4 -->

                                 <div class="card" id="expenditure4">
                                    <div class="card-header">Expenditure 4: <i>Specify</i></div>
                                    <div class="card-body card-background-color">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="description4">Description</label>
                                                    <input type="text" class="form-control" id="description4" name="description4">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="quantity4">Quantity</label>
                                                    <input type="text" class="form-control" id="quantity4" name="quantity4">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="unitPrice4">Unit Price</label>
                                                    <input type="text" class="form-control" id="unitPrice4" name="unitPrice4">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="amount4">Amount</label>
                                                    <input type="text" class="form-control" id="amount4" name="amount4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Expenditure 5 -->

                                 <div class="card" id="expenditure5">
                                    <div class="card-header">Expenditure 5: <i>Specify</i></div>
                                    <div class="card-body card-background-color">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="description5">Description</label>
                                                    <input type="text" class="form-control" id="description5" name="description5">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="quantity5">Quantity</label>
                                                    <input type="text" class="form-control" id="quantity5" name="quantity5">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="unitPrice5">Unit Price</label>
                                                    <input type="text" class="form-control" id="unitPrice5" name="unitPrice5">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="amount5">Amount</label>
                                                    <input type="text" class="form-control" id="amount5" name="amount5">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- footer card  -->
                                <div class="card-footer card-footer-1  card-background-color" id="default-footer">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <span id="totalAmount">Total Amount in TZS/USD</span>
                                            <input class="form-control" type="text" name="totalAmount" id="totalAmount">
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <button id="add" class="btn btn-info">Add more</button>
                                            <button id="submit" type="submit" name="submit" class="btn btn-info">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- ends of all cards and it footer  -->
                            </div>
                        </div>  
                    </form>
                    <!-- end of the form  -->
                </div>
            </div>
        </div>
    </div>

   <script>
        document.addEventListener('DOMContentLoaded', function () {
        let expenditureCount = 5;
            const maxExpenditures = 20; // Set the limit to 20 cards

            document.getElementById('add').addEventListener('click', function (event) {
                event.preventDefault();

                // Check if the maximum limit is reached
                if (expenditureCount >= maxExpenditures) {
                    alert('You have reached the maximum limit of 20 expenditures.');
                    return; // Prevent adding more than 20 cards
                }
                    //  Hide the default footer 
                // const previousCard1 = document.getElementById('default-footer');
                // if (previousCard1) {
                //     const previousFooter1 = previousCard.querySelector('.card-footer');
                //     if (previousFooter) {
                //         previousFooter1.style.display = 'none';
                //     }
                // }

                // Hide the footer of the previous card added
                const previousCard = document.getElementById(`expenditure${expenditureCount}`);
                if (previousCard) {
                    const previousFooter = previousCard.querySelector('.card-footer');
                    if (previousFooter) {
                        previousFooter.style.display = 'none';
                    }
                }

                expenditureCount++;
                const newExpenditure = document.createElement('div');
                newExpenditure.classList.add('card');
                newExpenditure.id = `expenditure${expenditureCount}`;
                newExpenditure.innerHTML = `
                    <div class="card-header">Expenditure ${expenditureCount}: <i>Specify</i></div>
                    <div class="card-body card-background-color">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="description${expenditureCount}">Description</label>
                                    <input type="text" class="form-control" id="description${expenditureCount}" name="description${expenditureCount}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="quantity${expenditureCount}">Quantity</label>
                                    <input type="text" class="form-control" id="quantity${expenditureCount}" name="quantity${expenditureCount}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="unitPrice${expenditureCount}">Unit Price</label>
                                    <input type="text" class="form-control" id="unitPrice${expenditureCount}" name="unitPrice${expenditureCount}">
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="amount${expenditureCount}">Amount</label>
                                    <input type="text" class="form-control" id="amount${expenditureCount}" name="amount${expenditureCount}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer card-background-color">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <span id="totalAmount">Total Amount in TZS/USD</span>
                                <input class="form-control" type="text" name="totalAmount" id="totalAmount${expenditureCount}">
                            </div>
                            <div class="col-md-6 mt-4">
                                <button id="add${expenditureCount}" class="btn btn-info">Add more</button>
                                <button id="submit${expenditureCount}" type="submit" name="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>
                    </div>
                `;

                document.getElementById('expenditures').appendChild(newExpenditure);

                // Add event listener for the new "Add more" button in the new card
                document.getElementById(`add${expenditureCount}`).addEventListener('click', function (event) {
                    event.preventDefault();
                    document.getElementById(`add`).click(); // Trigger the original "Add more" button
                });
            });
        });
   </script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="resources/js/ppe-inspection.js"></script>
</body>
</html>


