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



