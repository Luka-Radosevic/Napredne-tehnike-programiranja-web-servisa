<?php
	if(!defined('__APP__')) {
		die("Hacking attempt");
	}
	
	$MySQL = mysqli_connect("localhost","root","","1234") or die('Error connecting to MySQL server.');