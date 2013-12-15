<?php
require 'chromephp.php';
require_once('db_connect.php');

/* RECEIVE VALUE */
$validateValue = $_REQUEST["fieldValue"];
$validateId=$_REQUEST["fieldId"];

if ($stmt = $mysqli->prepare("SELECT username 
        FROM users
       WHERE username = ?
        LIMIT 1"))
        $stmt->bind_param('s', $validateValue);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        // get variables from result.
        $stmt->bind_result($username);
        $stmt->fetch();

//ChromePhp::log($_REQUEST);

$validateError= "This username is already taken";
$validateSuccess= "This username is available";



	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = $validateId;
        

if($validateValue == $username){
    $arrayToJs[1] = false;
	$arrayToJs[2] = $validateError;
    echo json_encode($arrayToJs);
}
else{
    $arrayToJs[1] = true;
    echo json_encode($arrayToJs);
}
ChromePhp::log($arrayToJs);
