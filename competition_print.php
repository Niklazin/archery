<?php

    require 'includes/database_connection.php';
    require 'classes/competition.php';
    
    
    $competition_id = $_GET["id"];
    //$competition = $_GET["competition"];
    
    $competition = new Competition();
    
?>

<html>
    <head>
    <?php require 'blocks/head.php'; ?>
    <link rel ="stylesheet" type="text/css" href="../style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>title</title>
    </head>
    <body>
    <?php require 'blocks/header.php'; ?>  
        <script>
            
            
        </script>
        
        <form method="POST">
            <div id="container">
                <table>
                <?php
                
                    //get_competiton_results return atributes:
                    //id, name, surname
                    $participant_list = $competition->get_participants($competition_id);
                    
                    if(!$participant_list){
                        exit();
                    }
                    
                    while($archer = $participant_list->fetch_assoc()){
                    //get_results return all archer results, from competition, using archer id and competition id
                    
                     
                    echo "<div>"
                        
                            . "<tr>"
                                . "<td>". $archer['id'] . "</td>"
                                . "<td>". $archer['name'] . "</td>"
                                . "<td>". $archer['surname'] . "</td>";
                    
                            if($result_list = $competition->get_results($archer['id'], $competition_id)){
                                while($result = $result_list->fetch_assoc()){

                                    echo "<td>"
                                            . $result['result']
                                         ."</td>";

                                }
                            }else{
                                echo"<td>"."</td>";
                            }
                            
                            echo "</tr>";
                        
                    }
                   
                
                ?>
                </table>
                
            </div>
            
        </form>
            

    </body>
</html>


