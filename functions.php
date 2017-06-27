<?php //functions.php

$host="localhost";
$un="root";
$pw="";
$db="database";

function db_connect()
{
	global $host,$un,$pw,$db;
	$connection=new mysqli($host,$un,$pw,$db);	
	if ($connection->connect_error) exit ("Couldn't connect to the database".$connection->connect_error);
	return $connection;
}

function cleaninput($connection,$input)
{
	$input=stripslashes($input);
	$input=strip_tags($input);
	$input=htmlentities($input);
	return $input;
}
?>