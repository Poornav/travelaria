<html>
    <head>
        <title>
		Traveleria</title>
        <link rel="stylesheet" href="./cssfiles/Travel6.css">
        
    </head>
    <body>
	<div id="asd">
    <header>
       <p style="color:#FFFFFF;background:#505050;margin-top:-1%;">Traveleria<p>
    </header>
    <div id="navigation" style="margin-top:0px;">
        <form method="POST" action="./phpfiles/Country.php">
				<ul>
					<li><a href="Travel4.html">Home Page</a></li>
					<li><a href="popularplaces.html">Popular Places</a></li>
					<li><a href="browseplaces.html">Browse Places</a></li>
					<li><a href="phpfiles/Date.php">Date</a></li>
					<li><a href="phpfiles/Select.php">Select a city</a></li>
					<!--<li><a id="not_a">Select Country</a></li>-->
					<li><a id="not_a">Select Country</a></li>
					<li><select id="indusa" name="indusa">
					<option value="India">INDIA</option>
					<option value="US">USA</option>
					<input type="submit" value="select"></li>



				</ul>		
		</form>
        
    </div>
	</div>
    <div id="container">
    <div id="content-container">
  	<table>
  	<td id="cont">
  		<img src="./photos/pic.jpg" width="250" height="200" alt="">
  	</td>
  	<td id="cont2" style="padding:2% 0 0 3%">
  		
  		
  		Our aim is to help you find popular tourist attractions and places of interest throughout India including many castles, museums, art galleries, stately homes, royal palaces, zoos, gardens and theme parks.

We provide lots of useful information about the INDIA's favourite tourist attractions including pictures and photos, admission times, opening dates, ticket prices, location maps and contact information, to help you find things to see and do on your visit.

We also have many guides for tourists visiting India from abroad, packed with information and advice on accommodation, travel advice and other useful information.
  		
  		
  		
  		
  		
  		
  		
  		
  		
  		
  	</td>
  	</table>
    </div>
    <div id="topcountries">
    	<?php
	echo "<h2> Top 10 places to visit</h2>";
	$con=mysqli_connect("localhost","root","root","Travel");
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	$result = mysqli_query($con,"SELECT Data FROM Top10");
	if($row = mysqli_fetch_array($result))	{
		echo $row['Data'];
		mysqli_close($con);
	}
	else {
		$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web10_top10places');
		$output=shell_exec($command);
		$result=mysqli_query($con,"INSERT INTO Top10 VALUES('$output')");
		mysqli_close($con);
		echo '<a href="#" id="see" style="text-decoration:none;hover background:#000000;color:#000000;">'.$output.'</a>';
	}
	
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
	<br>
<br>
    <div id="footer">
    Copyright
    </div>
    
    
    </body>
</html>
