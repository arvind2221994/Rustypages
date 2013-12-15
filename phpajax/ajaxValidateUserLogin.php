<?php
include('chromephp.php');
require_once('db_connect.php');

/* RECEIVE VALUE */
$emailValue=filter_input(INPUT_POST, 'email_login', FILTER_SANITIZE_EMAIL);

$validateError= "This username is already taken";
$validateSuccess= "This username is available";



	/* RETURN VALUE */
	$arrayToJs = array();


        

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
    
if($emailValue== $email){		// validate??
	$arrayToJs[0] = 'email';
	$arrayToJs[1] = true;			// RETURN TRUE
	//$arrayToJs[2][2] = "This email is available";

}else{
	$arrayToJs[0] = 'email';
	$arrayToJs[1] = false;			// RETURN TRUE
	$arrayToJs[2] = "This email is not registered";    
}
ChromePhp::log($arrayToJs);
echo json_encode($arrayToJs);

