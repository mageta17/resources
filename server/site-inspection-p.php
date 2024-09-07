<?php
require "db.php";
session_start();

$id = null;

// Check if 'id' is set and is a valid numeric value
if (isset($_SESSION['id']) && is_numeric($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    // ID is not set or invalid, handle accordingly
    $id = null;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from POST and sanitize it
    $sectionId = isset($_POST['sectionId']) ? mysqli_real_escape_string($connection, $_POST['sectionId']) : null;
    $siteName = isset($_POST['sitename']) ? mysqli_real_escape_string($connection, $_POST['sitename']) : null;
    $siteId = isset($_POST['siteid']) ? mysqli_real_escape_string($connection, $_POST['siteid']) : null;
    $region = isset($_POST['region']) ? mysqli_real_escape_string($connection, $_POST['region']) : null;
    $inspectorDate = isset($_POST['inspectordate']) ? mysqli_real_escape_string($connection, $_POST['inspectordate']) : null;

    $response1 = isset($_POST['response1']) ? mysqli_real_escape_string($connection, $_POST['response1']) : null;
    $comment1 = isset($_POST['actiontextarea1']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea1']) : null;
    $description1 = isset($_POST['descriptiontextarea1']) ? mysqli_real_escape_string($connection, $_POST['descriptiontextarea1']) : null;
    $response2 = isset($_POST['response2']) ? mysqli_real_escape_string($connection, $_POST['response2']) : null;
    $comment2 = isset($_POST['actiontextarea2']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea2']) : null;
    $description2 = isset($_POST['descriptiontextarea2']) ? mysqli_real_escape_string($connection, $_POST['descriptiontextarea2']) : null;
    $response3 = isset($_POST['response3']) ? mysqli_real_escape_string($connection, $_POST['response3']) : null;
    $comment3 = isset($_POST['actiontextarea3']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea3']) : null;
    $description3 = isset($_POST['descriptiontextarea3']) ? mysqli_real_escape_string($connection, $_POST['descriptiontextarea3']) : null;

    $response4 = isset($_POST['response4']) ? mysqli_real_escape_string($connection, $_POST['response4']) : null;

    $comment4 = isset($_POST['actiontextarea4']) ?  mysqli_real_escape_string($connection, $_POST['actiontextarea4']) : null; 
    $description4 = isset($_POST['descriptiontextarea4']) ? mysqli_escape_string($connection, $_POST['descriptiontextarea4']) : null; 

    $response5 = isset($_POST['response5']) ? mysqli_real_escape_string($connection, $_POST['response5']): null; 

    $comment5 = isset($_POST['actiontextarea5']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea5']): null;

    $description5 = isset($_POST['descriptiontextarea5']) ? mysqli_real_escape_string($connection, $_POST['descriptiontextarea5']): null; 

    $response6 = isset($_POST['response6'])? mysqli_real_escape_string($connection, $_POST['response6']): null; 

    $comment6  = isset($_POST['actiontextarea6']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea6']): null;

    $description6 = isset($_POST['descriptiontextarea6']) ? mysqli_real_escape_string($connection, $_POST['descriptiontextarea6']) : null;

    $response7 = isset($_POST['response7']) ? mysqli_real_escape_string($connection, $_POST['response7']): null;

    $comment7 = isset($_POST['actiontextarea7']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea8']): null;
    $description7 = isset($_POST['descriptiontextarea7'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea7']): null;

    $response8 = isset($_POST['response8'])? mysqli_real_escape_string($connection, $_POST['response8']): null;

    $comment8 = isset($_POST['actiontextarea8'])? mysqli_real_escape_string($connection, $_POST['actiontextarea8']): null;

    $description8 = isset($_POST['descriptiontextarea8'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea8']): null;

    $response9 = isset($_POST['response9']) ? mysqli_real_escape_string($connection, $_POST['response9']): null;

    $comment9 = isset($_POST['actiontextarea9']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea9']): null;

    $description9 = isset($_POST['descriptiontextarea9'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea9']): null;

    $response10 = isset($_POST['response10'])? mysqli_real_escape_string($connection, $_POST['response10']):null;

    $comment10 = isset($_POST['actiontextarea10'])? mysqli_real_escape_string($connection, $_POST['actiontextarea10']): null;

    $description10 = isset($_POST['descriptiontextarea10'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea10']): null;

    $response11 = isset($_POST['response11']) ? mysqli_real_escape_string($connection, $_POST['response11']): null;

    $comment11 = isset($_POST['actiontextarea11']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea11']):null;

    $description11 = isset($_POST['descriptiontextarea11'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea11']): null;

    $response12 = isset($_POST['response12']) ? mysqli_real_escape_string($connection, $_POST['response12']): null;

    $comment12 = isset($_POST['actiontextarea12']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea12']):null;

    $description12 = isset($_POST['descriptiontextarea12'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea12']): null;

    $response13 = isset($_POST['response13']) ? mysqli_real_escape_string($connection, $_POST['response13']): null;


    $comment13 = isset($_POST['actiontextarea13']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea13']):null;

    $description13 = isset($_POST['descriptiontextarea13'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea13']): null;

    $response14 = isset($_POST['response14']) ? mysqli_real_escape_string($connection, $_POST['response14']): null;

    $comment14 = isset($_POST['actiontextarea14']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea14']):null;

    $description14 = isset($_POST['descriptiontextarea14'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea14']): null;


    $response15 = isset($_POST['response15']) ? mysqli_real_escape_string($connection, $_POST['response15']): null;

    $comment15 = isset($_POST['actiontextarea15']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea15']):null;

    $description15 = isset($_POST['descriptiontextarea15'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea15']): null;

    $response16 = isset($_POST['response16']) ? mysqli_real_escape_string($connection, $_POST['response16']): null;

    $comment16 = isset($_POST['actiontextarea16']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea16']):null;

    $description16 = isset($_POST['descriptiontextarea16'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea16']): null;


    $response17 = isset($_POST['response17']) ? mysqli_real_escape_string($connection, $_POST['response17']): null;

    $comment17 = isset($_POST['actiontextarea17']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea17']):null;

    $description17 = isset($_POST['descriptiontextarea17'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea17']): null;

    $response18 = isset($_POST['response18']) ? mysqli_real_escape_string($connection, $_POST['response18']): null;

    $comment18 = isset($_POST['actiontextarea18']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea18']):null;

    $description18 = isset($_POST['descriptiontextarea18'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea18']): null;

    $response19 = isset($_POST['response19']) ? mysqli_real_escape_string($connection, $_POST['response19']): null;

    $comment19 = isset($_POST['actiontextarea19']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea19']):null;

    $description19 = isset($_POST['descriptiontextarea19'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea19']): null;


    $response20 = isset($_POST['response20']) ? mysqli_real_escape_string($connection, $_POST['response20']): null;

    $comment20 = isset($_POST['actiontextarea20']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea20']):null;

    $description20 = isset($_POST['descriptiontextarea20'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea20']): null;

    $response21 = isset($_POST['response21']) ? mysqli_real_escape_string($connection, $_POST['response21']): null;

    $comment21 = isset($_POST['actiontextarea21']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea21']):null;

    $description21 = isset($_POST['descriptiontextarea21'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea21']): null;

    $response22 = isset($_POST['response22']) ? mysqli_real_escape_string($connection, $_POST['response22']): null;

    $comment22 = isset($_POST['actiontextarea22']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea22']):null;

    $description22 = isset($_POST['descriptiontextarea22'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea22']): null;

    $response23 = isset($_POST['response23']) ? mysqli_real_escape_string($connection, $_POST['response23']): null;

    $comment23 = isset($_POST['actiontextarea23']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea23']):null;

    $description23 = isset($_POST['descriptiontextarea23'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea23']): null;

    $response24 = isset($_POST['response24']) ? mysqli_real_escape_string($connection, $_POST['response24']): null;

    $comment24 = isset($_POST['actiontextarea24']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea24']):null;

    $description24 = isset($_POST['descriptiontextarea24'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea24']): null;

    $response25 = isset($_POST['response25']) ? mysqli_real_escape_string($connection, $_POST['response25']): null;

    $comment25 = isset($_POST['actiontextarea25']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea25']):null;

    $description25 = isset($_POST['descriptiontextarea25'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea25']): null;

    $response26 = isset($_POST['response26']) ? mysqli_real_escape_string($connection, $_POST['response26']): null;

    $comment26 = isset($_POST['actiontextarea26']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea26']):null;

    $description26 = isset($_POST['descriptiontextarea26'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea26']): null;

    $response27 = isset($_POST['response27']) ? mysqli_real_escape_string($connection, $_POST['response27']): null;

    $comment27 = isset($_POST['actiontextarea27']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea27']):null;

    $description27 = isset($_POST['descriptiontextarea27'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea27']): null;

    $response28 = isset($_POST['response28']) ? mysqli_real_escape_string($connection, $_POST['response28']): null;

    $comment28 = isset($_POST['actiontextarea28']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea28']):null;

    $description28 = isset($_POST['descriptiontextarea28'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea28']): null;

    $response29 = isset($_POST['response29']) ? mysqli_real_escape_string($connection, $_POST['response29']): null;

    $comment29 = isset($_POST['actiontextarea29']) ? mysqli_real_escape_string($connection, $_POST['actiontextarea29']):null;
    $description29 = isset($_POST['descriptiontextarea29'])? mysqli_real_escape_string($connection, $_POST['descriptiontextarea29']): null;

    $data_a = isset($_POST['data-a']) ? mysqli_real_escape_string($connection,$_POST['data-a']): null;
    $data_b = isset($_POST['data-b']) ? mysqli_real_escape_string($connection,$_POST['data-b']): null;
    $data_c = isset($_POST['data-c']) ? mysqli_real_escape_string($connection,$_POST['data-c']): null;
    $data_d = isset($_POST['data-d']) ? mysqli_real_escape_string($connection,$_POST['data-d']): null;
    $data_e = isset($_POST['data-e']) ? mysqli_real_escape_string($connection,$_POST['data-e']): null;
    
    $control_measure1 = isset($_POST['controlmeasure1'])? mysqli_real_escape_string($connection, $_POST['controlmeasure1']): null;

    $control_measure2 = isset($_POST['controlmeasure2'])? mysqli_real_escape_string($connection, $_POST['controlmeasure2']): null;

    $control_measure3 = isset($_POST['controlmeasure3'])? mysqli_real_escape_string($connection, $_POST['controlmeasure3']): null;

    $control_measure4 = isset($_POST['controlmeasure4'])? mysqli_real_escape_string($connection, $_POST['controlmeasure4']): null;

    $control_measure5 = isset($_POST['controlmeasure5'])? mysqli_real_escape_string($connection, $_POST['controlmeasure5']): null;

    $status1 = isset($_POST['status1'])? mysqli_real_escape_string($connection, $_POST['status1']): null;
    $status2 = isset($_POST['status2'])? mysqli_real_escape_string($connection, $_POST['status2']): null;
    $status3 = isset($_POST['status3'])? mysqli_real_escape_string($connection, $_POST['status3']): null;
    $status4 = isset($_POST['status4'])? mysqli_real_escape_string($connection, $_POST['status4']): null;
    $status5 = isset($_POST['status5'])? mysqli_real_escape_string($connection, $_POST['status5']): null;



    if($sectionId == 1){
        $query = "INSERT INTO site_inspection_tempo (
            site_name, site_id, region, inspection_date, response1, comment1, action1, response2, comment2, action2, response3, comment3, action3, response4, comment4, action4, response5, comment5, action5,
            response6, comment6, action6
        
        ) VALUES (
            '$siteName', '$siteId', '$region', '$inspectorDate', '$response1', '$comment1', '$description1', '$response2', '$comment2', '$description2', '$response3', '$comment3', '$description3',
            '$response4', '$comment4', '$description4', '$response5', '$comment5', '$description5', '$response6', '$comment6', '$description6'
         
        )";  
            if (mysqli_query($connection, $query)) {

                $insertedId = mysqli_insert_id($connection);
                // Redirect to the specific section
                $nextsection = $sectionId+1;
                header("Location: ../site-inspection.php?section=$nextsection&id=$insertedId");
                exit();
            }

    } elseif($sectionId == 2){

        $update_query = "
        UPDATE site_inspection_tempo
        SET 
            response7 = '$response7', comment7 = '$comment7', action7 = '$description7',
            response8 = '$response8', comment8 = '$comment8', action8 = '$description8',
            response9 = '$response9', comment9 = '$comment9', action9 = '$description9'
            WHERE id = '$id'
             ";
             if(mysqli_query($connection, $update_query)){
                $insertedId = $id;
                $nextsection = $sectionId+1;

                header("Location: ../site-inspection.php?section=$nextsection&id=$insertedId");
                exit();
             }

    }else if($sectionId == 3){

        $update_query = "
        UPDATE site_inspection_tempo
        SET 
            response10 = '$response10', comment10 = '$comment10', action10 = '$description10',
            response11 = '$response11', comment11 = '$comment11', action11 = '$description11',
            response12 = '$response12', comment12 = '$comment12', action12 = '$description12'
            WHERE id = '$id'
             ";

             if(mysqli_query($connection, $update_query)){
                $insertedId = $id;
                $nextsection = $sectionId+1;

                header("Location: ../site-inspection.php?section=$nextsection&id=$insertedId");
                exit();
             }

    }else if($sectionId == 4){
        $update_query = "
        UPDATE site_inspection_tempo
        SET 
            response13 = '$response13', comment13 = '$comment13', action13 = '$description13',
            response14 = '$response14', comment14 = '$comment14', action14 = '$description14',
            response15 = '$response15', comment15 = '$comment15', action15 = '$description15'
            WHERE id = '$id'
             ";

             if(mysqli_query($connection, $update_query)){
                $insertedId = $id;
                $nextsection = $sectionId+1;

                header("Location: ../site-inspection.php?section=$nextsection&id=$insertedId");
                exit();
             }

    }else if($sectionId == 5){

        $update_query = "
        UPDATE site_inspection_tempo
        SET
        
            response17 = '$response17', comment17 = '$comment17', action17 = '$description17',
            response18 = '$response18', comment18 = '$comment18', action18 = '$description18',
            response19 = '$response19', comment19 = '$comment19', action19 = '$description19',
            response20 = '$response20', comment20 = '$comment20', action20 = '$description20'
            WHERE id = '$id'
             ";

             if(mysqli_query($connection, $update_query)){
                $insertedId = $id;
                $nextsection = $sectionId+1;

                header("Location: ../site-inspection.php?section=$nextsection&id=$insertedId");
                exit();
             }

    } else if($sectionId == 6){

        $update_query = "
        UPDATE site_inspection_tempo
        SET
            response21 = '$response21', comment21 = '$comment21', action21 = '$description21',
            response22 = '$response22', comment22 = '$comment22', action22 = '$description22',
            response23 = '$response23', comment23 = '$comment23', action23 = '$description23',
            response24 = '$response24', comment24 = '$comment24', action24 = '$description24'
            WHERE id = '$id'
             ";

             if(mysqli_query($connection, $update_query)){
                $insertedId = $id;
                $nextsection = $sectionId+1;

                header("Location: ../site-inspection.php?section=$nextsection&id=$insertedId");
                exit();
             }
    }else if($sectionId == 7){
        $update_query = "
        UPDATE site_inspection_tempo
        SET
          
            response25 = '$response25', comment25 = '$comment25', action25 = '$description25',
            response26 = '$response26', comment26 = '$comment26', action26 = '$description26',
            response27 = '$response27', comment27 = '$comment27', action27 = '$description27',
            response28 = '$response28', comment28 = '$comment28', action28 = '$description28',
            response29 = '$response29', comment29 = '$comment29', action29 = '$description29',
            response16 = '$response16', comment16 = '$comment16', action16 = '$description16'
            WHERE id = '$id'
             ";

             if(mysqli_query($connection, $update_query)){
                $insertedId = $id;
                $nextsection = $sectionId+1;

                header("Location: ../site-inspection.php?section=$nextsection&id=$insertedId");
                exit();
             }
    }if($sectionId == 8){
        $update_query = "
        UPDATE site_inspection_tempo
        SET
            data_a = '$data_a', data_b = '$data_b', data_c = '$data_c', data_d = '$data_d',
            data_e = '$data_e', control_measure1 = '$control_measure1', control_measure2 
            = '$control_measure2', control_measure3 = '$control_measure3', control_measure4
            = '$control_measure4', control_measure5 = '$control_measure5', status1 = '$status1',
            status2 = '$status2', status3 = '$status3', status4 = '$status4', status5 = '$status5'

            WHERE id = '$id'
             ";

             if(mysqli_query($connection, $update_query)){
                $insertedId = $id;
                
                header("Location: ../site-inspection.php?section=$sectionId&id=$insertedId");
                exit();
             }

    }

    // Close connection
    mysqli_close($connection);
}


?>


