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

def alternatives(word,verblist):
	if word[-1]=="H" and word[:-1]+'s' in verblist:
		pass
	elif word[-1]=="H" and word[:-1]+'r' in verblist:
		pass
	elif word[-1]=="d" and word[:-1]+'t' in verblist:
		pass
	elif word[-3:]=="tAd" and word[:-3]+'tu' in verblist:
		pass
	elif word[-3:]=="tAt" and word[:-3]+'tu' in verblist:
		pass
	elif word[-4:]=="Dvam" and word[:-4]+'Qvam' in verblist:
		pass
	elif not word in verblist:
		return True

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
		if alternatives(a,baseverbforms):
			print a,b,c,d,e
			fout.write(a+'-('+d+','+b+','+c+','+e+')\n')
	fout.close()
	
compare('generatedforms.xml','suspectforms/latest.txt')
