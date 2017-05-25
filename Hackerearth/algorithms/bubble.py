# bubble basic

uList = [5,8,4,1,9]

print uList

for i in range(0,len(uList)):
	for j in range(0,len(uList)-i-1):
		if(uList[j] > uList[j+1]):
			temp = uList[j]
			uList[j] = uList[j+1]
			uList[j+1] = temp



print uList