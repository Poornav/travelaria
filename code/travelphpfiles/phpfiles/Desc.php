<?php
session_start();
?>
<html>
<body>
<?php

//$Country = optional_param("Country",0,PARAM_STR);

$country=$_SERVER['QUERY_STRING'];
$option = isset($_POST['City']) ? $_POST['City'] : false;
if(!$option) {
	echo "Error";
	die();
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
/*
echo "<h2>Scams</h2>";
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web5_scams '.$country);
$output = shell_exec($command);
echo $output;




echo "<h2>Weather</h2>";
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web6_weather '.$option);
$output = shell_exec($command);
echo $output;


echo "<h2>Best time to go </h2>";
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web4_besttimetogo '.$country.' '.$option);
$output = shell_exec($command);
echo $output;

echo "<h2>Places to visit </h2>";
$sql="select id from VirtualTourist where city_name='$option';";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
  $l=$row['id'];
}
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web7_places '.$l.' '.$option);
$output = shell_exec($command);
echo $output;

echo "<h2>Restaurants </h2>";
$sql="select id from VirtualTourist where city_name='$option';";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
  $l=$row['id'];
}
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web8_rest '.$l.' '.$option);
$output = shell_exec($command);
echo $output;
*/
?>

<a href="weather.php">Weather</a>
<br>
<a href="scam.php">Scams</a>
<br>
<a href="best.php">Best time to go</a>
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
<html>

<body bgcolor="#FFFF00">
</body>

</html>
