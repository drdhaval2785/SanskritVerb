"""
Expected outcome:
	Convert a file from SLP1 encoding to WX encoding.
	The code can be called as module like `from slptowx import slptowx` and then used as a function.
Usage:
	python slptowx.py inputfile outputfile

"""
import string
import sys
# Function to convert an input from SLP1 to WX encoding
def slptowx(input):
	# Create a character set of both WX and SLP1
	wx = 'aAiIuUqQLeEoOMHhyvrlFmfNnJBGDXjbgdxKPCTWctwkpSRsz'
	slp = 'aAiIuUfFxeEoOMHhyvrlYmNRnJBGQDjbgqdKPCWTcwtkpSzs!'
	# Create a translation table
	trantab = string.maketrans(slp,wx)
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
	wxdata = slptowx(data)
	# Open outputfile
	fout = open(outfile,'w')
	# Write to outputfile
	fout.write(wxdata)
	# Close files
	fin.close()
	fout.close()
