<?php
    require 'includes/database_connection.php';
    require 'classes/competition.php';
    require 'includes/db.php';



?>

<html>
    <head>
    <?php require 'blocks/head.php'; ?>    
        <title>title</title>
    </head>
    <body>
        <?php require 'blocks/header.php'; ?>
        
        <main class="container mt-5">
            <div>
                <ul>
                    <div class="competitions">
                        <?php

                        $competition = new Competition();
                        //after chooing competition redirect to page with info(results, archers..)
                        $comp_list = $competition->get_competition_name();
                        while($row = $comp_list->fetch_assoc()){
                             echo "<li>"
                                    . "<a href='competition_print.php?id={$row['id']} & distances={$row['distances']}'>" . $row['Name'] . "</a>"
                                . "</li>";                                                            
                        }                  

                        ?>
                    </div>


                </ul>
            </div>
        </main>

    </body>
</html>


