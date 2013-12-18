<?php
require_once('db_connect.php');
require_once('authenticate.php');
//require('ajaxValidateUserLogin.php'); 
session_start(); // Our custom secure way of starting a PHP session.

var_dump($_SESSION);

if (isset($_POST['email_login'], $_POST['password_login'])) {
    $email = $_POST['email_login'];
    $password = hash("sha256",$_POST['password_login']); // The hashed password.


    if (login($email, $password, $mysqli) == true) {
        // Login success 
        //header('Location: /profile.html');
    } else {
        // Login failed 
        //header('Location: /error.html');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}