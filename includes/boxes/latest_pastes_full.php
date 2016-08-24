<?php
	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);
?>

			<div class="box">
				<h3><img src="images/icons/brick_add.png">Latest Pastes</h3>
				<div class="right_toolbox">
					<a href="index.php?p=feed&stream=projects"><img src="images/icons/feed.png"></a>
				</div>
				
			<?php
				$query = "SELECT * FROM `pastes` ORDER BY `Timestamp` DESC LIMIT 7";
				$result = mysql_query($query) or die("mysql error: " . mysql_error());
				while ($project = mysql_fetch_row($result)) {
			?>
			<ul class="project_list">
				<li>
					<a href="index.php?p=pastebin&id=<?php echo $project[0]; ?>">
						<div class="project_title">
							<?php echo $project[2]; ?>
						</div>
						<p>
							<?php echo $project[3]; ?> at <?php echo $project[1]; ?> Epoch
						</p>
					</a>
				</li>
			</ul>
			<?php
				}
			?>
			</div>
			
	<p class="posted"><a href="index.php?p=pastebin&a=new">See More Pastes</a> | <a href="index.php?p=pastebin">Paste Your Own</a></p>