<?php 

include ('funciones.php'); //Incluimos el archivo donde hemos definido las funciones

// Tomamos los datos a introducir a la BBDD mediante el método GET
$id=$_GET['id_bombero'];
$nombres=$_GET['nombre_apellido'];
$edad=$_GET['edad'];
$dispositivo_id=$_GET['dispositivo_id'];

//  Si queremos introducir datos mediante el navegador, habría que poner esto en la barra de búsqueda:
//  http://192.168.43.77/subida.php?id_bombero=4&nombre_apellido=paco&edad=25&dispositivo_id=4
//  Usaremos esto más tarde a la hora de meter datos desde la app

// Definimos la orden que queremos ejecutar, en este caso, la escritura de datos
// en la tabla bomberos de cada una de sus variables donde los valores que introduce son los obtenidos antes mediante GET

$orden = "INSERT INTO  `bomberos` (id_bombero, nombre_apellido, edad, dispositivo_id)
VALUES (
'$id' ,
'$nombres' ,
'$edad' ,
'$dispositivo_id')

 ON DUPLICATE KEY UPDATE `id_bombero`='$id',
`nombre_apellido`= '$nombres',
`edad`='$edad',
`dispositivo_id`='$dispositivo_id';";


// También se debe subir el ID del dispositivo y del bombero a la tabla "dispositivo"

$orden2 = "INSERT INTO  `dispositivo` (id_dispositivo, id_bombero)
VALUES (
'$dispositivo_id' ,
'$id')

 ON DUPLICATE KEY UPDATE `id_bombero`='$id',
`id_dispositivo`='$dispositivo_id';";



//  Ejecutamos la función de subida e introducimos la orden
ejecutarSubida($orden);
ejecutarSubida($orden2);

 ?>