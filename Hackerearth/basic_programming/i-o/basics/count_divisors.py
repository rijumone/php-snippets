# stdin = raw_input()
# stdin = "1 10 1"
# stdin = "4 12 3"
stdin = "567 943 3"

tempList = stdin.split(" ")

# print(tempList)

l = int(tempList[0])
r = int(tempList[1])
k = int(tempList[2])

# print(l)
# print(r)
# print(k)

beginDivisor = l/k
endDivisor = r/k

beginMultiple = beginDivisor*k
endMultiple = endDivisor*k

count = endDivisor - beginDivisor

if beginMultiple == l or endMultiple == r : # both inclusive
	count = count + 1



# print(beginDivisor)
# print(endDivisor)
# print(beginMultiple)
# print(endMultiple)
# print(count)

# print((r/k)-(l/k))

# stdout = 6 9 12
# 1 4