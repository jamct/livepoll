<?php
//Farben
const FARBEN = array("red"=> "rgb(219, 15, 15)" , "green"=> "rgb(10, 204, 81)", "pink" => "rgb(255, 15, 191)" , "orange"=>"rgb(255, 154, 22)","blue"=>"rgb(22, 95, 255)" );

function getFrage(){
	//Frage auslesen
	$frage = @json_decode(file_get_contents("./data/frage.json"),true);
	if(!$frage){
		//Leeres Objekt anlegen
		$neueFrage = array("frage"=>"Neue Frage", "antworten"=>array(
			1=>array("text"=>"Antwort 1", "farbe"=>FARBEN['red']),
			2=>array("text"=>"Antwort 2", "farbe"=>FARBEN['green']),
			3=>array("text"=>"Antwort 3", "farbe"=>FARBEN['pink']),
			4=>array("text"=>"Antwort 4", "farbe"=>FARBEN['orange']),
			5=>array("text"=>"Antwort 5", "farbe"=>FARBEN['blue'])
		));
		file_put_contents("./data/frage.json", json_encode($neueFrage));
		$frage = $neueFrage;	
	}
	return $frage;
	
}