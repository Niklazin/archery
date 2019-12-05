<html>
    <head>
        <?php 
            require '../includes/db.php';
            require '../blocks/head.php';
            
            require '../blocks/header.php';
        ?>
        <title>title</title>
    </head>
    <body>

    </body>
</html>



<?php
    
    require '../includes/database_connection.php'; 
    require '../classes/Competition.php';
    

    $comp = new Competition();
    $comp_name = $_POST["competitionName"];
    
    if($comp->check_name($comp_name)){
        echo 'Sacensibas ar šādu nosaukumu jau eksistē';
    }else{
        //distances - distances count in competition
        //$comp->setName($comp_name);
        //$comp->setDistances($_POST["distances"]);
        //$comp->add_competition_to_DB();
        $sql = "insert into competitions values(0, '$comp_name', {$_POST['distances']})";
        mysqli_query($connection, $sql);
        
        echo 'gatavs';
        
        $sql = "INSERT INTO competition_info VALUES(0, LAST_INSERT_ID(), '{$_POST['city']}', '{$_POST['info']}', '{$_POST['date']}')";
        mysqli_query($connection, $sql);
        echo mysqli_error($connection);
        
    }

?>


