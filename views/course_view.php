<?php echo display_nav(0); ?>

<div class="container">
		
		<div class="starter-template">
		

			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript">
			  google.load("visualization", "1", {packages:["corechart"]});
			  google.setOnLoadCallback(drawChart);
			  function drawChart() {
				var data = google.visualization.arrayToDataTable([
				  ['Date', 'Seats Remaining'],
				  ['May 03',  60],
				  ['May 04',  45],
				  ['May 05',  40],
				  ['May 06',  37],
				  ['May 07',  30],
				  ['May 08',  32]
				]);

				var options = {
				  title: 'Seats Remaining'
				};

				var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
				chart.draw(data, options);
			  }
			</script>
			<h1 align=center><?php echo $depAbr." ".$number; ?>
			<h1 align=center><?php echo $name;?></h1>
			
			<h2 align=center>Seats Remaining</h2>
			<h1 style="color:red;", align=center><?php echo $seats;?></h1>
			<div align=center><button type="button", align=center>Follow Course</button></div>
			<div id="chart_div" style="width: 900px; height: 500px;"></div>

		
		<?php		session_start();
		if (isset($_SESSION['success']))
		{
			if($_SESSION['success']==1){
				echo "The new course was stored successfully.";
				$_SESSION['success']=0;
			}
		}
		?>
		</div>
	</div>