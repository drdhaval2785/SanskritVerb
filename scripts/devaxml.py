# -*- coding: utf-8 -*-
"""
Author:
	Dr. Dhaval Patel, 25 June 2016
Expected output:
	To convert generateforms.xml into a CSV file with data in Devanagari.
	`verbform,verb,lakAra,suffix,verbnumber` format
	See https://github.com/drdhaval2785/SanskritVerb/issues/936 for the requirement of this code.
Input:
	generateforms.xml
Output:
	generatedforms_deva.xml
	That was further compressed via `tar -zcvf verbformsdeva.tar.gz generateforms_deva2002016.csv`.
	This was uploaded on sanskritworld server for storage.
Special instructions:
	Needs transcoder.py (in CORRECTIONS/ngrams folder locally) for conversion.
Usage:
	python devaxml.py generatedforms.xml generatedforms_deva.csv
	e.g.
	python devaxml.py ../generatedforms/generatedforms20062016.xml ../generatedforms/generatedforms_deva20062016.csv
"""
import sys, re
import codecs
import datetime
from lxml import etree
import transcoder

# Function to return timestamp
def timestamp():
	return datetime.datetime.now()

# Function to remove trailinig whitespaces from a list
def triming(lst):
	output = []
	for member in lst:
		member = member.strip()
		output.append(member)
	return output

# Read the input XML file in [(verbform,verb,verbnumber,lakAra,suffix),....] list
def testverbformlist(testxml):
	roots = etree.parse(testxml)
	# Typical line in XML file is in `<forms><f form="aMsayati"><root name="aMsa" num="10.0460"/><law/><tip/></f></forms>` format.
	# Therefore, the data which we want e.g. 'aMSayati' is in /forms/f-get('form') location. Fetching it below.
	roo = roots.xpath('/forms/f') # Returns a list of all /forms/f in the database.
	# Read like [('aMsayati','aMsa','10.0460','law','tip'),......] list
	verbformlist = [(member.get('form'),member.find('root').get('name'),member.find('root').get('num'),member.getchildren()[-2].tag,member.getchildren()[-1].tag) for member in roo] # For all /forms/f in database, we get its attribute 'forms' e.g. 'aMSayati'.
	print "Total", len(verbformlist), "entries in XML file"
	return verbformlist

# Main program
if __name__=="__main__":
	# File to test. Typically ../generatedforms/generatedformsDDMMYYYY.xml
	inputfile = sys.argv[1]
	# Read the base verb forms from verbforms_gerard, verbforms_amba, okforms and notnow files
	# Read the test file and return like [('aMsayati','aMsa','10.0460','law','tip'),...]
	test = testverbformlist(inputfile)
	# File to store the suspect forms i.e. output file
	outputfile = sys.argv[2]
	# Open output file
	fout = codecs.open(outputfile,'w','utf-8')
	for (verbform,verb,verbnumber,lakAra,suffix) in test:
		verbform1 = transcoder.transcoder_processString(verbform,'slp1','deva')
		verb1 = transcoder.transcoder_processString(verb,'slp1','deva')
		lakAra1 = transcoder.transcoder_processString(lakAra,'slp1','deva')
		suffix1 = transcoder.transcoder_processString(suffix,'slp1','deva')
		fout.write(verbform1+','+verb1+','+lakAra1+','+suffix1+','+verbnumber+'\n')
