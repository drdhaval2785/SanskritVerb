# -*- coding: utf-8 -*-
"""Ensure that all the sutra numbers used are in sutrainfo.json."""
# import json
import re
import json


def findUsedSutras():
    """Check for the used sutras in panini.php and function.php."""
    usedSutras = []
    prog = re.compile("storedata\(\'([^']*)\'")
    with open('../panini.php', 'r') as fin:
        for line in fin:
            m = prog.search(line)
            if m:
                usedSutras.append(m.group(1))
    with open('function.php', 'r') as fin:
        for line in fin:
            m = prog.search(line)
            if m:
                usedSutras.append(m.group(1))
    # print len(usedSutras)
    return usedSutras

def sutraInfo():
    """Return keys of sutrainfo.json."""
    data = json.load(open('../Data/sutrainfo.json', 'r'))
    return data.keys()


print("Missing items in sutrainfo.json")
print(set(findUsedSutras()) - set(sutraInfo()))
