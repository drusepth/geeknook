<form name="update_account" method="post" action="lib/update-account-process.php">
	<table class="registerform">
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" value="<?php echo $info[1]; ?>" readonly="readonly" /></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" value="<?php echo $info[3]; ?>" /></td>
		</tr>
	</table>
	
	<table class="registerform">
		<tr>
			<td>Full Name:</td>
			<td><input type="text" name="fullname" value="<?php echo $info[8]; ?>" /></td>
		</tr>
		<tr>
			<td>Website:</td>
			<td><input type="text" name="website" value="<?php echo $info[4]; ?>" /></td>
		</tr>
		<tr>
			<td>MSN:</td>
			<td><input type="text" name="msn" value="<?php echo $info[5]; ?>" /></td>
		</tr>
		<tr>
			<td>Skype:</td>
			<td><input type="text" name="skype" value="<?php echo $info[6]; ?>" /></td>
		</tr>
		<tr>
	</table>
	
	<table class="registerform">
		<tr>
			<td>Company:</td>
			<td><input type="text" name="company" value="<?php echo $info[10]; ?>" /></td>
		</tr>
		<tr>
			<td>Location:</td>
			<td><input type="text" name="location" value="<?php echo $info[9]; ?>" /></td>
		</tr>
	</table>
	
	<table class="registerform">
		<tr>
			<td colspan="2">
				<div>Interests (seperated by commas):</div>
				<textarea name="interests"><?php echo $info[7]; ?></textarea>
			</td>
		</tr>
	</table>
	
	<div>In order to update your account, you must provide your current password:</div>
	<table class="registerform">
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" /></td>
		</tr>
	</table>
	
	<input type="submit" value="Update your GeekNook account!" />


</form>