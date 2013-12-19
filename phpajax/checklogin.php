<?php
require_once('db_connect.php');

session_start();
//session_destroy();
if($_SESSION){
	if($_SESSION['pass_ok']==1){
		$user_browser = preg_replace("/[a-zA-Z\s+[:punct:]]+/","",$_SERVER['HTTP_USER_AGENT']);
		$user_ip = preg_replace("/[a-zA-Z\s+[:punct:]]+/","",$_SERVER['REMOTE_ADDR']);
		$session_check= $user_browser . $user_ip;
		if($session_check == $_SESSION['user_details'])
		$user_id = $_SESSION['user_id'];
		
		$stmt = $mysqli->prepare("SELECT uuid 
        FROM users
       WHERE uuid = ?
        LIMIT 1");
		$stmt->bind_param('s', $user_id);  // Bind "$user_id" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($userid);
        $stmt->fetch();
		if($user_id == $userid){
			//USER LOGGED IN			
		$toggle=1;
		}
		else
		{
		$toggle=0;
		echo "NOT LOGGED IN!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!";
		}

		

	}
}
else{
$toggle=0
//header('Location: /error.html');
}