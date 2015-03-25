<?php 
/**
 *	index.php is our view
 */
 
namespace Reporo;

//Factory related includes
include_once("StatisticsFactory.php");

$statsFactory = new StatisticsFactory();
//whole publisher stats in 2015
$publisher = $statsFactory->create(1, "2015-1-1", null, null);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>Reporo Statistical Analysis</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/master.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!-- Yahoo's JavaScript library for asynchronous requests -->
	<script type="text/javascript" src="http://yui.yahooapis.com/combo?2.7.0/build/yahoo/yahoo-min.js&amp;2.7.0/build/event/event-min.js&amp;2.7.0/build/connection/connection-min.js"></script>
	<!-- Google's JavaScript api library -->
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
	  //global variables to be used in asynchronous requests to draw extra data
	  
	  function loadMore(type, id) {
		this.success = function(o) {
			if(o.responseText !== undefined) {
				var rowdata = eval(o.responseText);
				window.data.addRows([rowdata]);
				window.table.draw(data, {showRowNumber: true});
			}
		};
		this.failure = function(o) {
			//Could log this failure to a local log file
		};
		//Pass a random number so that browser does not cache loader.php
		var sUrl = "./loader.php?type="+type+"&id="+id+"&rand=" + Math.floor(Math.random()*1000001);
		YAHOO.util.Connect.asyncRequest('GET', sUrl, this, null);
	  }
	  
	  //load visualization library
	  google.load("visualization", "1", {packages:["table"]});
	  //add functions to onload event
      google.setOnLoadCallback(drawTable);
	  
      function drawTable() {
		//data to be used on google's data table
		window.data = new google.visualization.DataTable();
		
		//table that represents Google's vizualisation data table
		window.table = new google.visualization.Table(document.getElementById('table_div'));
		google.visualization.events.addOneTimeListener(table, 'ready', onReady);
		
        window.data.addColumn('string', 'Entity');
        window.data.addColumn('number', 'Impressions');
        window.data.addColumn('number', 'Clicks');
        window.data.addColumn('number', 'Revenue');
        window.data.addRows([
          ['Publisher stats',  {v: <?php echo $publisher->getImpressions(); ?>}, {v: <?php echo $publisher->getClicks(); ?>}, {v: <?php echo $publisher->getRevenues(); ?>, f: '£<?php echo $publisher->getRevenues(); ?>'}],
        ]);

        window.table.draw(data, {showRowNumber: true});
      }
	  function onReady() {
		  loadMore(2, 39);
		  loadMore(3, 4830);
		  loadMore(3, 14740);
		  loadMore(3, 18776);
		  loadMore(3, 19712);
		  loadMore(3, 19714);
		  loadMore(3, 19716);
		  loadMore(3, 19718);
		  loadMore(2, 328);
		  loadMore(3, 1760);
		  loadMore(3, 1762);
		  loadMore(3, 2326);
		  loadMore(3, 2328);
		  loadMore(3, 2330);
		  loadMore(3, 18624);
		  loadMore(3, 20868);
	  }
    </script>
</head>
<body>
	<div class="row">
		<div class="hidden-xs col-sm-2">
			<div class="col-sm-12">
				<h2>Detailed Info</h2>
				<p>These are the stats for a publisher, their websites and zones within them.</p>
			</div>
		</div>
		<div class="col-sm-10">
			<h1>Reporo Statistical Visualisation for Publishers</h1>
			<h2>2015 stats</h2>
			<div id="table_div"></div>
		</div>
	</div>
</body>
</html>