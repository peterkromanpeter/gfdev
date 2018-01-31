<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$hostname = 'mysql31.unoeuro.com';
$username = 'genealogisk_dk1';
$password = 'AevleBaevle194287Bum';
$database = 'genealogiskforum_dk_db9';

$con = mysqli_connect($hostname, $username, $password, $database);
    
if ($con->connect_error) {
    die(sprintf('Connect Error (%s) %s', $con->connect_errno, $Connect->connect_error));
}

$con->set_charset("utf8");