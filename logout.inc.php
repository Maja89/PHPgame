﻿<?php

session_start();

require_once('functions.php');

//If not logged in, redirect to login screen

//If logged in, unset session variable and display logged-out message

if(check_login_status() == false) {
	redirect('login.php');
}
else {
	unset($_SESSION['logged in']);
	unset($_SESSION['username']);
	
	session_destroy();
}

?>


<!doctype html>
<html>
	<head>
		<title>Logout</title>
		<link href="layout.css" type="text/css" rel="stylesheet">
		<meta charset="utf-8">
		<link href='http://fonts.googleapis.com/css?family=Podkova:400,700' rel='stylesheet' type='text/css'>
	</head>
	
	<body>
	
	<div id="wrapper">
	
		<div id="header">
			<h1>PHPGAME</h1>
		</div> <!--end header-->
		
		<div id="menu">
			<ul>
				<a href="index.php"><li>Home</li></a>
				<a href="account.php"><li>Characterpage</li></a>
				<a href="register.php"><li>Register</li></a>
				<a href="about.php"><li>About the game</li></a>
				<a href="contact.php"><li>Contact</li></a>
			</ul>
		</div> <!--end menu-->
		
		<div id="content">
			<h2>Logged out</h2>
			
			<p>You have successfully logged out. Back to <a href="login.php">login</a> screen.</p>
			
			
		</div> <!--end content-->
		
		<div id="footer">
			<p>
				<em>Background tiles by: www.grsites.com & Header image by: www.freeimages.co.uk.</em>
			</p>
		</div><!--end footer-->
	
	</div> <!--end wrapper-->
	
	</body>
</html>