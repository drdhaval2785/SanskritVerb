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
echo "1 - Processing 10.0460 liw analysis started at $(timestamp)"
php panini.php 10.0460 liw
echo "2 - Processing 01.0092 luN analysis started at $(timestamp)"
php panini.php 01.0092 luN
echo "3 - Processing 01.0115 liw analysis started at $(timestamp)"
php panini.php 01.0115 liw
echo "4 - Processing 01.0115 luN analysis started at $(timestamp)"
php panini.php 01.0115 luN
echo "5 - Processing 01.0999 liw analysis started at $(timestamp)"
php panini.php 01.0999 liw
echo "6 - Processing 01.0999 luN analysis started at $(timestamp)"
php panini.php 01.0999 luN
echo "7 - Processing 01.0262 liw analysis started at $(timestamp)"
php panini.php 01.0262 liw
echo "8 - Processing 01.1000 liw analysis started at $(timestamp)"
php panini.php 01.1000 liw
echo "9 - Processing 01.0998 liw analysis started at $(timestamp)"
php panini.php 01.0998 liw
echo "10 - Processing 01.0215 liw analysis started at $(timestamp)"
php panini.php 01.0215 liw
echo "11 - Processing 07.0316 law analysis started at $(timestamp)"
php panini.php 07.0316 law
echo "12 - Processing 07.0316 liw analysis started at $(timestamp)"
php panini.php 07.0316 liw
echo "13 - Processing 07.0316 luw analysis started at $(timestamp)"
php panini.php 07.0316 luw
echo "14 - Processing 07.0316 lfw analysis started at $(timestamp)"
php panini.php 07.0316 lfw
echo "15 - Processing 01.0332 liw analysis started at $(timestamp)"
php panini.php 01.0332 liw
echo "16 - Processing 01.0287 liw analysis started at $(timestamp)"
php panini.php 01.0287 liw
echo "17 - Processing 01.0287 luN analysis started at $(timestamp)"
php panini.php 01.0287 luN
echo "18 - Processing 01.0414 liw analysis started at $(timestamp)"
php panini.php 01.0414 liw
echo "19 - Processing 01.0403 liw analysis started at $(timestamp)"
php panini.php 01.0403 liw
echo "20 - Processing 01.0512 liw analysis started at $(timestamp)"
php panini.php 01.0512 liw
echo "21 - Processing 04.0071 liw analysis started at $(timestamp)"
php panini.php 04.0071 liw
echo "22 - Processing 01.0294 liw analysis started at $(timestamp)"
php panini.php 01.0294 liw
echo "23 - Processing 01.0294 luN analysis started at $(timestamp)"
php panini.php 01.0294 luN
echo "24 - Processing 01.0038 liw analysis started at $(timestamp)"
php panini.php 01.0038 liw
echo "25 - Processing 02.0001 liw analysis started at $(timestamp)"
php panini.php 02.0001 liw
echo "26 - Processing 02.0041 liw analysis started at $(timestamp)"
php panini.php 02.0041 liw
echo "27 - Processing 02.0042 liw analysis started at $(timestamp)"
php panini.php 02.0042 liw
echo "28 - Processing 04.0070 law analysis started at $(timestamp)"
php panini.php 04.0070 law
echo "29 - Processing 04.0070 liw analysis started at $(timestamp)"
php panini.php 04.0070 liw
echo "30 - Processing 04.0070 luw analysis started at $(timestamp)"
php panini.php 04.0070 luw
echo "31 - Processing 04.0070 lfw analysis started at $(timestamp)"
php panini.php 04.0070 lfw
echo "32 - Processing 04.0070 low analysis started at $(timestamp)"
php panini.php 04.0070 low
echo "33 - Processing 04.0070 laN analysis started at $(timestamp)"
php panini.php 04.0070 laN
echo "34 - Processing 04.0070 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0070 ASIrliN
echo "35 - Processing 04.0070 viDiliN analysis started at $(timestamp)"
php panini.php 04.0070 viDiliN
echo "36 - Processing 04.0070 luN analysis started at $(timestamp)"
php panini.php 04.0070 luN
echo "37 - Processing 04.0070 lfN analysis started at $(timestamp)"
php panini.php 04.0070 lfN
echo "38 - Processing 04.0072 luN analysis started at $(timestamp)"
php panini.php 04.0072 luN
echo "39 - Processing 01.0438 luN analysis started at $(timestamp)"
php panini.php 01.0438 luN
echo "40 - Processing 01.0448 liw analysis started at $(timestamp)"
php panini.php 01.0448 liw
echo "41 - Processing 01.0448 luN analysis started at $(timestamp)"
php panini.php 01.0448 luN
echo "42 - Processing 01.1031 viDiliN analysis started at $(timestamp)"
php panini.php 01.1031 viDiliN
echo "43 - Processing 01.0546 liw analysis started at $(timestamp)"
php panini.php 01.0546 liw
echo "44 - Processing 01.0546 viDiliN analysis started at $(timestamp)"
php panini.php 01.0546 viDiliN
echo "45 - Processing 01.0481 laN analysis started at $(timestamp)"
php panini.php 01.0481 laN
echo "46 - Processing 01.1030 luN analysis started at $(timestamp)"
php panini.php 01.1030 luN
echo "47 - Processing 04.0106 laN analysis started at $(timestamp)"
php panini.php 04.0106 laN
echo "48 - Processing 05.0016 luN analysis started at $(timestamp)"
php panini.php 05.0016 luN
echo "49 - Processing 02.0040 viDiliN analysis started at $(timestamp)"
php panini.php 02.0040 viDiliN
echo "50 - Processing 01.0149 liw analysis started at $(timestamp)"
php panini.php 01.0149 liw
echo "51 - Processing 01.0208 liw analysis started at $(timestamp)"
php panini.php 01.0208 liw
echo "52 - Processing 01.0208 luN analysis started at $(timestamp)"
php panini.php 01.0208 luN
echo "53 - Processing 02.0183 luN analysis started at $(timestamp)"
php panini.php 02.0183 luN
echo "54 - Processing 01.0587 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0587 ASIrliN
echo "55 - Processing 01.0588 liw analysis started at $(timestamp)"
php panini.php 01.0588 liw
echo "56 - Processing 01.0588 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0588 ASIrliN
echo "57 - Processing 01.0136 liw analysis started at $(timestamp)"
php panini.php 01.0136 liw
echo "58 - Processing 01.0137 liw analysis started at $(timestamp)"
php panini.php 01.0137 liw
echo "59 - Processing 04.0135 liw analysis started at $(timestamp)"
php panini.php 04.0135 liw
echo "60 - Processing 06.0015 liw analysis started at $(timestamp)"
php panini.php 06.0015 liw
echo "61 - Processing 01.0244 liw analysis started at $(timestamp)"
php panini.php 01.0244 liw
echo "62 - Processing 01.0852 liw analysis started at $(timestamp)"
php panini.php 01.0852 liw
echo "63 - Processing 01.0392 liw analysis started at $(timestamp)"
php panini.php 01.0392 liw
echo "64 - Processing 01.0392 luN analysis started at $(timestamp)"
php panini.php 01.0392 luN
echo "65 - Processing 07.0020 law analysis started at $(timestamp)"
php panini.php 07.0020 law
echo "66 - Processing 07.0020 viDiliN analysis started at $(timestamp)"
php panini.php 07.0020 viDiliN
echo "67 - Processing 06.0044 liw analysis started at $(timestamp)"
php panini.php 06.0044 liw
echo "68 - Processing 01.0020 luN analysis started at $(timestamp)"
php panini.php 01.0020 luN
echo "69 - Processing 01.0650 liw analysis started at $(timestamp)"
php panini.php 01.0650 liw
echo "70 - Processing 01.0792 liw analysis started at $(timestamp)"
php panini.php 01.0792 liw
echo "71 - Processing 01.0840 liw analysis started at $(timestamp)"
php panini.php 01.0840 liw
echo "72 - Processing 01.0391 liw analysis started at $(timestamp)"
php panini.php 01.0391 liw
echo "73 - Processing 02.0034 liw analysis started at $(timestamp)"
php panini.php 02.0034 liw
echo "74 - Processing 02.0034 luN analysis started at $(timestamp)"
php panini.php 02.0034 luN
echo "75 - Processing 01.0779 liw analysis started at $(timestamp)"
php panini.php 01.0779 liw
echo "76 - Processing 05.0038 law analysis started at $(timestamp)"
php panini.php 05.0038 law
echo "77 - Processing 05.0038 laN analysis started at $(timestamp)"
php panini.php 05.0038 laN
echo "78 - Processing 05.0038 viDiliN analysis started at $(timestamp)"
php panini.php 05.0038 viDiliN
echo "79 - Processing 01.0201 luN analysis started at $(timestamp)"
php panini.php 01.0201 luN
echo "80 - Processing 08.0005 law analysis started at $(timestamp)"
php panini.php 08.0005 law
echo "81 - Processing 08.0005 liw analysis started at $(timestamp)"
php panini.php 08.0005 liw
echo "82 - Processing 08.0005 laN analysis started at $(timestamp)"
php panini.php 08.0005 laN
echo "83 - Processing 08.0005 viDiliN analysis started at $(timestamp)"
php panini.php 08.0005 viDiliN
echo "84 - Processing 08.0005 luN analysis started at $(timestamp)"
php panini.php 08.0005 luN
echo "85 - Processing 06.0041 liw analysis started at $(timestamp)"
php panini.php 06.0041 liw
echo "86 - Processing 06.0007 lfw analysis started at $(timestamp)"
php panini.php 06.0007 lfw
echo "87 - Processing 09.0032 liw analysis started at $(timestamp)"
php panini.php 09.0032 liw
echo "88 - Processing 01.0300 luN analysis started at $(timestamp)"
php panini.php 01.0300 luN
echo "89 - Processing 01.0129 liw analysis started at $(timestamp)"
php panini.php 01.0129 liw
echo "90 - Processing 01.0523 liw analysis started at $(timestamp)"
php panini.php 01.0523 liw
echo "91 - Processing 02.0014 liw analysis started at $(timestamp)"
php panini.php 02.0014 liw
echo "92 - Processing 02.0014 low analysis started at $(timestamp)"
php panini.php 02.0014 low
echo "93 - Processing 02.0014 laN analysis started at $(timestamp)"
php panini.php 02.0014 laN
echo "94 - Processing 02.0014 luN analysis started at $(timestamp)"
php panini.php 02.0014 luN
echo "95 - Processing 01.0095 luN analysis started at $(timestamp)"
php panini.php 01.0095 luN
echo "96 - Processing 01.0128 luN analysis started at $(timestamp)"
php panini.php 01.0128 luN
echo "97 - Processing 01.0192 luN analysis started at $(timestamp)"
php panini.php 01.0192 luN
echo "98 - Processing 01.0265 law analysis started at $(timestamp)"
php panini.php 01.0265 law
echo "99 - Processing 01.0265 liw analysis started at $(timestamp)"
php panini.php 01.0265 liw
echo "100 - Processing 01.0265 luw analysis started at $(timestamp)"
php panini.php 01.0265 luw
echo "101 - Processing 01.0265 lfw analysis started at $(timestamp)"
php panini.php 01.0265 lfw
echo "102 - Processing 01.0265 low analysis started at $(timestamp)"
php panini.php 01.0265 low
echo "103 - Processing 01.0265 laN analysis started at $(timestamp)"
php panini.php 01.0265 laN
echo "104 - Processing 01.0265 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0265 ASIrliN
echo "105 - Processing 01.0265 viDiliN analysis started at $(timestamp)"
php panini.php 01.0265 viDiliN
echo "106 - Processing 01.0265 luN analysis started at $(timestamp)"
php panini.php 01.0265 luN
echo "107 - Processing 01.0265 lfN analysis started at $(timestamp)"
php panini.php 01.0265 lfN
echo "108 - Processing 01.0193 luN analysis started at $(timestamp)"
php panini.php 01.0193 luN
echo "109 - Processing 01.0297 law analysis started at $(timestamp)"
php panini.php 01.0297 law
echo "110 - Processing 01.0297 liw analysis started at $(timestamp)"
php panini.php 01.0297 liw
echo "111 - Processing 01.0297 low analysis started at $(timestamp)"
php panini.php 01.0297 low
echo "112 - Processing 01.0297 laN analysis started at $(timestamp)"
php panini.php 01.0297 laN
echo "113 - Processing 01.0297 viDiliN analysis started at $(timestamp)"
php panini.php 01.0297 viDiliN
echo "114 - Processing 01.0297 luN analysis started at $(timestamp)"
php panini.php 01.0297 luN
echo "115 - Processing 01.0881 law analysis started at $(timestamp)"
php panini.php 01.0881 law
echo "116 - Processing 01.0881 liw analysis started at $(timestamp)"
php panini.php 01.0881 liw
echo "117 - Processing 01.0881 luw analysis started at $(timestamp)"
php panini.php 01.0881 luw
echo "118 - Processing 01.0881 lfw analysis started at $(timestamp)"
php panini.php 01.0881 lfw
echo "119 - Processing 01.0881 low analysis started at $(timestamp)"
php panini.php 01.0881 low
echo "120 - Processing 01.0881 laN analysis started at $(timestamp)"
php panini.php 01.0881 laN
echo "121 - Processing 01.0881 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0881 ASIrliN
echo "122 - Processing 01.0881 viDiliN analysis started at $(timestamp)"
php panini.php 01.0881 viDiliN
echo "123 - Processing 01.0881 luN analysis started at $(timestamp)"
php panini.php 01.0881 luN
echo "124 - Processing 01.0881 lfN analysis started at $(timestamp)"
php panini.php 01.0881 lfN
echo "125 - Processing 01.0073 luN analysis started at $(timestamp)"
php panini.php 01.0073 luN
echo "126 - Processing 01.0877 law analysis started at $(timestamp)"
php panini.php 01.0877 law
echo "127 - Processing 01.0877 liw analysis started at $(timestamp)"
php panini.php 01.0877 liw
echo "128 - Processing 01.0877 luw analysis started at $(timestamp)"
php panini.php 01.0877 luw
echo "129 - Processing 01.0877 lfw analysis started at $(timestamp)"
php panini.php 01.0877 lfw
echo "130 - Processing 01.0877 low analysis started at $(timestamp)"
php panini.php 01.0877 low
echo "131 - Processing 01.0877 laN analysis started at $(timestamp)"
php panini.php 01.0877 laN
echo "132 - Processing 01.0877 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0877 ASIrliN
echo "133 - Processing 01.0877 viDiliN analysis started at $(timestamp)"
php panini.php 01.0877 viDiliN
echo "134 - Processing 01.0877 luN analysis started at $(timestamp)"
php panini.php 01.0877 luN
echo "135 - Processing 01.0877 lfN analysis started at $(timestamp)"
php panini.php 01.0877 lfN
echo "136 - Processing 01.0511 law analysis started at $(timestamp)"
php panini.php 01.0511 law
echo "137 - Processing 01.0511 low analysis started at $(timestamp)"
php panini.php 01.0511 low
echo "138 - Processing 01.0511 laN analysis started at $(timestamp)"
php panini.php 01.0511 laN
echo "139 - Processing 01.0511 viDiliN analysis started at $(timestamp)"
php panini.php 01.0511 viDiliN
echo "140 - Processing 10.0470 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0470 ASIrliN
echo "141 - Processing 01.0664 low analysis started at $(timestamp)"
php panini.php 01.0664 low
echo "142 - Processing 02.0016 low analysis started at $(timestamp)"
php panini.php 02.0016 low
echo "143 - Processing 02.0016 laN analysis started at $(timestamp)"
php panini.php 02.0016 laN
echo "144 - Processing 02.0016 luN analysis started at $(timestamp)"
php panini.php 02.0016 luN
echo "145 - Processing 02.0015 liw analysis started at $(timestamp)"
php panini.php 02.0015 liw
echo "146 - Processing 01.0996 liw analysis started at $(timestamp)"
php panini.php 01.0996 liw
echo "147 - Processing 01.0194 luN analysis started at $(timestamp)"
php panini.php 01.0194 luN
echo "148 - Processing 01.0710 luN analysis started at $(timestamp)"
php panini.php 01.0710 luN
echo "149 - Processing 03.0020 law analysis started at $(timestamp)"
php panini.php 03.0020 law
echo "150 - Processing 03.0020 low analysis started at $(timestamp)"
php panini.php 03.0020 low
echo "151 - Processing 03.0021 law analysis started at $(timestamp)"
php panini.php 03.0021 law
echo "152 - Processing 03.0021 liw analysis started at $(timestamp)"
php panini.php 03.0021 liw
echo "153 - Processing 03.0021 luw analysis started at $(timestamp)"
php panini.php 03.0021 luw
echo "154 - Processing 03.0021 lfw analysis started at $(timestamp)"
php panini.php 03.0021 lfw
echo "155 - Processing 03.0021 low analysis started at $(timestamp)"
php panini.php 03.0021 low
echo "156 - Processing 03.0021 laN analysis started at $(timestamp)"
php panini.php 03.0021 laN
echo "157 - Processing 03.0021 ASIrliN analysis started at $(timestamp)"
php panini.php 03.0021 ASIrliN
echo "158 - Processing 03.0021 viDiliN analysis started at $(timestamp)"
php panini.php 03.0021 viDiliN
echo "159 - Processing 03.0021 luN analysis started at $(timestamp)"
php panini.php 03.0021 luN
echo "160 - Processing 03.0021 lfN analysis started at $(timestamp)"
php panini.php 03.0021 lfN
echo "161 - Processing 01.1148 law analysis started at $(timestamp)"
php panini.php 01.1148 law
echo "162 - Processing 01.1148 liw analysis started at $(timestamp)"
php panini.php 01.1148 liw
echo "163 - Processing 01.1148 luw analysis started at $(timestamp)"
php panini.php 01.1148 luw
echo "164 - Processing 01.1148 lfw analysis started at $(timestamp)"
php panini.php 01.1148 lfw
echo "165 - Processing 01.1148 low analysis started at $(timestamp)"
php panini.php 01.1148 low
echo "166 - Processing 01.1148 laN analysis started at $(timestamp)"
php panini.php 01.1148 laN
echo "167 - Processing 01.1148 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1148 ASIrliN
echo "168 - Processing 01.1148 viDiliN analysis started at $(timestamp)"
php panini.php 01.1148 viDiliN
echo "169 - Processing 01.1148 luN analysis started at $(timestamp)"
php panini.php 01.1148 luN
echo "170 - Processing 01.1148 lfN analysis started at $(timestamp)"
php panini.php 01.1148 lfN
echo "171 - Processing 10.0142 luN analysis started at $(timestamp)"
php panini.php 10.0142 luN
echo "172 - Processing 10.1103 ASIrliN analysis started at $(timestamp)"
php panini.php 10.1103 ASIrliN
echo "173 - Processing 04.0294 law analysis started at $(timestamp)"
php panini.php 04.0294 law
echo "174 - Processing 04.0294 liw analysis started at $(timestamp)"
php panini.php 04.0294 liw
echo "175 - Processing 04.0294 lfw analysis started at $(timestamp)"
php panini.php 04.0294 lfw
echo "176 - Processing 04.0294 low analysis started at $(timestamp)"
php panini.php 04.0294 low
echo "177 - Processing 04.0294 laN analysis started at $(timestamp)"
php panini.php 04.0294 laN
echo "178 - Processing 04.0294 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0294 ASIrliN
echo "179 - Processing 04.0294 viDiliN analysis started at $(timestamp)"
php panini.php 04.0294 viDiliN
echo "180 - Processing 04.0294 lfN analysis started at $(timestamp)"
php panini.php 04.0294 lfN
echo "181 - Processing 01.0096 luN analysis started at $(timestamp)"
php panini.php 01.0096 luN
echo "182 - Processing 01.0226 law analysis started at $(timestamp)"
php panini.php 01.0226 law
echo "183 - Processing 01.0226 liw analysis started at $(timestamp)"
php panini.php 01.0226 liw
echo "184 - Processing 01.0226 luw analysis started at $(timestamp)"
php panini.php 01.0226 luw
echo "185 - Processing 01.0226 lfw analysis started at $(timestamp)"
php panini.php 01.0226 lfw
echo "186 - Processing 01.0226 low analysis started at $(timestamp)"
php panini.php 01.0226 low
echo "187 - Processing 01.0226 laN analysis started at $(timestamp)"
php panini.php 01.0226 laN
echo "188 - Processing 01.0226 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0226 ASIrliN
echo "189 - Processing 01.0226 viDiliN analysis started at $(timestamp)"
php panini.php 01.0226 viDiliN
echo "190 - Processing 01.0226 luN analysis started at $(timestamp)"
php panini.php 01.0226 luN
echo "191 - Processing 01.0226 lfN analysis started at $(timestamp)"
php panini.php 01.0226 lfN
echo "192 - Processing 01.0255 law analysis started at $(timestamp)"
php panini.php 01.0255 law
echo "193 - Processing 01.0255 liw analysis started at $(timestamp)"
php panini.php 01.0255 liw
echo "194 - Processing 01.0255 luw analysis started at $(timestamp)"
php panini.php 01.0255 luw
echo "195 - Processing 01.0255 lfw analysis started at $(timestamp)"
php panini.php 01.0255 lfw
echo "196 - Processing 01.0255 low analysis started at $(timestamp)"
php panini.php 01.0255 low
echo "197 - Processing 01.0255 laN analysis started at $(timestamp)"
php panini.php 01.0255 laN
echo "198 - Processing 01.0255 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0255 ASIrliN
echo "199 - Processing 01.0255 viDiliN analysis started at $(timestamp)"
php panini.php 01.0255 viDiliN
echo "200 - Processing 01.0255 luN analysis started at $(timestamp)"
php panini.php 01.0255 luN
echo "201 - Processing 01.0255 lfN analysis started at $(timestamp)"
php panini.php 01.0255 lfN
echo "202 - Processing 06.0222 luN analysis started at $(timestamp)"
php panini.php 06.0222 luN
echo "203 - Processing 06.0113 luN analysis started at $(timestamp)"
php panini.php 06.0113 luN
echo "204 - Processing 10.0435 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0435 ASIrliN
echo "205 - Processing 01.0363 law analysis started at $(timestamp)"
php panini.php 01.0363 law
echo "206 - Processing 01.0363 liw analysis started at $(timestamp)"
php panini.php 01.0363 liw
echo "207 - Processing 01.0363 luw analysis started at $(timestamp)"
php panini.php 01.0363 luw
echo "208 - Processing 01.0363 lfw analysis started at $(timestamp)"
php panini.php 01.0363 lfw
echo "209 - Processing 01.0363 low analysis started at $(timestamp)"
php panini.php 01.0363 low
echo "210 - Processing 01.0363 laN analysis started at $(timestamp)"
php panini.php 01.0363 laN
echo "211 - Processing 01.0363 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0363 ASIrliN
echo "212 - Processing 01.0363 viDiliN analysis started at $(timestamp)"
php panini.php 01.0363 viDiliN
echo "213 - Processing 01.0363 luN analysis started at $(timestamp)"
php panini.php 01.0363 luN
echo "214 - Processing 01.0363 lfN analysis started at $(timestamp)"
php panini.php 01.0363 lfN
echo "215 - Processing 01.0362 liw analysis started at $(timestamp)"
php panini.php 01.0362 liw
echo "216 - Processing 09.0050 law analysis started at $(timestamp)"
php panini.php 09.0050 law
echo "217 - Processing 09.0050 low analysis started at $(timestamp)"
php panini.php 09.0050 low
echo "218 - Processing 09.0050 laN analysis started at $(timestamp)"
php panini.php 09.0050 laN
echo "219 - Processing 09.0050 viDiliN analysis started at $(timestamp)"
php panini.php 09.0050 viDiliN
echo "220 - Processing 04.0310 luw analysis started at $(timestamp)"
php panini.php 04.0310 luw
echo "221 - Processing 10.0158 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0158 ASIrliN
echo "222 - Processing 06.0067 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0067 ASIrliN
echo "223 - Processing 06.0067 lfN analysis started at $(timestamp)"
php panini.php 06.0067 lfN
echo "224 - Processing 01.0021 liw analysis started at $(timestamp)"
php panini.php 01.0021 liw
echo "225 - Processing 01.0021 luw analysis started at $(timestamp)"
php panini.php 01.0021 luw
echo "226 - Processing 01.0021 lfw analysis started at $(timestamp)"
php panini.php 01.0021 lfw
echo "227 - Processing 01.0021 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0021 ASIrliN
echo "228 - Processing 01.0021 luN analysis started at $(timestamp)"
php panini.php 01.0021 luN
echo "229 - Processing 01.0021 lfN analysis started at $(timestamp)"
php panini.php 01.0021 lfN
echo "230 - Processing 04.0126 law analysis started at $(timestamp)"
php panini.php 04.0126 law
echo "231 - Processing 04.0126 liw analysis started at $(timestamp)"
php panini.php 04.0126 liw
echo "232 - Processing 04.0126 luw analysis started at $(timestamp)"
php panini.php 04.0126 luw
echo "233 - Processing 04.0126 lfw analysis started at $(timestamp)"
php panini.php 04.0126 lfw
echo "234 - Processing 04.0126 low analysis started at $(timestamp)"
php panini.php 04.0126 low
echo "235 - Processing 04.0126 laN analysis started at $(timestamp)"
php panini.php 04.0126 laN
echo "236 - Processing 04.0126 viDiliN analysis started at $(timestamp)"
php panini.php 04.0126 viDiliN
echo "237 - Processing 04.0126 luN analysis started at $(timestamp)"
php panini.php 04.0126 luN
echo "238 - Processing 04.0126 lfN analysis started at $(timestamp)"
php panini.php 04.0126 lfN
echo "239 - Processing 10.0236 luw analysis started at $(timestamp)"
php panini.php 10.0236 luw
echo "240 - Processing 10.0236 lfw analysis started at $(timestamp)"
php panini.php 10.0236 lfw
echo "241 - Processing 10.0236 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0236 ASIrliN
echo "242 - Processing 10.0236 viDiliN analysis started at $(timestamp)"
php panini.php 10.0236 viDiliN
echo "243 - Processing 10.0236 luN analysis started at $(timestamp)"
php panini.php 10.0236 luN
echo "244 - Processing 10.0236 lfN analysis started at $(timestamp)"
php panini.php 10.0236 lfN
echo "245 - Processing 10.0443 law analysis started at $(timestamp)"
php panini.php 10.0443 law
echo "246 - Processing 10.0443 liw analysis started at $(timestamp)"
php panini.php 10.0443 liw
echo "247 - Processing 10.0443 luw analysis started at $(timestamp)"
php panini.php 10.0443 luw
echo "248 - Processing 10.0443 lfw analysis started at $(timestamp)"
php panini.php 10.0443 lfw
echo "249 - Processing 10.0443 low analysis started at $(timestamp)"
php panini.php 10.0443 low
echo "250 - Processing 10.0443 laN analysis started at $(timestamp)"
php panini.php 10.0443 laN
echo "251 - Processing 10.0443 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0443 ASIrliN
echo "252 - Processing 10.0443 viDiliN analysis started at $(timestamp)"
php panini.php 10.0443 viDiliN
echo "253 - Processing 10.0443 lfN analysis started at $(timestamp)"
php panini.php 10.0443 lfN
echo "254 - Processing 06.0137 luw analysis started at $(timestamp)"
php panini.php 06.0137 luw
echo "255 - Processing 10.0438 luN analysis started at $(timestamp)"
php panini.php 10.0438 luN
echo "256 - Processing 10.0211 luN analysis started at $(timestamp)"
php panini.php 10.0211 luN
echo "257 - Processing 01.0603 laN analysis started at $(timestamp)"
php panini.php 01.0603 laN
echo "258 - Processing 01.1048 law analysis started at $(timestamp)"
php panini.php 01.1048 law
echo "259 - Processing 01.1048 liw analysis started at $(timestamp)"
php panini.php 01.1048 liw
echo "260 - Processing 01.1048 low analysis started at $(timestamp)"
php panini.php 01.1048 low
echo "261 - Processing 01.1048 laN analysis started at $(timestamp)"
php panini.php 01.1048 laN
echo "262 - Processing 01.1048 viDiliN analysis started at $(timestamp)"
php panini.php 01.1048 viDiliN
echo "263 - Processing 05.0007 liw analysis started at $(timestamp)"
php panini.php 05.0007 liw
echo "264 - Processing 05.0007 viDiliN analysis started at $(timestamp)"
php panini.php 05.0007 viDiliN
echo "265 - Processing 06.0112 luN analysis started at $(timestamp)"
php panini.php 06.0112 luN
echo "266 - Processing 01.0682 law analysis started at $(timestamp)"
php panini.php 01.0682 law
echo "267 - Processing 01.0682 low analysis started at $(timestamp)"
php panini.php 01.0682 low
echo "268 - Processing 01.0682 laN analysis started at $(timestamp)"
php panini.php 01.0682 laN
echo "269 - Processing 01.0682 viDiliN analysis started at $(timestamp)"
php panini.php 01.0682 viDiliN
echo "270 - Processing 07.0010 laN analysis started at $(timestamp)"
php panini.php 07.0010 laN
echo "271 - Processing 10.0408 liw analysis started at $(timestamp)"
php panini.php 10.0408 liw
echo "272 - Processing 10.0278 liw analysis started at $(timestamp)"
php panini.php 10.0278 liw
echo "273 - Processing 10.0278 luN analysis started at $(timestamp)"
php panini.php 10.0278 luN
echo "274 - Processing 01.0866 liw analysis started at $(timestamp)"
php panini.php 01.0866 liw
echo "275 - Processing 01.0866 luw analysis started at $(timestamp)"
php panini.php 01.0866 luw
echo "276 - Processing 01.0866 lfw analysis started at $(timestamp)"
php panini.php 01.0866 lfw
echo "277 - Processing 01.0866 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0866 ASIrliN
echo "278 - Processing 01.0866 luN analysis started at $(timestamp)"
php panini.php 01.0866 luN
echo "279 - Processing 01.0866 lfN analysis started at $(timestamp)"
php panini.php 01.0866 lfN
echo "280 - Processing 06.0006 luN analysis started at $(timestamp)"
php panini.php 06.0006 luN
echo "281 - Processing 01.1145 luN analysis started at $(timestamp)"
php panini.php 01.1145 luN
echo "282 - Processing 06.0145 law analysis started at $(timestamp)"
php panini.php 06.0145 law
echo "283 - Processing 06.0145 low analysis started at $(timestamp)"
php panini.php 06.0145 low
echo "284 - Processing 06.0145 laN analysis started at $(timestamp)"
php panini.php 06.0145 laN
echo "285 - Processing 06.0145 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0145 ASIrliN
echo "286 - Processing 06.0145 viDiliN analysis started at $(timestamp)"
php panini.php 06.0145 viDiliN
echo "287 - Processing 09.0018 liw analysis started at $(timestamp)"
php panini.php 09.0018 liw
echo "288 - Processing 09.0018 low analysis started at $(timestamp)"
php panini.php 09.0018 low
echo "289 - Processing 09.0018 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0018 ASIrliN
echo "290 - Processing 09.0018 luN analysis started at $(timestamp)"
php panini.php 09.0018 luN
echo "291 - Processing 09.0031 low analysis started at $(timestamp)"
php panini.php 09.0031 low
echo "292 - Processing 09.0031 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0031 ASIrliN
echo "293 - Processing 10.0437 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0437 ASIrliN
echo "294 - Processing 10.0437 luN analysis started at $(timestamp)"
php panini.php 10.0437 luN
echo "295 - Processing 01.0426 luN analysis started at $(timestamp)"
php panini.php 01.0426 luN
echo "296 - Processing 01.0583 law analysis started at $(timestamp)"
php panini.php 01.0583 law
echo "297 - Processing 01.0583 liw analysis started at $(timestamp)"
php panini.php 01.0583 liw
echo "298 - Processing 01.0583 luw analysis started at $(timestamp)"
php panini.php 01.0583 luw
echo "299 - Processing 01.0583 lfw analysis started at $(timestamp)"
php panini.php 01.0583 lfw
echo "300 - Processing 01.0583 low analysis started at $(timestamp)"
php panini.php 01.0583 low
echo "301 - Processing 01.0583 laN analysis started at $(timestamp)"
php panini.php 01.0583 laN
echo "302 - Processing 01.0583 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0583 ASIrliN
echo "303 - Processing 01.0583 viDiliN analysis started at $(timestamp)"
php panini.php 01.0583 viDiliN
echo "304 - Processing 01.0583 luN analysis started at $(timestamp)"
php panini.php 01.0583 luN
echo "305 - Processing 01.0583 lfN analysis started at $(timestamp)"
php panini.php 01.0583 lfN
echo "306 - Processing 01.1064 law analysis started at $(timestamp)"
php panini.php 01.1064 law
echo "307 - Processing 01.1064 liw analysis started at $(timestamp)"
php panini.php 01.1064 liw
echo "308 - Processing 01.1064 luw analysis started at $(timestamp)"
php panini.php 01.1064 luw
echo "309 - Processing 01.1064 lfw analysis started at $(timestamp)"
php panini.php 01.1064 lfw
echo "310 - Processing 01.1064 low analysis started at $(timestamp)"
php panini.php 01.1064 low
echo "311 - Processing 01.1064 laN analysis started at $(timestamp)"
php panini.php 01.1064 laN
echo "312 - Processing 01.1064 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1064 ASIrliN
echo "313 - Processing 01.1064 viDiliN analysis started at $(timestamp)"
php panini.php 01.1064 viDiliN
echo "314 - Processing 01.1064 lfN analysis started at $(timestamp)"
php panini.php 01.1064 lfN
echo "315 - Processing 01.0911 law analysis started at $(timestamp)"
php panini.php 01.0911 law
echo "316 - Processing 01.0911 liw analysis started at $(timestamp)"
php panini.php 01.0911 liw
echo "317 - Processing 01.0911 luw analysis started at $(timestamp)"
php panini.php 01.0911 luw
echo "318 - Processing 01.0911 lfw analysis started at $(timestamp)"
php panini.php 01.0911 lfw
echo "319 - Processing 01.0911 low analysis started at $(timestamp)"
php panini.php 01.0911 low
echo "320 - Processing 01.0911 laN analysis started at $(timestamp)"
php panini.php 01.0911 laN
echo "321 - Processing 01.0911 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0911 ASIrliN
echo "322 - Processing 01.0911 viDiliN analysis started at $(timestamp)"
php panini.php 01.0911 viDiliN
echo "323 - Processing 01.0911 luN analysis started at $(timestamp)"
php panini.php 01.0911 luN
echo "324 - Processing 01.0911 lfN analysis started at $(timestamp)"
php panini.php 01.0911 lfN
echo "325 - Processing 09.0012 law analysis started at $(timestamp)"
php panini.php 09.0012 law
echo "326 - Processing 09.0012 liw analysis started at $(timestamp)"
php panini.php 09.0012 liw
echo "327 - Processing 09.0012 luw analysis started at $(timestamp)"
php panini.php 09.0012 luw
echo "328 - Processing 09.0012 lfw analysis started at $(timestamp)"
php panini.php 09.0012 lfw
echo "329 - Processing 09.0012 low analysis started at $(timestamp)"
php panini.php 09.0012 low
echo "330 - Processing 09.0012 laN analysis started at $(timestamp)"
php panini.php 09.0012 laN
echo "331 - Processing 09.0012 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0012 ASIrliN
echo "332 - Processing 09.0012 viDiliN analysis started at $(timestamp)"
php panini.php 09.0012 viDiliN
echo "333 - Processing 09.0012 luN analysis started at $(timestamp)"
php panini.php 09.0012 luN
echo "334 - Processing 09.0012 lfN analysis started at $(timestamp)"
php panini.php 09.0012 lfN
echo "335 - Processing 01.0912 luN analysis started at $(timestamp)"
php panini.php 01.0912 luN
echo "336 - Processing 01.0882 law analysis started at $(timestamp)"
php panini.php 01.0882 law
echo "337 - Processing 01.0882 liw analysis started at $(timestamp)"
php panini.php 01.0882 liw
echo "338 - Processing 01.0882 luw analysis started at $(timestamp)"
php panini.php 01.0882 luw
echo "339 - Processing 01.0882 lfw analysis started at $(timestamp)"
php panini.php 01.0882 lfw
echo "340 - Processing 01.0882 low analysis started at $(timestamp)"
php panini.php 01.0882 low
echo "341 - Processing 01.0882 laN analysis started at $(timestamp)"
php panini.php 01.0882 laN
echo "342 - Processing 01.0882 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0882 ASIrliN
echo "343 - Processing 01.0882 viDiliN analysis started at $(timestamp)"
php panini.php 01.0882 viDiliN
echo "344 - Processing 01.0882 luN analysis started at $(timestamp)"
php panini.php 01.0882 luN
echo "345 - Processing 01.0882 lfN analysis started at $(timestamp)"
php panini.php 01.0882 lfN
echo "346 - Processing 01.0876 luN analysis started at $(timestamp)"
php panini.php 01.0876 luN
echo "347 - Processing 01.0545 law analysis started at $(timestamp)"
php panini.php 01.0545 law
echo "348 - Processing 01.0545 low analysis started at $(timestamp)"
php panini.php 01.0545 low
echo "349 - Processing 01.0545 laN analysis started at $(timestamp)"
php panini.php 01.0545 laN
echo "350 - Processing 01.0545 viDiliN analysis started at $(timestamp)"
php panini.php 01.0545 viDiliN
echo "351 - Processing 01.0213 liw analysis started at $(timestamp)"
php panini.php 01.0213 liw
echo "352 - Processing 01.0213 luw analysis started at $(timestamp)"
php panini.php 01.0213 luw
echo "353 - Processing 01.0213 lfw analysis started at $(timestamp)"
php panini.php 01.0213 lfw
echo "354 - Processing 06.0128 liw analysis started at $(timestamp)"
php panini.php 06.0128 liw
echo "355 - Processing 06.0128 luN analysis started at $(timestamp)"
php panini.php 06.0128 luN
echo "356 - Processing 06.0128 lfN analysis started at $(timestamp)"
php panini.php 06.0128 lfN
echo "357 - Processing 01.0913 luN analysis started at $(timestamp)"
php panini.php 01.0913 luN
echo "358 - Processing 01.0883 law analysis started at $(timestamp)"
php panini.php 01.0883 law
echo "359 - Processing 01.0883 liw analysis started at $(timestamp)"
php panini.php 01.0883 liw
echo "360 - Processing 01.0883 luw analysis started at $(timestamp)"
php panini.php 01.0883 luw
echo "361 - Processing 01.0883 lfw analysis started at $(timestamp)"
php panini.php 01.0883 lfw
echo "362 - Processing 01.0883 low analysis started at $(timestamp)"
php panini.php 01.0883 low
echo "363 - Processing 01.0883 laN analysis started at $(timestamp)"
php panini.php 01.0883 laN
echo "364 - Processing 01.0883 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0883 ASIrliN
echo "365 - Processing 01.0883 viDiliN analysis started at $(timestamp)"
php panini.php 01.0883 viDiliN
echo "366 - Processing 01.0883 luN analysis started at $(timestamp)"
php panini.php 01.0883 luN
echo "367 - Processing 01.0883 lfN analysis started at $(timestamp)"
php panini.php 01.0883 lfN
echo "368 - Processing 01.0075 luN analysis started at $(timestamp)"
php panini.php 01.0075 luN
echo "369 - Processing 10.0162 law analysis started at $(timestamp)"
php panini.php 10.0162 law
echo "370 - Processing 10.0162 liw analysis started at $(timestamp)"
php panini.php 10.0162 liw
echo "371 - Processing 10.0162 luw analysis started at $(timestamp)"
php panini.php 10.0162 luw
echo "372 - Processing 10.0162 lfw analysis started at $(timestamp)"
php panini.php 10.0162 lfw
echo "373 - Processing 10.0162 low analysis started at $(timestamp)"
php panini.php 10.0162 low
echo "374 - Processing 10.0162 laN analysis started at $(timestamp)"
php panini.php 10.0162 laN
echo "375 - Processing 10.0162 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0162 ASIrliN
echo "376 - Processing 10.0162 viDiliN analysis started at $(timestamp)"
php panini.php 10.0162 viDiliN
echo "377 - Processing 10.0162 luN analysis started at $(timestamp)"
php panini.php 10.0162 luN
echo "378 - Processing 10.0162 lfN analysis started at $(timestamp)"
php panini.php 10.0162 lfN
echo "379 - Processing 04.0104 law analysis started at $(timestamp)"
php panini.php 04.0104 law
echo "380 - Processing 04.0104 low analysis started at $(timestamp)"
php panini.php 04.0104 low
echo "381 - Processing 04.0104 viDiliN analysis started at $(timestamp)"
php panini.php 04.0104 viDiliN
echo "382 - Processing 04.0157 liw analysis started at $(timestamp)"
php panini.php 04.0157 liw
echo "383 - Processing 01.0015 luN analysis started at $(timestamp)"
php panini.php 01.0015 luN
echo "384 - Processing 01.0076 liw analysis started at $(timestamp)"
php panini.php 01.0076 liw
echo "385 - Processing 04.0057 luN analysis started at $(timestamp)"
php panini.php 04.0057 luN
echo "386 - Processing 09.0058 liw analysis started at $(timestamp)"
php panini.php 09.0058 liw
echo "387 - Processing 09.0058 luN analysis started at $(timestamp)"
php panini.php 09.0058 luN
echo "388 - Processing 09.0058 lfN analysis started at $(timestamp)"
php panini.php 09.0058 lfN
echo "389 - Processing 01.0441 luN analysis started at $(timestamp)"
php panini.php 01.0441 luN
echo "390 - Processing 01.1113 liw analysis started at $(timestamp)"
php panini.php 01.1113 liw
echo "391 - Processing 01.1113 luw analysis started at $(timestamp)"
php panini.php 01.1113 luw
echo "392 - Processing 01.1113 lfw analysis started at $(timestamp)"
php panini.php 01.1113 lfw
echo "393 - Processing 01.1113 laN analysis started at $(timestamp)"
php panini.php 01.1113 laN
echo "394 - Processing 01.1113 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1113 ASIrliN
echo "395 - Processing 01.1113 viDiliN analysis started at $(timestamp)"
php panini.php 01.1113 viDiliN
echo "396 - Processing 01.1113 luN analysis started at $(timestamp)"
php panini.php 01.1113 luN
echo "397 - Processing 01.1113 lfN analysis started at $(timestamp)"
php panini.php 01.1113 lfN
echo "398 - Processing 01.0691 luN analysis started at $(timestamp)"
php panini.php 01.0691 luN
echo "399 - Processing 10.0113 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0113 ASIrliN
echo "400 - Processing 01.0873 luN analysis started at $(timestamp)"
php panini.php 01.0873 luN
echo "401 - Processing 10.0487 law analysis started at $(timestamp)"
php panini.php 10.0487 law
echo "402 - Processing 10.0487 liw analysis started at $(timestamp)"
php panini.php 10.0487 liw
echo "403 - Processing 10.0487 luw analysis started at $(timestamp)"
php panini.php 10.0487 luw
echo "404 - Processing 10.0487 lfw analysis started at $(timestamp)"
php panini.php 10.0487 lfw
echo "405 - Processing 10.0487 low analysis started at $(timestamp)"
php panini.php 10.0487 low
echo "406 - Processing 10.0487 laN analysis started at $(timestamp)"
php panini.php 10.0487 laN
echo "407 - Processing 10.0487 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0487 ASIrliN
echo "408 - Processing 10.0487 viDiliN analysis started at $(timestamp)"
php panini.php 10.0487 viDiliN
echo "409 - Processing 10.0487 lfN analysis started at $(timestamp)"
php panini.php 10.0487 lfN
echo "410 - Processing 04.0103 liw analysis started at $(timestamp)"
php panini.php 04.0103 liw
echo "411 - Processing 04.0103 luw analysis started at $(timestamp)"
php panini.php 04.0103 luw
echo "412 - Processing 04.0103 lfw analysis started at $(timestamp)"
php panini.php 04.0103 lfw
echo "413 - Processing 04.0103 luN analysis started at $(timestamp)"
php panini.php 04.0103 luN
echo "414 - Processing 04.0103 lfN analysis started at $(timestamp)"
php panini.php 04.0103 lfN
echo "415 - Processing 01.0510 law analysis started at $(timestamp)"
php panini.php 01.0510 law
echo "416 - Processing 01.0510 low analysis started at $(timestamp)"
php panini.php 01.0510 low
echo "417 - Processing 01.0510 laN analysis started at $(timestamp)"
php panini.php 01.0510 laN
echo "418 - Processing 01.0510 viDiliN analysis started at $(timestamp)"
php panini.php 01.0510 viDiliN
echo "419 - Processing 01.0510 luN analysis started at $(timestamp)"
php panini.php 01.0510 luN
echo "420 - Processing 10.0112 low analysis started at $(timestamp)"
php panini.php 10.0112 low
echo "421 - Processing 05.0033 luN analysis started at $(timestamp)"
php panini.php 05.0033 luN
echo "422 - Processing 05.0033 lfN analysis started at $(timestamp)"
php panini.php 05.0033 lfN
echo "423 - Processing 06.0005 luN analysis started at $(timestamp)"
php panini.php 06.0005 luN
echo "424 - Processing 01.0648 liw analysis started at $(timestamp)"
php panini.php 01.0648 liw
echo "425 - Processing 01.0648 lfN analysis started at $(timestamp)"
php panini.php 01.0648 lfN
echo "426 - Processing 05.0039 law analysis started at $(timestamp)"
php panini.php 05.0039 law
echo "427 - Processing 05.0039 low analysis started at $(timestamp)"
php panini.php 05.0039 low
echo "428 - Processing 05.0039 laN analysis started at $(timestamp)"
php panini.php 05.0039 laN
echo "429 - Processing 05.0039 viDiliN analysis started at $(timestamp)"
php panini.php 05.0039 viDiliN
echo "430 - Processing 05.0039 luN analysis started at $(timestamp)"
php panini.php 05.0039 luN
echo "431 - Processing 05.0039 lfN analysis started at $(timestamp)"
php panini.php 05.0039 lfN
echo "432 - Processing 01.0442 luN analysis started at $(timestamp)"
php panini.php 01.0442 luN
echo "433 - Processing 01.0443 law analysis started at $(timestamp)"
php panini.php 01.0443 law
echo "434 - Processing 01.0443 liw analysis started at $(timestamp)"
php panini.php 01.0443 liw
echo "435 - Processing 01.0443 low analysis started at $(timestamp)"
php panini.php 01.0443 low
echo "436 - Processing 01.0443 laN analysis started at $(timestamp)"
php panini.php 01.0443 laN
echo "437 - Processing 01.0443 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0443 ASIrliN
echo "438 - Processing 01.0443 viDiliN analysis started at $(timestamp)"
php panini.php 01.0443 viDiliN
echo "439 - Processing 01.0443 luN analysis started at $(timestamp)"
php panini.php 01.0443 luN
echo "440 - Processing 09.0042 law analysis started at $(timestamp)"
php panini.php 09.0042 law
echo "441 - Processing 09.0042 low analysis started at $(timestamp)"
php panini.php 09.0042 low
echo "442 - Processing 09.0042 laN analysis started at $(timestamp)"
php panini.php 09.0042 laN
echo "443 - Processing 09.0042 viDiliN analysis started at $(timestamp)"
php panini.php 09.0042 viDiliN
echo "444 - Processing 09.0055 law analysis started at $(timestamp)"
php panini.php 09.0055 law
echo "445 - Processing 09.0055 low analysis started at $(timestamp)"
php panini.php 09.0055 low
echo "446 - Processing 09.0055 laN analysis started at $(timestamp)"
php panini.php 09.0055 laN
echo "447 - Processing 09.0055 viDiliN analysis started at $(timestamp)"
php panini.php 09.0055 viDiliN
echo "448 - Processing 01.0854 luN analysis started at $(timestamp)"
php panini.php 01.0854 luN
echo "449 - Processing 06.0070 viDiliN analysis started at $(timestamp)"
php panini.php 06.0070 viDiliN
echo "450 - Processing 01.0987 law analysis started at $(timestamp)"
php panini.php 01.0987 law
echo "451 - Processing 01.0987 low analysis started at $(timestamp)"
php panini.php 01.0987 low
echo "452 - Processing 01.0987 laN analysis started at $(timestamp)"
php panini.php 01.0987 laN
echo "453 - Processing 01.0987 viDiliN analysis started at $(timestamp)"
php panini.php 01.0987 viDiliN
echo "454 - Processing 01.0649 lfN analysis started at $(timestamp)"
php panini.php 01.0649 lfN
echo "455 - Processing 10.0416 liw analysis started at $(timestamp)"
php panini.php 10.0416 liw
echo "456 - Processing 10.0416 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0416 ASIrliN
echo "457 - Processing 02.0032 liw analysis started at $(timestamp)"
php panini.php 02.0032 liw
echo "458 - Processing 02.0032 viDiliN analysis started at $(timestamp)"
php panini.php 02.0032 viDiliN
echo "459 - Processing 01.1133 luN analysis started at $(timestamp)"
php panini.php 01.1133 luN
echo "460 - Processing 01.0618 lfN analysis started at $(timestamp)"
php panini.php 01.0618 lfN
echo "461 - Processing 09.0067 law analysis started at $(timestamp)"
php panini.php 09.0067 law
echo "462 - Processing 09.0067 low analysis started at $(timestamp)"
php panini.php 09.0067 low
echo "463 - Processing 09.0067 laN analysis started at $(timestamp)"
php panini.php 09.0067 laN
echo "464 - Processing 09.0067 luN analysis started at $(timestamp)"
php panini.php 09.0067 luN
echo "465 - Processing 01.0346 law analysis started at $(timestamp)"
php panini.php 01.0346 law
echo "466 - Processing 01.0346 liw analysis started at $(timestamp)"
php panini.php 01.0346 liw
echo "467 - Processing 01.0346 luw analysis started at $(timestamp)"
php panini.php 01.0346 luw
echo "468 - Processing 01.0346 lfw analysis started at $(timestamp)"
php panini.php 01.0346 lfw
echo "469 - Processing 01.0346 low analysis started at $(timestamp)"
php panini.php 01.0346 low
echo "470 - Processing 01.0346 laN analysis started at $(timestamp)"
php panini.php 01.0346 laN
echo "471 - Processing 01.0346 viDiliN analysis started at $(timestamp)"
php panini.php 01.0346 viDiliN
echo "472 - Processing 01.0346 luN analysis started at $(timestamp)"
php panini.php 01.0346 luN
echo "473 - Processing 01.0346 lfN analysis started at $(timestamp)"
php panini.php 01.0346 lfN
echo "474 - Processing 10.0127 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0127 ASIrliN
echo "475 - Processing 01.0317 luN analysis started at $(timestamp)"
php panini.php 01.0317 luN
echo "476 - Processing 01.0052 luN analysis started at $(timestamp)"
php panini.php 01.0052 luN
echo "477 - Processing 01.1020 luN analysis started at $(timestamp)"
php panini.php 01.1020 luN
echo "478 - Processing 01.0261 law analysis started at $(timestamp)"
php panini.php 01.0261 law
echo "479 - Processing 01.0261 liw analysis started at $(timestamp)"
php panini.php 01.0261 liw
echo "480 - Processing 01.0261 luw analysis started at $(timestamp)"
php panini.php 01.0261 luw
echo "481 - Processing 01.0261 lfw analysis started at $(timestamp)"
php panini.php 01.0261 lfw
echo "482 - Processing 01.0261 low analysis started at $(timestamp)"
php panini.php 01.0261 low
echo "483 - Processing 01.0261 laN analysis started at $(timestamp)"
php panini.php 01.0261 laN
echo "484 - Processing 01.0261 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0261 ASIrliN
echo "485 - Processing 01.0261 viDiliN analysis started at $(timestamp)"
php panini.php 01.0261 viDiliN
echo "486 - Processing 01.0261 luN analysis started at $(timestamp)"
php panini.php 01.0261 luN
echo "487 - Processing 01.0261 lfN analysis started at $(timestamp)"
php panini.php 01.0261 lfN
echo "488 - Processing 01.0062 law analysis started at $(timestamp)"
php panini.php 01.0062 law
echo "489 - Processing 01.0062 liw analysis started at $(timestamp)"
php panini.php 01.0062 liw
echo "490 - Processing 01.0062 luw analysis started at $(timestamp)"
php panini.php 01.0062 luw
echo "491 - Processing 01.0062 lfw analysis started at $(timestamp)"
php panini.php 01.0062 lfw
echo "492 - Processing 01.0062 low analysis started at $(timestamp)"
php panini.php 01.0062 low
echo "493 - Processing 01.0062 laN analysis started at $(timestamp)"
php panini.php 01.0062 laN
echo "494 - Processing 01.0062 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0062 ASIrliN
echo "495 - Processing 01.0062 viDiliN analysis started at $(timestamp)"
php panini.php 01.0062 viDiliN
echo "496 - Processing 01.0062 luN analysis started at $(timestamp)"
php panini.php 01.0062 luN
echo "497 - Processing 01.0062 lfN analysis started at $(timestamp)"
php panini.php 01.0062 lfN
echo "498 - Processing 01.0665 law analysis started at $(timestamp)"
php panini.php 01.0665 law
echo "499 - Processing 01.0665 liw analysis started at $(timestamp)"
php panini.php 01.0665 liw
echo "500 - Processing 01.0665 luw analysis started at $(timestamp)"
php panini.php 01.0665 luw
echo "501 - Processing 01.0665 lfw analysis started at $(timestamp)"
php panini.php 01.0665 lfw
echo "502 - Processing 01.0665 low analysis started at $(timestamp)"
php panini.php 01.0665 low
echo "503 - Processing 01.0665 laN analysis started at $(timestamp)"
php panini.php 01.0665 laN
echo "504 - Processing 01.0665 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0665 ASIrliN
echo "505 - Processing 01.0665 viDiliN analysis started at $(timestamp)"
php panini.php 01.0665 viDiliN
echo "506 - Processing 01.0665 luN analysis started at $(timestamp)"
php panini.php 01.0665 luN
echo "507 - Processing 01.0665 lfN analysis started at $(timestamp)"
php panini.php 01.0665 lfN
echo "508 - Processing 01.0626 law analysis started at $(timestamp)"
php panini.php 01.0626 law
echo "509 - Processing 01.0626 liw analysis started at $(timestamp)"
php panini.php 01.0626 liw
echo "510 - Processing 01.0626 luw analysis started at $(timestamp)"
php panini.php 01.0626 luw
echo "511 - Processing 01.0626 lfw analysis started at $(timestamp)"
php panini.php 01.0626 lfw
echo "512 - Processing 01.0626 low analysis started at $(timestamp)"
php panini.php 01.0626 low
echo "513 - Processing 01.0626 laN analysis started at $(timestamp)"
php panini.php 01.0626 laN
echo "514 - Processing 01.0626 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0626 ASIrliN
echo "515 - Processing 01.0626 viDiliN analysis started at $(timestamp)"
php panini.php 01.0626 viDiliN
echo "516 - Processing 01.0626 luN analysis started at $(timestamp)"
php panini.php 01.0626 luN
echo "517 - Processing 01.0626 lfN analysis started at $(timestamp)"
php panini.php 01.0626 lfN
echo "518 - Processing 09.0068 law analysis started at $(timestamp)"
php panini.php 09.0068 law
echo "519 - Processing 09.0068 liw analysis started at $(timestamp)"
php panini.php 09.0068 liw
echo "520 - Processing 09.0068 luw analysis started at $(timestamp)"
php panini.php 09.0068 luw
echo "521 - Processing 09.0068 lfw analysis started at $(timestamp)"
php panini.php 09.0068 lfw
echo "522 - Processing 09.0068 low analysis started at $(timestamp)"
php panini.php 09.0068 low
echo "523 - Processing 09.0068 laN analysis started at $(timestamp)"
php panini.php 09.0068 laN
echo "524 - Processing 09.0068 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0068 ASIrliN
echo "525 - Processing 09.0068 viDiliN analysis started at $(timestamp)"
php panini.php 09.0068 viDiliN
echo "526 - Processing 09.0068 luN analysis started at $(timestamp)"
php panini.php 09.0068 luN
echo "527 - Processing 09.0068 lfN analysis started at $(timestamp)"
php panini.php 09.0068 lfN
echo "528 - Processing 06.0172 liw analysis started at $(timestamp)"
php panini.php 06.0172 liw
echo "529 - Processing 06.0172 luw analysis started at $(timestamp)"
php panini.php 06.0172 luw
echo "530 - Processing 06.0172 lfw analysis started at $(timestamp)"
php panini.php 06.0172 lfw
echo "531 - Processing 01.1104 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1104 ASIrliN
echo "532 - Processing 06.0119 law analysis started at $(timestamp)"
php panini.php 06.0119 law
echo "533 - Processing 06.0119 liw analysis started at $(timestamp)"
php panini.php 06.0119 liw
echo "534 - Processing 06.0119 luw analysis started at $(timestamp)"
php panini.php 06.0119 luw
echo "535 - Processing 06.0119 lfw analysis started at $(timestamp)"
php panini.php 06.0119 lfw
echo "536 - Processing 06.0119 low analysis started at $(timestamp)"
php panini.php 06.0119 low
echo "537 - Processing 06.0119 laN analysis started at $(timestamp)"
php panini.php 06.0119 laN
echo "538 - Processing 06.0119 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0119 ASIrliN
echo "539 - Processing 06.0119 viDiliN analysis started at $(timestamp)"
php panini.php 06.0119 viDiliN
echo "540 - Processing 06.0119 luN analysis started at $(timestamp)"
php panini.php 06.0119 luN
echo "541 - Processing 06.0119 lfN analysis started at $(timestamp)"
php panini.php 06.0119 lfN
echo "542 - Processing 10.0072 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0072 ASIrliN
echo "543 - Processing 10.0072 lfN analysis started at $(timestamp)"
php panini.php 10.0072 lfN
echo "544 - Processing 06.0068 law analysis started at $(timestamp)"
php panini.php 06.0068 law
echo "545 - Processing 06.0068 liw analysis started at $(timestamp)"
php panini.php 06.0068 liw
echo "546 - Processing 06.0068 low analysis started at $(timestamp)"
php panini.php 06.0068 low
echo "547 - Processing 06.0068 laN analysis started at $(timestamp)"
php panini.php 06.0068 laN
echo "548 - Processing 06.0068 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0068 ASIrliN
echo "549 - Processing 06.0068 viDiliN analysis started at $(timestamp)"
php panini.php 06.0068 viDiliN
echo "550 - Processing 01.0022 liw analysis started at $(timestamp)"
php panini.php 01.0022 liw
echo "551 - Processing 01.0022 luw analysis started at $(timestamp)"
php panini.php 01.0022 luw
echo "552 - Processing 01.0022 lfw analysis started at $(timestamp)"
php panini.php 01.0022 lfw
echo "553 - Processing 01.0022 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0022 ASIrliN
echo "554 - Processing 01.0022 luN analysis started at $(timestamp)"
php panini.php 01.0022 luN
echo "555 - Processing 01.0022 lfN analysis started at $(timestamp)"
php panini.php 01.0022 lfN
echo "556 - Processing 10.0414 law analysis started at $(timestamp)"
php panini.php 10.0414 law
echo "557 - Processing 10.0414 liw analysis started at $(timestamp)"
php panini.php 10.0414 liw
echo "558 - Processing 10.0414 luw analysis started at $(timestamp)"
php panini.php 10.0414 luw
echo "559 - Processing 10.0414 lfw analysis started at $(timestamp)"
php panini.php 10.0414 lfw
echo "560 - Processing 10.0414 low analysis started at $(timestamp)"
php panini.php 10.0414 low
echo "561 - Processing 10.0414 laN analysis started at $(timestamp)"
php panini.php 10.0414 laN
echo "562 - Processing 10.0414 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0414 ASIrliN
echo "563 - Processing 10.0414 viDiliN analysis started at $(timestamp)"
php panini.php 10.0414 viDiliN
echo "564 - Processing 10.0414 luN analysis started at $(timestamp)"
php panini.php 10.0414 luN
echo "565 - Processing 10.0414 lfN analysis started at $(timestamp)"
php panini.php 10.0414 lfN
echo "566 - Processing 01.1060 lfN analysis started at $(timestamp)"
php panini.php 01.1060 lfN
echo "567 - Processing 10.0415 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0415 ASIrliN
echo "568 - Processing 01.0279 luN analysis started at $(timestamp)"
php panini.php 01.0279 luN
echo "569 - Processing 10.0399 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0399 ASIrliN
echo "570 - Processing 01.1137 liw analysis started at $(timestamp)"
php panini.php 01.1137 liw
echo "571 - Processing 01.0666 low analysis started at $(timestamp)"
php panini.php 01.0666 low
echo "572 - Processing 01.0723 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0723 ASIrliN
echo "573 - Processing 01.0724 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0724 ASIrliN
echo "574 - Processing 01.1101 law analysis started at $(timestamp)"
php panini.php 01.1101 law
echo "575 - Processing 01.1101 low analysis started at $(timestamp)"
php panini.php 01.1101 low
echo "576 - Processing 01.1101 laN analysis started at $(timestamp)"
php panini.php 01.1101 laN
echo "577 - Processing 03.0026 law analysis started at $(timestamp)"
php panini.php 03.0026 law
echo "578 - Processing 03.0026 low analysis started at $(timestamp)"
php panini.php 03.0026 low
echo "579 - Processing 03.0026 laN analysis started at $(timestamp)"
php panini.php 03.0026 laN
echo "580 - Processing 03.0026 ASIrliN analysis started at $(timestamp)"
php panini.php 03.0026 ASIrliN
echo "581 - Processing 03.0026 viDiliN analysis started at $(timestamp)"
php panini.php 03.0026 viDiliN
echo "582 - Processing 01.1105 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1105 ASIrliN
echo "583 - Processing 01.1100 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1100 ASIrliN
echo "584 - Processing 06.0134 liw analysis started at $(timestamp)"
php panini.php 06.0134 liw
echo "585 - Processing 06.0134 luN analysis started at $(timestamp)"
php panini.php 06.0134 luN
echo "586 - Processing 01.0230 law analysis started at $(timestamp)"
php panini.php 01.0230 law
echo "587 - Processing 01.0230 liw analysis started at $(timestamp)"
php panini.php 01.0230 liw
echo "588 - Processing 01.0230 luw analysis started at $(timestamp)"
php panini.php 01.0230 luw
echo "589 - Processing 01.0230 lfw analysis started at $(timestamp)"
php panini.php 01.0230 lfw
echo "590 - Processing 01.0230 low analysis started at $(timestamp)"
php panini.php 01.0230 low
echo "591 - Processing 01.0230 laN analysis started at $(timestamp)"
php panini.php 01.0230 laN
echo "592 - Processing 01.0230 viDiliN analysis started at $(timestamp)"
php panini.php 01.0230 viDiliN
echo "593 - Processing 01.0230 luN analysis started at $(timestamp)"
php panini.php 01.0230 luN
echo "594 - Processing 01.0230 lfN analysis started at $(timestamp)"
php panini.php 01.0230 lfN
echo "595 - Processing 06.0096 luN analysis started at $(timestamp)"
php panini.php 06.0096 luN
echo "596 - Processing 06.0097 luN analysis started at $(timestamp)"
php panini.php 06.0097 luN
echo "597 - Processing 10.0436 law analysis started at $(timestamp)"
php panini.php 10.0436 law
echo "598 - Processing 10.0436 liw analysis started at $(timestamp)"
php panini.php 10.0436 liw
echo "599 - Processing 10.0436 luw analysis started at $(timestamp)"
php panini.php 10.0436 luw
echo "600 - Processing 10.0436 lfw analysis started at $(timestamp)"
php panini.php 10.0436 lfw
echo "601 - Processing 10.0436 low analysis started at $(timestamp)"
php panini.php 10.0436 low
echo "602 - Processing 10.0436 laN analysis started at $(timestamp)"
php panini.php 10.0436 laN
echo "603 - Processing 10.0436 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0436 ASIrliN
echo "604 - Processing 10.0436 viDiliN analysis started at $(timestamp)"
php panini.php 10.0436 viDiliN
echo "605 - Processing 10.0436 lfN analysis started at $(timestamp)"
php panini.php 10.0436 lfN
echo "606 - Processing 04.0014 law analysis started at $(timestamp)"
php panini.php 04.0014 law
echo "607 - Processing 04.0014 low analysis started at $(timestamp)"
php panini.php 04.0014 low
echo "608 - Processing 04.0014 laN analysis started at $(timestamp)"
php panini.php 04.0014 laN
echo "609 - Processing 04.0014 viDiliN analysis started at $(timestamp)"
php panini.php 04.0014 viDiliN
echo "610 - Processing 09.0053 law analysis started at $(timestamp)"
php panini.php 09.0053 law
echo "611 - Processing 09.0053 low analysis started at $(timestamp)"
php panini.php 09.0053 low
echo "612 - Processing 01.1125 liw analysis started at $(timestamp)"
php panini.php 01.1125 liw
echo "613 - Processing 01.1125 viDiliN analysis started at $(timestamp)"
php panini.php 01.1125 viDiliN
echo "614 - Processing 01.1125 luN analysis started at $(timestamp)"
php panini.php 01.1125 luN
echo "615 - Processing 01.0461 liw analysis started at $(timestamp)"
php panini.php 01.0461 liw
echo "616 - Processing 01.0461 luw analysis started at $(timestamp)"
php panini.php 01.0461 luw
echo "617 - Processing 01.0461 lfw analysis started at $(timestamp)"
php panini.php 01.0461 lfw
echo "618 - Processing 01.0461 low analysis started at $(timestamp)"
php panini.php 01.0461 low
echo "619 - Processing 01.0461 laN analysis started at $(timestamp)"
php panini.php 01.0461 laN
echo "620 - Processing 01.0461 viDiliN analysis started at $(timestamp)"
php panini.php 01.0461 viDiliN
echo "621 - Processing 01.0461 luN analysis started at $(timestamp)"
php panini.php 01.0461 luN
echo "622 - Processing 01.0461 lfN analysis started at $(timestamp)"
php panini.php 01.0461 lfN
echo "623 - Processing 06.0131 liw analysis started at $(timestamp)"
php panini.php 06.0131 liw
echo "624 - Processing 06.0131 luN analysis started at $(timestamp)"
php panini.php 06.0131 luN
echo "625 - Processing 01.0023 law analysis started at $(timestamp)"
php panini.php 01.0023 law
echo "626 - Processing 01.0023 liw analysis started at $(timestamp)"
php panini.php 01.0023 liw
echo "627 - Processing 01.0023 luw analysis started at $(timestamp)"
php panini.php 01.0023 luw
echo "628 - Processing 01.0023 lfw analysis started at $(timestamp)"
php panini.php 01.0023 lfw
echo "629 - Processing 01.0023 low analysis started at $(timestamp)"
php panini.php 01.0023 low
echo "630 - Processing 01.0023 laN analysis started at $(timestamp)"
php panini.php 01.0023 laN
echo "631 - Processing 01.0023 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0023 ASIrliN
echo "632 - Processing 01.0023 viDiliN analysis started at $(timestamp)"
php panini.php 01.0023 viDiliN
echo "633 - Processing 01.0023 luN analysis started at $(timestamp)"
php panini.php 01.0023 luN
echo "634 - Processing 01.0023 lfN analysis started at $(timestamp)"
php panini.php 01.0023 lfN
echo "635 - Processing 10.0180 liw analysis started at $(timestamp)"
php panini.php 10.0180 liw
echo "636 - Processing 10.0180 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0180 ASIrliN
echo "637 - Processing 01.0655 law analysis started at $(timestamp)"
php panini.php 01.0655 law
echo "638 - Processing 01.0655 luw analysis started at $(timestamp)"
php panini.php 01.0655 luw
echo "639 - Processing 01.0655 lfw analysis started at $(timestamp)"
php panini.php 01.0655 lfw
echo "640 - Processing 01.0655 low analysis started at $(timestamp)"
php panini.php 01.0655 low
echo "641 - Processing 01.0655 laN analysis started at $(timestamp)"
php panini.php 01.0655 laN
echo "642 - Processing 01.0655 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0655 ASIrliN
echo "643 - Processing 01.0655 viDiliN analysis started at $(timestamp)"
php panini.php 01.0655 viDiliN
echo "644 - Processing 01.0655 luN analysis started at $(timestamp)"
php panini.php 01.0655 luN
echo "645 - Processing 01.0655 lfN analysis started at $(timestamp)"
php panini.php 01.0655 lfN
echo "646 - Processing 01.1043 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1043 ASIrliN
echo "647 - Processing 01.1043 luN analysis started at $(timestamp)"
php panini.php 01.1043 luN
echo "648 - Processing 04.0217 liw analysis started at $(timestamp)"
php panini.php 04.0217 liw
echo "649 - Processing 04.0217 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0217 ASIrliN
echo "650 - Processing 04.0217 luN analysis started at $(timestamp)"
php panini.php 04.0217 luN
echo "651 - Processing 01.0737 liw analysis started at $(timestamp)"
php panini.php 01.0737 liw
echo "652 - Processing 01.0737 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0737 ASIrliN
echo "653 - Processing 01.0737 luN analysis started at $(timestamp)"
php panini.php 01.0737 luN
echo "654 - Processing 01.1087 law analysis started at $(timestamp)"
php panini.php 01.1087 law
echo "655 - Processing 01.1087 liw analysis started at $(timestamp)"
php panini.php 01.1087 liw
echo "656 - Processing 01.1087 luw analysis started at $(timestamp)"
php panini.php 01.1087 luw
echo "657 - Processing 01.1087 low analysis started at $(timestamp)"
php panini.php 01.1087 low
echo "658 - Processing 01.1087 laN analysis started at $(timestamp)"
php panini.php 01.1087 laN
echo "659 - Processing 01.1087 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1087 ASIrliN
echo "660 - Processing 01.1087 viDiliN analysis started at $(timestamp)"
php panini.php 01.1087 viDiliN
echo "661 - Processing 01.1087 luN analysis started at $(timestamp)"
php panini.php 01.1087 luN
echo "662 - Processing 04.0161 law analysis started at $(timestamp)"
php panini.php 04.0161 law
echo "663 - Processing 06.0033 lfN analysis started at $(timestamp)"
php panini.php 06.0033 lfN
echo "664 - Processing 09.0231 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0231 ASIrliN
echo "665 - Processing 01.0427 liw analysis started at $(timestamp)"
php panini.php 01.0427 liw
echo "666 - Processing 01.0427 laN analysis started at $(timestamp)"
php panini.php 01.0427 laN
echo "667 - Processing 01.1065 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1065 ASIrliN
echo "668 - Processing 10.0362 luN analysis started at $(timestamp)"
php panini.php 10.0362 luN
echo "669 - Processing 09.0375 law analysis started at $(timestamp)"
php panini.php 09.0375 law
echo "670 - Processing 09.0375 low analysis started at $(timestamp)"
php panini.php 09.0375 low
echo "671 - Processing 09.0375 laN analysis started at $(timestamp)"
php panini.php 09.0375 laN
echo "672 - Processing 09.0375 viDiliN analysis started at $(timestamp)"
php panini.php 09.0375 viDiliN
echo "673 - Processing 01.0717 liw analysis started at $(timestamp)"
php panini.php 01.0717 liw
echo "674 - Processing 10.0279 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0279 ASIrliN
echo "675 - Processing 10.0434 liw analysis started at $(timestamp)"
php panini.php 10.0434 liw
echo "676 - Processing 10.0434 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0434 ASIrliN
echo "677 - Processing 01.0224 law analysis started at $(timestamp)"
php panini.php 01.0224 law
echo "678 - Processing 01.0718 liw analysis started at $(timestamp)"
php panini.php 01.0718 liw
echo "679 - Processing 01.0738 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0738 ASIrliN
echo "680 - Processing 01.0225 liw analysis started at $(timestamp)"
php panini.php 01.0225 liw
echo "681 - Processing 01.0699 law analysis started at $(timestamp)"
php panini.php 01.0699 law
echo "682 - Processing 01.0699 liw analysis started at $(timestamp)"
php panini.php 01.0699 liw
echo "683 - Processing 01.0699 low analysis started at $(timestamp)"
php panini.php 01.0699 low
echo "684 - Processing 01.0699 laN analysis started at $(timestamp)"
php panini.php 01.0699 laN
echo "685 - Processing 01.0699 viDiliN analysis started at $(timestamp)"
php panini.php 01.0699 viDiliN
echo "686 - Processing 01.0699 luN analysis started at $(timestamp)"
php panini.php 01.0699 luN
echo "687 - Processing 01.1051 lfw analysis started at $(timestamp)"
php panini.php 01.1051 lfw
echo "688 - Processing 01.0180 law analysis started at $(timestamp)"
php panini.php 01.0180 law
echo "689 - Processing 01.0180 liw analysis started at $(timestamp)"
php panini.php 01.0180 liw
echo "690 - Processing 01.0180 luw analysis started at $(timestamp)"
php panini.php 01.0180 luw
echo "691 - Processing 01.0180 lfw analysis started at $(timestamp)"
php panini.php 01.0180 lfw
echo "692 - Processing 01.0180 low analysis started at $(timestamp)"
php panini.php 01.0180 low
echo "693 - Processing 01.0180 laN analysis started at $(timestamp)"
php panini.php 01.0180 laN
echo "694 - Processing 01.0180 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0180 ASIrliN
echo "695 - Processing 01.0180 viDiliN analysis started at $(timestamp)"
php panini.php 01.0180 viDiliN
echo "696 - Processing 01.0180 luN analysis started at $(timestamp)"
php panini.php 01.0180 luN
echo "697 - Processing 01.0180 lfN analysis started at $(timestamp)"
php panini.php 01.0180 lfN
echo "698 - Processing 10.0125 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0125 ASIrliN
echo "699 - Processing 01.0740 law analysis started at $(timestamp)"
php panini.php 01.0740 law
echo "700 - Processing 01.0740 liw analysis started at $(timestamp)"
php panini.php 01.0740 liw
echo "701 - Processing 01.0740 luw analysis started at $(timestamp)"
php panini.php 01.0740 luw
echo "702 - Processing 01.0740 lfw analysis started at $(timestamp)"
php panini.php 01.0740 lfw
echo "703 - Processing 01.0740 low analysis started at $(timestamp)"
php panini.php 01.0740 low
echo "704 - Processing 01.0740 laN analysis started at $(timestamp)"
php panini.php 01.0740 laN
echo "705 - Processing 01.0740 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0740 ASIrliN
echo "706 - Processing 01.0740 viDiliN analysis started at $(timestamp)"
php panini.php 01.0740 viDiliN
echo "707 - Processing 01.0740 luN analysis started at $(timestamp)"
php panini.php 01.0740 luN
echo "708 - Processing 01.0740 lfN analysis started at $(timestamp)"
php panini.php 01.0740 lfN
echo "709 - Processing 01.0502 liw analysis started at $(timestamp)"
php panini.php 01.0502 liw
echo "710 - Processing 01.0502 low analysis started at $(timestamp)"
php panini.php 01.0502 low
echo "711 - Processing 06.0115 luN analysis started at $(timestamp)"
php panini.php 06.0115 luN
echo "712 - Processing 01.0505 low analysis started at $(timestamp)"
php panini.php 01.0505 low
echo "713 - Processing 01.0503 low analysis started at $(timestamp)"
php panini.php 01.0503 low
echo "714 - Processing 10.0251 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0251 ASIrliN
echo "715 - Processing 10.0251 luN analysis started at $(timestamp)"
php panini.php 10.0251 luN
echo "716 - Processing 04.0050 law analysis started at $(timestamp)"
php panini.php 04.0050 law
echo "717 - Processing 04.0050 liw analysis started at $(timestamp)"
php panini.php 04.0050 liw
echo "718 - Processing 04.0050 low analysis started at $(timestamp)"
php panini.php 04.0050 low
echo "719 - Processing 04.0050 laN analysis started at $(timestamp)"
php panini.php 04.0050 laN
echo "720 - Processing 04.0050 viDiliN analysis started at $(timestamp)"
php panini.php 04.0050 viDiliN
echo "721 - Processing 04.0050 luN analysis started at $(timestamp)"
php panini.php 04.0050 luN
echo "722 - Processing 03.0152 law analysis started at $(timestamp)"
php panini.php 03.0152 law
echo "723 - Processing 03.0152 low analysis started at $(timestamp)"
php panini.php 03.0152 low
echo "724 - Processing 03.0152 laN analysis started at $(timestamp)"
php panini.php 03.0152 laN
echo "725 - Processing 03.0152 viDiliN analysis started at $(timestamp)"
php panini.php 03.0152 viDiliN
echo "726 - Processing 08.0007 laN analysis started at $(timestamp)"
php panini.php 08.0007 laN
echo "727 - Processing 01.0504 law analysis started at $(timestamp)"
php panini.php 01.0504 law
echo "728 - Processing 01.0504 liw analysis started at $(timestamp)"
php panini.php 01.0504 liw
echo "729 - Processing 01.0504 low analysis started at $(timestamp)"
php panini.php 01.0504 low
echo "730 - Processing 01.1075 luN analysis started at $(timestamp)"
php panini.php 01.1075 luN
echo "731 - Processing 01.0121 law analysis started at $(timestamp)"
php panini.php 01.0121 law
echo "732 - Processing 01.0121 liw analysis started at $(timestamp)"
php panini.php 01.0121 liw
echo "733 - Processing 01.0121 luw analysis started at $(timestamp)"
php panini.php 01.0121 luw
echo "734 - Processing 01.0121 lfw analysis started at $(timestamp)"
php panini.php 01.0121 lfw
echo "735 - Processing 01.0121 low analysis started at $(timestamp)"
php panini.php 01.0121 low
echo "736 - Processing 01.0121 laN analysis started at $(timestamp)"
php panini.php 01.0121 laN
echo "737 - Processing 01.0121 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0121 ASIrliN
echo "738 - Processing 01.0121 viDiliN analysis started at $(timestamp)"
php panini.php 01.0121 viDiliN
echo "739 - Processing 01.0121 luN analysis started at $(timestamp)"
php panini.php 01.0121 luN
echo "740 - Processing 01.0121 lfN analysis started at $(timestamp)"
php panini.php 01.0121 lfN
echo "741 - Processing 01.1107 law analysis started at $(timestamp)"
php panini.php 01.1107 law
echo "742 - Processing 01.1107 liw analysis started at $(timestamp)"
php panini.php 01.1107 liw
echo "743 - Processing 01.1107 low analysis started at $(timestamp)"
php panini.php 01.1107 low
echo "744 - Processing 01.1107 laN analysis started at $(timestamp)"
php panini.php 01.1107 laN
echo "745 - Processing 01.1107 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1107 ASIrliN
echo "746 - Processing 01.1107 viDiliN analysis started at $(timestamp)"
php panini.php 01.1107 viDiliN
echo "747 - Processing 01.1107 luN analysis started at $(timestamp)"
php panini.php 01.1107 luN
echo "748 - Processing 02.0069 law analysis started at $(timestamp)"
php panini.php 02.0069 law
echo "749 - Processing 02.0069 liw analysis started at $(timestamp)"
php panini.php 02.0069 liw
echo "750 - Processing 02.0069 low analysis started at $(timestamp)"
php panini.php 02.0069 low
echo "751 - Processing 02.0007 luN analysis started at $(timestamp)"
php panini.php 02.0007 luN
echo "752 - Processing 01.0312 viDiliN analysis started at $(timestamp)"
php panini.php 01.0312 viDiliN
echo "753 - Processing 01.1004 laN analysis started at $(timestamp)"
php panini.php 01.1004 laN
echo "754 - Processing 01.0914 liw analysis started at $(timestamp)"
php panini.php 01.0914 liw
echo "755 - Processing 01.0914 luw analysis started at $(timestamp)"
php panini.php 01.0914 luw
echo "756 - Processing 01.0914 lfw analysis started at $(timestamp)"
php panini.php 01.0914 lfw
echo "757 - Processing 01.0914 low analysis started at $(timestamp)"
php panini.php 01.0914 low
echo "758 - Processing 01.0914 laN analysis started at $(timestamp)"
php panini.php 01.0914 laN
echo "759 - Processing 01.0914 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0914 ASIrliN
echo "760 - Processing 01.0914 viDiliN analysis started at $(timestamp)"
php panini.php 01.0914 viDiliN
echo "761 - Processing 01.0914 luN analysis started at $(timestamp)"
php panini.php 01.0914 luN
echo "762 - Processing 01.0914 lfN analysis started at $(timestamp)"
php panini.php 01.0914 lfN
echo "763 - Processing 10.0121 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0121 ASIrliN
echo "764 - Processing 01.0540 law analysis started at $(timestamp)"
php panini.php 01.0540 law
echo "765 - Processing 01.0540 low analysis started at $(timestamp)"
php panini.php 01.0540 low
echo "766 - Processing 01.0540 laN analysis started at $(timestamp)"
php panini.php 01.0540 laN
echo "767 - Processing 01.0540 viDiliN analysis started at $(timestamp)"
php panini.php 01.0540 viDiliN
echo "768 - Processing 10.0111 viDiliN analysis started at $(timestamp)"
php panini.php 10.0111 viDiliN
echo "769 - Processing 10.0111 luN analysis started at $(timestamp)"
php panini.php 10.0111 luN
echo "770 - Processing 01.0550 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0550 ASIrliN
echo "771 - Processing 01.1023 liw analysis started at $(timestamp)"
php panini.php 01.1023 liw
echo "772 - Processing 01.1023 laN analysis started at $(timestamp)"
php panini.php 01.1023 laN
echo "773 - Processing 01.1023 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1023 ASIrliN
echo "774 - Processing 10.0325 luN analysis started at $(timestamp)"
php panini.php 10.0325 luN
echo "775 - Processing 10.0005 liw analysis started at $(timestamp)"
php panini.php 10.0005 liw
echo "776 - Processing 10.0005 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0005 ASIrliN
echo "777 - Processing 10.0005 luN analysis started at $(timestamp)"
php panini.php 10.0005 luN
echo "778 - Processing 10.0005 lfN analysis started at $(timestamp)"
php panini.php 10.0005 lfN
echo "779 - Processing 05.0124 viDiliN analysis started at $(timestamp)"
php panini.php 05.0124 viDiliN
echo "780 - Processing 05.0034 liw analysis started at $(timestamp)"
php panini.php 05.0034 liw
echo "781 - Processing 05.0034 low analysis started at $(timestamp)"
php panini.php 05.0034 low
echo "782 - Processing 05.0034 viDiliN analysis started at $(timestamp)"
php panini.php 05.0034 viDiliN
echo "783 - Processing 05.0034 lfN analysis started at $(timestamp)"
php panini.php 05.0034 lfN
echo "784 - Processing 01.0611 lfN analysis started at $(timestamp)"
php panini.php 01.0611 lfN
echo "785 - Processing 10.0364 luN analysis started at $(timestamp)"
php panini.php 10.0364 luN
echo "786 - Processing 01.1022 law analysis started at $(timestamp)"
php panini.php 01.1022 law
echo "787 - Processing 01.1022 liw analysis started at $(timestamp)"
php panini.php 01.1022 liw
echo "788 - Processing 01.1022 luw analysis started at $(timestamp)"
php panini.php 01.1022 luw
echo "789 - Processing 01.1022 lfw analysis started at $(timestamp)"
php panini.php 01.1022 lfw
echo "790 - Processing 01.1022 low analysis started at $(timestamp)"
php panini.php 01.1022 low
echo "791 - Processing 01.1022 laN analysis started at $(timestamp)"
php panini.php 01.1022 laN
echo "792 - Processing 01.1022 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1022 ASIrliN
echo "793 - Processing 01.1022 viDiliN analysis started at $(timestamp)"
php panini.php 01.1022 viDiliN
echo "794 - Processing 01.1022 luN analysis started at $(timestamp)"
php panini.php 01.1022 luN
echo "795 - Processing 01.1022 lfN analysis started at $(timestamp)"
php panini.php 01.1022 lfN
echo "796 - Processing 01.0446 luN analysis started at $(timestamp)"
php panini.php 01.0446 luN
echo "797 - Processing 01.1021 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1021 ASIrliN
echo "798 - Processing 01.0591 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0591 ASIrliN
echo "799 - Processing 06.0103 luN analysis started at $(timestamp)"
php panini.php 06.0103 luN
echo "800 - Processing 10.0104 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0104 ASIrliN
echo "801 - Processing 10.0036 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0036 ASIrliN
echo "802 - Processing 06.0126 liw analysis started at $(timestamp)"
php panini.php 06.0126 liw
echo "803 - Processing 06.0126 luN analysis started at $(timestamp)"
php panini.php 06.0126 luN
echo "804 - Processing 01.0368 lfN analysis started at $(timestamp)"
php panini.php 01.0368 lfN
echo "805 - Processing 10.0091 luN analysis started at $(timestamp)"
php panini.php 10.0091 luN
echo "806 - Processing 04.0053 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0053 ASIrliN
echo "807 - Processing 10.0353 law analysis started at $(timestamp)"
php panini.php 10.0353 law
echo "808 - Processing 10.0353 liw analysis started at $(timestamp)"
php panini.php 10.0353 liw
echo "809 - Processing 10.0353 luw analysis started at $(timestamp)"
php panini.php 10.0353 luw
echo "810 - Processing 10.0353 lfw analysis started at $(timestamp)"
php panini.php 10.0353 lfw
echo "811 - Processing 10.0353 low analysis started at $(timestamp)"
php panini.php 10.0353 low
echo "812 - Processing 10.0353 laN analysis started at $(timestamp)"
php panini.php 10.0353 laN
echo "813 - Processing 10.0353 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0353 ASIrliN
echo "814 - Processing 10.0353 viDiliN analysis started at $(timestamp)"
php panini.php 10.0353 viDiliN
echo "815 - Processing 10.0353 luN analysis started at $(timestamp)"
php panini.php 10.0353 luN
echo "816 - Processing 10.0353 lfN analysis started at $(timestamp)"
php panini.php 10.0353 lfN
echo "817 - Processing 10.0275 luN analysis started at $(timestamp)"
php panini.php 10.0275 luN
echo "818 - Processing 01.0040 luw analysis started at $(timestamp)"
php panini.php 01.0040 luw
echo "819 - Processing 10.0114 laN analysis started at $(timestamp)"
php panini.php 10.0114 laN
echo "820 - Processing 10.0114 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0114 ASIrliN
echo "821 - Processing 10.0114 lfN analysis started at $(timestamp)"
php panini.php 10.0114 lfN
echo "822 - Processing 10.0481 luN analysis started at $(timestamp)"
php panini.php 10.0481 luN
echo "823 - Processing 10.0359 luN analysis started at $(timestamp)"
php panini.php 10.0359 luN
echo "824 - Processing 10.0370 luN analysis started at $(timestamp)"
php panini.php 10.0370 luN
echo "825 - Processing 01.0541 lfN analysis started at $(timestamp)"
php panini.php 01.0541 lfN
echo "826 - Processing 10.0078 law analysis started at $(timestamp)"
php panini.php 10.0078 law
echo "827 - Processing 10.0078 liw analysis started at $(timestamp)"
php panini.php 10.0078 liw
echo "828 - Processing 10.0078 luw analysis started at $(timestamp)"
php panini.php 10.0078 luw
echo "829 - Processing 10.0078 lfw analysis started at $(timestamp)"
php panini.php 10.0078 lfw
echo "830 - Processing 10.0078 low analysis started at $(timestamp)"
php panini.php 10.0078 low
echo "831 - Processing 10.0078 laN analysis started at $(timestamp)"
php panini.php 10.0078 laN
echo "832 - Processing 10.0078 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0078 ASIrliN
echo "833 - Processing 10.0078 viDiliN analysis started at $(timestamp)"
php panini.php 10.0078 viDiliN
echo "834 - Processing 10.0078 luN analysis started at $(timestamp)"
php panini.php 10.0078 luN
echo "835 - Processing 10.0078 lfN analysis started at $(timestamp)"
php panini.php 10.0078 lfN
echo "836 - Processing 01.1035 luN analysis started at $(timestamp)"
php panini.php 01.1035 luN
echo "837 - Processing 01.1035 lfN analysis started at $(timestamp)"
php panini.php 01.1035 lfN
echo "838 - Processing 07.0003 law analysis started at $(timestamp)"
php panini.php 07.0003 law
echo "839 - Processing 07.0003 low analysis started at $(timestamp)"
php panini.php 07.0003 low
echo "840 - Processing 07.0003 laN analysis started at $(timestamp)"
php panini.php 07.0003 laN
echo "841 - Processing 10.0469 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0469 ASIrliN
echo "842 - Processing 06.0105 luN analysis started at $(timestamp)"
php panini.php 06.0105 luN
echo "843 - Processing 06.0120 law analysis started at $(timestamp)"
php panini.php 06.0120 law
echo "844 - Processing 06.0120 liw analysis started at $(timestamp)"
php panini.php 06.0120 liw
echo "845 - Processing 06.0120 luw analysis started at $(timestamp)"
php panini.php 06.0120 luw
echo "846 - Processing 06.0120 lfw analysis started at $(timestamp)"
php panini.php 06.0120 lfw
echo "847 - Processing 06.0120 low analysis started at $(timestamp)"
php panini.php 06.0120 low
echo "848 - Processing 06.0120 laN analysis started at $(timestamp)"
php panini.php 06.0120 laN
echo "849 - Processing 06.0120 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0120 ASIrliN
echo "850 - Processing 06.0120 viDiliN analysis started at $(timestamp)"
php panini.php 06.0120 viDiliN
echo "851 - Processing 06.0120 luN analysis started at $(timestamp)"
php panini.php 06.0120 luN
echo "852 - Processing 06.0120 lfN analysis started at $(timestamp)"
php panini.php 06.0120 lfN
echo "853 - Processing 06.0099 liw analysis started at $(timestamp)"
php panini.php 06.0099 liw
echo "854 - Processing 06.0099 luN analysis started at $(timestamp)"
php panini.php 06.0099 luN
echo "855 - Processing 07.0352 law analysis started at $(timestamp)"
php panini.php 07.0352 law
echo "856 - Processing 07.0352 low analysis started at $(timestamp)"
php panini.php 07.0352 low
echo "857 - Processing 07.0352 laN analysis started at $(timestamp)"
php panini.php 07.0352 laN
echo "858 - Processing 07.0352 luN analysis started at $(timestamp)"
php panini.php 07.0352 luN
echo "859 - Processing 07.0352 lfN analysis started at $(timestamp)"
php panini.php 07.0352 lfN
echo "860 - Processing 10.0354 law analysis started at $(timestamp)"
php panini.php 10.0354 law
echo "861 - Processing 10.0354 liw analysis started at $(timestamp)"
php panini.php 10.0354 liw
echo "862 - Processing 10.0354 luw analysis started at $(timestamp)"
php panini.php 10.0354 luw
echo "863 - Processing 10.0354 lfw analysis started at $(timestamp)"
php panini.php 10.0354 lfw
echo "864 - Processing 10.0354 low analysis started at $(timestamp)"
php panini.php 10.0354 low
echo "865 - Processing 10.0354 laN analysis started at $(timestamp)"
php panini.php 10.0354 laN
echo "866 - Processing 10.0354 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0354 ASIrliN
echo "867 - Processing 10.0354 viDiliN analysis started at $(timestamp)"
php panini.php 10.0354 viDiliN
echo "868 - Processing 10.0354 luN analysis started at $(timestamp)"
php panini.php 10.0354 luN
echo "869 - Processing 10.0354 lfN analysis started at $(timestamp)"
php panini.php 10.0354 lfN
echo "870 - Processing 04.0041 liw analysis started at $(timestamp)"
php panini.php 04.0041 liw
echo "871 - Processing 04.0041 luw analysis started at $(timestamp)"
php panini.php 04.0041 luw
echo "872 - Processing 04.0041 lfw analysis started at $(timestamp)"
php panini.php 04.0041 lfw
echo "873 - Processing 04.0041 low analysis started at $(timestamp)"
php panini.php 04.0041 low
echo "874 - Processing 04.0041 laN analysis started at $(timestamp)"
php panini.php 04.0041 laN
echo "875 - Processing 04.0041 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0041 ASIrliN
echo "876 - Processing 04.0041 viDiliN analysis started at $(timestamp)"
php panini.php 04.0041 viDiliN
echo "877 - Processing 04.0041 luN analysis started at $(timestamp)"
php panini.php 04.0041 luN
echo "878 - Processing 04.0041 lfN analysis started at $(timestamp)"
php panini.php 04.0041 lfN
echo "879 - Processing 01.0276 law analysis started at $(timestamp)"
php panini.php 01.0276 law
echo "880 - Processing 01.0276 liw analysis started at $(timestamp)"
php panini.php 01.0276 liw
echo "881 - Processing 01.0276 luw analysis started at $(timestamp)"
php panini.php 01.0276 luw
echo "882 - Processing 01.0276 lfw analysis started at $(timestamp)"
php panini.php 01.0276 lfw
echo "883 - Processing 01.0276 low analysis started at $(timestamp)"
php panini.php 01.0276 low
echo "884 - Processing 01.0276 laN analysis started at $(timestamp)"
php panini.php 01.0276 laN
echo "885 - Processing 01.0276 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0276 ASIrliN
echo "886 - Processing 01.0276 viDiliN analysis started at $(timestamp)"
php panini.php 01.0276 viDiliN
echo "887 - Processing 01.0276 luN analysis started at $(timestamp)"
php panini.php 01.0276 luN
echo "888 - Processing 01.0276 lfN analysis started at $(timestamp)"
php panini.php 01.0276 lfN
echo "889 - Processing 03.0025 law analysis started at $(timestamp)"
php panini.php 03.0025 law
echo "890 - Processing 03.0025 low analysis started at $(timestamp)"
php panini.php 03.0025 low
echo "891 - Processing 03.0025 laN analysis started at $(timestamp)"
php panini.php 03.0025 laN
echo "892 - Processing 03.0025 viDiliN analysis started at $(timestamp)"
php panini.php 03.0025 viDiliN
echo "893 - Processing 01.0453 luN analysis started at $(timestamp)"
php panini.php 01.0453 luN
echo "894 - Processing 10.0241 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0241 ASIrliN
echo "895 - Processing 01.0813 law analysis started at $(timestamp)"
php panini.php 01.0813 law
echo "896 - Processing 01.0813 liw analysis started at $(timestamp)"
php panini.php 01.0813 liw
echo "897 - Processing 01.0813 luw analysis started at $(timestamp)"
php panini.php 01.0813 luw
echo "898 - Processing 01.0813 lfw analysis started at $(timestamp)"
php panini.php 01.0813 lfw
echo "899 - Processing 01.0813 low analysis started at $(timestamp)"
php panini.php 01.0813 low
echo "900 - Processing 01.0813 laN analysis started at $(timestamp)"
php panini.php 01.0813 laN
echo "901 - Processing 01.0813 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0813 ASIrliN
echo "902 - Processing 01.0813 viDiliN analysis started at $(timestamp)"
php panini.php 01.0813 viDiliN
echo "903 - Processing 01.0813 luN analysis started at $(timestamp)"
php panini.php 01.0813 luN
echo "904 - Processing 01.0813 lfN analysis started at $(timestamp)"
php panini.php 01.0813 lfN
echo "905 - Processing 06.0018 lfN analysis started at $(timestamp)"
php panini.php 06.0018 lfN
echo "906 - Processing 01.0967 liw analysis started at $(timestamp)"
php panini.php 01.0967 liw
echo "907 - Processing 02.0067 law analysis started at $(timestamp)"
php panini.php 02.0067 law
echo "908 - Processing 02.0067 liw analysis started at $(timestamp)"
php panini.php 02.0067 liw
echo "909 - Processing 02.0067 low analysis started at $(timestamp)"
php panini.php 02.0067 low
echo "910 - Processing 02.0067 laN analysis started at $(timestamp)"
php panini.php 02.0067 laN
echo "911 - Processing 02.0067 luN analysis started at $(timestamp)"
php panini.php 02.0067 luN
echo "912 - Processing 10.0324 law analysis started at $(timestamp)"
php panini.php 10.0324 law
echo "913 - Processing 10.0324 liw analysis started at $(timestamp)"
php panini.php 10.0324 liw
echo "914 - Processing 10.0324 luw analysis started at $(timestamp)"
php panini.php 10.0324 luw
echo "915 - Processing 10.0324 lfw analysis started at $(timestamp)"
php panini.php 10.0324 lfw
echo "916 - Processing 10.0324 low analysis started at $(timestamp)"
php panini.php 10.0324 low
echo "917 - Processing 10.0324 laN analysis started at $(timestamp)"
php panini.php 10.0324 laN
echo "918 - Processing 10.0324 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0324 ASIrliN
echo "919 - Processing 10.0324 viDiliN analysis started at $(timestamp)"
php panini.php 10.0324 viDiliN
echo "920 - Processing 10.0324 luN analysis started at $(timestamp)"
php panini.php 10.0324 luN
echo "921 - Processing 10.0324 lfN analysis started at $(timestamp)"
php panini.php 10.0324 lfN
echo "922 - Processing 01.0544 law analysis started at $(timestamp)"
php panini.php 01.0544 law
echo "923 - Processing 01.0544 liw analysis started at $(timestamp)"
php panini.php 01.0544 liw
echo "924 - Processing 01.0544 luw analysis started at $(timestamp)"
php panini.php 01.0544 luw
echo "925 - Processing 01.0544 lfw analysis started at $(timestamp)"
php panini.php 01.0544 lfw
echo "926 - Processing 01.0544 low analysis started at $(timestamp)"
php panini.php 01.0544 low
echo "927 - Processing 01.0544 laN analysis started at $(timestamp)"
php panini.php 01.0544 laN
echo "928 - Processing 01.0544 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0544 ASIrliN
echo "929 - Processing 01.0544 viDiliN analysis started at $(timestamp)"
php panini.php 01.0544 viDiliN
echo "930 - Processing 01.0544 luN analysis started at $(timestamp)"
php panini.php 01.0544 luN
echo "931 - Processing 01.0544 lfN analysis started at $(timestamp)"
php panini.php 01.0544 lfN
echo "932 - Processing 05.0035 liw analysis started at $(timestamp)"
php panini.php 05.0035 liw
echo "933 - Processing 05.0035 low analysis started at $(timestamp)"
php panini.php 05.0035 low
echo "934 - Processing 05.0035 viDiliN analysis started at $(timestamp)"
php panini.php 05.0035 viDiliN
echo "935 - Processing 05.0035 lfN analysis started at $(timestamp)"
php panini.php 05.0035 lfN
echo "936 - Processing 01.1098 liw analysis started at $(timestamp)"
php panini.php 01.1098 liw
echo "937 - Processing 01.1098 luw analysis started at $(timestamp)"
php panini.php 01.1098 luw
echo "938 - Processing 01.1098 laN analysis started at $(timestamp)"
php panini.php 01.1098 laN
echo "939 - Processing 01.1098 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1098 ASIrliN
echo "940 - Processing 01.1098 viDiliN analysis started at $(timestamp)"
php panini.php 01.1098 viDiliN
echo "941 - Processing 01.1098 luN analysis started at $(timestamp)"
php panini.php 01.1098 luN
echo "942 - Processing 01.1110 law analysis started at $(timestamp)"
php panini.php 01.1110 law
echo "943 - Processing 01.1110 liw analysis started at $(timestamp)"
php panini.php 01.1110 liw
echo "944 - Processing 01.1110 luw analysis started at $(timestamp)"
php panini.php 01.1110 luw
echo "945 - Processing 01.1110 lfw analysis started at $(timestamp)"
php panini.php 01.1110 lfw
echo "946 - Processing 01.1110 low analysis started at $(timestamp)"
php panini.php 01.1110 low
echo "947 - Processing 01.1110 laN analysis started at $(timestamp)"
php panini.php 01.1110 laN
echo "948 - Processing 01.1110 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1110 ASIrliN
echo "949 - Processing 01.1110 viDiliN analysis started at $(timestamp)"
php panini.php 01.1110 viDiliN
echo "950 - Processing 01.1110 luN analysis started at $(timestamp)"
php panini.php 01.1110 luN
echo "951 - Processing 01.1110 lfN analysis started at $(timestamp)"
php panini.php 01.1110 lfN
echo "952 - Processing 06.0107 law analysis started at $(timestamp)"
php panini.php 06.0107 law
echo "953 - Processing 06.0107 liw analysis started at $(timestamp)"
php panini.php 06.0107 liw
echo "954 - Processing 06.0107 luw analysis started at $(timestamp)"
php panini.php 06.0107 luw
echo "955 - Processing 06.0107 lfw analysis started at $(timestamp)"
php panini.php 06.0107 lfw
echo "956 - Processing 06.0107 low analysis started at $(timestamp)"
php panini.php 06.0107 low
echo "957 - Processing 06.0107 laN analysis started at $(timestamp)"
php panini.php 06.0107 laN
echo "958 - Processing 06.0107 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0107 ASIrliN
echo "959 - Processing 06.0107 viDiliN analysis started at $(timestamp)"
php panini.php 06.0107 viDiliN
echo "960 - Processing 06.0107 luN analysis started at $(timestamp)"
php panini.php 06.0107 luN
echo "961 - Processing 06.0107 lfN analysis started at $(timestamp)"
php panini.php 06.0107 lfN
echo "962 - Processing 06.0106 law analysis started at $(timestamp)"
php panini.php 06.0106 law
echo "963 - Processing 06.0106 liw analysis started at $(timestamp)"
php panini.php 06.0106 liw
echo "964 - Processing 06.0106 luw analysis started at $(timestamp)"
php panini.php 06.0106 luw
echo "965 - Processing 06.0106 lfw analysis started at $(timestamp)"
php panini.php 06.0106 lfw
echo "966 - Processing 06.0106 low analysis started at $(timestamp)"
php panini.php 06.0106 low
echo "967 - Processing 06.0106 laN analysis started at $(timestamp)"
php panini.php 06.0106 laN
echo "968 - Processing 06.0106 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0106 ASIrliN
echo "969 - Processing 06.0106 viDiliN analysis started at $(timestamp)"
php panini.php 06.0106 viDiliN
echo "970 - Processing 06.0106 luN analysis started at $(timestamp)"
php panini.php 06.0106 luN
echo "971 - Processing 06.0106 lfN analysis started at $(timestamp)"
php panini.php 06.0106 lfN
echo "972 - Processing 01.0032 law analysis started at $(timestamp)"
php panini.php 01.0032 law
echo "973 - Processing 01.0032 liw analysis started at $(timestamp)"
php panini.php 01.0032 liw
echo "974 - Processing 01.0032 low analysis started at $(timestamp)"
php panini.php 01.0032 low
echo "975 - Processing 01.0032 laN analysis started at $(timestamp)"
php panini.php 01.0032 laN
echo "976 - Processing 01.0032 viDiliN analysis started at $(timestamp)"
php panini.php 01.0032 viDiliN
echo "977 - Processing 01.0032 luN analysis started at $(timestamp)"
php panini.php 01.0032 luN
echo "978 - Processing 06.0052 law analysis started at $(timestamp)"
php panini.php 06.0052 law
echo "979 - Processing 06.0052 liw analysis started at $(timestamp)"
php panini.php 06.0052 liw
echo "980 - Processing 06.0052 luw analysis started at $(timestamp)"
php panini.php 06.0052 luw
echo "981 - Processing 06.0052 lfw analysis started at $(timestamp)"
php panini.php 06.0052 lfw
echo "982 - Processing 06.0052 low analysis started at $(timestamp)"
php panini.php 06.0052 low
echo "983 - Processing 06.0052 laN analysis started at $(timestamp)"
php panini.php 06.0052 laN
echo "984 - Processing 06.0052 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0052 ASIrliN
echo "985 - Processing 06.0052 viDiliN analysis started at $(timestamp)"
php panini.php 06.0052 viDiliN
echo "986 - Processing 06.0052 luN analysis started at $(timestamp)"
php panini.php 06.0052 luN
echo "987 - Processing 06.0052 lfN analysis started at $(timestamp)"
php panini.php 06.0052 lfN
echo "988 - Processing 06.0371 luN analysis started at $(timestamp)"
php panini.php 06.0371 luN
echo "989 - Processing 01.0776 law analysis started at $(timestamp)"
php panini.php 01.0776 law
echo "990 - Processing 01.0776 liw analysis started at $(timestamp)"
php panini.php 01.0776 liw
echo "991 - Processing 01.0776 luw analysis started at $(timestamp)"
php panini.php 01.0776 luw
echo "992 - Processing 01.0776 lfw analysis started at $(timestamp)"
php panini.php 01.0776 lfw
echo "993 - Processing 01.0776 low analysis started at $(timestamp)"
php panini.php 01.0776 low
echo "994 - Processing 01.0776 laN analysis started at $(timestamp)"
php panini.php 01.0776 laN
echo "995 - Processing 01.0776 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0776 ASIrliN
echo "996 - Processing 01.0776 viDiliN analysis started at $(timestamp)"
php panini.php 01.0776 viDiliN
echo "997 - Processing 01.0776 luN analysis started at $(timestamp)"
php panini.php 01.0776 luN
echo "998 - Processing 01.0776 lfN analysis started at $(timestamp)"
php panini.php 01.0776 lfN
echo "999 - Processing 01.0454 luN analysis started at $(timestamp)"
php panini.php 01.0454 luN
echo "1000 - Processing 04.0027 liw analysis started at $(timestamp)"
php panini.php 04.0027 liw
echo "1001 - Processing 04.0027 luN analysis started at $(timestamp)"
php panini.php 04.0027 luN
echo "1002 - Processing 10.0025 liw analysis started at $(timestamp)"
php panini.php 10.0025 liw
echo "1003 - Processing 10.0025 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0025 ASIrliN
echo "1004 - Processing 10.0025 luN analysis started at $(timestamp)"
php panini.php 10.0025 luN
echo "1005 - Processing 09.0346 liw analysis started at $(timestamp)"
php panini.php 09.0346 liw
echo "1006 - Processing 09.0346 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0346 ASIrliN
echo "1007 - Processing 01.0731 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0731 ASIrliN
echo "1008 - Processing 09.0258 law analysis started at $(timestamp)"
php panini.php 09.0258 law
echo "1009 - Processing 09.0258 low analysis started at $(timestamp)"
php panini.php 09.0258 low
echo "1010 - Processing 09.0258 laN analysis started at $(timestamp)"
php panini.php 09.0258 laN
echo "1011 - Processing 09.0258 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0258 ASIrliN
echo "1012 - Processing 09.0258 viDiliN analysis started at $(timestamp)"
php panini.php 09.0258 viDiliN
echo "1013 - Processing 09.0258 luN analysis started at $(timestamp)"
php panini.php 09.0258 luN
echo "1014 - Processing 10.0043 luN analysis started at $(timestamp)"
php panini.php 10.0043 luN
echo "1015 - Processing 09.0034 law analysis started at $(timestamp)"
php panini.php 09.0034 law
echo "1016 - Processing 09.0034 liw analysis started at $(timestamp)"
php panini.php 09.0034 liw
echo "1017 - Processing 09.0034 low analysis started at $(timestamp)"
php panini.php 09.0034 low
echo "1018 - Processing 09.0034 laN analysis started at $(timestamp)"
php panini.php 09.0034 laN
echo "1019 - Processing 01.0043 law analysis started at $(timestamp)"
php panini.php 01.0043 law
echo "1020 - Processing 01.0043 liw analysis started at $(timestamp)"
php panini.php 01.0043 liw
echo "1021 - Processing 01.0043 luw analysis started at $(timestamp)"
php panini.php 01.0043 luw
echo "1022 - Processing 01.0043 lfw analysis started at $(timestamp)"
php panini.php 01.0043 lfw
echo "1023 - Processing 01.0043 low analysis started at $(timestamp)"
php panini.php 01.0043 low
echo "1024 - Processing 01.0043 laN analysis started at $(timestamp)"
php panini.php 01.0043 laN
echo "1025 - Processing 01.0043 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0043 ASIrliN
echo "1026 - Processing 01.0043 viDiliN analysis started at $(timestamp)"
php panini.php 01.0043 viDiliN
echo "1027 - Processing 01.0043 luN analysis started at $(timestamp)"
php panini.php 01.0043 luN
echo "1028 - Processing 01.0043 lfN analysis started at $(timestamp)"
php panini.php 01.0043 lfN
echo "1029 - Processing 10.0347 luN analysis started at $(timestamp)"
php panini.php 10.0347 luN
echo "1030 - Processing 01.1097 liw analysis started at $(timestamp)"
php panini.php 01.1097 liw
echo "1031 - Processing 01.1097 luw analysis started at $(timestamp)"
php panini.php 01.1097 luw
echo "1032 - Processing 01.1097 lfw analysis started at $(timestamp)"
php panini.php 01.1097 lfw
echo "1033 - Processing 01.1097 low analysis started at $(timestamp)"
php panini.php 01.1097 low
echo "1034 - Processing 01.1097 laN analysis started at $(timestamp)"
php panini.php 01.1097 laN
echo "1035 - Processing 01.1097 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1097 ASIrliN
echo "1036 - Processing 01.1097 viDiliN analysis started at $(timestamp)"
php panini.php 01.1097 viDiliN
echo "1037 - Processing 01.1097 luN analysis started at $(timestamp)"
php panini.php 01.1097 luN
echo "1038 - Processing 01.1097 lfN analysis started at $(timestamp)"
php panini.php 01.1097 lfN
echo "1039 - Processing 01.0916 liw analysis started at $(timestamp)"
php panini.php 01.0916 liw
echo "1040 - Processing 01.0965 liw analysis started at $(timestamp)"
php panini.php 01.0965 liw
echo "1041 - Processing 01.0343 law analysis started at $(timestamp)"
php panini.php 01.0343 law
echo "1042 - Processing 01.0343 liw analysis started at $(timestamp)"
php panini.php 01.0343 liw
echo "1043 - Processing 01.0343 luw analysis started at $(timestamp)"
php panini.php 01.0343 luw
echo "1044 - Processing 01.0343 lfw analysis started at $(timestamp)"
php panini.php 01.0343 lfw
echo "1045 - Processing 01.0343 low analysis started at $(timestamp)"
php panini.php 01.0343 low
echo "1046 - Processing 01.0343 laN analysis started at $(timestamp)"
php panini.php 01.0343 laN
echo "1047 - Processing 01.0343 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0343 ASIrliN
echo "1048 - Processing 01.0343 viDiliN analysis started at $(timestamp)"
php panini.php 01.0343 viDiliN
echo "1049 - Processing 01.0343 luN analysis started at $(timestamp)"
php panini.php 01.0343 luN
echo "1050 - Processing 01.0343 lfN analysis started at $(timestamp)"
php panini.php 01.0343 lfN
echo "1051 - Processing 01.0543 law analysis started at $(timestamp)"
php panini.php 01.0543 law
echo "1052 - Processing 01.0543 liw analysis started at $(timestamp)"
php panini.php 01.0543 liw
echo "1053 - Processing 01.0543 luw analysis started at $(timestamp)"
php panini.php 01.0543 luw
echo "1054 - Processing 01.0543 lfw analysis started at $(timestamp)"
php panini.php 01.0543 lfw
echo "1055 - Processing 01.0543 low analysis started at $(timestamp)"
php panini.php 01.0543 low
echo "1056 - Processing 01.0543 laN analysis started at $(timestamp)"
php panini.php 01.0543 laN
echo "1057 - Processing 01.0543 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0543 ASIrliN
echo "1058 - Processing 01.0543 viDiliN analysis started at $(timestamp)"
php panini.php 01.0543 viDiliN
echo "1059 - Processing 01.0543 luN analysis started at $(timestamp)"
php panini.php 01.0543 luN
echo "1060 - Processing 01.0543 lfN analysis started at $(timestamp)"
php panini.php 01.0543 lfN
echo "1061 - Processing 01.0815 law analysis started at $(timestamp)"
php panini.php 01.0815 law
echo "1062 - Processing 01.0815 liw analysis started at $(timestamp)"
php panini.php 01.0815 liw
echo "1063 - Processing 01.0815 luw analysis started at $(timestamp)"
php panini.php 01.0815 luw
echo "1064 - Processing 01.0815 lfw analysis started at $(timestamp)"
php panini.php 01.0815 lfw
echo "1065 - Processing 01.0815 low analysis started at $(timestamp)"
php panini.php 01.0815 low
echo "1066 - Processing 01.0815 laN analysis started at $(timestamp)"
php panini.php 01.0815 laN
echo "1067 - Processing 01.0815 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0815 ASIrliN
echo "1068 - Processing 01.0815 viDiliN analysis started at $(timestamp)"
php panini.php 01.0815 viDiliN
echo "1069 - Processing 01.0815 luN analysis started at $(timestamp)"
php panini.php 01.0815 luN
echo "1070 - Processing 01.0815 lfN analysis started at $(timestamp)"
php panini.php 01.0815 lfN
echo "1071 - Processing 06.0020 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0020 ASIrliN
echo "1072 - Processing 01.0785 luN analysis started at $(timestamp)"
php panini.php 01.0785 luN
echo "1073 - Processing 01.0785 lfN analysis started at $(timestamp)"
php panini.php 01.0785 lfN
echo "1074 - Processing 01.1036 luN analysis started at $(timestamp)"
php panini.php 01.1036 luN
echo "1075 - Processing 01.1036 lfN analysis started at $(timestamp)"
php panini.php 01.1036 lfN
echo "1076 - Processing 09.0028 law analysis started at $(timestamp)"
php panini.php 09.0028 law
echo "1077 - Processing 09.0028 liw analysis started at $(timestamp)"
php panini.php 09.0028 liw
echo "1078 - Processing 09.0028 lfw analysis started at $(timestamp)"
php panini.php 09.0028 lfw
echo "1079 - Processing 09.0028 low analysis started at $(timestamp)"
php panini.php 09.0028 low
echo "1080 - Processing 09.0028 laN analysis started at $(timestamp)"
php panini.php 09.0028 laN
echo "1081 - Processing 09.0028 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0028 ASIrliN
echo "1082 - Processing 09.0028 viDiliN analysis started at $(timestamp)"
php panini.php 09.0028 viDiliN
echo "1083 - Processing 09.0028 lfN analysis started at $(timestamp)"
php panini.php 09.0028 lfN
echo "1084 - Processing 04.0026 law analysis started at $(timestamp)"
php panini.php 04.0026 law
echo "1085 - Processing 04.0026 liw analysis started at $(timestamp)"
php panini.php 04.0026 liw
echo "1086 - Processing 04.0026 lfw analysis started at $(timestamp)"
php panini.php 04.0026 lfw
echo "1087 - Processing 04.0026 low analysis started at $(timestamp)"
php panini.php 04.0026 low
echo "1088 - Processing 04.0026 laN analysis started at $(timestamp)"
php panini.php 04.0026 laN
echo "1089 - Processing 04.0026 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0026 ASIrliN
echo "1090 - Processing 04.0026 viDiliN analysis started at $(timestamp)"
php panini.php 04.0026 viDiliN
echo "1091 - Processing 04.0026 lfN analysis started at $(timestamp)"
php panini.php 04.0026 lfN
echo "1092 - Processing 01.0108 liw analysis started at $(timestamp)"
php panini.php 01.0108 liw
echo "1093 - Processing 01.0108 luN analysis started at $(timestamp)"
php panini.php 01.0108 luN
echo "1094 - Processing 01.0109 law analysis started at $(timestamp)"
php panini.php 01.0109 law
echo "1095 - Processing 01.0109 luN analysis started at $(timestamp)"
php panini.php 01.0109 luN
echo "1096 - Processing 06.0189 luN analysis started at $(timestamp)"
php panini.php 06.0189 luN
echo "1097 - Processing 04.0197 luN analysis started at $(timestamp)"
php panini.php 04.0197 luN
echo "1098 - Processing 10.0254 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0254 ASIrliN
echo "1099 - Processing 01.0778 liw analysis started at $(timestamp)"
php panini.php 01.0778 liw
echo "1100 - Processing 01.0778 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0778 ASIrliN
echo "1101 - Processing 01.0778 luN analysis started at $(timestamp)"
php panini.php 01.0778 luN
echo "1102 - Processing 01.0778 lfN analysis started at $(timestamp)"
php panini.php 01.0778 lfN
echo "1103 - Processing 07.0022 law analysis started at $(timestamp)"
php panini.php 07.0022 law
echo "1104 - Processing 07.0022 liw analysis started at $(timestamp)"
php panini.php 07.0022 liw
echo "1105 - Processing 07.0022 luw analysis started at $(timestamp)"
php panini.php 07.0022 luw
echo "1106 - Processing 07.0022 lfw analysis started at $(timestamp)"
php panini.php 07.0022 lfw
echo "1107 - Processing 07.0022 viDiliN analysis started at $(timestamp)"
php panini.php 07.0022 viDiliN
echo "1108 - Processing 07.0022 lfN analysis started at $(timestamp)"
php panini.php 07.0022 lfN
echo "1109 - Processing 01.0551 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0551 ASIrliN
echo "1110 - Processing 04.0109 law analysis started at $(timestamp)"
php panini.php 04.0109 law
echo "1111 - Processing 04.0109 liw analysis started at $(timestamp)"
php panini.php 04.0109 liw
echo "1112 - Processing 04.0109 luw analysis started at $(timestamp)"
php panini.php 04.0109 luw
echo "1113 - Processing 04.0109 lfw analysis started at $(timestamp)"
php panini.php 04.0109 lfw
echo "1114 - Processing 04.0109 low analysis started at $(timestamp)"
php panini.php 04.0109 low
echo "1115 - Processing 04.0109 laN analysis started at $(timestamp)"
php panini.php 04.0109 laN
echo "1116 - Processing 04.0109 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0109 ASIrliN
echo "1117 - Processing 04.0109 viDiliN analysis started at $(timestamp)"
php panini.php 04.0109 viDiliN
echo "1118 - Processing 04.0109 luN analysis started at $(timestamp)"
php panini.php 04.0109 luN
echo "1119 - Processing 04.0109 lfN analysis started at $(timestamp)"
php panini.php 04.0109 lfN
echo "1120 - Processing 01.0110 luN analysis started at $(timestamp)"
php panini.php 01.0110 luN
echo "1121 - Processing 01.1126 laN analysis started at $(timestamp)"
php panini.php 01.1126 laN
echo "1122 - Processing 01.1126 viDiliN analysis started at $(timestamp)"
php panini.php 01.1126 viDiliN
echo "1123 - Processing 01.1126 luN analysis started at $(timestamp)"
php panini.php 01.1126 luN
echo "1124 - Processing 01.0420 luN analysis started at $(timestamp)"
php panini.php 01.0420 luN
echo "1125 - Processing 04.0017 lfN analysis started at $(timestamp)"
php panini.php 04.0017 lfN
echo "1126 - Processing 01.0111 luN analysis started at $(timestamp)"
php panini.php 01.0111 luN
echo "1127 - Processing 04.0018 law analysis started at $(timestamp)"
php panini.php 04.0018 law
echo "1128 - Processing 04.0018 liw analysis started at $(timestamp)"
php panini.php 04.0018 liw
echo "1129 - Processing 04.0018 luw analysis started at $(timestamp)"
php panini.php 04.0018 luw
echo "1130 - Processing 04.0018 lfw analysis started at $(timestamp)"
php panini.php 04.0018 lfw
echo "1131 - Processing 04.0018 low analysis started at $(timestamp)"
php panini.php 04.0018 low
echo "1132 - Processing 04.0018 laN analysis started at $(timestamp)"
php panini.php 04.0018 laN
echo "1133 - Processing 04.0018 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0018 ASIrliN
echo "1134 - Processing 04.0018 viDiliN analysis started at $(timestamp)"
php panini.php 04.0018 viDiliN
echo "1135 - Processing 04.0018 luN analysis started at $(timestamp)"
php panini.php 04.0018 luN
echo "1136 - Processing 04.0018 lfN analysis started at $(timestamp)"
php panini.php 04.0018 lfN
echo "1137 - Processing 02.0029 law analysis started at $(timestamp)"
php panini.php 02.0029 law
echo "1138 - Processing 02.0029 liw analysis started at $(timestamp)"
php panini.php 02.0029 liw
echo "1139 - Processing 02.0029 luw analysis started at $(timestamp)"
php panini.php 02.0029 luw
echo "1140 - Processing 02.0029 lfw analysis started at $(timestamp)"
php panini.php 02.0029 lfw
echo "1141 - Processing 02.0029 low analysis started at $(timestamp)"
php panini.php 02.0029 low
echo "1142 - Processing 02.0029 laN analysis started at $(timestamp)"
php panini.php 02.0029 laN
echo "1143 - Processing 02.0029 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0029 ASIrliN
echo "1144 - Processing 02.0029 viDiliN analysis started at $(timestamp)"
php panini.php 02.0029 viDiliN
echo "1145 - Processing 02.0029 luN analysis started at $(timestamp)"
php panini.php 02.0029 luN
echo "1146 - Processing 02.0029 lfN analysis started at $(timestamp)"
php panini.php 02.0029 lfN
echo "1147 - Processing 10.0044 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0044 ASIrliN
echo "1148 - Processing 01.0278 liw analysis started at $(timestamp)"
php panini.php 01.0278 liw
echo "1149 - Processing 01.0278 luw analysis started at $(timestamp)"
php panini.php 01.0278 luw
echo "1150 - Processing 01.0278 lfw analysis started at $(timestamp)"
php panini.php 01.0278 lfw
echo "1151 - Processing 01.0278 luN analysis started at $(timestamp)"
php panini.php 01.0278 luN
echo "1152 - Processing 01.0278 lfN analysis started at $(timestamp)"
php panini.php 01.0278 lfN
echo "1153 - Processing 06.0116 law analysis started at $(timestamp)"
php panini.php 06.0116 law
echo "1154 - Processing 06.0116 liw analysis started at $(timestamp)"
php panini.php 06.0116 liw
echo "1155 - Processing 06.0116 luw analysis started at $(timestamp)"
php panini.php 06.0116 luw
echo "1156 - Processing 06.0116 lfw analysis started at $(timestamp)"
php panini.php 06.0116 lfw
echo "1157 - Processing 06.0116 low analysis started at $(timestamp)"
php panini.php 06.0116 low
echo "1158 - Processing 06.0116 laN analysis started at $(timestamp)"
php panini.php 06.0116 laN
echo "1159 - Processing 06.0116 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0116 ASIrliN
echo "1160 - Processing 06.0116 viDiliN analysis started at $(timestamp)"
php panini.php 06.0116 viDiliN
echo "1161 - Processing 06.0116 lfN analysis started at $(timestamp)"
php panini.php 06.0116 lfN
echo "1162 - Processing 01.0406 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0406 ASIrliN
echo "1163 - Processing 10.0166 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0166 ASIrliN
echo "1164 - Processing 10.0489 liw analysis started at $(timestamp)"
php panini.php 10.0489 liw
echo "1165 - Processing 10.0489 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0489 ASIrliN
echo "1166 - Processing 06.0034 low analysis started at $(timestamp)"
php panini.php 06.0034 low
echo "1167 - Processing 06.0034 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0034 ASIrliN
echo "1168 - Processing 06.0034 lfN analysis started at $(timestamp)"
php panini.php 06.0034 lfN
echo "1169 - Processing 01.0474 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0474 ASIrliN
echo "1170 - Processing 01.0474 lfN analysis started at $(timestamp)"
php panini.php 01.0474 lfN
echo "1171 - Processing 09.0057 luN analysis started at $(timestamp)"
php panini.php 09.0057 luN
echo "1172 - Processing 01.0471 lfN analysis started at $(timestamp)"
php panini.php 01.0471 lfN
echo "1173 - Processing 01.0475 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0475 ASIrliN
echo "1174 - Processing 01.0475 lfN analysis started at $(timestamp)"
php panini.php 01.0475 lfN
echo "1175 - Processing 06.0035 low analysis started at $(timestamp)"
php panini.php 06.0035 low
echo "1176 - Processing 06.0035 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0035 ASIrliN
echo "1177 - Processing 06.0035 lfN analysis started at $(timestamp)"
php panini.php 06.0035 lfN
echo "1178 - Processing 03.0022 law analysis started at $(timestamp)"
php panini.php 03.0022 law
echo "1179 - Processing 03.0022 low analysis started at $(timestamp)"
php panini.php 03.0022 low
echo "1180 - Processing 03.0022 laN analysis started at $(timestamp)"
php panini.php 03.0022 laN
echo "1181 - Processing 03.0022 viDiliN analysis started at $(timestamp)"
php panini.php 03.0022 viDiliN
echo "1182 - Processing 01.0651 liw analysis started at $(timestamp)"
php panini.php 01.0651 liw
echo "1183 - Processing 01.0651 lfN analysis started at $(timestamp)"
php panini.php 01.0651 lfN
echo "1184 - Processing 01.0838 luN analysis started at $(timestamp)"
php panini.php 01.0838 luN
echo "1185 - Processing 01.0407 law analysis started at $(timestamp)"
php panini.php 01.0407 law
echo "1186 - Processing 01.0407 liw analysis started at $(timestamp)"
php panini.php 01.0407 liw
echo "1187 - Processing 01.0407 luw analysis started at $(timestamp)"
php panini.php 01.0407 luw
echo "1188 - Processing 01.0407 lfw analysis started at $(timestamp)"
php panini.php 01.0407 lfw
echo "1189 - Processing 01.0407 low analysis started at $(timestamp)"
php panini.php 01.0407 low
echo "1190 - Processing 01.0407 laN analysis started at $(timestamp)"
php panini.php 01.0407 laN
echo "1191 - Processing 01.0407 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0407 ASIrliN
echo "1192 - Processing 01.0407 viDiliN analysis started at $(timestamp)"
php panini.php 01.0407 viDiliN
echo "1193 - Processing 01.0407 luN analysis started at $(timestamp)"
php panini.php 01.0407 luN
echo "1194 - Processing 01.0407 lfN analysis started at $(timestamp)"
php panini.php 01.0407 lfN
echo "1195 - Processing 10.0212 luN analysis started at $(timestamp)"
php panini.php 10.0212 luN
echo "1196 - Processing 04.0047 luN analysis started at $(timestamp)"
php panini.php 04.0047 luN
echo "1197 - Processing 06.0077 liw analysis started at $(timestamp)"
php panini.php 06.0077 liw
echo "1198 - Processing 06.0077 lfN analysis started at $(timestamp)"
php panini.php 06.0077 lfN
echo "1199 - Processing 08.0006 law analysis started at $(timestamp)"
php panini.php 08.0006 law
echo "1200 - Processing 08.0006 low analysis started at $(timestamp)"
php panini.php 08.0006 low
echo "1201 - Processing 08.0006 laN analysis started at $(timestamp)"
php panini.php 08.0006 laN
echo "1202 - Processing 07.0009 law analysis started at $(timestamp)"
php panini.php 07.0009 law
echo "1203 - Processing 07.0009 low analysis started at $(timestamp)"
php panini.php 07.0009 low
echo "1204 - Processing 07.0009 laN analysis started at $(timestamp)"
php panini.php 07.0009 laN
echo "1205 - Processing 07.0009 luN analysis started at $(timestamp)"
php panini.php 07.0009 luN
echo "1206 - Processing 06.0355 luN analysis started at $(timestamp)"
php panini.php 06.0355 luN
echo "1207 - Processing 10.0028 luN analysis started at $(timestamp)"
php panini.php 10.0028 luN
echo "1208 - Processing 10.0092 luN analysis started at $(timestamp)"
php panini.php 10.0092 luN
echo "1209 - Processing 05.0351 law analysis started at $(timestamp)"
php panini.php 05.0351 law
echo "1210 - Processing 05.0351 low analysis started at $(timestamp)"
php panini.php 05.0351 low
echo "1211 - Processing 05.0351 laN analysis started at $(timestamp)"
php panini.php 05.0351 laN
echo "1212 - Processing 05.0351 viDiliN analysis started at $(timestamp)"
php panini.php 05.0351 viDiliN
echo "1213 - Processing 05.0351 luN analysis started at $(timestamp)"
php panini.php 05.0351 luN
echo "1214 - Processing 06.0030 law analysis started at $(timestamp)"
php panini.php 06.0030 law
echo "1215 - Processing 06.0030 liw analysis started at $(timestamp)"
php panini.php 06.0030 liw
echo "1216 - Processing 06.0030 luw analysis started at $(timestamp)"
php panini.php 06.0030 luw
echo "1217 - Processing 06.0030 lfw analysis started at $(timestamp)"
php panini.php 06.0030 lfw
echo "1218 - Processing 06.0030 low analysis started at $(timestamp)"
php panini.php 06.0030 low
echo "1219 - Processing 06.0030 laN analysis started at $(timestamp)"
php panini.php 06.0030 laN
echo "1220 - Processing 06.0030 viDiliN analysis started at $(timestamp)"
php panini.php 06.0030 viDiliN
echo "1221 - Processing 06.0030 luN analysis started at $(timestamp)"
php panini.php 06.0030 luN
echo "1222 - Processing 06.0030 lfN analysis started at $(timestamp)"
php panini.php 06.0030 lfN
echo "1223 - Processing 06.0029 law analysis started at $(timestamp)"
php panini.php 06.0029 law
echo "1224 - Processing 06.0029 liw analysis started at $(timestamp)"
php panini.php 06.0029 liw
echo "1225 - Processing 06.0029 luw analysis started at $(timestamp)"
php panini.php 06.0029 luw
echo "1226 - Processing 06.0029 lfw analysis started at $(timestamp)"
php panini.php 06.0029 lfw
echo "1227 - Processing 06.0029 low analysis started at $(timestamp)"
php panini.php 06.0029 low
echo "1228 - Processing 06.0029 laN analysis started at $(timestamp)"
php panini.php 06.0029 laN
echo "1229 - Processing 06.0029 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0029 ASIrliN
echo "1230 - Processing 06.0029 viDiliN analysis started at $(timestamp)"
php panini.php 06.0029 viDiliN
echo "1231 - Processing 06.0029 luN analysis started at $(timestamp)"
php panini.php 06.0029 luN
echo "1232 - Processing 06.0029 lfN analysis started at $(timestamp)"
php panini.php 06.0029 lfN
echo "1233 - Processing 06.0031 law analysis started at $(timestamp)"
php panini.php 06.0031 law
echo "1234 - Processing 06.0031 low analysis started at $(timestamp)"
php panini.php 06.0031 low
echo "1235 - Processing 06.0031 laN analysis started at $(timestamp)"
php panini.php 06.0031 laN
echo "1236 - Processing 06.0031 viDiliN analysis started at $(timestamp)"
php panini.php 06.0031 viDiliN
echo "1237 - Processing 06.0031 luN analysis started at $(timestamp)"
php panini.php 06.0031 luN
echo "1238 - Processing 04.0141 lfN analysis started at $(timestamp)"
php panini.php 04.0141 lfN
echo "1239 - Processing 06.0075 liw analysis started at $(timestamp)"
php panini.php 06.0075 liw
echo "1240 - Processing 06.0075 luN analysis started at $(timestamp)"
php panini.php 06.0075 luN
echo "1241 - Processing 06.0075 lfN analysis started at $(timestamp)"
php panini.php 06.0075 lfN
echo "1242 - Processing 07.0018 law analysis started at $(timestamp)"
php panini.php 07.0018 law
echo "1243 - Processing 07.0018 laN analysis started at $(timestamp)"
php panini.php 07.0018 laN
echo "1244 - Processing 01.1124 liw analysis started at $(timestamp)"
php panini.php 01.1124 liw
echo "1245 - Processing 01.1124 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1124 ASIrliN
echo "1246 - Processing 01.0263 liw analysis started at $(timestamp)"
php panini.php 01.0263 liw
echo "1247 - Processing 01.0263 lfN analysis started at $(timestamp)"
php panini.php 01.0263 lfN
echo "1248 - Processing 01.0572 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0572 ASIrliN
echo "1249 - Processing 01.1141 luw analysis started at $(timestamp)"
php panini.php 01.1141 luw
echo "1250 - Processing 01.1141 lfw analysis started at $(timestamp)"
php panini.php 01.1141 lfw
echo "1251 - Processing 10.0292 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0292 ASIrliN
echo "1252 - Processing 01.0748 law analysis started at $(timestamp)"
php panini.php 01.0748 law
echo "1253 - Processing 01.0748 liw analysis started at $(timestamp)"
php panini.php 01.0748 liw
echo "1254 - Processing 01.0748 luw analysis started at $(timestamp)"
php panini.php 01.0748 luw
echo "1255 - Processing 01.0748 lfw analysis started at $(timestamp)"
php panini.php 01.0748 lfw
echo "1256 - Processing 01.0748 low analysis started at $(timestamp)"
php panini.php 01.0748 low
echo "1257 - Processing 01.0748 laN analysis started at $(timestamp)"
php panini.php 01.0748 laN
echo "1258 - Processing 01.0748 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0748 ASIrliN
echo "1259 - Processing 01.0748 viDiliN analysis started at $(timestamp)"
php panini.php 01.0748 viDiliN
echo "1260 - Processing 01.0748 luN analysis started at $(timestamp)"
php panini.php 01.0748 luN
echo "1261 - Processing 01.0748 lfN analysis started at $(timestamp)"
php panini.php 01.0748 lfN
echo "1262 - Processing 01.0172 law analysis started at $(timestamp)"
php panini.php 01.0172 law
echo "1263 - Processing 01.0172 liw analysis started at $(timestamp)"
php panini.php 01.0172 liw
echo "1264 - Processing 01.0172 luw analysis started at $(timestamp)"
php panini.php 01.0172 luw
echo "1265 - Processing 01.0172 lfw analysis started at $(timestamp)"
php panini.php 01.0172 lfw
echo "1266 - Processing 01.0172 low analysis started at $(timestamp)"
php panini.php 01.0172 low
echo "1267 - Processing 01.0172 laN analysis started at $(timestamp)"
php panini.php 01.0172 laN
echo "1268 - Processing 01.0172 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0172 ASIrliN
echo "1269 - Processing 01.0172 viDiliN analysis started at $(timestamp)"
php panini.php 01.0172 viDiliN
echo "1270 - Processing 01.0172 luN analysis started at $(timestamp)"
php panini.php 01.0172 luN
echo "1271 - Processing 01.0172 lfN analysis started at $(timestamp)"
php panini.php 01.0172 lfN
echo "1272 - Processing 01.0160 law analysis started at $(timestamp)"
php panini.php 01.0160 law
echo "1273 - Processing 01.0160 liw analysis started at $(timestamp)"
php panini.php 01.0160 liw
echo "1274 - Processing 01.0160 luw analysis started at $(timestamp)"
php panini.php 01.0160 luw
echo "1275 - Processing 01.0160 lfw analysis started at $(timestamp)"
php panini.php 01.0160 lfw
echo "1276 - Processing 01.0160 low analysis started at $(timestamp)"
php panini.php 01.0160 low
echo "1277 - Processing 01.0160 laN analysis started at $(timestamp)"
php panini.php 01.0160 laN
echo "1278 - Processing 01.0160 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0160 ASIrliN
echo "1279 - Processing 01.0160 viDiliN analysis started at $(timestamp)"
php panini.php 01.0160 viDiliN
echo "1280 - Processing 01.0160 luN analysis started at $(timestamp)"
php panini.php 01.0160 luN
echo "1281 - Processing 01.0160 lfN analysis started at $(timestamp)"
php panini.php 01.0160 lfN
echo "1282 - Processing 01.0434 law analysis started at $(timestamp)"
php panini.php 01.0434 law
echo "1283 - Processing 01.0434 low analysis started at $(timestamp)"
php panini.php 01.0434 low
echo "1284 - Processing 01.0434 laN analysis started at $(timestamp)"
php panini.php 01.0434 laN
echo "1285 - Processing 01.0434 viDiliN analysis started at $(timestamp)"
php panini.php 01.0434 viDiliN
echo "1286 - Processing 01.0173 law analysis started at $(timestamp)"
php panini.php 01.0173 law
echo "1287 - Processing 01.0173 liw analysis started at $(timestamp)"
php panini.php 01.0173 liw
echo "1288 - Processing 01.0173 luw analysis started at $(timestamp)"
php panini.php 01.0173 luw
echo "1289 - Processing 01.0173 lfw analysis started at $(timestamp)"
php panini.php 01.0173 lfw
echo "1290 - Processing 01.0173 low analysis started at $(timestamp)"
php panini.php 01.0173 low
echo "1291 - Processing 01.0173 laN analysis started at $(timestamp)"
php panini.php 01.0173 laN
echo "1292 - Processing 01.0173 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0173 ASIrliN
echo "1293 - Processing 01.0173 viDiliN analysis started at $(timestamp)"
php panini.php 01.0173 viDiliN
echo "1294 - Processing 01.0173 luN analysis started at $(timestamp)"
php panini.php 01.0173 luN
echo "1295 - Processing 01.0173 lfN analysis started at $(timestamp)"
php panini.php 01.0173 lfN
echo "1296 - Processing 06.0221 luN analysis started at $(timestamp)"
php panini.php 06.0221 luN
echo "1297 - Processing 01.0472 lfN analysis started at $(timestamp)"
php panini.php 01.0472 lfN
echo "1298 - Processing 01.0476 law analysis started at $(timestamp)"
php panini.php 01.0476 law
echo "1299 - Processing 01.0476 liw analysis started at $(timestamp)"
php panini.php 01.0476 liw
echo "1300 - Processing 01.0476 luw analysis started at $(timestamp)"
php panini.php 01.0476 luw
echo "1301 - Processing 01.0476 lfw analysis started at $(timestamp)"
php panini.php 01.0476 lfw
echo "1302 - Processing 01.0476 low analysis started at $(timestamp)"
php panini.php 01.0476 low
echo "1303 - Processing 01.0476 laN analysis started at $(timestamp)"
php panini.php 01.0476 laN
echo "1304 - Processing 01.0476 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0476 ASIrliN
echo "1305 - Processing 01.0476 viDiliN analysis started at $(timestamp)"
php panini.php 01.0476 viDiliN
echo "1306 - Processing 01.0476 luN analysis started at $(timestamp)"
php panini.php 01.0476 luN
echo "1307 - Processing 01.0476 lfN analysis started at $(timestamp)"
php panini.php 01.0476 lfN
echo "1308 - Processing 01.0473 lfN analysis started at $(timestamp)"
php panini.php 01.0473 lfN
echo "1309 - Processing 01.0477 law analysis started at $(timestamp)"
php panini.php 01.0477 law
echo "1310 - Processing 01.0477 liw analysis started at $(timestamp)"
php panini.php 01.0477 liw
echo "1311 - Processing 01.0477 luw analysis started at $(timestamp)"
php panini.php 01.0477 luw
echo "1312 - Processing 01.0477 lfw analysis started at $(timestamp)"
php panini.php 01.0477 lfw
echo "1313 - Processing 01.0477 low analysis started at $(timestamp)"
php panini.php 01.0477 low
echo "1314 - Processing 01.0477 laN analysis started at $(timestamp)"
php panini.php 01.0477 laN
echo "1315 - Processing 01.0477 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0477 ASIrliN
echo "1316 - Processing 01.0477 viDiliN analysis started at $(timestamp)"
php panini.php 01.0477 viDiliN
echo "1317 - Processing 01.0477 luN analysis started at $(timestamp)"
php panini.php 01.0477 luN
echo "1318 - Processing 01.0477 lfN analysis started at $(timestamp)"
php panini.php 01.0477 lfN
echo "1319 - Processing 06.0021 luN analysis started at $(timestamp)"
php panini.php 06.0021 luN
echo "1320 - Processing 01.0884 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0884 ASIrliN
echo "1321 - Processing 01.0884 luN analysis started at $(timestamp)"
php panini.php 01.0884 luN
echo "1322 - Processing 01.1156 luN analysis started at $(timestamp)"
php panini.php 01.1156 luN
echo "1323 - Processing 01.0167 law analysis started at $(timestamp)"
php panini.php 01.0167 law
echo "1324 - Processing 01.0167 liw analysis started at $(timestamp)"
php panini.php 01.0167 liw
echo "1325 - Processing 01.0167 luw analysis started at $(timestamp)"
php panini.php 01.0167 luw
echo "1326 - Processing 01.0167 lfw analysis started at $(timestamp)"
php panini.php 01.0167 lfw
echo "1327 - Processing 01.0167 low analysis started at $(timestamp)"
php panini.php 01.0167 low
echo "1328 - Processing 01.0167 laN analysis started at $(timestamp)"
php panini.php 01.0167 laN
echo "1329 - Processing 01.0167 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0167 ASIrliN
echo "1330 - Processing 01.0167 viDiliN analysis started at $(timestamp)"
php panini.php 01.0167 viDiliN
echo "1331 - Processing 01.0167 luN analysis started at $(timestamp)"
php panini.php 01.0167 luN
echo "1332 - Processing 01.0167 lfN analysis started at $(timestamp)"
php panini.php 01.0167 lfN
echo "1333 - Processing 06.0117 luN analysis started at $(timestamp)"
php panini.php 06.0117 luN
echo "1334 - Processing 06.0117 lfN analysis started at $(timestamp)"
php panini.php 06.0117 lfN
echo "1335 - Processing 01.0652 liw analysis started at $(timestamp)"
php panini.php 01.0652 liw
echo "1336 - Processing 01.0652 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0652 ASIrliN
echo "1337 - Processing 01.0652 luN analysis started at $(timestamp)"
php panini.php 01.0652 luN
echo "1338 - Processing 01.1144 liw analysis started at $(timestamp)"
php panini.php 01.1144 liw
echo "1339 - Processing 01.1144 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1144 ASIrliN
echo "1340 - Processing 10.0317 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0317 ASIrliN
echo "1341 - Processing 10.0194 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0194 ASIrliN
echo "1342 - Processing 01.0874 luN analysis started at $(timestamp)"
php panini.php 01.0874 luN
echo "1343 - Processing 01.0692 luN analysis started at $(timestamp)"
php panini.php 01.0692 luN
echo "1344 - Processing 05.0030 liw analysis started at $(timestamp)"
php panini.php 05.0030 liw
echo "1345 - Processing 01.0181 law analysis started at $(timestamp)"
php panini.php 01.0181 law
echo "1346 - Processing 01.0181 liw analysis started at $(timestamp)"
php panini.php 01.0181 liw
echo "1347 - Processing 01.0181 luw analysis started at $(timestamp)"
php panini.php 01.0181 luw
echo "1348 - Processing 01.0181 lfw analysis started at $(timestamp)"
php panini.php 01.0181 lfw
echo "1349 - Processing 01.0181 low analysis started at $(timestamp)"
php panini.php 01.0181 low
echo "1350 - Processing 01.0181 laN analysis started at $(timestamp)"
php panini.php 01.0181 laN
echo "1351 - Processing 01.0181 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0181 ASIrliN
echo "1352 - Processing 01.0181 viDiliN analysis started at $(timestamp)"
php panini.php 01.0181 viDiliN
echo "1353 - Processing 01.0181 luN analysis started at $(timestamp)"
php panini.php 01.0181 luN
echo "1354 - Processing 01.0181 lfN analysis started at $(timestamp)"
php panini.php 01.0181 lfN
echo "1355 - Processing 01.0017 liw analysis started at $(timestamp)"
php panini.php 01.0017 liw
echo "1356 - Processing 01.0017 luN analysis started at $(timestamp)"
php panini.php 01.0017 luN
echo "1357 - Processing 01.0008 liw analysis started at $(timestamp)"
php panini.php 01.0008 liw
echo "1358 - Processing 01.0008 laN analysis started at $(timestamp)"
php panini.php 01.0008 laN
echo "1359 - Processing 01.0008 viDiliN analysis started at $(timestamp)"
php panini.php 01.0008 viDiliN
echo "1360 - Processing 01.0008 luN analysis started at $(timestamp)"
php panini.php 01.0008 luN
echo "1361 - Processing 05.0026 law analysis started at $(timestamp)"
php panini.php 05.0026 law
echo "1362 - Processing 05.0026 low analysis started at $(timestamp)"
php panini.php 05.0026 low
echo "1363 - Processing 05.0026 laN analysis started at $(timestamp)"
php panini.php 05.0026 laN
echo "1364 - Processing 05.0026 viDiliN analysis started at $(timestamp)"
php panini.php 05.0026 viDiliN
echo "1365 - Processing 02.0068 lfw analysis started at $(timestamp)"
php panini.php 02.0068 lfw
echo "1366 - Processing 02.0068 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0068 ASIrliN
echo "1367 - Processing 02.0068 viDiliN analysis started at $(timestamp)"
php panini.php 02.0068 viDiliN
echo "1368 - Processing 02.0068 luN analysis started at $(timestamp)"
php panini.php 02.0068 luN
echo "1369 - Processing 02.0068 lfN analysis started at $(timestamp)"
php panini.php 02.0068 lfN
echo "1370 - Processing 10.0281 law analysis started at $(timestamp)"
php panini.php 10.0281 law
echo "1371 - Processing 10.0281 liw analysis started at $(timestamp)"
php panini.php 10.0281 liw
echo "1372 - Processing 10.0281 luw analysis started at $(timestamp)"
php panini.php 10.0281 luw
echo "1373 - Processing 10.0281 lfw analysis started at $(timestamp)"
php panini.php 10.0281 lfw
echo "1374 - Processing 10.0281 low analysis started at $(timestamp)"
php panini.php 10.0281 low
echo "1375 - Processing 10.0281 laN analysis started at $(timestamp)"
php panini.php 10.0281 laN
echo "1376 - Processing 10.0281 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0281 ASIrliN
echo "1377 - Processing 10.0281 viDiliN analysis started at $(timestamp)"
php panini.php 10.0281 viDiliN
echo "1378 - Processing 10.0281 lfN analysis started at $(timestamp)"
php panini.php 10.0281 lfN
echo "1379 - Processing 04.0195 law analysis started at $(timestamp)"
php panini.php 04.0195 law
echo "1380 - Processing 04.0195 liw analysis started at $(timestamp)"
php panini.php 04.0195 liw
echo "1381 - Processing 04.0195 luw analysis started at $(timestamp)"
php panini.php 04.0195 luw
echo "1382 - Processing 04.0195 lfw analysis started at $(timestamp)"
php panini.php 04.0195 lfw
echo "1383 - Processing 04.0195 low analysis started at $(timestamp)"
php panini.php 04.0195 low
echo "1384 - Processing 04.0195 laN analysis started at $(timestamp)"
php panini.php 04.0195 laN
echo "1385 - Processing 04.0195 viDiliN analysis started at $(timestamp)"
php panini.php 04.0195 viDiliN
echo "1386 - Processing 04.0195 luN analysis started at $(timestamp)"
php panini.php 04.0195 luN
echo "1387 - Processing 03.0010 law analysis started at $(timestamp)"
php panini.php 03.0010 law
echo "1388 - Processing 03.0010 low analysis started at $(timestamp)"
php panini.php 03.0010 low
echo "1389 - Processing 03.0010 laN analysis started at $(timestamp)"
php panini.php 03.0010 laN
echo "1390 - Processing 03.0010 ASIrliN analysis started at $(timestamp)"
php panini.php 03.0010 ASIrliN
echo "1391 - Processing 03.0010 viDiliN analysis started at $(timestamp)"
php panini.php 03.0010 viDiliN
echo "1392 - Processing 03.0010 luN analysis started at $(timestamp)"
php panini.php 03.0010 luN
echo "1393 - Processing 01.1079 low analysis started at $(timestamp)"
php panini.php 01.1079 low
echo "1394 - Processing 01.1079 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1079 ASIrliN
echo "1395 - Processing 01.1079 viDiliN analysis started at $(timestamp)"
php panini.php 01.1079 viDiliN
echo "1396 - Processing 01.1079 luN analysis started at $(timestamp)"
php panini.php 01.1079 luN
echo "1397 - Processing 01.1149 law analysis started at $(timestamp)"
php panini.php 01.1149 law
echo "1398 - Processing 01.1149 liw analysis started at $(timestamp)"
php panini.php 01.1149 liw
echo "1399 - Processing 01.1149 luw analysis started at $(timestamp)"
php panini.php 01.1149 luw
echo "1400 - Processing 01.1149 lfw analysis started at $(timestamp)"
php panini.php 01.1149 lfw
echo "1401 - Processing 01.1149 low analysis started at $(timestamp)"
php panini.php 01.1149 low
echo "1402 - Processing 01.1149 laN analysis started at $(timestamp)"
php panini.php 01.1149 laN
echo "1403 - Processing 01.1149 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1149 ASIrliN
echo "1404 - Processing 01.1149 viDiliN analysis started at $(timestamp)"
php panini.php 01.1149 viDiliN
echo "1405 - Processing 01.1149 luN analysis started at $(timestamp)"
php panini.php 01.1149 luN
echo "1406 - Processing 01.1149 lfN analysis started at $(timestamp)"
php panini.php 01.1149 lfN
echo "1407 - Processing 01.1025 luN analysis started at $(timestamp)"
php panini.php 01.1025 luN
echo "1408 - Processing 01.1041 liw analysis started at $(timestamp)"
php panini.php 01.1041 liw
echo "1409 - Processing 01.1041 luN analysis started at $(timestamp)"
php panini.php 01.1041 luN
echo "1410 - Processing 01.0676 law analysis started at $(timestamp)"
php panini.php 01.0676 law
echo "1411 - Processing 01.0676 liw analysis started at $(timestamp)"
php panini.php 01.0676 liw
echo "1412 - Processing 01.0676 luw analysis started at $(timestamp)"
php panini.php 01.0676 luw
echo "1413 - Processing 01.0676 lfw analysis started at $(timestamp)"
php panini.php 01.0676 lfw
echo "1414 - Processing 01.0676 low analysis started at $(timestamp)"
php panini.php 01.0676 low
echo "1415 - Processing 01.0676 laN analysis started at $(timestamp)"
php panini.php 01.0676 laN
echo "1416 - Processing 01.0676 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0676 ASIrliN
echo "1417 - Processing 01.0676 viDiliN analysis started at $(timestamp)"
php panini.php 01.0676 viDiliN
echo "1418 - Processing 01.0676 luN analysis started at $(timestamp)"
php panini.php 01.0676 luN
echo "1419 - Processing 01.0676 lfN analysis started at $(timestamp)"
php panini.php 01.0676 lfN
echo "1420 - Processing 02.0005 low analysis started at $(timestamp)"
php panini.php 02.0005 low
echo "1421 - Processing 02.0005 laN analysis started at $(timestamp)"
php panini.php 02.0005 laN
echo "1422 - Processing 02.0005 luN analysis started at $(timestamp)"
php panini.php 02.0005 luN
echo "1423 - Processing 04.0029 liw analysis started at $(timestamp)"
php panini.php 04.0029 liw
echo "1424 - Processing 04.0029 luw analysis started at $(timestamp)"
php panini.php 04.0029 luw
echo "1425 - Processing 04.0029 lfw analysis started at $(timestamp)"
php panini.php 04.0029 lfw
echo "1426 - Processing 04.0029 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0029 ASIrliN
echo "1427 - Processing 04.0029 luN analysis started at $(timestamp)"
php panini.php 04.0029 luN
echo "1428 - Processing 04.0029 lfN analysis started at $(timestamp)"
php panini.php 04.0029 lfN
echo "1429 - Processing 01.0693 luN analysis started at $(timestamp)"
php panini.php 01.0693 luN
echo "1430 - Processing 02.0071 law analysis started at $(timestamp)"
php panini.php 02.0071 law
echo "1431 - Processing 02.0071 liw analysis started at $(timestamp)"
php panini.php 02.0071 liw
echo "1432 - Processing 02.0071 luw analysis started at $(timestamp)"
php panini.php 02.0071 luw
echo "1433 - Processing 02.0071 lfw analysis started at $(timestamp)"
php panini.php 02.0071 lfw
echo "1434 - Processing 02.0071 low analysis started at $(timestamp)"
php panini.php 02.0071 low
echo "1435 - Processing 02.0071 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0071 ASIrliN
echo "1436 - Processing 02.0071 viDiliN analysis started at $(timestamp)"
php panini.php 02.0071 viDiliN
echo "1437 - Processing 02.0071 luN analysis started at $(timestamp)"
php panini.php 02.0071 luN
echo "1438 - Processing 02.0071 lfN analysis started at $(timestamp)"
php panini.php 02.0071 lfN
echo "1439 - Processing 04.0045 luN analysis started at $(timestamp)"
php panini.php 04.0045 luN
echo "1440 - Processing 01.1094 liw analysis started at $(timestamp)"
php panini.php 01.1094 liw
echo "1441 - Processing 01.1094 luw analysis started at $(timestamp)"
php panini.php 01.1094 luw
echo "1442 - Processing 01.1094 lfw analysis started at $(timestamp)"
php panini.php 01.1094 lfw
echo "1443 - Processing 05.0476 law analysis started at $(timestamp)"
php panini.php 05.0476 law
echo "1444 - Processing 05.0476 liw analysis started at $(timestamp)"
php panini.php 05.0476 liw
echo "1445 - Processing 05.0476 luw analysis started at $(timestamp)"
php panini.php 05.0476 luw
echo "1446 - Processing 05.0476 lfw analysis started at $(timestamp)"
php panini.php 05.0476 lfw
echo "1447 - Processing 05.0476 laN analysis started at $(timestamp)"
php panini.php 05.0476 laN
echo "1448 - Processing 05.0476 viDiliN analysis started at $(timestamp)"
php panini.php 05.0476 viDiliN
echo "1449 - Processing 01.0653 liw analysis started at $(timestamp)"
php panini.php 01.0653 liw
echo "1450 - Processing 04.0082 law analysis started at $(timestamp)"
php panini.php 04.0082 law
echo "1451 - Processing 04.0082 liw analysis started at $(timestamp)"
php panini.php 04.0082 liw
echo "1452 - Processing 04.0082 luw analysis started at $(timestamp)"
php panini.php 04.0082 luw
echo "1453 - Processing 04.0082 lfw analysis started at $(timestamp)"
php panini.php 04.0082 lfw
echo "1454 - Processing 04.0082 low analysis started at $(timestamp)"
php panini.php 04.0082 low
echo "1455 - Processing 04.0082 laN analysis started at $(timestamp)"
php panini.php 04.0082 laN
echo "1456 - Processing 04.0082 viDiliN analysis started at $(timestamp)"
php panini.php 04.0082 viDiliN
echo "1457 - Processing 02.0004 low analysis started at $(timestamp)"
php panini.php 02.0004 low
echo "1458 - Processing 02.0004 laN analysis started at $(timestamp)"
php panini.php 02.0004 laN
echo "1459 - Processing 02.0004 lfN analysis started at $(timestamp)"
php panini.php 02.0004 lfN
echo "1460 - Processing 06.0835 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0835 ASIrliN
echo "1461 - Processing 06.0356 luN analysis started at $(timestamp)"
php panini.php 06.0356 luN
echo "1462 - Processing 06.0038 law analysis started at $(timestamp)"
php panini.php 06.0038 law
echo "1463 - Processing 06.0038 liw analysis started at $(timestamp)"
php panini.php 06.0038 liw
echo "1464 - Processing 06.0038 luw analysis started at $(timestamp)"
php panini.php 06.0038 luw
echo "1465 - Processing 06.0038 lfw analysis started at $(timestamp)"
php panini.php 06.0038 lfw
echo "1466 - Processing 06.0038 low analysis started at $(timestamp)"
php panini.php 06.0038 low
echo "1467 - Processing 06.0038 laN analysis started at $(timestamp)"
php panini.php 06.0038 laN
echo "1468 - Processing 06.0038 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0038 ASIrliN
echo "1469 - Processing 06.0038 viDiliN analysis started at $(timestamp)"
php panini.php 06.0038 viDiliN
echo "1470 - Processing 06.0038 luN analysis started at $(timestamp)"
php panini.php 06.0038 luN
echo "1471 - Processing 06.0038 lfN analysis started at $(timestamp)"
php panini.php 06.0038 lfN
echo "1472 - Processing 06.0037 law analysis started at $(timestamp)"
php panini.php 06.0037 law
echo "1473 - Processing 06.0037 liw analysis started at $(timestamp)"
php panini.php 06.0037 liw
echo "1474 - Processing 06.0037 luw analysis started at $(timestamp)"
php panini.php 06.0037 luw
echo "1475 - Processing 06.0037 lfw analysis started at $(timestamp)"
php panini.php 06.0037 lfw
echo "1476 - Processing 06.0037 low analysis started at $(timestamp)"
php panini.php 06.0037 low
echo "1477 - Processing 06.0037 laN analysis started at $(timestamp)"
php panini.php 06.0037 laN
echo "1478 - Processing 06.0037 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0037 ASIrliN
echo "1479 - Processing 06.0037 viDiliN analysis started at $(timestamp)"
php panini.php 06.0037 viDiliN
echo "1480 - Processing 06.0037 luN analysis started at $(timestamp)"
php panini.php 06.0037 luN
echo "1481 - Processing 06.0037 lfN analysis started at $(timestamp)"
php panini.php 06.0037 lfN
echo "1482 - Processing 06.0039 law analysis started at $(timestamp)"
php panini.php 06.0039 law
echo "1483 - Processing 06.0039 low analysis started at $(timestamp)"
php panini.php 06.0039 low
echo "1484 - Processing 06.0039 laN analysis started at $(timestamp)"
php panini.php 06.0039 laN
echo "1485 - Processing 06.0039 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0039 ASIrliN
echo "1486 - Processing 06.0039 viDiliN analysis started at $(timestamp)"
php panini.php 06.0039 viDiliN
echo "1487 - Processing 01.0920 law analysis started at $(timestamp)"
php panini.php 01.0920 law
echo "1488 - Processing 01.0920 liw analysis started at $(timestamp)"
php panini.php 01.0920 liw
echo "1489 - Processing 01.0920 luw analysis started at $(timestamp)"
php panini.php 01.0920 luw
echo "1490 - Processing 01.0920 lfw analysis started at $(timestamp)"
php panini.php 01.0920 lfw
echo "1491 - Processing 01.0920 low analysis started at $(timestamp)"
php panini.php 01.0920 low
echo "1492 - Processing 01.0920 laN analysis started at $(timestamp)"
php panini.php 01.0920 laN
echo "1493 - Processing 01.0920 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0920 ASIrliN
echo "1494 - Processing 01.0920 viDiliN analysis started at $(timestamp)"
php panini.php 01.0920 viDiliN
echo "1495 - Processing 09.0026 law analysis started at $(timestamp)"
php panini.php 09.0026 law
echo "1496 - Processing 09.0026 liw analysis started at $(timestamp)"
php panini.php 09.0026 liw
echo "1497 - Processing 09.0026 luw analysis started at $(timestamp)"
php panini.php 09.0026 luw
echo "1498 - Processing 09.0026 lfw analysis started at $(timestamp)"
php panini.php 09.0026 lfw
echo "1499 - Processing 09.0026 low analysis started at $(timestamp)"
php panini.php 09.0026 low
echo "1500 - Processing 09.0026 laN analysis started at $(timestamp)"
php panini.php 09.0026 laN
echo "1501 - Processing 09.0026 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0026 ASIrliN
echo "1502 - Processing 09.0026 viDiliN analysis started at $(timestamp)"
php panini.php 09.0026 viDiliN
echo "1503 - Processing 05.0037 law analysis started at $(timestamp)"
php panini.php 05.0037 law
echo "1504 - Processing 05.0037 liw analysis started at $(timestamp)"
php panini.php 05.0037 liw
echo "1505 - Processing 05.0037 luw analysis started at $(timestamp)"
php panini.php 05.0037 luw
echo "1506 - Processing 05.0037 lfw analysis started at $(timestamp)"
php panini.php 05.0037 lfw
echo "1507 - Processing 05.0037 low analysis started at $(timestamp)"
php panini.php 05.0037 low
echo "1508 - Processing 05.0037 laN analysis started at $(timestamp)"
php panini.php 05.0037 laN
echo "1509 - Processing 05.0037 ASIrliN analysis started at $(timestamp)"
php panini.php 05.0037 ASIrliN
echo "1510 - Processing 05.0037 viDiliN analysis started at $(timestamp)"
php panini.php 05.0037 viDiliN
echo "1511 - Processing 01.1143 law analysis started at $(timestamp)"
php panini.php 01.1143 law
echo "1512 - Processing 01.1143 low analysis started at $(timestamp)"
php panini.php 01.1143 low
echo "1513 - Processing 01.1143 viDiliN analysis started at $(timestamp)"
php panini.php 01.1143 viDiliN
echo "1514 - Processing 01.1143 luN analysis started at $(timestamp)"
php panini.php 01.1143 luN
echo "1515 - Processing 04.0043 low analysis started at $(timestamp)"
php panini.php 04.0043 low
echo "1516 - Processing 04.0043 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0043 ASIrliN
echo "1517 - Processing 04.0043 viDiliN analysis started at $(timestamp)"
php panini.php 04.0043 viDiliN
echo "1518 - Processing 04.0043 luN analysis started at $(timestamp)"
php panini.php 04.0043 luN
echo "1519 - Processing 02.0035 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0035 ASIrliN
echo "1520 - Processing 01.0842 luN analysis started at $(timestamp)"
php panini.php 01.0842 luN
echo "1521 - Processing 01.1053 law analysis started at $(timestamp)"
php panini.php 01.1053 law
echo "1522 - Processing 01.1053 liw analysis started at $(timestamp)"
php panini.php 01.1053 liw
echo "1523 - Processing 01.1053 luw analysis started at $(timestamp)"
php panini.php 01.1053 luw
echo "1524 - Processing 01.1053 lfw analysis started at $(timestamp)"
php panini.php 01.1053 lfw
echo "1525 - Processing 01.1053 low analysis started at $(timestamp)"
php panini.php 01.1053 low
echo "1526 - Processing 01.1053 laN analysis started at $(timestamp)"
php panini.php 01.1053 laN
echo "1527 - Processing 01.1053 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1053 ASIrliN
echo "1528 - Processing 01.1053 viDiliN analysis started at $(timestamp)"
php panini.php 01.1053 viDiliN
echo "1529 - Processing 01.1053 luN analysis started at $(timestamp)"
php panini.php 01.1053 luN
echo "1530 - Processing 01.1053 lfN analysis started at $(timestamp)"
php panini.php 01.1053 lfN
echo "1531 - Processing 01.0132 law analysis started at $(timestamp)"
php panini.php 01.0132 law
echo "1532 - Processing 01.0132 liw analysis started at $(timestamp)"
php panini.php 01.0132 liw
echo "1533 - Processing 01.0132 luw analysis started at $(timestamp)"
php panini.php 01.0132 luw
echo "1534 - Processing 01.0132 lfw analysis started at $(timestamp)"
php panini.php 01.0132 lfw
echo "1535 - Processing 01.0132 low analysis started at $(timestamp)"
php panini.php 01.0132 low
echo "1536 - Processing 01.0132 laN analysis started at $(timestamp)"
php panini.php 01.0132 laN
echo "1537 - Processing 01.0132 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0132 ASIrliN
echo "1538 - Processing 01.0132 viDiliN analysis started at $(timestamp)"
php panini.php 01.0132 viDiliN
echo "1539 - Processing 01.0132 luN analysis started at $(timestamp)"
php panini.php 01.0132 luN
echo "1540 - Processing 01.0132 lfN analysis started at $(timestamp)"
php panini.php 01.0132 lfN
echo "1541 - Processing 01.0120 liw analysis started at $(timestamp)"
php panini.php 01.0120 liw
echo "1542 - Processing 01.0120 luN analysis started at $(timestamp)"
php panini.php 01.0120 luN
echo "1543 - Processing 01.0763 law analysis started at $(timestamp)"
php panini.php 01.0763 law
echo "1544 - Processing 01.0763 liw analysis started at $(timestamp)"
php panini.php 01.0763 liw
echo "1545 - Processing 01.0763 luw analysis started at $(timestamp)"
php panini.php 01.0763 luw
echo "1546 - Processing 01.0763 lfw analysis started at $(timestamp)"
php panini.php 01.0763 lfw
echo "1547 - Processing 01.0763 low analysis started at $(timestamp)"
php panini.php 01.0763 low
echo "1548 - Processing 01.0763 laN analysis started at $(timestamp)"
php panini.php 01.0763 laN
echo "1549 - Processing 01.0763 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0763 ASIrliN
echo "1550 - Processing 01.0763 viDiliN analysis started at $(timestamp)"
php panini.php 01.0763 viDiliN
echo "1551 - Processing 01.0763 luN analysis started at $(timestamp)"
php panini.php 01.0763 luN
echo "1552 - Processing 01.0763 lfN analysis started at $(timestamp)"
php panini.php 01.0763 lfN
echo "1553 - Processing 01.0322 luN analysis started at $(timestamp)"
php panini.php 01.0322 luN
echo "1554 - Processing 01.1095 law analysis started at $(timestamp)"
php panini.php 01.1095 law
echo "1555 - Processing 01.1095 liw analysis started at $(timestamp)"
php panini.php 01.1095 liw
echo "1556 - Processing 01.1095 luw analysis started at $(timestamp)"
php panini.php 01.1095 luw
echo "1557 - Processing 01.1095 lfw analysis started at $(timestamp)"
php panini.php 01.1095 lfw
echo "1558 - Processing 01.1095 low analysis started at $(timestamp)"
php panini.php 01.1095 low
echo "1559 - Processing 01.1095 laN analysis started at $(timestamp)"
php panini.php 01.1095 laN
echo "1560 - Processing 01.1095 viDiliN analysis started at $(timestamp)"
php panini.php 01.1095 viDiliN
echo "1561 - Processing 01.1095 luN analysis started at $(timestamp)"
php panini.php 01.1095 luN
echo "1562 - Processing 04.0094 law analysis started at $(timestamp)"
php panini.php 04.0094 law
echo "1563 - Processing 04.0094 liw analysis started at $(timestamp)"
php panini.php 04.0094 liw
echo "1564 - Processing 04.0094 luN analysis started at $(timestamp)"
php panini.php 04.0094 luN
echo "1565 - Processing 09.0013 law analysis started at $(timestamp)"
php panini.php 09.0013 law
echo "1566 - Processing 09.0013 liw analysis started at $(timestamp)"
php panini.php 09.0013 liw
echo "1567 - Processing 09.0013 luw analysis started at $(timestamp)"
php panini.php 09.0013 luw
echo "1568 - Processing 09.0013 lfw analysis started at $(timestamp)"
php panini.php 09.0013 lfw
echo "1569 - Processing 09.0013 low analysis started at $(timestamp)"
php panini.php 09.0013 low
echo "1570 - Processing 09.0013 laN analysis started at $(timestamp)"
php panini.php 09.0013 laN
echo "1571 - Processing 09.0013 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0013 ASIrliN
echo "1572 - Processing 09.0013 viDiliN analysis started at $(timestamp)"
php panini.php 09.0013 viDiliN
echo "1573 - Processing 09.0013 luN analysis started at $(timestamp)"
php panini.php 09.0013 luN
echo "1574 - Processing 09.0013 lfN analysis started at $(timestamp)"
php panini.php 09.0013 lfN
echo "1575 - Processing 01.0083 luN analysis started at $(timestamp)"
php panini.php 01.0083 luN
echo "1576 - Processing 01.1054 law analysis started at $(timestamp)"
php panini.php 01.1054 law
echo "1577 - Processing 01.1054 low analysis started at $(timestamp)"
php panini.php 01.1054 low
echo "1578 - Processing 01.1054 laN analysis started at $(timestamp)"
php panini.php 01.1054 laN
echo "1579 - Processing 01.1054 viDiliN analysis started at $(timestamp)"
php panini.php 01.1054 viDiliN
echo "1580 - Processing 02.0003 law analysis started at $(timestamp)"
php panini.php 02.0003 law
echo "1581 - Processing 01.1083 law analysis started at $(timestamp)"
php panini.php 01.1083 law
echo "1582 - Processing 01.1083 liw analysis started at $(timestamp)"
php panini.php 01.1083 liw
echo "1583 - Processing 01.1083 luw analysis started at $(timestamp)"
php panini.php 01.1083 luw
echo "1584 - Processing 01.1083 lfw analysis started at $(timestamp)"
php panini.php 01.1083 lfw
echo "1585 - Processing 01.1083 low analysis started at $(timestamp)"
php panini.php 01.1083 low
echo "1586 - Processing 01.1083 laN analysis started at $(timestamp)"
php panini.php 01.1083 laN
echo "1587 - Processing 01.1083 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1083 ASIrliN
echo "1588 - Processing 01.1083 viDiliN analysis started at $(timestamp)"
php panini.php 01.1083 viDiliN
echo "1589 - Processing 01.1083 luN analysis started at $(timestamp)"
php panini.php 01.1083 luN
echo "1590 - Processing 01.1083 lfN analysis started at $(timestamp)"
php panini.php 01.1083 lfN
echo "1591 - Processing 01.0522 liw analysis started at $(timestamp)"
php panini.php 01.0522 liw
echo "1592 - Processing 01.0522 luN analysis started at $(timestamp)"
php panini.php 01.0522 luN
echo "1593 - Processing 03.0024 law analysis started at $(timestamp)"
php panini.php 03.0024 law
echo "1594 - Processing 03.0024 low analysis started at $(timestamp)"
php panini.php 03.0024 low
echo "1595 - Processing 03.0024 laN analysis started at $(timestamp)"
php panini.php 03.0024 laN
echo "1596 - Processing 03.0024 viDiliN analysis started at $(timestamp)"
php panini.php 03.0024 viDiliN
echo "1597 - Processing 03.0011 law analysis started at $(timestamp)"
php panini.php 03.0011 law
echo "1598 - Processing 03.0011 low analysis started at $(timestamp)"
php panini.php 03.0011 low
echo "1599 - Processing 03.0011 laN analysis started at $(timestamp)"
php panini.php 03.0011 laN
echo "1600 - Processing 03.0011 ASIrliN analysis started at $(timestamp)"
php panini.php 03.0011 ASIrliN
echo "1601 - Processing 03.0011 viDiliN analysis started at $(timestamp)"
php panini.php 03.0011 viDiliN
echo "1602 - Processing 03.0011 luN analysis started at $(timestamp)"
php panini.php 03.0011 luN
echo "1603 - Processing 01.0687 law analysis started at $(timestamp)"
php panini.php 01.0687 law
echo "1604 - Processing 01.0687 liw analysis started at $(timestamp)"
php panini.php 01.0687 liw
echo "1605 - Processing 01.0687 low analysis started at $(timestamp)"
php panini.php 01.0687 low
echo "1606 - Processing 01.0687 laN analysis started at $(timestamp)"
php panini.php 01.0687 laN
echo "1607 - Processing 01.0687 viDiliN analysis started at $(timestamp)"
php panini.php 01.0687 viDiliN
echo "1608 - Processing 01.0687 luN analysis started at $(timestamp)"
php panini.php 01.0687 luN
echo "1609 - Processing 01.0677 law analysis started at $(timestamp)"
php panini.php 01.0677 law
echo "1610 - Processing 01.0677 low analysis started at $(timestamp)"
php panini.php 01.0677 low
echo "1611 - Processing 01.0677 laN analysis started at $(timestamp)"
php panini.php 01.0677 laN
echo "1612 - Processing 01.0677 viDiliN analysis started at $(timestamp)"
php panini.php 01.0677 viDiliN
echo "1613 - Processing 03.0023 law analysis started at $(timestamp)"
php panini.php 03.0023 law
echo "1614 - Processing 03.0023 low analysis started at $(timestamp)"
php panini.php 03.0023 low
echo "1615 - Processing 03.0023 laN analysis started at $(timestamp)"
php panini.php 03.0023 laN
echo "1616 - Processing 03.0023 viDiliN analysis started at $(timestamp)"
php panini.php 03.0023 viDiliN
echo "1617 - Processing 03.0023 luN analysis started at $(timestamp)"
php panini.php 03.0023 luN
echo "1618 - Processing 06.0133 law analysis started at $(timestamp)"
php panini.php 06.0133 law
echo "1619 - Processing 06.0133 liw analysis started at $(timestamp)"
php panini.php 06.0133 liw
echo "1620 - Processing 06.0133 luw analysis started at $(timestamp)"
php panini.php 06.0133 luw
echo "1621 - Processing 06.0133 lfw analysis started at $(timestamp)"
php panini.php 06.0133 lfw
echo "1622 - Processing 06.0133 low analysis started at $(timestamp)"
php panini.php 06.0133 low
echo "1623 - Processing 06.0133 laN analysis started at $(timestamp)"
php panini.php 06.0133 laN
echo "1624 - Processing 06.0133 viDiliN analysis started at $(timestamp)"
php panini.php 06.0133 viDiliN
echo "1625 - Processing 06.0133 lfN analysis started at $(timestamp)"
php panini.php 06.0133 lfN
echo "1626 - Processing 05.0009 viDiliN analysis started at $(timestamp)"
php panini.php 05.0009 viDiliN
echo "1627 - Processing 01.0686 luN analysis started at $(timestamp)"
php panini.php 01.0686 luN
echo "1628 - Processing 10.0303 luN analysis started at $(timestamp)"
php panini.php 10.0303 luN
echo "1629 - Processing 01.0654 law analysis started at $(timestamp)"
php panini.php 01.0654 law
echo "1630 - Processing 01.0654 liw analysis started at $(timestamp)"
php panini.php 01.0654 liw
echo "1631 - Processing 01.0654 luw analysis started at $(timestamp)"
php panini.php 01.0654 luw
echo "1632 - Processing 01.0654 lfw analysis started at $(timestamp)"
php panini.php 01.0654 lfw
echo "1633 - Processing 01.0654 low analysis started at $(timestamp)"
php panini.php 01.0654 low
echo "1634 - Processing 01.0654 laN analysis started at $(timestamp)"
php panini.php 01.0654 laN
echo "1635 - Processing 01.0654 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0654 ASIrliN
echo "1636 - Processing 01.0654 viDiliN analysis started at $(timestamp)"
php panini.php 01.0654 viDiliN
echo "1637 - Processing 01.0654 luN analysis started at $(timestamp)"
php panini.php 01.0654 luN
echo "1638 - Processing 01.0654 lfN analysis started at $(timestamp)"
php panini.php 01.0654 lfN
echo "1639 - Processing 05.0133 liw analysis started at $(timestamp)"
php panini.php 05.0133 liw
echo "1640 - Processing 05.0133 viDiliN analysis started at $(timestamp)"
php panini.php 05.0133 viDiliN
echo "1641 - Processing 10.0010 luw analysis started at $(timestamp)"
php panini.php 10.0010 luw
echo "1642 - Processing 10.0010 lfw analysis started at $(timestamp)"
php panini.php 10.0010 lfw
echo "1643 - Processing 10.0010 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0010 ASIrliN
echo "1644 - Processing 10.0010 luN analysis started at $(timestamp)"
php panini.php 10.0010 luN
echo "1645 - Processing 10.0010 lfN analysis started at $(timestamp)"
php panini.php 10.0010 lfN
echo "1646 - Processing 09.0372 liw analysis started at $(timestamp)"
php panini.php 09.0372 liw
echo "1647 - Processing 01.0462 low analysis started at $(timestamp)"
php panini.php 01.0462 low
echo "1648 - Processing 01.0462 laN analysis started at $(timestamp)"
php panini.php 01.0462 laN
echo "1649 - Processing 01.0462 viDiliN analysis started at $(timestamp)"
php panini.php 01.0462 viDiliN
echo "1650 - Processing 04.0048 law analysis started at $(timestamp)"
php panini.php 04.0048 law
echo "1651 - Processing 04.0048 liw analysis started at $(timestamp)"
php panini.php 04.0048 liw
echo "1652 - Processing 04.0048 low analysis started at $(timestamp)"
php panini.php 04.0048 low
echo "1653 - Processing 04.0048 laN analysis started at $(timestamp)"
php panini.php 04.0048 laN
echo "1654 - Processing 04.0048 viDiliN analysis started at $(timestamp)"
php panini.php 04.0048 viDiliN
echo "1655 - Processing 04.0048 luN analysis started at $(timestamp)"
php panini.php 04.0048 luN
echo "1656 - Processing 10.0141 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0141 ASIrliN
echo "1657 - Processing 10.0141 luN analysis started at $(timestamp)"
php panini.php 10.0141 luN
echo "1658 - Processing 10.0140 law analysis started at $(timestamp)"
php panini.php 10.0140 law
echo "1659 - Processing 10.0140 liw analysis started at $(timestamp)"
php panini.php 10.0140 liw
echo "1660 - Processing 10.0140 luw analysis started at $(timestamp)"
php panini.php 10.0140 luw
echo "1661 - Processing 10.0140 lfw analysis started at $(timestamp)"
php panini.php 10.0140 lfw
echo "1662 - Processing 10.0140 low analysis started at $(timestamp)"
php panini.php 10.0140 low
echo "1663 - Processing 10.0140 laN analysis started at $(timestamp)"
php panini.php 10.0140 laN
echo "1664 - Processing 10.0140 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0140 ASIrliN
echo "1665 - Processing 10.0140 viDiliN analysis started at $(timestamp)"
php panini.php 10.0140 viDiliN
echo "1666 - Processing 10.0140 luN analysis started at $(timestamp)"
php panini.php 10.0140 luN
echo "1667 - Processing 10.0140 lfN analysis started at $(timestamp)"
php panini.php 10.0140 lfN
echo "1668 - Processing 10.0139 luw analysis started at $(timestamp)"
php panini.php 10.0139 luw
echo "1669 - Processing 10.0139 lfw analysis started at $(timestamp)"
php panini.php 10.0139 lfw
echo "1670 - Processing 10.0139 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0139 ASIrliN
echo "1671 - Processing 10.0139 viDiliN analysis started at $(timestamp)"
php panini.php 10.0139 viDiliN
echo "1672 - Processing 10.0139 luN analysis started at $(timestamp)"
php panini.php 10.0139 luN
echo "1673 - Processing 10.0139 lfN analysis started at $(timestamp)"
php panini.php 10.0139 lfN
echo "1674 - Processing 01.1047 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1047 ASIrliN
echo "1675 - Processing 01.1115 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1115 ASIrliN
echo "1676 - Processing 01.0249 law analysis started at $(timestamp)"
php panini.php 01.0249 law
echo "1677 - Processing 01.0249 liw analysis started at $(timestamp)"
php panini.php 01.0249 liw
echo "1678 - Processing 01.0249 luw analysis started at $(timestamp)"
php panini.php 01.0249 luw
echo "1679 - Processing 01.0249 lfw analysis started at $(timestamp)"
php panini.php 01.0249 lfw
echo "1680 - Processing 01.0249 low analysis started at $(timestamp)"
php panini.php 01.0249 low
echo "1681 - Processing 01.0249 laN analysis started at $(timestamp)"
php panini.php 01.0249 laN
echo "1682 - Processing 01.0249 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0249 ASIrliN
echo "1683 - Processing 01.0249 viDiliN analysis started at $(timestamp)"
php panini.php 01.0249 viDiliN
echo "1684 - Processing 01.0249 luN analysis started at $(timestamp)"
php panini.php 01.0249 luN
echo "1685 - Processing 01.0249 lfN analysis started at $(timestamp)"
php panini.php 01.0249 lfN
echo "1686 - Processing 01.0250 law analysis started at $(timestamp)"
php panini.php 01.0250 law
echo "1687 - Processing 01.0250 liw analysis started at $(timestamp)"
php panini.php 01.0250 liw
echo "1688 - Processing 01.0250 luw analysis started at $(timestamp)"
php panini.php 01.0250 luw
echo "1689 - Processing 01.0250 lfw analysis started at $(timestamp)"
php panini.php 01.0250 lfw
echo "1690 - Processing 01.0250 low analysis started at $(timestamp)"
php panini.php 01.0250 low
echo "1691 - Processing 01.0250 laN analysis started at $(timestamp)"
php panini.php 01.0250 laN
echo "1692 - Processing 01.0250 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0250 ASIrliN
echo "1693 - Processing 01.0250 viDiliN analysis started at $(timestamp)"
php panini.php 01.0250 viDiliN
echo "1694 - Processing 01.0250 luN analysis started at $(timestamp)"
php panini.php 01.0250 luN
echo "1695 - Processing 01.0250 lfN analysis started at $(timestamp)"
php panini.php 01.0250 lfN
echo "1696 - Processing 09.0029 law analysis started at $(timestamp)"
php panini.php 09.0029 law
echo "1697 - Processing 09.0029 liw analysis started at $(timestamp)"
php panini.php 09.0029 liw
echo "1698 - Processing 09.0029 low analysis started at $(timestamp)"
php panini.php 09.0029 low
echo "1699 - Processing 09.0029 laN analysis started at $(timestamp)"
php panini.php 09.0029 laN
echo "1700 - Processing 09.0029 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0029 ASIrliN
echo "1701 - Processing 09.0029 viDiliN analysis started at $(timestamp)"
php panini.php 09.0029 viDiliN
echo "1702 - Processing 09.0029 lfN analysis started at $(timestamp)"
php panini.php 09.0029 lfN
echo "1703 - Processing 01.1050 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1050 ASIrliN
echo "1704 - Processing 01.1050 luN analysis started at $(timestamp)"
php panini.php 01.1050 luN
echo "1705 - Processing 01.0433 law analysis started at $(timestamp)"
php panini.php 01.0433 law
echo "1706 - Processing 01.0433 liw analysis started at $(timestamp)"
php panini.php 01.0433 liw
echo "1707 - Processing 01.0433 luw analysis started at $(timestamp)"
php panini.php 01.0433 luw
echo "1708 - Processing 01.0433 lfw analysis started at $(timestamp)"
php panini.php 01.0433 lfw
echo "1709 - Processing 01.0433 low analysis started at $(timestamp)"
php panini.php 01.0433 low
echo "1710 - Processing 01.0433 laN analysis started at $(timestamp)"
php panini.php 01.0433 laN
echo "1711 - Processing 01.0433 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0433 ASIrliN
echo "1712 - Processing 01.0433 viDiliN analysis started at $(timestamp)"
php panini.php 01.0433 viDiliN
echo "1713 - Processing 01.0433 luN analysis started at $(timestamp)"
php panini.php 01.0433 luN
echo "1714 - Processing 01.0433 lfN analysis started at $(timestamp)"
php panini.php 01.0433 lfN
echo "1715 - Processing 01.0766 law analysis started at $(timestamp)"
php panini.php 01.0766 law
echo "1716 - Processing 01.0766 liw analysis started at $(timestamp)"
php panini.php 01.0766 liw
echo "1717 - Processing 01.0766 luw analysis started at $(timestamp)"
php panini.php 01.0766 luw
echo "1718 - Processing 01.0766 lfw analysis started at $(timestamp)"
php panini.php 01.0766 lfw
echo "1719 - Processing 01.0766 low analysis started at $(timestamp)"
php panini.php 01.0766 low
echo "1720 - Processing 01.0766 laN analysis started at $(timestamp)"
php panini.php 01.0766 laN
echo "1721 - Processing 01.0766 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0766 ASIrliN
echo "1722 - Processing 01.0766 viDiliN analysis started at $(timestamp)"
php panini.php 01.0766 viDiliN
echo "1723 - Processing 01.0766 luN analysis started at $(timestamp)"
php panini.php 01.0766 luN
echo "1724 - Processing 01.0766 lfN analysis started at $(timestamp)"
php panini.php 01.0766 lfN
echo "1725 - Processing 01.0245 law analysis started at $(timestamp)"
php panini.php 01.0245 law
echo "1726 - Processing 01.0245 liw analysis started at $(timestamp)"
php panini.php 01.0245 liw
echo "1727 - Processing 01.0245 luw analysis started at $(timestamp)"
php panini.php 01.0245 luw
echo "1728 - Processing 01.0245 lfw analysis started at $(timestamp)"
php panini.php 01.0245 lfw
echo "1729 - Processing 01.0245 low analysis started at $(timestamp)"
php panini.php 01.0245 low
echo "1730 - Processing 01.0245 laN analysis started at $(timestamp)"
php panini.php 01.0245 laN
echo "1731 - Processing 01.0245 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0245 ASIrliN
echo "1732 - Processing 01.0245 viDiliN analysis started at $(timestamp)"
php panini.php 01.0245 viDiliN
echo "1733 - Processing 01.0245 luN analysis started at $(timestamp)"
php panini.php 01.0245 luN
echo "1734 - Processing 01.0245 lfN analysis started at $(timestamp)"
php panini.php 01.0245 lfN
echo "1735 - Processing 01.0246 law analysis started at $(timestamp)"
php panini.php 01.0246 law
echo "1736 - Processing 01.0246 liw analysis started at $(timestamp)"
php panini.php 01.0246 liw
echo "1737 - Processing 01.0246 luw analysis started at $(timestamp)"
php panini.php 01.0246 luw
echo "1738 - Processing 01.0246 lfw analysis started at $(timestamp)"
php panini.php 01.0246 lfw
echo "1739 - Processing 01.0246 low analysis started at $(timestamp)"
php panini.php 01.0246 low
echo "1740 - Processing 01.0246 laN analysis started at $(timestamp)"
php panini.php 01.0246 laN
echo "1741 - Processing 01.0246 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0246 ASIrliN
echo "1742 - Processing 01.0246 viDiliN analysis started at $(timestamp)"
php panini.php 01.0246 viDiliN
echo "1743 - Processing 01.0246 luN analysis started at $(timestamp)"
php panini.php 01.0246 luN
echo "1744 - Processing 01.0246 lfN analysis started at $(timestamp)"
php panini.php 01.0246 lfN
echo "1745 - Processing 01.0529 law analysis started at $(timestamp)"
php panini.php 01.0529 law
echo "1746 - Processing 01.0529 liw analysis started at $(timestamp)"
php panini.php 01.0529 liw
echo "1747 - Processing 01.0529 luw analysis started at $(timestamp)"
php panini.php 01.0529 luw
echo "1748 - Processing 01.0529 lfw analysis started at $(timestamp)"
php panini.php 01.0529 lfw
echo "1749 - Processing 01.0529 low analysis started at $(timestamp)"
php panini.php 01.0529 low
echo "1750 - Processing 01.0529 laN analysis started at $(timestamp)"
php panini.php 01.0529 laN
echo "1751 - Processing 01.0529 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0529 ASIrliN
echo "1752 - Processing 01.0529 viDiliN analysis started at $(timestamp)"
php panini.php 01.0529 viDiliN
echo "1753 - Processing 01.0529 luN analysis started at $(timestamp)"
php panini.php 01.0529 luN
echo "1754 - Processing 01.0529 lfN analysis started at $(timestamp)"
php panini.php 01.0529 lfN
echo "1755 - Processing 10.0060 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0060 ASIrliN
echo "1756 - Processing 09.0270 law analysis started at $(timestamp)"
php panini.php 09.0270 law
echo "1757 - Processing 09.0270 liw analysis started at $(timestamp)"
php panini.php 09.0270 liw
echo "1758 - Processing 09.0270 luw analysis started at $(timestamp)"
php panini.php 09.0270 luw
echo "1759 - Processing 09.0270 lfw analysis started at $(timestamp)"
php panini.php 09.0270 lfw
echo "1760 - Processing 09.0270 low analysis started at $(timestamp)"
php panini.php 09.0270 low
echo "1761 - Processing 09.0270 laN analysis started at $(timestamp)"
php panini.php 09.0270 laN
echo "1762 - Processing 09.0270 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0270 ASIrliN
echo "1763 - Processing 09.0270 viDiliN analysis started at $(timestamp)"
php panini.php 09.0270 viDiliN
echo "1764 - Processing 09.0270 luN analysis started at $(timestamp)"
php panini.php 09.0270 luN
echo "1765 - Processing 09.0270 lfN analysis started at $(timestamp)"
php panini.php 09.0270 lfN
echo "1766 - Processing 01.0764 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0764 ASIrliN
echo "1767 - Processing 01.0323 law analysis started at $(timestamp)"
php panini.php 01.0323 law
echo "1768 - Processing 01.0323 liw analysis started at $(timestamp)"
php panini.php 01.0323 liw
echo "1769 - Processing 01.0323 low analysis started at $(timestamp)"
php panini.php 01.0323 low
echo "1770 - Processing 01.0323 laN analysis started at $(timestamp)"
php panini.php 01.0323 laN
echo "1771 - Processing 01.0323 viDiliN analysis started at $(timestamp)"
php panini.php 01.0323 viDiliN
echo "1772 - Processing 01.0323 luN analysis started at $(timestamp)"
php panini.php 01.0323 luN
echo "1773 - Processing 01.0253 law analysis started at $(timestamp)"
php panini.php 01.0253 law
echo "1774 - Processing 01.0253 liw analysis started at $(timestamp)"
php panini.php 01.0253 liw
echo "1775 - Processing 01.0253 luw analysis started at $(timestamp)"
php panini.php 01.0253 luw
echo "1776 - Processing 01.0253 lfw analysis started at $(timestamp)"
php panini.php 01.0253 lfw
echo "1777 - Processing 01.0253 low analysis started at $(timestamp)"
php panini.php 01.0253 low
echo "1778 - Processing 01.0253 laN analysis started at $(timestamp)"
php panini.php 01.0253 laN
echo "1779 - Processing 01.0253 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0253 ASIrliN
echo "1780 - Processing 01.0253 viDiliN analysis started at $(timestamp)"
php panini.php 01.0253 viDiliN
echo "1781 - Processing 01.0253 luN analysis started at $(timestamp)"
php panini.php 01.0253 luN
echo "1782 - Processing 01.0253 lfN analysis started at $(timestamp)"
php panini.php 01.0253 lfN
echo "1783 - Processing 06.0135 law analysis started at $(timestamp)"
php panini.php 06.0135 law
echo "1784 - Processing 06.0135 luw analysis started at $(timestamp)"
php panini.php 06.0135 luw
echo "1785 - Processing 06.0135 lfw analysis started at $(timestamp)"
php panini.php 06.0135 lfw
echo "1786 - Processing 06.0135 low analysis started at $(timestamp)"
php panini.php 06.0135 low
echo "1787 - Processing 06.0135 laN analysis started at $(timestamp)"
php panini.php 06.0135 laN
echo "1788 - Processing 06.0135 viDiliN analysis started at $(timestamp)"
php panini.php 06.0135 viDiliN
echo "1789 - Processing 06.0135 luN analysis started at $(timestamp)"
php panini.php 06.0135 luN
echo "1790 - Processing 06.0135 lfN analysis started at $(timestamp)"
php panini.php 06.0135 lfN
echo "1791 - Processing 01.1093 low analysis started at $(timestamp)"
php panini.php 01.1093 low
echo "1792 - Processing 01.0084 law analysis started at $(timestamp)"
php panini.php 01.0084 law
echo "1793 - Processing 01.0084 liw analysis started at $(timestamp)"
php panini.php 01.0084 liw
echo "1794 - Processing 01.0084 low analysis started at $(timestamp)"
php panini.php 01.0084 low
echo "1795 - Processing 01.0084 laN analysis started at $(timestamp)"
php panini.php 01.0084 laN
echo "1796 - Processing 01.0084 viDiliN analysis started at $(timestamp)"
php panini.php 01.0084 viDiliN
echo "1797 - Processing 01.0084 luN analysis started at $(timestamp)"
php panini.php 01.0084 luN
echo "1798 - Processing 01.1055 lfN analysis started at $(timestamp)"
php panini.php 01.1055 lfN
echo "1799 - Processing 01.0858 liw analysis started at $(timestamp)"
php panini.php 01.0858 liw
echo "1800 - Processing 01.0858 luw analysis started at $(timestamp)"
php panini.php 01.0858 luw
echo "1801 - Processing 01.0858 lfw analysis started at $(timestamp)"
php panini.php 01.0858 lfw
echo "1802 - Processing 01.0858 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0858 ASIrliN
echo "1803 - Processing 01.0858 luN analysis started at $(timestamp)"
php panini.php 01.0858 luN
echo "1804 - Processing 01.0858 lfN analysis started at $(timestamp)"
php panini.php 01.0858 lfN
echo "1805 - Processing 01.0143 liw analysis started at $(timestamp)"
php panini.php 01.0143 liw
echo "1806 - Processing 01.0143 lfN analysis started at $(timestamp)"
php panini.php 01.0143 lfN
echo "1807 - Processing 10.0322 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0322 ASIrliN
echo "1808 - Processing 10.0018 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0018 ASIrliN
echo "1809 - Processing 10.0309 law analysis started at $(timestamp)"
php panini.php 10.0309 law
echo "1810 - Processing 10.0309 liw analysis started at $(timestamp)"
php panini.php 10.0309 liw
echo "1811 - Processing 10.0309 luw analysis started at $(timestamp)"
php panini.php 10.0309 luw
echo "1812 - Processing 10.0309 lfw analysis started at $(timestamp)"
php panini.php 10.0309 lfw
echo "1813 - Processing 10.0309 low analysis started at $(timestamp)"
php panini.php 10.0309 low
echo "1814 - Processing 10.0309 laN analysis started at $(timestamp)"
php panini.php 10.0309 laN
echo "1815 - Processing 10.0309 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0309 ASIrliN
echo "1816 - Processing 10.0309 viDiliN analysis started at $(timestamp)"
php panini.php 10.0309 viDiliN
echo "1817 - Processing 10.0309 luN analysis started at $(timestamp)"
php panini.php 10.0309 luN
echo "1818 - Processing 10.0309 lfN analysis started at $(timestamp)"
php panini.php 10.0309 lfN
echo "1819 - Processing 09.0056 luN analysis started at $(timestamp)"
php panini.php 09.0056 luN
echo "1820 - Processing 01.0855 luN analysis started at $(timestamp)"
php panini.php 01.0855 luN
echo "1821 - Processing 01.0552 luN analysis started at $(timestamp)"
php panini.php 01.0552 luN
echo "1822 - Processing 01.0714 liw analysis started at $(timestamp)"
php panini.php 01.0714 liw
echo "1823 - Processing 01.0714 luN analysis started at $(timestamp)"
php panini.php 01.0714 luN
echo "1824 - Processing 04.0062 law analysis started at $(timestamp)"
php panini.php 04.0062 law
echo "1825 - Processing 04.0062 low analysis started at $(timestamp)"
php panini.php 04.0062 low
echo "1826 - Processing 04.0062 laN analysis started at $(timestamp)"
php panini.php 04.0062 laN
echo "1827 - Processing 04.0062 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0062 ASIrliN
echo "1828 - Processing 01.0006 law analysis started at $(timestamp)"
php panini.php 01.0006 law
echo "1829 - Processing 01.0006 liw analysis started at $(timestamp)"
php panini.php 01.0006 liw
echo "1830 - Processing 01.0006 low analysis started at $(timestamp)"
php panini.php 01.0006 low
echo "1831 - Processing 01.0006 laN analysis started at $(timestamp)"
php panini.php 01.0006 laN
echo "1832 - Processing 01.0006 viDiliN analysis started at $(timestamp)"
php panini.php 01.0006 viDiliN
echo "1833 - Processing 01.0006 luN analysis started at $(timestamp)"
php panini.php 01.0006 luN
echo "1834 - Processing 01.0712 liw analysis started at $(timestamp)"
php panini.php 01.0712 liw
echo "1835 - Processing 01.0712 luN analysis started at $(timestamp)"
php panini.php 01.0712 luN
echo "1836 - Processing 02.0017 liw analysis started at $(timestamp)"
php panini.php 02.0017 liw
echo "1837 - Processing 02.0017 luN analysis started at $(timestamp)"
php panini.php 02.0017 luN
echo "1838 - Processing 03.0012 law analysis started at $(timestamp)"
php panini.php 03.0012 law
echo "1839 - Processing 03.0012 low analysis started at $(timestamp)"
php panini.php 03.0012 low
echo "1840 - Processing 03.0012 laN analysis started at $(timestamp)"
php panini.php 03.0012 laN
echo "1841 - Processing 03.0012 viDiliN analysis started at $(timestamp)"
php panini.php 03.0012 viDiliN
echo "1842 - Processing 02.0018 luN analysis started at $(timestamp)"
php panini.php 02.0018 luN
echo "1843 - Processing 01.1012 liw analysis started at $(timestamp)"
php panini.php 01.1012 liw
echo "1844 - Processing 01.1012 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1012 ASIrliN
echo "1845 - Processing 01.1012 luN analysis started at $(timestamp)"
php panini.php 01.1012 luN
echo "1846 - Processing 01.0796 law analysis started at $(timestamp)"
php panini.php 01.0796 law
echo "1847 - Processing 01.0796 liw analysis started at $(timestamp)"
php panini.php 01.0796 liw
echo "1848 - Processing 01.0796 luw analysis started at $(timestamp)"
php panini.php 01.0796 luw
echo "1849 - Processing 01.0796 lfw analysis started at $(timestamp)"
php panini.php 01.0796 lfw
echo "1850 - Processing 01.0796 low analysis started at $(timestamp)"
php panini.php 01.0796 low
echo "1851 - Processing 01.0796 laN analysis started at $(timestamp)"
php panini.php 01.0796 laN
echo "1852 - Processing 01.0796 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0796 ASIrliN
echo "1853 - Processing 01.0796 viDiliN analysis started at $(timestamp)"
php panini.php 01.0796 viDiliN
echo "1854 - Processing 01.0796 luN analysis started at $(timestamp)"
php panini.php 01.0796 luN
echo "1855 - Processing 01.0796 lfN analysis started at $(timestamp)"
php panini.php 01.0796 lfN
echo "1856 - Processing 01.1049 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1049 ASIrliN
echo "1857 - Processing 09.0030 liw analysis started at $(timestamp)"
php panini.php 09.0030 liw
echo "1858 - Processing 09.0030 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0030 ASIrliN
echo "1859 - Processing 01.0921 law analysis started at $(timestamp)"
php panini.php 01.0921 law
echo "1860 - Processing 01.0921 liw analysis started at $(timestamp)"
php panini.php 01.0921 liw
echo "1861 - Processing 01.0921 low analysis started at $(timestamp)"
php panini.php 01.0921 low
echo "1862 - Processing 01.0921 laN analysis started at $(timestamp)"
php panini.php 01.0921 laN
echo "1863 - Processing 01.0921 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0921 ASIrliN
echo "1864 - Processing 01.0921 viDiliN analysis started at $(timestamp)"
php panini.php 01.0921 viDiliN
echo "1865 - Processing 01.1013 luN analysis started at $(timestamp)"
php panini.php 01.1013 luN
echo "1866 - Processing 01.0704 law analysis started at $(timestamp)"
php panini.php 01.0704 law
echo "1867 - Processing 01.0704 liw analysis started at $(timestamp)"
php panini.php 01.0704 liw
echo "1868 - Processing 01.0704 low analysis started at $(timestamp)"
php panini.php 01.0704 low
echo "1869 - Processing 01.0704 laN analysis started at $(timestamp)"
php panini.php 01.0704 laN
echo "1870 - Processing 01.0704 viDiliN analysis started at $(timestamp)"
php panini.php 01.0704 viDiliN
echo "1871 - Processing 01.0704 luN analysis started at $(timestamp)"
php panini.php 01.0704 luN
echo "1872 - Processing 01.0757 lfN analysis started at $(timestamp)"
php panini.php 01.0757 lfN
echo "1873 - Processing 01.1151 law analysis started at $(timestamp)"
php panini.php 01.1151 law
echo "1874 - Processing 01.1151 liw analysis started at $(timestamp)"
php panini.php 01.1151 liw
echo "1875 - Processing 01.1151 low analysis started at $(timestamp)"
php panini.php 01.1151 low
echo "1876 - Processing 01.1151 laN analysis started at $(timestamp)"
php panini.php 01.1151 laN
echo "1877 - Processing 01.1151 viDiliN analysis started at $(timestamp)"
php panini.php 01.1151 viDiliN
echo "1878 - Processing 01.1151 luN analysis started at $(timestamp)"
php panini.php 01.1151 luN
echo "1879 - Processing 01.0198 liw analysis started at $(timestamp)"
php panini.php 01.0198 liw
echo "1880 - Processing 01.0198 luN analysis started at $(timestamp)"
php panini.php 01.0198 luN
echo "1881 - Processing 01.0507 luN analysis started at $(timestamp)"
php panini.php 01.0507 luN
echo "1882 - Processing 04.0065 luN analysis started at $(timestamp)"
php panini.php 04.0065 luN
echo "1883 - Processing 01.0508 luN analysis started at $(timestamp)"
php panini.php 01.0508 luN
echo "1884 - Processing 01.0548 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0548 ASIrliN
echo "1885 - Processing 01.0478 lfN analysis started at $(timestamp)"
php panini.php 01.0478 lfN
echo "1886 - Processing 01.0658 law analysis started at $(timestamp)"
php panini.php 01.0658 law
echo "1887 - Processing 01.0658 liw analysis started at $(timestamp)"
php panini.php 01.0658 liw
echo "1888 - Processing 01.0658 luw analysis started at $(timestamp)"
php panini.php 01.0658 luw
echo "1889 - Processing 01.0658 lfw analysis started at $(timestamp)"
php panini.php 01.0658 lfw
echo "1890 - Processing 01.0658 low analysis started at $(timestamp)"
php panini.php 01.0658 low
echo "1891 - Processing 01.0658 laN analysis started at $(timestamp)"
php panini.php 01.0658 laN
echo "1892 - Processing 01.0658 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0658 ASIrliN
echo "1893 - Processing 01.0658 viDiliN analysis started at $(timestamp)"
php panini.php 01.0658 viDiliN
echo "1894 - Processing 01.0658 luN analysis started at $(timestamp)"
php panini.php 01.0658 luN
echo "1895 - Processing 01.0658 lfN analysis started at $(timestamp)"
php panini.php 01.0658 lfN
echo "1896 - Processing 01.0973 law analysis started at $(timestamp)"
php panini.php 01.0973 law
echo "1897 - Processing 01.0973 liw analysis started at $(timestamp)"
php panini.php 01.0973 liw
echo "1898 - Processing 01.0973 luw analysis started at $(timestamp)"
php panini.php 01.0973 luw
echo "1899 - Processing 01.0973 lfw analysis started at $(timestamp)"
php panini.php 01.0973 lfw
echo "1900 - Processing 01.0973 low analysis started at $(timestamp)"
php panini.php 01.0973 low
echo "1901 - Processing 01.0973 laN analysis started at $(timestamp)"
php panini.php 01.0973 laN
echo "1902 - Processing 01.0973 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0973 ASIrliN
echo "1903 - Processing 01.0973 viDiliN analysis started at $(timestamp)"
php panini.php 01.0973 viDiliN
echo "1904 - Processing 01.0973 luN analysis started at $(timestamp)"
php panini.php 01.0973 luN
echo "1905 - Processing 01.0973 lfN analysis started at $(timestamp)"
php panini.php 01.0973 lfN
echo "1906 - Processing 10.0423 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0423 ASIrliN
echo "1907 - Processing 01.1074 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1074 ASIrliN
echo "1908 - Processing 10.0061 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0061 ASIrliN
echo "1909 - Processing 10.0046 law analysis started at $(timestamp)"
php panini.php 10.0046 law
echo "1910 - Processing 10.0046 liw analysis started at $(timestamp)"
php panini.php 10.0046 liw
echo "1911 - Processing 10.0046 luw analysis started at $(timestamp)"
php panini.php 10.0046 luw
echo "1912 - Processing 10.0046 lfw analysis started at $(timestamp)"
php panini.php 10.0046 lfw
echo "1913 - Processing 10.0046 low analysis started at $(timestamp)"
php panini.php 10.0046 low
echo "1914 - Processing 10.0046 laN analysis started at $(timestamp)"
php panini.php 10.0046 laN
echo "1915 - Processing 10.0046 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0046 ASIrliN
echo "1916 - Processing 10.0046 viDiliN analysis started at $(timestamp)"
php panini.php 10.0046 viDiliN
echo "1917 - Processing 10.0046 luN analysis started at $(timestamp)"
php panini.php 10.0046 luN
echo "1918 - Processing 10.0046 lfN analysis started at $(timestamp)"
php panini.php 10.0046 lfN
echo "1919 - Processing 01.0393 law analysis started at $(timestamp)"
php panini.php 01.0393 law
echo "1920 - Processing 01.0393 liw analysis started at $(timestamp)"
php panini.php 01.0393 liw
echo "1921 - Processing 01.0393 luw analysis started at $(timestamp)"
php panini.php 01.0393 luw
echo "1922 - Processing 01.0393 lfw analysis started at $(timestamp)"
php panini.php 01.0393 lfw
echo "1923 - Processing 01.0393 low analysis started at $(timestamp)"
php panini.php 01.0393 low
echo "1924 - Processing 01.0393 laN analysis started at $(timestamp)"
php panini.php 01.0393 laN
echo "1925 - Processing 01.0393 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0393 ASIrliN
echo "1926 - Processing 01.0393 viDiliN analysis started at $(timestamp)"
php panini.php 01.0393 viDiliN
echo "1927 - Processing 01.0393 luN analysis started at $(timestamp)"
php panini.php 01.0393 luN
echo "1928 - Processing 01.0393 lfN analysis started at $(timestamp)"
php panini.php 01.0393 lfN
echo "1929 - Processing 10.0186 law analysis started at $(timestamp)"
php panini.php 10.0186 law
echo "1930 - Processing 10.0186 liw analysis started at $(timestamp)"
php panini.php 10.0186 liw
echo "1931 - Processing 10.0186 luw analysis started at $(timestamp)"
php panini.php 10.0186 luw
echo "1932 - Processing 10.0186 lfw analysis started at $(timestamp)"
php panini.php 10.0186 lfw
echo "1933 - Processing 10.0186 low analysis started at $(timestamp)"
php panini.php 10.0186 low
echo "1934 - Processing 10.0186 laN analysis started at $(timestamp)"
php panini.php 10.0186 laN
echo "1935 - Processing 10.0186 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0186 ASIrliN
echo "1936 - Processing 10.0186 viDiliN analysis started at $(timestamp)"
php panini.php 10.0186 viDiliN
echo "1937 - Processing 10.0186 luN analysis started at $(timestamp)"
php panini.php 10.0186 luN
echo "1938 - Processing 10.0186 lfN analysis started at $(timestamp)"
php panini.php 10.0186 lfN
echo "1939 - Processing 10.0173 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0173 ASIrliN
echo "1940 - Processing 10.0017 luN analysis started at $(timestamp)"
php panini.php 10.0017 luN
echo "1941 - Processing 01.0367 liw analysis started at $(timestamp)"
php panini.php 01.0367 liw
echo "1942 - Processing 01.0367 luw analysis started at $(timestamp)"
php panini.php 01.0367 luw
echo "1943 - Processing 01.0367 lfw analysis started at $(timestamp)"
php panini.php 01.0367 lfw
echo "1944 - Processing 01.0367 low analysis started at $(timestamp)"
php panini.php 01.0367 low
echo "1945 - Processing 01.0367 laN analysis started at $(timestamp)"
php panini.php 01.0367 laN
echo "1946 - Processing 01.0367 viDiliN analysis started at $(timestamp)"
php panini.php 01.0367 viDiliN
echo "1947 - Processing 01.0367 luN analysis started at $(timestamp)"
php panini.php 01.0367 luN
echo "1948 - Processing 01.0367 lfN analysis started at $(timestamp)"
php panini.php 01.0367 lfN
echo "1949 - Processing 06.0283 luN analysis started at $(timestamp)"
php panini.php 06.0283 luN
echo "1950 - Processing 10.0035 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0035 ASIrliN
echo "1951 - Processing 01.0365 law analysis started at $(timestamp)"
php panini.php 01.0365 law
echo "1952 - Processing 01.0365 liw analysis started at $(timestamp)"
php panini.php 01.0365 liw
echo "1953 - Processing 01.0365 luw analysis started at $(timestamp)"
php panini.php 01.0365 luw
echo "1954 - Processing 01.0365 lfw analysis started at $(timestamp)"
php panini.php 01.0365 lfw
echo "1955 - Processing 01.0365 low analysis started at $(timestamp)"
php panini.php 01.0365 low
echo "1956 - Processing 01.0365 laN analysis started at $(timestamp)"
php panini.php 01.0365 laN
echo "1957 - Processing 01.0365 viDiliN analysis started at $(timestamp)"
php panini.php 01.0365 viDiliN
echo "1958 - Processing 01.0365 luN analysis started at $(timestamp)"
php panini.php 01.0365 luN
echo "1959 - Processing 01.0365 lfN analysis started at $(timestamp)"
php panini.php 01.0365 lfN
echo "1960 - Processing 06.0114 liw analysis started at $(timestamp)"
php panini.php 06.0114 liw
echo "1961 - Processing 06.0114 luN analysis started at $(timestamp)"
php panini.php 06.0114 luN
echo "1962 - Processing 10.0059 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0059 ASIrliN
echo "1963 - Processing 10.0323 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0323 ASIrliN
echo "1964 - Processing 01.0657 liw analysis started at $(timestamp)"
php panini.php 01.0657 liw
echo "1965 - Processing 01.0657 low analysis started at $(timestamp)"
php panini.php 01.0657 low
echo "1966 - Processing 01.0975 law analysis started at $(timestamp)"
php panini.php 01.0975 law
echo "1967 - Processing 01.0975 liw analysis started at $(timestamp)"
php panini.php 01.0975 liw
echo "1968 - Processing 01.0975 luw analysis started at $(timestamp)"
php panini.php 01.0975 luw
echo "1969 - Processing 01.0975 lfw analysis started at $(timestamp)"
php panini.php 01.0975 lfw
echo "1970 - Processing 01.0975 low analysis started at $(timestamp)"
php panini.php 01.0975 low
echo "1971 - Processing 01.0975 laN analysis started at $(timestamp)"
php panini.php 01.0975 laN
echo "1972 - Processing 01.0975 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0975 ASIrliN
echo "1973 - Processing 01.0975 viDiliN analysis started at $(timestamp)"
php panini.php 01.0975 viDiliN
echo "1974 - Processing 01.0975 luN analysis started at $(timestamp)"
php panini.php 01.0975 luN
echo "1975 - Processing 01.0975 lfN analysis started at $(timestamp)"
php panini.php 01.0975 lfN
echo "1976 - Processing 04.0016 law analysis started at $(timestamp)"
php panini.php 04.0016 law
echo "1977 - Processing 04.0016 liw analysis started at $(timestamp)"
php panini.php 04.0016 liw
echo "1978 - Processing 04.0016 luw analysis started at $(timestamp)"
php panini.php 04.0016 luw
echo "1979 - Processing 04.0016 lfw analysis started at $(timestamp)"
php panini.php 04.0016 lfw
echo "1980 - Processing 04.0016 low analysis started at $(timestamp)"
php panini.php 04.0016 low
echo "1981 - Processing 04.0016 laN analysis started at $(timestamp)"
php panini.php 04.0016 laN
echo "1982 - Processing 04.0016 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0016 ASIrliN
echo "1983 - Processing 04.0016 viDiliN analysis started at $(timestamp)"
php panini.php 04.0016 viDiliN
echo "1984 - Processing 04.0016 luN analysis started at $(timestamp)"
php panini.php 04.0016 luN
echo "1985 - Processing 04.0016 lfN analysis started at $(timestamp)"
php panini.php 04.0016 lfN
echo "1986 - Processing 09.0014 laN analysis started at $(timestamp)"
php panini.php 09.0014 laN
echo "1987 - Processing 10.0144 luN analysis started at $(timestamp)"
php panini.php 10.0144 luN
echo "1988 - Processing 04.0334 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0334 ASIrliN
echo "1989 - Processing 04.0334 luN analysis started at $(timestamp)"
php panini.php 04.0334 luN
echo "1990 - Processing 10.0132 liw analysis started at $(timestamp)"
php panini.php 10.0132 liw
echo "1991 - Processing 10.0132 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0132 ASIrliN
echo "1992 - Processing 10.0131 luN analysis started at $(timestamp)"
php panini.php 10.0131 luN
echo "1993 - Processing 03.0005 viDiliN analysis started at $(timestamp)"
php panini.php 03.0005 viDiliN
echo "1994 - Processing 05.0013 laN analysis started at $(timestamp)"
php panini.php 05.0013 laN
echo "1995 - Processing 06.0138 liw analysis started at $(timestamp)"
php panini.php 06.0138 liw
echo "1996 - Processing 06.0138 luw analysis started at $(timestamp)"
php panini.php 06.0138 luw
echo "1997 - Processing 06.0138 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0138 ASIrliN
echo "1998 - Processing 06.0138 luN analysis started at $(timestamp)"
php panini.php 06.0138 luN
echo "1999 - Processing 02.0025 viDiliN analysis started at $(timestamp)"
php panini.php 02.0025 viDiliN
echo "2000 - Processing 02.0021 law analysis started at $(timestamp)"
php panini.php 02.0021 law
echo "2001 - Processing 02.0021 liw analysis started at $(timestamp)"
php panini.php 02.0021 liw
echo "2002 - Processing 02.0021 luw analysis started at $(timestamp)"
php panini.php 02.0021 luw
echo "2003 - Processing 02.0021 lfw analysis started at $(timestamp)"
php panini.php 02.0021 lfw
echo "2004 - Processing 02.0021 low analysis started at $(timestamp)"
php panini.php 02.0021 low
echo "2005 - Processing 02.0021 laN analysis started at $(timestamp)"
php panini.php 02.0021 laN
echo "2006 - Processing 02.0021 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0021 ASIrliN
echo "2007 - Processing 02.0021 viDiliN analysis started at $(timestamp)"
php panini.php 02.0021 viDiliN
echo "2008 - Processing 02.0021 luN analysis started at $(timestamp)"
php panini.php 02.0021 luN
echo "2009 - Processing 02.0021 lfN analysis started at $(timestamp)"
php panini.php 02.0021 lfN
echo "2010 - Processing 01.0802 law analysis started at $(timestamp)"
php panini.php 01.0802 law
echo "2011 - Processing 01.0802 liw analysis started at $(timestamp)"
php panini.php 01.0802 liw
echo "2012 - Processing 01.0802 luw analysis started at $(timestamp)"
php panini.php 01.0802 luw
echo "2013 - Processing 01.0802 lfw analysis started at $(timestamp)"
php panini.php 01.0802 lfw
echo "2014 - Processing 01.0802 low analysis started at $(timestamp)"
php panini.php 01.0802 low
echo "2015 - Processing 01.0802 laN analysis started at $(timestamp)"
php panini.php 01.0802 laN
echo "2016 - Processing 01.0802 viDiliN analysis started at $(timestamp)"
php panini.php 01.0802 viDiliN
echo "2017 - Processing 10.0004 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0004 ASIrliN
echo "2018 - Processing 03.0004 viDiliN analysis started at $(timestamp)"
php panini.php 03.0004 viDiliN
echo "2019 - Processing 01.0700 luN analysis started at $(timestamp)"
php panini.php 01.0700 luN
echo "2020 - Processing 04.0119 law analysis started at $(timestamp)"
php panini.php 04.0119 law
echo "2021 - Processing 04.0119 liw analysis started at $(timestamp)"
php panini.php 04.0119 liw
echo "2022 - Processing 04.0119 luw analysis started at $(timestamp)"
php panini.php 04.0119 luw
echo "2023 - Processing 04.0119 lfw analysis started at $(timestamp)"
php panini.php 04.0119 lfw
echo "2024 - Processing 04.0119 low analysis started at $(timestamp)"
php panini.php 04.0119 low
echo "2025 - Processing 04.0119 laN analysis started at $(timestamp)"
php panini.php 04.0119 laN
echo "2026 - Processing 04.0119 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0119 ASIrliN
echo "2027 - Processing 04.0119 viDiliN analysis started at $(timestamp)"
php panini.php 04.0119 viDiliN
echo "2028 - Processing 04.0119 luN analysis started at $(timestamp)"
php panini.php 04.0119 luN
echo "2029 - Processing 04.0119 lfN analysis started at $(timestamp)"
php panini.php 04.0119 lfN
echo "2030 - Processing 04.0120 law analysis started at $(timestamp)"
php panini.php 04.0120 law
echo "2031 - Processing 04.0120 liw analysis started at $(timestamp)"
php panini.php 04.0120 liw
echo "2032 - Processing 04.0120 luw analysis started at $(timestamp)"
php panini.php 04.0120 luw
echo "2033 - Processing 04.0120 lfw analysis started at $(timestamp)"
php panini.php 04.0120 lfw
echo "2034 - Processing 04.0120 low analysis started at $(timestamp)"
php panini.php 04.0120 low
echo "2035 - Processing 04.0120 laN analysis started at $(timestamp)"
php panini.php 04.0120 laN
echo "2036 - Processing 04.0120 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0120 ASIrliN
echo "2037 - Processing 04.0120 viDiliN analysis started at $(timestamp)"
php panini.php 04.0120 viDiliN
echo "2038 - Processing 04.0120 luN analysis started at $(timestamp)"
php panini.php 04.0120 luN
echo "2039 - Processing 04.0120 lfN analysis started at $(timestamp)"
php panini.php 04.0120 lfN
echo "2040 - Processing 06.0149 law analysis started at $(timestamp)"
php panini.php 06.0149 law
echo "2041 - Processing 06.0149 liw analysis started at $(timestamp)"
php panini.php 06.0149 liw
echo "2042 - Processing 06.0149 low analysis started at $(timestamp)"
php panini.php 06.0149 low
echo "2043 - Processing 06.0149 laN analysis started at $(timestamp)"
php panini.php 06.0149 laN
echo "2044 - Processing 10.0027 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0027 ASIrliN
echo "2045 - Processing 01.0870 liw analysis started at $(timestamp)"
php panini.php 01.0870 liw
echo "2046 - Processing 10.0039 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0039 ASIrliN
echo "2047 - Processing 10.0039 luN analysis started at $(timestamp)"
php panini.php 10.0039 luN
echo "2048 - Processing 01.0706 luN analysis started at $(timestamp)"
php panini.php 01.0706 luN
echo "2049 - Processing 01.0528 law analysis started at $(timestamp)"
php panini.php 01.0528 law
echo "2050 - Processing 01.0528 liw analysis started at $(timestamp)"
php panini.php 01.0528 liw
echo "2051 - Processing 01.0528 luw analysis started at $(timestamp)"
php panini.php 01.0528 luw
echo "2052 - Processing 01.0528 lfw analysis started at $(timestamp)"
php panini.php 01.0528 lfw
echo "2053 - Processing 01.0528 low analysis started at $(timestamp)"
php panini.php 01.0528 low
echo "2054 - Processing 01.0528 laN analysis started at $(timestamp)"
php panini.php 01.0528 laN
echo "2055 - Processing 01.0528 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0528 ASIrliN
echo "2056 - Processing 01.0528 viDiliN analysis started at $(timestamp)"
php panini.php 01.0528 viDiliN
echo "2057 - Processing 01.0528 luN analysis started at $(timestamp)"
php panini.php 01.0528 luN
echo "2058 - Processing 01.0528 lfN analysis started at $(timestamp)"
php panini.php 01.0528 lfN
echo "2059 - Processing 01.1005 laN analysis started at $(timestamp)"
php panini.php 01.1005 laN
echo "2060 - Processing 01.1040 law analysis started at $(timestamp)"
php panini.php 01.1040 law
echo "2061 - Processing 01.1040 liw analysis started at $(timestamp)"
php panini.php 01.1040 liw
echo "2062 - Processing 01.1040 luw analysis started at $(timestamp)"
php panini.php 01.1040 luw
echo "2063 - Processing 01.1040 lfw analysis started at $(timestamp)"
php panini.php 01.1040 lfw
echo "2064 - Processing 01.1040 low analysis started at $(timestamp)"
php panini.php 01.1040 low
echo "2065 - Processing 01.1040 laN analysis started at $(timestamp)"
php panini.php 01.1040 laN
echo "2066 - Processing 01.1040 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1040 ASIrliN
echo "2067 - Processing 01.1040 viDiliN analysis started at $(timestamp)"
php panini.php 01.1040 viDiliN
echo "2068 - Processing 01.1040 luN analysis started at $(timestamp)"
php panini.php 01.1040 luN
echo "2069 - Processing 01.1040 lfN analysis started at $(timestamp)"
php panini.php 01.1040 lfN
echo "2070 - Processing 01.0729 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0729 ASIrliN
echo "2071 - Processing 01.0801 law analysis started at $(timestamp)"
php panini.php 01.0801 law
echo "2072 - Processing 01.0801 low analysis started at $(timestamp)"
php panini.php 01.0801 low
echo "2073 - Processing 01.0801 laN analysis started at $(timestamp)"
php panini.php 01.0801 laN
echo "2074 - Processing 01.0801 viDiliN analysis started at $(timestamp)"
php panini.php 01.0801 viDiliN
echo "2075 - Processing 01.0582 law analysis started at $(timestamp)"
php panini.php 01.0582 law
echo "2076 - Processing 01.0582 liw analysis started at $(timestamp)"
php panini.php 01.0582 liw
echo "2077 - Processing 01.0582 luw analysis started at $(timestamp)"
php panini.php 01.0582 luw
echo "2078 - Processing 01.0582 lfw analysis started at $(timestamp)"
php panini.php 01.0582 lfw
echo "2079 - Processing 01.0582 low analysis started at $(timestamp)"
php panini.php 01.0582 low
echo "2080 - Processing 01.0582 laN analysis started at $(timestamp)"
php panini.php 01.0582 laN
echo "2081 - Processing 01.0582 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0582 ASIrliN
echo "2082 - Processing 01.0582 viDiliN analysis started at $(timestamp)"
php panini.php 01.0582 viDiliN
echo "2083 - Processing 01.0582 luN analysis started at $(timestamp)"
php panini.php 01.0582 luN
echo "2084 - Processing 01.0582 lfN analysis started at $(timestamp)"
php panini.php 01.0582 lfN
echo "2085 - Processing 01.0123 laN analysis started at $(timestamp)"
php panini.php 01.0123 laN
echo "2086 - Processing 01.0123 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0123 ASIrliN
echo "2087 - Processing 01.0622 law analysis started at $(timestamp)"
php panini.php 01.0622 law
echo "2088 - Processing 01.0622 liw analysis started at $(timestamp)"
php panini.php 01.0622 liw
echo "2089 - Processing 01.0622 luw analysis started at $(timestamp)"
php panini.php 01.0622 luw
echo "2090 - Processing 01.0622 lfw analysis started at $(timestamp)"
php panini.php 01.0622 lfw
echo "2091 - Processing 01.0622 low analysis started at $(timestamp)"
php panini.php 01.0622 low
echo "2092 - Processing 01.0622 laN analysis started at $(timestamp)"
php panini.php 01.0622 laN
echo "2093 - Processing 01.0622 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0622 ASIrliN
echo "2094 - Processing 01.0622 viDiliN analysis started at $(timestamp)"
php panini.php 01.0622 viDiliN
echo "2095 - Processing 01.0622 luN analysis started at $(timestamp)"
php panini.php 01.0622 luN
echo "2096 - Processing 01.0622 lfN analysis started at $(timestamp)"
php panini.php 01.0622 lfN
echo "2097 - Processing 01.0383 law analysis started at $(timestamp)"
php panini.php 01.0383 law
echo "2098 - Processing 01.0383 liw analysis started at $(timestamp)"
php panini.php 01.0383 liw
echo "2099 - Processing 01.0383 luw analysis started at $(timestamp)"
php panini.php 01.0383 luw
echo "2100 - Processing 01.0383 lfw analysis started at $(timestamp)"
php panini.php 01.0383 lfw
echo "2101 - Processing 01.0383 low analysis started at $(timestamp)"
php panini.php 01.0383 low
echo "2102 - Processing 01.0383 laN analysis started at $(timestamp)"
php panini.php 01.0383 laN
echo "2103 - Processing 01.0383 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0383 ASIrliN
echo "2104 - Processing 01.0383 viDiliN analysis started at $(timestamp)"
php panini.php 01.0383 viDiliN
echo "2105 - Processing 01.0383 luN analysis started at $(timestamp)"
php panini.php 01.0383 luN
echo "2106 - Processing 01.0383 lfN analysis started at $(timestamp)"
php panini.php 01.0383 lfN
echo "2107 - Processing 01.0378 law analysis started at $(timestamp)"
php panini.php 01.0378 law
echo "2108 - Processing 01.0378 liw analysis started at $(timestamp)"
php panini.php 01.0378 liw
echo "2109 - Processing 01.0378 luw analysis started at $(timestamp)"
php panini.php 01.0378 luw
echo "2110 - Processing 01.0378 lfw analysis started at $(timestamp)"
php panini.php 01.0378 lfw
echo "2111 - Processing 01.0378 low analysis started at $(timestamp)"
php panini.php 01.0378 low
echo "2112 - Processing 01.0378 laN analysis started at $(timestamp)"
php panini.php 01.0378 laN
echo "2113 - Processing 01.0378 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0378 ASIrliN
echo "2114 - Processing 01.0378 viDiliN analysis started at $(timestamp)"
php panini.php 01.0378 viDiliN
echo "2115 - Processing 01.0378 luN analysis started at $(timestamp)"
php panini.php 01.0378 luN
echo "2116 - Processing 01.0378 lfN analysis started at $(timestamp)"
php panini.php 01.0378 lfN
echo "2117 - Processing 01.0053 lfN analysis started at $(timestamp)"
php panini.php 01.0053 lfN
echo "2118 - Processing 01.1128 law analysis started at $(timestamp)"
php panini.php 01.1128 law
echo "2119 - Processing 01.1128 liw analysis started at $(timestamp)"
php panini.php 01.1128 liw
echo "2120 - Processing 01.1128 luw analysis started at $(timestamp)"
php panini.php 01.1128 luw
echo "2121 - Processing 01.1128 lfw analysis started at $(timestamp)"
php panini.php 01.1128 lfw
echo "2122 - Processing 01.1128 low analysis started at $(timestamp)"
php panini.php 01.1128 low
echo "2123 - Processing 01.1128 laN analysis started at $(timestamp)"
php panini.php 01.1128 laN
echo "2124 - Processing 01.1128 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1128 ASIrliN
echo "2125 - Processing 01.1128 viDiliN analysis started at $(timestamp)"
php panini.php 01.1128 viDiliN
echo "2126 - Processing 01.1128 luN analysis started at $(timestamp)"
php panini.php 01.1128 luN
echo "2127 - Processing 01.1128 lfN analysis started at $(timestamp)"
php panini.php 01.1128 lfN
echo "2128 - Processing 09.0021 law analysis started at $(timestamp)"
php panini.php 09.0021 law
echo "2129 - Processing 09.0021 liw analysis started at $(timestamp)"
php panini.php 09.0021 liw
echo "2130 - Processing 09.0021 low analysis started at $(timestamp)"
php panini.php 09.0021 low
echo "2131 - Processing 09.0021 laN analysis started at $(timestamp)"
php panini.php 09.0021 laN
echo "2132 - Processing 09.0021 viDiliN analysis started at $(timestamp)"
php panini.php 09.0021 viDiliN
echo "2133 - Processing 09.0021 luN analysis started at $(timestamp)"
php panini.php 09.0021 luN
echo "2134 - Processing 01.0725 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0725 ASIrliN
echo "2135 - Processing 01.0974 law analysis started at $(timestamp)"
php panini.php 01.0974 law
echo "2136 - Processing 01.0974 liw analysis started at $(timestamp)"
php panini.php 01.0974 liw
echo "2137 - Processing 01.0974 luw analysis started at $(timestamp)"
php panini.php 01.0974 luw
echo "2138 - Processing 01.0974 lfw analysis started at $(timestamp)"
php panini.php 01.0974 lfw
echo "2139 - Processing 01.0974 low analysis started at $(timestamp)"
php panini.php 01.0974 low
echo "2140 - Processing 01.0974 laN analysis started at $(timestamp)"
php panini.php 01.0974 laN
echo "2141 - Processing 01.0974 viDiliN analysis started at $(timestamp)"
php panini.php 01.0974 viDiliN
echo "2142 - Processing 01.0974 luN analysis started at $(timestamp)"
php panini.php 01.0974 luN
echo "2143 - Processing 01.0974 lfN analysis started at $(timestamp)"
php panini.php 01.0974 lfN
echo "2144 - Processing 01.0726 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0726 ASIrliN
echo "2145 - Processing 10.0458 law analysis started at $(timestamp)"
php panini.php 10.0458 law
echo "2146 - Processing 10.0458 liw analysis started at $(timestamp)"
php panini.php 10.0458 liw
echo "2147 - Processing 10.0458 luw analysis started at $(timestamp)"
php panini.php 10.0458 luw
echo "2148 - Processing 10.0458 lfw analysis started at $(timestamp)"
php panini.php 10.0458 lfw
echo "2149 - Processing 10.0458 low analysis started at $(timestamp)"
php panini.php 10.0458 low
echo "2150 - Processing 10.0458 laN analysis started at $(timestamp)"
php panini.php 10.0458 laN
echo "2151 - Processing 10.0458 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0458 ASIrliN
echo "2152 - Processing 10.0458 viDiliN analysis started at $(timestamp)"
php panini.php 10.0458 viDiliN
echo "2153 - Processing 10.0458 luN analysis started at $(timestamp)"
php panini.php 10.0458 luN
echo "2154 - Processing 10.0458 lfN analysis started at $(timestamp)"
php panini.php 10.0458 lfN
echo "2155 - Processing 04.0112 law analysis started at $(timestamp)"
php panini.php 04.0112 law
echo "2156 - Processing 04.0112 liw analysis started at $(timestamp)"
php panini.php 04.0112 liw
echo "2157 - Processing 04.0112 luw analysis started at $(timestamp)"
php panini.php 04.0112 luw
echo "2158 - Processing 04.0112 lfw analysis started at $(timestamp)"
php panini.php 04.0112 lfw
echo "2159 - Processing 04.0112 low analysis started at $(timestamp)"
php panini.php 04.0112 low
echo "2160 - Processing 04.0112 laN analysis started at $(timestamp)"
php panini.php 04.0112 laN
echo "2161 - Processing 04.0112 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0112 ASIrliN
echo "2162 - Processing 04.0112 viDiliN analysis started at $(timestamp)"
php panini.php 04.0112 viDiliN
echo "2163 - Processing 04.0112 luN analysis started at $(timestamp)"
php panini.php 04.0112 luN
echo "2164 - Processing 04.0112 lfN analysis started at $(timestamp)"
php panini.php 04.0112 lfN
echo "2165 - Processing 10.0203 luN analysis started at $(timestamp)"
php panini.php 10.0203 luN
echo "2166 - Processing 01.0320 law analysis started at $(timestamp)"
php panini.php 01.0320 law
echo "2167 - Processing 01.0320 liw analysis started at $(timestamp)"
php panini.php 01.0320 liw
echo "2168 - Processing 01.0320 luw analysis started at $(timestamp)"
php panini.php 01.0320 luw
echo "2169 - Processing 01.0320 lfw analysis started at $(timestamp)"
php panini.php 01.0320 lfw
echo "2170 - Processing 01.0320 low analysis started at $(timestamp)"
php panini.php 01.0320 low
echo "2171 - Processing 01.0320 laN analysis started at $(timestamp)"
php panini.php 01.0320 laN
echo "2172 - Processing 01.0320 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0320 ASIrliN
echo "2173 - Processing 01.0320 viDiliN analysis started at $(timestamp)"
php panini.php 01.0320 viDiliN
echo "2174 - Processing 01.0320 luN analysis started at $(timestamp)"
php panini.php 01.0320 luN
echo "2175 - Processing 01.0320 lfN analysis started at $(timestamp)"
php panini.php 01.0320 lfN
echo "2176 - Processing 01.0820 law analysis started at $(timestamp)"
php panini.php 01.0820 law
echo "2177 - Processing 01.0820 liw analysis started at $(timestamp)"
php panini.php 01.0820 liw
echo "2178 - Processing 01.0820 luw analysis started at $(timestamp)"
php panini.php 01.0820 luw
echo "2179 - Processing 01.0820 lfw analysis started at $(timestamp)"
php panini.php 01.0820 lfw
echo "2180 - Processing 01.0820 low analysis started at $(timestamp)"
php panini.php 01.0820 low
echo "2181 - Processing 01.0820 laN analysis started at $(timestamp)"
php panini.php 01.0820 laN
echo "2182 - Processing 01.0820 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0820 ASIrliN
echo "2183 - Processing 01.0820 viDiliN analysis started at $(timestamp)"
php panini.php 01.0820 viDiliN
echo "2184 - Processing 01.0820 luN analysis started at $(timestamp)"
php panini.php 01.0820 luN
echo "2185 - Processing 01.0820 lfN analysis started at $(timestamp)"
php panini.php 01.0820 lfN
echo "2186 - Processing 01.0445 law analysis started at $(timestamp)"
php panini.php 01.0445 law
echo "2187 - Processing 01.0445 liw analysis started at $(timestamp)"
php panini.php 01.0445 liw
echo "2188 - Processing 01.0445 luw analysis started at $(timestamp)"
php panini.php 01.0445 luw
echo "2189 - Processing 01.0445 lfw analysis started at $(timestamp)"
php panini.php 01.0445 lfw
echo "2190 - Processing 01.0445 low analysis started at $(timestamp)"
php panini.php 01.0445 low
echo "2191 - Processing 01.0445 laN analysis started at $(timestamp)"
php panini.php 01.0445 laN
echo "2192 - Processing 01.0445 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0445 ASIrliN
echo "2193 - Processing 01.0445 viDiliN analysis started at $(timestamp)"
php panini.php 01.0445 viDiliN
echo "2194 - Processing 01.0445 luN analysis started at $(timestamp)"
php panini.php 01.0445 luN
echo "2195 - Processing 01.0445 lfN analysis started at $(timestamp)"
php panini.php 01.0445 lfN
echo "2196 - Processing 01.0126 luw analysis started at $(timestamp)"
php panini.php 01.0126 luw
echo "2197 - Processing 04.0068 law analysis started at $(timestamp)"
php panini.php 04.0068 law
echo "2198 - Processing 04.0068 low analysis started at $(timestamp)"
php panini.php 04.0068 low
echo "2199 - Processing 04.0068 luN analysis started at $(timestamp)"
php panini.php 04.0068 luN
echo "2200 - Processing 01.1016 laN analysis started at $(timestamp)"
php panini.php 01.1016 laN
echo "2201 - Processing 01.1016 luN analysis started at $(timestamp)"
php panini.php 01.1016 luN
echo "2202 - Processing 01.1017 luN analysis started at $(timestamp)"
php panini.php 01.1017 luN
echo "2203 - Processing 04.0117 liw analysis started at $(timestamp)"
php panini.php 04.0117 liw
echo "2204 - Processing 04.0129 liw analysis started at $(timestamp)"
php panini.php 04.0129 liw
echo "2205 - Processing 10.0080 luw analysis started at $(timestamp)"
php panini.php 10.0080 luw
echo "2206 - Processing 10.0080 lfw analysis started at $(timestamp)"
php panini.php 10.0080 lfw
echo "2207 - Processing 10.0080 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0080 ASIrliN
echo "2208 - Processing 10.0080 viDiliN analysis started at $(timestamp)"
php panini.php 10.0080 viDiliN
echo "2209 - Processing 10.0080 luN analysis started at $(timestamp)"
php panini.php 10.0080 luN
echo "2210 - Processing 10.0080 lfN analysis started at $(timestamp)"
php panini.php 10.0080 lfN
echo "2211 - Processing 10.0299 liw analysis started at $(timestamp)"
php panini.php 10.0299 liw
echo "2212 - Processing 10.0299 lfw analysis started at $(timestamp)"
php panini.php 10.0299 lfw
echo "2213 - Processing 10.0299 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0299 ASIrliN
echo "2214 - Processing 10.0299 viDiliN analysis started at $(timestamp)"
php panini.php 10.0299 viDiliN
echo "2215 - Processing 10.0299 luN analysis started at $(timestamp)"
php panini.php 10.0299 luN
echo "2216 - Processing 06.0074 law analysis started at $(timestamp)"
php panini.php 06.0074 law
echo "2217 - Processing 06.0074 low analysis started at $(timestamp)"
php panini.php 06.0074 low
echo "2218 - Processing 06.0074 laN analysis started at $(timestamp)"
php panini.php 06.0074 laN
echo "2219 - Processing 06.0074 viDiliN analysis started at $(timestamp)"
php panini.php 06.0074 viDiliN
echo "2220 - Processing 01.0821 law analysis started at $(timestamp)"
php panini.php 01.0821 law
echo "2221 - Processing 01.0821 liw analysis started at $(timestamp)"
php panini.php 01.0821 liw
echo "2222 - Processing 01.0821 luw analysis started at $(timestamp)"
php panini.php 01.0821 luw
echo "2223 - Processing 01.0821 lfw analysis started at $(timestamp)"
php panini.php 01.0821 lfw
echo "2224 - Processing 01.0821 low analysis started at $(timestamp)"
php panini.php 01.0821 low
echo "2225 - Processing 01.0821 laN analysis started at $(timestamp)"
php panini.php 01.0821 laN
echo "2226 - Processing 01.0821 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0821 ASIrliN
echo "2227 - Processing 01.0821 viDiliN analysis started at $(timestamp)"
php panini.php 01.0821 viDiliN
echo "2228 - Processing 01.0821 luN analysis started at $(timestamp)"
php panini.php 01.0821 luN
echo "2229 - Processing 01.0821 lfN analysis started at $(timestamp)"
php panini.php 01.0821 lfN
echo "2230 - Processing 04.0116 law analysis started at $(timestamp)"
php panini.php 04.0116 law
echo "2231 - Processing 04.0116 liw analysis started at $(timestamp)"
php panini.php 04.0116 liw
echo "2232 - Processing 04.0116 luw analysis started at $(timestamp)"
php panini.php 04.0116 luw
echo "2233 - Processing 04.0116 lfw analysis started at $(timestamp)"
php panini.php 04.0116 lfw
echo "2234 - Processing 04.0116 low analysis started at $(timestamp)"
php panini.php 04.0116 low
echo "2235 - Processing 04.0116 laN analysis started at $(timestamp)"
php panini.php 04.0116 laN
echo "2236 - Processing 04.0116 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0116 ASIrliN
echo "2237 - Processing 04.0116 viDiliN analysis started at $(timestamp)"
php panini.php 04.0116 viDiliN
echo "2238 - Processing 04.0116 luN analysis started at $(timestamp)"
php panini.php 04.0116 luN
echo "2239 - Processing 04.0116 lfN analysis started at $(timestamp)"
php panini.php 04.0116 lfN
echo "2240 - Processing 02.0039 liw analysis started at $(timestamp)"
php panini.php 02.0039 liw
echo "2241 - Processing 02.0039 luN analysis started at $(timestamp)"
php panini.php 02.0039 luN
echo "2242 - Processing 10.0172 luw analysis started at $(timestamp)"
php panini.php 10.0172 luw
echo "2243 - Processing 10.0172 lfw analysis started at $(timestamp)"
php panini.php 10.0172 lfw
echo "2244 - Processing 10.0172 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0172 ASIrliN
echo "2245 - Processing 10.0172 viDiliN analysis started at $(timestamp)"
php panini.php 10.0172 viDiliN
echo "2246 - Processing 10.0172 luN analysis started at $(timestamp)"
php panini.php 10.0172 luN
echo "2247 - Processing 10.0172 lfN analysis started at $(timestamp)"
php panini.php 10.0172 lfN
echo "2248 - Processing 09.0038 law analysis started at $(timestamp)"
php panini.php 09.0038 law
echo "2249 - Processing 09.0038 liw analysis started at $(timestamp)"
php panini.php 09.0038 liw
echo "2250 - Processing 09.0038 luw analysis started at $(timestamp)"
php panini.php 09.0038 luw
echo "2251 - Processing 09.0038 lfw analysis started at $(timestamp)"
php panini.php 09.0038 lfw
echo "2252 - Processing 09.0038 low analysis started at $(timestamp)"
php panini.php 09.0038 low
echo "2253 - Processing 09.0038 laN analysis started at $(timestamp)"
php panini.php 09.0038 laN
echo "2254 - Processing 09.0038 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0038 ASIrliN
echo "2255 - Processing 09.0038 viDiliN analysis started at $(timestamp)"
php panini.php 09.0038 viDiliN
echo "2256 - Processing 09.0038 luN analysis started at $(timestamp)"
php panini.php 09.0038 luN
echo "2257 - Processing 09.0038 lfN analysis started at $(timestamp)"
php panini.php 09.0038 lfN
echo "2258 - Processing 01.1039 law analysis started at $(timestamp)"
php panini.php 01.1039 law
echo "2259 - Processing 01.1039 liw analysis started at $(timestamp)"
php panini.php 01.1039 liw
echo "2260 - Processing 01.1039 luw analysis started at $(timestamp)"
php panini.php 01.1039 luw
echo "2261 - Processing 01.1039 lfw analysis started at $(timestamp)"
php panini.php 01.1039 lfw
echo "2262 - Processing 01.1039 low analysis started at $(timestamp)"
php panini.php 01.1039 low
echo "2263 - Processing 01.1039 laN analysis started at $(timestamp)"
php panini.php 01.1039 laN
echo "2264 - Processing 01.1039 viDiliN analysis started at $(timestamp)"
php panini.php 01.1039 viDiliN
echo "2265 - Processing 01.1039 luN analysis started at $(timestamp)"
php panini.php 01.1039 luN
echo "2266 - Processing 01.1153 liw analysis started at $(timestamp)"
php panini.php 01.1153 liw
echo "2267 - Processing 07.0290 luN analysis started at $(timestamp)"
php panini.php 07.0290 luN
echo "2268 - Processing 01.0662 law analysis started at $(timestamp)"
php panini.php 01.0662 law
echo "2269 - Processing 01.0662 liw analysis started at $(timestamp)"
php panini.php 01.0662 liw
echo "2270 - Processing 01.0662 luw analysis started at $(timestamp)"
php panini.php 01.0662 luw
echo "2271 - Processing 01.0662 lfw analysis started at $(timestamp)"
php panini.php 01.0662 lfw
echo "2272 - Processing 01.0662 low analysis started at $(timestamp)"
php panini.php 01.0662 low
echo "2273 - Processing 01.0662 laN analysis started at $(timestamp)"
php panini.php 01.0662 laN
echo "2274 - Processing 01.0662 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0662 ASIrliN
echo "2275 - Processing 01.0662 viDiliN analysis started at $(timestamp)"
php panini.php 01.0662 viDiliN
echo "2276 - Processing 01.0662 luN analysis started at $(timestamp)"
php panini.php 01.0662 luN
echo "2277 - Processing 01.0662 lfN analysis started at $(timestamp)"
php panini.php 01.0662 lfN
echo "2278 - Processing 01.0663 law analysis started at $(timestamp)"
php panini.php 01.0663 law
echo "2279 - Processing 01.0663 liw analysis started at $(timestamp)"
php panini.php 01.0663 liw
echo "2280 - Processing 01.0663 luw analysis started at $(timestamp)"
php panini.php 01.0663 luw
echo "2281 - Processing 01.0663 lfw analysis started at $(timestamp)"
php panini.php 01.0663 lfw
echo "2282 - Processing 01.0663 low analysis started at $(timestamp)"
php panini.php 01.0663 low
echo "2283 - Processing 01.0663 laN analysis started at $(timestamp)"
php panini.php 01.0663 laN
echo "2284 - Processing 01.0663 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0663 ASIrliN
echo "2285 - Processing 01.0663 viDiliN analysis started at $(timestamp)"
php panini.php 01.0663 viDiliN
echo "2286 - Processing 01.0663 luN analysis started at $(timestamp)"
php panini.php 01.0663 luN
echo "2287 - Processing 01.0663 lfN analysis started at $(timestamp)"
php panini.php 01.0663 lfN
echo "2288 - Processing 01.0569 law analysis started at $(timestamp)"
php panini.php 01.0569 law
echo "2289 - Processing 01.0569 liw analysis started at $(timestamp)"
php panini.php 01.0569 liw
echo "2290 - Processing 01.0569 low analysis started at $(timestamp)"
php panini.php 01.0569 low
echo "2291 - Processing 01.0569 laN analysis started at $(timestamp)"
php panini.php 01.0569 laN
echo "2292 - Processing 01.0569 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0569 ASIrliN
echo "2293 - Processing 01.0569 viDiliN analysis started at $(timestamp)"
php panini.php 01.0569 viDiliN
echo "2294 - Processing 01.0569 luN analysis started at $(timestamp)"
php panini.php 01.0569 luN
echo "2295 - Processing 04.0113 liw analysis started at $(timestamp)"
php panini.php 04.0113 liw
echo "2296 - Processing 04.0113 luN analysis started at $(timestamp)"
php panini.php 04.0113 luN
echo "2297 - Processing 03.0019 law analysis started at $(timestamp)"
php panini.php 03.0019 law
echo "2298 - Processing 03.0019 liw analysis started at $(timestamp)"
php panini.php 03.0019 liw
echo "2299 - Processing 03.0019 low analysis started at $(timestamp)"
php panini.php 03.0019 low
echo "2300 - Processing 03.0019 laN analysis started at $(timestamp)"
php panini.php 03.0019 laN
echo "2301 - Processing 03.0019 viDiliN analysis started at $(timestamp)"
php panini.php 03.0019 viDiliN
echo "2302 - Processing 01.0509 liw analysis started at $(timestamp)"
php panini.php 01.0509 liw
echo "2303 - Processing 01.0696 luN analysis started at $(timestamp)"
php panini.php 01.0696 luN
echo "2304 - Processing 01.0711 liw analysis started at $(timestamp)"
php panini.php 01.0711 liw
echo "2305 - Processing 01.0690 luN analysis started at $(timestamp)"
php panini.php 01.0690 luN
echo "2306 - Processing 07.0002 law analysis started at $(timestamp)"
php panini.php 07.0002 law
echo "2307 - Processing 07.0002 laN analysis started at $(timestamp)"
php panini.php 07.0002 laN
echo "2308 - Processing 01.0067 lfN analysis started at $(timestamp)"
php panini.php 01.0067 lfN
echo "2309 - Processing 03.0002 law analysis started at $(timestamp)"
php panini.php 03.0002 law
echo "2310 - Processing 03.0002 liw analysis started at $(timestamp)"
php panini.php 03.0002 liw
echo "2311 - Processing 03.0002 low analysis started at $(timestamp)"
php panini.php 03.0002 low
echo "2312 - Processing 03.0002 laN analysis started at $(timestamp)"
php panini.php 03.0002 laN
echo "2313 - Processing 03.0002 viDiliN analysis started at $(timestamp)"
php panini.php 03.0002 viDiliN
echo "2314 - Processing 06.0153 law analysis started at $(timestamp)"
php panini.php 06.0153 law
echo "2315 - Processing 06.0153 low analysis started at $(timestamp)"
php panini.php 06.0153 low
echo "2316 - Processing 06.0153 laN analysis started at $(timestamp)"
php panini.php 06.0153 laN
echo "2317 - Processing 06.0153 viDiliN analysis started at $(timestamp)"
php panini.php 06.0153 viDiliN
echo "2318 - Processing 10.0382 luN analysis started at $(timestamp)"
php panini.php 10.0382 luN
echo "2319 - Processing 10.0277 luN analysis started at $(timestamp)"
php panini.php 10.0277 luN
echo "2320 - Processing 10.0255 luN analysis started at $(timestamp)"
php panini.php 10.0255 luN
echo "2321 - Processing 03.0318 law analysis started at $(timestamp)"
php panini.php 03.0318 law
echo "2322 - Processing 03.0318 liw analysis started at $(timestamp)"
php panini.php 03.0318 liw
echo "2323 - Processing 03.0318 low analysis started at $(timestamp)"
php panini.php 03.0318 low
echo "2324 - Processing 03.0318 laN analysis started at $(timestamp)"
php panini.php 03.0318 laN
echo "2325 - Processing 03.0318 viDiliN analysis started at $(timestamp)"
php panini.php 03.0318 viDiliN
echo "2326 - Processing 10.1045 law analysis started at $(timestamp)"
php panini.php 10.1045 law
echo "2327 - Processing 10.1045 ASIrliN analysis started at $(timestamp)"
php panini.php 10.1045 ASIrliN
echo "2328 - Processing 04.0006 law analysis started at $(timestamp)"
php panini.php 04.0006 law
echo "2329 - Processing 04.0006 liw analysis started at $(timestamp)"
php panini.php 04.0006 liw
echo "2330 - Processing 04.0006 low analysis started at $(timestamp)"
php panini.php 04.0006 low
echo "2331 - Processing 04.0006 laN analysis started at $(timestamp)"
php panini.php 04.0006 laN
echo "2332 - Processing 04.0006 viDiliN analysis started at $(timestamp)"
php panini.php 04.0006 viDiliN
echo "2333 - Processing 04.0006 luN analysis started at $(timestamp)"
php panini.php 04.0006 luN
echo "2334 - Processing 04.0006 lfN analysis started at $(timestamp)"
php panini.php 04.0006 lfN
echo "2335 - Processing 01.0202 law analysis started at $(timestamp)"
php panini.php 01.0202 law
echo "2336 - Processing 06.0129 luw analysis started at $(timestamp)"
php panini.php 06.0129 luw
echo "2337 - Processing 06.0129 lfw analysis started at $(timestamp)"
php panini.php 06.0129 lfw
echo "2338 - Processing 06.0129 luN analysis started at $(timestamp)"
php panini.php 06.0129 luN
echo "2339 - Processing 06.0129 lfN analysis started at $(timestamp)"
php panini.php 06.0129 lfN
echo "2340 - Processing 09.0024 liw analysis started at $(timestamp)"
php panini.php 09.0024 liw
echo "2341 - Processing 09.0024 laN analysis started at $(timestamp)"
php panini.php 09.0024 laN
echo "2342 - Processing 09.0024 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0024 ASIrliN
echo "2343 - Processing 01.1026 laN analysis started at $(timestamp)"
php panini.php 01.1026 laN
echo "2344 - Processing 01.0715 liw analysis started at $(timestamp)"
php panini.php 01.0715 liw
echo "2345 - Processing 04.0138 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0138 ASIrliN
echo "2346 - Processing 04.0138 viDiliN analysis started at $(timestamp)"
php panini.php 04.0138 viDiliN
echo "2347 - Processing 01.0859 liw analysis started at $(timestamp)"
php panini.php 01.0859 liw
echo "2348 - Processing 01.0859 luN analysis started at $(timestamp)"
php panini.php 01.0859 luN
echo "2349 - Processing 01.1037 luN analysis started at $(timestamp)"
php panini.php 01.1037 luN
echo "2350 - Processing 06.0004 law analysis started at $(timestamp)"
php panini.php 06.0004 law
echo "2351 - Processing 06.0004 liw analysis started at $(timestamp)"
php panini.php 06.0004 liw
echo "2352 - Processing 06.0004 low analysis started at $(timestamp)"
php panini.php 06.0004 low
echo "2353 - Processing 06.0004 laN analysis started at $(timestamp)"
php panini.php 06.0004 laN
echo "2354 - Processing 06.0004 viDiliN analysis started at $(timestamp)"
php panini.php 06.0004 viDiliN
echo "2355 - Processing 06.0004 luN analysis started at $(timestamp)"
php panini.php 06.0004 luN
echo "2356 - Processing 01.0985 viDiliN analysis started at $(timestamp)"
php panini.php 01.0985 viDiliN
echo "2357 - Processing 01.0205 luN analysis started at $(timestamp)"
php panini.php 01.0205 luN
echo "2358 - Processing 01.0957 luN analysis started at $(timestamp)"
php panini.php 01.0957 luN
echo "2359 - Processing 01.0958 law analysis started at $(timestamp)"
php panini.php 01.0958 law
echo "2360 - Processing 01.0958 low analysis started at $(timestamp)"
php panini.php 01.0958 low
echo "2361 - Processing 01.0958 laN analysis started at $(timestamp)"
php panini.php 01.0958 laN
echo "2362 - Processing 01.0958 viDiliN analysis started at $(timestamp)"
php panini.php 01.0958 viDiliN
echo "2363 - Processing 01.0958 luN analysis started at $(timestamp)"
php panini.php 01.0958 luN
echo "2364 - Processing 09.0041 liw analysis started at $(timestamp)"
php panini.php 09.0041 liw
echo "2365 - Processing 01.0204 law analysis started at $(timestamp)"
php panini.php 01.0204 law
echo "2366 - Processing 01.0204 liw analysis started at $(timestamp)"
php panini.php 01.0204 liw
echo "2367 - Processing 01.0204 low analysis started at $(timestamp)"
php panini.php 01.0204 low
echo "2368 - Processing 01.0204 laN analysis started at $(timestamp)"
php panini.php 01.0204 laN
echo "2369 - Processing 01.0204 viDiliN analysis started at $(timestamp)"
php panini.php 01.0204 viDiliN
echo "2370 - Processing 01.0204 luN analysis started at $(timestamp)"
php panini.php 01.0204 luN
echo "2371 - Processing 01.1027 low analysis started at $(timestamp)"
php panini.php 01.1027 low
echo "2372 - Processing 01.1027 laN analysis started at $(timestamp)"
php panini.php 01.1027 laN
echo "2373 - Processing 01.1038 low analysis started at $(timestamp)"
php panini.php 01.1038 low
echo "2374 - Processing 01.1038 laN analysis started at $(timestamp)"
php panini.php 01.1038 laN
echo "2375 - Processing 01.0959 law analysis started at $(timestamp)"
php panini.php 01.0959 law
echo "2376 - Processing 01.0959 low analysis started at $(timestamp)"
php panini.php 01.0959 low
echo "2377 - Processing 01.0959 laN analysis started at $(timestamp)"
php panini.php 01.0959 laN
echo "2378 - Processing 01.0959 viDiliN analysis started at $(timestamp)"
php panini.php 01.0959 viDiliN
echo "2379 - Processing 01.0959 luN analysis started at $(timestamp)"
php panini.php 01.0959 luN
echo "2380 - Processing 01.1028 law analysis started at $(timestamp)"
php panini.php 01.1028 law
echo "2381 - Processing 01.1028 liw analysis started at $(timestamp)"
php panini.php 01.1028 liw
echo "2382 - Processing 01.1028 luw analysis started at $(timestamp)"
php panini.php 01.1028 luw
echo "2383 - Processing 01.1028 lfw analysis started at $(timestamp)"
php panini.php 01.1028 lfw
echo "2384 - Processing 01.1028 low analysis started at $(timestamp)"
php panini.php 01.1028 low
echo "2385 - Processing 01.1028 laN analysis started at $(timestamp)"
php panini.php 01.1028 laN
echo "2386 - Processing 01.1028 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1028 ASIrliN
echo "2387 - Processing 01.1028 viDiliN analysis started at $(timestamp)"
php panini.php 01.1028 viDiliN
echo "2388 - Processing 01.1028 luN analysis started at $(timestamp)"
php panini.php 01.1028 luN
echo "2389 - Processing 01.1028 lfN analysis started at $(timestamp)"
php panini.php 01.1028 lfN
echo "2390 - Processing 01.0094 liw analysis started at $(timestamp)"
php panini.php 01.0094 liw
echo "2391 - Processing 01.0094 luN analysis started at $(timestamp)"
php panini.php 01.0094 luN
echo "2392 - Processing 01.0141 lfN analysis started at $(timestamp)"
php panini.php 01.0141 lfN
echo "2393 - Processing 01.0157 law analysis started at $(timestamp)"
php panini.php 01.0157 law
echo "2394 - Processing 01.0157 liw analysis started at $(timestamp)"
php panini.php 01.0157 liw
echo "2395 - Processing 01.0157 luw analysis started at $(timestamp)"
php panini.php 01.0157 luw
echo "2396 - Processing 01.0157 lfw analysis started at $(timestamp)"
php panini.php 01.0157 lfw
echo "2397 - Processing 01.0157 low analysis started at $(timestamp)"
php panini.php 01.0157 low
echo "2398 - Processing 01.0157 laN analysis started at $(timestamp)"
php panini.php 01.0157 laN
echo "2399 - Processing 01.0157 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0157 ASIrliN
echo "2400 - Processing 01.0157 viDiliN analysis started at $(timestamp)"
php panini.php 01.0157 viDiliN
echo "2401 - Processing 01.0157 luN analysis started at $(timestamp)"
php panini.php 01.0157 luN
echo "2402 - Processing 01.0157 lfN analysis started at $(timestamp)"
php panini.php 01.0157 lfN
echo "2403 - Processing 01.0183 lfN analysis started at $(timestamp)"
php panini.php 01.0183 lfN
echo "2404 - Processing 01.0195 law analysis started at $(timestamp)"
php panini.php 01.0195 law
echo "2405 - Processing 01.0195 liw analysis started at $(timestamp)"
php panini.php 01.0195 liw
echo "2406 - Processing 01.0195 low analysis started at $(timestamp)"
php panini.php 01.0195 low
echo "2407 - Processing 01.0195 laN analysis started at $(timestamp)"
php panini.php 01.0195 laN
echo "2408 - Processing 01.0195 viDiliN analysis started at $(timestamp)"
php panini.php 01.0195 viDiliN
echo "2409 - Processing 01.0195 luN analysis started at $(timestamp)"
php panini.php 01.0195 luN
echo "2410 - Processing 06.0151 law analysis started at $(timestamp)"
php panini.php 06.0151 law
echo "2411 - Processing 06.0151 liw analysis started at $(timestamp)"
php panini.php 06.0151 liw
echo "2412 - Processing 06.0151 luw analysis started at $(timestamp)"
php panini.php 06.0151 luw
echo "2413 - Processing 06.0151 lfw analysis started at $(timestamp)"
php panini.php 06.0151 lfw
echo "2414 - Processing 06.0151 low analysis started at $(timestamp)"
php panini.php 06.0151 low
echo "2415 - Processing 06.0151 laN analysis started at $(timestamp)"
php panini.php 06.0151 laN
echo "2416 - Processing 06.0151 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0151 ASIrliN
echo "2417 - Processing 06.0151 viDiliN analysis started at $(timestamp)"
php panini.php 06.0151 viDiliN
echo "2418 - Processing 06.0151 luN analysis started at $(timestamp)"
php panini.php 06.0151 luN
echo "2419 - Processing 01.0296 luN analysis started at $(timestamp)"
php panini.php 01.0296 luN
echo "2420 - Processing 01.0305 luN analysis started at $(timestamp)"
php panini.php 01.0305 luN
echo "2421 - Processing 08.0233 luN analysis started at $(timestamp)"
php panini.php 08.0233 luN
echo "2422 - Processing 10.0073 luN analysis started at $(timestamp)"
php panini.php 10.0073 luN
echo "2423 - Processing 10.0199 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0199 ASIrliN
echo "2424 - Processing 09.0047 law analysis started at $(timestamp)"
php panini.php 09.0047 law
echo "2425 - Processing 09.0047 low analysis started at $(timestamp)"
php panini.php 09.0047 low
echo "2426 - Processing 09.0047 laN analysis started at $(timestamp)"
php panini.php 09.0047 laN
echo "2427 - Processing 09.0047 viDiliN analysis started at $(timestamp)"
php panini.php 09.0047 viDiliN
echo "2428 - Processing 01.0013 luN analysis started at $(timestamp)"
php panini.php 01.0013 luN
echo "2429 - Processing 01.0549 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0549 ASIrliN
echo "2430 - Processing 10.0151 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0151 ASIrliN
echo "2431 - Processing 01.0485 liw analysis started at $(timestamp)"
php panini.php 01.0485 liw
echo "2432 - Processing 01.0485 lfN analysis started at $(timestamp)"
php panini.php 01.0485 lfN
echo "2433 - Processing 01.0659 liw analysis started at $(timestamp)"
php panini.php 01.0659 liw
echo "2434 - Processing 01.0659 viDiliN analysis started at $(timestamp)"
php panini.php 01.0659 viDiliN
echo "2435 - Processing 01.0585 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0585 ASIrliN
echo "2436 - Processing 01.0107 luN analysis started at $(timestamp)"
php panini.php 01.0107 luN
echo "2437 - Processing 02.0057 law analysis started at $(timestamp)"
php panini.php 02.0057 law
echo "2438 - Processing 02.0057 low analysis started at $(timestamp)"
php panini.php 02.0057 low
echo "2439 - Processing 02.0057 laN analysis started at $(timestamp)"
php panini.php 02.0057 laN
echo "2440 - Processing 02.0057 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0057 ASIrliN
echo "2441 - Processing 02.0057 viDiliN analysis started at $(timestamp)"
php panini.php 02.0057 viDiliN
echo "2442 - Processing 03.0007 law analysis started at $(timestamp)"
php panini.php 03.0007 law
echo "2443 - Processing 03.0007 low analysis started at $(timestamp)"
php panini.php 03.0007 low
echo "2444 - Processing 03.0007 laN analysis started at $(timestamp)"
php panini.php 03.0007 laN
echo "2445 - Processing 03.0007 viDiliN analysis started at $(timestamp)"
php panini.php 03.0007 viDiliN
echo "2446 - Processing 01.0762 law analysis started at $(timestamp)"
php panini.php 01.0762 law
echo "2447 - Processing 01.0762 liw analysis started at $(timestamp)"
php panini.php 01.0762 liw
echo "2448 - Processing 01.0762 luw analysis started at $(timestamp)"
php panini.php 01.0762 luw
echo "2449 - Processing 01.0762 lfw analysis started at $(timestamp)"
php panini.php 01.0762 lfw
echo "2450 - Processing 01.0762 low analysis started at $(timestamp)"
php panini.php 01.0762 low
echo "2451 - Processing 01.0762 laN analysis started at $(timestamp)"
php panini.php 01.0762 laN
echo "2452 - Processing 01.0762 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0762 ASIrliN
echo "2453 - Processing 01.0762 viDiliN analysis started at $(timestamp)"
php panini.php 01.0762 viDiliN
echo "2454 - Processing 01.0762 luN analysis started at $(timestamp)"
php panini.php 01.0762 luN
echo "2455 - Processing 01.0762 lfN analysis started at $(timestamp)"
php panini.php 01.0762 lfN
echo "2456 - Processing 10.0234 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0234 ASIrliN
echo "2457 - Processing 10.0381 luN analysis started at $(timestamp)"
php panini.php 10.0381 luN
echo "2458 - Processing 01.1127 law analysis started at $(timestamp)"
php panini.php 01.1127 law
echo "2459 - Processing 01.1127 liw analysis started at $(timestamp)"
php panini.php 01.1127 liw
echo "2460 - Processing 01.1127 low analysis started at $(timestamp)"
php panini.php 01.1127 low
echo "2461 - Processing 01.1127 laN analysis started at $(timestamp)"
php panini.php 01.1127 laN
echo "2462 - Processing 01.1127 viDiliN analysis started at $(timestamp)"
php panini.php 01.1127 viDiliN
echo "2463 - Processing 01.1127 luN analysis started at $(timestamp)"
php panini.php 01.1127 luN
echo "2464 - Processing 01.1042 laN analysis started at $(timestamp)"
php panini.php 01.1042 laN
echo "2465 - Processing 01.1042 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1042 ASIrliN
echo "2466 - Processing 05.0004 luw analysis started at $(timestamp)"
php panini.php 05.0004 luw
echo "2467 - Processing 05.0004 lfw analysis started at $(timestamp)"
php panini.php 05.0004 lfw
echo "2468 - Processing 05.0004 viDiliN analysis started at $(timestamp)"
php panini.php 05.0004 viDiliN
echo "2469 - Processing 05.0004 luN analysis started at $(timestamp)"
php panini.php 05.0004 luN
echo "2470 - Processing 05.0004 lfN analysis started at $(timestamp)"
php panini.php 05.0004 lfN
echo "2471 - Processing 06.0017 law analysis started at $(timestamp)"
php panini.php 06.0017 law
echo "2472 - Processing 06.0017 liw analysis started at $(timestamp)"
php panini.php 06.0017 liw
echo "2473 - Processing 06.0017 luw analysis started at $(timestamp)"
php panini.php 06.0017 luw
echo "2474 - Processing 06.0017 lfw analysis started at $(timestamp)"
php panini.php 06.0017 lfw
echo "2475 - Processing 06.0017 low analysis started at $(timestamp)"
php panini.php 06.0017 low
echo "2476 - Processing 06.0017 laN analysis started at $(timestamp)"
php panini.php 06.0017 laN
echo "2477 - Processing 06.0017 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0017 ASIrliN
echo "2478 - Processing 06.0017 viDiliN analysis started at $(timestamp)"
php panini.php 06.0017 viDiliN
echo "2479 - Processing 06.0017 luN analysis started at $(timestamp)"
php panini.php 06.0017 luN
echo "2480 - Processing 06.0017 lfN analysis started at $(timestamp)"
php panini.php 06.0017 lfN
echo "2481 - Processing 10.0286 liw analysis started at $(timestamp)"
php panini.php 10.0286 liw
echo "2482 - Processing 10.0286 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0286 ASIrliN
echo "2483 - Processing 01.1008 law analysis started at $(timestamp)"
php panini.php 01.1008 law
echo "2484 - Processing 01.1008 liw analysis started at $(timestamp)"
php panini.php 01.1008 liw
echo "2485 - Processing 01.1008 luw analysis started at $(timestamp)"
php panini.php 01.1008 luw
echo "2486 - Processing 01.1008 lfw analysis started at $(timestamp)"
php panini.php 01.1008 lfw
echo "2487 - Processing 01.1008 low analysis started at $(timestamp)"
php panini.php 01.1008 low
echo "2488 - Processing 01.1008 laN analysis started at $(timestamp)"
php panini.php 01.1008 laN
echo "2489 - Processing 01.1008 viDiliN analysis started at $(timestamp)"
php panini.php 01.1008 viDiliN
echo "2490 - Processing 01.1006 liw analysis started at $(timestamp)"
php panini.php 01.1006 liw
echo "2491 - Processing 01.1010 law analysis started at $(timestamp)"
php panini.php 01.1010 law
echo "2492 - Processing 01.1010 liw analysis started at $(timestamp)"
php panini.php 01.1010 liw
echo "2493 - Processing 01.1010 luw analysis started at $(timestamp)"
php panini.php 01.1010 luw
echo "2494 - Processing 01.1010 lfw analysis started at $(timestamp)"
php panini.php 01.1010 lfw
echo "2495 - Processing 01.1010 low analysis started at $(timestamp)"
php panini.php 01.1010 low
echo "2496 - Processing 01.1010 laN analysis started at $(timestamp)"
php panini.php 01.1010 laN
echo "2497 - Processing 01.1010 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1010 ASIrliN
echo "2498 - Processing 01.1010 viDiliN analysis started at $(timestamp)"
php panini.php 01.1010 viDiliN
echo "2499 - Processing 01.1010 luN analysis started at $(timestamp)"
php panini.php 01.1010 luN
echo "2500 - Processing 01.1010 lfN analysis started at $(timestamp)"
php panini.php 01.1010 lfN
echo "2501 - Processing 06.0165 laN analysis started at $(timestamp)"
php panini.php 06.0165 laN
echo "2502 - Processing 06.0165 viDiliN analysis started at $(timestamp)"
php panini.php 06.0165 viDiliN
echo "2503 - Processing 06.0165 luN analysis started at $(timestamp)"
php panini.php 06.0165 luN
echo "2504 - Processing 01.0824 liw analysis started at $(timestamp)"
php panini.php 01.0824 liw
echo "2505 - Processing 10.0466 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0466 ASIrliN
echo "2506 - Processing 10.0032 luN analysis started at $(timestamp)"
php panini.php 10.0032 luN
echo "2507 - Processing 04.0004 low analysis started at $(timestamp)"
php panini.php 04.0004 low
echo "2508 - Processing 04.0004 viDiliN analysis started at $(timestamp)"
php panini.php 04.0004 viDiliN
echo "2509 - Processing 09.0361 luw analysis started at $(timestamp)"
php panini.php 09.0361 luw
echo "2510 - Processing 09.0361 lfw analysis started at $(timestamp)"
php panini.php 09.0361 lfw
echo "2511 - Processing 09.0361 luN analysis started at $(timestamp)"
php panini.php 09.0361 luN
echo "2512 - Processing 09.0361 lfN analysis started at $(timestamp)"
php panini.php 09.0361 lfN
echo "2513 - Processing 01.0166 law analysis started at $(timestamp)"
php panini.php 01.0166 law
echo "2514 - Processing 01.0166 liw analysis started at $(timestamp)"
php panini.php 01.0166 liw
echo "2515 - Processing 01.0166 luw analysis started at $(timestamp)"
php panini.php 01.0166 luw
echo "2516 - Processing 01.0166 lfw analysis started at $(timestamp)"
php panini.php 01.0166 lfw
echo "2517 - Processing 01.0166 low analysis started at $(timestamp)"
php panini.php 01.0166 low
echo "2518 - Processing 01.0166 laN analysis started at $(timestamp)"
php panini.php 01.0166 laN
echo "2519 - Processing 01.0166 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0166 ASIrliN
echo "2520 - Processing 01.0166 viDiliN analysis started at $(timestamp)"
php panini.php 01.0166 viDiliN
echo "2521 - Processing 01.0166 luN analysis started at $(timestamp)"
php panini.php 01.0166 luN
echo "2522 - Processing 01.0166 lfN analysis started at $(timestamp)"
php panini.php 01.0166 lfN
echo "2523 - Processing 01.0196 law analysis started at $(timestamp)"
php panini.php 01.0196 law
echo "2524 - Processing 01.0196 liw analysis started at $(timestamp)"
php panini.php 01.0196 liw
echo "2525 - Processing 01.0196 luw analysis started at $(timestamp)"
php panini.php 01.0196 luw
echo "2526 - Processing 01.0196 lfw analysis started at $(timestamp)"
php panini.php 01.0196 lfw
echo "2527 - Processing 01.0196 low analysis started at $(timestamp)"
php panini.php 01.0196 low
echo "2528 - Processing 01.0196 laN analysis started at $(timestamp)"
php panini.php 01.0196 laN
echo "2529 - Processing 01.0196 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0196 ASIrliN
echo "2530 - Processing 01.0196 viDiliN analysis started at $(timestamp)"
php panini.php 01.0196 viDiliN
echo "2531 - Processing 01.0196 luN analysis started at $(timestamp)"
php panini.php 01.0196 luN
echo "2532 - Processing 01.0196 lfN analysis started at $(timestamp)"
php panini.php 01.0196 lfN
echo "2533 - Processing 01.0366 liw analysis started at $(timestamp)"
php panini.php 01.0366 liw
echo "2534 - Processing 01.0364 law analysis started at $(timestamp)"
php panini.php 01.0364 law
echo "2535 - Processing 01.0364 liw analysis started at $(timestamp)"
php panini.php 01.0364 liw
echo "2536 - Processing 01.0364 luw analysis started at $(timestamp)"
php panini.php 01.0364 luw
echo "2537 - Processing 01.0364 lfw analysis started at $(timestamp)"
php panini.php 01.0364 lfw
echo "2538 - Processing 01.0364 low analysis started at $(timestamp)"
php panini.php 01.0364 low
echo "2539 - Processing 01.0364 laN analysis started at $(timestamp)"
php panini.php 01.0364 laN
echo "2540 - Processing 01.0364 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0364 ASIrliN
echo "2541 - Processing 01.0364 viDiliN analysis started at $(timestamp)"
php panini.php 01.0364 viDiliN
echo "2542 - Processing 01.0364 luN analysis started at $(timestamp)"
php panini.php 01.0364 luN
echo "2543 - Processing 01.0364 lfN analysis started at $(timestamp)"
php panini.php 01.0364 lfN
echo "2544 - Processing 06.0069 luN analysis started at $(timestamp)"
php panini.php 06.0069 luN
echo "2545 - Processing 01.0240 law analysis started at $(timestamp)"
php panini.php 01.0240 law
echo "2546 - Processing 01.0240 liw analysis started at $(timestamp)"
php panini.php 01.0240 liw
echo "2547 - Processing 01.0240 luw analysis started at $(timestamp)"
php panini.php 01.0240 luw
echo "2548 - Processing 01.0240 lfw analysis started at $(timestamp)"
php panini.php 01.0240 lfw
echo "2549 - Processing 01.0240 low analysis started at $(timestamp)"
php panini.php 01.0240 low
echo "2550 - Processing 01.0240 laN analysis started at $(timestamp)"
php panini.php 01.0240 laN
echo "2551 - Processing 01.0240 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0240 ASIrliN
echo "2552 - Processing 01.0240 viDiliN analysis started at $(timestamp)"
php panini.php 01.0240 viDiliN
echo "2553 - Processing 01.0240 luN analysis started at $(timestamp)"
php panini.php 01.0240 luN
echo "2554 - Processing 01.0240 lfN analysis started at $(timestamp)"
php panini.php 01.0240 lfN
echo "2555 - Processing 01.0656 liw analysis started at $(timestamp)"
php panini.php 01.0656 liw
echo "2556 - Processing 10.0126 luw analysis started at $(timestamp)"
php panini.php 10.0126 luw
echo "2557 - Processing 10.0126 lfw analysis started at $(timestamp)"
php panini.php 10.0126 lfw
echo "2558 - Processing 10.0126 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0126 ASIrliN
echo "2559 - Processing 10.0126 viDiliN analysis started at $(timestamp)"
php panini.php 10.0126 viDiliN
echo "2560 - Processing 10.0126 luN analysis started at $(timestamp)"
php panini.php 10.0126 luN
echo "2561 - Processing 10.0126 lfN analysis started at $(timestamp)"
php panini.php 10.0126 lfN
echo "2562 - Processing 04.0095 law analysis started at $(timestamp)"
php panini.php 04.0095 law
echo "2563 - Processing 04.0095 liw analysis started at $(timestamp)"
php panini.php 04.0095 liw
echo "2564 - Processing 04.0095 luw analysis started at $(timestamp)"
php panini.php 04.0095 luw
echo "2565 - Processing 04.0095 lfw analysis started at $(timestamp)"
php panini.php 04.0095 lfw
echo "2566 - Processing 04.0095 low analysis started at $(timestamp)"
php panini.php 04.0095 low
echo "2567 - Processing 04.0095 laN analysis started at $(timestamp)"
php panini.php 04.0095 laN
echo "2568 - Processing 04.0095 viDiliN analysis started at $(timestamp)"
php panini.php 04.0095 viDiliN
echo "2569 - Processing 09.0015 law analysis started at $(timestamp)"
php panini.php 09.0015 law
echo "2570 - Processing 09.0015 liw analysis started at $(timestamp)"
php panini.php 09.0015 liw
echo "2571 - Processing 09.0015 low analysis started at $(timestamp)"
php panini.php 09.0015 low
echo "2572 - Processing 09.0015 laN analysis started at $(timestamp)"
php panini.php 09.0015 laN
echo "2573 - Processing 09.0015 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0015 ASIrliN
echo "2574 - Processing 09.0015 viDiliN analysis started at $(timestamp)"
php panini.php 09.0015 viDiliN
echo "2575 - Processing 09.0015 luN analysis started at $(timestamp)"
php panini.php 09.0015 luN
echo "2576 - Processing 01.1122 luN analysis started at $(timestamp)"
php panini.php 01.1122 luN
echo "2577 - Processing 10.0451 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0451 ASIrliN
echo "2578 - Processing 10.0442 law analysis started at $(timestamp)"
php panini.php 10.0442 law
echo "2579 - Processing 10.0442 liw analysis started at $(timestamp)"
php panini.php 10.0442 liw
echo "2580 - Processing 10.0442 luw analysis started at $(timestamp)"
php panini.php 10.0442 luw
echo "2581 - Processing 10.0442 lfw analysis started at $(timestamp)"
php panini.php 10.0442 lfw
echo "2582 - Processing 10.0442 low analysis started at $(timestamp)"
php panini.php 10.0442 low
echo "2583 - Processing 10.0442 laN analysis started at $(timestamp)"
php panini.php 10.0442 laN
echo "2584 - Processing 10.0442 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0442 ASIrliN
echo "2585 - Processing 10.0442 viDiliN analysis started at $(timestamp)"
php panini.php 10.0442 viDiliN
echo "2586 - Processing 10.0442 lfN analysis started at $(timestamp)"
php panini.php 10.0442 lfN
echo "2587 - Processing 02.0386 law analysis started at $(timestamp)"
php panini.php 02.0386 law
echo "2588 - Processing 02.0386 liw analysis started at $(timestamp)"
php panini.php 02.0386 liw
echo "2589 - Processing 02.0386 laN analysis started at $(timestamp)"
php panini.php 02.0386 laN
echo "2590 - Processing 09.0052 law analysis started at $(timestamp)"
php panini.php 09.0052 law
echo "2591 - Processing 09.0052 low analysis started at $(timestamp)"
php panini.php 09.0052 low
echo "2592 - Processing 09.0052 laN analysis started at $(timestamp)"
php panini.php 09.0052 laN
echo "2593 - Processing 09.0052 viDiliN analysis started at $(timestamp)"
php panini.php 09.0052 viDiliN
echo "2594 - Processing 06.0053 liw analysis started at $(timestamp)"
php panini.php 06.0053 liw
echo "2595 - Processing 06.0053 luw analysis started at $(timestamp)"
php panini.php 06.0053 luw
echo "2596 - Processing 06.0053 lfw analysis started at $(timestamp)"
php panini.php 06.0053 lfw
echo "2597 - Processing 06.0053 lfN analysis started at $(timestamp)"
php panini.php 06.0053 lfN
echo "2598 - Processing 10.0165 law analysis started at $(timestamp)"
php panini.php 10.0165 law
echo "2599 - Processing 10.0165 liw analysis started at $(timestamp)"
php panini.php 10.0165 liw
echo "2600 - Processing 10.0165 luw analysis started at $(timestamp)"
php panini.php 10.0165 luw
echo "2601 - Processing 10.0165 lfw analysis started at $(timestamp)"
php panini.php 10.0165 lfw
echo "2602 - Processing 10.0165 low analysis started at $(timestamp)"
php panini.php 10.0165 low
echo "2603 - Processing 10.0165 laN analysis started at $(timestamp)"
php panini.php 10.0165 laN
echo "2604 - Processing 10.0165 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0165 ASIrliN
echo "2605 - Processing 10.0165 viDiliN analysis started at $(timestamp)"
php panini.php 10.0165 viDiliN
echo "2606 - Processing 10.0165 luN analysis started at $(timestamp)"
php panini.php 10.0165 luN
echo "2607 - Processing 10.0165 lfN analysis started at $(timestamp)"
php panini.php 10.0165 lfN
echo "2608 - Processing 09.0051 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0051 ASIrliN
echo "2609 - Processing 06.0161 lfN analysis started at $(timestamp)"
php panini.php 06.0161 lfN
echo "2610 - Processing 04.0387 luN analysis started at $(timestamp)"
php panini.php 04.0387 luN
echo "2611 - Processing 09.0025 liw analysis started at $(timestamp)"
php panini.php 09.0025 liw
echo "2612 - Processing 09.0025 low analysis started at $(timestamp)"
php panini.php 09.0025 low
echo "2613 - Processing 01.1009 law analysis started at $(timestamp)"
php panini.php 01.1009 law
echo "2614 - Processing 01.1009 liw analysis started at $(timestamp)"
php panini.php 01.1009 liw
echo "2615 - Processing 01.1009 luw analysis started at $(timestamp)"
php panini.php 01.1009 luw
echo "2616 - Processing 01.1009 lfw analysis started at $(timestamp)"
php panini.php 01.1009 lfw
echo "2617 - Processing 01.1009 low analysis started at $(timestamp)"
php panini.php 01.1009 low
echo "2618 - Processing 01.1009 laN analysis started at $(timestamp)"
php panini.php 01.1009 laN
echo "2619 - Processing 01.1009 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1009 ASIrliN
echo "2620 - Processing 01.1009 viDiliN analysis started at $(timestamp)"
php panini.php 01.1009 viDiliN
echo "2621 - Processing 01.1011 law analysis started at $(timestamp)"
php panini.php 01.1011 law
echo "2622 - Processing 01.1011 liw analysis started at $(timestamp)"
php panini.php 01.1011 liw
echo "2623 - Processing 01.1011 luw analysis started at $(timestamp)"
php panini.php 01.1011 luw
echo "2624 - Processing 01.1011 lfw analysis started at $(timestamp)"
php panini.php 01.1011 lfw
echo "2625 - Processing 01.1011 low analysis started at $(timestamp)"
php panini.php 01.1011 low
echo "2626 - Processing 01.1011 laN analysis started at $(timestamp)"
php panini.php 01.1011 laN
echo "2627 - Processing 01.1011 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1011 ASIrliN
echo "2628 - Processing 01.1011 viDiliN analysis started at $(timestamp)"
php panini.php 01.1011 viDiliN
echo "2629 - Processing 01.1011 luN analysis started at $(timestamp)"
php panini.php 01.1011 luN
echo "2630 - Processing 01.1011 lfN analysis started at $(timestamp)"
php panini.php 01.1011 lfN
echo "2631 - Processing 01.0429 laN analysis started at $(timestamp)"
php panini.php 01.0429 laN
echo "2632 - Processing 10.0256 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0256 ASIrliN
echo "2633 - Processing 01.1078 lfN analysis started at $(timestamp)"
php panini.php 01.1078 lfN
echo "2634 - Processing 10.0168 law analysis started at $(timestamp)"
php panini.php 10.0168 law
echo "2635 - Processing 10.0168 liw analysis started at $(timestamp)"
php panini.php 10.0168 liw
echo "2636 - Processing 10.0168 luw analysis started at $(timestamp)"
php panini.php 10.0168 luw
echo "2637 - Processing 10.0168 lfw analysis started at $(timestamp)"
php panini.php 10.0168 lfw
echo "2638 - Processing 10.0168 low analysis started at $(timestamp)"
php panini.php 10.0168 low
echo "2639 - Processing 10.0168 laN analysis started at $(timestamp)"
php panini.php 10.0168 laN
echo "2640 - Processing 10.0168 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0168 ASIrliN
echo "2641 - Processing 10.0168 viDiliN analysis started at $(timestamp)"
php panini.php 10.0168 viDiliN
echo "2642 - Processing 10.0168 luN analysis started at $(timestamp)"
php panini.php 10.0168 luN
echo "2643 - Processing 10.0168 lfN analysis started at $(timestamp)"
php panini.php 10.0168 lfN
echo "2644 - Processing 10.0171 law analysis started at $(timestamp)"
php panini.php 10.0171 law
echo "2645 - Processing 10.0171 liw analysis started at $(timestamp)"
php panini.php 10.0171 liw
echo "2646 - Processing 10.0171 luw analysis started at $(timestamp)"
php panini.php 10.0171 luw
echo "2647 - Processing 10.0171 lfw analysis started at $(timestamp)"
php panini.php 10.0171 lfw
echo "2648 - Processing 10.0171 low analysis started at $(timestamp)"
php panini.php 10.0171 low
echo "2649 - Processing 10.0171 laN analysis started at $(timestamp)"
php panini.php 10.0171 laN
echo "2650 - Processing 10.0171 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0171 ASIrliN
echo "2651 - Processing 10.0171 viDiliN analysis started at $(timestamp)"
php panini.php 10.0171 viDiliN
echo "2652 - Processing 10.0171 luN analysis started at $(timestamp)"
php panini.php 10.0171 luN
echo "2653 - Processing 10.0171 lfN analysis started at $(timestamp)"
php panini.php 10.0171 lfN
echo "2654 - Processing 10.0169 law analysis started at $(timestamp)"
php panini.php 10.0169 law
echo "2655 - Processing 10.0169 liw analysis started at $(timestamp)"
php panini.php 10.0169 liw
echo "2656 - Processing 10.0169 luw analysis started at $(timestamp)"
php panini.php 10.0169 luw
echo "2657 - Processing 10.0169 lfw analysis started at $(timestamp)"
php panini.php 10.0169 lfw
echo "2658 - Processing 10.0169 low analysis started at $(timestamp)"
php panini.php 10.0169 low
echo "2659 - Processing 10.0169 laN analysis started at $(timestamp)"
php panini.php 10.0169 laN
echo "2660 - Processing 10.0169 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0169 ASIrliN
echo "2661 - Processing 10.0169 viDiliN analysis started at $(timestamp)"
php panini.php 10.0169 viDiliN
echo "2662 - Processing 10.0169 luN analysis started at $(timestamp)"
php panini.php 10.0169 luN
echo "2663 - Processing 10.0169 lfN analysis started at $(timestamp)"
php panini.php 10.0169 lfN
echo "2664 - Processing 01.0222 law analysis started at $(timestamp)"
php panini.php 01.0222 law
echo "2665 - Processing 01.0220 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0220 ASIrliN
echo "2666 - Processing 01.0327 law analysis started at $(timestamp)"
php panini.php 01.0327 law
echo "2667 - Processing 01.0327 liw analysis started at $(timestamp)"
php panini.php 01.0327 liw
echo "2668 - Processing 01.0327 luw analysis started at $(timestamp)"
php panini.php 01.0327 luw
echo "2669 - Processing 01.0327 lfw analysis started at $(timestamp)"
php panini.php 01.0327 lfw
echo "2670 - Processing 01.0327 low analysis started at $(timestamp)"
php panini.php 01.0327 low
echo "2671 - Processing 01.0327 laN analysis started at $(timestamp)"
php panini.php 01.0327 laN
echo "2672 - Processing 01.0327 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0327 ASIrliN
echo "2673 - Processing 01.0327 viDiliN analysis started at $(timestamp)"
php panini.php 01.0327 viDiliN
echo "2674 - Processing 01.0327 luN analysis started at $(timestamp)"
php panini.php 01.0327 luN
echo "2675 - Processing 01.0327 lfN analysis started at $(timestamp)"
php panini.php 01.0327 lfN
echo "2676 - Processing 01.0223 luN analysis started at $(timestamp)"
php panini.php 01.0223 luN
echo "2677 - Processing 01.0221 lfN analysis started at $(timestamp)"
php panini.php 01.0221 lfN
echo "2678 - Processing 10.0170 liw analysis started at $(timestamp)"
php panini.php 10.0170 liw
echo "2679 - Processing 10.0170 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0170 ASIrliN
echo "2680 - Processing 01.0329 lfN analysis started at $(timestamp)"
php panini.php 01.0329 lfN
echo "2681 - Processing 10.0215 luN analysis started at $(timestamp)"
php panini.php 10.0215 luN
echo "2682 - Processing 01.0030 luN analysis started at $(timestamp)"
php panini.php 01.0030 luN
echo "2683 - Processing 10.0003 luN analysis started at $(timestamp)"
php panini.php 10.0003 luN
echo "2684 - Processing 04.0107 lfN analysis started at $(timestamp)"
php panini.php 04.0107 lfN
echo "2685 - Processing 02.0044 liw analysis started at $(timestamp)"
php panini.php 02.0044 liw
echo "2686 - Processing 01.1001 liw analysis started at $(timestamp)"
php panini.php 01.1001 liw
echo "2687 - Processing 01.0242 liw analysis started at $(timestamp)"
php panini.php 01.0242 liw
echo "2688 - Processing 07.0338 law analysis started at $(timestamp)"
php panini.php 07.0338 law
echo "2689 - Processing 01.0031 luN analysis started at $(timestamp)"
php panini.php 01.0031 luN
echo "2690 - Processing 01.0702 law analysis started at $(timestamp)"
php panini.php 01.0702 law
echo "2691 - Processing 01.0702 liw analysis started at $(timestamp)"
php panini.php 01.0702 liw
echo "2692 - Processing 01.0702 low analysis started at $(timestamp)"
php panini.php 01.0702 low
echo "2693 - Processing 01.0702 laN analysis started at $(timestamp)"
php panini.php 01.0702 laN
echo "2694 - Processing 01.0702 viDiliN analysis started at $(timestamp)"
php panini.php 01.0702 viDiliN
echo "2695 - Processing 01.0702 luN analysis started at $(timestamp)"
php panini.php 01.0702 luN
echo "2696 - Processing 01.0326 lfN analysis started at $(timestamp)"
php panini.php 01.0326 lfN
echo "2697 - Processing 10.0265 low analysis started at $(timestamp)"
php panini.php 10.0265 low
echo "2698 - Processing 10.0264 luN analysis started at $(timestamp)"
php panini.php 10.0264 luN
echo "2699 - Processing 10.0397 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0397 ASIrliN
echo "2700 - Processing 01.0153 law analysis started at $(timestamp)"
php panini.php 01.0153 law
echo "2701 - Processing 01.0153 liw analysis started at $(timestamp)"
php panini.php 01.0153 liw
echo "2702 - Processing 01.0153 luw analysis started at $(timestamp)"
php panini.php 01.0153 luw
echo "2703 - Processing 01.0153 lfw analysis started at $(timestamp)"
php panini.php 01.0153 lfw
echo "2704 - Processing 01.0153 low analysis started at $(timestamp)"
php panini.php 01.0153 low
echo "2705 - Processing 01.0153 laN analysis started at $(timestamp)"
php panini.php 01.0153 laN
echo "2706 - Processing 01.0153 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0153 ASIrliN
echo "2707 - Processing 01.0153 viDiliN analysis started at $(timestamp)"
php panini.php 01.0153 viDiliN
echo "2708 - Processing 01.0153 luN analysis started at $(timestamp)"
php panini.php 01.0153 luN
echo "2709 - Processing 01.0153 lfN analysis started at $(timestamp)"
php panini.php 01.0153 lfN
echo "2710 - Processing 01.0112 law analysis started at $(timestamp)"
php panini.php 01.0112 law
echo "2711 - Processing 01.0112 luN analysis started at $(timestamp)"
php panini.php 01.0112 luN
echo "2712 - Processing 04.0063 law analysis started at $(timestamp)"
php panini.php 04.0063 law
echo "2713 - Processing 04.0063 low analysis started at $(timestamp)"
php panini.php 04.0063 low
echo "2714 - Processing 04.0063 laN analysis started at $(timestamp)"
php panini.php 04.0063 laN
echo "2715 - Processing 04.0063 viDiliN analysis started at $(timestamp)"
php panini.php 04.0063 viDiliN
echo "2716 - Processing 04.0063 lfN analysis started at $(timestamp)"
php panini.php 04.0063 lfN
echo "2717 - Processing 01.1154 law analysis started at $(timestamp)"
php panini.php 01.1154 law
echo "2718 - Processing 01.1154 low analysis started at $(timestamp)"
php panini.php 01.1154 low
echo "2719 - Processing 01.1154 laN analysis started at $(timestamp)"
php panini.php 01.1154 laN
echo "2720 - Processing 01.1154 viDiliN analysis started at $(timestamp)"
php panini.php 01.1154 viDiliN
echo "2721 - Processing 01.1154 lfN analysis started at $(timestamp)"
php panini.php 01.1154 lfN
echo "2722 - Processing 10.0462 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0462 ASIrliN
echo "2723 - Processing 01.0334 lfN analysis started at $(timestamp)"
php panini.php 01.0334 lfN
echo "2724 - Processing 01.0387 lfN analysis started at $(timestamp)"
php panini.php 01.0387 lfN
echo "2725 - Processing 01.0386 lfN analysis started at $(timestamp)"
php panini.php 01.0386 lfN
echo "2726 - Processing 01.0680 lfN analysis started at $(timestamp)"
php panini.php 01.0680 lfN
echo "2727 - Processing 04.0090 liw analysis started at $(timestamp)"
php panini.php 04.0090 liw
echo "2728 - Processing 04.0090 luw analysis started at $(timestamp)"
php panini.php 04.0090 luw
echo "2729 - Processing 01.0467 lfN analysis started at $(timestamp)"
php panini.php 01.0467 lfN
echo "2730 - Processing 01.0479 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0479 ASIrliN
echo "2731 - Processing 01.0479 lfN analysis started at $(timestamp)"
php panini.php 01.0479 lfN
echo "2732 - Processing 01.1129 luw analysis started at $(timestamp)"
php panini.php 01.1129 luw
echo "2733 - Processing 01.1129 lfw analysis started at $(timestamp)"
php panini.php 01.1129 lfw
echo "2734 - Processing 01.1129 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1129 ASIrliN
echo "2735 - Processing 01.1129 lfN analysis started at $(timestamp)"
php panini.php 01.1129 lfN
echo "2736 - Processing 01.0436 luN analysis started at $(timestamp)"
php panini.php 01.0436 luN
echo "2737 - Processing 01.0449 luN analysis started at $(timestamp)"
php panini.php 01.0449 luN
echo "2738 - Processing 01.0554 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0554 ASIrliN
echo "2739 - Processing 01.0554 luN analysis started at $(timestamp)"
php panini.php 01.0554 luN
echo "2740 - Processing 01.0810 liw analysis started at $(timestamp)"
php panini.php 01.0810 liw
echo "2741 - Processing 01.0832 law analysis started at $(timestamp)"
php panini.php 01.0832 law
echo "2742 - Processing 01.0130 law analysis started at $(timestamp)"
php panini.php 01.0130 law
echo "2743 - Processing 01.0130 liw analysis started at $(timestamp)"
php panini.php 01.0130 liw
echo "2744 - Processing 01.0130 luw analysis started at $(timestamp)"
php panini.php 01.0130 luw
echo "2745 - Processing 01.0130 lfw analysis started at $(timestamp)"
php panini.php 01.0130 lfw
echo "2746 - Processing 01.0130 low analysis started at $(timestamp)"
php panini.php 01.0130 low
echo "2747 - Processing 01.0130 laN analysis started at $(timestamp)"
php panini.php 01.0130 laN
echo "2748 - Processing 01.0130 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0130 ASIrliN
echo "2749 - Processing 01.0130 viDiliN analysis started at $(timestamp)"
php panini.php 01.0130 viDiliN
echo "2750 - Processing 01.0130 lfN analysis started at $(timestamp)"
php panini.php 01.0130 lfN
echo "2751 - Processing 01.0118 luN analysis started at $(timestamp)"
php panini.php 01.0118 luN
echo "2752 - Processing 01.0956 luN analysis started at $(timestamp)"
php panini.php 01.0956 luN
echo "2753 - Processing 01.0713 law analysis started at $(timestamp)"
php panini.php 01.0713 law
echo "2754 - Processing 01.0713 liw analysis started at $(timestamp)"
php panini.php 01.0713 liw
echo "2755 - Processing 01.0713 low analysis started at $(timestamp)"
php panini.php 01.0713 low
echo "2756 - Processing 01.0713 laN analysis started at $(timestamp)"
php panini.php 01.0713 laN
echo "2757 - Processing 01.0713 viDiliN analysis started at $(timestamp)"
php panini.php 01.0713 viDiliN
echo "2758 - Processing 01.0713 luN analysis started at $(timestamp)"
php panini.php 01.0713 luN
echo "2759 - Processing 05.0032 viDiliN analysis started at $(timestamp)"
php panini.php 05.0032 viDiliN
echo "2760 - Processing 05.0032 luN analysis started at $(timestamp)"
php panini.php 05.0032 luN
echo "2761 - Processing 01.0168 law analysis started at $(timestamp)"
php panini.php 01.0168 law
echo "2762 - Processing 01.0168 liw analysis started at $(timestamp)"
php panini.php 01.0168 liw
echo "2763 - Processing 01.0168 luw analysis started at $(timestamp)"
php panini.php 01.0168 luw
echo "2764 - Processing 01.0168 lfw analysis started at $(timestamp)"
php panini.php 01.0168 lfw
echo "2765 - Processing 01.0168 low analysis started at $(timestamp)"
php panini.php 01.0168 low
echo "2766 - Processing 01.0168 laN analysis started at $(timestamp)"
php panini.php 01.0168 laN
echo "2767 - Processing 01.0168 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0168 ASIrliN
echo "2768 - Processing 01.0168 viDiliN analysis started at $(timestamp)"
php panini.php 01.0168 viDiliN
echo "2769 - Processing 01.0168 luN analysis started at $(timestamp)"
php panini.php 01.0168 luN
echo "2770 - Processing 01.0168 lfN analysis started at $(timestamp)"
php panini.php 01.0168 lfN
echo "2771 - Processing 01.0169 law analysis started at $(timestamp)"
php panini.php 01.0169 law
echo "2772 - Processing 01.0169 liw analysis started at $(timestamp)"
php panini.php 01.0169 liw
echo "2773 - Processing 01.0169 luw analysis started at $(timestamp)"
php panini.php 01.0169 luw
echo "2774 - Processing 01.0169 lfw analysis started at $(timestamp)"
php panini.php 01.0169 lfw
echo "2775 - Processing 01.0169 low analysis started at $(timestamp)"
php panini.php 01.0169 low
echo "2776 - Processing 01.0169 laN analysis started at $(timestamp)"
php panini.php 01.0169 laN
echo "2777 - Processing 01.0169 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0169 ASIrliN
echo "2778 - Processing 01.0169 viDiliN analysis started at $(timestamp)"
php panini.php 01.0169 viDiliN
echo "2779 - Processing 01.0169 luN analysis started at $(timestamp)"
php panini.php 01.0169 luN
echo "2780 - Processing 01.0169 lfN analysis started at $(timestamp)"
php panini.php 01.0169 lfN
echo "2781 - Processing 07.0348 law analysis started at $(timestamp)"
php panini.php 07.0348 law
echo "2782 - Processing 01.0679 lfN analysis started at $(timestamp)"
php panini.php 01.0679 lfN
echo "2783 - Processing 06.0156 viDiliN analysis started at $(timestamp)"
php panini.php 06.0156 viDiliN
echo "2784 - Processing 04.0144 law analysis started at $(timestamp)"
php panini.php 04.0144 law
echo "2785 - Processing 04.0144 low analysis started at $(timestamp)"
php panini.php 04.0144 low
echo "2786 - Processing 04.0144 laN analysis started at $(timestamp)"
php panini.php 04.0144 laN
echo "2787 - Processing 04.0144 viDiliN analysis started at $(timestamp)"
php panini.php 04.0144 viDiliN
echo "2788 - Processing 06.0027 lfN analysis started at $(timestamp)"
php panini.php 06.0027 lfN
echo "2789 - Processing 04.0033 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0033 ASIrliN
echo "2790 - Processing 04.0033 luN analysis started at $(timestamp)"
php panini.php 04.0033 luN
echo "2791 - Processing 01.0319 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0319 ASIrliN
echo "2792 - Processing 01.0319 luN analysis started at $(timestamp)"
php panini.php 01.0319 luN
echo "2793 - Processing 10.1114 liw analysis started at $(timestamp)"
php panini.php 10.1114 liw
echo "2794 - Processing 10.1114 laN analysis started at $(timestamp)"
php panini.php 10.1114 laN
echo "2795 - Processing 10.1114 ASIrliN analysis started at $(timestamp)"
php panini.php 10.1114 ASIrliN
echo "2796 - Processing 10.1114 lfN analysis started at $(timestamp)"
php panini.php 10.1114 lfN
echo "2797 - Processing 06.0335 liw analysis started at $(timestamp)"
php panini.php 06.0335 liw
echo "2798 - Processing 06.0335 luw analysis started at $(timestamp)"
php panini.php 06.0335 luw
echo "2799 - Processing 06.0335 low analysis started at $(timestamp)"
php panini.php 06.0335 low
echo "2800 - Processing 06.0335 laN analysis started at $(timestamp)"
php panini.php 06.0335 laN
echo "2801 - Processing 06.0335 viDiliN analysis started at $(timestamp)"
php panini.php 06.0335 viDiliN
echo "2802 - Processing 10.0152 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0152 ASIrliN
echo "2803 - Processing 10.0152 luN analysis started at $(timestamp)"
php panini.php 10.0152 luN
echo "2804 - Processing 01.0849 law analysis started at $(timestamp)"
php panini.php 01.0849 law
echo "2805 - Processing 01.0849 liw analysis started at $(timestamp)"
php panini.php 01.0849 liw
echo "2806 - Processing 01.0849 low analysis started at $(timestamp)"
php panini.php 01.0849 low
echo "2807 - Processing 01.0849 laN analysis started at $(timestamp)"
php panini.php 01.0849 laN
echo "2808 - Processing 01.0849 viDiliN analysis started at $(timestamp)"
php panini.php 01.0849 viDiliN
echo "2809 - Processing 01.0849 luN analysis started at $(timestamp)"
php panini.php 01.0849 luN
echo "2810 - Processing 01.0371 lfN analysis started at $(timestamp)"
php panini.php 01.0371 lfN
echo "2811 - Processing 01.0400 law analysis started at $(timestamp)"
php panini.php 01.0400 law
echo "2812 - Processing 01.0373 law analysis started at $(timestamp)"
php panini.php 01.0373 law
echo "2813 - Processing 01.0375 law analysis started at $(timestamp)"
php panini.php 01.0375 law
echo "2814 - Processing 01.0375 liw analysis started at $(timestamp)"
php panini.php 01.0375 liw
echo "2815 - Processing 01.0375 luw analysis started at $(timestamp)"
php panini.php 01.0375 luw
echo "2816 - Processing 01.0375 lfw analysis started at $(timestamp)"
php panini.php 01.0375 lfw
echo "2817 - Processing 01.0375 low analysis started at $(timestamp)"
php panini.php 01.0375 low
echo "2818 - Processing 01.0375 laN analysis started at $(timestamp)"
php panini.php 01.0375 laN
echo "2819 - Processing 01.0375 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0375 ASIrliN
echo "2820 - Processing 01.0375 viDiliN analysis started at $(timestamp)"
php panini.php 01.0375 viDiliN
echo "2821 - Processing 01.0375 luN analysis started at $(timestamp)"
php panini.php 01.0375 luN
echo "2822 - Processing 01.0375 lfN analysis started at $(timestamp)"
php panini.php 01.0375 lfN
echo "2823 - Processing 07.0001 laN analysis started at $(timestamp)"
php panini.php 07.0001 laN
echo "2824 - Processing 04.0149 law analysis started at $(timestamp)"
php panini.php 04.0149 law
echo "2825 - Processing 04.0149 liw analysis started at $(timestamp)"
php panini.php 04.0149 liw
echo "2826 - Processing 04.0149 luw analysis started at $(timestamp)"
php panini.php 04.0149 luw
echo "2827 - Processing 04.0149 lfw analysis started at $(timestamp)"
php panini.php 04.0149 lfw
echo "2828 - Processing 04.0149 low analysis started at $(timestamp)"
php panini.php 04.0149 low
echo "2829 - Processing 04.0149 laN analysis started at $(timestamp)"
php panini.php 04.0149 laN
echo "2830 - Processing 04.0149 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0149 ASIrliN
echo "2831 - Processing 04.0149 viDiliN analysis started at $(timestamp)"
php panini.php 04.0149 viDiliN
echo "2832 - Processing 04.0149 luN analysis started at $(timestamp)"
php panini.php 04.0149 luN
echo "2833 - Processing 04.0149 lfN analysis started at $(timestamp)"
php panini.php 04.0149 lfN
echo "2834 - Processing 01.0995 viDiliN analysis started at $(timestamp)"
php panini.php 01.0995 viDiliN
echo "2835 - Processing 01.0772 lfN analysis started at $(timestamp)"
php panini.php 01.0772 lfN
echo "2836 - Processing 01.0085 law analysis started at $(timestamp)"
php panini.php 01.0085 law
echo "2837 - Processing 01.0085 liw analysis started at $(timestamp)"
php panini.php 01.0085 liw
echo "2838 - Processing 01.0085 low analysis started at $(timestamp)"
php panini.php 01.0085 low
echo "2839 - Processing 01.0085 laN analysis started at $(timestamp)"
php panini.php 01.0085 laN
echo "2840 - Processing 01.0085 viDiliN analysis started at $(timestamp)"
php panini.php 01.0085 viDiliN
echo "2841 - Processing 01.0085 luN analysis started at $(timestamp)"
php panini.php 01.0085 luN
echo "2842 - Processing 01.0206 law analysis started at $(timestamp)"
php panini.php 01.0206 law
echo "2843 - Processing 01.0206 liw analysis started at $(timestamp)"
php panini.php 01.0206 liw
echo "2844 - Processing 01.0206 luw analysis started at $(timestamp)"
php panini.php 01.0206 luw
echo "2845 - Processing 01.0206 lfw analysis started at $(timestamp)"
php panini.php 01.0206 lfw
echo "2846 - Processing 01.0206 low analysis started at $(timestamp)"
php panini.php 01.0206 low
echo "2847 - Processing 01.0206 laN analysis started at $(timestamp)"
php panini.php 01.0206 laN
echo "2848 - Processing 01.0206 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0206 ASIrliN
echo "2849 - Processing 01.0206 viDiliN analysis started at $(timestamp)"
php panini.php 01.0206 viDiliN
echo "2850 - Processing 01.0206 luN analysis started at $(timestamp)"
php panini.php 01.0206 luN
echo "2851 - Processing 01.0206 lfN analysis started at $(timestamp)"
php panini.php 01.0206 lfN
echo "2852 - Processing 01.1002 luN analysis started at $(timestamp)"
php panini.php 01.1002 luN
echo "2853 - Processing 01.0430 luN analysis started at $(timestamp)"
php panini.php 01.0430 luN
echo "2854 - Processing 01.0447 luN analysis started at $(timestamp)"
php panini.php 01.0447 luN
echo "2855 - Processing 01.0584 law analysis started at $(timestamp)"
php panini.php 01.0584 law
echo "2856 - Processing 01.0584 liw analysis started at $(timestamp)"
php panini.php 01.0584 liw
echo "2857 - Processing 01.0584 low analysis started at $(timestamp)"
php panini.php 01.0584 low
echo "2858 - Processing 01.0584 laN analysis started at $(timestamp)"
php panini.php 01.0584 laN
echo "2859 - Processing 01.0584 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0584 ASIrliN
echo "2860 - Processing 01.0584 viDiliN analysis started at $(timestamp)"
php panini.php 01.0584 viDiliN
echo "2861 - Processing 01.0584 luN analysis started at $(timestamp)"
php panini.php 01.0584 luN
echo "2862 - Processing 01.0707 luN analysis started at $(timestamp)"
php panini.php 01.0707 luN
echo "2863 - Processing 01.0412 law analysis started at $(timestamp)"
php panini.php 01.0412 law
echo "2864 - Processing 01.0412 liw analysis started at $(timestamp)"
php panini.php 01.0412 liw
echo "2865 - Processing 01.0412 luw analysis started at $(timestamp)"
php panini.php 01.0412 luw
echo "2866 - Processing 01.0412 lfw analysis started at $(timestamp)"
php panini.php 01.0412 lfw
echo "2867 - Processing 01.0412 low analysis started at $(timestamp)"
php panini.php 01.0412 low
echo "2868 - Processing 01.0412 laN analysis started at $(timestamp)"
php panini.php 01.0412 laN
echo "2869 - Processing 01.0412 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0412 ASIrliN
echo "2870 - Processing 01.0412 viDiliN analysis started at $(timestamp)"
php panini.php 01.0412 viDiliN
echo "2871 - Processing 01.0412 luN analysis started at $(timestamp)"
php panini.php 01.0412 luN
echo "2872 - Processing 01.0412 lfN analysis started at $(timestamp)"
php panini.php 01.0412 lfN
echo "2873 - Processing 01.0411 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0411 ASIrliN
echo "2874 - Processing 01.0411 lfN analysis started at $(timestamp)"
php panini.php 01.0411 lfN
echo "2875 - Processing 01.0146 luN analysis started at $(timestamp)"
php panini.php 01.0146 luN
echo "2876 - Processing 01.0154 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0154 ASIrliN
echo "2877 - Processing 01.0113 laN analysis started at $(timestamp)"
php panini.php 01.0113 laN
echo "2878 - Processing 01.0113 viDiliN analysis started at $(timestamp)"
php panini.php 01.0113 viDiliN
echo "2879 - Processing 01.0113 luN analysis started at $(timestamp)"
php panini.php 01.0113 luN
echo "2880 - Processing 01.0182 liw analysis started at $(timestamp)"
php panini.php 01.0182 liw
echo "2881 - Processing 01.0234 liw analysis started at $(timestamp)"
php panini.php 01.0234 liw
echo "2882 - Processing 01.0271 law analysis started at $(timestamp)"
php panini.php 01.0271 law
echo "2883 - Processing 01.0271 liw analysis started at $(timestamp)"
php panini.php 01.0271 liw
echo "2884 - Processing 01.0271 luw analysis started at $(timestamp)"
php panini.php 01.0271 luw
echo "2885 - Processing 01.0271 lfw analysis started at $(timestamp)"
php panini.php 01.0271 lfw
echo "2886 - Processing 01.0271 low analysis started at $(timestamp)"
php panini.php 01.0271 low
echo "2887 - Processing 01.0271 laN analysis started at $(timestamp)"
php panini.php 01.0271 laN
echo "2888 - Processing 01.0271 viDiliN analysis started at $(timestamp)"
php panini.php 01.0271 viDiliN
echo "2889 - Processing 01.0271 luN analysis started at $(timestamp)"
php panini.php 01.0271 luN
echo "2890 - Processing 01.0271 lfN analysis started at $(timestamp)"
php panini.php 01.0271 lfN
echo "2891 - Processing 06.0011 luN analysis started at $(timestamp)"
php panini.php 06.0011 luN
echo "2892 - Processing 01.0335 lfN analysis started at $(timestamp)"
php panini.php 01.0335 lfN
echo "2893 - Processing 01.1130 law analysis started at $(timestamp)"
php panini.php 01.1130 law
echo "2894 - Processing 01.1130 low analysis started at $(timestamp)"
php panini.php 01.1130 low
echo "2895 - Processing 01.1130 laN analysis started at $(timestamp)"
php panini.php 01.1130 laN
echo "2896 - Processing 01.1130 viDiliN analysis started at $(timestamp)"
php panini.php 01.1130 viDiliN
echo "2897 - Processing 01.0439 luN analysis started at $(timestamp)"
php panini.php 01.0439 luN
echo "2898 - Processing 01.0437 luN analysis started at $(timestamp)"
php panini.php 01.0437 luN
echo "2899 - Processing 01.0450 law analysis started at $(timestamp)"
php panini.php 01.0450 law
echo "2900 - Processing 01.0450 liw analysis started at $(timestamp)"
php panini.php 01.0450 liw
echo "2901 - Processing 01.0450 luw analysis started at $(timestamp)"
php panini.php 01.0450 luw
echo "2902 - Processing 01.0450 lfw analysis started at $(timestamp)"
php panini.php 01.0450 lfw
echo "2903 - Processing 01.0450 low analysis started at $(timestamp)"
php panini.php 01.0450 low
echo "2904 - Processing 01.0450 laN analysis started at $(timestamp)"
php panini.php 01.0450 laN
echo "2905 - Processing 01.0450 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0450 ASIrliN
echo "2906 - Processing 01.0450 viDiliN analysis started at $(timestamp)"
php panini.php 01.0450 viDiliN
echo "2907 - Processing 01.0450 luN analysis started at $(timestamp)"
php panini.php 01.0450 luN
echo "2908 - Processing 01.0450 lfN analysis started at $(timestamp)"
php panini.php 01.0450 lfN
echo "2909 - Processing 01.0555 liw analysis started at $(timestamp)"
php panini.php 01.0555 liw
echo "2910 - Processing 01.0555 luw analysis started at $(timestamp)"
php panini.php 01.0555 luw
echo "2911 - Processing 01.0555 lfw analysis started at $(timestamp)"
php panini.php 01.0555 lfw
echo "2912 - Processing 01.0555 laN analysis started at $(timestamp)"
php panini.php 01.0555 laN
echo "2913 - Processing 01.0555 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0555 ASIrliN
echo "2914 - Processing 01.0555 viDiliN analysis started at $(timestamp)"
php panini.php 01.0555 viDiliN
echo "2915 - Processing 01.0555 luN analysis started at $(timestamp)"
php panini.php 01.0555 luN
echo "2916 - Processing 01.0555 lfN analysis started at $(timestamp)"
php panini.php 01.0555 lfN
echo "2917 - Processing 01.0483 lfN analysis started at $(timestamp)"
php panini.php 01.0483 lfN
echo "2918 - Processing 01.0416 law analysis started at $(timestamp)"
php panini.php 01.0416 law
echo "2919 - Processing 01.0416 liw analysis started at $(timestamp)"
php panini.php 01.0416 liw
echo "2920 - Processing 01.0416 luw analysis started at $(timestamp)"
php panini.php 01.0416 luw
echo "2921 - Processing 01.0416 lfw analysis started at $(timestamp)"
php panini.php 01.0416 lfw
echo "2922 - Processing 01.0416 low analysis started at $(timestamp)"
php panini.php 01.0416 low
echo "2923 - Processing 01.0416 laN analysis started at $(timestamp)"
php panini.php 01.0416 laN
echo "2924 - Processing 01.0416 viDiliN analysis started at $(timestamp)"
php panini.php 01.0416 viDiliN
echo "2925 - Processing 01.0416 luN analysis started at $(timestamp)"
php panini.php 01.0416 luN
echo "2926 - Processing 01.0416 lfN analysis started at $(timestamp)"
php panini.php 01.0416 lfN
echo "2927 - Processing 01.0119 luN analysis started at $(timestamp)"
php panini.php 01.0119 luN
echo "2928 - Processing 01.0235 law analysis started at $(timestamp)"
php panini.php 01.0235 law
echo "2929 - Processing 01.0235 liw analysis started at $(timestamp)"
php panini.php 01.0235 liw
echo "2930 - Processing 01.0235 luw analysis started at $(timestamp)"
php panini.php 01.0235 luw
echo "2931 - Processing 01.0235 lfw analysis started at $(timestamp)"
php panini.php 01.0235 lfw
echo "2932 - Processing 01.0235 low analysis started at $(timestamp)"
php panini.php 01.0235 low
echo "2933 - Processing 01.0235 laN analysis started at $(timestamp)"
php panini.php 01.0235 laN
echo "2934 - Processing 01.0235 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0235 ASIrliN
echo "2935 - Processing 01.0235 viDiliN analysis started at $(timestamp)"
php panini.php 01.0235 viDiliN
echo "2936 - Processing 01.0274 law analysis started at $(timestamp)"
php panini.php 01.0274 law
echo "2937 - Processing 01.0274 liw analysis started at $(timestamp)"
php panini.php 01.0274 liw
echo "2938 - Processing 01.0274 luw analysis started at $(timestamp)"
php panini.php 01.0274 luw
echo "2939 - Processing 01.0274 lfw analysis started at $(timestamp)"
php panini.php 01.0274 lfw
echo "2940 - Processing 01.0274 low analysis started at $(timestamp)"
php panini.php 01.0274 low
echo "2941 - Processing 01.0274 laN analysis started at $(timestamp)"
php panini.php 01.0274 laN
echo "2942 - Processing 01.0274 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0274 ASIrliN
echo "2943 - Processing 01.0274 viDiliN analysis started at $(timestamp)"
php panini.php 01.0274 viDiliN
echo "2944 - Processing 01.0274 luN analysis started at $(timestamp)"
php panini.php 01.0274 luN
echo "2945 - Processing 01.0274 lfN analysis started at $(timestamp)"
php panini.php 01.0274 lfN
echo "2946 - Processing 01.0170 law analysis started at $(timestamp)"
php panini.php 01.0170 law
echo "2947 - Processing 01.0170 low analysis started at $(timestamp)"
php panini.php 01.0170 low
echo "2948 - Processing 01.0170 laN analysis started at $(timestamp)"
php panini.php 01.0170 laN
echo "2949 - Processing 01.0170 viDiliN analysis started at $(timestamp)"
php panini.php 01.0170 viDiliN
echo "2950 - Processing 01.0171 law analysis started at $(timestamp)"
php panini.php 01.0171 law
echo "2951 - Processing 01.0171 liw analysis started at $(timestamp)"
php panini.php 01.0171 liw
echo "2952 - Processing 01.0171 luw analysis started at $(timestamp)"
php panini.php 01.0171 luw
echo "2953 - Processing 01.0171 lfw analysis started at $(timestamp)"
php panini.php 01.0171 lfw
echo "2954 - Processing 01.0171 low analysis started at $(timestamp)"
php panini.php 01.0171 low
echo "2955 - Processing 01.0171 laN analysis started at $(timestamp)"
php panini.php 01.0171 laN
echo "2956 - Processing 01.0171 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0171 ASIrliN
echo "2957 - Processing 01.0171 viDiliN analysis started at $(timestamp)"
php panini.php 01.0171 viDiliN
echo "2958 - Processing 01.0171 luN analysis started at $(timestamp)"
php panini.php 01.0171 luN
echo "2959 - Processing 01.0171 lfN analysis started at $(timestamp)"
php panini.php 01.0171 lfN
echo "2960 - Processing 01.0165 liw analysis started at $(timestamp)"
php panini.php 01.0165 liw
echo "2961 - Processing 01.0165 luw analysis started at $(timestamp)"
php panini.php 01.0165 luw
echo "2962 - Processing 01.0165 lfw analysis started at $(timestamp)"
php panini.php 01.0165 lfw
echo "2963 - Processing 01.0165 viDiliN analysis started at $(timestamp)"
php panini.php 01.0165 viDiliN
echo "2964 - Processing 01.0165 luN analysis started at $(timestamp)"
php panini.php 01.0165 luN
echo "2965 - Processing 01.0165 lfN analysis started at $(timestamp)"
php panini.php 01.0165 lfN
echo "2966 - Processing 10.0288 law analysis started at $(timestamp)"
php panini.php 10.0288 law
echo "2967 - Processing 10.0288 liw analysis started at $(timestamp)"
php panini.php 10.0288 liw
echo "2968 - Processing 10.0288 luw analysis started at $(timestamp)"
php panini.php 10.0288 luw
echo "2969 - Processing 10.0288 lfw analysis started at $(timestamp)"
php panini.php 10.0288 lfw
echo "2970 - Processing 10.0288 low analysis started at $(timestamp)"
php panini.php 10.0288 low
echo "2971 - Processing 10.0288 laN analysis started at $(timestamp)"
php panini.php 10.0288 laN
echo "2972 - Processing 10.0288 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0288 ASIrliN
echo "2973 - Processing 10.0288 viDiliN analysis started at $(timestamp)"
php panini.php 10.0288 viDiliN
echo "2974 - Processing 10.0288 luN analysis started at $(timestamp)"
php panini.php 10.0288 luN
echo "2975 - Processing 10.0288 lfN analysis started at $(timestamp)"
php panini.php 10.0288 lfN
echo "2976 - Processing 06.0169 liw analysis started at $(timestamp)"
php panini.php 06.0169 liw
echo "2977 - Processing 06.0169 luN analysis started at $(timestamp)"
php panini.php 06.0169 luN
echo "2978 - Processing 06.0157 law analysis started at $(timestamp)"
php panini.php 06.0157 law
echo "2979 - Processing 06.0157 liw analysis started at $(timestamp)"
php panini.php 06.0157 liw
echo "2980 - Processing 06.0157 luw analysis started at $(timestamp)"
php panini.php 06.0157 luw
echo "2981 - Processing 06.0157 low analysis started at $(timestamp)"
php panini.php 06.0157 low
echo "2982 - Processing 06.0157 laN analysis started at $(timestamp)"
php panini.php 06.0157 laN
echo "2983 - Processing 06.0157 viDiliN analysis started at $(timestamp)"
php panini.php 06.0157 viDiliN
echo "2984 - Processing 09.0343 law analysis started at $(timestamp)"
php panini.php 09.0343 law
echo "2985 - Processing 09.0343 liw analysis started at $(timestamp)"
php panini.php 09.0343 liw
echo "2986 - Processing 09.0343 luw analysis started at $(timestamp)"
php panini.php 09.0343 luw
echo "2987 - Processing 09.0343 lfw analysis started at $(timestamp)"
php panini.php 09.0343 lfw
echo "2988 - Processing 09.0343 low analysis started at $(timestamp)"
php panini.php 09.0343 low
echo "2989 - Processing 09.0343 laN analysis started at $(timestamp)"
php panini.php 09.0343 laN
echo "2990 - Processing 09.0343 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0343 ASIrliN
echo "2991 - Processing 09.0343 viDiliN analysis started at $(timestamp)"
php panini.php 09.0343 viDiliN
echo "2992 - Processing 09.0343 luN analysis started at $(timestamp)"
php panini.php 09.0343 luN
echo "2993 - Processing 09.0343 lfN analysis started at $(timestamp)"
php panini.php 09.0343 lfN
echo "2994 - Processing 01.0214 law analysis started at $(timestamp)"
php panini.php 01.0214 law
echo "2995 - Processing 01.0214 liw analysis started at $(timestamp)"
php panini.php 01.0214 liw
echo "2996 - Processing 01.0214 luw analysis started at $(timestamp)"
php panini.php 01.0214 luw
echo "2997 - Processing 01.0214 lfw analysis started at $(timestamp)"
php panini.php 01.0214 lfw
echo "2998 - Processing 01.0214 low analysis started at $(timestamp)"
php panini.php 01.0214 low
echo "2999 - Processing 01.0214 laN analysis started at $(timestamp)"
php panini.php 01.0214 laN
echo "3000 - Processing 01.0214 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0214 ASIrliN
echo "3001 - Processing 01.0214 viDiliN analysis started at $(timestamp)"
php panini.php 01.0214 viDiliN
echo "3002 - Processing 01.0214 luN analysis started at $(timestamp)"
php panini.php 01.0214 luN
echo "3003 - Processing 01.0214 lfN analysis started at $(timestamp)"
php panini.php 01.0214 lfN
echo "3004 - Processing 01.0351 luN analysis started at $(timestamp)"
php panini.php 01.0351 luN
echo "3005 - Processing 01.0850 luN analysis started at $(timestamp)"
php panini.php 01.0850 luN
echo "3006 - Processing 06.0284 law analysis started at $(timestamp)"
php panini.php 06.0284 law
echo "3007 - Processing 06.0284 lfw analysis started at $(timestamp)"
php panini.php 06.0284 lfw
echo "3008 - Processing 06.0284 low analysis started at $(timestamp)"
php panini.php 06.0284 low
echo "3009 - Processing 06.0284 viDiliN analysis started at $(timestamp)"
php panini.php 06.0284 viDiliN
echo "3010 - Processing 01.0390 luN analysis started at $(timestamp)"
php panini.php 01.0390 luN
echo "3011 - Processing 01.0851 law analysis started at $(timestamp)"
php panini.php 01.0851 law
echo "3012 - Processing 01.0851 liw analysis started at $(timestamp)"
php panini.php 01.0851 liw
echo "3013 - Processing 01.0851 luw analysis started at $(timestamp)"
php panini.php 01.0851 luw
echo "3014 - Processing 01.0851 lfw analysis started at $(timestamp)"
php panini.php 01.0851 lfw
echo "3015 - Processing 01.0851 low analysis started at $(timestamp)"
php panini.php 01.0851 low
echo "3016 - Processing 01.0851 laN analysis started at $(timestamp)"
php panini.php 01.0851 laN
echo "3017 - Processing 01.0851 viDiliN analysis started at $(timestamp)"
php panini.php 01.0851 viDiliN
echo "3018 - Processing 01.0851 luN analysis started at $(timestamp)"
php panini.php 01.0851 luN
echo "3019 - Processing 04.0134 law analysis started at $(timestamp)"
php panini.php 04.0134 law
echo "3020 - Processing 04.0134 liw analysis started at $(timestamp)"
php panini.php 04.0134 liw
echo "3021 - Processing 04.0134 luw analysis started at $(timestamp)"
php panini.php 04.0134 luw
echo "3022 - Processing 04.0134 lfw analysis started at $(timestamp)"
php panini.php 04.0134 lfw
echo "3023 - Processing 04.0134 low analysis started at $(timestamp)"
php panini.php 04.0134 low
echo "3024 - Processing 04.0134 laN analysis started at $(timestamp)"
php panini.php 04.0134 laN
echo "3025 - Processing 04.0134 viDiliN analysis started at $(timestamp)"
php panini.php 04.0134 viDiliN
echo "3026 - Processing 06.0110 law analysis started at $(timestamp)"
php panini.php 06.0110 law
echo "3027 - Processing 06.0110 liw analysis started at $(timestamp)"
php panini.php 06.0110 liw
echo "3028 - Processing 06.0110 luw analysis started at $(timestamp)"
php panini.php 06.0110 luw
echo "3029 - Processing 06.0110 lfw analysis started at $(timestamp)"
php panini.php 06.0110 lfw
echo "3030 - Processing 06.0110 low analysis started at $(timestamp)"
php panini.php 06.0110 low
echo "3031 - Processing 06.0110 viDiliN analysis started at $(timestamp)"
php panini.php 06.0110 viDiliN
echo "3032 - Processing 06.0111 law analysis started at $(timestamp)"
php panini.php 06.0111 law
echo "3033 - Processing 06.0111 low analysis started at $(timestamp)"
php panini.php 06.0111 low
echo "3034 - Processing 06.0111 laN analysis started at $(timestamp)"
php panini.php 06.0111 laN
echo "3035 - Processing 06.0111 viDiliN analysis started at $(timestamp)"
php panini.php 06.0111 viDiliN
echo "3036 - Processing 01.0372 law analysis started at $(timestamp)"
php panini.php 01.0372 law
echo "3037 - Processing 01.0372 liw analysis started at $(timestamp)"
php panini.php 01.0372 liw
echo "3038 - Processing 01.0372 luw analysis started at $(timestamp)"
php panini.php 01.0372 luw
echo "3039 - Processing 01.0372 lfw analysis started at $(timestamp)"
php panini.php 01.0372 lfw
echo "3040 - Processing 01.0372 low analysis started at $(timestamp)"
php panini.php 01.0372 low
echo "3041 - Processing 01.0372 laN analysis started at $(timestamp)"
php panini.php 01.0372 laN
echo "3042 - Processing 01.0372 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0372 ASIrliN
echo "3043 - Processing 01.0372 viDiliN analysis started at $(timestamp)"
php panini.php 01.0372 viDiliN
echo "3044 - Processing 01.0372 luN analysis started at $(timestamp)"
php panini.php 01.0372 luN
echo "3045 - Processing 01.0372 lfN analysis started at $(timestamp)"
php panini.php 01.0372 lfN
echo "3046 - Processing 01.0376 law analysis started at $(timestamp)"
php panini.php 01.0376 law
echo "3047 - Processing 01.0376 liw analysis started at $(timestamp)"
php panini.php 01.0376 liw
echo "3048 - Processing 01.0376 luw analysis started at $(timestamp)"
php panini.php 01.0376 luw
echo "3049 - Processing 01.0376 lfw analysis started at $(timestamp)"
php panini.php 01.0376 lfw
echo "3050 - Processing 01.0376 low analysis started at $(timestamp)"
php panini.php 01.0376 low
echo "3051 - Processing 01.0376 laN analysis started at $(timestamp)"
php panini.php 01.0376 laN
echo "3052 - Processing 01.0376 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0376 ASIrliN
echo "3053 - Processing 01.0376 viDiliN analysis started at $(timestamp)"
php panini.php 01.0376 viDiliN
echo "3054 - Processing 01.0376 luN analysis started at $(timestamp)"
php panini.php 01.0376 luN
echo "3055 - Processing 01.0376 lfN analysis started at $(timestamp)"
php panini.php 01.0376 lfN
echo "3056 - Processing 04.0150 law analysis started at $(timestamp)"
php panini.php 04.0150 law
echo "3057 - Processing 04.0150 luw analysis started at $(timestamp)"
php panini.php 04.0150 luw
echo "3058 - Processing 04.0150 lfw analysis started at $(timestamp)"
php panini.php 04.0150 lfw
echo "3059 - Processing 04.0150 low analysis started at $(timestamp)"
php panini.php 04.0150 low
echo "3060 - Processing 04.0150 laN analysis started at $(timestamp)"
php panini.php 04.0150 laN
echo "3061 - Processing 04.0150 viDiliN analysis started at $(timestamp)"
php panini.php 04.0150 viDiliN
echo "3062 - Processing 04.0150 lfN analysis started at $(timestamp)"
php panini.php 04.0150 lfN
echo "3063 - Processing 10.0100 luN analysis started at $(timestamp)"
php panini.php 10.0100 luN
echo "3064 - Processing 01.0431 luN analysis started at $(timestamp)"
php panini.php 01.0431 luN
echo "3065 - Processing 01.0080 luN analysis started at $(timestamp)"
php panini.php 01.0080 luN
echo "3066 - Processing 01.0188 luN analysis started at $(timestamp)"
php panini.php 01.0188 luN
echo "3067 - Processing 01.0291 luN analysis started at $(timestamp)"
php panini.php 01.0291 luN
echo "3068 - Processing 01.0138 lfN analysis started at $(timestamp)"
php panini.php 01.0138 lfN
echo "3069 - Processing 01.0093 liw analysis started at $(timestamp)"
php panini.php 01.0093 liw
echo "3070 - Processing 01.0093 luN analysis started at $(timestamp)"
php panini.php 01.0093 luN
echo "3071 - Processing 01.0100 liw analysis started at $(timestamp)"
php panini.php 01.0100 liw
echo "3072 - Processing 01.0100 luN analysis started at $(timestamp)"
php panini.php 01.0100 luN
echo "3073 - Processing 01.0139 luN analysis started at $(timestamp)"
php panini.php 01.0139 luN
echo "3074 - Processing 01.0156 lfN analysis started at $(timestamp)"
php panini.php 01.0156 lfN
echo "3075 - Processing 01.0116 law analysis started at $(timestamp)"
php panini.php 01.0116 law
echo "3076 - Processing 01.0116 liw analysis started at $(timestamp)"
php panini.php 01.0116 liw
echo "3077 - Processing 01.0116 low analysis started at $(timestamp)"
php panini.php 01.0116 low
echo "3078 - Processing 01.0116 laN analysis started at $(timestamp)"
php panini.php 01.0116 laN
echo "3079 - Processing 01.0116 viDiliN analysis started at $(timestamp)"
php panini.php 01.0116 viDiliN
echo "3080 - Processing 01.0116 luN analysis started at $(timestamp)"
php panini.php 01.0116 luN
echo "3081 - Processing 10.0058 luN analysis started at $(timestamp)"
php panini.php 10.0058 luN
echo "3082 - Processing 01.0285 luN analysis started at $(timestamp)"
php panini.php 01.0285 luN
echo "3083 - Processing 10.0227 luN analysis started at $(timestamp)"
php panini.php 10.0227 luN
echo "3084 - Processing 01.0888 law analysis started at $(timestamp)"
php panini.php 01.0888 law
echo "3085 - Processing 01.0888 liw analysis started at $(timestamp)"
php panini.php 01.0888 liw
echo "3086 - Processing 01.0888 luw analysis started at $(timestamp)"
php panini.php 01.0888 luw
echo "3087 - Processing 01.0888 lfw analysis started at $(timestamp)"
php panini.php 01.0888 lfw
echo "3088 - Processing 01.0888 low analysis started at $(timestamp)"
php panini.php 01.0888 low
echo "3089 - Processing 01.0888 laN analysis started at $(timestamp)"
php panini.php 01.0888 laN
echo "3090 - Processing 01.0888 viDiliN analysis started at $(timestamp)"
php panini.php 01.0888 viDiliN
echo "3091 - Processing 01.0888 luN analysis started at $(timestamp)"
php panini.php 01.0888 luN
echo "3092 - Processing 01.0888 lfN analysis started at $(timestamp)"
php panini.php 01.0888 lfN
echo "3093 - Processing 01.0337 law analysis started at $(timestamp)"
php panini.php 01.0337 law
echo "3094 - Processing 01.0337 liw analysis started at $(timestamp)"
php panini.php 01.0337 liw
echo "3095 - Processing 01.0337 luw analysis started at $(timestamp)"
php panini.php 01.0337 luw
echo "3096 - Processing 01.0337 lfw analysis started at $(timestamp)"
php panini.php 01.0337 lfw
echo "3097 - Processing 01.0337 low analysis started at $(timestamp)"
php panini.php 01.0337 low
echo "3098 - Processing 01.0337 laN analysis started at $(timestamp)"
php panini.php 01.0337 laN
echo "3099 - Processing 01.0337 viDiliN analysis started at $(timestamp)"
php panini.php 01.0337 viDiliN
echo "3100 - Processing 01.0337 luN analysis started at $(timestamp)"
php panini.php 01.0337 luN
echo "3101 - Processing 01.0337 lfN analysis started at $(timestamp)"
php panini.php 01.0337 lfN
echo "3102 - Processing 01.0382 law analysis started at $(timestamp)"
php panini.php 01.0382 law
echo "3103 - Processing 01.0382 liw analysis started at $(timestamp)"
php panini.php 01.0382 liw
echo "3104 - Processing 01.0382 luw analysis started at $(timestamp)"
php panini.php 01.0382 luw
echo "3105 - Processing 01.0382 lfw analysis started at $(timestamp)"
php panini.php 01.0382 lfw
echo "3106 - Processing 01.0382 low analysis started at $(timestamp)"
php panini.php 01.0382 low
echo "3107 - Processing 01.0382 laN analysis started at $(timestamp)"
php panini.php 01.0382 laN
echo "3108 - Processing 01.0382 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0382 ASIrliN
echo "3109 - Processing 01.0382 viDiliN analysis started at $(timestamp)"
php panini.php 01.0382 viDiliN
echo "3110 - Processing 01.0382 luN analysis started at $(timestamp)"
php panini.php 01.0382 luN
echo "3111 - Processing 01.0382 lfN analysis started at $(timestamp)"
php panini.php 01.0382 lfN
echo "3112 - Processing 01.0514 viDiliN analysis started at $(timestamp)"
php panini.php 01.0514 viDiliN
echo "3113 - Processing 01.0304 luN analysis started at $(timestamp)"
php panini.php 01.0304 luN
echo "3114 - Processing 10.0379 luN analysis started at $(timestamp)"
php panini.php 10.0379 luN
echo "3115 - Processing 01.1164 luN analysis started at $(timestamp)"
php panini.php 01.1164 luN
echo "3116 - Processing 01.0011 luN analysis started at $(timestamp)"
php panini.php 01.0011 luN
echo "3117 - Processing 01.1158 laN analysis started at $(timestamp)"
php panini.php 01.1158 laN
echo "3118 - Processing 01.1158 viDiliN analysis started at $(timestamp)"
php panini.php 01.1158 viDiliN
echo "3119 - Processing 01.0547 liw analysis started at $(timestamp)"
php panini.php 01.0547 liw
echo "3120 - Processing 01.0186 luN analysis started at $(timestamp)"
php panini.php 01.0186 luN
echo "3121 - Processing 01.0697 luN analysis started at $(timestamp)"
php panini.php 01.0697 luN
echo "3122 - Processing 01.0564 liw analysis started at $(timestamp)"
php panini.php 01.0564 liw
echo "3123 - Processing 01.0564 luw analysis started at $(timestamp)"
php panini.php 01.0564 luw
echo "3124 - Processing 01.0564 lfw analysis started at $(timestamp)"
php panini.php 01.0564 lfw
echo "3125 - Processing 01.0564 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0564 ASIrliN
echo "3126 - Processing 01.0564 luN analysis started at $(timestamp)"
php panini.php 01.0564 luN
echo "3127 - Processing 01.0564 lfN analysis started at $(timestamp)"
php panini.php 01.0564 lfN
echo "3128 - Processing 01.0456 low analysis started at $(timestamp)"
php panini.php 01.0456 low
echo "3129 - Processing 01.0456 luN analysis started at $(timestamp)"
php panini.php 01.0456 luN
echo "3130 - Processing 02.0075 law analysis started at $(timestamp)"
php panini.php 02.0075 law
echo "3131 - Processing 02.0075 low analysis started at $(timestamp)"
php panini.php 02.0075 low
echo "3132 - Processing 01.0106 luN analysis started at $(timestamp)"
php panini.php 01.0106 luN
echo "3133 - Processing 10.0488 liw analysis started at $(timestamp)"
php panini.php 10.0488 liw
echo "3134 - Processing 10.0488 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0488 ASIrliN
echo "3135 - Processing 10.0488 luN analysis started at $(timestamp)"
php panini.php 10.0488 luN
echo "3136 - Processing 02.0111 liw analysis started at $(timestamp)"
php panini.php 02.0111 liw
echo "3137 - Processing 02.0111 luN analysis started at $(timestamp)"
php panini.php 02.0111 luN
echo "3138 - Processing 01.1160 liw analysis started at $(timestamp)"
php panini.php 01.1160 liw
echo "3139 - Processing 10.0205 law analysis started at $(timestamp)"
php panini.php 10.0205 law
echo "3140 - Processing 10.0205 liw analysis started at $(timestamp)"
php panini.php 10.0205 liw
echo "3141 - Processing 10.0205 luw analysis started at $(timestamp)"
php panini.php 10.0205 luw
echo "3142 - Processing 10.0205 lfw analysis started at $(timestamp)"
php panini.php 10.0205 lfw
echo "3143 - Processing 10.0205 low analysis started at $(timestamp)"
php panini.php 10.0205 low
echo "3144 - Processing 10.0205 laN analysis started at $(timestamp)"
php panini.php 10.0205 laN
echo "3145 - Processing 10.0205 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0205 ASIrliN
echo "3146 - Processing 10.0205 viDiliN analysis started at $(timestamp)"
php panini.php 10.0205 viDiliN
echo "3147 - Processing 10.0205 luN analysis started at $(timestamp)"
php panini.php 10.0205 luN
echo "3148 - Processing 10.0205 lfN analysis started at $(timestamp)"
php panini.php 10.0205 lfN
echo "3149 - Processing 01.0236 luN analysis started at $(timestamp)"
php panini.php 01.0236 luN
echo "3150 - Processing 01.0321 law analysis started at $(timestamp)"
php panini.php 01.0321 law
echo "3151 - Processing 01.0321 liw analysis started at $(timestamp)"
php panini.php 01.0321 liw
echo "3152 - Processing 01.0321 luw analysis started at $(timestamp)"
php panini.php 01.0321 luw
echo "3153 - Processing 01.0321 lfw analysis started at $(timestamp)"
php panini.php 01.0321 lfw
echo "3154 - Processing 01.0321 low analysis started at $(timestamp)"
php panini.php 01.0321 low
echo "3155 - Processing 01.0321 laN analysis started at $(timestamp)"
php panini.php 01.0321 laN
echo "3156 - Processing 01.0321 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0321 ASIrliN
echo "3157 - Processing 01.0321 viDiliN analysis started at $(timestamp)"
php panini.php 01.0321 viDiliN
echo "3158 - Processing 01.0321 luN analysis started at $(timestamp)"
php panini.php 01.0321 luN
echo "3159 - Processing 01.0321 lfN analysis started at $(timestamp)"
php panini.php 01.0321 lfN
echo "3160 - Processing 04.0056 law analysis started at $(timestamp)"
php panini.php 04.0056 law
echo "3161 - Processing 04.0056 liw analysis started at $(timestamp)"
php panini.php 04.0056 liw
echo "3162 - Processing 04.0056 luw analysis started at $(timestamp)"
php panini.php 04.0056 luw
echo "3163 - Processing 04.0056 lfw analysis started at $(timestamp)"
php panini.php 04.0056 lfw
echo "3164 - Processing 04.0056 low analysis started at $(timestamp)"
php panini.php 04.0056 low
echo "3165 - Processing 04.0056 laN analysis started at $(timestamp)"
php panini.php 04.0056 laN
echo "3166 - Processing 04.0056 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0056 ASIrliN
echo "3167 - Processing 04.0056 viDiliN analysis started at $(timestamp)"
php panini.php 04.0056 viDiliN
echo "3168 - Processing 04.0056 luN analysis started at $(timestamp)"
php panini.php 04.0056 luN
echo "3169 - Processing 04.0056 lfN analysis started at $(timestamp)"
php panini.php 04.0056 lfN
echo "3170 - Processing 06.0304 liw analysis started at $(timestamp)"
php panini.php 06.0304 liw
echo "3171 - Processing 06.0304 low analysis started at $(timestamp)"
php panini.php 06.0304 low
echo "3172 - Processing 06.0304 laN analysis started at $(timestamp)"
php panini.php 06.0304 laN
echo "3173 - Processing 06.0304 viDiliN analysis started at $(timestamp)"
php panini.php 06.0304 viDiliN
echo "3174 - Processing 03.0013 law analysis started at $(timestamp)"
php panini.php 03.0013 law
echo "3175 - Processing 03.0013 low analysis started at $(timestamp)"
php panini.php 03.0013 low
echo "3176 - Processing 03.0013 laN analysis started at $(timestamp)"
php panini.php 03.0013 laN
echo "3177 - Processing 03.0013 viDiliN analysis started at $(timestamp)"
php panini.php 03.0013 viDiliN
echo "3178 - Processing 06.0009 laN analysis started at $(timestamp)"
php panini.php 06.0009 laN
echo "3179 - Processing 06.0009 viDiliN analysis started at $(timestamp)"
php panini.php 06.0009 viDiliN
echo "3180 - Processing 06.0009 luN analysis started at $(timestamp)"
php panini.php 06.0009 luN
echo "3181 - Processing 07.0023 law analysis started at $(timestamp)"
php panini.php 07.0023 law
echo "3182 - Processing 07.0023 luw analysis started at $(timestamp)"
php panini.php 07.0023 luw
echo "3183 - Processing 07.0023 lfw analysis started at $(timestamp)"
php panini.php 07.0023 lfw
echo "3184 - Processing 07.0023 low analysis started at $(timestamp)"
php panini.php 07.0023 low
echo "3185 - Processing 07.0023 laN analysis started at $(timestamp)"
php panini.php 07.0023 laN
echo "3186 - Processing 07.0023 viDiliN analysis started at $(timestamp)"
php panini.php 07.0023 viDiliN
echo "3187 - Processing 01.0033 luN analysis started at $(timestamp)"
php panini.php 01.0033 luN
echo "3188 - Processing 07.0232 low analysis started at $(timestamp)"
php panini.php 07.0232 low
echo "3189 - Processing 04.0168 low analysis started at $(timestamp)"
php panini.php 04.0168 low
echo "3190 - Processing 06.0160 law analysis started at $(timestamp)"
php panini.php 06.0160 law
echo "3191 - Processing 06.0160 liw analysis started at $(timestamp)"
php panini.php 06.0160 liw
echo "3192 - Processing 06.0160 low analysis started at $(timestamp)"
php panini.php 06.0160 low
echo "3193 - Processing 06.0160 laN analysis started at $(timestamp)"
php panini.php 06.0160 laN
echo "3194 - Processing 06.0160 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0160 ASIrliN
echo "3195 - Processing 06.0160 viDiliN analysis started at $(timestamp)"
php panini.php 06.0160 viDiliN
echo "3196 - Processing 06.0160 luN analysis started at $(timestamp)"
php panini.php 06.0160 luN
echo "3197 - Processing 01.0794 law analysis started at $(timestamp)"
php panini.php 01.0794 law
echo "3198 - Processing 01.0794 luw analysis started at $(timestamp)"
php panini.php 01.0794 luw
echo "3199 - Processing 01.0794 lfw analysis started at $(timestamp)"
php panini.php 01.0794 lfw
echo "3200 - Processing 01.0794 low analysis started at $(timestamp)"
php panini.php 01.0794 low
echo "3201 - Processing 01.0794 laN analysis started at $(timestamp)"
php panini.php 01.0794 laN
echo "3202 - Processing 01.0794 viDiliN analysis started at $(timestamp)"
php panini.php 01.0794 viDiliN
echo "3203 - Processing 01.0794 luN analysis started at $(timestamp)"
php panini.php 01.0794 luN
echo "3204 - Processing 01.0794 lfN analysis started at $(timestamp)"
php panini.php 01.0794 lfN
echo "3205 - Processing 09.0062 law analysis started at $(timestamp)"
php panini.php 09.0062 law
echo "3206 - Processing 09.0062 low analysis started at $(timestamp)"
php panini.php 09.0062 low
echo "3207 - Processing 09.0062 laN analysis started at $(timestamp)"
php panini.php 09.0062 laN
echo "3208 - Processing 09.0062 viDiliN analysis started at $(timestamp)"
php panini.php 09.0062 viDiliN
echo "3209 - Processing 09.0062 luN analysis started at $(timestamp)"
php panini.php 09.0062 luN
echo "3210 - Processing 03.0014 law analysis started at $(timestamp)"
php panini.php 03.0014 law
echo "3211 - Processing 03.0014 low analysis started at $(timestamp)"
php panini.php 03.0014 low
echo "3212 - Processing 03.0014 laN analysis started at $(timestamp)"
php panini.php 03.0014 laN
echo "3213 - Processing 03.0014 viDiliN analysis started at $(timestamp)"
php panini.php 03.0014 viDiliN
echo "3214 - Processing 10.0486 liw analysis started at $(timestamp)"
php panini.php 10.0486 liw
echo "3215 - Processing 10.0486 low analysis started at $(timestamp)"
php panini.php 10.0486 low
echo "3216 - Processing 10.0486 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0486 ASIrliN
echo "3217 - Processing 10.0207 liw analysis started at $(timestamp)"
php panini.php 10.0207 liw
echo "3218 - Processing 10.0207 low analysis started at $(timestamp)"
php panini.php 10.0207 low
echo "3219 - Processing 10.0207 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0207 ASIrliN
echo "3220 - Processing 01.0818 law analysis started at $(timestamp)"
php panini.php 01.0818 law
echo "3221 - Processing 01.0818 low analysis started at $(timestamp)"
php panini.php 01.0818 low
echo "3222 - Processing 01.0818 laN analysis started at $(timestamp)"
php panini.php 01.0818 laN
echo "3223 - Processing 01.0818 viDiliN analysis started at $(timestamp)"
php panini.php 01.0818 viDiliN
echo "3224 - Processing 01.0818 luN analysis started at $(timestamp)"
php panini.php 01.0818 luN
echo "3225 - Processing 04.0124 law analysis started at $(timestamp)"
php panini.php 04.0124 law
echo "3226 - Processing 04.0124 liw analysis started at $(timestamp)"
php panini.php 04.0124 liw
echo "3227 - Processing 04.0124 luw analysis started at $(timestamp)"
php panini.php 04.0124 luw
echo "3228 - Processing 04.0124 lfw analysis started at $(timestamp)"
php panini.php 04.0124 lfw
echo "3229 - Processing 04.0124 low analysis started at $(timestamp)"
php panini.php 04.0124 low
echo "3230 - Processing 04.0124 laN analysis started at $(timestamp)"
php panini.php 04.0124 laN
echo "3231 - Processing 04.0124 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0124 ASIrliN
echo "3232 - Processing 04.0124 viDiliN analysis started at $(timestamp)"
php panini.php 04.0124 viDiliN
echo "3233 - Processing 04.0124 luN analysis started at $(timestamp)"
php panini.php 04.0124 luN
echo "3234 - Processing 04.0124 lfN analysis started at $(timestamp)"
php panini.php 04.0124 lfN
echo "3235 - Processing 01.0209 luw analysis started at $(timestamp)"
php panini.php 01.0209 luw
echo "3236 - Processing 01.0209 laN analysis started at $(timestamp)"
php panini.php 01.0209 laN
echo "3237 - Processing 01.0209 viDiliN analysis started at $(timestamp)"
php panini.php 01.0209 viDiliN
echo "3238 - Processing 01.0178 law analysis started at $(timestamp)"
php panini.php 01.0178 law
echo "3239 - Processing 01.0178 liw analysis started at $(timestamp)"
php panini.php 01.0178 liw
echo "3240 - Processing 01.0178 luw analysis started at $(timestamp)"
php panini.php 01.0178 luw
echo "3241 - Processing 01.0178 lfw analysis started at $(timestamp)"
php panini.php 01.0178 lfw
echo "3242 - Processing 01.0178 low analysis started at $(timestamp)"
php panini.php 01.0178 low
echo "3243 - Processing 01.0178 laN analysis started at $(timestamp)"
php panini.php 01.0178 laN
echo "3244 - Processing 01.0178 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0178 ASIrliN
echo "3245 - Processing 01.0178 viDiliN analysis started at $(timestamp)"
php panini.php 01.0178 viDiliN
echo "3246 - Processing 01.0178 luN analysis started at $(timestamp)"
php panini.php 01.0178 luN
echo "3247 - Processing 01.0178 lfN analysis started at $(timestamp)"
php panini.php 01.0178 lfN
echo "3248 - Processing 04.0118 law analysis started at $(timestamp)"
php panini.php 04.0118 law
echo "3249 - Processing 04.0118 liw analysis started at $(timestamp)"
php panini.php 04.0118 liw
echo "3250 - Processing 04.0118 luw analysis started at $(timestamp)"
php panini.php 04.0118 luw
echo "3251 - Processing 04.0118 lfw analysis started at $(timestamp)"
php panini.php 04.0118 lfw
echo "3252 - Processing 04.0118 low analysis started at $(timestamp)"
php panini.php 04.0118 low
echo "3253 - Processing 04.0118 laN analysis started at $(timestamp)"
php panini.php 04.0118 laN
echo "3254 - Processing 04.0118 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0118 ASIrliN
echo "3255 - Processing 04.0118 viDiliN analysis started at $(timestamp)"
php panini.php 04.0118 viDiliN
echo "3256 - Processing 04.0118 luN analysis started at $(timestamp)"
php panini.php 04.0118 luN
echo "3257 - Processing 04.0118 lfN analysis started at $(timestamp)"
php panini.php 04.0118 lfN
echo "3258 - Processing 10.0837 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0837 ASIrliN
echo "3259 - Processing 10.0837 luN analysis started at $(timestamp)"
php panini.php 10.0837 luN
echo "3260 - Processing 05.0008 ASIrliN analysis started at $(timestamp)"
php panini.php 05.0008 ASIrliN
echo "3261 - Processing 05.0008 viDiliN analysis started at $(timestamp)"
php panini.php 05.0008 viDiliN
echo "3262 - Processing 05.0008 lfN analysis started at $(timestamp)"
php panini.php 05.0008 lfN
echo "3263 - Processing 09.0299 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0299 ASIrliN
echo "3264 - Processing 09.0299 luN analysis started at $(timestamp)"
php panini.php 09.0299 luN
echo "3265 - Processing 10.0345 liw analysis started at $(timestamp)"
php panini.php 10.0345 liw
echo "3266 - Processing 10.0345 lfw analysis started at $(timestamp)"
php panini.php 10.0345 lfw
echo "3267 - Processing 10.0345 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0345 ASIrliN
echo "3268 - Processing 10.0345 viDiliN analysis started at $(timestamp)"
php panini.php 10.0345 viDiliN
echo "3269 - Processing 10.0345 luN analysis started at $(timestamp)"
php panini.php 10.0345 luN
echo "3270 - Processing 01.0097 luN analysis started at $(timestamp)"
php panini.php 01.0097 luN
echo "3271 - Processing 01.0688 luN analysis started at $(timestamp)"
php panini.php 01.0688 luN
echo "3272 - Processing 02.0023 law analysis started at $(timestamp)"
php panini.php 02.0023 law
echo "3273 - Processing 02.0023 liw analysis started at $(timestamp)"
php panini.php 02.0023 liw
echo "3274 - Processing 02.0023 luw analysis started at $(timestamp)"
php panini.php 02.0023 luw
echo "3275 - Processing 02.0023 lfw analysis started at $(timestamp)"
php panini.php 02.0023 lfw
echo "3276 - Processing 02.0023 low analysis started at $(timestamp)"
php panini.php 02.0023 low
echo "3277 - Processing 02.0023 laN analysis started at $(timestamp)"
php panini.php 02.0023 laN
echo "3278 - Processing 02.0023 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0023 ASIrliN
echo "3279 - Processing 02.0023 viDiliN analysis started at $(timestamp)"
php panini.php 02.0023 viDiliN
echo "3280 - Processing 02.0023 luN analysis started at $(timestamp)"
php panini.php 02.0023 luN
echo "3281 - Processing 02.0023 lfN analysis started at $(timestamp)"
php panini.php 02.0023 lfN
echo "3282 - Processing 06.0056 liw analysis started at $(timestamp)"
php panini.php 06.0056 liw
echo "3283 - Processing 06.0056 low analysis started at $(timestamp)"
php panini.php 06.0056 low
echo "3284 - Processing 06.0056 laN analysis started at $(timestamp)"
php panini.php 06.0056 laN
echo "3285 - Processing 06.0056 viDiliN analysis started at $(timestamp)"
php panini.php 06.0056 viDiliN
echo "3286 - Processing 10.0055 lfN analysis started at $(timestamp)"
php panini.php 10.0055 lfN
echo "3287 - Processing 04.0312 luN analysis started at $(timestamp)"
php panini.php 04.0312 luN
echo "3288 - Processing 04.0312 lfN analysis started at $(timestamp)"
php panini.php 04.0312 lfN
echo "3289 - Processing 01.0862 luN analysis started at $(timestamp)"
php panini.php 01.0862 luN
echo "3290 - Processing 01.0862 lfN analysis started at $(timestamp)"
php panini.php 01.0862 lfN
echo "3291 - Processing 10.0313 lfN analysis started at $(timestamp)"
php panini.php 10.0313 lfN
echo "3292 - Processing 01.0863 luN analysis started at $(timestamp)"
php panini.php 01.0863 luN
echo "3293 - Processing 01.0863 lfN analysis started at $(timestamp)"
php panini.php 01.0863 lfN
echo "3294 - Processing 06.0073 liw analysis started at $(timestamp)"
php panini.php 06.0073 liw
echo "3295 - Processing 06.0073 luN analysis started at $(timestamp)"
php panini.php 06.0073 luN
echo "3296 - Processing 09.0019 liw analysis started at $(timestamp)"
php panini.php 09.0019 liw
echo "3297 - Processing 09.0019 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0019 ASIrliN
echo "3298 - Processing 09.0019 luN analysis started at $(timestamp)"
php panini.php 09.0019 luN
echo "3299 - Processing 09.0019 lfN analysis started at $(timestamp)"
php panini.php 09.0019 lfN
echo "3300 - Processing 09.0023 liw analysis started at $(timestamp)"
php panini.php 09.0023 liw
echo "3301 - Processing 09.0023 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0023 ASIrliN
echo "3302 - Processing 09.0023 lfN analysis started at $(timestamp)"
php panini.php 09.0023 lfN
echo "3303 - Processing 01.1161 liw analysis started at $(timestamp)"
php panini.php 01.1161 liw
echo "3304 - Processing 01.1018 luN analysis started at $(timestamp)"
php panini.php 01.1018 luN
echo "3305 - Processing 01.0034 luN analysis started at $(timestamp)"
php panini.php 01.0034 luN
echo "3306 - Processing 01.1019 law analysis started at $(timestamp)"
php panini.php 01.1019 law
echo "3307 - Processing 01.1019 liw analysis started at $(timestamp)"
php panini.php 01.1019 liw
echo "3308 - Processing 01.1019 luw analysis started at $(timestamp)"
php panini.php 01.1019 luw
echo "3309 - Processing 01.1019 lfw analysis started at $(timestamp)"
php panini.php 01.1019 lfw
echo "3310 - Processing 01.1019 low analysis started at $(timestamp)"
php panini.php 01.1019 low
echo "3311 - Processing 01.1019 laN analysis started at $(timestamp)"
php panini.php 01.1019 laN
echo "3312 - Processing 01.1019 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1019 ASIrliN
echo "3313 - Processing 01.1019 viDiliN analysis started at $(timestamp)"
php panini.php 01.1019 viDiliN
echo "3314 - Processing 01.1019 luN analysis started at $(timestamp)"
php panini.php 01.1019 luN
echo "3315 - Processing 01.1019 lfN analysis started at $(timestamp)"
php panini.php 01.1019 lfN
echo "3316 - Processing 01.0425 law analysis started at $(timestamp)"
php panini.php 01.0425 law
echo "3317 - Processing 01.0425 liw analysis started at $(timestamp)"
php panini.php 01.0425 liw
echo "3318 - Processing 01.0425 luw analysis started at $(timestamp)"
php panini.php 01.0425 luw
echo "3319 - Processing 01.0425 lfw analysis started at $(timestamp)"
php panini.php 01.0425 lfw
echo "3320 - Processing 01.0425 low analysis started at $(timestamp)"
php panini.php 01.0425 low
echo "3321 - Processing 01.0425 laN analysis started at $(timestamp)"
php panini.php 01.0425 laN
echo "3322 - Processing 01.0425 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0425 ASIrliN
echo "3323 - Processing 01.0425 viDiliN analysis started at $(timestamp)"
php panini.php 01.0425 viDiliN
echo "3324 - Processing 01.0425 luN analysis started at $(timestamp)"
php panini.php 01.0425 luN
echo "3325 - Processing 01.0425 lfN analysis started at $(timestamp)"
php panini.php 01.0425 lfN
echo "3326 - Processing 02.0072 law analysis started at $(timestamp)"
php panini.php 02.0072 law
echo "3327 - Processing 02.0072 liw analysis started at $(timestamp)"
php panini.php 02.0072 liw
echo "3328 - Processing 02.0072 low analysis started at $(timestamp)"
php panini.php 02.0072 low
echo "3329 - Processing 02.0072 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0072 ASIrliN
echo "3330 - Processing 02.0072 luN analysis started at $(timestamp)"
php panini.php 02.0072 luN
echo "3331 - Processing 01.0288 luN analysis started at $(timestamp)"
php panini.php 01.0288 luN
echo "3332 - Processing 01.0819 law analysis started at $(timestamp)"
php panini.php 01.0819 law
echo "3333 - Processing 01.0819 liw analysis started at $(timestamp)"
php panini.php 01.0819 liw
echo "3334 - Processing 01.0819 low analysis started at $(timestamp)"
php panini.php 01.0819 low
echo "3335 - Processing 01.0819 laN analysis started at $(timestamp)"
php panini.php 01.0819 laN
echo "3336 - Processing 01.0819 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0819 ASIrliN
echo "3337 - Processing 01.0819 viDiliN analysis started at $(timestamp)"
php panini.php 01.0819 viDiliN
echo "3338 - Processing 01.0819 luN analysis started at $(timestamp)"
php panini.php 01.0819 luN
echo "3339 - Processing 01.0868 luN analysis started at $(timestamp)"
php panini.php 01.0868 luN
echo "3340 - Processing 10.0136 law analysis started at $(timestamp)"
php panini.php 10.0136 law
echo "3341 - Processing 10.0136 liw analysis started at $(timestamp)"
php panini.php 10.0136 liw
echo "3342 - Processing 10.0136 luw analysis started at $(timestamp)"
php panini.php 10.0136 luw
echo "3343 - Processing 10.0136 lfw analysis started at $(timestamp)"
php panini.php 10.0136 lfw
echo "3344 - Processing 10.0136 low analysis started at $(timestamp)"
php panini.php 10.0136 low
echo "3345 - Processing 10.0136 laN analysis started at $(timestamp)"
php panini.php 10.0136 laN
echo "3346 - Processing 10.0136 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0136 ASIrliN
echo "3347 - Processing 10.0136 viDiliN analysis started at $(timestamp)"
php panini.php 10.0136 viDiliN
echo "3348 - Processing 10.0136 luN analysis started at $(timestamp)"
php panini.php 10.0136 luN
echo "3349 - Processing 10.0136 lfN analysis started at $(timestamp)"
php panini.php 10.0136 lfN
echo "3350 - Processing 01.1024 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1024 ASIrliN
echo "3351 - Processing 01.1024 luN analysis started at $(timestamp)"
php panini.php 01.1024 luN
echo "3352 - Processing 04.0276 law analysis started at $(timestamp)"
php panini.php 04.0276 law
echo "3353 - Processing 04.0276 liw analysis started at $(timestamp)"
php panini.php 04.0276 liw
echo "3354 - Processing 04.0276 luw analysis started at $(timestamp)"
php panini.php 04.0276 luw
echo "3355 - Processing 04.0276 lfw analysis started at $(timestamp)"
php panini.php 04.0276 lfw
echo "3356 - Processing 04.0276 low analysis started at $(timestamp)"
php panini.php 04.0276 low
echo "3357 - Processing 04.0276 laN analysis started at $(timestamp)"
php panini.php 04.0276 laN
echo "3358 - Processing 04.0276 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0276 ASIrliN
echo "3359 - Processing 04.0276 viDiliN analysis started at $(timestamp)"
php panini.php 04.0276 viDiliN
echo "3360 - Processing 04.0276 luN analysis started at $(timestamp)"
php panini.php 04.0276 luN
echo "3361 - Processing 04.0276 lfN analysis started at $(timestamp)"
php panini.php 04.0276 lfN
echo "3362 - Processing 10.0115 law analysis started at $(timestamp)"
php panini.php 10.0115 law
echo "3363 - Processing 10.0115 liw analysis started at $(timestamp)"
php panini.php 10.0115 liw
echo "3364 - Processing 10.0115 luw analysis started at $(timestamp)"
php panini.php 10.0115 luw
echo "3365 - Processing 10.0115 lfw analysis started at $(timestamp)"
php panini.php 10.0115 lfw
echo "3366 - Processing 10.0115 low analysis started at $(timestamp)"
php panini.php 10.0115 low
echo "3367 - Processing 10.0115 laN analysis started at $(timestamp)"
php panini.php 10.0115 laN
echo "3368 - Processing 10.0115 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0115 ASIrliN
echo "3369 - Processing 10.0115 viDiliN analysis started at $(timestamp)"
php panini.php 10.0115 viDiliN
echo "3370 - Processing 10.0115 luN analysis started at $(timestamp)"
php panini.php 10.0115 luN
echo "3371 - Processing 10.0115 lfN analysis started at $(timestamp)"
php panini.php 10.0115 lfN
echo "3372 - Processing 01.1162 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1162 ASIrliN
echo "3373 - Processing 01.1162 lfN analysis started at $(timestamp)"
php panini.php 01.1162 lfN
echo "3374 - Processing 01.0247 luN analysis started at $(timestamp)"
php panini.php 01.0247 luN
echo "3375 - Processing 01.0286 luN analysis started at $(timestamp)"
php panini.php 01.0286 luN
echo "3376 - Processing 01.0248 law analysis started at $(timestamp)"
php panini.php 01.0248 law
echo "3377 - Processing 01.0248 liw analysis started at $(timestamp)"
php panini.php 01.0248 liw
echo "3378 - Processing 01.0248 luw analysis started at $(timestamp)"
php panini.php 01.0248 luw
echo "3379 - Processing 01.0248 lfw analysis started at $(timestamp)"
php panini.php 01.0248 lfw
echo "3380 - Processing 01.0248 low analysis started at $(timestamp)"
php panini.php 01.0248 low
echo "3381 - Processing 01.0248 laN analysis started at $(timestamp)"
php panini.php 01.0248 laN
echo "3382 - Processing 01.0248 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0248 ASIrliN
echo "3383 - Processing 01.0248 viDiliN analysis started at $(timestamp)"
php panini.php 01.0248 viDiliN
echo "3384 - Processing 01.0248 luN analysis started at $(timestamp)"
php panini.php 01.0248 luN
echo "3385 - Processing 01.0248 lfN analysis started at $(timestamp)"
php panini.php 01.0248 lfN
echo "3386 - Processing 06.0012 law analysis started at $(timestamp)"
php panini.php 06.0012 law
echo "3387 - Processing 06.0012 low analysis started at $(timestamp)"
php panini.php 06.0012 low
echo "3388 - Processing 06.0012 laN analysis started at $(timestamp)"
php panini.php 06.0012 laN
echo "3389 - Processing 09.0040 liw analysis started at $(timestamp)"
php panini.php 09.0040 liw
echo "3390 - Processing 09.0040 low analysis started at $(timestamp)"
php panini.php 09.0040 low
echo "3391 - Processing 06.0127 law analysis started at $(timestamp)"
php panini.php 06.0127 law
echo "3392 - Processing 06.0127 luN analysis started at $(timestamp)"
php panini.php 06.0127 luN
echo "3393 - Processing 10.0176 law analysis started at $(timestamp)"
php panini.php 10.0176 law
echo "3394 - Processing 10.0176 liw analysis started at $(timestamp)"
php panini.php 10.0176 liw
echo "3395 - Processing 10.0176 luw analysis started at $(timestamp)"
php panini.php 10.0176 luw
echo "3396 - Processing 10.0176 lfw analysis started at $(timestamp)"
php panini.php 10.0176 lfw
echo "3397 - Processing 10.0176 low analysis started at $(timestamp)"
php panini.php 10.0176 low
echo "3398 - Processing 10.0176 laN analysis started at $(timestamp)"
php panini.php 10.0176 laN
echo "3399 - Processing 10.0176 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0176 ASIrliN
echo "3400 - Processing 10.0176 viDiliN analysis started at $(timestamp)"
php panini.php 10.0176 viDiliN
echo "3401 - Processing 10.0176 luN analysis started at $(timestamp)"
php panini.php 10.0176 luN
echo "3402 - Processing 10.0176 lfN analysis started at $(timestamp)"
php panini.php 10.0176 lfN
echo "3403 - Processing 10.0174 law analysis started at $(timestamp)"
php panini.php 10.0174 law
echo "3404 - Processing 10.0174 liw analysis started at $(timestamp)"
php panini.php 10.0174 liw
echo "3405 - Processing 10.0174 luw analysis started at $(timestamp)"
php panini.php 10.0174 luw
echo "3406 - Processing 10.0174 lfw analysis started at $(timestamp)"
php panini.php 10.0174 lfw
echo "3407 - Processing 10.0174 low analysis started at $(timestamp)"
php panini.php 10.0174 low
echo "3408 - Processing 10.0174 laN analysis started at $(timestamp)"
php panini.php 10.0174 laN
echo "3409 - Processing 10.0174 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0174 ASIrliN
echo "3410 - Processing 10.0174 viDiliN analysis started at $(timestamp)"
php panini.php 10.0174 viDiliN
echo "3411 - Processing 10.0174 luN analysis started at $(timestamp)"
php panini.php 10.0174 luN
echo "3412 - Processing 10.0174 lfN analysis started at $(timestamp)"
php panini.php 10.0174 lfN
echo "3413 - Processing 09.0037 law analysis started at $(timestamp)"
php panini.php 09.0037 law
echo "3414 - Processing 09.0037 liw analysis started at $(timestamp)"
php panini.php 09.0037 liw
echo "3415 - Processing 09.0037 luw analysis started at $(timestamp)"
php panini.php 09.0037 luw
echo "3416 - Processing 09.0037 lfw analysis started at $(timestamp)"
php panini.php 09.0037 lfw
echo "3417 - Processing 09.0037 low analysis started at $(timestamp)"
php panini.php 09.0037 low
echo "3418 - Processing 09.0037 laN analysis started at $(timestamp)"
php panini.php 09.0037 laN
echo "3419 - Processing 09.0037 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0037 ASIrliN
echo "3420 - Processing 09.0037 viDiliN analysis started at $(timestamp)"
php panini.php 09.0037 viDiliN
echo "3421 - Processing 09.0037 luN analysis started at $(timestamp)"
php panini.php 09.0037 luN
echo "3422 - Processing 09.0037 lfN analysis started at $(timestamp)"
php panini.php 09.0037 lfN
echo "3423 - Processing 01.0829 law analysis started at $(timestamp)"
php panini.php 01.0829 law
echo "3424 - Processing 01.0829 liw analysis started at $(timestamp)"
php panini.php 01.0829 liw
echo "3425 - Processing 01.0829 lfw analysis started at $(timestamp)"
php panini.php 01.0829 lfw
echo "3426 - Processing 01.0829 low analysis started at $(timestamp)"
php panini.php 01.0829 low
echo "3427 - Processing 01.0829 laN analysis started at $(timestamp)"
php panini.php 01.0829 laN
echo "3428 - Processing 01.0829 viDiliN analysis started at $(timestamp)"
php panini.php 01.0829 viDiliN
echo "3429 - Processing 01.0829 luN analysis started at $(timestamp)"
php panini.php 01.0829 luN
echo "3430 - Processing 01.0829 lfN analysis started at $(timestamp)"
php panini.php 01.0829 lfN
echo "3431 - Processing 01.0394 law analysis started at $(timestamp)"
php panini.php 01.0394 law
echo "3432 - Processing 01.0394 liw analysis started at $(timestamp)"
php panini.php 01.0394 liw
echo "3433 - Processing 01.0394 luw analysis started at $(timestamp)"
php panini.php 01.0394 luw
echo "3434 - Processing 01.0394 lfw analysis started at $(timestamp)"
php panini.php 01.0394 lfw
echo "3435 - Processing 01.0394 low analysis started at $(timestamp)"
php panini.php 01.0394 low
echo "3436 - Processing 01.0394 laN analysis started at $(timestamp)"
php panini.php 01.0394 laN
echo "3437 - Processing 01.0394 viDiliN analysis started at $(timestamp)"
php panini.php 01.0394 viDiliN
echo "3438 - Processing 01.0394 luN analysis started at $(timestamp)"
php panini.php 01.0394 luN
echo "3439 - Processing 01.0394 lfN analysis started at $(timestamp)"
php panini.php 01.0394 lfN
echo "3440 - Processing 06.0164 law analysis started at $(timestamp)"
php panini.php 06.0164 law
echo "3441 - Processing 06.0164 low analysis started at $(timestamp)"
php panini.php 06.0164 low
echo "3442 - Processing 06.0164 laN analysis started at $(timestamp)"
php panini.php 06.0164 laN
echo "3443 - Processing 06.0164 viDiliN analysis started at $(timestamp)"
php panini.php 06.0164 viDiliN
echo "3444 - Processing 01.0991 law analysis started at $(timestamp)"
php panini.php 01.0991 law
echo "3445 - Processing 01.0991 low analysis started at $(timestamp)"
php panini.php 01.0991 low
echo "3446 - Processing 01.0991 laN analysis started at $(timestamp)"
php panini.php 01.0991 laN
echo "3447 - Processing 01.0991 viDiliN analysis started at $(timestamp)"
php panini.php 01.0991 viDiliN
echo "3448 - Processing 04.0064 liw analysis started at $(timestamp)"
php panini.php 04.0064 liw
echo "3449 - Processing 01.1155 liw analysis started at $(timestamp)"
php panini.php 01.1155 liw
echo "3450 - Processing 01.0455 low analysis started at $(timestamp)"
php panini.php 01.0455 low
echo "3451 - Processing 01.0826 liw analysis started at $(timestamp)"
php panini.php 01.0826 liw
echo "3452 - Processing 01.0826 luw analysis started at $(timestamp)"
php panini.php 01.0826 luw
echo "3453 - Processing 01.0826 lfw analysis started at $(timestamp)"
php panini.php 01.0826 lfw
echo "3454 - Processing 01.0826 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0826 ASIrliN
echo "3455 - Processing 01.0826 lfN analysis started at $(timestamp)"
php panini.php 01.0826 lfN
echo "3456 - Processing 01.0828 liw analysis started at $(timestamp)"
php panini.php 01.0828 liw
echo "3457 - Processing 01.1150 law analysis started at $(timestamp)"
php panini.php 01.1150 law
echo "3458 - Processing 01.1150 liw analysis started at $(timestamp)"
php panini.php 01.1150 liw
echo "3459 - Processing 01.1150 luw analysis started at $(timestamp)"
php panini.php 01.1150 luw
echo "3460 - Processing 01.1150 lfw analysis started at $(timestamp)"
php panini.php 01.1150 lfw
echo "3461 - Processing 01.1150 low analysis started at $(timestamp)"
php panini.php 01.1150 low
echo "3462 - Processing 01.1150 laN analysis started at $(timestamp)"
php panini.php 01.1150 laN
echo "3463 - Processing 01.1150 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1150 ASIrliN
echo "3464 - Processing 01.1150 viDiliN analysis started at $(timestamp)"
php panini.php 01.1150 viDiliN
echo "3465 - Processing 01.1150 luN analysis started at $(timestamp)"
php panini.php 01.1150 luN
echo "3466 - Processing 01.1150 lfN analysis started at $(timestamp)"
php panini.php 01.1150 lfN
echo "3467 - Processing 10.0052 law analysis started at $(timestamp)"
php panini.php 10.0052 law
echo "3468 - Processing 10.0052 liw analysis started at $(timestamp)"
php panini.php 10.0052 liw
echo "3469 - Processing 10.0052 luw analysis started at $(timestamp)"
php panini.php 10.0052 luw
echo "3470 - Processing 10.0052 lfw analysis started at $(timestamp)"
php panini.php 10.0052 lfw
echo "3471 - Processing 10.0052 low analysis started at $(timestamp)"
php panini.php 10.0052 low
echo "3472 - Processing 10.0052 laN analysis started at $(timestamp)"
php panini.php 10.0052 laN
echo "3473 - Processing 10.0052 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0052 ASIrliN
echo "3474 - Processing 10.0052 viDiliN analysis started at $(timestamp)"
php panini.php 10.0052 viDiliN
echo "3475 - Processing 10.0052 luN analysis started at $(timestamp)"
php panini.php 10.0052 luN
echo "3476 - Processing 10.0052 lfN analysis started at $(timestamp)"
php panini.php 10.0052 lfN
echo "3477 - Processing 02.0070 law analysis started at $(timestamp)"
php panini.php 02.0070 law
echo "3478 - Processing 05.0003 ASIrliN analysis started at $(timestamp)"
php panini.php 05.0003 ASIrliN
echo "3479 - Processing 05.0003 viDiliN analysis started at $(timestamp)"
php panini.php 05.0003 viDiliN
echo "3480 - Processing 01.0689 liw analysis started at $(timestamp)"
php panini.php 01.0689 liw
echo "3481 - Processing 01.0174 law analysis started at $(timestamp)"
php panini.php 01.0174 law
echo "3482 - Processing 01.0174 liw analysis started at $(timestamp)"
php panini.php 01.0174 liw
echo "3483 - Processing 01.0174 luw analysis started at $(timestamp)"
php panini.php 01.0174 luw
echo "3484 - Processing 01.0174 lfw analysis started at $(timestamp)"
php panini.php 01.0174 lfw
echo "3485 - Processing 01.0174 low analysis started at $(timestamp)"
php panini.php 01.0174 low
echo "3486 - Processing 01.0174 laN analysis started at $(timestamp)"
php panini.php 01.0174 laN
echo "3487 - Processing 01.0174 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0174 ASIrliN
echo "3488 - Processing 01.0174 viDiliN analysis started at $(timestamp)"
php panini.php 01.0174 viDiliN
echo "3489 - Processing 01.0174 luN analysis started at $(timestamp)"
php panini.php 01.0174 luN
echo "3490 - Processing 01.0174 lfN analysis started at $(timestamp)"
php panini.php 01.0174 lfN
echo "3491 - Processing 01.0184 liw analysis started at $(timestamp)"
php panini.php 01.0184 liw
echo "3492 - Processing 02.0019 law analysis started at $(timestamp)"
php panini.php 02.0019 law
echo "3493 - Processing 02.0019 liw analysis started at $(timestamp)"
php panini.php 02.0019 liw
echo "3494 - Processing 02.0019 laN analysis started at $(timestamp)"
php panini.php 02.0019 laN
echo "3495 - Processing 02.0019 luN analysis started at $(timestamp)"
php panini.php 02.0019 luN
echo "3496 - Processing 01.0340 liw analysis started at $(timestamp)"
php panini.php 01.0340 liw
echo "3497 - Processing 06.0089 liw analysis started at $(timestamp)"
php panini.php 06.0089 liw
echo "3498 - Processing 01.0783 liw analysis started at $(timestamp)"
php panini.php 01.0783 liw
echo "3499 - Processing 07.0349 liw analysis started at $(timestamp)"
php panini.php 07.0349 liw
echo "3500 - Processing 10.0363 luN analysis started at $(timestamp)"
php panini.php 10.0363 luN
echo "3501 - Processing 10.0320 luN analysis started at $(timestamp)"
php panini.php 10.0320 luN
echo "3502 - Processing 01.0078 liw analysis started at $(timestamp)"
php panini.php 01.0078 liw
echo "3503 - Processing 01.0444 liw analysis started at $(timestamp)"
php panini.php 01.0444 liw
echo "3504 - Processing 01.0444 low analysis started at $(timestamp)"
php panini.php 01.0444 low
echo "3505 - Processing 10.0419 luN analysis started at $(timestamp)"
php panini.php 10.0419 luN
echo "3506 - Processing 01.0601 liw analysis started at $(timestamp)"
php panini.php 01.0601 liw
echo "3507 - Processing 01.0127 law analysis started at $(timestamp)"
php panini.php 01.0127 law
echo "3508 - Processing 01.0127 liw analysis started at $(timestamp)"
php panini.php 01.0127 liw
echo "3509 - Processing 01.0127 luw analysis started at $(timestamp)"
php panini.php 01.0127 luw
echo "3510 - Processing 01.0127 lfw analysis started at $(timestamp)"
php panini.php 01.0127 lfw
echo "3511 - Processing 01.0127 low analysis started at $(timestamp)"
php panini.php 01.0127 low
echo "3512 - Processing 01.0127 laN analysis started at $(timestamp)"
php panini.php 01.0127 laN
echo "3513 - Processing 01.0127 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0127 ASIrliN
echo "3514 - Processing 01.0127 viDiliN analysis started at $(timestamp)"
php panini.php 01.0127 viDiliN
echo "3515 - Processing 01.0127 luN analysis started at $(timestamp)"
php panini.php 01.0127 luN
echo "3516 - Processing 01.0127 lfN analysis started at $(timestamp)"
php panini.php 01.0127 lfN
echo "3517 - Processing 04.0061 liw analysis started at $(timestamp)"
php panini.php 04.0061 liw
echo "3518 - Processing 04.0061 luN analysis started at $(timestamp)"
php panini.php 04.0061 luN
echo "3519 - Processing 01.0590 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0590 ASIrliN
echo "3520 - Processing 01.0395 liw analysis started at $(timestamp)"
php panini.php 01.0395 liw
echo "3521 - Processing 06.0062 liw analysis started at $(timestamp)"
php panini.php 06.0062 liw
echo "3522 - Processing 06.0062 luw analysis started at $(timestamp)"
php panini.php 06.0062 luw
echo "3523 - Processing 06.0062 lfw analysis started at $(timestamp)"
php panini.php 06.0062 lfw
echo "3524 - Processing 06.0062 luN analysis started at $(timestamp)"
php panini.php 06.0062 luN
echo "3525 - Processing 06.0062 lfN analysis started at $(timestamp)"
php panini.php 06.0062 lfN
echo "3526 - Processing 10.0369 luN analysis started at $(timestamp)"
php panini.php 10.0369 luN
echo "3527 - Processing 01.0853 law analysis started at $(timestamp)"
php panini.php 01.0853 law
echo "3528 - Processing 01.0853 low analysis started at $(timestamp)"
php panini.php 01.0853 low
echo "3529 - Processing 01.0853 laN analysis started at $(timestamp)"
php panini.php 01.0853 laN
echo "3530 - Processing 01.0853 viDiliN analysis started at $(timestamp)"
php panini.php 01.0853 viDiliN
echo "3531 - Processing 01.0853 luN analysis started at $(timestamp)"
php panini.php 01.0853 luN
echo "3532 - Processing 01.0500 luN analysis started at $(timestamp)"
php panini.php 01.0500 luN
echo "3533 - Processing 01.0864 luN analysis started at $(timestamp)"
php panini.php 01.0864 luN
echo "3534 - Processing 01.1014 luN analysis started at $(timestamp)"
php panini.php 01.1014 luN
echo "3535 - Processing 04.0040 low analysis started at $(timestamp)"
php panini.php 04.0040 low
echo "3536 - Processing 04.0040 viDiliN analysis started at $(timestamp)"
php panini.php 04.0040 viDiliN
echo "3537 - Processing 04.0040 luN analysis started at $(timestamp)"
php panini.php 04.0040 luN
echo "3538 - Processing 01.0325 liw analysis started at $(timestamp)"
php panini.php 01.0325 liw
echo "3539 - Processing 01.0041 law analysis started at $(timestamp)"
php panini.php 01.0041 law
echo "3540 - Processing 01.0041 liw analysis started at $(timestamp)"
php panini.php 01.0041 liw
echo "3541 - Processing 01.0041 luw analysis started at $(timestamp)"
php panini.php 01.0041 luw
echo "3542 - Processing 01.0041 lfw analysis started at $(timestamp)"
php panini.php 01.0041 lfw
echo "3543 - Processing 01.0041 low analysis started at $(timestamp)"
php panini.php 01.0041 low
echo "3544 - Processing 01.0041 laN analysis started at $(timestamp)"
php panini.php 01.0041 laN
echo "3545 - Processing 01.0041 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0041 ASIrliN
echo "3546 - Processing 01.0041 viDiliN analysis started at $(timestamp)"
php panini.php 01.0041 viDiliN
echo "3547 - Processing 01.0041 luN analysis started at $(timestamp)"
php panini.php 01.0041 luN
echo "3548 - Processing 01.0041 lfN analysis started at $(timestamp)"
php panini.php 01.0041 lfN
echo "3549 - Processing 01.0042 liw analysis started at $(timestamp)"
php panini.php 01.0042 liw
echo "3550 - Processing 01.0042 low analysis started at $(timestamp)"
php panini.php 01.0042 low
echo "3551 - Processing 01.0909 law analysis started at $(timestamp)"
php panini.php 01.0909 law
echo "3552 - Processing 01.0909 liw analysis started at $(timestamp)"
php panini.php 01.0909 liw
echo "3553 - Processing 01.0909 luw analysis started at $(timestamp)"
php panini.php 01.0909 luw
echo "3554 - Processing 01.0909 lfw analysis started at $(timestamp)"
php panini.php 01.0909 lfw
echo "3555 - Processing 01.0909 low analysis started at $(timestamp)"
php panini.php 01.0909 low
echo "3556 - Processing 01.0909 laN analysis started at $(timestamp)"
php panini.php 01.0909 laN
echo "3557 - Processing 01.0909 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0909 ASIrliN
echo "3558 - Processing 01.0909 viDiliN analysis started at $(timestamp)"
php panini.php 01.0909 viDiliN
echo "3559 - Processing 01.0909 luN analysis started at $(timestamp)"
php panini.php 01.0909 luN
echo "3560 - Processing 01.0909 lfN analysis started at $(timestamp)"
php panini.php 01.0909 lfN
echo "3561 - Processing 01.0596 liw analysis started at $(timestamp)"
php panini.php 01.0596 liw
echo "3562 - Processing 01.0865 liw analysis started at $(timestamp)"
php panini.php 01.0865 liw
echo "3563 - Processing 01.0865 lfw analysis started at $(timestamp)"
php panini.php 01.0865 lfw
echo "3564 - Processing 01.0865 lfN analysis started at $(timestamp)"
php panini.php 01.0865 lfN
echo "3565 - Processing 01.1108 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1108 ASIrliN
echo "3566 - Processing 01.0857 liw analysis started at $(timestamp)"
php panini.php 01.0857 liw
echo "3567 - Processing 01.0857 luw analysis started at $(timestamp)"
php panini.php 01.0857 luw
echo "3568 - Processing 01.0857 lfw analysis started at $(timestamp)"
php panini.php 01.0857 lfw
echo "3569 - Processing 01.0857 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0857 ASIrliN
echo "3570 - Processing 01.0857 luN analysis started at $(timestamp)"
php panini.php 01.0857 luN
echo "3571 - Processing 01.0857 lfN analysis started at $(timestamp)"
php panini.php 01.0857 lfN
echo "3572 - Processing 01.0907 luN analysis started at $(timestamp)"
php panini.php 01.0907 luN
echo "3573 - Processing 09.0374 law analysis started at $(timestamp)"
php panini.php 09.0374 law
echo "3574 - Processing 09.0374 low analysis started at $(timestamp)"
php panini.php 09.0374 low
echo "3575 - Processing 09.0374 laN analysis started at $(timestamp)"
php panini.php 09.0374 laN
echo "3576 - Processing 09.0374 viDiliN analysis started at $(timestamp)"
php panini.php 09.0374 viDiliN
echo "3577 - Processing 09.0048 law analysis started at $(timestamp)"
php panini.php 09.0048 law
echo "3578 - Processing 09.0048 low analysis started at $(timestamp)"
php panini.php 09.0048 low
echo "3579 - Processing 09.0048 laN analysis started at $(timestamp)"
php panini.php 09.0048 laN
echo "3580 - Processing 09.0048 viDiliN analysis started at $(timestamp)"
php panini.php 09.0048 viDiliN
echo "3581 - Processing 04.0101 liw analysis started at $(timestamp)"
php panini.php 04.0101 liw
echo "3582 - Processing 01.0458 laN analysis started at $(timestamp)"
php panini.php 01.0458 laN
echo "3583 - Processing 01.0458 viDiliN analysis started at $(timestamp)"
php panini.php 01.0458 viDiliN
echo "3584 - Processing 01.0458 luN analysis started at $(timestamp)"
php panini.php 01.0458 luN
echo "3585 - Processing 01.0922 luw analysis started at $(timestamp)"
php panini.php 01.0922 luw
echo "3586 - Processing 01.0922 lfw analysis started at $(timestamp)"
php panini.php 01.0922 lfw
echo "3587 - Processing 01.0922 viDiliN analysis started at $(timestamp)"
php panini.php 01.0922 viDiliN
echo "3588 - Processing 01.0922 luN analysis started at $(timestamp)"
php panini.php 01.0922 luN
echo "3589 - Processing 01.0922 lfN analysis started at $(timestamp)"
php panini.php 01.0922 lfN
echo "3590 - Processing 09.0003 law analysis started at $(timestamp)"
php panini.php 09.0003 law
echo "3591 - Processing 09.0003 luw analysis started at $(timestamp)"
php panini.php 09.0003 luw
echo "3592 - Processing 09.0003 lfw analysis started at $(timestamp)"
php panini.php 09.0003 lfw
echo "3593 - Processing 09.0003 low analysis started at $(timestamp)"
php panini.php 09.0003 low
echo "3594 - Processing 09.0003 laN analysis started at $(timestamp)"
php panini.php 09.0003 laN
echo "3595 - Processing 09.0003 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0003 ASIrliN
echo "3596 - Processing 09.0003 viDiliN analysis started at $(timestamp)"
php panini.php 09.0003 viDiliN
echo "3597 - Processing 09.0003 luN analysis started at $(timestamp)"
php panini.php 09.0003 luN
echo "3598 - Processing 09.0003 lfN analysis started at $(timestamp)"
php panini.php 09.0003 lfN
echo "3599 - Processing 01.0135 lfw analysis started at $(timestamp)"
php panini.php 01.0135 lfw
echo "3600 - Processing 01.0799 viDiliN analysis started at $(timestamp)"
php panini.php 01.0799 viDiliN
echo "3601 - Processing 01.0081 law analysis started at $(timestamp)"
php panini.php 01.0081 law
echo "3602 - Processing 01.0081 liw analysis started at $(timestamp)"
php panini.php 01.0081 liw
echo "3603 - Processing 01.0081 low analysis started at $(timestamp)"
php panini.php 01.0081 low
echo "3604 - Processing 01.0081 laN analysis started at $(timestamp)"
php panini.php 01.0081 laN
echo "3605 - Processing 01.0081 viDiliN analysis started at $(timestamp)"
php panini.php 01.0081 viDiliN
echo "3606 - Processing 01.0081 luN analysis started at $(timestamp)"
php panini.php 01.0081 luN
echo "3607 - Processing 01.0101 law analysis started at $(timestamp)"
php panini.php 01.0101 law
echo "3608 - Processing 01.0101 liw analysis started at $(timestamp)"
php panini.php 01.0101 liw
echo "3609 - Processing 01.0101 low analysis started at $(timestamp)"
php panini.php 01.0101 low
echo "3610 - Processing 01.0101 laN analysis started at $(timestamp)"
php panini.php 01.0101 laN
echo "3611 - Processing 01.0101 viDiliN analysis started at $(timestamp)"
php panini.php 01.0101 viDiliN
echo "3612 - Processing 01.0101 luN analysis started at $(timestamp)"
php panini.php 01.0101 luN
echo "3613 - Processing 01.0190 law analysis started at $(timestamp)"
php panini.php 01.0190 law
echo "3614 - Processing 01.1165 liw analysis started at $(timestamp)"
php panini.php 01.1165 liw
echo "3615 - Processing 01.1165 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1165 ASIrliN
echo "3616 - Processing 01.1165 luN analysis started at $(timestamp)"
php panini.php 01.1165 luN
echo "3617 - Processing 01.0010 liw analysis started at $(timestamp)"
php panini.php 01.0010 liw
echo "3618 - Processing 01.1059 liw analysis started at $(timestamp)"
php panini.php 01.1059 liw
echo "3619 - Processing 01.0105 law analysis started at $(timestamp)"
php panini.php 01.0105 law
echo "3620 - Processing 01.0105 liw analysis started at $(timestamp)"
php panini.php 01.0105 liw
echo "3621 - Processing 01.0105 luw analysis started at $(timestamp)"
php panini.php 01.0105 luw
echo "3622 - Processing 01.0105 lfw analysis started at $(timestamp)"
php panini.php 01.0105 lfw
echo "3623 - Processing 01.0105 low analysis started at $(timestamp)"
php panini.php 01.0105 low
echo "3624 - Processing 01.0105 laN analysis started at $(timestamp)"
php panini.php 01.0105 laN
echo "3625 - Processing 01.0105 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0105 ASIrliN
echo "3626 - Processing 01.0105 viDiliN analysis started at $(timestamp)"
php panini.php 01.0105 viDiliN
echo "3627 - Processing 01.0105 luN analysis started at $(timestamp)"
php panini.php 01.0105 luN
echo "3628 - Processing 01.0105 lfN analysis started at $(timestamp)"
php panini.php 01.0105 lfN
echo "3629 - Processing 02.0074 law analysis started at $(timestamp)"
php panini.php 02.0074 law
echo "3630 - Processing 02.0074 low analysis started at $(timestamp)"
php panini.php 02.0074 low
echo "3631 - Processing 02.0074 laN analysis started at $(timestamp)"
php panini.php 02.0074 laN
echo "3632 - Processing 02.0074 luN analysis started at $(timestamp)"
php panini.php 02.0074 luN
echo "3633 - Processing 10.0433 law analysis started at $(timestamp)"
php panini.php 10.0433 law
echo "3634 - Processing 10.0433 liw analysis started at $(timestamp)"
php panini.php 10.0433 liw
echo "3635 - Processing 10.0433 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0433 ASIrliN
echo "3636 - Processing 10.0433 lfN analysis started at $(timestamp)"
php panini.php 10.0433 lfN
echo "3637 - Processing 10.0467 law analysis started at $(timestamp)"
php panini.php 10.0467 law
echo "3638 - Processing 10.0467 liw analysis started at $(timestamp)"
php panini.php 10.0467 liw
echo "3639 - Processing 10.0467 luw analysis started at $(timestamp)"
php panini.php 10.0467 luw
echo "3640 - Processing 10.0467 lfw analysis started at $(timestamp)"
php panini.php 10.0467 lfw
echo "3641 - Processing 10.0467 low analysis started at $(timestamp)"
php panini.php 10.0467 low
echo "3642 - Processing 10.0467 laN analysis started at $(timestamp)"
php panini.php 10.0467 laN
echo "3643 - Processing 10.0467 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0467 ASIrliN
echo "3644 - Processing 10.0467 viDiliN analysis started at $(timestamp)"
php panini.php 10.0467 viDiliN
echo "3645 - Processing 10.0467 luN analysis started at $(timestamp)"
php panini.php 10.0467 luN
echo "3646 - Processing 10.0467 lfN analysis started at $(timestamp)"
php panini.php 10.0467 lfN
echo "3647 - Processing 01.0187 luw analysis started at $(timestamp)"
php panini.php 01.0187 luw
echo "3648 - Processing 01.0229 liw analysis started at $(timestamp)"
php panini.php 01.0229 liw
echo "3649 - Processing 01.0229 laN analysis started at $(timestamp)"
php panini.php 01.0229 laN
echo "3650 - Processing 01.0229 viDiliN analysis started at $(timestamp)"
php panini.php 01.0229 viDiliN
echo "3651 - Processing 01.0229 luN analysis started at $(timestamp)"
php panini.php 01.0229 luN
echo "3652 - Processing 01.0229 lfN analysis started at $(timestamp)"
php panini.php 01.0229 lfN
echo "3653 - Processing 01.1142 law analysis started at $(timestamp)"
php panini.php 01.1142 law
echo "3654 - Processing 01.1142 low analysis started at $(timestamp)"
php panini.php 01.1142 low
echo "3655 - Processing 01.1142 laN analysis started at $(timestamp)"
php panini.php 01.1142 laN
echo "3656 - Processing 01.1142 viDiliN analysis started at $(timestamp)"
php panini.php 01.1142 viDiliN
echo "3657 - Processing 06.0163 law analysis started at $(timestamp)"
php panini.php 06.0163 law
echo "3658 - Processing 06.0163 low analysis started at $(timestamp)"
php panini.php 06.0163 low
echo "3659 - Processing 06.0163 viDiliN analysis started at $(timestamp)"
php panini.php 06.0163 viDiliN
echo "3660 - Processing 01.0990 law analysis started at $(timestamp)"
php panini.php 01.0990 law
echo "3661 - Processing 01.0990 low analysis started at $(timestamp)"
php panini.php 01.0990 low
echo "3662 - Processing 01.0990 viDiliN analysis started at $(timestamp)"
php panini.php 01.0990 viDiliN
echo "3663 - Processing 05.0024 viDiliN analysis started at $(timestamp)"
php panini.php 05.0024 viDiliN
echo "3664 - Processing 05.0024 luN analysis started at $(timestamp)"
php panini.php 05.0024 luN
echo "3665 - Processing 10.0429 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0429 ASIrliN
echo "3666 - Processing 04.0132 law analysis started at $(timestamp)"
php panini.php 04.0132 law
echo "3667 - Processing 04.0132 low analysis started at $(timestamp)"
php panini.php 04.0132 low
echo "3668 - Processing 04.0132 laN analysis started at $(timestamp)"
php panini.php 04.0132 laN
echo "3669 - Processing 04.0132 viDiliN analysis started at $(timestamp)"
php panini.php 04.0132 viDiliN
echo "3670 - Processing 01.0759 law analysis started at $(timestamp)"
php panini.php 01.0759 law
echo "3671 - Processing 01.0759 liw analysis started at $(timestamp)"
php panini.php 01.0759 liw
echo "3672 - Processing 01.0759 luw analysis started at $(timestamp)"
php panini.php 01.0759 luw
echo "3673 - Processing 01.0759 lfw analysis started at $(timestamp)"
php panini.php 01.0759 lfw
echo "3674 - Processing 01.0759 low analysis started at $(timestamp)"
php panini.php 01.0759 low
echo "3675 - Processing 01.0759 laN analysis started at $(timestamp)"
php panini.php 01.0759 laN
echo "3676 - Processing 01.0759 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0759 ASIrliN
echo "3677 - Processing 01.0759 viDiliN analysis started at $(timestamp)"
php panini.php 01.0759 viDiliN
echo "3678 - Processing 01.0759 luN analysis started at $(timestamp)"
php panini.php 01.0759 luN
echo "3679 - Processing 01.0759 lfN analysis started at $(timestamp)"
php panini.php 01.0759 lfN
echo "3680 - Processing 01.0257 laN analysis started at $(timestamp)"
php panini.php 01.0257 laN
echo "3681 - Processing 01.0490 law analysis started at $(timestamp)"
php panini.php 01.0490 law
echo "3682 - Processing 01.0490 liw analysis started at $(timestamp)"
php panini.php 01.0490 liw
echo "3683 - Processing 01.0490 luw analysis started at $(timestamp)"
php panini.php 01.0490 luw
echo "3684 - Processing 01.0490 lfw analysis started at $(timestamp)"
php panini.php 01.0490 lfw
echo "3685 - Processing 01.0490 low analysis started at $(timestamp)"
php panini.php 01.0490 low
echo "3686 - Processing 01.0490 laN analysis started at $(timestamp)"
php panini.php 01.0490 laN
echo "3687 - Processing 01.0490 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0490 ASIrliN
echo "3688 - Processing 01.0490 viDiliN analysis started at $(timestamp)"
php panini.php 01.0490 viDiliN
echo "3689 - Processing 01.0490 luN analysis started at $(timestamp)"
php panini.php 01.0490 luN
echo "3690 - Processing 01.0490 lfN analysis started at $(timestamp)"
php panini.php 01.0490 lfN
echo "3691 - Processing 01.0628 luN analysis started at $(timestamp)"
php panini.php 01.0628 luN
echo "3692 - Processing 02.0073 lfw analysis started at $(timestamp)"
php panini.php 02.0073 lfw
echo "3693 - Processing 04.0341 low analysis started at $(timestamp)"
php panini.php 04.0341 low
echo "3694 - Processing 01.0988 luN analysis started at $(timestamp)"
php panini.php 01.0988 luN
echo "3695 - Processing 05.0019 law analysis started at $(timestamp)"
php panini.php 05.0019 law
echo "3696 - Processing 05.0002 viDiliN analysis started at $(timestamp)"
php panini.php 05.0002 viDiliN
echo "3697 - Processing 06.0170 law analysis started at $(timestamp)"
php panini.php 06.0170 law
echo "3698 - Processing 06.0170 liw analysis started at $(timestamp)"
php panini.php 06.0170 liw
echo "3699 - Processing 06.0170 low analysis started at $(timestamp)"
php panini.php 06.0170 low
echo "3700 - Processing 06.0170 viDiliN analysis started at $(timestamp)"
php panini.php 06.0170 viDiliN
echo "3701 - Processing 06.0170 luN analysis started at $(timestamp)"
php panini.php 06.0170 luN
echo "3702 - Processing 01.0674 law analysis started at $(timestamp)"
php panini.php 01.0674 law
echo "3703 - Processing 01.0674 liw analysis started at $(timestamp)"
php panini.php 01.0674 liw
echo "3704 - Processing 01.0674 luw analysis started at $(timestamp)"
php panini.php 01.0674 luw
echo "3705 - Processing 01.0674 lfw analysis started at $(timestamp)"
php panini.php 01.0674 lfw
echo "3706 - Processing 01.0674 low analysis started at $(timestamp)"
php panini.php 01.0674 low
echo "3707 - Processing 01.0674 laN analysis started at $(timestamp)"
php panini.php 01.0674 laN
echo "3708 - Processing 01.0674 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0674 ASIrliN
echo "3709 - Processing 01.0674 viDiliN analysis started at $(timestamp)"
php panini.php 01.0674 viDiliN
echo "3710 - Processing 01.0674 luN analysis started at $(timestamp)"
php panini.php 01.0674 luN
echo "3711 - Processing 01.0674 lfN analysis started at $(timestamp)"
php panini.php 01.0674 lfN
echo "3712 - Processing 01.0498 liw analysis started at $(timestamp)"
php panini.php 01.0498 liw
echo "3713 - Processing 01.0499 law analysis started at $(timestamp)"
php panini.php 01.0499 law
echo "3714 - Processing 01.0499 liw analysis started at $(timestamp)"
php panini.php 01.0499 liw
echo "3715 - Processing 01.0499 luw analysis started at $(timestamp)"
php panini.php 01.0499 luw
echo "3716 - Processing 01.0499 lfw analysis started at $(timestamp)"
php panini.php 01.0499 lfw
echo "3717 - Processing 01.0499 low analysis started at $(timestamp)"
php panini.php 01.0499 low
echo "3718 - Processing 01.0499 laN analysis started at $(timestamp)"
php panini.php 01.0499 laN
echo "3719 - Processing 01.0499 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0499 ASIrliN
echo "3720 - Processing 01.0499 viDiliN analysis started at $(timestamp)"
php panini.php 01.0499 viDiliN
echo "3721 - Processing 01.0499 luN analysis started at $(timestamp)"
php panini.php 01.0499 luN
echo "3722 - Processing 01.0499 lfN analysis started at $(timestamp)"
php panini.php 01.0499 lfN
echo "3723 - Processing 06.0090 liw analysis started at $(timestamp)"
php panini.php 06.0090 liw
echo "3724 - Processing 01.0079 law analysis started at $(timestamp)"
php panini.php 01.0079 law
echo "3725 - Processing 01.0079 liw analysis started at $(timestamp)"
php panini.php 01.0079 liw
echo "3726 - Processing 01.0079 luw analysis started at $(timestamp)"
php panini.php 01.0079 luw
echo "3727 - Processing 01.0079 lfw analysis started at $(timestamp)"
php panini.php 01.0079 lfw
echo "3728 - Processing 01.0079 low analysis started at $(timestamp)"
php panini.php 01.0079 low
echo "3729 - Processing 01.0079 laN analysis started at $(timestamp)"
php panini.php 01.0079 laN
echo "3730 - Processing 01.0079 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0079 ASIrliN
echo "3731 - Processing 01.0079 viDiliN analysis started at $(timestamp)"
php panini.php 01.0079 viDiliN
echo "3732 - Processing 01.0079 luN analysis started at $(timestamp)"
php panini.php 01.0079 luN
echo "3733 - Processing 01.0079 lfN analysis started at $(timestamp)"
php panini.php 01.0079 lfN
echo "3734 - Processing 05.0001 viDiliN analysis started at $(timestamp)"
php panini.php 05.0001 viDiliN
echo "3735 - Processing 10.0475 law analysis started at $(timestamp)"
php panini.php 10.0475 law
echo "3736 - Processing 10.0475 liw analysis started at $(timestamp)"
php panini.php 10.0475 liw
echo "3737 - Processing 10.0475 luw analysis started at $(timestamp)"
php panini.php 10.0475 luw
echo "3738 - Processing 10.0475 lfw analysis started at $(timestamp)"
php panini.php 10.0475 lfw
echo "3739 - Processing 10.0475 low analysis started at $(timestamp)"
php panini.php 10.0475 low
echo "3740 - Processing 10.0475 laN analysis started at $(timestamp)"
php panini.php 10.0475 laN
echo "3741 - Processing 10.0475 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0475 ASIrliN
echo "3742 - Processing 10.0475 viDiliN analysis started at $(timestamp)"
php panini.php 10.0475 viDiliN
echo "3743 - Processing 10.0475 luN analysis started at $(timestamp)"
php panini.php 10.0475 luN
echo "3744 - Processing 10.0475 lfN analysis started at $(timestamp)"
php panini.php 10.0475 lfN
echo "3745 - Processing 10.0038 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0038 ASIrliN
echo "3746 - Processing 04.0024 luw analysis started at $(timestamp)"
php panini.php 04.0024 luw
echo "3747 - Processing 04.0024 lfw analysis started at $(timestamp)"
php panini.php 04.0024 lfw
echo "3748 - Processing 04.0024 luN analysis started at $(timestamp)"
php panini.php 04.0024 luN
echo "3749 - Processing 04.0024 lfN analysis started at $(timestamp)"
php panini.php 04.0024 lfN
echo "3750 - Processing 10.0242 luN analysis started at $(timestamp)"
php panini.php 10.0242 luN
echo "3751 - Processing 01.0586 liw analysis started at $(timestamp)"
php panini.php 01.0586 liw
echo "3752 - Processing 01.0586 low analysis started at $(timestamp)"
php panini.php 01.0586 low
echo "3753 - Processing 01.0586 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0586 ASIrliN
echo "3754 - Processing 01.0586 viDiliN analysis started at $(timestamp)"
php panini.php 01.0586 viDiliN
echo "3755 - Processing 01.0774 law analysis started at $(timestamp)"
php panini.php 01.0774 law
echo "3756 - Processing 01.0774 liw analysis started at $(timestamp)"
php panini.php 01.0774 liw
echo "3757 - Processing 01.0774 luw analysis started at $(timestamp)"
php panini.php 01.0774 luw
echo "3758 - Processing 01.0774 lfw analysis started at $(timestamp)"
php panini.php 01.0774 lfw
echo "3759 - Processing 01.0774 low analysis started at $(timestamp)"
php panini.php 01.0774 low
echo "3760 - Processing 01.0774 laN analysis started at $(timestamp)"
php panini.php 01.0774 laN
echo "3761 - Processing 01.0774 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0774 ASIrliN
echo "3762 - Processing 01.0774 viDiliN analysis started at $(timestamp)"
php panini.php 01.0774 viDiliN
echo "3763 - Processing 01.0774 luN analysis started at $(timestamp)"
php panini.php 01.0774 luN
echo "3764 - Processing 01.0774 lfN analysis started at $(timestamp)"
php panini.php 01.0774 lfN
echo "3765 - Processing 03.0018 law analysis started at $(timestamp)"
php panini.php 03.0018 law
echo "3766 - Processing 03.0018 low analysis started at $(timestamp)"
php panini.php 03.0018 low
echo "3767 - Processing 03.0018 laN analysis started at $(timestamp)"
php panini.php 03.0018 laN
echo "3768 - Processing 03.0018 viDiliN analysis started at $(timestamp)"
php panini.php 03.0018 viDiliN
echo "3769 - Processing 04.0075 lfw analysis started at $(timestamp)"
php panini.php 04.0075 lfw
echo "3770 - Processing 04.0075 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0075 ASIrliN
echo "3771 - Processing 04.0075 luN analysis started at $(timestamp)"
php panini.php 04.0075 luN
echo "3772 - Processing 04.0075 lfN analysis started at $(timestamp)"
php panini.php 04.0075 lfN
echo "3773 - Processing 06.0150 lfw analysis started at $(timestamp)"
php panini.php 06.0150 lfw
echo "3774 - Processing 06.0150 lfN analysis started at $(timestamp)"
php panini.php 06.0150 lfN
echo "3775 - Processing 01.0086 liw analysis started at $(timestamp)"
php panini.php 01.0086 liw
echo "3776 - Processing 01.1063 law analysis started at $(timestamp)"
php panini.php 01.1063 law
echo "3777 - Processing 01.1063 low analysis started at $(timestamp)"
php panini.php 01.1063 low
echo "3778 - Processing 01.1063 laN analysis started at $(timestamp)"
php panini.php 01.1063 laN
echo "3779 - Processing 01.1063 viDiliN analysis started at $(timestamp)"
php panini.php 01.1063 viDiliN
echo "3780 - Processing 04.0042 low analysis started at $(timestamp)"
php panini.php 04.0042 low
echo "3781 - Processing 04.0042 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0042 ASIrliN
echo "3782 - Processing 04.0042 viDiliN analysis started at $(timestamp)"
php panini.php 04.0042 viDiliN
echo "3783 - Processing 04.0042 luN analysis started at $(timestamp)"
php panini.php 04.0042 luN
echo "3784 - Processing 01.1134 luw analysis started at $(timestamp)"
php panini.php 01.1134 luw
echo "3785 - Processing 01.1134 luN analysis started at $(timestamp)"
php panini.php 01.1134 luN
echo "3786 - Processing 09.0009 law analysis started at $(timestamp)"
php panini.php 09.0009 law
echo "3787 - Processing 09.0009 liw analysis started at $(timestamp)"
php panini.php 09.0009 liw
echo "3788 - Processing 09.0009 luw analysis started at $(timestamp)"
php panini.php 09.0009 luw
echo "3789 - Processing 09.0009 lfw analysis started at $(timestamp)"
php panini.php 09.0009 lfw
echo "3790 - Processing 09.0009 low analysis started at $(timestamp)"
php panini.php 09.0009 low
echo "3791 - Processing 09.0009 laN analysis started at $(timestamp)"
php panini.php 09.0009 laN
echo "3792 - Processing 09.0009 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0009 ASIrliN
echo "3793 - Processing 09.0009 viDiliN analysis started at $(timestamp)"
php panini.php 09.0009 viDiliN
echo "3794 - Processing 09.0009 luN analysis started at $(timestamp)"
php panini.php 09.0009 luN
echo "3795 - Processing 09.0009 lfN analysis started at $(timestamp)"
php panini.php 09.0009 lfN
echo "3796 - Processing 09.0006 law analysis started at $(timestamp)"
php panini.php 09.0006 law
echo "3797 - Processing 09.0006 liw analysis started at $(timestamp)"
php panini.php 09.0006 liw
echo "3798 - Processing 09.0006 lfw analysis started at $(timestamp)"
php panini.php 09.0006 lfw
echo "3799 - Processing 09.0006 low analysis started at $(timestamp)"
php panini.php 09.0006 low
echo "3800 - Processing 09.0006 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0006 ASIrliN
echo "3801 - Processing 09.0006 lfN analysis started at $(timestamp)"
php panini.php 09.0006 lfN
echo "3802 - Processing 01.0009 liw analysis started at $(timestamp)"
php panini.php 01.0009 liw
echo "3803 - Processing 01.0009 laN analysis started at $(timestamp)"
php panini.php 01.0009 laN
echo "3804 - Processing 09.0010 law analysis started at $(timestamp)"
php panini.php 09.0010 law
echo "3805 - Processing 09.0010 liw analysis started at $(timestamp)"
php panini.php 09.0010 liw
echo "3806 - Processing 09.0010 luw analysis started at $(timestamp)"
php panini.php 09.0010 luw
echo "3807 - Processing 09.0010 lfw analysis started at $(timestamp)"
php panini.php 09.0010 lfw
echo "3808 - Processing 09.0010 low analysis started at $(timestamp)"
php panini.php 09.0010 low
echo "3809 - Processing 09.0010 laN analysis started at $(timestamp)"
php panini.php 09.0010 laN
echo "3810 - Processing 09.0010 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0010 ASIrliN
echo "3811 - Processing 09.0010 viDiliN analysis started at $(timestamp)"
php panini.php 09.0010 viDiliN
echo "3812 - Processing 09.0010 luN analysis started at $(timestamp)"
php panini.php 09.0010 luN
echo "3813 - Processing 09.0010 lfN analysis started at $(timestamp)"
php panini.php 09.0010 lfN
echo "3814 - Processing 01.0891 low analysis started at $(timestamp)"
php panini.php 01.0891 low
echo "3815 - Processing 01.0891 luN analysis started at $(timestamp)"
php panini.php 01.0891 luN
echo "3816 - Processing 09.0007 law analysis started at $(timestamp)"
php panini.php 09.0007 law
echo "3817 - Processing 09.0007 liw analysis started at $(timestamp)"
php panini.php 09.0007 liw
echo "3818 - Processing 09.0007 luw analysis started at $(timestamp)"
php panini.php 09.0007 luw
echo "3819 - Processing 09.0007 lfw analysis started at $(timestamp)"
php panini.php 09.0007 lfw
echo "3820 - Processing 09.0007 low analysis started at $(timestamp)"
php panini.php 09.0007 low
echo "3821 - Processing 09.0007 laN analysis started at $(timestamp)"
php panini.php 09.0007 laN
echo "3822 - Processing 09.0007 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0007 ASIrliN
echo "3823 - Processing 09.0007 viDiliN analysis started at $(timestamp)"
php panini.php 09.0007 viDiliN
echo "3824 - Processing 09.0007 luN analysis started at $(timestamp)"
php panini.php 09.0007 luN
echo "3825 - Processing 09.0007 lfN analysis started at $(timestamp)"
php panini.php 09.0007 lfN
echo "3826 - Processing 01.0970 law analysis started at $(timestamp)"
php panini.php 01.0970 law
echo "3827 - Processing 01.0970 liw analysis started at $(timestamp)"
php panini.php 01.0970 liw
echo "3828 - Processing 01.0970 luw analysis started at $(timestamp)"
php panini.php 01.0970 luw
echo "3829 - Processing 01.0970 lfw analysis started at $(timestamp)"
php panini.php 01.0970 lfw
echo "3830 - Processing 01.0970 low analysis started at $(timestamp)"
php panini.php 01.0970 low
echo "3831 - Processing 01.0970 laN analysis started at $(timestamp)"
php panini.php 01.0970 laN
echo "3832 - Processing 01.0970 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0970 ASIrliN
echo "3833 - Processing 01.0970 viDiliN analysis started at $(timestamp)"
php panini.php 01.0970 viDiliN
echo "3834 - Processing 01.0970 luN analysis started at $(timestamp)"
php panini.php 01.0970 luN
echo "3835 - Processing 01.0970 lfN analysis started at $(timestamp)"
php panini.php 01.0970 lfN
echo "3836 - Processing 05.0021 luN analysis started at $(timestamp)"
php panini.php 05.0021 luN
echo "3837 - Processing 01.0422 laN analysis started at $(timestamp)"
php panini.php 01.0422 laN
echo "3838 - Processing 04.0019 liw analysis started at $(timestamp)"
php panini.php 04.0019 liw
echo "3839 - Processing 04.0019 low analysis started at $(timestamp)"
php panini.php 04.0019 low
echo "3840 - Processing 04.0019 lfN analysis started at $(timestamp)"
php panini.php 04.0019 lfN
echo "3841 - Processing 02.0038 liw analysis started at $(timestamp)"
php panini.php 02.0038 liw
echo "3842 - Processing 02.0038 luN analysis started at $(timestamp)"
php panini.php 02.0038 luN
echo "3843 - Processing 01.0199 low analysis started at $(timestamp)"
php panini.php 01.0199 low
echo "3844 - Processing 04.0190 law analysis started at $(timestamp)"
php panini.php 04.0190 law
echo "3845 - Processing 04.0190 liw analysis started at $(timestamp)"
php panini.php 04.0190 liw
echo "3846 - Processing 04.0190 luw analysis started at $(timestamp)"
php panini.php 04.0190 luw
echo "3847 - Processing 04.0190 lfw analysis started at $(timestamp)"
php panini.php 04.0190 lfw
echo "3848 - Processing 04.0190 low analysis started at $(timestamp)"
php panini.php 04.0190 low
echo "3849 - Processing 04.0190 laN analysis started at $(timestamp)"
php panini.php 04.0190 laN
echo "3850 - Processing 04.0190 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0190 ASIrliN
echo "3851 - Processing 04.0190 viDiliN analysis started at $(timestamp)"
php panini.php 04.0190 viDiliN
echo "3852 - Processing 04.0190 luN analysis started at $(timestamp)"
php panini.php 04.0190 luN
echo "3853 - Processing 04.0190 lfN analysis started at $(timestamp)"
php panini.php 04.0190 lfN
echo "3854 - Processing 01.0460 laN analysis started at $(timestamp)"
php panini.php 01.0460 laN
echo "3855 - Processing 09.0008 law analysis started at $(timestamp)"
php panini.php 09.0008 law
echo "3856 - Processing 09.0008 liw analysis started at $(timestamp)"
php panini.php 09.0008 liw
echo "3857 - Processing 09.0008 luw analysis started at $(timestamp)"
php panini.php 09.0008 luw
echo "3858 - Processing 09.0008 lfw analysis started at $(timestamp)"
php panini.php 09.0008 lfw
echo "3859 - Processing 09.0008 low analysis started at $(timestamp)"
php panini.php 09.0008 low
echo "3860 - Processing 09.0008 laN analysis started at $(timestamp)"
php panini.php 09.0008 laN
echo "3861 - Processing 09.0008 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0008 ASIrliN
echo "3862 - Processing 09.0008 viDiliN analysis started at $(timestamp)"
php panini.php 09.0008 viDiliN
echo "3863 - Processing 09.0008 luN analysis started at $(timestamp)"
php panini.php 09.0008 luN
echo "3864 - Processing 09.0008 lfN analysis started at $(timestamp)"
php panini.php 09.0008 lfN
echo "3865 - Processing 04.0191 law analysis started at $(timestamp)"
php panini.php 04.0191 law
echo "3866 - Processing 04.0191 liw analysis started at $(timestamp)"
php panini.php 04.0191 liw
echo "3867 - Processing 04.0191 luw analysis started at $(timestamp)"
php panini.php 04.0191 luw
echo "3868 - Processing 04.0191 lfw analysis started at $(timestamp)"
php panini.php 04.0191 lfw
echo "3869 - Processing 04.0191 low analysis started at $(timestamp)"
php panini.php 04.0191 low
echo "3870 - Processing 04.0191 laN analysis started at $(timestamp)"
php panini.php 04.0191 laN
echo "3871 - Processing 04.0191 viDiliN analysis started at $(timestamp)"
php panini.php 04.0191 viDiliN
echo "3872 - Processing 04.0191 luN analysis started at $(timestamp)"
php panini.php 04.0191 luN
echo "3873 - Processing 04.0191 lfN analysis started at $(timestamp)"
php panini.php 04.0191 lfN
echo "3874 - Processing 05.0006 law analysis started at $(timestamp)"
php panini.php 05.0006 law
echo "3875 - Processing 05.0006 low analysis started at $(timestamp)"
php panini.php 05.0006 low
echo "3876 - Processing 05.0006 ASIrliN analysis started at $(timestamp)"
php panini.php 05.0006 ASIrliN
echo "3877 - Processing 05.0006 viDiliN analysis started at $(timestamp)"
php panini.php 05.0006 viDiliN
echo "3878 - Processing 05.0006 luN analysis started at $(timestamp)"
php panini.php 05.0006 luN
echo "3879 - Processing 06.0076 lfw analysis started at $(timestamp)"
php panini.php 06.0076 lfw
echo "3880 - Processing 06.0076 luN analysis started at $(timestamp)"
php panini.php 06.0076 luN
echo "3881 - Processing 06.0076 lfN analysis started at $(timestamp)"
php panini.php 06.0076 lfN
echo "3882 - Processing 09.0017 law analysis started at $(timestamp)"
php panini.php 09.0017 law
echo "3883 - Processing 09.0017 liw analysis started at $(timestamp)"
php panini.php 09.0017 liw
echo "3884 - Processing 09.0017 luw analysis started at $(timestamp)"
php panini.php 09.0017 luw
echo "3885 - Processing 09.0017 low analysis started at $(timestamp)"
php panini.php 09.0017 low
echo "3886 - Processing 09.0017 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0017 ASIrliN
echo "3887 - Processing 09.0017 luN analysis started at $(timestamp)"
php panini.php 09.0017 luN
echo "3888 - Processing 01.0423 liw analysis started at $(timestamp)"
php panini.php 01.0423 liw
echo "3889 - Processing 01.0423 laN analysis started at $(timestamp)"
php panini.php 01.0423 laN
echo "3890 - Processing 01.1058 liw analysis started at $(timestamp)"
php panini.php 01.1058 liw
echo "3891 - Processing 01.0749 law analysis started at $(timestamp)"
php panini.php 01.0749 law
echo "3892 - Processing 01.0749 liw analysis started at $(timestamp)"
php panini.php 01.0749 liw
echo "3893 - Processing 01.0749 luw analysis started at $(timestamp)"
php panini.php 01.0749 luw
echo "3894 - Processing 01.0749 lfw analysis started at $(timestamp)"
php panini.php 01.0749 lfw
echo "3895 - Processing 01.0749 low analysis started at $(timestamp)"
php panini.php 01.0749 low
echo "3896 - Processing 01.0749 laN analysis started at $(timestamp)"
php panini.php 01.0749 laN
echo "3897 - Processing 01.0749 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0749 ASIrliN
echo "3898 - Processing 01.0749 viDiliN analysis started at $(timestamp)"
php panini.php 01.0749 viDiliN
echo "3899 - Processing 01.0749 luN analysis started at $(timestamp)"
php panini.php 01.0749 luN
echo "3900 - Processing 01.0749 lfN analysis started at $(timestamp)"
php panini.php 01.0749 lfN
echo "3901 - Processing 01.0899 law analysis started at $(timestamp)"
php panini.php 01.0899 law
echo "3902 - Processing 01.0899 liw analysis started at $(timestamp)"
php panini.php 01.0899 liw
echo "3903 - Processing 01.0899 luw analysis started at $(timestamp)"
php panini.php 01.0899 luw
echo "3904 - Processing 01.0899 lfw analysis started at $(timestamp)"
php panini.php 01.0899 lfw
echo "3905 - Processing 01.0899 low analysis started at $(timestamp)"
php panini.php 01.0899 low
echo "3906 - Processing 01.0899 laN analysis started at $(timestamp)"
php panini.php 01.0899 laN
echo "3907 - Processing 01.0899 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0899 ASIrliN
echo "3908 - Processing 01.0899 viDiliN analysis started at $(timestamp)"
php panini.php 01.0899 viDiliN
echo "3909 - Processing 01.0899 luN analysis started at $(timestamp)"
php panini.php 01.0899 luN
echo "3910 - Processing 01.0899 lfN analysis started at $(timestamp)"
php panini.php 01.0899 lfN
echo "3911 - Processing 01.1077 law analysis started at $(timestamp)"
php panini.php 01.1077 law
echo "3912 - Processing 01.1077 low analysis started at $(timestamp)"
php panini.php 01.1077 low
echo "3913 - Processing 01.1077 laN analysis started at $(timestamp)"
php panini.php 01.1077 laN
echo "3914 - Processing 01.1077 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1077 ASIrliN
echo "3915 - Processing 01.1077 viDiliN analysis started at $(timestamp)"
php panini.php 01.1077 viDiliN
echo "3916 - Processing 01.1077 luN analysis started at $(timestamp)"
php panini.php 01.1077 luN
echo "3917 - Processing 06.0118 luN analysis started at $(timestamp)"
php panini.php 06.0118 luN
echo "3918 - Processing 06.0118 lfN analysis started at $(timestamp)"
php panini.php 06.0118 lfN
echo "3919 - Processing 02.0033 liw analysis started at $(timestamp)"
php panini.php 02.0033 liw
echo "3920 - Processing 04.0005 liw analysis started at $(timestamp)"
php panini.php 04.0005 liw
echo "3921 - Processing 04.0005 lfN analysis started at $(timestamp)"
php panini.php 04.0005 lfN
echo "3922 - Processing 04.0096 liw analysis started at $(timestamp)"
php panini.php 04.0096 liw
echo "3923 - Processing 01.1032 luN analysis started at $(timestamp)"
php panini.php 01.1032 luN
echo "3924 - Processing 05.0014 law analysis started at $(timestamp)"
php panini.php 05.0014 law
echo "3925 - Processing 05.0014 liw analysis started at $(timestamp)"
php panini.php 05.0014 liw
echo "3926 - Processing 05.0014 luw analysis started at $(timestamp)"
php panini.php 05.0014 luw
echo "3927 - Processing 05.0014 lfw analysis started at $(timestamp)"
php panini.php 05.0014 lfw
echo "3928 - Processing 05.0014 low analysis started at $(timestamp)"
php panini.php 05.0014 low
echo "3929 - Processing 05.0014 laN analysis started at $(timestamp)"
php panini.php 05.0014 laN
echo "3930 - Processing 05.0014 ASIrliN analysis started at $(timestamp)"
php panini.php 05.0014 ASIrliN
echo "3931 - Processing 05.0014 viDiliN analysis started at $(timestamp)"
php panini.php 05.0014 viDiliN
echo "3932 - Processing 05.0014 luN analysis started at $(timestamp)"
php panini.php 05.0014 luN
echo "3933 - Processing 05.0014 lfN analysis started at $(timestamp)"
php panini.php 05.0014 lfN
echo "3934 - Processing 06.0158 lfw analysis started at $(timestamp)"
php panini.php 06.0158 lfw
echo "3935 - Processing 06.0158 luN analysis started at $(timestamp)"
php panini.php 06.0158 luN
echo "3936 - Processing 06.0158 lfN analysis started at $(timestamp)"
php panini.php 06.0158 lfN
echo "3937 - Processing 10.0410 law analysis started at $(timestamp)"
php panini.php 10.0410 law
echo "3938 - Processing 10.0410 liw analysis started at $(timestamp)"
php panini.php 10.0410 liw
echo "3939 - Processing 10.0410 luw analysis started at $(timestamp)"
php panini.php 10.0410 luw
echo "3940 - Processing 10.0410 lfw analysis started at $(timestamp)"
php panini.php 10.0410 lfw
echo "3941 - Processing 10.0410 low analysis started at $(timestamp)"
php panini.php 10.0410 low
echo "3942 - Processing 10.0410 laN analysis started at $(timestamp)"
php panini.php 10.0410 laN
echo "3943 - Processing 10.0410 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0410 ASIrliN
echo "3944 - Processing 10.0410 viDiliN analysis started at $(timestamp)"
php panini.php 10.0410 viDiliN
echo "3945 - Processing 10.0410 lfN analysis started at $(timestamp)"
php panini.php 10.0410 lfN
echo "3946 - Processing 06.0123 law analysis started at $(timestamp)"
php panini.php 06.0123 law
echo "3947 - Processing 06.0123 liw analysis started at $(timestamp)"
php panini.php 06.0123 liw
echo "3948 - Processing 06.0123 luw analysis started at $(timestamp)"
php panini.php 06.0123 luw
echo "3949 - Processing 06.0123 lfw analysis started at $(timestamp)"
php panini.php 06.0123 lfw
echo "3950 - Processing 06.0123 low analysis started at $(timestamp)"
php panini.php 06.0123 low
echo "3951 - Processing 06.0123 laN analysis started at $(timestamp)"
php panini.php 06.0123 laN
echo "3952 - Processing 06.0123 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0123 ASIrliN
echo "3953 - Processing 06.0123 viDiliN analysis started at $(timestamp)"
php panini.php 06.0123 viDiliN
echo "3954 - Processing 06.0123 luN analysis started at $(timestamp)"
php panini.php 06.0123 luN
echo "3955 - Processing 06.0123 lfN analysis started at $(timestamp)"
php panini.php 06.0123 lfN
echo "3956 - Processing 06.0124 law analysis started at $(timestamp)"
php panini.php 06.0124 law
echo "3957 - Processing 06.0124 liw analysis started at $(timestamp)"
php panini.php 06.0124 liw
echo "3958 - Processing 06.0124 luw analysis started at $(timestamp)"
php panini.php 06.0124 luw
echo "3959 - Processing 06.0124 lfw analysis started at $(timestamp)"
php panini.php 06.0124 lfw
echo "3960 - Processing 06.0124 low analysis started at $(timestamp)"
php panini.php 06.0124 low
echo "3961 - Processing 06.0124 laN analysis started at $(timestamp)"
php panini.php 06.0124 laN
echo "3962 - Processing 06.0124 viDiliN analysis started at $(timestamp)"
php panini.php 06.0124 viDiliN
echo "3963 - Processing 10.0129 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0129 ASIrliN
echo "3964 - Processing 10.0056 liw analysis started at $(timestamp)"
php panini.php 10.0056 liw
echo "3965 - Processing 10.0056 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0056 ASIrliN
echo "3966 - Processing 01.0293 liw analysis started at $(timestamp)"
php panini.php 01.0293 liw
echo "3967 - Processing 06.0125 liw analysis started at $(timestamp)"
php panini.php 06.0125 liw
echo "3968 - Processing 06.0125 luN analysis started at $(timestamp)"
php panini.php 06.0125 luN
echo "3969 - Processing 01.0380 liw analysis started at $(timestamp)"
php panini.php 01.0380 liw
echo "3970 - Processing 01.0380 low analysis started at $(timestamp)"
php panini.php 01.0380 low
echo "3971 - Processing 01.0380 luN analysis started at $(timestamp)"
php panini.php 01.0380 luN
echo "3972 - Processing 01.0311 law analysis started at $(timestamp)"
php panini.php 01.0311 law
echo "3973 - Processing 01.0311 liw analysis started at $(timestamp)"
php panini.php 01.0311 liw
echo "3974 - Processing 01.0311 low analysis started at $(timestamp)"
php panini.php 01.0311 low
echo "3975 - Processing 01.0311 laN analysis started at $(timestamp)"
php panini.php 01.0311 laN
echo "3976 - Processing 01.0311 viDiliN analysis started at $(timestamp)"
php panini.php 01.0311 viDiliN
echo "3977 - Processing 01.0311 luN analysis started at $(timestamp)"
php panini.php 01.0311 luN
echo "3978 - Processing 06.0121 liw analysis started at $(timestamp)"
php panini.php 06.0121 liw
echo "3979 - Processing 06.0121 luN analysis started at $(timestamp)"
php panini.php 06.0121 luN
echo "3980 - Processing 01.0241 law analysis started at $(timestamp)"
php panini.php 01.0241 law
echo "3981 - Processing 01.0241 liw analysis started at $(timestamp)"
php panini.php 01.0241 liw
echo "3982 - Processing 01.0241 luw analysis started at $(timestamp)"
php panini.php 01.0241 luw
echo "3983 - Processing 01.0241 lfw analysis started at $(timestamp)"
php panini.php 01.0241 lfw
echo "3984 - Processing 01.0241 low analysis started at $(timestamp)"
php panini.php 01.0241 low
echo "3985 - Processing 01.0241 laN analysis started at $(timestamp)"
php panini.php 01.0241 laN
echo "3986 - Processing 01.0241 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0241 ASIrliN
echo "3987 - Processing 01.0241 viDiliN analysis started at $(timestamp)"
php panini.php 01.0241 viDiliN
echo "3988 - Processing 01.0241 luN analysis started at $(timestamp)"
php panini.php 01.0241 luN
echo "3989 - Processing 01.0241 lfN analysis started at $(timestamp)"
php panini.php 01.0241 lfN
echo "3990 - Processing 06.0122 luw analysis started at $(timestamp)"
php panini.php 06.0122 luw
echo "3991 - Processing 06.0122 luN analysis started at $(timestamp)"
php panini.php 06.0122 luN
echo "3992 - Processing 01.0268 liw analysis started at $(timestamp)"
php panini.php 01.0268 liw
echo "3993 - Processing 01.0597 law analysis started at $(timestamp)"
php panini.php 01.0597 law
echo "3994 - Processing 01.0597 liw analysis started at $(timestamp)"
php panini.php 01.0597 liw
echo "3995 - Processing 01.0597 luw analysis started at $(timestamp)"
php panini.php 01.0597 luw
echo "3996 - Processing 01.0597 lfw analysis started at $(timestamp)"
php panini.php 01.0597 lfw
echo "3997 - Processing 01.0597 low analysis started at $(timestamp)"
php panini.php 01.0597 low
echo "3998 - Processing 01.0597 laN analysis started at $(timestamp)"
php panini.php 01.0597 laN
echo "3999 - Processing 01.0597 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0597 ASIrliN
echo "4000 - Processing 01.0597 viDiliN analysis started at $(timestamp)"
php panini.php 01.0597 viDiliN
echo "4001 - Processing 01.0597 luN analysis started at $(timestamp)"
php panini.php 01.0597 luN
echo "4002 - Processing 01.0597 lfN analysis started at $(timestamp)"
php panini.php 01.0597 lfN
echo "4003 - Processing 05.0015 law analysis started at $(timestamp)"
php panini.php 05.0015 law
echo "4004 - Processing 01.0919 luN analysis started at $(timestamp)"
php panini.php 01.0919 luN
echo "4005 - Processing 01.0088 luN analysis started at $(timestamp)"
php panini.php 01.0088 luN
echo "4006 - Processing 01.0459 luN analysis started at $(timestamp)"
php panini.php 01.0459 luN
echo "4007 - Processing 01.0861 luN analysis started at $(timestamp)"
php panini.php 01.0861 luN
echo "4008 - Processing 01.1090 law analysis started at $(timestamp)"
php panini.php 01.1090 law
echo "4009 - Processing 01.1090 lfw analysis started at $(timestamp)"
php panini.php 01.1090 lfw
echo "4010 - Processing 01.1090 lfN analysis started at $(timestamp)"
php panini.php 01.1090 lfN
echo "4011 - Processing 01.0087 liw analysis started at $(timestamp)"
php panini.php 01.0087 liw
echo "4012 - Processing 01.0087 viDiliN analysis started at $(timestamp)"
php panini.php 01.0087 viDiliN
echo "4013 - Processing 01.1068 law analysis started at $(timestamp)"
php panini.php 01.1068 law
echo "4014 - Processing 01.1068 liw analysis started at $(timestamp)"
php panini.php 01.1068 liw
echo "4015 - Processing 01.1068 luw analysis started at $(timestamp)"
php panini.php 01.1068 luw
echo "4016 - Processing 01.1068 lfw analysis started at $(timestamp)"
php panini.php 01.1068 lfw
echo "4017 - Processing 01.1068 low analysis started at $(timestamp)"
php panini.php 01.1068 low
echo "4018 - Processing 01.1068 laN analysis started at $(timestamp)"
php panini.php 01.1068 laN
echo "4019 - Processing 01.1068 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1068 ASIrliN
echo "4020 - Processing 01.1068 viDiliN analysis started at $(timestamp)"
php panini.php 01.1068 viDiliN
echo "4021 - Processing 01.1068 luN analysis started at $(timestamp)"
php panini.php 01.1068 luN
echo "4022 - Processing 01.1068 lfN analysis started at $(timestamp)"
php panini.php 01.1068 lfN
echo "4023 - Processing 01.0082 law analysis started at $(timestamp)"
php panini.php 01.0082 law
echo "4024 - Processing 01.0082 liw analysis started at $(timestamp)"
php panini.php 01.0082 liw
echo "4025 - Processing 01.0082 luw analysis started at $(timestamp)"
php panini.php 01.0082 luw
echo "4026 - Processing 01.0082 lfw analysis started at $(timestamp)"
php panini.php 01.0082 lfw
echo "4027 - Processing 01.0082 low analysis started at $(timestamp)"
php panini.php 01.0082 low
echo "4028 - Processing 01.0082 laN analysis started at $(timestamp)"
php panini.php 01.0082 laN
echo "4029 - Processing 01.0082 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0082 ASIrliN
echo "4030 - Processing 01.0082 viDiliN analysis started at $(timestamp)"
php panini.php 01.0082 viDiliN
echo "4031 - Processing 01.0082 luN analysis started at $(timestamp)"
php panini.php 01.0082 luN
echo "4032 - Processing 01.0082 lfN analysis started at $(timestamp)"
php panini.php 01.0082 lfN
echo "4033 - Processing 01.0114 law analysis started at $(timestamp)"
php panini.php 01.0114 law
echo "4034 - Processing 01.0114 liw analysis started at $(timestamp)"
php panini.php 01.0114 liw
echo "4035 - Processing 01.0114 luw analysis started at $(timestamp)"
php panini.php 01.0114 luw
echo "4036 - Processing 01.0114 lfw analysis started at $(timestamp)"
php panini.php 01.0114 lfw
echo "4037 - Processing 01.0114 low analysis started at $(timestamp)"
php panini.php 01.0114 low
echo "4038 - Processing 01.0114 laN analysis started at $(timestamp)"
php panini.php 01.0114 laN
echo "4039 - Processing 01.0114 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0114 ASIrliN
echo "4040 - Processing 01.0114 viDiliN analysis started at $(timestamp)"
php panini.php 01.0114 viDiliN
echo "4041 - Processing 01.0114 luN analysis started at $(timestamp)"
php panini.php 01.0114 luN
echo "4042 - Processing 01.0114 lfN analysis started at $(timestamp)"
php panini.php 01.0114 lfN
echo "4043 - Processing 01.1131 law analysis started at $(timestamp)"
php panini.php 01.1131 law
echo "4044 - Processing 01.1131 liw analysis started at $(timestamp)"
php panini.php 01.1131 liw
echo "4045 - Processing 01.1131 low analysis started at $(timestamp)"
php panini.php 01.1131 low
echo "4046 - Processing 01.1131 laN analysis started at $(timestamp)"
php panini.php 01.1131 laN
echo "4047 - Processing 01.1131 viDiliN analysis started at $(timestamp)"
php panini.php 01.1131 viDiliN
echo "4048 - Processing 01.0018 luN analysis started at $(timestamp)"
php panini.php 01.0018 luN
echo "4049 - Processing 02.0063 luN analysis started at $(timestamp)"
php panini.php 02.0063 luN
echo "4050 - Processing 10.0116 law analysis started at $(timestamp)"
php panini.php 10.0116 law
echo "4051 - Processing 10.0116 liw analysis started at $(timestamp)"
php panini.php 10.0116 liw
echo "4052 - Processing 10.0116 luw analysis started at $(timestamp)"
php panini.php 10.0116 luw
echo "4053 - Processing 10.0116 lfw analysis started at $(timestamp)"
php panini.php 10.0116 lfw
echo "4054 - Processing 10.0116 low analysis started at $(timestamp)"
php panini.php 10.0116 low
echo "4055 - Processing 10.0116 laN analysis started at $(timestamp)"
php panini.php 10.0116 laN
echo "4056 - Processing 10.0116 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0116 ASIrliN
echo "4057 - Processing 10.0116 viDiliN analysis started at $(timestamp)"
php panini.php 10.0116 viDiliN
echo "4058 - Processing 10.0116 luN analysis started at $(timestamp)"
php panini.php 10.0116 luN
echo "4059 - Processing 10.0116 lfN analysis started at $(timestamp)"
php panini.php 10.0116 lfN
echo "4060 - Processing 10.0337 luN analysis started at $(timestamp)"
php panini.php 10.0337 luN
echo "4061 - Processing 04.0085 lfN analysis started at $(timestamp)"
php panini.php 04.0085 lfN
echo "4062 - Processing 01.0845 luN analysis started at $(timestamp)"
php panini.php 01.0845 luN
echo "4063 - Processing 01.1081 liw analysis started at $(timestamp)"
php panini.php 01.1081 liw
echo "4064 - Processing 01.1081 lfw analysis started at $(timestamp)"
php panini.php 01.1081 lfw
echo "4065 - Processing 01.1081 lfN analysis started at $(timestamp)"
php panini.php 01.1081 lfN
echo "4066 - Processing 01.0349 laN analysis started at $(timestamp)"
php panini.php 01.0349 laN
echo "4067 - Processing 02.0002 low analysis started at $(timestamp)"
php panini.php 02.0002 low
echo "4068 - Processing 01.0538 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0538 ASIrliN
echo "4069 - Processing 01.0592 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0592 ASIrliN
echo "4070 - Processing 10.0206 law analysis started at $(timestamp)"
php panini.php 10.0206 law
echo "4071 - Processing 10.0206 liw analysis started at $(timestamp)"
php panini.php 10.0206 liw
echo "4072 - Processing 10.0206 luw analysis started at $(timestamp)"
php panini.php 10.0206 luw
echo "4073 - Processing 10.0206 lfw analysis started at $(timestamp)"
php panini.php 10.0206 lfw
echo "4074 - Processing 10.0206 low analysis started at $(timestamp)"
php panini.php 10.0206 low
echo "4075 - Processing 10.0206 laN analysis started at $(timestamp)"
php panini.php 10.0206 laN
echo "4076 - Processing 10.0206 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0206 ASIrliN
echo "4077 - Processing 10.0206 viDiliN analysis started at $(timestamp)"
php panini.php 10.0206 viDiliN
echo "4078 - Processing 10.0206 luN analysis started at $(timestamp)"
php panini.php 10.0206 luN
echo "4079 - Processing 10.0206 lfN analysis started at $(timestamp)"
php panini.php 10.0206 lfN
echo "4080 - Processing 03.0008 law analysis started at $(timestamp)"
php panini.php 03.0008 law
echo "4081 - Processing 03.0008 low analysis started at $(timestamp)"
php panini.php 03.0008 low
echo "4082 - Processing 03.0008 laN analysis started at $(timestamp)"
php panini.php 03.0008 laN
echo "4083 - Processing 03.0008 viDiliN analysis started at $(timestamp)"
php panini.php 03.0008 viDiliN
echo "4084 - Processing 03.0009 law analysis started at $(timestamp)"
php panini.php 03.0009 law
echo "4085 - Processing 03.0009 low analysis started at $(timestamp)"
php panini.php 03.0009 low
echo "4086 - Processing 03.0009 laN analysis started at $(timestamp)"
php panini.php 03.0009 laN
echo "4087 - Processing 03.0009 ASIrliN analysis started at $(timestamp)"
php panini.php 03.0009 ASIrliN
echo "4088 - Processing 03.0009 viDiliN analysis started at $(timestamp)"
php panini.php 03.0009 viDiliN
echo "4089 - Processing 07.0366 laN analysis started at $(timestamp)"
php panini.php 07.0366 laN
echo "4090 - Processing 01.0997 liw analysis started at $(timestamp)"
php panini.php 01.0997 liw
echo "4091 - Processing 01.0301 viDiliN analysis started at $(timestamp)"
php panini.php 01.0301 viDiliN
echo "4092 - Processing 01.0675 liw analysis started at $(timestamp)"
php panini.php 01.0675 liw
echo "4093 - Processing 10.0208 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0208 ASIrliN
echo "4094 - Processing 03.0001 liw analysis started at $(timestamp)"
php panini.php 03.0001 liw
echo "4095 - Processing 03.0001 laN analysis started at $(timestamp)"
php panini.php 03.0001 laN
echo "4096 - Processing 06.0130 law analysis started at $(timestamp)"
php panini.php 06.0130 law
echo "4097 - Processing 06.0130 low analysis started at $(timestamp)"
php panini.php 06.0130 low
echo "4098 - Processing 06.0130 laN analysis started at $(timestamp)"
php panini.php 06.0130 laN
echo "4099 - Processing 06.0130 viDiliN analysis started at $(timestamp)"
php panini.php 06.0130 viDiliN
echo "4100 - Processing 01.0239 law analysis started at $(timestamp)"
php panini.php 01.0239 law
echo "4101 - Processing 01.0239 liw analysis started at $(timestamp)"
php panini.php 01.0239 liw
echo "4102 - Processing 01.0239 luw analysis started at $(timestamp)"
php panini.php 01.0239 luw
echo "4103 - Processing 01.0239 lfw analysis started at $(timestamp)"
php panini.php 01.0239 lfw
echo "4104 - Processing 01.0239 low analysis started at $(timestamp)"
php panini.php 01.0239 low
echo "4105 - Processing 01.0239 laN analysis started at $(timestamp)"
php panini.php 01.0239 laN
echo "4106 - Processing 01.0239 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0239 ASIrliN
echo "4107 - Processing 01.0239 viDiliN analysis started at $(timestamp)"
php panini.php 01.0239 viDiliN
echo "4108 - Processing 01.0239 luN analysis started at $(timestamp)"
php panini.php 01.0239 luN
echo "4109 - Processing 01.0239 lfN analysis started at $(timestamp)"
php panini.php 01.0239 lfN
echo "4110 - Processing 01.0980 low analysis started at $(timestamp)"
php panini.php 01.0980 low
echo "4111 - Processing 01.0978 low analysis started at $(timestamp)"
php panini.php 01.0978 low
echo "4112 - Processing 01.0409 law analysis started at $(timestamp)"
php panini.php 01.0409 law
echo "4113 - Processing 01.0409 liw analysis started at $(timestamp)"
php panini.php 01.0409 liw
echo "4114 - Processing 01.0409 luw analysis started at $(timestamp)"
php panini.php 01.0409 luw
echo "4115 - Processing 01.0409 lfw analysis started at $(timestamp)"
php panini.php 01.0409 lfw
echo "4116 - Processing 01.0409 low analysis started at $(timestamp)"
php panini.php 01.0409 low
echo "4117 - Processing 01.0409 laN analysis started at $(timestamp)"
php panini.php 01.0409 laN
echo "4118 - Processing 01.0409 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0409 ASIrliN
echo "4119 - Processing 01.0409 viDiliN analysis started at $(timestamp)"
php panini.php 01.0409 viDiliN
echo "4120 - Processing 01.0409 luN analysis started at $(timestamp)"
php panini.php 01.0409 luN
echo "4121 - Processing 01.0409 lfN analysis started at $(timestamp)"
php panini.php 01.0409 lfN
echo "4122 - Processing 03.0016 law analysis started at $(timestamp)"
php panini.php 03.0016 law
echo "4123 - Processing 03.0016 low analysis started at $(timestamp)"
php panini.php 03.0016 low
echo "4124 - Processing 03.0016 laN analysis started at $(timestamp)"
php panini.php 03.0016 laN
echo "4125 - Processing 03.0016 viDiliN analysis started at $(timestamp)"
php panini.php 03.0016 viDiliN
echo "4126 - Processing 01.0806 law analysis started at $(timestamp)"
php panini.php 01.0806 law
echo "4127 - Processing 01.0806 low analysis started at $(timestamp)"
php panini.php 01.0806 low
echo "4128 - Processing 01.0806 laN analysis started at $(timestamp)"
php panini.php 01.0806 laN
echo "4129 - Processing 01.0806 viDiliN analysis started at $(timestamp)"
php panini.php 01.0806 viDiliN
echo "4130 - Processing 01.0806 luN analysis started at $(timestamp)"
php panini.php 01.0806 luN
echo "4131 - Processing 09.0069 law analysis started at $(timestamp)"
php panini.php 09.0069 law
echo "4132 - Processing 09.0069 liw analysis started at $(timestamp)"
php panini.php 09.0069 liw
echo "4133 - Processing 09.0069 luw analysis started at $(timestamp)"
php panini.php 09.0069 luw
echo "4134 - Processing 09.0069 lfw analysis started at $(timestamp)"
php panini.php 09.0069 lfw
echo "4135 - Processing 09.0069 low analysis started at $(timestamp)"
php panini.php 09.0069 low
echo "4136 - Processing 09.0069 laN analysis started at $(timestamp)"
php panini.php 09.0069 laN
echo "4137 - Processing 09.0069 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0069 ASIrliN
echo "4138 - Processing 09.0069 viDiliN analysis started at $(timestamp)"
php panini.php 09.0069 viDiliN
echo "4139 - Processing 09.0069 luN analysis started at $(timestamp)"
php panini.php 09.0069 luN
echo "4140 - Processing 09.0069 lfN analysis started at $(timestamp)"
php panini.php 09.0069 lfN
echo "4141 - Processing 01.0299 low analysis started at $(timestamp)"
php panini.php 01.0299 low
echo "4142 - Processing 01.0360 law analysis started at $(timestamp)"
php panini.php 01.0360 law
echo "4143 - Processing 01.0360 liw analysis started at $(timestamp)"
php panini.php 01.0360 liw
echo "4144 - Processing 01.0360 luw analysis started at $(timestamp)"
php panini.php 01.0360 luw
echo "4145 - Processing 01.0360 lfw analysis started at $(timestamp)"
php panini.php 01.0360 lfw
echo "4146 - Processing 01.0360 low analysis started at $(timestamp)"
php panini.php 01.0360 low
echo "4147 - Processing 01.0360 laN analysis started at $(timestamp)"
php panini.php 01.0360 laN
echo "4148 - Processing 01.0360 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0360 ASIrliN
echo "4149 - Processing 01.0360 viDiliN analysis started at $(timestamp)"
php panini.php 01.0360 viDiliN
echo "4150 - Processing 01.0360 luN analysis started at $(timestamp)"
php panini.php 01.0360 luN
echo "4151 - Processing 01.0360 lfN analysis started at $(timestamp)"
php panini.php 01.0360 lfN
echo "4152 - Processing 09.0070 law analysis started at $(timestamp)"
php panini.php 09.0070 law
echo "4153 - Processing 09.0070 liw analysis started at $(timestamp)"
php panini.php 09.0070 liw
echo "4154 - Processing 09.0070 luw analysis started at $(timestamp)"
php panini.php 09.0070 luw
echo "4155 - Processing 09.0070 lfw analysis started at $(timestamp)"
php panini.php 09.0070 lfw
echo "4156 - Processing 09.0070 low analysis started at $(timestamp)"
php panini.php 09.0070 low
echo "4157 - Processing 09.0070 laN analysis started at $(timestamp)"
php panini.php 09.0070 laN
echo "4158 - Processing 09.0070 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0070 ASIrliN
echo "4159 - Processing 09.0070 viDiliN analysis started at $(timestamp)"
php panini.php 09.0070 viDiliN
echo "4160 - Processing 09.0070 luN analysis started at $(timestamp)"
php panini.php 09.0070 luN
echo "4161 - Processing 09.0070 lfN analysis started at $(timestamp)"
php panini.php 09.0070 lfN
echo "4162 - Processing 01.0432 law analysis started at $(timestamp)"
php panini.php 01.0432 law
echo "4163 - Processing 01.0432 liw analysis started at $(timestamp)"
php panini.php 01.0432 liw
echo "4164 - Processing 01.0432 luw analysis started at $(timestamp)"
php panini.php 01.0432 luw
echo "4165 - Processing 01.0432 lfw analysis started at $(timestamp)"
php panini.php 01.0432 lfw
echo "4166 - Processing 01.0432 low analysis started at $(timestamp)"
php panini.php 01.0432 low
echo "4167 - Processing 01.0432 laN analysis started at $(timestamp)"
php panini.php 01.0432 laN
echo "4168 - Processing 01.0432 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0432 ASIrliN
echo "4169 - Processing 01.0432 viDiliN analysis started at $(timestamp)"
php panini.php 01.0432 viDiliN
echo "4170 - Processing 01.0432 luN analysis started at $(timestamp)"
php panini.php 01.0432 luN
echo "4171 - Processing 01.0432 lfN analysis started at $(timestamp)"
php panini.php 01.0432 lfN
echo "4172 - Processing 02.0076 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0076 ASIrliN
echo "4173 - Processing 10.0163 law analysis started at $(timestamp)"
php panini.php 10.0163 law
echo "4174 - Processing 10.0163 liw analysis started at $(timestamp)"
php panini.php 10.0163 liw
echo "4175 - Processing 10.0163 luw analysis started at $(timestamp)"
php panini.php 10.0163 luw
echo "4176 - Processing 10.0163 lfw analysis started at $(timestamp)"
php panini.php 10.0163 lfw
echo "4177 - Processing 10.0163 low analysis started at $(timestamp)"
php panini.php 10.0163 low
echo "4178 - Processing 10.0163 laN analysis started at $(timestamp)"
php panini.php 10.0163 laN
echo "4179 - Processing 10.0163 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0163 ASIrliN
echo "4180 - Processing 10.0163 viDiliN analysis started at $(timestamp)"
php panini.php 10.0163 viDiliN
echo "4181 - Processing 10.0163 luN analysis started at $(timestamp)"
php panini.php 10.0163 luN
echo "4182 - Processing 10.0163 lfN analysis started at $(timestamp)"
php panini.php 10.0163 lfN
echo "4183 - Processing 03.0003 law analysis started at $(timestamp)"
php panini.php 03.0003 law
echo "4184 - Processing 03.0003 liw analysis started at $(timestamp)"
php panini.php 03.0003 liw
echo "4185 - Processing 01.0238 law analysis started at $(timestamp)"
php panini.php 01.0238 law
echo "4186 - Processing 01.0238 liw analysis started at $(timestamp)"
php panini.php 01.0238 liw
echo "4187 - Processing 01.0238 luw analysis started at $(timestamp)"
php panini.php 01.0238 luw
echo "4188 - Processing 01.0238 lfw analysis started at $(timestamp)"
php panini.php 01.0238 lfw
echo "4189 - Processing 01.0238 low analysis started at $(timestamp)"
php panini.php 01.0238 low
echo "4190 - Processing 01.0238 laN analysis started at $(timestamp)"
php panini.php 01.0238 laN
echo "4191 - Processing 01.0238 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0238 ASIrliN
echo "4192 - Processing 01.0238 viDiliN analysis started at $(timestamp)"
php panini.php 01.0238 viDiliN
echo "4193 - Processing 01.0238 luN analysis started at $(timestamp)"
php panini.php 01.0238 luN
echo "4194 - Processing 01.0238 lfN analysis started at $(timestamp)"
php panini.php 01.0238 lfN
echo "4195 - Processing 10.0161 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0161 ASIrliN
echo "4196 - Processing 01.1163 law analysis started at $(timestamp)"
php panini.php 01.1163 law
echo "4197 - Processing 01.1163 liw analysis started at $(timestamp)"
php panini.php 01.1163 liw
echo "4198 - Processing 01.1163 luw analysis started at $(timestamp)"
php panini.php 01.1163 luw
echo "4199 - Processing 01.1163 lfw analysis started at $(timestamp)"
php panini.php 01.1163 lfw
echo "4200 - Processing 01.1163 low analysis started at $(timestamp)"
php panini.php 01.1163 low
echo "4201 - Processing 01.1163 laN analysis started at $(timestamp)"
php panini.php 01.1163 laN
echo "4202 - Processing 01.1163 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1163 ASIrliN
echo "4203 - Processing 01.1163 viDiliN analysis started at $(timestamp)"
php panini.php 01.1163 viDiliN
echo "4204 - Processing 01.1163 luN analysis started at $(timestamp)"
php panini.php 01.1163 luN
echo "4205 - Processing 01.1163 lfN analysis started at $(timestamp)"
php panini.php 01.1163 lfN
echo '</forms>' >> generatedforms.xml
python comparedb.py generatedforms.xml suspectverbforms.txt
