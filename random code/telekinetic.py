def Telekinetic(points_required):

    pojot = 0
    mazet = 0
    total_mazes = 0

    while pojot <= points_required:

        pojot = pojot + 2
        mazet += 1
        total_mazes += 1
        if mazet == 5:

            pojot += 2 + 8
            mazet = 0
            total_mazes += 1

    print("Mazeja vaaditaan " + str(total_mazes) + ".")
    Aloitus()


def Alchemy(points_required):

    coins_per_point = 100
    
    total_coins = points_required * coins_per_point

    total_casts = round(total_coins / 30)

    print("Tarvitset noin " + str(total_casts) + " Nature runea.")
    
    Aloitus()

def Graveyard(points_required):

    print("Tarvitset noin " + str(points_required) + " Nature runea Bones to Bananasilla tai "+ str(points_required * 2) + 
            " Nature runea Bones to Peachesilla.")
    Aloitus()


def Enchantment(points_required):
    try:
        spell = int(input("Minkä tason spelliä käytät? 1-9 "))
        spells_required = 0

        if spell not in range(0,10):
            print("Syötä luku väliltä 1-9!")
            exit(0)    

    except ValueError:
        print("Syötä kokonaisluku!")

    i = 0
    while i < points_required:

        i += spell
        spells_required += 1

        if i % 10 == 0:
            i += spell * 2
            spells_required +=1

    print("Tarvitset noin "+ str(spells_required) + " Cosmic runea")
    Aloitus()

def Aloitus():   
    try:

        points = int(input("Montako pistettä tarvitset? "))

        if points == 0:
            print("Suljetaan ohjelma.")
            exit(0)

        activity = int(input("Mikä aktiviteetti?\n"
                "1: Telekinetic Theatre\n"
                "2: Alchemist's Playground\n"
                "3: Creature Graveyard\n"
                "4: Enchanting Chamber\n"
                "0: Lopeta\n"))

    except ValueError:
        print("Syötä kokonaisluku")
        exit(0)
        

    while activity >= 0 and activity < 5:

        if activity == 0:
            print("Suljetaan ohjelma.")
            exit(0)

        if activity == 1:
            Telekinetic(points)
            break

        elif activity == 2:
            Alchemy(points)
            break
        
        elif activity == 3:
            Graveyard(points)
            break

        elif activity == 4:
            Enchantment(points)
            break
            
if __name__ == '__main__':
    Aloitus()
    