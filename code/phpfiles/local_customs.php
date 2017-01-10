<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
<title>Local_customs</title>
<link rel="stylesheet" href="../cssfiles/stylelocal.css">
<script language="javascript" type="text/javascript" src="../jquery/jquery-1.8.3.js"></script>
</head>
<body>



Traveleria
<div id="bg-menu" >Hey</div>
<div id="content" style="font-size:100%;">Description

<?php
$con=mysqli_connect("localhost","root","qwerty","Travel");
if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




echo "<h2>Local Customs</h2>";
$a=$_SESSION["city"];
$result = mysqli_query($con,"SELECT customs FROM LCustoms WHERE place='$a'");
if($row = mysqli_fetch_array($result))	{
	$info=$row['customs'];
	$info=str_replace("\\\"","\"",$info);
	/*$arr=split("!@#[$][%]",$info);
	$count=count($arr)-1;
	 echo "<div style='width:1200px;height:1300px;border:solid; overflow-y:hidden;display:inline-block; float:left;'>";
	for($i=0;$i<$count;$i++) {
	  
		echo "<div style='width:375px;height:300px;border:solid; overflow-y:hidden;float:left;'>".$arr[$i]."</div>";
	}
	echo "</div>";*/
	echo $info;
	mysqli_close($con);
}
else {
	$sql="select id from VirtualTourist where city='$a'";
	$result=mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result)) {
	  $l=$row['id'];
	}
	
	$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web14_localcustoms '.$l.' '.$a);
	$output = shell_exec($command);
		
	
	$info=$output;
	$arr=split("!@#[$][%]",$info);
	$count=count($arr)-1;
	 echo "<div style='border:solid; overflow-y:hidden;display:inline-block; float:left;'>";
	$variable=0;
	$output='';
	if($count>2)
	{
		for($i=0;$i<2;$i++) {
	  	$output.="<div style='width:300;border:solid; overflow-y:hidden;float:left;'>".$arr[$i]."</div>";
		echo "<div style='width:300;border:solid; overflow-y:hidden;float:left;'>".$arr[$i]."</div>";
		$variable=1;
		
	}

	}
	else	
	{
	for($i=0;$i<$count;$i++) {
	  
		$output.="<div style='width:375px;height:300px;border:solid; overflow-y:hidden;float:left;'>".$arr[$i]."</div>";
		echo "<div style='width:375px;height:300px;border:solid; overflow-y:hidden;float:left;'>".$arr[$i]."</div>";
		

		
		
		
	}
	}
	
		if($variable==1)
	{
		$output.="<a href=full_customs.php style=\"text-color=red;\">Read more<\a>";
		echo "<a href=full_customs.php style=\"text-color=red;\">Read more<a>";
	}
	$count=mysqli_query($con,"SELECT count(id),min(id) FROM LCustoms"); 
	if($row=mysqli_fetch_array($count)) {
		if($row['count(id)']==3) {
			$sql="DELETE from LCustoms WHERE id=".$row['min(id)'];
			$result=mysqli_query($con,$sql);
		}
	}
	$output=str_replace("\"","\\\"",$output);
	$sql="INSERT INTO LCustoms(place,customs) VALUES(\"$a\",\"$output\")";
	$t=mysqli_query($con,$sql);
	mysqli_close($con);

	echo "</div>";
}






?>
</div>

</div>
		<div id="links" style="margin-left:12%">
		<div id="Weather" style="float:left;" onmouseover="fun('Weather')" onmouseout="funout('Weather')"><a href="#"><img onmouseover="bigImg(this)" onmouseout="normalImg(this)"  src="../photos/Weather.png" width="32" height="32"></img></a></div>
		
		<div id="Scam" style="float:left;" onmouseover="fun('Scam')" onmouseout="funout('Scam')"><a href="#"><img src="../photos/Scam.png"></img></a></div>
		<div id="Places" style="float:left;" onmouseover="fun('Places')" onmouseout="funout('Places')"><a href="#"><img src="../photos/Places.png"></img></a></div>
<div id="Restaurant" style="float:left;" onmouseover="fun('Restaurant')" onmouseout="funout('Restaurant')"><a href="#"><img src="../photos/Restaurant.png"></img></a></div>
		<div id="Hotel" style="float:left;" onmouseover="fun('Hotel')" onmouseout="funout('Hotel')"><a href="#"><img src="../photos/Hotel.png"></img></a></div>
		<div id="Transport" style="float:left;" onmouseover="fun('Transport')" onmouseout="funout('Transport')"><a href="#"><img src="../photos/Transport.png"></img></a></div>
		<div id="Customs" style="float:left;" onmouseover="fun('Customs')" onmouseout="funout('Customs')"><a href="./local_customs.php"><img src="../photos/Customs.png"></img></a></div>
		<!--<div id="Katrina" style="float:left;" onmouseover="fun('Katrina')" onmouseout="funout('Katrina')"><a href="#"><img src="./5.jpg" style="width:150px;height:150px;"></img></a></div>-->
		<!--<div id="bg-right"><img src="../photos/5.jpg"></div>-->
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
		document.getElementById(str).innerHTML="<a href='#'><img onmouseover=\"bigImg(this)\" onmouseout=\"normalImg(this)\"  src='../photos/"+str+".png' width=\"32\" height=\"32\"></img></a>";
		
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
	</body>
</html>

