<?php
$option = isset($_POST['custom']) ? $_POST['custom'] : false;
if(!$option) {
echo "NOT AVAILABLE";
}
?>
<html>
<head>
<script language="javascript" type="text/javascript" src="../jquery/jquery-1.8.3.js"></script>
<link rel="stylesheet" href="./stylefull.css">
</head>
<body>

<div id="bg-menu" >Traveleria<a href="./Travel8.php"><img src="./photos/Home.png" align="right" width="32px" height="32px"></img></a></div>
<div id="content" style="font-size:150%;"><div style="font-size:200%";>Duty Customs</b></div>
<?php
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web16_customs '.$option);
	$output = shell_exec($command);
	//$optput=str_replace("?","",$output);
echo $output;
?>
