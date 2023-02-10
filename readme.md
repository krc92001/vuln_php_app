<span style="color:Red"><font size=6.5><h><b> !!WARNING THIS WEBPAGE IS VULNERABLE!!</font></span>

# Changes

Added annoyance counter measures:

- index.php is now a captcha with a 5 sec rate limiter
- admin.php is a honeypot exposed admin page that blocks the ip address of the user that trys to reset an account (just adds  ip to a database, will have to be configured with ufw script and cron job separately)
- functional login, currently users have to be added through mysql db "user_data"


# How to Setup - Clippy PHPIDS w/ minor XSS blocking

## Prerequisites 

```
sudo apt update && sudo apt install apache2 && sudo apt install php
```

--------------------------------------------------------------------------------------------------
I've already setup the config files with the proper paths, if you'd like to edit it:

```
/var/lib/IDS/Config/Config.ini.php
```

There is also a backup file so you can just restore to it via cp


## Put the folders/ files in the following folders

- [ ] /IDS -> /var/lib
- [ ] /vendor -> /var
- [ ] idsstub.php,index.php, your-server-side-script.php -> /var/www/html/

Now everything should be in the proper place!

### Make /tmp writable for file logging

```sudo chown +R www-data:www-data /var/lib/IDS/tmp```

### Change to  PHP version 7.4

```

sudo apt update
sudo apt-add-repository ppa:ondrej/php -y
sudo apt install php7.4

```
### Make apache2 use php 7.4

```
php  -v 
that will show your current version (probably 8.1)

sudo a2dismod php8.2
sudo a2enmod php7.4
sudo systemctl restart apache2

```


