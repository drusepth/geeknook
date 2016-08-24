<div id="big_login">
	<form method="post" action="lib/login-process.php">
	<input type="text" value="Username" name="username" size="20"
	onfocus="if(this.value=='Username')this.value='';" 
	onblur="if(this.value=='')this.value='Username';" />
	<br />
	<input type="password" value="Password" name="password" size="20"
	onfocus="if(this.value=='Password')this.value='';" 
	onblur="if(this.value=='')this.value='Password';" />
	<br />
	<input type="submit" value="Log In To GeekNook" id="big_submit" /> 
	</form>
</div>

<div id="whats_happening">
	<h3>What's Happening <em>Right Now</em>?</h3>
	
		<?php
			$whats_happening_right_now_feed_limit = 3;
			require_once("includes/snippets/happening_right_now.php");
		?>
	</ul>
	
</div>