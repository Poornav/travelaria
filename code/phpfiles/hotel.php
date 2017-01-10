<?php
session_start();
?>
<html>
<head>
<title>
		Hotels
	</title>
<script language="javascript" type="text/javascript" src="../jquery/jquery-1.8.3.js"></script>
<link rel="stylesheet" href="./stylefull.css">
</head>
<body>
<div id="bg-menu" >Traveleria <a href="../Travel8.php"><img src="../photos/Home.png" align="right" width="32px" height="32px"></img></a></div>
<div id="content" style="font-size:150%;"><div style="font-size:200%";><b>Hotels in <?php echo $_SESSION["city"];?></b></div>

<?php
$con=mysqli_connect("localhost","root","root","Travel");
if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$a=$_SESSION["city"];
$result = mysqli_query($con,"SELECT hotel FROM Hotel WHERE place='$a'");
if($row = mysqli_fetch_array($result))	{
	$info=$row['hotel'];
	$info=str_replace("\\\"","\"",$info);
	echo $info;
	echo "</div>";
	mysqli_close($con);
}
else {

$sql="select id from VirtualTourist where City='$a';";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
  $l=$row['id'];
}
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web11_hotel '.$l.' '.$a);
$output = shell_exec($command);
$count=mysqli_query($con,"SELECT count(id),min(id) FROM Hotel"); 
	if($row=mysqli_fetch_array($count)) {
		if($row['count(id)']==3) {
			$sql="DELETE from Hotel WHERE id=".$row['min(id)'];
			$result=mysqli_query($con,$sql);
		}
	}
	$output=str_replace("\"","\\\"",$output);
	$sql="INSERT INTO Hotel(place,hotel) VALUES(\"$a\",\"$output\")";
	$t=mysqli_query($con,$sql);
	mysqli_close($con);	
	$output=str_replace("\\\"","\"",$output);
echo $output;
}
?>
</div>
</div>
</div>
		<div id="links" style="height=600px; width=1650; margin-left:0%">
		<div id="Weather" style="float:left;" onmouseover="fun('Weather')" onmouseout="funout('Weather')"><a href="./Weather.php"><img onmouseover="bigImg(this)" onmouseout="normalImg(this)"  src="../photos/Weather.png" width="32" height="32"></img></a></div>
		
		<div id="Scam" style="float:left;" onmouseover="fun('Scam')" onmouseout="funout('Scam')"><a href="./Scam.php"><img src="../photos/Scam.png" width="32" height="32"></img></a></div>
		<div id="Places" style="float:left;" onmouseover="fun('Places')" onmouseout="funout('Places')"><a href="./Places.php"><img src="../photos/Places.png" width="32" height="32"></img></a></div>
<div id="Restaurant" style="float:left;" onmouseover="fun('Restaurant')" onmouseout="funout('Restaurant')"><a href="./Restaurant.php"><img src="../photos/Restaurant.png" width="32" height="32"></img></a></div>
		<div id="TryDesc" style="float:left;" onmouseover="fun('TryDesc')" onmouseout="funout('TryDesc')"><a href="./TryDesc.php"><img src="../photos/TryDesc.png" width="32" height="32"></img></a></div>
		<div id="Transport" style="float:left;" onmouseover="fun('Transport')" onmouseout="funout('Transport')"><a href="./Transport.php"><img src="../photos/Transport.png" width="32" height="32"></img></a></div>
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
