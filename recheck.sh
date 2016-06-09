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
echo "1 - Processing 10.0460 luN analysis started at $(timestamp)"
php panini.php 10.0460 luN
echo "2 - Processing 10.0474 luN analysis started at $(timestamp)"
php panini.php 10.0474 luN
echo "3 - Processing 02.0041 laN analysis started at $(timestamp)"
php panini.php 02.0041 laN
echo "4 - Processing 02.0041 luN analysis started at $(timestamp)"
php panini.php 02.0041 luN
echo "5 - Processing 02.0041 lfN analysis started at $(timestamp)"
php panini.php 02.0041 lfN
echo "6 - Processing 02.0065 laN analysis started at $(timestamp)"
php panini.php 02.0065 laN
echo "7 - Processing 10.0471 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0471 ASIrliN
echo "8 - Processing 10.0471 luN analysis started at $(timestamp)"
php panini.php 10.0471 luN
echo "9 - Processing 10.0447 luN analysis started at $(timestamp)"
php panini.php 10.0447 luN
echo "10 - Processing 07.0020 viDiliN analysis started at $(timestamp)"
php panini.php 07.0020 viDiliN
echo "11 - Processing 10.0430 luN analysis started at $(timestamp)"
php panini.php 10.0430 luN
echo "12 - Processing 03.0017 laN analysis started at $(timestamp)"
php panini.php 03.0017 laN
echo "13 - Processing 06.0016 liw analysis started at $(timestamp)"
php panini.php 06.0016 liw
echo "14 - Processing 06.0016 luN analysis started at $(timestamp)"
php panini.php 06.0016 luN
echo "15 - Processing 06.0016 lfN analysis started at $(timestamp)"
php panini.php 06.0016 lfN
echo "16 - Processing 08.0005 low analysis started at $(timestamp)"
php panini.php 08.0005 low
echo "17 - Processing 02.0015 liw analysis started at $(timestamp)"
php panini.php 02.0015 liw
echo "18 - Processing 02.0015 luN analysis started at $(timestamp)"
php panini.php 02.0015 luN
echo "19 - Processing 10.0432 luN analysis started at $(timestamp)"
php panini.php 10.0432 luN
echo "20 - Processing 10.0225 luN analysis started at $(timestamp)"
php panini.php 10.0225 luN
echo "21 - Processing 08.0010 low analysis started at $(timestamp)"
php panini.php 08.0010 low
echo "22 - Processing 08.0010 laN analysis started at $(timestamp)"
php panini.php 08.0010 laN
echo "23 - Processing 01.0682 law analysis started at $(timestamp)"
php panini.php 01.0682 law
echo "24 - Processing 01.0682 laN analysis started at $(timestamp)"
php panini.php 01.0682 laN
echo "25 - Processing 06.0006 luN analysis started at $(timestamp)"
php panini.php 06.0006 luN
echo "26 - Processing 01.1145 luN analysis started at $(timestamp)"
php panini.php 01.1145 luN
echo "27 - Processing 10.0437 luN analysis started at $(timestamp)"
php panini.php 10.0437 luN
echo "28 - Processing 04.0007 low analysis started at $(timestamp)"
php panini.php 04.0007 low
echo "29 - Processing 10.0416 luN analysis started at $(timestamp)"
php panini.php 10.0416 luN
echo "30 - Processing 01.1133 law analysis started at $(timestamp)"
php panini.php 01.1133 law
echo "31 - Processing 01.1133 low analysis started at $(timestamp)"
php panini.php 01.1133 low
echo "32 - Processing 01.1133 laN analysis started at $(timestamp)"
php panini.php 01.1133 laN
echo "33 - Processing 01.1133 viDiliN analysis started at $(timestamp)"
php panini.php 01.1133 viDiliN
echo "34 - Processing 10.0413 luN analysis started at $(timestamp)"
php panini.php 10.0413 luN
echo "35 - Processing 10.0415 luN analysis started at $(timestamp)"
php panini.php 10.0415 luN
echo "36 - Processing 10.0204 luN analysis started at $(timestamp)"
php panini.php 10.0204 luN
echo "37 - Processing 01.0461 law analysis started at $(timestamp)"
php panini.php 01.0461 law
echo "38 - Processing 01.0655 liw analysis started at $(timestamp)"
php panini.php 01.0655 liw
echo "39 - Processing 10.0417 luN analysis started at $(timestamp)"
php panini.php 10.0417 luN
echo "40 - Processing 01.0717 liw analysis started at $(timestamp)"
php panini.php 01.0717 liw
echo "41 - Processing 01.0717 luN analysis started at $(timestamp)"
php panini.php 01.0717 luN
echo "42 - Processing 10.0434 luN analysis started at $(timestamp)"
php panini.php 10.0434 luN
echo "43 - Processing 01.0718 liw analysis started at $(timestamp)"
php panini.php 01.0718 liw
echo "44 - Processing 01.0718 luN analysis started at $(timestamp)"
php panini.php 01.0718 luN
echo "45 - Processing 08.0007 law analysis started at $(timestamp)"
php panini.php 08.0007 law
echo "46 - Processing 08.0007 low analysis started at $(timestamp)"
php panini.php 08.0007 low
echo "47 - Processing 01.0453 liw analysis started at $(timestamp)"
php panini.php 01.0453 liw
echo "48 - Processing 02.0067 liw analysis started at $(timestamp)"
php panini.php 02.0067 liw
echo "49 - Processing 02.0067 luN analysis started at $(timestamp)"
php panini.php 02.0067 luN
echo "50 - Processing 10.0324 luN analysis started at $(timestamp)"
php panini.php 10.0324 luN
echo "51 - Processing 09.0346 luN analysis started at $(timestamp)"
php panini.php 09.0346 luN
echo "52 - Processing 09.0028 laN analysis started at $(timestamp)"
php panini.php 09.0028 laN
echo "53 - Processing 01.0756 luN analysis started at $(timestamp)"
php panini.php 01.0756 luN
echo "54 - Processing 07.0022 viDiliN analysis started at $(timestamp)"
php panini.php 07.0022 viDiliN
echo "55 - Processing 07.0022 luN analysis started at $(timestamp)"
php panini.php 07.0022 luN
echo "56 - Processing 10.0454 luN analysis started at $(timestamp)"
php panini.php 10.0454 luN
echo "57 - Processing 06.0116 luN analysis started at $(timestamp)"
php panini.php 06.0116 luN
echo "58 - Processing 08.0006 viDiliN analysis started at $(timestamp)"
php panini.php 08.0006 viDiliN
echo "59 - Processing 10.0011 law analysis started at $(timestamp)"
php panini.php 10.0011 law
echo "60 - Processing 10.0011 liw analysis started at $(timestamp)"
php panini.php 10.0011 liw
echo "61 - Processing 10.0011 luw analysis started at $(timestamp)"
php panini.php 10.0011 luw
echo "62 - Processing 10.0011 lfw analysis started at $(timestamp)"
php panini.php 10.0011 lfw
echo "63 - Processing 10.0011 low analysis started at $(timestamp)"
php panini.php 10.0011 low
echo "64 - Processing 10.0011 laN analysis started at $(timestamp)"
php panini.php 10.0011 laN
echo "65 - Processing 10.0011 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0011 ASIrliN
echo "66 - Processing 10.0011 viDiliN analysis started at $(timestamp)"
php panini.php 10.0011 viDiliN
echo "67 - Processing 10.0011 luN analysis started at $(timestamp)"
php panini.php 10.0011 luN
echo "68 - Processing 10.0011 lfN analysis started at $(timestamp)"
php panini.php 10.0011 lfN
echo "69 - Processing 01.0652 law analysis started at $(timestamp)"
php panini.php 01.0652 law
echo "70 - Processing 01.0652 luw analysis started at $(timestamp)"
php panini.php 01.0652 luw
echo "71 - Processing 01.0652 lfw analysis started at $(timestamp)"
php panini.php 01.0652 lfw
echo "72 - Processing 01.0652 low analysis started at $(timestamp)"
php panini.php 01.0652 low
echo "73 - Processing 01.0652 laN analysis started at $(timestamp)"
php panini.php 01.0652 laN
echo "74 - Processing 01.0652 viDiliN analysis started at $(timestamp)"
php panini.php 01.0652 viDiliN
echo "75 - Processing 01.0652 lfN analysis started at $(timestamp)"
php panini.php 01.0652 lfN
echo "76 - Processing 01.1144 law analysis started at $(timestamp)"
php panini.php 01.1144 law
echo "77 - Processing 01.1144 low analysis started at $(timestamp)"
php panini.php 01.1144 low
echo "78 - Processing 01.1144 laN analysis started at $(timestamp)"
php panini.php 01.1144 laN
echo "79 - Processing 01.1144 viDiliN analysis started at $(timestamp)"
php panini.php 01.1144 viDiliN
echo "80 - Processing 02.0068 viDiliN analysis started at $(timestamp)"
php panini.php 02.0068 viDiliN
echo "81 - Processing 02.0068 luN analysis started at $(timestamp)"
php panini.php 02.0068 luN
echo "82 - Processing 02.0071 laN analysis started at $(timestamp)"
php panini.php 02.0071 laN
echo "83 - Processing 05.0037 ASIrliN analysis started at $(timestamp)"
php panini.php 05.0037 ASIrliN
echo "84 - Processing 03.0011 luN analysis started at $(timestamp)"
php panini.php 03.0011 luN
echo "85 - Processing 01.0677 law analysis started at $(timestamp)"
php panini.php 01.0677 law
echo "86 - Processing 01.0677 laN analysis started at $(timestamp)"
php panini.php 01.0677 laN
echo "87 - Processing 06.0133 luN analysis started at $(timestamp)"
php panini.php 06.0133 luN
echo "88 - Processing 10.0010 luw analysis started at $(timestamp)"
php panini.php 10.0010 luw
echo "89 - Processing 10.0010 lfw analysis started at $(timestamp)"
php panini.php 10.0010 lfw
echo "90 - Processing 10.0010 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0010 ASIrliN
echo "91 - Processing 10.0010 luN analysis started at $(timestamp)"
php panini.php 10.0010 luN
echo "92 - Processing 10.0010 lfN analysis started at $(timestamp)"
php panini.php 10.0010 lfN
echo "93 - Processing 01.0714 liw analysis started at $(timestamp)"
php panini.php 01.0714 liw
echo "94 - Processing 01.0714 luN analysis started at $(timestamp)"
php panini.php 01.0714 luN
echo "95 - Processing 10.0427 luN analysis started at $(timestamp)"
php panini.php 10.0427 luN
echo "96 - Processing 01.1049 liw analysis started at $(timestamp)"
php panini.php 01.1049 liw
echo "97 - Processing 01.0507 law analysis started at $(timestamp)"
php panini.php 01.0507 law
echo "98 - Processing 01.0507 low analysis started at $(timestamp)"
php panini.php 01.0507 low
echo "99 - Processing 01.0507 laN analysis started at $(timestamp)"
php panini.php 01.0507 laN
echo "100 - Processing 01.0507 viDiliN analysis started at $(timestamp)"
php panini.php 01.0507 viDiliN
echo "101 - Processing 01.0507 luN analysis started at $(timestamp)"
php panini.php 01.0507 luN
echo "102 - Processing 01.0508 law analysis started at $(timestamp)"
php panini.php 01.0508 law
echo "103 - Processing 01.0508 low analysis started at $(timestamp)"
php panini.php 01.0508 low
echo "104 - Processing 01.0508 laN analysis started at $(timestamp)"
php panini.php 01.0508 laN
echo "105 - Processing 01.0508 viDiliN analysis started at $(timestamp)"
php panini.php 01.0508 viDiliN
echo "106 - Processing 01.0508 luN analysis started at $(timestamp)"
php panini.php 01.0508 luN
echo "107 - Processing 10.0453 luN analysis started at $(timestamp)"
php panini.php 10.0453 luN
echo "108 - Processing 10.0134 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0134 ASIrliN
echo "109 - Processing 10.0134 luN analysis started at $(timestamp)"
php panini.php 10.0134 luN
echo "110 - Processing 01.0870 liw analysis started at $(timestamp)"
php panini.php 01.0870 liw
echo "111 - Processing 01.0870 luN analysis started at $(timestamp)"
php panini.php 01.0870 luN
echo "112 - Processing 04.0002 liw analysis started at $(timestamp)"
php panini.php 04.0002 liw
echo "113 - Processing 01.1017 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1017 ASIrliN
echo "114 - Processing 01.0519 liw analysis started at $(timestamp)"
php panini.php 01.0519 liw
echo "115 - Processing 02.0039 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0039 ASIrliN
echo "116 - Processing 03.0019 ASIrliN analysis started at $(timestamp)"
php panini.php 03.0019 ASIrliN
echo "117 - Processing 03.0019 luN analysis started at $(timestamp)"
php panini.php 03.0019 luN
echo "118 - Processing 10.0428 luN analysis started at $(timestamp)"
php panini.php 10.0428 luN
echo "119 - Processing 10.0411 luN analysis started at $(timestamp)"
php panini.php 10.0411 luN
echo "120 - Processing 06.0129 liw analysis started at $(timestamp)"
php panini.php 06.0129 liw
echo "121 - Processing 01.0715 liw analysis started at $(timestamp)"
php panini.php 01.0715 liw
echo "122 - Processing 01.0715 luN analysis started at $(timestamp)"
php panini.php 01.0715 luN
echo "123 - Processing 09.0052 laN analysis started at $(timestamp)"
php panini.php 09.0052 laN
echo "124 - Processing 06.0053 luN analysis started at $(timestamp)"
php panini.php 06.0053 luN
echo "125 - Processing 06.0161 luN analysis started at $(timestamp)"
php panini.php 06.0161 luN
echo "126 - Processing 04.0090 luN analysis started at $(timestamp)"
php panini.php 04.0090 luN
echo "127 - Processing 01.0713 luN analysis started at $(timestamp)"
php panini.php 01.0713 luN
echo "128 - Processing 01.0319 law analysis started at $(timestamp)"
php panini.php 01.0319 law
echo "129 - Processing 01.0319 low analysis started at $(timestamp)"
php panini.php 01.0319 low
echo "130 - Processing 01.0319 laN analysis started at $(timestamp)"
php panini.php 01.0319 laN
echo "131 - Processing 01.0319 viDiliN analysis started at $(timestamp)"
php panini.php 01.0319 viDiliN
echo "132 - Processing 10.0479 luN analysis started at $(timestamp)"
php panini.php 10.0479 luN
echo "133 - Processing 10.0482 luN analysis started at $(timestamp)"
php panini.php 10.0482 luN
echo "134 - Processing 10.0307 luN analysis started at $(timestamp)"
php panini.php 10.0307 luN
echo "135 - Processing 10.0308 luN analysis started at $(timestamp)"
php panini.php 10.0308 luN
echo "136 - Processing 10.0058 law analysis started at $(timestamp)"
php panini.php 10.0058 law
echo "137 - Processing 10.0058 liw analysis started at $(timestamp)"
php panini.php 10.0058 liw
echo "138 - Processing 10.0058 luw analysis started at $(timestamp)"
php panini.php 10.0058 luw
echo "139 - Processing 10.0058 lfw analysis started at $(timestamp)"
php panini.php 10.0058 lfw
echo "140 - Processing 10.0058 low analysis started at $(timestamp)"
php panini.php 10.0058 low
echo "141 - Processing 10.0058 laN analysis started at $(timestamp)"
php panini.php 10.0058 laN
echo "142 - Processing 10.0058 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0058 ASIrliN
echo "143 - Processing 10.0058 viDiliN analysis started at $(timestamp)"
php panini.php 10.0058 viDiliN
echo "144 - Processing 10.0058 lfN analysis started at $(timestamp)"
php panini.php 10.0058 lfN
echo "145 - Processing 02.0380 liw analysis started at $(timestamp)"
php panini.php 02.0380 liw
echo "146 - Processing 01.1164 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1164 ASIrliN
echo "147 - Processing 01.1158 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1158 ASIrliN
echo "148 - Processing 02.0075 low analysis started at $(timestamp)"
php panini.php 02.0075 low
echo "149 - Processing 02.0111 liw analysis started at $(timestamp)"
php panini.php 02.0111 liw
echo "150 - Processing 01.1160 liw analysis started at $(timestamp)"
php panini.php 01.1160 liw
echo "151 - Processing 07.0023 liw analysis started at $(timestamp)"
php panini.php 07.0023 liw
echo "152 - Processing 07.0023 luN analysis started at $(timestamp)"
php panini.php 07.0023 luN
echo "153 - Processing 07.0023 lfN analysis started at $(timestamp)"
php panini.php 07.0023 lfN
echo "154 - Processing 06.0013 liw analysis started at $(timestamp)"
php panini.php 06.0013 liw
echo "155 - Processing 10.0445 luN analysis started at $(timestamp)"
php panini.php 10.0445 luN
echo "156 - Processing 10.0421 luN analysis started at $(timestamp)"
php panini.php 10.0421 luN
echo "157 - Processing 10.0419 luN analysis started at $(timestamp)"
php panini.php 10.0419 luN
echo "158 - Processing 10.0444 luN analysis started at $(timestamp)"
php panini.php 10.0444 luN
echo "159 - Processing 01.0865 luN analysis started at $(timestamp)"
php panini.php 01.0865 luN
echo "160 - Processing 09.0374 low analysis started at $(timestamp)"
php panini.php 09.0374 low
echo "161 - Processing 09.0048 low analysis started at $(timestamp)"
php panini.php 09.0048 low
echo "162 - Processing 01.1165 liw analysis started at $(timestamp)"
php panini.php 01.1165 liw
echo "163 - Processing 02.0074 low analysis started at $(timestamp)"
php panini.php 02.0074 low
echo "164 - Processing 02.0074 laN analysis started at $(timestamp)"
php panini.php 02.0074 laN
echo "165 - Processing 10.0433 luN analysis started at $(timestamp)"
php panini.php 10.0433 luN
echo "166 - Processing 10.0467 luN analysis started at $(timestamp)"
php panini.php 10.0467 luN
echo "167 - Processing 10.0429 luN analysis started at $(timestamp)"
php panini.php 10.0429 luN
echo "168 - Processing 10.0407 luN analysis started at $(timestamp)"
php panini.php 10.0407 luN
echo "169 - Processing 10.0420 luN analysis started at $(timestamp)"
php panini.php 10.0420 luN
echo "170 - Processing 05.0002 liw analysis started at $(timestamp)"
php panini.php 05.0002 liw
echo "171 - Processing 09.0005 liw analysis started at $(timestamp)"
php panini.php 09.0005 liw
echo "172 - Processing 10.0475 luN analysis started at $(timestamp)"
php panini.php 10.0475 luN
echo "173 - Processing 10.0412 luN analysis started at $(timestamp)"
php panini.php 10.0412 luN
echo "174 - Processing 04.0075 luN analysis started at $(timestamp)"
php panini.php 04.0075 luN
echo "175 - Processing 10.0439 luN analysis started at $(timestamp)"
php panini.php 10.0439 luN
echo "176 - Processing 10.0468 luN analysis started at $(timestamp)"
php panini.php 10.0468 luN
echo "177 - Processing 10.0446 luN analysis started at $(timestamp)"
php panini.php 10.0446 luN
echo "178 - Processing 06.0158 luN analysis started at $(timestamp)"
php panini.php 06.0158 luN
echo "179 - Processing 02.0063 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0063 ASIrliN
echo '</forms>' >> generatedforms.xml
cd scripts
python comparedb.py ../generatedforms.xml ../suspectverbforms.txt
