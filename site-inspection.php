<?php
    include 'server/db.php';
    include 'server/db.php';
    include 'server/modules/staff-pages.php';
    session_start();

    // Initialize variables
    $id = null;
    $section = 1; // Default to section 1
    $data = [];

    // Check if 'id' is set and is a valid numeric value
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = mysqli_real_escape_string($connection, $_GET['id']);
        unset($_SESSION['id']);
        $_SESSION['id'] = $id;

        // Perform the database query to ensure the ID exists
        $query = "SELECT * FROM site_inspection_permanent WHERE id = '$id'";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            // ID exists, proceed with processing
            $data = mysqli_fetch_assoc($result);
        } else {
            // ID does not exist, set $id to null
            $id = null;
            $data = [];
        }
    } else {
        // ID is not set or invalid, handle accordingly
        $id = null;
        $data = [];
    }

    // Get the section from the URL, default to 1 if not set
    if (isset($_GET['section']) && is_numeric($_GET['section'])) {
        $section = (int)$_GET['section'];

    }else {
        // ID is not set or invalid, handle accordingly
        $id = null;
        $data = [];
    }
    function show($message, $id, $connection) {
        // Query to get data based on ID
        $query = "SELECT * FROM site_inspection_permanent WHERE id = '$id'";
        $result = mysqli_query($connection, $query);
    
        // Initialize data as an empty array
        $data = [];
    
        // If the query is successful and the ID exists
        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result); // Fetch data as associative array
        }
    
        // Return the value for the requested message if it exists, otherwise return an empty string
        return isset($data[$message]) ? htmlspecialchars($data[$message]) : '';
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'server/styleLink.php'; ?>

    <link href="resources/style/user-checklist-view.css?v=2" rel="stylesheet">
    <link href="resources/style/staff.css?v=2" rel="stylesheet">
    
    <title>
      <?php include 'server/title.php'; ?>
    </title>
    <style>
        .logo{
            width: 100px;
            height: auto;
            margin: 0 auto;
        }
        .row {
            display: flex;
            flex-wrap: wrap;  /* Wrap columns on smaller screens */
            gap: 20px;        /* Space between columns */
        }
        .form-control {
            background-color:#E8ECEF; /* Make input size medium */
            border-radius: 4px;
            border: 1px solid #ced4da;
            width: 100%;
            margin-left: 10;
            
        }
        .sign {
        display: block;
        margin: 0 auto; /* Center the picture */
        max-width: 100%; /* Ensure the picture does not exceed its container width */
        }

        .sign-img{
            width: 50%;
            height: auto;
            border: 2px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        textarea{
            width: 100%;
            height: 100px;
            margin-top: 5px;
            padding: 10px;
            border-radius:
            4px; border: 
            1px solid #ced4da;
            background-color:#E8ECEF;
        }
        .page-item.active .page-link {
            background-color: #007bff;
            color: white;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 10px; /* Reduced padding for smaller screens */
            }
            
            .col-md-5 {
                width: calc(50% - 20px);    /* Full width columns on small screens */
                margin-bottom: 15px; /* Space between columns on small screens */
            }
        }
        @media (min-width: 554px) and (max-width: 754px) {
            .custom-input-col {
                width: calc(30% - 20px);
                margin: 10px; /* Optional: Adjust the spacing between columns */
            }
        }

        /* Styles for larger screens */
        @media (min-width: 769px) {
            .container {
                padding: 0 30px; /* Increased padding for larger screens */
            }
            
            .col-md-5 {
                width: calc(50% - 20px); /* Two columns with space between */
            }
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

    </style>
</head>
<body>
<div id="section" class="container-fluid mx-0 px-0">        
            <?php
                menu5();
            ?> 
            <section id="section-1">
            
               <form action="server/site-inspection-p.php" method="POST" enctype="multipart/form-data" id="1">
                <div class="row justify-content-center mt-5">   
                    <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
                        <div class="text-center">
                            <div class="logo mb-3">
                                <img  src="resources/images/newl.webp" class="img-fluid  text-center" alt="Northern Engineering Works Logo">
                            </div>
                            <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                            <h6>HEALTH, SAFETY & ENVIRONMENT SITE INSPECTION CHECKLIST </h6>
                        </div>
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
                        <input type="hidden" name="sectionId" value="1">
                        <div class="row d-flex flex-wrap justify-content-center mb-4 card-background-color align-items-center inputs-style">
                            <div class="col-4 col-md-5 mb-3 mt-4 d-flex align-items-center">
                                <div class="form-group w-100">
                                    <label for="vehicle">Site Name:</label>
                                    <input type="text" class="form-control" id="sitename" name="sitename" value="<?php echo show('site_name', $id, $connection); ?>" required>
                                </div>
                            </div>
                            <div class="col-4 col-md-5 mb-3 mt-4 d-flex align-items-center">
                                <div class="form-group w-100">
                                    <label for="lastServiceDate">Site ID:</label>
                                    <input type="text" class="form-control" id="siteid" name="siteid" value="<?php echo show('site_id', $id, $connection); ?>" required>
                                </div>
                            </div>
                            <div class="col-4 col-md-5 mb-3 d-flex align-items-center">
                                <div class="form-group w-100">
                                    <label for="location">Region:</label>
                                    <input type="text" class="form-control" id="region" name="region" value="<?php echo show('region', $id, $connection); ?>" required>
                                </div>
                            </div>
                            <div class="col-4 col-md-5 mb-3 d-flex align-items-center">
                                <div class="form-group w-100">
                                    <label for="inspectorDate">Last Service  Date:</label>
                                    <input type="date" class="form-control" id="inspectordate" name="inspectordate" value="<?php echo show('inspection_date', $id, $connection); ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 col-md-5 mb-3 ms-2">
                            <div class="form-group w-70"style="width:80%;">
                                <label for="inspectorname">Inspector: (Name)</label>
                                <input type="text" class="form-control" id="inspectorname" name="inspectorname" value="<?php echo show('inspector_name', $id, $connection); ?>" required>
                            </div>
                        </div>
                        <div class="container">
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label  for="general-item" style="font-weight: bold;"><h2>Description</h2></label>
                                <br>
                                <span class="mt-2">From general item, if the answer is "NO" please make a comment.</span>
                                <span>This form consists of eight pages. Make sure you fill in all fields on each page before submitting the form.</span>
                            </div>

                            <h4>1. General Observations</h4>
                            <div class="flex-container shadow-sm" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                    <span>Do the staff/contractors (where applicable) adhere to PPE requirements while accessing the site?</span>
                                    <br>
                                    <label for="response1" style="font-weight: bold; margin-top: 10px;">Response</label>
                                    <select name="response1" id="response1" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response1', 'commentAction1', 'descriptionAction1')" required>
                                        <option value="" default>Choose</option>
                                        <option value="Yes"<?php echo (show('response1', $id, $connection) == 'Yes') ? 'selected' : ''; ?>>Yes</option>
                                        <option value="No"<?php echo (show('response1', $id, $connection) == 'No') ? 'selected' : ''; ?>>No</option>
                                        <option value="N/A" <?php echo (show('response1', $id, $connection) == 'N/A') ? 'selected' : ''; ?>>N/A</option>
                                    </select>
                                </div>

                                <div class="action" id="commentAction1" style="display: none; width: 100%; margin-top: 20px;">
                                    <label for="actiontextarea1" style="font-weight: bold;">COMMENT</label>
                                    <textarea name="actiontextarea1" id="actiontextarea1"><?php echo show('comment1', $id, $connection); ?></textarea>
                                </div>

                                <div id="descriptionAction1" style="width: 100%; display: none; margin-top: 20px;">
                                    <label for="descriptiontextarea1" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                    <textarea name="descriptiontextarea1" id="descriptiontextarea1"><?php echo show('action1', $id, $connection); ?></textarea>
                                </div>
                            </div>

                            <div class="flex-container mt-4 shadow-sm" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                    <span>Is the site secured by a lock?</span>
                                    <br>
                                    <label for="response2" style="font-weight: bold; margin-top: 10px;">Response</label>
                                    <select name="response2" id="response2" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response2', 'commentAction2', 'descriptionAction2')" required>
                                        <option value="" default>Choose</option>
                                        <option value="Yes"<?php echo(show('response2', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                        <option value="No" <?php echo(show('response2', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                        <option value="N/A" <?php echo(show('response2', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                    </select>
                                </div>

                                <div class="action" id="commentAction2" style="display: none; width: 100%; margin-top: 20px;">
                                    <label for="actiontextarea2" style="font-weight: bold;">COMMENT</label>
                                    <textarea name="actiontextarea2" id="actiontextarea2"><?php echo show('comment2', $id, $connection); ?></textarea>
                                </div>

                                <div id="descriptionAction2" style="width: 100%; display: none; margin-top: 20px;">
                                    <label for="descriptiontextarea2" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                    <textarea name="descriptiontextarea2" id="descriptiontextarea2"><?php  echo show('action2', $id, $connection);?></textarea>
                                </div>
                            </div>

                            <div class="flex-container mt-4 shadow-sm" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                    <span>Is there a site Logbook?</span>
                                    <br>
                                    <label for="response3" style="font-weight: bold; margin-top: 10px;">Response</label>
                                    <select name="response3" id="response3" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response3', 'commentAction3', 'descriptionAction3')" required>
                                        <option value="" default>Choose</option>
                                        <option value="Yes"<?php echo(show('response3', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                        <option value="No"<?php echo(show('response3', $id, $connection)== 'No')? 'selected': ''; ?>>No</option>
                                        <option value="N/A"<?php echo(show('response3', $id, $connection)== 'N/A')? 'selected': ''; ?>>N/A</option>
                                    </select>
                                </div>

                                <div class="action" id="commentAction3" style="display: none; width: 100%; margin-top: 20px;">
                                    <label for="actiontextarea3" style="font-weight: bold;">COMMENT</label>
                                    <textarea name="actiontextarea3" id="actiontextarea3"><?php echo show('comment3', $id, $connection);?></textarea>
                                </div>

                                <div id="descriptionAction3" style="width: 100%; display: none; margin-top: 20px;">
                                    <label for="descriptiontextarea3" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                    <textarea name="descriptiontextarea3" id="descriptiontextarea3"><?php echo show('action3', $id, $connection);?></textarea>
                                </div>
                            </div>

                            <div class="flex-container mt-4 shadow-sm" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                    <span>Aggregates  evenly distributed?</span>
                                    <br>
                                    <label for="response4" style="font-weight: bold; margin-top: 10px;">Response</label>
                                    <select name="response4" id="response4" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response4', 'commentAction4', 'descriptionAction4')" required>
                                        <option value="" default>Choose</option>
                                        <option value="Yes"<?php echo(show('response4', $id, $connection)== 'Yes')? 'selected': ''; ?>>Yes</option>
                                        <option value="No" <?php echo(show('response4', $id, $connection)== 'No')? 'selected': ''; ?>>No</option>
                                        <option value="N/A" <?php echo(show('response4', $id, $connection)== 'N/A')? 'selected': ''; ?>>N/A</option>
                                    </select>
                                </div>

                                <div class="action" id="commentAction4" style="display: none; width: 100%; margin-top: 20px;">
                                    <label for="actiontextarea4" style="font-weight: bold;">COMMENT</label>
                                    <textarea name="actiontextarea4" id="actiontextarea4"><?php echo show('comment4', $id, $connection); ?></textarea>
                                </div>

                                <div id="descriptionAction4" style="width: 100%; display: none; margin-top: 20px;">
                                    <label for="descriptiontextarea4" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                    <textarea name="descriptiontextarea4" id="descriptiontextarea4"><?php  echo show('action4', $id, $connection);?></textarea>
                                </div>
                            </div>
                            <div class="flex-container mt-4 shadow-sm" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                    <span>Anti-weed membrane Available?</span>
                                    <br>
                                    <label for="response6" style="font-weight: bold; margin-top: 10px;">Response</label>
                                    <select name="response6" id="response6" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response6', 'commentAction6', 'descriptionAction6')" required>
                                        <option value="" default>Choose</option>
                                        <option value="Yes"<?php echo (show('response6', $id, $connection) == 'Yes')? 'selected': '';?>>Yes</option>
                                        <option value="No"<?php echo (show('response6', $id, $connection) == 'No')? 'selected': '';?>>No</option>
                                        <option value="N/A"<?php echo (show('response6', $id, $connection) == 'N/A')? 'selected': '';?>>N/A</option>
                                    </select>
                                </div>

                                <div class="action" id="commentAction6" style="display: none; width: 100%; margin-top: 20px;">
                                    <label for="actiontextarea6" style="font-weight: bold;">COMMENT</label>
                                    <textarea name="actiontextare6" id="actiontextarea6"><?php echo show('comment6', $id, $connection); ?></textarea>
                                </div>

                                <div id="descriptionAction6" style="width: 100%; display: none; margin-top: 20px;">
                                    <label for="descriptiontextarea6" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                    <textarea name="descriptiontextarea6" id="descriptiontextarea6"><?php echo show('action6', $id, $connection); ?></textarea>
                                </div>
                                <input type="submit" class="btn btn-info mt-4" name="submit" value="Save">
                            </div>
                            <nav aria-label="Page navigation example">
                                       <ul class="pagination justify-content-center mt-5" style="color:#E8ECEF;">
                                            <li class="page-item" id="prevButton">
                                                <a class="page-link disabled" href="#" onclick="previousPage()">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#" onclick="showSection(1)">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#" onclick="showSection(2)">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#" onclick="showSection(3)">3</a></li>
                                            <li class="page-item disabled"><a class="page-link" href="#" onclick="showSection(3)">-</a></li>
                                            <li class="page-item"><a class="page-link" href="#" onclick="showSection(8)">8</a></li>
                                            <!-- Add more page links as needed -->
                                            <li class="page-item" id="nextButton">
                                                <a class="page-link" href="#" onclick="nextPage()">Next</a>
                                            </li>
                                        </ul>
                                </nav>
                        </div>
                    </div>
                </form>
            </section>
        <!-- section two  -->
        <section id="section-2" style="display:none;">
          <form action="server/site-inspection-p.php" method="POST" enctype="multipart/form-data" id="2">
           <input type="hidden" name="sectionId" value="2">
            <div class="row justify-content-center  mt-5">   
                    <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
                            <div class="text-center">
                                <div class="logo mb-3">
                                    <img  src="resources/images/newl.webp" class="img-fluid  text-center" alt="Northern Engineering Works Logo">
                                </div>
                                <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                                <h6>HEALTH, SAFETY & ENVIRONMENT SITE INSPECTION CHECKLIST </h6>
                            </div>
                            <?php
                                    if (isset($_SESSION['succes2'])) {
                                        echo '<div class="alert alert-success" style="text-align:center;><i class="fa-regular fa-circle-check"></i>'." Succes: " . $_SESSION['succes2'] . '</div>';
                                        unset($_SESSION['succes2']); 
                                    }
                                    if (isset($_SESSION['error2'])) {
                                        echo '<div class="alert alert-danger" style="text-align:center;"><i class="fas fa-exclamation-circle"></i>'." Error: " . $_SESSION['error2'] . '</div>';
                                        unset($_SESSION['error2']); 
                                    }
                                ?>
                    <div class="container" style="margin-top: 50px;">
                            <div class="form-group" style="margin-bottom: 20px;">
                                    <label for="general-item" style="font-weight: bold;"><h2>Description</h2></label>
                                    <br>
                                    <span>From general item, if the answer is "NO" please make a comment</span>
                            </div>
                                    <h4>2. Tower Safety Structure</h4>

                            <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Lifeline / ladder and cage available?</span>
                                        <br>
                                        <label for="response7" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response7" id="response7" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response7', 'commentAction7', 'descriptionAction7')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes"<?php echo(show('response7', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No"<?php echo(show('response7', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A"<?php echo(show('response7', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction7" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea7" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea7" id="actiontextarea7"><?php echo show('comment7', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction7" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea7" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea7" id="descriptiontextarea7"><?php echo show('action7', $id, $connection);?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Guard rails/handrails available for rooftops?</span>
                                        <br>
                                        <label for="response8" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response8" id="response8" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response8', 'commentAction8', 'descriptionAction8')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response8', $id, $connection)== 'Yes')? 'selected': null; ?>>Yes</option>
                                            <option value="No"<?php echo (show('response8', $id, $connection)== 'No')? 'selected': null; ?>>No</option>
                                            <option value="N/A"<?php echo (show('response8', $id, $connection)== 'N/A')? 'selected': null; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction8" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea8" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea8" id="actiontextarea8"><?php echo show('comment8', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction8" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea8" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea8" id="descriptiontextarea8"><?php echo show('action8', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Is the climbing ladder securely mounted and straight?</span>
                                        <br>
                                        <label for="response9" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response9" id="response9" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response9', 'commentAction9', 'descriptionAction9')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php  echo (show('response9', $id, $connection) == 'Yes')? 'selected': '';?>>Yes</option>
                                            <option value="No"<?php  echo (show('response9', $id, $connection) == 'No')? 'selected': '';?>>No</option>
                                            <option value="N/A"<?php  echo (show('response9', $id, $connection) == 'N/A')? 'selected': '';?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction9" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea9" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea9" id="actiontextarea9"><?php echo show('comment9', $id, $connection);?></textarea>
                                    </div>

                                    <div id="descriptionAction9" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea9" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea9" id="descriptiontextarea9"><?php echo show('action9', $id, $connection); ?></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-info mt-4" name="submit" value="Save">
                                </div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-5" style="color:#E8ECEF;">
                                        <li class="page-item" id="prevButton">
                                            <a class="page-link" href="#" onclick="previousPage()">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(1)">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(2)">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(3)">3</a></li>
                                        <li class="page-item disabled"><a class="page-link" href="#" onclick="showSection(3)">-</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(8)">8</a></li>
                                        <!-- Add more page links as needed -->
                                        <li class="page-item" id="nextButton">
                                            <a class="page-link" href="#" onclick="nextPage()">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                        </div>
                     </div>
                  </div>
              </form>
            </section>
        <!-- section 3 -->
            <section id="section-3" style="display:none;">
        <form action="server/site-inspection-p.php" method="POST" enctype="multipart/form-data" id="3">
            <input type="hidden" name="sectionId" value="3">
            <div class="row justify-content-center  mt-5">   
                    <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
                            <div class="text-center">
                                <div class="logo mb-3">
                                    <img  src="resources/images/newl.webp" class="img-fluid  text-center" alt="Northern Engineering Works Logo">
                                </div>
                                <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                                <h6>HEALTH, SAFETY & ENVIRONMENT SITE INSPECTION CHECKLIST </h6>
                            </div>
                            <?php
                                    if (isset($_SESSION['succes3'])) {
                                        echo '<div class="alert alert-success" style="text-align:center;><i class="fa-regular fa-circle-check"></i>'." Succes: " . $_SESSION['succes3'] . '</div>';
                                        unset($_SESSION['succes3']); 
                                    }
                                    if (isset($_SESSION['error3'])) {
                                        echo '<div class="alert alert-danger" style="text-align:center;"><i class="fas fa-exclamation-circle"></i>'." Error: " . $_SESSION['error3'] . '</div>';
                                        unset($_SESSION['error3']); 
                                    }
                                ?>
                    <div class="container" style="margin-top: 50px;">
                            <div class="form-group" style="margin-bottom: 20px;">
                                    <label for="general-item" style="font-weight: bold;"><h2>Description</h2></label>
                                    <br>
                                    <span>From general item, if the answer is "NO" please make a comment</span>
                            </div>
                                    <h4>3. Environmental compliance </h4>

                            <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Is the site environment good and NO spillage/leak of hydrocarbons?</span>
                                        <br>
                                        <label for="response10" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response10" id="response10" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response10', 'commentAction10', 'descriptionAction10')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response10', $id, $connection) == 'Yes')? 'selected': null;  ?>>Yes</option>
                                            <option value="No"<?php echo (show('response10', $id, $connection) == 'No')? 'selected': null;  ?>>No</option>
                                            <option value="N/A"<?php echo (show('response10', $id, $connection) == 'N/A')? 'selected': null;  ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction10" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea10" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea10" id="actiontextarea10"><?php echo show('comment10', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction10" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea10" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea10" id="descriptiontextarea10"><?php echo show('action10', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Is the site/area generally clean and tidy?</span>
                                        <br>
                                        <label for="response11" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response11" id="response11" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response11', 'commentAction11', 'descriptionAction11')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php  echo (show('response11', $id, $connection) == 'Yes')? 'selected':null; ?>>Yes</option>
                                            <option value="No"<?php  echo (show('response11', $id, $connection) == 'No')? 'selected':null; ?>>No</option>
                                            <option value="N/A"<?php  echo (show('response11', $id, $connection) == 'N/A')? 'selected':null; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction11" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea11" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea11" id="actiontextarea11"><?php echo show('comment11', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction11" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea11" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea11" id="descriptiontextarea11"><?php  echo show('action11', $id, $connection);?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>No unattended equipments left onsite?</span>
                                        <br>
                                        <label for="response12" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response12" id="response12" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response12', 'commentAction12', 'descriptionAction12')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response12', $id, $connection) == 'Yes')? 'selected': null;?>>Yes</option>
                                            <option value="No"<?php echo (show('response12', $id, $connection) == 'No')? 'selected': null;?>>No</option>
                                            <option value="N/A"<?php echo (show('response12', $id, $connection) == 'N/A')? 'selected': null;?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction12" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea12" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea12" id="actiontextarea12"><?php echo show('comment12', $id, $connection); ?>
                                        </textarea>
                                    </div>

                                    <div id="descriptionAction12" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea12" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea12" id="descriptiontextarea12"><?php echo show('action12', $id, $connection); ?></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-info mt-4" name="submit" value="Save">
                                </div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-5" style="color:#E8ECEF;">
                                        <li class="page-item" id="prevButton">
                                            <a class="page-link" href="#" onclick="previousPage()">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(2)">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(3)">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(4)">4</a></li>
                                        <li class="page-item disabled"><a class="page-link" href="#" onclick="showSection(3)">-</a></li>
                                        <!-- Add more page links as needed -->
                                        <li class="page-item" id="nextButton">
                                            <a class="page-link" href="#" onclick="nextPage()">Next</a>
                                        </li>
                                    </ul>
                               </nav>
                        </div>
                    </div>
                 </div>
              </form>
            </section>
       <!-- section 4 -->
            <section id="section-4" style="display:none;">
        <form action="server/site-inspection-p.php" method="POST" enctype="multipart/form-data" id="4">
            <input type="hidden" name="sectionId" value="4">
            <div class="row justify-content-center  mt-5">   
                    <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
                            <div class="text-center">
                                <div class="logo mb-3">
                                    <img  src="resources/images/newl.webp" class="img-fluid  text-center" alt="Northern Engineering Works Logo">
                                </div>
                                <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                                <h6>HEALTH, SAFETY & ENVIRONMENT SITE INSPECTION CHECKLIST </h6>
                            </div>
                            <?php
                                    if (isset($_SESSION['succes4'])) {
                                        echo '<div class="alert alert-success" style="text-align:center;><i class="fa-regular fa-circle-check"></i>'." Succes: " . $_SESSION['succes4'] . '</div>';
                                        unset($_SESSION['succes4']); 
                                    }
                                    if (isset($_SESSION['error4'])) {
                                        echo '<div class="alert alert-danger" style="text-align:center;"><i class="fas fa-exclamation-circle"></i>'." Error: " . $_SESSION['error4'] . '</div>';
                                        unset($_SESSION['error4']); 
                                    }
                                ?>
                    <div class="container" style="margin-top: 50px;">
                            <div class="form-group" style="margin-bottom: 20px;">
                                    <label for="general-item" style="font-weight: bold;"><h2>Description</h2></label>
                                    <br>
                                    <span>From general item, if the answer is "NO" please make a comment</span>
                            </div>
                                    <h4>4. Fire Extingusher </h4>

                            <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Fire extinguishers posted?</span>
                                        <br>
                                        <label for="response13" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response13" id="response13" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response13', 'commentAction13', 'descriptionAction13')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response13', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No"<?php echo (show('response13', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A"<?php echo (show('response13', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction13" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea13" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea13" id="actiontextarea13"><?php echo show('comment13', $id, $connection);?></textarea>
                                    </div>

                                    <div id="descriptionAction13" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea13" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea13" id="descriptiontextarea13"><?php echo show('action13', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Has the fire extinguisher expired? (If the answer is 'no', please provide the expiration date in the description below.)</span>
                                        <br>
                                        <label for="response14" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response14" id="response14" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response14', 'commentAction14', 'descriptionAction14')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response14', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No"<?php echo (show('response14', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A"<?php echo (show('response14', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction14" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea14" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea14" id="actiontextarea14"><?php  echo show('comment14', $id, $connection);?></textarea>
                                    </div>

                                    <div id="descriptionAction14" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea14" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea14" id="descriptiontextarea14"><?php echo show('action14', $id, $connection) ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Is the fire extinguisher in good working condition, with no rust or malfunctioning parts?</span>
                                        <br>
                                        <label for="response15" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response15" id="response15" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response15', 'commentAction15', 'descriptionAction15')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php  echo (show('response15', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No" <?php  echo (show('response15', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A" <?php  echo (show('response15', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction15" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea15" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea15" id="actiontextarea15"><?php echo show('comment15', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction15" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea15" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea15" id="descriptiontextarea15"><?php echo show('action15', $id, $connection); ?></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-info mt-4" name="submit" value="Save">
                                </div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-5" style="color:#E8ECEF;">
                                        <li class="page-item" id="prevButton">
                                            <a class="page-link" href="#" onclick="previousPage()">Previous</a>
                                        </li>
                                        <!-- <li class="page-item"><a class="page-link" href="#" onclick="showSection(2)">2</a></li> -->
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(3)">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(4)">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(5)">5</a></li>
                                        <li class="page-item disabled"><a class="page-link" href="#" onclick="showSection(3)">-</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(8)">8</a></li>
                                        <li class="page-item" id="nextButton">
                                            <a class="page-link" href="#" onclick="nextPage()">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                         </div>
                     </div>
                  </div>
               </form>
            </section>
        <!-- section 5 -->
            <section id="section-5" style="display:none;">
        <form action="server/site-inspection-p.php" method="POST" enctype="multipart/form-data" id="5">
            <div class="row justify-content-center  mt-5">   
                <input type="hidden" name="sectionId" value="5">
                    <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
                            <div class="text-center">
                                <div class="logo mb-3">
                                    <img  src="resources/images/newl.webp" class="img-fluid  text-center" alt="Northern Engineering Works Logo">
                                </div>
                                <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                                <h6>HEALTH, SAFETY & ENVIRONMENT SITE INSPECTION CHECKLIST </h6>
                            </div>
                            <?php
                                    if (isset($_SESSION['succes5'])) {
                                        echo '<div class="alert alert-success" style="text-align:center;><i class="fa-regular fa-circle-check"></i>'." Succes: " . $_SESSION['succes5'] . '</div>';
                                        unset($_SESSION['succes5']); 
                                    }
                                    if (isset($_SESSION['error5'])) {
                                        echo '<div class="alert alert-danger" style="text-align:center;"><i class="fas fa-exclamation-circle"></i>'." Error: " . $_SESSION['error5'] . '</div>';
                                        unset($_SESSION['error5']); 
                                    }
                                ?>
                    <div class="container" style="margin-top: 50px;">
                            <div class="form-group" style="margin-bottom: 20px;">
                                    <label for="general-item" style="font-weight: bold;"><h2>Description</h2></label>
                                    <br>
                                    <span>From general item, if the answer is "NO" please make a comment</span>
                            </div>
                                    <h4>5. Site signages ( 5 Sets) </h4>

                            <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>AC Mains Voltage Signs</span>
                                        <picture  class="sign">
                                            <source srcset="" type="image/svg+xml">
                                            <img  style="width:50%; height: auto;" src="resources/images/Ac.jpg" class="img-fluid img-thumbnail sign-img" alt="ac-image">
                                        </picture>
                                        <br>
                                        <label for="response17" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response17" id="response17" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response17', 'commentAction17', 'descriptionAction17')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response17', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No"<?php echo (show('response17', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A"<?php echo (show('response17', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction17" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea17" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea17" id="actiontextarea17"><?php  echo show('comment17', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction17" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea17" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea17" id="descriptiontextarea17"><?php echo show('action17', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>General warning sign (PPE signs available)</span>
                                        <picture  class="sign">
                                            <source srcset="" type="image/svg+xml">
                                            <img  style="width:50%; height: auto;" src="resources/images/General warning.jpg" class="img-fluid img-thumbnail sign-img" alt="General warning">
                                        </picture>
                                        <br>
                                        <label for="response18" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response18" id="response18" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response18', 'commentAction18', 'descriptionAction18')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response18', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No"<?php echo (show('response18', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A"<?php echo (show('response18', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction18" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea18" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea18" id="actiontextarea18"><?php echo show('comment18', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction18" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea18" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea18" id="descriptiontextarea18"><?php echo show('action18', $id, $connection); ?></textarea>
                                    </div>
                                </div>
                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>RF Radiation notice Sign</span>
                                        <picture class="sign">
                                            <source srcset="" type="image/svg+xml">
                                            <img src="resources/images/rf.jpg" class="img-fluid img-thumbnail sign-img" alt="rf-image">
                                        </picture>
                                        <br>
                                        <label for="response14" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response19" id="response19" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response19', 'commentAction19', 'descriptionAction19')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response19', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No" <?php echo (show('response19', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A" <?php echo (show('response19', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction19" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea19" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea19" id="actiontextarea19"><?php echo show('comment19', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction19" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea19" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea19" id="descriptiontextarea19"><?php echo show('action19', $id, $connection);  ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span> RF Guidance notice sign</span>
                                        <picture class="sign">
                                            <source srcset="" type="image/svg+xml">
                                            <img src="resources/images/rfg.png" class="img-fluid img-thumbnail sign-img" alt="rfg-image">
                                        </picture>
                                        <br>
                                        <label for="response20" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response20" id="response20" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response20', 'commentAction20', 'descriptionAction20')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response20', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No"<?php echo (show('response20', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A"<?php echo (show('response20', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction20" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea20" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea20" id="actiontextarea20"><?php echo show('comment20', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction20" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea20" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea20" id="descriptiontextarea20"><?php echo show('action20', $id, $connection); ?></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-info mt-4" name="submit" value="Save">
                                </div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-5" style="color:#E8ECEF;">
                                        <li class="page-item" id="prevButton">
                                            <a class="page-link" href="#" onclick="previousPage()">Previous</a>
                                        </li>
                                        <!-- <li class="page-item"><a class="page-link" href="#" onclick="showSection(3)">3</a></li> -->
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(4)">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(5)">5</a></li>
                                        <li class="page-item "><a class="page-link" href="#" onclick="showSection(6)">6</a></li>
                                        <li class="page-item disabled"><a class="page-link" href="#" onclick="showSection(3)">-</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(8)">8</a></li>
                                        <!-- Add more page links as needed -->
                                        <li class="page-item" id="nextButton">
                                            <a class="page-link" href="#" onclick="nextPage()">Next</a>
                                        </li>
                                    </ul>
                             </nav>
                        </div>
                     </div>
                 </div>
              </form>
            </section>
         <!-- section 6  -->
            <section id="section-6" style="display:none;">
        <form action="server/site-inspection-p.php" method="POST" enctype="multipart/form-data" id="6">
            <input type="hidden" name="sectionId" value="6">
            <div class="row justify-content-center  mt-5">   
                    <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
                            <div class="text-center">
                                <div class="logo mb-3">
                                    <img  src="resources/images/newl.webp" class="img-fluid  text-center" alt="Northern Engineering Works Logo">
                                </div>
                                <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                                <h6>HEALTH, SAFETY & ENVIRONMENT SITE INSPECTION CHECKLIST </h6>
                            </div>
                            <?php
                                    if (isset($_SESSION['succes6'])) {
                                        echo '<div class="alert alert-success" style="text-align:center;><i class="fa-regular fa-circle-check"></i>'." Succes: " . $_SESSION['succes6'] . '</div>';
                                        unset($_SESSION['succes6']); 
                                    }
                                    if (isset($_SESSION['error6'])) {
                                        echo '<div class="alert alert-danger" style="text-align:center;"><i class="fas fa-exclamation-circle"></i>'." Error: " . $_SESSION['error6'] . '</div>';
                                        unset($_SESSION['error6']); 
                                    }
                                ?>
                    <div class="container" style="margin-top: 50px;">
                            <div class="form-group" style="margin-bottom: 20px;">
                                    <label for="general-item" style="font-weight: bold;"><h2>Description</h2></label>
                                    <br>
                                    <span>From general item, if the answer is "NO" please make a comment</span>
                            </div>
                                    <h4>6. Electrical Safety </h4>

                            <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Electrical earth are present ?</span>
                                        <br>
                                        <label for="response21" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response21" id="response21" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response21', 'commentAction21', 'descriptionAction21')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php  echo (show('response21', $id, $connection) == 'Yes')? 'selected': '';?>>Yes</option>
                                            <option value="No"<?php  echo (show('response21', $id, $connection) == 'No')? 'selected': '';?>>No</option>
                                            <option value="N/A"<?php  echo (show('response21', $id, $connection) == 'N/A')? 'selected': '';?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction21" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea21" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea21" id="actiontextarea21"><?php echo show('comment21', $id , $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction21" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea21" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea21" id="descriptiontextarea21"> <?php echo show('action21', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Is the Aviation beacon present and functioning? </span>
                                        <br>
                                        <label for="response22" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response22" id="response22" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response22', 'commentAction22', 'descriptionAction22')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response22', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No"<?php echo (show('response22', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A"<?php echo (show('response22', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction22" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea22" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea22" id="actiontextarea22"><?php  echo show('comment22', $id , $connection);?></textarea>
                                    </div>

                                    <div id="descriptionAction22" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea22" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea22" id="descriptiontextarea22"><?php echo show('action22', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Are all cables properly secured with cable ties ?</span>
                                        <br>
                                        <label for="response23" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response23" id="response23" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response23', 'commentAction23', 'descriptionAction23')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php  echo (show('response23', $id, $connection) == 'Yes')? 'selected': '';?>>Yes</option>
                                            <option value="No"<?php  echo (show('response23', $id, $connection) == 'No')? 'selected': '';?>>No</option>
                                            <option value="N/A"<?php  echo (show('response23', $id, $connection) == 'N/A')? 'selected': '';?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction23" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea23" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea23" id="actiontextarea23"><?php  echo show('comment23', $id, $connection);?></textarea>
                                    </div>

                                    <div id="descriptionAction23" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea23" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea23" id="descriptiontextarea23"><?php echo show('action23', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Are an Electric fence signs present?</span>
                                        <br>
                                        <label for="response24" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response24" id="response24" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response24', 'commentAction24', 'descriptionAction24')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response24', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No"<?php echo (show('response24', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A"<?php echo (show('response24', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction24" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea24" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea24" id="actiontextarea24"><?php echo show('comment24', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction24" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea24" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea24" id="descriptiontextarea24"><?php echo show('action24', $id, $connection); ?></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-info mt-4" name="submit" value="Save">
                                </div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-5" style="color:#E8ECEF;">
                                        <li class="page-item" id="prevButton">
                                            <a class="page-link" href="#" onclick="previousPage()">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(4)">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(6)">6</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(7)">7</a></li>
                                        <li class="page-item disabled"><a class="page-link" href="#" onclick="showSection(3)">-</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(8)">8</a></li>
                                        <li class="page-item" id="nextButton">
                                            <a class="page-link" href="#" onclick="nextPage()">Next</a>
                                        </li>
                                    </ul>
                               </nav>
                        </div>
                     </div>
                  </div>
              </form>
            </section>
          <!-- section 7  -->
            <section id="section-7" style="display:none;">
        <form action="server/site-inspection-p.php" method="POST" enctype="multipart/form-data" id="7">
            <input type="hidden" name="sectionId" value="7">
            <div class="row justify-content-center  mt-5">   
                    <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
                            <div class="text-center">
                                <div class="logo mb-3">
                                    <img  src="resources/images/newl.webp" class="img-fluid  text-center" alt="Northern Engineering Works Logo">
                                </div>
                                <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                                <h6>HEALTH, SAFETY & ENVIRONMENT SITE INSPECTION CHECKLIST </h6>
                            </div>
                            <?php
                                    if (isset($_SESSION['succes7'])) {
                                        echo '<div class="alert alert-success" style="text-align:center;><i class="fa-regular fa-circle-check"></i>'." Succes: " . $_SESSION['succes7'] . '</div>';
                                        unset($_SESSION['succes7']); 
                                    }
                                    if (isset($_SESSION['error7'])) {
                                        echo '<div class="alert alert-danger" style="text-align:center;"><i class="fas fa-exclamation-circle"></i>'." Error: " . $_SESSION['error7'] . '</div>';
                                        unset($_SESSION['error7']); 
                                    }
                                ?>
                    <div class="container" style="margin-top: 50px;">
                            <div class="form-group" style="margin-bottom: 20px;">
                                    <label for="general-item" style="font-weight: bold;"><h2>Description</h2></label>
                                    <br>
                                    <span>From general item, if the answer is "NO" please make a comment</span>
                            </div>
                                    <h4>7. Miscellaneous  </h4>

                            <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Are there no community complaints regarding the site/area?</span>
                                        <br>
                                        <label for="response25" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response25" id="response25" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response25', 'commentAction25', 'descriptionAction25')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response25', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No"<?php echo (show('response25', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A"<?php echo (show('response25', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction25" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea25" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea25" id="actiontextarea25"><?php  echo show('comment25', $id, $connection);?></textarea>
                                    </div>

                                    <div id="descriptionAction25" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea25" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea25" id="descriptiontextarea25"><?php echo  show('action25', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Are there no abnormal conditions present, such as unusual noises, air pollution, etc.?.</span>
                                        <br>
                                        <label for="response26" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response26" id="response26" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response26', 'commentAction26', 'descriptionAction26')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes" <?php echo (show('response26', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No"<?php echo (show('response26', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A" <?php echo (show('response26', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction26" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea26" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea26" id="actiontextarea26"><?php echo show('comment26', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction26" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea26" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea26" id="descriptiontextarea26"><?php echo show('action26', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Noise to be Measure at the distance of 7 m from DG site ?</span>
                                        <br>
                                        <label for="response27" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response27" id="response27" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response27', 'commentAction27', 'descriptionAction27')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes"<?php echo (show('response27', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No"<?php echo (show('response27', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A"<?php echo (show('response27', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction27" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea27" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea27" id="actiontextarea27"><?php echo show('comment27', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction27" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea27" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea27" id="descriptiontextarea27"><?php echo show('action27', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Results  in dbA- </span>
                                        <br>
                                        <label for="response28" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response28" id="response28" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response28', 'commentAction28', 'descriptionAction28')" required>
                                            <option value="" default>Choose</option>
                                            <option value="Yes"<?php echo (show('response28', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="No"<?php echo (show('response28', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="N/A"<?php echo (show('response28', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction28" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea28" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea28" id="actiontextarea28"><?php echo show('comment28', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction28" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea28" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea28" id="descriptiontextarea28"><?php  echo show('action28', $id, $connection);?></textarea>
                                    </div>
                                </div>
                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Other (specify)</span>
                                        <br>
                                        <label for="response29" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="response29" id="response29" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response29', 'commentAction29', 'descriptionAction29')" required>
                                            <option value="" default>Choose</option>
                                            <option value="No"<?php echo (show('response29', $id, $connection) == 'No')? 'selected': ''; ?>>No</option>
                                            <option value="Yes"<?php echo (show('response29', $id, $connection) == 'Yes')? 'selected': ''; ?>>Yes</option>
                                            <option value="N/A"<?php echo (show('response29', $id, $connection) == 'N/A')? 'selected': ''; ?>>N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction29" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea29" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea29" id="actiontextarea29"><?php echo show('comment29', $id, $connection); ?></textarea>
                                    </div>

                                    <div id="descriptionAction29" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea29" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea29" id="descriptiontextarea29"><?php echo show('action29',$id, $connection); ?></textarea>
                                    </div>
                                    <input type="submit" class="btn btn-info mt-4" name="submit" value="Save">
                                </div>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-5" style="color:#E8ECEF;">
                                        <li class="page-item" id="prevButton">
                                            <a class="page-link" href="#" onclick="previousPage()">Previous</a>
                                        </li>
                                        <!-- <li class="page-item"><a class="page-link" href="#" onclick="showSection(2)">2</a></li> -->
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(5)">5</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(6)">6</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(7)">7</a></li>
                                        <li class="page-item disabled"><a class="page-link" href="#" onclick="showSection(3)">-</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="showSection(8)">8</a></li>
                                        <li class="page-item" id="nextButton">
                                            <a class="page-link" href="#" onclick="nextPage()">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                         </div>
                     </div>
                   </div>
               </form>
            </section>
          <!-- section 8  -->
            <section id="section-8" style="display:none;">
        <form action="server/site-inspection-p.php" method="POST" enctype="multipart/form-data" id="8">
            <input type="hidden" name="sectionId" value="8">
            <div class="row justify-content-center  mt-5">   
                    <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
                            <div class="text-center">
                                <div class="logo mb-3">
                                    <img  src="resources/images/newl.webp" class="img-fluid  text-center" alt="Northern Engineering Works Logo">
                                </div>
                                <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                                <h6>HEALTH, SAFETY & ENVIRONMENT SITE INSPECTION CHECKLIST </h6>
                            </div><?php
                                    if (isset($_SESSION['succes8'])) {
                                        echo '<div class="alert alert-success" style="text-align:center;><i class="fa-regular fa-circle-check"></i>'." Succes: " . $_SESSION['succes8'] . '</div>';
                                        unset($_SESSION['succes8']); 
                                    }
                                    if (isset($_SESSION['error8'])) {
                                        echo '<div class="alert alert-danger" style="text-align:center;"><i class="fas fa-exclamation-circle"></i>'." Error: " . $_SESSION['error8'] . '</div>';
                                        unset($_SESSION['error8']); 
                                    }
                                ?>
                    <div class="container" style="margin-top: 50px;">
                            <div class="form-group" style="margin-bottom: 20px;">
                                    <label for="general-item" style="font-weight: bold;"><h2>Description</h2></label>
                                    <br>
                                    <span>From general item, if the answer is "NO" please make a comment</span>
                            </div>
                                    <h4>8. Risk Assessiment / Hazards Identified  </h4>

                            <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <span>(a)</span>
                                            <input type="text" class="form-control" id="data-a" name="data-a" value="<?php echo show('data_a', $id, $connection); ?>" required style="flex: 1; margin-left: 10px;">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="action" id="controlmeasure1" style=" width: 100%; margin-top: 10px;">
                                        <label for="controlmeasure1" style="font-weight: bold;">Control Measures </label>
                                        <textarea name="controlmeasure1" id="controlmeasure1"><?php echo show('control_measure1', $id, $connection); ?></textarea>
                                    </div>
                                    <div id="status1" style="width: 100%; margin-top: 10px;">
                                        <label for="status1" style="font-weight: bold;">Status</label>
                                        <textarea name="status1" id="status1"><?php echo show('status1', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <span>(b)</span>
                                            <input type="text" class="form-control" id="data-b" name="data-b" value="<?php echo show('data_b', $id, $connection); ?>" required style="flex: 1; margin-left: 10px;">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="action" id="controlmeasure2" style=" width: 100%; margin-top: 10px;">
                                        <label for="controlmeasure2" style="font-weight: bold;">Control Measures </label>
                                        <textarea name="controlmeasure2" id="controlmeasure2"><?php echo show('control_measure2', $id, $connection); ?></textarea>
                                    </div>
                                    <div id="status2" style="width: 100%; margin-top: 10px;">
                                        <label for="status2" style="font-weight: bold;">Status</label>
                                        <textarea name="status2" id="status2"><?php echo show('status2', $id, $connection); ?></textarea>
                                    </div>
                                </div>
                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <span>(c)</span>
                                            <input type="text" class="form-control" id="data-c" name="data-c" value="<?php echo show('data_c', $id, $connection); ?>" required style="flex: 1; margin-left: 10px;">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="action" id="controlmeasure3" style=" width: 100%; margin-top: 10px;">
                                        <label for="controlmeasure3" style="font-weight: bold;">Control Measures </label>
                                        <textarea name="controlmeasure3"  id="controlmeasure3"><?php echo show('control_measure3', $id, $connection); ?></textarea>
                                    </div>
                                    <div id="status3" style="width: 100%; margin-top: 10px;">
                                        <label for="status3" style="font-weight: bold;">Status</label>
                                        <textarea name="status3"><?php echo show('status3', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <span>(d)</span>
                                            <input type="text" class="form-control" id="data-d" name="data-d" value="<?php echo show('data_d', $id, $connection); ?>" required style="flex: 1; margin-left: 10px;">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="action" id="controlmeasure4" style=" width: 100%; margin-top: 10px;">
                                        <label for="controlmeasure4" style="font-weight: bold;">Control Measures </label>
                                        <textarea name="controlmeasure4" id="controlmeasure4"><?php echo show('control_measure4', $id, $connection); ?></textarea>
                                    </div>
                                    <div id="status4" style="width: 100%; margin-top: 10px;">
                                        <label for="status4" style="font-weight: bold;">Status</label>
                                        <textarea name="status4" value="<?php echo $data['status4'] ?>" id="status4"><?php echo show('status4', $id, $connection); ?></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                        <div class="form-group" style="display: flex; align-items: center;">
                                            <span>(e)</span>
                                            <input type="text" class="form-control" id="data-e" name="data-e" value="<?php echo show('data_e', $id, $connection); ?>" required style="flex: 1; margin-left: 10px;">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="action" id="controlmeasure5" style=" width: 100%; margin-top: 10px;">
                                        <label for="controlmeasure5" style="font-weight: bold;">Control Measures </label>
                                        <textarea name="controlmeasure5" id="controlmeasure5"><?php echo show('control_measure5', $id, $connection); ?></textarea>
                                    </div>
                                    <div id="status5" style="width: 100%; margin-top: 10px;">
                                        <label for="status5" style="font-weight: bold;">Status</label>
                                        <textarea name="status5" id="status5"><?php echo show('status5', $id, $connection); ?></textarea>
                                     </div>
                                    <input type="submit" class="btn btn-info mt-4" name="submit" value="Save">

                                                <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Submit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirm Final Submission</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            Please review your form carefully before submitting. By clicking the 'Submit' button, you will finalize and submit all the data you have entered. Make sure all information is accurate and complete before proceeding.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="save_changes">Save changes</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center mt-5" style="color:#E8ECEF;">
                                            <li class="page-item" id="prevButton">
                                                <a class="page-link" href="#" onclick="previousPage()">Previous</a>
                                            </li>
                                            <!-- <li class="page-item"><a class="page-link" href="#" onclick="showSection(2)">2</a></li> -->
                                            <li class="page-item"><a class="page-link" href="#" onclick="showSection(1)">1</a></li>
                                            <li class="page-item disabled"><a class="page-link" href="#" onclick="showSection(6)">-</a></li>
                                            <li class="page-item"><a class="page-link" href="#" onclick="showSection(6)">6</a></li>
                                            <li class="page-item "><a class="page-link" href="#" onclick="showSection(7)">7</a></li>
                                            <li class="page-item"><a class="page-link" href="#" onclick="showSection(8)">8</a></li>
                                            <li class="page-item disabled" id="nextButton">
                                                <a class="page-link" href="#" onclick="nextPage()">next</a>
                                            </li>
                                        </ul>
                                    </nav>
                             </div>
                         </div>
                     </div>
                 </div>
               </form>
            </section>
        <!-- </form> -->
    </div>
</body>
   
    <script>
        function toggleDescription(responseId, commentId, descriptionId) {
            var response = document.getElementById(responseId).value;
            var descriptionAction = document.getElementById(descriptionId);
            var commentAction = document.getElementById(commentId);

            if (response === 'Yes') {
                commentAction.style.display = 'block';
                descriptionAction.style.display = 'none';
                console.log("comment action triggered");
            } else if (response === 'No' || response === 'N/A') {
                descriptionAction.style.display = 'block';
                commentAction.style.display = 'block';
                console.log("Both comment action and description action triggered");
            } else {
                descriptionAction.style.display = 'none';
                commentAction.style.display = 'none';
                console.log("showing none");
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize visibility based on default value of each response
            document.querySelectorAll('select[id^="response"]').forEach(function(select) {
                toggleDescription(select.id, 
                    select.id.replace('response', 'commentAction'), 
                    select.id.replace('response', 'descriptionAction'));
            });
        });
        let currentPage = 1;
        const totalPages = 8;

        function showSection(pageNumber) {
            currentPage = pageNumber;
            for (let i = 1; i <= totalPages; i++) {
                document.getElementById('section-' + i).style.display = (i === pageNumber) ? 'block' : 'none';
            }
            updatePagination();
            }

        function nextPage() {
            if (currentPage < totalPages) {
                currentPage++;
                showSection(currentPage);
            }
        }

        function previousPage() {
            if (currentPage > 1) {
                currentPage--;
                showSection(currentPage);
            }
        }

        function updatePagination() {
            const prevButton = document.getElementById('prevButton');
            const nextButton = document.getElementById('nextButton');

            // Enable/Disable pagination buttons based on the current page
            prevButton.classList.toggle('disabled', currentPage === 1);
            nextButton.classList.toggle('disabled', currentPage === totalPages);

            const pageLinks = document.querySelectorAll('.page-item');
            pageLinks.forEach(link => {
            if (link.textContent.trim() == currentPage) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
         });
        }

        document.addEventListener('DOMContentLoaded', function() {
            showSection(currentPage);
        });

        document.addEventListener("DOMContentLoaded", function() {
        // Get the URL parameter 'section' or fallback to PHP value
        const urlParams = new URLSearchParams(window.location.search);
        const sectionId = urlParams.get('section') || <?php echo json_encode($section); ?>;

        // Debugging: Log the section ID
        console.log("Section ID from URL or PHP:", sectionId);

        // Get all sections
        const sections = document.querySelectorAll("[id^='section-']");

        // Debugging: Log the IDs of all sections
        sections.forEach(section => console.log("Available section ID:", section.id));

        // Hide all sections
        sections.forEach(function(section) {
            section.style.display = "none";
        });
        // Show the section based on the 'section' parameter
            if (sectionId) {
             currentPage = parseInt(sectionId);
             const sectionElement = document.getElementById("section-" + sectionId);
            if (sectionElement) {
                sectionElement.style.display = "block";
                sectionElement.scrollIntoView({ behavior: 'smooth' });
                
                // Update the active state of the page links
                const pageLinks = document.querySelectorAll('.page-item');
                pageLinks.forEach(link => {
                    const pageNumber = link.textContent.trim();
                    
                    // Check if this page number matches the section ID
                    if (pageNumber === sectionId) {
                        link.classList.add('active');
                    } else {
                        link.classList.remove('active');
                        }
                    });
                } else {
                    console.error("Section not found: section-" + sectionId);
                }
            } else {
                console.warn("No section ID specified.");
            }
        });
        document.querySelectorAll('.page-item').forEach(link => {
        link.addEventListener('click', function() {
            const pageNumber = parseInt(this.textContent.trim());
            goToPage(pageNumber);  // Go to the page when clicked
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
