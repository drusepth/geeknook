<?php
	if ($_SESSION['logged_in'] == true) {
		// The person just signed up or is logged in
?>
<div>
<h3>It looks like you're new here.  Lets get you started.</h3>

<?php
		if (imageExist("people/photos/" . $_SESSION['ID'])) {
			// Already uploaded a file
			
			require_once("includes/pages/register/networking.php");
			
		} else {
			require_once("includes/pages/register/photo-upload.php");
		}
	
	} else {
		// They're not logged in
		require_once("includes/pages/register/main.php");
	}
?>
</div>