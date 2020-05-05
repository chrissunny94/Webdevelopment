GreenHouse IOT server
======================

##Status webpage for Raspberry Pi##

![Raspberry Pi Heartbeat](http://i.imgur.com/nEqeHF6.png "Latest version screenshot:")

###Prerequisites###
You will have to check a few things for this page to show up correctly. You need to have:

* lsb-release (for non Raspbian distributions) - so the automated installer script can find your distribution name.
* Webserver (apache \ lighttpd \ ..) with PHP


#####Optional (./install.sh will install them for you):
* Sqlite for PHP `$ sudo apt-get install php5-sqlite`
* PHP Safe Mode = off
* vstat installed `$ sudo apt-get install vnstat`

First 3 are more or less general and common. 







###Contents of the package & Installation###

As for now: 8-9 files

* config.php - Where you can configure all the settings (folder path, verbosity and future options)
* index.php - Home page which shows the graphs and info.
* style.css - Styles for the fashion!
* rpiTemp.db - SQLite db file. With some test data.
* measuretemp.php - php script for cron job.
* cleanDB.php - script to clean the DB from sampling data and forbid future accidental deletions using a lock file.
* db.lck - lock file used by cleanDB.php to flag the clean operation as done and forbid future database cleanups. If you do want to reset the database, then delete db.lck first.
* funs.php - extras for Ajax and live measurements

**To set it up:**

1. Download a zip from [this page] (http://githuh.com/chrissunny94/greenhouse) and unzip to a desired web folder (i.e. /var/www/)
2. Open config.php and update `$config["root_dir"]` the with directory you put it in. For example, if you put it into /var/www/rpih/: `$config["root_dir"]="/var/www/rpih/"`
3. Check and install if needed the prerequisites (see above)  OR 
4. Run `$ sudo ./install.sh` - this will try to install all missing prerequisites, initialize the database with the first temperature sample and update the crontab with the periodical temperature sampling. Default is a sample every 5 minutes. This can later be changed in `$ sudo crontab -e`

$ sudo crontab -e` and add a line at the end of the file: 
`*/5 * * * * php /path/measuretemp.php` - /path/ is the place where you've
unziped the package! This will run measuretemp.php every 5 minutes. If you want
it to happen less often, change 5 to a higher number of minutes (*/10 for every
10 minutes, */35 for every 35 minutes and so on).

The database can be cleaned using cleanDB.php, which will also produce a lock
file to avoid future  accidental deletions. Delete the lock file (`db.lck`) first if you
really want to clean the database.



Access the webpage with the web browser and start collecting statistics!:)
1)Control the different actuators connected to an Arduino(Serial communication)
2)Live view of the sensor data
3)Live view of the plant & image processing results





And of course come back for updated versions!

###Authors and Contributors###
First version by: @ChrisThaliyath

###Support or Contact###
If you have any questions \ suggestions \ feedbacks: ct409@snu.edu.in - we hope you send us a note!:)

Please feel free to fork and improve!
