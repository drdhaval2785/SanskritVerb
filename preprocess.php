<?php
/* set execution time to an hour */
ini_set('max_execution_time', 36000);
/* set memory limit to 1000 MB */
ini_set("memory_limit","1000M");
include "slp-dev.php"; // includes code for conversion from SLP to devanagari,
include "dev-slp.php"; // includes code for devanagari to SLP.
include "function.php";
//error_reporting(0);

/* method to create an array of necessary SLP1 list from devangari file */
/*$a=file('allverbs.txt');
//print_r($a);
$a=array_map('trim',$a);
echo implode('","',$a)."<br>";
$a=array_map('convert1',$a);
$a=array_map('removeaccent',$a);
//print_r($a);
$b=implode('","',$a);
echo $b;*/

/* method to find out a list having i as it. */
/*$a=file('iditsearch.txt');
$a=array_map('trim',$a);
print_r($a);
$b=array_map('convert1',$a);
print_r($b);
for($i=0;$i<count($b);$i++)
{
    if (preg_match('/[i][!]/',$b[$i]))
    {
        $c[]=$b[$i];
    }
}
print_r($c);
$d=implode('","',$c);
echo $d;*/

/* method to find out a list having r as upadhA. */
/*$a=file('iditsearch.txt');
$a=array_map('trim',$a);
print_r($a);
$b=array_map('convert1',$a);
$b=array_map('trim',$b);
$c=array_map('removeaccent',$b);
$c=array_map('removeanusvar',$c);
print_r($c);
for($i=0;$i<count($c);$i++)
{
    if (preg_match('/[iu][r]['.pc('hl').']$/',$c[$i]))
    {
        $d[]=$b[$i];
    }
}
print_r($d);
$e=implode('","',$d);
echo $e;*/

/* Method to prepare list of parasmaipada, Atmanepada, ubhayapadas. */
//echo '$parasmai=array("'.implode('","',scrape1("pa",5,0,1)).'");';
//echo '$Atmane=array("'.implode('","',scrape1("A",5,0,1)).'");';
//echo '$ubhaya=array("'.implode('","',scrape1("u",5,0,1)).'");';

/* method to find anudAttet and Git verbs */
/*$a=file('allverbs.txt');
$a=array_map('trim',$a);
$b=array_map('convert1',$a);
$c=array_map('trim',$b);
$c=array_map('removeaccent',$b);
for($i=0;$i<count($c);$i++)
{   
//    $c[$i]=str_replace(array("॒","॑"),array("-","&"),$c[$i]);
    if (preg_match('/[Y]$/',$c[$i]))
    {
        $d[]=$b[$i];
    }
}
print_r($d);
$d=array_map('removeaccent',$d);
$e=implode('","',$d);
echo $e;*/

/* making a list of upasarga combinations */
/*$upasarga = array("pra","prati","api","parA","apa","upa","pari","anu","ava","vi","saM","su","ati","ni","nir","ut","aDi","dur","aBi"); // upasargas
foreach ($upasarga as $val1)
{
    $pre[]= $val1;
    foreach ($upasarga as $val2)
    {
        if ($val2!==$val1)
        {
               $pre[]= $val1.$val2;
        }
        foreach ($upasarga as $val3)
        {
            if($val2!==$val1 && $val3!==$val1 && $val2!==$val3)
            {
                $pre[]= $val1.$val2.$val3;                
            }
        }
    }
}
foreach ($pre as $value)
{
    $a=array("aa","Aa","aA","AA","ia","iA","iu","ua","uA","uu","uta","utA","utu","au","Au");
    $b=array("A","A","A","A","ya","yA","yu","va","vA","U","uda","udA","udu","o","o");
    $pre1[]=str_replace($a,$b,$value);
}
*/

/* Process to segregate ekAc, anekAc from verb list */
/*$a=file('allverbs.txt');
$a=array_map('trim',$a);
$a=array_map('convert1',$a);
$a=array_map('removeaccent',$a);
foreach ($a as $value)
{
    $value=preg_replace('/(['.pc('hl').']$)/','',$value);
    $value=preg_replace('/([aAiIuUfFxXeoEO][!])/','',$value);
    $value=preg_replace('/(^[Ywq][iu])/','',$value);
    if (anekAca($value))
    {
        $val1[]=$value;
    }
    else
    {
        $val2[]=$value;
    }
}*/

/* Process to find AkArAnta etc from verb list */
/*$a=file('allverbs.txt');
$a=array_map('trim',$a);
$a=array_map('convert1',$a);
$a=array_map('removeaccent',$a);
foreach ($a as $value)
{
    $p=$value;
    $value=preg_replace('/(['.pc('hl').']$)/','',$value);
    $value=preg_replace('/([aAiIuUfFxXeoEO][!])/','',$value);
    $value=preg_replace('/(^[Ywq][iu])/','',$value);
    if (arr(array($value),'/[c][C]$/')) // change in this line to grab what you want.
    {
        $val1[]=$p;
        verb_meaning_gana_number1($p);
    }
}*/

//echo implode('","',$val1);

/* making a list of duplicated verbs */
/*$uniqueverbs=  array_unique($allverbs);
$list=array();
foreach ($allverbs as $value)
{
    if (in_array($value,$list))
    {
        $val[]=$value;
    }
    $list = array_merge($list,array($value));
}
echo implode('","',$val);
*/

/* Process to find  etc from verb list */
/*$a=file('allverbs.txt');
$a=array_map('trim',$a);
$a=array_map('convert1',$a);
$a=array_map('removeaccent',$a);
foreach ($a as $value)
{
    $p=$value;
    if (arr(array($value),'/[i][!]/'))
    {
        $val1[]=$p;
    }
}
echo implode('","',$val1);
*/

/* Process to find iditverbs with markers left out and numAgama made. */
/*$a=$iditverbs;
$a=array_map('trim',$a);
$a=array_map('convert1',$a);
$a=array_map('removeaccent',$a);
$te1 = '/(['.pc('ac').'])(['.pc('hl').']*)$/';
$te2 = '$1'.'n'.'$2'; // Adding the mit Agama after the last vowel. 'midaco'ntyAtparaH'.
foreach ($a as $value)
{
    $p=$value;
    $value=preg_replace('/(['.pc('hl').']$)/','',$value);
    $value=preg_replace('/([aAiIuUfFxXeoEO][!])/','',$value);
    $value=preg_replace('/(^[Ywq][iu])/','',$value);
//    $val[]=$value; // for without mit Agama.
    $val[] = preg_replace($te1,$te2,$value); // executing mit Agama.
}
echo implode('","',$val);*/

/* Process to find iditverbs which have i!r combination. */
/*$a=$iditverbs;
$a=array_map('trim',$a);
foreach ($a as $value)
{
    if (preg_match('/[!][r]$/',$value))
    {
        $val[]=$value;
    }
}
echo implode('","',$val);*/

/* Creating arrays with all the information of a verb from raw data having upadeza, meaning, after it removal, gana, number, P/A/U, seT/veT/aniT */
/*$a=file("rawcomplete.txt");
for($j=0;$j<count($a);$j++)
{
    $c=explode("*",$a[$j]);
    $c=array_map('trim',$c);
        if (preg_match('/([(])([^)]*)([)])/',$c[2]))
        {
            $c[2]=preg_replace('/([^(]*)([(])([^)]*)([)])/','$3',$c[2]);
        }
        $e=$c[0];
        for($k=0;$k<count($c);$k++)
        {
            $c[$k]=removeaccent($c[$k]);
            $c[$k]=convert1($c[$k]);
                $c[$k]=str_replace(array("| BvA#","| a#","| ju#","| di#","| svA#","| tu#","| ru#","| ta#","| kryA#","| cu#",),array("01","02","03","04","05","06","07","08","09","10",),$c[$k]);
            $c[$k]=str_replace(array("|","#"),array("",""),$c[$k]);
            $d[] = $c[$k];
        }
        $d[]=$e;
        $d=array_map('trim',$d);
        $t= implode(':',$d);
        $out[]=$t;
//        echo $t."<br>";    
        $c=array();
        $d=array();
        $t="";
}
echo '$verbdata = array("'.implode('","',$out),'");';
*/

/* Method to scrape data from verbdata */
/*foreach ($verbdata as $value)
{
    $val = explode(":",$value);
    $val = array_map('trim',$val);
    $p[]=$val[0];        
    $q[]=$val[7];
}
echo '$allverbs=array("'.implode('","',$p).'");';
echo "<br><br>";
echo '$allverbs1=array("'.implode('","',$q).'");';*/
/*foreach ($verbdata as $value)
{
	$val = explode(":",$value);
	$val = array_map('trim',$val);
	if ($val[3] === '10')
	{
		$p[]= $val[0];
		$q[]= $val[7];
	}
}
echo '$curAdi=array("'.implode('","',$p).'");';
echo "<br><br>";
echo '$curAdi1=array("'.implode('","',$q).'");';*/
/*foreach ($verbdata as $value)
{
	$val = explode(":",$value);
	$val = array_map('trim',$val);
	if (preg_match('/[e][!]/',$val[0]) )
	{
		$p[]= $val[0];
	}
}
echo '$editverbs=array("'.implode('","',$p).'");';
*/

/* Creating methods to have dropdown menu in tiGanta.html */
/*$a = $upasarga_combinations;
foreach ($a as $value)
{
$value = trim($value);
echo '<option value="'.$value.'">'.convert($value).' - ('.$value.')</option>';
}*/

/* Corrected the database for curAdi adantadhAtus. Earlier it had no akAra at end. Now it has */
/*foreach ($curAdi_adanta as $value)
{
	$val[] = $value."!";
}
foreach ($verbdata as $in)
{
	$exp = explode(':',$in);
	//if (in_array($exp[0],$val) && $exp[3]==='10')
	if (in_array($exp[0],$curAdi_adanta) && $exp[3]==='10')
	{
		//$exp[2] = $exp[2]."a";
		//$exp[0] = substr($exp[0],0,-1);
		$exp[7] = str_replace('ँ॒॑','॒॑',$exp[7]);
		$exp[7] = str_replace('ँ॑','॑',$exp[7]);
		$exp[7] = str_replace('ँ॒','॒',$exp[7]);
		if (substr($exp[7],-1)==="ँ")
		{ $exp[7] = substr($exp[7],0,-1); }
		$out[] = implode(':',$exp);
	}
	else
	{
		$out[] = $in;
	}
}
$infile = fopen('in.txt','w+');
$outfile = fopen('out.txt','w+');
foreach ($verbdata as $datum)
{
	fputs($infile,$datum."\n");
}
foreach ($out as $datum)
{
	echo $datum.'","';
	fputs($outfile,$datum."\n");
}
fclose($infile);
fclose($outfile);
*/

/* listing verb with anubandhas for autocomplete */
foreach ($verbdata as $value)
{
	$val = explode(":",$value);
	$val = array_map('trim',$val);
	echo $val[0].'","';
}

?>
