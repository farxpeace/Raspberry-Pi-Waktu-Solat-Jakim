<?php
 
$i = 0;
$file = fopen('/var/www/html/hello-world/hello.log', 'w');
 
while (1) {
    fwrite($file, $i.' - Hello @ '.date('H:i:s').PHP_EOL);
    sleep(2);
 
    $i++;
}