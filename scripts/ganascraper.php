<?php
/*	Script to create the $verbdata in function.php.
	Usage - `php ganascraper.php 1 > ../Data/dhaatuganascrapertrial.txt`
*/
include('function.php');
include('dev-slp.php');
include('slp-dev.php');
// 1 for $verbdata, 2 for one entry in each line
$mode = $argv[1];

// function to split existing $verbdata in its components.
// Typical line is as shown below.
//"ahi!:BAzArTaH ca:aMh:10:0328:u:sew:अ॑हिँ॑"
function splitverbdata($verbdata)
{
	// Initialize arrays to hold values
	$output = array();
	$verbwithanubandha = array();
	$meaning = array();
	$verbwithoutanubandha = array();
	$verbset = array();
	$verbnumber = array();
	$verbpada = array();
	$verbiDAgama = array();
	$pureverb = array();
	foreach($verbdata as $datum)
	{
		// Explode on :
		$split = explode(':',$datum);
		// $output will hold the total data obtained by $split
		$output[] = $split;
		// Rest will hold individual entries
		$verbwithanubandha[] = $split[0];
		$meaning[] = $split[1];
		$verbwithoutanubandha[] = $split[2];
		$verbset[] = $split[3];
		$verbnumber[] = $split[4];
		$verbpada[] = $split[5];
		$verbiDAgama[] = $split[6];
		$pureverb[] = $split[7];
	}
	// Return an array with eight entries. Names are self explanatory.
	return array($verbwithanubandha,$meaning,$verbwithoutanubandha,$verbset,$verbnumber,$verbpada,$verbiDAgama,$pureverb,$output);
}

// Function to scrape data from ../Data/dhaatugana.txt file (Copy pasted from http://sanskrit.uohyd.ac.in/scl/dhaatupaatha/compare_with_svara.html)
// Main idea is to have links to mAdhavIyadhAtuvRtti, kzIrataraGgiNI and dhAtupradIpa from this database.
// Typical line is as below
//2	भ्वादिः	एधँ॒ ( एध् ) 	वृद्धौ 	सेट् 	आ.प 	2	2	2
// Expected outcome is as below
// list($anukrama,$gana,$dhatuwithanubandha,$dhatuwithoutanubandha,$artha,$iT,$pada,$madhav,$kzir,$dhatupradipa)
function listdata($filename)
{
	// Read data linewise.
	$data = file($filename);
	// Initialize arrays to hold values
	$anukrama = array();
	$gana = array();
	$dhatuwithanubandha = array();
	$dhatuwithoutanubandha = array();
	$artha = array();
	$iT = array();
	$pada = array();
	$madhav = array();
	$kzir = array();
	$dhatupradipa = array();
	$output = array();
	// For each line
	foreach($data as $datum)
	{
		// Explode from tab (data is tab separated)
		$split = explode("\t",$datum);
		$anukrama[] = $split[0];
		// Converted Devanagari gaNa names to numberals.
		// Also storing the data in SLP1 instead of Devanagari for other variables
		$gana[] = str_replace(array("भ्वादिः","अदादिः","जुहोत्यादिः","दिवादिः","स्वादिः","तुदादिः","रुधादिः","तनादिः","क्र्यादिः","चुरादिः"),array("01","02","03","04","05","06","07","08","09","10"),$split[1]);
		$dhatuparts = explode('(',$split[2]);
		$dhatu1 = trim($dhatuparts[0]);
		$dhatuwithanubandha[] = str_replace(array("॑","॒"),array("",""),$dhatu1);
		$dhatuwithoutanubandha[] = convert1(trim(rtrim($dhatuparts[1],' )')));
		$artha[] = convert1(trim($split[3]));
		$iT[] = str_replace(array("सेट्‌","अनिट्‌","वेट्‌"),array("sew","aniw","vew"),$split[4]);
		$pada[] = str_replace(array("उ.प","आ.प","प.प"),array("u","A","pa"),$split[5]);
		$madhav[] = $split[6];
		$kzir[] = $split[7];
		$dhatupradipa[] = trim($split[8]);
		// Whole data of line
		$uttara[] = $split;
	}
	return array($anukrama,$gana,$dhatuwithanubandha,$dhatuwithoutanubandha,$artha,$iT,$pada,$madhav,$kzir,$dhatupradipa,$uttara);
}

// Function to find link of UoHyd verb declension machine for a given verb.
// Input file is ../Data/issue789/uohyd_array, which is generated via some manipulation of ../Data/issue789/uohyd_linklist.xml (copy pasted from http://sanskrit.uohyd.ac.in/scl/ -> tiGanta section)
// Input lines are in the following format
// aka!:ak:01:ak1_akaz_BvAxiH+kutilAyAM_gawO
// Expected output is in the following format
// list($dhatuwithanubandha,$dhatuwithoutanubandha,$gana,$link)
function uohyd($uohydarrayfile)
{
	// Read data linewise.
	$data = file($uohydarrayfile);
	// Store in respective arrays.
	foreach ($data as $datum)
	{
		$split = explode(':',$datum);
		$dhatuwithanubandha[] = $split[0];
		$dhatuwithoutanubandha[] = $split[1];
		$gana[] = $split[2];
		$link[] = trim($split[3]);
	}
	return array($dhatuwithanubandha,$dhatuwithoutanubandha,$gana,$link);
}

// Function to read data from ../Data/issue789/jnu_array.txt, which in turn is derived from ../Data/issue789/jnu_linklist.xml (obtained via copy paste from http://sanskrit.jnu.ac.in/tinanta/tinanta.jsp)
// Typical input line is as below.
// अकि:01:45
// Expected output is as below.
// list($dhatu,$gana,$link)
function jnu($jnuarrayfile)
{
	// Read linewise
	$data = file($jnuarrayfile);
	// Store in respective arrays.
	foreach ($data as $datum)
	{
		$split = explode(':',$datum);
		$dhatuwithanubandha[] = $split[0];
		$gana[] = $split[1];
		$link[] = trim($split[2]);
	}
	return array($dhatuwithanubandha,$gana,$link);
}

/* Main coding part */
// Read $verbdata from function.php to get a basic list of verbs which we want to enrich with other data.
list($verbwithanubandha,$meaning,$verbwithoutanubandha,$verbset,$verbnumber,$verbpada,$verbiDAgama,$pureverb,$output) = splitverbdata($verbdata);
// Read ../Data/dhaatugana.txt to obtain mainly links to dhAtuvRttis.
list($anukrama,$gana,$dhatuwithanubandha,$dhatuwithoutanubandha,$artha,$iT,$pada,$madhav,$kzir,$dhatupradipa,$uttara) = listdata('../Data/dhaatugana.txt');
// Read ../Data/issue789/uohyd_array.txt to obtain proper link on UoHyd site for generating verb forms.
list($uohyddhatuwithanubandha,$uohyddhatuwithoutanubandha,$uohydgana,$uohydlink) = uohyd('../Data/issue789/uohyd_array.txt');
// Read ../Data/issue789/jnu_array.txt to obtain proper link on JNU site for generating verb forms.
list($jnudhatu,$jnugana,$jnulink) = jnu('../Data/issue789/jnu_array.txt');


// Open a file to store the generated data
$fin = fopen('../Data/dhaatuganascrapertrial.txt','w+');
fputs($fin,'"');
// Foreach verb in $verbdata
for($i=0;$i<count($pureverb);$i++)
{
	//echo $verbwithanubandha[$i]."\n";
	// Removed accent for uniform comparision
	$pureverb_removed_accent = str_replace(array("॑","॒"),array("",""),$pureverb[$i]);
	$jnuoutput = array(); $uohydoutput = array();
	// The keys which match
	$key1 = array_keys($dhatuwithanubandha,$pureverb_removed_accent);
	foreach($key1 as $k)
	{
		// If verb sets are equal
		if($verbset[$i]===$gana[$k])
		{
			// Return links to the dhAtuvRttis.
			$mdv[] = $madhav[$k];
			$kzr[] = $kzir[$k];
			$dp[] = $dhatupradipa[$k];
		}
	}
	if (count($mdv)===0 && count($kzr)===0 && count($dp)===0)
	{
		// The keys which match on forcing the anusvAra conversion
		// Changed fifth letters to 'n' and 'tw','dq' issue e.g. cutw instead of cuww
		$verbwithoutanubandha_anusvAra_adjusted = str_replace(array("N","Y","R","m","ww","qq","jJ"),array("n","n","n","n","tw","dq","dJ"),$verbwithoutanubandha[$i]);
		$key2 = array_keys($dhatuwithoutanubandha,$verbwithoutanubandha_anusvAra_adjusted);
		foreach($key2 as $k)
		{
			// If verb sets are equal
			if($verbset[$i]===$gana[$k])
			{
				// Return links to the dhAtuvRttis.
				$mdv[] = $madhav[$k];
				$kzr[] = $kzir[$k];
				$dp[] = $dhatupradipa[$k];
			}
		}
	}
	// Keeping only unique entries, and removing 'X' entries.
	$mdv = array_diff($mdv,array("X")); $mdv = array_unique($mdv); $mdv = array_values($mdv);
	$kzr = array_diff($kzr,array("X")); $kzr = array_unique($kzr); $kzr = array_values($kzr);
	$dp = array_diff($dp,array("X")); $dp = array_unique($dp); $dp = array_values($dp);
	
	// UoHyd generation link
	$verbtobecompared = $verbwithanubandha[$i];
	$key3 = array_keys($uohyddhatuwithanubandha,$verbtobecompared);
	foreach ($key3 as $k)
	{
		if($verbset[$i]===$uohydgana[$k])
		{
			$uohydoutput[] = $uohydlink[$k];
		}
	}
	// JNU link generation
	$verbtobecompared1 = preg_replace('/[!]$/','',$verbwithanubandha[$i]);
	$key4 = array_keys($jnudhatu,$verbtobecompared1);
	foreach ($key4 as $k)
	{
		if($verbset[$i]===$jnugana[$k])
		{
			$jnuoutput[] = $jnulink[$k];
		}
	}

	// Write in the file as shown below.
	// "BU:sattAyAm:BU:01:0001:pa:sew:भू॑:1:1:1:BU1_BU_BvAxiH+sawwAyAm:1"
	if ($mode==="1")
	{
		fputs($fin,$verbwithanubandha[$i].":".$meaning[$i].":".$verbwithoutanubandha[$i].":".$verbset[$i].":".$verbnumber[$i].":".$verbpada[$i].":".$verbiDAgama[$i].":".$pureverb[$i].":".implode(',',$mdv).":".implode(',',$kzr).":".implode(',',$dp).":".implode(',',$uohydoutput).":".implode(',',$jnuoutput).'","');
	}
	elseif ($mode==="2")
	{
		fputs($fin,$verbwithanubandha[$i].":".$meaning[$i].":".$verbwithoutanubandha[$i].":".$verbset[$i].":".$verbnumber[$i].":".$verbpada[$i].":".$verbiDAgama[$i].":".$pureverb[$i].":".implode(',',$mdv).":".implode(',',$kzr).":".implode(',',$dp).":".implode(',',$uohydoutput).":".implode(',',$jnuoutput)."\n");
	}
	// Reset the arrays.
	$mdv = array(); $kzr=array(); $dp=array();
	$jnuoutput = array(); $uohydoutput = array();
}
// Close the file.
fputs($fin,'"');
fclose($fin);
?>