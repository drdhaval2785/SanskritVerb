# -*- coding: utf-8 -*-
"""
Usage:
python analysedebuglog.py logfile.txt slowfile.txt 0.01
"""
import sys
if __name__=="__main__":
	logfile = open(sys.argv[1],'r')
	outputfile = open(sys.argv[2],'w')
	threshold = float(sys.argv[3])
	prevlog = 0
	for line in logfile:
		line = line.strip()
		[string,first,second,logtime] = line.split(',')
		logtime = float(logtime)
		diff = logtime - prevlog
		if diff > threshold:
			outputfile.write(first+' , '+second+' , '+string+' , '+str(diff)+'\n')
		prevlog = logtime
	logfile.close()
	outputfile.close()
	
	
