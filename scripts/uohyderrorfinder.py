# -*- coding: utf-8 -*-
"""
Usage:
python uohyderrorfinder.py basexmlfile
e.g.
python uohyderrorfinder.py ../generatedforms/generatedforms18062016.xml
"""
import sys, re
import codecs
import string
import datetime
from wxtoslp import wxtoslp
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

suffixlist = [('parasmEpadI','pra','1','tip'),('parasmEpadI','pra','2','tas'),('parasmEpadI','pra','3','Ji'),('parasmEpadI','ma','1','sip'),('parasmEpadI','ma','2','Tas'),('parasmEpadI','ma','3','Ta'),('parasmEpadI','u','1','mip'),('parasmEpadI','u','2','vas'),('parasmEpadI','u','3','mas'),('AtmanepadI','pra','1','ta'),('AtmanepadI','pra','2','AtAm'),('AtmanepadI','pra','3','Ja'),('AtmanepadI','ma','1','TAs'),('AtmanepadI','ma','2','ATAm'),('AtmanepadI','ma','3','Dvam'),('AtmanepadI','u','1','iw'),('AtmanepadI','u','2','vahi'),('AtmanepadI','u','3','mahiN')]
def returnsuffix(pada,puruza,vacana):
	global suffixlist
	for (p,p1,v,f) in suffixlist:
		if pada==p and puruza==p1 and vacana==v:
			return f
	else:
		return 'ERROR'

# Typical line is in the following format
# Bavawi:BU1<prayogaH:karwari><lakAraH:lat><puruRaH:pra><vacanam:1><paxI:parasmEpaxI><XAwuH:BU><gaNaH:BvAxiH><level:1>
# Expected output is as follows
# [Bavati,BU,BvAdi,law,tip]
def readuohyd(line):
	global suffixlist;
	line = wxtoslp(line)
	parts = line.split('<')
	output = []
	for x in xrange(len(parts)):
		part = parts[x].strip('>')
		part = part.strip('')
		[one,two] = part.split(':')
		if x==0:
			form = one
			if re.search('[_]',two):
				[index,sanAdi] = two.split('_')
			else:
				index = two
				sanAdi = ''
		if x==1:
			prayoga = two
		if x==2:
			lakAra = two
		if x==3:
			puruza = two
		if x==4:
			vacana = two
		if x==5:
			padI = two
		if x==6:
			dhAtu = two
		if x==7:
			gaNa = two
	suffix = returnsuffix(padI,puruza,vacana)
	return [form,prayoga,lakAra,puruza,vacana,padI,dhAtu,gaNa,suffix,sanAdi]
def getroo(testxml):
	roots = etree.parse(testxml)
	roo = roots.xpath('/forms/f') # Returns a list of all /forms/f in the database.
	return roots, roo
def okverbformlist():
	global roots, roo
	# Typical line in XML file is in `<forms><f form="aMsayati"><root name="aMsa" num="10.0460"/><law/><tip/></f></forms>` format.
	# Therefore, the data which we want e.g. 'aMSayati' is in /forms/f-get('form') location. Fetching it below.
	verbdetails = [(member.get('form'),member.find('root').get('name'),member.find('root').get('num'),member.getchildren()[-2].tag,member.getchildren()[-1].tag) for member in roo] # For all /forms/f in database, we get its attribute 'forms' e.g. 'aMSayati'.
	verbformlist = [member.get('form') for member in roo]
	print "Total", len(verbformlist), "entries in base list"
	return [verbformlist,verbdetails]
	#return verbformlist
ganalist = ['BvAdiH','adAdiH','juhotyAdiH','divAdiH','svAdiH','tudAdiH','ruDAdiH','tanAdiH','kryAdiH','curAdiH']
def ganacorres(number):
	global ganalist
	gananum = number.split('.')[0]
	gananum = int(gananum)-1
	return ganalist[gananum]
def getcorrectform(verb,lakAra,suffix,gaNa):
	global okdetaillist
	# <f form="akzati"><root name="akzU!" num="01.0742"/><law/><tip/></f>
	output = [form1 for (form1,verb1,number1,lakAra1,suffix1) in okdetaillist if verb==verb1 and lakAra==lakAra1 and suffix==suffix1 and ganacorres(number1)==gaNa]
	if len(output) > 0:
		return ':'.join(output)
	else:
		return 'NONE'
if __name__=="__main__":
	testfile = codecs.open('../Data/UoHyd_all_forms.txt','r','utf-8')
	data = testfile.readlines()
	testfile.close()
	basexml = sys.argv[1]
	roots, roo = getroo(basexml)
	[okformlist,okdetaillist] = okverbformlist()
	#okformlist = okverbformlist()
	okformlist = set(okformlist)
	outfile = codecs.open('../Data/uohydstudy/uohyderrors.txt','w','utf-8')
	nomatchfile = codecs.open('../Data/uohydstudy/uohydnomatch.txt','w','utf-8')
	counter = 0
	counter2 = 0
	for datum in data:
		counter += 1
		[form,prayoga,lakAra,puruza,vacana,padI,dhAtu,gaNa,suffix,sanAdi] = readuohyd(datum.encode('utf-8'))
		if not prayoga=="kartari":
			pass
		elif not sanAdi=="":
			pass
		elif "AmAs" in form or "AmbaBU" in form or "AYcak" in form:
			pass
		elif not form in okformlist:
			counter2 += 1
			correctform = getcorrectform(dhAtu,lakAra,suffix,gaNa)
			if not correctform == 'NONE':
				print counter2, '/', counter 
				print form+','+dhAtu+','+gaNa+','+lakAra+','+suffix
				print ';'+correctform+','+dhAtu+','+gaNa+','+lakAra+','+suffix
				print
				outfile.write(form+','+dhAtu+','+gaNa+','+lakAra+','+suffix+'\n')
				outfile.write(';'+correctform+','+dhAtu+','+gaNa+','+lakAra+','+suffix+'\n')
			else:
				nomatchfile.write(form+','+dhAtu+','+gaNa+','+lakAra+','+suffix+'\n')
				nomatchfile.write(';'+correctform+','+dhAtu+','+gaNa+','+lakAra+','+suffix+'\n')
	outfile.close()
	nomatchfile.close()
