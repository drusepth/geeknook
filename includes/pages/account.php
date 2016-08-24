<?php require_once("includes/global_header.php"); ?>

<?php
	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);
	
	$query = "SELECT * FROM `users` WHERE `Username` = '" . mysql_real_escape_string($_SESSION['username']) . "'";
	$result = mysql_query($query) or die("error: " . mysql_error());
	$info = mysql_fetch_row($result);
?>

<div>

	<div class="menubar">
	
		<a href="index.php?p=account&tab=personal">Personal Information</a>
		<a href="index.php?p=account&tab=feeds">Feed Settings</a>
		<a href="index.php?p=account&tab=profile">Profile Setup</a>
		<a href="index.php?p=account&tab=layout">Website Layout</a>
		<a href="index.php?p=account&tab=email">Emails</a>
		
		
	</div>
	
	<?php
		if (!isset($_GET['tab'])) {
			$tab = 'personal';
		} else {
			$tab = $_GET['tab'];
		}
		
		require_once("includes/pages/account/$tab.php");
	?>

	
	
</div>