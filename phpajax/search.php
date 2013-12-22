<?php
include 'chromephp.php';
include_once 'db_connect.php';
require('sphinxapi.php');
$cl = new SphinxClient();
$cl->SetServer('localhost',9312);
$cl->SetMatchMode(SPH_MATCH_ALL);
$query = filter_input(INPUT_GET, 'query', FILTER_SANITIZE_STRING);
//ChromePhp::log($query);

if(isset($_GET['tags'])){
$tags = $_GET['tags'];
}
else{$tags = array('ae','bt','ed','cs','ma','ep','ms','hs','ee','ch','na','ce','me','mm');}
//$query = "gaskell";
$output = array();
$output['vals'] = array();
$output['tags'] = array();
if(preg_match('/^[a-z]{3,20}$/', $query)){
$result = $cl->Query($query, 'test1');
if($result['total_found']>0){
foreach ($result['matches'] as $id){
    $entry = array();
    $stmt = $mysqli->prepare("SELECT b_id, b_title, b_author, b_course, b_course_title
        FROM book_data
        WHERE b_id = ?
        LIMIT 1");
$stmt->bind_param('i', $id['attrs']['b_id_attr']);  
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($b_id, $b_name, $b_author, $b_course, $b_course_title);
$stmt->fetch();
//$b_course = strtolower($b_course);
$b_course_tag = preg_replace('/[0-9]+$/','', strtolower($b_course));     //mm1100 would give mm

if(in_array($b_course_tag,$tags)){         //if the user has allowed that tag
$entry['b_id']=$b_id; $entry['b_name']=$b_name; $entry['b_author']=$b_author; $entry['b_course']=$b_course; $entry['b_course_title']=$b_course_title;
array_push($output['vals'],$entry);
if(!in_array($b_course_tag,$output['tags'])){array_push($output['tags'],$b_course_tag);}
}
}
}
}
 
if(isset($_GET['call'])){          //if javascript called
echo json_encode($output);
}
//header('Location: /Rustypages/queriespage.php');
ChromePhp::log(json_encode($output));