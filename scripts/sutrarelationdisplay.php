<?php
/*
	Expected job:
		Display the sUtra numbers which would have applied and sUtra numbers which would not have applied, if a given sUtra didn't exist in Paninian grammar.
		By this code, we would be able to understand the interrelations between sUtras.
		e.g. apavAda, pratiSedha, paryudAsa etc may be unearthed.
	
*/
include 'function.php';
include 'slp-dev.php';
if (isset($argv[0]))
{
	$data = file('../sutrarelations/difflog1.txt');
}
else
{
	$data = file('../sutrarelations/difflog2.txt');
}
$data = array_map('trim',$data);

function sutradisplay($sutra_number)
{
	global $ASdata, $vdata, $miscdata, $paribhASAdata; global $upasarga_joined; global $us, $outfile, $otherdata; // bringing $text from main php function.
	$output = '';
	if (strpos($sutra_number,'~')!==false)
	{
		$matches = array_filter($otherdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one match.
		$msg_no = $int[0]; 
		$msg_dev = $int[2];
		if ($msg_no === $sutra_number)
		{
			$output = $msg_dev;
		}
	}
	elseif (strpos($sutra_number,'@')!==false)
	{
		$matches = array_filter($paribhASAdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one match.
		$msg_no = $int[0]; 
		$msg_dev = $int[2];
		if ($msg_no === $sutra_number)
		{
			$output = $msg_dev[$i];
		}
	}
	elseif (strpos($sutra_number,'-')===false && strpos($sutra_number,'.')!==false)
	{
		$matches = array_filter($ASdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]); // We presume that there would be only one such match.
		$sutra_no = $int[0];
		$sutra_dev = $int[2];
		if ($sutra_no === $sutra_number)
		{	
			$output = $sutra_dev;
		}		
	}
	elseif (strpos($sutra_number,'-')!==false && strpos($sutra_number,'.')!==false)
	{
		$matches = array_filter($vdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]);
		$vartika_no = $int[0];
		$sutra_dev = $int[1];
		if ($vartika_no === $sutra_number)
		{	
			$output = convert($sutra_dev);
		}				
	}
	else 
	{
		$matches = array_filter($miscdata, function($var) use ($sutra_number) { return strpos($var,$sutra_number.":")!==false; });
		$matches=array_values($matches);
		$int = explode(':',$matches[0]);
		$vartika_no = $int[0];
		$sutra_dev = $int[1];
		if ($vartika_no === $sutra_number)
		{	
			$output = convert($sutra_dev);
		}				
	}
	if (isset($output) && $output!=='')
	{
		return $output."(".link_sutra($sutra_number,'..').")";
	}
	else
	{
		return "-----";
	}
}

$counter = 1;
foreach($data as $datum)
{
	$parts = explode(':',$datum);
	echo $counter." - ".convert($parts[1])." - ".convert($parts[2])."<br/>\n";
	echo "If rule <b>".sutradisplay($parts[0])." didn't exist</b>, the following rules would <b>not have applied</b>.<br/>\n";
	$barredsutras = explode(',',$parts[3]);
	$barr = array();
	foreach ($barredsutras as $bar)
	{
		$barr[] = sutradisplay($bar);
	}
	echo implode(', ',$barr)."<br/>\n";
	echo "If rule <b>".sutradisplay($parts[0])." didn't exist</b>, the following new rules <b>would have applied</b>.<br/>\n";
	$newsutras = explode(',',$parts[4]);
	$neww = array();
	foreach ($newsutras as $new)
	{
		$neww[] = sutradisplay($new);
	}
	echo implode(', ',$neww)."<br/>\n";
	echo "<hr/>\n";
	$counter++;
}
?>