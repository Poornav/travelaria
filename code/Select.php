<?php
$con=mysqli_connect("localhost","root","root","Travel");
if(mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>

<div id="select_continent"><a>Select a Continent:</a>
<select id="continent"  onchange="sel()">
<option value="S">Select</option>
<option value="Asia">Asia</option>
<option value="kj">kj</option>
</select>
</div>
<script>
function sel()
{
var e = document.getElementById("continent").value;


document.getElementById("select_continent").innerHTML="<?php sel_c("+e+"); ?>";
}

</script>

<?php
function sel_c($a)
{
$sql="select '$a' from VirtualTourist;";
echo $sql;
$result=mysqli_query($con,$sql);
$p="<select id='$a' onchange='$a'>";
echo $p;
	
}


?>
