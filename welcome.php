<?php //welcome.php
	session_start();
	echo "Welcome in your dashboard ".$_SESSION['fullname'].".<br>";
	echo "Click <a href='logout.php'>here</a> if you want to log out.";
?>