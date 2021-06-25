<?php 

include ('funciones.php'); //Incluimos el archivo donde hemos definido la función del borrado

//Obtenemos el ID del bombero mediante el método GET. Este ID es el usado para el borrado de datos
$id_bombero=$_GET['id_bombero'];

//Definimos la orden a realizar, en este caso, el borrado de una fila de la tabla bomberos que corresponde con el id introducido
$orden = "DELETE FROM bomberos WHERE id_bombero = '$id_bombero'";

// Llamamos a la función borrarRegistro, introducimos la orden y se ejecuta el borrado de datos
borrarRegistro($orden);

 ?>