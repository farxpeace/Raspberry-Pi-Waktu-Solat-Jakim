import RPi.GPIO as GPIO
import time
import os
import signal
import subprocess

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(14,GPIO.OUT)
print "LED ON - Finish adhan"
GPIO.output(14,GPIO.LOW)



def get_pid():
    return int(subprocess.check_output(['pgrep', '-f', 'adhan_playing_media_led_on.py']).strip())

    
os.system("pkill -f adhan_playing_media_led_on.py")