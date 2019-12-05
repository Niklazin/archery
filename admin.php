<?php
    require 'includes/database_connection.php';
    require 'classes/competition.php';
?>

<html>
    <head>
    <?php require 'blocks/head.php'; ?>    
        <title>title</title>
    </head>
    <body>
        <?php 
        require 'includes/db.php';
        require 'blocks/header.php'; 
        ?>
        
        <main class="container mt-5">
            <h1>Sacensības</h1>
            <div class="row">
                <div class="col-md-8 mb-5">
                    <ul>
                        <div class="competitions">
                            <?php
                            if(isset($_COOKIE['login'])){
                                $competition = new Competition();
                                //after chooing competition redirect to page with info(results, archers..)
                                $comp_list = $competition->get_competition_name();
                                while($row = $comp_list->fetch_assoc()){
                                     echo "<li>"
                                            . "<a href='result_edit.php?id={$row['id']} & distances={$row['distances']}'>" . $row['Name'] . "</a>"
                                        . "</li>";                                                            
                                }     
                            }else{
                                header("location: /auth.php");
                            }

                            ?>
                        </div>


                    </ul>
                    <a href="competition_add.php">Pievienot sacensības</a>
                </div>
            </div>
        </main>

    </body>
</html>
