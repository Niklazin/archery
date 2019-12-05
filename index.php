<?php
    require 'includes/database_connection.php';
    require 'classes/competition.php';
    require 'includes/db.php';



?>

<html>
    <head>
    <?php require 'blocks/head.php'; ?>    
        <title>News</title>
    </head>
    <body>
        <?php require 'blocks/header.php'; ?>
        
        <main class="container mt-5">
            <h1>Aktuālas sacensības</h1>
            <div>
                <ul>
                    <div class="competitions">
                        <?php

                            $sql = "SELECT * FROM competitions as c
                                    INNER JOIN competition_info as ci on ci.comp_id = c.id";
                            $query = mysqli_query($connection, $sql);
                            
                            while($comp = $query->fetch_assoc()){
                                echo "<div class='mb-2 jumbotron'>
                                      <p><b>{$comp['Name']}</b></p>
                                      <p>Vieta: {$comp['city']}</p>
                                      <p>Informācija: {$comp['info']}</p>
                                      <p>datums: <mark>{$comp['date']}</mark></p>
                                      </div>";
                            }
                                          

                        ?>
                    </div>


                </ul>
            </div>
        </main>

    </body>
</html>
