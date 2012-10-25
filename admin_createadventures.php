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
		<title>Create adventures</title>
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
				<a href="admin.php"><li>Adminpage</li></a>
				<a href="register.php"><li>Register</li></a>
				<a href="about.php"><li>About the game</li></a>
				<a href="contact.php"><li>Contact</li></a>
			</ul>
		</div> <!--end menu-->
		
		<div id="content">
		<h2>Create new adventures</h2>
			

 

<form method="post" action="admin_createadventures.php" enctype="multipart/form-data">
	Title:<br> <input type="text" name="advenname"><br>
	Strength:<br> <input type="text" name="strength"><br>
	Intelligence:<br> <input type="text" name="intelligence"><br>
	Agility:<br> <input type="text" name="agility"><br>
	Defence:<br> <input type="text" name="defence"><br>
	Description:<br> <textarea name="advencontent" cols="50" rows="10"></textarea><br>
	Upload picture:<br> <input type="file" name="filen" ><br>
	<input type="submit" value="Skicka">
 
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
	
$imagepath = $_FILES['filen']['name'];
$advenname = safeinsert($_POST['advenname']);
$strength = safeinsert($_POST['strength']);
$intelligence = safeinsert($_POST['intelligence']);
$agility = safeinsert($_POST['agility']);
$defence = safeinsert($_POST['defence']);
$advencontent = safeinsert($_POST['advencontent']);


move_uploaded_file($_FILES['filen']['tmp_name'], $imagepath);
echo "Uploaded image '".$imagepath."' and adventure '".$advenname."'";

echo "<br>";

$sql = "INSERT INTO adventures (advenname, strength, intelligence, agility, Defence, advencontent, imagepath) VALUES ('$advenname', '$strength', '$intelligence', '$agility', '$defence', '$advencontent', '$imagepath')";
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