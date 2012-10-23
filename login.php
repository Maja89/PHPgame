<!doctype html>
<html>
	<head>
		<title>Login</title>
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
				<a href="account.php"><li>Characterpage</li></a>
				<a href="register.php"><li>Register</li></a>
				<a href="about.php"><li>About the game</li></a>
				<a href="contact.php"><li>Contact</li></a>
			</ul>
		</div> <!--end menu-->
		
		<div id="content">
		
			<form id="login-form" method="post" action="login.inc.php">
			
			<p>Please enter your username and password.</p>
			<P>
			<label for="user">Username:</label>
			<input type="text" name="user" id="user">
			</p>
			<P>
			<label for="pass">Password:</label>
			<input type="password" name="pass" id="pass">
			</p>
			<input type="submit" name="submit" id="submit" value="Login">
			
			</form>
			
			
		</div> <!--end content-->
		
		<div id="footer">
			<p>
				<em>Background tiles by: www.grsites.com & Header image by: www.freeimages.co.uk.</em>
			</p>
		</div><!--end footer-->
	
	</div> <!--end wrapper-->
	
	</body>
</html>