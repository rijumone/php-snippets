evalConst = (10^9)+7
# print(evalConst)
listLen = int(raw_input())
string = raw_input()
stringList = string.split(" ")
product = 1
# print(stringList)
# for k in string:

	
for k in stringList:
	product = (int(k)*product) % evalConst

print(product)