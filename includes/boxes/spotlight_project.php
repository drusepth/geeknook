<?php
	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);
?>

			<div class="box">
				<h3><img src="images/icons/brick_go.png">One Nifty Project</h3>
				
			<?php
				$query = "SELECT * FROM `projects` ORDER BY `ID` DESC LIMIT 1";
				$result = mysql_query($query) or die("mysql error: " . mysql_error());
				while ($project = mysql_fetch_row($result)) {
			?>
			<td>
				<a href="index.php?p=project&a=view&id=<?php echo $project[0]; ?>">
				<div>
					<img src="<?php echo $project[3]; ?>" />
				</div>
				<div class="project_title">
					<?php echo $project[1]; ?>
				</div>
				<div class="project_description">
					<?php echo $project[2]; ?>
				</div>
				</a>
			</td>
			<?php
				}
			?>
			</div>