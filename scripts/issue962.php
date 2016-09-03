<?php
include 'function.php';
$list1 = $nonuniqueverbs;
$counter = 1;
/*
for($i=0;$i<count($list1);$i++)
{
	$verbnumlist = scrape1($list1[$i],0,13,1);
	if (count($verbnumlist) > 2)
	{
		echo $counter." - ".$list1[$i]."<br/>\n";
		print_r($verbnumlist);
		echo "<br/>\n";
		$counter++;
	}
}*/

for($i=0;$i<count($list1);$i++)
{
	$verbnumlist = scrape1($list1[$i],0,13,1);
	$verbsetlist = scrape1($list1[$i],0,3,1);
	if ($verbsetlist!==array_unique($verbsetlist) && count($verbnumlist)==2)
	{
		echo $counter." - ".$list1[$i]."<br/>\n";
		print_r($verbnumlist);
		echo "<br/>\n";
		$counter++;
	}
}

?>