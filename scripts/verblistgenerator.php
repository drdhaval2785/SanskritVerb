<?php
/* 
	Usage: `php verblistgenerator.php`
	Script to generate two variables $verbsingerard and $verblist from ../Data/verblist_gerard.txt.
	This script will generate the verbs available in Gerard's XML database.
	It will also generate the list of verb forms included in INRIA, UoHyd, okforms and notnow lists.
*/
/* set execution time to an hour */
ini_set('max_execution_time', 36000);
/* set memory limit to 100000 MB */
ini_set("memory_limit","100000M");
include 'function.php';
# Create a controllist
$controllist=vl();
# Echo it
echo '$verbsingerard=array("'.implode('","',$controllist).'");';
# Create a verbform list from four inputs.
$verblist=verbforms();
# Echo it
echo '$verblist=array("'.implode('","',$verblist).'");';

// Read the comma separated values in an array
function vl()
{
	$inputtext = file_get_contents('../Data/verblist_gerard.txt');
	$controllist = explode(',',$inputtext);
	return $controllist;
}
// Function to scrape the verb forms from ../Data/verbforms_amba.txt, ../Data/verbforms_gerard.txt, ../Data/okforms.txt and ../Data/notnow.txt
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
	$notnowprelim = file('../Data/notnow.txt');
	$notnowfinal=array();
	foreach ($notnowprelim as $nop)
	{
		$notnowfinal[] = explode('-',$nop)[0];
	}
	$finallist = array_merge($controllist,$controllist1,$okfinal,$notnowfinal);
	return $finallist;
}

?>