<?php
	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);
	
	require_once("includes/fun_arrays/feed_arrays.php");
	
	
?>

	<h2>Project News</h2>
	<div class="right_toolbox">
		<a href="index.php?p=account&tab=feeds"><img src="images/icons/cog.png" title="Settings"></a>
		<a href="#"><img src="images/icons/add.png" title="Add another entry"></a>
		<a href="#"><img src="images/icons/delete.png" title="Remove last entry"></a>
	</div>
	
	<ul class="project_feed_list">
		<li>
			<img src="images/icons/tick.png">
			<strong><a href="index.php?p=user&id=<?php echo $person_id; ?>">Jim Dean</a></strong>
			just <strong>completed a task</strong> named, "<a href="#">Scoreboard Backend</a>" for the project, <a href="#">iPhone App: "TapDefense"</a>.

		</li>
		<li>
			<img src="images/icons/brick_add.png">
			<strong><a href="index.php?p=user&id=<?php echo $person_id; ?>">Nick Black</a></strong>
			just <strong>started a new project</strong> entitled, "<a href="#">Diablo II Mod: Nightfire</a>".
		</li>
		<li>
			<img src="images/icons/brick_delete.png">
			<strong><a href="index.php?p=user&id=<?php echo $person_id; ?>">Brian Youlen</a></strong>
			has <strong>abandoned</strong> the project, "<a href="#">Distributed Downloading</a>".
		</li>
	</ul>
	<p class="posted"><a href="#">(See More)</a></p>

	
	<?php
		# Get the user's settings
		$query = "SELECT * FROM `settings` WHERE `username` = '" . $_SESSION['username'] . "' LIMIT 1";
		$result = mysql_query($query) or die("mysql error: " . mysql_error());
		if (!mysql_num_rows($result) > 0) {
			# If they haven't already set their settings, set them for them
			$friendly_feed_length = 7;
			$project_feed_length = 3;
			
			$query = "INSERT INTO  `settings` (`username`, `friendly_feed_length`, `project_feed_length`)
				VALUES (
					'" . $_SESSION['username'] . "',  '" . $friendly_feed_length . "',  '" . $project_feed_length . "'
				);";
			
			$update_settings_result = mysql_query($query) or die("Mysql error: " . mysql_error());
			
		} else {
			# If they already had their settings set
			$settings = mysql_fetch_row($result);
			$friendly_feed_length = $settings[1];
			$project_feed_length = $settings[2];
		}
		
		
	?>
	
	<?php
	/*
	<div class="notification_blue">
		<div class="notification_blue_title"><?php if (rand(0,10) == 0) { echo 'ZOMG '; } ?>What's this?  An alert?</div>
		<div class="right_toolbox">
			<a href="#"><img src="images/icons/tick.png" title="Okay - remove this alert."></a>
			<a href="#"><img src="images/icons/time.png" title="Remind me tomorrow."></a>
			<a href="index.php?p=account&tab=alerts"><img src="images/icons/cog.png" title="Settings"></a>
			
		</div>
		<div class="notification_content">
			A new blog entry addressing the state of GeekNook has been posted. <br /> 
			<a href="index.php?p=blog">You can read it by clicking this sentence right here.</a>
		</div>
	</div>
	*/
	?>
	
	<h2>Friendly Feed</h2>
	<div class="right_toolbox">
		<a href="index.php?p=account&tab=feeds"><img src="images/icons/cog.png" title="Settings"></a>
		<a href="#"><img src="images/icons/add.png" title="Add another entry"></a>
		<a href="#"><img src="images/icons/delete.png" title="Remove last entry"></a>
	</div>
	
	<ul class="friendly_feed_list">
		<?php
			$query = "SELECT * FROM `events` WHERE `Feed` = 'Friendly' AND `Affects` LIKE '%" . $_SESSION['username'] . "%' ORDER BY `Timestamp` DESC LIMIT " . $friendly_feed_length;
			$friendly_feed_results = mysql_query($query) or die("mysql error: " . mysql_error());
			
			$friendly_feed_current_length = 0;
			
			while ($friendly_feed_result = mysql_fetch_row($friendly_feed_results)) {
				$friendly_feed_current_length++;
				$query = "SELECT * FROM `users` WHERE `Username` = '" . $friendly_feed_result[2] . "' OR `Fullname` = '" . $friendly_feed_result[2] . "'";
				$person_result = mysql_query($query) or die("mysql error: " . mysql_error());
				$about_person_info = mysql_fetch_row($person_result);
				
				$person_id = $about_person_info[0];
				$person_location = $about_person_info[9];
				$feed_type = $friendly_feed_result[7];
		?>
		<li>
			<img src="images/icons/
			<?php
				if ($feed_type == "Registration") {
					echo "user_add";
				}
			?>
			.png">
			<strong><a href="index.php?p=user&id=<?php echo $person_id; ?>"><?php echo $friendly_feed_result[2]; ?></a></strong>
			has just registered for GeekNook.  
			<?php
				if (rand(0, 100) == 0) {
					$what_to_say = rand(0, count($friendly_feed_sources) - 1);
					echo $friendly_feed_sources[$what_to_say];
				}
			?>
		</li>
		<?php
			}
			
			
			
			
			$feed_left_to_go = $friendly_feed_length - $friendly_feed_current_length;
			$query = "SELECT * FROM `events` WHERE `Feed` = 'Friendly' AND `Special` = 'Filler' ORDER BY `Timestamp` DESC LIMIT $feed_left_to_go";
			$friendly_feed_results = mysql_query($query) or die("Mysql error: " . mysql_error());
			
			while ($friendly_feed_result = mysql_fetch_row($friendly_feed_results)) {
				$friendly_feed_current_length++;
				$query = "SELECT * FROM `users` WHERE `Username` = '" . $friendly_feed_result[2] . "' OR `Fullname` = '" . $friendly_feed_result[2] . "'";
				$person_result = mysql_query($query) or die("mysql error: " . mysql_error());
				$about_person_info = mysql_fetch_row($person_result);
				
				$person_id = $about_person_info[0];
				$person_location = $about_person_info[9];
				$feed_type = $friendly_feed_result[7];
				
		?>
		<li>
			<img src="images/icons/
			<?php
				if ($feed_type == "Registration") {
					echo "user_add";
				}
			?>
			.png">
			<strong><a href="index.php?p=user&id=<?php echo $person_id; ?>"><?php echo $friendly_feed_result[2]; ?></a></strong>
			has just registered for GeekNook.  
			<?php
				if (rand(0, 100) == 0) {
					$what_to_say = rand(0, count($friendly_feed_sources) - 1);
					echo $friendly_feed_sources[$what_to_say];
				}
			?>
		</li>
		<?php
			}
		?>
		
	</ul>
	<p class="posted"><a href="index.php?p=feed&which=friendly">(See More)</a></p>