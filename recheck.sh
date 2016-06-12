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
echo "5 - Processing of 07.0020 viDiliN started at $(timestamp)"
php panini.php 07.0020 viDiliN
echo "6 - Processing of 02.0015 luN started at $(timestamp)"
php panini.php 02.0015 luN
echo "7 - Processing of 10.0432 luN started at $(timestamp)"
php panini.php 10.0432 luN
echo "8 - Processing of 10.0225 luN started at $(timestamp)"
php panini.php 10.0225 luN
echo "9 - Processing of 01.0682 laN started at $(timestamp)"
php panini.php 01.0682 laN
echo "10 - Processing of 06.0006 luN started at $(timestamp)"
php panini.php 06.0006 luN
echo "11 - Processing of 01.1145 luN started at $(timestamp)"
php panini.php 01.1145 luN
echo "12 - Processing of 10.0437 luN started at $(timestamp)"
php panini.php 10.0437 luN
echo "13 - Processing of 10.0416 luN started at $(timestamp)"
php panini.php 10.0416 luN
echo "14 - Processing of 10.0413 luN started at $(timestamp)"
php panini.php 10.0413 luN
echo "15 - Processing of 10.0415 luN started at $(timestamp)"
php panini.php 10.0415 luN
echo "16 - Processing of 10.0417 luN started at $(timestamp)"
php panini.php 10.0417 luN
echo "17 - Processing of 01.0717 luN started at $(timestamp)"
php panini.php 01.0717 luN
echo "18 - Processing of 10.0434 luN started at $(timestamp)"
php panini.php 10.0434 luN
echo "19 - Processing of 01.0718 luN started at $(timestamp)"
php panini.php 01.0718 luN
echo "20 - Processing of 02.0067 luN started at $(timestamp)"
php panini.php 02.0067 luN
echo "21 - Processing of 09.0346 luN started at $(timestamp)"
php panini.php 09.0346 luN
echo "22 - Processing of 07.0022 viDiliN started at $(timestamp)"
php panini.php 07.0022 viDiliN
echo "23 - Processing of 10.0454 luN started at $(timestamp)"
php panini.php 10.0454 luN
echo "24 - Processing of 02.0068 viDiliN started at $(timestamp)"
php panini.php 02.0068 viDiliN
echo "25 - Processing of 02.0068 luN started at $(timestamp)"
php panini.php 02.0068 luN
echo "26 - Processing of 01.0677 laN started at $(timestamp)"
php panini.php 01.0677 laN
echo "27 - Processing of 10.0010 luw started at $(timestamp)"
php panini.php 10.0010 luw
echo "28 - Processing of 10.0010 lfw started at $(timestamp)"
php panini.php 10.0010 lfw
echo "29 - Processing of 10.0010 ASIrliN started at $(timestamp)"
php panini.php 10.0010 ASIrliN
echo "30 - Processing of 10.0010 luN started at $(timestamp)"
php panini.php 10.0010 luN
echo "31 - Processing of 10.0010 lfN started at $(timestamp)"
php panini.php 10.0010 lfN
echo "32 - Processing of 01.0714 luN started at $(timestamp)"
php panini.php 01.0714 luN
echo "33 - Processing of 10.0427 luN started at $(timestamp)"
php panini.php 10.0427 luN
echo "34 - Processing of 01.0507 law started at $(timestamp)"
php panini.php 01.0507 law
echo "35 - Processing of 01.0507 luN started at $(timestamp)"
php panini.php 01.0507 luN
echo "36 - Processing of 01.0508 luN started at $(timestamp)"
php panini.php 01.0508 luN
echo "37 - Processing of 10.0453 luN started at $(timestamp)"
php panini.php 10.0453 luN
echo "38 - Processing of 01.0870 luN started at $(timestamp)"
php panini.php 01.0870 luN
echo "39 - Processing of 10.0428 luN started at $(timestamp)"
php panini.php 10.0428 luN
echo "40 - Processing of 10.0411 luN started at $(timestamp)"
php panini.php 10.0411 luN
echo "41 - Processing of 06.0129 liw started at $(timestamp)"
php panini.php 06.0129 liw
echo "42 - Processing of 01.0715 luN started at $(timestamp)"
php panini.php 01.0715 luN
echo "43 - Processing of 06.0161 luN started at $(timestamp)"
php panini.php 06.0161 luN
echo "44 - Processing of 01.0713 luN started at $(timestamp)"
php panini.php 01.0713 luN
echo "45 - Processing of 10.0479 luN started at $(timestamp)"
php panini.php 10.0479 luN
echo "46 - Processing of 10.0482 luN started at $(timestamp)"
php panini.php 10.0482 luN
echo "47 - Processing of 10.0307 luN started at $(timestamp)"
php panini.php 10.0307 luN
echo "48 - Processing of 10.0308 luN started at $(timestamp)"
php panini.php 10.0308 luN
echo "49 - Processing of 10.0445 luN started at $(timestamp)"
php panini.php 10.0445 luN
echo "50 - Processing of 10.0421 luN started at $(timestamp)"
php panini.php 10.0421 luN
echo "51 - Processing of 10.0419 luN started at $(timestamp)"
php panini.php 10.0419 luN
echo "52 - Processing of 10.0444 luN started at $(timestamp)"
php panini.php 10.0444 luN
echo "53 - Processing of 01.0865 luN started at $(timestamp)"
php panini.php 01.0865 luN
echo "54 - Processing of 02.0074 low started at $(timestamp)"
php panini.php 02.0074 low
echo "55 - Processing of 02.0074 laN started at $(timestamp)"
php panini.php 02.0074 laN
echo "56 - Processing of 10.0429 luN started at $(timestamp)"
php panini.php 10.0429 luN
echo "57 - Processing of 10.0407 luN started at $(timestamp)"
php panini.php 10.0407 luN
echo "58 - Processing of 10.0420 luN started at $(timestamp)"
php panini.php 10.0420 luN
echo "59 - Processing of 10.0475 luN started at $(timestamp)"
php panini.php 10.0475 luN
echo "60 - Processing of 10.0412 luN started at $(timestamp)"
php panini.php 10.0412 luN
echo "61 - Processing of 04.0075 luN started at $(timestamp)"
php panini.php 04.0075 luN
echo "62 - Processing of 10.0439 luN started at $(timestamp)"
php panini.php 10.0439 luN
echo "63 - Processing of 10.0446 luN started at $(timestamp)"
php panini.php 10.0446 luN
echo "64 - Processing of 06.0158 luN started at $(timestamp)"
php panini.php 06.0158 luN
echo '</forms>' >> generatedforms.xml
cd scripts
python comparedb.py ../generatedforms.xml ../suspectverbforms.txt
