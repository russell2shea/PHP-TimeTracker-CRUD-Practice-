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

/* Try to pull all tasks from the database */
	function get_task_list(){

		//Take all code from the connection.php file and copy it here. Wills how warning not fatal error if something goes wrong
		include 'connection.php';

		//Join projects and tasks tables to get the project title from all tasks
		$sql = 'SELECT tasks.*, projects.title as project FROM tasks'
			. ' JOIN projects ON tasks.project_id = projects.project_id';
		
		try{
			return $db->query($sql);
		}

		//If can't read them show error message and stop
		catch(Exception $e){
			echo "Error!:".$e->getMessage()."</br>";
			return array();

		}

	}

/* Add a project to the DB */
	function add_project($title, $category){
		include 'connection.php';

		// SQL to Create new column into projects table
		$sql = 'INSERT INTO projects(title,category)VALUES(?,?)';

		try{
			// optimize SQL statment to prevent errors
			$results = $db->prepare($sql);

			// Bind(first place holder, var, data type for that param)
			$results->bindValue(1, $title, PDO::PARAM_STR);
			$results->bindValue(2, $category, PDO::PARAM_STR);

			//Execute the prepared query. 
			$results->execute();


		}
		catch(Exception $e) {
			echo "Error!:".$e->getMessage()."<br>";
			return false;
		}

		return true;

	}

/* Add a task to the DB */
	function add_task($project_id, $title, $date, $time){
		include 'connection.php';

		// SQL to Create new column into projects table
		$sql = 'INSERT INTO tasks(project_id, title, date, time) VALUES(?, ?, ?, ?)';

		try{
			// optimize SQL statment to prevent errors
			$results = $db->prepare($sql);

			// Bind(# place holder, var, data type for that param)
			$results->bindValue(1, $project_id, PDO::PARAM_INT);
			$results->bindValue(2, $title, PDO::PARAM_STR);
			$results->bindValue(3, $date, PDO::PARAM_STR);
			$results->bindValue(4, $time, PDO::PARAM_INT);

			//Execute the prepared query. 
			$results->execute();


		}
		catch(Exception $e) {
			echo "Error!:".$e->getMessage()."<br>";
			return false;
		}

		return true;

	}