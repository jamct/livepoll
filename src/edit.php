<?php

include('functions.php');
$frage = getFrage();
?>

<form id='frm_frage'>
<h1><input type='text' name='frage' align='middle' id='inp_frage' value='<?=$frage['frage'];?>'/></h1>

<h3>Antworten</h3>
<ul id='list_antworten'>
<?php

foreach($frage['antworten'] as $k=>$antwort){
	echo "<li><label style='color:".$antwort['farbe']."'> Antwort ".$k.": ▉</label> <input name='antwort_".$k."' style='color:".$antwort['farbe']."' type='text' value='".$antwort['text']."'/></li>";
}
?>
</ul>
</form>
<button id='btn_save'>Änderungen speichern</button><br/>
<button id="btn_delete">Umfrage löschen</button>
<button id="btn_reset">Antworten löschen</button>

<script>
$('#btn_save').on('click', function(){
	var data = $('#frm_frage').serialize();
	$.post('./save_frage.php',{data:data}).done(function(a){
	});
});
$('#btn_delete').on('click', function(){
	
	$.post('./delete_frage.php').done(function(a){
		$('#main').load('edit.php');
	});
});
$('#btn_reset').on('click', function(){
	
	$.post('./delete_antworten.php').done(function(a){
		$('#main').load('edit.php');
	});
});
</script>