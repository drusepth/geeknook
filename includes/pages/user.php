<?php require_once("includes/global_header.php"); ?>

<?php

	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);

	if (isset($_GET['id'])) {
		$id = mysql_real_escape_string($_GET['id']) / 1;
	} else {
		if ($_SESSION['logged_in'] == true) {
			$id = $_SESSION['ID'];
		} else {
			require_once("includes/pages/people.php");
			$people = 1;
		}
	}
	if ($people != 1) {
		$query = "SELECT * FROM `users` WHERE `ID` = '$id'";
		$result = mysql_query($query) or die("mysql error: " . mysql_error());
		$info = mysql_fetch_row($result);
		if (mysql_num_rows($result) == 0) {
			print "<h3 class='notice'>Invalid profile!</h3>";
		} else {
		
		echo "<h1 class='profile_name'>$info[8]</h1>";
		?>
		<table id="profile_box">
			<tr>
				<td>
					<?php
						if (file_exists("people/photos/" . $info[0] . ".jpg")) {
							echo '<img src="people/photos/' . $info[0] . '.jpg">';
						} elseif (file_exists("people/photos/" . $info[0] . ".gif")) {
							echo '<img src="people/photos/' . $info[0] . '.gif">';
						} elseif (file_exists("people/photos/" . $info[0] . ".png")) {
							echo '<img src="people/photos/' . $info[0] . '.png">';
						}
					?>
				</td>
				<td id="contact_box">
					<?php
						if (strlen($info[1]) > 0) {
					?>
						<strong>Username:</strong>
						<div><?php echo $info[1]; ?></div>
					<?php
						}
					?>
				
					<?php
						if (strlen($info[3]) > 0) {
					?>
					<strong>Email:</strong>
					<div><a href="mailto:<?php echo $info[3]; ?>"><?php echo $info[3]; ?></a></div>
					<?php
						}
					?>
				
					<?php
						if (strlen($info[4]) > 0) {
					?>
					<strong>Website:</strong>
					<div><a href="<?php echo $info[4]; ?>"><?php echo $info[4]; ?></a></div>
					<?php
						}
					?>
				
					<?php
						if (strlen($info[5]) > 0) {
					?>
					<strong>MSN:</strong>
					<div><?php echo $info[5]; ?></div>
					<?php
						}
					?>
				
					<?php
						if (strlen($info[6]) > 0) {
					?>
					<strong>Skype:</strong>
					<div><?php echo $info[6]; ?></div>
					<?php
						}
					?>
				
					<?php
						if (strlen($info[10]) > 0) {
					?>
					<strong>Company:</strong>
					<div><a href="index.php?p=company&n=<?php echo $info[10]; ?>"><?php echo $info[10]; ?></a></div>
					<?php
						}
					?>
				
					<?php
						if (strlen($info[9]) > 0) {
					?>
					<strong>Location:</strong>
					<div><?php echo $info[9]; ?></div>
					<?php
						}
					?>
				
					<?php
						if (strlen($info[11]) > 0) {
					?>
					<strong>Education:</strong>
					<div><?php echo $info[11]; ?></div>
					<?php
						}
					?>
				
					<div class="message_box">
						<a href="index.php?p=reviews&id=<?php echo $info[0]; ?>">Read Reviews</a>
						<a href="index.php?p=messages&to=<?php echo $info[0]; ?>">Send a message</a>
						<a href="index.php?p=projects&action=invite&id=<?php echo $info[0]; ?>">Invite to a project</a>
						<a href="index.php?p=friends&action=add&id=<?php echo $info[0]; ?>">Add to Friends</a>
					</div>
				</td>
			</tr>
		</table>
		
		<div id="interests_box">
			<h3 class="title">Interests</h3>
			<?php
				$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
				or die('Could not connect to mySQL: ' . mysql_error());
				mysql_select_db($mysql_prefix . $mysql_database, $mysql);
		
				showInterests($info[1]);
				
			?>
		</div>
		
		<h2><a href="#" id="about_toggle" style="padding-bottom:1px;">My Portfolia (click to view)</a></h2>
		
		<div id="about_slide">
		<h2>Finished These Projects</h2>
		<table id="project_column_table">
			<tr>
		<?php
			$query = "SELECT * FROM `projects` WHERE `Founder` = '" . $info[1] . "' AND `Status` = 'Complete'";
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
				echo "<td>$info[1] hasn't finished any projects!</td>";
			}
		?>
				
			</tr>
		</table>
		
		<h2>Leading These Projects</h2>
		<table id="project_column_table">
			<tr>
		<?php
			$query = "SELECT * FROM `projects` WHERE `Founder` = '" . $info[1] . "' AND `Status` != 'Cancelled' AND `Status` != 'Complete'";
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
				echo "<td>$info[1] isn't currently leading any projects!</td>";
			}
		?>
				
			</tr>
		</table>
		
		<h2>Involved In These Projects</h2>
		<table id="project_column_table">
			<tr>
		<?php
			$query = "SELECT * FROM `projects` WHERE `Members` LIKE '%" . $info[1] . "%'";
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
				echo "<td>$info[1] isn't currently a part of any projects!</td>";
			}
		?>
				
			</tr>
		</table>
		</div>
		
		<h2>Comments</h2>
		<table class="comment_table">
			<tr>
				<td class="cmt_picture_spacer"></td>
				<td class="cmt_content_spacer"></td>
			</tr>
			<?php
				$userid = mysql_real_escape_string('user' . $id);
				$query = "SELECT * FROM `comments` WHERE `TargetID` = '$userid' ORDER BY `time` LIMIT 8";
				
				$result = mysql_query($query)
					or die("Mysql error: " . mysql_error());
					
				while ($fetch = mysql_fetch_row($result)) {
					$query = "SELECT `ID` FROM `users` WHERE `Username` = '$fetch[1]'";
					$authorid = mysql_query($query) or die("mysql error: " . mysql_error());
					$authorid = mysql_fetch_row($authorid);
					$authorid = $authorid[0];
				
			?>
			<tr class="comment_container">
				<td><a href="index.php?p=user&id=<?php echo $authorid; ?>""><img src="people/photos/<?php echo $authorid; ?>.jpg" class="comment_table_avatar"></a></td>
				<td class="comment_content">
					<?php echo $fetch[2]; ?>
					<div class="comment_info_bar">Posted by <a href="index.php?p=user&id=<?php echo $authorid; ?>"><?php echo $fetch[1]; ?></a></div>
				</td>
			</tr>
			<?php
				}
			?>
			
		</table>
		<div id="slider_add_comment">
			<form name="add_comment_form" method="post" action="lib/add-comment-process.php">
			<table class="registerform">
				<tr>
					<td colspan="2">
						<div>Your comment:</div>
						<textarea name="comment_text"></textarea>
					</td>
				</tr>
			</table>
			<input type="submit" value="Be heard - post on <?php echo ((strlen($info[8]) > 0) ? $info[8] : $info[1]); ?>'s profile!">
			</form>
		</div>
		<p class="posted"><a id="comment_toggle" href="#">Post a Comment</a></p>
	</p>
		
	<?php
		}
	} else {
		//show the people homepage
	}
?>