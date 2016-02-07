<?php
 /* This code is developed by Dr. Dhaval Patel (drdhaval2785@gmail.com) of www.sanskritworld.in and Ms. Sivakumari Katuri.
  * Layout assistance by Mr Marcis Gasuns.
  * Available under GNU licence.
  * Version 1.4.0 date 3 January 2016
  * The latest source code is available at https://github.com/drdhaval2785/SanskritVerb .
  * Acknowledgements: The base book for coding has been Astadhyayi sahajabodha of Dr. Pushpa Dikshit, published by Pratibha Prakashan, Delhi.
  * I extend my heartfelt thanks to Ananda Loponen for the code to convert devanagari and various sanskrit transliterations. That can be accessed at http://www.ingmardeboer.nl/php/diCrunch.php?act=help.
  * I also extend my gratitude to gloomy.penguin of stackoverflow.com, who helped me create dvitva and lopa functions, without which I would be handicapped.
  * For setup, copy and paste tiGanta.php, tiGanta.html, and scripts folder to your localhost and server and run tiGanta.html.
  * tiGanta.html is the frontend for the code.
  * scripts/ajax.php and scripts/script.js are codes which asks for user feedback for particular words. 
  * scripts/function.php stores the frequently used functions in this code (The description on how to use the code is there in function.php).
  * tiGanta.php is the code which actually gives the output of the word derivation.
  * scripts/slp-dev.php is for converting SLP1 data to Devanagari. 
  * scripts/dev-slp.php is for converting Devanagari data to SLP1.
  * scripts/mystyle.css is stylesheet where you can change your preferences.
  * The code uses jquery.
  * The description part uses Howard Kyoto protocol.
  * The coding uses SLP1 transliteration.
  */
$start_time = microtime(true);

/* Including arrays and functions */
include "scripts/function.php"; // includes the file function.php which is collection of functions used in this code.
include "scripts/slp-dev.php"; // includes code for conversion from SLP to devanagari,
include "scripts/dev-slp.php"; // includes code for devanagari to SLP.

/* hides error reports. */
// If the warning is shown with line number of function.php and you are not able to trace the line which called it, turn the all error reporting on. It will help you locate the wrong entries in a reasonably narrow space, because there are so many notices around.
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(0);

/* set execution time to an hour */
ini_set('max_execution_time', 36000);
/* set memory limit to 100000 MB */
ini_set("memory_limit","100000M");

/* Defining header for all HTMLs */
$header = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<!--... Defining UTF-8 as our default character set, so that devanagari is displayed properly. -->
<meta charset="UTF-8">
<!--... Defining CSS -->
<link rel="stylesheet" type="text/css" href="scripts/mystyle.css">
<!--... including Ajax jquery. -->
</head>
<body>
';
$debug = 0; // 0 - no debugging. 1 - debugging on. It shows execution of some important time consuming scripts.

/* Reading from the HTML input. */
//$first = $_GET["first"]; // word entered by the user.
$first = toslp($_GET["first"]); // to change the word input in devanagari / IAST to slp.
$us = $_GET["upasarga"]; // upasarga. Added on 14 Dec 2014.
$tran = $_GET['tran']; // "Devanagari" - devanagari, "IAST" - IAST, "SLP1" - SLP1 transliteration.
$lakAra = $_GET['lakAra']; // There are 12 possible lakAras (mentioned in tiGanta.html)
$gender = $_GET['gender']; // "m" - male. "f" - female. "n" - neuter.
$vAcya = $_GET['vAcya']; // kartR, karma, bhAva
if (!$vAcya) { $vAcya="kartR"; } // If it is not set, consider it as kartR (because it is the most common one)
$sanAdi = $_GET['sanAdi']; // Default is ''. There are 12 sanAdi groups (mentioned in tiGanta.html)
$number = $_GET['number']; // Verb number e.g. BU sattAyAm BvAdi has 01.0001 as number. Fetched via ajax.php
$verbset = verbset_from_number($number); // bhvAdi, adAdi etc. Fetched via ajax.php
$frontend = $_GET['frontend']; // Whether to display sUtras in frontend or not. Fetched via tiGanta.html
//$frontend = '0';
$type = $_GET['type'];
$letter = $_GET['letter'];
$pr = $_GET['pratya'];
$inprat = $_GET['pratyahara'];
//$type = 'subanta';
$removed_sutras = explode(',',$_GET['removed_sutras']);
$removed_sutras = array_map('trim',$removed_sutras);
droppedsutra($removed_sutras);
global $storedata;
if (!$verbset && $type==="tiGanta") { $verbset = scrape1($number,8,9,1)[0]; } // for overcoming issue in https://github.com/drdhaval2785/SanskritVerb/issues/97
/* Now trying to make program equally compatible with commandline.
The proposed structure is php tiGanta.php verb verbset lakAra tran upasarga vAcya
defaults:
verb - no default (mandatory to feed)
verbset - 'none'
lakAra - 'law'
tran - 'SLP1'
upasarga - ''
vAcya - 'kartR'
*/
/* input from asyaprayatna.html */
if ($type==="asyaprayatna")
{
	asyaprayatna($letter);
	exit();
}
elseif ($type==="savarna")
{
	$sav = sl($letter,prat($inprat));
	echo "savarNa of '".$letter."' in pratyAhAra '".$inprat."' is: ".$sav;
	exit();
}
/* input from pratyahara.html */
elseif ($type==="pratyahara")
{
	$pratyahara = prat($pr);
	print_r($pratyahara);
	exit();
}
/* input from stri.html */
elseif ($type==="stri")
{
	$gender = "f";
	$type = "subanta";
}
// Input from commandline has to be in `php tiGanta.php 01.0001 law` format. Other details are fetched from verb number.
elseif (in_array($argv[2],array("law","liw","luw","lfw","sArvaDAtukalew","ArDaDAtukalew","low","laN","ASIrliN","viDiliN","luN","lfN")) || $test===1)
{
	$number = $argv[1];
	$first = dhatu_from_number($number);
	$verbset = verbset_from_number($number);
	$lakAra = $argv[2];
	$tran = $argv[3];
	$us = $argv[4];
	$vAcya = $argv[5];
	$sanAdi = $argv[6];
	if (!isset($argv[1])) { echo "Verb number is not entered"; exit; }
	if (!isset($argv[2])) { $lakAra = 'law'; }
	if (!isset($argv[3])) { $tran = 'SLP1'; }
	if (!isset($argv[4])) { $us = ''; }
	if (!isset($argv[5])) { $vAcya = 'kartR'; }	
	if (!isset($argv[6])) { $sanAdi = ''; }	
	$frontend="0";
	$type="tiGanta";
}
/* Creating a log */
if ($type==='tiGanta') {
	mkdir ('verboutput');
	$logfile = fopen('verboutput//log.txt','a+'); 
	fputs($logfile,date('D, d M Y H:i:s')."\n");
	fputs($logfile,"verb = $first, gaNa = $verbset, lakAra = $lakAra, transliteration = $tran, vAcya = $vAcya, upasarga = $us\n");
}
elseif ($type==='subanta') {
	mkdir ('nounoutput');
	$logfile = fopen('nounoutput//log.txt','a+'); 
	fputs($logfile,date('D, d M Y H:i:s')."\n");
	fputs($logfile,"verb = $first, transliteration = $tran\n");
	echo $header; // creating header. This will ensure that the HTML is shown with UTF-8 encoding with necessary stylesheet.
}
if ($debug===1) {dibug("100");}

if (!isset($argv[0]) and $type==='tiGanta')
{
	//$outfile = fopen("verboutput//".$first."_".$verbset."_".$lakAra.".html", "wb");
	//fputs($outfile,$header);
	echo $header; // creating header. This will ensure that the HTML is shown with UTF-8 encoding with necessary stylesheet.
}
$verbset=trim($verbset);
$fo = $first; // remembering the original prakRti. Sometimes we need to know what was the original prakRti.
/* Defining the variables used in the code and their default values .
 * If there is no change in the execution of subanta.php, the default values are operated.
 */
$pada = "pratyaya"; // "pada" - pada saJjJA. "pratyaya" - not pada.
$nadi = 0; // 0 - no nadI saJjJA. 1 - nadI saJjJA
$GI = 0; // 0 - no Gyantatva. 1 - Gyantantva.
$Ap = 0; // 0 - no Abantatva. 1 - Abantatva.
$taddhita = 0; // 0 - not taddhita. 1 - taddhita.
$dhatu = 0; // 0 - no dhAtu. 1 - dhAtu.
$eranekaca = 0; // 0 - no application of eranekAco. 1 - application of eranekAco.
$tri = "m"; // for tricaturoH striyAM tisRcatasR (7.2.99). "m" - word tri is pulliGga. "f" - word tri is strIliGga.
$nityastri = 0; // for nitya strIliGga. 0 - not nityastrIliGga. 1 - nityastrIliGga.
$ekajuttarapada = 0; // 0 - no application of ekAjuttarapade NaH. 1 - application of ekAjuttarapade NaH.
$bhashitapumska = 0; // 0 - not bhASitapuMska. 1 - bhASitapuMska.
$anvadesha = 0; // 0 - no anvAdeza. 1 - anvAdeza.
$samasa = 0; // 0 - no samAsa. 1 - samAsa
$pradhana = 0; // 0 - no pradhAnatva in samAsa. 1 - pradhAnatva in samAsa 
$Jit = 0; // 0 - no 'J' as it marker. 1 - 'J' as it marker. e.g. ho hanterJNinneSu 7.3.54
$Nit = 0; // 0 - no 'N' as it marker. 1 - 'N' as it marker.
$kvin = 0; // 0 - no kvin pratyaya. 1 - kvin pratyaya.
$kvip = 0; // 0 - no kvip pratyaya. 1 - kvip pratyaya.
$asmadpada = 2; // 0 - niSedha. 1 - nitya. 2 - vibhASA. used to decide whether the conversion of asmad / yuSmad -> me / te, nau / vAm etc will happen or not.
$bhavat = 0; // 0 - bhAterDavatu. 1 - bhU+zatR.
$abhyasta = 0; // 0 - not abhyasta. 1 - abhyasta.
$shatR = 0; // 0 - not zatR pratyaya. 1 - zatR pratyaya.
$Nyanta = 0; // 0 - not Nyanta, 1 - Nyanta.
$san = 0; // 0 - non san, 1 - san. 'san' is used to create nAmadhAtus. 
$yaG = 0; // 0 - no yaG pratyaya. 1 - yaG pratyaya has applied.
$vasu = 0; // 0 - no vasvanta, 1 - vasvanta.
$shap = 0; // 0 - no zap pratyaya. 1 - zap pratyaya.
$shyan = 0; // 0 - no zyan pratyaya. 1 - zyan pratyaya.
$tRcvat=0; // 0 - not tRjvat. 1 - tRjvat. e.g. tRjvat kroSTuH.
$nance = 0;
$aniditAm = 0;
$anobahuvrihe=0;
$manah=0;
$anapatya=0;
$sarvadhatuka=0; 
$ardhadhatuka=0;
$veda=0; // to test for Chandas forms. Turn it to 0 for laukika, 1 for Chandas.
$kGiti=0;
$atolopa=0;
$halGyAbbhyo=0;
$atmanepada=0;
$ubhayapada=0;
$parasmaipada=0;
$rudhAdibhyaH=0;
$kaspratyaya=0;
$ad=0;
$nomidelision=0;
$vras1=0;
$kit=0;
$kRt=0;
$sic=0;
$caG=0;
$vras=0;
$dvitva=0;
$id_pratyaya="sew"; // right now taking it as default. Will feed later on.
$R = array(); // creating an array where we can store whether the word has 'R' as it marker.
$num = array(); // creating an array where we can store whether the word has 'num' Agama. 
$it = array(); // Creating an array where we can store it markers.
$itprakriti = array(); // creating an array where we can store it markers of prakRti.
$itpratyaya = array(); // creating an array where we can store it markers of pratyayas.
$samp = array(); // creating an array where we can store whethere samprasAraNa has happened or not.
$Agama = array(); // storing Agamas.

// rest of the variables will be defined at their particular occurence in the code.
/* Displaying information about the verb to the user */
if ($type==='tiGanta')
{
	if ($number!=="")
	{
		verb_meaning_gana_number4($number); // See function.php for details of function.
	}
	elseif ($verbset!=="none")
	{
		verb_meaning_gana_number2($first); // See function.php for details of function.
	}
	elseif (in_array($first,$allverbs))
	{
		verb_meaning_gana_number1($first); // See function.php for details of function.
	}
	else
	{
		verb_meaning_gana_number3($first); // See function.php for details of function.
	}
}
if ($type==='tiGanta') 
{
	/* upasarga display */
	if ($type==="tiGanta" && $us!=="")
	{
		upasarga_display($us); // See function.php for details of function.
	}
	if ($debug===1) {dibug("200");}

	/* Deciding the pratyaya by doing padanirdhARaNa of parasmai, Atmane, ubhaya */ 
	/* bhAvakarmaNoH (1.3.13) */
	if ( in_array($vAcya,array("karma","bhAva")) && $pada==="pratyaya" && $lakAra!=="")
	{
		$verbpada=verb_pada('1.3.13'); // See function.php for details of function.
	}
	/* Special patch for paNa dhAtu (see kAzikA on 3.1.28) */
	elseif ( $_GET['cond49']==="1")
	{
		$verbpada="p";
	}
	/* luTi ca klRpaH (1.3.93) */
	elseif ( $fo==="kfpU!" && ($san===1 || in_array($lakAra,array("lfN","lfw","luw"))))
	{
		$verbpada=verb_pada('1.3.93');
	}
	/* na gatihiMsArthebhyH (1.3.15) */
	elseif ( $_GET['cond11_1']==='1') // cond stands for condition. They are taken from user input. For all variables having cond as prefix, details can be seen at ajax requirement.docx.
	{
		$verbpada=verb_pada('1.3.15');
	}
	/* itaretarAnyo'nyopapadAcca (1.3.16) */
	// parasparopapadAcceti vaktavyam is implicitly included in it. If need be, a user feedback has to be increased.
	elseif ($_GET['cond11_1']==='2')
	{
		$verbpada=verb_pada('1.3.16');
	}
	/* kartari karmavyatihAre (1.3.14) */
	elseif ( $_GET['cond11_1']==='3')
	{
		$verbpada=verb_pada('1.3.14');
	}
	/* AGo do'nAsyaviharaNe (1.3.20) */
	elseif ( $_GET['cond14']==="2" )
	{
		$verbpada=verb_pada('1.3.20');
	}
	/* parAGgakarmakAnna niSedhaH (vA 903) */
	// Pending to refactor because I am not able to locate vArtika number in MB.
	elseif ( $_GET['cond14_1']==="2" )
	{
		$verbpada=verb_pada('vA 903'); // Not able to locate the vArtika. So added it in the $verb_sutra_pada array.
	}
	/* prakAzanastheyAkhyayozca (1.3.23) */
	elseif ( $_GET['cond15']==="1" )
	{
		$verbpada=verb_pada('1.3.23');
	}
	/* udo'nUrdhvakarmaNi (1.3.24) */
	elseif ( $_GET['cond16']==="2" )
	{
		$verbpada=verb_pada('1.3.24');
	}
	/* upAnmantrakaraNe (1.3.25) */
	elseif ( $_GET['cond17']==="1" )
	{
		$verbpada=verb_pada('1.3.25');
	}
	/* akarmakAcca (1.3.26) */
	elseif ( $_GET['cond17']==="2" )
	{
		$verbpada=verb_pada('1.3.26');
	}
	/* spardhAyAmAGaH (1.3.31) */
	elseif ( $_GET['cond18']==="1" )
	{
		$verbpada=verb_pada('1.3.31');
	}
	/* anuparAbhyAM kruJaH (1.3.79) */
	elseif ( ends(array($first),array("qukfY"),2) && in_array($us,array("anu","parA")) )
	{
		$verbpada=verb_pada('1.3.79');
	}
	/* gandhanAvakSepaNasevanasAhasikyapratiyatnaprakathanopayogeSu kRJaH (1.3.32) */
	elseif ( $_GET['cond19']==="1" )
	{
		$verbpada=verb_pada('1.3.32');
	}
	/* adheH prahasane (1.3.33) */
	elseif ( $_GET['cond20']==="1" )
	{
		$verbpada=verb_pada('1.3.33');
	}
	/* veH zabdakarmaNaH (1.3.34) */
	elseif ( $_GET['cond21']==="1" )
	{
		$verbpada=verb_pada('1.3.34');
	}
	/* akarmakAcca (1.3.35) */
	elseif ( $_GET['cond21']==="2" )
	{
		$verbpada=verb_pada('1.3.35');
	}
	/* kartRsthe cAzarIre karmaNi (1.3.37) */
	elseif ( $_GET['cond23']==="1" )
	{
		$verbpada=verb_pada('1.3.37');
	}
	/* sammAnanotsaJjanAcAryakaraNajJAnabhRtivigaNanavyayeSu niyaH (1.3.36) */
	elseif ( $_GET['cond22']==="1" )
	{
		$verbpada=verb_pada('1.3.36');
	}
	/* vRttisargatAyaneSu kramaH (1.3.38) and anupasargAdvA (1.3.43) */
	elseif ( $_GET['cond24']==="1" && $first==="kramu!")
	{
		$verbpada=verb_pada('1.3.38');
		$verbpada=verb_pada('1.3.43');
	}
	/* upaparAbhyAm (1.3.39) */
	elseif ( $_GET['cond24']==="1" )
	{
		$verbpada=verb_pada('1.3.39');
	}
	/* AGa udgamane (1.3.40) */
	elseif ( $_GET['cond25']==="1")
	{
		$verbpada=verb_pada('1.3.40');
	}
	/* veH pAdaviharaNe (1.3.41) */
	elseif ( $_GET['cond26']==="1")
	{
		$verbpada=verb_pada('1.3.41');
	}
	/* propAbhyAM samarthAbhyAm (1.3.42) */
	elseif ( $_GET['cond31']==="1")
	{
		$verbpada=verb_pada('1.3.42');
	}
	/* apahnave jJaH (1.3.44) */
	elseif ( $_GET['cond27']==="1")
	{
		$verbpada=verb_pada('1.3.44');
	}
	/* akarmakAcca (1.3.45) */
	elseif ( $_GET['cond27']==="2")
	{
		$verbpada=verb_pada('1.3.45');
	}
	/* sampratibhyAmanAdhyAne (1.3.46) */
	elseif ( $_GET['cond28']==="1")
	{
		$verbpada=verb_pada('1.3.46');
	}
	/* bhAsanopasaMbhASAjJAnayatnavimatyupanimantraNeSu vadaH (1.3.47) */
	elseif ( $_GET['cond29']==="1")
	{
		$verbpada=verb_pada('1.3.47');
	}
	/* vyaktavAcAM samuccAraNe (1.3.48) */
	elseif ( $_GET['cond29']==="2")
	{
		$verbpada=verb_pada('1.3.48');
	}
	/* vibhASA vipralApe (1.3.50) */
	elseif ( $_GET['cond29']==="3" )
	{
		$verbpada=verb_pada('1.3.50');
	}
	/* anorakarmakAt (1.3.49) */
	elseif ( $_GET['cond30']==="1")
	{
		$verbpada=verb_pada('1.3.49');
	}
	/* samaH pratijJAne (1.3.52) */
	elseif ( $_GET['cond32']==="1")
	{
		$verbpada=verb_pada('1.3.52');
	}
	/* udazcaraH sakarmakAt (1.3.53) */
	elseif ( $_GET['cond33']==="1")
	{
		$verbpada=verb_pada('1.3.53');
	}
	/* samastRtIyAyuktAt (1.3.54) */
	elseif ( $_GET['cond34']==="1")
	{
		$verbpada=verb_pada('1.3.54');
	}
	/* dANazca sA ceccaturthyarthe (1.3.55) */
	elseif ( $_GET['cond35']==="1")
	{
		$verbpada=verb_pada('1.3.55');
	}
	/* upAdyamaH svakaraNe (1.3.56) */
	elseif ( $_GET['cond36']==="1")
	{
		$verbpada=verb_pada('1.3.56');
	}
	/* nAnorjJaH (1.3.58) */
	elseif ( $first==="jYA" && $us==="anu" && $sanAdi==="san")
	{
		$verbpada=verb_pada('1.3.58');
	}
	/* pratyAGbhyAM zruvaH (1.3.59) */
	elseif ( in_array($us,array("prati","A")) && $first==="Sru" && $sanAdi==="san")
	{
		$verbpada=verb_pada('1.3.59');
	}
	/* jJAzrusmRdRzAM sanaH (1.3.57) */
	elseif ( $_GET['cond37']==="1")
	{
		$verbpada=verb_pada('1.3.57');
	}
	/* zadeH zitaH (1.3.60) */
	// I have taken these five lakAras because they have vikaraNa pratyaya 'zap' which qualifies for this sUtra.
	elseif ( in_array($first,array("Sadx!")) && in_array($lakAra,array("law","low","laN","viDiliN","sArvaDAtukalew")))
	{
		$verbpada=verb_pada('1.3.60');
	}
	/* mriyaterluGliGozca (1.3.61) */
	elseif ( in_array($first,array("mfN")) && in_array($lakAra,array("law","low","laN","viDiliN","sArvaDAtukalew","ASIrliN","luN")))
	{
		$verbpada=verb_pada('1.3.61');
	}
	/* pUrvavatsanaH (1.3.62) */
	// Pending. san is not taught yet. So difficult to code right now. san will be treated later on.
	/* Ampratyayavat kRJo'nuprayogasya (1.3.63) */
	// Pending. Right now focus is on bare verbs. Am etc will be dealt with later.
	/* NeraNau yatkarma Nau cetsa kartA'nAdhyAne (1.3.67) */
	// This will need not less than a PhD. Nagesha bhatta seems to have written a book on this subject (NeraNivAdArthaH). So leaving it right now.
	/* samaH kSNuvaH (1.3.65) */
	elseif ( in_array($first,array("kzRu")) && $us==="sam")
	{
		$verbpada=verb_pada('1.3.65');
	}
	/* bhujo'navane (1.3.66) */
	elseif ( $_GET['cond38']==="1")
	{
		$verbpada=verb_pada('1.3.66');
	}
	/* bhIsmyorhetubhaye (1.3.68) */
	elseif ( $_GET['cond39']==="1")
	{
		$verbpada=verb_pada('1.3.68');
	}
	/* gRdhivaJcyoH pralambhane (1.3.69) */
	elseif ( $_GET['cond40']==="1")
	{
		$verbpada=verb_pada('1.3.69');
	}
	/* liyaH sammAnanazAlInIkaraNayozca (1.3.70) */
	elseif ( $_GET['cond41']==="1")
	{
		$verbpada=verb_pada('1.3.70');
	}
	/* mithyopapadAt kRJo'bhyAse (1.3.71) */
	elseif ( $_GET['cond42']==="1")
	{
		$verbpada=verb_pada('1.3.71');
	}
	/* artiSrudfSiByaH ca (vA 1.3.29-2) */
	elseif ( in_array($first,array("Sru","dfSi!r","f")) && $us==="sam")
	{
		$verbpada=verb_pada('1.3.29-2');
	}
	/* samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29) patch for vida! because there are more than one gaNas. */
	elseif ( in_array($first,array("vida!")) && $us==="sam" && $verbset==="adAdi") 
	{
		$verbpada=verb_pada('1.3.29');
	}
	/* nervizaH (1.3.47), parivyavebhyaH kriyaH (1.3.18), viparAbhyAM jeH (1.3.19), krIDo'nusaMparibhyazca (1.3.21), samavaparivibhyaH sthaH (1.3.22), udvibhyAM tapaH (1.3.27), AGo yamahanaH (1.3.28), samo gamyRcCipracCisvarAyartishruvidibhyaH (1.3.29), nisamupavibhyo hvaH (1.3.30), avAdgraH (1.3.51), jJAzRsmRdRzAM sanaH (1.3.57) */
	elseif ( in_array($us.$first,$toatmane) )
	{
		verb_pada1(); // Displaying the sUtra applicable.
		$verbpada="A";
	}
	/* vyAGparibhyo ramaH (1.3.83) */
	elseif ( ends(array($first),array("ramu!"),2) && in_array($us,array("vi","A","pari",)) && $vAcya==="kartR")
	{
		$verbpada=verb_pada('1.3.83');
	}
	/* upAcca (1.3.84) */
	elseif ( $_GET['cond44']==="2")
	{
		$verbpada=verb_pada('1.3.84');
	}
	/* vibhASA'karmakAt (1.3.74) */
	elseif ( $_GET['cond44']==='1')
	{
		$verbpada=verb_pada('1.3.74');
	}
	/* Nicazca (1.3.74) */
	elseif ( $sanAdi==="Ric")
	{
		$verbpada=verb_pada('1.3.74');
	}
	/* AkusmAdAtmanepadinaH (dhAtupATha) */
	elseif ( $verbset==='curAdi' && in_array($first,$AkusmIya) )
	{
		$verbpada=verb_pada('AkusmAd');
	}
	/* AkusmAdAtmanepadinaH (dhAtupATha) */
	elseif ( $verbset==="none"  && in_array($first,$AkusmIya))
	{
		$verbpada=verb_pada('AkusmAd');
	}
	/* AgarvAdAtmanepadinaH (dhAtupATha) */
	elseif ( $verbset==='curAdi' && in_array($first,$AgarvIya) )
	{
		$verbpada=verb_pada('AgarvAd');
	}
	/* AgarvAdAtmanepadinaH (dhAtupATha) */
	elseif ( $verbset==="none"  && in_array($first,$AgarvIya))
	{
		$verbpada=verb_pada('AgarvAd');
	}
	/* Nicazca (1.3.74) */
	elseif ( $verbset==='curAdi' )
	{
		$verbpada=verb_pada('1.3.74');
	}
	/* Nicazca (1.3.74) */
	elseif ($verbset==="none" &&  in_array($first,$curAdi)  )
	{
		$verbpada=verb_pada('1.3.74');
	}
	/* dyudbhyo luGi (1.3.91) */
	elseif ( $vAcya==="kartR" && $lakAra==="luN" && in_array($first,array("dyuta!","SvitA!","YimidA!","midA!","YizvidA!","zvidA!","svidA!","YikzvidA!","kzvidA!","ruca!","Guwa!","ruwa!","luwa!","luWa!","SuBa!","kzuBa!","RaBa!","naBa!","tuBa!","sransu!","sraMsu!","Dvansu!","DvaMsu!","Bransu!","BraMsu!","BranSu!","BraMSu!","sranBu!","sraMBu!","sramBu!","vftu!","vrDu!","SfDu!","syandU!","kfpU!","kxpU!")) )
	{
		$verbpada=verb_pada('1.3.91');
	}
	/* vRdbhyaH syasanoH (1.3.92) */
	// san is pending. lRluToH syAtAsI - got the lakAras from here.
	elseif ( in_array($first,array("vftu!","vrDu!","SfDu!","syandU!","kfpU!","kxpU!")) && $vAcya==="kartR" && in_array($lakAra,array("lfN","lfw")))
	{
		$verbpada=verb_pada('1.3.92');
	}
	/* luTi ca klRpaH (1.3.93) */
	elseif ( in_array($first,array("kxpU!")) && $vAcya==="kartR" && in_array($lakAra,array("luw")))
	{
		$verbpada=verb_pada('1.3.93');
	}
	/* AziSi nAtha iti vAcyam (vA) */
	elseif ( in_array($first,array("nATf!")) )
	{
		$verbpada=verb_pada('1.3.21-7');
	}
	/* anudAttaGita Atmanepadam (1.3.12) */
	elseif ( (in_array($first,$anudAttetverbs) || in_array($first,$Gitverbs) || in_array($first,array("fta!")) ) && $pada==="pratyaya" && $lakAra!=="" && $_GET['cond49']!=="1" && scrape1($number,8,5,1)===array("A")) // the exclusion is useful for the sanAdi pratyayas e.g. paRAya has parasmai, paRa! has Atmanepadatva. See http://sanskritdocuments.org/learning_tools/ashtadhyayi/vyakhya/3/3.1.28.htm for clarification. Second addition is for RterIyaG, Atmanepada because of IyaG pratyaya.
	{
		$verbpada=verb_pada('1.3.12');
	}
	/* vibhASopapadena pratIyamAne (1.3.77) */
	// This sUtra is intervowen in 1.3.72 to 1.3.76 as optional form.
	/* apAdvadaH (1.3.73) */
	elseif ( $first==="vada!" && $us==="apa" && $pada==="pratyaya" && $lakAra!=="")
	{
		$verbpada=verb_pada('1.3.73');
	}
	/* samudAGbhyo yamo'granthe (1.3.75) */
	elseif ( $_GET['cond43']==="2" && $pada==="pratyaya" && $lakAra!=="")
	{
		$verbpada=verb_pada('1.3.75');
	}
	/* anupasargAjjJaH (1.3.76) */
	elseif ( ends(array($first),array("jYA"),2) && $pada==="pratyaya" && $lakAra!=="")
	{
		$verbpada=verb_pada('1.3.76');
	}
	/* abhipratyatibhyaH kSipaH (1.3.80) */
	elseif ( ends(array($first),array("kzipa!"),2) && in_array($us,array("aBi","prati","ati")) && $vAcya==="kartR")
	{
		$verbpada=verb_pada('1.3.80');
	}
	/* prAdvahaH (1.3.81) */
	elseif ( ends(array($first),array("vaha!"),2) && $us==="pra" && $vAcya==="kartR")
	{
		$verbpada=verb_pada('1.3.81');
	}
	/* parermRSaH (1.3.82) */
	elseif ( ends(array($first),array("mfza!"),2) && $us==="pari" && $vAcya==="kartR")
	{
		$verbpada=verb_pada('1.3.82');
	}
	/* budhayudhanazajaneGprudrusrubhyo NeH (1.3.86) */
	// NeH coding pending.
	elseif ( in_array($first,array("buDa!","yuDa!","naSa!","iN","pru","dru","sru")) && $vAcya==="kartR" && ($verbset==="curAdi"||$sanAdi==="Ric"))
	{
		$verbpada=verb_pada('1.3.86');
	}
	/* na pAdamyAGyamAGyasaparimuharucinRtivadavasaH (1.3.89) */
	elseif ( in_array($us.$first,array("pA","Ayama!","damu!","Ayasu!","parimuha!","ruca!","nftI!","vada!","vasa!")) && $vAcya==="kartR" && in_array($sanAdi,array("Ric","RiN")))
	{
		$verbpada=verb_pada('1.3.89');
	}
	/* vA kyaSaH (1.3.90) */
	// right now very coarse way of finding out kyaS. Will have to revisit.
	elseif (ends(array($first),array("Aya"),1) && $pada==="pratyaya" && $lakAra!=="")
	{
		$verbpada=verb_pada('1.3.90');
	}
	/* nigaraNacalanArthebhyazca (1.3.87) */
	// NeH coding pending.
	elseif ( in_array($first,array("nigF","aSa!","Buja!","cala!","cupa!","kapi!",)) && $vAcya==="kartR")
	{
		$verbpada=verb_pada('1.3.87');
	}
	/* aNAvakarmakAccittavatkartRkAt (1.3.88) */
	// Pending. Ni etc are very confusing at this stage. Will think later.
	// budha... is an exception to cittavat part (kAzikA)
	/* In case the user has selected some gaNa, the pada has to correspond to that gaNa */
	elseif($verbset!=="none")
	{
		$temppada = verb_padafinder($first);
		if ($temppada===array("u"))
		{
			$verbpada=verb_pada('1.3.72');
		}
		elseif ($temppada===array("A"))
		{
			$verbpada=verb_pada('AtmanepadI');
		}
		elseif ($temppada===array("pa"))
		{
			$verbpada=verb_pada('parasmEpadI');
		}
	}
	/* zeSAt kartari parasmaipadam (1.3.79) */
	elseif ( $pada==="pratyaya" && $lakAra!=="")
	{
		$verbpada=verb_pada('1.3.71');
	}
}
if ($debug===1) {dibug("600");}

if ($type==='subanta') { $suffix = $sup1; }
elseif ($type==='stri') { $suffix = array("su!"); }
elseif ($type==="sandhi")
{
	$suffix = array($_GET['sec']);
	$pada = $_GET['pada'];
}
/* Deciding suffixes based on parasmai, Atmane or ubhayapada of verbs. */
elseif ($type==='tiGanta') 
{
	$suffix=verb_suffixes($verbpada);
	/* idAgama decision */
	$temp = scrape1($first,0,2,1); 
	$verb_without_anubandha=$temp[0];

	if (in_array($lakAra,array("lfw","lfN","luw","ASIrliN","luN","liw","ArDaDAtukalew"))) // checking whether ArdhadhAtuka lakAra or not.
	{
		if (anekAca($verb_without_anubandha) || $san===1 || $yaG===1 || $sanAdi==="Ric" )
		{
			$id_dhAtu="sew";
			gui2('seTverb');
	   }
		 /* svaratisUtisUyatidhUJUdito vA (7.2.44) */
		elseif (in_array($fo,array("svf","zUN","DUY")) || in_array($fo,$Uditverbs))
		{
			$id_dhAtu="vew";
			gui2('7.2.44');
	   }
	   /* RddhanoH sye (7.2.70) */
		elseif ( (ends(array($verb_without_anubandha),array("f",),1) || $fo==="hana!") && in_array($lakAra,array("lfw","lfN")) )
		{
			$id_dhAtu="sew";
			gui2('7.2.70');
		}
		/* se'sici kRtacRtacCRdatRdanRtaH (7.2.57) */
		elseif (in_array($fo,array("kftI!","cfta!","Cfda!","tfda!","nfta!",)) && in_array($lakAra,array("lfw","lfN")))
		{
			$id_dhAtu="vew";
			gui2('7.2.57');
		}
		/* gameriT parasmaipadeSu (7.2.58) */
		elseif ( in_array($fo,array("gamx!",)) && in_array($lakAra,array("lfw","lfN")) && $verbpada==="p")
		{
			$id_dhAtu="sew";
			gui2('7.2.58');
		}
		/* na vRdbhyazcaturbhyaH (7.2.59) */
		elseif ( in_array($fo,array("vftu!","vfDu!","SfDu!","syandU!",)) && in_array($lakAra,array("lfw","lfN")) )
		{
			$verbpada="u";
			$id_dhAtu="aniw";
			$suffix = $tiG;
			gui2('7.2.59');
		}
		/* tAsi ca klRpaH (7.2.60) */
		// sakArAdi. tAsi done elsewhere.
		elseif ( in_array($fo,array("kxpa!",)) && in_array($lakAra,array("lfw","lfN")) && $verbpada==="p")
		{
			$id_dhAtu="aniw";
			gui2('7.2.60');
		}
		/* radhAdibhyazca (7.2.45) */
		elseif (in_array($fo,array("raDa!","RaSa!","tfpa!","dfpa!","druha!","muha!","zRuha!","zRiha!")) )
		{
			$id_dhAtu="vew";
			gui2('7.2.45');
		}
		/* niraH kuSaH (7.2.46) */
		elseif (in_array($fo,array("kuza!")) && $us==="nis" )
		{
			$id_dhAtu="vew";
			gui2('7.2.46');
		}
		elseif (verb_itfinder($first)===array("sew"))
		{
			$id_dhAtu="sew";
			gui2('seTverb');
		}
		elseif (verb_itfinder($first)===array("aniw"))
		{
			$id_dhAtu="aniw";
			gui2('7.2.10');
		}
	}
	else
	{
		$id_dhAtu="";
	}
}
if ($debug===1) {dibug("700");}
/* a for loop for entering all sup pratyayas one by one. Sambuddhi is at the last after sup. */
for ($w=0;$w<count($suffix);$w++) // running the loop till $sup1 is exhausted.
{
$second=$suffix[$w];    // defining the second word as su!, O, jas etc.
$id_original=$id_dhAtu;
$id_original_pratyaya=$id_pratyaya;
if(in_array($second,$tiG)||in_array($second,$sup))
{
$vibhakti=1;    
$upasarga_joined=0;
}

/* Remembering the SLP1 input words and pratyaya. */
$fo = $first; // remembering the original prakRti. Sometimes we need to know what was the original prakRti.
$so = $second; ; // remembering the original pratyayas. Sometimes we need to know what was the original pratyaya.
/* displaying the data back to the user */
suffix_display();	

/* for sambodhana, sambuddhi decision */
if ($w>20)
{
    if ($w===21)
    {
    $sambuddhi=1;        // 0 - no sambuddhi. 1 - sambuddhi.
    }
    else 
    {
        $sambuddhi=0;
    }
} 
else 
{
    $sambuddhi=0;
}
/* for sambodhana, sambuddhi display */
if ($sambuddhi===1)
{
	gui($text,'sambuddhi','red',0);
}

/* preprocessing for the sup pratyayas. */
// Joining the two input words 
if ($second === "") // if there is no pratyaya. This doesn't happen in subanta / tiGanta generation. But kept it for other uses.
{
    $input = ltrim(chop($first));
}
elseif ($first === "") // if there is no prakRti. This doesn't happen in subanta / tiGanta generation. But kept it for other uses, like sandhi etc.
{
    $input = ltrim(chop($second));
}
elseif ($type==="tiGanta") // this option is used for subanta / tiGanta generation. $input is 'prakRti'+'pratyaya'.
{
	$nonpurelakara = str_replace(array("viDiliN","ASIrliN","sArvaDAtukalew","ArDaDAtukalew"),array("liN","liN","lew","lew"),$lakAra);
	$input = ltrim(chop($first."+".$sanAdi."+".$nonpurelakara));
	$input = str_replace("++","+",$input); // If $sanAdi is "", there would be two +s consecutively. To overcome this hurdle, this patch is created.
}
else 
{
	$input = ltrim(chop($first."+".$second));
	$input = str_replace("++","+",$input);
}

/* main coding part starts from here. Based on Siddhantakaumudi text. */
/* Defining an array $text. */
//Here we will store the output after the process of sUtras. The first member is $input. 
// The reason behind creating an array and not keeping it a string is - sometimes the sUtras give 2 / more optional outputs. In that case, it is impossible to manage the string. 
// Right now what will happen is that 1 member -> 2 members by some sUtra. For next sUtra, we will take these two members one by one and store their results in $text itself.
$text = array();
$text[] = $input; // Defining first member of the array as $input (combined words first and second)

/* bhUvAdayo dhAtavaH (1.3.1) */
if (in_array($so,$tiG) && $pada==="pratyaya" && $lakAra!=="" && $sanAdi==="")
{
	storedata('1.3.1','pa',0);
}
/* sanAdyantA dhAtavaH (3.1.32) */
elseif (in_array($so,$tiG) && $pada==="pratyaya" && $lakAra!=="" && $sanAdi!=="")
{
	storedata('3.1.32','pa',0);
}
/* special error message for vaca! dhAtu pra.pu.ba.va. */
if ($so==="Ji" && $verbset==="adAdi" && in_array($fo,array("vaca!"))  )
{
storedata('~1','red',0);
}
/* laH karmaNi ca bhAve cAkarmakebhyaH (3.4.69) */
if (in_array($so,$tiG) && $pada==="pratyaya" && $lakAra!=="")
{
	storedata('3.4.69','pa',0);
}
/* na vRdbhyazcaturbhyaH (7.2.59) */
if ( in_array($fo,array("vftu!","vfDu!","SfDu!","syandU!",)) && in_array($lakAra,array("lfw","lfN")) && in_array($so,$taG))
{
	$verbpada="A";
	$id_dhAtu="sew";
	storedata('7.2.59','sa',0);
}
if ($debug===1) {dibug("800");}
/* dhAtvAdeza before ArdhadhAtuka pratyayas as per sahajabodha 2 p. 62 */
if (in_array($lakAra,$ArdhadhAtuka_lakAra))
{
    /* asterbhUH (2.4.52) */ 
    if (in_array($fo,array("asa!")) && $verbset==="adAdi" )
    {
        $text=pr2(array("asa!"),array("+"),$lakAralist,array("BU"),array("+"),$lakAralist,$text);
		storedata('2.4.52','sa',0);
    }
    /* bruvo vaciH (2.4.53) */ 
    if (in_array($fo,array("brUY")))
    {
        $text=pr2(array("brUY"),array("+"),$lakAralist,array("vaca!"),array("+"),$lakAralist,$text);
		storedata('2.4.53','sa',0);
    }
    /* gAG liTi (2.4.49) */ 
    if (in_array($fo,array("iN")) && $lakAra==="liw")
    {
        $text=three(array("iN"),array("+"),$lakAralist,array("gAN"),array("+"),$lakAralist,0);
		storedata('2.4.49','sa',0);
    }
    /* liDyaGozca (6.1.29) */ 
    if (in_array($fo,array("o!pyAyI!")) && ($lakAra==="liw"||$sanAdi==="yaG"))
    {
        $text=three(array("o!pyAyI!"),array("+"),$lakAralist,array("pI"),array("+"),$lakAralist,0);
		storedata('6.1.29','sa',0);
    }
    /* cAyaH kI (6.1.35) */ 
    if (in_array($fo,array("cAyf!")) && ($lakAra==="liw"||$sanAdi==="yaG") && $veda===1)
    {
        $text=three(array("cAyf!"),array("+"),$lakAralist,array("kI"),array("+"),$lakAralist,0);
		storedata('6.1.35','sa',0);
    }
    /* vibhASA zveH (6.1.30) */ 
    if (in_array($fo,array("wuo!Svi")) && ($lakAra==="liw"||$sanAdi==="yaG"))
    {
        $text=three(array("wuo!Svi"),array("+"),$lakAralist,array("Su"),array("+"),$lakAralist,1);
		storedata('6.1.30','sa',0);
    }
    /* abhyastasya ca (6.1.33) */ 
	// Coded only for liT. Other cases if possible are pending.
    if (in_array($fo,array("hveY")) && $lakAra==="liw")
    {
        $text=three(array("hveY"),array("+"),$lakAralist,array("hu"),array("+"),$lakAralist,0);
		storedata('6.1.33','sa',0);
    }
    /* liTyanyatarasyAm (2.4.40) */ 
	// Pending to make it optional. liT function for ajAdi and halAdi are separate. Handling them simultaneously is not possible right now.
    if (in_array($fo,array("ada!")) && $lakAra==="liw")
    {
        $text=three(array("ada!"),array("+"),$lakAralist,array("Gasx!"),array("+"),$lakAralist,0);
		storedata('2.4.40','sa',0);
    }
    /* luGsanorghaslR (2.4.37) */ 
    if (in_array($fo,array("ada!")) && ($lakAra==="luN"||$san===1) )
    {
        $text=pr2(array("ada!"),array("+"),$lakAralist,array("Gasx!"),array("+"),$lakAralist,$text);
		storedata('2.4.37','sa',0);
		$fo = "Gasx!";
		$it = array_merge($it,array("x"));
    }
    /* vA liTi (2.4.55) */ 
    if (in_array($fo,array("cakzi!N")) && $lakAra==="liw")
    {
        $text=three(array("cakzi!N"),array("+"),$lakAralist,array("KyA"),array("+"),$lakAralist,1);
		storedata('2.4.55','sa',0);
    }
    /* cakSiGaH khyAG (2.4.54) */ 
    elseif (in_array($fo,array("cakzi!N")))
    {
        $text=pr2(array("cakzi!N"),array("+"),$lakAralist,array("KyA"),array("+"),$lakAralist,$text);
		storedata('2.4.54','sa',0);
    }
	/* valAdAvArdhadhAtuke vikalpa iSyate (vA) */
	// See page 83 of SK part 2
	if ($fo==="aja!" && $ardhadhatuka===1 && sub(array("vi+vI","vI"),array("+"),prat('vl'),0))
	{
		$text = three(array("vi+vI","vI"),array("+"),prat('vl'),array("aj","aj"),array("+"),prat('vl'),1);
		// pending to refactor.
		storedata('7.2.35-1','sa',0);
	}
    /* ajervyaghaJapoH (2.4.56) */ 
    if (in_array($fo,array("aja!")) && !sub(array("aja!"),array("+"),array("GaY","ap"),0))
    {
        $text=pr2(array("aja!"),array("+"),$lakAralist,array("vI"),array("+"),$lakAralist,$text);
		storedata('2.4.56','sa',0);
		$id_dhAtu="aniw";
    }
	/* iNo gA luGi (2.4.45) */ 
	if ( in_array($fo,array("iR")) && in_array($lakAra,array("luN")) && !in_array($sanAdi,array("Ric","RiN")))
	{
		$text = two(array("iR"),array("+"),array("gA"),array("+"),0);
		storedata('2.4.45','sa',0);
	}
	/* luGi ca (2.4.43) */ 
	if ( in_array($fo,array("hana!")) && in_array($lakAra,array("luN")) && in_array($so,$tis) && !in_array($sanAdi,array("Ric","RiN")) )
	{
		$text = two(array("hana!"),array("+"),array("vaDa"),array("+"),0);
		storedata('2.4.43','sa',0);
		$id_dhAtu='sew'; // because vaDa is anekAc.
	}
	/* AtmanepadeSvanyatarasyAm (2.4.44) */ 
	if ( in_array($fo,array("hana!")) && in_array($lakAra,array("luN")) && in_array($so,$taG) )
	{
		$text = two(array("hana!"),array("+"),array("vaDa!"),array("+"),1);
		storedata('2.4.44','sa',0);
	}
	/* vibhASA luGlRGoH (2.4.50) */ 
	if ( in_array($fo,array("iN")) && in_array($lakAra,array("luN","lfN")) && $Nit===0 && $Jit===0 && !in_array($sanAdi,array("Ric","RiN")))
	{
		$text = two(array("iN"),array("+"),array("gAN"),array("+"),1);
		storedata('2.4.50','sa',0);
	}
}
if ($debug===1) {dibug("900");}
/* atideza sUtras for GidvadbhAva before ArdhadhAtuka. sahajabodha 2 p. 40 */
if (in_array($lakAra,$ArdhadhAtuka_lakAra))
{
    /* vija iT (1.2.2) */ 
    if ( in_array($fo,array("o!vijI!")) && $ardhadhatuka===1 && in_array($lakAra,$ArdhadhAtuka_lakAra) && $id_dhAtu==="sew" && $id_pratyaya==="sew" && $verbset==="tudAdi")
    {
        $itpratyaya=array_merge($itpratyaya,array("N"));
        $it=array_merge($it,array("N"));
		storedata('1.2.2','pa',0);
		$vijait=1;
    } else {$vijait=0; }
}
/* defining the sUtras mandating sanAdis */
/* guptijkidbhyaH san (3.1.5) */
if ( $_GET['cond47']==="1" )
{
    $text=three(array("gupa!","tija!","kita!"),array("+"),$lakAra,array("gupa!","tija!","kita!"),array("+san+"),$lakAra,0);
	storedata('3.1.5','sa',0);
    $sanAdi="san";
}
/* mAnbadhadAnzAnbhyo dIrghazcAbhyAsasya (3.1.6) */
// right now only coded for san pratyaya and not for dIrghatva of abhyAsa, because abhyAsa is not taught yet.
if ( $_GET['cond48']==="1" )
{
    $text=three(array("mAna!","baDa!","dAna!","SAna!"),array("+"),$lakAra,array("mAna!","baDa!","dAna!","SAna!"),array("+san+"),$lakAra,0);
	storedata('3.1.6','sa',0);
    $sanAdi="san";
}
/* gupUdhUpavicCipaNipanibhya AyaH (3.1.28) */
if ( sub(array("gupU!","viCa!","pana!"),array("+"),blank(0),0) || ($fo==="DUpa!" && sub(array("DUpa!"),array("+"),$sArvadhAtuka_pratyayas,0) && $verbset==="BvAdi") || $_GET['cond49']==="1"  )
{
    $text=three(array("gupU!","DUpa!","viCa!","pana!","paRa!"),array("+"),$lakAra,array("gupU!","DUpa!","viCa!","pana!","paRa!"),array("+Aya+"),$lakAra,0);
	storedata('3.1.28','sa',0);
    $sanAdi="Aya";
	storedata('1.3.2','pa',0);
	$text = change('/['.pc('ac').'][!][+]Aya/','+Aya');
	$text = change('/fta[!][+]IyaN/','ft+IyaN');
	$text = change('/kamu[!][+]RiN/','kam+RiN');
	storedata('1.3.9','sa',0);
	if (arr($text,'/gup[+]Aya/'))
	{
		$text = change('/gup[+]Aya/','gopAya');
		storedata('7.3.86','sa',0);
	}
}
/* RterIyaG (3.1.29) */
if ( in_array($fo,array("fta!")) && $pada==="pratyaya" && $lakAra!=="")
{
    $text=three(array("fta!"),array("+"),$lakAra,array("fta!"),array("+IyaN+"),$lakAra,0);
	storedata('3.1.29','sa',0);
    $sanAdi="IyaN";
    $verbpada="A";
	storedata('1.3.2','pa',0);
	$text = change('/fta[!][+]IyaN/','ft+IyaN');
	storedata('1.3.9','sa',0);
}
/* kamerNiG (3.1.30) */
if ( in_array($fo,array("kamu!")) && $pada==="pratyaya" && $lakAra!=="")
{
    $text=three(array("kamu!"),array("+"),$lakAra,array("kamu!"),array("+RiN+"),$lakAra,0);
	storedata('3.1.30','sa',0);
    $sanAdi="RiN";
    $verbpada="A";
	storedata('1.3.2','pa',0);
	$text = change('/kamu[!][+]RiN/','kam+RiN');
	storedata('1.3.9','sa',0);
	storedata('1.3.3','pa',0);
	storedata('1.3.7','pa',0);
	$text = change('/kam[+]RiN/','kam+i');
	storedata('1.3.9','sa',0);	
	$text = one(array("kam+i"),array("kAmi"),0);
	storedata('7.2.116','sa',0);
}
/* AyAdaya ArdhadhAtuke vA (3.1.31) */
// Right now it is difficult to handle optional forms in this case. Commenting it out
/*if ( in_array($sanAdi,array("Aya","IyaN","RiN")) && $lakAra!=="" && $ardhadhatuka===1)
{
    $text=two(array("+"),array("Aya+","IyaN+","RiN+"),array("+"),array("","",""),1);
	storedata('3.1.31','sa',0);
    $verbpada="A";
}*/

/* Displaying general information about lakAras */
/* laT vartamAne (3.2.123) */
if (in_array($so,$tiG) && $pada==="pratyaya" && $lakAra==="law")
{
	storedata('3.2.123','pa',0);
}
/* parokSe liT (3.2.115) */
if (in_array($so,$tiG) && $pada==="pratyaya" && $lakAra==="liw")
{
	storedata('3.2.115','pa',0);
}
/* anadyatane luT (3.3.15) */
if (in_array($so,$tiG) && $pada==="pratyaya" && $lakAra==="luw")
{
	storedata('3.3.15','pa',0);
}
/* AziSi liGlowau (3.3.173) */
if (in_array($so,$tiG) && $pada==="pratyaya" && $lakAra==="ASIrliN")
{
	storedata('3.1.173','pa',0);
}
if ($debug===1) {dibug("1000");}
/* liGnimitte lRG kriyAtipattau (3.2.139) */
if (in_array($so,$tiG) && $pada==="pratyaya" && $lakAra==="lfN")
{
	storedata('3.1.139','pa',0);
}
/* lasya (3.4.77) and tiptasjhisipthasthamibvasmastAtAMjhathAsAthAMdhvamiDvahimahiG (3.4.78) */
if (in_array($so,$tiG) && $pada==="pratyaya" && $lakAra!=="")
{
	storedata('3.4.77','pa',0);
	storedata('1.3.3','pa',0);
	storedata('1.3.2','pa',0);
	$text = pr2(array("+"),array($lakAra),blank(0),array("+"),array("l"),blank(0),$text);
	$text = pr2(array("+"),array("liN","lew"),blank(0),array("+"),array("l"),blank(0),$text);
	storedata('1.3.9','sa',0);
	$text = pr2(array("+"),array("l"),blank(0),array("+"),array($second),blank(0),$text);
	storedata('3.4.78','sa',0);
}
/* laH parasmaipadam (1.4.99) */
if ( ($verbpada==="p" || ($verbpada==="u" && in_array($so,$tis))) && $lakAra!=="")
{
	storedata('1.4.99','pa',0);
}
/* taGAnAvAtmanepadam (1.4.100) */
if ( ( $verbpada==="A" || ($verbpada==="u" && in_array($so,$taG)) )&& $pada==="pratyaya" && $lakAra!=="")
{
	storedata('1.4.100','pa',0);
}
/* tiGastrINi trINi prathamamadhyamottamAH (1.4.101) and tAnyekavacanadvivacanabahuvacanAnyekazaH (1.4.102) */
if (in_array($so,$tiG) && $pada==="pratyaya" && $lakAra!=="")
{
	storedata('1.4.101','pa',0);
	storedata('1.4.102','pa',0);
}
/* yuzmadyupapade samAnAdhikaraNe sthAninyapi madhyamaH (1.4.105) */
if (in_array($so,$tiGmadhyama) && $pada==="pratyaya" && $lakAra!=="")
{
	storedata('1.4.105','pa',0);
}
/* prahAse ca manyopapade manyateruttama ekavacca (1.4.106) */
// Pending. Not clear. Will code when its example comes.
/* asmadyuttamaH (1.4.107) */
if (in_array($so,$tiGuttama) && $pada==="pratyaya" && $lakAra!=="")
{
	storedata('1.4.107','pa',0);
}
/* zeSe prathamaH (1.4.108) */
if (in_array($so,$tiGprathama) && $pada==="pratyaya" && $lakAra!=="")
{
	storedata('1.4.108','pa',0);
}
/* jakSityAdayaH SaT (6.1.6) */
if (in_array($fo,array("jakza!","jAgf","daridrA","ASAsu!","cakAsf!","dIDIN","vevIN")) && sub(array("jakza!","jAgf","daridrA","ASAsu!","cakAsf!","dIDIN","vevIN"),blank(0),blank(0),0))
{
    $abhyasta=1; 
    $jaksat=1; // 0 - doesn't belong to jakSityAdi. 1 - belongs to jakSityAdi.
	storedata('6.1.6','pa',0);
}
/* tiGzitsArvadhAtukam (3.4.113) */ 
// for tiG.
if (in_array($lakAra,array("law","low","laN","viDiliN","sArvaDAtukalew"))  && sub(array("+"),$tiG,blank(0),0) )
{
    $sarvadhatuka=1;
	storedata('3.4.113','pa',0);
}
/* ArdhadhAtukaM zeSaH (3.4.114) */ 
if ( in_array($lakAra,array("lfw","lfN","luw","ASIrliN","luN","ArDaDAtukalew")) && sub(array("+"),$tiG,blank(0),0) )
{
    $ardhadhatuka=1;
}
/* liT ca (3.4.115) */ 
if ( in_array($lakAra,array("liw")) && sub(array("+"),$tiG,blank(0),0) )
{
    $ardhadhatuka=1;
}
/* Adding vikaraNas */
$vik=array();
$luGset=0;
if ($debug===1) {dibug("1050");}
if ($lakAra==="luN")
{
	$luGset=1;
	// $luGset takes value 1 to 12 based on 12 types of luG lakAra pratyayas given on pages 154,155 of sahajabodha part 2.
	/* luG (3.2.110) */
	storedata('3.2.110','pa',0);
	/* mAGi luG (3.3.175) */
	// pending.
	/* smottare laG ca (3.3.176) */
	// pending.
	/* cli luGi (3.1.43) */
	$text = pr2(array("+"),$tiG,blank(0),array("+cli+"),$tiG,blank(0),$text);
	storedata('3.1.43','sa',0);
	$set=2;
	/* zala igupadhAdaniTaH ksaH (3.1.45) */
	if (in_array($fo,array("kruSa!","diSa!","riSa!","ruSa!","liSa!","tviza!","dviza!","miha!","ruha!","liha!","duha!")) )
	{
		$text = one(array("+cli+"),array("+sa+"),0);
		storedata('3.1.45','sa',0);
		$ksa=1;
		$luGset=7;
		$it = array_merge($it,array("k"));
		$itpratyaya = array_merge($itpratyaya,array("k"));
	}
	/* zala igupadhAdaniTaH ksaH (3.1.45) */
	if (in_array($fo,array("gfhU!","bfhU!","tfhU!","stfhU!","guhU!")) )
	{
		$text = one(array("+cli+"),array("+sa+"),1);
		storedata('3.1.45','sa',0);
		$ksa=1;
		$luGset=7;
		$it = array_merge($it,array("k"));
		$itpratyaya = array_merge($itpratyaya,array("k"));
	}
	/* asyativaktikhyAtibhyo'G (3.1.52) */
	if (in_array($fo,array("asu!","vaca!","brUY","KyA","cakzi!N")) )
	{
		$text = one(array("+cli+"),array("+aN+"),0);
		storedata('3.1.52','sa',0);
		storedata('1.3.3','pa',0);
		$text = one(array("+aN+"),array("+a+"),0);
		storedata('1.3.9','sa',0);
		$asyati = 1;
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
	}
	/* lipisicihvazca (3.1.53) */
	if (in_array($fo,array("lipa!","zica!","hveY")) && in_array($so,$tis) )
	{
		$text = one(array("+cli+"),array("+aN+"),0);
		storedata('3.1.53','sa',0);
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
	}
	/* AtmanepadeSvanyatarasyAm (3.1.54) */
	if (in_array($fo,array("lipa!","zica!","hveY")) && in_array($so,$taG) )
	{
		$text = one(array("+cli+"),array("+aN+"),1);
		storedata('3.1.54','sa',0);
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
	}
	/* spRzamRzakRSatRpadRpAM sijvA vaktavyaH (vA) */
	if ( in_array($fo,array("spfSa!","mfSa!","kfza!","tfpa!","dfpa!")) && in_array($so,$tis) )
	{
		$text = one(array("+cli+"),array("+sa+"),1); // ?? is it optional aN or optional ksa?. Pending.
		storedata('3.1.44-7','sa',0);
		$ksa=1;
		$luGset=7;
		$it = array_merge($it,array("k"));
		$itpratyaya = array_merge($itpratyaya,array("k"));
	}
	/* zliSa AliGgane (??) see page 166 of sahajabodha part 2. */
	elseif ( in_array($fo,array("Sliza!")) && in_array($so,$tis) && $_GET['cond54']==="2" )
	{
		storedata('zliSa','pa',0);
		storedata('3.1.55','sa',0);
		$text = one(array("+cli+"),array("+aN+"),0);
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
	}
	/* puSAdidyutAdilRditaH parasmaipadeSu (3.1.55) */
	elseif ( ( (in_array($fo,$divAdi_puSAdi)&&$verbset==="divAdi")||(in_array($fo,$bhvAdi_dyutAdi)&&$verbset==="BvAdi")||in_array($fo,$lRdit)) && $fo!=="Apx!" && in_array($so,$tis) )
	{
		$text = one(array("+cli+"),array("+aN+"),0);
		storedata('3.1.55','sa',0);
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
		$aG=1;
	}
	/* sartizAstyartibhyazca (3.1.56) */
	if ( ends(array($fo),array("sf","SAsu!","f",),2) && in_array($so,$tis) && sub(array("sf","SAsu!","f",),array("+"),blank(0),0) )
	{
		$text = one(array("+cli+"),array("+aN+"),0);
		storedata('3.1.56','sa',0);
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
	}
	/* na dRSaH (3.1.77) */
	if ( ends(array($fo),array("dfSi!r"),2) && in_array($so,$tis) )
	{
		$text = one(array("+cli+"),array("+aN+"),1);
		storedata('3.1.77','sa',0);
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
	}
	/* irito vA (3.1.57) */
	elseif ( ends(array($fo),$irendiditverbs,2) && in_array($so,$tis) )
	{
		$text = one(array("+cli+"),array("+aN+"),1);
		storedata('3.1.57','sa',0);
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
	}
	/* jRRstanbhumrucumlucugrucuglucugluJcuzvibhyazca (3.1.58) */
	if ( ends(array($fo),array("jF","staMBu!","mrucu!","mlucu!","grucu!","glucu!","gluYcu!","wuo!Svi",),2) && in_array($so,$tis) )
	{
		$text = one(array("+cli+"),array("+aN+"),1);
		storedata('3.1.58','sa',0);
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
	}
	/* kRmRdRruhibhyazCandasi (3.1.59) */
	if ( ends(array($fo),array("qukfY","mfN","df","ruha!"),2) && in_array($so,$tis) && $_GET['cond55']==="1")
	{
		$text = one(array("+cli+"),array("+aN+"),0);
		storedata('3.1.59','sa',0);
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
	}
	/* nonayatidhvanayatyelayatyardayatibhyaH (3.1.51) */
	if ( ends(array($fo),array("Una","Dvana","ila!","arda!"),2) && in_array($so,$tiG) && $_GET['cond55']==="1")
	{
		$text = one(array("+cli+"),array("+sic+"),0);		
		storedata('3.1.51','sa',0);
		$sic=1; 
		$luGset=9;
		$text = one(array("Una+Ric+","Dvana+Ric+","ila!+Ric+","arda!+Ric+"),array("Uni+","Dvani+","li+","ardi+"),0);
	}
	/* NizridrusrubhyaH kartari caG (3.1.48) */
	elseif ( ( $sanAdi==="Ric" || $sanAdi==="RiN" || ends(array($fo),array("SriY","sru","dru"),2) || $verbset==="curAdi" ) && in_array($so,$tiG) )
	{
		//$text = one(array("+cli+"),array("+caN+"),0);
		$Nizri=1;
		//storedata('3.1.48','sa',0);
		//$it = array_merge($it,array("N"));
		//$itpratyaya = array_merge($itpratyaya,array("N"));
		$luGset=5;
		$caG=1;
	}
	/* kamezclezcaG vAcyaH (vA) */
	if ( ends(array($fo),array("kamu!"),2) && in_array($so,$tiG) )
	{
		$text = one(array("+cli+"),array("+caN+"),0);
		storedata('3.1.48-1','sa',0);
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
		$luGset=5;
		$caG=1;
	}
	/* vibhASA dheTzvyoH (3.1.49) */
	if ( ends(array($fo),array("Dew","wuo!Svi"),2) && in_array($so,$tiG) )
	{
		$text = one(array("+cli+"),array("+caN+"),1);
		storedata('3.1.49','sa',0);
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
		$luGset=5;
		$caG=1;
	}
	/* gupezCandasi (3.1.50) */
	if ( ends(array($fo),array("gupa!"),2) && in_array($so,$tiG) && $_GET['cond55']==="1")
	{
		$text = one(array("+cli+"),array("+caN+"),1);
		storedata('3.1.50','sa',0);
		$it = array_merge($it,array("N"));
		$itpratyaya = array_merge($itpratyaya,array("N"));
		$luGset=5;
		$caG=1;
	}
	/* cleH sic (3.1.44) */
	if (sub(array("+"),array("cli"),array("+"),0) && $Nizri!==1)
	{
		$text = one(array("+cli+"),array("+sic+"),0);
		storedata('3.1.44','sa',0);
		$sic=1; // 1 for sic vikaraNa. 0 for sijluk. 2 for vibhASA.
		$luGset=9;
	}
	/* gAtisthAghupAbhUbhyaH sicaH parasmaipadeSu (2.4.77) */
		if (ends(array($fo),array("iR","zWA","do","deN","qudAY","dAR","quDAY","pA","BU","asa!"),4) && !(ends(array($fo),array("pA"),4) && $verbset==="adAdi") && !(ends(array($fo),array("asa!"),4) && $verbset==="BvAdi") && $sic===1 && in_array($so,$tis))
		{
			$text = one(array("+sic+"),array("+"),0);
			storedata('2.4.77','sa',0);
			$sic=0;
			$luGset=1;
			//$sarvadhatuka=1;
		}
	/* vibhASA ghrAdheTzAcCAsaH (2.4.78) */
		if (in_array($fo,array("GrA","Dew","So","Co","zo",)) && $sic===1)
		{
			$text = one(array("+sic+"),array("+"),1);
			storedata('2.4.78','sa',0);
			$sic=2;
			$luGset=1;
		}
}
if ($debug===1) {dibug("1250");}

/* Deciding seTtva / veTtva / aniTtva of luG lakAra suffixes */
if ( !in_array($luGset,array(9)) && $lakAra==='luN')
{
	$id_dhAtu='aniw';
}
/* sijabhyastavidibhyazca (3.4.109) */
if ( $sic!==0 && $so==="Ji" && in_array($lakAra,array("laN","ASIrliN","viDiliN","luN","lfN")))
{
	$text = two(array("+sic+"),array("Ji"),array("+sic+"),array("jus"),0);
	storedata('3.4.109','sa',0);
}
/* AtaH (3.4.110) */
if ( $sic!==0 && $so==="Ji" && sub(array("A"),array("+"),array("Ji"),0) )
{
	$text = three(array("A"),array("+"),array("Ji"),array("A"),array("+"),array("jus"),0);
	storedata('3.4.110','sa',0);
}
if ($debug===1) {dibug("1300");}
/* zruvaH zR ca (3.1.74) */
if (in_array($fo,array("Sru")) && $sarvadhatuka===1 && sub(array("Sru"),array("+"),$tiG,0) && in_array($so,$tiG))
{
    $text=three(array("Sru"),array("+"),$tiG,array("Sf"),array("+Snu+"),$tiG,0);
    $text=one(array("+Snu+Snu"),array("+Snu+"),0);
	storedata('3.1.74','sa',0);
    $vik=array_merge($vik,array("Snu"));
    $set=2;
}
/* dhivikRNvyora ca (3.1.80) */
elseif (in_array($so,$tiG) && in_array($fo,array("Divi!","kfvi!")) && $sarvadhatuka===1 && sub(array("Divi!","kfvi!"),array("+"),$tiG,0))
{
    $text=three(array("Divi!","kfvi!"),array("+"),$tiG,array("Divi!","kfvi!"),array("+u+"),$tiG,0);
    $text=one(array("+u+u"),array("+u+"),0);
	storedata('3.1.80','sa',0);
    $vik=array_merge($vik,array("u"));
    $set=2;
}
// first treatment of curAdi, because, it will take Nic before vikaraNa pratyaya.
/* satyApapAzarUpavINAtUlazlokasenAlomatvacavarmacUrNacurAdibhyo Nic (3.1.25) */
elseif (in_array($so,$tiG) &&  $verbset==="curAdi" && in_array($fo,$curAdi) )// && sub($curAdi,array("+"),blank(0),0) && sub(array("+"),$tiG,blank(0),0) ) # Trying to remove time consuming sub function.
{
	if($Nizri===1)
	{
		$text=two(array("+cli+"),$tiG,array("+Ric+cli+"),$tiG,0);
		$text=one(array("Ric+Ric+"),array("Ric+"),0);
		storedata('3.1.25','sa',0);
		$text=two(array("Ric+cli+"),$tiG,array("+Ric+caN+"),$tiG,0);
		$text=two(array("Ric+Ric+"),$tiG,array("Ric+"),$tiG,0);
		storedata('3.1.48','sa',0);
	}
	else 
	{
		$text=two(array("+"),$tiG,array("+Ric+"),$tiG,0); 
		storedata('3.1.25','sa',0);
	}
    $text=one(array("+Ric+Ric","+caN+Ric+"),array("+Ric+","+Ric+caN+"),0);
    if (sub(array("+"),$tiG,blank(0),0) && $sarvadhatuka===1)
    {
    $text=two(array("+"),$tiG,array("+Sap+"),$tiG,0);
    $text=one(array("+Sap+Sap"),array("+Sap+"),0);
	storedata('3.1.68','sa',0);
    $vik=array_merge($vik,array("Sap"));
    }
	$vik=array_merge($vik,array("Ric"));
    $set=1; // defining set as per sahajabodha groups.
}
// For pratipadikas.
elseif (in_array($so,$tiG) && in_array($fo,array("satyApa","pASa","vIRA","tUla","Sloka","senA","loma","tvac","varRa","cUrRa")) && sub(array("satyApa","pASa","vIRA","tUla","Sloka","senA","loma","tvac","varRa","cUrRa"),array("+"),blank(0),0) )
{
    $text=two(array("satyApa","pASa","vIRA","tUla","Sloka","senA","loma","tvac","varRa","cUrRa"),array("+"),array("satyApa","pASa","vIRA","tUla","Sloka","senA","loma","tvac","varRa","cUrRa"),array("+Ric+"),0);
    $text=one(array("+Ric+Ric"),array("+Ric+"),0);
	storedata('3.4.25','sa',0);
}
/* for user input specified verbs */
/* divAdibhyaH zyan (3.1.69) */
elseif ( $sarvadhatuka===1 && $verbset==="divAdi"  && in_array($fo,$divAdi) && sub($divAdi,array("+"),blank(0),0) && sub(array("+"),$tiG,blank(0),0))
{
    $text=two(array("+"),$tiG,array("+Syan+"),$tiG,0);
    $text=one(array("+Syan+Syan"),array("+Syan+"),0);
	storedata('3.1.69','sa',0);
    $vik=array_merge($vik,array("Syan"));
    $set=1;
}
/* svAdibhyaH znuH (3.1.73) */
elseif ( $sarvadhatuka===1 && $verbset==="svAdi" && sub(array("+"),$tiG,blank(0),0) && in_array($fo,$svAdi))
{
    $text=two(array("+"),$tiG,array("+Snu+"),$tiG,0);
    $text=one(array("+Snu+Snu"),array("+Snu+"),0);
	storedata('3.1.73','sa',0);
    $vik=array_merge($vik,array("Snu"));
    $set=2;
}
/* tudAdibhyaH zaH (3.1.77) */
elseif ( $sarvadhatuka===1 && $verbset==="tudAdi" && sub(array("+"),$tiG,blank(0),0) && in_array($fo,$tudAdi))
{
    $text=two(array("+"),$tiG,array("+Sa+"),$tiG,0);
    $text=one(array("+Sa+Sa"),array("+Sa+"),0);
	storedata('3.1.77','sa',0);
    $vik=array_merge($vik,array("Sa"));    
    $set=1;
}
/* rudhAdibhyaH znam (3.1.78) */
elseif ( $sarvadhatuka===1 && $verbset==="ruDAdi" && sub(array("+"),$tiG,blank(0),0) && in_array($fo,$rudhAdi))
{
    $rudhAdibhyaH=1; $set=2;
}
/* tanAdikRJbhyaH uH (3.1.79) */
elseif ( $sarvadhatuka===1 && $verbset==="tanAdi" && sub(array("+"),$tiG,blank(0),0) && in_array($fo,$tanAdi) )
{
    $text=two(array("+"),$tiG,array("+u+"),$tiG,0);
    $text=one(array("+u+u"),array("+u+"),0);
	storedata('3.1.71','sa',0);
    $vik=array_merge($vik,array("u"));
    $set=2;    
}
/* kryadibhyaH znA (3.1.81) */
elseif ( $sarvadhatuka===1 && $verbset==="kryAdi" && sub(array("+"),$tiG,blank(0),0) && in_array($fo,$kryAdi) )
{
    $text=two(array("+"),$tiG,array("+SnA+"),$tiG,0);
    $text=one(array("+SnA+SnA"),array("+SnA+"),0);
	storedata('3.1.81','sa',0);
    $vik=array_merge($vik,array("SnA"));
    $set=2;
}
/* kartari zap (3.1.68) */
elseif ($sarvadhatuka===1 && in_array($verbset,array("BvAdi","adAdi","juhotyAdi","curAdi")) && sub(array("+"),$tiG,blank(0),0) )
{
    $text=two(array("+"),$tiG,array("+Sap+"),$tiG,0);
    $text=one(array("+Sap+Sap"),array("+Sap+"),0);
	storedata('3.1.68','sa',0);
    $vik=array_merge($vik,array("Sap"));
    $set=1;
}

/* for regular input without user selection */
/* satyApapAzarUpavINAtUlazlokasenAlomatvacavarmacUrNacurAdibhyo Nic (3.1.25) */
elseif ( $sarvadhatuka===1 && $verbset==="none" && sub(array("+"),$tiG,blank(0),0) && in_array($fo,$curAdi))
{
    $text=two(array("+"),$tiG,array("+Ric+"),$tiG,0);
    $text=one(array("+Ric+Ric"),array("+Ric"),0);
	storedata('3.1.25','sa',0);
    if (sub(array("+"),$tiG,blank(0),0) && $sarvadhatuka===1)
    {
    $text=two(array("+"),$tiG,array("+Sap+"),$tiG,0);
    $text=one(array("+Sap+Sap"),array("+Sap+"),0);
	storedata('3.1.68','sa',0);
    $vik=array_merge($vik,array("Sap"));
    }
    $set=1;
}
/* divAdibhyaH zyan (3.1.69) */
elseif ( $sarvadhatuka===1  && $verbset==="none" && sub(array("+"),$tiG,blank(0),0) && in_array($fo,$divAdi) )
{
    $text=two(array("+"),$tiG,array("+Syan+"),$tiG,0);
    $text=one(array("+Syan+Syan"),array("+Syan+"),0);
	storedata('3.1.61','sa',0);
    $vik=array_merge($vik,array("Syan"));
    $set=1;
}
/* svAdibhyaH znuH (3.1.73) */
elseif ( $sarvadhatuka===1  && $verbset==="none" && sub(array("+"),$tiG,blank(0),0) && in_array($fo,$svAdi) )
{
    $text=two(array("+"),$tiG,array("+Snu+"),$tiG,0);
    $text=one(array("+Snu+Snu"),array("+Snu+"),0);
	storedata('3.1.73','sa',0);
    $vik=array_merge($vik,array("Snu"));
    $set=2;
}
/* tudAdibhyaH zaH (3.1.77) */
elseif ( $sarvadhatuka===1  && $verbset==="none" && sub(array("+"),$tiG,blank(0),0) && in_array($fo,$tudAdi) )
{
    $text=two(array("+"),$tiG,array("+Sa+"),$tiG,0);
    $text=one(array("+Sa+Sa"),array("+Sa+"),0);
	storedata('3.1.77','sa',0);
    $vik=array_merge($vik,array("Sa"));    
    $set=2;
}
/* rudAdibhyaH znam (3.1.78) */
elseif ( $sarvadhatuka===1  && $verbset==="none" && sub(array("+"),$tiG,blank(0),0) && in_array($fo,$rudhAdi))
{
    $rudhAdibhyaH = 1;
    $set=2;
}
/* tanAdikRJbhyaH uH (3.1.79) */
elseif ( $sarvadhatuka===1  && $verbset==="none" && sub(array("+"),$tiG,blank(0),0) && in_array($fo,$tanAdi) )
{
    $text=two(array("+"),$tiG,array("+u+"),$tiG,0);
    $text=one(array("+u+u"),array("+u+"),0);
	storedata('3.1.79','sa',0);
    $vik=array_merge($vik,array("u"));
    $set=2;
}
/* kryadibhyaH znA (3.1.81) */
elseif ( $sarvadhatuka===1  && $verbset==="none" && sub(array("+"),$tiG,blank(0),0) && in_array($fo,$kryAdi) )
{
    $text=two(array("+"),$tiG,array("+SnA+"),$tiG,0);
    $text=one(array("+SnA+SnA"),array("+SnA+"),0);
	storedata('3.1.81','sa',0);
    $vik=array_merge($vik,array("SnA"));
    $set=2;
}
/* zruvaH zR ca (3.1.74) */
elseif ( $sarvadhatuka===1  && $verbset==="none" &&sub(array("Sru"),array("+"),$tiG,0) && in_array($fo,array("Sru")))
{
    $text=three(array("Sru"),array("+"),$tiG,array("Sf"),array("+Syan+"),$tiG,0);
	storedata('3.1.74','sa',0);
    $vik=array_merge($vik,array("Syan"));
    $set=1;
}
/* kartari zap (3.1.68) */
elseif ( $sarvadhatuka===1 && sub(array("+"),$tiG,blank(0),0))
{
    $text=two(array("+"),$tiG,array("+Sap+"),$tiG,0);
    $text=one(array("+Sap+Sap"),array("+Sap+"),0);
	storedata('3.1.68','sa',0);
    $vik=array_merge($vik,array("Sap"));
    $set=1;
}
/* yaso'nupasargAt (3.1.71) */
if ( ends(array($fo),array("yasu!"),2) && sub(array("yasu!"),array("+Syan"),array("+"),0) )
{
    $text=three(array("yasu!"),array("+Syan"),array("+"),array("yasu!"),array("+Sap"),array("+"),1);
	storedata('3.1.71','sa',0);
    $vik=array_merge($vik,array("Sap"));
}
/* saMyasazca (3.1.72) */
if ( ends(array($fo),array("yasu!"),2) && $us==="sam" && sub(array("yasu!"),array("+Sap"),array("+"),0) )
{
    $text=three(array("yasu!"),array("+Sap"),array("+"),array("yasu!"),array("+Syan"),array("+"),1);
	storedata('3.1.72','sa',0);
    $vik=array_merge($vik,array("Syan"));
}
/* stambhustumbhuskambhuskumbhuskuJbhyaH znuzca (3.1.82) */
if ( ends(array($fo),array("skuY"),2)  && sub(array("skuY"),array("+SnA"),array("+"),0))
{
    $text=three(array("skuY"),array("+SnA"),array("+"),array("skuY"),array("+Snu"),array("+"),1);
	storedata('3.1.82','sa',0);
    $vik=array_merge($vik,array("Snu"));
}
if ($debug===1) {dibug("1500");}
/* stambhustumbhuskambhuskumbhuskuJbhyaH znuzca (3.1.82) */
if ( ends(array($fo),array("stamBu!","stumBu!","skamBu!","skumBu!",),2) && sub(array("stamBu!","stumBu!","skamBu!","skumBu!",),array("+SnA"),array("+"),0) )
{
    $text=three(array("stamBu!","stumBu!","skamBu!","skumBu!",),array("+SnA"),array("+"),array("stamBu!","stumBu!","skamBu!","skumBu!",),array("+Snu"),array("+"),1);
	storedata('3.1.82','sa',0);
    $vik=array_merge($vik,array("Snu"));
}
/* juhotyAdibhyaH zluH (2.4.75), zlau (6.1.10) and kuhozcuH (7.4.62) */
if ( ($sarvadhatuka===1 && $verbset==="juhotyAdi" && sub(array("+Sap+"),$tiG,blank(0),0) && in_array($fo,$juhotyAdi) ) || $zluvat===1)
{
    $text=three($juhotyAdi,array("+Sap+"),$tiG,$juhotyAdi,array("+"),$tiG,0);
	storedata('2.4.75','sa',0);
    $zlu=1;
    $vik=array("Slu");
    $set=2;
    $abhyasta=1;
	$abhyAsa=1;
	zlu();
}
/* adiprabhRtibhyaH zapaH (2.4.72) */
if ( $sarvadhatuka===1 && $verbset==="adAdi" && in_array($fo,$adAdi) && sub(array("+Sap+"),$tiG,blank(0),0) )
{
    $text=two(array("+Sap+"),$tiG,array("+"),$tiG,0);
	storedata('2.4.72','sa',0);
    $ad=1;
    $vik=array("Sapluk");
    $set=2;
}
/* sijabhyastavidibhyazca (3.4.109) */
if ( $abhyasta===1 && $so==="Ji"  && in_array($lakAra,array("laN","ASIrliN","viDiliN","luN","lfN")))
{
	$text = two(array("+"),array("Ji"),array("+"),array("jus"),0);
	storedata('3.4.109','sa',0);
}
/* kRpo ro laH (8.2.18) */
if (arr($text,'/kfp/') && $caG!==1)
{
    $text=one(array("kfp"),array("kxp"),0);
	storedata('8.2.18','sa',0);
}
/* Nau prAtipadikasya iSThavatkAryaM bhavatIti vaktavyam (vA) */
if ( !in_array($fo,$allverbs) && sub(array("+Ric+Sap+","+RiN+Sap+"),$tiG,blank(0),0) )
{
	storedata('6.4.155-1','sa',0);
    /* bhasyADhe taddhite puMvadbhAvaH (vA) */
    if (sub(array("enI","A","I"),array("+Ric+Sap+","+RiN+Sap+"),$tiG,0))
    {
        $text = three(array("enI","A","I"),array("+Ric+Sap+","+RiN+Sap+"),$tiG,array("eta","a","a"),array("+Ric+Sap+","+RiN+Sap+"),$tiG,0);
		storedata('6.3.35-11','sa',0);
        $bhasyADhe=1;
    }
    /* TeH (6.4.155) */
    if (sub(array("+Ric+Sap+","+RiN+Sap+"),$tiG,blank(0),0) && anekAca($fo))
    {
        $text = three(array($first),array("+Ric+Sap+","+RiN+Sap+"),$tiG,array(Ti1($first)),array("+Ric+Sap+","+RiN+Sap+"),$tiG,0);
		storedata('6.4.155','sa',0);
    }
    /* vinmatorluk (5.3.65) */
    if (sub(array("gvin","vin"),array("+Ric+Sap+","+RiN+Sap+"),$tiG,0) )
    {
        $text = three(array("gvin","vin"),array("+Ric+Sap+","+RiN+Sap+"),$tiG,array("j",""),array("+Ric+Sap+","+RiN+Sap+"),$tiG,0);
		storedata('5.3.65','sa',0);
    }
    /* avyayAnAM bhamAtre TilopaH (vA) */
	// pending to refactor because not able to locate the vArtika number.
    if (sub($avyaya,array("+Ric","+RiN"),blank(0),0) && in_array($fo,$avyaya) && !anekAca($fo))
    {
        $text = three(array($first),array("+Ric+Sap+","+RiN+Sap+"),$tiG,array(Ti1($first)),array("+Ric+Sap+","+RiN+Sap+"),$tiG,0);
        echo "<p class = sa >By avyayAnAM bhamAtre TilopaH (vA) :</p>\n"; 
        echo "<p class = sa >अव्ययानां भमात्रे टिलोपः (वा) :</p>\n";
        display(0);        
    }
    /* prakRtyaikAc (6.4.163) */
    elseif (sub(array("+Ric+Sap+","+RiN+Sap+"),$tiG,blank(0),0) && !anekAca($fo))
    {
		storedata('6.4.163','sa',0);
    }
}
/* pAghrAdhmAsthAmnAdANdRzyartizadasadAM pibajighradhamatiSThamanayacCapazyarcCadhaushIyasIdAH (7.3.78) */
if (in_array($so,$tiG) && $lakAra!=="" && in_array($fo,array("pA","GrA","DmA","zWA","mnA","dAR","dfSi!r","f","sf","Sadx!","zadx!","zWA")) && sub(array("pA","GrA","DmA","zWA","mnA","dAR","dfSi!r","f","sf","Sadx!","zadx!"),array("+"),$shitpratyaya,0) && !($fo==="f" && $verbset==="svAdi") )
{
    $text=three(array("pA","GrA","DmA","zWA","mnA","dAR","dfSi!r","sf","f","Sadx!","zadx!"),array("+"),$shitpratyaya,array("piba","jiGra","Dama","tizWa","mana","yacCa","paSya","DO","fcCa","SIya","sIda"),array("+"),$shitpratyaya,0);
	storedata('7.3.78','sa',0);
    $nomidelision=1; // We will remember this while doing halantyam and prevent halantyam application, because these are not upadeza
	$vijait=1; // to prevent application of pugantalaghUpadhasya ca.
}
/* AdirJiTuDavaH (1.3.5) */
if ((substr($first,0,2) === "Yi" || substr($first,0,2) === "wu" || substr($first,0,2) === "qu") && $pada=== "pratyaya" && in_array($so,$tiG))
{
    if(substr($first,0,2) === "Yi") { $itprakriti = array_merge($itprakriti,array("Yi")); }
    if(substr($first,0,2) === "wu") { $itprakriti = array_merge($itprakriti,array("wu")); }
    if(substr($first,0,2) === "qu") { $itprakriti = array_merge($itprakriti,array("qu")); }
	storedata('1.3.5','sa',0);
    $text = first(array("Yi","wu","qu"),array("","",""),0); // function first removes and replaces specific strings from the words. For details see function.php.
	storedata('1.3.9','sa',0);
}
/* satva vidhi, natva vidhi, numAgama vidhi, anusvArasandhi, parasavarNasandhi, upadhAdIrghavidhi on dhAtus (Acc to sahajabodha) */
// We are presuming that the verb entered is the verb with anusvAra and it markers, but without accent marks. I will have to revert back to handle without it markers and with accent marks specifically later.
/* subdhAtuSThivuSvakAdInAM satvapratiSedho vaktavyaH (vA 3499) */
if (in_array($fo,array("zWivu!","zvazk")) )
{
	storedata('6.1.64-1','sa',0);
}
if ($debug===1) {dibug("1600");}
/* dhAtvAdeH SaH saH (6.1.64), No naH (6.1.65) and upadhAyAm ca (8.2.78) */
elseif (arr($text,'/^[z]/') || arr($text,'/^[R]/') || arr($text,'/[iu][r][d]/')) 
{
   if (arr($text,'/^[z]/'))
   {
	   $text = change('/^([z])/','s');
		storedata('6.1.64','sa',0);
		$SaHsaH=1;
		if (arr($text,'/^[s][wWqQR]/'))
		{
			$text=two(array("s"),$Tu,array("s"),$tu,0);
			storedata('par@56-1','sa',0);
		}
   }
   if (arr($text,'/^[R]/'))
   {
	   $text = change('/^([R])/','n');
		storedata('6.1.65','sa',0);
		if (arr($text,'/^[n][wWqQR]/'))
		{
			$text=two(array("n"),$Tu,array("n"),$tu,0);
			storedata('par@56-1','sa',0);
		}
   }
   if (arr($text,'/[iu][r][d]/'))
   {
	   $text=three(array("ir","ur"),$hl,array("+"),array("Ir","Ur"),$hl,array("+"),0);
		storedata('8.2.78','sa',0);
   }           
}

/* daMzasaJjasvaJjAM zapi (6.4.25) */
if (in_array($fo,array("daMSa!","zaYja!","zvaYja!")) && sub(array("daMSa!","saYja!","svaYja!"),array("+Sap+"),$tiG,0) )
{
    $text=two(array("daMSa!","saYja!","svaYja!"),array("+Sap+"),array("daSa!","saja!","svaja!"),array("+Sap+"),0);
	storedata('6.4.25','sa',0);
}
/* raJjezca (6.4.26) */
if (in_array($fo,array("raYja!")) && sub(array("raYja!"),array("+Sap+"),$tiG,0) )
{
    $text=two(array("raYja!"),array("+Sap+"),array("raja!"),array("+Sap+"),0);
	storedata('6.4.26','sa',0);
}
/* numAgama as per sahajabodha */
// adding 'i' in it markers.
if (in_array($fo,$iditverbs))
{
    $it=array_merge($it,array("i"));
}
/* iSugamiyamAM CaH (7.3.77) */
if ( in_array($fo,array("iza!","gamx!","yama!")) && sub(array("iza!","gamx!","yama!"),array("+"),$shitpratyaya,0) && in_array($verbset,array("BvAdi","tudAdi")))
{
    $text=three(array("iza!","gamx!","yama!"),array("+"),$shitpratyaya,array("iC","gaC","yaC"),array("+"),$shitpratyaya,0);
	storedata('7.3.77','sa',0);
    $nomidelision=1; // We will remember this while doing halantyam and prevent halantyam application, because these are not upadeza
}
/* patch to stop elision of verbs ending with i!r */
if (arr(array($fo),'/[i][!][r]$/'))
{
    $nomidelision=1;
	storedata('1.3.7-4','sa',0);
}
/* vA bhrAzabhlAzabhramukramutrasitruTilaSaH (3.1.70) */
if (in_array($fo,array("wuBrASf!","wuBlASf!","BrASf!","BlASf!","Bramu!","kramu!","klamu!","trasI!","truwI!","laza!")) && sub(array("wuBrASf!","wuBlASf!","BrASf!","BlASf!","Bramu!","kramu!","klamu!","trasI!","truwI!","laza!"),array("+"),array("Sap","Syan"),0) && $lakAra!=="" )
{
    $text=two(array("wuBrASf!","wuBlASf!","BrASf!","BlASf!","Bramu!","kramu!","klamu!","trasI!","truwI!","laza!"),array("+Sap"),array("wuBrASf!","wuBlASf!","BrASf!","BlASf!","Bramu!","kramu!","klamu!","trasI!","truwI!","laza!"),array("+Syan"),0);
    $text=two(array("wuBrASf!","wuBlASf!","BrASf!","BlASf!","Bramu!","kramu!","klamu!","trasI!","truwI!","laza!"),array("+Syan"),array("wuBrASf!","wuBlASf!","BrASf!","BlASf!","Bramu!","kramu!","klamu!","trasI!","truwI!","laza!"),array("+Sap"),1);
	storedata('3.1.70','sa',0);
}
/* kramaH parasmaipadeSu (7.3.76) */
if (in_array($fo,array("kramu!")) && sub(array("kramu!",),array("+"),$shitpratyaya,0) && $lakAra!=="" && in_array($so,$tis) )
{
    $text=three(array("kramu!"),array("+"),$shitpratyaya,array("krAm"),array("+"),$shitpratyaya,0);
	storedata('7.3.76','sa',0);
    $nomidelision=1; // We will remember this while doing halantyam and prevent halantyam application, because these are not upadeza
}
/* zamAmaSTAnAM dIrghaH zyani (7.3.74) */
if (in_array($fo,array("Samu!","tamu!","damu!","Sramu!","kzamU!","Bramu!","klamu!","madI!","mada!"))  && sub(array("Samu!","tamu!","damu!","Sramu!","kzamU!","Bramu!","klamu!","madI!","mada!"),array("+"),array("Syan"),0) && $lakAra!=="")
{
    $text=two(array("Samu!","tamu!","damu!","Sramu!","kzamU!","Bramu!","klamu!","madI!","mada!"),array("+Syan"),array("SAm","tAm","dAm","SrAm","kzAm","BrAm","klAm","mAd","mAd"),array("+Syan"),0);
	storedata('7.3.74','sa',0);
    $nomidelision=1; // We will remember this while doing halantyam and prevent halantyam application, because these are not upadeza
}
/* SThivuklamyAcamAM ziti (7.3.75) */
if ( in_array($fo,array("zWivu!","klamu!","camu!")) && (sub(array("zWivu!","klamu!",),array("+"),$shitpratyaya,0) || (sub(array("camu!"),array("+"),$shitpratyaya,0) && $us==="A")) && $lakAra!=="" )
{
    $text=three(array("zWivu!","klamu!","camu!"),array("+"),$shitpratyaya,array("zWIv","klAm","cAm"),array("+"),$shitpratyaya,0);
	storedata('7.3.75','sa',0);
    $nomidelision=1; // We will remember this while doing halantyam and prevent halantyam application, because these are not upadeza
}
/* akSo'nyatarasyAm (3.1.75) */
if (in_array($fo,array("akzU!"))  && sub(array("akzU!"),array("+"),array("Sap"),0) && $lakAra!=="" )
{
    $text=three(array("akzU!"),array("+"),array("Sap"),array("akzU!"),array("+"),array("Snu"),1);
	storedata('3.1.75','sa',0);
}
if ($debug===1) {dibug("1700");}
/* tanUkaraNe takSaH (3.1.76) */
if (in_array($fo,array("takzU!")) && sub(array("takzU!"),array("+"),array("Sap"),0) && $lakAra!=="" && $_GET['cond45']==="1" )
{
    $text=three(array("takzU!"),array("+"),array("Sap"),array("takzU!"),array("+"),array("Snu"),1);
	storedata('3.1.76','sa',0);
}
/* tiGzitsArvadhAtukam (3.4.113) */
// for zit pratyayas.
if (in_array($so,$tiG) && sub(array("+"),$shitpratyaya,blank(0),0) && $lakAra!=="")
{
    $sarvadhatuka=1;
	storedata('3.4.113','pa',0);
    $shit=1;
}
/* dAdhA ghvadAp (1.1.20) */
if ( in_array($fo,$ghuset) )
{
	storedata('1.1.20','sa',0);
    $ghu=1;
} else { $ghu=0; }
/* pvAdInAM hrasvaH (7.3.80) */
if (in_array($fo,$pvAdi) && sub(array("+"),$shitpratyaya,blank(0),0) && $fo!=="jyA" && ( $verbset==="curAdi" || ($verbset==="none" && in_array($fo,$curAdi) ) ))
{
    $text=three(array("A","I","U","F",),array("+"),$shitpratyaya,array("a","i","u","f",),array("+"),$shitpratyaya,0);
	storedata('7.3.80','sa',0);
}
/* idito numdhAtoH (7.1.58) */ # See https://github.com/drdhaval2785/SanskritVerb/issues/293 regarding location shifting.
if ( in_array("i",$it) && $lakAra!=="" && in_array($fo,array("cakzi!N")) )
{
	storedata('anteidita','sa',0);
}
/* idito numdhAtoH (7.1.58) */ # See https://github.com/drdhaval2785/SanskritVerb/issues/299.
elseif (in_array($so,$tiG) &&  in_array("i",$it) && $lakAra!=="" && !in_array($fo,$irendiditverbs) )
{
	storedata('1.3.2','pa',0);
	$text = two($iditverbs,array("+"),$iditverbs2,array("+"),0);
	storedata('1.3.9','sa',0);
    $text = two($iditverbs2,array("+"),$iditverbs1,array("+"),0);
	storedata('7.1.58','sa',0);
}

/* pratyaya changes */
/* jherjus (3.4.108) */
if (in_array($so,array("Ji")) && ($lakAra==="ASIrliN"||$lakAra==="viDiliN") )
{
    $text=two(array("+"),array("Ji"),array("+"),array("jus"),0);
	storedata('3.4.108','sa',0);
    $jherjus=1;
}
/* laGaH zAkaTAyanasyaiva (3.4.111) */
if ( in_array($so,array("Ji")) && $lakAra==="laN" && arr($text,'/A\+Ji/') && !arr($text,'/\+SnA\+Ji$/'))
{
    $text=one(array("A+Ji"),array("A+jus"),1);
	storedata('3.4.111','sa',0);
}
/* jhasya ran (3.4.105) */
if (in_array($so,array("Ja")) && in_array($lakAra,array("viDiliN","ASIrliN")) && pr2(array("+"),array("Ja"),blank(0),array("+"),array("ran"),blank(0),$text)!==$text)
{
    $text=pr2(array("+"),array("Ja"),blank(0),array("+"),array("ran"),blank(0),$text);
	storedata('3.4.105','sa',0);
    $jhasyaran=1;
} else {$jhasyaran=0; }
/* liTastajhayorezirec (3.4.81) */
if (in_array($so,array("ta","Ja")) && $lakAra==="liw")
{
    $text=two(array("+"),array("ta","Ja"),array("+"),array("eS","irec"),0);
	storedata('3.4.81','sa',0);
}
/* upadeze'janunAsika it (1.3.2)*/ 
// as idit is necessary for numAgama, it is placed here. otherwise with Sap, there is problem in mit function.
if (arr($text,'/['.flat($ac).'][!]/') && in_array($so,$tiG) )
{
	$text = change('/i[!]r[+]/','+');
	$text = change('/U[!]z[+]/','+');
    it('/(['.flat($ac).'][!])/');
	storedata('1.3.2','pa',0);
    $text = two($ac,array("!"),blank(count($ac)),array(""),0);
	storedata('1.3.9','sa',0);
}
/* AtmanepadeSvanataH (7.1.5) */
if ( in_array($so,array("Ja")) && $set===2 && pr2(array("+"),array("Ja"),blank(0),array("+"),array("ata"),blank(0),$text)!==$text)
{
    $text=pr2(array("+"),array("Ja"),blank(0),array("+"),array("ata"),blank(0),$text);
	storedata('7.1.5','sa',0);
}
/* AtmanepadeSvanataH (7.1.5) */
elseif ( in_array($so,array("Ja")) && preg_match('/[A]$/',$verb_without_anubandha) && ends(array("Sap","Sa"),$vik,2) && pr2(array("+"),array("Ja"),blank(0),array("+"),array("ata"),blank(0),$text)!==$text)
{
	echo "no jhontaH";
}
/* jho'ntaH (7.1.3) */
elseif (in_array($so,array("Ja")) && $lakAra!=="liw") // because liTastajhayorezirec.
{
    $text=two(array("+"),array("Ja"),array("+"),array("anta"),0);
	storedata('7.1.3','sa',0);
}
/* AtmanepadeSvanataH (7.1.5) */
elseif ( in_array($so,array("Ja")) && !sub(array("a+"),array("Ja"),blank(0),0) && pr2(array("+"),array("Ja"),blank(0),array("+"),array("ata"),blank(0),$text)!==$text  )
{
    $text=pr2(array("+"),array("Ja"),blank(0),array("+"),array("ata"),blank(0),$text);
	storedata('7.1.5','sa',0);
}
/* UrNotezca pratiSedho vaktavyaH (vA) */
// Pending. Not giving proper results. Am pratyaya not functioning well.
if ($lakAra==="liw" && ends(array($fo),array("UrRuY"),4) )
{
	storedata('3.1.36-6','sa',0);
}
/* ijAdezca gurumato'nRcCaH (3.1.36) */
elseif ($lakAra==="liw" && (arr(array($verb_without_anubandha),'/^[IUFXeEoO]/') || arr(array($verb_without_anubandha),'/^[iufx]['.pc('hl').']['.pc('hl').']/')) && !ends(array($fo),array("fCa!"),4) )
{
    $text=pr2(array("+"),$tiG,blank(0),array("+Am+"),$tiG,blank(0),$text);
    $text=pr2(array("+"),array("eS","e","irec","ire"),blank(0),array("+Am+"),array("eS","e","irec","ire"),blank(0),$text);
	storedata('3.1.36','sa',0);
}
/* dayAyAysazca (3.1.37) */
elseif ($lakAra==="liw" && ends(array($fo),array("daya!","aya!","Asa!"),4) )
{
    $text=two(array("+"),$tiG,array("+Am+"),$tiG,0);
	storedata('3.1.37','sa',0);
}
/* uSavidajAgRbhyo'nyatarasyAm (3.1.38) */
elseif ($lakAra==="liw" && ends(array($fo),array("uza!","vida!","jAgf"),4) )
{
    //$text=two(array("+"),$tiG,array("+Am+"),$tiG,1);
	// Pending to make this optional. See https://github.com/drdhaval2785/SanskritVerb/issues/384
	$text=two(array("+"),$tiG,array("+Am+"),$tiG,0);
	storedata('3.1.38','sa',0);
}
/* bhIhrIbhRhuvAM zluvacca (3.1.39) */
elseif ($lakAra==="liw" && ends(array($fo),array("YiBI","hrI","quBfY","hu"),4) )
{
    $text=two(array("+"),$tiG,array("+Am+"),$tiG,1);
	storedata('3.1.39','sa',0);
	$zluvat=1;
	zlu();
}
/* kAspratyayAdAmamantre liTi (3.1.35) */
elseif ($lakAra==="liw" && $veda===0 && (anekAca($verb_without_anubandha) || $sanAdi!=='' || $verbset==="curAdi" || $fo==="kAsf!") )
{
    $text=two(array("+"),$tiG1,array("+Am+"),$tiG1,0);
    $text=two(array("+Am+Am+"),$tiG1,array("+Am+"),$tiG1,0);
	storedata('3.1.35','sa',0);
	if(arr($text,'/[a][+]Am/')) // For gopAya+Am
	{
		$text = one(array("a+Am"),array("+Am"),0);
		storedata('6.1.101','sa',0);
	}
}
/* curAdi Ric handling */
if (arr($text,'/\+Ric\+/'))
{
	/* ata upadhAyAH (7.2.116) */
	// more on enumeration kind. Not used regexes deliberately.
	if ( $atolopa!==1 && $Naugami!==1 && $jAgro!==1 && arr($text,'/[a]['.pc('hl').'][+][R][i]c[+]/') && !(arr(array($verb_without_anubandha),'/^['.pc('hl').']/')&&$caG===1))
	{
		$text = three(array("a"),$hl,array("+Ric+"),array("A"),$hl,array("+Ric+"),0);
		storedata('7.2.116','sa',0);
	}
	/* mitAM hrasvaH (6.4.92) */ 
	if ( in_array($fo,$mitcurAdiverbs) && ($verbset === "curAdi" || $verbset === "none" ) && sub(array("A"),$hl,array("+Ric+"),0))
	{
		$text = three(array("A"),$hl,array("+Ric+"),array("a"),$hl,array("+Ric+"),0);
		$text = one(array("cap+Ric"),array("cAp+Ric"),0);
		storedata('6.4.92','sa',0);
	}
	if ( in_array($fo,$ghaTAdi_mit) && ($verbset === "BvAdi" || $verbset === "none" ) && sub(array("A"),$hl,array("+Ric+"),0) )
	{
		$text = three(array("A"),$hl,array("+Ric+"),array("a"),$hl,array("+Ric+"),0);
		storedata('6.4.92','sa',0);
	} 
	if(arr($text,'/['.pc('ac').'][!]/'))
	{
		storedata('1.3.2','pa',0);			
		$text = two($ac,array('!'),blank(count($ac)),array(''),0);
		storedata('1.3.9','sa',0);			
	}
	if(arr($text,'/\+Ric\+S/'))
	{
		storedata('1.3.8','pa',0);
	}
	if (arr($text,'/^['.pc('hl').']/') && $caG===1)
	{
		$text = one(array("+Ric+"),array("+"),0);
		storedata('6.4.51','sa',0);
	}
	storedata('1.3.3','pa',0);
	storedata('1.3.7','pa',0);
	$text=one(array('+Ric+caN+'),array('i+a+'),0);
	$text = one(array("+Ric+"),array("+i+"),0);
	$text = one(array("+caN+"),array("+a+"),0);
	storedata('1.3.9','sa',0);
	/* ato lopaH (6.4.48) */
	if ( arr($text,'/ai[+]/') && in_array($fo,$curAdi_adanta) && ($verbset==="none"||$verbset==="curAdi"))
	{
		if ($ardhadhatuka===1 && $id_dhAtu==="aniw")
		{
			$text = one(array("ai+"),array("a+"),0);
			storedata('6.4.51','sa',0);			
		}
		$text = one(array("a+i+"),array("i+"),0);
		//$text = three(array("a+"),$vikaraNa_ArdhadhAtuka_pratyayas,$tiG1,array(""),$vikaraNa_ArdhadhAtuka_pratyayas,$tiG1,0);
		//$text = pr2(array("a+"),$ArdhadhAtuka_pratyayas,blank(0),array("+"),$ArdhadhAtuka_pratyayas,blank(0),$text);
		if (in_array($fo,$curAdi_adanta))
		{
			$text = one(array("ai+"),array("i+"),0);
		}
		$text = one(array("Ay+sya",),array("Aya+sya"),0);
		storedata('6.4.48','sa',0);
		$atolopa=1;
	}
	if (arr($text,'/a\+i\+/') && $lakAra!=="luN")
	{
		$text = one(array("a+i+"),array("i+"),0);
		storedata('6.4.48','sa',0);
	}
	/* pugantalaghUpadhasya ca (7.3.86) and sArvadhAtukArdhadhAtukayoH (7.3.84) */
	if (arr($text,'/[iufx](['.pc('hl').']{1})\+i\+/' ) && $caG!==1 && $aG!==1)
	{
		$hlam=array();
		foreach ($hl as $av) {$hlam[] = $av."+i+";}
		$text=three(array("i","u","f","x"),$hl,array("+i+"),array("e","o","ar","al"),$hl,array("i+"),0);
		$text=three(array("i","u","f","x"),$hl,$hlam,array("e","o","ar","al"),$hl,$hlam,0);
		storedata('7.3.86','sa',0);
	}
	if(arr($text,'/['.pc('hl').']([+]*)i\+/') && !in_array($lakAra,array("ASIrliN")) && $caG!==1 && $aG!==1)
	{
		$text=two($hl,array("+i+"),$hl,array("e+"),0);
		$text=two($hl,array("i+"),$hl,array("e+"),0);
		storedata('7.3.84','sa',0);
		if (arr($text,'/e\+['.pc('ac').']/'))
		{
			$text=two(array("e+"),$ac,array("ay+"),$ac,0);
			storedata('6.1.78','sa',0);			
		}
	}
}
/* AmaH (2.4.81) and kRJcAnuprayujyate liTi (3.1.40) */
if ($lakAra==="liw" && sub(array("+Am+"),$tiG1,blank(0),0) )
{
	$beforeampratyaya = $text;
	$text = two(array("+Am+"),$tiG,array("+Am+"),blank(count($tiG)),0);
	storedata('2.4.81','sa',0);
	$text = $beforeampratyaya;
	$text=one(array("+Am+"),array("+Am+kf+"),0);
	//$text=one(array("+Am+kf+"),array("+Am+BU+"),1); // Trying for kf only right now.
	//$text=one(array("+Am+kf+"),array("+Am+as+"),1);
	storedata('3.1.40','sa',0);
	if (arr($text,'/[i][+]Am[+]/'))
	{
		$text = change('/[i][+]Am[+]/','e+Am+');
		storedata('7.3.84','sa',0);
		$text = change('/e[+]Am[+]/','ayAm+');
		storedata('6.1.78','sa',0);
	}
	$kaspratyaya=1;
	$text = one(array("+Am+"),array("Am+"),0);
	$val=array();
	foreach ($text as $mem)
	{
		$sp = explode("+",$mem);
		$val[] = str_replace($sp[0]."+","",$mem);
	}
	$us=$us.$sp[0];
	$text=$val;
	$fo="qukfY";
	$verb_without_anubandha="kf";
}
/* asaMyogAlliT kit (1.2.5) */
if (!arr(array($verb_without_anubandha),'/['.pc('hl').']['.pc('hl').']$/') && $lakAra==="liw" && !in_array($so,array("tip","sip","mip")))
{
	storedata('1.2.5','pa',0);
	$it = array_merge($it,array("k"));
	$itpratyaya = array_merge($itpratyaya,array("k"));
}
/* asaMyogAlliT kit (1.2.5) */
if ($verb_without_anubandha==="cakz" && $lakAra==="liw" && !in_array($so,array("tip","sip","mip")))
{
	storedata('1.2.5','pa',0);
	$it = array_merge($it,array("k"));
	$itpratyaya = array_merge($itpratyaya,array("k"));
}	
if ($debug===1) {dibug("1800");}
/* jho'ntaH (7.1.3) */
if (in_array($so,array("Ji")) && arr($text,'/Ji$/') && $lakAra!=="liw") // because liTastajhayorezirec.
{
    $text=two(array("+"),array("Ji"),array("+"),array("anti"),0);
	storedata('7.1.3','sa',0);
}
/* parasmaipadAnAM NalatususthalthusaNalvamAH (3.4.82) */
if ($lakAra==="liw" && in_array($so,$tis) )
{
	$text = two(array("+"),array("Tas","Ta","tip","tas","Ji","sip","mip","vas","mas",),array("+"),array("aTus","a","Ral","atus","us","Tal","Ral","va","ma"),0);
	storedata('3.4.82','sa',0);
}
if ($lakAra==="liw")
{
	if (in_array($so,array("tip","tas","Ji","Tas","Ta","mip","ta","AtAm","Ja","ATAm","iw"))) {$id_pratyaya="aniw";}
}
$svAdiajanta=array("zuY","ziY","SiY","qumiY","ciY","stfY","kfY","vfY","DuY","dUY","wudu","hi","pf","spf","df","ri","kzi","ciri","jiri");
$svAdihalanta=array_diff($svAdi,$svAdiajanta);
/* aniditAM hala upadhAyAH kGiti (6.4.24) */ 
if ( in_array($fo,$aniditverbs) && sub(array("+"),array("Syan","Sna","SnA","Snu","Sa"),array("+"),0)  && $so!=="mahiN" && !in_array("i",$it) && $verbset!=="ruDAdi" && $aniditAm!==1)
{
	storedata('1.2.4','pa',0);
	$it = array_merge($it,array("N")); $itpratyaya = array_merge($itpratyaya,array("N")); $Git=1;
    $text = three(array("N","Y","R","n","m","M"),$hl,array("+","a!+","i!r+","u!"),array("","","","","","",),$hl,array("+","a!+","i!r+","u!"),0);
	storedata('6.4.24','sa',0);
    $aniditAm = 1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
}
/* aniditAM hala upadhAyAH kGiti (6.4.24) */ 
/*if ( in_array($fo,$aniditverbs) && sub(array("+Sap",),array("+"),$apit_sArvadhAtuka_pratyayas,0)  && !in_array("i",$it))
{
    $text = three(array("N","Y","R","n","m","M"),$hl,array("+","a!+","i!r+","u!"),array("","","","","","",),$hl,array("+","a!+","i!r+","u!"),0);        
	storedata('6.4.24','sa',0);
    $aniditAm = 1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
}*/ // See https://github.com/drdhaval2785/SanskritVerb/issues/278
/* ze tRmphAdInAM numvAcyaH (vA) */ 
if ( sub(array("tfP","tuP","dfP","fP","guP","uB","SuB","tup","tfh"),array("+Sa+"),blank(0),0) )
{
    $text = two(array("tfP","tuP","dfP","fP","guP","uB","SuB","tup","tfh"),array("+Sa+"),array("tfmP","tumP","dfmP","fmP","gumP","umB","SumB","tump","tfnh"),array("+Sa+"),0);        
	storedata('7.1.59-1','sa',0);
}
/* mInAternigame (7.3.81) */
if (in_array($fo,array("mIN")) && in_array($so,$tiG) && $veda===1 && sub(array("mIN",),$shitpratyaya,blank(0),0) )
{
    $text = two(array("mIN",),$shitpratyaya,array("miN",),$shitpratyaya,1);
	storedata('7.3.81','sa',0);
}
/* separate itsaJjJAprakaraNam for tiGanta (According to sahajabodha text) */
/* lazakvataddhite (1.3.8) */
if (arr($text,'/[+][lSkKgGN]/') && $taddhita === 0  && in_array($so,$tiG) )
{
    it('/([+][lSkKgGN])/');
	storedata('1.3.8','pa',0);
    $text = two(array("+"),array("Sap","Syan","SnA","SAnac","Satf","Snu","Sa"),array("+"),array("ap","yan","nA","Anac","atf","nu","a"),0);
	storedata('1.3.9','sa',0);
}
/* na vibhaktau tusmAH (1.3.4) */
//if (arr($text,'/[tTdDnsm]$/') && $pada=== "pratyaya" && sub(array("+"),$navibhaktau,blank(0),0) && in_array($so,$tiG))
if (arr(array($so),'/[tTdDnsm]$/') && $vibhakti===1 && $tusma!==1)
{
	storedata('1.3.4','sa',0);
    $tusma=1;
}
elseif (arr($text,'/[tTdDnsm]$/') && $vibhakti===1)
{
    $tusma=1;
}
else {$tusma=0; }
$inbetweenpratyaya=array("ap","yan","Ric","RiN","san","IyaN");
$inbetweeenreplace=array("a","ya","Ri","Ri","sa","Iya");
/* halantyam (1.3.3) and tasya lopaH (1.3.9) */
if (in_array($so,$tiG) && arr(array($fo),'/[!]['.pc('hl').']$/') && $nomidelision!==1 && sub(array("!"),$hl,array("+"),0) )
{
	storedata('1.3.3','pa',0);
	$text=three(array("!"),$hl,array("+"),array("!"),blank(count($hl)),array("+"),0);
	storedata('1.3.9','sa',0);
}
/* halantyam (1.3.3) and tasya lopaH (1.3.9) */
// Patch for removal of verb halantyam
if (in_array($so,$tiG) && arr(array($fo),'/['.pc('hl').']$/') && !arr(array($fo),'/i[!]r$/') && !arr(array($fo),'/U[!]z$/') )
{
	storedata('1.3.3','pa',0);
	$text=three($hlplus,$vikaraNa,array("+"),blank1("+",count($hlplus)),$vikaraNa,array("+"),0);
	$text=change('/^([^+]*)['.pc('hl').'][+]/','$1+');
	$text = one(array("i!r"),array("i!"),0);
	$text = change('/(^[^+]+)['.pc('hl').']([+]jus)/','$1$2'); // Check why this was kept here. Gave wrong form of kftI! rudhAdi viDiliN Ji, so commented out
	$text=two($hlplus,array("Ri+"),blank1("+",count($hlplus)),array("Ri+"),0);
	storedata('1.3.9','sa',0);
}
if ($debug===1) {dibug("1900");}
/* halantyam (1.3.3) and tasya lopaH (1.3.9) */
if (in_array($so,$tiG) && (arr($text,'/['.pc('hl').'][+]/') ||sub(array("+"),$inbetweenpratyaya,array("+"),0) || (arr($text,'/['.pc('hl').']$/') && $tusma!==1) || sub($hl,array("+"),$vikaraNa,0) || $rudhAdibhyaH===1 || pr2($hl,array("+"),array("va","ma"),blank(count($hl)),array("+"),array("va","ma"),$text)!==$text) ) # $ad === 1 removed because of https://github.com/drdhaval2785/SanskritVerb/issues/318
{
	$ininin = $text;
	$text=three(array("+"),$inbetweenpratyaya,array("+"),array("+"),$inbetweeenreplace,array("+"),0);
		if ($tusma!==1)
		{
			$text = last($hl,blank(count($hl)),0);
			if ( $so!=="mahiN") {itprat('/(['.flat($hl).']$)/');}
			$text = last($hl,blank(count($hl)),0);   
		}
		if ($nomidelision!==1 && !arr(array($fo),'/i[!]r$/') && $sarvadhatuka===1 ) // Addition of ends function is to prevent application to kF -> kir converted halanta, which are not there in upadeza.
		{
			$text = change('/([+][^+]*)['.pc('hl').']([+]ran)$/','$1R2');
		}
		$text=one(array("+si+","sicmi"),array("+sic+","sic+mi"),0);
		if(preg_match('/['.pc('hl').']$/',$fo) && !arr(array($fo),'/i[!]r$/')) 
		{
			$text=pr2($hl,array("+"),array("va","ma"),blank(count($hl)),array("+"),array("va","ma"),$text);		
		}
		if ($nomidelision!==1 && arr($text,'/['.pc('hl').'][+]([c]*)[a][+]/') && ends(array($fo),'/['.pc('hl').']$/') )
		{
			$text=three($hl,array("+a+","+ca+"),$tiG1,blank(count($hl)),array("+a+","+ca+"),$tiG1,0);
		}
	if ($text!==$ininin)
	{
		$outoutout = $text;
		$text = $ininin;
		storedata('1.3.3','pa',0);
		$text = $outoutout;
		storedata('1.3.9','sa',0);
	}
}
/* cuTU (1.3.7) */
if (arr($text,'/[+][c][a][+]/') && in_array($so,$tiG)) // for caG
{
    it('/([+][c])/');
	storedata('1.3.7','sa',0);
    $text = one(array("+ca+"),array("+a+"),0);
	storedata('1.3.9','sa',0);
}
/* upadeze'janunAsika it (1.3.2)*/ 
// as idit is necessary for numAgama, it is placed here. otherwise with Sap, there is problem in mit function.
if (arr($text,'/['.flat($ac).'][!]/') && in_array($so,$tiG) )
{
	$text = change('/i[!]r[+]/','+');
    it('/(['.flat($ac).'][!])/');
	storedata('1.3.2','pa',0);
    $text = two($ac,array("!"),blank(count($ac)),array(""),0);
	storedata('1.3.9','sa',0);
}
/* asyatesTuk (7.4.17) */
if (in_array($fo,array("asu!")) && sub(array("as"),array("+a+"),blank(0),0) && $lakAra==="luN") 
{
	$text = one(array("as+a+"),array("asT+a+"),0);
	storedata('7.4.17','sa',0);
}
/* vaca um (7.4.20) */
if (in_array($fo,array("vaca!",)) && $lakAra==="luN" && sub(array("vac"),array("+"),array("a+"),0))
{
	$text = one(array("vac+a+"),array("vauc+a+"),0);
	storedata('7.4.20','sa',0);
}
/* zAsa idaGhaloH (6.4.34) */
if ( in_array($fo,array("SAsu!")) && $lakAra==="luN" && sub(array("SAs"),array("+a+"),blank(0),0) )
{
	$text = two(array("SAs"),array("+a+"),array("Sis"),array("+a+"),0);
	storedata('6.4.34','sa',0);
}
/* nazimanyoraliTyetvaM vaktavyam (vA) */
if (in_array($fo,array("RaSa!","mana!")) && sub(array("naS","man"),array("+aN+"),blank(0),0) )
{
	$text = two(array("naS","man"),array("+a+"),array("neS","men"),array("+a+"),1);
	storedata('6.4.120-4','sa',0);
}
/* Patch for aN Agama */
if (arr($text,'/[+]aN[+]/'))
{
	storedata('1.3.3','pa',0);
	$text = one(array("+aN+"),array("+a+"),0);
	storedata('1.3.9','sa',0);
}
/* Nau ca saMzcaGoH (6.1.31) */
if ( $lakAra==="luN" && $luGset===5 && sub(array("Svi"),array("+Ri+"),array("a+"),0) ) 
{
    $text = samprasarana(array("svi",),1);
	storedata('6.1.31','sa',0);
}
/* hvaH samprasAraNam (6.1.32) */
if ( $lakAra==="luN" && $luGset===5 && sub(array("hvA"),array("+Ri+"),array("a+"),0) ) 
{
    $text = samprasarana(array("hvA",),1);
	storedata('6.1.32','sa',0);
}
if ($debug===1) {dibug("2000");}
/* zvayateraH (7.4.18) */
if (in_array($fo,array("wuo!Svi")) && $lakAra==="luN" && sub(array("Svi"),array("+a+"),blank(0),0) )
{
	$text = two(array("Svi"),array("+a+"),array("Sva"),array("+a+"),1); // 1 because of aG and caG both forms.
	storedata('7.4.18','sa',0);
}
/* pataH pum (7.4.19) */
if (in_array($fo,array("patx!")) && $lakAra==="luN" && sub(array("pat"),array("+a+"),blank(0),0) ) 
{
	$text = one(array("pat+a+"),array("papt+a+"),0);
	storedata('7.4.19','sa',0);
}
/* svApezcaGi (6.1.18) */
if (  $lakAra==="luN" && $luGset===5 && sub(array("svap"),array("+Ri+"),array("a+"),0) ) 
{
    $text = samprasarana(array("svap",),0);
	storedata('6.1.18','sa',0);
}
/* Adeca upadeze'ziti (6.1.45) */ 
// special patch for caG.
if ( $luGset===5 && in_array($sanAdi,array("Ric","RiN")) && ends(array($verb_without_anubandha),array("e","o","E","O"),0) && in_array($lakAra,$ArdhadhAtuka_lakAra) && !sub(array("e","o","E","O"),array("+"),$shitpratyaya,0) )
{
    $text=two(array("e","o","E","O"),array("+"),array("A","A","A","A"),array("+"),0);
	$text = two(array("e","o","E","O"),array("+Ri+"),array("A","A","A","A"),array("+Ri+"),0);
	storedata('6.1.45','sa',0);
}
/* hano vadha liGi (2.4.42) */ 
if (in_array($fo,array("hana!")) && $lakAra==="ASIrliN")
{
	$text=two(array("han"),array("+"),array("vaD"),array("+"),0);
	storedata('2.4.42','sa',0);
}
$taGplus=array_merge($taG,array("anta","mahi","ata","i","ran")); // including the altered forms.
/* sArvadhAtuka leT - treatment of pratyayas */
$tiG_noanubandha=array("ti","tas","anti","si","Tas","Ta","mi","vas","mas","te","ite","ante","se","iTe","Dve","e","vahe","mahe","ta","AtAm","anta","TAs","ATAm","Dvam","i","vahi","mahi",);
if (in_array($lakAra,array("sArvaDAtukalew","ArDaDAtukalew")))
{
    /* leTo'DAtau (3.4.94) */
    $text = three(array("+"),blank(0),$tiG_noanubandha,array("+"),array("A"),$tiG_noanubandha,1);
    $text = three(array("+"),blank(0),$tiG_noanubandha,array("+"),array("a"),$tiG_noanubandha,0);
    $text = one(array("aa"),array("a"),0);
	$text = one(array("Aa"),array("A"),0);
    $text = one(array("aA"),array("A"),0);
	storedata('3.4.94','sa',0);
    /* Ata ai (3.4.95) */
    if (pr2(array("+"),array("aite","aiTe","Aite","AiTe"),blank(0),array("+"),array("Ete","ETe","Ete","ETe"),blank(0),$text)!== $text)
    {
    $text = pr2(array("+"),array("aite","aiTe","Aite","AiTe"),blank(0),array("+"),array("Ete","ETe","Ete","ETe"),blank(0),$text);
	storedata('3.4.95','sa',0);
    }
    /* vaito'nyatra (3.4.96) */
    elseif (pr2(array("e"),blank(0),blank(0),array("E"),blank(0),blank(0),$text)!== $text)
    {
    $text = pr2(array("e"),blank(0),blank(0),array("E"),blank(0),blank(0),$text);
	storedata('3.4.96','sa',0);
    }
    /* itazca lopaH parasmaipadeSu (3.4.97) */
    if (pr2(array("ati","anti","asi","ami","Ati","Anti","Asi","Ami"),blank(0),blank(0),array("at","an","as","am","At","An","As","Am"),blank(0),blank(0),$text)!== $text)
    {
    $text1 = pr2(array("ati","anti","asi","ami","Ati","Anti","Asi","Ami"),blank(0),blank(0),array("at","an","as","am","At","An","As","Am"),blank(0),blank(0),$text);
    $text = array_merge($text,$text1);
	storedata('3.4.97','sa',0);
    }
    /* sa uttamasya (3.4.98) */
    if (pr2(array("avas","amas","Avas","Amas"),blank(0),blank(0),array("ava","ama","Ava","Ama"),blank(0),blank(0),$text)!== $text)
    {
    $text1 = pr2(array("avas","amas","Avas","Amas"),blank(0),blank(0),array("ava","ama","Ava","Ama"),blank(0),blank(0),$text);
    $text = array_merge($text,$text1);
	storedata('3.4.98','sa',0);
    }
    /* sibbahulaM leTi (3.1.34) */
    if ($lakAra==="ArDaDAtukalew" && $sanAdi==="")
    {
    $text = one(array("+"),array("+s"),0);
	storedata('3.1.34','sa',0);
    /* sibbahulaM NidvadvaktavyaH (vA) */ 
		storedata('3.1.34-7','sa',0);
        $Nit = 1;
    }
}
/* loTo laGvat (3.4.85) */
if ( $lakAra==="low" && sub(array("+"),array("tas","Tas","Ta","mi","vas","mas"),blank(0),0))
{
    $GitlakAra=array_merge($GitlakAra,array("low"));
    $GitlakAra=array_unique($GitlakAra);
	storedata('3.4.85','sa',0);
}
/* merniH (3.4.89) */
if ( $lakAra==="low" && pr2(array("+"),array("mi"),blank(0),array("+"),array("ni"),blank(0),$text)!==$text)
{
    $text=pr2(array("+"),array("mi"),blank(0),array("+"),array("ni"),blank(0),$text);
	storedata('3.4.89','sa',0);
}
/* tasthasthamipAM tAMtaMtAmaH (3.4.101) */
if (in_array($lakAra,$GitlakAra) && in_array($so,$tiG) && pr2(array("+"),array("tas","Tas","Ta","mi"),blank(0),array("+"),array("tAm","tam","ta","am"),blank(0),$text)!==$text )
{
    $text=pr2(array("+"),array("tas","Tas","Ta","mi"),blank(0),array("+"),array("tAm","tam","ta","am"),blank(0),$text);
	storedata('3.4.101','sa',0);
}
if ($debug===1) {dibug("2100");}
/* nityaM GitaH (3.4.99) */
if ( in_array($lakAra,$GitlakAra) && pr2(array("+"),array("vas","mas"),blank(0),array("+"),array("va","ma"),blank(0),$text)!==$text )
{
    $text=pr2(array("+"),array("vas","mas"),blank(0),array("+"),array("va","ma"),blank(0),$text);
	storedata('3.4.99','sa',0);
}
/* liGaH sIyuT (3.4.102) */
if ( in_array($lakAra,array("viDiliN","ASIrliN")) && in_array($so,$taGplus) )
{
    $text=pr2(array("+"),$taGplus,blank(0),array("+sIy+"),$taGplus,blank(0),$text);
	storedata('3.4.102','sa',0);
	$sIyuT=1;
} else { $siyuT=0; }
$tisremoved=array("ti","tas","anti","jus","si","Tas","Ta","mi","vas","mas","tAm","tam","ta","am","va","ma");
/* yAsuT parasmaipadeSUdAtto Gicca (3.4.103) */
if ( in_array($lakAra,array("viDiliN","ASIrliN")) && in_array($so,$tis) )
{
    $text=pr2(array("+"),$tisremoved,blank(0),array("+yAsuw+"),$tisremoved,blank(0),$text);
	storedata('3.4.103','sa',0);
	storedata('1.3.3','pa',0);
	$text=one(array("yAsuw"),array("yAsu"),0);
	storedata('1.3.9','sa',0);
	storedata('1.3.2','pa',0);
	$text=one(array("+yAsu+"),array("+yAs+"),0);
	storedata('1.3.9','sa',0);
	$Git=1;
	$yAsuT = 1;
	$itpratyaya=array_merge($itpratyaya,array("N")); $it=array_merge($it,array("N")); 
	/* kidAziSi (3.4.104) */
	if ( in_array($lakAra,array("ASIrliN")) && in_array($so,$tis) )
	{
		storedata('3.4.104','sa',0);
		$Git=0;
		$kit = 1; $itpratyaya=array_merge($itpratyaya,array("k")); $it=array_merge($it,array("k")); 
		$kGiti = 1;
		storedata('1.1.5','sa',0);
	}
} else {$yAsuT=0;}
/* suT tithoH (3.4.107) */
if ( in_array($lakAra,array("viDiliN","ASIrliN")) && sub(array("+"),array("t","T","At","AT"),blank(0),0)  )
{
    $text=two(array("+"),array("t","T","At","AT"),array("+"),array("st","sT","Ast","AsT"),0);
	storedata('3.4.107','sa',0);
    /* liGaH salopo'nantyasya (7.2.79) */
    if ( in_array($lakAra,array("viDiliN")) && sub(array("+yAs+"),array("s"),$al,0))
    {
        $text=three(array("+yAs+"),array("s"),$al,array("+yA+"),array(""),$al,0);
		storedata('7.2.79','sa',0);
    }
    if ( in_array($lakAra,array("viDiliN")) && pr2(array("sIy+s"),$taG,blank(0),array("Iy+"),$taG,blank(0),$text)!== $text )
    {
        $text=pr2(array("sIy+s"),$taG,blank(0),array("Iy+"),$taG,blank(0),$text);
		storedata('7.2.79','sa',0);
	}
}
/* liGaH salopo'nantyasya (7.2.79) */
if ( in_array($lakAra,array("viDiliN")) && sub(array("+yAs+"),blank(0),blank(0),0))
{
	$text=one(array("+yAs+"),array("+yA+"),0);
	storedata('7.2.79','sa',0);
}
if ( in_array($lakAra,array("viDiliN")) && sub(array("sIy+As","sIy+"),blank(0),blank(0),0) )
{
	$text=one(array("sIy+As","sIy+"),array("Iy+A","Iy+"),0);
	storedata('7.2.79','sa',0);
}
/* iTo't (3.4.106) */
if ( in_array($lakAra,array("viDiliN","ASIrliN")) && sub(array("+Iy+i","+sIy+i"),array(""),blank(0),0))
{
    $text=two(array("+Iy","+sIy"),array("+i"),array("+Iy","+sIy"),array("+a"),0);
	storedata('3.4.106','sa',0);
}
/* ato yeyaH (7.2.80) */
if ( in_array($lakAra,array("viDiliN")) && sub(array("a+yA"),array("+"),blank(0),0))
{
    $text=three(array("a+yA"),array("+"),blank(0),array("a+iy"),array("+"),blank(0),0);
	storedata('7.2.80','sa',0);
	if (arr($text,'/\+jus$/'))
	{
		storedata('1.3.7','pa',0);
		$text=one(array('+jus'),array('+us'),0);
		storedata('1.3.9','sa',0);
	}
}
$bhUsuvo=0;
/* itazca (3.4.100) */
$itazca=0; 
if ( in_array($lakAra,array("laN","viDiliN","ASIrliN","luN","lfN",)) && $start===1 && pr2(array("+"),array("ti","anti","si","mi"),blank(0),array("+"),array("t","ant","s","m"),blank(0),$text)!==$text )
{
    $text=pr2(array("+"),array("ti","anti","si","mi"),blank(0),array("+"),array("t","ant","s","m"),blank(0),$text);
	storedata('3.4.100','sa',0);
	$itazca=1;
}
// Patch for akzU! dhAtu. See https://github.com/drdhaval2785/SanskritVerb/issues/213
if (arr($text,'/akz\+nu\+s$/'))
{
	$text=one(array("akz+nu+s"),array("akz+nu+si"),0); 
}
/* liTastajhayorezirec (3.4.81) */
if ($lakAra==="liw" && pr2(array("+"),array("ta","Ja"),blank(0),array("+"),array("e","ire"),blank(0),$text)!==$text)
{
    $text=pr2(array("+"),array("ta","Ja"),blank(0),array("+"),array("e","ire"),blank(0),$text);
	storedata('3.4.81','sa',0);
}
/* eruH (3.4.86) */
if ( $lakAra==="low" && pr2(array("+"),array("ti","anti"),blank(0),array("+"),array("tu","antu"),blank(0),$text)!==$text)
{
    $text=pr2(array("+"),array("ti","anti"),blank(0),array("+"),array("tu","antu"),blank(0),$text);
	storedata('3.4.86','sa',0);
}
/* serhyapicca (3.4.87) */
if ( $lakAra==="low" && pr2(array("+"),array("si"),blank(0),array("+"),array("hi"),blank(0),$text)!==$text )
{
    $text=pr2(array("+"),array("si"),blank(0),array("+"),array("hi"),blank(0),$text);
	storedata('3.4.87','sa',0);
}
/* AtmanepadeSvanataH (7.1.5) */
if ( in_array($so,array("Ja")) && preg_match('/[A]$/',$verb_without_anubandha) && ends(array("Sap","Sa"),$vik,2) && pr2(array("+"),array("Ja"),blank(0),array("+"),array("ata"),blank(0),$text)!==$text)
{
    $text=pr2(array("+"),array("Ja"),blank(0),array("+"),array("ata"),blank(0),$text);
	storedata('7.1.5','sa',0);
}
/* Patch to prevent Ato GitaH (7.2.81) in gAN etc*/
// See https://github.com/drdhaval2785/SanskritVerb/issues/421
if ( arr($text,'/A[+]a[+][Aai]/') && in_array($so,$tiG) )
{
	$text = one(array("A+a+A","A+a+a","A+a+i"),array("A+A","A+a","A+i"),0);
	storedata('6.1.9','sa',0);
	$set=2;
}
if ($debug===1) {dibug("2200");}
/* thAsasse (3.4.80) */
if ( $pada === "pratyaya" && in_array($so,array("TAs")) && in_array($lakAra,array("law","liw","luw","lfw","sArvaDAtukalew","ArDaDAtukalew","low")) && sub(array("+"),array("TAs","saTAs","sATAs"),blank(0),0) )
{
    $text=one(array("+TAs","+saTAs","+sATAs"),array("+se","+sase","+sAse"),0);
	storedata('3.4.80','sa',0);
}
/* Tita AtmanepadAnAM Tere (3.4.79) */
//elseif (sub(array("+"),$taGplus,blank(0),0) && in_array($so,$taG) && in_array($lakAra,array("law","liw","luw","lfw","sArvaDAtukalew","ArDaDAtukalew","low")) && $jhasyaran!==1)
elseif ( in_array($so,$taG) && in_array($lakAra,array("law","liw","luw","lfw","sArvaDAtukalew","ArDaDAtukalew","low")) && $jhasyaran!==1)
{
    for($i=0;$i<count($text);$i++)
    {
        $text[$i]=Ti1($text[$i])."e";
    }
	storedata('3.4.79','sa',0);
}
/* vaito'nyatra (3.4.96) */
if (in_array($lakAra,array("sArvaDAtukalew","ArDaDAtukalew")) && pr2(array("e"),blank(0),blank(0),array("E"),blank(0),blank(0),$text)!== $text )
{
	$text1 = pr2(array("e"),blank(0),blank(0),array("E"),blank(0),blank(0),$text);
	$text = array_merge($text,$text1);
	storedata('3.4.96','sa',0);
}
/* eta ai (3.4.93) */
if ( $lakAra==="low" && pr2(array("+"),array("e","vahe","mahe"),blank(0),array("+"),array("E","vahE","mahE"),blank(0),$text)!==$text)
{
    $text=pr2(array("+"),array("e","vahe","mahe"),blank(0),array("+"),array("E","vahE","mahE"),blank(0),$text);
	storedata('3.4.93','sa',0);
}
/* savAbhyAM vAmau (3.4.91) */
if ( $lakAra==="low" && pr2(array("se","ve"),array(""),blank(0),array("sva","vam"),array(""),blank(0),$text)!==$text )
{
    $text=pr2(array("se","ve"),array(""),blank(0),array("sva","vam"),array(""),blank(0),$text);
	storedata('3.4.91','sa',0);
}
/* itazca (3.4.100) */
if ( in_array($so,$tis) && !sub(array("+"),array("hi","ni"),blank(0),0) && pr2(array("i"),array(""),blank(0),array(""),array(""),blank(0),$text)!==$text && in_array($lakAra,$GitlakAra) )
{
    $text=pr2(array("i"),array(""),blank(0),array(""),array(""),blank(0),$text);
	storedata('3.4.100','sa',0);
    $itazca=1;
} else {$itazca=0; }
/* astisico'pRkte (7.3.96) */
// sic
if ( ($sic!==0 && arr($text,'/[+][s][i][c]([+]*)['.pc('hl').']$/')))
{
	$text = two(array("+sic",),$hl,array("+sic+I"),$hl,0);
	storedata('7.3.96','sa',0);
}
/* Am etaH (3.4.90) */
if ( $lakAra==="low" && pr2(array("e"),array(""),blank(0),array("Am"),array(""),blank(0),$text)!==$text)
{
    $text=pr2(array("e"),array(""),blank(0),array("Am"),array(""),blank(0),$text);
	storedata('3.4.90','sa',0);
}
/* tuhyostAtaGGAziSyanyatarsyAm (7.1.35) */
if (  in_array($so,$tiG) && pr2(array("+"),array("tu","hi"),blank(0),array("+"),array("tAt","tAt"),blank(0),$text)!==$text)
{
    $text1=pr2(array("+"),array("tu","hi"),blank(0),array("+"),array("tAt","tAt"),blank(0),$text);
    $text = array_merge($text,$text1);
	storedata('7.1.35','sa',0);
}
/* ancu definitions */
if ($_GET['cond1_13_1']==="1")
{
    $kvin=1;
    $nance=1; // 0 - nAJceH pUjAyAm (6.4.30) will not apply. 1 - nAJceH pUjAyAm (6.4.30) will apply.
    $ancu=1; 
}
elseif ($_GET['cond1_13_1']==="2" )
{
    $kvin=1;
    $nance=0;
    $ancu=1; // 0 - no ancu verb. 1 - ancu verb.
}
elseif ($_GET['cond1_13']==="2")
{
    $kvin=0;
    $ancu=0;
}
elseif($number==="01.0998") // See https://github.com/drdhaval2785/SanskritVerb/issues/295
{
	$ancu=2;
}
/* Che ca (6.1.73) */
if (sub($hrasva,array("C"),blank(0),0) && in_array($so,$tiG) )
{
	$text = two(array("a","i","u","f","x"),array("C"),array("at","it","ut","ft","xt"),array("C"),0);
	storedata('6.1.73','sa',0);
	// separate patch for asthetic value.
	$text = one(array("tC"),array("cC"),0);
	storedata('8.4.40','sa',0);
}
if ($debug===1) {dibug("2300");}
/* syatAsI lRlutoH (3.1.33) */
if ( in_array($lakAra,array("lfw","lfN")) && pr2(array("+"),blank(0),$tiG1,array("+"),array("sya"),$tiG1,$text)!==$text)
{
    $text=pr2(array("+"),blank(0),$tiG1,array("+"),array("sya"),$tiG1,$text);
	storedata('3.1.33','sa',0);
	$syatAsI=1;
} else {$syatAsI = 0; }
/* syatAsI lRlutoH (3.1.33) */
if (  in_array($lakAra,array("luw")) && pr2(array("+"),blank(0),$tiG1,array("+"),array("tAs+"),$tiG1,$text)!==$text )
{
    $text=pr2(array("+"),blank(0),$tiG1,array("+"),array("tAs+"),$tiG1,$text);
	storedata('3.1.33','sa',0);
	$tAs=1;
} else { $tAs=0; }
/* luTaH prathamasya DAraurasaH (2.4.85) */
if ( in_array($lakAra,array("luw")) && $tAs===1 && pr2(array("+"),array("tAs+"),array("ti","tas","anti","te","Ate","ante"),array("+"),array("tAss+"),$tiG1,$text)!==$text )
{
    $text=pr2(array("+"),array("tAs+"),array("ti","tas","anti","te","Ate","ante"),array("+"),array(""),array("tAs+qA","tAs+rO","tAs+ras","tAs+qA","tAs+rO","tAs+ras",),$text);
	storedata('2.4.85','sa',0);
	if (arr($text,'/tAs\+qA/'))
	{
		storedata('1.3.7','pa',0);	
		$text=one(array("tAs+qA"),array("tAs+A"),0);
		storedata('1.3.9','sa',0);
		$text=one(array("tAs+A"),array("tA"),0);
		storedata('2.4.85-7','sa',0);
	}
	$syatAsI=1;
}
/* tAsastyorlopaH (7.4.50) */
elseif ( $lakAra==="luw" && $tAs===1 && sub(array("tAs"),array("+"),array("s"),0) )
{
    $text=three(array("tAs"),array("+"),array("s"),array("tA"),array(""),array("s"),0);
	storedata('7.4.50','sa',0);
}
/* dhi ca (8.2.25) */
elseif ( $lakAra==="luw" && $tAs===1 && sub(array("tAs"),array("+"),array("D"),0) )
{
    $text=three(array("tAs"),array("+"),array("D"),array("tA"),array(""),array("D"),0);
	storedata('8.2.25','sa',0);
}
/* ha eti (7.4.52) */
elseif ( $lakAra==="luw" && $tAs===1 && pr2(array("tAs"),array("+"),array("e"),array("tAh"),array(""),array("e"),$text)!==$text )
{
    $text=pr2(array("tAs"),array("+"),array("e"),array("tAh"),array(""),array("e"),$text);
	storedata('7.4.52','sa',0);
}
else // removing + after tAs pratyaya in other cases, because it leaves another + which interferes with the iDAgama prakriyA in our code.
{
    $text=two(array("tAs"),array("+"),array("tAs"),array(""),0);
}
/* ri ca (7.4.51) */
if ( $lakAra==="luw" && $tAs===1 && pr2(array("+"),array("tAs+rO","tAs+ras"),blank(0),array("+"),array("tArO","tAras"),blank(0),$text)!==$text )
{
    $text=pr2(array("+"),array("tAs+rO","tAs+ras"),blank(0),array("+"),array("tArO","tAras"),blank(0),$text);
	storedata('7.4.51','sa',0);
}
/* ato guNe patch for syatAsI */
if (sub(array("+"),array("sya"),array("a","e","o"),0))
{
    $text=three(array("+"),array("sya"),array("a","e","o"),array("+"),array("sy"),array("a","e","o"),0);
	storedata('6.1.97','sa',0);
}
/* ksasyAci (7.3.72) */
if ( in_array($so,$tiG) && $ksa===1 && sub(array("+sa+"),$ac,blank(0),0) ) 
{
    $text=two(array("+sa+"),$ac,array("+s+"),$ac,0);
	storedata('7.3.72','sa',0);
}
/* lugvA duhadihalihaguhAmAtmanepade dantye (7.3.73) */
if ( $ksa===1 && $luGset===7 && in_array($so,$taG)  && in_array($fo,array("duha!","diha!","liha!","guhU!")) && sub(array("duh","dih","lih","guh",),array("+sa+"),array("t","T","d","D","n","v",),0) )
{
    $text = three(array("duh","dih","lih","guh",),array("+sa+"),array("t","T","d","D","n","v",),array("duh","dih","lih","guh",),array("+"),array("t","T","d","D","n","v",),1);
	storedata('7.3.73','sa',0);
}
/* AtmanepadeSvanataH (7.1.5) */
if ( in_array($so,array("Ja")) && $set===2 && pr2(array("+"),array("Ja"),blank(0),array("+"),array("ata"),blank(0),$text)!==$text)
{
    $text=pr2(array("+"),array("Ja"),blank(0),array("+"),array("ata"),blank(0),$text);
	storedata('7.1.5','sa',0);
}
/* Ato GitaH (7.2.81) */
if ( arr($text,'/[a][+][A]/') && in_array($so,$tiG) ) // bad
{
    $text=two(array("a"),array("+A"),array("a"),array("+iy+"),0);
	storedata('7.2.81','sa',0);
}
/* Ato GitaH (7.2.81) */
if ( arr($text,'/[s][y][a][A]/') && in_array($so,$tiG) ) // bad
{
    $text=two(array("sya"),array("A"),array("sya"),array("+iy+"),0);
	storedata('7.2.81','sa',0);
}
/* ADuttamasya picca (3.4.92) */
if ( $lakAra==="low" && pr2(array("+"),array("ni","va","ma","E","vahE","mahE"),blank(0),array("+"),array("Ani","Ava","Ama","AE","AvahE","AmahE"),blank(0),$text)!==$text )
{
    $text=pr2(array("+"),array("ni","va","ma","E","vahE","mahE"),blank(0),array("+"),array("Ani","Ava","Ama","AE","AvahE","AmahE"),blank(0),$text);
	storedata('3.4.92','sa',0);
    $Agama=array("Aw");   
}
/* akaH savarNe dIrghaH (6.1.101) patch for syatAsI */ 
if (sub(array("+sya"),array("A"),blank(0),0))
{
	$text = two(array("+sya"),array("A"),array("+syA"),blank(1),0);
	storedata('6.1.101','sa',0);
}    
/* ato dIrgho yaJi (7.3.101) patch for sya */
// for sya Agama.
if (sub(array("sya"),array("mi","v","ma"),blank(0),0) && $pada === "pratyaya" && in_array($so,$tiG) )
{
    $text = two(array("sya"),array("mi","v","ma"),array("syA"),array("mi","v","ma"),0);
	storedata('7.3.101','sa',0);
}
if ($debug===1) {dibug("2400");}
/* patch to append sIyuT if vowel follows it. */
$text = two(array("sIy+"),$ac,array("sIy"),$ac,0);
/* luGi vA daridrAterArdhadhAtuke vivakSite Alopo vAcyaH (vA) */
if ( in_array($fo,array("daridrA")) && $ardhadhatuka===1 && $lakAra==="luN" && sub(array("daridrA"),array("+"),blank(0),0))
{
    $text=one(array("daridrA+"),array("daridr+"),1);
	storedata('6.4.114-1','sa',0);
}
/* dayaterdigi liTi (7.4.9) */ 
if (in_array($fo,array("daya!")) && $lakAra==="liw")
{
	$text=three(array("day"),array("+"),$tiG1,array("digi"),array("+"),$tiG1,0);
	storedata('7.4.9','sa',0);
}
/* veJo vayiH (2.4.41) */ 
if (in_array($fo,array("veY")) && $lakAra==="liw")
{
	$text=three(array("ve"),array("+"),$tiG1,array("vay"),array("+"),$tiG1,1);
	storedata('2.4.41','sa',0);
	if (in_array($so,array("TAs","Dvam","vahi","mahiN")) ) { $id_dhAtu="sew"; } // see p 335 sahajabodha part 2.
}
/* iDatyarttivyayatInAm (7.2.66) */ 
if (in_array($fo,array("vyeY","f","iqa!")) && $lakAra==="liw" && $so==="sip")
{
	storedata('7.2.66','sa',0);
	$id_dhAtu="sew";
}
/* vibhASA sRjidRzoH (7.2.65) */ 
if (in_array($fo,array("sfja!","dfSi!r")) && $lakAra==="liw" && $so==="sip")
{
	storedata('7.2.65','sa',0);
	$id_dhAtu="vew";
}
/* na vyo liTi (6.1.46) */ 
if (in_array($fo,array("vyeY")) && $lakAra==="liw")
{
	storedata('6.1.46','sa',0);
}
/* Adeca upadeze'ziti (6.1.45) */ 
elseif (in_array($lakAra,$ArdhadhAtuka_lakAra) && ends(array($verb_without_anubandha),array("e","o","E","O"),0) && !sub(array("e","o","E","O"),array("+"),$shitpratyaya,0))
{
    $text=two(array("e","o","E","O"),array("+"),array("A","A","A","A"),array("+"),0);
	$text = two(array("e","o","E","O"),array("+Ri+"),array("A","A","A","A"),array("+Ri+"),0);
	storedata('6.1.45','sa',0);
}
/* Ata au NalaH (7.1.34) */
if ($lakAra==="liw" && in_array($so,array("tip","mip")) && arr($text,'/A[+]Ra/') )
{
	$text = two(array("A+"),array("Ra",),array("A+"),array("O"),0);
	storedata('7.1.34','sa',0);
}
/* kRJo'suTa iti vaktavyam (vA) */
if (in_array($fo,array("qukfY")) && $lakAra==="liw" && in_array($so,array("sip","vas","mas","se","Dve","vahiN","mahiN")) && $us==="sam")
{
	$id_dhAtu="sew";
	storedata('7.2.13-1','sa',0);
}
 /* kRsRbhRvRstudrusruzruvo liTi (7.2.13) */
elseif (in_array($fo,array("qukfY","sf","quBfY","vfN","vfY","zwuY","dru","sru","Sru")) && $lakAra==="liw" && in_array($so,array("sip","vas","mas","TAs","Dvam","vahi","mahiN")))
{
	$id_dhAtu="aniw";
	storedata('7.2.13','sa',0);
}
/* acastAsvatthalyaniTo nityam (7.2.61) and Rto bhAradvAjasya (".link_sutra("7.2.63").") */
elseif (arr(array($verb_without_anubandha),'/[aAiIuUFeEoO]$/') && $id_dhAtu==="aniw" && $lakAra==="liw" && in_array($so,array("sip")))
{
	$id_dhAtu="vew";
	$thalyaniT=1;
	storedata('7.2.61','sa',0);
	storedata('7.2.63','sa',0);
}
/* kRsRbhRvRstudrusruzruvo liTi (7.2.13) */
elseif (!in_array($fo,array("qukfY","sf","quBfY","vfN","vfY","zwuY","dru","sru","Sru")) && $lakAra==="liw" && in_array($so,array("sip","vas","mas","TAs","Dvam","vahi","mahiN")))
{
	$id_dhAtu="sew";
	storedata('7.2.13-krAdiniyamaH','sa',0);
}
/* upadeze'tvataH (7.2.62) and Rto bhAradvAjasya (7.2.63) */
elseif (arr(array($verb_without_anubandha),'/[a]/') && $id_dhAtu==="aniw" && $lakAra==="liw" && in_array($so,array("sip")))
{
	$id_dhAtu="vew";
	$thalyaniT=1;
	storedata('7.2.62','sa',0);
	storedata('7.2.63','sa',0);
}
/* yamaramanamAtAM sakca (7.2.73) */ 
if ( in_array($so,$tis) && arr($text,'/[+][s][i][c][+]/') && sub(array("A","yam","ram","nam"),array("+sic+"),blank(0),0) )
{
    $text=two(array("A","yam","ram","nam"),array("+sic+"),array("A","yam","ram","nam"),array("+sis+"),0);
	storedata('7.2.73','sa',0);
	$yamarama=1;
}
if ($debug===1) {dibug("2500");}
/* iTa ITi (8.2.28) */ 
if (arr($text,'/[+][s][i][s][+][I]/') && in_array($so,$tiG) )
{
    $text=two(array("+sis+"),array("I"),array("+si+"),array("I"),0);
	storedata('8.2.28','sa',0);
    /* akaH savarNe dIrghaH (6.1.101) */ 
    if (sub(array("si"),array("+I"),blank(0),0))
    {
    $text = two(array("si"),array("+I"),array("sI"),blank(2),0);
	storedata('6.1.101','sa',0);
    }
}
/* AtaH (3.4.110) */
if ( $sic!==0 && $so==="Ji" && sub(array("A"),array("+"),array("Ji"),0) )
{
	$text = three(array("A"),array("+"),array("Ji"),array("A"),array("+"),array("jus"),0);
	storedata('3.4.110','sa',0);
}
/* rudhAdi gaNa is special in the sense that its vikaraNa is a mit pratyaya. So making a special provision for the same. */
if ($rudhAdibhyaH===1)
{
    $text = change('/^(['.pc('al').']*['.pc('ac').'])(['.pc('hl').']+)[+]/','$1na$2+');
	storedata('3.1.78','sa',0);
    $vik=array_merge($vik,array("Snam"));
    $set=2;
    if (arr($text,'/[n][a][nNYRm]/'))
    {
        $text = two(array("na"),array("N","Y","R","n","m"),array("na"),array("","","","",""),0);
		storedata('6.4.23','sa',0);
    }
	/* znasorallopaH (6.4.111) */
    if (pr2(array("na"),$hlplus,$apit_sArvadhAtuka_pratyayas,array("n"),$hlplus,$apit_sArvadhAtuka_pratyayas,$text)!==$text)
    {
        $text = pr2(array("na"),$hlplus,$apit_sArvadhAtuka_pratyayas,array("n"),$hlplus,$apit_sArvadhAtuka_pratyayas,$text);
		storedata('6.4.111','sa',0);
		$znasorallopaH = 1;
    }
    if (arr($text,'/na['.pc('hl').']+[+]I/') || arr($text,'/na['.pc('hl').']+[+]yA/'))
    {
		storedata('1.2.4','pa',0);
        $text = change('/na(['.pc('hl').']+)[+]I/','n$1+I');
        $text = change('/na(['.pc('hl').']+)[+]yA/','n$1+yA');
		storedata('6.4.111','sa',0);
		$znasorallopaH = 1;
    }
    if (sub(array("tfnah"),array("+"),blank(0),0))
    {
        $text = one(array("tfnah+"),array("tfRah+"),0);
		storedata('8.4.1-1','sa',0);
    }
    /* tRNaha im (7.3.92) */
    if (pr2(array("tfRah"),array("+"),$halAdi_pit_sArvadhAtuka_pratyayas,array("tfRaih"),array("+"),$halAdi_pit_sArvadhAtuka_pratyayas,$text)!==$text && in_array($so,$tiG))
    {
        $text = pr2(array("tfRah"),array("+"),$halAdi_pit_sArvadhAtuka_pratyayas,array("tfRaih"),array("+"),$halAdi_pit_sArvadhAtuka_pratyayas,$text);
		storedata('7.3.92','sa',0);
        $text = one(array("tfRaih"),array("tfReh"),0);
		storedata('6.1.87','sa',0);
    }
}
/* sArvadhAtukamapit (1.2.4) */
if ($sarvadhatuka===1 && !in_array("Sap",$vik) && pr2(array("+"),$apit_sArvadhAtuka_pratyayas,blank(0),array("+fadfad"),$apit_sArvadhAtuka_pratyayas,blank(0),$text)!== $text)//  && $znasorallopaH!==1 ) // See https://github.com/drdhaval2785/SanskritVerb/issues/267
{
    $it=array_merge($it,array("N"));
    $itpratyaya=array_merge($itpratyaya,array("N"));
	storedata('1.2.4','pa',0);
	$kGiti=1;	
	if (pr2(pc('ik'),array("+"),$apit_sArvadhAtuka_pratyayas,pc('ik'),array("+fadfad"),$apit_sArvadhAtuka_pratyayas,$text)!== $text)
	{
		storedata('1.1.5','sa',0);
	}
}
/* bhuvo vugluGliToH (6.4.88) */
if ( arr($text,'/[B][U][+][R'.pc('ac').']/') && in_array($lakAra,array("luN","liw")))
{
    $text = two(array("BU+"),$ac,array("BUv+"),$ac,0);
    $text = one(array("BU+R"),array("BUv+R"),0);
	storedata('6.4.88','sa',0);	
}
/* liTi dhAtoranabhyAsasya (6.1.8) */
if ($lakAra==="liw" && arr($text,'/^['.pc('hl').']/'))
{
	liT_halAdi();
	abhyAsa_halAdi();
	$abhyAsa=1;
	$abhyasta=1;
}
/* aniditAM hala upadhAyAH kGiti (6.4.24) */ 
if ( in_array($fo,$aniditverbs) && (in_array("N",$itpratyaya) || in_array("k",$itpratyaya)) && !in_array($sanAdi,array("Ric"))  && $so!=="mahiN" && arr($text,'/[NYRnmM]['.pc('hl').'][+]/')  && !in_array("i",$it) && $lakAra!=="viDiliN" && $verbset!=="ruDAdi" && $aniditAm!==1)
{
	if ($ancu===2)
	{
		$text = three(array("N","Y","R","n","m","M"),$hl,array("+"),array("","","","","","",),$hl,array("+"),1);        
		storedata('6.4.24','sa',0);
		$aniditAm = 1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.				
	}
	else
	{
		$text = three(array("N","Y","R","n","m","M"),$hl,array("+"),array("","","","","","",),$hl,array("+"),0);        
		storedata('6.4.24','sa',0);
		$aniditAm = 1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.		
	}
}
/* liTi dhAtoranabhyAsasya (6.1.8) */
elseif ($lakAra==="liw" && arr($text,'/^['.pc('ac').']/'))
{
	liT_ajAdi();
	$abhyAsa=1;
	$abhyasta=1;
}
/* liTi vayo yaH (6.1.38) and vazcAsyAnyatarasyAM kiti (6.1.39) */
if (in_array($fo,array("veY")) && $lakAra==="liw" && in_array("k",$itpratyaya) && sub(array("vay"),array("+"),blank(0),0))
{
	$text = two(array("u+vay"),array("+"),array("Uy"),array("+"),0);
	storedata('6.1.38','sa',0);
	$text = two(array("Uy"),array("+"),array("Uv"),array("+"),1);
	storedata('6.1.39','sa',0);
}
/* vacisvapiyajAdInAM kiti (6.1.15) */
elseif ( in_array("k",$itpratyaya) && in_array($fo,array("brUY","Yizvapa!","yaja!","quvapa!","vaha!","veY","vyeY","hveY","vada!","wuo!Svi!","vaca!")) && sub(array("vac","svap","yaj","vap","ve","vye","hve","vad","Sv"),array("+"),blank(0),0))
{
    $text=two(array("vac","svap","yaj","vap","vah","ve","vye","hve","vad","Sv"),array("+"),array("uac","suap","iaj","uap","uah","ue","vie","hie","uad","Su"),array("+"),0);
	storedata('6.1.15','sa',0);
    $text = samprasarana(array("uac","suap","iaj","uap","ue","vie","hie","uad","Su"),0);
}
/* RRta iddhAtoH (7.1.100) */
if (arr($text,'/F\+/') && in_array($so,$tiG) && ($sarvadhatuka===1 || in_array("Sa",$vik)))
{
    $text=two(array("F"),array("+"),array("ir"),array("+"),0);
	storedata('7.1.100','sa',0);
}
/* grahijyAvayivyadhivaSTivicativRzcatipRcCatibhRjjatInAM Giti ca (6.1.16) */
if ($so!=="mahiN" && in_array($fo,array("jyA","graha!","vaya!","vyaDa!","vaSa!","vyaca!","o!vraScU!","praCa!","Brasja!")) && ((sub(array("jyA","grah","vay","vyaD","vaS","vyac","vraSc","pracC","Brasj"),array("+"),$apit_sArvadhAtuka_pratyayas,0) && $sarvadhatuka===1) || in_array("N",$itpratyaya) || in_array("k",$itpratyaya)) )
{
    $text=two(array("jyA","grah","vay","vyaD","vaS","vyac","vraSc","pracC","Brasj"),array("+"),array("jiA","gfh","uy","viD","uS","vic","vfSc","pfcC","Bfsj"),array("+"),0);
	storedata('6.1.16','sa',0);
    $text = samprasarana(array("jyA","grah","vay","vyaD","vaS","vyac","vraSc","pracC","Brasj"),0);
	}
if ($debug===1) {dibug("2600");}
/* jAgro'viciNNalGitsu (7.3.85) */
// Not coded properly. Only for Ni coded. Rest Pending.
//if ( sub(array('jAgf'),array("+"),array("Ri+"),0) && $bhasyADhe!==1)
if ( arr($text,'/[j][A][g][f][+]/') && $bhasyADhe!==1)
{
    $text = two(array('jAgf'),array("+"),array('jAgar'),array("+"),0);
	storedata('7.3.85','sa',0);
	$jAgro=1;
} else {$jAgro=0;}
/* IzaH se (7.2.77) */
if (in_array($fo,array("ISa!")) && sub(array("+"),array("s"),blank(0),0) && in_array($so,$tiG))
{
    $text=three(array("IS"),array("+"),array("s"),array("IS"),array("+"),array("s"),0);
	storedata('7.2.77','sa',0);
}
/* dviSazca (3.4.112) */
if (in_array($fo,array("dviza!"))  && in_array($so,$tiG) && $lakAra==="laN" && pr2(array("dviz"),array("+"),array("an"),array("dviz"),array("+"),array("us"),$text)!==$text)
{
    $text1=pr2(array("dviz"),array("+"),array("an"),array("dviz"),array("+"),array("us"),$text);
    $text = array_merge($text,$text1);
	storedata('3.4.112','sa',0);
}
/* zA hau (6.4.35) */
if ( in_array($fo,array("SAsu!")) && in_array($so,$tiG) && $sarvadhatuka===1 && pr2(array("SAs"),array("+"),array("hi"),array("SA"),array("+"),array("hi"),$text)!==$text )
{
    $text = pr2(array("SAs"),array("+"),array("hi"),array("SA"),array("+"),array("hi"),$text);
	storedata('6.4.35','sa',0);
        /* hujhalbhyo herdhiH (6.4.101) */
        $text=one(array("SA+hi"),array("SA+Di"),0);
		storedata('6.4.101','sa',0);
}
/* zAsa idaGhaloH (6.4.34) */
if (in_array($fo,array("SAsu!")) && in_array($so,$tiG) && $sarvadhatuka===1 && pr2(array("SAs"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("Sis"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,$text)!==$text )
{
    $text = pr2(array("SAs"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("Sis"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,$text);
	storedata('6.4.34','sa',0);
}
/* zAsivasighasInAM ca (8.3.60) */
if ( in_array($fo,array("SAsu!","vasa!")) && in_array($so,$tiG) && sub(array("Sis","us"),array("+"),blank(0),0) )
{
    $text = two(array("Sis","us"),array("+"),array("Siz","uz"),array("+"),0);
	storedata('8.3.60','sa',0);
}
/* adaH sarveSAm (7.3.100) */
if ( in_array($fo,array("ada!")) && in_array($so,$tiG) && $sarvadhatuka===1 &&pr2(array("ad"),array("+"),array("t","s"),array("ad"),array("+"),array("at","as"),$text)!==$text )
{
    $text = pr2(array("ad"),array("+"),array("t","s"),array("ad"),array("+"),array("at","as"),$text);
	storedata('7.3.100','sa',0);
}
/* vido laTo vA (3.4.83) */
if ( in_array($fo,array("vida!")) && in_array($so,$tiG) && $verbset==="adAdi" && pr2(array("vid"),array("+"),array("ti","tas","anti","si","Tas","Ta","mi","vas","mas"),array("vid"),array("+"),array("a","atus","us","Ta","aTus","a","a","va","ma"),$text)!==$text )
{
    $text1 = pr2(array("vid"),array("+"),array("tas","anti","Tas","Ta","vas","mas"),array("vid"),array("+"),array("atus","us","aTus","a","va","ma"),$text);
    $text1 = pr2(array("vid"),array("+"),array("ti","si","mi",),array("ved"),array("+"),array("a","Ta","a"),$text1);
    $text = array_merge ($text,$text1);
	storedata('3.4.83','sa',0);
}
/* sijabhyastavidibhyazca (3.4.109) */ // for vid
if ( in_array($fo,array("vida!")) && in_array($so,$tiG) && $verbset==="adAdi" && $lakAra==="laN" && pr2(array("vid"),array("+"),array("an"),array("vid"),array("+"),array("us"),$text)!==$text)
{
    $text = pr2(array("vid"),array("+"),array("an"),array("vid"),array("+"),array("us"),$text);
	storedata('3.4.109','sa',0);
}
/* sijabhyastavidibhyazca (3.4.109) */ // for abhyasta
elseif ( in_array($fo,array("vida!")) && in_array($so,$tiG) && $verbset==="adAdi" && $lakAra==="laN" && pr2(array("+"),array("an"),blank(0),array("+"),array("us"),blank(0),$text)!==$text && $abhyasta===1 )
{
    $text = pr2(array("vid"),array("+"),array("an"),array("vid"),array("+"),array("us"),$text);
	storedata('3.4.109','sa',0);
}
/* mRjervRddhiH (7.2.114) */
if (  in_array($so,$tiG)&& $fo==="mfjU!" && sub(array("mfj"),array("+"),blank(0),0) )
{
    $text=two(array("mfj"),array("+"),array("mArj"),array("+"),0);
	storedata('7.2.114','sa',0);
}
/* bruvaH paYcAnAmAdita Aho bruvaH (3.4.84) */
if ( $lakAra==="law" && in_array($fo,array('brUY')) && sub(array("brU"),array("+"),array("ti","tas","anti","si","Tas"),0) )
{
    $text = three(array("brU"),array("+"),array("ti","tas","anti","si","Tas"),array("Ah"),array("+"),array("Ral","atus","us","Tal","aTus"),1);
	storedata('3.4.84','sa',0);
}
/* AhasthaH (8.2.35) */
if ( $lakAra==="law" && sub(array("Ah"),array("+"),array("Tal"),0) )
{
    $text = three(array("Ah"),array("+"),array("Tal"),array("AT"),array("+"),array("Tal"),0);
	storedata('8.2.35','sa',0);
}
/* bruva IT (7.3.93) */
if ( in_array($fo,array("brUY")) && in_array($so,$tiG) && pr2(array("brU"),array("+"),$halAdi_pit_sArvadhAtuka_tiG_pratyayas,array("brU"),array("+I+"),$halAdi_pit_sArvadhAtuka_tiG_pratyayas,$text)!==$text )
{
    $text = pr2(array("brU"),array("+"),$halAdi_pit_sArvadhAtuka_tiG_pratyayas,array("brU"),array("+I+"),$halAdi_pit_sArvadhAtuka_tiG_pratyayas,$text);
	storedata('7.3.93','sa',0);
}
/* turustuzamyamaH sArvadhAtuke (7.3.95) */
if ( in_array($fo,array("tu","ru","zwuY","Samu!","ama!")) && in_array($so,$tiG) && pr2(array("tu","ru","stu","Sam","am"),array("+"),$halAdi_pit_sArvadhAtuka_pratyayas,array("tu","ru","stu","Sam","am"),array("+I+"),$halAdi_pit_sArvadhAtuka_pratyayas,$text)!==$text )
{
    $text1 = pr2(array("tu","ru","stu","Sam","am"),array("+"),$halAdi_pit_sArvadhAtuka_pratyayas,array("tu","ru","stu","Sam","am"),array("+I+"),$halAdi_pit_sArvadhAtuka_pratyayas,$text);
    $text = array_merge($text,$text1);
	storedata('7.3.95','sa',0);
}
if ($debug===1) {dibug("2700");}
/* guNo'pRkte (7.3.91) */
if ( ends($vik,array("Slu","Sapluk"),1) && arr($text,'/[+][ts]$/') && sub(array("UrRu+"),$halAdi_pit_sArvadhAtuka_pratyayas,blank(0),0) )
{
	storedata('7.3.91','pa',0);
}
/* UrNotervibhASA (7.3.90) */
elseif ( ends($vik,array("Slu","Sapluk"),1) && sub(array("UrRu+"),$halAdi_pit_sArvadhAtuka_pratyayas,blank(0),0) )
{
    $textanother=pr2(array("UrRu+"),$halAdi_pit_sArvadhAtuka_pratyayas,blank(0),array("UrRO+"),$halAdi_pit_sArvadhAtuka_pratyayas,blank(0),$text);
    $text=array_merge($text,$textanother);
	storedata('7.3.90','sa',0);
}
/* uto vRddhirluki hali (7.3.89) */
elseif ( ends($vik,array("Sapluk"),1) &&  pr2(array("u+"),$halAdi_pit_sArvadhAtuka_pratyayas,blank(0),array("O+"),$halAdi_pit_sArvadhAtuka_pratyayas,blank(0),$text)!==$text )
{
    $text=pr2(array("u+"),$halAdi_pit_sArvadhAtuka_pratyayas,blank(0),array("O+"),$halAdi_pit_sArvadhAtuka_pratyayas,blank(0),$text);
	storedata('7.3.89','sa',0);
}
/* ubhe abhyastam (6.1.5) */
if ($abhyasta===1 && $jaksat===0)
{
	storedata('6.1.5','pa',0);
	$ubheabhyasta=1;
}
/* adabhyastAt (7.1.4) */
if ($abhyasta===1 && pr2(array("+"),array("anti","antu","an"),blank(0),array("+"),array("ati","atu","us"),blank(0),$text)!==$text)
{
    $text = pr2(array("+"),array("anti","antu","an"),blank(0),array("+"),array("ati","atu","us"),blank(0),$text);
	storedata('7.1.4','sa',0);
}
/* iddaridrasya (6.1.114) */
if (arr($text,'/[d][a][r][i][d][r][A][+]/') && sub(array("daridrA"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,0) )
{
    $text = pr2(array("daridrA+"),$halAdi_apit_sArvadhAtuka_pratyayas,blank(0),array("daridri+"),$halAdi_apit_sArvadhAtuka_pratyayas,blank(0),$text);
	storedata('6.1.114','sa',0);
}

/* pvAdInAM hrasvaH (7.3.80) */
$shitpratyayareplace=array("a","ya","nu","na","nA","Aya","Ana");
if (in_array($fo,$pvAdi) && $shit===1 && $fo!=="jyA" && ( $verbset==="kryAdi" || ($verbset==="none" && ends(array($fo),$kryAdi,4) ) ))
{
    $text=three(array("A","I","U","F",),$shitpratyayareplace,array("+"),array("a","i","u","f",),$shitpratyayareplace,array("+"),0);
	storedata('7.3.80','sa',0);
}
/* upadhAyAzca (7.1.101) */
if (arr($text,'/[F]/') && sub(array("F"),$hl,array("+"),0) && in_array($so,$tiG)) 
{
    $text=three(array("F"),$hl,array("+"),array("ir"),$hl,array("+"),0);
	storedata('7.1.101','sa',0);
}
/* upadhAyAM ca (8.2.78) */
if (arr($text,'/[iu][r]['.pc('hl').'][+]/'))
{
    $text=three(array("ir","ur"),$hl,array("+"),array("Ir","Ur"),$hl,array("+"),0);
	storedata('8.2.78','sa',0);
}
/* prajane vIyateH (6.1.55) */
if ( in_array($fo,array("vI")) && in_array($so,$tiG) && sub(array("vI",),array("+"),array("Ri"),0) )
{
    $text=three(array("vI"),array("+"),array("Ri"),array("vA"),array("+"),array("Ri"),1);
	storedata('6.1.55','sa',0);
}
/* Nau gamirabodhane (2.4.46) */
if ( $_GET['cond51']==='1' && in_array($so,$tiG) && sub(array("i",),array("+"),array("Ri"),0) )
{
    $text=three(array("i"),array("+"),array("Ri"),array("gam"),array("+"),array("Ri"),0);
	storedata('2.4.46','sa',0);
	$Naugami = 1;
} else { $Naugami = 0; }
/* nityaM smayateH (6.1.57) */
if (in_array($fo,array("zmiN")) && in_array($so,$tiG) && sub(array("smi"),array("+"),array("Ri"),0) )
{
    $text=three(array("smi"),array("+"),array("Ri"),array("smA"),array("+"),array("Ri"),0);
	storedata('6.1.57','sa',0);
}
/* bibheterhetubhaye (6.1.55) */
if (in_array($fo,array("YiBI")) && in_array($so,$tiG) && $_GET['cond39']==='1' && sub(array("BI",),array("+"),array("Ri"),0) )
{
    $text=three(array("BI"),array("+"),array("Ri"),array("BA"),array("+"),array("Ri"),1);
	storedata('6.1.55','sa',0);
}
/* krIGjInAM Nau (6.1.48) */
if ( in_array($fo,array("qukrIY","ji","iN")) && in_array($so,$tiG) && sub(array("krI","ji","i"),array("+"),array("Ri"),0) )
{
    $text=three(array("krI","ji","i"),array("+"),array("Ri"),array("krA","jA","A"),array("+"),array("Ri"),0);
	storedata('6.1.48','sa',0);
}
/* cisphurorNau (6.1.54) */
if ( in_array($fo,array("ciY","sPura!")) && in_array($so,$tiG) && sub(array("ci","sPur"),array("+"),array("Ri+"),0) )
{
    $text=three(array("ci","sPur"),array("+"),array("Ri+"),array("cA","sPAr"),array("+"),array("Ri+"),1);
	storedata('6.1.54','sa',0);
}
/* sphAyo vaH (7.3.41) */
if (in_array($fo,array("sPAyI!")) && sub(array("sPAy"),array("+"),array("Ri"),0) )
{
    $text=three(array("sPAy"),array("+"),array("Ri"),array("sPAv"),array("+"),array("Ri"),0);    
	storedata('7.3.41','sa',0);
}
/* zaderagatau taH (7.3.42) */
if ( in_array($fo,array("Sadx!")) && sub(array("Sad"),array("+"),array("Ri"),0) )
{
    $text=three(array("Sad"),array("+"),array("Ri"),array("Sat"),array("+"),array("Ri"),0);    
	storedata('7.3.42','sa',0);
}
if ($debug===1) {dibug("2800");}
/* ruhaH po'nyatarasyAm (7.3.43) */
if ( in_array($fo,array("ruha!")) && sub(array("ruh"),array("+"),array("Ri"),0) )
{
    $text=three(array("ruh"),array("+"),array("Ri"),array("rup"),array("+"),array("Ri"),1);    
	storedata('7.3.43','sa',0);
}
/* radhijabhoraci (7.1.61) */
if ( in_array($fo,array("raDa!","jaBI!")) && sub(array("raD","jaB"),array("+"),array("Ri"),0) )
{
    $text=three(array("raD","jaB"),array("+"),array("Ri"),array("ranD","janB"),array("+"),array("Ri"),0);    
	storedata('7.1.61','sa',0);
}
/* labhezca (7.1.64) */
if (in_array($fo,array("qulaBa!z")) && sub(array("laB"),array("+"),array("Ri"),0) )
{
    $text=three(array("laB"),array("+"),array("Ri"),array("lanB"),array("+"),array("Ri"),0);    
	storedata('7.1.64','sa',0);
}
/* rabherazabliToH (7.1.63) */
if ( in_array($fo,array("raBa!")) && sub(array("raB"),array("+"),array("Ri"),0) )
{
    $text=three(array("raB"),array("+"),array("Ri"),array("ranB"),array("+"),array("Ri"),0);    
	storedata('7.1.63','sa',0);
}
/* doSo Nau (6.4.90) */
if ( in_array($fo,array("duza!")) && $_GET['cond52']==='2' && sub(array("duz"),array("+"),array("Ri"),0))
{
    $text=three(array("duz"),array("+"),array("Ri"),array("dUz"),array("+"),array("Ri"),0);    
	storedata('6.4.90','sa',0);
}
/* vA cittavirAge (6.4.91) */
if ( in_array($fo,array("duza!")) && $_GET['cond52']==='1' && sub(array("duz"),array("+"),array("Ri"),0) )
{
    $text=three(array("duz"),array("+"),array("Ri"),array("dUz"),array("+"),array("Ri"),1);    
	storedata('6.4.91','sa',0);
}
/* Duplication because of caG */
if ($caG===1 && arr($text,'/^['.pc('hl').']/'))
{
	caG_halAdi();	
	abhyAsa_halAdi();
	$abhyAsa=1;
}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
if ( $didhI!==1 && $kGiti!==1 && $caG!==1 && !($lakAra==="liw" && in_array($fo,array("uN"))) && arr($text,'/[iIuUfFxX]\+[uiae]\+/') && ($sarvadhatuka===1 || $ardhadhatuka===1) && !($ad===1 && sub(array("i","I","u","U","f","F","x","X"),array("+"),$ajAdi_apit_sArvadhAtuka_pratyayas,0) ) )
{
    $text=two(array("i","I","u","U","f","F","x","X",),array("+u+","+I+","+a+","+e"),array("e","e","o","o","ar","ar","al","al",),array("+u+","+I+","+a+","+e"),0);
	storedata('7.3.84','sa',0);
	if (arr($text,'/[eo][+]['.pc('ac').']/'))
	{
		$text=two(array("e+","o+"),$ac,array("ay+","av+"),$ac,0);
		storedata('6.1.78','sa',0);
	}
}

/* lopo vyorvali (6.1.66) */
if ( arr($text,'/a[+]iy[+]['.pc('vl').']/') && in_array($so,$tiG) ) 
{
    $text=two(array("a+iy+"),prat('vl'),array("a+i+"),prat('vl'),0);
	storedata('6.1.66','sa',0);
    $text=two(array("a+i+"),prat('vl'),array("e"),prat('vl'),0);
	storedata('6.1.87','sa',0);
}

/* lIlornuglukAvanyatarsyAM snehanipAtane (7.3.39) */
if (in_array($fo,array("lA","lI","lIN")) && in_array($so,$tiG) && sub(array("lA","lI"),array("+"),array("Ri"),0) )
{
    $text=three(array("lA","lI"),array("+"),array("Ri"),array("lAl","lIn"),array("+"),array("Ri"),1);
	storedata('7.3.39','sa',0);
}
/* lugAgamastu tasya vaktavyaH (vA) */
if (in_array($fo,array("pA")) && in_array($so,$tiG) && $verbset==="adAdi" && sub(array("pA"),array("+"),array("Ri"),0) )
{
    $text=three(array("pA"),array("+"),array("Ri"),array("pAl"),array("+"),array("Ri"),0);
	storedata('7.3.37-2','sa',0);
}
/* vo vidhUnane juk (7.3.38) */
elseif (in_array($fo,array("vA")) && in_array($so,$tiG) && sub(array("vA"),array("+"),array("Ri"),0) )
{
    $text=three(array("vA"),array("+"),array("Ri"),array("vAj"),array("+"),array("Ri"),0);
	storedata('7.3.38','sa',0);
}
/* zAcCAsAhvAvyAvepAM yuk (7.3.37) */
elseif ( in_array($fo,array("So","Co","zo","hveY","vyeY","veY","pA","pE")) && in_array($so,$tiG) && !(ends(array($fo),array("pA"),2) && $verbset==="adAdi") && sub(array("SA","CA","sA","hvA","vyA","ve","pA"),array("+"),array("Ri"),0) )
{
    $text=three(array("SA","CA","sA","hvA","vyA","ve","pA"),array("+"),array("Ri"),array("SAy","CAy","sAy","hvAy","vyAy","vey","pAy"),array("+"),array("Ri"),0);
	storedata('7.3.37','sa',0);
}
/* arttihrIvlIrIknUyIkSmAyyAtAM puGNau (7.3.36) */
elseif ( in_array($fo,array("f","hrI","vlI","rI","knUyI!","kzmAyI!","blI")) && in_array($so,$tiG) && sub(array("f","hrI","vlI","rI","knUy","kzmAy","blI"),array("+"),array("Ri"),0) )
{
    $text=two(array("f","hrI","vlI","rI","knUy","kzmAy","blI"),array("+"),array("fp","hrIp","vlIp","rIp","knUp","kzmAp","blIp"),array("+"),0);
	storedata('7.3.36','sa',0);
	storedata('3.1.32','sa',0);
}
/* arttihrIvlIrIknUyIkSmAyyAtAM puGNau (7.3.36) */
elseif (arr($text,'/[A][+][R][i]/') && sub(array("A"),array("+"),array("Ri"),0) && in_array($so,$tiG))
{
    $text=two(array("A"),array("+"),array("Ap"),array("+"),0);
	storedata('7.3.36','sa',0);
	storedata('3.1.32','sa',0);
}
/* bhiyo hetubhaye Suk (7.3.40) */
if (in_array($fo,array("YiBI")) && in_array($so,$tiG) && $_GET['cond39']==='1' && sub(array("BI",),array("+"),array("Ri"),0) )
{
    $text=three(array("BI"),array("+"),array("Ri"),array("BIz"),array("+"),array("Ri"),0);
	storedata('7.3.40','sa',0);
}
/* dhUJprIJornugvaktavyaH (vA) */
if (in_array($fo,array("prIY","DUY")) && in_array($so,$tiG) && sub(array("prI","DU"),array("+"),array("Ri"),0))
{
    $text=three(array("prI","DU"),array("+"),array("Ri"),array("prIn","DUn"),array("+"),array("Ri"),0);
	storedata('7.3.37-1','sa',0);
}
if ($debug===1) {dibug("2900");}
/* Ato lopa iTi ca (6.4.64) */
if ( (in_array("N",$itpratyaya)||in_array("k",$itpratyaya) )  && $lakAra!=="" && $caG===1 && sub(array("A+"),array("a+"),blank(0),0) )
{
    $text=two(array("A"),array("+a+"),array(""),array("+a+"),0);
	storedata('6.4.64','sa',0);
}
/* Ato lopa iTi ca (6.4.64) */
elseif (arr($text,'/[A][+]['.pc('ac').']/') && (in_array("N",$itpratyaya)||in_array("k",$itpratyaya) ) && pr2(array("A"),array("+"),$tiG1,array("A"),array("+"),$tiG1,$text)!==$text && $lakAra!=="" )
{
    $text=pr2(array("A"),array("+"),$tiG1,array("A"),array("+"),$tiG1,$text);
    $text=two($hl,array("+sic+"),$hl,array("A+sic+"),0);
	storedata('6.4.64','sa',0);
}
/* ze mucAdInAm (7.1.59) */
if ( ($verbset==="tudAdi" || ($verbset==="none" && in_array($fo,$tudAdi)) ) && $lakAra!=="" && sub($tudAdi_mucAdi,array("+"),array("a+","e"),0) )
{
    $mucAdireplace=array("munc","lunp","vind","linp","zinc","Kind","kfnt","pinS");
    $text = two($tudAdi_mucAdi,array("+"),$mucAdireplace,array("+"),0);
	storedata('7.1.59','sa',0);
}
/* dhivikRNvyora ca (3.1.80) */
if (in_array($fo,array("Divi!","kfvi!")) && sub(array("Dinv","kfnv"),array("+"),array("u+"),0) )
{
    $text=three(array("Dinv","kfnv"),array("+"),array("u+"),array("Dina","kfna"),array("+"),array("u+"),0);
	storedata('3.1.80','sa',0);
}
/* lopaH pibaterIccAbhyAsasya (7.4.4) */
if (in_array($fo,array("pA")) && in_array($so,$tiG) && !(ends(array($fo),array("pA"),2) && $verbset==="adAdi") && $luGset===5 && sub(array("pa+pAy"),array("+"),array("Ri"),0))
{
    $text=three(array("pa+pAy"),array("+"),array("Ri"),array("pI+py"),array("+"),array("Ri"),0);
	storedata('7.4.4','sa',0);
}
/* tiSThaterit (7.4.5) */
if ( in_array($fo,array("zWA")) && in_array($so,$tiG)  && $luGset===5 && sub(array("ta+sTAp"),array("+"),array("Ri"),0) )
{
    $text=three(array("ta+sTAp"),array("+"),array("Ri"),array("ta+sTip"),array("+"),array("Ri"),0);
	storedata('7.4.5','sa',0);
}
/* jighratervA (7.4.6) */
if ( in_array($fo,array("GrA")) && in_array($so,$tiG)  && $luGset===5 && sub(array("ja+GrAp"),array("+"),array("Ri"),0) )
{
    $text=three(array("ja+GrAp"),array("+"),array("Ri"),array("ja+Grip"),array("+"),array("Ri"),1);
	storedata('7.4.6','sa',0);
}
/* yasya halaH (6.4.49) */
if (arr($text,'/['.pc('hl').']([+]*)ya\+/')  && $ardhadhatuka===1 && sub(array("+"),$ArdhadhAtuka_pratyayas,array(""),0))
{
    //$text = three($hl,array("ya+"),$ArdhadhAtuka_pratyayas,$hl,array("+"),$ArdhadhAtuka_pratyayas,0);
	$text = two(array("ya+"),$ArdhadhAtuka_pratyayas,array("+"),$ArdhadhAtuka_pratyayas,0);
	storedata('6.4.49','sa',0);
	$atolopa=1;
}
/* patch for aG vikaraNa in luG lakAra */
if ($lakAra==='luN')
{
	/* ato guNe (6.1.97) */ // patch for aG+Ji.
	if ($caG!==1 && sub(array("a"),array("+a"),blank(0),0)   && $aG!==1)
	{
		while(sub(array("a"),array("+a"),blank(0),0) !== false)
		{
				 $text = two(array("a"),array("+a"),blank(1),array("+a"),0);   
		}      
		storedata('6.1.97','sa',0);
	}
	$text = one(array("+a+"),array("+a"),0);
}
/* ato lopaH (6.4.48) */
if ( arr($text,'/[a][+][R][ai]/') || arr($text,'/ai\+a/') || arr($text,'/[+]aa/'))
{ 
	$text = two(array("a"),array("+Ri","+Ra"),array(""),array("+Ri","+Ra"),0);
	$text = one(array("ai+a","+aa"),array("i+a","+a"),0);
	storedata('6.4.48','sa',0);
    $atolopa=1;
}
/* aco JNiti (7.2.115) */ 
// more on enumeration kind. Not used regexes deliberately.
if (arr($text,'/['.pc('ac').'][+][R][i][+]/') && $bhasyADhe!==1)
{ 
    $text = three($ac,array("+"),array("Ri+"),vriddhi($ac),array("+"),array("Ri+"),0);
	storedata('7.2.115','sa',0);
}
// patch for ArdhadhAtuka leT.
if ( $Nit===1 && $bhasyADhe!==1 && arr($text,'/['.pc('ac').'][+]/') )
{
    $text = two($ac,array("+"),vriddhi($ac),array("+"),1);
	storedata('7.2.115','sa',0);
}
/* patch for sautra dhAtu Rta */
$text=one(array("ft+Iya+"),array("ftIya+"),0);
/* ho hanterJNinneSu (7.3.54) */
if (arr(array($fo),'/[h][a][n]/') && !in_array($fo,array("ahan","dIrGAhan")) && (in_array("R",$it) || in_array("Y",$it) || in_array($sanAdi,array("Ric")) || in_array("R",$itpratyaya) || in_array("Y",$itpratyaya)) && sub(array("han"),array("+"),blank(0),0) )
{
    $text = two(array("han"),array("+"),array("Gan"),array("+"),0);
	storedata('7.3.54','sa',0);
    $hohante=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
} else { $hohante=0; }
if ($debug===1) {dibug("3000");}
/* ata upadhAyAH (7.2.116) */
// more on enumeration kind. Not used regexes deliberately.
if ( $atolopa!==1 && $Naugami!==1 && $jAgro!==1 && arr($text,'/[a]['.pc('hl').'][+][R][i][+]/') )
{
    $text = three(array("a"),$hl,array("+Ri+"),array("A"),$hl,array("+Ri+"),0);
	storedata('7.2.116','sa',0);
}
// patch for ArdhadhAtuka leT.
if ( $Nit===1 && $atolopa!==1 && $Naugami!==1 && $jAgro!==1 && sub(array("a"),$hl,blank(0),0))
{
    $text = three(array("a"),$hl,array("+"),array("A"),$hl,array("+"),1);
	storedata('7.2.116','sa',0);
}
/* hanasto'ciNNaloH (7.3.32) */ 
if ( arr($text,'/GAn\+Ri\+/'))
{
    $text = two(array("GAn"),array("+Ri+"),array("GAt"),array("+Ri+"),0);
	storedata('7.3.32','sa',0);
}
/* mitAM hrasvaH (6.4.92) */ 
if ( in_array($fo,$mitcurAdiverbs) && ($verbset === "curAdi" || $verbset === "none" ) && sub(array("A"),$hl,array("+Ri+"),0))
{
    $text = three(array("A"),$hl,array("+Ri+"),array("a"),$hl,array("+Ri+"),0);
	$text = one(array("cap+Ri"),array("cAp+Ri"),0);
	storedata('6.4.92','sa',0);
}
if ( in_array($fo,$ghaTAdi_mit) && ($verbset === "BvAdi" || $verbset === "none" ) && sub(array("A"),$hl,array("+Ri+"),0) )
{
    $text = three(array("A"),$hl,array("+Ri+"),array("a"),$hl,array("+Ri+"),0);
	storedata('6.4.92','sa',0);
} 
/* cuTU (1.3.7) */
if (arr($text,'/[+][cjYwWqQR]/') && in_array($so,$tiG))
{
    it('/([+][cjYwWqQR])/');
	storedata('1.3.7','sa',0);
    $text = one(array("+jas","+wA","+jus","+Ri","+Ra"),array("+as","+A","+us","+i","+a"),0);
	storedata('1.3.9','sa',0);
}
/* lopo vyorvali (6.1.66) */
// patch for sIyuT
if ( !in_array($sanAdi,array("Ric")) && arr($text,'/Iy/') && sub(array("+Iy","+sIy"),array("+"),prat("vl"),0))
{
    $text = three(array("+Iy","+sIy"),array("+"),prat("vl"),array("+I","+sI"),array(""),prat("vl"),0);    
	storedata('6.1.66','sa',0);
}
/* lopo vyorvali (6.1.66) */
// patch for Nijanta and ksa luG
if (arr($text,'/iy/') && sub(array("+a+iy","+sa+iy","+sya+iy","ya+iy"),array("+"),prat("vl"),0) )
{
    $text = three(array("a+iy","+sa+iy"),array("+"),prat("vl"),array("a+i","+sa+i"),array("+"),prat("vl"),0);
	storedata('6.1.66','sa',0);
    $text = one(array("a+i+"),array("e"),0);
	storedata('6.1.87','sa',0);
}
/* AdguNaH (6.1.87) patch for sya Agama */
if (sub(array("sya+"),array("i+"),blank(0),0))
{
	$text = two(array("sya+"),array("i+"),array("sy"),array("e"),0);
	storedata('6.1.87','sa',0);
}
// patch to join sis with rest of pratyayas.
if (arr($text,'/sis/'))
{
	$text = one(array("sis+"),array("sis"),0);
}
/* halGyAbbhyo dIrghAtsutisyapRktaM hal (6.1.68) and apRkta ekAlpratyayaH (1.2.41) */
if (arr($text,'/['.pc('hl').'][+][sts]$/') && !arr($text,'/s[+]s$/') && in_array($so,array("su!","tip","sip",)) && $rudAdibhyaH!==1 && $itazca!==1)
{
	storedata('1.2.41','pa',0);
}
if (arr($text,'/['.pc('hl').'][+][sts]$/') && !arr($text,'/s[+]s$/') && in_array($so,array("su!","tip","sip")) && $rudAdibhyaH!==1 && $itazca!==1)
{
    $text = two($hl,array("+s","+t"),$hl,array("+","+"),0);
	storedata('7.3.54','sa',0);
    $pada="pada"; // there is no pratyaya left now.
    $halGyAbbhyo=1;
}
/* eco'yavAyAvaH (6.1.78) */
// For Ni.
$ayavayavah = array("ay","av","Ay","Av");
if (arr($text,'/['.pc('ec').'][+][i][+]/') )
{
	$text = two(prat('ec'),array("+i+",),$ayavayavah,array("+i+",),0);
	storedata('6.1.78','sa',0);
}
/* ho hanterJNinneSu (7.3.54) */
if ( arr(array($fo),'/[h][a][n]/') && !in_array($fo,array("ahan","dIrGAhan")) && (in_array("R",$it) || in_array("Y",$it) || in_array($sanAdi,array("Ric")) || in_array("R",$itpratyaya) || in_array("Y",$itpratyaya)) && sub(array("han"),array("+"),blank(0),0) )
{
    $text = two(array("han"),array("+"),array("Gan"),array("+"),0);
	storedata('7.3.54','sa',0);
    $hohante=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
} else { $hohante=0; }
/* mitAM hrasvaH (6.4.92) */ 
if (in_array($fo,$mitcurAdiverbs) && ($verbset === "curAdi" || $verbset === "none" ) && sub(array("A"),$hl,array("+i+"),0) )
{ 
    $text = three(array("A"),$hl,array("+i+"),array("a"),$hl,array("+i+"),0);
	$text = one(array("cap+i+"),array("cAp+i+"),0);
	storedata('6.4.92','sa',0);
}
if ($debug===1) {dibug("3100");}
/* SaH pratyayasya (1.3.6) */
if (arr($text,'/[+][z]/') && $pada=== "pratyaya" && in_array($so,$tiG))
{
    it('/([+][z])/');
	storedata('1.3.6','pa',0);
    $text = two(array("+"),array("z"),array("+"),array(""),0);
	storedata('1.3.9','sa',0);
}
/* jusi ca (7.3.83) */
if ($jherjus===1 && arr($text,'/[iIuUfFxX]\+us/') ) // liT has 'us' which is not 'jus'
{
    $text=three(array("i","I","u","U","f","F","x","X"),array("+"),array("us"),array("e","e","o","o","ar","ar","al","al"),array("+"),array("us"),0);
	storedata('7.3.83','sa',0);
}
/* riGzayagliGkSu (7.4.28) */
if (in_array("Sa",$vik) && (sub(array("f"),array("+a+"),blank(0),0) || (sub(array("f"),array("+y"),blank(0),0) && $lakAra!=="" )))
{
    $text=two(array("f"),array("+"),array("ri"),array("+"),0);
	storedata('7.4.28','sa',0);
}
/* ghasibhasorhali ca (6.4.100) */
if ( in_array($fo,array("Gasa!","Basa!")) && pr2(array("Gas","Bas"),array("+"),$apit_sArvadhAtuka_pratyayas,array("Gs","Bs"),array("+"),$apit_sArvadhAtuka_pratyayas,$text)!==$text && $lakAra!=="" )
{
    $text=pr2(array("Gas","Bas"),array("+"),$apit_sArvadhAtuka_pratyayas,array("Gs","Bs"),array("+"),$apit_sArvadhAtuka_pratyayas,$text);
	storedata('6.4.100','sa',0);
}
/* sArvadhAtukamapit (1.2.4) */
if (  !in_array("Sap",$vik) && !in_array("N",$itpratyaya) && $sarvadhatuka===1 && sub(array("+"),$apit_sArvadhAtuka_pratyayas,blank(0),0) && $kGiti!==1  && $znasorallopaH!==1)
{
    $it=array_merge($it,array("N"));
    $itpratyaya=array_merge($itpratyaya,array("N"));
	storedata('1.2.4','pa',0);
	if (pr2(pc('ik'),array("+"),$apit_sArvadhAtuka_pratyayas,pc('ik'),array("+fadfad"),$apit_sArvadhAtuka_pratyayas,$text)!== $text)
	{
		storedata('1.1.5','sa',0);
		$kGiti=1;	
	}
}
/* jJAjanorjA (7.3.79) */
if ( in_array($fo,array("janI!","jYA")) && in_array($so,$tiG) && sub(array("jan","jYA"),array("+"),$shitpratyayareplace,0) )
{
    $text=three(array("jan","jYA"),array("+"),$shitpratyayareplace,array("jA","jA"),array("+"),$shitpratyayareplace,0);
	storedata('7.3.79','sa',0);
}
/* gAGkuTAdibhyo'JNinGit (1.2.1) */ 
if ( in_array($fo,array("iN")) && sub(array("gAN"),array("+"),blank(0),0) && in_array($lakAra,$ArdhadhAtuka_lakAra) && $Nit===0 && $Jit===0 && !in_array("R",$it) && !in_array("Y",$it))
{
	$itpratyaya=array_merge($itpratyaya,array("N"));
	$it=array_merge($it,array("N"));
	storedata('1.2.1','pa',0);
}
/* gAGkuTAdibhyo'JNinGit (1.2.1) */ 
if ( ((in_array($fo,$tudAdi_kuTAdi) && ($verbset==="tudAdi" || $verbset==="none" )) ) && in_array($lakAra,$ArdhadhAtuka_lakAra) && $Nit===0 && $Jit===0 && !in_array("R",$it) && !in_array("Y",$it))
{
	$itpratyaya=array_merge($itpratyaya,array("N"));
	$it=array_merge($it,array("N"));
	storedata('1.2.1','pa',0);
}
/* vyaceH kuTAditvamanasIti vaktavyam (vA) */
if ( in_array($fo,array("vyaca!")) && !sub(array("vyaca!"),array("+"),array("as"),0) && in_array($lakAra,$ArdhadhAtuka_lakAra) && $Nit===0 && $Jit===0 && !in_array("R",$it) && !in_array("Y",$it))
{
	$itpratyaya=array_merge($itpratyaya,array("N"));
	$it=array_merge($it,array("N"));
	storedata('6.1.17-4','pa',0);
}
/* dIdhIvevITAm (1.1.6) */
$didhI=0;
if ( in_array($fo,array("dIDIN","vevIN")) && ($sarvadhatuka===1 || $ardhadhatuka===1))
{
	storedata('1.1.6','pa',0);
    $didhI=1;
}
/* miderguNaH (7.3.82) */
elseif ( in_array($fo,array("mida!")) && sub(array("mid"),array("+"),blank(0),0))
{
    $text=two(array("mid"),array("+"),array("med"),array("+"),0);
	storedata('7.3.82','sa',0);
}
/* kGiti ca (1.1.5) */
elseif (  $sarvadhatuka===1 && pr2(array("i","I","u","U","f","F","x","X"),array("nu+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("i","I","u","U","f","F","x","X"),array("inu+"),$halAdi_apit_sArvadhAtuka_pratyayas,$text)!==$text && $kGiti!==1)
{
	storedata('1.1.5','pa',0);
    $kGiti=1;
}
/* uzca (1.2.12) */
elseif ( in_array($so,$taG) && ($sic===1||$sIyuT===1) && ends(array($verb_without_anubandha),array("f","F"),1) )
{
	storedata('1.2.12','sa',0);
	$kGiti=1;
	/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
	// patch because it applies only before aniT in this case. for iDAgama it is not applicable.
	/*if ($didhI!==1 && $bhUsuvo!==1 && arr($text,'/[fF]\+isI/') && ($sarvadhatuka===1 || $ardhadhatuka===1) && !($ad===1 && sub(array("i","I","u","U","f","F","x","X"),array("+"),$ajAdi_apit_sArvadhAtuka_pratyayas,0) ) )
	{
		$text=three(array("f","F"),array("+"),array("isI"),array("ar","ar"),array("+"),array("isI"),0);
		storedata('7.3.84','sa',0);
	}*/
}
/* yamo gandhane (1.2.15) */
elseif ( in_array($so,$taG) && $sic===1 && $_GET['cond56']==='1' && ends(array($verb_without_anubandha),array("yam"),1) )
{
	storedata('1.2.15','pa',0);
	$it = array_merge($it,array("k"));
}
/* hanaH sic (1.2.16) */
elseif (in_array($so,$taG) && $sic===1 && ends(array($verb_without_anubandha),array("han"),1) )
{
	storedata('1.2.16','pa',0);
	$it = array_merge($it,array("k"));
}
/* kGiti ca (1.1.5) */
elseif ($ardhadhatuka===1 && (in_array("N",$itpratyaya)||in_array("k",$itpratyaya)) && !in_array($sanAdi,array("Ric")) && pr2(array("i","I","u","U","f","F","x","X"),array("+"),$ArdhadhAtuka_tiG_pratyayas,array("i","I","u","U","f","F","x","X"),array("+i"),$ArdhadhAtuka_tiG_pratyayas,$text)!==$text && $kGiti!==1)
{
	storedata('1.1.5','pa',0);
    $kGiti=1;
}
/* kGiti ca (1.1.5) */
elseif ($ardhadhatuka===1 && (in_array("N",$itpratyaya)||in_array("k",$itpratyaya)) && pr2(array("i","I","u","U","f","F","x","X"),$hlplus,$ArdhadhAtuka_tiG_pratyayas,array("i","I","u","U","f","F","x","X"),$hlplus,$ArdhadhAtuka_tiG_pratyayas,$text)!==$text && $kGiti!==1)
{
	storedata('1.1.5','pa',0);
    $kGiti=1;
}
if ($debug===1) {dibug("3200");}
/* huznuvoH sArvadhAtuke (6.4.87) */
if ($sarvadhatuka===1 && $jherjus!==1 && arr($text,'/u\+/') && sub($hl,array("+nu","+u",),array("+"),0) && sub(array("u+"),$ajAdi_apit_sArvadhAtuka_tiG_pratyayas,blank(0),0) )
{
}
elseif ( $sarvadhatuka===1 && $jherjus!==1 && ((arr($text,'/['.pc('ac').'][+][n][u][+]/') &&sub(array("+nu"),array("+"),$ajAdi_apit_sArvadhAtuka_tiG_pratyayas,0) )|| (arr($text,'/juhu/') && sub(array("juhu+"),$ajAdi_apit_sArvadhAtuka_tiG_pratyayas,blank(0),0) )))
{
    $text=three($ac,array("+nu+"),$ajAdi_apit_sArvadhAtuka_tiG_pratyayas,$ac,array("+nv+"),$ajAdi_apit_sArvadhAtuka_tiG_pratyayas,0);
    $text=two(array("hu+"),$ajAdi_apit_sArvadhAtuka_tiG_pratyayas,array("hv+"),$ajAdi_apit_sArvadhAtuka_tiG_pratyayas,0);
	storedata('6.4.87','sa',0);
}
/* zIGaH sArvadhAtuke guNaH (7.4.21) */
if ( in_array($so,$tiG) && $sarvadhatuka===1 && arr($text,'/SI/') && sub(array("SI"),array("+"),$sArvadhAtuka_pratyayas,0) )
{
    $text=three(array("SI"),array("+"),$sArvadhAtuka_pratyayas,array("Se"),array("+"),$sArvadhAtuka_pratyayas,0);
	storedata('7.4.21','sa',0);
}
/* bahulaM Candasi */
// Adding ruT Agama in case of any pratyaya after any dhAtu in Candas. Pending.
/* zIGo ruT (7.1.6) */
if (arr($text,'/Se/') && sub(array("Se"),array("+"),array("ate","ata","atAm"),0) && in_array($so,$tiG) )
{
    $text=three(array("Se"),array("+"),array("ate","ata","atAm"),array("Se"),array("+"),array("rate","rata","ratAm"),0);
	storedata('7.1.6','sa',0);
}
/* sRjidRzorjhalyamakiti (6.1.58) */ 
if (in_array($fo,array("sfja!","dfSi!r")) && !in_array("k",$itpratyaya) && sub(array("sfj","dfS"),array("+"),prat('Jl'),0))
{ 
    $text = three(array("sfj","dfS"),array("+"),prat('Jl'),array("sfaj","dfaS"),array("+"),prat('Jl'),0);
	storedata('6.1.58','sa',0);
    $text = three(array("sfaj","dfaS"),array("+"),prat('Jl'),array("sraj","draS"),array("+"),prat('Jl'),0);
	storedata('6.1.77','sa',0);
}
/* bhrasjo ropadhayoH ramanyatarasyAm (6.4.47) */ 
if (in_array($fo,array("Brasja!")) && $ardhadhatuka===1 && sub(array("Brasj"),array("+"),blank(0),0) )
{ 
    $text = three(array("Brasj"),array("+"),blank(0),array("Barj"),array("+"),blank(0),1);
	storedata('6.4.47','sa',0);
}
/* liGsicAvAtmanepadeSu (1.2.12) */
if (in_array($so,$taG) && ($sic===1||$sIyuT===1) && ($id_dhAtu==="aniw" || $id_pratyaya==="aniw") && arr($text,'/\+s/') && sub($ik,$hlplus,array("s"),0) )
{
	storedata('1.2.12','pa',0);
	$itpratyaya = array_merge($itpratyaya,array("k"));
	$it = array_merge($it,array("k"));
	$kGiti=1;
}
/* vibhASorNoH (1.2.3) */ 
if ( in_array($fo,array("UrRuY"))  && $id_dhAtu==="sew" && $id_pratyaya==="sew" && sub(array("UrRu","orRu","UrRo","orRo","UrRunu","orRunu",),array("+"),blank(0),0) && in_array($lakAra,$ArdhadhAtuka_lakAra))
{
    $it=array_merge($it,array("N"));
    $itpratyaya=array_merge($itpratyaya,array("N"));
	storedata('1.2.3','sa',0);
}    
/* eliding it markers from sic */ 
if (arr($text,'/sic/') && sub(array("+sic+",),blank(0),blank(0),0) && in_array($so,$tiG) )
{
	storedata('1.3.3','pa',0);
	storedata('1.3.2','pa',0);
	//$text = two($hl,array("+sic+"),blank(count($hl)),array("+sic+"),0); // See https://github.com/drdhaval2785/SanskritVerb/issues/218.
    $text = one(array("+sic+",),array("+s",),0);
	storedata('1.3.9','sa',0);
}
/* liGsicorAtmanepadeSu (7.2.42) */
if ( in_array($so,$taG) && ($sic===1||$sIyuT===1) && (in_array($fo,array("vfN","vfY")) || ends(array($fo),array("F"),1)) )
{
    $text=one(array("+"),array("+i"),1);
	storedata('7.2.42','sa',0);
	$Agama=array_merge($Agama,array("iw"));
}
/* Rtazca saMyogAdeH (7.2.43) */
if (arr($text,'/['.pc('hl').']['.pc('hl').'][f][+]/') && in_array($so,$taG) && ($sic===1||$sIyuT===1) )
{
    $text=one(array("+"),array("+i"),1);
	storedata('7.2.43','sa',0);
	$Agama=array_merge($Agama,array("iw"));
}
/* vettervibhASA (7.1.7) */
if ( in_array($so,$tiG) && $verbset==="adAdi" && sub(array("vid"),array("+"),array("ate","ata","atAm"),0) )
{
    $text=three(array("vid"),array("+"),array("ate","ata","atAm"),array("vid"),array("+"),array("rate","rata","ratAm"),1);
	storedata('7.1.7','sa',0);
}
/* kGiti ca (1.1.5) */
elseif ( $ardhadhatuka===1 && (in_array("N",$itpratyaya)||in_array("k",$itpratyaya))  && !in_array($sanAdi,array("Ric")) && pr2(array("i","I","u","U","f","F","x","X"),array("+"),$ArdhadhAtuka_tiG_pratyayas,array("i","I","u","U","f","F","x","X"),array("+i"),$ArdhadhAtuka_tiG_pratyayas,$text)!==$text && $kGiti!==1)
{
	storedata('1.1.5','sa',0);
    $kGiti=1;
}
/* heracaGi (7.3.56) */
if (arr($text,'/ji\+hi\+/') && $caG!==1)
{
	$text = one(array("ji+hi+"),array("ji+Gi+"),0);
	storedata('7.3.56','sa',0);
}
/* sanliTorjeH (7.3.57) */
if ( ($sanDai=="san" || $lakAra==="liw") && arr($text,'/ji\+hi\+/') )
{
	$text = one(array("ji+ji+"),array("ji+gi+"),0);
	storedata('7.3.57','sa',0);
}
if ($debug===1) {dibug("3300");}
/* vibhASA ceH (7.3.58) */
if ( ($sanDai=="san" || $lakAra==="liw") &&  sub(array("ci+ci"),array("+"),array(""),0) )
{
	$text = one(array("ci+ci+"),array("ci+ki+"),1);
	storedata('7.3.58','sa',0);
}
/* kGiti ca (1.1.5) */
if ( (in_array("N",$itpratyaya) || in_array("k",$itpratyaya)) && !in_array($sanAdi,array("Ric")) && pr2(array("i","I","u","U","f","F","x","X"),array("+"),$tiG1,array("i","I","u","U","f","F","x","X"),array("+i"),$tiG1,$text)!==$text  && $kGiti!==1)
{
	storedata('1.1.5','sa',0);
    $kGiti=1;
}
/* sici vRddhiH parasmaipadeSu (7.2.1) */
//if ( $sic===1 && in_array($so,$tis) && sub($ik,array("+"),array("s","is"),0) )
if ( $sic===1 && in_array($so,$tis) && sub($ik,array("+"),array("sI","isI"),0) )
{
    $text=three($ik,array("+"),array("sI","isI"),vriddhi($ik),array("+"),array("sI","isI"),0);
    $text=one(array("sI+s"),array("+sIs"),0);
	storedata('7.2.1','sa',0);
	$kGiti=1;
	$sicivRddhi=1;
}
/* RcCatyRRtAm (7.4.11) */
if ($lakAra==="liw" && (in_array($fo,array("f","fCa!")) || ends(array($fo),array("F"),1) ) && sub(array("A+f","A+fcC","A+nf","A+nfcC","F"),array("+"),blank(0),0) )
{
	$text = two(array("A+f","A+fcC","A+nf","A+nfcC","F"),array("+"),array("A+ar","A+arcC","A+nar","A+narcC","ar"),array("+"),0);
	storedata('7.4.11','sa',0);
}
/* udoSThyapUrvasya (7.1.102) */
if ( in_array($fo,array("pF","PF","bF","BF","mF")) && sub(array("F"),array("+"),$apit_sArvadhAtuka_pratyayas,0) && in_array($so,$tiG) )
{
    $text=three(array("F"),array("+"),$apit_sArvadhAtuka_pratyayas,array("ur"),array("+"),$apit_sArvadhAtuka_pratyayas,0);
	storedata('7.1.102','sa',0);
}
/*elseif ($vras===1) // escaping this - because vrazca... is tripAdI function.
{
}*/
elseif(arr($text,'/gup\+Ay/'))
{
	$text = one(array("gup+Ay",),array("gopAy",),0); // for accomodating Aya pratyaya
	storedata('7.3.86','sa',0);
}
elseif(arr($text,'/p\+i\+/') && sub(array("fp","hrIp","vlIp","rIp","knUp","kzmAp","blIp"),array("+"),array("i+"),0)  && $vijait!==1) // for puganta
{
	$text = three(array("fp","hrIp","vlIp","rIp","knUp","kzmAp","blIp"),array("+"),array("i+"),array("arp","hrep","vlep","rep","knop","kzmAp","blep"),array("+"),array("i+"),0); 
	storedata('7.3.86','sa',0);
}
/* pugantalaghUpadhasya ca (7.3.86) */
elseif ($atolopa!==1 && !($verbset==="tudAdi" && $sarvadhatuka===1) && ($sarvadhatuka===1 || $ardhadhatuka===1) && arr($text,'/[iufx]['.pc('hl').'][+]/')  && $didhI!==1 && $vijait!==1 && sub(array("i","u","f","x"),$hl,array("+u+","+i+","+a+","+et","+eT","+isy","+syeT","+sya"),0) && !in_array("N",$itpratyaya) && !in_array("k",$itpratyaya) && $caG!==1 && $aG!==1)
{
    $text=three(array("i","u","f","x"),$hl,array("+u+","+i+","+a+"),array("e","o","ar","al"),$hl,array("+u+","+i+","+a+"),0);
	$text=three(array("i","u","f","x"),$hl,array("+et","+eT","+isy","+syeT","+sya"),array("e","o","ar","al"),$hl,array("+et","+eT","+isy","+syeT","+sya"),0);
	storedata('7.3.86','sa',0);
}
/* pugantalaghUpadhasya ca (7.3.86) */
elseif ($atolopa!==1 && $ardhadhatuka===1 && $kGiti!==1  && $didhI!==1 && $vijait!==1 && $sIyuT!==1 && $ksa!==1 && $vijait!==1&& !in_array("k",$itpratyaya) && !in_array("N",$itpratyaya) && arr($text,'/[iufx]([+]*)['.pc('hl').']\+/') && pr2(array("i","u","f","x"),$hlplus,$ArdhadhAtuka_tiG_pratyayas,array("e","o","ar","al"),$hlplus,$ArdhadhAtuka_tiG_pratyayas,$text)!==$text  && $caG!==1 && $aG!==1)
{
    $text=pr2(array("i","u","f","x"),$hlplus,$ArdhadhAtuka_tiG_pratyayas,array("e","o","ar","al"),$hlplus,$ArdhadhAtuka_tiG_pratyayas,$text);
	$text = three(array("GarR","tarR","arR","kzeR",),array("+"),array("sta","sTAs"),array("GfR","tfR","fR","kziR"),array("+"),array("sta","sTAs"),1); // see sahajabodha part 2 page 250.
	storedata('7.3.86','sa',0);
}
/* nAbhyastasyAci piti sArvadhAtuke (7.3.87) */
elseif ( ($sarvadhatuka===1 || $ardhadhatuka===1) && in_array($fo,array("Riji!r","viji!r","vizx!")) && pr2(array("i","u","f","x"),$hlplus,$ajAdi_pit_sArvadhAtuka_pratyayas,array("e","o","ar","al"),$hlplus,$ajAdi_pit_sArvadhAtuka_pratyayas,$text)!==$text)
{
	storedata('7.3.87','pa',0);
}
/* pugantalaghUpadhasya ca (7.3.86) */
elseif ( $atolopa!==1 && ($sarvadhatuka===1 || $ardhadhatuka===1) && arr($text,'/[iufx]['.pc('hl').'][+]/') && pr2(array("i","u","f","x"),$hlplus,$pit_sArvadhAtuka_pratyayas,array("e","o","ar","al"),$hlplus,$pit_sArvadhAtuka_pratyayas,$text)!==$text && !arr($text,"/[+][i][y][+][t]$/")  && $didhI!==1 && $kGiti===0 && $ksa!==1 && $vijait!==1 && !($verbset==="tudAdi" && $sarvadhatuka===1) && $caG!==1 && $aG!==1)
{
    $text=pr2(array("i","u","f","x"),$hlplus,$pit_sArvadhAtuka_pratyayas,array("e","o","ar","al"),$hlplus,$pit_sArvadhAtuka_pratyayas,$text);
	storedata('7.3.86','sa',0);
}
/* pugantalaghUpadhasya ca (7.3.86) */
elseif ( $atolopa!==1 && $ardhadhatuka===1 && arr($text,'/[iufx]['.pc('hl').'][+]/') && pr2(array("i","u","f","x"),$hlplus,$ArdhadhAtuka_pratyayas,array("e","o","ar","al"),$hlplus,$ArdhadhAtuka_pratyayas,$text)!==$text && !arr($text,"/[+][i][y][+][t]$/")  && $didhI!==1 && $kGiti!==1 && $sIyuT!==1 && $ksa!==1 && $vijait!==1 && !($verbset==="tudAdi" && $sarvadhatuka===1) && $caG!==1 && $aG!==1)
{
    $text=pr2(array("i","u","f","x"),$hlplus,$ArdhadhAtuka_pratyayas,array("e","o","ar","al"),$hlplus,$ArdhadhAtuka_pratyayas,$text);
	storedata('7.3.86','sa',0);
}
/* RdRzo'Gi guNaH (7.4.16) */
elseif ( $lakAra==="luN" && in_array("N",$itpratyaya) && sub(array("f","dfS"),array("+"),array("a"),0) )
{
    $text=two(array("f","dfS"),array("+a"),array("ar","darS"),array("+a"),0);
	storedata('7.4.16','sa',0);
}
/* kGiti ca (1.1.5) */
elseif ( $atolopa!==1 && $ardhadhatuka===1 && arr($text,'/[iufxIUFX]['.pc('hl').'][+][s][I][y][+]/') && !arr($text,"/[+][i][y][+][t]$/")  && $didhI!==1 && $sIyuT===1 && (in_array("N",$it)||in_array("k",$it))  && $kGiti!==1)
{
	storedata('1.1.5','sa',0);
    $kGiti=1;
} 
/* pugantalaghUpadhasya ca (7.3.86) */
// for pratyayas deleted by halGyAb..
elseif ( $atolopa!==1 && ($sarvadhatuka===1 || $ardhadhatuka===1) && arr($text,'/[iufx]['.pc('hl').'][+]$/') && pr2(array("i","u","f","x"),$hlplus,blank(0),array("e","o","ar","al"),$hlplus,blank(0),$text)!==$text  && $didhI!==1 && $ksa!==1 && $vijait!==1 && !($verbset==="tudAdi" && $sarvadhatuka===1) && $caG!==1 && $aG!==1)
{
    $text=pr2(array("i","u","f","x"),$hlplus,blank(0),array("e","o","ar","al"),$hlplus,blank(0),$text);
	storedata('7.3.86','sa',0);
}
/* pugantalaghUpadhasya ca (7.3.86) */
elseif (in_array($fo,array("vida!"))  && $didhI!==1 && $ksa!==1 && $vijait!==1 && (pr2(array("vid"),array("+"),$pit_sArvadhAtuka_pratyayas,array("ved"),array("+"),$pit_sArvadhAtuka_pratyayas,$text)!== $text || pr2(array("vid"),array("+"),blank(0),array("ved"),array("+"),blank(0),$text)!== $text)  && $caG!==1 && $aG!==1)
{
    $text=pr2(array("vid"),array("+"),$pit_sArvadhAtuka_pratyayas,array("ved"),array("+"),$pit_sArvadhAtuka_pratyayas,$text);
    $text=pr2(array("vid"),array("+"),blank(0),array("ved"),array("+"),blank(0),$text);
	storedata('7.3.86','sa',0);
}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
elseif ($didhI!==1 && $bhUsuvo!==1  && $kGiti!==1 && arr($text,'/nu/') && pr2(array("nu+"),$pit_sArvadhAtuka_pratyayas,blank(0),array("no+"),$pit_sArvadhAtuka_pratyayas,blank(0),$text) !== $text )
{
    $text=pr2(array("nu+"),$pit_sArvadhAtuka_pratyayas,blank(0),array("no+"),$pit_sArvadhAtuka_pratyayas,blank(0),$text);    
	storedata('7.3.84','sa',0);
}
if ($debug===1) {dibug("3400");}
foreach ($tiG1 as $value) {$iDtiG = "i".$value;} // defining iDtiG i.e. iDAgama+tiG1.
/* sidhyaterapAralaukike (6.1.49) */
if ( $_GET['cond53']==='2' && sub(array("seD"),array("+"),array("i+"),0) )
{
    $text=three(array("seD"),array("+"),array("i+"),array("sAD"),array("+"),array("i+"),0);    
	storedata('6.1.49','sa',0);
}
/* cisphurorNau (6.1.54) */
if ( in_array($fo,array("ciY","sPura!")) && in_array($so,$tiG) && sub(array("ce","sPor"),array("+"),array("i+"),0) && !sub(array("cA","sPAr"),array("+"),array("i+"),0) )
{
    $text=three(array("ce","sPor"),array("+"),array("i+"),array("cA","sPAr"),array("+"),array("i+"),1);
	storedata('6.1.54','sa',0);
}
// caG for ajAdi
/* bhrAjabhAsabhASadIpajIvamIlapIDamnyatarasyAm (7.4.3) */
if ( in_array($so,$tiG) && $luGset===5 && sub(array("BrAj","BAs","BAS","dIp","jIv","mIl","pIq"),array("+"),array("i+a"),0))
{
	$text = three(array("BrAj","BAs","BAS","dIp","jIv","mIl","pIq"),array("+"),array("i+a"),array("Braj","Bas","BaS","dip","jiv","mil","piq"),array("+"),array("i+a"),1);
	storedata('7.4.3','sa',0);
}
/* nAglopizAsvRditAm (7.4.2) */
elseif ( in_array($so,$tiG) && (in_array($fo,$curAdi_adanta) || in_array($fo,array("SAsu!")) || in_array($fo,$Rditverbs)) && $luGset===5 && sub(array("A","I","U","F","X","e","E","o","O"),$hl,array("+i+a"),0) )
{
	storedata('7.4.2','sa',0);
}
/* Nau caGi upadhAyA hrasvaH (7.4.1) */
elseif ( in_array($so,$tiG)  && $luGset===5 && !arr($text,'/^['.pc('ac').']/') && sub(array("A","I","U","F","X","e","E","o","O"),$hl,array("i+a"),0) )
{
	$text = three(array("A","I","U","F","X","e","E","o","O"),$hl,array("i+a"),array("a","i","u","f","x","i","i","u","u"),$hl,array("i+a"),0);
	storedata('7.4.1','sa',0);
}
/* urRt (7.4.7) */
if ( in_array($so,$tiG)  && $luGset===5 && !arr($text,'/^['.pc('ac').']/') && sub(array("ar"),$hlplus,array("i+a"),0) )
{
    $text=three(array("ar"),$hlplus,array("i+a"),array("f"),$hlplus,array("i+a"),1);
	storedata('7.4.7','sa',0);
}
if ($caG===1 && arr($text,'/^['.pc('ac').']/') )
{
	//$text = one(array("+i+"),array("i+"),0);
	caG_ajAdi();
}
// trial san function
if ($caG===1 && ($sanAdi==="Ric" || $verbset==="curAdi") && !in_array($fo,$curAdi_adanta) && arr($text,'/^[^+]*[+]['.pc('hl').']*[aiuf]['.pc('hl').']{0,1}/'))
{
	storedata('7.4.93','pa',0);
	san();
}
/* kRpo ro laH (8.2.18) */
if (arr($text,'/kfp/') )
{
    $text=one(array("kfp"),array("kxp"),0);
	storedata('8.2.18','sa',0);
}
/* aniditAM hala upadhAyAH kGiti (6.4.24) */ 
if ( in_array($fo,$aniditverbs) && (in_array("N",$itpratyaya) || in_array("k",$itpratyaya)) && !in_array($sanAdi,array("Ric"))  && $so!=="mahiN" && arr($text,'/[NYRnmM]['.pc('hl').'][+]/')  && !in_array("i",$it) && $lakAra!=="viDiliN" && $verbset!=="ruDAdi" && $aniditAm!==1) # For application after NeraniTi
{
	if ($ancu===2)
	{
		$text = three(array("N","Y","R","n","m","M"),$hl,array("+"),array("","","","","","",),$hl,array("+"),1);        
		storedata('6.4.24','sa',0);
		$aniditAm = 1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.				
	}
	else
	{
		$text = three(array("N","Y","R","n","m","M"),$hl,array("+"),array("","","","","","",),$hl,array("+"),0);        
		storedata('6.4.24','sa',0);
		$aniditAm = 1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.		
	}
}
if ($debug===1) {dibug("3500");}
/* usyapadAntasya (6.1.96) */
if (arr($text,'/[aA]([+]*)us/') )
{
	$text=one(array("+yAus"),array("+yus"),0); // See https://github.com/drdhaval2785/SanskritVerb/issues/215.
    $text=two(array("a","A"),array("+us"),array("",""),array("+us"),0);
	$text=one(array("+s+us+","+us"),array("+sus","us"),0);
	storedata('6.1.96','sa',0);
}
/* special treatment of qukfY */
if ($fo==="qukfY")
{
	$text = one(array("+yA+"),array("+yA"),0);
	$text = two(array("+Iy+"),$ac,array("+Iy"),$ac,0);
	$text = one(array("+AE"),array("+E"),0);
	if (arr($text,'/yAam$/'))
	{
		$text = one(array("yAam"),array("yAm"),0);
		storedata('6.1.101','sa',0);
	}
	$karoti = 1;
	if (arr($text,'/kf[+]us$/'))
	{
		$text = one(array("kf+us"),array("kr+us"),0);
		storedata('6.1.77','sa',0);
	}
	else
	{
		$text = one(array("kf+u"),array("kar+u"),0);
		storedata('7.3.84','sa',0);		
	}
	/* ata ut sArvadhAtuke (6.4.110) */
	if ($sarvadhatuka===1 && pr2(array("kar+u"),array("+"),$apit_sArvadhAtuka_pratyayas,array("kur+u"),array("+"),$apit_sArvadhAtuka_pratyayas,$text)!==$text)
	{
		$text=pr2(array("kar+u"),array("+"),$apit_sArvadhAtuka_pratyayas,array("kur+u"),array("+"),$apit_sArvadhAtuka_pratyayas,$text);
		storedata('6.4.110','sa',0);
	}
	/* iko yaNaci (6.1.77) */
	if (arr($text,'/kur[+]u[+]['.pc('ac').']/'))
	{
		$text = two(array("kur+u+"),$ac,array("kur+v+"),$ac,0);
		storedata('6.1.77','sa',0);
	}
	/* nityaM karoteH (6.4.108) */
	if (arr($text,'/^kur[+]u[+][vm]/'))
	{
		$text=one(array("kur+u+v","kur+u+m"),array("kur+v","kur+m"),0);
		storedata('6.4.108','sa',0);
	}
	/* ye ca (6.4.109) */
	if (arr($text,'/^kur[+]u[+]y/'))
	{
		$text=one(array("kur+u+y"),array("kur+y"),0);
		storedata('6.4.109','sa',0);
	}
}

/* kGiti ca (1.1.5) */
if (($sarvadhatuka===1 || $ardhadhatuka===1) &&  (in_array("N",$it)||in_array("k",$it)) && $didhI!==1 && arr($text,'/[iIuUfFxX]\+sI/') && $kGiti!==1)
{
	storedata('1.1.5','sa',0);
    $kGiti=1;
}
/* bhUsuvostiGi (7.3.88) */
if ( ($sarvadhatuka===1 || $verbset==="adAdi" ) && in_array($fo,array("BU","zUN","asa!")) && arr($text,'/[Bs]U\+/') && pr2(array("BU","sU"),array("+"),$sArvadhAtuka_tiG_pratyayas,array("Bu","su"),array("+"),$sArvadhAtuka_tiG_pratyayas,$text)!==$text )
{
	storedata('7.3.88','sa',0);
	$bhUsuvo=1;
}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
if ( $didhI!==1 && $kGiti!==1 && !($lakAra==="liw" && in_array($fo,array("uN"))) && arr($text,'/[iIuUfFxX]\+[uiae]\+/') && ($sarvadhatuka===1 || $ardhadhatuka===1) && !($ad===1 && sub(array("i","I","u","U","f","F","x","X"),array("+"),$ajAdi_apit_sArvadhAtuka_pratyayas,0) ) )
{
    $text=two(array("i","I","u","U","f","F","x","X",),array("+u+","+I+","+a+","+e"),array("e","e","o","o","ar","ar","al","al",),array("+u+","+I+","+a+","+e"),0);
	storedata('7.3.84','sa',0);
}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
// for curAdis.
if ($vik===array("Sap")  && $didhI!==1  && $bhUsuvo!==1 && $kGiti!==1 && arr($text,'/i\+a\+/') && sub($hl,array("i+"),array("a+"),0))
{
    $text=three($hl,array("i+"),array("a+"),$hl,array("e+"),array("a+"),0);    
	storedata('7.3.84','sa',0);
}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
if ($didhI!==1 && $bhUsuvo!==1  && $kGiti!==1 && pr2($hl,array("+u+"),$pit_sArvadhAtuka_pratyayas,$hl,array("+o+"),$pit_sArvadhAtuka_pratyayas,$text) !== $text )
{
    $text=pr2($hl,array("+u+"),$pit_sArvadhAtuka_pratyayas,$hl,array("+o+"),$pit_sArvadhAtuka_pratyayas,$text);    
	storedata('7.3.84','sa',0);
}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
if ( ($sarvadhatuka===1 || $ardhadhatuka===1)   && $didhI!==1 && $bhUsuvo!==1 && arr($text,'/\+I\+/') && pr2(array("i","I","u","U","f","F","x","X",),array("+I+"),$halAdi_pit_sArvadhAtuka_pratyayas,array("e","e","o","o","ar","ar","al","al",),array("+I"),$halAdi_pit_sArvadhAtuka_pratyayas,$text)!==$text )
{
    $text=pr2(array("i","I","u","U","f","F","x","X",),array("+I+"),$halAdi_pit_sArvadhAtuka_pratyayas,array("e","e","o","o","ar","ar","al","al",),array("+I"),$halAdi_pit_sArvadhAtuka_pratyayas,$text);
	storedata('7.3.84','sa',0);
}
$text = one(array("sI+t","sI+s"),array("sIt","sIs"),0); // See https://github.com/drdhaval2785/SanskritVerb/issues/281
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
// Patch for znu. See https://github.com/drdhaval2785/SanskritVerb/issues/451
if (arr($text,'/[+]nu[+]tu$/') || arr($text,'/[+]u[+]tu$/') || arr($text,'/f[+]tu$/') || arr($text,'/f[+]us$/') )
{
	$text = one(array("+nu+tu","+u+tu","f+tu","f+us"),array("+no+tu","+o+tu","ar+tu","ar+us"),0);
	storedata('7.3.84','sa',0);
}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
if ( ($sarvadhatuka===1 || $ardhadhatuka===1)   && $didhI!==1 && $bhUsuvo!==1 && $kGiti!==1 && arr($text,'/[iIuUfFxX]\+/') && pr2(array("i","I","u","U","f","F","x","X",),array("+"),$halAdi_pit_sArvadhAtuka_pratyayas,array("e","e","o","o","ar","ar","al","al",),array("+"),$halAdi_pit_sArvadhAtuka_pratyayas,$text)!==$text )
{
    $text=pr2(array("i","I","u","U","f","F","x","X",),array("+"),$halAdi_pit_sArvadhAtuka_pratyayas,array("e","e","o","o","ar","ar","al","al",),array("+"),$halAdi_pit_sArvadhAtuka_pratyayas,$text);
	storedata('7.3.84','sa',0);
}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
if ( $sarvadhatuka===1  && $didhI!==1 && $bhUsuvo!==1 && $kGiti!==1 && arr($text,'/[iIuUfFxX]\+/') && pr2(array("i","I","u","U","f","F","x","X",),array("+"),$ajAdi_pit_sArvadhAtuka_pratyayas,array("e","e","o","o","ar","ar","al","al",),array("+"),$ajAdi_pit_sArvadhAtuka_pratyayas,$text)!==$text )
{
    $text=pr2(array("i","I","u","U","f","F","x","X",),array("+"),$ajAdi_pit_sArvadhAtuka_pratyayas,array("e","e","o","o","ar","ar","al","al",),array("+"),$ajAdi_pit_sArvadhAtuka_pratyayas,$text);
	storedata('7.3.84','sa',0);
}
/* vibhASA lIyateH (6.1.50) */
if ( ((in_array($fo,array("lI")) && $verbset==="kryAdi") || (in_array($fo,array("lIN")) && $verbset==="none") ) && arr($text,'/l[eE]\+/'))
{
    $text=three(array("le","lE"),array("+"),blank(0),array("lA","lA"),array("+"),blank(0),1);    
	storedata('6.1.50','sa',0);
}
/* otaH zyani (7.3.71) */
if (arr($text,'/o\+ya\+/') && sub(array("o"),array("+ya+"),$sArvadhAtuka_pratyayas,0) && in_array($so,$tiG) )
{
    $text=three(array("o"),array("+ya+"),$sArvadhAtuka_pratyayas,array(""),array("ya+"),$sArvadhAtuka_pratyayas,0);
	storedata('7.3.71','sa',0);
}
/* dadhastathozca (8.2.38) */
if (arr($text,'/daDA\+/') && sub(array("daDA"),array("+"),array("tas","Tas","Ta","te","se","Dve","tAt","tAm","tam","ta","sva","Dvam","TAs",),0) && in_array($so,$tiG) )
{
    $text=three(array("daDA"),array("+"),array("tas","Tas","Ta","te","se","Dve","tAt","tAm","tam","ta","sva","Dvam","TAs",),array("DaD"),array("+"),array("tas","Tas","Ta","te","se","Dve","tAt","tAm","tam","ta","sva","Dvam","TAs",),0);
	storedata('8.2.38','sa',0);
}
if ($debug===1) {dibug("3600");}
/* bhiyo'nyatarasyAm (6.4.115) */
if (arr($text,'/biBI/') && sub(array("biBI"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,0) && in_array($so,$tiG) )
{
    $text=three(array("biBI"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("biBi"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,1);
	storedata('6.4.115','sa',0);
}
/* znA'bhyastayorAtaH (6.4.112) */
/*if ( arr($text,'/da[dD]A/') && sub(array("dadA","daDA"),array("+"),$apit_sArvadhAtuka_pratyayas,0) && (in_array("N",$it)||in_array("k",$it)))
{
    $text=three(array("dadA","daDA"),array("+"),$apit_sArvadhAtuka_pratyayas,array("dad","daD"),array("+"),$apit_sArvadhAtuka_pratyayas,0);
	storedata('6.4.112','sa',0);
}*/
/* znA'bhyastayorAtaH (6.4.112) */
if (arr($text,'/A[+]/') && $abhyasta===1 && pr2(array("A"),array("+"),$apit_sArvadhAtuka_pratyayas,array(""),array("+"),$apit_sArvadhAtuka_pratyayas,$text)!==$text && !arr($text,'/[+]yA[+][mv]a/'))
{
	if ($so==="sip" && $lakAra==="liw")
	{
		$text=array_merge($text,pr2(array("A"),array("+"),$apit_sArvadhAtuka_pratyayas,array(""),array("+"),$apit_sArvadhAtuka_pratyayas,$text));
	}
	else
	{
		$text=pr2(array("A"),array("+"),$apit_sArvadhAtuka_pratyayas,array(""),array("+"),$apit_sArvadhAtuka_pratyayas,$text);
	}
	storedata('6.4.112','sa',0);
}
/* znA'bhyastayorAtaH (6.4.112) */
// Patch for liT (Because asaMyogAlliT kit)
if (arr($text,'/A[+]/') && $abhyasta===1 && pr2(array("A"),array("+"),array("atus","aTus","a","ire"),array(""),array("+"),array("atus","aTus","a","ire"),$text)!==$text)
{
    $text=pr2(array("A"),array("+"),array("atus","aTus","a","ire"),array(""),array("+"),array("atus","aTus","a","ire"),$text);
	storedata('6.4.112','sa',0);
}
/* gamahanajanakhanaghasAM lopaH kGiti (6.4.98) */
if (in_array($fo,array("gamx!","hana!","jana!","Gasa!","Kanu!","janI!","ada!")) && ends($itpratyaya,array("k","N"),2) && sub(array("gam","Gan","jan","Gas","Kan"),array("+"),$ac,0) && in_array($so,$tiG) && $aG!==1 && !in_array("N",$it))
{
    $text=three(array("gam","Gan","jan","Gas","Kan"),array("+"),$ac,array("gm","Gn","jn","Gs","Kn"),array("+"),$ac,0);
	storedata('6.4.98','sa',0);
}
/* aDgArgyagAlavayoH (7.3.99) */
if (in_array($fo,array("rudi!r","Yizvapa!","zvapa!","Svasa!","prARa!","ana!","jakza!")) && pr2(array("rod","svap","Svas","prAR","an","jakz","rud"),array("+"),array("t","s"),array("rod","svap","Svas","prAR","an","jakz","rud"),array("+"),array("at","as"),$text)!==$text && in_array($so,$tiG) )
{
    $text1=pr2(array("rod","svap","Svas","prAR","an","jakz","rud"),array("+"),array("t","s"),array("rod","svap","Svas","prAR","an","jakz","rud"),array("+"),array("at","as"),$text);
    $text = array_merge($text,$text1);
	storedata('7.3.99','sa',0);
}
/* rudazca paJcabhyaH (7.3.98) */
if (in_array($fo,array("rudi!r","Yizvapa!","zvapa!","Svasa!","prARa!","ana!","jakza!")) && pr2(array("rod","svap","Svas","prAR","an","jakz","rud"),array("+"),array("t","s"),array("rod","svap","Svas","prAR","an","jakz","rud"),array("+"),array("It","Is"),$text)!==$text && in_array($so,$tiG) )
{
    $text=pr2(array("rod","svap","Svas","prAR","an","jakz","rud"),array("+"),array("t","s"),array("rod","svap","Svas","prAR","an","jakz","rud"),array("+"),array("It","Is"),$text);
	storedata('7.3.98','sa',0);
}
/* rudAdibhyaH sArvadhAtuke (7.2.76) */
if ($sarvadhatuka===1 && in_array($fo,array("rudi!r","Yizvapa!","zvapa!","Svasa!","prARa!","ana!","jakza!")) && sub(array("rod","svap","Svas","prAR","an","jakz","rud"),array("+"),prat('vl'),0) && in_array($so,$tiG))
{
    $text=three(array("rod","svap","Svas","prAR","an","jakz","rud"),array("+"),prat('vl'),array("rod","svap","Svas","prAR","an","jakz","rud"),array("+i"),prat('vl'),0);
	storedata('7.2.76','sa',0);
}
/* hujhalbhyo herdhiH (6.4.101) */
if ( $so==="sip" && $lakAra==="low" && (arr($text,'/juhu\+hi/') || arr($text,'/['.pc('Jl').']\+hi/')) )
{
    $text=two(array("juhu"),array("+hi"),array("juhu"),array("+Di"),0);
    $text=two(prat('Jl'),array("+hi"),prat('Jl'),array("+Di"),0);
	storedata('6.4.101','sa',0);
}
/* hanterjaH (6.4.36) */
if ( arr($text,'/han\+hi/') && in_array($so,$tiG) )
{
    $text = two(array("han"),array("+hi"),array("ja"),array("+hi"),0);
	storedata('6.4.36','sa',0);
    $hanterjaH=1;
}
/* vA gamaH (1.2.13) */
if ($fo==="gamx!" && in_array($so,$taG) && ($sic===1||$sIyuT===1) )
{
	storedata('1.2.13','pa',0);
	$vAgamaH=1;
} else {$vAgamaH=0;}
/* vibhASopayamane (1.2.16) */
if ($fo==="yama!" && in_array($so,$taG) && ($sic===1||$sIyuT===1) && $_GET['cond56']==='2')
{
	storedata('1.2.16','pa',0);
	$vAgamaH=1;
}
/* ghvasoreddhAvabhyAsalopazca (6.4.119) */
if (in_array($fo,array("qudAY","quDAY","dAY","DAY")) && sub(array("dadA","daDA"),array("+"),array("hi"),0) && in_array($so,$tiG) ) 
{
    $text=two(array("dadA","daDA"),array("+hi"),array("de","De",),array("+hi"),0);
	storedata('6.4.119','sa',0);
}
if ($debug===1) {dibug("3700");}
/* ghvasoreddhAvabhyAsalopazca (6.4.119) */
if (arr($text,'/as\+Di/') && in_array($so,$tiG) && ends(array($fo),array("asa!",),4) && $verbset==="adAdi") 
{
    $text=two(array("as"),array("+Di"),array("e"),array("+Di"),0);
	storedata('6.4.119','sa',0);
}
/* erliGi (6.4.67) */
if ( (in_array($fo,array("mA","zWA","gE","pA","o!hAk","zo")) || $ghu===1) && in_array($so,$tiG) && in_array($lakAra,array("ASIrliN")) && arr($text,'//A\+y') && $verbset!=="adAdi" ) // not applicable to pA of adAdi. Not applicable to sIyuT.
{
	$text = one(array("A+y"),array("e+y"),0);
	storedata('6.4.67','sa',0);
}
/* vA'nyasya saMyogAdeH (6.4.68) */
if ( (arr($text,'/['.pc('hl').']['.pc('hl').'][A][+][y]/')) && in_array($so,$tiG) && in_array($lakAra,array("ASIrliN")) ) // Not applicable to sIyuT.
{
	$text = one(array("A+y"),array("e+y"),1);
	storedata('6.4.68','sa',0);
}
/* skoH saMyogAdyorante ca (8.2.29) */
if ( (arr($text,'/[s]['.flat($hl).']$/') || arr($text,'/vr[aA]Sc\+/')) && in_array($so,$tiG) && in_array($lakAra,array("ASIrliN")) && $asyati!==1) // for ASIrliN
{
	foreach ($hl as $value) { $ska[] = "s".$value; }
	$text = last($ska,$hl,0);
	$text = one(array("+yAs+","vraSc","vrASc"),array("+yA+","vrac","vrAc"),0);
	storedata('8.2.29','sa',0);
}
/* grahijyAvayivyadhivaSTivicativRzcatipRcCatibhRjjatInAM Giti ca (6.1.16) */
if (in_array($fo,array("jyA")) && in_array("N",$it) && $so!=="mahiN")
{
    $text=two(array("jyA"),array("+"),array("jiA"),array("+"),0);
	storedata('6.1.16','sa',0);
/*    $text=two(array("jiA"),array("+"),array("ji"),array("+"),0);
	storedata('6.1.104','sa',0);
 */
    $text = samprasarana(array("jyA"),0);
    $text=two(array("ji"),array("+"),array("jI"),array("+"),0);
	storedata('6.4.2','sa',0);
    $text=two(array("jI"),array("+"),array("ji"),array("+"),0);
	storedata('7.3.80','sa',0);
}
/* znA'bhyastayorAtaH (6.4.112) */
// For znA
if (arr($text,'/\+nA\+/') && sub(array("+nA"),array("+ant"),blank(0),0) && (in_array("N",$it)||in_array("k",$it)) && in_array("SnA",$vik))
{
    $text=two(array("+nA"),array("+ant"),array("n"),array("+ant"),0);
	storedata('6.4.112','sa',0);
}
/* abhyAsasyAsavarNe (6.4.78) */
if ( arr($text,'/^[iIuU][+]*[aAfFxeoEO]/') && $abhyAsa===1)
{
    $text=change('/^([iI])([+]*[aAfFxeoEO])/','$1y$2');
    $text=change('/^([uU])([+]*[aAfFxeoEO])/','$1v$2');
	storedata('6.4.78','sa',0);
	$abhyAsasyAsavarNe=1;
}
/* na mAGyoge (6.4.74) */
if ( in_array($lakAra,array("luN","laN","lfN",)) && $_GET['cond50']==='1')
{
	storedata('6.4.74','sa',0);
}
/* ADajAdInAm (6.4.72) */
// udAttatva pending.
elseif ( in_array($lakAra,array("luN","laN","lfN",)) && arr($text,'/^['.pc('ac').']/') )
{
    $text=Adyanta($text,"A",1);
	storedata('6.4.72','sa',0);
    $Agama=array("Aw");
}
/* luGlaGlRGkSvaDudAttaH (6.4.71) */
// udAttatva pending.
elseif ( in_array($lakAra,array("luN","laN","lfN",)) )
{
    $text=Adyanta($text,"a",1);
	storedata('6.4.71','sa',0);
}
/* znasorallopaH (6.4.111) */
// znam pending.
if ( (in_array($fo,array("asa!")) && $verbset==="adAdi" ) && (in_array("N",$it)||in_array("k",$it)) && pr2(array("as"),array("+",),$apit_sArvadhAtuka_pratyayas,array("s"),array("+",),$apit_sArvadhAtuka_pratyayas,$text)!==$text )
{
    $text=pr2(array("as"),array("+",),$apit_sArvadhAtuka_pratyayas,array("s"),array("+",),$apit_sArvadhAtuka_pratyayas,$text);
	storedata('6.4.111','sa',0);
}
if ( (in_array($fo,array("asa!")) && $verbset==="adAdi" ) && (in_array("N",$it)||in_array("k",$it)) && arr($text,'/as[+]yA[+]/') )
{
    $text=change('/^as[+]yA[+]/','syA+');
	storedata('6.4.111','sa',0);
}
/* iNvadika iti vaktavyam (vA) */
if ( in_array($fo,array("ik")))
{
	storedata('2.4.45-1','sa',0);
}
/* uzca (1.2.12) */
if ( in_array($so,$taG) && ($sic===1||$sIyuT===1) && ends(array($verb_without_anubandha),array("f","F"),1) )
{
	storedata('1.2.12','sa',0);
	$kGiti=1;
	/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
	// patch because it applies only before aniT in this case. for iDAgama it is not applicable.
	if (arr($text,'/[fF]\+isI/') && ($sarvadhatuka===1 || $ardhadhatuka===1) && !($ad===1 && sub(array("i","I","u","U","f","F","x","X"),array("+"),$ajAdi_apit_sArvadhAtuka_pratyayas,0) )  && $didhI!==1 && $bhUsuvo!==1)
	{
		$text=two(array("f","F"),array("+isI"),array("ar","ar"),array("+isI"),0);
		storedata('7.3.84','sa',0);
	}
}
/* tAsi ca klRpaH (7.2.60) */
// tAsi done here. sakArAdi elsewhere.
if ($id_dhAtu==="sew" && $id_pratyaya==="sew" && $tAs===1  && !in_array("iw",$Agama) && arr($text,'/kalp+tA/') ) // for seT dhAtus
{
    $text=one(array("+"),array("+i"),1);
	storedata('7.2.60','sa',0);
	$Agama=array_merge($Agama,array("iw"));
}
/* tISasahalubharuSariSaH (7.2.48) */
if ( $tAs===1  && !in_array("iw",$Agama) && (in_array($fo,array("saha!","luBa!","ruza!","riza!"))|| (in_array($fo,array("iza!",)) && $verbset==="tudAdi")) && sub(array("ez","sah","loB","roz","rez"),array("+tA"),blank(0),0) ) 
{
    $text=one(array("+"),array("+i"),1);
	storedata('7.2.48','sa',0);
	$Agama=array_merge($Agama,array("iw"));
}
if ($debug===1) {dibug("3800");}
/* sthAdhvoricca (1.2.17) */
if ( in_array($fo,array("do","deN","qudAY","dAR","Dew","quDAY","zWA")) && sub(array("A+"),array("s"),blank(0),0) && $lakAra!=="" && $sic!==0 )
{
    $text=two(array("A+"),array("s"),array("i+"),array("s"),0);
	storedata('1.2.17','sa',0);
}
/* ghumAsthAgApAjahAtisAM hali (6.4.66) */
if ( in_array($fo,array("do","deN","qudAY","dAR","Dew","quDAY","mA","zWA","iN","pA","hA","sA","gAN")) && ends($it,array("N","k"),2) && arr($text,'/a[+]['.pc('ac').']/') && sub(array("A+"),$ArdhadhAtuka_pratyayas,blank(0),0) && $lakAra!=="" )
{
    $text=two(array("A+"),$ArdhadhAtuka_pratyayas,array("I+"),$ArdhadhAtuka_pratyayas,0);
	storedata('6.4.66','sa',0);
}
/* vibhASA lIyateH (6.1.50) */
if ( ((in_array($fo,array("lI")) && $verbset==="kryAdi") || (in_array($fo,array("lIN")) && $verbset==="divAdi") ) && sub(array("le","lE"),array("+"),blank(0),0) )
{
    $text=two(array("le","lE"),array("+"),array("lA","lA"),array("+"),1);    
	storedata('6.1.50','sa',0);
	if (in_array($sanAdi,array("Ric","RiN")))
	{
		/* arttihrIvlIrIknUyIkSmAyyAtAM puGNau (7.3.36) */
		$text=two(array("A"),array("+"),array("Ap"),array("+"),0);
		storedata('7.3.36','sa',0);
		storedata('3.1.32','pa',0);
	}
}
/* patch for vI thali */
// See page 83 of SK part 2
if ($lakAra==="liw" && $so==="sip" && arr($text,'/[iIuUfFxXeEoO]\+/') && sub(prat('ic'),array("+"),$tiG1,0) && $fo==="aja!")
{
	$id_dhAtu="vew";
}
/* patch for yAsuT Agama to combine it with the next pratyaya. because it would not be getting iDAgama. */
$text = one(array("+yA+"),array("+yA"),0);
/* ArdhadhAtukaM zeSaH (3.4.114) */ 
if ( in_array($lakAra,array("lfw","lfN","luw","ASIrliN","luN","ArDaDAtukalew"))  )
{
	storedata('3.4.114','pa',0);
}
/* liT ca (3.4.115) */ 
if ( in_array($lakAra,array("liw")) )
{
	storedata('3.4.115','pa',0);
}
/* Adding iDAgama actually */
if ($id_dhAtu==="sew" && $id_pratyaya==="sew" && !($yAsuT===1 && $lakAra==="ASIrliN")  && !in_array("iw",$Agama) && $caG!==1 && $ksa!==1) // for seT dhAtus
{
	$text1= array();
	foreach ($text as $value)
	{
		$parts = explode('+',$value);
		if (preg_match('/^['.pc('vl').']/',$parts[count($parts)-1]))
		{
		$parts[count($parts)-1]="i".$parts[count($parts)-1];
		}
		$text1[]=implode('+',$parts);
	}
	$text = $text1;
	// Removing unwanted iDAgama which happenned accidentally
	$text = one(array("+iyAs+","Ay+t","daridrA+is"),array("+yAs+","Ay+it","daridrA+s"),0);
	$text = two(array("sfap","spfaS","mfaS","kfaz","tfap","dfap"),array("+i"),array("sarp","sparS","marS","karz","tarp","darp"),array("+i"),0); // not before iDAgama.
	storedata('7.2.35','sa',0);
	$Agama=array_merge($Agama,array("iw"));
}
if ($id_dhAtu==="vew" && $id_pratyaya==="sew" && !($yAsuT===1 && $lakAra==="ASIrliN")  && !in_array("iw",$Agama) && !in_array($sanAdi,array("Ric","RiN")) && $caG!==1 && $ksa!==1) // for veT dhAtus optional one.
{
	$text = change('/(['.pc('hl').'][+])(['.pc('vl').'])/','$1i$2');
	$text = one(array("tfap+isya","dfap+isya","gopAya+sya","u+vay+Ta"),array("tfap+sya","dfap+sya","gopAya+isya","u+vay+iTa"),0); // for veT dhAtus tRp and dRp - iDAgama doesn't apply after amAgama.
	// Removing unwanted iDAgama which happenned accidentally
	$text = one(array("+iyAs+","Ay+t","vaD+s","gopAya+s","gopAya+s","gup+is"),array("+yAs+","Ay+it","vaD+is","gopAya+is","gopAya+is","gup+s"),0);
	$text = two(array("sfap","spfaS","mfaS","kfaz","tfap","dfap"),array("+i"),array("sarp","sparS","marS","karz","tarp","darp"),array("+i"),0); // not before iDAgama.
	storedata('7.2.35','sa',0);
	$Agama=array_merge($Agama,array("iw"));
}
/* valAdAvArdhadhAtuke vikalpa iSyate (vA) */
// See page 83 of SK part 2
if ($fo==="aja!" && $ardhadhatuka===1 && sub(array("vi+vI","vI","ve","vE"),array("+","+i"),prat('vl'),0))
{
	$text = three(array("vi+vI","vI","ve","vE"),array("+",),prat('vl'),array("aj","aj","aj","aj"),array("+i"),prat('vl'),1);
	$text = three(array("vi+vI","vI","ve","vE"),array("+i",),prat('vl'),array("aj","aj","aj","aj"),array("+i"),prat('vl'),1);
	// pending to refactor.
	storedata('7.2.35-1','sa',0);
	if($lakAra==="liw")
	{
		$text = one(array("aj+"),array("aj+aj"),0);
		storedata('6.1.1','sa',0);
		$text = one(array("aj+aj"),array("a+aj"),0);
		storedata('7.4.60','sa',0);
		$text = one(array("a+aj"),array("A+aj"),0);
		storedata('7.4.70','sa',0);
	}
}
// patch for Svi dhAtu
if (in_array($fo,array("wuo!Svi")) && sub(array("Svi"),array("+"),prat('vl'),0) )
{
	$text = three(array("Svi","Su+Su"),array("+"),prat('vl'),array("Svi","Su+Su"),array("+i"),prat('vl'),0);
	storedata('7.2.35','sa',0);
}
/* gamahanajanakhanaghasAM kGityanaGi (6.4.98) */
if (in_array($fo,array("hana!","gamx!","jana!","Kana!","Gasa!","ada!")) && (pr2(array("han","gam","jan","Kan","Gas"),array("+"),$ajAdi_apit_sArvadhAtuka_pratyayas,array("hn","gm","jn","Kn","Gs"),array("+"),$ajAdi_apit_sArvadhAtuka_pratyayas,$text)!==$text || arr($text,'/[+]i[vm]a$/')) && in_array($so,$tiG)  && $aG!==1)
{
    $text = pr2(array("han","gam","jan","Kan","Gas"),array("+"),$ajAdi_apit_sArvadhAtuka_pratyayas,array("hn","gm","jn","Kn","Gs"),array("+"),$ajAdi_apit_sArvadhAtuka_pratyayas,$text);
    $text = pr2(array("han","gam","jan","Kan","Gas"),array("+"),array("iva","ima"),array("hn","gm","jn","Kn","Gs"),array("+"),array("iva","ima"),$text);
	storedata('6.4.98','sa',0);
}
/* anudAttasya cardupadhasyAnyatarasyAm (6.1.59) */ 
if (in_array($fo,array("sfpx!","spfSa!","mfSa!","kfza!","tfpa!","dfpa!")) && arr($text,'/[f]['.pc('hl').'][+]['.pc('Jl').']/') )
{
    $text = three(array("sfp","spfS","mfS","kfz","tfp","dfp"),array("+"),prat('Jl'),array("sfap","spfaS","mfaS","kfaz","tfap","dfap"),array("+"),prat('Jl'),1);
    $text = two(array("sfap","spfaS","mfaS","kfaz","tfap","dfap"),array("+sa+","+s+ant"),array("sfp","spfS","mfS","kfz","tfp","dfp"),array("+sa+","+s+ant"),0); // For sijvA vaktavyaH
	storedata('6.1.59','sa',0);
}
/* removing + from before Ni pratyayas */
if(arr($text,'/['.pc('hl').']\+i\+/')) {$text = one(array("+i+"),array("i+"),0);}
/* NeraniTi (6.4.51) */
if (arr($text,'/i\+a/') && in_array($so,$tiG) && $lakAra==="luN" && $caG===1 && (!in_array("iw",$Agama)||ends(array($sanAdi),array("Ric","RiN"),2)||in_array($fo,$curAdi_adanta) && !in_array("iw",$Agama)) && ($verbset==="curAdi" || in_array($sanAdi,array("Ric","RiN"))) )
{
	$text = change('/(i)([+]a)/','$2');
	storedata('6.4.51','sa',0);
}
/* NeraniTi (6.4.51) */
elseif (arr($text,'/([+]*)i\+/') && in_array($so,$tiG) && $ardhadhatuka===1&& (!in_array("iw",$Agama)||ends(array($sanAdi),array("Ric","RiN"),2)||in_array($fo,$curAdi_adanta))  && !in_array("iw",$Agama) && ($verbset==="curAdi" || in_array($sanAdi,array("Ric","RiN"))) )
{
	$text = three(array("i+yAs","+yAs"),array("+"),array(""),array("+yAs","+yAs"),array("+"),array(""),0);
	$text = change('/^([a-zA-Z]+)([+]*)i\+([^+]*)$/','$1$2+$3');
	$text = change('/i[+](['.pc('al').'MH]+)$/','+$1');
	storedata('6.4.51','sa',0);
}
/* na bhakurChurAm (8.2.79) */
// bham pending
if ( in_array($so,$tiG) && arr($text,'/[kC]u[rv]\+/'))
{
	storedata('8.2.79','pa',0);
}
/* hali ca (8.2.77) */
elseif ( in_array($so,$tiG) && arr($text,'/[rv]\+/') && sub(array("i","u","f"),array("r+","v+"),$halAdi_apit_sArvadhAtuka_pratyayas,0) )
{
    $text=three(array("i","u","f"),array("r+","v+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("I","U","F"),array("r+","v+"),$halAdi_apit_sArvadhAtuka_pratyayas,0);
	storedata('8.2.77','sa',0);
}
/* ata upadhAyAH (7.2.116) */
// more on enumeration kind. Not used regexes deliberately.
if ( arr($text,'/[a]['.pc('hl').'][+]i[+]/') )
{
	$text = three(array("a"),$hl,array("+i+"),array("A"),$hl,array("+i+"),0);
	storedata('7.2.116','sa',0);
}
/* bhuvo vugluGliToH (6.4.88) */
if ( arr($text,'/[B][U][+]['.pc('ac').']/') && in_array($lakAra,array("luN","liw")))
{
    $text = two(array("BU+"),$ac,array("BUv+"),$ac,0);
	storedata('6.4.88','sa',0);	
}
/* guNo'rtisaMyogAdyoH (7.4.29) */
if ( (in_array($sanAdi,array("yak")) || $lakAra==="ASIrliN") && (arr($text,'/['.pc('hl').']['.pc('hl').']f[+]y/') || $fo==="f"))
{
	$text=one(array("f+y"),array("ar+y"),0);
	storedata('7.4.29','sa',0);
}
/* riGzayagliGkSu (7.4.28) */
elseif ( (in_array($sanAdi,array("yak")) || $lakAra==="ASIrliN") && sub(array("f"),array("+y"),blank(0),0) )
{
    $text=two(array("f"),array("+y"),array("ri"),array("+y"),0);
	storedata('7.4.28','sa',0);
}
/* akRtsArvadhAtukayordIrghaH (7.4.25) */
elseif (  in_array($so,$tiG) && $sarvadhatuka!==1 && $kRt!==1 && (in_array("N",$itpratyaya) || in_array("k",$itpratyaya)) && $lakAra!=="liw" && !arr($text,'/^[y][a][+][y]/') && sub($ac,array("+"),array("y"),0) && !sub($ac,array("+"),array("y+a"),0) )
{
    $text=three($ac,array("+"),array("y"),dirgha($ac),array("+"),array("y"),0);
	storedata('7.4.25','sa',0);
}
/* dhi ca (8.2.25) */
if ( $lakAra!=="" && arr($text,'/s\+D/') && in_array($so,$tiG))
{
    $text = one(array("s+D"),array("+D"),0);
	storedata('8.2.25','sa',0);
}
/* radhijabhoraci (7.1.61) */
if (in_array($fo,array("raDa!","jaBI!")) && sub(array("raD","jaB"),array("+"),$ac,0) )
{
    $text=three(array("raD","jaB"),array("+"),$ac,array("ranD","janB"),array("+"),$ac,0);
	storedata('7.1.61','sa',0);
}
/* vadavrajahalantasya acaH (7.2.3) */ 
if ( arr($text,'/['.pc('ac').'](['.pc('hl').'M]*)[+][st]/')  && $lakAra==="luN"  && $sic!==0 && in_array($so,$tis) && $yamarama!==1 && $sicivRddhi!==1)
{
	foreach ($text as $value)
		{
		$value = preg_replace('/(['.pc('ac').'])(['.pc('hl').'M]*)([+])([st])/','$1?$2$3$4',$value);
		$aca[] = str_replace(array("a?","A?","i?","I?","u?","U?","f?","F?","x?","X?","e?","o?","E?","O?",),array("A","A","E","E","O","O","Ar","Ar","Al","Al","E","O","E","O",),$value);
	}
	$text = $aca; $aca=array();
	$text = one(array("+sA+t",),array("+sa+t"),0);
	$text = change('/Ar([zp][+]sa[+])/','f$1');
	$text = change('/Ar([zp][+]s[+]ant)$/','f$1');
	storedata('7.2.3','sa',0);
}
if ($debug===1) {dibug("3900");}
/* astisico'pRkte (7.3.96) */
if ( ($sic!==0 && arr($text,'/\+([i]*)s([+]*)['.pc('hl').']$/')))
{
	$text = two(array("+is",),$hl,array("+is+I"),$hl,0);
	storedata('7.3.96','sa',0);
	$text = two(array("+is+I"),$hl,array("+i+I"),$hl,0);
	storedata('8.2.28','sa',0);
	$text = two(array("+i+I"),$hl,array("+I"),$hl,0);
	storedata('6.1.97','sa',0);
}
/* astisico'pRkte (7.3.96) */
// asti
// nyAsa says that अस्तिग्रहणं लङर्थम्‌.
if ( arr($text,'/as[+][st]$/') && $number==="02.0060" && $lakAra==="laN")
{
	$text = pr2(array("as"),array("+"),array("s","t"),array("as"),array("+"),array("Is","It"),$text);
	storedata('7.3.96','sa',0);
}
/* tAsastyorlopaH (7.4.50) */
if ( (in_array($fo,array("asa!")) && $verbset==="adAdi" ) && arr($text,'/as\+s/') )
{
    $text=two(array("as"),array("+s"),array("a"),array("+s"),0);
	storedata('7.4.50','sa',0);
}
/* pugantalaghUpadhasya ca (7.3.86) */
if ( $atolopa!==1 && $ardhadhatuka===1 && $didhI!==1 && ($sIyuT===1||$sic===1) && $vijait!==1 && $kGiti!==1 && sub(array("i","u","f","x"),$hl,array("+sI","+isI"),0) && !arr($text,"/[+][i][y][+][t]$/") )
{
	$text=three(array("i","u","f","x"),$hl,array("+sI","+isI"),array("e","o","ar","al"),$hl,array("+sI","+isI"),0);
	if ($id_dhAtu==="vew") // e.g. gfhU! - garhizIzwa ang GfzIzwa are expected outcome.
	{
		$text=three(array("e","o","ar","al"),$hl,array("+sI"),array("i","u","f","x"),$hl,array("+sI"),0);	
	}
	storedata('7.3.86','sa',0);
}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) patch for UrNu */
if ( arr($text,'/u\+i/') && sub(array("UrRunu","UrRu"),array("+"),array("i"),0) )
{
    $text=two(array("UrRunu","UrRu"),array("+i"),array("UrRuno","UrRo"),array("+i"),1);
	storedata('7.3.84','sa',0);
}
/* bhavateraH (7.4.73) */
if ( arr($text,'/bu\+BUv\+/') && $lakAra==="liw")
{
	$text = two(array("bu+BUv"),array("+"),array("ba+BUv"),array("+"),0);
	storedata('7.4.73','sa',0);
}
/* aco JNiti patch for liT. */
if ( in_array($so,array("tip")) && $lakAra==="liw" && arr($text,'/['.pc('ac').']\+([^+]*)$/') && (sub($ac,array("+"),$tiG1,0)||sub($ac,array("+"),$iDtiG,0)) ) # See https://github.com/drdhaval2785/SanskritVerb/issues/305
{
    $text = pr2($ac,array("+"),$tiG1,vriddhi($ac),array("+"),$tiG1,$text);
    $text = pr2($ac,array("+"),$iDtiG,vriddhi($ac),array("+"),$iDtiG,$text);
	storedata('7.2.115','sa',0);
}
/* aco JNiti patch for liT mip. */
if ( in_array($so,array("mip")) && $lakAra==="liw" && arr($text,'/['.pc('ac').']\+([^+]*)$/') && (sub($ac,array("+"),$tiG1,0)||sub($ac,array("+"),$iDtiG,0)) ) # See https://github.com/drdhaval2785/SanskritVerb/issues/305
{
	storedata('7.1.91','pa',0);
    $text1 = pr2($ac,array("+"),$tiG1,vriddhi($ac),array("+"),$tiG1,$text);
    $text2 = pr2($ac,array("+"),$iDtiG,vriddhi($ac),array("+"),$iDtiG,$text);
	$text = array_merge($text,$text1,$text2);
	storedata('7.2.115','sa',0);
}
/* zRRdRRprAM hrasvo vA (7.4.12) */
if ( $lakAra==="liw" && in_array("k",$itpratyaya) && sub(array("Sa+SF","da+dF","pa+pF"),array("+"),blank(0),0) )
{
	$text = two(array("Sa+SF","da+dF","pa+pF"),array("+"),array("Sa+Sf","da+df","pa+pf"),array("+"),1);
	storedata('7.4.12','sa',0);
}
/* dAderdhAtorghaH (8.2.32) */
if (arr($text,'/['.pc('hl').'][+]['.pc("Jl").']/') && sub($dade,blank(0),blank(0),0) )
{
    $text = three(array("dah","dAh","dih","duh","dfh","drAh","druh"),array("+"),prat('Jl'),array("daG","dAG","diG","duG","dfG","drAG","druG"),array("+"),prat('Jl'),0);
	storedata('8.2.32','sa',0);
    $hodha1 = 1; // 0 - doesn't prevent ho DhaH. 1 - prevents ho DhaH.
} else { $hodha1 = 0; } 
/* anudAttopadezavanatitanotyAdInAmanunAsikalopo jhali kGiti (6.4.37) */
if ( in_array($so,$tiG) && (in_array("N",$it)||in_array("k",$it)) && !arr($text,'/\+[hyvrYmNRn]/') && pr2(array("man","han","gam","ram","nam","yam","van","tan","san","kzaR","kziR","fR","tfR","GfR","man",),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("ma","ha","ga","ra","na","ya","va","ta","sa","kza","kzi","f","tf","Gf","ma",),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,$text)!==$text )
{
    $text = pr2(array("man","han","gam","ram","nam","yam","van","tan","san","kzaR","kziR","fR","tfR","GfR","man",),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("ma","ha","ga","ra","na","ya","va","ta","sa","kza","kzi","f","tf","Gf","ma",),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,$text);
	storedata('6.4.37','sa',0);
}
/* Ato lopa iTi ca (6.4.64) */
if (arr($text,'/A\+i/') && sub(array("A+"),array("i"),$tiG1,0) && $lakAra!=="" && in_array("iw",$Agama) )
{
    $text=one(array("A+iTa"),array("+iTa"),0);
	storedata('6.4.64','sa',0);
}
/* iDattyartivyayatInAm (7.2.66) */
if (in_array($fo,array("adx!","ada!","f","vyeY")) && $lakAra==="liw" && $so==="sip" && !in_array("iw",$Agama) && sub(array("ad","f","vyay"),array("+"),$tiG1,0) )
{
    $text=two(array("ad","f","vyay"),array("+"),array("ad","f","vyay"),array("+i"),0);
	storedata('7.4.66','sa',0);
}
/* Rtazca saMyogAderguNaH (7.2.42) */
if ( arr($text,'/['.pc('hl').']['.pc('hl').'][f][+]/') && $lakAra==="liw" && in_array("k",$itpratyaya) )
{
    $text=three($hl,$hl,array("f+"),$hl,$hl,array("ar+"),0);
	storedata('7.2.42','sa',0);
}
/* masjinazorjhali (7.1.60) */ 
if (in_array($fo,array("wumasjo!","RaSa!")) && sub(array("masj","naS"),array("+"),prat('Jl'),0) )
{ 
    $text = three(array("masj","naS"),array("+"),prat('Jl'),array("mansj","nanS"),array("+"),prat('Jl'),0);
	storedata('7.1.60','sa',0);
}
// ata upadhAyAH patch for liT.
if ( in_array($so,array("tip")) && $lakAra==="liw" && arr($text,'/a['.pc('hl').']\+/') )
{
    $text = two(array("a"),$hlplus,array("A"),$hlplus,0);
	storedata('7.2.116','sa',0);
}
// ata upadhAyAH patch for liT.
if ( in_array($so,array("mip")) && $lakAra==="liw" && arr($text,'/a['.pc('hl').']\+/') )
{
    $text = three(array("a"),$hl,array("+"),array("A"),$hl,array("+"),1);
	storedata('7.2.116','sa',0);
}
/* dIGo yuDaci kGiti (6.4.63) */
if ( arr($tex,'/dI\+['.pc('ac').']/') && $kGiti===1)
{
    $text=three(array("dI"),array("+"),$ac,array("dI"),array("+y"),$ac,0);
	storedata('6.4.63','sa',0);
}
if ($debug===1) {dibug("4000");}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
if ( $ardhadhatuka===1  && $didhI!==1  && $kGiti!==1 && $sIyuT!==1 && $bhUsuvo!==1 && arr($text,'/[iIuUfFxX]\+/') && pr2(array("i","I","u","U","f","F","x","X",),array("+"),$ArdhadhAtuka_tiG_pratyayas,array("e","e","o","o","ar","ar","al","al",),array("+"),$ArdhadhAtuka_tiG_pratyayas,$text)!==$text )
{
    $text=pr2(array("i","I","u","U","f","F","x","X",),array("+"),$ArdhadhAtuka_tiG_pratyayas,array("e","e","o","o","ar","ar","al","al",),array("+"),$ArdhadhAtuka_tiG_pratyayas,$text);
	storedata('7.3.84','sa',0);
}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
if (  $ardhadhatuka===1 && $didhI!==1 && $kGiti!==1 && $bhUsuvo!==1 && arr($text,'/[iIuUfFxX]\+/') && (pr2(array("i","I","u","U","f","F","x","X",),array("+i"),$ArdhadhAtuka_tiG_pratyayas,array("e","e","o","o","ar","ar","al","al",),array("+i"),$ArdhadhAtuka_tiG_pratyayas,$text)!==$text || pr2(array("i","I","u","U","f","F","x","X",),array("+"),$ArdhadhAtuka_tiG_pratyayas,array("e","e","o","o","ar","ar","al","al",),array("+"),$ArdhadhAtuka_tiG_pratyayas,$text)!==$text))
{
    $text=pr2(array("i","I","u","U","f","F","x","X",),array("+i"),$ArdhadhAtuka_tiG_pratyayas,array("e","e","o","o","ar","ar","al","al",),array("+i"),$ArdhadhAtuka_tiG_pratyayas,$text);
    $text=pr2(array("i","I","u","U","f","F","x","X",),array("+"),$ArdhadhAtuka_tiG_pratyayas,array("e","e","o","o","ar","ar","al","al",),array("+"),$ArdhadhAtuka_tiG_pratyayas,$text);
	storedata('7.3.84','sa',0);
}
/* pugantalaghUpadhasya ca (7.3.86) */
if ( $didhI!==1 && $kGiti!==1 && $vijait!==1 && $lakAra==="liw" && $ardhadhatuka===1 && arr($text,'/[iufF]['.pc('hl').']\+/') && (sub(array("i","u","f","x"),$hlplus,$tiG1,0) || sub(array("i","u","f","x"),$hlplus,$iDtiG,0) )  && !($verbset==="tudAdi" && $sarvadhatuka===1) && $abhyAsasyAsavarNe!==1)
{
	$text=three(array("i","u","f","x"),$hlplus,$iDtiG,array("e","o","ar","al"),$hlplus,$iDtiG,0);
	$text=three(array("i","u","f","x"),$hlplus,$tiG1,array("e","o","ar","al"),$hlplus,$tiG1,0);
	if ($id_dhAtu==="vew") // e.g. gfhU! - garhizIzwa ang GfzIzwa are expected outcome.
	{
		$text=three(array("e","o","ar","al"),$hl,array("+sI"),array("i","u","f","x"),$hl,array("+sI"),0);	
	}
	storedata('7.3.86','sa',0);
}
if ($lakAra==="liw" && arr($text,'/['.pc('hl').'][iI][+][aAiIuUfFxXeEoO]/') && !arr($text,'/['.pc('hl').']['.pc('hl').'][iI][+][aAiIuUfFxXeEoO]/') )
{
	$text=three($hl,array("i+","I+"),$ac,$hl,array("y+","y+"),$ac,0);
	storedata('6.4.82','sa',0);
}
/* vA jRRbhramutrasAm (6.4.124) */
if ($lakAra==="liw" && in_array($fo,array("jF","Bramu!","trasa!")) && !ends(array($so),array("tip","mip"),2) && sub(array("ja+jar","ba+Bram","ta+tras"),array("+"),blank(0),0) )
{
    $text=two(array("ja+jar","ba+Bram","ta+tras"),array("+"),array("jer","Brem","tres"),array("+"),1);
	storedata('6.4.124','sa',0);
}
/* phaNAM ca saptAnAm (6.4.125) */
elseif ( $lakAra==="liw" && in_array($fo,array("PaRa!","rAjf!","wuBrAjf!","wuBrASf!","wuBlASf!","syamu!","svana!","Dvana!")) && !ends(array($so),array("tip","mip"),2) && sub(array("pa+PaR","ra+rAj","ba+BrAj","ba+BrAS","ba+BlAS","sa+syam","sa+svan","da+Dvan"),array("+"),blank(0),0) )
{
    $text=two(array("pa+PaR","ra+rAj","ba+BrAj","ba+BrAS","ba+BlAS","sa+syam","sa+svan","da+Dvan"),array("+"),array("PeR","rej","Brej","BreS","BleS","syem","sven","Dven"),array("+"),1);
	storedata('6.4.125','sa',0);
}
/* tRRphalabhajatrapazca (6.4.122) */
elseif ( $lakAra==="liw" && in_array($fo,array("tF","Pala!","Baja!","trapU!z","YiPalA!")) && !ends(array($so),array("tip","mip"),2) && sub(array("ta+tar","pa+Pal","ta+trap"),array("+"),blank(0),0) )
{
    $text=two(array("ta+tar","pa+Pal","ta+trap"),array("+"),array("ter","Pel","trep"),array("+"),0);
	storedata('6.4.122','sa',0);
}
/* rAdho hiMsAyAm (6.4.123) */
elseif ( arr($text,'/ra\+rAD\+/') && $lakAra==="liw" && !ends(array($so),array("tip","mip"),2) && $verbset==="svAdi")
{
    $text=two(array("ra+rAD"),array("+"),array("reD"),array("+"),0);
	storedata('6.4.123','sa',0);
}
/* na zasadadavAdiguNAnAm (6.4.126) */
elseif ( $lakAra==="liw" && !ends(array($so),array("tip","mip"),2) && sub(array("Sa+Sas","da+dad","ar"),array("+"),blank(0),0) )
{
	storedata('6.4.126','sa',0);
}
/* na zasadadavAdiguNAnAm (6.4.126) */
elseif ( sub(array("va+vaj","va+vaK","va+vaw","va+vaW","va+vaR","va+van","va+val","va+vaz","va+vam"),array("+"),blank(0),0) && $lakAra==="liw" && !ends(array($so),array("tip","mip"),2) )
{
	storedata('6.4.126','sa',0);
}
/* gamahanajanakhanaghasAM lopaH kGiti (6.4.98) */
elseif (in_array($fo,array("gamx!","hana!","jana!","Gasa!","Kanu!","janI!","ada!")) && sub(array("gam","Gan","jan","Gas","Kan"),array("+"),blank(0),0) && in_array($so,$tiG)  && $aG!==1)
{
}
/* ata ekahalmadhye'nAdezAderliTi (6.4.120) */
elseif ( arr($text,'/^['.pc('hl').'][a][+]['.pc('hl').'][a]['.pc('hl').'][+]/') && $lakAra==="liw" && !ends(array($so),array("tip","mip"),2) && $liT_Adeza!==1)
{
    $text=change('/^(['.pc('hl').'][a][+])(['.pc('hl').'])([a])(['.pc('hl').'][+])/','$2e$4');
	$text=change('/^(['.pc('hl').'])([e])(['.pc('hl').'][+][T][a]$)/','$1a+$1a$3'); // for thal.
	storedata('6.4.120','sa',0);
}
/* zAsivasighasInAM ca (8.3.60) */
if ( arr($text,'/[G][s][+]/') && ends(array($fo),array("Gasa!","ada!"),4) && in_array($so,$tiG) )
{
    $text = two(array("Gs"),array("+"),array("Gz"),array("+"),0);
	storedata('8.3.60','sa',0);
}
$novrddhi=0;
if ($debug===1) {dibug("4100");}
/* ato lrAntasya (7.2.2) */
if (arr($text,'/a[rl]\+/') && sub(array("ar","al"),array("+"),array("s","is"),0) && $sic===1 && in_array($so,$tis) )
{
    $text=two(array("ar+","al+"),array("s","is"),array("Ar+","Al+"),array("s","is"),0);
	storedata('7.2.2','sa',0);
}
/* vadavrajahalantasya acaH (7.2.3) */ 
elseif ( $lakAra==="luN" && $sic!==0 && in_array($so,$tis) && in_array($fo,array("vada!","vraja!")) && sub(array("vad","vraj"),array("+"),array("is"),0) )
{ 
    $text = two(array("vad+","vraj+"),array("is"),array("vAd+","vrAj+"),array("is"),0);
	storedata('7.2.3','sa',0);
}
/* hmyantakSaNazvasajAgRNizvyeditAm (7.2.5) */
elseif ( $sic===1 && in_array($so,$tis) && ( arr($text,'/['.pc('ac').'][hmy]\+is/') || sub(array("kzaR","Svas","jAgf","Svi"),array("+is"),blank(0),0) || in_array($sanAdi,array("Ric","RiN")) || in_array($fo,$editverbs) ) )
{
	$hmyanta = 1;
	$novrddhi=1;
}
/* ato halAderlaghoH (7.2.7) */
elseif ( $sic===1 && in_array($so,$tis) && sub(array("a"),$hl,array("+is"),0) )
{
	$text = three(array("a"),$hl,array("+is"),array("A"),$hl,array("+is"),1);
	storedata('7.2.7','sa',0);
}
/* UrNotervibhASA (7.2.6) */
elseif ( $sic===1 && in_array($so,$tis) && arr($text,'/UrRu\+is/') && sub(array("UrRu"),array("+"),array("is"),0) )
{
    $text=one(array("UrRu+is"),array("UrRO+is"),1);
    $text=one(array("UrRu+is"),array("UrRo+is"),1);
	storedata('7.2.6','sa',0);
}
/* neTi (7.2.4) */
elseif ( arr($text,'/['.pc('ac').'](['.pc('hl').'M]*)[+][i][s]/') && $sic===1 && in_array($so,$tis) )
{
	storedata('7.2.4','pa',0);
	$novrddhi=1;
}
/* ato lopaH (6.4.48) */
// patch for han -> vaDa
if ( arr($text,'/vaDa\+i/') )
{ 
	$text = two(array("vaDa"),array("+i"),array("vaD"),array("+i"),0);
	storedata('6.4.48','sa',0);
    $atolopa=1;
}
/* skoH saMyogAdyorante ca (8.2.29) */
if ( (arr($text,'/[s]['.flat($hl).'][+]/') || arr($text,'/vrASc\+/') ) && in_array($so,$tiG) && in_array($lakAra,array("luN")) && $asyati!==1) // for luN
{
	foreach ($hl as $value) { $ska[] = "s".$value."+"; }
	$text = one($ska,$hlplus,0);
	$text = one(array("vrASc"),array("vrAc"),0);
	storedata('8.2.29','sa',0);
}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
// patch for zvi, jAgf etc.
if (arr($text,'/\+is/') && sub(array("Svi","jAgf"),array("+"),array("is"),0) )
{
    $text=three(array("Svi","jAgf"),array("+"),array("is"),array("Sve","jAgar"),array("+"),array("is"),0);
	storedata('7.3.84','sa',0);
}
/* iTa ITi (8.2.28) */ 
if ( in_array($so,$tiG) && $lakAra==="luN" && arr($text,'/\+isI/') &&sub(array("+isI"),array(""),blank(0),0) )
{
    $text=one(array("+isI"),array("+iI"),0);
	storedata('8.2.28','sa',0);
    /* akaH savarNe dIrghaH (6.1.101) */ 
    if (sub(array("i"),array("I"),blank(0),0))
    {
    $text = two(array("i"),array("I"),array("I"),blank(2),0);
	storedata('6.1.101','sa',0);
    }
}
/* hmyantakSaNazvasajAgRNizvyeditAm (7.2.5) */
if ( $hmyanta===1 )
{
	storedata('7.2.5','sa',0);
	$novrddhi=1;
}
/* mRjervRddhiH (7.2.114) */
if ( $ardhadhatuka===1 && arr($text,'/j\+/') && ends($itpratyaya,array("k","N"),2) && sub(array("mfj","marj"),array("+","+i"),$ac,0) && in_array($so,$tiG) )
{
    $text=three(array("mfj","marj"),array("+"),$ac,array("mArj","mArj"),array("+"),$ac,1);
//    echo "<p class = sa >By mRjervRddhiH (".link_sutra("7.2.114").") and kGityajAdau veSyate :</p>\n"; 
//    echo "<p class = sa >मृजेर्वृद्धिः (७.२.११४) तथा क्ङित्यजादौ वेष्यते । :</p>\n";
	storedata('7.2.114','sa',0);
}
/* mRjervRddhiH (7.2.114) */
elseif ( arr($text,'/j\+/') && pr2(array("mfj","marj"),array("+","+i"),$ArdhadhAtuka_tiG_pratyayas,array("mArj"),array("+","+i"),$ArdhadhAtuka_tiG_pratyayas,$text)!==$text && in_array($so,$tiG))
{
    $text=pr2(array("mfj","marj"),array("+","+i"),$ArdhadhAtuka_tiG_pratyayas,array("mArj","mArj"),array("+","+i"),$ArdhadhAtuka_tiG_pratyayas,$text);
	storedata('7.2.114','sa',0);
}

/* tanAdibhyastathAsoH (2.4.79) */
if ( in_array($fo,$tanAdi) && sub($hl,array("+"),array("ista","isTAs"),0) && in_array($so,$taG) )
{
	$text = two(array("ArR","kziR","tfR","GfR"),array("+ista","+isTAs"),array("ArR","kziR","tfR","GfR"),array("+ta","+TAs"),0);
	$text = three($hl,array("+"),array("ista","isTAs"),$hl,array("+"),array("ista","isTAs"),0);
	storedata('2.4.79','sa',0);
// Right now placed it here. There is some problem with the next entry.
	if (arr($text,'/[jsK]an\+['.pc('Jl').']/'))
	{
	$text=two(array("jan+","san+","Kan+"),prat("Jl"),array("jaA+","saA+","KaA+"),prat("Jl"),0);
	storedata('6.4.42','sa',0);
	}
	else
	{
	$text = two(array("man+","han+","gam+","ram+","nam+","yam+","van+","tan+","san+","kzaR+","kziR+","ArR+","tfR+","GfR+","man+",),prat('Jl'),array("ma+","ha+","ga+","ra+","na+","ya+","va+","ta+","sa+","kza+","kzi+","Ar+","tf+","Gf+","ma+",),prat('Jl'),0);
	storedata('6.4.37','sa',0);
	}
}
if ($debug===1) {dibug("4200");}
/* anudAttopadezavanatitanotyAdInAmanunAsikalopo jhali kGiti (6.4.37) */
if ( ( (in_array("N",$it)||in_array("k",$it))&& in_array($so,$tiG) && ($sIyuT===1||$sic!==0) && sub(array("man","han","gam","ram","nam","yam","van","tan","san","kzaR","kziR","fR","tfR","GfR","man",),array("+"),prat('Jl'),0) ) || $vAgamaH===1 ) 
{
	if ($vAgamaH===1) // vAgamaH is optional kit.
	{
	$text = two(array("gam+","yam+"),prat('Jl'),array("ga+","ya+"),prat('Jl'),1);	
	}
    else
	{
	$text = three(array("man","han","gam","ram","nam","yam","van","tan","san","kzaR","kziR","fR","tfR","GfR","man",),array("+"),prat('Jl'),array("ma","ha","ga","ra","na","ya","va","ta","sa","kza","kzi","f","tf","Gf","ma",),array("+"),prat('Jl'),0);
	}
	storedata('6.4.37','sa',0);
}
/* dIpajanabudhapUritAyipyAyibhyo'nyatarasyAm (3.1.61) */ 
if ( in_array($fo,array("dIpI!","janI!","buDa!","pUrI!","tAyf!","o!pyAyI!")) && $lakAra==="luN" && $so==="ta" )
{ 
    $text = three(array("dIp","jan","buD","pUr","tAy","pyAy"),array("+"),array("ista","ta"),array("dIp","jan","buD","pUr","tAy","pyAy"),array("+ciR+"),array("ista","ta"),1);
	storedata('3.1.61','sa',0);
	$ciN=1;
} else { $ciN=0; }
/* ciN te padaH (3.1.60) */ 
if ( in_array($fo,array("pada!")) && $lakAra==="luN" && $so==="ta" )
{ 
    $text = three(array("pad"),array("+"),array("ta"),array("pad"),array("+ciR+"),array("ta"),0);
	storedata('3.1.60','sa',0);
	$ciN=1;
}
/* ciNo luk (6.4.104) */ 
if ( $ciN===1 )
{ 
    $text = two(array("+ciR+"),array("ista","ta"),array("+i"),array("",""),0);
	storedata('6.4.104','sa',0);
	/* ata upadhAyAH (7.2.116) */ 
	if ( arr($text,'/[a]['.pc('hl').'][+][i]$/') )
	{
		$text = three(array("a"),$hl,array("+i"),array("A"),$hl,array("+i"),0);
		storedata('7.2.116','sa',0);
	}
	/* pugantalaghUpadhasya ca (7.3.86) */
	if ( arr($text,'/[iufx]['.pc('hl').'][+][i]$/') )
	{
		$text=three(array("i","u","f","x"),$hl,array("+i"),array("e","o","ar","al"),$hl,array("+i"),0);
		storedata('7.3.86','sa',0);
	}
}
/* yIvarNayordIdhIvevyoH (7.4.53) */
if (in_array($fo,array("diDIN","vevIN")) && sub(array("dIDI","vevI"),array("+"),array("i","I","y"),0) )
{
    $text=three(array("dIDI","vevI"),array("+"),array("i","I","y"),array("dID","vev"),array("+"),array("i","I","y"),0);
	storedata('7.4.53','sa',0);
}
/* sArvadhAtukArdhadhAtukayoH (7.3.84) */
if ( $didhI!==1 && $kGiti!==1 && $bhUsuvo!==1 && arr($text,'/[iIuUfFxX]\+/') && sub(array("i","I","u","U","f","F","x","X"),array("+"),array("sI","isI"),0) && ($sarvadhatuka===1 || $ardhadhatuka===1) && !($ad===1 && sub(array("i","I","u","U","f","F","x","X"),array("+"),$ajAdi_apit_sArvadhAtuka_pratyayas,0) ) )
{
    $text=three(array("i","I","u","U","f","F","x","X",),array("+"),array("sI","isI"),array("e","e","o","o","ar","ar","al","al",),array("+"),array("sI","isI"),0);
	storedata('7.3.84','sa',0);
}
/* ato lopaH (6.4.48) */
//if ( sub(array("Aya"),array("+is","+It","+Is"),blank(0),0) || sub(array("a"),array("+i+"),blank(0),0) )
if (arr($text,'/Aya\+/') && sub(array("Aya"),array("+is","+It","+Is"),blank(0),0)  )
{ 	$text = two(array("Aya"),array("+is","+It","+Is"),array("Ay"),array("+is","+It","+Is"),0);
//	$text = two(array("a"),array("+i+"),array(""),array("+i+"),0);
	storedata('6.4.48','sa',0);
    $atolopa=1;
}
/* graho'liTi dIrghaH (7.2.37) */ 
if ( in_array($fo,array("graha!")) && $lakAra!=="liw" && sub(array("grah"),array("+"),array("i"),0) )
{ 
    $text = one(array("grah+i"),array("grah+I"),0);
	storedata('7.2.37','sa',0);
}
/* UdupadhAyA gohaH (6.4.89) */ 
if (in_array($fo,array("guhU!")) && sub(array("goh","guh"),array("+"),$ac,0) )
{
    $text = two(array("goh+","guh+"),$ac,array("gUh+","gUh+"),$ac,0);
	storedata('6.4.89','sa',0);
}
/* vrazcabhrasjamRjayajarAjabhrAjacChazAM ca (8.2.36) */
// TubhrAjR dIptau and ejR bhejR bhrAjR dIptau are different. This is pending to code.
// parau vrajeH SaH padAnte (u 217) pending. 
$vrasca = array("vfSc","sfj","mfj","yaj","rAj","BrAj","devej","parivrAj","Bfj","ftvij","mArj","vraSc","Brasj","sraj","sfaj","Barj","vrASc","vrAc","vrac","BrAj","BArj");
$vrashca = array("vfSz","sfz","mfz","yaz","rAz","BrAz","devez","parivrAz","Bfz","ftviz","mArz","vraSz","Brasz","sraz","sfaz","Barz","vrAz","vrAz","vraz","BrAz","BArz");
if (in_array($fo,array("o!vraScU!","sfja!","mfja!","yaja!","rAjf!","wuBrAjf!","Bfja!","mfjU!","Brasja!")) && sub($vrasca,array("+"),prat("Jl"),0)  && in_array($so,$tiG) )
{
    if (sub($vrasca,prat('Jl'),blank(0),0))
    {
    $text = two($vrasca,prat('Jl'),$vrashca,prat("Jl"),0);
    }
    else 
    {
    $text = one($vrasca,$vrashca,0);    
    }
	storedata('8.2.36','sa',0);
    $vras = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
}
if (arr($text,'/[CS][+]['.pc('Jl').']/') && in_array($so,$tiG) )
{
    $text = two(array("C+","S+"),prat('Jl'),array("z+","z+"),prat('Jl'),0);
	storedata('8.2.36','sa',0);
    $vras=1;
}
if ($debug===1) {dibug("4300");}
/* nimittApAye naimittikasyApyapAyaH (paribhASA) */ 
if (($vras===1 && sub(array("vfSz","vraSz"),blank(0),blank(0),0))  || sub(array("cz"),blank(0),blank(0),0))
{
    $text = one(array("vfSz","vraSz"),array("vfsz","vrasz"),0);
    $text = one(array("cz"),array("z"),0);
	storedata('par@56-1','sa',0);
}
/* vivikz patch for overcoming skoH saMyogAdyorante ca */
if (arr($text,'/vivikz\+/') && in_array($so,$tiG))
{
    $text = two(array("vivikz",),array("+"),array("viviS"),array("+"),0);
	storedata('skoHsaM','sa',0);
    $text = two(array("viviS"),array("+"),array("viviz"),array("+"),0);
	storedata('8.2.36','sa',0);
}
/* rakS, takS patch to bar application of skoH saMyogAdyorante ca */
if ( in_array($sanAdi,array("Ric","RiN")) && sub(array("takz","rakz"),array("+"),blank(0),0) && in_array($so,$tiG) )
{
	storedata('1.1.58-10','sa',0);
    $rakS=1; // 0 - doesn't prevent skoH saMyogAdyorante ca. 1 - prevents skoH saMyogAdyorante ca.
} else { $rakS=0; }
/* pipak, vivak, didhak patch to bar application of skoH saMyogAdyorante ca */
if (arr($text,'/akz\+/') && sub(array("vivakz","diDakz","pipakz"),array("+"),blank(0),0) && in_array($so,$tiG))
{
	storedata('skoHc','sa',0);
    $pipakS=1; // 0 - doesn't prevent skoH saMyogAdyorante ca. 1 - prevents skoH saMyogAdyorante ca.
} else { $pipakS=0; }
if (in_array($fo,array("rudi!r","Yizvapa!","zvapa!","Svasa!","prARa!","ana!","jakza!")) && (pr2(array("rod","svap","Svas","prAR","an","jakz","rud"),array("+"),array("t","s"),array("rod","svap","Svas","prAR","an","jakz","rud"),array("+"),array("at","as"),$text)!==$text || ends(array($fo),array("jakza!"),4) ) && in_array($so,$tiG) )
{
    $rudAdibhyaH = 1;
}
/* skoH saMyogAdyorante ca (8.2.29) */
if ($rakS===0 && $pipakS===0 && $rudAdibhyaH!==1 && (arr($text,'/[sk]['.pc('hl').']\+['.pc('Jl').']/') || arr($text,'/[sk]['.flat($hl).'][+]$/')) )
{
    $text = three(array("s","k"),$hlplus,prat("Jl"),array("",""),$hlplus,prat("Jl"),0);
	storedata('8.2.29','sa',0);
}
/* saH syArdhadhAtuke (7.4.49) */
if (arr($text,'/s\+s/') && !arr($text,'/yAs\+s/') && $ardhadhatuka===1)
{
    $text = one(array("s+s"),array("t+s",),0);
	storedata('7.4.49','sa',0);
}
/* jhalo jhali (8.2.26) */
if (arr($text,'/['.pc('Jl').']([+]*)s([+]*)['.pc('Jl').']/') && sub(prat("Jl"),array("s"),prat("Jl"),0) && in_array($so,$tiG))
{
	$text = three(prat("Jl"),array("s"),prat("Jl"),prat("Jl"),array(""),prat("Jl"),0); 
	storedata('8.2.26','sa',0);
}
/* patch for cikIrz */
if (arr($text,'/cikIrz\+/') && in_array($so,$tiG) )
{
    $text = two(array("cikIrz"),array("+"),array("cikIr"),array("+"),0);
	storedata('8.2.24','sa',0);
}
/* vA druhamuhaSNuhaSNihAm (8.2.33) */
$druh = array("druh","muh","snuh","snih","droh","moh","snoh","sneh");
if ( (arr($text,'/[+]$/') || arr($text,'/[+]['.pc("Jl").']/')) && sub($druh,blank(0),blank(0),0) )
{
    $text = two(array("druh","muh","snuh","snih","droh","moh","snoh","sneh"),prat('Jl'),array("druG","muG","snuG","sniG","droG","moG","snoG","sneG"),prat('Jl'),1);
	storedata('8.2.33','sa',0);
}
/* dAderdhAtorghaH (8.2.32) */
if ( (arr($text,'/[+]$/') || arr($text,'/[+]['.pc("Jl").']/')) && sub($dade,blank(0),blank(0),0) )
{
    $text = two(array("dah","dAh","dih","duh","dfh","drAh","druh"),prat('Jl'),array("daG","dAG","diG","duG","dfG","drAG","druG"),prat('Jl'),0);
	storedata('8.2.32','sa',0);
    $hodha1 = 1; // 0 - doesn't prevent ho DhaH. 1 - prevents ho DhaH.
}
/* naho dhaH (8.2.34) */
if (in_array($fo,array("Raha!")) && (arr($text,'/[+]$/') || arr($text,'/[+]['.pc("Jl").']/')) && sub(array("nah","nAh"),blank(0),blank(0),0) )
{
    $text = one(array("nah","nAh"),array("naD","nAD"),0);
	storedata('8.2.34','sa',0);
    $hodha2 = 1; // 0 - doesn't prevent ho DhaH. 1 - prevents ho DhaH.  
} else { $hodha2 = 0; } 
/* AhasthaH (8.2.35) */
if (in_array($first,array("Ah")) && (arr($text,'/[+]['.pc("Jl").']/')) )
{
   $text = one(array("Ah",),array("AT"),0);
	storedata('8.2.35','sa',0);
    $hodha3=1; // 0 - doesn't prevent ho DhaH. 1 - prevents ho DhaH.
} else { $hodha3 = 0; } 
if ($debug===1) {dibug("4400");}
/* ho DhaH (8.2.31) */ 
if (arr($text,'/[h][+]/') && sub(array("h"),prat("Jl"),blank(0),0) && $hodha1===0 && $hodha2 === 0 && $hodha3 === 0 )
{
    $text = two(array("h"),prat('Jl'),array("Q"),prat('Jl'),0);
	storedata('8.2.31','sa',0);
} 
if (arr($text,'/[h][+]$/') && $pada ==="pada" && $hodha1===0 && $hodha2 === 0 && $hodha3 === 0 )
{ 
    $text = two(array("h"),array("+"),array("Q"),array("+"),0);
	storedata('8.2.31','sa',0);
}
if (arr($text,'/[h]$/')  && $hodha1===0 && $hodha2 === 0 && $hodha3 === 0 )
{
    $text = last(array("h"),array("Q"),0);
	storedata('8.2.31','sa',0);
}
/* ekAco bazo bhaS jhaSantasya sdhvoH (8.2.37) */  
if ( /*anekAca($verb_without_anubandha)==false &&*/ ( arr($text,'/[bgqd](['.pc('al').']*)[JBGQD][+][sD]/') || arr($text,'/[JBGQD][+]$/') || $pada==="pada") )
{
	ekAcobazo(); // created a new function 19/12/2014.
}

/* SaDhoH kassi (8.2.41) */
if (arr($text,'/[zQ]/') && sub(array("z","Q"),array("s"),blank(0),0) && !in_array("Sapluk",$vik))
{
    $text = two(array("z","Q"),array("s"),array("k","k"),array("s"),0);
	storedata('8.2.41','sa',0);
}
/* coH kuH (8.2.30) */
$coku=0;
if ((arr($text,'/['.flat($cu).'][+]['.pc('Jl').']/')) && !in_array($fo,$noco) && in_array($so,$tiG) && ($syatAsI!==1 || $id_dhAtu !== "sew" )) // need to test for veT dhAtus. Pending.
{
	$text = three($cu,array("+"),prat('Jl'),$ku,array("+"),prat('Jl'),0); 
	storedata('8.2.30','sa',0);
	$coku=1; // 0 - doesn't prevent kvinpratyayasya kuH. 1 - prevents kvinpratyayasya kuH.
}
elseif (!in_array($so,$noco) && arr($text,'/['.flat($cu).'][+]$/') && in_array($so,$tiG) && $syatAsI!==1)
{
    $text = two($cu,array("+"),$ku,array("+"),0);
	storedata('8.2.30','sa',0);
	$coku=1; // 0 - doesn't prevent kvinpratyayasya kuH. 1 - prevents kvinpratyayasya kuH.
}
/* patch for nimittApAye naimittikasyApAyaH in coH kuH */
if ($coku === 1 && sub(array("Y"),$ku,blank(0),0))
{
	$text = two(array("Y"),$ku,array("n"),$ku,0);
	storedata('par@56-1','sa',0);
}
/* vRRto vA (7.2.38) */ 
if ( (in_array($fo,array("vfN","vfY")) || ends(array($verb_without_anubandha),array("F",),1)) && sub(array("ar"),array("+"),blank(0),0) && in_array($lakAra,$ArdhadhAtuka_lakAra) && in_array("iw",$Agama))
{
	$text=two(array("ar",),array("+i"),array("ar"),array("+I"),1);
	storedata('7.2.38','sa',0);
}
/* RRta iddhAtoH (7.1.100) */
if (arr($text,'/F\+sI/') && ($sarvadhatuka===1 || $ardhadhatuka===1) )
{
    $text=three(array("F"),array("+"),array("sI"),array("ir"),array("+"),array("sI"),0);
	storedata('7.2.100','sa',0);
	/* hali ca (8.2.77) */
	if (arr($text,'/ir\+sI/') && in_array($so,$tiG) )
	{
		$text=two(array("ir+"),array("sI"),array("Ir+"),array("sI"),0);
		storedata('8.2.77','sa',0);
	}
}
/* vibhASorNoH (1.2.3) */ 
if ( in_array($fo,array("UrRuY")) && sub(array("UrRu","orRu","UrRo","orRo"),array("+"),blank(0),0) && in_array($lakAra,$ArdhadhAtuka_lakAra) && $id_dhAtu==="sew" && $id_pratyaya==="sew")
{
	$text=two(array("UrRu","orRu","UrRo","orRo"),array("+i"),array("UrRo","orRo","UrRu","orRu"),array("+i"),1);
        $it=array_merge($it,array("N"));
        $itpratyaya=array_merge($itpratyaya,array("N"));
	storedata('1.2.3','sa',0);
}    
/* jhaSastathordho'dhaH (8.2.40) */
if (arr($text,'/['.pc('Jz').']\+[tT]/') && !sub(array("daD"),array("+"),array("t","T"),0) && in_array($so,$tiG))
{
    $text = two(prat('Jz'),array("+t","+T"),prat('Jz'),array("+D","+D"),0);
	storedata('8.2.40','sa',0);
}
/* iNo yaN (6.4.81) */ 
if ( $fo==="iR" && sub(array("i+i"),array("+"),$ac,0) )
{ 
    $text = three(array("i+i"),array("+"),$ac,array("i+y"),array("+"),$ac,0);
	storedata('6.4.81','sa',0);
}
/* dIrgha iNaH kiti (6.4.79) */ 
if ( $fo==="iR" && sub(array("i+y"),array("+"),$ac,0) )
{ 
    $text = three(array("i+y"),array("+"),$ac,array("I+y"),array("+"),$ac,0);
	storedata('6.4.79','sa',0);
}
/* abhyAsasyAsavarNe (6.4.78) */ 
if ( arr($text,'/^[iIuU][+][eoEO]/') && $abhyAsa===1)
{
    $text=change('/^([iI])([+][eoEO])/','$1y$2');
    $text=change('/^([uU])([+][eoEO])/','$1v$2');
	storedata('6.4.78','sa',0);
}
if ($debug===1) {dibug("4500");}
/* intermediate sandhis for vikaraNa pratyayas */
if ($lakAra!=="" && $type==="tiGanta")
{
    $dhatu=1;
    /* iNo yaN (6.4.81) */
    if (arr($text,'/i\+a/') && $pada === "pratyaya" && in_array($so,$tiG) && in_array($fo,array("iR","ik")) )
    {
        $text = two(array("i"),array("+a"),array("y"),array("+a"),0);
		storedata('6.4.81','sa',3);
    }
    /* eco'yavAyAvaH (6.1.78) */
    $ayavayavah = array("ay","av","Ay","Av");
    if (arr($text,'/[eoEO]\+/') && sub(prat('ec'),array("+i+","+a+","+Aya+","+Ana+","+e+"),blank(0),0))
    {
    $text = two(prat('ec'),array("+i+","+a+","+Aya+","+Ana+","+e+"),$ayavayavah,array("i+","a+","Aya+","Ana+","e+"),0);
	storedata('6.1.78','sa',0);
    }
    /* dRnkarapunaHpUrvasya bhuvo yaN vaktavyaH (vA 4118) */ 
    if (in_array($fo,array("dfnBU","karaBU","kAraBU","punarBU")) && sub(array($fo),array("+"),$ac,0) )
    {
        $text = three(array("dfnBU","punarBU"),array("+"),$ac,array("dfnBv","punarBv"),array("+"),$ac,0);
        $text = three(array("karaBU","kAraBU"),array("+"),$ac,array("karaBv","kAraBv",),array("+"),$ac,1);
		storedata('6.4.84-2','sa',0);
        if (in_array($fo,array("karaBU","kAraBU")))
        {
        $text=one(array("karaBv+e","karaBU+A+e","karaBv+as","karaBU+A+as","karaBv+i","karaBU+Am","kAraBv+e","kAraBU+A+e","kAraBv+as","kAraBU+A+as","kAraBv+i","kAraBU+Am"),array("karaBU+e","karaBv+A+e","karaBU+as","karaBv+A+as","karaBU+i","karaBv+Am","kAraBU+e","kAraBv+A+e","kAraBU+as","kAraBv+A+as","kAraBU+i","kAraBv+Am",),0);
		storedata('karaBU','sa',0);
        }
    }
    /* varSAbhvazca (6.4.84) */ 
    if ($first==="varzABU"  && sub(array($fo),array("+"),$ac,0) )
    {
        $text = two(array("varzABU"),array("+"),array("varzABv"),array("+"),0);
		storedata('6.4.84','sa',0);
    }

    if ($fo==="dfmBU")
    {
        $dfmBU=1; // 0 - the word is not dRmbhU. 1 - the word is dRmbhU.
    } else { $dfmBU=0; }
    /* na bhUsudhiyoH (6.4.85) */
    if (in_array($fo,array("suDI","praDI")) && sub(array($fo),array("+"),$ac,0) )
    {
        $dhatu=1;
    }
    if (in_array($fo,array("praDI"))  && sub(array($fo),array("+"),$ac,0) )
    {
       $eranekaca=1;
    }
    /* kvau luptaM na sthAnivat (vA 431) */
    // Not displayed because it is difficult to teach sthnanivadbhav to machine now. Will come back to it if I can teach it some day.
    /* aci znudhAtubhruvAM yvoriyaGuvaGau (6.4.77) */
    if (arr($text,'kur\+u') && sub(array("kur+u"),array("+"),$ajAdi_apit_sArvadhAtuka_pratyayas,0) && $sIyuT!==1 )
    {
        $text=two(array("kur+u+"),$ajAdi_apit_sArvadhAtuka_pratyayas,array("kurv+"),$ajAdi_apit_sArvadhAtuka_pratyayas,0);
		storedata('6.1.77','sa',0);
    }
    // special patch for IDAgama of turustu... to make it amenable to aci znudhAtu...
    $text=one(array("+I+"),array("+I"),0);
	if ((arr($text,'/^i[+]i/')||arr($text,'/^u[+]u/')) && $kGiti===1) # Patch because of https://github.com/drdhaval2785/SanskritVerb/issues/375
	{
		$text = change('/^[i][+][i]/','I');
		$text = change('/^[u][+][u]/','U');
		storedata('6.1.101','sa',0);
	}
    if (($dhatu===1||$fo==="BrU") && arr($text,'/[iuIU][+]['.flat($ac).']/') && $pada==="pratyaya" && ( anekAca($fo)===false  || in_array($so,$tiG) || (arr($text,'/[B][U][+]/')||$fo==="suDI") ) && $dfmBU===0 && $didhI!==1 && $nabhusu!==1 && !sub(array("+"),array("I"),array("+"),0) && ($abhyasta!==1 || in_array($fo,array("hrI"))) && $sIyuT!==1)
    {
        $text = two(array("i+","I+","u+","U+"),$ac,array("iy+","iy+","uv+","uv+"),$ac,0);
		$text = one(array("uv+uv+"),array("u+uv+"),0);
		storedata('6.4.77','sa',3);
//        echo "<p class = hn >gatikAraketarapUrvapadasya yaN neSyate (vA 5034) mandates that eranekAco.../oH supi rule doesn't apply in cases where the pUrvapada is neither gati nor kAraka. iyaG or uvaG is applied in that case. :</p>\n";
//        echo "<p class = hn >गतिकारकेतरपूर्वपदस्य यण्‌ नेष्यते (वा ५०३४) से गति / कारक से भिन्न पूर्वपद होने पर एरनेकाचो.../ओः सुपि सूत्र नहीं लागू होता । इयङ्‌ या उवङ्‌ की प्रवृत्ति होती है । :</p>\n";
	}
    if (arr($text,'/\+nu\+['.pc('ac').']/') && $sIyuT!==1)
    {
        $text = two(array("+nu+"),$ac,array("+nuv+"),$ac,0);
		storedata('6.4.77','sa',0);
    }
    /* ATazca (6.1.90) */
    if (arr($text,'/A['.pc('ac').']/') && in_array("Aw",$Agama) )
    {
        $text = two(array("A"),$ac,array(""),vriddhi($ac),0);
		storedata('6.1.90','sa',0);
    }
    /* gatikAraketarapUrvapadasya yaN neSyate (vA 5034) */
    // This is attached with eranekAco... So, trying to put a note and making the iyaG and yaN optional.
    /* eranekAco'saMyogapUrvasya (6.4.82) */
    if ($dhatu===1 && arr($text,'/[iI][+]['.pc('ac').']/') && in_array($fo,array("unnI")) && $pada==="pratyaya" && anekAca($fo) && $nabhusu===0)
    {
		storedata('eranekAc','sa',0);
        $unni=1; // 0 - the word is not unnI. 1 - the word is unnI
    } else { $unni=0; } 
    if ($dhatu===1 && (arr($text,'/['.flat($ac).']['.flat($hl).'][iI][+]['.flat($ac).']/')||$unni===1) && $pada==="pratyaya" && (anekAca($fo) || $abhyasta===1 )&& $nabhusu===0 )
    {
        $text = three(array("i","I"),array("+"),$ac,array("y","y"),array("+"),$ac,0);                
		storedata('6.4.82','sa',3);
//        echo "<p class = hn >gatikAraketarapUrvapadasya yaN neSyate (vA 5034) mandates that this rule doesn't apply in cases where the pUrvapada is neither gati nor kAraka. iyaG or uvaG is applied in that case. :</p>\n";
//        echo "<p class = hn >गतिकारकेतरपूर्वपदस्य यण्‌ नेष्यते (वा ५०३४) से गति / कारक से भिन्न पूर्वपद होने पर यह सूत्र नहीं लागू होता । इयङ्‌ या उवङ्‌ की प्रवृत्ति होती है । :</p>\n";
    }
    /* oH supi (6.4.83) */ 
    if ($dhatu===1 && in_array($fo,array("ullU")) && $pada==="pratyaya" && anekAca($fo) && $nabhusu===0 && $dfmBU===0)
    {
		storedata('osupi','sa',0);
        $ullU=1; // 0 - word is not ullU. 1 - word is ullU.
    } else { $ullU=0; }
    if ($dhatu===1 && ( arr($text,'/['.pc('hl').'][uU][+]['.flat($ac).']/') || $ullU===1 )&& !sub(array("+"),array("u+"),blank(0),0) && $pada==="pratyaya" && anekAca($fo) && $nabhusu===0 && $dfmBU===0 && !arr($text,'/['.pc('hl').']['.pc('hl').'][uU][+]['.flat($ac).']/'))
    {
        $text = three(array("u","U"),array("+"),$ac,array("v","v"),array("+"),$ac,0);
		storedata('6.4.83','sa',3);
//        echo "<p class = hn >gatikAraketarapUrvapadasya yaN neSyate (vA 5034) mandates that this rule doesn't apply in cases where the pUrvapada is neither gati nor kAraka. iyaG or uvaG is applied in that case. :</p>\n";
//        echo "<p class = hn >गतिकारकेतरपूर्वपदस्य यण्‌ नेष्यते (वा ५०३४) से गति / कारक से भिन्न पूर्वपद होने पर यह सूत्र नहीं लागू होता । इयङ्‌ या उवङ्‌ की प्रवृत्ति होती है । :</p>\n";
    }    
	/* akaH savarNe dIrghaH (6.1.101) */
	if ( arr($text,'/^[iIuU]/') && sub(array("i+i","I+I","u+u","U+U"),blank(0),blank(0),0) && $abhyAsa===1)
	{
		$text=one(array("i+i","I+I","u+u","U+U"),array("I","I","U","U"),0);
		storedata('6.1.101','sa',0);
	}
}
if ($debug===1) {dibug("4650");}
/* Adding aDAgama and other pratyaya works which are done after aGgakArya */
/* Candasyapi dRzyate */
// Pending. Page 249 of Sahajabodha part 1. Vedic in nature.
/* bahulaM CandasyamAGyoge'pi */
// Pending. Page 249 of Sahajabodha part 1. Vedic in nature.
/* utazca pratyayAdasaMyogapUrvAt (6.4.106) */
if (arr($text,'/['.pc('ac').']\+nu\+hi/') && in_array($so,$tiG) )
{
    $text=three($ac,array("+"),array("nu+hi"),$ac,array("+"),array("nu"),0);
	storedata('6.4.106','sa',0);
}
if (arr($text,'/\+u\+hi/') && sub($ac,$hl,array("+u+hi"),0) && in_array($so,$tiG) )
{
    $text=three($ac,$hl,array("+u+hi"),$ac,$hl,array("+u"),0);
	storedata('6.4.106','sa',0);
}
/* lopazcAsyAnyatarasyAM mvoH (6.4.107) */
if (arr($text,'/['.pc('ac').']\+nu\+/') && sub($ac,array("+nu+"),array("vas","mas","vahe","mahe","va","ma","vahi","mahi",),0) && in_array($so,$tiG) )
{
    $text=three($ac,array("+nu+"),array("vas","mas","vahe","mahe","va","ma","vahi","mahi",),$ac,array("+n+"),array("vas","mas","vahe","mahe","va","ma","vahi","mahi",),1);
	storedata('6.4.107','sa',0);
}
if (arr($text,'/['.pc('hl').']\+u\+/') && sub($hl,array("+u+"),array("vas","mas","vahe","mahe","va","ma","vahi","mahi",),0) && !sub($hl,$hl,array("+u+"),0) && in_array($so,$tiG) )
{
    $text=three($hl,array("+u+"),array("vas","mas","vahe","mahe","va","ma","vahi","mahi",),$hl,array("+"),array("vas","mas","vahe","mahe","va","ma","vahi","mahi",),1);
	storedata('6.4.107','sa',0);
}

/* finally adding halanta+a into single aGga */
if (arr($text,'/['.pc('hl').']\+a\+['.pc('hl').']/'))
{
	$text=two($hl,array("+a+"),$hl,array("a+"),0);
}

/* halaH znaH zAnajJau (3.1.83) */
if (arr($text,'/['.pc('hl').']\+nA\+hi/') && in_array($so,$tiG) )
{
    $text=two($hl,array("+nA+hi"),$hl,array("+Ana+hi"),0);
	storedata('3.1.83','sa',0);
}
/* Chandasi zAnajapi (3.1.81) */
if ( $veda===1 && arr($text,'/['.pc('hl').']\+Ana\+hi/')&& in_array($so,$tiG) )
{
    $text=two($hl,array("+Ana+hi"),$hl,array("+Aya+hi"),1);
	storedata('3.1.81','sa',0);
}
if ($debug===1) {dibug("4700");}
/* ato heH (6.4.105) */
if (arr($text,'/a\+hi/') && in_array($so,$tiG) && $hanterjaH!==1 )
{
    $text=two(array("a+"),array("hi"),array("a+"),array(""),0);
	storedata('6.4.105','sa',0);
}
/* lopo yi (6.4.118) */
if (arr($text,'/jahA\+y/') && (in_array("N",$it)||in_array("k",$it)) && $sarvadhatuka===1 )
{
    $text=one(array("jahA+y"),array("jah+y"),0);
	storedata('6.4.118','sa',0);
}
/* jahAtezca (6.4.116) */
if (arr($text,'/jahA\+/') && sub(array("jahA"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,0) && (in_array("N",$it)||in_array("k",$it)) && $abhyasta===1)
{
    $text=three(array("jahA"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("jahi"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,1);
	storedata('6.4.116','sa',0);
}
/* I halyaghoH (6.4.113) */
if (arr($text,'/\+nA\+/') && sub(array("+"),array("nA+"),$halAdi_apit_sArvadhAtuka_pratyayas,0) && (in_array("N",$it)||in_array("N",$it)))
{
    $text=two(array("+nA+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("+nI+"),$halAdi_apit_sArvadhAtuka_pratyayas,0);
	storedata('6.4.113','sa',0);
}
if (arr($text,'/\+nA\+yA/') && sub(array("+"),array("nA+yA"),blank(0),0) ) # https://github.com/drdhaval2785/SanskritVerb/issues/335
{
    $text=one(array("+nA+yA"),array("+nI+yA"),0);
	storedata('6.4.113','sa',0);
}
if (arr($text,'/A\+/') && sub(array("A"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,0) && (in_array("N",$it)||in_array("k",$it)) && $abhyasta===1)
{
    $text=three(array("A"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("I"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,0);
	storedata('6.4.113','sa',0);
}
/* znA'bhyastayorAtaH (6.4.112) */
// For znA
$text = two(array("+nA+Iy+"),$ac,array("+nA+Iy"),$ac,0);
if (arr($text,'/\+nA\+/') && sub(array("+nA"),array("+"),$apit_sArvadhAtuka_pratyayas,0) && in_array("SnA",$vik) )//&& (in_array("N",$it)||in_array("k",$it)) )
{
    $text=three(array("+nA"),array("+"),$apit_sArvadhAtuka_pratyayas,array("n"),array("+"),$apit_sArvadhAtuka_pratyayas,0);
	storedata('6.4.112','sa',0);
}
/* janasanakhanAM saJjhaloH (6.4.42) */
// sannanta pending.
//if ( sub(array("jan","san","Kan"),array("+"),prat("Jl"),0) && pr2(array("jan","san","Kan"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("jaA","saA","KaA"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,$text)!==$text && (in_array("N",$it)||in_array("k",$it)) && in_array($so,$tiG) ) // kGiti is temporarily deactivated.
if (arr($text,'an\+['.pc('Jl').']') && sub(array("jan","san","Kan"),array("+"),prat("Jl"),0)  && in_array($so,$tiG) ) 
{
//    $text=pr2(array("jan","san","Kan"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("jaA","saA","KaA"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,$text);
	$text=two(array("jan+","san+","Kan+"),prat("Jl"),array("jaA+","saA+","KaA+"),prat("Jl"),0);
	storedata('6.4.42','sa',0);
}
/* ye vibhASA (6.4.43) */
if (arr($text,'/an\+y/') && sub(array("jan","san","Kan"),array("+"),array("y"),0) && pr2(array("jan","san","Kan"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("jaA","saA","KaA"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,$text)!==$text && (in_array("N",$it)||in_array("k",$it)) && in_array($so,$tiG) )
{
    $text1=pr2(array("jan","san","Kan"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("jaA","saA","KaA"),array("+"),$halAdi_apit_sArvadhAtuka_pratyayas,$text);
    $text = array_merge($text,$text1);
	storedata('6.4.43','sa',0);
}
/* anunAsikasya kvijhaloH kGiti (6.4.15) */
if (arr($text,'/[aiufx][NYRnm]\+/') && pr2(array("a","i","u","f","x"),array("N+","Y+","R+","n+","m+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("A","I","U","F","F"),array("N+","Y+","R+","n+","m+"),$halAdi_apit_sArvadhAtuka_pratyayas,$text)!==$text && !in_array($so,$tiG) && (in_array("N",$it)||in_array("k",$it))  && !sub(array("+"),prat("hm"),blank(0),0)) // see https://github.com/drdhaval2785/SanskritVerb/issues/74.
{
    $text = pr2(array("a","i","u","f","x"),array("N+","Y+","R+","n+","m+"),$halAdi_apit_sArvadhAtuka_pratyayas,array("A","I","U","F","F"),array("N+","Y+","R+","n+","m+"),$halAdi_apit_sArvadhAtuka_pratyayas,$text);
	storedata('6.4.15','sa',0);
}
/* A ca hau (6.4.115) */
if (arr($text,'/jahI\+hi/') && sub(array("jahI"),array("+"),array("hi"),0) && (in_array("N",$it)||in_array("k",$it)) && $abhyasta===1)
{
    $text=three(array("jahI"),array("+"),array("hi"),array("jahi"),array("+"),array("hi"),1);
    $text=three(array("jahI"),array("+"),array("hi"),array("jahA"),array("+"),array("hi"),1);
	storedata('6.4.115','sa',0);
}
/* Joining aGga and pratyayas */
/* ato dIrgho yaJi (7.3.101) */
if (arr($text,'/a\+/') && pr2(array("a"),array("+mi","+mas","+vas","+ma","+va","+mahi","+vahi","+mahe","+vahe"),blank(0),array("A"),array("+mi","+mas","+vas","+ma","+va","+mahi","+vahi","+mahe","+vahe"),blank(0),$text)!==$text  )
{
    $text = pr2(array("a"),array("+mi","+mas","+vas","+ma","+va","+mahi","+vahi","+mahe","+vahe"),blank(0),array("A"),array("+mi","+mas","+vas","+ma","+va","+mahi","+vahi","+mahe","+vahe"),blank(0),$text);
	storedata('7.3.101','sa',0);
}
/* ato dIrgho yaJi (7.3.101) */
if (arr($text,'/\+a[vm]a/') && in_array($so,$tiG) )
{
    $text = two(array("+"),array("ava","ama"),array("+"),array("+Ava","+Ama"),0);
	storedata('7.3.101','sa',0);
}
/* ato guNe (6.1.97) */
if (arr($text,'/a\+[aeo]/') && $pada === "pratyaya" && in_array($so,$tiG) )
{
    while(sub(array("a"),array("+a","+e","+o"),blank(0),0) !== false)
    {
		$text = two(array("a"),array("+a","+e","+o"),blank(1),array("+a","+e","+o"),0);   
    }      
	storedata('6.1.97','sa',0);
}
/* bahulaM Candasi (2.4.73) */
if (in_array($fo,array("Samu!","ama!")) && in_array($so,$tiG) && $veda===1 && sub(array("SAm","ama"),array("+"),blank(0),0) )
{
    $text=two(array("SAm+ya","ama"),array("+"),array("Sam","am"),array("+"),1);
	storedata('2.4.73','sa',0);
}
/* IDajanordhve ca (7.2.78) */
if(arr($text,'/Iq\+/') && sub(array("Iq"),array("+si","+se","+sva","+Dve","+Dvam"),blank(0),0) && in_array($so,$tiG))
{
	$text = two(array("Iq"),array("+si","+se","+sva","+Dve","+Dvam"),array("Iqi"),array("+si","+se","+sva","+Dve","+Dvam"),0);
	storedata('7.2.78','sa',0);
}
if ($debug===1) {dibug("4800");}
/* dhi ca (8.2.25) */
// only Dv is placed to make it specific to pratyayas. Others may be added. Pending.
if ( $lakAra!=="" && arr($text,'/Dv/') && sub(array("s"),array("Dv"),blank(0),0) && in_array($so,$tiG))
{
    $text = two(array("s"),array("Dv"),array(""),array("Dv"),0);
	storedata('8.2.25','sa',0);
}
/* hrasvAdaGgAt (8.2.27) */
if ( $sic===1 && arr($text,'/[aiufx]\+s/') && sub(array("a","i","u","f","x"),array("+s"),prat("Jl"),0) && in_array($so,$tiG) )
{
	$text = three(array("a","i","u","f","x"),array("+s"),prat("Jl"),array("a","i","u","f","x"),array("+"),prat("Jl"),0); 
	storedata('8.2.27','sa',0);
}
/* AdezapratyayayoH (8.3.59) */
if( in_array($so,$tiG) && (!arr($text,'/[+][s]$/') || $SaHsaH===1 || $sic===1 || $syatAsI===1 || ends(array($us),prat('ik'),1)) && !arr($text,'/\+yAs\+/') && Adezapratyaya($text)!==$text )
{
    $text = Adezapratyaya($text); // created a new function on 15/12/2014
	storedata('8.3.59','sa',0);
}
/* vibhASeTaH (8.3.79) */
if( in_array($so,$tiG) && (arr($text,'/[iIuUfFxXeEoOhyvrl]\+izIDv/') || (arr($text,'/[iIuUfFxXeEoOhyvrl]\+iDv/') && in_array($lakAra,array("luN","liw")) )) && arr(array($verb_without_anubandha),'/[iIuUfFxXeEoOhyvrl]$/')  )
{
	$text = two($iN2,array("+izIDv","+iDv"),$iN2,array("+izIQv","+iQv"),1);
	storedata('8.3.79','sa',0);
}
/* iNaH SIdhvaMluGliTAM dho'GgAt (8.3.78) */
elseif( in_array($so,$tiG) && ((arr($text,'/zIDv/') && sub($iN2,array("zIDv"),blank(0),0)) || ( (arr($text,'/Dv/') &&sub($iN2,array("Dv"),blank(0),0)) && in_array($lakAra,array("luN","liw")) )) && arr(array($verb_without_anubandha),'/[iIuUfFxXeEoOhyvrl]$/') )
{
	$text = two($iN2,array("zIDv","Dv"),$iN2,array("zIQv","Qv"),0);
	storedata('8.3.78','sa',0);
}
/* halGyAbbhyo dIrghAtsutisyapRktaM hal (6.1.68) and apRkta ekAlpratyayaH (1.2.41) */
// GyAp pending. only hal handled now.
if (arr($text,'/['.pc('hl').'][+][sts]$/') && !arr($text,'/s[+]s$/') && in_array($so,array("su!","tip","sip",)))
{
	storedata('1.2.41','pa',0);
}
if (arr($text,'/['.pc('hl').'][+][sts]$/')  && !arr($text,'/s[+]s$/') && in_array($so,array("su!","tip","sip")))
{
    $text = two($hl,array("+s","+t"),$hl,array("+","+"),0);
	storedata('6.1.68','sa',0);
    $pada="pada"; // there is no pratyaya left now.
    $halGyAbbhyo=1;
}
/* rAtsasya (8.2.24) */
if ((arr($text,('/[r][+][s]$/')) && $pada === "pratyaya") || (arr($text,('/[r][s][+]/')) && $pada === "pada") )
{
    $text = one(array("r+s"),array("r"),0);
    $text = two(array("rs"),array("+"),array("r"),array("+"),0);
	storedata('8.2.24','sa',0);
}
if ((arr($text,('/[r][+][hyvrlYmGRnJBGQDjbgqdKPCWTcwtkpzS]$/')) && $pada === "pratyaya") || (arr($text,('/[r][hyvrlYmGRnJBGQDjbgqdKPCWTcwtkpzS][+]/')) && $pada === "pada") )
{
	storedata('8.2.24','sa',0);
    $ratsasya=1; // 0 - doesn't prevent saMyogAntasya lopaH. 1 - prevents saMyogAntasya lopaH.
} else { $ratsasya=0; }
/* saMyogAntasya lopaH (8.2.23) */
if (arr($text,'/['.pc('Jy').']\+/') && ( sub(array("N"),$ku,array("+"),0) || sub(array("Y"),$cu,array("+"),0) || sub(array("R"),$Tu,array("+"),0) ||sub(array("m"),$pu,array("+"),0) ) && $ratsasya===0 && $pada==="pada" && in_array($so,$tiG) && !sub(array("+"),array("A"),blank(0),0) && $ancu!==2) // patch for nimittApAye naimittikasyApAyaH. Also see https://github.com/drdhaval2785/SanskritVerb/issues/295 for $ancu correction.
{
    $text = three(array("N"),$ku,array("+"),array("n"),blank(count($ku)),array("+"),0); 
    $text = three(array("Y"),$cu,array("+"),array("n"),blank(count($cu)),array("+"),0); 
    $text = three(array("R"),$Tu,array("+"),array("n"),blank(count($Tu)),array("+"),0); 
    $text = three(array("m"),$pu,array("+"),array("n"),blank(count($pu)),array("+"),0); 
	storedata('8.2.23','sa',0);	
	storedata('par@56-1','sa',0);
}
/*elseif ( sub($hl,$hl,array("+"),0) && in_array($so,$tiG) && $ratsasya===0 && !arr($text,'/['.pc('hl').']['.pc('hl').'][+]['.pc('ac').']/') && $pada==="pada" )
{
    $text = three($hl,$hl,array("+"),$hl,blank(count($hl)),array("+"),0);
    echo "<p class = sa >By saMyogAntasya lopaH (".link_sutra("8.2.23").") :</p>\n";
    echo "<p class = sa >संयोगान्तस्य लोपः (८.२.२३) :</p>\n";
    display(0);
}*/ // bracketed because pfcC+yAs gave pfcyAs. pending to check.
elseif (arr($text,'/['.pc('hl').']['.pc('hl').']$/') && in_array($so,$tiG) && $ratsasya===0)
{
    $text = pr2($hl,$hl,blank(0),$hl,blank(count($hl)),blank(0),$text);
	storedata('8.2.23','sa',0);
} 
elseif ( arr($text,'/['.pc('hl').'][+]['.pc('hl').']$/') && $ratsasya===0  && in_array($so,$tiG) && $pada==="pada" )
{
    $text = two($hlplus,$hl,$hlplus,blank(count($hl)),0);
	storedata('8.2.23','sa',0);
} 
elseif ( (arr($text,'/s\+/') && sub(array("M"),array("s"),array("+"),0)  && in_array($so,$tiG)) && $pada==="pada" ) // patch for mAMsa. mAMspacanyA UkhAyAH is pending. ayasmayAdIni etc pending.
{
    $text = three(array("M"),array("s+"),$ku,array("N+"),blank(count($hl)),$ku,0); 
    $text = three(array("M"),array("s+"),$cu,array("Y+"),blank(count($hl)),$cu,0); 
    $text = three(array("M"),array("s+"),$Tu,array("R+"),blank(count($hl)),$Tu,0); 
    $text = three(array("M"),array("s+"),$tu,array("n+"),blank(count($hl)),$tu,0); 
    $text = three(array("M"),array("s+"),$pu,array("m+"),blank(count($hl)),$pu,0); 
    $text = three(array("M"),array("s"),array("+"),array("m"),blank(count($hl)),array("+"),0); 
	storedata('8.2.23','sa',0);	
	storedata('par@56-1','sa',0);
}
elseif ( (arr($text,'/M/') && sub(array("M"),$hl,array("+"),0) && in_array($so,$tiG)) && $pada==="pada" )
{
    $text = three(array("M"),$hl,array("+"),array("M"),blank(count($hl)),array("+"),0);
	storedata('8.2.23','sa',0);	
    if (arr($text,'/M\+/'))
    {
    $text = two(array("M+"),$ku,array("N+"),$ku,0);
    $text = two(array("M+"),$cu,array("Y+"),$cu,0);
    $text = two(array("M+"),$Tu,array("R+"),$Tu,0);
    $text = two(array("M+"),$tu,array("n+"),$tu,0);
    $text = two(array("M+"),$pu,array("m+"),$pu,0);
    $text = two(array("M"),array("+"),array("m"),array("+"),0);
	storedata('par@56-1','sa',0);
    }
}
if ($debug===1) {dibug("4900");}
/* daridrAterArdhadhAtuke vivakSite Alopo vAcyaH (vA) */
if (arr($text,'/daridrA\+/') && in_array($fo,array("daridrA")) && $ardhadhatuka===1)
{
    $text=one(array("daridrA+"),array("daridr+"),0);
    $text=one(array("daridr+s"),array("daridrA+s"),0);
	storedata('6.4.114-1','sa',0);	
}
/* apadAntasya mUrdhanyaH (8.3.55), iNkoH (8.3.57) and AdezapratyayayoH (8.3.59) */
// Not coded perfectly. This is only for tiG pratyayas.
if(arr($text,'/[iIuUfFxXeoEOhyvrlkKgGN]\+s/') && !arr($text,'/[iIuUfFxXeoEOhyvrl]\+s$/') && in_array($so,$tiG) )
{
$text = two($iN1,array("+s"),$iN1,array("+z"),0);
storedata('8.3.55','sa',0);
storedata('8.3.57','sa',0);
storedata('8.3.59','sa',0);
}
/* For verbs - remove all + marks. */
if(in_array($so,$tiG))
{
    $text=one(array("+"),array(""),0);
}
/* tipyanasteH (8.2.73) */
if ( arr($text,'/[s]$/') && $so==='tip' && $lakAra==="laN")
{
    $text = pr2(array("s"),blank(0),blank(0),array("d"),blank(0),blank(0),$text);
	storedata('8.2.73','sa',0);	
}
/* dazca (8.2.75) */
if ( arr($text,'/[d]$/') && $so==='sip' && $lakAra==="laN")
{
    $text2= $text;
    $text1 = pr2(array("d"),blank(0),blank(0),array("r@"),blank(0),blank(0),$text);
    $text = array_merge($text2,$text1);
	storedata('8.2.75','sa',0);	
}
/* sipi dhAto rurvA (8.2.74) */
if ( arr($text,'/[s]$/') && $so==='sip' && $lakAra==="laN" && $halGyAbbhyo===1)
{
    $text1 = pr2(array("s"),blank(0),blank(0),array("d"),blank(0),blank(0),$text);
    $text2 = pr2(array("s"),blank(0),blank(0),array("r@"),blank(0),blank(0),$text);
    $text = array_merge($text2,$text1);
	storedata('8.2.74','sa',0);	
}

/* This ends the tiGanta specific part. The next are common subanta and tiGanta parts. */

/* displaying general information about the sup vibhaktis */
/* arthavadadhAturapratyayaH prAtipadikam (1.2.45), kRttaddhitasamAsAzca (1.2.46), pratyayaH (3.1.1), parazca (3.1.2), GyAppradipadikAt (4.1.1), svaujasamauTCaSTAbhyAmbhisGebhyAmbhyasGasibhyAmbhyasGasosAmGyossup (4.1.2), vibhaktizca (1.4.104), supaH (1.4.103) */
// For future sUtras also, code for each sUtra is separated by /* xyz.... */.
if (in_array($so,$sup) && $pada==="pratyaya") // Here conditions for application of sUtra is mentioned.
{
	storedata('1.2.45','pa',0);
	storedata('1.2.46','pa',0);
	storedata('3.1.1','pa',0);
	storedata('3.1.2','pa',0);
	storedata('4.1.1','pa',0);
	storedata('4.1.2','pa',0);
	storedata('1.4.104','pa',0);
	storedata('1.4.103','pa',0);
}
/* dvyekayordvivacanaikavacane (1.4.22) */
if ( (in_array($so,$eksup)||in_array($so,$dvisup) ) && $pada==="pratyaya") // For $eksup, $dvisup etc. arrays which are not mentioned in subanta.php, please see function.php.
{
	storedata('1.4.22','pa',0);
}
/* bahuSu bahuvacanam (1.4.21) */
if (in_array($so,$bahusup) && $pada==="pratyaya")
{
	storedata('1.4.21','pa',0);
}
/* sarUpANAmekazeSa ekavibhaktau (1.2.64) */
if ( (in_array($so,$bahusup)||in_array($so,$dvisup) ) && $pada==="pratyaya")
{
	storedata('1.2.64','pa',0);
}
/* ekavacanaM sambuddhiH (2.3.49) */
if ( $sambuddhi === 1 && $so==="su!" && $pada==="pratyaya")
{
	storedata('2.3.49','pa',0);
}
if ($debug===1) {dibug("5000");}
/* nityabahuvacanAnta special messages */
$nityabahuvacana = array("kati","tri","catur","paYcan","saptan","azwan","navan","daSan","ap"); // list of words which are used in bahuvacanam always. New can be added.
if (in_array($fo,$nityabahuvacana) && !in_array($so,$bahusup) && in_array($so,$sup))
{
	storedata('nityabahu','red',0);
}
/* nityadvivacanAnta special messages */
$nityadvivacana = array("dvi"); // list of words which are used in dvivacanam always.
if (in_array($fo,$nityadvivacana) && !in_array($so,$dvisup) && in_array($so,$sup))
{
	storedata('nityadvi','red',0);
}
/* tyadAdi sambodhana special messages */
if (in_array($fo,$tyadadi) && $so==="su!" && $sambuddhi===1)
{
	storedata('tyadsam','red',0);
}
/* defining sarvanama status */
// $sarvafinal. 1 - obligatory. 2 - optional. 0 - no sarvanamasaJjJA.
/* vibhASAprakaraNe tIyasya GitsUpasaMkhyAnam (vA 242) */ 
if (in_array($fo,array("dvitIyA","tftIyA")) && in_array($so,array("Ne","Nasi!","Nas","Ni")))
{
    $sarvafinal = 2;
	storedata('7.3.115','sa',0);
}
elseif (in_array($fo,array("dvitIya","tftIya")) && in_array($so,array("Ne","Nasi!","Nas","Ni")))
{
    $sarvafinal = 2;
	storedata('1.1.36-3','sa',0);
}
elseif ( in_array($_GET['cond1_1_1'],array("1","2")) || in_array($_GET['cond2_1_2_1'],array("1","2"))) // For these $_GET, pleas see ajax.php and ajax requirements.docx. the numbers refer to their documentation in docx file.
{
    $sarvafinal = 0;
	storedata('1.1.27-2','pa',0);
}
elseif ( $_GET['cond1_1_1']==="3" || $_GET['cond2_1_2_1']==="3")
{
    $sarvafinal = 0;
	storedata('1.1.30','pa',0);
}
elseif ( $_GET['cond1_1_1']==="4" || $_GET['cond2_1_2_1']==="4")
{
    $sarvafinal = 0;
	storedata('1.1.31','pa',0);
	$dvandveca=1; // 0 - dvandve ca will not apply. 1 - dvandve ca will apply.
}
elseif ( $_GET['cond1_1_1_5']==="1" || $_GET['cond2_1_2_1_5']==="1" )
{
    $sarvafinal = 2;
	storedata('1.1.28','pa',0);
}
elseif ( $_GET['cond1_1_1_5']==="2" || $_GET['cond2_1_2_1_5']==="2" )
{
    $sarvafinal = 0;
	storedata('1.1.29','pa',0);
}
elseif ( $_GET['cond1_1_1_6_1']==="2" || $_GET['cond2_1_2_1_6_1']==="2" )
{
    $sarvafinal = 1;
	storedata('gasU1','pa',0);
    $purvapara=1; // 0 - pUrvaparA... will not apply. 1 - will apply
    $sarvanama=array_merge($sarvanama,array("pUrva","para","avara","dakziRa","uttara","apara","aDara","pUrvA","parA","avarA","dakziRA","uttarA","aparA","aDarA"));
}
elseif ( $_GET['cond1_1_1_6_1']==="1" || $_GET['cond2_1_2_1_6_1']==="1" )
{
    $sarvafinal = 0;
}
elseif ( $_GET['cond1_1_1_6_2']==="2" || $_GET['cond2_1_2_1_6_2']==="2" )
{
    $sarvafinal = 1;
	storedata('gasU2','pa',0);
    $sva=1; // 0 - svamajJAtidhanAkhyAyAm (1.1.35) doesn't apply. 1 - svamajJAtidhanAkhyAyAm (1.1.35) applies.           
    $sarvanama=array_merge($sarvanama,array("sva","svA")); // For most of the cases, sva / svA are not sarvanAma. In this particular case, they become sarvanAma.
}
elseif ( $_GET['cond1_1_1_6_2']==="1" || $_GET['cond2_1_2_1_6_2']==="1" )
{
    $sarvafinal = 0;
    $sva=0;           
}
elseif ( $_GET['cond1_1_1_6_3_1']==="1" || $_GET['cond2_1_2_1_6_3_1']==="1" )
{
    $sarvafinal = 0;
	storedata('gasU3a','pa',0);
    $antara=0;           // 0 - antaraM bahiryogopasaMvyAnayoH (1.1.36) doesn't apply. 1 - antaraM bahiryogopasaMvyAnayoH (1.1.36) applies.
}
elseif ( $_GET['cond1_1_1_6_3_1']==="2" || $_GET['cond2_1_2_1_6_3_1']==="2" )
{
    $sarvafinal = 1;
	storedata('gasU3','pa',0);
    $antara=1;     
    $sarvanama=array_merge($sarvanama,array("antara","antarA"));
}
elseif ( $_GET['cond1_1_1_6_3']==="2" || $_GET['cond2_1_2_1_6_3']==="2" )
{
    $sarvafinal = 0;
    $antara=0;           
}
elseif ( $_GET['cond1_1_1_6_4']==="1" || $_GET['cond2_1_2_1_6_4']==="1" )
{
    $sarvafinal = 1;
}
elseif ( $_GET['cond1_1_1_6_4']==="2" && !in_array($fo,array("anyatara","anyatarA")) && $_GET['cond2_1_2_1_6_4']==="2")
{
    $sarvafinal = 0; 
    $sarvanama=array_diff($sarvanama,array("atara","atama","atarA","atamA")); echo "hi";
}
elseif (ends(array($fo),array("anyatama","anyatamA"),1))
{
    $sarvafinal = 0;
	storedata('anyatama','pa',0);
	$sarvanama=array_diff($sarvanama,array("atama","atamA"));
}
elseif ( $_GET['cond1_1_1_6_5']==="1" || $_GET['cond2_1_2_1_6_5']==="1" )
{
    $sarvafinal = 1;
	storedata('sama','pa',0);
    $sarvanama=array_merge($sarvanama,array("sama","samA"));
}
elseif ( $_GET['cond1_1_1_6_5']==="2" || $_GET['cond2_1_2_1_6_5']==="2" )
{
    $sarvafinal = 0;
	storedata('tulya','pa',0);
}
elseif ( $_GET['cond1_1_1']==="6" || $_GET['cond2_1_2_1']==="6" || in_array($fo,array("idam","tyad")) )
{
    $sarvafinal = 1;
}
elseif ( ($_GET['cond1_16']==="2" || $_GET['cond1_7']==="2") && in_array($fo,$sarvanama) )
{
    $sarvafinal = 1;
}
elseif ( $_GET['cond1_10']==="2"  )
{
    $sarvafinal = 1;
}
elseif ( ends(array($fo),array("tvat","tyad","tad","yad","etad","idam","adas","yuzmad","asmad","kim","idakam"),1)  ) // prAdhAnya and gauNatva pending.
{
    $sarvafinal = 1;
}
else
{
    $sarvafinal = 0;
}

/* sarvAdIni sarvanAmAni (1.1.27) */
if ($sarvafinal !==0)
{
    if (in_array($fo,$sarvanama)||in_array($fo,$sarvanamastri))
    {
		storedata('1.1.27','pa',0);
    }
    /* tadantasyApIyaM saJjJA | dvandve ca iti jJApakAt */
    if ( ends(array($fo),$sarvanama,0)||ends(array($fo),$sarvanamastri,0))
    {
		storedata('dvandvesarva','pa',0);
    }
}
if ($debug===1) {dibug("5200");}
/* defininig eranekAca */
if ($_GET['cond1_4'] === "1") // for conditions, please see ajax requirements.docx
{
    $nadi = 0;
    $eranekaca=0;
}
elseif ($_GET['cond1_4_2'] === "1")
{
    $eranekaca=0;
    $nadi=1;
    $GI=1;
}
elseif ($_GET['cond1_4_2'] === "2")
{
    $eranekaca=0;
    $nadi=1;
    $GI=0;
}
elseif ($_GET['cond1_4_3'] === "1")
{
    $eranekaca=1;
    $nadi=0;
    $nI=1;
    $dhatu=1;
}
elseif ($_GET['cond1_4_3'] === "2")
{
    $eranekaca=1;
    $nadi=0;
    $dhatu=1;
    // anaGNitva, uttvam extra.
}
elseif ($_GET['cond1_4_3'] === "3")
{
    $eranekaca=1;
    $nadi=0;
    $dhatu=1;
    // khyatyAtparasya extra.
}
elseif ($_GET['cond1_4_3'] === "4")
{
    $eranekaca=1;
    $nadi=0;
    $dhatu=1;
}
elseif ($_GET['cond1_4_4'] === "1")
{
    $eranekaca=1;
    $nadi=1;
    $GI=1;
    $dhatu=1;
}
elseif ($_GET['cond1_4_4'] === "2")
{
    $eranekaca=1;
    $nadi=1;
    $GI=0;
    $dhatu=1;
}
elseif ($_GET['cond1_4_5'] === "1")
{
    $eranekaca=0;
    $nadi=0;
    $nI=1;
    $dhatu=1;
}
elseif ($_GET['cond1_4_5'] === "2")
{
    $eranekaca=0;
    $nadi=0;
    $nI=0;
    $dhatu=1;
    $GI=0;
}
elseif ($_GET['cond1_4'] === "5")
{
    $eranekaca=0;
    $nadi=0;
    $dhatu=1;
    $GI=0;
}
elseif ($_GET['cond1_4'] === "6")
{
    $eranekaca=0;
    $nadi=1;
    $dhatu=1;
}

/* defining oH supi variable */
if ($_GET['cond1_5'] === "1")
{
    $nadi = 0;
    $eranekaca=0;
}
elseif ($_GET['cond1_5'] === "2")
{
    $eranekaca=0;
    $nadi=1;
}
elseif ($_GET['cond1_5'] === "3")
{
    $eranekaca=1;
    $dhatu=1;
}
elseif ($_GET['cond1_5'] === "4")
{
    $eranekaca=0;
    $dhatu=1;
}

/* GI definition */
if ($_GET['cond2_3']==="1")
{
    $GI=1;
    $nadi=1;
}
elseif ($_GET['cond2_3']==="2")
{
    $GI=0;
    $nadi=1;
}
elseif ($_GET['cond2_3']==="3")
{
    $GI=1;
    $eranekaca=0;
    $nadi=1;
}
elseif ($_GET['cond2_3']==="4")
{
    $GI=0;
    $eranekaca=0;
    //$nadi=1; // Not sure
    $dhatu=1; // for zrI.
}
if ($debug===1) {dibug("5300");}

/* makArAnta pulliGga dhAtu definition */
if (ends(array($fo),array("m"),1) && $_GET['cond1_16']==="1")
{
    $dhatu=1;
}
/* idam, idakam anvAdeza definition */
if ( $_GET['cond1_7']==="1" || $_GET['cond1_10_2']==="1" || $_GET['cond2_5']==="1" || $_GET['cond3_2']==="1" )
{
    $sarvafinal=1;
    $anvadesha=1;
}
/* nakArAnta pulliGga ShanvAat definition */ 
if ( $_GET['cond1_8']==="1")
{
    $samasa=1;
    $pradhana=0;
}
elseif ( $_GET['cond1_8']==="2")
{
    $samasa=1;
    $pradhana=1;
}
/* jakArAnta pulliGga kvin pratyaya definition */
if ( $_GET['cond1_9']==="1" && $_GET['cond1_9_1']==="1" )
{
    $dhatu=1;
    $kvin=1;
    $samasa=0;
    $yuj=1; // 0 - yujerasamAse (7.1.71) won't apply. 1 - yujerasamAse (7.1.71) will apply.
}
elseif ( $_GET['cond1_9']==="1" || $_GET['cond1_9_1']==="2" )
{
    $dhatu=1;
    $kvin=1;
    $samasa=0;
    $yuj=0;
}
else
{
    $yuj=0;
}
/* tyadAdi gauNatva definition */
if ( $_GET['cond1_10']==="1"  )
{
    $noatvasatva=1; // 0 - tyadAdi are upasarjanIbhUta / saJjJA. 1 - tyadAdi are not upasarjanIbhUta / saJjJA i.e. prAdhAnya.
}
else
{
    $noatvasatva=0;
}
/* asmad / yuSmad -> nau / naH etc definition */
if ($_GET['cond1_12']==="1" && in_array($w,array(3,4,5,9,10,11,15,16,17)) )
{
    $asmadpada=0; 
	storedata('apadAt','pa',0);
}
elseif($_GET['cond1_12']==="2" && in_array($w,array(3,4,5,9,10,11,15,16,17)) )
{
    $asmadpada=0;    
	storedata('pAdAdi','pa',0);
}
elseif($_GET['cond1_12']==="3" && in_array($w,array(3,4,5,9,10,11,15,16,17)))
{
    $asmadpada=0;    
	storedata('8.1.24','pa',0);
}
elseif($_GET['cond1_12']==="4" && in_array($w,array(3,4,5,9,10,11,15,16,17)))
{
    $asmadpada=0;    
	storedata('8.1.25','pa',0);
}
elseif($_GET['cond1_12_5_1_1_1_1']==="1" && in_array($w,array(3,4,5,9,10,11,15,16,17)))
{
    $asmadpada=2;    
	storedata('8.1.74','pa',0);
}
elseif($_GET['cond1_12_5_1_1_1_1']==="2" && in_array($w,array(3,4,5,9,10,11,15,16,17)))
{
    $asmadpada=1;    
	storedata('8.1.73','pa',0);
}
elseif($_GET['cond1_12_5_1_1_1']==="2" && in_array($w,array(3,4,5,9,10,11,15,16,17)))
{
    $asmadpada=0;    
	storedata('8.1.72','pa',0);
	storedata('2.3.48','pa',0);
}
elseif($_GET['cond1_12_5_1_1']==="2" && in_array($w,array(3,4,5,9,10,11,15,16,17)))
{
    $asmadpada=2;    
	storedata('8.1.26','pa',0);
}
elseif($_GET['cond1_12_5_1']==="2" && in_array($w,array(3,4,5,9,10,11,15,16,17)))
{
    $asmadpada=1;    
	storedata('8.1.26-1','pa',0);
}
elseif($_GET['cond1_12_5']==="2" && in_array($w,array(3,4,5,9,10,11,15,16,17)))
{
    $asmadpada=2;    
	storedata('8.1.26-1','pa',0);
}
/* defining goanc */
if (in_array($fo,array("goanc","goaYc")) )
{
    $kvin=1;
    $nance=1; 
    $goanc=1; // 0 - no goanc word. 1 - the word is goanc.
}
else
{
    $goanc=0;
}

/* defining Nyanta */
if ($_GET['cond1_15']==="1")
{
    $Nyanta=1; 
}
/* defining dhatus */
// This is the crude way in which dhAtu saJjJA is given without user interface. In practice it is difficult to decide whether the word ends with a dhAtu or not. So made enumeration.
if (sub(array("supis","sutus","suhiMs","gir","pur","sajuz","ASiz"),array("+"),blank(0),0))
{
    $dhatu=1;
}
/* defining kvip */
// It is difficult to know whether kvip pratyay has happened or not, because it is elided completely. so manually enumerated the instances where SK uses kvip pratyayAnta words.
if (sub(array("DvaMs","sraMs"),blank(0),blank(0),0))
{
    $kvip=1;
    $dhatu=1;
}
if (sub(array("beBid","cecCid","pipaWiz"),blank(0),blank(0),0))
{
    $kvip=1;
}
if ($debug===1) {dibug("5500");}
/* Defining ugit */
if ( sub(array("DvaMs","sraMs"),array("+"),blank(0),0) )
{
    $text = two(array("DvaMs","sraMs"),array("+"),array("DvaMsu!","sraMsu!"),array("+"),0);
	storedata('DvaMs','pa',0);
}
/* strIliGga definitions */
/* defining Abantatva */
if (ends(array($fo),array("A"),1) && $gender==="f" && $_GET['cond2_1']==="1")
{
    $Ap=0;
    $dhatu=1;
}
elseif (ends(array($fo),array("A"),1) && $gender==="f")
{
    $Ap=1;
}
else
{
     $Ap=0;
}
     
/* nityastrIliGga definition */
$strilist = array("strI","SrI"); // list of nityastrIliGga words. Add other words to make it exhaustive.
if (ends(array($fo),$strilist,1))
{
    $nityastri=1;
}

/* praDI definition */
if ($_GET['cond2_3_5']==='1')
{
    $dhatu=1;
    $eranekaca=2;
    $GI=0;
    $nadi=2;
	storedata('praDI','pa',0);
}
if ($_GET['cond2_3_5']==='2')
{
    $dhatu=1;
    $eranekaca=1; 
}
/* sulU definition */
if (in_array($fo,array("sulU")) && $gender==="n")
{
    $dhatu=1;
    $eranekaca=1;
}
/* suDI definition */
if ($_GET['cond2_3_6']==='1')
{
    $dhatu=1;
    $GI=0;
    $nityastri=1;
	storedata('suDI','pa',0);
}
if ($_GET['cond2_3_5']==='2')
{
    $dhatu=1;
    $GI=0;
    $nityastri=1;
	storedata('suDI1','pa',0);
}

/* UkArAnta strIliGga - defining */
if ($_GET['cond2_4']==='1')
{
    $nityastri=1;
}
elseif ($_GET['cond2_4']==='2')
{
    $dhatu=1;
    $eranekaca=0;
    $nityastri=1;
}
elseif ($_GET['cond2_4']==='3')
{
    $dhatu=1;
    $eranekaca=1;
    $nityastri=0;
}
if ($debug===1) {dibug("5600");}

if ($gender==="f" && ends(array($fo),array("varzABU","svayamBU"),1))
{
    $dhatu=1;
}
/* punarBU definition */
if ($_GET['cond2_4_4_1']==='1')
{

}
elseif ($_GET['cond2_4_4_1']==='2')
{
    $dhatu=1;
    $eranekaca=0;
}
/* bhASitapuMska definition */
if ($_GET['cond3']==='1')
{
    $bhashitapumska=1;
}
/* tRtIyAdiSu bhASitapuMskaM puMvadgAlavasya (7.1.74) */
if ($bhashitapumska===1 && in_array($so,$tRtIyAdiSvaci) ) // see function.php for $tRtIyAdiSvaci.
{
	storedata('7.1.74','sa',0);
}


/* defining kRt pratyayas */
/* kRdatiG (3.1.93) */
if ($pada === "pratyaya" && !in_array($so,$tiG) && $dhatu===1)
{
	storedata('3.1.93','pa',0);
}
/* Defining pada and bham */
/* suDanapuMsakasya (1.1.43) */ 
if ($gender !== "n" && in_array($so,$sarvanamasthana))
{
	storedata('1.1.43','pa',0);
}
/* bahuguNavatuDati saGkhyA (1.1.28) */
/* Dati ca (1.1.25) */
if (in_array($fo,array("bahu","guRa")))
{
    $sankhya = 1; // 0 - no saGkhyA saJjJA. 1 - saGkhyA saJjJA.
	storedata('1.1.28','pa',0);
}
else 
{
    $sankhya = 0;
}
if (in_array($fo,array("kati")))
{
    $sankhya = 1;
    $shat = 1; // 0 - no SaT saJjJA. 1 - SaT saJjJA.
	storedata('1.1.25','pa',0);
}
else 
{
    $sankhya = 0;
    $shat = 0;
}
/* SNAntA Sat (1.1.24) */
if (arr($text,'/[zn][+]/') && ($sankhya===1 || ends(array($fo),array("paYcan","zaz","saptan","zwan","navan","daSan"),1)) && ($samasa===0 || $samasa===1 && $pradhana===1) && $_GET['cond1_18']!=="2")
{
    $shat = 1;
	storedata('1.1.24','sa',0);
}
/* defining "SaT" */
if ($_GET['cond1_18']===2)
{
    $shat=0;
}
/* same in all lingas - special messages */
$samaliGga = array("asmad","asmat","yuzmad","yuzmat"); // list of words which are same in all three genders.
if (in_array($fo,$samaliGga) || $shat===1)
{
	// Pending to refactor
	/*
    echo "<p class = pa >asmad, yuSmad and words having SaT saJjJA have same forms in all three genders.</p>\n";
    echo "<p class = pa >अस्मद्युष्मद्‍षट्सञ्ज्ञकाः त्रिषु सरूपाः ।</p>\n";
    display(0);*/
}
/* checking for presence of aJcu verb. */
if (sub(array("aYc","AYc","anc","Anc"),blank(0),blank(0),0))
{
    $ancu=1;
}
else
{
    $ancu=0;
}
/* zatRvat finder */
if(sub(array("pfzad","bfhat","mahat","jagat",),blank(0),blank(0),0) || $_GET['cond1_14']==="2" )
{
    $shatR = 1;
    $it = array_merge($it,array("S","f")); // adding two it markers 'z' and 'R', because zatR pratyaya has z and R as it marker. Similarly for next cases also.
    $itprakriti = array_merge($itprakriti,array("S","f"));
}
elseif ($_GET['cond3_3']==="1" )
{
    $shatR = 1;
    $it = array_merge($it,array("S","f"));
    $itprakriti = array_merge($itprakriti,array("S","f"));
    $abhyasta=1;
}
elseif ($_GET['cond3_3_2_1']==="2")
{
    $shatR = 1; $dhatu=1;
    $it = array_merge($it,array("S","f"));
    $itprakriti = array_merge($itprakriti,array("S","f"));
    $AcCInadyo = 1;
}
elseif ($_GET['cond3_3_2_1']==="1")
{
    $shatR = 1; $dhatu=1;
    $it = array_merge($it,array("S","f"));
    $itprakriti = array_merge($itprakriti,array("S","f"));
    $shap = 1;
    $shyan = 1;
}
if ($debug===1) {dibug("5700");}


/* atvanta finder */
if ($_GET['cond1_17']==="1" || $_GET['cond1_14']==="1" ) // atvanta and ugit.
{
    $atu = 1;
    $it = array_merge($it,array("u"));        
    $itprakriti = array_merge($itprakriti,array("u"));
}
elseif( in_array($fo,array("veDas",)) ) // This is atvanta, but not ugit.
{
    $atu=1;
}
elseif( in_array($fo,array("suvas","gras","glas")))
{
    $dhatu=1;
    $atu=1;
}
else
{
    $atu=0;
}
/* ugitazca (4.1.6) */
$ugitverbwords=array("Bavat","pacat","kurvat");
$ugitprAtipadika = array("praanc","praaYc","prAnc","prAYc","pratianc","pratiaYc","pratyanc","pratyaYc","udanc","udaYc",);
if (sub(array("Bavat"),array("+"),blank(0),0))
{
    $it=array_merge($it,array("u"));
    $itprakriti = array_merge($itpratyaya,array("u"));
}
if (sub(array("pacat"),array("+"),blank(0),0))
{
    $it=array_merge($it,array("f"));
    $itprakriti = array_merge($itpratyaya,array("f"));
    $shap = 1;
    $shatR = 1;
    $dhatu = 1;
} 
if (arr($text,'/[nY]c/') && sub(array("praanc","praaYc","prAnc","prAYc","pratianc","pratiaYc","pratyanc","pratyaYc","udanc","udaYc",),array("+"),blank(0),0))
{
    $it=array_merge($it,array("u"));
    $itprakriti = array_merge($itpratyaya,array("u"));
    //$dhatu = 1;
} 

$TAp=0; $DAp=0; $cAp=0; $GIn=0; $GIp=0; $GIS=0; $ajAdyataSTAp=0; $bahuvrihauva=0;// Setting everything to 0 because it is not relevant to tiGanta.
if ($gender === "f" && ( sub($ugitprAtipadika,array("+"),blank(count($ugitprAtipadika)),0) || sub($ugitverbwords,array("+"),blank(0),0)) )
{
    $text = one(array("+"),array("+NIp+"),0);
	storedata('4.1.6','st',0);
    $GIp=1;
}
if ($gender==="f" && arr($text,'/aMsu/') && sub(array("DvaMsu!","sraMsu!"),array("+"),blank(0),0))
{
	storedata('7.1.70-1','pa',0);
}
/* antarvatpativatornuk (4.1.32) */
if ($gender === "f" && arr($text,'/vat\+/') && sub(array("antarvat","pativat"),array("+"),blank(0),0) )
{
    $text = two(array("antarvat","pativat"),array("+"),array("antarvatn","pativatn"),array("+"),0);
	storedata('4.1.32','st',8);
}
/* patyurno yajJAsaMyoge (4.1.33) */
elseif ($gender === "f" && $fo==="pati" )
{
    $text = two(array("pati"),array("+"),array("patn"),array("+"),0);
	storedata('4.1.33','st',8);
}
/* nityaM sapatnyAdiSu (4.1.35) */
elseif ($gender === "f" && $fo!=="pati" && sub(array("samAnapati","ekapati","vIrapati","piRqapati","BrAtfpati","putrapati","dAsapati"),array("+"),blank(0),0) )
{
    $text = two(array("samAnapati","ekapati","vIrapati","piRqapati","BrAtfpati","putrapati","dAsapati"),array("+"),array("sapatn","ekapatn","vIrapatn","piRqapatn","BrAtfpatn","putrapatn","dAsapatn"),array("+"),0);
	storedata('4.1.35','st',8);
}
/* vibhASA sapUrvasya (4.1.34) */
elseif ($gender === "f" && $fo!=="pati" && sub(array("pati"),array("+"),blank(0),0) )
{
    $text = two(array("pati"),array("+"),array("patn"),array("+"),1);
	storedata('4.1.34','sa',0);
}
if ($debug===1) {dibug("5800");}
/* Udhaso'naG (5.4.131) */
if ($gender==="f" && arr($text,'/[Uo]Das\+/') && $_GET['cond2_17']==="1")
{
    $text = two(array("UDas","oDas"),array("+"),array("UDan","oDan"),array("+"),0); // for function two - please see function.php.
	storedata('5.4.131','sa',0);
    /* saGkhyAvyayAderGIp (4.1.26) */
    if ($gender==="f" && arr($text,'/[uo]Dan\+/') && $_GET['cond2_17_1']==="1")
    {
        $text = two(array("UDan","oDan"),array("+"),array("UDan","oDan"),array("+NIp+"),0); 
		storedata('4.1.26','st',0);
        $GIp=1;
        $it = array_merge($it,array("N","p"));
        $itprakriti = array_merge($itprakriti,array("N","p"));
        $text = one(array("an+"),array("n+"),0);
		storedata('6.4.135','sa',6);
        $allopo=1; // 0 - allopa has not happened. 1 - allopa has happened.
    }
    /* bahuvrIherUdhaso NIz (4.1.25) */
    if ($gender==="f" && arr($text,'/[uo]Dan\+/')  && $_GET['cond2_17_1']==="2")
    {
        $text = two(array("UDan","oDan"),array("+"),array("UDan","oDan"),array("+NIz+"),0); 
		storedata('4.1.25','st',8);
        $GIS=1;
        $it = array_merge($it,array("N","z"));
        $itprakriti = array_merge($itprakriti,array("N","z"));
        $text = one(array("an+"),array("n+"),0);
		storedata('6.4.134','sa',6);
        $allopo=1; // 0 - allopa has not happened. 1 - allopa has happened.
    }
}
/* striyAm (vA 3367) */
elseif ($gender!=="f" && arr($text,'/[uo]Dan\+/') )
{
	storedata('5.4.131-1','sa',0);
}
/* ajAdyataSTAp (4.1.4) with explanation for inclusion in ajAdi gaNa */
// should we consider changing sub function to check exact word? Does this rule hold good in bahuvrIhi or not ?
//elseif ( (sub($ajAdi,array("+"),blank(0),0) || $ajAdyataSTAp===1) && $kevala!==1) 
elseif ( (in_array($fo,$ajAdi) || $ajAdyataSTAp===1) && $kevala!==1) 
{
	storedata('4.1.4','sa',0);
	// pending to refactor because these are explanations.
/* displaying various sub part of ajAdi gaNa and relevant explanation for introduction of word in ajAdi gaNa */
/*    if( sub(array("aja","eqaka","aSva","cawaka","mUzika"),array("+"),blank(0),0))    
    {
    echo "<p class = hn >jAtilakSaNa GIS pratyaya is barred by this sUtra. </p>\n";
    echo "<p class = hn >जातिलक्षण ङीष्‌ प्रत्यय का बाध करने के लिए अजादि गण में इनका समावेश किया गया है ।</p>\n";
    }
    if( sub(array("triPala","tryanIka"),array("+"),blank(0),0) && $_GET['cond2_15']==="1")
    {
    echo "<p class = hn >This sUtra prevents application of NIp pratyaya by 'dvigoH'.</p>\n";
    echo "<p class = hn >'द्विगोः' से प्राप्त ङीप्‌ प्रत्यय का बाध करने के लिए अजादि गण में इनका समावेश किया गया है ।</p>\n";
    }
    if( sub(array("bAla","vatsa","hoQa","manda","bilAta","kanya"),array("+"),blank(0),0))
    {
    echo "<p class = hn >These have been enumerated in ajAdi gaNa to bar application of GIp pratyaya by 'vayasi prathame'.</p>\n";
    echo "<p class = hn >'वयसि प्रथमे' से प्राप्त ङीप्‌ प्रत्यय का बाध करने के लिए अजादि गण में इनका समावेश किया गया है ।</p>\n";        
    }    
    if( sub(array("kruYc","uzRih","devaviS","diS","dfS","kzuD","vAc","gir",),array("+"),blank(0),0))
    {
    echo "<p class = hn >These are not ending with akAra. Therefore included in ajAdi class for TAp pratyaya.</p>\n";
    echo "<p class = hn >अदन्तत्व नहीं होने के कारण टाप्‌ प्रत्यय के लिए समर्थ बनाने के लिए अजादि गण में इनका समावेश किया गया है ।</p>\n";        
    }    
    if( sub(array("jyezWa","kanizWa","maDyama"),array("+"),blank(0),0))
    {
    echo "<p class = hn >Even in puMyoga, this word takes TAp pratyaya.</p>\n";
    echo "<p class = hn >पुंयोग में भी टाप्‌ प्रत्यय के लिए समर्थ बनाने के लिए अजादि गण में इनका समावेश किया गया है ।</p>\n";        
    }    
    if( sub(array("kokila"),array("+"),blank(0),0))
    {
    echo "<p class = hn >Even in jAti, this word takes TAp pratyaya.</p>\n";
    echo "<p class = hn >जाति में भी टाप्‌ प्रत्यय के लिए समर्थ बनाने के लिए अजादि गण में इनका समावेश किया गया है ।</p>\n";        
    }    
  */
    $text = last(array($so),array("+wAp+".$so),0);
    $TAp = 1;
}

/* na SaTsvasrAdibhyaH (4.1.10) */
// bracketed because deals with strIpratyayas.
elseif ($shat===1 || in_array($fo,$svasrAdi))
{
	storedata('4.1.10','st',0);
	$Ap = 0; $GI = 0; $SaTsvasrAdi=1;
} 
/* striyAM ca (7.1.96) */
elseif ($gender === "f" && sub(array("krozwu"),array("+"),blank(0),0))
{
    $text = two(array("krozwu"),array("+"),array("krozwf"),array("+"),0); // for function two - please see function.php.
	storedata('7.1.96','sa',3);
}
/* pUtakratorai ca (4.1.36) */
elseif ($gender === "f" && $fo==="pUtakratu" && $_GET['cond2_22']==="1")
{
    $text = two(array("pUtakratu"),array("+"),array("pUtakratE"),array("+NIp+"),0);
	storedata('4.1.36','st',8);
    $GIp=1;
}
/* vRSAkapyagnikusitakusidAnAmudAttaH (4.1.37) */
elseif ($gender === "f" && in_array($fo,array("vfzAkapi","agni","kusita","kusida")) && $_GET['cond2_22']==="1")
{
    $text = two(array("vfzAkapi","agni","kusita","kusida"),array("+"),array("vfzAkapE","agnE","kusitE","kusidE"),array("+NIp+"),0);
	storedata('4.1.37','st',8);
    $GIp=1;
}
/* mano rau vA (4.1.38) */
elseif ($gender === "f" &&  $fo==="manu" && $_GET['cond2_22']==="1")
{
    $text = two(array("manu"),array("+"),array("manO"),array("+NIp+"),1);
    $text = two(array("manu"),array("+"),array("manE"),array("+NIp+"),1);
	storedata('4.1.38','st',8);
    $GIp=1;
}
/* iyaM trisUtrI puMyoga eveSyate (vA 2449) */
elseif ($gender === "f" && in_array($fo,array("pUtakratu","vfzAkapi","agni","kusita","kusida","manu")) && $_GET['cond2_22']!=="1")
{
	storedata('4.1.36-1','pa',8);
}
/* varNAdanudAttAttopadhAtto naH (4.1.39) */
elseif ($gender === "f" && in_array($fo,array("eta","rohita",)) )
{
    $text = two(array("eta","rohita",),array("+"),array("ena","rohiRa",),array("+NIp+"),1);
	storedata('4.1.39','st',8);
    $GIp=1;
}
/* pizaGgAdupasaGkhyAnam (vA 2455) */
elseif ($gender === "f" && in_array($fo,array("piSaNga")) )
{
    $text = two(array("piSaNga",),array("+"),array("piSaNga",),array("+NIp+"),1);
	storedata('4.1.39-3','st',8);
    $GIp=1;
}
/* asitapalitayorna (vA 2453) and Candasi knameke (vA 2454) */
elseif ($gender === "f" && in_array($fo,array("asita","palita")) )
{
    $text = two(array("asita","palita"),array("+"),array("asikna","palikna"),array("+NIp+"),1);
	storedata('4.1.39-1','st',8);
	storedata('4.1.39-3','st',8);
    $GIp=1;
}
/* anyato GIS (4.1.40) */
elseif ($gender === "f" && in_array($fo,array("kalmAza","sAraNga")) )
{
    $text = two(array("kalmAza","sAraNga"),array("+"),array("kalmAza","sAraNga"),array("+NIz+"),0);
	storedata('4.1.40','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* jAnapadakuNDagoNasthalabhAjanAgakAlanIlakuzakAmukakabarAdvRttyamatrAvapanAkRtrimAzrANAsthaulyavarNAcCAdanAyovikAramaithunecCAkezavezeSu (4.1.42) */
elseif ($gender === "f" && sub(array("jAnapada","kuRqa","goRa","sTala","BAja","nAga","kAla","nIla","kuSa","kAmuka","kabara",),array("+"),blank(0),0) )
{
    $text = two(array("jAnapada","kuRqa","goRa","sTala","BAja","nAga","kAla","nIla","kuSa","kAmuka","kabara",),array("+"),array("jAnapada","kuRqa","goRa","sTala","BAja","nAga","kAla","nIla","kuSa","kAmuka","kabara",),array("+NIz+"),1);
	storedata('4.1.42','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* nIlAdauSadhau (vA 2456) and prANini ca (vA 2458) */
elseif ($gender === "f" && arr($text,'/nIla\+NIz/'))
{
	storedata('4.1.42-1','st',8);
	storedata('4.1.42-2','st',8);
}
/* zoNAtprAcAm (4.1.43) */
elseif ($gender === "f" && arr($text,'/SoRa\+/'))
{
    $text = two(array("SoRa"),array("+"),array("SoRa"),array("+NIz+"),1);
	storedata('4.1.43','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* sakhyazizvIti bhASAyAm (4.1.62) */
elseif ($gender === "f" && in_array($fo,array("saKi","aSiSu")) )
{
    $text = one(array("+"),array("+NIz+"),0);
	storedata('4.1.62','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* ito manuSyajAteH (4.1.65) */
elseif ($gender === "f" && arr($text,'/i\+/') && AdivRddhi($text) )
{
    $text = two($itmanuSyajAti,array("+"),$itmanuSyajAti,array("+NIz+"),0);
    $text = two($itmanuSyajAti,array("+NIz+NIz+"),$itmanuSyajAti,array("+NIz+"),0);
	storedata('4.1.65','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* bahvAdibhyazca (4.1.45), kRdikArAdaktinaH (ga 50) and sarvato'ktinnarthAdityeke (ga 51) */
elseif ($gender === "f" && $_GET['cond2_21']==="2" && !arr($text,'/patn\+/'))
{
    $text = two(array("i"),array("+"),array("i"),array("+NIz+"),1);
	storedata('kfdakAr','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* bahvAdibhyazca (4.1.45), kRdikArAdaktinaH (ga 50) and sarvato'ktinnarthAdityeke (ga 51) */
elseif ($gender === "f" && $_GET['cond2_21']==="2" && sub(array("Sakawi","aSani","AtmamBari"),array("+"),blank(0),0) )
{
    $text = two(array("i"),array("+"),array("i"),array("+NIz+"),1);
	storedata('sarvato','st',8);	
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* bahvAdibhyazca (4.1.45) */
elseif ($gender === "f" && sub($bahvAdi,array("+"),blank(0),0) )
{
    $text = two($bahvAdi,array("+"),$bahvAdi,array("+NIz+"),1);
	storedata('4.1.45','st',8);	
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* pAlakAntAnna (vA 2461) */
elseif ($gender === "f" && $_GET['cond2_22']==="1" && sub(array("pAlaka"),array("+"),blank(0),0) )
{
	// pending to refactor
/*    echo "<p class = sa >By pAlakAntAnna (vA 2461) :</p>\n";
    echo "<p class = sa >पालकान्तान्न (वा २४६१) :</p>\n";        
    display(0);*/
}
/* paGgozca (4.1.67) */
elseif ($gender === "f" && sub(array("paNgu"),array("+"),blank(0),0) )
{
    $text = two(array("paNgu"),array("+"),array("paNgU"),array("+"),0);
	storedata('4.1.67','st',8);	
    $ajAdyataSTAp=0;
}
/* aprANijAtezcArajjvAdInAmupasaGkhyAnam (vA 2502) */
elseif ($gender === "f" && sub(array("alAbU","karkanDU"),array("+"),blank(0),0) && !sub(array("yu"),array("+"),blank(0),0) && $_GET['cond2_22']==="2")
{
	storedata('4.1.66-1','st',8);	
    $ajAdyataSTAp=0;
}
/* saJjJAyAm (4.1.72) */
elseif ($gender === "f" && sub(array("kadru","kamaRqalu"),array("+"),blank(0),0) )
{
    $text = two(array("kadru","kamaRqalu"),array("+"),array("kadrU","kamaRqalU"),array("+"),1);
	storedata('4.1.72','st',8);	
    $ajAdyataSTAp=0;
}
/* kharusaMyogopadhAnna (vA 2460) */
elseif ($gender == "f" && (sub(array("Karu"),array("+"),blank(0),0) || sub($hl,$hl,array("u+"),0) ) )
{
	storedata('4.1.44-2','st',8);	
}
/* voto guNavacanAt (4.1.44) */
elseif ($gender === "f" && $_GET['cond2_20']==="1" )
{
    $text = two(array("u"),array("+"),array("u"),array("+NIz+"),1);
	storedata('4.1.44','st',8);	
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* sUryAddevatAyAM cAbvAcyaH (vA 2471) */
elseif ($gender === "f" && $_GET['cond2_22_1_1']==="1" )
{
    $text = one(array("sUrya+"),array("sUrya+cAp+"),0);
	// pending to refactor.
/*    echo "<p class = st >By sUryAddevatAyAM cAbvAcyaH (vA 2471) :</p>\n";
    echo "<p class = st >सूर्याद्देवतायां चाब्वाच्यः (वा २४७१) :</p>\n";        
    display(8);*/
    $cAp=1;
    $ajAdyataSTAp=0;
}
/* mAtulopAdDyAyayorAnugvA (vA) and yA tu svayamevAddhyApikA tatra vA NIz vAcyaH (vA) */
elseif ($gender === "f" && sub(array("mAtula",),array("+"),blank(0),0) )
{
    $text = two(array("mAtula",),array("+"),array("mAtulAn",),array("+NIz+"),1);
    $text = two(array("mAtula",),array("+"),array("mAtula",),array("+NIz+"),0);
	storedata('4.1.49','st',8);	
	storedata('4.1.49-4','sa',0);	
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* mAtulopAdDyAyayorAnugvA (vA) and yA tu svayamevAddhyApikA tatra vA NIz vAcyaH (vA) */
elseif ($gender === "f" && sub(array("upAdDyAya","upADyAya"),array("+"),blank(0),0) )
{
    $text = two(array("upAdDyAya","upADyAya"),array("+"),array("upAdDyAyAn","upADyAyAn"),array("+NIz+"),1);
    $text = two(array("upAdDyAya","upADyAya"),array("+"),array("upAdDyAya","upADyAya"),array("+NIz+"),0);
    $text = two(array("upAdDyAya","upADyAya"),array("+NIz+"),array("upAdDyAya","upADyAya"),array("+"),1);
	storedata('4.1.49','st',8);	
	storedata('4.1.49-4','sa',0);
	// pending to refactor the second vArtika.
/*    echo "<p class = pa >By mAtulopAdDyAyayorAnugvA (vA) and yA tu svayamevAddhyApikA tatra vA NIz vAcyaH (vA) :</p>\n";
     echo "<p class = pa >मातुलोपाद्ध्याययोरानुग्वा (वा) और या तु स्वयमेवाद्ध्यापिका तत्र वा ङीष्‌ वाच्यः (वा) :</p>\n";        
    display(8); */
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* aryakSatriyAbhyAM vA (vA 2478) */
elseif ($gender === "f" && sub(array("arya","kzatriya"),array("+"),blank(0),0) && $_GET['cond2_22']!=="1" )
{
    $text = two(array("arya","kzatriya"),array("+"),array("aryAn","kzatriyAn"),array("+NIz+"),1);
	storedata('4.1.49-7','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* indravaruNabhavazarvarudramRDahimAraNyayavayavanamAtulAcAryANAmAnuk (4.1.41) */
elseif ($gender === "f" && sub(array("indra","varuRa","Bava","Sarva","rudra","mfqa","mAtula","AcArya"),array("+"),blank(0),0) && $_GET['cond2_22']==="1")
{
    $text = two(array("indra","varuRa","Bava","Sarva","rudra","mfqa","mAtula","AcArya"),array("+"),array("indrAn","varuRAn","BavAn","SarvAn","rudrAn","mfqAn","mAtulAn","AcAryAn"),array("+NIz+"),0);
	storedata('4.1.41','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* himAraNyayormahattve (vA 2472) */
elseif ($gender === "f" && sub(array("hima","araRya",),array("+"),blank(0),0) )
{
    $text = two(array("hima","araRya",),array("+"),array("himAn","araRyAn",),array("+NIz+"),1);
	storedata('4.1.49-1','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* yavAddoSe (vA 2473) */
elseif ($gender === "f" && sub(array("yava",),array("+"),blank(0),0) )
{
    $text = two(array("yava",),array("+"),array("yavAn",),array("+NIz+"),1);
	storedata('4.1.49-2','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* yavanAllipyAm (vA 2474) */
elseif ($gender === "f" && sub(array("yavana",),array("+"),blank(0),0) )
{
    $text = two(array("yavana",),array("+"),array("yavanAn",),array("+NIz+"),1);
	storedata('4.1.49-3','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* zvazurasyokArAkAralopazca (vA 5039) */
elseif ($gender === "f" && sub(array("SvaSura"),array("+"),blank(0),0) )
{
    $text = two(array("SvaSura"),array("+"),array("SvaSrU"),array("+"),0);
	// pending to refactor because unable to locate vArtika.
/*    echo "<p class = st >By zvazurasyokArAkAralopazca (vA 5039) :</p>\n";
    echo "<p class = st >श्वशुरस्योकाराकारलोपश्च (वा ५०३९) :</p>\n";        
    display(8);*/
    $ajAdyataSTAp=0;
}
/* urUttarapadAdaupamye (4.1.69) */
elseif ($gender === "f" && sub(array("karaBoru"),array("+"),blank(0),0) )
{
    $text = two(array("karaBoru"),array("+"),array("karaBorU"),array("+"),0);
	storedata('4.1.69','st',8);
    $ajAdyataSTAp=0;
}
/* saMhitazaphalakSaNavAmAdezca (4.1.70) */
elseif ($gender === "f" && sub(array("saMhitoru","SaPoru","lakzaRoru","vAmoru"),array("+"),blank(0),0) )
{
    $text = two(array("saMhitoru","SaPoru","lakzaRoru","vAmoru"),array("+"),array("saMhitorU","SaPorU","lakzaRorU","vAmorU"),array("+"),0);
	storedata('4.1.70','st',8);
    $ajAdyataSTAp=0;
}
/* sahitasahAbhyAM ceti vaktavyam (vA 2503) */
elseif ($gender === "f" && sub(array("sahitoru","sahoru",),array("+"),blank(0),0) )
{
    $text = two(array("sahitoru","sahoru",),array("+"),array("sahitorU","sahorU",),array("+"),0);
	// pending to refactor because unable to attend.
/*    echo "<p class = st >By sahitasahAbhyAM ceti vaktavyam (vA 2503) :</p>\n";
    echo "<p class = st >सहितसहाभ्यां एति वक्तव्यम्‌ (वा २५०३) :</p>\n";        
    display(8);*/
    $ajAdyataSTAp=0;
}
/* puMyogAdAkhyAyAm (4.1.48) */
elseif ($gender === "f" && ($_GET['cond2_22']==="1" || sub(array("mahASUdra"),array("+"),blank(0),0) ))
{
    $text = one(array("+"),array("+NIz+"),0);
	storedata('4.1.48','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* kvacinna (vA) */
elseif ($gender === "f" && sub(array("DanakrIta"),array("+"),blank(0),0) )
{
	// pending to refactor because unable to attend
/*    echo "<p class = st >By kvacinna (vA) :</p>\n";
    echo "<p class = st >क्वचिन्न (वा) :</p>\n";        
    display(8);*/
}
/* krItAtkaraNapUrvAt (4.1.50) */
elseif ($gender === "f" && sub(array("akrIta"),array("+"),blank(0),0) )
{
    $text = one(array("+"),array("+NIz+"),0);
	storedata('4.1.50','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* ktAdalpAkhyAyAm (4.1.51) */
elseif ($gender === "f" && $_GET['cond2_23_1']==="1" )
{
    $text = one(array("+"),array("+NIz+"),0);
	storedata('4.1.51','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* jAtipUrvAditi vaktavyam (vA 2484) */
elseif ($gender === "f" && $_GET['cond2_23_1_2']==="1" && ends(array($fo),$bahvAdi,3))
{
	storedata('4.1.52-6','st',8);
}
/* jAtAntAnna (vA 2479) */
elseif ($gender === "f" && $_GET['cond2_23_1_2']==="1" && sub(array("jAta"),array("+"),blank(0),0))
{
	// pending to refactor
/*    echo "<p class = st >By jAtAntAnna (vA 2479) :</p>\n";
    echo "<p class = st >जातान्तान्न (वा २४७९) :</p>\n";        
    display(8);*/
}
/* pANigRhitI bhAryAyAm (vA 2480) */
elseif ($gender === "f" && $_GET['cond2_23_1_2']==="1" && sub(array("pARigfhita"),array("+"),blank(0),0))
{
    $text = one(array("+"),array("+NIz+"),1);
	storedata('4.1.52-2','st',8);
    $GIS=1;
    $ajAdyataSTAp=1;
}
/* asvAGgapUrvapadAdvA (4.1.53) */
elseif ($gender === "f" && $_GET['cond2_23_1_2']==="1" && !ends(array($fo),$svAGga,3))
{
    $text = one(array("+"),array("+NIz+"),1);
	storedata('4.1.53','st',8);
    $GIS=1;
}
/* bahuvrIhezcAntodAttAt (4.1.52) */
elseif ($gender === "f" && $_GET['cond2_23_1_2']==="1" )
{
    $text = one(array("+"),array("+NIz+"),0);
	storedata('4.1.52','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* kabaramaNiviSazarebhyo nityam (vA 2490) */
elseif ($gender === "f" && ends(array($fo),array("kabarapucCa","maRipucCa","vizapucCa","SarapucCa"),1))
{
    $text = one(array("+"),array("+NIz+"),0);
	storedata('4.1.55-2','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* upamAnAtpakSAcca pucCAcca (vA 2491) */
elseif ($gender === "f" && ends(array($fo),array("ulUkapucCa","ulUkapakza",),1))
{
    $text = one(array("+"),array("+NIz+"),0);
	storedata('4.1.55-3','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* pucCAcca (vA 2489) */
elseif ($gender === "f" && ends(array($fo),array("pucCa"),0))
{
    $text = one(array("+"),array("+NIz+"),1);
	storedata('4.1.55-1','st',8);
    $GIS=1;
}
/* vArtikas to ajAdyataSTAp */
/* sambhastrAjinaSaNapiNDebhyaH phalAt (vA 2497) */
elseif(arr($text,'/Pala/') && sub(array("samPala","BastraPala","ajinaPala","SaRaPala","piRqaPala"),array("+"),blank(0),0))
{
    $text = one(array("+"),array("+wAp+"),0);
	storedata('4.1.64-2','st',8);
	$ajAdyataSTAp = 1;
    $TAp=1;
}
/* sadackARqaprAntaSataikebhyaH puSpAt (vA 1496) */
elseif( arr($text,'/puzpa/') && sub(array("satpuzpa","prAkpuzpa","pratyakpuzpa","kARqapuzpa","prAntapuzpa","Satapuzpa","ekapuzpa"),array("+"),blank(0),0))
{
    $text = one(array("+"),array("+wAp+"),0);
	storedata('4.1.64-1','st',0);
	$ajAdyataSTAp = 1;
    $TAp=1;
}
/* zUdrA cAmahatpUrvA jAtiH (vA 2400-2401) */
elseif ($_GET['cond2_22']==="2" && sub(array("SUdra"),array("+"),blank(0),0) && !sub(array("mahASUdra","mahacCUdra"),array("+"),blank(0),0))
{
    $text = one(array("+"),array("+wAp+"),0);
	storedata('4.1.4-1','st',0);
	$ajAdyataSTAp = 1;    
    $TAp=1;
}
/* sadackARqaprAntaSataikebhyaH puSpAt (vA 1496) */
elseif(arr($text,'/puzpa/') && sub(array("satpuzpa","prAkpuzpa","pratyakpuzpa","kARqapuzpa","prAntapuzpa","Satapuzpa","ekapuzpa"),array("+"),blank(0),0))
{
    $text = one(array("+"),array("+wAp+"),0);
	storedata('4.1.64-1','st',0);
	$ajAdyataSTAp = 1;
    $TAp=1;
}
/* mUlAnnaJaH (vA 2500) */
elseif(arr($text,'/amUla\+/') && $fo==="amUla")
{
    $text = one(array("+"),array("+wAp+"),0);
	storedata('4.1.64-4','st',0);
	$ajAdyataSTAp = 1;
    $TAp=1;
}
/* pAkakarNaparNapuSpaphalamUlavAlottarapadAcca (4.1.64) */
elseif ($gender === "f" && ends(array($fo),array("pAka","karRa","parRa","puzpa","Pala","mUla","vAla"),0))
{
    $text = one(array("+"),array("+NIz+"),0);
	storedata('4.1.64','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* nAsikodaroSThajaGghAdantakarNazRGgAcca (4.1.55) */
elseif ($gender === "f" && ends(array($fo),array("nAsika","nAsikA","udara","ozWa","jaNGa","jaNGA","danta","karRa","SfNga","odara","OzWa"),0))
{
    $text = one(array("+"),array("+NIz+"),1);
	storedata('4.1.55','st',8);
    $GIS=1;
}
/* na kroDAdibahvacaH (4.1.56) */
elseif ($gender === "f" && ends(array($fo),$kroDAdi,1))
{
	storedata('4.1.56','st',8);
}
/* na kroDAdibahvacaH (4.1.56) */
elseif ($gender === "f" && ends(array($fo),$bahvacasvAGga,0))
{
	storedata('4.1.56','st',8);
}
/* nakhamukhAtsaJjJAyAm (4.1.58) */
elseif ($gender === "f" && $_GET['cond2_24']==="1")
{
	storedata('4.1.58','st',8);
}
/* vAhaH (4.1.61) */
elseif ($gender === "f" && sub(array("vAh"),array("+"),blank(0),0) )
{
    $text = one(array("+"),array("+NIz+"),0);
	storedata('4.1.61','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* sahanaJvidyamAnapUrvAcca (4.1.57) */
elseif ($gender === "f" && sub(array("saha","sa","a","an","vidyamAna"),$svAGga,array("+"),0) && arr($text,'/^[sanv]/'))
{
	storedata('4.1.57','st',8);
}
/* dikpUrvapadAnGIp (4.1.60) */
elseif ($gender === "f" && sub(array("prAk","pratyak","udIk","prAN","pratyaN","udIN","prAg","pratyag","udIg","pUrva","paScima","uttara","dakziRa","aDara","avara"),$svAGga,array("+"),0) )
{
    $text = one(array("+"),array("+NIp+"),0);
	storedata('4.1.60','st',8);
    $GIp=1;
    $GIS=0;
    $ajAdyataSTAp=0;
}
/* svAGgAccopasarjanAdasaMyogopadhAt (4.1.54) */
// In this section, we enter only those words which qualify the above criteria to svAGga array.
elseif ($gender === "f" && ends(array($fo),$svAGga,0))
{
    $text = one(array("+"),array("+NIz+"),1);
	storedata('4.1.54','st',8);
    $GIS=1;
}
/* UGutaH (4.1.66) */
elseif ($gender === "f" && sub(array("u"),array("+"),blank(0),0) && !sub(array("yu"),array("+"),blank(0),0) && $_GET['cond2_22']==="2")
{
    $text = two(array("u"),array("+"),array("U"),array("+"),0);
	storedata('4.1.66','st',8);
    $ajAdyataSTAp=0;
}
/* bAhvantAtsaJjJAyAm (4.1.67) */
elseif ($gender === "f" && $_GET['cond2_26']==="1")
{
    $text = two(array("bAhu"),array("+"),array("bAhU"),array("+"),0);
	storedata('4.1.67','st',8);
    $ajAdyataSTAp=0;
}
/* zArGgaravAdyaJo GIn (4.1.73) */
// zARGgaravAdi is properly treated. aJ-ending words are still to be incorporated.
elseif ($gender === "f" && $_GET['cond2_22']==="2" && in_array($fo,$zArGgaravAdi) )
{
    $text = one(array("+"),array("+NIn+"),0);
	storedata('4.1.73','st',8);
    $GIn=1;
    $ajAdyataSTAp=0;
}
/* nRnarayorvRddhizca (ga 54) */
elseif ($gender === "f" && $_GET['cond2_22']==="2" && in_array($fo,array("nf","nara")) )
{
    $text = one(array("nf+","nara+"),array("nAr+NIn+","nAra+NIn+"),0);
	// pending to refactor
/*    echo "<p class = st >By nRnarayorvRddhizca (ga 54) :</p>\n";
    echo "<p class = st >नृनरयोर्वृद्धिश्च (ग ५४) :</p>\n";        
    display(8);*/
    $GIn=1;
    $ajAdyataSTAp=0;
}
/* SAdyaJazcAbvAcyaH (vA 2505) */
elseif ($gender === "f" && $_GET['cond2_22']==="2" && sub(array("zya"),array("+"),blank(0),0) && AdivRddhi($text))
{
    $text = one(array("+"),array("+cAp+"),0);
	storedata('4.1.74-1','st',8);
    $cAp=1;
    $ajAdyataSTAp=0;
}
/* AvaTyAcca (4.1.75) */ 
elseif ( $gender==="f" && $_GET['cond2_14']==='2' && sub(array("Avawya",),array("+"),$sup,0) )
{
    $text = two(array("ya"),array("+"),array("ya"),array("+cAp+"),0);
	storedata('4.1.75','st',8);
    $cAp=1; $ajAdyataSTAp = 0;
}
/* yUnastiH (4.1.77) */ 
elseif ($gender==="f" && sub(array("yuvan",),array("+"),$sup,0) )
{
    $text = two(array("yuvan"),array("+"),array("yuvati"),array("+"),0);
	storedata('4.1.72','ta',8);
	storedata('4.1.3','st',8);
    $tiH=1; $ajAdyataSTAp = 0;
    $taddhita=1;
}
/* yaGazcAp (4.1.74) */
// bad patch.
elseif ($gender === "f" && $_GET['cond2_22']==="2" && sub(array("ya"),array("+"),blank(0),0) && AdivRddhi($text))
{
    $text = one(array("+"),array("+cAp+"),0);
	storedata('4.1.74','st',8);
    $cAp=1;
    $ajAdyataSTAp=0;
}
/* aparimANabistAcitakambaLyebhyo na taddhitaluki (4.1.22) */
elseif ($gender==="f" && sub(array("a"),array("+"),blank(0),0) && dvigu(array($fo))  && $_GET['cond2_16_1_1']==="1" && !sub(array("taya"),array("+"),blank(0),0))
{
	storedata('4.1.22','st',8);
}
/* kANDAtkSetre (4.1.23) */
elseif ($gender==="f" &&  $_GET['cond2_16_1_2']==="1")
{
	storedata('4.1.23','st',8);
	$ajAdyataSTAp = 0;
    $GIp=1;
}
/* puruSAtpramANe'nyatarasyAm (4.1.24) */
elseif ($gender==="f" &&  $_GET['cond2_16_1_3']==="1")
{
    $text = two(array("a"),array("+"),array("a"),array("+NIp+"),1);
	storedata('4.1.24','st',8);
	$ajAdyataSTAp = 0;
    $GIp=1;
}
/* dvigoH (4.1.21) */
elseif ($gender==="f" && sub(array("a"),array("+"),blank(0),0) && dvigu(array($fo))  && $_GET['cond2_15']!=="1" && $_GET['cond2_16']!=="2" && !sub(array("taya"),array("+"),blank(0),0) && $_GET['cond2_16_1_2']!=="1" && $_GET['cond2_16_1_3']!=="1")
{
    $text = two(array("a"),array("+"),array("a"),array("+NIp+"),0);
	storedata('4.1.21','st',8);
	$ajAdyataSTAp = 0;
    $GIp=1;
}
/* jAterastrIviSayAdayopadhAt (4.1.63) and yopadhapratiSedhe hayagavayamukayamanuSyamatsyAnAmapratiSedhaH (vA 2495) */
elseif ($gender === "f" && in_array($fo,array("haya","gavaya","mukaya","manuzya","matsya")))
{
    $text = one(array("+"),array("+NIz+"),0);
	storedata('4.1.63','st',8);
	storedata('4.2.104-26','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
    if(in_array($fo,array("manuzya","matsya")))
    {
        $taddhita=1;
    }
}
/* jAterastrIviSayAdayopadhAt (4.1.63) */
elseif ($gender === "f" && $_GET['cond2_22']==="2" && !sub(array("y"),$ac,array("+"),0) )
{
    $text = one(array("+"),array("+NIz+"),0);
	storedata('4.1.63','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* jAterastrIviSayAdayopadhAt (4.1.63) */
elseif ($gender === "f" && in_array($fo,$aupagava) )
{
    $text = one(array("+"),array("+NIz+"),0);
	storedata('4.1.63','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* SidgaurAdibhyazca (4.1.41) */
elseif ($gender === "f" && sub($Sidwords,array("+"),blank(0),0) && $_GET['cond2_22']!=="2")
{
    $text = two($Sidwords,array("+"),$Sidwords,array("+NIz+"),0);
	storedata('4.1.41','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* anaDuhaH striyAM Am vA (vA 4378) */
elseif ($gender === "f" && sub(array("anaquh"),array("+"),blank(0),0) && in_array($fo,array("anaquh")) && $_GET['cond2_22']!=="2")
{
    $text = two(array("anaquh"),array("+"),array("anaquh"),array("+NIz+"),0);
	storedata('4.1.41','st',8);
    $text = two(array("anaquh"),array("+NIz"),array("anaqvAh"),array("+NIz+"),1);
	storedata('7.1.98-1','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* SidgaurAdibhyazca (4.1.41) */
elseif ($gender === "f" && sub($gaurAdi,array("+"),blank(0),0) && $_GET['cond2_22']!=="2")
{
    $text = two($gaurAdi,array("+"),$gaurAdi,array("+NIz+"),0);
	storedata('4.1.41','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* dAmahAyanAntAcca (4.1.27) */
elseif ($gender === "f" && dvigu($text) && sub(array("dAman",),array("+"),blank(0),0))
{
    $text = two(array("dAman",),array("+"),array("dAman",),array("+NIp+"),0);
	storedata('4.1.27','st',8);
    $GIp=1;
    $it = array_merge($it,array("N","p"));
    $itprakriti = array_merge($itprakriti,array("N","p"));
    $text = one(array("an+"),array("n+"),0);
	storedata('6.4.134','sa',6);
    $allopo=1;
    $ajAdyataSTAp=0;
}
/* dAmahAyanAntAcca (4.1.27) */
elseif ($gender === "f" && dvigu($text) && sub(array("hAyana","hAyaRa"),array("+"),blank(0),0) && $_GET['cond2_16_2_1']==="1")
{
    $text = two(array("hAyana","hAyaRa"),array("+"),array("hAyana","hAyaRa"),array("+NIp+"),0);
	storedata('4.1.27','st',8);
	storedata('4.1.27-3','st',8);
    $GIp=1;
    $it = array_merge($it,array("N","p"));
    $itprakriti = array_merge($itprakriti,array("N","p"));
    $ajAdyataSTAp=0;
}
/* nityaM saJjJACandasoH (4.1.29) */
elseif ($gender === "f" && $_GET['cond2_10_1']==="1" )
{
    $text = one(array("An+","an+"),array("n+NIp+","n+NIp+"),0);
	storedata('4.1.29','st',8);
    $GIp=1;
    $ajAdyataSTAp=0;
}
/* kevalamAmakabhAgadheyapApAparasamAnAryakRtasumaGgalabheSajAcca (4.1.30) */
elseif ($gender === "f" && $_GET['cond2_18']==="1" )
{
    $text = two(array("kevala","mAmaka","BAgaDeya","pApa","apara","samAna","Aryakfta","sumaNgala","Bezaja",),array("+"),array("kevala","mAmaka","BAgaDeya","pApa","apara","samAna","Aryakfta","sumaNgala","Bezaja",),array("+NIp+"),0);
	storedata('4.1.30','st',8);
    $GIp=1;
    $ajAdyataSTAp=0;
    $kevala=1;
}
/* ano bahuvrIheH (4.1.12) */
// This is tough. Please enumerate such words. Seems like they are very few.
elseif ($gender === "f" && ($_GET['cond2_8_1_1']==="1" || $_GET['cond2_8_2']==="1" || $_GET['cond2_10']==="1" ))
{
	storedata('4.1.12','st',8);
	$anobahuvrihe=1;
}
/* vano na haza iti vaktavyam (vA 2405) */
// This is tough. Please enumerate such words. Seems like they are very few.
elseif ($gender === "f" && $_GET['cond2_8_1_1']==="2" )
{
	storedata('4.1.7-1','st',8);
}
/* vano ra ca (4.1.7) and bahuvrIhau vA (vA 2407) */
// put here because it is always nakArAnta. So, it should get precedence over Rnnebhyo GIp.
elseif ($gender === "f" && ($_GET['cond2_8_1']==="2" || sub($vanoracawords,array("+"),blank(0),0) || sub($hrasva,array("tvan"),array("+"),0)  ))
{
    if ($_GET['cond2_8_1_2']==="1")
    {
    $text = two(array("van"),array("+"),array("var"),array("+NIp+"),1);        
	storedata('4.1.7-3','st',8);
	$bahuvrihauva=1;       
    }
    elseif ($_GET['cond2_8_1_2']==="2" || (sub($kvanipwords,array("+"),blank(0),0)||sub($Gvanipwords,array("+"),blank(0),0)||sub($vanipwords,array("+"),blank(0),0) ) )
    {
    $text = two(array("van"),array("+"),array("var"),array("+NIp+"),0);        
	storedata('4.1.7','st',8);
    }
    $GIp=1;
}
/* manaH (4.1.11) */
elseif ($gender === "f" && sub(array("man"),array("+"),blank(0),0) )
{
	storedata('4.1.11','st',8);
	$manah=1;
}
/* Rnnebhyo GIp (4.1.5) */
elseif ($gender === "f" && sub(array("f","n"),array("+"),blank(0),0) && $SaTsvasrAdi!==1 && $allopo!==1 && $GIS!==1 && $GIn!==1 && $tiH!==1)
{
    $text = two(array("f","n"),array("+"),array("f+NIp","n+NIp"),array("+"),0);
	storedata('4.1.5','st',8);
    $GIp=1;
}
/* TAbRci (4.1.9) */
elseif ($gender === "f" && $_GET['cond2_9'] === "1" )
{
    $text = two(array("pAd"),array("+"),array("pAd+wAp"),array("+"),0);
	storedata('4.1.9','st',8);
    $text = two(array("pAd+wAp"),array("+"),array("pad+wAp"),array("+"),0);
	storedata('6.4.130','sa',0);
    $TAp=1;
}
/* pAdo'nyatarasyAm (4.1.8) */
elseif ($gender === "f" && $_GET['cond2_9'] == "2" )
{
    $text = two(array("pAd"),array("+"),array("pAd+NIp"),array("+"),1);
	storedata('4.1.8','sa',0);
    $text = two(array("pAd+NIp"),array("+"),array("pad+NIp"),array("+"),0);
	storedata('6.4.130','sa',0);
    $GIp=1;
}
/* anupasarjanAt adhikAra */
// anupasarjanAt (4.1.14) is implicitly mentioned in display function.
/* tAcCIlike Ne'pi (pa 68) */
elseif ($_GET['cond2_14']==='2' && sub(array("CAtra","bOBukza","SEkza","pOroha","sAMsTa","AvasTa","cOra","OpasTa","ArSa","kArma","vESvaDa","TApasa","sAtya","Anarta","SEbika",),array("+"),blank(0),0) )
{
    $text = two(array("a"),array("+"),array("a"),array("+NIp+"),0);
	storedata('par@87','sa',0);
    $GIp=1; $ajAdyataSTAp = 0;
}
/* naJsnaJIkakkhyuMstaruNatalunAnAmupasaGkhyAnam (vA 2425) */
elseif ( ($_GET['cond2_14']==='2' && sub(array("strERa","pOMsna","SAktIka","yAzTIka","kArkIka","lOhitIka","NkaraRa","taruRa","taluna"),array("+"),blank(0),0) ) )
{
    $text = two(array("a"),array("+"),array("a"),array("+NIp+"),0);
	// pending to refactor
/*    echo "<p class = st >By naJsnaJIkakkhyuMstaruNatalunAnAmupasaGkhyAnam (vA 2425) :</p>\n";
    echo "<p class = st >नञ्स्नञीकक्ख्युंस्तरुणतलुनानामुपसङ्ख्यानम्‌ (वा २४२५) :</p>\n";        
    display(8);*/
    $GIp=1; $ajAdyataSTAp = 0;
}
/* anapatyAdhikArasthAnna GIp (vA 2426) */
elseif ( ($_GET['cond2_14']==='2' && sub(array("kEdArya","kESya","ASvya","dvEpya","kAMsya","ABijitya","vEdaBftya","SAlAvatya","SEKAvatya","SAmIvatya","OrRAvatya","SrOmatya",),array("+"),blank(0),0) ) )
{
	// pending to refactor
/*    echo "<p class = sa >By anapatyAdhikArasthAnna GIp (vA 2426) :</p>\n";
    echo "<p class = sa >अनपत्याधिकारस्थान्न ङीप्‌ (वा २४२६) :</p>\n";        
    display(8);*/
    $taddhita=1;
    $anapatya=1;
     $ajAdyataSTAp = 0;
}
/* sarvatra lohitAdikatantebhyaH (4.1.18) */
elseif ($gender==="f" && sub(array("lOhitya","nElya","hEritya","pEtya","mAdrya","PEnya","mAndya","kAtya"),array("+"),blank(0),0) )
{
    $text = two(array("a"),array("+"),array("a"),array("+zPa+"),0);
	storedata('4.1.18','st',8);
     $ajAdyataSTAp = 0;
}
/* kauravyamANDukAbhyaM ca (4.1.19) */
elseif ($gender==="f" && sub(array("kOravya","mARqUka"),array("+"),blank(0),0) )
{
    $text = two(array("a"),array("+"),array("a"),array("+zPa+"),0);
	storedata('4.1.19','st',8);
     $ajAdyataSTAp = 0;
}
/* AsurerupasaMkhyAnam (vA 2433) */
elseif ($gender==="f" && sub(array("Asura"),array("+"),blank(0),0) )
{
    $text = two(array("Asura"),array("+"),array("Asura"),array("+zPa+"),0);
	storedata('4.1.19-1','st',8);
     $ajAdyataSTAp = 0;
}
/* yaJazca (4.1.16) */ 
elseif ( ($_GET['cond2_14']==='2' && sub(array("gArgya","vAtsya","vAjya","sAMkftya","Ajya","vEyAGrapAda","vEdaBfta","prAcInayogya","Agastya","pOlastya","rEBya","AgniveSya","SANKya","SAWya","GOmya","Avawya","GOmya","Avawya","cAmasa","DAnaYjayya","mAnasya","vESvAvasvya","vArkzya","jAnamAnya","lOhitya","SAMsitya","bABravya","mARqavya","mAkzavya","Aligavya","SANkavya","lEgavya","gOlavya","mAntavya","jEgizavya","mAnavya","tAntavya","mAnAyavya","BOtya","kATakya","kAzya","tARqya","vAtaRqya","kApyya","kAtya","kOrukatya","Anaqavya","kARvya","gOkakzya","Agastyya","kORqinya","yAjYavalkya","OBayya","jAtya","vErohitya","vArzagaRya","rAhUgaRya","SARqilya","vaRya","kAculukya","mOdgalya","mOsalya","pArASarya","jAtUkarRya","mAntritya","sAMhitya","ASmaraTya","SArkarAkzya","pOtimAzya","sTORya","Ararakya","pENgalya","kArzRya","gOlundya","OlUkya","tEtikzya","BEzajya","BAqitya","BARqitya","dAlBya","cEkitya","dEvahavya","Endrahavya","Ekalavya","pEppalavya","vARdagnya","jAmadagnya","sOloBinya","OkTya","kOwigavya","mADavya","bABravya","vAtaRqya","kApeya","bODya",),array("+"),$sup,0) ) )
{
    /* prAcAM Spha taddhitaH (4.1.17) */
    $text = two(array("ya"),array("+"),array("ya"),array("+zPa+"),1);
	storedata('4.1.17','st',8);
    $text = three(array("ya"),array("+"),$sup,array("ya"),array("+NIp+"),$sup,0);
	storedata('4.1.16','st',8);
    $GIp=1; $ajAdyataSTAp = 0;
    $taddhita=1;
}
/* TiDDhANaJdvayasajdadhnaJmAtractayapThakThaJkaJkvarapaH (4.1.15) exeption in upasarjanatva */
elseif ($_GET['cond2_14']==='1' && $anapatya===0 && $gender==="f" && $fo!=="mAmaka" && $kevala!==1 && $GIS!==1 && $GIp!==1 && $GIn!==1 && $cAp!==1 && $_GET['cond2_11']!=="1" && !sub(array("nOka","AcArya"),array("+"),blank(0),0) && $_GET['cond2_12']!=="1" && $_GET['cond2_13']!=="2")
{
	// pending to refactor
/*    echo "<p class = pa >TiDDhANaJdvayasajdadhnaJmAtractayapThakThaJkaJkvarapaH (".link_sutra("4.1.15").") is not applied because of upasarjanatva. :</p>\n";
    echo "<p class = pa >टिड्ढाणञ्द्वयसज्दध्नञ्मात्रच्तयप्ठक्ठञ्कञ्क्वरपः (४.१.१५) उपसर्जनत्व से बाधित है ।</p>\n";        
    display(0);*/
}
/* TiDDhANaJdvayasajdadhnaJmAtractayapThakThaJkaJkvarapaH (4.1.15) exeption in zAnac */
elseif (arr($text,'/[sz]yamARa\+/') && sub(array("syamARa","zyamARa"),array("+"),blank(0),0))
{
	storedata('par@69','sa',0);
}
/* TiDDhANaJdvayasajdadhnaJmAtractayapThakThaJkaJkvarapaH (4.1.15) */
// TitkRdanta pending.
elseif ($_GET['cond2_14']==='2' && $anapatya===0 && $gender==="f" && $fo!=="mAmaka" && $kevala!==1 && $GIS!==1 && $GIp!==1 && $GIn!==1 && $cAp!==1 && $_GET['cond2_11']!=="1" && !sub(array("nOka","AcArya"),array("+"),blank(0),0) && $_GET['cond2_12']!=="1" && $_GET['cond2_13']!=="2")
{
    $text = two(array("a"),array("+"),array("a"),array("+NIp+"),0);
	storedata('4.1.15','st',8);
    $GIp=1; $ajAdyataSTAp = 0;
}
/* vayasi prathame (4.1.20) */
elseif ($gender==="f" && sub(array("kumAra"),array("+"),blank(0),0) )
{
    $text = two(array("kumAra"),array("+"),array("kumAra"),array("+NIp+"),0);
	storedata('4.1.20','st',8);
    $GIp=1;  $ajAdyataSTAp = 0;
}
/* vayasyacarama iti vAcyam (vA 2435) */
elseif ($gender==="f" && sub(array("vaDUwa","ciraRwa"),array("+"),blank(0),0) )
{
    $text = two(array("vaDUwa","ciraRwa"),array("+"),array("vaDUwa","ciraRwa"),array("+NIp+"),0);
	// pending to refactor
/*    echo "<p class = st >By vayasyacarama iti vAcyam (vA 2435) :</p>\n";
    echo "<p class = st >वयस्यचरम इति वाच्यम्‌ (वा २४३५) :</p>\n";        
    display(8);*/
    $GIp=1; $ajAdyataSTAp = 0;
}
if ($debug===1) {dibug("6700");}
/* common patch for Spha pratyaya */
if (arr($text,'/\+zPa\+/'))
{
    /* SaH pratyayasya (1.3.6) and tasya lopaH (1.3.9) */
    // list of such pratyayas in SLP1 - za,zavan,zikan, zivan, zeRyaR, zkan, zWac, zWan, zWarac, zWal, zwran, zPa, zPak, zyaN, zyaY, zvarac, zvun
    // right now only coded for zPa.
    $text = two(array("a"),array("+zPa"),array("a"),array("+Pa+"),0);
	storedata('1.3.6','sa',0);
	storedata('1.3.9','sa',0);
    $it = array_merge($it,array("z"));
    $itprakriti = array_merge($itprakriti,array("z"));
    /* AyaneyInIyiyaH phaDhakhaCaghAM pratyayAdInAm (7.1.2) */
    if(arr($text,'/\+[PQKCG]a\+/'))
    {
        $text = one(array("+Pa+","+Qa+","+Ka+","+Ca+","+Ga+"),array("+Ayana+","+eya+","+Ina+","+Iya+","+iya+"),0);
		storedata('7.1.2','sa',0);
    }    
}
/* SidgaurAdibhyazca (4.1.41) */
// right now coded only for Spha. Remaining have to be coded at appropriate stage.
if ($gender === "f" && in_array("z",$itprakriti) && $_GET['cond2_22']!=="2" && $GIS!==1)
{
    $text = two(array("Ayana"),array("+"),array("Ayana"),array("+NIz+"),0);
    $text = two(array("anaquh"),array("+NIz"),array("anaqvAh"),array("+NIz+"),1);
	storedata('4.1.41','st',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}
/* ajAdyataSTAp (4.1.4) for adanta words */
if (arr($text,'/[a][+]/') && $gender==="f" && $_GET['cond2_7']!=="2" && $ajAdyataSTAp!==0 && $TAp!==1) 
{
    /* kanyAyA na. 'kanyAyAH kanIna ca' iti nirdezAt. */
    if ($gender==="f" && sub(array("kanya"),array("+"),blank(0),0) )
    {
		// pending to refactor
		/*echo "<p class = pa >By kanyAyA na. 'kanyAyAH kanIna ca' iti nirdezAt. :</p>\n";
        echo "<p class = pa >'कन्याया न' । 'कन्यायाः कनीन च' इति निर्देशात्‌ ।</p>\n";        
        display(0);*/
    }
    $text = last(array($so),array("+wAp+".$so),0);
    $text = two(array("NIp","NIz","NIn"),array("+wAp"),array("NIp","NIz","NIn"),array(""),0);
	storedata('4.1.4','st',8);
    $TAp=1;
}
/* DAbubhAbhyAmanyatarsyAm (4.1.13) */
if ($anobahuvrihe===1 || $manah===1 || $bahuvrihauva===1)
{
    $text = two(array("an"),array("+"),array("an"),array("+qAp+"),1);
	storedata('4.1.14','sa',0);
    $text = two(array("an"),array("+qAp+"),array(""),array("+qAp+"),0);    
	storedata('6.4.143','sa',3);
    $DAp=1;
}
/* sUryatiSyAgastyamatsyAnAM ya upadhAyAH (6.4.141) */
if ($gender === "f" && sub(array("sUrya","tizya","agastya","matsya"),array("+"),blank(0),0) )
{
    $text = two(array("sUrya","tizya","agastya","matsya"),array("+NIz+"),array("sUra","tiza","agasta","matsa"),array("+NIz+"),0);
	storedata('6.4.141','sa',8);
    $GIS=1;
    $ajAdyataSTAp=0;
}

/* common patch for TAp pratyaya to remove the it markers. */
if ($TAp===1)
{
    $Ap=1;
	storedata('1.3.7','pa',0);
	storedata('1.3.3','pa',0);
    $text = two(array("+wAp"),array("+"),array("A"),array("+"),0); 
    $it = array_merge($it,array("p","w"));
    $itprakriti = array_merge($itprakriti,array("p","w"));
	storedata('1.3.9','sa',0);
}
if ($debug===1) {dibug("6800");}
/* common patch for DAp pratyaya to remove the it markers. */
if ($DAp===1)
{
    $Ap=1;
	storedata('1.3.7','pa',0);
	storedata('1.3.3','pa',0);
    $text = two(array("+qAp"),array("+"),array("A"),array("+"),0); 
    $it = array_merge($it,array("p","q"));
    $itprakriti = array_merge($itprakriti,array("p","q"));
	storedata('1.3.9','sa',0);
}
/* common patch for cAp pratyaya to remove the it markers. */
if ($cAp===1)
{
    $Ap=1;
	storedata('1.3.7','pa',0);
	storedata('1.3.3','pa',0);
    $text = two(array("+cAp"),array("+"),array("A"),array("+"),0); 
    $it = array_merge($it,array("p","c"));
    $itprakriti = array_merge($itprakriti,array("p","c"));
	storedata('1.3.9','sa',0);
}
/* common removal of G,n and application of 'yasyeti ca' for NIn pratyaya */
if ($GIn===1 )
{
	storedata('1.3.8','pa',0);
	storedata('1.3.3','pa',0);
    $text = two(array("NIn"),array("+"),array("I"),array("+"),0); 
    $it = array_merge($it,array("N","n"));
    $itprakriti = array_merge($itprakriti,array("N","n"));
	storedata('1.3.9','sa',0);
    $nadi=1;
    $GI=1;
    $noAp=1;    
/* halastaddhitasya (6.4.150) */
// patch made for gArgI etc.
    if ( sub($hl,array("ya"),array("+I+"),0) && $taddhita===1)
    {
        $text = three($hl,array("ya",),array("+I+"),$hl,array("a"),array("+I+"),0);
		storedata('6.4.150','sa',0);
        $taddita=0;
    }
/* yasyeti ca (6.4.148) */
// patch made because before GIp, it becomes bham.
    if (arr($text,'/[aI][+][I]/') && $gender==="f" && sub(array("I","a"),array("+I"),array("+"),0))
    {
        $text = two(array("a","I"),array("I"),array("",""),array("I"),0);
		storedata('6.4.148','sa',3);
        $taddhita=0;
        $text = two(array("+"),array("I+"),array(""),array("I+"),0);
    }
/* vAha UTh (6.4.132) */
    if (  sub(array("vAh"),array("+","+I+"),blank(0),0) && !sub(array("anaqvAh"),array("+","+I+"),blank(0),0) )
    {   
        $text = one(array("vAh+"),array("U+Ah+"),0);
		storedata('6.4.132','sa',3);
		$samp=array_merge($samp,array(1));
    }
/* eco'yavAyAvaH (6.1.78) */
    $ayavayavah = array("ay","av","Ay","Av");
    if (sub(prat('ec'),prat('ac'),blank(0),0))
    {
    $text = two(prat('ec'),array("I"),$ayavayavah,array("I"),0);
	storedata('6.1.78','sa',0);
    }
    /* akaH savarNe dIrghaH (6.1.101) */ 
    if (sub(array("i","I"),array("+I+"),blank(0),0))
    {
    $text = two(array("i","I"),array("+I+"),array("I+","I+"),blank(2),0);
	storedata('6.1.101','sa',0);
    }    
    /* aniditAM hala upadhAyAH kGiti (6.4.24) */ 
    if ( !itcheck(array("i"),1) && arr($text,'/[nY]['.pc('hl').'][+][I][+]/')  && !in_array("i",$it)  && $lakAra!=="viDiliN" && $verbset!=="ruDAdi" && $aniditAm!==1)
    {
        $text = three(array("n","Y"),$hl,array("+"),array("",""),$hl,array("+"),0);        
		storedata('6.4.24','sa',0);
        $aniditAm = 1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
    }
    /* acaH (6.4.138) */ 
    if ( preg_match('/[aA][nMY][c]/',$fo) && $aniditAm === 1 && sub(array("ac","Ac"),array("+"),blank(0),0) && ($bham===1 || sub(array("ac","Ac"),array("+"),array("I+"),0)) && $ancu===1)
    {
        if (sub(array("i","I","u","U","f","F","x","X","y","v"),prat('ac'),array("c"),0))
        {
			storedata('par@56','pa',0);
/*			echo "<p class = pa >Though iko yaNaci is antaraGga than lopa by acaH, its application is barred by 'akRtavyUhAH pANinIyAH (pa 57).</p>\n";
        echo "<p class = pa >इको यणचि से प्राप्त यण्‌ अन्तरङ्ग होने पर भी अकृतव्यूहाः पाणिनीयाः (प ५७) से वह अचः का बाध नहीं करता ।</p>\n";
        display(0);        */
        }
        $text = two(array("yac","ac","Ac"),array("+"),array("ic","c","ac"),array("+"),0);
		storedata('6.4.138','sa',0);
        if ($nance===1)
        {
			// pending to refactor
			/*echo "<p class = hn >As there is no lopa of nakAra in nAJceH pUjAyAm, there is not akAralopa.</p>\n";
        echo "<p class = hn >नलोपाभावादकारलोपो न ।</p>\n";        */
        }
        $acaH=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
    } else { $acaH=0; }
    /* cau (6.3.138) */ 
    if ( $acaH===1)
    {
        $text = three($ac,array("c","c"),array("+"),$acdir,array("c","c"),array("+"),0);
		storedata('6.3.138','sa',0);
    }
    $text = one(array("+I+"),array("I+"),0);
    $dhatu=0;
}
if ($debug===1) {dibug("6900");}
/* common removal of G,p and application of 'yasyeti ca' for NIp pratyaya */
if ($GIp===1 )
{
		storedata('1.3.8','pa',0);
		storedata('1.3.3','pa',0);
    $text = one(array("+NIp+"),array("+I+"),0); 
    $it = array_merge($it,array("N","p"));
    $itprakriti = array_merge($itprakriti,array("p","N"));
		storedata('1.3.9','sa',0);
    $GI=1;
    $nadi=1; 
    $noAp=1;    
/* halastaddhitasya (6.4.150) */
// patch made for gArgI etc.
    if ( sub($hl,array("ya"),array("+I+"),0) && $taddhita===1 )
    {
        $text = three($hl,array("ya",),array("+I+"),$hl,array("a"),array("+I+"),0);
		storedata('6.4.150','sa',0);
        $taddita=0;
    }
/* yasyeti ca (6.4.148) */
// patch made because before GIp, it becomes bham.
    if (arr($text,'/[aI][+][I]/') && $gender==="f" && sub(array("I","a"),array("+I"),array("+"),0))
    {
        $text = two(array("a","I"),array("I"),array("",""),array("I"),0);
		storedata('6.4.148','sa',0);
        $taddhita=0;
        $text = two(array("+"),array("I+"),array(""),array("I+"),0);
    }
/* eco'yavAyAvaH (6.1.78) */
    $ayavayavah = array("ay","av","Ay","Av");
    if (sub(prat('ec'),prat('ac'),blank(0),0))
    {
    $text = two(prat('ec'),array("I"),$ayavayavah,array("I"),0);
	storedata('6.1.78','sa',0);
    }
    /* akaH savarNe dIrghaH (6.1.101) */ 
    if (sub(array("i","I"),array("+I+"),blank(0),0))
    {
    $text = two(array("i","I"),array("+I+"),array("I+","I+"),blank(2),0);
	storedata('6.1.101','sa',0);
    }    
    /* aniditAM hala upadhAyAH kGiti (6.4.24) */ 
    if ( !itcheck(array("i"),1) && arr($text,'/[nY]['.pc('hl').'][+][I][+]/')  && $verbset!=="ruDAdi"  && $aniditAm!==1)
    {
        $text = three(array("n","Y"),$hl,array("+"),array("",""),$hl,array("+"),0);        
		storedata('6.4.24','sa',0);
        $aniditAm = 1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
    }
    /* acaH (6.4.138) */ 
    if ( preg_match('/[aA][nMY][c]/',$fo) && $aniditAm === 1 && sub(array("ac","Ac"),array("+"),blank(0),0) && ($bham===1 || sub(array("ac","Ac"),array("+"),array("I+"),0)) && $ancu===1)
    {
        if (sub(array("i","I","u","U","f","F","x","X","y","v"),prat('ac'),array("c"),0))
        {
			storedata('par@56','pa',0);
			// pending to refactor
			/*echo "<p class = pa >Though iko yaNaci is antaraGga than lopa by acaH, its application is barred by 'akRtavyUhAH pANinIyAH (pa 57).</p>\n";
        echo "<p class = pa >इको यणचि से प्राप्त यण्‌ अन्तरङ्ग होने पर भी अकृतव्यूहाः पाणिनीयाः (प ५७) से वह अचः का बाध नहीं करता ।</p>\n";
        display(0);        */
        }
        $text = two(array("yac","ac","Ac"),array("+"),array("ic","c","ac"),array("+"),0);
		storedata('6.4.138','sa',3);
        if ($nance===1)
        {
			// pending to refactor
			/*echo "<p class = hn >As there is no lopa of nakAra in nAJceH pUjAyAm, there is not akAralopa.</p>\n";
        echo "<p class = hn >नलोपाभावादकारलोपो न ।</p>\n";        */
        }
        $acaH=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
    } else { $acaH=0; }
    /* cau (6.3.138) */ 
    if ( $acaH===1)
    {
        $text = three($ac,array("c","c"),array("+"),$acdir,array("c","c"),array("+"),0);
		storedata('6.4.138','sa',3);
    }
    $text = one(array("+I+"),array("I+"),0);
    $dhatu=0;
}
if ($debug===1) {dibug("7000");}
/* common removal of G,S and application of 'yasyeti ca' for NIS pratyaya */
if ($GIS===1 )
{
	storedata('1.3.8','pa',0);
	storedata('1.3.3','pa',0);
    $text = two(array("NIz"),array("+"),array("I"),array("+"),0); 
    $it = array_merge($it,array("N","z"));
    $itprakriti = array_merge($itprakriti,array("N","z"));
	storedata('1.3.9','sa',0);
    $nadi=1;
    $GI=1;
    $noAp=1;    
/* halastaddhitasya (6.4.150) */
// patch made for gArgI etc.
    if ( sub($hl,array("ya"),array("+I+"),0) && $taddhita===1)
    {
        $text = three($hl,array("ya",),array("+I+"),$hl,array("a"),array("+I+"),0);
		storedata('6.4.150','sa',0);
        $taddita=0;
    }
/* yasyeti ca (6.4.148) */
// patch made because before GIp, it becomes bham.
    if (arr($text,'/[aI][+][I]/') && $gender==="f" && sub(array("I","a"),array("+I"),array("+"),0))
    {
        $text = two(array("a","I"),array("I"),array("",""),array("I"),0);
		storedata('6.4.148','sa',3);
        $taddhita=0;
        $text = two(array("+"),array("I+"),array(""),array("I+"),0);
    }
/* vAha UTh (6.4.132) */
    if (  sub(array("vAh"),array("+","+I+"),blank(0),0) && !sub(array("anaqvAh"),array("+","+I+"),blank(0),0) )
    {   
        $text = one(array("vAh+"),array("U+Ah+"),0);
		storedata('6.4.132','sa',3);
		$samp=array_merge($samp,array(1));
    }
/* eco'yavAyAvaH (6.1.78) */
    $ayavayavah = array("ay","av","Ay","Av");
    if (sub(prat('ec'),prat('ac'),blank(0),0))
    {
    $text = two(prat('ec'),array("I"),$ayavayavah,array("I"),0);
	storedata('6.1.78','sa',0);
    }
    /* akaH savarNe dIrghaH (6.1.101) */ 
    if (sub(array("i","I"),array("+I+"),blank(0),0))
    {
    $text = two(array("i","I"),array("+I+"),array("I+","I+"),blank(2),0);
	storedata('6.1.101','sa',0);
    }    
    
    /* aniditAM hala upadhAyAH kGiti (6.4.24) */ 
    if ( !itcheck(array("i"),1) && arr($text,'/[nY]['.pc('hl').'][+][I][+]/')  && !(arr($text,'/[NYRnmM]['.pc('hl').'][+]a[+]/') && in_array("Sap",$vik))  && $lakAra!=="viDiliN" && $verbset!=="ruDAdi" && $aniditAm!==1)
    {
        $text = three(array("n","Y"),$hl,array("+"),array("",""),$hl,array("+"),0);        
		storedata('6.4.24','sa',0);
        $aniditAm = 1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
    }
    /* acaH (6.4.138) */ 
    if ( preg_match('/[aA][nMY][c]/',$fo) && $aniditAm === 1 && sub(array("ac","Ac"),array("+"),blank(0),0) && ($bham===1 || sub(array("ac","Ac"),array("+"),array("I+"),0)) && $ancu===1)
    {
        if (sub(array("i","I","u","U","f","F","x","X","y","v"),prat('ac'),array("c"),0))
        {
			storedata('par@56','pa',0);
			// pending to refactor
			/*echo "<p class = pa >Though iko yaNaci is antaraGga than lopa by acaH, its application is barred by 'akRtavyUhAH pANinIyAH (pa 57).</p>\n";
        echo "<p class = pa >इको यणचि से प्राप्त यण्‌ अन्तरङ्ग होने पर भी अकृतव्यूहाः पाणिनीयाः (प ५७) से वह अचः का बाध नहीं करता ।</p>\n";
        display(0);*/        
        }
        $text = two(array("yac","ac","Ac"),array("+"),array("ic","c","ac"),array("+"),0);
		storedata('6.4.138','sa',3);
        if ($nance===1)
        {
			// pending to refactor
			/*echo "<p class = hn >As there is no lopa of nakAra in nAJceH pUjAyAm, there is not akAralopa.</p>\n";
        echo "<p class = hn >नलोपाभावादकारलोपो न ।</p>\n";        */
        }
        $acaH=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
    } else { $acaH=0; }
    /* cau (6.3.138) */ 
    if ( $acaH===1)
    {
        $text = three($ac,array("c","c"),array("+"),$acdir,array("c","c"),array("+"),0);
		storedata('6.4.138','sa',3);
    }
    $text = one(array("+I+"),array("I+"),0);
    $dhatu=0;
}
/* kSipakAdInAM ca na (vA 4530) */
// This is an AkRtigaNa. Therefore, the occurence from grammar have to be identified. Right now the list in gaNapATha nad gaNaratnamahodadhi is given.
if ($gender==="f" && $Ap===1 && sub(array("kzipaka","Druvaka","kanyaka","cawaka","alaka","izwaka","Duvaka","caraka","sevaka","karaka","avaka","lahaka",),array("A"),blank(0),0) )
{
	storedata('7.3.45-5','sa',0);
}
/* abhASitapuMskAcca (7.3.48) and AdAcAryANAm (7.3.49) */
elseif ($gender==="f" && $Ap===1 && $_GET['cond2_11_1']==="3" )
{
    $text = two(array("aka","ak"),array("A"),array("ika","ik"),array("A"),1);
	storedata('7.3.48','sa',0);
    $text = two(array("aka","ak"),array("A"),array("Aka","Ak"),array("A"),1);
	storedata('7.3.49','sa',0);
}
/* udIcAmAtaH sthAne yakapUrvAyAH (7.3.46) */
elseif ($gender==="f" && $Ap===1 && $_GET['cond2_13_2']==="1" )
{
    $text = two(array("yaka","kaka","yak","kak"),array("A"),array("yika","kika","yik","kik"),array("A"),1);
	storedata('7.3.46','sa',0);
}
/* dhAtvantayakostu nityam (vA 4536) */
elseif ($gender==="f" && $Ap===1 && $_GET['cond2_13']==="1" )
{
    $text = two(array("yaka","kaka","yak","kak"),array("A"),array("yika","kika","yik","kik"),array("A"),0);
	// pending to refactor
/*    echo "<p class = sa >By dhAtvantayakostu nityam (vA 4536) :</p>\n";
    echo "<p class = sa >धात्वन्तयकोस्तु नित्यम्‌ (वा ४५३६) :</p>\n";
    display(0);*/
}
/* tyakanazca niSedhaH (vA 4526) */
elseif ($gender==="f" && $Ap===1 && $_GET['cond2_12']==="2" )
{
	storedata('7.3.45-1','st',0);
}
/* AziSi vunazca (vA 4528) */
elseif ($gender==="f" && $Ap===1 && $_GET['cond2_11_1']==="1" )
{
	storedata('7.3.45-3','st',0);
}
/* uttarapadalope na (vA 4529) */
elseif ($gender==="f" && $Ap===1 && $_GET['cond2_11_1']==="2" )
{
	storedata('7.3.45-4','st',0);
}
/* tArakA jyotiSi (vA 4531) */
elseif ($gender==="f" && $Ap===1 && sub(array("tAraka","tArak"),array("A"),blank(0),0) )
{
    $text = one(array("tArakaA","tArakA"),array("tArikaA","tArikA"),1);
	storedata('7.3.45-6','st',0);
}
/* varNakA tAntave (vA 4532) */
elseif ($gender==="f" && $Ap===1 && sub(array("varRaka","varRak"),array("A"),blank(0),0) )
{
    $text = one(array("varRakaA","varRakA"),array("varRikaA","varRikA"),1);
	storedata('7.3.45-7','st',0);
}
/* vartakA zakunau prAcAm (vA 4533) */
elseif ($gender==="f" && $Ap===1 && sub(array("vartaka","vartak"),array("A"),blank(0),0) )
{
    $text = one(array("vartakaA","vartakA"),array("vartikaA","vartikA"),1);
	storedata('7.3.45-8','st',0);
}
/* aSTakA pitRdevatye (vA 4534) */
elseif ($gender==="f" && $Ap===1 && sub(array("azwaka","azwak"),array("A"),blank(0),0) )
{
    $text = one(array("azwakaA","azwakA"),array("azwikaA","azwikA"),1);
	storedata('7.3.45-9','st',0);
}
/* sUtakAputrikAvRndArakANAM veti vaktavyam (vA 4535) */
elseif ($gender==="f" && $Ap===1 && sub(array("sUtaka","sUtak","vfndAraka","vfndArak","putrika","putrik"),array("A"),blank(0),0) )
{
    $text = two(array("sUtaka","sUtak","vfndAraka","vfndArak","putrika","putrik"),array("A"),array("sUtika","sUtik","vfndArika","vfndArik","putraka","putrak"),array("A"),1);
	storedata('7.3.45-10','st',0);
}
/* bhastraiSAjAjJAdvAsvA naJpUrvANAmapi (7.3.47) */
// in these words, words ending with these words can also apply this rule.
elseif ($gender==="f" && $Ap===1 && sub(array("Bastraka","Bastrak","ajaka","ajak","jYaka","jYak","svaka","svak"),array("A"),blank(0),0) )
{
    $text = two(array("Bastraka","Bastrak","ajaka","ajak","jYaka","jYak","svaka","svak"),array("A"),array("Bastrika","Bastrik","ajika","ajik","jYika","jYik","svika","svik"),array("A"),1);
	storedata('7.3.47','sa',0);
}
/* bhastraiSAjAjJAdvAsvA naJpUrvANAmapi (7.3.47) */
// in these words, the word itself only has to be checked.
elseif ($gender==="f" && $Ap===1 && in_array($fo,array("ezaka","ezak","dvaka","dvak")))
{
    $text = two(array("ezaka","ezak","ajaka","ajak","jJaka","jJak","dvaka","dvak"),array("A"),array("ezika","ezik","ajika","ajik","jJika","jJik","dvika","dvik"),array("A"),1);
	storedata('7.3.47','sa',0);
}
/* bhastraiSAjAjJAdvAsvA naJpUrvANAmapi (7.3.47) */
// patch to prevent application to words ending with eSaka and dvaka.
elseif ($gender==="f" && $Ap===1 && ends(array($fo),array("ezaka","ezak","dvaka","dvak"),0))
{
}
/* mAmakanarakayorupasaGkhyAnam (vA 4524) */
elseif ($gender==="f" && $Ap===1 && sub(array("mAmaka","naraka"),array("A"),blank(0),0) && $_GET['cond2_11']==="1" )
{
    $text = one(array("mAmakaA","narakaA"),array("mAmikaA","narikaA"),0);
	storedata('7.3.44-4','st',0);
}
/* tyaktyapozca (vA 4525) */
elseif ($gender==="f" && $Ap===1 && sub(array("dAkziRAtyaka","pAzcAtyaka","pOrastyaka","amAtyaka","ihatyaka","kvatyaka","itastyaka","tatastyaka","kutastyaka","bahutastyaka","tatratyaka","atratyaka","yatratyaka","bahutratyaka","nityaka","nizwyaka","Avizwyaka",),array("A"),blank(0),0) && $_GET['cond2_12']==="1" )
{
    $text = one(array("tyakaA"),array("tyikaA",),0);
	storedata('7.3.44-5','st',0);
}
/* na yAsayoH (7.3.45) */
elseif ($gender==="f" && $Ap===1 && sub(array("yaka","saka","taka"),array("A"),blank(0),0) && in_array($fo,array("yaka","saka","yak","sak","taka","tak")))
{
	storedata('7.3.45','sa',0);
}
/* pratyayasthAtkAtpUrvasyAta idApyasupaH (7.3.44) */
elseif ($gender==="f" && $Ap===1 && sub(array("aka","ak"),array("A"),blank(0),0) && ($_GET['cond2_11']==="1"||$_GET['cond2_13_2']==="2") )
{
    $text = one(array("akaA","akA"),array("ikaA","ikA"),0);
	storedata('7.3.44','sa',0);
}
if ($debug===1) {dibug("7200");}

/* AyaneyInIyiyaH phaDhakhaCaghAM pratyayAdInAm (7.1.2) */
if(arr($text,'/\+[PQKCG]a\+/'))
{
    $text = one(array("+Pa+","+Qa+","+Ka+","+Ca+","+Ga+"),array("+Ayana+","+eya+","+Ina+","+Iya+","+iya+"),0);
	storedata('7.1.2','sa',0);
}
/* patch for akaH savarNe dIrghaH in TAp, DAp, cAp */
if ($TAp===1 || $DAp===1 || $cAp===1 )
{
    /* akaH savarNe dIrghaH (6.1.101) */ 
    if (sub($ak1,$ak2,blank(28),1))
    {
    $text = two(array("a","A"),array("a","A"),array("A","A"),blank(2),0);
	storedata('6.1.101','sa',0);
    }    
}

/* dRnkarapunaHpUrvasya bhuvo yaN vaktavyaH (vA 4118) */ 
if ($dhatu===1 && in_array($fo,array("dfnBU","karaBU","kAraBU","punarBU")) && in_array($so,$sup))
{
 $dRnkar=1; // 0 - the word doesn't belong to dRnbhU, karabhU etc. 1 - the word belongs to dRnbhU, karabhU etc.
} else {$dRnkar=0; } 
/* yU stryAkhyau nadI (1.4.3) and prathamaliGgagrahaNaJca (vA 1036) */
// the vArtika is not coded perfectly. Also stryAkhyo is pending.
if ($gender === "f" && !in_array($fo,array("stri")) && arr($text,'/[iu][+][N]/') && in_array($so,array("Ne","Nasi!","Nas","Ni")) && $dRnkar===0) // this was commented because it gave nadisaJjJA to priyatri - priyAH tisraH yasya saH.
{   
	storedata('1.4.6','pa',0);
    $nadi = 2; // Giti vA.
}
if ($gender === "f" && !in_array($fo,array("strI")) && arr($text,'/[IU][+][N]/') && $nityastri===1 && in_array($so,array("Ne","Nasi!","Nas","Ni")) && $dRnkar===0 && $dhatu===1 && ( $eranekaca===0 && anekAca($fo) || ends(array($fo),array("BrU"),1)) ) // this was commented because it gave nadisaJjJA to priyatri - priyAH tisraH yasya saH.
//if ($gender === "f" && !in_array($fo,array("strI")) && (arr($text,'/[iuIU][+][N]/')  && $nityastri===1) && in_array($so,array("Ne","Nasi!","Nas","Ni")) && $dRnkar===0)
{   
	storedata('1.4.6','pa',0);
    $nadi = 2; // Giti vA.
}
elseif ( $gender==="f" && !in_array($fo,array("stri","strI")) && $dhatu===1 && arr($text,'/[IU][+][A][m]$/') && $nityastri===1 && $dRnkar===0 && $dhatu===1 && ( $eranekaca===0 && anekAca($fo) || ends(array($fo),array("BrU"),1)))
{
	storedata('1.4.5','pa',0);
    $nadi = 2;
}
//elseif ( $gender==="f" && !in_array($fo,array("stri","strI")) && $dhatu===1 && arr($text,'/[IU][+]/') && $dRnkar===0 && $eranekaca!==2 && !in_array($so,array("su!","ByAm","Bis","sup")))
elseif ( $gender==="f" && !in_array($fo,array("stri","strI")) && $dhatu===1 && arr($text,'/[IU][+]/') && $dRnkar===0 && $eranekaca!==2 )
{
	storedata('1.4.4','pa',0);
    $nadi = 0;
}
elseif ( (( arr($text,'/[IU][+]/') && $nityastri===1) || in_array($fo,array("bahuSreyasI","aticamU"))))
{
    if (in_array($fo,array("bahuSreyasI","aticamU")))
    {
		storedata('1.4.3','pa',0);
		storedata('1.4.3-2','pa',0);
    }
    else
    {
		storedata('1.4.3','pa',0);
    }
    $nadi = 1;
}
/* abhyasta definition */
if ($_GET['cond1_17_2']==="1")
{
    $abhyasta=1;
    $shatR=1;
}
/* jakSityAdayaH SaT (6.1.6) */
if (arr($text,'/[zrsy]at/') && sub(array("jakzat","jAgrat","daridrat","SAsat","cakAsat","dIDyat","vevyat"),blank(0),blank(0),0))
{
    $abhyasta=1; 
    $jaksat=1; // 0 - doesn't belong to jakSityAdi. 1 - belongs to jakSityAdi.
	storedata('6.1.6','pa',0);
} else { $jaksat=0; } // when the variables which are not initialised are used, we keep this else box. Otherwise for future uses, $jaksat will be null and PHP will send notices to browser.
/* ubhe abhyastam (6.1.5) */
if ($abhyasta===1 && $jaksat===0 && $ubheabhyasta!==1)
{
	storedata('6.1.5','pa',0);
}
/* tyadAdiSu dRSo'nAlocane kaJca (3.2.60) */
if (arr($text,'/dfS/') && sub($tyadadi,array("dfS"),blank(0),0) )
{
	storedata('3.2.60','pa',0);
	$kvin=1;
}
/* kvin pratyaya from asRj */
if ( $fo==="asfj"  && in_array($so,$sup) )
{
	// Pending to refactor.
/*    echo "<p class = pa >asRj has kutva at padAnta, because of mandate of kvin pratyaya after sRj. </p>\n";
    echo "<p class = pa >असृजः पदान्ते कुत्वम्‌, सृजेः क्विनो विधानात्‌ ।</p>\n";
    display(0); */
	$kvin=1;
}
/* no kvin pratyaya from viSvasRj */
if ( $fo==="viSvasfj"  && in_array($so,$sup) )
{
	// Pending to refactor.
/*	echo "<p class = pa >'rajjusRDbhyAm' usage in bhASya under 'sRjidRSoH' sUtra mandates that there will be no kutva here.</p>\n";
    echo "<p class = pa >विश्वसृड्‌ इत्यादौ तु कुत्वं न । 'सृजिदृशोः' इति सूत्रे 'रज्जुसृड्भ्याम्‌' इति भाष्यप्रयोगात्‌ ।</p>\n";
    display(0); */
	$kvin=0;
}
/* spRSo'nudake kvin (3.2.58) */
if ( arr($tex,'/spfS\+/'))
{
	storedata('3.2.58','pa',0);
	$kvin=1;
}
if ($debug===1) {dibug("7300");}
/* Defining $vasu */
if (arr($text,'/vas\+/') && sub(array("vidvas","sedivas","uzivas","Suzruvas","upeyivas","anASvas"),array("+"),blank(0),0) )
{
    $text = two(array("vidvas","sedivas","uzivas","Suzruvas","upeyivas","anASvas"),array("+"),array("vidvasu!","sedivasu!","uzivasu!","Suzruvasu!","upeyivasu!","anASvasu!"),array("+"),0);
	// Pending to refactor
/*    echo "<p class = pa >This is a vasvanta word.</p>\n";
    echo "<p class = pa >यह एक वस्वन्त शब्द है ।</p>\n";
    display(0); */
	$vasu=1;
}
/* dRnkarapunaHpUrvasya bhuvo yaN vaktavyaH (vA 4118) */ 
if ($dhatu===1 && in_array($fo,array("dfnBU","karaBU","kAraBU","punarBU")) && (in_array($so,array("Ne","Nasi!","Nas","Ni")) || ($sambuddhi===1 && $so==="su!") ) && arr($text,'/[U][+]['.pc('ac').']/'))
{
	// Pending to refactor
//    echo "<p class = pa >By dRnkarapunaHpUrvasya bhuvo yaN vaktavyaH (vA 4118), yaN bars application of iyaG,uvaG. Therefore, nadIkAryas will happen. :</p>\n";
    $nadi=1;
    if (in_array($fo,array("karaBU","kAraBU")))
    {
//    echo "<p class = hn >There is pAThabheda here. Some hold that there is dIrgha kAra word here. SK has adopted both the readings, therefore we have kept them optional.</p>\n";        
    $nadi=2;
    }
//    echo "<p class = pa >दृन्करपुनःपूर्वस्य भुवो यण्‌ वक्तव्यः (वा ४११८) द्वारा प्राप्त यण्‌ - इयङ्‌/उवङ्‌ का बाधन करता है । अतः नदीकार्य होंगे ।</p>\n";
    if (in_array($fo,array("karaBU","kAraBU")))
    {
//    echo "<p class = hn >दीर्घपाठे करपूर्वस्य उवङेव । ह्रस्वपाठे करपूर्वस्य यणेव इति विवेकः ।</p>\n";        
    }
//    display(0); 
}
/* adDDatarAdibhyaH paJcabhyaH (7.1.25) and ekatarAtpratiSedho vaktavyaH (vA 4287) */
if (arr($text,'/ekatara\+/') && sub(array("ekatara"),array("+"),array("su!","am"),0) && $gender==="n")
{
	storedata('7.1.26-1','pa',0);
	$ekatara=1; // 0 - the word is not ekatara. 1 - the word is ekatara. This will be useful in adDDatarAdibhyaH paJcabhyaH (7.1.25).
} else {$ekatara=0; }
if (arr($text,'/a\+/') && sub(array("atara","atama","anya","anyatara","itara"),array("+"),array("su!","am"),0) && $gender==="n" && $ekatara===0)
{
    $text = two(array("a+",),array("su!","am"),array("a+"),array("adq","adq"),0);
	storedata('7.1.25','sa',3);
    $Dit = 1; // 0 - 'D' is not it. 1 - 'D' is it.
    $adD=1; // 0 - adD suffix has not been applied. 1 - adD suffix is applied.
} else {$adD = 0; $Dit =0;}
/* maghavA bahulam (6.4.128) */
if (arr($text,'/maGavan\+/') && in_array($so,$sup))
{
    $text = two(array("maGavan"),array("+"),array("maGavatf!"),array("+"),1);
	storedata('6.1.128','sa',3);
    $it = array_merge($it,array("f")); 
    $itprakriti = array_merge($itprakriti,array("f")); 
}
/* arvaNastrasAvanaJa (6.4.127) */
if (arr($text,'/arvan\+/') && in_array($so,$sup) && $fo!=="anarvan" && $so!=="su!")
{
    $text = two(array("arvan"),array("+"),array("arvatf!"),array("+"),0);
	storedata('6.4.127','sa',3);
    $it = array_merge($it,array("f")); 
    $itprakriti = array_merge($itprakriti,array("f")); 
}
if (arr($text,'/arvan\+/') && in_array($so,$sup) && ($fo=="anarvan" || $so!=="su!"))
{
	// Pending to refactor
/*    echo "<p class = pa >'tR' Adeza of arvaNastrasAvanaJa (".link_sutra("6.4.127").") doesnt apply here. </p>\n";
    echo "<p class = pa >अर्वणस्त्रसावनञः (६.४.१२७) का 'तृ' आदेश यहाँ नहीं होता है ।</p>\n";
    display(0); */
}
/* patch for dRz */
if (arr($text,'/dfS\+/'))
{
    $kvip=1;
    $kvin=1;
}
/* RtvigdadhRksragdiguSNigaJcuyujikruJcAM ca (3.2.59) */
if (sub(array("ftvij","daDfz","sraj","diS","zRih","aYcu","yuj","kruYc","anc","Anc","aYc","AYc","krunc"),array("+"),blank(0),0))
{
    $kvin=1;
	storedata('3.2.59','sa',3);
}
/* rAyo hali (7.2.85) */
if (arr($text,'/rE\+/') && sub(array("rE"),array("+"),$hlsup,0) && in_array($so,$hlsup) && !($gender==="n" && $so==="su!") )        
{
    $text = two(array("rE"),array("+"),array("rA"),array("+"),0);
	storedata('7.1.85','sa',3);
    $rayo=1; // 0 - rAyo hali has not applied. 1 - rAyo hali has applied. Useful in hrasvo napuMsake prAtipadikasya (1.2.47).
} else {$rayo = 0; }
/* hrasvo napuMsake prAtipadikasya (1.2.47) */
$achrasva= array("a","a","i","i","u","u","f","f","x","x","i","u","i","u",);
if (arr($text,'/['.pc('ac').']\+/') && $gender==="n" && in_array($so,$sup)  && $rayo===0)
{
    if (arr($text,'/[eoEO]\+/'))
    {
	storedata('1.1.48','pa',0);
    $text = two($ac,array("+"),$achrasva,array("+"),0);        
	storedata('1.2.47','sa',0);
    }
    elseif($bhashitapumska===1 && in_array($so,$tRtIyAdiSvaci))
    {
    $text = two($ac,array("+"),$achrasva,array("+"),1);        
	storedata('1.2.47','sa',0);
    }
    else
    {
    $text = two($ac,array("+"),$achrasva,array("+"),0);        
	storedata('1.2.47','sa',0);
    }
}
if ($debug===1) {dibug("7400");}

/* ato'm (7.1.24) */
if ( $gender==="n" && $adD ===0 && sub(array("a"),array("+"),array("su!","am"),0) )
{
    $text = two(array("a+",),array("su!","am"),array("a+"),array("am","am"),0);
	storedata('7.1.24','sa',0);
	$atom=1;
} else { $atom =0; }
/* defining whether the first word is asmad / yuzmad */
if (arr($text,'/[sz]mad/') && sub(array("asmad","yuzmad"),array("+"),blank(0),0) && in_array($so,$sup))
{
    $asmad=1; // 0 - the word doesn't end with asmad / yuSmad. 1 - the word ends with asmad / yuSmad.
}
else
{
    $asmad=0;
}
/* Whole replacements for asmad / yuSmad */
/* yuSmadasmadoH SaSThIcaturthIdvitIyAsthayorvAMnAvau (8.1.20) */
if ( in_array($w,array(4,10,16)) && $asmadpada>0 && arr($text,'/[zs]mad\+/') && sub(array("asmad","yuzmad"),array("+"),blank(0),0) )
{
    if($asmadpada===2)
    {
    $text = two(array("yasmad+","asmad+","yuzmad+"),array("Ow","ByAm","os"),array("inO","nO","vAm"),array("","",""),1);        
    }
    else
    {
    $text = two(array("yasmad+","asmad+","yuzmad+"),array("Ow","ByAm","os"),array("inO","nO","vAm"),array("","",""),0);        
    }
	storedata('8.1.20','sa',7);
}
/* bahuvacanasya vasnasau (8.1.21) */
if ( (in_array($so,array("Sas","Am")) || (in_array($so,array("Byas")) && $w===11)) && $asmadpada>0 &&arr($text,'/[zs]mad\+/') &&  sub(array("asmad","yuzmad"),array("+"),blank(0),0) )
{
    if ($asmadpada===2)
    {
    $text = two(array("yasmad+","asmad+","yuzmad+"),array("Sas","Byas","Am"),array("inas","nas","vas"),array("","",""),1);        
    }
    else
    {
    $text = two(array("yasmad+","asmad+","yuzmad+"),array("Sas","Byas","Am"),array("inas","nas","vas"),array("","",""),0);        
    }
	storedata('8.1.21','sa',7);
}
/* temayAvekavacanasya (8.1.22) */
if (arr($text,'/[zs]mad\+/')  && in_array($so,array("Ne","Nas")) && $asmadpada>0 && sub(array("asmad","yuzmad"),array("+"),blank(0),0))
{
    if ($asmadpada===2)
    {
    $text = two(array("yasmad+","asmad+","yuzmad+"),array("Ne","Nas"),array("ime","me","te"),array("",""),1);        
    }
    else
    {
    $text = two(array("yasmad+","asmad+","yuzmad+"),array("Ne","Nas"),array("ime","me","te"),array("",""),0);        
    }
	storedata('8.1.22','sa',7);
}
/* tvAmau dvitIyAyAH (8.1.23) */ 
if ( in_array($so,array("am")) && $asmadpada>0 && arr($text,'/[zs]mad\+/')  && sub(array("asmad","yuzmad"),array("+"),blank(0),0) )
{
    if ($asmadpada===2)
    {
    $text = two(array("yasmad+","asmad+","yuzmad+"),array("am"),array("imA","mA","tvA"),array(""),1);        
    }
    else
    {
    $text = two(array("yasmad+","asmad+","yuzmad+"),array("am"),array("imA","mA","tvA"),array(""),0);        
    }
	storedata('8.1.23','sa',7);
}
/* pratyaya Adeza for yuSmad / asmad */
/* yuSmadasmadbhyAM Gaso'z (7.1.27) */
if ( in_array($so,array("Nas")) && arr($text,'/[zs]mad\+/')  && sub(array("asmad","yuzmad"),array("+"),blank(0),0) )
{
    $text = two(array("+"),array("Nas"),array("+"),array("a"),0);
	storedata('7.1.27','sa',3);
}
/* Geprathamayoram (7.1.28) */
if ( in_array($so,array("Ne","su!","Ow","O","jas","am")) && arr($text,'/[zs]mad\+/')  && sub(array("asmad","yuzmad"),array("+"),blank(0),0) )
{
    $text = two(array("+"),array("Ne","su!","Ow","O","jas","am"),array("+"),array("am","am","am","am","am","am"),0);
	storedata('7.1.28','sa',3);
}
/* zaso na (7.1.29) */
if ( in_array($so,array("Sas")) && arr($text,'/[zs]mad\+/')  && sub(array("asmad","yuzmad"),array("+"),blank(0),0) )
{
    $text = two(array("+"),array("Sas"),array("+"),array("ns"),0);
	storedata('7.1.29','sa',3);
}
/* bhyaso bhyam (7.1.30) */
if (in_array($so,array("Byas")) && $w===11 && arr($text,'/[zs]mad\+/')  && sub(array("asmad","yuzmad"),array("+"),blank(0),0) )
{
    $text = two(array("+"),array("Byas"),array("+"),array("aByam"),0);
	storedata('7.1.30','sa',3);
}
if ($debug===1) {dibug("7500");}
/* paJcamyA at (7.1.32) */
if ( in_array($so,array("Byas")) && $w===14 && arr($text,'/[zs]mad\+/')  && sub(array("asmad","yuzmad"),array("+"),blank(0),0) )
{
    $text = two(array("+"),array("Byas"),array("+"),array("at"),0);
	storedata('7.1.32','sa',3);
}
/* ekavacanasya ca (7.1.32) */
if (in_array($so,array("Nasi!")) && arr($text,'/[zs]mad\+/') && sub(array("asmad","yuzmad"),array("+"),blank(0),0) )
{
    $text = two(array("+"),array("Nasi!"),array("+"),array("at"),0);
	storedata('7.1.32','sa',3);
}
/* prakRti Adezas for asmad / yuSmad */
/* yo'ci (7.2.89) */
if ( in_array($so,array("wA","Ni","os")) && arr($text,'/[zs]mad\+/') && sub(array("asmad","yuzmad",),array("+"),blank(0),0) )
{
    $text = two(array("asmad","yuzmad",),array("+"),array("asmay","yuzmay",),array("+"),0);
	storedata('7.2.89','sa',3);
}
/* yuSmadasmadoranAdeze (7.2.86) */
if (in_array($so,array("ByAm","Bis","sup")) && arr($text,'/[zs]mad\+/') && sub(array("asmad","yuzmad"),array("+"),$tRtIyAdi,0) )
{
    $text = two(array("asmad","yuzmad",),array("+"),array("asmaA","yuzmaA"),array("+"),0);
	storedata('7.2.86','sa',3);
}
/* dvitIyAyAJca (7.2.87) */
if ( in_array($so,array("am","Ow","Sas")) && arr($text,'/[zs]mad\+/') && sub(array("asmad","yuzmad"),array("+"),blank(0),0) )
{
    $text = two(array("asmad","yuzmad",),array("+"),array("asmaA","yuzmaA"),array("+"),0);
	storedata('7.2.87','sa',3);
	storedata('7.2.91','pa',3);
}
/* zeSe lopaH (7.2.90) */
// strIliGga of asmad and yuSmad still pending to be clarified.
if (in_array($so,array("su!","jas","Ne","Byas","Nasi!","Nas","Am")) && arr($text,'/[zs]mad\+/') && sub(array("asmad","yuzmad"),array("+"),blank(0),0) )
{
    $text = two(array("asmad","yuzmad"),array("+"),array("asma","yuzma"),array("+"),0);  
	storedata('7.2.90','sa',3);
}
/* maparyantasya Adezas for asmad / yuSmad */
/* yUyavayau jasi (7.2.93) */
if ( $asmad===1 && in_array($so,array("jas")) && sub(array("asm","yuzm"),array(""),blank(0),0) )
{
    $text = one(array("yasm","asm","yuzm"),array("ivaya","vaya","yUya"),0); // for function one please see function.php.
	storedata('7.2.93','sa',3);
	storedata('7.2.91','pa',3);
}
/* tvAhau sau (7.2.94) */
if ($asmad===1 && in_array($so,array("su!")) && sub(array("asm","yuzm"),array(""),blank(0),0) )
{
    $text = one(array("asm","yuzm"),array("aha","tva"),0);
	storedata('7.2.94','sa',3);
	storedata('7.2.91','pa',3);
}
/* tubhyamahyau Gayi (7.2.95) */
if ( $asmad===1 && in_array($so,array("Ne")) && sub(array("asm","yuzm"),array(""),blank(0),0) )
{
    $text = one(array("yasm","asm","yuzm"),array("imahya","mahya","tuBya"),0);
	storedata('7.2.94','sa',3);
	storedata('7.2.91','pa',3);
}
/* tavamamau Gasi (7.2.96) */
if ($asmad===1 && in_array($so,array("Nas")) && sub(array("asm","yuzm"),array(""),blank(0),0) )
{
    $text = one(array("yasm","asm","yuzm"),array("imama","mama","tava"),0);
	storedata('7.2.96','sa',3);
	storedata('7.2.91','pa',3);
}
/* tvamAvekavacane (7.2.97) */
if ( $asmad===1 && (in_array($so,array("am","wA","Nasi!","Ni")) && (in_array($fo,array("asmad","yuzmad"))  ) || $_GET['cond1_11']==="1") && sub(array("asm","yuzm"),array(""),blank(0),0) )
{
    $text = one(array("yasm","yuzm","asm"),array("ima","tva","ma"),0);
	storedata('7.2.97','sa',3);
	storedata('7.2.91','pa',3);
}
/* yuvAvau dvivacane (7.2.92) */
if ($asmad===1 && ((in_array($so,$dvisup) && in_array($fo,array("asmad","yuzmad")))  || $_GET['cond1_11']==="2") && sub(array("asm","yuzm"),array(""),blank(0),0) )
{
    $text = one(array("asm","yuzm"),array("Ava","yuva"),0);
	storedata('7.2.92','sa',3);
	storedata('7.2.91','pa',3);
}
/* ato guNe patch */
// Because ato guNe sometimes interferes with akaH savarNe dIrghaH, it is treated specially wherever it is applicable.
if ($asmad===1 && sub(array("aa","a+aByam","a+at","tava+a","mama+a","Ava+aByam","yuva+aByam","Ava+at","yuva+at"),blank(0),blank(0),0))
{
    $text = one(array("aa",),array("a"),0);
    $text = two(array("asma+aByam","yuzma+aByam","ma+aByam","tva+aByam","Ava+aByam","yuva+aByam"),array(""),array("asm+aByam","yuzm+aByam","m+aByam","tv+aByam","Av+aByam","yuv+aByam"),array(""),0);
    $text = two(array("asma+at","yuzma+at","tva+at","ma+at","tava+a","mama+a","Ava+at","yuva+at"),array(""),array("asm+at","yuzm+at","tvat","mat","tava","mama","Av+at","yuv+at"),array(""),0);
	storedata('6.1.96','sa',3);
}
/* prathamAyAzca dvivacane bhASAyAm (7.2.88) */
if (in_array($so,array("O")) && $asmad===1 && sub(array("Avad","yuvad","imad","itvad","asmad","yuzmad"),array("+"),blank(0),0) )
{
    $text = two(array("Avad","yuvad","imad","itvad","asmad","yuzmad"),array("+"),array("AvaA","yuvaA","imaA","itvaA","asmaA","yuzmaA"),array("+"),0);
	storedata('7.2.88','sa',3);
}
if ($debug===1) {dibug("7600");}
/* aGgakArye kRte punarnAGgakAryam (pa 93) */
if ($so==="jas" && arr($text,'/ya\+/') && sub(array("vaya","yUya"),array("+"),array("am"),0) )
{
	storedata('par@92','pa',0);
	$nojas=1;   
} else { $nojas=0; }
/* idamo maH (7.2.108) */
if ($so==="su!" && arr($text,'am\+') && sub(array("idam","idakam"),array("+"),blank(0),0) )
{
	storedata('7.2.108','sa',3);
    /* ido'y puMsi (7.2.111) */
    if ( $so==="su!" && $gender==="m" && sub(array("idam","idakam"),array("+"),blank(0),0) )
    {
        $text = two(array("idam","idakam"),array("+"),array("ayam","ayakam"),array("+"),0);
		storedata('7.2.111','sa',3);
    } 
    $idamoma=1; // 0 - idamo maH has not applied. 1 - idamo maH has applied. useful in tyadAdInAmaH.
} else { $idamoma=0; }
/* yaH sau (7.2.110) */
if ($so==="su!" && $gender==="f" && arr($text,'/am\+/') && sub(array("idam","idakam"),array("+"),blank(0),0) )
{
    $text = two(array("idam"),array("+"),array("iyam"),array("+"),0);
	storedata('7.2.110','sa',3);
}
/* anvAdeze napuMsake enadvaktavyaH (vA 1569) */
if (in_array($fo,array("idam","etad","idakam")) && $anvadesha===1 && in_array($so,array("am")) && $gender==="n" && sub(array("idam+","etad+","idakam+",),blank(0),blank(0),0) )
{
    $text = one(array("idam+","etad+","idakam+",),array("enad+","enad+","enad",),0);
	storedata('8.1.26-1','sa',3);
}
/* svamornapuMsakAt (7.1.23) */
if ( $gender==="n" && in_array($so,array("su!","am")) && $atom===0 && $adD ===0 )
{
    $text = two(array("+"),array("su!","am"),array("+"),array("",""),0);
	storedata('7.1.23','sa',3);
    $svamo = 1; // 0 - su / am have not been elided. 1 - su / am have been elided. Useful in many places like na lumatAGgasya etc.
    $pada="pada"; // when these su / am are elided, the word gets pada saJjJA, because there is no pratyaya remaining after that.
} else { $svamo = 0; }
/* kimaH kaH (7.2.103) */
if (in_array($fo,array("kim")) && !arr($text,'/[k][i][m][+]$/') && in_array($so,$sup) && sub(array("kim","kaka"),array("+"),blank(0),0) )
{
    $text = two(array("kim","kaka"),array("+"),array("ka","ka"),array("+"),0);
	storedata('7.2.103','sa',3);
	$sarvafinal=1;
}
if (arr($text,'/[k][i][m][+]$/') && in_array($so,$sup) && sub(array("kim","kaka"),array("+"),blank(0),0) )
{
	// Pending to refactor
/*    echo "<p class = pa >na lumatA'Ggasya prevents application of kimaH kaH (".link_sutra("7.2.103").") :</p>\n";
    echo "<p class = pa >न लुमताऽङ्गस्य से किमः कः (७.२.१०३) का बाध होता है ।</p>\n";
    display(0);*/
}

/* aSTana A vibhaktau (7.2.84) */ 
if (arr($text,'/zwan/') && sub(array("zwan"),array("su!"),blank(0),0) && $_GET['cond1_8']==="1")
{
    $text = two(array("zwan"),array("su!"),array("zwaA"),array("su!"),1);
	storedata('7.2.84','sa',3);
    $astana=1; // 0 - this sUtra has not applied. 1 - aSTana A vibhaktau has applied. useful in na lopaH prAtipadikAntasya.
}
elseif (arr($text,'/zwan/') && (sub(array("zwan"),$hlsup,blank(0),0) || (sub(array("zwan"),array("jas","Sas"),blank(0),0) && $_GET['cond1_8']==="2")) )
{
    $text = two(array("zwan"),$hlsup,array("zwaA"),$hlsup,1);
    $text = two(array("zwan"),array("jas","Sas"),array("zwaA"),array("jas","Sas"),1);
	storedata('7.2.84','sa',3);
    $astana=1; 
} else { $astana=0; }
/* aSTAbhya auz (7.1.21) */
if (arr($text,'/zwaA/') && sub(array("zwaA"),array("jas","Sas"),blank(0),0) && ( ($samasa ===1 && $pradhana===1) || $samasa===0 ))
{
    $text = two(array("zwaA"),array("jas","Sas"),array("zwaA"),array("O","O"),0);
	storedata('7.1.21','sa',3);
}

/* pratyayasya lukzlulupaH (1.1.61) */
/* SaDbhyo luk (7.1.22) */
if ( $shat === 1 && in_array($so,array("jas","Sas")) && ( ($samasa ===1 && $pradhana===1) || $samasa===0 ))
{
    $text = two(array("+"),array("jas","Sas"),array("+"),blank(2),0);
	storedata('7.1.22','sa',3);
	storedata('1.1.61','sa',0);
    $luk = 1; // 0 - luk has not happened. 1 - luk has happened.
    $pada="pada"; // when pratyayas are elided, the word gets pada saJjJA, because there is no pratyaya remaining after that.
} else { $luk = 0; }
/* pratyayalope pratyayalakSaNam (1.1.62) and na lumatAGgasya (1.1.63) */
if ($luk === 1 )
{
	// Pending to refactor.
/*    echo "<p class = hn >pratyayalope pratyayalakSaNam (".link_sutra("1.1.62").") is overridden by na lumatAGgasya (".link_sutra("1.1.63").") :</p>\n";
    echo "<p class = hn >प्रत्ययलोपे प्रत्ययलक्षणम्‌ (१.१.६२) का न लुमताङ्गस्य (१.१.६३) से बाध हुआ है । :</p>\n";
    display(0);*/
}
if ($svamo===1 && $gender==="n" && $so==="su!" && $sambuddhi===1)
{
	// Pending to refactor
/*    echo "<p class = hn >pratyayalope pratyayalakSaNam (".link_sutra("1.1.62").") is overridden by na lumatAGgasya (".link_sutra("1.1.63").") optionally.</p>\n";
    echo "<p class = hn >प्रत्ययलोपे प्रत्ययलक्षणम्‌ (१.१.६२) का न लुमताङ्गस्य (१.१.६३) से बाध हुआ है । यह बाध अनित्य है । :</p>\n";
    display(0);*/
}
if ($debug===1) {dibug("7700");}
/* jazzasoH ziH (7.1.20) */
if ($gender === "n" && $pada=== "pratyaya" && in_array($so,array("jas","Sas")) && $luk===0)
{
    $text = last(array("jas","Sas"),array("Si","Si"),0);
	storedata('7.1.20','sa',3);
    $shi = 1; // 0 - zi Adeza has not happened. 1 - zi Adeza has happened.
} else { $shi = 0; }
/* zi sarvanAmasthAnam (1.1.42) */
if ($shi===1 )
{
	storedata('1.1.42','sa',0);
}
/* declaring sarvanamasthana1 variable */
if ( ( in_array($so,$sarvanamasthana) && $gender!=="n") || $shi===1)
{
    $sarvanamasthana1 = 1; 
}
else
{
    $sarvanamasthana1 = 0;
}
/* am sambuddhau (7.1.99) */
if ($so==="su!" && $sambuddhi===1 && sub(array("catur","anaquh"),blank(0),blank(0),0))
{
    $text = one(array("catur+","anaquh+"),array("catuar+","anaquah+"),0);
	storedata('7.1.99','sa',3);
}
/* puMso'suG (7.1.89) */
if ($sarvanamasthana1===1 && arr($text,'/puMs/'))
{
    $text = one(array("puMs+"),array("pumas+"),0);
	storedata('7.1.89','sa',0);
    $it=array_merge($it,array("u")); // puMs is an ugit word.
    $itprakriti=array_merge($itprakriti,array("u"));       
}
/* yujerasamAse (7.1.71) */
if ($fo==="yuj" && $sarvanamasthana1===1 && $samasa===0 && $yuj===1 && sub(array("yuj"),$sup,blank(0),0) )
{
    $text = one(array("yuj",),array("yunj"),0);
	storedata('7.1.71','sa',3);
}
/* A sarvanAmnaH (6.3.91) */
if ( (arr($text,'/df/') || arr($text,'/avatu/')) && sub($sarvanama,array("dfg","dfS","avatu"),blank(0),0) )
{
    $text = two($tyadadi,array("dfS"),antya($tyadadi,"A"),array("dfS"),0);
	storedata('6.3.91','sa',3);
	$Asarva=1;     // 0 - A sarvanAmnaH has not applied. 1 - A sarvanAmnaH has applied.
} else { $Asarva=0; }
/* defining tri variable for tisRcatasR */
if ($_GET["cond2_2_1"]==="1"  )
{
    $tri="f";
}
else 
{
    $tri="m";
} 
/* tricaturoH striyAM tisRcatasR (7.2.99) */
if ( (($tri === "f" && ends(array($fo),array("tri"),1)) || (ends(array($fo),array("catur"),1) && $gender==="f" ) ) && !ends(array($fo),array("stri"),1) && in_array($so,$sup))
{
	storedata('7.2.99','sa',3);
    if ($svamo===1)
    {
//        echo "<p class = hn >By anityatva of na lumatAGgasya paribhASA.</p>\n";
        $text = one(array("tri+","catur+"),array("tisf+","catasf+"),1);
    }
    else
    {
        $text = one(array("tri+","catur+"),array("tisf+","catasf+"),0);
    }
	if ($svamo===1)
    {
//        echo "<p class = hn >न लुमताऽङ्गस्य इति निषेधस्य अनित्यत्वम्‌ ।</p>\n";
    }    
}
if ($gender==="f" && $tri === "f" && ends(array($fo),array("tri","catur"),1) && !ends(array($fo),array("stri"),1) && $svamo===1)
{
    $text = one(array("tri+","catur+"),array("tisf+","catasf+"),1);
	storedata('7.2.99','sa',3);
} 
/* caturanaDuhorAmudAttaH (7.1.98) */
if ($sarvanamasthana1 === 1 && sub(array("catur","anaquh"),blank(0),blank(0),0))
{
    $text = one(array("catur+","anaquh+"),array("catuAr+","anaquAh+"),0);
	storedata('7.1.98','sa',3);
}
/* sAvanaDuhaH (7.1.82) */ 
if (arr($text,'/anaqu[aA]h\+/') && sub(array("anaquAh+","anaquah+"),blank(0),blank(0),0) && $so==="su!" )
{
    $text = one(array("anaquAh+","anaquah+"),array("anaquAnh+","anaquanh+"),0);
	storedata('7.1.82','sa',3);
}
if ($debug===1) {dibug("7800");}
/* jarAyA jarasanyatarasyAm (7.2.101) */
if (arr($text,'/(jar)([aA])[+][a][m]/') && $pada=== "pratyaya"  && $so==="su!" && $gender === "n" )
    {
		// Pending to refactor
/*    echo "<p class = pa >sannipAtaparibhASA prevents application of jarAyA jarasanyatarasyAm.</p>\n";
    echo "<p class = pa >सन्निपातपरिभाषा से जराया जरसन्यतरस्याम्‌ (७.२.१०१) का बाध होता है ।</p>\n";
    display(3);*/
    }
if (arr($text,'/(jar)([aA])[+]/') && in_array($so,$acsup) )
    {
    $text = one(array("jara+","jarA+"),array("jaras+","jaras+"),1);
	storedata('7.2.101','sa',3);
    }
/* paddannomAshRnnizasanyUSandoSanyakaJChakannudannAsaJChasprabhRtiSu (6.1.63) */
// The random examples given under vibhASA GizyoH on page 147 are pending. Will do them after understanding fully. 
// kakuddoSaNI etc are pending. 
$paddanno = array("pAda","danta","nAsikA","mAsa","hfdaya","niSA","asfj","yUza","doz","yakft","Sakft","udaka","Asya");
$paddanno1 = array("pad","dat","nas","mAs","hfd","niS","asan","yUzan","dozan","yakan","Sakan","udan","Asan");
if ( in_array($so,$zasadi) && in_array($fo,$paddanno) && sub($paddanno,array("+"),blank(0),0) )
{
    $text = two($paddanno,array("+"),$paddanno1,array("+"),1);
	storedata('6.1.63','sa',0);
}
/* mAMsapRtanAsAnUnAM mAMspRtsnavo vAcyAH SasAdau vA (vA 3416) */
$mAMsa = array("mAMsa","pftanA","sAnu");
$mAMsa1 = array("mAMs","pft","snu");
if ( in_array($so,$zasadi) && in_array($fo,$mAMsa) && sub($mAMsa,array("+"),array_merge($zasadi,array("Si")),0) )
{
    $text = two($mAMsa,array_merge($zasadi,array("Si")),$mAMsa1,array_merge($zasadi,array("Si")),1);
	storedata('6.1.63-1','sa',0);
}
/* asthidadhisakthyakSNAmanaGudAttaH (7.1.75) */
$asthi = array("asTi","daDi","sakTi","akzi"); // defining an array of asthi, dadhi etc.
$asthi1 = array("asTan","daDan","sakTan","akzan");
if (in_array($so,$tRtIyAdiSvaci) && arr($text,'/[TDz]i\+/') && sub($asthi,array("+"),$tRtIyAdiSvaci,0) )
{
    $text = two($asthi,$tRtIyAdiSvaci,$asthi1,$tRtIyAdiSvaci,0);
	storedata('7.1.75','sa',0);
}
/* saGkhyAvisAyapUrvasyAhnasyAhannanyatarasyAM Gau (6.3.110) */
$sankhyahan = array("ekAhna","dvyahna","tryahna","caturahna","paJcAhna","zaDAhna","saptAhna","azwAhna","navAhna","daSAhna","vyahna","sAyAhna"); // defining an array which satisfies needs of this sUtra.
if (arr($text,'/hna/') && $so==="Ni" && sub($sankhyahan,array("+"),array("Ni"),0))
{
    $text = two(array("hna"),array("+"),array("han"),array("+"),1);
	storedata('6.3.110','sa',0);
}
/* sakhyurasambuddhau (7.1.92) */
if ($sambuddhi===0 && $gender==="f" && arr($text,'saK[iI]\+') && sub(array("saKi","saKI"),array("+"),array("O","jas","am","Ow"),0) )
{
	// Pending to refactor
/*    echo "<p class = pa >vibhaktau liGgaviziSTasyAgrahaNam (pa) overrules prAtipadikagrahaNe liGgaviziSTasyApi grahaNam.  :</p>\n";
    echo "<p class = hn >This bars application of sakhyurasambuddhau. </p>\n";
    echo "<p class = pa >विभक्तौ लिङ्गविशिष्टस्याग्रहणम्‌ (प) से प्रातिपदिकग्रहणे लिङ्गविशिष्टस्यापि ग्रहणम्‌ का निषेध होता है ।</p>\n";
    echo "<p class = hn >इस से सख्युरसम्बुद्धौ का प्रतिषेध होता है ।</p>\n";
    display(0);*/
}            
if ( $_GET['cond1_4_3']!=="3" && $sambuddhi===0 && $_GET['cond1_3_1'] !== "3" && $gender!=="f" && arr($text,'saK[iI]\+') && sub(array("saKi","saKI"),$sarvanamasthana,blank(0),0) )
{   
    $Nidvat = 1; // 0 - no NidvadbhAva. 1 - NidvadbhAva.
	storedata('7.1.92','sa',3);
    if (!in_array($fo,array("saKi","saKI")))
    {
		// Pending to refactor
    /*echo "<p class = hn >anaG and NidvadbhAva are done because of aGga. Therefore, they apply also with tadanta words. </p>\n";
    echo "<p class = hn >अनङ्णिद्वद्भावयोराङ्गत्वात्तदन्तेऽपि प्रवृत्तिः । </p>\n";    */
    }
} else {$Nidvat=0; }
/* anaG sau (7.1.93) and Gicca (1.1.53) */
if ( $so==="su!" && $sambuddhi===0 && $gender==="f" && arr($text,'saK[iI]\+') && sub(array("saKi","saKI"),array("+"),array("su!"),0) )
{
	// Pending to refactor
/*    echo "<p class = pa >vibhaktau liGgaviziSTasyAgrahaNam (pa) overrules prAtipadikagrahaNe liGgaviziSTasyApi grahaNam.  :</p>\n";
    echo "<p class = hn >This bars application of anaG sau. </p>\n";
    echo "<p class = pa >विभक्तौ लिङ्गविशिष्टस्याग्रहणम्‌ (प) से प्रातिपदिकग्रहणे लिङ्गविशिष्टस्यापि ग्रहणम्‌ का निषेध होता है ।</p>\n";
    echo "<p class = hn >इस से अनङ्‌ सौ का प्रतिषेध होता है ।</p>\n";
    display(0);*/
}            
if ($_GET['cond1_4_3']!=="3" && $so==="su!" && $_GET['cond1_3_1'] !== "3" && $sambuddhi===0 && $gender!=="f" && arr($text,'saK[iI]\+') && sub(array("saKi","saKI"),array("+"),array("su!"),0) )
{
    $text = two(array("saKi","saKI"),array("+"),array("saKan","saKan"),array("+"),0);
	storedata('7.1.93','sa',0);
	storedata('1.1.53','sa',0);
    if (!in_array($fo,array("saKi","saKI")))
    {
		// Pending to refactor
/*    echo "<p class = hn >anaG and NidvadbhAva are done because of aGga. Therefore, they apply also with tadanta words. </p>\n";
    echo "<p class = hn >अनङ्णिद्वद्भावयोराङ्गत्वात्तदन्तेऽपि प्रवृत्तिः । </p>\n";    */
    }
}
/* alo'ntyAtpUrva upadhA (1.1.65) */ 
// saJjJA sUtra. Nothing to code here.
/* diva aut (7.1.84) */
if (arr($text,'/div\+su!/'))
{
    $text = one(array("div+"),array("diO+"),0);
	storedata('7.1.84','sa',3);
	// Pending to refactor
/*    echo "<p class = pa >Because it is alvidhi, sthAnivadbhAva doesn't happen and 'halGyAp..' doesn't apply. </p>\n";
    echo "<p class = pa >अल्विधि होने के कारण स्थानिवद्भाव नहीं है । अतः हल्ङ्‍याप्‌.. की प्रवृत्ति नहीं है ।</p>\n";
    display(0);        */
}
if ($debug===1) {dibug("7900");}
/* diva ut (6.1.131) */
// uttarapadatve cApadAdividhau pratiSedhaH (vA) pending.
// dadhisecau example is also pending.
if (arr($text,'/div\+/') && (sub(array("div+"),$hlsup,blank(0),0) || arr($text,'/[d][i][v][+]$/')) )
{
    $text = one(array("div+"),array("diu+"),0);
	storedata('6.1.131','sa',0);
}
/* zeSo ghyasakhi (1.4.7) */
if ($nadi!==1 && arr($text,'/[iu][+]/') && $fo!=="saKi" && !arr($text,'/[iu][+]$/'))
{
    if (arr(array($fo),'/[p][a][t][i]$/') && $fo==='pati')
    {
        $ghi = 0; // 0 - no ghi saJjJA. 1 - ghi saJjJA.
		storedata('1.4.8','pa',0);
    }
    else
    {
    $ghi = 1;
	storedata('1.4.7','sa',0);
    }
}
else
{
    $ghi = 0;
}
/* na mu ne (8.2.3) */ 
//adas + wA -> nAbhAva has to happen. Special case.
if ( $fo==="adas" && $so==="wA" && $gender!=="f")
{
    $text = one(array("adas"),array("amu"),0);
	storedata('8.2.80','sa',0);
	storedata('8.2.3','sa',0);
    $ghi=1;
}

/* yaci bham (1.4.14) and A kaDArAdekA saJjJA (1.4.1) */
// Not coded perfectly. Only for sup pratyayas.
if ($sarvanamasthana1 === 0 && in_array($so,$acsup) && $luk===0 && $svamo===0 )
{
	storedata('1.4.1','pa',0);
	storedata('1.4.14','sa',0);
    $bham=1; // 0 - no bha saJjJA. 1 - bha saJjJA.
} else {$bham = 0; }  
/* svAdiSvasarvanAmasthAne (1.4.17) */
if ($sarvanamasthana1 ===0 && in_array($so,$sup) && $bham!==1 )
{
    $pada="pada"; // this sUtra mandates pada saJjJA in these cases.
	storedata('1.4.17','pa',0);
}
/* SaTcaturbhyazca (7.1.55) */
if (  $_GET['cond1_6_1']==="1")
{
	// Pending to refactor
/*    echo "<p class = pa >'nuT' Agama doesn't happen in case of gauNatva.</p>\n";
    echo "<p class = pa >गौणत्वे तु नुट्‌ नेष्यते ।</p>\n";
    display(0); */
}
elseif ( ($shat===1 || arr(array($fo),'/[c][a][t][u][r]$/')) && $so === "Am" && !in_array($fo,$sarvanama) && ($samasa===0 || $samasa===1 && $pradhana===1) && $_GET['cond1_6_1']!=="1")
{
    $text = one(array("+Am"),array("+nAm"),0);
	storedata('7.1.55','sa',3);
    $Satcatur=1; // 0 - SaTcaturbhyazca has not applied. 1 - SaTcaturbhyazca has applied.
    $pada="pada"; // word gets pada saJjJA.
} else { $Satcatur=0; }
/* patch for aSTana A vibhaktau */
if ( $so === "Am" && ($samasa===0 || ($samasa===1 && $pradhana===1)) && arr($text,'/azwan/') && sub(array("azwan"),array("nAm"),blank(0),0) )
{
    $text = two(array("azwan"),array("+nAm"),array("azwaA"),array("+nAm"),0);
	storedata('7.2.84','sa',3);
}
/* nopadhAyAH (6.4.7) */
if ( arr($text,'/[n][+]/') && $so === "Am" && !in_array($fo,$sarvanama) && ($samasa===0 || ($samasa===1 && $pradhana===1)))
{
    $text = three($ac,array("n"),array("+nAm"),$acdir,array("n"),array("+nAm"),0); // for function three, please see function.php.
	storedata('6.4.7','sa',3);
    $nopadha=1; // 0 - word doesn't have 'n' as upadhA. 1 - word has 'n' as upadhA.
} else { $nopadha=0; }

/* pAdaH pat (6.4.130) */
if (arr($text,'/pAd\+/') && sub(array("pAd"),array("+"),$sup,0) && $bham===1)
{
    $text = two(array("pAd"),$sup,array("pad"),$sup,0);
	storedata('6.4.130','sa',3);
}
/* TeH (6.4.143) */
if ($Dit===1 && $bham===1 )
{   
    $text = Ti(0); // function Ti removes Ti. see function.php for details.
	storedata('6.4.143','sa',3);
}
/* bhasya TerlopaH (7.1.88) */
if (arr($text,'/[Tz]in/') && sub(array("paTin","maTin","fBukzin"),blank(0),blank(0),0) && $bham===1 && !arr($text,'/[i][n][+]$/'))
{
    $text = one(array("paTin","maTin","fBukzin"),array("paT","maT","fBukz"),0);
	storedata('7.1.88','sa',3);
}
if (arr($text,'/[Tz]in\+I/') && sub(array("paTin+I","maTin+I","fBukzin+I",),blank(0),blank(0),0) && $gender==="f" && $bham===1) // patch for supathI.
{
    $text = one(array("paTin+I","maTin+I","fBukzin+I",),array("paTI","maTI","fBukzI"),0);
	storedata('7.1.88','sa',3);
}
if ($debug===1) {dibug("8000");}
/* pathimathyRbhukSAmAt (7.1.85) */
if (arr($text,'/[Tz]in\+/')  && $so==="su!" && $gender==="m" && sub(array("paTin","maTin","fBukzin"),array("+"),blank(0),0))
{
    $text = two(array("paTin","maTin","fBukzin"),array("+"),array("paTiA","maTiA","fBukziA"),array("+"),0);
	storedata('7.1.85','sa',3);
    $pathi=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied. Useful for tho'nthaH (7.1.87).
} else {$pathi=0; } 
/* ito'tsarvanAmasthAne (7.1.85) */
if (arr($text,'/[Tz]i/') && sub(array("paTi","maTi","fBukzi"),blank(0),blank(0),0) && $sarvanamasthana1===1 )
{
    $text = one(array("paTi","maTi","fBukzi"),array("paTa","maTa","fBukza"),0);
	storedata('7.1.85','sa',3);
    $pathi1=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied. Useful for tho'nthaH (7.1.87).
} else {$pathi=0;}
/* tho'nthaH (7.1.87) */
if (arr($text,'/Ta/') && sub(array("paTa","maTa"),blank(0),blank(0),0) && ($pathi===1 || $pathi1===1))
{
    $text = one(array("paTa","maTa",),array("panTa","manTa",),0);
	storedata('7.1.87','sa',3);
}
/* sambuddhau napuMsakAnAM nalopo vA vAcyaH (vA) */
// Pending. Not clear to me.
/* sau ca (6.4.13) */
$noin=array("ahan","Ahan","bahuvftrahan","bahupUzan","bahvaryaman"); // words where inhan.. doesn't apply.
$acdir = array("A","A","I","I","U","U","F","F","F","F","e","o","E","O",);
if ( !in_array($fo,$noin) && in_array($so,array("su!")) && $sambuddhi===0 && arr($text,'/n\+s/') && sub(array("in","han","pUzan","aryaman"),array("+"),array("su!"),0) )
{
    $text = two($ac,array("n+"),$acdir,array("n+"),0);
	storedata('6.4.13','sa',3);
    if (arr($text,'/vIn\+/'))
    {
		// Pending to refactor
/*    echo "<p class = pa >By 'aninasmangrahaNAni arthavatA cAnarthakena ca tadantavidhiM prayojayanti' (pa) :</p>\n";
    echo "<p class = pa >अनिनस्मन्ग्रहणानि अर्थवता चानर्थकेन च तदन्तविधिं प्रयोजयन्ति (प) :</p>\n";                */
    }
    $inhan=1; // 0 - the word is  not eligible for inhanpU... 1 - the word is eligible for inhanpU.. 
} else {$inhan=0; }
/* inhanpUSAryamNAM zau (6.4.12) */
if ( $sambuddhi===0 && $inhan===0 && !in_array($fo,array("ahan","dIrGAhan")) && arr($text,'/n\+/') && sub(array("in","han","pUzan","aryaman"),array("+"),$sarvanamasthana,0) && !sub(array("ahan","Ahan",),array("+"),array("su!"),0) )
{
    $text = two(array("in","han","pUzan","aryaman"),array("Si"),array("In","hAn","pUzAn","aryamAn"),array("Si"),0);
	storedata('6.4.12','sa',3);
    if (sub(array("vin+"),blank(0),blank(0),0))
    {
		// Pending to refactor
/*    echo "<p class = pa >By 'aninasmangrahaNAni arthavatA cAnarthakena ca tadantavidhiM prayojayanti' (pa) :</p>\n";
    echo "<p class = pa >अनिनस्मन्ग्रहणानि अर्थवता चानर्थकेन च तदन्तविधिं प्रयोजयन्ति (प) :</p>\n";                */
    }
    $inhan1=1; // 0 - inhan.. has not applied. 1 - inhan.. has appied.
} else { $inhan1=0; }
/* na saMyogAdvamantAt (6.4.137) */
if ($bham === 1 && arr($text,'/['.pc('hl').'][vm][a][n][+]/'))
{
	storedata('6.4.137','sa',0);
	$vamanta=1;   // 0 - the word is not vamanta. 1 - the word is vamanta.
} else {$vamanta=0; }
/* ana upadhAlopino'nyatarasyAm (4.1.28) */
if ($gender==="f" && $vamanta===0 && $anobahuvrihe===1 && arr($text,'/[Aa][n][+]/') && !(sub(array("udan+","Asan"),blank(0),blank(0),0) ) ) 
{
    $text = one(array("An+","an+"),array("n+NIp+","n+NIp+"),1);
	storedata('4.1.28','st',0);
	storedata('1.3.8','pa',0);
	storedata('1.3.3','pa',0);
    $text = two(array("NIp"),array("+"),array("I"),array("+"),0); 
    $it = array_merge($it,array("N","p"));
    $itprakriti = array_merge($itprakriti,array("p","N"));
	storedata('1.3.3','sa',0);
    $GIp=1;
    $GI=1;
    $nadi=1;
}
/* sarvanAmasthAne cAsambuddhau (6.4.8) */  
//if ( arr($text,'/['.flat($ac).'][n][+]/')  && !arr($text,'/['.flat($ac).'][n][+]$/') && !sub(array("Ahan"),blank(0),blank(0),0) && $sarvanamasthana1===1 && $sambuddhi===0 && $inhan===0 && $inhan1===0 && !in_array($fo,array("maGavan")) ) // To check for dIrghAhan 
if ( arr($text,'/['.flat($ac).'][n][+]/')  && !arr($text,'/['.flat($ac).'][n][+]$/') && !in_array(1,$num) && $sarvanamasthana1===1 && $sambuddhi===0 && $inhan===0 && $inhan1===0 && !in_array($fo,array("maGavan")) )
{
	storedata('1.1.65','pa',0);
    $text = two($ac,array("n+"),$acdir,array("n+"),0);
	storedata('6.4.8','sa',3);
    $casambu=1; // 0 - This sUtra has not applied. 1 - This sUtra has applied. Useful for preventing repeat application.
} else {$casambu=0; }
/* tRjvatkroSTuH (7.1.95), vibhASA tRtIyAdiSvaci (7.1.97) and numaciratRjvadbhAvebhyo nuT pUrvavipratiSedhena (vA 4374) */
if (arr($text,'/krozwu/') && (sub(array("krozwu"),array("+"),$sarvanamasthana,0)||sub(array("krozwu"),array("+"),$tRtIyAdiSvaci,0) ) && $sarvanamasthana1===1 && $pada==="pratyaya" && ($sambuddhi===0 || ($sambuddhi===1 && $so!=="su!")))
{
    if ( (in_array($so,$sarvanamasthana)|| in_array($so,$tRtIyAdiSvaci) || arr($text,'/[+][S][i]$/')) ) 
    {
		storedata('1.1.47-5','pa',0);
    }
    elseif (sub(array("krozwu"),array("+"),$sarvanamasthana,0))
    {
    $text = two(array("krozwu"),array("+"),array("krozwf"),array("+"),0);
	storedata('7.1.95','sa',3);
    $tRcvat=1;
    }
}
if (arr($text,'/krozwu/') && sub(array("krozwu"),array("+"),$tRtIyAdiSvaci,0) && $so!=="Am")
{
    $text = two(array("krozwu"),array("+"),array("krozwf"),array("+"),1);
	storedata('7.1.97','sa',3);
    $tRcvat=1;  
}
if (arr($text,'/krozwu/') && sub(array("krozwu",),array("+"),array("Am"),0) && $so==="Am")
{ 
    $text = two(array("krozwu"),array("+Am"),array("krozwu"),array("+nAm"),0);
	storedata('-11','sa',0); // Pending to refactor properly.. numaciratRjvadbhAvebhyo...
    $numacira=1;     // 0 - numacira.. has not applied. 1 - numacira.. has applied.  
} else { $numacira = 0;}
if ($debug===1) {dibug("8100");}

// atisakhi is pending to code. page 158. Understand and then code.
/* AGo nA'striyAm (7.3.120) */ 
if ($ghi===1 && $so==="wA" && $gender !== "f" && arr($text,'/[iu][+]/') && !(in_array($fo,array("suDI","praDI")) && $gender==="n") )
{
    if ($bhashitapumska===0 )
    {
        $text = two(array("i+","u+"),array("wA"),array("i+","u+"),array("nA"),0);    
    }
    else
    {
        $text = two(array("i+","u+"),array("wA"),array("i+","u+"),array("nA"),1);     
        $text = two(array("krozwu+",),array("wA"),array("krozwu+",),array("nA"),0);             
    }
	storedata('7.3.120','sa',0);
    $AGo = 1; // 0 - no nAbhAva. 1 - nAbhAva.
} else {$AGo = 0; }

/* defining some sets */
$acsup = array_merge($acsup,array("SI","Si")); // adding Si of jas/Sas as ajAdivibhakti.
/* iko'ci vibhaktau (7.1.73) */
if ( $gender==="n" && arr($text,'/['.flat($ik).'][+]/') && in_array($so,$acsup) && sub($ik,array("+"),$acsup,0))
{
    if ($ghi===1 && in_array($so,array("Ne","Nasi!","Nas","Ni")) && $bhashitapumska===0)
    {
	storedata('-10','pa',0); // Pending to refactor properly. vRddhyautva...
    $noghe=1; // 0 - gherGiti will not apply. 1 - gherGiti will apply.
    } else {$noghe=0; }
    if (in_array($so,array("Am")))
    {
	storedata('-11','pa',0); // Pending to refactor properly.. numaciratRjvadbhAvebhyo...
    }
    elseif ($ghi===1 && $AGo===1 && $bhashitapumska===0)
    {
		// Pending to refactor.
/*    echo "<p class = pa >AGo nA'striyAm has barred application of iko'ci vibhaktau. </p>\n";
    echo "<p class = pa >आङो नाऽस्त्रियाम्‌ से इकोऽचि विभक्तौ का बाध हुआ है ।</p>\n"; 
    display(0);*/
    }
    elseif ( $bhashitapumska === 1 && in_array($so,array("wA","Ne","Nasi!","Nas","Ni","os",)))
    {
    $text = three(array("i","u","f","x"),array("+"),$acsup,array("i","u","f","x"),array("n+"),$acsup,1);            
    // patch for sudhI
    $text = three(array("suDi","praDi","krozwfn","sulUn"),array("+"),$acsup,array("suDI","praDI","krozwf","sulun"),array("+"),$acsup,0);
    $text = three(array("sulu",),array("+"),array("wA"),array("sulun",),array("+"),array("wA"),0);
	storedata('7.1.73','sa',3);
    }
    else
    {
    $text = three(array("i","u","f","x"),array("+"),$acsup,array("i","u","f","x"),array("n+"),$acsup,0);            
	storedata('7.1.73','sa',3);
    }
 $ikoci=1; // 0 - iko'ci vibhaktau has not applied. 1 - iko'ci vibhaktau has applied.
} else { $ikoci = 0; $noghe=0;}
/* vA'mzasoH (6.4.80) */
if (ends(array($fo),array("strI","stri"),1) && in_array($so,array("am","Sas")) && sub(array("strI","stri"),array("am","Sas"),blank(0),0))
{
    $text = one(array("strI+","stri+"),array("striy+","striy+"),1);
	storedata('6.4.80','sa',0);
}

/* lomno'patyeSu bahuSvakAro vaktavyaH (vA 2560) */
// Pending, because it is for taddhita derivation. Right now made a patch.
$bahusup = array("jas","Sas","Bis","Byas","Am","sup");
if (arr($tet,'/Oqulomi\+/') && sub(array("Oqulomi"),array("+"),$bahusup,0) && in_array($so,$bahusup))
{
    $text = two(array("Oqulomi"),$bahusup,array("uquloma"),$bahusup,0);
	storedata('4.1.85-8','sa',0);
}
/* aci ra RtaH (7.2.100) */
if (arr($text,'sf\+') && sub(array("tisf","catasf"),array("+"),$acsup,0))
{
    if ($so==="Am" )
    {
    $text = two(array("tisf","catasf"),array("+Am"),array("tisf","catasf"),array("+nAm"),0);
	storedata('-11','pa',0); // Pending to refactor properly.. numaciratRjvadbhAvebhyo...
    $numacira=1;
    }
    else
    {
    $text = two(array("tisf","catasf"),$acsup,array("tisr","catasr"),$acsup,0);
	storedata('7.2.100','sa',0);
    }
}
if ($debug===1) {dibug("8200");}
/* RduzanaspurudaMso&nehasAM ca (7.1.94) */
// displaying the output for dhAtR napuMsaka
if (arr($text,'/[fx][+]$/') && $svamo===1)
{
	// Pending to refactor.
/*    echo "<p class = pa >By na lumatAGgasya, anaG is prevented.</p>\n";
    echo "<p class = pa >न लुमताङ्गस्य से अनङ्‌ का प्रतिषेध होता है ।</p>\n";
    display(0);     */
}
if ( (arr($text,'/[fx][+]/')|| $fo==="uSanas"|| $fo==="purudaMsas" || $fo==="anehas" ) &&  $so==="su!" && $pada==="pratyaya" && $sambuddhi===0 && $svamo===0)
{
    $text = two(array("f","x","uSanas","purudaMsas","anehas"),array("+"),array("an","an","uSanan","purudaMsan","anehan"),array("+"),0);
	storedata('7.1.94','sa',3);
} 
if (  $fo==="uSanas" &&  $so==="su!" && $sambuddhi===1)
{
    $text = two(array("uSanas"),array("+"),array("uSanan"),array("+"),1);
    $text = two(array("uSanas"),array("+"),array("uSana"),array("+"),1);
	// Pending to refactor.
/*    echo "<p class = sa >By asya sambuddhau vA'naG nalopazca vA vAcyaH (vA 5037) :</p>\n";
    echo "<p class = sa >अस्य सम्बुद्धौ वाऽनङ्‌ नलोपश्च वा वाच्यः (वा ५०३७) :</p>\n";
    display(3);*/
}
/* Rto GitsarvanAmasthAnayoH (7.3.110) */
if (arr($text,'/[fx][+]/') && ( $sarvanamasthana1===1 || $so==="Ni") && $pada==="pratyaya" && $svamo===0)
{
    $text = two(array("f","x"),array("+"),array("ar","al"),array("+"),0);
	storedata('1.1.51','pa',0);
	storedata('7.3.110','sa',3);
}
/* aptRntRcsvasRnaptRneSTRtvaSTRkSattRhotRpotRprazAstRRNAm (6.4.11) */
// Not coded perfectly for tRn and tRc. naptrAdigrahaNaM vyutpattipakSe niyamArtham is pending.
$svasR = array("svasf","naptf","nezwf","tvazwf","kzattf","hotf","potf","praSAstf");
$excludesvasR = array("pitf","BrAtf","jAmAtf","mantf","hantf","nanAndf","duhitf","yAtf","mAtf","katara","itara","anyatara");
if ((arr($text,'/[tw]ar\+/') || ($tRcvat===1&& $gender!=="n" )||in_array($fo,$svasR) || in_array($fo,$svasrAdi)) && $sarvanamasthana1===1 && $pada==="pratyaya" && !in_array($fo,$excludesvasR) && (($sambuddhi===1 && $so!=="su!" ) || $sambuddhi===0)  )
{ 
    $text = two($ac,array("r+"),dirgha($ac),array("r+"),0);
    $text = one(array("svasan","naptan","nezwan","tvazwan","kzattan","hotan","potan","praSAstan"),array("svasAn","naptAn","nezwAn","tvazwAn","kzattAn","hotAn","potAn","praSAstAn"),0);
	storedata('6.4.11','sa',3);
    $aptRn=1; // 0 - aptRn.. has not appied. 1 - aptRn.. has applied.
} else { $aptRn=0; }
if (arr(array($fo),'/[a][p]$/') && $sarvanamasthana1===1 && $pada==="pratyaya" && (($sambuddhi===1 && $so!=="su!" ) || $sambuddhi===0))
{
    $text = two(array("ap"),array("+"),array("Ap"),array("+"),0);
	storedata('6.4.11','sa',3);
}
/* apo bhi (7.4.48) */
if (arr(array($fo),'/[a][p]$/') && arr($text,'/[a][p][+][B]/') && in_array($so,array("Bis","Byas","ByAm")))
{
    $text = two(array("ap"),array("+B"),array("at"),array("+B"),0);
	storedata('7.4.48','sa',3);
}
/* Ato dhAtoH (6.4.140) */
$haha = array("hAhA");
if ($bham === 1 && arr($text,'/[A][+]/') && !in_array($fo,$haha) && ($_GET['cond1_2']==="1" || $_GET['cond2_1']==="1" ) && $Ap===0)
{
    $text = two(array("A"),array("+"),array(""),array("+"),0);
	storedata('6.4.140','sa',3);
}
if ($bham === 1 && arr($text,'/[A][+]/') &&  in_array($fo,array('ktvA','SnA')) && $Ap===0)
{
    $text = two(array("A"),array("+"),array(""),array("+"),1);
	storedata('6.4.140','sa',6);
}
/* zvayuvamaghonAmataddhite (6.4.133) */
if ($bham === 1 && $taddhita===0 && sub(array("Svan","yuvan","maGavan"),array("+"),blank(0),0))
{
    $text= two(array("Svan","yuvan","maGavan"),array("+"),array("S+u+an","yu+u+an","maGa+u+an"),array("+"),0);
	storedata('6.4.133','sa',3);
    $samp=array_merge($samp,array(1)); // add 1 to array if samprasAraNa happens.
}
/* vAha UTh (6.4.132) */
if ($bham===1 && arr($text,'/vAh\+/') && sub(array("vAh"),array("+","+I+"),blank(0),0) )
{   
    $text = one(array("vAh+"),array("U+Ah+"),0);
	storedata('6.4.132','sa',3);
	$samp=array_merge($samp,array(1));
}
/* vasoH samprasAraNam (6.4.131) */
if ($bham===1 && arr($text,'/vasu!\+/') && sub(array("sedivasu!","vasu!"),array("+"),blank(0),0) && $vasu===1)
{   
    $text = one(array("sedivasu!+","vasu!+"),array("sed+u+asu!+","+u+asu!+"),0);
 	storedata('6.4.131','sa',3);
   if (sub(array("sed+u+asu!+"),blank(0),blank(0),0))
    {
		storedata('par@56','pa',0);
		// Pending to refactor
//    echo "<p class = hn >Even though the iDAgama is antaraGga, it doesnt hold in samprasAraNa by 'akRtavyUhAH pANinIyAH'.</p>\n";
    }
    if (arr($text,'/sed\+u\+asu!\+/'))
    {
		// Pending to refactor
//    echo "<p class = hn >अन्तरङ्गोऽपि इडागमः सम्प्रसारणविषये न प्रवर्तते, 'अकृतव्यूहाः' इति परिभाषया ।</p>\n";
    }
   $samp=array_merge($samp,array(1));
}
/* samprasAraNAcca (6.1.108) */
if ( in_array(1,$samp) && sub(array("+i+","+u+","U+"),$ac,blank(0),0) )
{   
    $text = two(array("+i+","+u+","U+"),$ac,array("+i+","+u+","U"),blank(count($ac)),0);
	storedata('6.4.108','sa',0);
} 
/* na samprasAraNe samprasAraNam (6.2.37) */
if ( in_array(1,$samp) && arr($text,'/[yv][uU][+]/') )
{   
	storedata('6.2.37','sa',0);
}
if ($debug===1) {dibug("8300");}
/* napuMsakAcca (7.1.19) */
if ( $gender==="n" && in_array($so,array("O","Ow"))) 
{
    $text = two(array("+"),array("Ow","O",),array("+"),array("SI","SI"),0);
	storedata('7.1.19','sa',3);
    $napuMsakAcca=1; // 0 - napuMsakAcca has not applied. 1 - napuMsakAcca has applied.
} else { $napuMsakAcca=0; }
/* auGaH zyAM pratiSedho vAcyaH (vA) */
if (arr($text,'/[+][S][I]/') && in_array($so,array("O","Ow")))
{
	storedata('6.4.148-1','sa',0);
    $auGazyA = 1; // 0 - doesn't prevent application of yasyeti ca. 1 - prevents application of yasyeti ca.
} else { $auGazyA = 0; }
/* paddannomAshRnnizasanyUSandoSanyakaJChakannudannAsaJChasprabhRtiSu (6.1.63) special case kakuddoSaNI */
if (arr($text,'/doz\+SI/') && in_array($so,array("O","Ow")))
{
    $text = two(array("doz"),array("+"),array("dozan"),array("+"),0);
	storedata('6.1.63','sa',0);
}
/* bhasya (6.4.129) and allopo'naH (6.4.134) and vibhASA GizyoH (6.4.136) and na saMyogAdvamantAt (6.4.137) */ 
if ( ($bham === 1 || ($gender==="f" && arr($text,'/an\+I/'))) && $vamanta===0 && arr($text,'/[a][n][+]/') && !(sub(array("udan+","Asan"),blank(0),blank(0),0) && !in_array($so,$yacibham)) ) 
{
    if ( $so==="Ni" || $napuMsakAcca===1 )
    {
    $text = one(array("an+"),array("n+"),1);
	storedata('6.4.134','sa',0);
	storedata('6.4.136','sa',6);
    }
    else
    {
    $text = one(array("an+"),array("n+"),0);
	storedata('6.1.134','sa',6);
    } 
    $allopo=1; // 0 - allopa has not happened. 1 - allopa has happened.
} else {$allopo=0; }
/* ho hanterJNinneSu (7.3.54) */
if (arr(array($fo),'/[h][a][n]/') && sub(array("h"),array("n"),blank(0),0) && !in_array($fo,array("ahan","dIrGAhan")))
{
    $text = two(array("h"),array("n"),array("G"),array("n"),0);
	storedata('7.3.54','sa',6);
    $hohante=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
}
/* jasi ca (7.3.109) */
/* trestrayaH (7.1.53) */
if (arr($text,'/[t][r][i][+][A][m]$/') && !sub(array("stri"),array("+"),blank(0),0) && $so==="Am" )
{
    $text = two(array("tri"),array("Am"),array("traya"),array("Am"),0);
	storedata('7.1.53','sa',3);
}
if (arr($text,'/[t][r][i][+][A][m]$/') && !sub(array("stri"),array("+"),blank(0),0) && $so==="Am" && $fo!=="tri")
{
    $text = two(array("tri"),array("Am"),array("traya"),array("Am"),1);
	storedata('7.1.53','sa',3); // Pending to refactor gauNatve tu neti kecit.
}
/* viSvagdevayozca TeradryaJcatAvapratyaye (6.3.92) */
$sarvanamaadri = array("sarvadri","viSvadri","uBadri","uBayadri","ataradri","atamadri","anyadri","anyataradri","itaradri","tvadri","tvadri","nemadri","simadri","tyadri","tadri","yadri","etadri","idadri","adadri","ekadi","dvadri","yuzmadri","asmadri","Bavadri","kadri","idakadri");
if ($ancu===1 && arr($text,'/anc/') && ( sub(array("vizvak","deva"),array("anc"),blank(0),0)||sub($sarvanama,array("anc"),blank(0),0) ) )
{
    $text = three($sarvanama,array("anc"),array("+"),$sarvanamaadri,array("anc"),array("+"),0);
    $text = three(array("vizvak","deva"),array("anc"),array("+"),array("vizvadri","devadri"),array("anc"),array("+"),0);
	storedata('6.3.92','sa',0);
    /* patch for iko yaNaci */
        if(sub(array('i','I','u','U'),prat('ac'),blank(0),0) && $bham===0) // for function prat, see function.php.
            {
            $text = two(array('i','I','u','U'),prat('ac'),array('y','y','v','v'),prat('ac'),0);
			storedata('6.1.77','sa',0);
            }
        if(sub(array("f","F","x","X"),prat('ac'),blank(0),0) && $bham===0)
            {
            $text = two(array("f","F","x","X"),prat('ac'),array("r","r","l","l"),prat('ac'),0);
			storedata('6.1.77','sa',0);
            }
}
/* adasa au sulopazca (7.2.107) */
if (arr($text,'/adas\+su/') && sub(array("adas"),array("+"),array("su!"),0) && $so==="su!" && $fo==="adas")
{
    $text = two(array("adas"),array("su!"),array("adaO"),array(""),0);
	storedata('7.2.107','sa',3);
}
/* tyadAdInAmaH (7.2.102) */
if (arr($text,'/dvi\+/') && in_array($so,$sup) && ends(array($fo),array("dvi"),1) && $_GET['cond1_3_2']==="2" && $idamoma===0 && $svamo===0 && $noatvasatva===0)
{
    $text = one(array("dvi"),array("dv+a"),0);
	storedata('7.2.102','sa',3);
}
$tyadadinamah = array("dv+a","tya+a","ta+a","ya+a","eta+a","ida+a","ada+a","eka+a","idaka+a"); // creating a set of words eligible for tyadAdInAmaH
$tyadadinamah1 = array("dva","tya","ta","ya","eta","ida","ada","eka","idaka"); // creating a list of converted words after tyadAdInAmaH.
if (in_array($so,$sup) && $idamoma===0 && $svamo===0 && $noatvasatva===0 && sub($tyadadi,array("+"),blank(0),0) && !sub(array("dvi"),array("+"),blank(0),0) )
{
    $text = one($tyadadi,$tyadadinamah,0);
	storedata('7.2.102','sa',3);
	storedata('7.2.102-1','spa',0);
    $text = one($tyadadinamah,$tyadadinamah1,0);
    $text=one(array("etam"),array("eta+am"),0);
	storedata('6.1.96','sa',0);
}
if ($debug===1) {dibug("8400");}
/* ajAdyataSTAp (4.1.4) */
if ($gender==="f" && sub(array("a+"),$sup,blank(0),0) && in_array($so,$sup) && ($SaTsvasrAdi=0 || sub(array("a+"),$sup,blank(0),0)) && $ajAdyataSTAp===0)
{
    $text = two(array("a+"),$sup,array("A+"),$sup,0);
	storedata('4.1.4','st',0);
    $Ap=1;
}
/* akaH savarNe dIrghaH (6.1.101) */
if ($gender==="f" && $Ap===1 && sub(array("idaA","tyaA","taA","yaA","etaA","adaA"),array("+"),blank(0),0) && in_array($fo,array("idam","idakam","tyad","tad","yad","etad","adas")) && in_array($so,$sup))
{
    $text = one(array("idaA","tyaA","taA","yaA","etaA","adaA"),array("idA+","tyA","tA","yA","etA","adA"),0);
	storedata('6.1.101','sa',3);
}
/* adasa au sulopazca (7.2.107) */
if (arr($text,'/adakas\+/') && sub(array("adakas"),array("+"),array("su!"),0) && $so==="su!" && $fo==="adakas")
{
    $text = two(array("adakas"),array("su!"),array("adakaO"),array(""),1);
    $text = two(array("adakas"),array("su!"),array("asukas"),array(""),0);
	storedata('7.2.107','sa',3);
	storedata('7.2.107-1','sa',0);
}
/* tadoH saH sAvanantyayoH (7.2.106) */ 
$tyadadinamah3 = array("dva","tya","eta","ta","ida","ada","eka","idaka","tyA","tA","etA"); // eligible for application of this sUtra.
$tyadadinamah2 = array("dva","sya","eza","sa","isa","asa","eka","isaka","syA","sA","esA"); // conversion after application of this sUtra.
if ($sarvafinal!==0 && $noatvasatva===0 && sub($tyadadinamah3,array("su!"),blank(0),0) )
{
    $text = two($tyadadinamah3,array("su!"),$tyadadinamah2,array("su!"),0);
	storedata('7.2.106','sa',3);
}
if (arr($text,'/ada/') && sub(array("adaO","adakaO"),blank(0),blank(0),0))
{
    $text = one(array("adaO","adakaO"),array("asaO","asakaO"),0);
    $text = one(array("adakas"),array("asukas"),0);
	storedata('7.2.106','sa',3);
}
/* sarvanAmnaH smai (7.1.14) */  
if (arr($text,'/[a][+][N][e]/') && $so === "Ne" && $sarvafinal!==0)
{
    if ($sarvafinal===2)
    {
    $text = last(array("Ne"),array("smE"),1);        
    }
    else
    {
    $text = last(array("Ne"),array("smE"),0);        
    }
	storedata('7.1.14','sa',3);
    $sarva =1; // 0 - sarvanAmnaH smai has not applied. 1 - sarvanAmnaH smai has applied.
} else { $sarva = 0; }
/* GasiGyoH smAtsminau (7.1.15) */ 
if (arr($text,'/[a][+][N]/') && $pada=== "pratyaya" && in_array($so,array("Nasi!","Ni")) && $sarvafinal!==0)
{
    if ($sarvafinal===2)
    {
    $text = last(array("Ni","Nasi!"),array("smin","smAt"),1);        
    }
    else
    {
    $text = last(array("Ni","Nasi!"),array("smin","smAt"),0);        
    }
	storedata('7.1.15','sa',3);
    $sarva1 =1; // 0 - GasiGyoH smAtsminau has not applied. 1 - GasiGyoH smAtsminau has applied.
} else { $sarva1 = 0; }
/* pUrvAdibhyo navabhyo vA (7.1.16) */ 
if (ends(array($fo),array("pUrva","para","avara","dakziRa","uttara","apara","aDara","sva","antara"),1) && $pada=== "pratyaya" && in_array($so,array("Nasi!","Ni")) && $sarvafinal!==0)
{
    $text = last(array("smin","smAt"),array("Ni","Nasi!"),1);
	storedata('7.1.16','sa',3);
    $sarva1 =1; 
} elseif ($sarva1 ===1) 
    { $sarva1 = 1; }
    else
    {
        $sarva1 = 0;
    }
/* TAGasiGasAminAtsyAH (7.1.12) */
if ( in_array($so,array("wA","Nas")) && arr($text,'/[a][+][wN]/'))
{
    $text = one(array("a+wA","a+Nas"),array("a+ina","a+sya"),0);
    $text = two(array("jaras"),array("ina","sya"),array("jaras"),array("wA","Nas"),0);
	storedata('7.1.12','sa',3);
    $wa = 1; // 0 - wA.. has not applied. 1 - wA.. has applied.
} else { $wa =0; }
if (arr($text,'/[a][+][N]/') && in_array($so,array("Nasi!")))
{
    $text = one(array("a+Nasi!"),array("a+At"),0);
    $text = two(array("jaras"),array("At"),array("jaras"),array("Nasi!"),0);
	storedata('7.1.12','sa',3);
    $wa1 = 1; // 0 - wA.. has not applied. 1 - wA.. has applied.
} else { $wa1 =0; }
/* Ami sarvanAmnaH suT (7.1.15) */
if ( $so === "Am" && $sarvafinal !== 0)
{
    if ( $sarvafinal === 2)
    {
    $text = last(array("Am"),array("sAm"),1);      
    }
    else
    {
    $text = last(array("Am"),array("sAm"),0);        
    }
	storedata('7.1.15','sa',3);
    $sut=1; // 0 - Ami sarvanAmnaH sUT has not applied. 1 - Ami sarvanAmnaH suT has applied. 
} else { $sut=0;}
if ($debug===1) {dibug("8500");}
/* sAma Akam (7.1.33) */
if (arr($text,'/a\+sAm$/') && sub(array("asma","yuzma","ima","itva","Ava","yuva"),array("+"),array("sAm"),0) && in_array($so,array("Am")))
{
    $text = one(array("asma+sAm","yuzma+sAm","ima+sAm","itva+sAm","Ava+sAm","yuva+sAm"),array("asma+Akam","yuzma+Akam","ima+Akam","itva+Akam","Ava+Akam","yuva+Akam"),0);
	storedata('7.1.33','sa',3);
    $sAmaAkam=1; // 0 - sAma Akam has not applied. 1 - sAma Akam has applied.
} else { $sAmaAkam=0; }
/* dvitIyATaussvenaH (2.4.34) */ 
if (in_array($fo,array("idam","etad","idakam")) && $anvadesha===1 && in_array($so,array("am","Ow","Sas","wA","os")) && sub(array("ida+","eta+","idaka+","idA+",),blank(0),blank(0),0) )
{
    $text = one(array("ida+","eta+","idaka+","idA+",),array("ena+","ena+","ena+","enA+"),0);
	storedata('2.4.34','sa',0);
}
/* idamo'nvAdeze'zanudAttastRtIyAdau (2.4.32) */
if ($fo==="idakam" && $anvadesha===1 && in_array($so,$tRtIyAdi) && sub(array("idaka+"),blank(0),blank(0),0) )
{
    $text = one(array("idaka+"),array("a+"),0);
	storedata('2.4.32','sa',0);
}
/* nAnarthake'lo'ntyavidhiranabhyAsavikAre (vA 490) */
// Pending. Not clear to me.
/* Adyantavadekasmin */
// paribhASA. Difficult to code.

/* goto Nit (7.1.90) and oto Niditi vAcyam (vA 5035) */
if (!in_array($so,array("am","Sas")) && arr($text,'/o\+/') && sub(array("o+"),$sarvanamasthana,blank(0),0) )
{   
    if (sub(array("go+"),$sarvanamasthana,blank(0),0))
    {$Nidvat1 = 1;
	storedata('7.1.90','sa',3);
    }
    elseif (!preg_match('/[o]$/',$fo))
    {$Nidvat1 = 0;
	storedata('7.1.90','sa',3);
	// Pending to refactor.
/*    echo "<p class = pa >oto Niditi vAcyam (vA 5035) is overruled by 'okArAntAdvihitaM sarvanAmasthAnam'.</p>\n";
    echo "<p class = pa >ओकारान्ताद्विहितं सर्वनामस्थानम्‌ इति व्याख्यानात्‌ ओतो णिदिति वाच्यमित्यस्य प्रवृत्तिर्नास्ति ।</p>\n";
    display(0);*/
    }
    else
    {$Nidvat1 = 1;
	storedata('7.1.90-1','sa',3);
    }
} else {$Nidvat1 =0; }
/* aco JNiti (7.2.115) */ 
if ((arr($text,'/['.flat($ac).'][+][YR]/')||arr($text,'/[a][+][*][YR]$/')||$Nidvat===1||$Nidvat1===1) && arr($text,'/['.pc('ac').'][+]/') )
{ 
    $text = two($ac,array("+"),vriddhi($ac),array("+"),0);
	storedata('7.2.115','sa',3);
}
if (arr($text,'/[iufx][+][j]/') && $so==="jas")
{
    $text = two(array("i","u","f","x"),array("+"),array("e","o","ar","al"),array("+"),0);
	storedata('7.3.109','sa',3);
}
/* RRta iddhAtoH (7.1.100) */
$kRR = array("kF","tF","gF"); // Creating a list of RR-anta words. They are anukaraNas of dhAtus mostly. If additional forms are found, list them here.
if (arr($text,'/[ktg][F][+]/'))
{
    $dhatu = 1;
}
if (arr($text,'/[ktg][F][+]/'))
{
    $text = two(array("F"),array("+"),array("ir"),array("+"),1);
	storedata('7.1.100','sa',3);
}
if ( $dhatu === 1 && arr($text,'/F\+/') && !arr($text,'/[ktg][F][+]/') )
{
    $text = two(array("F"),array("+"),array("ir"),array("+"),0);
	storedata('7.1.100','sa',3);
}
/* zapzyanornityam (7.1.81) */ 
if ( arr($text,'/[aA][t][+][S][I]/') && ($shap===1|| $shyan===1 ) )
{
    $text = mit('/['.pc('hl').'][+]/','n',0); $num=array_merge($num,array(1)); // function mit adds a mit Agama according to midaco'ntyAtparaH. See function.php
    $text = one(array("annc"),array("anc"),0);
    $text = one(array("+In+","+An+"),array("+I+","+A+"),0);
	storedata('7.1.81','sa',3);
    $zapzyan=1;
}
if ( arr($text,'/[a][t][I][+]/') && ($shap===1|| $shyan===1 ) )
{
    $text = two(array("atI"),array("+"),array("antI"),array("+"),0); $num=array_merge($num,array(1)); // function mit adds a mit Agama according to midaco'ntyAtparaH. See function.php
    $text = one(array("annc"),array("anc"),0);
    $text = one(array("+In+","+An+"),array("+I+","+A+"),0);
	storedata('7.1.81','sa',3);
	$zapzyan=1;
}
/* AcChInadyornum (7.1.80) */ 
if (arr($text,'/[aA][t][+[S][I]/') && $shatR===1 && itcheck(array("f"),0) && $AcCInadyo===1 )
{
    $text = mit('/['.pc('hl').'][+]/','n',1); $num=array_merge($num,array(1));
    $text = one(array("annc"),array("anc"),0);
	storedata('7.1.80','sa',0);
}
if (arr($text,'atI\+') && $shatR===1 && itcheck(array("f"),0) && $AcCInadyo===1 )
{
    $text = two(array("atI"),array("+"),array("antI"),array("+"),0); $num=array_merge($num,array(1));
    $text = one(array("annc"),array("anc"),0);
	storedata('7.1.80','sa',0);
}
if ($debug===1) {dibug("8600");}
/* idudbhAym (7.3.117) */
if ($nadi!==0 && arr($text,'/[iu][+][N][i]$/'))
{
    $text = two(array("i","u"),array("+Ni"),array("i","u"),array("+Am"),1);
	storedata('7.3.117','sa',3);
}
/* GerAmnadyAmnIbhyaH (7.3.116) */
if (arr($text,'/[n][I][+]/') && $pada=== "pratyaya" && $so==="Ni")
{
    $text = two(array("+"),array("Ni"),array("+"),array("Am"),0);
	storedata('7.3.116','sa',3);
} 
if ($nadi!==0 && $pada=== "pratyaya" && $so==="Ni")
{
    if ($nadi===1)
    {
    $text = two(array("I","U"),array("+Ni"),array("I","U"),array("+Am"),0);        
    }
    else
    {
    $text = two(array("I","U"),array("+Ni"),array("I","U"),array("+Am"),1);        
    }
	storedata('7.3.116','sa',3);
}
if ($Ap===1 && $pada=== "pratyaya" && $so==="Ni")
{
    $text = two(array("A"),array("+Ni"),array("A"),array("+Am"),0);
	storedata('7.3.116','sa',3);
}
/* aut (7.3.118) */
if (arr($text,'/[iu][+][N][i]$/') && $so==="Ni" && $pada==="pratyaya")
{
    $text = two(array("i","u",),array("Ni"),array("i","u"),array("O"),0);
	storedata('7.3.118','sa',3);
}
/* ANnadyAH (7.3.112)  */ 
// The method for finding Git is coarse. needs fine tuning. 
if ($nadi!==0 && arr($text,'/[+][N]/') && in_array($so,array("Ne","Nasi!","Nas",)))
{
    if ($nadi===1)
    {
    $text = two(array("+"),array("N"),array("+"),array("A+N"),0);        
    }
    else
    {
    $text = two(array("+"),array("N"),array("+"),array("A+N"),1);        
    }
	storedata('7.3.112','sa',3);
    $Agama=array("Aw");
}
/* acca gheH (7.3.119) */ 
if ($ghi===1 && in_array($so,array("Ni")))
{
    $text = two(array("i","u"),array("O"),array("a","a"),array("O"),0);
	storedata('7.3.119','sa',3);
}
/* gherGiti (7.3.111) */
if ($ghi===1 && $noghe===0 && arr($text,'/[iu][+]/') && in_array($so,array("Ne","Nasi!","Nas")))
{
    $text = two(array("i","u"),array("Ne","Nasi!","Nas"),array("e","o"),array("Ne","Nasi!","Nas"),0);
	storedata('7.3.111','sa',3);
}
/* auGaH ApaH (7.1.18) */
if ($Ap===1 && arr($text,'/[A][+][O]$/') && in_array($so,array("O")))
{
    $text = two(array("A+"),array("O"),array("A+"),array("SI",),0);
	storedata('7.1.18','sa',3);
}
if ($Ap===1 && arr($text,'/[A][+][O][w]$/') && in_array($so,array("Ow")))
{
    $text = two(array("A+"),array("Ow"),array("A+"),array("SI"),0);
	storedata('7.1.18','sa',3);
}
/* sambuddhau ca (7.3.106) */
if ($Ap===1 && $sambuddhi===1 && in_array($so,array("su!")) && arr($text,'/[A][+]/'))
{
    $text = two(array("A+"),array("su!"),array("e+"),array("su!"),0);
	storedata('7.3.106','sa',3);
}
/* sarvanAmnaH syADDhrasvazca (7.3.114) */ 
$sarvanamastri = array("sarvA","viSvA","uBA","uBayA","atarA","atamA","anyA","anyatarA","itarA","tvA","nemA","simA","pUrvA","parA","avarA","dakziRA","uttarA","aparA","aDarA","svA","antarA","tyA","tA","yA","etA","idA","adA","ekA","dvA","kA","idakA");
$sarvanamastri1 = array("sarva","viSva","uBa","uBaya","atara","atama","anya","anyatara","itara","tva","nema","sima","pUrva","para","avara","dakziRa","uttara","apara","aDara","sva","antara","tya","ta","ya","eta","ida","ada","eka","dva","ka","idaka");
if ($Ap===1 && $sarvafinal !==0 && in_array($so,array("Ne","Nas","Ni")) && ( sub($sarvanamastri,blank(0),blank(0),0) ||in_array($fo,array("idam")) ))
{ 
    if ( $sarvafinal === 2)
    {
    $text = one(array("A+Ne","A+Nas","A+Am"),array("a+syA+Ne","a+syA+Nas","a+syA+Am"),1);        
    }
    else
    {
    $text = one(array("A+Ne","A+Nas","A+Am"),array("a+syA+Ne","a+syA+Nas","a+syA+Am"),0);        
    }
	storedata('7.3.114','sa',3);
    $syaddhrasva = 1; // 0 - sarvanAmnaH syADDhrasvazca has not applied. 1 - sarvanAmnaH syADDhrasvazca has applied.
} else { $syaddhrasva = 0; }
if ($Ap===1  && $sarvafinal !==0 && in_array($so,array("Nasi!")) && ( sub($sarvanamastri,blank(0),blank(0),0) ||in_array($fo,array("idam"))) )
{
    if ( $sarvafinal === 2)
    {
    $text = one(array("A+Nasi!"),array("a+syA+Nasi!"),1);        
    }
    else
    {
    $text = one(array("A+Nasi!"),array("a+syA+Nasi!"),0);        
    }
	storedata('7.3.114','sa',3);
    $syaddhrasva1 = 1; // 0 - sarvanAmnaH syADDhrasvazca has not applied. 1 - sarvanAmnaH syADDhrasvazca has applied.
} else {$syaddhrasva1=0; }
if ($debug===1) {dibug("8700");}
/* hali lopaH (7.2.113) */
if (arr($text,'id[aA]\+['.pc('hl').']') && $fo==="idam" && !in_array($so,array("jas","Ow","O","Sas","wA","os")))
{
    $text = one(array("ida+","idA+",),array("a+","A+",),0);
	storedata('7.2.113','sa',3);
}
/* anApyakaH (7.2.112) */
if ($fo==="idam" && in_array($so,$tRtIyAdiSvaci) && arr($text,'id[aA]\+') )
{
    $text = one(array("ida+","idA+"),array("ana+","anA+"),0);
	storedata('7.2.112','sa',3);
}
/* AGi cApaH (7.3.105) */
if ($Ap===1  && in_array($so,array("wA","os")))
{
    $text = two(array("A+"),array("wA","os"),array("e+"),array("wA","os"),0);
	storedata('7.3.105','sa',3);
}
/* vibhASA diksamAse bahuvrIhau (1.1.28) */
if ($Ap===1  && in_array($so,array("Ne","Nas","Nasi!","Ni")) && in_array(array($fo),$diksamAsa))
{
	storedata('1.1.28','pa',3);
    $sarvafinal = 2;
}
/* yADApaH (7.3.113) */
if ($Ap===1 && (( in_array($so,array("Ne","Nas","Ni")) && $syaddhrasva===0 ) || ( in_array($so,array("Ne","Nas","Ni")) && $sarvafinal===2 ) ))
{
    $text = three(array("A+"),array(""),array("Ne","Nas","Ni","Am"),array("A+"),array("yA+"),array("Ne","Nas","Ni","Am"),0);
    $text = one(array("syA+yA+"),array("syA+"),0);
	storedata('7.3.113','sa',3);
}
if ($Ap===1 && (( in_array($so,array("Nasi!")) && $syaddhrasva===0 ) || ( in_array($so,array("Nasi!")) && $sarvafinal===2 ) ))
{
    $text = three(array("A+"),array(""),array("Nasi!"),array("A+"),array("yA+"),array("Nasi!"),0);
    $text = one(array("syA+yA+"),array("syA+"),0);
	storedata('7.3.113','sa',3);
}
/* nedamadasorakoH (7.1.11) */
if (arr($text,'/^[a][+]/') && $so==="Bis" && in_array($fo,array("idam","idakam","adas")))
{
	storedata('7.1.11','sa',3);
    $nedamadas=1; // 0 - nedamadasorakoH doesn't prevent application of ato bhisa ais. 1 - nedamadasorakoH prevents application of ato bhisa ais. 
} else { $nedamadas=0; }
/* jasaH zI (7.1.17) */ 
if (arr($text,'/[a][+]/') && $pada=== "pratyaya" && $so === "jas" && ends(array($fo),$sarvanama,1) && $nojas===0  && $sarvafinal!==0 )
    {
    if ($sarvafinal===2)
    {
    $text = last(array("jas"),array("SI"),1);        
    }
    else
    {
    $text = last(array("jas"),array("SI"),0);        
    }
	storedata('7.1.17','sa',3);
    $sarva2 =1; // 0 - jasaH zI has not happened. 1 - jasaH zI has happened. 
} else { $sarva2 = 0; }
/* pUrvaparAvaradakSiNottarAparAdharANi vyavasthAyAmasaJjJAyAm (1.1.34) */
if ($so === "jas" && $purvapara===1 && in_array($fo,array("pUrva","para","avara","dakziRa","uttara","apara","aDara",)))
{
    $text = last(array("SI"),array("jas"),1);
	storedata('1.1.34','sa',0);
    $purva=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
} else {$purva=0;}
/* svamajJAtidhanAkhyAyAm (1.1.35) */
if ($so === "jas" && $sva===1 &&  in_array($fo,array("sva",)))
{
    $text = last(array("SI"),array("jas"),1);
	storedata('1.1.35','sa',0);
}
/* antaraM bahiryogopasaMvyAnayoH (1.1.36) */
if ($so === "jas" && $antara===1 && in_array($fo,array("antara",)))
{
    $text = last(array("SI"),array("jas"),1);
	storedata('1.1.36','sa',0);
}
/* vibhASA jasi */
/* na bahuvrIhau */
/* tRtIyAsamAse */
/* dvandve ca */
// These have been taken care of in user feedback.
if ($debug===1) {dibug("8800");}
/* prathamacaramatayAlpArdhakatipayanemAzca (1.1.33) */
if ($so === "jas" && in_array($fo,array("praTama","carama","alpa","arDa","katipaya")))
{
    $text = last(array("jas"),array("SI"),1); // function last removes and replaces a specified string from the end of word. for details, see function.php.
	storedata('1.1.33','sa',0);
} 
if ($so === "jas" && in_array($fo,array("nema")))
{
    $text = last(array("SI"),array("jas"),1);
	storedata('1.1.33','sa',0);
}     
/* vibhASA jasi (1.1.32) */
if ($so === "jas" && $dvandveca===1 )
{
    $text = last(array("jas"),array("SI"),1);
	storedata('1.1.32','sa',0);
}    
if ($so === "jas" && arr(array($fo),'/(taya)$/'))
{
    $text = last(array("jas"),array("SI"),1);
	storedata('1.1.33','sa',0);
}    

/* upadeze'janunAsika it (1.3.2)*/ // Temporary patch. Not coded perfectly.
if (arr($text,'/['.flat($ac).'][!]/'))
{
    it('/(['.flat($ac).'][!])/');
	storedata('1.3.2','pa',0);
    $text = two($ac,array("!"),blank(count($ac)),array(""),0);
	storedata('1.3.9','sa',0);
}
/* patch for saMyogAntalopa of maghavan */
if (arr($text,'/maGavant\+/') && in_array($so,array("su!")) && $sambuddhi===0)
{
    $text = two(array("maGavant",),array("+"),array("maGavan",),array("+"),0);
	storedata('8.2.23','sa',0);
}

/* AdirJiTuDavaH (1.3.5) */
if ((substr($first,0,2) === "Yi" || substr($first,0,2) === "wu" || substr($first,0,2) === "qu") && $pada=== "pratyaya" && !in_array($so,$tiG))
{
    if(substr($first,0,2) === "Yi") { $itprakriti = array_merge($itprakriti,array("Yi")); }
    if(substr($first,0,2) === "wu") { $itprakriti = array_merge($itprakriti,array("wu")); }
    if(substr($first,0,2) === "qu") { $itprakriti = array_merge($itprakriti,array("qu")); }
	storedata('1.3.5','pa',0);
    $text = first(array("Yi","wu","qu"),array("","",""),0); // function first removes and replaces specific strings from the words. For details see function.php.
	storedata('1.3.9','sa',0);
}
/* cuTU (1.3.7) */
if (arr($text,'/[+][cjYwWqQR]/') && $wa1 === 0 && ($sarva2 ===0 || $purva=1))
{
    it('/([+][cjYwWqQR])/');
	storedata('1.3.7','pa',0);
    $text = last(array("jas","wA"),array("as","A"),0);
	storedata('1.3.9','sa',0);
}
/* SaH pratyayasya (1.3.6) */
if (arr($text,'/[+][z]/') && $pada=== "pratyaya")
{
    it('/([+][z])/');
	storedata('1.3.6','pa',0);
    $text = two(array("+"),array("z"),array("+"),array(""),0);
	storedata('1.3.9','sa',0);
}
/* GeryaH (7.1.13) */
if (arr($text,'/[a][+][N][e]/') && $pada=== "pratyaya" && $so === "Ne" )
{
    $text = one(array("a+Ne"),array("a+ya"),0);
    $text = two(array("jaras"),array("ya"),array("jaras"),array("Ne"),0);
	storedata('7.1.13','sa',3);
    $Ne=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
} else { $Ne = 0; }
if (in_array($fo,array("SrIpA")) && $gender==="n" && $so==="Ne")
{
	// Pending to refactor
/*    echo "<p class = pa >By sannipAtaparibhASA prevents application of 'Ato dhAtoH'.</p>\n";
    echo "<p class = pa >सन्निपातपरिभाषा आतो धातोः का प्रयोग निषेध करती है ।</p>\n";
    display(0);    */
}
/* lazakvataddhite (1.3.8) */
if (((arr($text,'/[+][lSkKgGN]/'))||$sarva2===1||$purva===1) && $taddhita === 0  && $sarva === 0)
{
    it('/([+][lSkKgGN])/');
	storedata('1.3.8','pa',0);
    $text = two(array("+"),array("Sas","Ni","SI","Nas","Ne","Si","kvin","Sap"),array("+"),array("as","i","I","as","e","i","vin","ap"),0);
	storedata('1.3.9','sa',0);
}
/* na vibhaktau tusmAH (1.3.4) */
if (arr(array($so),'/[tTdDnsm]$/') && $vibhakti===1 && $tusma!==1)
{
	storedata('1.3.4','sa',0);
    $tusma=1;
}
elseif (arr($text,'/[tTdDnsm]$/') && $vibhakti===1)
{
    $tusma=1;
}
/* halantyam (1.3.3) ant tasya lopaH (1.3.9) */
if (arr($text,'/['.flat($hl).']$/') && $halGyAbbhyo!==1 && $nomidelision!==1 && $tusma!==1)
{
    itprat('/(['.flat($hl).']$)/');
	storedata('1.3.3','pa',0);
    $text = last(prat('hl'),blank(count(prat('hl'))),0);
	storedata('1.3.9','sa',0);
}
if ($debug===1) {dibug("8900");}
/* halantyam (1.3.3) and tasya lopaH */
if ($nomidelision!==1 && sub(array("+"),$inbetweenpratyaya,array("+"),0) )
{
    itprat('/['.flat($hl).'][+]/');
	storedata('1.3.3','pa',0);
    $text=two(prat('hl'),array("+"),blank(count(prat('hl'))),array("+"),0);
	storedata('1.3.9','sa',0);
}
/* it additions in case of kvin and kvip */
if ($kvin===1)
{
    $itprakriti=array_merge($itprakriti,array("k","n",)); // still ambiguous whether these should be added to pratyayas only or sometimes to prakRtis also.
    $it=array_merge($it,array("k","n",));
}
if ($kvip===1)
{
    $itprakriti=array_merge($itprakriti,array("k","p"));    
    $it=array_merge($it,array("k","p"));    
}
/* nAJceH pUjAyAm (6.4.30) */ 
//if ( !itcheck(array("i"),1) && arr($text,'/[n]['.pc('hl').'][+]/') && ( itcheck(array("k","G"),2)|| $ancu===1 )) // blocked because gives wrong result in 'yuj'->'yunj'. 
if ( !itcheck(array("i"),1) && arr($text,'/[n][c][+]/') && $nance===1 ) // for function itcheck please see function.php.
{
	storedata('6.4.30','sa',0);
}
/* kruJca */ 
if (arr($text,'/kru[nY]c\+/') )
{
	// Pending to refactor.
/*    echo "<p class = pa >'RtvigdadhRksragdigaJcuyujikruJcAM ca' prohibits application of nalopa.</p>\n";
    echo "<p class = pa >'ऋत्विग्दधृक्स्रग्दिगञ्चुयुजिक्रुञ्चां च' इत्यनेन नलोपाभावोऽपि निपात्यते ।</p>\n";
    display(0); */
	$kruJca=1;
} else { $kruJca = 0; }
/* defining dhatus with 'i' as it */
if (arr($text,'/hiMs\+/'))
{
    $it=array_merge($it,array("i"));
    $itprakriti=array_merge($it,array("i"));
}
/* aniditAM hala upadhAyAH kGiti (6.4.24) */ 
if ( !itcheck(array("i"),1) && arr($text,'/[nM]['.pc('hl').'][+]/') && ( itcheck(array("k","N"),1)|| $ancu===1 ) && !($kruJca===1 && sub(array("krunc","kruYc"),blank(0),blank(0),0) ) && $nance===0 && $so!=="mahiN" && !(arr($text,'/[NYRnmM]['.pc('hl').'][+]a[+]/') && in_array("Sap",$vik)) && $lakAra!=="viDiliN" && $verbset!=="ruDAdi" && $aniditAm!==1)
{
    $text = three(array("n","M"),$hl,array("+"),array("",""),$hl,array("+"),0);        
	storedata('6.4.24','sa',0);
    $aniditAm = 1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
}
/* samaH sami (6.3.93) */ 
if (preg_match('/[s][a][m][a][n][c]/',$fo) && sub(array("anc","Anc"),array("+"),blank(0),0) && $ancu===1)
{
    $text = two(array("samac"),array("+"),array("samiac"),array("+"),0);
	storedata('6.3.93','sa',0);
}
/* sahasya sadhriH (6.3.95) */ 
if (preg_match('/[s][a][h][a][a][n][c]/',$fo) && sub(array("anc","Anc"),array("+"),blank(0),0) && $ancu===1)
{
    $text = two(array("sahaac"),array("+"),array("saDriac"),array("+"),0);
	storedata('6.3.95','sa',0);
}
/* tirasastiryalope (6.3.94) */
if (preg_match('/[t][i][r][a][s][a][n][c]/',$fo) && sub(array("anc","Anc","ac","Ac"),array("+"),blank(0),0) && $bham===0 && $ancu===1)
{
    $text = two(array("tirasac","tirasanc"),array("+"),array("tiriac","tirianc"),array("+"),0);
	storedata('6.3.94','sa',0);
}
/* atvasantasya cAdhAtoH (6.4.14) */
if ($atu==1 && $dhatu===1 )
{
	// Pending to refactor.
/*    echo "<p class = pa >cAdhAtoH means that atvasantasya cAdhAtoH (".link_sutra("6.4.14").") will not apply. :</p>\n";
    echo "<p class = pa >चाधातोः से अत्वसन्तस्य चाधातोः (६.४.१४) का प्रयोग बाधित होता है । :</p>\n";
    display(0);*/
}
elseif ( ( $atu===1  )  && $so==="su!" && $sambuddhi===0 )
{
    $text = two($ac,array("t+"),$acdir,array("t+"),0);
   $text = one(array("as+"),array("As+"),0);
	storedata('6.4.14','sa',3);
}
/* ugidacAM sarvanAmasthAne'dhAtoH (7.1.70) */ 
if (arr($text,'/Bava/') && sub(array("BavantI","BavatI"),array("+"),blank(0),0))
{
    $sarvanamasthana1 = 0;
}
if ($atu===1 && !itcheck(array("u"),1) && $sarvanamasthana1===1 )
    {
		// Pending to refactor
/*    echo "<p class = pa >Because the word is not ugit; ugidacAM doesn't apply. </p>\n";
    echo "<p class = pa >उगितत्त्वाभावान्न नुम्‌ ।</p>\n";      
    display(0);*/
    }
if ($sarvanamasthana1===1 && ( ($ancu===0 && $dhatu===1)  ) && $kruJca===0 && arr(array($fo),'/[a][t]$/'))
    {
		// Pending to refactor
/*    echo "<p class = pa >'ac' is for restricting the application of 'ugidacAm...' to aYcu if the word is a dhAtu. </p>\n";
    echo "<p class = pa >धातोश्चेदुगित्कार्यं तर्ह्यञ्चतेरेव ।</p>\n";      
    display(0);*/
    }
if ($debug===1) {dibug("9000");}
//if ($sarvanamasthana1===1 && $nAbhyasta===0 &&  (( $dhatu===0 && arr($text,'/[uUfFxX][!][+]/') ) ||  ($ancu===1 && $dhatu===1) ||  ( ($kvip===1 || $kvin===1)&& $dhatu===1 && arr(array($fo),'/[a][t]$/')) || $bhavat===1 ) && $kruJca===0 && $vAnapuMsaka===0)
if ($sarvanamasthana1===1 && !in_array(1,$num) && (( $dhatu===0 && itcheck(array("u","U","f","F","x","X"),1))  ||  ($ancu===1 && $kvin===1) ||  ( ($kvip===1 || $kvin===1)&& $dhatu===1 && arr(array($fo),'/[a][t]$/')) || $bhavat===1 ) && $aniditAm===0 && $GIS!==1 && $GIn!==1 && $GIp!==1) // added aniditAM for prAcI.
{
    $text = one(array("ac+","Ac+"),array("anc+","Anc+"),0);
    $text = three(blank(1),$hl,array("u!+","U!+","f!+","F!+","x!+"),array("n"),$hl,array("u!+","U!+","f!+","F!+","x!+"),0); $num=array_merge($num,array(1));
    $text = mit('/['.pc('hl').']/',"n",0);
     $text = one(array("annc"),array("anc"),0);
    $text = one(array("+In+"),array("+I+"),0);
	storedata('7.1.70','sa',3);
    if ( ($kvip===1 || $kvin===1)&& $dhatu===1)
    {
		// Pending to refactor
/*    echo "<p class = hn >'adhAtoH' extends the application of this rule to the words which had adhAtu in the first place.</p>\n";
    echo "<p class = hn >'अधातोः' इति त्वधातुभूतपूर्वस्यापि नुमर्थम्‌ ।</p>\n";                */
    }
    if ($nance===1)
    {
		// Pending to refactor
/*        $text = one(array("goannc"),array("goanc"),0); // patch to remove duplication of nakAra.
        echo "<p class = hn >As there is no lopa of nakAra, 'ugidacAm..' doesn't apply.</p>\n";
        echo "<p class = hn >अलुप्तनकारत्वात्‌ न नुम्‌ ।</p>\n";*/
    }
    $ugidacAm=1;  // 0 - this sUtra has not applied. 1 - this sUtra has applied.
}  else {$ugidacAm=0; }
/* uda It (6.4.139) */ 
if (preg_match('/[u][d][a][n][c]/',$fo) && $aniditAm === 1 && sub(array("ac","Ac"),array("+"),blank(0),0) && ($bham===1 || sub(array("ac","Ac"),array("+"),array("I+"),0)) && $ancu===1)
{
    $text = two(array("ac","Ac"),array("+"),array("Ic","Ic"),array("+"),0);
	storedata('6.4.139','sa',3);
}
/* acaH (6.4.138) */ 
if ( preg_match('/[aA][n][c]/',$fo) && $aniditAm === 1 && sub(array("ac","Ac"),array("+"),blank(0),0) && ($bham===1 || sub(array("ac","Ac"),array("+"),array("I+"),0)) && $ancu===1)
{
    if (sub(array("i","I","u","U","f","F","x","X","y","v"),prat('ac'),array("c"),0))
    {
		storedata('par@56','pa',0);
		// Pending to refactor
/*    echo "<p class = pa >Though iko yaNaci is antaraGga than lopa by acaH, its application is barred by 'akRtavyUhAH pANinIyAH (pa 57).</p>\n";
    echo "<p class = pa >इको यणचि से प्राप्त यण्‌ अन्तरङ्ग होने पर भी अकृतव्यूहाः पाणिनीयाः (प ५७) से वह अचः का बाध नहीं करता ।</p>\n";
    display(0);        */
    }
    $text = two(array("yac","ac","Ac"),array("+"),array("ic","c","ac"),array("+"),0);
    echo "<p class = sa >acaH (".link_sutra("6.4.138").") :</p>\n";
    echo "<p class = sa >अचः (६.४.१३८) :</p>\n";
    if ($nance===1)
    {
		// Pending to refactor
/*    echo "<p class = hn >As there is no lopa of nakAra in nAJceH pUjAyAm, there is not akAralopa.</p>\n";
    echo "<p class = hn >नलोपाभावादकारलोपो न ।</p>\n";        */
    }
    $acaH=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
} else { $acaH=0; }
/* cau (6.3.138) */ 
if ( $acaH===1)
{
    $text = three($ac,array("c","c"),array("+"),$acdir,array("c","c"),array("+"),0);
	storedata('6.3.138','sa',3);
}
/* ambArthanadyorhrasvaH (7.3.103) */
if (arr($text,'/amb/') && sub(array("ambAqA","ambAlA","ambikA"),array("+"),blank(0),0) && $sambuddhi===1 && $so==="su!")
{
	storedata('7.3.107-2','pa',0); // Pending to check the number.
}
if ($sambuddhi===1 &&  ($nadi!==0 || ends(array($fo),array("ambA","akkA","allA"),1)) && $so==="su!")
{
    if ($nadi===1 || ends(array($fo),array("ambA","akkA","allA"),1))
    {
    $text = two(array("A","I","U"),array("+"),array("a","i","u"),array("+"),0);        
    }
    else
    {
    $text = two(array("A","I","U"),array("+"),array("a","i","u"),array("+"),1);        
    }
	storedata('7.3.103','sa',3);
    $amba = 1; // 0 - ambArthanadyorhrasva has not applied. 1 - ambArthanadyorhrasva has applied.
} else { $amba = 0; }
/* shatR */
if ($shatR===1)
{
    $it=array_merge($it,array("f"));
    $itprakriti=array_merge($itprakriti,array("f"));
}
/* nAbhyAsAcChatuH (7.1.78) */
if ($abhyasta===1 && $shatR===1 && itcheck(array("f"),1) && $gender!=="n")
{
	storedata('7.1.78','sa',0);
    $nAbhyasta=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
} else { $nAbhyasta=0; }
/* vA napuMsakasya (7.1.79) */  
if ($abhyasta===1 && $shatR===1 && itcheck(array("f"),1) && $gender==="n")
{
    $text = mit('/['.pc('hl').'][+]/','n',1); $num=array_merge($num,array(1));
    $text = one(array("annc"),array("anc"),0);
	storedata('7.1.79','sa',0);
    $vAnapuMsaka=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
} else { $vAnapuMsaka=0; }
/* special message for ikAra of kvip, kvin etc. */
if (arr($text,'/[+][v][i]$/')&& in_array($so,array("kvip","kvin")) && $taddhita === 0  && $sarva === 0 )
{
    $text = last(array("vi"),array("v"),0);
	// Pending to refactor.
/*    echo "<p class = sa >ikAra after 'v' in kvip, kvin etc are for fecility of pronounciation only.</p>\n";
    echo "<p class = sa >क्विप्‌, क्विन्‌ इत्यादि में वकार के बाद का इकार उच्चारणार्थ ही होता है ।</p>\n";
    display(0);*/
}
if ($debug===1) {dibug("9100");}
/* verapRktasya (3.1.67) */
if (arr($text,'/[+][v]$/')&& in_array($so,array("kvip","kvin")) && $taddhita === 0  && $sarva === 0 )
{
    $text = last(array("v"),array(""),0);
	storedata('3.1.67','sa',0);
}
/* GasiGasozca (6.1.110) */
if (arr($text,'/[eo][+]/') && in_array($so,array("Nasi!","Nas")))
{
    $text = two(array("e+","o+"),array("a"),array("e+","o+"),array(""),0);
	storedata('6.1.110','sa',0);
}
/* hrasvanadyApo nuT (7.1.54) */
if ( $so === "Am" && $numacira===0 && arr($text,'/[aiufx][+][A][m]/') )
{
    $text = two($hrasva,array("+Am"),$hrasva,array("+nAm"),0);
	storedata('7.1.54','sa',3);
} 
if ( $so === "Am" && $numacira===0 && $nadi!==0 )//&& arr($text,'/[IU][+][A][m]/') )
{
    if ($nadi===2)
    {
    $text = two(array("I","U"),array("+Am"),array("I","U"),array("+nAm"),1);        
    }
    else
    {
    $text = two(array("I","U"),array("+Am"),array("I","U"),array("+nAm"),0);        
    }
	storedata('7.1.54','sa',3);
}
if ( $so === "Am" && $numacira===0 && $Ap===1 && arr($text,'/[A][+][A][m]/'))
{
    $text = two(array("A"),array("+Am"),array("A"),array("+nAm"),0);
	storedata('7.1.54','sa',3);
}
/* bahUrji exception to napuMsakasya jhalacaH (7.1.72) */ 
if ( $gender==="n" && $sarvanamasthana1===1 && sub(array("bahUrj"),blank(0),blank(0),0) && arr($text,'/['.pc('Jl').'][+]/') && $amipUrva === 0)
{
    $text = two(array("bahUrj"),array("+"),array("bahUnrj"),array("+"),1);
	storedata('7.1.72-4','sa',0);
	storedata('7.1.72-5','sa',0);
    $bahurj=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
} else { $bahurj=0; }
/* beBid, cecCid exception to napuMsakasya jhalacaH (7.1.72) */ 
if ( $gender==="n" && $sarvanamasthana1===1 && $kvip===1 && sub(prat('Jl'),array("+"),blank(0),0) && in_array($so,array("jas","Sas")) && arr($text,'/['.pc('Jl').'][+]/') && $amipUrva === 0)
{
	// Pending to refactor.
/*    echo "<p class = pa >allopa behaves like sthAnivad, therefore num (because of jhalantatva) doesn't happen. sthAnivadbhAva doesn't happen in svavidhi. Therefore num (because of ajantatva) doesn't happen. </p>\n";
    echo "<p class = pa >शावल्लोपस्य स्थानिवत्त्वादझलन्तत्वान्न नुम्‌ । अजन्तलक्षणस्तु नुम्‌ न । स्वविधौ स्थानिवत्त्वाभावात्‌ । </p>\n";
    display(0); */
	$bebhid=1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
} else { $bebhid=0; } 
/* svap patch */
if ( $gender==="n" && $sarvanamasthana1===1 && arr($text,'/[A][n][p][+]/') && arr(array($fo),'/[a][p]$/') && $amipUrva === 0 && $nAbhyasta===0)
{
    $text = two(array("Anp"),array("+"),array("anp"),array("+"),1);
	// Pending to refactor.
/*    echo "<p class = sa >'niravakAzatvaM pratipadoktatvam' mandates non application of dIrghatva here.  :</p>\n";
    echo "<p class = sa >'निरवकाशं प्रतिपदोक्तत्वम्‌' इति पक्षे तु प्रकृते तद्विरहात्‌ नुमेव । :</p>\n";
    display(3);*/
} 
/* napuMsakasya jhalacaH (7.1.72) */ 
// right now supuMs is giving ugidacAM and not napuMsakasya jhalacaH. Pending to correct.
if ( $gender==="n" && $sarvanamasthana1===1 && arr($text,'/['.pc('ac').'][+]/') && $amipUrva === 0 && $nAbhyasta===0)
{
    $text = mit('/['.pc('ac').'][+]/','n',0);
	storedata('7.1.72','sa',3);
}
if ( $gender==="n" && $sarvanamasthana1===1 && arr($text,'/['.pc('Jl').'][+]/') && $amipUrva === 0 && $bahurj===0 && $bebhid===0 && $ugidacAm===0 && $nAbhyasta===0 && $vAnapuMsaka===0)
{
    $text = mit('/['.pc('Jl').'][+]/','n',0);
	storedata('7.1.72','sa',3);
}
/* sarvanAmasthAne cAsambuddhau (6.4.8) */
$acdir = array("A","A","I","I","U","U","F","F","F","F","e","o","E","O",);
if (arr($text,'/['.flat($ac).'][n][+]/') && !arr($text,'/['.flat($ac).'][n][+]$/') && !in_array(1,$num) && !sub(array("Ahan"),blank(0),blank(0),0) && $sarvanamasthana1===1 && $sambuddhi===0 && $inhan===0 && $inhan1===0 && $aptRn===0 && $casambu!==1)
{
    $text = two($ac,array("n+"),$acdir,array("n+"),0);
	storedata('1.1.65','pa',0);
	storedata('6.4.8','sa',3);
}
/* dRnkarapunaHpUrvasya bhuvo yaN vaktavyaH (vA 4118) */ 
if ($dhatu===1 && in_array($fo,array("dfnBU","karaBU","kAraBU","punarBU"))  && in_array($so,$acsup))
{
    $text = three(array("dfnBU","punarBU"),array("+"),$ac,array("dfnBv","punarBv"),array("+"),$ac,0);
    $text = three(array("karaBU","kAraBU"),array("+"),$ac,array("karaBv","kAraBv",),array("+"),$ac,1);
	// Pending to refactor.
//    echo "<p class = sa >By dRnkarapunaHpUrvasya bhuvo yaN vaktavyaH (vA 4118) :</p>\n";
    if (in_array($fo,array("karaBU","kAraBU")))
    {
    $text=one(array("karaBv+e","karaBU+A+e","karaBv+as","karaBU+A+as","karaBv+i","karaBU+Am","kAraBv+e","kAraBU+A+e","kAraBv+as","kAraBU+A+as","kAraBv+i","kAraBU+Am"),array("karaBU+e","karaBv+A+e","karaBU+as","karaBv+A+as","karaBU+i","karaBv+Am","kAraBU+e","kAraBv+A+e","kAraBU+as","kAraBv+A+as","kAraBU+i","kAraBv+Am",),0);
//    echo "<p class = hn >There is pAThabheda here. Some hold that there is dIrgha kAra word here. SK has adopted both the readings, therefore we have kept them optional.</p>\n";        
    }
//    echo "<p class = sa >दृन्करपुनःपूर्वस्य भुवो यण्‌ वक्तव्यः (वा ४११८) :</p>\n";
    if (in_array($fo,array("karaBU","kAraBU")))
    {
//    echo "<p class = hn >दीर्घपाठे करपूर्वस्य उवङेव । ह्रस्वपाठे करपूर्वस्य यणेव इति विवेकः ।</p>\n";                
    }
}   
if ($debug===1) {dibug("9200");}
/* varSAbhvazca (6.4.84) */ 
if ($dhatu===1 && $first==="varzABU" && in_array($so,$acsup))
{
    $text = two(array("varzABU"),array("+"),array("varzABv"),array("+"),0);
	storedata('6.4.84','sa',3);
}

if ($fo==="dfmBU")
{
    $dfmBU=1; // 0 - the word is not dRmbhU. 1 - the word is dRmbhU.
} else { $dfmBU=0; }
/* na bhUsudhiyoH (6.4.85) */
if (in_array($fo,array("suDI","praDI")) && $gender==="n")
{
    $dhatu=1;
}
if (in_array($fo,array("praDI")) && $gender==="n")
{
   $eranekaca=1;
}
if ( $dhatu===1 && (arr($text,'/[B][U][+]/')||$fo==="suDI") && arr($text,'/[iuIU][+]['.flat($ac).']/') && in_array($so,$sup) && $dfmBU===0)
{
	storedata('6.4.85','sa',3);
    $nabhusu = 1; // 0 - the word neither ends with bhU, nor is it sudhI. 1 - The word ends with bhU or is sudhI.
} else { $nabhusu = 0; }
/* kvau luptaM na sthAnivat (vA 431) */
// Not displayed because it is difficult to teach sthnanivadbhav to machine now. Will come back to it if I can teach it some day.
/* aci znudhAtubhruvAM yvoriyaGuvaGau (6.4.77) */
if (($dhatu===1||$fo==="BrU") && arr($text,'/[iuIU][+]*['.flat($ac).']/') && $pada==="pratyaya" && ($eranekaca===0 || ($eranekaca===1 && anekAca($fo)===false ) || (arr($text,'/[B][U][+]/')||$fo==="suDI") ) && $dfmBU===0 && !sub(array("+"),array("I"),array("+"),0) && $sIyuT!==1)
{
    $text = change('/([iI])([+]*['.pc('ac').'])/','iy$2');
    $text = change('/([uU])([+]*['.pc('ac').'])/','uv$2');
	storedata('6.4.77','sa',0);
}
/* gatikAraketarapUrvapadasya yaN neSyate (vA 5034) */
// This is attached with eranekAco... So, trying to put a note and making the iyaG and yaN optional.
/* eranekAco'saMyogapUrvasya (6.4.82) */
if ($dhatu===1 && arr($text,'/[iI][+]['.pc('ac').']/') && in_array($fo,array("unnI")) && $pada==="pratyaya" && anekAca($fo) && $eranekaca===1 && $nabhusu===0)
{
	// Pending to refactor.
/*    echo "<p class = pa >As the vizeSaNa 'dhAtunA saMyogasya' mandates that the saMyoga has to belong to dhAtu only for prohibiting 'eranekAco..', the prohibition doesn't apply here.</p>\n";
    echo "<p class = pa >धातुना संयोगस्य विशेषणादिह स्यादेव यण्‌ (एरनेकाचो इत्यनेन सूत्रेण) </p>\n";
    display(0); */
    $unni=1; // 0 - the word is not unnI. 1 - the word is unnI
} else { $unni=0; } 
if ($dhatu===1 && (arr($text,'/['.flat($ac).']['.flat($hl).'][iI][+]['.flat($ac).']/')||$unni===1) && $pada==="pratyaya" && anekAca($fo) && $eranekaca!==0 && $nabhusu===0)
{
    $text = three(array("i","I"),array("+"),$ac,array("y","y"),array("+"),$ac,0);                
	storedata('6.4.82','sa',3);
}
/* oH supi (6.4.83) */ 
if ($dhatu===1 && in_array($fo,array("ullU")) && $pada==="pratyaya" && anekAca($fo) && $$eranekaca===1 && $nabhusu===0 && in_array($so,$sup) && $dfmBU===0)
{
	// Pending to refactor.
/*    echo "<p class = pa >As the vizeSaNa 'dhAtunA saMyogasya' mandates that the saMyoga has to belong to dhAtu only for prohibiting 'oH supi', the prohibition doesn't apply here.</p>\n";
    echo "<p class = pa >धातुना संयोगस्य विशेषणादिह स्यादेव यण्‌ (ओः सुपि इत्यनेन सूत्रेण) </p>\n";
    display(0); */
    $ullU=1; // 0 - word is not ullU. 1 - word is ullU.
} else { $ullU=0; }
if ($dhatu===1 && ( arr($text,'/[uU][+]['.flat($ac).']/') || $ullU===1 )&& $pada==="pratyaya" && anekAca($fo) && $eranekaca===1 && $nabhusu===0 && in_array($so,$sup) && $dfmBU===0)
{
    $text = three(array("u","U"),array("+"),$ac,array("v","v"),array("+"),$ac,0);
	storedata('6.4.83','sa',3);
}
/* patch to remove application of jhalAM jazo'nte in case wAp in kruJcA and NIp in bhavantI */
if ($gender==="f")
{
    $text = three($hl,array("+A","+I"),array("+"),$hl,array("A","I"),array("+"),0);    
}
/* ami pUrvaH (6.1.107) */
if ( arr($text,'/[aAiIuUfFx]\+am/'))
{
    $text = two(array("a","A","i","I","u","U","f","F","x"),array("am"),array("a","A","i","I","u","U","f","F","x"),array("m"),0);
	storedata('6.1.107','sa',0);
    $amipUrva = 1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
}   else { $amipUrva = 0; } 
/* sAntamahataH saMyogasya (6.4.10) */
if ( ( (arr($text,'/['.flat($ac).'][nM][s][+]/') && $dhatu===1)|| $fo==="mahat" )&& $sarvanamasthana1===1 && $sambuddhi===0)
{
	// Pending to refactor
/*    echo "<p class = pa >sAntamahataH saMyogasya (".link_sutra("6.4.10").") doesn't apply here. </p>\n";
    echo "<p class = pa >सान्तमहतः संयोगस्य (६.४.१०) इत्यत्र सान्तसंयोगोऽपि प्रातिपदिकस्यैव गृह्यते, न तु धातोः, महच्छब्दसाहचर्यात्‌ ।</p>\n";    
    display(0);*/
} 
if ( ( (arr($text,'/['.flat($ac).'][nM][s][+]/') && $dhatu===0)|| $fo==="mahat" )&& $sarvanamasthana1===1 && $sambuddhi===0)
{
	storedata('1.1.65','pa',0);
    $text = two($ac,array("ns+","Ms+"),$acdir,array("ns+","Ms+"),0);
    $text = one(array("mahant"),array("mahAnt"),0);
	storedata('6.4.10','sa',0);
}
if (arr($text,'/['.flat($ac).'][nM][s][+]/') && ends(array($fo),array("mahat"),1) && $sarvanamasthana1===1 && $sambuddhi===0)
{
	storedata('1.1.65','pa',0);
    $text = two($ac,array("ns+"),$acdir,array("ns+"),0);
	storedata('6.4.10','sa',0);
}
if ($debug===1) {dibug("9300");}
if ( ends(array($fo),array("Danuz"),1) && $sarvanamasthana1===1 && $sambuddhi===0)
{
    $text = two($ac,array("nz+"),$acdir,array("nz+"),0);
	storedata('6.4.10','sa',0);
	// Pending to refactor
/*    echo "<p class = pa >Because Satva is asiddha. </p>\n";
    echo "<p class = pa >षत्व के असिद्ध होने के कारण । </p>\n";   
    display(0);*/
}

/* Rta ut (6.1.111) */
if ( (arr($text,'/[fx][+][a]/')) && in_array($so,array("Nasi!","Nas")) && $pada==="pratyaya")
{
    $text = two(array("f","x"),array("+a"),array("ur","ul"),array("+"),0);
	storedata('6.1.111','sa',0);
    $text = one(array("r+s"),array("r"),0);
	storedata('8.2.24','sa',0);
}
/* auto'mzasoH (6.1.93) */
if (arr($text,'/o\+a') && in_array($so,array("am","Sas")))
{  
    $text = two(array("o"),array("+a"),array(""),array("+A"),0);
	storedata('6.1,93','sa',0);
}
/* ato bhisa ais (7.1.9) */
if (arr($text,'/[a][+]/') && $so === "Bis" && $nedamadas===0 && $fo!=="adas" )
{
    $text = two(array("a"),array("Bis"),array("a"),array("Es"),0);
	storedata('7.1.9','sa',5);
    $atobhis = 1; // 0 - this sUtra has not applied. 1 - this sUtra has applied.
} else { $atobhis = 0; }
/* yasyeti ca (6.4.148) */
if (arr($text,'/[aI][+][I]/') && $bham===1 && ($auGazyA===0))
{
    $text = two(array("a","I"),array("I"),array("",""),array("I"),0);
	storedata('6.4.148','sa',3);
}

/* do-while loop for sapAdasaptAdhyAyI */
// Most of alterations in prakRti and pratyayas are over before this stage. Now in next step we keep all rules of sapAdasaptAdhyAyI, and create a do-while loop.
// This do - while loop is necessary, because there is no order in which rules of sapAdasaptAdhyAyI will apply. This do - while loop will continue till the $text which is input is the same as output. 
// Therefore the cause for application may arise after application of any rule. So created a do-while loop which will check till the input and output are the same i.e. there is no difference after the application of all the sUtras.
// This will ensure that there is no rule of sapAdasaptAdhyAyI which would have applied, but didn't apply.

$start = 1; // remembering that this is the first round of application. After one loop, it will become 2. We have to stop application of some sUtras twice. There this is useful.
do  // starting the loop.
{
$original = $text ; // remembering the member entering the loop. We will have to compare it with the output.

/* osi ca (7.3.104) */
if ($so === "os" && arr($text,'/[a][+]/') && $start ===1)
{
    $text = two(array("a"),array($second),array("e"),array($second),0);
	storedata('7.3.104','sa',3);
}
/* na tisR.4.4) */
if ($so === "Am" && sub(array("tisf","catasf"),array("+"),blank(0),0))
{
	storedata('7.4.4','sa',3);
    $natisf=1; // 0 - no prevention of nAmi. 1 - prevention of nAmi.
} else { $natisf = 0; }
/* explanation of prarINAm */
if (arr($text,'/rI\+nAm/') && arr(array($fo),'/[r][E]$/'))
{
	// Pending to refactor
/*    echo "<p class = hn >According to mAdhava, rAyo hali applies here to convert it to prarANAm. But it is wrong according to Siddhantakaumudi.</p>\n";
    echo "<p class = hn >माधव के अनुसार यहाँ रायो हलि से आत्त्व होता है । परन्तु सिद्धान्तकौमुदी के अनुसार यह गलत है ।</p>\n";    
    display(0);*/
}   
/* nAmi (6.4.3) and nR ca (6.4.6) */
if (arr($text,'/['.flat($ac).'][+][n][A][m]$/') && $start ===1 && !in_array($fo,$sarvanama) && $natisf === 0)
{
    if(arr($text,'/[n][f][+][n][A][m]$/'))
    {
    $text = two(array("nf"),array("nAm"),array("nF"),array("nAm"),1);
	storedata('6.4.6','sa',3);
    }
    elseif (sub(array("a+"),array("nAm"),blank(0),0))
        {
			// Pending to refactor
        /*echo "<p class = pa >Even though, supi ca (".link_sutra("7.3.102").") is a parasUtra, it doesn't operate here. The causes are: (1) violation of sannipAtaparibhASA and (2) ArambhasAmarthya of 'nAmi'. :</p>\n";
        echo "<p class = pa >यद्यपि सुपि च (७.३.१०२) परसूत्र है, फिर भी उसकी प्रवृत्ति यहाँ नहीं होती है । सन्निपातपरिभाषा के विरोध से और नामि च सूत्र के प्रारम्भ के सामर्थ्य से । </p>\n";
        display(0);*/
        $text = two($ac,array("nAm"),array("A","A","I","I","U","U","F","F","F","F","e","E","o","O"),array("nAm"),0);
		storedata('6.4.3','sa',3);
        }
    else
        {
        $text = two($ac,array("nAm"),array("A","A","I","I","U","U","F","F","F","F","e","E","o","O"),array("nAm"),0);
		storedata('6.4.3','sa',3);
        }
 $nami = 1;  // 0 - doesn't prevent application of supi ca. 1 - prevents application of supi ca.
} 
else 
    {
    $nami = 0; 
    }
if ($debug===1) {dibug("9400");}
/* bahuvacane jhalyet (7.3.103) */
if ((in_array($so,array("Byas","sup","Bis")) || ($sut===1 && $sAmaAkam===0)) && arr($text,'/[a][+][Bs]/') && $start ===1)
{
    $text = two(array("a"),array("Byas","su","sAm","Bis"),array("e"),array("Byas","su","sAm","Bis"),0);
	storedata('7.3.103','sa',3);
    if (in_array($so,array("Byas","Bis")) && arr($text,'/[e][+][B]/'))
    {
		// Pending to refactor
//    echo "<p class = hn >This rule 'overrides supi ca'.</p>\n";        
    }
    if (in_array($so,array("Byas","Bis")) && arr($text,'/[e][+][B]/'))
    {
//    echo "<p class = hn >'सुपि च' इति दीर्घे प्राप्ते परत्वादस्य सूत्रस्य प्रवृत्तिः ।</p>\n";        
    }
    $bahuvacane = 1; // 0 - doesn't prevent application of supi ca. 1 - prevents application of supi ca.
} else { $bahuvacane = 0; }
/* supi ca (7.3.102) */
if (in_array($so,$sup) && arr($text,'/[a][+]['.pc('yY').']/') && $amipUrva===0 && $start === 1 && $bahuvacane === 0 && $nami === 0 && $Ne!==1)
{
    if (arr($text,'/[a][+]['.pc('yY').']/') && in_array($fo,array("idam","idakam")) )
    {
	storedata('1.1.21','sa',3);
    }
    $text = two(array("a"),array("+"),array("A"),array("+"),0);
	storedata('7.3.102','sa',3);
}
if ($Ne===1 && $start === 1)
{
    $text = one(array("a+ya"),array("A+ya"),0);
	storedata('7.3.102','sa',3);
	// Pending to refactor.
/*    echo "<p class = hn >'sannipAtalakSaNo vidhiranimittaM tadvighAtasya (pa 86) doesn't apply here. Its anityatva has been shown by kaSTAya kramaNe. </p>\n";
    echo "<p class = hn >'सन्निपातलक्षणो विधिरनिमित्तं तद्विघातस्य (प ८६) यहाँ लागू नहीं होता है । कष्टाय क्रमणे से उसका अनित्यत्व ज्ञापित होता है ।</p>\n";*/
}

/* pragRhya section */
/* plutapragRhyA aci nityam (6.1.125) */
// There is no definition of pluta / pragRhya here. So we will code that as and when case arises.
/* iko'savarNe zAkalyasya hrasvazca (6.1.127) */ // Right now coded for only dIrgha. Clarify wheter the hrasva preceding also included?
$ik = array("i","I","u","U","f","F","x","X");
$nonik = array("a","A","e","E","o","O");
if (arr($text,'/[iIuUfFxX]\+[aAeEoO]/') && $pada==="pada" && !in_array($so,$tiG) )
{
// for pragRhya, it is difficult to tell the machine that it is not to be combined. So we have added one additional space. e.g. "a" -> "a ".
$text = two(array("i+","I+"),array("a","A","u","U","f","F","x","X","e","o","E","O"),array("i +","i +"),array("a","A","u","U","f","F","x","X","e","o","E","O"),1);
$text = two(array("u+","U+"),array("a","A","i","I","f","F","x","X","e","o","E","O"),array("u +","u +"),array("a","A","i","I","f","F","x","X","e","o","E","O"),1);
$text = two(array("f+","F+"),array("a","A","u","U","i","I","e","o","E","O"),array("f +","f +"),array("a","A","u","U","i","I","e","o","E","O"),1);
$text = two(array("x+","X+"),array("a","A","u","U","i","I","e","o","E","O"),array("x +","x +"),array("a","A","u","U","i","I","e","o","E","O"),1);
storedata('6.1.127','sa',3);
}
/* upasargAdRti dhAtau (6.1.11) and vA supyApizaleH (6.1.12) */
$akarantaupasarga = array("pra","apa","ava","upa",);
$changedupasarga = array("prAr","apAr","avAr","upAr");
$changedupasarga1 = array("prar","apar","avar","upar");
$changedupasarga2 = array("prAl","apAl","avAl","upAl");
$changedupasarga3 = array("pral","apal","aval","upal");
// for $verbs_ru and $verbs_changed, please see function.php.
if (arr($text,'/f/') && (sub($akarantaupasarga,$verbs_ru,blank(0),0) && !sub(array("prafRa"),blank(0),blank(0),0))||sub($akarantaupasarga,array("xkArIy"),blank(0),0))
{
    if (arr($text,'/[I][y]/'))
    {
		$text = two($akarantaupasarga,$verbs_ru,$changedupasarga,$verbs_changed,1);
    }
    else
    {
        $text = two($akarantaupasarga,$verbs_ru,$changedupasarga,$verbs_changed,0);
    }
$text = two($akarantaupasarga,array("xkArIy"),$changedupasarga2,array("kArIy"),1);
$text = two($akarantaupasarga,array("xkArIy"),$changedupasarga3,array("kArIy"),0);
storedata('6.1.11','sa',0);
storedata('6.1.12','sa',0);
$upas = 1; // 0 - doesn't prevent application of RtyakaH. 1 - prevents application of RtyakaH.
} else { $upas = 0; }
/* RtyakaH (6.1.128) */
$ak = array("a","A","i","I","u","U","f","F","x","X"); 
$akrt = array("a ","A ","i ","I ","u ","U ","f ","F ","x ","X "); 
if (arr($text,'/['.flat($ak).'][+][fx]/') && $start===1 && $pada ==="pada" && $upas ===0 )
{
	if (sub($ak,array("f","x"),blank(0),0))
	{
	$text = two ($ak,array("f","x"),$akrt,array("f","x"),1);
	storedata('6.1.128','sa',0);
	}
}
if ($upas === 1)
{
	// Pending to refactor
/*    echo "<p class = hn >RtyakaH is barred by upasargAdRti dhAtau. </p>
    <p class = hn >ऋत्यकः उपसर्गादृति धातौ से बाधित हुआ है ।</p><hr>\n";*/
}
/* vAkyasya TeH pluta udAttaH (8.2.82) */
// This is adhikArasutra. Nothing to code here.
/* pratyabhivAde'zUdre (8.2.83) */
/* dUrAddhUte ca (8.2.84) */
/* haihe prayoge haihayoH (8.2.85) */
/* guronanRto'nantyasyApyekaikasya prAcAm (8.2.86) */
/* aplutavadupasthite (6.1.129) */
/* I3 cAkravarmaNasya (6.1.130) */
// These two are not possible to code, because it will depend on the speaker's choice. Maybe I will add some ajax for user feedback. Pending.
/* IdUdeddvivacanaM pragRhyam (1.1.11) */
// not possible to code till we get the word forms of all words and check whether it is dvivacana or not. Pending
/* adaso mAt (1.1.12) */
if (arr($text,'/amI/') && $fo === "amI" && $start===1)
{
$text = two (array("amI"),$ac,array("amI "),$ac,1);
storedata('1.1.12','sa',0);
}
if (sub(array("amU"),blank(0),blank(0),0)&& $fo === "amU" &&$start===1)
{
$text = two (array("amU"),$ac,array("amU "),$ac,1);
storedata('1.1.12','sa',0);
}
if ($debug===1) {dibug("9500");}
/* ze (1.1.13) */
// Not possible to know whether one form has ze or not. ajax for feedback pending.
/* nipAta ekAjanAG (1.1.14) */
$nipata = array("a","A","i","I","u","U","e","E","o","O"); // list of ekAc nipAta.
$nipata1 = array("a ","A ","i ","I ","u ","U ","e ","E ","o ","O "); // adding a space for pragRhya.
if (in_array($first,$nipata) && sub(array($first),$ac,blank(0),0) && $start===1)
{
$text = two ($nipata,$ac,$nipata1,$ac,0);
storedata('1.1.14','sa',0);
}
/* ot (1.1.15) */
$ot = array("o","aho","ho","utAho","aTo");
$ot1 = array("o ","aho ","ho ","utAho ","aTo ");
if (in_array($first,$ot) && sub(array($first),$ac,blank(0),0) && $start===1)
{
$text = two ($ot,$ac,$ot1,$ac,0);
storedata('1.1.15','sa',0);
}
/* sambuddhau zAkalyasyetAvanArSe (1.1.16) */
if (arr($text,'/[o][+]/') && $second === "iti" && $start===1)
{
$text = two(array($first),$ac,array($first." "),$ac,1);
storedata('1.1.16','sa',0);
}
/* UYaH (1.1.17) */
if ($first === "u" && $second === "iti" && $start===1)
{
$text = two(array("u"),array("iti"),array("u "),array("iti"),1);
storedata('1.1.17','sa',0);
}
/* U! (1.1.18) */ // Here ! has been used for anunAsika.
if ($first === "u" && $second === "iti" && $start===1)
{
$text = two(array("u"),array("iti"),array("U! "),array("iti"),1);
storedata('1.1.17','sa',0);
}
/* maya uYo vo vA (8.3.33) */
if (!in_array($so,$tiG) && arr($text,'/u/') && sub(array("Sam","kim","tvam","tad"),array("u"),$ac,0))
{
$text = three(array("Sam","kim","tvam","tad"),array("u"),$ac,array("Sam","kim","tvam","tad"),array("v"),$ac,1);
storedata('8.3.33','sa',0);
}
/* IdUtau ca saptamyarthe (1.1.19) */
/*$idut = array("I","U"); $idut1 = array("I ","U ");
if (preg_match('/[IU]$/',$first) && sub(array("I","U"),$ac,blank(0),0) && $pada ==="pada")
{
$text = two($idut,$ac,$idut1,$ac,1);
storedata('1.1.19','sa',0);
}*/ // vedic in nature. gives too many wrong results. commented right now.
/* zakandhvAdiSu pararUpaM vAcyam (vA 3632) */
$shakandhu1 = array("Saka","karka","kula","manas","hala","lANgala","patan","mfta"); // first word of zakandhvAdi
$shakandhu2 = array("anDu","anDu","awA","IzA","IzA","IzA","aYjali","aRqa"); // second word of zakandhvAdi
$shakandhu = array("Sak","kark","kul","man","hal","lANgal","pat","mArt"); // replacement of first word.
if (!in_array($so,$tiG) && sub($shakandhu1,$shakandhu2,blank(0),0))
{
$text = two($shakandhu1,$shakandhu2,$shakandhu,$shakandhu2,0);
storedata('6.1.94-4','sa',0);
}
$shakandhu1 = array("sIman","sAra"); // ajax possible. pending.
$shakandhu2 = array("anta","aNga");
$shakandhu = array("sIm","sAr");
if (!in_array($so,$tiG) && sub($shakandhu1,$shakandhu2,blank(0),0))
{
$text = two($shakandhu1,$shakandhu2,$shakandhu,$shakandhu2,1);
$text = one(array("sIman+ant","sAra+aNg"),array("sIm+Ant","sAr+ANg"),0);
storedata('6.1.94-4','sa',0);
// Pending to refactor.
/*echo  "<p class = hn >Note: the sImanta - kezaveSa and sAraGga - pazu/pakSI - Then only this will apply.</p>\n";
echo  "<p class = hn >यदि सीमन्त केशवेश के अर्थ में और सारङ्ग पशु-पक्षी के अर्थ में प्रयुक्त हुए हो, तभी यह नियम लागू होता है ।</p>\n";*/
}
/* omAGozca (6.1.95) */ 
$aag = array("om","OM","Aj","Acy","AYc","Anakt","Att","As","er","Eray","okz","ArcC","Arpit","Ohyat","oQ","arSyAt"); // list for OM and AG.
if (!in_array($so,$tiG) && sub(array("a","A"),$aag,blank(0),0))
{ 
$text = two(array("a","A"),array("om","OM"),blank(2),array("om","om"),0);
$text = two(array("a","A"),$aag,blank(2),$aag,0);
storedata('6.1.95','sa',0);
}
/* ATazca (6.1.90) */
if (arr($tex,'/A['.pc('ac').']/') && in_array("Aw",$Agama) )
{
$text = two(array("A"),$ac,array(""),vriddhi($ac),0);
storedata('6.1.90','sa',0);
}
/* striyAH (6.4.79) */
if (ends(array($fo),array("strI","stri"),1) && arr($text,'/[s][t][r][Ii][+]['.pc('ac').']/') && in_array($so,$acsup) && !in_array($so,array("am","Sas","Am")))
{
    $text = one(array("strI+","stri+"),array("striy+","striy+"),0);
	storedata('6.4.79','sa',3);
}
if ($debug===1) {dibug("9600");}
/* nAdici (6.1.104) */
$ic = array("i","I","u","U","f","F","x","X","e","o","E","O");
if (arr($text,'/[a][+]['.flat($ic).']/') && !arr($text,'/[a][+][aA]/') && (in_array($so,$prathama)))
{
	storedata('6.1.104','sa',0);
    $nadici = 1; // 0 - this rule has not applied. 1 - this rule has applied.
} else { $nadici = 0; }
/* dIrghAjjasi ca (6.1.105) */
if ((arr($text,'/[AIUFeEoO][+]['.flat($ic).']/')||((arr($text,'/[AIUFeEoO]\+as/')) && $so==="jas")) && (in_array($so,$prathama)))
{
	storedata('6.1.105','sa',0);
    $nadici1 = 1; // 0 - this rule has not applied. 1 - this rule has applied.
} else { $nadici1 = 0; } 
/* prathamayoH pUrvasavarNaH (6.1.102) */ 
// Not coded well. Please revisit.
$ak = array("a","A","i","I","u","U","f","F","x","X"); 
$akreplace = array("A","A","I","I","U","U","F","F","F","X");
if (arr($text,'/[aAiIuUfFxX]\+[aO]/') && in_array($so,$prathama)  && $nadici === 0 && $nadici1 === 0)
{
    if (sub(array("a"),array("a","O"),blank(0),0)&& in_array($so,$prathama)  && $nadici === 0 && $nadici1 === 0)
    {
		storedata('par@59','pa',0);
		// Pending to refactor.
/*        echo "<p class = hn >ato guNe (".link_sutra("6.1.96").") is exception to only akaH savarNe dIrghaH (".link_sutra("6.1.101").") and not to prathamayoH pUrvasavarNaH (".link_sutra("6.1.102")."), because of the paribhASA 'purastAdapavAdA anantarAnvidhInbAdhante nottarAn (pa 60). Therefore pURvasavarNadIrgha can occur. :</p>\n";
        echo "<p class = hn >'पुरस्तादपवादा अनन्तरान्विधीन्बाधन्ते नोत्तरान्‌ (प ६०) परिभाषा के कारण अतो गुणे (६.१.९६) सिर्फ अकः सवर्णे दीर्घः (६.१.१०१) का अपवाद है, प्रथमयोः पूर्वसवर्णः (६.१.१०२) का नहीं । अतः पूर्वसवर्णदीर्घ हो सकता है ।</p>\n";
        display (0);*/
    }
    $text = two($ak,array("a","O"),$akreplace,array("",""),0);
	storedata('6.1.102','sa',0);
    $prathamayoh = 1; // 0 - this rule has not applied. 1 - this rule has applied. Useful in tasmAcCaso naH puMsi.
} else { $prathamayoh = 0; }
/* tasmAcChaso naH puMsi (6.1.103) */
if ($prathamayoh ===1 && $so === "Sas" && $gender==="m")
{
    $text = one(array("+s"),array("+n"),0);
	storedata('6.1.103','sa',0);
}
/* Rti savarNe R vA (vA 3640) and lRti savarNe lR vA (vA 3641) */
$ruti1 = array("f","F","x","X");
$ruti2 = array("f");
$lruti2 = array("x");
if (arr($text,'/[fFxX][+]*[fx]/'))
{
$text = two($ruti1,array("f"),blank(count($ruti1)),$ruti2,1);
$text = two($ruti1,array("x"),blank(count($ruti1)),$lruti2,1);
storedata('6.1.101-1','sa',0);
storedata('6.1.101-2','sa',0);
}
/* akaH savarNe dIrghaH (6.1.101) */ 
$ak1 = array("a","a","A","A","i","i","I","I","u","u","U","U","f","f","F","F","f","f","F","F","x","x","X","X","x","x","X","X");
$ak2 = array("a","A","a","A","i","I","i","I","u","U","u","U","f","F","f","F","x","X","x","X","f","F","f","F","x","X","x","X");
if (arr($text,'/[aAiIuUfFxX][+]*[aAiIuUfFxX]/') && sub($ak1,$ak2,blank(28),1))
{
$text = two(array("a","A"),array("a","A"),array("A","A"),blank(2),0);
$text = two(array("i","I"),array("i","I"),array("I","I"),blank(2),0);
$text = two(array("u","U"),array("u","U"),array("U","U"),blank(2),0);
$text = two(array("f","F","x","X"),array("f","F","x","X"),array("F","F","F","F"),blank(4),0);
$text = two(array("x","X"),array("x","X"),array("F","F"),blank(2),0);
storedata('6.1.101','sa',0);
}
/* ato guNe (6.1.97) */
if (arr($text,'/[a][+]*[aeo]/') && sub(array("a"),array("a","e","o"),blank(0),0) && !sub(array("pra","upa"),array("a","e","o"),blank(0),0) && $pada === "pratyaya" )
{
    $text = two(array("a"),array("a","e","o"),blank(1),array("a","e","o"),0);
	storedata('6.1.97','sa',0);
}
/* hrasvasya guNaH (7.3.108) */ 
if (arr($text,'/[iufx][+][s]/') && $so==="su!" && $sambuddhi===1 && $amba===0)
{
    $text = two(array("i","u","f","x"),array("+"),array("e","o","ar","al"),array("+"),0);
	storedata('7.3.108','sa',3);
}
if (arr($text,'/[iufx][+]$/') && $so==="su!" && $sambuddhi===1 && $svamo===1)
{
    $text = two(array("i","u","f","x"),array("+"),array("e","o","ar","al"),array("+"),1);
	storedata('7.3.108','sa',3);
}
/* halGyAbbhyo dIrghAtsutisyapRktaM hal (6.1.68) and apRkta ekAlpratyayaH (1.2.41) */
// GyAp pending. only hal handled now.
if ((arr($text,'/['.pc('hl').'][+][sts]$/') || $GI===1 || $Ap===1 )&& in_array($so,array("su!","ti","si",)))
{
	storedata('1.2.41','pa',0);
}
if ((arr($text,'/['.pc('hl').'][+][sts]$/')  )&& in_array($so,array("su!","ti","si")))
{
    $text = two($hl,array("+s","+t"),$hl,array("+","+"),0);
	storedata('6.1.68','sa',0);
    $pada="pada"; // there is no pratyaya left now.
}
if ($GI===1 && arr($text,'/[I][+][st]$/') && in_array($so,array("su!","ti","si")))
{
    $text = two(array("I"),array("+s","+t"),array("I"),array("+","+"),0);
	storedata('6.1.68','sa',0);
    $pada="pada"; // there is no pratyaya left now.
}
if ( $Ap===1 && sub(array("A"),array("+"),array("s","t"),0) && in_array($so,array("su!","ti","si")))
{
    $text = two(array("A"),array("+s","+t"),array("A"),array("+","+"),0);
	storedata('6.1.68','sa',0);
    $pada="pada"; // there is no pratyaya left now.
}
if ($debug===1) {dibug("9700");}
/* patch for varShABU sambodhana */
if ($dhatu===1 && $first==="varzABU" && sub(array("varzABU"),array("+"),array("s"),0) && $pada==="pratyaya" )
{
    $text = two(array("varzABU"),array("+"),array("varzABu"),array("+"),1);
	// Pending to refactor
/*    echo "<p class = sa >kaiyaTa believes it to be 'he varSAbhUH'. The alternative belief is 'he varSAbhu'.</p>\n";
    echo "<p class = sa >भेकजातौ नित्यस्त्रीत्वाभावाद्‌ हे वर्षाभूः कैयटमते । मतान्तरे तु हे वर्षाभु ।</p>\n";
    display(0);*/
}

/* eGhrasvAtsambuddheH (6.1.69) and ekavacanaM sambuddhiH (2.3.49) */ // removed the last letter, not as in sutra. Look out for issues if any crops up.
if ($sambuddhi === 1 && $so === "su!" && (sub($hrasva,array("+"),array("s","m"),0)||sub(array("e","o"),array("+"),array("s","m"),0)) && arr($text,'/[+][sm]$/'))
{
   $text = one(array("a+s","i+s","u+s","f+s","x+s","e+s","o+s","a+m"),array("a+","i+","u+","f+","x+","e+","o+","a+"),0); // this was tried. But it gives wrong results in kroSTrI sambuddhi.
   /* foreach ($text as $value)
    {
        if(substr($value,-1)!=="+")
        {
            $value1[] = substr($value,0,strlen($value)-1);
        }
        else
        {
            $value1[] = $value;
        }
    }
    $text = $value1;
    $value1 = array();*/
	storedata('6.1.69','sa',0);
}
/* dazca (7.2.109) */
if ( in_array($fo,array("idam","idakam")) && in_array($so,$sup) && sub(array("ida","idak","idA","idAn",),blank(0),blank(0),0))
{
    $text = one(array("ida+","idak","idA+","idAn+","idakA+"),array("ima+","imak","imA+","imAn+","imakA+"),0);
	storedata('7.2.109','sa',3);
}
/* iko yaNaci (6.1.77) */
if(arr($text,'/[iIuU]([+]*)['.pc('ac').']/') && sub(array('i','I','u','U'),prat('ac'),blank(0),0))
{
$text = two(array('i','I','u','U'),prat('ac'),array('y','y','v','v'),prat('ac'),0);
storedata('6.1.77','sa',0);
}
if(arr($text,'/[fFxX]/') && sub(array("f","F","x","X"),prat('ac'),blank(0),0))
{
$text = two(array("f","F","x","X"),prat('ac'),array("r","r","l","l"),prat('ac'),0);
storedata('6.1.77','sa',0);
$sthanivadbhav = 1; // 0 - no sthAnivadbhAva. 1 - sthAnivadbhAva.
}
else
{
$sthanivadbhav = 0; 
}
/* sarvatra vibhASA goH (6.1.122) */ 
$go = array("go"); $aonly = array("a");
if(arr($text,'/go/') && sub($go,$aonly,blank(0),0) && ( $pada==="pada" || $bham===1 || sub(array("goanc"),blank(0),blank(0),0)))
{
$text = two($go,$aonly,array("go "),$aonly,1);
storedata('6.1.122','sa',0);
} 
/* avaG sphoTAyanasya (6.1.123) */ 
if (arr($text,'/go/') && sub($go,prat('ac'),blank(0),0) && ( $pada==="pada" || $bham===0 || sub(array("goanc"),blank(0),blank(0),0))  )
{
$text = two($go,prat('ac'),array('gava'),prat('ac'),1);
storedata('6.1.123','sa',0);
} 
/* indre ca (6.1.124) */
if (arr($text,'/indra/') && sub($go,array("indra"),blank(0),0)  && ( $pada==="pada" || $bham===1 || sub(array("goanc"),blank(0),blank(0),0)))
{
$text = two($go,array("indra"),array('gava'),array("indra"),0);
storedata('6.1.124','sa',0);
} 
/* eGaH padAntAdati (6.1.109) */ 
if (arr($text,'/[eo]([+]*)a/') && ( $pada==="pada" || sub(array("goanc"),blank(0),blank(0),0)))
{
    $text = two(prat('eN'),array("a"),prat('eN'),array("'"),0);
	storedata('6.1.`09','sa',0);
}
/* eco'yavAyAvaH (6.1.78) */
$ayavayavah = array("ay","av","Ay","Av");
if (arr($text,'/[eoEO]/') && sub(prat('ec'),prat('ac'),blank(0),0))
{
$text = two(prat('ec'),prat('ac'),$ayavayavah,prat('ac'),0);
storedata('6.1.78','sa',0);
}
/* dIdhIvevITAm (1.1.7) */
if (arr($text,'/[a][yv][i][t][A]$/') && in_array("iw",$Agama) && $ardhadhatuka===1 && in_array($so,$tiG) && $start===1)
{
	storedata('1.1.7','sa',0);
}
if ($debug===1) {dibug("9800");}
/* vAnto yi pratyaye (6.1.71), goryutau CandasyupasaMkhyAnam (vA 3543), adhvaparimANe ca (vA 3544) dhAtostannimittasyaiva (6.1.80) */
$o = array("o","O"); 
$oo = 'oO'; 
$y = array("y"); 
$ab = array("av","Av");
$dhato = array("urRo","ro","no","sno","kzo","kzRo","Do","Dro","do","dro","sro","so","ko","Go","qo","cyo","jyo","pro","plo","ro","ho","Sro","hno","dyo","sko","po","lo","kno","mo","Bo","urRO","rO","snO","kzO","kzRO","DO","DrO","dO","drO","srO","sO","kO","GO","qO","cyO","jyO","prO","plO","rO","hO","SrO","hnO","dyO","skO","pO","lO","knO","mO","BO","Co","zo","So");
$dhato1 = array("urRa","ra","na","sna","kza","kzRa","Da","Dra","da","dra","sra","sa","ka","Ga","qa","cya","jya","pra","pla","ra","ha","Sra","hna","dya","ska","pa","la","kna","ma","Ba","urRA","rA","snA","kzA","kzRA","DA","DrA","dA","drA","srA","sA","kA","GA","qA","cyA","jyA","prA","plA","rA","hA","SrA","hnA","dyA","skA","pA","lA","knA","mA","BA","Ca","za","Sa");
if ($type!=="tiGanta" && arr($text,'/o/') && sub($dhato,$y,blank(0),0) && $pada ==="pratyaya" && $start ===1)
{
$text = two($dhato,$y,$dhato1,array("vy"),0);
storedata('6.1.77','sa',0);
} 
if (arr($text,'/[oO][+]*[y]/') && $pada ==="pratyaya" && !sub($dhato,$y,blank(0),0))
{
    if (arr($text,'/gav[+]*y/'))
    {
    $text = two($o,$y,$ab,$y,0);
	storedata('6.1.71','sa',0);
    }
    elseif (arr($text,'/[oO][+]*yat/'))
    {
	storedata('6.1.77','sa',0);
    }
    else
    {
    $text = two($o,$y,$ab,$y,0);
	storedata('6.1.71','sa',0);
    }
}
/* kSayyajayyau zakyArthe (6.1.81)*/
if (arr($text,'/kze[+]*ya/') && $pada ==="pratyaya" && $start === 1 && !in_array($so,$tiG))
{
    $text = two(array("kze"),array("ya"),array("kzay"),array("ya"),1);
	storedata('6.1.81','sa',0);
}
if (arr($text,'/je[+]*ya/') && $pada ==="pratyaya" && $start === 1 && !in_array($so,$tiG))
{
    $text = two(array("je"),array("ya"),array("jay"),array("ya"),1);
	storedata('6.1.81','sa',0);
}
/* krayyastadarthe (6.1.82) */
if (arr($text,'/kre[+]*ya/') && $pada ==="pratyaya" && $start ===1 && !in_array($so,$tiG))
{    
    $text = two(array("kre"),array("ya"),array("kray"),array("ya"),1);
	storedata('6.1.82','sa',0);
}
/* khyatyAtparasya (6.1.112) */
if (arr($text,'/[Kt][y][+][a]/')  && arr(array($fo),'/[Kt][iI]$/') && in_array($so,array("Nasi!","Nas")) && $pada==="pratyaya")
{
    $text = three(array("Ky","ty"),array("+"),array("a"),array("Ky","ty"),array("+"),array("u"),0);
	storedata('6.1.112','sa',0);
}
if (arr($text,'/[mn]y\+/') && sub(array("lUny","kzAmy","prastImy"),array("+"),blank(0),0) && in_array($so,array("Nasi!","Nas")) && $pada==="pratyaya")
{
    $text = three(array("lUny","kzAmy","prastImy"),array("+"),array("a"),array("lUny","kzAmy","prastImy"),array("+"),array("u"),0);
	storedata('6.1.112','sa',0);
}

/* Exceptions to sasajuSo ruH */
/* etattadoH sulopo'konaJsamAse hali (6.1.132) */
if (arr($text,'/[sz]as/') && sub(array("sas","ezas"),$hl,blank(0),0)  && !sub(array("asa","anEza"),array("s"),$hl,0) && in_array($fo,array("sas","ezas")))
{
    $text = two(array("sas","ezas"),$hl,array("sa ","eza "),$hl,1);
	storedata('6.1.132','sa',0);
}
/* so'ci lope cetpAdapUraNam (6.1.134) */
//if (sub(array("sa"),array("s"),$ac,0))
if (arr($text,'/sas\+['.pc('ac').']/'))
{
    $text = three(array("sa"),array("s"),$ac,array("sa"),array(""),$ac,1);
	storedata('6.1.134','sa',0);
}
/* aniditAM patch for sraMs and dhvaMs */
// so that vasusraMsu.. may apply
if (arr($text,'/aMs/') && sub(array("sraMs","DvaMs"),blank(0),blank(0),0))
{
        $text = one(array("sraMs","DvaMs"),array("sras","Dvas"),0);
		storedata('6.4.24','sa',0);
        $aniditAm = 1;
}
/* vasusraMsudhvaMsvanaDuhAM daH (8.2.72) */
$vasu1 = array("sras","Dvas","anaquh");
if ($pada ==="pada" && sub($vasu1,array("+"),blank(0),0) )
{
    $text = two(array("sras","Dvas","anaquh"),array("+"),array("srad","Dvad","anaqud"),array("+"),0);
	storedata('8.2.72','sa',0);
}
if ((arr($text,'/vas\+/') && sub(array("vidvas","sedivas","uzivas","Suzruvas","upeyivas","anASvas"),array("+"),blank(0),0))  && $pada ==="pada" && !arr($text,'/[s][+]$/'))
{
    $text = one(array("vidvas","sedivas","uzivas","Suzruvas","upeyivas","anASvas"),array("vidvad","sedivad","uzivad","Suzruvad","upeyivad","anASvad"),0);
	storedata('8.2.72','sa',0);
}
/* saMyogAnta patch for asmad / yuSmad */
// make it more specific to asmad / yuSmad. Right now there is nothing in the condition which restricts its application to asmad / yuSmad.
if (arr($text,'/['.pc('hl').'][s]$/') )
{
    $text = last(array("nas","vas"),array("nass","vass"),0);
   $text = last(array("s"),array(""),0);
	storedata('8.2.23','sa',0);
}
if ($debug===1) {dibug("9900");}
/* patch for asiddhatva of SakAra of pratyaya as in pipaThiS */
// SakARa of pipaThiS is because of a sUtra which is in tripAdi. so asiddhatva has to apply. We have not come to that sUtra. We take pipaThiS as the base word.
if (arr($text,'/[z][+]/') && $pada==="pada" && sub(array("pipaWiz","ASiz"),array("+"),blank(0),0) )
{
   $text = two(array("z"),array("+"),array("r@"),array("+"),0); $R=array_merge($R,array(1));
   // Pending to refactor
/*    echo "<p class = sa >Satva is asiddha to rutva. Therefore sasajuSo ruH applies. </p>\n";
    echo "<p class = sa >रुत्वं प्रति षत्वस्यासिद्धत्वात्‌ ससजुषो रुः इति रुत्वम्‌ ।</p>\n";
   display(0); */
   $dhatu=1; // This patch is for dhAtus. So $dhatu is made 1.
}
/* patch for asiddhatva of SakAra of doS */
if (arr($text,'/[z][+]/') && $pada==="pada" && sub(array("doz","Danuz"),array("+"),blank(0),0) )
{
   $text = two(array("z"),array("+"),array("r@"),array("+"),0); $R=array_merge($R,array(1));
   // Pending to refactor.
/*    echo "<p class = sa >Satva is asiddha to rutva. Therefore sasajuSo ruH applies. </p>\n";
    echo "<p class = sa >रुत्वं प्रति षत्वस्यासिद्धत्वात्‌ ससजुषो रुः इति रुत्वम्‌ ।</p>\n";
   display(0); // this patch is for non dhAtus. therefore $dhatu is not altered.*/
}
/* sasajuSo ruH (8.2.66) */
if ((arr($text,'/[s][a][j][u][z][+]/') && $start===1  && $pada ==="pada" ))
{
    $text = one(array("z+",),array("r@+",),0); $R=array_merge($R,array(1));
	storedata('8.2.66','sa',0);
}
if ((arr($text,'/[H][+]/') && $start===1  && $pada ==="pada" )) // for neutralising users' tendency to enter visarga.
{
    $text = one(array("H+",),array("r@+",),0); $R=array_merge($R,array(1));
	// Pending to refactor.
/*    echo " <p class = hn >You have entered a visarga at the end of the first word. Usually it is derived from a sakAra at the end of the word.</p>\n";
    echo " <p class = hn >आपने प्रथम शब्द के अन्त में विसर्ग का प्रयोग किया है । सामान्यतः यह सकारान्त शब्द से उद्भव होता है ।</p>\n";
	display(0);*/
}
if (arr($text,'/[aAiIuUfFxXeEoO][s][+]/') && $start===1  && ( $pada ==="pada" || $so==="su!" ))
{
    $text = one(array("s+"),array("r@+"),0); $R=array_merge($R,array(1));
	storedata('8.2.66','sa',0);
	$r1=1; // 0 - first word doesn't have sasajuSo ruH. 1 - first owrd has sasajuSo ruH.
}
elseif ($start>1 && $r1!==0) { $r1 = 1; } else {$r1=0; }
if ( arr($text,'/['.pc('ac').'][s]$/') && $start===1 )
{
    $text = last(array("s"),array("r@"),0);
	storedata('8.2.66','sa',0);
}
elseif ( arr($text,'/['.pc('ac').'][+][s]$/') && $start===1 )
{
    $text=last(array("s"),array("r@"),0);
	storedata('8.2.66','sa',0);
     $r2 = 1; // 0 - second word doesn't have sasajuSo ruH. 1 -second word has sasajuSo ruH.
}
elseif ($start>1 && $r2!==0) 
    {
    $r2 = 1; 
    } 
else 
    {
    $r2=0; 
    }
if (arr($text,'/[H]$/') && $start===1  && $pada ==="pada" )
{
     $text = last(array("H"),array("r@"),0); $R=array_merge($R,array(1));
	 // Pending to refactor.
/*      echo " <p class = hn >You have entered a visarga at the end of the second word. Usually it is derived from a sakAra at the end of the word.</p>\n";
    echo " <p class = hn >आपने द्वितीय शब्द के अन्त में विसर्ग का प्रयोग किया है । सामान्यतः यह सकारान्त शब्द से उद्भव होता है ।</p>\n";*/
	storedata('8.2.66','sa',0);
      $r1= 1;
}
/* ahan(8.2.68) and ro'supi (8.2.69) and rUparAtrirathantareSu vAcyam (vA 4847) */ 
$noahan = array("vftrahan","bahuvftrahan");
if (arr($text,'/h[aA]n\+/') && sub(array("ahan","Ahan","AhAn"),array("+"),blank(0),0) && !sub($noahan,blank(0),blank(0),0) && !(in_array($so,$sup)) && $pada==="pada")
{ 
    if ((strpos($so,"rUp")===0)||(strpos($so,"rAtr")===0)||(strpos($so,"raTantar")===0))
    {
    $text = one(array("ahan","Ahan","AhAn"),array("ahar@","Ahar@","AhAr@"),0); $R=array_merge($R,array(1));
	storedata('8.2.68','sa',0);
	storedata('8.2.68-1','sa',0);
    }
    else 
    {
    $text = one(array("ahan","Ahan","AhAn"),array("ahar","Ahan","AhAr@"),0);
	storedata('8.2.69','sa',0);
    }
}
if ( (arr($text,'/[aA][h][aA][n]$/')||arr($text,'/[aA][h][aA][n][+]/') )&& !sub($noahan,blank(0),blank(0),0) && (in_array($so,$sup)) && $pada === "pada")
{
	// Pending to refactor.
/*     echo "<p class = sa >By ahan (".link_sutra("8.2.68").") :</p>\n";
     echo "<p class = hn >This creates a nipAta for ahan, and shows that the na lopaH prAtipadikAntasya doesn't apply here.</p>\n";
     echo "<p class = sa >अहन्‌ (८.२.६८) :</p>\n";
     echo "<p class = hn >अनेन नलोपाभावं निपात्यते ।</p>\n";
     display(0);*/
    $text = one(array("ahan","Ahan","AhAn"),array("ahar@","Ahar@","AhAr@"),0); $R=array_merge($R,array(1));
	storedata('8.2.68','sa',0);
}
/* samaH suTi (8.3.5) */ // have used @ as mark of anunAsika u of ru. 
if (sub(array("sam"),array("s"),array("k"),0))
{
	$text = three(array("sam"),array("s"),array("k"),array("saMr@"),array("s"),array("k"),0);
	storedata('8.3.5','sa',0);
	$text = one(array("Mr@"),array("!r@"),1); $R=array_merge($R,array(1));
	storedata('8.3.2','sa',0);
	storedata('8.3.4','sa',0);
}
if ($debug===1) {dibug("10000");}
/* khyAYAdeze na (vA 1591) */
if (sub(array("pum"),array("Ky"),blank(0),0))
{
	// Pending to refactor
	/*echo "<p class = sa >By khyAYAdeze na (vA 1591) :</p>\n";
	echo "<p class = sa >ख्याञादेशे न (वा १५९१) :</p>\n";
	display(0);*/
	$pum = 1; // 0 - pumaH khayyampare is mandatory. 1 - pumaH khayyampare is optional.
} else { $pum = 0; }
/* pumaH khayyampare (8.3.6) */
$am = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O","h","y","v","r","l","Y","m","N","R","n");
if(arr($text,'/pum([+]*)['.pc('Ky').']/') && sub(array("pum"),prat('Ky'),$am,0) && $pum === 0)
{
$text = three(array("pum"),prat('Ky'),$am,array("puMr@"),prat('Ky'),$am,0);
$text = one(array("Mr@"),array("!r@"),1);
storedata('8.3.6','sa',0);
storedata('8.3.2','sa',0);
storedata('8.3.4','sa',0);
} 
/* nazChavyaprazAn (8.3.7) */
if (arr($text,'/n([+]*)['.pc('Cv').']/') && sub(array("n"),prat('Cv'),$am,0) && arr($text,'/[n][+]['.pc('Cv').']/') && $pada ==="pada")
{
$text = three(array("n"),prat('Cv'),$am,array("Mr@"),prat('Cv'),$am,0); $R=array_merge($R,array(1));
$text = one(array("praSAMr@"),array("praSAn"),0);
$text = one(array("Mr@"),array("!r@"),1);
storedata('8.3.6','sa',0);
storedata('8.3.2','sa',0);
storedata('8.3.4','sa',0);
} 
/* nRUnpe (8.3.10) */
if (arr($text,'/nFn/') && sub(array("nFn"),array("p"),blank(0),0)  && $pada ==="pada")
{
$text = two(array("nFn"),array("p"),array("nFMr@"),array("p"),0);
$text = one(array("Mr@"),array("!r@"),1);
storedata('8.3.10','sa',0);
storedata('8.3.2','sa',0);
storedata('8.3.4','sa',0);
}
/* svatavAn pAyau (8.3.11) */
if (arr($text,'/svatasvAn/') && sub(array("svatavAn"),array("pAyu"),blank(0),0)  && $pada ==="pada")
{
$text = two(array("svatavAn"),array("pAyu"),array("svatavA! "),array("pAyu"),0);
storedata('8.3.11','sa',0);
storedata('8.3.2','sa',0);
}
/* kAnAmreDite (8.3.12) */ 
if (arr($text,'/kAn/') && sub(array("kAn"),array("kAn"),blank(0),0))
{
$text = two(array("kAn"),array("kAn"),array("kAMr@"),array("kAn"),0); $R=array_merge($R,array(1));
$text = one(array("Mr@"),array("!r@"),1);
storedata('8.3.12','sa',0);
storedata('8.3.2','sa',0);
storedata('8.3.4','sa',0);
}
/* ato roraplutAdaplute (6.1.113) */
if (arr($text,'/ar@/') && sub(array("ar@"),array("a"),blank(0),0))
{
    $text = two(array("ar@"),array("a"),array("au"),array("a"),0);
	storedata('6.1.113','sa',0);
}
/* hazi ca (6.1.114) */
if (arr($text,'/r@/') && sub(array("a"),array("r@"),prat('hS'),0))
{
    $text = three(array("a"),array("r@"),prat('hS'),array("a"),array("u"),prat('hS'),0);
	storedata('6.1.114','sa',0);
}
/* ekaH pUrvaparayoH (6.1.84) */ // This is the adhikArasUtra. No vidhi mentioned.
// The following vArtikas are exception to AdguNaH. Otherwise after joining, it will be difficult to identify. So coded here.
/* akSAdUhinyAmupasaMkhyAnam (vA 3604) */
/* svAdireriNoH (vA 3606) */
/*prAdUhoDhoDyeSaiSyeSu (vA 3605) */
/* Rte ca tRtIyAsamAse (vA 3607) */
/* pravatsatarakambalavasanadazArNAnAmRNe (vA 3608-9) */
$v1 = array('akza','sva','pra','pra','pra','pra','suKa','pra','vatsatara','kambala','vasana','daSa','fRa','sva');
$v2 = array('Uhin','ir','Uh','UQ','ez','ezy','ft','fR','fR','fR','fR','fR','fR','Ir');
$v3 = array('akz','sv','pr','pr','pr','pr','suK','pr','vatsatar','kambal','vasan','daS','fR','sv');
$v4 = array('OhiR','Er','Oh','OQ','Ez','Ezy','Art','ArR','ArR','ArR','ArR','ArR','ArR','Er');
if (arr($text,'/a([+]*)[UiefI]/') && sub($v1,$v2,blank(0),0) && $pada === "pada")
{
$text = two($v1,$v2,$v3,$v4,0);
storedata('6.1.89-3','sa',0);
storedata('6.1.89-4','sa',0);
storedata('6.1.89-5','sa',0);
storedata('6.1.89-6','sa',0);
}
/* etyedhatyuThsu (6.1.89) */ 
if (arr($text,'/[aA]([+]*)[eEU]/') && sub(array("a","A"),array("eti","ezi","emi","etu","Et","EtAm","EH","Es","Etam","Eta","Eva","Ema","ezyati","Ezyati","etA","eD","ED","Uh"),blank(0),0))
{
    $text = two (array("a","A"),array("eti","ezi","emi","etu","Et","EtAm","EH","Es","Etam","Eta","Eva","Ema","ezyati","Ezyati","etA","eD","ED","Uh"),blank(2),array("Eti","Ezi","Emi","Etu","Et","EtAm","EH","Es","Etam","Eta","Eva","Ema","Ezyati","Ezyati","EtA","ED","ED","Oh"),0);
	storedata('6.1.89','sa',0);
}
/* AdguNaH (6.1.87) */
$forguna = array("i","I","u","U"); // the vowels which take guNa prakriyA. iko guNavRddhi.
$rep = array("e","e","o","o"); // replacement of guNa.
if (arr($text,'/[aA]([+]*)[iIuU]/'))
{
$text = two($aa,$forguna,blank(2),$rep,0);
storedata('6.1.87','sa',0);
}
if ($debug===1) {dibug("10100");}
/* uraNraparaH (1.1.51) */ 
$forguna = array("f","F","x","X");
$rep = array("ar","ar","al","al");
if (arr($text,'/[aA]([+]*)[fFxX]/'))
{
$text = two($aa,$forguna,blank(2),$rep,0);
storedata('1.1.51','sa',0);
storedata('6.1.87','sa',0);
}
/* eGi pararUpam (6.1.94) */ // Added it here because it is exception to vRddhireci.
for($i=0;$i<count($akarantaupasarga);$i++) // $akarantaupasarga - see function.php
{
    $a_upa_without_a[$i] = substr($akarantaupasarga[$i],0,count(str_split($akarantaupasarga[$i]))-1); 
}
if (arr($text,'/a([+]*)[eo]/') && sub($akarantaupasarga,prat('eN'),blank(0),0) && arr($text,'/[I][y]/') && in_array($first,$akarantaupasarga))
{
$text = two($akarantaupasarga,prat('eN'),$a_upa_without_a,prat('eN'),1);
storedata('6.1.94','sa',0);
}
elseif (arr($text,'/a([+]*)[eo]/') && sub($akarantaupasarga,prat('eN'),blank(0),0) && in_array($first,$akarantaupasarga))
{
$text = two($akarantaupasarga,prat('eN'),$a_upa_without_a,prat('eN'),0);
storedata('6.1.94','sa',0);
}
/* eve cAniyoge (vA 3631) */
if (arr($text,'/eva/') && sub($aa,array("eva"),blank(0),0))
{
$text = two($aa,array("eva"),blank(2),array("eva"),1);
storedata('6.1.94-3','sa',0);
}
/* vA supyapizaleH (6.1.92) */ // Not possible to know what is nAmadhAtu and what is not. Therefore added as comments. Not coded.
/* aco'ntyAdi Ti (1.1.64) */ // a saJjJAsUtra. No vidhi mentioned.
/* otvoShThayoH samAse vA (vA 3634) */
if (arr($text,'/o/') && sub($aa,array("otu","ozW"),blank(0),0))
{
$text = two($aa,array("otu","ozW"),blank(2),array("otu","ozW"),1);
storedata('6.1.94-5','sa',0);
}
/* nAmreDitasyAntasya tu vA (6.1.99), tasya paramAmreDitam (8.1.2) */
for($i=0;$i<count($text);$i++)
{
    $tttt = explode("at",$text[$i]); // exploding the word to check whether it is AmreDita. e.g. paTatpaTat will be split - paT. at, paT, at.
    if (count($tttt) > 1 && !in_array($so,$tiG))
    {
		if ($tttt[0] === $tttt[1]) // e.g. paT - paT.
		{
			$amredita = 1; // 0 - no AmreDita. 1 - AmreDita.
			break;
		}
		else
		{
			$amredita = 0;
		}
    }
    else
    {
        $amredita = 0;
    }
}
if ( $amredita === 1 && $start === 1)
{
storedata('8.1.2','pa',0);
$text = two(array("at"),array("iti"),array("a"),array("iti"),1); // e.g. paTatpaTiti, paTatpaTatiti.
storedata('6.1.99','sa',0);
}
/* avyaktAnukaraNasyAta itau (6.1.98) */
$ff = preg_split('/[aAiiuUfFxXeEoO]/',$first); // checking whether the first word has more than two vowels.
if (sub(array("at"),array("iti"),blank(0),0) && $amredita === 0 && $start ===1 && count($ff)>2)
{
$text = two($array("at"),array("iti"),blank(1),array("iti"),0);
storedata('6.1.98','sa',0);
}
/* vRddhireci (6.1.88) */
$aa = array("a","A"); // a and A
$vrrdhi = array("E","O","E","O","E","O","E","O"); // vRddhi of 'ec'.
if (arr($text,'/[aA][+]*[EOeo]/') )
{
$text = one(array("a+e","a+E","a+o","a+O","A+e","A+E","A+o","A+O"),array("E+","E+","O+","O+","E+","E+","O+","O+"),0);
$text = two($aa,prat('ec'),blank(2),$vrrdhi,0);
storedata('6.1.88','sa',0);
$vriddhireci=1; // 0 - this sUtra has not applied. 1 - this sUtra has appied.
} else {$vriddhireci=0; }
/* udaH sthAstambhvoH pUrvasya (8.1.61) */
if(arr($text,'/u[dt][+]*s[tT]/') && sub(array("ud","ut"),array("sTA","stam","stan"),blank(0),0))
{
$text = two(array("ud","ut"),array('sTA','stam',"stan"),array("ud","ut"),array('TTA','Ttam','Ttan'),0);
storedata('8.1.61','sa',0);
}
/* saMhitAyAm (6.1.72) */ 
// This is adhikArasUtra. Nothing to code here.
/* Che ca (6.1.73) */
if (arr($text,'/[aiufx][+]*C/'))
{
$text = two(array("a","i","u","f","x"),array("C"),array("at","it","ut","ft","xt"),array("C"),0);
storedata('6.1.73','sa',0);
}
if ($debug===1) {dibug("10200");}
/* AGmAGozca (6.1.74) */
if (($first === "A" || $first === "mA") && $start===1)
{
$text = two(array("A"),array("C"),array("At"),array("C"),0);
storedata('6.1.74','sa',0);
}
/* dIrghAt (6.1.75) and padAntAdvA (6.1.76) */
if (arr($text,'/C/') && sub($dirgha,array("C"),blank(0),0) && $pada === "pratyaya" && $start === 1) // for $dirgha see function.php
{
$text = two($dirgha,array("C"),array("At","It","Ut","Ft","Xt","et","Et","ot","Ot"),array("C"),0);
storedata('6.1.75','sa',0);
storedata('6.1.76','sa',0);
}
if (arr($text,'/C/') && sub($dirgha,array("C"),blank(0),0) && $pada === "pada" && $start ===1)
{
$text = two($dirgha,array("C"),$dirghata,array("C"),1);
storedata('6.1.75','sa',0);
storedata('6.1.76','sa',0);
}
/* yasmAtpratyayavidhistadAdi pratyaye'Ggam (2.4.13) */
// Pending to code.
/* creating a + elision for two ++ simultaneously. */
$text = one(array("++"),array("+"),0);

// adding 1 to $start. All sUtras where $start===1 has been mentioned in the condition won't apply in the second loop.
$start++;
}
while ($text !== $original); // looping till all the applicable sUtras of sapAdasaptAdhyAyI are exhausted. i.e. the original ($original) and the output ($text) are the same.

/* Adding upasargas to the input verb. */
if ($us!=="" && in_array($so,$tiG) && $upasarga_joined!==1)
{
    $usplus=$us."+";
    $text=Adyanta($text,$usplus,1);
    $upasarga_joined=1;
    $pada="pada";
	$us='';
}
/* tripAdI functions */
// tripAdI functions are always applied in serial manner because of 'pUrvatrAsiddham'. Therefor there is no possibility of a sUtra being applied out of turn (Except explicitly mentioned in grammar books.)
// Therefore we have kept them in their order as per aSTAdhyAyI. Where there is violation, we have placed a patch.
/* na NisambuddhyoH (8.2.8) */ 
if (arr($text,'/[n][+]$/')  && ( in_array($so,array("Ni")) || (in_array($so,array("su!")) && $sambuddhi===1)) && $bham===0 && $shi===0 && $ikoci===0 )
{
	storedata('8.2.8','sa',0);
    $Gisambu=1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else {$Gisambu=0; }
/* patches for maghavA bahulam */
if ( arr($text,'/[v][a][n][+]$/') && in_array($so,$sup) && $bham===0 && $shi===0 && $ikoci===0 && $Gisambu===0 && $sambuddhi===0 && sub(array("maGavAn"),blank(0),blank(0),0) )
{
    $text = two(array("maGavAn"),array("+"),array("maGavA"),array("+"),0);
	storedata('8.2.7','sa',0);
}
/*if (in_array($so,$sup) && $bham===0 && $shi===0 && $ikoci===0 && $Gisambu===0 && $sambuddhi===0 && sub(array("maGavan","Ahar@","Ahan"),blank(0),blank(0),0) )
{
    $text = two(array("maGavan","Ahar@","Ahan"),array("+"),array("maGavAn","AhAr@","AhAn"),array("+"),0);
	storedata('6.4.8','sa',0);
}*/
/* NAvuttarapade pratiSedho vaktavyaH (vA 4785) */
// Pending because involves samAsa. Out of purview right now.

/* sambuddhau napuMsakAnAM nalopo vA vAcyaH (vA 4786) */
$napumsakanalopa=array(); // when there is nalopa in napuMsakaliGga, 1 is added in the array. useful for na lopaH prAtipadikAntasya.
if (arr($text,'/[n][+]$/') && in_array($so,$sup) && $bham===0 && $shi===0 && $ikoci===0 && $so==="su!" && $sambuddhi===1 && $gender==="n")
{
    $text = two(array("n"),array("+"),array(""),array("+"),1);
	storedata('8.2.8-2','sa',0);
    $napumsakanalopa=array_merge($napumsakanalopa,array(1));
}
/* na lopaH prAtipadikAntasya (8.2.7) */
// parame vyoman is pending. Vedic in nature. 
$nalopa=0; // 0 - no nalopa, is default. 1 - there is nalopa. Useful to display nalopaH supsvarasaJjJAtugvidhiSu kRti (8.2.2).
if (arr($text,'/[n][+]$/') && $nopadha===1 && !in_array(1,$napumsakanalopa) )
{
    $text = two(array("n"),array("+"),array(""),array("+"),0);
	storedata('8.2.7','sa',0);
    $nalopa=1;
}
elseif (arr($text,'/[n][+]$/') && in_array($so,$sup) && $pada="pada" && $shi===0 && $ikoci===0 && $Gisambu===0  && !in_array(1,$napumsakanalopa))
{
    $text = two(array("n"),array("+"),array(""),array("+"),0);
	storedata('8.2.7','sa',0);
    $nalopa=1;
}
if (arr($text,'/[n][+]['.pc('hl').']/') && ( $astana===1 || $Satcatur===1)  && !in_array(1,$napumsakanalopa))
{
    $text = two(array("n"),array("+"),array(""),array("+"),0);
	storedata('8.2.7','sa',0);
    $nalopa=1;
}
elseif (arr($text,'/[n][+]['.pc('hl').']/')  && !arr($text,'/[n][+][e]/') && ($pada==="pada"|| $so==="Am" ) && in_array($so,$sup) && $bham===0 && $shi===0 && $ikoci===0 && $Gisambu===0  && !in_array(1,$napumsakanalopa))
{
    $text = two(array("n"),array("+"),array(""),array("+"),0);
	storedata('8.2.7','sa',0);
    $nalopa=1;
}
/* nalopaH supsvarasaJjJAtugvidhiSu kRti (8.2.2) */
if ($nalopa===1)
{
	storedata('8.2.2','sa',0);
}
/* patch for udan Adeza of udaka */
if (arr($text,'/an\+/') && sub(array("udan","Asan"),array("+"),array("ByAm","Bir","Byar","su"),0))
{
    $text = two(array("udan","Asan"),array("+"),array("uda","Asa"),array("+"),0);
	storedata('8.2.7','sa',0);
}
if ($debug===1) {dibug("10300");}
/* nazervA (8.2.63) */
if (arr($text,'/[n][a][S][+]/') && $pada==="pada")
{
    $text = one(array("naS+",),array("nak+",),1);
	storedata('8.2.63','sa',0);
}
/* kvinpratyayasya kuH (8.2.62) defining */
if (arr($text,'/[Szs]\+/') && ( $kvin===1 || ($kvip===1 && $fo==="dfS") ) && $pada==="pada" && $Asarva===1 && $goanc===0)
{
    $kvinku=1; // 0 - not eligible for kvinpratyasya kuH. 1 - eligible for kvinpratyayasya kuH.
}
elseif(arr($text,'/['.pc('hl').']\+/') && ( $kvin===1 || ($kvip===1 && $fo==="dfS") ) && $pada==="pada" && !sub(array("S","z","s"),array("+"),blank(0),0) && $goanc===0)
{
    $kvinku=1;
}
else
{
    $kvinku=0;
}
/*if (arr($text,'/[Szs]\+/') && sub(array("S","z","s"),array("+"),blank(0),0) && ( $kvin===1 || ($kvip===1 && $fo==="diS") ) && $pada==="pada" && $Asarva===1)
{
    $text1 = $text;        
    $text2 = two(array("S","z","s"),array("+"),array("K","k","k"),array("+"),0); // check for z and s.
    $text = $text2;
	// Pending to refactor
    echo "<p class = pa >There is difference of opinion here. According to one school, vrazca.. applies and z->S->g->g,k is done. According to the other school, kvinpratyayasya kuH is apavAda of Satva. Therefore z->K->K,k happens.</p>\n";
    echo "<p class = pa >कुत्वस्यासिद्धत्वाद्‌ 'व्रश्च..' इति षः, तस्य जश्त्वे डः । तस्य कुत्वेन गः । तस्य चर्त्वेन पक्षे कः । तादृग्‌, तादृश्‌ ॥ 'षत्वापवादत्वात्‌ कुत्वेन खकारः' इति कैयटहरदत्तादिमते तु चर्त्वाभावपक्षे ख एव श्रूयते, न तु गः, जश्त्वं प्रति कुत्वस्य असिद्धत्वात्‌ ॥</p>\n";
    display(0); 
    $text= $text1;
    $kvinku=1;    
} 
elseif (arr($text,'/['.pc('hl').']\+/') && sub($hl,array("+"),blank(0),0) && ( $kvin===1 || ($kvip===1 && $fo==="diS") ) && $pada==="pada" && !sub(array("S","z","s"),array("+"),blank(0),0))
{   
    $text = two($cu,array("+"),$ku,array("+"),0);
    $text = two($Tu,array("+"),$ku,array("+"),0);
    $text = two($tu,array("+"),$ku,array("+"),0);
    $text = two($pu,array("+"),$ku,array("+"),0);
    $text = two(array("h"),array("+"),array("g"),array("+"),0);
	storedata('8.2.62','sa',0);
	$kvinku=1;
}
else { $kvinku=0; } 
*/ // bracketed. Output seems fine after bracketing. Kept in case we need it in future.

/* vrazcabhrasjamRjayajarAjabhrAjacChazAM ca (8.2.36) */
// TubhrAjR dIptau and ejR bhejR bhrAjR dIptau are different. This is pending to code.
// parau vrajeH SaH padAnte (u 217) pending.
$vrasca = array("vfSc","sfj","mfj","yaj","rAj","BrAj","devej","parivrAj","Bfj","ftvij");
$vrashca = array("vfSz","sfz","mfz","yaz","rAz","BrAz","devez","parivrAz","Bfz","ftviz");
if (arr($text,'/[cj]/') && $_GET['cond1_9_3']!=="2" && ($kvinku===0 || ($fo==="asfj" && in_array($so,array("su!","am")))) && (sub($vrasca,array("+"),prat("Jl"),0) ||  ( sub($vrasca,array("+"),blank(0),0) && $pada==="pada")) )
{
    if (sub($vrasca,prat('Jl'),blank(0),0))
    {
    $text = two($vrasca,prat('Jl'),$vrashca,prat("Jl"),0);
    }
    else 
    {
    $text = one($vrasca,$vrashca,0);    
    }
	storedata('8.2.36','sa',0);
    $vras1 = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $vras1 = 0; }
if (arr($text,'/[CS]$/'))
{ 
    if ($dhatu===1)
    {
        if ($kvinku===1 && $Asarva===1 && arr(array($fo),'/[S]$/'))
        {
            $text = last(array("C","S"),array("z","z"),0);
        }
        else
        {
            $text = last(array("C","S"),array("z","z"),0);                    
        }
	storedata('8.2.36','sa',0);
    }
    else
    {
        if ($kvinku===1 && $Asarva===1 &&  arr(array($fo),'/[S]$/'))
        {
            $text = last(array("C","S"),array("z","z"),0);                                
        }
        else
        {
                        $text = last(array("C","S"),array("z","z"),0);                    
        }
	storedata('8.2.36','sa',0);
    }
    $vras3 = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $vras3 =0; }
if (arr($text,'/[CS][+]/') && $pada === "pada")
{
    if ($dhatu===1)
    {
        if ($kvinku===1 && $Asarva===1 && arr(array($fo),'/[S]$/'))
        {
            $text = two(array("C","S"),array("+"),array("z","z"),array("+"),0);
        }
        else
        {
            $text = two(array("C","S"),array("+"),array("z","z"),array("+"),0);
        }
	storedata('8.2.36','sa',0);
    }
    else
    {
        if ($kvinku===1 && $Asarva===1 && arr(array($fo),'/[S]$/'))
        {
            $text2=$text;
            $text=$text1;
             $text = two(array("C","S"),array("+"),array("z","z"),array("+"),0);
            $text = array_merge($text,$text2);
            $text = array_unique($text);
            $text1=array(); $text2=array();                        
        }
        else
        {
             $text = two(array("C","S"),array("+"),array("z","z"),array("+"),0);
        }
	storedata('8.2.36','sa',0);
    }
    $vras4 = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $vras4 = 0; } 
if ($debug===1) {dibug("10400");}
/* nimittApAye naimittikasyApyapAyaH (paribhASA) */ 
if (($vras1===1 && sub(array("vfSz"),blank(0),blank(0),0)) || (($vras3 ===1 || $vras4 ===1) && sub(array("cz"),blank(0),blank(0),0)))
{
    $text = one(array("vfSz"),array("vfsz"),0);
    $text = one(array("cz"),array("z"),0);
	storedata('par@56-1','sa',0);
}
/* vivikz patch for overcoming skoH saMyogAdyorante ca */
if (arr($text,'/vivikz+/') && $pada==='pada')
{
    $text = two(array("vivikz"),array("+"),array("viviS"),array("+"),0);
    $text = two(array("viviS"),array("+"),array("viviz"),array("+"),0);
	storedata('8.2.36','sa',0);
	storedata('skoni','sa',0);
}
/* rakS, takS patch to bar application of skoH saMyogAdyorante ca */
if (arr($text,'/[tr]alz\+/') && $pada === "pada" && $Nyanta===1)
{
	storedata('takzi','sa',0);
    $rakS=1; // 0 - doesn't prevent skoH saMyogAdyorante ca. 1 - prevents skoH saMyogAdyorante ca.
} else { $rakS=0; }
/* pipak, vivak, didhak patch to bar application of skoH saMyogAdyorante ca */
//if (sub(array("vivakz","diDakz","pipakz"),array("+"),blank(0),0) && $pada === "pada" && $san===1) // removed for checking whether $san makes any difference.
if (arr($text,'/akz\+/') && sub(array("vivakz","diDakz","pipakz"),array("+"),blank(0),0) && $pada === "pada")
{
	storedata('skoHc','sa',0);
    $pipakS=1; // 0 - doesn't prevent skoH saMyogAdyorante ca. 1 - prevents skoH saMyogAdyorante ca.
} else { $pipakS=0; }

/* skoH saMyogAdyorante ca (8.2.29) */
if ( $pada === "pada" && $rakS===0 && $pipakS===0 && (arr($text,'/[sk]([+]*)['.pc('hl').']([+]*)['.pc('Jl').']/') || arr($text,'/[sk]['.flat($hl).'][+]$/')) )
{
    $text = three(array("s","k"),$hl,prat("Jl"),array("",""),$hl,prat("Jl"),0);
    $text = three($ac,array("s","k"),$hl,$ac,array("",""),$hl,0);
	storedata('8.2.29','sa',0);
}
/* patch for cikIrz */
if (arr($text,'/cikIrz\+/') && ($pada==="pada" || arr($text,'/[r][z][+]$/')) )
{
    $text = two(array("cikIrz"),array("+"),array("cikIr"),array("+"),0);
	storedata('8.2.24','sa',0);
}
/* rAtsasya (8.2.24) */
if ((arr($text,('/[r][+][s]$/')) && $pada === "pratyaya") || (arr($text,('/[r][s][+]/')) && $pada === "pada") )
{
    $text = one(array("r+s"),array("r"),0);
    $text = two(array("rs"),array("+"),array("r"),array("+"),0);
	storedata('8.2.24','sa',0);
}
if ((arr($text,('/[r][+][hyvrlYmGRnJBGQDjbgqdKPCWTcwtkpzS]$/')) && $pada === "pratyaya") || (arr($text,('/[r][hyvrlYmGRnJBGQDjbgqdKPCWTcwtkpzS][+]/')) && $pada === "pada") )
{
	// Pending to refactor
/*    echo "<p class = pa >rAtsasya (".link_sutra("8.2.24").") prevents application of saMyogAntasya lopaH.</p>\n"; 
    echo "<p class = pa >रात्सस्य (८.२.२४) से संयोगान्तस्य लोपः का प्रतिषेध होता है ।</p>\n";
    display(0); */
    $ratsasya=1; // 0 - doesn't prevent saMyogAntasya lopaH. 1 - prevents saMyogAntasya lopaH.
} else { $ratsasya=0; }
if ($debug===1) {dibug("10500");}
/* saMyogAntasya lopaH (8.2.23) */
if (  ( arr($text,'/N([+]*)[kKgGN]\+/') || arr($text,'/Y([+]*)[cCjJY]\+/') || arr($text,'/R([+]*)[wWqQR]\+/') || arr($text,'/m([+]*)[pPbBm]\+/') ) && $ratsasya===0 && $pada==="pada" && $vriddhireci===0 && !sub(array("+"),array("A"),blank(0),0) ) // patch for nimittApAye naimittikasyApAyaH.
{
    $text = three(array("N"),$ku,array("+"),array("n"),blank(count($ku)),array("+"),0); 
    $text = three(array("Y"),$cu,array("+"),array("n"),blank(count($cu)),array("+"),0); 
    $text = three(array("R"),$Tu,array("+"),array("n"),blank(count($Tu)),array("+"),0); 
    $text = three(array("m"),$pu,array("+"),array("n"),blank(count($pu)),array("+"),0); 
	storedata('8.2.23','sa',0);
	storedata('par@56-1','sa',0);
}
elseif ( arr($text,'/['.pc('hl').']([+]*)['.pc('hl').']\+/') && $bham===0 && $pada==="pada" && $ratsasya===0 && $vriddhireci===0 && !arr($text,'/['.pc('hl').']['.pc('hl').'][+]['.pc('ac').']/'))
{
    $text = three($hl,$hl,array("+"),$hl,blank(count($hl)),array("+"),0);
	storedata('8.2.23','sa',0);
} 
elseif (arr($text,'/['.pc('hl').'][+]['.pc('hl').']$/') && $ratsasya===0 && $vriddhireci===0 && sub($hl,array("+"),$hl,0) )
{
    $text = three($hl,array("+"),$hl,$hl,array("+"),blank(count($hl)),0);
	storedata('8.2.23','sa',0);
} 
elseif ( (arr($text,'/s\+/') && sub(array("M"),array("s"),array("+"),0) && $pada==="pada" && $vriddhireci===0) ) // patch for mAMsa. mAMspacanyA UkhAyAH is pending. ayasmayAdIni etc pending.
{
    $text = three(array("M"),array("s+"),$ku,array("N+"),blank(count($hl)),$ku,0); 
    $text = three(array("M"),array("s+"),$cu,array("Y+"),blank(count($hl)),$cu,0); 
    $text = three(array("M"),array("s+"),$Tu,array("R+"),blank(count($hl)),$Tu,0); 
    $text = three(array("M"),array("s+"),$tu,array("n+"),blank(count($hl)),$tu,0); 
    $text = three(array("M"),array("s+"),$pu,array("m+"),blank(count($hl)),$pu,0); 
    $text = three(array("M"),array("s"),array("+"),array("m"),blank(count($hl)),array("+"),0); 
	storedata('8.2.23','sa',0);
	storedata('par@56-1','sa',0);
}
elseif ( (arr($text,'/M([+]*)['.pc('hl').']\+/') && $pada==="pada" && $vriddhireci===0) )
{
    $text = three(array("M"),$hl,array("+"),array("M"),blank(count($hl)),array("+"),0);
	storedata('8.2.23','sa',0);
    if (arr($text,'/M\+/'))
    {
    $text = three(array("M"),array("+"),$ku,array("N"),array("+"),$ku,0);
    $text = three(array("M"),array("+"),$cu,array("Y"),array("+"),$cu,0);
    $text = three(array("M"),array("+"),$Tu,array("R"),array("+"),$Tu,0);
    $text = three(array("M"),array("+"),$tu,array("n"),array("+"),$tu,0);
    $text = three(array("M"),array("+"),$pu,array("m"),array("+"),$pu,0);
    $text = two(array("M"),array("+"),array("m"),array("+"),0);
	storedata('par@56-1','sa',0);
    }
}
/* jhalo jhali (8.2.26) */
if ( arr($text,'/['.pc('Jl').']([+]*)s([+]*)['.pc('Jl').']/') )
{
	$text = three(prat("Jl"),array("s"),prat("Jl"),prat("Jl"),array(""),prat("Jl"),0); 
	storedata('8.2.26','sa',0);
}
/* coH kuH (8.2.30) */
if ((arr($text,'/['.flat($cu).'][+]['.pc('Jl').']/')) && !in_array($fo,$noco)&& ( $kvinku===0 || $ancu===1) )
{
$text = three($cu,array("+"),prat('Jl'),$ku,array("+"),prat('Jl'),0); 
storedata('8.2.30','sa',0);
 $coku=1; // 0 - doesn't prevent kvinpratyayasya kuH. 1 - prevents kvinpratyayasya kuH.
}
elseif (!in_array($so,$noco) && arr($text,'/['.flat($cu).'][+]$/') && $kvinku===0)
{
    $text = two($cu,array("+"),$ku,array("+"),0);
	storedata('8.2.30','sa',0);
	$coku=1;
}
else
{
    $coku=0;
}
/* vA druhamuhaSNuhaSNihAm (8.2.33) */
$druh = array("druh","muh","snuh","snih","droh","moh","snoh","sneh");
if ((arr($text,'/[+]$/') || arr($text,'/[+]['.pc("Jl").']/')) && sub($druh,blank(0),blank(0),0) )
{
    $text = one(array("druh","muh","snuh","snih","droh","moh","snoh","sneh"),array("druG","muG","snuG","sniG","droG","moG","snoG","sneG"),1);
	storedata('8.2.33','sa',0);
}
/* dAderdhAtorghaH (8.2.32) */
if ((arr($text,'/[+]$/') || arr($text,'/[+]['.pc("Jl").']/')) && sub($dade,blank(0),blank(0),0) )
{
    $text = one(array("dah","dAh","dih","duh","dfh","drAh","druh"),array("daG","dAG","diG","duG","dfG","drAG","druG"),0);
	storedata('8.2.32','sa',0);
    $hodha1 = 1; // 0 - doesn't prevent ho DhaH. 1 - prevents ho DhaH.
}
/* naho dhaH (8.2.34) */
if (arr($text,'/nah/') && (arr($text,'/[+]$/') || arr($text,'/[+]['.pc("Jl").']/')) )
{
    $text = one(array("nah",),array("naD"),0);
	storedata('8.2.34','sa',0);
    $hodha2 = 1; // 0 - doesn't prevent ho DhaH. 1 - prevents ho DhaH.  
} else { $hodha2 = 0; } 
/* AhasthaH (8.2.35) */
if (in_array($first,array("Ah")) && (arr($text,'/[+]['.pc("Jl").']/')) )
{
    $text = one(array("Ah",),array("AT"),0);
	storedata('8.2.35','sa',0);
    $hodha3=1; // 0 - doesn't prevent ho DhaH. 1 - prevents ho DhaH.
} else { $hodha3 = 0; } 
if ($debug===1) {dibug("10600");}
/* ho DhaH (8.2.31) */ 
if (arr($text,'/[h][+]/') && sub(array("h"),prat("Jl"),blank(0),0) && $hodha1===0 && $hodha2 === 0 && $hodha3 === 0 && $kvinku===0)
{
    $text = two(array("h"),prat('Jl'),array("Q"),prat('Jl'),0);
	storedata('8.2.31','sa',0);
} 
if (arr($text,'/[h][+]$/') && $pada ==="pada" && $hodha1===0 && $hodha2 === 0 && $hodha3 === 0 && $kvinku===0)
{ 
    $text = two(array("h"),array("+"),array("Q"),array("+"),0);
	storedata('8.2.31','sa',0);
}
if (arr($text,'/[h]$/')  && $hodha1===0 && $hodha2 === 0 && $hodha3 === 0 && $kvinku===0)
{
    $text = last(array("h"),array("Q"),0);
	storedata('8.2.31','sa',0);
}
/* ekAco bazo bhaS jhaSantasya sdhvoH (8.2.37) */  // Not good code. Think hard.
if (( arr($text,'/[+][sd]/') || arr($text,'/[+]$/') || $pada==="pada") && sub($ekaco,array("+"),blank(0),0) )
{
	 $text = one($ekaco,$ekaco1,0);
	storedata('8.2.37','sa',0);
}
/* jhalAM jazo'nte (8.2.39) */
if (arr($text,'/['.pc('Jl').']$/') )
{
	/*
    if ($r2 ===1) 
         {
			 // Pending to refactor.
            // echo "<p class = sa >jhalAM jazo'nte is barred by sasajuSo ruH for second word. <hr>\n"; echo "<p class = sa >द्वितीय पद के लिए ससजुषो रुः से झलां जशोऽन्ते बाधित हुआ है । <hr>\n";          
         }    */
	if ($r2!==1 || !isset($r2))
        {
            $text = pr2(prat('Jl'),blank(0),blank(0),savarna(prat('Jl'),prat('jS')),blank(0),blank(0),$text);            
        }
		storedata('8.2.39','sa',0);
}
if (arr($text,'/['.pc('Jl').'][+]/') && ( $pada === "pada" && !arr(array($fo),'/[s]$/'))  )
{     
    if ($r1 === 1 ) 
        {
			// Pending to refactor.
            // echo "<p class = sa >jhalAM jazo'nte is barred by sasajuSo ruH for first word. <hr>\n"; echo "<p class = sa >प्रथम पद के लिए ससजुषो रुः से झलां जशोऽन्ते बाधित हुआ है । <hr>\n";
        }
    else 
        {
            $text = two(prat('Jl'),array("+"),savarna(prat('Jl'),prat('jS')),array("+"),0);                
		storedata('8.2.39','sa',0);
        }
} 
/* kvinpratyaya patch for asRj */
if ($fo==="asfj" && in_array($so,array("su!","am")) && $gender==="n")
{
    $text=two(array("z"),array("+"),array("K"),array("+"),0);
	storedata('8.2.62','sa',0);
    $text=two(array("K"),array("+"),array("g"),array("+"),0);
	storedata('8.2.39','sa',0);
    $asRj=1; // 0 - doesn't prevent reapplication of kvinpratyayasya kuH. 1 - prevents reapplication of kvinpratyayasya kuH.
} else {$asRj=0; }
/* kvinpratyayasya kuH (8.2.62) */
if (arr($text,'/['.pc('hl').']\+/') && ( $kvin===1 || ($kvip===1 && $fo==="diS") ) && $pada==="pada" && !sub(array("S","z","s"),array("+"),blank(0),0)  && ( $kvinku===1 || $Asarva===0 ) && ($coku!==1||$goanc===1) && $asRj===0)
{   
    $text = two($cu,array("+"),$ku,array("+"),0);
    $text = two($Tu,array("+"),$ku,array("+"),0);
    $text = two($tu,array("+"),$ku,array("+"),0);
    $text = two($pu,array("+"),$ku,array("+"),0);
    $text = two(array("h","z"),array("+"),array("G","K"),array("+"),0);
  //$text = two(array("S","s","y","r","v","l"),array("+"),array("S","s","y","r","v","l"),array("+"),0);  // Pending to find kutva of S,z,s.

	storedata('8.2.62','sa',0);
    if ($kvip===1)
    {
		// Pending to refactor.
    // echo "<p class = hn >As 'tyadAdiSu dRSo'nAlocane kaYca (".link_sutra("3.2.60").") mandates kvin for dRz, others also take kutvam. </p>\n";       // special message fror kvip.
    }
    if ($kvip===1)
    {
		// Pending to refactor
    // echo "<p class = hn >त्यदादिषु दृशोऽनालोचने कञ्च (३.२.६०) इति दृशेः क्विन्विधानादन्यत्रापि कुत्वम्‌ ।</p>\n";        
    }
    if(arr($text,'/G\+/'))
    {
        $text = two(array("G"),array("+"),array("g"),array("+"),0);
		storedata('8.2.39','sa',0);
    }
}
/* vizvasya vasurAToH (6.3.128) */
if (arr($text,'/viSva/') && sub(array("viSva"),array("vasu","rAq"),blank(0),0)) 
{
    $text = two(array("viSva"),array("vasu","rAq"),array("viSvA"),array("vasu","rAq"),0);
	storedata('6.3.128','sa',0);
}
/* bhobhagoaghoapUrvasya yo'zi (8.3.17) : */
$ash = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O","h","y","v","r","l","Y","m","N","R","n","J","B","G","Q","D","j","b","g","q","d");
if (arr($text,'/r@/') && sub(array("Bo","Bago","aGo","a","A"),array("r@"),$ash,0)) 
{
    $text = three(array("Bo","Bago","aGo","a","A"),array("r@"),$ash,array("Bo","Bago","aGo","a","A"),array("y"),$ash,0);
	storedata('8.3.17','sa',0);
    $bho = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $bho =0; }
if ($debug===1) {dibug("10700");}
// Patch to convert the rutva before vowels and hash to repha.
if (arr($text,'/[r][@]/'))
{ 
	storedata('1.3.2','pa',0);
    $text = two(array("r@"),$ac,array("r"),$ac,0);
    $text = two(array("r@"),prat('hS'),array("r"),prat('hS'),0);
    $text = two(array("r@"),array("+"),array("r"),array("+"),0);
    if (arr($text,'/[r][@]$/'))
    {
    $text = last(array("@"),array(""),0); 
    }    
	storedata('1.3.9','sa',0);
}
/* SaDhoH kassi (8.2.41) */
if (arr($text,'/[zQ]/') && sub(array("z","Q"),array("s"),blank(0),0) && !in_array("Sapluk",$vik))
{
    $text = two(array("z","Q"),array("s"),array("k","k"),array("s"),0);
	storedata('8.2.41','sa',0);
}
/* mo no dhAtoH (8.2.64) */
if (arr($text,'/[m][+]/') && $dhatu===1 && $pada==="pada" && $kaspratyaya!==1)
{
    $text = one(array("m+",),array("n+",),0);
    $text = one(array("san+",),array("sam+",),0); // upasarga sam wrongly converted to san. So bringing it back. Pending to make it specific to start.
	storedata('8.2.64','sa',0);
}
/* mvozca (8.2.65) */
if (arr($text,'/[m][+]/') && $dhatu===1 && in_array($so,$tiG)  && $kaspratyaya!==1)
{
    $text = one(array("m+",),array("n+",),0);
    $text = one(array("san+",),array("sam+",),0); // upasarga sam wrongly converted to san. So bringing it back. Pending to make it specific to start.
	storedata('8.2.65','sa',0);
}
/* rvorupadhAyA dIrgha ikaH (8.2.76) */
//if ($dhatu===1 && ((sub(array("i","I","u","U","f","F","x","X",),array("r+","v+"),$hl,0) && $pada==="pada" ) || arr($text,'/[iIuUfFxX][rv]$/') || sub(array("i","I","u","U","f","F","x","X",),array("r","v"),array("+"),0)) && $pada==="pada") // This gives wrong application for Bis pratyaya. 
if ($dhatu===1 && arr($text,'/[iIuUfFxX]r\+/') && ((sub(array("i","I","u","U","f","F","x","X",),array("r+","v+"),$hl,0) && $pada==="pada" ) || sub(array("i","I","u","U","f","F","x","X",),array("r","v"),array("+"),0)) && $pada==="pada" && !($us==="nis" && in_array($so,$tiG)) )
{
    $text = three(array("i","I","u","U","f","F","x","X",),array("r","v"),array("+"),array("I","I","U","U","F","F","F","F",),array("r","v"),array("+"),0);
	storedata('8.2.76','sa',0);
}
/* hali ca (8.2.77) */
$rvverb=array("ir","Ir","Ir","ur","kIv","kur","kfv","klIv","kziv","kzIv","kzIv","kzur","kzur","Kur","Kur","gir","gur","gUr","gUr","Gur","GUr","cir","cIv","cIv","cur","cUr","Cur","jIv","jur","jUr","tir","1tIv","tIv","3tIv","tur","tUr","div","div","div","dIv","dIv","DIv","Dur","Dur","Druv","niv","nIv","pIv","pur","pUr","Bur","mIv","mIv","mur","mur","mUr","mUr","rIv","SUr","Sriv","SrIv","zWiv","zWIv","siv","siv","sIv","sur","sUr","sTiv","sPur","sriv","srIv","hur",);
if (arr($text,'/divn/'))
{
    $dhatu=1;
}
if ($dhatu===1 && $lakAra!=="liw" && (arr($text,'/[rv]['.pc('hl').']/')|| arr($text,'/[v][n][+]/') ) && $karoti!==1  && !($us==="nis" && in_array($so,$tiG)) && sub($ik,array("r","v"),$hl,0) )
{
    $text = three(array("i","I","u","U","f","F","x","X",),array("r","v"),$hl,array("I","I","U","U","F","F","F","F",),array("r","v"),$hl,0);
	storedata('8.2.77','sa',0);
    if ($allopo===1)
    {
		// Pending to refactor.
/*        echo "<p class = hn >allopa doesn't have sthAnivadbhAva, because sthAnivadbhAva is barred in dIrghavidhi.</p>\n";
        echo "<p class = hn >स्थानिवद्भाव का दीर्घविधि में निषेध होने से यहाँ अल्लोप का स्थानिवद्भाव नहीं है ।</p>\n";        */
    }
}
/* eta Idbahuvacane (8.2.81) */
if (in_array($so,$bahusup) && $fo==="adas" && sub(array("ad+e","ade+Bir","ade+Byar","ade+sAm","ade+su"),blank(0),blank(0),0) )
{
     $text=one(array("ad+e","ade+Bir","ade+Byar","ade+sAm","ade+su"),array("amI","amI+Bir","amI+Byar","amI+sAm","amI+su"),0);
	storedata('8.2.81','sa',0);
}
/* adaso'serdAdu do maH (8.2.80) */
// For proper adas forms. 
$acmu = array("u","U","u","U","u","U","u","U","u","U","U","U","U","U",);
if (in_array($fo,array("adas","adakas")) && !arr($text,'/[a][r][+]/') && sub(array("ad"),blank(0),blank(0),0) )
{
     $text=two(array("ad"),$ac,array("am"),$acmu,0);
	storedata('8.2.80','sa',0);
}
// Not coded properly. coded only for adas-ancu combination.
if (arr($text,'/adadr/'))
{
     $text=one(array("adadr"),array("amumu"),1);
     $text=one(array("amumu"),array("adamu"),1);
	storedata('8.2.80','sa',0);
	// Pending to refactor.
/*     echo "<p class = hn >adaso'dreH pRthaGmutvaM kecidicCanti latvavat | kecidantyasadezasya netyeke'serhi dRSyate || </p>\n";
     echo "<p class = hn >अदसोऽद्रेः पृथङ्मुत्वं केचिदिच्छन्ति लत्ववत्‌ । केचिदन्त्यसदेशस्य नेत्येकेऽसेर्हि दृश्यते ॥</p>\n";*/
}
/* vyorlaghuprayatnataraH zAkaTAyanasya (8.3.18) */
// This is regarding pronounciation. So no difference in word declention.
/* roH supi (8.3.16) */
if (arr($text,'/[r][+][s][u]$/') && $so==="sup" && !in_array(1,$R))
{
	storedata('8.3.16','sa',0);
	// Pending to refactor.
/* echo "<p class = pa >roH supi (".link_sutra("8.3.16").") prevents application of kharavasAnayorvisarjanIyaH. </p>\n";
 echo "<p class = pa >रोः सुपि (८.३.१६) से खरवसानयोर्विसर्जनीयः का प्रतिषेध होता है ।</p>\n";
 display(0); */
 $roHsupi=1; // 0 - doesn't prevent kharavasAnayorvisarjanIyaH. 1 - prevents kharavasAnayorvisarjanIyaH.
} else { $roHsupi=0; }
if ($debug===1) {dibug("10800");}
/* kharavasAnayorvisarjanIyaH (8.3.15) */
if (arr($text,'/[+]['.pc('Kr').']/') && $roHsupi===0 && sub(array("r","r@"),array("+"),prat('Kr'),0) && $pada === "pada")
{
	$text = two(array("r@","r"),prat("Kr"),array("H","H"),prat("Kr"),0);
	storedata('8.3.15','sa',0);
}
if ( arr($text,'/[@r]$/')||arr($text,'/[r][+]$/') && $roHsupi===0)
{
 $text = last(array("r@","r"),array("H","H"),0);
 if (arr($text,'/[r][+]$/'))
 {
     $text = one(array("+"),array(""),0);
 }
 $text = last(array("r"),array("H"),0);
storedata('8.3.15','sa',0);
}
/* Dho Dhe lopaH (8.3.13) */
if (arr($text,'/Q([+]*)Q/'))
{
    $text = three(array("e","o","E","O","M","H"),array("Q"),array("Q"),array("e","o","E","O","M","H"),array(""),array("Q"),0);
    $text = two(array('Q'),array('Q'),array(''),array('#Q'),0); 
	storedata('8.3.13','sa',0);
    $dho = 1;  // 0 - This sUtra has not applied. 1 - This sUtra has applied.
	/* sahivahorodavarNasya (6.3.111) */
	if (arr($text,'/[vs][Aa][#]Q/') && in_array($fo,array("vaha!","zaha!")))
	{
		$text = two(array("va","sa","vA","sA"),array("#Q"),array("vo","so","vo","so",),array("Q"),0);
		storedata('6.3.111','sa',0);
	}
} else { $dho = 0; }
/* ro ri (8.3.14) */
if (arr($text,'/r([+]*)r/'))
{
    $text = three(array("e","o","E","O","M","H"),array("r"),array("r"),array("e","o","E","O","M","H"),array(""),array("r"),0);
    $text = two(array('r'),array('r'),array(''),array('#r'),0); 
	storedata('8.3.14','sa',0);
    $ro = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $ro = 0; }
/* Dhralope pUrvasya dIrgho'NaH (6.3.111) */
$ana = array("a","A","i","I","u","U","f","F","x","X");
$anna = array("A","A","I","I","U","U","F","F","X","X");
if (($ro ===1 || $dho===1) && arr($text,'/[aAiIuUfFxX]([+]*)[#][rQ]/'))
{
$text = two($ana,array('#r','#Q'),$anna,array(' r',' Q'),0);
	storedata('6.3.111','sa',0);
	/* sahivahorodavarNasya (6.3.111) */
	if (sub(array("va","sa","vA","sA"),array("Q"),blank(0),0) && ends(array($fo),array("vaha!","zaha!"),4))
	{
		$text = two(array("va","sa","vA","sA"),array("Q"),array("vo","so","vo","so",),array("Q"),0);
		storedata('6.3.111','sa',0);
	}
}
/* lopaH zAkalyasya (8.3.19) and vyorlaghuprayatnataraH zAkaTAyanasya (8.3.18) */ 
$aa = array("a","A");$yv = array("y+","v+"); $space=array(" "," "); // creating some arrays. 
if (arr($text,'/[aA][yv]\+['.pc('ac').']/') && (arr($text,'/['.pc('ec').'][+]['.flat($ac).']/') || $bho === 1) && $pada === "pada")
{
	$text = three($aa,$yv,$ac,$aa,array(" +"," +"),$ac,1); 
	storedata('8.3.19','sa',0);
	storedata('8.3.18','sa',0);
}
/* hali sarveSAm (8.3.22) */
if ($bho === 1 && arr($text,'/y\+['.pc('hl').']/') && $pada==="pratyaya")
{
    $text = three(array("Bo","Bago","aGo","A"),array("y+"),$hl,array("Bo","Bago","aGo","A"),array("+"),$hl,0);
	storedata('8.3.22','sa',0);
}
if ($bho === 1 && arr($text,'/y\+['.pc('hl').']/') && (in_array($so,$sup) && $pada==="pada"))
{
    $text = three(array("Bo","Bago","aGo","A"),array("y+"),$hl,array("Bo","Bago","aGo","A"),array("+"),$hl,0);
	storedata('8.3.22','sa',0);
}
/* oto gArgyasya (8.3.20) */
if (arr($text,'/[o][y][+]/') && $bho ===1 && $pada === "pada")
{
    $text = one(array("oy+"),array("o +"),0);
	storedata('8.3.20','sa',0);
}
/* uJi ca pade (8.3.21) */
if ((sub(array("ay","av"),array("u "),blank(0),0)|| (sub(array("ay","av"),blank(0),blank(0),0) && $second === "u")) && $bho ===1 && $pada === "pada")
{
    $text = two(array("ay","av"),array("u"),array("a","a"),array("u"),0);
	storedata('8.3.21','sa',0);
}
/* mo rAji samaH kvau (8.3.25) */
if (sub(array("sam"),array("rA"),blank(0),0))
{
    $text = two(array("sam"),array("rA"),array("sam"),array("rA"),0);
	storedata('8.3.25','sa',0);
  $mo = 1; // 0 - doesn't prevent application of mo'nusvAraH. 1 - prevents application of mo'nusvAraH.
} else { $mo = 0; }
/* mo'nusvAraH (8.3.23) */
if (arr($text,'/[m][+]['.pc('hl').']/') && $pada ==="pada" && $mo === 0)
{
$text = two(array('m'),prat('hl'),array('M'),prat('hl'),0);
	storedata('8.3.23','sa',0);
}
if ($debug===1) {dibug("10900");}
/* nazcApadAntasya jhali (8.3.24) */
if (arr($text,'/[mn][+]['.pc('Jl').']/') && $pada === "pratyaya" )
{
$text = two(array('m','n'),prat('Jl'),array('M','M'),prat('Jl'),0);
	storedata('8.3.24','sa',0);
}
if(arr($text,'/[mn]['.pc('Jl').']/') )
{
$text = two(array('m','n'),prat('Jl'),array('M','M'),prat('Jl'),2);
	storedata('8.3.24','sa',0);
}
/* he mapare vA (8.3.26) and yavalapare yavalA veti vaktavyam (vA 4902) */
if (arr($text,'/h[myvl]/') && sub(array("M"),array("hm","hy","hv","hl"),blank(0),0))
{
$text = two(array("M"),array("hy",),array("!y",),array("hy",),1);
$text = two(array("M"),array("hm",),array("m",),array("hy",),1);
$text = two(array("M"),array("hv",),array("!v",),array("hv",),1);
$text = two(array("M"),array("hl",),array("!l",),array("hl",),1);
storedata('8.3.26','sa',0);
storedata('8.3.26-1','sa',0);
}
/* napare naH (8.3.27) */
if (arr($text,'/hn/') && sub(array("M"),array("hn"),blank(0),0))
{
$text = two(array("M"),array("hn"),array("n"),array("hn",),1);
storedata('8.3.27','sa',0);
}
/* GNoH kukTukzari (8.3.28) */
if (arr($text,'/[NR]([+]*)[Szs]/'))
{
$text = two(array("N","R"),prat('Sr'),array("Nk","Rw"),prat('Sr'),1);
storedata('8.3.28','sa',0);
}
/* DaH si dhuT (8.3.29) */
$dhut = 0;  // 0 - no dhuT Agama. 1 - dhuT Agama.
if (arr($text,'/q([+]*)s/'))
{
$text = two(array("q"),array("s"),array("q"),array("Ds"),1);
storedata('8.3.29','sa',0);
}
/* nazca (8.3.30) */
if (arr($text,'/n([+]*)s/'))
{
$text = two(array("n"),array("s"),array("n"),array("Ds"),1);
storedata('8.3.30','sa',0);
}
/* zi tuk (8.3.31) */
if (arr($text,'/[n][+][S]/') && $pada === "pada")
{
$text = one(array("n+S"),array("nt+S"),1);    
storedata('8.3.31','sa',0);
}
/* Gamo hrasvAdaci GamuNnityam (8.3.32) */ // Here the Agama has to be affiliated to $ac. Patch is bad.
$nogamo = array("aR","ak","ik","uk","ac","ic","ec","aw","aR","iR","am","aS","al",); // array where this rule won't apply.
if (arr($text,'/['.flat($hrasva).'][NRn][+]['.flat($ac).']/') && $pada === "pada" && !in_array($second,$nogamo) && !sub(array("pataYjal","sImant"),blank(0),blank(0),0))
{
$text = three($hrasva,array("N","R","n"),$ac,$hrasva,array("NN","RR","nn"),$ac,0);
storedata('8.3.32','sa',0);
}
/* saheH sADaH saH (8.3.56) */
if (arr($text,'/sAq\+/'))
{
$text = two(array("sAq"),array("+"),array("zAq"),array("+"),0);
storedata('8.3.56','sa',0);
}
/* sampuGkAnAM so vaktavyaH (vA 4892) */
if (arr($text,'/H/') && sub(array("saM","sa!","puM","pu!","kAM","kA!"),array("H"),blank(0),0))
{
$text = two(array("saM","sa!","puM","pu!","kAM","kA!"),array("H"),array("saM","sa!","puM","pu!","kAM","kA!"),array("s"),0);
storedata('8.3.5-1','sa',0);
}
/* samo vA lopameke (bhASya) */
if (arr($text,'/sa[M!]s([+]*)s/') && sub(array("saMs","sa!s"),array("s"),$hl,0))
{
$text = two(array("saMs","sa!s"),array("s"),array("saM","sa!"),array("s"),1);
// Pending to refactor.
/*echo "<p class = sa >By samo vA lopameke (bhASya) :</p>\n";
echo "<p class = sa >समो वा लोपमेके (भाष्य) :</p>\n";
display(0);*/
}
/* dvistrizcaturiti kRtvo'rthe (8.3.43) */
if (arr($text,'/[ui]H/') && sub(array("dviH","triH","catuH"),$ku,blank(0),0))
{
    $text = two (array("dviH","triH","catuH"),$ku,array("dviz","triz","catuz"),$ku,1);
	storedata('8.3.43','sa',0);
    $dvi1 = 1;  // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $dvi1 = 0; }
if (arr($text,'/[iu]H/') && sub(array("dviH","triH","catuH"),$pu,blank(0),0))
{
 $text = two (array("dviH","triH","catuH"),$pu,array("dviz","triz","catuz"),$pu,1);
	storedata('8.3.43','sa',0);
    $dvi2 = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $dvi2 = 0; }
/* muhusaH pratiSedhaH (vA 4911) */
if (arr($text,'/muhuH/') && (sub(array("muhu"),array("H"),$pu,0)||sub(array("muhu"),array("H"),$ku,0)))
{
    $text = three(array("muhu"),array("H"),$pu,array("muhu"),array("H"),$pu,0);
    $text = three(array("muhu"),array("H"),$ku,array("muhu"),array("H"),$ku,0);
	storedata('8.3.41-1','sa',0);
    $muhu1 = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $muhu1 = 0; }
if ($debug===1) {dibug("11000");}
/* kaskAdiSu ca (8.3.48) */
$kaska = array("kaHkaH","kOtaHkut","sarpiHkuRqik","BrAtuHputr","SunaHkarR","sadyaHkAl","sadyaHkI","sAdyaHk","kAMHkAn","DanuHkapAl","bahiHpal","barhiHpal","yajuHpAtr","ayaHkAnt","tamaHkARq","ayaHkARq","medaHpiRq","BAHkar","ahaHkar","kaH+kaH","kOtaH+kut","sarpiH+kuRqik","BrAtuH+putr","SunaH+karR","sadyaH+kAl","sadyaH+kI","sAdyaH+k","kAMH+kAn","DanuH+kapAl","bahiH+pal","barhiH+pal","yajuH+pAtr","ayaH+kAnt","tamaH+kARq","ayaH+kARq","medaH+piRq","BAH+kar","ahaH+kar"); // kaskAdi gaNa, before joining.
$kaskareplace = array("kaskaH","kOtaskut","sarpizkuRqik","BrAtuzputr","SunaskarR","sadyaskAl","sadyaskI","sAdyask","kAMskAn","DanuzkapAl","bahizpal","barhizpal","yajuzpAtr","ayaskAnt","tamaskARq","ayaskARq","medaspiRq","BAskar","ahaskar","kas+kaH","kOtas+kut","sarpiz+kuRqik","BrAtuz+putr","Sunas+karR","sadyas+kAl","sadyas+kI","sAdyas+k","kAMs+kAn","Danuz+kapAl","bahiz+pal","barhiz+pal","yajuz+pAtr","ayas+kAnt","tamas+kARq","ayas+kARq","medas+piRq","BAs+kar","ahas+kar"); // kaskAdi gaNa, after joining.
if(arr($text,'/H') && sub($kaska,blank(0),blank(0),0))
{
$text = one ($kaska,$kaskareplace,0);
	storedata('8.3.48','sa',0);
    $kaska = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $kaska = 0; }
/* isusoH sAmarthye (8.3.44) and nityaM samAse'nuttarapadasthasya (8.3.45) */ 
if (arr($text,'/H/') && sub(array("iH","uH",),$ku,blank(0),0) && $dvi1===0 && $dvi2===0 && $muhu1 ===0 && $us!=="nis")
{
    $text = two (array("iH","uH"),$ku,array("iz","uz"),$ku,1);
	storedata('8.3.44','sa',0);
	storedata('8.3.45','sa',0);
    $isu1 = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $isu1 = 0; }
if (arr($text,'/H/') && sub(array("iH","uH"),$pu,blank(0),0)  && $us!=="nis")
{
 $text = two (array("iH","uH"),$pu,array("iz","uz"),$pu,1);
	storedata('8.3.44','sa',0);
	storedata('8.3.45','sa',0);
    $isu2 = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $isu2= 0; }
/* idudupadhasya cApratyayasya (8.3.41) */
if (arr($text,'/H/') && sub($iN,array("H"),$ku,0) && $dvi1===0 && $dvi2===0 && $isu1 ===0 && $isu2 ===0&& $muhu1 ===0 && ($pada !== "pratyaya" || $us==="nis"))
{
    $text = three(array("i","u",),array("H"),$ku,array("i","u",),array("z"),$ku,1);
	storedata('8.3.41','sa',0);
}
if (arr($text,'/H/') && sub($iN,array("H"),$pu,0) && $pada !== "pratyaya")
{
    $text = three(array("i","u",),array("H"),$pu,array("i","u",),array("z"),$pu,1);
	storedata('8.3.41','sa',0);
}
/* ekAdezazAstranimittikasya na Satvam | kaskAdiSu bhrAtuSputrazabdasya pAThAt (vA 4915) */ 
// Pending to code.
/* iNaH SaH (8.3.39) */
if (arr($text,'/H/') && sub($iN,array("H"),array("pAS","kalp","kAmy","ka","kAMy"),blank(0),0) && $dvi1===0 && $dvi2===0 && $isu1 ===0 && $isu2 ===0 && $muhu1 ===0) 
{
    $text = three($iN,array("H"),array("pAS","kalp","kAmy","ka","kAMy"),$iN,array("z"),array("pAS","kalp","kAmy","ka","kAmy"),0);
	storedata('8.3.39','sa',0);
	$inah = 1;
} else { $inah = 0; }
/* namaspurasorgatyoH (8.3.40) */
if (arr($text,'/aH/') && sub(array("namaH","puraH"),$ku,blank(0),0))
{
    $text = two(array("namaH","puraH"),$ku,array("namas","puras"),$ku,1);
	storedata('8.3.40','sa',0);
    $nama1 = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $nama1 = 0; }
if (arr($text,'/aH/') && sub(array("namaH","puraH"),$pu,blank(0),0) && $nama1 !==1)
{
    $text = two(array("namaH","puraH"),$pu,array("namas","puras"),$pu,1);
	storedata('8.3.40','sa',0);
    $nama2 = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $nama2 = 0; }
/* tiraso'nyatarsyAm (8.3.42) */
if (arr($text,'/aH/') && sub(array("tiraH"),$ku,blank(0),0))
{
    $text = two (array('tiraH'),$ku,array('tiras'),$ku,1);
	storedata('8.3.42','sa',0);
    $tir1 = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $tir1 = 0; }
if (arr($text,'/aH/') && sub(array("tiraH"),$pu,blank(0),0))
{
 $text = two (array('tiraH'),$pu,array('tiras'),$pu,1);
	storedata('8.3.42','sa',0);
    $tir2 = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $tir2 = 0; }
/* ataH kRkamikaMsakumbhapAtrakuzAkarNISvanavyayasya (8.3.46) */
$atah = 0; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
if (arr($text,'/aH/') && sub(array("aH"),array("kAr","kAm","kAMs","kumBa","pAtra","kuSA","karRI"),blank(0),0) && $nama1 !== 1 && $nama2 !== 1   && $tir1===0 && $tir2===0 )
{
    $text = two(array("aH"),array("kAr","kAm","kAMs","kumBa","pAtra","kuSA","karRI"),array('as'),array("kAr","kAm","kAMs","kumBa","pAtra","kuSA","karRI"),1);
	storedata('8.3.46','sa',0);
    $atah = 1;
}
/* adhazzirasI pade */
if (arr($text,'/aH/') && sub(array("aDaH","SiraH"),array("pada"),blank(0),0)  )
{
    $text = two(array("aDaH","SiraH"),array("pada"),array("aDas","Siras"),array("pada"),1);
	storedata('8.3.47','sa',0);
	$atah = 1;
}
/* so'padAdau (8.3.38), pAzakalpakakAmyeSviti vAcyam (vA 5033), anavyayasyeti vAcyam (vA 4902) and kAmye roreveti vAcyam (vA 4902) */ 
// anavyayasyeti vAcyam (vA 4901) is pending to code.
if ( $inah !== 1 && $nama1 !== 1 && $nama2 !== 1 && $dvi1===0 && $dvi2===0 && $isu1 ===0 && $isu2 ===0 && $tir1===0 && $tir2===0 && $muhu1 ===0  && $atah ===0 && arr($text,'/H/') && sub(array("H"),array("pAS","kalp","kAmy","ka"),blank(0),0))
{
    $text = two(array("H"),array("kalp","kAmy","ka","kAMy"),array('s'),array("kalp","kAmy","ka","kAMy"),0);
    $text = two(array("H"),array("pAS"),array('s'),array("pAS"),0);
    if (preg_match('/[sr]$/',$first))
    {
        $text = one(array('skAmy','skAMy'),array('HkAmy','HkAMy'),1);      
    }
	storedata('8.3.38','sa',0);
	storedata('8.3.38-2','sa',0); // Not properly the same as pAzakalpaka
	storedata('8.3.38-1','sa',0);
	// Pending to refactor pAzakalpaka..
/*    echo "<p class = sa >By so'padAdau (".link_sutra("8.3.38")."), pAzakalpakakAmyeSviti vAcyam (vA 5033), anavyayasyeti vAcyam (vA 4902) and kAmye roreveti vAcyam (vA 4902) :</p>\n";
    echo "<p class = sa >सोऽपदादौ (८.३.३८), पाशकल्पककाम्येष्विति वाच्यम्‌ (वा ५०३३), अनव्ययस्येति वाच्यम्‌ (वा ४९०२) तथा काम्ये रोरेवेति वाच्यम् (वा ४९०२) :</p>\n";
    display(0);*/
}
if ($debug===1) {dibug("11100");}
/* zarpare visarjanIyaH (8.3.35) */
if (arr($text,'/H/') && sub(array("H"),prat('Kr'),prat('Sr'),0) )
{
storedata('8.3.35','sa',0);
$zarpare = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied. 2 - visarjanIyasya saH. 3 - vA zari.
} else { $zarpare = 0; }
/* kupvoH &k&pau ca (8.3.37) */ // <p class = hn >Note that we have used & as jihvAmUlIya and * as upadhmAnIya.
if(arr($text,'/H/') && (sub(array("H"),$ku,blank(0),0)||sub(array("H"),$pu,blank(0),0)) && $kaska !== 1 && $zarpare ===0)
{
$text = two(array("H"),$ku,array("&"),$ku,1);
$text = two(array("H"),$pu,array("&"),$pu,1);
storedata('8.3.37','sa',0);
$kupvo = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else {$kupvo = 0; }
/* visarjanIyasya saH (8.3.34) */ 
if(arr($text,'/H/') && sub(array("H"),prat('Kr'),blank(0),0) && $zarpare !==1 && $kupvo ===0)
{
$text = two(array("H"),prat('Kr'),array("s"),prat('Kr'),0);
storedata('8.3.34','sa',0);
$zarpare = 2;
}
/* vA zari (8.3.36) */
if(arr($text,'/s([+]*)[Szs]/') && $zarpare === 2)
{
$text = two(array("s"),array("S","z","s"),array("H"),array("S","z","s"),1);
storedata('8.3.36','sa',0);
$zarpare = 3;
}
/* kharpare zari vA visargalopo vaktavyaH (vA 4906) */
if(arr($text,'/H/') && sub(array("H"),prat('Sr'),prat('Kr'),0) && $zarpare === 3)
{
$text = three(array("H"),prat('Sr'),prat('Kr'),array(""),prat('Sr'),prat('Kr'),1);
storedata('8.3.36-1','sa',0);
}
/* apadAntasya mUrdhanyaH (8.3.55), iNkoH (8.3.57) and AdezapratyayayoH (8.3.59) */
// Not coded perfectly. This is only according to the need of vibhaktis. 
if(arr($text,'\+s') && ((sub($iN1,array("+s"),blank(0),0)) &&  (in_array($so,array("Am","sup"))|| in_array(1,$samp)) || ($fo==="adas" && in_array($so,array("Ne","Nasi!","Nas","Am","Ni")))))
{
$text = two($iN1,array("+s"),$iN1,array("+z"),0);
storedata('8.3.55','sa',0);
storedata('8.3.57','sa',0);
storedata('8.3.59','sa',0);
}
// this is the pending work, which I have started. is and us ending words usually take the 's' -> 'S' conversion. 
$isusend = array("arcis","Arcis","avis","Avis","ASis","kravis","krivis","Cadis","Cardis","jyotis","tuvis","tris","dvis","pATis","barhis","Buvis","rocis","varhis","Socis","saDis","sarpis","havis","aprAyus","arus","Arus","asaScus","AsaScus","Ayus","Danus","cakzus","jayus","tanus","tapus","tarus","tasTus","parus","yajus","vapus","Arus",); // Here we will enumerate those which end with is, us, or any eligible candidate.
if(arr($text,'/s\+/') && ((sub($iN1,array("s+","Ms+"),blank(0),0)) && ends(array($fo),$isusend,1) && $pada==="pratyaya" ))
{
$text = two($iN1,array("s+",),$iN1,array("z+"),0);
if ($gender==="n")
{
    $text = two($iN1,array("Ms+",),$iN1,array("Mz+"),0);
}
storedata('8.3.55','sa',0);
storedata('8.3.57','sa',0);
storedata('8.3.59','sa',0);
}
/* numvisarjanIyazarvyavAye'pi (8.3.58) */
// Not coded perfectly, only according to the need of vibhaktis.
$iN1 = array("i","I","u","U","f","F","x","X","e","o","E","O","h","y","v","r","l","k","K","g","G","N");
$pr1= '/(['.flat($iN1).'])([M+]*)([s])([uA])/'; // num
$pr2= '/(['.flat($iN1).'])([H+]*)([s])([uA])/'; // visarga
$pr3= '/(['.flat($iN1).'])([S+]*)([s])([uA])/'; // z
$pr4= '/(['.flat($iN1).'])([z+]*)([s])([uA])/'; // S
$pr5= '/(['.flat($iN1).'])([s+]*)([s])([uA])/'; // s
$prr = '$1$2z$4'; // replacement
if ( (arr($text,'/['.flat($iN1).']([HSzs+]*)[s][uA]/')|| (arr($text,'/['.flat($iN1).']([HSzs+]*)[s][uA]/') && $num===1 )) && sub(array("+su","+sAm"),blank(0),blank(0),0) )
{
    foreach ($text as $value)
    {
        if(in_array(1,$num))
        {
        $val[] = preg_replace($pr1,$prr,$value);            
        }
        $val[] = preg_replace($pr2,$prr,$value);
        $val[] = preg_replace($pr3,$prr,$value);
        $val[] = preg_replace($pr4,$prr,$value);
        $val[] = preg_replace($pr5,$prr,$value);
    }
    $text = array_diff($val,$text);; 
    $text = array_unique($text);
    $text = array_values($text);
    $val=array();
	storedata('8.3.58','sa',0);
}
/* upasargAt sunotisuvatisyatistautistobhatisthAsenayasedhasicasaJjasvaJjAm (8.3.65) */
if(arr($text,'/[iyuv][+]([aAiIuUfFeEoOhyvr]*)s/') && in_array($fo,array("zuY","zu","zo","zwuY","zWA","ziDa!","zidU!","zica!","zanja!","zaYja!","zwuBu!")) && arr(array($us),'/[iu]$/'))
{
	$text=two(array("i+","y+","u+","v+"),array("s"),array("i+","y+","u+","v+"),array("z"),0);
	$text=three(array("i+","y+","u+","v+"),prat('aw'),array("s"),array("i+","y+","u+","v+"),prat('aw'),array("z"),0);
	storedata('8.3.65','sa',0);
} 
/* hanteratpUrvasya (8.4.22) */
if((arr($text,'/han/')||arr($text,'/Gn/')) && sub($upasarga,array("han","Gn"),blank(0),0))
{
$text = two($upasarga,array("han","Gn"),$upasarga,array("haR","Gn"),0);
storedata('8.4.22','sa',0);
} 
if( arr($text,'/[G][n]/') && arr(array($fo),'/[h][a][n]/') && !sub($upasarga,array("han","Gn"),blank(0),0))
{
$text = one(array("han","Gn"),array("haR","Gn"),0);
storedata('8.4.22','sa',0);
}
if ($debug===1) {dibug("11200");}
/* raSAbhyAM no NaH samAnapade (8.4.1) */
// pUrvasmAdapi vidhau sthAnivadbhAvaH , pUrvatrAsiddhe na sthAnivat (vA 433) and tasya doSaH saMyogAdilopalatvaNatveSu (vA 440) are pending to code.
if($pada === "pratyaya" && arr($text,'/[rz]([+]*)n/'))
{
$text = two(array("r","z"),array("n"),array("r","z"),array("R"),0);
storedata('8.4.1','sa',0);
}
/* ekAjuttarapade NaH (8.4.12) */
// very bad coding for this. Difficult to teach this samAsa, before machine understands samAsa. Therefore enumeration method is used here.
if (arr($text,'/punarBU\+nAm/'))
{
    $ekajuttarapada=1; // Because there is ekAc uttarapada in this samAsa.
}
$rasek = '/([rzfF])([aAiIuUfFxXeoEOhyvrkKgGNpPbBmM+]*)([n])/'; // pattern which qualifies for this sUtra.
$ras1ek = '$1$2R'; 
if( $ekajuttarapada===1 && arr($text,$rasek) && $hohante===0 )
{
    foreach ($text as $value)
    {
        $value1[] = preg_replace($rasek,$ras1ek,$value);
    }
    $text = $value1;
storedata('8.4.12','sa',0);
}
if (sub(array("SrIpAn+i","vftrahan+"),blank(0),blank(0),0) && !arr($text,'/[+]$/')) // Patch for zrIpANi
{
    $text=one(array("SrIpAn+i","vftrahan+"),array("SrIpAR+i","vftrahaR+"),0);
	storedata('8.4.12','sa',0);
}
/* Patch to remove the + sign */
// For dvitva, + sign pauses many problems. Now we don't have to remember what was prakRti and what was pratyaya. Therefore we can afford to remove + sign now.
if (arr($text,'/['.pc('hl').' ][+]['.pc('hl').']/') || arr($text,'/[HM!][+]['.pc('hl').']/') || arr($text,'/['.pc('hl').'][+][HM]/'))
{
$text = three($hl,array("+"," +"),$hl,$hl,array(""," "),$hl,0);    
$text = three(array("H","M","!"),array("+"),$hl,array("H","M","!"),array(""),$hl,0);    
$text = three($hl,array("+"),array("H","M"),$hl,array("+"),array("H","M"),0);    
}
if ( arr($text,'/['.pc('ac').'HM! ][+]['.pc('ac').']/') || arr($text,'/[HM!][+]['.pc('ac').']/') )
{  
$text = one(array("+"),array(" "),0);
}
if ( arr($text,'/['.pc('ac').' ][+]['.pc('hl').'MH]/') || arr($text,'/[+]$/')  || arr($text,'/['.pc('hl').'][+][HM]/'))
{  
$text = one(array("+"),array(""),0);
}
if ( arr($text,'/['.pc('hl').'][+]['.pc('ac').']/') )
{
$text = one(array("+"),array(""),0);
}
$ras = '/([rzfF])([aAiIuUfFxXeoEOhyvrkKgGNpPbBmM+]*)([n])/';
$rasend = '/([rzfF])([aAiIuUfFxXeoEOhyvrkKgGNpPbBmM+]*)([n])$/';
$rasgrep= '/([rzfF][aAiIuUfFxXeoEOhyvrkKgGNpPbBmM+]*[n])/';
$ras1 = '$1$2R'; 
/* AcAryAdaNatvaM ca (vA 2477) */
if (arr($text,'/AcAryAnI/'))
{
	storedata('4.1.49-6','sa',0);
}
/* kSubhnAdiSu ca (8.4.39) */
elseif (arr($text,'/kzuBn/') && $fo==="kzuBa!" && $verbset==="kryAdi")
{
	storedata('8.4.39','pa',0);
}
/* aTkupvAGnumvyavAye'pi (8.4.2) and na padAntasya (8.4.37) */
/* RvarNAnnasya NatvaM vAcyam (vA 4969) */
/* na padAntasya 8.4.37) */
// The issue is identifying samAnapada. Can't be coded properly as of now.
elseif (arr($text,$rasend) && $hohante===0 && $AcArya===0 )
{
	storedata('8.4.37','pa',0);
}
elseif (arr($text,$ras) && $hohante===0 && $_GET['cond2_16_2_1']!=="2" && !sub(array("UruBinn"),blank(0),blank(0),0) )
{ 
	$inloop=$text;
    foreach ($text as $value)
    {
        if (preg_match('/([rzfF])([aAiIuUfFxXeoEOhyvrkKgGNpPbBmM+]*)([n])/',$value) )
        {
        $value = preg_replace($ras,$ras1,$value);
        $value = preg_replace('/[R]$/','n',$value);
        $value1[] = $value;
        }
        else
        {
        $value1[] = $value;    
        }
    }
	$text = $value1;
	$value1 = array();
	if ($inloop!==$text)
	{
		if(arr($text,'/hAyaR/') && sub(array("trihAyaR","caturhAyaR",),blank(0),blank(0),0) && $hohante===0 && $_GET['cond2_16_2_1']==="1")
		{
			// Pending to refactor
		/*echo "<p class = sa >By tricaturbhyAM hAyanasya NatvaM vAcyam (vA 5038) :</p>\n";
		echo "<p class = sa >त्रिचतुर्भ्यां हायनस्य णत्वं वाच्यम्‌ (वा ५०३८) :</p>\n";     */
		}
		elseif(arr($text,'/([fF])([aAiIuUfFxXeoEOhyvrkKgGNpPbBmM+]*)([R])/') && $hohante===0)
		{
			storedata('8.4.1-1','sa',0);
		}
		elseif(arr($text,'/([rzf])([aAiIuUfFxXeoEOhyvrkKgGNpPbBmM+]*)([R])/') && $hohante===0)
		{
			storedata('8.4.2','sa',0);
		}
	}
}
if ($debug===1) {dibug("11300");}
/* stoH zcunA zcuH (8.4.40) */
$stu = array("s","t","T","d","D","n"); // sakAra and tavarga.
$zcu = array("S","c","C","j","J","Y"); // zakAra and cavarga.
if(arr($text,'/[stTdDn]([+]*)[ScCjJY]/'))
{
$text = two(array("s"),$zcu,array("S"),$zcu,0); // sakAra followed by cavarga.
$text = two(array("t"),$zcu,array("c"),$zcu,0); // tavarga followed by cavarga.
$text = two(array("T"),$zcu,array("C"),$zcu,0);
$text = two(array("d"),$zcu,array("j"),$zcu,0);
$text = two(array("D"),$zcu,array("J"),$zcu,0);
$text = two(array("n"),$zcu,array("Y"),$zcu,0);
storedata('8.4.40','sa',0);
}
/* stoH zcunA zcuH (8.4.40) and zAt (8.4.44) */
$zcu1= array("c","C","j","J","Y"); // zAt prevents application in case of zakAra being first letter. Therefore created a new array without zakAra.
if(arr($text,'/[cCjJY]([+]*)[stTdDn]/'))
{
$text = two($zcu1,array("s"),$zcu1,array("S"),0); 
$text = two($zcu1,array("t"),$zcu1,array("c"),0); 
$text = two($zcu1,array("T"),$zcu1,array("C"),0); 
$text = two($zcu1,array("d"),$zcu1,array("j"),0);
$text = two($zcu1,array("D"),$zcu1,array("J"),0); 
$text = two($zcu1,array("n"),$zcu1,array("Y"),0); 
$text = two(array("S"),array("s"),array("S"),array("S"),0); // z+s=z+z
storedata('8.4.40','sa',0);
storedata('8.4.44','sa',0);
}
/* anAmnavatinagarINAmiti vAcyam (vA 5016) */
$shtu = array("z","w","W","q","Q","R",); // SakAra and Tavarga.
if (arr($text,'/[zwWqQR]([+]*)n/') && sub($shtu,array("nAm","navat","nagar"),blank(0),0) && $allopo!==1)
{
$text = two($shtu,array("nAm","navat","nagar"),$shtu,array("RAm","Ravat","Ragar"),0);
storedata('8.4.42','sa',0);
// Pending to refactor anAmnavati..
/*echo "<p class = sa >By na padAntATToranAm (".link_sutra("8.4.42").") and anAmnavatinagarINAmiti vAcyam (vA 5016) :</p>\n";
echo "<p class = sa >न पदान्ताट्टोरनाम्‌ (८.४.४२) तथा अनाम्नवतिनगरीणामिति वाच्यम्‌ (वा ५०१६) :</p>\n";
display(0);*/
if (arr($text,'/[zwWqQR]([+]*)R/') && sub($shtu,array("Ravat","Ragar"),blank(0),0) && $allopo!==1)
{
$text = two($shtu,array("Ravat","Ragar"),array("R","R","R","R","R","R"),array("Ravat","Ragar"),0);
storedata('8.4.41','sa',0);
}
if (arr($text,'/[zwWqQR]([+]*)RAm/') && $allopo!==1) // yaro'nunAsike'nunAsiko vA is mandatory in pratyayas. nAm being a pratyaya, we are displaying this message.
{
$text = two($shtu,array("RAm"),array("R","R","R","R","R","R"),array("RAm"),0);
storedata('8.4.45','sa',0);
storedata('8.4.45-1','sa',0);
}
}
/* stoH STunA STuH (8.4.41) and na padAntATToranAm (8.4.41) and toH Si (8.4.43) */
$Tu = array("w","W","q","Q","R",); $tu = array("t","T","d","D","n");
if( $allopo===1 && ((sub($shtu,$stu,blank(0),0)|| sub($stu,$shtu,blank(0),0))) )
{
	// Pending to refactor
/*    echo "<p class = pa >STunA STuH (".link_sutra("8.4.41").") is prevented by sthAnivadbhAva of allopa. The same result can be obtained by asiddhatva of bahiraGga allopa in kAryakAlapakSa.</p>\n";
    echo "<p class = pa >पूर्वस्मादपि विधावल्लोपस्य स्थानिवद्भावान्न ष्टुत्वम्‌ । कार्यकालपक्षे बहिरङ्गस्य अल्लोपस्य असिद्धत्वाद्वा ।</p>\n";
    display(0);    */
}        
if( $allopo===0 && ((arr($text,'/[zwWqQR]([+]*)[stTdDn]/')|| arr($text,'/[stTdDn]([+]*)[zwWqQR]/'))))
{
$text = two(array("z"),$stu,array("z"),$shtu,0);
$text = two(array("s"),$shtu,array("z"),$shtu,0);
$text = two(array("t"),$Tu,array("w"),$Tu,0);
$text = two(array("T"),$Tu,array("W"),$Tu,0);
$text = two(array("d"),$Tu,array("q"),$Tu,0);
$text = two(array("D"),$Tu,array("Q"),$Tu,0);
$text = two(array("n"),$Tu,array("R"),$Tu,0);
    if ($pada === "pratyaya" && (sub($Tu,$tu,blank(0),0)))
    {
        $text = two(array("w"),$tu,array("w"),$Tu,0);
        $text = two(array("W"),$tu,array("W"),$Tu,0);
        $text = two(array("q"),$tu,array("q"),$Tu,0);
        $text = two(array("Q"),$tu,array("Q"),$Tu,0);
        $text = two(array("R"),$tu,array("R"),$Tu,0);
    }       
storedata('8.4.41','sa',0);
storedata('8.4.42','sa',0);
storedata('8.4.43','sa',0);
}
/* Dho Dhe lopaH (8.3.13) */
if (arr($text,'/Q([+]*)Q/'))
{
    $text = three(array("e","o","E","O","M","H"),array("Q"),array("Q"),array("e","o","E","O","M","H"),array(""),array("Q"),0);
    $text = two(array('Q'),array('Q'),array(''),array('#Q'),0); 
	storedata('8.3.13','sa',0);
    $dho = 1;  // 0 - This sUtra has not applied. 1 - This sUtra has applied.
	/* sahivahorodavarNasya (6.3.111) */
	if (in_array($fo,array("vaha!","zaha!")) && sub(array("va","sa","vA","sA"),array("#Q"),blank(0),0) )
	{
		$text = two(array("va","sa","vA","sA"),array("#Q"),array("vo","so","vo","so",),array("Q"),0);
		storedata('6.3.111','sa',0);
	}
} else { $dho = 0; }
/* ro ri (8.3.14) */
if (arr($text,'/r([+]*)r/'))
{
    $text = three(array("e","o","E","O","M","H"),array("r"),array("r"),array("e","o","E","O","M","H"),array(""),array("r"),0);
    $text = two(array('r'),array('r'),array(''),array('#r'),0); 
	storedata('8.3.14','sa',0);
    $ro = 1; // 0 - This sUtra has not applied. 1 - This sUtra has applied.
} else { $ro = 0; }
if ($debug===1) {dibug("11400");}
/* Dhralope pUrvasya dIrgho'NaH (6.3.111) */
$ana = array("a","A","i","I","u","U","f","F","x","X");
$anna = array("A","A","I","I","U","U","F","F","X","X");
if (($ro ===1 || $dho===1) && arr($text,'/[aAiIuUfFxX]([+]*)[#][rQ]/'))
{
$text = two($ana,array('#r','#Q'),$anna,array('r','Q'),0);
storedata('6.3.111','sa',0);
}
/* yaro'nunAsike'nunAsiko vA (8.4.45) */ // this is applicable to only sparzas.
$yara = array("J","B","G","Q","D","j","b","g","q","d","K","P","C","W","T","c","w","t","k","p"); // array of yar varNas.
$anunasikarep = array("Y","m","N","R","n","Y","m","N","R","n","N","m","Y","R","n","Y","R","n","N","m"); // Their corresponding replacement.
$anunasika = array("N","Y","R","n","m"); // array of anunAsika.
if (arr($text,'/['.pc('yr').']\+[NYRnm]/') && $pada === "pada")
{
$text = three($yara,array("+"),$anunasika,$anunasikarep,array("+"),$anunasika,1);
storedata('8.4.45','sa',0);
}
if (arr($text,'/['.pc('yr').']\+[NYRnm]/') && $pada === "pratyaya")
{
$text = two($yara,$anunasika,$anunasikarep,$anunasika,0);
storedata('8.4.45','sa',0);
}
/* nAdinyAkroze putrasya (8.4.48) */
if (arr($text,'/putrAdin/'))
{
	// Pending to refactor.
/*    echo "<p class = sa >By nAdinyAkroze putrasya (".link_sutra("8.4.48").") - If Akroza is meant : The dvitva doesn't happen. Otherwise dvitva will happen.</p>\n";
    echo "<p class = sa >नादिन्याक्रोशे पुत्रस्य (८.४.४८) - यदि आक्रोश के अर्थ में प्रयुक्त हुआ है, तब द्वित्व नहीं होगा । अन्यथा द्वित्व होगा ।</p>\n";*/
}
if (arr($text,'/putrahatI/'))
{
storedata('8.4.48-2','sa',0);
}
if (arr($text,'/putrajagDI/'))
{
storedata('8.4.48-2','sa',0);
}
$cayo=0;
if ($dvitva===1)
{
	/* cayo dvitIyAH zari pauSkarasAderiti vAcyam (vA 5023) */
	if (arr($text,'/[NR]([+]*)[Szs]/'))
	{
	$text = two(array("Nk","Rw"),prat('Sr'),array("NK","RW"),prat('Sr'),1);
	storedata('8.4.48-3','sa',0);
	$cayo=1; 
	} else {$cayo = 0; }
	/*anaci ca (8.4.47)*/ // Here the sudhI + upAsya - what about the Asy - Assy is possbile ? Code gives it. But there are 4 options. Code gives two only.
	// The cause for using $hrasva instead of $ac is that the dIrgha vowels are debarred by dIrghAdAcAyANAm.
	// Here instead of using pratyAhAra hl, we shall do manual enumeration of all the members. Because of "anusvAravisargajihvAmUlIyopadhmAnIyayamAnAmakAropari zarSu ca pAThasyopasaGkhyAtatvenAnusvArasyApyactvAt (in derivation of samskAra) 
	$hrasvaplus = array("M","!","'"); // additionalities mentioned in saMskAra derivation.
	$hala1 = array("y","v","l","Y","m","N","R","n","J","B","G","Q","D","j","b","g","q","d","K","P","C","W","T","c","w","t","k","p","S","z","s","M",);
	$hala2 = array("h","y","v","r","l","Y","m","N","R","n","J","B","G","Q","D","j","b","g","q","d","K","P","C","W","T","c","w","t","k","p","S","z","s","M",); // added h,y
	if(arr($text,'/[aiufx]([+]*)[yvlYmNRnJBGQDjbgqdKPCWTcwtkpSzsM]([+]*)[hyvrlYmNRnJBGQDjbgqdKPCWTcwtkpSzsM]/'))
	{
		$text = dvitva($hrasva,$hala1,$hala2,array(""),2,1);
		if (sub($dirgha,$hala1,$hala2,0))
		{
		storedata('8.4.47','sa',1);
		storedata('8.4.52','sa',1);
		}
		else
		{
		storedata('8.4.47','sa',1);
		}
	}
	if(arr($text,'/[M!\']([+]*)['.pc('hl').']([+]*)[hyvrlYmNRnJBGQDjbgqdKPCWTcwtkpSzsM]/'))
	{
		$text = dvitva($hrasvaplus,$hl,$hala2,array(""),2,1);
		if (arr($text,'/AIUFXeoEO]([+]*)['.pc('hl').']([+]*)[hyvrlYmNRnJBGQDjbgqdKPCWTcwtkpSzsM]/'))
		{
		storedata('8.4.47','sa',1);
		storedata('8.4.52','sa',1);
		}
		else
		{
		storedata('8.4.47','sa',1);
		}
	}
	if(checkarray($dirgha,$hl,array('r','l'),blank(0))!==0 && $sthanivadbhav===1) // for function checkarray, see function.php
	{
	$text = dvitva($dirgha,$hala1,$hala2,array(""),2,1);
		if (sub($dirgha,$hl,array('r','l'),0))
		{
		storedata('8.4.47','sa',1);
		storedata('8.4.52','sa',1);
		}
		else
		{
		storedata('8.4.47','sa',1);
		}
	}
	/* By anaci ca (according to mahAbhASya example of vAkk) */ 
	if (arr($text,'/['.flat($ac).']['.flat($hl).']$/') || (preg_match('/['.flat($ac).']['.flat($hl).']$/',$first) && $input === $first ))
	{
		foreach ($text as $value)
		{
			$split = str_split($value);
			$post = $split[count($split)-1];
			if (in_array($post,$hl))
			{
			$pre = chop($value,$post); 
			$value1[] = str_replace($value,$pre.$post.$post,$value);
			}
			else
			{
				$value1[] = $value;
			}
		}
		$text = array_merge($text,$value1);
		$text = array_unique($text);
		$text = array_values($text);
		$value1 = array();
		if (arr($text,'/[AIUFXeoEO]([+]*)[yvlYmNRnJBGQDjbgqdKPCWTcwtkpSzsM]([+]*)[hyvrlYmNRnJBGQDjbgqdKPCWTcwtkpSzsM]/'))
		{
		storedata('8.4.47','sa',1);
		storedata('8.4.52','sa',1);
		}
		else
		{
		storedata('8.4.47','sa',1);
		}
	}
	/* zaraH khayaH (vA 5019) */
	$shara = array("S","z","s",); // zar varNas.
	if (arr($txt,'/[Szs]([+]*)['.pc('Ky').']/'))
	{
	$text = dvitva($shara,prat('Ky'),array(""),array(""),2,1);
	storedata('8.4.47-2','sa',1);
	}
	/* aco rahAbhyAM dve (8.4.46) */ 
	$rh = array("r","h"); // r,h
	if (arr($text,'/[rh]([+]*)['.pc('yr').']/'))
	{
		if (arr($text,'/[rh]([+]*)['.pc('Sr').']([+]*)['.pc('ac').']/')) // patch to show prohibition by zaro'ci.
		{
		storedata('8.4.48','sa',0);
		}
		else
		{
			$text = dvitva($ac,$rh,prat('yr'),array(""),3,1);
			storedata('8.4.46','sa',1);
		}
	}
	/* triprabhRtiSu zAkaTAyanasya (8.4.50)*/
	if (arr($text,'/['.pc('ac').']([+]*)['.pc('hl').']([+]*)['.pc('hl').']([+]*)['.pc('hl').']/'))
	{
		// Pending to refactor.
	echo "<p class = hn >N.B.: By triprabhRtiSu zAkaTAyanasya (".link_sutra("8.4.50")."), the dvitva is optionally not done in cases where there are more than three hals appearing consecutively. e.g. indra - inndra.  </p>\n";
	echo "<p class = hn >त्रिप्रभृतिषु शाकटायनस्य (८.४.५०) - तीन या उससे ज्यादा हल्‌ अगर हो तब शाकटायन के मत में द्वित्व नहीं होता है ।</p>\n";
	}
}
/* sarvatra zAkalyasya (8.4.51) */
// It is not coded separately. It is sent as a message in all display function when 1 is selected as option. 
/* dIrghAdAcAryANAm (8-4-52) */
// Not coded separately, because we did dvitva only for $hrasva, and not for 'ac'. So this is already taken care of.
if ($debug===1) {dibug("11550");}
/* jhalAM jaz jhazi (8.4.53) */
while(arr($text,'/[JBGQDKPCWTcwtkpSzsh]([+]*)[JBGQDjbgqd]/')) // check whether we should remove jaz from jhal?
{
    if(arr($text,'/[JBGQDKPCWTcwtkpSzshjbgqd]([+]*)[JBGQDjbgqd]/'))
    {
    $text = two(prat('Jl'),prat('JS'),savarna(prat('Jl'),prat('jS')),prat('JS'),0);
	storedata('8.4.53','sa',0);
    }
}
/* yaNo mayo dve vAcye (vA 5018) yaN in paJcamI and may in SaSThI)*/
if ($dvitva===1)
{
	if (arr($text,'/[aiufx]([+]*)['.pc('yR').']([+]*)['.pc('my').']/'))
	{
	$text = dvitva(prat('yR'),prat('my'),array(""),array(""),2,1);
	storedata('8.4.47-1','sa',1);
	}
	if (arr($text,'/[AIUFXeoEO]([+]*)['.pc('yR').']([+]*)['.pc('my').']/') && $sthanivadbhav ===1)
	{
	$text = dvitva(prat('yR'),prat('my'),array(""),array(""),2,1);
	storedata('8.4.47-1','sa',1);
	}
	/* yaNo mayo dve vAcye (vA 5018) may in paJcamI and yaN in SaSThI)*/
	if (arr($text,'/[aiufx]([+]*)['.pc('my').']([+]*)['.pc('yR').']/'))
	{
	$text = dvitva(prat('my'),prat('yR'),array(""),array(""),2,1);
	storedata('8.4.47-1','sa',1);
	}
	if (arr($text,'/[AIUFXeoEO]([+]*)['.pc('my').']([+]*)['.pc('yR').']/') && $sthanivadbhav ===1)
	{
	$text = dvitva(prat('my'),prat('yR'),array(""),array(""),2,1);
	storedata('8.4.47-1','sa',1);
	}
}
if ($debug===1) {dibug('11600');}
/* vA'vasAne (8.4.56) */
if (arr($text,'/['.pc('Jl').']$/'))
{
$text = last(prat('Jl'),savarna(prat('Jl'),prat('cr')),1);
storedata('8.4.56','sa',0);
}
/* khari ca (8.4.55) */ 
$Jl1 = array("J","B","G","Q","D","j","b","g","q","d","K","P","C","W","T","c","w","t","k","p","S","z","s","h"); // complete jhal.
$Jl2 = array("J","B","G","Q","D","j","b","g","q","d","K","P","C","W","T","h"); // jhal without car.
if ($cayo!==1)
{
    while(arr($text,'/[JBGQDjbgqdKPCWTh]([+]*)['.pc('Kr').']/')) // this rule can apply add infinitum.
    {
        if ( (arr($text,'/[JBGQDjbgqdKPCWTcwtkpSzsh]([+]*)['.pc('Kr').']/') || $dhut === 1))
        {
        $text = two($Jl1,prat('Kr'),savarna(prat('Jl'),prat('cr')),prat('Kr'),0);
		storedata('8.4.55','sa',0);
        }
    }
}
elseif (arr($text,'/['.pc('cr').']([+]*)['.pc('Kr').']/') || $dhut === 1) // parjanyavallakSaNapravRttiH.
{
	storedata('8.4.55','sa',0);
}
/* aNo'pragRhyasyAnunAsikaH (8.4.57) */
/*if (arr($text,'/[aAiIuUfFxX]$/'))
{
    $text = last(array("a","A","i","I","u","U","f","F","x","X"),array("a!","A!","i!","I!","u!","U!","f!","F!","x!","X!"),1);
	storedata('8.4.57','sa',0);
}*/
/* anusvArasya yayi parasavarNaH (8.4.58) */
$mm = array("My","Mv","Mr","Ml","MY","Mm","MN","MR","Mn","MJ","MB","MG","MQ","MD","Mj","Mb","Mg","Mq","Md","MK","MP","MC","MW","MT","Mc","Mw","Mt","Mk","Mp"); // anusvAra+yay.
$pa = array("!yy","!vv","!rr","!ll","YY","mm","NN","RR","nn","YJ","mB","NG","RQ","nD","Yj","mb","Ng","Rq","nd","NK","mP","YC","RW","nT","Yc","Rw","nt","Nk","mp"); // its replacement.
if (arr($text,'/M([+]*)['.pc('yy').']/') && (in_array(1,$num) || in_array($so,$tiG) ))
{
$text = one($mm,$pa,0);
storedata('8.4.58','sa',0);
}
/* anusvArasya yayi parasavarNaH (8.4.58) and vA padAntasya (8.4.59) */
elseif (arr($text,'/M([+]*)['.pc('yy').']/'))
{
$text = one($mm,$pa,1);
storedata('8.4.58','sa',0);
storedata('8.4.59','sa',0);
}
/* torli (8.4.60) */
$to = array("tl","Tl","dl","Dl","nl"); // combinations satisfying rule conditions.
$lirep = array("ll","ll","ll","ll","l!l",); // its replacement.
while(arr($text,'/[tTdDn]l/') !== false)
{
if (arr($text,'/[tTdDn]l/'))
{
$text = one($to,$lirep,0);
storedata('8.4.60','sa',0);
}
}
/* jhayo ho'nyatarasyAm (8.4.62) */ 
$Jy = array("Jh","Bh","Gh","Qh","Dh","jh","bh","gh","qh","dh","Kh","Ph","Ch","Wh","Th","ch","wh","th","kh","ph",); // combination satisfying condition.
$h1 = array("JJ","BB","GG","QQ","DD","jJ","bB","gG","qQ","dD","KG","PB","CJ","WQ","TD","cJ","wQ","tD","kG","pB",); // its replacement.
if (arr($text,'/['.pc('Jy').']h/')) 
{
$text = one($Jy,$h1,1);
storedata('8.4.62','sa',0);
}
/* zazCho'Ti (8.4.63) and ChatvamamIti vAcyam (vA 5025) */
$Jy = array("JS","BS","GS","QS","DS","jS","bS","gS","qS","dS","KS","PS","CS","WS","TS","cS","wS","tS","kS","pS",); // combination satisfying condition.
$h1 = array("JC","BC","GC","QC","DC","jC","bC","gC","qC","dC","KC","PC","CC","WC","TC","cC","wC","tC","kC","pC",); // its replacement.
$aT = array("a","A","i","I","u","U","f","F","x","X","e","o","E","O","h","y","v","r","l","Y","m","G","R","n"); // am varNas.
if(arr($text,'/['.pc('Jy').']S([+]*)['.pc('aw').']/') && $pada === "pada")
{
$text = two($Jy,$aT,$h1,$aT,1);
storedata('8.4.63','sa',0);
storedata('8.4.63-1','sa',0);
}
/* halo yamAM yami lopaH (8.4.64) */ 
$duplicate = array("NN","YY","RR","nn","mm","yy","rr","ll","vv",); // combination satisfying condition.
$dup = array("N","Y","R","n","m","y","r","l","v",); // its replacement.
$hl = array("k","K","g","G","N","c","C","j","J","Y","w","W","q","Q","R","t","T","d","D","n","p","P","b","B","m","y","r","l","v","S","z","s","h"); // hal varNas.
if (arr($text,'/['.pc('hl').']([+]*)[NYRnmyrlv][NYRnmyrlv]/') && sub($hl,$duplicate,blank(0),0))
{	
$text = two($hl,$duplicate,$hl,$dup,1);
storedata('8.4.64','sa',0);
}
/* jharo jhari savarNe (8.4.65) */ 
$kkk = array("k","K","g","G"); 
$ccc = array("c","C","j","J",);
$www = array("w","W","q","Q",); 
$ttt = array("t","T","d","D",);
$ppp = array("p","P","b","B"); // savarNa groups.
if (arr($text,'/['.pc('hl').'][kKgG][kKgG]/') ){ $text = three(prat('hl'),$kkk,$kkk,prat('hl'),blank(4),$kkk,1); storedata('8.4.65','sa',0); }
if (arr($text,'/['.pc('hl').'][cCjJ][cCjJ]/') ){ $text = three(prat('hl'),$ccc,$ccc,prat('hl'),blank(4),$ccc,1); storedata('8.4.65','sa',0); }
if (arr($text,'/['.pc('hl').'][wWqQ][wWqQ]/') ){ $text = three(prat('hl'),$www,$www,prat('hl'),blank(4),$www,1); storedata('8.4.65','sa',0); }
if (arr($text,'/['.pc('hl').'][tTdD][tTdD]/') ){ $text = three(prat('hl'),$ttt,$ttt,prat('hl'),blank(4),$ttt,1); storedata('8.4.65','sa',0); }
if (arr($text,'/['.pc('hl').'][pPbB][pPbB]/') ){ $text = three(prat('hl'),$ppp,$ppp,prat('hl'),blank(4),$ppp,1); storedata('8.4.65','sa',0); }
/* nipAta forms */ 
/* apaspRdhethAmAnRcurAnRhuzcicyuSetityAhAzrAtAHzritamAzIrAzIrtAH (6.1.35) */ 
if( $veda===1 && sub(array("apasparDeTAm","AnarcuH","AnarhuH","cucyuvize","tatyAja"),blank(0),blank(0),0) )
// pending zrAtAH.... onwards. Original words to be found out.
{
	$text = one(array("apasparDeTAm","AnarcuH","AnarhuH","cucyuvize","tatyAja"),array("apaspfDeTAm","AnfcuH","AnfhuH","cicyuze","tityAja"),0);
	storedata('6.1.35','sa',0);
}
/* pratizeDe svaradIrGayalopezu lopAjAdeSaH na sTAnivat (1.1.58-1) */
if ( arr($text,'/[vy][+]*['.pc('vl').']/') && in_array($so,$tiG) && in_array("6.1.77",sutrasfromstoredata()))
{
	storedata('1.1.58-1','pa',0);
}
/* lopo vyorvali (6.1.66) */
elseif ( arr($text,'/[vy][+]*['.pc('vl').']/') && in_array($so,$tiG) && !in_array("6.1.77",sutrasfromstoredata()))
{
    $text=change('/([vy])([+]*['.pc('vl').'])/','$2');
	storedata('6.1.66','sa',0);
}
if ($debug===1) {dibug('11700');}
//$us='';
/* Displaying the sUtras and sequential changes of $frontend is not set to 0. */
if ($frontend!=="0")
{
	if($debug===1) {dibug('DISPLAY_FROM_STOREDATA START');}
	display_from_storedata();
	if($debug===1) {dibug('DISPLAY_FROM_STOREDATA END');}
	/*if($debug===1) {dibug('PRINT_FROM_STOREDATA START');}
	print_from_storedata();
	if($debug===1) {dibug('PRINT_FROM_STOREDATA END');}*/
}
if ($debug===1) {dibug('11710');}
/* Final Display */
if ($frontend!=="0")
{	
	echo "<p class = sa >Final forms are :</p>\n";
	echo "<p class = sa >आखिरी रूप हैं :</p>\n";
	display(0);
	echo "<hr>\n";
	$ou[] = implode(', ',$text);
}
else
{
	$ou[] = implode(',',$text);
}


/* setting the $pada back to pratyaya for next use */
$pada="pratyaya";
$id_dhAtu=$id_original;
$id_pratyaya=$id_original_pratyaya;
$it = array();
$itprakriti = array();
$itpratyaya = array();
$Agama=array();
$sanAdi="";
$TAp=0; $DAp=0; $cAp=0; $GIp=0; $GIn=0; $GIS=0; $kGiti=0; $abhyasta=0; $ajAdyataSTAp=0; $tusma=0; $upasarga_joined=0; $sicivRddhi=0; $atolopa=0;
$temp = scrape1($first,0,2,1); 
$verb_without_anubandha=$temp[0];
$storedata=array();
$text=array();
if ($debug===1) {dibug('11740');}

}

if ((isset($argv[0])|| $test ===1) )
{ 
	//$suspectentryfile = fopen('suspectverbforms.txt','a+');
	$generatedformfile = fopen('generatedforms.xml','a+');
	//$verblist = verbformlist();
	//$verbsingerard = verblist();
	//wrongformlist($ou,$verblist,"fast"); // Uncomment this if you want only the list of suspect verbs for which Gerard has database.
	//wrongformlist($ou,$verblist); // Uncomment this if you want to get the list of all suspect verbs for irrespecitve of Gerard's database.
	generatedforms($ou,$generatedformfile);
	fclose($suspecentryfile);
	fclose($generatedformfile);
	/*$susinput = file_get_contents('suspectverbforms.txt');
	$susoutput = convert($susinput);
	file_put_contents('suspectverbforms_deva.txt',$susoutput);*/
}
elseif ($type==="tiGanta")
{
	$ou = array_map('convert',$ou);
	tablemaker($ou);
	/* Closing the HTML */
	echo "</body>
	</html>";
	fputs($outfile,"</body>
	</html>");
	fclose($outfile);
}
elseif ($type==="subanta")
{
	$ou = array_map('convert',$ou);
	tablemaker1($ou);
	/* Closing the HTML */
	echo "</body>
	</html>";
	fputs($outfile,"</body>
	</html>");
	fclose($outfile);
}

/* Logging the end of execution in logfile */
fputs($logfile,"Request completed on :".date('D, d M Y H:i:s')."\n");
fputs($logfile,"------------------------------\n");
fclose($logfile);
if ($debug===1) {dibug('11760');}
//echo "Total time taken for execution of code is ";
//timestamp();
/* End of Code */
?>


