# stdin = "1 2 3 4 5 6 7 8 9"
stdin = raw_input()
inputList = stdin.split(" ")
# print(inputList)

# temp = []
# arr = []

# for k,v in enumerate(inputList):
# 	temp.append(int(v))
# 	# print("------------")
# 	# print(temp)
# 	# print(k)
# 	# print(v)
# 	# print("------------")
# 	if  not ( (k+1) % 3 ):

# 		arr.append(temp)
# 		temp = []
		
		
# 		# print(k)


# print(arr)

sum1,sum2 = 0,0

for m,n in enumerate(inputList):
	if not m % 2:
		sum1 = sum1 + int(n)
	else :
		sum2 = sum2 + int(n)



print(sum1)
print(sum2)

# 0 1 2		0	0+0 0+1 0+2		0 1 2
# 3 4 5		1	1+2 1+3 1+4		0 1 2
# 6 7 8		2	2+4 2+5 2+6		0 1 2