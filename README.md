# TFG Daniel Oliva Rodríguez
## *Sistema de adquisición fisiológica de los agentes de seguridad y emergencias*

### **Grado en Ingeniería en Tecnologías Industriales, Universidad Rey Juan Carlos**

------

#### RESUMEN DEL PROYECTO

En este Trabajo Fin de Grado se ha diseñado un dispositivo de adquisición de datos fisiológicos para agentes de seguridad y emergencias.

En primer lugar, se investigó qué parámetros se deberían monitorizar para obtener una visión completa del estado de salud del agente de seguridad. Los parámetros seleccionados fueron las pulsaciones por minuto, saturación de oxígeno, temperatura y electrocardiograma.

En segundo lugar, se diseñó el dispositivo basando su funcionamiento en 3 módulos:

###### + Módulo de adquisición de datos

​	Este módulo está compuesto por un Arduino UNO, un Arduino Nano IOT 33 y los distintos sensores.

###### + Módulo de gestión de datos

​	Formado por una Raspberry Pi 4.

###### + Módulo de visualización de datos

​	Visualización de datos a través de un navegador web o aplicación móvil.

-----

#### ORGANIZACIÓN DE LOS ARCHIVOS

##### Arduino

En esta carpeta se almacenan los códigos usados en el Arduino UNO y el Arduino Nano IOT 33.

##### Python

Estos códigos se ejecutan en la Raspberry y sirven para subir los datos recogidos por los Arduinos a la BBDD.

##### PHP

En esta carpeta se alojan los códigos PHP usados para la subida y consulta de datos a la BBDD a través de la aplicación móvil.

---







