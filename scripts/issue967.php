<?php
// Find discrepancies in gaNa 10 as per github issue 967.
include('function.php');
foreach($verbdata as $verbdatum)
{
	list($verb[],$meaning[],$verb1[],$verbset[],$verbnumber[],$verbpada[],$verbit[],$deva[],$ma[],$ks[],$dh[],$uohyd[],$jnu[]) = explode(':',$verbdatum);
}
for($i=0;$i<count($verbdata);$i++)
{
	$verbnum = intval($verbnumber[$i]);
	if ($verbset[$i]==="10" && (($verbnum>191&&$verbnum<237)||($verbnum>439&&$verbnum<450)) && $verbpada[$i]!=="A")
	{
		echo $verb[$i].":".$verbset[$i].":".$verbnumber[$i].":".$verbpada[$i]."\n";
	}
}
for($i=0;$i<count($verbdata);$i++)
{
	$verbnum = intval($verbnumber[$i]);
	if ($verbset[$i]==="10" && ($verbnum>388&&$verbnum<490) && substr($verb[$i],-1,1)!=="a")
	{
		echo $verb[$i].":".$verbset[$i].":".$verbnumber[$i]."\n";
	}
}

?>