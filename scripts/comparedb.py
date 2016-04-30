# -*- coding: utf-8 -*-
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
def baseverbformlist(testdb,lstofbasedb):
	output = []
	for basedb in lstofbasedb:
		counter = 0
		if not basedb == "../Data/okforms.txt":
			fin = codecs.open(basedb,'r','utf-8')
			data = fin.read()
			fetch = data.split(',')
			print len(fetch), basedb
			output += fetch
		else:
			fetch = []
			fin = codecs.open(basedb,'r','utf-8')
			data = fin.readlines()
			data = triming(data)
			for datum in data:
				parts = datum.split('-')
				fetch.append(parts[0])
			print len(fetch), basedb
			output += fetch
	print len(output)
	return output
baseverbformlist('',['../Data/verbforms_gerard.txt','../Data/verbforms_amba.txt','../Data/okforms.txt'])
