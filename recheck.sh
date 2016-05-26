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
echo "1 - Processing 07.0316 law analysis started at $(timestamp)"
php panini.php 07.0316 law
echo "2 - Processing 07.0316 liw analysis started at $(timestamp)"
php panini.php 07.0316 liw
echo "3 - Processing 02.0041 liw analysis started at $(timestamp)"
php panini.php 02.0041 liw
echo "4 - Processing 01.0546 liw analysis started at $(timestamp)"
php panini.php 01.0546 liw
echo "5 - Processing 01.0149 liw analysis started at $(timestamp)"
php panini.php 01.0149 liw
echo "6 - Processing 01.0208 liw analysis started at $(timestamp)"
php panini.php 01.0208 liw
echo "7 - Processing 01.0588 liw analysis started at $(timestamp)"
php panini.php 01.0588 liw
echo "8 - Processing 01.0137 liw analysis started at $(timestamp)"
php panini.php 01.0137 liw
echo "9 - Processing 06.0015 liw analysis started at $(timestamp)"
php panini.php 06.0015 liw
echo "10 - Processing 01.0244 liw analysis started at $(timestamp)"
php panini.php 01.0244 liw
echo "11 - Processing 07.0020 viDiliN analysis started at $(timestamp)"
php panini.php 07.0020 viDiliN
echo "12 - Processing 01.0650 liw analysis started at $(timestamp)"
php panini.php 01.0650 liw
echo "13 - Processing 01.0792 liw analysis started at $(timestamp)"
php panini.php 01.0792 liw
echo "14 - Processing 01.0391 liw analysis started at $(timestamp)"
php panini.php 01.0391 liw
echo "15 - Processing 01.0779 liw analysis started at $(timestamp)"
php panini.php 01.0779 liw
echo "16 - Processing 05.0038 law analysis started at $(timestamp)"
php panini.php 05.0038 law
echo "17 - Processing 08.0005 law analysis started at $(timestamp)"
php panini.php 08.0005 law
echo "18 - Processing 08.0005 laN analysis started at $(timestamp)"
php panini.php 08.0005 laN
echo "19 - Processing 08.0005 viDiliN analysis started at $(timestamp)"
php panini.php 08.0005 viDiliN
echo "20 - Processing 06.0041 liw analysis started at $(timestamp)"
php panini.php 06.0041 liw
echo "21 - Processing 09.0032 liw analysis started at $(timestamp)"
php panini.php 09.0032 liw
echo "22 - Processing 01.0129 liw analysis started at $(timestamp)"
php panini.php 01.0129 liw
echo "23 - Processing 01.0523 liw analysis started at $(timestamp)"
php panini.php 01.0523 liw
echo "24 - Processing 02.0014 low analysis started at $(timestamp)"
php panini.php 02.0014 low
echo "25 - Processing 02.0014 laN analysis started at $(timestamp)"
php panini.php 02.0014 laN
echo "26 - Processing 03.0021 law analysis started at $(timestamp)"
php panini.php 03.0021 law
echo "27 - Processing 03.0021 liw analysis started at $(timestamp)"
php panini.php 03.0021 liw
echo "28 - Processing 03.0021 luw analysis started at $(timestamp)"
php panini.php 03.0021 luw
echo "29 - Processing 03.0021 lfw analysis started at $(timestamp)"
php panini.php 03.0021 lfw
echo "30 - Processing 03.0021 low analysis started at $(timestamp)"
php panini.php 03.0021 low
echo "31 - Processing 03.0021 laN analysis started at $(timestamp)"
php panini.php 03.0021 laN
echo "32 - Processing 03.0021 ASIrliN analysis started at $(timestamp)"
php panini.php 03.0021 ASIrliN
echo "33 - Processing 03.0021 viDiliN analysis started at $(timestamp)"
php panini.php 03.0021 viDiliN
echo "34 - Processing 03.0021 luN analysis started at $(timestamp)"
php panini.php 03.0021 luN
echo "35 - Processing 03.0021 lfN analysis started at $(timestamp)"
php panini.php 03.0021 lfN
echo "36 - Processing 01.1148 law analysis started at $(timestamp)"
php panini.php 01.1148 law
echo "37 - Processing 01.1148 liw analysis started at $(timestamp)"
php panini.php 01.1148 liw
echo "38 - Processing 01.1148 luw analysis started at $(timestamp)"
php panini.php 01.1148 luw
echo "39 - Processing 01.1148 lfw analysis started at $(timestamp)"
php panini.php 01.1148 lfw
echo "40 - Processing 01.1148 low analysis started at $(timestamp)"
php panini.php 01.1148 low
echo "41 - Processing 01.1148 laN analysis started at $(timestamp)"
php panini.php 01.1148 laN
echo "42 - Processing 01.1148 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1148 ASIrliN
echo "43 - Processing 01.1148 viDiliN analysis started at $(timestamp)"
php panini.php 01.1148 viDiliN
echo "44 - Processing 01.1148 luN analysis started at $(timestamp)"
php panini.php 01.1148 luN
echo "45 - Processing 01.1148 lfN analysis started at $(timestamp)"
php panini.php 01.1148 lfN
echo "46 - Processing 09.0050 low analysis started at $(timestamp)"
php panini.php 09.0050 low
echo "47 - Processing 09.0050 laN analysis started at $(timestamp)"
php panini.php 09.0050 laN
echo "48 - Processing 10.0278 liw analysis started at $(timestamp)"
php panini.php 10.0278 liw
echo "49 - Processing 10.0278 luN analysis started at $(timestamp)"
php panini.php 10.0278 luN
echo "50 - Processing 01.0866 liw analysis started at $(timestamp)"
php panini.php 01.0866 liw
echo "51 - Processing 01.0866 luw analysis started at $(timestamp)"
php panini.php 01.0866 luw
echo "52 - Processing 01.0866 lfw analysis started at $(timestamp)"
php panini.php 01.0866 lfw
echo "53 - Processing 01.0866 luN analysis started at $(timestamp)"
php panini.php 01.0866 luN
echo "54 - Processing 09.0018 liw analysis started at $(timestamp)"
php panini.php 09.0018 liw
echo "55 - Processing 09.0018 luN analysis started at $(timestamp)"
php panini.php 09.0018 luN
echo "56 - Processing 01.1064 liw analysis started at $(timestamp)"
php panini.php 01.1064 liw
echo "57 - Processing 09.0012 luw analysis started at $(timestamp)"
php panini.php 09.0012 luw
echo "58 - Processing 09.0012 lfw analysis started at $(timestamp)"
php panini.php 09.0012 lfw
echo "59 - Processing 09.0058 luN analysis started at $(timestamp)"
php panini.php 09.0058 luN
echo "60 - Processing 01.1113 luw analysis started at $(timestamp)"
php panini.php 01.1113 luw
echo "61 - Processing 01.1113 lfw analysis started at $(timestamp)"
php panini.php 01.1113 lfw
echo "62 - Processing 01.1113 luN analysis started at $(timestamp)"
php panini.php 01.1113 luN
echo "63 - Processing 05.0033 luN analysis started at $(timestamp)"
php panini.php 05.0033 luN
echo "64 - Processing 06.0005 luN analysis started at $(timestamp)"
php panini.php 06.0005 luN
echo "65 - Processing 06.0070 viDiliN analysis started at $(timestamp)"
php panini.php 06.0070 viDiliN
echo "66 - Processing 09.0068 law analysis started at $(timestamp)"
php panini.php 09.0068 law
echo "67 - Processing 09.0068 low analysis started at $(timestamp)"
php panini.php 09.0068 low
echo "68 - Processing 09.0068 laN analysis started at $(timestamp)"
php panini.php 09.0068 laN
echo "69 - Processing 09.0068 viDiliN analysis started at $(timestamp)"
php panini.php 09.0068 viDiliN
echo "70 - Processing 06.0068 viDiliN analysis started at $(timestamp)"
php panini.php 06.0068 viDiliN
echo "71 - Processing 10.0414 luN analysis started at $(timestamp)"
php panini.php 10.0414 luN
echo "72 - Processing 01.1101 law analysis started at $(timestamp)"
php panini.php 01.1101 law
echo "73 - Processing 01.1101 low analysis started at $(timestamp)"
php panini.php 01.1101 low
echo "74 - Processing 01.1101 laN analysis started at $(timestamp)"
php panini.php 01.1101 laN
echo "75 - Processing 03.0026 viDiliN analysis started at $(timestamp)"
php panini.php 03.0026 viDiliN
echo "76 - Processing 06.0134 liw analysis started at $(timestamp)"
php panini.php 06.0134 liw
echo "77 - Processing 06.0134 luN analysis started at $(timestamp)"
php panini.php 06.0134 luN
echo "78 - Processing 04.0014 law analysis started at $(timestamp)"
php panini.php 04.0014 law
echo "79 - Processing 09.0053 low analysis started at $(timestamp)"
php panini.php 09.0053 low
echo "80 - Processing 01.1125 liw analysis started at $(timestamp)"
php panini.php 01.1125 liw
echo "81 - Processing 01.1125 viDiliN analysis started at $(timestamp)"
php panini.php 01.1125 viDiliN
echo "82 - Processing 01.1125 luN analysis started at $(timestamp)"
php panini.php 01.1125 luN
echo "83 - Processing 01.0461 liw analysis started at $(timestamp)"
php panini.php 01.0461 liw
echo "84 - Processing 01.0461 luw analysis started at $(timestamp)"
php panini.php 01.0461 luw
echo "85 - Processing 01.0461 lfw analysis started at $(timestamp)"
php panini.php 01.0461 lfw
echo "86 - Processing 01.0461 low analysis started at $(timestamp)"
php panini.php 01.0461 low
echo "87 - Processing 01.0461 laN analysis started at $(timestamp)"
php panini.php 01.0461 laN
echo "88 - Processing 01.0461 viDiliN analysis started at $(timestamp)"
php panini.php 01.0461 viDiliN
echo "89 - Processing 01.0461 luN analysis started at $(timestamp)"
php panini.php 01.0461 luN
echo "90 - Processing 01.0461 lfN analysis started at $(timestamp)"
php panini.php 01.0461 lfN
echo "91 - Processing 06.0131 liw analysis started at $(timestamp)"
php panini.php 06.0131 liw
echo "92 - Processing 01.0023 liw analysis started at $(timestamp)"
php panini.php 01.0023 liw
echo "93 - Processing 01.0023 low analysis started at $(timestamp)"
php panini.php 01.0023 low
echo "94 - Processing 01.0023 laN analysis started at $(timestamp)"
php panini.php 01.0023 laN
echo "95 - Processing 01.0023 viDiliN analysis started at $(timestamp)"
php panini.php 01.0023 viDiliN
echo "96 - Processing 01.0023 luN analysis started at $(timestamp)"
php panini.php 01.0023 luN
echo "97 - Processing 01.1043 luN analysis started at $(timestamp)"
php panini.php 01.1043 luN
echo "98 - Processing 01.0737 liw analysis started at $(timestamp)"
php panini.php 01.0737 liw
echo "99 - Processing 01.0737 luN analysis started at $(timestamp)"
php panini.php 01.0737 luN
echo "100 - Processing 01.1087 liw analysis started at $(timestamp)"
php panini.php 01.1087 liw
echo "101 - Processing 01.1087 luN analysis started at $(timestamp)"
php panini.php 01.1087 luN
echo "102 - Processing 01.0427 laN analysis started at $(timestamp)"
php panini.php 01.0427 laN
echo "103 - Processing 10.0362 luN analysis started at $(timestamp)"
php panini.php 10.0362 luN
echo "104 - Processing 09.0375 low analysis started at $(timestamp)"
php panini.php 09.0375 low
echo "105 - Processing 09.0375 laN analysis started at $(timestamp)"
php panini.php 09.0375 laN
echo "106 - Processing 01.0224 law analysis started at $(timestamp)"
php panini.php 01.0224 law
echo "107 - Processing 01.0505 low analysis started at $(timestamp)"
php panini.php 01.0505 low
echo "108 - Processing 01.0503 low analysis started at $(timestamp)"
php panini.php 01.0503 low
echo "109 - Processing 03.0152 viDiliN analysis started at $(timestamp)"
php panini.php 03.0152 viDiliN
echo "110 - Processing 08.0007 laN analysis started at $(timestamp)"
php panini.php 08.0007 laN
echo "111 - Processing 01.0504 law analysis started at $(timestamp)"
php panini.php 01.0504 law
echo "112 - Processing 01.1107 luN analysis started at $(timestamp)"
php panini.php 01.1107 luN
echo "113 - Processing 01.1023 liw analysis started at $(timestamp)"
php panini.php 01.1023 liw
echo "114 - Processing 01.1022 luN analysis started at $(timestamp)"
php panini.php 01.1022 luN
echo "115 - Processing 10.0275 luN analysis started at $(timestamp)"
php panini.php 10.0275 luN
echo "116 - Processing 06.0120 liw analysis started at $(timestamp)"
php panini.php 06.0120 liw
echo "117 - Processing 07.0352 law analysis started at $(timestamp)"
php panini.php 07.0352 law
echo "118 - Processing 07.0352 luN analysis started at $(timestamp)"
php panini.php 07.0352 luN
echo "119 - Processing 04.0041 liw analysis started at $(timestamp)"
php panini.php 04.0041 liw
echo "120 - Processing 04.0041 luN analysis started at $(timestamp)"
php panini.php 04.0041 luN
echo "121 - Processing 03.0025 low analysis started at $(timestamp)"
php panini.php 03.0025 low
echo "122 - Processing 03.0025 laN analysis started at $(timestamp)"
php panini.php 03.0025 laN
echo "123 - Processing 01.0453 luN analysis started at $(timestamp)"
php panini.php 01.0453 luN
echo "124 - Processing 01.1098 liw analysis started at $(timestamp)"
php panini.php 01.1098 liw
echo "125 - Processing 01.1098 luw analysis started at $(timestamp)"
php panini.php 01.1098 luw
echo "126 - Processing 01.1098 laN analysis started at $(timestamp)"
php panini.php 01.1098 laN
echo "127 - Processing 01.1098 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1098 ASIrliN
echo "128 - Processing 01.1098 viDiliN analysis started at $(timestamp)"
php panini.php 01.1098 viDiliN
echo "129 - Processing 01.1098 luN analysis started at $(timestamp)"
php panini.php 01.1098 luN
echo "130 - Processing 01.1110 law analysis started at $(timestamp)"
php panini.php 01.1110 law
echo "131 - Processing 01.1110 liw analysis started at $(timestamp)"
php panini.php 01.1110 liw
echo "132 - Processing 01.1110 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1110 ASIrliN
echo "133 - Processing 01.1110 luN analysis started at $(timestamp)"
php panini.php 01.1110 luN
echo "134 - Processing 06.0106 luN analysis started at $(timestamp)"
php panini.php 06.0106 luN
echo "135 - Processing 04.0027 liw analysis started at $(timestamp)"
php panini.php 04.0027 liw
echo "136 - Processing 09.0346 liw analysis started at $(timestamp)"
php panini.php 09.0346 liw
echo "137 - Processing 09.0258 laN analysis started at $(timestamp)"
php panini.php 09.0258 laN
echo "138 - Processing 09.0034 law analysis started at $(timestamp)"
php panini.php 09.0034 law
echo "139 - Processing 09.0034 liw analysis started at $(timestamp)"
php panini.php 09.0034 liw
echo "140 - Processing 09.0034 low analysis started at $(timestamp)"
php panini.php 09.0034 low
echo "141 - Processing 01.0043 luN analysis started at $(timestamp)"
php panini.php 01.0043 luN
echo "142 - Processing 10.0347 luN analysis started at $(timestamp)"
php panini.php 10.0347 luN
echo "143 - Processing 01.1097 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1097 ASIrliN
echo "144 - Processing 01.1097 luN analysis started at $(timestamp)"
php panini.php 01.1097 luN
echo "145 - Processing 09.0028 low analysis started at $(timestamp)"
php panini.php 09.0028 low
echo "146 - Processing 09.0028 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0028 ASIrliN
echo "147 - Processing 04.0026 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0026 ASIrliN
echo "148 - Processing 04.0197 luN analysis started at $(timestamp)"
php panini.php 04.0197 luN
echo "149 - Processing 07.0022 luw analysis started at $(timestamp)"
php panini.php 07.0022 luw
echo "150 - Processing 07.0022 lfw analysis started at $(timestamp)"
php panini.php 07.0022 lfw
echo "151 - Processing 07.0022 viDiliN analysis started at $(timestamp)"
php panini.php 07.0022 viDiliN
echo "152 - Processing 07.0022 lfN analysis started at $(timestamp)"
php panini.php 07.0022 lfN
echo "153 - Processing 01.0420 luN analysis started at $(timestamp)"
php panini.php 01.0420 luN
echo "154 - Processing 02.0029 laN analysis started at $(timestamp)"
php panini.php 02.0029 laN
echo "155 - Processing 02.0029 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0029 ASIrliN
echo "156 - Processing 02.0029 luN analysis started at $(timestamp)"
php panini.php 02.0029 luN
echo "157 - Processing 09.0057 luN analysis started at $(timestamp)"
php panini.php 09.0057 luN
echo "158 - Processing 03.0022 law analysis started at $(timestamp)"
php panini.php 03.0022 law
echo "159 - Processing 03.0022 low analysis started at $(timestamp)"
php panini.php 03.0022 low
echo "160 - Processing 03.0022 laN analysis started at $(timestamp)"
php panini.php 03.0022 laN
echo "161 - Processing 01.0838 luN analysis started at $(timestamp)"
php panini.php 01.0838 luN
echo "162 - Processing 08.0006 law analysis started at $(timestamp)"
php panini.php 08.0006 law
echo "163 - Processing 08.0006 low analysis started at $(timestamp)"
php panini.php 08.0006 low
echo "164 - Processing 08.0006 laN analysis started at $(timestamp)"
php panini.php 08.0006 laN
echo "165 - Processing 07.0009 luN analysis started at $(timestamp)"
php panini.php 07.0009 luN
echo "166 - Processing 05.0351 luN analysis started at $(timestamp)"
php panini.php 05.0351 luN
echo "167 - Processing 06.0029 viDiliN analysis started at $(timestamp)"
php panini.php 06.0029 viDiliN
echo "168 - Processing 06.0031 luN analysis started at $(timestamp)"
php panini.php 06.0031 luN
echo "169 - Processing 06.0075 luN analysis started at $(timestamp)"
php panini.php 06.0075 luN
echo "170 - Processing 06.0075 lfN analysis started at $(timestamp)"
php panini.php 06.0075 lfN
echo "171 - Processing 01.0652 liw analysis started at $(timestamp)"
php panini.php 01.0652 liw
echo "172 - Processing 01.0652 luN analysis started at $(timestamp)"
php panini.php 01.0652 luN
echo "173 - Processing 01.0181 law analysis started at $(timestamp)"
php panini.php 01.0181 law
echo "174 - Processing 01.0008 laN analysis started at $(timestamp)"
php panini.php 01.0008 laN
echo "175 - Processing 03.0010 low analysis started at $(timestamp)"
php panini.php 03.0010 low
echo "176 - Processing 03.0010 viDiliN analysis started at $(timestamp)"
php panini.php 03.0010 viDiliN
echo "177 - Processing 01.1149 law analysis started at $(timestamp)"
php panini.php 01.1149 law
echo "178 - Processing 01.1149 liw analysis started at $(timestamp)"
php panini.php 01.1149 liw
echo "179 - Processing 01.1149 luw analysis started at $(timestamp)"
php panini.php 01.1149 luw
echo "180 - Processing 01.1149 lfw analysis started at $(timestamp)"
php panini.php 01.1149 lfw
echo "181 - Processing 01.1149 low analysis started at $(timestamp)"
php panini.php 01.1149 low
echo "182 - Processing 01.1149 laN analysis started at $(timestamp)"
php panini.php 01.1149 laN
echo "183 - Processing 01.1149 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1149 ASIrliN
echo "184 - Processing 01.1149 viDiliN analysis started at $(timestamp)"
php panini.php 01.1149 viDiliN
echo "185 - Processing 01.1149 luN analysis started at $(timestamp)"
php panini.php 01.1149 luN
echo "186 - Processing 01.1149 lfN analysis started at $(timestamp)"
php panini.php 01.1149 lfN
echo "187 - Processing 02.0005 low analysis started at $(timestamp)"
php panini.php 02.0005 low
echo "188 - Processing 02.0005 laN analysis started at $(timestamp)"
php panini.php 02.0005 laN
echo "189 - Processing 04.0029 luw analysis started at $(timestamp)"
php panini.php 04.0029 luw
echo "190 - Processing 04.0029 lfw analysis started at $(timestamp)"
php panini.php 04.0029 lfw
echo "191 - Processing 05.0476 law analysis started at $(timestamp)"
php panini.php 05.0476 law
echo "192 - Processing 05.0476 laN analysis started at $(timestamp)"
php panini.php 05.0476 laN
echo "193 - Processing 05.0476 viDiliN analysis started at $(timestamp)"
php panini.php 05.0476 viDiliN
echo "194 - Processing 04.0082 law analysis started at $(timestamp)"
php panini.php 04.0082 law
echo "195 - Processing 04.0082 liw analysis started at $(timestamp)"
php panini.php 04.0082 liw
echo "196 - Processing 04.0082 luw analysis started at $(timestamp)"
php panini.php 04.0082 luw
echo "197 - Processing 04.0082 lfw analysis started at $(timestamp)"
php panini.php 04.0082 lfw
echo "198 - Processing 04.0082 low analysis started at $(timestamp)"
php panini.php 04.0082 low
echo "199 - Processing 04.0082 laN analysis started at $(timestamp)"
php panini.php 04.0082 laN
echo "200 - Processing 04.0082 viDiliN analysis started at $(timestamp)"
php panini.php 04.0082 viDiliN
echo "201 - Processing 02.0004 low analysis started at $(timestamp)"
php panini.php 02.0004 low
echo "202 - Processing 02.0004 laN analysis started at $(timestamp)"
php panini.php 02.0004 laN
echo "203 - Processing 02.0004 lfN analysis started at $(timestamp)"
php panini.php 02.0004 lfN
echo "204 - Processing 06.0356 luN analysis started at $(timestamp)"
php panini.php 06.0356 luN
echo "205 - Processing 06.0037 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0037 ASIrliN
echo "206 - Processing 01.0920 law analysis started at $(timestamp)"
php panini.php 01.0920 law
echo "207 - Processing 05.0037 law analysis started at $(timestamp)"
php panini.php 05.0037 law
echo "208 - Processing 05.0037 low analysis started at $(timestamp)"
php panini.php 05.0037 low
echo "209 - Processing 05.0037 laN analysis started at $(timestamp)"
php panini.php 05.0037 laN
echo "210 - Processing 05.0037 viDiliN analysis started at $(timestamp)"
php panini.php 05.0037 viDiliN
echo "211 - Processing 01.1143 luN analysis started at $(timestamp)"
php panini.php 01.1143 luN
echo "212 - Processing 01.1053 liw analysis started at $(timestamp)"
php panini.php 01.1053 liw
echo "213 - Processing 04.0094 luN analysis started at $(timestamp)"
php panini.php 04.0094 luN
echo "214 - Processing 09.0013 luw analysis started at $(timestamp)"
php panini.php 09.0013 luw
echo "215 - Processing 09.0013 lfw analysis started at $(timestamp)"
php panini.php 09.0013 lfw
echo "216 - Processing 02.0003 law analysis started at $(timestamp)"
php panini.php 02.0003 law
echo "217 - Processing 01.1083 luN analysis started at $(timestamp)"
php panini.php 01.1083 luN
echo "218 - Processing 03.0024 low analysis started at $(timestamp)"
php panini.php 03.0024 low
echo "219 - Processing 03.0011 low analysis started at $(timestamp)"
php panini.php 03.0011 low
echo "220 - Processing 03.0011 viDiliN analysis started at $(timestamp)"
php panini.php 03.0011 viDiliN
echo "221 - Processing 03.0011 luN analysis started at $(timestamp)"
php panini.php 03.0011 luN
echo "222 - Processing 03.0023 low analysis started at $(timestamp)"
php panini.php 03.0023 low
echo "223 - Processing 03.0023 laN analysis started at $(timestamp)"
php panini.php 03.0023 laN
echo "224 - Processing 03.0023 luN analysis started at $(timestamp)"
php panini.php 03.0023 luN
echo "225 - Processing 01.0654 liw analysis started at $(timestamp)"
php panini.php 01.0654 liw
echo "226 - Processing 10.0010 luw analysis started at $(timestamp)"
php panini.php 10.0010 luw
echo "227 - Processing 10.0010 lfw analysis started at $(timestamp)"
php panini.php 10.0010 lfw
echo "228 - Processing 10.0010 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0010 ASIrliN
echo "229 - Processing 10.0010 luN analysis started at $(timestamp)"
php panini.php 10.0010 luN
echo "230 - Processing 10.0010 lfN analysis started at $(timestamp)"
php panini.php 10.0010 lfN
echo "231 - Processing 01.0462 viDiliN analysis started at $(timestamp)"
php panini.php 01.0462 viDiliN
echo "232 - Processing 10.0140 luN analysis started at $(timestamp)"
php panini.php 10.0140 luN
echo "233 - Processing 09.0029 liw analysis started at $(timestamp)"
php panini.php 09.0029 liw
echo "234 - Processing 09.0029 laN analysis started at $(timestamp)"
php panini.php 09.0029 laN
echo "235 - Processing 09.0029 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0029 ASIrliN
echo "236 - Processing 09.0029 lfN analysis started at $(timestamp)"
php panini.php 09.0029 lfN
echo "237 - Processing 01.1050 luN analysis started at $(timestamp)"
php panini.php 01.1050 luN
echo "238 - Processing 09.0270 low analysis started at $(timestamp)"
php panini.php 09.0270 low
echo "239 - Processing 06.0135 luN analysis started at $(timestamp)"
php panini.php 06.0135 luN
echo "240 - Processing 01.1055 lfN analysis started at $(timestamp)"
php panini.php 01.1055 lfN
echo "241 - Processing 01.0858 luN analysis started at $(timestamp)"
php panini.php 01.0858 luN
echo "242 - Processing 02.0017 liw analysis started at $(timestamp)"
php panini.php 02.0017 liw
echo "243 - Processing 03.0012 viDiliN analysis started at $(timestamp)"
php panini.php 03.0012 viDiliN
echo "244 - Processing 01.0796 liw analysis started at $(timestamp)"
php panini.php 01.0796 liw
echo "245 - Processing 01.1151 liw analysis started at $(timestamp)"
php panini.php 01.1151 liw
echo "246 - Processing 01.1151 luN analysis started at $(timestamp)"
php panini.php 01.1151 luN
echo "247 - Processing 01.0507 luN analysis started at $(timestamp)"
php panini.php 01.0507 luN
echo "248 - Processing 04.0065 luN analysis started at $(timestamp)"
php panini.php 04.0065 luN
echo "249 - Processing 01.0508 luN analysis started at $(timestamp)"
php panini.php 01.0508 luN
echo "250 - Processing 10.0059 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0059 ASIrliN
echo "251 - Processing 01.0657 liw analysis started at $(timestamp)"
php panini.php 01.0657 liw
echo "252 - Processing 05.0013 laN analysis started at $(timestamp)"
php panini.php 05.0013 laN
echo "253 - Processing 06.0138 luw analysis started at $(timestamp)"
php panini.php 06.0138 luw
echo "254 - Processing 09.0021 low analysis started at $(timestamp)"
php panini.php 09.0021 low
echo "255 - Processing 09.0021 laN analysis started at $(timestamp)"
php panini.php 09.0021 laN
echo "256 - Processing 04.0068 luN analysis started at $(timestamp)"
php panini.php 04.0068 luN
echo "257 - Processing 01.1016 luN analysis started at $(timestamp)"
php panini.php 01.1016 luN
echo "258 - Processing 01.1017 luN analysis started at $(timestamp)"
php panini.php 01.1017 luN
echo "259 - Processing 02.0039 liw analysis started at $(timestamp)"
php panini.php 02.0039 liw
echo "260 - Processing 09.0038 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0038 ASIrliN
echo "261 - Processing 09.0038 luN analysis started at $(timestamp)"
php panini.php 09.0038 luN
echo "262 - Processing 01.1153 liw analysis started at $(timestamp)"
php panini.php 01.1153 liw
echo "263 - Processing 07.0290 luN analysis started at $(timestamp)"
php panini.php 07.0290 luN
echo "264 - Processing 04.0113 liw analysis started at $(timestamp)"
php panini.php 04.0113 liw
echo "265 - Processing 03.0019 law analysis started at $(timestamp)"
php panini.php 03.0019 law
echo "266 - Processing 03.0019 liw analysis started at $(timestamp)"
php panini.php 03.0019 liw
echo "267 - Processing 03.0019 low analysis started at $(timestamp)"
php panini.php 03.0019 low
echo "268 - Processing 03.0019 laN analysis started at $(timestamp)"
php panini.php 03.0019 laN
echo "269 - Processing 03.0019 viDiliN analysis started at $(timestamp)"
php panini.php 03.0019 viDiliN
echo "270 - Processing 06.0153 viDiliN analysis started at $(timestamp)"
php panini.php 06.0153 viDiliN
echo "271 - Processing 10.0382 luN analysis started at $(timestamp)"
php panini.php 10.0382 luN
echo "272 - Processing 10.0277 luN analysis started at $(timestamp)"
php panini.php 10.0277 luN
echo "273 - Processing 03.0318 liw analysis started at $(timestamp)"
php panini.php 03.0318 liw
echo "274 - Processing 06.0129 lfw analysis started at $(timestamp)"
php panini.php 06.0129 lfw
echo "275 - Processing 06.0129 lfN analysis started at $(timestamp)"
php panini.php 06.0129 lfN
echo "276 - Processing 06.0004 liw analysis started at $(timestamp)"
php panini.php 06.0004 liw
echo "277 - Processing 06.0004 viDiliN analysis started at $(timestamp)"
php panini.php 06.0004 viDiliN
echo "278 - Processing 06.0004 luN analysis started at $(timestamp)"
php panini.php 06.0004 luN
echo "279 - Processing 09.0041 liw analysis started at $(timestamp)"
php panini.php 09.0041 liw
echo "280 - Processing 01.0094 luN analysis started at $(timestamp)"
php panini.php 01.0094 luN
echo "281 - Processing 06.0151 luw analysis started at $(timestamp)"
php panini.php 06.0151 luw
echo "282 - Processing 06.0151 lfw analysis started at $(timestamp)"
php panini.php 06.0151 lfw
echo "283 - Processing 06.0151 luN analysis started at $(timestamp)"
php panini.php 06.0151 luN
echo "284 - Processing 09.0047 low analysis started at $(timestamp)"
php panini.php 09.0047 low
echo "285 - Processing 09.0047 laN analysis started at $(timestamp)"
php panini.php 09.0047 laN
echo "286 - Processing 02.0057 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0057 ASIrliN
echo "287 - Processing 05.0004 luw analysis started at $(timestamp)"
php panini.php 05.0004 luw
echo "288 - Processing 05.0004 lfw analysis started at $(timestamp)"
php panini.php 05.0004 lfw
echo "289 - Processing 06.0017 liw analysis started at $(timestamp)"
php panini.php 06.0017 liw
echo "290 - Processing 01.1008 luw analysis started at $(timestamp)"
php panini.php 01.1008 luw
echo "291 - Processing 01.1008 lfw analysis started at $(timestamp)"
php panini.php 01.1008 lfw
echo "292 - Processing 01.1010 luw analysis started at $(timestamp)"
php panini.php 01.1010 luw
echo "293 - Processing 01.1010 lfw analysis started at $(timestamp)"
php panini.php 01.1010 lfw
echo "294 - Processing 06.0165 viDiliN analysis started at $(timestamp)"
php panini.php 06.0165 viDiliN
echo "295 - Processing 10.0032 luN analysis started at $(timestamp)"
php panini.php 10.0032 luN
echo "296 - Processing 09.0361 luw analysis started at $(timestamp)"
php panini.php 09.0361 luw
echo "297 - Processing 09.0361 lfw analysis started at $(timestamp)"
php panini.php 09.0361 lfw
echo "298 - Processing 01.0240 liw analysis started at $(timestamp)"
php panini.php 01.0240 liw
echo "299 - Processing 02.0386 law analysis started at $(timestamp)"
php panini.php 02.0386 law
echo "300 - Processing 02.0386 laN analysis started at $(timestamp)"
php panini.php 02.0386 laN
echo "301 - Processing 09.0052 law analysis started at $(timestamp)"
php panini.php 09.0052 law
echo "302 - Processing 09.0052 low analysis started at $(timestamp)"
php panini.php 09.0052 low
echo "303 - Processing 06.0161 lfN analysis started at $(timestamp)"
php panini.php 06.0161 lfN
echo "304 - Processing 01.0223 luN analysis started at $(timestamp)"
php panini.php 01.0223 luN
echo "305 - Processing 01.0329 lfN analysis started at $(timestamp)"
php panini.php 01.0329 lfN
echo "306 - Processing 04.0107 lfN analysis started at $(timestamp)"
php panini.php 04.0107 lfN
echo "307 - Processing 02.0044 liw analysis started at $(timestamp)"
php panini.php 02.0044 liw
echo "308 - Processing 04.0090 liw analysis started at $(timestamp)"
php panini.php 04.0090 liw
echo "309 - Processing 05.0032 luN analysis started at $(timestamp)"
php panini.php 05.0032 luN
echo "310 - Processing 01.0679 lfN analysis started at $(timestamp)"
php panini.php 01.0679 lfN
echo "311 - Processing 06.0169 luN analysis started at $(timestamp)"
php panini.php 06.0169 luN
echo "312 - Processing 09.0343 luN analysis started at $(timestamp)"
php panini.php 09.0343 luN
echo "313 - Processing 10.0058 luN analysis started at $(timestamp)"
php panini.php 10.0058 luN
echo "314 - Processing 01.0547 liw analysis started at $(timestamp)"
php panini.php 01.0547 liw
echo "315 - Processing 01.1160 liw analysis started at $(timestamp)"
php panini.php 01.1160 liw
echo "316 - Processing 10.0205 luN analysis started at $(timestamp)"
php panini.php 10.0205 luN
echo "317 - Processing 01.0321 law analysis started at $(timestamp)"
php panini.php 01.0321 law
echo "318 - Processing 01.0321 liw analysis started at $(timestamp)"
php panini.php 01.0321 liw
echo "319 - Processing 01.0321 luw analysis started at $(timestamp)"
php panini.php 01.0321 luw
echo "320 - Processing 01.0321 lfw analysis started at $(timestamp)"
php panini.php 01.0321 lfw
echo "321 - Processing 01.0321 low analysis started at $(timestamp)"
php panini.php 01.0321 low
echo "322 - Processing 01.0321 laN analysis started at $(timestamp)"
php panini.php 01.0321 laN
echo "323 - Processing 01.0321 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0321 ASIrliN
echo "324 - Processing 01.0321 viDiliN analysis started at $(timestamp)"
php panini.php 01.0321 viDiliN
echo "325 - Processing 01.0321 luN analysis started at $(timestamp)"
php panini.php 01.0321 luN
echo "326 - Processing 01.0321 lfN analysis started at $(timestamp)"
php panini.php 01.0321 lfN
echo "327 - Processing 03.0013 laN analysis started at $(timestamp)"
php panini.php 03.0013 laN
echo "328 - Processing 07.0023 luw analysis started at $(timestamp)"
php panini.php 07.0023 luw
echo "329 - Processing 07.0023 lfw analysis started at $(timestamp)"
php panini.php 07.0023 lfw
echo "330 - Processing 09.0062 low analysis started at $(timestamp)"
php panini.php 09.0062 low
echo "331 - Processing 10.0837 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0837 ASIrliN
echo "332 - Processing 04.0312 lfN analysis started at $(timestamp)"
php panini.php 04.0312 lfN
echo "333 - Processing 06.0073 luN analysis started at $(timestamp)"
php panini.php 06.0073 luN
echo "334 - Processing 09.0019 liw analysis started at $(timestamp)"
php panini.php 09.0019 liw
echo "335 - Processing 09.0019 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0019 ASIrliN
echo "336 - Processing 09.0019 luN analysis started at $(timestamp)"
php panini.php 09.0019 luN
echo "337 - Processing 01.1161 liw analysis started at $(timestamp)"
php panini.php 01.1161 liw
echo "338 - Processing 10.0136 luN analysis started at $(timestamp)"
php panini.php 10.0136 luN
echo "339 - Processing 10.0176 liw analysis started at $(timestamp)"
php panini.php 10.0176 liw
echo "340 - Processing 10.0176 luN analysis started at $(timestamp)"
php panini.php 10.0176 luN
echo "341 - Processing 10.0174 liw analysis started at $(timestamp)"
php panini.php 10.0174 liw
echo "342 - Processing 10.0174 luw analysis started at $(timestamp)"
php panini.php 10.0174 luw
echo "343 - Processing 10.0174 lfw analysis started at $(timestamp)"
php panini.php 10.0174 lfw
echo "344 - Processing 10.0174 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0174 ASIrliN
echo "345 - Processing 10.0174 viDiliN analysis started at $(timestamp)"
php panini.php 10.0174 viDiliN
echo "346 - Processing 10.0174 luN analysis started at $(timestamp)"
php panini.php 10.0174 luN
echo "347 - Processing 10.0174 lfN analysis started at $(timestamp)"
php panini.php 10.0174 lfN
echo "348 - Processing 09.0037 law analysis started at $(timestamp)"
php panini.php 09.0037 law
echo "349 - Processing 09.0037 luw analysis started at $(timestamp)"
php panini.php 09.0037 luw
echo "350 - Processing 09.0037 low analysis started at $(timestamp)"
php panini.php 09.0037 low
echo "351 - Processing 09.0037 laN analysis started at $(timestamp)"
php panini.php 09.0037 laN
echo "352 - Processing 09.0037 viDiliN analysis started at $(timestamp)"
php panini.php 09.0037 viDiliN
echo "353 - Processing 09.0037 luN analysis started at $(timestamp)"
php panini.php 09.0037 luN
echo "354 - Processing 02.0070 law analysis started at $(timestamp)"
php panini.php 02.0070 law
echo "355 - Processing 05.0003 ASIrliN analysis started at $(timestamp)"
php panini.php 05.0003 ASIrliN
echo "356 - Processing 01.0174 liw analysis started at $(timestamp)"
php panini.php 01.0174 liw
echo "357 - Processing 02.0019 law analysis started at $(timestamp)"
php panini.php 02.0019 law
echo "358 - Processing 02.0019 laN analysis started at $(timestamp)"
php panini.php 02.0019 laN
echo "359 - Processing 01.0340 liw analysis started at $(timestamp)"
php panini.php 01.0340 liw
echo "360 - Processing 01.0444 low analysis started at $(timestamp)"
php panini.php 01.0444 low
echo "361 - Processing 04.0061 luN analysis started at $(timestamp)"
php panini.php 04.0061 luN
echo "362 - Processing 06.0062 luw analysis started at $(timestamp)"
php panini.php 06.0062 luw
echo "363 - Processing 06.0062 lfw analysis started at $(timestamp)"
php panini.php 06.0062 lfw
echo "364 - Processing 06.0062 luN analysis started at $(timestamp)"
php panini.php 06.0062 luN
echo "365 - Processing 06.0062 lfN analysis started at $(timestamp)"
php panini.php 06.0062 lfN
echo "366 - Processing 01.0041 luN analysis started at $(timestamp)"
php panini.php 01.0041 luN
echo "367 - Processing 01.0865 lfw analysis started at $(timestamp)"
php panini.php 01.0865 lfw
echo "368 - Processing 09.0374 laN analysis started at $(timestamp)"
php panini.php 09.0374 laN
echo "369 - Processing 09.0048 laN analysis started at $(timestamp)"
php panini.php 09.0048 laN
echo "370 - Processing 09.0003 luw analysis started at $(timestamp)"
php panini.php 09.0003 luw
echo "371 - Processing 09.0003 lfw analysis started at $(timestamp)"
php panini.php 09.0003 lfw
echo "372 - Processing 09.0003 luN analysis started at $(timestamp)"
php panini.php 09.0003 luN
echo "373 - Processing 01.1165 liw analysis started at $(timestamp)"
php panini.php 01.1165 liw
echo "374 - Processing 01.1165 luN analysis started at $(timestamp)"
php panini.php 01.1165 luN
echo "375 - Processing 01.1059 liw analysis started at $(timestamp)"
php panini.php 01.1059 liw
echo "376 - Processing 01.0105 luN analysis started at $(timestamp)"
php panini.php 01.0105 luN
echo "377 - Processing 02.0074 low analysis started at $(timestamp)"
php panini.php 02.0074 low
echo "378 - Processing 02.0074 laN analysis started at $(timestamp)"
php panini.php 02.0074 laN
echo "379 - Processing 05.0024 viDiliN analysis started at $(timestamp)"
php panini.php 05.0024 viDiliN
echo "380 - Processing 05.0024 luN analysis started at $(timestamp)"
php panini.php 05.0024 luN
echo "381 - Processing 06.0170 law analysis started at $(timestamp)"
php panini.php 06.0170 law
echo "382 - Processing 06.0170 low analysis started at $(timestamp)"
php panini.php 06.0170 low
echo "383 - Processing 06.0170 luN analysis started at $(timestamp)"
php panini.php 06.0170 luN
echo "384 - Processing 01.0079 liw analysis started at $(timestamp)"
php panini.php 01.0079 liw
echo "385 - Processing 04.0024 luw analysis started at $(timestamp)"
php panini.php 04.0024 luw
echo "386 - Processing 04.0024 lfw analysis started at $(timestamp)"
php panini.php 04.0024 lfw
echo "387 - Processing 04.0024 luN analysis started at $(timestamp)"
php panini.php 04.0024 luN
echo "388 - Processing 04.0024 lfN analysis started at $(timestamp)"
php panini.php 04.0024 lfN
echo "389 - Processing 03.0018 law analysis started at $(timestamp)"
php panini.php 03.0018 law
echo "390 - Processing 03.0018 low analysis started at $(timestamp)"
php panini.php 03.0018 low
echo "391 - Processing 03.0018 laN analysis started at $(timestamp)"
php panini.php 03.0018 laN
echo "392 - Processing 03.0018 viDiliN analysis started at $(timestamp)"
php panini.php 03.0018 viDiliN
echo "393 - Processing 04.0075 lfw analysis started at $(timestamp)"
php panini.php 04.0075 lfw
echo "394 - Processing 04.0075 lfN analysis started at $(timestamp)"
php panini.php 04.0075 lfN
echo "395 - Processing 01.1134 luN analysis started at $(timestamp)"
php panini.php 01.1134 luN
echo "396 - Processing 09.0009 law analysis started at $(timestamp)"
php panini.php 09.0009 law
echo "397 - Processing 09.0009 liw analysis started at $(timestamp)"
php panini.php 09.0009 liw
echo "398 - Processing 09.0009 luw analysis started at $(timestamp)"
php panini.php 09.0009 luw
echo "399 - Processing 09.0009 lfw analysis started at $(timestamp)"
php panini.php 09.0009 lfw
echo "400 - Processing 09.0009 low analysis started at $(timestamp)"
php panini.php 09.0009 low
echo "401 - Processing 09.0009 laN analysis started at $(timestamp)"
php panini.php 09.0009 laN
echo "402 - Processing 09.0009 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0009 ASIrliN
echo "403 - Processing 09.0009 viDiliN analysis started at $(timestamp)"
php panini.php 09.0009 viDiliN
echo "404 - Processing 09.0009 luN analysis started at $(timestamp)"
php panini.php 09.0009 luN
echo "405 - Processing 09.0009 lfN analysis started at $(timestamp)"
php panini.php 09.0009 lfN
echo "406 - Processing 09.0006 liw analysis started at $(timestamp)"
php panini.php 09.0006 liw
echo "407 - Processing 09.0006 lfw analysis started at $(timestamp)"
php panini.php 09.0006 lfw
echo "408 - Processing 09.0006 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0006 ASIrliN
echo "409 - Processing 09.0010 law analysis started at $(timestamp)"
php panini.php 09.0010 law
echo "410 - Processing 09.0010 luw analysis started at $(timestamp)"
php panini.php 09.0010 luw
echo "411 - Processing 09.0010 lfw analysis started at $(timestamp)"
php panini.php 09.0010 lfw
echo "412 - Processing 09.0010 low analysis started at $(timestamp)"
php panini.php 09.0010 low
echo "413 - Processing 09.0010 laN analysis started at $(timestamp)"
php panini.php 09.0010 laN
echo "414 - Processing 09.0010 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0010 ASIrliN
echo "415 - Processing 09.0010 viDiliN analysis started at $(timestamp)"
php panini.php 09.0010 viDiliN
echo "416 - Processing 09.0010 luN analysis started at $(timestamp)"
php panini.php 09.0010 luN
echo "417 - Processing 09.0010 lfN analysis started at $(timestamp)"
php panini.php 09.0010 lfN
echo "418 - Processing 09.0007 law analysis started at $(timestamp)"
php panini.php 09.0007 law
echo "419 - Processing 09.0007 luw analysis started at $(timestamp)"
php panini.php 09.0007 luw
echo "420 - Processing 09.0007 lfw analysis started at $(timestamp)"
php panini.php 09.0007 lfw
echo "421 - Processing 09.0007 low analysis started at $(timestamp)"
php panini.php 09.0007 low
echo "422 - Processing 09.0007 laN analysis started at $(timestamp)"
php panini.php 09.0007 laN
echo "423 - Processing 09.0007 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0007 ASIrliN
echo "424 - Processing 09.0007 viDiliN analysis started at $(timestamp)"
php panini.php 09.0007 viDiliN
echo "425 - Processing 09.0007 luN analysis started at $(timestamp)"
php panini.php 09.0007 luN
echo "426 - Processing 09.0007 lfN analysis started at $(timestamp)"
php panini.php 09.0007 lfN
echo "427 - Processing 02.0038 liw analysis started at $(timestamp)"
php panini.php 02.0038 liw
echo "428 - Processing 02.0038 luN analysis started at $(timestamp)"
php panini.php 02.0038 luN
echo "429 - Processing 09.0008 law analysis started at $(timestamp)"
php panini.php 09.0008 law
echo "430 - Processing 09.0008 liw analysis started at $(timestamp)"
php panini.php 09.0008 liw
echo "431 - Processing 09.0008 luw analysis started at $(timestamp)"
php panini.php 09.0008 luw
echo "432 - Processing 09.0008 lfw analysis started at $(timestamp)"
php panini.php 09.0008 lfw
echo "433 - Processing 09.0008 low analysis started at $(timestamp)"
php panini.php 09.0008 low
echo "434 - Processing 09.0008 laN analysis started at $(timestamp)"
php panini.php 09.0008 laN
echo "435 - Processing 09.0008 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0008 ASIrliN
echo "436 - Processing 09.0008 viDiliN analysis started at $(timestamp)"
php panini.php 09.0008 viDiliN
echo "437 - Processing 09.0008 luN analysis started at $(timestamp)"
php panini.php 09.0008 luN
echo "438 - Processing 09.0008 lfN analysis started at $(timestamp)"
php panini.php 09.0008 lfN
echo "439 - Processing 05.0006 law analysis started at $(timestamp)"
php panini.php 05.0006 law
echo "440 - Processing 05.0006 low analysis started at $(timestamp)"
php panini.php 05.0006 low
echo "441 - Processing 05.0006 luN analysis started at $(timestamp)"
php panini.php 05.0006 luN
echo "442 - Processing 06.0076 luN analysis started at $(timestamp)"
php panini.php 06.0076 luN
echo "443 - Processing 06.0076 lfN analysis started at $(timestamp)"
php panini.php 06.0076 lfN
echo "444 - Processing 09.0017 liw analysis started at $(timestamp)"
php panini.php 09.0017 liw
echo "445 - Processing 09.0017 luw analysis started at $(timestamp)"
php panini.php 09.0017 luw
echo "446 - Processing 09.0017 luN analysis started at $(timestamp)"
php panini.php 09.0017 luN
echo "447 - Processing 01.1058 liw analysis started at $(timestamp)"
php panini.php 01.1058 liw
echo "448 - Processing 01.0749 liw analysis started at $(timestamp)"
php panini.php 01.0749 liw
echo "449 - Processing 06.0118 lfN analysis started at $(timestamp)"
php panini.php 06.0118 lfN
echo "450 - Processing 05.0014 law analysis started at $(timestamp)"
php panini.php 05.0014 law
echo "451 - Processing 05.0014 low analysis started at $(timestamp)"
php panini.php 05.0014 low
echo "452 - Processing 05.0014 laN analysis started at $(timestamp)"
php panini.php 05.0014 laN
echo "453 - Processing 05.0014 luN analysis started at $(timestamp)"
php panini.php 05.0014 luN
echo "454 - Processing 06.0158 luN analysis started at $(timestamp)"
php panini.php 06.0158 luN
echo "455 - Processing 01.0311 liw analysis started at $(timestamp)"
php panini.php 01.0311 liw
echo "456 - Processing 01.0241 liw analysis started at $(timestamp)"
php panini.php 01.0241 liw
echo "457 - Processing 05.0015 law analysis started at $(timestamp)"
php panini.php 05.0015 law
echo "458 - Processing 01.0919 luN analysis started at $(timestamp)"
php panini.php 01.0919 luN
echo "459 - Processing 01.0459 luN analysis started at $(timestamp)"
php panini.php 01.0459 luN
echo "460 - Processing 01.0861 luN analysis started at $(timestamp)"
php panini.php 01.0861 luN
echo "461 - Processing 01.1068 law analysis started at $(timestamp)"
php panini.php 01.1068 law
echo "462 - Processing 01.1068 liw analysis started at $(timestamp)"
php panini.php 01.1068 liw
echo "463 - Processing 01.0082 liw analysis started at $(timestamp)"
php panini.php 01.0082 liw
echo "464 - Processing 01.1081 lfw analysis started at $(timestamp)"
php panini.php 01.1081 lfw
echo "465 - Processing 01.1081 lfN analysis started at $(timestamp)"
php panini.php 01.1081 lfN
echo "466 - Processing 10.0206 luN analysis started at $(timestamp)"
php panini.php 10.0206 luN
echo "467 - Processing 01.0301 viDiliN analysis started at $(timestamp)"
php panini.php 01.0301 viDiliN
echo "468 - Processing 03.0001 laN analysis started at $(timestamp)"
php panini.php 03.0001 laN
echo "469 - Processing 01.0239 liw analysis started at $(timestamp)"
php panini.php 01.0239 liw
echo "470 - Processing 09.0069 law analysis started at $(timestamp)"
php panini.php 09.0069 law
echo "471 - Processing 09.0069 low analysis started at $(timestamp)"
php panini.php 09.0069 low
echo "472 - Processing 09.0069 laN analysis started at $(timestamp)"
php panini.php 09.0069 laN
echo "473 - Processing 09.0070 law analysis started at $(timestamp)"
php panini.php 09.0070 law
echo "474 - Processing 09.0070 low analysis started at $(timestamp)"
php panini.php 09.0070 low
echo "475 - Processing 09.0070 laN analysis started at $(timestamp)"
php panini.php 09.0070 laN
echo "476 - Processing 01.1163 luw analysis started at $(timestamp)"
php panini.php 01.1163 luw
echo "477 - Processing 01.1163 lfw analysis started at $(timestamp)"
php panini.php 01.1163 lfw
echo "478 - Processing 01.1163 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1163 ASIrliN
echo "479 - Processing 01.1163 luN analysis started at $(timestamp)"
php panini.php 01.1163 luN
echo '</forms>' >> generatedforms.xml
cd scripts
python comparedb.py ../generatedforms.xml ../suspectverbforms.txt
