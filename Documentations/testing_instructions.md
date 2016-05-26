# 1. Testing code accuracy automatically

1. Run the code wrongformfinder.sh

2. This will generate three files - (1) generatedforms.xml, (2) suspectforms.txt and (3) recheck.sh

3. generatedforms.xml file has the output generated via panini.php in XML format

4. suspectforms.txt file has the verb forms not found in '../Data/verbforms_gerard.txt', '../Data/verbforms_amba.txt' and '../Data/okforms.txt'

5. These suspect entries need to be verified from the tiGanta.html frontend.

6. Suspect entries which are found to be correct, need to be added to ../Data/okforms.txt

7. Suspect entries which are not found to be correct, need to be noted in https://github.com/drdhaval2785/SanskritVerb/issues/ and necessary corrections need to be made in panini.php or function.php.

8. When an issue is over, close it on github.

9. Store the generatedforms.xml as generatedforms/generatedformsDDMMYYYY.xml

10. Store the suspectforms.txt as suspectforms/suspectverbformsDDMMYYYY.txt

11. Run the code recheck.sh.

12. This will revalidate the output of panini.php for only entries in suspectforms.txt

13. Repeat steps 5-12 till there is no entry in suspectforms.txt.

14. This way, we will be able to run the auto-tests in time bound manner.

15. Once the code passes through steps till 13, give it a new version number.

16. In case you want to revalidate the new version of code for whole range of 2000+ verbs, rerun the steps 1-14.

# 2. Codes used

## 2.1. panini.php 

`panini.php verbnumber lakAra` - this stores the output for the given verb and lakAra in generatedforms.xml

## 2.2. comparedb.py

`python comparedb.py ../generatedforms.xml ../suspectforms.txt` - this compares the entries in generatedforms.xml against all the entries in '../Data/verbforms_gerard.txt', '../Data/verbforms_amba.txt' and '../Data/okforms.txt' and store the verb forms not found in any of those (suspect) in suspectforms.txt

## 2.3. recheckgen.py

`python recheckgen.py ../suspectforms.txt ../recheck.sh` - this scrapes only the verbs and lakAras available in suspectforms.txt and stores them in recheck.sh (so that only the verb forms which were earlier found wrong are tested again, and not the whole lot).

## 2.4. recheck.sh

`sh recheck.sh` - This regenerates the list of suspectforms.txt after corrections (for recheck, re-recheck, re-re-recheck till exhausted)

Caution - this code needs to be run only after all corrections have been made and suspectforms.txt and generatedforms.xml are stored, as it will overwrite these two files.

# 3. Logic 

This methodology exploits the fact that not two coders / data entry operators would do the same mistake. 

So we have taken UoHyd, Gerard and Our own OK list as three base data. Anything which is not found in any of these three databases if flagged as suspect and is manually examined.

To keep track of various corrections, we use github issues.


