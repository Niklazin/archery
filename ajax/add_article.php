<?php

    $title = trim(filter_var($_POST['title'], FILTER_SANITIZE_STRING));
    $intro = trim(filter_var($_POST['intro'], FILTER_SANITIZE_EMAIL));
    $article_text = trim(filter_var($_POST['article_text'], FILTER_SANITIZE_STRING));
    
    $error = "";
    if(strlen($title) <= 3)
        $error = "Type title";
    else if(strlen($intro) <= 3)
        $error = "type intro";
    else if(strlen($article_text) <= 3)
        $error = "Type text";
    
    if($error != ""){
        echo $error;
        exit();
    }
    
    
    require_once '../database_connection/db.php';
    
    //$dsn = "mysql:host=$host;dbname=$db";
    //$pdo = new PDO($dsn, $user, $password); //подключение к базе даных
    $sql = "INSERT INTO articles values(0, '$title', '$intro', '$article_text', now(), '{$_COOKIE['login']}')";
    $query = mysqli_query($connection, $sql);
    
   
    echo 1;
    
    
    
?>






