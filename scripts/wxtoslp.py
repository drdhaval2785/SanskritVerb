import string
import sys
def wxtoslp(input):
	wx = 'aAiIuUqQLeEoOMHhyvrlFmfNnJBGDXjbgdxKPCTWctwkpSRs'
	slp = 'aAiIuUfFxeEoOMHhyvrlYmNRnJBGQDjbgqdKPCWTcwtkpSzs'
	trantab = string.maketrans(wx,slp)
	return input.translate(trantab)
print wxtoslp('aBryawe,aBryewe,aBryanwe,aBryase,aBryeWe')
if __name__=="__main__":
	infile = sys.argv[1]
	outfile = sys.argv[2]
	fin = open(infile,'r')
	data = fin.read()
	slpdata = wxtoslp(data)
	fout = open(outfile,'w')
	fout.write(slpdata)
	fin.close()
	fout.close()
