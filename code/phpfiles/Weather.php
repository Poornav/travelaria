<?php
session_start();
?>
<html>
<head>
<title>
Weather
	</title>
<script language="javascript" type="text/javascript" src="../jquery/jquery-1.8.3.js"></script>
<link rel="stylesheet" href="./stylefull.css">
</head>
<body>
<div id="bg-menu" >Traveleria <a href="../Travel8.php"><img src="../photos/Home.png" align="right" width="32px" height="32px"></img></a></div>
<div id="content" style="font-size:150%;"><div style="font-size:200%;"><b>Weather in <?php echo $_SESSION["city"];?></b></div>
<?php
$con=mysqli_connect("localhost","root","root","Travel");
if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$a=$_SESSION["city"];
$aa=explode("_",$a);
$a=$aa[0];
$result = mysqli_query($con,"SELECT weather FROM Weather WHERE place='$a'");
if($row = mysqli_fetch_array($result))	{
	$info=$row['weather'];
	$info=str_replace("\\\"","\"",$info);
	if (strpos($info,'!@#$%') !== false) {
	$arr=split("!@#[$][%]",$info);
	$count=count($arr)-1;
	 echo "<div style=' overflow-y:hidden;display:inline-block; '>";
	
	for($i=0;$i<$count;$i++) {
	  
		echo "<div style='width:1357px;height:200px;border:solid; overflow-y:scroll;'>".$arr[$i]."</div>";
		
		
		
	}
	
}else {
echo $info;
}

	echo "</div>";
	mysqli_close($con);
}
else {
$sql="select id from AccuWeather where City like '$a%';";
$result=mysqli_query($con,$sql);
if($row = mysqli_fetch_array($result)) {
  $l=$row['id'];
}
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web6_weather '.$l.' '.$a);
$output = shell_exec($command);
$output=str_replace("\\\"","\"",$output);
$output=str_replace("?"," C",$output);
$count=mysqli_query($con,"SELECT count(id),min(id) FROM Weather"); 
	if($row=mysqli_fetch_array($count)) {
		if($row['count(id)']==3) {
			$sql="DELETE from Weather WHERE id=".$row['min(id)'];
			$result=mysqli_query($con,$sql);
		}
	}
	$sql="INSERT INTO Weather(place,weather) VALUES(\"$a\",\"$output\")";
	$t=mysqli_query($con,$sql);
	mysqli_close($con);	
echo $output;
}
?>
</div>
		<div id="links" style="height=600px; width=1650; margin-left:0%">
		<div id="TryDesc" style="float:left;" onmouseover="fun('TryDesc')" onmouseout="funout('TryDesc')"><a href="./TryDesc.php"><img onmouseover="bigImg(this)" onmouseout="normalImg(this)"  src="../photos/TryDesc.png" width="32" height="32"></img></a></div>
		
		<div id="Scam" style="float:left;" onmouseover="fun('Scam')" onmouseout="funout('Scam')"><a href="./Scam.php"><img src="../photos/Scam.png" width="32" height="32"></img></a></div>
		<div id="Places" style="float:left;" onmouseover="fun('Places')" onmouseout="funout('Places')"><a href="./Place.php"><img src="../photos/Places.png" width="32" height="32"></img></a></div>
<div id="Restaurant" style="float:left;" onmouseover="fun('Restaurant')" onmouseout="funout('Restaurant')"><a href="./Restaurant.php"><img src="../photos/Restaurant.png" width="32" height="32"></img></a></div>
		<div id="Hotel" style="float:left;" onmouseover="fun('Hotel')" onmouseout="funout('Hotel')"><a href="./Hotel.php"><img src="../photos/Hotel.png" width="32" height="32"></img></a></div>
		<div id="Transport" style="float:left;" onmouseover="fun('Transport')" onmouseout="funout('Transport')"><a href="../Transport.php"><img src="../photos/Transport.png" width="32" height="32"></img></a></div>
		<div id="Customs" style="float:left;" onmouseover="fun('Customs')" onmouseout="funout('Customs')"><a href="./Customs.php"><img src="../photos/Customs.png" width="32" height="32"></img></a></div>
		<div id="Shop" style="float:left;" onmouseover="fun('Shop')" onmouseout="funout('Shop')"><a href="Shop.php"><img src="../photos/Shop.png" width="32" height="32"></img></a></div>
		<div id="Events" style="float:left;" onmouseover="fun('Events')" onmouseout="funout('Events')"><a href="Events.php"><img src="../photos/Events.png" width="32" height="32"></img></a></div>
		<div id="bg-bottom">About Us</div>
		</div>
		
		<script>
		 var a=0;
		function fun(str)
		{
		
		if(a==0)
		{
		
		s=document.getElementById(str).innerHTML;
		document.getElementById(str).innerHTML=s+"<br>"+"<div style=\"border-radius:2em;color:#FFFFFF;-webkit-transition:3000ms;transition:3000ms;\">"+str+"</div>";
		a+=1;
		}
		//<a href="#"><img onmouseover="fun('Weather')" onmouseout="funout()"  src="./Weather.png"></img></a>
		//<br>
		}
		
		function funout(str)
		{
		document.getElementById(str).innerHTML="";
		document.getElementById(str).innerHTML="<a href='"+str+".php'><img onmouseover=\"bigImg(this)\" onmouseout=\"normalImg(this)\"  src='../photos/"+str+".png' width=\"32\" height=\"32\"></img></a>";
		
		a=0;
		}
		function bigImg(x) {
 	   	x.style.height = "48px";
 	   	x.style.width = "48px";
		}

		function normalImg(x) {
    		x.style.height = "32px";
    		x.style.width = "32px";
		}
		
		</script>

</html>
