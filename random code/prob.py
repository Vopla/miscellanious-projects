import random
import os

try:
    tiedostoPolku = open('drops.txt','r+')

except IOError:
    print("Tiedostoa ei ole.")
    tiedostoPolku = open('drops.txt','w')

def killcount(droprate, kerrat):
    enemies_killed = 0
    items_amount = 0
    total_killcount = 0

    while items_amount < kerrat:

        luku = random.randint(1,droprate)
        luku_2 = random.randint(1,droprate)

        enemies_killed = enemies_killed + 1

        if luku_2 == luku:
            print("\nSait dropin! Vihollisia piti tappaa " + str(enemies_killed) + " kappaletta")
            tiedostoPolku.write("Drop rate: 1/"+ str(droprate) + " Vihollisten lukumäärä: " + str(enemies_killed) + "\n")
            items_amount = items_amount + 1
            total_killcount += enemies_killed
            enemies_killed = 0
            
    print("Killcount yhteensä: " + str(total_killcount) + "\n")

    valinta = str(input("Haluatko nähdä aikaisemmat tulokset? (Y/N)"))
    valinta = valinta.upper()

    if valinta == "Y":

        read_lines(tiedostoPolku)

    if valinta == "N":
        tiedostoPolku.close()
        exit(0)

    else:
        tiedostoPolku.close()
        exit(0)

def read_lines(line_path):
    isEmpty = line_path.read(1)

    if isEmpty:
        print("\nAikaisempia lukumääriä:\n")
        line_path.seek(0)
        
        for line in line_path:
            
            print(line)

    else:   
        print("Ensimmäinen käyttökerta!")      

if __name__ == '__main__':
    while True:
        try:
            droprate = int(input("Syötä droprate (0 = exit): "))
            
            if droprate == 0:
                tiedostoPolku.close()
                exit(0)
            
            kerrat = int(input("Montako droppia haluat saada: "))

        except ValueError:
            print("Syötä kokonaisluku!")
            break

        else:
            killcount(droprate,kerrat)