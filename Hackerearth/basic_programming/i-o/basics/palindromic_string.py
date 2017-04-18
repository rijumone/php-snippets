string = raw_input()
# print(string[2])
ctr = 0
flag = True
for k in range(0, len(string)):
	# print(string[ctr])
	# print(string[(len(string)-1)-ctr])
	if string[ctr]!=string[(len(string)-1)-ctr]:
		flag = False
		break
	ctr = ctr + 1

if flag:
	print("YES")
else:
	print("NO")