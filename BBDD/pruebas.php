<?php

$direccionIP='127.0.0.1';
$usuario='usuario';
$pass='Alumno1@';
$nombre_bd='biblioteca';


// Conectarse y seleccionar una base de datos de MySQL
$mysqli = new mysqli($direccionIP, $usuario, $pass, $nombre_bd);

// Si la conexión falla obtenemos un error 'connect_errno', debemos mostrar un mensaje de error
if ($mysqli->connect_errno) {
    echo "Lo siento, la página que buscas no puede mostrar la información en este momento.";

    // OJO, esto lo mostramos para probar nosotros. NUNCA debe implementarse esta respuesta por pantalla en un sitio publico
	// Mostramos el error concreto por pantalla
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    
    exit;
}


//quiero ver la información del servidor
echo "Tu servidor funciona con la versión ".$mysqli->server_info;
echo " y está ubicado en ".$mysqli->host_info;


$mysqli->close();
?>