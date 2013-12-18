<?php
require_once('db_connect.php');
require_once('authenticate.php');
require_once('ajaxValidateUserLogin.php'); 
sec_session_start(); // Our custom secure way of starting a PHP session.
var_dump($email);
if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = hash("sha256",$_POST['password']); // The hashed password.


    if (login($email, $password, $mysqli) == true) {
        // Login success 
        header('Location: ./profile.html');
    } else {
        // Login failed 
        header('Location: ./error.html');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}