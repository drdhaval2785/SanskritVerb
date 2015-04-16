<?php 
// including function.php for arrays and functions.
include "function.php";
// including slp-dev.php for SLP1->devanAgarI conversion for display on front end.
include "slp-dev.php";
// including dev-slp.php for devanAgarI->SLP1 conversion to process data entered in Devanagari.
include "dev-slp.php";
error_reporting(0);

//post element
$word = $_POST['first'];
$tran = $_POST['tran'];
$lakAra= $_POST['lakAra'];
$sanAdi = $_POST['sanAdi'];
$us = $_POST['upasarga'];

// IAST and devanagari handling
// Code for converting from IAST to SLP
$iast = array("a","ā","i","ī","u","ū","ṛ","ṝ","ḷ","ḹ","e","ai","o","au","ṃ","ḥ","kh","ch","ṭh","th","ph","gh","jh","ḍh","dh","bh","ṅ","ñ","ṇ","k","c","ṭ","t","p","g","j","ḍ","d","b","n","m","y","r","l","v","s","h","ś","ṣ",); // IAST letters
$slp = array("a","A","i","I","u","U","f","F","x","X","e","E", "o","O", "M","H","K", "C",  "W", "T", "P","G", "J",  "Q", "D","B", "N","Y","R","k","c","w","t","p","g","j","q","d","b","n","m","y","r","l","v","s","h","S","z",); // SLP1 letters
  if (preg_match('/[āĀīĪūŪṛṚṝṜḷḶḹḸṃṂḥḤṭṬḍḌṅṄñÑṇṆśŚṣṢV]/',$word)) // If there is any IAST specific characters, we convert IAST->SLP1.
{
    $word = str_replace($iast,$slp,$word);
}
if ($tran === "IAST") // If user selects IAST transliteration, we convert IAST->SLP1.
{
     $word = str_replace($iast,$slp,$word);
}
// Devanagari handling. This is innocuous. Therefore even running without the selection in dropdown menu. 
$word = json_encode($word); 
$word = str_replace("\u200d","",$word); // removing whitespace.
$word = str_replace("\u200c","",$word); // removing whitespace.
$word = json_decode($word);
$word = convert1($word); // convert devangari to SLP1.

// usable variables
$arrWord[] = $word; // creating an array $arrWord with first member as $word.
$pancan=array("paYcan","saptan","zwan","navan","daSan"); // array of paJcan words.
$last = substr($word, -1);    // returns "last letter"
$last_4 = substr($word, -4);    // returns "last 4 letters"
$last_5 = substr($word, -5); // returns "last 5 letters"
$html = ''; // output is $html. If nothing applies, default it ''.

if ($word==="")
{
echo "<font color='red' size='2'>Enter the verb</font>\n";
exit;
}
/* A note on the cond variables. */
// The values of cond variables is mentioned in ajax requirements.doc. e.g. value="1" name="cond1_1_1" would correspond to 1.1.1.1 of ajax requirements. similarly, value="1" name="cond1_1_1_5"  would correspond to 1.1.1.5.1. 
// Please check ajax requirements.doc to know what this ajax output stands for. 
// ajax requirements.doc is created for user feedback, where according to SK, it is not possible for machine to decide what is the intention of the user.

/* main coding part */
if($last === 'a' && $_POST['first']!=="anyatama") 
{
    $sarvanama1 = array("sarva","viSva","uBa","uBaya","atara","atama","anya","anyatara","itara","tvat","tva","nema","sima","tyad","tad","yad","etad","idam","adas","eka","dvi","yuzmad","asmad","Bavat","kim","idakam","etara","pUrva","para","avara","dakziRa","uttara","apara","aDara","sva","antara","sama"); // sarvanAma list.
    /* checking whether $word ends with a member of $sarvanAma1 array */
    // for function ends, see function.php.
    if(ends($arrWord,$sarvanama1,1)){		
		if($_POST['step'] === '1'){
			$html .= '<div id="step11">';
			$html .= '<input required type="radio" value="1" name="cond1_1_1" > सर्वादयः सञ्ज्ञा के तौर पे प्रयुक्त हुए हैं ? ';
			$html .= '<input required type="radio" value="2" name="cond1_1_1" > सर्वादयः उपसर्जनीभूत हैं ? ';
			$html .= '<input required type="radio" value="3" name="cond1_1_1" > सर्वादयः तृतीया तत्पुरुष समास में प्रयुक्त हुए हैं ? ';
			$html .= '<input required type="radio" value="4" name="cond1_1_1" > सर्वादयः द्वन्द्व समास में प्रयुक्त हुए हैं ? ';
			$html .= '<input required type="radio" value="5" name="cond1_1_1" > सर्वादयः बहुव्रीहि समास में प्रयुक्त हुए हैं ? ';
			$html .= '<input required type="radio" value="6" name="cond1_1_1" > उपर से किसी में नहीं प्रयुक्त हुए हैं ';
			$html .= '</div>';
		}
		
		if($_POST['step'] === '1_1_1_5' && ends($arrWord,array("pUrva","paScima","uttara","dakziNa"),1) ){
			$html .= '<div id="step22">';
			$html .= '<input required type="radio" value="1" name="cond1_1_1_5" > दिक्समास है ';
			$html .= '<input required type="radio" value="2" name="cond1_1_1_5" > दिक्समास नहीं है ';
			$html .= '</div>';
		}
		if($_POST['step'] === '1_1_1_6'){
			$purva = array("pUrva","para","avara","dakziRa","uttara","apara","aDara");
			$sva = array("sva");
			$antara = array("antara");
			$datara = array("atara", "atama");
			$sama = array("sama");
			$anyatama = array("anyatama");
			
			if(ends($arrWord,$purva,1)){
				$html .= '<div id="step22">';
				$html .= '<input required type="radio" value="1" name="cond1_1_1_6_1" > सञ्ज्ञा है या व्यवस्था के अर्थ में नहीं है ';
				$html .= '<input required type="radio" value="2" name="cond1_1_1_6_1" > सञ्ज्ञा नहीं है और व्यवस्था के अर्थ में प्रयुक्त हुए हैं । ';
				$html .= '</div>';
			}elseif(ends($arrWord,$sva,1)){
				$html .= '<div id="step22">';
				$html .= '<input required type="radio" value="1" name="cond1_1_1_6_2" > ज्ञाति या धन के अर्थ में प्रयुक्त हुआ है ';
				$html .= '<input required type="radio" value="2" name="cond1_1_1_6_2" > ज्ञाति या धन के अर्थ में प्रयुक्त नहीं हुआ है ';
				$html .= '</div>';
			}elseif(ends($arrWord,$antara,1)){
				$html .= '<div id="step22">';
				$html .= '<input required type="radio" value="1" name="cond1_1_1_6_3" > बहिर्योग या उपसंव्यान के अर्थ में प्रयुक्त हुआ है ';
				$html .= '<input required type="radio" value="2" name="cond1_1_1_6_3" > बहिर्योग या उपसंव्यान के अर्थ में प्रयुक्त नहीं हुआ है ';
				$html .= '</div>';
			}elseif(ends($arrWord,$datara,1) && !ends($arrWord,$anyatama,1)){
				$html .= '<div id="step22">';
				$html .= '<input required type="radio" value="1" name="cond1_1_1_6_4" > डतर / डतम प्रत्यय से शब्द की सिद्धि हुई है ';
				$html .= '<input required type="radio" value="2" name="cond1_1_1_6_4" > नहीं ';
				$html .= '</div>';
			}elseif(ends($arrWord,$sama,1)){
				$html .= '<div id="step22">';
				$html .= '<input required type="radio" value="1" name="cond1_1_1_6_5" > सम शब्द सर्व के पर्याय में प्रयुक्त हुआ है ';
				$html .= '<input required type="radio" value="2" name="cond1_1_1_6_5" > सम शब्द तुल्य के पर्याय में प्रयुक्त हुआ है ';
				$html .= '</div>';
			}
			
		}
                    if($_POST['step'] === '1_1_1_6_3_1'){
                                    $html .= '<div id="step33">';
                                    $html .= '<input required type="radio" value="1" name="cond1_1_1_6_3_1" > उसके बाद का शब्द पुरि है ? ';
                                    $html .= '<input required type="radio" value="2" name="cond1_1_1_6_3_1" > नहीं ';
                                    $html .= '</div>';
                    }
		
	}
}
elseif($last === 'A' && $_POST['step'] !== '1_2' && $_POST['gender']==='m')
{		
    $html .= '<div class="step11">';
    $html .= '<input required type="radio" value="1" name="cond1_2" > क्या यह आकारान्त धातु है ? ';
    $html .= '<input required type="radio" value="2" name="cond1_2" > नहीं ';
    $html .= '</div>';
}
elseif($last === 'i' )
{
    if ($last_4 === 'saKi')
    {
        $html .= '<div class="step11">';
        $html .= '<input required type="radio" value="1" name="cond1_3_1" >प्राधान्य – जैसे कि सुसखा ';
        $html .= '<input required type="radio" value="2" name="cond1_3_1" >उपसर्जनीभूत – जैसे कि परमसखा ';
        $html .= '<input required type="radio" value="3" name="cond1_3_1" >लाक्षणिक – जैसे कि अतिसखिः (सखीमतिक्रान्तः) ';
        $html .= '</div>';
    }
    if (ends($arrWord,array("dvi"),1))
    {
        $html .= '<div class="step11">';
        $html .= '<input required type="radio" value="1" name="cond1_3_2" >सञ्ज्ञा है या उपसर्जनीभूत है ';
        $html .= '<input required type="radio" value="2" name="cond1_3_2" >सञ्ज्ञा नहीं है और उपसर्जनीभूत नहीं है ';
        $html .= '</div>';        
    }    
}
elseif($last === 'I' )
{
    if($_POST['step'] === '1')
    {
        $html .= '<div id="step11">';
        $html .= '<input required type="radio" value="1" name="cond1_4" > अनदीसञ्ज्ञकः अधातुः ';
        $html .= '<input required type="radio" value="2" name="cond1_4" > नदीसञ्ज्ञकः अधातुः ';
        $html .= '<input required type="radio" value="3" name="cond1_4" > अनदीसञ्ज्ञकः धातुः (असंयोगपूर्वकः इवर्णः, अनेकाच् अङ्गम्) ';
        $html .= '<input required type="radio" value="4" name="cond1_4" > नदीसञ्ज्ञकः धातुः (असंयोगपूर्वकः इवर्णः, अनेकाच् अङ्गम्) ';
        $html .= '<input required type="radio" value="5" name="cond1_4" > अनदीसञ्ज्ञकः धातुः (संयोगपूर्वकः इवर्णः / एकाच् अङ्गम् / गतिकारकेतरपूर्वकः) या सुधीशब्दः ';
        $html .= '<input required type="radio" value="6" name="cond1_4" > नदीसञ्ज्ञकः धातुः (संयोगपूर्वकः इवर्णः / एकाच् अङ्गम् / गतिकारकेतरपूर्वकः) ';
        $html .= '</div>';
    }
        if($_POST['step'] === '1_4_2')
        {
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond1_4_2" > ङ्‍यन्त ';
            $html .= '<input required type="radio" value="2" name="cond1_4_2" > अङ्‍यन्त ';
            $html .= '</div>';
        }
        if($_POST['step'] === '1_4_3')
        {
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond1_4_3" > नीधात्वन्त ';
            $html .= '<input required type="radio" value="2" name="cond1_4_3" > सखा – (सखायमिच्छति) ';
            $html .= '<input required type="radio" value="3" name="cond1_4_3" > सखीः, सुखीः, सुतीः, लूनीः, प्रस्तीमीः इत्यादि ';
            $html .= '<input required type="radio" value="4" name="cond1_4_3" > अन्य ';
            $html .= '</div>';
        }
        if($_POST['step'] === '1_4_4')
        {
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond1_4_4" > ङ्‍यन्त ';
            $html .= '<input required type="radio" value="2" name="cond1_4_4" > अङ्‍यन्त ';
            $html .= '</div>';
        }
        if($_POST['step'] === '1_4_6')
        {
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond1_4_6" > ङ्‍यन्त ';
            $html .= '<input required type="radio" value="2" name="cond1_4_6" > अङ्‍यन्त ';
            $html .= '</div>';
        }
}
elseif ($last==="U")
{
    if($_POST['step'] === '1')
    {
        $html .= '<div id="step11">';
        $html .= '<input required type="radio" value="1" name="cond1_5" > अनदीसञ्ज्ञकः अधातुः ';
        $html .= '<input required type="radio" value="2" name="cond1_5" > नदीसञ्ज्ञकः अधातुः ';
        $html .= '<input required type="radio" value="3" name="cond1_5" > धातुः (असंयोगपूर्वकः ऊवर्णः, अनेकाच् अङ्गम्, गतिकारकपूर्वकः) ';
        $html .= '<input required type="radio" value="4" name="cond1_5" > धातुः (संयोगपूर्वकः ऊवर्णः / एकाच् अङ्गम् / गतिकारकेतरपूर्वकः) ';
        $html .= '</div>';
    }        
}

if ( ends($arrWord,array("catur"),0) && $_POST['step']==='1')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_6_1" > चतुर्‌ उपसर्जनीभूत है ? ';                    
            $html .= '<input required type="radio" value="2" name="cond1_6_1" > चतुर्‌ प्रधान है । ';                    
            $html .= '</div>';    
}
if ( $last==="m" && $_POST['step']==='1' && !ends($arrWord,array("idam","idakam"),2))
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_16" > धातु ';                    
            $html .= '<input required type="radio" value="2" name="cond1_16" > अधातु ';                    
            $html .= '</div>';    
}
if ( ends($arrWord,$pancan,0) && $_POST['step']==='1')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_8" > उपसर्जनीभूत ';                    
            $html .= '<input required type="radio" value="2" name="cond1_8" > प्रधान ';                    
            $html .= '</div>';    
}
if ( ends($arrWord,array("BrAj"),1) && $_POST['step']==='1')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_9_3" > भ्राज्‌ धातु फणादि है ';                    
            $html .= '<input required type="radio" value="2" name="cond1_9_3" > नहीं ';                    
            $html .= '</div>';    
}
elseif ( $last==="j" && $_POST['step']==='1')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_9" > क्विन्‌ प्रत्ययान्त है ';                    
            $html .= '<input required type="radio" value="2" name="cond1_9" > नहीं ';                    
            $html .= '</div>';    
}
if ( ends($arrWord,array("tyad","tad","yad","etad","idam","adas","eka","dvi","idakam",),1) && $_POST['step']!=='1_10_2' )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_10" > त्यदादि सञ्ज्ञा या उपसर्जनीभूत के तौर पर प्रयुक्त हुए हैं ';                    
            $html .= '<input required type="radio" value="2" name="cond1_10" > नहीं ';                    
            $html .= '</div>';    
}
if ( ends($arrWord,array("etad","idam","idakam",),1) && $_POST['step']==='1_10_2' )
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond1_10_2" > अन्वादेश ';                    
            $html .= '<input required type="radio" value="2" name="cond1_10_2" > नहीं ';                    
            $html .= '</div>';    
}
if ( ends($arrWord,array("asmad","Asmad","yuzmad"),0) && $_POST['step']==='1' )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_11" > अस्मद् / युष्मद् एकत्ववाची है ';                    
            $html .= '<input required type="radio" value="2" name="cond1_11" > अस्मद् / युष्मद् द्वित्ववाची है ';                    
            $html .= '<input required type="radio" value="3" name="cond1_11" > अस्मद् / युष्मद् बहुत्ववाची है ';                    
            $html .= '</div>';    
}
if ( ends($arrWord,array("asmad","Asmad","yuzmad"),2) && $_POST['step']==='1' )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_12" > अस्मद् / युष्मद् का प्रयोग पद के बाद में नहीं हुआ है । ';                    
            $html .= '<input required type="radio" value="2" name="cond1_12" > अस्मद् / युष्मद् का प्रयोग पाद के प्रारम्भ में हुआ है । ';                    
            $html .= '<input required type="radio" value="3" name="cond1_12" > अस्मद्/ युष्मद् का च, वा, हा, अह या एव से साक्षात् योग है । ';                    
            $html .= '<input required type="radio" value="4" name="cond1_12" > अस्मद्/ युष्मद् का अचाक्षुष ज्ञानार्थ धातु से योग है । ';                    
            $html .= '<input required type="radio" value="5" name="cond1_12" > उपर में से कोई नहीं ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_12_5' )
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond1_12_5" > अन्वादेश है ';                    
            $html .= '<input required type="radio" value="2" name="cond1_12_5" > अन्वादेश नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_12_5_1' )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond1_12_5_1" > अस्मद् / युष्मद् विद्यमानपूर्व प्रथमान्त शब्द के परे हैं ';                    
            $html .= '<input required type="radio" value="2" name="cond1_12_5_1" > अस्मद् / युष्मद्‌ विद्यमानपूर्व प्रथमान्त शब्द के परे नहीं हैं ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_12_5_1_1' )
{
            $html .= '<div id="step44">';
            $html .= '<input required type="radio" value="1" name="cond1_12_5_1_1" > आमन्त्रित से परे हैं ';                    
            $html .= '<input required type="radio" value="2" name="cond1_12_5_1_1" > आमन्त्रित से परे नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_12_5_1_1_1' )
{
            $html .= '<div id="step55">';
            $html .= '<input required type="radio" value="1" name="cond1_12_5_1_1_1" > विशेष्य से परे समानाधिकरण विशेषण है ';                    
            $html .= '<input required type="radio" value="2" name="cond1_12_5_1_1_1" > विशेष्य से परे समानाधिकरण विशेषण नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_12_5_1_1_1_1' )
{
            $html .= '<div id="step66">';
            $html .= '<input required type="radio" value="1" name="cond1_12_5_1_1_1_1" > बहुवचन है ';                    
            $html .= '<input required type="radio" value="2" name="cond1_12_5_1_1_1_1" > बहुवचन नहीं है ';                    
            $html .= '</div>';    
}
if ( in_array($_POST['step'],array("1","3")) && ends($arrWord,array("aYc","AYc","anc","Anc"),1) )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_13" > क्विन्‌ प्रत्ययान्त है ';                    
            $html .= '<input required type="radio" value="2" name="cond1_13" > क्विन्‌ प्रत्ययान्त नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_13_1' && ends($arrWord,array("aYc","AYc","anc","Anc"),1) )
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond1_13_1" > पूजा के अर्थ में प्रयुक्त है ';                    
            $html .= '<input required type="radio" value="2" name="cond1_13_1" > पूजा के अर्थ में नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1' && ends($arrWord,array("at"),0) && !ends($arrWord,array("Bavat"),1) )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_17" > अत्वन्त है ';                    
            $html .= '<input required type="radio" value="2" name="cond1_17" > अत्वन्त नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_17_2' )
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond1_17_2" > अभ्यस्त है ';                    
            $html .= '<input required type="radio" value="2" name="cond1_17_2" > अभ्यस्त नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1' && ends($arrWord,array("Bavat"),1) )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_14" > भातेर्डवतुः ';                    
            $html .= '<input required type="radio" value="2" name="cond1_14" > भूधातोः शतृप्रत्ययः ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1' && ends($arrWord,array("zaz"),0) )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_18" > प्राधान्य ';                    
            $html .= '<input required type="radio" value="2" name="cond1_18" > उपसर्जनीभूतः ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1' && ends($arrWord,array("takz","rakz"),1) )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond1_15" > ण्यन्त ';                    
            $html .= '<input required type="radio" value="2" name="cond1_15" > अण्यन्त ';                    
            $html .= '</div>';    
}




// strIliGga
if ($last==="A" && $_POST['step'] === '2')
{
        $html .= '<div id="step11">';
        $html .= '<input required type="radio" value="1" name="cond2_1" > शब्द आबन्त नहीं है ';
        $html .= '<input required type="radio" value="2" name="cond2_1" > शब्द आबन्त है ';
        $html .= '</div>';
}
        $sarvanamastri = array("sarvA","viSvA","uBA","uBayA","atarA","atamA","anyA","anyatarA","itarA","tvA","nemA","simA","pUrvA","parA","avarA","dakziRA","uttarA","aparA","aDarA","svA","antarA","ekA","dvA",);
        $diksamAsa = array('uttarapUrvA','dakziRapUrvA','uttarapaScimA','dakziRapaScimA');
    if($_POST['step'] === '2_1_2' && ends($arrWord,$sarvanamastri,1) )
    {
        $html .= '<div id="step11">';
        $html .= '<input required type="radio" value="1" name="cond2_1_2_1" > सर्वादयः सञ्ज्ञा के तौर पे प्रयुक्त हुए हैं ? ';
        $html .= '<input required type="radio" value="2" name="cond2_1_2_1" > सर्वादयः उपसर्जनीभूत हैं ';
        $html .= '<input required type="radio" value="3" name="cond2_1_2_1" > सर्वादयः तृतीया तत्पुरुष समास में प्रयुक्त हुए हैं ? ';
        $html .= '<input required type="radio" value="4" name="cond2_1_2_1" > सर्वादयः द्वन्द्व समास में प्रयुक्त हुए हैं ? ';
        $html .= '<input required type="radio" value="5" name="cond2_1_2_1" > सर्वादयः बहुव्रीहि समास में प्रयुक्त हुए हैं ? ';
        $html .= '<input required type="radio" value="6" name="cond2_1_2_1" > उपर से किसी में नहीं प्रयुक्त हुए हैं ';
        $html .= '</div>';
    }   
		if($_POST['step'] === '2_1_2_1_5'){
			$html .= '<div id="step22">';
			$html .= '<input required type="radio" value="1" name="cond2_1_2_1_5" > दिक्समास है ';
			$html .= '<input required type="radio" value="2" name="cond2_1_2_1_5" > दिक्समास नहीं है ';
			$html .= '</div>';
		}
		if($_POST['step'] === '2_1_2_1_6'){
			$purva = array("pUrvA","parA","avarA","dakziRA","uttarA","aparA","aDarA");
			$sva = array("svA");
			$antara = array("antarA");
			$datara = array("atarA", "atamA");
			$sama = array("samA");
			$anyatama = array("anyatamA");
			
			if(ends($arrWord,$purva,1)){
				$html .= '<div id="step22">';
				$html .= '<input required type="radio" value="1" name="cond2_1_2_1_6_1" > सञ्ज्ञा है या व्यवस्था के अर्थ में नहीं है ';
				$html .= '<input required type="radio" value="2" name="cond2_1_2_1_6_1" > सञ्ज्ञा नहीं है और व्यवस्था के अर्थ में प्रयुक्त हुए हैं । ';
				$html .= '</div>';
			}elseif(ends($arrWord,$sva,1)){
				$html .= '<div id="step22">';
				$html .= '<input required type="radio" value="1" name="cond2_1_2_1_6_2" > ज्ञाति या धन के अर्थ में प्रयुक्त हुआ है ';
				$html .= '<input required type="radio" value="2" name="cond2_1_2_1_6_2" > ज्ञाति या धन के अर्थ में प्रयुक्त नहीं हुआ है ';
				$html .= '</div>';
			}elseif(ends($arrWord,$antara,1)){
				$html .= '<div id="step22">';
				$html .= '<input required type="radio" value="1" name="cond2_1_2_1_6_3" > बहिर्योग या उपसंव्यान के अर्थ में प्रयुक्त हुआ है ';
				$html .= '<input required type="radio" value="2" name="cond2_1_2_1_6_3" > बहिर्योग या उपसंव्यान के अर्थ में प्रयुक्त नहीं हुआ है ';
				$html .= '</div>';
			}elseif(ends($arrWord,$datara,1) && !ends($arrWord,$anyatama,1)){
				$html .= '<div id="step22">';
				$html .= '<input required type="radio" value="1" name="cond2_1_2_1_6_4" > डतर / डतम प्रत्यय से शब्द की सिद्धि हुई है ';
				$html .= '<input required type="radio" value="2" name="cond2_1_2_1_6_4" > नहीं ';
				$html .= '</div>';
			}elseif(ends($arrWord,$sama,1)){
				$html .= '<div id="step22">';
				$html .= '<input required type="radio" value="1" name="cond2_1_2_1_6_5" > सम शब्द सर्व के पर्याय में प्रयुक्त हुआ है ';
				$html .= '<input required type="radio" value="2" name="cond2_1_2_1_6_5" > सम शब्द तुल्य के पर्याय में प्रयुक्त हुआ है ';
				$html .= '</div>';
			}
                }
                                    if($_POST['step'] === '2_1_2_1_6_3_1'){
                                    $html .= '<div id="step33">';
                                    $html .= '<input required type="radio" value="1" name="cond2_1_2_1_6_3_1" > उसके बाद का शब्द पुरि है ? ';
                                    $html .= '<input required type="radio" value="2" name="cond2_1_2_1_6_3_1" > नहीं ';
                                    $html .= '</div>';
                                    }
if ($last==="i" && ends($arrWord,array("tri"),1) && !ends($arrWord,array("stri"),1) )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_2_1" > त्रिशब्द स्त्रीलिङ्ग में है । ';
            $html .= '<input required type="radio" value="2" name="cond2_2_1" > त्रिशब्द स्त्रीलिङ्ग में नहीं है । ';
            $html .= '</div>';    
}
if ($last==="I" && $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            if (ends($arrWord,array("praDI"),1))
            {
            $html .= '<input required type="radio" value="1" name="cond2_3_5" > प्रध्यायतीति प्रधी ';                    
            $html .= '<input required type="radio" value="2" name="cond2_3_5" > प्रकृष्टा धीः ';                    
            }
            elseif (ends($arrWord,array("suDI"),1))
            {
            $html .= '<input required type="radio" value="1" name="cond2_3_6" > सुष्ठु धीः यस्याः सा / सुष्ठु ध्यायतीति ';                    
            $html .= '<input required type="radio" value="2" name="cond2_3_6" > सुष्ठु धीः ';                                    
            }
            elseif (ends($arrWord,array("grAmaRI"),1))
            {
            }
            else
            {
            $html .= '<input required type="radio" value="1" name="cond2_3" > ङ्‍यन्त, नदीसञ्ज्ञक (गौरी)';
            $html .= '<input required type="radio" value="2" name="cond2_3" > अङ्‍यन्त, नदीसञ्ज्ञक (लक्ष्मी) ';
            $html .= '<input required type="radio" value="3" name="cond2_3" > ङ्‍यन्त, इयङ्स्थानिक (स्त्री) ';
            $html .= '<input required type="radio" value="4" name="cond2_3" > अङ्‍यन्त, इयङ्स्थानिक (श्री) ';                
            }
            $html .= '</div>';    
}
if ($last==="U" && $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            if (ends($arrWord,array("punarBU","dfnBU","karaBU","kAraBU"),1) )
            {
            $html .= '<input required type="radio" value="1" name="cond2_4_4_1" > समास है । ';                    
            $html .= '<input required type="radio" value="2" name="cond2_4_4_1" > समास नहीं है । ';                    
            }
            elseif (ends($arrWord,array("varzABU","svayamBU"),1) )
            {
            }
            else
            {
            $html .= '<input required type="radio" value="1" name="cond2_4" > नदीसञ्ज्ञक (वधूः)';
            $html .= '<input required type="radio" value="2" name="cond2_4" > इयङ्स्थानिक (भ्रूः)';
            $html .= '<input required type="radio" value="3" name="cond2_4" > न नदीसञ्ज्ञक (खलपूः)';
            }
            $html .= '</div>';    
}
/*if (ends($arrWord,array("SUdra","CUdra"),1) && !ends($arrWord,array("mahASUdra","mahatCUdra"),1) && $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_7" > जाति ';                    
            $html .= '<input required type="radio" value="2" name="cond2_7" > पुंयोग ';                    
            $html .= '</div>';    
}*/
if ( $_POST['step']==='2' && ends($arrWord,array("ruhvan","avAvan","yuDvan","yajvan","nadvan","padvan",),1) )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_8_1_1" > बहुव्रीहि है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_8_1_1" > बहुव्रीहि नहीं है ';                    
            $html .= '</div>';    
}
elseif ( ends($arrWord,$vanoracawords,1) && $_POST['step']==='2'  )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond2_8_1_2" > बहुव्रीहि है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_8_1_2" > बहुव्रीहि नहीं है ';                    
            $html .= '</div>';    
}
elseif ( ends($arrWord,array("van"),0) && $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_8_2" > बहुव्रीहि है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_8_2" > बहुव्रीहि नहीं है ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("pAd"),0) && $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_9" > ऋक्‌ है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_9" > ऋक्‌ नहीं है ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("an"),0) && !ends($arrWord,array("man","van"),0)  && !ends($arrWord,array("paYcan","saptan","zwan","navan","daSan"),1) &&  $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_10" > बहुव्रीहि है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_10" > बहुव्रीहि नहीं है ';                    
            $html .= '</div>';    
}
if (  $_POST['step']==='2_10_1')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_10_1" > सञ्ज्ञा है या छान्दस है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_10_1" > नहीं ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("tyaka"),0)  &&   $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_12" > त्यक्‌ / त्यप्‌ प्रत्यय है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_12" > त्यकन्‌ प्रत्यय है ';                    
            $html .= '</div>';    
}
elseif (ends($arrWord,array("yaka","kaka"),0)  &&   $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_13" > धात्वन्त यकार या ककार के परे प्रत्यय का ककार है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_13" > नहीं ';                    
            $html .= '</div>';    
}
elseif (ends($arrWord,array("aka"),0)  && !ends($arrWord,array("yaka","saka","taka","kzipaka","Druvaka","kanyaka","cawaka","alaka","izwaka","tAraka","varRaka","vartaka","azwaka","sUtaka","putraka","vfndAraka"),2)  &&   $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_11" > ककार प्रत्ययस्थ है तथा आप् प्रत्यय सुप् के परे नहीं है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_11" > ककार प्रत्ययस्थ नहीं है या आप् प्रत्यय सुप् के परे है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2_11_1' )
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond2_11_1" > आशिष्‌ के अर्थ में वुन्‌ प्रत्यय प्रयुक्त है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_11_1" > उत्तरपदलोप है ';
            $html .= '<input required type="radio" value="3" name="cond2_11_1" > अभाषितपुंस्क है ';
            $html .= '<input required type="radio" value="4" name="cond2_11_1" > उपर में से कोई नहीं ';
            $html .= '</div>';    
}
if ( $_POST['step']==='2_13_2' )
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond2_13_2" > स्त्रीप्रत्यय के आकार के स्थान पर अकार हुआ है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_13_2" > नहीं ';
            $html .= '</div>';    
}
if (ends($arrWord,array("a"),0) && $_POST['step']==='2' && (ends($arrWord,$TitprAtipadika,1) || (AdivRddhi($arrWord) && ends($arrWord,array("eya","ika","ava","vata","mata","tra","mAtura","prasTa","aka"),0)) || ends($arrWord,$TiDDhA,1) || ends($arrWord,$aJwords,1) ) && !ends($arrWord,array("dEvya"),1)  )
// In this case we have taken every word having Adi vRddhi and ending with akAra. In future, we will have to make it more specific to aN and aJ. All other are recognizable.        
// Future - make it applicable only to aN and aJ. Remove all AdivRddhi pratyayas like Na, Nya etc.        
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_14" > उपसर्जनीभूत है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_14" > उपसर्जनीभूत नहीं है ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("triPala","tryanIka"),2) && $_POST['step']==='2'  )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_15" > द्विगु ';                    
            $html .= '<input required type="radio" value="2" name="cond2_15" > बहुव्रीहि ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("a"),0) && $_POST['step']==='2' && dvigu($arrWord) && !ends($arrWord,array("triPala","tryanIka"),2))
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_16" > द्विगु ';                    
            $html .= '<input required type="radio" value="2" name="cond2_16" > बहुव्रीहि ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2_16_1' && ends($arrWord,array("kARqa"),0) && dvigu($arrWord) ) 
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond2_16_1_2" > क्षेत्रे ';                    
            $html .= '<input required type="radio" value="2" name="cond2_16_1_2" > न क्षेत्रे ';
            $html .= '</div>';    
}
elseif ( $_POST['step']==='2_16_1' && ends($arrWord,array("puruza"),0) && dvigu($arrWord) ) 
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond2_16_1_3" > प्रमाणे ';                    
            $html .= '<input required type="radio" value="2" name="cond2_16_1_3" > न प्रमाणे ';
            $html .= '</div>';    
}
elseif ( $_POST['step']==='2_16_1' && (ends($arrWord,array("bista","Acita","kambalya"),0) || !ends($arrWord,array("guYja","mAza","suvarRa","pala","prasfta","kuwaba","prasTa","AQaka"),0)) && dvigu($arrWord) ) 
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond2_16_1_1" > तद्धितलुक्‌ है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_16_1_1" > नहीं ';
            $html .= '</div>';    
}
elseif ( $_POST['step']==='2_16_1' && ends($arrWord,array("hAyana"),0) && dvigu($arrWord) ) 
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond2_16_1_4" > वयोवाचक है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_16_1_4" > नहीं ';
            $html .= '</div>';    
}
elseif ( $_POST['step']==='2_16_2_1' && ends($arrWord,array("hAyana"),0) && dvigu($arrWord) ) 
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond2_16_2_1" > वयोवाचक है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_16_2_1" > नहीं ';
            $html .= '</div>';    
}
if (ends($arrWord,array("UDas","oDas"),0) && $_POST['step']==='2'  )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_17" > बहुव्रीहि ';                    
            $html .= '<input required type="radio" value="2" name="cond2_17" > बहुव्रीहि नहीं ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2_17_1' ) 
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond2_17_1" > सङ्ख्या या अव्ययादि है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_17_1" > नहीं ';
            $html .= '</div>';    
}
if (ends($arrWord,array("kevala","mAmaka","BAgaDeya","pApa","apara","samAna","Aryakfta","sumaNgala","Bezaja",),2) && $_POST['step']==='2'  )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_18" > सञ्ज्ञा है या छान्दस है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_18" > नहीं ';                    
            $html .= '</div>';    
}
/*if (ends($arrWord,array("pUtakratu","vfzAkapi","agni","kusita","kusida","manu"),2) && $_POST['step']==='2'  )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_19" > पुंयोग में प्रयुक्त है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_19" > नहीं ';                    
            $html .= '</div>';    
}*/ // merged with 2_22.
if (ends($arrWord,array("u"),0) && !arr($arrWord,'/['.pc('hl').']['.pc('hl').'][u]/') && $_POST['step']==='2'  )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_20" > गुणवाचि ';                    
            $html .= '<input required type="radio" value="2" name="cond2_20" > नहीं ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("i"),0) && $_POST['step']==='2' )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_21" > क्तिन्नन्त है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_21" > नहीं ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2' && !ends($arrWord,array("A","I"),0) )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_22" > पुंयोग ';                    
            $html .= '<input required type="radio" value="2" name="cond2_22" > जातिवाचि है और अस्त्रीविषय है ';                    
            $html .= '<input required type="radio" value="3" name="cond2_22" > अन्य ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2_22_1' && ends($arrWord,array("sUrya"),2) ) 
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond2_22_1_1" > देवता ';                    
            $html .= '<input required type="radio" value="2" name="cond2_22_1_1" > मानुषी ';
            $html .= '</div>';    
}
if ( $_POST['step']==='2' && ends($arrWord,array("ta","nna"),0) )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_23" > क्तान्त है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_23" > क्तान्त नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2_23_1' ) 
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond2_23_1" > अल्पत्व के अर्थ में प्रयुक्त है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_23_1" > बहुव्रीहि है ';
            $html .= '<input required type="radio" value="3" name="cond2_23_1" > उपर में से कोई नहीं ';
            $html .= '</div>';    
}
if ( $_POST['step']==='2_23_1_2' ) 
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond2_23_1_2" > अन्तोदात्त है ';                    
            $html .= '<input required type="radio" value="2" name="cond2_23_1_2" > नहीं ';
            $html .= '</div>';    
}
if ( $_POST['step']==='2' && ends($arrWord,array("naKa","muKa","RaKa"),0) )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_24" > सञ्ज्ञा ';                    
            $html .= '<input required type="radio" value="2" name="cond2_24" > नहीं ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2' && ends($arrWord,array("bAhu"),0) )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond2_26" > सञ्ज्ञा ';                    
            $html .= '<input required type="radio" value="2" name="cond2_26" > नहीं ';                    
            $html .= '</div>';    
}

/* napuMsakaliGga */
if (in_array($last,array("i","I","u","U","f","F","x","X")) && $_POST['step']==='3')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond3" > भाषितपुंस्क है ';                    
            $html .= '<input required type="radio" value="2" name="cond3" > नहीं ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("at","At"),1) && in_array($_POST['step'],array('2','3')) )
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond3_3" > अभ्यास के परे शतृप्रत्ययान्त शब्द है ';
            $html .= '<input required type="radio" value="2" name="cond3_3" > नहीं ';
            $html .= '</div>';        
}
if ( $_POST['step']==='3_3_2')
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond3_3_2" > अवर्णान्त अङ्ग के परे शतृ प्रत्यय का अवयव है ';
            $html .= '<input required type="radio" value="2" name="cond3_3_2" > नहीं ';
            $html .= '</div>';        
}
if ( $_POST['step']==='3_3_2_1')
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond3_3_2_1" > शप् / श्यन् प्रत्यय के अवर्ण के परे शतृ प्रत्यय का अवयव है ';
            $html .= '<input required type="radio" value="2" name="cond3_3_2_1" > नहीं ';
            $html .= '</div>';        
}


/* verbs */
if($_POST['step']==='11')
{
            $html .= '<div id="step11">';
            $html .= '<input required type="radio" value="1" name="cond11" > कर्मव्यतिहार है ';
            $html .= '<input required type="radio" value="2" name="cond11" checked> नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11_1')
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond11_1" > गत्यर्थक या हिंसार्थक है ';
            $html .= '<input required type="radio" value="2" name="cond11_1" > इतरेतर, अन्योन्य या परस्पर के समीप में है ';
            $html .= '<input required type="radio" value="3" name="cond11_1" > उपर में से कोई नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("qudAY"),2) && $us==="A")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond14" > विहरण ';
            $html .= '<input required type="radio" value="2" name="cond14" > अविहरण ';
            $html .= '</div>';            
}
if($_POST['step']==='14_1')
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond14_1" > स्वाङ्गविहरण ';
            $html .= '<input required type="radio" value="2" name="cond14_1" > पराङ्गविहरण ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("zWA"),2))
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond15" > प्रकाशन या स्थेय के अर्थ में प्रयुक्त है ';
            $html .= '<input required type="radio" value="2" name="cond15" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("zWA"),2) && $us==="ud")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond16" > ऊर्ध्वकर्म में प्रयुक्त है ';
            $html .= '<input required type="radio" value="2" name="cond16" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("zWA"),2) && $us==="upa")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond17" > मन्त्रकरण है ';
            $html .= '<input required type="radio" value="2" name="cond17" > अकर्मक है ';
            $html .= '<input required type="radio" value="3" name="cond17" > उपर में से कोई नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("hveY"),2) && $us==="A")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond18" > स्पर्धा के अर्थ में है ';
            $html .= '<input required type="radio" value="2" name="cond18" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("kfY"),4) && !in_array($us,array("aDi","vi")) )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond19" > गन्धन, अवक्षेपण, सेवन, साहसिक्य, प्रतियत्न, प्रकथन या उपयोग के अर्थ में प्रयुक्त है ';
            $html .= '<input required type="radio" value="2" name="cond19" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("kfY"),2) && $us==="aDi" )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond20" > प्रहसन ';
            $html .= '<input required type="radio" value="2" name="cond20" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("kfY"),2) && $us==="vi")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond21" > शब्दकर्म ';
            $html .= '<input required type="radio" value="2" name="cond21" > अकर्मक ';
            $html .= '<input required type="radio" value="3" name="cond21" > उपर में से कोई नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("RIY"),2) && $us==="vi")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond23" > दूर करने की क्रिया शरीर से भिन्न है (अशरीरे कर्मणि) ';
            $html .= '<input required type="radio" value="2" name="cond23" > नहीं ';
            $html .= '</div>';            
}
elseif($_POST['step']==='11' && ends($arrWord,array("nIY","RIY"),4) )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond22" > सम्मानन, उत्सञ्जन, आचार्यकरण, ज्ञान, भृति, विगणन या व्यय के अर्थ में प्रयुक्त है ';
            $html .= '<input required type="radio" value="2" name="cond22" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("kramu!"),2) && in_array($us,array("","parA","upa")))
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond24" > वृत्ति, सर्ग या तायन के अर्थ में प्रयुक्त है ';
            $html .= '<input required type="radio" value="2" name="cond24" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("kramu!"),2) && $us==="A")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond25" > उद्गमन ';
            $html .= '<input required type="radio" value="2" name="cond25" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("kramu!"),2) && $us==="vi")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond26" > पादविहरण ';
            $html .= '<input required type="radio" value="2" name="cond26" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("jYA",),2) && in_array($us,array("sam","prati")) )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond28" > अनाध्यान ';
            $html .= '<input required type="radio" value="2" name="cond28" > नहीं ';
            $html .= '</div>';            
}
elseif($_POST['step']==='11' && ends($arrWord,array("jYA"),4) )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond27" > अपह्नव ';
            $html .= '<input required type="radio" value="2" name="cond27" > अकर्मक ';
            $html .= '<input required type="radio" value="3" name="cond27" > अन्य ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("vada!"),2) && $us==="anu")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond30" > स्पष्ट वाणी वालो का सहोच्चारण है और अकर्मक है ';
            $html .= '<input required type="radio" value="2" name="cond30" > अन्य ';
            $html .= '</div>';            
}
elseif($_POST['step']==='11' && ends($arrWord,array("vada!"),4) )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond29" > भासन, उपसम्भाषा, ज्ञान, यत्न, विमति या उपमन्त्रण के अर्थ में है ';
            $html .= '<input required type="radio" value="2" name="cond29" > स्पष्ट वाणी वालों का सहोच्चारण ';
            $html .= '<input required type="radio" value="3" name="cond29" > स्पष्ट वाणी वालों का सहोच्चारण विप्रलाप में है ';
            $html .= '<input required type="radio" value="4" name="cond29" > अन्य ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("kramu!"),2) && in_array($us,array("pra","upa")))
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond31" > आदिकर्म ';
            $html .= '<input required type="radio" value="2" name="cond31" > अन्य ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("gf"),2) && $us==="sam")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond32" > प्रतिज्ञान ';
            $html .= '<input required type="radio" value="2" name="cond32" > अन्य ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("cara!","cara!"),2) && $us==="ud")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond33" > सकर्मक ';
            $html .= '<input required type="radio" value="2" name="cond33" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("cara!"),2) && $us==="sam")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond34" > तृतीयायुक्त है ';
            $html .= '<input required type="radio" value="2" name="cond34" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("dAR"),2) && $us==="sampra")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond35" > तृतीयायुक्त है और चतुर्थी के अर्थ में प्रयुक्त है ';
            $html .= '<input required type="radio" value="2" name="cond35" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("yama!"),2) && $us==="upa")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond36" > स्वकरण ';
            $html .= '<input required type="radio" value="2" name="cond36" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("yuji!r"),2) && in_array($us,array("pra","upa")))
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond37" > यज्ञपात्र ';
            $html .= '<input required type="radio" value="2" name="cond37" > यज्ञपात्र नहीं है ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("Buja!"),4) )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond38" > अवन ';
            $html .= '<input required type="radio" value="2" name="cond38" > अन्य ';
            $html .= '</div>';            
}
if( ends($arrWord,array("YiBI","smiN","zmiN"),4) ) // akartrabhiprAyo'yamArambhaH iti kAzikA. Therefore, not keeping step=11.
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond39" > हेतुभये ';
            $html .= '<input required type="radio" value="2" name="cond39" > नहीं ';
            $html .= '</div>';            
}
if( ends($arrWord,array("gfDu!","vaYcu!","vancu!"),2) ) // akartrabhiprAyo'yamArambhaH iti kAzikA. Therefore, not keeping step=11.
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond40" > प्रलम्भन ';
            $html .= '<input required type="radio" value="2" name="cond40" > अन्य ';
            $html .= '</div>';            
}
if( ends($arrWord,array("lIN","lI",),4) ) // akartrabhiprAyo'yamArambhaH iti kAzikA. Therefore, not keeping step=11.
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond41" > सम्मानन, शालीनीकरण या प्रलम्भन के अर्थ में प्रयुक्त है ';
            $html .= '<input required type="radio" value="2" name="cond41" > नहीं ';
            $html .= '</div>';            
}
if( ends($arrWord,array("kfY","qukfY"),4) ) // akartrabhiprAyo'yamArambhaH iti kAzikA. Therefore, not keeping step=11.
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond42" > मिथ्या उपपद में है और अभ्यास के अर्थ में प्रयुक्त है ';
            $html .= '<input required type="radio" value="2" name="cond42" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("yama!"),2) && in_array($us,array("sam","ud","A")) )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond43" > ग्रन्थविषयक ';
            $html .= '<input required type="radio" value="2" name="cond43" > अन्य ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("ramu!"),2) && $us==="upa")
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond44" > अकर्मक ';
            $html .= '<input required type="radio" value="2" name="cond44" > अन्य ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("takzU!"),4) )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond45" > तनूकरणे ';
            $html .= '<input required type="radio" value="2" name="cond45" > अन्य ';
            $html .= '</div>';            
}
if(($_POST['step']==='11' || $_POST['step']==='12' || $_POST['step']==='13') && ends($arrWord,$nonuniqueverbs,2) )
{
    verb_meaning_gana_number($word);
}
elseif (($_POST['step']==='11' || $_POST['step']==='12' || $_POST['step']==='13') && ends($arrWord,$allverbs,2) )
{
	$verbset = scrape1($word,0,9,1);
	$number = scrape($word,0,8,1,"",$verbset[0],9);
	$html .= '<input required type="hidden" name="number" value="'.$number[0].'" >'; 
}
if($_POST['step']==='11' && ends($arrWord,array("gupa!","tija!","kita!"),4) )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond47" > निन्दा, क्षमा या व्याधिप्रतीकार के अर्थ में प्रयुक्त है ';
            $html .= '<input required type="radio" value="2" name="cond47" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("mAna!","baDa!","dAna!","SAna!"),4) )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond48" > जिज्ञासा, वैरूप्य, आर्जव या निशान के अर्थ में प्रयुक्त है ';
            $html .= '<input required type="radio" value="2" name="cond48" > नहीं ';
            $html .= '</div>';            
}
if($_POST['step']==='11' && ends($arrWord,array("paRa!"),4) )
{
            $html .= '<div id="step33">';
            $html .= '<input required type="radio" value="1" name="cond49" > स्तुति ';
            $html .= '<input required type="radio" value="2" name="cond49" > व्यवहार ';
            $html .= '</div>';            
}
if( in_array($_POST['step'],array('11','12','13')) && in_array($lakAra,array("laN","luN","lfN")) )
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond50" > माङ्‌ योग है ';
            $html .= '<input required type="radio" value="2" name="cond50" checked> नहीं ';
            $html .= '</div>';            
}
if( in_array($_POST['step'],array('11','12','13')) && ends($arrWord,array("iR","ik",),2) && $sanAdi==="Ric")
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond51" > अबोधन ';
            $html .= '<input required type="radio" value="2" name="cond51" checked> बोधन ';
            $html .= '</div>';            
}
if( in_array($_POST['step'],array('11','12','13')) && ends($arrWord,array("duza!",),2) && $sanAdi==="Ric")
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond52" > चित्तविराग ';
            $html .= '<input required type="radio" value="2" name="cond52" checked> अन्य ';
            $html .= '</div>';            
}
if( in_array($_POST['step'],array('11','12','13')) && ends($arrWord,array("ziDU!",),2) && $sanAdi==="Ric")
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond53" > पारलौकिक ज्ञान ';
            $html .= '<input required type="radio" value="2" name="cond53" checked> अन्य ';
            $html .= '</div>';            
}
if( in_array($_POST['step'],array('11','12','13')) && ends($arrWord,array("Sliza!",),2) && $lakAra==="luN")
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond54" > आलिङ्गन ';
            $html .= '<input required type="radio" value="2" name="cond54" checked> अन्य ';
            $html .= '</div>';            
}
if( in_array($_POST['step'],array('11','12','13')) && ends($arrWord,array("qukfY","mfN","df","ruha!","gupa!","Una","Dvana","ila!","arda!"),2) && $lakAra==="luN")
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond55" > छन्दस्‌ ';
            $html .= '<input required type="radio" value="2" name="cond55" checked> नहीं ';
            $html .= '</div>';            
}
if( in_array($_POST['step'],array('11','12','13')) && ends($arrWord,array("yama!"),2) )
{
            $html .= '<div id="step22">';
            $html .= '<input required type="radio" value="1" name="cond56" > गन्धने ';
            $html .= '<input required type="radio" value="2" name="cond56" > उपयमने ';
            $html .= '<input required type="radio" value="3" name="cond56" checked> अन्य ';
            $html .= '</div>';            
}


//display the output
$html = trim($html);
$html .= '<font color="red" size="2">You can submit your query after selecting proper option.</font>';            
echo $html;
exit;
?>