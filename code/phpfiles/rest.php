<?php
session_start();
?>
<html>
<body>
<?php
$con=mysqli_connect("localhost","root","root","Travel");
if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$a=$_SESSION["city"];
echo "<h2>Restaurants </h2>";
$result = mysqli_query($con,"SELECT restaurant FROM Restaurant WHERE place='$a'");
if($row = mysqli_fetch_array($result))	{
	echo $row['restaurant'];
	mysqli_close($con);
}
else {
	$sql="select id from VirtualTourist where city='$a';";
	$result=mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result)) {
	  $l=$row['id'];
	}
	$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web8_rest '.$l.' '.$a);	
	$output = shell_exec($command);
	$count=mysqli_query($con,"SELECT count(id),min(id) FROM Restaurant"); 
	if($row=mysqli_fetch_array($count)) {
		if($row['count(id)']==3) {
			$sql="DELETE from Restaurant WHERE id=".$row['min(id)'];
			$result=mysqli_query($con,$sql);
		}
	}
	$output=str_replace("\"","\\\"",$output);
	$sql="INSERT INTO Restaurant(place,restaurant) VALUES(\"$a\",\"$output\")";
	$t=mysqli_query($con,$sql);
	mysqli_close($con);	
	$output=str_replace("\\\"","\"",$output);
	echo $output;
}
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
<a href="local_customs.php">Local Customs</a>
<br>
<a href="Travel.php">Home</a>
</body>

</html>
