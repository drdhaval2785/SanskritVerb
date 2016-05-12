<?php
include('function.php');
include('dev-slp.php');
include('slp-dev.php');
// 1 for $verbdata, 2 for one entry in each line
$mode = $argv[1];
//"ahi!:BAzArTaH ca:aMh:10:0328:u:sew:अ॑हिँ॑"
function splitverbdata($verbdata)
{
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
		$split = explode(':',$datum);
		$output[] = $split;
		$verbwithanubandha[] = $split[0];
		$meaning[] = $split[1];
		$verbwithoutanubandha[] = $split[2];
		$verbset[] = $split[3];
		$verbnumber[] = $split[4];
		$verbpada[] = $split[5];
		$verbiDAgama[] = $split[6];
		$pureverb[] = $split[7];
	}
	return array($verbwithanubandha,$meaning,$verbwithoutanubandha,$verbset,$verbnumber,$verbpada,$verbiDAgama,$pureverb,$output);
}
//2	भ्वादिः	एधँ॒ ( एध् ) 	वृद्धौ 	सेट् 	आ.प 	2	2	2
//list($anukrama,$gana,$dhatuwithanubandha,$dhatuwithoutanubandha,$artha,$iT,$pada,$madhav,$kzir,$dhatupradipa)
function listdata($filename)
{
	$data = file($filename);
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
	foreach($data as $datum)
	{
		$split = explode("\t",$datum);
		$anukrama[] = $split[0];
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
		$uttara[] = $split;
	}
	return array($anukrama,$gana,$dhatuwithanubandha,$dhatuwithoutanubandha,$artha,$iT,$pada,$madhav,$kzir,$dhatupradipa,$uttara);
}
// aka!:ak:01:ak1_akaz_BvAxiH+kutilAyAM_gawO
// list($dhatuwithanubandha,$dhatuwithoutanubandha,$gana,$link)
function uohyd($uohydarrayfile)
{
	$data = file($uohydarrayfile);
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
// अकि:01:45
// list($dhatu,$gana,$link)
function jnu($jnuarrayfile)
{
	$data = file($jnuarrayfile);
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
list($verbwithanubandha,$meaning,$verbwithoutanubandha,$verbset,$verbnumber,$verbpada,$verbiDAgama,$pureverb,$output) = splitverbdata($verbdata);
list($anukrama,$gana,$dhatuwithanubandha,$dhatuwithoutanubandha,$artha,$iT,$pada,$madhav,$kzir,$dhatupradipa,$uttara) = listdata('../Data/dhaatugana.txt');
list($uohyddhatuwithanubandha,$uohyddhatuwithoutanubandha,$uohydgana,$uohydlink) = uohyd('../Data/issue789/uohyd_array.txt');
list($jnudhatu,$jnugana,$jnulink) = jnu('../Data/issue789/jnu_array.txt');

$fin = fopen('../Data/dhaatuganascrapertrial.txt','w+');
fputs($fin,'"');
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
				$mdv[] = $madhav[$k];
				$kzr[] = $kzir[$k];
				$dp[] = $dhatupradipa[$k];
			}
		}
	}
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
			echo $verbtobecompared1."\n";
			$jnuoutput[] = $jnulink[$k];
		}
	}
	//"ahi!:BAzArTaH ca:aMh:10:0328:u:sew:अ॑हिँ॑ः1:1:1"
	if ($mode==="1")
	{
		fputs($fin,$verbwithanubandha[$i].":".$meaning[$i].":".$verbwithoutanubandha[$i].":".$verbset[$i].":".$verbnumber[$i].":".$verbpada[$i].":".$verbiDAgama[$i].":".$pureverb[$i].":".implode(',',$mdv).":".implode(',',$kzr).":".implode(',',$dp).":".implode(',',$uohydoutput).":".implode(',',$jnuoutput).'","');
	}
	elseif ($mode==="2")
	{
		fputs($fin,$verbwithanubandha[$i].":".$meaning[$i].":".$verbwithoutanubandha[$i].":".$verbset[$i].":".$verbnumber[$i].":".$verbpada[$i].":".$verbiDAgama[$i].":".$pureverb[$i].":".implode(',',$mdv).":".implode(',',$kzr).":".implode(',',$dp).":".implode(',',$uohydoutput).":".implode(',',$jnuoutput)."\n");
	}
	$mdv = array(); $kzr=array(); $dp=array();
	$jnuoutput = array(); $uohydoutput = array();
}
fputs($fin,'"');
fclose($fin);
?>