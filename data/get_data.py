# uses the back4app car data to get a json list of cars make, model, and year
# will pull the make, model, year and generate the rest of the data

import json
import urllib
import requests

# create usl with proper request headers
url = 'https://parseapi.back4app.com/classes/Car_Model_List?limit=1000'
headers = {
    'X-Parse-Application-Id': 'hlhoNKjOvEhqzcVAJ1lxjicJLZNVv36GdbboZj3Z',
    'X-Parse-Master-Key': 'SNMJJF0CZZhTPhLDIqGhTlUNV9r60M2Z5spyWfXW'
}

# load json data into variable
data = json.loads(requests.get(url, headers=headers).content.decode('utf-8'))

# print (or use > filename to write to file)
print(json.dumps(data, indent=2))
