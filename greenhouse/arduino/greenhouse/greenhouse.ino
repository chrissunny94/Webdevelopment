
int LedLighting = 3 , LedLightingstate = 0 ; // the pin that the green LED is attached to
int Fan = 4 , Fanstate = 0; // the pin that the red LED is attached to
int WaterPump = 5 , WaterPumpstate = 0;


char incomingByte;      // a variable to read incoming serial data into


int toggle(int i, int state){
  if
}


void setup()
{
   
Serial.begin(115200); // initialize serial communication
 
pinMode(LedLighting, OUTPUT);  // initialize the green LED pin as an output
pinMode(Fan, OUTPUT);  // initialize the red LED pin as an output
pinMode(WaterPump, OUTPUT);
 }
 void loop() {
   digitalWrite(relay, HIGH);
   // see if there's incoming serial data:
   if (Serial.available() > 0) {
     
     incomingByte = Serial.read(); // read the oldest byte in the serial buffer
//Preform the code to switch on or off the leds
    if (incomingByte == '0') {
 
    digitalWrite(LedLighting, HIGH); //If the serial data is 0 turn red LED on
delay(100);
Serial.println("0");
}
   if (incomingByte == '1') {
   digitalWrite(LedLighting, LOW); //If the serial data is 1 turn red LED off
 Serial.println("1");
 }
 
     if (incomingByte == '2') {
    digitalWrite(Fan, HIGH); //If the serial data is 2 turn green LED on
Serial.println("2");
}
   if (incomingByte == '3') {
   digitalWrite(Fan, LOW); //If the serial data is 3 turn green LED off
 Serial.println("3");
 }
 
 if (incomingByte == '4') {
   digitalWrite(WaterPump, LOW); //If the serial data is 3 turn green LED off
 Serial.println("4");
 }
 
 if (incomingByte == '5') {
   digitalWrite(WaterPump, HIGH); //If the serial data is 3 turn green LED off
 Serial.println("5");
 }
 
 
   }
   
   else
   {digitalWrite(3,HIGH);
     digitalWrite(4,HIGH);
     digitalWrite(WaterPump,HIGH);
   
   }
 }
