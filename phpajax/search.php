<?php

require('sphinxapi.php');
$cl = new SphinxClient();
$cl->SetServer('localhost',9312);
$cl->SetMatchMode(SPH_MATCH_ALL);
$query = filter_input(INPUT_GET, 'query_string', FILTER_SANITIZE_STRING);
$id = array();
if($query!=''){
$result = $cl->Query($query, 'test1');
if($result['total_found']>0){
foreach ($result['matches'] as $b_id){
    array_push($id,$b_id['attrs']['b_id_attr']);
}
}
}

