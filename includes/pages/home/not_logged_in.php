	<div style="margin:10px; border:1px solid #ccc; height:102px; margin-top:20px;">
		<div style="line-height:12px; font-size:12px; border-bottom:1px solid #ccc; text-align:center;">
			These ads go <em>*poof*</em> when you log in.  You'll never see them again (unless you log out!)
		</div>
	
	</div>
	
	<h2><img src="images/icons/help.png">Who are we?</h2>

	<p>
		<div>
			<p>GeekNook is an elite squad of geeks.  And by <em>elite squad</em>, I mean
			that we're a social networking site specifying in unifying and bringing together
			geeks and nerds from all over the world.</p>
		</div>
		<div id="about_slide">
			GeekNook aims to increase productivity of geeks by taking three major steps:
			<ol>
				<li>Introduce programmers, developers, designers, and geeks of all sizes and 
				shapes to each other.</li>
				<li>Provide a framework for project management that allows for versitile yet
				powerful projects maintained by many people.</li>
				<li>Offer server space for completed projects in the hopes they will blossom
				into the next big thing on the Internet.</li>
			</ol>
			<p>How would you like to have thought of Google?  Designed Chrome?  Coded MySpace?  
			Maintain the Microsoft website?  Secure government websites and systems?<br />
			It just takes some effort.  GeekNook is that first step.</p>
			
			<p>After connecting and meeting with people with similar interests from everywhere
			in the world, you will be motivated and in the position to tackle any project you 
			can imagine.  Can't imagine your own project?  <em>Join someone else's.</em></p>
			
		</div>
		
	</p>
	<p class="posted"><a id="about_toggle" href="#">Read <span id="about_status">More</span></a></p>
	
	<h2><img src="images/icons/user_add.png">Newest Members</h2>

	<p>
				
		<ul class="people_list">
			<?php
				$mysql = mysql_connect($mysql_location, $mysql_user, $mysql_password) 
					or die('Could not connect to mySQL: ' . mysql_error());
				mysql_select_db($mysql_prefix . $mysql_database, $mysql);
				
				$query = "SELECT * FROM `users` ORDER BY `ID` DESC LIMIT 2";
				$result = mysql_query($query) or die("mysql error: " . mysql_error());
				while ($person = mysql_fetch_row($result)) {
					
					$person_id = $person[0];
					# Check for an image associated with the account
					
					# Check interests for "inappropriate words"
					$person_interests = $person[1];
					
					$person_website = stripslashes($person[4]);
					
					$person_location = stripslashes($person[9]);
					
					$person_company = stripslashes($person[10]);
					
					$person_fullname = stripslashes($person[8]);
					
					$person_username = stripslashes($person[1]);
			?>
		
			<li>
				<a href="index.php?p=user&id=<?php echo $person_id; ?>"><img src="people/photos/<?php echo $person_id; ?>.jpg"></a>
				<h3>
					<a href="index.php?p=user&id=<?php echo $person_id; ?>"><?php echo ((strlen($person_fullname) > 0) ? $person_fullname : $person_username); ?></a>
				</h3>
				<span><?php echo $person_location; ?></span>
				<br />
				<div>
					Interests: 
					<?php
						showInterests($person_interests);
						
						# If countInterests < x, fill space with the following commented out lines
						
						#if (strlen($person_website) > 0) {
						#	echo "  Website: <a href='" . $person_website . "'>" . $person_website . "</a>."; 
						#}
						
						#if (strlen($person_company) > 0) {
						#	echo "  Company: $person_company.";
						#}
					?>
				</div>
			</li>
			<?php
				}
			?>

		</ul>
	</p>
	<p class="posted"><a href="index.php?p=people">See More People</a></p>