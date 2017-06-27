<?php //register.php
	
//form code 


	echo <<<_HTMLCODE
	<pre>
	<form action="register.php" method="post">
	Please fill this form to register a new user.
	
	First name:      <input type="text" name="fname" ><br>
	Surname name:    <input type="text" name="sname" ><br>
	Email:           <input type="text" name="email" ><br>
	Username:        <input type="text" name="username" ><br>
	Password:        <input type="password" name="pw1" ><br>
	Repeat Password: <input type="password" name="pw2"><br>
			<input type="submit" value="Register">
	</pre>
	</form>
_HTMLCODE;

//connect to database
require_once 'functions.php';
$connection=db_connect();
if ($connection->connect_error) exit("Failed to connect to database".$connection->connect_error);

if ((isset($_POST["fname"]) AND isset($_POST["sname"]) AND isset($_POST["email"]) AND isset($_POST["username"]) AND isset($_POST["pw1"]) AND isset($_POST["pw2"])))
{

	if ($_POST["pw1"]!=$_POST["pw2"]) exit("Please enter matching passwords.<br>");
	
	$fname=cleaninput($connection,$_POST["fname"]);
	$sname=cleaninput($connection,$_POST["sname"]);
	$email=cleaninput($connection,$_POST["email"]);
	$username=cleaninput($connection,$_POST["username"]);
	$password=cleaninput($connection,$_POST["pw1"]);
	
	$s1="hf45sfsd";
	$s2="bfs45s";
	$password=$s1.$password.$s2;
	$password=hash('ripemd128',$password);
	
	$connection->query("INSERT INTO accounts VALUES('','$fname','$sname','$email','$username','$password')");
	if ($connection->error) exit("failed to create new user ".$connection->error);
	else echo "New user $username was created successfully. Click <a href='index.php'>here</a> to login.";

}


?>