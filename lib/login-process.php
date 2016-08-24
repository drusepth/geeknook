<?php require_once("../includes/global_header.php"); ?>

<?php

	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);
	
	if (!(isset($_POST['username']) and isset($_POST['password']))) {
		error("Invalid username/password combination", "?p=signin");
	}
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$password = md5($md5_salt1 . $password . $md5_salt2);
	
	$query = sprintf("SELECT `Fullname`, `ID` FROM `users` WHERE `Username` = '%s' AND `Password` = '$password' LIMIT 1", 
		mysql_real_escape_string($username));
		
	$result = mysql_query($query) or die("mysql error" . mysql_error());
	
	
	if (mysql_num_rows($result) > 0) {
		// Logged in		
		$row = mysql_fetch_row($result);
		$_SESSION['logged_in'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['fullname'] = $row[0];
		$_SESSION['ID'] = $row[1];
		
		notice("Successfully logged in!", "?p=home");
	} else {
		error("Invalid username/password combination", "?p=login");
	}
	
?>