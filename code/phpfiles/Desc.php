<?php
session_start();
?>
<html>
<body>
<?php

$option = isset($_POST['city']) ? $_POST['city'] : false;
$country = isset($_POST['country']) ? $_POST['country'] : false;
if(!$option) {
	$country=$_SERVER['QUERY_STRING'];
	$country=explode('/',$country);
	$option=$country[1];
	$country=$country[0];
}
$_SESSION["city"]= $option;
$_SESSION["country"] = $country;
echo "<h2>Description</h2>";
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web3_wiki_desc '.$option);
$output = shell_exec($command);
echo $output;

echo "<h2>Image</h2>";
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web9_images '.$option);
$output = shell_exec($command);
echo "<center>";

echo $output;
echo "</center><br><br>";
?>

<a href="weather.php">Weather</a>
<br>
<a href="scam.php">Scams</a>
<br>
<a href="place.php">Places to visit</a>
<br>
<a href="rest.php">Resaraunts</a>
<br>
<a href="hotel.php">Hotels</a>
<br>
<a href="transport.php">Local Transport</a>
<br>
<a href="local_customs.php">Local Customs</a>
<br>
<a href="shopping.php">Shopping</a>
<html>

<body bgcolor="#FFFF00">
</body>

</html>
