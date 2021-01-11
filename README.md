# Vehicle-Sales-Portal 
This web portal serves as a sample car sales portal. It is built off of HTML and PHP, and uses MySQL to store data. Python programs are contained in the data folder that generate sample data for the database.

## Structure of Source Code
The source code has a very simple structure. All front-facing pages that are
accessible by clicking on links shown on the  pages are on the main directory.
This includes files such as index.html, and any files you can access from there.
There are a number of folders within the source directory that contain code for  
specific purposes. Those directories and their purposes are as follows:

### css
This folder contains all css files. These files are used for styling the error
messages and tables.

### data
This folder contains all of the code and data related to the vehicles. This
includes python scripts for pulling vehicle data from a source on the internet,
generating the missing information (VIN, price, mileage), and writing that
information to a .txt file.

### javascript
This file would contain any relevant javascript code for the project. I have not yet implemented any JS, but I hope to soon. 

### php
This folder contains php code that is strictly for backend handling purposes.
This code is responsible for actions such as verifying user information or
backing up the database tables. None of this code is accessible via a link on the site, it is all called from other pages (ex. on click of a submit button).

### sql
This folder contains all of the  sql statements developed for the project.

### table_backups
This folder contains all of the database backup files in JSON format. It is where the files
get written to when new ones are generated at the admin's request.
