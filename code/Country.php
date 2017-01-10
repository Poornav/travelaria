<html>
<body bgcolor="#FFFF00">
<?php
$option = isset($_POST['indusa']) ? $_POST['indusa'] : false;

?>
Select City:<br>
<form method="POST" action="Desc.php?<?php echo $option; ?>">
<select id="City" name="City">
<?php

if($option=="India") {
	echo "India";
	echo "<option value=\"Bangalore\">Bangalore</option>";
	echo "<option value=\"Hyderabad\">Hyderabad</option>";
	echo "<option value=\"Delhi\">Delhi</option>";
}
else if($option=="US") {
	echo "USA";
	echo "<option value=\"New_York_City\">New York City</option>";
	echo "<option value=\"Washington,_D.C.\">Washington DC</option>";
	echo "<option value=\"California\">California</option>";
}
?>
<input type="submit" value="Select"/>
</select></form>


</body>

</html>
