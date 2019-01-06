<?php

/* Try to create an object from the php data class to connect to sqlite database file*/
try{ 
	$db = new PDO("sqlite:".__DIR__."/database.db");

	//Tell PDO all error should be seen as an exception
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} 

/* Throw exception if there is problem connecting. Dispaly error message and end*/
catch (Exception $e){
	echo $e->getMessage();
	exit;
}

