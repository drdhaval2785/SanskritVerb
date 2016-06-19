# -*- coding: utf-8 -*-
"""
Author:
	Dr. Dhaval Patel, 19 June 2016
Expected output:
	To find out the parts of scripts which are too slow and take greater than the given threshold.
Input:
	logfile.txt
	This file can be generated via `php panini.php 01.0001 law > logfile.txt` with setting variables $debug=1 and $debugmode=2 in panini.php.
	It has data in `debuglocation,verb,suffix,lakAra,time` format.
Output:
	slowfile.txt
	This has data in `verb , suffix , lakAra , debuglocation , timespent` format.
	Use this file to see which part of script spends maximum time and in maximum suffices. Identifying and fixing this will improve the code speed.
Usage:
	python analysedebuglog.py logfile.txt slowfile.txt threshold
	e.g.
	python analysedebuglog.py logfile.txt slowfile.txt 0.01
	Above script will find the script portions which take more than 0.01 seconds to complete.
"""
import sys
if __name__=="__main__":
	# Open logfile.txt
	logfile = open(sys.argv[1],'r')
	# open slowfile.txt
	outputfile = open(sys.argv[2],'w')
	# Convert the threshold to float
	threshold = float(sys.argv[3])
	# Initialise the previous log to 0
	prevlog = 0
	# For each line in logfile
	for line in logfile:
		# Remove trailing whitespace
		line = line.strip()
		# Split the line in its component.
		[string,first,second,lakAra,logtime] = line.split(',')
		# Convert the time to float from string
		logtime = float(logtime)
		# Calculate the time spent for execution of script part from previous to the present debuglocation.
		diff = logtime - prevlog
		# If time spent is > threshold,
		if diff > threshold:
			# Write to slowfile.txt file
			outputfile.write(first+' , '+second+' , '+lakAra+' , '+string+' , '+str(diff)+'\n')
		# Set prevlog to the last analysed time (start time for the next entry)
		prevlog = logtime
	# Close logfile.txt
	logfile.close()
	# Close slowfile.txt
	outputfile.close()
