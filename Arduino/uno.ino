// Este código obtiene los valores de pulso y oxígeno en sangre junto con el electrocardiograma desde el Arduino UNO

// SENSOR DE PULSO Y OXIMETRÍA
#include <Wire.h>
#include "MAX30100_PulseOximeter.h"
#define REPORTING_PERIOD_MS     10
PulseOximeter pox;
 
// DECLARACIÓN DE VARIABLES
float ppm; //Variable en la que se almacenan las pulsaciones por minuto
int spO2; //Variable en la que se almacena la saturación de oxígeno
int ecg; //Variable en la que se almacena el electrocardiograma
String cad; // Cadena para el intercambio de datos con la raspberry

// ID del dispositivo
#define dispositivo_id  1

void setup() {
  
  // Inicializamos el puerto serie
  Serial.begin(2000000);

  //Iniciamos el pulsioximetro
  if (!pox.begin()) {
        //Serial.println("FAILED");
        for(;;);
    } else {
        //Serial.println("SUCCESS");
    }

  // Inicializamos los pines del ECG
  pinMode(6, INPUT); // Setup for leads off detection LO +
  pinMode(7, INPUT); // Setup for leads off detection LO -
}

void loop() {
    // Actualizamos el pulsioxímetro
    pox.update(); 
    
    // Obtenemos los valores de pulsaciones y saturación de O2 en sangre
    ppm = pox.getHeartRate();
    spO2 = pox.getSpO2();
    
    // Valor del ECG
    ecg = analogRead(A0);
    
    // Se establecen los valores dentro de la cadena
    //cad = "#1:" + String(ppm)+ "#2:" + String(spO2)+ "#3:" + String(ecg)+ "#4:" + String(dispositivo_id)+ "@";
    cad = "#1:" + String(ppm)+ "#2:" + String(spO2)+ "#3:" + String(ecg)+ "#4:" + String(dispositivo_id);
    // Imprimimos la cadena
    Serial.println(cad);
    delay(2);
}
