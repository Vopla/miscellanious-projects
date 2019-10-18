def drop_chance(droprate, kills):

    drop_chance = 1-(1-(1/droprate)**kills)
    return drop_chance

droprate = input("1")

kills = input("2")

drop_chance(droprate, kills)

print("test" + drop_chance)