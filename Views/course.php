<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Seats Remaining'],
          ['March 22',  60],
          ['March 23',  45],
          ['March 24',  40],
          ['March 25',  37],
          ['March 26',  30],
          ['March 27',  32]
        ]);

        var options = {
          title: 'Seats Remaining'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  	<h1 align=center>Seats Currently Remaining</h1>
  	<h1 style="color:red;", align=center>32</h1>
    <div align=center><button type="button", align=center>Follow Course</button></div>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>
<?php
class My extends Thread {
    public function run() {
        $mystring = system('python ../Infastructure/myscript.py', $retval);
    }
}
$my = new My();
$my->start();

//$mystring = system('python ../Infastructure/myscript.py', $retval);?>