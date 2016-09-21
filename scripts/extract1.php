<?php
 /* Extract various information from function.php preprocess for verbnumberdiscrepancyfinder.py
 */

require_once('function.php');

$filename = "../Data/issue965/vnum.txt";
$fp = fopen($filename,"w");

foreach($verbdata as $verbdatum)
{
	echo $verbdatum."\n";
	list($verb[],$meaning[],$verb1[],$verbset[],$verbnumber[],$verbpada[],$verbit[],$deva[],$ma[],$ks[],$dh[],$uohyd[],$jnu[]) = explode(':',$verbdatum);
}
for($i=0;$i<count($verbdata);$i++)
{
	fwrite($fp,$verb[$i].":".$verbset[$i].":".$verbnumber[$i].":".$deva[$i]."\n");
}
fclose($fp);
?>
