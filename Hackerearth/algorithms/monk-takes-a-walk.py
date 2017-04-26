# 2
# nBBZLaosnm
# JHkIsnZtTL

T = int(raw_input())

vowelsList = ["A","E","I","O","U","a","e","i","o","u"]

for m in range(0,T):
	string = raw_input()
	
	ctr = 0
	for k in string:
		if k in vowelsList:
			ctr = ctr + 1
	print(ctr)		