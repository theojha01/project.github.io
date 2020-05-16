<!DOCTYPE HTML>
<HTML LANG = "EN-IN">
	<HEAD>
		<TITLE> LOGIN </TITLE>
		<STYLE>
			.login {
				background-color: #FF0000; /*Red*/
				color: #F5F5F5; /*White Smoke*/
				text-align: center;
				font-family: "Segoe UI Semibold", Arial, Helvetica, sans-serif;
				font-size: 18px;
				border-radius: 8px;
				padding: 8px;
				box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
			}
			
			.login-button {
				background-color: #035996; /*Snorkel Blue*/
				color: #F5F5F5; /*White Smoke*/
				padding: 4px 12px;
				font-family: "Segoe UI Semibold", Arial, Helvetica, sans-serif;
				font-size: 18px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				cursor: pointer;
				border: none;
				border-radius: 4px;
			}
			
			input[type=text] {
				width: 100%;
				padding: 6px 8px;
				box-sizing: border-box;
				border: none;
			}
			
			input[type=password] {
				width: 100%;
				padding: 6px 8px;
				box-sizing: border-box;
				border: none;
			}
		</STYLE>
	</HEAD>
	<BODY bgcolor="yellow" ONLOAD = "frm.reset();">
		<CENTER>
			<OBJECT WIDTH = "100%" HEIGHT = "250">
				<PARAM NAME = "MOVIE" VALUE = "photo\1.swf">
				<EMBED SRC = "photo\1.swf" WIDTH = "100%" HEIGHT = "250"></EMBED>
			</OBJECT>
			<TABLE BORDER = "0" CELLPADDING = "8" CELLSPACING = "2" CLASS = "login">
			<FORM NAME = "frm" METHOD = "POST" AUTOCOMPLETE = "OFF" ACTION = "Login.php">
				<TR>
					<TD> Username </TD>
					<TD>
						<INPUT TYPE = "TEXT" NAME = "t1" SIZE = "25" PLACEHOLDER = "Enter your Username" REQUIRED AUTOFOCUS>
					</TD>
				</TR>
				<TR>
					<TD> Password </TD>
					<TD>
						<INPUT TYPE = "PASSWORD" NAME = "t2" SIZE = "25" PLACEHOLDER = "Enter your Password" REQUIRED>
					</TD>
				</TR>
				<TR>
					<TD COLSPAN = "2" ALIGN = "RIGHT">
						<INPUT TYPE = "SUBMIT" VALUE = "Login" NAME = "submit" CLASS = "login-button">
					</TD>
				</TR>
			</FORM>
			</TABLE>
		</CENTER>
	</BODY>
</HTML>

<?php

if (isset($_POST['submit']))
{
	$servername = "localhost";
	$user = "root";
	$psw = "";
	$dbname = "data_school";

	$conn=mysqli_connect($servername, $user, $psw, $dbname);
		if (!$conn)
			die ("Could not Connect").mysqli_error ($conn);
		else
			mysqli_select_db ($conn, $dbname);

	$id = stripslashes ($_POST["t1"]);
	$pw = stripslashes ($_POST["t2"]);

	$sql = "SELECT user_id, user_psw FROM user_names WHERE user_id = '$id' AND user_psw ='$pw' ";
	
	$result = mysqli_query ($conn, $sql);	

	if (mysqli_num_rows ($result)>0) 
	{
		echo
			"<SCRIPT LANGUAGE = 'JAVASCRIPT'>
				alert ('Welcome!');
			</SCRIPT>";
			//if the entered record exists, the user receives a Welcome! message and is redirected to the main page
		session_start();
		$_SESSION['user'] = $id;
		header ("location: real1.html");
	}
	
	else
	{
		echo
			"<SCRIPT LANGUAGE = 'JAVASCRIPT'>
				alert ('Incorrect Username or Password');
			</SCRIPT>"; //displays an alert message if the username or password is incorrect
		header ("location: Login.php");
	}
} //End of If Statement

?>