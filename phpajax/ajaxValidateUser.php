<?php
include('chromephp.php');
require_once('db_connect.php');

/* RECEIVE VALUE */
$usernameValue = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$rollValue=filter_input(INPUT_POST, 'roll_no', FILTER_SANITIZE_STRING);
$emailValue=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


if ($stmt = $mysqli->prepare("SELECT username
        FROM users
       WHERE username = ?
        LIMIT 1"))
        $stmt->bind_param('s', $usernameValue);  // Bind "$username" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        // get variables from result.
        $stmt->bind_result($username);
        $stmt->fetch();
//ChromePhp::log($email);
//ChromePhp::log($roll);
//ChromePhp::log($username);


$validateError= "This username is already taken";
$validateSuccess= "This username is available";



	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = array();
        $arrayToJs[1] = array();
        $arrayToJs[2] = array();

        

if($usernameValue!= $username){		// validate??
	$arrayToJs[0][0] = 'username';
	$arrayToJs[0][1] = true;			// RETURN TRUE
	//$arrayToJs[0][2] = "This user is available";

}else{
	$arrayToJs[0][0] = 'username';
	$arrayToJs[0][1] = false;			// RETURN TRUE
	$arrayToJs[0][2] = "This username is not available!!!";    
}

if ($stmt = $mysqli->prepare("SELECT roll_no
        FROM users
       WHERE roll_no = ?
        LIMIT 1"))
        $stmt->bind_param('s', $rollValue);  // Bind "$username" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        // get variables from result.
        $stmt->bind_result($roll);
        $stmt->fetch();

if($rollValue!= $roll){		// validate??
	$arrayToJs[1][0] = 'roll_no';
	$arrayToJs[1][1] = true;			// RETURN TRUE
	//$arrayToJs[1][2] = "This roll_no is available";

}else{
	$arrayToJs[1][0] = 'roll_no';
	$arrayToJs[1][1] = false;			// RETURN TRUE
	$arrayToJs[1][2] = "This roll_no is not available";    
}
if ($stmt = $mysqli->prepare("SELECT email
        FROM users
       WHERE email = ?
        LIMIT 1"))
        $stmt->bind_param('s', $emailValue);  // Bind "$username" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        // get variables from result.
        $stmt->bind_result($email);
        $stmt->fetch();
    
if($emailValue!= $email){		// validate??
	$arrayToJs[2][0] = 'email';
	$arrayToJs[2][1] = true;			// RETURN TRUE
	//$arrayToJs[2][2] = "This email is available";

}else{
	$arrayToJs[2][0] = 'email';
	$arrayToJs[2][1] = false;			// RETURN TRUE
	$arrayToJs[2][2] = "This email is not available";    
}
ChromePhp::log($arrayToJs[1]);
echo json_encode($arrayToJs);

?>