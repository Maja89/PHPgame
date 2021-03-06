<?php

session_start();

require_once('functions.php');

if(check_login_status() == false) {
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
			<h2>Welcome!</h2>
			
			
			<fieldset>
			<legend><strong>Characterinfo</strong></legend>
				<img src="editedimages/char1.png"><br>
				<p>
					This is your character.
				</p>
			</fieldset>
			
			<fieldset>
			<legend><strong>Inventory</strong></legend>
				<ul>
					<?php show_inventory (); ?>
				</ul>
			</fieldset>
			
			<div id="buttons">
			<center><p><a href="adventures.php" class="button">Adventures</a></p>
			
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