<?php require_once("includes/global_header.php"); ?>

<?php

	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);
	
	if (isset($_GET['n'])) {
		$company_name = mysql_real_escape_string($_GET['n']);
	
		$query = "SELECT * FROM `users` WHERE `Company` = '$company_name'";
		$result = mysql_query($query) or die("error: " . mysql_error());
		$info = mysql_fetch_row($result);
	?>
		
	<?php
	}
	
?>