<!DOCTYPE html>
<html>
<head>
<title>Travel Fun</title>
<link rel="stylesheet" href="Travel.css">
</head>
<body>
<header>Traveleria

</header>
<nav id="navigation">
<form method="POST" action="Country.php">
<a href="Travel.html">Home Page</a>
<a href="Choose.php">Customs</a>
<a href="Date.php">Date</a>
<a href="Select.php">Select a city</a>
<a>Select Country:</a>
<select id="indusa" name="indusa">
<option value="India">INDIA</option>
<option value="US">USA</option>
<input type="submit" value="select">

</form>
<!--<a href="Accomodation.html">Accomodation</a>
<a href="Travel.html">Travel</a>
<a href="tinfo.html">Tourist Information & Advice</a>
--></nav>
<div id="parent">
<div id="first">
<img src="pic.jpg" width="600" height="350" alt="">
<p>Our aim is to help you find popular tourist attractions and places of interest throughout India including many castles, museums, art galleries, stately homes, royal palaces, zoos, gardens and theme parks.

We provide lots of useful information about the INDIA's favourite tourist attractions including pictures and photos, admission times, opening dates, ticket prices, location maps and contact information, to help you find things to see and do on your visit.

We also have many guides for tourists visiting India from abroad, packed with information and advice on accommodation, travel advice and other useful information.

</p>
</div>
<div id="second">
<ul>
<nav id="states">
<li class="A"><h3><a href="karnataka.html">Karnataka</a></h3></li>
<li class="B"><h3><a href="mumbai.html">Mumbai</a></h3></li>
<li class="C"><h3><a href="rajasthan.html">Rajasthan</a></h3></li>
</nav>
<?php
echo "<h2> Top 10 places to visit</h2>";
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web10_top10places');
$output=shell_exec($command);
echo $output;
?>
</ul>

</div>
</div>
<?php
include("banner-slider.source.html");
?>
<script>
document.getElementByID("img1").innerHTML='<img u=image src="k.jpg"></img><div u="thumb">hahaha</div>';
</body>

</html>
