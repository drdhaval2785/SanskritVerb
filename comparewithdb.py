# This Python file uses the following encoding: utf-8
import sys, re
import codecs
import string
import datetime
from lxml import etree
"""
Dr. Dhaval Patel
26 Jan 2016
Usage:
python comparwithdb.py
"""
# Function to return timestamp
def timestamp():
	return datetime.datetime.now()

def triming(lst):
	output = []
	for member in lst:
		member = member.strip()
		output.append(member)
	return output

def compare(inputfile,outputfile):
	fout = codecs.open(outputfile,'w','utf-8')
	tree = etree.parse(inputfile)
	entries = tree.xpath('/forms/f')
	verbdetails = [(member.get('form'),member.getchildren()[-2].tag,member.getchildren()[-1].tag,member.find('root').get('name'),member.find('root').get('num')) for member in entries]
	verbforms = [a for (a,b,c,d,e) in verbdetails]
	amba = open('Data/verbforms_amba.txt').read()
	ambaverbforms = amba.split(',')
	ambaverbforms = triming(ambaverbforms)
	gerard = open('Data/verbforms_gerard.txt').read()
	gerardverbforms = gerard.split(',')
	gerardverbforms = triming(gerardverbforms)
	baseverbforms = ambaverbforms+gerardverbforms
	baseverbforms = list(set(baseverbforms))
	print 'Input file has', len(verbforms), 'entries'
	print 'Base data has', len(baseverbforms), 'entries'
	for (a,b,c,d,e) in verbdetails:
		if not a in baseverbforms:
			print a,b,c,d,e
			fout.write(a+':'+b+':'+c+':'+d+':'+e+'\n')
	fout.close()
	
compare('generatedforms.xml','suspectforms/latest.txt')
