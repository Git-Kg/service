<?php
	$host="localhost";
	$database="service";
	$user="root";
	$password="";
	
	//$pdoError = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, );
	
	$pdo=new PDO("mysql:host=$host;dbname=$database",$user,$password );

?>

