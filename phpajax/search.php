<?php

require('sphinxapi.php');
$cl = new SphinxClient();
$cl->SetServer('localhost',9312);
$cl->SetMatchMode(SPH_MATCH_ALL);
$result = $cl->Query('the', 'test1');
foreach ($result['matches'] as $b_id){
    var_dump($b_id);
}
