<?php
$file1 = "./asia_countries.txt";
$lines = file($file1);
$con=mysqli_connect("localhost","root","root","Travel");
if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
foreach($lines as $line_num => $line) {
	$line=trim($line);
	$sql="INSERT INTO Country VALUES ('$line')";
	mysqli_query($con,$sql);
}
?>

var str = "<?php $sql='select "+e+" from Country;'; $result=mysqli_query($con,$sql); echo '<select id="country"  onchange="sel2()">'; while($row = mysqli_fetch_array($result)) { echo '<option value="+e+"> $row['"+e+"']; </option>'; } </select> ?>";
