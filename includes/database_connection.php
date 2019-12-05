<?php


/**
 * Description of database_connection
 *
 * @author Hokkly
 */
class database_connection {
    function connection(){
        $connection = mysqli_connect('127.0.0.1','root','','archers_db');//(server, username, password, database)

	if($connection == false){
		echo 'fail to connect to database';
		echo mysqli_connect_error();//error working with mysql
		exit();
	}  
        
        return $connection;
    }
}
