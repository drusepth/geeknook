<?php require_once("includes/global_header.php"); ?>

<?php
	if ($_GET['a'] == 'new') {
		require_once("projects/new.php");
	} elseif ($_GET['a'] == 'my') {
		require_once("projects/my.php");
	} elseif ($_GET['a'] == 'done') {
		require_once("projects/done.php");
	}
?>