<?php

    $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));
    $error = "";
    
    if(strlen($mess) == 0)
        $error = "Type message";
    
    if($error != ""){
        echo $error;
        exit();
    }
    
    require_once "../database_connection/db.php";
    
    $sql = "INSERT INTO chat value(0, '$mess')";
    mysqli_query($connection, $sql);
    
    echo 1;
    
?>