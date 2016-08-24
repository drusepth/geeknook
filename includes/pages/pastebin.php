<div id="small_banner">
	<img src="images/big_banners/pastebin.png" />
</div>

<?php
	if (isset($_POST['code'])) {
		# Submitting a new paste
		require_once("includes/pages/pastebin/submit.php");
	} elseif (isset($_GET['id'])) {
		# Viewing a paste
		require_once("includes/pages/pastebin/view.php");
		
	} else {
		# Default display
		require_once("includes/pages/pastebin/default.php");
	}


?>

