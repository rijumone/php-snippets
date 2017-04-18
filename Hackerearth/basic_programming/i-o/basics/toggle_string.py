caseDict = {
	'a' : 'A',
	'b' : 'B',
	'c' : 'C',
	'd' : 'D',
	'e' : 'E',
	'f' : 'F',
	'g' : 'G',
	'h' : 'H',
	'i' : 'I',
	'j' : 'J',
	'k' : 'K',
	'l' : 'L',
	'm' : 'M',
	'n' : 'N',
	'o' : 'O',
	'p' : 'P',
	'q' : 'Q',
	'r' : 'R',
	's' : 'S',
	't' : 'T',
	'u' : 'U',
	'v' : 'V',
	'w' : 'W',
	'x' : 'X',
	'y' : 'Y',
	'z' : 'Z',
}

caseDictRev = {}

for key,value in caseDict.iteritems():
	caseDictRev[value]=key

caseDict.update(caseDictRev)

# print(caseDict)

string = raw_input()

returnString = ""

for k in string:
	returnString += caseDict[k]

print(returnString)