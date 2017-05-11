"""
4
1 20 3
1 40 4
2 5 5
1 100 100

"""

N = int(raw_input())

mainList = {}																				

for n in range(0,N):
	temp = raw_input().split(" ")
	
	mainList[int(temp[2])] = {int(temp[1]) , int(temp[2])}


print(mainList)