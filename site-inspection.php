<?php
    include 'server/db.php';
    include 'server/db.php';
    include 'server/modules/staff-pages.php';
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
        @media (max-width: 768px) {
            .container {
                padding: 0 10px; /* Reduced padding for smaller screens */
            }
            
            .col-md-5 {
                width: 100%;    /* Full width columns on small screens */
                margin-bottom: 15px; /* Space between columns on small screens */
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

    </style>
</head>
<body> 
    <div id="section" class="container-fluid mx-0 px-0">        
            <?php
                menu5();
            ?> 
        <form action="" method="POST" enctype="multipart/form-data ">
            <section id="section-1">
                <div class="row justify-content-center mt-5">   
                    <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
                        <div class="text-center">
                            <div class="logo mb-3">
                                <img  src="resources/images/newl.webp" class="img-fluid  text-center" alt="Northern Engineering Works Logo">
                            </div>
                            <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                            <h6>HEALTH, SAFETY & ENVIRONMENT SITE INSPECTION CHECKLIST </h6>
                        </div>
                        <div class="row d-flex flex-wrap justify-content-center mb-4 card-background-color align-items-center inputs-style">
                            <div class="col-md-5 mb-3 mt-4">
                                    <div class="form-group">
                                        <label for="vehicle">Site Name:</label>
                                        <input type="text" class="form-control" id="lastServiceDate" name="lastServiceDate" value="" required>
                                    </div>
                                </div>
                            <div class="col-md-5 mb-3 mt-4">
                                <div class="form-group">
                                    <label for="lastServiceDate">Site ID:</label>
                                    <input type="text" class="form-control" id="lastServiceDate" name="lastServiceDate" value="" required>
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <div class="form-group">
                                    <label for="location">Region:</label>
                                    <input type="text" class="form-control" id="location" name="location" value="" required>
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <div class="form-group">
                                    <label for="inspectorDate">Inspector Date:</label>
                                    <input type="date" class="form-control" id="inspectorDate" name="inspectorName" value="" required>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="general-item" style="font-weight: bold;"><h2>Description</h2></label>
                                <br>
                                <span>From general item, if the answer is "NO" please make a comment</span>
                            </div>

                            <h4>1. General Observations</h4>

                            <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                    <span>Do the staff/contractors (where applicable) adhere to PPE requirements while accessing the site?</span>
                                    <br>
                                    <label for="response1" style="font-weight: bold; margin-top: 10px;">Response</label>
                                    <select name="response1" id="response1" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response1', 'commentAction1', 'descriptionAction1')">
                                        <option value="" default>Choose</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </div>

                                <div class="action" id="commentAction1" style="display: none; width: 100%; margin-top: 20px;">
                                    <label for="actiontextarea1" style="font-weight: bold;">COMMENT</label>
                                    <textarea name="actiontextarea1" id="actiontextarea1"></textarea>
                                </div>

                                <div id="descriptionAction1" style="width: 100%; display: none; margin-top: 20px;">
                                    <label for="descriptiontextarea1" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                    <textarea name="descriptiontextarea1" id="descriptiontextarea1"></textarea>
                                </div>
                            </div>

                            <div class="flex-container mt-4" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                    <span>Is the site secured by a lock?</span>
                                    <br>
                                    <label for="response2" style="font-weight: bold; margin-top: 10px;">Response</label>
                                    <select name="response2" id="response2" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response2', 'commentAction2', 'descriptionAction2')">
                                        <option value="" default>Choose</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </div>

                                <div class="action" id="commentAction2" style="display: none; width: 100%; margin-top: 20px;">
                                    <label for="actiontextarea2" style="font-weight: bold;">COMMENT</label>
                                    <textarea name="actiontextarea2" id="actiontextarea2"></textarea>
                                </div>

                                <div id="descriptionAction2" style="width: 100%; display: none; margin-top: 20px;">
                                    <label for="descriptiontextarea2" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                    <textarea name="descriptiontextarea2" id="descriptiontextarea2"></textarea>
                                </div>
                            </div>

                            <div class="flex-container mt-4" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                    <span>Is there a site Logbook?</span>
                                    <br>
                                    <label for="response3" style="font-weight: bold; margin-top: 10px;">Response</label>
                                    <select name="response3" id="response3" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response3', 'commentAction3', 'descriptionAction3')">
                                        <option value="" default>Choose</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </div>

                                <div class="action" id="commentAction3" style="display: none; width: 100%; margin-top: 20px;">
                                    <label for="actiontextarea3" style="font-weight: bold;">COMMENT</label>
                                    <textarea name="actiontextarea3" id="actiontextarea3"></textarea>
                                </div>

                                <div id="descriptionAction3" style="width: 100%; display: none; margin-top: 20px;">
                                    <label for="descriptiontextarea3" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                    <textarea name="descriptiontextarea3" id="descriptiontextarea3"></textarea>
                                </div>
                            </div>

                            <div class="flex-container mt-4" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                    <span>Aggregates  evenly distributed?</span>
                                    <br>
                                    <label for="response4" style="font-weight: bold; margin-top: 10px;">Response</label>
                                    <select name="response4" id="response4" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response4', 'commentAction4', 'descriptionAction4')">
                                        <option value="" default>Choose</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </div>

                                <div class="action" id="commentAction4" style="display: none; width: 100%; margin-top: 20px;">
                                    <label for="actiontextarea4" style="font-weight: bold;">COMMENT</label>
                                    <textarea name="actiontextarea4" id="actiontextarea4"></textarea>
                                </div>

                                <div id="descriptionAction4" style="width: 100%; display: none; margin-top: 20px;">
                                    <label for="descriptiontextarea4" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                    <textarea name="descriptiontextarea4" id="descriptiontextarea4"></textarea>
                                </div>
                            </div>

                            <div class="flex-container mt-4" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                    <span>Aggregates  evenly distributed?</span>
                                    <br>
                                    <label for="response5" style="font-weight: bold; margin-top: 10px;">Response</label>
                                    <select name="response5" id="response5" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response5', 'commentAction5', 'descriptionAction5')">
                                        <option value="" default>Choose</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </div>

                                <div class="action" id="commentAction5" style="display: none; width: 100%; margin-top: 20px;">
                                    <label for="actiontextarea5" style="font-weight: bold;">COMMENT</label>
                                    <textarea name="actiontextarea5" id="actiontextarea5"></textarea>
                                </div>

                                <div id="descriptionAction5" style="width: 100%; display: none; margin-top: 20px;">
                                    <label for="descriptiontextarea5" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                    <textarea name="descriptiontextarea5" id="descriptiontextarea5"></textarea>
                                </div>
                            </div>

                            <div class="flex-container mt-4" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                <div class="question" style="width: 100%;">
                                    <span>Anti-weed membrane Available?</span>
                                    <br>
                                    <label for="response6" style="font-weight: bold; margin-top: 10px;">Response</label>
                                    <select name="response6" id="response6" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response6', 'commentAction6', 'descriptionAction6')">
                                        <option value="" default>Choose</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                        <option value="N/A">N/A</option>
                                    </select>
                                </div>

                                <div class="action" id="commentAction6" style="display: none; width: 100%; margin-top: 20px;">
                                    <label for="actiontextarea6" style="font-weight: bold;">COMMENT</label>
                                    <textarea name="actiontextare6" id="actiontextarea6"></textarea>
                                </div>

                                <div id="descriptionAction6" style="width: 100%; display: none; margin-top: 20px;">
                                    <label for="descriptiontextarea6" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                    <textarea name="descriptiontextarea6" id="descriptiontextarea6"></textarea>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="nextPage()">Next Page</button>
                            </div>
                        </div>
                    </div>
            </section>

                            <!-- section two  -->

            <section id="section-2" style="display:none;">
            <div class="row justify-content-center  mt-5">   
                    <div class="col-lg-6 col-md-6" style="background-color: #f8f9fa; border-radius: 8px; padding: 20px;">
                            <div class="text-center">
                                <div class="logo mb-3">
                                    <img  src="resources/images/newl.webp" class="img-fluid  text-center" alt="Northern Engineering Works Logo">
                                </div>
                                <h5><b>NORTHERN ENGINEERING WORKS LIMITED</b></h5>
                                <h6>HEALTH, SAFETY & ENVIRONMENT SITE INSPECTION CHECKLIST </h6>
                            </div>
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
                                        <select name="respons7" id="response7" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response7', 'commentAction7', 'descriptionAction7')">
                                            <option value="" default>Choose</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction7" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea7" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea7" id="actiontextarea7"></textarea>
                                    </div>

                                    <div id="descriptionAction7" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea7" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea7" id="descriptiontextarea7"></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Guard rails/handrails available for rooftops?</span>
                                        <br>
                                        <label for="response8" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="respons8" id="response8" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response8', 'commentAction8', 'descriptionAction8')">
                                            <option value="" default>Choose</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction8" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea8" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea8" id="actiontextarea8"></textarea>
                                    </div>

                                    <div id="descriptionAction8" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea8" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea8" id="descriptiontextarea8"></textarea>
                                    </div>
                                </div>

                                <div class="flex-container" style="display: flex; gap: 20px; flex-direction: column; align-items: flex-start; background-color: #e9ecef; border-radius: 8px; padding: 20px;">
                                    <div class="question" style="width: 100%;">
                                        <span>Is the climbing ladder securely mounted and straight?</span>
                                        <br>
                                        <label for="response9" style="font-weight: bold; margin-top: 10px;">Response</label>
                                        <select name="respons9" id="response9" style="width: 50%; margin-top: 5px; padding: 5px; border-radius: 4px; border: 1px solid #ced4da;" onchange="toggleDescription('response9', 'commentAction9', 'descriptionAction9')">
                                            <option value="" default>Choose</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>

                                    <div class="action" id="commentAction9" style="display: none; width: 100%; margin-top: 20px;">
                                        <label for="actiontextarea9" style="font-weight: bold;">COMMENT</label>
                                        <textarea name="actiontextarea9" id="actiontextarea9"></textarea>
                                    </div>

                                    <div id="descriptionAction9" style="width: 100%; display: none; margin-top: 20px;">
                                        <label for="descriptiontextarea9" style="font-weight: bold;">DESCRIBE CORRECTIVE ACTION</label>
                                        <textarea name="descriptiontextarea9" id="descriptiontextarea9"></textarea>
                                    </div>
                                    <div class="flex">
                                        <button type="button" class="btn btn-secondary" onclick="previousPage()">Previous Page</button>
                                        <button type="button" class="btn btn-primary" onclick="nextPage()">Next Page</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
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

        let currentSection = 1;
        const totalSections = 8;

        function showSection(sectionNumber) {
            for (let i = 1; i <= totalSections; i++) {
                document.getElementById('section-' + i).style.display = (i === sectionNumber) ? 'block' : 'none';
            }
        }

        function nextPage() {
            if (currentSection < totalSections) {
                currentSection++;
                showSection(currentSection);
            }
        }

        function previousPage() {
            if (currentSection > 1) {
                currentSection--;
                showSection(currentSection);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            showSection(currentSection);
        });
            
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
