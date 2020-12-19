first_number = 1
previous_number = first_number
sum_of_numbers = 0
result = 0

cap = 4000000


while result <= cap:
     result = first_number + previous_number
     if result % 2 == 0:
        sum_of_numbers += result
     previous_number = first_number
     first_number = result

print(sum_of_numbers)