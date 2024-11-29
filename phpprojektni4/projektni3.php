<?php 
	define('__APP__', TRUE);
	
	session_start();
	
	include("db.php");

	$menu = isset($_GET['menu']) ? (int)$_GET['menu'] : 1;
	$action = isset($_GET['action']) ? (int)$_GET['action'] : 0;

	$_POST['_action_'] = isset($_POST['_action_']) ? htmlspecialchars($_POST['_action_'], ENT_QUOTES, 'UTF-8') : FALSE;
	
	include_once("functions.php");

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
		
		<!-- Open Graph data -->
		<meta property="og:title" content="Hello Example">
		<meta property="og:type" content="article">
		<meta property="og:url" content="Your URL">
		<meta property="og:image" content="Your URL">
		<meta property="og:description" content="Some description">
		
		<!-- Twitter Card data -->
		<meta name="twitter:title" content="Hello Example">
		<meta name="twitter:description" content="Some description">
		
		<!-- Author and favicon meta -->
		<meta name="author" content="alen@tvz.hr">
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
		<title>Example page - HTML5</title>
	</head>
	<body>';

	if (isset($_SESSION['message'])) {
		echo '<div class="message">' . $_SESSION['message'] . '</div>';
		unset($_SESSION['message']);
	}

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
		case 5:
			include("register.php");
			break;
		case 6:
			include("signin.php");
			break;
		case 7:
			include("admin.php");
			break;
		default:
			include("home.php");
			break;
	}

	print '</main>';

	print '
	<footer>
		<p>Copyright &copy; ' . date("Y") . ' Luka Radosevic. 
			<a href="https://github.com/Luka-Radosevic/Napredne-tehnike-programiranja-web-servisa">
				<img src="img/GitHub-Mark-Light-32px.png" title="Github" alt="Github">
			</a>
		</p>
	</footer>

	</body>
	</html>';
?>
