<?php
session_start();
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="../jquery/jquery-1.8.3.js"></script>
<link rel="stylesheet" href="./stylefull.css">
</head>
<body>
<div id="bg-menu" >Traveleria</div>
<div id="content" style="font-size:150%;"><div style="font-size:200%";><b>Hotels in <?php echo "Bangalore";?></b></div>

<?php
$con=mysqli_connect("localhost","root","root","Travel");
if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$a="Bangalore";//$_SESSION["city"];
$sql="select id from VirtualTourist where City='$a';";
$result=mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
  $l=$row['id'];
}
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web11_hotel '.$l.' '.$a);
$output = shell_exec($command);
echo $output;

?>
</div>
</div>
</div>
		<div id="links" style="height=600px; width=1650; margin-left:0%">
		<div id="Weather" style="float:left;" onmouseover="fun('Weather')" onmouseout="funout('Weather')"><a href="./weather.php"><img onmouseover="bigImg(this)" onmouseout="normalImg(this)"  src="./photos/Weather.png" width="32" height="32"></img></a></div>
		
		<div id="Scam" style="float:left;" onmouseover="fun('Scam')" onmouseout="funout('Scam')"><a href="./scam.php"><img src="./photos/Scam.png"></img></a></div>
		<div id="Places" style="float:left;" onmouseover="fun('Places')" onmouseout="funout('Places')"><a href="./place.php"><img src="./photos/Places.png"></img></a></div>
<div id="Restaurant" style="float:left;" onmouseover="fun('Restaurant')" onmouseout="funout('Restaurant')"><a href="./rest.php"><img src="./photos/Restaurant.png"></img></a></d
		<div id="Hotel" style="float:left;" onmouseover="fun('Hotel')" onmouseout="funout('Hotel')"><a href="./hotel.php"><img src="./photos/Hotel.png"></img></a></div>
		<div id="Transport" style="float:left;" onmouseover="fun('Transport')" onmouseout="funout('Transport')"><a href="./transport.php"><img src="./photos/Transport.png"></img></a></div>
		<div id="Customs" style="float:left;" onmouseover="fun('Customs')" onmouseout="funout('Customs')"><a href="./local_customs.php"><img src="./photos/Customs.png"></img></a></div>
		<!--<div id="Katrina" style="float:left;" onmouseover="fun('Katrina')" onmouseout="funout('Katrina')"><a href="#"><img src="./5.jpg" style="width:150px;height:150px;"></img></a></div>-->
		<!--<div id="bg-right"><img src="./photos/5.jpg"></div>-->
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
		document.getElementById(str).innerHTML="<a href='#'><img onmouseover=\"bigImg(this)\" onmouseout=\"normalImg(this)\"  src='./photos/"+str+".png' width=\"32\" height=\"32\"></img></a>";
		
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
