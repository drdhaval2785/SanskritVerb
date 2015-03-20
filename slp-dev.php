<?php
/* This code is borrowed most probably from php.net examples site. But I am unable to trace it now. */
function html2txt($document){ 
$search = array('@<script[^>]*?>.*?</script>@si',  // Strip out javascript 
               '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags 
               '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly 
               '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments including CDATA 
); 
$text = preg_replace($search, '', $document); 
return $text; 
}	

/* This code is borrowed and modified from Dicrunch code of Ananda Loponen. That can be accessed at http://www.ingmardeboer.nl/php/diCrunch.php?act=help.*/
function convert($text)
{

$ch['slp'] = array(

30 => "A", // _a
31 => "I", // _i
32 => "U", // _u
33 => "f", // .r
34 => "F", // _.r
35 => "N", // 'n
36 => "Y", // ~n
37 => "w", // .t
38 => "q", // .d
39 => "R", // .n
40 => "S", // 's
41 => "z", // .s
42 => "M", // 'm (anusvara)
43 => "H", // .h (visarga)
44 => "x", // .l
45 => "X", // _.l

//50 => "%.D", // _D
//51 => "%Y", // .Y

1 => "A", // _a
2 => "I", // _i
3 => "U", // _u
4 => "f", // .r
5 => "F", // _.r
6 => "N", // 'n
7 => "Y", // ~n
8 => "w", // .t
9 => "q", // .d 
10 => "R", // .n
11 => "S", // 's
12 => "z", // .s
13 => "M", // 'm (anusvara)
14 => "H", // .h (visarga) (visarga)
15 => "x", // .l
16 => "X", // _.l

//20 => ".D", // _d
//21 => "Y", // .y

60 => "!", // \-/ (candrabindu)
//61 => "_", // _ (ha_uk)
//62 => "^", // ^ (ext. sandhi)
63 => "'", // avagraha
64 => "&", // jihvAmUlIya)
65 => "*", // upadhmAnIya
//66 => "@", // abbreviation
//67 => "`", // Latin apostrophe

);

$ch['hk'] = array(

30 => "%A", // _a
31 => "%I", // _i
32 => "%U", // _u
33 => "%f", // .r
34 => "%F", // _.r
35 => "%N", // 'n
36 => "%Y", // ~n
37 => "%w", // .t
38 => "%q", // .d
39 => "%R", // .n
40 => "%S", // 's
41 => "%z", // .s
42 => "%M", // 'm (anusvara)
43 => "%H", // .h (visarga)
44 => "%x", // .l
45 => "%X", // _.l

//50 => "%.D", // _D
//51 => "%Y", // .Y

1 => "A", // _a
2 => "I", // _i
3 => "U", // _u
4 => "f", // .r
5 => "F", // _.r
6 => "N", // 'n
7 => "Y", // ~n
8 => "w", // .t
9 => "q", // .d 
10 => "R", // .n
11 => "S", // 's
12 => "z", // .s
13 => "M", // 'm (anusvara)
14 => "H", // .h (visarga) (visarga)
15 => "x", // .l
16 => "X", // _.l

//20 => ".D", // _d
//21 => "Y", // .y

60 => "~", // \-/ (candrabindu)
//61 => "_", // _ (ha_uk)
//62 => "^", // ^ (ext. sandhi)
63 => "'", // avagraha
64 => "&", // jihvamuliya
65 => ".h", // upadhmAnIya
//66 => "@", // abbreviation
//67 => "`", // Latin apostrophe

);

	$text = str_replace("&nbsp;","",$text);				

	/* Main Converter Part */
//$text = str_replace("kxp","कॢप्",$text); // patch for ळ removal
$text = str_replace("\n ", "\n", $text);
$text = str_replace(" /'","/'",$text);
$text = str_replace("/#'","",$text);
$text = str_replace($ch['slp'],$ch['hk'],$text);
$v = "्"; // Virama

$num['tra'] = array(
	60 => "0",
	61 => "1",
	62 => "2",
	63 => "3",
	64 => "4",
	65 => "5",
	66 => "6",
	67 => "7",
	68 => "8",
	69 => "9",
);

$main['tra'] = array(

	//20 => "t ", // t end
		
	40 => "'", // apostrophe (avagraha)
	41 => "`", // Latin apostrophe (’)
	42 => "#", // Abbreviation
	
	116 => "Ka",
	115 => "ka",
	118 => "Ga",
	117 => "ga",
	119 => "Na",

	121 => "Ca",
	120 => "ca",
	123 => "Ja",
	122 => "ja",
	124 => "Ya",

	126 => "Wa",
	125 => "wa",
	128 => "Qa",
	127 => "qa",
	129 => "Ra",

	131 => "Ta",
	130 => "ta",
	133 => "Da",
	132 => "da",
	134 => "na",

	136 => "Pa",
	135 => "pa",
	138 => "Ba",
	137 => "ba",
	139 => "ma",
	
	140 => "ya",
//	141 => "Ya",
	142 => "ra",
	143 => "la",
	144 => "va",
	
	145 => "Sa",
	146 => "za",
	147 => "sa",
	

	//156 => ";", // Udatta
	//157 => ":", // Anudatta (svarita)
//	259 => "La",

	
//	201 => "Pha",
//	200 => "Pa",
	
	148 => "ha",
);

$vow['tra'] = array(

	257 => " f",
	258 => " F",
	259 => " x",
	260 => " X",
	
	261 => " e",
	262 => " E",
	263 => " o",
	264 => " O",
	
	251 => " a",
	252 => " A",
	253 => " i",
	254 => " I",
	255 => " u",
	256 => " U",
	155 => " @",
);


$yukta['tra'] = array(

	307 => "f", // joint
	308 => "F", // joint
	309 => "x",
	310 => "X", // joint
	
	311 => "e", // joint
	312 => "E", // joint
	313 => "o", // joint
	314 => "O", // joint
	
	301 => "a", // joint
	302 => "A", // joint
	303 => "i", // joint
	304 => "I", // joint
	305 => "u", // joint
	306 => "U", // joint
	320 => "@",

    
);
$other['tra'] = array(
        149 => "M",
	150 => "H",
	151 => "~",
	152 => "||", // ||
	153 => "|", // |
	154 => "&", // jihvAmUliya
	155 => "*", // upadhmAnIya
);

$num['scr'] = array(
	60 => "०", // 0
	61 => "१", // 1
	62 => "२", // 2
	63 => "३", // 3
	64 => "४", // 4
	65 => "५", // 5
	66 => "६", // 6
	67 => "७", // 7
	68 => "८", // 8
	69 => "९", // 9
);

$main['scr'] = array(

	//20 => "ৎ", // t end
	
	40 => "ऽ", // apostrophe (avagraha)
	41 => "’", // Latin apostrophe (’)
	42 => "", // Abbreviation
	
	116 => "ख", // kha
	115 => "क", // ka
	118 => "घ", // gha
	117 => "ग", // ga
	119 => "ङ", // Ga
	
	121 => "छ", // cha
	120 => "च", // ca
	123 => "झ", // jha
	122 => "ज", // ja
	124 => "ञ", // Ja
	
	126 => "ठ", // Tha
	125 => "ट", // Ta
	128 => "ढ", // Dha
	127 => "ड", // Da
	129 => "ण", // Na
	
	131 => "थ", // tha
	130 => "त", // ta
	133 => "ध", // dha
	132 => "द", // da
	134 => "न", // na
	
	136 => "फ", // pha
	135 => "प", // pa
	138 => "भ", // bha
	137 => "ब", // ba
	139 => "म", // ma
	
	140 => "य", // ya
//	141 => "य़", // Ya
	142 => "र", // ra
	143 => "ल", // la
	144 => "व", // va
	
	145 => "श", // za
	146 => "ष", // Sa
	147 => "स", // sa

	
	
	//156 => "॑", // Udatta
	//157 => "॒", // Anudatta (svarita)
//	259 => "ळ", // L

	
//	201 => "ঢ়", // Pha
//	200 => "ড়", // Pa

	
	148 => "ह", // ha
);

$vow['scr'] = array(
	
	257 => " ऋ", // R
	258 => " ॠ", // q
	259 => " ऌ",
	260 => " ॡ", // W 
	
	261 => " ए", // e
	262 => " ऐ", // ai
	263 => " ओ", // o
	264 => " औ", // au
	
	251 => " अ", // a
	252 => " आ", // A
	253 => " इ", // i
	254 => " ई", // I
	255 => " उ", // u
	256 => " ऊ", // U
	155 => " उँ",	
);

$yukta['scr'] = array(
	
	307 => "ृ", // R joint
	308 => "ॄ", // q joint
	309 => "ॢ",
	310 => "ॣ", // W  joint
	
	311 => "े", // e joint
	312 => "ै", // ai joint
	313 => "ो", // o joint
	314 => "ौ", // au joint
	
	301 => "&#8205;", // a joint
	302 => "ा", // A joint
	303 => "ि", // i joint
	304 => "ी", // I joint
	305 => "ु", // u joint
	306 => "ू", // U joint
	320 => "ुँ",
       
);
$other['scr'] = array(
        149 => "ं", // M
	150 => "ः", // H
	151 => "ँ", // ~
	152 => "॥", // ||
	153 => "।", // |
	154 => "ᳲ", // . Nukta
	155 => "ᳲ", // Abbreviation
);

$yukta['scr'][301] = "";


$text = " " . $text;
$text = str_replace("-", "- ", $text); // Ensure full vowel is given after dash
	$text = str_replace("^", "", $text); // Remove external sandhi break
	$text = str_replace("%", "", $text); // Remove XHK capital letter sign

/* Create half-consonants */
	
	$half['tra'] = array();
	$half['scr'] = array();
	
	foreach ($main['tra'] as $key => $val) {
		$half['tra'][$key] = str_replace("a", "", $val);
	

}
	foreach ($main['scr'] as $key => $val) {
		$half['scr'][$key] = $val . $v;
	}


/* Crunch joint vowels */
	
	foreach ($yukta['tra'] as $key => $val) {
		foreach ($half['tra'] as $hkey => $hval) {
			$obj = str_replace("{$v}", "", $half['scr'][$hkey]);
			$text = str_replace(($hval . $val),  ($obj . $yukta['scr'][$key]), $text);
		}
	}

	$text = str_replace("_", "_ ", $text); // For ha_uk etc.


	$text = str_replace ($main['tra'], $main['scr'], $text);
	$text = str_replace ($vow['tra'], $vow['scr'], $text);
	$text = str_replace ($half['tra'], $half['scr'], $text);
	$text = str_replace ($num['tra'], $num['scr'], " " . $text . " ");
        $text = str_replace ($other['tra'], $other['scr'], $text);

//	$text = str_replace("{$v}{$half['scr'][154]}", "{$half['scr'][154]}", $text); // Fix nuktas


	/* Crunch remaining full vowels, e.g. ha_uk  and sei */

	foreach ($vow['tra'] as $key => $val) {
		$objscr = str_replace(" ", "", $val);
		$objtra = str_replace(" ", "", $vow['scr'][$key]);
		$text = str_replace("{$objscr}", "{$objtra}",  $text);
	}


	$tidys = array("_ ","- ", "\n ");
	$tidyr = array("", "-", "\n");

	$text = trim(str_replace($tidys, $tidyr, $text));


$text = str_replace("ओं","ॐ",$text);
$text = str_replace("औं","ॐ",$text);
return $text;
}


?>