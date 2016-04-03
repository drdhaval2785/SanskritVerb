﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="scripts/mystyle.css">
</link>
</meta>
</head> 
<body>
<?php
 /* This code is developed by Dr. Dhaval Patel (drdhaval2785@gmail.com) of www.sanskritworld.in and Ms. Sivakumari Katuri.
  * Layout assistance by Mr Marcis Gasuns.
  * Available under GNU licence.
  * Version 2.0 date 4 September 2014
  * The latest source code is available at https://github.com/drdhaval2785/sanskrit
  * Acknowledgements: I extend my heartfelt thanks to Ananda Loponen for the code to convert devanagari and various sanskrit transliterations. That can be accessed at http://www.ingmardeboer.nl/php/diCrunch.php?act=help.
  * I also extend my gratitude to gloomy.penguin of stackoverflow.com, who helped me create dvitva and lopa functions, without which I would be handicapped.
  * For setup, copy and paste subanta.php, subanta.html, script.js, ajax.php, function.php, mystyle.css, slp-dev.php and dev-slp.php to your localhost and server and run subanta.html.
  * subanta.html is the frontend for the code.
  * ajax.php and script.js are codes which asks for user feedback for particular words. 
  * function.php stores the frequently used functions in this code (The description on how to use the code is there in function.php).
  * subanta.php is the code which actually gives the output of the word derivation.
  * slp-dev.php is for converting SLP1 data to Devanagari. 
  * dev-slp.php is for converting Devanagari data to SLP1.
  * Mystyle.css is stylesheet where you can change your preferences.
  * The code uses jquery.
  * The description part uses Howard Kyoto protocol.
  * The coding uses SLP1 transliteration.
  */
 
/* Including arrays and functions */
include "scripts/function.php"; // includes the file function.php which is collection of functions used in this code.
include "scripts/slp-dev.php"; // includes code for conversion from SLP to devanagari,
include "scripts/dev-slp.php"; // includes code for devanagari to SLP.

/* hides error reports. */
//error_reporting(0);
/* set execution time to an hour */
ini_set('max_execution_time', 36000);
/* set memory limit to 1000 MB */
ini_set("memory_limit","1000M");

/* Reading from the HTML input. */
$first = $_GET["first"]; // word entered by the user.
//$second = $_GET['second']; // This has been bracketed because we are taking second member automatically.
$tran = $_GET['tran']; // "Devanagari" - devanagari, "IAST" - IAST, "SLP1" - SLP1 transliteration.
//$gender = $_GET['gender']; // "m" - male. "f" - female. "n" - neuter.
$gender = "f";
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
$vasu = 0; // 0 - no vasvanta, 1 - vasvanta.
$shap = 0; // 0 - no zap pratyaya. 1 - zap pratyaya.
$shyan = 0; // 0 - no zyan pratyaya. 1 - zyan pratyaya.
$tRcvat=0; // 0 - not tRjvat. 1 - tRjvat. e.g. tRjvat kroSTuH.
$R = array(); // creating an array where we can store whether the word has 'R' as it marker.
$num = array(); // creating an array where we can store whether the word has 'num' Agama. 
$it = array(); // Creating an array where we can store it markers.
$itprakriti = array(); // creating an array where we can store it markers of prakRti.
$itpratyaya = array(); // creating an array where we can store it markers of pratyayas.
$samp = array(); // creating an array where we can store whethere samprasAraNa has happened or not.
$ajAdyataSTAp = 0; // 0 - not ajAdyataSTAp application. 1 - ajAdyataSTAp has applied.
// rest of the variables will be defined at their particular occurence in the code.

/* Code for converting from IAST to SLP1 */
// defining IAST letters.
$iast = array("a","ā","i","ī","u","ū","ṛ","ṝ","ḷ","ḹ","e","ai","o","au","ṃ","ḥ","kh","ch","ṭh","th","ph","gh","jh","ḍh","dh","bh","ṅ","ñ","ṇ","k","c","ṭ","t","p","g","j","ḍ","d","b","n","m","y","r","l","v","s","h","ś","ṣ",);
// defining SLP1 letters.
$slp = array("a","A","i","I","u","U","f","F","x","X","e","E", "o","O", "M","H","K", "C",  "W", "T", "P","G", "J",  "Q", "D","B", "N","Y","R","k","c","w","t","p","g","j","q","d","b","n","m","y","r","l","v","s","h","S","z",);
  if (preg_match('/[āĀīĪūŪṛṚṝṜḷḶḹḸṃṂḥḤṭṬḍḌṅṄñÑṇṆśŚṣṢV]/',$first) ) // if there is IAST letters in the input, change them to SLP1
{
    $first = str_replace($iast,$slp,$first);
}
if ($tran === "IAST") // if the user says that the input is IAST - change it to SLP1.
{
     $first = str_replace($iast,$slp,$first);
}
/* Code for converting from devanagari - SLP1 */ 
//This is innocuous. Therefore even running without the selection in dropdown menu. 
$first = json_encode($first);
$first = str_replace("\u200d","",$first); // removing whitespace
$first = str_replace("\u200c","",$first); // removing whitespace
$first = json_decode($first);
$first = convert1($first); // converting to SLP1

$fo = $first; // remembering the original prakRti. Sometimes we need to know what was the original prakRti.
$text=array($first);
print_r($text);
/* striyAm (4.1.3) */
    echo "<p class = pa >striyAm (4.1.3) :</p>"; // the class 'pa' is used for sUtras, which are not vidhisUtras.
    echo "<p class = pa >स्त्रियाम्‌ (४.१.३) :</p>";
    display(0); // see function.php for documentation for display function.
/* adding a "+" sign to mark separation of prAtipadika and pratyaya */
$text = addlast($text,"+",0);
print_r($text);
/* ajAdyataSTAp (4.1.4) */
// dIrgha are pending. e.g. mahAja? what will happen? 
// SUdrA is pending. User feedback needed.
$ajAdi = array("aja","eqaka","aSva","cawaka","mUzika","bAla","vatsa","hoQa","manda","bilAta","samPala","BastraPala","ajinaPala","SaNaPala","piRqaPala","satpuzpa","prAkpuzpa","pratyakpuzpa","kARqapuzpa","prAntapuzpa","Satapuzpa","ekapuzpA","kruYc","uzRih","devaviS","jyezWa","kanizWa","maDyama","kokila","amUla");
/* vArtikas to ajAdyataSTAp */
/* sambhastrAjinaSaNapiNDebhyaH phalAt (vA 2497) */
if( ends($text,addlast(array("samPala","BastraPala","ajinaPala","SaNaPala","piRqaPala"),"+",0),1))
{
    echo "<p class = sa >sambhastrAjinaSaNapiNDebhyaH phalAt (vA 2497) :</p>";
    echo "<p class = sa >सम्भस्राजिनशणपिण्डेभ्यः फलात्‌ (वा २४९७) :</p>";        
    display(0); $ajAdyataSTAp = 1;
}
/* sadackARqaprAntaSataikebhyaH puSpAt (vA 1496) */
elseif( ends($text,addlast(array("satpuzpa","prAkpuzpa","pratyakpuzpa","kARqapuzpa","prAntapuzpa","Satapuzpa","ekapuzpA"),"+",0),1))
{
    echo "<p class = sa >sadackARqaprAntaSataikebhyaH puSpAt (vA 1496) :</p>";
    echo "<p class = sa >सदच्काण्डप्रान्तशतैकेभ्यः पुष्पात्‌ (वा १४९६) :</p>";        
    display(0); $ajAdyataSTAp = 1;
}
/* zUdrA cAmahatpUrvA jAtiH (vA 2400-2401) */
// pending because of user feedback.
/* sadackARqaprAntaSataikebhyaH puSpAt (vA 1496) */
elseif( ends($text,addlast(array("satpuzpa","prAkpuzpa","pratyakpuzpa","kARqapuzpa","prAntapuzpa","Satapuzpa","ekapuzpA"),"+",0),1))
{
    echo "<p class = sa >sadackARqaprAntaSataikebhyaH puSpAt (vA 1496) :</p>";
    echo "<p class = sa >सदच्काण्डप्रान्तशतैकेभ्यः पुष्पात्‌ (वा १४९६) :</p>";        
    display(0); $ajAdyataSTAp = 1;
}
/* mUlAnnaJaH (vA 2500) */
elseif( ends($text,addlast(array("amUla"),"+",0),1))
{
    echo "<p class = sa >mUlAnnaJaH (vA 2500) :</p>";
    echo "<p class = sa >मूलान्नञः (वा २५००) :</p>";        
    display(0); $ajAdyataSTAp = 1;
}
/* ajAdyataSTAp (4.1.4) with explanation for inclusion in ajAdi gaNa */
elseif ( ends($text,addlast($ajAdi,"+",0),1) ) 
{
    echo "<p class = sa >ajAdyataSTAp (4.1.4) :</p>";
    echo "<p class = sa >अजाद्यतष्टाप्‌ (४.१.४) :</p>";
/* displaying various sub part of ajAdi gaNa and relevant explanation for introduction of word in ajAdi gaNa */
    if( ends($text,addlast(array("aja","eqaka","aSva","cawaka","mUzika"),"+",0),1))
    {
    echo "<p class = hn >jAtilakSaNa GIS pratyaya is barred by this sUtra. </p>";
    echo "<p class = hn >जातिलक्षण ङीष्‌ प्रत्यय का बाध करने के लिए अजादि गण में इनका समावेश किया गया है ।</p>";
    }
    if( ends($text,addlast(array("bAla","vatsa","hoQa","manda","bilAta"),"+",0),1))
    {
    echo "<p class = hn >These have been enumerated in ajAdi gaNa to bar application of GIp pratyaya by 'vayasi prathame'.</p>";
    echo "<p class = hn >'वयसि प्रथमे' से प्राप्त ङीप्‌ प्रत्यय का बाध करने के लिए अजादि गण में इनका समावेश किया गया है ।</p>";        
    }    
    if( ends($text,addlast(array("kruYc","uzRih","devaviS"),"+",0),1))
    {
    echo "<p class = hn >These are not ending with akAra. Therefore included in ajAdi class for TAp pratyaya.</p>";
    echo "<p class = hn >अदन्तत्व नहीं होने के कारण टाप्‌ प्रत्यय के लिए समर्थ बनाने के लिए अजादि गण में इनका समावेश किया गया है ।</p>";        
    }    
    if( ends($text,addlast(array("jyezWa","kanizWa","maDyama"),"+",0),1))
    {
    echo "<p class = hn >Even in puMyoga, this word takes TAp pratyaya.</p>";
    echo "<p class = hn >पुंयोग में भी टाप्‌ प्रत्यय के लिए समर्थ बनाने के लिए अजादि गण में इनका समावेश किया गया है ।</p>";        
    }    
    if( ends($text,addlast(array("kokila"),"+",0),1))
    {
    echo "<p class = hn >Even in jAti, this word takes TAp pratyaya.</p>";
    echo "<p class = hn >जाति में भी टाप्‌ प्रत्यय के लिए समर्थ बनाने के लिए अजादि गण में इनका समावेश किया गया है ।</p>";        
    }    
    $text = two($ajAdi,array("+"),$ajAdi,array("+wAp"),0);
    display(0); $ajAdyataSTAp = 1;
}
/* ajAdyataSTAp (4.1.4) for adanta words */
elseif (arr($text,'/[a][+]$/') && $gender==="f") 
{
    $text = addlast($text,"wAp",0);
    echo "<p class = sa >ajAdyataSTAp (4.1.4)  :</p>";
    echo "<p class = sa >अजाद्यतष्टाप्‌ (४.१.४) :</p>";
    display(0); $ajAdyataSTAp = 1;
}
// completed ajAdyataSTAp.

/* bahuguNavatuDati saGkhyA (1.1.28) */
/* Dati ca (1.1.25) */
if (in_array($fo,array("bahu","guRa")))
{
    $sankhya = 1; // 0 - no saGkhyA saJjJA. 1 - saGkhyA saJjJA.
    echo "<p class = pa >By bahuguNavatuDati saGkhyA (1.1.28) :</p>";
    echo "<p class = pa >बहुगुणवतुडति सङ्ख्या (१.१.२८) :</p>";
    display(0);
}
else 
{
    $sankhya = 0;
}
if (in_array($fo,array("kati")))
{
    $sankhya = 1;
    $shat = 1; // 0 - no SaT saJjJA. 1 - SaT saJjJA.
    echo "<p class = pa >By bahuguNavatuDati saGkhyA (1.1.28) and Dati ca (1.1.25) :</p>";
    echo "<p class = pa >बहुगुणवतुडति सङ्ख्या (१.१.२८) तथा डति च (१.१.२५) :</p>";
    display(0);
}
else 
{
    $sankhya = 0;
    $shat = 0;
}
/* SNAntA Sat (1.1.24) */
if (arr($text,'/[zn][+]/') && ($sankhya===1 || ends(array($fo),array("paYcan","zaz","saptan","zwan","navan","daSan"),1)) && ($samasa===0 || $samasa===1 && $pradhana===1) && $_GET['cond1_18']!=="2")
// for function arr see function.php.        
{
    $shat = 1;
    echo "<p class = pa >By SNAntA Sat (1.1.24) :</p>";
    echo "<p class = pa >ष्णान्ता षट्‌ (१.१.२४) :</p>";
    display(0);
}/* na SaTsvasrAdibhyaH (4.1.10) */
// bracketed because deals with strIpratyayas.
if ($shat===1 || in_array($fo,$svasrAdi))
{
    echo "<p class = sa >na SaTsvasrAdibhyaH (4.1.10) :</p>";
    echo "<p class = sa >न षट्स्वस्रादिभ्यः (४.१.१०) :</p>";
    display(0); $Ap === 0; $GI === 0; $SaTsvasrAdi=1;
} else {$SaTsvasrAdi=0; }
/* striyAM ca (7.1.96) */
if ($gender === "f" && sub(array("krozwu"),array("+"),blank(0),0))
{
    $text = two(array("krozwu"),array("+"),array("krozwf"),array("+"),0); // for function two - please see function.php.
    echo "<p class = sa >striyAM ca (7.1.96) :</p>";
    echo "<p class = sa >स्त्रियां च (७.१.९७) :</p>";        
    display(3);
}
/* Rnnebhyo GIp (4.1.5) */
if ($gender === "f" && sub(array("f","n"),array("+"),blank(0),0) && $SaTsvasrAdi===0)
{
    $text = addlast($text,"NIp",0);
    echo "<p class = sa >By Rnnebhyo Gip (4.1.5) :</p>";
    echo "<p class = sa >ऋन्नेभ्यो ङीप्‌ (४.१.५) :</p>";        
    display(3);
    $GI=1;
    $nadi=1;
}
/* ugitazca (4.1.6) */
$ugitprAtipadika = array("Bavat","pacat");
if ($gender === "f" && sub($ugitprAtipadika,array("+"),blank(0),0) )
{
    $text = addlast($text,"NIp",0);
    echo "<p class = sa >By Rnnebhyo Gip (4.1.5) :</p>";
    echo "<p class = sa >ऋन्नेभ्यो ङीप्‌ (४.१.५) :</p>";        
    display(3);
    $GI=1;
    $nadi=1;
}

?>
</body>
</html>