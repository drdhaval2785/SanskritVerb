<?php
/* set execution time to an hour */
ini_set('max_execution_time', 36000);
/* set memory limit to 100000 MB */
ini_set("memory_limit","100000M");
function scrape_amba()
{
	$input = file('UoHyd_all_forms.txt');
	$verbforms = array();
	foreach ($input as $value)
	{
		$split = explode(':',$value);
		$verbforms[] = $split[0];
	}
	return implode(',',$verbforms);
}
echo scrape_amba()
?>