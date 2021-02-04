import RPi.GPIO as GPIO
import time


GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(14,GPIO.OUT)

while True: # Run forever
 GPIO.output(14, GPIO.HIGH) # Turn on
 time.sleep(0.2) # Sleep for 1 second
 GPIO.output(14, GPIO.LOW) # Turn off
 time.sleep(0.2) # Sleep for 1 second
