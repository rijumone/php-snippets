t = int(raw_input())

# number = str(number)

for k in range(0,t):
	number = int(raw_input())
	# number = 32015
	if not number % 21:
		print("The streak is broken!")
	else:
		number = str(number)
		printKrnaH = False
		# print(len(number))
		for l in range(0,(len(number)-1)):
			if number[l] == "2" and number[l+1] == "1":
				# print(number[l])
				# print(number[l+1])
				printKrnaH = False
				print("The streak is broken!")
			else:
				printKrnaH = True
		if printKrnaH:
			print("The streak lives still in our heart!")