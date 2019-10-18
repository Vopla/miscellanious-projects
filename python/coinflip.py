import random

heads = 0
tails = 0

previous_flip = 0



number_of_trials = 20

for i in range(number_of_trials):
    
    coin = random.randint(1,2)

    
    if coin == 1:
        heads += 1
        
        if previous_flip == coin:
            previous_flip = 1


    elif coin == 2:
        tails += 1

        if previous_flip == coin:
            previous_flip = 2

    print(str(coin))

print("Amount of heads: " + str(heads))

print("Amount of tails: " + str(tails))