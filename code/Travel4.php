<html>
    <head>
        <title>Traveleria</title>
        <link rel="stylesheet" href="cssfiles/Travel4.css">
        
    </head>
    <body>
    <header>
        <p style="color:#00FFFF">Traveleria<p>
    </header>
    <div id="navigation">
        <form method="POST" action="phpfiles/Country.php">
				<ul>
					<li><a href="Travel4.html">Home Page</a></li>
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
    <div id="container">
    <div id="content-container">
    </div>
    <div id="topcountries">
    </div>
    <div id="banner">
    </div>
    
    </div>
    <div id="footer">
    </div>
    
    
    </body>
</html>
