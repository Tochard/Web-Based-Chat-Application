<?php
    session_start();
    include_once "dbconn.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND status = 'Active now'"); 
    $output = "";

    if(mysqli_num_rows($sql) < 1){
        $output .= "No user Online";

    } elseif(mysqli_num_rows($sql) > 0){
        include "online-users.php";
    }
   
    echo $output; 






?>