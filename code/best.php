<?php
session_start();
?>
<html>
<body>
<?php
echo "<h2>Best time to go </h2>";
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web4_besttimetogo '.$_SESSION["country"].' '.$_SESSION["city"]);
$output = shell_exec($command);
echo $output;

?>
<br><br>
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
<a href="Travel.php">Home</a>
</body>

</html>
