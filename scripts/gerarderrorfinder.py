# -*- coding: utf-8 -*-
"""
Expected outcome:
	Find out the verb forms in INRIA database (Gerard), which are not seen in our generated forms i.e. database generated via our script.
Usage:
	python gerarderrorfinder.py basexmlfile
	e.g.
	python gerarderrorfinder.py ../generatedforms/generatedforms20062016.xml
"""
import sys, re
import codecs
import datetime
from wxtoslp import wxtoslp
from lxml import etree
from io import StringIO, BytesIO

# Function to return timestamp
def timestamp():
	return datetime.datetime.now()

# Function to remove EOL from members of a list
def triming(lst):
	output = []
	for member in lst:
		member = member.strip()
		output.append(member)
	return output
def devatotag(attributestring):
	for (a,b) in database:
		attributestring = attributestring.replace(a,b)
	return attributestring
# Return suffix based on pada, puruza and vacana e.g. 'tip' from parasmEpadI, prathamapuruza, ekavacana.
def returnsuffix(pada,puruza,vacana):
	global suffixlist
	for (p,p1,v,f) in suffixlist:
		if pada==p and puruza==p1 and vacana==v:
			return f
	else:
		return 'ERROR'

# Function to read the data from ../../inriaxmlwrapper/Data/SL_roots.xml
# Definition in ../../inriaxmlwrapper/SL_morph.dtd
# The file is in XML format.
# Present script tries to parse it and get necessary data out of it.
# Typical input line is in the following format
# <f form="Bavati"><v><cj><prim/></cj><sys><prs gn="1"><md><pr/></md><para/></prs></sys><np><sg/><trd/></np></v><s stem="BU#1"/></f>
# Expected output is as follows
# [form,prayoga,lakAra,puruza,vacana,padI,dhAtu,gaNa,suffix,sanAdi]
def readinria(xmlfile):
	global suffixlist, okformlist
	roots = etree.parse(xmlfile)
	roo = roots.xpath('/forms/f')
	output1 = []
	for member in roo:
		verbform = member.get('form')
		verb = member.getchildren()[-1].get('stem').split('#')[0]
		children = member.getchildren()[:-1]
		for child in children:
			taglist = child.xpath('.//*') # Fetches all elements (abbreviations) of a particular verb / word characteristics.
			output = [child.tag] # The first member of output list is the tag of element 'v', 'na' etc.
			output = output + [ tagitem.tag for tagitem in taglist] # Other tags (abbreviations) and add it to output list.
			attrstring = '-'.join(output)
			attrstring = devatotag(attrstring)
			attribs = attrstring.split('-')
			if len(re.findall(r'[aAiIuUfFxXeEoO]',verb)) == 1:
				if not ('karma' in attribs or 'Ric' in attribs or 'san' in attribs or 'yaN' in attribs or 'yaNluk' in attribs):
					if not verbform in okformlist:
						if not re.sub('[rs]$','H',verbform) in okformlist:
							attribs.remove('prim')
							#print verbform, verb, attribs
							output1.append((verbform,verb,attribs))
	#print len(output1), 'entries in SL_roots.xml file and not of karmaNi, Nijanta, yaGanta, yaGluganta forms.'
	return output1
			

# Function to parse the test XML file.
# Parsing a long XML file is computationally expensive.
# Therefore storing this in a variable and then calling that globally rather than calling this script in each iteration.
def getroo(testxml):
	# Parse the file
	roots = etree.parse(testxml)
	# Typical line is in /forms/f location.
	roo = roots.xpath('/forms/f') # Returns a list of all /forms/f in the database.
	# Return the parsed file and list both
	return roots, roo

# Function to extract verbforms and verbdetails from the input XML file.
# We will use this as a benchmark against which we will compare the UoHyd forms.
def okverbformlist():
	global roots, roo
	# Typical line in XML file is in `<forms><f form="aMsayati"><root name="aMsa" num="10.0460"/><law/><tip/></f></forms>` format.
	# Therefore, the data which we want e.g. 'aMSayati' is in /forms/f-get('form') location. Fetching it below.
	# Create a list with (form,verb,verbnumber,lakAra,suffix) as member for each entry in XML file.
	verbdetails = [(member.get('form'),member.find('root').get('name'),member.find('root').get('num'),member.getchildren()[-2].tag,member.getchildren()[-1].tag) for member in roo] # For all /forms/f in database, we get its attribute 'forms' e.g. 'aMSayati'.
	# Create a list of only verbforms.
	verbformlist = [member.get('form') for member in roo]
	#print "Total", len(verbformlist), "entries in base list"
	return [verbformlist,verbdetails]
# Function to get gana name from verb number e.g. 10.0460 -> curAdiH
def ganacorres(number):
	global ganalist
	# 10.0460 -> 10
	gananum = number.split('.')[0]
	# Reducing one from the output, because the list in python is 0 based.
	gananum = int(gananum)-1
	# Return the gana name
	return ganalist[gananum]

# Function to get the correct form from our base XML file based on verb, lakARa, suffix and gaNa.
def getcorrectform(verb,lakAra,suffix,gaNa):
	# Call okdetaillist
	global okdetaillist
	# <f form="akzati"><root name="akzU!" num="01.0742"/><law/><tip/></f>
	# Creating a list of verb forms for given verb, lakAra, suffix and gaNa.
	# There can be more than one such forms, so using list.
	output = [form1 for (form1,verb1,number1,lakAra1,suffix1) in okdetaillist if verb==verb1 and lakAra==lakAra1 and suffix==suffix1 and ganacorres(number1)==gaNa]
	# If there are more than one such forms, join them using colon
	if len(output) > 0:
		return ':'.join(output)
	# If there is no entry, return NONE
	else:
		return 'NONE'
		
# Main execution part
if __name__=="__main__":
	# List of suffices based on UoHyd data and our data in format (pada,puruza,vacana,suffix)
	suffixlist = [('parasmEpadI','pra','1','tip'),('parasmEpadI','pra','2','tas'),('parasmEpadI','pra','3','Ji'),('parasmEpadI','ma','1','sip'),('parasmEpadI','ma','2','Tas'),('parasmEpadI','ma','3','Ta'),('parasmEpadI','u','1','mip'),('parasmEpadI','u','2','vas'),('parasmEpadI','u','3','mas'),('AtmanepadI','pra','1','ta'),('AtmanepadI','pra','2','AtAm'),('AtmanepadI','pra','3','Ja'),('AtmanepadI','ma','1','TAs'),('AtmanepadI','ma','2','ATAm'),('AtmanepadI','ma','3','Dvam'),('AtmanepadI','u','1','iw'),('AtmanepadI','u','2','vahi'),('AtmanepadI','u','3','mahiN')]
	# Define ganalist
	ganalist = ['BvAdiH','adAdiH','juhotyAdiH','divAdiH','svAdiH','tudAdiH','ruDAdiH','tanAdiH','kryAdiH','curAdiH']
	database = [('v-cj-prim', 'prim'),
    ('v-cj-ca', 'Ric'),
    ('v-cj-int', 'yaN'),
    ('v-cj-des', 'san'),
    ('sys-prs-md-pr', 'law'),
    ('sys-prs-md-ip', 'low'),
    ('sys-prs-md-op', 'viDiliN'),
    ('sys-prs-md-im', 'laN'),
    ('sys-pas-md-pr', 'law-karma'),
    ('sys-pas-md-ip', 'low-karma'),
    ('sys-pas-md-op', 'viDiliN-karma'),
    ('sys-pas-md-im', 'laN-karma'),
    ('sys-tp-fut', 'lfw'),
    ('sys-tp-prf', 'liw'),
    ('sys-tp-aor', 'luN'),
    ('sys-tp-inj', 'AgamABAvayuktaluN'),
    ('sys-tp-cnd', 'lfN'),
    ('sys-tp-ben', 'ASIrliN'),
    ('sys-pef', 'luw'),
    ('np-sg', 'ekavacanam'),
    ('np-du', 'dvivacanam'),
    ('np-pl', 'bahuvacanam'),
    ('fst', 'uttama'),
    ('snd', 'maDyama'),
    ('trd', 'praTama'),
    ('na-nom', 'प्रथमाविभक्तिः'),
    ('na-voc', 'संबोधनविभक्तिः'),
    ('na-acc', 'द्वितीयाविभक्तिः'),
    ('na-ins', 'तृतीयाविभक्तिः'),
    ('na-dat', 'चतुर्थीविभक्तिः'),
    ('na-abl', 'पञ्चमीविभक्तिः'),
    ('na-gen', 'षष्ठीविभक्तिः'),
    ('na-loc', 'सप्तमीविभक्तिः'),
    ('sg', 'ekavacanam'),
    ('du', 'dvivacanam'),
    ('pl', 'bahuvacanam'),
    ('mas', 'm'),
    ('fem', 'f'),
    ('neu', 'n'),
    ('dei', 'सङ्ख्या'),
    ('uf', 'अव्ययम्'),
    ('ind', 'क्रियाविशेषणम्'),
    ('interj', 'उद्गारः'),
    ('parti', 'निपातम्'),
    ('prep', 'चादिः'),
    ('conj', 'संयोजकः'),
    ('tasil', 'तसिल्'),
    ('vu-cj-prim', 'अव्ययधातुरूप-प्राथमिकः'),
    ('vu-cj-ca', 'अव्ययधातुरूप-णिजन्तः'),
    ('vu-cj-int', 'अव्ययधातुरूप-यङन्तः'),
    ('vu-cj-des', 'अव्ययधातुरूप-सन्नन्तः'),
    ('iv-inf','तुमुन्'),
    ('iv-abs','क्त्वा'),
    ('iv-per','per'),
    ('ab-cj-prim', 'क्त्वा-प्राथमिकः'),
    ('ab-cj-ca', 'क्त्वा-णिजन्तः'),
    ('ab-cj-int', 'क्त्वा-यङन्तः'),
    ('ab-cj-des', 'क्त्वा-सन्नन्तः'),
    ('kr-cj-prim-no', 'prim'),
    ('kr-cj-ca-no', 'Ric'),
    ('kr-cj-int-no', 'yaN'),
    ('kr-cj-des-no', 'san'),
    ('kr-vb-no', ''),
    ('ppp', 'ppp'),
    ('ppa', 'ppa'),
    ('pprp', 'pprp'),
    ('ppr-para', 'ppr-pa'),
    ('ppr-atma', 'ppr-A'),
    ('ppft-para', 'ppft-pa'),
    ('ppft-atma', 'ppft-A'),
    ('pfutp', 'pfutp'),
    ('pfut-para', 'pfut-pa'),
    ('pfut-atma', 'pfut-A'),
    ('gya', 'य'),
    ('iya', 'ईय'),
    ('tav', 'तव्य'),
    ('para', 'pa'),
    ('atma', 'A'),
    ('pass', 'karma'),
    ('pa', 'pa'),
	('iic', 'समासपूर्वपदनामपदम्'),
	('iip', 'समासपूर्वपदकृदन्तः'),
	('iiv', 'समासपूर्वपदधातुः'),
	('upsrg', 'उपसर्गः')
				]
	# Read the basexml, usually ../generatedforms/generatedformsDDMMYYYY.xml of the latest date.
	basexml = sys.argv[1]
	# Parse the basexml
	roots, roo = getroo(basexml)
	# Fetch verbformlist and verbdetaillist from the basexml file.
	[okformlist,okdetaillist] = okverbformlist()
	# Converting okformlist to a set. Testing for occurrence of a member in set is much faster as compared to a list.
	okformlist = set(okformlist)
	suspectforms = readinria('../../inriaxmlwrapper/SL_roots.xml')
	# Opening error file to store erroneous entries.
	outfile = codecs.open('../Data/inriastudy/inriasuspects.txt','w','utf-8')
	# Opening a nomatch file to store unmatched entries.
	nomatchfile = codecs.open('../Data/inriastudy/inrianomatch.txt','w','utf-8')
	# Opening a forcematch file to store forcematched entries.
	forcematchfile = codecs.open('../Data/inriastudy/inriaforcematch.txt','w','utf-8')
	for (a,b,lst) in suspectforms:
		outfile.write(a+','+b+','+','.join(lst)+'\n')
	outfile.close()
