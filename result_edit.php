<?php

    require './includes/database_connection.php';
    require './classes/Results.php';
    
    $competition_id = $_GET["id"];
    //$distances = $_GET["distances"];
    //$competition = $_GET["competition"];
    $ar = 1;
    
    
?>

<html>
    <head>
    <?php require 'blocks/head.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>title</title>
    </head>
    <body>
        <?php require './blocks/header.php'; ?>
        
        
        <form method="POST" action="./pages/result_edit_action.php?competition_id=<?= $competition_id ?>">
            <div id="container">
                <table id="results">
                    <?php
                    $res = new Results();
                    $participants = $res->get_participants($competition_id);
                    
                        
                    if($participants){
                        
                        while($arch = $participants->fetch_assoc()){
                            
                            echo "<td><input value='{$arch['id']}' name=archer_id". $ar ." type='text' placeholder='archery id' size='4'></input>
                                  <td><input value='{$arch['name']}' name=name" . $ar ." type='text' placeholder='vards' size='10'></input>
                                  <td><input value='{$arch['surname']}' name=surname" . $ar . " type='text' placeholder='uzvards' size='10'></input>";
                            for($i = 1; $i <= 24; $i++){
                                $result = $res->get_result($arch['id'], $competition_id, $i);
                                if($result){
                                    $result = $result->fetch_assoc();
                                    
                                    echo "<td><input value='{$result['result']}' name=r" . $ar . $i . "  type='number' min='1' max='300'></td>";
                                }else{
                                    echo "<td><input name=r" . $ar . $i . "  type='number' min='1' max='300'></td>"; 
                                }
                            }
                            $ar++;

                            echo "<tr></tr>";
                        }
                    }
                        
                    ?>   
                </table>
                <h1><a href="#" id ="add">+</a></h1>
                <br>
                <button>Saglabāt</button>
            </div>
            
        </form>
        
        <script>
            $(document).ready(function(e){
                //variables
                var archer = <?php echo $ar ?>;
                
                
                //add rows to form
                $("#add").click(function(e){
                    $("#results").append("<td><input name=archer_id"+archer+" type='text' placeholder='archery id' size='4'></input> \n\
                                          <td><input name=name"+archer+" type='text' placeholder='vards' size='10'></input>\n\
                                          <td><input name=surname"+archer+" type='text' placeholder='uzvards' size='10'></input>" 
                    );
                    addInputs(archer);
                    archer++;  
                })
            });
            
            function addInputs(archer){
                for(var i = 1; i <= 24; i++){
                    $("#results").append("<td><input name=r" + archer + i + "  type='number' min='1' max='300'></td>");
                } 
                $("#results").append("<tr></tr>");
            }
            
        </script>
            

    </body>
</html>


 <?php
           /*     
                    //get_competiton_results return atributes:
                    //id, name, surname
                    //if competitions don't have results then if don't pass
                    if($participant_list = $competition->get_participants($competition_id)){
                        
                        while($archer = $participant_list->fetch_assoc()){
                        //get_results return all archer results, from competition, using archer id and competition id


                        echo "<div>"

                                . "<tr>"
                                    . "<td><input type='text' value = ". $archer['id'] . "></input></td>"
                                    . "<td><input type='text' value = ". $archer['name'] . "></input></td>"
                                    . "<td><input type='text' value = ". $archer['surname'] ."></input></td>";

                                if($result_list = $competition->get_results($archer['id'], $competition_id)){
                                    while($result = $result_list->fetch_assoc()){

                                        echo "<td>
                                                <input type='number' value = " . $result['result'] . "></input>"
                                             ."</td>";

                                    }
                                }else{
                                    echo"<td>"."</td>";
                                }

                                echo "</tr>";

                        }
                        
                    }else{
                    
                    }
                    
                */
                ?>


