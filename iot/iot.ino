#include <Encoder.h>
#include <Adafruit_NeoPixel.h>
#include <ESP8266WiFi.h>

Adafruit_NeoPixel ledPixel = Adafruit_NeoPixel(2,13,NEO_GRBW + NEO_KHZ800);
Encoder drehEncoder(14, 12);

const char* ssid = "IHRE SSID";
const char* password = "WLAN-KEY";
const char* host = "IP DES SERVERS";
const int httpPort = 8080;

//Durch einmalige Zeichenkette aus 5 Zeichen ersetzen.
const char* key = "ABCDE";

void setup() {
  Serial.begin(9600);
  ledPixel.begin();

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  while (WiFi.status() !=
  WL_CONNECTED) {
  delay(500);
  }

  //Rechter Pixel blinkt grün, WLAN verbunden
  ledPixel.setPixelColor(0,10,204,81);
  ledPixel.show();
  delay(2000);
  ledPixel.setPixelColor(0,0,0,0);
  ledPixel.show();

  ledPixel.show(); 
  ledPixel.setPixelColor(1,0,0,0);
  ledPixel.setPixelColor(0,0,0,0);
  ledPixel.show();
}

long baseAntwort  = 0;
int Antwort = 0;

void loop() {
  long newPosition = drehEncoder.read();

  //Auf Pin 2 liegt der Button
  if (digitalRead(2)==LOW && Antwort >0){
  
    WiFiClient client;
    if (!client.connect(host, httpPort)) {
      Serial.println("connection failed");
      ledPixel.setPixelColor(0,219,15,15);
      ledPixel.show();
      delay(2000);
      ledPixel.setPixelColor(0,0,0,0);
      ledPixel.show();
      return;
    }
    
    String url = "/vote.php?key=";
    url += key;
    url += "&value=";
    url += Antwort;


  //Rechter Pixel blinkt grün
  ledPixel.setPixelColor(0,10,204,81);
  ledPixel.show();
  delay(2000);
  ledPixel.setPixelColor(0,0,0,0);
  ledPixel.show();
  
    
    client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" + 
                 "Connection: close\r\n\r\n");
    unsigned long timeout = millis();
    while (client.available() == 0) {
      if (millis() - timeout > 5000) {
        Serial.println(">>> Client Timeout !");
        client.stop();
        return;
      }
    }

  }
  
  if(newPosition == baseAntwort+4){
    if(Antwort<5){
    Antwort++;
    baseAntwort = newPosition;
    Serial.println(newPosition);
    }else{
       baseAntwort = newPosition;
    }
  }
  
  if(newPosition == baseAntwort-4){
    if(Antwort>1){
     Antwort--;
     baseAntwort = newPosition;
     Serial.println(newPosition);
    }else{
       baseAntwort = newPosition;
    }
  }

   if(Antwort == 0){
      ledPixel.setPixelColor(1,0,0,0);
   }
    
   if(Antwort == 1){
      ledPixel.setPixelColor(1,219,15,15);
   }
   
   if(Antwort == 2){
     ledPixel.setPixelColor(1,10,204,81);
   }

   if(Antwort == 3){ 
    ledPixel.setPixelColor(1,255,15,191);
   } 

   if(Antwort == 4){ 
    ledPixel.setPixelColor(1,255,154,22);
   }

   if(Antwort == 5){ 
    ledPixel.setPixelColor(1,22,95,255);
   } 
   ledPixel.show();
}
