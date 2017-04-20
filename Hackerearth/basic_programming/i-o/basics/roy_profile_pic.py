l = 180
n = 3
sizesList = [[640,480],[120,300],[180,180]]

workingList = []
ctr = 0

for img in sizesList :
	for dimension in img :
		if l > dimension :		# first check whether either dimension is smaller
			workingList.append(img)
			print("UPLOAD ANOTHER")
		# else :
			# workingList.append(img)
	ctr = ctr + 1		

print(workingList)