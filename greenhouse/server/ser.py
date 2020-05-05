import simplejson as json
import serial

ser = serial.Serial(
    port='/dev/ttyACM0',\
    baudrate=115200,\
    parity=serial.PARITY_NONE,\
    stopbits=serial.STOPBITS_ONE,\
    bytesize=serial.EIGHTBITS,\
        timeout=0)

print("connected to: " + ser.portstr)
count=1
ser.write("S")
output = ""
while True:
    for line in ser.readline():
	#print line
	output=output+str(line)
	if (line == '\n'):
		print count
		#output = output.replace("[","'")
		#output =output.replace("]","'")
		print output
		
		data_string = json.dumps(output)
		print 'ENCODED:', data_string

		decoded = json.loads(data_string)
		print 'DECODED:', decoded
		break;
	count = count+1
ser.close()
