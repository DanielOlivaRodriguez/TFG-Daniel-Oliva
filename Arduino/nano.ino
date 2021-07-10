// Este código obtiene la temperatura y los valores de aceleración y velocidad desde el Arduino Nano IOT 33

// Librería del circuito amplificador de temperatura
#include <Adafruit_MAX31865.h>
// Librería del sensor IMU
#include <Arduino_LSM6DS3.h>

// Configuración del circuito amplificador
// Use software SPI: CS, DI, DO, CLK
Adafruit_MAX31865 thermo = Adafruit_MAX31865(8, 9, 10, 11);
// use hardware SPI, just pass in the CS pin
//Adafruit_MAX31865 thermo = Adafruit_MAX31865(10);

// Resistencia de referencia. PT100 = 430 ; PT1000 = 4300
#define RREF      4300.0
// Resistencia nominal a 0ºC. PT100 = 100 ; PT1000 = 1000
#define RNOMINAL  1000.0

// Se definen las variables del IMU
float aX, aY, aZ; // Aceleración (g)
float gX, gY, gZ; // Velocidad angular (º/s)
float maxG; // Máxima fuerza G sufrida
float aT; // Aceleración total
// Variables auxiliares para calcular el máximo
float maxGAux1;
float maxGAux2;

//Variables del sensor de temperatura
float ratio;
float resistencia;
float temp;

//Variable para el intercambio de datos con la raspberry
String cad;

// ID del dispositivo
#define dispositivo_id  1

void setup() {
  // Inicialización del puerto serie
  Serial.begin(115200);
  // Se definen el número de cables del sensor de temperatura
  thermo.begin(MAX31865_2WIRE);  // MAX31865_2WIRE = 2 cables ; MAX31865_3WIRE = 3 cables ; MAX31865_3WIRE = 3 cables
  // Inicialización del IMU
  if (!IMU.begin()) {
    while (true);
  } 
}

void loop() {
  
  // TEMPERATURA
  // La siguiente parte de código calcula el ratio y la resistencia del sensor de temperatura
  // Se comenta porque no lo necesitamos
  /*  
      uint16_t rtd = thermo.readRTD();
      // Se calcula el ratio
      ratio = rtd;
      ratio /= 32768;
      //Se calcula la resistencia
      resistencia = RREF*ratio;
  */
  // Se calcula la temperatura
  temp = thermo.temperature(RNOMINAL, RREF);
  temp = temp + 1.5;
      
  // Se hacen las mediciones del IMU
  IMU.readAcceleration(aX, aY, aZ);
  IMU.readGyroscope(gX, gY, gZ);

  // Se calcula la aceleración total
  aT = sqrt(pow(aX,2)+pow(aY,2)+pow(aZ,2));

  // Se calcula la máxima fuerza G que mide el sensor
  maxG = max(maxG,aT);          // Máximo de aT y el valor anterior de maxG

  // Se define la cadena para el intercambio de datos
  cad = "#1:" + String(temp)+ "#2:" + String(aX)+ "#3:" + String(aY)+ "#4:" + String(aZ)+ "#5:" + String(gX)+ "#6:" + String(gY)+ "#7:" + String(gZ)+ "#8:" + String(maxG)+ "#9:" + String(dispositivo_id)+ "@";
    
  // Se imrpime la cadena por el puerto serie
  Serial.println(cad);
  delay(500);
}
