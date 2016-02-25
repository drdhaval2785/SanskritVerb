<?php
/* set execution time to an hour */
ini_set('max_execution_time', 36000);
/* set memory limit to 100000 MB */
ini_set("memory_limit","100000M");
include 'function.php';
$controllist=vl();
echo '$verbsingerard=array("'.implode('","',$controllist).'");';
$verblist=verbforms();
echo '$verblist=array("'.implode('","',$verblist).'");';

function vl()
{
	$inputtext = file_get_contents('../Data/verblist_gerard.txt');
	$controllist = explode(',',$inputtext);
	return $controllist;
}
function verbforms()
{
	$inputtext = file_get_contents('../Data/verbforms_gerard.txt');
	$controllist = explode(',',$inputtext);
	$inputtext1 = file_get_contents('../Data/verbforms_amba.txt');
	$controllist1 = explode(',',$inputtext1);
	$okprelim = file('../Data/okforms.txt');
	$okfinal=array();
	foreach ($okprelim as $okp)
	{
		$okfinal[] = explode('-',$okp)[0];
	}
	$finallist = array_merge($controllist,$controllist1,$okfinal);
	return $finallist;
}

?>