<div>
	<h3>Registering on GeekNook is fast, free, and easy.</h3>
	<div>First, we'll start out with some basic (required) information about you.</div>

	<form name="register_step1" method="post" action="lib/register-process.php">
	<table class="registerform">
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" /></td><td class="form_note">*Maximum 12 characters</td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password1" /></td><td class="form_note">*Minimum of 6 characters</td>
		</tr>
		<tr>
			<td>Retype Password:</td>
			<td><input type="password" name="password2" /></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" /></td>
		</tr>
	</table>
	
	<div>And now that we've got that out of the way, we can get <em>more</em> (not required) information!</div>
	<table class="registerform">
		<tr>
			<td>Full Name:</td>
			<td><input type="text" name="fullname" /></td>
		</tr>
		<tr>
			<td>Website:</td>
			<td><input type="text" name="website" /></td>
		</tr>
		<tr>
			<td>MSN:</td>
			<td><input type="text" name="msn" /></td>
		</tr>
		<tr>
			<td>Skype:</td>
			<td><input type="text" name="skype" /></td>
		</tr>
	</table>
	
	<table class="registerform">
		<tr>
			<td>Company:</td>
			<td><input type="text" name="company" /></td>
		</tr>
		<tr>
			<td>Location:</td>
			<td><input type="text" name="location" /></td>
		</tr>
	</table>
	
	<table class="registerform">
		<tr>
			<td colspan="2">
				<div>Interests (seperated by commas):</div>
				<textarea name="interests"></textarea>
			</td>
		</tr>
	</table>
	
	<div>Well, it looks like that's all we need from you for now.</div>
	<input type="submit" value="Register for GeekNook!" />

	</form>
	
</div>