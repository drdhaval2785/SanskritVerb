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
echo "1 - Processing of 10.0460 luw started at $(timestamp)"
php panini.php 10.0460 luw
echo "2 - Processing of 10.0328 luw started at $(timestamp)"
php panini.php 10.0328 luw
echo "3 - Processing of 01.0722 luw started at $(timestamp)"
php panini.php 01.0722 luw
echo "4 - Processing of 01.0901 luw started at $(timestamp)"
php panini.php 01.0901 luw
echo "5 - Processing of 01.0742 luw started at $(timestamp)"
php panini.php 01.0742 luw
echo "6 - Processing of 01.0902 luw started at $(timestamp)"
php panini.php 01.0902 luw
echo "7 - Processing of 10.0473 luw started at $(timestamp)"
php panini.php 10.0473 luw
echo "8 - Processing of 01.0092 luw started at $(timestamp)"
php panini.php 01.0092 luw
echo "9 - Processing of 10.0474 luw started at $(timestamp)"
php panini.php 10.0474 luw
echo "10 - Processing of 01.0155 luw started at $(timestamp)"
php panini.php 01.0155 luw
echo "11 - Processing of 01.0115 luw started at $(timestamp)"
php panini.php 01.0115 luw
echo "12 - Processing of 01.0999 luw started at $(timestamp)"
php panini.php 01.0999 luw
echo "13 - Processing of 01.1000 luw started at $(timestamp)"
php panini.php 01.1000 luw
echo "14 - Processing of 01.0998 luw started at $(timestamp)"
php panini.php 01.0998 luw
echo "15 - Processing of 01.0215 luw started at $(timestamp)"
php panini.php 01.0215 luw
echo "16 - Processing of 10.0266 luw started at $(timestamp)"
php panini.php 10.0266 luw
echo "17 - Processing of 10.0021 luw started at $(timestamp)"
php panini.php 10.0021 luw
echo "18 - Processing of 07.0316 luw started at $(timestamp)"
php panini.php 07.0316 luw
echo "19 - Processing of 01.0332 luw started at $(timestamp)"
php panini.php 01.0332 luw
echo "20 - Processing of 10.0037 luw started at $(timestamp)"
php panini.php 10.0037 luw
echo "21 - Processing of 01.0287 luw started at $(timestamp)"
php panini.php 01.0287 luw
echo "22 - Processing of 01.0414 luw started at $(timestamp)"
php panini.php 01.0414 luw
echo "23 - Processing of 01.0403 luw started at $(timestamp)"
php panini.php 01.0403 luw
echo "24 - Processing of 01.0512 luw started at $(timestamp)"
php panini.php 01.0512 luw
echo "25 - Processing of 04.0071 luw started at $(timestamp)"
php panini.php 04.0071 luw
echo "26 - Processing of 01.0294 luw started at $(timestamp)"
php panini.php 01.0294 luw
echo "27 - Processing of 01.0038 luw started at $(timestamp)"
php panini.php 01.0038 luw
echo "28 - Processing of 02.0041 luw started at $(timestamp)"
php panini.php 02.0041 luw
echo "29 - Processing of 02.0042 luw started at $(timestamp)"
php panini.php 02.0042 luw
echo "30 - Processing of 04.0072 luw started at $(timestamp)"
php panini.php 04.0072 luw
echo "31 - Processing of 02.0065 luw started at $(timestamp)"
php panini.php 02.0065 luw
echo "32 - Processing of 01.0063 luw started at $(timestamp)"
php panini.php 01.0063 luw
echo "33 - Processing of 01.0064 luw started at $(timestamp)"
php panini.php 01.0064 luw
echo "34 - Processing of 10.0471 luw started at $(timestamp)"
php panini.php 10.0471 luw
echo "35 - Processing of 01.0637 luw started at $(timestamp)"
php panini.php 01.0637 luw
echo "36 - Processing of 01.0536 luw started at $(timestamp)"
php panini.php 01.0536 luw
echo "37 - Processing of 10.0245 luw started at $(timestamp)"
php panini.php 10.0245 luw
echo "38 - Processing of 01.0438 luw started at $(timestamp)"
php panini.php 01.0438 luw
echo "39 - Processing of 01.0448 luw started at $(timestamp)"
php panini.php 01.0448 luw
echo "40 - Processing of 01.1031 luw started at $(timestamp)"
php panini.php 01.1031 luw
echo "41 - Processing of 01.0546 luw started at $(timestamp)"
php panini.php 01.0546 luw
echo "42 - Processing of 10.0145 luw started at $(timestamp)"
php panini.php 10.0145 luw
echo "43 - Processing of 01.0185 luw started at $(timestamp)"
php panini.php 01.0185 luw
echo "44 - Processing of 01.0232 luw started at $(timestamp)"
php panini.php 01.0232 luw
echo "45 - Processing of 10.0340 luw started at $(timestamp)"
php panini.php 10.0340 luw
echo "46 - Processing of 01.0256 luw started at $(timestamp)"
php panini.php 01.0256 luw
echo "47 - Processing of 10.0250 luw started at $(timestamp)"
php panini.php 10.0250 luw
echo "48 - Processing of 10.0447 luw started at $(timestamp)"
php panini.php 10.0447 luw
echo "49 - Processing of 10.0365 luw started at $(timestamp)"
php panini.php 10.0365 luw
echo "50 - Processing of 01.0057 luw started at $(timestamp)"
php panini.php 01.0057 luw
echo "51 - Processing of 01.0481 luw started at $(timestamp)"
php panini.php 01.0481 luw
echo "52 - Processing of 01.0667 luw started at $(timestamp)"
php panini.php 01.0667 luw
echo "53 - Processing of 10.0257 luw started at $(timestamp)"
php panini.php 10.0257 luw
echo "54 - Processing of 10.0367 luw started at $(timestamp)"
php panini.php 10.0367 luw
echo "55 - Processing of 01.0841 luw started at $(timestamp)"
php panini.php 01.0841 luw
echo "56 - Processing of 01.0593 luw started at $(timestamp)"
php panini.php 01.0593 luw
echo "57 - Processing of 01.0684 luw started at $(timestamp)"
php panini.php 01.0684 luw
echo "58 - Processing of 09.0059 luw started at $(timestamp)"
php panini.php 09.0059 luw
echo "59 - Processing of 09.0059 low started at $(timestamp)"
php panini.php 09.0059 low
echo "60 - Processing of 05.0020 luw started at $(timestamp)"
php panini.php 05.0020 luw
echo "61 - Processing of 01.1030 luw started at $(timestamp)"
php panini.php 01.1030 luw
echo "62 - Processing of 04.0106 luw started at $(timestamp)"
php panini.php 04.0106 luw
echo "63 - Processing of 01.1029 luw started at $(timestamp)"
php panini.php 01.1029 luw
echo "64 - Processing of 02.0060 luw started at $(timestamp)"
php panini.php 02.0060 luw
echo "65 - Processing of 02.0060 low started at $(timestamp)"
php panini.php 02.0060 low
echo "66 - Processing of 05.0029 luw started at $(timestamp)"
php panini.php 05.0029 luw
echo "67 - Processing of 01.0237 luw started at $(timestamp)"
php panini.php 01.0237 luw
echo "68 - Processing of 10.0376 luw started at $(timestamp)"
php panini.php 10.0376 luw
echo "69 - Processing of 02.0011 law started at $(timestamp)"
php panini.php 02.0011 law
echo "70 - Processing of 02.0011 luw started at $(timestamp)"
php panini.php 02.0011 luw
echo "71 - Processing of 02.0011 low started at $(timestamp)"
php panini.php 02.0011 low
echo "72 - Processing of 02.0040 luw started at $(timestamp)"
php panini.php 02.0040 luw
echo "73 - Processing of 01.0148 luw started at $(timestamp)"
php panini.php 01.0148 luw
echo "74 - Processing of 01.0149 luw started at $(timestamp)"
php panini.php 01.0149 luw
echo "75 - Processing of 01.0163 luw started at $(timestamp)"
php panini.php 01.0163 luw
echo "76 - Processing of 01.0357 luw started at $(timestamp)"
php panini.php 01.0357 luw
echo "77 - Processing of 01.0065 luw started at $(timestamp)"
php panini.php 01.0065 luw
echo "78 - Processing of 07.0011 law started at $(timestamp)"
php panini.php 07.0011 law
echo "79 - Processing of 07.0011 luw started at $(timestamp)"
php panini.php 07.0011 luw
echo "80 - Processing of 07.0011 low started at $(timestamp)"
php panini.php 07.0011 low
echo "81 - Processing of 07.0011 laN started at $(timestamp)"
php panini.php 07.0011 laN
echo "82 - Processing of 01.0670 luw started at $(timestamp)"
php panini.php 01.0670 luw
echo "83 - Processing of 10.0084 luw started at $(timestamp)"
php panini.php 10.0084 luw
echo "84 - Processing of 06.0078 luw started at $(timestamp)"
php panini.php 06.0078 luw
echo "85 - Processing of 04.0022 luw started at $(timestamp)"
php panini.php 04.0022 luw
echo "86 - Processing of 09.0061 luw started at $(timestamp)"
php panini.php 09.0061 luw
echo "87 - Processing of 09.0061 low started at $(timestamp)"
php panini.php 09.0061 low
echo "88 - Processing of 04.0038 luw started at $(timestamp)"
php panini.php 04.0038 luw
echo "89 - Processing of 01.0694 luw started at $(timestamp)"
php panini.php 01.0694 luw
echo "90 - Processing of 01.0150 luw started at $(timestamp)"
php panini.php 01.0150 luw
echo "91 - Processing of 01.0151 luw started at $(timestamp)"
php panini.php 01.0151 luw
echo "92 - Processing of 01.0207 luw started at $(timestamp)"
php panini.php 01.0207 luw
echo "93 - Processing of 01.0208 luw started at $(timestamp)"
php panini.php 01.0208 luw
echo "94 - Processing of 10.0009 luw started at $(timestamp)"
php panini.php 10.0009 luw
echo "95 - Processing of 02.0183 law started at $(timestamp)"
php panini.php 02.0183 law
echo "96 - Processing of 02.0183 luw started at $(timestamp)"
php panini.php 02.0183 luw
echo "97 - Processing of 02.0183 low started at $(timestamp)"
php panini.php 02.0183 low
echo "98 - Processing of 02.0183 laN started at $(timestamp)"
php panini.php 02.0183 laN
echo "99 - Processing of 10.0008 luw started at $(timestamp)"
php panini.php 10.0008 luw
echo "100 - Processing of 02.0342 law started at $(timestamp)"
php panini.php 02.0342 law
echo "101 - Processing of 02.0342 luw started at $(timestamp)"
php panini.php 02.0342 luw
echo "102 - Processing of 02.0342 low started at $(timestamp)"
php panini.php 02.0342 low
echo "103 - Processing of 02.0342 laN started at $(timestamp)"
php panini.php 02.0342 laN
echo "104 - Processing of 01.0587 luw started at $(timestamp)"
php panini.php 01.0587 luw
echo "105 - Processing of 01.0588 luw started at $(timestamp)"
php panini.php 01.0588 luw
echo "106 - Processing of 02.0010 law started at $(timestamp)"
php panini.php 02.0010 law
echo "107 - Processing of 02.0010 luw started at $(timestamp)"
php panini.php 02.0010 luw
echo "108 - Processing of 02.0010 low started at $(timestamp)"
php panini.php 02.0010 low
echo "109 - Processing of 02.0010 laN started at $(timestamp)"
php panini.php 02.0010 laN
echo "110 - Processing of 01.0780 luw started at $(timestamp)"
php panini.php 01.0780 luw
echo "111 - Processing of 01.0695 luw started at $(timestamp)"
php panini.php 01.0695 luw
echo "112 - Processing of 01.0719 luw started at $(timestamp)"
php panini.php 01.0719 luw
echo "113 - Processing of 01.1102 luw started at $(timestamp)"
php panini.php 01.1102 luw
echo "114 - Processing of 01.0745 luw started at $(timestamp)"
php panini.php 01.0745 luw
echo "115 - Processing of 01.0136 luw started at $(timestamp)"
php panini.php 01.0136 luw
echo "116 - Processing of 01.0137 luw started at $(timestamp)"
php panini.php 01.0137 luw
echo "117 - Processing of 04.0135 luw started at $(timestamp)"
php panini.php 04.0135 luw
echo "118 - Processing of 06.0015 luw started at $(timestamp)"
php panini.php 06.0015 luw
echo "119 - Processing of 01.0244 luw started at $(timestamp)"
php panini.php 01.0244 luw
echo "120 - Processing of 06.0024 luw started at $(timestamp)"
php panini.php 06.0024 luw
echo "121 - Processing of 06.0014 luw started at $(timestamp)"
php panini.php 06.0014 luw
echo "122 - Processing of 01.0243 luw started at $(timestamp)"
php panini.php 01.0243 luw
echo "123 - Processing of 01.0852 luw started at $(timestamp)"
php panini.php 01.0852 luw
echo "124 - Processing of 01.0392 luw started at $(timestamp)"
php panini.php 01.0392 luw
echo "125 - Processing of 10.0385 luw started at $(timestamp)"
php panini.php 10.0385 luw
echo "126 - Processing of 07.0020 luw started at $(timestamp)"
php panini.php 07.0020 luw
echo "127 - Processing of 06.0023 luw started at $(timestamp)"
php panini.php 06.0023 luw
echo "128 - Processing of 06.0044 luw started at $(timestamp)"
php panini.php 06.0044 luw
echo "129 - Processing of 06.0045 luw started at $(timestamp)"
php panini.php 06.0045 luw
echo "130 - Processing of 01.0020 luw started at $(timestamp)"
php panini.php 01.0020 luw
echo "131 - Processing of 01.0650 luw started at $(timestamp)"
php panini.php 01.0650 luw
echo "132 - Processing of 01.0792 luw started at $(timestamp)"
php panini.php 01.0792 luw
echo "133 - Processing of 01.0840 luw started at $(timestamp)"
php panini.php 01.0840 luw
echo "134 - Processing of 01.0391 luw started at $(timestamp)"
php panini.php 01.0391 luw
echo "135 - Processing of 10.0430 luw started at $(timestamp)"
php panini.php 10.0430 luw
echo "136 - Processing of 01.0556 luw started at $(timestamp)"
php panini.php 01.0556 luw
echo "137 - Processing of 10.0023 luw started at $(timestamp)"
php panini.php 10.0023 luw
echo "138 - Processing of 02.0034 law started at $(timestamp)"
php panini.php 02.0034 law
echo "139 - Processing of 02.0034 luw started at $(timestamp)"
php panini.php 02.0034 luw
echo "140 - Processing of 02.0034 low started at $(timestamp)"
php panini.php 02.0034 low
echo "141 - Processing of 02.0034 laN started at $(timestamp)"
php panini.php 02.0034 laN
echo "142 - Processing of 01.0779 luw started at $(timestamp)"
php panini.php 01.0779 luw
echo "143 - Processing of 01.0735 luw started at $(timestamp)"
php panini.php 01.0735 luw
echo "144 - Processing of 03.0017 luw started at $(timestamp)"
php panini.php 03.0017 luw
echo "145 - Processing of 05.0038 luw started at $(timestamp)"
php panini.php 05.0038 luw
echo "146 - Processing of 01.1086 luw started at $(timestamp)"
php panini.php 01.1086 luw
echo "147 - Processing of 06.0022 luw started at $(timestamp)"
php panini.php 06.0022 luw
echo "148 - Processing of 06.0016 luw started at $(timestamp)"
php panini.php 06.0016 luw
echo "149 - Processing of 01.0200 luw started at $(timestamp)"
php panini.php 01.0200 luw
echo "150 - Processing of 01.0201 luw started at $(timestamp)"
php panini.php 01.0201 luw
echo "151 - Processing of 08.0005 luw started at $(timestamp)"
php panini.php 08.0005 luw
echo "152 - Processing of 05.0027 luw started at $(timestamp)"
php panini.php 05.0027 luw
echo "153 - Processing of 04.0160 luw started at $(timestamp)"
php panini.php 04.0160 luw
echo "154 - Processing of 06.0040 luw started at $(timestamp)"
php panini.php 06.0040 luw
echo "155 - Processing of 06.0041 luw started at $(timestamp)"
php panini.php 06.0041 luw
echo "156 - Processing of 06.0007 luw started at $(timestamp)"
php panini.php 06.0007 luw
echo "157 - Processing of 09.0032 luw started at $(timestamp)"
php panini.php 09.0032 luw
echo "158 - Processing of 09.0032 low started at $(timestamp)"
php panini.php 09.0032 low
echo "159 - Processing of 01.0203 luw started at $(timestamp)"
php panini.php 01.0203 luw
echo "160 - Processing of 01.0267 luw started at $(timestamp)"
php panini.php 01.0267 luw
echo "161 - Processing of 01.0300 luw started at $(timestamp)"
php panini.php 01.0300 luw
echo "162 - Processing of 01.0002 luw started at $(timestamp)"
php panini.php 01.0002 luw
echo "163 - Processing of 01.0705 luw started at $(timestamp)"
php panini.php 01.0705 luw
echo "164 - Processing of 01.0701 luw started at $(timestamp)"
php panini.php 01.0701 luw
echo "165 - Processing of 01.0129 luw started at $(timestamp)"
php panini.php 01.0129 luw
echo "166 - Processing of 01.0523 luw started at $(timestamp)"
php panini.php 01.0523 luw
echo "167 - Processing of 10.0014 luw started at $(timestamp)"
php panini.php 10.0014 luw
echo "168 - Processing of 02.0014 law started at $(timestamp)"
php panini.php 02.0014 law
echo "169 - Processing of 02.0014 luw started at $(timestamp)"
php panini.php 02.0014 luw
echo "170 - Processing of 02.0014 low started at $(timestamp)"
php panini.php 02.0014 low
echo "171 - Processing of 02.0014 laN started at $(timestamp)"
php panini.php 02.0014 laN
echo "172 - Processing of 01.0095 luw started at $(timestamp)"
php panini.php 01.0095 luw
echo "173 - Processing of 01.0128 luw started at $(timestamp)"
php panini.php 01.0128 luw
echo "174 - Processing of 01.0893 luw started at $(timestamp)"
php panini.php 01.0893 luw
echo "175 - Processing of 01.0900 luw started at $(timestamp)"
php panini.php 01.0900 luw
echo "176 - Processing of 01.0099 luw started at $(timestamp)"
php panini.php 01.0099 luw
echo "177 - Processing of 01.0192 luw started at $(timestamp)"
php panini.php 01.0192 luw
echo "178 - Processing of 01.0265 luw started at $(timestamp)"
php panini.php 01.0265 luw
echo "179 - Processing of 01.0193 luw started at $(timestamp)"
php panini.php 01.0193 luw
echo "180 - Processing of 01.0330 luw started at $(timestamp)"
php panini.php 01.0330 luw
echo "181 - Processing of 01.0359 luw started at $(timestamp)"
php panini.php 01.0359 luw
echo "182 - Processing of 01.0385 luw started at $(timestamp)"
php panini.php 01.0385 luw
echo "183 - Processing of 06.0108 luw started at $(timestamp)"
php panini.php 06.0108 luw
echo "184 - Processing of 01.0417 luw started at $(timestamp)"
php panini.php 01.0417 luw
echo "185 - Processing of 01.0404 luw started at $(timestamp)"
php panini.php 01.0404 luw
echo "186 - Processing of 01.0517 luw started at $(timestamp)"
php panini.php 01.0517 luw
echo "187 - Processing of 01.0903 luw started at $(timestamp)"
php panini.php 01.0903 luw
echo "188 - Processing of 10.0240 luw started at $(timestamp)"
php panini.php 10.0240 luw
echo "189 - Processing of 01.0297 luw started at $(timestamp)"
php panini.php 01.0297 luw
echo "190 - Processing of 01.0418 luw started at $(timestamp)"
php panini.php 01.0418 luw
echo "191 - Processing of 10.0067 luw started at $(timestamp)"
php panini.php 10.0067 luw
echo "192 - Processing of 01.0316 luw started at $(timestamp)"
php panini.php 01.0316 luw
echo "193 - Processing of 10.0456 luw started at $(timestamp)"
php panini.php 10.0456 luw
echo "194 - Processing of 01.0037 luw started at $(timestamp)"
php panini.php 01.0037 luw
echo "195 - Processing of 10.0389 luw started at $(timestamp)"
php panini.php 10.0389 luw
echo "196 - Processing of 01.0881 luw started at $(timestamp)"
php panini.php 01.0881 luw
echo "197 - Processing of 01.0531 luw started at $(timestamp)"
php panini.php 01.0531 luw
echo "198 - Processing of 01.0878 luw started at $(timestamp)"
php panini.php 01.0878 luw
echo "199 - Processing of 01.0073 luw started at $(timestamp)"
php panini.php 01.0073 luw
echo "200 - Processing of 01.0877 luw started at $(timestamp)"
php panini.php 01.0877 luw
echo "201 - Processing of 01.0440 luw started at $(timestamp)"
php panini.php 01.0440 luw
echo "202 - Processing of 01.0511 luw started at $(timestamp)"
php panini.php 01.0511 luw
echo "203 - Processing of 01.0435 luw started at $(timestamp)"
php panini.php 01.0435 luw
echo "204 - Processing of 01.0260 luw started at $(timestamp)"
php panini.php 01.0260 luw
echo "205 - Processing of 10.0470 luw started at $(timestamp)"
php panini.php 10.0470 luw
echo "206 - Processing of 10.0457 luw started at $(timestamp)"
php panini.php 10.0457 luw
echo "207 - Processing of 01.0061 luw started at $(timestamp)"
php panini.php 01.0061 luw
echo "208 - Processing of 01.0486 luw started at $(timestamp)"
php panini.php 01.0486 luw
echo "209 - Processing of 01.0664 luw started at $(timestamp)"
php panini.php 01.0664 luw
echo "210 - Processing of 10.0404 luw started at $(timestamp)"
php panini.php 10.0404 luw
echo "211 - Processing of 10.0093 luw started at $(timestamp)"
php panini.php 10.0093 luw
echo "212 - Processing of 01.0570 luw started at $(timestamp)"
php panini.php 01.0570 luw
echo "213 - Processing of 01.0571 luw started at $(timestamp)"
php panini.php 01.0571 luw
echo "214 - Processing of 02.0016 law started at $(timestamp)"
php panini.php 02.0016 law
echo "215 - Processing of 02.0016 luw started at $(timestamp)"
php panini.php 02.0016 luw
echo "216 - Processing of 02.0016 low started at $(timestamp)"
php panini.php 02.0016 low
echo "217 - Processing of 02.0016 laN started at $(timestamp)"
php panini.php 02.0016 laN
echo "218 - Processing of 01.0781 luw started at $(timestamp)"
php panini.php 01.0781 luw
echo "219 - Processing of 02.0015 law started at $(timestamp)"
php panini.php 02.0015 law
echo "220 - Processing of 02.0015 luw started at $(timestamp)"
php panini.php 02.0015 luw
echo "221 - Processing of 02.0015 low started at $(timestamp)"
php panini.php 02.0015 low
echo "222 - Processing of 02.0015 laN started at $(timestamp)"
php panini.php 02.0015 laN
echo "223 - Processing of 01.0996 luw started at $(timestamp)"
php panini.php 01.0996 luw
echo "224 - Processing of 01.0760 luw started at $(timestamp)"
php panini.php 01.0760 luw
echo "225 - Processing of 01.0194 luw started at $(timestamp)"
php panini.php 01.0194 luw
echo "226 - Processing of 10.0422 luw started at $(timestamp)"
php panini.php 10.0422 luw
echo "227 - Processing of 04.0058 luw started at $(timestamp)"
php panini.php 04.0058 luw
echo "228 - Processing of 01.0734 luw started at $(timestamp)"
php panini.php 01.0734 luw
echo "229 - Processing of 01.0710 luw started at $(timestamp)"
php panini.php 01.0710 luw
echo "230 - Processing of 03.0020 luw started at $(timestamp)"
php panini.php 03.0020 luw
echo "231 - Processing of 01.0338 luw started at $(timestamp)"
php panini.php 01.0338 luw
echo "232 - Processing of 01.0358 luw started at $(timestamp)"
php panini.php 01.0358 luw
echo "233 - Processing of 03.0021 luw started at $(timestamp)"
php panini.php 03.0021 luw
echo "234 - Processing of 01.1148 luw started at $(timestamp)"
php panini.php 01.1148 luw
echo "235 - Processing of 06.0080 luw started at $(timestamp)"
php panini.php 06.0080 luw
echo "236 - Processing of 10.0142 luw started at $(timestamp)"
php panini.php 10.0142 luw
echo "237 - Processing of 01.0602 luw started at $(timestamp)"
php panini.php 01.0602 luw
echo "238 - Processing of 02.0127 luw started at $(timestamp)"
php panini.php 02.0127 luw
echo "239 - Processing of 06.0296 luw started at $(timestamp)"
php panini.php 06.0296 luw
echo "240 - Processing of 10.1103 luw started at $(timestamp)"
php panini.php 10.1103 luw
echo "241 - Processing of 04.0294 luw started at $(timestamp)"
php panini.php 04.0294 luw
echo "242 - Processing of 04.0136 luw started at $(timestamp)"
php panini.php 04.0136 luw
echo "243 - Processing of 01.0096 luw started at $(timestamp)"
php panini.php 01.0096 luw
echo "244 - Processing of 01.0211 luw started at $(timestamp)"
php panini.php 01.0211 luw
echo "245 - Processing of 06.0095 luw started at $(timestamp)"
php panini.php 06.0095 luw
echo "246 - Processing of 01.0993 luw started at $(timestamp)"
php panini.php 01.0993 luw
echo "247 - Processing of 01.0226 luw started at $(timestamp)"
php panini.php 01.0226 luw
echo "248 - Processing of 01.0212 luw started at $(timestamp)"
php panini.php 01.0212 luw
echo "249 - Processing of 01.0255 luw started at $(timestamp)"
php panini.php 01.0255 luw
echo "250 - Processing of 06.0222 luw started at $(timestamp)"
php panini.php 06.0222 luw
echo "251 - Processing of 10.0034 luw started at $(timestamp)"
php panini.php 10.0034 luw
echo "252 - Processing of 10.0226 luw started at $(timestamp)"
php panini.php 10.0226 luw
echo "253 - Processing of 06.0113 luw started at $(timestamp)"
php panini.php 06.0113 luw
echo "254 - Processing of 10.0435 luw started at $(timestamp)"
php panini.php 10.0435 luw
echo "255 - Processing of 06.0061 luw started at $(timestamp)"
php panini.php 06.0061 luw
echo "256 - Processing of 01.0363 luw started at $(timestamp)"
php panini.php 01.0363 luw
echo "257 - Processing of 10.0070 luw started at $(timestamp)"
php panini.php 10.0070 luw
echo "258 - Processing of 01.0397 luw started at $(timestamp)"
php panini.php 01.0397 luw
echo "259 - Processing of 10.0068 luw started at $(timestamp)"
php panini.php 10.0068 luw
echo "260 - Processing of 01.0303 luw started at $(timestamp)"
php panini.php 01.0303 luw
echo "261 - Processing of 01.0362 luw started at $(timestamp)"
php panini.php 01.0362 luw
echo "262 - Processing of 10.0220 luw started at $(timestamp)"
php panini.php 10.0220 luw
echo "263 - Processing of 04.0012 luw started at $(timestamp)"
php panini.php 04.0012 luw
echo "264 - Processing of 01.0045 luw started at $(timestamp)"
php panini.php 01.0045 luw
echo "265 - Processing of 09.0050 luw started at $(timestamp)"
php panini.php 09.0050 luw
echo "266 - Processing of 10.0007 luw started at $(timestamp)"
php panini.php 10.0007 luw
echo "267 - Processing of 10.0146 luw started at $(timestamp)"
php panini.php 10.0146 luw
echo "268 - Processing of 04.0310 luw started at $(timestamp)"
php panini.php 04.0310 luw
echo "269 - Processing of 10.0157 luw started at $(timestamp)"
php panini.php 10.0157 luw
echo "270 - Processing of 01.0492 luw started at $(timestamp)"
php panini.php 01.0492 luw
echo "271 - Processing of 10.0158 luw started at $(timestamp)"
php panini.php 10.0158 luw
echo "272 - Processing of 06.0067 luw started at $(timestamp)"
php panini.php 06.0067 luw
echo "273 - Processing of 01.0021 luw started at $(timestamp)"
php panini.php 01.0021 luw
echo "274 - Processing of 01.0976 luw started at $(timestamp)"
php panini.php 01.0976 luw
echo "275 - Processing of 04.0126 luw started at $(timestamp)"
php panini.php 04.0126 luw
echo "276 - Processing of 09.0054 luw started at $(timestamp)"
php panini.php 09.0054 luw
echo "277 - Processing of 09.0054 low started at $(timestamp)"
php panini.php 09.0054 low
echo "278 - Processing of 04.0125 luw started at $(timestamp)"
php panini.php 04.0125 luw
echo "279 - Processing of 10.0236 luw started at $(timestamp)"
php panini.php 10.0236 luw
echo "280 - Processing of 10.0443 law started at $(timestamp)"
php panini.php 10.0443 law
echo "281 - Processing of 10.0443 liw started at $(timestamp)"
php panini.php 10.0443 liw
echo "282 - Processing of 10.0443 luw started at $(timestamp)"
php panini.php 10.0443 luw
echo "283 - Processing of 10.0443 lfw started at $(timestamp)"
php panini.php 10.0443 lfw
echo "284 - Processing of 10.0443 low started at $(timestamp)"
php panini.php 10.0443 low
echo "285 - Processing of 10.0443 laN started at $(timestamp)"
php panini.php 10.0443 laN
echo "286 - Processing of 10.0443 ASIrliN started at $(timestamp)"
php panini.php 10.0443 ASIrliN
echo "287 - Processing of 10.0443 viDiliN started at $(timestamp)"
php panini.php 10.0443 viDiliN
echo "288 - Processing of 10.0443 lfN started at $(timestamp)"
php panini.php 10.0443 lfN
echo "289 - Processing of 06.0137 luw started at $(timestamp)"
php panini.php 06.0137 luw
echo "290 - Processing of 01.0254 luw started at $(timestamp)"
php panini.php 01.0254 luw
echo "291 - Processing of 10.0432 luw started at $(timestamp)"
php panini.php 10.0432 luw
echo "292 - Processing of 10.0225 luw started at $(timestamp)"
php panini.php 10.0225 luw
echo "293 - Processing of 10.0438 luw started at $(timestamp)"
php panini.php 10.0438 luw
echo "294 - Processing of 10.0211 luw started at $(timestamp)"
php panini.php 10.0211 luw
echo "295 - Processing of 01.0603 luw started at $(timestamp)"
php panini.php 01.0603 luw
echo "296 - Processing of 08.0010 luw started at $(timestamp)"
php panini.php 08.0010 luw
echo "297 - Processing of 01.1048 luw started at $(timestamp)"
php panini.php 01.1048 luw
echo "298 - Processing of 05.0007 luw started at $(timestamp)"
php panini.php 05.0007 luw
echo "299 - Processing of 06.0112 luw started at $(timestamp)"
php panini.php 06.0112 luw
echo "300 - Processing of 01.0682 luw started at $(timestamp)"
php panini.php 01.0682 luw
echo "301 - Processing of 06.0171 luw started at $(timestamp)"
php panini.php 06.0171 luw
echo "302 - Processing of 07.0010 luw started at $(timestamp)"
php panini.php 07.0010 luw
echo "303 - Processing of 10.0408 liw started at $(timestamp)"
php panini.php 10.0408 liw
echo "304 - Processing of 10.0408 luw started at $(timestamp)"
php panini.php 10.0408 luw
echo "305 - Processing of 10.0278 luw started at $(timestamp)"
php panini.php 10.0278 luw
echo "306 - Processing of 01.0866 luw started at $(timestamp)"
php panini.php 01.0866 luw
echo "307 - Processing of 04.0140 luw started at $(timestamp)"
php panini.php 04.0140 luw
echo "308 - Processing of 06.0006 luw started at $(timestamp)"
php panini.php 06.0006 luw
echo "309 - Processing of 06.0145 luw started at $(timestamp)"
php panini.php 06.0145 luw
echo "310 - Processing of 09.0018 luw started at $(timestamp)"
php panini.php 09.0018 luw
echo "311 - Processing of 09.0031 luw started at $(timestamp)"
php panini.php 09.0031 luw
echo "312 - Processing of 10.0155 luw started at $(timestamp)"
php panini.php 10.0155 luw
echo "313 - Processing of 10.0437 luw started at $(timestamp)"
php panini.php 10.0437 luw
echo "314 - Processing of 01.0426 luw started at $(timestamp)"
php panini.php 01.0426 luw
echo "315 - Processing of 01.0616 luw started at $(timestamp)"
php panini.php 01.0616 luw
echo "316 - Processing of 01.0583 luw started at $(timestamp)"
php panini.php 01.0583 luw
echo "317 - Processing of 01.0911 luw started at $(timestamp)"
php panini.php 01.0911 luw
echo "318 - Processing of 04.0007 luw started at $(timestamp)"
php panini.php 04.0007 luw
echo "319 - Processing of 09.0012 luw started at $(timestamp)"
php panini.php 09.0012 luw
echo "320 - Processing of 09.0012 low started at $(timestamp)"
php panini.php 09.0012 low
echo "321 - Processing of 01.0558 luw started at $(timestamp)"
php panini.php 01.0558 luw
echo "322 - Processing of 01.0636 luw started at $(timestamp)"
php panini.php 01.0636 luw
echo "323 - Processing of 01.0912 luw started at $(timestamp)"
php panini.php 01.0912 luw
echo "324 - Processing of 01.0882 luw started at $(timestamp)"
php panini.php 01.0882 luw
echo "325 - Processing of 01.0879 luw started at $(timestamp)"
php panini.php 01.0879 luw
echo "326 - Processing of 01.0074 luw started at $(timestamp)"
php panini.php 01.0074 luw
echo "327 - Processing of 01.0876 luw started at $(timestamp)"
php panini.php 01.0876 luw
echo "328 - Processing of 01.0545 luw started at $(timestamp)"
php panini.php 01.0545 luw
echo "329 - Processing of 09.0001 luw started at $(timestamp)"
php panini.php 09.0001 luw
echo "330 - Processing of 09.0001 low started at $(timestamp)"
php panini.php 09.0001 low
echo "331 - Processing of 01.0405 luw started at $(timestamp)"
php panini.php 01.0405 luw
echo "332 - Processing of 01.0213 luw started at $(timestamp)"
php panini.php 01.0213 luw
echo "333 - Processing of 06.0128 luw started at $(timestamp)"
php panini.php 06.0128 luw
echo "334 - Processing of 04.0086 luw started at $(timestamp)"
php panini.php 04.0086 luw
echo "335 - Processing of 01.0992 luw started at $(timestamp)"
php panini.php 01.0992 luw
echo "336 - Processing of 01.0913 luw started at $(timestamp)"
php panini.php 01.0913 luw
echo "337 - Processing of 01.0883 luw started at $(timestamp)"
php panini.php 01.0883 luw
echo "338 - Processing of 01.0880 luw started at $(timestamp)"
php panini.php 01.0880 luw
echo "339 - Processing of 01.0075 luw started at $(timestamp)"
php panini.php 01.0075 luw
echo "340 - Processing of 10.0162 luw started at $(timestamp)"
php panini.php 10.0162 luw
echo "341 - Processing of 04.0104 luw started at $(timestamp)"
php panini.php 04.0104 luw
echo "342 - Processing of 04.0157 luw started at $(timestamp)"
php panini.php 04.0157 luw
echo "343 - Processing of 01.0015 luw started at $(timestamp)"
php panini.php 01.0015 luw
echo "344 - Processing of 01.0076 luw started at $(timestamp)"
php panini.php 01.0076 luw
echo "345 - Processing of 04.0057 luw started at $(timestamp)"
php panini.php 04.0057 luw
echo "346 - Processing of 09.0058 luw started at $(timestamp)"
php panini.php 09.0058 luw
echo "347 - Processing of 09.0058 low started at $(timestamp)"
php panini.php 09.0058 low
echo "348 - Processing of 01.0441 luw started at $(timestamp)"
php panini.php 01.0441 luw
echo "349 - Processing of 01.1113 luw started at $(timestamp)"
php panini.php 01.1113 luw
echo "350 - Processing of 01.0691 luw started at $(timestamp)"
php panini.php 01.0691 luw
echo "351 - Processing of 01.0518 luw started at $(timestamp)"
php panini.php 01.0518 luw
echo "352 - Processing of 01.0981 luw started at $(timestamp)"
php panini.php 01.0981 luw
echo "353 - Processing of 10.0113 luw started at $(timestamp)"
php panini.php 10.0113 luw
echo "354 - Processing of 01.0873 luw started at $(timestamp)"
php panini.php 01.0873 luw
echo "355 - Processing of 08.0003 luw started at $(timestamp)"
php panini.php 08.0003 luw
echo "356 - Processing of 10.0487 luw started at $(timestamp)"
php panini.php 10.0487 luw
echo "357 - Processing of 04.0103 luw started at $(timestamp)"
php panini.php 04.0103 luw
echo "358 - Processing of 01.0510 luw started at $(timestamp)"
php panini.php 01.0510 luw
echo "359 - Processing of 10.0112 luw started at $(timestamp)"
php panini.php 10.0112 luw
echo "360 - Processing of 01.0986 luw started at $(timestamp)"
php panini.php 01.0986 luw
echo "361 - Processing of 10.0086 luw started at $(timestamp)"
php panini.php 10.0086 luw
echo "362 - Processing of 05.0033 luw started at $(timestamp)"
php panini.php 05.0033 luw
echo "363 - Processing of 01.0269 luw started at $(timestamp)"
php panini.php 01.0269 luw
echo "364 - Processing of 06.0143 luw started at $(timestamp)"
php panini.php 06.0143 luw
echo "365 - Processing of 08.0004 luw started at $(timestamp)"
php panini.php 08.0004 luw
echo "366 - Processing of 06.0005 luw started at $(timestamp)"
php panini.php 06.0005 luw
echo "367 - Processing of 04.0015 luw started at $(timestamp)"
php panini.php 04.0015 luw
echo "368 - Processing of 01.0648 luw started at $(timestamp)"
php panini.php 01.0648 luw
echo "369 - Processing of 05.0039 luw started at $(timestamp)"
php panini.php 05.0039 luw
echo "370 - Processing of 01.0270 luw started at $(timestamp)"
php panini.php 01.0270 luw
echo "371 - Processing of 01.0442 luw started at $(timestamp)"
php panini.php 01.0442 luw
echo "372 - Processing of 01.0443 luw started at $(timestamp)"
php panini.php 01.0443 luw
echo "373 - Processing of 09.0042 luw started at $(timestamp)"
php panini.php 09.0042 luw
echo "374 - Processing of 09.0042 low started at $(timestamp)"
php panini.php 09.0042 low
echo "375 - Processing of 02.0031 luw started at $(timestamp)"
php panini.php 02.0031 luw
echo "376 - Processing of 07.0006 law started at $(timestamp)"
php panini.php 07.0006 law
echo "377 - Processing of 07.0006 luw started at $(timestamp)"
php panini.php 07.0006 luw
echo "378 - Processing of 07.0006 low started at $(timestamp)"
php panini.php 07.0006 low
echo "379 - Processing of 07.0006 laN started at $(timestamp)"
php panini.php 07.0006 laN
echo "380 - Processing of 04.0087 luw started at $(timestamp)"
php panini.php 04.0087 luw
echo "381 - Processing of 09.0055 luw started at $(timestamp)"
php panini.php 09.0055 luw
echo "382 - Processing of 09.0055 low started at $(timestamp)"
php panini.php 09.0055 low
echo "383 - Processing of 04.0154 luw started at $(timestamp)"
php panini.php 04.0154 luw
echo "384 - Processing of 01.0854 luw started at $(timestamp)"
php panini.php 01.0854 luw
echo "385 - Processing of 06.0070 luw started at $(timestamp)"
php panini.php 06.0070 luw
echo "386 - Processing of 01.0987 luw started at $(timestamp)"
php panini.php 01.0987 luw
echo "387 - Processing of 01.0649 luw started at $(timestamp)"
php panini.php 01.0649 luw
echo "388 - Processing of 10.0416 luw started at $(timestamp)"
php panini.php 10.0416 luw
echo "389 - Processing of 02.0032 luw started at $(timestamp)"
php panini.php 02.0032 luw
echo "390 - Processing of 01.0559 luw started at $(timestamp)"
php panini.php 01.0559 luw
echo "391 - Processing of 01.0598 luw started at $(timestamp)"
php panini.php 01.0598 luw
echo "392 - Processing of 01.1133 luw started at $(timestamp)"
php panini.php 01.1133 luw
echo "393 - Processing of 04.0159 luw started at $(timestamp)"
php panini.php 04.0159 luw
echo "394 - Processing of 01.0618 luw started at $(timestamp)"
php panini.php 01.0618 luw
echo "395 - Processing of 09.0067 luw started at $(timestamp)"
php panini.php 09.0067 luw
echo "396 - Processing of 09.0067 low started at $(timestamp)"
php panini.php 09.0067 low
echo "397 - Processing of 01.0264 luw started at $(timestamp)"
php panini.php 01.0264 luw
echo "398 - Processing of 01.0266 luw started at $(timestamp)"
php panini.php 01.0266 luw
echo "399 - Processing of 01.0346 luw started at $(timestamp)"
php panini.php 01.0346 luw
echo "400 - Processing of 10.0127 luw started at $(timestamp)"
php panini.php 10.0127 luw
echo "401 - Processing of 10.0065 luw started at $(timestamp)"
php panini.php 10.0065 luw
echo "402 - Processing of 10.0066 luw started at $(timestamp)"
php panini.php 10.0066 luw
echo "403 - Processing of 01.0317 luw started at $(timestamp)"
php panini.php 01.0317 luw
echo "404 - Processing of 01.0052 luw started at $(timestamp)"
php panini.php 01.0052 luw
echo "405 - Processing of 01.1020 luw started at $(timestamp)"
php panini.php 01.1020 luw
echo "406 - Processing of 01.0261 luw started at $(timestamp)"
php panini.php 01.0261 luw
echo "407 - Processing of 01.0062 luw started at $(timestamp)"
php panini.php 01.0062 luw
echo "408 - Processing of 01.0487 luw started at $(timestamp)"
php panini.php 01.0487 luw
echo "409 - Processing of 01.0665 luw started at $(timestamp)"
php panini.php 01.0665 luw
echo "410 - Processing of 01.0626 luw started at $(timestamp)"
php panini.php 01.0626 luw
echo "411 - Processing of 09.0068 luw started at $(timestamp)"
php panini.php 09.0068 luw
echo "412 - Processing of 09.0068 low started at $(timestamp)"
php panini.php 09.0068 low
echo "413 - Processing of 01.0782 luw started at $(timestamp)"
php panini.php 01.0782 luw
echo "414 - Processing of 01.0051 luw started at $(timestamp)"
php panini.php 01.0051 luw
echo "415 - Processing of 01.0339 luw started at $(timestamp)"
php panini.php 01.0339 luw
echo "416 - Processing of 07.0012 law started at $(timestamp)"
php panini.php 07.0012 law
echo "417 - Processing of 07.0012 luw started at $(timestamp)"
php panini.php 07.0012 luw
echo "418 - Processing of 07.0012 low started at $(timestamp)"
php panini.php 07.0012 low
echo "419 - Processing of 07.0012 laN started at $(timestamp)"
php panini.php 07.0012 laN
echo "420 - Processing of 04.0066 luw started at $(timestamp)"
php panini.php 04.0066 luw
echo "421 - Processing of 06.0172 luw started at $(timestamp)"
php panini.php 06.0172 luw
echo "422 - Processing of 01.1104 luw started at $(timestamp)"
php panini.php 01.1104 luw
echo "423 - Processing of 01.0227 luw started at $(timestamp)"
php panini.php 01.0227 luw
echo "424 - Processing of 06.0119 luw started at $(timestamp)"
php panini.php 06.0119 luw
echo "425 - Processing of 10.0072 luw started at $(timestamp)"
php panini.php 10.0072 luw
echo "426 - Processing of 06.0068 luw started at $(timestamp)"
php panini.php 06.0068 luw
echo "427 - Processing of 01.0022 luw started at $(timestamp)"
php panini.php 01.0022 luw
echo "428 - Processing of 10.0413 luw started at $(timestamp)"
php panini.php 10.0413 luw
echo "429 - Processing of 10.0414 luw started at $(timestamp)"
php panini.php 10.0414 luw
echo "430 - Processing of 01.0617 luw started at $(timestamp)"
php panini.php 01.0617 luw
echo "431 - Processing of 01.0581 luw started at $(timestamp)"
php panini.php 01.0581 luw
echo "432 - Processing of 10.0415 luw started at $(timestamp)"
php panini.php 10.0415 luw
echo "433 - Processing of 01.0633 luw started at $(timestamp)"
php panini.php 01.0633 luw
echo "434 - Processing of 01.0632 luw started at $(timestamp)"
php panini.php 01.0632 luw
echo "435 - Processing of 10.0149 luw started at $(timestamp)"
php panini.php 10.0149 luw
echo "436 - Processing of 01.0279 luw started at $(timestamp)"
php panini.php 01.0279 luw
echo "437 - Processing of 01.0280 luw started at $(timestamp)"
php panini.php 01.0280 luw
echo "438 - Processing of 01.0886 luw started at $(timestamp)"
php panini.php 01.0886 luw
echo "439 - Processing of 10.0391 luw started at $(timestamp)"
php panini.php 10.0391 luw
echo "440 - Processing of 01.0068 luw started at $(timestamp)"
php panini.php 01.0068 luw
echo "441 - Processing of 01.0419 luw started at $(timestamp)"
php panini.php 01.0419 luw
echo "442 - Processing of 10.0399 luw started at $(timestamp)"
php panini.php 10.0399 luw
echo "443 - Processing of 01.0054 luw started at $(timestamp)"
php panini.php 01.0054 luw
echo "444 - Processing of 10.0204 luw started at $(timestamp)"
php panini.php 10.0204 luw
echo "445 - Processing of 10.0177 luw started at $(timestamp)"
php panini.php 10.0177 luw
echo "446 - Processing of 01.0258 luw started at $(timestamp)"
php panini.php 01.0258 luw
echo "447 - Processing of 01.0059 luw started at $(timestamp)"
php panini.php 01.0059 luw
echo "448 - Processing of 10.0178 luw started at $(timestamp)"
php panini.php 10.0178 luw
echo "449 - Processing of 10.0179 luw started at $(timestamp)"
php panini.php 10.0179 luw
echo "450 - Processing of 01.0488 luw started at $(timestamp)"
php panini.php 01.0488 luw
echo "451 - Processing of 10.0449 luw started at $(timestamp)"
php panini.php 10.0449 luw
echo "452 - Processing of 01.0666 luw started at $(timestamp)"
php panini.php 01.0666 luw
echo "453 - Processing of 01.0723 luw started at $(timestamp)"
php panini.php 01.0723 luw
echo "454 - Processing of 10.0383 luw started at $(timestamp)"
php panini.php 10.0383 luw
echo "455 - Processing of 01.0627 luw started at $(timestamp)"
php panini.php 01.0627 luw
echo "456 - Processing of 10.0223 luw started at $(timestamp)"
php panini.php 10.0223 luw
echo "457 - Processing of 01.0457 luw started at $(timestamp)"
php panini.php 01.0457 luw
echo "458 - Processing of 01.0724 luw started at $(timestamp)"
php panini.php 01.0724 luw
echo "459 - Processing of 01.1101 luw started at $(timestamp)"
php panini.php 01.1101 luw
echo "460 - Processing of 03.0026 low started at $(timestamp)"
php panini.php 03.0026 low
echo "461 - Processing of 01.0004 luw started at $(timestamp)"
php panini.php 01.0004 luw
echo "462 - Processing of 01.0736 luw started at $(timestamp)"
php panini.php 01.0736 luw
echo "463 - Processing of 01.1105 luw started at $(timestamp)"
php panini.php 01.1105 luw
echo "464 - Processing of 01.1100 luw started at $(timestamp)"
php panini.php 01.1100 luw
echo "465 - Processing of 01.0230 luw started at $(timestamp)"
php panini.php 01.0230 luw
echo "466 - Processing of 06.0096 luw started at $(timestamp)"
php panini.php 06.0096 luw
echo "467 - Processing of 01.0231 luw started at $(timestamp)"
php panini.php 01.0231 luw
echo "468 - Processing of 06.0097 luw started at $(timestamp)"
php panini.php 06.0097 luw
echo "469 - Processing of 10.0436 law started at $(timestamp)"
php panini.php 10.0436 law
echo "470 - Processing of 10.0436 liw started at $(timestamp)"
php panini.php 10.0436 liw
echo "471 - Processing of 10.0436 luw started at $(timestamp)"
php panini.php 10.0436 luw
echo "472 - Processing of 10.0436 lfw started at $(timestamp)"
php panini.php 10.0436 lfw
echo "473 - Processing of 10.0436 low started at $(timestamp)"
php panini.php 10.0436 low
echo "474 - Processing of 10.0436 laN started at $(timestamp)"
php panini.php 10.0436 laN
echo "475 - Processing of 10.0436 ASIrliN started at $(timestamp)"
php panini.php 10.0436 ASIrliN
echo "476 - Processing of 10.0436 viDiliN started at $(timestamp)"
php panini.php 10.0436 viDiliN
echo "477 - Processing of 10.0436 lfN started at $(timestamp)"
php panini.php 10.0436 lfN
echo "478 - Processing of 10.0071 luw started at $(timestamp)"
php panini.php 10.0071 luw
echo "479 - Processing of 10.0069 luw started at $(timestamp)"
php panini.php 10.0069 luw
echo "480 - Processing of 01.0024 luw started at $(timestamp)"
php panini.php 01.0024 luw
echo "481 - Processing of 04.0014 luw started at $(timestamp)"
php panini.php 04.0014 luw
echo "482 - Processing of 09.0053 luw started at $(timestamp)"
php panini.php 09.0053 luw
echo "483 - Processing of 09.0053 low started at $(timestamp)"
php panini.php 09.0053 low
echo "484 - Processing of 10.0147 luw started at $(timestamp)"
php panini.php 10.0147 luw
echo "485 - Processing of 01.1125 luw started at $(timestamp)"
php panini.php 01.1125 luw
echo "486 - Processing of 01.0461 luw started at $(timestamp)"
php panini.php 01.0461 luw
echo "487 - Processing of 04.0302 luw started at $(timestamp)"
php panini.php 04.0302 luw
echo "488 - Processing of 06.0042 luw started at $(timestamp)"
php panini.php 06.0042 luw
echo "489 - Processing of 06.0043 luw started at $(timestamp)"
php panini.php 06.0043 luw
echo "490 - Processing of 06.0131 luw started at $(timestamp)"
php panini.php 06.0131 luw
echo "491 - Processing of 01.0023 luw started at $(timestamp)"
php panini.php 01.0023 luw
echo "492 - Processing of 10.0180 luw started at $(timestamp)"
php panini.php 10.0180 luw
echo "493 - Processing of 01.0655 luw started at $(timestamp)"
php panini.php 01.0655 luw
echo "494 - Processing of 01.1043 luw started at $(timestamp)"
php panini.php 01.1043 luw
echo "495 - Processing of 10.0049 luw started at $(timestamp)"
php panini.php 10.0049 luw
echo "496 - Processing of 04.0217 luw started at $(timestamp)"
php panini.php 04.0217 luw
echo "497 - Processing of 01.0737 luw started at $(timestamp)"
php panini.php 01.0737 luw
echo "498 - Processing of 01.1087 luw started at $(timestamp)"
php panini.php 01.1087 luw
echo "499 - Processing of 01.0281 luw started at $(timestamp)"
php panini.php 01.0281 luw
echo "500 - Processing of 01.0282 luw started at $(timestamp)"
php panini.php 01.0282 luw
echo "501 - Processing of 04.0161 luw started at $(timestamp)"
php panini.php 04.0161 luw
echo "502 - Processing of 10.0441 luw started at $(timestamp)"
php panini.php 10.0441 luw
echo "503 - Processing of 06.0033 luw started at $(timestamp)"
php panini.php 06.0033 luw
echo "504 - Processing of 09.0231 luw started at $(timestamp)"
php panini.php 09.0231 luw
echo "505 - Processing of 09.0231 low started at $(timestamp)"
php panini.php 09.0231 low
echo "506 - Processing of 01.0427 luw started at $(timestamp)"
php panini.php 01.0427 luw
echo "507 - Processing of 01.0575 luw started at $(timestamp)"
php panini.php 01.0575 luw
echo "508 - Processing of 01.0698 luw started at $(timestamp)"
php panini.php 01.0698 luw
echo "509 - Processing of 10.0417 luw started at $(timestamp)"
php panini.php 10.0417 luw
echo "510 - Processing of 01.0290 luw started at $(timestamp)"
php panini.php 01.0290 luw
echo "511 - Processing of 01.0036 luw started at $(timestamp)"
php panini.php 01.0036 luw
echo "512 - Processing of 10.0362 luw started at $(timestamp)"
php panini.php 10.0362 luw
echo "513 - Processing of 09.0375 luw started at $(timestamp)"
php panini.php 09.0375 luw
echo "514 - Processing of 01.0717 luw started at $(timestamp)"
php panini.php 01.0717 luw
echo "515 - Processing of 10.0279 luw started at $(timestamp)"
php panini.php 10.0279 luw
echo "516 - Processing of 09.0071 luw started at $(timestamp)"
php panini.php 09.0071 luw
echo "517 - Processing of 09.0071 low started at $(timestamp)"
php panini.php 09.0071 low
echo "518 - Processing of 10.0434 luw started at $(timestamp)"
php panini.php 10.0434 luw
echo "519 - Processing of 01.0224 luw started at $(timestamp)"
php panini.php 01.0224 luw
echo "520 - Processing of 01.0718 luw started at $(timestamp)"
php panini.php 01.0718 luw
echo "521 - Processing of 01.0738 luw started at $(timestamp)"
php panini.php 01.0738 luw
echo "522 - Processing of 01.0225 luw started at $(timestamp)"
php panini.php 01.0225 luw
echo "523 - Processing of 01.0228 luw started at $(timestamp)"
php panini.php 01.0228 luw
echo "524 - Processing of 01.0424 luw started at $(timestamp)"
php panini.php 01.0424 luw
echo "525 - Processing of 01.0428 luw started at $(timestamp)"
php panini.php 01.0428 luw
echo "526 - Processing of 01.0576 luw started at $(timestamp)"
php panini.php 01.0576 luw
echo "527 - Processing of 01.0699 luw started at $(timestamp)"
php panini.php 01.0699 luw
echo "528 - Processing of 01.0180 luw started at $(timestamp)"
php panini.php 01.0180 luw
echo "529 - Processing of 01.0179 luw started at $(timestamp)"
php panini.php 01.0179 luw
echo "530 - Processing of 10.0297 luw started at $(timestamp)"
php panini.php 10.0297 luw
echo "531 - Processing of 01.0867 luw started at $(timestamp)"
php panini.php 01.0867 luw
echo "532 - Processing of 10.0248 luw started at $(timestamp)"
php panini.php 10.0248 luw
echo "533 - Processing of 10.0125 luw started at $(timestamp)"
php panini.php 10.0125 luw
echo "534 - Processing of 01.0292 luw started at $(timestamp)"
php panini.php 01.0292 luw
echo "535 - Processing of 10.0298 luw started at $(timestamp)"
php panini.php 10.0298 luw
echo "536 - Processing of 01.0740 luw started at $(timestamp)"
php panini.php 01.0740 luw
echo "537 - Processing of 01.0812 luw started at $(timestamp)"
php panini.php 01.0812 luw
echo "538 - Processing of 01.0502 luw started at $(timestamp)"
php panini.php 01.0502 luw
echo "539 - Processing of 01.0739 luw started at $(timestamp)"
php panini.php 01.0739 luw
echo "540 - Processing of 01.1106 luw started at $(timestamp)"
php panini.php 01.1106 luw
echo "541 - Processing of 01.0848 luw started at $(timestamp)"
php panini.php 01.0848 luw
echo "542 - Processing of 06.0115 luw started at $(timestamp)"
php panini.php 06.0115 luw
echo "543 - Processing of 06.0064 luw started at $(timestamp)"
php panini.php 06.0064 luw
echo "544 - Processing of 01.0505 luw started at $(timestamp)"
php panini.php 01.0505 luw
echo "545 - Processing of 01.0503 luw started at $(timestamp)"
php panini.php 01.0503 luw
echo "546 - Processing of 06.0071 luw started at $(timestamp)"
php panini.php 06.0071 luw
echo "547 - Processing of 01.0741 luw started at $(timestamp)"
php panini.php 01.0741 luw
echo "548 - Processing of 10.0251 luw started at $(timestamp)"
php panini.php 10.0251 luw
echo "549 - Processing of 04.0050 luw started at $(timestamp)"
php panini.php 04.0050 luw
echo "550 - Processing of 06.0065 luw started at $(timestamp)"
php panini.php 06.0065 luw
echo "551 - Processing of 01.0506 luw started at $(timestamp)"
php panini.php 01.0506 luw
echo "552 - Processing of 03.0152 luw started at $(timestamp)"
php panini.php 03.0152 luw
echo "553 - Processing of 10.0015 luw started at $(timestamp)"
php panini.php 10.0015 luw
echo "554 - Processing of 01.1088 luw started at $(timestamp)"
php panini.php 01.1088 luw
echo "555 - Processing of 08.0007 luw started at $(timestamp)"
php panini.php 08.0007 luw
echo "556 - Processing of 01.0504 luw started at $(timestamp)"
php panini.php 01.0504 luw
echo "557 - Processing of 01.0805 luw started at $(timestamp)"
php panini.php 01.0805 luw
echo "558 - Processing of 01.0121 luw started at $(timestamp)"
php panini.php 01.0121 luw
echo "559 - Processing of 01.1107 luw started at $(timestamp)"
php panini.php 01.1107 luw
echo "560 - Processing of 02.0069 luw started at $(timestamp)"
php panini.php 02.0069 luw
echo "561 - Processing of 01.0098 luw started at $(timestamp)"
php panini.php 01.0098 luw
echo "562 - Processing of 01.0892 luw started at $(timestamp)"
php panini.php 01.0892 luw
echo "563 - Processing of 02.0007 law started at $(timestamp)"
php panini.php 02.0007 law
echo "564 - Processing of 02.0007 luw started at $(timestamp)"
php panini.php 02.0007 luw
echo "565 - Processing of 02.0007 low started at $(timestamp)"
php panini.php 02.0007 low
echo "566 - Processing of 02.0007 laN started at $(timestamp)"
php panini.php 02.0007 laN
echo "567 - Processing of 01.0217 luw started at $(timestamp)"
php panini.php 01.0217 luw
echo "568 - Processing of 10.0246 luw started at $(timestamp)"
php panini.php 10.0246 luw
echo "569 - Processing of 01.0331 luw started at $(timestamp)"
php panini.php 01.0331 luw
echo "570 - Processing of 01.0905 luw started at $(timestamp)"
php panini.php 01.0905 luw
echo "571 - Processing of 01.0312 luw started at $(timestamp)"
php panini.php 01.0312 luw
echo "572 - Processing of 10.0075 luw started at $(timestamp)"
php panini.php 10.0075 luw
echo "573 - Processing of 01.1003 luw started at $(timestamp)"
php panini.php 01.1003 luw
echo "574 - Processing of 01.1004 luw started at $(timestamp)"
php panini.php 01.1004 luw
echo "575 - Processing of 01.0914 luw started at $(timestamp)"
php panini.php 01.0914 luw
echo "576 - Processing of 10.0378 luw started at $(timestamp)"
php panini.php 10.0378 luw
echo "577 - Processing of 01.0071 luw started at $(timestamp)"
php panini.php 01.0071 luw
echo "578 - Processing of 10.0121 luw started at $(timestamp)"
php panini.php 10.0121 luw
echo "579 - Processing of 01.0465 luw started at $(timestamp)"
php panini.php 01.0465 luw
echo "580 - Processing of 01.0540 luw started at $(timestamp)"
php panini.php 01.0540 luw
echo "581 - Processing of 05.0540 luw started at $(timestamp)"
php panini.php 05.0540 luw
echo "582 - Processing of 10.0111 luw started at $(timestamp)"
php panini.php 10.0111 luw
echo "583 - Processing of 01.0550 luw started at $(timestamp)"
php panini.php 01.0550 luw
echo "584 - Processing of 01.0640 luw started at $(timestamp)"
php panini.php 01.0640 luw
echo "585 - Processing of 10.0274 luw started at $(timestamp)"
php panini.php 10.0274 luw
echo "586 - Processing of 06.0237 luw started at $(timestamp)"
php panini.php 06.0237 luw
echo "587 - Processing of 01.0814 luw started at $(timestamp)"
php panini.php 01.0814 luw
echo "588 - Processing of 10.0019 luw started at $(timestamp)"
php panini.php 10.0019 luw
echo "589 - Processing of 01.0491 luw started at $(timestamp)"
php panini.php 01.0491 luw
echo "590 - Processing of 01.0660 luw started at $(timestamp)"
php panini.php 01.0660 luw
echo "591 - Processing of 01.0966 luw started at $(timestamp)"
php panini.php 01.0966 luw
echo "592 - Processing of 10.0083 luw started at $(timestamp)"
php panini.php 10.0083 luw
echo "593 - Processing of 01.1034 luw started at $(timestamp)"
php panini.php 01.1034 luw
echo "594 - Processing of 10.0405 luw started at $(timestamp)"
php panini.php 10.0405 luw
echo "595 - Processing of 01.0830 luw started at $(timestamp)"
php panini.php 01.0830 luw
echo "596 - Processing of 10.0120 luw started at $(timestamp)"
php panini.php 10.0120 luw
echo "597 - Processing of 01.1023 luw started at $(timestamp)"
php panini.php 01.1023 luw
echo "598 - Processing of 10.0325 luw started at $(timestamp)"
php panini.php 10.0325 luw
echo "599 - Processing of 10.0005 luw started at $(timestamp)"
php panini.php 10.0005 luw
echo "600 - Processing of 05.0124 luw started at $(timestamp)"
php panini.php 05.0124 luw
echo "601 - Processing of 01.0353 luw started at $(timestamp)"
php panini.php 01.0353 luw
echo "602 - Processing of 10.0192 luw started at $(timestamp)"
php panini.php 10.0192 luw
echo "603 - Processing of 01.0039 luw started at $(timestamp)"
php panini.php 01.0039 luw
echo "604 - Processing of 10.0459 luw started at $(timestamp)"
php panini.php 10.0459 luw
echo "605 - Processing of 10.0002 luw started at $(timestamp)"
php panini.php 10.0002 luw
echo "606 - Processing of 05.0034 luw started at $(timestamp)"
php panini.php 05.0034 luw
echo "607 - Processing of 06.0082 luw started at $(timestamp)"
php panini.php 06.0082 luw
echo "608 - Processing of 01.0611 luw started at $(timestamp)"
php panini.php 01.0611 luw
echo "609 - Processing of 10.0364 luw started at $(timestamp)"
php panini.php 10.0364 luw
echo "610 - Processing of 10.0305 luw started at $(timestamp)"
php panini.php 10.0305 luw
echo "611 - Processing of 01.1022 luw started at $(timestamp)"
php panini.php 01.1022 luw
echo "612 - Processing of 01.0446 luw started at $(timestamp)"
php panini.php 01.0446 luw
echo "613 - Processing of 01.1021 luw started at $(timestamp)"
php panini.php 01.1021 luw
echo "614 - Processing of 10.0085 luw started at $(timestamp)"
php panini.php 10.0085 luw
echo "615 - Processing of 01.0591 luw started at $(timestamp)"
php panini.php 01.0591 luw
echo "616 - Processing of 06.0103 luw started at $(timestamp)"
php panini.php 06.0103 luw
echo "617 - Processing of 10.0104 luw started at $(timestamp)"
php panini.php 10.0104 luw
echo "618 - Processing of 10.0036 luw started at $(timestamp)"
php panini.php 10.0036 luw
echo "619 - Processing of 06.0126 luw started at $(timestamp)"
php panini.php 06.0126 luw
echo "620 - Processing of 01.0402 luw started at $(timestamp)"
php panini.php 01.0402 luw
echo "621 - Processing of 10.0164 luw started at $(timestamp)"
php panini.php 10.0164 luw
echo "622 - Processing of 01.0368 luw started at $(timestamp)"
php panini.php 01.0368 luw
echo "623 - Processing of 10.0081 luw started at $(timestamp)"
php panini.php 10.0081 luw
echo "624 - Processing of 01.0469 luw started at $(timestamp)"
php panini.php 01.0469 luw
echo "625 - Processing of 01.0495 luw started at $(timestamp)"
php panini.php 01.0495 luw
echo "626 - Processing of 10.0130 luw started at $(timestamp)"
php panini.php 10.0130 luw
echo "627 - Processing of 10.0001 luw started at $(timestamp)"
php panini.php 10.0001 luw
echo "628 - Processing of 10.0091 luw started at $(timestamp)"
php panini.php 10.0091 luw
echo "629 - Processing of 01.0609 luw started at $(timestamp)"
php panini.php 01.0609 luw
echo "630 - Processing of 04.0053 luw started at $(timestamp)"
php panini.php 04.0053 luw
echo "631 - Processing of 10.0143 luw started at $(timestamp)"
php panini.php 10.0143 luw
echo "632 - Processing of 10.0026 luw started at $(timestamp)"
php panini.php 10.0026 luw
echo "633 - Processing of 01.0767 luw started at $(timestamp)"
php panini.php 01.0767 luw
echo "634 - Processing of 06.0049 luw started at $(timestamp)"
php panini.php 06.0049 luw
echo "635 - Processing of 10.0353 luw started at $(timestamp)"
php panini.php 10.0353 luw
echo "636 - Processing of 01.0615 luw started at $(timestamp)"
php panini.php 01.0615 luw
echo "637 - Processing of 01.0289 luw started at $(timestamp)"
php panini.php 01.0289 luw
echo "638 - Processing of 10.0275 luw started at $(timestamp)"
php panini.php 10.0275 luw
echo "639 - Processing of 01.0040 luw started at $(timestamp)"
php panini.php 01.0040 luw
echo "640 - Processing of 10.0114 luw started at $(timestamp)"
php panini.php 10.0114 luw
echo "641 - Processing of 10.0481 luw started at $(timestamp)"
php panini.php 10.0481 luw
echo "642 - Processing of 10.0359 luw started at $(timestamp)"
php panini.php 10.0359 luw
echo "643 - Processing of 10.0370 luw started at $(timestamp)"
php panini.php 10.0370 luw
echo "644 - Processing of 10.0062 luw started at $(timestamp)"
php panini.php 10.0062 luw
echo "645 - Processing of 01.0541 luw started at $(timestamp)"
php panini.php 01.0541 luw
echo "646 - Processing of 10.0078 luw started at $(timestamp)"
php panini.php 10.0078 luw
echo "647 - Processing of 01.1035 luw started at $(timestamp)"
php panini.php 01.1035 luw
echo "648 - Processing of 07.0003 law started at $(timestamp)"
php panini.php 07.0003 law
echo "649 - Processing of 07.0003 luw started at $(timestamp)"
php panini.php 07.0003 luw
echo "650 - Processing of 07.0003 low started at $(timestamp)"
php panini.php 07.0003 low
echo "651 - Processing of 07.0003 laN started at $(timestamp)"
php panini.php 07.0003 laN
echo "652 - Processing of 10.0469 luw started at $(timestamp)"
php panini.php 10.0469 luw
echo "653 - Processing of 06.0105 luw started at $(timestamp)"
php panini.php 06.0105 luw
echo "654 - Processing of 06.0120 luw started at $(timestamp)"
php panini.php 06.0120 luw
echo "655 - Processing of 06.0154 luw started at $(timestamp)"
php panini.php 06.0154 luw
echo "656 - Processing of 06.0099 luw started at $(timestamp)"
php panini.php 06.0099 luw
echo "657 - Processing of 07.0352 law started at $(timestamp)"
php panini.php 07.0352 law
echo "658 - Processing of 07.0352 luw started at $(timestamp)"
php panini.php 07.0352 luw
echo "659 - Processing of 07.0352 low started at $(timestamp)"
php panini.php 07.0352 low
echo "660 - Processing of 07.0352 laN started at $(timestamp)"
php panini.php 07.0352 laN
echo "661 - Processing of 10.0354 luw started at $(timestamp)"
php panini.php 10.0354 luw
echo "662 - Processing of 10.0480 luw started at $(timestamp)"
php panini.php 10.0480 luw
echo "663 - Processing of 10.0182 luw started at $(timestamp)"
php panini.php 10.0182 luw
echo "664 - Processing of 02.0066 luw started at $(timestamp)"
php panini.php 02.0066 luw
echo "665 - Processing of 01.0275 luw started at $(timestamp)"
php panini.php 01.0275 luw
echo "666 - Processing of 01.0276 luw started at $(timestamp)"
php panini.php 01.0276 luw
echo "667 - Processing of 01.0342 luw started at $(timestamp)"
php panini.php 01.0342 luw
echo "668 - Processing of 03.0025 luw started at $(timestamp)"
php panini.php 03.0025 luw
echo "669 - Processing of 04.0044 luw started at $(timestamp)"
php panini.php 04.0044 luw
echo "670 - Processing of 01.0463 luw started at $(timestamp)"
php panini.php 01.0463 luw
echo "671 - Processing of 01.0453 luw started at $(timestamp)"
php panini.php 01.0453 luw
echo "672 - Processing of 01.0542 luw started at $(timestamp)"
php panini.php 01.0542 luw
echo "673 - Processing of 10.0241 luw started at $(timestamp)"
php panini.php 10.0241 luw
echo "674 - Processing of 01.0813 luw started at $(timestamp)"
php panini.php 01.0813 luw
echo "675 - Processing of 06.0018 luw started at $(timestamp)"
php panini.php 06.0018 luw
echo "676 - Processing of 01.0967 luw started at $(timestamp)"
php panini.php 01.0967 luw
echo "677 - Processing of 01.0464 luw started at $(timestamp)"
php panini.php 01.0464 luw
echo "678 - Processing of 01.0784 luw started at $(timestamp)"
php panini.php 01.0784 luw
echo "679 - Processing of 10.0243 luw started at $(timestamp)"
php panini.php 10.0243 luw
echo "680 - Processing of 04.0184 luw started at $(timestamp)"
php panini.php 04.0184 luw
echo "681 - Processing of 10.0108 luw started at $(timestamp)"
php panini.php 10.0108 luw
echo "682 - Processing of 02.0067 luw started at $(timestamp)"
php panini.php 02.0067 luw
echo "683 - Processing of 02.0067 low started at $(timestamp)"
php panini.php 02.0067 low
echo "684 - Processing of 02.0067 luN started at $(timestamp)"
php panini.php 02.0067 luN
echo "685 - Processing of 10.0324 luw started at $(timestamp)"
php panini.php 10.0324 luw
echo "686 - Processing of 01.0642 luw started at $(timestamp)"
php panini.php 01.0642 luw
echo "687 - Processing of 01.1096 luw started at $(timestamp)"
php panini.php 01.1096 luw
echo "688 - Processing of 01.0678 luw started at $(timestamp)"
php panini.php 01.0678 luw
echo "689 - Processing of 01.0544 luw started at $(timestamp)"
php panini.php 01.0544 luw
echo "690 - Processing of 05.0035 luw started at $(timestamp)"
php panini.php 05.0035 luw
echo "691 - Processing of 01.0793 luw started at $(timestamp)"
php panini.php 01.0793 luw
echo "692 - Processing of 01.0643 luw started at $(timestamp)"
php panini.php 01.0643 luw
echo "693 - Processing of 01.1098 luw started at $(timestamp)"
php panini.php 01.1098 luw
echo "694 - Processing of 01.1110 luw started at $(timestamp)"
php panini.php 01.1110 luw
echo "695 - Processing of 01.0176 luw started at $(timestamp)"
php panini.php 01.0176 luw
echo "696 - Processing of 06.0107 luw started at $(timestamp)"
php panini.php 06.0107 luw
echo "697 - Processing of 06.0148 luw started at $(timestamp)"
php panini.php 06.0148 luw
echo "698 - Processing of 10.0051 luw started at $(timestamp)"
php panini.php 10.0051 luw
echo "699 - Processing of 06.0106 luw started at $(timestamp)"
php panini.php 06.0106 luw
echo "700 - Processing of 01.0032 luw started at $(timestamp)"
php panini.php 01.0032 luw
echo "701 - Processing of 06.0052 luw started at $(timestamp)"
php panini.php 06.0052 luw
echo "702 - Processing of 06.0371 luw started at $(timestamp)"
php panini.php 06.0371 luw
echo "703 - Processing of 04.0051 luw started at $(timestamp)"
php panini.php 04.0051 luw
echo "704 - Processing of 01.0776 luw started at $(timestamp)"
php panini.php 01.0776 luw
echo "705 - Processing of 01.0454 luw started at $(timestamp)"
php panini.php 01.0454 luw
echo "706 - Processing of 04.0027 luw started at $(timestamp)"
php panini.php 04.0027 luw
echo "707 - Processing of 10.0025 luw started at $(timestamp)"
php panini.php 10.0025 luw
echo "708 - Processing of 09.0346 luw started at $(timestamp)"
php panini.php 09.0346 luw
echo "709 - Processing of 09.0346 low started at $(timestamp)"
php panini.php 09.0346 low
echo "710 - Processing of 01.0703 luw started at $(timestamp)"
php panini.php 01.0703 luw
echo "711 - Processing of 01.0731 luw started at $(timestamp)"
php panini.php 01.0731 luw
echo "712 - Processing of 10.0118 luw started at $(timestamp)"
php panini.php 10.0118 luw
echo "713 - Processing of 09.0258 luw started at $(timestamp)"
php panini.php 09.0258 luw
echo "714 - Processing of 09.0258 low started at $(timestamp)"
php panini.php 09.0258 low
echo "715 - Processing of 10.0043 luw started at $(timestamp)"
php panini.php 10.0043 luw
echo "716 - Processing of 09.0034 low started at $(timestamp)"
php panini.php 09.0034 low
echo "717 - Processing of 01.1109 luw started at $(timestamp)"
php panini.php 01.1109 luw
echo "718 - Processing of 01.0043 luw started at $(timestamp)"
php panini.php 01.0043 luw
echo "719 - Processing of 10.0347 luw started at $(timestamp)"
php panini.php 10.0347 luw
echo "720 - Processing of 01.1097 luw started at $(timestamp)"
php panini.php 01.1097 luw
echo "721 - Processing of 01.0885 luw started at $(timestamp)"
php panini.php 01.0885 luw
echo "722 - Processing of 01.0916 luw started at $(timestamp)"
php panini.php 01.0916 luw
echo "723 - Processing of 01.0965 luw started at $(timestamp)"
php panini.php 01.0965 luw
echo "724 - Processing of 01.0343 luw started at $(timestamp)"
php panini.php 01.0343 luw
echo "725 - Processing of 01.0543 luw started at $(timestamp)"
php panini.php 01.0543 luw
echo "726 - Processing of 01.0815 luw started at $(timestamp)"
php panini.php 01.0815 luw
echo "727 - Processing of 06.0020 luw started at $(timestamp)"
php panini.php 06.0020 luw
echo "728 - Processing of 01.0785 luw started at $(timestamp)"
php panini.php 01.0785 luw
echo "729 - Processing of 01.1036 luw started at $(timestamp)"
php panini.php 01.1036 luw
echo "730 - Processing of 09.0028 luw started at $(timestamp)"
php panini.php 09.0028 luw
echo "731 - Processing of 09.0028 low started at $(timestamp)"
php panini.php 09.0028 low
echo "732 - Processing of 04.0026 luw started at $(timestamp)"
php panini.php 04.0026 luw
echo "733 - Processing of 10.0135 luw started at $(timestamp)"
php panini.php 10.0135 luw
echo "734 - Processing of 01.0968 luw started at $(timestamp)"
php panini.php 01.0968 luw
echo "735 - Processing of 01.0108 luw started at $(timestamp)"
php panini.php 01.0108 luw
echo "736 - Processing of 01.0109 luw started at $(timestamp)"
php panini.php 01.0109 luw
echo "737 - Processing of 01.0969 luw started at $(timestamp)"
php panini.php 01.0969 luw
echo "738 - Processing of 10.0196 luw started at $(timestamp)"
php panini.php 10.0196 luw
echo "739 - Processing of 06.0189 luw started at $(timestamp)"
php panini.php 06.0189 luw
echo "740 - Processing of 04.0197 luw started at $(timestamp)"
php panini.php 04.0197 luw
echo "741 - Processing of 10.0098 luw started at $(timestamp)"
php panini.php 10.0098 luw
echo "742 - Processing of 04.0030 luw started at $(timestamp)"
php panini.php 04.0030 luw
echo "743 - Processing of 01.1123 luw started at $(timestamp)"
php panini.php 01.1123 luw
echo "744 - Processing of 01.0103 luw started at $(timestamp)"
php panini.php 01.0103 luw
echo "745 - Processing of 10.0254 luw started at $(timestamp)"
php panini.php 10.0254 luw
echo "746 - Processing of 01.0778 luw started at $(timestamp)"
php panini.php 01.0778 luw
echo "747 - Processing of 01.0124 luw started at $(timestamp)"
php panini.php 01.0124 luw
echo "748 - Processing of 01.0756 luw started at $(timestamp)"
php panini.php 01.0756 luw
echo "749 - Processing of 01.0743 luw started at $(timestamp)"
php panini.php 01.0743 luw
echo "750 - Processing of 01.0125 luw started at $(timestamp)"
php panini.php 01.0125 luw
echo "751 - Processing of 01.0158 luw started at $(timestamp)"
php panini.php 01.0158 luw
echo "752 - Processing of 01.0218 luw started at $(timestamp)"
php panini.php 01.0218 luw
echo "753 - Processing of 07.0022 luw started at $(timestamp)"
php panini.php 07.0022 luw
echo "754 - Processing of 01.0345 luw started at $(timestamp)"
php panini.php 01.0345 luw
echo "755 - Processing of 10.0064 luw started at $(timestamp)"
php panini.php 10.0064 luw
echo "756 - Processing of 10.0332 luw started at $(timestamp)"
php panini.php 10.0332 luw
echo "757 - Processing of 01.0314 luw started at $(timestamp)"
php panini.php 01.0314 luw
echo "758 - Processing of 08.0377 luw started at $(timestamp)"
php panini.php 08.0377 luw
echo "759 - Processing of 10.0198 luw started at $(timestamp)"
php panini.php 10.0198 luw
echo "760 - Processing of 04.0350 luw started at $(timestamp)"
php panini.php 04.0350 luw
echo "761 - Processing of 10.0054 luw started at $(timestamp)"
php panini.php 10.0054 luw
echo "762 - Processing of 04.0099 luw started at $(timestamp)"
php panini.php 04.0099 luw
echo "763 - Processing of 01.0551 luw started at $(timestamp)"
php panini.php 01.0551 luw
echo "764 - Processing of 10.0311 luw started at $(timestamp)"
php panini.php 10.0311 luw
echo "765 - Processing of 10.0201 luw started at $(timestamp)"
php panini.php 10.0201 luw
echo "766 - Processing of 01.0259 luw started at $(timestamp)"
php panini.php 01.0259 luw
echo "767 - Processing of 01.0060 luw started at $(timestamp)"
php panini.php 01.0060 luw
echo "768 - Processing of 10.0087 luw started at $(timestamp)"
php panini.php 10.0087 luw
echo "769 - Processing of 04.0109 luw started at $(timestamp)"
php panini.php 04.0109 luw
echo "770 - Processing of 01.0562 luw started at $(timestamp)"
php panini.php 01.0562 luw
echo "771 - Processing of 05.0022 luw started at $(timestamp)"
php panini.php 05.0022 luw
echo "772 - Processing of 01.0110 luw started at $(timestamp)"
php panini.php 01.0110 luw
echo "773 - Processing of 05.0023 luw started at $(timestamp)"
php panini.php 05.0023 luw
echo "774 - Processing of 01.1126 luw started at $(timestamp)"
php panini.php 01.1126 luw
echo "775 - Processing of 10.0154 luw started at $(timestamp)"
php panini.php 10.0154 luw
echo "776 - Processing of 01.0420 luw started at $(timestamp)"
php panini.php 01.0420 luw
echo "777 - Processing of 04.0017 luw started at $(timestamp)"
php panini.php 04.0017 luw
echo "778 - Processing of 01.0612 luw started at $(timestamp)"
php panini.php 01.0612 luw
echo "779 - Processing of 01.0613 luw started at $(timestamp)"
php panini.php 01.0613 luw
echo "780 - Processing of 01.0111 luw started at $(timestamp)"
php panini.php 01.0111 luw
echo "781 - Processing of 04.0018 luw started at $(timestamp)"
php panini.php 04.0018 luw
echo "782 - Processing of 10.0454 luw started at $(timestamp)"
php panini.php 10.0454 luw
echo "783 - Processing of 01.0646 luw started at $(timestamp)"
php panini.php 01.0646 luw
echo "784 - Processing of 02.0029 luw started at $(timestamp)"
php panini.php 02.0029 luw
echo "785 - Processing of 10.0044 luw started at $(timestamp)"
php panini.php 10.0044 luw
echo "786 - Processing of 01.0277 luw started at $(timestamp)"
php panini.php 01.0277 luw
echo "787 - Processing of 10.0285 luw started at $(timestamp)"
php panini.php 10.0285 luw
echo "788 - Processing of 10.0045 luw started at $(timestamp)"
php panini.php 10.0045 luw
echo "789 - Processing of 01.0278 luw started at $(timestamp)"
php panini.php 01.0278 luw
echo "790 - Processing of 06.0116 luw started at $(timestamp)"
php panini.php 06.0116 luw
echo "791 - Processing of 01.0406 luw started at $(timestamp)"
php panini.php 01.0406 luw
echo "792 - Processing of 06.0058 luw started at $(timestamp)"
php panini.php 06.0058 luw
echo "793 - Processing of 10.0166 luw started at $(timestamp)"
php panini.php 10.0166 luw
echo "794 - Processing of 01.0309 luw started at $(timestamp)"
php panini.php 01.0309 luw
echo "795 - Processing of 10.0489 luw started at $(timestamp)"
php panini.php 10.0489 luw
echo "796 - Processing of 06.0001 luw started at $(timestamp)"
php panini.php 06.0001 luw
echo "797 - Processing of 06.0032 luw started at $(timestamp)"
php panini.php 06.0032 luw
echo "798 - Processing of 01.0470 luw started at $(timestamp)"
php panini.php 01.0470 luw
echo "799 - Processing of 06.0034 luw started at $(timestamp)"
php panini.php 06.0034 luw
echo "800 - Processing of 01.0474 luw started at $(timestamp)"
php panini.php 01.0474 luw
echo "801 - Processing of 09.0057 luw started at $(timestamp)"
php panini.php 09.0057 luw
echo "802 - Processing of 09.0057 low started at $(timestamp)"
php panini.php 09.0057 low
echo "803 - Processing of 04.0156 luw started at $(timestamp)"
php panini.php 04.0156 luw
echo "804 - Processing of 01.0856 luw started at $(timestamp)"
php panini.php 01.0856 luw
echo "805 - Processing of 01.0471 luw started at $(timestamp)"
php panini.php 01.0471 luw
echo "806 - Processing of 01.0475 luw started at $(timestamp)"
php panini.php 01.0475 luw
echo "807 - Processing of 06.0035 luw started at $(timestamp)"
php panini.php 06.0035 luw
echo "808 - Processing of 10.0160 luw started at $(timestamp)"
php panini.php 10.0160 luw
echo "809 - Processing of 01.0494 luw started at $(timestamp)"
php panini.php 01.0494 luw
echo "810 - Processing of 03.0022 luw started at $(timestamp)"
php panini.php 03.0022 luw
echo "811 - Processing of 01.0651 luw started at $(timestamp)"
php panini.php 01.0651 luw
echo "812 - Processing of 10.0088 luw started at $(timestamp)"
php panini.php 10.0088 luw
echo "813 - Processing of 04.0081 luw started at $(timestamp)"
php panini.php 04.0081 luw
echo "814 - Processing of 01.0807 luw started at $(timestamp)"
php panini.php 01.0807 luw
echo "815 - Processing of 01.0838 luw started at $(timestamp)"
php panini.php 01.0838 luw
echo "816 - Processing of 01.0407 luw started at $(timestamp)"
php panini.php 01.0407 luw
echo "817 - Processing of 10.0212 luw started at $(timestamp)"
php panini.php 10.0212 luw
echo "818 - Processing of 04.0047 luw started at $(timestamp)"
php panini.php 04.0047 luw
echo "819 - Processing of 01.0605 luw started at $(timestamp)"
php panini.php 01.0605 luw
echo "820 - Processing of 01.0768 luw started at $(timestamp)"
php panini.php 01.0768 luw
echo "821 - Processing of 06.0077 luw started at $(timestamp)"
php panini.php 06.0077 luw
echo "822 - Processing of 01.0750 luw started at $(timestamp)"
php panini.php 01.0750 luw
echo "823 - Processing of 08.0006 luw started at $(timestamp)"
php panini.php 08.0006 luw
echo "824 - Processing of 07.0009 law started at $(timestamp)"
php panini.php 07.0009 law
echo "825 - Processing of 07.0009 luw started at $(timestamp)"
php panini.php 07.0009 luw
echo "826 - Processing of 07.0009 low started at $(timestamp)"
php panini.php 07.0009 low
echo "827 - Processing of 07.0009 laN started at $(timestamp)"
php panini.php 07.0009 laN
echo "828 - Processing of 06.0355 luw started at $(timestamp)"
php panini.php 06.0355 luw
echo "829 - Processing of 10.0028 luw started at $(timestamp)"
php panini.php 10.0028 luw
echo "830 - Processing of 10.0092 luw started at $(timestamp)"
php panini.php 10.0092 luw
echo "831 - Processing of 05.0351 luw started at $(timestamp)"
php panini.php 05.0351 luw
echo "832 - Processing of 04.0028 luw started at $(timestamp)"
php panini.php 04.0028 luw
echo "833 - Processing of 06.0030 luw started at $(timestamp)"
php panini.php 06.0030 luw
echo "834 - Processing of 06.0029 luw started at $(timestamp)"
php panini.php 06.0029 luw
echo "835 - Processing of 06.0031 luw started at $(timestamp)"
php panini.php 06.0031 luw
echo "836 - Processing of 04.0141 luw started at $(timestamp)"
php panini.php 04.0141 luw
echo "837 - Processing of 06.0075 luw started at $(timestamp)"
php panini.php 06.0075 luw
echo "838 - Processing of 07.0018 luw started at $(timestamp)"
php panini.php 07.0018 luw
echo "839 - Processing of 01.1124 luw started at $(timestamp)"
php panini.php 01.1124 luw
echo "840 - Processing of 01.0263 luw started at $(timestamp)"
php panini.php 01.0263 luw
echo "841 - Processing of 01.0421 luw started at $(timestamp)"
php panini.php 01.0421 luw
echo "842 - Processing of 01.0572 luw started at $(timestamp)"
php panini.php 01.0572 luw
echo "843 - Processing of 10.0292 luw started at $(timestamp)"
php panini.php 10.0292 luw
echo "844 - Processing of 01.0748 luw started at $(timestamp)"
php panini.php 01.0748 luw
echo "845 - Processing of 01.0172 luw started at $(timestamp)"
php panini.php 01.0172 luw
echo "846 - Processing of 01.0102 luw started at $(timestamp)"
php panini.php 01.0102 luw
echo "847 - Processing of 01.0160 luw started at $(timestamp)"
php panini.php 01.0160 luw
echo "848 - Processing of 01.0072 luw started at $(timestamp)"
php panini.php 01.0072 luw
echo "849 - Processing of 01.0434 luw started at $(timestamp)"
php panini.php 01.0434 luw
echo "850 - Processing of 04.0269 luw started at $(timestamp)"
php panini.php 04.0269 luw
echo "851 - Processing of 10.0011 luw started at $(timestamp)"
php panini.php 10.0011 luw
echo "852 - Processing of 01.0173 luw started at $(timestamp)"
php panini.php 01.0173 luw
echo "853 - Processing of 10.0102 luw started at $(timestamp)"
php panini.php 10.0102 luw
echo "854 - Processing of 06.0221 luw started at $(timestamp)"
php panini.php 06.0221 luw
echo "855 - Processing of 01.0472 luw started at $(timestamp)"
php panini.php 01.0472 luw
echo "856 - Processing of 01.0476 luw started at $(timestamp)"
php panini.php 01.0476 luw
echo "857 - Processing of 01.0473 luw started at $(timestamp)"
php panini.php 01.0473 luw
echo "858 - Processing of 01.0477 luw started at $(timestamp)"
php panini.php 01.0477 luw
echo "859 - Processing of 01.1120 luw started at $(timestamp)"
php panini.php 01.1120 luw
echo "860 - Processing of 01.0104 luw started at $(timestamp)"
php panini.php 01.0104 luw
echo "861 - Processing of 01.0744 luw started at $(timestamp)"
php panini.php 01.0744 luw
echo "862 - Processing of 01.0159 luw started at $(timestamp)"
php panini.php 01.0159 luw
echo "863 - Processing of 06.0021 luw started at $(timestamp)"
php panini.php 06.0021 luw
echo "864 - Processing of 01.0219 luw started at $(timestamp)"
php panini.php 01.0219 luw
echo "865 - Processing of 01.0884 luw started at $(timestamp)"
php panini.php 01.0884 luw
echo "866 - Processing of 01.1156 luw started at $(timestamp)"
php panini.php 01.1156 luw
echo "867 - Processing of 01.0635 luw started at $(timestamp)"
php panini.php 01.0635 luw
echo "868 - Processing of 01.0167 luw started at $(timestamp)"
php panini.php 01.0167 luw
echo "869 - Processing of 06.0117 luw started at $(timestamp)"
php panini.php 06.0117 luw
echo "870 - Processing of 01.0652 luw started at $(timestamp)"
php panini.php 01.0652 luw
echo "871 - Processing of 10.0295 luw started at $(timestamp)"
php panini.php 10.0295 luw
echo "872 - Processing of 10.0193 luw started at $(timestamp)"
php panini.php 10.0193 luw
echo "873 - Processing of 10.0317 luw started at $(timestamp)"
php panini.php 10.0317 luw
echo "874 - Processing of 10.0194 luw started at $(timestamp)"
php panini.php 10.0194 luw
echo "875 - Processing of 01.0874 luw started at $(timestamp)"
php panini.php 01.0874 luw
echo "876 - Processing of 01.0692 luw started at $(timestamp)"
php panini.php 01.0692 luw
echo "877 - Processing of 05.0030 luw started at $(timestamp)"
php panini.php 05.0030 luw
echo "878 - Processing of 01.0181 luw started at $(timestamp)"
php panini.php 01.0181 luw
echo "879 - Processing of 10.0472 luw started at $(timestamp)"
php panini.php 10.0472 luw
echo "880 - Processing of 01.0017 luw started at $(timestamp)"
php panini.php 01.0017 luw
echo "881 - Processing of 01.0008 luw started at $(timestamp)"
php panini.php 01.0008 luw
echo "882 - Processing of 04.0100 luw started at $(timestamp)"
php panini.php 04.0100 luw
echo "883 - Processing of 05.0026 luw started at $(timestamp)"
php panini.php 05.0026 luw
echo "884 - Processing of 01.0553 luw started at $(timestamp)"
php panini.php 01.0553 luw
echo "885 - Processing of 02.0068 luw started at $(timestamp)"
php panini.php 02.0068 luw
echo "886 - Processing of 02.0068 viDiliN started at $(timestamp)"
php panini.php 02.0068 viDiliN
echo "887 - Processing of 10.0281 luw started at $(timestamp)"
php panini.php 10.0281 luw
echo "888 - Processing of 01.0629 luw started at $(timestamp)"
php panini.php 01.0629 luw
echo "889 - Processing of 05.0036 luw started at $(timestamp)"
php panini.php 05.0036 luw
echo "890 - Processing of 10.0110 luw started at $(timestamp)"
php panini.php 10.0110 luw
echo "891 - Processing of 04.0195 luw started at $(timestamp)"
php panini.php 04.0195 luw
echo "892 - Processing of 03.0010 law started at $(timestamp)"
php panini.php 03.0010 law
echo "893 - Processing of 03.0010 luw started at $(timestamp)"
php panini.php 03.0010 luw
echo "894 - Processing of 03.0010 low started at $(timestamp)"
php panini.php 03.0010 low
echo "895 - Processing of 03.0010 laN started at $(timestamp)"
php panini.php 03.0010 laN
echo "896 - Processing of 01.1149 luw started at $(timestamp)"
php panini.php 01.1149 luw
echo "897 - Processing of 01.1149 lfw started at $(timestamp)"
php panini.php 01.1149 lfw
echo "898 - Processing of 01.1149 lfN started at $(timestamp)"
php panini.php 01.1149 lfN
echo "899 - Processing of 01.1025 luw started at $(timestamp)"
php panini.php 01.1025 luw
echo "900 - Processing of 01.1041 luw started at $(timestamp)"
php panini.php 01.1041 luw
echo "901 - Processing of 01.0676 luw started at $(timestamp)"
php panini.php 01.0676 luw
echo "902 - Processing of 04.0249 luw started at $(timestamp)"
php panini.php 04.0249 luw
echo "903 - Processing of 10.0230 luw started at $(timestamp)"
php panini.php 10.0230 luw
echo "904 - Processing of 06.0003 luw started at $(timestamp)"
php panini.php 06.0003 luw
echo "905 - Processing of 02.0005 law started at $(timestamp)"
php panini.php 02.0005 law
echo "906 - Processing of 02.0005 luw started at $(timestamp)"
php panini.php 02.0005 luw
echo "907 - Processing of 02.0005 low started at $(timestamp)"
php panini.php 02.0005 low
echo "908 - Processing of 02.0005 laN started at $(timestamp)"
php panini.php 02.0005 laN
echo "909 - Processing of 04.0029 luw started at $(timestamp)"
php panini.php 04.0029 luw
echo "910 - Processing of 01.0693 luw started at $(timestamp)"
php panini.php 01.0693 luw
echo "911 - Processing of 02.0071 law started at $(timestamp)"
php panini.php 02.0071 law
echo "912 - Processing of 02.0071 luw started at $(timestamp)"
php panini.php 02.0071 luw
echo "913 - Processing of 02.0071 low started at $(timestamp)"
php panini.php 02.0071 low
echo "914 - Processing of 02.0071 laN started at $(timestamp)"
php panini.php 02.0071 laN
echo "915 - Processing of 04.0045 luw started at $(timestamp)"
php panini.php 04.0045 luw
echo "916 - Processing of 01.1094 luw started at $(timestamp)"
php panini.php 01.1094 luw
echo "917 - Processing of 05.0476 luw started at $(timestamp)"
php panini.php 05.0476 luw
echo "918 - Processing of 01.0653 luw started at $(timestamp)"
php panini.php 01.0653 luw
echo "919 - Processing of 10.0089 luw started at $(timestamp)"
php panini.php 10.0089 luw
echo "920 - Processing of 04.0082 luw started at $(timestamp)"
php panini.php 04.0082 luw
echo "921 - Processing of 01.0839 luw started at $(timestamp)"
php panini.php 01.0839 luw
echo "922 - Processing of 02.0004 law started at $(timestamp)"
php panini.php 02.0004 law
echo "923 - Processing of 02.0004 luw started at $(timestamp)"
php panini.php 02.0004 luw
echo "924 - Processing of 02.0004 low started at $(timestamp)"
php panini.php 02.0004 low
echo "925 - Processing of 02.0004 laN started at $(timestamp)"
php panini.php 02.0004 laN
echo "926 - Processing of 06.0835 luw started at $(timestamp)"
php panini.php 06.0835 luw
echo "927 - Processing of 01.0147 luw started at $(timestamp)"
php panini.php 01.0147 luw
echo "928 - Processing of 06.0356 luw started at $(timestamp)"
php panini.php 06.0356 luw
echo "929 - Processing of 06.0038 luw started at $(timestamp)"
php panini.php 06.0038 luw
echo "930 - Processing of 06.0357 luw started at $(timestamp)"
php panini.php 06.0357 luw
echo "931 - Processing of 10.0048 luw started at $(timestamp)"
php panini.php 10.0048 luw
echo "932 - Processing of 10.0358 luw started at $(timestamp)"
php panini.php 10.0358 luw
echo "933 - Processing of 06.0037 luw started at $(timestamp)"
php panini.php 06.0037 luw
echo "934 - Processing of 06.0039 luw started at $(timestamp)"
php panini.php 06.0039 luw
echo "935 - Processing of 01.0834 luw started at $(timestamp)"
php panini.php 01.0834 luw
echo "936 - Processing of 01.0920 luw started at $(timestamp)"
php panini.php 01.0920 luw
echo "937 - Processing of 09.0026 luw started at $(timestamp)"
php panini.php 09.0026 luw
echo "938 - Processing of 09.0026 low started at $(timestamp)"
php panini.php 09.0026 low
echo "939 - Processing of 05.0037 luw started at $(timestamp)"
php panini.php 05.0037 luw
echo "940 - Processing of 01.1117 luw started at $(timestamp)"
php panini.php 01.1117 luw
echo "941 - Processing of 01.0573 luw started at $(timestamp)"
php panini.php 01.0573 luw
echo "942 - Processing of 02.0035 luw started at $(timestamp)"
php panini.php 02.0035 luw
echo "943 - Processing of 01.0842 luw started at $(timestamp)"
php panini.php 01.0842 luw
echo "944 - Processing of 01.0537 luw started at $(timestamp)"
php panini.php 01.0537 luw
echo "945 - Processing of 01.0132 luw started at $(timestamp)"
php panini.php 01.0132 luw
echo "946 - Processing of 01.0120 luw started at $(timestamp)"
php panini.php 01.0120 luw
echo "947 - Processing of 01.0763 luw started at $(timestamp)"
php panini.php 01.0763 luw
echo "948 - Processing of 01.0322 luw started at $(timestamp)"
php panini.php 01.0322 luw
echo "949 - Processing of 01.0733 luw started at $(timestamp)"
php panini.php 01.0733 luw
echo "950 - Processing of 01.1095 luw started at $(timestamp)"
php panini.php 01.1095 luw
echo "951 - Processing of 06.0063 luw started at $(timestamp)"
php panini.php 06.0063 luw
echo "952 - Processing of 04.0094 luw started at $(timestamp)"
php panini.php 04.0094 luw
echo "953 - Processing of 09.0013 luw started at $(timestamp)"
php panini.php 09.0013 luw
echo "954 - Processing of 09.0013 low started at $(timestamp)"
php panini.php 09.0013 low
echo "955 - Processing of 01.0083 luw started at $(timestamp)"
php panini.php 01.0083 luw
echo "956 - Processing of 02.0003 law started at $(timestamp)"
php panini.php 02.0003 law
echo "957 - Processing of 02.0003 luw started at $(timestamp)"
php panini.php 02.0003 luw
echo "958 - Processing of 02.0003 low started at $(timestamp)"
php panini.php 02.0003 low
echo "959 - Processing of 02.0003 laN started at $(timestamp)"
php panini.php 02.0003 laN
echo "960 - Processing of 01.1083 luw started at $(timestamp)"
php panini.php 01.1083 luw
echo "961 - Processing of 01.0522 luw started at $(timestamp)"
php panini.php 01.0522 luw
echo "962 - Processing of 03.0024 luw started at $(timestamp)"
php panini.php 03.0024 luw
echo "963 - Processing of 01.0681 luw started at $(timestamp)"
php panini.php 01.0681 luw
echo "964 - Processing of 03.0011 luw started at $(timestamp)"
php panini.php 03.0011 luw
echo "965 - Processing of 01.0685 luw started at $(timestamp)"
php panini.php 01.0685 luw
echo "966 - Processing of 06.0142 luw started at $(timestamp)"
php panini.php 06.0142 luw
echo "967 - Processing of 01.0687 luw started at $(timestamp)"
php panini.php 01.0687 luw
echo "968 - Processing of 01.0677 luw started at $(timestamp)"
php panini.php 01.0677 luw
echo "969 - Processing of 03.0023 luw started at $(timestamp)"
php panini.php 03.0023 luw
echo "970 - Processing of 04.0031 luw started at $(timestamp)"
php panini.php 04.0031 luw
echo "971 - Processing of 06.0133 luw started at $(timestamp)"
php panini.php 06.0133 luw
echo "972 - Processing of 05.0009 luw started at $(timestamp)"
php panini.php 05.0009 luw
echo "973 - Processing of 01.0686 luw started at $(timestamp)"
php panini.php 01.0686 luw
echo "974 - Processing of 10.0303 luw started at $(timestamp)"
php panini.php 10.0303 luw
echo "975 - Processing of 01.0654 luw started at $(timestamp)"
php panini.php 01.0654 luw
echo "976 - Processing of 05.0133 luw started at $(timestamp)"
php panini.php 05.0133 luw
echo "977 - Processing of 10.0010 luw started at $(timestamp)"
php panini.php 10.0010 luw
echo "978 - Processing of 10.0010 lfw started at $(timestamp)"
php panini.php 10.0010 lfw
echo "979 - Processing of 10.0010 lfN started at $(timestamp)"
php panini.php 10.0010 lfN
echo "980 - Processing of 09.0372 luw started at $(timestamp)"
php panini.php 09.0372 luw
echo "981 - Processing of 09.0372 low started at $(timestamp)"
php panini.php 09.0372 low
echo "982 - Processing of 01.0462 luw started at $(timestamp)"
php panini.php 01.0462 luw
echo "983 - Processing of 04.0048 luw started at $(timestamp)"
php panini.php 04.0048 luw
echo "984 - Processing of 10.0141 luw started at $(timestamp)"
php panini.php 10.0141 luw
echo "985 - Processing of 10.0140 luw started at $(timestamp)"
php panini.php 10.0140 luw
echo "986 - Processing of 10.0139 luw started at $(timestamp)"
php panini.php 10.0139 luw
echo "987 - Processing of 01.1047 luw started at $(timestamp)"
php panini.php 01.1047 luw
echo "988 - Processing of 01.1115 luw started at $(timestamp)"
php panini.php 01.1115 luw
echo "989 - Processing of 01.0249 luw started at $(timestamp)"
php panini.php 01.0249 luw
echo "990 - Processing of 01.0250 luw started at $(timestamp)"
php panini.php 01.0250 luw
echo "991 - Processing of 05.0388 luw started at $(timestamp)"
php panini.php 05.0388 luw
echo "992 - Processing of 09.0029 luw started at $(timestamp)"
php panini.php 09.0029 luw
echo "993 - Processing of 09.0029 low started at $(timestamp)"
php panini.php 09.0029 low
echo "994 - Processing of 01.0433 luw started at $(timestamp)"
php panini.php 01.0433 luw
echo "995 - Processing of 01.0634 luw started at $(timestamp)"
php panini.php 01.0634 luw
echo "996 - Processing of 01.0766 luw started at $(timestamp)"
php panini.php 01.0766 luw
echo "997 - Processing of 01.0245 luw started at $(timestamp)"
php panini.php 01.0245 luw
echo "998 - Processing of 01.0246 luw started at $(timestamp)"
php panini.php 01.0246 luw
echo "999 - Processing of 01.0529 luw started at $(timestamp)"
php panini.php 01.0529 luw
echo "1000 - Processing of 10.0060 luw started at $(timestamp)"
php panini.php 10.0060 luw
echo "1001 - Processing of 09.0270 luw started at $(timestamp)"
php panini.php 09.0270 luw
echo "1002 - Processing of 09.0270 low started at $(timestamp)"
php panini.php 09.0270 low
echo "1003 - Processing of 01.0133 luw started at $(timestamp)"
php panini.php 01.0133 luw
echo "1004 - Processing of 01.0764 luw started at $(timestamp)"
php panini.php 01.0764 luw
echo "1005 - Processing of 01.0323 luw started at $(timestamp)"
php panini.php 01.0323 luw
echo "1006 - Processing of 01.0253 luw started at $(timestamp)"
php panini.php 01.0253 luw
echo "1007 - Processing of 06.0135 luw started at $(timestamp)"
php panini.php 06.0135 luw
echo "1008 - Processing of 01.1093 luw started at $(timestamp)"
php panini.php 01.1093 luw
echo "1009 - Processing of 01.0084 luw started at $(timestamp)"
php panini.php 01.0084 luw
echo "1010 - Processing of 01.0858 luw started at $(timestamp)"
php panini.php 01.0858 luw
echo "1011 - Processing of 01.0251 luw started at $(timestamp)"
php panini.php 01.0251 luw
echo "1012 - Processing of 01.0252 luw started at $(timestamp)"
php panini.php 01.0252 luw
echo "1013 - Processing of 01.0521 luw started at $(timestamp)"
php panini.php 01.0521 luw
echo "1014 - Processing of 10.0431 luw started at $(timestamp)"
php panini.php 10.0431 luw
echo "1015 - Processing of 01.0933 luw started at $(timestamp)"
php panini.php 01.0933 luw
echo "1016 - Processing of 01.0962 luw started at $(timestamp)"
php panini.php 01.0962 luw
echo "1017 - Processing of 01.0765 luw started at $(timestamp)"
php panini.php 01.0765 luw
echo "1018 - Processing of 01.1089 luw started at $(timestamp)"
php panini.php 01.1089 luw
echo "1019 - Processing of 10.0082 luw started at $(timestamp)"
php panini.php 10.0082 luw
echo "1020 - Processing of 01.0752 luw started at $(timestamp)"
php panini.php 01.0752 luw
echo "1021 - Processing of 01.0142 luw started at $(timestamp)"
php panini.php 01.0142 luw
echo "1022 - Processing of 01.0143 luw started at $(timestamp)"
php panini.php 01.0143 luw
echo "1023 - Processing of 01.0347 luw started at $(timestamp)"
php panini.php 01.0347 luw
echo "1024 - Processing of 10.0322 luw started at $(timestamp)"
php panini.php 10.0322 luw
echo "1025 - Processing of 10.0018 luw started at $(timestamp)"
php panini.php 10.0018 luw
echo "1026 - Processing of 01.0890 luw started at $(timestamp)"
php panini.php 01.0890 luw
echo "1027 - Processing of 10.0309 luw started at $(timestamp)"
php panini.php 10.0309 luw
echo "1028 - Processing of 01.0056 luw started at $(timestamp)"
php panini.php 01.0056 luw
echo "1029 - Processing of 01.0070 luw started at $(timestamp)"
php panini.php 01.0070 luw
echo "1030 - Processing of 09.0056 luw started at $(timestamp)"
php panini.php 09.0056 luw
echo "1031 - Processing of 09.0056 low started at $(timestamp)"
php panini.php 09.0056 low
echo "1032 - Processing of 04.0155 luw started at $(timestamp)"
php panini.php 04.0155 luw
echo "1033 - Processing of 01.0855 luw started at $(timestamp)"
php panini.php 01.0855 luw
echo "1034 - Processing of 01.0552 luw started at $(timestamp)"
php panini.php 01.0552 luw
echo "1035 - Processing of 01.0058 luw started at $(timestamp)"
php panini.php 01.0058 luw
echo "1036 - Processing of 10.0333 luw started at $(timestamp)"
php panini.php 10.0333 luw
echo "1037 - Processing of 01.0972 luw started at $(timestamp)"
php panini.php 01.0972 luw
echo "1038 - Processing of 04.0091 luw started at $(timestamp)"
php panini.php 04.0091 luw
echo "1039 - Processing of 01.0714 luw started at $(timestamp)"
php panini.php 01.0714 luw
echo "1040 - Processing of 04.0062 luw started at $(timestamp)"
php panini.php 04.0062 luw
echo "1041 - Processing of 01.0007 luw started at $(timestamp)"
php panini.php 01.0007 luw
echo "1042 - Processing of 01.0006 luw started at $(timestamp)"
php panini.php 01.0006 luw
echo "1043 - Processing of 01.0712 luw started at $(timestamp)"
php panini.php 01.0712 luw
echo "1044 - Processing of 02.0017 law started at $(timestamp)"
php panini.php 02.0017 law
echo "1045 - Processing of 02.0017 luw started at $(timestamp)"
php panini.php 02.0017 luw
echo "1046 - Processing of 02.0017 low started at $(timestamp)"
php panini.php 02.0017 low
echo "1047 - Processing of 02.0017 laN started at $(timestamp)"
php panini.php 02.0017 laN
echo "1048 - Processing of 01.0747 luw started at $(timestamp)"
php panini.php 01.0747 luw
echo "1049 - Processing of 03.0012 law started at $(timestamp)"
php panini.php 03.0012 law
echo "1050 - Processing of 03.0012 luw started at $(timestamp)"
php panini.php 03.0012 luw
echo "1051 - Processing of 03.0012 low started at $(timestamp)"
php panini.php 03.0012 low
echo "1052 - Processing of 03.0012 laN started at $(timestamp)"
php panini.php 03.0012 laN
echo "1053 - Processing of 02.0018 law started at $(timestamp)"
php panini.php 02.0018 law
echo "1054 - Processing of 02.0018 luw started at $(timestamp)"
php panini.php 02.0018 luw
echo "1055 - Processing of 02.0018 low started at $(timestamp)"
php panini.php 02.0018 low
echo "1056 - Processing of 02.0018 laN started at $(timestamp)"
php panini.php 02.0018 laN
echo "1057 - Processing of 01.1012 luw started at $(timestamp)"
php panini.php 01.1012 luw
echo "1058 - Processing of 01.0069 luw started at $(timestamp)"
php panini.php 01.0069 luw
echo "1059 - Processing of 01.0673 luw started at $(timestamp)"
php panini.php 01.0673 luw
echo "1060 - Processing of 06.0087 luw started at $(timestamp)"
php panini.php 06.0087 luw
echo "1061 - Processing of 10.0427 luw started at $(timestamp)"
php panini.php 10.0427 luw
echo "1062 - Processing of 01.0823 luw started at $(timestamp)"
php panini.php 01.0823 luw
echo "1063 - Processing of 01.0796 luw started at $(timestamp)"
php panini.php 01.0796 luw
echo "1064 - Processing of 10.0209 luw started at $(timestamp)"
php panini.php 10.0209 luw
echo "1065 - Processing of 01.1049 luw started at $(timestamp)"
php panini.php 01.1049 luw
echo "1066 - Processing of 01.0600 luw started at $(timestamp)"
php panini.php 01.0600 luw
echo "1067 - Processing of 01.0647 luw started at $(timestamp)"
php panini.php 01.0647 luw
echo "1068 - Processing of 06.0132 luw started at $(timestamp)"
php panini.php 06.0132 luw
echo "1069 - Processing of 02.0030 luw started at $(timestamp)"
php panini.php 02.0030 luw
echo "1070 - Processing of 06.0002 luw started at $(timestamp)"
php panini.php 06.0002 luw
echo "1071 - Processing of 06.0162 luw started at $(timestamp)"
php panini.php 06.0162 luw
echo "1072 - Processing of 04.0010 luw started at $(timestamp)"
php panini.php 04.0010 luw
echo "1073 - Processing of 09.0030 luw started at $(timestamp)"
php panini.php 09.0030 luw
echo "1074 - Processing of 09.0030 low started at $(timestamp)"
php panini.php 09.0030 low
echo "1075 - Processing of 01.0921 luw started at $(timestamp)"
php panini.php 01.0921 luw
echo "1076 - Processing of 01.1013 luw started at $(timestamp)"
php panini.php 01.1013 luw
echo "1077 - Processing of 01.0704 luw started at $(timestamp)"
php panini.php 01.0704 luw
echo "1078 - Processing of 10.0107 luw started at $(timestamp)"
php panini.php 10.0107 luw
echo "1079 - Processing of 01.0757 luw started at $(timestamp)"
php panini.php 01.0757 luw
echo "1080 - Processing of 10.0024 luw started at $(timestamp)"
php panini.php 10.0024 luw
echo "1081 - Processing of 01.1151 luw started at $(timestamp)"
php panini.php 01.1151 luw
echo "1082 - Processing of 10.0153 luw started at $(timestamp)"
php panini.php 10.0153 luw
echo "1083 - Processing of 01.0198 luw started at $(timestamp)"
php panini.php 01.0198 luw
echo "1084 - Processing of 10.0394 luw started at $(timestamp)"
php panini.php 10.0394 luw
echo "1085 - Processing of 10.0282 luw started at $(timestamp)"
php panini.php 10.0282 luw
echo "1086 - Processing of 01.0333 luw started at $(timestamp)"
php panini.php 01.0333 luw
echo "1087 - Processing of 01.0381 luw started at $(timestamp)"
php panini.php 01.0381 luw
echo "1088 - Processing of 01.0507 luw started at $(timestamp)"
php panini.php 01.0507 luw
echo "1089 - Processing of 10.0106 luw started at $(timestamp)"
php panini.php 10.0106 luw
echo "1090 - Processing of 01.0315 luw started at $(timestamp)"
php panini.php 01.0315 luw
echo "1091 - Processing of 10.0400 luw started at $(timestamp)"
php panini.php 10.0400 luw
echo "1092 - Processing of 01.0979 luw started at $(timestamp)"
php panini.php 01.0979 luw
echo "1093 - Processing of 10.0029 luw started at $(timestamp)"
php panini.php 10.0029 luw
echo "1094 - Processing of 01.0982 luw started at $(timestamp)"
php panini.php 01.0982 luw
echo "1095 - Processing of 10.0440 luw started at $(timestamp)"
php panini.php 10.0440 luw
echo "1096 - Processing of 04.0065 luw started at $(timestamp)"
php panini.php 04.0065 luw
echo "1097 - Processing of 01.0508 luw started at $(timestamp)"
php panini.php 01.0508 luw
echo "1098 - Processing of 01.0548 luw started at $(timestamp)"
php panini.php 01.0548 luw
echo "1099 - Processing of 10.0485 luw started at $(timestamp)"
php panini.php 10.0485 luw
echo "1100 - Processing of 01.0029 luw started at $(timestamp)"
php panini.php 01.0029 luw
echo "1101 - Processing of 01.0478 luw started at $(timestamp)"
php panini.php 01.0478 luw
echo "1102 - Processing of 01.0482 luw started at $(timestamp)"
php panini.php 01.0482 luw
echo "1103 - Processing of 01.0658 luw started at $(timestamp)"
php panini.php 01.0658 luw
echo "1104 - Processing of 10.0099 luw started at $(timestamp)"
php panini.php 10.0099 luw
echo "1105 - Processing of 01.0973 luw started at $(timestamp)"
php panini.php 01.0973 luw
echo "1106 - Processing of 01.0621 luw started at $(timestamp)"
php panini.php 01.0621 luw
echo "1107 - Processing of 10.0244 luw started at $(timestamp)"
php panini.php 10.0244 luw
echo "1108 - Processing of 10.0401 luw started at $(timestamp)"
php panini.php 10.0401 luw
echo "1109 - Processing of 10.0453 luw started at $(timestamp)"
php panini.php 10.0453 luw
echo "1110 - Processing of 06.0293 luw started at $(timestamp)"
php panini.php 06.0293 luw
echo "1111 - Processing of 10.0061 luw started at $(timestamp)"
php panini.php 10.0061 luw
echo "1112 - Processing of 10.0046 luw started at $(timestamp)"
php panini.php 10.0046 luw
echo "1113 - Processing of 10.0020 luw started at $(timestamp)"
php panini.php 10.0020 luw
echo "1114 - Processing of 10.0287 luw started at $(timestamp)"
php panini.php 10.0287 luw
echo "1115 - Processing of 01.0348 luw started at $(timestamp)"
php panini.php 01.0348 luw
echo "1116 - Processing of 01.0393 luw started at $(timestamp)"
php panini.php 01.0393 luw
echo "1117 - Processing of 10.0186 luw started at $(timestamp)"
php panini.php 10.0186 luw
echo "1118 - Processing of 10.0185 luw started at $(timestamp)"
php panini.php 10.0185 luw
echo "1119 - Processing of 01.0307 luw started at $(timestamp)"
php panini.php 01.0307 luw
echo "1120 - Processing of 01.0671 luw started at $(timestamp)"
php panini.php 01.0671 luw
echo "1121 - Processing of 10.0173 luw started at $(timestamp)"
php panini.php 10.0173 luw
echo "1122 - Processing of 07.0015 luw started at $(timestamp)"
php panini.php 07.0015 luw
echo "1123 - Processing of 01.0816 luw started at $(timestamp)"
php panini.php 01.0816 luw
echo "1124 - Processing of 10.0050 luw started at $(timestamp)"
php panini.php 10.0050 luw
echo "1125 - Processing of 10.0017 luw started at $(timestamp)"
php panini.php 10.0017 luw
echo "1126 - Processing of 01.0599 luw started at $(timestamp)"
php panini.php 01.0599 luw
echo "1127 - Processing of 01.0644 luw started at $(timestamp)"
php panini.php 01.0644 luw
echo "1128 - Processing of 10.0134 luw started at $(timestamp)"
php panini.php 10.0134 luw
echo "1129 - Processing of 10.0455 luw started at $(timestamp)"
php panini.php 10.0455 luw
echo "1130 - Processing of 10.0094 luw started at $(timestamp)"
php panini.php 10.0094 luw
echo "1131 - Processing of 01.0367 luw started at $(timestamp)"
php panini.php 01.0367 luw
echo "1132 - Processing of 06.0283 luw started at $(timestamp)"
php panini.php 06.0283 luw
echo "1133 - Processing of 10.0035 luw started at $(timestamp)"
php panini.php 10.0035 luw
echo "1134 - Processing of 01.0365 luw started at $(timestamp)"
php panini.php 01.0365 luw
echo "1135 - Processing of 06.0114 luw started at $(timestamp)"
php panini.php 06.0114 luw
echo "1136 - Processing of 10.0059 luw started at $(timestamp)"
php panini.php 10.0059 luw
echo "1137 - Processing of 10.0323 luw started at $(timestamp)"
php panini.php 10.0323 luw
echo "1138 - Processing of 01.0370 luw started at $(timestamp)"
php panini.php 01.0370 luw
echo "1139 - Processing of 10.0013 luw started at $(timestamp)"
php panini.php 10.0013 luw
echo "1140 - Processing of 04.0306 luw started at $(timestamp)"
php panini.php 04.0306 luw
echo "1141 - Processing of 01.0046 luw started at $(timestamp)"
php panini.php 01.0046 luw
echo "1142 - Processing of 06.0072 luw started at $(timestamp)"
php panini.php 06.0072 luw
echo "1143 - Processing of 01.0657 luw started at $(timestamp)"
php panini.php 01.0657 luw
echo "1144 - Processing of 10.0090 luw started at $(timestamp)"
php panini.php 10.0090 luw
echo "1145 - Processing of 01.0975 luw started at $(timestamp)"
php panini.php 01.0975 luw
echo "1146 - Processing of 04.0121 luw started at $(timestamp)"
php panini.php 04.0121 luw
echo "1147 - Processing of 10.0079 luw started at $(timestamp)"
php panini.php 10.0079 luw
echo "1148 - Processing of 09.0280 luw started at $(timestamp)"
php panini.php 09.0280 luw
echo "1149 - Processing of 09.0280 low started at $(timestamp)"
php panini.php 09.0280 low
echo "1150 - Processing of 01.0797 luw started at $(timestamp)"
php panini.php 01.0797 luw
echo "1151 - Processing of 04.0016 luw started at $(timestamp)"
php panini.php 04.0016 luw
echo "1152 - Processing of 09.0014 luw started at $(timestamp)"
php panini.php 09.0014 luw
echo "1153 - Processing of 09.0014 low started at $(timestamp)"
php panini.php 09.0014 low
echo "1154 - Processing of 01.1121 luw started at $(timestamp)"
php panini.php 01.1121 luw
echo "1155 - Processing of 10.0144 luw started at $(timestamp)"
php panini.php 10.0144 luw
echo "1156 - Processing of 01.0557 luw started at $(timestamp)"
php panini.php 01.0557 luw
echo "1157 - Processing of 04.0334 luw started at $(timestamp)"
php panini.php 04.0334 luw
echo "1158 - Processing of 10.0132 luw started at $(timestamp)"
php panini.php 10.0132 luw
echo "1159 - Processing of 10.0181 luw started at $(timestamp)"
php panini.php 10.0181 luw
echo "1160 - Processing of 10.0131 luw started at $(timestamp)"
php panini.php 10.0131 luw
echo "1161 - Processing of 01.0606 luw started at $(timestamp)"
php panini.php 01.0606 luw
echo "1162 - Processing of 01.0769 luw started at $(timestamp)"
php panini.php 01.0769 luw
echo "1163 - Processing of 03.0005 luw started at $(timestamp)"
php panini.php 03.0005 luw
echo "1164 - Processing of 05.0013 luw started at $(timestamp)"
php panini.php 05.0013 luw
echo "1165 - Processing of 06.0138 luw started at $(timestamp)"
php panini.php 06.0138 luw
echo "1166 - Processing of 07.0339 luw started at $(timestamp)"
php panini.php 07.0339 luw
echo "1167 - Processing of 02.0025 law started at $(timestamp)"
php panini.php 02.0025 law
echo "1168 - Processing of 02.0025 luw started at $(timestamp)"
php panini.php 02.0025 luw
echo "1169 - Processing of 02.0025 low started at $(timestamp)"
php panini.php 02.0025 low
echo "1170 - Processing of 02.0025 laN started at $(timestamp)"
php panini.php 02.0025 laN
echo "1171 - Processing of 02.0021 law started at $(timestamp)"
php panini.php 02.0021 law
echo "1172 - Processing of 02.0021 luw started at $(timestamp)"
php panini.php 02.0021 luw
echo "1173 - Processing of 02.0021 low started at $(timestamp)"
php panini.php 02.0021 low
echo "1174 - Processing of 02.0021 laN started at $(timestamp)"
php panini.php 02.0021 laN
echo "1175 - Processing of 06.0054 luw started at $(timestamp)"
php panini.php 06.0054 luw
echo "1176 - Processing of 06.0055 luw started at $(timestamp)"
php panini.php 06.0055 luw
echo "1177 - Processing of 01.0802 luw started at $(timestamp)"
php panini.php 01.0802 luw
echo "1178 - Processing of 10.0004 luw started at $(timestamp)"
php panini.php 10.0004 luw
echo "1179 - Processing of 09.0022 luw started at $(timestamp)"
php panini.php 09.0022 luw
echo "1180 - Processing of 09.0022 low started at $(timestamp)"
php panini.php 09.0022 low
echo "1181 - Processing of 03.0004 luw started at $(timestamp)"
php panini.php 03.0004 luw
echo "1182 - Processing of 03.0004 low started at $(timestamp)"
php panini.php 03.0004 low
echo "1183 - Processing of 01.0577 luw started at $(timestamp)"
php panini.php 01.0577 luw
echo "1184 - Processing of 01.0700 luw started at $(timestamp)"
php panini.php 01.0700 luw
echo "1185 - Processing of 01.0817 luw started at $(timestamp)"
php panini.php 01.0817 luw
echo "1186 - Processing of 01.0527 luw started at $(timestamp)"
php panini.php 01.0527 luw
echo "1187 - Processing of 01.0561 luw started at $(timestamp)"
php panini.php 01.0561 luw
echo "1188 - Processing of 04.0119 luw started at $(timestamp)"
php panini.php 04.0119 luw
echo "1189 - Processing of 04.0120 luw started at $(timestamp)"
php panini.php 04.0120 luw
echo "1190 - Processing of 01.1119 luw started at $(timestamp)"
php panini.php 01.1119 luw
echo "1191 - Processing of 10.0027 luw started at $(timestamp)"
php panini.php 10.0027 luw
echo "1192 - Processing of 01.0869 luw started at $(timestamp)"
php panini.php 01.0869 luw
echo "1193 - Processing of 01.0870 luw started at $(timestamp)"
php panini.php 01.0870 luw
echo "1194 - Processing of 10.0039 luw started at $(timestamp)"
php panini.php 10.0039 luw
echo "1195 - Processing of 09.0373 luw started at $(timestamp)"
php panini.php 09.0373 luw
echo "1196 - Processing of 09.0373 low started at $(timestamp)"
php panini.php 09.0373 low
echo "1197 - Processing of 04.0002 luw started at $(timestamp)"
php panini.php 04.0002 luw
echo "1198 - Processing of 01.1111 luw started at $(timestamp)"
php panini.php 01.1111 luw
echo "1199 - Processing of 01.0800 luw started at $(timestamp)"
php panini.php 01.0800 luw
echo "1200 - Processing of 09.0063 luw started at $(timestamp)"
php panini.php 09.0063 luw
echo "1201 - Processing of 09.0063 low started at $(timestamp)"
php panini.php 09.0063 low
echo "1202 - Processing of 01.0706 luw started at $(timestamp)"
php panini.php 01.0706 luw
echo "1203 - Processing of 01.0528 luw started at $(timestamp)"
php panini.php 01.0528 luw
echo "1204 - Processing of 01.1005 luw started at $(timestamp)"
php panini.php 01.1005 luw
echo "1205 - Processing of 01.1040 luw started at $(timestamp)"
php panini.php 01.1040 luw
echo "1206 - Processing of 01.0729 luw started at $(timestamp)"
php panini.php 01.0729 luw
echo "1207 - Processing of 09.0039 luw started at $(timestamp)"
php panini.php 09.0039 luw
echo "1208 - Processing of 09.0039 low started at $(timestamp)"
php panini.php 09.0039 low
echo "1209 - Processing of 01.1112 luw started at $(timestamp)"
php panini.php 01.1112 luw
echo "1210 - Processing of 04.0122 luw started at $(timestamp)"
php panini.php 04.0122 luw
echo "1211 - Processing of 04.0009 luw started at $(timestamp)"
php panini.php 04.0009 luw
echo "1212 - Processing of 01.0801 luw started at $(timestamp)"
php panini.php 01.0801 luw
echo "1213 - Processing of 09.0064 luw started at $(timestamp)"
php panini.php 09.0064 luw
echo "1214 - Processing of 09.0064 low started at $(timestamp)"
php panini.php 09.0064 low
echo "1215 - Processing of 01.0582 luw started at $(timestamp)"
php panini.php 01.0582 luw
echo "1216 - Processing of 01.0123 luw started at $(timestamp)"
php panini.php 01.0123 luw
echo "1217 - Processing of 01.0955 luw started at $(timestamp)"
php panini.php 01.0955 luw
echo "1218 - Processing of 01.0608 luw started at $(timestamp)"
php panini.php 01.0608 luw
echo "1219 - Processing of 01.0594 luw started at $(timestamp)"
php panini.php 01.0594 luw
echo "1220 - Processing of 01.0610 luw started at $(timestamp)"
php panini.php 01.0610 luw
echo "1221 - Processing of 01.0622 luw started at $(timestamp)"
php panini.php 01.0622 luw
echo "1222 - Processing of 01.0720 luw started at $(timestamp)"
php panini.php 01.0720 luw
echo "1223 - Processing of 01.0383 luw started at $(timestamp)"
php panini.php 01.0383 luw
echo "1224 - Processing of 01.0530 luw started at $(timestamp)"
php panini.php 01.0530 luw
echo "1225 - Processing of 01.0378 luw started at $(timestamp)"
php panini.php 01.0378 luw
echo "1226 - Processing of 01.0053 luw started at $(timestamp)"
php panini.php 01.0053 luw
echo "1227 - Processing of 01.1128 luw started at $(timestamp)"
php panini.php 01.1128 luw
echo "1228 - Processing of 01.0638 luw started at $(timestamp)"
php panini.php 01.0638 luw
echo "1229 - Processing of 01.0484 luw started at $(timestamp)"
php panini.php 01.0484 luw
echo "1230 - Processing of 10.0300 luw started at $(timestamp)"
php panini.php 10.0300 luw
echo "1231 - Processing of 01.0725 luw started at $(timestamp)"
php panini.php 01.0725 luw
echo "1232 - Processing of 10.0123 luw started at $(timestamp)"
php panini.php 10.0123 luw
echo "1233 - Processing of 01.0974 luw started at $(timestamp)"
php panini.php 01.0974 luw
echo "1234 - Processing of 10.0301 luw started at $(timestamp)"
php panini.php 10.0301 luw
echo "1235 - Processing of 01.0726 luw started at $(timestamp)"
php panini.php 01.0726 luw
echo "1236 - Processing of 10.0458 luw started at $(timestamp)"
php panini.php 10.0458 luw
echo "1237 - Processing of 04.0112 luw started at $(timestamp)"
php panini.php 04.0112 luw
echo "1238 - Processing of 10.0203 luw started at $(timestamp)"
php panini.php 10.0203 luw
echo "1239 - Processing of 01.0320 luw started at $(timestamp)"
php panini.php 01.0320 luw
echo "1240 - Processing of 01.0005 luw started at $(timestamp)"
php panini.php 01.0005 luw
echo "1241 - Processing of 01.0732 luw started at $(timestamp)"
php panini.php 01.0732 luw
echo "1242 - Processing of 01.0355 luw started at $(timestamp)"
php panini.php 01.0355 luw
echo "1243 - Processing of 01.0066 luw started at $(timestamp)"
php panini.php 01.0066 luw
echo "1244 - Processing of 01.0820 luw started at $(timestamp)"
php panini.php 01.0820 luw
echo "1245 - Processing of 04.0123 luw started at $(timestamp)"
php panini.php 04.0123 luw
echo "1246 - Processing of 01.0445 luw started at $(timestamp)"
php panini.php 01.0445 luw
echo "1247 - Processing of 01.0126 luw started at $(timestamp)"
php panini.php 01.0126 luw
echo "1248 - Processing of 10.0238 luw started at $(timestamp)"
php panini.php 10.0238 luw
echo "1249 - Processing of 01.0177 luw started at $(timestamp)"
php panini.php 01.0177 luw
echo "1250 - Processing of 04.0068 luw started at $(timestamp)"
php panini.php 04.0068 luw
echo "1251 - Processing of 01.0994 luw started at $(timestamp)"
php panini.php 01.0994 luw
echo "1252 - Processing of 01.1016 luw started at $(timestamp)"
php panini.php 01.1016 luw
echo "1253 - Processing of 01.1017 luw started at $(timestamp)"
php panini.php 01.1017 luw
echo "1254 - Processing of 04.0117 luw started at $(timestamp)"
php panini.php 04.0117 luw
echo "1255 - Processing of 04.0129 luw started at $(timestamp)"
php panini.php 04.0129 luw
echo "1256 - Processing of 10.0080 luw started at $(timestamp)"
php panini.php 10.0080 luw
echo "1257 - Processing of 10.0299 luw started at $(timestamp)"
php panini.php 10.0299 luw
echo "1258 - Processing of 01.0837 luw started at $(timestamp)"
php panini.php 01.0837 luw
echo "1259 - Processing of 01.0836 luw started at $(timestamp)"
php panini.php 01.0836 luw
echo "1260 - Processing of 06.0074 luw started at $(timestamp)"
php panini.php 06.0074 luw
echo "1261 - Processing of 01.0821 luw started at $(timestamp)"
php panini.php 01.0821 luw
echo "1262 - Processing of 01.0730 luw started at $(timestamp)"
php panini.php 01.0730 luw
echo "1263 - Processing of 04.0116 luw started at $(timestamp)"
php panini.php 04.0116 luw
echo "1264 - Processing of 01.0519 luw started at $(timestamp)"
php panini.php 01.0519 luw
echo "1265 - Processing of 02.0039 luw started at $(timestamp)"
php panini.php 02.0039 luw
echo "1266 - Processing of 10.0172 luw started at $(timestamp)"
php panini.php 10.0172 luw
echo "1267 - Processing of 09.0038 luw started at $(timestamp)"
php panini.php 09.0038 luw
echo "1268 - Processing of 09.0038 low started at $(timestamp)"
php panini.php 09.0038 low
echo "1269 - Processing of 01.1039 luw started at $(timestamp)"
php panini.php 01.1039 luw
echo "1270 - Processing of 10.0033 luw started at $(timestamp)"
php panini.php 10.0033 luw
echo "1271 - Processing of 10.0259 luw started at $(timestamp)"
php panini.php 10.0259 luw
echo "1272 - Processing of 01.1153 luw started at $(timestamp)"
php panini.php 01.1153 luw
echo "1273 - Processing of 10.0016 luw started at $(timestamp)"
php panini.php 10.0016 luw
echo "1274 - Processing of 01.0889 luw started at $(timestamp)"
php panini.php 01.0889 luw
echo "1275 - Processing of 01.0344 luw started at $(timestamp)"
php panini.php 01.0344 luw
echo "1276 - Processing of 01.0515 luw started at $(timestamp)"
php panini.php 01.0515 luw
echo "1277 - Processing of 10.0077 luw started at $(timestamp)"
php panini.php 10.0077 luw
echo "1278 - Processing of 01.0306 luw started at $(timestamp)"
php panini.php 01.0306 luw
echo "1279 - Processing of 01.0012 luw started at $(timestamp)"
php panini.php 01.0012 luw
echo "1280 - Processing of 10.0202 luw started at $(timestamp)"
php panini.php 10.0202 luw
echo "1281 - Processing of 01.0662 luw started at $(timestamp)"
php panini.php 01.0662 luw
echo "1282 - Processing of 01.0663 luw started at $(timestamp)"
php panini.php 01.0663 luw
echo "1283 - Processing of 01.0661 luw started at $(timestamp)"
php panini.php 01.0661 luw
echo "1284 - Processing of 01.0568 luw started at $(timestamp)"
php panini.php 01.0568 luw
echo "1285 - Processing of 10.0224 luw started at $(timestamp)"
php panini.php 10.0224 luw
echo "1286 - Processing of 01.0569 luw started at $(timestamp)"
php panini.php 01.0569 luw
echo "1287 - Processing of 01.0791 luw started at $(timestamp)"
php panini.php 01.0791 luw
echo "1288 - Processing of 04.0113 luw started at $(timestamp)"
php panini.php 04.0113 luw
echo "1289 - Processing of 03.0019 luw started at $(timestamp)"
php panini.php 03.0019 luw
echo "1290 - Processing of 10.0428 luw started at $(timestamp)"
php panini.php 10.0428 luw
echo "1291 - Processing of 10.0411 luw started at $(timestamp)"
php panini.php 10.0411 luw
echo "1292 - Processing of 01.0509 luw started at $(timestamp)"
php panini.php 01.0509 luw
echo "1293 - Processing of 01.0696 luw started at $(timestamp)"
php panini.php 01.0696 luw
echo "1294 - Processing of 01.0711 luw started at $(timestamp)"
php panini.php 01.0711 luw
echo "1295 - Processing of 01.0690 luw started at $(timestamp)"
php panini.php 01.0690 luw
echo "1296 - Processing of 07.0002 law started at $(timestamp)"
php panini.php 07.0002 law
echo "1297 - Processing of 07.0002 luw started at $(timestamp)"
php panini.php 07.0002 luw
echo "1298 - Processing of 07.0002 low started at $(timestamp)"
php panini.php 07.0002 low
echo "1299 - Processing of 07.0002 laN started at $(timestamp)"
php panini.php 07.0002 laN
echo "1300 - Processing of 01.0844 luw started at $(timestamp)"
php panini.php 01.0844 luw
echo "1301 - Processing of 01.0067 luw started at $(timestamp)"
php panini.php 01.0067 luw
echo "1302 - Processing of 03.0002 luw started at $(timestamp)"
php panini.php 03.0002 luw
echo "1303 - Processing of 06.0153 luw started at $(timestamp)"
php panini.php 06.0153 luw
echo "1304 - Processing of 07.0017 luw started at $(timestamp)"
php panini.php 07.0017 luw
echo "1305 - Processing of 10.0382 luw started at $(timestamp)"
php panini.php 10.0382 luw
echo "1306 - Processing of 10.0277 luw started at $(timestamp)"
php panini.php 10.0277 luw
echo "1307 - Processing of 01.0001 luw started at $(timestamp)"
php panini.php 01.0001 luw
echo "1308 - Processing of 01.0777 luw started at $(timestamp)"
php panini.php 01.0777 luw
echo "1309 - Processing of 10.0255 luw started at $(timestamp)"
php panini.php 10.0255 luw
echo "1310 - Processing of 03.0318 law started at $(timestamp)"
php panini.php 03.0318 law
echo "1311 - Processing of 03.0318 luw started at $(timestamp)"
php panini.php 03.0318 luw
echo "1312 - Processing of 03.0318 low started at $(timestamp)"
php panini.php 03.0318 low
echo "1313 - Processing of 03.0318 laN started at $(timestamp)"
php panini.php 03.0318 laN
echo "1314 - Processing of 10.1045 luw started at $(timestamp)"
php panini.php 10.1045 luw
echo "1315 - Processing of 04.0006 luw started at $(timestamp)"
php panini.php 04.0006 luw
echo "1316 - Processing of 01.0202 luw started at $(timestamp)"
php panini.php 01.0202 luw
echo "1317 - Processing of 06.0129 luw started at $(timestamp)"
php panini.php 06.0129 luw
echo "1318 - Processing of 09.0024 luw started at $(timestamp)"
php panini.php 09.0024 luw
echo "1319 - Processing of 09.0024 low started at $(timestamp)"
php panini.php 09.0024 low
echo "1320 - Processing of 01.1026 luw started at $(timestamp)"
php panini.php 01.1026 luw
echo "1321 - Processing of 01.0715 luw started at $(timestamp)"
php panini.php 01.0715 luw
echo "1322 - Processing of 01.0860 luw started at $(timestamp)"
php panini.php 01.0860 luw
echo "1323 - Processing of 04.0138 luw started at $(timestamp)"
php panini.php 04.0138 luw
echo "1324 - Processing of 01.0859 luw started at $(timestamp)"
php panini.php 01.0859 luw
echo "1325 - Processing of 01.1037 luw started at $(timestamp)"
php panini.php 01.1037 luw
echo "1326 - Processing of 06.0004 luw started at $(timestamp)"
php panini.php 06.0004 luw
echo "1327 - Processing of 01.0520 luw started at $(timestamp)"
php panini.php 01.0520 luw
echo "1328 - Processing of 04.0102 luw started at $(timestamp)"
php panini.php 04.0102 luw
echo "1329 - Processing of 01.0985 luw started at $(timestamp)"
php panini.php 01.0985 luw
echo "1330 - Processing of 01.0205 luw started at $(timestamp)"
php panini.php 01.0205 luw
echo "1331 - Processing of 01.0957 luw started at $(timestamp)"
php panini.php 01.0957 luw
echo "1332 - Processing of 01.0958 luw started at $(timestamp)"
php panini.php 01.0958 luw
echo "1333 - Processing of 09.0041 luw started at $(timestamp)"
php panini.php 09.0041 luw
echo "1334 - Processing of 09.0041 low started at $(timestamp)"
php panini.php 09.0041 low
echo "1335 - Processing of 10.0213 luw started at $(timestamp)"
php panini.php 10.0213 luw
echo "1336 - Processing of 01.0204 luw started at $(timestamp)"
php panini.php 01.0204 luw
echo "1337 - Processing of 01.1027 luw started at $(timestamp)"
php panini.php 01.1027 luw
echo "1338 - Processing of 01.1038 luw started at $(timestamp)"
php panini.php 01.1038 luw
echo "1339 - Processing of 01.0959 luw started at $(timestamp)"
php panini.php 01.0959 luw
echo "1340 - Processing of 01.1028 luw started at $(timestamp)"
php panini.php 01.1028 luw
echo "1341 - Processing of 10.0330 luw started at $(timestamp)"
php panini.php 10.0330 luw
echo "1342 - Processing of 01.0721 luw started at $(timestamp)"
php panini.php 01.0721 luw
echo "1343 - Processing of 01.0140 luw started at $(timestamp)"
php panini.php 01.0140 luw
echo "1344 - Processing of 01.0094 luw started at $(timestamp)"
php panini.php 01.0094 luw
echo "1345 - Processing of 01.0141 luw started at $(timestamp)"
php panini.php 01.0141 luw
echo "1346 - Processing of 01.0157 luw started at $(timestamp)"
php panini.php 01.0157 luw
echo "1347 - Processing of 01.0117 luw started at $(timestamp)"
php panini.php 01.0117 luw
echo "1348 - Processing of 01.0183 luw started at $(timestamp)"
php panini.php 01.0183 luw
echo "1349 - Processing of 01.0195 luw started at $(timestamp)"
php panini.php 01.0195 luw
echo "1350 - Processing of 01.0197 luw started at $(timestamp)"
php panini.php 01.0197 luw
echo "1351 - Processing of 01.0384 luw started at $(timestamp)"
php panini.php 01.0384 luw
echo "1352 - Processing of 01.0516 luw started at $(timestamp)"
php panini.php 01.0516 luw
echo "1353 - Processing of 01.0296 luw started at $(timestamp)"
php panini.php 01.0296 luw
echo "1354 - Processing of 01.0305 luw started at $(timestamp)"
php panini.php 01.0305 luw
echo "1355 - Processing of 10.0076 luw started at $(timestamp)"
php panini.php 10.0076 luw
echo "1356 - Processing of 01.0361 luw started at $(timestamp)"
php panini.php 01.0361 luw
echo "1357 - Processing of 01.0983 luw started at $(timestamp)"
php panini.php 01.0983 luw
echo "1358 - Processing of 10.0105 luw started at $(timestamp)"
php panini.php 10.0105 luw
echo "1359 - Processing of 04.0229 luw started at $(timestamp)"
php panini.php 04.0229 luw
echo "1360 - Processing of 08.0233 luw started at $(timestamp)"
php panini.php 08.0233 luw
echo "1361 - Processing of 10.0073 luw started at $(timestamp)"
php panini.php 10.0073 luw
echo "1362 - Processing of 10.0199 luw started at $(timestamp)"
php panini.php 10.0199 luw
echo "1363 - Processing of 09.0047 luw started at $(timestamp)"
php panini.php 09.0047 luw
echo "1364 - Processing of 01.0048 luw started at $(timestamp)"
php panini.php 01.0048 luw
echo "1365 - Processing of 01.0044 luw started at $(timestamp)"
php panini.php 01.0044 luw
echo "1366 - Processing of 01.0013 luw started at $(timestamp)"
php panini.php 01.0013 luw
echo "1367 - Processing of 01.0639 luw started at $(timestamp)"
php panini.php 01.0639 luw
echo "1368 - Processing of 01.0549 luw started at $(timestamp)"
php panini.php 01.0549 luw
echo "1369 - Processing of 10.0151 luw started at $(timestamp)"
php panini.php 10.0151 luw
echo "1370 - Processing of 01.0485 luw started at $(timestamp)"
php panini.php 01.0485 luw
echo "1371 - Processing of 01.0659 luw started at $(timestamp)"
php panini.php 01.0659 luw
echo "1372 - Processing of 01.0566 luw started at $(timestamp)"
php panini.php 01.0566 luw
echo "1373 - Processing of 01.0567 luw started at $(timestamp)"
php panini.php 01.0567 luw
echo "1374 - Processing of 01.0683 luw started at $(timestamp)"
php panini.php 01.0683 luw
echo "1375 - Processing of 01.0585 luw started at $(timestamp)"
php panini.php 01.0585 luw
echo "1376 - Processing of 01.0825 luw started at $(timestamp)"
php panini.php 01.0825 luw
echo "1377 - Processing of 01.0788 luw started at $(timestamp)"
php panini.php 01.0788 luw
echo "1378 - Processing of 01.0107 luw started at $(timestamp)"
php panini.php 01.0107 luw
echo "1379 - Processing of 04.0131 luw started at $(timestamp)"
php panini.php 04.0131 luw
echo "1380 - Processing of 10.0406 luw started at $(timestamp)"
php panini.php 10.0406 luw
echo "1381 - Processing of 01.0831 luw started at $(timestamp)"
php panini.php 01.0831 luw
echo "1382 - Processing of 04.0037 luw started at $(timestamp)"
php panini.php 04.0037 luw
echo "1383 - Processing of 03.0007 law started at $(timestamp)"
php panini.php 03.0007 law
echo "1384 - Processing of 03.0007 luw started at $(timestamp)"
php panini.php 03.0007 luw
echo "1385 - Processing of 03.0007 low started at $(timestamp)"
php panini.php 03.0007 low
echo "1386 - Processing of 03.0007 laN started at $(timestamp)"
php panini.php 03.0007 laN
echo "1387 - Processing of 01.0762 luw started at $(timestamp)"
php panini.php 01.0762 luw
echo "1388 - Processing of 10.0234 luw started at $(timestamp)"
php panini.php 10.0234 luw
echo "1389 - Processing of 10.0381 luw started at $(timestamp)"
php panini.php 10.0381 luw
echo "1390 - Processing of 01.1127 luw started at $(timestamp)"
php panini.php 01.1127 luw
echo "1391 - Processing of 10.0384 luw started at $(timestamp)"
php panini.php 10.0384 luw
echo "1392 - Processing of 10.0150 luw started at $(timestamp)"
php panini.php 10.0150 luw
echo "1393 - Processing of 01.1042 luw started at $(timestamp)"
php panini.php 01.1042 luw
echo "1394 - Processing of 05.0004 luw started at $(timestamp)"
php panini.php 05.0004 luw
echo "1395 - Processing of 06.0017 luw started at $(timestamp)"
php panini.php 06.0017 luw
echo "1396 - Processing of 10.0286 luw started at $(timestamp)"
php panini.php 10.0286 luw
echo "1397 - Processing of 01.1008 luw started at $(timestamp)"
php panini.php 01.1008 luw
echo "1398 - Processing of 01.1006 luw started at $(timestamp)"
php panini.php 01.1006 luw
echo "1399 - Processing of 01.1010 luw started at $(timestamp)"
php panini.php 01.1010 luw
echo "1400 - Processing of 01.0672 luw started at $(timestamp)"
php panini.php 01.0672 luw
echo "1401 - Processing of 06.0091 luw started at $(timestamp)"
php panini.php 06.0091 luw
echo "1402 - Processing of 06.0165 luw started at $(timestamp)"
php panini.php 06.0165 luw
echo "1403 - Processing of 01.0824 luw started at $(timestamp)"
php panini.php 01.0824 luw
echo "1404 - Processing of 10.0466 luw started at $(timestamp)"
php panini.php 10.0466 luw
echo "1405 - Processing of 01.0795 luw started at $(timestamp)"
php panini.php 01.0795 luw
echo "1406 - Processing of 06.0079 luw started at $(timestamp)"
php panini.php 06.0079 luw
echo "1407 - Processing of 01.1147 luw started at $(timestamp)"
php panini.php 01.1147 luw
echo "1408 - Processing of 10.0032 luw started at $(timestamp)"
php panini.php 10.0032 luw
echo "1409 - Processing of 04.0004 luw started at $(timestamp)"
php panini.php 04.0004 luw
echo "1410 - Processing of 09.0361 luw started at $(timestamp)"
php panini.php 09.0361 luw
echo "1411 - Processing of 09.0361 low started at $(timestamp)"
php panini.php 09.0361 low
echo "1412 - Processing of 01.0539 luw started at $(timestamp)"
php panini.php 01.0539 luw
echo "1413 - Processing of 01.0595 luw started at $(timestamp)"
php panini.php 01.0595 luw
echo "1414 - Processing of 01.0645 luw started at $(timestamp)"
php panini.php 01.0645 luw
echo "1415 - Processing of 01.0166 luw started at $(timestamp)"
php panini.php 01.0166 luw
echo "1416 - Processing of 06.0272 luw started at $(timestamp)"
php panini.php 06.0272 luw
echo "1417 - Processing of 01.0283 luw started at $(timestamp)"
php panini.php 01.0283 luw
echo "1418 - Processing of 01.0196 luw started at $(timestamp)"
php panini.php 01.0196 luw
echo "1419 - Processing of 01.0284 luw started at $(timestamp)"
php panini.php 01.0284 luw
echo "1420 - Processing of 01.0366 luw started at $(timestamp)"
php panini.php 01.0366 luw
echo "1421 - Processing of 06.0104 luw started at $(timestamp)"
php panini.php 06.0104 luw
echo "1422 - Processing of 10.0101 luw started at $(timestamp)"
php panini.php 10.0101 luw
echo "1423 - Processing of 01.0364 luw started at $(timestamp)"
php panini.php 01.0364 luw
echo "1424 - Processing of 06.0060 luw started at $(timestamp)"
php panini.php 06.0060 luw
echo "1425 - Processing of 01.0298 luw started at $(timestamp)"
php panini.php 01.0298 luw
echo "1426 - Processing of 01.0369 luw started at $(timestamp)"
php panini.php 01.0369 luw
echo "1427 - Processing of 01.0308 luw started at $(timestamp)"
php panini.php 01.0308 luw
echo "1428 - Processing of 10.0268 luw started at $(timestamp)"
php panini.php 10.0268 luw
echo "1429 - Processing of 01.0016 luw started at $(timestamp)"
php panini.php 01.0016 luw
echo "1430 - Processing of 06.0069 luw started at $(timestamp)"
php panini.php 06.0069 luw
echo "1431 - Processing of 01.0240 luw started at $(timestamp)"
php panini.php 01.0240 luw
echo "1432 - Processing of 01.0656 luw started at $(timestamp)"
php panini.php 01.0656 luw
echo "1433 - Processing of 09.0066 luw started at $(timestamp)"
php panini.php 09.0066 luw
echo "1434 - Processing of 09.0066 low started at $(timestamp)"
php panini.php 09.0066 low
echo "1435 - Processing of 04.0130 luw started at $(timestamp)"
php panini.php 04.0130 luw
echo "1436 - Processing of 10.0126 luw started at $(timestamp)"
php panini.php 10.0126 luw
echo "1437 - Processing of 04.0095 luw started at $(timestamp)"
php panini.php 04.0095 luw
echo "1438 - Processing of 09.0015 luw started at $(timestamp)"
php panini.php 09.0015 luw
echo "1439 - Processing of 09.0015 low started at $(timestamp)"
php panini.php 09.0015 low
echo "1440 - Processing of 01.1122 luw started at $(timestamp)"
php panini.php 01.1122 luw
echo "1441 - Processing of 10.0451 luw started at $(timestamp)"
php panini.php 10.0451 luw
echo "1442 - Processing of 01.0607 luw started at $(timestamp)"
php panini.php 01.0607 luw
echo "1443 - Processing of 01.0770 luw started at $(timestamp)"
php panini.php 01.0770 luw
echo "1444 - Processing of 06.0139 luw started at $(timestamp)"
php panini.php 06.0139 luw
echo "1445 - Processing of 01.0754 luw started at $(timestamp)"
php panini.php 01.0754 luw
echo "1446 - Processing of 10.0442 law started at $(timestamp)"
php panini.php 10.0442 law
echo "1447 - Processing of 10.0442 liw started at $(timestamp)"
php panini.php 10.0442 liw
echo "1448 - Processing of 10.0442 luw started at $(timestamp)"
php panini.php 10.0442 luw
echo "1449 - Processing of 10.0442 lfw started at $(timestamp)"
php panini.php 10.0442 lfw
echo "1450 - Processing of 10.0442 low started at $(timestamp)"
php panini.php 10.0442 low
echo "1451 - Processing of 10.0442 laN started at $(timestamp)"
php panini.php 10.0442 laN
echo "1452 - Processing of 10.0442 ASIrliN started at $(timestamp)"
php panini.php 10.0442 ASIrliN
echo "1453 - Processing of 10.0442 viDiliN started at $(timestamp)"
php panini.php 10.0442 viDiliN
echo "1454 - Processing of 10.0442 lfN started at $(timestamp)"
php panini.php 10.0442 lfN
echo "1455 - Processing of 02.0386 luw started at $(timestamp)"
php panini.php 02.0386 luw
echo "1456 - Processing of 02.0386 low started at $(timestamp)"
php panini.php 02.0386 low
echo "1457 - Processing of 09.0052 luw started at $(timestamp)"
php panini.php 09.0052 luw
echo "1458 - Processing of 09.0052 low started at $(timestamp)"
php panini.php 09.0052 low
echo "1459 - Processing of 06.0053 luw started at $(timestamp)"
php panini.php 06.0053 luw
echo "1460 - Processing of 06.0057 luw started at $(timestamp)"
php panini.php 06.0057 luw
echo "1461 - Processing of 10.0165 luw started at $(timestamp)"
php panini.php 10.0165 luw
echo "1462 - Processing of 09.0051 luw started at $(timestamp)"
php panini.php 09.0051 luw
echo "1463 - Processing of 09.0051 low started at $(timestamp)"
php panini.php 09.0051 low
echo "1464 - Processing of 01.1015 luw started at $(timestamp)"
php panini.php 01.1015 luw
echo "1465 - Processing of 06.0161 luw started at $(timestamp)"
php panini.php 06.0161 luw
echo "1466 - Processing of 04.0387 luw started at $(timestamp)"
php panini.php 04.0387 luw
echo "1467 - Processing of 01.0804 luw started at $(timestamp)"
php panini.php 01.0804 luw
echo "1468 - Processing of 09.0025 luw started at $(timestamp)"
php panini.php 09.0025 luw
echo "1469 - Processing of 09.0025 low started at $(timestamp)"
php panini.php 09.0025 low
echo "1470 - Processing of 01.1116 luw started at $(timestamp)"
php panini.php 01.1116 luw
echo "1471 - Processing of 01.1009 luw started at $(timestamp)"
php panini.php 01.1009 luw
echo "1472 - Processing of 01.1007 luw started at $(timestamp)"
php panini.php 01.1007 luw
echo "1473 - Processing of 01.1011 luw started at $(timestamp)"
php panini.php 01.1011 luw
echo "1474 - Processing of 01.0429 luw started at $(timestamp)"
php panini.php 01.0429 luw
echo "1475 - Processing of 01.0578 luw started at $(timestamp)"
php panini.php 01.0578 luw
echo "1476 - Processing of 10.0256 luw started at $(timestamp)"
php panini.php 10.0256 luw
echo "1477 - Processing of 01.0755 luw started at $(timestamp)"
php panini.php 01.0755 luw
echo "1478 - Processing of 10.0168 luw started at $(timestamp)"
php panini.php 10.0168 luw
echo "1479 - Processing of 10.0171 luw started at $(timestamp)"
php panini.php 10.0171 luw
echo "1480 - Processing of 10.0169 luw started at $(timestamp)"
php panini.php 10.0169 luw
echo "1481 - Processing of 01.0871 luw started at $(timestamp)"
php panini.php 01.0871 luw
echo "1482 - Processing of 01.0222 luw started at $(timestamp)"
php panini.php 01.0222 luw
echo "1483 - Processing of 01.0220 luw started at $(timestamp)"
php panini.php 01.0220 luw
echo "1484 - Processing of 01.0327 luw started at $(timestamp)"
php panini.php 01.0327 luw
echo "1485 - Processing of 01.0328 luw started at $(timestamp)"
php panini.php 01.0328 luw
echo "1486 - Processing of 01.0223 luw started at $(timestamp)"
php panini.php 01.0223 luw
echo "1487 - Processing of 01.0221 luw started at $(timestamp)"
php panini.php 01.0221 luw
echo "1488 - Processing of 10.0170 luw started at $(timestamp)"
php panini.php 10.0170 luw
echo "1489 - Processing of 01.0233 luw started at $(timestamp)"
php panini.php 01.0233 luw
echo "1490 - Processing of 01.0329 luw started at $(timestamp)"
php panini.php 01.0329 luw
echo "1491 - Processing of 01.0579 luw started at $(timestamp)"
php panini.php 01.0579 luw
echo "1492 - Processing of 10.0215 luw started at $(timestamp)"
php panini.php 10.0215 luw
echo "1493 - Processing of 01.1157 luw started at $(timestamp)"
php panini.php 01.1157 luw
echo "1494 - Processing of 10.0261 luw started at $(timestamp)"
php panini.php 10.0261 luw
echo "1495 - Processing of 01.0030 luw started at $(timestamp)"
php panini.php 01.0030 luw
echo "1496 - Processing of 10.0003 luw started at $(timestamp)"
php panini.php 10.0003 luw
echo "1497 - Processing of 10.0119 luw started at $(timestamp)"
php panini.php 10.0119 luw
echo "1498 - Processing of 04.0107 luw started at $(timestamp)"
php panini.php 04.0107 luw
echo "1499 - Processing of 01.1001 luw started at $(timestamp)"
php panini.php 01.1001 luw
echo "1500 - Processing of 09.0235 luw started at $(timestamp)"
php panini.php 09.0235 luw
echo "1501 - Processing of 09.0235 low started at $(timestamp)"
php panini.php 09.0235 low
echo "1502 - Processing of 01.0175 luw started at $(timestamp)"
php panini.php 01.0175 luw
echo "1503 - Processing of 01.0242 luw started at $(timestamp)"
php panini.php 01.0242 luw
echo "1504 - Processing of 10.0074 luw started at $(timestamp)"
php panini.php 10.0074 luw
echo "1505 - Processing of 07.0338 law started at $(timestamp)"
php panini.php 07.0338 law
echo "1506 - Processing of 07.0338 luw started at $(timestamp)"
php panini.php 07.0338 luw
echo "1507 - Processing of 07.0338 low started at $(timestamp)"
php panini.php 07.0338 low
echo "1508 - Processing of 07.0338 laN started at $(timestamp)"
php panini.php 07.0338 laN
echo "1509 - Processing of 01.0031 luw started at $(timestamp)"
php panini.php 01.0031 luw
echo "1510 - Processing of 04.0069 luw started at $(timestamp)"
php panini.php 04.0069 luw
echo "1511 - Processing of 04.0148 luw started at $(timestamp)"
php panini.php 04.0148 luw
echo "1512 - Processing of 01.0775 luw started at $(timestamp)"
php panini.php 01.0775 luw
echo "1513 - Processing of 01.0702 luw started at $(timestamp)"
php panini.php 01.0702 luw
echo "1514 - Processing of 01.0326 luw started at $(timestamp)"
php panini.php 01.0326 luw
echo "1515 - Processing of 10.0329 luw started at $(timestamp)"
php panini.php 10.0329 luw
echo "1516 - Processing of 01.0833 luw started at $(timestamp)"
php panini.php 01.0833 luw
echo "1517 - Processing of 10.0262 luw started at $(timestamp)"
php panini.php 10.0262 luw
echo "1518 - Processing of 01.0746 luw started at $(timestamp)"
php panini.php 01.0746 luw
echo "1519 - Processing of 01.0144 luw started at $(timestamp)"
php panini.php 01.0144 luw
echo "1520 - Processing of 10.0265 luw started at $(timestamp)"
php panini.php 10.0265 luw
echo "1521 - Processing of 01.0894 luw started at $(timestamp)"
php panini.php 01.0894 luw
echo "1522 - Processing of 10.0264 luw started at $(timestamp)"
php panini.php 10.0264 luw
echo "1523 - Processing of 01.0145 luw started at $(timestamp)"
php panini.php 01.0145 luw
echo "1524 - Processing of 10.0397 luw started at $(timestamp)"
php panini.php 10.0397 luw
echo "1525 - Processing of 01.0153 luw started at $(timestamp)"
php panini.php 01.0153 luw
echo "1526 - Processing of 10.0326 luw started at $(timestamp)"
php panini.php 10.0326 luw
echo "1527 - Processing of 01.0112 luw started at $(timestamp)"
php panini.php 01.0112 luw
echo "1528 - Processing of 10.0403 luw started at $(timestamp)"
php panini.php 10.0403 luw
echo "1529 - Processing of 04.0063 luw started at $(timestamp)"
php panini.php 04.0063 luw
echo "1530 - Processing of 01.1154 luw started at $(timestamp)"
php panini.php 01.1154 luw
echo "1531 - Processing of 10.0462 luw started at $(timestamp)"
php panini.php 10.0462 luw
echo "1532 - Processing of 01.0334 luw started at $(timestamp)"
php panini.php 01.0334 luw
echo "1533 - Processing of 01.0387 luw started at $(timestamp)"
php panini.php 01.0387 luw
echo "1534 - Processing of 01.0386 luw started at $(timestamp)"
php panini.php 01.0386 luw
echo "1535 - Processing of 01.0904 luw started at $(timestamp)"
php panini.php 01.0904 luw
echo "1536 - Processing of 01.0513 luw started at $(timestamp)"
php panini.php 01.0513 luw
echo "1537 - Processing of 01.0680 luw started at $(timestamp)"
php panini.php 01.0680 luw
echo "1538 - Processing of 01.0055 luw started at $(timestamp)"
php panini.php 01.0055 luw
echo "1539 - Processing of 04.0090 luw started at $(timestamp)"
php panini.php 04.0090 luw
echo "1540 - Processing of 01.0467 luw started at $(timestamp)"
php panini.php 01.0467 luw
echo "1541 - Processing of 01.0479 luw started at $(timestamp)"
php panini.php 01.0479 luw
echo "1542 - Processing of 01.1129 luw started at $(timestamp)"
php panini.php 01.1129 luw
echo "1543 - Processing of 01.0989 luw started at $(timestamp)"
php panini.php 01.0989 luw
echo "1544 - Processing of 01.0480 luw started at $(timestamp)"
php panini.php 01.0480 luw
echo "1545 - Processing of 01.0436 luw started at $(timestamp)"
php panini.php 01.0436 luw
echo "1546 - Processing of 01.0449 luw started at $(timestamp)"
php panini.php 01.0449 luw
echo "1547 - Processing of 01.0554 luw started at $(timestamp)"
php panini.php 01.0554 luw
echo "1548 - Processing of 10.0477 luw started at $(timestamp)"
php panini.php 10.0477 luw
echo "1549 - Processing of 01.0810 luw started at $(timestamp)"
php panini.php 01.0810 luw
echo "1550 - Processing of 10.0396 luw started at $(timestamp)"
php panini.php 10.0396 luw
echo "1551 - Processing of 10.0122 luw started at $(timestamp)"
php panini.php 10.0122 luw
echo "1552 - Processing of 01.0832 luw started at $(timestamp)"
php panini.php 01.0832 luw
echo "1553 - Processing of 01.0130 luw started at $(timestamp)"
php panini.php 01.0130 luw
echo "1554 - Processing of 01.0118 luw started at $(timestamp)"
php panini.php 01.0118 luw
echo "1555 - Processing of 01.0956 luw started at $(timestamp)"
php panini.php 01.0956 luw
echo "1556 - Processing of 01.0713 luw started at $(timestamp)"
php panini.php 01.0713 luw
echo "1557 - Processing of 05.0032 luw started at $(timestamp)"
php panini.php 05.0032 luw
echo "1558 - Processing of 06.0140 luw started at $(timestamp)"
php panini.php 06.0140 luw
echo "1559 - Processing of 01.0168 luw started at $(timestamp)"
php panini.php 01.0168 luw
echo "1560 - Processing of 01.0169 luw started at $(timestamp)"
php panini.php 01.0169 luw
echo "1561 - Processing of 01.0164 luw started at $(timestamp)"
php panini.php 01.0164 luw
echo "1562 - Processing of 07.0348 law started at $(timestamp)"
php panini.php 07.0348 law
echo "1563 - Processing of 07.0348 luw started at $(timestamp)"
php panini.php 07.0348 luw
echo "1564 - Processing of 07.0348 low started at $(timestamp)"
php panini.php 07.0348 low
echo "1565 - Processing of 07.0348 laN started at $(timestamp)"
php panini.php 07.0348 laN
echo "1566 - Processing of 01.0679 luw started at $(timestamp)"
php panini.php 01.0679 luw
echo "1567 - Processing of 06.0026 luw started at $(timestamp)"
php panini.php 06.0026 luw
echo "1568 - Processing of 06.0156 luw started at $(timestamp)"
php panini.php 06.0156 luw
echo "1569 - Processing of 04.0144 luw started at $(timestamp)"
php panini.php 04.0144 luw
echo "1570 - Processing of 01.0790 luw started at $(timestamp)"
php panini.php 01.0790 luw
echo "1571 - Processing of 06.0027 luw started at $(timestamp)"
php panini.php 06.0027 luw
echo "1572 - Processing of 09.0035 luw started at $(timestamp)"
php panini.php 09.0035 luw
echo "1573 - Processing of 09.0035 low started at $(timestamp)"
php panini.php 09.0035 low
echo "1574 - Processing of 04.0033 luw started at $(timestamp)"
php panini.php 04.0033 luw
echo "1575 - Processing of 01.0319 luw started at $(timestamp)"
php panini.php 01.0319 luw
echo "1576 - Processing of 02.0321 luw started at $(timestamp)"
php panini.php 02.0321 luw
echo "1577 - Processing of 10.1114 luw started at $(timestamp)"
php panini.php 10.1114 luw
echo "1578 - Processing of 01.0847 luw started at $(timestamp)"
php panini.php 01.0847 luw
echo "1579 - Processing of 06.0335 luw started at $(timestamp)"
php panini.php 06.0335 luw
echo "1580 - Processing of 10.0152 luw started at $(timestamp)"
php panini.php 10.0152 luw
echo "1581 - Processing of 10.0314 luw started at $(timestamp)"
php panini.php 10.0314 luw
echo "1582 - Processing of 01.0849 luw started at $(timestamp)"
php panini.php 01.0849 luw
echo "1583 - Processing of 10.0188 luw started at $(timestamp)"
php panini.php 10.0188 luw
echo "1584 - Processing of 01.0389 luw started at $(timestamp)"
php panini.php 01.0389 luw
echo "1585 - Processing of 01.0371 luw started at $(timestamp)"
php panini.php 01.0371 luw
echo "1586 - Processing of 01.0400 luw started at $(timestamp)"
php panini.php 01.0400 luw
echo "1587 - Processing of 01.0373 luw started at $(timestamp)"
php panini.php 01.0373 luw
echo "1588 - Processing of 01.0375 luw started at $(timestamp)"
php panini.php 01.0375 luw
echo "1589 - Processing of 02.0062 luw started at $(timestamp)"
php panini.php 02.0062 luw
echo "1590 - Processing of 07.0001 law started at $(timestamp)"
php panini.php 07.0001 law
echo "1591 - Processing of 07.0001 luw started at $(timestamp)"
php panini.php 07.0001 luw
echo "1592 - Processing of 07.0001 low started at $(timestamp)"
php panini.php 07.0001 low
echo "1593 - Processing of 07.0001 laN started at $(timestamp)"
php panini.php 07.0001 laN
echo "1594 - Processing of 04.0149 luw started at $(timestamp)"
php panini.php 04.0149 luw
echo "1595 - Processing of 06.0155 luw started at $(timestamp)"
php panini.php 06.0155 luw
echo "1596 - Processing of 04.0187 luw started at $(timestamp)"
php panini.php 04.0187 luw
echo "1597 - Processing of 01.0789 luw started at $(timestamp)"
php panini.php 01.0789 luw
echo "1598 - Processing of 01.0995 luw started at $(timestamp)"
php panini.php 01.0995 luw
echo "1599 - Processing of 10.0452 luw started at $(timestamp)"
php panini.php 10.0452 luw
echo "1600 - Processing of 10.0479 luw started at $(timestamp)"
php panini.php 10.0479 luw
echo "1601 - Processing of 01.0772 luw started at $(timestamp)"
php panini.php 01.0772 luw
echo "1602 - Processing of 01.0085 luw started at $(timestamp)"
php panini.php 01.0085 luw
echo "1603 - Processing of 01.0206 luw started at $(timestamp)"
php panini.php 01.0206 luw
echo "1604 - Processing of 01.1002 luw started at $(timestamp)"
php panini.php 01.1002 luw
echo "1605 - Processing of 01.0430 luw started at $(timestamp)"
php panini.php 01.0430 luw
echo "1606 - Processing of 01.0447 luw started at $(timestamp)"
php panini.php 01.0447 luw
echo "1607 - Processing of 01.0584 luw started at $(timestamp)"
php panini.php 01.0584 luw
echo "1608 - Processing of 01.0707 luw started at $(timestamp)"
php panini.php 01.0707 luw
echo "1609 - Processing of 01.0412 luw started at $(timestamp)"
php panini.php 01.0412 luw
echo "1610 - Processing of 01.0411 luw started at $(timestamp)"
php panini.php 01.0411 luw
echo "1611 - Processing of 10.0219 luw started at $(timestamp)"
php panini.php 10.0219 luw
echo "1612 - Processing of 10.0006 luw started at $(timestamp)"
php panini.php 10.0006 luw
echo "1613 - Processing of 01.0146 luw started at $(timestamp)"
php panini.php 01.0146 luw
echo "1614 - Processing of 10.0263 luw started at $(timestamp)"
php panini.php 10.0263 luw
echo "1615 - Processing of 01.0895 luw started at $(timestamp)"
php panini.php 01.0895 luw
echo "1616 - Processing of 01.0154 luw started at $(timestamp)"
php panini.php 01.0154 luw
echo "1617 - Processing of 10.0291 luw started at $(timestamp)"
php panini.php 10.0291 luw
echo "1618 - Processing of 10.0327 luw started at $(timestamp)"
php panini.php 10.0327 luw
echo "1619 - Processing of 01.0113 luw started at $(timestamp)"
php panini.php 01.0113 luw
echo "1620 - Processing of 01.0182 luw started at $(timestamp)"
php panini.php 01.0182 luw
echo "1621 - Processing of 01.0234 luw started at $(timestamp)"
php panini.php 01.0234 luw
echo "1622 - Processing of 10.0463 luw started at $(timestamp)"
php panini.php 10.0463 luw
echo "1623 - Processing of 01.0271 luw started at $(timestamp)"
php panini.php 01.0271 luw
echo "1624 - Processing of 06.0011 luw started at $(timestamp)"
php panini.php 06.0011 luw
echo "1625 - Processing of 10.0315 luw started at $(timestamp)"
php panini.php 10.0315 luw
echo "1626 - Processing of 01.0272 luw started at $(timestamp)"
php panini.php 01.0272 luw
echo "1627 - Processing of 10.0465 luw started at $(timestamp)"
php panini.php 10.0465 luw
echo "1628 - Processing of 01.0335 luw started at $(timestamp)"
php panini.php 01.0335 luw
echo "1629 - Processing of 01.0415 luw started at $(timestamp)"
php panini.php 01.0415 luw
echo "1630 - Processing of 10.0331 luw started at $(timestamp)"
php panini.php 10.0331 luw
echo "1631 - Processing of 01.0468 luw started at $(timestamp)"
php panini.php 01.0468 luw
echo "1632 - Processing of 01.1130 luw started at $(timestamp)"
php panini.php 01.1130 luw
echo "1633 - Processing of 01.0439 luw started at $(timestamp)"
php panini.php 01.0439 luw
echo "1634 - Processing of 01.0437 luw started at $(timestamp)"
php panini.php 01.0437 luw
echo "1635 - Processing of 01.0450 luw started at $(timestamp)"
php panini.php 01.0450 luw
echo "1636 - Processing of 01.0555 luw started at $(timestamp)"
php panini.php 01.0555 luw
echo "1637 - Processing of 01.0483 luw started at $(timestamp)"
php panini.php 01.0483 luw
echo "1638 - Processing of 01.0416 luw started at $(timestamp)"
php panini.php 01.0416 luw
echo "1639 - Processing of 10.0210 luw started at $(timestamp)"
php panini.php 10.0210 luw
echo "1640 - Processing of 01.1033 luw started at $(timestamp)"
php panini.php 01.1033 luw
echo "1641 - Processing of 01.0811 luw started at $(timestamp)"
php panini.php 01.0811 luw
echo "1642 - Processing of 10.0253 luw started at $(timestamp)"
php panini.php 10.0253 luw
echo "1643 - Processing of 01.0131 luw started at $(timestamp)"
php panini.php 01.0131 luw
echo "1644 - Processing of 01.0119 luw started at $(timestamp)"
php panini.php 01.0119 luw
echo "1645 - Processing of 01.0273 luw started at $(timestamp)"
php panini.php 01.0273 luw
echo "1646 - Processing of 01.0235 luw started at $(timestamp)"
php panini.php 01.0235 luw
echo "1647 - Processing of 01.0274 luw started at $(timestamp)"
php panini.php 01.0274 luw
echo "1648 - Processing of 10.0482 luw started at $(timestamp)"
php panini.php 10.0482 luw
echo "1649 - Processing of 01.0170 luw started at $(timestamp)"
php panini.php 01.0170 luw
echo "1650 - Processing of 06.0092 luw started at $(timestamp)"
php panini.php 06.0092 luw
echo "1651 - Processing of 01.0171 luw started at $(timestamp)"
php panini.php 01.0171 luw
echo "1652 - Processing of 01.0165 luw started at $(timestamp)"
php panini.php 01.0165 luw
echo "1653 - Processing of 10.0267 luw started at $(timestamp)"
php panini.php 10.0267 luw
echo "1654 - Processing of 10.0288 luw started at $(timestamp)"
php panini.php 10.0288 luw
echo "1655 - Processing of 06.0169 luw started at $(timestamp)"
php panini.php 06.0169 luw
echo "1656 - Processing of 04.0076 luw started at $(timestamp)"
php panini.php 04.0076 luw
echo "1657 - Processing of 06.0157 luw started at $(timestamp)"
php panini.php 06.0157 luw
echo "1658 - Processing of 02.0006 law started at $(timestamp)"
php panini.php 02.0006 law
echo "1659 - Processing of 02.0006 luw started at $(timestamp)"
php panini.php 02.0006 luw
echo "1660 - Processing of 02.0006 low started at $(timestamp)"
php panini.php 02.0006 low
echo "1661 - Processing of 02.0006 laN started at $(timestamp)"
php panini.php 02.0006 laN
echo "1662 - Processing of 09.0343 luw started at $(timestamp)"
php panini.php 09.0343 luw
echo "1663 - Processing of 09.0343 low started at $(timestamp)"
php panini.php 09.0343 low
echo "1664 - Processing of 01.0214 luw started at $(timestamp)"
php panini.php 01.0214 luw
echo "1665 - Processing of 10.0289 luw started at $(timestamp)"
php panini.php 10.0289 luw
echo "1666 - Processing of 01.0351 luw started at $(timestamp)"
php panini.php 01.0351 luw
echo "1667 - Processing of 10.0133 luw started at $(timestamp)"
php panini.php 10.0133 luw
echo "1668 - Processing of 01.0850 luw started at $(timestamp)"
php panini.php 01.0850 luw
echo "1669 - Processing of 06.0284 luw started at $(timestamp)"
php panini.php 06.0284 luw
echo "1670 - Processing of 01.0390 luw started at $(timestamp)"
php panini.php 01.0390 luw
echo "1671 - Processing of 01.0851 luw started at $(timestamp)"
php panini.php 01.0851 luw
echo "1672 - Processing of 04.0134 luw started at $(timestamp)"
php panini.php 04.0134 luw
echo "1673 - Processing of 06.0110 luw started at $(timestamp)"
php panini.php 06.0110 luw
echo "1674 - Processing of 01.0352 luw started at $(timestamp)"
php panini.php 01.0352 luw
echo "1675 - Processing of 06.0111 luw started at $(timestamp)"
php panini.php 06.0111 luw
echo "1676 - Processing of 01.0372 luw started at $(timestamp)"
php panini.php 01.0372 luw
echo "1677 - Processing of 10.0040 luw started at $(timestamp)"
php panini.php 10.0040 luw
echo "1678 - Processing of 01.0374 luw started at $(timestamp)"
php panini.php 01.0374 luw
echo "1679 - Processing of 01.0398 luw started at $(timestamp)"
php panini.php 01.0398 luw
echo "1680 - Processing of 01.0401 luw started at $(timestamp)"
php panini.php 01.0401 luw
echo "1681 - Processing of 01.0376 luw started at $(timestamp)"
php panini.php 01.0376 luw
echo "1682 - Processing of 01.0047 luw started at $(timestamp)"
php panini.php 01.0047 luw
echo "1683 - Processing of 04.0150 luw started at $(timestamp)"
php panini.php 04.0150 luw
echo "1684 - Processing of 04.0153 luw started at $(timestamp)"
php panini.php 04.0153 luw
echo "1685 - Processing of 06.0025 luw started at $(timestamp)"
php panini.php 06.0025 luw
echo "1686 - Processing of 10.0159 luw started at $(timestamp)"
php panini.php 10.0159 luw
echo "1687 - Processing of 01.0493 luw started at $(timestamp)"
php panini.php 01.0493 luw
echo "1688 - Processing of 09.0016 luw started at $(timestamp)"
php panini.php 09.0016 luw
echo "1689 - Processing of 09.0016 low started at $(timestamp)"
php panini.php 09.0016 low
echo "1690 - Processing of 01.0771 luw started at $(timestamp)"
php panini.php 01.0771 luw
echo "1691 - Processing of 10.0100 luw started at $(timestamp)"
php panini.php 10.0100 luw
echo "1692 - Processing of 01.0431 luw started at $(timestamp)"
php panini.php 01.0431 luw
echo "1693 - Processing of 10.0307 luw started at $(timestamp)"
php panini.php 10.0307 luw
echo "1694 - Processing of 01.0080 luw started at $(timestamp)"
php panini.php 01.0080 luw
echo "1695 - Processing of 10.0308 luw started at $(timestamp)"
php panini.php 10.0308 luw
echo "1696 - Processing of 01.0188 luw started at $(timestamp)"
php panini.php 01.0188 luw
echo "1697 - Processing of 01.0413 luw started at $(timestamp)"
php panini.php 01.0413 luw
echo "1698 - Processing of 01.0291 luw started at $(timestamp)"
php panini.php 01.0291 luw
echo "1699 - Processing of 01.0753 luw started at $(timestamp)"
php panini.php 01.0753 luw
echo "1700 - Processing of 01.0138 luw started at $(timestamp)"
php panini.php 01.0138 luw
echo "1701 - Processing of 01.0093 luw started at $(timestamp)"
php panini.php 01.0093 luw
echo "1702 - Processing of 01.0100 luw started at $(timestamp)"
php panini.php 01.0100 luw
echo "1703 - Processing of 01.0139 luw started at $(timestamp)"
php panini.php 01.0139 luw
echo "1704 - Processing of 01.0156 luw started at $(timestamp)"
php panini.php 01.0156 luw
echo "1705 - Processing of 01.0116 luw started at $(timestamp)"
php panini.php 01.0116 luw
echo "1706 - Processing of 10.0058 luw started at $(timestamp)"
php panini.php 10.0058 luw
echo "1707 - Processing of 10.0058 lfw started at $(timestamp)"
php panini.php 10.0058 lfw
echo "1708 - Processing of 10.0058 lfN started at $(timestamp)"
php panini.php 10.0058 lfN
echo "1709 - Processing of 01.0285 luw started at $(timestamp)"
php panini.php 01.0285 luw
echo "1710 - Processing of 01.0216 luw started at $(timestamp)"
php panini.php 01.0216 luw
echo "1711 - Processing of 10.0227 luw started at $(timestamp)"
php panini.php 10.0227 luw
echo "1712 - Processing of 10.0395 luw started at $(timestamp)"
php panini.php 10.0395 luw
echo "1713 - Processing of 10.0461 luw started at $(timestamp)"
php panini.php 10.0461 luw
echo "1714 - Processing of 01.0888 luw started at $(timestamp)"
php panini.php 01.0888 luw
echo "1715 - Processing of 01.0337 luw started at $(timestamp)"
php panini.php 01.0337 luw
echo "1716 - Processing of 01.0382 luw started at $(timestamp)"
php panini.php 01.0382 luw
echo "1717 - Processing of 01.0514 luw started at $(timestamp)"
php panini.php 01.0514 luw
echo "1718 - Processing of 01.0377 luw started at $(timestamp)"
php panini.php 01.0377 luw
echo "1719 - Processing of 10.0464 luw started at $(timestamp)"
php panini.php 10.0464 luw
echo "1720 - Processing of 01.0295 luw started at $(timestamp)"
php panini.php 01.0295 luw
echo "1721 - Processing of 01.0304 luw started at $(timestamp)"
php panini.php 01.0304 luw
echo "1722 - Processing of 10.0379 luw started at $(timestamp)"
php panini.php 10.0379 luw
echo "1723 - Processing of 01.1164 luw started at $(timestamp)"
php panini.php 01.1164 luw
echo "1724 - Processing of 01.0534 luw started at $(timestamp)"
php panini.php 01.0534 luw
echo "1725 - Processing of 01.0915 luw started at $(timestamp)"
php panini.php 01.0915 luw
echo "1726 - Processing of 08.0008 luw started at $(timestamp)"
php panini.php 08.0008 luw
echo "1727 - Processing of 01.0533 luw started at $(timestamp)"
php panini.php 01.0533 luw
echo "1728 - Processing of 01.0011 luw started at $(timestamp)"
php panini.php 01.0011 luw
echo "1729 - Processing of 01.1158 luw started at $(timestamp)"
php panini.php 01.1158 luw
echo "1730 - Processing of 01.0984 luw started at $(timestamp)"
php panini.php 01.0984 luw
echo "1731 - Processing of 01.0547 luw started at $(timestamp)"
php panini.php 01.0547 luw
echo "1732 - Processing of 10.0390 luw started at $(timestamp)"
php panini.php 10.0390 luw
echo "1733 - Processing of 01.0186 luw started at $(timestamp)"
php panini.php 01.0186 luw
echo "1734 - Processing of 10.0484 luw started at $(timestamp)"
php panini.php 10.0484 luw
echo "1735 - Processing of 10.0156 luw started at $(timestamp)"
php panini.php 10.0156 luw
echo "1736 - Processing of 01.0697 luw started at $(timestamp)"
php panini.php 01.0697 luw
echo "1737 - Processing of 10.0175 luw started at $(timestamp)"
php panini.php 10.0175 luw
echo "1738 - Processing of 01.0727 luw started at $(timestamp)"
php panini.php 01.0727 luw
echo "1739 - Processing of 01.0564 luw started at $(timestamp)"
php panini.php 01.0564 luw
echo "1740 - Processing of 01.0152 luw started at $(timestamp)"
php panini.php 01.0152 luw
echo "1741 - Processing of 01.0456 luw started at $(timestamp)"
php panini.php 01.0456 luw
echo "1742 - Processing of 01.0565 luw started at $(timestamp)"
php panini.php 01.0565 luw
echo "1743 - Processing of 01.0728 luw started at $(timestamp)"
php panini.php 01.0728 luw
echo "1744 - Processing of 02.0075 luw started at $(timestamp)"
php panini.php 02.0075 luw
echo "1745 - Processing of 01.0787 luw started at $(timestamp)"
php panini.php 01.0787 luw
echo "1746 - Processing of 01.0106 luw started at $(timestamp)"
php panini.php 01.0106 luw
echo "1747 - Processing of 10.0488 luw started at $(timestamp)"
php panini.php 10.0488 luw
echo "1748 - Processing of 02.0111 law started at $(timestamp)"
php panini.php 02.0111 law
echo "1749 - Processing of 02.0111 luw started at $(timestamp)"
php panini.php 02.0111 luw
echo "1750 - Processing of 02.0111 low started at $(timestamp)"
php panini.php 02.0111 low
echo "1751 - Processing of 02.0111 laN started at $(timestamp)"
php panini.php 02.0111 laN
echo "1752 - Processing of 04.0273 luw started at $(timestamp)"
php panini.php 04.0273 luw
echo "1753 - Processing of 10.0205 luw started at $(timestamp)"
php panini.php 10.0205 luw
echo "1754 - Processing of 01.1159 luw started at $(timestamp)"
php panini.php 01.1159 luw
echo "1755 - Processing of 01.0761 luw started at $(timestamp)"
php panini.php 01.0761 luw
echo "1756 - Processing of 01.0236 luw started at $(timestamp)"
php panini.php 01.0236 luw
echo "1757 - Processing of 01.0321 luw started at $(timestamp)"
php panini.php 01.0321 luw
echo "1758 - Processing of 01.0321 lfw started at $(timestamp)"
php panini.php 01.0321 lfw
echo "1759 - Processing of 01.0321 lfN started at $(timestamp)"
php panini.php 01.0321 lfN
echo "1760 - Processing of 10.0424 luw started at $(timestamp)"
php panini.php 10.0424 luw
echo "1761 - Processing of 04.0056 luw started at $(timestamp)"
php panini.php 04.0056 luw
echo "1762 - Processing of 04.0059 luw started at $(timestamp)"
php panini.php 04.0059 luw
echo "1763 - Processing of 10.0426 luw started at $(timestamp)"
php panini.php 10.0426 luw
echo "1764 - Processing of 07.0005 law started at $(timestamp)"
php panini.php 07.0005 law
echo "1765 - Processing of 07.0005 luw started at $(timestamp)"
php panini.php 07.0005 luw
echo "1766 - Processing of 07.0005 low started at $(timestamp)"
php panini.php 07.0005 low
echo "1767 - Processing of 07.0005 laN started at $(timestamp)"
php panini.php 07.0005 laN
echo "1768 - Processing of 03.0013 law started at $(timestamp)"
php panini.php 03.0013 law
echo "1769 - Processing of 03.0013 luw started at $(timestamp)"
php panini.php 03.0013 luw
echo "1770 - Processing of 03.0013 low started at $(timestamp)"
php panini.php 03.0013 low
echo "1771 - Processing of 03.0013 laN started at $(timestamp)"
php panini.php 03.0013 laN
echo "1772 - Processing of 06.0009 luw started at $(timestamp)"
php panini.php 06.0009 luw
echo "1773 - Processing of 07.0023 luw started at $(timestamp)"
php panini.php 07.0023 luw
echo "1774 - Processing of 01.0354 luw started at $(timestamp)"
php panini.php 01.0354 luw
echo "1775 - Processing of 01.0033 luw started at $(timestamp)"
php panini.php 01.0033 luw
echo "1776 - Processing of 06.0013 luw started at $(timestamp)"
php panini.php 06.0013 luw
echo "1777 - Processing of 07.0232 law started at $(timestamp)"
php panini.php 07.0232 law
echo "1778 - Processing of 07.0232 luw started at $(timestamp)"
php panini.php 07.0232 luw
echo "1779 - Processing of 07.0232 low started at $(timestamp)"
php panini.php 07.0232 low
echo "1780 - Processing of 07.0232 laN started at $(timestamp)"
php panini.php 07.0232 laN
echo "1781 - Processing of 04.0168 luw started at $(timestamp)"
php panini.php 04.0168 luw
echo "1782 - Processing of 06.0050 luw started at $(timestamp)"
php panini.php 06.0050 luw
echo "1783 - Processing of 10.0138 luw started at $(timestamp)"
php panini.php 10.0138 luw
echo "1784 - Processing of 06.0094 luw started at $(timestamp)"
php panini.php 06.0094 luw
echo "1785 - Processing of 06.0160 luw started at $(timestamp)"
php panini.php 06.0160 luw
echo "1786 - Processing of 01.0794 luw started at $(timestamp)"
php panini.php 01.0794 luw
echo "1787 - Processing of 09.0062 luw started at $(timestamp)"
php panini.php 09.0062 luw
echo "1788 - Processing of 09.0062 low started at $(timestamp)"
php panini.php 09.0062 low
echo "1789 - Processing of 03.0014 law started at $(timestamp)"
php panini.php 03.0014 law
echo "1790 - Processing of 03.0014 luw started at $(timestamp)"
php panini.php 03.0014 luw
echo "1791 - Processing of 03.0014 low started at $(timestamp)"
php panini.php 03.0014 low
echo "1792 - Processing of 03.0014 laN started at $(timestamp)"
php panini.php 03.0014 laN
echo "1793 - Processing of 10.0486 luw started at $(timestamp)"
php panini.php 10.0486 luw
echo "1794 - Processing of 10.0207 luw started at $(timestamp)"
php panini.php 10.0207 luw
echo "1795 - Processing of 01.0818 luw started at $(timestamp)"
php panini.php 01.0818 luw
echo "1796 - Processing of 04.0124 luw started at $(timestamp)"
php panini.php 04.0124 luw
echo "1797 - Processing of 02.0043 luw started at $(timestamp)"
php panini.php 02.0043 luw
echo "1798 - Processing of 01.0209 luw started at $(timestamp)"
php panini.php 01.0209 luw
echo "1799 - Processing of 10.0445 luw started at $(timestamp)"
php panini.php 10.0445 luw
echo "1800 - Processing of 01.0178 luw started at $(timestamp)"
php panini.php 01.0178 luw
echo "1801 - Processing of 04.0118 luw started at $(timestamp)"
php panini.php 04.0118 luw
echo "1802 - Processing of 10.0837 luw started at $(timestamp)"
php panini.php 10.0837 luw
echo "1803 - Processing of 05.0008 luw started at $(timestamp)"
php panini.php 05.0008 luw
echo "1804 - Processing of 09.0299 luw started at $(timestamp)"
php panini.php 09.0299 luw
echo "1805 - Processing of 10.0345 luw started at $(timestamp)"
php panini.php 10.0345 luw
echo "1806 - Processing of 01.0097 luw started at $(timestamp)"
php panini.php 01.0097 luw
echo "1807 - Processing of 01.0688 luw started at $(timestamp)"
php panini.php 01.0688 luw
echo "1808 - Processing of 10.0022 luw started at $(timestamp)"
php panini.php 10.0022 luw
echo "1809 - Processing of 02.0024 law started at $(timestamp)"
php panini.php 02.0024 law
echo "1810 - Processing of 02.0024 luw started at $(timestamp)"
php panini.php 02.0024 luw
echo "1811 - Processing of 02.0024 low started at $(timestamp)"
php panini.php 02.0024 low
echo "1812 - Processing of 02.0024 laN started at $(timestamp)"
php panini.php 02.0024 laN
echo "1813 - Processing of 07.0344 luw started at $(timestamp)"
php panini.php 07.0344 luw
echo "1814 - Processing of 02.0023 law started at $(timestamp)"
php panini.php 02.0023 law
echo "1815 - Processing of 02.0023 luw started at $(timestamp)"
php panini.php 02.0023 luw
echo "1816 - Processing of 02.0023 low started at $(timestamp)"
php panini.php 02.0023 low
echo "1817 - Processing of 02.0023 laN started at $(timestamp)"
php panini.php 02.0023 laN
echo "1818 - Processing of 06.0056 luw started at $(timestamp)"
php panini.php 06.0056 luw
echo "1819 - Processing of 10.0055 luw started at $(timestamp)"
php panini.php 10.0055 luw
echo "1820 - Processing of 04.0312 luw started at $(timestamp)"
php panini.php 04.0312 luw
echo "1821 - Processing of 01.0862 luw started at $(timestamp)"
php panini.php 01.0862 luw
echo "1822 - Processing of 10.0313 luw started at $(timestamp)"
php panini.php 10.0313 luw
echo "1823 - Processing of 01.0863 luw started at $(timestamp)"
php panini.php 01.0863 luw
echo "1824 - Processing of 04.0139 luw started at $(timestamp)"
php panini.php 04.0139 luw
echo "1825 - Processing of 01.0803 luw started at $(timestamp)"
php panini.php 01.0803 luw
echo "1826 - Processing of 10.0228 luw started at $(timestamp)"
php panini.php 10.0228 luw
echo "1827 - Processing of 06.0073 luw started at $(timestamp)"
php panini.php 06.0073 luw
echo "1828 - Processing of 09.0019 luw started at $(timestamp)"
php panini.php 09.0019 luw
echo "1829 - Processing of 09.0019 low started at $(timestamp)"
php panini.php 09.0019 low
echo "1830 - Processing of 09.0023 luw started at $(timestamp)"
php panini.php 09.0023 luw
echo "1831 - Processing of 09.0023 low started at $(timestamp)"
php panini.php 09.0023 low
echo "1832 - Processing of 01.1161 luw started at $(timestamp)"
php panini.php 01.1161 luw
echo "1833 - Processing of 01.1018 luw started at $(timestamp)"
php panini.php 01.1018 luw
echo "1834 - Processing of 01.0034 luw started at $(timestamp)"
php panini.php 01.0034 luw
echo "1835 - Processing of 01.1019 luw started at $(timestamp)"
php panini.php 01.1019 luw
echo "1836 - Processing of 01.0425 luw started at $(timestamp)"
php panini.php 01.0425 luw
echo "1837 - Processing of 10.0421 luw started at $(timestamp)"
php panini.php 10.0421 luw
echo "1838 - Processing of 01.0614 luw started at $(timestamp)"
php panini.php 01.0614 luw
echo "1839 - Processing of 01.0619 luw started at $(timestamp)"
php panini.php 01.0619 luw
echo "1840 - Processing of 02.0072 law started at $(timestamp)"
php panini.php 02.0072 law
echo "1841 - Processing of 02.0072 luw started at $(timestamp)"
php panini.php 02.0072 luw
echo "1842 - Processing of 02.0072 low started at $(timestamp)"
php panini.php 02.0072 low
echo "1843 - Processing of 02.0072 laN started at $(timestamp)"
php panini.php 02.0072 laN
echo "1844 - Processing of 01.0288 luw started at $(timestamp)"
php panini.php 01.0288 luw
echo "1845 - Processing of 01.0819 luw started at $(timestamp)"
php panini.php 01.0819 luw
echo "1846 - Processing of 01.0620 luw started at $(timestamp)"
php panini.php 01.0620 luw
echo "1847 - Processing of 01.0868 luw started at $(timestamp)"
php panini.php 01.0868 luw
echo "1848 - Processing of 10.0136 luw started at $(timestamp)"
php panini.php 10.0136 luw
echo "1849 - Processing of 10.0478 luw started at $(timestamp)"
php panini.php 10.0478 luw
echo "1850 - Processing of 10.0137 luw started at $(timestamp)"
php panini.php 10.0137 luw
echo "1851 - Processing of 01.1024 luw started at $(timestamp)"
php panini.php 01.1024 luw
echo "1852 - Processing of 04.0114 luw started at $(timestamp)"
php panini.php 04.0114 luw
echo "1853 - Processing of 04.0008 luw started at $(timestamp)"
php panini.php 04.0008 luw
echo "1854 - Processing of 04.0276 luw started at $(timestamp)"
php panini.php 04.0276 luw
echo "1855 - Processing of 10.0115 luw started at $(timestamp)"
php panini.php 10.0115 luw
echo "1856 - Processing of 01.1162 luw started at $(timestamp)"
php panini.php 01.1162 luw
echo "1857 - Processing of 01.0247 luw started at $(timestamp)"
php panini.php 01.0247 luw
echo "1858 - Processing of 01.0286 luw started at $(timestamp)"
php panini.php 01.0286 luw
echo "1859 - Processing of 10.0109 luw started at $(timestamp)"
php panini.php 10.0109 luw
echo "1860 - Processing of 01.0248 luw started at $(timestamp)"
php panini.php 01.0248 luw
echo "1861 - Processing of 10.0483 luw started at $(timestamp)"
php panini.php 10.0483 luw
echo "1862 - Processing of 06.0012 luw started at $(timestamp)"
php panini.php 06.0012 luw
echo "1863 - Processing of 09.0040 luw started at $(timestamp)"
php panini.php 09.0040 luw
echo "1864 - Processing of 09.0040 low started at $(timestamp)"
php panini.php 09.0040 low
echo "1865 - Processing of 04.0035 luw started at $(timestamp)"
php panini.php 04.0035 luw
echo "1866 - Processing of 04.0021 luw started at $(timestamp)"
php panini.php 04.0021 luw
echo "1867 - Processing of 06.0127 luw started at $(timestamp)"
php panini.php 06.0127 luw
echo "1868 - Processing of 10.0176 luw started at $(timestamp)"
php panini.php 10.0176 luw
echo "1869 - Processing of 10.0174 luw started at $(timestamp)"
php panini.php 10.0174 luw
echo "1870 - Processing of 10.0174 lfw started at $(timestamp)"
php panini.php 10.0174 lfw
echo "1871 - Processing of 10.0174 lfN started at $(timestamp)"
php panini.php 10.0174 lfN
echo "1872 - Processing of 09.0037 luw started at $(timestamp)"
php panini.php 09.0037 luw
echo "1873 - Processing of 09.0037 low started at $(timestamp)"
php panini.php 09.0037 low
echo "1874 - Processing of 01.0829 luw started at $(timestamp)"
php panini.php 01.0829 luw
echo "1875 - Processing of 04.0084 luw started at $(timestamp)"
php panini.php 04.0084 luw
echo "1876 - Processing of 01.0091 luw started at $(timestamp)"
php panini.php 01.0091 luw
echo "1877 - Processing of 01.0189 luw started at $(timestamp)"
php panini.php 01.0189 luw
echo "1878 - Processing of 01.0336 luw started at $(timestamp)"
php panini.php 01.0336 luw
echo "1879 - Processing of 10.0392 luw started at $(timestamp)"
php panini.php 10.0392 luw
echo "1880 - Processing of 10.0041 luw started at $(timestamp)"
php panini.php 10.0041 luw
echo "1881 - Processing of 01.0394 luw started at $(timestamp)"
php panini.php 01.0394 luw
echo "1882 - Processing of 10.0214 luw started at $(timestamp)"
php panini.php 10.0214 luw
echo "1883 - Processing of 01.0906 luw started at $(timestamp)"
php panini.php 01.0906 luw
echo "1884 - Processing of 01.0313 luw started at $(timestamp)"
php panini.php 01.0313 luw
echo "1885 - Processing of 04.0064 luw started at $(timestamp)"
php panini.php 04.0064 luw
echo "1886 - Processing of 01.1155 luw started at $(timestamp)"
php panini.php 01.1155 luw
echo "1887 - Processing of 10.0239 luw started at $(timestamp)"
php panini.php 10.0239 luw
echo "1888 - Processing of 04.0218 luw started at $(timestamp)"
php panini.php 04.0218 luw
echo "1889 - Processing of 10.0031 luw started at $(timestamp)"
php panini.php 10.0031 luw
echo "1890 - Processing of 01.0489 luw started at $(timestamp)"
php panini.php 01.0489 luw
echo "1891 - Processing of 01.0668 luw started at $(timestamp)"
php panini.php 01.0668 luw
echo "1892 - Processing of 01.0977 luw started at $(timestamp)"
php panini.php 01.0977 luw
echo "1893 - Processing of 01.0563 luw started at $(timestamp)"
php panini.php 01.0563 luw
echo "1894 - Processing of 01.0455 luw started at $(timestamp)"
php panini.php 01.0455 luw
echo "1895 - Processing of 01.0826 luw started at $(timestamp)"
php panini.php 01.0826 luw
echo "1896 - Processing of 01.0827 luw started at $(timestamp)"
php panini.php 01.0827 luw
echo "1897 - Processing of 01.0786 luw started at $(timestamp)"
php panini.php 01.0786 luw
echo "1898 - Processing of 01.0828 luw started at $(timestamp)"
php panini.php 01.0828 luw
echo "1899 - Processing of 01.0134 luw started at $(timestamp)"
php panini.php 01.0134 luw
echo "1900 - Processing of 01.0324 luw started at $(timestamp)"
php panini.php 01.0324 luw
echo "1901 - Processing of 01.1150 luw started at $(timestamp)"
php panini.php 01.1150 luw
echo "1902 - Processing of 10.0052 luw started at $(timestamp)"
php panini.php 10.0052 luw
echo "1903 - Processing of 02.0070 luw started at $(timestamp)"
php panini.php 02.0070 luw
echo "1904 - Processing of 05.0003 luw started at $(timestamp)"
php panini.php 05.0003 luw
echo "1905 - Processing of 01.0689 luw started at $(timestamp)"
php panini.php 01.0689 luw
echo "1906 - Processing of 01.0174 luw started at $(timestamp)"
php panini.php 01.0174 luw
echo "1907 - Processing of 01.0184 luw started at $(timestamp)"
php panini.php 01.0184 luw
echo "1908 - Processing of 02.0019 law started at $(timestamp)"
php panini.php 02.0019 law
echo "1909 - Processing of 02.0019 luw started at $(timestamp)"
php panini.php 02.0019 luw
echo "1910 - Processing of 02.0019 low started at $(timestamp)"
php panini.php 02.0019 low
echo "1911 - Processing of 02.0019 laN started at $(timestamp)"
php panini.php 02.0019 laN
echo "1912 - Processing of 01.0340 luw started at $(timestamp)"
php panini.php 01.0340 luw
echo "1913 - Processing of 06.0089 luw started at $(timestamp)"
php panini.php 06.0089 luw
echo "1914 - Processing of 01.0783 luw started at $(timestamp)"
php panini.php 01.0783 luw
echo "1915 - Processing of 07.0349 luw started at $(timestamp)"
php panini.php 07.0349 luw
echo "1916 - Processing of 02.0026 luw started at $(timestamp)"
php panini.php 02.0026 luw
echo "1917 - Processing of 10.0363 luw started at $(timestamp)"
php panini.php 10.0363 luw
echo "1918 - Processing of 10.0320 luw started at $(timestamp)"
php panini.php 10.0320 luw
echo "1919 - Processing of 01.0078 luw started at $(timestamp)"
php panini.php 01.0078 luw
echo "1920 - Processing of 01.0444 luw started at $(timestamp)"
php panini.php 01.0444 luw
echo "1921 - Processing of 10.0419 luw started at $(timestamp)"
php panini.php 10.0419 luw
echo "1922 - Processing of 01.0601 luw started at $(timestamp)"
php panini.php 01.0601 luw
echo "1923 - Processing of 01.0127 luw started at $(timestamp)"
php panini.php 01.0127 luw
echo "1924 - Processing of 04.0061 luw started at $(timestamp)"
php panini.php 04.0061 luw
echo "1925 - Processing of 01.0210 luw started at $(timestamp)"
php panini.php 01.0210 luw
echo "1926 - Processing of 01.0590 luw started at $(timestamp)"
php panini.php 01.0590 luw
echo "1927 - Processing of 01.0395 luw started at $(timestamp)"
php panini.php 01.0395 luw
echo "1928 - Processing of 01.0396 luw started at $(timestamp)"
php panini.php 01.0396 luw
echo "1929 - Processing of 01.0399 luw started at $(timestamp)"
php panini.php 01.0399 luw
echo "1930 - Processing of 04.0088 luw started at $(timestamp)"
php panini.php 04.0088 luw
echo "1931 - Processing of 06.0062 luw started at $(timestamp)"
php panini.php 06.0062 luw
echo "1932 - Processing of 01.0077 luw started at $(timestamp)"
php panini.php 01.0077 luw
echo "1933 - Processing of 10.0369 luw started at $(timestamp)"
php panini.php 10.0369 luw
echo "1934 - Processing of 01.0853 luw started at $(timestamp)"
php panini.php 01.0853 luw
echo "1935 - Processing of 06.0046 luw started at $(timestamp)"
php panini.php 06.0046 luw
echo "1936 - Processing of 01.0500 luw started at $(timestamp)"
php panini.php 01.0500 luw
echo "1937 - Processing of 01.0501 luw started at $(timestamp)"
php panini.php 01.0501 luw
echo "1938 - Processing of 06.0047 luw started at $(timestamp)"
php panini.php 06.0047 luw
echo "1939 - Processing of 04.0080 luw started at $(timestamp)"
php panini.php 04.0080 luw
echo "1940 - Processing of 10.0444 luw started at $(timestamp)"
php panini.php 10.0444 luw
echo "1941 - Processing of 04.0052 luw started at $(timestamp)"
php panini.php 04.0052 luw
echo "1942 - Processing of 01.0604 luw started at $(timestamp)"
php panini.php 01.0604 luw
echo "1943 - Processing of 01.0773 luw started at $(timestamp)"
php panini.php 01.0773 luw
echo "1944 - Processing of 01.0864 luw started at $(timestamp)"
php panini.php 01.0864 luw
echo "1945 - Processing of 10.0260 luw started at $(timestamp)"
php panini.php 10.0260 luw
echo "1946 - Processing of 01.1014 luw started at $(timestamp)"
php panini.php 01.1014 luw
echo "1947 - Processing of 01.0623 luw started at $(timestamp)"
php panini.php 01.0623 luw
echo "1948 - Processing of 01.0580 luw started at $(timestamp)"
php panini.php 01.0580 luw
echo "1949 - Processing of 01.0524 luw started at $(timestamp)"
php panini.php 01.0524 luw
echo "1950 - Processing of 01.0325 luw started at $(timestamp)"
php panini.php 01.0325 luw
echo "1951 - Processing of 01.0041 luw started at $(timestamp)"
php panini.php 01.0041 luw
echo "1952 - Processing of 01.0042 luw started at $(timestamp)"
php panini.php 01.0042 luw
echo "1953 - Processing of 01.0909 luw started at $(timestamp)"
php panini.php 01.0909 luw
echo "1954 - Processing of 01.0596 luw started at $(timestamp)"
php panini.php 01.0596 luw
echo "1955 - Processing of 01.0865 luw started at $(timestamp)"
php panini.php 01.0865 luw
echo "1956 - Processing of 01.0865 luN started at $(timestamp)"
php panini.php 01.0865 luN
echo "1957 - Processing of 01.1108 luw started at $(timestamp)"
php panini.php 01.1108 luw
echo "1958 - Processing of 01.1118 luw started at $(timestamp)"
php panini.php 01.1118 luw
echo "1959 - Processing of 01.0857 luw started at $(timestamp)"
php panini.php 01.0857 luw
echo "1960 - Processing of 01.0089 luw started at $(timestamp)"
php panini.php 01.0089 luw
echo "1961 - Processing of 01.0161 luw started at $(timestamp)"
php panini.php 01.0161 luw
echo "1962 - Processing of 01.0907 luw started at $(timestamp)"
php panini.php 01.0907 luw
echo "1963 - Processing of 10.0063 luw started at $(timestamp)"
php panini.php 10.0063 luw
echo "1964 - Processing of 10.0409 luw started at $(timestamp)"
php panini.php 10.0409 luw
echo "1965 - Processing of 01.0908 luw started at $(timestamp)"
php panini.php 01.0908 luw
echo "1966 - Processing of 10.0360 luw started at $(timestamp)"
php panini.php 10.0360 luw
echo "1967 - Processing of 09.0374 luw started at $(timestamp)"
php panini.php 09.0374 luw
echo "1968 - Processing of 09.0048 luw started at $(timestamp)"
php panini.php 09.0048 luw
echo "1969 - Processing of 01.0035 luw started at $(timestamp)"
php panini.php 01.0035 luw
echo "1970 - Processing of 04.0101 luw started at $(timestamp)"
php panini.php 04.0101 luw
echo "1971 - Processing of 01.0458 luw started at $(timestamp)"
php panini.php 01.0458 luw
echo "1972 - Processing of 01.1044 luw started at $(timestamp)"
php panini.php 01.1044 luw
echo "1973 - Processing of 01.0798 luw started at $(timestamp)"
php panini.php 01.0798 luw
echo "1974 - Processing of 09.0003 luw started at $(timestamp)"
php panini.php 09.0003 luw
echo "1975 - Processing of 09.0003 low started at $(timestamp)"
php panini.php 09.0003 low
echo "1976 - Processing of 01.1092 luw started at $(timestamp)"
php panini.php 01.1092 luw
echo "1977 - Processing of 01.0525 luw started at $(timestamp)"
php panini.php 01.0525 luw
echo "1978 - Processing of 01.0090 luw started at $(timestamp)"
php panini.php 01.0090 luw
echo "1979 - Processing of 01.0162 luw started at $(timestamp)"
php panini.php 01.0162 luw
echo "1980 - Processing of 01.0910 luw started at $(timestamp)"
php panini.php 01.0910 luw
echo "1981 - Processing of 01.0135 luw started at $(timestamp)"
php panini.php 01.0135 luw
echo "1982 - Processing of 01.0122 luw started at $(timestamp)"
php panini.php 01.0122 luw
echo "1983 - Processing of 01.0799 luw started at $(timestamp)"
php panini.php 01.0799 luw
echo "1984 - Processing of 01.0081 luw started at $(timestamp)"
php panini.php 01.0081 luw
echo "1985 - Processing of 01.0526 luw started at $(timestamp)"
php panini.php 01.0526 luw
echo "1986 - Processing of 01.0101 luw started at $(timestamp)"
php panini.php 01.0101 luw
echo "1987 - Processing of 01.0190 luw started at $(timestamp)"
php panini.php 01.0190 luw
echo "1988 - Processing of 01.0191 luw started at $(timestamp)"
php panini.php 01.0191 luw
echo "1989 - Processing of 10.0393 luw started at $(timestamp)"
php panini.php 10.0393 luw
echo "1990 - Processing of 10.0042 luw started at $(timestamp)"
php panini.php 10.0042 luw
echo "1991 - Processing of 10.0117 luw started at $(timestamp)"
php panini.php 10.0117 luw
echo "1992 - Processing of 01.0630 luw started at $(timestamp)"
php panini.php 01.0630 luw
echo "1993 - Processing of 10.0053 luw started at $(timestamp)"
php panini.php 10.0053 luw
echo "1994 - Processing of 01.0631 luw started at $(timestamp)"
php panini.php 01.0631 luw
echo "1995 - Processing of 02.0064 luw started at $(timestamp)"
php panini.php 02.0064 luw
echo "1996 - Processing of 01.1165 luw started at $(timestamp)"
php panini.php 01.1165 luw
echo "1997 - Processing of 01.0843 luw started at $(timestamp)"
php panini.php 01.0843 luw
echo "1998 - Processing of 01.0010 luw started at $(timestamp)"
php panini.php 01.0010 luw
echo "1999 - Processing of 01.0641 luw started at $(timestamp)"
php panini.php 01.0641 luw
echo "2000 - Processing of 01.0105 luw started at $(timestamp)"
php panini.php 01.0105 luw
echo "2001 - Processing of 02.0074 luw started at $(timestamp)"
php panini.php 02.0074 luw
echo "2002 - Processing of 02.0074 low started at $(timestamp)"
php panini.php 02.0074 low
echo "2003 - Processing of 02.0074 laN started at $(timestamp)"
php panini.php 02.0074 laN
echo "2004 - Processing of 01.0898 luw started at $(timestamp)"
php panini.php 01.0898 luw
echo "2005 - Processing of 10.0433 luw started at $(timestamp)"
php panini.php 10.0433 luw
echo "2006 - Processing of 10.0467 luw started at $(timestamp)"
php panini.php 10.0467 luw
echo "2007 - Processing of 01.0187 luw started at $(timestamp)"
php panini.php 01.0187 luw
echo "2008 - Processing of 01.1152 luw started at $(timestamp)"
php panini.php 01.1152 luw
echo "2009 - Processing of 01.0229 luw started at $(timestamp)"
php panini.php 01.0229 luw
echo "2010 - Processing of 01.0350 luw started at $(timestamp)"
php panini.php 01.0350 luw
echo "2011 - Processing of 10.0128 luw started at $(timestamp)"
php panini.php 10.0128 luw
echo "2012 - Processing of 10.0448 luw started at $(timestamp)"
php panini.php 10.0448 luw
echo "2013 - Processing of 05.0024 luw started at $(timestamp)"
php panini.php 05.0024 luw
echo "2014 - Processing of 08.0002 luw started at $(timestamp)"
php panini.php 08.0002 luw
echo "2015 - Processing of 01.0535 luw started at $(timestamp)"
php panini.php 01.0535 luw
echo "2016 - Processing of 01.0466 luw started at $(timestamp)"
php panini.php 01.0466 luw
echo "2017 - Processing of 10.0429 luw started at $(timestamp)"
php panini.php 10.0429 luw
echo "2018 - Processing of 01.0963 luw started at $(timestamp)"
php panini.php 01.0963 luw
echo "2019 - Processing of 04.0132 luw started at $(timestamp)"
php panini.php 04.0132 luw
echo "2020 - Processing of 10.0030 luw started at $(timestamp)"
php panini.php 10.0030 luw
echo "2021 - Processing of 10.0407 luw started at $(timestamp)"
php panini.php 10.0407 luw
echo "2022 - Processing of 01.0759 luw started at $(timestamp)"
php panini.php 01.0759 luw
echo "2023 - Processing of 01.0257 luw started at $(timestamp)"
php panini.php 01.0257 luw
echo "2024 - Processing of 01.0490 luw started at $(timestamp)"
php panini.php 01.0490 luw
echo "2025 - Processing of 01.0669 luw started at $(timestamp)"
php panini.php 01.0669 luw
echo "2026 - Processing of 01.0628 luw started at $(timestamp)"
php panini.php 01.0628 luw
echo "2027 - Processing of 02.0073 luw started at $(timestamp)"
php panini.php 02.0073 luw
echo "2028 - Processing of 04.0341 luw started at $(timestamp)"
php panini.php 04.0341 luw
echo "2029 - Processing of 01.0988 luw started at $(timestamp)"
php panini.php 01.0988 luw
echo "2030 - Processing of 10.0420 luw started at $(timestamp)"
php panini.php 10.0420 luw
echo "2031 - Processing of 05.0002 luw started at $(timestamp)"
php panini.php 05.0002 luw
echo "2032 - Processing of 09.0005 luw started at $(timestamp)"
php panini.php 09.0005 luw
echo "2033 - Processing of 09.0005 low started at $(timestamp)"
php panini.php 09.0005 low
echo "2034 - Processing of 06.0170 luw started at $(timestamp)"
php panini.php 06.0170 luw
echo "2035 - Processing of 01.0341 luw started at $(timestamp)"
php panini.php 01.0341 luw
echo "2036 - Processing of 01.0049 luw started at $(timestamp)"
php panini.php 01.0049 luw
echo "2037 - Processing of 01.0050 luw started at $(timestamp)"
php panini.php 01.0050 luw
echo "2038 - Processing of 04.0089 luw started at $(timestamp)"
php panini.php 04.0089 luw
echo "2039 - Processing of 01.0674 luw started at $(timestamp)"
php panini.php 01.0674 luw
echo "2040 - Processing of 01.0498 luw started at $(timestamp)"
php panini.php 01.0498 luw
echo "2041 - Processing of 01.0499 luw started at $(timestamp)"
php panini.php 01.0499 luw
echo "2042 - Processing of 06.0090 luw started at $(timestamp)"
php panini.php 06.0090 luw
echo "2043 - Processing of 01.0079 luw started at $(timestamp)"
php panini.php 01.0079 luw
echo "2044 - Processing of 05.0001 luw started at $(timestamp)"
php panini.php 05.0001 luw
echo "2045 - Processing of 01.1091 luw started at $(timestamp)"
php panini.php 01.1091 luw
echo "2046 - Processing of 02.0036 luw started at $(timestamp)"
php panini.php 02.0036 luw
echo "2047 - Processing of 10.0475 law started at $(timestamp)"
php panini.php 10.0475 law
echo "2048 - Processing of 10.0475 liw started at $(timestamp)"
php panini.php 10.0475 liw
echo "2049 - Processing of 10.0475 luw started at $(timestamp)"
php panini.php 10.0475 luw
echo "2050 - Processing of 10.0475 lfw started at $(timestamp)"
php panini.php 10.0475 lfw
echo "2051 - Processing of 10.0475 low started at $(timestamp)"
php panini.php 10.0475 low
echo "2052 - Processing of 10.0475 laN started at $(timestamp)"
php panini.php 10.0475 laN
echo "2053 - Processing of 10.0475 ASIrliN started at $(timestamp)"
php panini.php 10.0475 ASIrliN
echo "2054 - Processing of 10.0475 viDiliN started at $(timestamp)"
php panini.php 10.0475 viDiliN
echo "2055 - Processing of 10.0475 lfN started at $(timestamp)"
php panini.php 10.0475 lfN
echo "2056 - Processing of 10.0038 luw started at $(timestamp)"
php panini.php 10.0038 luw
echo "2057 - Processing of 06.0066 luw started at $(timestamp)"
php panini.php 06.0066 luw
echo "2058 - Processing of 04.0024 luw started at $(timestamp)"
php panini.php 04.0024 luw
echo "2059 - Processing of 06.0144 luw started at $(timestamp)"
php panini.php 06.0144 luw
echo "2060 - Processing of 10.0412 luw started at $(timestamp)"
php panini.php 10.0412 luw
echo "2061 - Processing of 10.0450 luw started at $(timestamp)"
php panini.php 10.0450 luw
echo "2062 - Processing of 01.0025 luw started at $(timestamp)"
php panini.php 01.0025 luw
echo "2063 - Processing of 10.0242 luw started at $(timestamp)"
php panini.php 10.0242 luw
echo "2064 - Processing of 01.0758 luw started at $(timestamp)"
php panini.php 01.0758 luw
echo "2065 - Processing of 01.0586 luw started at $(timestamp)"
php panini.php 01.0586 luw
echo "2066 - Processing of 01.0774 luw started at $(timestamp)"
php panini.php 01.0774 luw
echo "2067 - Processing of 03.0018 luw started at $(timestamp)"
php panini.php 03.0018 luw
echo "2068 - Processing of 01.1085 luw started at $(timestamp)"
php panini.php 01.1085 luw
echo "2069 - Processing of 04.0075 luw started at $(timestamp)"
php panini.php 04.0075 luw
echo "2070 - Processing of 04.0075 luN started at $(timestamp)"
php panini.php 04.0075 luN
echo "2071 - Processing of 01.1138 luw started at $(timestamp)"
php panini.php 01.1138 luw
echo "2072 - Processing of 01.0496 luw started at $(timestamp)"
php panini.php 01.0496 luw
echo "2073 - Processing of 01.0497 luw started at $(timestamp)"
php panini.php 01.0497 luw
echo "2074 - Processing of 01.0086 luw started at $(timestamp)"
php panini.php 01.0086 luw
echo "2075 - Processing of 01.0624 luw started at $(timestamp)"
php panini.php 01.0624 luw
echo "2076 - Processing of 01.0574 luw started at $(timestamp)"
php panini.php 01.0574 luw
echo "2077 - Processing of 01.0452 luw started at $(timestamp)"
php panini.php 01.0452 luw
echo "2078 - Processing of 09.0006 luw started at $(timestamp)"
php panini.php 09.0006 luw
echo "2079 - Processing of 09.0006 low started at $(timestamp)"
php panini.php 09.0006 low
echo "2080 - Processing of 01.0009 luw started at $(timestamp)"
php panini.php 01.0009 luw
echo "2081 - Processing of 01.0872 luw started at $(timestamp)"
php panini.php 01.0872 luw
echo "2082 - Processing of 01.0625 luw started at $(timestamp)"
php panini.php 01.0625 luw
echo "2083 - Processing of 01.0891 luw started at $(timestamp)"
php panini.php 01.0891 luw
echo "2084 - Processing of 10.0398 luw started at $(timestamp)"
php panini.php 10.0398 luw
echo "2085 - Processing of 01.0532 luw started at $(timestamp)"
php panini.php 01.0532 luw
echo "2086 - Processing of 01.0964 luw started at $(timestamp)"
php panini.php 01.0964 luw
echo "2087 - Processing of 01.0451 luw started at $(timestamp)"
php panini.php 01.0451 luw
echo "2088 - Processing of 01.0970 luw started at $(timestamp)"
php panini.php 01.0970 luw
echo "2089 - Processing of 05.0021 luw started at $(timestamp)"
php panini.php 05.0021 luw
echo "2090 - Processing of 01.0422 luw started at $(timestamp)"
php panini.php 01.0422 luw
echo "2091 - Processing of 04.0019 luw started at $(timestamp)"
php panini.php 04.0019 luw
echo "2092 - Processing of 04.0020 luw started at $(timestamp)"
php panini.php 04.0020 luw
echo "2093 - Processing of 02.0038 law started at $(timestamp)"
php panini.php 02.0038 law
echo "2094 - Processing of 02.0038 luw started at $(timestamp)"
php panini.php 02.0038 luw
echo "2095 - Processing of 02.0038 low started at $(timestamp)"
php panini.php 02.0038 low
echo "2096 - Processing of 02.0038 laN started at $(timestamp)"
php panini.php 02.0038 laN
echo "2097 - Processing of 01.0199 luw started at $(timestamp)"
php panini.php 01.0199 luw
echo "2098 - Processing of 04.0190 luw started at $(timestamp)"
php panini.php 04.0190 luw
echo "2099 - Processing of 01.0460 luw started at $(timestamp)"
php panini.php 01.0460 luw
echo "2100 - Processing of 04.0191 luw started at $(timestamp)"
php panini.php 04.0191 luw
echo "2101 - Processing of 05.0006 luw started at $(timestamp)"
php panini.php 05.0006 luw
echo "2102 - Processing of 05.0006 luN started at $(timestamp)"
php panini.php 05.0006 luN
echo "2103 - Processing of 01.0751 luw started at $(timestamp)"
php panini.php 01.0751 luw
echo "2104 - Processing of 06.0076 luw started at $(timestamp)"
php panini.php 06.0076 luw
echo "2105 - Processing of 09.0017 liw started at $(timestamp)"
php panini.php 09.0017 liw
echo "2106 - Processing of 09.0017 luw started at $(timestamp)"
php panini.php 09.0017 luw
echo "2107 - Processing of 09.0017 low started at $(timestamp)"
php panini.php 09.0017 low
echo "2108 - Processing of 10.0439 luw started at $(timestamp)"
php panini.php 10.0439 luw
echo "2109 - Processing of 01.0423 luw started at $(timestamp)"
php panini.php 01.0423 luw
echo "2110 - Processing of 10.0468 luw started at $(timestamp)"
php panini.php 10.0468 luw
echo "2111 - Processing of 01.0749 luw started at $(timestamp)"
php panini.php 01.0749 luw
echo "2112 - Processing of 01.0899 luw started at $(timestamp)"
php panini.php 01.0899 luw
echo "2113 - Processing of 06.0118 luw started at $(timestamp)"
php panini.php 06.0118 luw
echo "2114 - Processing of 10.0446 luw started at $(timestamp)"
php panini.php 10.0446 luw
echo "2115 - Processing of 04.0055 luw started at $(timestamp)"
php panini.php 04.0055 luw
echo "2116 - Processing of 10.0097 luw started at $(timestamp)"
php panini.php 10.0097 luw
echo "2117 - Processing of 02.0033 luw started at $(timestamp)"
php panini.php 02.0033 luw
echo "2118 - Processing of 04.0005 luw started at $(timestamp)"
php panini.php 04.0005 luw
echo "2119 - Processing of 04.0096 luw started at $(timestamp)"
php panini.php 04.0096 luw
echo "2120 - Processing of 01.0014 luw started at $(timestamp)"
php panini.php 01.0014 luw
echo "2121 - Processing of 01.0003 luw started at $(timestamp)"
php panini.php 01.0003 luw
echo "2122 - Processing of 10.0200 luw started at $(timestamp)"
php panini.php 10.0200 luw
echo "2123 - Processing of 01.1032 luw started at $(timestamp)"
php panini.php 01.1032 luw
echo "2124 - Processing of 05.0014 luw started at $(timestamp)"
php panini.php 05.0014 luw
echo "2125 - Processing of 06.0158 luw started at $(timestamp)"
php panini.php 06.0158 luw
echo "2126 - Processing of 06.0158 luN started at $(timestamp)"
php panini.php 06.0158 luN
echo "2127 - Processing of 10.0410 law started at $(timestamp)"
php panini.php 10.0410 law
echo "2128 - Processing of 10.0410 liw started at $(timestamp)"
php panini.php 10.0410 liw
echo "2129 - Processing of 10.0410 luw started at $(timestamp)"
php panini.php 10.0410 luw
echo "2130 - Processing of 10.0410 lfw started at $(timestamp)"
php panini.php 10.0410 lfw
echo "2131 - Processing of 10.0410 low started at $(timestamp)"
php panini.php 10.0410 low
echo "2132 - Processing of 10.0410 laN started at $(timestamp)"
php panini.php 10.0410 laN
echo "2133 - Processing of 10.0410 ASIrliN started at $(timestamp)"
php panini.php 10.0410 ASIrliN
echo "2134 - Processing of 10.0410 viDiliN started at $(timestamp)"
php panini.php 10.0410 viDiliN
echo "2135 - Processing of 10.0410 lfN started at $(timestamp)"
php panini.php 10.0410 lfN
echo "2136 - Processing of 06.0123 luw started at $(timestamp)"
php panini.php 06.0123 luw
echo "2137 - Processing of 06.0124 luw started at $(timestamp)"
php panini.php 06.0124 luw
echo "2138 - Processing of 01.0560 luw started at $(timestamp)"
php panini.php 01.0560 luw
echo "2139 - Processing of 10.0129 luw started at $(timestamp)"
php panini.php 10.0129 luw
echo "2140 - Processing of 10.0056 luw started at $(timestamp)"
php panini.php 10.0056 luw
echo "2141 - Processing of 06.0247 luw started at $(timestamp)"
php panini.php 06.0247 luw
echo "2142 - Processing of 01.0293 luw started at $(timestamp)"
php panini.php 01.0293 luw
echo "2143 - Processing of 01.0379 luw started at $(timestamp)"
php panini.php 01.0379 luw
echo "2144 - Processing of 06.0125 luw started at $(timestamp)"
php panini.php 06.0125 luw
echo "2145 - Processing of 01.0380 luw started at $(timestamp)"
php panini.php 01.0380 luw
echo "2146 - Processing of 01.0311 luw started at $(timestamp)"
php panini.php 01.0311 luw
echo "2147 - Processing of 06.0121 luw started at $(timestamp)"
php panini.php 06.0121 luw
echo "2148 - Processing of 01.0241 luw started at $(timestamp)"
php panini.php 01.0241 luw
echo "2149 - Processing of 06.0122 luw started at $(timestamp)"
php panini.php 06.0122 luw
echo "2150 - Processing of 01.0268 luw started at $(timestamp)"
php panini.php 01.0268 luw
echo "2151 - Processing of 01.1099 luw started at $(timestamp)"
php panini.php 01.1099 luw
echo "2152 - Processing of 10.0057 luw started at $(timestamp)"
php panini.php 10.0057 luw
echo "2153 - Processing of 01.0597 luw started at $(timestamp)"
php panini.php 01.0597 luw
echo "2154 - Processing of 05.0015 luw started at $(timestamp)"
php panini.php 05.0015 luw
echo "2155 - Processing of 01.0919 luw started at $(timestamp)"
php panini.php 01.0919 luw
echo "2156 - Processing of 01.1082 luw started at $(timestamp)"
php panini.php 01.1082 luw
echo "2157 - Processing of 01.0960 luw started at $(timestamp)"
php panini.php 01.0960 luw
echo "2158 - Processing of 10.0216 luw started at $(timestamp)"
php panini.php 10.0216 luw
echo "2159 - Processing of 01.0088 luw started at $(timestamp)"
php panini.php 01.0088 luw
echo "2160 - Processing of 01.0459 luw started at $(timestamp)"
php panini.php 01.0459 luw
echo "2161 - Processing of 01.0861 luw started at $(timestamp)"
php panini.php 01.0861 luw
echo "2162 - Processing of 04.0003 luw started at $(timestamp)"
php panini.php 04.0003 luw
echo "2163 - Processing of 01.1090 luw started at $(timestamp)"
php panini.php 01.1090 luw
echo "2164 - Processing of 01.0087 luw started at $(timestamp)"
php panini.php 01.0087 luw
echo "2165 - Processing of 01.0082 luw started at $(timestamp)"
php panini.php 01.0082 luw
echo "2166 - Processing of 01.0114 luw started at $(timestamp)"
php panini.php 01.0114 luw
echo "2167 - Processing of 01.1131 luw started at $(timestamp)"
php panini.php 01.1131 luw
echo "2168 - Processing of 01.0018 luw started at $(timestamp)"
php panini.php 01.0018 luw
echo "2169 - Processing of 10.0336 luw started at $(timestamp)"
php panini.php 10.0336 luw
echo "2170 - Processing of 01.0961 luw started at $(timestamp)"
php panini.php 01.0961 luw
echo "2171 - Processing of 01.0936 luw started at $(timestamp)"
php panini.php 01.0936 luw
echo "2172 - Processing of 10.0402 luw started at $(timestamp)"
php panini.php 10.0402 luw
echo "2173 - Processing of 10.0116 luw started at $(timestamp)"
php panini.php 10.0116 luw
echo "2174 - Processing of 01.0019 luw started at $(timestamp)"
php panini.php 01.0019 luw
echo "2175 - Processing of 10.0337 luw started at $(timestamp)"
php panini.php 10.0337 luw
echo "2176 - Processing of 01.0028 luw started at $(timestamp)"
php panini.php 01.0028 luw
echo "2177 - Processing of 04.0085 luw started at $(timestamp)"
php panini.php 04.0085 luw
echo "2178 - Processing of 01.0845 luw started at $(timestamp)"
php panini.php 01.0845 luw
echo "2179 - Processing of 01.1081 luw started at $(timestamp)"
php panini.php 01.1081 luw
echo "2180 - Processing of 01.0349 luw started at $(timestamp)"
php panini.php 01.0349 luw
echo "2181 - Processing of 01.0388 luw started at $(timestamp)"
php panini.php 01.0388 luw
echo "2182 - Processing of 01.1132 luw started at $(timestamp)"
php panini.php 01.1132 luw
echo "2183 - Processing of 02.0002 low started at $(timestamp)"
php panini.php 02.0002 low
echo "2184 - Processing of 01.0538 luw started at $(timestamp)"
php panini.php 01.0538 luw
echo "2185 - Processing of 01.0592 luw started at $(timestamp)"
php panini.php 01.0592 luw
echo "2186 - Processing of 01.0589 luw started at $(timestamp)"
php panini.php 01.0589 luw
echo "2187 - Processing of 01.0971 luw started at $(timestamp)"
php panini.php 01.0971 luw
echo "2188 - Processing of 01.0822 luw started at $(timestamp)"
php panini.php 01.0822 luw
echo "2189 - Processing of 10.0206 luw started at $(timestamp)"
php panini.php 10.0206 luw
echo "2190 - Processing of 03.0008 law started at $(timestamp)"
php panini.php 03.0008 law
echo "2191 - Processing of 03.0008 luw started at $(timestamp)"
php panini.php 03.0008 luw
echo "2192 - Processing of 03.0008 low started at $(timestamp)"
php panini.php 03.0008 low
echo "2193 - Processing of 03.0008 laN started at $(timestamp)"
php panini.php 03.0008 laN
echo "2194 - Processing of 03.0009 low started at $(timestamp)"
php panini.php 03.0009 low
echo "2195 - Processing of 10.0012 luw started at $(timestamp)"
php panini.php 10.0012 luw
echo "2196 - Processing of 07.0366 luw started at $(timestamp)"
php panini.php 07.0366 luw
echo "2197 - Processing of 01.0997 luw started at $(timestamp)"
php panini.php 01.0997 luw
echo "2198 - Processing of 01.0356 luw started at $(timestamp)"
php panini.php 01.0356 luw
echo "2199 - Processing of 01.0301 luw started at $(timestamp)"
php panini.php 01.0301 luw
echo "2200 - Processing of 01.0675 luw started at $(timestamp)"
php panini.php 01.0675 luw
echo "2201 - Processing of 06.0088 luw started at $(timestamp)"
php panini.php 06.0088 luw
echo "2202 - Processing of 10.0208 luw started at $(timestamp)"
php panini.php 10.0208 luw
echo "2203 - Processing of 03.0001 luw started at $(timestamp)"
php panini.php 03.0001 luw
echo "2204 - Processing of 01.0408 luw started at $(timestamp)"
php panini.php 01.0408 luw
echo "2205 - Processing of 06.0130 luw started at $(timestamp)"
php panini.php 06.0130 luw
echo "2206 - Processing of 01.0302 luw started at $(timestamp)"
php panini.php 01.0302 luw
echo "2207 - Processing of 01.0310 luw started at $(timestamp)"
php panini.php 01.0310 luw
echo "2208 - Processing of 01.0239 luw started at $(timestamp)"
php panini.php 01.0239 luw
echo "2209 - Processing of 01.0980 luw started at $(timestamp)"
php panini.php 01.0980 luw
echo "2210 - Processing of 01.0978 luw started at $(timestamp)"
php panini.php 01.0978 luw
echo "2211 - Processing of 01.0409 luw started at $(timestamp)"
php panini.php 01.0409 luw
echo "2212 - Processing of 03.0016 luw started at $(timestamp)"
php panini.php 03.0016 luw
echo "2213 - Processing of 01.1046 luw started at $(timestamp)"
php panini.php 01.1046 luw
echo "2214 - Processing of 01.0806 luw started at $(timestamp)"
php panini.php 01.0806 luw
echo "2215 - Processing of 04.0142 luw started at $(timestamp)"
php panini.php 04.0142 luw
echo "2216 - Processing of 01.0808 luw started at $(timestamp)"
php panini.php 01.0808 luw
echo "2217 - Processing of 09.0069 luw started at $(timestamp)"
php panini.php 09.0069 luw
echo "2218 - Processing of 09.0069 low started at $(timestamp)"
php panini.php 09.0069 low
echo "2219 - Processing of 01.0299 luw started at $(timestamp)"
php panini.php 01.0299 luw
echo "2220 - Processing of 01.0360 luw started at $(timestamp)"
php panini.php 01.0360 luw
echo "2221 - Processing of 01.0318 luw started at $(timestamp)"
php panini.php 01.0318 luw
echo "2222 - Processing of 01.0887 luw started at $(timestamp)"
php panini.php 01.0887 luw
echo "2223 - Processing of 09.0070 luw started at $(timestamp)"
php panini.php 09.0070 luw
echo "2224 - Processing of 09.0070 low started at $(timestamp)"
php panini.php 09.0070 low
echo "2225 - Processing of 01.0432 luw started at $(timestamp)"
php panini.php 01.0432 luw
echo "2226 - Processing of 01.0708 luw started at $(timestamp)"
php panini.php 01.0708 luw
echo "2227 - Processing of 01.0410 luw started at $(timestamp)"
php panini.php 01.0410 luw
echo "2228 - Processing of 02.0076 law started at $(timestamp)"
php panini.php 02.0076 law
echo "2229 - Processing of 02.0076 luw started at $(timestamp)"
php panini.php 02.0076 luw
echo "2230 - Processing of 02.0076 low started at $(timestamp)"
php panini.php 02.0076 low
echo "2231 - Processing of 02.0076 laN started at $(timestamp)"
php panini.php 02.0076 laN
echo "2232 - Processing of 01.0918 luw started at $(timestamp)"
php panini.php 01.0918 luw
echo "2233 - Processing of 01.0896 luw started at $(timestamp)"
php panini.php 01.0896 luw
echo "2234 - Processing of 10.0163 luw started at $(timestamp)"
php panini.php 10.0163 luw
echo "2235 - Processing of 01.0026 luw started at $(timestamp)"
php panini.php 01.0026 luw
echo "2236 - Processing of 03.0003 luw started at $(timestamp)"
php panini.php 03.0003 luw
echo "2237 - Processing of 01.0238 luw started at $(timestamp)"
php panini.php 01.0238 luw
echo "2238 - Processing of 01.0709 luw started at $(timestamp)"
php panini.php 01.0709 luw
echo "2239 - Processing of 01.0897 luw started at $(timestamp)"
php panini.php 01.0897 luw
echo "2240 - Processing of 10.0161 luw started at $(timestamp)"
php panini.php 10.0161 luw
echo "2241 - Processing of 01.0809 luw started at $(timestamp)"
php panini.php 01.0809 luw
echo "2242 - Processing of 01.0027 luw started at $(timestamp)"
php panini.php 01.0027 luw
echo "2243 - Processing of 01.0917 luw started at $(timestamp)"
php panini.php 01.0917 luw
echo "2244 - Processing of 01.1080 luw started at $(timestamp)"
php panini.php 01.1080 luw
echo "2245 - Processing of 01.1084 luw started at $(timestamp)"
php panini.php 01.1084 luw
echo "2246 - Processing of 01.1163 luw started at $(timestamp)"
php panini.php 01.1163 luw
echo '</forms>' >> generatedforms.xml
cd scripts
python comparedb.py ../generatedforms.xml ../suspectverbforms.txt
