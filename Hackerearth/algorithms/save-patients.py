# 5
# 123 146 454 542 456
# 100 328 248 689 200

n = int(raw_input())

vaccineListS = str(raw_input())

vaccineListS = vaccineListS.split(" ")

# print vaccineListS

vaccineList = []
for a in range(0,len(vaccineListS)):
	vaccineList.append(int(vaccineListS[a]))
	
patientsListS = str(raw_input())

patientsListS = patientsListS.split(" ")

# print patientsList

patientsList = []
for a in range(0,len(patientsListS)):
	patientsList.append(int(patientsListS[a]))


# vaccineList = [123, 146, 454, 542, 456]

# patientsList = [100, 328, 248, 689, 200]

def bSort(lst):
	for i in range(0,len(lst)-1):
		for k in range(0,len(lst)-i-1):
			if(lst[k]>lst[k+1]):
				temp = lst[k]
				lst[k] = lst[k+1]
				lst[k+1] = temp

	return lst


sVaccineList = bSort(vaccineList)
sPatientsList = bSort(patientsList)

saveFlag = True

for j in range(0,n):
	if(sVaccineList[j] < sPatientsList[j]):
		saveFlag = False
		break


if(saveFlag):
	print "Yes"
else:
	print "No"