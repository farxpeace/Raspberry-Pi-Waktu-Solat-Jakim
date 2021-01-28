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
wget https://github.com/farxpeace/Raspberry-Pi-Waktu-Solat-Jakim/archive/1.tar.gz
```


