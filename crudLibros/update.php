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
    exit;
}

// Si la conexion se ha establecido correctamente podemos comenzar a trabajar
// vamos a lanzar una consulta SELECT
$sql = "SELECT * FROM libros WHERE libroID=".$_GET['libroID'];
if (!$resultado = $conexion->query($sql)) {
     echo "Lo siento, la página que buscas no puede mostrar la información en este momento.";
    exit;
}

// La consulta MySQL se ha realizado correctamente
// Compruebo si hay resultados
if ($resultado->num_rows === 0) {
    // No hay ningun resultado que conincida con los filtros aplicados en el SELECT
    echo "No se ha encontrado ningún resultado";
}else{
    $libro = $resultado->fetch_assoc();
}
if(isset($_POST['submit'])){
    $titulo=$_POST['titu'];
    $estanteria=$_POST['estan'];
    $id=$_GET['libroID'];
    $sql2 = "UPDATE libros SET titulo='$titulo', estanteriaID=$estanteria WHERE libroID=$id";
    $resultado = $conexion->query($sql2);
    if (!$resultado) {
        echo "No se ha encontrado ningún resultado";
    }else{
        echo "Libro actualizado correctamente.";
        echo "<button><a href='listado.php'>Volver</a></button>";
    }
}


// El script automáticamente liberará el resultado y cerrará la conexión
// a MySQL cuando finalice, aunque aquí lo vamos a hacer nostros mismos
$resultado->free();
$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h1>ACTUALIZAR</h1>
    <form action="" method="POST">
        <label>Titulo</label>
        <input type="text" name="titu" value="<?=$libro['titulo']?>">
        <label>Estanteria</label>
        <input type="text" name="estan" value="<?=$libro['estanteriaID']?>">
        <button type="submit" name="submit">Actualizar</button>
    </form>
    <button><a href='listado.php'>Volver</a></button>
    <button><a href='delete.php'>Borrar</a></button>
</body>
</html>