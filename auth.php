<?php
    
?>

<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <?php
            $website_title = 'Sign up';
            require 'blocks/head.php'; 
        ?>
    </head>
    <body>
        <?php 
        require 'includes/db.php';
        require 'blocks/header.php'; 
        
        ?>
        


        <main class="container mt-5">
            <div class="row">
                <div class="col-md-8 mb-5">
                    <?php
                        if(!isset($_COOKIE['login'])):
                    ?>
                    <h4>Sign up from</h4>
                    <form action="ajax/auth.php" method="POST">
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" class="form-control">
                        
                        <label for="password">password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        
                        <div class="alert alert-danger" id="errorBlock"></div>
                        
                        <button type="button" name="auth_user" id="auth_user" class="btn btn-success mt-5">login</button>
                    </form>
                    
                    <?php else: 
                        
                    ?>
                    <h2><?= $_COOKIE['login'] ?></h2>
                    <button class="btn btn-danger" id="exitBtn">exit</button>
                    
                    <?php endif; ?>
                    
                    
                </div>
                
            </div>    
        </main>
        
        <script>
           $(document).ready(function(){
               
            $("#exitBtn").click(function(){
             $.ajax({
                 url: 'ajax/exit.php',
                 type: 'POST',
                 cache: false,
                 data: {},
                 dataType: 'html',
                 success: function (data) {     
                     document.location.reload(true);  
                 }
             });
            });
               
               
            $("#auth_user").click(function(){
                 
                var name = $('#username').val();
                var email = $('#email').val();
                var login = $('#login').val();
                var pass = $('#password').val();
                 
                $.ajax({
                    url: 'ajax/auth.php',
                    type: 'POST',
                    cache: false,
                    data: {'username' : name, 'email' : email, 'login' : login, 'password' : pass},
                    dataType: 'html',
                    success: function (data) {
                       if(data == 1){
                           $("#auth_user").text("ok")
                           $("#errorBlock").hide();
                           document.location.reload(true);
                       }else{
                           $("#errorBlock").show();
                           $("#errorBlock").text(data);
                       }
                    }
                });
            });
           });
           
           
       </script>
       
  
    </body>
</html>



