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
	jnu_array.txt was converted from Devanagari -> SLP1 via sanscript (manually)
"""
import sys, re
import codecs
import string
import datetime
from lxml import etree

# Function to return timestamp
def timestamp():
	return datetime.datetime.now()
# Function to remove end of line from the list members
def triming(lst):
	output = []
	for member in lst:
		member = member.strip()
		output.append(member)
	return output
# Convert from WX to SLP1
def wxtoslp(input):
	# List of WX letters
	wx = 'aAiIuUqQLeEoOMHhyvrlFmfNnJBGDXjbgdxKPCTWctwkpSRsz'
	# List of SLP1 letters
	slp = 'aAiIuUfFxeEoOMHhyvrlYmNRnJBGQDjbgqdKPCWTcwtkpSzs!'
	# Create a translation table
	trantab = string.maketrans(wx,slp)
	# Translate
	return input.translate(trantab)

# function to generate UoHyd weblink
def uohyd(testxml):
	# Parse XML file.
	roots = etree.parse(testxml)
	# Typical line in XML file is in `<select id="select" name="vb"><option value="ak1_akaz_BvAxiH kutilAyAM_gawO">अक्1_अकँ_भ्वादिः कुटिलायां_गतौ</option>` format.
	# We want to fetch in the following format (in SLP1) `aka!:ak:01:ak1_akaz_BvAxiH+kutilAyAM_gawO`
	roo = roots.xpath('/select/option') # Returns a list of all /forms/f in the database.
	details = [member.get('value') for member in roo]
	print "Total", len(details), "entries in test list"
	return details
# Function to return gana number from given agana name.
def gananametonumber(gananame):
	# List of gaNas
	names = ['BvAdiH','adAdiH','juhotyAdiH','divAdiH','svAdiH','tudAdiH','ruDAdiH','tanAdiH','kryAdiH','curAdiH',u'भ्वादिगण',u'अदादिगण',u'जुहोत्यादिगण',u'दिवादिगण',u'स्वादिगण',u'तुदादिगण',u'रुधादिगण',u'तनादिगण',u'क्र्यादिगण',u'चुरादिगण']
	# Their corresponding numbers
	numbers = ['01','02','03','04','05','06','07','08','09','10','01','02','03','04','05','06','07','08','09','10']
	# Return the number from given name
	return numbers[names.index(gananame)]

# Function to scrape data from UoHyd website links.
# Input line -> ak1_akaz_BvAxiH kutilAyAM_gawO
# Expected output -> aka!:ak:01:ak1_akaz_BvAxiH+kutilAyAM_gawO
def uohydtrimline(line):
	# Convert WX -> SLP1.
	line1 = wxtoslp(line)
	# Replace space with +.
	line = line.replace(' ','+')
	# split the line by space.
	parts = line1.split(' ')
	# Split the data
	[withoutanubandha,withanubandha,gana] = parts[0].split('_')
	# Strip unnecessary numbers.
	withoutanubandha = withoutanubandha.strip('0123456789')
	# Return gana number from gana name
	gana = gananametonumber(gana)
	return withanubandha+':'+withoutanubandha+':'+gana+':'+line

# Function to generate JNU weblinks
def jnu(testxml):
	roots = etree.parse(testxml)
	# Typical line in XML file is in `<select class="arialms1" name="t" multiple="" size="10" accept-charset="UTF-8"><option value="45">अकि#(लक्षणे,आत्मने,भ्वादिगण,सेट्,सकर्मक)</option>` format.
	# We want to fetch in the following format (in SLP1) `अकि:01:45`
	roo = roots.xpath('/select/option') # Returns a list of all /forms/f in the database.
	details = [(member.get('value'),member.text) for member in roo]
	print "Total", len(details), "entries in test list"
	return details

# Function to scrape links from JNU website.
# Input tuple -> (45,अकि#(लक्षणे,आत्मने,भ्वादिगण,सेट्,सकर्मक))
# Expected output -> `अकि:01:45`
def jnutrimline(a,b):
	parts = b.split('#')
	gana1 = parts[1].split(',')[2]
	print gana1.encode('utf-8')
	# Convert from gana name to gana number.
	gana = gananametonumber(gana1)
	return parts[0]+':'+gana+':'+a

# Main coding execution part
if __name__=="__main__":
	uohydfile = '../Data/issue789/uohyd_linklist.xml'
	# Read UoHyd XML file.
	details = uohyd(uohydfile)
	# Open output file.
	fout = codecs.open('../Data/issue789/uohyd_array.txt','w','utf-8')
	# Trim the data and then write to output file.
	for detail in details:
		output = uohydtrimline(detail)
		fout.write(output+'\n')
	fout.close()
	jnufile = '../Data/issue789/jnu_linklist.xml'
	# Read JNU XML data.
	details1 = jnu(jnufile)
	# Open output file.
	fout1 = codecs.open('../Data/issue789/jnu_array.txt','w','utf-8')
	# Trim the data and write to output file.
	for (a,b) in details1:
		output1 = jnutrimline(a,b)
		fout1.write(output1+'\n')
	fout1.close()
