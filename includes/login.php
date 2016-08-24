        <div id="login"<?php echo (isset($_SESSION['username'])) ? ' style="visibility:hidden;"' : ''; ?>>
        <div id="loginwelcome">
			Welcome, Guest.
		</div>
			<form action="lib/login-process.php" method="post">
				<p>
					<input title="username" name="username" class="username" value="Username" onclick="if ( value == 'Username' ) { value = ''; }"/>
					<input name="password" type="password" class="password" title="password" value="Password" onclick="if ( value == 'Password' ) { value = ''; }"/>
					<input type="submit" name="Login" class="submit" value="login" tabindex="3" />
				</p>
			</form>
			
        </div>