
php extract1.php
python verbnumberdiscrepancyfinder.py ../Data/rawcomplete.txt ../Data/issue965/vnum.txt ../Data/issue965/vnumsuspect.txt ../Data/issue965/vnumlog.txt
diff ../Data/issue965/vnum.txt ../Data/issue965/rawcompletelog.txt > ../Data/issue965/difflog.txt
python linkgen789.py
php ganascraper.php 1 > ../Data/dhaatuganascrapertrial.txt
