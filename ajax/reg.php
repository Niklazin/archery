<?php

    
    
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    
    $error = "";
    
    if(strlen($login) <= 3)
        $error = "Type login";
    else if(strlen($pass) <= 3)
        $error = "Type password";
    
    if($error != ""){
        echo $error;
        exit();
    }
    
    $hash = "aef251fai2";
    $pass = md5($pass . $hash); //шифрование строки
    
    require_once '../includes/database_connection.php';
    $connection = new database_connection();
    $connection = $connection->connection();
    
    //$dsn = "mysql:host=$host;dbname=$db";
    //$pdo = new PDO($dsn, $user, $password); //подключение к базе даных
    $sql = "INSERT INTO users VALUES (0, '$login', '$pass', 0)";
    $query = mysqli_query($connection, $sql);
    
    echo mysqli_error($connection);
    
   
    echo 1;
    
    
    
?>

