<div>
	Lets see...  You like the following things: (<a href="?p=account#interests">Add more</a>)
	<blockquote>
	<?php
		$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
		or die('Could not connect to mySQL: ' . mysql_error());
		mysql_select_db($mysql_prefix . $mysql_database, $mysql);
		
		$query = "SELECT `Interests` FROM `users` WHERE `Username` = '" . $_SESSION['username'] . "'";
		$result = mysql_query($query) or die("mysql error: " . mysql_error());
		$interests = mysql_fetch_row($result);
		$interests = $interests[0];
		# $interests holds a comma-seperated list of all the user's interests
		
		printInterests($interests);
		
	?>
	</blockquote>
	
	<h3 class="title">Here are some people with similar interests:</h3>
	<ul class="people_list">
	<?php
		for ($i = 0; $i < 2; $i++) {
			echo '<li>';
			do {
				$topic = mysql_real_escape_string($interests[mt_rand(0, count($interests))]);
				$query = "SELECT * FROM `users` WHERE `Interests` LIKE '%" . $topic . "%' AND `Username` != '" . $_SESSION['username'] . "' ORDER BY RAND(" . mt_rand(1, 100) . ") LIMIT 1";
				$result = mysql_query($query);
			} while (mysql_num_rows($result) == 0);
			$result = mysql_fetch_row($result);
			
			echo '<img src="people/photos/' . $result[0] . '.' . imageExist("people/photos/$result[0]") . '">';
			if (strlen($result[8]) > 0) {
				echo '<h3><a href="?p=user&id=' . $result[0] . '">' . $result[8] . '</a></h3>';
			} else {
				echo '<h3><a href="?p=user&id=' . $result[0] . '">' . $result[1] . '</a></h3>';
			}
			echo '<span>' . $result[9] . '</span><br />';
			echo '<div><strong>Interests:</strong> '; printInterests($result[7]); echo '</div>';
			echo '</li>';
		}
		
	?>
	</ul>
	
	<h3 class="title">Here's some projects that might be interested in your expertise</h3>
	<table id="project_column_table">
		<tr>
			<td>
				<a href="#">
				<div>
					<img src="http://www.mozami.net/blog/wp-content/uploads/iphone.jpg" />
				</div>
				<div class="project_title">
					iPhone App "TapDefense"
				</div>
				<div class="project_description">
					TapDefense is a thrilling RTS game for the iPhone, similar to a Turret Defense map in StarCraft.
				</div>
				</a>
			</td>
			<td>
				<a href="#">
				<div>
					<img src="http://www.techgadgetforums.com/files/japanese_spy_scope.jpg" />
				</div>
				<div class="project_title">
					SiteSpy: PHP
				</div>
				<div class="project_description">
					A simple yet versatile PHP script that can tell you a list of sites your visitor has visited lately.
				</div>
				</a>
			</td>
			<td>
				<a href="#">
				<div>
					<img src="projects/images/winzy-money.jpg" />
				</div>
				<div class="project_title">
					Winzy Scripts
				</div>
				<div class="project_description">
					Various perl scripts to automate and exploit Winzy.com and make some quick cash.
				</div>
				</a>
			</td>
		</tr>
	</table>
	
</div>