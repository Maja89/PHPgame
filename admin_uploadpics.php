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
		<h2>Upload pictures</h2>
			

 

<form method="post" action="admin_uploadpics.php" 
enctype="multipart/form-data">
<input type="file" name="filen" >
<input type="submit" value="ladda upp">
 
</form>

<?php

require_once('conn.php');

$dbConn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if(mysqli_connect_errno()) //if you cant connect
	{
	echo "Unable to connect to database.";
	exit();
	}

if (isset($_FILES['filen'])) {	
	
$name = $_FILES['filen']['name'];
move_uploaded_file($_FILES['filen']['tmp_name'], $name);
echo "Uploaded image '".$name."'";

echo "<br>";

$sql = "INSERT INTO images (imagepath) VALUES ('$name')";
mysqli_query($dbConn, $sql);

}

?>

		
		<div id="buttons">
			<center>
			
			<p><a href="admin.php" class="button">Back</a></p></center>
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