<?php
/*
	Expected job:
		Display the sUtra numbers which would have applied and sUtra numbers which would not have applied, if a given sUtra didn't exist in Paninian grammar.
		By this code, we would be able to understand the interrelations between sUtras.
		e.g. apavAda, pratiSedha, paryudAsa etc may be unearthed.
	Usage:
		CLI - `php sutrarelationdisplay.php >> ../sutrarelations/sutrarelations.html`
		Frontend - `localhost/SanskritVerb/scripts/sutrarelationdisplay.php`
	Input:
		../sutrarelations/difflog1.txt in case of commandline usage
		../sutrarelations/difflog2.txt in case of HTML frontend usage.
	Output:
		By default it echos the output, which can be stored to an HTML if needed.
		If X didn't exist, Y which applied would not have applied.
		If X didn't exist, Y which didn't apply, would have applied.
*/
include 'function.php';
include 'slp-dev.php';
// Select and read appropriate difflog file based on CLI or frontend usage.
if (isset($argv[0]))
{
	$data = file('../sutrarelations/difflog1.txt');
}
else
{
	$data = file('../sutrarelations/difflog2.txt');
}
// Trim the data
$data = array_map('trim',$data);

// function to display the output based on the ignored sUtra number.
function sutradisplay($sutra_number)
{
	// Bringing data from function.php
	global $ASdata, $vdata, $miscdata, $paribhASAdata, $otherdata; global $upasarga_joined; global $us, $outfile, $otherdata;
	// Initialized the output
	$output = '';
	$misc=0;
	// find necessary $output, based on structure of the input number e.g. sUtra, vArtika, paribhASa, miscellaneous data etc.
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
		$misc = 1;
	}
	if (isset($output) && (strpos($sutra_number,'~')!==false||$misc!==0))
	{
		return $output;
	}
	elseif (isset($output) && $output!=='')
	{
		return $output."(".link_sutra($sutra_number,'..').")";
	}
	else
	{
		return "-----";
	}
}

$counter = 1;
// For each entry in difflog file
foreach($data as $datum)
{
	// Write appropriate messages in HTML
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