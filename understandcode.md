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

