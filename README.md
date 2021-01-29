# Raspberry-Pi-Waktu-Solat-Jakim
Memainkan azan melalui Raspberry Pi mengikut Waktu Solat Jakim secara offline

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


