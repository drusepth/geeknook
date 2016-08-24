<?php
	if (isset($_SESSION['username'])) {
		require_once("home/member_logged_in.php");
	} else {
		require_once("home/not_logged_in.php");
	}
?>