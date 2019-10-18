#from Quake source code

def GreatestCommonDivisor(i1, i2):

    if i1 > i2:
        if i2 == 0:
            return i1
        return GreatestCommonDivisor(i2, i1 % i2)
    
    else:
        if (i1 == 0):
            return i2
        return GreatestCommonDivisor(i1, i2 % i1)


v1 = int(input("Variable 1: "))
v2 = int(input("Variable 2: "))

result = GreatestCommonDivisor(v1, v2)

print(str(result))

