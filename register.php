<!doctype html>
<html>
	<head>
		<title>Register</title>
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
		
			<p><strong>
				Fill out the form below to register :)
			</strong></p>
			
			<form method="post" action="register.php">
				<p>
					<label for="user">Username:</label>
					<input type="text" name="user">
				</p>
				<p>
					<label for="pass">Password:</label>
					<input type="password" name="pass">
				</p>
				<input type="submit" value="Registrera" name="submit">
			</form>
		</div> <!--end content-->
		
	<?php
        
		if (isset($_POST['user']))
		{
		
		require_once('conn.php'); //connect to the database
		require_once('functions.php');
	
		$dbConn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	
		if(mysqli_connect_errno()) //if you cant connect
		{
		echo "Unable to connect to the database.";
		exit();
		}
		
			//form was sent
		echo "<strong>The form has been sent.</strong>";	
			
			$user = $_POST['user'];
			$password = $_POST['pass'];
			
			$slump = time() . "gubben" . $user;
			$salt = hash('sha256', $slump);
			
			$password = hash('sha256', $salt.$password);
			$password = $salt.$password;
			
			$user = mysqli_real_escape_string($dbConn, $user);
			$user = htmlspecialchars($user);
			
			$sql = "INSERT INTO users (username, userpassword) VALUES ('$user', '$password)')";
			
			mysqli_query($dbConn, $sql);
		}

	

?>
		
		<div id="footer">
			<p>
				<em>Background tiles by: www.grsites.com & Header image by: www.freeimages.co.uk.</em>
			</p>
		</div><!--end footer-->
	
	</div> <!--end wrapper-->
	
	</body>
</html>