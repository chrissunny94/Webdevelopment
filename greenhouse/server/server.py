#!/usr/bin/env python
#-*- coding:utf-8 -*-
from socket import *
import serial
arduino = serial.Serial('/dev/ttyACM0', 115200)
host = "localhost"
port = 21567
buf = 1024
addr = (host,port)
ArduinoServer = socket(AF_INET,SOCK_DGRAM)
ArduinoServer.bind(addr)
arduino.write("S")
while True:
	data,addr = ArduinoServer.recvfrom(buf)
	print data
	arduino.write(data)
	ReadLine = arduino.readline()
	print "Sonuç : "  + ReadLine
	ArduinoServer.sendto(ReadLine,addr)
ArduinoServer.close()
