# -*- coding: utf-8 -*-
"""
Usage:
python recheckgen.py suspectfile recheckshellfile
e.g.
python recheckgen.py ../suspectforms/suspectverbforms30042016.txt ../recheck.sh
"""
import sys, re
import codecs
import string
import datetime

# Function to return timestamp
def timestamp():
	return datetime.datetime.now()

def triming(lst):
	output = []
	for member in lst:
		member = member.strip()
		output.append(member)
	return output

def createrecheck(suspectfile,recheckfile):
	fin = codecs.open(suspectfile,'r','utf-8')
	data = fin.readlines()
	fin.close()
	fout = codecs.open(recheckfile,'w','utf-8')
	data = triming(data)
	output = []
	fout.write('# Define a timestamp function\ntimestamp() {\n  date +"%d-%m-%Y %H:%M:%S"\n}\ntimestamp\n')
	fout.write('number=1\n')
	fout.write('rm -f "suspectverbforms.txt"\nrm -f "generatedforms.xml"\nrm -f "suspectverbforms_deva.txt"\n')
	fout.write("echo \'<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\' > generatedforms.xml\necho \'<forms>\' >> generatedforms.xml\n")
	counter = 1
	for datum in data:
		#aMsayAYcakara,aMsa,10.0460,liw,mip
		[form,verb,number,lakAra,suffix] = datum.split(',')
		if (number,lakAra) not in output:
			output.append((number,lakAra))
			fout.write('echo "'+str(counter)+' - Processing '+number+' '+lakAra+" analysis started at $(timestamp)\"\n")
			fout.write('php panini.php '+number+' '+lakAra+'\n')
			counter += 1
	print "Total", len(output), "entries in recheck.sh.\nKindly run this script after corrections."
	fout.write("echo \'</forms>\' >> generatedforms.xml\n")
	fout.write('cd scripts\n')
	fout.write('python comparedb.py ../generatedforms.xml ../suspectverbforms.txt\n')
	fout.close()

if __name__=="__main__":
	suspectfile = sys.argv[1]
	recheckfile = sys.argv[2]
	createrecheck(suspectfile,recheckfile)
