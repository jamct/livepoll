
<center><h2 id="frage"></h2></center>
<button id="btn_load">Ergebnisse neu laden</button>
<div id="livepollcontainer">
<canvas id="mycanvas"></canvas>
</div>
<script type="text/javascript" charset="utf-8">


$(document).ready(function(){
	refresh();	
});	

setInterval(function(){ refresh(); }, 10000);

$('#btn_load').on('click',function(){
	refresh();
});
	
function refresh(){	
	$.ajax({
		url: "./data.php",
		method: "GET",
		success: function(data) {
			var player = [];
			var values = [];
			var color = [];
			var frage = data.question;
			if(data.novotes == 'true'){
				$('#error').html("Noch keine Antworten");
				return;
			}


			$('#frage').text(frage);
			
			for(var i in data.results) {
				
				player.push(data.results[i].frage);
				values.push(data.results[i].sum);
				color.push(data.results[i].color);
			}

			var chartdata = {
				labels: player,
				datasets : [
					{
						label: frage,
						backgroundColor: color,
						borderColor: 'rgba(200, 200, 200, 0.75)',
						data: values
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				options: {
					legend: {

						display: true,
						labels: {
							fontSize: 32
						}
					},
					
					
					animation: false,
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true,
				fontSize: 10
            }
        }],
		 xAxes: [{
            ticks: {
				fontSize: 24
            }
        }],
    }
}
			});
		},
		error: function(data) {
		}
	});
}

</script>