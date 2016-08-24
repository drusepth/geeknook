<?php require_once("includes/global_header.php"); ?>

<?php

	$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
	mysql_select_db($mysql_prefix . $mysql_database, $mysql);
	
	if ($_GET['a'] == 'view') {
		if (!is_numeric($_GET['id'])) {
			header("Location: index.php");
			die;
		}
		$id = mysql_real_escape_string($_GET['id']);
	
		$query = "SELECT * FROM `projects` WHERE `ID` = '$id'";
		$result = mysql_query($query) or die("error: " . mysql_error());
		$info = mysql_fetch_row($result);
		
		?>
		<h1 class="title"><?php echo $info[1]; ?></h1>
		<blockquote>
			<em><?php echo $info[2]; ?></em>
		</blockquote>
		
		<h3 class="title">The Founder</h3>
		<ul class="people_list">
		<?php
			$founder = $info[7];
			$query = "SELECT `ID`, `Location`, `Company`, `Fullname` FROM `users` WHERE `Username` = '$founder'";
			$result = mysql_query($query);
			$ownerinfo = mysql_fetch_row($result);
		?>
			<li>
				<a href="index.php?p=user&id=<?php echo $ownerinfo[0]; ?>"><img src="people/photos/<?php echo $ownerinfo[0]; ?>.jpg"></a>
				<h3><a href="index.php?p=user&id=<?php echo $ownerinfo[0]; ?>"><?php if (strlen($ownerinfo[3]) > 1) { echo $ownerinfo[3]; } else { echo $founder; } ?></a></h3>
				<span><?php echo $ownerinfo[1]; ?> | <a href="#"><?php echo $ownerinfo[2]; ?></a></span>
				<br />
			</li>
		</ul>
		
		<h3 class="title">Contributors</h3>
		<table id="person_column_table">
		<tr>
			<?php
				$query = "SELECT `Members` FROM `projects` WHERE `ID` = '$id'";
				$result = mysql_query($query) or die("mysql error: " . mysql_error());
				$project = mysql_fetch_row($result);
				$members = $project[0];
				$members = explode(";", $members);
				
				$count = 0;
				$max_people = 7;
				foreach ($members as $member) {
					if ($member != '') {
						$count++;
					
						$query = "SELECT `ID` FROM `users` WHERE `Username` = '$member'";
						$result = mysql_query($query) or die("error: " . mysql_error());
						$result = mysql_fetch_row($result);
						$personid = $result[0];
			?>
						<td>
							<div>
								<a href="index.php?p=user&id=<?php echo $personid; ?>"><img src="people/photos/<?php echo $personid; ?>.jpg"></a>
							</div>
							<div>
								<a href="index.php?p=user&id=<?php echo $personid; ?>"><?php echo $member; ?></a>
							</div>
						</td>
			<?php
						if ($count == $max_people) {
							break;
						}
					}
				}
			?>
			
		</tr>
	</table>
		
	<?php
	}
	
?>