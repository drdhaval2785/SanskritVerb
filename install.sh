# Script to install SanskritVerb repository for local usage.
# Author - Dr. Dhaval Patel and Dr. Sivakumari Katuri.
# Version - 1.10.0
# Date - 19 June 2016
# Go to the localhost folder (usually C:/xampp/htdocs).
# Copy this file there.
# Run `sh install.sh` from terminal or command prompt.
# This script will install the code, unzip the compressed files for local machine.

#cd c:/xampp/htdocs
echo "Cloning github repository"
git clone https://github.com/drdhaval2785/SanskritVerb
mkdir sutrarelations
mkdir json
cd SanskritVerb/Data
#echo "downloading allsutrani.tar 35 MB..."
#curl -o allsutrani.tar http://www.sanskritdocuments.org/learning_tools/sarvanisutrani/allsutrani.tar
#gzip allsutrani.tar
mkdir allsutrani
tar -zxvf allsutrani.tar.gz -C allsutrani
tar zxvf dhaatupatha.tgz

echo "Installing lxml, in case you want to use XML handling codes."
pip install lxml
