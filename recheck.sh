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
echo "1 - Processing of 02.0041 laN started at $(timestamp)"
php panini.php 02.0041 laN
echo "2 - Processing of 02.0041 luN started at $(timestamp)"
php panini.php 02.0041 luN
echo "3 - Processing of 02.0041 lfN started at $(timestamp)"
php panini.php 02.0041 lfN
echo "4 - Processing of 02.0065 laN started at $(timestamp)"
php panini.php 02.0065 laN
echo "5 - Processing of 10.0471 ASIrliN started at $(timestamp)"
php panini.php 10.0471 ASIrliN
echo "6 - Processing of 07.0020 viDiliN started at $(timestamp)"
php panini.php 07.0020 viDiliN
echo "7 - Processing of 03.0017 laN started at $(timestamp)"
php panini.php 03.0017 laN
echo "8 - Processing of 06.0016 liw started at $(timestamp)"
php panini.php 06.0016 liw
echo "9 - Processing of 06.0016 luN started at $(timestamp)"
php panini.php 06.0016 luN
echo "10 - Processing of 06.0016 lfN started at $(timestamp)"
php panini.php 06.0016 lfN
echo "11 - Processing of 08.0005 low started at $(timestamp)"
php panini.php 08.0005 low
echo "12 - Processing of 02.0015 liw started at $(timestamp)"
php panini.php 02.0015 liw
echo "13 - Processing of 02.0015 luN started at $(timestamp)"
php panini.php 02.0015 luN
echo "14 - Processing of 10.0432 luN started at $(timestamp)"
php panini.php 10.0432 luN
echo "15 - Processing of 10.0225 luN started at $(timestamp)"
php panini.php 10.0225 luN
echo "16 - Processing of 08.0010 low started at $(timestamp)"
php panini.php 08.0010 low
echo "17 - Processing of 08.0010 laN started at $(timestamp)"
php panini.php 08.0010 laN
echo "18 - Processing of 01.0682 law started at $(timestamp)"
php panini.php 01.0682 law
echo "19 - Processing of 01.0682 laN started at $(timestamp)"
php panini.php 01.0682 laN
echo "20 - Processing of 06.0006 luN started at $(timestamp)"
php panini.php 06.0006 luN
echo "21 - Processing of 01.1145 luN started at $(timestamp)"
php panini.php 01.1145 luN
echo "22 - Processing of 10.0437 luN started at $(timestamp)"
php panini.php 10.0437 luN
echo "23 - Processing of 04.0007 low started at $(timestamp)"
php panini.php 04.0007 low
echo "24 - Processing of 10.0416 luN started at $(timestamp)"
php panini.php 10.0416 luN
echo "25 - Processing of 01.1133 law started at $(timestamp)"
php panini.php 01.1133 law
echo "26 - Processing of 01.1133 low started at $(timestamp)"
php panini.php 01.1133 low
echo "27 - Processing of 01.1133 laN started at $(timestamp)"
php panini.php 01.1133 laN
echo "28 - Processing of 01.1133 viDiliN started at $(timestamp)"
php panini.php 01.1133 viDiliN
echo "29 - Processing of 10.0413 luN started at $(timestamp)"
php panini.php 10.0413 luN
echo "30 - Processing of 10.0415 luN started at $(timestamp)"
php panini.php 10.0415 luN
echo "31 - Processing of 10.0204 luN started at $(timestamp)"
php panini.php 10.0204 luN
echo "32 - Processing of 01.0461 law started at $(timestamp)"
php panini.php 01.0461 law
echo "33 - Processing of 01.0655 liw started at $(timestamp)"
php panini.php 01.0655 liw
echo "34 - Processing of 10.0417 luN started at $(timestamp)"
php panini.php 10.0417 luN
echo "35 - Processing of 01.0717 liw started at $(timestamp)"
php panini.php 01.0717 liw
echo "36 - Processing of 01.0717 luN started at $(timestamp)"
php panini.php 01.0717 luN
echo "37 - Processing of 10.0434 luN started at $(timestamp)"
php panini.php 10.0434 luN
echo "38 - Processing of 01.0718 liw started at $(timestamp)"
php panini.php 01.0718 liw
echo "39 - Processing of 01.0718 luN started at $(timestamp)"
php panini.php 01.0718 luN
echo "40 - Processing of 08.0007 law started at $(timestamp)"
php panini.php 08.0007 law
echo "41 - Processing of 08.0007 low started at $(timestamp)"
php panini.php 08.0007 low
echo "42 - Processing of 01.0453 liw started at $(timestamp)"
php panini.php 01.0453 liw
echo "43 - Processing of 02.0067 liw started at $(timestamp)"
php panini.php 02.0067 liw
echo "44 - Processing of 02.0067 luN started at $(timestamp)"
php panini.php 02.0067 luN
echo "45 - Processing of 10.0324 luN started at $(timestamp)"
php panini.php 10.0324 luN
echo "46 - Processing of 09.0346 luN started at $(timestamp)"
php panini.php 09.0346 luN
echo "47 - Processing of 09.0028 laN started at $(timestamp)"
php panini.php 09.0028 laN
echo "48 - Processing of 01.0756 luN started at $(timestamp)"
php panini.php 01.0756 luN
echo "49 - Processing of 07.0022 viDiliN started at $(timestamp)"
php panini.php 07.0022 viDiliN
echo "50 - Processing of 07.0022 luN started at $(timestamp)"
php panini.php 07.0022 luN
echo "51 - Processing of 10.0454 luN started at $(timestamp)"
php panini.php 10.0454 luN
echo "52 - Processing of 06.0116 luN started at $(timestamp)"
php panini.php 06.0116 luN
echo "53 - Processing of 08.0006 viDiliN started at $(timestamp)"
php panini.php 08.0006 viDiliN
echo "54 - Processing of 10.0011 law started at $(timestamp)"
php panini.php 10.0011 law
echo "55 - Processing of 10.0011 liw started at $(timestamp)"
php panini.php 10.0011 liw
echo "56 - Processing of 10.0011 luw started at $(timestamp)"
php panini.php 10.0011 luw
echo "57 - Processing of 10.0011 lfw started at $(timestamp)"
php panini.php 10.0011 lfw
echo "58 - Processing of 10.0011 low started at $(timestamp)"
php panini.php 10.0011 low
echo "59 - Processing of 10.0011 laN started at $(timestamp)"
php panini.php 10.0011 laN
echo "60 - Processing of 10.0011 ASIrliN started at $(timestamp)"
php panini.php 10.0011 ASIrliN
echo "61 - Processing of 10.0011 viDiliN started at $(timestamp)"
php panini.php 10.0011 viDiliN
echo "62 - Processing of 10.0011 luN started at $(timestamp)"
php panini.php 10.0011 luN
echo "63 - Processing of 10.0011 lfN started at $(timestamp)"
php panini.php 10.0011 lfN
echo "64 - Processing of 01.0652 law started at $(timestamp)"
php panini.php 01.0652 law
echo "65 - Processing of 01.0652 luw started at $(timestamp)"
php panini.php 01.0652 luw
echo "66 - Processing of 01.0652 lfw started at $(timestamp)"
php panini.php 01.0652 lfw
echo "67 - Processing of 01.0652 low started at $(timestamp)"
php panini.php 01.0652 low
echo "68 - Processing of 01.0652 laN started at $(timestamp)"
php panini.php 01.0652 laN
echo "69 - Processing of 01.0652 viDiliN started at $(timestamp)"
php panini.php 01.0652 viDiliN
echo "70 - Processing of 01.0652 lfN started at $(timestamp)"
php panini.php 01.0652 lfN
echo "71 - Processing of 01.1144 law started at $(timestamp)"
php panini.php 01.1144 law
echo "72 - Processing of 01.1144 low started at $(timestamp)"
php panini.php 01.1144 low
echo "73 - Processing of 01.1144 laN started at $(timestamp)"
php panini.php 01.1144 laN
echo "74 - Processing of 01.1144 viDiliN started at $(timestamp)"
php panini.php 01.1144 viDiliN
echo "75 - Processing of 02.0068 viDiliN started at $(timestamp)"
php panini.php 02.0068 viDiliN
echo "76 - Processing of 02.0068 luN started at $(timestamp)"
php panini.php 02.0068 luN
echo "77 - Processing of 02.0071 laN started at $(timestamp)"
php panini.php 02.0071 laN
echo "78 - Processing of 05.0037 ASIrliN started at $(timestamp)"
php panini.php 05.0037 ASIrliN
echo "79 - Processing of 03.0011 luN started at $(timestamp)"
php panini.php 03.0011 luN
echo "80 - Processing of 01.0677 law started at $(timestamp)"
php panini.php 01.0677 law
echo "81 - Processing of 01.0677 laN started at $(timestamp)"
php panini.php 01.0677 laN
echo "82 - Processing of 06.0133 luN started at $(timestamp)"
php panini.php 06.0133 luN
echo "83 - Processing of 10.0010 luw started at $(timestamp)"
php panini.php 10.0010 luw
echo "84 - Processing of 10.0010 lfw started at $(timestamp)"
php panini.php 10.0010 lfw
echo "85 - Processing of 10.0010 ASIrliN started at $(timestamp)"
php panini.php 10.0010 ASIrliN
echo "86 - Processing of 10.0010 luN started at $(timestamp)"
php panini.php 10.0010 luN
echo "87 - Processing of 10.0010 lfN started at $(timestamp)"
php panini.php 10.0010 lfN
echo "88 - Processing of 01.0714 liw started at $(timestamp)"
php panini.php 01.0714 liw
echo "89 - Processing of 01.0714 luN started at $(timestamp)"
php panini.php 01.0714 luN
echo "90 - Processing of 10.0427 luN started at $(timestamp)"
php panini.php 10.0427 luN
echo "91 - Processing of 01.1049 liw started at $(timestamp)"
php panini.php 01.1049 liw
echo "92 - Processing of 01.0507 law started at $(timestamp)"
php panini.php 01.0507 law
echo "93 - Processing of 01.0507 low started at $(timestamp)"
php panini.php 01.0507 low
echo "94 - Processing of 01.0507 laN started at $(timestamp)"
php panini.php 01.0507 laN
echo "95 - Processing of 01.0507 viDiliN started at $(timestamp)"
php panini.php 01.0507 viDiliN
echo "96 - Processing of 01.0507 luN started at $(timestamp)"
php panini.php 01.0507 luN
echo "97 - Processing of 01.0508 law started at $(timestamp)"
php panini.php 01.0508 law
echo "98 - Processing of 01.0508 low started at $(timestamp)"
php panini.php 01.0508 low
echo "99 - Processing of 01.0508 laN started at $(timestamp)"
php panini.php 01.0508 laN
echo "100 - Processing of 01.0508 viDiliN started at $(timestamp)"
php panini.php 01.0508 viDiliN
echo "101 - Processing of 01.0508 luN started at $(timestamp)"
php panini.php 01.0508 luN
echo "102 - Processing of 10.0453 luN started at $(timestamp)"
php panini.php 10.0453 luN
echo "103 - Processing of 10.0134 ASIrliN started at $(timestamp)"
php panini.php 10.0134 ASIrliN
echo "104 - Processing of 10.0134 luN started at $(timestamp)"
php panini.php 10.0134 luN
echo "105 - Processing of 01.0870 liw started at $(timestamp)"
php panini.php 01.0870 liw
echo "106 - Processing of 01.0870 luN started at $(timestamp)"
php panini.php 01.0870 luN
echo "107 - Processing of 04.0002 liw started at $(timestamp)"
php panini.php 04.0002 liw
echo "108 - Processing of 01.1017 ASIrliN started at $(timestamp)"
php panini.php 01.1017 ASIrliN
echo "109 - Processing of 01.0519 liw started at $(timestamp)"
php panini.php 01.0519 liw
echo "110 - Processing of 02.0039 ASIrliN started at $(timestamp)"
php panini.php 02.0039 ASIrliN
echo "111 - Processing of 03.0019 ASIrliN started at $(timestamp)"
php panini.php 03.0019 ASIrliN
echo "112 - Processing of 03.0019 luN started at $(timestamp)"
php panini.php 03.0019 luN
echo "113 - Processing of 10.0428 luN started at $(timestamp)"
php panini.php 10.0428 luN
echo "114 - Processing of 10.0411 luN started at $(timestamp)"
php panini.php 10.0411 luN
echo "115 - Processing of 06.0129 liw started at $(timestamp)"
php panini.php 06.0129 liw
echo "116 - Processing of 01.0715 liw started at $(timestamp)"
php panini.php 01.0715 liw
echo "117 - Processing of 01.0715 luN started at $(timestamp)"
php panini.php 01.0715 luN
echo "118 - Processing of 09.0052 laN started at $(timestamp)"
php panini.php 09.0052 laN
echo "119 - Processing of 06.0053 luN started at $(timestamp)"
php panini.php 06.0053 luN
echo "120 - Processing of 06.0161 luN started at $(timestamp)"
php panini.php 06.0161 luN
echo "121 - Processing of 04.0090 luN started at $(timestamp)"
php panini.php 04.0090 luN
echo "122 - Processing of 01.0713 luN started at $(timestamp)"
php panini.php 01.0713 luN
echo "123 - Processing of 01.0319 law started at $(timestamp)"
php panini.php 01.0319 law
echo "124 - Processing of 01.0319 low started at $(timestamp)"
php panini.php 01.0319 low
echo "125 - Processing of 01.0319 laN started at $(timestamp)"
php panini.php 01.0319 laN
echo "126 - Processing of 01.0319 viDiliN started at $(timestamp)"
php panini.php 01.0319 viDiliN
echo "127 - Processing of 10.0479 luN started at $(timestamp)"
php panini.php 10.0479 luN
echo "128 - Processing of 10.0482 luN started at $(timestamp)"
php panini.php 10.0482 luN
echo "129 - Processing of 10.0307 luN started at $(timestamp)"
php panini.php 10.0307 luN
echo "130 - Processing of 10.0308 luN started at $(timestamp)"
php panini.php 10.0308 luN
echo "131 - Processing of 10.0058 law started at $(timestamp)"
php panini.php 10.0058 law
echo "132 - Processing of 10.0058 liw started at $(timestamp)"
php panini.php 10.0058 liw
echo "133 - Processing of 10.0058 luw started at $(timestamp)"
php panini.php 10.0058 luw
echo "134 - Processing of 10.0058 lfw started at $(timestamp)"
php panini.php 10.0058 lfw
echo "135 - Processing of 10.0058 low started at $(timestamp)"
php panini.php 10.0058 low
echo "136 - Processing of 10.0058 laN started at $(timestamp)"
php panini.php 10.0058 laN
echo "137 - Processing of 10.0058 ASIrliN started at $(timestamp)"
php panini.php 10.0058 ASIrliN
echo "138 - Processing of 10.0058 viDiliN started at $(timestamp)"
php panini.php 10.0058 viDiliN
echo "139 - Processing of 10.0058 lfN started at $(timestamp)"
php panini.php 10.0058 lfN
echo "140 - Processing of 02.0380 liw started at $(timestamp)"
php panini.php 02.0380 liw
echo "141 - Processing of 01.1164 ASIrliN started at $(timestamp)"
php panini.php 01.1164 ASIrliN
echo "142 - Processing of 01.1158 ASIrliN started at $(timestamp)"
php panini.php 01.1158 ASIrliN
echo "143 - Processing of 02.0075 low started at $(timestamp)"
php panini.php 02.0075 low
echo "144 - Processing of 02.0111 liw started at $(timestamp)"
php panini.php 02.0111 liw
echo "145 - Processing of 01.1160 liw started at $(timestamp)"
php panini.php 01.1160 liw
echo "146 - Processing of 07.0023 liw started at $(timestamp)"
php panini.php 07.0023 liw
echo "147 - Processing of 07.0023 luN started at $(timestamp)"
php panini.php 07.0023 luN
echo "148 - Processing of 07.0023 lfN started at $(timestamp)"
php panini.php 07.0023 lfN
echo "149 - Processing of 06.0013 liw started at $(timestamp)"
php panini.php 06.0013 liw
echo "150 - Processing of 10.0445 luN started at $(timestamp)"
php panini.php 10.0445 luN
echo "151 - Processing of 10.0421 luN started at $(timestamp)"
php panini.php 10.0421 luN
echo "152 - Processing of 10.0419 luN started at $(timestamp)"
php panini.php 10.0419 luN
echo "153 - Processing of 10.0444 luN started at $(timestamp)"
php panini.php 10.0444 luN
echo "154 - Processing of 01.0865 luN started at $(timestamp)"
php panini.php 01.0865 luN
echo "155 - Processing of 09.0374 low started at $(timestamp)"
php panini.php 09.0374 low
echo "156 - Processing of 09.0048 low started at $(timestamp)"
php panini.php 09.0048 low
echo "157 - Processing of 01.1165 liw started at $(timestamp)"
php panini.php 01.1165 liw
echo "158 - Processing of 02.0074 low started at $(timestamp)"
php panini.php 02.0074 low
echo "159 - Processing of 02.0074 laN started at $(timestamp)"
php panini.php 02.0074 laN
echo "160 - Processing of 10.0433 luN started at $(timestamp)"
php panini.php 10.0433 luN
echo "161 - Processing of 10.0467 luN started at $(timestamp)"
php panini.php 10.0467 luN
echo "162 - Processing of 10.0429 luN started at $(timestamp)"
php panini.php 10.0429 luN
echo "163 - Processing of 10.0407 luN started at $(timestamp)"
php panini.php 10.0407 luN
echo "164 - Processing of 10.0420 luN started at $(timestamp)"
php panini.php 10.0420 luN
echo "165 - Processing of 05.0002 liw started at $(timestamp)"
php panini.php 05.0002 liw
echo "166 - Processing of 09.0005 liw started at $(timestamp)"
php panini.php 09.0005 liw
echo "167 - Processing of 10.0475 luN started at $(timestamp)"
php panini.php 10.0475 luN
echo "168 - Processing of 10.0412 luN started at $(timestamp)"
php panini.php 10.0412 luN
echo "169 - Processing of 04.0075 luN started at $(timestamp)"
php panini.php 04.0075 luN
echo "170 - Processing of 10.0439 luN started at $(timestamp)"
php panini.php 10.0439 luN
echo "171 - Processing of 10.0468 luN started at $(timestamp)"
php panini.php 10.0468 luN
echo "172 - Processing of 10.0446 luN started at $(timestamp)"
php panini.php 10.0446 luN
echo "173 - Processing of 06.0158 luN started at $(timestamp)"
php panini.php 06.0158 luN
echo "174 - Processing of 02.0063 ASIrliN started at $(timestamp)"
php panini.php 02.0063 ASIrliN
echo '</forms>' >> generatedforms.xml
cd scripts
python comparedb.py ../generatedforms.xml ../suspectverbforms.txt
