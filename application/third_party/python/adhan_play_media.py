import RPi.GPIO as GPIO
import time
import sys
import os
import getpass


media_path = sys.argv[1]

print getpass.getuser()

print "Media path : " + media_path

#play media
from playsound import playsound
playsound(media_path)