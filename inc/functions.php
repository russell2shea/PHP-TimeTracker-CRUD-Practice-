<?php
//application functions

/* Try to pull Projects from the database */
	function get_project_list(){

		//Take all code from the connection.php file and copy it here. Wills how warning not fatal error if something goes wrong
		include 'connection.php';
		
		// try to read columns from the projects table
		try{
			return $db->query('
				SELECT project_id, title, category 
				FROM projects
			');
		}

		//If can't read them show error message and stop
		catch(Exception $e){
			echo "Error!:".$e->getMessage()."</br>";
			return array();

		}


	}