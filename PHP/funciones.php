<?php 
header( 'Content-Type: text/html;charset=utf-8' );

// En este archivo se van a definir todas las funciones necesarias para gestionar la BBDD
// Las funciones se van a usar para subir datos, consultar datos y borrar datos

/* Definimos las credenciales de la BBDD

$host = "127.0.0.1";    // Dirección de la BBDD, en nuestro caso, local
$usuario = "user";      // Usuario para acceder a la BBDD
$contraseña = "1234";   // Contraseña
$BBDD = "tfg";          // Nombre de la BBDD

*/

// Función para subir datos a la BBDD
function ejecutarSubida($comando){
 
  $mysqli = new mysqli('127.0.0.1', 'user', '1234', 'tfg'); // Establecemos la conexión con la BBDD

  // Comprobamos la conexión, si no se conecta, escribimos el error por pantalla
  if ($mysqli->connect_errno) {
      printf("No ha sido posible conectar: %s\n", $mysqli->connect_error);
      exit();
  }

  // Lo que metemos en la función ($comando) se ejecuta en la BBDD y se guardan los datos introducidos
  if ( $mysqli->multi_query($comando)) {
      if ($resultado = $mysqli->store_result()) {
        while ($fila = $resultado->fetch_array(MYSQLI_BOTH)) {
        }
        $resultado->free();
      }
  }

  $mysqli->close(); // Cerramos la conexión
}

// Función para realizar la consulta a la BBDD
// Cada vez que queramos consultar algo, llamamos a la función obtenerResultado
function obtenerResultado($comando){
 
  $mysqli = new mysqli('127.0.0.1', 'user', '1234', 'tfg'); // Establecemos la conexión con la BBDD
  
  // Comprobamos la conexión, si no se conecta, escribimos el error por pantalla
  if ($mysqli->connect_errno) {
      printf("No ha sido posible conectar: %s\n", $mysqli->connect_error);
      exit();
  }

  // Lo que metemos en la función ($comando) se ejecuta en la BBDD y devuelve el resultado
  if ( $mysqli->multi_query($comando)) {
    return $mysqli->store_result();
  }

  $mysqli->close(); // Cerramos la conexión
}

//Función para realizar el borrado de datos de la BBDD
function borrarRegistro($comando){
  
  $mysqli = new mysqli('127.0.0.1', 'user', '1234', 'tfg'); // Establecemos la conexión con la BBDD
  
  // Comprobamos la conexión, si no se conecta, escribimos el error por pantalla
  if ($mysqli->connect_errno) {
    printf("No ha sido posible conectar: %s\n", $mysqli->connect_error);
    exit();
  }

  // Lo que metemos en la función ($comando) se ejecuta en la BBDD
  if ( $mysqli->multi_query($comando)) {
    return $mysqli->free();
  }

  $mysqli->close(); // Cerramos la conexión
}

?>