<?php
/* 
	Script to keep only verb forms from uohyd_all_forms.txt and store it in verbforms_amba.txt.
	Usage - `php uohydscrape.php > verbforms_amba_orig.txt`
	Conversion from verbforms_amba_orig.txt to verbforms_amba.txt was on sanscript site I guess (WX to SLP1).
*/
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