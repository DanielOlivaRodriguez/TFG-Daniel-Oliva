# Librerias necesarias
import serial
import mysql.connector
#Comunicacion con Arduino a 115200 baudios
arduino = serial.Serial('/dev/ttyACM0', 115200)
# Ejemplo de cadena que se recibe -> #1:68#2:21.50@
values = [0,0,0,0,0,0,0,0,0]

#Funcion que recorre la cadena y clasifica los valores de los sensores dentro de "values"
def cad_proc(cad):
    print ("\n\nInicio------------------------------------------------>" + cad)
    i = cad.find("@")
    n = 0
    while (i > 0):
        #Elimino prime #
        j = cad.find("#")
        cad = cad [j+1:]
        aux = cad

        #Cad avanza 1 bloque y aux se queda con el bloque anterior
        j = cad.find("#")
        if (j < 0):
            j = cad.find("@") #Si entro en este condicional he llegado a ultimo bloque
        aux = aux[:j]
        cad = cad[j:]

        #Divido aux en ID y valor
        x = aux.find(":")
        sensor = aux[:x]
        value = aux[x+1:]

        #info print
        #print("sensor:" + sensor)
        #print("value:" + value)
    i = cad.find("@") 
    values[n] = value
        n = n + 1
    send_mysql(sensor,values) # Se llama a la funcion que sube los datos a la BBDD

# Se define la funcion para enviar los datos
def send_mysql(sensor_,values_):
    cnx = mysql.connector.connect(user='user', password='1234',
                              host='127.0.0.1',
                              database='tfg')
    cursor = cnx.cursor()
    for i in values_:
    	query = "Insert into datos (temp,aX,aY,aZ,gX,gY,gZ,maxG,dispositivo_id) VALUES (" + values_[0] + "," + values_[1] + "," + values_[2] + "," + values_[3] + "," + values_[4] + "," + values_[5] + "," + values_[6] + "," + values_[7] + "," + values_[8] + ");"
    #print(query)
    cursor.execute(query)
    cnx.commit()
    cursor.close()
    cnx.close()

while True:
    line = arduino.readline()
    cad_proc(line)
arduino.close() #Finalizamos la comunicacionarduino = serial.Serial('/dev/ttyACM0', 9600)