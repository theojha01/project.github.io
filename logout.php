<?php

	session_start('user'); // Initialize the session
	if (isset($_SESSION ['user']))
		{
			unset ($_SESSION ['user']);
		}
	session_destroy(); // Destroy the session	
	header("location: Login.php"); // Redirect to login page
	exit;

?>