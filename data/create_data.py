# gets the make, model, and year then generates the rest of the data
# needs to generate: price, mileage, VIN, and color

import json
import random
import string

# generates a random VIN number to assign each vehicle
def getVIN():
	retString = "1"
	for i in range(0, 4):
		retString += random.choice(string.ascii_uppercase)
	retString += str(random.randrange(10))
	retString += str(random.randrange(10))
	for i in range(0, 4):
		retString += random.choice(string.ascii_uppercase)
	for i in range(0,6):
		retString += str(random.randrange(10))
	return retString

colors = ["Red", "Blue", "White", "Black", "Yellow", "Magenta",
"Lavendar", "Silver", "Grey", "Green", "Orange", "Brown"]

# open file with json string
inFile = open("vehicles.json")

# load json data into variable
data = json.load(inFile)

# iterate through data, pull make, model, year, generate rest
# then create string and write to output file
for i in data["results"]:
	outString = ""
	# generate VIN
	outString += getVIN()
	outString += "\t"
	outString += colors[random.randrange(12)]
	outString += "\t"
	outString += i["Make"]
	outString += "\t"
	outString += i["Model"]
	outString += "\t"
	outString += str(random.randrange(400000))
	outString += "\t"
	outString += str(random.randrange(1980, 2021))
	outString += "\t"
	outString += str(random.randrange(5000, 100000))
	print(outString)

inFile.close()
