#include <dht.h> 
#include <SoftwareSerial.h> 
dht DHT; 
#define DHT11_PIN 4

float humi; //Stores humidity value 
float temp; //Stores temperature value 
SoftwareSerial mySerial(3,2); 
//RX,TX 
String ssid = "420";
String PASSWORD = "05081020";
String host = "192.168.0.15";

  //와이파이 접속
    void connectWifi(){
    String join ="AT+CWJAP=\""+ssid+"\",\""+PASSWORD+"\""; 
   Serial.println("Connect Wifi..."); 
   mySerial.println(join); 
   delay(10000); 
   
    if(mySerial.find("OK")) {
    Serial.print("WIFI connect\n");
    }else {
      Serial.println("connect timeout\n"); 
      } 
      delay(1000);
      } 

      
      void httpclient(String char_input){ 
        delay(100); 
        Serial.println("connect TCP...");
        mySerial.println("AT+CIPSTART=\"TCP\",\""+host+"\",80");
        delay(500); 
        
        if(Serial.find("ERROR")) 
        return; 
        
        Serial.println("Send data...");
        String url=char_input; 
        String cmd="GET http://192.168.0.15/wifi_temp_SQL/Conn.php?temp="+url+" HTTP/1.0\r\n\r\n"; //2줄의 줄넘김 포함

        Serial.print("AT+CIPSEND="); 
        Serial.println(cmd.length()+10);  //cmd.length()
        
        mySerial.print("AT+CIPSEND="); 
        mySerial.println(cmd.length()+10); //cmd.length()
        delay(1000);
     
        //AT+CIPSEND = 길이 출력 후 타임아웃이 되어지는데 원인을 모름 
        
        if(mySerial.find(">")) { 
          Serial.print(">"); 
          }
//          else { 
//          mySerial.println("AT+CIPCLOSE");
//          Serial.println("connect timeout"); 
//          return; 
//          }
          delay(500);
          mySerial.println(cmd); //주소 입력
          delay(100);
          
          if(Serial.find("ERROR"))
          return; 
          mySerial.println("AT+CIPCLOSE");
          delay(100);
          } 
          
          void setup() { 
            Serial.begin(9600); 
            mySerial.begin(9600); 
            connectWifi(); 
            delay(500);
            }

          //온습도 측정            
            void loop() {
              DHT.read11(DHT11_PIN); 
              temp = DHT.temperature;

              String str_output = String(temp); 
              delay(1000); 
              httpclient(str_output); //url로 이어짐
              delay(1000); //Serial.find("+IPD");
              
              while (mySerial.available()) { 
                char response = mySerial.read();
                Serial.write(response); 
                if(response=='\r') 
                Serial.print('\n');
                } 
                Serial.println("\n==================================\n");
                delay(2000); 
               }


//#include <SoftwareSerial.h> 
//#define BT_RXD 3 
//#define BT_TXD 2 
//SoftwareSerial ESP_wifi(BT_RXD, BT_TXD); 
//void setup() { 
//Serial.begin(9600); 
//ESP_wifi.begin(9600); 
//ESP_wifi.setTimeout(5000); 
//delay(1000); 
//} 
//void loop() { 
//if (Serial.available()){
// ESP_wifi.write(Serial.read()); 
//} 
//if (ESP_wifi.available()) { 
//Serial.write(ESP_wifi.read()); 
//}
//      }
