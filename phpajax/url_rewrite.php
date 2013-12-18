<?php
function GenerateUrl ($s) {
  //Convert accented characters, and remove parentheses and apostrophes
  $from = explode (',', "ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u,(,),[,],'");
  $to = explode (',', 'c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u,,,,,,');
  //Do the replacements, and convert all other non-alphanumeric characters to spaces
  $s = preg_replace ('~[^\w\d]+~', '-', str_replace ($from, $to, trim ($s)));
  //Remove a - at the beginning or end and make lowercase
  return strtolower (preg_replace ('/^-/', '', preg_replace ('/-$/', '', $s)));
}

function GenerateLink ($id,$text,$mysqli) {
	//return a link with with formatted url for a book id with $text linked
	//$book = array ('title'=>$b_name, 'id'=>$id);
	$stmt = $mysqli->prepare("SELECT b_title
        FROM book_data
       WHERE b_id = ?
        LIMIT 1");
        $stmt->bind_param('i', $id); 
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        // get variables from result.
        $stmt->bind_result($b_name);
        $stmt->fetch();
	
	$b_name = GenerateUrl ($b_name);	//create cleaned version of the title
	$link_1 = '<a href="http://localhost/Rustypages/book/' . $b_name . '/' . $id . '">';
	$link_2 = $text . '</a>';
	return $link_1 . $link_2;
}
?>