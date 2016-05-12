# -*- coding: utf-8 -*-
"""
Usage:
python linkgen789.py

Input:
../Data/issue789/uohyd_linklist.xml, ../Data/issue789/jnu_linklist.xml
(These two files are copy-pasted from the dropdown of HTML seen on UoHyd and JNU verb generator sites)
In case we find that there is substantial changes in any of the site, re-copy these XML files.

Output:
../Data/issue789/uohyd_array.txt, ../Data/issue789/jnu_array.txt
These files store the data in a txt file which is then used for regenerating $verbdata in function.php.
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
def wxtoslp(input):
	wx = 'aAiIuUqQLeEoOMHhyvrlFmfNnJBGDXjbgdxKPCTWctwkpSRsz'
	slp = 'aAiIuUfFxeEoOMHhyvrlYmNRnJBGQDjbgqdKPCWTcwtkpSzs!'
	trantab = string.maketrans(wx,slp)
	return input.translate(trantab)
# function to generate UoHyd weblink
def uohyd(testxml):
	roots = etree.parse(testxml)
	# Typical line in XML file is in `<select id="select" name="vb"><option value="ak1_akaz_BvAxiH kutilAyAM_gawO">अक्1_अकँ_भ्वादिः कुटिलायां_गतौ</option>` format.
	# We want to fetch in the following format (in SLP1) `aka!:ak:01:ak1_akaz_BvAxiH+kutilAyAM_gawO`
	roo = roots.xpath('/select/option') # Returns a list of all /forms/f in the database.
	details = [member.get('value') for member in roo]
	print "Total", len(details), "entries in test list"
	return details
def gananametonumber(gananame):
	names = ['BvAdiH','adAdiH','juhotyAdiH','divAdiH','svAdiH','tudAdiH','ruDAdiH','tanAdiH','kryAdiH','curAdiH',u'भ्वादिगण',u'अदादिगण',u'जुहोत्यादिगण',u'दिवादिगण',u'स्वादिगण',u'तुदादिगण',u'रुधादिगण',u'तनादिगण',u'क्र्यादिगण',u'चुरादिगण']
	numbers = ['01','02','03','04','05','06','07','08','09','10','01','02','03','04','05','06','07','08','09','10']
	return numbers[names.index(gananame)]
# Input line -> ak1_akaz_BvAxiH kutilAyAM_gawO
# Expected output -> aka!:ak:01:ak1_akaz_BvAxiH+kutilAyAM_gawO
def uohydtrimline(line):
	line1 = wxtoslp(line)
	parts = line1.split(' ')
	[withoutanubandha,withanubandha,gana] = parts[0].split('_')
	withoutanubandha = withoutanubandha.strip('0123456789')
	gana = gananametonumber(gana)
	return withanubandha+':'+withoutanubandha+':'+gana+':'+line

def jnu(testxml):
	roots = etree.parse(testxml)
	# Typical line in XML file is in `<select class="arialms1" name="t" multiple="" size="10" accept-charset="UTF-8"><option value="45">अकि#(लक्षणे,आत्मने,भ्वादिगण,सेट्,सकर्मक)</option>` format.
	# We want to fetch in the following format (in SLP1) `अकि:01:45`
	roo = roots.xpath('/select/option') # Returns a list of all /forms/f in the database.
	details = [(member.get('value'),member.text) for member in roo]
	print "Total", len(details), "entries in test list"
	return details
# Input tuple -> (45,अकि#(लक्षणे,आत्मने,भ्वादिगण,सेट्,सकर्मक))
# Expected output -> `अकि:01:45`
def jnutrimline(a,b):
	parts = b.split('#')
	gana1 = parts[1].split(',')[2]
	print gana1.encode('utf-8')
	gana = gananametonumber(gana1)
	return parts[0]+':'+gana+':'+a

if __name__=="__main__":
	uohydfile = '../Data/issue789/uohyd_linklist.xml'
	details = uohyd(uohydfile)
	fout = codecs.open('../Data/issue789/uohyd_array.txt','w','utf-8')
	for detail in details:
		output = uohydtrimline(detail)
		fout.write(output+'\n')
	fout.close()
	jnufile = '../Data/issue789/jnu_linklist.xml'
	details1 = jnu(jnufile)
	fout1 = codecs.open('../Data/issue789/jnu_array.txt','w','utf-8')
	for (a,b) in details1:
		output1 = jnutrimline(a,b)
		fout1.write(output1+'\n')
	fout1.close()
	