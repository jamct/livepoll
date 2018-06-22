<?php
//Navigation und Header
?>
<div id="header">
<h1>LivePoll</h1>
<nav>
<span class='btn-nav' data-src='live.php'>Ergebnisse live anzeigen</span>
<span class='btn-nav active' data-src='show.php'>Umfrage anzeigen</span>
<span class='btn-nav' data-src='edit.php'>Umfrage bearbeiten</span>
</nav>
</div>
  <script>
	$(function(){
		$('#main').load('./show.php');
	});
	
	  $('.btn-nav').click(function(){
		 var src = $(this).data('src');
		 $('.btn-nav').removeClass('active');
		 $(this).addClass('active');
		$('#main').load('./'+src);
	  });

  </script>