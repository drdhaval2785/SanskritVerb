#cd c:/xampp/htdocs
echo "Cloning github repository"
git clone https://github.com/drdhaval2785/SanskritVerb
cd SanskritVerb/Data
#echo "downloading allsutrani.tar 35 MB..."
#curl -o allsutrani.tar http://www.sanskritdocuments.org/learning_tools/sarvanisutrani/allsutrani.tar
mkdir allsutrani
tar -xvf allsutrani.tar -C allsutrani
