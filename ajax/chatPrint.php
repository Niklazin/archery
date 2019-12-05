<?php

    require_once "../database_connection/db.php";
    
    $sql = "SELECT * FROM chat";
    $query = mysqli_query($connection, $sql);
    
    if($query->num_rows == 0){
        echo 0;
        exit();
    }
    while($message = $query->fetch_assoc()){
        echo "<div class='alert alert-info mb-2'><p>{$message['message']}</p></div>";
    }
    