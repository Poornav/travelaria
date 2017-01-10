<?php
$file1 = "./asia_city";
$lines = file($file1);
$con=mysqli_connect("localhost","root","root","Travel");
if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
foreach($lines as $line_num => $line) {
	$line=trim($line);
	
	
	$re=explode('-',$line);
	$r=explode('/',$re[0]);
	$a=count($r)-1;
	$sql="INSERT INTO VirtualTourist VALUES ('$r[$a]','$line')";
	mysqli_query($con,$sql);
}
?>
