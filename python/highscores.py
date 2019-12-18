import csv
import requests
import urllib
import json

player_name = input("Enter a player name ")

player_name = urllib.parse.quote(player_name)

result = dict()

skills = [
            "Overall",
            "Attack",
            "Defence",
            "Strength",
            "Hitpoints",
            "Ranged",
            "Prayer",
            "Magic",
            "Cooking",
            "Woodcutting",
            "Fletching",
            "Fishing",
            "Firemaking",
            "Crafting",
            "Smithing",
            "Mining",
            "Herblore",
            "Agility",
            "Thieving",
            "Slayer",
            "Farming",
            "Runecraft",
            "Hunter",
            "Construction"]

url = 'https://secure.runescape.com/m=hiscore_oldschool/index_lite.ws?player=' + player_name

response = requests.get(url)
print(response.status_code)

if response.status_code == '404':
    raise Exception("Check your player name.")
    
else:
    response = response.text.split('\n')

    for i, skill in enumerate(skills):
        line = response[i].split(',')
        result[skill] = {
            "rank" : int(line[0]),
            "level" : int(line[1]),
            "xp" : int(line[2])
        }
    
    player_name = urllib.parse.unquote(player_name)

    filename = player_name.capitalize() + ".json"

    with open(filename, "w") as f:
        json.dump(result, f, indent=4)
        print(f"Saved the result into a file named {filename}")
        f.close()