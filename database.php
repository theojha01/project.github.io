<?php

	$servername = "localhost";
	$user = "root";
	$psw = "";

	$conn = mysqli_connect ($servername, $user, $psw);
		if (!$conn)
			die ("Could not Connect").mysqli_error ($conn);
		else
			echo "Successfully connected"."<BR>";

	$sql = "CREATE DATABASE data_school";
		if (mysqli_query ($conn, $sql))
			echo "Database successfully created"."<BR>";
		else
			echo "Error".mysqli_error ($conn);

	mysqli_select_db($conn, 'data_school');
	
	$sql = "CREATE TABLE user_names (
	user_id CHAR (16) PRIMARY KEY NOT NULL,
	user_psw CHAR (16) NOT NULL )";
		if (mysqli_query ($conn, $sql))
			echo "Successfully created Table"."<BR>";
		else
			echo "error - ".mysqli_error ($conn);
		
	$sql = "INSERT INTO user_names (user_id, user_psw) 
	VALUES ('a', '123')";
	if (mysqli_query ($conn, $sql))
		echo "new record successfully created"."<BR>";
	else
		echo "Error".mysqli_error ($conn);
	
	$sql = "INSERT INTO user_names (user_id, user_psw) 
	VALUES ('b', '456')";
	if (mysqli_query ($conn, $sql))
		echo "new record successfully created"."<BR>";
	else
		echo "Error".mysqli_error ($conn);
	
	$sql = "INSERT INTO user_names (user_id, user_psw) 
	VALUES ('c', '789')";
	if (mysqli_query ($conn, $sql))
		echo "new record successfully created"."<BR>";
	else
		echo "Error".mysqli_error ($conn);
	
	$sql = "INSERT INTO user_names (user_id, user_psw) 
	VALUES ('d', '1233')";
	if (mysqli_query ($conn, $sql))
		echo "new record successfully created"."<BR>";
	else
		echo "Error".mysqli_error ($conn);
	
	$sql = "INSERT INTO user_names (user_id, user_psw)
	VALUES ('e', '4566')";
	if (mysqli_query ($conn, $sql))
		echo "new record successfully created"."<BR>";
	else
		echo "Error".mysqli_error ($conn);
	
	mysqli_close ($conn);
?>