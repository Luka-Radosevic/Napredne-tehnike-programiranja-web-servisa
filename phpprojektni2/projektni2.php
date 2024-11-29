<?php 
	include ("db.php");

	$menu = isset($_GET['menu']) ? (int)$_GET['menu'] : 1;

	print '
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<!-- CSS -->
		<link rel="stylesheet" href="style.css">
		<!-- End CSS -->
		<!-- Meta elements -->
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<title>PHPProjektni2</title>
	</head>
	<body>';

	print '<header>
			<div class="' . ($menu > 1 ? 'hero-subimage' : 'hero-image') . '"></div>
			<nav>';
	
		include("menu.php");
	
	print '</nav></header>';

	print '<main>';

	switch ($menu) {
		case 1:
			include("home.php");
			break;
		case 2:
			include("news.php");
			break;
		case 3:
			include("contact.php");
			break;
		case 4:
			include("about-us.php");
			break;
		default:
			include("home.php");
			break;
	}

	print '</main>';

	print '
	<footer>
		<p>Copyright &copy; ' . date("Y") . ' Alen Šimec. 
			<a href="https://github.com/Luka-Radosevic/Napredne-tehnike-programiranja-web-servisa">
				<img src="img/GitHub-Mark-Light-32px.png" title="Github" alt="Github">
			</a>
		</p>
	</footer>

	</body>
	</html>';
?>
