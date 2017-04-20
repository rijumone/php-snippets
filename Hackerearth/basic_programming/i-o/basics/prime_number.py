# def isPrime(number):
# 	print("***"+str(number)+"***")
# 	current = 2
# 	keepGoing = True
# 	returnVal = False
# 	while keepGoing :
# 		# print(current)
# 		# print(current*current)
# 		if (current*current) > number :
# 			print("false statment reached")
# 			keepGoing = False
# 		else :
# 			# print("keepGoing")
# 			# print(keepGoing)
# 			if number % current :
# 				print("===========")
# 				# print(number)
# 				print(current)
# 				print(number % current)
# 				print("===========")
# 				returnVal = True
# 				# return True
# 				# break
# 		# else :
# 		# 	return False
# 		current = current + 1
# 	return returnVal

def isPrimeval(number):
	ctr = 1
	for n in range(2,number):
		ctr = ctr + 1
		# print(ctr)
		if (number % ctr) == 0 :
			return False
	return True


# print(isPrimeval(5))
# print(isPrimeval(7))
# print(isPrimeval(13))
# print(isPrimeval(25))

n = int(raw_input())
primeList = []

for n2 in range(2,n) :
	if isPrimeval(n2) :
		primeList.append(n2)

printwhat = ""

for primeN in primeList :
	printwhat += str(primeN) + " "

print(printwhat)	