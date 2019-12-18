#by /u/SomeCynicalBastard on Reddit

from itertools import product

# Define operations
OP_ADD = 1
OP_MUL = 2
OP_STI = 3
OP_OUTP = 4 
OP_END = 99

# function to compute intcode
def run_intcode (noun: int, verb: int, parameter: int, data):
    # Use a copy so as not to change the original data
    codes = data.copy()
    codes[1] = noun
    codes[2] = verb
    pos = 0
    posamt = 0


    while codes[pos] != OP_END:
        if codes[pos] == OP_ADD:
            codes[codes[pos + 3]] = codes[codes[pos + 1]] + codes[codes[pos + 2]]
            posamt = 4
        elif codes[pos] == OP_MUL:
            codes[codes[pos + 3]] = codes[codes[pos + 1]] * codes[codes[pos + 2]]
            posamt = 4
        elif codes[pos] == OP_STI:
            value = input("Please insert an integer")
            codes[codes[pos + 1]] = value
            posamt = 2
        elif codes[pos] == OP_OUTP:
            readvalue = codes[codes[pos + 1]]
            print(readvalue)
            posamt = 2
        pos += posamt
    return codes[0]

with open("day2input.txt") as f:
    # All data is on the first line
    data = [int(x) for x in f.readline().split(',')]

print("Day 02")

# Part 1
print(f"1. {run_intcode(12, 2, parameter, data)}")

# Part 2
for noun, verb in product(range(0, 100), range(0, 100)):
    if run_intcode(noun, verb, data) == 19690720:
        print(f"2. {100 * noun + verb}")
        break

if __name__ == '__main__':
    instruction = input("Please input an instruction from 1-4")
    run_intcode(12,2,instruction,data)    