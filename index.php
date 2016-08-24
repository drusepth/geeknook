<?php require_once("includes/global_header.php"); ?>

<?php
	define("LAYOUT", "Collateral", true);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>GeekNook</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
	<!--Still to convert to the new version-->
	<link rel="stylesheet" type="text/css" href="css/old-style.css" />
	<link rel="stylesheet" type="text/css" href="css/comments.css" />
	<link rel="stylesheet" type="text/css" href="css/tips.css" />
	
	<!--Sorted through and all that jazz-->
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/lists.css" />
	
	<!--Javascript-->
	<script type="text/javascript" src="js/mootools.js"></script>
	<script type="text/javascript" src="js/slide.js"></script>
	
</head>
<body>

<script type="text/javascript" src="js/wz_tooltip.js"></script>

<div id="wrapper">
    <div id="header">

        <div id="logo"></div>
		
        <div id="updates">
        <span>
		
			<img src="images/icons/date.png">
			<strong>GeekNook Launch Date</strong>: 12:00 AM on July 1<sup>st</sup>, 2009
		
		</span>
        </div>
        <?php
			require_once("includes/login.php");
		?>

	<?php 	
		require_once("includes/menu.php");
	?>
			
    <div id="content">
		<div id="right_container">
		
			<?php
			
				require_once("includes/right_container.php");
				
			?>
			
		</div>
		
		<div id="left_container">

			<?php
			
				require_once("includes/security/pages_array.php");
				
				if(!in_array($_GET['p'], $_PAGES)) {
				
					print "<h2>404 Page Not Found</h2><p>The page you requested was not found on this server.</p><hr /><a href='index.php'>Click here to return to the GeekNook homepage.</a>";
					
				} else {
			
					if (isset($_GET['p'])) {
						$p = $_GET['p'];
					} else { 
						$p = 'home'; 
					}
					require_once("includes/pages/$p.php");
					
				}
			?>
			
		</div>
		
		<div style="clear:both; margin:0;"></div>
		
    </div>
    <div id="footer">
        <div id="copyright">&copy; 2008 All Rights Reserved. Designed by <a href="http://www.crownstyles.com">Crown</a> and design coded by <a href="http://trippin.uni.cc">Trippin7464</a> for <a href="http://www.zymic.com" title="Zymic Free Templates">Zymic</a> <a href="http://www.zymic.com/free-templates">Free Templates</a>. <a href="http://www.zymic.com/free-web-hosting/">Free Web Hosting</a>.
    </div>
</div>

</body>
</html>