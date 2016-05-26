# Define a timestamp function
timestamp() {
  date +"%d-%m-%Y %H:%M:%S"
}
timestamp
number=1
rm -f "suspectverbforms.txt"
rm -f "generatedforms.xml"
rm -f "suspectverbforms_deva.txt"
echo '<?xml version="1.0" encoding="iso-8859-1"?>' > generatedforms.xml
echo '<forms>' >> generatedforms.xml
echo "1 - Processing tas ruDAdi analysis started at $(timestamp)"
php panini.php tas ruDAdi
echo "2 - Processing Tas ruDAdi analysis started at $(timestamp)"
php panini.php Tas ruDAdi
echo "3 - Processing vas ruDAdi analysis started at $(timestamp)"
php panini.php vas ruDAdi
echo "4 - Processing mas ruDAdi analysis started at $(timestamp)"
php panini.php mas ruDAdi
echo "5 - Processing Ji ruDAdi analysis started at $(timestamp)"
php panini.php Ji ruDAdi
echo "6 - Processing tip adAdi analysis started at $(timestamp)"
php panini.php tip adAdi
echo "7 - Processing tas adAdi analysis started at $(timestamp)"
php panini.php tas adAdi
echo "8 - Processing sip adAdi analysis started at $(timestamp)"
php panini.php sip adAdi
echo "9 - Processing Tas adAdi analysis started at $(timestamp)"
php panini.php Tas adAdi
echo "10 - Processing Ta adAdi analysis started at $(timestamp)"
php panini.php Ta adAdi
echo "11 - Processing mip adAdi analysis started at $(timestamp)"
php panini.php mip adAdi
echo "12 - Processing vas adAdi analysis started at $(timestamp)"
php panini.php vas adAdi
echo "13 - Processing mas adAdi analysis started at $(timestamp)"
php panini.php mas adAdi
echo "14 - Processing tas BvAdi analysis started at $(timestamp)"
php panini.php tas BvAdi
echo "15 - Processing Ji BvAdi analysis started at $(timestamp)"
php panini.php Ji BvAdi
echo "16 - Processing sip BvAdi analysis started at $(timestamp)"
php panini.php sip BvAdi
echo "17 - Processing Tas BvAdi analysis started at $(timestamp)"
php panini.php Tas BvAdi
echo "18 - Processing vas BvAdi analysis started at $(timestamp)"
php panini.php vas BvAdi
echo "19 - Processing mas BvAdi analysis started at $(timestamp)"
php panini.php mas BvAdi
echo "20 - Processing ta BvAdi analysis started at $(timestamp)"
php panini.php ta BvAdi
echo "21 - Processing AtAm BvAdi analysis started at $(timestamp)"
php panini.php AtAm BvAdi
echo "22 - Processing Ja BvAdi analysis started at $(timestamp)"
php panini.php Ja BvAdi
echo "23 - Processing TAs BvAdi analysis started at $(timestamp)"
php panini.php TAs BvAdi
echo "24 - Processing ATAm BvAdi analysis started at $(timestamp)"
php panini.php ATAm BvAdi
echo "25 - Processing iw BvAdi analysis started at $(timestamp)"
php panini.php iw BvAdi
echo "26 - Processing vahi BvAdi analysis started at $(timestamp)"
php panini.php vahi BvAdi
echo "27 - Processing mahiN BvAdi analysis started at $(timestamp)"
php panini.php mahiN BvAdi
echo "28 - Processing tip BvAdi analysis started at $(timestamp)"
php panini.php tip BvAdi
echo "29 - Processing mip BvAdi analysis started at $(timestamp)"
php panini.php mip BvAdi
echo "30 - Processing Ta BvAdi analysis started at $(timestamp)"
php panini.php Ta BvAdi
echo "31 - Processing tip tudAdi analysis started at $(timestamp)"
php panini.php tip tudAdi
echo "32 - Processing tas tudAdi analysis started at $(timestamp)"
php panini.php tas tudAdi
echo "33 - Processing Ji tudAdi analysis started at $(timestamp)"
php panini.php Ji tudAdi
echo "34 - Processing sip tudAdi analysis started at $(timestamp)"
php panini.php sip tudAdi
echo "35 - Processing Tas tudAdi analysis started at $(timestamp)"
php panini.php Tas tudAdi
echo "36 - Processing Ta tudAdi analysis started at $(timestamp)"
php panini.php Ta tudAdi
echo "37 - Processing mip tudAdi analysis started at $(timestamp)"
php panini.php mip tudAdi
echo "38 - Processing vas tudAdi analysis started at $(timestamp)"
php panini.php vas tudAdi
echo "39 - Processing mas tudAdi analysis started at $(timestamp)"
php panini.php mas tudAdi
echo "40 - Processing Ta ruDAdi analysis started at $(timestamp)"
php panini.php Ta ruDAdi
echo "41 - Processing mip ruDAdi analysis started at $(timestamp)"
php panini.php mip ruDAdi
echo "42 - Processing Ji svAdi analysis started at $(timestamp)"
php panini.php Ji svAdi
echo "43 - Processing tip tanAdi analysis started at $(timestamp)"
php panini.php tip tanAdi
echo "44 - Processing tas tanAdi analysis started at $(timestamp)"
php panini.php tas tanAdi
echo "45 - Processing Ji tanAdi analysis started at $(timestamp)"
php panini.php Ji tanAdi
echo "46 - Processing sip tanAdi analysis started at $(timestamp)"
php panini.php sip tanAdi
echo "47 - Processing Tas tanAdi analysis started at $(timestamp)"
php panini.php Tas tanAdi
echo "48 - Processing Ta tanAdi analysis started at $(timestamp)"
php panini.php Ta tanAdi
echo "49 - Processing mip tanAdi analysis started at $(timestamp)"
php panini.php mip tanAdi
echo "50 - Processing vas tanAdi analysis started at $(timestamp)"
php panini.php vas tanAdi
echo "51 - Processing mas tanAdi analysis started at $(timestamp)"
php panini.php mas tanAdi
echo "52 - Processing ta tanAdi analysis started at $(timestamp)"
php panini.php ta tanAdi
echo "53 - Processing AtAm tanAdi analysis started at $(timestamp)"
php panini.php AtAm tanAdi
echo "54 - Processing Ja tanAdi analysis started at $(timestamp)"
php panini.php Ja tanAdi
echo "55 - Processing TAs tanAdi analysis started at $(timestamp)"
php panini.php TAs tanAdi
echo "56 - Processing ATAm tanAdi analysis started at $(timestamp)"
php panini.php ATAm tanAdi
echo "57 - Processing Dvam tanAdi analysis started at $(timestamp)"
php panini.php Dvam tanAdi
echo "58 - Processing iw tanAdi analysis started at $(timestamp)"
php panini.php iw tanAdi
echo "59 - Processing vahi tanAdi analysis started at $(timestamp)"
php panini.php vahi tanAdi
echo "60 - Processing mahiN tanAdi analysis started at $(timestamp)"
php panini.php mahiN tanAdi
echo "61 - Processing tas kryAdi analysis started at $(timestamp)"
php panini.php tas kryAdi
echo "62 - Processing Ji kryAdi analysis started at $(timestamp)"
php panini.php Ji kryAdi
echo "63 - Processing sip kryAdi analysis started at $(timestamp)"
php panini.php sip kryAdi
echo "64 - Processing Tas kryAdi analysis started at $(timestamp)"
php panini.php Tas kryAdi
echo "65 - Processing vas kryAdi analysis started at $(timestamp)"
php panini.php vas kryAdi
echo "66 - Processing mas kryAdi analysis started at $(timestamp)"
php panini.php mas kryAdi
echo "67 - Processing tip juhotyAdi analysis started at $(timestamp)"
php panini.php tip juhotyAdi
echo "68 - Processing tas juhotyAdi analysis started at $(timestamp)"
php panini.php tas juhotyAdi
echo "69 - Processing Ji juhotyAdi analysis started at $(timestamp)"
php panini.php Ji juhotyAdi
echo "70 - Processing sip juhotyAdi analysis started at $(timestamp)"
php panini.php sip juhotyAdi
echo "71 - Processing Tas juhotyAdi analysis started at $(timestamp)"
php panini.php Tas juhotyAdi
echo "72 - Processing Ta juhotyAdi analysis started at $(timestamp)"
php panini.php Ta juhotyAdi
echo "73 - Processing mip juhotyAdi analysis started at $(timestamp)"
php panini.php mip juhotyAdi
echo "74 - Processing vas juhotyAdi analysis started at $(timestamp)"
php panini.php vas juhotyAdi
echo "75 - Processing mas juhotyAdi analysis started at $(timestamp)"
php panini.php mas juhotyAdi
echo "76 - Processing mip kryAdi analysis started at $(timestamp)"
php panini.php mip kryAdi
echo "77 - Processing tip curAdi analysis started at $(timestamp)"
php panini.php tip curAdi
echo "78 - Processing tas curAdi analysis started at $(timestamp)"
php panini.php tas curAdi
echo "79 - Processing Ji curAdi analysis started at $(timestamp)"
php panini.php Ji curAdi
echo "80 - Processing sip curAdi analysis started at $(timestamp)"
php panini.php sip curAdi
echo "81 - Processing Tas curAdi analysis started at $(timestamp)"
php panini.php Tas curAdi
echo "82 - Processing Ta curAdi analysis started at $(timestamp)"
php panini.php Ta curAdi
echo "83 - Processing mip curAdi analysis started at $(timestamp)"
php panini.php mip curAdi
echo "84 - Processing vas curAdi analysis started at $(timestamp)"
php panini.php vas curAdi
echo "85 - Processing mas curAdi analysis started at $(timestamp)"
php panini.php mas curAdi
echo "86 - Processing ta curAdi analysis started at $(timestamp)"
php panini.php ta curAdi
echo "87 - Processing AtAm curAdi analysis started at $(timestamp)"
php panini.php AtAm curAdi
echo "88 - Processing Ja curAdi analysis started at $(timestamp)"
php panini.php Ja curAdi
echo "89 - Processing TAs curAdi analysis started at $(timestamp)"
php panini.php TAs curAdi
echo "90 - Processing ATAm curAdi analysis started at $(timestamp)"
php panini.php ATAm curAdi
echo "91 - Processing Dvam curAdi analysis started at $(timestamp)"
php panini.php Dvam curAdi
echo "92 - Processing iw curAdi analysis started at $(timestamp)"
php panini.php iw curAdi
echo "93 - Processing vahi curAdi analysis started at $(timestamp)"
php panini.php vahi curAdi
echo "94 - Processing mahiN curAdi analysis started at $(timestamp)"
php panini.php mahiN curAdi
echo "95 - Processing Dvam BvAdi analysis started at $(timestamp)"
php panini.php Dvam BvAdi
echo "96 - Processing TAs kryAdi analysis started at $(timestamp)"
php panini.php TAs kryAdi
echo "97 - Processing Dvam kryAdi analysis started at $(timestamp)"
php panini.php Dvam kryAdi
echo "98 - Processing vahi kryAdi analysis started at $(timestamp)"
php panini.php vahi kryAdi
echo "99 - Processing mahiN kryAdi analysis started at $(timestamp)"
php panini.php mahiN kryAdi
echo "100 - Processing Ja kryAdi analysis started at $(timestamp)"
php panini.php Ja kryAdi
echo "101 - Processing tip kryAdi analysis started at $(timestamp)"
php panini.php tip kryAdi
echo "102 - Processing Ta kryAdi analysis started at $(timestamp)"
php panini.php Ta kryAdi
echo "103 - Processing tas svAdi analysis started at $(timestamp)"
php panini.php tas svAdi
echo "104 - Processing Tas svAdi analysis started at $(timestamp)"
php panini.php Tas svAdi
echo "105 - Processing Ta svAdi analysis started at $(timestamp)"
php panini.php Ta svAdi
echo "106 - Processing Dvam tudAdi analysis started at $(timestamp)"
php panini.php Dvam tudAdi
echo "107 - Processing sip divAdi analysis started at $(timestamp)"
php panini.php sip divAdi
echo "108 - Processing vas divAdi analysis started at $(timestamp)"
php panini.php vas divAdi
echo "109 - Processing mas divAdi analysis started at $(timestamp)"
php panini.php mas divAdi
echo "110 - Processing tas divAdi analysis started at $(timestamp)"
php panini.php tas divAdi
echo "111 - Processing Ji divAdi analysis started at $(timestamp)"
php panini.php Ji divAdi
echo "112 - Processing Tas divAdi analysis started at $(timestamp)"
php panini.php Tas divAdi
echo "113 - Processing Ta divAdi analysis started at $(timestamp)"
php panini.php Ta divAdi
echo "114 - Processing mip divAdi analysis started at $(timestamp)"
php panini.php mip divAdi
echo "115 - Processing tip divAdi analysis started at $(timestamp)"
php panini.php tip divAdi
echo "116 - Processing tip ruDAdi analysis started at $(timestamp)"
php panini.php tip ruDAdi
echo "117 - Processing sip ruDAdi analysis started at $(timestamp)"
php panini.php sip ruDAdi
echo "118 - Processing Ji adAdi analysis started at $(timestamp)"
php panini.php Ji adAdi
echo "119 - Processing vas svAdi analysis started at $(timestamp)"
php panini.php vas svAdi
echo "120 - Processing mas svAdi analysis started at $(timestamp)"
php panini.php mas svAdi
echo "121 - Processing Dvam adAdi analysis started at $(timestamp)"
php panini.php Dvam adAdi
echo "122 - Processing sip svAdi analysis started at $(timestamp)"
php panini.php sip svAdi
echo "123 - Processing tip svAdi analysis started at $(timestamp)"
php panini.php tip svAdi
echo "124 - Processing mip svAdi analysis started at $(timestamp)"
php panini.php mip svAdi
echo "125 - Processing ta juhotyAdi analysis started at $(timestamp)"
php panini.php ta juhotyAdi
echo "126 - Processing TAs juhotyAdi analysis started at $(timestamp)"
php panini.php TAs juhotyAdi
echo "127 - Processing AtAm juhotyAdi analysis started at $(timestamp)"
php panini.php AtAm juhotyAdi
echo "128 - Processing Ja juhotyAdi analysis started at $(timestamp)"
php panini.php Ja juhotyAdi
echo "129 - Processing ATAm juhotyAdi analysis started at $(timestamp)"
php panini.php ATAm juhotyAdi
echo "130 - Processing Dvam juhotyAdi analysis started at $(timestamp)"
php panini.php Dvam juhotyAdi
echo "131 - Processing iw juhotyAdi analysis started at $(timestamp)"
php panini.php iw juhotyAdi
echo "132 - Processing vahi juhotyAdi analysis started at $(timestamp)"
php panini.php vahi juhotyAdi
echo "133 - Processing mahiN juhotyAdi analysis started at $(timestamp)"
php panini.php mahiN juhotyAdi
echo "134 - Processing vahi tudAdi analysis started at $(timestamp)"
php panini.php vahi tudAdi
echo "135 - Processing mahiN tudAdi analysis started at $(timestamp)"
php panini.php mahiN tudAdi
echo "136 - Processing ta tudAdi analysis started at $(timestamp)"
php panini.php ta tudAdi
echo "137 - Processing AtAm tudAdi analysis started at $(timestamp)"
php panini.php AtAm tudAdi
echo "138 - Processing Ja tudAdi analysis started at $(timestamp)"
php panini.php Ja tudAdi
echo "139 - Processing TAs tudAdi analysis started at $(timestamp)"
php panini.php TAs tudAdi
echo "140 - Processing ATAm tudAdi analysis started at $(timestamp)"
php panini.php ATAm tudAdi
echo "141 - Processing iw tudAdi analysis started at $(timestamp)"
php panini.php iw tudAdi
echo "142 - Processing Ja svAdi analysis started at $(timestamp)"
php panini.php Ja svAdi
echo "143 - Processing ta kryAdi analysis started at $(timestamp)"
php panini.php ta kryAdi
echo "144 - Processing AtAm kryAdi analysis started at $(timestamp)"
php panini.php AtAm kryAdi
echo "145 - Processing ATAm kryAdi analysis started at $(timestamp)"
php panini.php ATAm kryAdi
echo "146 - Processing iw kryAdi analysis started at $(timestamp)"
php panini.php iw kryAdi
echo "147 - Processing ta adAdi analysis started at $(timestamp)"
php panini.php ta adAdi
echo "148 - Processing AtAm svAdi analysis started at $(timestamp)"
php panini.php AtAm svAdi
echo "149 - Processing ATAm svAdi analysis started at $(timestamp)"
php panini.php ATAm svAdi
echo "150 - Processing iw svAdi analysis started at $(timestamp)"
php panini.php iw svAdi
echo "151 - Processing Dvam svAdi analysis started at $(timestamp)"
php panini.php Dvam svAdi
echo '</forms>' >> generatedforms.xml
cd scripts
python comparedb.py ../generatedforms.xml ../suspectverbforms.txt
