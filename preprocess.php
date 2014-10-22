<?php
/* set execution time to an hour */
ini_set('max_execution_time', 36000);
/* set memory limit to 1000 MB */
ini_set("memory_limit","1000M");
include "slp-dev.php"; // includes code for conversion from SLP to devanagari,
include "dev-slp.php"; // includes code for devanagari to SLP.
include "function.php";

/* method to create an array of necessary SLP1 list from devangari file */
/*$a=file('NAdiverbs.txt');
print_r($a);
$a=array_map('convert1',$a);
print_r($a);
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
/*$a=file('ubhaya.txt');
$a=array_map('trim',$a);
print_r($a);
$b=array_map('convert1',$a);
$b=array_map('trim',$b);
$c=array_map('removeaccent',$b);
$e=implode('","',$c);
echo $e;*/

/* method to find anudAttet and Git verbs */
$a=file('allverbs.txt');
$a=array_map('trim',$a);
$b=array_map('convert1',$a);
$c=array_map('trim',$b);
for($i=0;$i<count($c);$i++)
{   
    $c[$i]=str_replace("॒","-",$c[$i]);
    if (preg_match('/[N]$/',$c[$i]))
    {
        $d[]=$b[$i];
    }
}
print_r($d);
$d=array_map('removeaccent',$d);
$e=implode('","',$d);
echo $e;

?>
