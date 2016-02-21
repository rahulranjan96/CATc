<?php
require 'core.php';
require 'conn.php';

if(loggedin())
{
	echo 'you are logged in.<a href="logout.php">log out</a>';
} else {
	include 'login.php';
	}
?>