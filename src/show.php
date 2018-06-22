<?php

include('functions.php');
$frage = getFrage();
?>

<h1><?=$frage['frage'];?></h1>
<h4>Bitte wählen Sie eine Antwort aus:</h4>

<h3>Antworten</h3>
<ul id='list_antworten'>

<?php
foreach($frage['antworten'] as $k=>$antwort){
	echo "<li style='color:".$antwort['farbe']."'>▉ Frage ".$k.": ".$antwort['text']."</li>";
}
?>
</ul>
