# Librerias necesarias
import mysql.connector

values = [0,0,0,0,0]

# Funcion que recorre la cadena y clasifica los valores de los sensores dentro de "values"
def cad_proc(cad):
    print (cad)

    i = cad.find("@")
    sensor = 0
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
        print("sensor:" + sensor)
        print("value:" + value)
        i = cad.find("@") 
        values[n] = value
        n = n + 1
    # Se llama a la funcion que sube los datos a la BBDD
    send_mysql(sensor,values) 

# Se define la funcion para enviar los datos
def send_mysql(sensor_,values_):
    cnx = mysql.connector.connect(user='user', password='1234',
                              host='127.0.0.1',
                              database='pruebas')
    cursor = cnx.cursor()
    for i in values_:
    	#query = "Insert into datos_uno (ppm,spO2,ecg,dispositivo_id,fechaRegistro) VALUES (" + values_[0] + "," + values_[1] + "," + values_[2] + "," + values_[3] + "," + values_[4] + ");"
        query = """INSERT INTO datos_uno (ppm,spO2,ecg,dispositivo_id,fechaRegistro) VALUES (%s, %s, %s, %s,'%s')""" % (values_[0],values_[1],values_[2],values_[3],values_[4])
    
    print(query)
    cursor.execute(query)
    cnx.commit()
    cursor.close()
    cnx.close()


# Se abre el archivo TXT en el que estan almacenadas las cadenas de datos
f = open("datos.txt", "r")
# Por cada linea que tenga el archivo, se ejecuta la subida de datos a la BBDD
for linea in f:
    cad_proc(linea)
f.close()   