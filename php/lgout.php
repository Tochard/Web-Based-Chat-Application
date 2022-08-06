<?php
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "dbconn.php";
    $status = "Offline now";
    //once user logs out, update status to offline now
    $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_SESSION['unique_id']}");
    if($sql){
        session_unset();
        session_destroy();
        header("location: ./login.php");
    }



}