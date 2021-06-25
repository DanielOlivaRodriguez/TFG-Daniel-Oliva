# Librerias necesarias
import serial
from datetime import datetime

#Comunicacion con Arduino a 1000000 baudios
arduino = serial.Serial('/dev/ttyACM0', 2000000)

# Contador para no tener en cuenta las 5 primeras lineas
n = 0
# Funcion que almacena la cadena recibida de Arduino en un archivo TXT
def cad_txt(cad):
    # Se obtiene la fecha en formato YYYY-MM-DD HH:MM:SS.mmmm
    now = datetime.now()
    fechaSTR = now.strftime("%Y-%m-%d %H:%M:%S.%f")
    # Eliminamos el salto de linea de la linea obtenida del arduino
    cad = cad.rstrip()
    # Construimos la cadena anadiendo la fecha a la cadena del Arduino
    cadena = '{}#5:{}@\n'.format(cad, fechaSTR)
    # Se almacena la cadena recibida en un fichero TXT
    fichero = open("datos.txt","at")   
    fichero.write(cadena)
    fichero.close()

while True:
    if n < 5:
        line = arduino.readline()
        n = n + 1
    else:
        line = arduino.readline()
        cad_txt(line)
arduino.close() #Finalizamos la comunicacion arduino = serial.Serial('/dev/ttyACM0', 1000000)