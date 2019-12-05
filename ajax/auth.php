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
    
    
    
    //$dsn = "mysql:host=$host;dbname=$db";
    //$pdo = new PDO($dsn, $user, $password); //подключение к базе даных
    
    require '../includes/database_connection.php';
    $connection = new database_connection();
    $connection = $connection->connection();
    
    $sql = "SELECT id FROM users WHERE login = '$login' AND pass = '$pass'";
    $query = mysqli_query($connection, $sql);
    
    $user = $query->fetch_assoc();
    
    
    
    
    if($user['id'] == 0){
        echo 'user didnt exists';
    }else{
        setcookie('login', $login, time() + 3600 * 24 * 30, "/");
        echo 1;
    }
    
    
?>



