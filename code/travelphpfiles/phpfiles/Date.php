<?php
$command = escapeshellcmd('java -cp .:jsoup-1.8.1.jar web1_month');
$output = shell_exec($command);
echo $output;
?>
