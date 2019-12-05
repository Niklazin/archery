<?php

    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $mess = trim(filter_var($_POST['mess'], FILTER_SANITIZE_STRING));
    
    $error = "";
    if(strlen($username) <= 3)
        $error = "Type name";
    else if(strlen($email) <= 3)
        $error = "Type email";
    else if(strlen($mess) <= 3)
        $error = "Type message";
    
    if($error != ""){
        echo $error;
        exit();
    }
    $my_email = "test@gmail.com";
    $subject = "=?utf-8?B?".base64_encode("new message")."?=";
    $headers = "From $email\r\n Reply-to: $email\r\n Content-type: text/plain; charset=utf-8\r\n";
    
    mail($my_email, $subject, $mess, $headers);
    
    echo 1;
