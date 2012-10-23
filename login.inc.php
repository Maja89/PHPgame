<?php

require_once('conn.php');
require_once('functions.php');

// Start session

session_start();

// Check if user is already logged in

if ($_SESSION['username'] == true) {
	// If user is already logged in, redirect to account page
	redirect('account.php');
}
else {
	if((!isset($_POST['user'])) || (!isset($_POST['pass'])) OR (!ctype_alnum($_POST['user'])) ) {
		redirect('login.php');
	}
}

//Connect to database

$dbConn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if(mysqli_connect_errno()) //if you cant connect
	{
	echo "Unable to connect to database.";
	exit();
	}

$user = $_POST['user'];
$pass = $_POST['pass'];

$user = mysqli_real_escape_string($dbConn, $user);
$user = htmlspecialchars($user);

$sql = "SELECT username, userpassword FROM users WHERE username = '$user' ";

$res = mysqli_query($dbConn, $sql);

if($row = mysqli_fetch_assoc($res)) {

	$dbpass = $row['userpassword'];
	$salt =substr($dbpass, 0, 64);
	$skickatPass = hash('sha256', $salt.$_POST['pass']);
	$skickatMedSalt = $salt . $skickatPass;
	
	$_SESSION['username'] = $_POST['user'];
	
			
	if($dbpass == $skickatMedSalt) {
		if($_SESSION['username'] === 'admin') {
		redirect('admin.php');
		}
		
		else  {
		redirect('account.php');
		}
	}
	else {
		redirect('login.php');
	}	
}
else {
	redirect('login.php');
}

?>