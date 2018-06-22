<?
//Vote

$key = $_GET['key'];
$value = $_GET['value'];

if(!is_numeric($value) OR $value < 1){
	echo "Geben Sie einen Wert als Antwort an.";
	exit;
}

if(strlen($key) != 5){
	echo "Geben Sie einen fünfstelligen Key ein";
	exit;
}

$votes = @json_decode(file_get_contents("./data/votes.json"),true);

if(!isset($votes[$key])){
	$votes[$key] = $value;
	echo "check";
}else{
	$votes[$key] = $value;
	echo "already voted";
}

$votes = file_put_contents("./data/votes.json", json_encode($votes));