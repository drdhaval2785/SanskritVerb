<?php
include 'function.php';
include 'slp-dev.php';
function jsonformorpheus($jsonfile)
{
	global $ASdata, $vdata, $miscdata, $paribhASAdata, $otherdata;
	$mergeddata = array_merge($ASdata,$vdata,$miscdata,$paribhASAdata,$otherdata);
	$output = [];
	foreach ($mergeddata as $value)
	{
		$split = explode(':',$value);
		$output[$split[0]] = convert(end($split));
	}
	$fin = fopen($jsonfile,'w','utf-8');
	$json_data = json_encode($output);
	fputs($fin,$json_data);
	fclose($fin);
}
jsonformorpheus('../data/sutradetailsformorpheus.json');
?>