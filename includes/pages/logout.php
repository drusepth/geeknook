<?php require_once("includes/global_header.php"); ?>

<?php
	session_destroy();
	
	noticeFix("Successfully logged out!", "?p=home");
?>
<h2>You have been successfully logged out!</h2>
<p>Thanks for being awesome!</p>
