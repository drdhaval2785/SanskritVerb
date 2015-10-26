# 1. What do the scripts do ?

## 1.1. tiGanta.html

This file is the frontend of the code.

Live server testing can be done at http://www.sanskritworld.in/sanskrittool/SanskritVerb/tiGanta.html.

## 1.2. tiGanta.php

This file is the main code which actually selects and applies Paninian rules.

## 1.3. function.php

This file stores repetitive functions which are used throughout the code.

This also stores various databases like verbs, Ashtadhyayi sUtras, vArtikas. 

## 1.4. script.js, ajaxcode.js and ajax.php

These scripts help take user feedback for proper declension.
Main content is in ajax.php.
script.js and ajaxcode.js are javascript / jQuery files to help ajax.php.

## 1.5. ajax_requirement.docx

This file holds the issues for which we take user feedback.

## 1.6. slp-dev.php and dev-slp.php

These files convert data from SLP1 to Devanagari and vice versa.

## 1.7. mystyle.css

Stylesheet.

## 1.8. wrongformfinder.sh

This script stores the output of tiGanta.php into a file generatedforms.xml

This script also compares the output of tiGanta.php with the database of Gerard, and stores the unmatched entries into suspectverbforms.txt.

## 1.8. Rest of the files

Not much useful from a user's perspective. They are some random supporting files.

## 1.9. verboutput folder

A copy of the HTML file displayed on screen is stored in this folder when you run the code with some verb.

Also a log.txt file is maintained here to see the history of code usage.

# 2. Workflow of the code

2.1. The user enters a verb, upasarga, lakAra and transliteration scheme in tiGanta.html.

2.2. When he clicks on the mandatory कर्तृवाच्य field, the script.js and ajaxcode.js send the data to ajax.php.

2.3. ajax.php checks whether any of the conditions for user feedback mentioned in it are fulfilled?

2.4. If yes, it seeks for user feedback on screen of tiGanta.html with help of radio buttons. If not, it returns nothing on the screen of tiGanta.html.

2.5. When the user submits the query, the data is posted to tiGanta.php.

2.6. tiGanta.php analyses the applicability of rules and does suitable alterations and finally displays the output on the screen. It also stores the HTML in verboutput folder. It also adds the verb details with some other details in log.txt file in that folder.

# 3. Special functions

There are some functions which we must understand before proceeding further.

3.1. `arr` function tests whether the given pattern appears in any of the members of array $text (the words under consideration).

e.g. arr($text,'/[aA]$/') would return True, if any of the word in array $text ends with 'a' or 'A'.

3.2. `sub` function is a kind of simulation of testing of conditions in Paninian grammar. Typically in Panini's grammar if the condition ABC is met, the change ABC->ADC is effected. Function 'sub' also checks in a similar way.

e.g. sub(prat('ik'),array("+"),prat('ac')) would test whether there is a combination of ik+ac formation.

3.3. `prat` function stands for pratyAhAra e.g. prat('ik') stands for array("i","I","u","U","f","F","x").

3.4. `ends` function tests whether any of the word in the array ends with some specific letters / letter groups.

e.g. ends(array($fo),$irendiditverbs,2) would check whether any member of the array($fo) ends with $irenditiverbs.

3.5. `one`, `two` and `three` are the actual alteration making functions

e.g. 	$text = one(array("i!r"),array("i!"),0); would change the 'i!r'->'i!'.

$text = two(array("Svi"),array("+a+"),array("Sva"),array("+a+"),1); would change 'Svi'->'Sva' optionally (We use 0 for mandatory conversion and 1 for optional conversion.)

$text = three(array("N","Y","R","n","m","M"),$hl,array("+"),array("","","","","","",),$hl,array("+"),0);  would elide the nasals in some situations.

3.6. `storedata` function stores $text and three arguments in the system.
e.g. 	storedata('6.4.24','sa',0); would store the information that the rule applied is '6.4.24', the mode of display is 'sa' and the notes are 0.
Read storedata function in function.php for further details on other possible values.

# Typical code block

```
/* kartari zap (3.1.68) */
if ($sarvadhatuka===1 && in_array($verbset,array("BvAdi","adAdi","juhotyAdi","curAdi")) && sub(array("+"),$tiG,blank(0),0) )
{
    $text=two(array("+"),$tiG,array("+Sap+"),$tiG,0);
	storedata('3.1.68','sa',0);
    $vik=array_merge($vik,array("Sap"));
    $set=1;
}
```

The first line checks for occurrence of ceratain conditions. e.g. Whether the lakAra is sArvadhAtuka or not, whether the verbset belongs to some specified sets or not and whether there is a tiG suffix following '+' mark.

If the above conditions are satisfied, the code would be executed and function `two` would add the vikaraNa pratyaya 'zap'.

The next line is for storing the rule number, mode of display and notes.

The next two lines set some parameters to some values, because they maybe needed at a later stage in code.

