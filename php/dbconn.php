<?php
//params to connection to a database

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "chat";

// connection to database
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
	die('database connection failed' . mysqli_connect_error());
}
