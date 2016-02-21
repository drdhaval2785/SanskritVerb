<?php
include('function.php');
include('dev-slp.php');
include('slp-dev.php');
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
list($verbwithanubandha,$meaning,$verbwithoutanubandha,$verbset,$verbnumber,$verbpada,$verbiDAgama,$pureverb,$output) = splitverbdata($verbdata);
list($anukrama,$gana,$dhatuwithanubandha,$dhatuwithoutanubandha,$artha,$iT,$pada,$madhav,$kzir,$dhatupradipa,$uttara) = listdata('../Data/dhaatugana.txt');
$fin = fopen('../Data/dhaatuganascrapertrial.txt','w+');
for($i=0;$i<count($pureverb);$i++)
{
	$pureverb_removed_accent = str_replace(array("॑","॒"),array("",""),$pureverb[$i]);
	$key1 = array_keys($dhatuwithanubandha,$pureverb_removed_accent);
	foreach($key1 as $k)
	{
		$mdv[] = $madhav[$k];
		$kzr[] = $kzir[$k];
		$dp[] = $dhatupradipa[$k];
	}
	$mdv = array_diff($mdv,array("X")); $mdv = array_unique($mdv); $mdv = array_values($mdv);
	$kzr = array_diff($kzr,array("X")); $kzr = array_unique($kzr); $kzr = array_values($kzr);
	$dp = array_diff($dp,array("X")); $dp = array_unique($dp); $dp = array_values($dp);
	fputs($fin,$verbwithanubandha[$i].":".$pureverb_removed_accent.":".implode(',',$mdv).":".implode(',',$kzr).":".implode(',',$dp)."\n");
	$mdv = array(); $kzr=array(); $dp=array();
}
fclose($fin);
?>