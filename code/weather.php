<?php
session_start();
?>
<html>
<body>
<?php

echo "<h2>Weather</h2>";

$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web6_weather '.$_SESSION["city"]);
$output = shell_exec($command);
echo $output;
?>
<br><br>
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
<br>
<a href="Travel.php">Home</a>
</body>

</html>
