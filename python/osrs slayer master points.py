#Calculates the amount of slayer points you get while using a certain Slayer master in Oldschool Runescape
#based on your current slayer task streak and the amount of tasks you complete
#TODO:
#
#Players often use a higher level Slayer master on 10th, 50th and so on task,
#so implementing that is the next step.


masters =  {"master1" : {
                "name" : "turael",
                "points" : 0},
        
            "master2" : {
                "name" : "krystilia",
                "points" : 25},

            "master3" : {
                "name" : "mazchna",
                "points" : 2},

            "master4": {
                "name" : "chaeldar",    
                "points" : 10},
            
            "master5": {
                "name" : "konar",
                "points" : 18},
            
            "master6": {
                "name" : "nieve",
                "points" : 12},

            "master7": {
                "name" : "durael",
                "points" : 15}
            }


taskCount = 0

print("Available slayer masters: ")

for i in masters:
    name = masters[i]["name"]
    name = name.capitalize()
    print(name)

currentSlayerMaster = input("Enter your current slayer master. ")


for i in masters:

    if currentSlayerMaster.lower() == masters[i]["name"]:
        
        points = 0
        masterName = masters[i]["name"]

        try:
            amountOfTasks = input("How many tasks would you want to complete? ")
            amountOfTasks = int(amountOfTasks)

        except ValueError:
            print("Please input an integer.")
            quit()

        taskCount = amountOfTasks

        try:
            currentStreak = input("Input your current task streak. ")
            currentStreak = int(currentStreak)

        except ValueError:
            print("Please input an integer.")
            quit()

        while amountOfTasks > 0:
            currentStreak += 1
            amountOfTasks -= 1

            if currentStreak < 5:
                points += 0
                continue

            elif currentStreak % 1000 == 0:
                points += masters[i]["points"]*50
                continue

            elif currentStreak % 250 == 0:
                points += masters[i]["points"]*35
                continue

            elif currentStreak % 100 == 0:
                points += masters[i]["points"]*25
                continue

            elif currentStreak % 50 == 0:
                points += masters[i]["points"]*15

                continue

            elif currentStreak % 10 == 0:
                points += masters[i]["points"]*5
                continue
            
            else:
                points += masters[i]["points"]

        print(f"You would gain {points} points in {taskCount} tasks using {masterName.capitalize()}. ")
        print(f"Your task streak would be {currentStreak} after that.")
        break

else:
    print("Unknown slayer master!")
    quit()


                
         