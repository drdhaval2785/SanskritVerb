<?php 
// including function.php for arrays and functions.
include "function.php";
// including slp-dev.php for SLP1->devanAgarI conversion for display on front end.
include "slp-dev.php";
// including dev-slp.php for devanAgarI->SLP1 conversion to process data entered in Devanagari.
include "dev-slp.php";

//post element
$word = $_POST['first'];
$tran = $_POST['tran'];

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
			$html .= '<input type="radio" value="1" name="cond1_1_1" > सर्वादयः सञ्ज्ञा के तौर पे प्रयुक्त हुए हैं ? ';
			$html .= '<input type="radio" value="2" name="cond1_1_1" > सर्वादयः उपसर्जनीभूत हैं ? ';
			$html .= '<input type="radio" value="3" name="cond1_1_1" > सर्वादयः तृतीया तत्पुरुष समास में प्रयुक्त हुए हैं ? ';
			$html .= '<input type="radio" value="4" name="cond1_1_1" > सर्वादयः द्वन्द्व समास में प्रयुक्त हुए हैं ? ';
			$html .= '<input type="radio" value="5" name="cond1_1_1" > सर्वादयः बहुव्रीहि समास में प्रयुक्त हुए हैं ? ';
			$html .= '<input type="radio" value="6" name="cond1_1_1" > उपर से किसी में नहीं प्रयुक्त हुए हैं ';
			$html .= '</div>';
		}
		
		if($_POST['step'] === '1_1_1_5' && ends($arrWord,array("pUrva","paScima","uttara","dakziNa"),1) ){
			$html .= '<div id="step22">';
			$html .= '<input type="radio" value="1" name="cond1_1_1_5" > दिक्समास है ';
			$html .= '<input type="radio" value="2" name="cond1_1_1_5" > दिक्समास नहीं है ';
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
				$html .= '<input type="radio" value="1" name="cond1_1_1_6_1" > सञ्ज्ञा है या व्यवस्था के अर्थ में नहीं है ';
				$html .= '<input type="radio" value="2" name="cond1_1_1_6_1" > सञ्ज्ञा नहीं है और व्यवस्था के अर्थ में प्रयुक्त हुए हैं । ';
				$html .= '</div>';
			}elseif(ends($arrWord,$sva,1)){
				$html .= '<div id="step22">';
				$html .= '<input type="radio" value="1" name="cond1_1_1_6_2" > ज्ञाति या धन के अर्थ में प्रयुक्त हुआ है ';
				$html .= '<input type="radio" value="2" name="cond1_1_1_6_2" > ज्ञाति या धन के अर्थ में प्रयुक्त नहीं हुआ है ';
				$html .= '</div>';
			}elseif(ends($arrWord,$antara,1)){
				$html .= '<div id="step22">';
				$html .= '<input type="radio" value="1" name="cond1_1_1_6_3" > बहिर्योग या उपसंव्यान के अर्थ में प्रयुक्त हुआ है ';
				$html .= '<input type="radio" value="2" name="cond1_1_1_6_3" > बहिर्योग या उपसंव्यान के अर्थ में प्रयुक्त नहीं हुआ है ';
				$html .= '</div>';
			}elseif(ends($arrWord,$datara,1) && !ends($arrWord,$anyatama,1)){
				$html .= '<div id="step22">';
				$html .= '<input type="radio" value="1" name="cond1_1_1_6_4" > डतर / डतम प्रत्यय से शब्द की सिद्धि हुई है ';
				$html .= '<input type="radio" value="2" name="cond1_1_1_6_4" > नहीं ';
				$html .= '</div>';
			}elseif(ends($arrWord,$sama,1)){
				$html .= '<div id="step22">';
				$html .= '<input type="radio" value="1" name="cond1_1_1_6_5" > सम शब्द सर्व के पर्याय में प्रयुक्त हुआ है ';
				$html .= '<input type="radio" value="2" name="cond1_1_1_6_5" > सम शब्द तुल्य के पर्याय में प्रयुक्त हुआ है ';
				$html .= '</div>';
			}
			
		}
                    if($_POST['step'] === '1_1_1_6_3_1'){
                                    $html .= '<div id="step33">';
                                    $html .= '<input type="radio" value="1" name="cond1_1_1_6_3_1" > उसके बाद का शब्द पुरि है ? ';
                                    $html .= '<input type="radio" value="2" name="cond1_1_1_6_3_1" > नहीं ';
                                    $html .= '</div>';
                    }
		
	}
}
elseif($last === 'A' && $_POST['step'] !== '1_2' && $_POST['gender']==='m')
{		
    $html .= '<div class="step11">';
    $html .= '<input type="radio" value="1" name="cond1_2" > क्या यह आकारान्त धातु है ? ';
    $html .= '<input type="radio" value="2" name="cond1_2" > नहीं ';
    $html .= '</div>';
}
elseif($last === 'i' )
{
    if ($last_4 === 'saKi')
    {
        $html .= '<div class="step11">';
        $html .= '<input type="radio" value="1" name="cond1_3_1" >प्राधान्य – जैसे कि सुसखा ';
        $html .= '<input type="radio" value="2" name="cond1_3_1" >उपसर्जनीभूत – जैसे कि परमसखा ';
        $html .= '<input type="radio" value="3" name="cond1_3_1" >लाक्षणिक – जैसे कि अतिसखिः (सखीमतिक्रान्तः) ';
        $html .= '</div>';
    }
    if (ends($arrWord,array("dvi"),1))
    {
        $html .= '<div class="step11">';
        $html .= '<input type="radio" value="1" name="cond1_3_2" >सञ्ज्ञा है या उपसर्जनीभूत है ';
        $html .= '<input type="radio" value="2" name="cond1_3_2" >सञ्ज्ञा नहीं है और उपसर्जनीभूत नहीं है ';
        $html .= '</div>';        
    }    
}
elseif($last === 'I' )
{
    if($_POST['step'] === '1')
    {
        $html .= '<div id="step11">';
        $html .= '<input type="radio" value="1" name="cond1_4" > अनदीसञ्ज्ञकः अधातुः ';
        $html .= '<input type="radio" value="2" name="cond1_4" > नदीसञ्ज्ञकः अधातुः ';
        $html .= '<input type="radio" value="3" name="cond1_4" > अनदीसञ्ज्ञकः धातुः (असंयोगपूर्वकः इवर्णः, अनेकाच् अङ्गम्) ';
        $html .= '<input type="radio" value="4" name="cond1_4" > नदीसञ्ज्ञकः धातुः (असंयोगपूर्वकः इवर्णः, अनेकाच् अङ्गम्) ';
        $html .= '<input type="radio" value="5" name="cond1_4" > अनदीसञ्ज्ञकः धातुः (संयोगपूर्वकः इवर्णः / एकाच् अङ्गम् / गतिकारकेतरपूर्वकः) या सुधीशब्दः ';
        $html .= '<input type="radio" value="6" name="cond1_4" > नदीसञ्ज्ञकः धातुः (संयोगपूर्वकः इवर्णः / एकाच् अङ्गम् / गतिकारकेतरपूर्वकः) ';
        $html .= '</div>';
    }
        if($_POST['step'] === '1_4_2')
        {
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond1_4_2" > ङ्‍यन्त ';
            $html .= '<input type="radio" value="2" name="cond1_4_2" > अङ्‍यन्त ';
            $html .= '</div>';
        }
        if($_POST['step'] === '1_4_3')
        {
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond1_4_3" > नीधात्वन्त ';
            $html .= '<input type="radio" value="2" name="cond1_4_3" > सखा – (सखायमिच्छति) ';
            $html .= '<input type="radio" value="3" name="cond1_4_3" > सखीः, सुखीः, सुतीः, लूनीः, प्रस्तीमीः इत्यादि ';
            $html .= '<input type="radio" value="4" name="cond1_4_3" > अन्य ';
            $html .= '</div>';
        }
        if($_POST['step'] === '1_4_4')
        {
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond1_4_4" > ङ्‍यन्त ';
            $html .= '<input type="radio" value="2" name="cond1_4_4" > अङ्‍यन्त ';
            $html .= '</div>';
        }
        if($_POST['step'] === '1_4_6')
        {
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond1_4_6" > ङ्‍यन्त ';
            $html .= '<input type="radio" value="2" name="cond1_4_6" > अङ्‍यन्त ';
            $html .= '</div>';
        }
}
elseif ($last==="U")
{
    if($_POST['step'] === '1')
    {
        $html .= '<div id="step11">';
        $html .= '<input type="radio" value="1" name="cond1_5" > अनदीसञ्ज्ञकः अधातुः ';
        $html .= '<input type="radio" value="2" name="cond1_5" > नदीसञ्ज्ञकः अधातुः ';
        $html .= '<input type="radio" value="3" name="cond1_5" > धातुः (असंयोगपूर्वकः ऊवर्णः, अनेकाच् अङ्गम्, गतिकारकपूर्वकः) ';
        $html .= '<input type="radio" value="4" name="cond1_5" > धातुः (संयोगपूर्वकः ऊवर्णः / एकाच् अङ्गम् / गतिकारकेतरपूर्वकः) ';
        $html .= '</div>';
    }        
}

if ( ends($arrWord,array("catur"),0) && $_POST['step']==='1')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_6_1" > चतुर्‌ उपसर्जनीभूत है ? ';                    
            $html .= '<input type="radio" value="2" name="cond1_6_1" > चतुर्‌ प्रधान है । ';                    
            $html .= '</div>';    
}
if ( $last==="m" && $_POST['step']==='1' && !ends($arrWord,array("idam","idakam"),2))
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_16" > धातु ';                    
            $html .= '<input type="radio" value="2" name="cond1_16" > अधातु ';                    
            $html .= '</div>';    
}
if ( ends($arrWord,$pancan,0) && $_POST['step']==='1')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_8" > उपसर्जनीभूत ';                    
            $html .= '<input type="radio" value="2" name="cond1_8" > प्रधान ';                    
            $html .= '</div>';    
}
if ( ends($arrWord,array("BrAj"),1) && $_POST['step']==='1')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_9_3" > भ्राज्‌ धातु फणादि है ';                    
            $html .= '<input type="radio" value="2" name="cond1_9_3" > नहीं ';                    
            $html .= '</div>';    
}
elseif ( $last==="j" && $_POST['step']==='1')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_9" > क्विन्‌ प्रत्ययान्त है ';                    
            $html .= '<input type="radio" value="2" name="cond1_9" > नहीं ';                    
            $html .= '</div>';    
}
if ( ends($arrWord,array("tyad","tad","yad","etad","idam","adas","eka","dvi","idakam",),1) && $_POST['step']!=='1_10_2' )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_10" > त्यदादि सञ्ज्ञा या उपसर्जनीभूत के तौर पर प्रयुक्त हुए हैं ';                    
            $html .= '<input type="radio" value="2" name="cond1_10" > नहीं ';                    
            $html .= '</div>';    
}
if ( ends($arrWord,array("etad","idam","idakam",),1) && $_POST['step']==='1_10_2' )
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond1_10_2" > अन्वादेश ';                    
            $html .= '<input type="radio" value="2" name="cond1_10_2" > नहीं ';                    
            $html .= '</div>';    
}
if ( ends($arrWord,array("asmad","Asmad","yuzmad"),0) && $_POST['step']==='1' )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_11" > अस्मद् / युष्मद् एकत्ववाची है ';                    
            $html .= '<input type="radio" value="2" name="cond1_11" > अस्मद् / युष्मद् द्वित्ववाची है ';                    
            $html .= '<input type="radio" value="3" name="cond1_11" > अस्मद् / युष्मद् बहुत्ववाची है ';                    
            $html .= '</div>';    
}
if ( ends($arrWord,array("asmad","Asmad","yuzmad"),2) && $_POST['step']==='1' )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_12" > अस्मद् / युष्मद् का प्रयोग पद के बाद में नहीं हुआ है । ';                    
            $html .= '<input type="radio" value="2" name="cond1_12" > अस्मद् / युष्मद् का प्रयोग पाद के प्रारम्भ में हुआ है । ';                    
            $html .= '<input type="radio" value="3" name="cond1_12" > अस्मद्/ युष्मद् का च, वा, हा, अह या एव से साक्षात् योग है । ';                    
            $html .= '<input type="radio" value="4" name="cond1_12" > अस्मद्/ युष्मद् का अचाक्षुष ज्ञानार्थ धातु से योग है । ';                    
            $html .= '<input type="radio" value="5" name="cond1_12" > उपर में से कोई नहीं ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_12_5' )
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond1_12_5" > अन्वादेश है ';                    
            $html .= '<input type="radio" value="2" name="cond1_12_5" > अन्वादेश नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_12_5_1' )
{
            $html .= '<div id="step33">';
            $html .= '<input type="radio" value="1" name="cond1_12_5_1" > अस्मद् / युष्मद् विद्यमानपूर्व प्रथमान्त शब्द के परे हैं ';                    
            $html .= '<input type="radio" value="2" name="cond1_12_5_1" > अस्मद् / युष्मद्‌ विद्यमानपूर्व प्रथमान्त शब्द के परे नहीं हैं ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_12_5_1_1' )
{
            $html .= '<div id="step44">';
            $html .= '<input type="radio" value="1" name="cond1_12_5_1_1" > आमन्त्रित से परे हैं ';                    
            $html .= '<input type="radio" value="2" name="cond1_12_5_1_1" > आमन्त्रित से परे नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_12_5_1_1_1' )
{
            $html .= '<div id="step55">';
            $html .= '<input type="radio" value="1" name="cond1_12_5_1_1_1" > विशेष्य से परे समानाधिकरण विशेषण है ';                    
            $html .= '<input type="radio" value="2" name="cond1_12_5_1_1_1" > विशेष्य से परे समानाधिकरण विशेषण नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_12_5_1_1_1_1' )
{
            $html .= '<div id="step66">';
            $html .= '<input type="radio" value="1" name="cond1_12_5_1_1_1_1" > बहुवचन है ';                    
            $html .= '<input type="radio" value="2" name="cond1_12_5_1_1_1_1" > बहुवचन नहीं है ';                    
            $html .= '</div>';    
}
if ( in_array($_POST['step'],array("1","3")) && ends($arrWord,array("aYc","AYc","anc","Anc"),1) )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_13" > क्विन्‌ प्रत्ययान्त है ';                    
            $html .= '<input type="radio" value="2" name="cond1_13" > क्विन्‌ प्रत्ययान्त नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_13_1' && ends($arrWord,array("aYc","AYc","anc","Anc"),1) )
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond1_13_1" > पूजा के अर्थ में प्रयुक्त है ';                    
            $html .= '<input type="radio" value="2" name="cond1_13_1" > पूजा के अर्थ में नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1' && ends($arrWord,array("at"),0) && !ends($arrWord,array("Bavat"),1) )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_17" > अत्वन्त है ';                    
            $html .= '<input type="radio" value="2" name="cond1_17" > अत्वन्त नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1_17_2' )
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond1_17_2" > अभ्यस्त है ';                    
            $html .= '<input type="radio" value="2" name="cond1_17_2" > अभ्यस्त नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1' && ends($arrWord,array("Bavat"),1) )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_14" > भातेर्डवतुः ';                    
            $html .= '<input type="radio" value="2" name="cond1_14" > भूधातोः शतृप्रत्ययः ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1' && ends($arrWord,array("zaz"),0) )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_18" > प्राधान्य ';                    
            $html .= '<input type="radio" value="2" name="cond1_18" > उपसर्जनीभूतः ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='1' && ends($arrWord,array("takz","rakz"),1) )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond1_15" > ण्यन्त ';                    
            $html .= '<input type="radio" value="2" name="cond1_15" > अण्यन्त ';                    
            $html .= '</div>';    
}




// strIliGga
if ($last==="A" && $_POST['step'] === '2')
{
        $html .= '<div id="step11">';
        $html .= '<input type="radio" value="1" name="cond2_1" > शब्द आबन्त नहीं है ';
        $html .= '<input type="radio" value="2" name="cond2_1" > शब्द आबन्त है ';
        $html .= '</div>';
}
        $sarvanamastri = array("sarvA","viSvA","uBA","uBayA","atarA","atamA","anyA","anyatarA","itarA","tvA","nemA","simA","pUrvA","parA","avarA","dakziRA","uttarA","aparA","aDarA","svA","antarA","ekA","dvA",);
        $diksamAsa = array('uttarapUrvA','dakziRapUrvA','uttarapaScimA','dakziRapaScimA');
    if($_POST['step'] === '2_1_2' && ends($arrWord,$sarvanamastri,1) )
    {
        $html .= '<div id="step11">';
        $html .= '<input type="radio" value="1" name="cond2_1_2_1" > सर्वादयः सञ्ज्ञा के तौर पे प्रयुक्त हुए हैं ? ';
        $html .= '<input type="radio" value="2" name="cond2_1_2_1" > सर्वादयः उपसर्जनीभूत हैं ';
        $html .= '<input type="radio" value="3" name="cond2_1_2_1" > सर्वादयः तृतीया तत्पुरुष समास में प्रयुक्त हुए हैं ? ';
        $html .= '<input type="radio" value="4" name="cond2_1_2_1" > सर्वादयः द्वन्द्व समास में प्रयुक्त हुए हैं ? ';
        $html .= '<input type="radio" value="5" name="cond2_1_2_1" > सर्वादयः बहुव्रीहि समास में प्रयुक्त हुए हैं ? ';
        $html .= '<input type="radio" value="6" name="cond2_1_2_1" > उपर से किसी में नहीं प्रयुक्त हुए हैं ';
        $html .= '</div>';
    }   
		if($_POST['step'] === '2_1_2_1_5'){
			$html .= '<div id="step22">';
			$html .= '<input type="radio" value="1" name="cond2_1_2_1_5" > दिक्समास है ';
			$html .= '<input type="radio" value="2" name="cond2_1_2_1_5" > दिक्समास नहीं है ';
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
				$html .= '<input type="radio" value="1" name="cond2_1_2_1_6_1" > सञ्ज्ञा है या व्यवस्था के अर्थ में नहीं है ';
				$html .= '<input type="radio" value="2" name="cond2_1_2_1_6_1" > सञ्ज्ञा नहीं है और व्यवस्था के अर्थ में प्रयुक्त हुए हैं । ';
				$html .= '</div>';
			}elseif(ends($arrWord,$sva,1)){
				$html .= '<div id="step22">';
				$html .= '<input type="radio" value="1" name="cond2_1_2_1_6_2" > ज्ञाति या धन के अर्थ में प्रयुक्त हुआ है ';
				$html .= '<input type="radio" value="2" name="cond2_1_2_1_6_2" > ज्ञाति या धन के अर्थ में प्रयुक्त नहीं हुआ है ';
				$html .= '</div>';
			}elseif(ends($arrWord,$antara,1)){
				$html .= '<div id="step22">';
				$html .= '<input type="radio" value="1" name="cond2_1_2_1_6_3" > बहिर्योग या उपसंव्यान के अर्थ में प्रयुक्त हुआ है ';
				$html .= '<input type="radio" value="2" name="cond2_1_2_1_6_3" > बहिर्योग या उपसंव्यान के अर्थ में प्रयुक्त नहीं हुआ है ';
				$html .= '</div>';
			}elseif(ends($arrWord,$datara,1) && !ends($arrWord,$anyatama,1)){
				$html .= '<div id="step22">';
				$html .= '<input type="radio" value="1" name="cond2_1_2_1_6_4" > डतर / डतम प्रत्यय से शब्द की सिद्धि हुई है ';
				$html .= '<input type="radio" value="2" name="cond2_1_2_1_6_4" > नहीं ';
				$html .= '</div>';
			}elseif(ends($arrWord,$sama,1)){
				$html .= '<div id="step22">';
				$html .= '<input type="radio" value="1" name="cond2_1_2_1_6_5" > सम शब्द सर्व के पर्याय में प्रयुक्त हुआ है ';
				$html .= '<input type="radio" value="2" name="cond2_1_2_1_6_5" > सम शब्द तुल्य के पर्याय में प्रयुक्त हुआ है ';
				$html .= '</div>';
			}
                }
                                    if($_POST['step'] === '2_1_2_1_6_3_1'){
                                    $html .= '<div id="step33">';
                                    $html .= '<input type="radio" value="1" name="cond2_1_2_1_6_3_1" > उसके बाद का शब्द पुरि है ? ';
                                    $html .= '<input type="radio" value="2" name="cond2_1_2_1_6_3_1" > नहीं ';
                                    $html .= '</div>';
                                    }
if ($last==="i" && ends($arrWord,array("tri"),1) && !ends($arrWord,array("stri"),1) )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_2_1" > त्रिशब्द स्त्रीलिङ्ग में है । ';
            $html .= '<input type="radio" value="2" name="cond2_2_1" > त्रिशब्द स्त्रीलिङ्ग में नहीं है । ';
            $html .= '</div>';    
}
if ($last==="I" && $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            if (ends($arrWord,array("praDI"),1))
            {
            $html .= '<input type="radio" value="1" name="cond2_3_5" > प्रध्यायतीति प्रधी ';                    
            $html .= '<input type="radio" value="2" name="cond2_3_5" > प्रकृष्टा धीः ';                    
            }
            elseif (ends($arrWord,array("suDI"),1))
            {
            $html .= '<input type="radio" value="1" name="cond2_3_6" > सुष्ठु धीः यस्याः सा / सुष्ठु ध्यायतीति ';                    
            $html .= '<input type="radio" value="2" name="cond2_3_6" > सुष्ठु धीः ';                                    
            }
            elseif (ends($arrWord,array("grAmaRI"),1))
            {
            }
            else
            {
            $html .= '<input type="radio" value="1" name="cond2_3" > ङ्‍यन्त, नदीसञ्ज्ञक (गौरी)';
            $html .= '<input type="radio" value="2" name="cond2_3" > अङ्‍यन्त, नदीसञ्ज्ञक (लक्ष्मी) ';
            $html .= '<input type="radio" value="3" name="cond2_3" > ङ्‍यन्त, इयङ्स्थानिक (स्त्री) ';
            $html .= '<input type="radio" value="4" name="cond2_3" > अङ्‍यन्त, इयङ्स्थानिक (श्री) ';                
            }
            $html .= '</div>';    
}
if ($last==="U" && $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            if (ends($arrWord,array("punarBU","dfnBU","karaBU","kAraBU"),1) )
            {
            $html .= '<input type="radio" value="1" name="cond2_4_4_1" > समास है । ';                    
            $html .= '<input type="radio" value="2" name="cond2_4_4_1" > समास नहीं है । ';                    
            }
            elseif (ends($arrWord,array("varzABU","svayamBU"),1) )
            {
            }
            else
            {
            $html .= '<input type="radio" value="1" name="cond2_4" > नदीसञ्ज्ञक (वधूः)';
            $html .= '<input type="radio" value="2" name="cond2_4" > इयङ्स्थानिक (भ्रूः)';
            $html .= '<input type="radio" value="3" name="cond2_4" > न नदीसञ्ज्ञक (खलपूः)';
            }
            $html .= '</div>';    
}
/*if (ends($arrWord,array("SUdra","CUdra"),1) && !ends($arrWord,array("mahASUdra","mahatCUdra"),1) && $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_7" > जाति ';                    
            $html .= '<input type="radio" value="2" name="cond2_7" > पुंयोग ';                    
            $html .= '</div>';    
}*/
if ( $_POST['step']==='2' && ends($arrWord,array("ruhvan","avAvan","yuDvan","yajvan","nadvan","padvan",),1) )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_8_1_1" > बहुव्रीहि है ';                    
            $html .= '<input type="radio" value="2" name="cond2_8_1_1" > बहुव्रीहि नहीं है ';                    
            $html .= '</div>';    
}
elseif ( ends($arrWord,$vanoracawords,1) && $_POST['step']==='2'  )
{
            $html .= '<div id="step33">';
            $html .= '<input type="radio" value="1" name="cond2_8_1_2" > बहुव्रीहि है ';                    
            $html .= '<input type="radio" value="2" name="cond2_8_1_2" > बहुव्रीहि नहीं है ';                    
            $html .= '</div>';    
}
elseif ( ends($arrWord,array("van"),0) && $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_8_2" > बहुव्रीहि है ';                    
            $html .= '<input type="radio" value="2" name="cond2_8_2" > बहुव्रीहि नहीं है ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("pAd"),0) && $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_9" > ऋक्‌ है ';                    
            $html .= '<input type="radio" value="2" name="cond2_9" > ऋक्‌ नहीं है ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("an"),0) && !ends($arrWord,array("man","van"),0)  && !ends($arrWord,array("paYcan","saptan","zwan","navan","daSan"),1) &&  $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_10" > बहुव्रीहि है ';                    
            $html .= '<input type="radio" value="2" name="cond2_10" > बहुव्रीहि नहीं है ';                    
            $html .= '</div>';    
}
if (  $_POST['step']==='2_10_1')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_10_1" > सञ्ज्ञा है या छान्दस है ';                    
            $html .= '<input type="radio" value="2" name="cond2_10_1" > नहीं ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("tyaka"),0)  &&   $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_12" > त्यक्‌ / त्यप्‌ प्रत्यय है ';                    
            $html .= '<input type="radio" value="2" name="cond2_12" > त्यकन्‌ प्रत्यय है ';                    
            $html .= '</div>';    
}
elseif (ends($arrWord,array("yaka","kaka"),0)  &&   $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_13" > धात्वन्त यकार या ककार के परे प्रत्यय का ककार है ';                    
            $html .= '<input type="radio" value="2" name="cond2_13" > नहीं ';                    
            $html .= '</div>';    
}
elseif (ends($arrWord,array("aka"),0)  && !ends($arrWord,array("yaka","saka","taka","kzipaka","Druvaka","kanyaka","cawaka","alaka","izwaka","tAraka","varRaka","vartaka","azwaka","sUtaka","putraka","vfndAraka"),2)  &&   $_POST['step']==='2')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_11" > ककार प्रत्ययस्थ है तथा आप् प्रत्यय सुप् के परे नहीं है ';                    
            $html .= '<input type="radio" value="2" name="cond2_11" > ककार प्रत्ययस्थ नहीं है या आप् प्रत्यय सुप् के परे है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2_11_1' )
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond2_11_1" > आशिष्‌ के अर्थ में वुन्‌ प्रत्यय प्रयुक्त है ';                    
            $html .= '<input type="radio" value="2" name="cond2_11_1" > उत्तरपदलोप है ';
            $html .= '<input type="radio" value="3" name="cond2_11_1" > अभाषितपुंस्क है ';
            $html .= '<input type="radio" value="4" name="cond2_11_1" > उपर में से कोई नहीं ';
            $html .= '</div>';    
}
if ( $_POST['step']==='2_13_2' )
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond2_13_2" > स्त्रीप्रत्यय के आकार के स्थान पर अकार हुआ है ';                    
            $html .= '<input type="radio" value="2" name="cond2_13_2" > नहीं ';
            $html .= '</div>';    
}
if (ends($arrWord,array("a"),0) && $_POST['step']==='2' && (ends($arrWord,$TitprAtipadika,1) || (AdivRddhi($arrWord) && ends($arrWord,array("eya","ika","ava","vata","mata","tra","mAtura","prasTa","aka"),0)) || ends($arrWord,$TiDDhA,1) || ends($arrWord,$aJwords,1) ) && !ends($arrWord,array("dEvya"),1)  )
// In this case we have taken every word having Adi vRddhi and ending with akAra. In future, we will have to make it more specific to aN and aJ. All other are recognizable.        
// Future - make it applicable only to aN and aJ. Remove all AdivRddhi pratyayas like Na, Nya etc.        
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_14" > उपसर्जनीभूत है ';                    
            $html .= '<input type="radio" value="2" name="cond2_14" > उपसर्जनीभूत नहीं है ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("triPala","tryanIka"),2) && $_POST['step']==='2'  )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_15" > द्विगु ';                    
            $html .= '<input type="radio" value="2" name="cond2_15" > बहुव्रीहि ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("a"),0) && $_POST['step']==='2' && dvigu($arrWord) && !ends($arrWord,array("triPala","tryanIka"),2))
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_16" > द्विगु ';                    
            $html .= '<input type="radio" value="2" name="cond2_16" > बहुव्रीहि ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2_16_1' && ends($arrWord,array("kARqa"),0) && dvigu($arrWord) ) 
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond2_16_1_2" > क्षेत्रे ';                    
            $html .= '<input type="radio" value="2" name="cond2_16_1_2" > न क्षेत्रे ';
            $html .= '</div>';    
}
elseif ( $_POST['step']==='2_16_1' && ends($arrWord,array("puruza"),0) && dvigu($arrWord) ) 
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond2_16_1_3" > प्रमाणे ';                    
            $html .= '<input type="radio" value="2" name="cond2_16_1_3" > न प्रमाणे ';
            $html .= '</div>';    
}
elseif ( $_POST['step']==='2_16_1' && (ends($arrWord,array("bista","Acita","kambalya"),0) || !ends($arrWord,array("guYja","mAza","suvarRa","pala","prasfta","kuwaba","prasTa","AQaka"),0)) && dvigu($arrWord) ) 
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond2_16_1_1" > तद्धितलुक्‌ है ';                    
            $html .= '<input type="radio" value="2" name="cond2_16_1_1" > नहीं ';
            $html .= '</div>';    
}
elseif ( $_POST['step']==='2_16_1' && ends($arrWord,array("hAyana"),0) && dvigu($arrWord) ) 
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond2_16_1_4" > वयोवाचक है ';                    
            $html .= '<input type="radio" value="2" name="cond2_16_1_4" > नहीं ';
            $html .= '</div>';    
}
elseif ( $_POST['step']==='2_16_2_1' && ends($arrWord,array("hAyana"),0) && dvigu($arrWord) ) 
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond2_16_2_1" > वयोवाचक है ';                    
            $html .= '<input type="radio" value="2" name="cond2_16_2_1" > नहीं ';
            $html .= '</div>';    
}
if (ends($arrWord,array("UDas","oDas"),0) && $_POST['step']==='2'  )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_17" > बहुव्रीहि ';                    
            $html .= '<input type="radio" value="2" name="cond2_17" > बहुव्रीहि नहीं ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2_17_1' ) 
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond2_17_1" > सङ्ख्या या अव्ययादि है ';                    
            $html .= '<input type="radio" value="2" name="cond2_17_1" > नहीं ';
            $html .= '</div>';    
}
if (ends($arrWord,array("kevala","mAmaka","BAgaDeya","pApa","apara","samAna","Aryakfta","sumaNgala","Bezaja",),2) && $_POST['step']==='2'  )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_18" > सञ्ज्ञा है या छान्दस है ';                    
            $html .= '<input type="radio" value="2" name="cond2_18" > नहीं ';                    
            $html .= '</div>';    
}
/*if (ends($arrWord,array("pUtakratu","vfzAkapi","agni","kusita","kusida","manu"),2) && $_POST['step']==='2'  )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_19" > पुंयोग में प्रयुक्त है ';                    
            $html .= '<input type="radio" value="2" name="cond2_19" > नहीं ';                    
            $html .= '</div>';    
}*/ // merged with 2_22.
if (ends($arrWord,array("u"),0) && !arr($arrWord,'/['.pc('hl').']['.pc('hl').'][u]/') && $_POST['step']==='2'  )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_20" > गुणवाचि ';                    
            $html .= '<input type="radio" value="2" name="cond2_20" > नहीं ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("i"),0) && $_POST['step']==='2' )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_21" > क्तिन्नन्त है ';                    
            $html .= '<input type="radio" value="2" name="cond2_21" > नहीं ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2' && !ends($arrWord,array("A","I"),0) )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_22" > पुंयोग ';                    
            $html .= '<input type="radio" value="2" name="cond2_22" > जातिवाचि है और अस्त्रीविषय है ';                    
            $html .= '<input type="radio" value="3" name="cond2_22" > अन्य ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2_22_1' && ends($arrWord,array("sUrya"),2) ) 
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond2_22_1_1" > देवता ';                    
            $html .= '<input type="radio" value="2" name="cond2_22_1_1" > मानुषी ';
            $html .= '</div>';    
}
if ( $_POST['step']==='2' && ends($arrWord,array("ta","nna"),0) )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_23" > क्तान्त है ';                    
            $html .= '<input type="radio" value="2" name="cond2_23" > क्तान्त नहीं है ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2_23_1' ) 
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond2_23_1" > अल्पत्व के अर्थ में प्रयुक्त है ';                    
            $html .= '<input type="radio" value="2" name="cond2_23_1" > बहुव्रीहि है ';
            $html .= '<input type="radio" value="3" name="cond2_23_1" > उपर में से कोई नहीं ';
            $html .= '</div>';    
}
if ( $_POST['step']==='2_23_1_2' ) 
{
            $html .= '<div id="step33">';
            $html .= '<input type="radio" value="1" name="cond2_23_1_2" > अन्तोदात्त है ';                    
            $html .= '<input type="radio" value="2" name="cond2_23_1_2" > नहीं ';
            $html .= '</div>';    
}
if ( $_POST['step']==='2' && ends($arrWord,array("naKa","muKa","RaKa"),0) )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_24" > सञ्ज्ञा ';                    
            $html .= '<input type="radio" value="2" name="cond2_24" > नहीं ';                    
            $html .= '</div>';    
}
if ( $_POST['step']==='2' && ends($arrWord,array("bAhu"),0) )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond2_26" > सञ्ज्ञा ';                    
            $html .= '<input type="radio" value="2" name="cond2_26" > नहीं ';                    
            $html .= '</div>';    
}

/* napuMsakaliGga */
if (in_array($last,array("i","I","u","U","f","F","x","X")) && $_POST['step']==='3')
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond3" > भाषितपुंस्क है ';                    
            $html .= '<input type="radio" value="2" name="cond3" > नहीं ';                    
            $html .= '</div>';    
}
if (ends($arrWord,array("at","At"),1) && in_array($_POST['step'],array('2','3')) )
{
            $html .= '<div id="step11">';
            $html .= '<input type="radio" value="1" name="cond3_3" > अभ्यास के परे शतृप्रत्ययान्त शब्द है ';
            $html .= '<input type="radio" value="2" name="cond3_3" > नहीं ';
            $html .= '</div>';        
}
if ( $_POST['step']==='3_3_2')
{
            $html .= '<div id="step22">';
            $html .= '<input type="radio" value="1" name="cond3_3_2" > अवर्णान्त अङ्ग के परे शतृ प्रत्यय का अवयव है ';
            $html .= '<input type="radio" value="2" name="cond3_3_2" > नहीं ';
            $html .= '</div>';        
}
if ( $_POST['step']==='3_3_2_1')
{
            $html .= '<div id="step33">';
            $html .= '<input type="radio" value="1" name="cond3_3_2_1" > शप् / श्यन् प्रत्यय के अवर्ण के परे शतृ प्रत्यय का अवयव है ';
            $html .= '<input type="radio" value="2" name="cond3_3_2_1" > नहीं ';
            $html .= '</div>';        
}

//display the output
echo $html;
exit;
?>