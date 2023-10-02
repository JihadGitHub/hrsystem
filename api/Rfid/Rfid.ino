#include <SPI.h>
#include <MFRC522.h>
#include <ESP8266WiFi.h> // เพิ่มไลบรารี WiFi สำหรับ ESP8266

#define RST_PIN  D1
#define SS_PIN  D2

MFRC522 mfrc522(SS_PIN, RST_PIN);

String rfid_in = "";
const char *ssid = "Socha_2.4GHz"; // ชื่อ Wi-Fi
const char *password = "0959810604";    // รหัส Wi-Fi

void setup() {
  Serial.begin(9600);
  SPI.begin();
  mfrc522.PCD_Init();
  Serial.println("");
  WiFi.begin(ssid, password); // เชื่อมต่อ Wi-Fi
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
}

void loop() {
  if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
    rfid_in = rfid_read();
    Serial.println(">>>> " + rfid_in);
    delay(1000);
    sendGETRequest(rfid_in); 
  }
  delay(1);
}

String rfid_read() {
  String content = "";
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? "0":""));
    content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  content.toUpperCase();
  return content.substring(1);
}

void sendGETRequest(String key) {
  String serverAddress = "192.168.1.84"; // Replace with your server address
  String url = "http://" + serverAddress + "/leavesystem/api/sent.php"; // Replace with the correct URL for your database

  // Create a WiFiClient object to establish a connection with the server
  WiFiClient client;

  // Connect to the server
  if (client.connect(serverAddress.c_str(), 80)) {
    // Create the GET request URL with the sensor data
    String requestUrl = url + "?key=" + String(key);

    // Send the HTTP GET request
    Serial.println(requestUrl);
    client.print("GET " + requestUrl + " HTTP/1.1\r\n" +
                 "Host: " + serverAddress + "\r\n" +
                 "Connection: close\r\n\r\n");

    // Wait for the server's response
    while (client.connected()) {
      if (client.available()) {
        char c = client.read();
        Serial.print(c); // Print the response to the Serial Monitor
      }
    }

    // Disconnect from the server
    client.stop();
  } else {
    Serial.println("Failed to connect to server");
  }
}