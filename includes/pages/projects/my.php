<?php require_once("includes/global_header.php"); ?>

<?php

	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);
?>

		<h2>Your Projects</h2>
		<table id="project_column_table">
			<tr>
		<?php
			$query = "SELECT * FROM `projects` WHERE `Founder` = '" . $_SESSION['username'] . "'";
			$result = mysql_query($query) or die("mysql error: " . mysql_error());
			$break_every_x = 3;
			$x = 0;
			$count = 0;
			while ($project = mysql_fetch_row($result)) {
				$count++;
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
				if ($x == 3) {
					$x = 0;
					echo "</tr><tr>";
				}
			}
			if ($count == 0) {
				echo "<td>You aren't currently leading any projects!</td>";
			}
		?>
				
			</tr>
		</table>
		
		
		<h2>Your Involvement</h2>
		<table id="project_column_table">
			<tr>
		<?php
			$query = "SELECT * FROM `projects` WHERE `Members` LIKE '%" . $_SESSION['username'] . "%'";
			$result = mysql_query($query) or die("mysql error: " . mysql_error());
			$break_every_x = 3;
			$x = 0;
			$count = 0;
			while ($project = mysql_fetch_row($result)) {
				$count++;
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
				if ($x == 3) {
					$x = 0;
					echo "</tr><tr>";
				}
			}
			if ($count == 0) {
				echo "<td>$info[1] isn't currently a part of any projects in this category!</td>";
			}
		?>
				
			</tr>
		</table>