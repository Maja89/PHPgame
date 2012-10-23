<?php

session_start();

require_once('functions.php');

if($_SESSION['username'] != 'admin') {
redirect('login.php');
}
?>

<!doctype html>
<html>
	<head>
		<title>Characterpage</title>
		<link href="layout.css" type="text/css" rel="stylesheet">
		<meta charset="utf-8">
		<link href='http://fonts.googleapis.com/css?family=Podkova:400,700' rel='stylesheet' type='text/css'>
	</head>
	
	<body>
	
	<div id="wrapper">
	
		<div id="header">
			<h1>Webpage :)</h1>
		</div> <!--end header-->
		
		<div id="menu">
			<ul>
				<a href="index.php"><li>Home</li></a>
				<a href="admin.php"><li>Adminpage</li></a>
				<a href="register.php"><li>Register</li></a>
				<a href="about.php"><li>About the game</li></a>
				<a href="contact.php"><li>Contact</li></a>
			</ul>
		</div> <!--end menu-->
		
		<div id="content">
		<h2>Admin page</h2>
			
		<ul>
			<li><a href="admin_createadventures.php">Create adventures</a></li>
			<li><a href="#">Manage users</a></li>
		</ul>
		
		<div id="buttons">
			<center>
			
			<p><a href="logout.inc.php" class="button">Logout</a></p></center>
			</div> <!-- end buttons -->
			
		</div> <!--end content-->
		
		<div id="footer">
			<p>
				<em>Background tiles by: www.grsites.com & Header image by: www.freeimages.co.uk.</em>
			</p>
		</div><!--end footer-->
	
	</div> <!--end wrapper-->
	
	</body>
</html>