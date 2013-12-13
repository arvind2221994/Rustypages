<?php
require_once('db_connect.php');
var_dump($_REQUEST);
/* RECEIVE VALUE */
$validateValue=$_REQUEST['username'];
$validateId="username";

if ($stmt = $mysqli->prepare("SELECT username 
        FROM users
       WHERE username = ?
        LIMIT 1"))
        $stmt->bind_param('s', $validateValue);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
         var_dump($stmt);
        // get variables from result.
        $stmt->bind_result($username);
        $stmt->fetch();


$validateError= "This username is already taken";
$validateSuccess= "This username is available";



	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = $validateId;

if($validateValue == $username){		// validate??
	$arrayToJs[1] = true;			// RETURN TRUE
	echo json_encode($arrayToJs);			// RETURN ARRAY WITH success
}else{
	for($x=0;$x<1000000;$x++){
		if($x == 990000){
			$arrayToJs[1] = false;
			echo json_encode($arrayToJs);		// RETURN ARRAY WITH ERROR
		}
	}
	
}
       