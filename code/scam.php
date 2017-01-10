<?php
session_start();
?>
<html>
<body>
<?php
echo "<h2>Scams</h2>";
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web5_scams '.$_SESSION["country"]);
$output = shell_exec($command);
echo $output;
?>
<br><br>
<a href="weather.php">Weather</a>
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
<br>
<a href="Travel.php">Home</a>
</body>

</html>
