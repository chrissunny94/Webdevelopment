
#include "DHT.h"
#include "ArduinoJson.h"



int LedLighting = 3 , LedLightingstate = 0 ; // the pin that the green LED is attached to
int Fan = 4 , Fanstate = 0; // the pin that the red LED is attached to
int WaterPump = 5 , WaterPumpstate = 0;
String jsonString;

char incomingByte;      // a variable to read incoming serial data into



//#define DHTPIN 7     // what digital pin we're connected to
//#define DHTTYPE DHT22
//DHT dht(DHTPIN, DHTTYPE,6);
DHT dht;
char temp[10];
char humi[10];

void setup()
{
   
Serial.begin(9600); // initialize serial communication
 
pinMode(LedLighting, OUTPUT);  // initialize the green LED pin as an output
pinMode(Fan, OUTPUT);  // initialize the red LED pin as an output
pinMode(WaterPump, OUTPUT);
dht.setup(7);
 }
 void loop() {
   
   // see if there's incoming serial data:
   if (Serial.available() > 0) {
     
     incomingByte = Serial.read(); // read the oldest byte in the serial buffer
//Preform the code to switch on or off the leds
    if (incomingByte == '0') {
 
    digitalWrite(LedLighting, HIGH); //If the serial data is 0 turn red LED on
delay(100);

}
   if (incomingByte == '1') {
   digitalWrite(LedLighting, LOW); //If the serial data is 1 turn red LED off
 
 }
 
     if (incomingByte == '2') {
    digitalWrite(Fan, HIGH); //If the serial data is 2 turn green LED on

}
   if (incomingByte == '3') {
   digitalWrite(Fan, LOW); //If the serial data is 3 turn green LED off
 
 }
 
 if (incomingByte == '4') {
   digitalWrite(WaterPump, LOW); //If the serial data is 3 turn green LED off
 
 }
 
 if (incomingByte == '5') {
   digitalWrite(WaterPump, HIGH); //If the serial data is 3 turn green LED off
 
 }
 
 
   }
   
   
          jsonString ="{\"LedLighting\":\"";
          jsonString +=LedLightingstate;
          jsonString +="\",\"Fan\":\"";
          jsonString +=Fanstate;
          jsonString +="\",\"WaterPump\":\"";
          jsonString +=WaterPumpstate;
          jsonString +="\",\"Sensor1\":\"";
          jsonString +=analogRead(A0);
          jsonString +="\",\"Sensor2\":\"";
          jsonString +=analogRead(A1);
          jsonString +="\",\"Sensor3\":\"";
          jsonString +=analogRead(A2);
          jsonString +="\",\"Sensor4\":\"";
          jsonString +=analogRead(A3);
          jsonString +="\",\"Sensor5\":\"";
          jsonString +=analogRead(A4);
          jsonString +="\",\"Temp\":\"";
          dtostrf(dht.getTemperature(),1,2,temp);
          jsonString +=temp;
          jsonString +="\",\"Humidity\"";
          dtostrf(dht.getHumidity(),1,2,humi);
          jsonString +=humi;
          jsonString +="\"}";
          Serial.println(jsonString);
   
   
 }
