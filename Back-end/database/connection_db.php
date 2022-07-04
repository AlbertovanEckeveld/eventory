<?php 

define('BD_NAME', 'eventory');
define('BD_USER', 'root');
define('BD_PASS', '');
define('DB_HOST', 'localhost');

if(!$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)) {
    die("failed connection to the eventory database!")
}

$string = "mysql:host=localhost;dbname=eventory";
if(!$connection = new PDO($string,DB_USER,DB_PASS))
{
	die("failed to connect!");
}