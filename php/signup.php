<?php
session_start();
include "dbconn.php";

$fname = mysqli_real_escape_string($conn, $_POST['firstName']);
$lname = mysqli_real_escape_string($conn, $_POST['lastName']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);


if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {

    //checking email validity
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //if email is valid

        //checking if email already exist in database
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            //if email already exist
            echo "$email - This email already exist!";
        } else {
            //checking if user upload file or not
            if (isset($_FILES['image'])) {
                //if file is uploaded
                $img_name = $_FILES['image']['name']; //getting user uploaded img name
                $tmp_name = $_FILES['image']['tmp_name'];  //this temporary name is used to save/move file in our folder

                // let's expllode image and get the last extension like jpg / png
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); //here we get the extension of an user uploaded img file

                $extension = ['png', 'PNG', 'Png', 'jpeg', 'JPEG', 'Jpeg', 'jpg', 'JPG', 'Jpg']; //there are some valid img ext and we've store them in array

                if (in_array($img_ext, $extension) === true) {
                    //if user uploaded img ext is matched with any array extensions
                    $time = time(); //this returns the current time so we can make the img name unique using the uploaded time

                    //moving user uploaded img to our folder
                    $new_img_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                        //if user upload img move to our folder successfully

                        $status = "Active now"; //setting status to active after sign up
                        $randon_id = rand(time(), 10000000); //creating random id for user

                        //Inserting users data into user table
                        $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, firstname, lastname, email, password, img, status)
                                                VALUES ({$randon_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

                        if ($sql2) {
                            // if these data inserted

                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0) {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique_id in the other php files
                                $_SESSION['login_time'] = time();
                                echo "success";
                            }
                        } else {
                            echo "Something went wrong!";
                        }
                    }
                } else {
                    echo "Please select an image file - jpeg, jpg, png!";
                }
            } else {
                echo "Please select an image file!";
            }
        }
    } else {
        echo "$email - This email is not valid ";
    }
} else {
    echo "All input fields are required!";
}
