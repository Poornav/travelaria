Traveleria 

Traveleria is a free travel website featuring travel guides for locations worldwide. The basic idea behind the project is to extract travel related data from different websites and display it in user friendly format. Users enter their query by selecting a place, information or data about the place is extracted from various websites and is displayed. The project uses CSS, HTML and JAVASCRIPT for front end to accept queries from user. Jsoup, which is a java library for web scraping, is used to extract data from various websites. PHP is used for server side scripting which acts an intermediate between users and webservers. Mysql database is used for caching. The website provides best part of  best websites so the data is reliable.  Different websites like Wikipedia, VirtualTourist, TripAdvisor, LonelyPlanet, theBestTimeToGo are used to extract data. It provides the most important information needed to a traveler about a place  like  the best time to go, customs duty, scams, local language, trending events, local emergency numbers etc.. It also  provides basic information like description , images, local customs, local transport, weather , shopping places, places in and around etc..

The basic idea behind the code:

1.	To take queries from a user such as country, city and date.

2.	Look for the data associated with the query in the cache.

3.	If data exists, display the data.

4.	Else, use the query to extract information from various websites.

5.	 Display the information and store the information in database (if  it doesn’t exist) for caching. 


Hardware requirements :

The code requires a system which has the following requirements:

1. A minimum of 2GB RAM.

2. A minimum of 1Ghz processor.


Software requirements :

The code requires a system with the following software requirements:

1. Apache server - apache2

2. Jsoup - Version 1.8.1 

3. mysql - php5-mysql

4. PHP - php5

5. web browser - Internet Explorer 11 and above or Firefox or chrome

6. jdk - Version 1.7 and above


INSTALLATION : 

PROCEDURE TO  INSTALL AND CONFIGURE LAMP SERVER

LAMP stack is a group of open source software used to get web servers up and running. The acronym stands for Linux, Apache, MySQL, and PHP(LAMP)

STEP 1.on LINUX Machine 

sudo apt-get update


STEP 2. sudo apt-get install apache2

OPEN BROWSER http://localhost

You will get this
It works!

This is the default web page for this server.

The web server software is running but no content has been added, yet.

This indicates apache is successfully running on machine

STEP 3.Install MySQL

sudo apt-get install mysql-server libapache2-mod-auth-mysql php5-mysql


During the installation, MySQL will ask you to set a root password. If 
you miss the chance to set the password while the program is installing,
 it is very easy to set the password later from within the MySQL shell.

sudo mysql_install_db

Finish up by running the MySQL set up script:

sudo /usr/bin/mysql_secure_installation


The prompt will ask you for your current root password.

Type it in.

Enter current password for root (enter for none): 
OK, successfully used password, moving on...

Type it in. 

Enter current password for root (enter for none): 
OK, successfully used password, moving on...

Then the prompt will ask you if you want to change the root password. Go ahead and choose N and move on to the next steps. 




It’s easiest just to say Yes to all the options. At the end, MySQL will reload and implement the new changes. 
By default, a MySQL installation has an anonymous user, allowing anyone
to log into MySQL without having to have a user account created for
them.  This is intended only for testing, and to make the installation
go a bit smoother.  You should remove them before moving into a
production environment.

Remove anonymous users? [Y/n] y                                            
 ... Success!

Normally, root should only be allowed to connect from 'localhost'.  This
ensures that someone cannot guess at the root password from the network.

Disallow root login remotely? [Y/n] y
... Success!

By default, MySQL comes with a database named 'test' that anyone can
access.  This is also intended only for testing, and should be removed
before moving into a production environment.

Remove test database and access to it? [Y/n] y
 - Dropping test database...
 ... Success!
 - Removing privileges on test database...
 ... Success!

Reloading the privilege tables will ensure that all changes made so far
will take effect immediately.

Reload privilege tables now? [Y/n] y
 ... Success!

Cleaning up...

Once you're done with that you can finish up by installing PHP.



step 4:Install PHP
PHP is an open source web scripting language that is widely use to build dynamic webpages.

To install PHP, open terminal and type in this command. sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt
After you answer yes to the prompt twice, PHP will install itself.

It may also be useful to add php to the directory index, to serve the relevant php index files: sudo nano /etc/apache2/mods-enabled/dir.conf
Add index.php to the beginning of index files. The page should now look like this: <IfModule mod_dir.c> DirectoryIndex index.php index.html index.cgi index.pl index.php index.xhtml index.htm </IfModule>
PHP Modules
PHP also has a variety of useful libraries and modules that you can add onto your virtual server. You can see the libraries that are available. apt-cache search php5-
Terminal will then display the list of possible modules. The beginning looks like this: php5-cgi - server-side, HTML-embedded scripting language (CGI binary) php5-cli - command-line interpreter for the php5 scripting language php5-common - Common files for packages built from the php5 source php5-curl - CURL module for php5 php5-dbg - Debug symbols for PHP5 php5-dev - Files for PHP5 module development php5-gd - GD module for php5 php5-gmp - GMP module for php5 php5-ldap - LDAP module for php5 php5-mysql - MySQL module for php5 php5-odbc - ODBC module for php5 php5-pgsql - PostgreSQL module for php5 php5-pspell - pspell module for php5 php5-recode - recode module for php5 php5-snmp - SNMP module for php5 php5-sqlite - SQLite module for php5 php5-tidy - tidy module for php5 php5-xmlrpc - XML-RPC module for php5 php5-xsl - XSL module for php5 php5-adodb - Extension optimising the ADOdb database abstraction library php5-auth-pam - A PHP5 extension for PAM authentication [...] Once you decide to install the module, type: sudo apt-get install name of the module
You can install multiple libraries at once by separating the name of each module with a space.

Congratulations! You now have LAMP stack on your droplet!

Step 5—RESULTS: See PHP on your Server
Although LAMP is installed, we can still take a look and see the components online by creating a quick php info page

To set this up, first create a new file: sudo nano /var/www/info.php
Add in the following line: <?php phpinfo(); ?>
Then Save and Exit.

Restart apache so that all of the changes take effect: sudo service apache2 restart

 sudo vim /etc/hosts

verify 127.0.0.1       localhost

save file and restart apache
sudo service apache2 restart

go to browser and type http://localhost

It works!

This is the default web page for this server.

The web server software is running but no content has been added, yet.

This indicates apache is successfully running on machine


RESOURCES:

https://www.digitalocean.com/community/articles/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu

https://help.ubuntu.com/community/phpMyAdmin


To install JDK:

Installing Java with apt-get is easy. First, update the package index:

sudo apt-get update

Then, check if Java is not already installed:

java -version

If it returns "The program java can be found in the following packages", Java hasn't been installed yet, so execute the following command:

sudo apt-get install default-jre

This will install the Java Runtime Environment (JRE). If you instead need the Java Development Kit (JDK), which is usually needed to compile Java applications (for example Apache Ant, Apache Maven, Eclipse and IntelliJ IDEA execute the following command:

sudo apt-get install default-jdk