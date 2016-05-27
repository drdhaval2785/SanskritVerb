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
echo "1 - Processing 07.0020 viDiliN analysis started at $(timestamp)"
php panini.php 07.0020 viDiliN
echo "2 - Processing 07.0022 viDiliN analysis started at $(timestamp)"
php panini.php 07.0022 viDiliN
echo "3 - Processing 10.0010 luw analysis started at $(timestamp)"
php panini.php 10.0010 luw
echo "4 - Processing 10.0010 lfw analysis started at $(timestamp)"
php panini.php 10.0010 lfw
echo "5 - Processing 10.0010 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0010 ASIrliN
echo "6 - Processing 10.0010 luN analysis started at $(timestamp)"
php panini.php 10.0010 luN
echo "7 - Processing 10.0010 lfN analysis started at $(timestamp)"
php panini.php 10.0010 lfN
echo "8 - Processing 02.0074 low analysis started at $(timestamp)"
php panini.php 02.0074 low
echo "9 - Processing 02.0074 laN analysis started at $(timestamp)"
php panini.php 02.0074 laN
echo "10 - Processing 06.0158 luN analysis started at $(timestamp)"
php panini.php 06.0158 luN
echo '</forms>' >> generatedforms.xml
cd scripts
python comparedb.py ../generatedforms.xml ../suspectverbforms.txt
