<?php
// Find discrepancies in gaNa 10 as per github issue 967.
include('function.php');
foreach($verbdata as $verbdatum)
{
	list($verb[],$meaning[],$verb1[],$verbset[],$verbnumber[],$verbpada[],$verbit[],$deva[],$ma[],$ks[],$dh[],$uohyd[],$jnu[]) = explode(':',$verbdatum);
}
$setlist = array("01","02","03","04","05","06","07","08","09","10");
foreach($setlist as $setvalue)
{
	$arr = array();
	for($i=0;$i<count($verbdata);$i++)
	{
		if($verbset[$i]===$setvalue)
		{
			$verbnum = intval($verbnumber[$i]);
			$arr[$i] = $verbnum;
		}
	}
	sort($arr);
	foreach($arr as $val)
	{
		if(!in_array($val-1,$arr) && $val!==1)
		{
			echo $setvalue.":".(string)($val-1)."\n";
		}
		elseif(!in_array($val+1,$arr) && $val!==1)
		{
			echo $setvalue.":".(string)($val+1)."\n";
		}
	}
}

?>