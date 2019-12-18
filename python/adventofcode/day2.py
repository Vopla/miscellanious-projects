input = open('day2input.txt', 'r')
result = []

OPCODE_END = 99
OPCODE_ADD = 1
OPCODE_MULTIPLY = 2

result = [int(x) for x in input.readline().split(',')]
    
    

def parser(operand: int, variable: int, code):

    listing = code.copy()
    current_position = 0
    listing[1] = operand
    listing[2] = variable

    while listing[current_position] != OPCODE_END:
        if listing[current_position] == OPCODE_ADD:
            listing[listing[current_position + 3]] = listing[listing[current_position + 1]] + listing[listing[current_position + 2]]
        elif listing[current_position] == OPCODE_MULTIPLY:
            listing[listing[current_position + 3]] = listing[listing[current_position + 1]] * listing[listing[current_position + 2]]
        current_position += 4

print(parser(12, 2, result))
    
"""  
        var1 = 0
        var2 = 0
        temp_result = 0
        if index == 0 or index % 4 == 0:
            if i == 1:
                var1 = index + 1
                var2 = index + 1
                temp_result = var1 + var2
                index + 3 = temp_result
                print(temp_result)
                
            
            elif i == 2:
                var1 = index + 1
                var2 = index + 2
                temp_result = var1 * var2
                result[i+3] = temp_result
                print(temp_result)

            elif i == 99:
                StopIteration
index += index + 4
"""


        




