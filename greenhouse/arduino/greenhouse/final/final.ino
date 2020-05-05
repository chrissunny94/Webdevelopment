
int LedLighting = 3 , LedLightingstate = 0 ; // the pin that the green LED is attached to
int Fan = 4 , Fanstate = 0; // the pin that the red LED is attached to
int WaterPump = 5 , WaterPumpstate = 0;


String jsonString;



int current ;





void setup()
{
   
Serial.begin(9600); // initialize serial communication
 
pinMode(LedLighting, OUTPUT);  // initialize the green LED pin as an output
pinMode(Fan, OUTPUT);  // initialize the red LED pin as an output
pinMode(WaterPump, OUTPUT);
 }
 
 
 
 
 
void loop() {
    String incomingBytes = "LIGHTOUT";      // a variable to read incoming serial data into   
    char incomingByte;
    int count=0;
   // see if there's incoming serial data:
   if (Serial.available() > 0) {
     
     
     while(Serial.read()!='\n' || ++count < 12){
      incomingByte = Serial.read(); // read the oldest byte in the serial buffer
     incomingBytes.concat(incomingByte);
     }
     
      //Preform the code to switch on or off the leds
        
        
        if (incomingBytes.c_str() == "LedLightOFF") {
            digitalWrite(LedLighting, HIGH); //If the serial data is 0 turn red LED on
            LedLightingstate=0;
            
          }
        if (incomingBytes.c_str() == "LedLightON") {
            digitalWrite(LedLighting, LOW); //If the serial data is 1 turn red LED off
            LedLightingstate=1;
            
          }
 
        if (incomingBytes.c_str() == "FanOFF") {
          digitalWrite(Fan, HIGH); //If the serial data is 2 turn green LED on
          Fanstate=0;
          
          }
        if (incomingBytes.c_str() == "FanON") {
          digitalWrite(Fan, LOW); //If the serial data is 3 turn green LED off
          Fanstate = 1;
          
          }
 
        if (incomingBytes.c_str() == "WaterPumpOFF") {
          digitalWrite(WaterPump, LOW); //If the serial data is 3 turn green LED off
          WaterPumpstate =1; 
          
          }
 
        if (incomingBytes.c_str() == "WaterPumpON") {
          digitalWrite(WaterPump, HIGH); //If the serial data is 3 turn green LED off
          WaterPumpstate =1;
          
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
          jsonString +="\"}";
          Serial.println(jsonString);
   
   
 }
 
 
 
/*int toggle(String name, int state){
  
  if("LedLighting" == name.c_str()){
    current=LedLighting;
  }
  else 
  if("Fan" == name.c_str()){
    current=Fan;
  }
  else 
  if("WaterPump" == name.c_str()){
    current=WaterPump;
  }

  
  
} */
 
 
 
 

