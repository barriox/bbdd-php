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


// Si la conexion se ha establecido correctamente podemos comenzar a trabajar
// vamos a lanzar una consulta SELECT
$sql = "SELECT * FROM libros WHERE estanteriaID = 2";
if (!$resultado = $mysqli->query($sql)) {
     echo "Lo siento, la página que buscas no puede mostrar la información en este momento.";
    exit;
}



echo "<p>FETCH_ASSOC\n";
print_r($resultado->fetch_assoc());

$resultado = $mysqli->query($sql);
echo "</p><p>FETCH_ARRAY\n";
print_r($resultado->fetch_array());

$resultado = $mysqli->query($sql);

echo "</p><p>FETCH_ROW\n";
print_r($resultado->fetch_row());
$resultado = $mysqli->query($sql);

echo "</p><p>FETCH_OBJECT\n";
print_r($resultado->fetch_object());

echo "</p>";


// El script automáticamente liberará el resultado y cerrará la conexión
// a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos
$resultado->free();
$mysqli->close();
?>