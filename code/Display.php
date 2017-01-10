<?php
$con=mysqli_connect("localhost","root","root","Travel");
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$option = isset($_POST['Choice']) ? $_POST['Choice'] : false;
if(!$option) {
	echo "Error";
	die();
}
echo "<h2>Information</h2>";

$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web16_customs '.$option);
$output = shell_exec($command);

echo $output;
?>
<html>

<body bgcolor="#FFFF00">
</body>

</html>
