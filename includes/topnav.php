<?php
	if (isset($_GET['p'])) {
		$p = $_GET['p'];
	} else {
		$p = 'home';
	}
	$active = ' id="active"';
?>
	<ul>
<?php 
	if (!isset($_SESSION['username'])) {
	?>
	
		<li><a href="index.php"<?php if ($p == 'home') { echo $active; } ?>>Home</a></li>
		<li><a href="?p=register"<?php if ($p == 'register') { echo $active; } ?>>Register</a></li>
		<li><a href="?p=signin"<?php if ($p == 'signin') { echo $active; } ?>>Sign In</a></li>
	
	<?php
	} else {
	?>
	
		<li><a href="index.php"<?php if ($p == 'home') { echo $active; } ?>>Home</a></li>
		<li><a href="?p=user&id=<?php echo $_SESSION['ID']; ?>"<?php if ($p == 'user') { echo $active; } ?>>Profile</a></li>
		<li><a href="?p=projects&a=my"<?php if ($p == 'projects') { echo $active; } ?>>Projects</a></li>
		<li><a href="?p=account"<?php if ($p == 'account') { echo $active; } ?>>Your Account</a></li>
		<li><a href="?p=logout"<?php if ($p == 'logout') { echo $active; } ?>>Log Out</a></li>
	
	<?php
	}
	?>
	
	
	<li style="float:right;"><a href="?p=blog"<?php if ($p == 'blog') { echo $active; } ?>>DevBlog</a></li>
	
	
	</ul>