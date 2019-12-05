<?php


/**
 * Description of competition
 *
 * @author Hokkly
 */
class Competition {
    
    private
            $name,
            $distances,
            $connection; //connection uses to commenicate with database
    
    function __construct() {
        $db = new database_connection();
        $this->connection= $db->connection();      
    }
    
    function setName($name){
        $this->name = $name;
    }
    
    function setDistances($distances){
        $this->distances = $distances;
    }
    

    //function return all competitions id and names from database
    function get_competition_name(){            
        $sql = "SELECT * from competitions";

        $query_result  = $this->connection->query($sql);
        
        if($query_result->num_rows > 0){
            return $query_result;
        }else{
            return false;
        }           
    }
    //function return all archers that participate competition
    //competition choose using id
    function get_participants($competition_id){
        $sql = "select a.id,a.name,a.surname from archers as a
                    inner JOIN competition_archers as ca on ca.archer_id = a.id
                    inner join competitions as c on c.id = ca.competition_id
                    WHERE ca.competition_id = $competition_id";
        $query_result = $this->connection->query($sql);
        
        if($query_result->num_rows > 0){
            return $query_result;
        }else{
            return false;
        }  
    }
    //function return archer results from competition
    //uses archer_id and competition_id to find results
    function get_results($archer_id, $competition_id){
        $sql = "select r.distance, r.result 
                    from results as r 
                    inner join archers as a on a.id = r.archer_id 
                    inner join competitions as c on c.id = r.competition_id
                    where a.id = '$archer_id' and c.id = $competition_id";
        
        $query_result = $this->connection->query($sql);
        
        if($query_result){
            return $query_result;
        }else{
            return false;
        }
        
    }
    
    function add_competition_to_DB(){
        $sql = "insert into competitions values(0, '$this->name', $this->distances)";
        echo $this->name;
        echo '<br>' . $this->distances;
        echo '<br>';
        
        $query = mysqli_query($this->connection, $sql);

        if($query){
            echo 'Pievienots';
        }else{
            echo 'Kļuda';
        }
    }
    
    function check_name($comp_name){
        $sql = "SELECT * FROM competitions where name = '$comp_name'";
        $query = mysqli_query($this->connection, $sql);
        
        if($query->num_rows == 0){
            return false;
        }else{
            return true;
        }
    }
    
    
}
