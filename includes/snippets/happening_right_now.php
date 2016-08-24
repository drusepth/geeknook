<?php
	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);
?>

	<ul class="people_list">
	<?php
		if (!isset($whats_happening_right_now_feed_limit)) {
			die("<strong>Invalid use of snippet: happening_right_now.php.</strong><br />Error: <em>\$whats_happening_right_now_feed_limit is undefined!</em>");
		}
		if (($whats_happening_right_now_feed_limit / 1) !== $whats_happening_right_now_feed_limit) {
			die("<strong>Invalid use of snippet: happening_right_now.php.</strong><br />Error: <em>\$whats_happening_right_now_feed_limit requires a numeric value!</em>");
		}
		
		$query = "SELECT * FROM `events` ORDER BY `Timestamp` DESC LIMIT $whats_happening_right_now_feed_limit";
		$result = mysql_query($query) or die("mysql_error: " . mysql_error());
		
		while ($info = mysql_fetch_row($result)) {
			$query = "SELECT * FROM `users` WHERE `Username` = '" . $info[2] . "' OR `Fullname` = '" . $info[2] . "'";
			$person_result = mysql_query($query) or die("mysql error: " . mysql_error());
			$about_person_info = mysql_fetch_row($person_result);
			
			$person_id = $about_person_info[0];
			$person_location = $about_person_info[9];
	?>
		<li>
			<img src="people/photos/<?php echo $person_id; ?>.jpg">
			<h3><a href="index.php?p=user&id=<?php echo $person_id; ?>"><?php echo $info[2]; ?></a></h3>
			<span><?php echo $person_location; ?></span>
			<br />
			<div>
				<?php
					echo $info[3];
				?>
			</div>
		</li>
		<?php
			}
		?>
	</ul>