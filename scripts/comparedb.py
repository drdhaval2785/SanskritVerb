# -*- coding: utf-8 -*-
"""
Usage:
python comparedb.py testfile suspectfile
e.g.
python comparedb.py ../generatedforms/generatedforms30042016.xml ../suspectforms/suspectverbforms30042016.txt
"""
import sys, re
import codecs
import string
import datetime
from lxml import etree
from io import StringIO, BytesIO

# Function to return timestamp
def timestamp():
	return datetime.datetime.now()

def triming(lst):
	output = []
	for member in lst:
		member = member.strip()
		output.append(member)
	return output
def testverbformlist(testxml):
	roots = etree.parse(testxml)
	# Typical line in XML file is in `<forms><f form="aMsayati"><root name="aMsa" num="10.0460"/><law/><tip/></f></forms>` format.
	# Therefore, the data which we want e.g. 'aMSayati' is in /forms/f-get('form') location. Fetching it below.
	roo = roots.xpath('/forms/f') # Returns a list of all /forms/f in the database.
	verbformlist = [(member.get('form'),member.find('root').get('name'),member.find('root').get('num'),member.getchildren()[-2].tag,member.getchildren()[-1].tag) for member in roo] # For all /forms/f in database, we get its attribute 'forms' e.g. 'aMSayati'.
	print "Total", len(verbformlist), "entries in test list"
	return verbformlist
# function to find out the list of verbs whose result still remains in the suspect list
def findverbsfromlist(suspectfile):
	#acAYcakAra,acu!,01.0999,liw,tip
	#Expected output is 01.0999
	fin = codecs.open(suspectfile,'r','utf-8')
	data = fin.readlines()
	output = [member.split(',')[2] for member in data]
	output = list(set(output))
	return output

def baseverbformlist(testdb,lstofbasedb):
	output = []
	for basedb in lstofbasedb:
		counter = 0
		if not basedb == "../Data/okforms.txt":
			fin = codecs.open(basedb,'r','utf-8')
			data = fin.read()
			fetch = data.split(',')
			output += fetch
		else:
			fetch = []
			fin = codecs.open(basedb,'r','utf-8')
			data = fin.readlines()
			data = triming(data)
			for datum in data:
				parts = datum.split('-')
				fetch.append(parts[0])
			output += fetch
	print "Total", len(output), "entries in base list"
	return output


if __name__=="__main__":
	"""
	testfile = sys.argv[1]
	base = baseverbformlist('',['../Data/verbforms_gerard.txt','../Data/verbforms_amba.txt','../Data/okforms.txt'])
	test = testverbformlist(testfile)
	suspectfile = sys.argv[2]
	suspect = codecs.open(suspectfile,'w','utf-8')
	print "Printing the following suspect entries to ../suspectforms/suspectverbforms.txt"
	print 
	for (member,verb,num,lakAra,tiG) in test:
		if member.endswith('cakara') or member.endswith("iDve") or member.endswith("iDvam"):
			pass
		elif not member in base:
			print (member,verb,num,lakAra,tiG)
			suspect.write(member+','+verb+','+num+','+lakAra+','+tiG+'\n')
	"""
	#print ' '.join(findverbsfromlist('../suspectforms/suspectverbforms30042016.txt'))
	createrecheck('../suspectforms/suspectverbforms30042016.txt','../recheck.sh')
