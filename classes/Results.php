<?php



/**
 * Description of Results
 *
 * @author Hokkly
 */
class Results {
    
    private $connection;
    
    function __construct() {
        //$this->competition_id = $competition_id;
        //$this->archer_id = $archer_id;
        //$this->result = $result;
        //$this->distance = $distance;
           
        $con = new database_connection();
        $this->connection = $con->connection();
    }


    //get archer from database
    function get_archer($archer_id){
        $sql = "SELECT * FROM archers where id = '$archer_id'";
        $this->sql_query($sql);    
    }
    //insert archer to database
    function insert_archer($archer_id, $name, $surname, $bow = "recurve"){
       $sql = "INSERT INTO archers values('$archer_id','$name','$surname','$bow')";
       
       $this->sql_query($sql);
    }
    //add archer to competitions in database
    function add_arch_to_comp($archer_id, $comp_id){
        $sql = "SELECT * FROM competition_archers where archer_id = '$archer_id' and competition_id = $comp_id";
        
        
        $query = mysqli_query($this->connection, $sql);
        //check if archer already exist in participant list
        if(mysqli_num_rows($query) == 0){ 
            $sql = "INSERT INTO competition_archers values(0,'$archer_id', $comp_id)";  
            $this->sql_query($sql);
            
        }
 
    }
    //add result to database
    function add_result($archer_id, $comp_id, $res, $dist){
        $sql = "SELECT * FROM results 
                WHERE archer_id = '$archer_id'
                AND   competition_id = $comp_id 
                AND   distance = $dist";
        $query = mysqli_query($this->connection, $sql);
        
        if(mysqli_num_rows($query) == 0){
            $sql = "INSERT INTO results values(0,'$archer_id', $comp_id, $res, $dist)";
            //$this->sql_query($sql);
             
        }else{
            $sql = "UPDATE results SET result = $res WHERE archer_id = '$archer_id' AND distance = $dist AND competition_id = $comp_id";
        }
        $this->sql_query($sql);
    }
    
    function get_result($archer_id, $comp_id, $dist){
        $sql = "SELECT * FROM results 
                WHERE archer_id = '$archer_id'
                AND   competition_id = $comp_id
                AND   distance = $dist";
        $query = mysqli_query($this->connection, $sql);
        
        return $query;
    }
        


    //make sql query
    function sql_query($sql){
        $query = mysqli_query($this->connection, $sql);
        
        //echo mysqli_error($this->connection);
        
        if($query){ 
            return $query;
        }else{
            return false;
        }
    }
   //gets all competition participants
   function get_participants($competition_id){
        $sql = "select a.id,a.name,a.surname from archers as a
                    inner JOIN competition_archers as ca on ca.archer_id = a.id
                    inner join competitions as c on c.id = ca.competition_id
                    WHERE ca.competition_id = $competition_id";
        $query_result = mysqli_query($this->connection, $sql);
        
        if($query_result->num_rows > 0){
            return $query_result;
        }else{
            return false;
        }  
    }
    //function return archer results from competition
    //uses archer_id and competition_id to find results
    
    
}
