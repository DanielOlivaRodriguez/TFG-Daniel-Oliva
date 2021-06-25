<?php

/* 
Este fichero genera una consulta a la base de datos 'tfg', a la tabla 'bomberos' y devuelve todas las filas 
en un array llamado 'datos'
*/

include('funciones.php'); // Incluimos el archivo funciones en el que está definido la función para realizar la consulta

// Definimos la orden de seleccionar toda una fila de la tabla bomberos
$orden = "SELECT * FROM `bomberos`";

// Ejecutamos la consulta, llamando a la función de consulta y pasandole la orden que queremos ejecutar, en este caso,
// que coja todos los datos de la tabla bomberos, los clasifique y los guarde en un array que se usará posteriormente en la
// aplicación para mostrar los datos

if($resultado=obtenerResultado($orden)){
	while ($fila = mysqli_fetch_array($resultado)){
		$id_bombero=$fila['id_bombero'];
		$nombre_apellido=$fila['nombre_apellido'];
		$edad=$fila['edad'];
		$dispositivo_id=$fila['dispositivo_id'];
		
		//Guardamos los datos en un array
   		$datos['datos'][] = array('id_bombero'=> $id_bombero, 'nombre_apellido'=> $nombre_apellido,'edad'=> $edad, 'dispositivo_id'=> $dispositivo_id);
	}
	// Devolvemos los datos en forma de json
	echo json_encode($datos);
}

?>