import arduinoserial

arduino = arduinoserial.SerialPort('/dev/ttyACM0', 115200)
arduino.write('S\n')

print arduino.read_until('\n')
