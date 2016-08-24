	<?php
		if ($_SESSION['logged_in'] == true) {
	?>
        <ul id="navigation">

			<li <?php if (!isset($_GET['p']) or ($_GET['p'] == 'home')) { echo 'class="on"'; } ?>><a href="index.php">Home</a></li>
			<li <?php if ($_GET['p'] == 'projects') { echo 'class="on"'; } ?>><a href="index.php?p=projects">Projects</a></li>
			<li <?php if ($_GET['p'] == 'user') { echo 'class="on"'; } ?>><a href="index.php?p=user">Profile</a></li>
			<li <?php if ($_GET['p'] == 'inbox') { echo 'class="on"'; } ?>><a href="index.php?p=inbox">Inbox</a></li>
			<li <?php if ($_GET['p'] == 'account') { echo 'class="on"'; } ?>><a href="index.php?p=account">Account</a></li>
			<li <?php if ($_GET['p'] == 'register') { echo 'class="on"'; } ?>><a href="index.php?p=logout">Sign Out</a></li>

        </ul>
	<?php
		} else {
	?>
        <ul id="navigation">

			<li <?php if (!isset($_GET['p']) or ($_GET['p'] == 'home')) { echo 'class="on"'; } ?>><a href="index.php">Home</a></li>
			<li <?php if ($_GET['p'] == 'register') { echo 'class="on"'; } ?>><a href="index.php?p=register">Sign Up</a></li>
			<li <?php if ($_GET['p'] == 'projects') { echo 'class="on"'; } ?>><a href="index.php?p=projects">Projects</a></li>
			<li <?php if ($_GET['p'] == 'pastebin') { echo 'class="on"'; } ?>><a href="index.php?p=pastebin">Pastebin</a></li>
			<li <?php if ($_GET['p'] == 'blog') { echo 'class="on"'; } ?>><a href="index.php?p=blog">DevBlog</a></li>

        </ul>
	<?php
		}
	?>