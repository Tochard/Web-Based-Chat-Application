<?php
session_start();

if(isset($_SESSION['unique_id'])){
    include_once "dbconn.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    date_default_timezone_set('Africa/lagos');
    $msg_date = date('m/d/Y g:ia ');
    $msg_time = date('g:ia');
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    

    if(!empty($message)){
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg_date, msg_time, msg)
                            VALUES ({$incoming_id}, {$outgoing_id}, '{$msg_date}', '{$msg_time}', '{$message}') ") or die(); 
    }
    
} else{
	header("location: ../login.php");
}
