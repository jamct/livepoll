<?php
header('Content-Type: application/json');

include('functions.php');
$frage = getFrage();
$res['question'] = $frage['frage'];

$votes = @json_decode(file_get_contents("./data/votes.json"),true);



if(!is_array($votes)){
	echo json_encode(array("novotes"=>"true"));
	exit;
}

foreach($votes as $k=>$vote){
	$counter[$vote]++;	
}

foreach($frage['antworten'] as $nr=>$ant){
	$res['results'][] = array("frage"=>$ant['text'],"sum"=>$counter[$nr],"color"=>$ant['farbe']);
}

echo json_encode($res);