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
echo "1 - Processing 01.0546 liw analysis started at $(timestamp)"
php panini.php 01.0546 liw
echo "2 - Processing 06.0015 liw analysis started at $(timestamp)"
php panini.php 06.0015 liw
echo "3 - Processing 01.0244 liw analysis started at $(timestamp)"
php panini.php 01.0244 liw
echo "4 - Processing 07.0020 viDiliN analysis started at $(timestamp)"
php panini.php 07.0020 viDiliN
echo "5 - Processing 01.0792 liw analysis started at $(timestamp)"
php panini.php 01.0792 liw
echo "6 - Processing 01.0391 liw analysis started at $(timestamp)"
php panini.php 01.0391 liw
echo "7 - Processing 08.0005 law analysis started at $(timestamp)"
php panini.php 08.0005 law
echo "8 - Processing 08.0005 viDiliN analysis started at $(timestamp)"
php panini.php 08.0005 viDiliN
echo "9 - Processing 09.0032 liw analysis started at $(timestamp)"
php panini.php 09.0032 liw
echo "10 - Processing 01.1148 liw analysis started at $(timestamp)"
php panini.php 01.1148 liw
echo "11 - Processing 01.1148 laN analysis started at $(timestamp)"
php panini.php 01.1148 laN
echo "12 - Processing 01.1148 lfN analysis started at $(timestamp)"
php panini.php 01.1148 lfN
echo "13 - Processing 10.0278 luN analysis started at $(timestamp)"
php panini.php 10.0278 luN
echo "14 - Processing 01.0866 luN analysis started at $(timestamp)"
php panini.php 01.0866 luN
echo "15 - Processing 09.0068 low analysis started at $(timestamp)"
php panini.php 09.0068 low
echo "16 - Processing 06.0134 liw analysis started at $(timestamp)"
php panini.php 06.0134 liw
echo "17 - Processing 01.0461 luw analysis started at $(timestamp)"
php panini.php 01.0461 luw
echo "18 - Processing 01.0461 lfw analysis started at $(timestamp)"
php panini.php 01.0461 lfw
echo "19 - Processing 01.0461 viDiliN analysis started at $(timestamp)"
php panini.php 01.0461 viDiliN
echo "20 - Processing 01.0461 luN analysis started at $(timestamp)"
php panini.php 01.0461 luN
echo "21 - Processing 01.0461 lfN analysis started at $(timestamp)"
php panini.php 01.0461 lfN
echo "22 - Processing 01.1087 liw analysis started at $(timestamp)"
php panini.php 01.1087 liw
echo "23 - Processing 01.1023 liw analysis started at $(timestamp)"
php panini.php 01.1023 liw
echo "24 - Processing 10.0275 luN analysis started at $(timestamp)"
php panini.php 10.0275 luN
echo "25 - Processing 01.1098 luN analysis started at $(timestamp)"
php panini.php 01.1098 luN
echo "26 - Processing 06.0106 luN analysis started at $(timestamp)"
php panini.php 06.0106 luN
echo "27 - Processing 07.0022 viDiliN analysis started at $(timestamp)"
php panini.php 07.0022 viDiliN
echo "28 - Processing 08.0006 laN analysis started at $(timestamp)"
php panini.php 08.0006 laN
echo "29 - Processing 05.0037 law analysis started at $(timestamp)"
php panini.php 05.0037 law
echo "30 - Processing 05.0037 low analysis started at $(timestamp)"
php panini.php 05.0037 low
echo "31 - Processing 05.0037 laN analysis started at $(timestamp)"
php panini.php 05.0037 laN
echo "32 - Processing 05.0037 viDiliN analysis started at $(timestamp)"
php panini.php 05.0037 viDiliN
echo "33 - Processing 04.0094 luN analysis started at $(timestamp)"
php panini.php 04.0094 luN
echo "34 - Processing 10.0010 luw analysis started at $(timestamp)"
php panini.php 10.0010 luw
echo "35 - Processing 10.0010 lfw analysis started at $(timestamp)"
php panini.php 10.0010 lfw
echo "36 - Processing 10.0010 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0010 ASIrliN
echo "37 - Processing 10.0010 luN analysis started at $(timestamp)"
php panini.php 10.0010 luN
echo "38 - Processing 10.0010 lfN analysis started at $(timestamp)"
php panini.php 10.0010 lfN
echo "39 - Processing 01.1050 luN analysis started at $(timestamp)"
php panini.php 01.1050 luN
echo "40 - Processing 06.0135 luN analysis started at $(timestamp)"
php panini.php 06.0135 luN
echo "41 - Processing 01.1017 luN analysis started at $(timestamp)"
php panini.php 01.1017 luN
echo "42 - Processing 02.0039 liw analysis started at $(timestamp)"
php panini.php 02.0039 liw
echo "43 - Processing 03.0019 liw analysis started at $(timestamp)"
php panini.php 03.0019 liw
echo "44 - Processing 03.0019 laN analysis started at $(timestamp)"
php panini.php 03.0019 laN
echo "45 - Processing 03.0019 viDiliN analysis started at $(timestamp)"
php panini.php 03.0019 viDiliN
echo "46 - Processing 03.0318 liw analysis started at $(timestamp)"
php panini.php 03.0318 liw
echo "47 - Processing 06.0004 luN analysis started at $(timestamp)"
php panini.php 06.0004 luN
echo "48 - Processing 06.0151 luw analysis started at $(timestamp)"
php panini.php 06.0151 luw
echo "49 - Processing 06.0151 lfw analysis started at $(timestamp)"
php panini.php 06.0151 lfw
echo "50 - Processing 06.0151 luN analysis started at $(timestamp)"
php panini.php 06.0151 luN
echo "51 - Processing 02.0057 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0057 ASIrliN
echo "52 - Processing 06.0169 luN analysis started at $(timestamp)"
php panini.php 06.0169 luN
echo "53 - Processing 10.0058 luN analysis started at $(timestamp)"
php panini.php 10.0058 luN
echo "54 - Processing 01.0321 law analysis started at $(timestamp)"
php panini.php 01.0321 law
echo "55 - Processing 01.0321 liw analysis started at $(timestamp)"
php panini.php 01.0321 liw
echo "56 - Processing 01.0321 luw analysis started at $(timestamp)"
php panini.php 01.0321 luw
echo "57 - Processing 01.0321 lfw analysis started at $(timestamp)"
php panini.php 01.0321 lfw
echo "58 - Processing 01.0321 low analysis started at $(timestamp)"
php panini.php 01.0321 low
echo "59 - Processing 01.0321 laN analysis started at $(timestamp)"
php panini.php 01.0321 laN
echo "60 - Processing 01.0321 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0321 ASIrliN
echo "61 - Processing 01.0321 viDiliN analysis started at $(timestamp)"
php panini.php 01.0321 viDiliN
echo "62 - Processing 01.0321 luN analysis started at $(timestamp)"
php panini.php 01.0321 luN
echo "63 - Processing 01.0321 lfN analysis started at $(timestamp)"
php panini.php 01.0321 lfN
echo "64 - Processing 07.0023 lfw analysis started at $(timestamp)"
php panini.php 07.0023 lfw
echo "65 - Processing 09.0019 liw analysis started at $(timestamp)"
php panini.php 09.0019 liw
echo "66 - Processing 10.0136 luN analysis started at $(timestamp)"
php panini.php 10.0136 luN
echo "67 - Processing 10.0176 liw analysis started at $(timestamp)"
php panini.php 10.0176 liw
echo "68 - Processing 10.0174 liw analysis started at $(timestamp)"
php panini.php 10.0174 liw
echo "69 - Processing 09.0037 low analysis started at $(timestamp)"
php panini.php 09.0037 low
echo "70 - Processing 09.0037 viDiliN analysis started at $(timestamp)"
php panini.php 09.0037 viDiliN
echo "71 - Processing 01.1165 liw analysis started at $(timestamp)"
php panini.php 01.1165 liw
echo "72 - Processing 01.1165 luN analysis started at $(timestamp)"
php panini.php 01.1165 luN
echo "73 - Processing 02.0074 low analysis started at $(timestamp)"
php panini.php 02.0074 low
echo "74 - Processing 02.0074 laN analysis started at $(timestamp)"
php panini.php 02.0074 laN
echo "75 - Processing 06.0170 luN analysis started at $(timestamp)"
php panini.php 06.0170 luN
echo "76 - Processing 09.0010 low analysis started at $(timestamp)"
php panini.php 09.0010 low
echo "77 - Processing 09.0010 laN analysis started at $(timestamp)"
php panini.php 09.0010 laN
echo "78 - Processing 09.0008 low analysis started at $(timestamp)"
php panini.php 09.0008 low
echo "79 - Processing 09.0008 laN analysis started at $(timestamp)"
php panini.php 09.0008 laN
echo "80 - Processing 05.0006 luN analysis started at $(timestamp)"
php panini.php 05.0006 luN
echo "81 - Processing 06.0158 luN analysis started at $(timestamp)"
php panini.php 06.0158 luN
echo "82 - Processing 03.0001 laN analysis started at $(timestamp)"
php panini.php 03.0001 laN
echo "83 - Processing 09.0069 laN analysis started at $(timestamp)"
php panini.php 09.0069 laN
echo "84 - Processing 09.0070 laN analysis started at $(timestamp)"
php panini.php 09.0070 laN
echo "85 - Processing 01.1163 luN analysis started at $(timestamp)"
php panini.php 01.1163 luN
echo '</forms>' >> generatedforms.xml
cd scripts
python comparedb.py ../generatedforms.xml ../suspectverbforms.txt
