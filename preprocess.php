<?php
/* set execution time to an hour */
ini_set('max_execution_time', 36000);
/* set memory limit to 1000 MB */
ini_set("memory_limit","1000M");
include "slp-dev.php"; // includes code for conversion from SLP to devanagari,
include "dev-slp.php"; // includes code for devanagari to SLP.
include "function.php";

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
/*$a=file('kryAdi.txt');
$a=array_map('trim',$a);
//print_r($a);
$b=array_map('convert1',$a);
$b=array_map('trim',$b);
$c=array_map('removeaccent',$b);
$e=implode('","',$c);
echo $e;
echo "<br><br>";
echo implode('","',$a);*/

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
    if (arr(array($value),'/[A]$/'))
    {
        $val1[]=$p;
    }
}
echo implode('","',$val1);
*/

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
//echo "<br>".count($allverbs)."<br>".count($uniqueverbs)."<br>".count($val);
*/

?>
