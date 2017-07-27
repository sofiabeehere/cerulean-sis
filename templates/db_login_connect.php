<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sbautist";

//Procedural method for single queries (login and editing account information)
$cntn  = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
	die("Database connection failed: ".mysqli_connect_error());
}
//echo "Database connection successful."."<br/>";


?>