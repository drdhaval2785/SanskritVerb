# -*- coding: utf-8 -*-
"""
Author:
	Dr. Dhaval Patel, 28 September 2016
Expected output:
	To find out internal discrepancy in Mihail's verb dataset i.e. panini-dhatu-index1.xlsx (copied in Data/rawgananumber.txt)
Input:
	(1) Data/rawgananumber.txt - original dataset
	(2) Data/issue983/vnum.txt - data from scripts/function.php $verbdata extracted via extract1.php
Output:
	Data/issue983/suspect.txt - file where suspect entries are stored.
Usage:
	python issue983.py
"""
import sys, re
import codecs
import datetime
import transcoder

# Function to return timestamp
def timestamp():
	return datetime.datetime.now()

# Function to remove trailinig whitespaces from a list
def triming(lst):
	output = []
	for member in lst:
		member = member.strip()
		#member = member.encode('utf-8')
		output.append(member)
	return output
ganalist = ['। भ्वा॰','। अ॰','। जु॰','। दि॰','। स्वा॰','। तु॰','। रु॰','। त॰','। क्र्या॰','। चु॰']
gananumberlist = [u'०१।',u'०२।',u'०३।',u'०४।',u'०५।',u'०६।',u'०७।',u'०८।',u'०९।',u'१०।']
gananumber = ['01','02','03','04','05','06','07','08','09','10']
def ganaconverter(gana):
	global ganalist, gananumber
	gana = gana.strip()
	for i in xrange(len(ganalist)):
		gana = gana.replace(ganalist[i],gananumber[i])
	return gana

# Prepare the data from rawcomplete.txt to corresponding vnum.txt
fin = codecs.open('../Data/rawgananumber.txt','r','utf-8')
data = fin.readlines()
data = triming(data)
fin.close()
basefile = codecs.open('../Data/issue965/vnum.txt','r','utf-8')
basedata = basefile.readlines()
basedata = triming(basedata)
fout = codecs.open('../Data/issue983/suspect.txt','w','utf-8')
counter = 1
for datum in data:
	datum = datum
	parts = datum.split("\t")
	parts = map(unicode,parts)
	verbwithaccent = parts[4].strip()
	verb = verbwithaccent.replace(u'॑','')
	verb = verb.replace(u'॒','')
	verb = verb.strip()
	verb = transcoder.transcoder_processString(verb,'deva','slp1')
	gana = parts[1]
	gana = gana.encode('utf-8')
	gana = ganaconverter(gana)
	number = parts[8]
	number = number.replace(u' ॥','')
	number = number.strip()
	number = transcoder.transcoder_processString(number,'deva','slp1')
	gananum = parts[7]
	gananum = gananum.replace(u'।','')
	gananum = gananum.strip()
	gananum = transcoder.transcoder_processString(gananum,'deva','slp1')
	if not gana == gananum:
		suspectentry = verb+":"+gana+":"+number+":"+verbwithaccent
		if suspectentry in basedata:
			fout.write(suspectentry+"\n")
			fout.write(";"+verb+":"+gananum+":"+number+":"+verbwithaccent+"\n")
			print counter, verb, gana, number
			counter += 1
fout.close()


	