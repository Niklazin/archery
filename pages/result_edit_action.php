<?php

require '../includes/database_connection.php';
require '../classes/Results.php';


$arch = 1;
$comp_id = $_GET["competition_id"];
$results = new Results();



while(isset($_POST["archer_id" . $arch])){
    $dist = 1;
    $archer_id = $_POST["archer_id" . $arch];
    
    if(trim($archer_id) == ""){
        
    }else if(trim($_POST["name" . $arch]) == ""){
        
    }else if(trim($_POST["surname" . $arch])==""){
        
    }else{
        //check if archer exists in database.
        //if archer don't exists add him to table archers
        if(!$results->get_archer($archer_id)){
            $results->insert_archer($archer_id, $_POST["name" . $arch], $_POST["surname" . $arch]);
            $results->add_arch_to_comp($archer_id, $comp_id);
        }

        while($dist <= 24){

            $res = $_POST["r" . $arch . $dist];

            //if result is empty, it don't writes to DB
            if($res != ""){
                $results->add_result($archer_id, $comp_id, $res, $dist);  
            }

            $dist++;
        }
    }
    $arch++;
 }


//$result = new Results();

header("location:/result_edit.php?id={$comp_id}");
exit();

?>