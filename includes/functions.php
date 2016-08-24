<?php
	function error ($error, $landing) {
		echo '<meta http-equiv="refresh" content="0;url=../index.php' . $landing . '&error=' . $error . '" />';
		die;
	}
	
	function notice ($msg, $landing) {
		echo '<meta http-equiv="refresh" content="0;url=../index.php' . $landing . '&notice=' . $msg . '" />';
		die;
	}
	function noticeFix ($msg, $landing) {
		echo '<meta http-equiv="refresh" content="0;url=index.php' . $landing . '&notice=' . $msg . '" />';
		die;
	}
	
	function showInterests($username) {
		
		$query = "SELECT `Interests` FROM `users` WHERE `Username` = '" . $username . "'";
		$result = mysql_query($query) or die("mysql error: " . mysql_error());
		$interests = mysql_fetch_row($result);
		$interests = explode(",", $interests[0]);
		
		for ($i = 0; $i < count($interests); $i++) {
			if ($i == count($interests) - 1) {
				echo "and ";
			}
			if ($i == count($interests) - 1) {
				echo "<a href='index.php?p=search&topic=$interests[$i]'>$interests[$i]</a>.";
			} else {
				echo "<a href='index.php?p=search&topic=$interests[$i]'>$interests[$i]</a>, ";
			}
		}
	}
	
	function imageExist($filepath) {
		if (file_exists($filepath . ".jpg")) {
			return "jpg";
		} elseif (file_exists($filepath . ".gif")) {
			return "gif";
		} elseif (file_exists($filepath . ".png")) {
			return "png";
		} else {
			return false;
		}
	}
	
	function printInterests($interests) {
		$interests = explode(",", $interests);
		for ($i = 0; $i < count($interests); $i++) {
			if ($i == count($interests) - 1) {
				echo "and ";
			}
			if ($i == count($interests) - 1) {
				echo "<a href='?p=search&topic=$interests[$i]'>$interests[$i]</a>.";
			} else {
				echo "<a href='?p=search&topic=$interests[$i]'>$interests[$i]</a>, ";
			}
		}
	}
?>