timestamp() {
  date +"%d-%m-%Y %H:%M:%S"
}
LIST2=(law liw luw lfw low laN ASIrliN viDiliN luN lfN)
source Data/list1.txt
for VALUE1 in "${LIST1[@]}"
do
	echo "$number - processing verb number $VALUE1 started at $(timestamp)"
	for VALUE2 in "${LIST2[@]}"
	do
		#echo "started $VALUE2 lakAra analysis"
		php panini.php ${VALUE1} ${VALUE2} json
	done
	((number++))
	echo
done
