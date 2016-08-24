<?php
	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);
?>

			<div class="box">
				<h3><img src="images/icons/brick_add.png">Latest Projects</h3>
				<div class="right_toolbox">
					<a href="index.php?p=feed&stream=projects"><img src="images/icons/feed.png"></a>
				</div>
				
			<?php
				$query = "SELECT * FROM `projects` ORDER BY `ID` DESC LIMIT 5";
				$result = mysql_query($query) or die("mysql error: " . mysql_error());
				while ($project = mysql_fetch_row($result)) {
			?>
			<ul class="project_list">
				<li>
					<a href="index.php?p=project&a=view&id=<?php echo $project[0]; ?>">
						<div class="project_title">
							<?php echo $project[1]; ?>
						</div>
						<div class="project_description">
							<?php echo $project[2]; ?>
						</div>
					</a>
				</li>
			</ul>
			<?php
				}
			?>
			</div>
			
	<p class="posted"><a href="index.php?p=projects&a=new">See More Projects</a></p>