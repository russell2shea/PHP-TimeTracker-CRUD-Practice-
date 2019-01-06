<?php

$db = new PDO("sqlite:".__DIR__."/database.db");
var_dump($db);
//$db = new PDO("mysql:host=localhost;dbname=database;port=3306","root","root");
