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





----------

#### SOFTWARE EMPLEADO



------

#### DISEÑO PCB



----

#### DISEÑO SOPORTE 3D



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
    <img src="https://github.com/DanielOlivaRodriguez/TFG-Daniel-Oliva/blob/main/Im%C3%A1genes/panel.png">
</p>

-------

#### GRÁFICAS ECG

-----











