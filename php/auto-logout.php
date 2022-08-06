<?php

session_start();

if(!isset($_SESSION['unique_id'])){
	header("location: login.php");
}else if((time() - $_SESSION['login_time']) > 300){
	include_once "./php/lgout.php";
} else{
	$_SESSION['login_time'] = time();
}


?>