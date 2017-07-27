<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sbautist";

//Using OOP method for multi-queries (creation of database and insertion of data)
$connection  = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($connection->connect_errno) {
	die("Database connection failed: ".$connection->connect_error);
}
//echo "Database connection successful."."<br/>";


?>