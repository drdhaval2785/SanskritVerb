# -*- coding: utf-8 -*-
"""
Author:
	Dr. Dhaval Patel, 20 September 2016
Expected output:
	To find the discrepancy between the verb numbers of $verbdata and Mihail's verb dataset i.e. panini-dhatu-index1.xlsx (copied in Data/rawcomplete.txt)
Input:
	(1) Data/rawcomplete.txt - original dataset
	(2) Data/issue965/vnum.txt - data from scripts/function.php $verbdata extracted via extract1.php
Output:
	Data/issue965/vnumsuspect.txt - file where suspect entries are stored.
	Data/issue965/vnumlog.txt - logs in case some alterations or force matching is done.
Usage:
	python verbnumdiscrepancyfinder.py originaldata verbdatadata suspectfile logfile
	e.g.
	python verbnumdiscrepancyfinder.py ../Data/rawcomplete.txt ../Data/issue965/vnum.txt ../Data/issue965/vnumsuspect.txt ../Data/issue965/vnumlog.txt
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
gananumber = ['01','02','03','04','05','06','07','08','09','10']
def ganaconverter(gana):
	global ganalist, gananumber
	gana = gana.strip()
	for i in xrange(len(ganalist)):
		gana = gana.replace(ganalist[i],gananumber[i])
	return gana

# Prepare the data from rawcomplete.txt to corresponding vnum.txt
fin = codecs.open('../Data/rawcomplete.txt','r','utf-8')
data = fin.readlines()
data = triming(data)
fin.close()
fout = codecs.open('../Data/issue965/rawcompletelog.txt','w','utf-8')
#print transcoder.transcoder_processString('धवलः','utf8','slp1')
for datum in data:
	datum = datum
	parts = datum.split("\t")
	parts = map(unicode,parts)
	verbwithaccent = parts[0].strip()
	verb = verbwithaccent.replace(u'॑','')
	verb = verb.replace(u'॒','')
	verb = verb.strip()
	gana = parts[6]
	gana = gana.encode('utf-8')
	gana = ganaconverter(gana)
	number = parts[8]
	number = number.replace(u' ॥','')
	number = number.strip()
	number = transcoder.transcoder_processString(number,'deva','slp1')
	verb = transcoder.transcoder_processString(verb,'deva','slp1')
	fout.write(verb+":"+gana+":"+number+":"+verbwithaccent+"\n")

fout.close()
	