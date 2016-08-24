<?php require_once("../includes/global_header.php"); ?>

<?php
	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);
	
	$username = $_POST['username'];
	if (strlen($username) > 12) {
		error("Username is too long!", "?p=register");
	}
	if (strlen($username) < 1) {
		error("You must enter a username!", "?p=register");
	}
	$query = sprintf("SELECT * FROM `users` WHERE `Username` = '%s'",
		mysql_real_escape_string($username));
	$result = mysql_query($query) or die("mysql error: " . mysql_error());
	if (mysql_num_rows($result) > 0) {
		error("That username has already been taken!", "?p=register");
	}
	
	if (count(split(",", $_POST['interests'])) < 3) {
		error("You must eneter at least 3 interests!", "?p=register");
	}
	
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	if (strlen($password1) < 6) {
		error("Password is too short!", "?p=register");
	}
	if ($password1 != $password2) {
		error("Passwords don't match!", "?p=register");
	}
	$password = md5($md5_salt1 . $password1 . $md5_salt2);
	
	$email = $_POST['email'];
	if (strlen($email) < 5) {
		error("Invalid email!", "?p=register");
	}
	$query = sprintf("SELECT * FROM `users` WHERE `Email` = '%s'",
		mysql_real_escape_string($email));
	$result = mysql_query($query) or die("mysql error: " . mysql_error());
	if (mysql_num_rows($result) > 0) {
		error("That email address already has an account associated with it.", "?p=register");
	}
	
	$fullname = $_POST['fullname'];
	$website = $_POST['website'];
	$msn = $_POST['msn'];
	$skype = $_POST['skype'];
	$company = $_POST['company'];
	$location = $_POST['location'];
	
	$interests = $_POST['interests'];
	
	$query = "SELECT * FROM `users`";
	$result = mysql_query($query);
	$id = mysql_num_rows($result) + 1;
	
	$query = sprintf("INSERT INTO  `users` (
		`Username` ,`Password` ,`Email` ,`Website` ,
		`MSN` ,`Skype` ,`Interests` ,`Fullname`, `ID`,
		`Company`, `Location`
	) VALUES (
		'%s',  '$password',  '%s',  
		'%s',  '%s',  '%s',  '%s',  
		'%s', '$id', '%s', '%s'
	);",
		mysql_real_escape_string($username),
		mysql_real_escape_string($email),
		mysql_real_escape_string($website),
		mysql_real_escape_string($msn),
		mysql_real_escape_string($skype),
		mysql_real_escape_string($interests),
		mysql_real_escape_string($fullname),
		mysql_real_escape_string($company),
		mysql_real_escape_string($location)
	);
	
	$result = mysql_query($query)
		or die("mySQL error: " . mysql_error());
	
	$_SESSION['logged_in'] = true;
	$_SESSION['username'] = $username;
	$_SESSION['register_step'] = 'Step 2';
	$_SESSION['fullname'] = $fullname;
	$_SESSION['ID'] = $id;
	
	$query = sprintf("INSERT INTO `events` (`ID`, `Timestamp`, `About`, `Text`, 
		`Affects`, `Tags`, `Feed`, `Special`) VALUES (
		'0',
		'%s',
		'%s',
		'<strong>Just signed up for GeekNook!</strong> Their interests include %s.',
		'%s', 'Registration', 
		'Friendly',
		'Filler');",
		time(),
		mysql_real_escape_string(strlen($fullname) > 0 ? $fullname : $username),
		mysql_real_escape_string($interests),
		mysql_real_escape_string($username)
	);
	
	$result = mysql_query($query) or die("MYSQL ERROR: " . mysql_error());
		
	
	mysql_close($mysql);
	notice("Successfully registered!  You are now logged in.", "?p=register");

?>