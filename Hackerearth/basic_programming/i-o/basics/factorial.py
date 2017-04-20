def factorial(k):
	if k == 1 :
		return 1
	else : 
		return (k*factorial(k-1))

n = int(raw_input())

print(factorial(n))	