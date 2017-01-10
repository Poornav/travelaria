<?php
session_start();
?>
<html>
<body>
<?php
$con=mysqli_connect("localhost","root","qwerty","Travel");
if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "<h2>Local Customs</h2>";
$a=$_SESSION["city"];
$sql="select id from VirtualTourist where city_name='$a';";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
  $l=$row['id'];
}
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web14_localcustoms '.$l.' '.$a);
$output = shell_exec($command);
echo $output;

?>
<br><br>
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
<a href="Travel.php">Home</a>
</body>

</html>
