<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session
session_start();

$herred = $_POST['herred'];
$sogn = $_POST['sogn'];
$amt = $_POST['amt'];
$url = $_POST['url'];

// Prevent direct access to the script
if (!isset($_POST['sogn'])) die("Access Denied!");



$link = mysqli_connect("mysql31.unoeuro.com", "genealogisk_dk1", "AevleBaevle194287Bum", "genealogiskforum_dk_db9");
$link->set_charset("utf8");

// Check connection
if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sqlStr = sprintf("SELECT COUNT(id) FROM kirkebogssogne WHERE `Sogn` = '%s' AND  `Herred` = '%s' AND  `Amt` = '%s' AND `Kirkebog` = '%s' AND `URL` = '%s' LIMIT 1", $_POST['sogn'], $_POST['herred'], $_POST['amt'], $_POST['kirkebog'], $_POST['url']);
$result = mysqli_query($link, $sqlStr) or die(mysql_error());
$count = mysqli_fetch_row($result);

if ($count[0] == 0):

	$sqlStr = sprintf("INSERT INTO kirkebogssogne (id, Sogn, Herred, Amt, Kirkebog, URL ) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')", $_POST['id'], $_POST['sogn'], $_POST['herred'], $_POST['amt'], $_POST['kirkebog'], $_POST['url']);

	$response = array(
		"success" => $link->query($sqlStr),
		"message" => "Data er opdateret"
	);

else: 

	$response = array(
		"success" => 0,
		"message" => "Denne bog findes allerede"
	);  

endif;  

// Let's push the response to the SESSION
$_SESSION['response'] = json_encode($response);

// And send the user on his way
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>