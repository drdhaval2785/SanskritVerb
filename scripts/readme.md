# Scripts and brief description

This page would provide brief description of scripts placed in SanskritVerb/scripts folder.

Details can be seen in the script comments.

# ajax.php

Seeks user input based on logic placed in ../Data/ajax requirements.docx.

Used in main script.

# analysedebuglog.py

Analyses the debug log file to identify time leakages in script.

Not used in main script. Mainly a developer tool.

# comparedb.py

Compares verb forms in a test file against a given database (to identify errors).

Not used in main script. Mainly a developer tool.

# dev-slp.py

Converts a text from Devanagari to SLP1 transliteration.

Used in main script.

# function.php

Variables and functions used in panini.php (main script).

Used extensively in main script. Most important script after panini.php.

# ganascraper.php

This script creates $verbdata in function.php based on any changes.

Not used in main script. Mainly a developer tool.

# getdhaatucommentaries.sh

Downloads dhAtu commentaries from UoHyd site.

Not used in main script. A wget command only.

# jquery-1.12.0.js, jquery-ui.js and jquery-ui.css

Standard jquery library downloaded for offline usage.

Used in main script.

# linkgen789.py

Creates an array of links of UoHyd and JNU sites for linking the dhAtu derivation there.

Not used in main script. Mainly a developer tool.

# listgen.php

Script to regenerate $bhvAdi, $adAdi .... etc, when there is some change in $verbdata.

Not used in main script. Mainly a developer tool.

# mystyle.css

CSS for the HTML frontend.

Used in main script.

# recheckgen.py

Prepares a recheck.sh file based on the verbs and lakAras present in the suspect forms file.

Not used in main script. Mainly a developer tool.

# script.js

Script to assist ajax.php for seeking user input.

Used in main script.

# scriptspeed.php

Script to evaluate a function for its speed. 

Not used in main script. Mainly a developer tool.

# slp-dev.php

Script to convert SLP1 to Devanagari transliteration.

Used in main script.

# sutrarelationdisplay.php

Displays the relationship between sUtras as an HTML.

Not used in main script. Used as a developer tool in understandsutra.sh

# uohyderrorfinder.py

Script to find out unaccounted verb forms from UoHyd database.

Not used in main script. Mainly a developer tool.

# verblistgenerator.php

Script to regenerate $verblist and $verbsingerard in panini.php

Not used in main script. Now we use comparedb.py for this purpose. This script slowed the execution significantly. Not used any more.

# wxtoslp.py

Script to convert data from WX encoding (mainly UoHyd data) to SLP1 encoding.

Not used in main script. Used as a developer tool, mostly in uohyderrorfinder.py
