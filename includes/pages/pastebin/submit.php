<?php

	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);

	$language = $_POST['language'];
	$code = $_POST['code'];
	$author = $_POST['author'];
	if (strlen($author) == 0) { $author = "Anonymous"; }
	$timestamp = time();
	
	$query = "SELECT * FROM `pastes`";
	$result = mysql_query($query);
	$id = mysql_num_rows($result) + 1;

	$query = sprintf("INSERT INTO `pastes` (`ID`, `Timestamp`, `Author`, `Language`, `Code`)
		VALUES ('$id', '$timestamp', '%s', '%s', '%s');",
			mysql_real_escape_string($author),
			mysql_real_escape_string($language),
			mysql_real_escape_string($code)
		);
		
	$result = mysql_query($query);
	
	header("Location: index.php?p=pastebin&id=$id");
	
?>