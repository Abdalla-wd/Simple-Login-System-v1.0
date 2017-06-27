<?php
session_start();
session_destroy();
echo "You are now logged out. Thank you for your visit.<br>";
echo "Click <a href='index.php'>here</a> if you want to log in again.";
?>