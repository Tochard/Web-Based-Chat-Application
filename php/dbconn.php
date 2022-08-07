<?php
//params to connection to a database
//for develpment stage
// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "chat";

//for production
$dbhost = "remotemysql.com";
$dbuser = "Um1yPsSz82";
$dbpass = "FcA8jTWD4k";
$dbname = "Um1yPsSz82";

// connection to database
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
	die('database connection failed' . mysqli_connect_error());
}
