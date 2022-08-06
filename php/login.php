<?php
session_start();
include "dbconn.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


if (!empty($email) && !empty($password)) {
    //checking the email and password matched that of teh database 

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($sql) > 0) {
        //if user exist
        $row = mysqli_fetch_assoc($sql);
        $status = "Active now";
        //once user logsin, update status to active now
        $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$row['unique_id']}");
        if($sql2){
            $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique_id in the other php files
            $_SESSION['login_time'] = time();
            echo "success";
        }

    } else {
        echo "Email or Password is incorrect!";
    }

} else{
    echo "All input fields are required!";
}


















?>