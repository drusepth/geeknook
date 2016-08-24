<?php require_once("includes/global_header.php"); ?>

<?php 
	$people_per_page = 20;
	if (isset($_GET['page'])) {
		$page = $people_per_page * ($_GET['page'] - 1);
		$range = $page + $people_per_page;
	} else {
		$page = 0;
		$range = $people_per_page;
	}
?>
<p>
	<ul class="people_list">
		<?php
			$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
				or die('Could not connect to mySQL: ' . mysql_error());
			mysql_select_db($mysql_prefix . $mysql_database, $mysql);
			
			$query = "SELECT * FROM `users` ORDER BY `ID` DESC LIMIT $page, $range";
			$result = mysql_query($query) or die("mysql error: " . mysql_error());
			while ($person = mysql_fetch_row($result)) {
		?>
	
		<li>
			<a href="index.php?p=user&id=<?php echo $person[0]; ?>"><img src="people/photos/<?php echo $person[0]; ?>.jpg"></a>
			<h3><a href="index.php?p=user&id=<?php echo $person[0]; ?>"><?php echo ((strlen($person[8]) > 0) ? $person[8] : $person[1]); ?></a></h3>
			<span><?php echo $person[9]; ?></span>
			<br />
			<div>
				Interests: 
				<?php
					showInterests($person[1]);
				?>
			</div>
		</li>
		<?php
			}
		?>
	</ul>