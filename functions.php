<?php
// functions for phpgame


function redirect($page) {
	header('Location: ' . $page) ;
	exit();
}

function check_login_status() {
	// if $_SESSION['logged_in'] is set, return the status
	if (isset($_SESSION['username'])) {
		return $_SESSION['username'];
	}
	else {
		return false;
	}
}

function safeInsert($string)
	{
	global $dbConn;
	$string = htmlentities($string);
	$string = mysqli_real_escape_string($dbConn, $string);
	return $string;
	}

function show_inventory () {
	
	require_once('conn.php');
	
	$dbConn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	
	$user = $_SESSION['username'];
	
	$sqluser = "SELECT userID FROM users WHERE username = '$user'";
	$resuser = mysqli_query($dbConn, $sqluser);
	$rowuser = mysqli_fetch_assoc($resuser);
	
	$userID = $rowuser['userID'];
	
	$sqlLootID = "SELECT lootID FROM inventory WHERE userID = '$userID'";
	$resLootID = mysqli_query($dbConn, $sqlLootID);
	$rowLootID = mysqli_fetch_assoc($resLootID);
	
	$lootID = $rowLootID['lootID'];
	
	$sqlLoot = "SELECT lootname, lootdesc, loottype, strength, intelligence, agility, Defence FROM loot WHERE lootID = '$lootID'";
	$resLoot = mysqli_query($dbConn, $sqlLoot);
	
	
	while( $rowLoot = mysqli_fetch_assoc($resLoot) )
	{
		echo "<li>";
		echo "<strong>";
		echo $rowLoot['lootname'];
		echo "</strong>";
		echo "<br>";
		echo $rowLoot['lootdesc'];
		echo "<br>";
		echo "Strength: ";
		echo $rowLoot['strength'];
		echo "<br>";
		echo "Intelligence: ";
		echo $rowLoot['intelligence'];
		echo "<br>";
		echo "Agility: ";
		echo $rowLoot['agility'];
		echo "<br>";
		echo "Defence: ";
		echo $rowLoot['Defence'];
		echo "<br>";
		echo "</li>";
		echo "<hr>";
		
	}
	
	
}



function adventure () 
{
require_once('conn.php');

$dbConn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

$advenID = rand(4,5);

$sqlAdven = "SELECT advenname, strength, intelligence, agility, Defence, advencontent, imagepath FROM adventures WHERE advenID = '$advenID'"; // Random an adventure
$resAdven = mysqli_query($dbConn, $sqlAdven);

$rowAdven = mysqli_fetch_assoc($resAdven);

$imageAdven = $rowAdven['imagepath'];
$titleAdven = $rowAdven['advenname'];
$contentAdven = $rowAdven['advencontent'];
$strengthAdven = $rowAdven['strength'];
$intelligenceAdven = $rowAdven['intelligence'];
$agilityAdven = $rowAdven['agility'];
$defenceAdven = $rowAdven['Defence'];

echo "<h2>$titleAdven</h2>";		
echo "<img src='$imageAdven' width='300px'>";
echo $contentAdven;
echo "<p><strong>What action will you choose?</strong></p>";
echo "<form action='adventures.php' method='post'>";
echo "<input type='radio' name='choice' value='strength'>Fight with strength!<br>";
echo "<input type='radio' name='choice' value='magic'>Fight with magic!<br>";
echo "<input type='radio' name='choice' value='trick'>Trick the monster!<br>";
echo "<input type='radio' name='choice' value='flee'>Flee!<br>";
echo "<input type='submit' value='Send' name='submit'><br>";
echo "</form>";




if(isset($_POST['submit'])) {
$action = $_POST['choice'];


//end random adventure

$user = $_SESSION['username'];

$sqlInven = "SELECT lootID FROM inventory WHERE userID = '$user'"; // Get the users stats from inventory, every user starts with 5 in every stat because of base armor.
$resInven = mysqli_query($dbConn, $sqlInven);
$rowInven = mysqli_fetch_assoc($resInven);

$LootInven = $rowInven['lootID'];

$sqlStats = "SELECT strength, intelligence, agility, Defence FROM loot WHERE lootID = '$LootInven'";
$resStats = mysqli_query($dbConn, $sqlStats);
$rowStats = mysqli_fetch_assoc($resStats);

$strengthStats = $rowStats['strength'] + 5;
$intelligenceStats = $rowStats['intelligence'] + 5;
$agilityStats = $rowStats['agility'] + 5;
$defenceStats = $rowStats['Defence'] + 5;

//end get users stats



if(isset($_POST['choice'])) { // If you win the adventure
	if ($_POST['choice'] === 'strength') {
		if($strengthStats > $defenceAdven && $defenceStats > $strengthAdven) {
			redirect('getloot.php');
		}
		else {
			redirect('youlost.php');
		}
	}
	

	elseif ($_POST['choice'] === 'magic') {
		if($intelligenceStats > $intelligenceAdven && $intelligenceStats > $intelligenceAdven) {
			redirect('getloot.php');
		}
		else {
			redirect('youlost.php');
		}
	}
	

	elseif ($_POST['choice'] === 'trick') {
		if($agilityStats > $agilityAdven && $agilityStats > $agilityAdven) {
			redirect('getloot.php');
		}
		else {
			redirect('youlost.php');
		}
	}
	
	elseif ($_POST['choice'] === 'flee') {
		redirect('flee.php');
	}

}
else {
	echo "Chose an action!";
}

// Insert the loot into the users inventory and echo "you got this item"

}
}

function getloot () {

require_once('conn.php');

$dbConn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

$lootID = rand(1, 4);

$sqlLoot = "SELECT lootID, lootname, lootdesc, strength, intelligence, agility, Defence, loottype FROM loot WHERE lootID = '$lootID'"; // Random a lootitem
$resLoot = mysqli_query($dbConn, $sqlLoot);
$rowLoot = mysqli_fetch_assoc($resLoot);

$IdLoot = $rowLoot['lootID'];
$nameLoot = $rowLoot['lootname'];
$descLoot = $rowLoot['lootdesc'];
$strengthLoot = $rowLoot['strength'];
$intelligenceLoot = $rowLoot['intelligence'];
$agilityLoot = $rowLoot['agility'];
$defenceLoot = $rowLoot['Defence'];
$typeLoot = $rowLoot['loottype'];

echo "<h2>You were successfull and picked up $nameLoot!</h2><br>";
echo "<strong>Description:</strong> $descLoot";
echo "<br>";
echo "<strong>Strength:</strong> $strengthLoot<br>";
echo "<strong>Intelligence:</strong> $intelligenceLoot<br>";
echo "<strong>Agility:</strong> $agilityLoot<br>";
echo "<strong>Defence:</strong> $defenceLoot<br>";

$user = $_SESSION['username'];

$sqlUser = "SELECT userID FROM users WHERE username = '$user'";
$resUser = mysqli_query($dbConn, $sqlUser);
$rowUser = mysqli_fetch_assoc($resUser);

$Iduser = $rowUser['userID'];

$sqlInsert = "INSERT INTO inventory (lootID, userID) VALUES ('$IdLoot', '$Iduser') ";
$resInsert = mysqli_query($dbConn, $sqlInsert);

}
?>

