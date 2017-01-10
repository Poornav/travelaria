Customs<br><br>
Select country:<br>
<form method="post" action="Display.php">
<select id="Choice" name="Choice">
<?php
$con=mysqli_connect("localhost","root","root","Travel");
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con,"SELECT * FROM Customs");
while($row = mysqli_fetch_array($result)) {
	$tn=$row['id'];
	echo "<option value=\"$tn\">".$row['country']."</option>";
}
mysqli_close($con);
?>
<input type="submit" value="Select"/>
</select></form>
<html>

<body bgcolor="#FFFF00">
</body>

</html>
