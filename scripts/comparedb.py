# -*- coding: utf-8 -*-
"""
Author:
	Dr. Dhaval Patel, 19 June 2016
Expected output:
	To find out the verb forms which are not found in the given database.
Input:
	(1) generateforms.xml (test file)
	(2) Base databases to compare against
		(2a) Data/verbforms_amba.txt
		(2b) Data/verbforms_gerard.txt
		(2c) Data/okforms.txt
		(2d) Data/notnow.txt
Output:
	suspectverbforms.txt
	Data is in `verbform-(verb,lakAra,suffix,gaNa,verbnumber)` format e.g. `aSntAt-(aSa!,low,tip,kryAdi,09.0059)`
Usage:
	python comparedb.py testfile suspectfile
	e.g.
	python comparedb.py ../generatedforms/generatedforms30042016.xml ../suspectforms/suspectverbforms30042016.txt
"""
import sys, re
import codecs
import datetime
from lxml import etree

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
	print "Total", len(verbformlist), "entries in test list"
	return verbformlist

def baseverbformlist(testdb,lstofbasedb):
	output = []
	for basedb in lstofbasedb:
		counter = 0
		# All files other than okforms.txt and notnow.txt have verb forms in comma separated values.
		if not basedb in ["../Data/okforms.txt","../Data/notnow.txt"]:
			fin = codecs.open(basedb,'r','utf-8')
			data = fin.read()
			# Split by comma to get a list of all verb forms
			fetch = data.split(',')
			output += fetch
		# These two files have data stored in line in specific format.
		# There are two formats. The take home is - the word before '-' or ',' needs to be extracted.
		else:
			fetch = []
			fin = codecs.open(basedb,'r','utf-8')
			data = fin.readlines()
			data = triming(data)
			for datum in data:
				parts = re.split(r'[-,]',datum)
				# Only the first part has the verb form. We add it.
				fetch.append(parts[0])
			# Added to variable output
			output += fetch
	print "Total", len(output), "entries in base list"
	# We are interested only in unique entries. Also searching existence in set is much much faster than in list.
	# So returning set instead of list.
	return set(output)
# Function to return name of gaNa from a given number e.g. 10.0460 -> 'curAdi'
def gananame(number):
	# List of gana
	gana = ['BvAdi','adAdi','juhotyAdi','divAdi','svAdi','tudAdi','ruDAdi','tanAdi','kryAdi','curAdi']
	# 10.0460 -> 10
	gn = number.split('.')[0]
	# As the numbers are 1 based and python list is 0 based, deduct 1
	gn = int(gn)-1
	# Return the gaNa name.
	return gana[gn]

# Main program
if __name__=="__main__":
	# File to test. Typically ../generatedforms/generatedformsDDMMYYYY.xml
	testfile = sys.argv[1]
	# Read the base verb forms from verbforms_gerard, verbforms_amba, okforms and notnow files
	# Returns a set of unique verb forms found in these four files.
	base = baseverbformlist('',['../Data/verbforms_gerard.txt','../Data/verbforms_amba.txt','../Data/okforms.txt','../Data/notnow.txt'])
	# Read the test file and return like [('aMsayati','aMsa','10.0460','law','tip'),...]
	test = testverbformlist(testfile)
	# File to store the suspect forms i.e. output file
	suspectfile = sys.argv[2]
	# Open output file
	suspect = codecs.open(suspectfile,'w','utf-8')
	print "Printing the following suspect entries to ../suspectforms/suspectverbforms.txt"
	print 
	# Initialize a counter
	counter = 0
	# For each entry in the test file
	for (member,verb,num,lakAra,tiG) in test:
		# Ignoring some known issues of conventions between our machine and base databases.
		if member.endswith('cakara') or member.endswith("iDve") or member.endswith("iDvam") or member.endswith("zIQvam") or member.endswith("yAstAm"):
			pass
		# If not found in the database
		elif not member in base:
			# Increment counter
			counter += 1
			# Print on console, so that user rests assured that script is working.
			print (member,verb,num,lakAra,tiG)
			# Write 'aMsayati-(aMsa','law','tip','curAdi','10.0460')\n' to the suspect file
			suspect.write(member+'-('+verb+','+lakAra+','+tiG+','+gananame(num)+','+num+')\n')
	# Print summary to the user
	print counter, '/', len(test), ' forms found suspect'
	print 'i.e.', (float(counter)*100)/len(test), '%'
