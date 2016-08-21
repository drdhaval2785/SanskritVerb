<?php
include 'function.php';
$start_time = microtime(true);
$text = array("Davalasya");
$debug = 0;
$debugmode = 0;
timestamp();
$fin = fopen('trial.txt','w');
$output = '';
for($i=0;$i<500;$i++)
{
	$output = $output.$i."\n";
	//fputs($fin,$i."\n");
}
fputs($fin,$output);
fclose($fin);
timestamp();
?>