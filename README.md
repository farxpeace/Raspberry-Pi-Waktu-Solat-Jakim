# Raspberry-Pi-Waktu-Solat-Jakim
Memainkan azan melalui Raspberry Pi mengikut Waktu Solat Jakim secara offline

#### Update dan Upgrade system
```
sudo apt-get update
```
```
sudo apt-get upgrade -y
```
#### Install Apache2
```
sudo apt-get install apache2 -y
```
```
sudo a2enmod rewrite
```
```
sudo service apache2 restart
```

#### Install PHP
```
sudo apt-get install php libapache2-mod-php -y
```

#### Install MySQL (MariaDB)
```
sudo apt install mariadb-server php-mysql -y
```
```
sudo service apache2 restart
```

#### Find Pi IP Address
```
ifconfig
```

#### Test open using another machine
```
http://192.168.50.160/
```
You should see message similar like this
![config](https://i.imgur.com/Wk1Kl5y.png)

#### Download Code and put under /var/www/html/
```
cd /var/www/html/
```
```
wget -c https://api.github.com/repos/farxpeace/Raspberry-Pi-Waktu-Solat-Jakim/tarball -O - | tar -xz
```

#### Import Database

#### Install Supervisor

/etc/supervisor/conf.d/prayer_time.conf
```
[program:prayer_time]
command=curl -s http://localhost/index.php/supervisor/check_and_run_adhan/ > /d$
directory=/var/www/html/application/logs/prayer_time
autostart=true
autorestart=true
startretries=5
user=pi
numprocs=1
startsecs=0
process_name=%(program_name)s_%(process_num)02d
stderr_logfile=/var/www/html/application/logs/prayer_time/%(program_name)s_stde$
stderr_logfile_maxbytes=2MB
stdout_logfile=/var/www/html/application/logs/prayer_time/%(program_name)s_stdo$
stdout_logfile_maxbytes=2MB
```





#### Open using another PC / Laptop / Handphone on SAME network



#### ADVANCE - LED Status
Install GPIO Library
```
sudo apt-get install python-rpi.gpio
```

Add user www-data to group gpio
```
sudo adduser www-data gpio
```

Give permission 0775 to /var/www/html/application/third_party/python/
and all files inside it.
Restart apache in order to user www-data take effect
```
sudo service apache2 restart
```



[Reference link](http://www.heidislab.com/tutorials/installing-php-7-1-on-raspbian-stretch-raspberry-pi-zero-w)
[php 7.2](https://getgrav.org/blog/raspberrypi-nginx-php7-dev)

[pi official](https://www.raspberrypi.org/documentation/remote-access/web-server/apache.md)

### SSH into Rasp




### Update packages
``` linux
sudo apt-get update && sudo apt-get upgrade
```

#### Install Apache
```
sudo apt install apache2 -y
```

#### Install PHP
```
$ sudo apt install php libapache2-mod-php -y
```

#### Pull code from Github or download zip and extract
#### Clone from github
```
cd ../../var/www/html
```
```
git clone https://github.com/farxpeace/Raspberry-Pi-Waktu-Solat-Jakim.git
```
#### Download and extract
```
sudo wget https://github.com/farxpeace/Raspberry-Pi-Waktu-Solat-Jakim/archive/main.zip
```
Extract zip file. Its gonna took around 15 minutes because of loading of prayer times database.
```
sudo unzip main.zip
```
![Extracting](https://i.imgur.com/y7ouKqm.png)


Move content to working directory
```
shopt -s dotglob
```
```
sudo mv -v /var/www/html/Raspberry-Pi-Waktu-Solat-Jakim-main/* /var/www/html/
```

Remove index.html (default created by Apache)
```
sudo rm index.html
```

#### Configuration
Edit base_url on config.php . Change it to your local ip address.
```
 sudo nano application/config/config.php
```
![config](https://i.imgur.com/29aKN36.png)

Make databases writable
```
sudo chmod -R 0775 /var/www/html/application/third_party/SleekDB/databases
```
and make media folder writable
```
sudo chmod -R 0775 /var/www/html/assets/media
```

Increase max_execution_time to 90
Increase upload_max_filesize to 20MB
Increase post_max_size to 21MB
Optional if you get permission error. Add www-data user to root group.
```
sudo adduser www-data root
```
Finally dont forget to restart apache
```
sudo service apache2 restart
```


