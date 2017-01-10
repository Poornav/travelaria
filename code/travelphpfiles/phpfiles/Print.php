<?php
$file1 = "./Output.txt";
$lines = file($file1);
$con=mysqli_connect("localhost","root","qwerty","Travel");
if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
foreach($lines as $line_num => $line) {
	str_replace(array("\r", "\n"), '', $line);
	
	trim($line);
	
	$pos=strpos($line,' ');
	
	$id=substr($line,0,$pos);
	
	//$ret=explode(' ',$line);
	$country=substr($line,$pos+1,-1);
	//$id=$ret[0];
	//$country=$ret[1];
	//trim($country);
	$sql="INSERT INTO Customs VALUES ('$id','$country')";
	mysqli_query($con,$sql);
}
?>
