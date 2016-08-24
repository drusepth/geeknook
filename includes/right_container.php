<?php
	if (isset($_SESSION['username'])) {
	
		require_once("includes/boxes/applications.php");
		
		require_once("includes/boxes/inbox.php");
		
		require_once("includes/boxes/events.php");
		
	} else {
	
		if ($_GET['p'] == 'pastebin') {
			
			if (!isset($_GET['id'])) {
			
				require_once("includes/boxes/paste_control.php");
			
			}
			
			require_once("includes/boxes/latest_pastes_full.php");
		
		} else {
	
			require_once("includes/boxes/latest_projects_front.php");
			
			require_once("includes/boxes/latest_pastes_front.php");
			
			
		}
	
	}
?>