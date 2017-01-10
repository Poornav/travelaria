<!DOCTYPE html>
<html>
	<head>
		<title> Traveleria </title>
		<link rel="stylesheet" href="cssfiles/Travel3.css">
	</head>
	<body>
		<div id="container">
			<header>
			<div id="header">
				<h1>Traveleria</h1>	
			</div>
			</header>
			<div id="navigation">
				<form method="POST" action="phpfiles/Country.php">
				<ul>
					<li><a href="Travel3.html">Home Page</a></li>
					<li><a href="popularplaces.html">Popular Places</a></li>
					<li><a href="browseplaces.html">Browse Places</a></li>
					<li><a href="phpfiles/Date.php">Date</a></li>
					<li><a href="phpfiles/Select.php">Select a city</a></li>
					<li><a id="not_a">Select Country</a></li>
					<li><select id="indusa" name="indusa">
					<option value="India">INDIA</option>
					<option value="US">USA</option>
					<input type="submit" value="select"></li>

				
				</ul>		
				</form>
			</div>
			<div id="content_container">
				<div id="asideleft" style="background:#6495ED">
					<img src="photos/pic.jpg" width="250" height="200" alt="">	
	
					
					
				</div>
				<div id="asidemiddle" style="background:#6495ED">you are to the left</div>
				<div id="asideright" style="background:#40E0D0">
					<?php
						echo "<h2> Top 10 places to visit</h2>";
						$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web10_top10places');
						$output=shell_exec($command);
						echo $output;
					?>
				</div>
				
				<div id="banner">

					<?php
						include("banner-slider.source.html");
					?>
					<script>
					document.getElementByID("img1").innerHTML='<img u=image src="k.jpg"></img><div u="thumb">hahaha</div>';
					</script>
					
				</div>
			</div>
			
			
						





		</div>
	</body>
</html>
