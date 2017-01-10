<?php
$file1 = "./accuweather.txt";
$lines = file($file1);
$con=mysqli_connect("localhost","root","root","Travel");
if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
foreach($lines as $line_num => $line) {
	//str_replace(array("\r", "\n"), '', $line);
	
	$line=trim($line);
	
	//$pos=strpos($line,' ');
	
	//$id=substr($line,0,$pos);
	
	$ret=explode(' ',$line);
	//$cuty=substr($line,$pos+1,-1);
	$city=$ret[0];
	$c=explode('-',$city);
	$c=$c[0];
	$id=$ret[1];
	$sql="SELECT id from VirtualTourist where Lower(City) like '$c%'";
	
	$result=mysqli_query($con,$sql);
	
	if(mysqli_num_rows($result) > 0)
	{

	$sql="INSERT INTO AccuWeather VALUES ('$city','$id')";
	mysqli_query($con,$sql);
	}
}
?>
