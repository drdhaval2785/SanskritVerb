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
echo "$number - Processing 10.0460 liw analysis started at $(timestamp)"
php panini.php 10.0460 liw
((number++))
echo "$number - Processing 01.0092 luN analysis started at $(timestamp)"
php panini.php 01.0092 luN
((number++))
echo "$number - Processing 01.0115 liw analysis started at $(timestamp)"
php panini.php 01.0115 liw
((number++))
echo "$number - Processing 01.0115 luN analysis started at $(timestamp)"
php panini.php 01.0115 luN
((number++))
echo "$number - Processing 01.0999 liw analysis started at $(timestamp)"
php panini.php 01.0999 liw
((number++))
echo "$number - Processing 01.0999 luN analysis started at $(timestamp)"
php panini.php 01.0999 luN
((number++))
echo "$number - Processing 01.0262 liw analysis started at $(timestamp)"
php panini.php 01.0262 liw
((number++))
echo "$number - Processing 01.1000 liw analysis started at $(timestamp)"
php panini.php 01.1000 liw
((number++))
echo "$number - Processing 01.0998 liw analysis started at $(timestamp)"
php panini.php 01.0998 liw
((number++))
echo "$number - Processing 01.0215 liw analysis started at $(timestamp)"
php panini.php 01.0215 liw
((number++))
echo "$number - Processing 07.0316 law analysis started at $(timestamp)"
php panini.php 07.0316 law
((number++))
echo "$number - Processing 07.0316 liw analysis started at $(timestamp)"
php panini.php 07.0316 liw
((number++))
echo "$number - Processing 07.0316 luw analysis started at $(timestamp)"
php panini.php 07.0316 luw
((number++))
echo "$number - Processing 07.0316 lfw analysis started at $(timestamp)"
php panini.php 07.0316 lfw
((number++))
echo "$number - Processing 01.0332 liw analysis started at $(timestamp)"
php panini.php 01.0332 liw
((number++))
echo "$number - Processing 01.0287 liw analysis started at $(timestamp)"
php panini.php 01.0287 liw
((number++))
echo "$number - Processing 01.0287 luN analysis started at $(timestamp)"
php panini.php 01.0287 luN
((number++))
echo "$number - Processing 01.0414 liw analysis started at $(timestamp)"
php panini.php 01.0414 liw
((number++))
echo "$number - Processing 01.0403 liw analysis started at $(timestamp)"
php panini.php 01.0403 liw
((number++))
echo "$number - Processing 01.0512 liw analysis started at $(timestamp)"
php panini.php 01.0512 liw
((number++))
echo "$number - Processing 04.0071 liw analysis started at $(timestamp)"
php panini.php 04.0071 liw
((number++))
echo "$number - Processing 01.0294 liw analysis started at $(timestamp)"
php panini.php 01.0294 liw
((number++))
echo "$number - Processing 01.0294 luN analysis started at $(timestamp)"
php panini.php 01.0294 luN
((number++))
echo "$number - Processing 01.0038 liw analysis started at $(timestamp)"
php panini.php 01.0038 liw
((number++))
echo "$number - Processing 02.0001 liw analysis started at $(timestamp)"
php panini.php 02.0001 liw
((number++))
echo "$number - Processing 02.0041 liw analysis started at $(timestamp)"
php panini.php 02.0041 liw
((number++))
echo "$number - Processing 02.0042 liw analysis started at $(timestamp)"
php panini.php 02.0042 liw
((number++))
echo "$number - Processing 04.0070 law analysis started at $(timestamp)"
php panini.php 04.0070 law
((number++))
echo "$number - Processing 04.0070 liw analysis started at $(timestamp)"
php panini.php 04.0070 liw
((number++))
echo "$number - Processing 04.0070 luw analysis started at $(timestamp)"
php panini.php 04.0070 luw
((number++))
echo "$number - Processing 04.0070 lfw analysis started at $(timestamp)"
php panini.php 04.0070 lfw
((number++))
echo "$number - Processing 04.0070 low analysis started at $(timestamp)"
php panini.php 04.0070 low
((number++))
echo "$number - Processing 04.0070 laN analysis started at $(timestamp)"
php panini.php 04.0070 laN
((number++))
echo "$number - Processing 04.0070 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0070 ASIrliN
((number++))
echo "$number - Processing 04.0070 viDiliN analysis started at $(timestamp)"
php panini.php 04.0070 viDiliN
((number++))
echo "$number - Processing 04.0070 luN analysis started at $(timestamp)"
php panini.php 04.0070 luN
((number++))
echo "$number - Processing 04.0070 lfN analysis started at $(timestamp)"
php panini.php 04.0070 lfN
((number++))
echo "$number - Processing 04.0072 luN analysis started at $(timestamp)"
php panini.php 04.0072 luN
((number++))
echo "$number - Processing 01.0438 luN analysis started at $(timestamp)"
php panini.php 01.0438 luN
((number++))
echo "$number - Processing 01.0448 liw analysis started at $(timestamp)"
php panini.php 01.0448 liw
((number++))
echo "$number - Processing 01.0448 luN analysis started at $(timestamp)"
php panini.php 01.0448 luN
((number++))
echo "$number - Processing 01.1031 viDiliN analysis started at $(timestamp)"
php panini.php 01.1031 viDiliN
((number++))
echo "$number - Processing 01.0546 liw analysis started at $(timestamp)"
php panini.php 01.0546 liw
((number++))
echo "$number - Processing 01.0546 viDiliN analysis started at $(timestamp)"
php panini.php 01.0546 viDiliN
((number++))
echo "$number - Processing 01.0481 laN analysis started at $(timestamp)"
php panini.php 01.0481 laN
((number++))
echo "$number - Processing 01.1030 luN analysis started at $(timestamp)"
php panini.php 01.1030 luN
((number++))
echo "$number - Processing 04.0106 laN analysis started at $(timestamp)"
php panini.php 04.0106 laN
((number++))
echo "$number - Processing 05.0016 luN analysis started at $(timestamp)"
php panini.php 05.0016 luN
((number++))
echo "$number - Processing 02.0040 viDiliN analysis started at $(timestamp)"
php panini.php 02.0040 viDiliN
((number++))
echo "$number - Processing 01.0149 liw analysis started at $(timestamp)"
php panini.php 01.0149 liw
((number++))
echo "$number - Processing 01.0208 liw analysis started at $(timestamp)"
php panini.php 01.0208 liw
((number++))
echo "$number - Processing 01.0208 luN analysis started at $(timestamp)"
php panini.php 01.0208 luN
((number++))
echo "$number - Processing 02.0183 luN analysis started at $(timestamp)"
php panini.php 02.0183 luN
((number++))
echo "$number - Processing 01.0587 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0587 ASIrliN
((number++))
echo "$number - Processing 01.0588 liw analysis started at $(timestamp)"
php panini.php 01.0588 liw
((number++))
echo "$number - Processing 01.0588 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0588 ASIrliN
((number++))
echo "$number - Processing 01.0136 liw analysis started at $(timestamp)"
php panini.php 01.0136 liw
((number++))
echo "$number - Processing 01.0137 liw analysis started at $(timestamp)"
php panini.php 01.0137 liw
((number++))
echo "$number - Processing 04.0135 liw analysis started at $(timestamp)"
php panini.php 04.0135 liw
((number++))
echo "$number - Processing 06.0015 liw analysis started at $(timestamp)"
php panini.php 06.0015 liw
((number++))
echo "$number - Processing 01.0244 liw analysis started at $(timestamp)"
php panini.php 01.0244 liw
((number++))
echo "$number - Processing 01.0852 liw analysis started at $(timestamp)"
php panini.php 01.0852 liw
((number++))
echo "$number - Processing 01.0392 liw analysis started at $(timestamp)"
php panini.php 01.0392 liw
((number++))
echo "$number - Processing 01.0392 luN analysis started at $(timestamp)"
php panini.php 01.0392 luN
((number++))
echo "$number - Processing 07.0020 law analysis started at $(timestamp)"
php panini.php 07.0020 law
((number++))
echo "$number - Processing 07.0020 viDiliN analysis started at $(timestamp)"
php panini.php 07.0020 viDiliN
((number++))
echo "$number - Processing 06.0044 liw analysis started at $(timestamp)"
php panini.php 06.0044 liw
((number++))
echo "$number - Processing 01.0020 luN analysis started at $(timestamp)"
php panini.php 01.0020 luN
((number++))
echo "$number - Processing 01.0650 liw analysis started at $(timestamp)"
php panini.php 01.0650 liw
((number++))
echo "$number - Processing 01.0792 liw analysis started at $(timestamp)"
php panini.php 01.0792 liw
((number++))
echo "$number - Processing 01.0840 liw analysis started at $(timestamp)"
php panini.php 01.0840 liw
((number++))
echo "$number - Processing 01.0391 liw analysis started at $(timestamp)"
php panini.php 01.0391 liw
((number++))
echo "$number - Processing 02.0034 liw analysis started at $(timestamp)"
php panini.php 02.0034 liw
((number++))
echo "$number - Processing 02.0034 luN analysis started at $(timestamp)"
php panini.php 02.0034 luN
((number++))
echo "$number - Processing 01.0779 liw analysis started at $(timestamp)"
php panini.php 01.0779 liw
((number++))
echo "$number - Processing 05.0038 law analysis started at $(timestamp)"
php panini.php 05.0038 law
((number++))
echo "$number - Processing 05.0038 laN analysis started at $(timestamp)"
php panini.php 05.0038 laN
((number++))
echo "$number - Processing 05.0038 viDiliN analysis started at $(timestamp)"
php panini.php 05.0038 viDiliN
((number++))
echo "$number - Processing 01.0201 luN analysis started at $(timestamp)"
php panini.php 01.0201 luN
((number++))
echo "$number - Processing 08.0005 law analysis started at $(timestamp)"
php panini.php 08.0005 law
((number++))
echo "$number - Processing 08.0005 liw analysis started at $(timestamp)"
php panini.php 08.0005 liw
((number++))
echo "$number - Processing 08.0005 laN analysis started at $(timestamp)"
php panini.php 08.0005 laN
((number++))
echo "$number - Processing 08.0005 viDiliN analysis started at $(timestamp)"
php panini.php 08.0005 viDiliN
((number++))
echo "$number - Processing 08.0005 luN analysis started at $(timestamp)"
php panini.php 08.0005 luN
((number++))
echo "$number - Processing 06.0041 liw analysis started at $(timestamp)"
php panini.php 06.0041 liw
((number++))
echo "$number - Processing 06.0007 lfw analysis started at $(timestamp)"
php panini.php 06.0007 lfw
((number++))
echo "$number - Processing 09.0032 liw analysis started at $(timestamp)"
php panini.php 09.0032 liw
((number++))
echo "$number - Processing 01.0300 luN analysis started at $(timestamp)"
php panini.php 01.0300 luN
((number++))
echo "$number - Processing 01.0129 liw analysis started at $(timestamp)"
php panini.php 01.0129 liw
((number++))
echo "$number - Processing 01.0523 liw analysis started at $(timestamp)"
php panini.php 01.0523 liw
((number++))
echo "$number - Processing 02.0014 liw analysis started at $(timestamp)"
php panini.php 02.0014 liw
((number++))
echo "$number - Processing 02.0014 low analysis started at $(timestamp)"
php panini.php 02.0014 low
((number++))
echo "$number - Processing 02.0014 laN analysis started at $(timestamp)"
php panini.php 02.0014 laN
((number++))
echo "$number - Processing 02.0014 luN analysis started at $(timestamp)"
php panini.php 02.0014 luN
((number++))
echo "$number - Processing 01.0095 luN analysis started at $(timestamp)"
php panini.php 01.0095 luN
((number++))
echo "$number - Processing 01.0128 luN analysis started at $(timestamp)"
php panini.php 01.0128 luN
((number++))
echo "$number - Processing 01.0192 luN analysis started at $(timestamp)"
php panini.php 01.0192 luN
((number++))
echo "$number - Processing 01.0265 law analysis started at $(timestamp)"
php panini.php 01.0265 law
((number++))
echo "$number - Processing 01.0265 liw analysis started at $(timestamp)"
php panini.php 01.0265 liw
((number++))
echo "$number - Processing 01.0265 luw analysis started at $(timestamp)"
php panini.php 01.0265 luw
((number++))
echo "$number - Processing 01.0265 lfw analysis started at $(timestamp)"
php panini.php 01.0265 lfw
((number++))
echo "$number - Processing 01.0265 low analysis started at $(timestamp)"
php panini.php 01.0265 low
((number++))
echo "$number - Processing 01.0265 laN analysis started at $(timestamp)"
php panini.php 01.0265 laN
((number++))
echo "$number - Processing 01.0265 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0265 ASIrliN
((number++))
echo "$number - Processing 01.0265 viDiliN analysis started at $(timestamp)"
php panini.php 01.0265 viDiliN
((number++))
echo "$number - Processing 01.0265 luN analysis started at $(timestamp)"
php panini.php 01.0265 luN
((number++))
echo "$number - Processing 01.0265 lfN analysis started at $(timestamp)"
php panini.php 01.0265 lfN
((number++))
echo "$number - Processing 01.0193 luN analysis started at $(timestamp)"
php panini.php 01.0193 luN
((number++))
echo "$number - Processing 01.0297 law analysis started at $(timestamp)"
php panini.php 01.0297 law
((number++))
echo "$number - Processing 01.0297 liw analysis started at $(timestamp)"
php panini.php 01.0297 liw
((number++))
echo "$number - Processing 01.0297 low analysis started at $(timestamp)"
php panini.php 01.0297 low
((number++))
echo "$number - Processing 01.0297 laN analysis started at $(timestamp)"
php panini.php 01.0297 laN
((number++))
echo "$number - Processing 01.0297 viDiliN analysis started at $(timestamp)"
php panini.php 01.0297 viDiliN
((number++))
echo "$number - Processing 01.0297 luN analysis started at $(timestamp)"
php panini.php 01.0297 luN
((number++))
echo "$number - Processing 01.0881 law analysis started at $(timestamp)"
php panini.php 01.0881 law
((number++))
echo "$number - Processing 01.0881 liw analysis started at $(timestamp)"
php panini.php 01.0881 liw
((number++))
echo "$number - Processing 01.0881 luw analysis started at $(timestamp)"
php panini.php 01.0881 luw
((number++))
echo "$number - Processing 01.0881 lfw analysis started at $(timestamp)"
php panini.php 01.0881 lfw
((number++))
echo "$number - Processing 01.0881 low analysis started at $(timestamp)"
php panini.php 01.0881 low
((number++))
echo "$number - Processing 01.0881 laN analysis started at $(timestamp)"
php panini.php 01.0881 laN
((number++))
echo "$number - Processing 01.0881 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0881 ASIrliN
((number++))
echo "$number - Processing 01.0881 viDiliN analysis started at $(timestamp)"
php panini.php 01.0881 viDiliN
((number++))
echo "$number - Processing 01.0881 luN analysis started at $(timestamp)"
php panini.php 01.0881 luN
((number++))
echo "$number - Processing 01.0881 lfN analysis started at $(timestamp)"
php panini.php 01.0881 lfN
((number++))
echo "$number - Processing 01.0073 luN analysis started at $(timestamp)"
php panini.php 01.0073 luN
((number++))
echo "$number - Processing 01.0877 law analysis started at $(timestamp)"
php panini.php 01.0877 law
((number++))
echo "$number - Processing 01.0877 liw analysis started at $(timestamp)"
php panini.php 01.0877 liw
((number++))
echo "$number - Processing 01.0877 luw analysis started at $(timestamp)"
php panini.php 01.0877 luw
((number++))
echo "$number - Processing 01.0877 lfw analysis started at $(timestamp)"
php panini.php 01.0877 lfw
((number++))
echo "$number - Processing 01.0877 low analysis started at $(timestamp)"
php panini.php 01.0877 low
((number++))
echo "$number - Processing 01.0877 laN analysis started at $(timestamp)"
php panini.php 01.0877 laN
((number++))
echo "$number - Processing 01.0877 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0877 ASIrliN
((number++))
echo "$number - Processing 01.0877 viDiliN analysis started at $(timestamp)"
php panini.php 01.0877 viDiliN
((number++))
echo "$number - Processing 01.0877 luN analysis started at $(timestamp)"
php panini.php 01.0877 luN
((number++))
echo "$number - Processing 01.0877 lfN analysis started at $(timestamp)"
php panini.php 01.0877 lfN
((number++))
echo "$number - Processing 01.0511 law analysis started at $(timestamp)"
php panini.php 01.0511 law
((number++))
echo "$number - Processing 01.0511 low analysis started at $(timestamp)"
php panini.php 01.0511 low
((number++))
echo "$number - Processing 01.0511 laN analysis started at $(timestamp)"
php panini.php 01.0511 laN
((number++))
echo "$number - Processing 01.0511 viDiliN analysis started at $(timestamp)"
php panini.php 01.0511 viDiliN
((number++))
echo "$number - Processing 10.0470 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0470 ASIrliN
((number++))
echo "$number - Processing 01.0664 low analysis started at $(timestamp)"
php panini.php 01.0664 low
((number++))
echo "$number - Processing 02.0016 low analysis started at $(timestamp)"
php panini.php 02.0016 low
((number++))
echo "$number - Processing 02.0016 laN analysis started at $(timestamp)"
php panini.php 02.0016 laN
((number++))
echo "$number - Processing 02.0016 luN analysis started at $(timestamp)"
php panini.php 02.0016 luN
((number++))
echo "$number - Processing 02.0015 liw analysis started at $(timestamp)"
php panini.php 02.0015 liw
((number++))
echo "$number - Processing 01.0996 liw analysis started at $(timestamp)"
php panini.php 01.0996 liw
((number++))
echo "$number - Processing 01.0194 luN analysis started at $(timestamp)"
php panini.php 01.0194 luN
((number++))
echo "$number - Processing 01.0710 luN analysis started at $(timestamp)"
php panini.php 01.0710 luN
((number++))
echo "$number - Processing 03.0020 law analysis started at $(timestamp)"
php panini.php 03.0020 law
((number++))
echo "$number - Processing 03.0020 low analysis started at $(timestamp)"
php panini.php 03.0020 low
((number++))
echo "$number - Processing 03.0021 law analysis started at $(timestamp)"
php panini.php 03.0021 law
((number++))
echo "$number - Processing 03.0021 liw analysis started at $(timestamp)"
php panini.php 03.0021 liw
((number++))
echo "$number - Processing 03.0021 luw analysis started at $(timestamp)"
php panini.php 03.0021 luw
((number++))
echo "$number - Processing 03.0021 lfw analysis started at $(timestamp)"
php panini.php 03.0021 lfw
((number++))
echo "$number - Processing 03.0021 low analysis started at $(timestamp)"
php panini.php 03.0021 low
((number++))
echo "$number - Processing 03.0021 laN analysis started at $(timestamp)"
php panini.php 03.0021 laN
((number++))
echo "$number - Processing 03.0021 ASIrliN analysis started at $(timestamp)"
php panini.php 03.0021 ASIrliN
((number++))
echo "$number - Processing 03.0021 viDiliN analysis started at $(timestamp)"
php panini.php 03.0021 viDiliN
((number++))
echo "$number - Processing 03.0021 luN analysis started at $(timestamp)"
php panini.php 03.0021 luN
((number++))
echo "$number - Processing 03.0021 lfN analysis started at $(timestamp)"
php panini.php 03.0021 lfN
((number++))
echo "$number - Processing 01.1148 law analysis started at $(timestamp)"
php panini.php 01.1148 law
((number++))
echo "$number - Processing 01.1148 liw analysis started at $(timestamp)"
php panini.php 01.1148 liw
((number++))
echo "$number - Processing 01.1148 luw analysis started at $(timestamp)"
php panini.php 01.1148 luw
((number++))
echo "$number - Processing 01.1148 lfw analysis started at $(timestamp)"
php panini.php 01.1148 lfw
((number++))
echo "$number - Processing 01.1148 low analysis started at $(timestamp)"
php panini.php 01.1148 low
((number++))
echo "$number - Processing 01.1148 laN analysis started at $(timestamp)"
php panini.php 01.1148 laN
((number++))
echo "$number - Processing 01.1148 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1148 ASIrliN
((number++))
echo "$number - Processing 01.1148 viDiliN analysis started at $(timestamp)"
php panini.php 01.1148 viDiliN
((number++))
echo "$number - Processing 01.1148 luN analysis started at $(timestamp)"
php panini.php 01.1148 luN
((number++))
echo "$number - Processing 01.1148 lfN analysis started at $(timestamp)"
php panini.php 01.1148 lfN
((number++))
echo "$number - Processing 10.0142 luN analysis started at $(timestamp)"
php panini.php 10.0142 luN
((number++))
echo "$number - Processing 10.1103 ASIrliN analysis started at $(timestamp)"
php panini.php 10.1103 ASIrliN
((number++))
echo "$number - Processing 04.0294 law analysis started at $(timestamp)"
php panini.php 04.0294 law
((number++))
echo "$number - Processing 04.0294 liw analysis started at $(timestamp)"
php panini.php 04.0294 liw
((number++))
echo "$number - Processing 04.0294 lfw analysis started at $(timestamp)"
php panini.php 04.0294 lfw
((number++))
echo "$number - Processing 04.0294 low analysis started at $(timestamp)"
php panini.php 04.0294 low
((number++))
echo "$number - Processing 04.0294 laN analysis started at $(timestamp)"
php panini.php 04.0294 laN
((number++))
echo "$number - Processing 04.0294 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0294 ASIrliN
((number++))
echo "$number - Processing 04.0294 viDiliN analysis started at $(timestamp)"
php panini.php 04.0294 viDiliN
((number++))
echo "$number - Processing 04.0294 lfN analysis started at $(timestamp)"
php panini.php 04.0294 lfN
((number++))
echo "$number - Processing 01.0096 luN analysis started at $(timestamp)"
php panini.php 01.0096 luN
((number++))
echo "$number - Processing 01.0226 law analysis started at $(timestamp)"
php panini.php 01.0226 law
((number++))
echo "$number - Processing 01.0226 liw analysis started at $(timestamp)"
php panini.php 01.0226 liw
((number++))
echo "$number - Processing 01.0226 luw analysis started at $(timestamp)"
php panini.php 01.0226 luw
((number++))
echo "$number - Processing 01.0226 lfw analysis started at $(timestamp)"
php panini.php 01.0226 lfw
((number++))
echo "$number - Processing 01.0226 low analysis started at $(timestamp)"
php panini.php 01.0226 low
((number++))
echo "$number - Processing 01.0226 laN analysis started at $(timestamp)"
php panini.php 01.0226 laN
((number++))
echo "$number - Processing 01.0226 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0226 ASIrliN
((number++))
echo "$number - Processing 01.0226 viDiliN analysis started at $(timestamp)"
php panini.php 01.0226 viDiliN
((number++))
echo "$number - Processing 01.0226 luN analysis started at $(timestamp)"
php panini.php 01.0226 luN
((number++))
echo "$number - Processing 01.0226 lfN analysis started at $(timestamp)"
php panini.php 01.0226 lfN
((number++))
echo "$number - Processing 01.0255 law analysis started at $(timestamp)"
php panini.php 01.0255 law
((number++))
echo "$number - Processing 01.0255 liw analysis started at $(timestamp)"
php panini.php 01.0255 liw
((number++))
echo "$number - Processing 01.0255 luw analysis started at $(timestamp)"
php panini.php 01.0255 luw
((number++))
echo "$number - Processing 01.0255 lfw analysis started at $(timestamp)"
php panini.php 01.0255 lfw
((number++))
echo "$number - Processing 01.0255 low analysis started at $(timestamp)"
php panini.php 01.0255 low
((number++))
echo "$number - Processing 01.0255 laN analysis started at $(timestamp)"
php panini.php 01.0255 laN
((number++))
echo "$number - Processing 01.0255 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0255 ASIrliN
((number++))
echo "$number - Processing 01.0255 viDiliN analysis started at $(timestamp)"
php panini.php 01.0255 viDiliN
((number++))
echo "$number - Processing 01.0255 luN analysis started at $(timestamp)"
php panini.php 01.0255 luN
((number++))
echo "$number - Processing 01.0255 lfN analysis started at $(timestamp)"
php panini.php 01.0255 lfN
((number++))
echo "$number - Processing 06.0222 luN analysis started at $(timestamp)"
php panini.php 06.0222 luN
((number++))
echo "$number - Processing 06.0113 luN analysis started at $(timestamp)"
php panini.php 06.0113 luN
((number++))
echo "$number - Processing 10.0435 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0435 ASIrliN
((number++))
echo "$number - Processing 01.0363 law analysis started at $(timestamp)"
php panini.php 01.0363 law
((number++))
echo "$number - Processing 01.0363 liw analysis started at $(timestamp)"
php panini.php 01.0363 liw
((number++))
echo "$number - Processing 01.0363 luw analysis started at $(timestamp)"
php panini.php 01.0363 luw
((number++))
echo "$number - Processing 01.0363 lfw analysis started at $(timestamp)"
php panini.php 01.0363 lfw
((number++))
echo "$number - Processing 01.0363 low analysis started at $(timestamp)"
php panini.php 01.0363 low
((number++))
echo "$number - Processing 01.0363 laN analysis started at $(timestamp)"
php panini.php 01.0363 laN
((number++))
echo "$number - Processing 01.0363 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0363 ASIrliN
((number++))
echo "$number - Processing 01.0363 viDiliN analysis started at $(timestamp)"
php panini.php 01.0363 viDiliN
((number++))
echo "$number - Processing 01.0363 luN analysis started at $(timestamp)"
php panini.php 01.0363 luN
((number++))
echo "$number - Processing 01.0363 lfN analysis started at $(timestamp)"
php panini.php 01.0363 lfN
((number++))
echo "$number - Processing 01.0362 liw analysis started at $(timestamp)"
php panini.php 01.0362 liw
((number++))
echo "$number - Processing 09.0050 law analysis started at $(timestamp)"
php panini.php 09.0050 law
((number++))
echo "$number - Processing 09.0050 low analysis started at $(timestamp)"
php panini.php 09.0050 low
((number++))
echo "$number - Processing 09.0050 laN analysis started at $(timestamp)"
php panini.php 09.0050 laN
((number++))
echo "$number - Processing 09.0050 viDiliN analysis started at $(timestamp)"
php panini.php 09.0050 viDiliN
((number++))
echo "$number - Processing 04.0310 luw analysis started at $(timestamp)"
php panini.php 04.0310 luw
((number++))
echo "$number - Processing 10.0158 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0158 ASIrliN
((number++))
echo "$number - Processing 06.0067 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0067 ASIrliN
((number++))
echo "$number - Processing 06.0067 lfN analysis started at $(timestamp)"
php panini.php 06.0067 lfN
((number++))
echo "$number - Processing 01.0021 liw analysis started at $(timestamp)"
php panini.php 01.0021 liw
((number++))
echo "$number - Processing 01.0021 luw analysis started at $(timestamp)"
php panini.php 01.0021 luw
((number++))
echo "$number - Processing 01.0021 lfw analysis started at $(timestamp)"
php panini.php 01.0021 lfw
((number++))
echo "$number - Processing 01.0021 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0021 ASIrliN
((number++))
echo "$number - Processing 01.0021 luN analysis started at $(timestamp)"
php panini.php 01.0021 luN
((number++))
echo "$number - Processing 01.0021 lfN analysis started at $(timestamp)"
php panini.php 01.0021 lfN
((number++))
echo "$number - Processing 04.0126 law analysis started at $(timestamp)"
php panini.php 04.0126 law
((number++))
echo "$number - Processing 04.0126 liw analysis started at $(timestamp)"
php panini.php 04.0126 liw
((number++))
echo "$number - Processing 04.0126 luw analysis started at $(timestamp)"
php panini.php 04.0126 luw
((number++))
echo "$number - Processing 04.0126 lfw analysis started at $(timestamp)"
php panini.php 04.0126 lfw
((number++))
echo "$number - Processing 04.0126 low analysis started at $(timestamp)"
php panini.php 04.0126 low
((number++))
echo "$number - Processing 04.0126 laN analysis started at $(timestamp)"
php panini.php 04.0126 laN
((number++))
echo "$number - Processing 04.0126 viDiliN analysis started at $(timestamp)"
php panini.php 04.0126 viDiliN
((number++))
echo "$number - Processing 04.0126 luN analysis started at $(timestamp)"
php panini.php 04.0126 luN
((number++))
echo "$number - Processing 04.0126 lfN analysis started at $(timestamp)"
php panini.php 04.0126 lfN
((number++))
echo "$number - Processing 10.0236 luw analysis started at $(timestamp)"
php panini.php 10.0236 luw
((number++))
echo "$number - Processing 10.0236 lfw analysis started at $(timestamp)"
php panini.php 10.0236 lfw
((number++))
echo "$number - Processing 10.0236 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0236 ASIrliN
((number++))
echo "$number - Processing 10.0236 viDiliN analysis started at $(timestamp)"
php panini.php 10.0236 viDiliN
((number++))
echo "$number - Processing 10.0236 luN analysis started at $(timestamp)"
php panini.php 10.0236 luN
((number++))
echo "$number - Processing 10.0236 lfN analysis started at $(timestamp)"
php panini.php 10.0236 lfN
((number++))
echo "$number - Processing 10.0443 law analysis started at $(timestamp)"
php panini.php 10.0443 law
((number++))
echo "$number - Processing 10.0443 liw analysis started at $(timestamp)"
php panini.php 10.0443 liw
((number++))
echo "$number - Processing 10.0443 luw analysis started at $(timestamp)"
php panini.php 10.0443 luw
((number++))
echo "$number - Processing 10.0443 lfw analysis started at $(timestamp)"
php panini.php 10.0443 lfw
((number++))
echo "$number - Processing 10.0443 low analysis started at $(timestamp)"
php panini.php 10.0443 low
((number++))
echo "$number - Processing 10.0443 laN analysis started at $(timestamp)"
php panini.php 10.0443 laN
((number++))
echo "$number - Processing 10.0443 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0443 ASIrliN
((number++))
echo "$number - Processing 10.0443 viDiliN analysis started at $(timestamp)"
php panini.php 10.0443 viDiliN
((number++))
echo "$number - Processing 10.0443 lfN analysis started at $(timestamp)"
php panini.php 10.0443 lfN
((number++))
echo "$number - Processing 06.0137 luw analysis started at $(timestamp)"
php panini.php 06.0137 luw
((number++))
echo "$number - Processing 10.0438 luN analysis started at $(timestamp)"
php panini.php 10.0438 luN
((number++))
echo "$number - Processing 10.0211 luN analysis started at $(timestamp)"
php panini.php 10.0211 luN
((number++))
echo "$number - Processing 01.0603 laN analysis started at $(timestamp)"
php panini.php 01.0603 laN
((number++))
echo "$number - Processing 01.1048 law analysis started at $(timestamp)"
php panini.php 01.1048 law
((number++))
echo "$number - Processing 01.1048 liw analysis started at $(timestamp)"
php panini.php 01.1048 liw
((number++))
echo "$number - Processing 01.1048 low analysis started at $(timestamp)"
php panini.php 01.1048 low
((number++))
echo "$number - Processing 01.1048 laN analysis started at $(timestamp)"
php panini.php 01.1048 laN
((number++))
echo "$number - Processing 01.1048 viDiliN analysis started at $(timestamp)"
php panini.php 01.1048 viDiliN
((number++))
echo "$number - Processing 05.0007 liw analysis started at $(timestamp)"
php panini.php 05.0007 liw
((number++))
echo "$number - Processing 05.0007 viDiliN analysis started at $(timestamp)"
php panini.php 05.0007 viDiliN
((number++))
echo "$number - Processing 06.0112 luN analysis started at $(timestamp)"
php panini.php 06.0112 luN
((number++))
echo "$number - Processing 01.0682 law analysis started at $(timestamp)"
php panini.php 01.0682 law
((number++))
echo "$number - Processing 01.0682 low analysis started at $(timestamp)"
php panini.php 01.0682 low
((number++))
echo "$number - Processing 01.0682 laN analysis started at $(timestamp)"
php panini.php 01.0682 laN
((number++))
echo "$number - Processing 01.0682 viDiliN analysis started at $(timestamp)"
php panini.php 01.0682 viDiliN
((number++))
echo "$number - Processing 07.0010 laN analysis started at $(timestamp)"
php panini.php 07.0010 laN
((number++))
echo "$number - Processing 10.0408 liw analysis started at $(timestamp)"
php panini.php 10.0408 liw
((number++))
echo "$number - Processing 10.0278 liw analysis started at $(timestamp)"
php panini.php 10.0278 liw
((number++))
echo "$number - Processing 10.0278 luN analysis started at $(timestamp)"
php panini.php 10.0278 luN
((number++))
echo "$number - Processing 01.0866 liw analysis started at $(timestamp)"
php panini.php 01.0866 liw
((number++))
echo "$number - Processing 01.0866 luw analysis started at $(timestamp)"
php panini.php 01.0866 luw
((number++))
echo "$number - Processing 01.0866 lfw analysis started at $(timestamp)"
php panini.php 01.0866 lfw
((number++))
echo "$number - Processing 01.0866 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0866 ASIrliN
((number++))
echo "$number - Processing 01.0866 luN analysis started at $(timestamp)"
php panini.php 01.0866 luN
((number++))
echo "$number - Processing 01.0866 lfN analysis started at $(timestamp)"
php panini.php 01.0866 lfN
((number++))
echo "$number - Processing 06.0006 luN analysis started at $(timestamp)"
php panini.php 06.0006 luN
((number++))
echo "$number - Processing 01.1145 luN analysis started at $(timestamp)"
php panini.php 01.1145 luN
((number++))
echo "$number - Processing 06.0145 law analysis started at $(timestamp)"
php panini.php 06.0145 law
((number++))
echo "$number - Processing 06.0145 low analysis started at $(timestamp)"
php panini.php 06.0145 low
((number++))
echo "$number - Processing 06.0145 laN analysis started at $(timestamp)"
php panini.php 06.0145 laN
((number++))
echo "$number - Processing 06.0145 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0145 ASIrliN
((number++))
echo "$number - Processing 06.0145 viDiliN analysis started at $(timestamp)"
php panini.php 06.0145 viDiliN
((number++))
echo "$number - Processing 09.0018 liw analysis started at $(timestamp)"
php panini.php 09.0018 liw
((number++))
echo "$number - Processing 09.0018 low analysis started at $(timestamp)"
php panini.php 09.0018 low
((number++))
echo "$number - Processing 09.0018 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0018 ASIrliN
((number++))
echo "$number - Processing 09.0018 luN analysis started at $(timestamp)"
php panini.php 09.0018 luN
((number++))
echo "$number - Processing 09.0031 low analysis started at $(timestamp)"
php panini.php 09.0031 low
((number++))
echo "$number - Processing 09.0031 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0031 ASIrliN
((number++))
echo "$number - Processing 10.0437 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0437 ASIrliN
((number++))
echo "$number - Processing 10.0437 luN analysis started at $(timestamp)"
php panini.php 10.0437 luN
((number++))
echo "$number - Processing 01.0426 luN analysis started at $(timestamp)"
php panini.php 01.0426 luN
((number++))
echo "$number - Processing 01.0583 law analysis started at $(timestamp)"
php panini.php 01.0583 law
((number++))
echo "$number - Processing 01.0583 liw analysis started at $(timestamp)"
php panini.php 01.0583 liw
((number++))
echo "$number - Processing 01.0583 luw analysis started at $(timestamp)"
php panini.php 01.0583 luw
((number++))
echo "$number - Processing 01.0583 lfw analysis started at $(timestamp)"
php panini.php 01.0583 lfw
((number++))
echo "$number - Processing 01.0583 low analysis started at $(timestamp)"
php panini.php 01.0583 low
((number++))
echo "$number - Processing 01.0583 laN analysis started at $(timestamp)"
php panini.php 01.0583 laN
((number++))
echo "$number - Processing 01.0583 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0583 ASIrliN
((number++))
echo "$number - Processing 01.0583 viDiliN analysis started at $(timestamp)"
php panini.php 01.0583 viDiliN
((number++))
echo "$number - Processing 01.0583 luN analysis started at $(timestamp)"
php panini.php 01.0583 luN
((number++))
echo "$number - Processing 01.0583 lfN analysis started at $(timestamp)"
php panini.php 01.0583 lfN
((number++))
echo "$number - Processing 01.1064 law analysis started at $(timestamp)"
php panini.php 01.1064 law
((number++))
echo "$number - Processing 01.1064 liw analysis started at $(timestamp)"
php panini.php 01.1064 liw
((number++))
echo "$number - Processing 01.1064 luw analysis started at $(timestamp)"
php panini.php 01.1064 luw
((number++))
echo "$number - Processing 01.1064 lfw analysis started at $(timestamp)"
php panini.php 01.1064 lfw
((number++))
echo "$number - Processing 01.1064 low analysis started at $(timestamp)"
php panini.php 01.1064 low
((number++))
echo "$number - Processing 01.1064 laN analysis started at $(timestamp)"
php panini.php 01.1064 laN
((number++))
echo "$number - Processing 01.1064 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1064 ASIrliN
((number++))
echo "$number - Processing 01.1064 viDiliN analysis started at $(timestamp)"
php panini.php 01.1064 viDiliN
((number++))
echo "$number - Processing 01.1064 lfN analysis started at $(timestamp)"
php panini.php 01.1064 lfN
((number++))
echo "$number - Processing 01.0911 law analysis started at $(timestamp)"
php panini.php 01.0911 law
((number++))
echo "$number - Processing 01.0911 liw analysis started at $(timestamp)"
php panini.php 01.0911 liw
((number++))
echo "$number - Processing 01.0911 luw analysis started at $(timestamp)"
php panini.php 01.0911 luw
((number++))
echo "$number - Processing 01.0911 lfw analysis started at $(timestamp)"
php panini.php 01.0911 lfw
((number++))
echo "$number - Processing 01.0911 low analysis started at $(timestamp)"
php panini.php 01.0911 low
((number++))
echo "$number - Processing 01.0911 laN analysis started at $(timestamp)"
php panini.php 01.0911 laN
((number++))
echo "$number - Processing 01.0911 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0911 ASIrliN
((number++))
echo "$number - Processing 01.0911 viDiliN analysis started at $(timestamp)"
php panini.php 01.0911 viDiliN
((number++))
echo "$number - Processing 01.0911 luN analysis started at $(timestamp)"
php panini.php 01.0911 luN
((number++))
echo "$number - Processing 01.0911 lfN analysis started at $(timestamp)"
php panini.php 01.0911 lfN
((number++))
echo "$number - Processing 09.0012 law analysis started at $(timestamp)"
php panini.php 09.0012 law
((number++))
echo "$number - Processing 09.0012 liw analysis started at $(timestamp)"
php panini.php 09.0012 liw
((number++))
echo "$number - Processing 09.0012 luw analysis started at $(timestamp)"
php panini.php 09.0012 luw
((number++))
echo "$number - Processing 09.0012 lfw analysis started at $(timestamp)"
php panini.php 09.0012 lfw
((number++))
echo "$number - Processing 09.0012 low analysis started at $(timestamp)"
php panini.php 09.0012 low
((number++))
echo "$number - Processing 09.0012 laN analysis started at $(timestamp)"
php panini.php 09.0012 laN
((number++))
echo "$number - Processing 09.0012 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0012 ASIrliN
((number++))
echo "$number - Processing 09.0012 viDiliN analysis started at $(timestamp)"
php panini.php 09.0012 viDiliN
((number++))
echo "$number - Processing 09.0012 luN analysis started at $(timestamp)"
php panini.php 09.0012 luN
((number++))
echo "$number - Processing 09.0012 lfN analysis started at $(timestamp)"
php panini.php 09.0012 lfN
((number++))
echo "$number - Processing 01.0912 luN analysis started at $(timestamp)"
php panini.php 01.0912 luN
((number++))
echo "$number - Processing 01.0882 law analysis started at $(timestamp)"
php panini.php 01.0882 law
((number++))
echo "$number - Processing 01.0882 liw analysis started at $(timestamp)"
php panini.php 01.0882 liw
((number++))
echo "$number - Processing 01.0882 luw analysis started at $(timestamp)"
php panini.php 01.0882 luw
((number++))
echo "$number - Processing 01.0882 lfw analysis started at $(timestamp)"
php panini.php 01.0882 lfw
((number++))
echo "$number - Processing 01.0882 low analysis started at $(timestamp)"
php panini.php 01.0882 low
((number++))
echo "$number - Processing 01.0882 laN analysis started at $(timestamp)"
php panini.php 01.0882 laN
((number++))
echo "$number - Processing 01.0882 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0882 ASIrliN
((number++))
echo "$number - Processing 01.0882 viDiliN analysis started at $(timestamp)"
php panini.php 01.0882 viDiliN
((number++))
echo "$number - Processing 01.0882 luN analysis started at $(timestamp)"
php panini.php 01.0882 luN
((number++))
echo "$number - Processing 01.0882 lfN analysis started at $(timestamp)"
php panini.php 01.0882 lfN
((number++))
echo "$number - Processing 01.0876 luN analysis started at $(timestamp)"
php panini.php 01.0876 luN
((number++))
echo "$number - Processing 01.0545 law analysis started at $(timestamp)"
php panini.php 01.0545 law
((number++))
echo "$number - Processing 01.0545 low analysis started at $(timestamp)"
php panini.php 01.0545 low
((number++))
echo "$number - Processing 01.0545 laN analysis started at $(timestamp)"
php panini.php 01.0545 laN
((number++))
echo "$number - Processing 01.0545 viDiliN analysis started at $(timestamp)"
php panini.php 01.0545 viDiliN
((number++))
echo "$number - Processing 01.0213 liw analysis started at $(timestamp)"
php panini.php 01.0213 liw
((number++))
echo "$number - Processing 01.0213 luw analysis started at $(timestamp)"
php panini.php 01.0213 luw
((number++))
echo "$number - Processing 01.0213 lfw analysis started at $(timestamp)"
php panini.php 01.0213 lfw
((number++))
echo "$number - Processing 06.0128 liw analysis started at $(timestamp)"
php panini.php 06.0128 liw
((number++))
echo "$number - Processing 06.0128 luN analysis started at $(timestamp)"
php panini.php 06.0128 luN
((number++))
echo "$number - Processing 06.0128 lfN analysis started at $(timestamp)"
php panini.php 06.0128 lfN
((number++))
echo "$number - Processing 01.0913 luN analysis started at $(timestamp)"
php panini.php 01.0913 luN
((number++))
echo "$number - Processing 01.0883 law analysis started at $(timestamp)"
php panini.php 01.0883 law
((number++))
echo "$number - Processing 01.0883 liw analysis started at $(timestamp)"
php panini.php 01.0883 liw
((number++))
echo "$number - Processing 01.0883 luw analysis started at $(timestamp)"
php panini.php 01.0883 luw
((number++))
echo "$number - Processing 01.0883 lfw analysis started at $(timestamp)"
php panini.php 01.0883 lfw
((number++))
echo "$number - Processing 01.0883 low analysis started at $(timestamp)"
php panini.php 01.0883 low
((number++))
echo "$number - Processing 01.0883 laN analysis started at $(timestamp)"
php panini.php 01.0883 laN
((number++))
echo "$number - Processing 01.0883 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0883 ASIrliN
((number++))
echo "$number - Processing 01.0883 viDiliN analysis started at $(timestamp)"
php panini.php 01.0883 viDiliN
((number++))
echo "$number - Processing 01.0883 luN analysis started at $(timestamp)"
php panini.php 01.0883 luN
((number++))
echo "$number - Processing 01.0883 lfN analysis started at $(timestamp)"
php panini.php 01.0883 lfN
((number++))
echo "$number - Processing 01.0075 luN analysis started at $(timestamp)"
php panini.php 01.0075 luN
((number++))
echo "$number - Processing 10.0162 law analysis started at $(timestamp)"
php panini.php 10.0162 law
((number++))
echo "$number - Processing 10.0162 liw analysis started at $(timestamp)"
php panini.php 10.0162 liw
((number++))
echo "$number - Processing 10.0162 luw analysis started at $(timestamp)"
php panini.php 10.0162 luw
((number++))
echo "$number - Processing 10.0162 lfw analysis started at $(timestamp)"
php panini.php 10.0162 lfw
((number++))
echo "$number - Processing 10.0162 low analysis started at $(timestamp)"
php panini.php 10.0162 low
((number++))
echo "$number - Processing 10.0162 laN analysis started at $(timestamp)"
php panini.php 10.0162 laN
((number++))
echo "$number - Processing 10.0162 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0162 ASIrliN
((number++))
echo "$number - Processing 10.0162 viDiliN analysis started at $(timestamp)"
php panini.php 10.0162 viDiliN
((number++))
echo "$number - Processing 10.0162 luN analysis started at $(timestamp)"
php panini.php 10.0162 luN
((number++))
echo "$number - Processing 10.0162 lfN analysis started at $(timestamp)"
php panini.php 10.0162 lfN
((number++))
echo "$number - Processing 04.0104 law analysis started at $(timestamp)"
php panini.php 04.0104 law
((number++))
echo "$number - Processing 04.0104 low analysis started at $(timestamp)"
php panini.php 04.0104 low
((number++))
echo "$number - Processing 04.0104 viDiliN analysis started at $(timestamp)"
php panini.php 04.0104 viDiliN
((number++))
echo "$number - Processing 04.0157 liw analysis started at $(timestamp)"
php panini.php 04.0157 liw
((number++))
echo "$number - Processing 01.0015 luN analysis started at $(timestamp)"
php panini.php 01.0015 luN
((number++))
echo "$number - Processing 01.0076 liw analysis started at $(timestamp)"
php panini.php 01.0076 liw
((number++))
echo "$number - Processing 04.0057 luN analysis started at $(timestamp)"
php panini.php 04.0057 luN
((number++))
echo "$number - Processing 09.0058 liw analysis started at $(timestamp)"
php panini.php 09.0058 liw
((number++))
echo "$number - Processing 09.0058 luN analysis started at $(timestamp)"
php panini.php 09.0058 luN
((number++))
echo "$number - Processing 09.0058 lfN analysis started at $(timestamp)"
php panini.php 09.0058 lfN
((number++))
echo "$number - Processing 01.0441 luN analysis started at $(timestamp)"
php panini.php 01.0441 luN
((number++))
echo "$number - Processing 01.1113 liw analysis started at $(timestamp)"
php panini.php 01.1113 liw
((number++))
echo "$number - Processing 01.1113 luw analysis started at $(timestamp)"
php panini.php 01.1113 luw
((number++))
echo "$number - Processing 01.1113 lfw analysis started at $(timestamp)"
php panini.php 01.1113 lfw
((number++))
echo "$number - Processing 01.1113 laN analysis started at $(timestamp)"
php panini.php 01.1113 laN
((number++))
echo "$number - Processing 01.1113 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1113 ASIrliN
((number++))
echo "$number - Processing 01.1113 viDiliN analysis started at $(timestamp)"
php panini.php 01.1113 viDiliN
((number++))
echo "$number - Processing 01.1113 luN analysis started at $(timestamp)"
php panini.php 01.1113 luN
((number++))
echo "$number - Processing 01.1113 lfN analysis started at $(timestamp)"
php panini.php 01.1113 lfN
((number++))
echo "$number - Processing 01.0691 luN analysis started at $(timestamp)"
php panini.php 01.0691 luN
((number++))
echo "$number - Processing 10.0113 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0113 ASIrliN
((number++))
echo "$number - Processing 01.0873 luN analysis started at $(timestamp)"
php panini.php 01.0873 luN
((number++))
echo "$number - Processing 10.0487 law analysis started at $(timestamp)"
php panini.php 10.0487 law
((number++))
echo "$number - Processing 10.0487 liw analysis started at $(timestamp)"
php panini.php 10.0487 liw
((number++))
echo "$number - Processing 10.0487 luw analysis started at $(timestamp)"
php panini.php 10.0487 luw
((number++))
echo "$number - Processing 10.0487 lfw analysis started at $(timestamp)"
php panini.php 10.0487 lfw
((number++))
echo "$number - Processing 10.0487 low analysis started at $(timestamp)"
php panini.php 10.0487 low
((number++))
echo "$number - Processing 10.0487 laN analysis started at $(timestamp)"
php panini.php 10.0487 laN
((number++))
echo "$number - Processing 10.0487 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0487 ASIrliN
((number++))
echo "$number - Processing 10.0487 viDiliN analysis started at $(timestamp)"
php panini.php 10.0487 viDiliN
((number++))
echo "$number - Processing 10.0487 lfN analysis started at $(timestamp)"
php panini.php 10.0487 lfN
((number++))
echo "$number - Processing 04.0103 liw analysis started at $(timestamp)"
php panini.php 04.0103 liw
((number++))
echo "$number - Processing 04.0103 luw analysis started at $(timestamp)"
php panini.php 04.0103 luw
((number++))
echo "$number - Processing 04.0103 lfw analysis started at $(timestamp)"
php panini.php 04.0103 lfw
((number++))
echo "$number - Processing 04.0103 luN analysis started at $(timestamp)"
php panini.php 04.0103 luN
((number++))
echo "$number - Processing 04.0103 lfN analysis started at $(timestamp)"
php panini.php 04.0103 lfN
((number++))
echo "$number - Processing 01.0510 law analysis started at $(timestamp)"
php panini.php 01.0510 law
((number++))
echo "$number - Processing 01.0510 low analysis started at $(timestamp)"
php panini.php 01.0510 low
((number++))
echo "$number - Processing 01.0510 laN analysis started at $(timestamp)"
php panini.php 01.0510 laN
((number++))
echo "$number - Processing 01.0510 viDiliN analysis started at $(timestamp)"
php panini.php 01.0510 viDiliN
((number++))
echo "$number - Processing 01.0510 luN analysis started at $(timestamp)"
php panini.php 01.0510 luN
((number++))
echo "$number - Processing 10.0112 low analysis started at $(timestamp)"
php panini.php 10.0112 low
((number++))
echo "$number - Processing 05.0033 luN analysis started at $(timestamp)"
php panini.php 05.0033 luN
((number++))
echo "$number - Processing 05.0033 lfN analysis started at $(timestamp)"
php panini.php 05.0033 lfN
((number++))
echo "$number - Processing 06.0005 luN analysis started at $(timestamp)"
php panini.php 06.0005 luN
((number++))
echo "$number - Processing 01.0648 liw analysis started at $(timestamp)"
php panini.php 01.0648 liw
((number++))
echo "$number - Processing 01.0648 lfN analysis started at $(timestamp)"
php panini.php 01.0648 lfN
((number++))
echo "$number - Processing 05.0039 law analysis started at $(timestamp)"
php panini.php 05.0039 law
((number++))
echo "$number - Processing 05.0039 low analysis started at $(timestamp)"
php panini.php 05.0039 low
((number++))
echo "$number - Processing 05.0039 laN analysis started at $(timestamp)"
php panini.php 05.0039 laN
((number++))
echo "$number - Processing 05.0039 viDiliN analysis started at $(timestamp)"
php panini.php 05.0039 viDiliN
((number++))
echo "$number - Processing 05.0039 luN analysis started at $(timestamp)"
php panini.php 05.0039 luN
((number++))
echo "$number - Processing 05.0039 lfN analysis started at $(timestamp)"
php panini.php 05.0039 lfN
((number++))
echo "$number - Processing 01.0442 luN analysis started at $(timestamp)"
php panini.php 01.0442 luN
((number++))
echo "$number - Processing 01.0443 law analysis started at $(timestamp)"
php panini.php 01.0443 law
((number++))
echo "$number - Processing 01.0443 liw analysis started at $(timestamp)"
php panini.php 01.0443 liw
((number++))
echo "$number - Processing 01.0443 low analysis started at $(timestamp)"
php panini.php 01.0443 low
((number++))
echo "$number - Processing 01.0443 laN analysis started at $(timestamp)"
php panini.php 01.0443 laN
((number++))
echo "$number - Processing 01.0443 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0443 ASIrliN
((number++))
echo "$number - Processing 01.0443 viDiliN analysis started at $(timestamp)"
php panini.php 01.0443 viDiliN
((number++))
echo "$number - Processing 01.0443 luN analysis started at $(timestamp)"
php panini.php 01.0443 luN
((number++))
echo "$number - Processing 09.0042 law analysis started at $(timestamp)"
php panini.php 09.0042 law
((number++))
echo "$number - Processing 09.0042 low analysis started at $(timestamp)"
php panini.php 09.0042 low
((number++))
echo "$number - Processing 09.0042 laN analysis started at $(timestamp)"
php panini.php 09.0042 laN
((number++))
echo "$number - Processing 09.0042 viDiliN analysis started at $(timestamp)"
php panini.php 09.0042 viDiliN
((number++))
echo "$number - Processing 09.0055 law analysis started at $(timestamp)"
php panini.php 09.0055 law
((number++))
echo "$number - Processing 09.0055 low analysis started at $(timestamp)"
php panini.php 09.0055 low
((number++))
echo "$number - Processing 09.0055 laN analysis started at $(timestamp)"
php panini.php 09.0055 laN
((number++))
echo "$number - Processing 09.0055 viDiliN analysis started at $(timestamp)"
php panini.php 09.0055 viDiliN
((number++))
echo "$number - Processing 01.0854 luN analysis started at $(timestamp)"
php panini.php 01.0854 luN
((number++))
echo "$number - Processing 06.0070 viDiliN analysis started at $(timestamp)"
php panini.php 06.0070 viDiliN
((number++))
echo "$number - Processing 01.0987 law analysis started at $(timestamp)"
php panini.php 01.0987 law
((number++))
echo "$number - Processing 01.0987 low analysis started at $(timestamp)"
php panini.php 01.0987 low
((number++))
echo "$number - Processing 01.0987 laN analysis started at $(timestamp)"
php panini.php 01.0987 laN
((number++))
echo "$number - Processing 01.0987 viDiliN analysis started at $(timestamp)"
php panini.php 01.0987 viDiliN
((number++))
echo "$number - Processing 01.0649 lfN analysis started at $(timestamp)"
php panini.php 01.0649 lfN
((number++))
echo "$number - Processing 10.0416 liw analysis started at $(timestamp)"
php panini.php 10.0416 liw
((number++))
echo "$number - Processing 10.0416 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0416 ASIrliN
((number++))
echo "$number - Processing 02.0032 liw analysis started at $(timestamp)"
php panini.php 02.0032 liw
((number++))
echo "$number - Processing 02.0032 viDiliN analysis started at $(timestamp)"
php panini.php 02.0032 viDiliN
((number++))
echo "$number - Processing 01.1133 luN analysis started at $(timestamp)"
php panini.php 01.1133 luN
((number++))
echo "$number - Processing 01.0618 lfN analysis started at $(timestamp)"
php panini.php 01.0618 lfN
((number++))
echo "$number - Processing 09.0067 law analysis started at $(timestamp)"
php panini.php 09.0067 law
((number++))
echo "$number - Processing 09.0067 low analysis started at $(timestamp)"
php panini.php 09.0067 low
((number++))
echo "$number - Processing 09.0067 laN analysis started at $(timestamp)"
php panini.php 09.0067 laN
((number++))
echo "$number - Processing 09.0067 luN analysis started at $(timestamp)"
php panini.php 09.0067 luN
((number++))
echo "$number - Processing 01.0346 law analysis started at $(timestamp)"
php panini.php 01.0346 law
((number++))
echo "$number - Processing 01.0346 liw analysis started at $(timestamp)"
php panini.php 01.0346 liw
((number++))
echo "$number - Processing 01.0346 luw analysis started at $(timestamp)"
php panini.php 01.0346 luw
((number++))
echo "$number - Processing 01.0346 lfw analysis started at $(timestamp)"
php panini.php 01.0346 lfw
((number++))
echo "$number - Processing 01.0346 low analysis started at $(timestamp)"
php panini.php 01.0346 low
((number++))
echo "$number - Processing 01.0346 laN analysis started at $(timestamp)"
php panini.php 01.0346 laN
((number++))
echo "$number - Processing 01.0346 viDiliN analysis started at $(timestamp)"
php panini.php 01.0346 viDiliN
((number++))
echo "$number - Processing 01.0346 luN analysis started at $(timestamp)"
php panini.php 01.0346 luN
((number++))
echo "$number - Processing 01.0346 lfN analysis started at $(timestamp)"
php panini.php 01.0346 lfN
((number++))
echo "$number - Processing 10.0127 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0127 ASIrliN
((number++))
echo "$number - Processing 01.0317 luN analysis started at $(timestamp)"
php panini.php 01.0317 luN
((number++))
echo "$number - Processing 01.0052 luN analysis started at $(timestamp)"
php panini.php 01.0052 luN
((number++))
echo "$number - Processing 01.1020 luN analysis started at $(timestamp)"
php panini.php 01.1020 luN
((number++))
echo "$number - Processing 01.0261 law analysis started at $(timestamp)"
php panini.php 01.0261 law
((number++))
echo "$number - Processing 01.0261 liw analysis started at $(timestamp)"
php panini.php 01.0261 liw
((number++))
echo "$number - Processing 01.0261 luw analysis started at $(timestamp)"
php panini.php 01.0261 luw
((number++))
echo "$number - Processing 01.0261 lfw analysis started at $(timestamp)"
php panini.php 01.0261 lfw
((number++))
echo "$number - Processing 01.0261 low analysis started at $(timestamp)"
php panini.php 01.0261 low
((number++))
echo "$number - Processing 01.0261 laN analysis started at $(timestamp)"
php panini.php 01.0261 laN
((number++))
echo "$number - Processing 01.0261 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0261 ASIrliN
((number++))
echo "$number - Processing 01.0261 viDiliN analysis started at $(timestamp)"
php panini.php 01.0261 viDiliN
((number++))
echo "$number - Processing 01.0261 luN analysis started at $(timestamp)"
php panini.php 01.0261 luN
((number++))
echo "$number - Processing 01.0261 lfN analysis started at $(timestamp)"
php panini.php 01.0261 lfN
((number++))
echo "$number - Processing 01.0062 law analysis started at $(timestamp)"
php panini.php 01.0062 law
((number++))
echo "$number - Processing 01.0062 liw analysis started at $(timestamp)"
php panini.php 01.0062 liw
((number++))
echo "$number - Processing 01.0062 luw analysis started at $(timestamp)"
php panini.php 01.0062 luw
((number++))
echo "$number - Processing 01.0062 lfw analysis started at $(timestamp)"
php panini.php 01.0062 lfw
((number++))
echo "$number - Processing 01.0062 low analysis started at $(timestamp)"
php panini.php 01.0062 low
((number++))
echo "$number - Processing 01.0062 laN analysis started at $(timestamp)"
php panini.php 01.0062 laN
((number++))
echo "$number - Processing 01.0062 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0062 ASIrliN
((number++))
echo "$number - Processing 01.0062 viDiliN analysis started at $(timestamp)"
php panini.php 01.0062 viDiliN
((number++))
echo "$number - Processing 01.0062 luN analysis started at $(timestamp)"
php panini.php 01.0062 luN
((number++))
echo "$number - Processing 01.0062 lfN analysis started at $(timestamp)"
php panini.php 01.0062 lfN
((number++))
echo "$number - Processing 01.0665 law analysis started at $(timestamp)"
php panini.php 01.0665 law
((number++))
echo "$number - Processing 01.0665 liw analysis started at $(timestamp)"
php panini.php 01.0665 liw
((number++))
echo "$number - Processing 01.0665 luw analysis started at $(timestamp)"
php panini.php 01.0665 luw
((number++))
echo "$number - Processing 01.0665 lfw analysis started at $(timestamp)"
php panini.php 01.0665 lfw
((number++))
echo "$number - Processing 01.0665 low analysis started at $(timestamp)"
php panini.php 01.0665 low
((number++))
echo "$number - Processing 01.0665 laN analysis started at $(timestamp)"
php panini.php 01.0665 laN
((number++))
echo "$number - Processing 01.0665 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0665 ASIrliN
((number++))
echo "$number - Processing 01.0665 viDiliN analysis started at $(timestamp)"
php panini.php 01.0665 viDiliN
((number++))
echo "$number - Processing 01.0665 luN analysis started at $(timestamp)"
php panini.php 01.0665 luN
((number++))
echo "$number - Processing 01.0665 lfN analysis started at $(timestamp)"
php panini.php 01.0665 lfN
((number++))
echo "$number - Processing 01.0626 law analysis started at $(timestamp)"
php panini.php 01.0626 law
((number++))
echo "$number - Processing 01.0626 liw analysis started at $(timestamp)"
php panini.php 01.0626 liw
((number++))
echo "$number - Processing 01.0626 luw analysis started at $(timestamp)"
php panini.php 01.0626 luw
((number++))
echo "$number - Processing 01.0626 lfw analysis started at $(timestamp)"
php panini.php 01.0626 lfw
((number++))
echo "$number - Processing 01.0626 low analysis started at $(timestamp)"
php panini.php 01.0626 low
((number++))
echo "$number - Processing 01.0626 laN analysis started at $(timestamp)"
php panini.php 01.0626 laN
((number++))
echo "$number - Processing 01.0626 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0626 ASIrliN
((number++))
echo "$number - Processing 01.0626 viDiliN analysis started at $(timestamp)"
php panini.php 01.0626 viDiliN
((number++))
echo "$number - Processing 01.0626 luN analysis started at $(timestamp)"
php panini.php 01.0626 luN
((number++))
echo "$number - Processing 01.0626 lfN analysis started at $(timestamp)"
php panini.php 01.0626 lfN
((number++))
echo "$number - Processing 09.0068 law analysis started at $(timestamp)"
php panini.php 09.0068 law
((number++))
echo "$number - Processing 09.0068 liw analysis started at $(timestamp)"
php panini.php 09.0068 liw
((number++))
echo "$number - Processing 09.0068 luw analysis started at $(timestamp)"
php panini.php 09.0068 luw
((number++))
echo "$number - Processing 09.0068 lfw analysis started at $(timestamp)"
php panini.php 09.0068 lfw
((number++))
echo "$number - Processing 09.0068 low analysis started at $(timestamp)"
php panini.php 09.0068 low
((number++))
echo "$number - Processing 09.0068 laN analysis started at $(timestamp)"
php panini.php 09.0068 laN
((number++))
echo "$number - Processing 09.0068 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0068 ASIrliN
((number++))
echo "$number - Processing 09.0068 viDiliN analysis started at $(timestamp)"
php panini.php 09.0068 viDiliN
((number++))
echo "$number - Processing 09.0068 luN analysis started at $(timestamp)"
php panini.php 09.0068 luN
((number++))
echo "$number - Processing 09.0068 lfN analysis started at $(timestamp)"
php panini.php 09.0068 lfN
((number++))
echo "$number - Processing 06.0172 liw analysis started at $(timestamp)"
php panini.php 06.0172 liw
((number++))
echo "$number - Processing 06.0172 luw analysis started at $(timestamp)"
php panini.php 06.0172 luw
((number++))
echo "$number - Processing 06.0172 lfw analysis started at $(timestamp)"
php panini.php 06.0172 lfw
((number++))
echo "$number - Processing 01.1104 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1104 ASIrliN
((number++))
echo "$number - Processing 06.0119 law analysis started at $(timestamp)"
php panini.php 06.0119 law
((number++))
echo "$number - Processing 06.0119 liw analysis started at $(timestamp)"
php panini.php 06.0119 liw
((number++))
echo "$number - Processing 06.0119 luw analysis started at $(timestamp)"
php panini.php 06.0119 luw
((number++))
echo "$number - Processing 06.0119 lfw analysis started at $(timestamp)"
php panini.php 06.0119 lfw
((number++))
echo "$number - Processing 06.0119 low analysis started at $(timestamp)"
php panini.php 06.0119 low
((number++))
echo "$number - Processing 06.0119 laN analysis started at $(timestamp)"
php panini.php 06.0119 laN
((number++))
echo "$number - Processing 06.0119 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0119 ASIrliN
((number++))
echo "$number - Processing 06.0119 viDiliN analysis started at $(timestamp)"
php panini.php 06.0119 viDiliN
((number++))
echo "$number - Processing 06.0119 luN analysis started at $(timestamp)"
php panini.php 06.0119 luN
((number++))
echo "$number - Processing 06.0119 lfN analysis started at $(timestamp)"
php panini.php 06.0119 lfN
((number++))
echo "$number - Processing 10.0072 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0072 ASIrliN
((number++))
echo "$number - Processing 10.0072 lfN analysis started at $(timestamp)"
php panini.php 10.0072 lfN
((number++))
echo "$number - Processing 06.0068 law analysis started at $(timestamp)"
php panini.php 06.0068 law
((number++))
echo "$number - Processing 06.0068 liw analysis started at $(timestamp)"
php panini.php 06.0068 liw
((number++))
echo "$number - Processing 06.0068 low analysis started at $(timestamp)"
php panini.php 06.0068 low
((number++))
echo "$number - Processing 06.0068 laN analysis started at $(timestamp)"
php panini.php 06.0068 laN
((number++))
echo "$number - Processing 06.0068 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0068 ASIrliN
((number++))
echo "$number - Processing 06.0068 viDiliN analysis started at $(timestamp)"
php panini.php 06.0068 viDiliN
((number++))
echo "$number - Processing 01.0022 liw analysis started at $(timestamp)"
php panini.php 01.0022 liw
((number++))
echo "$number - Processing 01.0022 luw analysis started at $(timestamp)"
php panini.php 01.0022 luw
((number++))
echo "$number - Processing 01.0022 lfw analysis started at $(timestamp)"
php panini.php 01.0022 lfw
((number++))
echo "$number - Processing 01.0022 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0022 ASIrliN
((number++))
echo "$number - Processing 01.0022 luN analysis started at $(timestamp)"
php panini.php 01.0022 luN
((number++))
echo "$number - Processing 01.0022 lfN analysis started at $(timestamp)"
php panini.php 01.0022 lfN
((number++))
echo "$number - Processing 10.0414 law analysis started at $(timestamp)"
php panini.php 10.0414 law
((number++))
echo "$number - Processing 10.0414 liw analysis started at $(timestamp)"
php panini.php 10.0414 liw
((number++))
echo "$number - Processing 10.0414 luw analysis started at $(timestamp)"
php panini.php 10.0414 luw
((number++))
echo "$number - Processing 10.0414 lfw analysis started at $(timestamp)"
php panini.php 10.0414 lfw
((number++))
echo "$number - Processing 10.0414 low analysis started at $(timestamp)"
php panini.php 10.0414 low
((number++))
echo "$number - Processing 10.0414 laN analysis started at $(timestamp)"
php panini.php 10.0414 laN
((number++))
echo "$number - Processing 10.0414 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0414 ASIrliN
((number++))
echo "$number - Processing 10.0414 viDiliN analysis started at $(timestamp)"
php panini.php 10.0414 viDiliN
((number++))
echo "$number - Processing 10.0414 luN analysis started at $(timestamp)"
php panini.php 10.0414 luN
((number++))
echo "$number - Processing 10.0414 lfN analysis started at $(timestamp)"
php panini.php 10.0414 lfN
((number++))
echo "$number - Processing 01.1060 lfN analysis started at $(timestamp)"
php panini.php 01.1060 lfN
((number++))
echo "$number - Processing 10.0415 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0415 ASIrliN
((number++))
echo "$number - Processing 01.0279 luN analysis started at $(timestamp)"
php panini.php 01.0279 luN
((number++))
echo "$number - Processing 10.0399 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0399 ASIrliN
((number++))
echo "$number - Processing 01.1137 liw analysis started at $(timestamp)"
php panini.php 01.1137 liw
((number++))
echo "$number - Processing 01.0666 low analysis started at $(timestamp)"
php panini.php 01.0666 low
((number++))
echo "$number - Processing 01.0723 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0723 ASIrliN
((number++))
echo "$number - Processing 01.0724 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0724 ASIrliN
((number++))
echo "$number - Processing 01.1101 law analysis started at $(timestamp)"
php panini.php 01.1101 law
((number++))
echo "$number - Processing 01.1101 low analysis started at $(timestamp)"
php panini.php 01.1101 low
((number++))
echo "$number - Processing 01.1101 laN analysis started at $(timestamp)"
php panini.php 01.1101 laN
((number++))
echo "$number - Processing 03.0026 law analysis started at $(timestamp)"
php panini.php 03.0026 law
((number++))
echo "$number - Processing 03.0026 low analysis started at $(timestamp)"
php panini.php 03.0026 low
((number++))
echo "$number - Processing 03.0026 laN analysis started at $(timestamp)"
php panini.php 03.0026 laN
((number++))
echo "$number - Processing 03.0026 ASIrliN analysis started at $(timestamp)"
php panini.php 03.0026 ASIrliN
((number++))
echo "$number - Processing 03.0026 viDiliN analysis started at $(timestamp)"
php panini.php 03.0026 viDiliN
((number++))
echo "$number - Processing 01.1105 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1105 ASIrliN
((number++))
echo "$number - Processing 01.1100 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1100 ASIrliN
((number++))
echo "$number - Processing 06.0134 liw analysis started at $(timestamp)"
php panini.php 06.0134 liw
((number++))
echo "$number - Processing 06.0134 luN analysis started at $(timestamp)"
php panini.php 06.0134 luN
((number++))
echo "$number - Processing 01.0230 law analysis started at $(timestamp)"
php panini.php 01.0230 law
((number++))
echo "$number - Processing 01.0230 liw analysis started at $(timestamp)"
php panini.php 01.0230 liw
((number++))
echo "$number - Processing 01.0230 luw analysis started at $(timestamp)"
php panini.php 01.0230 luw
((number++))
echo "$number - Processing 01.0230 lfw analysis started at $(timestamp)"
php panini.php 01.0230 lfw
((number++))
echo "$number - Processing 01.0230 low analysis started at $(timestamp)"
php panini.php 01.0230 low
((number++))
echo "$number - Processing 01.0230 laN analysis started at $(timestamp)"
php panini.php 01.0230 laN
((number++))
echo "$number - Processing 01.0230 viDiliN analysis started at $(timestamp)"
php panini.php 01.0230 viDiliN
((number++))
echo "$number - Processing 01.0230 luN analysis started at $(timestamp)"
php panini.php 01.0230 luN
((number++))
echo "$number - Processing 01.0230 lfN analysis started at $(timestamp)"
php panini.php 01.0230 lfN
((number++))
echo "$number - Processing 06.0096 luN analysis started at $(timestamp)"
php panini.php 06.0096 luN
((number++))
echo "$number - Processing 06.0097 luN analysis started at $(timestamp)"
php panini.php 06.0097 luN
((number++))
echo "$number - Processing 10.0436 law analysis started at $(timestamp)"
php panini.php 10.0436 law
((number++))
echo "$number - Processing 10.0436 liw analysis started at $(timestamp)"
php panini.php 10.0436 liw
((number++))
echo "$number - Processing 10.0436 luw analysis started at $(timestamp)"
php panini.php 10.0436 luw
((number++))
echo "$number - Processing 10.0436 lfw analysis started at $(timestamp)"
php panini.php 10.0436 lfw
((number++))
echo "$number - Processing 10.0436 low analysis started at $(timestamp)"
php panini.php 10.0436 low
((number++))
echo "$number - Processing 10.0436 laN analysis started at $(timestamp)"
php panini.php 10.0436 laN
((number++))
echo "$number - Processing 10.0436 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0436 ASIrliN
((number++))
echo "$number - Processing 10.0436 viDiliN analysis started at $(timestamp)"
php panini.php 10.0436 viDiliN
((number++))
echo "$number - Processing 10.0436 lfN analysis started at $(timestamp)"
php panini.php 10.0436 lfN
((number++))
echo "$number - Processing 04.0014 law analysis started at $(timestamp)"
php panini.php 04.0014 law
((number++))
echo "$number - Processing 04.0014 low analysis started at $(timestamp)"
php panini.php 04.0014 low
((number++))
echo "$number - Processing 04.0014 laN analysis started at $(timestamp)"
php panini.php 04.0014 laN
((number++))
echo "$number - Processing 04.0014 viDiliN analysis started at $(timestamp)"
php panini.php 04.0014 viDiliN
((number++))
echo "$number - Processing 09.0053 law analysis started at $(timestamp)"
php panini.php 09.0053 law
((number++))
echo "$number - Processing 09.0053 low analysis started at $(timestamp)"
php panini.php 09.0053 low
((number++))
echo "$number - Processing 01.1125 liw analysis started at $(timestamp)"
php panini.php 01.1125 liw
((number++))
echo "$number - Processing 01.1125 viDiliN analysis started at $(timestamp)"
php panini.php 01.1125 viDiliN
((number++))
echo "$number - Processing 01.1125 luN analysis started at $(timestamp)"
php panini.php 01.1125 luN
((number++))
echo "$number - Processing 01.0461 liw analysis started at $(timestamp)"
php panini.php 01.0461 liw
((number++))
echo "$number - Processing 01.0461 luw analysis started at $(timestamp)"
php panini.php 01.0461 luw
((number++))
echo "$number - Processing 01.0461 lfw analysis started at $(timestamp)"
php panini.php 01.0461 lfw
((number++))
echo "$number - Processing 01.0461 low analysis started at $(timestamp)"
php panini.php 01.0461 low
((number++))
echo "$number - Processing 01.0461 laN analysis started at $(timestamp)"
php panini.php 01.0461 laN
((number++))
echo "$number - Processing 01.0461 viDiliN analysis started at $(timestamp)"
php panini.php 01.0461 viDiliN
((number++))
echo "$number - Processing 01.0461 luN analysis started at $(timestamp)"
php panini.php 01.0461 luN
((number++))
echo "$number - Processing 01.0461 lfN analysis started at $(timestamp)"
php panini.php 01.0461 lfN
((number++))
echo "$number - Processing 06.0131 liw analysis started at $(timestamp)"
php panini.php 06.0131 liw
((number++))
echo "$number - Processing 06.0131 luN analysis started at $(timestamp)"
php panini.php 06.0131 luN
((number++))
echo "$number - Processing 01.0023 law analysis started at $(timestamp)"
php panini.php 01.0023 law
((number++))
echo "$number - Processing 01.0023 liw analysis started at $(timestamp)"
php panini.php 01.0023 liw
((number++))
echo "$number - Processing 01.0023 luw analysis started at $(timestamp)"
php panini.php 01.0023 luw
((number++))
echo "$number - Processing 01.0023 lfw analysis started at $(timestamp)"
php panini.php 01.0023 lfw
((number++))
echo "$number - Processing 01.0023 low analysis started at $(timestamp)"
php panini.php 01.0023 low
((number++))
echo "$number - Processing 01.0023 laN analysis started at $(timestamp)"
php panini.php 01.0023 laN
((number++))
echo "$number - Processing 01.0023 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0023 ASIrliN
((number++))
echo "$number - Processing 01.0023 viDiliN analysis started at $(timestamp)"
php panini.php 01.0023 viDiliN
((number++))
echo "$number - Processing 01.0023 luN analysis started at $(timestamp)"
php panini.php 01.0023 luN
((number++))
echo "$number - Processing 01.0023 lfN analysis started at $(timestamp)"
php panini.php 01.0023 lfN
((number++))
echo "$number - Processing 10.0180 liw analysis started at $(timestamp)"
php panini.php 10.0180 liw
((number++))
echo "$number - Processing 10.0180 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0180 ASIrliN
((number++))
echo "$number - Processing 01.0655 law analysis started at $(timestamp)"
php panini.php 01.0655 law
((number++))
echo "$number - Processing 01.0655 luw analysis started at $(timestamp)"
php panini.php 01.0655 luw
((number++))
echo "$number - Processing 01.0655 lfw analysis started at $(timestamp)"
php panini.php 01.0655 lfw
((number++))
echo "$number - Processing 01.0655 low analysis started at $(timestamp)"
php panini.php 01.0655 low
((number++))
echo "$number - Processing 01.0655 laN analysis started at $(timestamp)"
php panini.php 01.0655 laN
((number++))
echo "$number - Processing 01.0655 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0655 ASIrliN
((number++))
echo "$number - Processing 01.0655 viDiliN analysis started at $(timestamp)"
php panini.php 01.0655 viDiliN
((number++))
echo "$number - Processing 01.0655 luN analysis started at $(timestamp)"
php panini.php 01.0655 luN
((number++))
echo "$number - Processing 01.0655 lfN analysis started at $(timestamp)"
php panini.php 01.0655 lfN
((number++))
echo "$number - Processing 01.1043 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1043 ASIrliN
((number++))
echo "$number - Processing 01.1043 luN analysis started at $(timestamp)"
php panini.php 01.1043 luN
((number++))
echo "$number - Processing 04.0217 liw analysis started at $(timestamp)"
php panini.php 04.0217 liw
((number++))
echo "$number - Processing 04.0217 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0217 ASIrliN
((number++))
echo "$number - Processing 04.0217 luN analysis started at $(timestamp)"
php panini.php 04.0217 luN
((number++))
echo "$number - Processing 01.0737 liw analysis started at $(timestamp)"
php panini.php 01.0737 liw
((number++))
echo "$number - Processing 01.0737 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0737 ASIrliN
((number++))
echo "$number - Processing 01.0737 luN analysis started at $(timestamp)"
php panini.php 01.0737 luN
((number++))
echo "$number - Processing 01.1087 law analysis started at $(timestamp)"
php panini.php 01.1087 law
((number++))
echo "$number - Processing 01.1087 liw analysis started at $(timestamp)"
php panini.php 01.1087 liw
((number++))
echo "$number - Processing 01.1087 luw analysis started at $(timestamp)"
php panini.php 01.1087 luw
((number++))
echo "$number - Processing 01.1087 low analysis started at $(timestamp)"
php panini.php 01.1087 low
((number++))
echo "$number - Processing 01.1087 laN analysis started at $(timestamp)"
php panini.php 01.1087 laN
((number++))
echo "$number - Processing 01.1087 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1087 ASIrliN
((number++))
echo "$number - Processing 01.1087 viDiliN analysis started at $(timestamp)"
php panini.php 01.1087 viDiliN
((number++))
echo "$number - Processing 01.1087 luN analysis started at $(timestamp)"
php panini.php 01.1087 luN
((number++))
echo "$number - Processing 04.0161 law analysis started at $(timestamp)"
php panini.php 04.0161 law
((number++))
echo "$number - Processing 06.0033 lfN analysis started at $(timestamp)"
php panini.php 06.0033 lfN
((number++))
echo "$number - Processing 09.0231 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0231 ASIrliN
((number++))
echo "$number - Processing 01.0427 liw analysis started at $(timestamp)"
php panini.php 01.0427 liw
((number++))
echo "$number - Processing 01.0427 laN analysis started at $(timestamp)"
php panini.php 01.0427 laN
((number++))
echo "$number - Processing 01.1065 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1065 ASIrliN
((number++))
echo "$number - Processing 10.0362 luN analysis started at $(timestamp)"
php panini.php 10.0362 luN
((number++))
echo "$number - Processing 09.0375 law analysis started at $(timestamp)"
php panini.php 09.0375 law
((number++))
echo "$number - Processing 09.0375 low analysis started at $(timestamp)"
php panini.php 09.0375 low
((number++))
echo "$number - Processing 09.0375 laN analysis started at $(timestamp)"
php panini.php 09.0375 laN
((number++))
echo "$number - Processing 09.0375 viDiliN analysis started at $(timestamp)"
php panini.php 09.0375 viDiliN
((number++))
echo "$number - Processing 01.0717 liw analysis started at $(timestamp)"
php panini.php 01.0717 liw
((number++))
echo "$number - Processing 10.0279 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0279 ASIrliN
((number++))
echo "$number - Processing 10.0434 liw analysis started at $(timestamp)"
php panini.php 10.0434 liw
((number++))
echo "$number - Processing 10.0434 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0434 ASIrliN
((number++))
echo "$number - Processing 01.0224 law analysis started at $(timestamp)"
php panini.php 01.0224 law
((number++))
echo "$number - Processing 01.0718 liw analysis started at $(timestamp)"
php panini.php 01.0718 liw
((number++))
echo "$number - Processing 01.0738 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0738 ASIrliN
((number++))
echo "$number - Processing 01.0225 liw analysis started at $(timestamp)"
php panini.php 01.0225 liw
((number++))
echo "$number - Processing 01.0699 law analysis started at $(timestamp)"
php panini.php 01.0699 law
((number++))
echo "$number - Processing 01.0699 liw analysis started at $(timestamp)"
php panini.php 01.0699 liw
((number++))
echo "$number - Processing 01.0699 low analysis started at $(timestamp)"
php panini.php 01.0699 low
((number++))
echo "$number - Processing 01.0699 laN analysis started at $(timestamp)"
php panini.php 01.0699 laN
((number++))
echo "$number - Processing 01.0699 viDiliN analysis started at $(timestamp)"
php panini.php 01.0699 viDiliN
((number++))
echo "$number - Processing 01.0699 luN analysis started at $(timestamp)"
php panini.php 01.0699 luN
((number++))
echo "$number - Processing 01.1051 lfw analysis started at $(timestamp)"
php panini.php 01.1051 lfw
((number++))
echo "$number - Processing 01.0180 law analysis started at $(timestamp)"
php panini.php 01.0180 law
((number++))
echo "$number - Processing 01.0180 liw analysis started at $(timestamp)"
php panini.php 01.0180 liw
((number++))
echo "$number - Processing 01.0180 luw analysis started at $(timestamp)"
php panini.php 01.0180 luw
((number++))
echo "$number - Processing 01.0180 lfw analysis started at $(timestamp)"
php panini.php 01.0180 lfw
((number++))
echo "$number - Processing 01.0180 low analysis started at $(timestamp)"
php panini.php 01.0180 low
((number++))
echo "$number - Processing 01.0180 laN analysis started at $(timestamp)"
php panini.php 01.0180 laN
((number++))
echo "$number - Processing 01.0180 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0180 ASIrliN
((number++))
echo "$number - Processing 01.0180 viDiliN analysis started at $(timestamp)"
php panini.php 01.0180 viDiliN
((number++))
echo "$number - Processing 01.0180 luN analysis started at $(timestamp)"
php panini.php 01.0180 luN
((number++))
echo "$number - Processing 01.0180 lfN analysis started at $(timestamp)"
php panini.php 01.0180 lfN
((number++))
echo "$number - Processing 10.0125 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0125 ASIrliN
((number++))
echo "$number - Processing 01.0740 law analysis started at $(timestamp)"
php panini.php 01.0740 law
((number++))
echo "$number - Processing 01.0740 liw analysis started at $(timestamp)"
php panini.php 01.0740 liw
((number++))
echo "$number - Processing 01.0740 luw analysis started at $(timestamp)"
php panini.php 01.0740 luw
((number++))
echo "$number - Processing 01.0740 lfw analysis started at $(timestamp)"
php panini.php 01.0740 lfw
((number++))
echo "$number - Processing 01.0740 low analysis started at $(timestamp)"
php panini.php 01.0740 low
((number++))
echo "$number - Processing 01.0740 laN analysis started at $(timestamp)"
php panini.php 01.0740 laN
((number++))
echo "$number - Processing 01.0740 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0740 ASIrliN
((number++))
echo "$number - Processing 01.0740 viDiliN analysis started at $(timestamp)"
php panini.php 01.0740 viDiliN
((number++))
echo "$number - Processing 01.0740 luN analysis started at $(timestamp)"
php panini.php 01.0740 luN
((number++))
echo "$number - Processing 01.0740 lfN analysis started at $(timestamp)"
php panini.php 01.0740 lfN
((number++))
echo "$number - Processing 01.0502 liw analysis started at $(timestamp)"
php panini.php 01.0502 liw
((number++))
echo "$number - Processing 01.0502 low analysis started at $(timestamp)"
php panini.php 01.0502 low
((number++))
echo "$number - Processing 06.0115 luN analysis started at $(timestamp)"
php panini.php 06.0115 luN
((number++))
echo "$number - Processing 01.0505 low analysis started at $(timestamp)"
php panini.php 01.0505 low
((number++))
echo "$number - Processing 01.0503 low analysis started at $(timestamp)"
php panini.php 01.0503 low
((number++))
echo "$number - Processing 10.0251 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0251 ASIrliN
((number++))
echo "$number - Processing 10.0251 luN analysis started at $(timestamp)"
php panini.php 10.0251 luN
((number++))
echo "$number - Processing 04.0050 law analysis started at $(timestamp)"
php panini.php 04.0050 law
((number++))
echo "$number - Processing 04.0050 liw analysis started at $(timestamp)"
php panini.php 04.0050 liw
((number++))
echo "$number - Processing 04.0050 low analysis started at $(timestamp)"
php panini.php 04.0050 low
((number++))
echo "$number - Processing 04.0050 laN analysis started at $(timestamp)"
php panini.php 04.0050 laN
((number++))
echo "$number - Processing 04.0050 viDiliN analysis started at $(timestamp)"
php panini.php 04.0050 viDiliN
((number++))
echo "$number - Processing 04.0050 luN analysis started at $(timestamp)"
php panini.php 04.0050 luN
((number++))
echo "$number - Processing 03.0152 law analysis started at $(timestamp)"
php panini.php 03.0152 law
((number++))
echo "$number - Processing 03.0152 low analysis started at $(timestamp)"
php panini.php 03.0152 low
((number++))
echo "$number - Processing 03.0152 laN analysis started at $(timestamp)"
php panini.php 03.0152 laN
((number++))
echo "$number - Processing 03.0152 viDiliN analysis started at $(timestamp)"
php panini.php 03.0152 viDiliN
((number++))
echo "$number - Processing 08.0007 laN analysis started at $(timestamp)"
php panini.php 08.0007 laN
((number++))
echo "$number - Processing 01.0504 law analysis started at $(timestamp)"
php panini.php 01.0504 law
((number++))
echo "$number - Processing 01.0504 liw analysis started at $(timestamp)"
php panini.php 01.0504 liw
((number++))
echo "$number - Processing 01.0504 low analysis started at $(timestamp)"
php panini.php 01.0504 low
((number++))
echo "$number - Processing 01.1075 luN analysis started at $(timestamp)"
php panini.php 01.1075 luN
((number++))
echo "$number - Processing 01.0121 law analysis started at $(timestamp)"
php panini.php 01.0121 law
((number++))
echo "$number - Processing 01.0121 liw analysis started at $(timestamp)"
php panini.php 01.0121 liw
((number++))
echo "$number - Processing 01.0121 luw analysis started at $(timestamp)"
php panini.php 01.0121 luw
((number++))
echo "$number - Processing 01.0121 lfw analysis started at $(timestamp)"
php panini.php 01.0121 lfw
((number++))
echo "$number - Processing 01.0121 low analysis started at $(timestamp)"
php panini.php 01.0121 low
((number++))
echo "$number - Processing 01.0121 laN analysis started at $(timestamp)"
php panini.php 01.0121 laN
((number++))
echo "$number - Processing 01.0121 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0121 ASIrliN
((number++))
echo "$number - Processing 01.0121 viDiliN analysis started at $(timestamp)"
php panini.php 01.0121 viDiliN
((number++))
echo "$number - Processing 01.0121 luN analysis started at $(timestamp)"
php panini.php 01.0121 luN
((number++))
echo "$number - Processing 01.0121 lfN analysis started at $(timestamp)"
php panini.php 01.0121 lfN
((number++))
echo "$number - Processing 01.1107 law analysis started at $(timestamp)"
php panini.php 01.1107 law
((number++))
echo "$number - Processing 01.1107 liw analysis started at $(timestamp)"
php panini.php 01.1107 liw
((number++))
echo "$number - Processing 01.1107 low analysis started at $(timestamp)"
php panini.php 01.1107 low
((number++))
echo "$number - Processing 01.1107 laN analysis started at $(timestamp)"
php panini.php 01.1107 laN
((number++))
echo "$number - Processing 01.1107 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1107 ASIrliN
((number++))
echo "$number - Processing 01.1107 viDiliN analysis started at $(timestamp)"
php panini.php 01.1107 viDiliN
((number++))
echo "$number - Processing 01.1107 luN analysis started at $(timestamp)"
php panini.php 01.1107 luN
((number++))
echo "$number - Processing 02.0069 law analysis started at $(timestamp)"
php panini.php 02.0069 law
((number++))
echo "$number - Processing 02.0069 liw analysis started at $(timestamp)"
php panini.php 02.0069 liw
((number++))
echo "$number - Processing 02.0069 low analysis started at $(timestamp)"
php panini.php 02.0069 low
((number++))
echo "$number - Processing 02.0007 luN analysis started at $(timestamp)"
php panini.php 02.0007 luN
((number++))
echo "$number - Processing 01.0312 viDiliN analysis started at $(timestamp)"
php panini.php 01.0312 viDiliN
((number++))
echo "$number - Processing 01.1004 laN analysis started at $(timestamp)"
php panini.php 01.1004 laN
((number++))
echo "$number - Processing 01.0914 liw analysis started at $(timestamp)"
php panini.php 01.0914 liw
((number++))
echo "$number - Processing 01.0914 luw analysis started at $(timestamp)"
php panini.php 01.0914 luw
((number++))
echo "$number - Processing 01.0914 lfw analysis started at $(timestamp)"
php panini.php 01.0914 lfw
((number++))
echo "$number - Processing 01.0914 low analysis started at $(timestamp)"
php panini.php 01.0914 low
((number++))
echo "$number - Processing 01.0914 laN analysis started at $(timestamp)"
php panini.php 01.0914 laN
((number++))
echo "$number - Processing 01.0914 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0914 ASIrliN
((number++))
echo "$number - Processing 01.0914 viDiliN analysis started at $(timestamp)"
php panini.php 01.0914 viDiliN
((number++))
echo "$number - Processing 01.0914 luN analysis started at $(timestamp)"
php panini.php 01.0914 luN
((number++))
echo "$number - Processing 01.0914 lfN analysis started at $(timestamp)"
php panini.php 01.0914 lfN
((number++))
echo "$number - Processing 10.0121 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0121 ASIrliN
((number++))
echo "$number - Processing 01.0540 law analysis started at $(timestamp)"
php panini.php 01.0540 law
((number++))
echo "$number - Processing 01.0540 low analysis started at $(timestamp)"
php panini.php 01.0540 low
((number++))
echo "$number - Processing 01.0540 laN analysis started at $(timestamp)"
php panini.php 01.0540 laN
((number++))
echo "$number - Processing 01.0540 viDiliN analysis started at $(timestamp)"
php panini.php 01.0540 viDiliN
((number++))
echo "$number - Processing 10.0111 viDiliN analysis started at $(timestamp)"
php panini.php 10.0111 viDiliN
((number++))
echo "$number - Processing 10.0111 luN analysis started at $(timestamp)"
php panini.php 10.0111 luN
((number++))
echo "$number - Processing 01.0550 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0550 ASIrliN
((number++))
echo "$number - Processing 01.1023 liw analysis started at $(timestamp)"
php panini.php 01.1023 liw
((number++))
echo "$number - Processing 01.1023 laN analysis started at $(timestamp)"
php panini.php 01.1023 laN
((number++))
echo "$number - Processing 01.1023 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1023 ASIrliN
((number++))
echo "$number - Processing 10.0325 luN analysis started at $(timestamp)"
php panini.php 10.0325 luN
((number++))
echo "$number - Processing 10.0005 liw analysis started at $(timestamp)"
php panini.php 10.0005 liw
((number++))
echo "$number - Processing 10.0005 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0005 ASIrliN
((number++))
echo "$number - Processing 10.0005 luN analysis started at $(timestamp)"
php panini.php 10.0005 luN
((number++))
echo "$number - Processing 10.0005 lfN analysis started at $(timestamp)"
php panini.php 10.0005 lfN
((number++))
echo "$number - Processing 05.0124 viDiliN analysis started at $(timestamp)"
php panini.php 05.0124 viDiliN
((number++))
echo "$number - Processing 05.0034 liw analysis started at $(timestamp)"
php panini.php 05.0034 liw
((number++))
echo "$number - Processing 05.0034 low analysis started at $(timestamp)"
php panini.php 05.0034 low
((number++))
echo "$number - Processing 05.0034 viDiliN analysis started at $(timestamp)"
php panini.php 05.0034 viDiliN
((number++))
echo "$number - Processing 05.0034 lfN analysis started at $(timestamp)"
php panini.php 05.0034 lfN
((number++))
echo "$number - Processing 01.0611 lfN analysis started at $(timestamp)"
php panini.php 01.0611 lfN
((number++))
echo "$number - Processing 10.0364 luN analysis started at $(timestamp)"
php panini.php 10.0364 luN
((number++))
echo "$number - Processing 01.1022 law analysis started at $(timestamp)"
php panini.php 01.1022 law
((number++))
echo "$number - Processing 01.1022 liw analysis started at $(timestamp)"
php panini.php 01.1022 liw
((number++))
echo "$number - Processing 01.1022 luw analysis started at $(timestamp)"
php panini.php 01.1022 luw
((number++))
echo "$number - Processing 01.1022 lfw analysis started at $(timestamp)"
php panini.php 01.1022 lfw
((number++))
echo "$number - Processing 01.1022 low analysis started at $(timestamp)"
php panini.php 01.1022 low
((number++))
echo "$number - Processing 01.1022 laN analysis started at $(timestamp)"
php panini.php 01.1022 laN
((number++))
echo "$number - Processing 01.1022 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1022 ASIrliN
((number++))
echo "$number - Processing 01.1022 viDiliN analysis started at $(timestamp)"
php panini.php 01.1022 viDiliN
((number++))
echo "$number - Processing 01.1022 luN analysis started at $(timestamp)"
php panini.php 01.1022 luN
((number++))
echo "$number - Processing 01.1022 lfN analysis started at $(timestamp)"
php panini.php 01.1022 lfN
((number++))
echo "$number - Processing 01.0446 luN analysis started at $(timestamp)"
php panini.php 01.0446 luN
((number++))
echo "$number - Processing 01.1021 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1021 ASIrliN
((number++))
echo "$number - Processing 01.0591 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0591 ASIrliN
((number++))
echo "$number - Processing 06.0103 luN analysis started at $(timestamp)"
php panini.php 06.0103 luN
((number++))
echo "$number - Processing 10.0104 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0104 ASIrliN
((number++))
echo "$number - Processing 10.0036 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0036 ASIrliN
((number++))
echo "$number - Processing 06.0126 liw analysis started at $(timestamp)"
php panini.php 06.0126 liw
((number++))
echo "$number - Processing 06.0126 luN analysis started at $(timestamp)"
php panini.php 06.0126 luN
((number++))
echo "$number - Processing 01.0368 lfN analysis started at $(timestamp)"
php panini.php 01.0368 lfN
((number++))
echo "$number - Processing 10.0091 luN analysis started at $(timestamp)"
php panini.php 10.0091 luN
((number++))
echo "$number - Processing 04.0053 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0053 ASIrliN
((number++))
echo "$number - Processing 10.0353 law analysis started at $(timestamp)"
php panini.php 10.0353 law
((number++))
echo "$number - Processing 10.0353 liw analysis started at $(timestamp)"
php panini.php 10.0353 liw
((number++))
echo "$number - Processing 10.0353 luw analysis started at $(timestamp)"
php panini.php 10.0353 luw
((number++))
echo "$number - Processing 10.0353 lfw analysis started at $(timestamp)"
php panini.php 10.0353 lfw
((number++))
echo "$number - Processing 10.0353 low analysis started at $(timestamp)"
php panini.php 10.0353 low
((number++))
echo "$number - Processing 10.0353 laN analysis started at $(timestamp)"
php panini.php 10.0353 laN
((number++))
echo "$number - Processing 10.0353 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0353 ASIrliN
((number++))
echo "$number - Processing 10.0353 viDiliN analysis started at $(timestamp)"
php panini.php 10.0353 viDiliN
((number++))
echo "$number - Processing 10.0353 luN analysis started at $(timestamp)"
php panini.php 10.0353 luN
((number++))
echo "$number - Processing 10.0353 lfN analysis started at $(timestamp)"
php panini.php 10.0353 lfN
((number++))
echo "$number - Processing 10.0275 luN analysis started at $(timestamp)"
php panini.php 10.0275 luN
((number++))
echo "$number - Processing 01.0040 luw analysis started at $(timestamp)"
php panini.php 01.0040 luw
((number++))
echo "$number - Processing 10.0114 laN analysis started at $(timestamp)"
php panini.php 10.0114 laN
((number++))
echo "$number - Processing 10.0114 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0114 ASIrliN
((number++))
echo "$number - Processing 10.0114 lfN analysis started at $(timestamp)"
php panini.php 10.0114 lfN
((number++))
echo "$number - Processing 10.0481 luN analysis started at $(timestamp)"
php panini.php 10.0481 luN
((number++))
echo "$number - Processing 10.0359 luN analysis started at $(timestamp)"
php panini.php 10.0359 luN
((number++))
echo "$number - Processing 10.0370 luN analysis started at $(timestamp)"
php panini.php 10.0370 luN
((number++))
echo "$number - Processing 01.0541 lfN analysis started at $(timestamp)"
php panini.php 01.0541 lfN
((number++))
echo "$number - Processing 10.0078 law analysis started at $(timestamp)"
php panini.php 10.0078 law
((number++))
echo "$number - Processing 10.0078 liw analysis started at $(timestamp)"
php panini.php 10.0078 liw
((number++))
echo "$number - Processing 10.0078 luw analysis started at $(timestamp)"
php panini.php 10.0078 luw
((number++))
echo "$number - Processing 10.0078 lfw analysis started at $(timestamp)"
php panini.php 10.0078 lfw
((number++))
echo "$number - Processing 10.0078 low analysis started at $(timestamp)"
php panini.php 10.0078 low
((number++))
echo "$number - Processing 10.0078 laN analysis started at $(timestamp)"
php panini.php 10.0078 laN
((number++))
echo "$number - Processing 10.0078 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0078 ASIrliN
((number++))
echo "$number - Processing 10.0078 viDiliN analysis started at $(timestamp)"
php panini.php 10.0078 viDiliN
((number++))
echo "$number - Processing 10.0078 luN analysis started at $(timestamp)"
php panini.php 10.0078 luN
((number++))
echo "$number - Processing 10.0078 lfN analysis started at $(timestamp)"
php panini.php 10.0078 lfN
((number++))
echo "$number - Processing 01.1035 luN analysis started at $(timestamp)"
php panini.php 01.1035 luN
((number++))
echo "$number - Processing 01.1035 lfN analysis started at $(timestamp)"
php panini.php 01.1035 lfN
((number++))
echo "$number - Processing 07.0003 law analysis started at $(timestamp)"
php panini.php 07.0003 law
((number++))
echo "$number - Processing 07.0003 low analysis started at $(timestamp)"
php panini.php 07.0003 low
((number++))
echo "$number - Processing 07.0003 laN analysis started at $(timestamp)"
php panini.php 07.0003 laN
((number++))
echo "$number - Processing 10.0469 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0469 ASIrliN
((number++))
echo "$number - Processing 06.0105 luN analysis started at $(timestamp)"
php panini.php 06.0105 luN
((number++))
echo "$number - Processing 06.0120 law analysis started at $(timestamp)"
php panini.php 06.0120 law
((number++))
echo "$number - Processing 06.0120 liw analysis started at $(timestamp)"
php panini.php 06.0120 liw
((number++))
echo "$number - Processing 06.0120 luw analysis started at $(timestamp)"
php panini.php 06.0120 luw
((number++))
echo "$number - Processing 06.0120 lfw analysis started at $(timestamp)"
php panini.php 06.0120 lfw
((number++))
echo "$number - Processing 06.0120 low analysis started at $(timestamp)"
php panini.php 06.0120 low
((number++))
echo "$number - Processing 06.0120 laN analysis started at $(timestamp)"
php panini.php 06.0120 laN
((number++))
echo "$number - Processing 06.0120 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0120 ASIrliN
((number++))
echo "$number - Processing 06.0120 viDiliN analysis started at $(timestamp)"
php panini.php 06.0120 viDiliN
((number++))
echo "$number - Processing 06.0120 luN analysis started at $(timestamp)"
php panini.php 06.0120 luN
((number++))
echo "$number - Processing 06.0120 lfN analysis started at $(timestamp)"
php panini.php 06.0120 lfN
((number++))
echo "$number - Processing 06.0099 liw analysis started at $(timestamp)"
php panini.php 06.0099 liw
((number++))
echo "$number - Processing 06.0099 luN analysis started at $(timestamp)"
php panini.php 06.0099 luN
((number++))
echo "$number - Processing 07.0352 law analysis started at $(timestamp)"
php panini.php 07.0352 law
((number++))
echo "$number - Processing 07.0352 low analysis started at $(timestamp)"
php panini.php 07.0352 low
((number++))
echo "$number - Processing 07.0352 laN analysis started at $(timestamp)"
php panini.php 07.0352 laN
((number++))
echo "$number - Processing 07.0352 luN analysis started at $(timestamp)"
php panini.php 07.0352 luN
((number++))
echo "$number - Processing 07.0352 lfN analysis started at $(timestamp)"
php panini.php 07.0352 lfN
((number++))
echo "$number - Processing 10.0354 law analysis started at $(timestamp)"
php panini.php 10.0354 law
((number++))
echo "$number - Processing 10.0354 liw analysis started at $(timestamp)"
php panini.php 10.0354 liw
((number++))
echo "$number - Processing 10.0354 luw analysis started at $(timestamp)"
php panini.php 10.0354 luw
((number++))
echo "$number - Processing 10.0354 lfw analysis started at $(timestamp)"
php panini.php 10.0354 lfw
((number++))
echo "$number - Processing 10.0354 low analysis started at $(timestamp)"
php panini.php 10.0354 low
((number++))
echo "$number - Processing 10.0354 laN analysis started at $(timestamp)"
php panini.php 10.0354 laN
((number++))
echo "$number - Processing 10.0354 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0354 ASIrliN
((number++))
echo "$number - Processing 10.0354 viDiliN analysis started at $(timestamp)"
php panini.php 10.0354 viDiliN
((number++))
echo "$number - Processing 10.0354 luN analysis started at $(timestamp)"
php panini.php 10.0354 luN
((number++))
echo "$number - Processing 10.0354 lfN analysis started at $(timestamp)"
php panini.php 10.0354 lfN
((number++))
echo "$number - Processing 04.0041 liw analysis started at $(timestamp)"
php panini.php 04.0041 liw
((number++))
echo "$number - Processing 04.0041 luw analysis started at $(timestamp)"
php panini.php 04.0041 luw
((number++))
echo "$number - Processing 04.0041 lfw analysis started at $(timestamp)"
php panini.php 04.0041 lfw
((number++))
echo "$number - Processing 04.0041 low analysis started at $(timestamp)"
php panini.php 04.0041 low
((number++))
echo "$number - Processing 04.0041 laN analysis started at $(timestamp)"
php panini.php 04.0041 laN
((number++))
echo "$number - Processing 04.0041 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0041 ASIrliN
((number++))
echo "$number - Processing 04.0041 viDiliN analysis started at $(timestamp)"
php panini.php 04.0041 viDiliN
((number++))
echo "$number - Processing 04.0041 luN analysis started at $(timestamp)"
php panini.php 04.0041 luN
((number++))
echo "$number - Processing 04.0041 lfN analysis started at $(timestamp)"
php panini.php 04.0041 lfN
((number++))
echo "$number - Processing 01.0276 law analysis started at $(timestamp)"
php panini.php 01.0276 law
((number++))
echo "$number - Processing 01.0276 liw analysis started at $(timestamp)"
php panini.php 01.0276 liw
((number++))
echo "$number - Processing 01.0276 luw analysis started at $(timestamp)"
php panini.php 01.0276 luw
((number++))
echo "$number - Processing 01.0276 lfw analysis started at $(timestamp)"
php panini.php 01.0276 lfw
((number++))
echo "$number - Processing 01.0276 low analysis started at $(timestamp)"
php panini.php 01.0276 low
((number++))
echo "$number - Processing 01.0276 laN analysis started at $(timestamp)"
php panini.php 01.0276 laN
((number++))
echo "$number - Processing 01.0276 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0276 ASIrliN
((number++))
echo "$number - Processing 01.0276 viDiliN analysis started at $(timestamp)"
php panini.php 01.0276 viDiliN
((number++))
echo "$number - Processing 01.0276 luN analysis started at $(timestamp)"
php panini.php 01.0276 luN
((number++))
echo "$number - Processing 01.0276 lfN analysis started at $(timestamp)"
php panini.php 01.0276 lfN
((number++))
echo "$number - Processing 03.0025 law analysis started at $(timestamp)"
php panini.php 03.0025 law
((number++))
echo "$number - Processing 03.0025 low analysis started at $(timestamp)"
php panini.php 03.0025 low
((number++))
echo "$number - Processing 03.0025 laN analysis started at $(timestamp)"
php panini.php 03.0025 laN
((number++))
echo "$number - Processing 03.0025 viDiliN analysis started at $(timestamp)"
php panini.php 03.0025 viDiliN
((number++))
echo "$number - Processing 01.0453 luN analysis started at $(timestamp)"
php panini.php 01.0453 luN
((number++))
echo "$number - Processing 10.0241 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0241 ASIrliN
((number++))
echo "$number - Processing 01.0813 law analysis started at $(timestamp)"
php panini.php 01.0813 law
((number++))
echo "$number - Processing 01.0813 liw analysis started at $(timestamp)"
php panini.php 01.0813 liw
((number++))
echo "$number - Processing 01.0813 luw analysis started at $(timestamp)"
php panini.php 01.0813 luw
((number++))
echo "$number - Processing 01.0813 lfw analysis started at $(timestamp)"
php panini.php 01.0813 lfw
((number++))
echo "$number - Processing 01.0813 low analysis started at $(timestamp)"
php panini.php 01.0813 low
((number++))
echo "$number - Processing 01.0813 laN analysis started at $(timestamp)"
php panini.php 01.0813 laN
((number++))
echo "$number - Processing 01.0813 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0813 ASIrliN
((number++))
echo "$number - Processing 01.0813 viDiliN analysis started at $(timestamp)"
php panini.php 01.0813 viDiliN
((number++))
echo "$number - Processing 01.0813 luN analysis started at $(timestamp)"
php panini.php 01.0813 luN
((number++))
echo "$number - Processing 01.0813 lfN analysis started at $(timestamp)"
php panini.php 01.0813 lfN
((number++))
echo "$number - Processing 06.0018 lfN analysis started at $(timestamp)"
php panini.php 06.0018 lfN
((number++))
echo "$number - Processing 01.0967 liw analysis started at $(timestamp)"
php panini.php 01.0967 liw
((number++))
echo "$number - Processing 02.0067 law analysis started at $(timestamp)"
php panini.php 02.0067 law
((number++))
echo "$number - Processing 02.0067 liw analysis started at $(timestamp)"
php panini.php 02.0067 liw
((number++))
echo "$number - Processing 02.0067 low analysis started at $(timestamp)"
php panini.php 02.0067 low
((number++))
echo "$number - Processing 02.0067 laN analysis started at $(timestamp)"
php panini.php 02.0067 laN
((number++))
echo "$number - Processing 02.0067 luN analysis started at $(timestamp)"
php panini.php 02.0067 luN
((number++))
echo "$number - Processing 10.0324 law analysis started at $(timestamp)"
php panini.php 10.0324 law
((number++))
echo "$number - Processing 10.0324 liw analysis started at $(timestamp)"
php panini.php 10.0324 liw
((number++))
echo "$number - Processing 10.0324 luw analysis started at $(timestamp)"
php panini.php 10.0324 luw
((number++))
echo "$number - Processing 10.0324 lfw analysis started at $(timestamp)"
php panini.php 10.0324 lfw
((number++))
echo "$number - Processing 10.0324 low analysis started at $(timestamp)"
php panini.php 10.0324 low
((number++))
echo "$number - Processing 10.0324 laN analysis started at $(timestamp)"
php panini.php 10.0324 laN
((number++))
echo "$number - Processing 10.0324 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0324 ASIrliN
((number++))
echo "$number - Processing 10.0324 viDiliN analysis started at $(timestamp)"
php panini.php 10.0324 viDiliN
((number++))
echo "$number - Processing 10.0324 luN analysis started at $(timestamp)"
php panini.php 10.0324 luN
((number++))
echo "$number - Processing 10.0324 lfN analysis started at $(timestamp)"
php panini.php 10.0324 lfN
((number++))
echo "$number - Processing 01.0544 law analysis started at $(timestamp)"
php panini.php 01.0544 law
((number++))
echo "$number - Processing 01.0544 liw analysis started at $(timestamp)"
php panini.php 01.0544 liw
((number++))
echo "$number - Processing 01.0544 luw analysis started at $(timestamp)"
php panini.php 01.0544 luw
((number++))
echo "$number - Processing 01.0544 lfw analysis started at $(timestamp)"
php panini.php 01.0544 lfw
((number++))
echo "$number - Processing 01.0544 low analysis started at $(timestamp)"
php panini.php 01.0544 low
((number++))
echo "$number - Processing 01.0544 laN analysis started at $(timestamp)"
php panini.php 01.0544 laN
((number++))
echo "$number - Processing 01.0544 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0544 ASIrliN
((number++))
echo "$number - Processing 01.0544 viDiliN analysis started at $(timestamp)"
php panini.php 01.0544 viDiliN
((number++))
echo "$number - Processing 01.0544 luN analysis started at $(timestamp)"
php panini.php 01.0544 luN
((number++))
echo "$number - Processing 01.0544 lfN analysis started at $(timestamp)"
php panini.php 01.0544 lfN
((number++))
echo "$number - Processing 05.0035 liw analysis started at $(timestamp)"
php panini.php 05.0035 liw
((number++))
echo "$number - Processing 05.0035 low analysis started at $(timestamp)"
php panini.php 05.0035 low
((number++))
echo "$number - Processing 05.0035 viDiliN analysis started at $(timestamp)"
php panini.php 05.0035 viDiliN
((number++))
echo "$number - Processing 05.0035 lfN analysis started at $(timestamp)"
php panini.php 05.0035 lfN
((number++))
echo "$number - Processing 01.1098 liw analysis started at $(timestamp)"
php panini.php 01.1098 liw
((number++))
echo "$number - Processing 01.1098 luw analysis started at $(timestamp)"
php panini.php 01.1098 luw
((number++))
echo "$number - Processing 01.1098 laN analysis started at $(timestamp)"
php panini.php 01.1098 laN
((number++))
echo "$number - Processing 01.1098 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1098 ASIrliN
((number++))
echo "$number - Processing 01.1098 viDiliN analysis started at $(timestamp)"
php panini.php 01.1098 viDiliN
((number++))
echo "$number - Processing 01.1098 luN analysis started at $(timestamp)"
php panini.php 01.1098 luN
((number++))
echo "$number - Processing 01.1110 law analysis started at $(timestamp)"
php panini.php 01.1110 law
((number++))
echo "$number - Processing 01.1110 liw analysis started at $(timestamp)"
php panini.php 01.1110 liw
((number++))
echo "$number - Processing 01.1110 luw analysis started at $(timestamp)"
php panini.php 01.1110 luw
((number++))
echo "$number - Processing 01.1110 lfw analysis started at $(timestamp)"
php panini.php 01.1110 lfw
((number++))
echo "$number - Processing 01.1110 low analysis started at $(timestamp)"
php panini.php 01.1110 low
((number++))
echo "$number - Processing 01.1110 laN analysis started at $(timestamp)"
php panini.php 01.1110 laN
((number++))
echo "$number - Processing 01.1110 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1110 ASIrliN
((number++))
echo "$number - Processing 01.1110 viDiliN analysis started at $(timestamp)"
php panini.php 01.1110 viDiliN
((number++))
echo "$number - Processing 01.1110 luN analysis started at $(timestamp)"
php panini.php 01.1110 luN
((number++))
echo "$number - Processing 01.1110 lfN analysis started at $(timestamp)"
php panini.php 01.1110 lfN
((number++))
echo "$number - Processing 06.0107 law analysis started at $(timestamp)"
php panini.php 06.0107 law
((number++))
echo "$number - Processing 06.0107 liw analysis started at $(timestamp)"
php panini.php 06.0107 liw
((number++))
echo "$number - Processing 06.0107 luw analysis started at $(timestamp)"
php panini.php 06.0107 luw
((number++))
echo "$number - Processing 06.0107 lfw analysis started at $(timestamp)"
php panini.php 06.0107 lfw
((number++))
echo "$number - Processing 06.0107 low analysis started at $(timestamp)"
php panini.php 06.0107 low
((number++))
echo "$number - Processing 06.0107 laN analysis started at $(timestamp)"
php panini.php 06.0107 laN
((number++))
echo "$number - Processing 06.0107 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0107 ASIrliN
((number++))
echo "$number - Processing 06.0107 viDiliN analysis started at $(timestamp)"
php panini.php 06.0107 viDiliN
((number++))
echo "$number - Processing 06.0107 luN analysis started at $(timestamp)"
php panini.php 06.0107 luN
((number++))
echo "$number - Processing 06.0107 lfN analysis started at $(timestamp)"
php panini.php 06.0107 lfN
((number++))
echo "$number - Processing 06.0106 law analysis started at $(timestamp)"
php panini.php 06.0106 law
((number++))
echo "$number - Processing 06.0106 liw analysis started at $(timestamp)"
php panini.php 06.0106 liw
((number++))
echo "$number - Processing 06.0106 luw analysis started at $(timestamp)"
php panini.php 06.0106 luw
((number++))
echo "$number - Processing 06.0106 lfw analysis started at $(timestamp)"
php panini.php 06.0106 lfw
((number++))
echo "$number - Processing 06.0106 low analysis started at $(timestamp)"
php panini.php 06.0106 low
((number++))
echo "$number - Processing 06.0106 laN analysis started at $(timestamp)"
php panini.php 06.0106 laN
((number++))
echo "$number - Processing 06.0106 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0106 ASIrliN
((number++))
echo "$number - Processing 06.0106 viDiliN analysis started at $(timestamp)"
php panini.php 06.0106 viDiliN
((number++))
echo "$number - Processing 06.0106 luN analysis started at $(timestamp)"
php panini.php 06.0106 luN
((number++))
echo "$number - Processing 06.0106 lfN analysis started at $(timestamp)"
php panini.php 06.0106 lfN
((number++))
echo "$number - Processing 01.0032 law analysis started at $(timestamp)"
php panini.php 01.0032 law
((number++))
echo "$number - Processing 01.0032 liw analysis started at $(timestamp)"
php panini.php 01.0032 liw
((number++))
echo "$number - Processing 01.0032 low analysis started at $(timestamp)"
php panini.php 01.0032 low
((number++))
echo "$number - Processing 01.0032 laN analysis started at $(timestamp)"
php panini.php 01.0032 laN
((number++))
echo "$number - Processing 01.0032 viDiliN analysis started at $(timestamp)"
php panini.php 01.0032 viDiliN
((number++))
echo "$number - Processing 01.0032 luN analysis started at $(timestamp)"
php panini.php 01.0032 luN
((number++))
echo "$number - Processing 06.0052 law analysis started at $(timestamp)"
php panini.php 06.0052 law
((number++))
echo "$number - Processing 06.0052 liw analysis started at $(timestamp)"
php panini.php 06.0052 liw
((number++))
echo "$number - Processing 06.0052 luw analysis started at $(timestamp)"
php panini.php 06.0052 luw
((number++))
echo "$number - Processing 06.0052 lfw analysis started at $(timestamp)"
php panini.php 06.0052 lfw
((number++))
echo "$number - Processing 06.0052 low analysis started at $(timestamp)"
php panini.php 06.0052 low
((number++))
echo "$number - Processing 06.0052 laN analysis started at $(timestamp)"
php panini.php 06.0052 laN
((number++))
echo "$number - Processing 06.0052 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0052 ASIrliN
((number++))
echo "$number - Processing 06.0052 viDiliN analysis started at $(timestamp)"
php panini.php 06.0052 viDiliN
((number++))
echo "$number - Processing 06.0052 luN analysis started at $(timestamp)"
php panini.php 06.0052 luN
((number++))
echo "$number - Processing 06.0052 lfN analysis started at $(timestamp)"
php panini.php 06.0052 lfN
((number++))
echo "$number - Processing 06.0371 luN analysis started at $(timestamp)"
php panini.php 06.0371 luN
((number++))
echo "$number - Processing 01.0776 law analysis started at $(timestamp)"
php panini.php 01.0776 law
((number++))
echo "$number - Processing 01.0776 liw analysis started at $(timestamp)"
php panini.php 01.0776 liw
((number++))
echo "$number - Processing 01.0776 luw analysis started at $(timestamp)"
php panini.php 01.0776 luw
((number++))
echo "$number - Processing 01.0776 lfw analysis started at $(timestamp)"
php panini.php 01.0776 lfw
((number++))
echo "$number - Processing 01.0776 low analysis started at $(timestamp)"
php panini.php 01.0776 low
((number++))
echo "$number - Processing 01.0776 laN analysis started at $(timestamp)"
php panini.php 01.0776 laN
((number++))
echo "$number - Processing 01.0776 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0776 ASIrliN
((number++))
echo "$number - Processing 01.0776 viDiliN analysis started at $(timestamp)"
php panini.php 01.0776 viDiliN
((number++))
echo "$number - Processing 01.0776 luN analysis started at $(timestamp)"
php panini.php 01.0776 luN
((number++))
echo "$number - Processing 01.0776 lfN analysis started at $(timestamp)"
php panini.php 01.0776 lfN
((number++))
echo "$number - Processing 01.0454 luN analysis started at $(timestamp)"
php panini.php 01.0454 luN
((number++))
echo "$number - Processing 04.0027 liw analysis started at $(timestamp)"
php panini.php 04.0027 liw
((number++))
echo "$number - Processing 04.0027 luN analysis started at $(timestamp)"
php panini.php 04.0027 luN
((number++))
echo "$number - Processing 10.0025 liw analysis started at $(timestamp)"
php panini.php 10.0025 liw
((number++))
echo "$number - Processing 10.0025 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0025 ASIrliN
((number++))
echo "$number - Processing 10.0025 luN analysis started at $(timestamp)"
php panini.php 10.0025 luN
((number++))
echo "$number - Processing 09.0346 liw analysis started at $(timestamp)"
php panini.php 09.0346 liw
((number++))
echo "$number - Processing 09.0346 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0346 ASIrliN
((number++))
echo "$number - Processing 01.0731 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0731 ASIrliN
((number++))
echo "$number - Processing 09.0258 law analysis started at $(timestamp)"
php panini.php 09.0258 law
((number++))
echo "$number - Processing 09.0258 low analysis started at $(timestamp)"
php panini.php 09.0258 low
((number++))
echo "$number - Processing 09.0258 laN analysis started at $(timestamp)"
php panini.php 09.0258 laN
((number++))
echo "$number - Processing 09.0258 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0258 ASIrliN
((number++))
echo "$number - Processing 09.0258 viDiliN analysis started at $(timestamp)"
php panini.php 09.0258 viDiliN
((number++))
echo "$number - Processing 09.0258 luN analysis started at $(timestamp)"
php panini.php 09.0258 luN
((number++))
echo "$number - Processing 10.0043 luN analysis started at $(timestamp)"
php panini.php 10.0043 luN
((number++))
echo "$number - Processing 09.0034 law analysis started at $(timestamp)"
php panini.php 09.0034 law
((number++))
echo "$number - Processing 09.0034 liw analysis started at $(timestamp)"
php panini.php 09.0034 liw
((number++))
echo "$number - Processing 09.0034 low analysis started at $(timestamp)"
php panini.php 09.0034 low
((number++))
echo "$number - Processing 09.0034 laN analysis started at $(timestamp)"
php panini.php 09.0034 laN
((number++))
echo "$number - Processing 01.0043 law analysis started at $(timestamp)"
php panini.php 01.0043 law
((number++))
echo "$number - Processing 01.0043 liw analysis started at $(timestamp)"
php panini.php 01.0043 liw
((number++))
echo "$number - Processing 01.0043 luw analysis started at $(timestamp)"
php panini.php 01.0043 luw
((number++))
echo "$number - Processing 01.0043 lfw analysis started at $(timestamp)"
php panini.php 01.0043 lfw
((number++))
echo "$number - Processing 01.0043 low analysis started at $(timestamp)"
php panini.php 01.0043 low
((number++))
echo "$number - Processing 01.0043 laN analysis started at $(timestamp)"
php panini.php 01.0043 laN
((number++))
echo "$number - Processing 01.0043 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0043 ASIrliN
((number++))
echo "$number - Processing 01.0043 viDiliN analysis started at $(timestamp)"
php panini.php 01.0043 viDiliN
((number++))
echo "$number - Processing 01.0043 luN analysis started at $(timestamp)"
php panini.php 01.0043 luN
((number++))
echo "$number - Processing 01.0043 lfN analysis started at $(timestamp)"
php panini.php 01.0043 lfN
((number++))
echo "$number - Processing 10.0347 luN analysis started at $(timestamp)"
php panini.php 10.0347 luN
((number++))
echo "$number - Processing 01.1097 liw analysis started at $(timestamp)"
php panini.php 01.1097 liw
((number++))
echo "$number - Processing 01.1097 luw analysis started at $(timestamp)"
php panini.php 01.1097 luw
((number++))
echo "$number - Processing 01.1097 lfw analysis started at $(timestamp)"
php panini.php 01.1097 lfw
((number++))
echo "$number - Processing 01.1097 low analysis started at $(timestamp)"
php panini.php 01.1097 low
((number++))
echo "$number - Processing 01.1097 laN analysis started at $(timestamp)"
php panini.php 01.1097 laN
((number++))
echo "$number - Processing 01.1097 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1097 ASIrliN
((number++))
echo "$number - Processing 01.1097 viDiliN analysis started at $(timestamp)"
php panini.php 01.1097 viDiliN
((number++))
echo "$number - Processing 01.1097 luN analysis started at $(timestamp)"
php panini.php 01.1097 luN
((number++))
echo "$number - Processing 01.1097 lfN analysis started at $(timestamp)"
php panini.php 01.1097 lfN
((number++))
echo "$number - Processing 01.0916 liw analysis started at $(timestamp)"
php panini.php 01.0916 liw
((number++))
echo "$number - Processing 01.0965 liw analysis started at $(timestamp)"
php panini.php 01.0965 liw
((number++))
echo "$number - Processing 01.0343 law analysis started at $(timestamp)"
php panini.php 01.0343 law
((number++))
echo "$number - Processing 01.0343 liw analysis started at $(timestamp)"
php panini.php 01.0343 liw
((number++))
echo "$number - Processing 01.0343 luw analysis started at $(timestamp)"
php panini.php 01.0343 luw
((number++))
echo "$number - Processing 01.0343 lfw analysis started at $(timestamp)"
php panini.php 01.0343 lfw
((number++))
echo "$number - Processing 01.0343 low analysis started at $(timestamp)"
php panini.php 01.0343 low
((number++))
echo "$number - Processing 01.0343 laN analysis started at $(timestamp)"
php panini.php 01.0343 laN
((number++))
echo "$number - Processing 01.0343 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0343 ASIrliN
((number++))
echo "$number - Processing 01.0343 viDiliN analysis started at $(timestamp)"
php panini.php 01.0343 viDiliN
((number++))
echo "$number - Processing 01.0343 luN analysis started at $(timestamp)"
php panini.php 01.0343 luN
((number++))
echo "$number - Processing 01.0343 lfN analysis started at $(timestamp)"
php panini.php 01.0343 lfN
((number++))
echo "$number - Processing 01.0543 law analysis started at $(timestamp)"
php panini.php 01.0543 law
((number++))
echo "$number - Processing 01.0543 liw analysis started at $(timestamp)"
php panini.php 01.0543 liw
((number++))
echo "$number - Processing 01.0543 luw analysis started at $(timestamp)"
php panini.php 01.0543 luw
((number++))
echo "$number - Processing 01.0543 lfw analysis started at $(timestamp)"
php panini.php 01.0543 lfw
((number++))
echo "$number - Processing 01.0543 low analysis started at $(timestamp)"
php panini.php 01.0543 low
((number++))
echo "$number - Processing 01.0543 laN analysis started at $(timestamp)"
php panini.php 01.0543 laN
((number++))
echo "$number - Processing 01.0543 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0543 ASIrliN
((number++))
echo "$number - Processing 01.0543 viDiliN analysis started at $(timestamp)"
php panini.php 01.0543 viDiliN
((number++))
echo "$number - Processing 01.0543 luN analysis started at $(timestamp)"
php panini.php 01.0543 luN
((number++))
echo "$number - Processing 01.0543 lfN analysis started at $(timestamp)"
php panini.php 01.0543 lfN
((number++))
echo "$number - Processing 01.0815 law analysis started at $(timestamp)"
php panini.php 01.0815 law
((number++))
echo "$number - Processing 01.0815 liw analysis started at $(timestamp)"
php panini.php 01.0815 liw
((number++))
echo "$number - Processing 01.0815 luw analysis started at $(timestamp)"
php panini.php 01.0815 luw
((number++))
echo "$number - Processing 01.0815 lfw analysis started at $(timestamp)"
php panini.php 01.0815 lfw
((number++))
echo "$number - Processing 01.0815 low analysis started at $(timestamp)"
php panini.php 01.0815 low
((number++))
echo "$number - Processing 01.0815 laN analysis started at $(timestamp)"
php panini.php 01.0815 laN
((number++))
echo "$number - Processing 01.0815 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0815 ASIrliN
((number++))
echo "$number - Processing 01.0815 viDiliN analysis started at $(timestamp)"
php panini.php 01.0815 viDiliN
((number++))
echo "$number - Processing 01.0815 luN analysis started at $(timestamp)"
php panini.php 01.0815 luN
((number++))
echo "$number - Processing 01.0815 lfN analysis started at $(timestamp)"
php panini.php 01.0815 lfN
((number++))
echo "$number - Processing 06.0020 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0020 ASIrliN
((number++))
echo "$number - Processing 01.0785 luN analysis started at $(timestamp)"
php panini.php 01.0785 luN
((number++))
echo "$number - Processing 01.0785 lfN analysis started at $(timestamp)"
php panini.php 01.0785 lfN
((number++))
echo "$number - Processing 01.1036 luN analysis started at $(timestamp)"
php panini.php 01.1036 luN
((number++))
echo "$number - Processing 01.1036 lfN analysis started at $(timestamp)"
php panini.php 01.1036 lfN
((number++))
echo "$number - Processing 09.0028 law analysis started at $(timestamp)"
php panini.php 09.0028 law
((number++))
echo "$number - Processing 09.0028 liw analysis started at $(timestamp)"
php panini.php 09.0028 liw
((number++))
echo "$number - Processing 09.0028 lfw analysis started at $(timestamp)"
php panini.php 09.0028 lfw
((number++))
echo "$number - Processing 09.0028 low analysis started at $(timestamp)"
php panini.php 09.0028 low
((number++))
echo "$number - Processing 09.0028 laN analysis started at $(timestamp)"
php panini.php 09.0028 laN
((number++))
echo "$number - Processing 09.0028 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0028 ASIrliN
((number++))
echo "$number - Processing 09.0028 viDiliN analysis started at $(timestamp)"
php panini.php 09.0028 viDiliN
((number++))
echo "$number - Processing 09.0028 lfN analysis started at $(timestamp)"
php panini.php 09.0028 lfN
((number++))
echo "$number - Processing 04.0026 law analysis started at $(timestamp)"
php panini.php 04.0026 law
((number++))
echo "$number - Processing 04.0026 liw analysis started at $(timestamp)"
php panini.php 04.0026 liw
((number++))
echo "$number - Processing 04.0026 lfw analysis started at $(timestamp)"
php panini.php 04.0026 lfw
((number++))
echo "$number - Processing 04.0026 low analysis started at $(timestamp)"
php panini.php 04.0026 low
((number++))
echo "$number - Processing 04.0026 laN analysis started at $(timestamp)"
php panini.php 04.0026 laN
((number++))
echo "$number - Processing 04.0026 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0026 ASIrliN
((number++))
echo "$number - Processing 04.0026 viDiliN analysis started at $(timestamp)"
php panini.php 04.0026 viDiliN
((number++))
echo "$number - Processing 04.0026 lfN analysis started at $(timestamp)"
php panini.php 04.0026 lfN
((number++))
echo "$number - Processing 01.0108 liw analysis started at $(timestamp)"
php panini.php 01.0108 liw
((number++))
echo "$number - Processing 01.0108 luN analysis started at $(timestamp)"
php panini.php 01.0108 luN
((number++))
echo "$number - Processing 01.0109 law analysis started at $(timestamp)"
php panini.php 01.0109 law
((number++))
echo "$number - Processing 01.0109 luN analysis started at $(timestamp)"
php panini.php 01.0109 luN
((number++))
echo "$number - Processing 06.0189 luN analysis started at $(timestamp)"
php panini.php 06.0189 luN
((number++))
echo "$number - Processing 04.0197 luN analysis started at $(timestamp)"
php panini.php 04.0197 luN
((number++))
echo "$number - Processing 10.0254 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0254 ASIrliN
((number++))
echo "$number - Processing 01.0778 liw analysis started at $(timestamp)"
php panini.php 01.0778 liw
((number++))
echo "$number - Processing 01.0778 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0778 ASIrliN
((number++))
echo "$number - Processing 01.0778 luN analysis started at $(timestamp)"
php panini.php 01.0778 luN
((number++))
echo "$number - Processing 01.0778 lfN analysis started at $(timestamp)"
php panini.php 01.0778 lfN
((number++))
echo "$number - Processing 07.0022 law analysis started at $(timestamp)"
php panini.php 07.0022 law
((number++))
echo "$number - Processing 07.0022 liw analysis started at $(timestamp)"
php panini.php 07.0022 liw
((number++))
echo "$number - Processing 07.0022 luw analysis started at $(timestamp)"
php panini.php 07.0022 luw
((number++))
echo "$number - Processing 07.0022 lfw analysis started at $(timestamp)"
php panini.php 07.0022 lfw
((number++))
echo "$number - Processing 07.0022 viDiliN analysis started at $(timestamp)"
php panini.php 07.0022 viDiliN
((number++))
echo "$number - Processing 07.0022 lfN analysis started at $(timestamp)"
php panini.php 07.0022 lfN
((number++))
echo "$number - Processing 01.0551 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0551 ASIrliN
((number++))
echo "$number - Processing 04.0109 law analysis started at $(timestamp)"
php panini.php 04.0109 law
((number++))
echo "$number - Processing 04.0109 liw analysis started at $(timestamp)"
php panini.php 04.0109 liw
((number++))
echo "$number - Processing 04.0109 luw analysis started at $(timestamp)"
php panini.php 04.0109 luw
((number++))
echo "$number - Processing 04.0109 lfw analysis started at $(timestamp)"
php panini.php 04.0109 lfw
((number++))
echo "$number - Processing 04.0109 low analysis started at $(timestamp)"
php panini.php 04.0109 low
((number++))
echo "$number - Processing 04.0109 laN analysis started at $(timestamp)"
php panini.php 04.0109 laN
((number++))
echo "$number - Processing 04.0109 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0109 ASIrliN
((number++))
echo "$number - Processing 04.0109 viDiliN analysis started at $(timestamp)"
php panini.php 04.0109 viDiliN
((number++))
echo "$number - Processing 04.0109 luN analysis started at $(timestamp)"
php panini.php 04.0109 luN
((number++))
echo "$number - Processing 04.0109 lfN analysis started at $(timestamp)"
php panini.php 04.0109 lfN
((number++))
echo "$number - Processing 01.0110 luN analysis started at $(timestamp)"
php panini.php 01.0110 luN
((number++))
echo "$number - Processing 01.1126 laN analysis started at $(timestamp)"
php panini.php 01.1126 laN
((number++))
echo "$number - Processing 01.1126 viDiliN analysis started at $(timestamp)"
php panini.php 01.1126 viDiliN
((number++))
echo "$number - Processing 01.1126 luN analysis started at $(timestamp)"
php panini.php 01.1126 luN
((number++))
echo "$number - Processing 01.0420 luN analysis started at $(timestamp)"
php panini.php 01.0420 luN
((number++))
echo "$number - Processing 04.0017 lfN analysis started at $(timestamp)"
php panini.php 04.0017 lfN
((number++))
echo "$number - Processing 01.0111 luN analysis started at $(timestamp)"
php panini.php 01.0111 luN
((number++))
echo "$number - Processing 04.0018 law analysis started at $(timestamp)"
php panini.php 04.0018 law
((number++))
echo "$number - Processing 04.0018 liw analysis started at $(timestamp)"
php panini.php 04.0018 liw
((number++))
echo "$number - Processing 04.0018 luw analysis started at $(timestamp)"
php panini.php 04.0018 luw
((number++))
echo "$number - Processing 04.0018 lfw analysis started at $(timestamp)"
php panini.php 04.0018 lfw
((number++))
echo "$number - Processing 04.0018 low analysis started at $(timestamp)"
php panini.php 04.0018 low
((number++))
echo "$number - Processing 04.0018 laN analysis started at $(timestamp)"
php panini.php 04.0018 laN
((number++))
echo "$number - Processing 04.0018 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0018 ASIrliN
((number++))
echo "$number - Processing 04.0018 viDiliN analysis started at $(timestamp)"
php panini.php 04.0018 viDiliN
((number++))
echo "$number - Processing 04.0018 luN analysis started at $(timestamp)"
php panini.php 04.0018 luN
((number++))
echo "$number - Processing 04.0018 lfN analysis started at $(timestamp)"
php panini.php 04.0018 lfN
((number++))
echo "$number - Processing 02.0029 law analysis started at $(timestamp)"
php panini.php 02.0029 law
((number++))
echo "$number - Processing 02.0029 liw analysis started at $(timestamp)"
php panini.php 02.0029 liw
((number++))
echo "$number - Processing 02.0029 luw analysis started at $(timestamp)"
php panini.php 02.0029 luw
((number++))
echo "$number - Processing 02.0029 lfw analysis started at $(timestamp)"
php panini.php 02.0029 lfw
((number++))
echo "$number - Processing 02.0029 low analysis started at $(timestamp)"
php panini.php 02.0029 low
((number++))
echo "$number - Processing 02.0029 laN analysis started at $(timestamp)"
php panini.php 02.0029 laN
((number++))
echo "$number - Processing 02.0029 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0029 ASIrliN
((number++))
echo "$number - Processing 02.0029 viDiliN analysis started at $(timestamp)"
php panini.php 02.0029 viDiliN
((number++))
echo "$number - Processing 02.0029 luN analysis started at $(timestamp)"
php panini.php 02.0029 luN
((number++))
echo "$number - Processing 02.0029 lfN analysis started at $(timestamp)"
php panini.php 02.0029 lfN
((number++))
echo "$number - Processing 10.0044 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0044 ASIrliN
((number++))
echo "$number - Processing 01.0278 liw analysis started at $(timestamp)"
php panini.php 01.0278 liw
((number++))
echo "$number - Processing 01.0278 luw analysis started at $(timestamp)"
php panini.php 01.0278 luw
((number++))
echo "$number - Processing 01.0278 lfw analysis started at $(timestamp)"
php panini.php 01.0278 lfw
((number++))
echo "$number - Processing 01.0278 luN analysis started at $(timestamp)"
php panini.php 01.0278 luN
((number++))
echo "$number - Processing 01.0278 lfN analysis started at $(timestamp)"
php panini.php 01.0278 lfN
((number++))
echo "$number - Processing 06.0116 law analysis started at $(timestamp)"
php panini.php 06.0116 law
((number++))
echo "$number - Processing 06.0116 liw analysis started at $(timestamp)"
php panini.php 06.0116 liw
((number++))
echo "$number - Processing 06.0116 luw analysis started at $(timestamp)"
php panini.php 06.0116 luw
((number++))
echo "$number - Processing 06.0116 lfw analysis started at $(timestamp)"
php panini.php 06.0116 lfw
((number++))
echo "$number - Processing 06.0116 low analysis started at $(timestamp)"
php panini.php 06.0116 low
((number++))
echo "$number - Processing 06.0116 laN analysis started at $(timestamp)"
php panini.php 06.0116 laN
((number++))
echo "$number - Processing 06.0116 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0116 ASIrliN
((number++))
echo "$number - Processing 06.0116 viDiliN analysis started at $(timestamp)"
php panini.php 06.0116 viDiliN
((number++))
echo "$number - Processing 06.0116 lfN analysis started at $(timestamp)"
php panini.php 06.0116 lfN
((number++))
echo "$number - Processing 01.0406 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0406 ASIrliN
((number++))
echo "$number - Processing 10.0166 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0166 ASIrliN
((number++))
echo "$number - Processing 10.0489 liw analysis started at $(timestamp)"
php panini.php 10.0489 liw
((number++))
echo "$number - Processing 10.0489 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0489 ASIrliN
((number++))
echo "$number - Processing 06.0034 low analysis started at $(timestamp)"
php panini.php 06.0034 low
((number++))
echo "$number - Processing 06.0034 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0034 ASIrliN
((number++))
echo "$number - Processing 06.0034 lfN analysis started at $(timestamp)"
php panini.php 06.0034 lfN
((number++))
echo "$number - Processing 01.0474 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0474 ASIrliN
((number++))
echo "$number - Processing 01.0474 lfN analysis started at $(timestamp)"
php panini.php 01.0474 lfN
((number++))
echo "$number - Processing 09.0057 luN analysis started at $(timestamp)"
php panini.php 09.0057 luN
((number++))
echo "$number - Processing 01.0471 lfN analysis started at $(timestamp)"
php panini.php 01.0471 lfN
((number++))
echo "$number - Processing 01.0475 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0475 ASIrliN
((number++))
echo "$number - Processing 01.0475 lfN analysis started at $(timestamp)"
php panini.php 01.0475 lfN
((number++))
echo "$number - Processing 06.0035 low analysis started at $(timestamp)"
php panini.php 06.0035 low
((number++))
echo "$number - Processing 06.0035 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0035 ASIrliN
((number++))
echo "$number - Processing 06.0035 lfN analysis started at $(timestamp)"
php panini.php 06.0035 lfN
((number++))
echo "$number - Processing 03.0022 law analysis started at $(timestamp)"
php panini.php 03.0022 law
((number++))
echo "$number - Processing 03.0022 low analysis started at $(timestamp)"
php panini.php 03.0022 low
((number++))
echo "$number - Processing 03.0022 laN analysis started at $(timestamp)"
php panini.php 03.0022 laN
((number++))
echo "$number - Processing 03.0022 viDiliN analysis started at $(timestamp)"
php panini.php 03.0022 viDiliN
((number++))
echo "$number - Processing 01.0651 liw analysis started at $(timestamp)"
php panini.php 01.0651 liw
((number++))
echo "$number - Processing 01.0651 lfN analysis started at $(timestamp)"
php panini.php 01.0651 lfN
((number++))
echo "$number - Processing 01.0838 luN analysis started at $(timestamp)"
php panini.php 01.0838 luN
((number++))
echo "$number - Processing 01.0407 law analysis started at $(timestamp)"
php panini.php 01.0407 law
((number++))
echo "$number - Processing 01.0407 liw analysis started at $(timestamp)"
php panini.php 01.0407 liw
((number++))
echo "$number - Processing 01.0407 luw analysis started at $(timestamp)"
php panini.php 01.0407 luw
((number++))
echo "$number - Processing 01.0407 lfw analysis started at $(timestamp)"
php panini.php 01.0407 lfw
((number++))
echo "$number - Processing 01.0407 low analysis started at $(timestamp)"
php panini.php 01.0407 low
((number++))
echo "$number - Processing 01.0407 laN analysis started at $(timestamp)"
php panini.php 01.0407 laN
((number++))
echo "$number - Processing 01.0407 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0407 ASIrliN
((number++))
echo "$number - Processing 01.0407 viDiliN analysis started at $(timestamp)"
php panini.php 01.0407 viDiliN
((number++))
echo "$number - Processing 01.0407 luN analysis started at $(timestamp)"
php panini.php 01.0407 luN
((number++))
echo "$number - Processing 01.0407 lfN analysis started at $(timestamp)"
php panini.php 01.0407 lfN
((number++))
echo "$number - Processing 10.0212 luN analysis started at $(timestamp)"
php panini.php 10.0212 luN
((number++))
echo "$number - Processing 04.0047 luN analysis started at $(timestamp)"
php panini.php 04.0047 luN
((number++))
echo "$number - Processing 06.0077 liw analysis started at $(timestamp)"
php panini.php 06.0077 liw
((number++))
echo "$number - Processing 06.0077 lfN analysis started at $(timestamp)"
php panini.php 06.0077 lfN
((number++))
echo "$number - Processing 08.0006 law analysis started at $(timestamp)"
php panini.php 08.0006 law
((number++))
echo "$number - Processing 08.0006 low analysis started at $(timestamp)"
php panini.php 08.0006 low
((number++))
echo "$number - Processing 08.0006 laN analysis started at $(timestamp)"
php panini.php 08.0006 laN
((number++))
echo "$number - Processing 07.0009 law analysis started at $(timestamp)"
php panini.php 07.0009 law
((number++))
echo "$number - Processing 07.0009 low analysis started at $(timestamp)"
php panini.php 07.0009 low
((number++))
echo "$number - Processing 07.0009 laN analysis started at $(timestamp)"
php panini.php 07.0009 laN
((number++))
echo "$number - Processing 07.0009 luN analysis started at $(timestamp)"
php panini.php 07.0009 luN
((number++))
echo "$number - Processing 06.0355 luN analysis started at $(timestamp)"
php panini.php 06.0355 luN
((number++))
echo "$number - Processing 10.0028 luN analysis started at $(timestamp)"
php panini.php 10.0028 luN
((number++))
echo "$number - Processing 10.0092 luN analysis started at $(timestamp)"
php panini.php 10.0092 luN
((number++))
echo "$number - Processing 05.0351 law analysis started at $(timestamp)"
php panini.php 05.0351 law
((number++))
echo "$number - Processing 05.0351 low analysis started at $(timestamp)"
php panini.php 05.0351 low
((number++))
echo "$number - Processing 05.0351 laN analysis started at $(timestamp)"
php panini.php 05.0351 laN
((number++))
echo "$number - Processing 05.0351 viDiliN analysis started at $(timestamp)"
php panini.php 05.0351 viDiliN
((number++))
echo "$number - Processing 05.0351 luN analysis started at $(timestamp)"
php panini.php 05.0351 luN
((number++))
echo "$number - Processing 06.0030 law analysis started at $(timestamp)"
php panini.php 06.0030 law
((number++))
echo "$number - Processing 06.0030 liw analysis started at $(timestamp)"
php panini.php 06.0030 liw
((number++))
echo "$number - Processing 06.0030 luw analysis started at $(timestamp)"
php panini.php 06.0030 luw
((number++))
echo "$number - Processing 06.0030 lfw analysis started at $(timestamp)"
php panini.php 06.0030 lfw
((number++))
echo "$number - Processing 06.0030 low analysis started at $(timestamp)"
php panini.php 06.0030 low
((number++))
echo "$number - Processing 06.0030 laN analysis started at $(timestamp)"
php panini.php 06.0030 laN
((number++))
echo "$number - Processing 06.0030 viDiliN analysis started at $(timestamp)"
php panini.php 06.0030 viDiliN
((number++))
echo "$number - Processing 06.0030 luN analysis started at $(timestamp)"
php panini.php 06.0030 luN
((number++))
echo "$number - Processing 06.0030 lfN analysis started at $(timestamp)"
php panini.php 06.0030 lfN
((number++))
echo "$number - Processing 06.0029 law analysis started at $(timestamp)"
php panini.php 06.0029 law
((number++))
echo "$number - Processing 06.0029 liw analysis started at $(timestamp)"
php panini.php 06.0029 liw
((number++))
echo "$number - Processing 06.0029 luw analysis started at $(timestamp)"
php panini.php 06.0029 luw
((number++))
echo "$number - Processing 06.0029 lfw analysis started at $(timestamp)"
php panini.php 06.0029 lfw
((number++))
echo "$number - Processing 06.0029 low analysis started at $(timestamp)"
php panini.php 06.0029 low
((number++))
echo "$number - Processing 06.0029 laN analysis started at $(timestamp)"
php panini.php 06.0029 laN
((number++))
echo "$number - Processing 06.0029 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0029 ASIrliN
((number++))
echo "$number - Processing 06.0029 viDiliN analysis started at $(timestamp)"
php panini.php 06.0029 viDiliN
((number++))
echo "$number - Processing 06.0029 luN analysis started at $(timestamp)"
php panini.php 06.0029 luN
((number++))
echo "$number - Processing 06.0029 lfN analysis started at $(timestamp)"
php panini.php 06.0029 lfN
((number++))
echo "$number - Processing 06.0031 law analysis started at $(timestamp)"
php panini.php 06.0031 law
((number++))
echo "$number - Processing 06.0031 low analysis started at $(timestamp)"
php panini.php 06.0031 low
((number++))
echo "$number - Processing 06.0031 laN analysis started at $(timestamp)"
php panini.php 06.0031 laN
((number++))
echo "$number - Processing 06.0031 viDiliN analysis started at $(timestamp)"
php panini.php 06.0031 viDiliN
((number++))
echo "$number - Processing 06.0031 luN analysis started at $(timestamp)"
php panini.php 06.0031 luN
((number++))
echo "$number - Processing 04.0141 lfN analysis started at $(timestamp)"
php panini.php 04.0141 lfN
((number++))
echo "$number - Processing 06.0075 liw analysis started at $(timestamp)"
php panini.php 06.0075 liw
((number++))
echo "$number - Processing 06.0075 luN analysis started at $(timestamp)"
php panini.php 06.0075 luN
((number++))
echo "$number - Processing 06.0075 lfN analysis started at $(timestamp)"
php panini.php 06.0075 lfN
((number++))
echo "$number - Processing 07.0018 law analysis started at $(timestamp)"
php panini.php 07.0018 law
((number++))
echo "$number - Processing 07.0018 laN analysis started at $(timestamp)"
php panini.php 07.0018 laN
((number++))
echo "$number - Processing 01.1124 liw analysis started at $(timestamp)"
php panini.php 01.1124 liw
((number++))
echo "$number - Processing 01.1124 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1124 ASIrliN
((number++))
echo "$number - Processing 01.0263 liw analysis started at $(timestamp)"
php panini.php 01.0263 liw
((number++))
echo "$number - Processing 01.0263 lfN analysis started at $(timestamp)"
php panini.php 01.0263 lfN
((number++))
echo "$number - Processing 01.0572 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0572 ASIrliN
((number++))
echo "$number - Processing 01.1141 luw analysis started at $(timestamp)"
php panini.php 01.1141 luw
((number++))
echo "$number - Processing 01.1141 lfw analysis started at $(timestamp)"
php panini.php 01.1141 lfw
((number++))
echo "$number - Processing 10.0292 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0292 ASIrliN
((number++))
echo "$number - Processing 01.0748 law analysis started at $(timestamp)"
php panini.php 01.0748 law
((number++))
echo "$number - Processing 01.0748 liw analysis started at $(timestamp)"
php panini.php 01.0748 liw
((number++))
echo "$number - Processing 01.0748 luw analysis started at $(timestamp)"
php panini.php 01.0748 luw
((number++))
echo "$number - Processing 01.0748 lfw analysis started at $(timestamp)"
php panini.php 01.0748 lfw
((number++))
echo "$number - Processing 01.0748 low analysis started at $(timestamp)"
php panini.php 01.0748 low
((number++))
echo "$number - Processing 01.0748 laN analysis started at $(timestamp)"
php panini.php 01.0748 laN
((number++))
echo "$number - Processing 01.0748 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0748 ASIrliN
((number++))
echo "$number - Processing 01.0748 viDiliN analysis started at $(timestamp)"
php panini.php 01.0748 viDiliN
((number++))
echo "$number - Processing 01.0748 luN analysis started at $(timestamp)"
php panini.php 01.0748 luN
((number++))
echo "$number - Processing 01.0748 lfN analysis started at $(timestamp)"
php panini.php 01.0748 lfN
((number++))
echo "$number - Processing 01.0172 law analysis started at $(timestamp)"
php panini.php 01.0172 law
((number++))
echo "$number - Processing 01.0172 liw analysis started at $(timestamp)"
php panini.php 01.0172 liw
((number++))
echo "$number - Processing 01.0172 luw analysis started at $(timestamp)"
php panini.php 01.0172 luw
((number++))
echo "$number - Processing 01.0172 lfw analysis started at $(timestamp)"
php panini.php 01.0172 lfw
((number++))
echo "$number - Processing 01.0172 low analysis started at $(timestamp)"
php panini.php 01.0172 low
((number++))
echo "$number - Processing 01.0172 laN analysis started at $(timestamp)"
php panini.php 01.0172 laN
((number++))
echo "$number - Processing 01.0172 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0172 ASIrliN
((number++))
echo "$number - Processing 01.0172 viDiliN analysis started at $(timestamp)"
php panini.php 01.0172 viDiliN
((number++))
echo "$number - Processing 01.0172 luN analysis started at $(timestamp)"
php panini.php 01.0172 luN
((number++))
echo "$number - Processing 01.0172 lfN analysis started at $(timestamp)"
php panini.php 01.0172 lfN
((number++))
echo "$number - Processing 01.0160 law analysis started at $(timestamp)"
php panini.php 01.0160 law
((number++))
echo "$number - Processing 01.0160 liw analysis started at $(timestamp)"
php panini.php 01.0160 liw
((number++))
echo "$number - Processing 01.0160 luw analysis started at $(timestamp)"
php panini.php 01.0160 luw
((number++))
echo "$number - Processing 01.0160 lfw analysis started at $(timestamp)"
php panini.php 01.0160 lfw
((number++))
echo "$number - Processing 01.0160 low analysis started at $(timestamp)"
php panini.php 01.0160 low
((number++))
echo "$number - Processing 01.0160 laN analysis started at $(timestamp)"
php panini.php 01.0160 laN
((number++))
echo "$number - Processing 01.0160 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0160 ASIrliN
((number++))
echo "$number - Processing 01.0160 viDiliN analysis started at $(timestamp)"
php panini.php 01.0160 viDiliN
((number++))
echo "$number - Processing 01.0160 luN analysis started at $(timestamp)"
php panini.php 01.0160 luN
((number++))
echo "$number - Processing 01.0160 lfN analysis started at $(timestamp)"
php panini.php 01.0160 lfN
((number++))
echo "$number - Processing 01.0434 law analysis started at $(timestamp)"
php panini.php 01.0434 law
((number++))
echo "$number - Processing 01.0434 low analysis started at $(timestamp)"
php panini.php 01.0434 low
((number++))
echo "$number - Processing 01.0434 laN analysis started at $(timestamp)"
php panini.php 01.0434 laN
((number++))
echo "$number - Processing 01.0434 viDiliN analysis started at $(timestamp)"
php panini.php 01.0434 viDiliN
((number++))
echo "$number - Processing 01.0173 law analysis started at $(timestamp)"
php panini.php 01.0173 law
((number++))
echo "$number - Processing 01.0173 liw analysis started at $(timestamp)"
php panini.php 01.0173 liw
((number++))
echo "$number - Processing 01.0173 luw analysis started at $(timestamp)"
php panini.php 01.0173 luw
((number++))
echo "$number - Processing 01.0173 lfw analysis started at $(timestamp)"
php panini.php 01.0173 lfw
((number++))
echo "$number - Processing 01.0173 low analysis started at $(timestamp)"
php panini.php 01.0173 low
((number++))
echo "$number - Processing 01.0173 laN analysis started at $(timestamp)"
php panini.php 01.0173 laN
((number++))
echo "$number - Processing 01.0173 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0173 ASIrliN
((number++))
echo "$number - Processing 01.0173 viDiliN analysis started at $(timestamp)"
php panini.php 01.0173 viDiliN
((number++))
echo "$number - Processing 01.0173 luN analysis started at $(timestamp)"
php panini.php 01.0173 luN
((number++))
echo "$number - Processing 01.0173 lfN analysis started at $(timestamp)"
php panini.php 01.0173 lfN
((number++))
echo "$number - Processing 06.0221 luN analysis started at $(timestamp)"
php panini.php 06.0221 luN
((number++))
echo "$number - Processing 01.0472 lfN analysis started at $(timestamp)"
php panini.php 01.0472 lfN
((number++))
echo "$number - Processing 01.0476 law analysis started at $(timestamp)"
php panini.php 01.0476 law
((number++))
echo "$number - Processing 01.0476 liw analysis started at $(timestamp)"
php panini.php 01.0476 liw
((number++))
echo "$number - Processing 01.0476 luw analysis started at $(timestamp)"
php panini.php 01.0476 luw
((number++))
echo "$number - Processing 01.0476 lfw analysis started at $(timestamp)"
php panini.php 01.0476 lfw
((number++))
echo "$number - Processing 01.0476 low analysis started at $(timestamp)"
php panini.php 01.0476 low
((number++))
echo "$number - Processing 01.0476 laN analysis started at $(timestamp)"
php panini.php 01.0476 laN
((number++))
echo "$number - Processing 01.0476 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0476 ASIrliN
((number++))
echo "$number - Processing 01.0476 viDiliN analysis started at $(timestamp)"
php panini.php 01.0476 viDiliN
((number++))
echo "$number - Processing 01.0476 luN analysis started at $(timestamp)"
php panini.php 01.0476 luN
((number++))
echo "$number - Processing 01.0476 lfN analysis started at $(timestamp)"
php panini.php 01.0476 lfN
((number++))
echo "$number - Processing 01.0473 lfN analysis started at $(timestamp)"
php panini.php 01.0473 lfN
((number++))
echo "$number - Processing 01.0477 law analysis started at $(timestamp)"
php panini.php 01.0477 law
((number++))
echo "$number - Processing 01.0477 liw analysis started at $(timestamp)"
php panini.php 01.0477 liw
((number++))
echo "$number - Processing 01.0477 luw analysis started at $(timestamp)"
php panini.php 01.0477 luw
((number++))
echo "$number - Processing 01.0477 lfw analysis started at $(timestamp)"
php panini.php 01.0477 lfw
((number++))
echo "$number - Processing 01.0477 low analysis started at $(timestamp)"
php panini.php 01.0477 low
((number++))
echo "$number - Processing 01.0477 laN analysis started at $(timestamp)"
php panini.php 01.0477 laN
((number++))
echo "$number - Processing 01.0477 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0477 ASIrliN
((number++))
echo "$number - Processing 01.0477 viDiliN analysis started at $(timestamp)"
php panini.php 01.0477 viDiliN
((number++))
echo "$number - Processing 01.0477 luN analysis started at $(timestamp)"
php panini.php 01.0477 luN
((number++))
echo "$number - Processing 01.0477 lfN analysis started at $(timestamp)"
php panini.php 01.0477 lfN
((number++))
echo "$number - Processing 06.0021 luN analysis started at $(timestamp)"
php panini.php 06.0021 luN
((number++))
echo "$number - Processing 01.0884 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0884 ASIrliN
((number++))
echo "$number - Processing 01.0884 luN analysis started at $(timestamp)"
php panini.php 01.0884 luN
((number++))
echo "$number - Processing 01.1156 luN analysis started at $(timestamp)"
php panini.php 01.1156 luN
((number++))
echo "$number - Processing 01.0167 law analysis started at $(timestamp)"
php panini.php 01.0167 law
((number++))
echo "$number - Processing 01.0167 liw analysis started at $(timestamp)"
php panini.php 01.0167 liw
((number++))
echo "$number - Processing 01.0167 luw analysis started at $(timestamp)"
php panini.php 01.0167 luw
((number++))
echo "$number - Processing 01.0167 lfw analysis started at $(timestamp)"
php panini.php 01.0167 lfw
((number++))
echo "$number - Processing 01.0167 low analysis started at $(timestamp)"
php panini.php 01.0167 low
((number++))
echo "$number - Processing 01.0167 laN analysis started at $(timestamp)"
php panini.php 01.0167 laN
((number++))
echo "$number - Processing 01.0167 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0167 ASIrliN
((number++))
echo "$number - Processing 01.0167 viDiliN analysis started at $(timestamp)"
php panini.php 01.0167 viDiliN
((number++))
echo "$number - Processing 01.0167 luN analysis started at $(timestamp)"
php panini.php 01.0167 luN
((number++))
echo "$number - Processing 01.0167 lfN analysis started at $(timestamp)"
php panini.php 01.0167 lfN
((number++))
echo "$number - Processing 06.0117 luN analysis started at $(timestamp)"
php panini.php 06.0117 luN
((number++))
echo "$number - Processing 06.0117 lfN analysis started at $(timestamp)"
php panini.php 06.0117 lfN
((number++))
echo "$number - Processing 01.0652 liw analysis started at $(timestamp)"
php panini.php 01.0652 liw
((number++))
echo "$number - Processing 01.0652 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0652 ASIrliN
((number++))
echo "$number - Processing 01.0652 luN analysis started at $(timestamp)"
php panini.php 01.0652 luN
((number++))
echo "$number - Processing 01.1144 liw analysis started at $(timestamp)"
php panini.php 01.1144 liw
((number++))
echo "$number - Processing 01.1144 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1144 ASIrliN
((number++))
echo "$number - Processing 10.0317 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0317 ASIrliN
((number++))
echo "$number - Processing 10.0194 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0194 ASIrliN
((number++))
echo "$number - Processing 01.0874 luN analysis started at $(timestamp)"
php panini.php 01.0874 luN
((number++))
echo "$number - Processing 01.0692 luN analysis started at $(timestamp)"
php panini.php 01.0692 luN
((number++))
echo "$number - Processing 05.0030 liw analysis started at $(timestamp)"
php panini.php 05.0030 liw
((number++))
echo "$number - Processing 01.0181 law analysis started at $(timestamp)"
php panini.php 01.0181 law
((number++))
echo "$number - Processing 01.0181 liw analysis started at $(timestamp)"
php panini.php 01.0181 liw
((number++))
echo "$number - Processing 01.0181 luw analysis started at $(timestamp)"
php panini.php 01.0181 luw
((number++))
echo "$number - Processing 01.0181 lfw analysis started at $(timestamp)"
php panini.php 01.0181 lfw
((number++))
echo "$number - Processing 01.0181 low analysis started at $(timestamp)"
php panini.php 01.0181 low
((number++))
echo "$number - Processing 01.0181 laN analysis started at $(timestamp)"
php panini.php 01.0181 laN
((number++))
echo "$number - Processing 01.0181 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0181 ASIrliN
((number++))
echo "$number - Processing 01.0181 viDiliN analysis started at $(timestamp)"
php panini.php 01.0181 viDiliN
((number++))
echo "$number - Processing 01.0181 luN analysis started at $(timestamp)"
php panini.php 01.0181 luN
((number++))
echo "$number - Processing 01.0181 lfN analysis started at $(timestamp)"
php panini.php 01.0181 lfN
((number++))
echo "$number - Processing 01.0017 liw analysis started at $(timestamp)"
php panini.php 01.0017 liw
((number++))
echo "$number - Processing 01.0017 luN analysis started at $(timestamp)"
php panini.php 01.0017 luN
((number++))
echo "$number - Processing 01.0008 liw analysis started at $(timestamp)"
php panini.php 01.0008 liw
((number++))
echo "$number - Processing 01.0008 laN analysis started at $(timestamp)"
php panini.php 01.0008 laN
((number++))
echo "$number - Processing 01.0008 viDiliN analysis started at $(timestamp)"
php panini.php 01.0008 viDiliN
((number++))
echo "$number - Processing 01.0008 luN analysis started at $(timestamp)"
php panini.php 01.0008 luN
((number++))
echo "$number - Processing 05.0026 law analysis started at $(timestamp)"
php panini.php 05.0026 law
((number++))
echo "$number - Processing 05.0026 low analysis started at $(timestamp)"
php panini.php 05.0026 low
((number++))
echo "$number - Processing 05.0026 laN analysis started at $(timestamp)"
php panini.php 05.0026 laN
((number++))
echo "$number - Processing 05.0026 viDiliN analysis started at $(timestamp)"
php panini.php 05.0026 viDiliN
((number++))
echo "$number - Processing 02.0068 lfw analysis started at $(timestamp)"
php panini.php 02.0068 lfw
((number++))
echo "$number - Processing 02.0068 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0068 ASIrliN
((number++))
echo "$number - Processing 02.0068 viDiliN analysis started at $(timestamp)"
php panini.php 02.0068 viDiliN
((number++))
echo "$number - Processing 02.0068 luN analysis started at $(timestamp)"
php panini.php 02.0068 luN
((number++))
echo "$number - Processing 02.0068 lfN analysis started at $(timestamp)"
php panini.php 02.0068 lfN
((number++))
echo "$number - Processing 10.0281 law analysis started at $(timestamp)"
php panini.php 10.0281 law
((number++))
echo "$number - Processing 10.0281 liw analysis started at $(timestamp)"
php panini.php 10.0281 liw
((number++))
echo "$number - Processing 10.0281 luw analysis started at $(timestamp)"
php panini.php 10.0281 luw
((number++))
echo "$number - Processing 10.0281 lfw analysis started at $(timestamp)"
php panini.php 10.0281 lfw
((number++))
echo "$number - Processing 10.0281 low analysis started at $(timestamp)"
php panini.php 10.0281 low
((number++))
echo "$number - Processing 10.0281 laN analysis started at $(timestamp)"
php panini.php 10.0281 laN
((number++))
echo "$number - Processing 10.0281 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0281 ASIrliN
((number++))
echo "$number - Processing 10.0281 viDiliN analysis started at $(timestamp)"
php panini.php 10.0281 viDiliN
((number++))
echo "$number - Processing 10.0281 lfN analysis started at $(timestamp)"
php panini.php 10.0281 lfN
((number++))
echo "$number - Processing 04.0195 law analysis started at $(timestamp)"
php panini.php 04.0195 law
((number++))
echo "$number - Processing 04.0195 liw analysis started at $(timestamp)"
php panini.php 04.0195 liw
((number++))
echo "$number - Processing 04.0195 luw analysis started at $(timestamp)"
php panini.php 04.0195 luw
((number++))
echo "$number - Processing 04.0195 lfw analysis started at $(timestamp)"
php panini.php 04.0195 lfw
((number++))
echo "$number - Processing 04.0195 low analysis started at $(timestamp)"
php panini.php 04.0195 low
((number++))
echo "$number - Processing 04.0195 laN analysis started at $(timestamp)"
php panini.php 04.0195 laN
((number++))
echo "$number - Processing 04.0195 viDiliN analysis started at $(timestamp)"
php panini.php 04.0195 viDiliN
((number++))
echo "$number - Processing 04.0195 luN analysis started at $(timestamp)"
php panini.php 04.0195 luN
((number++))
echo "$number - Processing 03.0010 law analysis started at $(timestamp)"
php panini.php 03.0010 law
((number++))
echo "$number - Processing 03.0010 low analysis started at $(timestamp)"
php panini.php 03.0010 low
((number++))
echo "$number - Processing 03.0010 laN analysis started at $(timestamp)"
php panini.php 03.0010 laN
((number++))
echo "$number - Processing 03.0010 ASIrliN analysis started at $(timestamp)"
php panini.php 03.0010 ASIrliN
((number++))
echo "$number - Processing 03.0010 viDiliN analysis started at $(timestamp)"
php panini.php 03.0010 viDiliN
((number++))
echo "$number - Processing 03.0010 luN analysis started at $(timestamp)"
php panini.php 03.0010 luN
((number++))
echo "$number - Processing 01.1079 low analysis started at $(timestamp)"
php panini.php 01.1079 low
((number++))
echo "$number - Processing 01.1079 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1079 ASIrliN
((number++))
echo "$number - Processing 01.1079 viDiliN analysis started at $(timestamp)"
php panini.php 01.1079 viDiliN
((number++))
echo "$number - Processing 01.1079 luN analysis started at $(timestamp)"
php panini.php 01.1079 luN
((number++))
echo "$number - Processing 01.1149 law analysis started at $(timestamp)"
php panini.php 01.1149 law
((number++))
echo "$number - Processing 01.1149 liw analysis started at $(timestamp)"
php panini.php 01.1149 liw
((number++))
echo "$number - Processing 01.1149 luw analysis started at $(timestamp)"
php panini.php 01.1149 luw
((number++))
echo "$number - Processing 01.1149 lfw analysis started at $(timestamp)"
php panini.php 01.1149 lfw
((number++))
echo "$number - Processing 01.1149 low analysis started at $(timestamp)"
php panini.php 01.1149 low
((number++))
echo "$number - Processing 01.1149 laN analysis started at $(timestamp)"
php panini.php 01.1149 laN
((number++))
echo "$number - Processing 01.1149 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1149 ASIrliN
((number++))
echo "$number - Processing 01.1149 viDiliN analysis started at $(timestamp)"
php panini.php 01.1149 viDiliN
((number++))
echo "$number - Processing 01.1149 luN analysis started at $(timestamp)"
php panini.php 01.1149 luN
((number++))
echo "$number - Processing 01.1149 lfN analysis started at $(timestamp)"
php panini.php 01.1149 lfN
((number++))
echo "$number - Processing 01.1025 luN analysis started at $(timestamp)"
php panini.php 01.1025 luN
((number++))
echo "$number - Processing 01.1041 liw analysis started at $(timestamp)"
php panini.php 01.1041 liw
((number++))
echo "$number - Processing 01.1041 luN analysis started at $(timestamp)"
php panini.php 01.1041 luN
((number++))
echo "$number - Processing 01.0676 law analysis started at $(timestamp)"
php panini.php 01.0676 law
((number++))
echo "$number - Processing 01.0676 liw analysis started at $(timestamp)"
php panini.php 01.0676 liw
((number++))
echo "$number - Processing 01.0676 luw analysis started at $(timestamp)"
php panini.php 01.0676 luw
((number++))
echo "$number - Processing 01.0676 lfw analysis started at $(timestamp)"
php panini.php 01.0676 lfw
((number++))
echo "$number - Processing 01.0676 low analysis started at $(timestamp)"
php panini.php 01.0676 low
((number++))
echo "$number - Processing 01.0676 laN analysis started at $(timestamp)"
php panini.php 01.0676 laN
((number++))
echo "$number - Processing 01.0676 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0676 ASIrliN
((number++))
echo "$number - Processing 01.0676 viDiliN analysis started at $(timestamp)"
php panini.php 01.0676 viDiliN
((number++))
echo "$number - Processing 01.0676 luN analysis started at $(timestamp)"
php panini.php 01.0676 luN
((number++))
echo "$number - Processing 01.0676 lfN analysis started at $(timestamp)"
php panini.php 01.0676 lfN
((number++))
echo "$number - Processing 02.0005 low analysis started at $(timestamp)"
php panini.php 02.0005 low
((number++))
echo "$number - Processing 02.0005 laN analysis started at $(timestamp)"
php panini.php 02.0005 laN
((number++))
echo "$number - Processing 02.0005 luN analysis started at $(timestamp)"
php panini.php 02.0005 luN
((number++))
echo "$number - Processing 04.0029 liw analysis started at $(timestamp)"
php panini.php 04.0029 liw
((number++))
echo "$number - Processing 04.0029 luw analysis started at $(timestamp)"
php panini.php 04.0029 luw
((number++))
echo "$number - Processing 04.0029 lfw analysis started at $(timestamp)"
php panini.php 04.0029 lfw
((number++))
echo "$number - Processing 04.0029 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0029 ASIrliN
((number++))
echo "$number - Processing 04.0029 luN analysis started at $(timestamp)"
php panini.php 04.0029 luN
((number++))
echo "$number - Processing 04.0029 lfN analysis started at $(timestamp)"
php panini.php 04.0029 lfN
((number++))
echo "$number - Processing 01.0693 luN analysis started at $(timestamp)"
php panini.php 01.0693 luN
((number++))
echo "$number - Processing 02.0071 law analysis started at $(timestamp)"
php panini.php 02.0071 law
((number++))
echo "$number - Processing 02.0071 liw analysis started at $(timestamp)"
php panini.php 02.0071 liw
((number++))
echo "$number - Processing 02.0071 luw analysis started at $(timestamp)"
php panini.php 02.0071 luw
((number++))
echo "$number - Processing 02.0071 lfw analysis started at $(timestamp)"
php panini.php 02.0071 lfw
((number++))
echo "$number - Processing 02.0071 low analysis started at $(timestamp)"
php panini.php 02.0071 low
((number++))
echo "$number - Processing 02.0071 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0071 ASIrliN
((number++))
echo "$number - Processing 02.0071 viDiliN analysis started at $(timestamp)"
php panini.php 02.0071 viDiliN
((number++))
echo "$number - Processing 02.0071 luN analysis started at $(timestamp)"
php panini.php 02.0071 luN
((number++))
echo "$number - Processing 02.0071 lfN analysis started at $(timestamp)"
php panini.php 02.0071 lfN
((number++))
echo "$number - Processing 04.0045 luN analysis started at $(timestamp)"
php panini.php 04.0045 luN
((number++))
echo "$number - Processing 01.1094 liw analysis started at $(timestamp)"
php panini.php 01.1094 liw
((number++))
echo "$number - Processing 01.1094 luw analysis started at $(timestamp)"
php panini.php 01.1094 luw
((number++))
echo "$number - Processing 01.1094 lfw analysis started at $(timestamp)"
php panini.php 01.1094 lfw
((number++))
echo "$number - Processing 05.0476 law analysis started at $(timestamp)"
php panini.php 05.0476 law
((number++))
echo "$number - Processing 05.0476 liw analysis started at $(timestamp)"
php panini.php 05.0476 liw
((number++))
echo "$number - Processing 05.0476 luw analysis started at $(timestamp)"
php panini.php 05.0476 luw
((number++))
echo "$number - Processing 05.0476 lfw analysis started at $(timestamp)"
php panini.php 05.0476 lfw
((number++))
echo "$number - Processing 05.0476 laN analysis started at $(timestamp)"
php panini.php 05.0476 laN
((number++))
echo "$number - Processing 05.0476 viDiliN analysis started at $(timestamp)"
php panini.php 05.0476 viDiliN
((number++))
echo "$number - Processing 01.0653 liw analysis started at $(timestamp)"
php panini.php 01.0653 liw
((number++))
echo "$number - Processing 04.0082 law analysis started at $(timestamp)"
php panini.php 04.0082 law
((number++))
echo "$number - Processing 04.0082 liw analysis started at $(timestamp)"
php panini.php 04.0082 liw
((number++))
echo "$number - Processing 04.0082 luw analysis started at $(timestamp)"
php panini.php 04.0082 luw
((number++))
echo "$number - Processing 04.0082 lfw analysis started at $(timestamp)"
php panini.php 04.0082 lfw
((number++))
echo "$number - Processing 04.0082 low analysis started at $(timestamp)"
php panini.php 04.0082 low
((number++))
echo "$number - Processing 04.0082 laN analysis started at $(timestamp)"
php panini.php 04.0082 laN
((number++))
echo "$number - Processing 04.0082 viDiliN analysis started at $(timestamp)"
php panini.php 04.0082 viDiliN
((number++))
echo "$number - Processing 02.0004 low analysis started at $(timestamp)"
php panini.php 02.0004 low
((number++))
echo "$number - Processing 02.0004 laN analysis started at $(timestamp)"
php panini.php 02.0004 laN
((number++))
echo "$number - Processing 02.0004 lfN analysis started at $(timestamp)"
php panini.php 02.0004 lfN
((number++))
echo "$number - Processing 06.0835 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0835 ASIrliN
((number++))
echo "$number - Processing 06.0356 luN analysis started at $(timestamp)"
php panini.php 06.0356 luN
((number++))
echo "$number - Processing 06.0038 law analysis started at $(timestamp)"
php panini.php 06.0038 law
((number++))
echo "$number - Processing 06.0038 liw analysis started at $(timestamp)"
php panini.php 06.0038 liw
((number++))
echo "$number - Processing 06.0038 luw analysis started at $(timestamp)"
php panini.php 06.0038 luw
((number++))
echo "$number - Processing 06.0038 lfw analysis started at $(timestamp)"
php panini.php 06.0038 lfw
((number++))
echo "$number - Processing 06.0038 low analysis started at $(timestamp)"
php panini.php 06.0038 low
((number++))
echo "$number - Processing 06.0038 laN analysis started at $(timestamp)"
php panini.php 06.0038 laN
((number++))
echo "$number - Processing 06.0038 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0038 ASIrliN
((number++))
echo "$number - Processing 06.0038 viDiliN analysis started at $(timestamp)"
php panini.php 06.0038 viDiliN
((number++))
echo "$number - Processing 06.0038 luN analysis started at $(timestamp)"
php panini.php 06.0038 luN
((number++))
echo "$number - Processing 06.0038 lfN analysis started at $(timestamp)"
php panini.php 06.0038 lfN
((number++))
echo "$number - Processing 06.0037 law analysis started at $(timestamp)"
php panini.php 06.0037 law
((number++))
echo "$number - Processing 06.0037 liw analysis started at $(timestamp)"
php panini.php 06.0037 liw
((number++))
echo "$number - Processing 06.0037 luw analysis started at $(timestamp)"
php panini.php 06.0037 luw
((number++))
echo "$number - Processing 06.0037 lfw analysis started at $(timestamp)"
php panini.php 06.0037 lfw
((number++))
echo "$number - Processing 06.0037 low analysis started at $(timestamp)"
php panini.php 06.0037 low
((number++))
echo "$number - Processing 06.0037 laN analysis started at $(timestamp)"
php panini.php 06.0037 laN
((number++))
echo "$number - Processing 06.0037 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0037 ASIrliN
((number++))
echo "$number - Processing 06.0037 viDiliN analysis started at $(timestamp)"
php panini.php 06.0037 viDiliN
((number++))
echo "$number - Processing 06.0037 luN analysis started at $(timestamp)"
php panini.php 06.0037 luN
((number++))
echo "$number - Processing 06.0037 lfN analysis started at $(timestamp)"
php panini.php 06.0037 lfN
((number++))
echo "$number - Processing 06.0039 law analysis started at $(timestamp)"
php panini.php 06.0039 law
((number++))
echo "$number - Processing 06.0039 low analysis started at $(timestamp)"
php panini.php 06.0039 low
((number++))
echo "$number - Processing 06.0039 laN analysis started at $(timestamp)"
php panini.php 06.0039 laN
((number++))
echo "$number - Processing 06.0039 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0039 ASIrliN
((number++))
echo "$number - Processing 06.0039 viDiliN analysis started at $(timestamp)"
php panini.php 06.0039 viDiliN
((number++))
echo "$number - Processing 01.0920 law analysis started at $(timestamp)"
php panini.php 01.0920 law
((number++))
echo "$number - Processing 01.0920 liw analysis started at $(timestamp)"
php panini.php 01.0920 liw
((number++))
echo "$number - Processing 01.0920 luw analysis started at $(timestamp)"
php panini.php 01.0920 luw
((number++))
echo "$number - Processing 01.0920 lfw analysis started at $(timestamp)"
php panini.php 01.0920 lfw
((number++))
echo "$number - Processing 01.0920 low analysis started at $(timestamp)"
php panini.php 01.0920 low
((number++))
echo "$number - Processing 01.0920 laN analysis started at $(timestamp)"
php panini.php 01.0920 laN
((number++))
echo "$number - Processing 01.0920 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0920 ASIrliN
((number++))
echo "$number - Processing 01.0920 viDiliN analysis started at $(timestamp)"
php panini.php 01.0920 viDiliN
((number++))
echo "$number - Processing 09.0026 law analysis started at $(timestamp)"
php panini.php 09.0026 law
((number++))
echo "$number - Processing 09.0026 liw analysis started at $(timestamp)"
php panini.php 09.0026 liw
((number++))
echo "$number - Processing 09.0026 luw analysis started at $(timestamp)"
php panini.php 09.0026 luw
((number++))
echo "$number - Processing 09.0026 lfw analysis started at $(timestamp)"
php panini.php 09.0026 lfw
((number++))
echo "$number - Processing 09.0026 low analysis started at $(timestamp)"
php panini.php 09.0026 low
((number++))
echo "$number - Processing 09.0026 laN analysis started at $(timestamp)"
php panini.php 09.0026 laN
((number++))
echo "$number - Processing 09.0026 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0026 ASIrliN
((number++))
echo "$number - Processing 09.0026 viDiliN analysis started at $(timestamp)"
php panini.php 09.0026 viDiliN
((number++))
echo "$number - Processing 05.0037 law analysis started at $(timestamp)"
php panini.php 05.0037 law
((number++))
echo "$number - Processing 05.0037 liw analysis started at $(timestamp)"
php panini.php 05.0037 liw
((number++))
echo "$number - Processing 05.0037 luw analysis started at $(timestamp)"
php panini.php 05.0037 luw
((number++))
echo "$number - Processing 05.0037 lfw analysis started at $(timestamp)"
php panini.php 05.0037 lfw
((number++))
echo "$number - Processing 05.0037 low analysis started at $(timestamp)"
php panini.php 05.0037 low
((number++))
echo "$number - Processing 05.0037 laN analysis started at $(timestamp)"
php panini.php 05.0037 laN
((number++))
echo "$number - Processing 05.0037 ASIrliN analysis started at $(timestamp)"
php panini.php 05.0037 ASIrliN
((number++))
echo "$number - Processing 05.0037 viDiliN analysis started at $(timestamp)"
php panini.php 05.0037 viDiliN
((number++))
echo "$number - Processing 01.1143 law analysis started at $(timestamp)"
php panini.php 01.1143 law
((number++))
echo "$number - Processing 01.1143 low analysis started at $(timestamp)"
php panini.php 01.1143 low
((number++))
echo "$number - Processing 01.1143 viDiliN analysis started at $(timestamp)"
php panini.php 01.1143 viDiliN
((number++))
echo "$number - Processing 01.1143 luN analysis started at $(timestamp)"
php panini.php 01.1143 luN
((number++))
echo "$number - Processing 04.0043 low analysis started at $(timestamp)"
php panini.php 04.0043 low
((number++))
echo "$number - Processing 04.0043 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0043 ASIrliN
((number++))
echo "$number - Processing 04.0043 viDiliN analysis started at $(timestamp)"
php panini.php 04.0043 viDiliN
((number++))
echo "$number - Processing 04.0043 luN analysis started at $(timestamp)"
php panini.php 04.0043 luN
((number++))
echo "$number - Processing 02.0035 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0035 ASIrliN
((number++))
echo "$number - Processing 01.0842 luN analysis started at $(timestamp)"
php panini.php 01.0842 luN
((number++))
echo "$number - Processing 01.1053 law analysis started at $(timestamp)"
php panini.php 01.1053 law
((number++))
echo "$number - Processing 01.1053 liw analysis started at $(timestamp)"
php panini.php 01.1053 liw
((number++))
echo "$number - Processing 01.1053 luw analysis started at $(timestamp)"
php panini.php 01.1053 luw
((number++))
echo "$number - Processing 01.1053 lfw analysis started at $(timestamp)"
php panini.php 01.1053 lfw
((number++))
echo "$number - Processing 01.1053 low analysis started at $(timestamp)"
php panini.php 01.1053 low
((number++))
echo "$number - Processing 01.1053 laN analysis started at $(timestamp)"
php panini.php 01.1053 laN
((number++))
echo "$number - Processing 01.1053 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1053 ASIrliN
((number++))
echo "$number - Processing 01.1053 viDiliN analysis started at $(timestamp)"
php panini.php 01.1053 viDiliN
((number++))
echo "$number - Processing 01.1053 luN analysis started at $(timestamp)"
php panini.php 01.1053 luN
((number++))
echo "$number - Processing 01.1053 lfN analysis started at $(timestamp)"
php panini.php 01.1053 lfN
((number++))
echo "$number - Processing 01.0132 law analysis started at $(timestamp)"
php panini.php 01.0132 law
((number++))
echo "$number - Processing 01.0132 liw analysis started at $(timestamp)"
php panini.php 01.0132 liw
((number++))
echo "$number - Processing 01.0132 luw analysis started at $(timestamp)"
php panini.php 01.0132 luw
((number++))
echo "$number - Processing 01.0132 lfw analysis started at $(timestamp)"
php panini.php 01.0132 lfw
((number++))
echo "$number - Processing 01.0132 low analysis started at $(timestamp)"
php panini.php 01.0132 low
((number++))
echo "$number - Processing 01.0132 laN analysis started at $(timestamp)"
php panini.php 01.0132 laN
((number++))
echo "$number - Processing 01.0132 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0132 ASIrliN
((number++))
echo "$number - Processing 01.0132 viDiliN analysis started at $(timestamp)"
php panini.php 01.0132 viDiliN
((number++))
echo "$number - Processing 01.0132 luN analysis started at $(timestamp)"
php panini.php 01.0132 luN
((number++))
echo "$number - Processing 01.0132 lfN analysis started at $(timestamp)"
php panini.php 01.0132 lfN
((number++))
echo "$number - Processing 01.0120 liw analysis started at $(timestamp)"
php panini.php 01.0120 liw
((number++))
echo "$number - Processing 01.0120 luN analysis started at $(timestamp)"
php panini.php 01.0120 luN
((number++))
echo "$number - Processing 01.0763 law analysis started at $(timestamp)"
php panini.php 01.0763 law
((number++))
echo "$number - Processing 01.0763 liw analysis started at $(timestamp)"
php panini.php 01.0763 liw
((number++))
echo "$number - Processing 01.0763 luw analysis started at $(timestamp)"
php panini.php 01.0763 luw
((number++))
echo "$number - Processing 01.0763 lfw analysis started at $(timestamp)"
php panini.php 01.0763 lfw
((number++))
echo "$number - Processing 01.0763 low analysis started at $(timestamp)"
php panini.php 01.0763 low
((number++))
echo "$number - Processing 01.0763 laN analysis started at $(timestamp)"
php panini.php 01.0763 laN
((number++))
echo "$number - Processing 01.0763 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0763 ASIrliN
((number++))
echo "$number - Processing 01.0763 viDiliN analysis started at $(timestamp)"
php panini.php 01.0763 viDiliN
((number++))
echo "$number - Processing 01.0763 luN analysis started at $(timestamp)"
php panini.php 01.0763 luN
((number++))
echo "$number - Processing 01.0763 lfN analysis started at $(timestamp)"
php panini.php 01.0763 lfN
((number++))
echo "$number - Processing 01.0322 luN analysis started at $(timestamp)"
php panini.php 01.0322 luN
((number++))
echo "$number - Processing 01.1095 law analysis started at $(timestamp)"
php panini.php 01.1095 law
((number++))
echo "$number - Processing 01.1095 liw analysis started at $(timestamp)"
php panini.php 01.1095 liw
((number++))
echo "$number - Processing 01.1095 luw analysis started at $(timestamp)"
php panini.php 01.1095 luw
((number++))
echo "$number - Processing 01.1095 lfw analysis started at $(timestamp)"
php panini.php 01.1095 lfw
((number++))
echo "$number - Processing 01.1095 low analysis started at $(timestamp)"
php panini.php 01.1095 low
((number++))
echo "$number - Processing 01.1095 laN analysis started at $(timestamp)"
php panini.php 01.1095 laN
((number++))
echo "$number - Processing 01.1095 viDiliN analysis started at $(timestamp)"
php panini.php 01.1095 viDiliN
((number++))
echo "$number - Processing 01.1095 luN analysis started at $(timestamp)"
php panini.php 01.1095 luN
((number++))
echo "$number - Processing 04.0094 law analysis started at $(timestamp)"
php panini.php 04.0094 law
((number++))
echo "$number - Processing 04.0094 liw analysis started at $(timestamp)"
php panini.php 04.0094 liw
((number++))
echo "$number - Processing 04.0094 luN analysis started at $(timestamp)"
php panini.php 04.0094 luN
((number++))
echo "$number - Processing 09.0013 law analysis started at $(timestamp)"
php panini.php 09.0013 law
((number++))
echo "$number - Processing 09.0013 liw analysis started at $(timestamp)"
php panini.php 09.0013 liw
((number++))
echo "$number - Processing 09.0013 luw analysis started at $(timestamp)"
php panini.php 09.0013 luw
((number++))
echo "$number - Processing 09.0013 lfw analysis started at $(timestamp)"
php panini.php 09.0013 lfw
((number++))
echo "$number - Processing 09.0013 low analysis started at $(timestamp)"
php panini.php 09.0013 low
((number++))
echo "$number - Processing 09.0013 laN analysis started at $(timestamp)"
php panini.php 09.0013 laN
((number++))
echo "$number - Processing 09.0013 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0013 ASIrliN
((number++))
echo "$number - Processing 09.0013 viDiliN analysis started at $(timestamp)"
php panini.php 09.0013 viDiliN
((number++))
echo "$number - Processing 09.0013 luN analysis started at $(timestamp)"
php panini.php 09.0013 luN
((number++))
echo "$number - Processing 09.0013 lfN analysis started at $(timestamp)"
php panini.php 09.0013 lfN
((number++))
echo "$number - Processing 01.0083 luN analysis started at $(timestamp)"
php panini.php 01.0083 luN
((number++))
echo "$number - Processing 01.1054 law analysis started at $(timestamp)"
php panini.php 01.1054 law
((number++))
echo "$number - Processing 01.1054 low analysis started at $(timestamp)"
php panini.php 01.1054 low
((number++))
echo "$number - Processing 01.1054 laN analysis started at $(timestamp)"
php panini.php 01.1054 laN
((number++))
echo "$number - Processing 01.1054 viDiliN analysis started at $(timestamp)"
php panini.php 01.1054 viDiliN
((number++))
echo "$number - Processing 02.0003 law analysis started at $(timestamp)"
php panini.php 02.0003 law
((number++))
echo "$number - Processing 01.1083 law analysis started at $(timestamp)"
php panini.php 01.1083 law
((number++))
echo "$number - Processing 01.1083 liw analysis started at $(timestamp)"
php panini.php 01.1083 liw
((number++))
echo "$number - Processing 01.1083 luw analysis started at $(timestamp)"
php panini.php 01.1083 luw
((number++))
echo "$number - Processing 01.1083 lfw analysis started at $(timestamp)"
php panini.php 01.1083 lfw
((number++))
echo "$number - Processing 01.1083 low analysis started at $(timestamp)"
php panini.php 01.1083 low
((number++))
echo "$number - Processing 01.1083 laN analysis started at $(timestamp)"
php panini.php 01.1083 laN
((number++))
echo "$number - Processing 01.1083 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1083 ASIrliN
((number++))
echo "$number - Processing 01.1083 viDiliN analysis started at $(timestamp)"
php panini.php 01.1083 viDiliN
((number++))
echo "$number - Processing 01.1083 luN analysis started at $(timestamp)"
php panini.php 01.1083 luN
((number++))
echo "$number - Processing 01.1083 lfN analysis started at $(timestamp)"
php panini.php 01.1083 lfN
((number++))
echo "$number - Processing 01.0522 liw analysis started at $(timestamp)"
php panini.php 01.0522 liw
((number++))
echo "$number - Processing 01.0522 luN analysis started at $(timestamp)"
php panini.php 01.0522 luN
((number++))
echo "$number - Processing 03.0024 law analysis started at $(timestamp)"
php panini.php 03.0024 law
((number++))
echo "$number - Processing 03.0024 low analysis started at $(timestamp)"
php panini.php 03.0024 low
((number++))
echo "$number - Processing 03.0024 laN analysis started at $(timestamp)"
php panini.php 03.0024 laN
((number++))
echo "$number - Processing 03.0024 viDiliN analysis started at $(timestamp)"
php panini.php 03.0024 viDiliN
((number++))
echo "$number - Processing 03.0011 law analysis started at $(timestamp)"
php panini.php 03.0011 law
((number++))
echo "$number - Processing 03.0011 low analysis started at $(timestamp)"
php panini.php 03.0011 low
((number++))
echo "$number - Processing 03.0011 laN analysis started at $(timestamp)"
php panini.php 03.0011 laN
((number++))
echo "$number - Processing 03.0011 ASIrliN analysis started at $(timestamp)"
php panini.php 03.0011 ASIrliN
((number++))
echo "$number - Processing 03.0011 viDiliN analysis started at $(timestamp)"
php panini.php 03.0011 viDiliN
((number++))
echo "$number - Processing 03.0011 luN analysis started at $(timestamp)"
php panini.php 03.0011 luN
((number++))
echo "$number - Processing 01.0687 law analysis started at $(timestamp)"
php panini.php 01.0687 law
((number++))
echo "$number - Processing 01.0687 liw analysis started at $(timestamp)"
php panini.php 01.0687 liw
((number++))
echo "$number - Processing 01.0687 low analysis started at $(timestamp)"
php panini.php 01.0687 low
((number++))
echo "$number - Processing 01.0687 laN analysis started at $(timestamp)"
php panini.php 01.0687 laN
((number++))
echo "$number - Processing 01.0687 viDiliN analysis started at $(timestamp)"
php panini.php 01.0687 viDiliN
((number++))
echo "$number - Processing 01.0687 luN analysis started at $(timestamp)"
php panini.php 01.0687 luN
((number++))
echo "$number - Processing 01.0677 law analysis started at $(timestamp)"
php panini.php 01.0677 law
((number++))
echo "$number - Processing 01.0677 low analysis started at $(timestamp)"
php panini.php 01.0677 low
((number++))
echo "$number - Processing 01.0677 laN analysis started at $(timestamp)"
php panini.php 01.0677 laN
((number++))
echo "$number - Processing 01.0677 viDiliN analysis started at $(timestamp)"
php panini.php 01.0677 viDiliN
((number++))
echo "$number - Processing 03.0023 law analysis started at $(timestamp)"
php panini.php 03.0023 law
((number++))
echo "$number - Processing 03.0023 low analysis started at $(timestamp)"
php panini.php 03.0023 low
((number++))
echo "$number - Processing 03.0023 laN analysis started at $(timestamp)"
php panini.php 03.0023 laN
((number++))
echo "$number - Processing 03.0023 viDiliN analysis started at $(timestamp)"
php panini.php 03.0023 viDiliN
((number++))
echo "$number - Processing 03.0023 luN analysis started at $(timestamp)"
php panini.php 03.0023 luN
((number++))
echo "$number - Processing 06.0133 law analysis started at $(timestamp)"
php panini.php 06.0133 law
((number++))
echo "$number - Processing 06.0133 liw analysis started at $(timestamp)"
php panini.php 06.0133 liw
((number++))
echo "$number - Processing 06.0133 luw analysis started at $(timestamp)"
php panini.php 06.0133 luw
((number++))
echo "$number - Processing 06.0133 lfw analysis started at $(timestamp)"
php panini.php 06.0133 lfw
((number++))
echo "$number - Processing 06.0133 low analysis started at $(timestamp)"
php panini.php 06.0133 low
((number++))
echo "$number - Processing 06.0133 laN analysis started at $(timestamp)"
php panini.php 06.0133 laN
((number++))
echo "$number - Processing 06.0133 viDiliN analysis started at $(timestamp)"
php panini.php 06.0133 viDiliN
((number++))
echo "$number - Processing 06.0133 lfN analysis started at $(timestamp)"
php panini.php 06.0133 lfN
((number++))
echo "$number - Processing 05.0009 viDiliN analysis started at $(timestamp)"
php panini.php 05.0009 viDiliN
((number++))
echo "$number - Processing 01.0686 luN analysis started at $(timestamp)"
php panini.php 01.0686 luN
((number++))
echo "$number - Processing 10.0303 luN analysis started at $(timestamp)"
php panini.php 10.0303 luN
((number++))
echo "$number - Processing 01.0654 law analysis started at $(timestamp)"
php panini.php 01.0654 law
((number++))
echo "$number - Processing 01.0654 liw analysis started at $(timestamp)"
php panini.php 01.0654 liw
((number++))
echo "$number - Processing 01.0654 luw analysis started at $(timestamp)"
php panini.php 01.0654 luw
((number++))
echo "$number - Processing 01.0654 lfw analysis started at $(timestamp)"
php panini.php 01.0654 lfw
((number++))
echo "$number - Processing 01.0654 low analysis started at $(timestamp)"
php panini.php 01.0654 low
((number++))
echo "$number - Processing 01.0654 laN analysis started at $(timestamp)"
php panini.php 01.0654 laN
((number++))
echo "$number - Processing 01.0654 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0654 ASIrliN
((number++))
echo "$number - Processing 01.0654 viDiliN analysis started at $(timestamp)"
php panini.php 01.0654 viDiliN
((number++))
echo "$number - Processing 01.0654 luN analysis started at $(timestamp)"
php panini.php 01.0654 luN
((number++))
echo "$number - Processing 01.0654 lfN analysis started at $(timestamp)"
php panini.php 01.0654 lfN
((number++))
echo "$number - Processing 05.0133 liw analysis started at $(timestamp)"
php panini.php 05.0133 liw
((number++))
echo "$number - Processing 05.0133 viDiliN analysis started at $(timestamp)"
php panini.php 05.0133 viDiliN
((number++))
echo "$number - Processing 10.0010 luw analysis started at $(timestamp)"
php panini.php 10.0010 luw
((number++))
echo "$number - Processing 10.0010 lfw analysis started at $(timestamp)"
php panini.php 10.0010 lfw
((number++))
echo "$number - Processing 10.0010 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0010 ASIrliN
((number++))
echo "$number - Processing 10.0010 luN analysis started at $(timestamp)"
php panini.php 10.0010 luN
((number++))
echo "$number - Processing 10.0010 lfN analysis started at $(timestamp)"
php panini.php 10.0010 lfN
((number++))
echo "$number - Processing 09.0372 liw analysis started at $(timestamp)"
php panini.php 09.0372 liw
((number++))
echo "$number - Processing 01.0462 low analysis started at $(timestamp)"
php panini.php 01.0462 low
((number++))
echo "$number - Processing 01.0462 laN analysis started at $(timestamp)"
php panini.php 01.0462 laN
((number++))
echo "$number - Processing 01.0462 viDiliN analysis started at $(timestamp)"
php panini.php 01.0462 viDiliN
((number++))
echo "$number - Processing 04.0048 law analysis started at $(timestamp)"
php panini.php 04.0048 law
((number++))
echo "$number - Processing 04.0048 liw analysis started at $(timestamp)"
php panini.php 04.0048 liw
((number++))
echo "$number - Processing 04.0048 low analysis started at $(timestamp)"
php panini.php 04.0048 low
((number++))
echo "$number - Processing 04.0048 laN analysis started at $(timestamp)"
php panini.php 04.0048 laN
((number++))
echo "$number - Processing 04.0048 viDiliN analysis started at $(timestamp)"
php panini.php 04.0048 viDiliN
((number++))
echo "$number - Processing 04.0048 luN analysis started at $(timestamp)"
php panini.php 04.0048 luN
((number++))
echo "$number - Processing 10.0141 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0141 ASIrliN
((number++))
echo "$number - Processing 10.0141 luN analysis started at $(timestamp)"
php panini.php 10.0141 luN
((number++))
echo "$number - Processing 10.0140 law analysis started at $(timestamp)"
php panini.php 10.0140 law
((number++))
echo "$number - Processing 10.0140 liw analysis started at $(timestamp)"
php panini.php 10.0140 liw
((number++))
echo "$number - Processing 10.0140 luw analysis started at $(timestamp)"
php panini.php 10.0140 luw
((number++))
echo "$number - Processing 10.0140 lfw analysis started at $(timestamp)"
php panini.php 10.0140 lfw
((number++))
echo "$number - Processing 10.0140 low analysis started at $(timestamp)"
php panini.php 10.0140 low
((number++))
echo "$number - Processing 10.0140 laN analysis started at $(timestamp)"
php panini.php 10.0140 laN
((number++))
echo "$number - Processing 10.0140 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0140 ASIrliN
((number++))
echo "$number - Processing 10.0140 viDiliN analysis started at $(timestamp)"
php panini.php 10.0140 viDiliN
((number++))
echo "$number - Processing 10.0140 luN analysis started at $(timestamp)"
php panini.php 10.0140 luN
((number++))
echo "$number - Processing 10.0140 lfN analysis started at $(timestamp)"
php panini.php 10.0140 lfN
((number++))
echo "$number - Processing 10.0139 luw analysis started at $(timestamp)"
php panini.php 10.0139 luw
((number++))
echo "$number - Processing 10.0139 lfw analysis started at $(timestamp)"
php panini.php 10.0139 lfw
((number++))
echo "$number - Processing 10.0139 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0139 ASIrliN
((number++))
echo "$number - Processing 10.0139 viDiliN analysis started at $(timestamp)"
php panini.php 10.0139 viDiliN
((number++))
echo "$number - Processing 10.0139 luN analysis started at $(timestamp)"
php panini.php 10.0139 luN
((number++))
echo "$number - Processing 10.0139 lfN analysis started at $(timestamp)"
php panini.php 10.0139 lfN
((number++))
echo "$number - Processing 01.1047 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1047 ASIrliN
((number++))
echo "$number - Processing 01.1115 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1115 ASIrliN
((number++))
echo "$number - Processing 01.0249 law analysis started at $(timestamp)"
php panini.php 01.0249 law
((number++))
echo "$number - Processing 01.0249 liw analysis started at $(timestamp)"
php panini.php 01.0249 liw
((number++))
echo "$number - Processing 01.0249 luw analysis started at $(timestamp)"
php panini.php 01.0249 luw
((number++))
echo "$number - Processing 01.0249 lfw analysis started at $(timestamp)"
php panini.php 01.0249 lfw
((number++))
echo "$number - Processing 01.0249 low analysis started at $(timestamp)"
php panini.php 01.0249 low
((number++))
echo "$number - Processing 01.0249 laN analysis started at $(timestamp)"
php panini.php 01.0249 laN
((number++))
echo "$number - Processing 01.0249 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0249 ASIrliN
((number++))
echo "$number - Processing 01.0249 viDiliN analysis started at $(timestamp)"
php panini.php 01.0249 viDiliN
((number++))
echo "$number - Processing 01.0249 luN analysis started at $(timestamp)"
php panini.php 01.0249 luN
((number++))
echo "$number - Processing 01.0249 lfN analysis started at $(timestamp)"
php panini.php 01.0249 lfN
((number++))
echo "$number - Processing 01.0250 law analysis started at $(timestamp)"
php panini.php 01.0250 law
((number++))
echo "$number - Processing 01.0250 liw analysis started at $(timestamp)"
php panini.php 01.0250 liw
((number++))
echo "$number - Processing 01.0250 luw analysis started at $(timestamp)"
php panini.php 01.0250 luw
((number++))
echo "$number - Processing 01.0250 lfw analysis started at $(timestamp)"
php panini.php 01.0250 lfw
((number++))
echo "$number - Processing 01.0250 low analysis started at $(timestamp)"
php panini.php 01.0250 low
((number++))
echo "$number - Processing 01.0250 laN analysis started at $(timestamp)"
php panini.php 01.0250 laN
((number++))
echo "$number - Processing 01.0250 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0250 ASIrliN
((number++))
echo "$number - Processing 01.0250 viDiliN analysis started at $(timestamp)"
php panini.php 01.0250 viDiliN
((number++))
echo "$number - Processing 01.0250 luN analysis started at $(timestamp)"
php panini.php 01.0250 luN
((number++))
echo "$number - Processing 01.0250 lfN analysis started at $(timestamp)"
php panini.php 01.0250 lfN
((number++))
echo "$number - Processing 09.0029 law analysis started at $(timestamp)"
php panini.php 09.0029 law
((number++))
echo "$number - Processing 09.0029 liw analysis started at $(timestamp)"
php panini.php 09.0029 liw
((number++))
echo "$number - Processing 09.0029 low analysis started at $(timestamp)"
php panini.php 09.0029 low
((number++))
echo "$number - Processing 09.0029 laN analysis started at $(timestamp)"
php panini.php 09.0029 laN
((number++))
echo "$number - Processing 09.0029 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0029 ASIrliN
((number++))
echo "$number - Processing 09.0029 viDiliN analysis started at $(timestamp)"
php panini.php 09.0029 viDiliN
((number++))
echo "$number - Processing 09.0029 lfN analysis started at $(timestamp)"
php panini.php 09.0029 lfN
((number++))
echo "$number - Processing 01.1050 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1050 ASIrliN
((number++))
echo "$number - Processing 01.1050 luN analysis started at $(timestamp)"
php panini.php 01.1050 luN
((number++))
echo "$number - Processing 01.0433 law analysis started at $(timestamp)"
php panini.php 01.0433 law
((number++))
echo "$number - Processing 01.0433 liw analysis started at $(timestamp)"
php panini.php 01.0433 liw
((number++))
echo "$number - Processing 01.0433 luw analysis started at $(timestamp)"
php panini.php 01.0433 luw
((number++))
echo "$number - Processing 01.0433 lfw analysis started at $(timestamp)"
php panini.php 01.0433 lfw
((number++))
echo "$number - Processing 01.0433 low analysis started at $(timestamp)"
php panini.php 01.0433 low
((number++))
echo "$number - Processing 01.0433 laN analysis started at $(timestamp)"
php panini.php 01.0433 laN
((number++))
echo "$number - Processing 01.0433 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0433 ASIrliN
((number++))
echo "$number - Processing 01.0433 viDiliN analysis started at $(timestamp)"
php panini.php 01.0433 viDiliN
((number++))
echo "$number - Processing 01.0433 luN analysis started at $(timestamp)"
php panini.php 01.0433 luN
((number++))
echo "$number - Processing 01.0433 lfN analysis started at $(timestamp)"
php panini.php 01.0433 lfN
((number++))
echo "$number - Processing 01.0766 law analysis started at $(timestamp)"
php panini.php 01.0766 law
((number++))
echo "$number - Processing 01.0766 liw analysis started at $(timestamp)"
php panini.php 01.0766 liw
((number++))
echo "$number - Processing 01.0766 luw analysis started at $(timestamp)"
php panini.php 01.0766 luw
((number++))
echo "$number - Processing 01.0766 lfw analysis started at $(timestamp)"
php panini.php 01.0766 lfw
((number++))
echo "$number - Processing 01.0766 low analysis started at $(timestamp)"
php panini.php 01.0766 low
((number++))
echo "$number - Processing 01.0766 laN analysis started at $(timestamp)"
php panini.php 01.0766 laN
((number++))
echo "$number - Processing 01.0766 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0766 ASIrliN
((number++))
echo "$number - Processing 01.0766 viDiliN analysis started at $(timestamp)"
php panini.php 01.0766 viDiliN
((number++))
echo "$number - Processing 01.0766 luN analysis started at $(timestamp)"
php panini.php 01.0766 luN
((number++))
echo "$number - Processing 01.0766 lfN analysis started at $(timestamp)"
php panini.php 01.0766 lfN
((number++))
echo "$number - Processing 01.0245 law analysis started at $(timestamp)"
php panini.php 01.0245 law
((number++))
echo "$number - Processing 01.0245 liw analysis started at $(timestamp)"
php panini.php 01.0245 liw
((number++))
echo "$number - Processing 01.0245 luw analysis started at $(timestamp)"
php panini.php 01.0245 luw
((number++))
echo "$number - Processing 01.0245 lfw analysis started at $(timestamp)"
php panini.php 01.0245 lfw
((number++))
echo "$number - Processing 01.0245 low analysis started at $(timestamp)"
php panini.php 01.0245 low
((number++))
echo "$number - Processing 01.0245 laN analysis started at $(timestamp)"
php panini.php 01.0245 laN
((number++))
echo "$number - Processing 01.0245 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0245 ASIrliN
((number++))
echo "$number - Processing 01.0245 viDiliN analysis started at $(timestamp)"
php panini.php 01.0245 viDiliN
((number++))
echo "$number - Processing 01.0245 luN analysis started at $(timestamp)"
php panini.php 01.0245 luN
((number++))
echo "$number - Processing 01.0245 lfN analysis started at $(timestamp)"
php panini.php 01.0245 lfN
((number++))
echo "$number - Processing 01.0246 law analysis started at $(timestamp)"
php panini.php 01.0246 law
((number++))
echo "$number - Processing 01.0246 liw analysis started at $(timestamp)"
php panini.php 01.0246 liw
((number++))
echo "$number - Processing 01.0246 luw analysis started at $(timestamp)"
php panini.php 01.0246 luw
((number++))
echo "$number - Processing 01.0246 lfw analysis started at $(timestamp)"
php panini.php 01.0246 lfw
((number++))
echo "$number - Processing 01.0246 low analysis started at $(timestamp)"
php panini.php 01.0246 low
((number++))
echo "$number - Processing 01.0246 laN analysis started at $(timestamp)"
php panini.php 01.0246 laN
((number++))
echo "$number - Processing 01.0246 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0246 ASIrliN
((number++))
echo "$number - Processing 01.0246 viDiliN analysis started at $(timestamp)"
php panini.php 01.0246 viDiliN
((number++))
echo "$number - Processing 01.0246 luN analysis started at $(timestamp)"
php panini.php 01.0246 luN
((number++))
echo "$number - Processing 01.0246 lfN analysis started at $(timestamp)"
php panini.php 01.0246 lfN
((number++))
echo "$number - Processing 01.0529 law analysis started at $(timestamp)"
php panini.php 01.0529 law
((number++))
echo "$number - Processing 01.0529 liw analysis started at $(timestamp)"
php panini.php 01.0529 liw
((number++))
echo "$number - Processing 01.0529 luw analysis started at $(timestamp)"
php panini.php 01.0529 luw
((number++))
echo "$number - Processing 01.0529 lfw analysis started at $(timestamp)"
php panini.php 01.0529 lfw
((number++))
echo "$number - Processing 01.0529 low analysis started at $(timestamp)"
php panini.php 01.0529 low
((number++))
echo "$number - Processing 01.0529 laN analysis started at $(timestamp)"
php panini.php 01.0529 laN
((number++))
echo "$number - Processing 01.0529 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0529 ASIrliN
((number++))
echo "$number - Processing 01.0529 viDiliN analysis started at $(timestamp)"
php panini.php 01.0529 viDiliN
((number++))
echo "$number - Processing 01.0529 luN analysis started at $(timestamp)"
php panini.php 01.0529 luN
((number++))
echo "$number - Processing 01.0529 lfN analysis started at $(timestamp)"
php panini.php 01.0529 lfN
((number++))
echo "$number - Processing 10.0060 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0060 ASIrliN
((number++))
echo "$number - Processing 09.0270 law analysis started at $(timestamp)"
php panini.php 09.0270 law
((number++))
echo "$number - Processing 09.0270 liw analysis started at $(timestamp)"
php panini.php 09.0270 liw
((number++))
echo "$number - Processing 09.0270 luw analysis started at $(timestamp)"
php panini.php 09.0270 luw
((number++))
echo "$number - Processing 09.0270 lfw analysis started at $(timestamp)"
php panini.php 09.0270 lfw
((number++))
echo "$number - Processing 09.0270 low analysis started at $(timestamp)"
php panini.php 09.0270 low
((number++))
echo "$number - Processing 09.0270 laN analysis started at $(timestamp)"
php panini.php 09.0270 laN
((number++))
echo "$number - Processing 09.0270 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0270 ASIrliN
((number++))
echo "$number - Processing 09.0270 viDiliN analysis started at $(timestamp)"
php panini.php 09.0270 viDiliN
((number++))
echo "$number - Processing 09.0270 luN analysis started at $(timestamp)"
php panini.php 09.0270 luN
((number++))
echo "$number - Processing 09.0270 lfN analysis started at $(timestamp)"
php panini.php 09.0270 lfN
((number++))
echo "$number - Processing 01.0764 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0764 ASIrliN
((number++))
echo "$number - Processing 01.0323 law analysis started at $(timestamp)"
php panini.php 01.0323 law
((number++))
echo "$number - Processing 01.0323 liw analysis started at $(timestamp)"
php panini.php 01.0323 liw
((number++))
echo "$number - Processing 01.0323 low analysis started at $(timestamp)"
php panini.php 01.0323 low
((number++))
echo "$number - Processing 01.0323 laN analysis started at $(timestamp)"
php panini.php 01.0323 laN
((number++))
echo "$number - Processing 01.0323 viDiliN analysis started at $(timestamp)"
php panini.php 01.0323 viDiliN
((number++))
echo "$number - Processing 01.0323 luN analysis started at $(timestamp)"
php panini.php 01.0323 luN
((number++))
echo "$number - Processing 01.0253 law analysis started at $(timestamp)"
php panini.php 01.0253 law
((number++))
echo "$number - Processing 01.0253 liw analysis started at $(timestamp)"
php panini.php 01.0253 liw
((number++))
echo "$number - Processing 01.0253 luw analysis started at $(timestamp)"
php panini.php 01.0253 luw
((number++))
echo "$number - Processing 01.0253 lfw analysis started at $(timestamp)"
php panini.php 01.0253 lfw
((number++))
echo "$number - Processing 01.0253 low analysis started at $(timestamp)"
php panini.php 01.0253 low
((number++))
echo "$number - Processing 01.0253 laN analysis started at $(timestamp)"
php panini.php 01.0253 laN
((number++))
echo "$number - Processing 01.0253 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0253 ASIrliN
((number++))
echo "$number - Processing 01.0253 viDiliN analysis started at $(timestamp)"
php panini.php 01.0253 viDiliN
((number++))
echo "$number - Processing 01.0253 luN analysis started at $(timestamp)"
php panini.php 01.0253 luN
((number++))
echo "$number - Processing 01.0253 lfN analysis started at $(timestamp)"
php panini.php 01.0253 lfN
((number++))
echo "$number - Processing 06.0135 law analysis started at $(timestamp)"
php panini.php 06.0135 law
((number++))
echo "$number - Processing 06.0135 luw analysis started at $(timestamp)"
php panini.php 06.0135 luw
((number++))
echo "$number - Processing 06.0135 lfw analysis started at $(timestamp)"
php panini.php 06.0135 lfw
((number++))
echo "$number - Processing 06.0135 low analysis started at $(timestamp)"
php panini.php 06.0135 low
((number++))
echo "$number - Processing 06.0135 laN analysis started at $(timestamp)"
php panini.php 06.0135 laN
((number++))
echo "$number - Processing 06.0135 viDiliN analysis started at $(timestamp)"
php panini.php 06.0135 viDiliN
((number++))
echo "$number - Processing 06.0135 luN analysis started at $(timestamp)"
php panini.php 06.0135 luN
((number++))
echo "$number - Processing 06.0135 lfN analysis started at $(timestamp)"
php panini.php 06.0135 lfN
((number++))
echo "$number - Processing 01.1093 low analysis started at $(timestamp)"
php panini.php 01.1093 low
((number++))
echo "$number - Processing 01.0084 law analysis started at $(timestamp)"
php panini.php 01.0084 law
((number++))
echo "$number - Processing 01.0084 liw analysis started at $(timestamp)"
php panini.php 01.0084 liw
((number++))
echo "$number - Processing 01.0084 low analysis started at $(timestamp)"
php panini.php 01.0084 low
((number++))
echo "$number - Processing 01.0084 laN analysis started at $(timestamp)"
php panini.php 01.0084 laN
((number++))
echo "$number - Processing 01.0084 viDiliN analysis started at $(timestamp)"
php panini.php 01.0084 viDiliN
((number++))
echo "$number - Processing 01.0084 luN analysis started at $(timestamp)"
php panini.php 01.0084 luN
((number++))
echo "$number - Processing 01.1055 lfN analysis started at $(timestamp)"
php panini.php 01.1055 lfN
((number++))
echo "$number - Processing 01.0858 liw analysis started at $(timestamp)"
php panini.php 01.0858 liw
((number++))
echo "$number - Processing 01.0858 luw analysis started at $(timestamp)"
php panini.php 01.0858 luw
((number++))
echo "$number - Processing 01.0858 lfw analysis started at $(timestamp)"
php panini.php 01.0858 lfw
((number++))
echo "$number - Processing 01.0858 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0858 ASIrliN
((number++))
echo "$number - Processing 01.0858 luN analysis started at $(timestamp)"
php panini.php 01.0858 luN
((number++))
echo "$number - Processing 01.0858 lfN analysis started at $(timestamp)"
php panini.php 01.0858 lfN
((number++))
echo "$number - Processing 01.0143 liw analysis started at $(timestamp)"
php panini.php 01.0143 liw
((number++))
echo "$number - Processing 01.0143 lfN analysis started at $(timestamp)"
php panini.php 01.0143 lfN
((number++))
echo "$number - Processing 10.0322 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0322 ASIrliN
((number++))
echo "$number - Processing 10.0018 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0018 ASIrliN
((number++))
echo "$number - Processing 10.0309 law analysis started at $(timestamp)"
php panini.php 10.0309 law
((number++))
echo "$number - Processing 10.0309 liw analysis started at $(timestamp)"
php panini.php 10.0309 liw
((number++))
echo "$number - Processing 10.0309 luw analysis started at $(timestamp)"
php panini.php 10.0309 luw
((number++))
echo "$number - Processing 10.0309 lfw analysis started at $(timestamp)"
php panini.php 10.0309 lfw
((number++))
echo "$number - Processing 10.0309 low analysis started at $(timestamp)"
php panini.php 10.0309 low
((number++))
echo "$number - Processing 10.0309 laN analysis started at $(timestamp)"
php panini.php 10.0309 laN
((number++))
echo "$number - Processing 10.0309 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0309 ASIrliN
((number++))
echo "$number - Processing 10.0309 viDiliN analysis started at $(timestamp)"
php panini.php 10.0309 viDiliN
((number++))
echo "$number - Processing 10.0309 luN analysis started at $(timestamp)"
php panini.php 10.0309 luN
((number++))
echo "$number - Processing 10.0309 lfN analysis started at $(timestamp)"
php panini.php 10.0309 lfN
((number++))
echo "$number - Processing 09.0056 luN analysis started at $(timestamp)"
php panini.php 09.0056 luN
((number++))
echo "$number - Processing 01.0855 luN analysis started at $(timestamp)"
php panini.php 01.0855 luN
((number++))
echo "$number - Processing 01.0552 luN analysis started at $(timestamp)"
php panini.php 01.0552 luN
((number++))
echo "$number - Processing 01.0714 liw analysis started at $(timestamp)"
php panini.php 01.0714 liw
((number++))
echo "$number - Processing 01.0714 luN analysis started at $(timestamp)"
php panini.php 01.0714 luN
((number++))
echo "$number - Processing 04.0062 law analysis started at $(timestamp)"
php panini.php 04.0062 law
((number++))
echo "$number - Processing 04.0062 low analysis started at $(timestamp)"
php panini.php 04.0062 low
((number++))
echo "$number - Processing 04.0062 laN analysis started at $(timestamp)"
php panini.php 04.0062 laN
((number++))
echo "$number - Processing 04.0062 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0062 ASIrliN
((number++))
echo "$number - Processing 01.0006 law analysis started at $(timestamp)"
php panini.php 01.0006 law
((number++))
echo "$number - Processing 01.0006 liw analysis started at $(timestamp)"
php panini.php 01.0006 liw
((number++))
echo "$number - Processing 01.0006 low analysis started at $(timestamp)"
php panini.php 01.0006 low
((number++))
echo "$number - Processing 01.0006 laN analysis started at $(timestamp)"
php panini.php 01.0006 laN
((number++))
echo "$number - Processing 01.0006 viDiliN analysis started at $(timestamp)"
php panini.php 01.0006 viDiliN
((number++))
echo "$number - Processing 01.0006 luN analysis started at $(timestamp)"
php panini.php 01.0006 luN
((number++))
echo "$number - Processing 01.0712 liw analysis started at $(timestamp)"
php panini.php 01.0712 liw
((number++))
echo "$number - Processing 01.0712 luN analysis started at $(timestamp)"
php panini.php 01.0712 luN
((number++))
echo "$number - Processing 02.0017 liw analysis started at $(timestamp)"
php panini.php 02.0017 liw
((number++))
echo "$number - Processing 02.0017 luN analysis started at $(timestamp)"
php panini.php 02.0017 luN
((number++))
echo "$number - Processing 03.0012 law analysis started at $(timestamp)"
php panini.php 03.0012 law
((number++))
echo "$number - Processing 03.0012 low analysis started at $(timestamp)"
php panini.php 03.0012 low
((number++))
echo "$number - Processing 03.0012 laN analysis started at $(timestamp)"
php panini.php 03.0012 laN
((number++))
echo "$number - Processing 03.0012 viDiliN analysis started at $(timestamp)"
php panini.php 03.0012 viDiliN
((number++))
echo "$number - Processing 02.0018 luN analysis started at $(timestamp)"
php panini.php 02.0018 luN
((number++))
echo "$number - Processing 01.1012 liw analysis started at $(timestamp)"
php panini.php 01.1012 liw
((number++))
echo "$number - Processing 01.1012 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1012 ASIrliN
((number++))
echo "$number - Processing 01.1012 luN analysis started at $(timestamp)"
php panini.php 01.1012 luN
((number++))
echo "$number - Processing 01.0796 law analysis started at $(timestamp)"
php panini.php 01.0796 law
((number++))
echo "$number - Processing 01.0796 liw analysis started at $(timestamp)"
php panini.php 01.0796 liw
((number++))
echo "$number - Processing 01.0796 luw analysis started at $(timestamp)"
php panini.php 01.0796 luw
((number++))
echo "$number - Processing 01.0796 lfw analysis started at $(timestamp)"
php panini.php 01.0796 lfw
((number++))
echo "$number - Processing 01.0796 low analysis started at $(timestamp)"
php panini.php 01.0796 low
((number++))
echo "$number - Processing 01.0796 laN analysis started at $(timestamp)"
php panini.php 01.0796 laN
((number++))
echo "$number - Processing 01.0796 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0796 ASIrliN
((number++))
echo "$number - Processing 01.0796 viDiliN analysis started at $(timestamp)"
php panini.php 01.0796 viDiliN
((number++))
echo "$number - Processing 01.0796 luN analysis started at $(timestamp)"
php panini.php 01.0796 luN
((number++))
echo "$number - Processing 01.0796 lfN analysis started at $(timestamp)"
php panini.php 01.0796 lfN
((number++))
echo "$number - Processing 01.1049 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1049 ASIrliN
((number++))
echo "$number - Processing 09.0030 liw analysis started at $(timestamp)"
php panini.php 09.0030 liw
((number++))
echo "$number - Processing 09.0030 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0030 ASIrliN
((number++))
echo "$number - Processing 01.0921 law analysis started at $(timestamp)"
php panini.php 01.0921 law
((number++))
echo "$number - Processing 01.0921 liw analysis started at $(timestamp)"
php panini.php 01.0921 liw
((number++))
echo "$number - Processing 01.0921 low analysis started at $(timestamp)"
php panini.php 01.0921 low
((number++))
echo "$number - Processing 01.0921 laN analysis started at $(timestamp)"
php panini.php 01.0921 laN
((number++))
echo "$number - Processing 01.0921 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0921 ASIrliN
((number++))
echo "$number - Processing 01.0921 viDiliN analysis started at $(timestamp)"
php panini.php 01.0921 viDiliN
((number++))
echo "$number - Processing 01.1013 luN analysis started at $(timestamp)"
php panini.php 01.1013 luN
((number++))
echo "$number - Processing 01.0704 law analysis started at $(timestamp)"
php panini.php 01.0704 law
((number++))
echo "$number - Processing 01.0704 liw analysis started at $(timestamp)"
php panini.php 01.0704 liw
((number++))
echo "$number - Processing 01.0704 low analysis started at $(timestamp)"
php panini.php 01.0704 low
((number++))
echo "$number - Processing 01.0704 laN analysis started at $(timestamp)"
php panini.php 01.0704 laN
((number++))
echo "$number - Processing 01.0704 viDiliN analysis started at $(timestamp)"
php panini.php 01.0704 viDiliN
((number++))
echo "$number - Processing 01.0704 luN analysis started at $(timestamp)"
php panini.php 01.0704 luN
((number++))
echo "$number - Processing 01.0757 lfN analysis started at $(timestamp)"
php panini.php 01.0757 lfN
((number++))
echo "$number - Processing 01.1151 law analysis started at $(timestamp)"
php panini.php 01.1151 law
((number++))
echo "$number - Processing 01.1151 liw analysis started at $(timestamp)"
php panini.php 01.1151 liw
((number++))
echo "$number - Processing 01.1151 low analysis started at $(timestamp)"
php panini.php 01.1151 low
((number++))
echo "$number - Processing 01.1151 laN analysis started at $(timestamp)"
php panini.php 01.1151 laN
((number++))
echo "$number - Processing 01.1151 viDiliN analysis started at $(timestamp)"
php panini.php 01.1151 viDiliN
((number++))
echo "$number - Processing 01.1151 luN analysis started at $(timestamp)"
php panini.php 01.1151 luN
((number++))
echo "$number - Processing 01.0198 liw analysis started at $(timestamp)"
php panini.php 01.0198 liw
((number++))
echo "$number - Processing 01.0198 luN analysis started at $(timestamp)"
php panini.php 01.0198 luN
((number++))
echo "$number - Processing 01.0507 luN analysis started at $(timestamp)"
php panini.php 01.0507 luN
((number++))
echo "$number - Processing 04.0065 luN analysis started at $(timestamp)"
php panini.php 04.0065 luN
((number++))
echo "$number - Processing 01.0508 luN analysis started at $(timestamp)"
php panini.php 01.0508 luN
((number++))
echo "$number - Processing 01.0548 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0548 ASIrliN
((number++))
echo "$number - Processing 01.0478 lfN analysis started at $(timestamp)"
php panini.php 01.0478 lfN
((number++))
echo "$number - Processing 01.0658 law analysis started at $(timestamp)"
php panini.php 01.0658 law
((number++))
echo "$number - Processing 01.0658 liw analysis started at $(timestamp)"
php panini.php 01.0658 liw
((number++))
echo "$number - Processing 01.0658 luw analysis started at $(timestamp)"
php panini.php 01.0658 luw
((number++))
echo "$number - Processing 01.0658 lfw analysis started at $(timestamp)"
php panini.php 01.0658 lfw
((number++))
echo "$number - Processing 01.0658 low analysis started at $(timestamp)"
php panini.php 01.0658 low
((number++))
echo "$number - Processing 01.0658 laN analysis started at $(timestamp)"
php panini.php 01.0658 laN
((number++))
echo "$number - Processing 01.0658 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0658 ASIrliN
((number++))
echo "$number - Processing 01.0658 viDiliN analysis started at $(timestamp)"
php panini.php 01.0658 viDiliN
((number++))
echo "$number - Processing 01.0658 luN analysis started at $(timestamp)"
php panini.php 01.0658 luN
((number++))
echo "$number - Processing 01.0658 lfN analysis started at $(timestamp)"
php panini.php 01.0658 lfN
((number++))
echo "$number - Processing 01.0973 law analysis started at $(timestamp)"
php panini.php 01.0973 law
((number++))
echo "$number - Processing 01.0973 liw analysis started at $(timestamp)"
php panini.php 01.0973 liw
((number++))
echo "$number - Processing 01.0973 luw analysis started at $(timestamp)"
php panini.php 01.0973 luw
((number++))
echo "$number - Processing 01.0973 lfw analysis started at $(timestamp)"
php panini.php 01.0973 lfw
((number++))
echo "$number - Processing 01.0973 low analysis started at $(timestamp)"
php panini.php 01.0973 low
((number++))
echo "$number - Processing 01.0973 laN analysis started at $(timestamp)"
php panini.php 01.0973 laN
((number++))
echo "$number - Processing 01.0973 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0973 ASIrliN
((number++))
echo "$number - Processing 01.0973 viDiliN analysis started at $(timestamp)"
php panini.php 01.0973 viDiliN
((number++))
echo "$number - Processing 01.0973 luN analysis started at $(timestamp)"
php panini.php 01.0973 luN
((number++))
echo "$number - Processing 01.0973 lfN analysis started at $(timestamp)"
php panini.php 01.0973 lfN
((number++))
echo "$number - Processing 10.0423 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0423 ASIrliN
((number++))
echo "$number - Processing 01.1074 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1074 ASIrliN
((number++))
echo "$number - Processing 10.0061 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0061 ASIrliN
((number++))
echo "$number - Processing 10.0046 law analysis started at $(timestamp)"
php panini.php 10.0046 law
((number++))
echo "$number - Processing 10.0046 liw analysis started at $(timestamp)"
php panini.php 10.0046 liw
((number++))
echo "$number - Processing 10.0046 luw analysis started at $(timestamp)"
php panini.php 10.0046 luw
((number++))
echo "$number - Processing 10.0046 lfw analysis started at $(timestamp)"
php panini.php 10.0046 lfw
((number++))
echo "$number - Processing 10.0046 low analysis started at $(timestamp)"
php panini.php 10.0046 low
((number++))
echo "$number - Processing 10.0046 laN analysis started at $(timestamp)"
php panini.php 10.0046 laN
((number++))
echo "$number - Processing 10.0046 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0046 ASIrliN
((number++))
echo "$number - Processing 10.0046 viDiliN analysis started at $(timestamp)"
php panini.php 10.0046 viDiliN
((number++))
echo "$number - Processing 10.0046 luN analysis started at $(timestamp)"
php panini.php 10.0046 luN
((number++))
echo "$number - Processing 10.0046 lfN analysis started at $(timestamp)"
php panini.php 10.0046 lfN
((number++))
echo "$number - Processing 01.0393 law analysis started at $(timestamp)"
php panini.php 01.0393 law
((number++))
echo "$number - Processing 01.0393 liw analysis started at $(timestamp)"
php panini.php 01.0393 liw
((number++))
echo "$number - Processing 01.0393 luw analysis started at $(timestamp)"
php panini.php 01.0393 luw
((number++))
echo "$number - Processing 01.0393 lfw analysis started at $(timestamp)"
php panini.php 01.0393 lfw
((number++))
echo "$number - Processing 01.0393 low analysis started at $(timestamp)"
php panini.php 01.0393 low
((number++))
echo "$number - Processing 01.0393 laN analysis started at $(timestamp)"
php panini.php 01.0393 laN
((number++))
echo "$number - Processing 01.0393 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0393 ASIrliN
((number++))
echo "$number - Processing 01.0393 viDiliN analysis started at $(timestamp)"
php panini.php 01.0393 viDiliN
((number++))
echo "$number - Processing 01.0393 luN analysis started at $(timestamp)"
php panini.php 01.0393 luN
((number++))
echo "$number - Processing 01.0393 lfN analysis started at $(timestamp)"
php panini.php 01.0393 lfN
((number++))
echo "$number - Processing 10.0186 law analysis started at $(timestamp)"
php panini.php 10.0186 law
((number++))
echo "$number - Processing 10.0186 liw analysis started at $(timestamp)"
php panini.php 10.0186 liw
((number++))
echo "$number - Processing 10.0186 luw analysis started at $(timestamp)"
php panini.php 10.0186 luw
((number++))
echo "$number - Processing 10.0186 lfw analysis started at $(timestamp)"
php panini.php 10.0186 lfw
((number++))
echo "$number - Processing 10.0186 low analysis started at $(timestamp)"
php panini.php 10.0186 low
((number++))
echo "$number - Processing 10.0186 laN analysis started at $(timestamp)"
php panini.php 10.0186 laN
((number++))
echo "$number - Processing 10.0186 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0186 ASIrliN
((number++))
echo "$number - Processing 10.0186 viDiliN analysis started at $(timestamp)"
php panini.php 10.0186 viDiliN
((number++))
echo "$number - Processing 10.0186 luN analysis started at $(timestamp)"
php panini.php 10.0186 luN
((number++))
echo "$number - Processing 10.0186 lfN analysis started at $(timestamp)"
php panini.php 10.0186 lfN
((number++))
echo "$number - Processing 10.0173 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0173 ASIrliN
((number++))
echo "$number - Processing 10.0017 luN analysis started at $(timestamp)"
php panini.php 10.0017 luN
((number++))
echo "$number - Processing 01.0367 liw analysis started at $(timestamp)"
php panini.php 01.0367 liw
((number++))
echo "$number - Processing 01.0367 luw analysis started at $(timestamp)"
php panini.php 01.0367 luw
((number++))
echo "$number - Processing 01.0367 lfw analysis started at $(timestamp)"
php panini.php 01.0367 lfw
((number++))
echo "$number - Processing 01.0367 low analysis started at $(timestamp)"
php panini.php 01.0367 low
((number++))
echo "$number - Processing 01.0367 laN analysis started at $(timestamp)"
php panini.php 01.0367 laN
((number++))
echo "$number - Processing 01.0367 viDiliN analysis started at $(timestamp)"
php panini.php 01.0367 viDiliN
((number++))
echo "$number - Processing 01.0367 luN analysis started at $(timestamp)"
php panini.php 01.0367 luN
((number++))
echo "$number - Processing 01.0367 lfN analysis started at $(timestamp)"
php panini.php 01.0367 lfN
((number++))
echo "$number - Processing 06.0283 luN analysis started at $(timestamp)"
php panini.php 06.0283 luN
((number++))
echo "$number - Processing 10.0035 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0035 ASIrliN
((number++))
echo "$number - Processing 01.0365 law analysis started at $(timestamp)"
php panini.php 01.0365 law
((number++))
echo "$number - Processing 01.0365 liw analysis started at $(timestamp)"
php panini.php 01.0365 liw
((number++))
echo "$number - Processing 01.0365 luw analysis started at $(timestamp)"
php panini.php 01.0365 luw
((number++))
echo "$number - Processing 01.0365 lfw analysis started at $(timestamp)"
php panini.php 01.0365 lfw
((number++))
echo "$number - Processing 01.0365 low analysis started at $(timestamp)"
php panini.php 01.0365 low
((number++))
echo "$number - Processing 01.0365 laN analysis started at $(timestamp)"
php panini.php 01.0365 laN
((number++))
echo "$number - Processing 01.0365 viDiliN analysis started at $(timestamp)"
php panini.php 01.0365 viDiliN
((number++))
echo "$number - Processing 01.0365 luN analysis started at $(timestamp)"
php panini.php 01.0365 luN
((number++))
echo "$number - Processing 01.0365 lfN analysis started at $(timestamp)"
php panini.php 01.0365 lfN
((number++))
echo "$number - Processing 06.0114 liw analysis started at $(timestamp)"
php panini.php 06.0114 liw
((number++))
echo "$number - Processing 06.0114 luN analysis started at $(timestamp)"
php panini.php 06.0114 luN
((number++))
echo "$number - Processing 10.0059 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0059 ASIrliN
((number++))
echo "$number - Processing 10.0323 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0323 ASIrliN
((number++))
echo "$number - Processing 01.0657 liw analysis started at $(timestamp)"
php panini.php 01.0657 liw
((number++))
echo "$number - Processing 01.0657 low analysis started at $(timestamp)"
php panini.php 01.0657 low
((number++))
echo "$number - Processing 01.0975 law analysis started at $(timestamp)"
php panini.php 01.0975 law
((number++))
echo "$number - Processing 01.0975 liw analysis started at $(timestamp)"
php panini.php 01.0975 liw
((number++))
echo "$number - Processing 01.0975 luw analysis started at $(timestamp)"
php panini.php 01.0975 luw
((number++))
echo "$number - Processing 01.0975 lfw analysis started at $(timestamp)"
php panini.php 01.0975 lfw
((number++))
echo "$number - Processing 01.0975 low analysis started at $(timestamp)"
php panini.php 01.0975 low
((number++))
echo "$number - Processing 01.0975 laN analysis started at $(timestamp)"
php panini.php 01.0975 laN
((number++))
echo "$number - Processing 01.0975 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0975 ASIrliN
((number++))
echo "$number - Processing 01.0975 viDiliN analysis started at $(timestamp)"
php panini.php 01.0975 viDiliN
((number++))
echo "$number - Processing 01.0975 luN analysis started at $(timestamp)"
php panini.php 01.0975 luN
((number++))
echo "$number - Processing 01.0975 lfN analysis started at $(timestamp)"
php panini.php 01.0975 lfN
((number++))
echo "$number - Processing 04.0016 law analysis started at $(timestamp)"
php panini.php 04.0016 law
((number++))
echo "$number - Processing 04.0016 liw analysis started at $(timestamp)"
php panini.php 04.0016 liw
((number++))
echo "$number - Processing 04.0016 luw analysis started at $(timestamp)"
php panini.php 04.0016 luw
((number++))
echo "$number - Processing 04.0016 lfw analysis started at $(timestamp)"
php panini.php 04.0016 lfw
((number++))
echo "$number - Processing 04.0016 low analysis started at $(timestamp)"
php panini.php 04.0016 low
((number++))
echo "$number - Processing 04.0016 laN analysis started at $(timestamp)"
php panini.php 04.0016 laN
((number++))
echo "$number - Processing 04.0016 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0016 ASIrliN
((number++))
echo "$number - Processing 04.0016 viDiliN analysis started at $(timestamp)"
php panini.php 04.0016 viDiliN
((number++))
echo "$number - Processing 04.0016 luN analysis started at $(timestamp)"
php panini.php 04.0016 luN
((number++))
echo "$number - Processing 04.0016 lfN analysis started at $(timestamp)"
php panini.php 04.0016 lfN
((number++))
echo "$number - Processing 09.0014 laN analysis started at $(timestamp)"
php panini.php 09.0014 laN
((number++))
echo "$number - Processing 10.0144 luN analysis started at $(timestamp)"
php panini.php 10.0144 luN
((number++))
echo "$number - Processing 04.0334 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0334 ASIrliN
((number++))
echo "$number - Processing 04.0334 luN analysis started at $(timestamp)"
php panini.php 04.0334 luN
((number++))
echo "$number - Processing 10.0132 liw analysis started at $(timestamp)"
php panini.php 10.0132 liw
((number++))
echo "$number - Processing 10.0132 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0132 ASIrliN
((number++))
echo "$number - Processing 10.0131 luN analysis started at $(timestamp)"
php panini.php 10.0131 luN
((number++))
echo "$number - Processing 03.0005 viDiliN analysis started at $(timestamp)"
php panini.php 03.0005 viDiliN
((number++))
echo "$number - Processing 05.0013 laN analysis started at $(timestamp)"
php panini.php 05.0013 laN
((number++))
echo "$number - Processing 06.0138 liw analysis started at $(timestamp)"
php panini.php 06.0138 liw
((number++))
echo "$number - Processing 06.0138 luw analysis started at $(timestamp)"
php panini.php 06.0138 luw
((number++))
echo "$number - Processing 06.0138 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0138 ASIrliN
((number++))
echo "$number - Processing 06.0138 luN analysis started at $(timestamp)"
php panini.php 06.0138 luN
((number++))
echo "$number - Processing 02.0025 viDiliN analysis started at $(timestamp)"
php panini.php 02.0025 viDiliN
((number++))
echo "$number - Processing 02.0021 law analysis started at $(timestamp)"
php panini.php 02.0021 law
((number++))
echo "$number - Processing 02.0021 liw analysis started at $(timestamp)"
php panini.php 02.0021 liw
((number++))
echo "$number - Processing 02.0021 luw analysis started at $(timestamp)"
php panini.php 02.0021 luw
((number++))
echo "$number - Processing 02.0021 lfw analysis started at $(timestamp)"
php panini.php 02.0021 lfw
((number++))
echo "$number - Processing 02.0021 low analysis started at $(timestamp)"
php panini.php 02.0021 low
((number++))
echo "$number - Processing 02.0021 laN analysis started at $(timestamp)"
php panini.php 02.0021 laN
((number++))
echo "$number - Processing 02.0021 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0021 ASIrliN
((number++))
echo "$number - Processing 02.0021 viDiliN analysis started at $(timestamp)"
php panini.php 02.0021 viDiliN
((number++))
echo "$number - Processing 02.0021 luN analysis started at $(timestamp)"
php panini.php 02.0021 luN
((number++))
echo "$number - Processing 02.0021 lfN analysis started at $(timestamp)"
php panini.php 02.0021 lfN
((number++))
echo "$number - Processing 01.0802 law analysis started at $(timestamp)"
php panini.php 01.0802 law
((number++))
echo "$number - Processing 01.0802 liw analysis started at $(timestamp)"
php panini.php 01.0802 liw
((number++))
echo "$number - Processing 01.0802 luw analysis started at $(timestamp)"
php panini.php 01.0802 luw
((number++))
echo "$number - Processing 01.0802 lfw analysis started at $(timestamp)"
php panini.php 01.0802 lfw
((number++))
echo "$number - Processing 01.0802 low analysis started at $(timestamp)"
php panini.php 01.0802 low
((number++))
echo "$number - Processing 01.0802 laN analysis started at $(timestamp)"
php panini.php 01.0802 laN
((number++))
echo "$number - Processing 01.0802 viDiliN analysis started at $(timestamp)"
php panini.php 01.0802 viDiliN
((number++))
echo "$number - Processing 10.0004 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0004 ASIrliN
((number++))
echo "$number - Processing 03.0004 viDiliN analysis started at $(timestamp)"
php panini.php 03.0004 viDiliN
((number++))
echo "$number - Processing 01.0700 luN analysis started at $(timestamp)"
php panini.php 01.0700 luN
((number++))
echo "$number - Processing 04.0119 law analysis started at $(timestamp)"
php panini.php 04.0119 law
((number++))
echo "$number - Processing 04.0119 liw analysis started at $(timestamp)"
php panini.php 04.0119 liw
((number++))
echo "$number - Processing 04.0119 luw analysis started at $(timestamp)"
php panini.php 04.0119 luw
((number++))
echo "$number - Processing 04.0119 lfw analysis started at $(timestamp)"
php panini.php 04.0119 lfw
((number++))
echo "$number - Processing 04.0119 low analysis started at $(timestamp)"
php panini.php 04.0119 low
((number++))
echo "$number - Processing 04.0119 laN analysis started at $(timestamp)"
php panini.php 04.0119 laN
((number++))
echo "$number - Processing 04.0119 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0119 ASIrliN
((number++))
echo "$number - Processing 04.0119 viDiliN analysis started at $(timestamp)"
php panini.php 04.0119 viDiliN
((number++))
echo "$number - Processing 04.0119 luN analysis started at $(timestamp)"
php panini.php 04.0119 luN
((number++))
echo "$number - Processing 04.0119 lfN analysis started at $(timestamp)"
php panini.php 04.0119 lfN
((number++))
echo "$number - Processing 04.0120 law analysis started at $(timestamp)"
php panini.php 04.0120 law
((number++))
echo "$number - Processing 04.0120 liw analysis started at $(timestamp)"
php panini.php 04.0120 liw
((number++))
echo "$number - Processing 04.0120 luw analysis started at $(timestamp)"
php panini.php 04.0120 luw
((number++))
echo "$number - Processing 04.0120 lfw analysis started at $(timestamp)"
php panini.php 04.0120 lfw
((number++))
echo "$number - Processing 04.0120 low analysis started at $(timestamp)"
php panini.php 04.0120 low
((number++))
echo "$number - Processing 04.0120 laN analysis started at $(timestamp)"
php panini.php 04.0120 laN
((number++))
echo "$number - Processing 04.0120 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0120 ASIrliN
((number++))
echo "$number - Processing 04.0120 viDiliN analysis started at $(timestamp)"
php panini.php 04.0120 viDiliN
((number++))
echo "$number - Processing 04.0120 luN analysis started at $(timestamp)"
php panini.php 04.0120 luN
((number++))
echo "$number - Processing 04.0120 lfN analysis started at $(timestamp)"
php panini.php 04.0120 lfN
((number++))
echo "$number - Processing 06.0149 law analysis started at $(timestamp)"
php panini.php 06.0149 law
((number++))
echo "$number - Processing 06.0149 liw analysis started at $(timestamp)"
php panini.php 06.0149 liw
((number++))
echo "$number - Processing 06.0149 low analysis started at $(timestamp)"
php panini.php 06.0149 low
((number++))
echo "$number - Processing 06.0149 laN analysis started at $(timestamp)"
php panini.php 06.0149 laN
((number++))
echo "$number - Processing 10.0027 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0027 ASIrliN
((number++))
echo "$number - Processing 01.0870 liw analysis started at $(timestamp)"
php panini.php 01.0870 liw
((number++))
echo "$number - Processing 10.0039 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0039 ASIrliN
((number++))
echo "$number - Processing 10.0039 luN analysis started at $(timestamp)"
php panini.php 10.0039 luN
((number++))
echo "$number - Processing 01.0706 luN analysis started at $(timestamp)"
php panini.php 01.0706 luN
((number++))
echo "$number - Processing 01.0528 law analysis started at $(timestamp)"
php panini.php 01.0528 law
((number++))
echo "$number - Processing 01.0528 liw analysis started at $(timestamp)"
php panini.php 01.0528 liw
((number++))
echo "$number - Processing 01.0528 luw analysis started at $(timestamp)"
php panini.php 01.0528 luw
((number++))
echo "$number - Processing 01.0528 lfw analysis started at $(timestamp)"
php panini.php 01.0528 lfw
((number++))
echo "$number - Processing 01.0528 low analysis started at $(timestamp)"
php panini.php 01.0528 low
((number++))
echo "$number - Processing 01.0528 laN analysis started at $(timestamp)"
php panini.php 01.0528 laN
((number++))
echo "$number - Processing 01.0528 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0528 ASIrliN
((number++))
echo "$number - Processing 01.0528 viDiliN analysis started at $(timestamp)"
php panini.php 01.0528 viDiliN
((number++))
echo "$number - Processing 01.0528 luN analysis started at $(timestamp)"
php panini.php 01.0528 luN
((number++))
echo "$number - Processing 01.0528 lfN analysis started at $(timestamp)"
php panini.php 01.0528 lfN
((number++))
echo "$number - Processing 01.1005 laN analysis started at $(timestamp)"
php panini.php 01.1005 laN
((number++))
echo "$number - Processing 01.1040 law analysis started at $(timestamp)"
php panini.php 01.1040 law
((number++))
echo "$number - Processing 01.1040 liw analysis started at $(timestamp)"
php panini.php 01.1040 liw
((number++))
echo "$number - Processing 01.1040 luw analysis started at $(timestamp)"
php panini.php 01.1040 luw
((number++))
echo "$number - Processing 01.1040 lfw analysis started at $(timestamp)"
php panini.php 01.1040 lfw
((number++))
echo "$number - Processing 01.1040 low analysis started at $(timestamp)"
php panini.php 01.1040 low
((number++))
echo "$number - Processing 01.1040 laN analysis started at $(timestamp)"
php panini.php 01.1040 laN
((number++))
echo "$number - Processing 01.1040 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1040 ASIrliN
((number++))
echo "$number - Processing 01.1040 viDiliN analysis started at $(timestamp)"
php panini.php 01.1040 viDiliN
((number++))
echo "$number - Processing 01.1040 luN analysis started at $(timestamp)"
php panini.php 01.1040 luN
((number++))
echo "$number - Processing 01.1040 lfN analysis started at $(timestamp)"
php panini.php 01.1040 lfN
((number++))
echo "$number - Processing 01.0729 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0729 ASIrliN
((number++))
echo "$number - Processing 01.0801 law analysis started at $(timestamp)"
php panini.php 01.0801 law
((number++))
echo "$number - Processing 01.0801 low analysis started at $(timestamp)"
php panini.php 01.0801 low
((number++))
echo "$number - Processing 01.0801 laN analysis started at $(timestamp)"
php panini.php 01.0801 laN
((number++))
echo "$number - Processing 01.0801 viDiliN analysis started at $(timestamp)"
php panini.php 01.0801 viDiliN
((number++))
echo "$number - Processing 01.0582 law analysis started at $(timestamp)"
php panini.php 01.0582 law
((number++))
echo "$number - Processing 01.0582 liw analysis started at $(timestamp)"
php panini.php 01.0582 liw
((number++))
echo "$number - Processing 01.0582 luw analysis started at $(timestamp)"
php panini.php 01.0582 luw
((number++))
echo "$number - Processing 01.0582 lfw analysis started at $(timestamp)"
php panini.php 01.0582 lfw
((number++))
echo "$number - Processing 01.0582 low analysis started at $(timestamp)"
php panini.php 01.0582 low
((number++))
echo "$number - Processing 01.0582 laN analysis started at $(timestamp)"
php panini.php 01.0582 laN
((number++))
echo "$number - Processing 01.0582 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0582 ASIrliN
((number++))
echo "$number - Processing 01.0582 viDiliN analysis started at $(timestamp)"
php panini.php 01.0582 viDiliN
((number++))
echo "$number - Processing 01.0582 luN analysis started at $(timestamp)"
php panini.php 01.0582 luN
((number++))
echo "$number - Processing 01.0582 lfN analysis started at $(timestamp)"
php panini.php 01.0582 lfN
((number++))
echo "$number - Processing 01.0123 laN analysis started at $(timestamp)"
php panini.php 01.0123 laN
((number++))
echo "$number - Processing 01.0123 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0123 ASIrliN
((number++))
echo "$number - Processing 01.0622 law analysis started at $(timestamp)"
php panini.php 01.0622 law
((number++))
echo "$number - Processing 01.0622 liw analysis started at $(timestamp)"
php panini.php 01.0622 liw
((number++))
echo "$number - Processing 01.0622 luw analysis started at $(timestamp)"
php panini.php 01.0622 luw
((number++))
echo "$number - Processing 01.0622 lfw analysis started at $(timestamp)"
php panini.php 01.0622 lfw
((number++))
echo "$number - Processing 01.0622 low analysis started at $(timestamp)"
php panini.php 01.0622 low
((number++))
echo "$number - Processing 01.0622 laN analysis started at $(timestamp)"
php panini.php 01.0622 laN
((number++))
echo "$number - Processing 01.0622 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0622 ASIrliN
((number++))
echo "$number - Processing 01.0622 viDiliN analysis started at $(timestamp)"
php panini.php 01.0622 viDiliN
((number++))
echo "$number - Processing 01.0622 luN analysis started at $(timestamp)"
php panini.php 01.0622 luN
((number++))
echo "$number - Processing 01.0622 lfN analysis started at $(timestamp)"
php panini.php 01.0622 lfN
((number++))
echo "$number - Processing 01.0383 law analysis started at $(timestamp)"
php panini.php 01.0383 law
((number++))
echo "$number - Processing 01.0383 liw analysis started at $(timestamp)"
php panini.php 01.0383 liw
((number++))
echo "$number - Processing 01.0383 luw analysis started at $(timestamp)"
php panini.php 01.0383 luw
((number++))
echo "$number - Processing 01.0383 lfw analysis started at $(timestamp)"
php panini.php 01.0383 lfw
((number++))
echo "$number - Processing 01.0383 low analysis started at $(timestamp)"
php panini.php 01.0383 low
((number++))
echo "$number - Processing 01.0383 laN analysis started at $(timestamp)"
php panini.php 01.0383 laN
((number++))
echo "$number - Processing 01.0383 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0383 ASIrliN
((number++))
echo "$number - Processing 01.0383 viDiliN analysis started at $(timestamp)"
php panini.php 01.0383 viDiliN
((number++))
echo "$number - Processing 01.0383 luN analysis started at $(timestamp)"
php panini.php 01.0383 luN
((number++))
echo "$number - Processing 01.0383 lfN analysis started at $(timestamp)"
php panini.php 01.0383 lfN
((number++))
echo "$number - Processing 01.0378 law analysis started at $(timestamp)"
php panini.php 01.0378 law
((number++))
echo "$number - Processing 01.0378 liw analysis started at $(timestamp)"
php panini.php 01.0378 liw
((number++))
echo "$number - Processing 01.0378 luw analysis started at $(timestamp)"
php panini.php 01.0378 luw
((number++))
echo "$number - Processing 01.0378 lfw analysis started at $(timestamp)"
php panini.php 01.0378 lfw
((number++))
echo "$number - Processing 01.0378 low analysis started at $(timestamp)"
php panini.php 01.0378 low
((number++))
echo "$number - Processing 01.0378 laN analysis started at $(timestamp)"
php panini.php 01.0378 laN
((number++))
echo "$number - Processing 01.0378 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0378 ASIrliN
((number++))
echo "$number - Processing 01.0378 viDiliN analysis started at $(timestamp)"
php panini.php 01.0378 viDiliN
((number++))
echo "$number - Processing 01.0378 luN analysis started at $(timestamp)"
php panini.php 01.0378 luN
((number++))
echo "$number - Processing 01.0378 lfN analysis started at $(timestamp)"
php panini.php 01.0378 lfN
((number++))
echo "$number - Processing 01.0053 lfN analysis started at $(timestamp)"
php panini.php 01.0053 lfN
((number++))
echo "$number - Processing 01.1128 law analysis started at $(timestamp)"
php panini.php 01.1128 law
((number++))
echo "$number - Processing 01.1128 liw analysis started at $(timestamp)"
php panini.php 01.1128 liw
((number++))
echo "$number - Processing 01.1128 luw analysis started at $(timestamp)"
php panini.php 01.1128 luw
((number++))
echo "$number - Processing 01.1128 lfw analysis started at $(timestamp)"
php panini.php 01.1128 lfw
((number++))
echo "$number - Processing 01.1128 low analysis started at $(timestamp)"
php panini.php 01.1128 low
((number++))
echo "$number - Processing 01.1128 laN analysis started at $(timestamp)"
php panini.php 01.1128 laN
((number++))
echo "$number - Processing 01.1128 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1128 ASIrliN
((number++))
echo "$number - Processing 01.1128 viDiliN analysis started at $(timestamp)"
php panini.php 01.1128 viDiliN
((number++))
echo "$number - Processing 01.1128 luN analysis started at $(timestamp)"
php panini.php 01.1128 luN
((number++))
echo "$number - Processing 01.1128 lfN analysis started at $(timestamp)"
php panini.php 01.1128 lfN
((number++))
echo "$number - Processing 09.0021 law analysis started at $(timestamp)"
php panini.php 09.0021 law
((number++))
echo "$number - Processing 09.0021 liw analysis started at $(timestamp)"
php panini.php 09.0021 liw
((number++))
echo "$number - Processing 09.0021 low analysis started at $(timestamp)"
php panini.php 09.0021 low
((number++))
echo "$number - Processing 09.0021 laN analysis started at $(timestamp)"
php panini.php 09.0021 laN
((number++))
echo "$number - Processing 09.0021 viDiliN analysis started at $(timestamp)"
php panini.php 09.0021 viDiliN
((number++))
echo "$number - Processing 09.0021 luN analysis started at $(timestamp)"
php panini.php 09.0021 luN
((number++))
echo "$number - Processing 01.0725 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0725 ASIrliN
((number++))
echo "$number - Processing 01.0974 law analysis started at $(timestamp)"
php panini.php 01.0974 law
((number++))
echo "$number - Processing 01.0974 liw analysis started at $(timestamp)"
php panini.php 01.0974 liw
((number++))
echo "$number - Processing 01.0974 luw analysis started at $(timestamp)"
php panini.php 01.0974 luw
((number++))
echo "$number - Processing 01.0974 lfw analysis started at $(timestamp)"
php panini.php 01.0974 lfw
((number++))
echo "$number - Processing 01.0974 low analysis started at $(timestamp)"
php panini.php 01.0974 low
((number++))
echo "$number - Processing 01.0974 laN analysis started at $(timestamp)"
php panini.php 01.0974 laN
((number++))
echo "$number - Processing 01.0974 viDiliN analysis started at $(timestamp)"
php panini.php 01.0974 viDiliN
((number++))
echo "$number - Processing 01.0974 luN analysis started at $(timestamp)"
php panini.php 01.0974 luN
((number++))
echo "$number - Processing 01.0974 lfN analysis started at $(timestamp)"
php panini.php 01.0974 lfN
((number++))
echo "$number - Processing 01.0726 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0726 ASIrliN
((number++))
echo "$number - Processing 10.0458 law analysis started at $(timestamp)"
php panini.php 10.0458 law
((number++))
echo "$number - Processing 10.0458 liw analysis started at $(timestamp)"
php panini.php 10.0458 liw
((number++))
echo "$number - Processing 10.0458 luw analysis started at $(timestamp)"
php panini.php 10.0458 luw
((number++))
echo "$number - Processing 10.0458 lfw analysis started at $(timestamp)"
php panini.php 10.0458 lfw
((number++))
echo "$number - Processing 10.0458 low analysis started at $(timestamp)"
php panini.php 10.0458 low
((number++))
echo "$number - Processing 10.0458 laN analysis started at $(timestamp)"
php panini.php 10.0458 laN
((number++))
echo "$number - Processing 10.0458 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0458 ASIrliN
((number++))
echo "$number - Processing 10.0458 viDiliN analysis started at $(timestamp)"
php panini.php 10.0458 viDiliN
((number++))
echo "$number - Processing 10.0458 luN analysis started at $(timestamp)"
php panini.php 10.0458 luN
((number++))
echo "$number - Processing 10.0458 lfN analysis started at $(timestamp)"
php panini.php 10.0458 lfN
((number++))
echo "$number - Processing 04.0112 law analysis started at $(timestamp)"
php panini.php 04.0112 law
((number++))
echo "$number - Processing 04.0112 liw analysis started at $(timestamp)"
php panini.php 04.0112 liw
((number++))
echo "$number - Processing 04.0112 luw analysis started at $(timestamp)"
php panini.php 04.0112 luw
((number++))
echo "$number - Processing 04.0112 lfw analysis started at $(timestamp)"
php panini.php 04.0112 lfw
((number++))
echo "$number - Processing 04.0112 low analysis started at $(timestamp)"
php panini.php 04.0112 low
((number++))
echo "$number - Processing 04.0112 laN analysis started at $(timestamp)"
php panini.php 04.0112 laN
((number++))
echo "$number - Processing 04.0112 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0112 ASIrliN
((number++))
echo "$number - Processing 04.0112 viDiliN analysis started at $(timestamp)"
php panini.php 04.0112 viDiliN
((number++))
echo "$number - Processing 04.0112 luN analysis started at $(timestamp)"
php panini.php 04.0112 luN
((number++))
echo "$number - Processing 04.0112 lfN analysis started at $(timestamp)"
php panini.php 04.0112 lfN
((number++))
echo "$number - Processing 10.0203 luN analysis started at $(timestamp)"
php panini.php 10.0203 luN
((number++))
echo "$number - Processing 01.0320 law analysis started at $(timestamp)"
php panini.php 01.0320 law
((number++))
echo "$number - Processing 01.0320 liw analysis started at $(timestamp)"
php panini.php 01.0320 liw
((number++))
echo "$number - Processing 01.0320 luw analysis started at $(timestamp)"
php panini.php 01.0320 luw
((number++))
echo "$number - Processing 01.0320 lfw analysis started at $(timestamp)"
php panini.php 01.0320 lfw
((number++))
echo "$number - Processing 01.0320 low analysis started at $(timestamp)"
php panini.php 01.0320 low
((number++))
echo "$number - Processing 01.0320 laN analysis started at $(timestamp)"
php panini.php 01.0320 laN
((number++))
echo "$number - Processing 01.0320 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0320 ASIrliN
((number++))
echo "$number - Processing 01.0320 viDiliN analysis started at $(timestamp)"
php panini.php 01.0320 viDiliN
((number++))
echo "$number - Processing 01.0320 luN analysis started at $(timestamp)"
php panini.php 01.0320 luN
((number++))
echo "$number - Processing 01.0320 lfN analysis started at $(timestamp)"
php panini.php 01.0320 lfN
((number++))
echo "$number - Processing 01.0820 law analysis started at $(timestamp)"
php panini.php 01.0820 law
((number++))
echo "$number - Processing 01.0820 liw analysis started at $(timestamp)"
php panini.php 01.0820 liw
((number++))
echo "$number - Processing 01.0820 luw analysis started at $(timestamp)"
php panini.php 01.0820 luw
((number++))
echo "$number - Processing 01.0820 lfw analysis started at $(timestamp)"
php panini.php 01.0820 lfw
((number++))
echo "$number - Processing 01.0820 low analysis started at $(timestamp)"
php panini.php 01.0820 low
((number++))
echo "$number - Processing 01.0820 laN analysis started at $(timestamp)"
php panini.php 01.0820 laN
((number++))
echo "$number - Processing 01.0820 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0820 ASIrliN
((number++))
echo "$number - Processing 01.0820 viDiliN analysis started at $(timestamp)"
php panini.php 01.0820 viDiliN
((number++))
echo "$number - Processing 01.0820 luN analysis started at $(timestamp)"
php panini.php 01.0820 luN
((number++))
echo "$number - Processing 01.0820 lfN analysis started at $(timestamp)"
php panini.php 01.0820 lfN
((number++))
echo "$number - Processing 01.0445 law analysis started at $(timestamp)"
php panini.php 01.0445 law
((number++))
echo "$number - Processing 01.0445 liw analysis started at $(timestamp)"
php panini.php 01.0445 liw
((number++))
echo "$number - Processing 01.0445 luw analysis started at $(timestamp)"
php panini.php 01.0445 luw
((number++))
echo "$number - Processing 01.0445 lfw analysis started at $(timestamp)"
php panini.php 01.0445 lfw
((number++))
echo "$number - Processing 01.0445 low analysis started at $(timestamp)"
php panini.php 01.0445 low
((number++))
echo "$number - Processing 01.0445 laN analysis started at $(timestamp)"
php panini.php 01.0445 laN
((number++))
echo "$number - Processing 01.0445 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0445 ASIrliN
((number++))
echo "$number - Processing 01.0445 viDiliN analysis started at $(timestamp)"
php panini.php 01.0445 viDiliN
((number++))
echo "$number - Processing 01.0445 luN analysis started at $(timestamp)"
php panini.php 01.0445 luN
((number++))
echo "$number - Processing 01.0445 lfN analysis started at $(timestamp)"
php panini.php 01.0445 lfN
((number++))
echo "$number - Processing 01.0126 luw analysis started at $(timestamp)"
php panini.php 01.0126 luw
((number++))
echo "$number - Processing 04.0068 law analysis started at $(timestamp)"
php panini.php 04.0068 law
((number++))
echo "$number - Processing 04.0068 low analysis started at $(timestamp)"
php panini.php 04.0068 low
((number++))
echo "$number - Processing 04.0068 luN analysis started at $(timestamp)"
php panini.php 04.0068 luN
((number++))
echo "$number - Processing 01.1016 laN analysis started at $(timestamp)"
php panini.php 01.1016 laN
((number++))
echo "$number - Processing 01.1016 luN analysis started at $(timestamp)"
php panini.php 01.1016 luN
((number++))
echo "$number - Processing 01.1017 luN analysis started at $(timestamp)"
php panini.php 01.1017 luN
((number++))
echo "$number - Processing 04.0117 liw analysis started at $(timestamp)"
php panini.php 04.0117 liw
((number++))
echo "$number - Processing 04.0129 liw analysis started at $(timestamp)"
php panini.php 04.0129 liw
((number++))
echo "$number - Processing 10.0080 luw analysis started at $(timestamp)"
php panini.php 10.0080 luw
((number++))
echo "$number - Processing 10.0080 lfw analysis started at $(timestamp)"
php panini.php 10.0080 lfw
((number++))
echo "$number - Processing 10.0080 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0080 ASIrliN
((number++))
echo "$number - Processing 10.0080 viDiliN analysis started at $(timestamp)"
php panini.php 10.0080 viDiliN
((number++))
echo "$number - Processing 10.0080 luN analysis started at $(timestamp)"
php panini.php 10.0080 luN
((number++))
echo "$number - Processing 10.0080 lfN analysis started at $(timestamp)"
php panini.php 10.0080 lfN
((number++))
echo "$number - Processing 10.0299 liw analysis started at $(timestamp)"
php panini.php 10.0299 liw
((number++))
echo "$number - Processing 10.0299 lfw analysis started at $(timestamp)"
php panini.php 10.0299 lfw
((number++))
echo "$number - Processing 10.0299 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0299 ASIrliN
((number++))
echo "$number - Processing 10.0299 viDiliN analysis started at $(timestamp)"
php panini.php 10.0299 viDiliN
((number++))
echo "$number - Processing 10.0299 luN analysis started at $(timestamp)"
php panini.php 10.0299 luN
((number++))
echo "$number - Processing 06.0074 law analysis started at $(timestamp)"
php panini.php 06.0074 law
((number++))
echo "$number - Processing 06.0074 low analysis started at $(timestamp)"
php panini.php 06.0074 low
((number++))
echo "$number - Processing 06.0074 laN analysis started at $(timestamp)"
php panini.php 06.0074 laN
((number++))
echo "$number - Processing 06.0074 viDiliN analysis started at $(timestamp)"
php panini.php 06.0074 viDiliN
((number++))
echo "$number - Processing 01.0821 law analysis started at $(timestamp)"
php panini.php 01.0821 law
((number++))
echo "$number - Processing 01.0821 liw analysis started at $(timestamp)"
php panini.php 01.0821 liw
((number++))
echo "$number - Processing 01.0821 luw analysis started at $(timestamp)"
php panini.php 01.0821 luw
((number++))
echo "$number - Processing 01.0821 lfw analysis started at $(timestamp)"
php panini.php 01.0821 lfw
((number++))
echo "$number - Processing 01.0821 low analysis started at $(timestamp)"
php panini.php 01.0821 low
((number++))
echo "$number - Processing 01.0821 laN analysis started at $(timestamp)"
php panini.php 01.0821 laN
((number++))
echo "$number - Processing 01.0821 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0821 ASIrliN
((number++))
echo "$number - Processing 01.0821 viDiliN analysis started at $(timestamp)"
php panini.php 01.0821 viDiliN
((number++))
echo "$number - Processing 01.0821 luN analysis started at $(timestamp)"
php panini.php 01.0821 luN
((number++))
echo "$number - Processing 01.0821 lfN analysis started at $(timestamp)"
php panini.php 01.0821 lfN
((number++))
echo "$number - Processing 04.0116 law analysis started at $(timestamp)"
php panini.php 04.0116 law
((number++))
echo "$number - Processing 04.0116 liw analysis started at $(timestamp)"
php panini.php 04.0116 liw
((number++))
echo "$number - Processing 04.0116 luw analysis started at $(timestamp)"
php panini.php 04.0116 luw
((number++))
echo "$number - Processing 04.0116 lfw analysis started at $(timestamp)"
php panini.php 04.0116 lfw
((number++))
echo "$number - Processing 04.0116 low analysis started at $(timestamp)"
php panini.php 04.0116 low
((number++))
echo "$number - Processing 04.0116 laN analysis started at $(timestamp)"
php panini.php 04.0116 laN
((number++))
echo "$number - Processing 04.0116 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0116 ASIrliN
((number++))
echo "$number - Processing 04.0116 viDiliN analysis started at $(timestamp)"
php panini.php 04.0116 viDiliN
((number++))
echo "$number - Processing 04.0116 luN analysis started at $(timestamp)"
php panini.php 04.0116 luN
((number++))
echo "$number - Processing 04.0116 lfN analysis started at $(timestamp)"
php panini.php 04.0116 lfN
((number++))
echo "$number - Processing 02.0039 liw analysis started at $(timestamp)"
php panini.php 02.0039 liw
((number++))
echo "$number - Processing 02.0039 luN analysis started at $(timestamp)"
php panini.php 02.0039 luN
((number++))
echo "$number - Processing 10.0172 luw analysis started at $(timestamp)"
php panini.php 10.0172 luw
((number++))
echo "$number - Processing 10.0172 lfw analysis started at $(timestamp)"
php panini.php 10.0172 lfw
((number++))
echo "$number - Processing 10.0172 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0172 ASIrliN
((number++))
echo "$number - Processing 10.0172 viDiliN analysis started at $(timestamp)"
php panini.php 10.0172 viDiliN
((number++))
echo "$number - Processing 10.0172 luN analysis started at $(timestamp)"
php panini.php 10.0172 luN
((number++))
echo "$number - Processing 10.0172 lfN analysis started at $(timestamp)"
php panini.php 10.0172 lfN
((number++))
echo "$number - Processing 09.0038 law analysis started at $(timestamp)"
php panini.php 09.0038 law
((number++))
echo "$number - Processing 09.0038 liw analysis started at $(timestamp)"
php panini.php 09.0038 liw
((number++))
echo "$number - Processing 09.0038 luw analysis started at $(timestamp)"
php panini.php 09.0038 luw
((number++))
echo "$number - Processing 09.0038 lfw analysis started at $(timestamp)"
php panini.php 09.0038 lfw
((number++))
echo "$number - Processing 09.0038 low analysis started at $(timestamp)"
php panini.php 09.0038 low
((number++))
echo "$number - Processing 09.0038 laN analysis started at $(timestamp)"
php panini.php 09.0038 laN
((number++))
echo "$number - Processing 09.0038 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0038 ASIrliN
((number++))
echo "$number - Processing 09.0038 viDiliN analysis started at $(timestamp)"
php panini.php 09.0038 viDiliN
((number++))
echo "$number - Processing 09.0038 luN analysis started at $(timestamp)"
php panini.php 09.0038 luN
((number++))
echo "$number - Processing 09.0038 lfN analysis started at $(timestamp)"
php panini.php 09.0038 lfN
((number++))
echo "$number - Processing 01.1039 law analysis started at $(timestamp)"
php panini.php 01.1039 law
((number++))
echo "$number - Processing 01.1039 liw analysis started at $(timestamp)"
php panini.php 01.1039 liw
((number++))
echo "$number - Processing 01.1039 luw analysis started at $(timestamp)"
php panini.php 01.1039 luw
((number++))
echo "$number - Processing 01.1039 lfw analysis started at $(timestamp)"
php panini.php 01.1039 lfw
((number++))
echo "$number - Processing 01.1039 low analysis started at $(timestamp)"
php panini.php 01.1039 low
((number++))
echo "$number - Processing 01.1039 laN analysis started at $(timestamp)"
php panini.php 01.1039 laN
((number++))
echo "$number - Processing 01.1039 viDiliN analysis started at $(timestamp)"
php panini.php 01.1039 viDiliN
((number++))
echo "$number - Processing 01.1039 luN analysis started at $(timestamp)"
php panini.php 01.1039 luN
((number++))
echo "$number - Processing 01.1153 liw analysis started at $(timestamp)"
php panini.php 01.1153 liw
((number++))
echo "$number - Processing 07.0290 luN analysis started at $(timestamp)"
php panini.php 07.0290 luN
((number++))
echo "$number - Processing 01.0662 law analysis started at $(timestamp)"
php panini.php 01.0662 law
((number++))
echo "$number - Processing 01.0662 liw analysis started at $(timestamp)"
php panini.php 01.0662 liw
((number++))
echo "$number - Processing 01.0662 luw analysis started at $(timestamp)"
php panini.php 01.0662 luw
((number++))
echo "$number - Processing 01.0662 lfw analysis started at $(timestamp)"
php panini.php 01.0662 lfw
((number++))
echo "$number - Processing 01.0662 low analysis started at $(timestamp)"
php panini.php 01.0662 low
((number++))
echo "$number - Processing 01.0662 laN analysis started at $(timestamp)"
php panini.php 01.0662 laN
((number++))
echo "$number - Processing 01.0662 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0662 ASIrliN
((number++))
echo "$number - Processing 01.0662 viDiliN analysis started at $(timestamp)"
php panini.php 01.0662 viDiliN
((number++))
echo "$number - Processing 01.0662 luN analysis started at $(timestamp)"
php panini.php 01.0662 luN
((number++))
echo "$number - Processing 01.0662 lfN analysis started at $(timestamp)"
php panini.php 01.0662 lfN
((number++))
echo "$number - Processing 01.0663 law analysis started at $(timestamp)"
php panini.php 01.0663 law
((number++))
echo "$number - Processing 01.0663 liw analysis started at $(timestamp)"
php panini.php 01.0663 liw
((number++))
echo "$number - Processing 01.0663 luw analysis started at $(timestamp)"
php panini.php 01.0663 luw
((number++))
echo "$number - Processing 01.0663 lfw analysis started at $(timestamp)"
php panini.php 01.0663 lfw
((number++))
echo "$number - Processing 01.0663 low analysis started at $(timestamp)"
php panini.php 01.0663 low
((number++))
echo "$number - Processing 01.0663 laN analysis started at $(timestamp)"
php panini.php 01.0663 laN
((number++))
echo "$number - Processing 01.0663 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0663 ASIrliN
((number++))
echo "$number - Processing 01.0663 viDiliN analysis started at $(timestamp)"
php panini.php 01.0663 viDiliN
((number++))
echo "$number - Processing 01.0663 luN analysis started at $(timestamp)"
php panini.php 01.0663 luN
((number++))
echo "$number - Processing 01.0663 lfN analysis started at $(timestamp)"
php panini.php 01.0663 lfN
((number++))
echo "$number - Processing 01.0569 law analysis started at $(timestamp)"
php panini.php 01.0569 law
((number++))
echo "$number - Processing 01.0569 liw analysis started at $(timestamp)"
php panini.php 01.0569 liw
((number++))
echo "$number - Processing 01.0569 low analysis started at $(timestamp)"
php panini.php 01.0569 low
((number++))
echo "$number - Processing 01.0569 laN analysis started at $(timestamp)"
php panini.php 01.0569 laN
((number++))
echo "$number - Processing 01.0569 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0569 ASIrliN
((number++))
echo "$number - Processing 01.0569 viDiliN analysis started at $(timestamp)"
php panini.php 01.0569 viDiliN
((number++))
echo "$number - Processing 01.0569 luN analysis started at $(timestamp)"
php panini.php 01.0569 luN
((number++))
echo "$number - Processing 04.0113 liw analysis started at $(timestamp)"
php panini.php 04.0113 liw
((number++))
echo "$number - Processing 04.0113 luN analysis started at $(timestamp)"
php panini.php 04.0113 luN
((number++))
echo "$number - Processing 03.0019 law analysis started at $(timestamp)"
php panini.php 03.0019 law
((number++))
echo "$number - Processing 03.0019 liw analysis started at $(timestamp)"
php panini.php 03.0019 liw
((number++))
echo "$number - Processing 03.0019 low analysis started at $(timestamp)"
php panini.php 03.0019 low
((number++))
echo "$number - Processing 03.0019 laN analysis started at $(timestamp)"
php panini.php 03.0019 laN
((number++))
echo "$number - Processing 03.0019 viDiliN analysis started at $(timestamp)"
php panini.php 03.0019 viDiliN
((number++))
echo "$number - Processing 01.0509 liw analysis started at $(timestamp)"
php panini.php 01.0509 liw
((number++))
echo "$number - Processing 01.0696 luN analysis started at $(timestamp)"
php panini.php 01.0696 luN
((number++))
echo "$number - Processing 01.0711 liw analysis started at $(timestamp)"
php panini.php 01.0711 liw
((number++))
echo "$number - Processing 01.0690 luN analysis started at $(timestamp)"
php panini.php 01.0690 luN
((number++))
echo "$number - Processing 07.0002 law analysis started at $(timestamp)"
php panini.php 07.0002 law
((number++))
echo "$number - Processing 07.0002 laN analysis started at $(timestamp)"
php panini.php 07.0002 laN
((number++))
echo "$number - Processing 01.0067 lfN analysis started at $(timestamp)"
php panini.php 01.0067 lfN
((number++))
echo "$number - Processing 03.0002 law analysis started at $(timestamp)"
php panini.php 03.0002 law
((number++))
echo "$number - Processing 03.0002 liw analysis started at $(timestamp)"
php panini.php 03.0002 liw
((number++))
echo "$number - Processing 03.0002 low analysis started at $(timestamp)"
php panini.php 03.0002 low
((number++))
echo "$number - Processing 03.0002 laN analysis started at $(timestamp)"
php panini.php 03.0002 laN
((number++))
echo "$number - Processing 03.0002 viDiliN analysis started at $(timestamp)"
php panini.php 03.0002 viDiliN
((number++))
echo "$number - Processing 06.0153 law analysis started at $(timestamp)"
php panini.php 06.0153 law
((number++))
echo "$number - Processing 06.0153 low analysis started at $(timestamp)"
php panini.php 06.0153 low
((number++))
echo "$number - Processing 06.0153 laN analysis started at $(timestamp)"
php panini.php 06.0153 laN
((number++))
echo "$number - Processing 06.0153 viDiliN analysis started at $(timestamp)"
php panini.php 06.0153 viDiliN
((number++))
echo "$number - Processing 10.0382 luN analysis started at $(timestamp)"
php panini.php 10.0382 luN
((number++))
echo "$number - Processing 10.0277 luN analysis started at $(timestamp)"
php panini.php 10.0277 luN
((number++))
echo "$number - Processing 10.0255 luN analysis started at $(timestamp)"
php panini.php 10.0255 luN
((number++))
echo "$number - Processing 03.0318 law analysis started at $(timestamp)"
php panini.php 03.0318 law
((number++))
echo "$number - Processing 03.0318 liw analysis started at $(timestamp)"
php panini.php 03.0318 liw
((number++))
echo "$number - Processing 03.0318 low analysis started at $(timestamp)"
php panini.php 03.0318 low
((number++))
echo "$number - Processing 03.0318 laN analysis started at $(timestamp)"
php panini.php 03.0318 laN
((number++))
echo "$number - Processing 03.0318 viDiliN analysis started at $(timestamp)"
php panini.php 03.0318 viDiliN
((number++))
echo "$number - Processing 10.1045 law analysis started at $(timestamp)"
php panini.php 10.1045 law
((number++))
echo "$number - Processing 10.1045 ASIrliN analysis started at $(timestamp)"
php panini.php 10.1045 ASIrliN
((number++))
echo "$number - Processing 04.0006 law analysis started at $(timestamp)"
php panini.php 04.0006 law
((number++))
echo "$number - Processing 04.0006 liw analysis started at $(timestamp)"
php panini.php 04.0006 liw
((number++))
echo "$number - Processing 04.0006 low analysis started at $(timestamp)"
php panini.php 04.0006 low
((number++))
echo "$number - Processing 04.0006 laN analysis started at $(timestamp)"
php panini.php 04.0006 laN
((number++))
echo "$number - Processing 04.0006 viDiliN analysis started at $(timestamp)"
php panini.php 04.0006 viDiliN
((number++))
echo "$number - Processing 04.0006 luN analysis started at $(timestamp)"
php panini.php 04.0006 luN
((number++))
echo "$number - Processing 04.0006 lfN analysis started at $(timestamp)"
php panini.php 04.0006 lfN
((number++))
echo "$number - Processing 01.0202 law analysis started at $(timestamp)"
php panini.php 01.0202 law
((number++))
echo "$number - Processing 06.0129 luw analysis started at $(timestamp)"
php panini.php 06.0129 luw
((number++))
echo "$number - Processing 06.0129 lfw analysis started at $(timestamp)"
php panini.php 06.0129 lfw
((number++))
echo "$number - Processing 06.0129 luN analysis started at $(timestamp)"
php panini.php 06.0129 luN
((number++))
echo "$number - Processing 06.0129 lfN analysis started at $(timestamp)"
php panini.php 06.0129 lfN
((number++))
echo "$number - Processing 09.0024 liw analysis started at $(timestamp)"
php panini.php 09.0024 liw
((number++))
echo "$number - Processing 09.0024 laN analysis started at $(timestamp)"
php panini.php 09.0024 laN
((number++))
echo "$number - Processing 09.0024 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0024 ASIrliN
((number++))
echo "$number - Processing 01.1026 laN analysis started at $(timestamp)"
php panini.php 01.1026 laN
((number++))
echo "$number - Processing 01.0715 liw analysis started at $(timestamp)"
php panini.php 01.0715 liw
((number++))
echo "$number - Processing 04.0138 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0138 ASIrliN
((number++))
echo "$number - Processing 04.0138 viDiliN analysis started at $(timestamp)"
php panini.php 04.0138 viDiliN
((number++))
echo "$number - Processing 01.0859 liw analysis started at $(timestamp)"
php panini.php 01.0859 liw
((number++))
echo "$number - Processing 01.0859 luN analysis started at $(timestamp)"
php panini.php 01.0859 luN
((number++))
echo "$number - Processing 01.1037 luN analysis started at $(timestamp)"
php panini.php 01.1037 luN
((number++))
echo "$number - Processing 06.0004 law analysis started at $(timestamp)"
php panini.php 06.0004 law
((number++))
echo "$number - Processing 06.0004 liw analysis started at $(timestamp)"
php panini.php 06.0004 liw
((number++))
echo "$number - Processing 06.0004 low analysis started at $(timestamp)"
php panini.php 06.0004 low
((number++))
echo "$number - Processing 06.0004 laN analysis started at $(timestamp)"
php panini.php 06.0004 laN
((number++))
echo "$number - Processing 06.0004 viDiliN analysis started at $(timestamp)"
php panini.php 06.0004 viDiliN
((number++))
echo "$number - Processing 06.0004 luN analysis started at $(timestamp)"
php panini.php 06.0004 luN
((number++))
echo "$number - Processing 01.0985 viDiliN analysis started at $(timestamp)"
php panini.php 01.0985 viDiliN
((number++))
echo "$number - Processing 01.0205 luN analysis started at $(timestamp)"
php panini.php 01.0205 luN
((number++))
echo "$number - Processing 01.0957 luN analysis started at $(timestamp)"
php panini.php 01.0957 luN
((number++))
echo "$number - Processing 01.0958 law analysis started at $(timestamp)"
php panini.php 01.0958 law
((number++))
echo "$number - Processing 01.0958 low analysis started at $(timestamp)"
php panini.php 01.0958 low
((number++))
echo "$number - Processing 01.0958 laN analysis started at $(timestamp)"
php panini.php 01.0958 laN
((number++))
echo "$number - Processing 01.0958 viDiliN analysis started at $(timestamp)"
php panini.php 01.0958 viDiliN
((number++))
echo "$number - Processing 01.0958 luN analysis started at $(timestamp)"
php panini.php 01.0958 luN
((number++))
echo "$number - Processing 09.0041 liw analysis started at $(timestamp)"
php panini.php 09.0041 liw
((number++))
echo "$number - Processing 01.0204 law analysis started at $(timestamp)"
php panini.php 01.0204 law
((number++))
echo "$number - Processing 01.0204 liw analysis started at $(timestamp)"
php panini.php 01.0204 liw
((number++))
echo "$number - Processing 01.0204 low analysis started at $(timestamp)"
php panini.php 01.0204 low
((number++))
echo "$number - Processing 01.0204 laN analysis started at $(timestamp)"
php panini.php 01.0204 laN
((number++))
echo "$number - Processing 01.0204 viDiliN analysis started at $(timestamp)"
php panini.php 01.0204 viDiliN
((number++))
echo "$number - Processing 01.0204 luN analysis started at $(timestamp)"
php panini.php 01.0204 luN
((number++))
echo "$number - Processing 01.1027 low analysis started at $(timestamp)"
php panini.php 01.1027 low
((number++))
echo "$number - Processing 01.1027 laN analysis started at $(timestamp)"
php panini.php 01.1027 laN
((number++))
echo "$number - Processing 01.1038 low analysis started at $(timestamp)"
php panini.php 01.1038 low
((number++))
echo "$number - Processing 01.1038 laN analysis started at $(timestamp)"
php panini.php 01.1038 laN
((number++))
echo "$number - Processing 01.0959 law analysis started at $(timestamp)"
php panini.php 01.0959 law
((number++))
echo "$number - Processing 01.0959 low analysis started at $(timestamp)"
php panini.php 01.0959 low
((number++))
echo "$number - Processing 01.0959 laN analysis started at $(timestamp)"
php panini.php 01.0959 laN
((number++))
echo "$number - Processing 01.0959 viDiliN analysis started at $(timestamp)"
php panini.php 01.0959 viDiliN
((number++))
echo "$number - Processing 01.0959 luN analysis started at $(timestamp)"
php panini.php 01.0959 luN
((number++))
echo "$number - Processing 01.1028 law analysis started at $(timestamp)"
php panini.php 01.1028 law
((number++))
echo "$number - Processing 01.1028 liw analysis started at $(timestamp)"
php panini.php 01.1028 liw
((number++))
echo "$number - Processing 01.1028 luw analysis started at $(timestamp)"
php panini.php 01.1028 luw
((number++))
echo "$number - Processing 01.1028 lfw analysis started at $(timestamp)"
php panini.php 01.1028 lfw
((number++))
echo "$number - Processing 01.1028 low analysis started at $(timestamp)"
php panini.php 01.1028 low
((number++))
echo "$number - Processing 01.1028 laN analysis started at $(timestamp)"
php panini.php 01.1028 laN
((number++))
echo "$number - Processing 01.1028 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1028 ASIrliN
((number++))
echo "$number - Processing 01.1028 viDiliN analysis started at $(timestamp)"
php panini.php 01.1028 viDiliN
((number++))
echo "$number - Processing 01.1028 luN analysis started at $(timestamp)"
php panini.php 01.1028 luN
((number++))
echo "$number - Processing 01.1028 lfN analysis started at $(timestamp)"
php panini.php 01.1028 lfN
((number++))
echo "$number - Processing 01.0094 liw analysis started at $(timestamp)"
php panini.php 01.0094 liw
((number++))
echo "$number - Processing 01.0094 luN analysis started at $(timestamp)"
php panini.php 01.0094 luN
((number++))
echo "$number - Processing 01.0141 lfN analysis started at $(timestamp)"
php panini.php 01.0141 lfN
((number++))
echo "$number - Processing 01.0157 law analysis started at $(timestamp)"
php panini.php 01.0157 law
((number++))
echo "$number - Processing 01.0157 liw analysis started at $(timestamp)"
php panini.php 01.0157 liw
((number++))
echo "$number - Processing 01.0157 luw analysis started at $(timestamp)"
php panini.php 01.0157 luw
((number++))
echo "$number - Processing 01.0157 lfw analysis started at $(timestamp)"
php panini.php 01.0157 lfw
((number++))
echo "$number - Processing 01.0157 low analysis started at $(timestamp)"
php panini.php 01.0157 low
((number++))
echo "$number - Processing 01.0157 laN analysis started at $(timestamp)"
php panini.php 01.0157 laN
((number++))
echo "$number - Processing 01.0157 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0157 ASIrliN
((number++))
echo "$number - Processing 01.0157 viDiliN analysis started at $(timestamp)"
php panini.php 01.0157 viDiliN
((number++))
echo "$number - Processing 01.0157 luN analysis started at $(timestamp)"
php panini.php 01.0157 luN
((number++))
echo "$number - Processing 01.0157 lfN analysis started at $(timestamp)"
php panini.php 01.0157 lfN
((number++))
echo "$number - Processing 01.0183 lfN analysis started at $(timestamp)"
php panini.php 01.0183 lfN
((number++))
echo "$number - Processing 01.0195 law analysis started at $(timestamp)"
php panini.php 01.0195 law
((number++))
echo "$number - Processing 01.0195 liw analysis started at $(timestamp)"
php panini.php 01.0195 liw
((number++))
echo "$number - Processing 01.0195 low analysis started at $(timestamp)"
php panini.php 01.0195 low
((number++))
echo "$number - Processing 01.0195 laN analysis started at $(timestamp)"
php panini.php 01.0195 laN
((number++))
echo "$number - Processing 01.0195 viDiliN analysis started at $(timestamp)"
php panini.php 01.0195 viDiliN
((number++))
echo "$number - Processing 01.0195 luN analysis started at $(timestamp)"
php panini.php 01.0195 luN
((number++))
echo "$number - Processing 06.0151 law analysis started at $(timestamp)"
php panini.php 06.0151 law
((number++))
echo "$number - Processing 06.0151 liw analysis started at $(timestamp)"
php panini.php 06.0151 liw
((number++))
echo "$number - Processing 06.0151 luw analysis started at $(timestamp)"
php panini.php 06.0151 luw
((number++))
echo "$number - Processing 06.0151 lfw analysis started at $(timestamp)"
php panini.php 06.0151 lfw
((number++))
echo "$number - Processing 06.0151 low analysis started at $(timestamp)"
php panini.php 06.0151 low
((number++))
echo "$number - Processing 06.0151 laN analysis started at $(timestamp)"
php panini.php 06.0151 laN
((number++))
echo "$number - Processing 06.0151 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0151 ASIrliN
((number++))
echo "$number - Processing 06.0151 viDiliN analysis started at $(timestamp)"
php panini.php 06.0151 viDiliN
((number++))
echo "$number - Processing 06.0151 luN analysis started at $(timestamp)"
php panini.php 06.0151 luN
((number++))
echo "$number - Processing 01.0296 luN analysis started at $(timestamp)"
php panini.php 01.0296 luN
((number++))
echo "$number - Processing 01.0305 luN analysis started at $(timestamp)"
php panini.php 01.0305 luN
((number++))
echo "$number - Processing 08.0233 luN analysis started at $(timestamp)"
php panini.php 08.0233 luN
((number++))
echo "$number - Processing 10.0073 luN analysis started at $(timestamp)"
php panini.php 10.0073 luN
((number++))
echo "$number - Processing 10.0199 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0199 ASIrliN
((number++))
echo "$number - Processing 09.0047 law analysis started at $(timestamp)"
php panini.php 09.0047 law
((number++))
echo "$number - Processing 09.0047 low analysis started at $(timestamp)"
php panini.php 09.0047 low
((number++))
echo "$number - Processing 09.0047 laN analysis started at $(timestamp)"
php panini.php 09.0047 laN
((number++))
echo "$number - Processing 09.0047 viDiliN analysis started at $(timestamp)"
php panini.php 09.0047 viDiliN
((number++))
echo "$number - Processing 01.0013 luN analysis started at $(timestamp)"
php panini.php 01.0013 luN
((number++))
echo "$number - Processing 01.0549 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0549 ASIrliN
((number++))
echo "$number - Processing 10.0151 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0151 ASIrliN
((number++))
echo "$number - Processing 01.0485 liw analysis started at $(timestamp)"
php panini.php 01.0485 liw
((number++))
echo "$number - Processing 01.0485 lfN analysis started at $(timestamp)"
php panini.php 01.0485 lfN
((number++))
echo "$number - Processing 01.0659 liw analysis started at $(timestamp)"
php panini.php 01.0659 liw
((number++))
echo "$number - Processing 01.0659 viDiliN analysis started at $(timestamp)"
php panini.php 01.0659 viDiliN
((number++))
echo "$number - Processing 01.0585 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0585 ASIrliN
((number++))
echo "$number - Processing 01.0107 luN analysis started at $(timestamp)"
php panini.php 01.0107 luN
((number++))
echo "$number - Processing 02.0057 law analysis started at $(timestamp)"
php panini.php 02.0057 law
((number++))
echo "$number - Processing 02.0057 low analysis started at $(timestamp)"
php panini.php 02.0057 low
((number++))
echo "$number - Processing 02.0057 laN analysis started at $(timestamp)"
php panini.php 02.0057 laN
((number++))
echo "$number - Processing 02.0057 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0057 ASIrliN
((number++))
echo "$number - Processing 02.0057 viDiliN analysis started at $(timestamp)"
php panini.php 02.0057 viDiliN
((number++))
echo "$number - Processing 03.0007 law analysis started at $(timestamp)"
php panini.php 03.0007 law
((number++))
echo "$number - Processing 03.0007 low analysis started at $(timestamp)"
php panini.php 03.0007 low
((number++))
echo "$number - Processing 03.0007 laN analysis started at $(timestamp)"
php panini.php 03.0007 laN
((number++))
echo "$number - Processing 03.0007 viDiliN analysis started at $(timestamp)"
php panini.php 03.0007 viDiliN
((number++))
echo "$number - Processing 01.0762 law analysis started at $(timestamp)"
php panini.php 01.0762 law
((number++))
echo "$number - Processing 01.0762 liw analysis started at $(timestamp)"
php panini.php 01.0762 liw
((number++))
echo "$number - Processing 01.0762 luw analysis started at $(timestamp)"
php panini.php 01.0762 luw
((number++))
echo "$number - Processing 01.0762 lfw analysis started at $(timestamp)"
php panini.php 01.0762 lfw
((number++))
echo "$number - Processing 01.0762 low analysis started at $(timestamp)"
php panini.php 01.0762 low
((number++))
echo "$number - Processing 01.0762 laN analysis started at $(timestamp)"
php panini.php 01.0762 laN
((number++))
echo "$number - Processing 01.0762 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0762 ASIrliN
((number++))
echo "$number - Processing 01.0762 viDiliN analysis started at $(timestamp)"
php panini.php 01.0762 viDiliN
((number++))
echo "$number - Processing 01.0762 luN analysis started at $(timestamp)"
php panini.php 01.0762 luN
((number++))
echo "$number - Processing 01.0762 lfN analysis started at $(timestamp)"
php panini.php 01.0762 lfN
((number++))
echo "$number - Processing 10.0234 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0234 ASIrliN
((number++))
echo "$number - Processing 10.0381 luN analysis started at $(timestamp)"
php panini.php 10.0381 luN
((number++))
echo "$number - Processing 01.1127 law analysis started at $(timestamp)"
php panini.php 01.1127 law
((number++))
echo "$number - Processing 01.1127 liw analysis started at $(timestamp)"
php panini.php 01.1127 liw
((number++))
echo "$number - Processing 01.1127 low analysis started at $(timestamp)"
php panini.php 01.1127 low
((number++))
echo "$number - Processing 01.1127 laN analysis started at $(timestamp)"
php panini.php 01.1127 laN
((number++))
echo "$number - Processing 01.1127 viDiliN analysis started at $(timestamp)"
php panini.php 01.1127 viDiliN
((number++))
echo "$number - Processing 01.1127 luN analysis started at $(timestamp)"
php panini.php 01.1127 luN
((number++))
echo "$number - Processing 01.1042 laN analysis started at $(timestamp)"
php panini.php 01.1042 laN
((number++))
echo "$number - Processing 01.1042 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1042 ASIrliN
((number++))
echo "$number - Processing 05.0004 luw analysis started at $(timestamp)"
php panini.php 05.0004 luw
((number++))
echo "$number - Processing 05.0004 lfw analysis started at $(timestamp)"
php panini.php 05.0004 lfw
((number++))
echo "$number - Processing 05.0004 viDiliN analysis started at $(timestamp)"
php panini.php 05.0004 viDiliN
((number++))
echo "$number - Processing 05.0004 luN analysis started at $(timestamp)"
php panini.php 05.0004 luN
((number++))
echo "$number - Processing 05.0004 lfN analysis started at $(timestamp)"
php panini.php 05.0004 lfN
((number++))
echo "$number - Processing 06.0017 law analysis started at $(timestamp)"
php panini.php 06.0017 law
((number++))
echo "$number - Processing 06.0017 liw analysis started at $(timestamp)"
php panini.php 06.0017 liw
((number++))
echo "$number - Processing 06.0017 luw analysis started at $(timestamp)"
php panini.php 06.0017 luw
((number++))
echo "$number - Processing 06.0017 lfw analysis started at $(timestamp)"
php panini.php 06.0017 lfw
((number++))
echo "$number - Processing 06.0017 low analysis started at $(timestamp)"
php panini.php 06.0017 low
((number++))
echo "$number - Processing 06.0017 laN analysis started at $(timestamp)"
php panini.php 06.0017 laN
((number++))
echo "$number - Processing 06.0017 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0017 ASIrliN
((number++))
echo "$number - Processing 06.0017 viDiliN analysis started at $(timestamp)"
php panini.php 06.0017 viDiliN
((number++))
echo "$number - Processing 06.0017 luN analysis started at $(timestamp)"
php panini.php 06.0017 luN
((number++))
echo "$number - Processing 06.0017 lfN analysis started at $(timestamp)"
php panini.php 06.0017 lfN
((number++))
echo "$number - Processing 10.0286 liw analysis started at $(timestamp)"
php panini.php 10.0286 liw
((number++))
echo "$number - Processing 10.0286 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0286 ASIrliN
((number++))
echo "$number - Processing 01.1008 law analysis started at $(timestamp)"
php panini.php 01.1008 law
((number++))
echo "$number - Processing 01.1008 liw analysis started at $(timestamp)"
php panini.php 01.1008 liw
((number++))
echo "$number - Processing 01.1008 luw analysis started at $(timestamp)"
php panini.php 01.1008 luw
((number++))
echo "$number - Processing 01.1008 lfw analysis started at $(timestamp)"
php panini.php 01.1008 lfw
((number++))
echo "$number - Processing 01.1008 low analysis started at $(timestamp)"
php panini.php 01.1008 low
((number++))
echo "$number - Processing 01.1008 laN analysis started at $(timestamp)"
php panini.php 01.1008 laN
((number++))
echo "$number - Processing 01.1008 viDiliN analysis started at $(timestamp)"
php panini.php 01.1008 viDiliN
((number++))
echo "$number - Processing 01.1006 liw analysis started at $(timestamp)"
php panini.php 01.1006 liw
((number++))
echo "$number - Processing 01.1010 law analysis started at $(timestamp)"
php panini.php 01.1010 law
((number++))
echo "$number - Processing 01.1010 liw analysis started at $(timestamp)"
php panini.php 01.1010 liw
((number++))
echo "$number - Processing 01.1010 luw analysis started at $(timestamp)"
php panini.php 01.1010 luw
((number++))
echo "$number - Processing 01.1010 lfw analysis started at $(timestamp)"
php panini.php 01.1010 lfw
((number++))
echo "$number - Processing 01.1010 low analysis started at $(timestamp)"
php panini.php 01.1010 low
((number++))
echo "$number - Processing 01.1010 laN analysis started at $(timestamp)"
php panini.php 01.1010 laN
((number++))
echo "$number - Processing 01.1010 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1010 ASIrliN
((number++))
echo "$number - Processing 01.1010 viDiliN analysis started at $(timestamp)"
php panini.php 01.1010 viDiliN
((number++))
echo "$number - Processing 01.1010 luN analysis started at $(timestamp)"
php panini.php 01.1010 luN
((number++))
echo "$number - Processing 01.1010 lfN analysis started at $(timestamp)"
php panini.php 01.1010 lfN
((number++))
echo "$number - Processing 06.0165 laN analysis started at $(timestamp)"
php panini.php 06.0165 laN
((number++))
echo "$number - Processing 06.0165 viDiliN analysis started at $(timestamp)"
php panini.php 06.0165 viDiliN
((number++))
echo "$number - Processing 06.0165 luN analysis started at $(timestamp)"
php panini.php 06.0165 luN
((number++))
echo "$number - Processing 01.0824 liw analysis started at $(timestamp)"
php panini.php 01.0824 liw
((number++))
echo "$number - Processing 10.0466 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0466 ASIrliN
((number++))
echo "$number - Processing 10.0032 luN analysis started at $(timestamp)"
php panini.php 10.0032 luN
((number++))
echo "$number - Processing 04.0004 low analysis started at $(timestamp)"
php panini.php 04.0004 low
((number++))
echo "$number - Processing 04.0004 viDiliN analysis started at $(timestamp)"
php panini.php 04.0004 viDiliN
((number++))
echo "$number - Processing 09.0361 luw analysis started at $(timestamp)"
php panini.php 09.0361 luw
((number++))
echo "$number - Processing 09.0361 lfw analysis started at $(timestamp)"
php panini.php 09.0361 lfw
((number++))
echo "$number - Processing 09.0361 luN analysis started at $(timestamp)"
php panini.php 09.0361 luN
((number++))
echo "$number - Processing 09.0361 lfN analysis started at $(timestamp)"
php panini.php 09.0361 lfN
((number++))
echo "$number - Processing 01.0166 law analysis started at $(timestamp)"
php panini.php 01.0166 law
((number++))
echo "$number - Processing 01.0166 liw analysis started at $(timestamp)"
php panini.php 01.0166 liw
((number++))
echo "$number - Processing 01.0166 luw analysis started at $(timestamp)"
php panini.php 01.0166 luw
((number++))
echo "$number - Processing 01.0166 lfw analysis started at $(timestamp)"
php panini.php 01.0166 lfw
((number++))
echo "$number - Processing 01.0166 low analysis started at $(timestamp)"
php panini.php 01.0166 low
((number++))
echo "$number - Processing 01.0166 laN analysis started at $(timestamp)"
php panini.php 01.0166 laN
((number++))
echo "$number - Processing 01.0166 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0166 ASIrliN
((number++))
echo "$number - Processing 01.0166 viDiliN analysis started at $(timestamp)"
php panini.php 01.0166 viDiliN
((number++))
echo "$number - Processing 01.0166 luN analysis started at $(timestamp)"
php panini.php 01.0166 luN
((number++))
echo "$number - Processing 01.0166 lfN analysis started at $(timestamp)"
php panini.php 01.0166 lfN
((number++))
echo "$number - Processing 01.0196 law analysis started at $(timestamp)"
php panini.php 01.0196 law
((number++))
echo "$number - Processing 01.0196 liw analysis started at $(timestamp)"
php panini.php 01.0196 liw
((number++))
echo "$number - Processing 01.0196 luw analysis started at $(timestamp)"
php panini.php 01.0196 luw
((number++))
echo "$number - Processing 01.0196 lfw analysis started at $(timestamp)"
php panini.php 01.0196 lfw
((number++))
echo "$number - Processing 01.0196 low analysis started at $(timestamp)"
php panini.php 01.0196 low
((number++))
echo "$number - Processing 01.0196 laN analysis started at $(timestamp)"
php panini.php 01.0196 laN
((number++))
echo "$number - Processing 01.0196 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0196 ASIrliN
((number++))
echo "$number - Processing 01.0196 viDiliN analysis started at $(timestamp)"
php panini.php 01.0196 viDiliN
((number++))
echo "$number - Processing 01.0196 luN analysis started at $(timestamp)"
php panini.php 01.0196 luN
((number++))
echo "$number - Processing 01.0196 lfN analysis started at $(timestamp)"
php panini.php 01.0196 lfN
((number++))
echo "$number - Processing 01.0366 liw analysis started at $(timestamp)"
php panini.php 01.0366 liw
((number++))
echo "$number - Processing 01.0364 law analysis started at $(timestamp)"
php panini.php 01.0364 law
((number++))
echo "$number - Processing 01.0364 liw analysis started at $(timestamp)"
php panini.php 01.0364 liw
((number++))
echo "$number - Processing 01.0364 luw analysis started at $(timestamp)"
php panini.php 01.0364 luw
((number++))
echo "$number - Processing 01.0364 lfw analysis started at $(timestamp)"
php panini.php 01.0364 lfw
((number++))
echo "$number - Processing 01.0364 low analysis started at $(timestamp)"
php panini.php 01.0364 low
((number++))
echo "$number - Processing 01.0364 laN analysis started at $(timestamp)"
php panini.php 01.0364 laN
((number++))
echo "$number - Processing 01.0364 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0364 ASIrliN
((number++))
echo "$number - Processing 01.0364 viDiliN analysis started at $(timestamp)"
php panini.php 01.0364 viDiliN
((number++))
echo "$number - Processing 01.0364 luN analysis started at $(timestamp)"
php panini.php 01.0364 luN
((number++))
echo "$number - Processing 01.0364 lfN analysis started at $(timestamp)"
php panini.php 01.0364 lfN
((number++))
echo "$number - Processing 06.0069 luN analysis started at $(timestamp)"
php panini.php 06.0069 luN
((number++))
echo "$number - Processing 01.0240 law analysis started at $(timestamp)"
php panini.php 01.0240 law
((number++))
echo "$number - Processing 01.0240 liw analysis started at $(timestamp)"
php panini.php 01.0240 liw
((number++))
echo "$number - Processing 01.0240 luw analysis started at $(timestamp)"
php panini.php 01.0240 luw
((number++))
echo "$number - Processing 01.0240 lfw analysis started at $(timestamp)"
php panini.php 01.0240 lfw
((number++))
echo "$number - Processing 01.0240 low analysis started at $(timestamp)"
php panini.php 01.0240 low
((number++))
echo "$number - Processing 01.0240 laN analysis started at $(timestamp)"
php panini.php 01.0240 laN
((number++))
echo "$number - Processing 01.0240 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0240 ASIrliN
((number++))
echo "$number - Processing 01.0240 viDiliN analysis started at $(timestamp)"
php panini.php 01.0240 viDiliN
((number++))
echo "$number - Processing 01.0240 luN analysis started at $(timestamp)"
php panini.php 01.0240 luN
((number++))
echo "$number - Processing 01.0240 lfN analysis started at $(timestamp)"
php panini.php 01.0240 lfN
((number++))
echo "$number - Processing 01.0656 liw analysis started at $(timestamp)"
php panini.php 01.0656 liw
((number++))
echo "$number - Processing 10.0126 luw analysis started at $(timestamp)"
php panini.php 10.0126 luw
((number++))
echo "$number - Processing 10.0126 lfw analysis started at $(timestamp)"
php panini.php 10.0126 lfw
((number++))
echo "$number - Processing 10.0126 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0126 ASIrliN
((number++))
echo "$number - Processing 10.0126 viDiliN analysis started at $(timestamp)"
php panini.php 10.0126 viDiliN
((number++))
echo "$number - Processing 10.0126 luN analysis started at $(timestamp)"
php panini.php 10.0126 luN
((number++))
echo "$number - Processing 10.0126 lfN analysis started at $(timestamp)"
php panini.php 10.0126 lfN
((number++))
echo "$number - Processing 04.0095 law analysis started at $(timestamp)"
php panini.php 04.0095 law
((number++))
echo "$number - Processing 04.0095 liw analysis started at $(timestamp)"
php panini.php 04.0095 liw
((number++))
echo "$number - Processing 04.0095 luw analysis started at $(timestamp)"
php panini.php 04.0095 luw
((number++))
echo "$number - Processing 04.0095 lfw analysis started at $(timestamp)"
php panini.php 04.0095 lfw
((number++))
echo "$number - Processing 04.0095 low analysis started at $(timestamp)"
php panini.php 04.0095 low
((number++))
echo "$number - Processing 04.0095 laN analysis started at $(timestamp)"
php panini.php 04.0095 laN
((number++))
echo "$number - Processing 04.0095 viDiliN analysis started at $(timestamp)"
php panini.php 04.0095 viDiliN
((number++))
echo "$number - Processing 09.0015 law analysis started at $(timestamp)"
php panini.php 09.0015 law
((number++))
echo "$number - Processing 09.0015 liw analysis started at $(timestamp)"
php panini.php 09.0015 liw
((number++))
echo "$number - Processing 09.0015 low analysis started at $(timestamp)"
php panini.php 09.0015 low
((number++))
echo "$number - Processing 09.0015 laN analysis started at $(timestamp)"
php panini.php 09.0015 laN
((number++))
echo "$number - Processing 09.0015 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0015 ASIrliN
((number++))
echo "$number - Processing 09.0015 viDiliN analysis started at $(timestamp)"
php panini.php 09.0015 viDiliN
((number++))
echo "$number - Processing 09.0015 luN analysis started at $(timestamp)"
php panini.php 09.0015 luN
((number++))
echo "$number - Processing 01.1122 luN analysis started at $(timestamp)"
php panini.php 01.1122 luN
((number++))
echo "$number - Processing 10.0451 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0451 ASIrliN
((number++))
echo "$number - Processing 10.0442 law analysis started at $(timestamp)"
php panini.php 10.0442 law
((number++))
echo "$number - Processing 10.0442 liw analysis started at $(timestamp)"
php panini.php 10.0442 liw
((number++))
echo "$number - Processing 10.0442 luw analysis started at $(timestamp)"
php panini.php 10.0442 luw
((number++))
echo "$number - Processing 10.0442 lfw analysis started at $(timestamp)"
php panini.php 10.0442 lfw
((number++))
echo "$number - Processing 10.0442 low analysis started at $(timestamp)"
php panini.php 10.0442 low
((number++))
echo "$number - Processing 10.0442 laN analysis started at $(timestamp)"
php panini.php 10.0442 laN
((number++))
echo "$number - Processing 10.0442 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0442 ASIrliN
((number++))
echo "$number - Processing 10.0442 viDiliN analysis started at $(timestamp)"
php panini.php 10.0442 viDiliN
((number++))
echo "$number - Processing 10.0442 lfN analysis started at $(timestamp)"
php panini.php 10.0442 lfN
((number++))
echo "$number - Processing 02.0386 law analysis started at $(timestamp)"
php panini.php 02.0386 law
((number++))
echo "$number - Processing 02.0386 liw analysis started at $(timestamp)"
php panini.php 02.0386 liw
((number++))
echo "$number - Processing 02.0386 laN analysis started at $(timestamp)"
php panini.php 02.0386 laN
((number++))
echo "$number - Processing 09.0052 law analysis started at $(timestamp)"
php panini.php 09.0052 law
((number++))
echo "$number - Processing 09.0052 low analysis started at $(timestamp)"
php panini.php 09.0052 low
((number++))
echo "$number - Processing 09.0052 laN analysis started at $(timestamp)"
php panini.php 09.0052 laN
((number++))
echo "$number - Processing 09.0052 viDiliN analysis started at $(timestamp)"
php panini.php 09.0052 viDiliN
((number++))
echo "$number - Processing 06.0053 liw analysis started at $(timestamp)"
php panini.php 06.0053 liw
((number++))
echo "$number - Processing 06.0053 luw analysis started at $(timestamp)"
php panini.php 06.0053 luw
((number++))
echo "$number - Processing 06.0053 lfw analysis started at $(timestamp)"
php panini.php 06.0053 lfw
((number++))
echo "$number - Processing 06.0053 lfN analysis started at $(timestamp)"
php panini.php 06.0053 lfN
((number++))
echo "$number - Processing 10.0165 law analysis started at $(timestamp)"
php panini.php 10.0165 law
((number++))
echo "$number - Processing 10.0165 liw analysis started at $(timestamp)"
php panini.php 10.0165 liw
((number++))
echo "$number - Processing 10.0165 luw analysis started at $(timestamp)"
php panini.php 10.0165 luw
((number++))
echo "$number - Processing 10.0165 lfw analysis started at $(timestamp)"
php panini.php 10.0165 lfw
((number++))
echo "$number - Processing 10.0165 low analysis started at $(timestamp)"
php panini.php 10.0165 low
((number++))
echo "$number - Processing 10.0165 laN analysis started at $(timestamp)"
php panini.php 10.0165 laN
((number++))
echo "$number - Processing 10.0165 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0165 ASIrliN
((number++))
echo "$number - Processing 10.0165 viDiliN analysis started at $(timestamp)"
php panini.php 10.0165 viDiliN
((number++))
echo "$number - Processing 10.0165 luN analysis started at $(timestamp)"
php panini.php 10.0165 luN
((number++))
echo "$number - Processing 10.0165 lfN analysis started at $(timestamp)"
php panini.php 10.0165 lfN
((number++))
echo "$number - Processing 09.0051 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0051 ASIrliN
((number++))
echo "$number - Processing 06.0161 lfN analysis started at $(timestamp)"
php panini.php 06.0161 lfN
((number++))
echo "$number - Processing 04.0387 luN analysis started at $(timestamp)"
php panini.php 04.0387 luN
((number++))
echo "$number - Processing 09.0025 liw analysis started at $(timestamp)"
php panini.php 09.0025 liw
((number++))
echo "$number - Processing 09.0025 low analysis started at $(timestamp)"
php panini.php 09.0025 low
((number++))
echo "$number - Processing 01.1009 law analysis started at $(timestamp)"
php panini.php 01.1009 law
((number++))
echo "$number - Processing 01.1009 liw analysis started at $(timestamp)"
php panini.php 01.1009 liw
((number++))
echo "$number - Processing 01.1009 luw analysis started at $(timestamp)"
php panini.php 01.1009 luw
((number++))
echo "$number - Processing 01.1009 lfw analysis started at $(timestamp)"
php panini.php 01.1009 lfw
((number++))
echo "$number - Processing 01.1009 low analysis started at $(timestamp)"
php panini.php 01.1009 low
((number++))
echo "$number - Processing 01.1009 laN analysis started at $(timestamp)"
php panini.php 01.1009 laN
((number++))
echo "$number - Processing 01.1009 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1009 ASIrliN
((number++))
echo "$number - Processing 01.1009 viDiliN analysis started at $(timestamp)"
php panini.php 01.1009 viDiliN
((number++))
echo "$number - Processing 01.1011 law analysis started at $(timestamp)"
php panini.php 01.1011 law
((number++))
echo "$number - Processing 01.1011 liw analysis started at $(timestamp)"
php panini.php 01.1011 liw
((number++))
echo "$number - Processing 01.1011 luw analysis started at $(timestamp)"
php panini.php 01.1011 luw
((number++))
echo "$number - Processing 01.1011 lfw analysis started at $(timestamp)"
php panini.php 01.1011 lfw
((number++))
echo "$number - Processing 01.1011 low analysis started at $(timestamp)"
php panini.php 01.1011 low
((number++))
echo "$number - Processing 01.1011 laN analysis started at $(timestamp)"
php panini.php 01.1011 laN
((number++))
echo "$number - Processing 01.1011 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1011 ASIrliN
((number++))
echo "$number - Processing 01.1011 viDiliN analysis started at $(timestamp)"
php panini.php 01.1011 viDiliN
((number++))
echo "$number - Processing 01.1011 luN analysis started at $(timestamp)"
php panini.php 01.1011 luN
((number++))
echo "$number - Processing 01.1011 lfN analysis started at $(timestamp)"
php panini.php 01.1011 lfN
((number++))
echo "$number - Processing 01.0429 laN analysis started at $(timestamp)"
php panini.php 01.0429 laN
((number++))
echo "$number - Processing 10.0256 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0256 ASIrliN
((number++))
echo "$number - Processing 01.1078 lfN analysis started at $(timestamp)"
php panini.php 01.1078 lfN
((number++))
echo "$number - Processing 10.0168 law analysis started at $(timestamp)"
php panini.php 10.0168 law
((number++))
echo "$number - Processing 10.0168 liw analysis started at $(timestamp)"
php panini.php 10.0168 liw
((number++))
echo "$number - Processing 10.0168 luw analysis started at $(timestamp)"
php panini.php 10.0168 luw
((number++))
echo "$number - Processing 10.0168 lfw analysis started at $(timestamp)"
php panini.php 10.0168 lfw
((number++))
echo "$number - Processing 10.0168 low analysis started at $(timestamp)"
php panini.php 10.0168 low
((number++))
echo "$number - Processing 10.0168 laN analysis started at $(timestamp)"
php panini.php 10.0168 laN
((number++))
echo "$number - Processing 10.0168 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0168 ASIrliN
((number++))
echo "$number - Processing 10.0168 viDiliN analysis started at $(timestamp)"
php panini.php 10.0168 viDiliN
((number++))
echo "$number - Processing 10.0168 luN analysis started at $(timestamp)"
php panini.php 10.0168 luN
((number++))
echo "$number - Processing 10.0168 lfN analysis started at $(timestamp)"
php panini.php 10.0168 lfN
((number++))
echo "$number - Processing 10.0171 law analysis started at $(timestamp)"
php panini.php 10.0171 law
((number++))
echo "$number - Processing 10.0171 liw analysis started at $(timestamp)"
php panini.php 10.0171 liw
((number++))
echo "$number - Processing 10.0171 luw analysis started at $(timestamp)"
php panini.php 10.0171 luw
((number++))
echo "$number - Processing 10.0171 lfw analysis started at $(timestamp)"
php panini.php 10.0171 lfw
((number++))
echo "$number - Processing 10.0171 low analysis started at $(timestamp)"
php panini.php 10.0171 low
((number++))
echo "$number - Processing 10.0171 laN analysis started at $(timestamp)"
php panini.php 10.0171 laN
((number++))
echo "$number - Processing 10.0171 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0171 ASIrliN
((number++))
echo "$number - Processing 10.0171 viDiliN analysis started at $(timestamp)"
php panini.php 10.0171 viDiliN
((number++))
echo "$number - Processing 10.0171 luN analysis started at $(timestamp)"
php panini.php 10.0171 luN
((number++))
echo "$number - Processing 10.0171 lfN analysis started at $(timestamp)"
php panini.php 10.0171 lfN
((number++))
echo "$number - Processing 10.0169 law analysis started at $(timestamp)"
php panini.php 10.0169 law
((number++))
echo "$number - Processing 10.0169 liw analysis started at $(timestamp)"
php panini.php 10.0169 liw
((number++))
echo "$number - Processing 10.0169 luw analysis started at $(timestamp)"
php panini.php 10.0169 luw
((number++))
echo "$number - Processing 10.0169 lfw analysis started at $(timestamp)"
php panini.php 10.0169 lfw
((number++))
echo "$number - Processing 10.0169 low analysis started at $(timestamp)"
php panini.php 10.0169 low
((number++))
echo "$number - Processing 10.0169 laN analysis started at $(timestamp)"
php panini.php 10.0169 laN
((number++))
echo "$number - Processing 10.0169 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0169 ASIrliN
((number++))
echo "$number - Processing 10.0169 viDiliN analysis started at $(timestamp)"
php panini.php 10.0169 viDiliN
((number++))
echo "$number - Processing 10.0169 luN analysis started at $(timestamp)"
php panini.php 10.0169 luN
((number++))
echo "$number - Processing 10.0169 lfN analysis started at $(timestamp)"
php panini.php 10.0169 lfN
((number++))
echo "$number - Processing 01.0222 law analysis started at $(timestamp)"
php panini.php 01.0222 law
((number++))
echo "$number - Processing 01.0220 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0220 ASIrliN
((number++))
echo "$number - Processing 01.0327 law analysis started at $(timestamp)"
php panini.php 01.0327 law
((number++))
echo "$number - Processing 01.0327 liw analysis started at $(timestamp)"
php panini.php 01.0327 liw
((number++))
echo "$number - Processing 01.0327 luw analysis started at $(timestamp)"
php panini.php 01.0327 luw
((number++))
echo "$number - Processing 01.0327 lfw analysis started at $(timestamp)"
php panini.php 01.0327 lfw
((number++))
echo "$number - Processing 01.0327 low analysis started at $(timestamp)"
php panini.php 01.0327 low
((number++))
echo "$number - Processing 01.0327 laN analysis started at $(timestamp)"
php panini.php 01.0327 laN
((number++))
echo "$number - Processing 01.0327 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0327 ASIrliN
((number++))
echo "$number - Processing 01.0327 viDiliN analysis started at $(timestamp)"
php panini.php 01.0327 viDiliN
((number++))
echo "$number - Processing 01.0327 luN analysis started at $(timestamp)"
php panini.php 01.0327 luN
((number++))
echo "$number - Processing 01.0327 lfN analysis started at $(timestamp)"
php panini.php 01.0327 lfN
((number++))
echo "$number - Processing 01.0223 luN analysis started at $(timestamp)"
php panini.php 01.0223 luN
((number++))
echo "$number - Processing 01.0221 lfN analysis started at $(timestamp)"
php panini.php 01.0221 lfN
((number++))
echo "$number - Processing 10.0170 liw analysis started at $(timestamp)"
php panini.php 10.0170 liw
((number++))
echo "$number - Processing 10.0170 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0170 ASIrliN
((number++))
echo "$number - Processing 01.0329 lfN analysis started at $(timestamp)"
php panini.php 01.0329 lfN
((number++))
echo "$number - Processing 10.0215 luN analysis started at $(timestamp)"
php panini.php 10.0215 luN
((number++))
echo "$number - Processing 01.0030 luN analysis started at $(timestamp)"
php panini.php 01.0030 luN
((number++))
echo "$number - Processing 10.0003 luN analysis started at $(timestamp)"
php panini.php 10.0003 luN
((number++))
echo "$number - Processing 04.0107 lfN analysis started at $(timestamp)"
php panini.php 04.0107 lfN
((number++))
echo "$number - Processing 02.0044 liw analysis started at $(timestamp)"
php panini.php 02.0044 liw
((number++))
echo "$number - Processing 01.1001 liw analysis started at $(timestamp)"
php panini.php 01.1001 liw
((number++))
echo "$number - Processing 01.0242 liw analysis started at $(timestamp)"
php panini.php 01.0242 liw
((number++))
echo "$number - Processing 07.0338 law analysis started at $(timestamp)"
php panini.php 07.0338 law
((number++))
echo "$number - Processing 01.0031 luN analysis started at $(timestamp)"
php panini.php 01.0031 luN
((number++))
echo "$number - Processing 01.0702 law analysis started at $(timestamp)"
php panini.php 01.0702 law
((number++))
echo "$number - Processing 01.0702 liw analysis started at $(timestamp)"
php panini.php 01.0702 liw
((number++))
echo "$number - Processing 01.0702 low analysis started at $(timestamp)"
php panini.php 01.0702 low
((number++))
echo "$number - Processing 01.0702 laN analysis started at $(timestamp)"
php panini.php 01.0702 laN
((number++))
echo "$number - Processing 01.0702 viDiliN analysis started at $(timestamp)"
php panini.php 01.0702 viDiliN
((number++))
echo "$number - Processing 01.0702 luN analysis started at $(timestamp)"
php panini.php 01.0702 luN
((number++))
echo "$number - Processing 01.0326 lfN analysis started at $(timestamp)"
php panini.php 01.0326 lfN
((number++))
echo "$number - Processing 10.0265 low analysis started at $(timestamp)"
php panini.php 10.0265 low
((number++))
echo "$number - Processing 10.0264 luN analysis started at $(timestamp)"
php panini.php 10.0264 luN
((number++))
echo "$number - Processing 10.0397 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0397 ASIrliN
((number++))
echo "$number - Processing 01.0153 law analysis started at $(timestamp)"
php panini.php 01.0153 law
((number++))
echo "$number - Processing 01.0153 liw analysis started at $(timestamp)"
php panini.php 01.0153 liw
((number++))
echo "$number - Processing 01.0153 luw analysis started at $(timestamp)"
php panini.php 01.0153 luw
((number++))
echo "$number - Processing 01.0153 lfw analysis started at $(timestamp)"
php panini.php 01.0153 lfw
((number++))
echo "$number - Processing 01.0153 low analysis started at $(timestamp)"
php panini.php 01.0153 low
((number++))
echo "$number - Processing 01.0153 laN analysis started at $(timestamp)"
php panini.php 01.0153 laN
((number++))
echo "$number - Processing 01.0153 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0153 ASIrliN
((number++))
echo "$number - Processing 01.0153 viDiliN analysis started at $(timestamp)"
php panini.php 01.0153 viDiliN
((number++))
echo "$number - Processing 01.0153 luN analysis started at $(timestamp)"
php panini.php 01.0153 luN
((number++))
echo "$number - Processing 01.0153 lfN analysis started at $(timestamp)"
php panini.php 01.0153 lfN
((number++))
echo "$number - Processing 01.0112 law analysis started at $(timestamp)"
php panini.php 01.0112 law
((number++))
echo "$number - Processing 01.0112 luN analysis started at $(timestamp)"
php panini.php 01.0112 luN
((number++))
echo "$number - Processing 04.0063 law analysis started at $(timestamp)"
php panini.php 04.0063 law
((number++))
echo "$number - Processing 04.0063 low analysis started at $(timestamp)"
php panini.php 04.0063 low
((number++))
echo "$number - Processing 04.0063 laN analysis started at $(timestamp)"
php panini.php 04.0063 laN
((number++))
echo "$number - Processing 04.0063 viDiliN analysis started at $(timestamp)"
php panini.php 04.0063 viDiliN
((number++))
echo "$number - Processing 04.0063 lfN analysis started at $(timestamp)"
php panini.php 04.0063 lfN
((number++))
echo "$number - Processing 01.1154 law analysis started at $(timestamp)"
php panini.php 01.1154 law
((number++))
echo "$number - Processing 01.1154 low analysis started at $(timestamp)"
php panini.php 01.1154 low
((number++))
echo "$number - Processing 01.1154 laN analysis started at $(timestamp)"
php panini.php 01.1154 laN
((number++))
echo "$number - Processing 01.1154 viDiliN analysis started at $(timestamp)"
php panini.php 01.1154 viDiliN
((number++))
echo "$number - Processing 01.1154 lfN analysis started at $(timestamp)"
php panini.php 01.1154 lfN
((number++))
echo "$number - Processing 10.0462 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0462 ASIrliN
((number++))
echo "$number - Processing 01.0334 lfN analysis started at $(timestamp)"
php panini.php 01.0334 lfN
((number++))
echo "$number - Processing 01.0387 lfN analysis started at $(timestamp)"
php panini.php 01.0387 lfN
((number++))
echo "$number - Processing 01.0386 lfN analysis started at $(timestamp)"
php panini.php 01.0386 lfN
((number++))
echo "$number - Processing 01.0680 lfN analysis started at $(timestamp)"
php panini.php 01.0680 lfN
((number++))
echo "$number - Processing 04.0090 liw analysis started at $(timestamp)"
php panini.php 04.0090 liw
((number++))
echo "$number - Processing 04.0090 luw analysis started at $(timestamp)"
php panini.php 04.0090 luw
((number++))
echo "$number - Processing 01.0467 lfN analysis started at $(timestamp)"
php panini.php 01.0467 lfN
((number++))
echo "$number - Processing 01.0479 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0479 ASIrliN
((number++))
echo "$number - Processing 01.0479 lfN analysis started at $(timestamp)"
php panini.php 01.0479 lfN
((number++))
echo "$number - Processing 01.1129 luw analysis started at $(timestamp)"
php panini.php 01.1129 luw
((number++))
echo "$number - Processing 01.1129 lfw analysis started at $(timestamp)"
php panini.php 01.1129 lfw
((number++))
echo "$number - Processing 01.1129 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1129 ASIrliN
((number++))
echo "$number - Processing 01.1129 lfN analysis started at $(timestamp)"
php panini.php 01.1129 lfN
((number++))
echo "$number - Processing 01.0436 luN analysis started at $(timestamp)"
php panini.php 01.0436 luN
((number++))
echo "$number - Processing 01.0449 luN analysis started at $(timestamp)"
php panini.php 01.0449 luN
((number++))
echo "$number - Processing 01.0554 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0554 ASIrliN
((number++))
echo "$number - Processing 01.0554 luN analysis started at $(timestamp)"
php panini.php 01.0554 luN
((number++))
echo "$number - Processing 01.0810 liw analysis started at $(timestamp)"
php panini.php 01.0810 liw
((number++))
echo "$number - Processing 01.0832 law analysis started at $(timestamp)"
php panini.php 01.0832 law
((number++))
echo "$number - Processing 01.0130 law analysis started at $(timestamp)"
php panini.php 01.0130 law
((number++))
echo "$number - Processing 01.0130 liw analysis started at $(timestamp)"
php panini.php 01.0130 liw
((number++))
echo "$number - Processing 01.0130 luw analysis started at $(timestamp)"
php panini.php 01.0130 luw
((number++))
echo "$number - Processing 01.0130 lfw analysis started at $(timestamp)"
php panini.php 01.0130 lfw
((number++))
echo "$number - Processing 01.0130 low analysis started at $(timestamp)"
php panini.php 01.0130 low
((number++))
echo "$number - Processing 01.0130 laN analysis started at $(timestamp)"
php panini.php 01.0130 laN
((number++))
echo "$number - Processing 01.0130 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0130 ASIrliN
((number++))
echo "$number - Processing 01.0130 viDiliN analysis started at $(timestamp)"
php panini.php 01.0130 viDiliN
((number++))
echo "$number - Processing 01.0130 lfN analysis started at $(timestamp)"
php panini.php 01.0130 lfN
((number++))
echo "$number - Processing 01.0118 luN analysis started at $(timestamp)"
php panini.php 01.0118 luN
((number++))
echo "$number - Processing 01.0956 luN analysis started at $(timestamp)"
php panini.php 01.0956 luN
((number++))
echo "$number - Processing 01.0713 law analysis started at $(timestamp)"
php panini.php 01.0713 law
((number++))
echo "$number - Processing 01.0713 liw analysis started at $(timestamp)"
php panini.php 01.0713 liw
((number++))
echo "$number - Processing 01.0713 low analysis started at $(timestamp)"
php panini.php 01.0713 low
((number++))
echo "$number - Processing 01.0713 laN analysis started at $(timestamp)"
php panini.php 01.0713 laN
((number++))
echo "$number - Processing 01.0713 viDiliN analysis started at $(timestamp)"
php panini.php 01.0713 viDiliN
((number++))
echo "$number - Processing 01.0713 luN analysis started at $(timestamp)"
php panini.php 01.0713 luN
((number++))
echo "$number - Processing 05.0032 viDiliN analysis started at $(timestamp)"
php panini.php 05.0032 viDiliN
((number++))
echo "$number - Processing 05.0032 luN analysis started at $(timestamp)"
php panini.php 05.0032 luN
((number++))
echo "$number - Processing 01.0168 law analysis started at $(timestamp)"
php panini.php 01.0168 law
((number++))
echo "$number - Processing 01.0168 liw analysis started at $(timestamp)"
php panini.php 01.0168 liw
((number++))
echo "$number - Processing 01.0168 luw analysis started at $(timestamp)"
php panini.php 01.0168 luw
((number++))
echo "$number - Processing 01.0168 lfw analysis started at $(timestamp)"
php panini.php 01.0168 lfw
((number++))
echo "$number - Processing 01.0168 low analysis started at $(timestamp)"
php panini.php 01.0168 low
((number++))
echo "$number - Processing 01.0168 laN analysis started at $(timestamp)"
php panini.php 01.0168 laN
((number++))
echo "$number - Processing 01.0168 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0168 ASIrliN
((number++))
echo "$number - Processing 01.0168 viDiliN analysis started at $(timestamp)"
php panini.php 01.0168 viDiliN
((number++))
echo "$number - Processing 01.0168 luN analysis started at $(timestamp)"
php panini.php 01.0168 luN
((number++))
echo "$number - Processing 01.0168 lfN analysis started at $(timestamp)"
php panini.php 01.0168 lfN
((number++))
echo "$number - Processing 01.0169 law analysis started at $(timestamp)"
php panini.php 01.0169 law
((number++))
echo "$number - Processing 01.0169 liw analysis started at $(timestamp)"
php panini.php 01.0169 liw
((number++))
echo "$number - Processing 01.0169 luw analysis started at $(timestamp)"
php panini.php 01.0169 luw
((number++))
echo "$number - Processing 01.0169 lfw analysis started at $(timestamp)"
php panini.php 01.0169 lfw
((number++))
echo "$number - Processing 01.0169 low analysis started at $(timestamp)"
php panini.php 01.0169 low
((number++))
echo "$number - Processing 01.0169 laN analysis started at $(timestamp)"
php panini.php 01.0169 laN
((number++))
echo "$number - Processing 01.0169 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0169 ASIrliN
((number++))
echo "$number - Processing 01.0169 viDiliN analysis started at $(timestamp)"
php panini.php 01.0169 viDiliN
((number++))
echo "$number - Processing 01.0169 luN analysis started at $(timestamp)"
php panini.php 01.0169 luN
((number++))
echo "$number - Processing 01.0169 lfN analysis started at $(timestamp)"
php panini.php 01.0169 lfN
((number++))
echo "$number - Processing 07.0348 law analysis started at $(timestamp)"
php panini.php 07.0348 law
((number++))
echo "$number - Processing 01.0679 lfN analysis started at $(timestamp)"
php panini.php 01.0679 lfN
((number++))
echo "$number - Processing 06.0156 viDiliN analysis started at $(timestamp)"
php panini.php 06.0156 viDiliN
((number++))
echo "$number - Processing 04.0144 law analysis started at $(timestamp)"
php panini.php 04.0144 law
((number++))
echo "$number - Processing 04.0144 low analysis started at $(timestamp)"
php panini.php 04.0144 low
((number++))
echo "$number - Processing 04.0144 laN analysis started at $(timestamp)"
php panini.php 04.0144 laN
((number++))
echo "$number - Processing 04.0144 viDiliN analysis started at $(timestamp)"
php panini.php 04.0144 viDiliN
((number++))
echo "$number - Processing 06.0027 lfN analysis started at $(timestamp)"
php panini.php 06.0027 lfN
((number++))
echo "$number - Processing 04.0033 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0033 ASIrliN
((number++))
echo "$number - Processing 04.0033 luN analysis started at $(timestamp)"
php panini.php 04.0033 luN
((number++))
echo "$number - Processing 01.0319 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0319 ASIrliN
((number++))
echo "$number - Processing 01.0319 luN analysis started at $(timestamp)"
php panini.php 01.0319 luN
((number++))
echo "$number - Processing 10.1114 liw analysis started at $(timestamp)"
php panini.php 10.1114 liw
((number++))
echo "$number - Processing 10.1114 laN analysis started at $(timestamp)"
php panini.php 10.1114 laN
((number++))
echo "$number - Processing 10.1114 ASIrliN analysis started at $(timestamp)"
php panini.php 10.1114 ASIrliN
((number++))
echo "$number - Processing 10.1114 lfN analysis started at $(timestamp)"
php panini.php 10.1114 lfN
((number++))
echo "$number - Processing 06.0335 liw analysis started at $(timestamp)"
php panini.php 06.0335 liw
((number++))
echo "$number - Processing 06.0335 luw analysis started at $(timestamp)"
php panini.php 06.0335 luw
((number++))
echo "$number - Processing 06.0335 low analysis started at $(timestamp)"
php panini.php 06.0335 low
((number++))
echo "$number - Processing 06.0335 laN analysis started at $(timestamp)"
php panini.php 06.0335 laN
((number++))
echo "$number - Processing 06.0335 viDiliN analysis started at $(timestamp)"
php panini.php 06.0335 viDiliN
((number++))
echo "$number - Processing 10.0152 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0152 ASIrliN
((number++))
echo "$number - Processing 10.0152 luN analysis started at $(timestamp)"
php panini.php 10.0152 luN
((number++))
echo "$number - Processing 01.0849 law analysis started at $(timestamp)"
php panini.php 01.0849 law
((number++))
echo "$number - Processing 01.0849 liw analysis started at $(timestamp)"
php panini.php 01.0849 liw
((number++))
echo "$number - Processing 01.0849 low analysis started at $(timestamp)"
php panini.php 01.0849 low
((number++))
echo "$number - Processing 01.0849 laN analysis started at $(timestamp)"
php panini.php 01.0849 laN
((number++))
echo "$number - Processing 01.0849 viDiliN analysis started at $(timestamp)"
php panini.php 01.0849 viDiliN
((number++))
echo "$number - Processing 01.0849 luN analysis started at $(timestamp)"
php panini.php 01.0849 luN
((number++))
echo "$number - Processing 01.0371 lfN analysis started at $(timestamp)"
php panini.php 01.0371 lfN
((number++))
echo "$number - Processing 01.0400 law analysis started at $(timestamp)"
php panini.php 01.0400 law
((number++))
echo "$number - Processing 01.0373 law analysis started at $(timestamp)"
php panini.php 01.0373 law
((number++))
echo "$number - Processing 01.0375 law analysis started at $(timestamp)"
php panini.php 01.0375 law
((number++))
echo "$number - Processing 01.0375 liw analysis started at $(timestamp)"
php panini.php 01.0375 liw
((number++))
echo "$number - Processing 01.0375 luw analysis started at $(timestamp)"
php panini.php 01.0375 luw
((number++))
echo "$number - Processing 01.0375 lfw analysis started at $(timestamp)"
php panini.php 01.0375 lfw
((number++))
echo "$number - Processing 01.0375 low analysis started at $(timestamp)"
php panini.php 01.0375 low
((number++))
echo "$number - Processing 01.0375 laN analysis started at $(timestamp)"
php panini.php 01.0375 laN
((number++))
echo "$number - Processing 01.0375 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0375 ASIrliN
((number++))
echo "$number - Processing 01.0375 viDiliN analysis started at $(timestamp)"
php panini.php 01.0375 viDiliN
((number++))
echo "$number - Processing 01.0375 luN analysis started at $(timestamp)"
php panini.php 01.0375 luN
((number++))
echo "$number - Processing 01.0375 lfN analysis started at $(timestamp)"
php panini.php 01.0375 lfN
((number++))
echo "$number - Processing 07.0001 laN analysis started at $(timestamp)"
php panini.php 07.0001 laN
((number++))
echo "$number - Processing 04.0149 law analysis started at $(timestamp)"
php panini.php 04.0149 law
((number++))
echo "$number - Processing 04.0149 liw analysis started at $(timestamp)"
php panini.php 04.0149 liw
((number++))
echo "$number - Processing 04.0149 luw analysis started at $(timestamp)"
php panini.php 04.0149 luw
((number++))
echo "$number - Processing 04.0149 lfw analysis started at $(timestamp)"
php panini.php 04.0149 lfw
((number++))
echo "$number - Processing 04.0149 low analysis started at $(timestamp)"
php panini.php 04.0149 low
((number++))
echo "$number - Processing 04.0149 laN analysis started at $(timestamp)"
php panini.php 04.0149 laN
((number++))
echo "$number - Processing 04.0149 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0149 ASIrliN
((number++))
echo "$number - Processing 04.0149 viDiliN analysis started at $(timestamp)"
php panini.php 04.0149 viDiliN
((number++))
echo "$number - Processing 04.0149 luN analysis started at $(timestamp)"
php panini.php 04.0149 luN
((number++))
echo "$number - Processing 04.0149 lfN analysis started at $(timestamp)"
php panini.php 04.0149 lfN
((number++))
echo "$number - Processing 01.0995 viDiliN analysis started at $(timestamp)"
php panini.php 01.0995 viDiliN
((number++))
echo "$number - Processing 01.0772 lfN analysis started at $(timestamp)"
php panini.php 01.0772 lfN
((number++))
echo "$number - Processing 01.0085 law analysis started at $(timestamp)"
php panini.php 01.0085 law
((number++))
echo "$number - Processing 01.0085 liw analysis started at $(timestamp)"
php panini.php 01.0085 liw
((number++))
echo "$number - Processing 01.0085 low analysis started at $(timestamp)"
php panini.php 01.0085 low
((number++))
echo "$number - Processing 01.0085 laN analysis started at $(timestamp)"
php panini.php 01.0085 laN
((number++))
echo "$number - Processing 01.0085 viDiliN analysis started at $(timestamp)"
php panini.php 01.0085 viDiliN
((number++))
echo "$number - Processing 01.0085 luN analysis started at $(timestamp)"
php panini.php 01.0085 luN
((number++))
echo "$number - Processing 01.0206 law analysis started at $(timestamp)"
php panini.php 01.0206 law
((number++))
echo "$number - Processing 01.0206 liw analysis started at $(timestamp)"
php panini.php 01.0206 liw
((number++))
echo "$number - Processing 01.0206 luw analysis started at $(timestamp)"
php panini.php 01.0206 luw
((number++))
echo "$number - Processing 01.0206 lfw analysis started at $(timestamp)"
php panini.php 01.0206 lfw
((number++))
echo "$number - Processing 01.0206 low analysis started at $(timestamp)"
php panini.php 01.0206 low
((number++))
echo "$number - Processing 01.0206 laN analysis started at $(timestamp)"
php panini.php 01.0206 laN
((number++))
echo "$number - Processing 01.0206 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0206 ASIrliN
((number++))
echo "$number - Processing 01.0206 viDiliN analysis started at $(timestamp)"
php panini.php 01.0206 viDiliN
((number++))
echo "$number - Processing 01.0206 luN analysis started at $(timestamp)"
php panini.php 01.0206 luN
((number++))
echo "$number - Processing 01.0206 lfN analysis started at $(timestamp)"
php panini.php 01.0206 lfN
((number++))
echo "$number - Processing 01.1002 luN analysis started at $(timestamp)"
php panini.php 01.1002 luN
((number++))
echo "$number - Processing 01.0430 luN analysis started at $(timestamp)"
php panini.php 01.0430 luN
((number++))
echo "$number - Processing 01.0447 luN analysis started at $(timestamp)"
php panini.php 01.0447 luN
((number++))
echo "$number - Processing 01.0584 law analysis started at $(timestamp)"
php panini.php 01.0584 law
((number++))
echo "$number - Processing 01.0584 liw analysis started at $(timestamp)"
php panini.php 01.0584 liw
((number++))
echo "$number - Processing 01.0584 low analysis started at $(timestamp)"
php panini.php 01.0584 low
((number++))
echo "$number - Processing 01.0584 laN analysis started at $(timestamp)"
php panini.php 01.0584 laN
((number++))
echo "$number - Processing 01.0584 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0584 ASIrliN
((number++))
echo "$number - Processing 01.0584 viDiliN analysis started at $(timestamp)"
php panini.php 01.0584 viDiliN
((number++))
echo "$number - Processing 01.0584 luN analysis started at $(timestamp)"
php panini.php 01.0584 luN
((number++))
echo "$number - Processing 01.0707 luN analysis started at $(timestamp)"
php panini.php 01.0707 luN
((number++))
echo "$number - Processing 01.0412 law analysis started at $(timestamp)"
php panini.php 01.0412 law
((number++))
echo "$number - Processing 01.0412 liw analysis started at $(timestamp)"
php panini.php 01.0412 liw
((number++))
echo "$number - Processing 01.0412 luw analysis started at $(timestamp)"
php panini.php 01.0412 luw
((number++))
echo "$number - Processing 01.0412 lfw analysis started at $(timestamp)"
php panini.php 01.0412 lfw
((number++))
echo "$number - Processing 01.0412 low analysis started at $(timestamp)"
php panini.php 01.0412 low
((number++))
echo "$number - Processing 01.0412 laN analysis started at $(timestamp)"
php panini.php 01.0412 laN
((number++))
echo "$number - Processing 01.0412 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0412 ASIrliN
((number++))
echo "$number - Processing 01.0412 viDiliN analysis started at $(timestamp)"
php panini.php 01.0412 viDiliN
((number++))
echo "$number - Processing 01.0412 luN analysis started at $(timestamp)"
php panini.php 01.0412 luN
((number++))
echo "$number - Processing 01.0412 lfN analysis started at $(timestamp)"
php panini.php 01.0412 lfN
((number++))
echo "$number - Processing 01.0411 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0411 ASIrliN
((number++))
echo "$number - Processing 01.0411 lfN analysis started at $(timestamp)"
php panini.php 01.0411 lfN
((number++))
echo "$number - Processing 01.0146 luN analysis started at $(timestamp)"
php panini.php 01.0146 luN
((number++))
echo "$number - Processing 01.0154 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0154 ASIrliN
((number++))
echo "$number - Processing 01.0113 laN analysis started at $(timestamp)"
php panini.php 01.0113 laN
((number++))
echo "$number - Processing 01.0113 viDiliN analysis started at $(timestamp)"
php panini.php 01.0113 viDiliN
((number++))
echo "$number - Processing 01.0113 luN analysis started at $(timestamp)"
php panini.php 01.0113 luN
((number++))
echo "$number - Processing 01.0182 liw analysis started at $(timestamp)"
php panini.php 01.0182 liw
((number++))
echo "$number - Processing 01.0234 liw analysis started at $(timestamp)"
php panini.php 01.0234 liw
((number++))
echo "$number - Processing 01.0271 law analysis started at $(timestamp)"
php panini.php 01.0271 law
((number++))
echo "$number - Processing 01.0271 liw analysis started at $(timestamp)"
php panini.php 01.0271 liw
((number++))
echo "$number - Processing 01.0271 luw analysis started at $(timestamp)"
php panini.php 01.0271 luw
((number++))
echo "$number - Processing 01.0271 lfw analysis started at $(timestamp)"
php panini.php 01.0271 lfw
((number++))
echo "$number - Processing 01.0271 low analysis started at $(timestamp)"
php panini.php 01.0271 low
((number++))
echo "$number - Processing 01.0271 laN analysis started at $(timestamp)"
php panini.php 01.0271 laN
((number++))
echo "$number - Processing 01.0271 viDiliN analysis started at $(timestamp)"
php panini.php 01.0271 viDiliN
((number++))
echo "$number - Processing 01.0271 luN analysis started at $(timestamp)"
php panini.php 01.0271 luN
((number++))
echo "$number - Processing 01.0271 lfN analysis started at $(timestamp)"
php panini.php 01.0271 lfN
((number++))
echo "$number - Processing 06.0011 luN analysis started at $(timestamp)"
php panini.php 06.0011 luN
((number++))
echo "$number - Processing 01.0335 lfN analysis started at $(timestamp)"
php panini.php 01.0335 lfN
((number++))
echo "$number - Processing 01.1130 law analysis started at $(timestamp)"
php panini.php 01.1130 law
((number++))
echo "$number - Processing 01.1130 low analysis started at $(timestamp)"
php panini.php 01.1130 low
((number++))
echo "$number - Processing 01.1130 laN analysis started at $(timestamp)"
php panini.php 01.1130 laN
((number++))
echo "$number - Processing 01.1130 viDiliN analysis started at $(timestamp)"
php panini.php 01.1130 viDiliN
((number++))
echo "$number - Processing 01.0439 luN analysis started at $(timestamp)"
php panini.php 01.0439 luN
((number++))
echo "$number - Processing 01.0437 luN analysis started at $(timestamp)"
php panini.php 01.0437 luN
((number++))
echo "$number - Processing 01.0450 law analysis started at $(timestamp)"
php panini.php 01.0450 law
((number++))
echo "$number - Processing 01.0450 liw analysis started at $(timestamp)"
php panini.php 01.0450 liw
((number++))
echo "$number - Processing 01.0450 luw analysis started at $(timestamp)"
php panini.php 01.0450 luw
((number++))
echo "$number - Processing 01.0450 lfw analysis started at $(timestamp)"
php panini.php 01.0450 lfw
((number++))
echo "$number - Processing 01.0450 low analysis started at $(timestamp)"
php panini.php 01.0450 low
((number++))
echo "$number - Processing 01.0450 laN analysis started at $(timestamp)"
php panini.php 01.0450 laN
((number++))
echo "$number - Processing 01.0450 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0450 ASIrliN
((number++))
echo "$number - Processing 01.0450 viDiliN analysis started at $(timestamp)"
php panini.php 01.0450 viDiliN
((number++))
echo "$number - Processing 01.0450 luN analysis started at $(timestamp)"
php panini.php 01.0450 luN
((number++))
echo "$number - Processing 01.0450 lfN analysis started at $(timestamp)"
php panini.php 01.0450 lfN
((number++))
echo "$number - Processing 01.0555 liw analysis started at $(timestamp)"
php panini.php 01.0555 liw
((number++))
echo "$number - Processing 01.0555 luw analysis started at $(timestamp)"
php panini.php 01.0555 luw
((number++))
echo "$number - Processing 01.0555 lfw analysis started at $(timestamp)"
php panini.php 01.0555 lfw
((number++))
echo "$number - Processing 01.0555 laN analysis started at $(timestamp)"
php panini.php 01.0555 laN
((number++))
echo "$number - Processing 01.0555 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0555 ASIrliN
((number++))
echo "$number - Processing 01.0555 viDiliN analysis started at $(timestamp)"
php panini.php 01.0555 viDiliN
((number++))
echo "$number - Processing 01.0555 luN analysis started at $(timestamp)"
php panini.php 01.0555 luN
((number++))
echo "$number - Processing 01.0555 lfN analysis started at $(timestamp)"
php panini.php 01.0555 lfN
((number++))
echo "$number - Processing 01.0483 lfN analysis started at $(timestamp)"
php panini.php 01.0483 lfN
((number++))
echo "$number - Processing 01.0416 law analysis started at $(timestamp)"
php panini.php 01.0416 law
((number++))
echo "$number - Processing 01.0416 liw analysis started at $(timestamp)"
php panini.php 01.0416 liw
((number++))
echo "$number - Processing 01.0416 luw analysis started at $(timestamp)"
php panini.php 01.0416 luw
((number++))
echo "$number - Processing 01.0416 lfw analysis started at $(timestamp)"
php panini.php 01.0416 lfw
((number++))
echo "$number - Processing 01.0416 low analysis started at $(timestamp)"
php panini.php 01.0416 low
((number++))
echo "$number - Processing 01.0416 laN analysis started at $(timestamp)"
php panini.php 01.0416 laN
((number++))
echo "$number - Processing 01.0416 viDiliN analysis started at $(timestamp)"
php panini.php 01.0416 viDiliN
((number++))
echo "$number - Processing 01.0416 luN analysis started at $(timestamp)"
php panini.php 01.0416 luN
((number++))
echo "$number - Processing 01.0416 lfN analysis started at $(timestamp)"
php panini.php 01.0416 lfN
((number++))
echo "$number - Processing 01.0119 luN analysis started at $(timestamp)"
php panini.php 01.0119 luN
((number++))
echo "$number - Processing 01.0235 law analysis started at $(timestamp)"
php panini.php 01.0235 law
((number++))
echo "$number - Processing 01.0235 liw analysis started at $(timestamp)"
php panini.php 01.0235 liw
((number++))
echo "$number - Processing 01.0235 luw analysis started at $(timestamp)"
php panini.php 01.0235 luw
((number++))
echo "$number - Processing 01.0235 lfw analysis started at $(timestamp)"
php panini.php 01.0235 lfw
((number++))
echo "$number - Processing 01.0235 low analysis started at $(timestamp)"
php panini.php 01.0235 low
((number++))
echo "$number - Processing 01.0235 laN analysis started at $(timestamp)"
php panini.php 01.0235 laN
((number++))
echo "$number - Processing 01.0235 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0235 ASIrliN
((number++))
echo "$number - Processing 01.0235 viDiliN analysis started at $(timestamp)"
php panini.php 01.0235 viDiliN
((number++))
echo "$number - Processing 01.0274 law analysis started at $(timestamp)"
php panini.php 01.0274 law
((number++))
echo "$number - Processing 01.0274 liw analysis started at $(timestamp)"
php panini.php 01.0274 liw
((number++))
echo "$number - Processing 01.0274 luw analysis started at $(timestamp)"
php panini.php 01.0274 luw
((number++))
echo "$number - Processing 01.0274 lfw analysis started at $(timestamp)"
php panini.php 01.0274 lfw
((number++))
echo "$number - Processing 01.0274 low analysis started at $(timestamp)"
php panini.php 01.0274 low
((number++))
echo "$number - Processing 01.0274 laN analysis started at $(timestamp)"
php panini.php 01.0274 laN
((number++))
echo "$number - Processing 01.0274 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0274 ASIrliN
((number++))
echo "$number - Processing 01.0274 viDiliN analysis started at $(timestamp)"
php panini.php 01.0274 viDiliN
((number++))
echo "$number - Processing 01.0274 luN analysis started at $(timestamp)"
php panini.php 01.0274 luN
((number++))
echo "$number - Processing 01.0274 lfN analysis started at $(timestamp)"
php panini.php 01.0274 lfN
((number++))
echo "$number - Processing 01.0170 law analysis started at $(timestamp)"
php panini.php 01.0170 law
((number++))
echo "$number - Processing 01.0170 low analysis started at $(timestamp)"
php panini.php 01.0170 low
((number++))
echo "$number - Processing 01.0170 laN analysis started at $(timestamp)"
php panini.php 01.0170 laN
((number++))
echo "$number - Processing 01.0170 viDiliN analysis started at $(timestamp)"
php panini.php 01.0170 viDiliN
((number++))
echo "$number - Processing 01.0171 law analysis started at $(timestamp)"
php panini.php 01.0171 law
((number++))
echo "$number - Processing 01.0171 liw analysis started at $(timestamp)"
php panini.php 01.0171 liw
((number++))
echo "$number - Processing 01.0171 luw analysis started at $(timestamp)"
php panini.php 01.0171 luw
((number++))
echo "$number - Processing 01.0171 lfw analysis started at $(timestamp)"
php panini.php 01.0171 lfw
((number++))
echo "$number - Processing 01.0171 low analysis started at $(timestamp)"
php panini.php 01.0171 low
((number++))
echo "$number - Processing 01.0171 laN analysis started at $(timestamp)"
php panini.php 01.0171 laN
((number++))
echo "$number - Processing 01.0171 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0171 ASIrliN
((number++))
echo "$number - Processing 01.0171 viDiliN analysis started at $(timestamp)"
php panini.php 01.0171 viDiliN
((number++))
echo "$number - Processing 01.0171 luN analysis started at $(timestamp)"
php panini.php 01.0171 luN
((number++))
echo "$number - Processing 01.0171 lfN analysis started at $(timestamp)"
php panini.php 01.0171 lfN
((number++))
echo "$number - Processing 01.0165 liw analysis started at $(timestamp)"
php panini.php 01.0165 liw
((number++))
echo "$number - Processing 01.0165 luw analysis started at $(timestamp)"
php panini.php 01.0165 luw
((number++))
echo "$number - Processing 01.0165 lfw analysis started at $(timestamp)"
php panini.php 01.0165 lfw
((number++))
echo "$number - Processing 01.0165 viDiliN analysis started at $(timestamp)"
php panini.php 01.0165 viDiliN
((number++))
echo "$number - Processing 01.0165 luN analysis started at $(timestamp)"
php panini.php 01.0165 luN
((number++))
echo "$number - Processing 01.0165 lfN analysis started at $(timestamp)"
php panini.php 01.0165 lfN
((number++))
echo "$number - Processing 10.0288 law analysis started at $(timestamp)"
php panini.php 10.0288 law
((number++))
echo "$number - Processing 10.0288 liw analysis started at $(timestamp)"
php panini.php 10.0288 liw
((number++))
echo "$number - Processing 10.0288 luw analysis started at $(timestamp)"
php panini.php 10.0288 luw
((number++))
echo "$number - Processing 10.0288 lfw analysis started at $(timestamp)"
php panini.php 10.0288 lfw
((number++))
echo "$number - Processing 10.0288 low analysis started at $(timestamp)"
php panini.php 10.0288 low
((number++))
echo "$number - Processing 10.0288 laN analysis started at $(timestamp)"
php panini.php 10.0288 laN
((number++))
echo "$number - Processing 10.0288 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0288 ASIrliN
((number++))
echo "$number - Processing 10.0288 viDiliN analysis started at $(timestamp)"
php panini.php 10.0288 viDiliN
((number++))
echo "$number - Processing 10.0288 luN analysis started at $(timestamp)"
php panini.php 10.0288 luN
((number++))
echo "$number - Processing 10.0288 lfN analysis started at $(timestamp)"
php panini.php 10.0288 lfN
((number++))
echo "$number - Processing 06.0169 liw analysis started at $(timestamp)"
php panini.php 06.0169 liw
((number++))
echo "$number - Processing 06.0169 luN analysis started at $(timestamp)"
php panini.php 06.0169 luN
((number++))
echo "$number - Processing 06.0157 law analysis started at $(timestamp)"
php panini.php 06.0157 law
((number++))
echo "$number - Processing 06.0157 liw analysis started at $(timestamp)"
php panini.php 06.0157 liw
((number++))
echo "$number - Processing 06.0157 luw analysis started at $(timestamp)"
php panini.php 06.0157 luw
((number++))
echo "$number - Processing 06.0157 low analysis started at $(timestamp)"
php panini.php 06.0157 low
((number++))
echo "$number - Processing 06.0157 laN analysis started at $(timestamp)"
php panini.php 06.0157 laN
((number++))
echo "$number - Processing 06.0157 viDiliN analysis started at $(timestamp)"
php panini.php 06.0157 viDiliN
((number++))
echo "$number - Processing 09.0343 law analysis started at $(timestamp)"
php panini.php 09.0343 law
((number++))
echo "$number - Processing 09.0343 liw analysis started at $(timestamp)"
php panini.php 09.0343 liw
((number++))
echo "$number - Processing 09.0343 luw analysis started at $(timestamp)"
php panini.php 09.0343 luw
((number++))
echo "$number - Processing 09.0343 lfw analysis started at $(timestamp)"
php panini.php 09.0343 lfw
((number++))
echo "$number - Processing 09.0343 low analysis started at $(timestamp)"
php panini.php 09.0343 low
((number++))
echo "$number - Processing 09.0343 laN analysis started at $(timestamp)"
php panini.php 09.0343 laN
((number++))
echo "$number - Processing 09.0343 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0343 ASIrliN
((number++))
echo "$number - Processing 09.0343 viDiliN analysis started at $(timestamp)"
php panini.php 09.0343 viDiliN
((number++))
echo "$number - Processing 09.0343 luN analysis started at $(timestamp)"
php panini.php 09.0343 luN
((number++))
echo "$number - Processing 09.0343 lfN analysis started at $(timestamp)"
php panini.php 09.0343 lfN
((number++))
echo "$number - Processing 01.0214 law analysis started at $(timestamp)"
php panini.php 01.0214 law
((number++))
echo "$number - Processing 01.0214 liw analysis started at $(timestamp)"
php panini.php 01.0214 liw
((number++))
echo "$number - Processing 01.0214 luw analysis started at $(timestamp)"
php panini.php 01.0214 luw
((number++))
echo "$number - Processing 01.0214 lfw analysis started at $(timestamp)"
php panini.php 01.0214 lfw
((number++))
echo "$number - Processing 01.0214 low analysis started at $(timestamp)"
php panini.php 01.0214 low
((number++))
echo "$number - Processing 01.0214 laN analysis started at $(timestamp)"
php panini.php 01.0214 laN
((number++))
echo "$number - Processing 01.0214 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0214 ASIrliN
((number++))
echo "$number - Processing 01.0214 viDiliN analysis started at $(timestamp)"
php panini.php 01.0214 viDiliN
((number++))
echo "$number - Processing 01.0214 luN analysis started at $(timestamp)"
php panini.php 01.0214 luN
((number++))
echo "$number - Processing 01.0214 lfN analysis started at $(timestamp)"
php panini.php 01.0214 lfN
((number++))
echo "$number - Processing 01.0351 luN analysis started at $(timestamp)"
php panini.php 01.0351 luN
((number++))
echo "$number - Processing 01.0850 luN analysis started at $(timestamp)"
php panini.php 01.0850 luN
((number++))
echo "$number - Processing 06.0284 law analysis started at $(timestamp)"
php panini.php 06.0284 law
((number++))
echo "$number - Processing 06.0284 lfw analysis started at $(timestamp)"
php panini.php 06.0284 lfw
((number++))
echo "$number - Processing 06.0284 low analysis started at $(timestamp)"
php panini.php 06.0284 low
((number++))
echo "$number - Processing 06.0284 viDiliN analysis started at $(timestamp)"
php panini.php 06.0284 viDiliN
((number++))
echo "$number - Processing 01.0390 luN analysis started at $(timestamp)"
php panini.php 01.0390 luN
((number++))
echo "$number - Processing 01.0851 law analysis started at $(timestamp)"
php panini.php 01.0851 law
((number++))
echo "$number - Processing 01.0851 liw analysis started at $(timestamp)"
php panini.php 01.0851 liw
((number++))
echo "$number - Processing 01.0851 luw analysis started at $(timestamp)"
php panini.php 01.0851 luw
((number++))
echo "$number - Processing 01.0851 lfw analysis started at $(timestamp)"
php panini.php 01.0851 lfw
((number++))
echo "$number - Processing 01.0851 low analysis started at $(timestamp)"
php panini.php 01.0851 low
((number++))
echo "$number - Processing 01.0851 laN analysis started at $(timestamp)"
php panini.php 01.0851 laN
((number++))
echo "$number - Processing 01.0851 viDiliN analysis started at $(timestamp)"
php panini.php 01.0851 viDiliN
((number++))
echo "$number - Processing 01.0851 luN analysis started at $(timestamp)"
php panini.php 01.0851 luN
((number++))
echo "$number - Processing 04.0134 law analysis started at $(timestamp)"
php panini.php 04.0134 law
((number++))
echo "$number - Processing 04.0134 liw analysis started at $(timestamp)"
php panini.php 04.0134 liw
((number++))
echo "$number - Processing 04.0134 luw analysis started at $(timestamp)"
php panini.php 04.0134 luw
((number++))
echo "$number - Processing 04.0134 lfw analysis started at $(timestamp)"
php panini.php 04.0134 lfw
((number++))
echo "$number - Processing 04.0134 low analysis started at $(timestamp)"
php panini.php 04.0134 low
((number++))
echo "$number - Processing 04.0134 laN analysis started at $(timestamp)"
php panini.php 04.0134 laN
((number++))
echo "$number - Processing 04.0134 viDiliN analysis started at $(timestamp)"
php panini.php 04.0134 viDiliN
((number++))
echo "$number - Processing 06.0110 law analysis started at $(timestamp)"
php panini.php 06.0110 law
((number++))
echo "$number - Processing 06.0110 liw analysis started at $(timestamp)"
php panini.php 06.0110 liw
((number++))
echo "$number - Processing 06.0110 luw analysis started at $(timestamp)"
php panini.php 06.0110 luw
((number++))
echo "$number - Processing 06.0110 lfw analysis started at $(timestamp)"
php panini.php 06.0110 lfw
((number++))
echo "$number - Processing 06.0110 low analysis started at $(timestamp)"
php panini.php 06.0110 low
((number++))
echo "$number - Processing 06.0110 viDiliN analysis started at $(timestamp)"
php panini.php 06.0110 viDiliN
((number++))
echo "$number - Processing 06.0111 law analysis started at $(timestamp)"
php panini.php 06.0111 law
((number++))
echo "$number - Processing 06.0111 low analysis started at $(timestamp)"
php panini.php 06.0111 low
((number++))
echo "$number - Processing 06.0111 laN analysis started at $(timestamp)"
php panini.php 06.0111 laN
((number++))
echo "$number - Processing 06.0111 viDiliN analysis started at $(timestamp)"
php panini.php 06.0111 viDiliN
((number++))
echo "$number - Processing 01.0372 law analysis started at $(timestamp)"
php panini.php 01.0372 law
((number++))
echo "$number - Processing 01.0372 liw analysis started at $(timestamp)"
php panini.php 01.0372 liw
((number++))
echo "$number - Processing 01.0372 luw analysis started at $(timestamp)"
php panini.php 01.0372 luw
((number++))
echo "$number - Processing 01.0372 lfw analysis started at $(timestamp)"
php panini.php 01.0372 lfw
((number++))
echo "$number - Processing 01.0372 low analysis started at $(timestamp)"
php panini.php 01.0372 low
((number++))
echo "$number - Processing 01.0372 laN analysis started at $(timestamp)"
php panini.php 01.0372 laN
((number++))
echo "$number - Processing 01.0372 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0372 ASIrliN
((number++))
echo "$number - Processing 01.0372 viDiliN analysis started at $(timestamp)"
php panini.php 01.0372 viDiliN
((number++))
echo "$number - Processing 01.0372 luN analysis started at $(timestamp)"
php panini.php 01.0372 luN
((number++))
echo "$number - Processing 01.0372 lfN analysis started at $(timestamp)"
php panini.php 01.0372 lfN
((number++))
echo "$number - Processing 01.0376 law analysis started at $(timestamp)"
php panini.php 01.0376 law
((number++))
echo "$number - Processing 01.0376 liw analysis started at $(timestamp)"
php panini.php 01.0376 liw
((number++))
echo "$number - Processing 01.0376 luw analysis started at $(timestamp)"
php panini.php 01.0376 luw
((number++))
echo "$number - Processing 01.0376 lfw analysis started at $(timestamp)"
php panini.php 01.0376 lfw
((number++))
echo "$number - Processing 01.0376 low analysis started at $(timestamp)"
php panini.php 01.0376 low
((number++))
echo "$number - Processing 01.0376 laN analysis started at $(timestamp)"
php panini.php 01.0376 laN
((number++))
echo "$number - Processing 01.0376 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0376 ASIrliN
((number++))
echo "$number - Processing 01.0376 viDiliN analysis started at $(timestamp)"
php panini.php 01.0376 viDiliN
((number++))
echo "$number - Processing 01.0376 luN analysis started at $(timestamp)"
php panini.php 01.0376 luN
((number++))
echo "$number - Processing 01.0376 lfN analysis started at $(timestamp)"
php panini.php 01.0376 lfN
((number++))
echo "$number - Processing 04.0150 law analysis started at $(timestamp)"
php panini.php 04.0150 law
((number++))
echo "$number - Processing 04.0150 luw analysis started at $(timestamp)"
php panini.php 04.0150 luw
((number++))
echo "$number - Processing 04.0150 lfw analysis started at $(timestamp)"
php panini.php 04.0150 lfw
((number++))
echo "$number - Processing 04.0150 low analysis started at $(timestamp)"
php panini.php 04.0150 low
((number++))
echo "$number - Processing 04.0150 laN analysis started at $(timestamp)"
php panini.php 04.0150 laN
((number++))
echo "$number - Processing 04.0150 viDiliN analysis started at $(timestamp)"
php panini.php 04.0150 viDiliN
((number++))
echo "$number - Processing 04.0150 lfN analysis started at $(timestamp)"
php panini.php 04.0150 lfN
((number++))
echo "$number - Processing 10.0100 luN analysis started at $(timestamp)"
php panini.php 10.0100 luN
((number++))
echo "$number - Processing 01.0431 luN analysis started at $(timestamp)"
php panini.php 01.0431 luN
((number++))
echo "$number - Processing 01.0080 luN analysis started at $(timestamp)"
php panini.php 01.0080 luN
((number++))
echo "$number - Processing 01.0188 luN analysis started at $(timestamp)"
php panini.php 01.0188 luN
((number++))
echo "$number - Processing 01.0291 luN analysis started at $(timestamp)"
php panini.php 01.0291 luN
((number++))
echo "$number - Processing 01.0138 lfN analysis started at $(timestamp)"
php panini.php 01.0138 lfN
((number++))
echo "$number - Processing 01.0093 liw analysis started at $(timestamp)"
php panini.php 01.0093 liw
((number++))
echo "$number - Processing 01.0093 luN analysis started at $(timestamp)"
php panini.php 01.0093 luN
((number++))
echo "$number - Processing 01.0100 liw analysis started at $(timestamp)"
php panini.php 01.0100 liw
((number++))
echo "$number - Processing 01.0100 luN analysis started at $(timestamp)"
php panini.php 01.0100 luN
((number++))
echo "$number - Processing 01.0139 luN analysis started at $(timestamp)"
php panini.php 01.0139 luN
((number++))
echo "$number - Processing 01.0156 lfN analysis started at $(timestamp)"
php panini.php 01.0156 lfN
((number++))
echo "$number - Processing 01.0116 law analysis started at $(timestamp)"
php panini.php 01.0116 law
((number++))
echo "$number - Processing 01.0116 liw analysis started at $(timestamp)"
php panini.php 01.0116 liw
((number++))
echo "$number - Processing 01.0116 low analysis started at $(timestamp)"
php panini.php 01.0116 low
((number++))
echo "$number - Processing 01.0116 laN analysis started at $(timestamp)"
php panini.php 01.0116 laN
((number++))
echo "$number - Processing 01.0116 viDiliN analysis started at $(timestamp)"
php panini.php 01.0116 viDiliN
((number++))
echo "$number - Processing 01.0116 luN analysis started at $(timestamp)"
php panini.php 01.0116 luN
((number++))
echo "$number - Processing 10.0058 luN analysis started at $(timestamp)"
php panini.php 10.0058 luN
((number++))
echo "$number - Processing 01.0285 luN analysis started at $(timestamp)"
php panini.php 01.0285 luN
((number++))
echo "$number - Processing 10.0227 luN analysis started at $(timestamp)"
php panini.php 10.0227 luN
((number++))
echo "$number - Processing 01.0888 law analysis started at $(timestamp)"
php panini.php 01.0888 law
((number++))
echo "$number - Processing 01.0888 liw analysis started at $(timestamp)"
php panini.php 01.0888 liw
((number++))
echo "$number - Processing 01.0888 luw analysis started at $(timestamp)"
php panini.php 01.0888 luw
((number++))
echo "$number - Processing 01.0888 lfw analysis started at $(timestamp)"
php panini.php 01.0888 lfw
((number++))
echo "$number - Processing 01.0888 low analysis started at $(timestamp)"
php panini.php 01.0888 low
((number++))
echo "$number - Processing 01.0888 laN analysis started at $(timestamp)"
php panini.php 01.0888 laN
((number++))
echo "$number - Processing 01.0888 viDiliN analysis started at $(timestamp)"
php panini.php 01.0888 viDiliN
((number++))
echo "$number - Processing 01.0888 luN analysis started at $(timestamp)"
php panini.php 01.0888 luN
((number++))
echo "$number - Processing 01.0888 lfN analysis started at $(timestamp)"
php panini.php 01.0888 lfN
((number++))
echo "$number - Processing 01.0337 law analysis started at $(timestamp)"
php panini.php 01.0337 law
((number++))
echo "$number - Processing 01.0337 liw analysis started at $(timestamp)"
php panini.php 01.0337 liw
((number++))
echo "$number - Processing 01.0337 luw analysis started at $(timestamp)"
php panini.php 01.0337 luw
((number++))
echo "$number - Processing 01.0337 lfw analysis started at $(timestamp)"
php panini.php 01.0337 lfw
((number++))
echo "$number - Processing 01.0337 low analysis started at $(timestamp)"
php panini.php 01.0337 low
((number++))
echo "$number - Processing 01.0337 laN analysis started at $(timestamp)"
php panini.php 01.0337 laN
((number++))
echo "$number - Processing 01.0337 viDiliN analysis started at $(timestamp)"
php panini.php 01.0337 viDiliN
((number++))
echo "$number - Processing 01.0337 luN analysis started at $(timestamp)"
php panini.php 01.0337 luN
((number++))
echo "$number - Processing 01.0337 lfN analysis started at $(timestamp)"
php panini.php 01.0337 lfN
((number++))
echo "$number - Processing 01.0382 law analysis started at $(timestamp)"
php panini.php 01.0382 law
((number++))
echo "$number - Processing 01.0382 liw analysis started at $(timestamp)"
php panini.php 01.0382 liw
((number++))
echo "$number - Processing 01.0382 luw analysis started at $(timestamp)"
php panini.php 01.0382 luw
((number++))
echo "$number - Processing 01.0382 lfw analysis started at $(timestamp)"
php panini.php 01.0382 lfw
((number++))
echo "$number - Processing 01.0382 low analysis started at $(timestamp)"
php panini.php 01.0382 low
((number++))
echo "$number - Processing 01.0382 laN analysis started at $(timestamp)"
php panini.php 01.0382 laN
((number++))
echo "$number - Processing 01.0382 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0382 ASIrliN
((number++))
echo "$number - Processing 01.0382 viDiliN analysis started at $(timestamp)"
php panini.php 01.0382 viDiliN
((number++))
echo "$number - Processing 01.0382 luN analysis started at $(timestamp)"
php panini.php 01.0382 luN
((number++))
echo "$number - Processing 01.0382 lfN analysis started at $(timestamp)"
php panini.php 01.0382 lfN
((number++))
echo "$number - Processing 01.0514 viDiliN analysis started at $(timestamp)"
php panini.php 01.0514 viDiliN
((number++))
echo "$number - Processing 01.0304 luN analysis started at $(timestamp)"
php panini.php 01.0304 luN
((number++))
echo "$number - Processing 10.0379 luN analysis started at $(timestamp)"
php panini.php 10.0379 luN
((number++))
echo "$number - Processing 01.1164 luN analysis started at $(timestamp)"
php panini.php 01.1164 luN
((number++))
echo "$number - Processing 01.0011 luN analysis started at $(timestamp)"
php panini.php 01.0011 luN
((number++))
echo "$number - Processing 01.1158 laN analysis started at $(timestamp)"
php panini.php 01.1158 laN
((number++))
echo "$number - Processing 01.1158 viDiliN analysis started at $(timestamp)"
php panini.php 01.1158 viDiliN
((number++))
echo "$number - Processing 01.0547 liw analysis started at $(timestamp)"
php panini.php 01.0547 liw
((number++))
echo "$number - Processing 01.0186 luN analysis started at $(timestamp)"
php panini.php 01.0186 luN
((number++))
echo "$number - Processing 01.0697 luN analysis started at $(timestamp)"
php panini.php 01.0697 luN
((number++))
echo "$number - Processing 01.0564 liw analysis started at $(timestamp)"
php panini.php 01.0564 liw
((number++))
echo "$number - Processing 01.0564 luw analysis started at $(timestamp)"
php panini.php 01.0564 luw
((number++))
echo "$number - Processing 01.0564 lfw analysis started at $(timestamp)"
php panini.php 01.0564 lfw
((number++))
echo "$number - Processing 01.0564 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0564 ASIrliN
((number++))
echo "$number - Processing 01.0564 luN analysis started at $(timestamp)"
php panini.php 01.0564 luN
((number++))
echo "$number - Processing 01.0564 lfN analysis started at $(timestamp)"
php panini.php 01.0564 lfN
((number++))
echo "$number - Processing 01.0456 low analysis started at $(timestamp)"
php panini.php 01.0456 low
((number++))
echo "$number - Processing 01.0456 luN analysis started at $(timestamp)"
php panini.php 01.0456 luN
((number++))
echo "$number - Processing 02.0075 law analysis started at $(timestamp)"
php panini.php 02.0075 law
((number++))
echo "$number - Processing 02.0075 low analysis started at $(timestamp)"
php panini.php 02.0075 low
((number++))
echo "$number - Processing 01.0106 luN analysis started at $(timestamp)"
php panini.php 01.0106 luN
((number++))
echo "$number - Processing 10.0488 liw analysis started at $(timestamp)"
php panini.php 10.0488 liw
((number++))
echo "$number - Processing 10.0488 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0488 ASIrliN
((number++))
echo "$number - Processing 10.0488 luN analysis started at $(timestamp)"
php panini.php 10.0488 luN
((number++))
echo "$number - Processing 02.0111 liw analysis started at $(timestamp)"
php panini.php 02.0111 liw
((number++))
echo "$number - Processing 02.0111 luN analysis started at $(timestamp)"
php panini.php 02.0111 luN
((number++))
echo "$number - Processing 01.1160 liw analysis started at $(timestamp)"
php panini.php 01.1160 liw
((number++))
echo "$number - Processing 10.0205 law analysis started at $(timestamp)"
php panini.php 10.0205 law
((number++))
echo "$number - Processing 10.0205 liw analysis started at $(timestamp)"
php panini.php 10.0205 liw
((number++))
echo "$number - Processing 10.0205 luw analysis started at $(timestamp)"
php panini.php 10.0205 luw
((number++))
echo "$number - Processing 10.0205 lfw analysis started at $(timestamp)"
php panini.php 10.0205 lfw
((number++))
echo "$number - Processing 10.0205 low analysis started at $(timestamp)"
php panini.php 10.0205 low
((number++))
echo "$number - Processing 10.0205 laN analysis started at $(timestamp)"
php panini.php 10.0205 laN
((number++))
echo "$number - Processing 10.0205 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0205 ASIrliN
((number++))
echo "$number - Processing 10.0205 viDiliN analysis started at $(timestamp)"
php panini.php 10.0205 viDiliN
((number++))
echo "$number - Processing 10.0205 luN analysis started at $(timestamp)"
php panini.php 10.0205 luN
((number++))
echo "$number - Processing 10.0205 lfN analysis started at $(timestamp)"
php panini.php 10.0205 lfN
((number++))
echo "$number - Processing 01.0236 luN analysis started at $(timestamp)"
php panini.php 01.0236 luN
((number++))
echo "$number - Processing 01.0321 law analysis started at $(timestamp)"
php panini.php 01.0321 law
((number++))
echo "$number - Processing 01.0321 liw analysis started at $(timestamp)"
php panini.php 01.0321 liw
((number++))
echo "$number - Processing 01.0321 luw analysis started at $(timestamp)"
php panini.php 01.0321 luw
((number++))
echo "$number - Processing 01.0321 lfw analysis started at $(timestamp)"
php panini.php 01.0321 lfw
((number++))
echo "$number - Processing 01.0321 low analysis started at $(timestamp)"
php panini.php 01.0321 low
((number++))
echo "$number - Processing 01.0321 laN analysis started at $(timestamp)"
php panini.php 01.0321 laN
((number++))
echo "$number - Processing 01.0321 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0321 ASIrliN
((number++))
echo "$number - Processing 01.0321 viDiliN analysis started at $(timestamp)"
php panini.php 01.0321 viDiliN
((number++))
echo "$number - Processing 01.0321 luN analysis started at $(timestamp)"
php panini.php 01.0321 luN
((number++))
echo "$number - Processing 01.0321 lfN analysis started at $(timestamp)"
php panini.php 01.0321 lfN
((number++))
echo "$number - Processing 04.0056 law analysis started at $(timestamp)"
php panini.php 04.0056 law
((number++))
echo "$number - Processing 04.0056 liw analysis started at $(timestamp)"
php panini.php 04.0056 liw
((number++))
echo "$number - Processing 04.0056 luw analysis started at $(timestamp)"
php panini.php 04.0056 luw
((number++))
echo "$number - Processing 04.0056 lfw analysis started at $(timestamp)"
php panini.php 04.0056 lfw
((number++))
echo "$number - Processing 04.0056 low analysis started at $(timestamp)"
php panini.php 04.0056 low
((number++))
echo "$number - Processing 04.0056 laN analysis started at $(timestamp)"
php panini.php 04.0056 laN
((number++))
echo "$number - Processing 04.0056 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0056 ASIrliN
((number++))
echo "$number - Processing 04.0056 viDiliN analysis started at $(timestamp)"
php panini.php 04.0056 viDiliN
((number++))
echo "$number - Processing 04.0056 luN analysis started at $(timestamp)"
php panini.php 04.0056 luN
((number++))
echo "$number - Processing 04.0056 lfN analysis started at $(timestamp)"
php panini.php 04.0056 lfN
((number++))
echo "$number - Processing 06.0304 liw analysis started at $(timestamp)"
php panini.php 06.0304 liw
((number++))
echo "$number - Processing 06.0304 low analysis started at $(timestamp)"
php panini.php 06.0304 low
((number++))
echo "$number - Processing 06.0304 laN analysis started at $(timestamp)"
php panini.php 06.0304 laN
((number++))
echo "$number - Processing 06.0304 viDiliN analysis started at $(timestamp)"
php panini.php 06.0304 viDiliN
((number++))
echo "$number - Processing 03.0013 law analysis started at $(timestamp)"
php panini.php 03.0013 law
((number++))
echo "$number - Processing 03.0013 low analysis started at $(timestamp)"
php panini.php 03.0013 low
((number++))
echo "$number - Processing 03.0013 laN analysis started at $(timestamp)"
php panini.php 03.0013 laN
((number++))
echo "$number - Processing 03.0013 viDiliN analysis started at $(timestamp)"
php panini.php 03.0013 viDiliN
((number++))
echo "$number - Processing 06.0009 laN analysis started at $(timestamp)"
php panini.php 06.0009 laN
((number++))
echo "$number - Processing 06.0009 viDiliN analysis started at $(timestamp)"
php panini.php 06.0009 viDiliN
((number++))
echo "$number - Processing 06.0009 luN analysis started at $(timestamp)"
php panini.php 06.0009 luN
((number++))
echo "$number - Processing 07.0023 law analysis started at $(timestamp)"
php panini.php 07.0023 law
((number++))
echo "$number - Processing 07.0023 luw analysis started at $(timestamp)"
php panini.php 07.0023 luw
((number++))
echo "$number - Processing 07.0023 lfw analysis started at $(timestamp)"
php panini.php 07.0023 lfw
((number++))
echo "$number - Processing 07.0023 low analysis started at $(timestamp)"
php panini.php 07.0023 low
((number++))
echo "$number - Processing 07.0023 laN analysis started at $(timestamp)"
php panini.php 07.0023 laN
((number++))
echo "$number - Processing 07.0023 viDiliN analysis started at $(timestamp)"
php panini.php 07.0023 viDiliN
((number++))
echo "$number - Processing 01.0033 luN analysis started at $(timestamp)"
php panini.php 01.0033 luN
((number++))
echo "$number - Processing 07.0232 low analysis started at $(timestamp)"
php panini.php 07.0232 low
((number++))
echo "$number - Processing 04.0168 low analysis started at $(timestamp)"
php panini.php 04.0168 low
((number++))
echo "$number - Processing 06.0160 law analysis started at $(timestamp)"
php panini.php 06.0160 law
((number++))
echo "$number - Processing 06.0160 liw analysis started at $(timestamp)"
php panini.php 06.0160 liw
((number++))
echo "$number - Processing 06.0160 low analysis started at $(timestamp)"
php panini.php 06.0160 low
((number++))
echo "$number - Processing 06.0160 laN analysis started at $(timestamp)"
php panini.php 06.0160 laN
((number++))
echo "$number - Processing 06.0160 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0160 ASIrliN
((number++))
echo "$number - Processing 06.0160 viDiliN analysis started at $(timestamp)"
php panini.php 06.0160 viDiliN
((number++))
echo "$number - Processing 06.0160 luN analysis started at $(timestamp)"
php panini.php 06.0160 luN
((number++))
echo "$number - Processing 01.0794 law analysis started at $(timestamp)"
php panini.php 01.0794 law
((number++))
echo "$number - Processing 01.0794 luw analysis started at $(timestamp)"
php panini.php 01.0794 luw
((number++))
echo "$number - Processing 01.0794 lfw analysis started at $(timestamp)"
php panini.php 01.0794 lfw
((number++))
echo "$number - Processing 01.0794 low analysis started at $(timestamp)"
php panini.php 01.0794 low
((number++))
echo "$number - Processing 01.0794 laN analysis started at $(timestamp)"
php panini.php 01.0794 laN
((number++))
echo "$number - Processing 01.0794 viDiliN analysis started at $(timestamp)"
php panini.php 01.0794 viDiliN
((number++))
echo "$number - Processing 01.0794 luN analysis started at $(timestamp)"
php panini.php 01.0794 luN
((number++))
echo "$number - Processing 01.0794 lfN analysis started at $(timestamp)"
php panini.php 01.0794 lfN
((number++))
echo "$number - Processing 09.0062 law analysis started at $(timestamp)"
php panini.php 09.0062 law
((number++))
echo "$number - Processing 09.0062 low analysis started at $(timestamp)"
php panini.php 09.0062 low
((number++))
echo "$number - Processing 09.0062 laN analysis started at $(timestamp)"
php panini.php 09.0062 laN
((number++))
echo "$number - Processing 09.0062 viDiliN analysis started at $(timestamp)"
php panini.php 09.0062 viDiliN
((number++))
echo "$number - Processing 09.0062 luN analysis started at $(timestamp)"
php panini.php 09.0062 luN
((number++))
echo "$number - Processing 03.0014 law analysis started at $(timestamp)"
php panini.php 03.0014 law
((number++))
echo "$number - Processing 03.0014 low analysis started at $(timestamp)"
php panini.php 03.0014 low
((number++))
echo "$number - Processing 03.0014 laN analysis started at $(timestamp)"
php panini.php 03.0014 laN
((number++))
echo "$number - Processing 03.0014 viDiliN analysis started at $(timestamp)"
php panini.php 03.0014 viDiliN
((number++))
echo "$number - Processing 10.0486 liw analysis started at $(timestamp)"
php panini.php 10.0486 liw
((number++))
echo "$number - Processing 10.0486 low analysis started at $(timestamp)"
php panini.php 10.0486 low
((number++))
echo "$number - Processing 10.0486 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0486 ASIrliN
((number++))
echo "$number - Processing 10.0207 liw analysis started at $(timestamp)"
php panini.php 10.0207 liw
((number++))
echo "$number - Processing 10.0207 low analysis started at $(timestamp)"
php panini.php 10.0207 low
((number++))
echo "$number - Processing 10.0207 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0207 ASIrliN
((number++))
echo "$number - Processing 01.0818 law analysis started at $(timestamp)"
php panini.php 01.0818 law
((number++))
echo "$number - Processing 01.0818 low analysis started at $(timestamp)"
php panini.php 01.0818 low
((number++))
echo "$number - Processing 01.0818 laN analysis started at $(timestamp)"
php panini.php 01.0818 laN
((number++))
echo "$number - Processing 01.0818 viDiliN analysis started at $(timestamp)"
php panini.php 01.0818 viDiliN
((number++))
echo "$number - Processing 01.0818 luN analysis started at $(timestamp)"
php panini.php 01.0818 luN
((number++))
echo "$number - Processing 04.0124 law analysis started at $(timestamp)"
php panini.php 04.0124 law
((number++))
echo "$number - Processing 04.0124 liw analysis started at $(timestamp)"
php panini.php 04.0124 liw
((number++))
echo "$number - Processing 04.0124 luw analysis started at $(timestamp)"
php panini.php 04.0124 luw
((number++))
echo "$number - Processing 04.0124 lfw analysis started at $(timestamp)"
php panini.php 04.0124 lfw
((number++))
echo "$number - Processing 04.0124 low analysis started at $(timestamp)"
php panini.php 04.0124 low
((number++))
echo "$number - Processing 04.0124 laN analysis started at $(timestamp)"
php panini.php 04.0124 laN
((number++))
echo "$number - Processing 04.0124 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0124 ASIrliN
((number++))
echo "$number - Processing 04.0124 viDiliN analysis started at $(timestamp)"
php panini.php 04.0124 viDiliN
((number++))
echo "$number - Processing 04.0124 luN analysis started at $(timestamp)"
php panini.php 04.0124 luN
((number++))
echo "$number - Processing 04.0124 lfN analysis started at $(timestamp)"
php panini.php 04.0124 lfN
((number++))
echo "$number - Processing 01.0209 luw analysis started at $(timestamp)"
php panini.php 01.0209 luw
((number++))
echo "$number - Processing 01.0209 laN analysis started at $(timestamp)"
php panini.php 01.0209 laN
((number++))
echo "$number - Processing 01.0209 viDiliN analysis started at $(timestamp)"
php panini.php 01.0209 viDiliN
((number++))
echo "$number - Processing 01.0178 law analysis started at $(timestamp)"
php panini.php 01.0178 law
((number++))
echo "$number - Processing 01.0178 liw analysis started at $(timestamp)"
php panini.php 01.0178 liw
((number++))
echo "$number - Processing 01.0178 luw analysis started at $(timestamp)"
php panini.php 01.0178 luw
((number++))
echo "$number - Processing 01.0178 lfw analysis started at $(timestamp)"
php panini.php 01.0178 lfw
((number++))
echo "$number - Processing 01.0178 low analysis started at $(timestamp)"
php panini.php 01.0178 low
((number++))
echo "$number - Processing 01.0178 laN analysis started at $(timestamp)"
php panini.php 01.0178 laN
((number++))
echo "$number - Processing 01.0178 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0178 ASIrliN
((number++))
echo "$number - Processing 01.0178 viDiliN analysis started at $(timestamp)"
php panini.php 01.0178 viDiliN
((number++))
echo "$number - Processing 01.0178 luN analysis started at $(timestamp)"
php panini.php 01.0178 luN
((number++))
echo "$number - Processing 01.0178 lfN analysis started at $(timestamp)"
php panini.php 01.0178 lfN
((number++))
echo "$number - Processing 04.0118 law analysis started at $(timestamp)"
php panini.php 04.0118 law
((number++))
echo "$number - Processing 04.0118 liw analysis started at $(timestamp)"
php panini.php 04.0118 liw
((number++))
echo "$number - Processing 04.0118 luw analysis started at $(timestamp)"
php panini.php 04.0118 luw
((number++))
echo "$number - Processing 04.0118 lfw analysis started at $(timestamp)"
php panini.php 04.0118 lfw
((number++))
echo "$number - Processing 04.0118 low analysis started at $(timestamp)"
php panini.php 04.0118 low
((number++))
echo "$number - Processing 04.0118 laN analysis started at $(timestamp)"
php panini.php 04.0118 laN
((number++))
echo "$number - Processing 04.0118 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0118 ASIrliN
((number++))
echo "$number - Processing 04.0118 viDiliN analysis started at $(timestamp)"
php panini.php 04.0118 viDiliN
((number++))
echo "$number - Processing 04.0118 luN analysis started at $(timestamp)"
php panini.php 04.0118 luN
((number++))
echo "$number - Processing 04.0118 lfN analysis started at $(timestamp)"
php panini.php 04.0118 lfN
((number++))
echo "$number - Processing 10.0837 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0837 ASIrliN
((number++))
echo "$number - Processing 10.0837 luN analysis started at $(timestamp)"
php panini.php 10.0837 luN
((number++))
echo "$number - Processing 05.0008 ASIrliN analysis started at $(timestamp)"
php panini.php 05.0008 ASIrliN
((number++))
echo "$number - Processing 05.0008 viDiliN analysis started at $(timestamp)"
php panini.php 05.0008 viDiliN
((number++))
echo "$number - Processing 05.0008 lfN analysis started at $(timestamp)"
php panini.php 05.0008 lfN
((number++))
echo "$number - Processing 09.0299 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0299 ASIrliN
((number++))
echo "$number - Processing 09.0299 luN analysis started at $(timestamp)"
php panini.php 09.0299 luN
((number++))
echo "$number - Processing 10.0345 liw analysis started at $(timestamp)"
php panini.php 10.0345 liw
((number++))
echo "$number - Processing 10.0345 lfw analysis started at $(timestamp)"
php panini.php 10.0345 lfw
((number++))
echo "$number - Processing 10.0345 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0345 ASIrliN
((number++))
echo "$number - Processing 10.0345 viDiliN analysis started at $(timestamp)"
php panini.php 10.0345 viDiliN
((number++))
echo "$number - Processing 10.0345 luN analysis started at $(timestamp)"
php panini.php 10.0345 luN
((number++))
echo "$number - Processing 01.0097 luN analysis started at $(timestamp)"
php panini.php 01.0097 luN
((number++))
echo "$number - Processing 01.0688 luN analysis started at $(timestamp)"
php panini.php 01.0688 luN
((number++))
echo "$number - Processing 02.0023 law analysis started at $(timestamp)"
php panini.php 02.0023 law
((number++))
echo "$number - Processing 02.0023 liw analysis started at $(timestamp)"
php panini.php 02.0023 liw
((number++))
echo "$number - Processing 02.0023 luw analysis started at $(timestamp)"
php panini.php 02.0023 luw
((number++))
echo "$number - Processing 02.0023 lfw analysis started at $(timestamp)"
php panini.php 02.0023 lfw
((number++))
echo "$number - Processing 02.0023 low analysis started at $(timestamp)"
php panini.php 02.0023 low
((number++))
echo "$number - Processing 02.0023 laN analysis started at $(timestamp)"
php panini.php 02.0023 laN
((number++))
echo "$number - Processing 02.0023 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0023 ASIrliN
((number++))
echo "$number - Processing 02.0023 viDiliN analysis started at $(timestamp)"
php panini.php 02.0023 viDiliN
((number++))
echo "$number - Processing 02.0023 luN analysis started at $(timestamp)"
php panini.php 02.0023 luN
((number++))
echo "$number - Processing 02.0023 lfN analysis started at $(timestamp)"
php panini.php 02.0023 lfN
((number++))
echo "$number - Processing 06.0056 liw analysis started at $(timestamp)"
php panini.php 06.0056 liw
((number++))
echo "$number - Processing 06.0056 low analysis started at $(timestamp)"
php panini.php 06.0056 low
((number++))
echo "$number - Processing 06.0056 laN analysis started at $(timestamp)"
php panini.php 06.0056 laN
((number++))
echo "$number - Processing 06.0056 viDiliN analysis started at $(timestamp)"
php panini.php 06.0056 viDiliN
((number++))
echo "$number - Processing 10.0055 lfN analysis started at $(timestamp)"
php panini.php 10.0055 lfN
((number++))
echo "$number - Processing 04.0312 luN analysis started at $(timestamp)"
php panini.php 04.0312 luN
((number++))
echo "$number - Processing 04.0312 lfN analysis started at $(timestamp)"
php panini.php 04.0312 lfN
((number++))
echo "$number - Processing 01.0862 luN analysis started at $(timestamp)"
php panini.php 01.0862 luN
((number++))
echo "$number - Processing 01.0862 lfN analysis started at $(timestamp)"
php panini.php 01.0862 lfN
((number++))
echo "$number - Processing 10.0313 lfN analysis started at $(timestamp)"
php panini.php 10.0313 lfN
((number++))
echo "$number - Processing 01.0863 luN analysis started at $(timestamp)"
php panini.php 01.0863 luN
((number++))
echo "$number - Processing 01.0863 lfN analysis started at $(timestamp)"
php panini.php 01.0863 lfN
((number++))
echo "$number - Processing 06.0073 liw analysis started at $(timestamp)"
php panini.php 06.0073 liw
((number++))
echo "$number - Processing 06.0073 luN analysis started at $(timestamp)"
php panini.php 06.0073 luN
((number++))
echo "$number - Processing 09.0019 liw analysis started at $(timestamp)"
php panini.php 09.0019 liw
((number++))
echo "$number - Processing 09.0019 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0019 ASIrliN
((number++))
echo "$number - Processing 09.0019 luN analysis started at $(timestamp)"
php panini.php 09.0019 luN
((number++))
echo "$number - Processing 09.0019 lfN analysis started at $(timestamp)"
php panini.php 09.0019 lfN
((number++))
echo "$number - Processing 09.0023 liw analysis started at $(timestamp)"
php panini.php 09.0023 liw
((number++))
echo "$number - Processing 09.0023 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0023 ASIrliN
((number++))
echo "$number - Processing 09.0023 lfN analysis started at $(timestamp)"
php panini.php 09.0023 lfN
((number++))
echo "$number - Processing 01.1161 liw analysis started at $(timestamp)"
php panini.php 01.1161 liw
((number++))
echo "$number - Processing 01.1018 luN analysis started at $(timestamp)"
php panini.php 01.1018 luN
((number++))
echo "$number - Processing 01.0034 luN analysis started at $(timestamp)"
php panini.php 01.0034 luN
((number++))
echo "$number - Processing 01.1019 law analysis started at $(timestamp)"
php panini.php 01.1019 law
((number++))
echo "$number - Processing 01.1019 liw analysis started at $(timestamp)"
php panini.php 01.1019 liw
((number++))
echo "$number - Processing 01.1019 luw analysis started at $(timestamp)"
php panini.php 01.1019 luw
((number++))
echo "$number - Processing 01.1019 lfw analysis started at $(timestamp)"
php panini.php 01.1019 lfw
((number++))
echo "$number - Processing 01.1019 low analysis started at $(timestamp)"
php panini.php 01.1019 low
((number++))
echo "$number - Processing 01.1019 laN analysis started at $(timestamp)"
php panini.php 01.1019 laN
((number++))
echo "$number - Processing 01.1019 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1019 ASIrliN
((number++))
echo "$number - Processing 01.1019 viDiliN analysis started at $(timestamp)"
php panini.php 01.1019 viDiliN
((number++))
echo "$number - Processing 01.1019 luN analysis started at $(timestamp)"
php panini.php 01.1019 luN
((number++))
echo "$number - Processing 01.1019 lfN analysis started at $(timestamp)"
php panini.php 01.1019 lfN
((number++))
echo "$number - Processing 01.0425 law analysis started at $(timestamp)"
php panini.php 01.0425 law
((number++))
echo "$number - Processing 01.0425 liw analysis started at $(timestamp)"
php panini.php 01.0425 liw
((number++))
echo "$number - Processing 01.0425 luw analysis started at $(timestamp)"
php panini.php 01.0425 luw
((number++))
echo "$number - Processing 01.0425 lfw analysis started at $(timestamp)"
php panini.php 01.0425 lfw
((number++))
echo "$number - Processing 01.0425 low analysis started at $(timestamp)"
php panini.php 01.0425 low
((number++))
echo "$number - Processing 01.0425 laN analysis started at $(timestamp)"
php panini.php 01.0425 laN
((number++))
echo "$number - Processing 01.0425 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0425 ASIrliN
((number++))
echo "$number - Processing 01.0425 viDiliN analysis started at $(timestamp)"
php panini.php 01.0425 viDiliN
((number++))
echo "$number - Processing 01.0425 luN analysis started at $(timestamp)"
php panini.php 01.0425 luN
((number++))
echo "$number - Processing 01.0425 lfN analysis started at $(timestamp)"
php panini.php 01.0425 lfN
((number++))
echo "$number - Processing 02.0072 law analysis started at $(timestamp)"
php panini.php 02.0072 law
((number++))
echo "$number - Processing 02.0072 liw analysis started at $(timestamp)"
php panini.php 02.0072 liw
((number++))
echo "$number - Processing 02.0072 low analysis started at $(timestamp)"
php panini.php 02.0072 low
((number++))
echo "$number - Processing 02.0072 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0072 ASIrliN
((number++))
echo "$number - Processing 02.0072 luN analysis started at $(timestamp)"
php panini.php 02.0072 luN
((number++))
echo "$number - Processing 01.0288 luN analysis started at $(timestamp)"
php panini.php 01.0288 luN
((number++))
echo "$number - Processing 01.0819 law analysis started at $(timestamp)"
php panini.php 01.0819 law
((number++))
echo "$number - Processing 01.0819 liw analysis started at $(timestamp)"
php panini.php 01.0819 liw
((number++))
echo "$number - Processing 01.0819 low analysis started at $(timestamp)"
php panini.php 01.0819 low
((number++))
echo "$number - Processing 01.0819 laN analysis started at $(timestamp)"
php panini.php 01.0819 laN
((number++))
echo "$number - Processing 01.0819 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0819 ASIrliN
((number++))
echo "$number - Processing 01.0819 viDiliN analysis started at $(timestamp)"
php panini.php 01.0819 viDiliN
((number++))
echo "$number - Processing 01.0819 luN analysis started at $(timestamp)"
php panini.php 01.0819 luN
((number++))
echo "$number - Processing 01.0868 luN analysis started at $(timestamp)"
php panini.php 01.0868 luN
((number++))
echo "$number - Processing 10.0136 law analysis started at $(timestamp)"
php panini.php 10.0136 law
((number++))
echo "$number - Processing 10.0136 liw analysis started at $(timestamp)"
php panini.php 10.0136 liw
((number++))
echo "$number - Processing 10.0136 luw analysis started at $(timestamp)"
php panini.php 10.0136 luw
((number++))
echo "$number - Processing 10.0136 lfw analysis started at $(timestamp)"
php panini.php 10.0136 lfw
((number++))
echo "$number - Processing 10.0136 low analysis started at $(timestamp)"
php panini.php 10.0136 low
((number++))
echo "$number - Processing 10.0136 laN analysis started at $(timestamp)"
php panini.php 10.0136 laN
((number++))
echo "$number - Processing 10.0136 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0136 ASIrliN
((number++))
echo "$number - Processing 10.0136 viDiliN analysis started at $(timestamp)"
php panini.php 10.0136 viDiliN
((number++))
echo "$number - Processing 10.0136 luN analysis started at $(timestamp)"
php panini.php 10.0136 luN
((number++))
echo "$number - Processing 10.0136 lfN analysis started at $(timestamp)"
php panini.php 10.0136 lfN
((number++))
echo "$number - Processing 01.1024 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1024 ASIrliN
((number++))
echo "$number - Processing 01.1024 luN analysis started at $(timestamp)"
php panini.php 01.1024 luN
((number++))
echo "$number - Processing 04.0276 law analysis started at $(timestamp)"
php panini.php 04.0276 law
((number++))
echo "$number - Processing 04.0276 liw analysis started at $(timestamp)"
php panini.php 04.0276 liw
((number++))
echo "$number - Processing 04.0276 luw analysis started at $(timestamp)"
php panini.php 04.0276 luw
((number++))
echo "$number - Processing 04.0276 lfw analysis started at $(timestamp)"
php panini.php 04.0276 lfw
((number++))
echo "$number - Processing 04.0276 low analysis started at $(timestamp)"
php panini.php 04.0276 low
((number++))
echo "$number - Processing 04.0276 laN analysis started at $(timestamp)"
php panini.php 04.0276 laN
((number++))
echo "$number - Processing 04.0276 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0276 ASIrliN
((number++))
echo "$number - Processing 04.0276 viDiliN analysis started at $(timestamp)"
php panini.php 04.0276 viDiliN
((number++))
echo "$number - Processing 04.0276 luN analysis started at $(timestamp)"
php panini.php 04.0276 luN
((number++))
echo "$number - Processing 04.0276 lfN analysis started at $(timestamp)"
php panini.php 04.0276 lfN
((number++))
echo "$number - Processing 10.0115 law analysis started at $(timestamp)"
php panini.php 10.0115 law
((number++))
echo "$number - Processing 10.0115 liw analysis started at $(timestamp)"
php panini.php 10.0115 liw
((number++))
echo "$number - Processing 10.0115 luw analysis started at $(timestamp)"
php panini.php 10.0115 luw
((number++))
echo "$number - Processing 10.0115 lfw analysis started at $(timestamp)"
php panini.php 10.0115 lfw
((number++))
echo "$number - Processing 10.0115 low analysis started at $(timestamp)"
php panini.php 10.0115 low
((number++))
echo "$number - Processing 10.0115 laN analysis started at $(timestamp)"
php panini.php 10.0115 laN
((number++))
echo "$number - Processing 10.0115 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0115 ASIrliN
((number++))
echo "$number - Processing 10.0115 viDiliN analysis started at $(timestamp)"
php panini.php 10.0115 viDiliN
((number++))
echo "$number - Processing 10.0115 luN analysis started at $(timestamp)"
php panini.php 10.0115 luN
((number++))
echo "$number - Processing 10.0115 lfN analysis started at $(timestamp)"
php panini.php 10.0115 lfN
((number++))
echo "$number - Processing 01.1162 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1162 ASIrliN
((number++))
echo "$number - Processing 01.1162 lfN analysis started at $(timestamp)"
php panini.php 01.1162 lfN
((number++))
echo "$number - Processing 01.0247 luN analysis started at $(timestamp)"
php panini.php 01.0247 luN
((number++))
echo "$number - Processing 01.0286 luN analysis started at $(timestamp)"
php panini.php 01.0286 luN
((number++))
echo "$number - Processing 01.0248 law analysis started at $(timestamp)"
php panini.php 01.0248 law
((number++))
echo "$number - Processing 01.0248 liw analysis started at $(timestamp)"
php panini.php 01.0248 liw
((number++))
echo "$number - Processing 01.0248 luw analysis started at $(timestamp)"
php panini.php 01.0248 luw
((number++))
echo "$number - Processing 01.0248 lfw analysis started at $(timestamp)"
php panini.php 01.0248 lfw
((number++))
echo "$number - Processing 01.0248 low analysis started at $(timestamp)"
php panini.php 01.0248 low
((number++))
echo "$number - Processing 01.0248 laN analysis started at $(timestamp)"
php panini.php 01.0248 laN
((number++))
echo "$number - Processing 01.0248 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0248 ASIrliN
((number++))
echo "$number - Processing 01.0248 viDiliN analysis started at $(timestamp)"
php panini.php 01.0248 viDiliN
((number++))
echo "$number - Processing 01.0248 luN analysis started at $(timestamp)"
php panini.php 01.0248 luN
((number++))
echo "$number - Processing 01.0248 lfN analysis started at $(timestamp)"
php panini.php 01.0248 lfN
((number++))
echo "$number - Processing 06.0012 law analysis started at $(timestamp)"
php panini.php 06.0012 law
((number++))
echo "$number - Processing 06.0012 low analysis started at $(timestamp)"
php panini.php 06.0012 low
((number++))
echo "$number - Processing 06.0012 laN analysis started at $(timestamp)"
php panini.php 06.0012 laN
((number++))
echo "$number - Processing 09.0040 liw analysis started at $(timestamp)"
php panini.php 09.0040 liw
((number++))
echo "$number - Processing 09.0040 low analysis started at $(timestamp)"
php panini.php 09.0040 low
((number++))
echo "$number - Processing 06.0127 law analysis started at $(timestamp)"
php panini.php 06.0127 law
((number++))
echo "$number - Processing 06.0127 luN analysis started at $(timestamp)"
php panini.php 06.0127 luN
((number++))
echo "$number - Processing 10.0176 law analysis started at $(timestamp)"
php panini.php 10.0176 law
((number++))
echo "$number - Processing 10.0176 liw analysis started at $(timestamp)"
php panini.php 10.0176 liw
((number++))
echo "$number - Processing 10.0176 luw analysis started at $(timestamp)"
php panini.php 10.0176 luw
((number++))
echo "$number - Processing 10.0176 lfw analysis started at $(timestamp)"
php panini.php 10.0176 lfw
((number++))
echo "$number - Processing 10.0176 low analysis started at $(timestamp)"
php panini.php 10.0176 low
((number++))
echo "$number - Processing 10.0176 laN analysis started at $(timestamp)"
php panini.php 10.0176 laN
((number++))
echo "$number - Processing 10.0176 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0176 ASIrliN
((number++))
echo "$number - Processing 10.0176 viDiliN analysis started at $(timestamp)"
php panini.php 10.0176 viDiliN
((number++))
echo "$number - Processing 10.0176 luN analysis started at $(timestamp)"
php panini.php 10.0176 luN
((number++))
echo "$number - Processing 10.0176 lfN analysis started at $(timestamp)"
php panini.php 10.0176 lfN
((number++))
echo "$number - Processing 10.0174 law analysis started at $(timestamp)"
php panini.php 10.0174 law
((number++))
echo "$number - Processing 10.0174 liw analysis started at $(timestamp)"
php panini.php 10.0174 liw
((number++))
echo "$number - Processing 10.0174 luw analysis started at $(timestamp)"
php panini.php 10.0174 luw
((number++))
echo "$number - Processing 10.0174 lfw analysis started at $(timestamp)"
php panini.php 10.0174 lfw
((number++))
echo "$number - Processing 10.0174 low analysis started at $(timestamp)"
php panini.php 10.0174 low
((number++))
echo "$number - Processing 10.0174 laN analysis started at $(timestamp)"
php panini.php 10.0174 laN
((number++))
echo "$number - Processing 10.0174 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0174 ASIrliN
((number++))
echo "$number - Processing 10.0174 viDiliN analysis started at $(timestamp)"
php panini.php 10.0174 viDiliN
((number++))
echo "$number - Processing 10.0174 luN analysis started at $(timestamp)"
php panini.php 10.0174 luN
((number++))
echo "$number - Processing 10.0174 lfN analysis started at $(timestamp)"
php panini.php 10.0174 lfN
((number++))
echo "$number - Processing 09.0037 law analysis started at $(timestamp)"
php panini.php 09.0037 law
((number++))
echo "$number - Processing 09.0037 liw analysis started at $(timestamp)"
php panini.php 09.0037 liw
((number++))
echo "$number - Processing 09.0037 luw analysis started at $(timestamp)"
php panini.php 09.0037 luw
((number++))
echo "$number - Processing 09.0037 lfw analysis started at $(timestamp)"
php panini.php 09.0037 lfw
((number++))
echo "$number - Processing 09.0037 low analysis started at $(timestamp)"
php panini.php 09.0037 low
((number++))
echo "$number - Processing 09.0037 laN analysis started at $(timestamp)"
php panini.php 09.0037 laN
((number++))
echo "$number - Processing 09.0037 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0037 ASIrliN
((number++))
echo "$number - Processing 09.0037 viDiliN analysis started at $(timestamp)"
php panini.php 09.0037 viDiliN
((number++))
echo "$number - Processing 09.0037 luN analysis started at $(timestamp)"
php panini.php 09.0037 luN
((number++))
echo "$number - Processing 09.0037 lfN analysis started at $(timestamp)"
php panini.php 09.0037 lfN
((number++))
echo "$number - Processing 01.0829 law analysis started at $(timestamp)"
php panini.php 01.0829 law
((number++))
echo "$number - Processing 01.0829 liw analysis started at $(timestamp)"
php panini.php 01.0829 liw
((number++))
echo "$number - Processing 01.0829 lfw analysis started at $(timestamp)"
php panini.php 01.0829 lfw
((number++))
echo "$number - Processing 01.0829 low analysis started at $(timestamp)"
php panini.php 01.0829 low
((number++))
echo "$number - Processing 01.0829 laN analysis started at $(timestamp)"
php panini.php 01.0829 laN
((number++))
echo "$number - Processing 01.0829 viDiliN analysis started at $(timestamp)"
php panini.php 01.0829 viDiliN
((number++))
echo "$number - Processing 01.0829 luN analysis started at $(timestamp)"
php panini.php 01.0829 luN
((number++))
echo "$number - Processing 01.0829 lfN analysis started at $(timestamp)"
php panini.php 01.0829 lfN
((number++))
echo "$number - Processing 01.0394 law analysis started at $(timestamp)"
php panini.php 01.0394 law
((number++))
echo "$number - Processing 01.0394 liw analysis started at $(timestamp)"
php panini.php 01.0394 liw
((number++))
echo "$number - Processing 01.0394 luw analysis started at $(timestamp)"
php panini.php 01.0394 luw
((number++))
echo "$number - Processing 01.0394 lfw analysis started at $(timestamp)"
php panini.php 01.0394 lfw
((number++))
echo "$number - Processing 01.0394 low analysis started at $(timestamp)"
php panini.php 01.0394 low
((number++))
echo "$number - Processing 01.0394 laN analysis started at $(timestamp)"
php panini.php 01.0394 laN
((number++))
echo "$number - Processing 01.0394 viDiliN analysis started at $(timestamp)"
php panini.php 01.0394 viDiliN
((number++))
echo "$number - Processing 01.0394 luN analysis started at $(timestamp)"
php panini.php 01.0394 luN
((number++))
echo "$number - Processing 01.0394 lfN analysis started at $(timestamp)"
php panini.php 01.0394 lfN
((number++))
echo "$number - Processing 06.0164 law analysis started at $(timestamp)"
php panini.php 06.0164 law
((number++))
echo "$number - Processing 06.0164 low analysis started at $(timestamp)"
php panini.php 06.0164 low
((number++))
echo "$number - Processing 06.0164 laN analysis started at $(timestamp)"
php panini.php 06.0164 laN
((number++))
echo "$number - Processing 06.0164 viDiliN analysis started at $(timestamp)"
php panini.php 06.0164 viDiliN
((number++))
echo "$number - Processing 01.0991 law analysis started at $(timestamp)"
php panini.php 01.0991 law
((number++))
echo "$number - Processing 01.0991 low analysis started at $(timestamp)"
php panini.php 01.0991 low
((number++))
echo "$number - Processing 01.0991 laN analysis started at $(timestamp)"
php panini.php 01.0991 laN
((number++))
echo "$number - Processing 01.0991 viDiliN analysis started at $(timestamp)"
php panini.php 01.0991 viDiliN
((number++))
echo "$number - Processing 04.0064 liw analysis started at $(timestamp)"
php panini.php 04.0064 liw
((number++))
echo "$number - Processing 01.1155 liw analysis started at $(timestamp)"
php panini.php 01.1155 liw
((number++))
echo "$number - Processing 01.0455 low analysis started at $(timestamp)"
php panini.php 01.0455 low
((number++))
echo "$number - Processing 01.0826 liw analysis started at $(timestamp)"
php panini.php 01.0826 liw
((number++))
echo "$number - Processing 01.0826 luw analysis started at $(timestamp)"
php panini.php 01.0826 luw
((number++))
echo "$number - Processing 01.0826 lfw analysis started at $(timestamp)"
php panini.php 01.0826 lfw
((number++))
echo "$number - Processing 01.0826 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0826 ASIrliN
((number++))
echo "$number - Processing 01.0826 lfN analysis started at $(timestamp)"
php panini.php 01.0826 lfN
((number++))
echo "$number - Processing 01.0828 liw analysis started at $(timestamp)"
php panini.php 01.0828 liw
((number++))
echo "$number - Processing 01.1150 law analysis started at $(timestamp)"
php panini.php 01.1150 law
((number++))
echo "$number - Processing 01.1150 liw analysis started at $(timestamp)"
php panini.php 01.1150 liw
((number++))
echo "$number - Processing 01.1150 luw analysis started at $(timestamp)"
php panini.php 01.1150 luw
((number++))
echo "$number - Processing 01.1150 lfw analysis started at $(timestamp)"
php panini.php 01.1150 lfw
((number++))
echo "$number - Processing 01.1150 low analysis started at $(timestamp)"
php panini.php 01.1150 low
((number++))
echo "$number - Processing 01.1150 laN analysis started at $(timestamp)"
php panini.php 01.1150 laN
((number++))
echo "$number - Processing 01.1150 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1150 ASIrliN
((number++))
echo "$number - Processing 01.1150 viDiliN analysis started at $(timestamp)"
php panini.php 01.1150 viDiliN
((number++))
echo "$number - Processing 01.1150 luN analysis started at $(timestamp)"
php panini.php 01.1150 luN
((number++))
echo "$number - Processing 01.1150 lfN analysis started at $(timestamp)"
php panini.php 01.1150 lfN
((number++))
echo "$number - Processing 10.0052 law analysis started at $(timestamp)"
php panini.php 10.0052 law
((number++))
echo "$number - Processing 10.0052 liw analysis started at $(timestamp)"
php panini.php 10.0052 liw
((number++))
echo "$number - Processing 10.0052 luw analysis started at $(timestamp)"
php panini.php 10.0052 luw
((number++))
echo "$number - Processing 10.0052 lfw analysis started at $(timestamp)"
php panini.php 10.0052 lfw
((number++))
echo "$number - Processing 10.0052 low analysis started at $(timestamp)"
php panini.php 10.0052 low
((number++))
echo "$number - Processing 10.0052 laN analysis started at $(timestamp)"
php panini.php 10.0052 laN
((number++))
echo "$number - Processing 10.0052 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0052 ASIrliN
((number++))
echo "$number - Processing 10.0052 viDiliN analysis started at $(timestamp)"
php panini.php 10.0052 viDiliN
((number++))
echo "$number - Processing 10.0052 luN analysis started at $(timestamp)"
php panini.php 10.0052 luN
((number++))
echo "$number - Processing 10.0052 lfN analysis started at $(timestamp)"
php panini.php 10.0052 lfN
((number++))
echo "$number - Processing 02.0070 law analysis started at $(timestamp)"
php panini.php 02.0070 law
((number++))
echo "$number - Processing 05.0003 ASIrliN analysis started at $(timestamp)"
php panini.php 05.0003 ASIrliN
((number++))
echo "$number - Processing 05.0003 viDiliN analysis started at $(timestamp)"
php panini.php 05.0003 viDiliN
((number++))
echo "$number - Processing 01.0689 liw analysis started at $(timestamp)"
php panini.php 01.0689 liw
((number++))
echo "$number - Processing 01.0174 law analysis started at $(timestamp)"
php panini.php 01.0174 law
((number++))
echo "$number - Processing 01.0174 liw analysis started at $(timestamp)"
php panini.php 01.0174 liw
((number++))
echo "$number - Processing 01.0174 luw analysis started at $(timestamp)"
php panini.php 01.0174 luw
((number++))
echo "$number - Processing 01.0174 lfw analysis started at $(timestamp)"
php panini.php 01.0174 lfw
((number++))
echo "$number - Processing 01.0174 low analysis started at $(timestamp)"
php panini.php 01.0174 low
((number++))
echo "$number - Processing 01.0174 laN analysis started at $(timestamp)"
php panini.php 01.0174 laN
((number++))
echo "$number - Processing 01.0174 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0174 ASIrliN
((number++))
echo "$number - Processing 01.0174 viDiliN analysis started at $(timestamp)"
php panini.php 01.0174 viDiliN
((number++))
echo "$number - Processing 01.0174 luN analysis started at $(timestamp)"
php panini.php 01.0174 luN
((number++))
echo "$number - Processing 01.0174 lfN analysis started at $(timestamp)"
php panini.php 01.0174 lfN
((number++))
echo "$number - Processing 01.0184 liw analysis started at $(timestamp)"
php panini.php 01.0184 liw
((number++))
echo "$number - Processing 02.0019 law analysis started at $(timestamp)"
php panini.php 02.0019 law
((number++))
echo "$number - Processing 02.0019 liw analysis started at $(timestamp)"
php panini.php 02.0019 liw
((number++))
echo "$number - Processing 02.0019 laN analysis started at $(timestamp)"
php panini.php 02.0019 laN
((number++))
echo "$number - Processing 02.0019 luN analysis started at $(timestamp)"
php panini.php 02.0019 luN
((number++))
echo "$number - Processing 01.0340 liw analysis started at $(timestamp)"
php panini.php 01.0340 liw
((number++))
echo "$number - Processing 06.0089 liw analysis started at $(timestamp)"
php panini.php 06.0089 liw
((number++))
echo "$number - Processing 01.0783 liw analysis started at $(timestamp)"
php panini.php 01.0783 liw
((number++))
echo "$number - Processing 07.0349 liw analysis started at $(timestamp)"
php panini.php 07.0349 liw
((number++))
echo "$number - Processing 10.0363 luN analysis started at $(timestamp)"
php panini.php 10.0363 luN
((number++))
echo "$number - Processing 10.0320 luN analysis started at $(timestamp)"
php panini.php 10.0320 luN
((number++))
echo "$number - Processing 01.0078 liw analysis started at $(timestamp)"
php panini.php 01.0078 liw
((number++))
echo "$number - Processing 01.0444 liw analysis started at $(timestamp)"
php panini.php 01.0444 liw
((number++))
echo "$number - Processing 01.0444 low analysis started at $(timestamp)"
php panini.php 01.0444 low
((number++))
echo "$number - Processing 10.0419 luN analysis started at $(timestamp)"
php panini.php 10.0419 luN
((number++))
echo "$number - Processing 01.0601 liw analysis started at $(timestamp)"
php panini.php 01.0601 liw
((number++))
echo "$number - Processing 01.0127 law analysis started at $(timestamp)"
php panini.php 01.0127 law
((number++))
echo "$number - Processing 01.0127 liw analysis started at $(timestamp)"
php panini.php 01.0127 liw
((number++))
echo "$number - Processing 01.0127 luw analysis started at $(timestamp)"
php panini.php 01.0127 luw
((number++))
echo "$number - Processing 01.0127 lfw analysis started at $(timestamp)"
php panini.php 01.0127 lfw
((number++))
echo "$number - Processing 01.0127 low analysis started at $(timestamp)"
php panini.php 01.0127 low
((number++))
echo "$number - Processing 01.0127 laN analysis started at $(timestamp)"
php panini.php 01.0127 laN
((number++))
echo "$number - Processing 01.0127 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0127 ASIrliN
((number++))
echo "$number - Processing 01.0127 viDiliN analysis started at $(timestamp)"
php panini.php 01.0127 viDiliN
((number++))
echo "$number - Processing 01.0127 luN analysis started at $(timestamp)"
php panini.php 01.0127 luN
((number++))
echo "$number - Processing 01.0127 lfN analysis started at $(timestamp)"
php panini.php 01.0127 lfN
((number++))
echo "$number - Processing 04.0061 liw analysis started at $(timestamp)"
php panini.php 04.0061 liw
((number++))
echo "$number - Processing 04.0061 luN analysis started at $(timestamp)"
php panini.php 04.0061 luN
((number++))
echo "$number - Processing 01.0590 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0590 ASIrliN
((number++))
echo "$number - Processing 01.0395 liw analysis started at $(timestamp)"
php panini.php 01.0395 liw
((number++))
echo "$number - Processing 06.0062 liw analysis started at $(timestamp)"
php panini.php 06.0062 liw
((number++))
echo "$number - Processing 06.0062 luw analysis started at $(timestamp)"
php panini.php 06.0062 luw
((number++))
echo "$number - Processing 06.0062 lfw analysis started at $(timestamp)"
php panini.php 06.0062 lfw
((number++))
echo "$number - Processing 06.0062 luN analysis started at $(timestamp)"
php panini.php 06.0062 luN
((number++))
echo "$number - Processing 06.0062 lfN analysis started at $(timestamp)"
php panini.php 06.0062 lfN
((number++))
echo "$number - Processing 10.0369 luN analysis started at $(timestamp)"
php panini.php 10.0369 luN
((number++))
echo "$number - Processing 01.0853 law analysis started at $(timestamp)"
php panini.php 01.0853 law
((number++))
echo "$number - Processing 01.0853 low analysis started at $(timestamp)"
php panini.php 01.0853 low
((number++))
echo "$number - Processing 01.0853 laN analysis started at $(timestamp)"
php panini.php 01.0853 laN
((number++))
echo "$number - Processing 01.0853 viDiliN analysis started at $(timestamp)"
php panini.php 01.0853 viDiliN
((number++))
echo "$number - Processing 01.0853 luN analysis started at $(timestamp)"
php panini.php 01.0853 luN
((number++))
echo "$number - Processing 01.0500 luN analysis started at $(timestamp)"
php panini.php 01.0500 luN
((number++))
echo "$number - Processing 01.0864 luN analysis started at $(timestamp)"
php panini.php 01.0864 luN
((number++))
echo "$number - Processing 01.1014 luN analysis started at $(timestamp)"
php panini.php 01.1014 luN
((number++))
echo "$number - Processing 04.0040 low analysis started at $(timestamp)"
php panini.php 04.0040 low
((number++))
echo "$number - Processing 04.0040 viDiliN analysis started at $(timestamp)"
php panini.php 04.0040 viDiliN
((number++))
echo "$number - Processing 04.0040 luN analysis started at $(timestamp)"
php panini.php 04.0040 luN
((number++))
echo "$number - Processing 01.0325 liw analysis started at $(timestamp)"
php panini.php 01.0325 liw
((number++))
echo "$number - Processing 01.0041 law analysis started at $(timestamp)"
php panini.php 01.0041 law
((number++))
echo "$number - Processing 01.0041 liw analysis started at $(timestamp)"
php panini.php 01.0041 liw
((number++))
echo "$number - Processing 01.0041 luw analysis started at $(timestamp)"
php panini.php 01.0041 luw
((number++))
echo "$number - Processing 01.0041 lfw analysis started at $(timestamp)"
php panini.php 01.0041 lfw
((number++))
echo "$number - Processing 01.0041 low analysis started at $(timestamp)"
php panini.php 01.0041 low
((number++))
echo "$number - Processing 01.0041 laN analysis started at $(timestamp)"
php panini.php 01.0041 laN
((number++))
echo "$number - Processing 01.0041 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0041 ASIrliN
((number++))
echo "$number - Processing 01.0041 viDiliN analysis started at $(timestamp)"
php panini.php 01.0041 viDiliN
((number++))
echo "$number - Processing 01.0041 luN analysis started at $(timestamp)"
php panini.php 01.0041 luN
((number++))
echo "$number - Processing 01.0041 lfN analysis started at $(timestamp)"
php panini.php 01.0041 lfN
((number++))
echo "$number - Processing 01.0042 liw analysis started at $(timestamp)"
php panini.php 01.0042 liw
((number++))
echo "$number - Processing 01.0042 low analysis started at $(timestamp)"
php panini.php 01.0042 low
((number++))
echo "$number - Processing 01.0909 law analysis started at $(timestamp)"
php panini.php 01.0909 law
((number++))
echo "$number - Processing 01.0909 liw analysis started at $(timestamp)"
php panini.php 01.0909 liw
((number++))
echo "$number - Processing 01.0909 luw analysis started at $(timestamp)"
php panini.php 01.0909 luw
((number++))
echo "$number - Processing 01.0909 lfw analysis started at $(timestamp)"
php panini.php 01.0909 lfw
((number++))
echo "$number - Processing 01.0909 low analysis started at $(timestamp)"
php panini.php 01.0909 low
((number++))
echo "$number - Processing 01.0909 laN analysis started at $(timestamp)"
php panini.php 01.0909 laN
((number++))
echo "$number - Processing 01.0909 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0909 ASIrliN
((number++))
echo "$number - Processing 01.0909 viDiliN analysis started at $(timestamp)"
php panini.php 01.0909 viDiliN
((number++))
echo "$number - Processing 01.0909 luN analysis started at $(timestamp)"
php panini.php 01.0909 luN
((number++))
echo "$number - Processing 01.0909 lfN analysis started at $(timestamp)"
php panini.php 01.0909 lfN
((number++))
echo "$number - Processing 01.0596 liw analysis started at $(timestamp)"
php panini.php 01.0596 liw
((number++))
echo "$number - Processing 01.0865 liw analysis started at $(timestamp)"
php panini.php 01.0865 liw
((number++))
echo "$number - Processing 01.0865 lfw analysis started at $(timestamp)"
php panini.php 01.0865 lfw
((number++))
echo "$number - Processing 01.0865 lfN analysis started at $(timestamp)"
php panini.php 01.0865 lfN
((number++))
echo "$number - Processing 01.1108 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1108 ASIrliN
((number++))
echo "$number - Processing 01.0857 liw analysis started at $(timestamp)"
php panini.php 01.0857 liw
((number++))
echo "$number - Processing 01.0857 luw analysis started at $(timestamp)"
php panini.php 01.0857 luw
((number++))
echo "$number - Processing 01.0857 lfw analysis started at $(timestamp)"
php panini.php 01.0857 lfw
((number++))
echo "$number - Processing 01.0857 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0857 ASIrliN
((number++))
echo "$number - Processing 01.0857 luN analysis started at $(timestamp)"
php panini.php 01.0857 luN
((number++))
echo "$number - Processing 01.0857 lfN analysis started at $(timestamp)"
php panini.php 01.0857 lfN
((number++))
echo "$number - Processing 01.0907 luN analysis started at $(timestamp)"
php panini.php 01.0907 luN
((number++))
echo "$number - Processing 09.0374 law analysis started at $(timestamp)"
php panini.php 09.0374 law
((number++))
echo "$number - Processing 09.0374 low analysis started at $(timestamp)"
php panini.php 09.0374 low
((number++))
echo "$number - Processing 09.0374 laN analysis started at $(timestamp)"
php panini.php 09.0374 laN
((number++))
echo "$number - Processing 09.0374 viDiliN analysis started at $(timestamp)"
php panini.php 09.0374 viDiliN
((number++))
echo "$number - Processing 09.0048 law analysis started at $(timestamp)"
php panini.php 09.0048 law
((number++))
echo "$number - Processing 09.0048 low analysis started at $(timestamp)"
php panini.php 09.0048 low
((number++))
echo "$number - Processing 09.0048 laN analysis started at $(timestamp)"
php panini.php 09.0048 laN
((number++))
echo "$number - Processing 09.0048 viDiliN analysis started at $(timestamp)"
php panini.php 09.0048 viDiliN
((number++))
echo "$number - Processing 04.0101 liw analysis started at $(timestamp)"
php panini.php 04.0101 liw
((number++))
echo "$number - Processing 01.0458 laN analysis started at $(timestamp)"
php panini.php 01.0458 laN
((number++))
echo "$number - Processing 01.0458 viDiliN analysis started at $(timestamp)"
php panini.php 01.0458 viDiliN
((number++))
echo "$number - Processing 01.0458 luN analysis started at $(timestamp)"
php panini.php 01.0458 luN
((number++))
echo "$number - Processing 01.0922 luw analysis started at $(timestamp)"
php panini.php 01.0922 luw
((number++))
echo "$number - Processing 01.0922 lfw analysis started at $(timestamp)"
php panini.php 01.0922 lfw
((number++))
echo "$number - Processing 01.0922 viDiliN analysis started at $(timestamp)"
php panini.php 01.0922 viDiliN
((number++))
echo "$number - Processing 01.0922 luN analysis started at $(timestamp)"
php panini.php 01.0922 luN
((number++))
echo "$number - Processing 01.0922 lfN analysis started at $(timestamp)"
php panini.php 01.0922 lfN
((number++))
echo "$number - Processing 09.0003 law analysis started at $(timestamp)"
php panini.php 09.0003 law
((number++))
echo "$number - Processing 09.0003 luw analysis started at $(timestamp)"
php panini.php 09.0003 luw
((number++))
echo "$number - Processing 09.0003 lfw analysis started at $(timestamp)"
php panini.php 09.0003 lfw
((number++))
echo "$number - Processing 09.0003 low analysis started at $(timestamp)"
php panini.php 09.0003 low
((number++))
echo "$number - Processing 09.0003 laN analysis started at $(timestamp)"
php panini.php 09.0003 laN
((number++))
echo "$number - Processing 09.0003 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0003 ASIrliN
((number++))
echo "$number - Processing 09.0003 viDiliN analysis started at $(timestamp)"
php panini.php 09.0003 viDiliN
((number++))
echo "$number - Processing 09.0003 luN analysis started at $(timestamp)"
php panini.php 09.0003 luN
((number++))
echo "$number - Processing 09.0003 lfN analysis started at $(timestamp)"
php panini.php 09.0003 lfN
((number++))
echo "$number - Processing 01.0135 lfw analysis started at $(timestamp)"
php panini.php 01.0135 lfw
((number++))
echo "$number - Processing 01.0799 viDiliN analysis started at $(timestamp)"
php panini.php 01.0799 viDiliN
((number++))
echo "$number - Processing 01.0081 law analysis started at $(timestamp)"
php panini.php 01.0081 law
((number++))
echo "$number - Processing 01.0081 liw analysis started at $(timestamp)"
php panini.php 01.0081 liw
((number++))
echo "$number - Processing 01.0081 low analysis started at $(timestamp)"
php panini.php 01.0081 low
((number++))
echo "$number - Processing 01.0081 laN analysis started at $(timestamp)"
php panini.php 01.0081 laN
((number++))
echo "$number - Processing 01.0081 viDiliN analysis started at $(timestamp)"
php panini.php 01.0081 viDiliN
((number++))
echo "$number - Processing 01.0081 luN analysis started at $(timestamp)"
php panini.php 01.0081 luN
((number++))
echo "$number - Processing 01.0101 law analysis started at $(timestamp)"
php panini.php 01.0101 law
((number++))
echo "$number - Processing 01.0101 liw analysis started at $(timestamp)"
php panini.php 01.0101 liw
((number++))
echo "$number - Processing 01.0101 low analysis started at $(timestamp)"
php panini.php 01.0101 low
((number++))
echo "$number - Processing 01.0101 laN analysis started at $(timestamp)"
php panini.php 01.0101 laN
((number++))
echo "$number - Processing 01.0101 viDiliN analysis started at $(timestamp)"
php panini.php 01.0101 viDiliN
((number++))
echo "$number - Processing 01.0101 luN analysis started at $(timestamp)"
php panini.php 01.0101 luN
((number++))
echo "$number - Processing 01.0190 law analysis started at $(timestamp)"
php panini.php 01.0190 law
((number++))
echo "$number - Processing 01.1165 liw analysis started at $(timestamp)"
php panini.php 01.1165 liw
((number++))
echo "$number - Processing 01.1165 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1165 ASIrliN
((number++))
echo "$number - Processing 01.1165 luN analysis started at $(timestamp)"
php panini.php 01.1165 luN
((number++))
echo "$number - Processing 01.0010 liw analysis started at $(timestamp)"
php panini.php 01.0010 liw
((number++))
echo "$number - Processing 01.1059 liw analysis started at $(timestamp)"
php panini.php 01.1059 liw
((number++))
echo "$number - Processing 01.0105 law analysis started at $(timestamp)"
php panini.php 01.0105 law
((number++))
echo "$number - Processing 01.0105 liw analysis started at $(timestamp)"
php panini.php 01.0105 liw
((number++))
echo "$number - Processing 01.0105 luw analysis started at $(timestamp)"
php panini.php 01.0105 luw
((number++))
echo "$number - Processing 01.0105 lfw analysis started at $(timestamp)"
php panini.php 01.0105 lfw
((number++))
echo "$number - Processing 01.0105 low analysis started at $(timestamp)"
php panini.php 01.0105 low
((number++))
echo "$number - Processing 01.0105 laN analysis started at $(timestamp)"
php panini.php 01.0105 laN
((number++))
echo "$number - Processing 01.0105 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0105 ASIrliN
((number++))
echo "$number - Processing 01.0105 viDiliN analysis started at $(timestamp)"
php panini.php 01.0105 viDiliN
((number++))
echo "$number - Processing 01.0105 luN analysis started at $(timestamp)"
php panini.php 01.0105 luN
((number++))
echo "$number - Processing 01.0105 lfN analysis started at $(timestamp)"
php panini.php 01.0105 lfN
((number++))
echo "$number - Processing 02.0074 law analysis started at $(timestamp)"
php panini.php 02.0074 law
((number++))
echo "$number - Processing 02.0074 low analysis started at $(timestamp)"
php panini.php 02.0074 low
((number++))
echo "$number - Processing 02.0074 laN analysis started at $(timestamp)"
php panini.php 02.0074 laN
((number++))
echo "$number - Processing 02.0074 luN analysis started at $(timestamp)"
php panini.php 02.0074 luN
((number++))
echo "$number - Processing 10.0433 law analysis started at $(timestamp)"
php panini.php 10.0433 law
((number++))
echo "$number - Processing 10.0433 liw analysis started at $(timestamp)"
php panini.php 10.0433 liw
((number++))
echo "$number - Processing 10.0433 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0433 ASIrliN
((number++))
echo "$number - Processing 10.0433 lfN analysis started at $(timestamp)"
php panini.php 10.0433 lfN
((number++))
echo "$number - Processing 10.0467 law analysis started at $(timestamp)"
php panini.php 10.0467 law
((number++))
echo "$number - Processing 10.0467 liw analysis started at $(timestamp)"
php panini.php 10.0467 liw
((number++))
echo "$number - Processing 10.0467 luw analysis started at $(timestamp)"
php panini.php 10.0467 luw
((number++))
echo "$number - Processing 10.0467 lfw analysis started at $(timestamp)"
php panini.php 10.0467 lfw
((number++))
echo "$number - Processing 10.0467 low analysis started at $(timestamp)"
php panini.php 10.0467 low
((number++))
echo "$number - Processing 10.0467 laN analysis started at $(timestamp)"
php panini.php 10.0467 laN
((number++))
echo "$number - Processing 10.0467 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0467 ASIrliN
((number++))
echo "$number - Processing 10.0467 viDiliN analysis started at $(timestamp)"
php panini.php 10.0467 viDiliN
((number++))
echo "$number - Processing 10.0467 luN analysis started at $(timestamp)"
php panini.php 10.0467 luN
((number++))
echo "$number - Processing 10.0467 lfN analysis started at $(timestamp)"
php panini.php 10.0467 lfN
((number++))
echo "$number - Processing 01.0187 luw analysis started at $(timestamp)"
php panini.php 01.0187 luw
((number++))
echo "$number - Processing 01.0229 liw analysis started at $(timestamp)"
php panini.php 01.0229 liw
((number++))
echo "$number - Processing 01.0229 laN analysis started at $(timestamp)"
php panini.php 01.0229 laN
((number++))
echo "$number - Processing 01.0229 viDiliN analysis started at $(timestamp)"
php panini.php 01.0229 viDiliN
((number++))
echo "$number - Processing 01.0229 luN analysis started at $(timestamp)"
php panini.php 01.0229 luN
((number++))
echo "$number - Processing 01.0229 lfN analysis started at $(timestamp)"
php panini.php 01.0229 lfN
((number++))
echo "$number - Processing 01.1142 law analysis started at $(timestamp)"
php panini.php 01.1142 law
((number++))
echo "$number - Processing 01.1142 low analysis started at $(timestamp)"
php panini.php 01.1142 low
((number++))
echo "$number - Processing 01.1142 laN analysis started at $(timestamp)"
php panini.php 01.1142 laN
((number++))
echo "$number - Processing 01.1142 viDiliN analysis started at $(timestamp)"
php panini.php 01.1142 viDiliN
((number++))
echo "$number - Processing 06.0163 law analysis started at $(timestamp)"
php panini.php 06.0163 law
((number++))
echo "$number - Processing 06.0163 low analysis started at $(timestamp)"
php panini.php 06.0163 low
((number++))
echo "$number - Processing 06.0163 viDiliN analysis started at $(timestamp)"
php panini.php 06.0163 viDiliN
((number++))
echo "$number - Processing 01.0990 law analysis started at $(timestamp)"
php panini.php 01.0990 law
((number++))
echo "$number - Processing 01.0990 low analysis started at $(timestamp)"
php panini.php 01.0990 low
((number++))
echo "$number - Processing 01.0990 viDiliN analysis started at $(timestamp)"
php panini.php 01.0990 viDiliN
((number++))
echo "$number - Processing 05.0024 viDiliN analysis started at $(timestamp)"
php panini.php 05.0024 viDiliN
((number++))
echo "$number - Processing 05.0024 luN analysis started at $(timestamp)"
php panini.php 05.0024 luN
((number++))
echo "$number - Processing 10.0429 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0429 ASIrliN
((number++))
echo "$number - Processing 04.0132 law analysis started at $(timestamp)"
php panini.php 04.0132 law
((number++))
echo "$number - Processing 04.0132 low analysis started at $(timestamp)"
php panini.php 04.0132 low
((number++))
echo "$number - Processing 04.0132 laN analysis started at $(timestamp)"
php panini.php 04.0132 laN
((number++))
echo "$number - Processing 04.0132 viDiliN analysis started at $(timestamp)"
php panini.php 04.0132 viDiliN
((number++))
echo "$number - Processing 01.0759 law analysis started at $(timestamp)"
php panini.php 01.0759 law
((number++))
echo "$number - Processing 01.0759 liw analysis started at $(timestamp)"
php panini.php 01.0759 liw
((number++))
echo "$number - Processing 01.0759 luw analysis started at $(timestamp)"
php panini.php 01.0759 luw
((number++))
echo "$number - Processing 01.0759 lfw analysis started at $(timestamp)"
php panini.php 01.0759 lfw
((number++))
echo "$number - Processing 01.0759 low analysis started at $(timestamp)"
php panini.php 01.0759 low
((number++))
echo "$number - Processing 01.0759 laN analysis started at $(timestamp)"
php panini.php 01.0759 laN
((number++))
echo "$number - Processing 01.0759 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0759 ASIrliN
((number++))
echo "$number - Processing 01.0759 viDiliN analysis started at $(timestamp)"
php panini.php 01.0759 viDiliN
((number++))
echo "$number - Processing 01.0759 luN analysis started at $(timestamp)"
php panini.php 01.0759 luN
((number++))
echo "$number - Processing 01.0759 lfN analysis started at $(timestamp)"
php panini.php 01.0759 lfN
((number++))
echo "$number - Processing 01.0257 laN analysis started at $(timestamp)"
php panini.php 01.0257 laN
((number++))
echo "$number - Processing 01.0490 law analysis started at $(timestamp)"
php panini.php 01.0490 law
((number++))
echo "$number - Processing 01.0490 liw analysis started at $(timestamp)"
php panini.php 01.0490 liw
((number++))
echo "$number - Processing 01.0490 luw analysis started at $(timestamp)"
php panini.php 01.0490 luw
((number++))
echo "$number - Processing 01.0490 lfw analysis started at $(timestamp)"
php panini.php 01.0490 lfw
((number++))
echo "$number - Processing 01.0490 low analysis started at $(timestamp)"
php panini.php 01.0490 low
((number++))
echo "$number - Processing 01.0490 laN analysis started at $(timestamp)"
php panini.php 01.0490 laN
((number++))
echo "$number - Processing 01.0490 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0490 ASIrliN
((number++))
echo "$number - Processing 01.0490 viDiliN analysis started at $(timestamp)"
php panini.php 01.0490 viDiliN
((number++))
echo "$number - Processing 01.0490 luN analysis started at $(timestamp)"
php panini.php 01.0490 luN
((number++))
echo "$number - Processing 01.0490 lfN analysis started at $(timestamp)"
php panini.php 01.0490 lfN
((number++))
echo "$number - Processing 01.0628 luN analysis started at $(timestamp)"
php panini.php 01.0628 luN
((number++))
echo "$number - Processing 02.0073 lfw analysis started at $(timestamp)"
php panini.php 02.0073 lfw
((number++))
echo "$number - Processing 04.0341 low analysis started at $(timestamp)"
php panini.php 04.0341 low
((number++))
echo "$number - Processing 01.0988 luN analysis started at $(timestamp)"
php panini.php 01.0988 luN
((number++))
echo "$number - Processing 05.0019 law analysis started at $(timestamp)"
php panini.php 05.0019 law
((number++))
echo "$number - Processing 05.0002 viDiliN analysis started at $(timestamp)"
php panini.php 05.0002 viDiliN
((number++))
echo "$number - Processing 06.0170 law analysis started at $(timestamp)"
php panini.php 06.0170 law
((number++))
echo "$number - Processing 06.0170 liw analysis started at $(timestamp)"
php panini.php 06.0170 liw
((number++))
echo "$number - Processing 06.0170 low analysis started at $(timestamp)"
php panini.php 06.0170 low
((number++))
echo "$number - Processing 06.0170 viDiliN analysis started at $(timestamp)"
php panini.php 06.0170 viDiliN
((number++))
echo "$number - Processing 06.0170 luN analysis started at $(timestamp)"
php panini.php 06.0170 luN
((number++))
echo "$number - Processing 01.0674 law analysis started at $(timestamp)"
php panini.php 01.0674 law
((number++))
echo "$number - Processing 01.0674 liw analysis started at $(timestamp)"
php panini.php 01.0674 liw
((number++))
echo "$number - Processing 01.0674 luw analysis started at $(timestamp)"
php panini.php 01.0674 luw
((number++))
echo "$number - Processing 01.0674 lfw analysis started at $(timestamp)"
php panini.php 01.0674 lfw
((number++))
echo "$number - Processing 01.0674 low analysis started at $(timestamp)"
php panini.php 01.0674 low
((number++))
echo "$number - Processing 01.0674 laN analysis started at $(timestamp)"
php panini.php 01.0674 laN
((number++))
echo "$number - Processing 01.0674 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0674 ASIrliN
((number++))
echo "$number - Processing 01.0674 viDiliN analysis started at $(timestamp)"
php panini.php 01.0674 viDiliN
((number++))
echo "$number - Processing 01.0674 luN analysis started at $(timestamp)"
php panini.php 01.0674 luN
((number++))
echo "$number - Processing 01.0674 lfN analysis started at $(timestamp)"
php panini.php 01.0674 lfN
((number++))
echo "$number - Processing 01.0498 liw analysis started at $(timestamp)"
php panini.php 01.0498 liw
((number++))
echo "$number - Processing 01.0499 law analysis started at $(timestamp)"
php panini.php 01.0499 law
((number++))
echo "$number - Processing 01.0499 liw analysis started at $(timestamp)"
php panini.php 01.0499 liw
((number++))
echo "$number - Processing 01.0499 luw analysis started at $(timestamp)"
php panini.php 01.0499 luw
((number++))
echo "$number - Processing 01.0499 lfw analysis started at $(timestamp)"
php panini.php 01.0499 lfw
((number++))
echo "$number - Processing 01.0499 low analysis started at $(timestamp)"
php panini.php 01.0499 low
((number++))
echo "$number - Processing 01.0499 laN analysis started at $(timestamp)"
php panini.php 01.0499 laN
((number++))
echo "$number - Processing 01.0499 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0499 ASIrliN
((number++))
echo "$number - Processing 01.0499 viDiliN analysis started at $(timestamp)"
php panini.php 01.0499 viDiliN
((number++))
echo "$number - Processing 01.0499 luN analysis started at $(timestamp)"
php panini.php 01.0499 luN
((number++))
echo "$number - Processing 01.0499 lfN analysis started at $(timestamp)"
php panini.php 01.0499 lfN
((number++))
echo "$number - Processing 06.0090 liw analysis started at $(timestamp)"
php panini.php 06.0090 liw
((number++))
echo "$number - Processing 01.0079 law analysis started at $(timestamp)"
php panini.php 01.0079 law
((number++))
echo "$number - Processing 01.0079 liw analysis started at $(timestamp)"
php panini.php 01.0079 liw
((number++))
echo "$number - Processing 01.0079 luw analysis started at $(timestamp)"
php panini.php 01.0079 luw
((number++))
echo "$number - Processing 01.0079 lfw analysis started at $(timestamp)"
php panini.php 01.0079 lfw
((number++))
echo "$number - Processing 01.0079 low analysis started at $(timestamp)"
php panini.php 01.0079 low
((number++))
echo "$number - Processing 01.0079 laN analysis started at $(timestamp)"
php panini.php 01.0079 laN
((number++))
echo "$number - Processing 01.0079 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0079 ASIrliN
((number++))
echo "$number - Processing 01.0079 viDiliN analysis started at $(timestamp)"
php panini.php 01.0079 viDiliN
((number++))
echo "$number - Processing 01.0079 luN analysis started at $(timestamp)"
php panini.php 01.0079 luN
((number++))
echo "$number - Processing 01.0079 lfN analysis started at $(timestamp)"
php panini.php 01.0079 lfN
((number++))
echo "$number - Processing 05.0001 viDiliN analysis started at $(timestamp)"
php panini.php 05.0001 viDiliN
((number++))
echo "$number - Processing 10.0475 law analysis started at $(timestamp)"
php panini.php 10.0475 law
((number++))
echo "$number - Processing 10.0475 liw analysis started at $(timestamp)"
php panini.php 10.0475 liw
((number++))
echo "$number - Processing 10.0475 luw analysis started at $(timestamp)"
php panini.php 10.0475 luw
((number++))
echo "$number - Processing 10.0475 lfw analysis started at $(timestamp)"
php panini.php 10.0475 lfw
((number++))
echo "$number - Processing 10.0475 low analysis started at $(timestamp)"
php panini.php 10.0475 low
((number++))
echo "$number - Processing 10.0475 laN analysis started at $(timestamp)"
php panini.php 10.0475 laN
((number++))
echo "$number - Processing 10.0475 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0475 ASIrliN
((number++))
echo "$number - Processing 10.0475 viDiliN analysis started at $(timestamp)"
php panini.php 10.0475 viDiliN
((number++))
echo "$number - Processing 10.0475 luN analysis started at $(timestamp)"
php panini.php 10.0475 luN
((number++))
echo "$number - Processing 10.0475 lfN analysis started at $(timestamp)"
php panini.php 10.0475 lfN
((number++))
echo "$number - Processing 10.0038 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0038 ASIrliN
((number++))
echo "$number - Processing 04.0024 luw analysis started at $(timestamp)"
php panini.php 04.0024 luw
((number++))
echo "$number - Processing 04.0024 lfw analysis started at $(timestamp)"
php panini.php 04.0024 lfw
((number++))
echo "$number - Processing 04.0024 luN analysis started at $(timestamp)"
php panini.php 04.0024 luN
((number++))
echo "$number - Processing 04.0024 lfN analysis started at $(timestamp)"
php panini.php 04.0024 lfN
((number++))
echo "$number - Processing 10.0242 luN analysis started at $(timestamp)"
php panini.php 10.0242 luN
((number++))
echo "$number - Processing 01.0586 liw analysis started at $(timestamp)"
php panini.php 01.0586 liw
((number++))
echo "$number - Processing 01.0586 low analysis started at $(timestamp)"
php panini.php 01.0586 low
((number++))
echo "$number - Processing 01.0586 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0586 ASIrliN
((number++))
echo "$number - Processing 01.0586 viDiliN analysis started at $(timestamp)"
php panini.php 01.0586 viDiliN
((number++))
echo "$number - Processing 01.0774 law analysis started at $(timestamp)"
php panini.php 01.0774 law
((number++))
echo "$number - Processing 01.0774 liw analysis started at $(timestamp)"
php panini.php 01.0774 liw
((number++))
echo "$number - Processing 01.0774 luw analysis started at $(timestamp)"
php panini.php 01.0774 luw
((number++))
echo "$number - Processing 01.0774 lfw analysis started at $(timestamp)"
php panini.php 01.0774 lfw
((number++))
echo "$number - Processing 01.0774 low analysis started at $(timestamp)"
php panini.php 01.0774 low
((number++))
echo "$number - Processing 01.0774 laN analysis started at $(timestamp)"
php panini.php 01.0774 laN
((number++))
echo "$number - Processing 01.0774 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0774 ASIrliN
((number++))
echo "$number - Processing 01.0774 viDiliN analysis started at $(timestamp)"
php panini.php 01.0774 viDiliN
((number++))
echo "$number - Processing 01.0774 luN analysis started at $(timestamp)"
php panini.php 01.0774 luN
((number++))
echo "$number - Processing 01.0774 lfN analysis started at $(timestamp)"
php panini.php 01.0774 lfN
((number++))
echo "$number - Processing 03.0018 law analysis started at $(timestamp)"
php panini.php 03.0018 law
((number++))
echo "$number - Processing 03.0018 low analysis started at $(timestamp)"
php panini.php 03.0018 low
((number++))
echo "$number - Processing 03.0018 laN analysis started at $(timestamp)"
php panini.php 03.0018 laN
((number++))
echo "$number - Processing 03.0018 viDiliN analysis started at $(timestamp)"
php panini.php 03.0018 viDiliN
((number++))
echo "$number - Processing 04.0075 lfw analysis started at $(timestamp)"
php panini.php 04.0075 lfw
((number++))
echo "$number - Processing 04.0075 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0075 ASIrliN
((number++))
echo "$number - Processing 04.0075 luN analysis started at $(timestamp)"
php panini.php 04.0075 luN
((number++))
echo "$number - Processing 04.0075 lfN analysis started at $(timestamp)"
php panini.php 04.0075 lfN
((number++))
echo "$number - Processing 06.0150 lfw analysis started at $(timestamp)"
php panini.php 06.0150 lfw
((number++))
echo "$number - Processing 06.0150 lfN analysis started at $(timestamp)"
php panini.php 06.0150 lfN
((number++))
echo "$number - Processing 01.0086 liw analysis started at $(timestamp)"
php panini.php 01.0086 liw
((number++))
echo "$number - Processing 01.1063 law analysis started at $(timestamp)"
php panini.php 01.1063 law
((number++))
echo "$number - Processing 01.1063 low analysis started at $(timestamp)"
php panini.php 01.1063 low
((number++))
echo "$number - Processing 01.1063 laN analysis started at $(timestamp)"
php panini.php 01.1063 laN
((number++))
echo "$number - Processing 01.1063 viDiliN analysis started at $(timestamp)"
php panini.php 01.1063 viDiliN
((number++))
echo "$number - Processing 04.0042 low analysis started at $(timestamp)"
php panini.php 04.0042 low
((number++))
echo "$number - Processing 04.0042 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0042 ASIrliN
((number++))
echo "$number - Processing 04.0042 viDiliN analysis started at $(timestamp)"
php panini.php 04.0042 viDiliN
((number++))
echo "$number - Processing 04.0042 luN analysis started at $(timestamp)"
php panini.php 04.0042 luN
((number++))
echo "$number - Processing 01.1134 luw analysis started at $(timestamp)"
php panini.php 01.1134 luw
((number++))
echo "$number - Processing 01.1134 luN analysis started at $(timestamp)"
php panini.php 01.1134 luN
((number++))
echo "$number - Processing 09.0009 law analysis started at $(timestamp)"
php panini.php 09.0009 law
((number++))
echo "$number - Processing 09.0009 liw analysis started at $(timestamp)"
php panini.php 09.0009 liw
((number++))
echo "$number - Processing 09.0009 luw analysis started at $(timestamp)"
php panini.php 09.0009 luw
((number++))
echo "$number - Processing 09.0009 lfw analysis started at $(timestamp)"
php panini.php 09.0009 lfw
((number++))
echo "$number - Processing 09.0009 low analysis started at $(timestamp)"
php panini.php 09.0009 low
((number++))
echo "$number - Processing 09.0009 laN analysis started at $(timestamp)"
php panini.php 09.0009 laN
((number++))
echo "$number - Processing 09.0009 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0009 ASIrliN
((number++))
echo "$number - Processing 09.0009 viDiliN analysis started at $(timestamp)"
php panini.php 09.0009 viDiliN
((number++))
echo "$number - Processing 09.0009 luN analysis started at $(timestamp)"
php panini.php 09.0009 luN
((number++))
echo "$number - Processing 09.0009 lfN analysis started at $(timestamp)"
php panini.php 09.0009 lfN
((number++))
echo "$number - Processing 09.0006 law analysis started at $(timestamp)"
php panini.php 09.0006 law
((number++))
echo "$number - Processing 09.0006 liw analysis started at $(timestamp)"
php panini.php 09.0006 liw
((number++))
echo "$number - Processing 09.0006 lfw analysis started at $(timestamp)"
php panini.php 09.0006 lfw
((number++))
echo "$number - Processing 09.0006 low analysis started at $(timestamp)"
php panini.php 09.0006 low
((number++))
echo "$number - Processing 09.0006 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0006 ASIrliN
((number++))
echo "$number - Processing 09.0006 lfN analysis started at $(timestamp)"
php panini.php 09.0006 lfN
((number++))
echo "$number - Processing 01.0009 liw analysis started at $(timestamp)"
php panini.php 01.0009 liw
((number++))
echo "$number - Processing 01.0009 laN analysis started at $(timestamp)"
php panini.php 01.0009 laN
((number++))
echo "$number - Processing 09.0010 law analysis started at $(timestamp)"
php panini.php 09.0010 law
((number++))
echo "$number - Processing 09.0010 liw analysis started at $(timestamp)"
php panini.php 09.0010 liw
((number++))
echo "$number - Processing 09.0010 luw analysis started at $(timestamp)"
php panini.php 09.0010 luw
((number++))
echo "$number - Processing 09.0010 lfw analysis started at $(timestamp)"
php panini.php 09.0010 lfw
((number++))
echo "$number - Processing 09.0010 low analysis started at $(timestamp)"
php panini.php 09.0010 low
((number++))
echo "$number - Processing 09.0010 laN analysis started at $(timestamp)"
php panini.php 09.0010 laN
((number++))
echo "$number - Processing 09.0010 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0010 ASIrliN
((number++))
echo "$number - Processing 09.0010 viDiliN analysis started at $(timestamp)"
php panini.php 09.0010 viDiliN
((number++))
echo "$number - Processing 09.0010 luN analysis started at $(timestamp)"
php panini.php 09.0010 luN
((number++))
echo "$number - Processing 09.0010 lfN analysis started at $(timestamp)"
php panini.php 09.0010 lfN
((number++))
echo "$number - Processing 01.0891 low analysis started at $(timestamp)"
php panini.php 01.0891 low
((number++))
echo "$number - Processing 01.0891 luN analysis started at $(timestamp)"
php panini.php 01.0891 luN
((number++))
echo "$number - Processing 09.0007 law analysis started at $(timestamp)"
php panini.php 09.0007 law
((number++))
echo "$number - Processing 09.0007 liw analysis started at $(timestamp)"
php panini.php 09.0007 liw
((number++))
echo "$number - Processing 09.0007 luw analysis started at $(timestamp)"
php panini.php 09.0007 luw
((number++))
echo "$number - Processing 09.0007 lfw analysis started at $(timestamp)"
php panini.php 09.0007 lfw
((number++))
echo "$number - Processing 09.0007 low analysis started at $(timestamp)"
php panini.php 09.0007 low
((number++))
echo "$number - Processing 09.0007 laN analysis started at $(timestamp)"
php panini.php 09.0007 laN
((number++))
echo "$number - Processing 09.0007 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0007 ASIrliN
((number++))
echo "$number - Processing 09.0007 viDiliN analysis started at $(timestamp)"
php panini.php 09.0007 viDiliN
((number++))
echo "$number - Processing 09.0007 luN analysis started at $(timestamp)"
php panini.php 09.0007 luN
((number++))
echo "$number - Processing 09.0007 lfN analysis started at $(timestamp)"
php panini.php 09.0007 lfN
((number++))
echo "$number - Processing 01.0970 law analysis started at $(timestamp)"
php panini.php 01.0970 law
((number++))
echo "$number - Processing 01.0970 liw analysis started at $(timestamp)"
php panini.php 01.0970 liw
((number++))
echo "$number - Processing 01.0970 luw analysis started at $(timestamp)"
php panini.php 01.0970 luw
((number++))
echo "$number - Processing 01.0970 lfw analysis started at $(timestamp)"
php panini.php 01.0970 lfw
((number++))
echo "$number - Processing 01.0970 low analysis started at $(timestamp)"
php panini.php 01.0970 low
((number++))
echo "$number - Processing 01.0970 laN analysis started at $(timestamp)"
php panini.php 01.0970 laN
((number++))
echo "$number - Processing 01.0970 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0970 ASIrliN
((number++))
echo "$number - Processing 01.0970 viDiliN analysis started at $(timestamp)"
php panini.php 01.0970 viDiliN
((number++))
echo "$number - Processing 01.0970 luN analysis started at $(timestamp)"
php panini.php 01.0970 luN
((number++))
echo "$number - Processing 01.0970 lfN analysis started at $(timestamp)"
php panini.php 01.0970 lfN
((number++))
echo "$number - Processing 05.0021 luN analysis started at $(timestamp)"
php panini.php 05.0021 luN
((number++))
echo "$number - Processing 01.0422 laN analysis started at $(timestamp)"
php panini.php 01.0422 laN
((number++))
echo "$number - Processing 04.0019 liw analysis started at $(timestamp)"
php panini.php 04.0019 liw
((number++))
echo "$number - Processing 04.0019 low analysis started at $(timestamp)"
php panini.php 04.0019 low
((number++))
echo "$number - Processing 04.0019 lfN analysis started at $(timestamp)"
php panini.php 04.0019 lfN
((number++))
echo "$number - Processing 02.0038 liw analysis started at $(timestamp)"
php panini.php 02.0038 liw
((number++))
echo "$number - Processing 02.0038 luN analysis started at $(timestamp)"
php panini.php 02.0038 luN
((number++))
echo "$number - Processing 01.0199 low analysis started at $(timestamp)"
php panini.php 01.0199 low
((number++))
echo "$number - Processing 04.0190 law analysis started at $(timestamp)"
php panini.php 04.0190 law
((number++))
echo "$number - Processing 04.0190 liw analysis started at $(timestamp)"
php panini.php 04.0190 liw
((number++))
echo "$number - Processing 04.0190 luw analysis started at $(timestamp)"
php panini.php 04.0190 luw
((number++))
echo "$number - Processing 04.0190 lfw analysis started at $(timestamp)"
php panini.php 04.0190 lfw
((number++))
echo "$number - Processing 04.0190 low analysis started at $(timestamp)"
php panini.php 04.0190 low
((number++))
echo "$number - Processing 04.0190 laN analysis started at $(timestamp)"
php panini.php 04.0190 laN
((number++))
echo "$number - Processing 04.0190 ASIrliN analysis started at $(timestamp)"
php panini.php 04.0190 ASIrliN
((number++))
echo "$number - Processing 04.0190 viDiliN analysis started at $(timestamp)"
php panini.php 04.0190 viDiliN
((number++))
echo "$number - Processing 04.0190 luN analysis started at $(timestamp)"
php panini.php 04.0190 luN
((number++))
echo "$number - Processing 04.0190 lfN analysis started at $(timestamp)"
php panini.php 04.0190 lfN
((number++))
echo "$number - Processing 01.0460 laN analysis started at $(timestamp)"
php panini.php 01.0460 laN
((number++))
echo "$number - Processing 09.0008 law analysis started at $(timestamp)"
php panini.php 09.0008 law
((number++))
echo "$number - Processing 09.0008 liw analysis started at $(timestamp)"
php panini.php 09.0008 liw
((number++))
echo "$number - Processing 09.0008 luw analysis started at $(timestamp)"
php panini.php 09.0008 luw
((number++))
echo "$number - Processing 09.0008 lfw analysis started at $(timestamp)"
php panini.php 09.0008 lfw
((number++))
echo "$number - Processing 09.0008 low analysis started at $(timestamp)"
php panini.php 09.0008 low
((number++))
echo "$number - Processing 09.0008 laN analysis started at $(timestamp)"
php panini.php 09.0008 laN
((number++))
echo "$number - Processing 09.0008 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0008 ASIrliN
((number++))
echo "$number - Processing 09.0008 viDiliN analysis started at $(timestamp)"
php panini.php 09.0008 viDiliN
((number++))
echo "$number - Processing 09.0008 luN analysis started at $(timestamp)"
php panini.php 09.0008 luN
((number++))
echo "$number - Processing 09.0008 lfN analysis started at $(timestamp)"
php panini.php 09.0008 lfN
((number++))
echo "$number - Processing 04.0191 law analysis started at $(timestamp)"
php panini.php 04.0191 law
((number++))
echo "$number - Processing 04.0191 liw analysis started at $(timestamp)"
php panini.php 04.0191 liw
((number++))
echo "$number - Processing 04.0191 luw analysis started at $(timestamp)"
php panini.php 04.0191 luw
((number++))
echo "$number - Processing 04.0191 lfw analysis started at $(timestamp)"
php panini.php 04.0191 lfw
((number++))
echo "$number - Processing 04.0191 low analysis started at $(timestamp)"
php panini.php 04.0191 low
((number++))
echo "$number - Processing 04.0191 laN analysis started at $(timestamp)"
php panini.php 04.0191 laN
((number++))
echo "$number - Processing 04.0191 viDiliN analysis started at $(timestamp)"
php panini.php 04.0191 viDiliN
((number++))
echo "$number - Processing 04.0191 luN analysis started at $(timestamp)"
php panini.php 04.0191 luN
((number++))
echo "$number - Processing 04.0191 lfN analysis started at $(timestamp)"
php panini.php 04.0191 lfN
((number++))
echo "$number - Processing 05.0006 law analysis started at $(timestamp)"
php panini.php 05.0006 law
((number++))
echo "$number - Processing 05.0006 low analysis started at $(timestamp)"
php panini.php 05.0006 low
((number++))
echo "$number - Processing 05.0006 ASIrliN analysis started at $(timestamp)"
php panini.php 05.0006 ASIrliN
((number++))
echo "$number - Processing 05.0006 viDiliN analysis started at $(timestamp)"
php panini.php 05.0006 viDiliN
((number++))
echo "$number - Processing 05.0006 luN analysis started at $(timestamp)"
php panini.php 05.0006 luN
((number++))
echo "$number - Processing 06.0076 lfw analysis started at $(timestamp)"
php panini.php 06.0076 lfw
((number++))
echo "$number - Processing 06.0076 luN analysis started at $(timestamp)"
php panini.php 06.0076 luN
((number++))
echo "$number - Processing 06.0076 lfN analysis started at $(timestamp)"
php panini.php 06.0076 lfN
((number++))
echo "$number - Processing 09.0017 law analysis started at $(timestamp)"
php panini.php 09.0017 law
((number++))
echo "$number - Processing 09.0017 liw analysis started at $(timestamp)"
php panini.php 09.0017 liw
((number++))
echo "$number - Processing 09.0017 luw analysis started at $(timestamp)"
php panini.php 09.0017 luw
((number++))
echo "$number - Processing 09.0017 low analysis started at $(timestamp)"
php panini.php 09.0017 low
((number++))
echo "$number - Processing 09.0017 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0017 ASIrliN
((number++))
echo "$number - Processing 09.0017 luN analysis started at $(timestamp)"
php panini.php 09.0017 luN
((number++))
echo "$number - Processing 01.0423 liw analysis started at $(timestamp)"
php panini.php 01.0423 liw
((number++))
echo "$number - Processing 01.0423 laN analysis started at $(timestamp)"
php panini.php 01.0423 laN
((number++))
echo "$number - Processing 01.1058 liw analysis started at $(timestamp)"
php panini.php 01.1058 liw
((number++))
echo "$number - Processing 01.0749 law analysis started at $(timestamp)"
php panini.php 01.0749 law
((number++))
echo "$number - Processing 01.0749 liw analysis started at $(timestamp)"
php panini.php 01.0749 liw
((number++))
echo "$number - Processing 01.0749 luw analysis started at $(timestamp)"
php panini.php 01.0749 luw
((number++))
echo "$number - Processing 01.0749 lfw analysis started at $(timestamp)"
php panini.php 01.0749 lfw
((number++))
echo "$number - Processing 01.0749 low analysis started at $(timestamp)"
php panini.php 01.0749 low
((number++))
echo "$number - Processing 01.0749 laN analysis started at $(timestamp)"
php panini.php 01.0749 laN
((number++))
echo "$number - Processing 01.0749 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0749 ASIrliN
((number++))
echo "$number - Processing 01.0749 viDiliN analysis started at $(timestamp)"
php panini.php 01.0749 viDiliN
((number++))
echo "$number - Processing 01.0749 luN analysis started at $(timestamp)"
php panini.php 01.0749 luN
((number++))
echo "$number - Processing 01.0749 lfN analysis started at $(timestamp)"
php panini.php 01.0749 lfN
((number++))
echo "$number - Processing 01.0899 law analysis started at $(timestamp)"
php panini.php 01.0899 law
((number++))
echo "$number - Processing 01.0899 liw analysis started at $(timestamp)"
php panini.php 01.0899 liw
((number++))
echo "$number - Processing 01.0899 luw analysis started at $(timestamp)"
php panini.php 01.0899 luw
((number++))
echo "$number - Processing 01.0899 lfw analysis started at $(timestamp)"
php panini.php 01.0899 lfw
((number++))
echo "$number - Processing 01.0899 low analysis started at $(timestamp)"
php panini.php 01.0899 low
((number++))
echo "$number - Processing 01.0899 laN analysis started at $(timestamp)"
php panini.php 01.0899 laN
((number++))
echo "$number - Processing 01.0899 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0899 ASIrliN
((number++))
echo "$number - Processing 01.0899 viDiliN analysis started at $(timestamp)"
php panini.php 01.0899 viDiliN
((number++))
echo "$number - Processing 01.0899 luN analysis started at $(timestamp)"
php panini.php 01.0899 luN
((number++))
echo "$number - Processing 01.0899 lfN analysis started at $(timestamp)"
php panini.php 01.0899 lfN
((number++))
echo "$number - Processing 01.1077 law analysis started at $(timestamp)"
php panini.php 01.1077 law
((number++))
echo "$number - Processing 01.1077 low analysis started at $(timestamp)"
php panini.php 01.1077 low
((number++))
echo "$number - Processing 01.1077 laN analysis started at $(timestamp)"
php panini.php 01.1077 laN
((number++))
echo "$number - Processing 01.1077 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1077 ASIrliN
((number++))
echo "$number - Processing 01.1077 viDiliN analysis started at $(timestamp)"
php panini.php 01.1077 viDiliN
((number++))
echo "$number - Processing 01.1077 luN analysis started at $(timestamp)"
php panini.php 01.1077 luN
((number++))
echo "$number - Processing 06.0118 luN analysis started at $(timestamp)"
php panini.php 06.0118 luN
((number++))
echo "$number - Processing 06.0118 lfN analysis started at $(timestamp)"
php panini.php 06.0118 lfN
((number++))
echo "$number - Processing 02.0033 liw analysis started at $(timestamp)"
php panini.php 02.0033 liw
((number++))
echo "$number - Processing 04.0005 liw analysis started at $(timestamp)"
php panini.php 04.0005 liw
((number++))
echo "$number - Processing 04.0005 lfN analysis started at $(timestamp)"
php panini.php 04.0005 lfN
((number++))
echo "$number - Processing 04.0096 liw analysis started at $(timestamp)"
php panini.php 04.0096 liw
((number++))
echo "$number - Processing 01.1032 luN analysis started at $(timestamp)"
php panini.php 01.1032 luN
((number++))
echo "$number - Processing 05.0014 law analysis started at $(timestamp)"
php panini.php 05.0014 law
((number++))
echo "$number - Processing 05.0014 liw analysis started at $(timestamp)"
php panini.php 05.0014 liw
((number++))
echo "$number - Processing 05.0014 luw analysis started at $(timestamp)"
php panini.php 05.0014 luw
((number++))
echo "$number - Processing 05.0014 lfw analysis started at $(timestamp)"
php panini.php 05.0014 lfw
((number++))
echo "$number - Processing 05.0014 low analysis started at $(timestamp)"
php panini.php 05.0014 low
((number++))
echo "$number - Processing 05.0014 laN analysis started at $(timestamp)"
php panini.php 05.0014 laN
((number++))
echo "$number - Processing 05.0014 ASIrliN analysis started at $(timestamp)"
php panini.php 05.0014 ASIrliN
((number++))
echo "$number - Processing 05.0014 viDiliN analysis started at $(timestamp)"
php panini.php 05.0014 viDiliN
((number++))
echo "$number - Processing 05.0014 luN analysis started at $(timestamp)"
php panini.php 05.0014 luN
((number++))
echo "$number - Processing 05.0014 lfN analysis started at $(timestamp)"
php panini.php 05.0014 lfN
((number++))
echo "$number - Processing 06.0158 lfw analysis started at $(timestamp)"
php panini.php 06.0158 lfw
((number++))
echo "$number - Processing 06.0158 luN analysis started at $(timestamp)"
php panini.php 06.0158 luN
((number++))
echo "$number - Processing 06.0158 lfN analysis started at $(timestamp)"
php panini.php 06.0158 lfN
((number++))
echo "$number - Processing 10.0410 law analysis started at $(timestamp)"
php panini.php 10.0410 law
((number++))
echo "$number - Processing 10.0410 liw analysis started at $(timestamp)"
php panini.php 10.0410 liw
((number++))
echo "$number - Processing 10.0410 luw analysis started at $(timestamp)"
php panini.php 10.0410 luw
((number++))
echo "$number - Processing 10.0410 lfw analysis started at $(timestamp)"
php panini.php 10.0410 lfw
((number++))
echo "$number - Processing 10.0410 low analysis started at $(timestamp)"
php panini.php 10.0410 low
((number++))
echo "$number - Processing 10.0410 laN analysis started at $(timestamp)"
php panini.php 10.0410 laN
((number++))
echo "$number - Processing 10.0410 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0410 ASIrliN
((number++))
echo "$number - Processing 10.0410 viDiliN analysis started at $(timestamp)"
php panini.php 10.0410 viDiliN
((number++))
echo "$number - Processing 10.0410 lfN analysis started at $(timestamp)"
php panini.php 10.0410 lfN
((number++))
echo "$number - Processing 06.0123 law analysis started at $(timestamp)"
php panini.php 06.0123 law
((number++))
echo "$number - Processing 06.0123 liw analysis started at $(timestamp)"
php panini.php 06.0123 liw
((number++))
echo "$number - Processing 06.0123 luw analysis started at $(timestamp)"
php panini.php 06.0123 luw
((number++))
echo "$number - Processing 06.0123 lfw analysis started at $(timestamp)"
php panini.php 06.0123 lfw
((number++))
echo "$number - Processing 06.0123 low analysis started at $(timestamp)"
php panini.php 06.0123 low
((number++))
echo "$number - Processing 06.0123 laN analysis started at $(timestamp)"
php panini.php 06.0123 laN
((number++))
echo "$number - Processing 06.0123 ASIrliN analysis started at $(timestamp)"
php panini.php 06.0123 ASIrliN
((number++))
echo "$number - Processing 06.0123 viDiliN analysis started at $(timestamp)"
php panini.php 06.0123 viDiliN
((number++))
echo "$number - Processing 06.0123 luN analysis started at $(timestamp)"
php panini.php 06.0123 luN
((number++))
echo "$number - Processing 06.0123 lfN analysis started at $(timestamp)"
php panini.php 06.0123 lfN
((number++))
echo "$number - Processing 06.0124 law analysis started at $(timestamp)"
php panini.php 06.0124 law
((number++))
echo "$number - Processing 06.0124 liw analysis started at $(timestamp)"
php panini.php 06.0124 liw
((number++))
echo "$number - Processing 06.0124 luw analysis started at $(timestamp)"
php panini.php 06.0124 luw
((number++))
echo "$number - Processing 06.0124 lfw analysis started at $(timestamp)"
php panini.php 06.0124 lfw
((number++))
echo "$number - Processing 06.0124 low analysis started at $(timestamp)"
php panini.php 06.0124 low
((number++))
echo "$number - Processing 06.0124 laN analysis started at $(timestamp)"
php panini.php 06.0124 laN
((number++))
echo "$number - Processing 06.0124 viDiliN analysis started at $(timestamp)"
php panini.php 06.0124 viDiliN
((number++))
echo "$number - Processing 10.0129 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0129 ASIrliN
((number++))
echo "$number - Processing 10.0056 liw analysis started at $(timestamp)"
php panini.php 10.0056 liw
((number++))
echo "$number - Processing 10.0056 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0056 ASIrliN
((number++))
echo "$number - Processing 01.0293 liw analysis started at $(timestamp)"
php panini.php 01.0293 liw
((number++))
echo "$number - Processing 06.0125 liw analysis started at $(timestamp)"
php panini.php 06.0125 liw
((number++))
echo "$number - Processing 06.0125 luN analysis started at $(timestamp)"
php panini.php 06.0125 luN
((number++))
echo "$number - Processing 01.0380 liw analysis started at $(timestamp)"
php panini.php 01.0380 liw
((number++))
echo "$number - Processing 01.0380 low analysis started at $(timestamp)"
php panini.php 01.0380 low
((number++))
echo "$number - Processing 01.0380 luN analysis started at $(timestamp)"
php panini.php 01.0380 luN
((number++))
echo "$number - Processing 01.0311 law analysis started at $(timestamp)"
php panini.php 01.0311 law
((number++))
echo "$number - Processing 01.0311 liw analysis started at $(timestamp)"
php panini.php 01.0311 liw
((number++))
echo "$number - Processing 01.0311 low analysis started at $(timestamp)"
php panini.php 01.0311 low
((number++))
echo "$number - Processing 01.0311 laN analysis started at $(timestamp)"
php panini.php 01.0311 laN
((number++))
echo "$number - Processing 01.0311 viDiliN analysis started at $(timestamp)"
php panini.php 01.0311 viDiliN
((number++))
echo "$number - Processing 01.0311 luN analysis started at $(timestamp)"
php panini.php 01.0311 luN
((number++))
echo "$number - Processing 06.0121 liw analysis started at $(timestamp)"
php panini.php 06.0121 liw
((number++))
echo "$number - Processing 06.0121 luN analysis started at $(timestamp)"
php panini.php 06.0121 luN
((number++))
echo "$number - Processing 01.0241 law analysis started at $(timestamp)"
php panini.php 01.0241 law
((number++))
echo "$number - Processing 01.0241 liw analysis started at $(timestamp)"
php panini.php 01.0241 liw
((number++))
echo "$number - Processing 01.0241 luw analysis started at $(timestamp)"
php panini.php 01.0241 luw
((number++))
echo "$number - Processing 01.0241 lfw analysis started at $(timestamp)"
php panini.php 01.0241 lfw
((number++))
echo "$number - Processing 01.0241 low analysis started at $(timestamp)"
php panini.php 01.0241 low
((number++))
echo "$number - Processing 01.0241 laN analysis started at $(timestamp)"
php panini.php 01.0241 laN
((number++))
echo "$number - Processing 01.0241 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0241 ASIrliN
((number++))
echo "$number - Processing 01.0241 viDiliN analysis started at $(timestamp)"
php panini.php 01.0241 viDiliN
((number++))
echo "$number - Processing 01.0241 luN analysis started at $(timestamp)"
php panini.php 01.0241 luN
((number++))
echo "$number - Processing 01.0241 lfN analysis started at $(timestamp)"
php panini.php 01.0241 lfN
((number++))
echo "$number - Processing 06.0122 luw analysis started at $(timestamp)"
php panini.php 06.0122 luw
((number++))
echo "$number - Processing 06.0122 luN analysis started at $(timestamp)"
php panini.php 06.0122 luN
((number++))
echo "$number - Processing 01.0268 liw analysis started at $(timestamp)"
php panini.php 01.0268 liw
((number++))
echo "$number - Processing 01.0597 law analysis started at $(timestamp)"
php panini.php 01.0597 law
((number++))
echo "$number - Processing 01.0597 liw analysis started at $(timestamp)"
php panini.php 01.0597 liw
((number++))
echo "$number - Processing 01.0597 luw analysis started at $(timestamp)"
php panini.php 01.0597 luw
((number++))
echo "$number - Processing 01.0597 lfw analysis started at $(timestamp)"
php panini.php 01.0597 lfw
((number++))
echo "$number - Processing 01.0597 low analysis started at $(timestamp)"
php panini.php 01.0597 low
((number++))
echo "$number - Processing 01.0597 laN analysis started at $(timestamp)"
php panini.php 01.0597 laN
((number++))
echo "$number - Processing 01.0597 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0597 ASIrliN
((number++))
echo "$number - Processing 01.0597 viDiliN analysis started at $(timestamp)"
php panini.php 01.0597 viDiliN
((number++))
echo "$number - Processing 01.0597 luN analysis started at $(timestamp)"
php panini.php 01.0597 luN
((number++))
echo "$number - Processing 01.0597 lfN analysis started at $(timestamp)"
php panini.php 01.0597 lfN
((number++))
echo "$number - Processing 05.0015 law analysis started at $(timestamp)"
php panini.php 05.0015 law
((number++))
echo "$number - Processing 01.0919 luN analysis started at $(timestamp)"
php panini.php 01.0919 luN
((number++))
echo "$number - Processing 01.0088 luN analysis started at $(timestamp)"
php panini.php 01.0088 luN
((number++))
echo "$number - Processing 01.0459 luN analysis started at $(timestamp)"
php panini.php 01.0459 luN
((number++))
echo "$number - Processing 01.0861 luN analysis started at $(timestamp)"
php panini.php 01.0861 luN
((number++))
echo "$number - Processing 01.1090 law analysis started at $(timestamp)"
php panini.php 01.1090 law
((number++))
echo "$number - Processing 01.1090 lfw analysis started at $(timestamp)"
php panini.php 01.1090 lfw
((number++))
echo "$number - Processing 01.1090 lfN analysis started at $(timestamp)"
php panini.php 01.1090 lfN
((number++))
echo "$number - Processing 01.0087 liw analysis started at $(timestamp)"
php panini.php 01.0087 liw
((number++))
echo "$number - Processing 01.0087 viDiliN analysis started at $(timestamp)"
php panini.php 01.0087 viDiliN
((number++))
echo "$number - Processing 01.1068 law analysis started at $(timestamp)"
php panini.php 01.1068 law
((number++))
echo "$number - Processing 01.1068 liw analysis started at $(timestamp)"
php panini.php 01.1068 liw
((number++))
echo "$number - Processing 01.1068 luw analysis started at $(timestamp)"
php panini.php 01.1068 luw
((number++))
echo "$number - Processing 01.1068 lfw analysis started at $(timestamp)"
php panini.php 01.1068 lfw
((number++))
echo "$number - Processing 01.1068 low analysis started at $(timestamp)"
php panini.php 01.1068 low
((number++))
echo "$number - Processing 01.1068 laN analysis started at $(timestamp)"
php panini.php 01.1068 laN
((number++))
echo "$number - Processing 01.1068 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1068 ASIrliN
((number++))
echo "$number - Processing 01.1068 viDiliN analysis started at $(timestamp)"
php panini.php 01.1068 viDiliN
((number++))
echo "$number - Processing 01.1068 luN analysis started at $(timestamp)"
php panini.php 01.1068 luN
((number++))
echo "$number - Processing 01.1068 lfN analysis started at $(timestamp)"
php panini.php 01.1068 lfN
((number++))
echo "$number - Processing 01.0082 law analysis started at $(timestamp)"
php panini.php 01.0082 law
((number++))
echo "$number - Processing 01.0082 liw analysis started at $(timestamp)"
php panini.php 01.0082 liw
((number++))
echo "$number - Processing 01.0082 luw analysis started at $(timestamp)"
php panini.php 01.0082 luw
((number++))
echo "$number - Processing 01.0082 lfw analysis started at $(timestamp)"
php panini.php 01.0082 lfw
((number++))
echo "$number - Processing 01.0082 low analysis started at $(timestamp)"
php panini.php 01.0082 low
((number++))
echo "$number - Processing 01.0082 laN analysis started at $(timestamp)"
php panini.php 01.0082 laN
((number++))
echo "$number - Processing 01.0082 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0082 ASIrliN
((number++))
echo "$number - Processing 01.0082 viDiliN analysis started at $(timestamp)"
php panini.php 01.0082 viDiliN
((number++))
echo "$number - Processing 01.0082 luN analysis started at $(timestamp)"
php panini.php 01.0082 luN
((number++))
echo "$number - Processing 01.0082 lfN analysis started at $(timestamp)"
php panini.php 01.0082 lfN
((number++))
echo "$number - Processing 01.0114 law analysis started at $(timestamp)"
php panini.php 01.0114 law
((number++))
echo "$number - Processing 01.0114 liw analysis started at $(timestamp)"
php panini.php 01.0114 liw
((number++))
echo "$number - Processing 01.0114 luw analysis started at $(timestamp)"
php panini.php 01.0114 luw
((number++))
echo "$number - Processing 01.0114 lfw analysis started at $(timestamp)"
php panini.php 01.0114 lfw
((number++))
echo "$number - Processing 01.0114 low analysis started at $(timestamp)"
php panini.php 01.0114 low
((number++))
echo "$number - Processing 01.0114 laN analysis started at $(timestamp)"
php panini.php 01.0114 laN
((number++))
echo "$number - Processing 01.0114 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0114 ASIrliN
((number++))
echo "$number - Processing 01.0114 viDiliN analysis started at $(timestamp)"
php panini.php 01.0114 viDiliN
((number++))
echo "$number - Processing 01.0114 luN analysis started at $(timestamp)"
php panini.php 01.0114 luN
((number++))
echo "$number - Processing 01.0114 lfN analysis started at $(timestamp)"
php panini.php 01.0114 lfN
((number++))
echo "$number - Processing 01.1131 law analysis started at $(timestamp)"
php panini.php 01.1131 law
((number++))
echo "$number - Processing 01.1131 liw analysis started at $(timestamp)"
php panini.php 01.1131 liw
((number++))
echo "$number - Processing 01.1131 low analysis started at $(timestamp)"
php panini.php 01.1131 low
((number++))
echo "$number - Processing 01.1131 laN analysis started at $(timestamp)"
php panini.php 01.1131 laN
((number++))
echo "$number - Processing 01.1131 viDiliN analysis started at $(timestamp)"
php panini.php 01.1131 viDiliN
((number++))
echo "$number - Processing 01.0018 luN analysis started at $(timestamp)"
php panini.php 01.0018 luN
((number++))
echo "$number - Processing 02.0063 luN analysis started at $(timestamp)"
php panini.php 02.0063 luN
((number++))
echo "$number - Processing 10.0116 law analysis started at $(timestamp)"
php panini.php 10.0116 law
((number++))
echo "$number - Processing 10.0116 liw analysis started at $(timestamp)"
php panini.php 10.0116 liw
((number++))
echo "$number - Processing 10.0116 luw analysis started at $(timestamp)"
php panini.php 10.0116 luw
((number++))
echo "$number - Processing 10.0116 lfw analysis started at $(timestamp)"
php panini.php 10.0116 lfw
((number++))
echo "$number - Processing 10.0116 low analysis started at $(timestamp)"
php panini.php 10.0116 low
((number++))
echo "$number - Processing 10.0116 laN analysis started at $(timestamp)"
php panini.php 10.0116 laN
((number++))
echo "$number - Processing 10.0116 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0116 ASIrliN
((number++))
echo "$number - Processing 10.0116 viDiliN analysis started at $(timestamp)"
php panini.php 10.0116 viDiliN
((number++))
echo "$number - Processing 10.0116 luN analysis started at $(timestamp)"
php panini.php 10.0116 luN
((number++))
echo "$number - Processing 10.0116 lfN analysis started at $(timestamp)"
php panini.php 10.0116 lfN
((number++))
echo "$number - Processing 10.0337 luN analysis started at $(timestamp)"
php panini.php 10.0337 luN
((number++))
echo "$number - Processing 04.0085 lfN analysis started at $(timestamp)"
php panini.php 04.0085 lfN
((number++))
echo "$number - Processing 01.0845 luN analysis started at $(timestamp)"
php panini.php 01.0845 luN
((number++))
echo "$number - Processing 01.1081 liw analysis started at $(timestamp)"
php panini.php 01.1081 liw
((number++))
echo "$number - Processing 01.1081 lfw analysis started at $(timestamp)"
php panini.php 01.1081 lfw
((number++))
echo "$number - Processing 01.1081 lfN analysis started at $(timestamp)"
php panini.php 01.1081 lfN
((number++))
echo "$number - Processing 01.0349 laN analysis started at $(timestamp)"
php panini.php 01.0349 laN
((number++))
echo "$number - Processing 02.0002 low analysis started at $(timestamp)"
php panini.php 02.0002 low
((number++))
echo "$number - Processing 01.0538 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0538 ASIrliN
((number++))
echo "$number - Processing 01.0592 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0592 ASIrliN
((number++))
echo "$number - Processing 10.0206 law analysis started at $(timestamp)"
php panini.php 10.0206 law
((number++))
echo "$number - Processing 10.0206 liw analysis started at $(timestamp)"
php panini.php 10.0206 liw
((number++))
echo "$number - Processing 10.0206 luw analysis started at $(timestamp)"
php panini.php 10.0206 luw
((number++))
echo "$number - Processing 10.0206 lfw analysis started at $(timestamp)"
php panini.php 10.0206 lfw
((number++))
echo "$number - Processing 10.0206 low analysis started at $(timestamp)"
php panini.php 10.0206 low
((number++))
echo "$number - Processing 10.0206 laN analysis started at $(timestamp)"
php panini.php 10.0206 laN
((number++))
echo "$number - Processing 10.0206 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0206 ASIrliN
((number++))
echo "$number - Processing 10.0206 viDiliN analysis started at $(timestamp)"
php panini.php 10.0206 viDiliN
((number++))
echo "$number - Processing 10.0206 luN analysis started at $(timestamp)"
php panini.php 10.0206 luN
((number++))
echo "$number - Processing 10.0206 lfN analysis started at $(timestamp)"
php panini.php 10.0206 lfN
((number++))
echo "$number - Processing 03.0008 law analysis started at $(timestamp)"
php panini.php 03.0008 law
((number++))
echo "$number - Processing 03.0008 low analysis started at $(timestamp)"
php panini.php 03.0008 low
((number++))
echo "$number - Processing 03.0008 laN analysis started at $(timestamp)"
php panini.php 03.0008 laN
((number++))
echo "$number - Processing 03.0008 viDiliN analysis started at $(timestamp)"
php panini.php 03.0008 viDiliN
((number++))
echo "$number - Processing 03.0009 law analysis started at $(timestamp)"
php panini.php 03.0009 law
((number++))
echo "$number - Processing 03.0009 low analysis started at $(timestamp)"
php panini.php 03.0009 low
((number++))
echo "$number - Processing 03.0009 laN analysis started at $(timestamp)"
php panini.php 03.0009 laN
((number++))
echo "$number - Processing 03.0009 ASIrliN analysis started at $(timestamp)"
php panini.php 03.0009 ASIrliN
((number++))
echo "$number - Processing 03.0009 viDiliN analysis started at $(timestamp)"
php panini.php 03.0009 viDiliN
((number++))
echo "$number - Processing 07.0366 laN analysis started at $(timestamp)"
php panini.php 07.0366 laN
((number++))
echo "$number - Processing 01.0997 liw analysis started at $(timestamp)"
php panini.php 01.0997 liw
((number++))
echo "$number - Processing 01.0301 viDiliN analysis started at $(timestamp)"
php panini.php 01.0301 viDiliN
((number++))
echo "$number - Processing 01.0675 liw analysis started at $(timestamp)"
php panini.php 01.0675 liw
((number++))
echo "$number - Processing 10.0208 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0208 ASIrliN
((number++))
echo "$number - Processing 03.0001 liw analysis started at $(timestamp)"
php panini.php 03.0001 liw
((number++))
echo "$number - Processing 03.0001 laN analysis started at $(timestamp)"
php panini.php 03.0001 laN
((number++))
echo "$number - Processing 06.0130 law analysis started at $(timestamp)"
php panini.php 06.0130 law
((number++))
echo "$number - Processing 06.0130 low analysis started at $(timestamp)"
php panini.php 06.0130 low
((number++))
echo "$number - Processing 06.0130 laN analysis started at $(timestamp)"
php panini.php 06.0130 laN
((number++))
echo "$number - Processing 06.0130 viDiliN analysis started at $(timestamp)"
php panini.php 06.0130 viDiliN
((number++))
echo "$number - Processing 01.0239 law analysis started at $(timestamp)"
php panini.php 01.0239 law
((number++))
echo "$number - Processing 01.0239 liw analysis started at $(timestamp)"
php panini.php 01.0239 liw
((number++))
echo "$number - Processing 01.0239 luw analysis started at $(timestamp)"
php panini.php 01.0239 luw
((number++))
echo "$number - Processing 01.0239 lfw analysis started at $(timestamp)"
php panini.php 01.0239 lfw
((number++))
echo "$number - Processing 01.0239 low analysis started at $(timestamp)"
php panini.php 01.0239 low
((number++))
echo "$number - Processing 01.0239 laN analysis started at $(timestamp)"
php panini.php 01.0239 laN
((number++))
echo "$number - Processing 01.0239 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0239 ASIrliN
((number++))
echo "$number - Processing 01.0239 viDiliN analysis started at $(timestamp)"
php panini.php 01.0239 viDiliN
((number++))
echo "$number - Processing 01.0239 luN analysis started at $(timestamp)"
php panini.php 01.0239 luN
((number++))
echo "$number - Processing 01.0239 lfN analysis started at $(timestamp)"
php panini.php 01.0239 lfN
((number++))
echo "$number - Processing 01.0980 low analysis started at $(timestamp)"
php panini.php 01.0980 low
((number++))
echo "$number - Processing 01.0978 low analysis started at $(timestamp)"
php panini.php 01.0978 low
((number++))
echo "$number - Processing 01.0409 law analysis started at $(timestamp)"
php panini.php 01.0409 law
((number++))
echo "$number - Processing 01.0409 liw analysis started at $(timestamp)"
php panini.php 01.0409 liw
((number++))
echo "$number - Processing 01.0409 luw analysis started at $(timestamp)"
php panini.php 01.0409 luw
((number++))
echo "$number - Processing 01.0409 lfw analysis started at $(timestamp)"
php panini.php 01.0409 lfw
((number++))
echo "$number - Processing 01.0409 low analysis started at $(timestamp)"
php panini.php 01.0409 low
((number++))
echo "$number - Processing 01.0409 laN analysis started at $(timestamp)"
php panini.php 01.0409 laN
((number++))
echo "$number - Processing 01.0409 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0409 ASIrliN
((number++))
echo "$number - Processing 01.0409 viDiliN analysis started at $(timestamp)"
php panini.php 01.0409 viDiliN
((number++))
echo "$number - Processing 01.0409 luN analysis started at $(timestamp)"
php panini.php 01.0409 luN
((number++))
echo "$number - Processing 01.0409 lfN analysis started at $(timestamp)"
php panini.php 01.0409 lfN
((number++))
echo "$number - Processing 03.0016 law analysis started at $(timestamp)"
php panini.php 03.0016 law
((number++))
echo "$number - Processing 03.0016 low analysis started at $(timestamp)"
php panini.php 03.0016 low
((number++))
echo "$number - Processing 03.0016 laN analysis started at $(timestamp)"
php panini.php 03.0016 laN
((number++))
echo "$number - Processing 03.0016 viDiliN analysis started at $(timestamp)"
php panini.php 03.0016 viDiliN
((number++))
echo "$number - Processing 01.0806 law analysis started at $(timestamp)"
php panini.php 01.0806 law
((number++))
echo "$number - Processing 01.0806 low analysis started at $(timestamp)"
php panini.php 01.0806 low
((number++))
echo "$number - Processing 01.0806 laN analysis started at $(timestamp)"
php panini.php 01.0806 laN
((number++))
echo "$number - Processing 01.0806 viDiliN analysis started at $(timestamp)"
php panini.php 01.0806 viDiliN
((number++))
echo "$number - Processing 01.0806 luN analysis started at $(timestamp)"
php panini.php 01.0806 luN
((number++))
echo "$number - Processing 09.0069 law analysis started at $(timestamp)"
php panini.php 09.0069 law
((number++))
echo "$number - Processing 09.0069 liw analysis started at $(timestamp)"
php panini.php 09.0069 liw
((number++))
echo "$number - Processing 09.0069 luw analysis started at $(timestamp)"
php panini.php 09.0069 luw
((number++))
echo "$number - Processing 09.0069 lfw analysis started at $(timestamp)"
php panini.php 09.0069 lfw
((number++))
echo "$number - Processing 09.0069 low analysis started at $(timestamp)"
php panini.php 09.0069 low
((number++))
echo "$number - Processing 09.0069 laN analysis started at $(timestamp)"
php panini.php 09.0069 laN
((number++))
echo "$number - Processing 09.0069 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0069 ASIrliN
((number++))
echo "$number - Processing 09.0069 viDiliN analysis started at $(timestamp)"
php panini.php 09.0069 viDiliN
((number++))
echo "$number - Processing 09.0069 luN analysis started at $(timestamp)"
php panini.php 09.0069 luN
((number++))
echo "$number - Processing 09.0069 lfN analysis started at $(timestamp)"
php panini.php 09.0069 lfN
((number++))
echo "$number - Processing 01.0299 low analysis started at $(timestamp)"
php panini.php 01.0299 low
((number++))
echo "$number - Processing 01.0360 law analysis started at $(timestamp)"
php panini.php 01.0360 law
((number++))
echo "$number - Processing 01.0360 liw analysis started at $(timestamp)"
php panini.php 01.0360 liw
((number++))
echo "$number - Processing 01.0360 luw analysis started at $(timestamp)"
php panini.php 01.0360 luw
((number++))
echo "$number - Processing 01.0360 lfw analysis started at $(timestamp)"
php panini.php 01.0360 lfw
((number++))
echo "$number - Processing 01.0360 low analysis started at $(timestamp)"
php panini.php 01.0360 low
((number++))
echo "$number - Processing 01.0360 laN analysis started at $(timestamp)"
php panini.php 01.0360 laN
((number++))
echo "$number - Processing 01.0360 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0360 ASIrliN
((number++))
echo "$number - Processing 01.0360 viDiliN analysis started at $(timestamp)"
php panini.php 01.0360 viDiliN
((number++))
echo "$number - Processing 01.0360 luN analysis started at $(timestamp)"
php panini.php 01.0360 luN
((number++))
echo "$number - Processing 01.0360 lfN analysis started at $(timestamp)"
php panini.php 01.0360 lfN
((number++))
echo "$number - Processing 09.0070 law analysis started at $(timestamp)"
php panini.php 09.0070 law
((number++))
echo "$number - Processing 09.0070 liw analysis started at $(timestamp)"
php panini.php 09.0070 liw
((number++))
echo "$number - Processing 09.0070 luw analysis started at $(timestamp)"
php panini.php 09.0070 luw
((number++))
echo "$number - Processing 09.0070 lfw analysis started at $(timestamp)"
php panini.php 09.0070 lfw
((number++))
echo "$number - Processing 09.0070 low analysis started at $(timestamp)"
php panini.php 09.0070 low
((number++))
echo "$number - Processing 09.0070 laN analysis started at $(timestamp)"
php panini.php 09.0070 laN
((number++))
echo "$number - Processing 09.0070 ASIrliN analysis started at $(timestamp)"
php panini.php 09.0070 ASIrliN
((number++))
echo "$number - Processing 09.0070 viDiliN analysis started at $(timestamp)"
php panini.php 09.0070 viDiliN
((number++))
echo "$number - Processing 09.0070 luN analysis started at $(timestamp)"
php panini.php 09.0070 luN
((number++))
echo "$number - Processing 09.0070 lfN analysis started at $(timestamp)"
php panini.php 09.0070 lfN
((number++))
echo "$number - Processing 01.0432 law analysis started at $(timestamp)"
php panini.php 01.0432 law
((number++))
echo "$number - Processing 01.0432 liw analysis started at $(timestamp)"
php panini.php 01.0432 liw
((number++))
echo "$number - Processing 01.0432 luw analysis started at $(timestamp)"
php panini.php 01.0432 luw
((number++))
echo "$number - Processing 01.0432 lfw analysis started at $(timestamp)"
php panini.php 01.0432 lfw
((number++))
echo "$number - Processing 01.0432 low analysis started at $(timestamp)"
php panini.php 01.0432 low
((number++))
echo "$number - Processing 01.0432 laN analysis started at $(timestamp)"
php panini.php 01.0432 laN
((number++))
echo "$number - Processing 01.0432 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0432 ASIrliN
((number++))
echo "$number - Processing 01.0432 viDiliN analysis started at $(timestamp)"
php panini.php 01.0432 viDiliN
((number++))
echo "$number - Processing 01.0432 luN analysis started at $(timestamp)"
php panini.php 01.0432 luN
((number++))
echo "$number - Processing 01.0432 lfN analysis started at $(timestamp)"
php panini.php 01.0432 lfN
((number++))
echo "$number - Processing 02.0076 ASIrliN analysis started at $(timestamp)"
php panini.php 02.0076 ASIrliN
((number++))
echo "$number - Processing 10.0163 law analysis started at $(timestamp)"
php panini.php 10.0163 law
((number++))
echo "$number - Processing 10.0163 liw analysis started at $(timestamp)"
php panini.php 10.0163 liw
((number++))
echo "$number - Processing 10.0163 luw analysis started at $(timestamp)"
php panini.php 10.0163 luw
((number++))
echo "$number - Processing 10.0163 lfw analysis started at $(timestamp)"
php panini.php 10.0163 lfw
((number++))
echo "$number - Processing 10.0163 low analysis started at $(timestamp)"
php panini.php 10.0163 low
((number++))
echo "$number - Processing 10.0163 laN analysis started at $(timestamp)"
php panini.php 10.0163 laN
((number++))
echo "$number - Processing 10.0163 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0163 ASIrliN
((number++))
echo "$number - Processing 10.0163 viDiliN analysis started at $(timestamp)"
php panini.php 10.0163 viDiliN
((number++))
echo "$number - Processing 10.0163 luN analysis started at $(timestamp)"
php panini.php 10.0163 luN
((number++))
echo "$number - Processing 10.0163 lfN analysis started at $(timestamp)"
php panini.php 10.0163 lfN
((number++))
echo "$number - Processing 03.0003 law analysis started at $(timestamp)"
php panini.php 03.0003 law
((number++))
echo "$number - Processing 03.0003 liw analysis started at $(timestamp)"
php panini.php 03.0003 liw
((number++))
echo "$number - Processing 01.0238 law analysis started at $(timestamp)"
php panini.php 01.0238 law
((number++))
echo "$number - Processing 01.0238 liw analysis started at $(timestamp)"
php panini.php 01.0238 liw
((number++))
echo "$number - Processing 01.0238 luw analysis started at $(timestamp)"
php panini.php 01.0238 luw
((number++))
echo "$number - Processing 01.0238 lfw analysis started at $(timestamp)"
php panini.php 01.0238 lfw
((number++))
echo "$number - Processing 01.0238 low analysis started at $(timestamp)"
php panini.php 01.0238 low
((number++))
echo "$number - Processing 01.0238 laN analysis started at $(timestamp)"
php panini.php 01.0238 laN
((number++))
echo "$number - Processing 01.0238 ASIrliN analysis started at $(timestamp)"
php panini.php 01.0238 ASIrliN
((number++))
echo "$number - Processing 01.0238 viDiliN analysis started at $(timestamp)"
php panini.php 01.0238 viDiliN
((number++))
echo "$number - Processing 01.0238 luN analysis started at $(timestamp)"
php panini.php 01.0238 luN
((number++))
echo "$number - Processing 01.0238 lfN analysis started at $(timestamp)"
php panini.php 01.0238 lfN
((number++))
echo "$number - Processing 10.0161 ASIrliN analysis started at $(timestamp)"
php panini.php 10.0161 ASIrliN
((number++))
echo "$number - Processing 01.1163 law analysis started at $(timestamp)"
php panini.php 01.1163 law
((number++))
echo "$number - Processing 01.1163 liw analysis started at $(timestamp)"
php panini.php 01.1163 liw
((number++))
echo "$number - Processing 01.1163 luw analysis started at $(timestamp)"
php panini.php 01.1163 luw
((number++))
echo "$number - Processing 01.1163 lfw analysis started at $(timestamp)"
php panini.php 01.1163 lfw
((number++))
echo "$number - Processing 01.1163 low analysis started at $(timestamp)"
php panini.php 01.1163 low
((number++))
echo "$number - Processing 01.1163 laN analysis started at $(timestamp)"
php panini.php 01.1163 laN
((number++))
echo "$number - Processing 01.1163 ASIrliN analysis started at $(timestamp)"
php panini.php 01.1163 ASIrliN
((number++))
echo "$number - Processing 01.1163 viDiliN analysis started at $(timestamp)"
php panini.php 01.1163 viDiliN
((number++))
echo "$number - Processing 01.1163 luN analysis started at $(timestamp)"
php panini.php 01.1163 luN
((number++))
echo "$number - Processing 01.1163 lfN analysis started at $(timestamp)"
php panini.php 01.1163 lfN
((number++))
echo '</forms>' >> generatedforms.xml
python comparedb.py generatedforms.xml suspectverbforms.txt
