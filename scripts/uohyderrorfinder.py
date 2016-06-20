# -*- coding: utf-8 -*-
"""
Expected outcome:
	Find out the verb forms in UoHyd database, which are not seen in our generated forms i.e. database generated via our script.
Usage:
	python uohyderrorfinder.py basexmlfile
	e.g.
	python uohyderrorfinder.py ../generatedforms/generatedforms18062016.xml
"""
import sys, re
import codecs
import datetime
from wxtoslp import wxtoslp
from lxml import etree

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

# Return suffix based on pada, puruza and vacana e.g. 'tip' from parasmEpadI, prathamapuruza, ekavacana.
def returnsuffix(pada,puruza,vacana):
	global suffixlist
	for (p,p1,v,f) in suffixlist:
		if pada==p and puruza==p1 and vacana==v:
			return f
	else:
		return 'ERROR'

# Function to read the data from ../Data/UoHyd_all_forms.txt
# The file is not strictly in XML format, but slightly different text format.
# Present script tries to parse it and get necessary data out of it.
# Typical input line is in the following format
# Bavawi:BU1<prayogaH:karwari><lakAraH:lat><puruRaH:pra><vacanam:1><paxI:parasmEpaxI><XAwuH:BU><gaNaH:BvAxiH><level:1>
# Expected output is as follows
# [Bavati,BU,BvAdi,law,tip]
def readuohyd(line):
	global suffixlist
	# Convert from WX -> SLP1
	line = wxtoslp(line)
	# Split on <
	parts = line.split('<')
	# Initialize output list
	output = []
	# For all entries in parts
	for x in xrange(len(parts)):
		# remove >
		part = parts[x].strip('>')
		part = part.strip('')
		# split the part in one and two
		[one,two] = part.split(':')
		# For first member e.g. Bavati:BU1
		# Extract form, index and sanAdi
		if x==0:
			form = one
			# If there is a sanAdi tag associated, extract it.
			if re.search('[_]',two):
				[index,sanAdi] = two.split('_')
			else:
				index = two
				sanAdi = ''
		# prayogaH:karwari -> kartari
		if x==1:
			prayoga = two
		# lakAraH:lat -> law
		if x==2:
			lakAra = two
		# puruRaH:pra -> pra
		if x==3:
			puruza = two
		# vacanam:1 -> 1
		if x==4:
			vacana = two
		# paxI:parasmEpaxI -> parasmEpadI
		if x==5:
			padI = two
		# XAwuH:BU -> BU
		if x==6:
			dhAtu = two
		# gaNaH:BvAxiH -> BvAdiH
		if x==7:
			gaNa = two
	# Calculate suffix based on pada, puruza and vacana.
	suffix = returnsuffix(padI,puruza,vacana)
	# Return the list of data from each line
	return [form,prayoga,lakAra,puruza,vacana,padI,dhAtu,gaNa,suffix,sanAdi]

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
	print "Total", len(verbformlist), "entries in base list"
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
	# Open test file i.e. UoHyd_all_forms.txt
	testfile = codecs.open('../Data/UoHyd_all_forms.txt','r','utf-8')
	# Read lines into a list
	data = testfile.readlines()
	# Close the file
	testfile.close()
	# Read the basexml, usually ../generatedforms/generatedformsDDMMYYYY.xml of the latest date.
	basexml = sys.argv[1]
	# Parse the basexml
	roots, roo = getroo(basexml)
	# Fetch verbformlist and verbdetaillist from the basexml file.
	[okformlist,okdetaillist] = okverbformlist()
	# Converting okformlist to a set. Testing for occurrence of a member in set is much faster as compared to a list.
	okformlist = set(okformlist)
	# Opening error file to store erroneous entries.
	outfile = codecs.open('../Data/uohydstudy/uohyderrors.txt','w','utf-8')
	# Opening a nomatch file to store unmatched entries.
	nomatchfile = codecs.open('../Data/uohydstudy/uohydnomatch.txt','w','utf-8')
	# Opening a forcematch file to store forcematched entries.
	forcematchfile = codecs.open('../Data/uohydstudy/uohydforcematch.txt','w','utf-8')
	# Counter initialization
	counter = 0
	counter2 = 0
	# For each entry in UoHyd file
	for datum in data:
		# Increment the counter
		counter += 1
		# Fetch necessary data from line
		[form,prayoga,lakAra,puruza,vacana,padI,dhAtu,gaNa,suffix,sanAdi] = readuohyd(datum.encode('utf-8'))
		# Ignoring certain known cases, and storing them in uohydforcematch.txt file
		if not prayoga=="kartari":
			forcematchfile.write(form+','+dhAtu+','+gaNa+','+lakAra+','+suffix+'\n')
		elif not sanAdi=="":
			forcematchfile.write(form+','+dhAtu+','+gaNa+','+lakAra+','+suffix+'\n')
		elif "AmAs" in form or "AmbaBU" in form or "AYcak" in form:
			forcematchfile.write(form+','+dhAtu+','+gaNa+','+lakAra+','+suffix+'\n')
		elif form.endswith("iQvam") or form.endswith("iDvam"):
			forcematchfile.write(form+','+dhAtu+','+gaNa+','+lakAra+','+suffix+'\n')
		# If not in the base list
		elif not form in okformlist:
			counter2 += 1
			# Find the correct/corresponding form from base list
			correctform = getcorrectform(dhAtu,lakAra,suffix,gaNa)
			# If the form exists, write to the uohyderrors.txt file
			if not correctform == 'NONE':
				print counter2, '/', counter # To display to the terminal, so that the user knows that script is running.
				print form+','+dhAtu+','+gaNa+','+lakAra+','+suffix
				print ';'+correctform+','+dhAtu+','+gaNa+','+lakAra+','+suffix
				print
				outfile.write(form+','+dhAtu+','+gaNa+','+lakAra+','+suffix+'\n')
				outfile.write(';'+correctform+','+dhAtu+','+gaNa+','+lakAra+','+suffix+'\n')
			# If the form doesn't exist, write to uohydnomatch.txt file
			else:
				nomatchfile.write(form+','+dhAtu+','+gaNa+','+lakAra+','+suffix+'\n')
				nomatchfile.write(';'+correctform+','+dhAtu+','+gaNa+','+lakAra+','+suffix+'\n')
	outfile.close()
	nomatchfile.close()
	forcematchfile.close()
