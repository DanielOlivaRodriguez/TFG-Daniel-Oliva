# TFG Daniel Oliva Rodríguez
## *Sistema de adquisición fisiológica de los agentes de seguridad y emergencias*

### **Grado en Ingeniería en Tecnologías Industriales, Universidad Rey Juan Carlos**

------

#### RESUMEN DEL PROYECTO

En este Trabajo Fin de Grado se ha diseñado un dispositivo de adquisición de datos fisiológicos para agentes de seguridad y emergencias.

En primer lugar, se investigó qué parámetros se debían monitorizar para obtener una visión completa del estado de salud del agente de seguridad. Los parámetros seleccionados fueron las pulsaciones por minuto, saturación de oxígeno, temperatura, electrocardiograma y fuerzas g.

En segundo lugar, se diseñó el dispositivo basando su funcionamiento en 4 módulos:

+ Módulo de adquisición de datos: este módulo está compuesto por un Arduino UNO, un Arduino Nano IOT 33 y los distintos sensores que recogen los datos fisiológicos.
+ Módulo de gestión de datos: formado por una Raspberry Pi 4 que será la que reciba los datos de los arduinos y los almacene en una BBDD.
+ Módulo de visualización de datos: formado por software empleado para la visualización de datos a través de un navegador web o aplicación móvil. Dicho software se instala en la Raspberry Pi 4.
+ Módulo de alimentación: formado por una batería externa USB que alimenta a la Raspberry Pi 4.

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/Diagrama.jpg">
</p>


Como se puede ver en la imagen, los Arduinos recogen los datos adquiridos por los sensores y los envían a la Raspberry mediante el puerto serie. Desde la Raspberry, ejecutando los códigos de Python, se leen los datos que recibe y se suben a la BBDD. Posteriormente, mediante un *dashboard* en Grafana, es posible visualizar los datos recogidos por el dispositivo. Además, también se puede acceder a los datos a través de la aplicación programada en Android.

-----

#### ORGANIZACIÓN DE LOS ARCHIVOS

##### **App** 

En esta carpeta se encuentra el instalador APK de la aplicación móvil así como el proyecto de Android Studio contenido en un *.zip* en el que se encuentra toda la programación de la aplicación.

##### **Arduino** 

En esta carpeta se almacenan los códigos usados en el Arduino UNO y el Arduino Nano IOT 33.

##### **BBDD**

En esta carpeta se encuentran los archivos realizados en MySQL Workbench para la creación de la BBDD.

##### Comité Ética

En esta carpeta se encuentra el consentimiento informado que firmaron los participantes para realizar las evaluaciones.

##### **Imágenes**

Las imágenes del proyecto.

##### **PHP**

En esta carpeta se alojan los códigos PHP usados para la subida y consulta de datos a la BBDD a través de la aplicación móvil.

##### **Python**

Estos códigos se ejecutan en la Raspberry y sirven para subir los datos recogidos por los Arduinos a la BBDD.

##### Resultados

En esta carpeta se encuentran los resultados de las pruebas. Además, el documento "marcas de tiempo" contiene las marcas de tiempo a la que suceden los distintos hitos. Los resultados se dividen a su vez en dos carpetas:

+ UNO: Resultados de pulsioximetría y ECG.

+ NANO: Resultados de temperatura y fuerzas g.

##### **Soporte 3D**

En esta carpeta se encuentran los archivos de AutoCAD con el diseño del soporte 3D para el sensor de pulsioximetría así como los planos.

---

#### MATERIAL EMPLEADO

El material empleado para la realización del proyecto ha sido:

+ Arduino UNO
+ Arduino Nano IOT 33
+ Sensor de temperatura Heraeus M222
+ Circuito amplificador Adafruit Pt1000 MAX31865
+ Sensor pulsioximetría MIKROE Heart Rate Click MAX30100
+ Sensor ECG SparkFun AD8232
+ Raspberry Pi 4
+ Batería externa USB

----------

#### SOFTWARE EMPLEADO

El software empleado a lo largo de todo el proyecto ha sido:

+ Arduino IDE: para la programación de los arduinos.
+ AutoCAD: para el diseño del soporte 3D para el sensor de pulsioximetría.
+ EAGLE PCB: para el diseño de la PCB.
+ phpMyAdmin: para la gestión y depuración de errores de la BBDD.
+ MySQL Workbench: para la creación y diseño de la BBDD.
+ Android Studio: para la programación de la aplicación móvil Android.
+ Grafana: para la creación del panel para la visualización de los resultados.

------

#### DISEÑO PCB

Para el diseño de la PCB se ha empleado el software EAGLE PCB.

El diseño de las pistas es el siguiente:

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/pcb%20pistas.png">
</p>

Y el resultado final:

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/pcb%20planta.png">
</p>

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/pcb%20oblicua.png">
</p>

Montada sobre el Arduino UNO:

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/pcb%20montada%201.png">
</p>

Y con todos los componentes:

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/pcb%20montada%202.png">
</p>

----

#### DISEÑO SOPORTE 3D

Se ha fabricado un soporte para colocarlo sobre el dedo del usuario y que sea más sencillo tomar los datos con el sensor de pulsioximetría.

Este es el resultado final:

<p algin="left">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/soporte%201.png">
</p>

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/soporte%202.png">
</p>

<p algin="right">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/soporte%203.png">
</p>

-----

#### RESULTADOS

A continuación, se muestra el panel empleado para la visualización de datos en el trabajo.

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/panel.png">
</p>

En la primera fila, se encuentra la gráfica temporal de la temperatura junto con la última temperatura tomada.

En la segunda y tercera fila, lo mismo que en la anterior pero para las pulsaciones por minuto y la saturación de oxígeno en sangre, respectivamente.

En la cuarta fila se encuentra el electrocardiograma y la máxima fuerza g registrada por el dispositivo.

Al ampliar el electrocardiograma, puede observarse la onda.

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/ECG%2010.png">
</p>

-------

#### GRÁFICAS ECG

Usuario 1

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/ecg%201.png">
</p>

Usuario 2

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/ecg%202.png">
</p>

Usuario 3

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/ecg%203.png">
</p>

Usuario 4

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/ecg%204.png">
</p>

Usuario 5

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/ecg%205.png">
</p>

Usuario 6

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/ecg%206.png">
</p>

Usuario 7

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/ecg%207.png">
</p>

Usuario 8

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/ecg%208.png">
</p>

Usuario 9

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/ecg%209.png">
</p>

Usuario 10

<p algin="center">
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/ECG%2010.png">
</p>

-----











