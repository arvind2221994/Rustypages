<?php
require_once 'db_connect.php';

$stmt = $mysqli->prepare("SELECT b_id, b_img_link FROM book_data");
        //$stmt->bind_param('i', $id); 
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        // get variables from result.
        $stmt->bind_result($b_id,$b_img_link);

		while($stmt->fetch()){
			$output= $b_id . '.jpg';				//save file as bookid.jpg
			if($b_img_link!=''){file_put_contents($output, file_get_contents($b_img_link));}	//write contents to file
			echo $b_id;									//loop sanity check
		}		
		
?>