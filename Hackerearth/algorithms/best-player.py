from pprint import pprint

# 3 2
# surbhi 3
# surpanakha 3
# shreya 5

N = 3
T = 2

# for k in range(0,N):

rawList = [
			{'name':'surbhi','fq':3},
			{'name':'shreya','fq':5},
			{'name':'surpanakha','fq':3},
			{'name':'srilanka','fq':2},
		]


print rawList

for k in range(0,len(rawList)-1):
	for j in range(0,len(rawList)-1-k):
		if(rawList[j]['fq'] > rawList[j+1]['fq']):
			temp = rawList[j]
			rawList[j] = rawList[j+1]
			rawList[j+1] = temp


print rawList

equalFqList = []

# ctr = 0
temp = []
for k in range(0,len(rawList)):
	# print 'k'
	# print k
	# print rawList[k]
	if(k != 0 and rawList[k-1]['fq']!=rawList[k]['fq']):
		# ctr = ctr +1
		print 'guilty'
		equalFqList.append(temp)
		temp = []
		temp.append(rawList[k])
		equalFqList.append(temp)
	else:
		temp.append(rawList[k])
		print("temp")
		print(temp)
		
	# print ctr	
	# if(not bool(equalFqList[ctr])):
	# 	equalFqList[ctr] = []
	# equalFqList[ctr].append(rawList[k])


pprint(equalFqList)