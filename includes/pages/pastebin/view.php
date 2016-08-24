<?php

	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);

	if (!is_numeric($_GET['id'])) {
		header("Location: index.php?p=pastebin");
		die;
	}
	
	$id = mysql_real_escape_string($_GET['id']);
	
	$query = "SELECT * FROM `pastes` WHERE `ID` = '$id' LIMIT 1";
	$result = mysql_query($query) or die("Mysql error: " . mysql_error());
	
	if (mysql_num_rows($result) == 0) {
		header("Location: index.php?p=pastebin");
		die;
	}
	
	$result = mysql_fetch_row($result);
		
?>

<h2><?php echo $result[2]; ?></h2>
<h4><?php echo $result[3]; ?> code, written at <?php echo $result[1]; ?> Epoch</h4>

<div id="pastebin_code">
	<?php 
		$code = stripslashes($result[4]);
		$code = eregi_replace('<', '&lt;', $code);
		$code = eregi_replace('>', '&gt;', $code);
		$code = eregi_replace("\n", '<br />', $code);
		#$code = eregi_replace("\s", '&nbsp;', $code);
		$code = eregi_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $code);
	
		echo $code; 
	?>
</div>