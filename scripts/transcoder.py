# This Python file uses the following encoding: utf-8

""" Python version of transcoder. 
    Uses built-in library xml.etree.ElementTree,
    rather than lxml.
""" 

__program_name__ = 'transcoder.py'
__author__ = 'Jim Funderburk'
__email__ = 'funderburk1@verizon.net'
__copyright__ = 'Copyright 2011, Jim Funderburk'
__license__ = 'GPL http://www.gnu.org/licenses/gpl.txt'
__date__ = '2011-12'


# Python Standard Library
import os
import sys
import codecs
#import locale
import re
#import logging
from unicodedata import normalize
#from operator import itemgetter
#from lxml import etree
import xml.etree.ElementTree as ET

## Jim Funderburk recoding into php of Java code developed by
## Ralph Bunker.
## This software is made available under the Creative Commons
## Creative Commons Attribution Non-Commercial Share Alike license available in full at <ptr target="http:##creativecommons.org/licenses/by-nc-sa/3.0/legalcode"/>, and summarized at <ptr target="http:##creativecommons.org/licenses/by-nc-sa/3.0/"/>.  Permission is granted to build upon this work non-commercially, as long as credit is explicitly acknowledged exactly as described herein and derivative work is distributed under the same license.
## Assume transcoder xml files are in directory ../data/transcoder,
## relative to the directory containing this transcoder.php file

## two global variables
# Assume transcoder xml files are in directory ../data/transcoder,
# relative to the directory containing this transcoder.py file


global transcoder_dir,transcoder_fsmarr
transcoder_dir =os.path.dirname(os.path.abspath(__file__))
transcoder_dir += "/transcoderdata/transcoder"
transcoder_fsmarr = {}  # a dictionary. keys are from+to

def transcoder_fsm(sfrom,to) :
 global transcoder_dir,transcoder_fsmarr
 fromto = sfrom + "_" + to
 if (fromto in transcoder_fsmarr) :
  return
 
 filein = transcoder_dir + '/' + fromto + ".xml"
 if (not os.path.exists(filein)) :
  #  print "file does not exist = " + filein
  return
  # print "file exists = " + filein
 tree = ET.parse(filein)
 xml = tree.getroot()
 attributes = xml.attrib
 # for a in attributes:
 #  print a + "," + attributes[a]
 start = attributes['start']  ## required
 entries = list(xml)  ## children
 fsm = {} ## finite state machine to construct
 fsm['start']=start
 # fsmentries is a list of fsmentry elements, each of which is a hash
 # corresponding to one of the 'e' elements in the xml file.
 fsmentries = [] # initially an empty list
 n = 0
 for e in entries:
  if (e.tag != 'e'):
   # skip comments
   continue
  x = e.find("in")
  inval = x.text
  if not inval:  # 
   inval=''
  conlook = False
  match = re.match(r'^([^/]+)/\^',inval)
  if match :
   ## In transcoding from slp1 to devanagari, it is necessary to do a
   ## 'look-ahead' when deciding how to code a consonant.  If the 
   ## consonant is not followed by a vowel, then a vigraha has to be emitted.
   ## The input codes inval in such cases as:
   ## k/^([^aAiIuUfFxXeEoO^/\\])
   ## Which is to be intepreted as: starting at the next character,
   ##    check if the input string does NOT match the regular expression
   ##    [^aAiIuUfFxXeEoO^/\\].
   ##    Note that the last 3 elements '^', '/', and '\' are present only
   ##    because of accents. 
   ## except in these two cases, we process this entry no further
   if ( (fromto != 'slp1_deva') and (fromto != 'hkt_tamil')and
        (fromto != 'deva_slp1')) :
    continue
   inval = match.group(1)
   conlook=True
  x = e.find("s") # s = state name of this entry. Can be a comma-delimited list
  sval = x.text
  startStates = re.split(",",sval)
  x = e.find("out") # out = the transformation of the input
  outval = x.text
  if (outval == None):  # apparently parser returns this from <out></out>
   outval=''
  x = e.find("next") # next state, this is optional. Its absence means use sval
  if x is not None:
   nextState = x.text
  else:
   nextState = startStates[0]

  # inval, outval may be strings representing unicode.
  # the format expected is \uxxxx\uyyyy  etc. where xxxx and yyyy are
  # four hex digits.
  newinval = to_unicode(inval)
  newoutval = to_unicode(outval)
  # constuct this fsmentry as a hash of mixed values
  fsmentry = {}
  fsmentry['starts'] = startStates
  fsmentry['in'] = newinval
  # fsmentry['regex'] is defined only when conlook is true
  if conlook:
   fsmentry['regex']=fromto  
  fsmentry['out']=newoutval
  fsmentry['next']=nextState
  # Dec 5, 2013 save raw inval/outval
  fsmentry['inraw']=inval
  fsmentry['outraw']=outval
  fsmentries.append(fsmentry)
  
  #for k in fsmentry.keys():
  # print k,"=>",fsmentry[k]
  #  print (sval,inval,outval,nextval),etree.tostring(e)
  
  # print n,etree.tostring(e)
  n += 1

 fsm['fsm']=fsmentries
 ## make associative array states, whose keys are characters,
 ## and whose value at a key is an array of subscripts into fsmentries.
 ##  i is a subscript for a key provided that the fsmentries[i]['in'] = 
 ##  first character of key
 states={}
 ientry=0
 for fsmentry in fsmentries:
  inval = fsmentry['in']
  #print "inval=",inval
  # special logic for deva_slp1 for <in></in> <out>a</out>,
  # where inval is empty string
  if (len(inval)>0):
   c = inval[0] # first character of inval
  else:
   c = inval # empty string
  if (c in states):
   state=states[c]
   state.append(ientry)
   states[c]=state
  else :
   state = []
   state.append(ientry)
   states[c]=state
  ientry += 1 
 
 fsm['states']=states
 transcoder_fsmarr[fromto]=fsm
 #debug
 if (False):
  filedbg = "deva-slp1-py.txt"
  fdbg = codecs.open(filedbg,"w","utf-8")
  fdbg.write("fsmentries=...\n")
  keys = ['starts','in','regex','out','next','inraw','outraw']
  for i in xrange(0,len(fsmentries)):
   fsmentry = fsmentries[i]
   s = []
   #for key in fsmentry:
   for key in keys:
    if key not in fsmentry: # regex
     continue
    val = fsmentry[key]
    if key == 'starts':
     val = ' '.join(val)
    s.append("%s => %s" %(key,val))
   sout = ' , '.join(s)
   out = "fsmentry[%s]=%s" %(i,sout)
   #print out.encode('utf-8')
   fdbg.write("%s\n" % out)
  #print "states=..."
  fdbg.write("states=...\n")
  for c in states:
   state = states[c]
   y = []
   for i in state:
    y.append('%s' % i)
   x = ' '.join(y)
   out = "c=%s, state=%s" %(c,x)
   #print out.encode('utf-8')
   fdbg.write("%s\n" % out)
  fdbg.close()
def to_unicode(x):
 # x is assumed to be a string with one of two forms
 # (a) \uxxxx\uyyyy  this is interpreted as unicode
 # (b) other -  this is returned without change
 if (x == r"\u"):  # a case where notation is confusing
  return x
 match = re.match('\\\\u',x)
 if match:
  y = re.split('\\\\u',x)
  ans=''
  for z in y:
   if (z == ''):
    continue
   z1 = z
   z2 = ''
   if (len(z) > 4):
    z1 = z[:4]
    z2 = z[4:]
   zint= int(z1,16)
   zuni = unichr(zint)
   ans += zuni
   ans += z2
  return ans
 else:
  return x

vowel_signs = ['\u094d','\u093e','\u093f','\u0940','\u0941','\u0942','\u0943','\u0944','\u0962','\u0963','\u0947','\u0948','\u094b','\u094c']
vowel_signs_unicode=[]
for vowel_sign in vowel_signs:
 vowel_sign1 = to_unicode(vowel_sign)
 vowel_signs_unicode.append(vowel_sign1)

def transcoder_processString(line,from1,to) :
 global transcoder_dir,transcoder_fsmarr
 if (from1 == to) :
  return line
 fromto = from1 + "_" + to
 if (fromto in transcoder_fsmarr):
  fsm = transcoder_fsmarr[fromto]
 else:
  transcoder_fsm(from1,to)
  if (fromto in transcoder_fsmarr):
   fsm = transcoder_fsmarr[fromto]
  else:
   return line
 currentState=fsm['start']
 fsmentries = fsm['fsm']
 states = fsm['states']
 n=0 ## current character position in line
 result='' ## returned value
 m=len(line)
 while (n < m) :
  c = line[n] # character at position n
  if (c not in states):
   result += c
   currentState=fsm['start']
   n += 1
   continue
  isubs = states[c]  
  best=""
  nbest=0
  bestFE = None
  for isub in isubs :
   fsmentry=fsmentries[isub]
   startStates=fsmentry['starts']
   k=-1
   nstartStates=len(startStates)
   j=0
   while (j < nstartStates):
    if (startStates[j] == currentState) :
     k=j
     j=nstartStates
    j += 1
   if (k == -1) :continue
   match = transcoder_processString_match(line,n,m,fsmentry)
   nmatch=len(match)
   ##   echo "chk2: n=n, c='c', nmatch=nmatch<br>\n"
   #out = "chk2: n=%s, c='%s', nmatch=%s" %(n,c,nmatch)
   #print out.encode('utf-8')
   if (nmatch > nbest) :
    best = match
    nbest=nmatch
    bestFE=fsmentry
   
  if (bestFE) :
   result += bestFE['out']
   n += nbest
   currentState=bestFE['next']
  else :
   ## Default condition. emit the character and change state to start
   result += c
   currentState=fsm['start']
   n += 1
  
 return result

def transcoder_processString_match(line,n,m,fsmentry) :
  match="" ## value returned
  edge = fsmentry['in']
  nedge=len(edge)
  j=n
  k=0
  b=True
  while ( (j < m) and (k < nedge) and b) :
   if(line[j] == edge[k]) :
    j += 1
    k += 1
   else :
    b=False
  if (not b) : 
   return match
  if (k != nedge)  : 
   return match
  match=edge
  if (not 'regex' in fsmentry):
   return match
  
  ##  additional logic when fsmentry['regex'] is DEVA or TAMIL
  ##  see discussion of 'regex' in transcoder_fsm
  ##  This logic only works with slp1_deva xml file.
  ##  Also, it ignores the use of '/^\' as vowel accents.
  nmatch=len(match)
  n1=n+nmatch
  if (n1 == m) :
   return match 
  d = line[n1]
  #if (fsmentry['regex'] == 'deva') :
  if (fsmentry['regex'] == 'slp1_deva') :
   #test = re.match('[^aAiIuUfFxXeEoO^\/\\\\]',d)
   test = re.match(r'[^aAiIuUfFxXeEoO^\/\\\\]',d)
   if (test) :
    return match
   return ""
  
  if (fsmentry['regex'] == 'tamil') :
   test = re.match('[^aAiIuUeEoO]',d)
   if (test):
    return match
   return ""
  
  if (fsmentry['regex'] == 'deva_slp1'):
   for vowel_sign1 in vowel_signs_unicode:
    vowel_sign1_len = len(vowel_sign1)
    found=True
    for j in xrange(0,vowel_sign1_len):
     k = n1 + j
     if k >= m:
      found=False
      continue
     if vowel_sign1[j] != line[k]:
      found = False
      continue
     if found:
      # the consonant is followed by $vowel_sign.
      # return empty string to indicate rule failure.
      # This program logic cannot distinguish between 
      # a mismatch, and an empty string.
      # In particular, we don't handle virama properly otherwise,
      # so we do this special test to correct the problem
      #    if ($j == 0) {return $match;}  # case of virama
      return "" # case of a vowel sign
     # the consonant is not followed by either virama or a vowel sign. 
   return match  # fell through for vowel_sign1
  return ""
def transcoder_processElements(line,from1,to,tagname):
 global transcoder_from,transcoder_to
 transcoder_from = from1
 transcoder_to = to
 ## Assume parts of line to be converted are marked in an xml way.
 ## For example, if tagname = 'SA':
 ##  and line = 'The word <SA>rAma</SA> refers to a person',
 ## returned would be 'The word XXX refers to a person',
 ## where XXX is the transformation of the the string 'rAma' acc. to from,to

 ## ans = preg_replace("/<tagname>(.*?)<\/tagname>/e",
 ##         "transcoder_processString('\\1','from','to')",line)
 #regex = str.format('<{0}>(.*?)</{0}>',tagname)
 regex = '<%s>(.*?)</%s>'%(tagname,tagname)
 ans = re.sub(regex,transcoder_processElements_callback,line)
 return ans

def transcoder_processElements_callback(match) :
 global transcoder_from,transcoder_to
 return transcoder_processString(match.group(1),transcoder_from,transcoder_to)
def transcoder_set_dir(dir) :
 ## may return FALSE if string dir is improper in some way
 global transcoder_dir
 path = os.path.abspath(dir)
 if os.path.exists(path):
  transcoder_dir = path
 return transcoder_dir

def transcoder_get_dir() :
 global transcoder_dir
 return transcoder_dir
