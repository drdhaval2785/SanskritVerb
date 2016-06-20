"""
Expected outcome:
	Convert a file from WX encoding to SLP1 encoding.
	The code can be called as module like `from wxtoslp import wxtoslp` and then used as a function.
Usage:
	python wxtoslp.py inputfile outputfile

"""
import string
import sys
# Function to convert an input from WX to SLP1 encoding
def wxtoslp(input):
	# Create a character set of both WX and SLP1
	wx = 'aAiIuUqQLeEoOMHhyvrlFmfNnJBGDXjbgdxKPCTWctwkpSRsz'
	slp = 'aAiIuUfFxeEoOMHhyvrlYmNRnJBGQDjbgqdKPCWTcwtkpSzs!'
	# Create a translation table
	trantab = string.maketrans(wx,slp)
	# Return the converted string
	return input.translate(trantab)

# Code for file conversions
if __name__=="__main__":
	# Read arguments in to infile and outfile
	infile = sys.argv[1]
	outfile = sys.argv[2]
	# Read inputfile
	fin = open(infile,'r')
	data = fin.read()
	# Convert to SLP1
	slpdata = wxtoslp(data)
	# Open outputfile
	fout = open(outfile,'w')
	# Write to outputfile
	fout.write(slpdata)
	# Close files
	fin.close()
	fout.close()
