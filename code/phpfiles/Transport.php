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
echo "<h2>Local Transport</h2>";
$a=$_SESSION["city"];
$result = mysqli_query($con,"SELECT transport FROM Transport WHERE place='$a'");
if($row = mysqli_fetch_array($result))	{
	echo $row['transport'];
	mysqli_close($con);
}
else {
	$sql="select id from VirtualTourist where City='$a';";
	$result=mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result)) {
	  $l=$row['id'];
	}
	$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web13_transport '.$l.' '.$a);
	$output = shell_exec($command);
	$count=mysqli_query($con,"SELECT count(id),min(id) FROM Transport"); 
	if($row=mysqli_fetch_array($count)) {
		if($row['count(id)']==3) {
			$sql="DELETE from Transport WHERE id=".$row['min(id)'];
			$result=mysqli_query($con,$sql);
		}
	}
	$output=str_replace("\"","\\\"",$output);
	$sql="INSERT INTO Transport(place,transport) VALUES(\"$a\",\"$output\")";
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
<a href="local_customs.php">Local Customs</a>
<br>
<a href="Travel.php">Home</a>
</body>

</html>
