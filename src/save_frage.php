<?php

parse_str($_POST['data'], $daten);

//print_r($daten);

//Frage auslesen
$frage = @json_decode(file_get_contents("./data/frage.json"),true);

$frage['frage'] = $daten['frage'];
unset($daten['frage']);

foreach($daten as $k=>$dat){
	$key = explode("_",$k)[1];
	if(strlen($dat)){
	$frage['antworten'][$key]['text'] = $dat;
	}else{
		unset($frage['antworten'][$key]);
	}
	
}
file_put_contents("./data/frage.json", json_encode($frage));