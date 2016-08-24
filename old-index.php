<?php require_once("includes/global_header.php"); ?>

<?php
	define("LAYOUT", "Facebook", true);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>GeekNook</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" /> 

	<?php require_once("includes/css.php"); ?>
	<?php require_once("includes/js.php"); ?>
	

</head>
<body>

<script type="text/javascript" src="js/wz_tooltip.js"></script>

<div id="title">GeekNook
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

<div id="content" >
	
	<div id="navcontainer">	
		<?php require_once("includes/topnav.php"); ?>
	</div>

	<div id="main">
	
	<div id="banner"><img src="images/banner.jpg" alt="" /></div>
	<div class="main">
	
	<?php
		if (isset($_GET['p'])) { $p = $_GET['p'];
			} else { $p = 'home'; }
		require_once("includes/pages/$p.php");
	?>

		
	</div>
	</div>
	
	<?php require_once("includes/menu.php"); ?>
	
	<!-- START OF ZYMIC.COM COPYRIGHT, DO NOT REMOVE OR EDIT ANYTHING BELOW WITHOUT PAYING LICENSE FEE (ELSE FACE LEGAL ACTION) -->
	<div id="copyright">
		Layout Design Copyright &copy; 2007 <a href="http://www.zymic.com/free-templates/">Free Templates</a> by <a href="http://www.zymic.com">Zymic</a>
	</div>
	<!-- END ZYMIC.COM COPYRIGHT -->

</div>

</body>
</html>
