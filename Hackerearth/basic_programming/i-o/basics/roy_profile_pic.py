# l = 180
l = int(raw_input())
# n = 3
n = int(raw_input())

# sizesList = [[640,480],[120,300],[180,180]]
sizesList = []

for x in range(0,n) :
	sizesList.append(raw_input().split(" "))

# print(sizesList)

for key, value in enumerate(sizesList):
	for k1, v1 in enumerate(sizesList[key]) :
		sizesList[key][k1] = int(sizesList[key][k1])
# deleteList = []
# ctr = -1

# for img in sizesList :
# 	ctr = ctr + 1		
# 	for dimension in img :
# 		if l > dimension :		# first check whether either dimension is smaller
# 			deleteList.append(ctr)
# 			print("UPLOAD ANOTHER")
# 		# else :
# 			# deleteList.append(img)
# 	# print(ctr)
	

# print(deleteList)
# for deleteItem in deleteList :
# 	del sizesList[deleteItem]

# print(sizesList)

for img in sizesList :
	if l > img[0] or l > img[1] : # small image by at least one dimension
		print("UPLOAD ANOTHER")
	else :
		if img[0] == img[1] : # image already square
			print("ACCEPTED")
		else :
			print("CROP IT")