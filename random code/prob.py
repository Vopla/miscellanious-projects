import random
import os

def killcount(droprate, kerrat, tiedostoPolku):
    enemies_killed = 0
    items_amount = 0
    total_killcount = 0

    while items_amount < kerrat:

        luku = random.randint(1,droprate)
        luku_2 = random.randint(1,droprate)

        enemies_killed = enemies_killed + 1

        if luku_2 == luku:
            print("Drop received! The amount of kills required was " + str(enemies_killed) + "\n")
            tiedostoPolku.write("Drop rate: 1/"+ str(droprate) + " Enemies slain: " + str(enemies_killed) + "\n")
            items_amount = items_amount + 1
            total_killcount += enemies_killed
            enemies_killed = 0
            
    print("Total kill count: " + str(total_killcount) + "\n")

def read_lines(line_path):
    try:
        os.path.exists(str(line_path))

        isEmpty = line_path.read(1)

        if not isEmpty:
            print("No previous results yet.")

        if isEmpty:
            print("\nPrevious results:\n")
            line_path.seek(0)

        for line in line_path:
            print(line)
    
    except IOError:
        print("Unable to locate the drops.txt. Please restart the program to see the results.")

    except:
        print("Something went wrong.")

    line_path.close()    
    program_start()
    
    #else:
     #   pass   
        #print("Unable to read the drops.txt. It is either corrupted, empty or unreadable.")

def program_start():
    try:
        tiedostoPolku = open('drops.txt','r+')        

    except IOError:
        print("Drops.txt does not exist. Creating a drops.txt file into the program folder.")
        tiedostoPolku = open('drops.txt','w')
        tiedostoPolku = open('drops.txt', 'r+')

    while True:
        try:
            kills  = int(input("The amount of enemies slain (0 = Doesn't matter): "))
            droprate = int(input("Insert drop rate 1 / x (0 = exit): "))
            
            if droprate == 0:
                quitter(tiedostoPolku)
            
            if droprate > 50000:
                print("Please input an integer smaller than 50000!")
                program_start()

            kerrat = int(input("How many drops would you like to receive? (0 = exit): "))

            if kerrat == 0:
                quitter(tiedostoPolku)
            
            if kerrat > 50000:
                print("Please input an integer smaller than 50000!")
            

        except ValueError:
            print("Please use an integer!")
            program_start()

        else:
            if kills > 0:
                drop_chance(droprate, kills,tiedostoPolku)
            
            if kills > 50000:
                print("Please input a smaller integer.")
                program_start()

            if kills <= 0:
                print("Disregarding kill amount.")

        killcount(droprate, kerrat, tiedostoPolku)

        valinta = str(input("Would you like to see previous results? (Y/N)"))
        valinta = valinta.upper()

        if valinta == "Y":
            read_lines(tiedostoPolku)

        if valinta != "Y":
            quitter(tiedostoPolku)
            
def drop_chance(droprate, kills, tiedostoPolku):
    drop_chance = (1-(1-1/droprate)**kills)
    percentage = round(drop_chance * 100, 5)
    tiedostoPolku.write("Drop chance: " + str(kills) + "/" + str(droprate) + " = " + str(percentage) + "% \n")
    print("\nDrop chance with " + str(kills) + " kills is: " + str(percentage) + "%\n")


def quitter(tiedostoPolku):
    tiedostoPolku.close()
    exit(0)

if __name__ == '__main__':
    program_start()