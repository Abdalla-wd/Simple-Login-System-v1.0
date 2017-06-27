<?php //index.php

session_start();

//form code
echo <<<_HTMLCODE
<center>
Please insert your username and password:<br><br>

<form action="index.php" method="post">
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br><br>
<Input type="submit" value="Login"><br><br>
</form>
Click <a href="register.php">here </a>to register a new account.
</center>
_HTMLCODE;

//database connection code
require_once 'functions.php';

$connection= db_connect();

if (isset($_POST["username"]) && isset($_POST["password"]))
{
	$username=cleaninput($connection,$_POST["username"]);
	$password=cleaninput($connection,$_POST["password"]);
	
	$s1="hf45sfsd";
	$s2="bfs45s";
	$password=$s1.$password.$s2;
	$password=hash('ripemd128',$password);
		
	$searchresult=$connection->query("SELECT * FROM accounts WHERE username='$username'");
	$userrecord=$searchresult->fetch_array(MYSQLI_ASSOC);
	
if ($userrecord!=[''] AND $userrecord['password']==$password)
	{
		
		$_SESSION['fullname'] = $userrecord["fname"]." ".$userrecord["sname"];
		echo $_SESSION['fullname'];

		header("Location: Welcome.php");
		exit;
	}
	else
	{
		echo "<br><center>Incorrect username/password combination</center>";
	}
	

}




?>