<?php
require_once "functions.php";
$connection=db_connect();
if ($connection->connect_error) exit("Failed to connect to database: ".$connection->connect_error."<br>");
else echo "Connected to database successfully.<br>";

$connection->query("CREATE TABLE accounts(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
fname VARCHAR(35) NOT NULL,
sname VARCHAR(35) NOT NULL,
email VARCHAR(50) NOT NULL,
username VARCHAR(35) NOT NULL UNIQUE,
password VARCHAR(35) NOT NULL
)
");
if ($connection->error) exit("Failed to create table accounts in the database: ".$connection->error);
else echo "Installing is complete. Please click <a href='index.php'> here</a> to go to the start page and login or create a new account.";
?>