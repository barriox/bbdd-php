<?php

$direccionIP='127.0.0.1';
$usuario='usuario';
$pass='Alumno1@';
$nombre_bd='biblioteca';


// Conectarse y seleccionar una base de datos de MySQL
$conexion = new mysqli($direccionIP, $usuario, $pass, $nombre_bd);

// Si la conexión falla obtenemos un error 'connect_errno', debemos mostrar un mensaje de error
if ($conexion->connect_errno) {
    echo "Lo siento, la página que buscas no puede mostrar la información en este momento.";

    // OJO, esto lo mostramos para probar nosotros. NUNCA debe implementarse esta respuesta por pantalla en un sitio publico
	// Mostramos el error concreto por pantalla
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $conexion->connect_errno . "\n";
    echo "Error: " . $conexion->connect_error . "\n";
    
    exit;
}



// Estas son las sentencias que quiero ejecutar
$sentenciaInsert="INSERT INTO estanterias (sala, color) VALUES ('Rasi la ardilla', '2')";
$sentenciaDelete="DELETE FROM estanterias WHERE estanteriaID = 13 ";
$sentenciaUpdate="UPDATE libros SET titulo = 'La Pandilla de la Ardilla' WHERE  titulo = 'Rasi la ardilla'"; 

$resultado=""; 

//Hago una consulta de tipo insert
$resultado=$conexion->query($sentenciaInsert);
if($resultado){
   echo "INSERT - Se han insertado  $conexion->affected_rows filas en esta acción <br />";
   echo "INSERT - En la inserción se asignó el id autogenerado $conexion->insert_id
   <br /><br/>";
} else echo "Error en insert";

//Hago una colsulta de tipo update
$resultado=$conexion->query($sentenciaUpdate);
if($resultado){
   echo "UPDATE - Se han modificado $conexion->affected_rows filas <br /><br />";
}  else echo "Error en update<br />";

//Hago una colsulta de tipo delete
$resultado=$conexion->query($sentenciaDelete);
if($resultado){
   echo "DELETE - Se han eliminado $conexion->affected_rows filas <br />";
}  else echo "Error en delete";

//Cierro la conexion
$conexion->close();
?>