import math

result = 0.0
fuelFuel = 0.0
moduleFuel = 0.0

input = open('day1input.txt', 'r')

for line in input:
    temp = math.floor(float(line) / 3) - 2
    
    result += temp

    while temp > 0:
        temp = math.floor(float(temp) / 3 ) - 2
        if temp > 0:
            result += temp
        else:
            continue
    

print(int(result))
    